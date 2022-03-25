<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$patient_vitals_grid->isExport()) { ?>
<script>
var fpatient_vitalsgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_vitalsgrid = new ew.Form("fpatient_vitalsgrid", "grid");
	fpatient_vitalsgrid.formKeyCountName = '<?php echo $patient_vitals_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_vitalsgrid.validate = function() {
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
			<?php if ($patient_vitals_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->id->caption(), $patient_vitals_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->mrnno->caption(), $patient_vitals_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->PatientName->caption(), $patient_vitals_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->PatID->caption(), $patient_vitals_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->MobileNumber->caption(), $patient_vitals_grid->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->HT->Required) { ?>
				elm = this.getElements("x" + infix + "_HT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->HT->caption(), $patient_vitals_grid->HT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->WT->Required) { ?>
				elm = this.getElements("x" + infix + "_WT");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->WT->caption(), $patient_vitals_grid->WT->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->SurfaceArea->Required) { ?>
				elm = this.getElements("x" + infix + "_SurfaceArea");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->SurfaceArea->caption(), $patient_vitals_grid->SurfaceArea->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->BodyMassIndex->Required) { ?>
				elm = this.getElements("x" + infix + "_BodyMassIndex");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->BodyMassIndex->caption(), $patient_vitals_grid->BodyMassIndex->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->AnticoagulantifAny->Required) { ?>
				elm = this.getElements("x" + infix + "_AnticoagulantifAny");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->AnticoagulantifAny->caption(), $patient_vitals_grid->AnticoagulantifAny->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->FoodAllergies->Required) { ?>
				elm = this.getElements("x" + infix + "_FoodAllergies");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->FoodAllergies->caption(), $patient_vitals_grid->FoodAllergies->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->GenericAllergies->Required) { ?>
				elm = this.getElements("x" + infix + "_GenericAllergies[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->GenericAllergies->caption(), $patient_vitals_grid->GenericAllergies->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->GroupAllergies->Required) { ?>
				elm = this.getElements("x" + infix + "_GroupAllergies[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->GroupAllergies->caption(), $patient_vitals_grid->GroupAllergies->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->Temp->Required) { ?>
				elm = this.getElements("x" + infix + "_Temp");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->Temp->caption(), $patient_vitals_grid->Temp->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->Pulse->Required) { ?>
				elm = this.getElements("x" + infix + "_Pulse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->Pulse->caption(), $patient_vitals_grid->Pulse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->BP->Required) { ?>
				elm = this.getElements("x" + infix + "_BP");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->BP->caption(), $patient_vitals_grid->BP->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->PR->Required) { ?>
				elm = this.getElements("x" + infix + "_PR");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->PR->caption(), $patient_vitals_grid->PR->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->CNS->Required) { ?>
				elm = this.getElements("x" + infix + "_CNS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->CNS->caption(), $patient_vitals_grid->CNS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->RSA->Required) { ?>
				elm = this.getElements("x" + infix + "_RSA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->RSA->caption(), $patient_vitals_grid->RSA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->CVS->Required) { ?>
				elm = this.getElements("x" + infix + "_CVS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->CVS->caption(), $patient_vitals_grid->CVS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->PA->Required) { ?>
				elm = this.getElements("x" + infix + "_PA");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->PA->caption(), $patient_vitals_grid->PA->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->PS->Required) { ?>
				elm = this.getElements("x" + infix + "_PS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->PS->caption(), $patient_vitals_grid->PS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->PV->Required) { ?>
				elm = this.getElements("x" + infix + "_PV");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->PV->caption(), $patient_vitals_grid->PV->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->clinicaldetails->Required) { ?>
				elm = this.getElements("x" + infix + "_clinicaldetails[]");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->clinicaldetails->caption(), $patient_vitals_grid->clinicaldetails->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->status->caption(), $patient_vitals_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->createdby->caption(), $patient_vitals_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->createddatetime->caption(), $patient_vitals_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->modifiedby->caption(), $patient_vitals_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->modifieddatetime->caption(), $patient_vitals_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->Age->Required) { ?>
				elm = this.getElements("x" + infix + "_Age");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->Age->caption(), $patient_vitals_grid->Age->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->Gender->caption(), $patient_vitals_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->PatientId->caption(), $patient_vitals_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->Reception->caption(), $patient_vitals_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_vitals_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_vitals_grid->HospID->caption(), $patient_vitals_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_vitalsgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_vitalsgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_vitalsgrid.lists["x_AnticoagulantifAny"] = <?php echo $patient_vitals_grid->AnticoagulantifAny->Lookup->toClientList($patient_vitals_grid) ?>;
	fpatient_vitalsgrid.lists["x_AnticoagulantifAny"].options = <?php echo JsonEncode($patient_vitals_grid->AnticoagulantifAny->lookupOptions()) ?>;
	fpatient_vitalsgrid.autoSuggests["x_AnticoagulantifAny"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fpatient_vitalsgrid.lists["x_GenericAllergies[]"] = <?php echo $patient_vitals_grid->GenericAllergies->Lookup->toClientList($patient_vitals_grid) ?>;
	fpatient_vitalsgrid.lists["x_GenericAllergies[]"].options = <?php echo JsonEncode($patient_vitals_grid->GenericAllergies->lookupOptions()) ?>;
	fpatient_vitalsgrid.lists["x_GroupAllergies[]"] = <?php echo $patient_vitals_grid->GroupAllergies->Lookup->toClientList($patient_vitals_grid) ?>;
	fpatient_vitalsgrid.lists["x_GroupAllergies[]"].options = <?php echo JsonEncode($patient_vitals_grid->GroupAllergies->lookupOptions()) ?>;
	fpatient_vitalsgrid.lists["x_clinicaldetails[]"] = <?php echo $patient_vitals_grid->clinicaldetails->Lookup->toClientList($patient_vitals_grid) ?>;
	fpatient_vitalsgrid.lists["x_clinicaldetails[]"].options = <?php echo JsonEncode($patient_vitals_grid->clinicaldetails->lookupOptions()) ?>;
	fpatient_vitalsgrid.lists["x_status"] = <?php echo $patient_vitals_grid->status->Lookup->toClientList($patient_vitals_grid) ?>;
	fpatient_vitalsgrid.lists["x_status"].options = <?php echo JsonEncode($patient_vitals_grid->status->lookupOptions()) ?>;
	loadjs.done("fpatient_vitalsgrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$patient_vitals_grid->renderOtherOptions();
?>
<?php if ($patient_vitals_grid->TotalRecords > 0 || $patient_vitals->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_vitals_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_vitals">
<?php if ($patient_vitals_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_vitals_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_vitalsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_vitals" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_vitalsgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_vitals->RowType = ROWTYPE_HEADER;

// Render list options
$patient_vitals_grid->renderListOptions();

// Render list options (header, left)
$patient_vitals_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_vitals_grid->id->Visible) { // id ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_vitals_grid->id->headerCellClass() ?>"><div id="elh_patient_vitals_id" class="patient_vitals_id"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_vitals_grid->id->headerCellClass() ?>"><div><div id="elh_patient_vitals_id" class="patient_vitals_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_vitals_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_vitals_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_vitals_grid->PatientName->headerCellClass() ?>"><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_vitals_grid->PatientName->headerCellClass() ?>"><div><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->PatID->Visible) { // PatID ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_vitals_grid->PatID->headerCellClass() ?>"><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_vitals_grid->PatID->headerCellClass() ?>"><div><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_vitals_grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_vitals_grid->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->HT->Visible) { // HT ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->HT) == "") { ?>
		<th data-name="HT" class="<?php echo $patient_vitals_grid->HT->headerCellClass() ?>"><div id="elh_patient_vitals_HT" class="patient_vitals_HT"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->HT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HT" class="<?php echo $patient_vitals_grid->HT->headerCellClass() ?>"><div><div id="elh_patient_vitals_HT" class="patient_vitals_HT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->HT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->HT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->HT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->WT->Visible) { // WT ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->WT) == "") { ?>
		<th data-name="WT" class="<?php echo $patient_vitals_grid->WT->headerCellClass() ?>"><div id="elh_patient_vitals_WT" class="patient_vitals_WT"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->WT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WT" class="<?php echo $patient_vitals_grid->WT->headerCellClass() ?>"><div><div id="elh_patient_vitals_WT" class="patient_vitals_WT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->WT->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->WT->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->WT->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->SurfaceArea->Visible) { // SurfaceArea ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->SurfaceArea) == "") { ?>
		<th data-name="SurfaceArea" class="<?php echo $patient_vitals_grid->SurfaceArea->headerCellClass() ?>"><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->SurfaceArea->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurfaceArea" class="<?php echo $patient_vitals_grid->SurfaceArea->headerCellClass() ?>"><div><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->SurfaceArea->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->SurfaceArea->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->SurfaceArea->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->BodyMassIndex->Visible) { // BodyMassIndex ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->BodyMassIndex) == "") { ?>
		<th data-name="BodyMassIndex" class="<?php echo $patient_vitals_grid->BodyMassIndex->headerCellClass() ?>"><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->BodyMassIndex->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BodyMassIndex" class="<?php echo $patient_vitals_grid->BodyMassIndex->headerCellClass() ?>"><div><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->BodyMassIndex->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->BodyMassIndex->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->BodyMassIndex->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->AnticoagulantifAny) == "") { ?>
		<th data-name="AnticoagulantifAny" class="<?php echo $patient_vitals_grid->AnticoagulantifAny->headerCellClass() ?>"><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->AnticoagulantifAny->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AnticoagulantifAny" class="<?php echo $patient_vitals_grid->AnticoagulantifAny->headerCellClass() ?>"><div><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->AnticoagulantifAny->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->AnticoagulantifAny->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->AnticoagulantifAny->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->FoodAllergies->Visible) { // FoodAllergies ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->FoodAllergies) == "") { ?>
		<th data-name="FoodAllergies" class="<?php echo $patient_vitals_grid->FoodAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->FoodAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FoodAllergies" class="<?php echo $patient_vitals_grid->FoodAllergies->headerCellClass() ?>"><div><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->FoodAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->FoodAllergies->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->FoodAllergies->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->GenericAllergies->Visible) { // GenericAllergies ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->GenericAllergies) == "") { ?>
		<th data-name="GenericAllergies" class="<?php echo $patient_vitals_grid->GenericAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->GenericAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GenericAllergies" class="<?php echo $patient_vitals_grid->GenericAllergies->headerCellClass() ?>"><div><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->GenericAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->GenericAllergies->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->GenericAllergies->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->GroupAllergies->Visible) { // GroupAllergies ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->GroupAllergies) == "") { ?>
		<th data-name="GroupAllergies" class="<?php echo $patient_vitals_grid->GroupAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->GroupAllergies->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="GroupAllergies" class="<?php echo $patient_vitals_grid->GroupAllergies->headerCellClass() ?>"><div><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->GroupAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->GroupAllergies->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->GroupAllergies->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->Temp->Visible) { // Temp ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->Temp) == "") { ?>
		<th data-name="Temp" class="<?php echo $patient_vitals_grid->Temp->headerCellClass() ?>"><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp" class="<?php echo $patient_vitals_grid->Temp->headerCellClass() ?>"><div><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->Temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->Temp->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->Temp->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->Pulse->Visible) { // Pulse ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $patient_vitals_grid->Pulse->headerCellClass() ?>"><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $patient_vitals_grid->Pulse->headerCellClass() ?>"><div><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->Pulse->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->Pulse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->Pulse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->BP->Visible) { // BP ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $patient_vitals_grid->BP->headerCellClass() ?>"><div id="elh_patient_vitals_BP" class="patient_vitals_BP"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $patient_vitals_grid->BP->headerCellClass() ?>"><div><div id="elh_patient_vitals_BP" class="patient_vitals_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->BP->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->BP->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->PR->Visible) { // PR ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->PR) == "") { ?>
		<th data-name="PR" class="<?php echo $patient_vitals_grid->PR->headerCellClass() ?>"><div id="elh_patient_vitals_PR" class="patient_vitals_PR"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->PR->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PR" class="<?php echo $patient_vitals_grid->PR->headerCellClass() ?>"><div><div id="elh_patient_vitals_PR" class="patient_vitals_PR">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->PR->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->PR->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->PR->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->CNS->Visible) { // CNS ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->CNS) == "") { ?>
		<th data-name="CNS" class="<?php echo $patient_vitals_grid->CNS->headerCellClass() ?>"><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->CNS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CNS" class="<?php echo $patient_vitals_grid->CNS->headerCellClass() ?>"><div><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->CNS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->CNS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->CNS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->RSA->Visible) { // RSA ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->RSA) == "") { ?>
		<th data-name="RSA" class="<?php echo $patient_vitals_grid->RSA->headerCellClass() ?>"><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->RSA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RSA" class="<?php echo $patient_vitals_grid->RSA->headerCellClass() ?>"><div><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->RSA->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->RSA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->RSA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->CVS->Visible) { // CVS ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $patient_vitals_grid->CVS->headerCellClass() ?>"><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $patient_vitals_grid->CVS->headerCellClass() ?>"><div><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->CVS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->CVS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->CVS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->PA->Visible) { // PA ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $patient_vitals_grid->PA->headerCellClass() ?>"><div id="elh_patient_vitals_PA" class="patient_vitals_PA"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $patient_vitals_grid->PA->headerCellClass() ?>"><div><div id="elh_patient_vitals_PA" class="patient_vitals_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->PA->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->PA->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->PA->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->PS->Visible) { // PS ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->PS) == "") { ?>
		<th data-name="PS" class="<?php echo $patient_vitals_grid->PS->headerCellClass() ?>"><div id="elh_patient_vitals_PS" class="patient_vitals_PS"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->PS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PS" class="<?php echo $patient_vitals_grid->PS->headerCellClass() ?>"><div><div id="elh_patient_vitals_PS" class="patient_vitals_PS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->PS->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->PS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->PS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->PV->Visible) { // PV ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->PV) == "") { ?>
		<th data-name="PV" class="<?php echo $patient_vitals_grid->PV->headerCellClass() ?>"><div id="elh_patient_vitals_PV" class="patient_vitals_PV"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->PV->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PV" class="<?php echo $patient_vitals_grid->PV->headerCellClass() ?>"><div><div id="elh_patient_vitals_PV" class="patient_vitals_PV">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->PV->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->PV->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->PV->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->clinicaldetails->Visible) { // clinicaldetails ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->clinicaldetails) == "") { ?>
		<th data-name="clinicaldetails" class="<?php echo $patient_vitals_grid->clinicaldetails->headerCellClass() ?>"><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->clinicaldetails->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="clinicaldetails" class="<?php echo $patient_vitals_grid->clinicaldetails->headerCellClass() ?>"><div><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->clinicaldetails->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->clinicaldetails->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->clinicaldetails->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->status->Visible) { // status ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_vitals_grid->status->headerCellClass() ?>"><div id="elh_patient_vitals_status" class="patient_vitals_status"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_vitals_grid->status->headerCellClass() ?>"><div><div id="elh_patient_vitals_status" class="patient_vitals_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->createdby->Visible) { // createdby ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_vitals_grid->createdby->headerCellClass() ?>"><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_vitals_grid->createdby->headerCellClass() ?>"><div><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_vitals_grid->createddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_vitals_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_vitals_grid->modifiedby->headerCellClass() ?>"><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_vitals_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_vitals_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_vitals_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->Age->Visible) { // Age ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $patient_vitals_grid->Age->headerCellClass() ?>"><div id="elh_patient_vitals_Age" class="patient_vitals_Age"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $patient_vitals_grid->Age->headerCellClass() ?>"><div><div id="elh_patient_vitals_Age" class="patient_vitals_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->Age->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->Age->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->Gender->Visible) { // Gender ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_vitals_grid->Gender->headerCellClass() ?>"><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_vitals_grid->Gender->headerCellClass() ?>"><div><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_vitals_grid->PatientId->headerCellClass() ?>"><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_vitals_grid->PatientId->headerCellClass() ?>"><div><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->Reception->Visible) { // Reception ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_vitals_grid->Reception->headerCellClass() ?>"><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_vitals_grid->Reception->headerCellClass() ?>"><div><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_vitals_grid->HospID->Visible) { // HospID ?>
	<?php if ($patient_vitals_grid->SortUrl($patient_vitals_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_vitals_grid->HospID->headerCellClass() ?>"><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><div class="ew-table-header-caption"><?php echo $patient_vitals_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_vitals_grid->HospID->headerCellClass() ?>"><div><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_vitals_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_vitals_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_vitals_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$patient_vitals_grid->StartRecord = 1;
$patient_vitals_grid->StopRecord = $patient_vitals_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_vitals->isConfirm() || $patient_vitals_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_vitals_grid->FormKeyCountName) && ($patient_vitals_grid->isGridAdd() || $patient_vitals_grid->isGridEdit() || $patient_vitals->isConfirm())) {
		$patient_vitals_grid->KeyCount = $CurrentForm->getValue($patient_vitals_grid->FormKeyCountName);
		$patient_vitals_grid->StopRecord = $patient_vitals_grid->StartRecord + $patient_vitals_grid->KeyCount - 1;
	}
}
$patient_vitals_grid->RecordCount = $patient_vitals_grid->StartRecord - 1;
if ($patient_vitals_grid->Recordset && !$patient_vitals_grid->Recordset->EOF) {
	$patient_vitals_grid->Recordset->moveFirst();
	$selectLimit = $patient_vitals_grid->UseSelectLimit;
	if (!$selectLimit && $patient_vitals_grid->StartRecord > 1)
		$patient_vitals_grid->Recordset->move($patient_vitals_grid->StartRecord - 1);
} elseif (!$patient_vitals->AllowAddDeleteRow && $patient_vitals_grid->StopRecord == 0) {
	$patient_vitals_grid->StopRecord = $patient_vitals->GridAddRowCount;
}

// Initialize aggregate
$patient_vitals->RowType = ROWTYPE_AGGREGATEINIT;
$patient_vitals->resetAttributes();
$patient_vitals_grid->renderRow();
if ($patient_vitals_grid->isGridAdd())
	$patient_vitals_grid->RowIndex = 0;
if ($patient_vitals_grid->isGridEdit())
	$patient_vitals_grid->RowIndex = 0;
while ($patient_vitals_grid->RecordCount < $patient_vitals_grid->StopRecord) {
	$patient_vitals_grid->RecordCount++;
	if ($patient_vitals_grid->RecordCount >= $patient_vitals_grid->StartRecord) {
		$patient_vitals_grid->RowCount++;
		if ($patient_vitals_grid->isGridAdd() || $patient_vitals_grid->isGridEdit() || $patient_vitals->isConfirm()) {
			$patient_vitals_grid->RowIndex++;
			$CurrentForm->Index = $patient_vitals_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_vitals_grid->FormActionName) && ($patient_vitals->isConfirm() || $patient_vitals_grid->EventCancelled))
				$patient_vitals_grid->RowAction = strval($CurrentForm->getValue($patient_vitals_grid->FormActionName));
			elseif ($patient_vitals_grid->isGridAdd())
				$patient_vitals_grid->RowAction = "insert";
			else
				$patient_vitals_grid->RowAction = "";
		}

		// Set up key count
		$patient_vitals_grid->KeyCount = $patient_vitals_grid->RowIndex;

		// Init row class and style
		$patient_vitals->resetAttributes();
		$patient_vitals->CssClass = "";
		if ($patient_vitals_grid->isGridAdd()) {
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
		if ($patient_vitals_grid->isGridAdd()) // Grid add
			$patient_vitals->RowType = ROWTYPE_ADD; // Render add
		if ($patient_vitals_grid->isGridAdd() && $patient_vitals->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_vitals_grid->restoreCurrentRowFormValues($patient_vitals_grid->RowIndex); // Restore form values
		if ($patient_vitals_grid->isGridEdit()) { // Grid edit
			if ($patient_vitals->EventCancelled)
				$patient_vitals_grid->restoreCurrentRowFormValues($patient_vitals_grid->RowIndex); // Restore form values
			if ($patient_vitals_grid->RowAction == "insert")
				$patient_vitals->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_vitals->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_vitals_grid->isGridEdit() && ($patient_vitals->RowType == ROWTYPE_EDIT || $patient_vitals->RowType == ROWTYPE_ADD) && $patient_vitals->EventCancelled) // Update failed
			$patient_vitals_grid->restoreCurrentRowFormValues($patient_vitals_grid->RowIndex); // Restore form values
		if ($patient_vitals->RowType == ROWTYPE_EDIT) // Edit row
			$patient_vitals_grid->EditRowCount++;
		if ($patient_vitals->isConfirm()) // Confirm row
			$patient_vitals_grid->restoreCurrentRowFormValues($patient_vitals_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_vitals->RowAttrs->merge(["data-rowindex" => $patient_vitals_grid->RowCount, "id" => "r" . $patient_vitals_grid->RowCount . "_patient_vitals", "data-rowtype" => $patient_vitals->RowType]);

		// Render row
		$patient_vitals_grid->renderRow();

		// Render list options
		$patient_vitals_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_vitals_grid->RowAction != "delete" && $patient_vitals_grid->RowAction != "insertdelete" && !($patient_vitals_grid->RowAction == "insert" && $patient_vitals->isConfirm() && $patient_vitals_grid->emptyRow())) {
?>
	<tr <?php echo $patient_vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_vitals_grid->ListOptions->render("body", "left", $patient_vitals_grid->RowCount);
?>
	<?php if ($patient_vitals_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_vitals_grid->id->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_id" class="form-group"></span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="o<?php echo $patient_vitals_grid->RowIndex ?>_id" id="o<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_id" class="form-group">
<span<?php echo $patient_vitals_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="x<?php echo $patient_vitals_grid->RowIndex ?>_id" id="x<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_id">
<span<?php echo $patient_vitals_grid->id->viewAttributes() ?>><?php echo $patient_vitals_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="x<?php echo $patient_vitals_grid->RowIndex ?>_id" id="x<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="o<?php echo $patient_vitals_grid->RowIndex ?>_id" id="o<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_id" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_id" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_vitals_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_vitals_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_mrnno" class="form-group">
<span<?php echo $patient_vitals_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_mrnno" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->mrnno->EditValue ?>"<?php echo $patient_vitals_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_mrnno" class="form-group">
<span<?php echo $patient_vitals_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_mrnno">
<span<?php echo $patient_vitals_grid->mrnno->viewAttributes() ?>><?php echo $patient_vitals_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_vitals_grid->PatientName->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatientName" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PatientName->EditValue ?>"<?php echo $patient_vitals_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatientName" class="form-group">
<span<?php echo $patient_vitals_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PatientName->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals_grid->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatientName">
<span<?php echo $patient_vitals_grid->PatientName->viewAttributes() ?>><?php echo $patient_vitals_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_vitals_grid->PatID->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatID" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PatID->EditValue ?>"<?php echo $patient_vitals_grid->PatID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatID" class="form-group">
<span<?php echo $patient_vitals_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PatID->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals_grid->PatID->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatID">
<span<?php echo $patient_vitals_grid->PatID->viewAttributes() ?>><?php echo $patient_vitals_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_vitals_grid->MobileNumber->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_MobileNumber" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->MobileNumber->EditValue ?>"<?php echo $patient_vitals_grid->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_MobileNumber" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->MobileNumber->EditValue ?>"<?php echo $patient_vitals_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_MobileNumber">
<span<?php echo $patient_vitals_grid->MobileNumber->viewAttributes() ?>><?php echo $patient_vitals_grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->HT->Visible) { // HT ?>
		<td data-name="HT" <?php echo $patient_vitals_grid->HT->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_HT" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_grid->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->HT->EditValue ?>"<?php echo $patient_vitals_grid->HT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals_grid->HT->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_HT" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_grid->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->HT->EditValue ?>"<?php echo $patient_vitals_grid->HT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_HT">
<span<?php echo $patient_vitals_grid->HT->viewAttributes() ?>><?php echo $patient_vitals_grid->HT->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals_grid->HT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals_grid->HT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals_grid->HT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals_grid->HT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->WT->Visible) { // WT ?>
		<td data-name="WT" <?php echo $patient_vitals_grid->WT->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_WT" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_grid->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->WT->EditValue ?>"<?php echo $patient_vitals_grid->WT->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals_grid->WT->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_WT" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_grid->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->WT->EditValue ?>"<?php echo $patient_vitals_grid->WT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_WT">
<span<?php echo $patient_vitals_grid->WT->viewAttributes() ?>><?php echo $patient_vitals_grid->WT->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals_grid->WT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals_grid->WT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals_grid->WT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals_grid->WT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->SurfaceArea->Visible) { // SurfaceArea ?>
		<td data-name="SurfaceArea" <?php echo $patient_vitals_grid->SurfaceArea->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_SurfaceArea" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->SurfaceArea->EditValue ?>"<?php echo $patient_vitals_grid->SurfaceArea->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_SurfaceArea" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->SurfaceArea->EditValue ?>"<?php echo $patient_vitals_grid->SurfaceArea->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals_grid->SurfaceArea->viewAttributes() ?>><?php echo $patient_vitals_grid->SurfaceArea->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<td data-name="BodyMassIndex" <?php echo $patient_vitals_grid->BodyMassIndex->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_BodyMassIndex" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals_grid->BodyMassIndex->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_BodyMassIndex" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals_grid->BodyMassIndex->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals_grid->BodyMassIndex->viewAttributes() ?>><?php echo $patient_vitals_grid->BodyMassIndex->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<td data-name="AnticoagulantifAny" <?php echo $patient_vitals_grid->AnticoagulantifAny->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_AnticoagulantifAny" class="form-group">
<?php
$onchange = $patient_vitals_grid->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_vitals_grid->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals_grid->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals_grid->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->AnticoagulantifAny->ReadOnly || $patient_vitals_grid->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_vitalsgrid"], function() {
	fpatient_vitalsgrid.createAutoSuggest({"id":"x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true});
});
</script>
<?php echo $patient_vitals_grid->AnticoagulantifAny->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_AnticoagulantifAny" class="form-group">
<?php
$onchange = $patient_vitals_grid->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_vitals_grid->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals_grid->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals_grid->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->AnticoagulantifAny->ReadOnly || $patient_vitals_grid->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_vitalsgrid"], function() {
	fpatient_vitalsgrid.createAutoSuggest({"id":"x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true});
});
</script>
<?php echo $patient_vitals_grid->AnticoagulantifAny->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals_grid->AnticoagulantifAny->viewAttributes() ?>><?php echo $patient_vitals_grid->AnticoagulantifAny->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->FoodAllergies->Visible) { // FoodAllergies ?>
		<td data-name="FoodAllergies" <?php echo $patient_vitals_grid->FoodAllergies->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_FoodAllergies" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->FoodAllergies->EditValue ?>"<?php echo $patient_vitals_grid->FoodAllergies->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_FoodAllergies" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->FoodAllergies->EditValue ?>"<?php echo $patient_vitals_grid->FoodAllergies->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals_grid->FoodAllergies->viewAttributes() ?>><?php echo $patient_vitals_grid->FoodAllergies->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->GenericAllergies->Visible) { // GenericAllergies ?>
		<td data-name="GenericAllergies" <?php echo $patient_vitals_grid->GenericAllergies->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_GenericAllergies" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies"><?php echo EmptyValue(strval($patient_vitals_grid->GenericAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_grid->GenericAllergies->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->GenericAllergies->ReadOnly || $patient_vitals_grid->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_grid->GenericAllergies->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo $patient_vitals_grid->GenericAllergies->CurrentValue ?>"<?php echo $patient_vitals_grid->GenericAllergies->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo HtmlEncode($patient_vitals_grid->GenericAllergies->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_GenericAllergies" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies"><?php echo EmptyValue(strval($patient_vitals_grid->GenericAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_grid->GenericAllergies->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->GenericAllergies->ReadOnly || $patient_vitals_grid->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_grid->GenericAllergies->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo $patient_vitals_grid->GenericAllergies->CurrentValue ?>"<?php echo $patient_vitals_grid->GenericAllergies->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals_grid->GenericAllergies->viewAttributes() ?>><?php echo $patient_vitals_grid->GenericAllergies->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->GenericAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo HtmlEncode($patient_vitals_grid->GenericAllergies->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->GenericAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo HtmlEncode($patient_vitals_grid->GenericAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->GroupAllergies->Visible) { // GroupAllergies ?>
		<td data-name="GroupAllergies" <?php echo $patient_vitals_grid->GroupAllergies->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_GroupAllergies" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies"><?php echo EmptyValue(strval($patient_vitals_grid->GroupAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_grid->GroupAllergies->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->GroupAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->GroupAllergies->ReadOnly || $patient_vitals_grid->GroupAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_grid->GroupAllergies->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo $patient_vitals_grid->GroupAllergies->CurrentValue ?>"<?php echo $patient_vitals_grid->GroupAllergies->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo HtmlEncode($patient_vitals_grid->GroupAllergies->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_GroupAllergies" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies"><?php echo EmptyValue(strval($patient_vitals_grid->GroupAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_grid->GroupAllergies->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->GroupAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->GroupAllergies->ReadOnly || $patient_vitals_grid->GroupAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_grid->GroupAllergies->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo $patient_vitals_grid->GroupAllergies->CurrentValue ?>"<?php echo $patient_vitals_grid->GroupAllergies->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals_grid->GroupAllergies->viewAttributes() ?>><?php echo $patient_vitals_grid->GroupAllergies->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->GroupAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo HtmlEncode($patient_vitals_grid->GroupAllergies->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->GroupAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo HtmlEncode($patient_vitals_grid->GroupAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Temp->Visible) { // Temp ?>
		<td data-name="Temp" <?php echo $patient_vitals_grid->Temp->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Temp" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Temp->EditValue ?>"<?php echo $patient_vitals_grid->Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals_grid->Temp->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Temp" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Temp->EditValue ?>"<?php echo $patient_vitals_grid->Temp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Temp">
<span<?php echo $patient_vitals_grid->Temp->viewAttributes() ?>><?php echo $patient_vitals_grid->Temp->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals_grid->Temp->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals_grid->Temp->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals_grid->Temp->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals_grid->Temp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse" <?php echo $patient_vitals_grid->Pulse->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Pulse" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Pulse->EditValue ?>"<?php echo $patient_vitals_grid->Pulse->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals_grid->Pulse->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Pulse" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Pulse->EditValue ?>"<?php echo $patient_vitals_grid->Pulse->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Pulse">
<span<?php echo $patient_vitals_grid->Pulse->viewAttributes() ?>><?php echo $patient_vitals_grid->Pulse->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals_grid->Pulse->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals_grid->Pulse->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals_grid->Pulse->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals_grid->Pulse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->BP->Visible) { // BP ?>
		<td data-name="BP" <?php echo $patient_vitals_grid->BP->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_BP" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->BP->EditValue ?>"<?php echo $patient_vitals_grid->BP->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals_grid->BP->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_BP" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->BP->EditValue ?>"<?php echo $patient_vitals_grid->BP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_BP">
<span<?php echo $patient_vitals_grid->BP->viewAttributes() ?>><?php echo $patient_vitals_grid->BP->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals_grid->BP->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals_grid->BP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals_grid->BP->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals_grid->BP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PR->Visible) { // PR ?>
		<td data-name="PR" <?php echo $patient_vitals_grid->PR->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PR" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PR->EditValue ?>"<?php echo $patient_vitals_grid->PR->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals_grid->PR->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PR" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PR->EditValue ?>"<?php echo $patient_vitals_grid->PR->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PR">
<span<?php echo $patient_vitals_grid->PR->viewAttributes() ?>><?php echo $patient_vitals_grid->PR->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals_grid->PR->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals_grid->PR->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals_grid->PR->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals_grid->PR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->CNS->Visible) { // CNS ?>
		<td data-name="CNS" <?php echo $patient_vitals_grid->CNS->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_CNS" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->CNS->EditValue ?>"<?php echo $patient_vitals_grid->CNS->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals_grid->CNS->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_CNS" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->CNS->EditValue ?>"<?php echo $patient_vitals_grid->CNS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_CNS">
<span<?php echo $patient_vitals_grid->CNS->viewAttributes() ?>><?php echo $patient_vitals_grid->CNS->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals_grid->CNS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals_grid->CNS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals_grid->CNS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals_grid->CNS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->RSA->Visible) { // RSA ?>
		<td data-name="RSA" <?php echo $patient_vitals_grid->RSA->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_RSA" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->RSA->EditValue ?>"<?php echo $patient_vitals_grid->RSA->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals_grid->RSA->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_RSA" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->RSA->EditValue ?>"<?php echo $patient_vitals_grid->RSA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_RSA">
<span<?php echo $patient_vitals_grid->RSA->viewAttributes() ?>><?php echo $patient_vitals_grid->RSA->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals_grid->RSA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals_grid->RSA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals_grid->RSA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals_grid->RSA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->CVS->Visible) { // CVS ?>
		<td data-name="CVS" <?php echo $patient_vitals_grid->CVS->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_CVS" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->CVS->EditValue ?>"<?php echo $patient_vitals_grid->CVS->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals_grid->CVS->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_CVS" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->CVS->EditValue ?>"<?php echo $patient_vitals_grid->CVS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_CVS">
<span<?php echo $patient_vitals_grid->CVS->viewAttributes() ?>><?php echo $patient_vitals_grid->CVS->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals_grid->CVS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals_grid->CVS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals_grid->CVS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals_grid->CVS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PA->Visible) { // PA ?>
		<td data-name="PA" <?php echo $patient_vitals_grid->PA->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PA" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PA->EditValue ?>"<?php echo $patient_vitals_grid->PA->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals_grid->PA->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PA" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PA->EditValue ?>"<?php echo $patient_vitals_grid->PA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PA">
<span<?php echo $patient_vitals_grid->PA->viewAttributes() ?>><?php echo $patient_vitals_grid->PA->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals_grid->PA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals_grid->PA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals_grid->PA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals_grid->PA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PS->Visible) { // PS ?>
		<td data-name="PS" <?php echo $patient_vitals_grid->PS->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PS" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PS->EditValue ?>"<?php echo $patient_vitals_grid->PS->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals_grid->PS->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PS" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PS->EditValue ?>"<?php echo $patient_vitals_grid->PS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PS">
<span<?php echo $patient_vitals_grid->PS->viewAttributes() ?>><?php echo $patient_vitals_grid->PS->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals_grid->PS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals_grid->PS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals_grid->PS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals_grid->PS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PV->Visible) { // PV ?>
		<td data-name="PV" <?php echo $patient_vitals_grid->PV->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PV" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PV->EditValue ?>"<?php echo $patient_vitals_grid->PV->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals_grid->PV->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PV" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PV->EditValue ?>"<?php echo $patient_vitals_grid->PV->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PV">
<span<?php echo $patient_vitals_grid->PV->viewAttributes() ?>><?php echo $patient_vitals_grid->PV->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals_grid->PV->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals_grid->PV->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals_grid->PV->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals_grid->PV->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->clinicaldetails->Visible) { // clinicaldetails ?>
		<td data-name="clinicaldetails" <?php echo $patient_vitals_grid->clinicaldetails->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_clinicaldetails" class="form-group">
<div id="tp_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals_grid->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="{value}"<?php echo $patient_vitals_grid->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals_grid->clinicaldetails->checkBoxListHtml(FALSE, "x{$patient_vitals_grid->RowIndex}_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals_grid->clinicaldetails->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_clinicaldetails") ?>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="<?php echo HtmlEncode($patient_vitals_grid->clinicaldetails->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_clinicaldetails" class="form-group">
<div id="tp_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals_grid->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="{value}"<?php echo $patient_vitals_grid->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals_grid->clinicaldetails->checkBoxListHtml(FALSE, "x{$patient_vitals_grid->RowIndex}_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals_grid->clinicaldetails->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_clinicaldetails") ?>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals_grid->clinicaldetails->viewAttributes() ?>><?php echo $patient_vitals_grid->clinicaldetails->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" value="<?php echo HtmlEncode($patient_vitals_grid->clinicaldetails->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="<?php echo HtmlEncode($patient_vitals_grid->clinicaldetails->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" value="<?php echo HtmlEncode($patient_vitals_grid->clinicaldetails->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="<?php echo HtmlEncode($patient_vitals_grid->clinicaldetails->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_vitals_grid->status->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status"<?php echo $patient_vitals_grid->status->editAttributes() ?>>
			<?php echo $patient_vitals_grid->status->selectOptionListHtml("x{$patient_vitals_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_vitals_grid->status->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="o<?php echo $patient_vitals_grid->RowIndex ?>_status" id="o<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status"<?php echo $patient_vitals_grid->status->editAttributes() ?>>
			<?php echo $patient_vitals_grid->status->selectOptionListHtml("x{$patient_vitals_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_vitals_grid->status->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_status">
<span<?php echo $patient_vitals_grid->status->viewAttributes() ?>><?php echo $patient_vitals_grid->status->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="o<?php echo $patient_vitals_grid->RowIndex ?>_status" id="o<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_status" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_status" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_vitals_grid->createdby->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_createdby">
<span<?php echo $patient_vitals_grid->createdby->viewAttributes() ?>><?php echo $patient_vitals_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_vitals_grid->createddatetime->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_createddatetime">
<span<?php echo $patient_vitals_grid->createddatetime->viewAttributes() ?>><?php echo $patient_vitals_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_vitals_grid->modifiedby->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_modifiedby">
<span<?php echo $patient_vitals_grid->modifiedby->viewAttributes() ?>><?php echo $patient_vitals_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_vitals_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals_grid->modifieddatetime->viewAttributes() ?>><?php echo $patient_vitals_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Age->Visible) { // Age ?>
		<td data-name="Age" <?php echo $patient_vitals_grid->Age->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Age" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Age->EditValue ?>"<?php echo $patient_vitals_grid->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals_grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Age" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Age->EditValue ?>"<?php echo $patient_vitals_grid->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Age">
<span<?php echo $patient_vitals_grid->Age->viewAttributes() ?>><?php echo $patient_vitals_grid->Age->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals_grid->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals_grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals_grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_vitals_grid->Gender->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Gender" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Gender->EditValue ?>"<?php echo $patient_vitals_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Gender" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Gender->EditValue ?>"<?php echo $patient_vitals_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Gender">
<span<?php echo $patient_vitals_grid->Gender->viewAttributes() ?>><?php echo $patient_vitals_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_vitals_grid->PatientId->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_vitals_grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatientId" class="form-group">
<span<?php echo $patient_vitals_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatientId" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PatientId->EditValue ?>"<?php echo $patient_vitals_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatientId" class="form-group">
<span<?php echo $patient_vitals_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_PatientId">
<span<?php echo $patient_vitals_grid->PatientId->viewAttributes() ?>><?php echo $patient_vitals_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_vitals_grid->Reception->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_vitals_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Reception" class="form-group">
<span<?php echo $patient_vitals_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Reception" class="form-group">
<input type="text" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Reception->EditValue ?>"<?php echo $patient_vitals_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Reception" class="form-group">
<span<?php echo $patient_vitals_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_Reception">
<span<?php echo $patient_vitals_grid->Reception->viewAttributes() ?>><?php echo $patient_vitals_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_vitals_grid->HospID->cellAttributes() ?>>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_vitals->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_vitals_grid->RowCount ?>_patient_vitals_HospID">
<span<?php echo $patient_vitals_grid->HospID->viewAttributes() ?>><?php echo $patient_vitals_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_vitals->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="fpatient_vitalsgrid$x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="fpatient_vitalsgrid$o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_vitals_grid->ListOptions->render("body", "right", $patient_vitals_grid->RowCount);
?>
	</tr>
<?php if ($patient_vitals->RowType == ROWTYPE_ADD || $patient_vitals->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_vitalsgrid", "load"], function() {
	fpatient_vitalsgrid.updateLists(<?php echo $patient_vitals_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_vitals_grid->isGridAdd() || $patient_vitals->CurrentMode == "copy")
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
		$patient_vitals->RowAttrs->merge(["data-rowindex" => $patient_vitals_grid->RowIndex, "id" => "r0_patient_vitals", "data-rowtype" => ROWTYPE_ADD]);
		$patient_vitals->RowAttrs->appendClass("ew-template");
		$patient_vitals->RowType = ROWTYPE_ADD;

		// Render row
		$patient_vitals_grid->renderRow();

		// Render list options
		$patient_vitals_grid->renderListOptions();
		$patient_vitals_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_vitals->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_vitals_grid->ListOptions->render("body", "left", $patient_vitals_grid->RowIndex);
?>
	<?php if ($patient_vitals_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_id" class="form-group patient_vitals_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_id" class="form-group patient_vitals_id">
<span<?php echo $patient_vitals_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="x<?php echo $patient_vitals_grid->RowIndex ?>_id" id="x<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" name="o<?php echo $patient_vitals_grid->RowIndex ?>_id" id="o<?php echo $patient_vitals_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_vitals_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php if ($patient_vitals_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<span<?php echo $patient_vitals_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<input type="text" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->mrnno->EditValue ?>"<?php echo $patient_vitals_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<span<?php echo $patient_vitals_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" name="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_vitals_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_vitals_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PatientName" class="form-group patient_vitals_PatientName">
<input type="text" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PatientName->EditValue ?>"<?php echo $patient_vitals_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientName" class="form-group patient_vitals_PatientName">
<span<?php echo $patient_vitals_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_vitals_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PatID" class="form-group patient_vitals_PatID">
<input type="text" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PatID->EditValue ?>"<?php echo $patient_vitals_grid->PatID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatID" class="form-group patient_vitals_PatID">
<span<?php echo $patient_vitals_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_vitals_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_MobileNumber" class="form-group patient_vitals_MobileNumber">
<input type="text" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->MobileNumber->EditValue ?>"<?php echo $patient_vitals_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_MobileNumber" class="form-group patient_vitals_MobileNumber">
<span<?php echo $patient_vitals_grid->MobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->MobileNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" name="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_vitals_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_vitals_grid->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->HT->Visible) { // HT ?>
		<td data-name="HT">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_HT" class="form-group patient_vitals_HT">
<input type="text" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_grid->HT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->HT->EditValue ?>"<?php echo $patient_vitals_grid->HT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_HT" class="form-group patient_vitals_HT">
<span<?php echo $patient_vitals_grid->HT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->HT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals_grid->HT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HT" value="<?php echo HtmlEncode($patient_vitals_grid->HT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->WT->Visible) { // WT ?>
		<td data-name="WT">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_WT" class="form-group patient_vitals_WT">
<input type="text" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?php echo HtmlEncode($patient_vitals_grid->WT->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->WT->EditValue ?>"<?php echo $patient_vitals_grid->WT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_WT" class="form-group patient_vitals_WT">
<span<?php echo $patient_vitals_grid->WT->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->WT->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="x<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals_grid->WT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" name="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" id="o<?php echo $patient_vitals_grid->RowIndex ?>_WT" value="<?php echo HtmlEncode($patient_vitals_grid->WT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->SurfaceArea->Visible) { // SurfaceArea ?>
		<td data-name="SurfaceArea">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_SurfaceArea" class="form-group patient_vitals_SurfaceArea">
<input type="text" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->SurfaceArea->EditValue ?>"<?php echo $patient_vitals_grid->SurfaceArea->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_SurfaceArea" class="form-group patient_vitals_SurfaceArea">
<span<?php echo $patient_vitals_grid->SurfaceArea->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->SurfaceArea->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="x<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" name="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" id="o<?php echo $patient_vitals_grid->RowIndex ?>_SurfaceArea" value="<?php echo HtmlEncode($patient_vitals_grid->SurfaceArea->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->BodyMassIndex->Visible) { // BodyMassIndex ?>
		<td data-name="BodyMassIndex">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_BodyMassIndex" class="form-group patient_vitals_BodyMassIndex">
<input type="text" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->BodyMassIndex->EditValue ?>"<?php echo $patient_vitals_grid->BodyMassIndex->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_BodyMassIndex" class="form-group patient_vitals_BodyMassIndex">
<span<?php echo $patient_vitals_grid->BodyMassIndex->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->BodyMassIndex->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BodyMassIndex" value="<?php echo HtmlEncode($patient_vitals_grid->BodyMassIndex->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
		<td data-name="AnticoagulantifAny">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_AnticoagulantifAny" class="form-group patient_vitals_AnticoagulantifAny">
<?php
$onchange = $patient_vitals_grid->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$patient_vitals_grid->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo RemoveHtml($patient_vitals_grid->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->getPlaceHolder()) ?>"<?php echo $patient_vitals_grid->AnticoagulantifAny->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->AnticoagulantifAny->ReadOnly || $patient_vitals_grid->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fpatient_vitalsgrid"], function() {
	fpatient_vitalsgrid.createAutoSuggest({"id":"x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true});
});
</script>
<?php echo $patient_vitals_grid->AnticoagulantifAny->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_AnticoagulantifAny" class="form-group patient_vitals_AnticoagulantifAny">
<span<?php echo $patient_vitals_grid->AnticoagulantifAny->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->AnticoagulantifAny->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="x<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" name="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" id="o<?php echo $patient_vitals_grid->RowIndex ?>_AnticoagulantifAny" value="<?php echo HtmlEncode($patient_vitals_grid->AnticoagulantifAny->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->FoodAllergies->Visible) { // FoodAllergies ?>
		<td data-name="FoodAllergies">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_FoodAllergies" class="form-group patient_vitals_FoodAllergies">
<input type="text" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->FoodAllergies->EditValue ?>"<?php echo $patient_vitals_grid->FoodAllergies->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_FoodAllergies" class="form-group patient_vitals_FoodAllergies">
<span<?php echo $patient_vitals_grid->FoodAllergies->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->FoodAllergies->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" id="o<?php echo $patient_vitals_grid->RowIndex ?>_FoodAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->FoodAllergies->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->GenericAllergies->Visible) { // GenericAllergies ?>
		<td data-name="GenericAllergies">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_GenericAllergies" class="form-group patient_vitals_GenericAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies"><?php echo EmptyValue(strval($patient_vitals_grid->GenericAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_grid->GenericAllergies->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->GenericAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->GenericAllergies->ReadOnly || $patient_vitals_grid->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_grid->GenericAllergies->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo $patient_vitals_grid->GenericAllergies->CurrentValue ?>"<?php echo $patient_vitals_grid->GenericAllergies->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_GenericAllergies" class="form-group patient_vitals_GenericAllergies">
<span<?php echo $patient_vitals_grid->GenericAllergies->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->GenericAllergies->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->GenericAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GenericAllergies[]" value="<?php echo HtmlEncode($patient_vitals_grid->GenericAllergies->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->GroupAllergies->Visible) { // GroupAllergies ?>
		<td data-name="GroupAllergies">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_GroupAllergies" class="form-group patient_vitals_GroupAllergies">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies"><?php echo EmptyValue(strval($patient_vitals_grid->GroupAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_vitals_grid->GroupAllergies->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_vitals_grid->GroupAllergies->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_vitals_grid->GroupAllergies->ReadOnly || $patient_vitals_grid->GroupAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_vitals_grid->GroupAllergies->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-multiple="1" data-lookup="1" data-value-separator="<?php echo $patient_vitals_grid->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo $patient_vitals_grid->GroupAllergies->CurrentValue ?>"<?php echo $patient_vitals_grid->GroupAllergies->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_GroupAllergies" class="form-group patient_vitals_GroupAllergies">
<span<?php echo $patient_vitals_grid->GroupAllergies->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->GroupAllergies->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" id="x<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies" value="<?php echo HtmlEncode($patient_vitals_grid->GroupAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" name="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_GroupAllergies[]" value="<?php echo HtmlEncode($patient_vitals_grid->GroupAllergies->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Temp->Visible) { // Temp ?>
		<td data-name="Temp">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Temp" class="form-group patient_vitals_Temp">
<input type="text" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Temp->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Temp->EditValue ?>"<?php echo $patient_vitals_grid->Temp->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Temp" class="form-group patient_vitals_Temp">
<span<?php echo $patient_vitals_grid->Temp->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->Temp->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals_grid->Temp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($patient_vitals_grid->Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Pulse" class="form-group patient_vitals_Pulse">
<input type="text" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Pulse->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Pulse->EditValue ?>"<?php echo $patient_vitals_grid->Pulse->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Pulse" class="form-group patient_vitals_Pulse">
<span<?php echo $patient_vitals_grid->Pulse->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->Pulse->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals_grid->Pulse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($patient_vitals_grid->Pulse->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->BP->Visible) { // BP ?>
		<td data-name="BP">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_BP" class="form-group patient_vitals_BP">
<input type="text" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->BP->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->BP->EditValue ?>"<?php echo $patient_vitals_grid->BP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_BP" class="form-group patient_vitals_BP">
<span<?php echo $patient_vitals_grid->BP->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->BP->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="x<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals_grid->BP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" name="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" id="o<?php echo $patient_vitals_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($patient_vitals_grid->BP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PR->Visible) { // PR ?>
		<td data-name="PR">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PR" class="form-group patient_vitals_PR">
<input type="text" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PR->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PR->EditValue ?>"<?php echo $patient_vitals_grid->PR->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PR" class="form-group patient_vitals_PR">
<span<?php echo $patient_vitals_grid->PR->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PR->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals_grid->PR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PR" value="<?php echo HtmlEncode($patient_vitals_grid->PR->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->CNS->Visible) { // CNS ?>
		<td data-name="CNS">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_CNS" class="form-group patient_vitals_CNS">
<input type="text" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->CNS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->CNS->EditValue ?>"<?php echo $patient_vitals_grid->CNS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_CNS" class="form-group patient_vitals_CNS">
<span<?php echo $patient_vitals_grid->CNS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->CNS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals_grid->CNS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($patient_vitals_grid->CNS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->RSA->Visible) { // RSA ?>
		<td data-name="RSA">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_RSA" class="form-group patient_vitals_RSA">
<input type="text" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->RSA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->RSA->EditValue ?>"<?php echo $patient_vitals_grid->RSA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_RSA" class="form-group patient_vitals_RSA">
<span<?php echo $patient_vitals_grid->RSA->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->RSA->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals_grid->RSA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_RSA" value="<?php echo HtmlEncode($patient_vitals_grid->RSA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->CVS->Visible) { // CVS ?>
		<td data-name="CVS">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_CVS" class="form-group patient_vitals_CVS">
<input type="text" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->CVS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->CVS->EditValue ?>"<?php echo $patient_vitals_grid->CVS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_CVS" class="form-group patient_vitals_CVS">
<span<?php echo $patient_vitals_grid->CVS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->CVS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals_grid->CVS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($patient_vitals_grid->CVS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PA->Visible) { // PA ?>
		<td data-name="PA">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PA" class="form-group patient_vitals_PA">
<input type="text" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PA->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PA->EditValue ?>"<?php echo $patient_vitals_grid->PA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PA" class="form-group patient_vitals_PA">
<span<?php echo $patient_vitals_grid->PA->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PA->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals_grid->PA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($patient_vitals_grid->PA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PS->Visible) { // PS ?>
		<td data-name="PS">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PS" class="form-group patient_vitals_PS">
<input type="text" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PS->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PS->EditValue ?>"<?php echo $patient_vitals_grid->PS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PS" class="form-group patient_vitals_PS">
<span<?php echo $patient_vitals_grid->PS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals_grid->PS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PS" value="<?php echo HtmlEncode($patient_vitals_grid->PS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PV->Visible) { // PV ?>
		<td data-name="PV">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PV" class="form-group patient_vitals_PV">
<input type="text" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PV->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PV->EditValue ?>"<?php echo $patient_vitals_grid->PV->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PV" class="form-group patient_vitals_PV">
<span<?php echo $patient_vitals_grid->PV->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PV->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals_grid->PV->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PV" value="<?php echo HtmlEncode($patient_vitals_grid->PV->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->clinicaldetails->Visible) { // clinicaldetails ?>
		<td data-name="clinicaldetails">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_clinicaldetails" class="form-group patient_vitals_clinicaldetails">
<div id="tp_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" class="ew-template"><input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" data-value-separator="<?php echo $patient_vitals_grid->clinicaldetails->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="{value}"<?php echo $patient_vitals_grid->clinicaldetails->editAttributes() ?>></div>
<div id="dsl_x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $patient_vitals_grid->clinicaldetails->checkBoxListHtml(FALSE, "x{$patient_vitals_grid->RowIndex}_clinicaldetails[]") ?>
</div></div>
<?php echo $patient_vitals_grid->clinicaldetails->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_clinicaldetails") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_clinicaldetails" class="form-group patient_vitals_clinicaldetails">
<span<?php echo $patient_vitals_grid->clinicaldetails->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->clinicaldetails->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" id="x<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails" value="<?php echo HtmlEncode($patient_vitals_grid->clinicaldetails->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" name="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" id="o<?php echo $patient_vitals_grid->RowIndex ?>_clinicaldetails[]" value="<?php echo HtmlEncode($patient_vitals_grid->clinicaldetails->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_status" class="form-group patient_vitals_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="patient_vitals" data-field="x_status" data-value-separator="<?php echo $patient_vitals_grid->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status"<?php echo $patient_vitals_grid->status->editAttributes() ?>>
			<?php echo $patient_vitals_grid->status->selectOptionListHtml("x{$patient_vitals_grid->RowIndex}_status") ?>
		</select>
</div>
<?php echo $patient_vitals_grid->status->Lookup->getParamTag($patient_vitals_grid, "p_x" . $patient_vitals_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_status" class="form-group patient_vitals_status">
<span<?php echo $patient_vitals_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="x<?php echo $patient_vitals_grid->RowIndex ?>_status" id="x<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_status" name="o<?php echo $patient_vitals_grid->RowIndex ?>_status" id="o<?php echo $patient_vitals_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_vitals_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_createdby" class="form-group patient_vitals_createdby">
<span<?php echo $patient_vitals_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="x<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_vitals_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_createddatetime" class="form-group patient_vitals_createddatetime">
<span<?php echo $patient_vitals_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_modifiedby" class="form-group patient_vitals_modifiedby">
<span<?php echo $patient_vitals_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_vitals_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_modifieddatetime" class="form-group patient_vitals_modifieddatetime">
<span<?php echo $patient_vitals_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" name="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_vitals_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_vitals_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Age" class="form-group patient_vitals_Age">
<input type="text" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Age->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Age->EditValue ?>"<?php echo $patient_vitals_grid->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Age" class="form-group patient_vitals_Age">
<span<?php echo $patient_vitals_grid->Age->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->Age->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals_grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($patient_vitals_grid->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_vitals->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Gender" class="form-group patient_vitals_Gender">
<input type="text" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Gender->EditValue ?>"<?php echo $patient_vitals_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Gender" class="form-group patient_vitals_Gender">
<span<?php echo $patient_vitals_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_vitals_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php if ($patient_vitals_grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<span<?php echo $patient_vitals_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<input type="text" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_vitals_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->PatientId->EditValue ?>"<?php echo $patient_vitals_grid->PatientId->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<span<?php echo $patient_vitals_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" name="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_vitals_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_vitals_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php if ($patient_vitals_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<span<?php echo $patient_vitals_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<input type="text" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" size="30" placeholder="<?php echo HtmlEncode($patient_vitals_grid->Reception->getPlaceHolder()) ?>" value="<?php echo $patient_vitals_grid->Reception->EditValue ?>"<?php echo $patient_vitals_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<span<?php echo $patient_vitals_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="x<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" name="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" id="o<?php echo $patient_vitals_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_vitals_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_vitals_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_vitals->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_HospID" class="form-group patient_vitals_HospID">
<span<?php echo $patient_vitals_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_vitals_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="x<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" name="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" id="o<?php echo $patient_vitals_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_vitals_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_vitals_grid->ListOptions->render("body", "right", $patient_vitals_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_vitalsgrid", "load"], function() {
	fpatient_vitalsgrid.updateLists(<?php echo $patient_vitals_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_vitals_grid->Recordset)
	$patient_vitals_grid->Recordset->Close();
?>
<?php if ($patient_vitals_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_vitals_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_vitals_grid->TotalRecords == 0 && !$patient_vitals->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_vitals_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_vitals_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$patient_vitals->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_patient_vitals",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$patient_vitals_grid->terminate();
?>
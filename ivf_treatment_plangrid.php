<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_treatment_plan_grid))
	$ivf_treatment_plan_grid = new ivf_treatment_plan_grid();

// Run the page
$ivf_treatment_plan_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_treatment_plan_grid->Page_Render();
?>
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<script>

// Form object
var fivf_treatment_plangrid = new ew.Form("fivf_treatment_plangrid", "grid");
fivf_treatment_plangrid.formKeyCountName = '<?php echo $ivf_treatment_plan_grid->FormKeyCountName ?>';

// Validate form
fivf_treatment_plangrid.validate = function() {
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
		<?php if ($ivf_treatment_plan_grid->TreatmentStartDate->Required) { ?>
			elm = this.getElements("x" + infix + "_TreatmentStartDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->TreatmentStartDate->caption(), $ivf_treatment_plan->TreatmentStartDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TreatmentStartDate");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_treatment_plan->TreatmentStartDate->errorMessage()) ?>");
		<?php if ($ivf_treatment_plan_grid->treatment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_treatment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->treatment_status->caption(), $ivf_treatment_plan->treatment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->ARTCYCLE->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCYCLE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->ARTCYCLE->caption(), $ivf_treatment_plan->ARTCYCLE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->IVFCycleNO->Required) { ?>
			elm = this.getElements("x" + infix + "_IVFCycleNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->IVFCycleNO->caption(), $ivf_treatment_plan->IVFCycleNO->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->Treatment->Required) { ?>
			elm = this.getElements("x" + infix + "_Treatment");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->Treatment->caption(), $ivf_treatment_plan->Treatment->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->TreatmentTec->Required) { ?>
			elm = this.getElements("x" + infix + "_TreatmentTec");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->TreatmentTec->caption(), $ivf_treatment_plan->TreatmentTec->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->TypeOfCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_TypeOfCycle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->TypeOfCycle->caption(), $ivf_treatment_plan->TypeOfCycle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->SpermOrgin->Required) { ?>
			elm = this.getElements("x" + infix + "_SpermOrgin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->SpermOrgin->caption(), $ivf_treatment_plan->SpermOrgin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->State->Required) { ?>
			elm = this.getElements("x" + infix + "_State");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->State->caption(), $ivf_treatment_plan->State->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->Origin->Required) { ?>
			elm = this.getElements("x" + infix + "_Origin");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->Origin->caption(), $ivf_treatment_plan->Origin->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->MACS->Required) { ?>
			elm = this.getElements("x" + infix + "_MACS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->MACS->caption(), $ivf_treatment_plan->MACS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->Technique->Required) { ?>
			elm = this.getElements("x" + infix + "_Technique");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->Technique->caption(), $ivf_treatment_plan->Technique->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->PgdPlanning->Required) { ?>
			elm = this.getElements("x" + infix + "_PgdPlanning");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->PgdPlanning->caption(), $ivf_treatment_plan->PgdPlanning->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->IMSI->Required) { ?>
			elm = this.getElements("x" + infix + "_IMSI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->IMSI->caption(), $ivf_treatment_plan->IMSI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->SequentialCulture->Required) { ?>
			elm = this.getElements("x" + infix + "_SequentialCulture");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->SequentialCulture->caption(), $ivf_treatment_plan->SequentialCulture->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->TimeLapse->Required) { ?>
			elm = this.getElements("x" + infix + "_TimeLapse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->TimeLapse->caption(), $ivf_treatment_plan->TimeLapse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->AH->Required) { ?>
			elm = this.getElements("x" + infix + "_AH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->AH->caption(), $ivf_treatment_plan->AH->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->Weight->Required) { ?>
			elm = this.getElements("x" + infix + "_Weight");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->Weight->caption(), $ivf_treatment_plan->Weight->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->BMI->Required) { ?>
			elm = this.getElements("x" + infix + "_BMI");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->BMI->caption(), $ivf_treatment_plan->BMI->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->MaleIndications->Required) { ?>
			elm = this.getElements("x" + infix + "_MaleIndications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->MaleIndications->caption(), $ivf_treatment_plan->MaleIndications->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_treatment_plan_grid->FemaleIndications->Required) { ?>
			elm = this.getElements("x" + infix + "_FemaleIndications");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan->FemaleIndications->caption(), $ivf_treatment_plan->FemaleIndications->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_treatment_plangrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "TreatmentStartDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "treatment_status", false)) return false;
	if (ew.valueChanged(fobj, infix, "ARTCYCLE", false)) return false;
	if (ew.valueChanged(fobj, infix, "IVFCycleNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "Treatment", false)) return false;
	if (ew.valueChanged(fobj, infix, "TreatmentTec", false)) return false;
	if (ew.valueChanged(fobj, infix, "TypeOfCycle", false)) return false;
	if (ew.valueChanged(fobj, infix, "SpermOrgin", false)) return false;
	if (ew.valueChanged(fobj, infix, "State", false)) return false;
	if (ew.valueChanged(fobj, infix, "Origin", false)) return false;
	if (ew.valueChanged(fobj, infix, "MACS", false)) return false;
	if (ew.valueChanged(fobj, infix, "Technique", false)) return false;
	if (ew.valueChanged(fobj, infix, "PgdPlanning", false)) return false;
	if (ew.valueChanged(fobj, infix, "IMSI", false)) return false;
	if (ew.valueChanged(fobj, infix, "SequentialCulture", false)) return false;
	if (ew.valueChanged(fobj, infix, "TimeLapse", false)) return false;
	if (ew.valueChanged(fobj, infix, "AH", false)) return false;
	if (ew.valueChanged(fobj, infix, "Weight", false)) return false;
	if (ew.valueChanged(fobj, infix, "BMI", false)) return false;
	if (ew.valueChanged(fobj, infix, "MaleIndications", false)) return false;
	if (ew.valueChanged(fobj, infix, "FemaleIndications", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_treatment_plangrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_treatment_plangrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_treatment_plangrid.lists["x_treatment_status"] = <?php echo $ivf_treatment_plan_grid->treatment_status->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_treatment_status"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->treatment_status->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_ARTCYCLE"] = <?php echo $ivf_treatment_plan_grid->ARTCYCLE->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->ARTCYCLE->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_Treatment"] = <?php echo $ivf_treatment_plan_grid->Treatment->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_Treatment"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->Treatment->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_TypeOfCycle"] = <?php echo $ivf_treatment_plan_grid->TypeOfCycle->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_TypeOfCycle"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->TypeOfCycle->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_SpermOrgin"] = <?php echo $ivf_treatment_plan_grid->SpermOrgin->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_SpermOrgin"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->SpermOrgin->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_State"] = <?php echo $ivf_treatment_plan_grid->State->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_State"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->State->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_Origin"] = <?php echo $ivf_treatment_plan_grid->Origin->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_Origin"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->Origin->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_MACS"] = <?php echo $ivf_treatment_plan_grid->MACS->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_MACS"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->MACS->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_PgdPlanning"] = <?php echo $ivf_treatment_plan_grid->PgdPlanning->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_PgdPlanning"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->PgdPlanning->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_MaleIndications"] = <?php echo $ivf_treatment_plan_grid->MaleIndications->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_MaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->MaleIndications->options(FALSE, TRUE)) ?>;
fivf_treatment_plangrid.lists["x_FemaleIndications"] = <?php echo $ivf_treatment_plan_grid->FemaleIndications->Lookup->toClientList() ?>;
fivf_treatment_plangrid.lists["x_FemaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->FemaleIndications->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$ivf_treatment_plan_grid->renderOtherOptions();
?>
<?php $ivf_treatment_plan_grid->showPageHeader(); ?>
<?php
$ivf_treatment_plan_grid->showMessage();
?>
<?php if ($ivf_treatment_plan_grid->TotalRecs > 0 || $ivf_treatment_plan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_treatment_plan_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_treatment_plan">
<?php if ($ivf_treatment_plan_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_treatment_plan_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_treatment_plangrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_treatment_plan" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_treatment_plangrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_treatment_plan_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_treatment_plan_grid->renderListOptions();

// Render list options (header, left)
$ivf_treatment_plan_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $ivf_treatment_plan->TreatmentStartDate->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->TreatmentStartDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->TreatmentStartDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_treatment_plan->treatment_status->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_treatment_plan->treatment_status->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->treatment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->treatment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_treatment_plan->ARTCYCLE->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->ARTCYCLE->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->ARTCYCLE->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->IVFCycleNO) == "") { ?>
		<th data-name="IVFCycleNO" class="<?php echo $ivf_treatment_plan->IVFCycleNO->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IVFCycleNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFCycleNO" class="<?php echo $ivf_treatment_plan->IVFCycleNO->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IVFCycleNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->IVFCycleNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->IVFCycleNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $ivf_treatment_plan->Treatment->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $ivf_treatment_plan->Treatment->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->Treatment->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->Treatment->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->TreatmentTec) == "") { ?>
		<th data-name="TreatmentTec" class="<?php echo $ivf_treatment_plan->TreatmentTec->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentTec->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentTec" class="<?php echo $ivf_treatment_plan->TreatmentTec->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TreatmentTec->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->TreatmentTec->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->TreatmentTec->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->TypeOfCycle) == "") { ?>
		<th data-name="TypeOfCycle" class="<?php echo $ivf_treatment_plan->TypeOfCycle->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TypeOfCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfCycle" class="<?php echo $ivf_treatment_plan->TypeOfCycle->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TypeOfCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->TypeOfCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->TypeOfCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->SpermOrgin) == "") { ?>
		<th data-name="SpermOrgin" class="<?php echo $ivf_treatment_plan->SpermOrgin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SpermOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrgin" class="<?php echo $ivf_treatment_plan->SpermOrgin->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SpermOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->SpermOrgin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->SpermOrgin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->State) == "") { ?>
		<th data-name="State" class="<?php echo $ivf_treatment_plan->State->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $ivf_treatment_plan->State->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->State->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->State->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $ivf_treatment_plan->Origin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $ivf_treatment_plan->Origin->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Origin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->Origin->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->Origin->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->MACS) == "") { ?>
		<th data-name="MACS" class="<?php echo $ivf_treatment_plan->MACS->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MACS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MACS" class="<?php echo $ivf_treatment_plan->MACS->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MACS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->MACS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->MACS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->Technique) == "") { ?>
		<th data-name="Technique" class="<?php echo $ivf_treatment_plan->Technique->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Technique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technique" class="<?php echo $ivf_treatment_plan->Technique->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Technique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->Technique->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->Technique->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->PgdPlanning) == "") { ?>
		<th data-name="PgdPlanning" class="<?php echo $ivf_treatment_plan->PgdPlanning->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->PgdPlanning->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PgdPlanning" class="<?php echo $ivf_treatment_plan->PgdPlanning->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->PgdPlanning->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->PgdPlanning->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->PgdPlanning->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->IMSI) == "") { ?>
		<th data-name="IMSI" class="<?php echo $ivf_treatment_plan->IMSI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IMSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSI" class="<?php echo $ivf_treatment_plan->IMSI->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->IMSI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->IMSI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->IMSI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->SequentialCulture) == "") { ?>
		<th data-name="SequentialCulture" class="<?php echo $ivf_treatment_plan->SequentialCulture->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SequentialCulture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCulture" class="<?php echo $ivf_treatment_plan->SequentialCulture->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->SequentialCulture->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->SequentialCulture->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->SequentialCulture->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->TimeLapse) == "") { ?>
		<th data-name="TimeLapse" class="<?php echo $ivf_treatment_plan->TimeLapse->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TimeLapse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeLapse" class="<?php echo $ivf_treatment_plan->TimeLapse->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->TimeLapse->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->TimeLapse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->TimeLapse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->AH) == "") { ?>
		<th data-name="AH" class="<?php echo $ivf_treatment_plan->AH->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->AH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AH" class="<?php echo $ivf_treatment_plan->AH->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->AH->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->AH->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->AH->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $ivf_treatment_plan->Weight->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Weight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $ivf_treatment_plan->Weight->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->Weight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->Weight->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->Weight->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->BMI) == "") { ?>
		<th data-name="BMI" class="<?php echo $ivf_treatment_plan->BMI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->BMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BMI" class="<?php echo $ivf_treatment_plan->BMI->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->BMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->BMI->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->BMI->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->MaleIndications) == "") { ?>
		<th data-name="MaleIndications" class="<?php echo $ivf_treatment_plan->MaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleIndications" class="<?php echo $ivf_treatment_plan->MaleIndications->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->MaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->MaleIndications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->MaleIndications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($ivf_treatment_plan->sortUrl($ivf_treatment_plan->FemaleIndications) == "") { ?>
		<th data-name="FemaleIndications" class="<?php echo $ivf_treatment_plan->FemaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan->FemaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleIndications" class="<?php echo $ivf_treatment_plan->FemaleIndications->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan->FemaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan->FemaleIndications->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_treatment_plan->FemaleIndications->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_treatment_plan_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_treatment_plan_grid->StartRec = 1;
$ivf_treatment_plan_grid->StopRec = $ivf_treatment_plan_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_treatment_plan_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_treatment_plan_grid->FormKeyCountName) && ($ivf_treatment_plan->isGridAdd() || $ivf_treatment_plan->isGridEdit() || $ivf_treatment_plan->isConfirm())) {
		$ivf_treatment_plan_grid->KeyCount = $CurrentForm->getValue($ivf_treatment_plan_grid->FormKeyCountName);
		$ivf_treatment_plan_grid->StopRec = $ivf_treatment_plan_grid->StartRec + $ivf_treatment_plan_grid->KeyCount - 1;
	}
}
$ivf_treatment_plan_grid->RecCnt = $ivf_treatment_plan_grid->StartRec - 1;
if ($ivf_treatment_plan_grid->Recordset && !$ivf_treatment_plan_grid->Recordset->EOF) {
	$ivf_treatment_plan_grid->Recordset->moveFirst();
	$selectLimit = $ivf_treatment_plan_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_treatment_plan_grid->StartRec > 1)
		$ivf_treatment_plan_grid->Recordset->move($ivf_treatment_plan_grid->StartRec - 1);
} elseif (!$ivf_treatment_plan->AllowAddDeleteRow && $ivf_treatment_plan_grid->StopRec == 0) {
	$ivf_treatment_plan_grid->StopRec = $ivf_treatment_plan->GridAddRowCount;
}

// Initialize aggregate
$ivf_treatment_plan->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_treatment_plan->resetAttributes();
$ivf_treatment_plan_grid->renderRow();
if ($ivf_treatment_plan->isGridAdd())
	$ivf_treatment_plan_grid->RowIndex = 0;
if ($ivf_treatment_plan->isGridEdit())
	$ivf_treatment_plan_grid->RowIndex = 0;
while ($ivf_treatment_plan_grid->RecCnt < $ivf_treatment_plan_grid->StopRec) {
	$ivf_treatment_plan_grid->RecCnt++;
	if ($ivf_treatment_plan_grid->RecCnt >= $ivf_treatment_plan_grid->StartRec) {
		$ivf_treatment_plan_grid->RowCnt++;
		if ($ivf_treatment_plan->isGridAdd() || $ivf_treatment_plan->isGridEdit() || $ivf_treatment_plan->isConfirm()) {
			$ivf_treatment_plan_grid->RowIndex++;
			$CurrentForm->Index = $ivf_treatment_plan_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_treatment_plan_grid->FormActionName) && $ivf_treatment_plan_grid->EventCancelled)
				$ivf_treatment_plan_grid->RowAction = strval($CurrentForm->getValue($ivf_treatment_plan_grid->FormActionName));
			elseif ($ivf_treatment_plan->isGridAdd())
				$ivf_treatment_plan_grid->RowAction = "insert";
			else
				$ivf_treatment_plan_grid->RowAction = "";
		}

		// Set up key count
		$ivf_treatment_plan_grid->KeyCount = $ivf_treatment_plan_grid->RowIndex;

		// Init row class and style
		$ivf_treatment_plan->resetAttributes();
		$ivf_treatment_plan->CssClass = "";
		if ($ivf_treatment_plan->isGridAdd()) {
			if ($ivf_treatment_plan->CurrentMode == "copy") {
				$ivf_treatment_plan_grid->loadRowValues($ivf_treatment_plan_grid->Recordset); // Load row values
				$ivf_treatment_plan_grid->setRecordKey($ivf_treatment_plan_grid->RowOldKey, $ivf_treatment_plan_grid->Recordset); // Set old record key
			} else {
				$ivf_treatment_plan_grid->loadRowValues(); // Load default values
				$ivf_treatment_plan_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_treatment_plan_grid->loadRowValues($ivf_treatment_plan_grid->Recordset); // Load row values
		}
		$ivf_treatment_plan->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_treatment_plan->isGridAdd()) // Grid add
			$ivf_treatment_plan->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_treatment_plan->isGridAdd() && $ivf_treatment_plan->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_treatment_plan_grid->restoreCurrentRowFormValues($ivf_treatment_plan_grid->RowIndex); // Restore form values
		if ($ivf_treatment_plan->isGridEdit()) { // Grid edit
			if ($ivf_treatment_plan->EventCancelled)
				$ivf_treatment_plan_grid->restoreCurrentRowFormValues($ivf_treatment_plan_grid->RowIndex); // Restore form values
			if ($ivf_treatment_plan_grid->RowAction == "insert")
				$ivf_treatment_plan->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_treatment_plan->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_treatment_plan->isGridEdit() && ($ivf_treatment_plan->RowType == ROWTYPE_EDIT || $ivf_treatment_plan->RowType == ROWTYPE_ADD) && $ivf_treatment_plan->EventCancelled) // Update failed
			$ivf_treatment_plan_grid->restoreCurrentRowFormValues($ivf_treatment_plan_grid->RowIndex); // Restore form values
		if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_treatment_plan_grid->EditRowCnt++;
		if ($ivf_treatment_plan->isConfirm()) // Confirm row
			$ivf_treatment_plan_grid->restoreCurrentRowFormValues($ivf_treatment_plan_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_treatment_plan->RowAttrs = array_merge($ivf_treatment_plan->RowAttrs, array('data-rowindex'=>$ivf_treatment_plan_grid->RowCnt, 'id'=>'r' . $ivf_treatment_plan_grid->RowCnt . '_ivf_treatment_plan', 'data-rowtype'=>$ivf_treatment_plan->RowType));

		// Render row
		$ivf_treatment_plan_grid->renderRow();

		// Render list options
		$ivf_treatment_plan_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_treatment_plan_grid->RowAction <> "delete" && $ivf_treatment_plan_grid->RowAction <> "insertdelete" && !($ivf_treatment_plan_grid->RowAction == "insert" && $ivf_treatment_plan->isConfirm() && $ivf_treatment_plan_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_treatment_plan_grid->ListOptions->render("body", "left", $ivf_treatment_plan_grid->RowCnt);
?>
	<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate"<?php echo $ivf_treatment_plan->TreatmentStartDate->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TreatmentStartDate" class="form-group ivf_treatment_plan_TreatmentStartDate">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TreatmentStartDate->EditValue ?>"<?php echo $ivf_treatment_plan->TreatmentStartDate->editAttributes() ?>>
<?php if (!$ivf_treatment_plan->TreatmentStartDate->ReadOnly && !$ivf_treatment_plan->TreatmentStartDate->Disabled && !isset($ivf_treatment_plan->TreatmentStartDate->EditAttrs["readonly"]) && !isset($ivf_treatment_plan->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_treatment_plangrid", "x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TreatmentStartDate" class="form-group ivf_treatment_plan_TreatmentStartDate">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TreatmentStartDate->EditValue ?>"<?php echo $ivf_treatment_plan->TreatmentStartDate->editAttributes() ?>>
<?php if (!$ivf_treatment_plan->TreatmentStartDate->ReadOnly && !$ivf_treatment_plan->TreatmentStartDate->Disabled && !isset($ivf_treatment_plan->TreatmentStartDate->EditAttrs["readonly"]) && !isset($ivf_treatment_plan->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_treatment_plangrid", "x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TreatmentStartDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_id" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_treatment_plan->id->CurrentValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_id" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_treatment_plan->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT || $ivf_treatment_plan->CurrentMode == "edit") { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_id" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_treatment_plan->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status"<?php echo $ivf_treatment_plan->treatment_status->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_treatment_status" class="form-group ivf_treatment_plan_treatment_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $ivf_treatment_plan->treatment_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status"<?php echo $ivf_treatment_plan->treatment_status->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->treatment_status->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan->treatment_status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_treatment_status" class="form-group ivf_treatment_plan_treatment_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $ivf_treatment_plan->treatment_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status"<?php echo $ivf_treatment_plan->treatment_status->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->treatment_status->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->treatment_status->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan->treatment_status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan->treatment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE"<?php echo $ivf_treatment_plan->ARTCYCLE->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_ARTCYCLE" class="form-group ivf_treatment_plan_ARTCYCLE">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_treatment_plan->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="{value}"<?php echo $ivf_treatment_plan->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->ARTCYCLE->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_ARTCYCLE") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_ARTCYCLE" class="form-group ivf_treatment_plan_ARTCYCLE">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_treatment_plan->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="{value}"<?php echo $ivf_treatment_plan->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->ARTCYCLE->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_ARTCYCLE") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->ARTCYCLE->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan->ARTCYCLE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<td data-name="IVFCycleNO"<?php echo $ivf_treatment_plan->IVFCycleNO->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_IVFCycleNO" class="form-group ivf_treatment_plan_IVFCycleNO">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->IVFCycleNO->EditValue ?>"<?php echo $ivf_treatment_plan->IVFCycleNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_IVFCycleNO" class="form-group ivf_treatment_plan_IVFCycleNO">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->IVFCycleNO->EditValue ?>"<?php echo $ivf_treatment_plan->IVFCycleNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan->IVFCycleNO->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->IVFCycleNO->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment"<?php echo $ivf_treatment_plan->Treatment->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Treatment" class="form-group ivf_treatment_plan_Treatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $ivf_treatment_plan->Treatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment"<?php echo $ivf_treatment_plan->Treatment->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->Treatment->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan->Treatment->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Treatment" class="form-group ivf_treatment_plan_Treatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $ivf_treatment_plan->Treatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment"<?php echo $ivf_treatment_plan->Treatment->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->Treatment->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan->Treatment->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Treatment->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan->Treatment->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan->Treatment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan->Treatment->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan->Treatment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec"<?php echo $ivf_treatment_plan->TreatmentTec->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TreatmentTec" class="form-group ivf_treatment_plan_TreatmentTec">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TreatmentTec->EditValue ?>"<?php echo $ivf_treatment_plan->TreatmentTec->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TreatmentTec" class="form-group ivf_treatment_plan_TreatmentTec">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TreatmentTec->EditValue ?>"<?php echo $ivf_treatment_plan->TreatmentTec->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan->TreatmentTec->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TreatmentTec->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle"<?php echo $ivf_treatment_plan->TypeOfCycle->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TypeOfCycle" class="form-group ivf_treatment_plan_TypeOfCycle">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $ivf_treatment_plan->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="{value}"<?php echo $ivf_treatment_plan->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->TypeOfCycle->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_TypeOfCycle") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan->TypeOfCycle->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TypeOfCycle" class="form-group ivf_treatment_plan_TypeOfCycle">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $ivf_treatment_plan->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="{value}"<?php echo $ivf_treatment_plan->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->TypeOfCycle->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_TypeOfCycle") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan->TypeOfCycle->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TypeOfCycle->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan->TypeOfCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan->TypeOfCycle->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan->TypeOfCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan->TypeOfCycle->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin"<?php echo $ivf_treatment_plan->SpermOrgin->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_SpermOrgin" class="form-group ivf_treatment_plan_SpermOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $ivf_treatment_plan->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin"<?php echo $ivf_treatment_plan->SpermOrgin->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->SpermOrgin->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan->SpermOrgin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_SpermOrgin" class="form-group ivf_treatment_plan_SpermOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $ivf_treatment_plan->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin"<?php echo $ivf_treatment_plan->SpermOrgin->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->SpermOrgin->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan->SpermOrgin->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->SpermOrgin->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan->SpermOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan->SpermOrgin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan->SpermOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan->SpermOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
		<td data-name="State"<?php echo $ivf_treatment_plan->State->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_State" class="form-group ivf_treatment_plan_State">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $ivf_treatment_plan->State->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State"<?php echo $ivf_treatment_plan->State->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->State->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan->State->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_State" class="form-group ivf_treatment_plan_State">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $ivf_treatment_plan->State->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State"<?php echo $ivf_treatment_plan->State->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->State->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan->State->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->State->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan->State->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan->State->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan->State->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan->State->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
		<td data-name="Origin"<?php echo $ivf_treatment_plan->Origin->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Origin" class="form-group ivf_treatment_plan_Origin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Origin" data-value-separator="<?php echo $ivf_treatment_plan->Origin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin"<?php echo $ivf_treatment_plan->Origin->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->Origin->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan->Origin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Origin" class="form-group ivf_treatment_plan_Origin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Origin" data-value-separator="<?php echo $ivf_treatment_plan->Origin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin"<?php echo $ivf_treatment_plan->Origin->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->Origin->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan->Origin->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Origin->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan->Origin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan->Origin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan->Origin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan->Origin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
		<td data-name="MACS"<?php echo $ivf_treatment_plan->MACS->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_MACS" class="form-group ivf_treatment_plan_MACS">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $ivf_treatment_plan->MACS->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="{value}"<?php echo $ivf_treatment_plan->MACS->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->MACS->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_MACS") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan->MACS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_MACS" class="form-group ivf_treatment_plan_MACS">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $ivf_treatment_plan->MACS->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="{value}"<?php echo $ivf_treatment_plan->MACS->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->MACS->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_MACS") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan->MACS->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->MACS->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan->MACS->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan->MACS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan->MACS->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan->MACS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
		<td data-name="Technique"<?php echo $ivf_treatment_plan->Technique->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Technique" class="form-group ivf_treatment_plan_Technique">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->Technique->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->Technique->EditValue ?>"<?php echo $ivf_treatment_plan->Technique->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan->Technique->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Technique" class="form-group ivf_treatment_plan_Technique">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->Technique->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->Technique->EditValue ?>"<?php echo $ivf_treatment_plan->Technique->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan->Technique->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Technique->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan->Technique->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan->Technique->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan->Technique->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan->Technique->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning"<?php echo $ivf_treatment_plan->PgdPlanning->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_PgdPlanning" class="form-group ivf_treatment_plan_PgdPlanning">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $ivf_treatment_plan->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="{value}"<?php echo $ivf_treatment_plan->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->PgdPlanning->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_PgdPlanning") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan->PgdPlanning->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_PgdPlanning" class="form-group ivf_treatment_plan_PgdPlanning">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $ivf_treatment_plan->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="{value}"<?php echo $ivf_treatment_plan->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->PgdPlanning->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_PgdPlanning") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan->PgdPlanning->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->PgdPlanning->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan->PgdPlanning->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan->PgdPlanning->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan->PgdPlanning->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan->PgdPlanning->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI"<?php echo $ivf_treatment_plan->IMSI->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_IMSI" class="form-group ivf_treatment_plan_IMSI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->IMSI->EditValue ?>"<?php echo $ivf_treatment_plan->IMSI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_IMSI" class="form-group ivf_treatment_plan_IMSI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->IMSI->EditValue ?>"<?php echo $ivf_treatment_plan->IMSI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan->IMSI->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->IMSI->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture"<?php echo $ivf_treatment_plan->SequentialCulture->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_SequentialCulture" class="form-group ivf_treatment_plan_SequentialCulture">
<input type="text" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->SequentialCulture->EditValue ?>"<?php echo $ivf_treatment_plan->SequentialCulture->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_SequentialCulture" class="form-group ivf_treatment_plan_SequentialCulture">
<input type="text" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->SequentialCulture->EditValue ?>"<?php echo $ivf_treatment_plan->SequentialCulture->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan->SequentialCulture->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->SequentialCulture->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse"<?php echo $ivf_treatment_plan->TimeLapse->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TimeLapse" class="form-group ivf_treatment_plan_TimeLapse">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TimeLapse->EditValue ?>"<?php echo $ivf_treatment_plan->TimeLapse->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TimeLapse" class="form-group ivf_treatment_plan_TimeLapse">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TimeLapse->EditValue ?>"<?php echo $ivf_treatment_plan->TimeLapse->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan->TimeLapse->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->TimeLapse->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
		<td data-name="AH"<?php echo $ivf_treatment_plan->AH->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_AH" class="form-group ivf_treatment_plan_AH">
<input type="text" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->AH->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->AH->EditValue ?>"<?php echo $ivf_treatment_plan->AH->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan->AH->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_AH" class="form-group ivf_treatment_plan_AH">
<input type="text" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->AH->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->AH->EditValue ?>"<?php echo $ivf_treatment_plan->AH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan->AH->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->AH->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan->AH->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan->AH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan->AH->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan->AH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
		<td data-name="Weight"<?php echo $ivf_treatment_plan->Weight->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Weight" class="form-group ivf_treatment_plan_Weight">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->Weight->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->Weight->EditValue ?>"<?php echo $ivf_treatment_plan->Weight->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan->Weight->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Weight" class="form-group ivf_treatment_plan_Weight">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->Weight->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->Weight->EditValue ?>"<?php echo $ivf_treatment_plan->Weight->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan->Weight->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->Weight->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan->Weight->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan->Weight->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan->Weight->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan->Weight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
		<td data-name="BMI"<?php echo $ivf_treatment_plan->BMI->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_BMI" class="form-group ivf_treatment_plan_BMI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->BMI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->BMI->EditValue ?>"<?php echo $ivf_treatment_plan->BMI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan->BMI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_BMI" class="form-group ivf_treatment_plan_BMI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->BMI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->BMI->EditValue ?>"<?php echo $ivf_treatment_plan->BMI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan->BMI->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->BMI->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan->BMI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan->BMI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan->BMI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan->BMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications"<?php echo $ivf_treatment_plan->MaleIndications->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_MaleIndications" class="form-group ivf_treatment_plan_MaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $ivf_treatment_plan->MaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications"<?php echo $ivf_treatment_plan->MaleIndications->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->MaleIndications->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->MaleIndications->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_MaleIndications" class="form-group ivf_treatment_plan_MaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $ivf_treatment_plan->MaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications"<?php echo $ivf_treatment_plan->MaleIndications->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->MaleIndications->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan->MaleIndications->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->MaleIndications->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->MaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->MaleIndications->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->MaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->MaleIndications->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications"<?php echo $ivf_treatment_plan->FemaleIndications->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_FemaleIndications" class="form-group ivf_treatment_plan_FemaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $ivf_treatment_plan->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications"<?php echo $ivf_treatment_plan->FemaleIndications->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->FemaleIndications->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->FemaleIndications->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_FemaleIndications" class="form-group ivf_treatment_plan_FemaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $ivf_treatment_plan->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications"<?php echo $ivf_treatment_plan->FemaleIndications->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->FemaleIndications->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCnt ?>_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan->FemaleIndications->viewAttributes() ?>>
<?php echo $ivf_treatment_plan->FemaleIndications->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->FemaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->FemaleIndications->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->FemaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->FemaleIndications->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_treatment_plan_grid->ListOptions->render("body", "right", $ivf_treatment_plan_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD || $ivf_treatment_plan->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_treatment_plangrid.updateLists(<?php echo $ivf_treatment_plan_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_treatment_plan->isGridAdd() || $ivf_treatment_plan->CurrentMode == "copy")
		if (!$ivf_treatment_plan_grid->Recordset->EOF)
			$ivf_treatment_plan_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_treatment_plan->CurrentMode == "add" || $ivf_treatment_plan->CurrentMode == "copy" || $ivf_treatment_plan->CurrentMode == "edit") {
		$ivf_treatment_plan_grid->RowIndex = '$rowindex$';
		$ivf_treatment_plan_grid->loadRowValues();

		// Set row properties
		$ivf_treatment_plan->resetAttributes();
		$ivf_treatment_plan->RowAttrs = array_merge($ivf_treatment_plan->RowAttrs, array('data-rowindex'=>$ivf_treatment_plan_grid->RowIndex, 'id'=>'r0_ivf_treatment_plan', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_treatment_plan->RowAttrs["class"], "ew-template");
		$ivf_treatment_plan->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_treatment_plan_grid->renderRow();

		// Render list options
		$ivf_treatment_plan_grid->renderListOptions();
		$ivf_treatment_plan_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_treatment_plan_grid->ListOptions->render("body", "left", $ivf_treatment_plan_grid->RowIndex);
?>
	<?php if ($ivf_treatment_plan->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentStartDate" class="form-group ivf_treatment_plan_TreatmentStartDate">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TreatmentStartDate->EditValue ?>"<?php echo $ivf_treatment_plan->TreatmentStartDate->editAttributes() ?>>
<?php if (!$ivf_treatment_plan->TreatmentStartDate->ReadOnly && !$ivf_treatment_plan->TreatmentStartDate->Disabled && !isset($ivf_treatment_plan->TreatmentStartDate->EditAttrs["readonly"]) && !isset($ivf_treatment_plan->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_treatment_plangrid", "x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentStartDate" class="form-group ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan->TreatmentStartDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->TreatmentStartDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentStartDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_treatment_status" class="form-group ivf_treatment_plan_treatment_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $ivf_treatment_plan->treatment_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status"<?php echo $ivf_treatment_plan->treatment_status->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->treatment_status->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_treatment_status" class="form-group ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan->treatment_status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->treatment_status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan->treatment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan->treatment_status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_ARTCYCLE" class="form-group ivf_treatment_plan_ARTCYCLE">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_treatment_plan->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="{value}"<?php echo $ivf_treatment_plan->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->ARTCYCLE->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_ARTCYCLE") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_ARTCYCLE" class="form-group ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan->ARTCYCLE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->ARTCYCLE->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan->ARTCYCLE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan->ARTCYCLE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<td data-name="IVFCycleNO">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_IVFCycleNO" class="form-group ivf_treatment_plan_IVFCycleNO">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->IVFCycleNO->EditValue ?>"<?php echo $ivf_treatment_plan->IVFCycleNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_IVFCycleNO" class="form-group ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan->IVFCycleNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->IVFCycleNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan->IVFCycleNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Treatment" class="form-group ivf_treatment_plan_Treatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $ivf_treatment_plan->Treatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment"<?php echo $ivf_treatment_plan->Treatment->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->Treatment->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Treatment" class="form-group ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan->Treatment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->Treatment->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan->Treatment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan->Treatment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentTec" class="form-group ivf_treatment_plan_TreatmentTec">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TreatmentTec->EditValue ?>"<?php echo $ivf_treatment_plan->TreatmentTec->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentTec" class="form-group ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan->TreatmentTec->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->TreatmentTec->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan->TreatmentTec->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TypeOfCycle" class="form-group ivf_treatment_plan_TypeOfCycle">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $ivf_treatment_plan->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="{value}"<?php echo $ivf_treatment_plan->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->TypeOfCycle->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_TypeOfCycle") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TypeOfCycle" class="form-group ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan->TypeOfCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->TypeOfCycle->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan->TypeOfCycle->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan->TypeOfCycle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_SpermOrgin" class="form-group ivf_treatment_plan_SpermOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $ivf_treatment_plan->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin"<?php echo $ivf_treatment_plan->SpermOrgin->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->SpermOrgin->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_SpermOrgin" class="form-group ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan->SpermOrgin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->SpermOrgin->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan->SpermOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan->SpermOrgin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->State->Visible) { // State ?>
		<td data-name="State">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_State" class="form-group ivf_treatment_plan_State">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $ivf_treatment_plan->State->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State"<?php echo $ivf_treatment_plan->State->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->State->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_State" class="form-group ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan->State->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->State->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan->State->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan->State->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Origin->Visible) { // Origin ?>
		<td data-name="Origin">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Origin" class="form-group ivf_treatment_plan_Origin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Origin" data-value-separator="<?php echo $ivf_treatment_plan->Origin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin"<?php echo $ivf_treatment_plan->Origin->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->Origin->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Origin" class="form-group ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan->Origin->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->Origin->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan->Origin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan->Origin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->MACS->Visible) { // MACS ?>
		<td data-name="MACS">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_MACS" class="form-group ivf_treatment_plan_MACS">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $ivf_treatment_plan->MACS->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="{value}"<?php echo $ivf_treatment_plan->MACS->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->MACS->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_MACS") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_MACS" class="form-group ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan->MACS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->MACS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan->MACS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan->MACS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Technique->Visible) { // Technique ?>
		<td data-name="Technique">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Technique" class="form-group ivf_treatment_plan_Technique">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->Technique->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->Technique->EditValue ?>"<?php echo $ivf_treatment_plan->Technique->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Technique" class="form-group ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan->Technique->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->Technique->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan->Technique->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan->Technique->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_PgdPlanning" class="form-group ivf_treatment_plan_PgdPlanning">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" class="ew-template"><input type="radio" class="form-check-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $ivf_treatment_plan->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="{value}"<?php echo $ivf_treatment_plan->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan->PgdPlanning->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_PgdPlanning") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_PgdPlanning" class="form-group ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan->PgdPlanning->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->PgdPlanning->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan->PgdPlanning->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan->PgdPlanning->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_IMSI" class="form-group ivf_treatment_plan_IMSI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->IMSI->EditValue ?>"<?php echo $ivf_treatment_plan->IMSI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_IMSI" class="form-group ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan->IMSI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->IMSI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan->IMSI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_SequentialCulture" class="form-group ivf_treatment_plan_SequentialCulture">
<input type="text" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->SequentialCulture->EditValue ?>"<?php echo $ivf_treatment_plan->SequentialCulture->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_SequentialCulture" class="form-group ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan->SequentialCulture->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->SequentialCulture->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan->SequentialCulture->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TimeLapse" class="form-group ivf_treatment_plan_TimeLapse">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->TimeLapse->EditValue ?>"<?php echo $ivf_treatment_plan->TimeLapse->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TimeLapse" class="form-group ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan->TimeLapse->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->TimeLapse->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan->TimeLapse->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->AH->Visible) { // AH ?>
		<td data-name="AH">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_AH" class="form-group ivf_treatment_plan_AH">
<input type="text" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->AH->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->AH->EditValue ?>"<?php echo $ivf_treatment_plan->AH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_AH" class="form-group ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan->AH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->AH->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan->AH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan->AH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->Weight->Visible) { // Weight ?>
		<td data-name="Weight">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Weight" class="form-group ivf_treatment_plan_Weight">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->Weight->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->Weight->EditValue ?>"<?php echo $ivf_treatment_plan->Weight->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Weight" class="form-group ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan->Weight->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->Weight->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan->Weight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan->Weight->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->BMI->Visible) { // BMI ?>
		<td data-name="BMI">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_BMI" class="form-group ivf_treatment_plan_BMI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan->BMI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan->BMI->EditValue ?>"<?php echo $ivf_treatment_plan->BMI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_BMI" class="form-group ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan->BMI->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->BMI->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan->BMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan->BMI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_MaleIndications" class="form-group ivf_treatment_plan_MaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $ivf_treatment_plan->MaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications"<?php echo $ivf_treatment_plan->MaleIndications->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->MaleIndications->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_MaleIndications" class="form-group ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan->MaleIndications->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->MaleIndications->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->MaleIndications->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->MaleIndications->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_FemaleIndications" class="form-group ivf_treatment_plan_FemaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $ivf_treatment_plan->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications"<?php echo $ivf_treatment_plan->FemaleIndications->editAttributes() ?>>
		<?php echo $ivf_treatment_plan->FemaleIndications->selectOptionListHtml("x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_FemaleIndications" class="form-group ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan->FemaleIndications->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_treatment_plan->FemaleIndications->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->FemaleIndications->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan->FemaleIndications->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_treatment_plan_grid->ListOptions->render("body", "right", $ivf_treatment_plan_grid->RowIndex);
?>
<script>
fivf_treatment_plangrid.updateLists(<?php echo $ivf_treatment_plan_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_treatment_plan->CurrentMode == "add" || $ivf_treatment_plan->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_treatment_plan_grid->FormKeyCountName ?>" id="<?php echo $ivf_treatment_plan_grid->FormKeyCountName ?>" value="<?php echo $ivf_treatment_plan_grid->KeyCount ?>">
<?php echo $ivf_treatment_plan_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_treatment_plan->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_treatment_plan_grid->FormKeyCountName ?>" id="<?php echo $ivf_treatment_plan_grid->FormKeyCountName ?>" value="<?php echo $ivf_treatment_plan_grid->KeyCount ?>">
<?php echo $ivf_treatment_plan_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_treatment_plan->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_treatment_plangrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_treatment_plan_grid->Recordset)
	$ivf_treatment_plan_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_treatment_plan_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_treatment_plan_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_treatment_plan_grid->TotalRecs == 0 && !$ivf_treatment_plan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_treatment_plan_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_treatment_plan_grid->terminate();
?>
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_treatment_plan", "95%", "");
</script>
<?php } ?>
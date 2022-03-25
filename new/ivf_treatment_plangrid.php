<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$ivf_treatment_plan_grid->isExport()) { ?>
<script>
var fivf_treatment_plangrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fivf_treatment_plangrid = new ew.Form("fivf_treatment_plangrid", "grid");
	fivf_treatment_plangrid.formKeyCountName = '<?php echo $ivf_treatment_plan_grid->FormKeyCountName ?>';

	// Validate form
	fivf_treatment_plangrid.validate = function() {
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
			<?php if ($ivf_treatment_plan_grid->TreatmentStartDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentStartDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->TreatmentStartDate->caption(), $ivf_treatment_plan_grid->TreatmentStartDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TreatmentStartDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($ivf_treatment_plan_grid->TreatmentStartDate->errorMessage()) ?>");
			<?php if ($ivf_treatment_plan_grid->treatment_status->Required) { ?>
				elm = this.getElements("x" + infix + "_treatment_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->treatment_status->caption(), $ivf_treatment_plan_grid->treatment_status->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->ARTCYCLE->Required) { ?>
				elm = this.getElements("x" + infix + "_ARTCYCLE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->ARTCYCLE->caption(), $ivf_treatment_plan_grid->ARTCYCLE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->IVFCycleNO->Required) { ?>
				elm = this.getElements("x" + infix + "_IVFCycleNO");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->IVFCycleNO->caption(), $ivf_treatment_plan_grid->IVFCycleNO->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->Treatment->Required) { ?>
				elm = this.getElements("x" + infix + "_Treatment");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->Treatment->caption(), $ivf_treatment_plan_grid->Treatment->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->TreatmentTec->Required) { ?>
				elm = this.getElements("x" + infix + "_TreatmentTec");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->TreatmentTec->caption(), $ivf_treatment_plan_grid->TreatmentTec->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->TypeOfCycle->Required) { ?>
				elm = this.getElements("x" + infix + "_TypeOfCycle");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->TypeOfCycle->caption(), $ivf_treatment_plan_grid->TypeOfCycle->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->SpermOrgin->Required) { ?>
				elm = this.getElements("x" + infix + "_SpermOrgin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->SpermOrgin->caption(), $ivf_treatment_plan_grid->SpermOrgin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->State->Required) { ?>
				elm = this.getElements("x" + infix + "_State");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->State->caption(), $ivf_treatment_plan_grid->State->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->Origin->Required) { ?>
				elm = this.getElements("x" + infix + "_Origin");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->Origin->caption(), $ivf_treatment_plan_grid->Origin->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->MACS->Required) { ?>
				elm = this.getElements("x" + infix + "_MACS");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->MACS->caption(), $ivf_treatment_plan_grid->MACS->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->Technique->Required) { ?>
				elm = this.getElements("x" + infix + "_Technique");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->Technique->caption(), $ivf_treatment_plan_grid->Technique->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->PgdPlanning->Required) { ?>
				elm = this.getElements("x" + infix + "_PgdPlanning");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->PgdPlanning->caption(), $ivf_treatment_plan_grid->PgdPlanning->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->IMSI->Required) { ?>
				elm = this.getElements("x" + infix + "_IMSI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->IMSI->caption(), $ivf_treatment_plan_grid->IMSI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->SequentialCulture->Required) { ?>
				elm = this.getElements("x" + infix + "_SequentialCulture");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->SequentialCulture->caption(), $ivf_treatment_plan_grid->SequentialCulture->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->TimeLapse->Required) { ?>
				elm = this.getElements("x" + infix + "_TimeLapse");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->TimeLapse->caption(), $ivf_treatment_plan_grid->TimeLapse->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->AH->Required) { ?>
				elm = this.getElements("x" + infix + "_AH");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->AH->caption(), $ivf_treatment_plan_grid->AH->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->Weight->Required) { ?>
				elm = this.getElements("x" + infix + "_Weight");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->Weight->caption(), $ivf_treatment_plan_grid->Weight->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->BMI->Required) { ?>
				elm = this.getElements("x" + infix + "_BMI");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->BMI->caption(), $ivf_treatment_plan_grid->BMI->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->MaleIndications->Required) { ?>
				elm = this.getElements("x" + infix + "_MaleIndications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->MaleIndications->caption(), $ivf_treatment_plan_grid->MaleIndications->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($ivf_treatment_plan_grid->FemaleIndications->Required) { ?>
				elm = this.getElements("x" + infix + "_FemaleIndications");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_treatment_plan_grid->FemaleIndications->caption(), $ivf_treatment_plan_grid->FemaleIndications->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fivf_treatment_plangrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fivf_treatment_plangrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fivf_treatment_plangrid.lists["x_treatment_status"] = <?php echo $ivf_treatment_plan_grid->treatment_status->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_treatment_status"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->treatment_status->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_ARTCYCLE"] = <?php echo $ivf_treatment_plan_grid->ARTCYCLE->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_ARTCYCLE"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->ARTCYCLE->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_Treatment"] = <?php echo $ivf_treatment_plan_grid->Treatment->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_Treatment"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->Treatment->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_TypeOfCycle"] = <?php echo $ivf_treatment_plan_grid->TypeOfCycle->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_TypeOfCycle"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->TypeOfCycle->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_SpermOrgin"] = <?php echo $ivf_treatment_plan_grid->SpermOrgin->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_SpermOrgin"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->SpermOrgin->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_State"] = <?php echo $ivf_treatment_plan_grid->State->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_State"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->State->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_MACS"] = <?php echo $ivf_treatment_plan_grid->MACS->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_MACS"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->MACS->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_PgdPlanning"] = <?php echo $ivf_treatment_plan_grid->PgdPlanning->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_PgdPlanning"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->PgdPlanning->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_MaleIndications"] = <?php echo $ivf_treatment_plan_grid->MaleIndications->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_MaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->MaleIndications->options(FALSE, TRUE)) ?>;
	fivf_treatment_plangrid.lists["x_FemaleIndications"] = <?php echo $ivf_treatment_plan_grid->FemaleIndications->Lookup->toClientList($ivf_treatment_plan_grid) ?>;
	fivf_treatment_plangrid.lists["x_FemaleIndications"].options = <?php echo JsonEncode($ivf_treatment_plan_grid->FemaleIndications->options(FALSE, TRUE)) ?>;
	loadjs.done("fivf_treatment_plangrid");
});
</script>
<script>
ew.ready("head", "js/ewfixedheadertable.js", "fixedheadertable");
</script>
<?php } ?>
<?php
$ivf_treatment_plan_grid->renderOtherOptions();
?>
<?php if ($ivf_treatment_plan_grid->TotalRecords > 0 || $ivf_treatment_plan->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_treatment_plan_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_treatment_plan">
<?php if ($ivf_treatment_plan_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_treatment_plan_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_treatment_plangrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_treatment_plan" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_treatment_plangrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_treatment_plan->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_treatment_plan_grid->renderListOptions();

// Render list options (header, left)
$ivf_treatment_plan_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_treatment_plan_grid->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->TreatmentStartDate) == "") { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->TreatmentStartDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentStartDate" class="<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_TreatmentStartDate" class="ivf_treatment_plan_TreatmentStartDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->TreatmentStartDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->TreatmentStartDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->treatment_status->Visible) { // treatment_status ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->treatment_status) == "") { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_treatment_plan_grid->treatment_status->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->treatment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="treatment_status" class="<?php echo $ivf_treatment_plan_grid->treatment_status->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_treatment_status" class="ivf_treatment_plan_treatment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->treatment_status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->treatment_status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->ARTCYCLE) == "") { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_treatment_plan_grid->ARTCYCLE->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->ARTCYCLE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCYCLE" class="<?php echo $ivf_treatment_plan_grid->ARTCYCLE->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_ARTCYCLE" class="ivf_treatment_plan_ARTCYCLE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->ARTCYCLE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->ARTCYCLE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->IVFCycleNO->Visible) { // IVFCycleNO ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->IVFCycleNO) == "") { ?>
		<th data-name="IVFCycleNO" class="<?php echo $ivf_treatment_plan_grid->IVFCycleNO->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->IVFCycleNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IVFCycleNO" class="<?php echo $ivf_treatment_plan_grid->IVFCycleNO->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_IVFCycleNO" class="ivf_treatment_plan_IVFCycleNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->IVFCycleNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->IVFCycleNO->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->IVFCycleNO->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->Treatment->Visible) { // Treatment ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->Treatment) == "") { ?>
		<th data-name="Treatment" class="<?php echo $ivf_treatment_plan_grid->Treatment->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->Treatment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Treatment" class="<?php echo $ivf_treatment_plan_grid->Treatment->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_Treatment" class="ivf_treatment_plan_Treatment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->Treatment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->Treatment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->TreatmentTec->Visible) { // TreatmentTec ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->TreatmentTec) == "") { ?>
		<th data-name="TreatmentTec" class="<?php echo $ivf_treatment_plan_grid->TreatmentTec->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->TreatmentTec->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TreatmentTec" class="<?php echo $ivf_treatment_plan_grid->TreatmentTec->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_TreatmentTec" class="ivf_treatment_plan_TreatmentTec">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->TreatmentTec->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->TreatmentTec->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->TreatmentTec->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->TypeOfCycle->Visible) { // TypeOfCycle ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->TypeOfCycle) == "") { ?>
		<th data-name="TypeOfCycle" class="<?php echo $ivf_treatment_plan_grid->TypeOfCycle->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->TypeOfCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TypeOfCycle" class="<?php echo $ivf_treatment_plan_grid->TypeOfCycle->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_TypeOfCycle" class="ivf_treatment_plan_TypeOfCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->TypeOfCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->TypeOfCycle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->TypeOfCycle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->SpermOrgin->Visible) { // SpermOrgin ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->SpermOrgin) == "") { ?>
		<th data-name="SpermOrgin" class="<?php echo $ivf_treatment_plan_grid->SpermOrgin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->SpermOrgin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SpermOrgin" class="<?php echo $ivf_treatment_plan_grid->SpermOrgin->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_SpermOrgin" class="ivf_treatment_plan_SpermOrgin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->SpermOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->SpermOrgin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->SpermOrgin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->State->Visible) { // State ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->State) == "") { ?>
		<th data-name="State" class="<?php echo $ivf_treatment_plan_grid->State->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->State->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="State" class="<?php echo $ivf_treatment_plan_grid->State->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_State" class="ivf_treatment_plan_State">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->State->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->State->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->Origin->Visible) { // Origin ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->Origin) == "") { ?>
		<th data-name="Origin" class="<?php echo $ivf_treatment_plan_grid->Origin->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->Origin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Origin" class="<?php echo $ivf_treatment_plan_grid->Origin->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_Origin" class="ivf_treatment_plan_Origin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->Origin->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->Origin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->Origin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->MACS->Visible) { // MACS ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->MACS) == "") { ?>
		<th data-name="MACS" class="<?php echo $ivf_treatment_plan_grid->MACS->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->MACS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MACS" class="<?php echo $ivf_treatment_plan_grid->MACS->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_MACS" class="ivf_treatment_plan_MACS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->MACS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->MACS->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->MACS->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->Technique->Visible) { // Technique ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->Technique) == "") { ?>
		<th data-name="Technique" class="<?php echo $ivf_treatment_plan_grid->Technique->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->Technique->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Technique" class="<?php echo $ivf_treatment_plan_grid->Technique->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_Technique" class="ivf_treatment_plan_Technique">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->Technique->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->Technique->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->Technique->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->PgdPlanning->Visible) { // PgdPlanning ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->PgdPlanning) == "") { ?>
		<th data-name="PgdPlanning" class="<?php echo $ivf_treatment_plan_grid->PgdPlanning->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->PgdPlanning->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PgdPlanning" class="<?php echo $ivf_treatment_plan_grid->PgdPlanning->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_PgdPlanning" class="ivf_treatment_plan_PgdPlanning">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->PgdPlanning->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->PgdPlanning->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->PgdPlanning->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->IMSI->Visible) { // IMSI ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->IMSI) == "") { ?>
		<th data-name="IMSI" class="<?php echo $ivf_treatment_plan_grid->IMSI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->IMSI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IMSI" class="<?php echo $ivf_treatment_plan_grid->IMSI->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_IMSI" class="ivf_treatment_plan_IMSI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->IMSI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->IMSI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->IMSI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->SequentialCulture->Visible) { // SequentialCulture ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->SequentialCulture) == "") { ?>
		<th data-name="SequentialCulture" class="<?php echo $ivf_treatment_plan_grid->SequentialCulture->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->SequentialCulture->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SequentialCulture" class="<?php echo $ivf_treatment_plan_grid->SequentialCulture->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_SequentialCulture" class="ivf_treatment_plan_SequentialCulture">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->SequentialCulture->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->SequentialCulture->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->SequentialCulture->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->TimeLapse->Visible) { // TimeLapse ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->TimeLapse) == "") { ?>
		<th data-name="TimeLapse" class="<?php echo $ivf_treatment_plan_grid->TimeLapse->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->TimeLapse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TimeLapse" class="<?php echo $ivf_treatment_plan_grid->TimeLapse->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_TimeLapse" class="ivf_treatment_plan_TimeLapse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->TimeLapse->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->TimeLapse->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->TimeLapse->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->AH->Visible) { // AH ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->AH) == "") { ?>
		<th data-name="AH" class="<?php echo $ivf_treatment_plan_grid->AH->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->AH->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AH" class="<?php echo $ivf_treatment_plan_grid->AH->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_AH" class="ivf_treatment_plan_AH">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->AH->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->AH->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->AH->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->Weight->Visible) { // Weight ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->Weight) == "") { ?>
		<th data-name="Weight" class="<?php echo $ivf_treatment_plan_grid->Weight->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->Weight->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Weight" class="<?php echo $ivf_treatment_plan_grid->Weight->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_Weight" class="ivf_treatment_plan_Weight">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->Weight->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->Weight->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->Weight->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->BMI->Visible) { // BMI ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->BMI) == "") { ?>
		<th data-name="BMI" class="<?php echo $ivf_treatment_plan_grid->BMI->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->BMI->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BMI" class="<?php echo $ivf_treatment_plan_grid->BMI->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_BMI" class="ivf_treatment_plan_BMI">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->BMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->BMI->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->BMI->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->MaleIndications->Visible) { // MaleIndications ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->MaleIndications) == "") { ?>
		<th data-name="MaleIndications" class="<?php echo $ivf_treatment_plan_grid->MaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->MaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaleIndications" class="<?php echo $ivf_treatment_plan_grid->MaleIndications->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_MaleIndications" class="ivf_treatment_plan_MaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->MaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->MaleIndications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->MaleIndications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_treatment_plan_grid->FemaleIndications->Visible) { // FemaleIndications ?>
	<?php if ($ivf_treatment_plan_grid->SortUrl($ivf_treatment_plan_grid->FemaleIndications) == "") { ?>
		<th data-name="FemaleIndications" class="<?php echo $ivf_treatment_plan_grid->FemaleIndications->headerCellClass() ?>"><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications"><div class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->FemaleIndications->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FemaleIndications" class="<?php echo $ivf_treatment_plan_grid->FemaleIndications->headerCellClass() ?>"><div><div id="elh_ivf_treatment_plan_FemaleIndications" class="ivf_treatment_plan_FemaleIndications">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_treatment_plan_grid->FemaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_treatment_plan_grid->FemaleIndications->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($ivf_treatment_plan_grid->FemaleIndications->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$ivf_treatment_plan_grid->StartRecord = 1;
$ivf_treatment_plan_grid->StopRecord = $ivf_treatment_plan_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($ivf_treatment_plan->isConfirm() || $ivf_treatment_plan_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_treatment_plan_grid->FormKeyCountName) && ($ivf_treatment_plan_grid->isGridAdd() || $ivf_treatment_plan_grid->isGridEdit() || $ivf_treatment_plan->isConfirm())) {
		$ivf_treatment_plan_grid->KeyCount = $CurrentForm->getValue($ivf_treatment_plan_grid->FormKeyCountName);
		$ivf_treatment_plan_grid->StopRecord = $ivf_treatment_plan_grid->StartRecord + $ivf_treatment_plan_grid->KeyCount - 1;
	}
}
$ivf_treatment_plan_grid->RecordCount = $ivf_treatment_plan_grid->StartRecord - 1;
if ($ivf_treatment_plan_grid->Recordset && !$ivf_treatment_plan_grid->Recordset->EOF) {
	$ivf_treatment_plan_grid->Recordset->moveFirst();
	$selectLimit = $ivf_treatment_plan_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_treatment_plan_grid->StartRecord > 1)
		$ivf_treatment_plan_grid->Recordset->move($ivf_treatment_plan_grid->StartRecord - 1);
} elseif (!$ivf_treatment_plan->AllowAddDeleteRow && $ivf_treatment_plan_grid->StopRecord == 0) {
	$ivf_treatment_plan_grid->StopRecord = $ivf_treatment_plan->GridAddRowCount;
}

// Initialize aggregate
$ivf_treatment_plan->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_treatment_plan->resetAttributes();
$ivf_treatment_plan_grid->renderRow();
if ($ivf_treatment_plan_grid->isGridAdd())
	$ivf_treatment_plan_grid->RowIndex = 0;
if ($ivf_treatment_plan_grid->isGridEdit())
	$ivf_treatment_plan_grid->RowIndex = 0;
while ($ivf_treatment_plan_grid->RecordCount < $ivf_treatment_plan_grid->StopRecord) {
	$ivf_treatment_plan_grid->RecordCount++;
	if ($ivf_treatment_plan_grid->RecordCount >= $ivf_treatment_plan_grid->StartRecord) {
		$ivf_treatment_plan_grid->RowCount++;
		if ($ivf_treatment_plan_grid->isGridAdd() || $ivf_treatment_plan_grid->isGridEdit() || $ivf_treatment_plan->isConfirm()) {
			$ivf_treatment_plan_grid->RowIndex++;
			$CurrentForm->Index = $ivf_treatment_plan_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_treatment_plan_grid->FormActionName) && ($ivf_treatment_plan->isConfirm() || $ivf_treatment_plan_grid->EventCancelled))
				$ivf_treatment_plan_grid->RowAction = strval($CurrentForm->getValue($ivf_treatment_plan_grid->FormActionName));
			elseif ($ivf_treatment_plan_grid->isGridAdd())
				$ivf_treatment_plan_grid->RowAction = "insert";
			else
				$ivf_treatment_plan_grid->RowAction = "";
		}

		// Set up key count
		$ivf_treatment_plan_grid->KeyCount = $ivf_treatment_plan_grid->RowIndex;

		// Init row class and style
		$ivf_treatment_plan->resetAttributes();
		$ivf_treatment_plan->CssClass = "";
		if ($ivf_treatment_plan_grid->isGridAdd()) {
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
		if ($ivf_treatment_plan_grid->isGridAdd()) // Grid add
			$ivf_treatment_plan->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_treatment_plan_grid->isGridAdd() && $ivf_treatment_plan->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_treatment_plan_grid->restoreCurrentRowFormValues($ivf_treatment_plan_grid->RowIndex); // Restore form values
		if ($ivf_treatment_plan_grid->isGridEdit()) { // Grid edit
			if ($ivf_treatment_plan->EventCancelled)
				$ivf_treatment_plan_grid->restoreCurrentRowFormValues($ivf_treatment_plan_grid->RowIndex); // Restore form values
			if ($ivf_treatment_plan_grid->RowAction == "insert")
				$ivf_treatment_plan->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_treatment_plan->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_treatment_plan_grid->isGridEdit() && ($ivf_treatment_plan->RowType == ROWTYPE_EDIT || $ivf_treatment_plan->RowType == ROWTYPE_ADD) && $ivf_treatment_plan->EventCancelled) // Update failed
			$ivf_treatment_plan_grid->restoreCurrentRowFormValues($ivf_treatment_plan_grid->RowIndex); // Restore form values
		if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_treatment_plan_grid->EditRowCount++;
		if ($ivf_treatment_plan->isConfirm()) // Confirm row
			$ivf_treatment_plan_grid->restoreCurrentRowFormValues($ivf_treatment_plan_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_treatment_plan->RowAttrs->merge(["data-rowindex" => $ivf_treatment_plan_grid->RowCount, "id" => "r" . $ivf_treatment_plan_grid->RowCount . "_ivf_treatment_plan", "data-rowtype" => $ivf_treatment_plan->RowType]);

		// Render row
		$ivf_treatment_plan_grid->renderRow();

		// Render list options
		$ivf_treatment_plan_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_treatment_plan_grid->RowAction != "delete" && $ivf_treatment_plan_grid->RowAction != "insertdelete" && !($ivf_treatment_plan_grid->RowAction == "insert" && $ivf_treatment_plan->isConfirm() && $ivf_treatment_plan_grid->emptyRow())) {
?>
	<tr <?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_treatment_plan_grid->ListOptions->render("body", "left", $ivf_treatment_plan_grid->RowCount);
?>
	<?php if ($ivf_treatment_plan_grid->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate" <?php echo $ivf_treatment_plan_grid->TreatmentStartDate->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TreatmentStartDate" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->editAttributes() ?>>
<?php if (!$ivf_treatment_plan_grid->TreatmentStartDate->ReadOnly && !$ivf_treatment_plan_grid->TreatmentStartDate->Disabled && !isset($ivf_treatment_plan_grid->TreatmentStartDate->EditAttrs["readonly"]) && !isset($ivf_treatment_plan_grid->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_plangrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_treatment_plangrid", "x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TreatmentStartDate" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->editAttributes() ?>>
<?php if (!$ivf_treatment_plan_grid->TreatmentStartDate->ReadOnly && !$ivf_treatment_plan_grid->TreatmentStartDate->Disabled && !isset($ivf_treatment_plan_grid->TreatmentStartDate->EditAttrs["readonly"]) && !isset($ivf_treatment_plan_grid->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_plangrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_treatment_plangrid", "x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->TreatmentStartDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_id" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_id" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT || $ivf_treatment_plan->CurrentMode == "edit") { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_id" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($ivf_treatment_plan_grid->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status" <?php echo $ivf_treatment_plan_grid->treatment_status->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_treatment_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $ivf_treatment_plan_grid->treatment_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status"<?php echo $ivf_treatment_plan_grid->treatment_status->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->treatment_status->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_treatment_status") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->treatment_status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_treatment_status" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $ivf_treatment_plan_grid->treatment_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status"<?php echo $ivf_treatment_plan_grid->treatment_status->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->treatment_status->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_treatment_status") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan_grid->treatment_status->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->treatment_status->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->treatment_status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->treatment_status->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->treatment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE" <?php echo $ivf_treatment_plan_grid->ARTCYCLE->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_ARTCYCLE" class="form-group">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_treatment_plan_grid->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="{value}"<?php echo $ivf_treatment_plan_grid->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->ARTCYCLE->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_ARTCYCLE") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_ARTCYCLE" class="form-group">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_treatment_plan_grid->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="{value}"<?php echo $ivf_treatment_plan_grid->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->ARTCYCLE->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_ARTCYCLE") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan_grid->ARTCYCLE->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->ARTCYCLE->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->ARTCYCLE->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->ARTCYCLE->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->ARTCYCLE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<td data-name="IVFCycleNO" <?php echo $ivf_treatment_plan_grid->IVFCycleNO->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_IVFCycleNO" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->IVFCycleNO->EditValue ?>"<?php echo $ivf_treatment_plan_grid->IVFCycleNO->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_IVFCycleNO" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->IVFCycleNO->EditValue ?>"<?php echo $ivf_treatment_plan_grid->IVFCycleNO->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan_grid->IVFCycleNO->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->IVFCycleNO->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment" <?php echo $ivf_treatment_plan_grid->Treatment->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Treatment" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $ivf_treatment_plan_grid->Treatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment"<?php echo $ivf_treatment_plan_grid->Treatment->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->Treatment->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_Treatment") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Treatment->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Treatment" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $ivf_treatment_plan_grid->Treatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment"<?php echo $ivf_treatment_plan_grid->Treatment->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->Treatment->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_Treatment") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan_grid->Treatment->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->Treatment->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Treatment->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Treatment->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Treatment->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Treatment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec" <?php echo $ivf_treatment_plan_grid->TreatmentTec->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TreatmentTec" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TreatmentTec->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TreatmentTec->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TreatmentTec" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TreatmentTec->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TreatmentTec->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan_grid->TreatmentTec->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->TreatmentTec->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle" <?php echo $ivf_treatment_plan_grid->TypeOfCycle->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TypeOfCycle" class="form-group">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $ivf_treatment_plan_grid->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="{value}"<?php echo $ivf_treatment_plan_grid->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->TypeOfCycle->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_TypeOfCycle") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TypeOfCycle->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TypeOfCycle" class="form-group">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $ivf_treatment_plan_grid->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="{value}"<?php echo $ivf_treatment_plan_grid->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->TypeOfCycle->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_TypeOfCycle") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan_grid->TypeOfCycle->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->TypeOfCycle->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TypeOfCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TypeOfCycle->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TypeOfCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TypeOfCycle->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin" <?php echo $ivf_treatment_plan_grid->SpermOrgin->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_SpermOrgin" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $ivf_treatment_plan_grid->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin"<?php echo $ivf_treatment_plan_grid->SpermOrgin->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->SpermOrgin->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_SpermOrgin") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SpermOrgin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_SpermOrgin" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $ivf_treatment_plan_grid->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin"<?php echo $ivf_treatment_plan_grid->SpermOrgin->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->SpermOrgin->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_SpermOrgin") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan_grid->SpermOrgin->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->SpermOrgin->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SpermOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SpermOrgin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SpermOrgin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SpermOrgin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->State->Visible) { // State ?>
		<td data-name="State" <?php echo $ivf_treatment_plan_grid->State->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_State" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $ivf_treatment_plan_grid->State->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State"<?php echo $ivf_treatment_plan_grid->State->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->State->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_State") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->State->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_State" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $ivf_treatment_plan_grid->State->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State"<?php echo $ivf_treatment_plan_grid->State->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->State->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_State") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan_grid->State->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->State->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->State->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->State->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->State->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->State->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->Origin->Visible) { // Origin ?>
		<td data-name="Origin" <?php echo $ivf_treatment_plan_grid->Origin->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Origin" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Origin->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Origin->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Origin" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Origin->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Origin->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan_grid->Origin->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->Origin->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->MACS->Visible) { // MACS ?>
		<td data-name="MACS" <?php echo $ivf_treatment_plan_grid->MACS->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_MACS" class="form-group">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $ivf_treatment_plan_grid->MACS->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="{value}"<?php echo $ivf_treatment_plan_grid->MACS->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->MACS->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_MACS") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MACS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_MACS" class="form-group">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $ivf_treatment_plan_grid->MACS->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="{value}"<?php echo $ivf_treatment_plan_grid->MACS->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->MACS->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_MACS") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan_grid->MACS->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->MACS->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MACS->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MACS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MACS->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MACS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->Technique->Visible) { // Technique ?>
		<td data-name="Technique" <?php echo $ivf_treatment_plan_grid->Technique->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Technique" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Technique->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Technique->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Technique" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Technique->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Technique->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan_grid->Technique->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->Technique->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning" <?php echo $ivf_treatment_plan_grid->PgdPlanning->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_PgdPlanning" class="form-group">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $ivf_treatment_plan_grid->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="{value}"<?php echo $ivf_treatment_plan_grid->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->PgdPlanning->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_PgdPlanning") ?>
</div></div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->PgdPlanning->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_PgdPlanning" class="form-group">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $ivf_treatment_plan_grid->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="{value}"<?php echo $ivf_treatment_plan_grid->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->PgdPlanning->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_PgdPlanning") ?>
</div></div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan_grid->PgdPlanning->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->PgdPlanning->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->PgdPlanning->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->PgdPlanning->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->PgdPlanning->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->PgdPlanning->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI" <?php echo $ivf_treatment_plan_grid->IMSI->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_IMSI" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->IMSI->EditValue ?>"<?php echo $ivf_treatment_plan_grid->IMSI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_IMSI" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->IMSI->EditValue ?>"<?php echo $ivf_treatment_plan_grid->IMSI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan_grid->IMSI->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->IMSI->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture" <?php echo $ivf_treatment_plan_grid->SequentialCulture->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_SequentialCulture" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->SequentialCulture->EditValue ?>"<?php echo $ivf_treatment_plan_grid->SequentialCulture->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_SequentialCulture" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->SequentialCulture->EditValue ?>"<?php echo $ivf_treatment_plan_grid->SequentialCulture->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan_grid->SequentialCulture->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->SequentialCulture->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse" <?php echo $ivf_treatment_plan_grid->TimeLapse->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TimeLapse" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TimeLapse->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TimeLapse->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TimeLapse" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TimeLapse->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TimeLapse->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan_grid->TimeLapse->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->TimeLapse->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->AH->Visible) { // AH ?>
		<td data-name="AH" <?php echo $ivf_treatment_plan_grid->AH->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_AH" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->AH->EditValue ?>"<?php echo $ivf_treatment_plan_grid->AH->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_AH" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->AH->EditValue ?>"<?php echo $ivf_treatment_plan_grid->AH->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan_grid->AH->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->AH->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->Weight->Visible) { // Weight ?>
		<td data-name="Weight" <?php echo $ivf_treatment_plan_grid->Weight->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Weight" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Weight->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Weight->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Weight" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Weight->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Weight->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan_grid->Weight->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->Weight->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->BMI->Visible) { // BMI ?>
		<td data-name="BMI" <?php echo $ivf_treatment_plan_grid->BMI->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_BMI" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->BMI->EditValue ?>"<?php echo $ivf_treatment_plan_grid->BMI->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_BMI" class="form-group">
<input type="text" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->BMI->EditValue ?>"<?php echo $ivf_treatment_plan_grid->BMI->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan_grid->BMI->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->BMI->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications" <?php echo $ivf_treatment_plan_grid->MaleIndications->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_MaleIndications" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $ivf_treatment_plan_grid->MaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications"<?php echo $ivf_treatment_plan_grid->MaleIndications->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->MaleIndications->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_MaleIndications") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MaleIndications->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_MaleIndications" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $ivf_treatment_plan_grid->MaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications"<?php echo $ivf_treatment_plan_grid->MaleIndications->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->MaleIndications->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_MaleIndications") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan_grid->MaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->MaleIndications->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MaleIndications->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MaleIndications->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications" <?php echo $ivf_treatment_plan_grid->FemaleIndications->cellAttributes() ?>>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_FemaleIndications" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $ivf_treatment_plan_grid->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications"<?php echo $ivf_treatment_plan_grid->FemaleIndications->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->FemaleIndications->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_FemaleIndications") ?>
		</select>
</div>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->FemaleIndications->OldValue) ?>">
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_FemaleIndications" class="form-group">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $ivf_treatment_plan_grid->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications"<?php echo $ivf_treatment_plan_grid->FemaleIndications->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->FemaleIndications->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_FemaleIndications") ?>
		</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_treatment_plan_grid->RowCount ?>_ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan_grid->FemaleIndications->viewAttributes() ?>><?php echo $ivf_treatment_plan_grid->FemaleIndications->getViewValue() ?></span>
</span>
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->FemaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->FemaleIndications->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="fivf_treatment_plangrid$x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->FemaleIndications->FormValue) ?>">
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="fivf_treatment_plangrid$o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->FemaleIndications->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_treatment_plan_grid->ListOptions->render("body", "right", $ivf_treatment_plan_grid->RowCount);
?>
	</tr>
<?php if ($ivf_treatment_plan->RowType == ROWTYPE_ADD || $ivf_treatment_plan->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fivf_treatment_plangrid", "load"], function() {
	fivf_treatment_plangrid.updateLists(<?php echo $ivf_treatment_plan_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_treatment_plan_grid->isGridAdd() || $ivf_treatment_plan->CurrentMode == "copy")
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
		$ivf_treatment_plan->RowAttrs->merge(["data-rowindex" => $ivf_treatment_plan_grid->RowIndex, "id" => "r0_ivf_treatment_plan", "data-rowtype" => ROWTYPE_ADD]);
		$ivf_treatment_plan->RowAttrs->appendClass("ew-template");
		$ivf_treatment_plan->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_treatment_plan_grid->renderRow();

		// Render list options
		$ivf_treatment_plan_grid->renderListOptions();
		$ivf_treatment_plan_grid->StartRowCount = 0;
?>
	<tr <?php echo $ivf_treatment_plan->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_treatment_plan_grid->ListOptions->render("body", "left", $ivf_treatment_plan_grid->RowIndex);
?>
	<?php if ($ivf_treatment_plan_grid->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
		<td data-name="TreatmentStartDate">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentStartDate" class="form-group ivf_treatment_plan_TreatmentStartDate">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" data-format="7" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->editAttributes() ?>>
<?php if (!$ivf_treatment_plan_grid->TreatmentStartDate->ReadOnly && !$ivf_treatment_plan_grid->TreatmentStartDate->Disabled && !isset($ivf_treatment_plan_grid->TreatmentStartDate->EditAttrs["readonly"]) && !isset($ivf_treatment_plan_grid->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fivf_treatment_plangrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fivf_treatment_plangrid", "x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentStartDate" class="form-group ivf_treatment_plan_TreatmentStartDate">
<span<?php echo $ivf_treatment_plan_grid->TreatmentStartDate->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->TreatmentStartDate->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentStartDate" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentStartDate" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentStartDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->treatment_status->Visible) { // treatment_status ?>
		<td data-name="treatment_status">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_treatment_status" class="form-group ivf_treatment_plan_treatment_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_treatment_status" data-value-separator="<?php echo $ivf_treatment_plan_grid->treatment_status->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status"<?php echo $ivf_treatment_plan_grid->treatment_status->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->treatment_status->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_treatment_status") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_treatment_status" class="form-group ivf_treatment_plan_treatment_status">
<span<?php echo $ivf_treatment_plan_grid->treatment_status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->treatment_status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->treatment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_treatment_status" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_treatment_status" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->treatment_status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->ARTCYCLE->Visible) { // ARTCYCLE ?>
		<td data-name="ARTCYCLE">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_ARTCYCLE" class="form-group ivf_treatment_plan_ARTCYCLE">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" data-value-separator="<?php echo $ivf_treatment_plan_grid->ARTCYCLE->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="{value}"<?php echo $ivf_treatment_plan_grid->ARTCYCLE->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->ARTCYCLE->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_ARTCYCLE") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_ARTCYCLE" class="form-group ivf_treatment_plan_ARTCYCLE">
<span<?php echo $ivf_treatment_plan_grid->ARTCYCLE->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->ARTCYCLE->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->ARTCYCLE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_ARTCYCLE" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_ARTCYCLE" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->ARTCYCLE->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->IVFCycleNO->Visible) { // IVFCycleNO ?>
		<td data-name="IVFCycleNO">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_IVFCycleNO" class="form-group ivf_treatment_plan_IVFCycleNO">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->IVFCycleNO->EditValue ?>"<?php echo $ivf_treatment_plan_grid->IVFCycleNO->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_IVFCycleNO" class="form-group ivf_treatment_plan_IVFCycleNO">
<span<?php echo $ivf_treatment_plan_grid->IVFCycleNO->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->IVFCycleNO->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IVFCycleNO" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IVFCycleNO" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IVFCycleNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->Treatment->Visible) { // Treatment ?>
		<td data-name="Treatment">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Treatment" class="form-group ivf_treatment_plan_Treatment">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_Treatment" data-value-separator="<?php echo $ivf_treatment_plan_grid->Treatment->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment"<?php echo $ivf_treatment_plan_grid->Treatment->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->Treatment->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_Treatment") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Treatment" class="form-group ivf_treatment_plan_Treatment">
<span<?php echo $ivf_treatment_plan_grid->Treatment->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->Treatment->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Treatment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Treatment" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Treatment" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Treatment->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->TreatmentTec->Visible) { // TreatmentTec ?>
		<td data-name="TreatmentTec">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentTec" class="form-group ivf_treatment_plan_TreatmentTec">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TreatmentTec->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TreatmentTec->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TreatmentTec" class="form-group ivf_treatment_plan_TreatmentTec">
<span<?php echo $ivf_treatment_plan_grid->TreatmentTec->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->TreatmentTec->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TreatmentTec" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TreatmentTec" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TreatmentTec->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->TypeOfCycle->Visible) { // TypeOfCycle ?>
		<td data-name="TypeOfCycle">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TypeOfCycle" class="form-group ivf_treatment_plan_TypeOfCycle">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" data-value-separator="<?php echo $ivf_treatment_plan_grid->TypeOfCycle->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="{value}"<?php echo $ivf_treatment_plan_grid->TypeOfCycle->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->TypeOfCycle->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_TypeOfCycle") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TypeOfCycle" class="form-group ivf_treatment_plan_TypeOfCycle">
<span<?php echo $ivf_treatment_plan_grid->TypeOfCycle->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->TypeOfCycle->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TypeOfCycle->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TypeOfCycle" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TypeOfCycle" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TypeOfCycle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->SpermOrgin->Visible) { // SpermOrgin ?>
		<td data-name="SpermOrgin">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_SpermOrgin" class="form-group ivf_treatment_plan_SpermOrgin">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" data-value-separator="<?php echo $ivf_treatment_plan_grid->SpermOrgin->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin"<?php echo $ivf_treatment_plan_grid->SpermOrgin->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->SpermOrgin->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_SpermOrgin") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_SpermOrgin" class="form-group ivf_treatment_plan_SpermOrgin">
<span<?php echo $ivf_treatment_plan_grid->SpermOrgin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->SpermOrgin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SpermOrgin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SpermOrgin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SpermOrgin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SpermOrgin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->State->Visible) { // State ?>
		<td data-name="State">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_State" class="form-group ivf_treatment_plan_State">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_State" data-value-separator="<?php echo $ivf_treatment_plan_grid->State->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State"<?php echo $ivf_treatment_plan_grid->State->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->State->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_State") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_State" class="form-group ivf_treatment_plan_State">
<span<?php echo $ivf_treatment_plan_grid->State->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->State->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->State->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_State" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_State" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->State->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->Origin->Visible) { // Origin ?>
		<td data-name="Origin">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Origin" class="form-group ivf_treatment_plan_Origin">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Origin->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Origin->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Origin" class="form-group ivf_treatment_plan_Origin">
<span<?php echo $ivf_treatment_plan_grid->Origin->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->Origin->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Origin" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Origin" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Origin->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->MACS->Visible) { // MACS ?>
		<td data-name="MACS">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_MACS" class="form-group ivf_treatment_plan_MACS">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_MACS" data-value-separator="<?php echo $ivf_treatment_plan_grid->MACS->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="{value}"<?php echo $ivf_treatment_plan_grid->MACS->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->MACS->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_MACS") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_MACS" class="form-group ivf_treatment_plan_MACS">
<span<?php echo $ivf_treatment_plan_grid->MACS->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->MACS->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MACS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MACS" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MACS" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MACS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->Technique->Visible) { // Technique ?>
		<td data-name="Technique">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Technique" class="form-group ivf_treatment_plan_Technique">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Technique->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Technique->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Technique" class="form-group ivf_treatment_plan_Technique">
<span<?php echo $ivf_treatment_plan_grid->Technique->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->Technique->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Technique" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Technique" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Technique->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->PgdPlanning->Visible) { // PgdPlanning ?>
		<td data-name="PgdPlanning">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_PgdPlanning" class="form-group ivf_treatment_plan_PgdPlanning">
<div id="tp_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" class="ew-template"><input type="radio" class="custom-control-input" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" data-value-separator="<?php echo $ivf_treatment_plan_grid->PgdPlanning->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="{value}"<?php echo $ivf_treatment_plan_grid->PgdPlanning->editAttributes() ?>></div>
<div id="dsl_x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $ivf_treatment_plan_grid->PgdPlanning->radioButtonListHtml(FALSE, "x{$ivf_treatment_plan_grid->RowIndex}_PgdPlanning") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_PgdPlanning" class="form-group ivf_treatment_plan_PgdPlanning">
<span<?php echo $ivf_treatment_plan_grid->PgdPlanning->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->PgdPlanning->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->PgdPlanning->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_PgdPlanning" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_PgdPlanning" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->PgdPlanning->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->IMSI->Visible) { // IMSI ?>
		<td data-name="IMSI">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_IMSI" class="form-group ivf_treatment_plan_IMSI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->IMSI->EditValue ?>"<?php echo $ivf_treatment_plan_grid->IMSI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_IMSI" class="form-group ivf_treatment_plan_IMSI">
<span<?php echo $ivf_treatment_plan_grid->IMSI->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->IMSI->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_IMSI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_IMSI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->IMSI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->SequentialCulture->Visible) { // SequentialCulture ?>
		<td data-name="SequentialCulture">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_SequentialCulture" class="form-group ivf_treatment_plan_SequentialCulture">
<input type="text" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->SequentialCulture->EditValue ?>"<?php echo $ivf_treatment_plan_grid->SequentialCulture->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_SequentialCulture" class="form-group ivf_treatment_plan_SequentialCulture">
<span<?php echo $ivf_treatment_plan_grid->SequentialCulture->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->SequentialCulture->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_SequentialCulture" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_SequentialCulture" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->SequentialCulture->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->TimeLapse->Visible) { // TimeLapse ?>
		<td data-name="TimeLapse">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_TimeLapse" class="form-group ivf_treatment_plan_TimeLapse">
<input type="text" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->TimeLapse->EditValue ?>"<?php echo $ivf_treatment_plan_grid->TimeLapse->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_TimeLapse" class="form-group ivf_treatment_plan_TimeLapse">
<span<?php echo $ivf_treatment_plan_grid->TimeLapse->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->TimeLapse->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_TimeLapse" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_TimeLapse" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->TimeLapse->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->AH->Visible) { // AH ?>
		<td data-name="AH">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_AH" class="form-group ivf_treatment_plan_AH">
<input type="text" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->AH->EditValue ?>"<?php echo $ivf_treatment_plan_grid->AH->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_AH" class="form-group ivf_treatment_plan_AH">
<span<?php echo $ivf_treatment_plan_grid->AH->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->AH->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_AH" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_AH" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->AH->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->Weight->Visible) { // Weight ?>
		<td data-name="Weight">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_Weight" class="form-group ivf_treatment_plan_Weight">
<input type="text" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->Weight->EditValue ?>"<?php echo $ivf_treatment_plan_grid->Weight->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_Weight" class="form-group ivf_treatment_plan_Weight">
<span<?php echo $ivf_treatment_plan_grid->Weight->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->Weight->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_Weight" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_Weight" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->Weight->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->BMI->Visible) { // BMI ?>
		<td data-name="BMI">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_BMI" class="form-group ivf_treatment_plan_BMI">
<input type="text" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->getPlaceHolder()) ?>" value="<?php echo $ivf_treatment_plan_grid->BMI->EditValue ?>"<?php echo $ivf_treatment_plan_grid->BMI->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_BMI" class="form-group ivf_treatment_plan_BMI">
<span<?php echo $ivf_treatment_plan_grid->BMI->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->BMI->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_BMI" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_BMI" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->BMI->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->MaleIndications->Visible) { // MaleIndications ?>
		<td data-name="MaleIndications">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_MaleIndications" class="form-group ivf_treatment_plan_MaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_MaleIndications" data-value-separator="<?php echo $ivf_treatment_plan_grid->MaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications"<?php echo $ivf_treatment_plan_grid->MaleIndications->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->MaleIndications->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_MaleIndications") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_MaleIndications" class="form-group ivf_treatment_plan_MaleIndications">
<span<?php echo $ivf_treatment_plan_grid->MaleIndications->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->MaleIndications->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MaleIndications->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_MaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_MaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->MaleIndications->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_treatment_plan_grid->FemaleIndications->Visible) { // FemaleIndications ?>
		<td data-name="FemaleIndications">
<?php if (!$ivf_treatment_plan->isConfirm()) { ?>
<span id="el$rowindex$_ivf_treatment_plan_FemaleIndications" class="form-group ivf_treatment_plan_FemaleIndications">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" data-value-separator="<?php echo $ivf_treatment_plan_grid->FemaleIndications->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications"<?php echo $ivf_treatment_plan_grid->FemaleIndications->editAttributes() ?>>
			<?php echo $ivf_treatment_plan_grid->FemaleIndications->selectOptionListHtml("x{$ivf_treatment_plan_grid->RowIndex}_FemaleIndications") ?>
		</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_treatment_plan_FemaleIndications" class="form-group ivf_treatment_plan_FemaleIndications">
<span<?php echo $ivf_treatment_plan_grid->FemaleIndications->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($ivf_treatment_plan_grid->FemaleIndications->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="x<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->FemaleIndications->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_treatment_plan" data-field="x_FemaleIndications" name="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" id="o<?php echo $ivf_treatment_plan_grid->RowIndex ?>_FemaleIndications" value="<?php echo HtmlEncode($ivf_treatment_plan_grid->FemaleIndications->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_treatment_plan_grid->ListOptions->render("body", "right", $ivf_treatment_plan_grid->RowIndex);
?>
<script>
loadjs.ready(["fivf_treatment_plangrid", "load"], function() {
	fivf_treatment_plangrid.updateLists(<?php echo $ivf_treatment_plan_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($ivf_treatment_plan_grid->Recordset)
	$ivf_treatment_plan_grid->Recordset->Close();
?>
<?php if ($ivf_treatment_plan_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_treatment_plan_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_treatment_plan_grid->TotalRecords == 0 && !$ivf_treatment_plan->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_treatment_plan_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$ivf_treatment_plan_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php if (!$ivf_treatment_plan->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function() {
	ew.fixedHeaderTable({
		delay: 0,
		scrollbars: false,
		container: "gmp_ivf_treatment_plan",
		width: "95%",
		height: ""
	});
});
</script>
<?php } ?>
<?php } ?>
<?php
$ivf_treatment_plan_grid->terminate();
?>
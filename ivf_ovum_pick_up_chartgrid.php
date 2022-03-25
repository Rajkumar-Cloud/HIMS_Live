<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_ovum_pick_up_chart_grid))
	$ivf_ovum_pick_up_chart_grid = new ivf_ovum_pick_up_chart_grid();

// Run the page
$ivf_ovum_pick_up_chart_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_ovum_pick_up_chart_grid->Page_Render();
?>
<?php if (!$ivf_ovum_pick_up_chart->isExport()) { ?>
<script>

// Form object
var fivf_ovum_pick_up_chartgrid = new ew.Form("fivf_ovum_pick_up_chartgrid", "grid");
fivf_ovum_pick_up_chartgrid.formKeyCountName = '<?php echo $ivf_ovum_pick_up_chart_grid->FormKeyCountName ?>';

// Validate form
fivf_ovum_pick_up_chartgrid.validate = function() {
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
		<?php if ($ivf_ovum_pick_up_chart_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->id->caption(), $ivf_ovum_pick_up_chart->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->RIDNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->RIDNo->caption(), $ivf_ovum_pick_up_chart->RIDNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->RIDNo->errorMessage()) ?>");
		<?php if ($ivf_ovum_pick_up_chart_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Name->caption(), $ivf_ovum_pick_up_chart->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->ARTCycle->Required) { ?>
			elm = this.getElements("x" + infix + "_ARTCycle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ARTCycle->caption(), $ivf_ovum_pick_up_chart->ARTCycle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->Consultant->Required) { ?>
			elm = this.getElements("x" + infix + "_Consultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Consultant->caption(), $ivf_ovum_pick_up_chart->Consultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->TotalDoseOfStimulation->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalDoseOfStimulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption(), $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->Protocol->Required) { ?>
			elm = this.getElements("x" + infix + "_Protocol");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Protocol->caption(), $ivf_ovum_pick_up_chart->Protocol->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->NumberOfDaysOfStimulation->Required) { ?>
			elm = this.getElements("x" + infix + "_NumberOfDaysOfStimulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption(), $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->TriggerDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_TriggerDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TriggerDateTime->caption(), $ivf_ovum_pick_up_chart->TriggerDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TriggerDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->TriggerDateTime->errorMessage()) ?>");
		<?php if ($ivf_ovum_pick_up_chart_grid->OPUDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_OPUDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->OPUDateTime->caption(), $ivf_ovum_pick_up_chart->OPUDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_OPUDateTime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->OPUDateTime->errorMessage()) ?>");
		<?php if ($ivf_ovum_pick_up_chart_grid->HoursAfterTrigger->Required) { ?>
			elm = this.getElements("x" + infix + "_HoursAfterTrigger");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption(), $ivf_ovum_pick_up_chart->HoursAfterTrigger->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->SerumE2->Required) { ?>
			elm = this.getElements("x" + infix + "_SerumE2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->SerumE2->caption(), $ivf_ovum_pick_up_chart->SerumE2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->SerumP4->Required) { ?>
			elm = this.getElements("x" + infix + "_SerumP4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->SerumP4->caption(), $ivf_ovum_pick_up_chart->SerumP4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->FORT->Required) { ?>
			elm = this.getElements("x" + infix + "_FORT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->FORT->caption(), $ivf_ovum_pick_up_chart->FORT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->ExperctedOocytes->Required) { ?>
			elm = this.getElements("x" + infix + "_ExperctedOocytes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ExperctedOocytes->caption(), $ivf_ovum_pick_up_chart->ExperctedOocytes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->NoOfOocytesRetrieved->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfOocytesRetrieved");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption(), $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->OocytesRetreivalRate->Required) { ?>
			elm = this.getElements("x" + infix + "_OocytesRetreivalRate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption(), $ivf_ovum_pick_up_chart->OocytesRetreivalRate->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->Anesthesia->Required) { ?>
			elm = this.getElements("x" + infix + "_Anesthesia");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Anesthesia->caption(), $ivf_ovum_pick_up_chart->Anesthesia->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->TrialCannulation->Required) { ?>
			elm = this.getElements("x" + infix + "_TrialCannulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TrialCannulation->caption(), $ivf_ovum_pick_up_chart->TrialCannulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->UCL->Required) { ?>
			elm = this.getElements("x" + infix + "_UCL");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->UCL->caption(), $ivf_ovum_pick_up_chart->UCL->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->Angle->Required) { ?>
			elm = this.getElements("x" + infix + "_Angle");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Angle->caption(), $ivf_ovum_pick_up_chart->Angle->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->EMS->Required) { ?>
			elm = this.getElements("x" + infix + "_EMS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->EMS->caption(), $ivf_ovum_pick_up_chart->EMS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->Cannulation->Required) { ?>
			elm = this.getElements("x" + infix + "_Cannulation");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->Cannulation->caption(), $ivf_ovum_pick_up_chart->Cannulation->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->NoOfOocytesRetrievedd->Required) { ?>
			elm = this.getElements("x" + infix + "_NoOfOocytesRetrievedd");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption(), $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->PlanT->Required) { ?>
			elm = this.getElements("x" + infix + "_PlanT");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->PlanT->caption(), $ivf_ovum_pick_up_chart->PlanT->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->ReviewDate->Required) { ?>
			elm = this.getElements("x" + infix + "_ReviewDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ReviewDate->caption(), $ivf_ovum_pick_up_chart->ReviewDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_ReviewDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->ReviewDate->errorMessage()) ?>");
		<?php if ($ivf_ovum_pick_up_chart_grid->ReviewDoctor->Required) { ?>
			elm = this.getElements("x" + infix + "_ReviewDoctor");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->ReviewDoctor->caption(), $ivf_ovum_pick_up_chart->ReviewDoctor->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_ovum_pick_up_chart_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_ovum_pick_up_chart->TidNo->caption(), $ivf_ovum_pick_up_chart->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_ovum_pick_up_chart->TidNo->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_ovum_pick_up_chartgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "ARTCycle", false)) return false;
	if (ew.valueChanged(fobj, infix, "Consultant", false)) return false;
	if (ew.valueChanged(fobj, infix, "TotalDoseOfStimulation", false)) return false;
	if (ew.valueChanged(fobj, infix, "Protocol", false)) return false;
	if (ew.valueChanged(fobj, infix, "NumberOfDaysOfStimulation", false)) return false;
	if (ew.valueChanged(fobj, infix, "TriggerDateTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "OPUDateTime", false)) return false;
	if (ew.valueChanged(fobj, infix, "HoursAfterTrigger", false)) return false;
	if (ew.valueChanged(fobj, infix, "SerumE2", false)) return false;
	if (ew.valueChanged(fobj, infix, "SerumP4", false)) return false;
	if (ew.valueChanged(fobj, infix, "FORT", false)) return false;
	if (ew.valueChanged(fobj, infix, "ExperctedOocytes", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoOfOocytesRetrieved", false)) return false;
	if (ew.valueChanged(fobj, infix, "OocytesRetreivalRate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Anesthesia", false)) return false;
	if (ew.valueChanged(fobj, infix, "TrialCannulation", false)) return false;
	if (ew.valueChanged(fobj, infix, "UCL", false)) return false;
	if (ew.valueChanged(fobj, infix, "Angle", false)) return false;
	if (ew.valueChanged(fobj, infix, "EMS", false)) return false;
	if (ew.valueChanged(fobj, infix, "Cannulation", false)) return false;
	if (ew.valueChanged(fobj, infix, "NoOfOocytesRetrievedd", false)) return false;
	if (ew.valueChanged(fobj, infix, "PlanT", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReviewDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "ReviewDoctor", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_ovum_pick_up_chartgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_ovum_pick_up_chartgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_ovum_pick_up_chartgrid.lists["x_Protocol"] = <?php echo $ivf_ovum_pick_up_chart_grid->Protocol->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartgrid.lists["x_Protocol"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_grid->Protocol->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartgrid.lists["x_Cannulation"] = <?php echo $ivf_ovum_pick_up_chart_grid->Cannulation->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartgrid.lists["x_Cannulation"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_grid->Cannulation->options(FALSE, TRUE)) ?>;
fivf_ovum_pick_up_chartgrid.lists["x_PlanT"] = <?php echo $ivf_ovum_pick_up_chart_grid->PlanT->Lookup->toClientList() ?>;
fivf_ovum_pick_up_chartgrid.lists["x_PlanT"].options = <?php echo JsonEncode($ivf_ovum_pick_up_chart_grid->PlanT->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<?php } ?>
<?php
$ivf_ovum_pick_up_chart_grid->renderOtherOptions();
?>
<?php $ivf_ovum_pick_up_chart_grid->showPageHeader(); ?>
<?php
$ivf_ovum_pick_up_chart_grid->showMessage();
?>
<?php if ($ivf_ovum_pick_up_chart_grid->TotalRecs > 0 || $ivf_ovum_pick_up_chart->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_ovum_pick_up_chart_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_ovum_pick_up_chart">
<?php if ($ivf_ovum_pick_up_chart_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_ovum_pick_up_chart_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_ovum_pick_up_chartgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_ovum_pick_up_chart" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_ovum_pick_up_chartgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_ovum_pick_up_chart_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_ovum_pick_up_chart_grid->renderListOptions();

// Render list options (header, left)
$ivf_ovum_pick_up_chart_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_ovum_pick_up_chart->id->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_ovum_pick_up_chart->id->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->RIDNo) == "") { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_ovum_pick_up_chart->RIDNo->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->RIDNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNo" class="<?php echo $ivf_ovum_pick_up_chart->RIDNo->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->RIDNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->RIDNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_ovum_pick_up_chart->Name->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_ovum_pick_up_chart->Name->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->ARTCycle) == "") { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ARTCycle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ARTCycle" class="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->ARTCycle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->ARTCycle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_ovum_pick_up_chart->Consultant->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_ovum_pick_up_chart->Consultant->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->TotalDoseOfStimulation) == "") { ?>
		<th data-name="TotalDoseOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalDoseOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Protocol) == "") { ?>
		<th data-name="Protocol" class="<?php echo $ivf_ovum_pick_up_chart->Protocol->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Protocol->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Protocol" class="<?php echo $ivf_ovum_pick_up_chart->Protocol->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Protocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Protocol->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Protocol->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation) == "") { ?>
		<th data-name="NumberOfDaysOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NumberOfDaysOfStimulation" class="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->TriggerDateTime) == "") { ?>
		<th data-name="TriggerDateTime" class="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TriggerDateTime" class="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->TriggerDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->OPUDateTime) == "") { ?>
		<th data-name="OPUDateTime" class="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OPUDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OPUDateTime" class="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OPUDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->OPUDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->OPUDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->HoursAfterTrigger) == "") { ?>
		<th data-name="HoursAfterTrigger" class="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HoursAfterTrigger" class="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->HoursAfterTrigger->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->SerumE2) == "") { ?>
		<th data-name="SerumE2" class="<?php echo $ivf_ovum_pick_up_chart->SerumE2->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumE2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerumE2" class="<?php echo $ivf_ovum_pick_up_chart->SerumE2->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumE2->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->SerumE2->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->SerumE2->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->SerumP4) == "") { ?>
		<th data-name="SerumP4" class="<?php echo $ivf_ovum_pick_up_chart->SerumP4->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumP4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SerumP4" class="<?php echo $ivf_ovum_pick_up_chart->SerumP4->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->SerumP4->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->SerumP4->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->SerumP4->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->FORT) == "") { ?>
		<th data-name="FORT" class="<?php echo $ivf_ovum_pick_up_chart->FORT->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->FORT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FORT" class="<?php echo $ivf_ovum_pick_up_chart->FORT->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->FORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->FORT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->FORT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->ExperctedOocytes) == "") { ?>
		<th data-name="ExperctedOocytes" class="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ExperctedOocytes" class="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->ExperctedOocytes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved) == "") { ?>
		<th data-name="NoOfOocytesRetrieved" class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytesRetrieved" class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->OocytesRetreivalRate) == "") { ?>
		<th data-name="OocytesRetreivalRate" class="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="OocytesRetreivalRate" class="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Anesthesia) == "") { ?>
		<th data-name="Anesthesia" class="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Anesthesia->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthesia" class="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Anesthesia->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Anesthesia->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Anesthesia->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->TrialCannulation) == "") { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TrialCannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TrialCannulation" class="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TrialCannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->TrialCannulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->TrialCannulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->UCL) == "") { ?>
		<th data-name="UCL" class="<?php echo $ivf_ovum_pick_up_chart->UCL->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->UCL->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="UCL" class="<?php echo $ivf_ovum_pick_up_chart->UCL->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->UCL->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->UCL->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->UCL->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Angle) == "") { ?>
		<th data-name="Angle" class="<?php echo $ivf_ovum_pick_up_chart->Angle->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Angle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Angle" class="<?php echo $ivf_ovum_pick_up_chart->Angle->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Angle->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Angle->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Angle->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->EMS) == "") { ?>
		<th data-name="EMS" class="<?php echo $ivf_ovum_pick_up_chart->EMS->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->EMS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EMS" class="<?php echo $ivf_ovum_pick_up_chart->EMS->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->EMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->EMS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->EMS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->Cannulation) == "") { ?>
		<th data-name="Cannulation" class="<?php echo $ivf_ovum_pick_up_chart->Cannulation->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Cannulation->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Cannulation" class="<?php echo $ivf_ovum_pick_up_chart->Cannulation->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->Cannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->Cannulation->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->Cannulation->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd) == "") { ?>
		<th data-name="NoOfOocytesRetrievedd" class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NoOfOocytesRetrievedd" class="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->PlanT) == "") { ?>
		<th data-name="PlanT" class="<?php echo $ivf_ovum_pick_up_chart->PlanT->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->PlanT->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PlanT" class="<?php echo $ivf_ovum_pick_up_chart->PlanT->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->PlanT->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->PlanT->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->PlanT->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->ReviewDate) == "") { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDate" class="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->ReviewDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->ReviewDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->ReviewDoctor) == "") { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ReviewDoctor" class="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->ReviewDoctor->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_ovum_pick_up_chart->sortUrl($ivf_ovum_pick_up_chart->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_ovum_pick_up_chart->TidNo->headerCellClass() ?>"><div id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_ovum_pick_up_chart->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_ovum_pick_up_chart->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_ovum_pick_up_chart->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_ovum_pick_up_chart->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_ovum_pick_up_chart_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_ovum_pick_up_chart_grid->StartRec = 1;
$ivf_ovum_pick_up_chart_grid->StopRec = $ivf_ovum_pick_up_chart_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_ovum_pick_up_chart_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_ovum_pick_up_chart_grid->FormKeyCountName) && ($ivf_ovum_pick_up_chart->isGridAdd() || $ivf_ovum_pick_up_chart->isGridEdit() || $ivf_ovum_pick_up_chart->isConfirm())) {
		$ivf_ovum_pick_up_chart_grid->KeyCount = $CurrentForm->getValue($ivf_ovum_pick_up_chart_grid->FormKeyCountName);
		$ivf_ovum_pick_up_chart_grid->StopRec = $ivf_ovum_pick_up_chart_grid->StartRec + $ivf_ovum_pick_up_chart_grid->KeyCount - 1;
	}
}
$ivf_ovum_pick_up_chart_grid->RecCnt = $ivf_ovum_pick_up_chart_grid->StartRec - 1;
if ($ivf_ovum_pick_up_chart_grid->Recordset && !$ivf_ovum_pick_up_chart_grid->Recordset->EOF) {
	$ivf_ovum_pick_up_chart_grid->Recordset->moveFirst();
	$selectLimit = $ivf_ovum_pick_up_chart_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_ovum_pick_up_chart_grid->StartRec > 1)
		$ivf_ovum_pick_up_chart_grid->Recordset->move($ivf_ovum_pick_up_chart_grid->StartRec - 1);
} elseif (!$ivf_ovum_pick_up_chart->AllowAddDeleteRow && $ivf_ovum_pick_up_chart_grid->StopRec == 0) {
	$ivf_ovum_pick_up_chart_grid->StopRec = $ivf_ovum_pick_up_chart->GridAddRowCount;
}

// Initialize aggregate
$ivf_ovum_pick_up_chart->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_ovum_pick_up_chart->resetAttributes();
$ivf_ovum_pick_up_chart_grid->renderRow();
if ($ivf_ovum_pick_up_chart->isGridAdd())
	$ivf_ovum_pick_up_chart_grid->RowIndex = 0;
if ($ivf_ovum_pick_up_chart->isGridEdit())
	$ivf_ovum_pick_up_chart_grid->RowIndex = 0;
while ($ivf_ovum_pick_up_chart_grid->RecCnt < $ivf_ovum_pick_up_chart_grid->StopRec) {
	$ivf_ovum_pick_up_chart_grid->RecCnt++;
	if ($ivf_ovum_pick_up_chart_grid->RecCnt >= $ivf_ovum_pick_up_chart_grid->StartRec) {
		$ivf_ovum_pick_up_chart_grid->RowCnt++;
		if ($ivf_ovum_pick_up_chart->isGridAdd() || $ivf_ovum_pick_up_chart->isGridEdit() || $ivf_ovum_pick_up_chart->isConfirm()) {
			$ivf_ovum_pick_up_chart_grid->RowIndex++;
			$CurrentForm->Index = $ivf_ovum_pick_up_chart_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_ovum_pick_up_chart_grid->FormActionName) && $ivf_ovum_pick_up_chart_grid->EventCancelled)
				$ivf_ovum_pick_up_chart_grid->RowAction = strval($CurrentForm->getValue($ivf_ovum_pick_up_chart_grid->FormActionName));
			elseif ($ivf_ovum_pick_up_chart->isGridAdd())
				$ivf_ovum_pick_up_chart_grid->RowAction = "insert";
			else
				$ivf_ovum_pick_up_chart_grid->RowAction = "";
		}

		// Set up key count
		$ivf_ovum_pick_up_chart_grid->KeyCount = $ivf_ovum_pick_up_chart_grid->RowIndex;

		// Init row class and style
		$ivf_ovum_pick_up_chart->resetAttributes();
		$ivf_ovum_pick_up_chart->CssClass = "";
		if ($ivf_ovum_pick_up_chart->isGridAdd()) {
			if ($ivf_ovum_pick_up_chart->CurrentMode == "copy") {
				$ivf_ovum_pick_up_chart_grid->loadRowValues($ivf_ovum_pick_up_chart_grid->Recordset); // Load row values
				$ivf_ovum_pick_up_chart_grid->setRecordKey($ivf_ovum_pick_up_chart_grid->RowOldKey, $ivf_ovum_pick_up_chart_grid->Recordset); // Set old record key
			} else {
				$ivf_ovum_pick_up_chart_grid->loadRowValues(); // Load default values
				$ivf_ovum_pick_up_chart_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_ovum_pick_up_chart_grid->loadRowValues($ivf_ovum_pick_up_chart_grid->Recordset); // Load row values
		}
		$ivf_ovum_pick_up_chart->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_ovum_pick_up_chart->isGridAdd()) // Grid add
			$ivf_ovum_pick_up_chart->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_ovum_pick_up_chart->isGridAdd() && $ivf_ovum_pick_up_chart->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_ovum_pick_up_chart_grid->restoreCurrentRowFormValues($ivf_ovum_pick_up_chart_grid->RowIndex); // Restore form values
		if ($ivf_ovum_pick_up_chart->isGridEdit()) { // Grid edit
			if ($ivf_ovum_pick_up_chart->EventCancelled)
				$ivf_ovum_pick_up_chart_grid->restoreCurrentRowFormValues($ivf_ovum_pick_up_chart_grid->RowIndex); // Restore form values
			if ($ivf_ovum_pick_up_chart_grid->RowAction == "insert")
				$ivf_ovum_pick_up_chart->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_ovum_pick_up_chart->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_ovum_pick_up_chart->isGridEdit() && ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT || $ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) && $ivf_ovum_pick_up_chart->EventCancelled) // Update failed
			$ivf_ovum_pick_up_chart_grid->restoreCurrentRowFormValues($ivf_ovum_pick_up_chart_grid->RowIndex); // Restore form values
		if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_ovum_pick_up_chart_grid->EditRowCnt++;
		if ($ivf_ovum_pick_up_chart->isConfirm()) // Confirm row
			$ivf_ovum_pick_up_chart_grid->restoreCurrentRowFormValues($ivf_ovum_pick_up_chart_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_ovum_pick_up_chart->RowAttrs = array_merge($ivf_ovum_pick_up_chart->RowAttrs, array('data-rowindex'=>$ivf_ovum_pick_up_chart_grid->RowCnt, 'id'=>'r' . $ivf_ovum_pick_up_chart_grid->RowCnt . '_ivf_ovum_pick_up_chart', 'data-rowtype'=>$ivf_ovum_pick_up_chart->RowType));

		// Render row
		$ivf_ovum_pick_up_chart_grid->renderRow();

		// Render list options
		$ivf_ovum_pick_up_chart_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_ovum_pick_up_chart_grid->RowAction <> "delete" && $ivf_ovum_pick_up_chart_grid->RowAction <> "insertdelete" && !($ivf_ovum_pick_up_chart_grid->RowAction == "insert" && $ivf_ovum_pick_up_chart->isConfirm() && $ivf_ovum_pick_up_chart_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_ovum_pick_up_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_ovum_pick_up_chart_grid->ListOptions->render("body", "left", $ivf_ovum_pick_up_chart_grid->RowCnt);
?>
	<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_ovum_pick_up_chart->id->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_id" class="form-group ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_id" class="ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart->id->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo"<?php echo $ivf_ovum_pick_up_chart->RIDNo->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_RIDNo" class="form-group ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_RIDNo" class="form-group ivf_ovum_pick_up_chart_RIDNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->RIDNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_RIDNo" class="form-group ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_RIDNo" class="form-group ivf_ovum_pick_up_chart_RIDNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->RIDNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_RIDNo" class="ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart->RIDNo->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->RIDNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_ovum_pick_up_chart->Name->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_ovum_pick_up_chart->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Name" class="form-group ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Name" class="form-group ivf_ovum_pick_up_chart_Name">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Name->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_ovum_pick_up_chart->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Name" class="form-group ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Name" class="form-group ivf_ovum_pick_up_chart_Name">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Name->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Name" class="ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart->Name->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle"<?php echo $ivf_ovum_pick_up_chart->ARTCycle->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ARTCycle" class="form-group ivf_ovum_pick_up_chart_ARTCycle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ARTCycle->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ARTCycle" class="form-group ivf_ovum_pick_up_chart_ARTCycle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ARTCycle->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ARTCycle" class="ivf_ovum_pick_up_chart_ARTCycle">
<span<?php echo $ivf_ovum_pick_up_chart->ARTCycle->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ARTCycle->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $ivf_ovum_pick_up_chart->Consultant->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Consultant" class="form-group ivf_ovum_pick_up_chart_Consultant">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Consultant->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Consultant->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Consultant" class="form-group ivf_ovum_pick_up_chart_Consultant">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Consultant->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Consultant->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Consultant" class="ivf_ovum_pick_up_chart_Consultant">
<span<?php echo $ivf_ovum_pick_up_chart->Consultant->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Consultant->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<td data-name="TotalDoseOfStimulation"<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="form-group ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="form-group ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
		<td data-name="Protocol"<?php echo $ivf_ovum_pick_up_chart->Protocol->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Protocol" class="form-group ivf_ovum_pick_up_chart_Protocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->Protocol->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol"<?php echo $ivf_ovum_pick_up_chart->Protocol->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->Protocol->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Protocol->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Protocol" class="form-group ivf_ovum_pick_up_chart_Protocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->Protocol->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol"<?php echo $ivf_ovum_pick_up_chart->Protocol->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->Protocol->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Protocol" class="ivf_ovum_pick_up_chart_Protocol">
<span<?php echo $ivf_ovum_pick_up_chart->Protocol->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Protocol->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Protocol->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Protocol->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Protocol->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Protocol->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<td data-name="NumberOfDaysOfStimulation"<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="form-group ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="form-group ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<td data-name="TriggerDateTime"<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TriggerDateTime" class="form-group ivf_ovum_pick_up_chart_TriggerDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->TriggerDateTime->ReadOnly && !$ivf_ovum_pick_up_chart->TriggerDateTime->Disabled && !isset($ivf_ovum_pick_up_chart->TriggerDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->TriggerDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TriggerDateTime" class="form-group ivf_ovum_pick_up_chart_TriggerDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->TriggerDateTime->ReadOnly && !$ivf_ovum_pick_up_chart->TriggerDateTime->Disabled && !isset($ivf_ovum_pick_up_chart->TriggerDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->TriggerDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TriggerDateTime" class="ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
		<td data-name="OPUDateTime"<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_OPUDateTime" class="form-group ivf_ovum_pick_up_chart_OPUDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->OPUDateTime->ReadOnly && !$ivf_ovum_pick_up_chart->OPUDateTime->Disabled && !isset($ivf_ovum_pick_up_chart->OPUDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->OPUDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_OPUDateTime" class="form-group ivf_ovum_pick_up_chart_OPUDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->OPUDateTime->ReadOnly && !$ivf_ovum_pick_up_chart->OPUDateTime->Disabled && !isset($ivf_ovum_pick_up_chart->OPUDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->OPUDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_OPUDateTime" class="ivf_ovum_pick_up_chart_OPUDateTime">
<span<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<td data-name="HoursAfterTrigger"<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="form-group ivf_ovum_pick_up_chart_HoursAfterTrigger">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="form-group ivf_ovum_pick_up_chart_HoursAfterTrigger">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
		<td data-name="SerumE2"<?php echo $ivf_ovum_pick_up_chart->SerumE2->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_SerumE2" class="form-group ivf_ovum_pick_up_chart_SerumE2">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->SerumE2->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->SerumE2->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_SerumE2" class="form-group ivf_ovum_pick_up_chart_SerumE2">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->SerumE2->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->SerumE2->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_SerumE2" class="ivf_ovum_pick_up_chart_SerumE2">
<span<?php echo $ivf_ovum_pick_up_chart->SerumE2->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->SerumE2->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
		<td data-name="SerumP4"<?php echo $ivf_ovum_pick_up_chart->SerumP4->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_SerumP4" class="form-group ivf_ovum_pick_up_chart_SerumP4">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->SerumP4->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->SerumP4->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_SerumP4" class="form-group ivf_ovum_pick_up_chart_SerumP4">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->SerumP4->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->SerumP4->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_SerumP4" class="ivf_ovum_pick_up_chart_SerumP4">
<span<?php echo $ivf_ovum_pick_up_chart->SerumP4->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->SerumP4->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
		<td data-name="FORT"<?php echo $ivf_ovum_pick_up_chart->FORT->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_FORT" class="form-group ivf_ovum_pick_up_chart_FORT">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->FORT->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->FORT->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_FORT" class="form-group ivf_ovum_pick_up_chart_FORT">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->FORT->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->FORT->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_FORT" class="ivf_ovum_pick_up_chart_FORT">
<span<?php echo $ivf_ovum_pick_up_chart->FORT->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->FORT->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<td data-name="ExperctedOocytes"<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ExperctedOocytes" class="form-group ivf_ovum_pick_up_chart_ExperctedOocytes">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ExperctedOocytes" class="form-group ivf_ovum_pick_up_chart_ExperctedOocytes">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ExperctedOocytes" class="ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<td data-name="NoOfOocytesRetrieved"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="form-group ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="form-group ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<td data-name="OocytesRetreivalRate"<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="form-group ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="form-group ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
		<td data-name="Anesthesia"<?php echo $ivf_ovum_pick_up_chart->Anesthesia->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Anesthesia" class="form-group ivf_ovum_pick_up_chart_Anesthesia">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Anesthesia->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Anesthesia" class="form-group ivf_ovum_pick_up_chart_Anesthesia">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Anesthesia->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Anesthesia" class="ivf_ovum_pick_up_chart_Anesthesia">
<span<?php echo $ivf_ovum_pick_up_chart->Anesthesia->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Anesthesia->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation"<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TrialCannulation" class="form-group ivf_ovum_pick_up_chart_TrialCannulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TrialCannulation" class="form-group ivf_ovum_pick_up_chart_TrialCannulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TrialCannulation" class="ivf_ovum_pick_up_chart_TrialCannulation">
<span<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
		<td data-name="UCL"<?php echo $ivf_ovum_pick_up_chart->UCL->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_UCL" class="form-group ivf_ovum_pick_up_chart_UCL">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->UCL->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->UCL->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_UCL" class="form-group ivf_ovum_pick_up_chart_UCL">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->UCL->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->UCL->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_UCL" class="ivf_ovum_pick_up_chart_UCL">
<span<?php echo $ivf_ovum_pick_up_chart->UCL->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->UCL->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
		<td data-name="Angle"<?php echo $ivf_ovum_pick_up_chart->Angle->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Angle" class="form-group ivf_ovum_pick_up_chart_Angle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Angle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Angle->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Angle" class="form-group ivf_ovum_pick_up_chart_Angle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Angle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Angle->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Angle" class="ivf_ovum_pick_up_chart_Angle">
<span<?php echo $ivf_ovum_pick_up_chart->Angle->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Angle->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
		<td data-name="EMS"<?php echo $ivf_ovum_pick_up_chart->EMS->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_EMS" class="form-group ivf_ovum_pick_up_chart_EMS">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->EMS->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->EMS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_EMS" class="form-group ivf_ovum_pick_up_chart_EMS">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->EMS->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->EMS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_EMS" class="ivf_ovum_pick_up_chart_EMS">
<span<?php echo $ivf_ovum_pick_up_chart->EMS->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->EMS->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
		<td data-name="Cannulation"<?php echo $ivf_ovum_pick_up_chart->Cannulation->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Cannulation" class="form-group ivf_ovum_pick_up_chart_Cannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->Cannulation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation"<?php echo $ivf_ovum_pick_up_chart->Cannulation->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->Cannulation->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Cannulation->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Cannulation" class="form-group ivf_ovum_pick_up_chart_Cannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->Cannulation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation"<?php echo $ivf_ovum_pick_up_chart->Cannulation->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->Cannulation->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_Cannulation" class="ivf_ovum_pick_up_chart_Cannulation">
<span<?php echo $ivf_ovum_pick_up_chart->Cannulation->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->Cannulation->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Cannulation->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Cannulation->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Cannulation->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Cannulation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<td data-name="NoOfOocytesRetrievedd"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="form-group ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="form-group ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
		<td data-name="PlanT"<?php echo $ivf_ovum_pick_up_chart->PlanT->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_PlanT" class="form-group ivf_ovum_pick_up_chart_PlanT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->PlanT->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT"<?php echo $ivf_ovum_pick_up_chart->PlanT->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->PlanT->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->PlanT->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_PlanT" class="form-group ivf_ovum_pick_up_chart_PlanT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->PlanT->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT"<?php echo $ivf_ovum_pick_up_chart->PlanT->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->PlanT->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_PlanT" class="ivf_ovum_pick_up_chart_PlanT">
<span<?php echo $ivf_ovum_pick_up_chart->PlanT->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->PlanT->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->PlanT->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->PlanT->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->PlanT->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->PlanT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
		<td data-name="ReviewDate"<?php echo $ivf_ovum_pick_up_chart->ReviewDate->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDate" class="form-group ivf_ovum_pick_up_chart_ReviewDate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->ReviewDate->ReadOnly && !$ivf_ovum_pick_up_chart->ReviewDate->Disabled && !isset($ivf_ovum_pick_up_chart->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->ReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDate" class="form-group ivf_ovum_pick_up_chart_ReviewDate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->ReviewDate->ReadOnly && !$ivf_ovum_pick_up_chart->ReviewDate->Disabled && !isset($ivf_ovum_pick_up_chart->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->ReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDate" class="ivf_ovum_pick_up_chart_ReviewDate">
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDate->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ReviewDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td data-name="ReviewDoctor"<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDoctor" class="form-group ivf_ovum_pick_up_chart_ReviewDoctor">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDoctor" class="form-group ivf_ovum_pick_up_chart_ReviewDoctor">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_ReviewDoctor" class="ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_ovum_pick_up_chart->TidNo->cellAttributes() ?>>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TidNo" class="form-group ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TidNo" class="form-group ivf_ovum_pick_up_chart_TidNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TidNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TidNo" class="form-group ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TidNo" class="form-group ivf_ovum_pick_up_chart_TidNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TidNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_ovum_pick_up_chart_grid->RowCnt ?>_ivf_ovum_pick_up_chart_TidNo" class="ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart->TidNo->viewAttributes() ?>>
<?php echo $ivf_ovum_pick_up_chart->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="fivf_ovum_pick_up_chartgrid$x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="fivf_ovum_pick_up_chartgrid$o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_ovum_pick_up_chart_grid->ListOptions->render("body", "right", $ivf_ovum_pick_up_chart_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_ovum_pick_up_chart->RowType == ROWTYPE_ADD || $ivf_ovum_pick_up_chart->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_ovum_pick_up_chartgrid.updateLists(<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_ovum_pick_up_chart->isGridAdd() || $ivf_ovum_pick_up_chart->CurrentMode == "copy")
		if (!$ivf_ovum_pick_up_chart_grid->Recordset->EOF)
			$ivf_ovum_pick_up_chart_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_ovum_pick_up_chart->CurrentMode == "add" || $ivf_ovum_pick_up_chart->CurrentMode == "copy" || $ivf_ovum_pick_up_chart->CurrentMode == "edit") {
		$ivf_ovum_pick_up_chart_grid->RowIndex = '$rowindex$';
		$ivf_ovum_pick_up_chart_grid->loadRowValues();

		// Set row properties
		$ivf_ovum_pick_up_chart->resetAttributes();
		$ivf_ovum_pick_up_chart->RowAttrs = array_merge($ivf_ovum_pick_up_chart->RowAttrs, array('data-rowindex'=>$ivf_ovum_pick_up_chart_grid->RowIndex, 'id'=>'r0_ivf_ovum_pick_up_chart', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_ovum_pick_up_chart->RowAttrs["class"], "ew-template");
		$ivf_ovum_pick_up_chart->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_ovum_pick_up_chart_grid->renderRow();

		// Render list options
		$ivf_ovum_pick_up_chart_grid->renderListOptions();
		$ivf_ovum_pick_up_chart_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_ovum_pick_up_chart->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_ovum_pick_up_chart_grid->ListOptions->render("body", "left", $ivf_ovum_pick_up_chart_grid->RowIndex);
?>
	<?php if ($ivf_ovum_pick_up_chart->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_id" class="form-group ivf_ovum_pick_up_chart_id">
<span<?php echo $ivf_ovum_pick_up_chart->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_id" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->RIDNo->Visible) { // RIDNo ?>
		<td data-name="RIDNo">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<?php if ($ivf_ovum_pick_up_chart->RIDNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_RIDNo" class="form-group ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_RIDNo" class="form-group ivf_ovum_pick_up_chart_RIDNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->RIDNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->RIDNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_RIDNo" class="form-group ivf_ovum_pick_up_chart_RIDNo">
<span<?php echo $ivf_ovum_pick_up_chart->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->RIDNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_RIDNo" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_RIDNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->RIDNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<?php if ($ivf_ovum_pick_up_chart->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Name" class="form-group ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Name" class="form-group ivf_ovum_pick_up_chart_Name">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Name->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Name" class="form-group ivf_ovum_pick_up_chart_Name">
<span<?php echo $ivf_ovum_pick_up_chart->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Name" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ARTCycle->Visible) { // ARTCycle ?>
		<td data-name="ARTCycle">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_ARTCycle" class="form-group ivf_ovum_pick_up_chart_ARTCycle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ARTCycle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ARTCycle->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_ARTCycle" class="form-group ivf_ovum_pick_up_chart_ARTCycle">
<span<?php echo $ivf_ovum_pick_up_chart->ARTCycle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->ARTCycle->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ARTCycle" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ARTCycle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ARTCycle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Consultant" class="form-group ivf_ovum_pick_up_chart_Consultant">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Consultant->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Consultant->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Consultant" class="form-group ivf_ovum_pick_up_chart_Consultant">
<span<?php echo $ivf_ovum_pick_up_chart->Consultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Consultant->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Consultant" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Consultant->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->Visible) { // TotalDoseOfStimulation ?>
		<td data-name="TotalDoseOfStimulation">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="form-group ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TotalDoseOfStimulation" class="form-group ivf_ovum_pick_up_chart_TotalDoseOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart->TotalDoseOfStimulation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TotalDoseOfStimulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TotalDoseOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TotalDoseOfStimulation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Protocol->Visible) { // Protocol ?>
		<td data-name="Protocol">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Protocol" class="form-group ivf_ovum_pick_up_chart_Protocol">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->Protocol->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol"<?php echo $ivf_ovum_pick_up_chart->Protocol->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->Protocol->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Protocol" class="form-group ivf_ovum_pick_up_chart_Protocol">
<span<?php echo $ivf_ovum_pick_up_chart->Protocol->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Protocol->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Protocol->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Protocol" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Protocol" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Protocol->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->Visible) { // NumberOfDaysOfStimulation ?>
		<td data-name="NumberOfDaysOfStimulation">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="form-group ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation" class="form-group ivf_ovum_pick_up_chart_NumberOfDaysOfStimulation">
<span<?php echo $ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NumberOfDaysOfStimulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NumberOfDaysOfStimulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NumberOfDaysOfStimulation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TriggerDateTime->Visible) { // TriggerDateTime ?>
		<td data-name="TriggerDateTime">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TriggerDateTime" class="form-group ivf_ovum_pick_up_chart_TriggerDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->TriggerDateTime->ReadOnly && !$ivf_ovum_pick_up_chart->TriggerDateTime->Disabled && !isset($ivf_ovum_pick_up_chart->TriggerDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->TriggerDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TriggerDateTime" class="form-group ivf_ovum_pick_up_chart_TriggerDateTime">
<span<?php echo $ivf_ovum_pick_up_chart->TriggerDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->TriggerDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TriggerDateTime" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TriggerDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TriggerDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->OPUDateTime->Visible) { // OPUDateTime ?>
		<td data-name="OPUDateTime">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_OPUDateTime" class="form-group ivf_ovum_pick_up_chart_OPUDateTime">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->OPUDateTime->ReadOnly && !$ivf_ovum_pick_up_chart->OPUDateTime->Disabled && !isset($ivf_ovum_pick_up_chart->OPUDateTime->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->OPUDateTime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_OPUDateTime" class="form-group ivf_ovum_pick_up_chart_OPUDateTime">
<span<?php echo $ivf_ovum_pick_up_chart->OPUDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->OPUDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OPUDateTime" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OPUDateTime" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OPUDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->HoursAfterTrigger->Visible) { // HoursAfterTrigger ?>
		<td data-name="HoursAfterTrigger">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="form-group ivf_ovum_pick_up_chart_HoursAfterTrigger">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_HoursAfterTrigger" class="form-group ivf_ovum_pick_up_chart_HoursAfterTrigger">
<span<?php echo $ivf_ovum_pick_up_chart->HoursAfterTrigger->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->HoursAfterTrigger->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_HoursAfterTrigger" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_HoursAfterTrigger" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->HoursAfterTrigger->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->SerumE2->Visible) { // SerumE2 ?>
		<td data-name="SerumE2">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_SerumE2" class="form-group ivf_ovum_pick_up_chart_SerumE2">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->SerumE2->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->SerumE2->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_SerumE2" class="form-group ivf_ovum_pick_up_chart_SerumE2">
<span<?php echo $ivf_ovum_pick_up_chart->SerumE2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->SerumE2->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumE2" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumE2" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumE2->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->SerumP4->Visible) { // SerumP4 ?>
		<td data-name="SerumP4">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_SerumP4" class="form-group ivf_ovum_pick_up_chart_SerumP4">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->SerumP4->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->SerumP4->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_SerumP4" class="form-group ivf_ovum_pick_up_chart_SerumP4">
<span<?php echo $ivf_ovum_pick_up_chart->SerumP4->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->SerumP4->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_SerumP4" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_SerumP4" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->SerumP4->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->FORT->Visible) { // FORT ?>
		<td data-name="FORT">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_FORT" class="form-group ivf_ovum_pick_up_chart_FORT">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->FORT->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->FORT->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_FORT" class="form-group ivf_ovum_pick_up_chart_FORT">
<span<?php echo $ivf_ovum_pick_up_chart->FORT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->FORT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_FORT" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_FORT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->FORT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ExperctedOocytes->Visible) { // ExperctedOocytes ?>
		<td data-name="ExperctedOocytes">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_ExperctedOocytes" class="form-group ivf_ovum_pick_up_chart_ExperctedOocytes">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_ExperctedOocytes" class="form-group ivf_ovum_pick_up_chart_ExperctedOocytes">
<span<?php echo $ivf_ovum_pick_up_chart->ExperctedOocytes->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->ExperctedOocytes->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ExperctedOocytes" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ExperctedOocytes" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ExperctedOocytes->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->Visible) { // NoOfOocytesRetrieved ?>
		<td data-name="NoOfOocytesRetrieved">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="form-group ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_NoOfOocytesRetrieved" class="form-group ivf_ovum_pick_up_chart_NoOfOocytesRetrieved">
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrieved" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrieved" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrieved->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->OocytesRetreivalRate->Visible) { // OocytesRetreivalRate ?>
		<td data-name="OocytesRetreivalRate">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="form-group ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_OocytesRetreivalRate" class="form-group ivf_ovum_pick_up_chart_OocytesRetreivalRate">
<span<?php echo $ivf_ovum_pick_up_chart->OocytesRetreivalRate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->OocytesRetreivalRate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_OocytesRetreivalRate" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_OocytesRetreivalRate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->OocytesRetreivalRate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Anesthesia->Visible) { // Anesthesia ?>
		<td data-name="Anesthesia">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Anesthesia" class="form-group ivf_ovum_pick_up_chart_Anesthesia">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Anesthesia->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Anesthesia->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Anesthesia" class="form-group ivf_ovum_pick_up_chart_Anesthesia">
<span<?php echo $ivf_ovum_pick_up_chart->Anesthesia->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Anesthesia->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Anesthesia" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Anesthesia" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Anesthesia->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TrialCannulation->Visible) { // TrialCannulation ?>
		<td data-name="TrialCannulation">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TrialCannulation" class="form-group ivf_ovum_pick_up_chart_TrialCannulation">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TrialCannulation" class="form-group ivf_ovum_pick_up_chart_TrialCannulation">
<span<?php echo $ivf_ovum_pick_up_chart->TrialCannulation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->TrialCannulation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TrialCannulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TrialCannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TrialCannulation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->UCL->Visible) { // UCL ?>
		<td data-name="UCL">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_UCL" class="form-group ivf_ovum_pick_up_chart_UCL">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->UCL->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->UCL->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_UCL" class="form-group ivf_ovum_pick_up_chart_UCL">
<span<?php echo $ivf_ovum_pick_up_chart->UCL->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->UCL->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_UCL" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_UCL" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->UCL->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Angle->Visible) { // Angle ?>
		<td data-name="Angle">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Angle" class="form-group ivf_ovum_pick_up_chart_Angle">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->Angle->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->Angle->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Angle" class="form-group ivf_ovum_pick_up_chart_Angle">
<span<?php echo $ivf_ovum_pick_up_chart->Angle->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Angle->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Angle" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Angle" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Angle->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->EMS->Visible) { // EMS ?>
		<td data-name="EMS">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_EMS" class="form-group ivf_ovum_pick_up_chart_EMS">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->EMS->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->EMS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_EMS" class="form-group ivf_ovum_pick_up_chart_EMS">
<span<?php echo $ivf_ovum_pick_up_chart->EMS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->EMS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_EMS" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_EMS" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->EMS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->Cannulation->Visible) { // Cannulation ?>
		<td data-name="Cannulation">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Cannulation" class="form-group ivf_ovum_pick_up_chart_Cannulation">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->Cannulation->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation"<?php echo $ivf_ovum_pick_up_chart->Cannulation->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->Cannulation->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_Cannulation" class="form-group ivf_ovum_pick_up_chart_Cannulation">
<span<?php echo $ivf_ovum_pick_up_chart->Cannulation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->Cannulation->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Cannulation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_Cannulation" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_Cannulation" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->Cannulation->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->Visible) { // NoOfOocytesRetrievedd ?>
		<td data-name="NoOfOocytesRetrievedd">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="form-group ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd" class="form-group ivf_ovum_pick_up_chart_NoOfOocytesRetrievedd">
<span<?php echo $ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_NoOfOocytesRetrievedd" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_NoOfOocytesRetrievedd" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->NoOfOocytesRetrievedd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->PlanT->Visible) { // PlanT ?>
		<td data-name="PlanT">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_PlanT" class="form-group ivf_ovum_pick_up_chart_PlanT">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" data-value-separator="<?php echo $ivf_ovum_pick_up_chart->PlanT->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT"<?php echo $ivf_ovum_pick_up_chart->PlanT->editAttributes() ?>>
		<?php echo $ivf_ovum_pick_up_chart->PlanT->selectOptionListHtml("x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_PlanT" class="form-group ivf_ovum_pick_up_chart_PlanT">
<span<?php echo $ivf_ovum_pick_up_chart->PlanT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->PlanT->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->PlanT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_PlanT" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_PlanT" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->PlanT->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ReviewDate->Visible) { // ReviewDate ?>
		<td data-name="ReviewDate">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_ReviewDate" class="form-group ivf_ovum_pick_up_chart_ReviewDate">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ReviewDate->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ReviewDate->editAttributes() ?>>
<?php if (!$ivf_ovum_pick_up_chart->ReviewDate->ReadOnly && !$ivf_ovum_pick_up_chart->ReviewDate->Disabled && !isset($ivf_ovum_pick_up_chart->ReviewDate->EditAttrs["readonly"]) && !isset($ivf_ovum_pick_up_chart->ReviewDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_ovum_pick_up_chartgrid", "x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_ReviewDate" class="form-group ivf_ovum_pick_up_chart_ReviewDate">
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->ReviewDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDate" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDate" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->ReviewDoctor->Visible) { // ReviewDoctor ?>
		<td data-name="ReviewDoctor">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_ReviewDoctor" class="form-group ivf_ovum_pick_up_chart_ReviewDoctor">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_ReviewDoctor" class="form-group ivf_ovum_pick_up_chart_ReviewDoctor">
<span<?php echo $ivf_ovum_pick_up_chart->ReviewDoctor->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->ReviewDoctor->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_ReviewDoctor" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_ReviewDoctor" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->ReviewDoctor->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_ovum_pick_up_chart->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_ovum_pick_up_chart->isConfirm()) { ?>
<?php if ($ivf_ovum_pick_up_chart->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TidNo" class="form-group ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TidNo" class="form-group ivf_ovum_pick_up_chart_TidNo">
<input type="text" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_ovum_pick_up_chart->TidNo->EditValue ?>"<?php echo $ivf_ovum_pick_up_chart->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_ovum_pick_up_chart_TidNo" class="form-group ivf_ovum_pick_up_chart_TidNo">
<span<?php echo $ivf_ovum_pick_up_chart->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_ovum_pick_up_chart->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_ovum_pick_up_chart" data-field="x_TidNo" name="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_ovum_pick_up_chart->TidNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_ovum_pick_up_chart_grid->ListOptions->render("body", "right", $ivf_ovum_pick_up_chart_grid->RowIndex);
?>
<script>
fivf_ovum_pick_up_chartgrid.updateLists(<?php echo $ivf_ovum_pick_up_chart_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_ovum_pick_up_chart->CurrentMode == "add" || $ivf_ovum_pick_up_chart->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_ovum_pick_up_chart_grid->FormKeyCountName ?>" id="<?php echo $ivf_ovum_pick_up_chart_grid->FormKeyCountName ?>" value="<?php echo $ivf_ovum_pick_up_chart_grid->KeyCount ?>">
<?php echo $ivf_ovum_pick_up_chart_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_ovum_pick_up_chart_grid->FormKeyCountName ?>" id="<?php echo $ivf_ovum_pick_up_chart_grid->FormKeyCountName ?>" value="<?php echo $ivf_ovum_pick_up_chart_grid->KeyCount ?>">
<?php echo $ivf_ovum_pick_up_chart_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_ovum_pick_up_chartgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_ovum_pick_up_chart_grid->Recordset)
	$ivf_ovum_pick_up_chart_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_ovum_pick_up_chart_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_ovum_pick_up_chart_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_ovum_pick_up_chart_grid->TotalRecs == 0 && !$ivf_ovum_pick_up_chart->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_ovum_pick_up_chart_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_ovum_pick_up_chart_grid->terminate();
?>
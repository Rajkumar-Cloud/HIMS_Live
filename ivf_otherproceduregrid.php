<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_otherprocedure_grid))
	$ivf_otherprocedure_grid = new ivf_otherprocedure_grid();

// Run the page
$ivf_otherprocedure_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_otherprocedure_grid->Page_Render();
?>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<script>

// Form object
var fivf_otherproceduregrid = new ew.Form("fivf_otherproceduregrid", "grid");
fivf_otherproceduregrid.formKeyCountName = '<?php echo $ivf_otherprocedure_grid->FormKeyCountName ?>';

// Validate form
fivf_otherproceduregrid.validate = function() {
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
		<?php if ($ivf_otherprocedure_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->id->caption(), $ivf_otherprocedure->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->RIDNO->caption(), $ivf_otherprocedure->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure->RIDNO->errorMessage()) ?>");
		<?php if ($ivf_otherprocedure_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Name->caption(), $ivf_otherprocedure->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->DateofAdmission->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofAdmission");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->DateofAdmission->caption(), $ivf_otherprocedure->DateofAdmission->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_DateofAdmission");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure->DateofAdmission->errorMessage()) ?>");
		<?php if ($ivf_otherprocedure_grid->DateofProcedure->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofProcedure");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->DateofProcedure->caption(), $ivf_otherprocedure->DateofProcedure->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->DateofDischarge->Required) { ?>
			elm = this.getElements("x" + infix + "_DateofDischarge");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->DateofDischarge->caption(), $ivf_otherprocedure->DateofDischarge->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->Consultant->Required) { ?>
			elm = this.getElements("x" + infix + "_Consultant");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Consultant->caption(), $ivf_otherprocedure->Consultant->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->Surgeon->Required) { ?>
			elm = this.getElements("x" + infix + "_Surgeon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Surgeon->caption(), $ivf_otherprocedure->Surgeon->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->Anesthetist->Required) { ?>
			elm = this.getElements("x" + infix + "_Anesthetist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Anesthetist->caption(), $ivf_otherprocedure->Anesthetist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->IdentificationMark->Required) { ?>
			elm = this.getElements("x" + infix + "_IdentificationMark");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->IdentificationMark->caption(), $ivf_otherprocedure->IdentificationMark->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->ProcedureDone->Required) { ?>
			elm = this.getElements("x" + infix + "_ProcedureDone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->ProcedureDone->caption(), $ivf_otherprocedure->ProcedureDone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->PROVISIONALDIAGNOSIS->Required) { ?>
			elm = this.getElements("x" + infix + "_PROVISIONALDIAGNOSIS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption(), $ivf_otherprocedure->PROVISIONALDIAGNOSIS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->Chiefcomplaints->Required) { ?>
			elm = this.getElements("x" + infix + "_Chiefcomplaints");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Chiefcomplaints->caption(), $ivf_otherprocedure->Chiefcomplaints->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->MaritallHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MaritallHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->MaritallHistory->caption(), $ivf_otherprocedure->MaritallHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->MenstrualHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_MenstrualHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->MenstrualHistory->caption(), $ivf_otherprocedure->MenstrualHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->SurgicalHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_SurgicalHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->SurgicalHistory->caption(), $ivf_otherprocedure->SurgicalHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->PastHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_PastHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->PastHistory->caption(), $ivf_otherprocedure->PastHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->FamilyHistory->Required) { ?>
			elm = this.getElements("x" + infix + "_FamilyHistory");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->FamilyHistory->caption(), $ivf_otherprocedure->FamilyHistory->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->Temp->Required) { ?>
			elm = this.getElements("x" + infix + "_Temp");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Temp->caption(), $ivf_otherprocedure->Temp->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->Pulse->Required) { ?>
			elm = this.getElements("x" + infix + "_Pulse");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->Pulse->caption(), $ivf_otherprocedure->Pulse->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->BP->Required) { ?>
			elm = this.getElements("x" + infix + "_BP");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->BP->caption(), $ivf_otherprocedure->BP->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->CNS->Required) { ?>
			elm = this.getElements("x" + infix + "_CNS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->CNS->caption(), $ivf_otherprocedure->CNS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->_RS->Required) { ?>
			elm = this.getElements("x" + infix + "__RS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->_RS->caption(), $ivf_otherprocedure->_RS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->CVS->Required) { ?>
			elm = this.getElements("x" + infix + "_CVS");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->CVS->caption(), $ivf_otherprocedure->CVS->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->PA->Required) { ?>
			elm = this.getElements("x" + infix + "_PA");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->PA->caption(), $ivf_otherprocedure->PA->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->InvestigationReport->Required) { ?>
			elm = this.getElements("x" + infix + "_InvestigationReport");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->InvestigationReport->caption(), $ivf_otherprocedure->InvestigationReport->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_otherprocedure_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_otherprocedure->TidNo->caption(), $ivf_otherprocedure->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_otherprocedure->TidNo->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_otherproceduregrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "DateofAdmission", false)) return false;
	if (ew.valueChanged(fobj, infix, "DateofProcedure", false)) return false;
	if (ew.valueChanged(fobj, infix, "DateofDischarge", false)) return false;
	if (ew.valueChanged(fobj, infix, "Consultant", false)) return false;
	if (ew.valueChanged(fobj, infix, "Surgeon", false)) return false;
	if (ew.valueChanged(fobj, infix, "Anesthetist", false)) return false;
	if (ew.valueChanged(fobj, infix, "IdentificationMark", false)) return false;
	if (ew.valueChanged(fobj, infix, "ProcedureDone", false)) return false;
	if (ew.valueChanged(fobj, infix, "PROVISIONALDIAGNOSIS", false)) return false;
	if (ew.valueChanged(fobj, infix, "Chiefcomplaints", false)) return false;
	if (ew.valueChanged(fobj, infix, "MaritallHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "MenstrualHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "SurgicalHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "PastHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "FamilyHistory", false)) return false;
	if (ew.valueChanged(fobj, infix, "Temp", false)) return false;
	if (ew.valueChanged(fobj, infix, "Pulse", false)) return false;
	if (ew.valueChanged(fobj, infix, "BP", false)) return false;
	if (ew.valueChanged(fobj, infix, "CNS", false)) return false;
	if (ew.valueChanged(fobj, infix, "_RS", false)) return false;
	if (ew.valueChanged(fobj, infix, "CVS", false)) return false;
	if (ew.valueChanged(fobj, infix, "PA", false)) return false;
	if (ew.valueChanged(fobj, infix, "InvestigationReport", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_otherproceduregrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_otherproceduregrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_otherproceduregrid.lists["x_Name"] = <?php echo $ivf_otherprocedure_grid->Name->Lookup->toClientList() ?>;
fivf_otherproceduregrid.lists["x_Name"].options = <?php echo JsonEncode($ivf_otherprocedure_grid->Name->lookupOptions()) ?>;
fivf_otherproceduregrid.autoSuggests["x_Name"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
fivf_otherproceduregrid.lists["x_Consultant"] = <?php echo $ivf_otherprocedure_grid->Consultant->Lookup->toClientList() ?>;
fivf_otherproceduregrid.lists["x_Consultant"].options = <?php echo JsonEncode($ivf_otherprocedure_grid->Consultant->lookupOptions()) ?>;
fivf_otherproceduregrid.lists["x_Surgeon"] = <?php echo $ivf_otherprocedure_grid->Surgeon->Lookup->toClientList() ?>;
fivf_otherproceduregrid.lists["x_Surgeon"].options = <?php echo JsonEncode($ivf_otherprocedure_grid->Surgeon->lookupOptions()) ?>;
fivf_otherproceduregrid.lists["x_Anesthetist"] = <?php echo $ivf_otherprocedure_grid->Anesthetist->Lookup->toClientList() ?>;
fivf_otherproceduregrid.lists["x_Anesthetist"].options = <?php echo JsonEncode($ivf_otherprocedure_grid->Anesthetist->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$ivf_otherprocedure_grid->renderOtherOptions();
?>
<?php $ivf_otherprocedure_grid->showPageHeader(); ?>
<?php
$ivf_otherprocedure_grid->showMessage();
?>
<?php if ($ivf_otherprocedure_grid->TotalRecs > 0 || $ivf_otherprocedure->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_otherprocedure_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_otherprocedure">
<?php if ($ivf_otherprocedure_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_otherprocedure_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_otherproceduregrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_otherprocedure" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_otherproceduregrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_otherprocedure_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_otherprocedure_grid->renderListOptions();

// Render list options (header, left)
$ivf_otherprocedure_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_otherprocedure->id->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_otherprocedure->id->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_id" class="ivf_otherprocedure_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_otherprocedure->RIDNO->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_otherprocedure->RIDNO->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_otherprocedure->Name->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_otherprocedure->Name->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->DateofAdmission) == "") { ?>
		<th data-name="DateofAdmission" class="<?php echo $ivf_otherprocedure->DateofAdmission->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofAdmission" class="<?php echo $ivf_otherprocedure->DateofAdmission->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofAdmission->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->DateofAdmission->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->DateofAdmission->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->DateofProcedure) == "") { ?>
		<th data-name="DateofProcedure" class="<?php echo $ivf_otherprocedure->DateofProcedure->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofProcedure" class="<?php echo $ivf_otherprocedure->DateofProcedure->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofProcedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->DateofProcedure->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->DateofProcedure->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->DateofDischarge) == "") { ?>
		<th data-name="DateofDischarge" class="<?php echo $ivf_otherprocedure->DateofDischarge->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DateofDischarge" class="<?php echo $ivf_otherprocedure->DateofDischarge->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->DateofDischarge->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->DateofDischarge->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->DateofDischarge->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Consultant) == "") { ?>
		<th data-name="Consultant" class="<?php echo $ivf_otherprocedure->Consultant->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Consultant->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Consultant" class="<?php echo $ivf_otherprocedure->Consultant->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Consultant->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Consultant->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Surgeon) == "") { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_otherprocedure->Surgeon->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Surgeon->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Surgeon" class="<?php echo $ivf_otherprocedure->Surgeon->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Surgeon->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Surgeon->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Anesthetist) == "") { ?>
		<th data-name="Anesthetist" class="<?php echo $ivf_otherprocedure->Anesthetist->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Anesthetist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Anesthetist" class="<?php echo $ivf_otherprocedure->Anesthetist->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Anesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Anesthetist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Anesthetist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->IdentificationMark) == "") { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_otherprocedure->IdentificationMark->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="IdentificationMark" class="<?php echo $ivf_otherprocedure->IdentificationMark->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->IdentificationMark->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->IdentificationMark->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->IdentificationMark->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->ProcedureDone) == "") { ?>
		<th data-name="ProcedureDone" class="<?php echo $ivf_otherprocedure->ProcedureDone->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcedureDone" class="<?php echo $ivf_otherprocedure->ProcedureDone->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->ProcedureDone->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->ProcedureDone->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->ProcedureDone->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->PROVISIONALDIAGNOSIS) == "") { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PROVISIONALDIAGNOSIS" class="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Chiefcomplaints) == "") { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_otherprocedure->Chiefcomplaints->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Chiefcomplaints" class="<?php echo $ivf_otherprocedure->Chiefcomplaints->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Chiefcomplaints->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Chiefcomplaints->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Chiefcomplaints->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->MaritallHistory) == "") { ?>
		<th data-name="MaritallHistory" class="<?php echo $ivf_otherprocedure->MaritallHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MaritallHistory" class="<?php echo $ivf_otherprocedure->MaritallHistory->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MaritallHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->MaritallHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->MaritallHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->MenstrualHistory) == "") { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_otherprocedure->MenstrualHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MenstrualHistory" class="<?php echo $ivf_otherprocedure->MenstrualHistory->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->MenstrualHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->MenstrualHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->SurgicalHistory) == "") { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_otherprocedure->SurgicalHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SurgicalHistory" class="<?php echo $ivf_otherprocedure->SurgicalHistory->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->SurgicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->SurgicalHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->SurgicalHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->PastHistory) == "") { ?>
		<th data-name="PastHistory" class="<?php echo $ivf_otherprocedure->PastHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PastHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PastHistory" class="<?php echo $ivf_otherprocedure->PastHistory->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PastHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->PastHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->PastHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->FamilyHistory) == "") { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_otherprocedure->FamilyHistory->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FamilyHistory" class="<?php echo $ivf_otherprocedure->FamilyHistory->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->FamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->FamilyHistory->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->FamilyHistory->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Temp) == "") { ?>
		<th data-name="Temp" class="<?php echo $ivf_otherprocedure->Temp->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Temp->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Temp" class="<?php echo $ivf_otherprocedure->Temp->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Temp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Temp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->Pulse) == "") { ?>
		<th data-name="Pulse" class="<?php echo $ivf_otherprocedure->Pulse->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Pulse->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Pulse" class="<?php echo $ivf_otherprocedure->Pulse->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->Pulse->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->Pulse->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->Pulse->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->BP) == "") { ?>
		<th data-name="BP" class="<?php echo $ivf_otherprocedure->BP->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->BP->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="BP" class="<?php echo $ivf_otherprocedure->BP->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->BP->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->BP->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->CNS) == "") { ?>
		<th data-name="CNS" class="<?php echo $ivf_otherprocedure->CNS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CNS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CNS" class="<?php echo $ivf_otherprocedure->CNS->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CNS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->CNS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->CNS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->_RS) == "") { ?>
		<th data-name="_RS" class="<?php echo $ivf_otherprocedure->_RS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->_RS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="_RS" class="<?php echo $ivf_otherprocedure->_RS->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->_RS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->_RS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->_RS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->CVS) == "") { ?>
		<th data-name="CVS" class="<?php echo $ivf_otherprocedure->CVS->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CVS->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CVS" class="<?php echo $ivf_otherprocedure->CVS->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->CVS->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->CVS->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->CVS->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->PA) == "") { ?>
		<th data-name="PA" class="<?php echo $ivf_otherprocedure->PA->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PA->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PA" class="<?php echo $ivf_otherprocedure->PA->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->PA->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->PA->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->PA->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->InvestigationReport) == "") { ?>
		<th data-name="InvestigationReport" class="<?php echo $ivf_otherprocedure->InvestigationReport->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="InvestigationReport" class="<?php echo $ivf_otherprocedure->InvestigationReport->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->InvestigationReport->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->InvestigationReport->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->InvestigationReport->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_otherprocedure->sortUrl($ivf_otherprocedure->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_otherprocedure->TidNo->headerCellClass() ?>"><div id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_otherprocedure->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_otherprocedure->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_otherprocedure->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_otherprocedure->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_otherprocedure->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_otherprocedure_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_otherprocedure_grid->StartRec = 1;
$ivf_otherprocedure_grid->StopRec = $ivf_otherprocedure_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_otherprocedure_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_otherprocedure_grid->FormKeyCountName) && ($ivf_otherprocedure->isGridAdd() || $ivf_otherprocedure->isGridEdit() || $ivf_otherprocedure->isConfirm())) {
		$ivf_otherprocedure_grid->KeyCount = $CurrentForm->getValue($ivf_otherprocedure_grid->FormKeyCountName);
		$ivf_otherprocedure_grid->StopRec = $ivf_otherprocedure_grid->StartRec + $ivf_otherprocedure_grid->KeyCount - 1;
	}
}
$ivf_otherprocedure_grid->RecCnt = $ivf_otherprocedure_grid->StartRec - 1;
if ($ivf_otherprocedure_grid->Recordset && !$ivf_otherprocedure_grid->Recordset->EOF) {
	$ivf_otherprocedure_grid->Recordset->moveFirst();
	$selectLimit = $ivf_otherprocedure_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_otherprocedure_grid->StartRec > 1)
		$ivf_otherprocedure_grid->Recordset->move($ivf_otherprocedure_grid->StartRec - 1);
} elseif (!$ivf_otherprocedure->AllowAddDeleteRow && $ivf_otherprocedure_grid->StopRec == 0) {
	$ivf_otherprocedure_grid->StopRec = $ivf_otherprocedure->GridAddRowCount;
}

// Initialize aggregate
$ivf_otherprocedure->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_otherprocedure->resetAttributes();
$ivf_otherprocedure_grid->renderRow();
if ($ivf_otherprocedure->isGridAdd())
	$ivf_otherprocedure_grid->RowIndex = 0;
if ($ivf_otherprocedure->isGridEdit())
	$ivf_otherprocedure_grid->RowIndex = 0;
while ($ivf_otherprocedure_grid->RecCnt < $ivf_otherprocedure_grid->StopRec) {
	$ivf_otherprocedure_grid->RecCnt++;
	if ($ivf_otherprocedure_grid->RecCnt >= $ivf_otherprocedure_grid->StartRec) {
		$ivf_otherprocedure_grid->RowCnt++;
		if ($ivf_otherprocedure->isGridAdd() || $ivf_otherprocedure->isGridEdit() || $ivf_otherprocedure->isConfirm()) {
			$ivf_otherprocedure_grid->RowIndex++;
			$CurrentForm->Index = $ivf_otherprocedure_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_otherprocedure_grid->FormActionName) && $ivf_otherprocedure_grid->EventCancelled)
				$ivf_otherprocedure_grid->RowAction = strval($CurrentForm->getValue($ivf_otherprocedure_grid->FormActionName));
			elseif ($ivf_otherprocedure->isGridAdd())
				$ivf_otherprocedure_grid->RowAction = "insert";
			else
				$ivf_otherprocedure_grid->RowAction = "";
		}

		// Set up key count
		$ivf_otherprocedure_grid->KeyCount = $ivf_otherprocedure_grid->RowIndex;

		// Init row class and style
		$ivf_otherprocedure->resetAttributes();
		$ivf_otherprocedure->CssClass = "";
		if ($ivf_otherprocedure->isGridAdd()) {
			if ($ivf_otherprocedure->CurrentMode == "copy") {
				$ivf_otherprocedure_grid->loadRowValues($ivf_otherprocedure_grid->Recordset); // Load row values
				$ivf_otherprocedure_grid->setRecordKey($ivf_otherprocedure_grid->RowOldKey, $ivf_otherprocedure_grid->Recordset); // Set old record key
			} else {
				$ivf_otherprocedure_grid->loadRowValues(); // Load default values
				$ivf_otherprocedure_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_otherprocedure_grid->loadRowValues($ivf_otherprocedure_grid->Recordset); // Load row values
		}
		$ivf_otherprocedure->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_otherprocedure->isGridAdd()) // Grid add
			$ivf_otherprocedure->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_otherprocedure->isGridAdd() && $ivf_otherprocedure->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_otherprocedure_grid->restoreCurrentRowFormValues($ivf_otherprocedure_grid->RowIndex); // Restore form values
		if ($ivf_otherprocedure->isGridEdit()) { // Grid edit
			if ($ivf_otherprocedure->EventCancelled)
				$ivf_otherprocedure_grid->restoreCurrentRowFormValues($ivf_otherprocedure_grid->RowIndex); // Restore form values
			if ($ivf_otherprocedure_grid->RowAction == "insert")
				$ivf_otherprocedure->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_otherprocedure->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_otherprocedure->isGridEdit() && ($ivf_otherprocedure->RowType == ROWTYPE_EDIT || $ivf_otherprocedure->RowType == ROWTYPE_ADD) && $ivf_otherprocedure->EventCancelled) // Update failed
			$ivf_otherprocedure_grid->restoreCurrentRowFormValues($ivf_otherprocedure_grid->RowIndex); // Restore form values
		if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_otherprocedure_grid->EditRowCnt++;
		if ($ivf_otherprocedure->isConfirm()) // Confirm row
			$ivf_otherprocedure_grid->restoreCurrentRowFormValues($ivf_otherprocedure_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_otherprocedure->RowAttrs = array_merge($ivf_otherprocedure->RowAttrs, array('data-rowindex'=>$ivf_otherprocedure_grid->RowCnt, 'id'=>'r' . $ivf_otherprocedure_grid->RowCnt . '_ivf_otherprocedure', 'data-rowtype'=>$ivf_otherprocedure->RowType));

		// Render row
		$ivf_otherprocedure_grid->renderRow();

		// Render list options
		$ivf_otherprocedure_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_otherprocedure_grid->RowAction <> "delete" && $ivf_otherprocedure_grid->RowAction <> "insertdelete" && !($ivf_otherprocedure_grid->RowAction == "insert" && $ivf_otherprocedure->isConfirm() && $ivf_otherprocedure_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_otherprocedure->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_otherprocedure_grid->ListOptions->render("body", "left", $ivf_otherprocedure_grid->RowCnt);
?>
	<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_otherprocedure->id->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_id" class="form-group ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_id" class="ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure->id->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $ivf_otherprocedure->RIDNO->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_otherprocedure->RIDNO->getSessionValue() <> "") { ?>
<script id="orig<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>">
</script>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="form-group ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>">
</script>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="form-group ivf_otherprocedure_RIDNO">
<input type="text" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->RIDNO->EditValue ?>"<?php echo $ivf_otherprocedure->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_otherprocedure->RIDNO->getSessionValue() <> "") { ?>
<script id="orig<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>">
</script>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="form-group ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>">
</script>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="form-group ivf_otherprocedure_RIDNO">
<input type="text" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->RIDNO->EditValue ?>"<?php echo $ivf_otherprocedure->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<script id="orig<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<?php echo $ivf_otherprocedure->RIDNO->getViewValue() ?>
</script>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>><?php echo Barcode()->show($ivf_otherprocedure->RIDNO->CurrentValue, 'EAN-13', 60) ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_otherprocedure->Name->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_otherprocedure->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Name" class="form-group ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Name" class="form-group ivf_otherprocedure_Name">
<?php
$wrkonchange = "" . trim(@$ivf_otherprocedure->Name->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ivf_otherprocedure->Name->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" class="text-nowrap" style="z-index: <?php echo (9000 - $ivf_otherprocedure_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="sv_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo RemoveHtml($ivf_otherprocedure->Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Name->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Name->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" data-value-separator="<?php echo $ivf_otherprocedure->Name->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fivf_otherproceduregrid.createAutoSuggest({"id":"x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name","forceSelect":false});
</script>
<?php echo $ivf_otherprocedure->Name->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Name") ?>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_otherprocedure->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Name" class="form-group ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Name" class="form-group ivf_otherprocedure_Name">
<?php
$wrkonchange = "" . trim(@$ivf_otherprocedure->Name->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ivf_otherprocedure->Name->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" class="text-nowrap" style="z-index: <?php echo (9000 - $ivf_otherprocedure_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="sv_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo RemoveHtml($ivf_otherprocedure->Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Name->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Name->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" data-value-separator="<?php echo $ivf_otherprocedure->Name->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fivf_otherproceduregrid.createAutoSuggest({"id":"x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name","forceSelect":false});
</script>
<?php echo $ivf_otherprocedure->Name->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Name") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Name" class="ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission"<?php echo $ivf_otherprocedure->DateofAdmission->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofAdmission" class="form-group ivf_otherprocedure_DateofAdmission">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofAdmission->EditValue ?>"<?php echo $ivf_otherprocedure->DateofAdmission->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofAdmission->ReadOnly && !$ivf_otherprocedure->DateofAdmission->Disabled && !isset($ivf_otherprocedure->DateofAdmission->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofAdmission" class="form-group ivf_otherprocedure_DateofAdmission">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofAdmission->EditValue ?>"<?php echo $ivf_otherprocedure->DateofAdmission->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofAdmission->ReadOnly && !$ivf_otherprocedure->DateofAdmission->Disabled && !isset($ivf_otherprocedure->DateofAdmission->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofAdmission" class="ivf_otherprocedure_DateofAdmission">
<span<?php echo $ivf_otherprocedure->DateofAdmission->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofAdmission->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
		<td data-name="DateofProcedure"<?php echo $ivf_otherprocedure->DateofProcedure->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofProcedure" class="form-group ivf_otherprocedure_DateofProcedure">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofProcedure->EditValue ?>"<?php echo $ivf_otherprocedure->DateofProcedure->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofProcedure->ReadOnly && !$ivf_otherprocedure->DateofProcedure->Disabled && !isset($ivf_otherprocedure->DateofProcedure->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofProcedure->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofProcedure" class="form-group ivf_otherprocedure_DateofProcedure">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofProcedure->EditValue ?>"<?php echo $ivf_otherprocedure->DateofProcedure->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofProcedure->ReadOnly && !$ivf_otherprocedure->DateofProcedure->Disabled && !isset($ivf_otherprocedure->DateofProcedure->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofProcedure->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofProcedure" class="ivf_otherprocedure_DateofProcedure">
<span<?php echo $ivf_otherprocedure->DateofProcedure->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofProcedure->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
		<td data-name="DateofDischarge"<?php echo $ivf_otherprocedure->DateofDischarge->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofDischarge" class="form-group ivf_otherprocedure_DateofDischarge">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofDischarge->EditValue ?>"<?php echo $ivf_otherprocedure->DateofDischarge->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofDischarge->ReadOnly && !$ivf_otherprocedure->DateofDischarge->Disabled && !isset($ivf_otherprocedure->DateofDischarge->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofDischarge->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofDischarge" class="form-group ivf_otherprocedure_DateofDischarge">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofDischarge->EditValue ?>"<?php echo $ivf_otherprocedure->DateofDischarge->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofDischarge->ReadOnly && !$ivf_otherprocedure->DateofDischarge->Disabled && !isset($ivf_otherprocedure->DateofDischarge->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofDischarge->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_DateofDischarge" class="ivf_otherprocedure_DateofDischarge">
<span<?php echo $ivf_otherprocedure->DateofDischarge->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->DateofDischarge->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant"<?php echo $ivf_otherprocedure->Consultant->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Consultant" class="form-group ivf_otherprocedure_Consultant">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Consultant" data-value-separator="<?php echo $ivf_otherprocedure->Consultant->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant"<?php echo $ivf_otherprocedure->Consultant->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Consultant->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Consultant->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Consultant->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Consultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Consultant->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Consultant") ?>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Consultant" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_otherprocedure->Consultant->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Consultant" class="form-group ivf_otherprocedure_Consultant">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Consultant" data-value-separator="<?php echo $ivf_otherprocedure->Consultant->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant"<?php echo $ivf_otherprocedure->Consultant->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Consultant->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Consultant->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Consultant->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Consultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Consultant->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Consultant") ?>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Consultant" class="ivf_otherprocedure_Consultant">
<span<?php echo $ivf_otherprocedure->Consultant->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Consultant->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Consultant" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_otherprocedure->Consultant->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Consultant" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_otherprocedure->Consultant->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Consultant" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_otherprocedure->Consultant->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Consultant" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_otherprocedure->Consultant->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon"<?php echo $ivf_otherprocedure->Surgeon->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Surgeon" class="form-group ivf_otherprocedure_Surgeon">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Surgeon" data-value-separator="<?php echo $ivf_otherprocedure->Surgeon->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon"<?php echo $ivf_otherprocedure->Surgeon->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Surgeon->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Surgeon->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Surgeon->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Surgeon->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Surgeon->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Surgeon") ?>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Surgeon" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_otherprocedure->Surgeon->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Surgeon" class="form-group ivf_otherprocedure_Surgeon">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Surgeon" data-value-separator="<?php echo $ivf_otherprocedure->Surgeon->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon"<?php echo $ivf_otherprocedure->Surgeon->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Surgeon->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Surgeon->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Surgeon->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Surgeon->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Surgeon->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Surgeon") ?>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Surgeon" class="ivf_otherprocedure_Surgeon">
<span<?php echo $ivf_otherprocedure->Surgeon->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Surgeon->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Surgeon" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_otherprocedure->Surgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Surgeon" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_otherprocedure->Surgeon->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Surgeon" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_otherprocedure->Surgeon->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Surgeon" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_otherprocedure->Surgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist"<?php echo $ivf_otherprocedure->Anesthetist->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Anesthetist" class="form-group ivf_otherprocedure_Anesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Anesthetist" data-value-separator="<?php echo $ivf_otherprocedure->Anesthetist->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist"<?php echo $ivf_otherprocedure->Anesthetist->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Anesthetist->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Anesthetist->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Anesthetist->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Anesthetist->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Anesthetist->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Anesthetist") ?>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Anesthetist" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" value="<?php echo HtmlEncode($ivf_otherprocedure->Anesthetist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Anesthetist" class="form-group ivf_otherprocedure_Anesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Anesthetist" data-value-separator="<?php echo $ivf_otherprocedure->Anesthetist->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist"<?php echo $ivf_otherprocedure->Anesthetist->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Anesthetist->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Anesthetist->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Anesthetist->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Anesthetist->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Anesthetist->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Anesthetist") ?>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Anesthetist" class="ivf_otherprocedure_Anesthetist">
<span<?php echo $ivf_otherprocedure->Anesthetist->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Anesthetist->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Anesthetist" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" value="<?php echo HtmlEncode($ivf_otherprocedure->Anesthetist->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Anesthetist" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" value="<?php echo HtmlEncode($ivf_otherprocedure->Anesthetist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Anesthetist" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" value="<?php echo HtmlEncode($ivf_otherprocedure->Anesthetist->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Anesthetist" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" value="<?php echo HtmlEncode($ivf_otherprocedure->Anesthetist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark"<?php echo $ivf_otherprocedure->IdentificationMark->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_IdentificationMark" class="form-group ivf_otherprocedure_IdentificationMark">
<input type="text" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->IdentificationMark->EditValue ?>"<?php echo $ivf_otherprocedure->IdentificationMark->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_IdentificationMark" class="form-group ivf_otherprocedure_IdentificationMark">
<input type="text" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->IdentificationMark->EditValue ?>"<?php echo $ivf_otherprocedure->IdentificationMark->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_IdentificationMark" class="ivf_otherprocedure_IdentificationMark">
<span<?php echo $ivf_otherprocedure->IdentificationMark->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->IdentificationMark->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
		<td data-name="ProcedureDone"<?php echo $ivf_otherprocedure->ProcedureDone->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_ProcedureDone" class="form-group ivf_otherprocedure_ProcedureDone">
<input type="text" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->ProcedureDone->EditValue ?>"<?php echo $ivf_otherprocedure->ProcedureDone->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" value="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_ProcedureDone" class="form-group ivf_otherprocedure_ProcedureDone">
<input type="text" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->ProcedureDone->EditValue ?>"<?php echo $ivf_otherprocedure->ProcedureDone->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_ProcedureDone" class="ivf_otherprocedure_ProcedureDone">
<span<?php echo $ivf_otherprocedure->ProcedureDone->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->ProcedureDone->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" value="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" value="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" value="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" value="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS"<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="form-group ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="form-group ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td data-name="Chiefcomplaints"<?php echo $ivf_otherprocedure->Chiefcomplaints->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Chiefcomplaints" class="form-group ivf_otherprocedure_Chiefcomplaints">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Chiefcomplaints->EditValue ?>"<?php echo $ivf_otherprocedure->Chiefcomplaints->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Chiefcomplaints" class="form-group ivf_otherprocedure_Chiefcomplaints">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Chiefcomplaints->EditValue ?>"<?php echo $ivf_otherprocedure->Chiefcomplaints->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Chiefcomplaints" class="ivf_otherprocedure_Chiefcomplaints">
<span<?php echo $ivf_otherprocedure->Chiefcomplaints->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Chiefcomplaints->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
		<td data-name="MaritallHistory"<?php echo $ivf_otherprocedure->MaritallHistory->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_MaritallHistory" class="form-group ivf_otherprocedure_MaritallHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->MaritallHistory->EditValue ?>"<?php echo $ivf_otherprocedure->MaritallHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_MaritallHistory" class="form-group ivf_otherprocedure_MaritallHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->MaritallHistory->EditValue ?>"<?php echo $ivf_otherprocedure->MaritallHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_MaritallHistory" class="ivf_otherprocedure_MaritallHistory">
<span<?php echo $ivf_otherprocedure->MaritallHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MaritallHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory"<?php echo $ivf_otherprocedure->MenstrualHistory->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_MenstrualHistory" class="form-group ivf_otherprocedure_MenstrualHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->MenstrualHistory->EditValue ?>"<?php echo $ivf_otherprocedure->MenstrualHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_MenstrualHistory" class="form-group ivf_otherprocedure_MenstrualHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->MenstrualHistory->EditValue ?>"<?php echo $ivf_otherprocedure->MenstrualHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_MenstrualHistory" class="ivf_otherprocedure_MenstrualHistory">
<span<?php echo $ivf_otherprocedure->MenstrualHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->MenstrualHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory"<?php echo $ivf_otherprocedure->SurgicalHistory->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_SurgicalHistory" class="form-group ivf_otherprocedure_SurgicalHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->SurgicalHistory->EditValue ?>"<?php echo $ivf_otherprocedure->SurgicalHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_SurgicalHistory" class="form-group ivf_otherprocedure_SurgicalHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->SurgicalHistory->EditValue ?>"<?php echo $ivf_otherprocedure->SurgicalHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_SurgicalHistory" class="ivf_otherprocedure_SurgicalHistory">
<span<?php echo $ivf_otherprocedure->SurgicalHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->SurgicalHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
		<td data-name="PastHistory"<?php echo $ivf_otherprocedure->PastHistory->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PastHistory" class="form-group ivf_otherprocedure_PastHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PastHistory->EditValue ?>"<?php echo $ivf_otherprocedure->PastHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PastHistory" class="form-group ivf_otherprocedure_PastHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PastHistory->EditValue ?>"<?php echo $ivf_otherprocedure->PastHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PastHistory" class="ivf_otherprocedure_PastHistory">
<span<?php echo $ivf_otherprocedure->PastHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PastHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory"<?php echo $ivf_otherprocedure->FamilyHistory->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_FamilyHistory" class="form-group ivf_otherprocedure_FamilyHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->FamilyHistory->EditValue ?>"<?php echo $ivf_otherprocedure->FamilyHistory->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_FamilyHistory" class="form-group ivf_otherprocedure_FamilyHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->FamilyHistory->EditValue ?>"<?php echo $ivf_otherprocedure->FamilyHistory->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_FamilyHistory" class="ivf_otherprocedure_FamilyHistory">
<span<?php echo $ivf_otherprocedure->FamilyHistory->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->FamilyHistory->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
		<td data-name="Temp"<?php echo $ivf_otherprocedure->Temp->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Temp" class="form-group ivf_otherprocedure_Temp">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Temp" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Temp->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Temp->EditValue ?>"<?php echo $ivf_otherprocedure->Temp->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Temp" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($ivf_otherprocedure->Temp->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Temp" class="form-group ivf_otherprocedure_Temp">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Temp" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Temp->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Temp->EditValue ?>"<?php echo $ivf_otherprocedure->Temp->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Temp" class="ivf_otherprocedure_Temp">
<span<?php echo $ivf_otherprocedure->Temp->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Temp->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Temp" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($ivf_otherprocedure->Temp->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Temp" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($ivf_otherprocedure->Temp->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Temp" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($ivf_otherprocedure->Temp->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Temp" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($ivf_otherprocedure->Temp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse"<?php echo $ivf_otherprocedure->Pulse->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Pulse" class="form-group ivf_otherprocedure_Pulse">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Pulse->EditValue ?>"<?php echo $ivf_otherprocedure->Pulse->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Pulse" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Pulse" class="form-group ivf_otherprocedure_Pulse">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Pulse->EditValue ?>"<?php echo $ivf_otherprocedure->Pulse->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_Pulse" class="ivf_otherprocedure_Pulse">
<span<?php echo $ivf_otherprocedure->Pulse->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->Pulse->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Pulse" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Pulse" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Pulse" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
		<td data-name="BP"<?php echo $ivf_otherprocedure->BP->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_BP" class="form-group ivf_otherprocedure_BP">
<input type="text" data-table="ivf_otherprocedure" data-field="x_BP" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->BP->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->BP->EditValue ?>"<?php echo $ivf_otherprocedure->BP->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_BP" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($ivf_otherprocedure->BP->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_BP" class="form-group ivf_otherprocedure_BP">
<input type="text" data-table="ivf_otherprocedure" data-field="x_BP" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->BP->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->BP->EditValue ?>"<?php echo $ivf_otherprocedure->BP->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_BP" class="ivf_otherprocedure_BP">
<span<?php echo $ivf_otherprocedure->BP->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->BP->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_BP" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($ivf_otherprocedure->BP->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_BP" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($ivf_otherprocedure->BP->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_BP" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($ivf_otherprocedure->BP->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_BP" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($ivf_otherprocedure->BP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
		<td data-name="CNS"<?php echo $ivf_otherprocedure->CNS->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_CNS" class="form-group ivf_otherprocedure_CNS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CNS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->CNS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->CNS->EditValue ?>"<?php echo $ivf_otherprocedure->CNS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CNS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($ivf_otherprocedure->CNS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_CNS" class="form-group ivf_otherprocedure_CNS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CNS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->CNS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->CNS->EditValue ?>"<?php echo $ivf_otherprocedure->CNS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_CNS" class="ivf_otherprocedure_CNS">
<span<?php echo $ivf_otherprocedure->CNS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CNS->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CNS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($ivf_otherprocedure->CNS->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CNS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($ivf_otherprocedure->CNS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CNS" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($ivf_otherprocedure->CNS->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CNS" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($ivf_otherprocedure->CNS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
		<td data-name="_RS"<?php echo $ivf_otherprocedure->_RS->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure__RS" class="form-group ivf_otherprocedure__RS">
<input type="text" data-table="ivf_otherprocedure" data-field="x__RS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->_RS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->_RS->EditValue ?>"<?php echo $ivf_otherprocedure->_RS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x__RS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" value="<?php echo HtmlEncode($ivf_otherprocedure->_RS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure__RS" class="form-group ivf_otherprocedure__RS">
<input type="text" data-table="ivf_otherprocedure" data-field="x__RS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->_RS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->_RS->EditValue ?>"<?php echo $ivf_otherprocedure->_RS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure__RS" class="ivf_otherprocedure__RS">
<span<?php echo $ivf_otherprocedure->_RS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->_RS->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x__RS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" value="<?php echo HtmlEncode($ivf_otherprocedure->_RS->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x__RS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" value="<?php echo HtmlEncode($ivf_otherprocedure->_RS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x__RS" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" value="<?php echo HtmlEncode($ivf_otherprocedure->_RS->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x__RS" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" value="<?php echo HtmlEncode($ivf_otherprocedure->_RS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
		<td data-name="CVS"<?php echo $ivf_otherprocedure->CVS->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_CVS" class="form-group ivf_otherprocedure_CVS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CVS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->CVS->EditValue ?>"<?php echo $ivf_otherprocedure->CVS->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CVS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_otherprocedure->CVS->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_CVS" class="form-group ivf_otherprocedure_CVS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CVS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->CVS->EditValue ?>"<?php echo $ivf_otherprocedure->CVS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_CVS" class="ivf_otherprocedure_CVS">
<span<?php echo $ivf_otherprocedure->CVS->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->CVS->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CVS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_otherprocedure->CVS->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CVS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_otherprocedure->CVS->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CVS" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_otherprocedure->CVS->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CVS" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_otherprocedure->CVS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
		<td data-name="PA"<?php echo $ivf_otherprocedure->PA->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PA" class="form-group ivf_otherprocedure_PA">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PA" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PA->EditValue ?>"<?php echo $ivf_otherprocedure->PA->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PA" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_otherprocedure->PA->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PA" class="form-group ivf_otherprocedure_PA">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PA" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PA->EditValue ?>"<?php echo $ivf_otherprocedure->PA->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_PA" class="ivf_otherprocedure_PA">
<span<?php echo $ivf_otherprocedure->PA->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->PA->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PA" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_otherprocedure->PA->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PA" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_otherprocedure->PA->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PA" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_otherprocedure->PA->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PA" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_otherprocedure->PA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
		<td data-name="InvestigationReport"<?php echo $ivf_otherprocedure->InvestigationReport->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_InvestigationReport" class="form-group ivf_otherprocedure_InvestigationReport">
<textarea data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->InvestigationReport->editAttributes() ?>><?php echo $ivf_otherprocedure->InvestigationReport->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" value="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_InvestigationReport" class="form-group ivf_otherprocedure_InvestigationReport">
<textarea data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->InvestigationReport->editAttributes() ?>><?php echo $ivf_otherprocedure->InvestigationReport->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_InvestigationReport" class="ivf_otherprocedure_InvestigationReport">
<span<?php echo $ivf_otherprocedure->InvestigationReport->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->InvestigationReport->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" value="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" value="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" value="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" value="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_otherprocedure->TidNo->cellAttributes() ?>>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_otherprocedure->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_TidNo" class="form-group ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_TidNo" class="form-group ivf_otherprocedure_TidNo">
<input type="text" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->TidNo->EditValue ?>"<?php echo $ivf_otherprocedure->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_TidNo" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_otherprocedure->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_TidNo" class="form-group ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_TidNo" class="form-group ivf_otherprocedure_TidNo">
<input type="text" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->TidNo->EditValue ?>"<?php echo $ivf_otherprocedure->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_TidNo" class="ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_TidNo" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_TidNo" name="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="fivf_otherproceduregrid$x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_TidNo" name="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="fivf_otherproceduregrid$o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_otherprocedure_grid->ListOptions->render("body", "right", $ivf_otherprocedure_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_otherprocedure->RowType == ROWTYPE_ADD || $ivf_otherprocedure->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_otherproceduregrid.updateLists(<?php echo $ivf_otherprocedure_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_otherprocedure->isGridAdd() || $ivf_otherprocedure->CurrentMode == "copy")
		if (!$ivf_otherprocedure_grid->Recordset->EOF)
			$ivf_otherprocedure_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_otherprocedure->CurrentMode == "add" || $ivf_otherprocedure->CurrentMode == "copy" || $ivf_otherprocedure->CurrentMode == "edit") {
		$ivf_otherprocedure_grid->RowIndex = '$rowindex$';
		$ivf_otherprocedure_grid->loadRowValues();

		// Set row properties
		$ivf_otherprocedure->resetAttributes();
		$ivf_otherprocedure->RowAttrs = array_merge($ivf_otherprocedure->RowAttrs, array('data-rowindex'=>$ivf_otherprocedure_grid->RowIndex, 'id'=>'r0_ivf_otherprocedure', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_otherprocedure->RowAttrs["class"], "ew-template");
		$ivf_otherprocedure->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_otherprocedure_grid->renderRow();

		// Render list options
		$ivf_otherprocedure_grid->renderListOptions();
		$ivf_otherprocedure_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_otherprocedure->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_otherprocedure_grid->ListOptions->render("body", "left", $ivf_otherprocedure_grid->RowIndex);
?>
	<?php if ($ivf_otherprocedure->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_id" class="form-group ivf_otherprocedure_id">
<span<?php echo $ivf_otherprocedure->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_id" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_otherprocedure->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<?php if ($ivf_otherprocedure->RIDNO->getSessionValue() <> "") { ?>
<script id="orig<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>">
</script>
<span id="el$rowindex$_ivf_otherprocedure_RIDNO" class="form-group ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<script id="orig<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>">
</script>
<span id="el$rowindex$_ivf_otherprocedure_RIDNO" class="form-group ivf_otherprocedure_RIDNO">
<input type="text" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->RIDNO->EditValue ?>"<?php echo $ivf_otherprocedure->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<script id="orig<?php echo $ivf_otherprocedure_grid->RowCnt ?>_ivf_otherprocedure_RIDNO" class="ivf_art_summaryedit" type="text/html">
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>">
</script>
<span id="el$rowindex$_ivf_otherprocedure_RIDNO" class="form-group ivf_otherprocedure_RIDNO">
<span<?php echo $ivf_otherprocedure->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_RIDNO" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_otherprocedure->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<?php if ($ivf_otherprocedure->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_otherprocedure_Name" class="form-group ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_Name" class="form-group ivf_otherprocedure_Name">
<?php
$wrkonchange = "" . trim(@$ivf_otherprocedure->Name->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$ivf_otherprocedure->Name->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" class="text-nowrap" style="z-index: <?php echo (9000 - $ivf_otherprocedure_grid->RowCnt * 10) ?>">
	<input type="text" class="form-control" name="sv_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="sv_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo RemoveHtml($ivf_otherprocedure->Name->EditValue) ?>" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Name->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Name->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->Name->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" data-value-separator="<?php echo $ivf_otherprocedure->Name->displayValueSeparatorAttribute() ?>" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
fivf_otherproceduregrid.createAutoSuggest({"id":"x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name","forceSelect":false});
</script>
<?php echo $ivf_otherprocedure->Name->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Name") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_Name" class="form-group ivf_otherprocedure_Name">
<span<?php echo $ivf_otherprocedure->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Name" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_otherprocedure->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofAdmission->Visible) { // DateofAdmission ?>
		<td data-name="DateofAdmission">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_DateofAdmission" class="form-group ivf_otherprocedure_DateofAdmission">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofAdmission->EditValue ?>"<?php echo $ivf_otherprocedure->DateofAdmission->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofAdmission->ReadOnly && !$ivf_otherprocedure->DateofAdmission->Disabled && !isset($ivf_otherprocedure->DateofAdmission->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofAdmission->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_DateofAdmission" class="form-group ivf_otherprocedure_DateofAdmission">
<span<?php echo $ivf_otherprocedure->DateofAdmission->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->DateofAdmission->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofAdmission" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofAdmission" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofAdmission->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofProcedure->Visible) { // DateofProcedure ?>
		<td data-name="DateofProcedure">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_DateofProcedure" class="form-group ivf_otherprocedure_DateofProcedure">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofProcedure->EditValue ?>"<?php echo $ivf_otherprocedure->DateofProcedure->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofProcedure->ReadOnly && !$ivf_otherprocedure->DateofProcedure->Disabled && !isset($ivf_otherprocedure->DateofProcedure->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofProcedure->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_DateofProcedure" class="form-group ivf_otherprocedure_DateofProcedure">
<span<?php echo $ivf_otherprocedure->DateofProcedure->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->DateofProcedure->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofProcedure" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofProcedure" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofProcedure->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->DateofDischarge->Visible) { // DateofDischarge ?>
		<td data-name="DateofDischarge">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_DateofDischarge" class="form-group ivf_otherprocedure_DateofDischarge">
<input type="text" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" data-format="11" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->DateofDischarge->EditValue ?>"<?php echo $ivf_otherprocedure->DateofDischarge->editAttributes() ?>>
<?php if (!$ivf_otherprocedure->DateofDischarge->ReadOnly && !$ivf_otherprocedure->DateofDischarge->Disabled && !isset($ivf_otherprocedure->DateofDischarge->EditAttrs["readonly"]) && !isset($ivf_otherprocedure->DateofDischarge->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_otherproceduregrid", "x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_DateofDischarge" class="form-group ivf_otherprocedure_DateofDischarge">
<span<?php echo $ivf_otherprocedure->DateofDischarge->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->DateofDischarge->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_DateofDischarge" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_DateofDischarge" value="<?php echo HtmlEncode($ivf_otherprocedure->DateofDischarge->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Consultant->Visible) { // Consultant ?>
		<td data-name="Consultant">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_Consultant" class="form-group ivf_otherprocedure_Consultant">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Consultant" data-value-separator="<?php echo $ivf_otherprocedure->Consultant->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant"<?php echo $ivf_otherprocedure->Consultant->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Consultant->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Consultant->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Consultant->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Consultant->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Consultant->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Consultant") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_Consultant" class="form-group ivf_otherprocedure_Consultant">
<span<?php echo $ivf_otherprocedure->Consultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Consultant->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Consultant" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_otherprocedure->Consultant->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Consultant" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Consultant" value="<?php echo HtmlEncode($ivf_otherprocedure->Consultant->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Surgeon->Visible) { // Surgeon ?>
		<td data-name="Surgeon">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_Surgeon" class="form-group ivf_otherprocedure_Surgeon">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Surgeon" data-value-separator="<?php echo $ivf_otherprocedure->Surgeon->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon"<?php echo $ivf_otherprocedure->Surgeon->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Surgeon->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Surgeon->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Surgeon->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Surgeon->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Surgeon->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Surgeon") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_Surgeon" class="form-group ivf_otherprocedure_Surgeon">
<span<?php echo $ivf_otherprocedure->Surgeon->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Surgeon->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Surgeon" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_otherprocedure->Surgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Surgeon" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Surgeon" value="<?php echo HtmlEncode($ivf_otherprocedure->Surgeon->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Anesthetist->Visible) { // Anesthetist ?>
		<td data-name="Anesthetist">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_Anesthetist" class="form-group ivf_otherprocedure_Anesthetist">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_otherprocedure" data-field="x_Anesthetist" data-value-separator="<?php echo $ivf_otherprocedure->Anesthetist->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist"<?php echo $ivf_otherprocedure->Anesthetist->editAttributes() ?>>
		<?php echo $ivf_otherprocedure->Anesthetist->selectOptionListHtml("x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist") ?>
	</select>
<?php if (AllowAdd(CurrentProjectID() . "doctors") && !$ivf_otherprocedure->Anesthetist->ReadOnly) { ?>
<div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $ivf_otherprocedure->Anesthetist->caption() ?>" data-title="<?php echo $ivf_otherprocedure->Anesthetist->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist',url:'doctorsaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button></div>
<?php } ?>
</div>
<?php echo $ivf_otherprocedure->Anesthetist->Lookup->getParamTag("p_x" . $ivf_otherprocedure_grid->RowIndex . "_Anesthetist") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_Anesthetist" class="form-group ivf_otherprocedure_Anesthetist">
<span<?php echo $ivf_otherprocedure->Anesthetist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Anesthetist->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Anesthetist" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" value="<?php echo HtmlEncode($ivf_otherprocedure->Anesthetist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Anesthetist" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Anesthetist" value="<?php echo HtmlEncode($ivf_otherprocedure->Anesthetist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->IdentificationMark->Visible) { // IdentificationMark ?>
		<td data-name="IdentificationMark">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_IdentificationMark" class="form-group ivf_otherprocedure_IdentificationMark">
<input type="text" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->IdentificationMark->EditValue ?>"<?php echo $ivf_otherprocedure->IdentificationMark->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_IdentificationMark" class="form-group ivf_otherprocedure_IdentificationMark">
<span<?php echo $ivf_otherprocedure->IdentificationMark->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->IdentificationMark->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_IdentificationMark" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_IdentificationMark" value="<?php echo HtmlEncode($ivf_otherprocedure->IdentificationMark->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->ProcedureDone->Visible) { // ProcedureDone ?>
		<td data-name="ProcedureDone">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_ProcedureDone" class="form-group ivf_otherprocedure_ProcedureDone">
<input type="text" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->ProcedureDone->EditValue ?>"<?php echo $ivf_otherprocedure->ProcedureDone->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_ProcedureDone" class="form-group ivf_otherprocedure_ProcedureDone">
<span<?php echo $ivf_otherprocedure->ProcedureDone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->ProcedureDone->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" value="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_ProcedureDone" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_ProcedureDone" value="<?php echo HtmlEncode($ivf_otherprocedure->ProcedureDone->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PROVISIONALDIAGNOSIS->Visible) { // PROVISIONALDIAGNOSIS ?>
		<td data-name="PROVISIONALDIAGNOSIS">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="form-group ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->EditValue ?>"<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_PROVISIONALDIAGNOSIS" class="form-group ivf_otherprocedure_PROVISIONALDIAGNOSIS">
<span<?php echo $ivf_otherprocedure->PROVISIONALDIAGNOSIS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->PROVISIONALDIAGNOSIS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PROVISIONALDIAGNOSIS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PROVISIONALDIAGNOSIS" value="<?php echo HtmlEncode($ivf_otherprocedure->PROVISIONALDIAGNOSIS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Chiefcomplaints->Visible) { // Chiefcomplaints ?>
		<td data-name="Chiefcomplaints">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_Chiefcomplaints" class="form-group ivf_otherprocedure_Chiefcomplaints">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Chiefcomplaints->EditValue ?>"<?php echo $ivf_otherprocedure->Chiefcomplaints->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_Chiefcomplaints" class="form-group ivf_otherprocedure_Chiefcomplaints">
<span<?php echo $ivf_otherprocedure->Chiefcomplaints->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Chiefcomplaints->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Chiefcomplaints" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Chiefcomplaints" value="<?php echo HtmlEncode($ivf_otherprocedure->Chiefcomplaints->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->MaritallHistory->Visible) { // MaritallHistory ?>
		<td data-name="MaritallHistory">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_MaritallHistory" class="form-group ivf_otherprocedure_MaritallHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->MaritallHistory->EditValue ?>"<?php echo $ivf_otherprocedure->MaritallHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_MaritallHistory" class="form-group ivf_otherprocedure_MaritallHistory">
<span<?php echo $ivf_otherprocedure->MaritallHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->MaritallHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MaritallHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MaritallHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MaritallHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->MenstrualHistory->Visible) { // MenstrualHistory ?>
		<td data-name="MenstrualHistory">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_MenstrualHistory" class="form-group ivf_otherprocedure_MenstrualHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->MenstrualHistory->EditValue ?>"<?php echo $ivf_otherprocedure->MenstrualHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_MenstrualHistory" class="form-group ivf_otherprocedure_MenstrualHistory">
<span<?php echo $ivf_otherprocedure->MenstrualHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->MenstrualHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_MenstrualHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_MenstrualHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->MenstrualHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->SurgicalHistory->Visible) { // SurgicalHistory ?>
		<td data-name="SurgicalHistory">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_SurgicalHistory" class="form-group ivf_otherprocedure_SurgicalHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->SurgicalHistory->EditValue ?>"<?php echo $ivf_otherprocedure->SurgicalHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_SurgicalHistory" class="form-group ivf_otherprocedure_SurgicalHistory">
<span<?php echo $ivf_otherprocedure->SurgicalHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->SurgicalHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_SurgicalHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_SurgicalHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->SurgicalHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PastHistory->Visible) { // PastHistory ?>
		<td data-name="PastHistory">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_PastHistory" class="form-group ivf_otherprocedure_PastHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PastHistory->EditValue ?>"<?php echo $ivf_otherprocedure->PastHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_PastHistory" class="form-group ivf_otherprocedure_PastHistory">
<span<?php echo $ivf_otherprocedure->PastHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->PastHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PastHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PastHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->PastHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->FamilyHistory->Visible) { // FamilyHistory ?>
		<td data-name="FamilyHistory">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_FamilyHistory" class="form-group ivf_otherprocedure_FamilyHistory">
<input type="text" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->FamilyHistory->EditValue ?>"<?php echo $ivf_otherprocedure->FamilyHistory->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_FamilyHistory" class="form-group ivf_otherprocedure_FamilyHistory">
<span<?php echo $ivf_otherprocedure->FamilyHistory->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->FamilyHistory->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_FamilyHistory" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_FamilyHistory" value="<?php echo HtmlEncode($ivf_otherprocedure->FamilyHistory->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Temp->Visible) { // Temp ?>
		<td data-name="Temp">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_Temp" class="form-group ivf_otherprocedure_Temp">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Temp" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Temp->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Temp->EditValue ?>"<?php echo $ivf_otherprocedure->Temp->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_Temp" class="form-group ivf_otherprocedure_Temp">
<span<?php echo $ivf_otherprocedure->Temp->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Temp->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Temp" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($ivf_otherprocedure->Temp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Temp" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Temp" value="<?php echo HtmlEncode($ivf_otherprocedure->Temp->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->Pulse->Visible) { // Pulse ?>
		<td data-name="Pulse">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_Pulse" class="form-group ivf_otherprocedure_Pulse">
<input type="text" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->Pulse->EditValue ?>"<?php echo $ivf_otherprocedure->Pulse->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_Pulse" class="form-group ivf_otherprocedure_Pulse">
<span<?php echo $ivf_otherprocedure->Pulse->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->Pulse->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Pulse" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_Pulse" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_Pulse" value="<?php echo HtmlEncode($ivf_otherprocedure->Pulse->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->BP->Visible) { // BP ?>
		<td data-name="BP">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_BP" class="form-group ivf_otherprocedure_BP">
<input type="text" data-table="ivf_otherprocedure" data-field="x_BP" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->BP->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->BP->EditValue ?>"<?php echo $ivf_otherprocedure->BP->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_BP" class="form-group ivf_otherprocedure_BP">
<span<?php echo $ivf_otherprocedure->BP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->BP->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_BP" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($ivf_otherprocedure->BP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_BP" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_BP" value="<?php echo HtmlEncode($ivf_otherprocedure->BP->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->CNS->Visible) { // CNS ?>
		<td data-name="CNS">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_CNS" class="form-group ivf_otherprocedure_CNS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CNS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->CNS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->CNS->EditValue ?>"<?php echo $ivf_otherprocedure->CNS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_CNS" class="form-group ivf_otherprocedure_CNS">
<span<?php echo $ivf_otherprocedure->CNS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->CNS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CNS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($ivf_otherprocedure->CNS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CNS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CNS" value="<?php echo HtmlEncode($ivf_otherprocedure->CNS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->_RS->Visible) { // RS ?>
		<td data-name="_RS">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure__RS" class="form-group ivf_otherprocedure__RS">
<input type="text" data-table="ivf_otherprocedure" data-field="x__RS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->_RS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->_RS->EditValue ?>"<?php echo $ivf_otherprocedure->_RS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure__RS" class="form-group ivf_otherprocedure__RS">
<span<?php echo $ivf_otherprocedure->_RS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->_RS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x__RS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" value="<?php echo HtmlEncode($ivf_otherprocedure->_RS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x__RS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>__RS" value="<?php echo HtmlEncode($ivf_otherprocedure->_RS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->CVS->Visible) { // CVS ?>
		<td data-name="CVS">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_CVS" class="form-group ivf_otherprocedure_CVS">
<input type="text" data-table="ivf_otherprocedure" data-field="x_CVS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->CVS->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->CVS->EditValue ?>"<?php echo $ivf_otherprocedure->CVS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_CVS" class="form-group ivf_otherprocedure_CVS">
<span<?php echo $ivf_otherprocedure->CVS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->CVS->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CVS" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_otherprocedure->CVS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_CVS" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_CVS" value="<?php echo HtmlEncode($ivf_otherprocedure->CVS->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->PA->Visible) { // PA ?>
		<td data-name="PA">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_PA" class="form-group ivf_otherprocedure_PA">
<input type="text" data-table="ivf_otherprocedure" data-field="x_PA" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->PA->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->PA->EditValue ?>"<?php echo $ivf_otherprocedure->PA->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_PA" class="form-group ivf_otherprocedure_PA">
<span<?php echo $ivf_otherprocedure->PA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->PA->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PA" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_otherprocedure->PA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_PA" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_PA" value="<?php echo HtmlEncode($ivf_otherprocedure->PA->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->InvestigationReport->Visible) { // InvestigationReport ?>
		<td data-name="InvestigationReport">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<span id="el$rowindex$_ivf_otherprocedure_InvestigationReport" class="form-group ivf_otherprocedure_InvestigationReport">
<textarea data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->getPlaceHolder()) ?>"<?php echo $ivf_otherprocedure->InvestigationReport->editAttributes() ?>><?php echo $ivf_otherprocedure->InvestigationReport->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_InvestigationReport" class="form-group ivf_otherprocedure_InvestigationReport">
<span<?php echo $ivf_otherprocedure->InvestigationReport->viewAttributes() ?>>
<?php echo $ivf_otherprocedure->InvestigationReport->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" value="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_InvestigationReport" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_InvestigationReport" value="<?php echo HtmlEncode($ivf_otherprocedure->InvestigationReport->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_otherprocedure->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_otherprocedure->isConfirm()) { ?>
<?php if ($ivf_otherprocedure->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_otherprocedure_TidNo" class="form-group ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_TidNo" class="form-group ivf_otherprocedure_TidNo">
<input type="text" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_otherprocedure->TidNo->EditValue ?>"<?php echo $ivf_otherprocedure->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_otherprocedure_TidNo" class="form-group ivf_otherprocedure_TidNo">
<span<?php echo $ivf_otherprocedure->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_otherprocedure->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_TidNo" name="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_otherprocedure" data-field="x_TidNo" name="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_otherprocedure_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_otherprocedure->TidNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_otherprocedure_grid->ListOptions->render("body", "right", $ivf_otherprocedure_grid->RowIndex);
?>
<script>
fivf_otherproceduregrid.updateLists(<?php echo $ivf_otherprocedure_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_otherprocedure->CurrentMode == "add" || $ivf_otherprocedure->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_otherprocedure_grid->FormKeyCountName ?>" id="<?php echo $ivf_otherprocedure_grid->FormKeyCountName ?>" value="<?php echo $ivf_otherprocedure_grid->KeyCount ?>">
<?php echo $ivf_otherprocedure_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_otherprocedure->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_otherprocedure_grid->FormKeyCountName ?>" id="<?php echo $ivf_otherprocedure_grid->FormKeyCountName ?>" value="<?php echo $ivf_otherprocedure_grid->KeyCount ?>">
<?php echo $ivf_otherprocedure_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_otherprocedure->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_otherproceduregrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_otherprocedure_grid->Recordset)
	$ivf_otherprocedure_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_otherprocedure_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_otherprocedure_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_otherprocedure_grid->TotalRecs == 0 && !$ivf_otherprocedure->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_otherprocedure_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_otherprocedure_grid->terminate();
?>
<?php if (!$ivf_otherprocedure->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_otherprocedure", "95%", "");
</script>
<?php } ?>
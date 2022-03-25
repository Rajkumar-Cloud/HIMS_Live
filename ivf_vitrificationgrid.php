<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_vitrification_grid))
	$ivf_vitrification_grid = new ivf_vitrification_grid();

// Run the page
$ivf_vitrification_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_vitrification_grid->Page_Render();
?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<script>

// Form object
var fivf_vitrificationgrid = new ew.Form("fivf_vitrificationgrid", "grid");
fivf_vitrificationgrid.formKeyCountName = '<?php echo $ivf_vitrification_grid->FormKeyCountName ?>';

// Validate form
fivf_vitrificationgrid.validate = function() {
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
		<?php if ($ivf_vitrification_grid->vitrificationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->vitrificationDate->caption(), $ivf_vitrification->vitrificationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_vitrificationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->vitrificationDate->errorMessage()) ?>");
		<?php if ($ivf_vitrification_grid->PrimaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_PrimaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->PrimaryEmbryologist->caption(), $ivf_vitrification->PrimaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->SecondaryEmbryologist->Required) { ?>
			elm = this.getElements("x" + infix + "_SecondaryEmbryologist");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->SecondaryEmbryologist->caption(), $ivf_vitrification->SecondaryEmbryologist->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->EmbryoNo->Required) { ?>
			elm = this.getElements("x" + infix + "_EmbryoNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->EmbryoNo->caption(), $ivf_vitrification->EmbryoNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->FertilisationDate->Required) { ?>
			elm = this.getElements("x" + infix + "_FertilisationDate");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->FertilisationDate->caption(), $ivf_vitrification->FertilisationDate->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_FertilisationDate");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_vitrification->FertilisationDate->errorMessage()) ?>");
		<?php if ($ivf_vitrification_grid->Day->Required) { ?>
			elm = this.getElements("x" + infix + "_Day");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Day->caption(), $ivf_vitrification->Day->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->Grade->Required) { ?>
			elm = this.getElements("x" + infix + "_Grade");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Grade->caption(), $ivf_vitrification->Grade->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->Incubator->Required) { ?>
			elm = this.getElements("x" + infix + "_Incubator");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Incubator->caption(), $ivf_vitrification->Incubator->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->Tank->Required) { ?>
			elm = this.getElements("x" + infix + "_Tank");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Tank->caption(), $ivf_vitrification->Tank->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->Canister->Required) { ?>
			elm = this.getElements("x" + infix + "_Canister");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Canister->caption(), $ivf_vitrification->Canister->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->Gobiet->Required) { ?>
			elm = this.getElements("x" + infix + "_Gobiet");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Gobiet->caption(), $ivf_vitrification->Gobiet->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->CryolockNo->Required) { ?>
			elm = this.getElements("x" + infix + "_CryolockNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->CryolockNo->caption(), $ivf_vitrification->CryolockNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->CryolockColour->Required) { ?>
			elm = this.getElements("x" + infix + "_CryolockColour");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->CryolockColour->caption(), $ivf_vitrification->CryolockColour->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_vitrification_grid->Stage->Required) { ?>
			elm = this.getElements("x" + infix + "_Stage");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_vitrification->Stage->caption(), $ivf_vitrification->Stage->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_vitrificationgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "vitrificationDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "PrimaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "SecondaryEmbryologist", false)) return false;
	if (ew.valueChanged(fobj, infix, "EmbryoNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "FertilisationDate", false)) return false;
	if (ew.valueChanged(fobj, infix, "Day", false)) return false;
	if (ew.valueChanged(fobj, infix, "Grade", false)) return false;
	if (ew.valueChanged(fobj, infix, "Incubator", false)) return false;
	if (ew.valueChanged(fobj, infix, "Tank", false)) return false;
	if (ew.valueChanged(fobj, infix, "Canister", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gobiet", false)) return false;
	if (ew.valueChanged(fobj, infix, "CryolockNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "CryolockColour", false)) return false;
	if (ew.valueChanged(fobj, infix, "Stage", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_vitrificationgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_vitrificationgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fivf_vitrificationgrid.lists["x_Day"] = <?php echo $ivf_vitrification_grid->Day->Lookup->toClientList() ?>;
fivf_vitrificationgrid.lists["x_Day"].options = <?php echo JsonEncode($ivf_vitrification_grid->Day->options(FALSE, TRUE)) ?>;
fivf_vitrificationgrid.lists["x_Grade"] = <?php echo $ivf_vitrification_grid->Grade->Lookup->toClientList() ?>;
fivf_vitrificationgrid.lists["x_Grade"].options = <?php echo JsonEncode($ivf_vitrification_grid->Grade->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$ivf_vitrification_grid->renderOtherOptions();
?>
<?php $ivf_vitrification_grid->showPageHeader(); ?>
<?php
$ivf_vitrification_grid->showMessage();
?>
<?php if ($ivf_vitrification_grid->TotalRecs > 0 || $ivf_vitrification->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_vitrification_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_vitrification">
<?php if ($ivf_vitrification_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_vitrification_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_vitrificationgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_vitrification" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_vitrificationgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_vitrification_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_vitrification_grid->renderListOptions();

// Render list options (header, left)
$ivf_vitrification_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->vitrificationDate) == "") { ?>
		<th data-name="vitrificationDate" class="<?php echo $ivf_vitrification->vitrificationDate->headerCellClass() ?>"><div id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->vitrificationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="vitrificationDate" class="<?php echo $ivf_vitrification->vitrificationDate->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->vitrificationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->vitrificationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->vitrificationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->PrimaryEmbryologist) == "") { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_vitrification->PrimaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PrimaryEmbryologist" class="<?php echo $ivf_vitrification->PrimaryEmbryologist->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->PrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->PrimaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->PrimaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->SecondaryEmbryologist) == "") { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_vitrification->SecondaryEmbryologist->headerCellClass() ?>"><div id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SecondaryEmbryologist" class="<?php echo $ivf_vitrification->SecondaryEmbryologist->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->SecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->SecondaryEmbryologist->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->SecondaryEmbryologist->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->EmbryoNo) == "") { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_vitrification->EmbryoNo->headerCellClass() ?>"><div id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->EmbryoNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EmbryoNo" class="<?php echo $ivf_vitrification->EmbryoNo->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->EmbryoNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->EmbryoNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->EmbryoNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->FertilisationDate) == "") { ?>
		<th data-name="FertilisationDate" class="<?php echo $ivf_vitrification->FertilisationDate->headerCellClass() ?>"><div id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->FertilisationDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="FertilisationDate" class="<?php echo $ivf_vitrification->FertilisationDate->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->FertilisationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->FertilisationDate->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->FertilisationDate->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Day) == "") { ?>
		<th data-name="Day" class="<?php echo $ivf_vitrification->Day->headerCellClass() ?>"><div id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Day->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Day" class="<?php echo $ivf_vitrification->Day->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_Day" class="ivf_vitrification_Day">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Day->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Day->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Day->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Grade) == "") { ?>
		<th data-name="Grade" class="<?php echo $ivf_vitrification->Grade->headerCellClass() ?>"><div id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Grade->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Grade" class="<?php echo $ivf_vitrification->Grade->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_Grade" class="ivf_vitrification_Grade">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Grade->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Grade->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Incubator) == "") { ?>
		<th data-name="Incubator" class="<?php echo $ivf_vitrification->Incubator->headerCellClass() ?>"><div id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Incubator->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Incubator" class="<?php echo $ivf_vitrification->Incubator->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Incubator->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Incubator->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Incubator->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Tank) == "") { ?>
		<th data-name="Tank" class="<?php echo $ivf_vitrification->Tank->headerCellClass() ?>"><div id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Tank->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tank" class="<?php echo $ivf_vitrification->Tank->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_Tank" class="ivf_vitrification_Tank">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Tank->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Tank->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Tank->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Canister) == "") { ?>
		<th data-name="Canister" class="<?php echo $ivf_vitrification->Canister->headerCellClass() ?>"><div id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Canister->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Canister" class="<?php echo $ivf_vitrification->Canister->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_Canister" class="ivf_vitrification_Canister">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Canister->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Canister->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Canister->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Gobiet) == "") { ?>
		<th data-name="Gobiet" class="<?php echo $ivf_vitrification->Gobiet->headerCellClass() ?>"><div id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Gobiet->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gobiet" class="<?php echo $ivf_vitrification->Gobiet->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Gobiet->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Gobiet->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Gobiet->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->CryolockNo) == "") { ?>
		<th data-name="CryolockNo" class="<?php echo $ivf_vitrification->CryolockNo->headerCellClass() ?>"><div id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CryolockNo" class="<?php echo $ivf_vitrification->CryolockNo->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->CryolockNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->CryolockNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->CryolockColour) == "") { ?>
		<th data-name="CryolockColour" class="<?php echo $ivf_vitrification->CryolockColour->headerCellClass() ?>"><div id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockColour->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CryolockColour" class="<?php echo $ivf_vitrification->CryolockColour->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->CryolockColour->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->CryolockColour->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->CryolockColour->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
	<?php if ($ivf_vitrification->sortUrl($ivf_vitrification->Stage) == "") { ?>
		<th data-name="Stage" class="<?php echo $ivf_vitrification->Stage->headerCellClass() ?>"><div id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage"><div class="ew-table-header-caption"><?php echo $ivf_vitrification->Stage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Stage" class="<?php echo $ivf_vitrification->Stage->headerCellClass() ?>"><div><div id="elh_ivf_vitrification_Stage" class="ivf_vitrification_Stage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_vitrification->Stage->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_vitrification->Stage->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_vitrification->Stage->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_vitrification_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_vitrification_grid->StartRec = 1;
$ivf_vitrification_grid->StopRec = $ivf_vitrification_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_vitrification_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_vitrification_grid->FormKeyCountName) && ($ivf_vitrification->isGridAdd() || $ivf_vitrification->isGridEdit() || $ivf_vitrification->isConfirm())) {
		$ivf_vitrification_grid->KeyCount = $CurrentForm->getValue($ivf_vitrification_grid->FormKeyCountName);
		$ivf_vitrification_grid->StopRec = $ivf_vitrification_grid->StartRec + $ivf_vitrification_grid->KeyCount - 1;
	}
}
$ivf_vitrification_grid->RecCnt = $ivf_vitrification_grid->StartRec - 1;
if ($ivf_vitrification_grid->Recordset && !$ivf_vitrification_grid->Recordset->EOF) {
	$ivf_vitrification_grid->Recordset->moveFirst();
	$selectLimit = $ivf_vitrification_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_vitrification_grid->StartRec > 1)
		$ivf_vitrification_grid->Recordset->move($ivf_vitrification_grid->StartRec - 1);
} elseif (!$ivf_vitrification->AllowAddDeleteRow && $ivf_vitrification_grid->StopRec == 0) {
	$ivf_vitrification_grid->StopRec = $ivf_vitrification->GridAddRowCount;
}

// Initialize aggregate
$ivf_vitrification->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_vitrification->resetAttributes();
$ivf_vitrification_grid->renderRow();
if ($ivf_vitrification->isGridAdd())
	$ivf_vitrification_grid->RowIndex = 0;
if ($ivf_vitrification->isGridEdit())
	$ivf_vitrification_grid->RowIndex = 0;
while ($ivf_vitrification_grid->RecCnt < $ivf_vitrification_grid->StopRec) {
	$ivf_vitrification_grid->RecCnt++;
	if ($ivf_vitrification_grid->RecCnt >= $ivf_vitrification_grid->StartRec) {
		$ivf_vitrification_grid->RowCnt++;
		if ($ivf_vitrification->isGridAdd() || $ivf_vitrification->isGridEdit() || $ivf_vitrification->isConfirm()) {
			$ivf_vitrification_grid->RowIndex++;
			$CurrentForm->Index = $ivf_vitrification_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_vitrification_grid->FormActionName) && $ivf_vitrification_grid->EventCancelled)
				$ivf_vitrification_grid->RowAction = strval($CurrentForm->getValue($ivf_vitrification_grid->FormActionName));
			elseif ($ivf_vitrification->isGridAdd())
				$ivf_vitrification_grid->RowAction = "insert";
			else
				$ivf_vitrification_grid->RowAction = "";
		}

		// Set up key count
		$ivf_vitrification_grid->KeyCount = $ivf_vitrification_grid->RowIndex;

		// Init row class and style
		$ivf_vitrification->resetAttributes();
		$ivf_vitrification->CssClass = "";
		if ($ivf_vitrification->isGridAdd()) {
			if ($ivf_vitrification->CurrentMode == "copy") {
				$ivf_vitrification_grid->loadRowValues($ivf_vitrification_grid->Recordset); // Load row values
				$ivf_vitrification_grid->setRecordKey($ivf_vitrification_grid->RowOldKey, $ivf_vitrification_grid->Recordset); // Set old record key
			} else {
				$ivf_vitrification_grid->loadRowValues(); // Load default values
				$ivf_vitrification_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_vitrification_grid->loadRowValues($ivf_vitrification_grid->Recordset); // Load row values
		}
		$ivf_vitrification->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_vitrification->isGridAdd()) // Grid add
			$ivf_vitrification->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_vitrification->isGridAdd() && $ivf_vitrification->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_vitrification_grid->restoreCurrentRowFormValues($ivf_vitrification_grid->RowIndex); // Restore form values
		if ($ivf_vitrification->isGridEdit()) { // Grid edit
			if ($ivf_vitrification->EventCancelled)
				$ivf_vitrification_grid->restoreCurrentRowFormValues($ivf_vitrification_grid->RowIndex); // Restore form values
			if ($ivf_vitrification_grid->RowAction == "insert")
				$ivf_vitrification->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_vitrification->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_vitrification->isGridEdit() && ($ivf_vitrification->RowType == ROWTYPE_EDIT || $ivf_vitrification->RowType == ROWTYPE_ADD) && $ivf_vitrification->EventCancelled) // Update failed
			$ivf_vitrification_grid->restoreCurrentRowFormValues($ivf_vitrification_grid->RowIndex); // Restore form values
		if ($ivf_vitrification->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_vitrification_grid->EditRowCnt++;
		if ($ivf_vitrification->isConfirm()) // Confirm row
			$ivf_vitrification_grid->restoreCurrentRowFormValues($ivf_vitrification_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_vitrification->RowAttrs = array_merge($ivf_vitrification->RowAttrs, array('data-rowindex'=>$ivf_vitrification_grid->RowCnt, 'id'=>'r' . $ivf_vitrification_grid->RowCnt . '_ivf_vitrification', 'data-rowtype'=>$ivf_vitrification->RowType));

		// Render row
		$ivf_vitrification_grid->renderRow();

		// Render list options
		$ivf_vitrification_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_vitrification_grid->RowAction <> "delete" && $ivf_vitrification_grid->RowAction <> "insertdelete" && !($ivf_vitrification_grid->RowAction == "insert" && $ivf_vitrification->isConfirm() && $ivf_vitrification_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_vitrification->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitrification_grid->ListOptions->render("body", "left", $ivf_vitrification_grid->RowCnt);
?>
	<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate"<?php echo $ivf_vitrification->vitrificationDate->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->vitrificationDate->ReadOnly && !$ivf_vitrification->vitrificationDate->Disabled && !isset($ivf_vitrification->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationgrid", "x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->vitrificationDate->ReadOnly && !$ivf_vitrification->vitrificationDate->Disabled && !isset($ivf_vitrification->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationgrid", "x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_vitrificationDate" class="ivf_vitrification_vitrificationDate">
<span<?php echo $ivf_vitrification->vitrificationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->vitrificationDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_id" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification->id->CurrentValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_id" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT || $ivf_vitrification->CurrentMode == "edit") { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_id" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_id" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_vitrification->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist"<?php echo $ivf_vitrification->PrimaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->PrimaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_PrimaryEmbryologist" class="ivf_vitrification_PrimaryEmbryologist">
<span<?php echo $ivf_vitrification->PrimaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->PrimaryEmbryologist->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist"<?php echo $ivf_vitrification->SecondaryEmbryologist->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->SecondaryEmbryologist->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_SecondaryEmbryologist" class="ivf_vitrification_SecondaryEmbryologist">
<span<?php echo $ivf_vitrification->SecondaryEmbryologist->viewAttributes() ?>>
<?php echo $ivf_vitrification->SecondaryEmbryologist->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo"<?php echo $ivf_vitrification->EmbryoNo->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification->EmbryoNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification->EmbryoNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_EmbryoNo" class="ivf_vitrification_EmbryoNo">
<span<?php echo $ivf_vitrification->EmbryoNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->EmbryoNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate"<?php echo $ivf_vitrification->FertilisationDate->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->FertilisationDate->ReadOnly && !$ivf_vitrification->FertilisationDate->Disabled && !isset($ivf_vitrification->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationgrid", "x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->FertilisationDate->ReadOnly && !$ivf_vitrification->FertilisationDate->Disabled && !isset($ivf_vitrification->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationgrid", "x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_FertilisationDate" class="ivf_vitrification_FertilisationDate">
<span<?php echo $ivf_vitrification->FertilisationDate->viewAttributes() ?>>
<?php echo $ivf_vitrification->FertilisationDate->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
		<td data-name="Day"<?php echo $ivf_vitrification->Day->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day"<?php echo $ivf_vitrification->Day->editAttributes() ?>>
		<?php echo $ivf_vitrification->Day->selectOptionListHtml("x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day"<?php echo $ivf_vitrification->Day->editAttributes() ?>>
		<?php echo $ivf_vitrification->Day->selectOptionListHtml("x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Day" class="ivf_vitrification_Day">
<span<?php echo $ivf_vitrification->Day->viewAttributes() ?>>
<?php echo $ivf_vitrification->Day->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
		<td data-name="Grade"<?php echo $ivf_vitrification->Grade->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade"<?php echo $ivf_vitrification->Grade->editAttributes() ?>>
		<?php echo $ivf_vitrification->Grade->selectOptionListHtml("x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade"<?php echo $ivf_vitrification->Grade->editAttributes() ?>>
		<?php echo $ivf_vitrification->Grade->selectOptionListHtml("x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Grade" class="ivf_vitrification_Grade">
<span<?php echo $ivf_vitrification->Grade->viewAttributes() ?>>
<?php echo $ivf_vitrification->Grade->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator"<?php echo $ivf_vitrification->Incubator->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Incubator->EditValue ?>"<?php echo $ivf_vitrification->Incubator->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Incubator->EditValue ?>"<?php echo $ivf_vitrification->Incubator->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Incubator" class="ivf_vitrification_Incubator">
<span<?php echo $ivf_vitrification->Incubator->viewAttributes() ?>>
<?php echo $ivf_vitrification->Incubator->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
		<td data-name="Tank"<?php echo $ivf_vitrification->Tank->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Tank->EditValue ?>"<?php echo $ivf_vitrification->Tank->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Tank->EditValue ?>"<?php echo $ivf_vitrification->Tank->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Tank" class="ivf_vitrification_Tank">
<span<?php echo $ivf_vitrification->Tank->viewAttributes() ?>>
<?php echo $ivf_vitrification->Tank->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
		<td data-name="Canister"<?php echo $ivf_vitrification->Canister->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Canister->EditValue ?>"<?php echo $ivf_vitrification->Canister->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Canister->EditValue ?>"<?php echo $ivf_vitrification->Canister->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Canister" class="ivf_vitrification_Canister">
<span<?php echo $ivf_vitrification->Canister->viewAttributes() ?>>
<?php echo $ivf_vitrification->Canister->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
		<td data-name="Gobiet"<?php echo $ivf_vitrification->Gobiet->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Gobiet->EditValue ?>"<?php echo $ivf_vitrification->Gobiet->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Gobiet->EditValue ?>"<?php echo $ivf_vitrification->Gobiet->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Gobiet" class="ivf_vitrification_Gobiet">
<span<?php echo $ivf_vitrification->Gobiet->viewAttributes() ?>>
<?php echo $ivf_vitrification->Gobiet->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
		<td data-name="CryolockNo"<?php echo $ivf_vitrification->CryolockNo->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification->CryolockNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification->CryolockNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_CryolockNo" class="ivf_vitrification_CryolockNo">
<span<?php echo $ivf_vitrification->CryolockNo->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
		<td data-name="CryolockColour"<?php echo $ivf_vitrification->CryolockColour->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification->CryolockColour->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification->CryolockColour->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_CryolockColour" class="ivf_vitrification_CryolockColour">
<span<?php echo $ivf_vitrification->CryolockColour->viewAttributes() ?>>
<?php echo $ivf_vitrification->CryolockColour->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
		<td data-name="Stage"<?php echo $ivf_vitrification->Stage->cellAttributes() ?>>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Stage->EditValue ?>"<?php echo $ivf_vitrification->Stage->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->OldValue) ?>">
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Stage->EditValue ?>"<?php echo $ivf_vitrification->Stage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_vitrification->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_vitrification_grid->RowCnt ?>_ivf_vitrification_Stage" class="ivf_vitrification_Stage">
<span<?php echo $ivf_vitrification->Stage->viewAttributes() ?>>
<?php echo $ivf_vitrification->Stage->getViewValue() ?></span>
</span>
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="fivf_vitrificationgrid$x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->FormValue) ?>">
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="fivf_vitrificationgrid$o<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitrification_grid->ListOptions->render("body", "right", $ivf_vitrification_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_vitrification->RowType == ROWTYPE_ADD || $ivf_vitrification->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_vitrificationgrid.updateLists(<?php echo $ivf_vitrification_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_vitrification->isGridAdd() || $ivf_vitrification->CurrentMode == "copy")
		if (!$ivf_vitrification_grid->Recordset->EOF)
			$ivf_vitrification_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_vitrification->CurrentMode == "add" || $ivf_vitrification->CurrentMode == "copy" || $ivf_vitrification->CurrentMode == "edit") {
		$ivf_vitrification_grid->RowIndex = '$rowindex$';
		$ivf_vitrification_grid->loadRowValues();

		// Set row properties
		$ivf_vitrification->resetAttributes();
		$ivf_vitrification->RowAttrs = array_merge($ivf_vitrification->RowAttrs, array('data-rowindex'=>$ivf_vitrification_grid->RowIndex, 'id'=>'r0_ivf_vitrification', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_vitrification->RowAttrs["class"], "ew-template");
		$ivf_vitrification->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_vitrification_grid->renderRow();

		// Render list options
		$ivf_vitrification_grid->renderListOptions();
		$ivf_vitrification_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_vitrification->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_vitrification_grid->ListOptions->render("body", "left", $ivf_vitrification_grid->RowIndex);
?>
	<?php if ($ivf_vitrification->vitrificationDate->Visible) { // vitrificationDate ?>
		<td data-name="vitrificationDate">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->vitrificationDate->EditValue ?>"<?php echo $ivf_vitrification->vitrificationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->vitrificationDate->ReadOnly && !$ivf_vitrification->vitrificationDate->Disabled && !isset($ivf_vitrification->vitrificationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->vitrificationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationgrid", "x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_vitrificationDate" class="form-group ivf_vitrification_vitrificationDate">
<span<?php echo $ivf_vitrification->vitrificationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->vitrificationDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_vitrificationDate" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_vitrificationDate" value="<?php echo HtmlEncode($ivf_vitrification->vitrificationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
		<td data-name="PrimaryEmbryologist">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->PrimaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->PrimaryEmbryologist->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_PrimaryEmbryologist" class="form-group ivf_vitrification_PrimaryEmbryologist">
<span<?php echo $ivf_vitrification->PrimaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->PrimaryEmbryologist->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_PrimaryEmbryologist" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_PrimaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->PrimaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
		<td data-name="SecondaryEmbryologist">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<input type="text" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->SecondaryEmbryologist->EditValue ?>"<?php echo $ivf_vitrification->SecondaryEmbryologist->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_SecondaryEmbryologist" class="form-group ivf_vitrification_SecondaryEmbryologist">
<span<?php echo $ivf_vitrification->SecondaryEmbryologist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->SecondaryEmbryologist->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_SecondaryEmbryologist" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_SecondaryEmbryologist" value="<?php echo HtmlEncode($ivf_vitrification->SecondaryEmbryologist->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->EmbryoNo->Visible) { // EmbryoNo ?>
		<td data-name="EmbryoNo">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<input type="text" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->EmbryoNo->EditValue ?>"<?php echo $ivf_vitrification->EmbryoNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_EmbryoNo" class="form-group ivf_vitrification_EmbryoNo">
<span<?php echo $ivf_vitrification->EmbryoNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->EmbryoNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_EmbryoNo" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_EmbryoNo" value="<?php echo HtmlEncode($ivf_vitrification->EmbryoNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->FertilisationDate->Visible) { // FertilisationDate ?>
		<td data-name="FertilisationDate">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<input type="text" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" placeholder="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->FertilisationDate->EditValue ?>"<?php echo $ivf_vitrification->FertilisationDate->editAttributes() ?>>
<?php if (!$ivf_vitrification->FertilisationDate->ReadOnly && !$ivf_vitrification->FertilisationDate->Disabled && !isset($ivf_vitrification->FertilisationDate->EditAttrs["readonly"]) && !isset($ivf_vitrification->FertilisationDate->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_vitrificationgrid", "x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_FertilisationDate" class="form-group ivf_vitrification_FertilisationDate">
<span<?php echo $ivf_vitrification->FertilisationDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->FertilisationDate->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_FertilisationDate" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_FertilisationDate" value="<?php echo HtmlEncode($ivf_vitrification->FertilisationDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Day->Visible) { // Day ?>
		<td data-name="Day">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Day" data-value-separator="<?php echo $ivf_vitrification->Day->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day"<?php echo $ivf_vitrification->Day->editAttributes() ?>>
		<?php echo $ivf_vitrification->Day->selectOptionListHtml("x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_Day" class="form-group ivf_vitrification_Day">
<span<?php echo $ivf_vitrification->Day->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->Day->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Day" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Day" value="<?php echo HtmlEncode($ivf_vitrification->Day->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Grade->Visible) { // Grade ?>
		<td data-name="Grade">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="ivf_vitrification" data-field="x_Grade" data-value-separator="<?php echo $ivf_vitrification->Grade->displayValueSeparatorAttribute() ?>" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade"<?php echo $ivf_vitrification->Grade->editAttributes() ?>>
		<?php echo $ivf_vitrification->Grade->selectOptionListHtml("x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade") ?>
	</select>
</div>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_Grade" class="form-group ivf_vitrification_Grade">
<span<?php echo $ivf_vitrification->Grade->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->Grade->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Grade" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Grade" value="<?php echo HtmlEncode($ivf_vitrification->Grade->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Incubator->Visible) { // Incubator ?>
		<td data-name="Incubator">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<input type="text" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Incubator->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Incubator->EditValue ?>"<?php echo $ivf_vitrification->Incubator->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_Incubator" class="form-group ivf_vitrification_Incubator">
<span<?php echo $ivf_vitrification->Incubator->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->Incubator->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Incubator" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Incubator" value="<?php echo HtmlEncode($ivf_vitrification->Incubator->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Tank->Visible) { // Tank ?>
		<td data-name="Tank">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<input type="text" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Tank->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Tank->EditValue ?>"<?php echo $ivf_vitrification->Tank->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_Tank" class="form-group ivf_vitrification_Tank">
<span<?php echo $ivf_vitrification->Tank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->Tank->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Tank" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Tank" value="<?php echo HtmlEncode($ivf_vitrification->Tank->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Canister->Visible) { // Canister ?>
		<td data-name="Canister">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<input type="text" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Canister->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Canister->EditValue ?>"<?php echo $ivf_vitrification->Canister->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_Canister" class="form-group ivf_vitrification_Canister">
<span<?php echo $ivf_vitrification->Canister->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->Canister->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Canister" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Canister" value="<?php echo HtmlEncode($ivf_vitrification->Canister->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Gobiet->Visible) { // Gobiet ?>
		<td data-name="Gobiet">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<input type="text" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Gobiet->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Gobiet->EditValue ?>"<?php echo $ivf_vitrification->Gobiet->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_Gobiet" class="form-group ivf_vitrification_Gobiet">
<span<?php echo $ivf_vitrification->Gobiet->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->Gobiet->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Gobiet" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Gobiet" value="<?php echo HtmlEncode($ivf_vitrification->Gobiet->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->CryolockNo->Visible) { // CryolockNo ?>
		<td data-name="CryolockNo">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockNo->EditValue ?>"<?php echo $ivf_vitrification->CryolockNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_CryolockNo" class="form-group ivf_vitrification_CryolockNo">
<span<?php echo $ivf_vitrification->CryolockNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->CryolockNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockNo" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockNo" value="<?php echo HtmlEncode($ivf_vitrification->CryolockNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->CryolockColour->Visible) { // CryolockColour ?>
		<td data-name="CryolockColour">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<input type="text" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->CryolockColour->EditValue ?>"<?php echo $ivf_vitrification->CryolockColour->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_CryolockColour" class="form-group ivf_vitrification_CryolockColour">
<span<?php echo $ivf_vitrification->CryolockColour->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->CryolockColour->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_CryolockColour" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_CryolockColour" value="<?php echo HtmlEncode($ivf_vitrification->CryolockColour->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_vitrification->Stage->Visible) { // Stage ?>
		<td data-name="Stage">
<?php if (!$ivf_vitrification->isConfirm()) { ?>
<span id="el$rowindex$_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<input type="text" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_vitrification->Stage->getPlaceHolder()) ?>" value="<?php echo $ivf_vitrification->Stage->EditValue ?>"<?php echo $ivf_vitrification->Stage->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_vitrification_Stage" class="form-group ivf_vitrification_Stage">
<span<?php echo $ivf_vitrification->Stage->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_vitrification->Stage->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="x<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_vitrification" data-field="x_Stage" name="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" id="o<?php echo $ivf_vitrification_grid->RowIndex ?>_Stage" value="<?php echo HtmlEncode($ivf_vitrification->Stage->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_vitrification_grid->ListOptions->render("body", "right", $ivf_vitrification_grid->RowIndex);
?>
<script>
fivf_vitrificationgrid.updateLists(<?php echo $ivf_vitrification_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_vitrification->CurrentMode == "add" || $ivf_vitrification->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_vitrification_grid->FormKeyCountName ?>" id="<?php echo $ivf_vitrification_grid->FormKeyCountName ?>" value="<?php echo $ivf_vitrification_grid->KeyCount ?>">
<?php echo $ivf_vitrification_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_vitrification->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_vitrification_grid->FormKeyCountName ?>" id="<?php echo $ivf_vitrification_grid->FormKeyCountName ?>" value="<?php echo $ivf_vitrification_grid->KeyCount ?>">
<?php echo $ivf_vitrification_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_vitrification->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_vitrificationgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_vitrification_grid->Recordset)
	$ivf_vitrification_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_vitrification_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_vitrification_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_vitrification_grid->TotalRecs == 0 && !$ivf_vitrification->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_vitrification_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_vitrification_grid->terminate();
?>
<?php if (!$ivf_vitrification->isExport()) { ?>
<script>
ew.scrollableTable("gmp_ivf_vitrification", "95%", "");
</script>
<?php } ?>
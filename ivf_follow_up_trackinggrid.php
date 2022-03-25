<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($ivf_follow_up_tracking_grid))
	$ivf_follow_up_tracking_grid = new ivf_follow_up_tracking_grid();

// Run the page
$ivf_follow_up_tracking_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$ivf_follow_up_tracking_grid->Page_Render();
?>
<?php if (!$ivf_follow_up_tracking->isExport()) { ?>
<script>

// Form object
var fivf_follow_up_trackinggrid = new ew.Form("fivf_follow_up_trackinggrid", "grid");
fivf_follow_up_trackinggrid.formKeyCountName = '<?php echo $ivf_follow_up_tracking_grid->FormKeyCountName ?>';

// Validate form
fivf_follow_up_trackinggrid.validate = function() {
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
		<?php if ($ivf_follow_up_tracking_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->id->caption(), $ivf_follow_up_tracking->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_grid->RIDNO->Required) { ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->RIDNO->caption(), $ivf_follow_up_tracking->RIDNO->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_RIDNO");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->RIDNO->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_grid->Name->Required) { ?>
			elm = this.getElements("x" + infix + "_Name");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->Name->caption(), $ivf_follow_up_tracking->Name->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_grid->Age->Required) { ?>
			elm = this.getElements("x" + infix + "_Age");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->Age->caption(), $ivf_follow_up_tracking->Age->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_grid->MReadMore->Required) { ?>
			elm = this.getElements("x" + infix + "_MReadMore");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->MReadMore->caption(), $ivf_follow_up_tracking->MReadMore->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($ivf_follow_up_tracking_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->status->caption(), $ivf_follow_up_tracking->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->status->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->createdby->caption(), $ivf_follow_up_tracking->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->createdby->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->createddatetime->caption(), $ivf_follow_up_tracking->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->createddatetime->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->modifiedby->caption(), $ivf_follow_up_tracking->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->modifiedby->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->modifieddatetime->caption(), $ivf_follow_up_tracking->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->modifieddatetime->errorMessage()) ?>");
		<?php if ($ivf_follow_up_tracking_grid->TidNo->Required) { ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $ivf_follow_up_tracking->TidNo->caption(), $ivf_follow_up_tracking->TidNo->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TidNo");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($ivf_follow_up_tracking->TidNo->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fivf_follow_up_trackinggrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "RIDNO", false)) return false;
	if (ew.valueChanged(fobj, infix, "Name", false)) return false;
	if (ew.valueChanged(fobj, infix, "Age", false)) return false;
	if (ew.valueChanged(fobj, infix, "MReadMore", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "createdby", false)) return false;
	if (ew.valueChanged(fobj, infix, "createddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "modifiedby", false)) return false;
	if (ew.valueChanged(fobj, infix, "modifieddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "TidNo", false)) return false;
	return true;
}

// Form_CustomValidate event
fivf_follow_up_trackinggrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fivf_follow_up_trackinggrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<?php } ?>
<?php
$ivf_follow_up_tracking_grid->renderOtherOptions();
?>
<?php $ivf_follow_up_tracking_grid->showPageHeader(); ?>
<?php
$ivf_follow_up_tracking_grid->showMessage();
?>
<?php if ($ivf_follow_up_tracking_grid->TotalRecs > 0 || $ivf_follow_up_tracking->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($ivf_follow_up_tracking_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_follow_up_tracking">
<?php if ($ivf_follow_up_tracking_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $ivf_follow_up_tracking_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fivf_follow_up_trackinggrid" class="ew-form ew-list-form form-inline">
<div id="gmp_ivf_follow_up_tracking" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_ivf_follow_up_trackinggrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$ivf_follow_up_tracking_grid->RowType = ROWTYPE_HEADER;

// Render list options
$ivf_follow_up_tracking_grid->renderListOptions();

// Render list options (header, left)
$ivf_follow_up_tracking_grid->ListOptions->render("header", "left");
?>
<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->id) == "") { ?>
		<th data-name="id" class="<?php echo $ivf_follow_up_tracking->id->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $ivf_follow_up_tracking->id->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->RIDNO) == "") { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_follow_up_tracking->RIDNO->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RIDNO" class="<?php echo $ivf_follow_up_tracking->RIDNO->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->RIDNO->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->RIDNO->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->Name) == "") { ?>
		<th data-name="Name" class="<?php echo $ivf_follow_up_tracking->Name->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Name->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Name" class="<?php echo $ivf_follow_up_tracking->Name->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->Name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->Name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->Age) == "") { ?>
		<th data-name="Age" class="<?php echo $ivf_follow_up_tracking->Age->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Age->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Age" class="<?php echo $ivf_follow_up_tracking->Age->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->Age->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->Age->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->MReadMore) == "") { ?>
		<th data-name="MReadMore" class="<?php echo $ivf_follow_up_tracking->MReadMore->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MReadMore" class="<?php echo $ivf_follow_up_tracking->MReadMore->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->MReadMore->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->MReadMore->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->MReadMore->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->status) == "") { ?>
		<th data-name="status" class="<?php echo $ivf_follow_up_tracking->status->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $ivf_follow_up_tracking->status->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $ivf_follow_up_tracking->createdby->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $ivf_follow_up_tracking->createdby->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_follow_up_tracking->createddatetime->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $ivf_follow_up_tracking->createddatetime->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_follow_up_tracking->modifiedby->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $ivf_follow_up_tracking->modifiedby->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $ivf_follow_up_tracking->modifieddatetime->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
	<?php if ($ivf_follow_up_tracking->sortUrl($ivf_follow_up_tracking->TidNo) == "") { ?>
		<th data-name="TidNo" class="<?php echo $ivf_follow_up_tracking->TidNo->headerCellClass() ?>"><div id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo"><div class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->TidNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TidNo" class="<?php echo $ivf_follow_up_tracking->TidNo->headerCellClass() ?>"><div><div id="elh_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $ivf_follow_up_tracking->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($ivf_follow_up_tracking->TidNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($ivf_follow_up_tracking->TidNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$ivf_follow_up_tracking_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$ivf_follow_up_tracking_grid->StartRec = 1;
$ivf_follow_up_tracking_grid->StopRec = $ivf_follow_up_tracking_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $ivf_follow_up_tracking_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($ivf_follow_up_tracking_grid->FormKeyCountName) && ($ivf_follow_up_tracking->isGridAdd() || $ivf_follow_up_tracking->isGridEdit() || $ivf_follow_up_tracking->isConfirm())) {
		$ivf_follow_up_tracking_grid->KeyCount = $CurrentForm->getValue($ivf_follow_up_tracking_grid->FormKeyCountName);
		$ivf_follow_up_tracking_grid->StopRec = $ivf_follow_up_tracking_grid->StartRec + $ivf_follow_up_tracking_grid->KeyCount - 1;
	}
}
$ivf_follow_up_tracking_grid->RecCnt = $ivf_follow_up_tracking_grid->StartRec - 1;
if ($ivf_follow_up_tracking_grid->Recordset && !$ivf_follow_up_tracking_grid->Recordset->EOF) {
	$ivf_follow_up_tracking_grid->Recordset->moveFirst();
	$selectLimit = $ivf_follow_up_tracking_grid->UseSelectLimit;
	if (!$selectLimit && $ivf_follow_up_tracking_grid->StartRec > 1)
		$ivf_follow_up_tracking_grid->Recordset->move($ivf_follow_up_tracking_grid->StartRec - 1);
} elseif (!$ivf_follow_up_tracking->AllowAddDeleteRow && $ivf_follow_up_tracking_grid->StopRec == 0) {
	$ivf_follow_up_tracking_grid->StopRec = $ivf_follow_up_tracking->GridAddRowCount;
}

// Initialize aggregate
$ivf_follow_up_tracking->RowType = ROWTYPE_AGGREGATEINIT;
$ivf_follow_up_tracking->resetAttributes();
$ivf_follow_up_tracking_grid->renderRow();
if ($ivf_follow_up_tracking->isGridAdd())
	$ivf_follow_up_tracking_grid->RowIndex = 0;
if ($ivf_follow_up_tracking->isGridEdit())
	$ivf_follow_up_tracking_grid->RowIndex = 0;
while ($ivf_follow_up_tracking_grid->RecCnt < $ivf_follow_up_tracking_grid->StopRec) {
	$ivf_follow_up_tracking_grid->RecCnt++;
	if ($ivf_follow_up_tracking_grid->RecCnt >= $ivf_follow_up_tracking_grid->StartRec) {
		$ivf_follow_up_tracking_grid->RowCnt++;
		if ($ivf_follow_up_tracking->isGridAdd() || $ivf_follow_up_tracking->isGridEdit() || $ivf_follow_up_tracking->isConfirm()) {
			$ivf_follow_up_tracking_grid->RowIndex++;
			$CurrentForm->Index = $ivf_follow_up_tracking_grid->RowIndex;
			if ($CurrentForm->hasValue($ivf_follow_up_tracking_grid->FormActionName) && $ivf_follow_up_tracking_grid->EventCancelled)
				$ivf_follow_up_tracking_grid->RowAction = strval($CurrentForm->getValue($ivf_follow_up_tracking_grid->FormActionName));
			elseif ($ivf_follow_up_tracking->isGridAdd())
				$ivf_follow_up_tracking_grid->RowAction = "insert";
			else
				$ivf_follow_up_tracking_grid->RowAction = "";
		}

		// Set up key count
		$ivf_follow_up_tracking_grid->KeyCount = $ivf_follow_up_tracking_grid->RowIndex;

		// Init row class and style
		$ivf_follow_up_tracking->resetAttributes();
		$ivf_follow_up_tracking->CssClass = "";
		if ($ivf_follow_up_tracking->isGridAdd()) {
			if ($ivf_follow_up_tracking->CurrentMode == "copy") {
				$ivf_follow_up_tracking_grid->loadRowValues($ivf_follow_up_tracking_grid->Recordset); // Load row values
				$ivf_follow_up_tracking_grid->setRecordKey($ivf_follow_up_tracking_grid->RowOldKey, $ivf_follow_up_tracking_grid->Recordset); // Set old record key
			} else {
				$ivf_follow_up_tracking_grid->loadRowValues(); // Load default values
				$ivf_follow_up_tracking_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$ivf_follow_up_tracking_grid->loadRowValues($ivf_follow_up_tracking_grid->Recordset); // Load row values
		}
		$ivf_follow_up_tracking->RowType = ROWTYPE_VIEW; // Render view
		if ($ivf_follow_up_tracking->isGridAdd()) // Grid add
			$ivf_follow_up_tracking->RowType = ROWTYPE_ADD; // Render add
		if ($ivf_follow_up_tracking->isGridAdd() && $ivf_follow_up_tracking->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$ivf_follow_up_tracking_grid->restoreCurrentRowFormValues($ivf_follow_up_tracking_grid->RowIndex); // Restore form values
		if ($ivf_follow_up_tracking->isGridEdit()) { // Grid edit
			if ($ivf_follow_up_tracking->EventCancelled)
				$ivf_follow_up_tracking_grid->restoreCurrentRowFormValues($ivf_follow_up_tracking_grid->RowIndex); // Restore form values
			if ($ivf_follow_up_tracking_grid->RowAction == "insert")
				$ivf_follow_up_tracking->RowType = ROWTYPE_ADD; // Render add
			else
				$ivf_follow_up_tracking->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($ivf_follow_up_tracking->isGridEdit() && ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT || $ivf_follow_up_tracking->RowType == ROWTYPE_ADD) && $ivf_follow_up_tracking->EventCancelled) // Update failed
			$ivf_follow_up_tracking_grid->restoreCurrentRowFormValues($ivf_follow_up_tracking_grid->RowIndex); // Restore form values
		if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) // Edit row
			$ivf_follow_up_tracking_grid->EditRowCnt++;
		if ($ivf_follow_up_tracking->isConfirm()) // Confirm row
			$ivf_follow_up_tracking_grid->restoreCurrentRowFormValues($ivf_follow_up_tracking_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$ivf_follow_up_tracking->RowAttrs = array_merge($ivf_follow_up_tracking->RowAttrs, array('data-rowindex'=>$ivf_follow_up_tracking_grid->RowCnt, 'id'=>'r' . $ivf_follow_up_tracking_grid->RowCnt . '_ivf_follow_up_tracking', 'data-rowtype'=>$ivf_follow_up_tracking->RowType));

		// Render row
		$ivf_follow_up_tracking_grid->renderRow();

		// Render list options
		$ivf_follow_up_tracking_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($ivf_follow_up_tracking_grid->RowAction <> "delete" && $ivf_follow_up_tracking_grid->RowAction <> "insertdelete" && !($ivf_follow_up_tracking_grid->RowAction == "insert" && $ivf_follow_up_tracking->isConfirm() && $ivf_follow_up_tracking_grid->emptyRow())) {
?>
	<tr<?php echo $ivf_follow_up_tracking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_follow_up_tracking_grid->ListOptions->render("body", "left", $ivf_follow_up_tracking_grid->RowCnt);
?>
	<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
		<td data-name="id"<?php echo $ivf_follow_up_tracking->id->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_id" class="form-group ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->CurrentValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_id" class="ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking->id->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->id->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO"<?php echo $ivf_follow_up_tracking->RIDNO->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_follow_up_tracking->RIDNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_RIDNO" class="form-group ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_RIDNO" class="form-group ivf_follow_up_tracking_RIDNO">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->RIDNO->EditValue ?>"<?php echo $ivf_follow_up_tracking->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_follow_up_tracking->RIDNO->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_RIDNO" class="form-group ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_RIDNO" class="form-group ivf_follow_up_tracking_RIDNO">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->RIDNO->EditValue ?>"<?php echo $ivf_follow_up_tracking->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_RIDNO" class="ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->RIDNO->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
		<td data-name="Name"<?php echo $ivf_follow_up_tracking->Name->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_follow_up_tracking->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_Name" class="form-group ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_Name" class="form-group ivf_follow_up_tracking_Name">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_Name" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->Name->EditValue ?>"<?php echo $ivf_follow_up_tracking->Name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Name" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_follow_up_tracking->Name->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_Name" class="form-group ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_Name" class="form-group ivf_follow_up_tracking_Name">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_Name" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->Name->EditValue ?>"<?php echo $ivf_follow_up_tracking->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_Name" class="ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Name->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Name" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Name" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Name" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Name" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
		<td data-name="Age"<?php echo $ivf_follow_up_tracking->Age->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_Age" class="form-group ivf_follow_up_tracking_Age">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_Age" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->Age->EditValue ?>"<?php echo $ivf_follow_up_tracking->Age->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Age" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_Age" class="form-group ivf_follow_up_tracking_Age">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_Age" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->Age->EditValue ?>"<?php echo $ivf_follow_up_tracking->Age->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_Age" class="ivf_follow_up_tracking_Age">
<span<?php echo $ivf_follow_up_tracking->Age->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->Age->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Age" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Age" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Age" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Age" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
		<td data-name="MReadMore"<?php echo $ivf_follow_up_tracking->MReadMore->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_MReadMore" class="form-group ivf_follow_up_tracking_MReadMore">
<textarea data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->getPlaceHolder()) ?>"<?php echo $ivf_follow_up_tracking->MReadMore->editAttributes() ?>><?php echo $ivf_follow_up_tracking->MReadMore->EditValue ?></textarea>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" value="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_MReadMore" class="form-group ivf_follow_up_tracking_MReadMore">
<textarea data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->getPlaceHolder()) ?>"<?php echo $ivf_follow_up_tracking->MReadMore->editAttributes() ?>><?php echo $ivf_follow_up_tracking->MReadMore->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_MReadMore" class="ivf_follow_up_tracking_MReadMore">
<span<?php echo $ivf_follow_up_tracking->MReadMore->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->MReadMore->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" value="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" value="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" value="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" value="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
		<td data-name="status"<?php echo $ivf_follow_up_tracking->status->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_status" class="form-group ivf_follow_up_tracking_status">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_status" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->status->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->status->EditValue ?>"<?php echo $ivf_follow_up_tracking->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_status" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_follow_up_tracking->status->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_status" class="form-group ivf_follow_up_tracking_status">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_status" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->status->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->status->EditValue ?>"<?php echo $ivf_follow_up_tracking->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_status" class="ivf_follow_up_tracking_status">
<span<?php echo $ivf_follow_up_tracking->status->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->status->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_status" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_follow_up_tracking->status->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_status" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_follow_up_tracking->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_status" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_follow_up_tracking->status->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_status" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_follow_up_tracking->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $ivf_follow_up_tracking->createdby->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_createdby" class="form-group ivf_follow_up_tracking_createdby">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->createdby->EditValue ?>"<?php echo $ivf_follow_up_tracking->createdby->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_createdby" class="form-group ivf_follow_up_tracking_createdby">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->createdby->EditValue ?>"<?php echo $ivf_follow_up_tracking->createdby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_createdby" class="ivf_follow_up_tracking_createdby">
<span<?php echo $ivf_follow_up_tracking->createdby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createdby->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $ivf_follow_up_tracking->createddatetime->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_createddatetime" class="form-group ivf_follow_up_tracking_createddatetime">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->createddatetime->EditValue ?>"<?php echo $ivf_follow_up_tracking->createddatetime->editAttributes() ?>>
<?php if (!$ivf_follow_up_tracking->createddatetime->ReadOnly && !$ivf_follow_up_tracking->createddatetime->Disabled && !isset($ivf_follow_up_tracking->createddatetime->EditAttrs["readonly"]) && !isset($ivf_follow_up_tracking->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_follow_up_trackinggrid", "x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_createddatetime" class="form-group ivf_follow_up_tracking_createddatetime">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->createddatetime->EditValue ?>"<?php echo $ivf_follow_up_tracking->createddatetime->editAttributes() ?>>
<?php if (!$ivf_follow_up_tracking->createddatetime->ReadOnly && !$ivf_follow_up_tracking->createddatetime->Disabled && !isset($ivf_follow_up_tracking->createddatetime->EditAttrs["readonly"]) && !isset($ivf_follow_up_tracking->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_follow_up_trackinggrid", "x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_createddatetime" class="ivf_follow_up_tracking_createddatetime">
<span<?php echo $ivf_follow_up_tracking->createddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $ivf_follow_up_tracking->modifiedby->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_modifiedby" class="form-group ivf_follow_up_tracking_modifiedby">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->modifiedby->EditValue ?>"<?php echo $ivf_follow_up_tracking->modifiedby->editAttributes() ?>>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_modifiedby" class="form-group ivf_follow_up_tracking_modifiedby">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->modifiedby->EditValue ?>"<?php echo $ivf_follow_up_tracking->modifiedby->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_modifiedby" class="ivf_follow_up_tracking_modifiedby">
<span<?php echo $ivf_follow_up_tracking->modifiedby->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $ivf_follow_up_tracking->modifieddatetime->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_modifieddatetime" class="form-group ivf_follow_up_tracking_modifieddatetime">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->modifieddatetime->EditValue ?>"<?php echo $ivf_follow_up_tracking->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_follow_up_tracking->modifieddatetime->ReadOnly && !$ivf_follow_up_tracking->modifieddatetime->Disabled && !isset($ivf_follow_up_tracking->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_follow_up_tracking->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_follow_up_trackinggrid", "x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_modifieddatetime" class="form-group ivf_follow_up_tracking_modifieddatetime">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->modifieddatetime->EditValue ?>"<?php echo $ivf_follow_up_tracking->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_follow_up_tracking->modifieddatetime->ReadOnly && !$ivf_follow_up_tracking->modifieddatetime->Disabled && !isset($ivf_follow_up_tracking->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_follow_up_tracking->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_follow_up_trackinggrid", "x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_modifieddatetime" class="ivf_follow_up_tracking_modifieddatetime">
<span<?php echo $ivf_follow_up_tracking->modifieddatetime->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo"<?php echo $ivf_follow_up_tracking->TidNo->cellAttributes() ?>>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($ivf_follow_up_tracking->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_TidNo" class="form-group ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_TidNo" class="form-group ivf_follow_up_tracking_TidNo">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->TidNo->EditValue ?>"<?php echo $ivf_follow_up_tracking->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->OldValue) ?>">
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($ivf_follow_up_tracking->TidNo->getSessionValue() <> "") { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_TidNo" class="form-group ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_TidNo" class="form-group ivf_follow_up_tracking_TidNo">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->TidNo->EditValue ?>"<?php echo $ivf_follow_up_tracking->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $ivf_follow_up_tracking_grid->RowCnt ?>_ivf_follow_up_tracking_TidNo" class="ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->TidNo->getViewValue() ?></span>
</span>
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="fivf_follow_up_trackinggrid$x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->FormValue) ?>">
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="fivf_follow_up_trackinggrid$o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_follow_up_tracking_grid->ListOptions->render("body", "right", $ivf_follow_up_tracking_grid->RowCnt);
?>
	</tr>
<?php if ($ivf_follow_up_tracking->RowType == ROWTYPE_ADD || $ivf_follow_up_tracking->RowType == ROWTYPE_EDIT) { ?>
<script>
fivf_follow_up_trackinggrid.updateLists(<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$ivf_follow_up_tracking->isGridAdd() || $ivf_follow_up_tracking->CurrentMode == "copy")
		if (!$ivf_follow_up_tracking_grid->Recordset->EOF)
			$ivf_follow_up_tracking_grid->Recordset->moveNext();
}
?>
<?php
	if ($ivf_follow_up_tracking->CurrentMode == "add" || $ivf_follow_up_tracking->CurrentMode == "copy" || $ivf_follow_up_tracking->CurrentMode == "edit") {
		$ivf_follow_up_tracking_grid->RowIndex = '$rowindex$';
		$ivf_follow_up_tracking_grid->loadRowValues();

		// Set row properties
		$ivf_follow_up_tracking->resetAttributes();
		$ivf_follow_up_tracking->RowAttrs = array_merge($ivf_follow_up_tracking->RowAttrs, array('data-rowindex'=>$ivf_follow_up_tracking_grid->RowIndex, 'id'=>'r0_ivf_follow_up_tracking', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($ivf_follow_up_tracking->RowAttrs["class"], "ew-template");
		$ivf_follow_up_tracking->RowType = ROWTYPE_ADD;

		// Render row
		$ivf_follow_up_tracking_grid->renderRow();

		// Render list options
		$ivf_follow_up_tracking_grid->renderListOptions();
		$ivf_follow_up_tracking_grid->StartRowCnt = 0;
?>
	<tr<?php echo $ivf_follow_up_tracking->rowAttributes() ?>>
<?php

// Render list options (body, left)
$ivf_follow_up_tracking_grid->ListOptions->render("body", "left", $ivf_follow_up_tracking_grid->RowIndex);
?>
	<?php if ($ivf_follow_up_tracking->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_id" class="form-group ivf_follow_up_tracking_id">
<span<?php echo $ivf_follow_up_tracking->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_id" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($ivf_follow_up_tracking->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->RIDNO->Visible) { // RIDNO ?>
		<td data-name="RIDNO">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<?php if ($ivf_follow_up_tracking->RIDNO->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_RIDNO" class="form-group ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_RIDNO" class="form-group ivf_follow_up_tracking_RIDNO">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->RIDNO->EditValue ?>"<?php echo $ivf_follow_up_tracking->RIDNO->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_RIDNO" class="form-group ivf_follow_up_tracking_RIDNO">
<span<?php echo $ivf_follow_up_tracking->RIDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->RIDNO->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_RIDNO" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_RIDNO" value="<?php echo HtmlEncode($ivf_follow_up_tracking->RIDNO->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->Name->Visible) { // Name ?>
		<td data-name="Name">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<?php if ($ivf_follow_up_tracking->Name->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_Name" class="form-group ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_Name" class="form-group ivf_follow_up_tracking_Name">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_Name" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->Name->EditValue ?>"<?php echo $ivf_follow_up_tracking->Name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_Name" class="form-group ivf_follow_up_tracking_Name">
<span<?php echo $ivf_follow_up_tracking->Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->Name->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Name" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Name" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Name" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Name->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->Age->Visible) { // Age ?>
		<td data-name="Age">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_Age" class="form-group ivf_follow_up_tracking_Age">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_Age" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->Age->EditValue ?>"<?php echo $ivf_follow_up_tracking->Age->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_Age" class="form-group ivf_follow_up_tracking_Age">
<span<?php echo $ivf_follow_up_tracking->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->Age->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Age" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_Age" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_Age" value="<?php echo HtmlEncode($ivf_follow_up_tracking->Age->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->MReadMore->Visible) { // MReadMore ?>
		<td data-name="MReadMore">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_MReadMore" class="form-group ivf_follow_up_tracking_MReadMore">
<textarea data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" cols="35" rows="4" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->getPlaceHolder()) ?>"<?php echo $ivf_follow_up_tracking->MReadMore->editAttributes() ?>><?php echo $ivf_follow_up_tracking->MReadMore->EditValue ?></textarea>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_MReadMore" class="form-group ivf_follow_up_tracking_MReadMore">
<span<?php echo $ivf_follow_up_tracking->MReadMore->viewAttributes() ?>>
<?php echo $ivf_follow_up_tracking->MReadMore->ViewValue ?></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" value="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_MReadMore" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_MReadMore" value="<?php echo HtmlEncode($ivf_follow_up_tracking->MReadMore->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_status" class="form-group ivf_follow_up_tracking_status">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_status" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->status->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->status->EditValue ?>"<?php echo $ivf_follow_up_tracking->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_status" class="form-group ivf_follow_up_tracking_status">
<span<?php echo $ivf_follow_up_tracking->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_status" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_follow_up_tracking->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_status" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($ivf_follow_up_tracking->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_createdby" class="form-group ivf_follow_up_tracking_createdby">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->createdby->EditValue ?>"<?php echo $ivf_follow_up_tracking->createdby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_createdby" class="form-group ivf_follow_up_tracking_createdby">
<span<?php echo $ivf_follow_up_tracking->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createdby" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_createddatetime" class="form-group ivf_follow_up_tracking_createddatetime">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->createddatetime->EditValue ?>"<?php echo $ivf_follow_up_tracking->createddatetime->editAttributes() ?>>
<?php if (!$ivf_follow_up_tracking->createddatetime->ReadOnly && !$ivf_follow_up_tracking->createddatetime->Disabled && !isset($ivf_follow_up_tracking->createddatetime->EditAttrs["readonly"]) && !isset($ivf_follow_up_tracking->createddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_follow_up_trackinggrid", "x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_createddatetime" class="form-group ivf_follow_up_tracking_createddatetime">
<span<?php echo $ivf_follow_up_tracking->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_createddatetime" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_modifiedby" class="form-group ivf_follow_up_tracking_modifiedby">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->modifiedby->EditValue ?>"<?php echo $ivf_follow_up_tracking->modifiedby->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_modifiedby" class="form-group ivf_follow_up_tracking_modifiedby">
<span<?php echo $ivf_follow_up_tracking->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifiedby" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_modifieddatetime" class="form-group ivf_follow_up_tracking_modifieddatetime">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->modifieddatetime->EditValue ?>"<?php echo $ivf_follow_up_tracking->modifieddatetime->editAttributes() ?>>
<?php if (!$ivf_follow_up_tracking->modifieddatetime->ReadOnly && !$ivf_follow_up_tracking->modifieddatetime->Disabled && !isset($ivf_follow_up_tracking->modifieddatetime->EditAttrs["readonly"]) && !isset($ivf_follow_up_tracking->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fivf_follow_up_trackinggrid", "x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_modifieddatetime" class="form-group ivf_follow_up_tracking_modifieddatetime">
<span<?php echo $ivf_follow_up_tracking->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_modifieddatetime" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($ivf_follow_up_tracking->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($ivf_follow_up_tracking->TidNo->Visible) { // TidNo ?>
		<td data-name="TidNo">
<?php if (!$ivf_follow_up_tracking->isConfirm()) { ?>
<?php if ($ivf_follow_up_tracking->TidNo->getSessionValue() <> "") { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_TidNo" class="form-group ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_TidNo" class="form-group ivf_follow_up_tracking_TidNo">
<input type="text" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" size="30" placeholder="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->getPlaceHolder()) ?>" value="<?php echo $ivf_follow_up_tracking->TidNo->EditValue ?>"<?php echo $ivf_follow_up_tracking->TidNo->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_ivf_follow_up_tracking_TidNo" class="form-group ivf_follow_up_tracking_TidNo">
<span<?php echo $ivf_follow_up_tracking->TidNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($ivf_follow_up_tracking->TidNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="x<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="ivf_follow_up_tracking" data-field="x_TidNo" name="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" id="o<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>_TidNo" value="<?php echo HtmlEncode($ivf_follow_up_tracking->TidNo->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$ivf_follow_up_tracking_grid->ListOptions->render("body", "right", $ivf_follow_up_tracking_grid->RowIndex);
?>
<script>
fivf_follow_up_trackinggrid.updateLists(<?php echo $ivf_follow_up_tracking_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($ivf_follow_up_tracking->CurrentMode == "add" || $ivf_follow_up_tracking->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $ivf_follow_up_tracking_grid->FormKeyCountName ?>" id="<?php echo $ivf_follow_up_tracking_grid->FormKeyCountName ?>" value="<?php echo $ivf_follow_up_tracking_grid->KeyCount ?>">
<?php echo $ivf_follow_up_tracking_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $ivf_follow_up_tracking_grid->FormKeyCountName ?>" id="<?php echo $ivf_follow_up_tracking_grid->FormKeyCountName ?>" value="<?php echo $ivf_follow_up_tracking_grid->KeyCount ?>">
<?php echo $ivf_follow_up_tracking_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($ivf_follow_up_tracking->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fivf_follow_up_trackinggrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($ivf_follow_up_tracking_grid->Recordset)
	$ivf_follow_up_tracking_grid->Recordset->Close();
?>
</div>
<?php if ($ivf_follow_up_tracking_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $ivf_follow_up_tracking_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($ivf_follow_up_tracking_grid->TotalRecs == 0 && !$ivf_follow_up_tracking->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $ivf_follow_up_tracking_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$ivf_follow_up_tracking_grid->terminate();
?>
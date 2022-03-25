<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($employee_has_experience_grid))
	$employee_has_experience_grid = new employee_has_experience_grid();

// Run the page
$employee_has_experience_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$employee_has_experience_grid->Page_Render();
?>
<?php if (!$employee_has_experience->isExport()) { ?>
<script>

// Form object
var femployee_has_experiencegrid = new ew.Form("femployee_has_experiencegrid", "grid");
femployee_has_experiencegrid.formKeyCountName = '<?php echo $employee_has_experience_grid->FormKeyCountName ?>';

// Validate form
femployee_has_experiencegrid.validate = function() {
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
		<?php if ($employee_has_experience_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->id->caption(), $employee_has_experience->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_grid->employee_id->Required) { ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->employee_id->caption(), $employee_has_experience->employee_id->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_employee_id");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->employee_id->errorMessage()) ?>");
		<?php if ($employee_has_experience_grid->working_at->Required) { ?>
			elm = this.getElements("x" + infix + "_working_at");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->working_at->caption(), $employee_has_experience->working_at->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_grid->job_description->Required) { ?>
			elm = this.getElements("x" + infix + "_job_description");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->job_description->caption(), $employee_has_experience->job_description->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_grid->role->Required) { ?>
			elm = this.getElements("x" + infix + "_role");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->role->caption(), $employee_has_experience->role->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_grid->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->start_date->caption(), $employee_has_experience->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->start_date->errorMessage()) ?>");
		<?php if ($employee_has_experience_grid->end_date->Required) { ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->end_date->caption(), $employee_has_experience->end_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->end_date->errorMessage()) ?>");
		<?php if ($employee_has_experience_grid->total_experience->Required) { ?>
			elm = this.getElements("x" + infix + "_total_experience");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->total_experience->caption(), $employee_has_experience->total_experience->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_grid->certificates->Required) { ?>
			felm = this.getElements("x" + infix + "_certificates");
			elm = this.getElements("fn_x" + infix + "_certificates");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->certificates->caption(), $employee_has_experience->certificates->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_grid->others->Required) { ?>
			felm = this.getElements("x" + infix + "_others");
			elm = this.getElements("fn_x" + infix + "_others");
			if (felm && elm && !ew.hasValue(elm))
				return this.onError(felm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->others->caption(), $employee_has_experience->others->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->status->caption(), $employee_has_experience->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($employee_has_experience_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $employee_has_experience->HospID->caption(), $employee_has_experience->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($employee_has_experience->HospID->errorMessage()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
femployee_has_experiencegrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "employee_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "working_at", false)) return false;
	if (ew.valueChanged(fobj, infix, "job_description", false)) return false;
	if (ew.valueChanged(fobj, infix, "role", false)) return false;
	if (ew.valueChanged(fobj, infix, "start_date", false)) return false;
	if (ew.valueChanged(fobj, infix, "end_date", false)) return false;
	if (ew.valueChanged(fobj, infix, "total_experience", false)) return false;
	if (ew.valueChanged(fobj, infix, "certificates", false)) return false;
	if (ew.valueChanged(fobj, infix, "others", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	if (ew.valueChanged(fobj, infix, "HospID", false)) return false;
	return true;
}

// Form_CustomValidate event
femployee_has_experiencegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
femployee_has_experiencegrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
femployee_has_experiencegrid.lists["x_status"] = <?php echo $employee_has_experience_grid->status->Lookup->toClientList() ?>;
femployee_has_experiencegrid.lists["x_status"].options = <?php echo JsonEncode($employee_has_experience_grid->status->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$employee_has_experience_grid->renderOtherOptions();
?>
<?php $employee_has_experience_grid->showPageHeader(); ?>
<?php
$employee_has_experience_grid->showMessage();
?>
<?php if ($employee_has_experience_grid->TotalRecs > 0 || $employee_has_experience->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($employee_has_experience_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_experience">
<?php if ($employee_has_experience_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $employee_has_experience_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_has_experiencegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_has_experience" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_has_experiencegrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$employee_has_experience_grid->RowType = ROWTYPE_HEADER;

// Render list options
$employee_has_experience_grid->renderListOptions();

// Render list options (header, left)
$employee_has_experience_grid->ListOptions->render("header", "left");
?>
<?php if ($employee_has_experience->id->Visible) { // id ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->id) == "") { ?>
		<th data-name="id" class="<?php echo $employee_has_experience->id->headerCellClass() ?>"><div id="elh_employee_has_experience_id" class="employee_has_experience_id"><div class="ew-table-header-caption"><?php echo $employee_has_experience->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $employee_has_experience->id->headerCellClass() ?>"><div><div id="elh_employee_has_experience_id" class="employee_has_experience_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->employee_id) == "") { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_experience->employee_id->headerCellClass() ?>"><div id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id"><div class="ew-table-header-caption"><?php echo $employee_has_experience->employee_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="employee_id" class="<?php echo $employee_has_experience->employee_id->headerCellClass() ?>"><div><div id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->employee_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->employee_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->working_at) == "") { ?>
		<th data-name="working_at" class="<?php echo $employee_has_experience->working_at->headerCellClass() ?>"><div id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at"><div class="ew-table-header-caption"><?php echo $employee_has_experience->working_at->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="working_at" class="<?php echo $employee_has_experience->working_at->headerCellClass() ?>"><div><div id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->working_at->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->working_at->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->working_at->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->job_description) == "") { ?>
		<th data-name="job_description" class="<?php echo $employee_has_experience->job_description->headerCellClass() ?>"><div id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description"><div class="ew-table-header-caption"><?php echo $employee_has_experience->job_description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="job_description" class="<?php echo $employee_has_experience->job_description->headerCellClass() ?>"><div><div id="elh_employee_has_experience_job_description" class="employee_has_experience_job_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->job_description->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->job_description->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->job_description->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->role->Visible) { // role ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->role) == "") { ?>
		<th data-name="role" class="<?php echo $employee_has_experience->role->headerCellClass() ?>"><div id="elh_employee_has_experience_role" class="employee_has_experience_role"><div class="ew-table-header-caption"><?php echo $employee_has_experience->role->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="role" class="<?php echo $employee_has_experience->role->headerCellClass() ?>"><div><div id="elh_employee_has_experience_role" class="employee_has_experience_role">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->role->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->role->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->role->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $employee_has_experience->start_date->headerCellClass() ?>"><div id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date"><div class="ew-table-header-caption"><?php echo $employee_has_experience->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $employee_has_experience->start_date->headerCellClass() ?>"><div><div id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $employee_has_experience->end_date->headerCellClass() ?>"><div id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date"><div class="ew-table-header-caption"><?php echo $employee_has_experience->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $employee_has_experience->end_date->headerCellClass() ?>"><div><div id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->end_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->end_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->total_experience) == "") { ?>
		<th data-name="total_experience" class="<?php echo $employee_has_experience->total_experience->headerCellClass() ?>"><div id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience"><div class="ew-table-header-caption"><?php echo $employee_has_experience->total_experience->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="total_experience" class="<?php echo $employee_has_experience->total_experience->headerCellClass() ?>"><div><div id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->total_experience->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->total_experience->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->total_experience->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->certificates) == "") { ?>
		<th data-name="certificates" class="<?php echo $employee_has_experience->certificates->headerCellClass() ?>"><div id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates"><div class="ew-table-header-caption"><?php echo $employee_has_experience->certificates->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="certificates" class="<?php echo $employee_has_experience->certificates->headerCellClass() ?>"><div><div id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->certificates->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->certificates->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->certificates->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->others->Visible) { // others ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->others) == "") { ?>
		<th data-name="others" class="<?php echo $employee_has_experience->others->headerCellClass() ?>"><div id="elh_employee_has_experience_others" class="employee_has_experience_others"><div class="ew-table-header-caption"><?php echo $employee_has_experience->others->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="others" class="<?php echo $employee_has_experience->others->headerCellClass() ?>"><div><div id="elh_employee_has_experience_others" class="employee_has_experience_others">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->others->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->others->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->others->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->status->Visible) { // status ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->status) == "") { ?>
		<th data-name="status" class="<?php echo $employee_has_experience->status->headerCellClass() ?>"><div id="elh_employee_has_experience_status" class="employee_has_experience_status"><div class="ew-table-header-caption"><?php echo $employee_has_experience->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $employee_has_experience->status->headerCellClass() ?>"><div><div id="elh_employee_has_experience_status" class="employee_has_experience_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
	<?php if ($employee_has_experience->sortUrl($employee_has_experience->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $employee_has_experience->HospID->headerCellClass() ?>"><div id="elh_employee_has_experience_HospID" class="employee_has_experience_HospID"><div class="ew-table-header-caption"><?php echo $employee_has_experience->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $employee_has_experience->HospID->headerCellClass() ?>"><div><div id="elh_employee_has_experience_HospID" class="employee_has_experience_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $employee_has_experience->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($employee_has_experience->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($employee_has_experience->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$employee_has_experience_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$employee_has_experience_grid->StartRec = 1;
$employee_has_experience_grid->StopRec = $employee_has_experience_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $employee_has_experience_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($employee_has_experience_grid->FormKeyCountName) && ($employee_has_experience->isGridAdd() || $employee_has_experience->isGridEdit() || $employee_has_experience->isConfirm())) {
		$employee_has_experience_grid->KeyCount = $CurrentForm->getValue($employee_has_experience_grid->FormKeyCountName);
		$employee_has_experience_grid->StopRec = $employee_has_experience_grid->StartRec + $employee_has_experience_grid->KeyCount - 1;
	}
}
$employee_has_experience_grid->RecCnt = $employee_has_experience_grid->StartRec - 1;
if ($employee_has_experience_grid->Recordset && !$employee_has_experience_grid->Recordset->EOF) {
	$employee_has_experience_grid->Recordset->moveFirst();
	$selectLimit = $employee_has_experience_grid->UseSelectLimit;
	if (!$selectLimit && $employee_has_experience_grid->StartRec > 1)
		$employee_has_experience_grid->Recordset->move($employee_has_experience_grid->StartRec - 1);
} elseif (!$employee_has_experience->AllowAddDeleteRow && $employee_has_experience_grid->StopRec == 0) {
	$employee_has_experience_grid->StopRec = $employee_has_experience->GridAddRowCount;
}

// Initialize aggregate
$employee_has_experience->RowType = ROWTYPE_AGGREGATEINIT;
$employee_has_experience->resetAttributes();
$employee_has_experience_grid->renderRow();
if ($employee_has_experience->isGridAdd())
	$employee_has_experience_grid->RowIndex = 0;
if ($employee_has_experience->isGridEdit())
	$employee_has_experience_grid->RowIndex = 0;
while ($employee_has_experience_grid->RecCnt < $employee_has_experience_grid->StopRec) {
	$employee_has_experience_grid->RecCnt++;
	if ($employee_has_experience_grid->RecCnt >= $employee_has_experience_grid->StartRec) {
		$employee_has_experience_grid->RowCnt++;
		if ($employee_has_experience->isGridAdd() || $employee_has_experience->isGridEdit() || $employee_has_experience->isConfirm()) {
			$employee_has_experience_grid->RowIndex++;
			$CurrentForm->Index = $employee_has_experience_grid->RowIndex;
			if ($CurrentForm->hasValue($employee_has_experience_grid->FormActionName) && $employee_has_experience_grid->EventCancelled)
				$employee_has_experience_grid->RowAction = strval($CurrentForm->getValue($employee_has_experience_grid->FormActionName));
			elseif ($employee_has_experience->isGridAdd())
				$employee_has_experience_grid->RowAction = "insert";
			else
				$employee_has_experience_grid->RowAction = "";
		}

		// Set up key count
		$employee_has_experience_grid->KeyCount = $employee_has_experience_grid->RowIndex;

		// Init row class and style
		$employee_has_experience->resetAttributes();
		$employee_has_experience->CssClass = "";
		if ($employee_has_experience->isGridAdd()) {
			if ($employee_has_experience->CurrentMode == "copy") {
				$employee_has_experience_grid->loadRowValues($employee_has_experience_grid->Recordset); // Load row values
				$employee_has_experience_grid->setRecordKey($employee_has_experience_grid->RowOldKey, $employee_has_experience_grid->Recordset); // Set old record key
			} else {
				$employee_has_experience_grid->loadRowValues(); // Load default values
				$employee_has_experience_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$employee_has_experience_grid->loadRowValues($employee_has_experience_grid->Recordset); // Load row values
		}
		$employee_has_experience->RowType = ROWTYPE_VIEW; // Render view
		if ($employee_has_experience->isGridAdd()) // Grid add
			$employee_has_experience->RowType = ROWTYPE_ADD; // Render add
		if ($employee_has_experience->isGridAdd() && $employee_has_experience->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$employee_has_experience_grid->restoreCurrentRowFormValues($employee_has_experience_grid->RowIndex); // Restore form values
		if ($employee_has_experience->isGridEdit()) { // Grid edit
			if ($employee_has_experience->EventCancelled)
				$employee_has_experience_grid->restoreCurrentRowFormValues($employee_has_experience_grid->RowIndex); // Restore form values
			if ($employee_has_experience_grid->RowAction == "insert")
				$employee_has_experience->RowType = ROWTYPE_ADD; // Render add
			else
				$employee_has_experience->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($employee_has_experience->isGridEdit() && ($employee_has_experience->RowType == ROWTYPE_EDIT || $employee_has_experience->RowType == ROWTYPE_ADD) && $employee_has_experience->EventCancelled) // Update failed
			$employee_has_experience_grid->restoreCurrentRowFormValues($employee_has_experience_grid->RowIndex); // Restore form values
		if ($employee_has_experience->RowType == ROWTYPE_EDIT) // Edit row
			$employee_has_experience_grid->EditRowCnt++;
		if ($employee_has_experience->isConfirm()) // Confirm row
			$employee_has_experience_grid->restoreCurrentRowFormValues($employee_has_experience_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$employee_has_experience->RowAttrs = array_merge($employee_has_experience->RowAttrs, array('data-rowindex'=>$employee_has_experience_grid->RowCnt, 'id'=>'r' . $employee_has_experience_grid->RowCnt . '_employee_has_experience', 'data-rowtype'=>$employee_has_experience->RowType));

		// Render row
		$employee_has_experience_grid->renderRow();

		// Render list options
		$employee_has_experience_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($employee_has_experience_grid->RowAction <> "delete" && $employee_has_experience_grid->RowAction <> "insertdelete" && !($employee_has_experience_grid->RowAction == "insert" && $employee_has_experience->isConfirm() && $employee_has_experience_grid->emptyRow())) {
?>
	<tr<?php echo $employee_has_experience->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_experience_grid->ListOptions->render("body", "left", $employee_has_experience_grid->RowCnt);
?>
	<?php if ($employee_has_experience->id->Visible) { // id ?>
		<td data-name="id"<?php echo $employee_has_experience->id->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_id" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_id" class="form-group employee_has_experience_id">
<span<?php echo $employee_has_experience->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_id" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->CurrentValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_id" class="employee_has_experience_id">
<span<?php echo $employee_has_experience->id->viewAttributes() ?>>
<?php echo $employee_has_experience->id->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_id" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_id" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_id" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_id" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id"<?php echo $employee_has_experience->employee_id->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($employee_has_experience->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->employee_id->EditValue ?>"<?php echo $employee_has_experience->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($employee_has_experience->employee_id->getSessionValue() <> "") { ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->employee_id->EditValue ?>"<?php echo $employee_has_experience->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_employee_id" class="employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<?php echo $employee_has_experience->employee_id->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
		<td data-name="working_at"<?php echo $employee_has_experience->working_at->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->working_at->EditValue ?>"<?php echo $employee_has_experience->working_at->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->working_at->EditValue ?>"<?php echo $employee_has_experience->working_at->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_working_at" class="employee_has_experience_working_at">
<span<?php echo $employee_has_experience->working_at->viewAttributes() ?>>
<?php echo $employee_has_experience->working_at->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
		<td data-name="job_description"<?php echo $employee_has_experience->job_description->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_job_description" class="form-group employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->job_description->EditValue ?>"<?php echo $employee_has_experience->job_description->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_job_description" class="form-group employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->job_description->EditValue ?>"<?php echo $employee_has_experience->job_description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_job_description" class="employee_has_experience_job_description">
<span<?php echo $employee_has_experience->job_description->viewAttributes() ?>>
<?php echo $employee_has_experience->job_description->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->role->Visible) { // role ?>
		<td data-name="role"<?php echo $employee_has_experience->role->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->role->EditValue ?>"<?php echo $employee_has_experience->role->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->role->EditValue ?>"<?php echo $employee_has_experience->role->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_role" class="employee_has_experience_role">
<span<?php echo $employee_has_experience->role->viewAttributes() ?>>
<?php echo $employee_has_experience->role->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
		<td data-name="start_date"<?php echo $employee_has_experience->start_date->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->start_date->EditValue ?>"<?php echo $employee_has_experience->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience->start_date->ReadOnly && !$employee_has_experience->start_date->Disabled && !isset($employee_has_experience->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencegrid", "x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->start_date->EditValue ?>"<?php echo $employee_has_experience->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience->start_date->ReadOnly && !$employee_has_experience->start_date->Disabled && !isset($employee_has_experience->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencegrid", "x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_start_date" class="employee_has_experience_start_date">
<span<?php echo $employee_has_experience->start_date->viewAttributes() ?>>
<?php echo $employee_has_experience->start_date->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
		<td data-name="end_date"<?php echo $employee_has_experience->end_date->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->end_date->EditValue ?>"<?php echo $employee_has_experience->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience->end_date->ReadOnly && !$employee_has_experience->end_date->Disabled && !isset($employee_has_experience->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencegrid", "x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->end_date->EditValue ?>"<?php echo $employee_has_experience->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience->end_date->ReadOnly && !$employee_has_experience->end_date->Disabled && !isset($employee_has_experience->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencegrid", "x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_end_date" class="employee_has_experience_end_date">
<span<?php echo $employee_has_experience->end_date->viewAttributes() ?>>
<?php echo $employee_has_experience->end_date->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
		<td data-name="total_experience"<?php echo $employee_has_experience->total_experience->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->total_experience->EditValue ?>"<?php echo $employee_has_experience->total_experience->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->total_experience->EditValue ?>"<?php echo $employee_has_experience->total_experience->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_total_experience" class="employee_has_experience_total_experience">
<span<?php echo $employee_has_experience->total_experience->viewAttributes() ?>>
<?php echo $employee_has_experience->total_experience->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
		<td data-name="certificates"<?php echo $employee_has_experience->certificates->cellAttributes() ?>>
<?php if ($employee_has_experience_grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_experience->certificates->title() ? $employee_has_experience->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->certificates->ReadOnly || $employee_has_experience->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_experience->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_experience->certificates->OldValue) ?>">
<?php } elseif ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_certificates" class="employee_has_experience_certificates">
<span>
<?php echo GetFileViewTag($employee_has_experience->certificates, $employee_has_experience->certificates->getViewValue()) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_experience->certificates->title() ? $employee_has_experience->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->certificates->ReadOnly || $employee_has_experience->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_experience->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->others->Visible) { // others ?>
		<td data-name="others"<?php echo $employee_has_experience->others->cellAttributes() ?>>
<?php if ($employee_has_experience_grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_employee_has_experience_others" class="form-group employee_has_experience_others">
<div id="fd_x<?php echo $employee_has_experience_grid->RowIndex ?>_others">
<span title="<?php echo $employee_has_experience->others->title() ? $employee_has_experience->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->others->ReadOnly || $employee_has_experience->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_experience->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_others" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_others" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_experience->others->OldValue) ?>">
<?php } elseif ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_others" class="employee_has_experience_others">
<span<?php echo $employee_has_experience->others->viewAttributes() ?>>
<?php echo GetFileViewTag($employee_has_experience->others, $employee_has_experience->others->getViewValue()) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_others" class="form-group employee_has_experience_others">
<div id="fd_x<?php echo $employee_has_experience_grid->RowIndex ?>_others">
<span title="<?php echo $employee_has_experience->others->title() ? $employee_has_experience->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->others->ReadOnly || $employee_has_experience->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_experience->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->Upload->FileName ?>">
<?php if (Post("fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others") == "0") { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="0">
<?php } else { ?>
<input type="hidden" name="fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="1">
<?php } ?>
<input type="hidden" name="fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->status->Visible) { // status ?>
		<td data-name="status"<?php echo $employee_has_experience->status->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_status" class="form-group employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_status" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_status"<?php echo $employee_has_experience->status->editAttributes() ?>>
		<?php echo $employee_has_experience->status->selectOptionListHtml("x<?php echo $employee_has_experience_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_experience->status->Lookup->getParamTag("p_x" . $employee_has_experience_grid->RowIndex . "_status") ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_status" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_status" class="form-group employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_status" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_status"<?php echo $employee_has_experience->status->editAttributes() ?>>
		<?php echo $employee_has_experience->status->selectOptionListHtml("x<?php echo $employee_has_experience_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_experience->status->Lookup->getParamTag("p_x" . $employee_has_experience_grid->RowIndex . "_status") ?>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_status" class="employee_has_experience_status">
<span<?php echo $employee_has_experience->status->viewAttributes() ?>>
<?php echo $employee_has_experience->status->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_status" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_status" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_status" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_status" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $employee_has_experience->HospID->cellAttributes() ?>>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<input type="text" data-table="employee_has_experience" data-field="x_HospID" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->HospID->EditValue ?>"<?php echo $employee_has_experience->HospID->editAttributes() ?>>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->OldValue) ?>">
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<input type="text" data-table="employee_has_experience" data-field="x_HospID" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->HospID->EditValue ?>"<?php echo $employee_has_experience->HospID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($employee_has_experience->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $employee_has_experience_grid->RowCnt ?>_employee_has_experience_HospID" class="employee_has_experience_HospID">
<span<?php echo $employee_has_experience->HospID->viewAttributes() ?>>
<?php echo $employee_has_experience->HospID->getViewValue() ?></span>
</span>
<?php if (!$employee_has_experience->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="femployee_has_experiencegrid$x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="femployee_has_experiencegrid$o<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_experience_grid->ListOptions->render("body", "right", $employee_has_experience_grid->RowCnt);
?>
	</tr>
<?php if ($employee_has_experience->RowType == ROWTYPE_ADD || $employee_has_experience->RowType == ROWTYPE_EDIT) { ?>
<script>
femployee_has_experiencegrid.updateLists(<?php echo $employee_has_experience_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$employee_has_experience->isGridAdd() || $employee_has_experience->CurrentMode == "copy")
		if (!$employee_has_experience_grid->Recordset->EOF)
			$employee_has_experience_grid->Recordset->moveNext();
}
?>
<?php
	if ($employee_has_experience->CurrentMode == "add" || $employee_has_experience->CurrentMode == "copy" || $employee_has_experience->CurrentMode == "edit") {
		$employee_has_experience_grid->RowIndex = '$rowindex$';
		$employee_has_experience_grid->loadRowValues();

		// Set row properties
		$employee_has_experience->resetAttributes();
		$employee_has_experience->RowAttrs = array_merge($employee_has_experience->RowAttrs, array('data-rowindex'=>$employee_has_experience_grid->RowIndex, 'id'=>'r0_employee_has_experience', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($employee_has_experience->RowAttrs["class"], "ew-template");
		$employee_has_experience->RowType = ROWTYPE_ADD;

		// Render row
		$employee_has_experience_grid->renderRow();

		// Render list options
		$employee_has_experience_grid->renderListOptions();
		$employee_has_experience_grid->StartRowCnt = 0;
?>
	<tr<?php echo $employee_has_experience->rowAttributes() ?>>
<?php

// Render list options (body, left)
$employee_has_experience_grid->ListOptions->render("body", "left", $employee_has_experience_grid->RowIndex);
?>
	<?php if ($employee_has_experience->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_id" class="form-group employee_has_experience_id">
<span<?php echo $employee_has_experience->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_id" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_id" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($employee_has_experience->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->employee_id->Visible) { // employee_id ?>
		<td data-name="employee_id">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<?php if ($employee_has_experience->employee_id->getSessionValue() <> "") { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="text" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->employee_id->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->employee_id->EditValue ?>"<?php echo $employee_has_experience->employee_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?php echo $employee_has_experience->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->employee_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_employee_id" value="<?php echo HtmlEncode($employee_has_experience->employee_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->working_at->Visible) { // working_at ?>
		<td data-name="working_at">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="text" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->working_at->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->working_at->EditValue ?>"<?php echo $employee_has_experience->working_at->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<span<?php echo $employee_has_experience->working_at->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->working_at->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_working_at" value="<?php echo HtmlEncode($employee_has_experience->working_at->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->job_description->Visible) { // job description ?>
		<td data-name="job_description">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_job_description" class="form-group employee_has_experience_job_description">
<input type="text" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->job_description->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->job_description->EditValue ?>"<?php echo $employee_has_experience->job_description->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_job_description" class="form-group employee_has_experience_job_description">
<span<?php echo $employee_has_experience->job_description->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->job_description->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_job_description" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_job_description" value="<?php echo HtmlEncode($employee_has_experience->job_description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->role->Visible) { // role ?>
		<td data-name="role">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="text" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->role->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->role->EditValue ?>"<?php echo $employee_has_experience->role->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_role" class="form-group employee_has_experience_role">
<span<?php echo $employee_has_experience->role->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->role->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_role" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_role" value="<?php echo HtmlEncode($employee_has_experience->role->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="text" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($employee_has_experience->start_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->start_date->EditValue ?>"<?php echo $employee_has_experience->start_date->editAttributes() ?>>
<?php if (!$employee_has_experience->start_date->ReadOnly && !$employee_has_experience->start_date->Disabled && !isset($employee_has_experience->start_date->EditAttrs["readonly"]) && !isset($employee_has_experience->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencegrid", "x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<span<?php echo $employee_has_experience->start_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->start_date->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($employee_has_experience->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->end_date->Visible) { // end_date ?>
		<td data-name="end_date">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="text" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($employee_has_experience->end_date->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->end_date->EditValue ?>"<?php echo $employee_has_experience->end_date->editAttributes() ?>>
<?php if (!$employee_has_experience->end_date->ReadOnly && !$employee_has_experience->end_date->Disabled && !isset($employee_has_experience->end_date->EditAttrs["readonly"]) && !isset($employee_has_experience->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("femployee_has_experiencegrid", "x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<span<?php echo $employee_has_experience->end_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->end_date->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($employee_has_experience->end_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->total_experience->Visible) { // total_experience ?>
		<td data-name="total_experience">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="text" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($employee_has_experience->total_experience->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->total_experience->EditValue ?>"<?php echo $employee_has_experience->total_experience->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<span<?php echo $employee_has_experience->total_experience->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->total_experience->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_total_experience" value="<?php echo HtmlEncode($employee_has_experience->total_experience->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->certificates->Visible) { // certificates ?>
		<td data-name="certificates">
<span id="el$rowindex$_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates">
<span title="<?php echo $employee_has_experience->certificates->title() ? $employee_has_experience->certificates->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->certificates->ReadOnly || $employee_has_experience->certificates->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_certificates" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" multiple="multiple"<?php echo $employee_has_experience->certificates->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id= "fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo $employee_has_experience->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_certificates" value="<?php echo HtmlEncode($employee_has_experience->certificates->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->others->Visible) { // others ?>
		<td data-name="others">
<span id="el$rowindex$_employee_has_experience_others" class="form-group employee_has_experience_others">
<div id="fd_x<?php echo $employee_has_experience_grid->RowIndex ?>_others">
<span title="<?php echo $employee_has_experience->others->title() ? $employee_has_experience->others->title() : $Language->phrase("ChooseFiles") ?>" class="btn btn-default btn-sm fileinput-button ew-tooltip<?php if ($employee_has_experience->others->ReadOnly || $employee_has_experience->others->Disabled) echo " d-none"; ?>">
	<span><?php echo $Language->phrase("ChooseFileBtn") ?></span>
	<input type="file" title=" " data-table="employee_has_experience" data-field="x_others" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_others" multiple="multiple"<?php echo $employee_has_experience->others->editAttributes() ?>>
</span>
<input type="hidden" name="fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fn_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fa_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="0">
<input type="hidden" name="fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fs_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="100">
<input type="hidden" name="fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fx_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fm_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" id= "fc_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo $employee_has_experience->others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?php echo $employee_has_experience_grid->RowIndex ?>_others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_others" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_others" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_others" value="<?php echo HtmlEncode($employee_has_experience->others->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_status" class="form-group employee_has_experience_status">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="employee_has_experience" data-field="x_status" data-value-separator="<?php echo $employee_has_experience->status->displayValueSeparatorAttribute() ?>" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_status" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_status"<?php echo $employee_has_experience->status->editAttributes() ?>>
		<?php echo $employee_has_experience->status->selectOptionListHtml("x<?php echo $employee_has_experience_grid->RowIndex ?>_status") ?>
	</select>
</div>
<?php echo $employee_has_experience->status->Lookup->getParamTag("p_x" . $employee_has_experience_grid->RowIndex . "_status") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_status" class="form-group employee_has_experience_status">
<span<?php echo $employee_has_experience->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_status" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_status" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($employee_has_experience->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($employee_has_experience->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$employee_has_experience->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<input type="text" data-table="employee_has_experience" data-field="x_HospID" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" size="30" placeholder="<?php echo HtmlEncode($employee_has_experience->HospID->getPlaceHolder()) ?>" value="<?php echo $employee_has_experience->HospID->EditValue ?>"<?php echo $employee_has_experience->HospID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<span<?php echo $employee_has_experience->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($employee_has_experience->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="x<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" name="o<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" id="o<?php echo $employee_has_experience_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($employee_has_experience->HospID->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$employee_has_experience_grid->ListOptions->render("body", "right", $employee_has_experience_grid->RowIndex);
?>
<script>
femployee_has_experiencegrid.updateLists(<?php echo $employee_has_experience_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($employee_has_experience->CurrentMode == "add" || $employee_has_experience->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $employee_has_experience_grid->FormKeyCountName ?>" id="<?php echo $employee_has_experience_grid->FormKeyCountName ?>" value="<?php echo $employee_has_experience_grid->KeyCount ?>">
<?php echo $employee_has_experience_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_has_experience->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $employee_has_experience_grid->FormKeyCountName ?>" id="<?php echo $employee_has_experience_grid->FormKeyCountName ?>" value="<?php echo $employee_has_experience_grid->KeyCount ?>">
<?php echo $employee_has_experience_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($employee_has_experience->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="femployee_has_experiencegrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($employee_has_experience_grid->Recordset)
	$employee_has_experience_grid->Recordset->Close();
?>
</div>
<?php if ($employee_has_experience_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $employee_has_experience_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($employee_has_experience_grid->TotalRecs == 0 && !$employee_has_experience->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $employee_has_experience_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$employee_has_experience_grid->terminate();
?>
<?php if (!$employee_has_experience->isExport()) { ?>
<script>
ew.scrollableTable("gmp_employee_has_experience", "95%", "");
</script>
<?php } ?>
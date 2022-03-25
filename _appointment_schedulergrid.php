<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($_appointment_scheduler_grid))
	$_appointment_scheduler_grid = new _appointment_scheduler_grid();

// Run the page
$_appointment_scheduler_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$_appointment_scheduler_grid->Page_Render();
?>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<script>

// Form object
var f_appointment_schedulergrid = new ew.Form("f_appointment_schedulergrid", "grid");
f_appointment_schedulergrid.formKeyCountName = '<?php echo $_appointment_scheduler_grid->FormKeyCountName ?>';

// Validate form
f_appointment_schedulergrid.validate = function() {
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
		<?php if ($_appointment_scheduler_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->id->caption(), $_appointment_scheduler->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->start_date->Required) { ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->start_date->caption(), $_appointment_scheduler->start_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_start_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($_appointment_scheduler->start_date->errorMessage()) ?>");
		<?php if ($_appointment_scheduler_grid->end_date->Required) { ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->end_date->caption(), $_appointment_scheduler->end_date->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_end_date");
			if (elm && !ew.checkEuroDate(elm.value))
				return this.onError(elm, "<?php echo JsEncode($_appointment_scheduler->end_date->errorMessage()) ?>");
		<?php if ($_appointment_scheduler_grid->patientID->Required) { ?>
			elm = this.getElements("x" + infix + "_patientID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->patientID->caption(), $_appointment_scheduler->patientID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->patientName->Required) { ?>
			elm = this.getElements("x" + infix + "_patientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->patientName->caption(), $_appointment_scheduler->patientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->DoctorID->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->DoctorID->caption(), $_appointment_scheduler->DoctorID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->DoctorName->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->DoctorName->caption(), $_appointment_scheduler->DoctorName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->AppointmentStatus->Required) { ?>
			elm = this.getElements("x" + infix + "_AppointmentStatus");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->AppointmentStatus->caption(), $_appointment_scheduler->AppointmentStatus->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->status->caption(), $_appointment_scheduler->status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->DoctorCode->Required) { ?>
			elm = this.getElements("x" + infix + "_DoctorCode");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->DoctorCode->caption(), $_appointment_scheduler->DoctorCode->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->Department->Required) { ?>
			elm = this.getElements("x" + infix + "_Department");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Department->caption(), $_appointment_scheduler->Department->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->scheduler_id->Required) { ?>
			elm = this.getElements("x" + infix + "_scheduler_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->scheduler_id->caption(), $_appointment_scheduler->scheduler_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->text->Required) { ?>
			elm = this.getElements("x" + infix + "_text");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->text->caption(), $_appointment_scheduler->text->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->appointment_status->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->appointment_status->caption(), $_appointment_scheduler->appointment_status->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->PId->Required) { ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->PId->caption(), $_appointment_scheduler->PId->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_PId");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($_appointment_scheduler->PId->errorMessage()) ?>");
		<?php if ($_appointment_scheduler_grid->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->MobileNumber->caption(), $_appointment_scheduler->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->SchEmail->Required) { ?>
			elm = this.getElements("x" + infix + "_SchEmail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->SchEmail->caption(), $_appointment_scheduler->SchEmail->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->appointment_type->Required) { ?>
			elm = this.getElements("x" + infix + "_appointment_type");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->appointment_type->caption(), $_appointment_scheduler->appointment_type->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->Notified->Required) { ?>
			elm = this.getElements("x" + infix + "_Notified[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Notified->caption(), $_appointment_scheduler->Notified->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->Purpose->Required) { ?>
			elm = this.getElements("x" + infix + "_Purpose");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Purpose->caption(), $_appointment_scheduler->Purpose->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->Notes->Required) { ?>
			elm = this.getElements("x" + infix + "_Notes");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Notes->caption(), $_appointment_scheduler->Notes->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->PatientType->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->PatientType->caption(), $_appointment_scheduler->PatientType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->Referal->Required) { ?>
			elm = this.getElements("x" + infix + "_Referal");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->Referal->caption(), $_appointment_scheduler->Referal->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->paymentType->Required) { ?>
			elm = this.getElements("x" + infix + "_paymentType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->paymentType->caption(), $_appointment_scheduler->paymentType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->WhereDidYouHear->Required) { ?>
			elm = this.getElements("x" + infix + "_WhereDidYouHear[]");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->WhereDidYouHear->caption(), $_appointment_scheduler->WhereDidYouHear->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->HospID->caption(), $_appointment_scheduler->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->createdBy->Required) { ?>
			elm = this.getElements("x" + infix + "_createdBy");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->createdBy->caption(), $_appointment_scheduler->createdBy->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->createdDateTime->Required) { ?>
			elm = this.getElements("x" + infix + "_createdDateTime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->createdDateTime->caption(), $_appointment_scheduler->createdDateTime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($_appointment_scheduler_grid->PatientTypee->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientTypee");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $_appointment_scheduler->PatientTypee->caption(), $_appointment_scheduler->PatientTypee->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
f_appointment_schedulergrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "start_date", false)) return false;
	if (ew.valueChanged(fobj, infix, "end_date", false)) return false;
	if (ew.valueChanged(fobj, infix, "patientID", false)) return false;
	if (ew.valueChanged(fobj, infix, "patientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "DoctorID", false)) return false;
	if (ew.valueChanged(fobj, infix, "DoctorName", false)) return false;
	if (ew.valueChanged(fobj, infix, "AppointmentStatus", false)) return false;
	if (ew.valueChanged(fobj, infix, "status[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "DoctorCode", false)) return false;
	if (ew.valueChanged(fobj, infix, "Department", false)) return false;
	if (ew.valueChanged(fobj, infix, "scheduler_id", false)) return false;
	if (ew.valueChanged(fobj, infix, "text", false)) return false;
	if (ew.valueChanged(fobj, infix, "appointment_status", false)) return false;
	if (ew.valueChanged(fobj, infix, "PId", false)) return false;
	if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "SchEmail", false)) return false;
	if (ew.valueChanged(fobj, infix, "appointment_type", false)) return false;
	if (ew.valueChanged(fobj, infix, "Notified[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "Purpose", false)) return false;
	if (ew.valueChanged(fobj, infix, "Notes", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientType", false)) return false;
	if (ew.valueChanged(fobj, infix, "Referal", false)) return false;
	if (ew.valueChanged(fobj, infix, "paymentType", false)) return false;
	if (ew.valueChanged(fobj, infix, "WhereDidYouHear[]", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientTypee", false)) return false;
	return true;
}

// Form_CustomValidate event
f_appointment_schedulergrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
f_appointment_schedulergrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
f_appointment_schedulergrid.lists["x_patientID"] = <?php echo $_appointment_scheduler_grid->patientID->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_patientID"].options = <?php echo JsonEncode($_appointment_scheduler_grid->patientID->lookupOptions()) ?>;
f_appointment_schedulergrid.lists["x_DoctorName"] = <?php echo $_appointment_scheduler_grid->DoctorName->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_DoctorName"].options = <?php echo JsonEncode($_appointment_scheduler_grid->DoctorName->lookupOptions()) ?>;
f_appointment_schedulergrid.lists["x_status[]"] = <?php echo $_appointment_scheduler_grid->status->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_status[]"].options = <?php echo JsonEncode($_appointment_scheduler_grid->status->options(FALSE, TRUE)) ?>;
f_appointment_schedulergrid.lists["x_appointment_type"] = <?php echo $_appointment_scheduler_grid->appointment_type->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_appointment_type"].options = <?php echo JsonEncode($_appointment_scheduler_grid->appointment_type->options(FALSE, TRUE)) ?>;
f_appointment_schedulergrid.lists["x_Notified[]"] = <?php echo $_appointment_scheduler_grid->Notified->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_Notified[]"].options = <?php echo JsonEncode($_appointment_scheduler_grid->Notified->options(FALSE, TRUE)) ?>;
f_appointment_schedulergrid.lists["x_PatientType"] = <?php echo $_appointment_scheduler_grid->PatientType->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_PatientType"].options = <?php echo JsonEncode($_appointment_scheduler_grid->PatientType->options(FALSE, TRUE)) ?>;
f_appointment_schedulergrid.lists["x_Referal"] = <?php echo $_appointment_scheduler_grid->Referal->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_Referal"].options = <?php echo JsonEncode($_appointment_scheduler_grid->Referal->lookupOptions()) ?>;
f_appointment_schedulergrid.lists["x_WhereDidYouHear[]"] = <?php echo $_appointment_scheduler_grid->WhereDidYouHear->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_WhereDidYouHear[]"].options = <?php echo JsonEncode($_appointment_scheduler_grid->WhereDidYouHear->lookupOptions()) ?>;
f_appointment_schedulergrid.lists["x_PatientTypee"] = <?php echo $_appointment_scheduler_grid->PatientTypee->Lookup->toClientList() ?>;
f_appointment_schedulergrid.lists["x_PatientTypee"].options = <?php echo JsonEncode($_appointment_scheduler_grid->PatientTypee->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$_appointment_scheduler_grid->renderOtherOptions();
?>
<?php $_appointment_scheduler_grid->showPageHeader(); ?>
<?php
$_appointment_scheduler_grid->showMessage();
?>
<?php if ($_appointment_scheduler_grid->TotalRecs > 0 || $_appointment_scheduler->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($_appointment_scheduler_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> _appointment_scheduler">
<?php if ($_appointment_scheduler_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $_appointment_scheduler_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="f_appointment_schedulergrid" class="ew-form ew-list-form form-inline">
<div id="gmp__appointment_scheduler" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl__appointment_schedulergrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$_appointment_scheduler_grid->RowType = ROWTYPE_HEADER;

// Render list options
$_appointment_scheduler_grid->renderListOptions();

// Render list options (header, left)
$_appointment_scheduler_grid->ListOptions->render("header", "left");
?>
<?php if ($_appointment_scheduler->id->Visible) { // id ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->id) == "") { ?>
		<th data-name="id" class="<?php echo $_appointment_scheduler->id->headerCellClass() ?>"><div id="elh__appointment_scheduler_id" class="_appointment_scheduler_id"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $_appointment_scheduler->id->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_id" class="_appointment_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->start_date) == "") { ?>
		<th data-name="start_date" class="<?php echo $_appointment_scheduler->start_date->headerCellClass() ?>"><div id="elh__appointment_scheduler_start_date" class="_appointment_scheduler_start_date"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->start_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="start_date" class="<?php echo $_appointment_scheduler->start_date->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_start_date" class="_appointment_scheduler_start_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->end_date) == "") { ?>
		<th data-name="end_date" class="<?php echo $_appointment_scheduler->end_date->headerCellClass() ?>"><div id="elh__appointment_scheduler_end_date" class="_appointment_scheduler_end_date"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->end_date->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="end_date" class="<?php echo $_appointment_scheduler->end_date->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_end_date" class="_appointment_scheduler_end_date">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->end_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->end_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->patientID) == "") { ?>
		<th data-name="patientID" class="<?php echo $_appointment_scheduler->patientID->headerCellClass() ?>"><div id="elh__appointment_scheduler_patientID" class="_appointment_scheduler_patientID"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientID" class="<?php echo $_appointment_scheduler->patientID->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_patientID" class="_appointment_scheduler_patientID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->patientID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->patientID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->patientName) == "") { ?>
		<th data-name="patientName" class="<?php echo $_appointment_scheduler->patientName->headerCellClass() ?>"><div id="elh__appointment_scheduler_patientName" class="_appointment_scheduler_patientName"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="patientName" class="<?php echo $_appointment_scheduler->patientName->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_patientName" class="_appointment_scheduler_patientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->patientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->patientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->patientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->DoctorID) == "") { ?>
		<th data-name="DoctorID" class="<?php echo $_appointment_scheduler->DoctorID->headerCellClass() ?>"><div id="elh__appointment_scheduler_DoctorID" class="_appointment_scheduler_DoctorID"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorID" class="<?php echo $_appointment_scheduler->DoctorID->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_DoctorID" class="_appointment_scheduler_DoctorID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->DoctorID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->DoctorID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->DoctorName) == "") { ?>
		<th data-name="DoctorName" class="<?php echo $_appointment_scheduler->DoctorName->headerCellClass() ?>"><div id="elh__appointment_scheduler_DoctorName" class="_appointment_scheduler_DoctorName"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorName" class="<?php echo $_appointment_scheduler->DoctorName->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_DoctorName" class="_appointment_scheduler_DoctorName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorName->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->DoctorName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->DoctorName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->AppointmentStatus) == "") { ?>
		<th data-name="AppointmentStatus" class="<?php echo $_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><div id="elh__appointment_scheduler_AppointmentStatus" class="_appointment_scheduler_AppointmentStatus"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AppointmentStatus" class="<?php echo $_appointment_scheduler->AppointmentStatus->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_AppointmentStatus" class="_appointment_scheduler_AppointmentStatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->AppointmentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->AppointmentStatus->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->AppointmentStatus->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->status->Visible) { // status ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->status) == "") { ?>
		<th data-name="status" class="<?php echo $_appointment_scheduler->status->headerCellClass() ?>"><div id="elh__appointment_scheduler_status" class="_appointment_scheduler_status"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $_appointment_scheduler->status->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_status" class="_appointment_scheduler_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->DoctorCode) == "") { ?>
		<th data-name="DoctorCode" class="<?php echo $_appointment_scheduler->DoctorCode->headerCellClass() ?>"><div id="elh__appointment_scheduler_DoctorCode" class="_appointment_scheduler_DoctorCode"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorCode->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DoctorCode" class="<?php echo $_appointment_scheduler->DoctorCode->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_DoctorCode" class="_appointment_scheduler_DoctorCode">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->DoctorCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->DoctorCode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->DoctorCode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $_appointment_scheduler->Department->headerCellClass() ?>"><div id="elh__appointment_scheduler_Department" class="_appointment_scheduler_Department"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $_appointment_scheduler->Department->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_Department" class="_appointment_scheduler_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Department->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Department->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->scheduler_id) == "") { ?>
		<th data-name="scheduler_id" class="<?php echo $_appointment_scheduler->scheduler_id->headerCellClass() ?>"><div id="elh__appointment_scheduler_scheduler_id" class="_appointment_scheduler_scheduler_id"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->scheduler_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="scheduler_id" class="<?php echo $_appointment_scheduler->scheduler_id->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_scheduler_id" class="_appointment_scheduler_scheduler_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->scheduler_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->scheduler_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->scheduler_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->text->Visible) { // text ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->text) == "") { ?>
		<th data-name="text" class="<?php echo $_appointment_scheduler->text->headerCellClass() ?>"><div id="elh__appointment_scheduler_text" class="_appointment_scheduler_text"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->text->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="text" class="<?php echo $_appointment_scheduler->text->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_text" class="_appointment_scheduler_text">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->text->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->text->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->text->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->appointment_status) == "") { ?>
		<th data-name="appointment_status" class="<?php echo $_appointment_scheduler->appointment_status->headerCellClass() ?>"><div id="elh__appointment_scheduler_appointment_status" class="_appointment_scheduler_appointment_status"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_status" class="<?php echo $_appointment_scheduler->appointment_status->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_appointment_status" class="_appointment_scheduler_appointment_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->appointment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->appointment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->PId) == "") { ?>
		<th data-name="PId" class="<?php echo $_appointment_scheduler->PId->headerCellClass() ?>"><div id="elh__appointment_scheduler_PId" class="_appointment_scheduler_PId"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->PId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PId" class="<?php echo $_appointment_scheduler->PId->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_PId" class="_appointment_scheduler_PId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->PId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->PId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $_appointment_scheduler->MobileNumber->headerCellClass() ?>"><div id="elh__appointment_scheduler_MobileNumber" class="_appointment_scheduler_MobileNumber"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $_appointment_scheduler->MobileNumber->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_MobileNumber" class="_appointment_scheduler_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->SchEmail) == "") { ?>
		<th data-name="SchEmail" class="<?php echo $_appointment_scheduler->SchEmail->headerCellClass() ?>"><div id="elh__appointment_scheduler_SchEmail" class="_appointment_scheduler_SchEmail"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->SchEmail->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SchEmail" class="<?php echo $_appointment_scheduler->SchEmail->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_SchEmail" class="_appointment_scheduler_SchEmail">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->SchEmail->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->SchEmail->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->SchEmail->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->appointment_type) == "") { ?>
		<th data-name="appointment_type" class="<?php echo $_appointment_scheduler->appointment_type->headerCellClass() ?>"><div id="elh__appointment_scheduler_appointment_type" class="_appointment_scheduler_appointment_type"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="appointment_type" class="<?php echo $_appointment_scheduler->appointment_type->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_appointment_type" class="_appointment_scheduler_appointment_type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->appointment_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->appointment_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->appointment_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Notified) == "") { ?>
		<th data-name="Notified" class="<?php echo $_appointment_scheduler->Notified->headerCellClass() ?>"><div id="elh__appointment_scheduler_Notified" class="_appointment_scheduler_Notified"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notified->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notified" class="<?php echo $_appointment_scheduler->Notified->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_Notified" class="_appointment_scheduler_Notified">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notified->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Notified->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Notified->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Purpose) == "") { ?>
		<th data-name="Purpose" class="<?php echo $_appointment_scheduler->Purpose->headerCellClass() ?>"><div id="elh__appointment_scheduler_Purpose" class="_appointment_scheduler_Purpose"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Purpose->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Purpose" class="<?php echo $_appointment_scheduler->Purpose->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_Purpose" class="_appointment_scheduler_Purpose">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Purpose->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Purpose->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Purpose->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Notes) == "") { ?>
		<th data-name="Notes" class="<?php echo $_appointment_scheduler->Notes->headerCellClass() ?>"><div id="elh__appointment_scheduler_Notes" class="_appointment_scheduler_Notes"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notes->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Notes" class="<?php echo $_appointment_scheduler->Notes->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_Notes" class="_appointment_scheduler_Notes">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Notes->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Notes->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Notes->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->PatientType) == "") { ?>
		<th data-name="PatientType" class="<?php echo $_appointment_scheduler->PatientType->headerCellClass() ?>"><div id="elh__appointment_scheduler_PatientType" class="_appointment_scheduler_PatientType"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientType" class="<?php echo $_appointment_scheduler->PatientType->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_PatientType" class="_appointment_scheduler_PatientType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientType->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->PatientType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->PatientType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->Referal) == "") { ?>
		<th data-name="Referal" class="<?php echo $_appointment_scheduler->Referal->headerCellClass() ?>"><div id="elh__appointment_scheduler_Referal" class="_appointment_scheduler_Referal"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->Referal->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Referal" class="<?php echo $_appointment_scheduler->Referal->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_Referal" class="_appointment_scheduler_Referal">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->Referal->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->Referal->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->Referal->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->paymentType) == "") { ?>
		<th data-name="paymentType" class="<?php echo $_appointment_scheduler->paymentType->headerCellClass() ?>"><div id="elh__appointment_scheduler_paymentType" class="_appointment_scheduler_paymentType"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->paymentType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="paymentType" class="<?php echo $_appointment_scheduler->paymentType->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_paymentType" class="_appointment_scheduler_paymentType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->paymentType->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->paymentType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->paymentType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->WhereDidYouHear) == "") { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><div id="elh__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduler_WhereDidYouHear"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="WhereDidYouHear" class="<?php echo $_appointment_scheduler->WhereDidYouHear->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduler_WhereDidYouHear">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->WhereDidYouHear->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->WhereDidYouHear->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $_appointment_scheduler->HospID->headerCellClass() ?>"><div id="elh__appointment_scheduler_HospID" class="_appointment_scheduler_HospID"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $_appointment_scheduler->HospID->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_HospID" class="_appointment_scheduler_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->createdBy) == "") { ?>
		<th data-name="createdBy" class="<?php echo $_appointment_scheduler->createdBy->headerCellClass() ?>"><div id="elh__appointment_scheduler_createdBy" class="_appointment_scheduler_createdBy"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdBy" class="<?php echo $_appointment_scheduler->createdBy->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_createdBy" class="_appointment_scheduler_createdBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->createdBy->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->createdBy->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->createdDateTime) == "") { ?>
		<th data-name="createdDateTime" class="<?php echo $_appointment_scheduler->createdDateTime->headerCellClass() ?>"><div id="elh__appointment_scheduler_createdDateTime" class="_appointment_scheduler_createdDateTime"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdDateTime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdDateTime" class="<?php echo $_appointment_scheduler->createdDateTime->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_createdDateTime" class="_appointment_scheduler_createdDateTime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->createdDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->createdDateTime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->createdDateTime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
	<?php if ($_appointment_scheduler->sortUrl($_appointment_scheduler->PatientTypee) == "") { ?>
		<th data-name="PatientTypee" class="<?php echo $_appointment_scheduler->PatientTypee->headerCellClass() ?>"><div id="elh__appointment_scheduler_PatientTypee" class="_appointment_scheduler_PatientTypee"><div class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientTypee->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientTypee" class="<?php echo $_appointment_scheduler->PatientTypee->headerCellClass() ?>"><div><div id="elh__appointment_scheduler_PatientTypee" class="_appointment_scheduler_PatientTypee">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $_appointment_scheduler->PatientTypee->caption() ?></span><span class="ew-table-header-sort"><?php if ($_appointment_scheduler->PatientTypee->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($_appointment_scheduler->PatientTypee->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$_appointment_scheduler_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$_appointment_scheduler_grid->StartRec = 1;
$_appointment_scheduler_grid->StopRec = $_appointment_scheduler_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $_appointment_scheduler_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($_appointment_scheduler_grid->FormKeyCountName) && ($_appointment_scheduler->isGridAdd() || $_appointment_scheduler->isGridEdit() || $_appointment_scheduler->isConfirm())) {
		$_appointment_scheduler_grid->KeyCount = $CurrentForm->getValue($_appointment_scheduler_grid->FormKeyCountName);
		$_appointment_scheduler_grid->StopRec = $_appointment_scheduler_grid->StartRec + $_appointment_scheduler_grid->KeyCount - 1;
	}
}
$_appointment_scheduler_grid->RecCnt = $_appointment_scheduler_grid->StartRec - 1;
if ($_appointment_scheduler_grid->Recordset && !$_appointment_scheduler_grid->Recordset->EOF) {
	$_appointment_scheduler_grid->Recordset->moveFirst();
	$selectLimit = $_appointment_scheduler_grid->UseSelectLimit;
	if (!$selectLimit && $_appointment_scheduler_grid->StartRec > 1)
		$_appointment_scheduler_grid->Recordset->move($_appointment_scheduler_grid->StartRec - 1);
} elseif (!$_appointment_scheduler->AllowAddDeleteRow && $_appointment_scheduler_grid->StopRec == 0) {
	$_appointment_scheduler_grid->StopRec = $_appointment_scheduler->GridAddRowCount;
}

// Initialize aggregate
$_appointment_scheduler->RowType = ROWTYPE_AGGREGATEINIT;
$_appointment_scheduler->resetAttributes();
$_appointment_scheduler_grid->renderRow();
if ($_appointment_scheduler->isGridAdd())
	$_appointment_scheduler_grid->RowIndex = 0;
if ($_appointment_scheduler->isGridEdit())
	$_appointment_scheduler_grid->RowIndex = 0;
while ($_appointment_scheduler_grid->RecCnt < $_appointment_scheduler_grid->StopRec) {
	$_appointment_scheduler_grid->RecCnt++;
	if ($_appointment_scheduler_grid->RecCnt >= $_appointment_scheduler_grid->StartRec) {
		$_appointment_scheduler_grid->RowCnt++;
		if ($_appointment_scheduler->isGridAdd() || $_appointment_scheduler->isGridEdit() || $_appointment_scheduler->isConfirm()) {
			$_appointment_scheduler_grid->RowIndex++;
			$CurrentForm->Index = $_appointment_scheduler_grid->RowIndex;
			if ($CurrentForm->hasValue($_appointment_scheduler_grid->FormActionName) && $_appointment_scheduler_grid->EventCancelled)
				$_appointment_scheduler_grid->RowAction = strval($CurrentForm->getValue($_appointment_scheduler_grid->FormActionName));
			elseif ($_appointment_scheduler->isGridAdd())
				$_appointment_scheduler_grid->RowAction = "insert";
			else
				$_appointment_scheduler_grid->RowAction = "";
		}

		// Set up key count
		$_appointment_scheduler_grid->KeyCount = $_appointment_scheduler_grid->RowIndex;

		// Init row class and style
		$_appointment_scheduler->resetAttributes();
		$_appointment_scheduler->CssClass = "";
		if ($_appointment_scheduler->isGridAdd()) {
			if ($_appointment_scheduler->CurrentMode == "copy") {
				$_appointment_scheduler_grid->loadRowValues($_appointment_scheduler_grid->Recordset); // Load row values
				$_appointment_scheduler_grid->setRecordKey($_appointment_scheduler_grid->RowOldKey, $_appointment_scheduler_grid->Recordset); // Set old record key
			} else {
				$_appointment_scheduler_grid->loadRowValues(); // Load default values
				$_appointment_scheduler_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$_appointment_scheduler_grid->loadRowValues($_appointment_scheduler_grid->Recordset); // Load row values
		}
		$_appointment_scheduler->RowType = ROWTYPE_VIEW; // Render view
		if ($_appointment_scheduler->isGridAdd()) // Grid add
			$_appointment_scheduler->RowType = ROWTYPE_ADD; // Render add
		if ($_appointment_scheduler->isGridAdd() && $_appointment_scheduler->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$_appointment_scheduler_grid->restoreCurrentRowFormValues($_appointment_scheduler_grid->RowIndex); // Restore form values
		if ($_appointment_scheduler->isGridEdit()) { // Grid edit
			if ($_appointment_scheduler->EventCancelled)
				$_appointment_scheduler_grid->restoreCurrentRowFormValues($_appointment_scheduler_grid->RowIndex); // Restore form values
			if ($_appointment_scheduler_grid->RowAction == "insert")
				$_appointment_scheduler->RowType = ROWTYPE_ADD; // Render add
			else
				$_appointment_scheduler->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($_appointment_scheduler->isGridEdit() && ($_appointment_scheduler->RowType == ROWTYPE_EDIT || $_appointment_scheduler->RowType == ROWTYPE_ADD) && $_appointment_scheduler->EventCancelled) // Update failed
			$_appointment_scheduler_grid->restoreCurrentRowFormValues($_appointment_scheduler_grid->RowIndex); // Restore form values
		if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) // Edit row
			$_appointment_scheduler_grid->EditRowCnt++;
		if ($_appointment_scheduler->isConfirm()) // Confirm row
			$_appointment_scheduler_grid->restoreCurrentRowFormValues($_appointment_scheduler_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$_appointment_scheduler->RowAttrs = array_merge($_appointment_scheduler->RowAttrs, array('data-rowindex'=>$_appointment_scheduler_grid->RowCnt, 'id'=>'r' . $_appointment_scheduler_grid->RowCnt . '__appointment_scheduler', 'data-rowtype'=>$_appointment_scheduler->RowType));

		// Render row
		$_appointment_scheduler_grid->renderRow();

		// Render list options
		$_appointment_scheduler_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($_appointment_scheduler_grid->RowAction <> "delete" && $_appointment_scheduler_grid->RowAction <> "insertdelete" && !($_appointment_scheduler_grid->RowAction == "insert" && $_appointment_scheduler->isConfirm() && $_appointment_scheduler_grid->emptyRow())) {
?>
	<tr<?php echo $_appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_appointment_scheduler_grid->ListOptions->render("body", "left", $_appointment_scheduler_grid->RowCnt);
?>
	<?php if ($_appointment_scheduler->id->Visible) { // id ?>
		<td data-name="id"<?php echo $_appointment_scheduler->id->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_id" class="form-group _appointment_scheduler_id">
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->CurrentValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_id" class="_appointment_scheduler_id">
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->id->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
		<td data-name="start_date"<?php echo $_appointment_scheduler->start_date->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_start_date" class="form-group _appointment_scheduler_start_date">
<input type="text" data-table="_appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($_appointment_scheduler->start_date->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->start_date->EditValue ?>"<?php echo $_appointment_scheduler->start_date->editAttributes() ?>>
<?php if (!$_appointment_scheduler->start_date->ReadOnly && !$_appointment_scheduler->start_date->Disabled && !isset($_appointment_scheduler->start_date->EditAttrs["readonly"]) && !isset($_appointment_scheduler->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_appointment_schedulergrid", "x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_start_date" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($_appointment_scheduler->start_date->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_start_date" class="form-group _appointment_scheduler_start_date">
<input type="text" data-table="_appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($_appointment_scheduler->start_date->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->start_date->EditValue ?>"<?php echo $_appointment_scheduler->start_date->editAttributes() ?>>
<?php if (!$_appointment_scheduler->start_date->ReadOnly && !$_appointment_scheduler->start_date->Disabled && !isset($_appointment_scheduler->start_date->EditAttrs["readonly"]) && !isset($_appointment_scheduler->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_appointment_schedulergrid", "x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_start_date" class="_appointment_scheduler_start_date">
<span<?php echo $_appointment_scheduler->start_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->start_date->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_start_date" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($_appointment_scheduler->start_date->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_start_date" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($_appointment_scheduler->start_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_start_date" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($_appointment_scheduler->start_date->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_start_date" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($_appointment_scheduler->start_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
		<td data-name="end_date"<?php echo $_appointment_scheduler->end_date->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_end_date" class="form-group _appointment_scheduler_end_date">
<input type="text" data-table="_appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($_appointment_scheduler->end_date->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->end_date->EditValue ?>"<?php echo $_appointment_scheduler->end_date->editAttributes() ?>>
<?php if (!$_appointment_scheduler->end_date->ReadOnly && !$_appointment_scheduler->end_date->Disabled && !isset($_appointment_scheduler->end_date->EditAttrs["readonly"]) && !isset($_appointment_scheduler->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_appointment_schedulergrid", "x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_end_date" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($_appointment_scheduler->end_date->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_end_date" class="form-group _appointment_scheduler_end_date">
<input type="text" data-table="_appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($_appointment_scheduler->end_date->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->end_date->EditValue ?>"<?php echo $_appointment_scheduler->end_date->editAttributes() ?>>
<?php if (!$_appointment_scheduler->end_date->ReadOnly && !$_appointment_scheduler->end_date->Disabled && !isset($_appointment_scheduler->end_date->EditAttrs["readonly"]) && !isset($_appointment_scheduler->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_appointment_schedulergrid", "x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_end_date" class="_appointment_scheduler_end_date">
<span<?php echo $_appointment_scheduler->end_date->viewAttributes() ?>>
<?php echo $_appointment_scheduler->end_date->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_end_date" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($_appointment_scheduler->end_date->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_end_date" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($_appointment_scheduler->end_date->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_end_date" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($_appointment_scheduler->end_date->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_end_date" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($_appointment_scheduler->end_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
		<td data-name="patientID"<?php echo $_appointment_scheduler->patientID->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_patientID" class="form-group _appointment_scheduler_patientID">
<?php $_appointment_scheduler->patientID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$_appointment_scheduler->patientID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID"><?php echo strval($_appointment_scheduler->patientID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->patientID->ViewValue) : $_appointment_scheduler->patientID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->patientID->ReadOnly || $_appointment_scheduler->patientID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $_appointment_scheduler->patientID->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_patientID") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->patientID->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo $_appointment_scheduler->patientID->CurrentValue ?>"<?php echo $_appointment_scheduler->patientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($_appointment_scheduler->patientID->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_patientID" class="form-group _appointment_scheduler_patientID">
<?php $_appointment_scheduler->patientID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$_appointment_scheduler->patientID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID"><?php echo strval($_appointment_scheduler->patientID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->patientID->ViewValue) : $_appointment_scheduler->patientID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->patientID->ReadOnly || $_appointment_scheduler->patientID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $_appointment_scheduler->patientID->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_patientID") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->patientID->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo $_appointment_scheduler->patientID->CurrentValue ?>"<?php echo $_appointment_scheduler->patientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_patientID" class="_appointment_scheduler_patientID">
<span<?php echo $_appointment_scheduler->patientID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientID->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($_appointment_scheduler->patientID->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($_appointment_scheduler->patientID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($_appointment_scheduler->patientID->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($_appointment_scheduler->patientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
		<td data-name="patientName"<?php echo $_appointment_scheduler->patientName->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_patientName" class="form-group _appointment_scheduler_patientName">
<input type="text" data-table="_appointment_scheduler" data-field="x_patientName" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->patientName->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->patientName->EditValue ?>"<?php echo $_appointment_scheduler->patientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientName" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($_appointment_scheduler->patientName->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_patientName" class="form-group _appointment_scheduler_patientName">
<input type="text" data-table="_appointment_scheduler" data-field="x_patientName" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->patientName->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->patientName->EditValue ?>"<?php echo $_appointment_scheduler->patientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_patientName" class="_appointment_scheduler_patientName">
<span<?php echo $_appointment_scheduler->patientName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->patientName->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientName" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($_appointment_scheduler->patientName->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientName" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($_appointment_scheduler->patientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientName" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($_appointment_scheduler->patientName->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientName" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($_appointment_scheduler->patientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<td data-name="DoctorID"<?php echo $_appointment_scheduler->DoctorID->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($_appointment_scheduler->DoctorID->getSessionValue() <> "") { ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorID" class="form-group _appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->DoctorID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorID" class="form-group _appointment_scheduler_DoctorID">
<input type="text" data-table="_appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->DoctorID->EditValue ?>"<?php echo $_appointment_scheduler->DoctorID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($_appointment_scheduler->DoctorID->getSessionValue() <> "") { ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorID" class="form-group _appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->DoctorID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorID" class="form-group _appointment_scheduler_DoctorID">
<input type="text" data-table="_appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->DoctorID->EditValue ?>"<?php echo $_appointment_scheduler->DoctorID->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorID" class="_appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorID->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorID" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorID" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName"<?php echo $_appointment_scheduler->DoctorName->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorName" class="form-group _appointment_scheduler_DoctorName">
<?php $_appointment_scheduler->DoctorName->EditAttrs["onchange"] = "ew.autoFill(this);" . @$_appointment_scheduler->DoctorName->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName"><?php echo strval($_appointment_scheduler->DoctorName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->DoctorName->ViewValue) : $_appointment_scheduler->DoctorName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->DoctorName->ReadOnly || $_appointment_scheduler->DoctorName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $_appointment_scheduler->DoctorName->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_DoctorName") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo $_appointment_scheduler->DoctorName->CurrentValue ?>"<?php echo $_appointment_scheduler->DoctorName->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorName->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorName" class="form-group _appointment_scheduler_DoctorName">
<?php $_appointment_scheduler->DoctorName->EditAttrs["onchange"] = "ew.autoFill(this);" . @$_appointment_scheduler->DoctorName->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName"><?php echo strval($_appointment_scheduler->DoctorName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->DoctorName->ViewValue) : $_appointment_scheduler->DoctorName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->DoctorName->ReadOnly || $_appointment_scheduler->DoctorName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $_appointment_scheduler->DoctorName->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_DoctorName") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo $_appointment_scheduler->DoctorName->CurrentValue ?>"<?php echo $_appointment_scheduler->DoctorName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorName" class="_appointment_scheduler_DoctorName">
<span<?php echo $_appointment_scheduler->DoctorName->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorName->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorName->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorName->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td data-name="AppointmentStatus"<?php echo $_appointment_scheduler->AppointmentStatus->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_AppointmentStatus" class="form-group _appointment_scheduler_AppointmentStatus">
<input type="text" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->AppointmentStatus->EditValue ?>"<?php echo $_appointment_scheduler->AppointmentStatus->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_AppointmentStatus" class="form-group _appointment_scheduler_AppointmentStatus">
<input type="text" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->AppointmentStatus->EditValue ?>"<?php echo $_appointment_scheduler->AppointmentStatus->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_AppointmentStatus" class="_appointment_scheduler_AppointmentStatus">
<span<?php echo $_appointment_scheduler->AppointmentStatus->viewAttributes() ?>>
<?php echo $_appointment_scheduler->AppointmentStatus->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->status->Visible) { // status ?>
		<td data-name="status"<?php echo $_appointment_scheduler->status->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_status" class="form-group _appointment_scheduler_status">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $_appointment_scheduler->status->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" value="{value}"<?php echo $_appointment_scheduler->status->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->status->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_status[]") ?>
</div></div>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_status" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" value="<?php echo HtmlEncode($_appointment_scheduler->status->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_status" class="form-group _appointment_scheduler_status">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $_appointment_scheduler->status->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" value="{value}"<?php echo $_appointment_scheduler->status->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->status->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_status[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_status" class="_appointment_scheduler_status">
<span<?php echo $_appointment_scheduler->status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->status->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_status" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($_appointment_scheduler->status->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_status" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" value="<?php echo HtmlEncode($_appointment_scheduler->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_status" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($_appointment_scheduler->status->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_status" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" value="<?php echo HtmlEncode($_appointment_scheduler->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<td data-name="DoctorCode"<?php echo $_appointment_scheduler->DoctorCode->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorCode" class="form-group _appointment_scheduler_DoctorCode">
<input type="text" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->DoctorCode->EditValue ?>"<?php echo $_appointment_scheduler->DoctorCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorCode" class="form-group _appointment_scheduler_DoctorCode">
<input type="text" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->DoctorCode->EditValue ?>"<?php echo $_appointment_scheduler->DoctorCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_DoctorCode" class="_appointment_scheduler_DoctorCode">
<span<?php echo $_appointment_scheduler->DoctorCode->viewAttributes() ?>>
<?php echo $_appointment_scheduler->DoctorCode->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
		<td data-name="Department"<?php echo $_appointment_scheduler->Department->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Department" class="form-group _appointment_scheduler_Department">
<input type="text" data-table="_appointment_scheduler" data-field="x_Department" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Department->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Department->EditValue ?>"<?php echo $_appointment_scheduler->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Department" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($_appointment_scheduler->Department->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Department" class="form-group _appointment_scheduler_Department">
<input type="text" data-table="_appointment_scheduler" data-field="x_Department" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Department->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Department->EditValue ?>"<?php echo $_appointment_scheduler->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Department" class="_appointment_scheduler_Department">
<span<?php echo $_appointment_scheduler->Department->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Department->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Department" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($_appointment_scheduler->Department->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Department" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($_appointment_scheduler->Department->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Department" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($_appointment_scheduler->Department->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Department" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($_appointment_scheduler->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id"<?php echo $_appointment_scheduler->scheduler_id->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_scheduler_id" class="form-group _appointment_scheduler_scheduler_id">
<input type="text" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->scheduler_id->EditValue ?>"<?php echo $_appointment_scheduler->scheduler_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_scheduler_id" class="form-group _appointment_scheduler_scheduler_id">
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->scheduler_id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->CurrentValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_scheduler_id" class="_appointment_scheduler_scheduler_id">
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<?php echo $_appointment_scheduler->scheduler_id->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->text->Visible) { // text ?>
		<td data-name="text"<?php echo $_appointment_scheduler->text->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_text" class="form-group _appointment_scheduler_text">
<input type="text" data-table="_appointment_scheduler" data-field="x_text" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->text->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->text->EditValue ?>"<?php echo $_appointment_scheduler->text->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_text" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($_appointment_scheduler->text->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_text" class="form-group _appointment_scheduler_text">
<input type="text" data-table="_appointment_scheduler" data-field="x_text" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->text->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->text->EditValue ?>"<?php echo $_appointment_scheduler->text->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_text" class="_appointment_scheduler_text">
<span<?php echo $_appointment_scheduler->text->viewAttributes() ?>>
<?php echo $_appointment_scheduler->text->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_text" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($_appointment_scheduler->text->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_text" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($_appointment_scheduler->text->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_text" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($_appointment_scheduler->text->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_text" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($_appointment_scheduler->text->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<td data-name="appointment_status"<?php echo $_appointment_scheduler->appointment_status->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_appointment_status" class="form-group _appointment_scheduler_appointment_status">
<input type="text" data-table="_appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->appointment_status->EditValue ?>"<?php echo $_appointment_scheduler->appointment_status->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_status" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_appointment_status" class="form-group _appointment_scheduler_appointment_status">
<input type="text" data-table="_appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->appointment_status->EditValue ?>"<?php echo $_appointment_scheduler->appointment_status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_appointment_status" class="_appointment_scheduler_appointment_status">
<span<?php echo $_appointment_scheduler->appointment_status->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_status->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_status" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_status" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_status" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
		<td data-name="PId"<?php echo $_appointment_scheduler->PId->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PId" class="form-group _appointment_scheduler_PId">
<input type="text" data-table="_appointment_scheduler" data-field="x_PId" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($_appointment_scheduler->PId->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->PId->EditValue ?>"<?php echo $_appointment_scheduler->PId->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PId" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($_appointment_scheduler->PId->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PId" class="form-group _appointment_scheduler_PId">
<input type="text" data-table="_appointment_scheduler" data-field="x_PId" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($_appointment_scheduler->PId->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->PId->EditValue ?>"<?php echo $_appointment_scheduler->PId->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PId" class="_appointment_scheduler_PId">
<span<?php echo $_appointment_scheduler->PId->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PId->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PId" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($_appointment_scheduler->PId->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PId" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($_appointment_scheduler->PId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PId" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($_appointment_scheduler->PId->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PId" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($_appointment_scheduler->PId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $_appointment_scheduler->MobileNumber->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_MobileNumber" class="form-group _appointment_scheduler_MobileNumber">
<input type="text" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->MobileNumber->EditValue ?>"<?php echo $_appointment_scheduler->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_MobileNumber" class="form-group _appointment_scheduler_MobileNumber">
<input type="text" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->MobileNumber->EditValue ?>"<?php echo $_appointment_scheduler->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_MobileNumber" class="_appointment_scheduler_MobileNumber">
<span<?php echo $_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<?php echo $_appointment_scheduler->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<td data-name="SchEmail"<?php echo $_appointment_scheduler->SchEmail->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_SchEmail" class="form-group _appointment_scheduler_SchEmail">
<input type="text" data-table="_appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->SchEmail->EditValue ?>"<?php echo $_appointment_scheduler->SchEmail->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_SchEmail" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_SchEmail" class="form-group _appointment_scheduler_SchEmail">
<input type="text" data-table="_appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->SchEmail->EditValue ?>"<?php echo $_appointment_scheduler->SchEmail->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_SchEmail" class="_appointment_scheduler_SchEmail">
<span<?php echo $_appointment_scheduler->SchEmail->viewAttributes() ?>>
<?php echo $_appointment_scheduler->SchEmail->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_SchEmail" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_SchEmail" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_SchEmail" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<td data-name="appointment_type"<?php echo $_appointment_scheduler->appointment_type->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_appointment_type" class="form-group _appointment_scheduler_appointment_type">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" class="ew-template"><input type="radio" class="form-check-input" data-table="_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $_appointment_scheduler->appointment_type->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="{value}"<?php echo $_appointment_scheduler->appointment_type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->appointment_type->radioButtonListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_appointment_type") ?>
</div></div>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_type" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_type->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_appointment_type" class="form-group _appointment_scheduler_appointment_type">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" class="ew-template"><input type="radio" class="form-check-input" data-table="_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $_appointment_scheduler->appointment_type->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="{value}"<?php echo $_appointment_scheduler->appointment_type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->appointment_type->radioButtonListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_appointment_type") ?>
</div></div>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_appointment_type" class="_appointment_scheduler_appointment_type">
<span<?php echo $_appointment_scheduler->appointment_type->viewAttributes() ?>>
<?php echo $_appointment_scheduler->appointment_type->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_type" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_type->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_type" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_type->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_type" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_type->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_type" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
		<td data-name="Notified"<?php echo $_appointment_scheduler->Notified->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Notified" class="form-group _appointment_scheduler_Notified">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $_appointment_scheduler->Notified->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" value="{value}"<?php echo $_appointment_scheduler->Notified->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->Notified->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_Notified[]") ?>
</div></div>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notified" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($_appointment_scheduler->Notified->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Notified" class="form-group _appointment_scheduler_Notified">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $_appointment_scheduler->Notified->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" value="{value}"<?php echo $_appointment_scheduler->Notified->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->Notified->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_Notified[]") ?>
</div></div>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Notified" class="_appointment_scheduler_Notified">
<span<?php echo $_appointment_scheduler->Notified->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notified->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notified" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" value="<?php echo HtmlEncode($_appointment_scheduler->Notified->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notified" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($_appointment_scheduler->Notified->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notified" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" value="<?php echo HtmlEncode($_appointment_scheduler->Notified->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notified" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($_appointment_scheduler->Notified->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose"<?php echo $_appointment_scheduler->Purpose->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Purpose" class="form-group _appointment_scheduler_Purpose">
<input type="text" data-table="_appointment_scheduler" data-field="x_Purpose" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Purpose->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Purpose->EditValue ?>"<?php echo $_appointment_scheduler->Purpose->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Purpose" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($_appointment_scheduler->Purpose->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Purpose" class="form-group _appointment_scheduler_Purpose">
<input type="text" data-table="_appointment_scheduler" data-field="x_Purpose" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Purpose->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Purpose->EditValue ?>"<?php echo $_appointment_scheduler->Purpose->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Purpose" class="_appointment_scheduler_Purpose">
<span<?php echo $_appointment_scheduler->Purpose->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Purpose->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Purpose" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($_appointment_scheduler->Purpose->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Purpose" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($_appointment_scheduler->Purpose->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Purpose" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($_appointment_scheduler->Purpose->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Purpose" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($_appointment_scheduler->Purpose->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
		<td data-name="Notes"<?php echo $_appointment_scheduler->Notes->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Notes" class="form-group _appointment_scheduler_Notes">
<input type="text" data-table="_appointment_scheduler" data-field="x_Notes" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Notes->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Notes->EditValue ?>"<?php echo $_appointment_scheduler->Notes->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notes" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($_appointment_scheduler->Notes->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Notes" class="form-group _appointment_scheduler_Notes">
<input type="text" data-table="_appointment_scheduler" data-field="x_Notes" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Notes->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Notes->EditValue ?>"<?php echo $_appointment_scheduler->Notes->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Notes" class="_appointment_scheduler_Notes">
<span<?php echo $_appointment_scheduler->Notes->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Notes->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notes" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($_appointment_scheduler->Notes->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notes" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($_appointment_scheduler->Notes->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notes" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($_appointment_scheduler->Notes->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notes" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($_appointment_scheduler->Notes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<td data-name="PatientType"<?php echo $_appointment_scheduler->PatientType->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PatientType" class="form-group _appointment_scheduler_PatientType">
<?php $_appointment_scheduler->PatientType->EditAttrs["onclick"] = "ew.updateOptions.call(this); " . @$_appointment_scheduler->PatientType->EditAttrs["onclick"]; ?>
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" class="ew-template"><input type="radio" class="form-check-input" data-table="_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $_appointment_scheduler->PatientType->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="{value}"<?php echo $_appointment_scheduler->PatientType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->PatientType->radioButtonListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_PatientType") ?>
</div></div>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientType" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($_appointment_scheduler->PatientType->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PatientType" class="form-group _appointment_scheduler_PatientType">
<?php $_appointment_scheduler->PatientType->EditAttrs["onclick"] = "ew.updateOptions.call(this); " . @$_appointment_scheduler->PatientType->EditAttrs["onclick"]; ?>
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" class="ew-template"><input type="radio" class="form-check-input" data-table="_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $_appointment_scheduler->PatientType->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="{value}"<?php echo $_appointment_scheduler->PatientType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->PatientType->radioButtonListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_PatientType") ?>
</div></div>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PatientType" class="_appointment_scheduler_PatientType">
<span<?php echo $_appointment_scheduler->PatientType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientType->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientType" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($_appointment_scheduler->PatientType->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientType" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($_appointment_scheduler->PatientType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientType" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($_appointment_scheduler->PatientType->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientType" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($_appointment_scheduler->PatientType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
		<td data-name="Referal"<?php echo $_appointment_scheduler->Referal->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Referal" class="form-group _appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal"><?php echo strval($_appointment_scheduler->Referal->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->Referal->ViewValue) : $_appointment_scheduler->Referal->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->Referal->ReadOnly || $_appointment_scheduler->Referal->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$_appointment_scheduler->Referal->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $_appointment_scheduler->Referal->caption() ?>" data-title="<?php echo $_appointment_scheduler->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $_appointment_scheduler->Referal->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_Referal") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo $_appointment_scheduler->Referal->CurrentValue ?>"<?php echo $_appointment_scheduler->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($_appointment_scheduler->Referal->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Referal" class="form-group _appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal"><?php echo strval($_appointment_scheduler->Referal->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->Referal->ViewValue) : $_appointment_scheduler->Referal->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->Referal->ReadOnly || $_appointment_scheduler->Referal->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$_appointment_scheduler->Referal->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $_appointment_scheduler->Referal->caption() ?>" data-title="<?php echo $_appointment_scheduler->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $_appointment_scheduler->Referal->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_Referal") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo $_appointment_scheduler->Referal->CurrentValue ?>"<?php echo $_appointment_scheduler->Referal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_Referal" class="_appointment_scheduler_Referal">
<span<?php echo $_appointment_scheduler->Referal->viewAttributes() ?>>
<?php echo $_appointment_scheduler->Referal->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($_appointment_scheduler->Referal->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($_appointment_scheduler->Referal->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($_appointment_scheduler->Referal->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($_appointment_scheduler->Referal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType"<?php echo $_appointment_scheduler->paymentType->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_paymentType" class="form-group _appointment_scheduler_paymentType">
<input type="text" data-table="_appointment_scheduler" data-field="x_paymentType" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->paymentType->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->paymentType->EditValue ?>"<?php echo $_appointment_scheduler->paymentType->editAttributes() ?>>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_paymentType" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($_appointment_scheduler->paymentType->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_paymentType" class="form-group _appointment_scheduler_paymentType">
<input type="text" data-table="_appointment_scheduler" data-field="x_paymentType" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->paymentType->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->paymentType->EditValue ?>"<?php echo $_appointment_scheduler->paymentType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_paymentType" class="_appointment_scheduler_paymentType">
<span<?php echo $_appointment_scheduler->paymentType->viewAttributes() ?>>
<?php echo $_appointment_scheduler->paymentType->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_paymentType" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($_appointment_scheduler->paymentType->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_paymentType" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($_appointment_scheduler->paymentType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_paymentType" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($_appointment_scheduler->paymentType->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_paymentType" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($_appointment_scheduler->paymentType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear"<?php echo $_appointment_scheduler->WhereDidYouHear->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_WhereDidYouHear" class="form-group _appointment_scheduler_WhereDidYouHear">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $_appointment_scheduler->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="{value}"<?php echo $_appointment_scheduler->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->WhereDidYouHear->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_WhereDidYouHear[]") ?>
</div></div>
<?php echo $_appointment_scheduler->WhereDidYouHear->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($_appointment_scheduler->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_WhereDidYouHear" class="form-group _appointment_scheduler_WhereDidYouHear">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $_appointment_scheduler->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="{value}"<?php echo $_appointment_scheduler->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->WhereDidYouHear->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_WhereDidYouHear[]") ?>
</div></div>
<?php echo $_appointment_scheduler->WhereDidYouHear->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_WhereDidYouHear" class="_appointment_scheduler_WhereDidYouHear">
<span<?php echo $_appointment_scheduler->WhereDidYouHear->viewAttributes() ?>>
<?php echo $_appointment_scheduler->WhereDidYouHear->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($_appointment_scheduler->WhereDidYouHear->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($_appointment_scheduler->WhereDidYouHear->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($_appointment_scheduler->WhereDidYouHear->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($_appointment_scheduler->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $_appointment_scheduler->HospID->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_HospID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($_appointment_scheduler->HospID->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_HospID" class="_appointment_scheduler_HospID">
<span<?php echo $_appointment_scheduler->HospID->viewAttributes() ?>>
<?php echo $_appointment_scheduler->HospID->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_HospID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($_appointment_scheduler->HospID->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_HospID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($_appointment_scheduler->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_HospID" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($_appointment_scheduler->HospID->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_HospID" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($_appointment_scheduler->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
		<td data-name="createdBy"<?php echo $_appointment_scheduler->createdBy->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdBy" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($_appointment_scheduler->createdBy->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_createdBy" class="_appointment_scheduler_createdBy">
<span<?php echo $_appointment_scheduler->createdBy->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdBy->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdBy" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($_appointment_scheduler->createdBy->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdBy" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($_appointment_scheduler->createdBy->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdBy" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($_appointment_scheduler->createdBy->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdBy" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($_appointment_scheduler->createdBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime"<?php echo $_appointment_scheduler->createdDateTime->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdDateTime" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($_appointment_scheduler->createdDateTime->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_createdDateTime" class="_appointment_scheduler_createdDateTime">
<span<?php echo $_appointment_scheduler->createdDateTime->viewAttributes() ?>>
<?php echo $_appointment_scheduler->createdDateTime->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdDateTime" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($_appointment_scheduler->createdDateTime->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdDateTime" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($_appointment_scheduler->createdDateTime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdDateTime" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($_appointment_scheduler->createdDateTime->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdDateTime" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($_appointment_scheduler->createdDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee"<?php echo $_appointment_scheduler->PatientTypee->cellAttributes() ?>>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PatientTypee" class="form-group _appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $_appointment_scheduler->PatientTypee->displayValueSeparatorAttribute() ?>" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee"<?php echo $_appointment_scheduler->PatientTypee->editAttributes() ?>>
		<?php echo $_appointment_scheduler->PatientTypee->selectOptionListHtml("x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee") ?>
	</select>
</div>
<?php echo $_appointment_scheduler->PatientTypee->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_PatientTypee") ?>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientTypee" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($_appointment_scheduler->PatientTypee->OldValue) ?>">
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PatientTypee" class="form-group _appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $_appointment_scheduler->PatientTypee->displayValueSeparatorAttribute() ?>" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee"<?php echo $_appointment_scheduler->PatientTypee->editAttributes() ?>>
		<?php echo $_appointment_scheduler->PatientTypee->selectOptionListHtml("x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee") ?>
	</select>
</div>
<?php echo $_appointment_scheduler->PatientTypee->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_PatientTypee") ?>
</span>
<?php } ?>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $_appointment_scheduler_grid->RowCnt ?>__appointment_scheduler_PatientTypee" class="_appointment_scheduler_PatientTypee">
<span<?php echo $_appointment_scheduler->PatientTypee->viewAttributes() ?>>
<?php echo $_appointment_scheduler->PatientTypee->getViewValue() ?></span>
</span>
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientTypee" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($_appointment_scheduler->PatientTypee->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientTypee" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($_appointment_scheduler->PatientTypee->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientTypee" name="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="f_appointment_schedulergrid$x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($_appointment_scheduler->PatientTypee->FormValue) ?>">
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientTypee" name="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="f_appointment_schedulergrid$o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($_appointment_scheduler->PatientTypee->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_appointment_scheduler_grid->ListOptions->render("body", "right", $_appointment_scheduler_grid->RowCnt);
?>
	</tr>
<?php if ($_appointment_scheduler->RowType == ROWTYPE_ADD || $_appointment_scheduler->RowType == ROWTYPE_EDIT) { ?>
<script>
f_appointment_schedulergrid.updateLists(<?php echo $_appointment_scheduler_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$_appointment_scheduler->isGridAdd() || $_appointment_scheduler->CurrentMode == "copy")
		if (!$_appointment_scheduler_grid->Recordset->EOF)
			$_appointment_scheduler_grid->Recordset->moveNext();
}
?>
<?php
	if ($_appointment_scheduler->CurrentMode == "add" || $_appointment_scheduler->CurrentMode == "copy" || $_appointment_scheduler->CurrentMode == "edit") {
		$_appointment_scheduler_grid->RowIndex = '$rowindex$';
		$_appointment_scheduler_grid->loadRowValues();

		// Set row properties
		$_appointment_scheduler->resetAttributes();
		$_appointment_scheduler->RowAttrs = array_merge($_appointment_scheduler->RowAttrs, array('data-rowindex'=>$_appointment_scheduler_grid->RowIndex, 'id'=>'r0__appointment_scheduler', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($_appointment_scheduler->RowAttrs["class"], "ew-template");
		$_appointment_scheduler->RowType = ROWTYPE_ADD;

		// Render row
		$_appointment_scheduler_grid->renderRow();

		// Render list options
		$_appointment_scheduler_grid->renderListOptions();
		$_appointment_scheduler_grid->StartRowCnt = 0;
?>
	<tr<?php echo $_appointment_scheduler->rowAttributes() ?>>
<?php

// Render list options (body, left)
$_appointment_scheduler_grid->ListOptions->render("body", "left", $_appointment_scheduler_grid->RowIndex);
?>
	<?php if ($_appointment_scheduler->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_id" class="form-group _appointment_scheduler_id">
<span<?php echo $_appointment_scheduler->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_id" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($_appointment_scheduler->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->start_date->Visible) { // start_date ?>
		<td data-name="start_date">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_start_date" class="form-group _appointment_scheduler_start_date">
<input type="text" data-table="_appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" placeholder="<?php echo HtmlEncode($_appointment_scheduler->start_date->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->start_date->EditValue ?>"<?php echo $_appointment_scheduler->start_date->editAttributes() ?>>
<?php if (!$_appointment_scheduler->start_date->ReadOnly && !$_appointment_scheduler->start_date->Disabled && !isset($_appointment_scheduler->start_date->EditAttrs["readonly"]) && !isset($_appointment_scheduler->start_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_appointment_schedulergrid", "x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_start_date" class="form-group _appointment_scheduler_start_date">
<span<?php echo $_appointment_scheduler->start_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->start_date->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_start_date" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($_appointment_scheduler->start_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_start_date" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_start_date" value="<?php echo HtmlEncode($_appointment_scheduler->start_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->end_date->Visible) { // end_date ?>
		<td data-name="end_date">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_end_date" class="form-group _appointment_scheduler_end_date">
<input type="text" data-table="_appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" placeholder="<?php echo HtmlEncode($_appointment_scheduler->end_date->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->end_date->EditValue ?>"<?php echo $_appointment_scheduler->end_date->editAttributes() ?>>
<?php if (!$_appointment_scheduler->end_date->ReadOnly && !$_appointment_scheduler->end_date->Disabled && !isset($_appointment_scheduler->end_date->EditAttrs["readonly"]) && !isset($_appointment_scheduler->end_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("f_appointment_schedulergrid", "x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_end_date" class="form-group _appointment_scheduler_end_date">
<span<?php echo $_appointment_scheduler->end_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->end_date->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_end_date" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($_appointment_scheduler->end_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_end_date" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_end_date" value="<?php echo HtmlEncode($_appointment_scheduler->end_date->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->patientID->Visible) { // patientID ?>
		<td data-name="patientID">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_patientID" class="form-group _appointment_scheduler_patientID">
<?php $_appointment_scheduler->patientID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$_appointment_scheduler->patientID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID"><?php echo strval($_appointment_scheduler->patientID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->patientID->ViewValue) : $_appointment_scheduler->patientID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->patientID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->patientID->ReadOnly || $_appointment_scheduler->patientID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $_appointment_scheduler->patientID->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_patientID") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->patientID->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo $_appointment_scheduler->patientID->CurrentValue ?>"<?php echo $_appointment_scheduler->patientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_patientID" class="form-group _appointment_scheduler_patientID">
<span<?php echo $_appointment_scheduler->patientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->patientID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($_appointment_scheduler->patientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientID" value="<?php echo HtmlEncode($_appointment_scheduler->patientID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->patientName->Visible) { // patientName ?>
		<td data-name="patientName">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_patientName" class="form-group _appointment_scheduler_patientName">
<input type="text" data-table="_appointment_scheduler" data-field="x_patientName" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->patientName->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->patientName->EditValue ?>"<?php echo $_appointment_scheduler->patientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_patientName" class="form-group _appointment_scheduler_patientName">
<span<?php echo $_appointment_scheduler->patientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->patientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientName" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($_appointment_scheduler->patientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_patientName" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_patientName" value="<?php echo HtmlEncode($_appointment_scheduler->patientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorID->Visible) { // DoctorID ?>
		<td data-name="DoctorID">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<?php if ($_appointment_scheduler->DoctorID->getSessionValue() <> "") { ?>
<span id="el$rowindex$__appointment_scheduler_DoctorID" class="form-group _appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->DoctorID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_DoctorID" class="form-group _appointment_scheduler_DoctorID">
<input type="text" data-table="_appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->DoctorID->EditValue ?>"<?php echo $_appointment_scheduler->DoctorID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_DoctorID" class="form-group _appointment_scheduler_DoctorID">
<span<?php echo $_appointment_scheduler->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->DoctorID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorID" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorName->Visible) { // DoctorName ?>
		<td data-name="DoctorName">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_DoctorName" class="form-group _appointment_scheduler_DoctorName">
<?php $_appointment_scheduler->DoctorName->EditAttrs["onchange"] = "ew.autoFill(this);" . @$_appointment_scheduler->DoctorName->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName"><?php echo strval($_appointment_scheduler->DoctorName->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->DoctorName->ViewValue) : $_appointment_scheduler->DoctorName->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->DoctorName->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->DoctorName->ReadOnly || $_appointment_scheduler->DoctorName->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $_appointment_scheduler->DoctorName->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_DoctorName") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo $_appointment_scheduler->DoctorName->CurrentValue ?>"<?php echo $_appointment_scheduler->DoctorName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_DoctorName" class="form-group _appointment_scheduler_DoctorName">
<span<?php echo $_appointment_scheduler->DoctorName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->DoctorName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorName" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorName" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->AppointmentStatus->Visible) { // AppointmentStatus ?>
		<td data-name="AppointmentStatus">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_AppointmentStatus" class="form-group _appointment_scheduler_AppointmentStatus">
<input type="text" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->AppointmentStatus->EditValue ?>"<?php echo $_appointment_scheduler->AppointmentStatus->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_AppointmentStatus" class="form-group _appointment_scheduler_AppointmentStatus">
<span<?php echo $_appointment_scheduler->AppointmentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->AppointmentStatus->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_AppointmentStatus" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_AppointmentStatus" value="<?php echo HtmlEncode($_appointment_scheduler->AppointmentStatus->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_status" class="form-group _appointment_scheduler_status">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_status" data-value-separator="<?php echo $_appointment_scheduler->status->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" value="{value}"<?php echo $_appointment_scheduler->status->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->status->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_status[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_status" class="form-group _appointment_scheduler_status">
<span<?php echo $_appointment_scheduler->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_status" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($_appointment_scheduler->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_status" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_status[]" value="<?php echo HtmlEncode($_appointment_scheduler->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->DoctorCode->Visible) { // DoctorCode ?>
		<td data-name="DoctorCode">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_DoctorCode" class="form-group _appointment_scheduler_DoctorCode">
<input type="text" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->DoctorCode->EditValue ?>"<?php echo $_appointment_scheduler->DoctorCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_DoctorCode" class="form-group _appointment_scheduler_DoctorCode">
<span<?php echo $_appointment_scheduler->DoctorCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->DoctorCode->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_DoctorCode" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_DoctorCode" value="<?php echo HtmlEncode($_appointment_scheduler->DoctorCode->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Department->Visible) { // Department ?>
		<td data-name="Department">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_Department" class="form-group _appointment_scheduler_Department">
<input type="text" data-table="_appointment_scheduler" data-field="x_Department" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Department->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Department->EditValue ?>"<?php echo $_appointment_scheduler->Department->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_Department" class="form-group _appointment_scheduler_Department">
<span<?php echo $_appointment_scheduler->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->Department->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Department" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($_appointment_scheduler->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Department" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Department" value="<?php echo HtmlEncode($_appointment_scheduler->Department->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->scheduler_id->Visible) { // scheduler_id ?>
		<td data-name="scheduler_id">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_scheduler_id" class="form-group _appointment_scheduler_scheduler_id">
<input type="text" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->scheduler_id->EditValue ?>"<?php echo $_appointment_scheduler->scheduler_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_scheduler_id" class="form-group _appointment_scheduler_scheduler_id">
<span<?php echo $_appointment_scheduler->scheduler_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->scheduler_id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_scheduler_id" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_scheduler_id" value="<?php echo HtmlEncode($_appointment_scheduler->scheduler_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->text->Visible) { // text ?>
		<td data-name="text">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_text" class="form-group _appointment_scheduler_text">
<input type="text" data-table="_appointment_scheduler" data-field="x_text" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->text->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->text->EditValue ?>"<?php echo $_appointment_scheduler->text->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_text" class="form-group _appointment_scheduler_text">
<span<?php echo $_appointment_scheduler->text->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->text->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_text" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($_appointment_scheduler->text->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_text" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_text" value="<?php echo HtmlEncode($_appointment_scheduler->text->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->appointment_status->Visible) { // appointment_status ?>
		<td data-name="appointment_status">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_appointment_status" class="form-group _appointment_scheduler_appointment_status">
<input type="text" data-table="_appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->appointment_status->EditValue ?>"<?php echo $_appointment_scheduler->appointment_status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_appointment_status" class="form-group _appointment_scheduler_appointment_status">
<span<?php echo $_appointment_scheduler->appointment_status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->appointment_status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_status" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_status" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_status" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PId->Visible) { // PId ?>
		<td data-name="PId">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_PId" class="form-group _appointment_scheduler_PId">
<input type="text" data-table="_appointment_scheduler" data-field="x_PId" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" size="30" placeholder="<?php echo HtmlEncode($_appointment_scheduler->PId->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->PId->EditValue ?>"<?php echo $_appointment_scheduler->PId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_PId" class="form-group _appointment_scheduler_PId">
<span<?php echo $_appointment_scheduler->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->PId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PId" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($_appointment_scheduler->PId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PId" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PId" value="<?php echo HtmlEncode($_appointment_scheduler->PId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_MobileNumber" class="form-group _appointment_scheduler_MobileNumber">
<input type="text" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->MobileNumber->EditValue ?>"<?php echo $_appointment_scheduler->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_MobileNumber" class="form-group _appointment_scheduler_MobileNumber">
<span<?php echo $_appointment_scheduler->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->MobileNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_MobileNumber" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($_appointment_scheduler->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->SchEmail->Visible) { // SchEmail ?>
		<td data-name="SchEmail">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_SchEmail" class="form-group _appointment_scheduler_SchEmail">
<input type="text" data-table="_appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->SchEmail->EditValue ?>"<?php echo $_appointment_scheduler->SchEmail->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_SchEmail" class="form-group _appointment_scheduler_SchEmail">
<span<?php echo $_appointment_scheduler->SchEmail->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->SchEmail->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_SchEmail" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_SchEmail" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_SchEmail" value="<?php echo HtmlEncode($_appointment_scheduler->SchEmail->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->appointment_type->Visible) { // appointment_type ?>
		<td data-name="appointment_type">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_appointment_type" class="form-group _appointment_scheduler_appointment_type">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" class="ew-template"><input type="radio" class="form-check-input" data-table="_appointment_scheduler" data-field="x_appointment_type" data-value-separator="<?php echo $_appointment_scheduler->appointment_type->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="{value}"<?php echo $_appointment_scheduler->appointment_type->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->appointment_type->radioButtonListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_appointment_type") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_appointment_type" class="form-group _appointment_scheduler_appointment_type">
<span<?php echo $_appointment_scheduler->appointment_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->appointment_type->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_type" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_appointment_type" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_appointment_type" value="<?php echo HtmlEncode($_appointment_scheduler->appointment_type->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Notified->Visible) { // Notified ?>
		<td data-name="Notified">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_Notified" class="form-group _appointment_scheduler_Notified">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_Notified" data-value-separator="<?php echo $_appointment_scheduler->Notified->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" value="{value}"<?php echo $_appointment_scheduler->Notified->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->Notified->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_Notified[]") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_Notified" class="form-group _appointment_scheduler_Notified">
<span<?php echo $_appointment_scheduler->Notified->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->Notified->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notified" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified" value="<?php echo HtmlEncode($_appointment_scheduler->Notified->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notified" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notified[]" value="<?php echo HtmlEncode($_appointment_scheduler->Notified->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Purpose->Visible) { // Purpose ?>
		<td data-name="Purpose">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_Purpose" class="form-group _appointment_scheduler_Purpose">
<input type="text" data-table="_appointment_scheduler" data-field="x_Purpose" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Purpose->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Purpose->EditValue ?>"<?php echo $_appointment_scheduler->Purpose->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_Purpose" class="form-group _appointment_scheduler_Purpose">
<span<?php echo $_appointment_scheduler->Purpose->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->Purpose->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Purpose" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($_appointment_scheduler->Purpose->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Purpose" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Purpose" value="<?php echo HtmlEncode($_appointment_scheduler->Purpose->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Notes->Visible) { // Notes ?>
		<td data-name="Notes">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_Notes" class="form-group _appointment_scheduler_Notes">
<input type="text" data-table="_appointment_scheduler" data-field="x_Notes" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->Notes->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->Notes->EditValue ?>"<?php echo $_appointment_scheduler->Notes->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_Notes" class="form-group _appointment_scheduler_Notes">
<span<?php echo $_appointment_scheduler->Notes->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->Notes->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notes" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($_appointment_scheduler->Notes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Notes" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Notes" value="<?php echo HtmlEncode($_appointment_scheduler->Notes->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PatientType->Visible) { // PatientType ?>
		<td data-name="PatientType">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_PatientType" class="form-group _appointment_scheduler_PatientType">
<?php $_appointment_scheduler->PatientType->EditAttrs["onclick"] = "ew.updateOptions.call(this); " . @$_appointment_scheduler->PatientType->EditAttrs["onclick"]; ?>
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" class="ew-template"><input type="radio" class="form-check-input" data-table="_appointment_scheduler" data-field="x_PatientType" data-value-separator="<?php echo $_appointment_scheduler->PatientType->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="{value}"<?php echo $_appointment_scheduler->PatientType->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->PatientType->radioButtonListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_PatientType") ?>
</div></div>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_PatientType" class="form-group _appointment_scheduler_PatientType">
<span<?php echo $_appointment_scheduler->PatientType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->PatientType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientType" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($_appointment_scheduler->PatientType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientType" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientType" value="<?php echo HtmlEncode($_appointment_scheduler->PatientType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->Referal->Visible) { // Referal ?>
		<td data-name="Referal">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_Referal" class="form-group _appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal"><?php echo strval($_appointment_scheduler->Referal->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($_appointment_scheduler->Referal->ViewValue) : $_appointment_scheduler->Referal->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($_appointment_scheduler->Referal->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($_appointment_scheduler->Referal->ReadOnly || $_appointment_scheduler->Referal->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
<?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$_appointment_scheduler->Referal->ReadOnly) { ?>
<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $_appointment_scheduler->Referal->caption() ?>" data-title="<?php echo $_appointment_scheduler->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal',url:'mas_reference_typeaddopt.php'});"><i class="fa fa-plus ew-icon"></i></button>
<?php } ?>
	</div>
</div>
<?php echo $_appointment_scheduler->Referal->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_Referal") ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $_appointment_scheduler->Referal->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo $_appointment_scheduler->Referal->CurrentValue ?>"<?php echo $_appointment_scheduler->Referal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_Referal" class="form-group _appointment_scheduler_Referal">
<span<?php echo $_appointment_scheduler->Referal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->Referal->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($_appointment_scheduler->Referal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_Referal" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_Referal" value="<?php echo HtmlEncode($_appointment_scheduler->Referal->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->paymentType->Visible) { // paymentType ?>
		<td data-name="paymentType">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_paymentType" class="form-group _appointment_scheduler_paymentType">
<input type="text" data-table="_appointment_scheduler" data-field="x_paymentType" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($_appointment_scheduler->paymentType->getPlaceHolder()) ?>" value="<?php echo $_appointment_scheduler->paymentType->EditValue ?>"<?php echo $_appointment_scheduler->paymentType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_paymentType" class="form-group _appointment_scheduler_paymentType">
<span<?php echo $_appointment_scheduler->paymentType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->paymentType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_paymentType" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($_appointment_scheduler->paymentType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_paymentType" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_paymentType" value="<?php echo HtmlEncode($_appointment_scheduler->paymentType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
		<td data-name="WhereDidYouHear">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_WhereDidYouHear" class="form-group _appointment_scheduler_WhereDidYouHear">
<div id="tp_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" class="ew-template"><input type="checkbox" class="form-check-input" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" data-value-separator="<?php echo $_appointment_scheduler->WhereDidYouHear->displayValueSeparatorAttribute() ?>" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="{value}"<?php echo $_appointment_scheduler->WhereDidYouHear->editAttributes() ?>></div>
<div id="dsl_x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" data-repeatcolumn="5" class="ew-item-list d-none"><div>
<?php echo $_appointment_scheduler->WhereDidYouHear->checkBoxListHtml(FALSE, "x{$_appointment_scheduler_grid->RowIndex}_WhereDidYouHear[]") ?>
</div></div>
<?php echo $_appointment_scheduler->WhereDidYouHear->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_WhereDidYouHear" class="form-group _appointment_scheduler_WhereDidYouHear">
<span<?php echo $_appointment_scheduler->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->WhereDidYouHear->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear" value="<?php echo HtmlEncode($_appointment_scheduler->WhereDidYouHear->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_WhereDidYouHear" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_WhereDidYouHear[]" value="<?php echo HtmlEncode($_appointment_scheduler->WhereDidYouHear->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_HospID" class="form-group _appointment_scheduler_HospID">
<span<?php echo $_appointment_scheduler->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_HospID" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($_appointment_scheduler->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_HospID" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($_appointment_scheduler->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->createdBy->Visible) { // createdBy ?>
		<td data-name="createdBy">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_createdBy" class="form-group _appointment_scheduler_createdBy">
<span<?php echo $_appointment_scheduler->createdBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->createdBy->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdBy" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($_appointment_scheduler->createdBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdBy" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdBy" value="<?php echo HtmlEncode($_appointment_scheduler->createdBy->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->createdDateTime->Visible) { // createdDateTime ?>
		<td data-name="createdDateTime">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_createdDateTime" class="form-group _appointment_scheduler_createdDateTime">
<span<?php echo $_appointment_scheduler->createdDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->createdDateTime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdDateTime" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($_appointment_scheduler->createdDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_createdDateTime" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_createdDateTime" value="<?php echo HtmlEncode($_appointment_scheduler->createdDateTime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($_appointment_scheduler->PatientTypee->Visible) { // PatientTypee ?>
		<td data-name="PatientTypee">
<?php if (!$_appointment_scheduler->isConfirm()) { ?>
<span id="el$rowindex$__appointment_scheduler_PatientTypee" class="form-group _appointment_scheduler_PatientTypee">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="_appointment_scheduler" data-field="x_PatientTypee" data-value-separator="<?php echo $_appointment_scheduler->PatientTypee->displayValueSeparatorAttribute() ?>" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee"<?php echo $_appointment_scheduler->PatientTypee->editAttributes() ?>>
		<?php echo $_appointment_scheduler->PatientTypee->selectOptionListHtml("x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee") ?>
	</select>
</div>
<?php echo $_appointment_scheduler->PatientTypee->Lookup->getParamTag("p_x" . $_appointment_scheduler_grid->RowIndex . "_PatientTypee") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$__appointment_scheduler_PatientTypee" class="form-group _appointment_scheduler_PatientTypee">
<span<?php echo $_appointment_scheduler->PatientTypee->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($_appointment_scheduler->PatientTypee->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientTypee" name="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="x<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($_appointment_scheduler->PatientTypee->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="_appointment_scheduler" data-field="x_PatientTypee" name="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" id="o<?php echo $_appointment_scheduler_grid->RowIndex ?>_PatientTypee" value="<?php echo HtmlEncode($_appointment_scheduler->PatientTypee->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$_appointment_scheduler_grid->ListOptions->render("body", "right", $_appointment_scheduler_grid->RowIndex);
?>
<script>
f_appointment_schedulergrid.updateLists(<?php echo $_appointment_scheduler_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($_appointment_scheduler->CurrentMode == "add" || $_appointment_scheduler->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $_appointment_scheduler_grid->FormKeyCountName ?>" id="<?php echo $_appointment_scheduler_grid->FormKeyCountName ?>" value="<?php echo $_appointment_scheduler_grid->KeyCount ?>">
<?php echo $_appointment_scheduler_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($_appointment_scheduler->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $_appointment_scheduler_grid->FormKeyCountName ?>" id="<?php echo $_appointment_scheduler_grid->FormKeyCountName ?>" value="<?php echo $_appointment_scheduler_grid->KeyCount ?>">
<?php echo $_appointment_scheduler_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($_appointment_scheduler->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="f_appointment_schedulergrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($_appointment_scheduler_grid->Recordset)
	$_appointment_scheduler_grid->Recordset->Close();
?>
</div>
<?php if ($_appointment_scheduler_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $_appointment_scheduler_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($_appointment_scheduler_grid->TotalRecs == 0 && !$_appointment_scheduler->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $_appointment_scheduler_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$_appointment_scheduler_grid->terminate();
?>
<?php if (!$_appointment_scheduler->isExport()) { ?>
<script>
ew.scrollableTable("gmp__appointment_scheduler", "95%", "");
</script>
<?php } ?>
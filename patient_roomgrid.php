<?php
namespace PHPMaker2019\HIMS;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($patient_room_grid))
	$patient_room_grid = new patient_room_grid();

// Run the page
$patient_room_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$patient_room_grid->Page_Render();
?>
<?php if (!$patient_room->isExport()) { ?>
<script>

// Form object
var fpatient_roomgrid = new ew.Form("fpatient_roomgrid", "grid");
fpatient_roomgrid.formKeyCountName = '<?php echo $patient_room_grid->FormKeyCountName ?>';

// Validate form
fpatient_roomgrid.validate = function() {
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
		<?php if ($patient_room_grid->id->Required) { ?>
			elm = this.getElements("x" + infix + "_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->id->caption(), $patient_room->id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->Reception->Required) { ?>
			elm = this.getElements("x" + infix + "_Reception");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Reception->caption(), $patient_room->Reception->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->PatientId->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientId");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->PatientId->caption(), $patient_room->PatientId->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->mrnno->Required) { ?>
			elm = this.getElements("x" + infix + "_mrnno");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->mrnno->caption(), $patient_room->mrnno->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->PatientName->Required) { ?>
			elm = this.getElements("x" + infix + "_PatientName");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->PatientName->caption(), $patient_room->PatientName->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->Gender->Required) { ?>
			elm = this.getElements("x" + infix + "_Gender");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Gender->caption(), $patient_room->Gender->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->RoomID->Required) { ?>
			elm = this.getElements("x" + infix + "_RoomID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->RoomID->caption(), $patient_room->RoomID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->RoomNo->Required) { ?>
			elm = this.getElements("x" + infix + "_RoomNo");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->RoomNo->caption(), $patient_room->RoomNo->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->RoomType->Required) { ?>
			elm = this.getElements("x" + infix + "_RoomType");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->RoomType->caption(), $patient_room->RoomType->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->SharingRoom->Required) { ?>
			elm = this.getElements("x" + infix + "_SharingRoom");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->SharingRoom->caption(), $patient_room->SharingRoom->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->Amount->Required) { ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Amount->caption(), $patient_room->Amount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Amount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Amount->errorMessage()) ?>");
		<?php if ($patient_room_grid->Startdatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_Startdatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Startdatetime->caption(), $patient_room->Startdatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Startdatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Startdatetime->errorMessage()) ?>");
		<?php if ($patient_room_grid->Enddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_Enddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Enddatetime->caption(), $patient_room->Enddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Enddatetime");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Enddatetime->errorMessage()) ?>");
		<?php if ($patient_room_grid->DaysHours->Required) { ?>
			elm = this.getElements("x" + infix + "_DaysHours");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->DaysHours->caption(), $patient_room->DaysHours->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->Days->Required) { ?>
			elm = this.getElements("x" + infix + "_Days");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Days->caption(), $patient_room->Days->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Days");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Days->errorMessage()) ?>");
		<?php if ($patient_room_grid->Hours->Required) { ?>
			elm = this.getElements("x" + infix + "_Hours");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->Hours->caption(), $patient_room->Hours->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_Hours");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->Hours->errorMessage()) ?>");
		<?php if ($patient_room_grid->TotalAmount->Required) { ?>
			elm = this.getElements("x" + infix + "_TotalAmount");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->TotalAmount->caption(), $patient_room->TotalAmount->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_TotalAmount");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->TotalAmount->errorMessage()) ?>");
		<?php if ($patient_room_grid->PatID->Required) { ?>
			elm = this.getElements("x" + infix + "_PatID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->PatID->caption(), $patient_room->PatID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->MobileNumber->Required) { ?>
			elm = this.getElements("x" + infix + "_MobileNumber");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->MobileNumber->caption(), $patient_room->MobileNumber->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->HospID->Required) { ?>
			elm = this.getElements("x" + infix + "_HospID");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->HospID->caption(), $patient_room->HospID->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->status->Required) { ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->status->caption(), $patient_room->status->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_status");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($patient_room->status->errorMessage()) ?>");
		<?php if ($patient_room_grid->createdby->Required) { ?>
			elm = this.getElements("x" + infix + "_createdby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->createdby->caption(), $patient_room->createdby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->createddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_createddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->createddatetime->caption(), $patient_room->createddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->modifiedby->Required) { ?>
			elm = this.getElements("x" + infix + "_modifiedby");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->modifiedby->caption(), $patient_room->modifiedby->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($patient_room_grid->modifieddatetime->Required) { ?>
			elm = this.getElements("x" + infix + "_modifieddatetime");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room->modifieddatetime->caption(), $patient_room->modifieddatetime->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fpatient_roomgrid.emptyRow = function(infix) {
	var fobj = this._form;
	if (ew.valueChanged(fobj, infix, "Reception", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientId", false)) return false;
	if (ew.valueChanged(fobj, infix, "mrnno", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatientName", false)) return false;
	if (ew.valueChanged(fobj, infix, "Gender", false)) return false;
	if (ew.valueChanged(fobj, infix, "RoomID", false)) return false;
	if (ew.valueChanged(fobj, infix, "RoomNo", false)) return false;
	if (ew.valueChanged(fobj, infix, "RoomType", false)) return false;
	if (ew.valueChanged(fobj, infix, "SharingRoom", false)) return false;
	if (ew.valueChanged(fobj, infix, "Amount", false)) return false;
	if (ew.valueChanged(fobj, infix, "Startdatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "Enddatetime", false)) return false;
	if (ew.valueChanged(fobj, infix, "DaysHours", false)) return false;
	if (ew.valueChanged(fobj, infix, "Days", false)) return false;
	if (ew.valueChanged(fobj, infix, "Hours", false)) return false;
	if (ew.valueChanged(fobj, infix, "TotalAmount", false)) return false;
	if (ew.valueChanged(fobj, infix, "PatID", false)) return false;
	if (ew.valueChanged(fobj, infix, "MobileNumber", false)) return false;
	if (ew.valueChanged(fobj, infix, "status", false)) return false;
	return true;
}

// Form_CustomValidate event
fpatient_roomgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fpatient_roomgrid.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
fpatient_roomgrid.lists["x_Reception"] = <?php echo $patient_room_grid->Reception->Lookup->toClientList() ?>;
fpatient_roomgrid.lists["x_Reception"].options = <?php echo JsonEncode($patient_room_grid->Reception->lookupOptions()) ?>;
fpatient_roomgrid.lists["x_RoomID"] = <?php echo $patient_room_grid->RoomID->Lookup->toClientList() ?>;
fpatient_roomgrid.lists["x_RoomID"].options = <?php echo JsonEncode($patient_room_grid->RoomID->lookupOptions()) ?>;

// Form object for search
</script>
<script src="phpjs/ewscrolltable.js"></script>
<?php } ?>
<?php
$patient_room_grid->renderOtherOptions();
?>
<?php $patient_room_grid->showPageHeader(); ?>
<?php
$patient_room_grid->showMessage();
?>
<?php if ($patient_room_grid->TotalRecs > 0 || $patient_room->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_room_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_room">
<?php if ($patient_room_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_room_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_roomgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_room" class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_roomgrid" class="table ew-table"><!-- .ew-table ##-->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_room_grid->RowType = ROWTYPE_HEADER;

// Render list options
$patient_room_grid->renderListOptions();

// Render list options (header, left)
$patient_room_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_room->id->Visible) { // id ?>
	<?php if ($patient_room->sortUrl($patient_room->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_room->id->headerCellClass() ?>"><div id="elh_patient_room_id" class="patient_room_id"><div class="ew-table-header-caption"><?php echo $patient_room->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_room->id->headerCellClass() ?>"><div><div id="elh_patient_room_id" class="patient_room_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Reception->Visible) { // Reception ?>
	<?php if ($patient_room->sortUrl($patient_room->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_room->Reception->headerCellClass() ?>"><div id="elh_patient_room_Reception" class="patient_room_Reception"><div class="ew-table-header-caption"><?php echo $patient_room->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_room->Reception->headerCellClass() ?>"><div><div id="elh_patient_room_Reception" class="patient_room_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Reception->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Reception->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_room->sortUrl($patient_room->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_room->PatientId->headerCellClass() ?>"><div id="elh_patient_room_PatientId" class="patient_room_PatientId"><div class="ew-table-header-caption"><?php echo $patient_room->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_room->PatientId->headerCellClass() ?>"><div><div id="elh_patient_room_PatientId" class="patient_room_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->PatientId->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->PatientId->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_room->sortUrl($patient_room->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_room->mrnno->headerCellClass() ?>"><div id="elh_patient_room_mrnno" class="patient_room_mrnno"><div class="ew-table-header-caption"><?php echo $patient_room->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_room->mrnno->headerCellClass() ?>"><div><div id="elh_patient_room_mrnno" class="patient_room_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->mrnno->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->mrnno->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_room->sortUrl($patient_room->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_room->PatientName->headerCellClass() ?>"><div id="elh_patient_room_PatientName" class="patient_room_PatientName"><div class="ew-table-header-caption"><?php echo $patient_room->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_room->PatientName->headerCellClass() ?>"><div><div id="elh_patient_room_PatientName" class="patient_room_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->PatientName->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->PatientName->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Gender->Visible) { // Gender ?>
	<?php if ($patient_room->sortUrl($patient_room->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_room->Gender->headerCellClass() ?>"><div id="elh_patient_room_Gender" class="patient_room_Gender"><div class="ew-table-header-caption"><?php echo $patient_room->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_room->Gender->headerCellClass() ?>"><div><div id="elh_patient_room_Gender" class="patient_room_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Gender->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Gender->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
	<?php if ($patient_room->sortUrl($patient_room->RoomID) == "") { ?>
		<th data-name="RoomID" class="<?php echo $patient_room->RoomID->headerCellClass() ?>"><div id="elh_patient_room_RoomID" class="patient_room_RoomID"><div class="ew-table-header-caption"><?php echo $patient_room->RoomID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomID" class="<?php echo $patient_room->RoomID->headerCellClass() ?>"><div><div id="elh_patient_room_RoomID" class="patient_room_RoomID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->RoomID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->RoomID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->RoomID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
	<?php if ($patient_room->sortUrl($patient_room->RoomNo) == "") { ?>
		<th data-name="RoomNo" class="<?php echo $patient_room->RoomNo->headerCellClass() ?>"><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo"><div class="ew-table-header-caption"><?php echo $patient_room->RoomNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomNo" class="<?php echo $patient_room->RoomNo->headerCellClass() ?>"><div><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->RoomNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->RoomNo->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->RoomNo->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
	<?php if ($patient_room->sortUrl($patient_room->RoomType) == "") { ?>
		<th data-name="RoomType" class="<?php echo $patient_room->RoomType->headerCellClass() ?>"><div id="elh_patient_room_RoomType" class="patient_room_RoomType"><div class="ew-table-header-caption"><?php echo $patient_room->RoomType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomType" class="<?php echo $patient_room->RoomType->headerCellClass() ?>"><div><div id="elh_patient_room_RoomType" class="patient_room_RoomType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->RoomType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->RoomType->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->RoomType->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
	<?php if ($patient_room->sortUrl($patient_room->SharingRoom) == "") { ?>
		<th data-name="SharingRoom" class="<?php echo $patient_room->SharingRoom->headerCellClass() ?>"><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom"><div class="ew-table-header-caption"><?php echo $patient_room->SharingRoom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SharingRoom" class="<?php echo $patient_room->SharingRoom->headerCellClass() ?>"><div><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->SharingRoom->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->SharingRoom->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->SharingRoom->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Amount->Visible) { // Amount ?>
	<?php if ($patient_room->sortUrl($patient_room->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $patient_room->Amount->headerCellClass() ?>"><div id="elh_patient_room_Amount" class="patient_room_Amount"><div class="ew-table-header-caption"><?php echo $patient_room->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $patient_room->Amount->headerCellClass() ?>"><div><div id="elh_patient_room_Amount" class="patient_room_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Amount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Amount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
	<?php if ($patient_room->sortUrl($patient_room->Startdatetime) == "") { ?>
		<th data-name="Startdatetime" class="<?php echo $patient_room->Startdatetime->headerCellClass() ?>"><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime"><div class="ew-table-header-caption"><?php echo $patient_room->Startdatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Startdatetime" class="<?php echo $patient_room->Startdatetime->headerCellClass() ?>"><div><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Startdatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Startdatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Startdatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
	<?php if ($patient_room->sortUrl($patient_room->Enddatetime) == "") { ?>
		<th data-name="Enddatetime" class="<?php echo $patient_room->Enddatetime->headerCellClass() ?>"><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime"><div class="ew-table-header-caption"><?php echo $patient_room->Enddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Enddatetime" class="<?php echo $patient_room->Enddatetime->headerCellClass() ?>"><div><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Enddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Enddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Enddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
	<?php if ($patient_room->sortUrl($patient_room->DaysHours) == "") { ?>
		<th data-name="DaysHours" class="<?php echo $patient_room->DaysHours->headerCellClass() ?>"><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours"><div class="ew-table-header-caption"><?php echo $patient_room->DaysHours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DaysHours" class="<?php echo $patient_room->DaysHours->headerCellClass() ?>"><div><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->DaysHours->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->DaysHours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->DaysHours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Days->Visible) { // Days ?>
	<?php if ($patient_room->sortUrl($patient_room->Days) == "") { ?>
		<th data-name="Days" class="<?php echo $patient_room->Days->headerCellClass() ?>"><div id="elh_patient_room_Days" class="patient_room_Days"><div class="ew-table-header-caption"><?php echo $patient_room->Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Days" class="<?php echo $patient_room->Days->headerCellClass() ?>"><div><div id="elh_patient_room_Days" class="patient_room_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Days->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Days->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Days->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->Hours->Visible) { // Hours ?>
	<?php if ($patient_room->sortUrl($patient_room->Hours) == "") { ?>
		<th data-name="Hours" class="<?php echo $patient_room->Hours->headerCellClass() ?>"><div id="elh_patient_room_Hours" class="patient_room_Hours"><div class="ew-table-header-caption"><?php echo $patient_room->Hours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hours" class="<?php echo $patient_room->Hours->headerCellClass() ?>"><div><div id="elh_patient_room_Hours" class="patient_room_Hours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->Hours->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->Hours->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->Hours->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($patient_room->sortUrl($patient_room->TotalAmount) == "") { ?>
		<th data-name="TotalAmount" class="<?php echo $patient_room->TotalAmount->headerCellClass() ?>"><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount"><div class="ew-table-header-caption"><?php echo $patient_room->TotalAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalAmount" class="<?php echo $patient_room->TotalAmount->headerCellClass() ?>"><div><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->TotalAmount->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->TotalAmount->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->PatID->Visible) { // PatID ?>
	<?php if ($patient_room->sortUrl($patient_room->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_room->PatID->headerCellClass() ?>"><div id="elh_patient_room_PatID" class="patient_room_PatID"><div class="ew-table-header-caption"><?php echo $patient_room->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_room->PatID->headerCellClass() ?>"><div><div id="elh_patient_room_PatID" class="patient_room_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->PatID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->PatID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_room->sortUrl($patient_room->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_room->MobileNumber->headerCellClass() ?>"><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_room->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_room->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->MobileNumber->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->MobileNumber->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->HospID->Visible) { // HospID ?>
	<?php if ($patient_room->sortUrl($patient_room->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_room->HospID->headerCellClass() ?>"><div id="elh_patient_room_HospID" class="patient_room_HospID"><div class="ew-table-header-caption"><?php echo $patient_room->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_room->HospID->headerCellClass() ?>"><div><div id="elh_patient_room_HospID" class="patient_room_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->HospID->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->HospID->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->status->Visible) { // status ?>
	<?php if ($patient_room->sortUrl($patient_room->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_room->status->headerCellClass() ?>"><div id="elh_patient_room_status" class="patient_room_status"><div class="ew-table-header-caption"><?php echo $patient_room->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_room->status->headerCellClass() ?>"><div><div id="elh_patient_room_status" class="patient_room_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->createdby->Visible) { // createdby ?>
	<?php if ($patient_room->sortUrl($patient_room->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_room->createdby->headerCellClass() ?>"><div id="elh_patient_room_createdby" class="patient_room_createdby"><div class="ew-table-header-caption"><?php echo $patient_room->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_room->createdby->headerCellClass() ?>"><div><div id="elh_patient_room_createdby" class="patient_room_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->createdby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->createdby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_room->sortUrl($patient_room->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_room->createddatetime->headerCellClass() ?>"><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_room->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_room->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->createddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->createddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_room->sortUrl($patient_room->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_room->modifiedby->headerCellClass() ?>"><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_room->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_room->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->modifiedby->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->modifiedby->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_room->sortUrl($patient_room->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_room->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_room->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_room->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room->modifieddatetime->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($patient_room->modifieddatetime->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$patient_room_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$patient_room_grid->StartRec = 1;
$patient_room_grid->StopRec = $patient_room_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($CurrentForm && $patient_room_grid->EventCancelled) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_room_grid->FormKeyCountName) && ($patient_room->isGridAdd() || $patient_room->isGridEdit() || $patient_room->isConfirm())) {
		$patient_room_grid->KeyCount = $CurrentForm->getValue($patient_room_grid->FormKeyCountName);
		$patient_room_grid->StopRec = $patient_room_grid->StartRec + $patient_room_grid->KeyCount - 1;
	}
}
$patient_room_grid->RecCnt = $patient_room_grid->StartRec - 1;
if ($patient_room_grid->Recordset && !$patient_room_grid->Recordset->EOF) {
	$patient_room_grid->Recordset->moveFirst();
	$selectLimit = $patient_room_grid->UseSelectLimit;
	if (!$selectLimit && $patient_room_grid->StartRec > 1)
		$patient_room_grid->Recordset->move($patient_room_grid->StartRec - 1);
} elseif (!$patient_room->AllowAddDeleteRow && $patient_room_grid->StopRec == 0) {
	$patient_room_grid->StopRec = $patient_room->GridAddRowCount;
}

// Initialize aggregate
$patient_room->RowType = ROWTYPE_AGGREGATEINIT;
$patient_room->resetAttributes();
$patient_room_grid->renderRow();
if ($patient_room->isGridAdd())
	$patient_room_grid->RowIndex = 0;
if ($patient_room->isGridEdit())
	$patient_room_grid->RowIndex = 0;
while ($patient_room_grid->RecCnt < $patient_room_grid->StopRec) {
	$patient_room_grid->RecCnt++;
	if ($patient_room_grid->RecCnt >= $patient_room_grid->StartRec) {
		$patient_room_grid->RowCnt++;
		if ($patient_room->isGridAdd() || $patient_room->isGridEdit() || $patient_room->isConfirm()) {
			$patient_room_grid->RowIndex++;
			$CurrentForm->Index = $patient_room_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_room_grid->FormActionName) && $patient_room_grid->EventCancelled)
				$patient_room_grid->RowAction = strval($CurrentForm->getValue($patient_room_grid->FormActionName));
			elseif ($patient_room->isGridAdd())
				$patient_room_grid->RowAction = "insert";
			else
				$patient_room_grid->RowAction = "";
		}

		// Set up key count
		$patient_room_grid->KeyCount = $patient_room_grid->RowIndex;

		// Init row class and style
		$patient_room->resetAttributes();
		$patient_room->CssClass = "";
		if ($patient_room->isGridAdd()) {
			if ($patient_room->CurrentMode == "copy") {
				$patient_room_grid->loadRowValues($patient_room_grid->Recordset); // Load row values
				$patient_room_grid->setRecordKey($patient_room_grid->RowOldKey, $patient_room_grid->Recordset); // Set old record key
			} else {
				$patient_room_grid->loadRowValues(); // Load default values
				$patient_room_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$patient_room_grid->loadRowValues($patient_room_grid->Recordset); // Load row values
		}
		$patient_room->RowType = ROWTYPE_VIEW; // Render view
		if ($patient_room->isGridAdd()) // Grid add
			$patient_room->RowType = ROWTYPE_ADD; // Render add
		if ($patient_room->isGridAdd() && $patient_room->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_room_grid->restoreCurrentRowFormValues($patient_room_grid->RowIndex); // Restore form values
		if ($patient_room->isGridEdit()) { // Grid edit
			if ($patient_room->EventCancelled)
				$patient_room_grid->restoreCurrentRowFormValues($patient_room_grid->RowIndex); // Restore form values
			if ($patient_room_grid->RowAction == "insert")
				$patient_room->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_room->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_room->isGridEdit() && ($patient_room->RowType == ROWTYPE_EDIT || $patient_room->RowType == ROWTYPE_ADD) && $patient_room->EventCancelled) // Update failed
			$patient_room_grid->restoreCurrentRowFormValues($patient_room_grid->RowIndex); // Restore form values
		if ($patient_room->RowType == ROWTYPE_EDIT) // Edit row
			$patient_room_grid->EditRowCnt++;
		if ($patient_room->isConfirm()) // Confirm row
			$patient_room_grid->restoreCurrentRowFormValues($patient_room_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_room->RowAttrs = array_merge($patient_room->RowAttrs, array('data-rowindex'=>$patient_room_grid->RowCnt, 'id'=>'r' . $patient_room_grid->RowCnt . '_patient_room', 'data-rowtype'=>$patient_room->RowType));

		// Render row
		$patient_room_grid->renderRow();

		// Render list options
		$patient_room_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_room_grid->RowAction <> "delete" && $patient_room_grid->RowAction <> "insertdelete" && !($patient_room_grid->RowAction == "insert" && $patient_room->isConfirm() && $patient_room_grid->emptyRow())) {
?>
	<tr<?php echo $patient_room->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_room_grid->ListOptions->render("body", "left", $patient_room_grid->RowCnt);
?>
	<?php if ($patient_room->id->Visible) { // id ?>
		<td data-name="id"<?php echo $patient_room->id->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_id" name="o<?php echo $patient_room_grid->RowIndex ?>_id" id="o<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_id" class="form-group patient_room_id">
<span<?php echo $patient_room->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->id->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_id" name="x<?php echo $patient_room_grid->RowIndex ?>_id" id="x<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_id" class="patient_room_id">
<span<?php echo $patient_room->id->viewAttributes() ?>>
<?php echo $patient_room->id->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_id" name="x<?php echo $patient_room_grid->RowIndex ?>_id" id="x<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room->id->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_id" name="o<?php echo $patient_room_grid->RowIndex ?>_id" id="o<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_id" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_id" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room->id->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_id" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_id" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->Reception->Visible) { // Reception ?>
		<td data-name="Reception"<?php echo $patient_room->Reception->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_room->Reception->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Reception" class="form-group patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Reception" class="form-group patient_room_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_Reception"><?php echo strval($patient_room->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_room->Reception->ViewValue) : $patient_room->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_room->Reception->ReadOnly || $patient_room->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room->Reception->Lookup->getParamTag("p_x" . $patient_room_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo $patient_room->Reception->CurrentValue ?>"<?php echo $patient_room->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="o<?php echo $patient_room_grid->RowIndex ?>_Reception" id="o<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Reception" class="form-group patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Reception->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Reception" class="patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<?php echo $patient_room->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="o<?php echo $patient_room_grid->RowIndex ?>_Reception" id="o<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Reception" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId"<?php echo $patient_room->PatientId->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatientId" class="form-group patient_room_PatientId">
<input type="text" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_room->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatientId->EditValue ?>"<?php echo $patient_room->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatientId" class="form-group patient_room_PatientId">
<span<?php echo $patient_room->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->PatientId->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatientId" class="patient_room_PatientId">
<span<?php echo $patient_room->PatientId->viewAttributes() ?>>
<?php echo $patient_room->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno"<?php echo $patient_room->mrnno->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_room->mrnno->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_mrnno" class="form-group patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_mrnno" class="form-group patient_room_mrnno">
<input type="text" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_room->mrnno->EditValue ?>"<?php echo $patient_room->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_mrnno" class="form-group patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->mrnno->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_mrnno" class="patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<?php echo $patient_room->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName"<?php echo $patient_room->PatientName->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatientName" class="form-group patient_room_PatientName">
<input type="text" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatientName->EditValue ?>"<?php echo $patient_room->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatientName" class="form-group patient_room_PatientName">
<input type="text" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatientName->EditValue ?>"<?php echo $patient_room->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatientName" class="patient_room_PatientName">
<span<?php echo $patient_room->PatientName->viewAttributes() ?>>
<?php echo $patient_room->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->Gender->Visible) { // Gender ?>
		<td data-name="Gender"<?php echo $patient_room->Gender->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Gender" class="form-group patient_room_Gender">
<input type="text" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_room->Gender->EditValue ?>"<?php echo $patient_room->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="o<?php echo $patient_room_grid->RowIndex ?>_Gender" id="o<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Gender" class="form-group patient_room_Gender">
<input type="text" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_room->Gender->EditValue ?>"<?php echo $patient_room->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Gender" class="patient_room_Gender">
<span<?php echo $patient_room->Gender->viewAttributes() ?>>
<?php echo $patient_room->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="o<?php echo $patient_room_grid->RowIndex ?>_Gender" id="o<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Gender" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
		<td data-name="RoomID"<?php echo $patient_room->RoomID->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomID" class="form-group patient_room_RoomID">
<?php $patient_room->RoomID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_room->RoomID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_RoomID"><?php echo strval($patient_room->RoomID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_room->RoomID->ViewValue) : $patient_room->RoomID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room->RoomID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_room->RoomID->ReadOnly || $patient_room->RoomID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room->RoomID->Lookup->getParamTag("p_x" . $patient_room_grid->RowIndex . "_RoomID") ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room->RoomID->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo $patient_room->RoomID->CurrentValue ?>"<?php echo $patient_room->RoomID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room->RoomID->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomID" class="form-group patient_room_RoomID">
<?php $patient_room->RoomID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_room->RoomID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_RoomID"><?php echo strval($patient_room->RoomID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_room->RoomID->ViewValue) : $patient_room->RoomID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room->RoomID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_room->RoomID->ReadOnly || $patient_room->RoomID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room->RoomID->Lookup->getParamTag("p_x" . $patient_room_grid->RowIndex . "_RoomID") ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room->RoomID->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo $patient_room->RoomID->CurrentValue ?>"<?php echo $patient_room->RoomID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomID" class="patient_room_RoomID">
<span<?php echo $patient_room->RoomID->viewAttributes() ?>>
<?php echo $patient_room->RoomID->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room->RoomID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room->RoomID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room->RoomID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room->RoomID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
		<td data-name="RoomNo"<?php echo $patient_room->RoomNo->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomNo" class="form-group patient_room_RoomNo">
<input type="text" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->RoomNo->getPlaceHolder()) ?>" value="<?php echo $patient_room->RoomNo->EditValue ?>"<?php echo $patient_room->RoomNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room->RoomNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomNo" class="form-group patient_room_RoomNo">
<input type="text" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->RoomNo->getPlaceHolder()) ?>" value="<?php echo $patient_room->RoomNo->EditValue ?>"<?php echo $patient_room->RoomNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomNo" class="patient_room_RoomNo">
<span<?php echo $patient_room->RoomNo->viewAttributes() ?>>
<?php echo $patient_room->RoomNo->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room->RoomNo->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room->RoomNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room->RoomNo->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room->RoomNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
		<td data-name="RoomType"<?php echo $patient_room->RoomType->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomType" class="form-group patient_room_RoomType">
<input type="text" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->RoomType->getPlaceHolder()) ?>" value="<?php echo $patient_room->RoomType->EditValue ?>"<?php echo $patient_room->RoomType->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room->RoomType->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomType" class="form-group patient_room_RoomType">
<input type="text" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->RoomType->getPlaceHolder()) ?>" value="<?php echo $patient_room->RoomType->EditValue ?>"<?php echo $patient_room->RoomType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_RoomType" class="patient_room_RoomType">
<span<?php echo $patient_room->RoomType->viewAttributes() ?>>
<?php echo $patient_room->RoomType->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room->RoomType->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room->RoomType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room->RoomType->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room->RoomType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
		<td data-name="SharingRoom"<?php echo $patient_room->SharingRoom->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_SharingRoom" class="form-group patient_room_SharingRoom">
<input type="text" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->SharingRoom->getPlaceHolder()) ?>" value="<?php echo $patient_room->SharingRoom->EditValue ?>"<?php echo $patient_room->SharingRoom->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room->SharingRoom->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_SharingRoom" class="form-group patient_room_SharingRoom">
<input type="text" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->SharingRoom->getPlaceHolder()) ?>" value="<?php echo $patient_room->SharingRoom->EditValue ?>"<?php echo $patient_room->SharingRoom->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_SharingRoom" class="patient_room_SharingRoom">
<span<?php echo $patient_room->SharingRoom->viewAttributes() ?>>
<?php echo $patient_room->SharingRoom->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room->SharingRoom->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room->SharingRoom->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room->SharingRoom->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room->SharingRoom->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->Amount->Visible) { // Amount ?>
		<td data-name="Amount"<?php echo $patient_room->Amount->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Amount" class="form-group patient_room_Amount">
<input type="text" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($patient_room->Amount->getPlaceHolder()) ?>" value="<?php echo $patient_room->Amount->EditValue ?>"<?php echo $patient_room->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="o<?php echo $patient_room_grid->RowIndex ?>_Amount" id="o<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room->Amount->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Amount" class="form-group patient_room_Amount">
<input type="text" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($patient_room->Amount->getPlaceHolder()) ?>" value="<?php echo $patient_room->Amount->EditValue ?>"<?php echo $patient_room->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Amount" class="patient_room_Amount">
<span<?php echo $patient_room->Amount->viewAttributes() ?>>
<?php echo $patient_room->Amount->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room->Amount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="o<?php echo $patient_room_grid->RowIndex ?>_Amount" id="o<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room->Amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room->Amount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Amount" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
		<td data-name="Startdatetime"<?php echo $patient_room->Startdatetime->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Startdatetime" class="form-group patient_room_Startdatetime">
<input type="text" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" placeholder="<?php echo HtmlEncode($patient_room->Startdatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room->Startdatetime->EditValue ?>"<?php echo $patient_room->Startdatetime->editAttributes() ?>>
<?php if (!$patient_room->Startdatetime->ReadOnly && !$patient_room->Startdatetime->Disabled && !isset($patient_room->Startdatetime->EditAttrs["readonly"]) && !isset($patient_room->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room->Startdatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Startdatetime" class="form-group patient_room_Startdatetime">
<input type="text" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" placeholder="<?php echo HtmlEncode($patient_room->Startdatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room->Startdatetime->EditValue ?>"<?php echo $patient_room->Startdatetime->editAttributes() ?>>
<?php if (!$patient_room->Startdatetime->ReadOnly && !$patient_room->Startdatetime->Disabled && !isset($patient_room->Startdatetime->EditAttrs["readonly"]) && !isset($patient_room->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Startdatetime" class="patient_room_Startdatetime">
<span<?php echo $patient_room->Startdatetime->viewAttributes() ?>>
<?php echo $patient_room->Startdatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room->Startdatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room->Startdatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room->Startdatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room->Startdatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
		<td data-name="Enddatetime"<?php echo $patient_room->Enddatetime->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Enddatetime" class="form-group patient_room_Enddatetime">
<input type="text" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" placeholder="<?php echo HtmlEncode($patient_room->Enddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room->Enddatetime->EditValue ?>"<?php echo $patient_room->Enddatetime->editAttributes() ?>>
<?php if (!$patient_room->Enddatetime->ReadOnly && !$patient_room->Enddatetime->Disabled && !isset($patient_room->Enddatetime->EditAttrs["readonly"]) && !isset($patient_room->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room->Enddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Enddatetime" class="form-group patient_room_Enddatetime">
<input type="text" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" placeholder="<?php echo HtmlEncode($patient_room->Enddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room->Enddatetime->EditValue ?>"<?php echo $patient_room->Enddatetime->editAttributes() ?>>
<?php if (!$patient_room->Enddatetime->ReadOnly && !$patient_room->Enddatetime->Disabled && !isset($patient_room->Enddatetime->EditAttrs["readonly"]) && !isset($patient_room->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Enddatetime" class="patient_room_Enddatetime">
<span<?php echo $patient_room->Enddatetime->viewAttributes() ?>>
<?php echo $patient_room->Enddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room->Enddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room->Enddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room->Enddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room->Enddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
		<td data-name="DaysHours"<?php echo $patient_room->DaysHours->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_DaysHours" class="form-group patient_room_DaysHours">
<input type="text" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->DaysHours->getPlaceHolder()) ?>" value="<?php echo $patient_room->DaysHours->EditValue ?>"<?php echo $patient_room->DaysHours->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room->DaysHours->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_DaysHours" class="form-group patient_room_DaysHours">
<input type="text" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->DaysHours->getPlaceHolder()) ?>" value="<?php echo $patient_room->DaysHours->EditValue ?>"<?php echo $patient_room->DaysHours->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_DaysHours" class="patient_room_DaysHours">
<span<?php echo $patient_room->DaysHours->viewAttributes() ?>>
<?php echo $patient_room->DaysHours->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room->DaysHours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room->DaysHours->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room->DaysHours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room->DaysHours->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->Days->Visible) { // Days ?>
		<td data-name="Days"<?php echo $patient_room->Days->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Days" class="form-group patient_room_Days">
<input type="text" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" size="30" placeholder="<?php echo HtmlEncode($patient_room->Days->getPlaceHolder()) ?>" value="<?php echo $patient_room->Days->EditValue ?>"<?php echo $patient_room->Days->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="o<?php echo $patient_room_grid->RowIndex ?>_Days" id="o<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room->Days->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Days" class="form-group patient_room_Days">
<input type="text" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" size="30" placeholder="<?php echo HtmlEncode($patient_room->Days->getPlaceHolder()) ?>" value="<?php echo $patient_room->Days->EditValue ?>"<?php echo $patient_room->Days->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Days" class="patient_room_Days">
<span<?php echo $patient_room->Days->viewAttributes() ?>>
<?php echo $patient_room->Days->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room->Days->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Days" name="o<?php echo $patient_room_grid->RowIndex ?>_Days" id="o<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room->Days->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Days" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room->Days->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Days" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Days" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room->Days->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->Hours->Visible) { // Hours ?>
		<td data-name="Hours"<?php echo $patient_room->Hours->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Hours" class="form-group patient_room_Hours">
<input type="text" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" size="30" placeholder="<?php echo HtmlEncode($patient_room->Hours->getPlaceHolder()) ?>" value="<?php echo $patient_room->Hours->EditValue ?>"<?php echo $patient_room->Hours->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="o<?php echo $patient_room_grid->RowIndex ?>_Hours" id="o<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room->Hours->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Hours" class="form-group patient_room_Hours">
<input type="text" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" size="30" placeholder="<?php echo HtmlEncode($patient_room->Hours->getPlaceHolder()) ?>" value="<?php echo $patient_room->Hours->EditValue ?>"<?php echo $patient_room->Hours->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_Hours" class="patient_room_Hours">
<span<?php echo $patient_room->Hours->viewAttributes() ?>>
<?php echo $patient_room->Hours->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room->Hours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="o<?php echo $patient_room_grid->RowIndex ?>_Hours" id="o<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room->Hours->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room->Hours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Hours" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room->Hours->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount"<?php echo $patient_room->TotalAmount->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_TotalAmount" class="form-group patient_room_TotalAmount">
<input type="text" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($patient_room->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $patient_room->TotalAmount->EditValue ?>"<?php echo $patient_room->TotalAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room->TotalAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_TotalAmount" class="form-group patient_room_TotalAmount">
<input type="text" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($patient_room->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $patient_room->TotalAmount->EditValue ?>"<?php echo $patient_room->TotalAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_TotalAmount" class="patient_room_TotalAmount">
<span<?php echo $patient_room->TotalAmount->viewAttributes() ?>>
<?php echo $patient_room->TotalAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room->TotalAmount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room->TotalAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room->TotalAmount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room->TotalAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->PatID->Visible) { // PatID ?>
		<td data-name="PatID"<?php echo $patient_room->PatID->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_room->PatID->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatID" class="form-group patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatID" class="form-group patient_room_PatID">
<input type="text" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatID->EditValue ?>"<?php echo $patient_room->PatID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="o<?php echo $patient_room_grid->RowIndex ?>_PatID" id="o<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_room->PatID->getSessionValue() <> "") { ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatID" class="form-group patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatID" class="form-group patient_room_PatID">
<input type="text" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatID->EditValue ?>"<?php echo $patient_room->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_PatID" class="patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<?php echo $patient_room->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="o<?php echo $patient_room_grid->RowIndex ?>_PatID" id="o<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatID" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber"<?php echo $patient_room->MobileNumber->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_MobileNumber" class="form-group patient_room_MobileNumber">
<input type="text" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_room->MobileNumber->EditValue ?>"<?php echo $patient_room->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_MobileNumber" class="form-group patient_room_MobileNumber">
<input type="text" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_room->MobileNumber->EditValue ?>"<?php echo $patient_room->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_MobileNumber" class="patient_room_MobileNumber">
<span<?php echo $patient_room->MobileNumber->viewAttributes() ?>>
<?php echo $patient_room->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->HospID->Visible) { // HospID ?>
		<td data-name="HospID"<?php echo $patient_room->HospID->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="o<?php echo $patient_room_grid->RowIndex ?>_HospID" id="o<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_HospID" class="patient_room_HospID">
<span<?php echo $patient_room->HospID->viewAttributes() ?>>
<?php echo $patient_room->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="x<?php echo $patient_room_grid->RowIndex ?>_HospID" id="x<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="o<?php echo $patient_room_grid->RowIndex ?>_HospID" id="o<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_HospID" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_HospID" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->status->Visible) { // status ?>
		<td data-name="status"<?php echo $patient_room->status->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_status" class="form-group patient_room_status">
<input type="text" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_room->status->getPlaceHolder()) ?>" value="<?php echo $patient_room->status->EditValue ?>"<?php echo $patient_room->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_status" name="o<?php echo $patient_room_grid->RowIndex ?>_status" id="o<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_status" class="form-group patient_room_status">
<input type="text" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_room->status->getPlaceHolder()) ?>" value="<?php echo $patient_room->status->EditValue ?>"<?php echo $patient_room->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_status" class="patient_room_status">
<span<?php echo $patient_room->status->viewAttributes() ?>>
<?php echo $patient_room->status->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room->status->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_status" name="o<?php echo $patient_room_grid->RowIndex ?>_status" id="o<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_status" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_status" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room->status->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_status" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_status" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->createdby->Visible) { // createdby ?>
		<td data-name="createdby"<?php echo $patient_room->createdby->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="o<?php echo $patient_room_grid->RowIndex ?>_createdby" id="o<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_createdby" class="patient_room_createdby">
<span<?php echo $patient_room->createdby->viewAttributes() ?>>
<?php echo $patient_room->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="x<?php echo $patient_room_grid->RowIndex ?>_createdby" id="x<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="o<?php echo $patient_room_grid->RowIndex ?>_createdby" id="o<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_createdby" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_createdby" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime"<?php echo $patient_room->createddatetime->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_createddatetime" class="patient_room_createddatetime">
<span<?php echo $patient_room->createddatetime->viewAttributes() ?>>
<?php echo $patient_room->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby"<?php echo $patient_room->modifiedby->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_modifiedby" class="patient_room_modifiedby">
<span<?php echo $patient_room->modifiedby->viewAttributes() ?>>
<?php echo $patient_room->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime"<?php echo $patient_room->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCnt ?>_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
<span<?php echo $patient_room->modifieddatetime->viewAttributes() ?>>
<?php echo $patient_room->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_room_grid->ListOptions->render("body", "right", $patient_room_grid->RowCnt);
?>
	</tr>
<?php if ($patient_room->RowType == ROWTYPE_ADD || $patient_room->RowType == ROWTYPE_EDIT) { ?>
<script>
fpatient_roomgrid.updateLists(<?php echo $patient_room_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_room->isGridAdd() || $patient_room->CurrentMode == "copy")
		if (!$patient_room_grid->Recordset->EOF)
			$patient_room_grid->Recordset->moveNext();
}
?>
<?php
	if ($patient_room->CurrentMode == "add" || $patient_room->CurrentMode == "copy" || $patient_room->CurrentMode == "edit") {
		$patient_room_grid->RowIndex = '$rowindex$';
		$patient_room_grid->loadRowValues();

		// Set row properties
		$patient_room->resetAttributes();
		$patient_room->RowAttrs = array_merge($patient_room->RowAttrs, array('data-rowindex'=>$patient_room_grid->RowIndex, 'id'=>'r0_patient_room', 'data-rowtype'=>ROWTYPE_ADD));
		AppendClass($patient_room->RowAttrs["class"], "ew-template");
		$patient_room->RowType = ROWTYPE_ADD;

		// Render row
		$patient_room_grid->renderRow();

		// Render list options
		$patient_room_grid->renderListOptions();
		$patient_room_grid->StartRowCnt = 0;
?>
	<tr<?php echo $patient_room->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_room_grid->ListOptions->render("body", "left", $patient_room_grid->RowIndex);
?>
	<?php if ($patient_room->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_id" class="form-group patient_room_id">
<span<?php echo $patient_room->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->id->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_id" name="x<?php echo $patient_room_grid->RowIndex ?>_id" id="x<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_id" name="o<?php echo $patient_room_grid->RowIndex ?>_id" id="o<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_room->isConfirm()) { ?>
<?php if ($patient_room->Reception->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_Reception"><?php echo strval($patient_room->Reception->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_room->Reception->ViewValue) : $patient_room->Reception->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_room->Reception->ReadOnly || $patient_room->Reception->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room->Reception->Lookup->getParamTag("p_x" . $patient_room_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo $patient_room->Reception->CurrentValue ?>"<?php echo $patient_room->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<span<?php echo $patient_room->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Reception->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="o<?php echo $patient_room_grid->RowIndex ?>_Reception" id="o<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_PatientId" class="form-group patient_room_PatientId">
<input type="text" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_room->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatientId->EditValue ?>"<?php echo $patient_room->PatientId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatientId" class="form-group patient_room_PatientId">
<span<?php echo $patient_room->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->PatientId->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_room->isConfirm()) { ?>
<?php if ($patient_room->mrnno->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<input type="text" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_room->mrnno->EditValue ?>"<?php echo $patient_room->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<span<?php echo $patient_room->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->mrnno->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_PatientName" class="form-group patient_room_PatientName">
<input type="text" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatientName->EditValue ?>"<?php echo $patient_room->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatientName" class="form-group patient_room_PatientName">
<span<?php echo $patient_room->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->PatientName->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Gender" class="form-group patient_room_Gender">
<input type="text" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_room->Gender->EditValue ?>"<?php echo $patient_room->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Gender" class="form-group patient_room_Gender">
<span<?php echo $patient_room->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Gender->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="o<?php echo $patient_room_grid->RowIndex ?>_Gender" id="o<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->RoomID->Visible) { // RoomID ?>
		<td data-name="RoomID">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomID" class="form-group patient_room_RoomID">
<?php $patient_room->RoomID->EditAttrs["onchange"] = "ew.autoFill(this);" . @$patient_room->RoomID->EditAttrs["onchange"]; ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_RoomID"><?php echo strval($patient_room->RoomID->ViewValue) == "" ? $Language->phrase("PleaseSelect") : (REMOVE_XSS ? HtmlDecode($patient_room->RoomID->ViewValue) : $patient_room->RoomID->ViewValue) ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room->RoomID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo (($patient_room->RoomID->ReadOnly || $patient_room->RoomID->Disabled) ? " disabled" : "")?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fa fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room->RoomID->Lookup->getParamTag("p_x" . $patient_room_grid->RowIndex . "_RoomID") ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room->RoomID->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo $patient_room->RoomID->CurrentValue ?>"<?php echo $patient_room->RoomID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomID" class="form-group patient_room_RoomID">
<span<?php echo $patient_room->RoomID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->RoomID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room->RoomID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room->RoomID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->RoomNo->Visible) { // RoomNo ?>
		<td data-name="RoomNo">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomNo" class="form-group patient_room_RoomNo">
<input type="text" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->RoomNo->getPlaceHolder()) ?>" value="<?php echo $patient_room->RoomNo->EditValue ?>"<?php echo $patient_room->RoomNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomNo" class="form-group patient_room_RoomNo">
<span<?php echo $patient_room->RoomNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->RoomNo->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room->RoomNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room->RoomNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->RoomType->Visible) { // RoomType ?>
		<td data-name="RoomType">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomType" class="form-group patient_room_RoomType">
<input type="text" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->RoomType->getPlaceHolder()) ?>" value="<?php echo $patient_room->RoomType->EditValue ?>"<?php echo $patient_room->RoomType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomType" class="form-group patient_room_RoomType">
<span<?php echo $patient_room->RoomType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->RoomType->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room->RoomType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room->RoomType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->SharingRoom->Visible) { // SharingRoom ?>
		<td data-name="SharingRoom">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_SharingRoom" class="form-group patient_room_SharingRoom">
<input type="text" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->SharingRoom->getPlaceHolder()) ?>" value="<?php echo $patient_room->SharingRoom->EditValue ?>"<?php echo $patient_room->SharingRoom->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_SharingRoom" class="form-group patient_room_SharingRoom">
<span<?php echo $patient_room->SharingRoom->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->SharingRoom->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room->SharingRoom->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room->SharingRoom->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Amount" class="form-group patient_room_Amount">
<input type="text" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($patient_room->Amount->getPlaceHolder()) ?>" value="<?php echo $patient_room->Amount->EditValue ?>"<?php echo $patient_room->Amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Amount" class="form-group patient_room_Amount">
<span<?php echo $patient_room->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Amount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="o<?php echo $patient_room_grid->RowIndex ?>_Amount" id="o<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->Startdatetime->Visible) { // Startdatetime ?>
		<td data-name="Startdatetime">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Startdatetime" class="form-group patient_room_Startdatetime">
<input type="text" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" placeholder="<?php echo HtmlEncode($patient_room->Startdatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room->Startdatetime->EditValue ?>"<?php echo $patient_room->Startdatetime->editAttributes() ?>>
<?php if (!$patient_room->Startdatetime->ReadOnly && !$patient_room->Startdatetime->Disabled && !isset($patient_room->Startdatetime->EditAttrs["readonly"]) && !isset($patient_room->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Startdatetime" class="form-group patient_room_Startdatetime">
<span<?php echo $patient_room->Startdatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Startdatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room->Startdatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room->Startdatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->Enddatetime->Visible) { // Enddatetime ?>
		<td data-name="Enddatetime">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Enddatetime" class="form-group patient_room_Enddatetime">
<input type="text" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" placeholder="<?php echo HtmlEncode($patient_room->Enddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room->Enddatetime->EditValue ?>"<?php echo $patient_room->Enddatetime->editAttributes() ?>>
<?php if (!$patient_room->Enddatetime->ReadOnly && !$patient_room->Enddatetime->Disabled && !isset($patient_room->Enddatetime->EditAttrs["readonly"]) && !isset($patient_room->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Enddatetime" class="form-group patient_room_Enddatetime">
<span<?php echo $patient_room->Enddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Enddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room->Enddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room->Enddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->DaysHours->Visible) { // DaysHours ?>
		<td data-name="DaysHours">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_DaysHours" class="form-group patient_room_DaysHours">
<input type="text" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->DaysHours->getPlaceHolder()) ?>" value="<?php echo $patient_room->DaysHours->EditValue ?>"<?php echo $patient_room->DaysHours->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_DaysHours" class="form-group patient_room_DaysHours">
<span<?php echo $patient_room->DaysHours->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->DaysHours->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room->DaysHours->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room->DaysHours->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->Days->Visible) { // Days ?>
		<td data-name="Days">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Days" class="form-group patient_room_Days">
<input type="text" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" size="30" placeholder="<?php echo HtmlEncode($patient_room->Days->getPlaceHolder()) ?>" value="<?php echo $patient_room->Days->EditValue ?>"<?php echo $patient_room->Days->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Days" class="form-group patient_room_Days">
<span<?php echo $patient_room->Days->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Days->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room->Days->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="o<?php echo $patient_room_grid->RowIndex ?>_Days" id="o<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room->Days->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->Hours->Visible) { // Hours ?>
		<td data-name="Hours">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Hours" class="form-group patient_room_Hours">
<input type="text" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" size="30" placeholder="<?php echo HtmlEncode($patient_room->Hours->getPlaceHolder()) ?>" value="<?php echo $patient_room->Hours->EditValue ?>"<?php echo $patient_room->Hours->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Hours" class="form-group patient_room_Hours">
<span<?php echo $patient_room->Hours->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->Hours->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room->Hours->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="o<?php echo $patient_room_grid->RowIndex ?>_Hours" id="o<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room->Hours->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_TotalAmount" class="form-group patient_room_TotalAmount">
<input type="text" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($patient_room->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $patient_room->TotalAmount->EditValue ?>"<?php echo $patient_room->TotalAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_TotalAmount" class="form-group patient_room_TotalAmount">
<span<?php echo $patient_room->TotalAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->TotalAmount->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room->TotalAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room->TotalAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_room->isConfirm()) { ?>
<?php if ($patient_room->PatID->getSessionValue() <> "") { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<input type="text" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_room->PatID->EditValue ?>"<?php echo $patient_room->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<span<?php echo $patient_room->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->PatID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="o<?php echo $patient_room_grid->RowIndex ?>_PatID" id="o<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_MobileNumber" class="form-group patient_room_MobileNumber">
<input type="text" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_room->MobileNumber->EditValue ?>"<?php echo $patient_room->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_MobileNumber" class="form-group patient_room_MobileNumber">
<span<?php echo $patient_room->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->MobileNumber->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_HospID" class="form-group patient_room_HospID">
<span<?php echo $patient_room->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->HospID->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="x<?php echo $patient_room_grid->RowIndex ?>_HospID" id="x<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="o<?php echo $patient_room_grid->RowIndex ?>_HospID" id="o<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_status" class="form-group patient_room_status">
<input type="text" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_room->status->getPlaceHolder()) ?>" value="<?php echo $patient_room->status->EditValue ?>"<?php echo $patient_room->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_status" class="form-group patient_room_status">
<span<?php echo $patient_room->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->status->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_status" name="o<?php echo $patient_room_grid->RowIndex ?>_status" id="o<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_createdby" class="form-group patient_room_createdby">
<span<?php echo $patient_room->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->createdby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="x<?php echo $patient_room_grid->RowIndex ?>_createdby" id="x<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="o<?php echo $patient_room_grid->RowIndex ?>_createdby" id="o<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_createddatetime" class="form-group patient_room_createddatetime">
<span<?php echo $patient_room->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->createddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_modifiedby" class="form-group patient_room_modifiedby">
<span<?php echo $patient_room->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->modifiedby->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_modifieddatetime" class="form-group patient_room_modifieddatetime">
<span<?php echo $patient_room->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($patient_room->modifieddatetime->ViewValue) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_room_grid->ListOptions->render("body", "right", $patient_room_grid->RowIndex);
?>
<script>
fpatient_roomgrid.updateLists(<?php echo $patient_room_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php if ($patient_room->CurrentMode == "add" || $patient_room->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $patient_room_grid->FormKeyCountName ?>" id="<?php echo $patient_room_grid->FormKeyCountName ?>" value="<?php echo $patient_room_grid->KeyCount ?>">
<?php echo $patient_room_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_room->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $patient_room_grid->FormKeyCountName ?>" id="<?php echo $patient_room_grid->FormKeyCountName ?>" value="<?php echo $patient_room_grid->KeyCount ?>">
<?php echo $patient_room_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($patient_room->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_roomgrid">
</div><!-- /.ew-grid-middle-panel -->
<?php

// Close recordset
if ($patient_room_grid->Recordset)
	$patient_room_grid->Recordset->Close();
?>
</div>
<?php if ($patient_room_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_room_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_room_grid->TotalRecs == 0 && !$patient_room->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_room_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$patient_room_grid->terminate();
?>
<?php if (!$patient_room->isExport()) { ?>
<script>
ew.scrollableTable("gmp_patient_room", "95%", "");
</script>
<?php } ?>
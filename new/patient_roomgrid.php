<?php
namespace PHPMaker2020\HIMS;

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
<?php if (!$patient_room_grid->isExport()) { ?>
<script>
var fpatient_roomgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	fpatient_roomgrid = new ew.Form("fpatient_roomgrid", "grid");
	fpatient_roomgrid.formKeyCountName = '<?php echo $patient_room_grid->FormKeyCountName ?>';

	// Validate form
	fpatient_roomgrid.validate = function() {
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
			<?php if ($patient_room_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->id->caption(), $patient_room_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->Reception->Required) { ?>
				elm = this.getElements("x" + infix + "_Reception");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->Reception->caption(), $patient_room_grid->Reception->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->PatientId->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientId");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->PatientId->caption(), $patient_room_grid->PatientId->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->mrnno->Required) { ?>
				elm = this.getElements("x" + infix + "_mrnno");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->mrnno->caption(), $patient_room_grid->mrnno->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->PatientName->Required) { ?>
				elm = this.getElements("x" + infix + "_PatientName");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->PatientName->caption(), $patient_room_grid->PatientName->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->Gender->Required) { ?>
				elm = this.getElements("x" + infix + "_Gender");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->Gender->caption(), $patient_room_grid->Gender->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->RoomID->Required) { ?>
				elm = this.getElements("x" + infix + "_RoomID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->RoomID->caption(), $patient_room_grid->RoomID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->RoomNo->Required) { ?>
				elm = this.getElements("x" + infix + "_RoomNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->RoomNo->caption(), $patient_room_grid->RoomNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->RoomType->Required) { ?>
				elm = this.getElements("x" + infix + "_RoomType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->RoomType->caption(), $patient_room_grid->RoomType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->SharingRoom->Required) { ?>
				elm = this.getElements("x" + infix + "_SharingRoom");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->SharingRoom->caption(), $patient_room_grid->SharingRoom->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->Amount->Required) { ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->Amount->caption(), $patient_room_grid->Amount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Amount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_grid->Amount->errorMessage()) ?>");
			<?php if ($patient_room_grid->Startdatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_Startdatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->Startdatetime->caption(), $patient_room_grid->Startdatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Startdatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_grid->Startdatetime->errorMessage()) ?>");
			<?php if ($patient_room_grid->Enddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_Enddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->Enddatetime->caption(), $patient_room_grid->Enddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Enddatetime");
				if (elm && !ew.checkDateDef(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_grid->Enddatetime->errorMessage()) ?>");
			<?php if ($patient_room_grid->DaysHours->Required) { ?>
				elm = this.getElements("x" + infix + "_DaysHours");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->DaysHours->caption(), $patient_room_grid->DaysHours->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->Days->Required) { ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->Days->caption(), $patient_room_grid->Days->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Days");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_grid->Days->errorMessage()) ?>");
			<?php if ($patient_room_grid->Hours->Required) { ?>
				elm = this.getElements("x" + infix + "_Hours");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->Hours->caption(), $patient_room_grid->Hours->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Hours");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_grid->Hours->errorMessage()) ?>");
			<?php if ($patient_room_grid->TotalAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_TotalAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->TotalAmount->caption(), $patient_room_grid->TotalAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TotalAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_grid->TotalAmount->errorMessage()) ?>");
			<?php if ($patient_room_grid->PatID->Required) { ?>
				elm = this.getElements("x" + infix + "_PatID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->PatID->caption(), $patient_room_grid->PatID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->MobileNumber->Required) { ?>
				elm = this.getElements("x" + infix + "_MobileNumber");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->MobileNumber->caption(), $patient_room_grid->MobileNumber->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->HospID->Required) { ?>
				elm = this.getElements("x" + infix + "_HospID");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->HospID->caption(), $patient_room_grid->HospID->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->status->Required) { ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->status->caption(), $patient_room_grid->status->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_status");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($patient_room_grid->status->errorMessage()) ?>");
			<?php if ($patient_room_grid->createdby->Required) { ?>
				elm = this.getElements("x" + infix + "_createdby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->createdby->caption(), $patient_room_grid->createdby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->createddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_createddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->createddatetime->caption(), $patient_room_grid->createddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->modifiedby->Required) { ?>
				elm = this.getElements("x" + infix + "_modifiedby");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->modifiedby->caption(), $patient_room_grid->modifiedby->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($patient_room_grid->modifieddatetime->Required) { ?>
				elm = this.getElements("x" + infix + "_modifieddatetime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $patient_room_grid->modifieddatetime->caption(), $patient_room_grid->modifieddatetime->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
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

	// Form_CustomValidate
	fpatient_roomgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fpatient_roomgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fpatient_roomgrid.lists["x_Reception"] = <?php echo $patient_room_grid->Reception->Lookup->toClientList($patient_room_grid) ?>;
	fpatient_roomgrid.lists["x_Reception"].options = <?php echo JsonEncode($patient_room_grid->Reception->lookupOptions()) ?>;
	fpatient_roomgrid.lists["x_RoomID"] = <?php echo $patient_room_grid->RoomID->Lookup->toClientList($patient_room_grid) ?>;
	fpatient_roomgrid.lists["x_RoomID"].options = <?php echo JsonEncode($patient_room_grid->RoomID->lookupOptions()) ?>;
	loadjs.done("fpatient_roomgrid");
});
</script>
<?php } ?>
<?php
$patient_room_grid->renderOtherOptions();
?>
<?php if ($patient_room_grid->TotalRecords > 0 || $patient_room->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($patient_room_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_room">
<?php if ($patient_room_grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $patient_room_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_roomgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_room" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_roomgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$patient_room->RowType = ROWTYPE_HEADER;

// Render list options
$patient_room_grid->renderListOptions();

// Render list options (header, left)
$patient_room_grid->ListOptions->render("header", "left");
?>
<?php if ($patient_room_grid->id->Visible) { // id ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $patient_room_grid->id->headerCellClass() ?>"><div id="elh_patient_room_id" class="patient_room_id"><div class="ew-table-header-caption"><?php echo $patient_room_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $patient_room_grid->id->headerCellClass() ?>"><div><div id="elh_patient_room_id" class="patient_room_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->Reception->Visible) { // Reception ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->Reception) == "") { ?>
		<th data-name="Reception" class="<?php echo $patient_room_grid->Reception->headerCellClass() ?>"><div id="elh_patient_room_Reception" class="patient_room_Reception"><div class="ew-table-header-caption"><?php echo $patient_room_grid->Reception->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Reception" class="<?php echo $patient_room_grid->Reception->headerCellClass() ?>"><div><div id="elh_patient_room_Reception" class="patient_room_Reception">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->Reception->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->Reception->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->PatientId->Visible) { // PatientId ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->PatientId) == "") { ?>
		<th data-name="PatientId" class="<?php echo $patient_room_grid->PatientId->headerCellClass() ?>"><div id="elh_patient_room_PatientId" class="patient_room_PatientId"><div class="ew-table-header-caption"><?php echo $patient_room_grid->PatientId->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientId" class="<?php echo $patient_room_grid->PatientId->headerCellClass() ?>"><div><div id="elh_patient_room_PatientId" class="patient_room_PatientId">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->PatientId->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->PatientId->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->mrnno->Visible) { // mrnno ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->mrnno) == "") { ?>
		<th data-name="mrnno" class="<?php echo $patient_room_grid->mrnno->headerCellClass() ?>"><div id="elh_patient_room_mrnno" class="patient_room_mrnno"><div class="ew-table-header-caption"><?php echo $patient_room_grid->mrnno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="mrnno" class="<?php echo $patient_room_grid->mrnno->headerCellClass() ?>"><div><div id="elh_patient_room_mrnno" class="patient_room_mrnno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->mrnno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->mrnno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->PatientName->Visible) { // PatientName ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->PatientName) == "") { ?>
		<th data-name="PatientName" class="<?php echo $patient_room_grid->PatientName->headerCellClass() ?>"><div id="elh_patient_room_PatientName" class="patient_room_PatientName"><div class="ew-table-header-caption"><?php echo $patient_room_grid->PatientName->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatientName" class="<?php echo $patient_room_grid->PatientName->headerCellClass() ?>"><div><div id="elh_patient_room_PatientName" class="patient_room_PatientName">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->PatientName->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->PatientName->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->Gender->Visible) { // Gender ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->Gender) == "") { ?>
		<th data-name="Gender" class="<?php echo $patient_room_grid->Gender->headerCellClass() ?>"><div id="elh_patient_room_Gender" class="patient_room_Gender"><div class="ew-table-header-caption"><?php echo $patient_room_grid->Gender->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Gender" class="<?php echo $patient_room_grid->Gender->headerCellClass() ?>"><div><div id="elh_patient_room_Gender" class="patient_room_Gender">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->Gender->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->Gender->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->RoomID->Visible) { // RoomID ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->RoomID) == "") { ?>
		<th data-name="RoomID" class="<?php echo $patient_room_grid->RoomID->headerCellClass() ?>"><div id="elh_patient_room_RoomID" class="patient_room_RoomID"><div class="ew-table-header-caption"><?php echo $patient_room_grid->RoomID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomID" class="<?php echo $patient_room_grid->RoomID->headerCellClass() ?>"><div><div id="elh_patient_room_RoomID" class="patient_room_RoomID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->RoomID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->RoomID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->RoomID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->RoomNo->Visible) { // RoomNo ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->RoomNo) == "") { ?>
		<th data-name="RoomNo" class="<?php echo $patient_room_grid->RoomNo->headerCellClass() ?>"><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo"><div class="ew-table-header-caption"><?php echo $patient_room_grid->RoomNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomNo" class="<?php echo $patient_room_grid->RoomNo->headerCellClass() ?>"><div><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->RoomNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->RoomNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->RoomNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->RoomType->Visible) { // RoomType ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->RoomType) == "") { ?>
		<th data-name="RoomType" class="<?php echo $patient_room_grid->RoomType->headerCellClass() ?>"><div id="elh_patient_room_RoomType" class="patient_room_RoomType"><div class="ew-table-header-caption"><?php echo $patient_room_grid->RoomType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RoomType" class="<?php echo $patient_room_grid->RoomType->headerCellClass() ?>"><div><div id="elh_patient_room_RoomType" class="patient_room_RoomType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->RoomType->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->RoomType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->RoomType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->SharingRoom->Visible) { // SharingRoom ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->SharingRoom) == "") { ?>
		<th data-name="SharingRoom" class="<?php echo $patient_room_grid->SharingRoom->headerCellClass() ?>"><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom"><div class="ew-table-header-caption"><?php echo $patient_room_grid->SharingRoom->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SharingRoom" class="<?php echo $patient_room_grid->SharingRoom->headerCellClass() ?>"><div><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->SharingRoom->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->SharingRoom->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->SharingRoom->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->Amount->Visible) { // Amount ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->Amount) == "") { ?>
		<th data-name="Amount" class="<?php echo $patient_room_grid->Amount->headerCellClass() ?>"><div id="elh_patient_room_Amount" class="patient_room_Amount"><div class="ew-table-header-caption"><?php echo $patient_room_grid->Amount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Amount" class="<?php echo $patient_room_grid->Amount->headerCellClass() ?>"><div><div id="elh_patient_room_Amount" class="patient_room_Amount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->Amount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->Amount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->Startdatetime->Visible) { // Startdatetime ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->Startdatetime) == "") { ?>
		<th data-name="Startdatetime" class="<?php echo $patient_room_grid->Startdatetime->headerCellClass() ?>"><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime"><div class="ew-table-header-caption"><?php echo $patient_room_grid->Startdatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Startdatetime" class="<?php echo $patient_room_grid->Startdatetime->headerCellClass() ?>"><div><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->Startdatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->Startdatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->Startdatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->Enddatetime->Visible) { // Enddatetime ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->Enddatetime) == "") { ?>
		<th data-name="Enddatetime" class="<?php echo $patient_room_grid->Enddatetime->headerCellClass() ?>"><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime"><div class="ew-table-header-caption"><?php echo $patient_room_grid->Enddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Enddatetime" class="<?php echo $patient_room_grid->Enddatetime->headerCellClass() ?>"><div><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->Enddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->Enddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->Enddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->DaysHours->Visible) { // DaysHours ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->DaysHours) == "") { ?>
		<th data-name="DaysHours" class="<?php echo $patient_room_grid->DaysHours->headerCellClass() ?>"><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours"><div class="ew-table-header-caption"><?php echo $patient_room_grid->DaysHours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DaysHours" class="<?php echo $patient_room_grid->DaysHours->headerCellClass() ?>"><div><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->DaysHours->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->DaysHours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->DaysHours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->Days->Visible) { // Days ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->Days) == "") { ?>
		<th data-name="Days" class="<?php echo $patient_room_grid->Days->headerCellClass() ?>"><div id="elh_patient_room_Days" class="patient_room_Days"><div class="ew-table-header-caption"><?php echo $patient_room_grid->Days->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Days" class="<?php echo $patient_room_grid->Days->headerCellClass() ?>"><div><div id="elh_patient_room_Days" class="patient_room_Days">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->Days->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->Days->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->Days->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->Hours->Visible) { // Hours ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->Hours) == "") { ?>
		<th data-name="Hours" class="<?php echo $patient_room_grid->Hours->headerCellClass() ?>"><div id="elh_patient_room_Hours" class="patient_room_Hours"><div class="ew-table-header-caption"><?php echo $patient_room_grid->Hours->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Hours" class="<?php echo $patient_room_grid->Hours->headerCellClass() ?>"><div><div id="elh_patient_room_Hours" class="patient_room_Hours">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->Hours->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->Hours->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->Hours->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->TotalAmount->Visible) { // TotalAmount ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->TotalAmount) == "") { ?>
		<th data-name="TotalAmount" class="<?php echo $patient_room_grid->TotalAmount->headerCellClass() ?>"><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount"><div class="ew-table-header-caption"><?php echo $patient_room_grid->TotalAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TotalAmount" class="<?php echo $patient_room_grid->TotalAmount->headerCellClass() ?>"><div><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->TotalAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->TotalAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->TotalAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->PatID->Visible) { // PatID ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->PatID) == "") { ?>
		<th data-name="PatID" class="<?php echo $patient_room_grid->PatID->headerCellClass() ?>"><div id="elh_patient_room_PatID" class="patient_room_PatID"><div class="ew-table-header-caption"><?php echo $patient_room_grid->PatID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PatID" class="<?php echo $patient_room_grid->PatID->headerCellClass() ?>"><div><div id="elh_patient_room_PatID" class="patient_room_PatID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->PatID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->PatID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->MobileNumber->Visible) { // MobileNumber ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->MobileNumber) == "") { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_room_grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber"><div class="ew-table-header-caption"><?php echo $patient_room_grid->MobileNumber->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="MobileNumber" class="<?php echo $patient_room_grid->MobileNumber->headerCellClass() ?>"><div><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->MobileNumber->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->MobileNumber->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->HospID->Visible) { // HospID ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->HospID) == "") { ?>
		<th data-name="HospID" class="<?php echo $patient_room_grid->HospID->headerCellClass() ?>"><div id="elh_patient_room_HospID" class="patient_room_HospID"><div class="ew-table-header-caption"><?php echo $patient_room_grid->HospID->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HospID" class="<?php echo $patient_room_grid->HospID->headerCellClass() ?>"><div><div id="elh_patient_room_HospID" class="patient_room_HospID">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->HospID->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->HospID->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->status->Visible) { // status ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->status) == "") { ?>
		<th data-name="status" class="<?php echo $patient_room_grid->status->headerCellClass() ?>"><div id="elh_patient_room_status" class="patient_room_status"><div class="ew-table-header-caption"><?php echo $patient_room_grid->status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="status" class="<?php echo $patient_room_grid->status->headerCellClass() ?>"><div><div id="elh_patient_room_status" class="patient_room_status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->createdby->Visible) { // createdby ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->createdby) == "") { ?>
		<th data-name="createdby" class="<?php echo $patient_room_grid->createdby->headerCellClass() ?>"><div id="elh_patient_room_createdby" class="patient_room_createdby"><div class="ew-table-header-caption"><?php echo $patient_room_grid->createdby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createdby" class="<?php echo $patient_room_grid->createdby->headerCellClass() ?>"><div><div id="elh_patient_room_createdby" class="patient_room_createdby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->createdby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->createdby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->createddatetime->Visible) { // createddatetime ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->createddatetime) == "") { ?>
		<th data-name="createddatetime" class="<?php echo $patient_room_grid->createddatetime->headerCellClass() ?>"><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime"><div class="ew-table-header-caption"><?php echo $patient_room_grid->createddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="createddatetime" class="<?php echo $patient_room_grid->createddatetime->headerCellClass() ?>"><div><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->createddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->createddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->modifiedby->Visible) { // modifiedby ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->modifiedby) == "") { ?>
		<th data-name="modifiedby" class="<?php echo $patient_room_grid->modifiedby->headerCellClass() ?>"><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby"><div class="ew-table-header-caption"><?php echo $patient_room_grid->modifiedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifiedby" class="<?php echo $patient_room_grid->modifiedby->headerCellClass() ?>"><div><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->modifiedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->modifiedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($patient_room_grid->modifieddatetime->Visible) { // modifieddatetime ?>
	<?php if ($patient_room_grid->SortUrl($patient_room_grid->modifieddatetime) == "") { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_room_grid->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime"><div class="ew-table-header-caption"><?php echo $patient_room_grid->modifieddatetime->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="modifieddatetime" class="<?php echo $patient_room_grid->modifieddatetime->headerCellClass() ?>"><div><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $patient_room_grid->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($patient_room_grid->modifieddatetime->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($patient_room_grid->modifieddatetime->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
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
$patient_room_grid->StartRecord = 1;
$patient_room_grid->StopRecord = $patient_room_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($patient_room->isConfirm() || $patient_room_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($patient_room_grid->FormKeyCountName) && ($patient_room_grid->isGridAdd() || $patient_room_grid->isGridEdit() || $patient_room->isConfirm())) {
		$patient_room_grid->KeyCount = $CurrentForm->getValue($patient_room_grid->FormKeyCountName);
		$patient_room_grid->StopRecord = $patient_room_grid->StartRecord + $patient_room_grid->KeyCount - 1;
	}
}
$patient_room_grid->RecordCount = $patient_room_grid->StartRecord - 1;
if ($patient_room_grid->Recordset && !$patient_room_grid->Recordset->EOF) {
	$patient_room_grid->Recordset->moveFirst();
	$selectLimit = $patient_room_grid->UseSelectLimit;
	if (!$selectLimit && $patient_room_grid->StartRecord > 1)
		$patient_room_grid->Recordset->move($patient_room_grid->StartRecord - 1);
} elseif (!$patient_room->AllowAddDeleteRow && $patient_room_grid->StopRecord == 0) {
	$patient_room_grid->StopRecord = $patient_room->GridAddRowCount;
}

// Initialize aggregate
$patient_room->RowType = ROWTYPE_AGGREGATEINIT;
$patient_room->resetAttributes();
$patient_room_grid->renderRow();
if ($patient_room_grid->isGridAdd())
	$patient_room_grid->RowIndex = 0;
if ($patient_room_grid->isGridEdit())
	$patient_room_grid->RowIndex = 0;
while ($patient_room_grid->RecordCount < $patient_room_grid->StopRecord) {
	$patient_room_grid->RecordCount++;
	if ($patient_room_grid->RecordCount >= $patient_room_grid->StartRecord) {
		$patient_room_grid->RowCount++;
		if ($patient_room_grid->isGridAdd() || $patient_room_grid->isGridEdit() || $patient_room->isConfirm()) {
			$patient_room_grid->RowIndex++;
			$CurrentForm->Index = $patient_room_grid->RowIndex;
			if ($CurrentForm->hasValue($patient_room_grid->FormActionName) && ($patient_room->isConfirm() || $patient_room_grid->EventCancelled))
				$patient_room_grid->RowAction = strval($CurrentForm->getValue($patient_room_grid->FormActionName));
			elseif ($patient_room_grid->isGridAdd())
				$patient_room_grid->RowAction = "insert";
			else
				$patient_room_grid->RowAction = "";
		}

		// Set up key count
		$patient_room_grid->KeyCount = $patient_room_grid->RowIndex;

		// Init row class and style
		$patient_room->resetAttributes();
		$patient_room->CssClass = "";
		if ($patient_room_grid->isGridAdd()) {
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
		if ($patient_room_grid->isGridAdd()) // Grid add
			$patient_room->RowType = ROWTYPE_ADD; // Render add
		if ($patient_room_grid->isGridAdd() && $patient_room->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$patient_room_grid->restoreCurrentRowFormValues($patient_room_grid->RowIndex); // Restore form values
		if ($patient_room_grid->isGridEdit()) { // Grid edit
			if ($patient_room->EventCancelled)
				$patient_room_grid->restoreCurrentRowFormValues($patient_room_grid->RowIndex); // Restore form values
			if ($patient_room_grid->RowAction == "insert")
				$patient_room->RowType = ROWTYPE_ADD; // Render add
			else
				$patient_room->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($patient_room_grid->isGridEdit() && ($patient_room->RowType == ROWTYPE_EDIT || $patient_room->RowType == ROWTYPE_ADD) && $patient_room->EventCancelled) // Update failed
			$patient_room_grid->restoreCurrentRowFormValues($patient_room_grid->RowIndex); // Restore form values
		if ($patient_room->RowType == ROWTYPE_EDIT) // Edit row
			$patient_room_grid->EditRowCount++;
		if ($patient_room->isConfirm()) // Confirm row
			$patient_room_grid->restoreCurrentRowFormValues($patient_room_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$patient_room->RowAttrs->merge(["data-rowindex" => $patient_room_grid->RowCount, "id" => "r" . $patient_room_grid->RowCount . "_patient_room", "data-rowtype" => $patient_room->RowType]);

		// Render row
		$patient_room_grid->renderRow();

		// Render list options
		$patient_room_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($patient_room_grid->RowAction != "delete" && $patient_room_grid->RowAction != "insertdelete" && !($patient_room_grid->RowAction == "insert" && $patient_room->isConfirm() && $patient_room_grid->emptyRow())) {
?>
	<tr <?php echo $patient_room->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_room_grid->ListOptions->render("body", "left", $patient_room_grid->RowCount);
?>
	<?php if ($patient_room_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $patient_room_grid->id->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_id" class="form-group"></span>
<input type="hidden" data-table="patient_room" data-field="x_id" name="o<?php echo $patient_room_grid->RowIndex ?>_id" id="o<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_id" class="form-group">
<span<?php echo $patient_room_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_id" name="x<?php echo $patient_room_grid->RowIndex ?>_id" id="x<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_id">
<span<?php echo $patient_room_grid->id->viewAttributes() ?>><?php echo $patient_room_grid->id->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_id" name="x<?php echo $patient_room_grid->RowIndex ?>_id" id="x<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_id" name="o<?php echo $patient_room_grid->RowIndex ?>_id" id="o<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_id" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_id" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room_grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_id" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_id" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception" <?php echo $patient_room_grid->Reception->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_room_grid->Reception->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Reception" class="form-group">
<span<?php echo $patient_room_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Reception" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_Reception"><?php echo EmptyValue(strval($patient_room_grid->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_room_grid->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room_grid->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_room_grid->Reception->ReadOnly || $patient_room_grid->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room_grid->Reception->Lookup->getParamTag($patient_room_grid, "p_x" . $patient_room_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room_grid->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo $patient_room_grid->Reception->CurrentValue ?>"<?php echo $patient_room_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="o<?php echo $patient_room_grid->RowIndex ?>_Reception" id="o<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Reception" class="form-group">
<span<?php echo $patient_room_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Reception->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Reception">
<span<?php echo $patient_room_grid->Reception->viewAttributes() ?>><?php echo $patient_room_grid->Reception->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="o<?php echo $patient_room_grid->RowIndex ?>_Reception" id="o<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Reception" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId" <?php echo $patient_room_grid->PatientId->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatientId" class="form-group">
<input type="text" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->PatientId->EditValue ?>"<?php echo $patient_room_grid->PatientId->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatientId" class="form-group">
<span<?php echo $patient_room_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->PatientId->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room_grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatientId">
<span<?php echo $patient_room_grid->PatientId->viewAttributes() ?>><?php echo $patient_room_grid->PatientId->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room_grid->PatientId->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room_grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room_grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno" <?php echo $patient_room_grid->mrnno->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_room_grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_mrnno" class="form-group">
<span<?php echo $patient_room_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_mrnno" class="form-group">
<input type="text" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->mrnno->EditValue ?>"<?php echo $patient_room_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_mrnno" class="form-group">
<span<?php echo $patient_room_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->mrnno->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_mrnno">
<span<?php echo $patient_room_grid->mrnno->viewAttributes() ?>><?php echo $patient_room_grid->mrnno->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName" <?php echo $patient_room_grid->PatientName->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatientName" class="form-group">
<input type="text" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->PatientName->EditValue ?>"<?php echo $patient_room_grid->PatientName->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatientName" class="form-group">
<input type="text" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->PatientName->EditValue ?>"<?php echo $patient_room_grid->PatientName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatientName">
<span<?php echo $patient_room_grid->PatientName->viewAttributes() ?>><?php echo $patient_room_grid->PatientName->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room_grid->PatientName->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room_grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room_grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender" <?php echo $patient_room_grid->Gender->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Gender" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Gender->EditValue ?>"<?php echo $patient_room_grid->Gender->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="o<?php echo $patient_room_grid->RowIndex ?>_Gender" id="o<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room_grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Gender" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Gender->EditValue ?>"<?php echo $patient_room_grid->Gender->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Gender">
<span<?php echo $patient_room_grid->Gender->viewAttributes() ?>><?php echo $patient_room_grid->Gender->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="o<?php echo $patient_room_grid->RowIndex ?>_Gender" id="o<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room_grid->Gender->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room_grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Gender" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room_grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->RoomID->Visible) { // RoomID ?>
		<td data-name="RoomID" <?php echo $patient_room_grid->RoomID->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomID" class="form-group">
<?php $patient_room_grid->RoomID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_RoomID"><?php echo EmptyValue(strval($patient_room_grid->RoomID->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_room_grid->RoomID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room_grid->RoomID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_room_grid->RoomID->ReadOnly || $patient_room_grid->RoomID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room_grid->RoomID->Lookup->getParamTag($patient_room_grid, "p_x" . $patient_room_grid->RowIndex . "_RoomID") ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room_grid->RoomID->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo $patient_room_grid->RoomID->CurrentValue ?>"<?php echo $patient_room_grid->RoomID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room_grid->RoomID->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomID" class="form-group">
<?php $patient_room_grid->RoomID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_RoomID"><?php echo EmptyValue(strval($patient_room_grid->RoomID->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_room_grid->RoomID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room_grid->RoomID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_room_grid->RoomID->ReadOnly || $patient_room_grid->RoomID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room_grid->RoomID->Lookup->getParamTag($patient_room_grid, "p_x" . $patient_room_grid->RowIndex . "_RoomID") ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room_grid->RoomID->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo $patient_room_grid->RoomID->CurrentValue ?>"<?php echo $patient_room_grid->RoomID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomID">
<span<?php echo $patient_room_grid->RoomID->viewAttributes() ?>><?php echo $patient_room_grid->RoomID->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room_grid->RoomID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room_grid->RoomID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room_grid->RoomID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room_grid->RoomID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->RoomNo->Visible) { // RoomNo ?>
		<td data-name="RoomNo" <?php echo $patient_room_grid->RoomNo->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomNo" class="form-group">
<input type="text" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->RoomNo->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->RoomNo->EditValue ?>"<?php echo $patient_room_grid->RoomNo->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room_grid->RoomNo->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomNo" class="form-group">
<input type="text" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->RoomNo->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->RoomNo->EditValue ?>"<?php echo $patient_room_grid->RoomNo->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomNo">
<span<?php echo $patient_room_grid->RoomNo->viewAttributes() ?>><?php echo $patient_room_grid->RoomNo->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room_grid->RoomNo->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room_grid->RoomNo->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room_grid->RoomNo->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room_grid->RoomNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->RoomType->Visible) { // RoomType ?>
		<td data-name="RoomType" <?php echo $patient_room_grid->RoomType->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomType" class="form-group">
<input type="text" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->RoomType->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->RoomType->EditValue ?>"<?php echo $patient_room_grid->RoomType->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room_grid->RoomType->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomType" class="form-group">
<input type="text" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->RoomType->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->RoomType->EditValue ?>"<?php echo $patient_room_grid->RoomType->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_RoomType">
<span<?php echo $patient_room_grid->RoomType->viewAttributes() ?>><?php echo $patient_room_grid->RoomType->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room_grid->RoomType->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room_grid->RoomType->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room_grid->RoomType->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room_grid->RoomType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->SharingRoom->Visible) { // SharingRoom ?>
		<td data-name="SharingRoom" <?php echo $patient_room_grid->SharingRoom->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_SharingRoom" class="form-group">
<input type="text" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->SharingRoom->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->SharingRoom->EditValue ?>"<?php echo $patient_room_grid->SharingRoom->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room_grid->SharingRoom->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_SharingRoom" class="form-group">
<input type="text" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->SharingRoom->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->SharingRoom->EditValue ?>"<?php echo $patient_room_grid->SharingRoom->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_SharingRoom">
<span<?php echo $patient_room_grid->SharingRoom->viewAttributes() ?>><?php echo $patient_room_grid->SharingRoom->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room_grid->SharingRoom->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room_grid->SharingRoom->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room_grid->SharingRoom->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room_grid->SharingRoom->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Amount->Visible) { // Amount ?>
		<td data-name="Amount" <?php echo $patient_room_grid->Amount->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Amount" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Amount->EditValue ?>"<?php echo $patient_room_grid->Amount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="o<?php echo $patient_room_grid->RowIndex ?>_Amount" id="o<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room_grid->Amount->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Amount" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Amount->EditValue ?>"<?php echo $patient_room_grid->Amount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Amount">
<span<?php echo $patient_room_grid->Amount->viewAttributes() ?>><?php echo $patient_room_grid->Amount->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room_grid->Amount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="o<?php echo $patient_room_grid->RowIndex ?>_Amount" id="o<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room_grid->Amount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room_grid->Amount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Amount" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room_grid->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Startdatetime->Visible) { // Startdatetime ?>
		<td data-name="Startdatetime" <?php echo $patient_room_grid->Startdatetime->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Startdatetime" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" placeholder="<?php echo HtmlEncode($patient_room_grid->Startdatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Startdatetime->EditValue ?>"<?php echo $patient_room_grid->Startdatetime->editAttributes() ?>>
<?php if (!$patient_room_grid->Startdatetime->ReadOnly && !$patient_room_grid->Startdatetime->Disabled && !isset($patient_room_grid->Startdatetime->EditAttrs["readonly"]) && !isset($patient_room_grid->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room_grid->Startdatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Startdatetime" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" placeholder="<?php echo HtmlEncode($patient_room_grid->Startdatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Startdatetime->EditValue ?>"<?php echo $patient_room_grid->Startdatetime->editAttributes() ?>>
<?php if (!$patient_room_grid->Startdatetime->ReadOnly && !$patient_room_grid->Startdatetime->Disabled && !isset($patient_room_grid->Startdatetime->EditAttrs["readonly"]) && !isset($patient_room_grid->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Startdatetime">
<span<?php echo $patient_room_grid->Startdatetime->viewAttributes() ?>><?php echo $patient_room_grid->Startdatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room_grid->Startdatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room_grid->Startdatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room_grid->Startdatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room_grid->Startdatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Enddatetime->Visible) { // Enddatetime ?>
		<td data-name="Enddatetime" <?php echo $patient_room_grid->Enddatetime->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Enddatetime" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" placeholder="<?php echo HtmlEncode($patient_room_grid->Enddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Enddatetime->EditValue ?>"<?php echo $patient_room_grid->Enddatetime->editAttributes() ?>>
<?php if (!$patient_room_grid->Enddatetime->ReadOnly && !$patient_room_grid->Enddatetime->Disabled && !isset($patient_room_grid->Enddatetime->EditAttrs["readonly"]) && !isset($patient_room_grid->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room_grid->Enddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Enddatetime" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" placeholder="<?php echo HtmlEncode($patient_room_grid->Enddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Enddatetime->EditValue ?>"<?php echo $patient_room_grid->Enddatetime->editAttributes() ?>>
<?php if (!$patient_room_grid->Enddatetime->ReadOnly && !$patient_room_grid->Enddatetime->Disabled && !isset($patient_room_grid->Enddatetime->EditAttrs["readonly"]) && !isset($patient_room_grid->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Enddatetime">
<span<?php echo $patient_room_grid->Enddatetime->viewAttributes() ?>><?php echo $patient_room_grid->Enddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room_grid->Enddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room_grid->Enddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room_grid->Enddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room_grid->Enddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->DaysHours->Visible) { // DaysHours ?>
		<td data-name="DaysHours" <?php echo $patient_room_grid->DaysHours->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_DaysHours" class="form-group">
<input type="text" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->DaysHours->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->DaysHours->EditValue ?>"<?php echo $patient_room_grid->DaysHours->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room_grid->DaysHours->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_DaysHours" class="form-group">
<input type="text" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->DaysHours->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->DaysHours->EditValue ?>"<?php echo $patient_room_grid->DaysHours->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_DaysHours">
<span<?php echo $patient_room_grid->DaysHours->viewAttributes() ?>><?php echo $patient_room_grid->DaysHours->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room_grid->DaysHours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room_grid->DaysHours->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room_grid->DaysHours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room_grid->DaysHours->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Days->Visible) { // Days ?>
		<td data-name="Days" <?php echo $patient_room_grid->Days->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Days" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Days->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Days->EditValue ?>"<?php echo $patient_room_grid->Days->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="o<?php echo $patient_room_grid->RowIndex ?>_Days" id="o<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room_grid->Days->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Days" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Days->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Days->EditValue ?>"<?php echo $patient_room_grid->Days->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Days">
<span<?php echo $patient_room_grid->Days->viewAttributes() ?>><?php echo $patient_room_grid->Days->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room_grid->Days->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Days" name="o<?php echo $patient_room_grid->RowIndex ?>_Days" id="o<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room_grid->Days->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Days" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room_grid->Days->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Days" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Days" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room_grid->Days->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Hours->Visible) { // Hours ?>
		<td data-name="Hours" <?php echo $patient_room_grid->Hours->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Hours" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Hours->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Hours->EditValue ?>"<?php echo $patient_room_grid->Hours->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="o<?php echo $patient_room_grid->RowIndex ?>_Hours" id="o<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room_grid->Hours->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Hours" class="form-group">
<input type="text" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Hours->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Hours->EditValue ?>"<?php echo $patient_room_grid->Hours->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_Hours">
<span<?php echo $patient_room_grid->Hours->viewAttributes() ?>><?php echo $patient_room_grid->Hours->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room_grid->Hours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="o<?php echo $patient_room_grid->RowIndex ?>_Hours" id="o<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room_grid->Hours->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room_grid->Hours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Hours" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room_grid->Hours->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount" <?php echo $patient_room_grid->TotalAmount->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_TotalAmount" class="form-group">
<input type="text" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->TotalAmount->EditValue ?>"<?php echo $patient_room_grid->TotalAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room_grid->TotalAmount->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_TotalAmount" class="form-group">
<input type="text" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->TotalAmount->EditValue ?>"<?php echo $patient_room_grid->TotalAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_TotalAmount">
<span<?php echo $patient_room_grid->TotalAmount->viewAttributes() ?>><?php echo $patient_room_grid->TotalAmount->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room_grid->TotalAmount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room_grid->TotalAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room_grid->TotalAmount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room_grid->TotalAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID" <?php echo $patient_room_grid->PatID->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($patient_room_grid->PatID->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatID" class="form-group">
<span<?php echo $patient_room_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatID" class="form-group">
<input type="text" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->PatID->EditValue ?>"<?php echo $patient_room_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="o<?php echo $patient_room_grid->RowIndex ?>_PatID" id="o<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($patient_room_grid->PatID->getSessionValue() != "") { ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatID" class="form-group">
<span<?php echo $patient_room_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatID" class="form-group">
<input type="text" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->PatID->EditValue ?>"<?php echo $patient_room_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_PatID">
<span<?php echo $patient_room_grid->PatID->viewAttributes() ?>><?php echo $patient_room_grid->PatID->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="o<?php echo $patient_room_grid->RowIndex ?>_PatID" id="o<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatID" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber" <?php echo $patient_room_grid->MobileNumber->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_MobileNumber" class="form-group">
<input type="text" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->MobileNumber->EditValue ?>"<?php echo $patient_room_grid->MobileNumber->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_MobileNumber" class="form-group">
<input type="text" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->MobileNumber->EditValue ?>"<?php echo $patient_room_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_MobileNumber">
<span<?php echo $patient_room_grid->MobileNumber->viewAttributes() ?>><?php echo $patient_room_grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room_grid->MobileNumber->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room_grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room_grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID" <?php echo $patient_room_grid->HospID->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="o<?php echo $patient_room_grid->RowIndex ?>_HospID" id="o<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room_grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_HospID">
<span<?php echo $patient_room_grid->HospID->viewAttributes() ?>><?php echo $patient_room_grid->HospID->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="x<?php echo $patient_room_grid->RowIndex ?>_HospID" id="x<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="o<?php echo $patient_room_grid->RowIndex ?>_HospID" id="o<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room_grid->HospID->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_HospID" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room_grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_HospID" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room_grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->status->Visible) { // status ?>
		<td data-name="status" <?php echo $patient_room_grid->status->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_status" class="form-group">
<input type="text" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->status->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->status->EditValue ?>"<?php echo $patient_room_grid->status->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_status" name="o<?php echo $patient_room_grid->RowIndex ?>_status" id="o<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room_grid->status->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_status" class="form-group">
<input type="text" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->status->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->status->EditValue ?>"<?php echo $patient_room_grid->status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_status">
<span<?php echo $patient_room_grid->status->viewAttributes() ?>><?php echo $patient_room_grid->status->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_status" name="o<?php echo $patient_room_grid->RowIndex ?>_status" id="o<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room_grid->status->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_status" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_status" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room_grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_status" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_status" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room_grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby" <?php echo $patient_room_grid->createdby->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="o<?php echo $patient_room_grid->RowIndex ?>_createdby" id="o<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room_grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_createdby">
<span<?php echo $patient_room_grid->createdby->viewAttributes() ?>><?php echo $patient_room_grid->createdby->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="x<?php echo $patient_room_grid->RowIndex ?>_createdby" id="x<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="o<?php echo $patient_room_grid->RowIndex ?>_createdby" id="o<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room_grid->createdby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_createdby" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room_grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_createdby" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room_grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime" <?php echo $patient_room_grid->createddatetime->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_createddatetime">
<span<?php echo $patient_room_grid->createddatetime->viewAttributes() ?>><?php echo $patient_room_grid->createddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room_grid->createddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room_grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room_grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby" <?php echo $patient_room_grid->modifiedby->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_modifiedby">
<span<?php echo $patient_room_grid->modifiedby->viewAttributes() ?>><?php echo $patient_room_grid->modifiedby->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room_grid->modifiedby->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room_grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room_grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($patient_room_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime" <?php echo $patient_room_grid->modifieddatetime->cellAttributes() ?>>
<?php if ($patient_room->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($patient_room->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $patient_room_grid->RowCount ?>_patient_room_modifieddatetime">
<span<?php echo $patient_room_grid->modifieddatetime->viewAttributes() ?>><?php echo $patient_room_grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if (!$patient_room->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room_grid->modifieddatetime->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="fpatient_roomgrid$x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room_grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="fpatient_roomgrid$o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room_grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_room_grid->ListOptions->render("body", "right", $patient_room_grid->RowCount);
?>
	</tr>
<?php if ($patient_room->RowType == ROWTYPE_ADD || $patient_room->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "load"], function() {
	fpatient_roomgrid.updateLists(<?php echo $patient_room_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$patient_room_grid->isGridAdd() || $patient_room->CurrentMode == "copy")
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
		$patient_room->RowAttrs->merge(["data-rowindex" => $patient_room_grid->RowIndex, "id" => "r0_patient_room", "data-rowtype" => ROWTYPE_ADD]);
		$patient_room->RowAttrs->appendClass("ew-template");
		$patient_room->RowType = ROWTYPE_ADD;

		// Render row
		$patient_room_grid->renderRow();

		// Render list options
		$patient_room_grid->renderListOptions();
		$patient_room_grid->StartRowCount = 0;
?>
	<tr <?php echo $patient_room->rowAttributes() ?>>
<?php

// Render list options (body, left)
$patient_room_grid->ListOptions->render("body", "left", $patient_room_grid->RowIndex);
?>
	<?php if ($patient_room_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_id" class="form-group patient_room_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_id" class="form-group patient_room_id">
<span<?php echo $patient_room_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_id" name="x<?php echo $patient_room_grid->RowIndex ?>_id" id="x<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_id" name="o<?php echo $patient_room_grid->RowIndex ?>_id" id="o<?php echo $patient_room_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($patient_room_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Reception->Visible) { // Reception ?>
		<td data-name="Reception">
<?php if (!$patient_room->isConfirm()) { ?>
<?php if ($patient_room_grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<span<?php echo $patient_room_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_Reception"><?php echo EmptyValue(strval($patient_room_grid->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_room_grid->Reception->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room_grid->Reception->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_room_grid->Reception->ReadOnly || $patient_room_grid->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room_grid->Reception->Lookup->getParamTag($patient_room_grid, "p_x" . $patient_room_grid->RowIndex . "_Reception") ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room_grid->Reception->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo $patient_room_grid->Reception->CurrentValue ?>"<?php echo $patient_room_grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<span<?php echo $patient_room_grid->Reception->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Reception->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="x<?php echo $patient_room_grid->RowIndex ?>_Reception" id="x<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" name="o<?php echo $patient_room_grid->RowIndex ?>_Reception" id="o<?php echo $patient_room_grid->RowIndex ?>_Reception" value="<?php echo HtmlEncode($patient_room_grid->Reception->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->PatientId->Visible) { // PatientId ?>
		<td data-name="PatientId">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_PatientId" class="form-group patient_room_PatientId">
<input type="text" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->PatientId->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->PatientId->EditValue ?>"<?php echo $patient_room_grid->PatientId->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatientId" class="form-group patient_room_PatientId">
<span<?php echo $patient_room_grid->PatientId->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->PatientId->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room_grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientId" value="<?php echo HtmlEncode($patient_room_grid->PatientId->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->mrnno->Visible) { // mrnno ?>
		<td data-name="mrnno">
<?php if (!$patient_room->isConfirm()) { ?>
<?php if ($patient_room_grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<span<?php echo $patient_room_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<input type="text" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->mrnno->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->mrnno->EditValue ?>"<?php echo $patient_room_grid->mrnno->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<span<?php echo $patient_room_grid->mrnno->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->mrnno->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="x<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" name="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" id="o<?php echo $patient_room_grid->RowIndex ?>_mrnno" value="<?php echo HtmlEncode($patient_room_grid->mrnno->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->PatientName->Visible) { // PatientName ?>
		<td data-name="PatientName">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_PatientName" class="form-group patient_room_PatientName">
<input type="text" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->PatientName->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->PatientName->EditValue ?>"<?php echo $patient_room_grid->PatientName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatientName" class="form-group patient_room_PatientName">
<span<?php echo $patient_room_grid->PatientName->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->PatientName->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="x<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room_grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" name="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" id="o<?php echo $patient_room_grid->RowIndex ?>_PatientName" value="<?php echo HtmlEncode($patient_room_grid->PatientName->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Gender->Visible) { // Gender ?>
		<td data-name="Gender">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Gender" class="form-group patient_room_Gender">
<input type="text" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->Gender->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Gender->EditValue ?>"<?php echo $patient_room_grid->Gender->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Gender" class="form-group patient_room_Gender">
<span<?php echo $patient_room_grid->Gender->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Gender->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="x<?php echo $patient_room_grid->RowIndex ?>_Gender" id="x<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room_grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Gender" name="o<?php echo $patient_room_grid->RowIndex ?>_Gender" id="o<?php echo $patient_room_grid->RowIndex ?>_Gender" value="<?php echo HtmlEncode($patient_room_grid->Gender->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->RoomID->Visible) { // RoomID ?>
		<td data-name="RoomID">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomID" class="form-group patient_room_RoomID">
<?php $patient_room_grid->RoomID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $patient_room_grid->RowIndex ?>_RoomID"><?php echo EmptyValue(strval($patient_room_grid->RoomID->ViewValue)) ? $Language->phrase("PleaseSelect") : $patient_room_grid->RoomID->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($patient_room_grid->RoomID->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($patient_room_grid->RoomID->ReadOnly || $patient_room_grid->RoomID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $patient_room_grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $patient_room_grid->RoomID->Lookup->getParamTag($patient_room_grid, "p_x" . $patient_room_grid->RowIndex . "_RoomID") ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $patient_room_grid->RoomID->displayValueSeparatorAttribute() ?>" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo $patient_room_grid->RoomID->CurrentValue ?>"<?php echo $patient_room_grid->RoomID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomID" class="form-group patient_room_RoomID">
<span<?php echo $patient_room_grid->RoomID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->RoomID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room_grid->RoomID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomID" value="<?php echo HtmlEncode($patient_room_grid->RoomID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->RoomNo->Visible) { // RoomNo ?>
		<td data-name="RoomNo">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomNo" class="form-group patient_room_RoomNo">
<input type="text" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->RoomNo->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->RoomNo->EditValue ?>"<?php echo $patient_room_grid->RoomNo->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomNo" class="form-group patient_room_RoomNo">
<span<?php echo $patient_room_grid->RoomNo->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->RoomNo->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room_grid->RoomNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomNo" value="<?php echo HtmlEncode($patient_room_grid->RoomNo->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->RoomType->Visible) { // RoomType ?>
		<td data-name="RoomType">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomType" class="form-group patient_room_RoomType">
<input type="text" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->RoomType->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->RoomType->EditValue ?>"<?php echo $patient_room_grid->RoomType->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomType" class="form-group patient_room_RoomType">
<span<?php echo $patient_room_grid->RoomType->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->RoomType->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="x<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room_grid->RoomType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" name="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" id="o<?php echo $patient_room_grid->RowIndex ?>_RoomType" value="<?php echo HtmlEncode($patient_room_grid->RoomType->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->SharingRoom->Visible) { // SharingRoom ?>
		<td data-name="SharingRoom">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_SharingRoom" class="form-group patient_room_SharingRoom">
<input type="text" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->SharingRoom->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->SharingRoom->EditValue ?>"<?php echo $patient_room_grid->SharingRoom->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_SharingRoom" class="form-group patient_room_SharingRoom">
<span<?php echo $patient_room_grid->SharingRoom->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->SharingRoom->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="x<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room_grid->SharingRoom->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" name="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" id="o<?php echo $patient_room_grid->RowIndex ?>_SharingRoom" value="<?php echo HtmlEncode($patient_room_grid->SharingRoom->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Amount->Visible) { // Amount ?>
		<td data-name="Amount">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Amount" class="form-group patient_room_Amount">
<input type="text" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Amount->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Amount->EditValue ?>"<?php echo $patient_room_grid->Amount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Amount" class="form-group patient_room_Amount">
<span<?php echo $patient_room_grid->Amount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Amount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="x<?php echo $patient_room_grid->RowIndex ?>_Amount" id="x<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room_grid->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Amount" name="o<?php echo $patient_room_grid->RowIndex ?>_Amount" id="o<?php echo $patient_room_grid->RowIndex ?>_Amount" value="<?php echo HtmlEncode($patient_room_grid->Amount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Startdatetime->Visible) { // Startdatetime ?>
		<td data-name="Startdatetime">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Startdatetime" class="form-group patient_room_Startdatetime">
<input type="text" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" placeholder="<?php echo HtmlEncode($patient_room_grid->Startdatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Startdatetime->EditValue ?>"<?php echo $patient_room_grid->Startdatetime->editAttributes() ?>>
<?php if (!$patient_room_grid->Startdatetime->ReadOnly && !$patient_room_grid->Startdatetime->Disabled && !isset($patient_room_grid->Startdatetime->EditAttrs["readonly"]) && !isset($patient_room_grid->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Startdatetime" class="form-group patient_room_Startdatetime">
<span<?php echo $patient_room_grid->Startdatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Startdatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room_grid->Startdatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Startdatetime" value="<?php echo HtmlEncode($patient_room_grid->Startdatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Enddatetime->Visible) { // Enddatetime ?>
		<td data-name="Enddatetime">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Enddatetime" class="form-group patient_room_Enddatetime">
<input type="text" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" placeholder="<?php echo HtmlEncode($patient_room_grid->Enddatetime->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Enddatetime->EditValue ?>"<?php echo $patient_room_grid->Enddatetime->editAttributes() ?>>
<?php if (!$patient_room_grid->Enddatetime->ReadOnly && !$patient_room_grid->Enddatetime->Disabled && !isset($patient_room_grid->Enddatetime->EditAttrs["readonly"]) && !isset($patient_room_grid->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
	ew.createDateTimePicker("fpatient_roomgrid", "x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Enddatetime" class="form-group patient_room_Enddatetime">
<span<?php echo $patient_room_grid->Enddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Enddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room_grid->Enddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_Enddatetime" value="<?php echo HtmlEncode($patient_room_grid->Enddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->DaysHours->Visible) { // DaysHours ?>
		<td data-name="DaysHours">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_DaysHours" class="form-group patient_room_DaysHours">
<input type="text" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->DaysHours->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->DaysHours->EditValue ?>"<?php echo $patient_room_grid->DaysHours->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_DaysHours" class="form-group patient_room_DaysHours">
<span<?php echo $patient_room_grid->DaysHours->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->DaysHours->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="x<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room_grid->DaysHours->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" name="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" id="o<?php echo $patient_room_grid->RowIndex ?>_DaysHours" value="<?php echo HtmlEncode($patient_room_grid->DaysHours->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Days->Visible) { // Days ?>
		<td data-name="Days">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Days" class="form-group patient_room_Days">
<input type="text" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Days->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Days->EditValue ?>"<?php echo $patient_room_grid->Days->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Days" class="form-group patient_room_Days">
<span<?php echo $patient_room_grid->Days->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Days->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="x<?php echo $patient_room_grid->RowIndex ?>_Days" id="x<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room_grid->Days->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Days" name="o<?php echo $patient_room_grid->RowIndex ?>_Days" id="o<?php echo $patient_room_grid->RowIndex ?>_Days" value="<?php echo HtmlEncode($patient_room_grid->Days->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->Hours->Visible) { // Hours ?>
		<td data-name="Hours">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Hours" class="form-group patient_room_Hours">
<input type="text" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->Hours->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->Hours->EditValue ?>"<?php echo $patient_room_grid->Hours->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Hours" class="form-group patient_room_Hours">
<span<?php echo $patient_room_grid->Hours->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->Hours->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="x<?php echo $patient_room_grid->RowIndex ?>_Hours" id="x<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room_grid->Hours->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Hours" name="o<?php echo $patient_room_grid->RowIndex ?>_Hours" id="o<?php echo $patient_room_grid->RowIndex ?>_Hours" value="<?php echo HtmlEncode($patient_room_grid->Hours->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->TotalAmount->Visible) { // TotalAmount ?>
		<td data-name="TotalAmount">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_TotalAmount" class="form-group patient_room_TotalAmount">
<input type="text" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->TotalAmount->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->TotalAmount->EditValue ?>"<?php echo $patient_room_grid->TotalAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_TotalAmount" class="form-group patient_room_TotalAmount">
<span<?php echo $patient_room_grid->TotalAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->TotalAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="x<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room_grid->TotalAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" name="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" id="o<?php echo $patient_room_grid->RowIndex ?>_TotalAmount" value="<?php echo HtmlEncode($patient_room_grid->TotalAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->PatID->Visible) { // PatID ?>
		<td data-name="PatID">
<?php if (!$patient_room->isConfirm()) { ?>
<?php if ($patient_room_grid->PatID->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<span<?php echo $patient_room_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<input type="text" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->PatID->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->PatID->EditValue ?>"<?php echo $patient_room_grid->PatID->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<span<?php echo $patient_room_grid->PatID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->PatID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="x<?php echo $patient_room_grid->RowIndex ?>_PatID" id="x<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" name="o<?php echo $patient_room_grid->RowIndex ?>_PatID" id="o<?php echo $patient_room_grid->RowIndex ?>_PatID" value="<?php echo HtmlEncode($patient_room_grid->PatID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->MobileNumber->Visible) { // MobileNumber ?>
		<td data-name="MobileNumber">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_MobileNumber" class="form-group patient_room_MobileNumber">
<input type="text" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?php echo HtmlEncode($patient_room_grid->MobileNumber->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->MobileNumber->EditValue ?>"<?php echo $patient_room_grid->MobileNumber->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_MobileNumber" class="form-group patient_room_MobileNumber">
<span<?php echo $patient_room_grid->MobileNumber->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->MobileNumber->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="x<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room_grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" name="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" id="o<?php echo $patient_room_grid->RowIndex ?>_MobileNumber" value="<?php echo HtmlEncode($patient_room_grid->MobileNumber->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->HospID->Visible) { // HospID ?>
		<td data-name="HospID">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_HospID" class="form-group patient_room_HospID">
<span<?php echo $patient_room_grid->HospID->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->HospID->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="x<?php echo $patient_room_grid->RowIndex ?>_HospID" id="x<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room_grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" name="o<?php echo $patient_room_grid->RowIndex ?>_HospID" id="o<?php echo $patient_room_grid->RowIndex ?>_HospID" value="<?php echo HtmlEncode($patient_room_grid->HospID->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->status->Visible) { // status ?>
		<td data-name="status">
<?php if (!$patient_room->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_status" class="form-group patient_room_status">
<input type="text" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" size="30" placeholder="<?php echo HtmlEncode($patient_room_grid->status->getPlaceHolder()) ?>" value="<?php echo $patient_room_grid->status->EditValue ?>"<?php echo $patient_room_grid->status->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_status" class="form-group patient_room_status">
<span<?php echo $patient_room_grid->status->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->status->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_status" name="x<?php echo $patient_room_grid->RowIndex ?>_status" id="x<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room_grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_status" name="o<?php echo $patient_room_grid->RowIndex ?>_status" id="o<?php echo $patient_room_grid->RowIndex ?>_status" value="<?php echo HtmlEncode($patient_room_grid->status->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->createdby->Visible) { // createdby ?>
		<td data-name="createdby">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_createdby" class="form-group patient_room_createdby">
<span<?php echo $patient_room_grid->createdby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->createdby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="x<?php echo $patient_room_grid->RowIndex ?>_createdby" id="x<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room_grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" name="o<?php echo $patient_room_grid->RowIndex ?>_createdby" id="o<?php echo $patient_room_grid->RowIndex ?>_createdby" value="<?php echo HtmlEncode($patient_room_grid->createdby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->createddatetime->Visible) { // createddatetime ?>
		<td data-name="createddatetime">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_createddatetime" class="form-group patient_room_createddatetime">
<span<?php echo $patient_room_grid->createddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->createddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room_grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_createddatetime" value="<?php echo HtmlEncode($patient_room_grid->createddatetime->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->modifiedby->Visible) { // modifiedby ?>
		<td data-name="modifiedby">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_modifiedby" class="form-group patient_room_modifiedby">
<span<?php echo $patient_room_grid->modifiedby->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->modifiedby->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="x<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room_grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" name="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" id="o<?php echo $patient_room_grid->RowIndex ?>_modifiedby" value="<?php echo HtmlEncode($patient_room_grid->modifiedby->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($patient_room_grid->modifieddatetime->Visible) { // modifieddatetime ?>
		<td data-name="modifieddatetime">
<?php if (!$patient_room->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_modifieddatetime" class="form-group patient_room_modifieddatetime">
<span<?php echo $patient_room_grid->modifieddatetime->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($patient_room_grid->modifieddatetime->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="x<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room_grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" name="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" id="o<?php echo $patient_room_grid->RowIndex ?>_modifieddatetime" value="<?php echo HtmlEncode($patient_room_grid->modifieddatetime->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$patient_room_grid->ListOptions->render("body", "right", $patient_room_grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_roomgrid", "load"], function() {
	fpatient_roomgrid.updateLists(<?php echo $patient_room_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
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
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($patient_room_grid->Recordset)
	$patient_room_grid->Recordset->Close();
?>
<?php if ($patient_room_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $patient_room_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($patient_room_grid->TotalRecords == 0 && !$patient_room->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $patient_room_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$patient_room_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$patient_room_grid->terminate();
?>
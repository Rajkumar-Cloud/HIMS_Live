<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("AppointmentSchedulerGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fappointment_schedulergrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fappointment_schedulergrid = new ew.Form("fappointment_schedulergrid", "grid");
    fappointment_schedulergrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "appointment_scheduler")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.appointment_scheduler)
        ew.vars.tables.appointment_scheduler = currentTable;
    fappointment_schedulergrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(11)], fields.start_date.isInvalid],
        ["end_date", [fields.end_date.visible && fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(11)], fields.end_date.isInvalid],
        ["patientID", [fields.patientID.visible && fields.patientID.required ? ew.Validators.required(fields.patientID.caption) : null], fields.patientID.isInvalid],
        ["patientName", [fields.patientName.visible && fields.patientName.required ? ew.Validators.required(fields.patientName.caption) : null], fields.patientName.isInvalid],
        ["DoctorID", [fields.DoctorID.visible && fields.DoctorID.required ? ew.Validators.required(fields.DoctorID.caption) : null], fields.DoctorID.isInvalid],
        ["DoctorName", [fields.DoctorName.visible && fields.DoctorName.required ? ew.Validators.required(fields.DoctorName.caption) : null], fields.DoctorName.isInvalid],
        ["AppointmentStatus", [fields.AppointmentStatus.visible && fields.AppointmentStatus.required ? ew.Validators.required(fields.AppointmentStatus.caption) : null], fields.AppointmentStatus.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["DoctorCode", [fields.DoctorCode.visible && fields.DoctorCode.required ? ew.Validators.required(fields.DoctorCode.caption) : null], fields.DoctorCode.isInvalid],
        ["Department", [fields.Department.visible && fields.Department.required ? ew.Validators.required(fields.Department.caption) : null], fields.Department.isInvalid],
        ["scheduler_id", [fields.scheduler_id.visible && fields.scheduler_id.required ? ew.Validators.required(fields.scheduler_id.caption) : null], fields.scheduler_id.isInvalid],
        ["text", [fields.text.visible && fields.text.required ? ew.Validators.required(fields.text.caption) : null], fields.text.isInvalid],
        ["appointment_status", [fields.appointment_status.visible && fields.appointment_status.required ? ew.Validators.required(fields.appointment_status.caption) : null], fields.appointment_status.isInvalid],
        ["PId", [fields.PId.visible && fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer], fields.PId.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["SchEmail", [fields.SchEmail.visible && fields.SchEmail.required ? ew.Validators.required(fields.SchEmail.caption) : null], fields.SchEmail.isInvalid],
        ["appointment_type", [fields.appointment_type.visible && fields.appointment_type.required ? ew.Validators.required(fields.appointment_type.caption) : null], fields.appointment_type.isInvalid],
        ["Notified", [fields.Notified.visible && fields.Notified.required ? ew.Validators.required(fields.Notified.caption) : null], fields.Notified.isInvalid],
        ["Purpose", [fields.Purpose.visible && fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["Notes", [fields.Notes.visible && fields.Notes.required ? ew.Validators.required(fields.Notes.caption) : null], fields.Notes.isInvalid],
        ["PatientType", [fields.PatientType.visible && fields.PatientType.required ? ew.Validators.required(fields.PatientType.caption) : null], fields.PatientType.isInvalid],
        ["Referal", [fields.Referal.visible && fields.Referal.required ? ew.Validators.required(fields.Referal.caption) : null], fields.Referal.isInvalid],
        ["paymentType", [fields.paymentType.visible && fields.paymentType.required ? ew.Validators.required(fields.paymentType.caption) : null], fields.paymentType.isInvalid],
        ["WhereDidYouHear", [fields.WhereDidYouHear.visible && fields.WhereDidYouHear.required ? ew.Validators.required(fields.WhereDidYouHear.caption) : null], fields.WhereDidYouHear.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdBy", [fields.createdBy.visible && fields.createdBy.required ? ew.Validators.required(fields.createdBy.caption) : null], fields.createdBy.isInvalid],
        ["createdDateTime", [fields.createdDateTime.visible && fields.createdDateTime.required ? ew.Validators.required(fields.createdDateTime.caption) : null], fields.createdDateTime.isInvalid],
        ["PatientTypee", [fields.PatientTypee.visible && fields.PatientTypee.required ? ew.Validators.required(fields.PatientTypee.caption) : null], fields.PatientTypee.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fappointment_schedulergrid,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fappointment_schedulergrid.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        return true;
    }

    // Check empty row
    fappointment_schedulergrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "start_date", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "end_date", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "patientID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "patientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DoctorID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DoctorName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AppointmentStatus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DoctorCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Department", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "scheduler_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "text", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "appointment_status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MobileNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SchEmail", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "appointment_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Notified[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Purpose", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Notes", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Referal", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "paymentType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "WhereDidYouHear[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientTypee", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fappointment_schedulergrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fappointment_schedulergrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fappointment_schedulergrid.lists.patientID = <?= $Grid->patientID->toClientList($Grid) ?>;
    fappointment_schedulergrid.lists.DoctorName = <?= $Grid->DoctorName->toClientList($Grid) ?>;
    fappointment_schedulergrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    fappointment_schedulergrid.lists.appointment_type = <?= $Grid->appointment_type->toClientList($Grid) ?>;
    fappointment_schedulergrid.lists.Notified = <?= $Grid->Notified->toClientList($Grid) ?>;
    fappointment_schedulergrid.lists.PatientType = <?= $Grid->PatientType->toClientList($Grid) ?>;
    fappointment_schedulergrid.lists.Referal = <?= $Grid->Referal->toClientList($Grid) ?>;
    fappointment_schedulergrid.lists.WhereDidYouHear = <?= $Grid->WhereDidYouHear->toClientList($Grid) ?>;
    fappointment_schedulergrid.lists.PatientTypee = <?= $Grid->PatientTypee->toClientList($Grid) ?>;
    loadjs.done("fappointment_schedulergrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> appointment_scheduler">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fappointment_schedulergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_appointment_scheduler" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_appointment_schedulergrid" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Grid->RowType = ROWTYPE_HEADER;

// Render list options
$Grid->renderListOptions();

// Render list options (header, left)
$Grid->ListOptions->render("header", "left");
?>
<?php if ($Grid->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_appointment_scheduler_id" class="appointment_scheduler_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->start_date->Visible) { // start_date ?>
        <th data-name="start_date" class="<?= $Grid->start_date->headerCellClass() ?>"><div id="elh_appointment_scheduler_start_date" class="appointment_scheduler_start_date"><?= $Grid->renderSort($Grid->start_date) ?></div></th>
<?php } ?>
<?php if ($Grid->end_date->Visible) { // end_date ?>
        <th data-name="end_date" class="<?= $Grid->end_date->headerCellClass() ?>"><div id="elh_appointment_scheduler_end_date" class="appointment_scheduler_end_date"><?= $Grid->renderSort($Grid->end_date) ?></div></th>
<?php } ?>
<?php if ($Grid->patientID->Visible) { // patientID ?>
        <th data-name="patientID" class="<?= $Grid->patientID->headerCellClass() ?>"><div id="elh_appointment_scheduler_patientID" class="appointment_scheduler_patientID"><?= $Grid->renderSort($Grid->patientID) ?></div></th>
<?php } ?>
<?php if ($Grid->patientName->Visible) { // patientName ?>
        <th data-name="patientName" class="<?= $Grid->patientName->headerCellClass() ?>"><div id="elh_appointment_scheduler_patientName" class="appointment_scheduler_patientName"><?= $Grid->renderSort($Grid->patientName) ?></div></th>
<?php } ?>
<?php if ($Grid->DoctorID->Visible) { // DoctorID ?>
        <th data-name="DoctorID" class="<?= $Grid->DoctorID->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorID" class="appointment_scheduler_DoctorID"><?= $Grid->renderSort($Grid->DoctorID) ?></div></th>
<?php } ?>
<?php if ($Grid->DoctorName->Visible) { // DoctorName ?>
        <th data-name="DoctorName" class="<?= $Grid->DoctorName->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorName" class="appointment_scheduler_DoctorName"><?= $Grid->renderSort($Grid->DoctorName) ?></div></th>
<?php } ?>
<?php if ($Grid->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <th data-name="AppointmentStatus" class="<?= $Grid->AppointmentStatus->headerCellClass() ?>"><div id="elh_appointment_scheduler_AppointmentStatus" class="appointment_scheduler_AppointmentStatus"><?= $Grid->renderSort($Grid->AppointmentStatus) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_appointment_scheduler_status" class="appointment_scheduler_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->DoctorCode->Visible) { // DoctorCode ?>
        <th data-name="DoctorCode" class="<?= $Grid->DoctorCode->headerCellClass() ?>"><div id="elh_appointment_scheduler_DoctorCode" class="appointment_scheduler_DoctorCode"><?= $Grid->renderSort($Grid->DoctorCode) ?></div></th>
<?php } ?>
<?php if ($Grid->Department->Visible) { // Department ?>
        <th data-name="Department" class="<?= $Grid->Department->headerCellClass() ?>"><div id="elh_appointment_scheduler_Department" class="appointment_scheduler_Department"><?= $Grid->renderSort($Grid->Department) ?></div></th>
<?php } ?>
<?php if ($Grid->scheduler_id->Visible) { // scheduler_id ?>
        <th data-name="scheduler_id" class="<?= $Grid->scheduler_id->headerCellClass() ?>"><div id="elh_appointment_scheduler_scheduler_id" class="appointment_scheduler_scheduler_id"><?= $Grid->renderSort($Grid->scheduler_id) ?></div></th>
<?php } ?>
<?php if ($Grid->text->Visible) { // text ?>
        <th data-name="text" class="<?= $Grid->text->headerCellClass() ?>"><div id="elh_appointment_scheduler_text" class="appointment_scheduler_text"><?= $Grid->renderSort($Grid->text) ?></div></th>
<?php } ?>
<?php if ($Grid->appointment_status->Visible) { // appointment_status ?>
        <th data-name="appointment_status" class="<?= $Grid->appointment_status->headerCellClass() ?>"><div id="elh_appointment_scheduler_appointment_status" class="appointment_scheduler_appointment_status"><?= $Grid->renderSort($Grid->appointment_status) ?></div></th>
<?php } ?>
<?php if ($Grid->PId->Visible) { // PId ?>
        <th data-name="PId" class="<?= $Grid->PId->headerCellClass() ?>"><div id="elh_appointment_scheduler_PId" class="appointment_scheduler_PId"><?= $Grid->renderSort($Grid->PId) ?></div></th>
<?php } ?>
<?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Grid->MobileNumber->headerCellClass() ?>"><div id="elh_appointment_scheduler_MobileNumber" class="appointment_scheduler_MobileNumber"><?= $Grid->renderSort($Grid->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Grid->SchEmail->Visible) { // SchEmail ?>
        <th data-name="SchEmail" class="<?= $Grid->SchEmail->headerCellClass() ?>"><div id="elh_appointment_scheduler_SchEmail" class="appointment_scheduler_SchEmail"><?= $Grid->renderSort($Grid->SchEmail) ?></div></th>
<?php } ?>
<?php if ($Grid->appointment_type->Visible) { // appointment_type ?>
        <th data-name="appointment_type" class="<?= $Grid->appointment_type->headerCellClass() ?>"><div id="elh_appointment_scheduler_appointment_type" class="appointment_scheduler_appointment_type"><?= $Grid->renderSort($Grid->appointment_type) ?></div></th>
<?php } ?>
<?php if ($Grid->Notified->Visible) { // Notified ?>
        <th data-name="Notified" class="<?= $Grid->Notified->headerCellClass() ?>"><div id="elh_appointment_scheduler_Notified" class="appointment_scheduler_Notified"><?= $Grid->renderSort($Grid->Notified) ?></div></th>
<?php } ?>
<?php if ($Grid->Purpose->Visible) { // Purpose ?>
        <th data-name="Purpose" class="<?= $Grid->Purpose->headerCellClass() ?>"><div id="elh_appointment_scheduler_Purpose" class="appointment_scheduler_Purpose"><?= $Grid->renderSort($Grid->Purpose) ?></div></th>
<?php } ?>
<?php if ($Grid->Notes->Visible) { // Notes ?>
        <th data-name="Notes" class="<?= $Grid->Notes->headerCellClass() ?>"><div id="elh_appointment_scheduler_Notes" class="appointment_scheduler_Notes"><?= $Grid->renderSort($Grid->Notes) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientType->Visible) { // PatientType ?>
        <th data-name="PatientType" class="<?= $Grid->PatientType->headerCellClass() ?>"><div id="elh_appointment_scheduler_PatientType" class="appointment_scheduler_PatientType"><?= $Grid->renderSort($Grid->PatientType) ?></div></th>
<?php } ?>
<?php if ($Grid->Referal->Visible) { // Referal ?>
        <th data-name="Referal" class="<?= $Grid->Referal->headerCellClass() ?>"><div id="elh_appointment_scheduler_Referal" class="appointment_scheduler_Referal"><?= $Grid->renderSort($Grid->Referal) ?></div></th>
<?php } ?>
<?php if ($Grid->paymentType->Visible) { // paymentType ?>
        <th data-name="paymentType" class="<?= $Grid->paymentType->headerCellClass() ?>"><div id="elh_appointment_scheduler_paymentType" class="appointment_scheduler_paymentType"><?= $Grid->renderSort($Grid->paymentType) ?></div></th>
<?php } ?>
<?php if ($Grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th data-name="WhereDidYouHear" class="<?= $Grid->WhereDidYouHear->headerCellClass() ?>"><div id="elh_appointment_scheduler_WhereDidYouHear" class="appointment_scheduler_WhereDidYouHear"><?= $Grid->renderSort($Grid->WhereDidYouHear) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_appointment_scheduler_HospID" class="appointment_scheduler_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->createdBy->Visible) { // createdBy ?>
        <th data-name="createdBy" class="<?= $Grid->createdBy->headerCellClass() ?>"><div id="elh_appointment_scheduler_createdBy" class="appointment_scheduler_createdBy"><?= $Grid->renderSort($Grid->createdBy) ?></div></th>
<?php } ?>
<?php if ($Grid->createdDateTime->Visible) { // createdDateTime ?>
        <th data-name="createdDateTime" class="<?= $Grid->createdDateTime->headerCellClass() ?>"><div id="elh_appointment_scheduler_createdDateTime" class="appointment_scheduler_createdDateTime"><?= $Grid->renderSort($Grid->createdDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientTypee->Visible) { // PatientTypee ?>
        <th data-name="PatientTypee" class="<?= $Grid->PatientTypee->headerCellClass() ?>"><div id="elh_appointment_scheduler_PatientTypee" class="appointment_scheduler_PatientTypee"><?= $Grid->renderSort($Grid->PatientTypee) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Grid->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
$Grid->StartRecord = 1;
$Grid->StopRecord = $Grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($Grid->isConfirm() || $Grid->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Grid->FormKeyCountName) && ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm())) {
        $Grid->KeyCount = $CurrentForm->getValue($Grid->FormKeyCountName);
        $Grid->StopRecord = $Grid->StartRecord + $Grid->KeyCount - 1;
    }
}
$Grid->RecordCount = $Grid->StartRecord - 1;
if ($Grid->Recordset && !$Grid->Recordset->EOF) {
    // Nothing to do
} elseif (!$Grid->AllowAddDeleteRow && $Grid->StopRecord == 0) {
    $Grid->StopRecord = $Grid->GridAddRowCount;
}

// Initialize aggregate
$Grid->RowType = ROWTYPE_AGGREGATEINIT;
$Grid->resetAttributes();
$Grid->renderRow();
if ($Grid->isGridAdd())
    $Grid->RowIndex = 0;
if ($Grid->isGridEdit())
    $Grid->RowIndex = 0;
while ($Grid->RecordCount < $Grid->StopRecord) {
    $Grid->RecordCount++;
    if ($Grid->RecordCount >= $Grid->StartRecord) {
        $Grid->RowCount++;
        if ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm()) {
            $Grid->RowIndex++;
            $CurrentForm->Index = $Grid->RowIndex;
            if ($CurrentForm->hasValue($Grid->FormActionName) && ($Grid->isConfirm() || $Grid->EventCancelled)) {
                $Grid->RowAction = strval($CurrentForm->getValue($Grid->FormActionName));
            } elseif ($Grid->isGridAdd()) {
                $Grid->RowAction = "insert";
            } else {
                $Grid->RowAction = "";
            }
        }

        // Set up key count
        $Grid->KeyCount = $Grid->RowIndex;

        // Init row class and style
        $Grid->resetAttributes();
        $Grid->CssClass = "";
        if ($Grid->isGridAdd()) {
            if ($Grid->CurrentMode == "copy") {
                $Grid->loadRowValues($Grid->Recordset); // Load row values
                $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
            } else {
                $Grid->loadRowValues(); // Load default values
                $Grid->OldKey = "";
            }
        } else {
            $Grid->loadRowValues($Grid->Recordset); // Load row values
            $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
        }
        $Grid->setKey($Grid->OldKey);
        $Grid->RowType = ROWTYPE_VIEW; // Render view
        if ($Grid->isGridAdd()) { // Grid add
            $Grid->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Grid->isGridAdd() && $Grid->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->isGridEdit()) { // Grid edit
            if ($Grid->EventCancelled) {
                $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
            }
            if ($Grid->RowAction == "insert") {
                $Grid->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Grid->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Grid->isGridEdit() && ($Grid->RowType == ROWTYPE_EDIT || $Grid->RowType == ROWTYPE_ADD) && $Grid->EventCancelled) { // Update failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->RowType == ROWTYPE_EDIT) { // Edit row
            $Grid->EditRowCount++;
        }
        if ($Grid->isConfirm()) { // Confirm row
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }

        // Set up row id / data-rowindex
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_appointment_scheduler", "data-rowtype" => $Grid->RowType]);

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Grid->RowAction != "delete" && $Grid->RowAction != "insertdelete" && !($Grid->RowAction == "insert" && $Grid->isConfirm() && $Grid->emptyRow())) {
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowCount);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" <?= $Grid->id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_id" class="form-group"></span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_id" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_id" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="appointment_scheduler" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->start_date->Visible) { // start_date ?>
        <td data-name="start_date" <?= $Grid->start_date->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_start_date" class="form-group">
<input type="<?= $Grid->start_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?= $Grid->RowIndex ?>_start_date" id="x<?= $Grid->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Grid->start_date->getPlaceHolder()) ?>" value="<?= $Grid->start_date->EditValue ?>"<?= $Grid->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->start_date->getErrorMessage() ?></div>
<?php if (!$Grid->start_date->ReadOnly && !$Grid->start_date->Disabled && !isset($Grid->start_date->EditAttrs["readonly"]) && !isset($Grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_schedulergrid", "x<?= $Grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_start_date" id="o<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_start_date" class="form-group">
<input type="<?= $Grid->start_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?= $Grid->RowIndex ?>_start_date" id="x<?= $Grid->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Grid->start_date->getPlaceHolder()) ?>" value="<?= $Grid->start_date->EditValue ?>"<?= $Grid->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->start_date->getErrorMessage() ?></div>
<?php if (!$Grid->start_date->ReadOnly && !$Grid->start_date->Disabled && !isset($Grid->start_date->EditAttrs["readonly"]) && !isset($Grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_schedulergrid", "x<?= $Grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_start_date">
<span<?= $Grid->start_date->viewAttributes() ?>>
<?= $Grid->start_date->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_start_date" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_start_date" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->end_date->Visible) { // end_date ?>
        <td data-name="end_date" <?= $Grid->end_date->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_end_date" class="form-group">
<input type="<?= $Grid->end_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?= $Grid->RowIndex ?>_end_date" id="x<?= $Grid->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Grid->end_date->getPlaceHolder()) ?>" value="<?= $Grid->end_date->EditValue ?>"<?= $Grid->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->end_date->getErrorMessage() ?></div>
<?php if (!$Grid->end_date->ReadOnly && !$Grid->end_date->Disabled && !isset($Grid->end_date->EditAttrs["readonly"]) && !isset($Grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_schedulergrid", "x<?= $Grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_end_date" id="o<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_end_date" class="form-group">
<input type="<?= $Grid->end_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?= $Grid->RowIndex ?>_end_date" id="x<?= $Grid->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Grid->end_date->getPlaceHolder()) ?>" value="<?= $Grid->end_date->EditValue ?>"<?= $Grid->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->end_date->getErrorMessage() ?></div>
<?php if (!$Grid->end_date->ReadOnly && !$Grid->end_date->Disabled && !isset($Grid->end_date->EditAttrs["readonly"]) && !isset($Grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_schedulergrid", "x<?= $Grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_end_date">
<span<?= $Grid->end_date->viewAttributes() ?>>
<?= $Grid->end_date->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_end_date" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_end_date" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->patientID->Visible) { // patientID ?>
        <td data-name="patientID" <?= $Grid->patientID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_patientID" class="form-group">
<?php $Grid->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patientID"><?= EmptyValue(strval($Grid->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patientID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patientID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patientID->ReadOnly || $Grid->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patientID->getErrorMessage() ?></div>
<?= $Grid->patientID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patientID") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_patientID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patientID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patientID" id="x<?= $Grid->RowIndex ?>_patientID" value="<?= $Grid->patientID->CurrentValue ?>"<?= $Grid->patientID->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patientID" id="o<?= $Grid->RowIndex ?>_patientID" value="<?= HtmlEncode($Grid->patientID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_patientID" class="form-group">
<?php $Grid->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patientID"><?= EmptyValue(strval($Grid->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patientID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patientID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patientID->ReadOnly || $Grid->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patientID->getErrorMessage() ?></div>
<?= $Grid->patientID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patientID") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_patientID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patientID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patientID" id="x<?= $Grid->RowIndex ?>_patientID" value="<?= $Grid->patientID->CurrentValue ?>"<?= $Grid->patientID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_patientID">
<span<?= $Grid->patientID->viewAttributes() ?>>
<?= $Grid->patientID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_patientID" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_patientID" value="<?= HtmlEncode($Grid->patientID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_patientID" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_patientID" value="<?= HtmlEncode($Grid->patientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->patientName->Visible) { // patientName ?>
        <td data-name="patientName" <?= $Grid->patientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_patientName" class="form-group">
<input type="<?= $Grid->patientName->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_patientName" name="x<?= $Grid->RowIndex ?>_patientName" id="x<?= $Grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->patientName->getPlaceHolder()) ?>" value="<?= $Grid->patientName->EditValue ?>"<?= $Grid->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patientName" id="o<?= $Grid->RowIndex ?>_patientName" value="<?= HtmlEncode($Grid->patientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_patientName" class="form-group">
<input type="<?= $Grid->patientName->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_patientName" name="x<?= $Grid->RowIndex ?>_patientName" id="x<?= $Grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->patientName->getPlaceHolder()) ?>" value="<?= $Grid->patientName->EditValue ?>"<?= $Grid->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_patientName">
<span<?= $Grid->patientName->viewAttributes() ?>>
<?= $Grid->patientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_patientName" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_patientName" value="<?= HtmlEncode($Grid->patientName->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_patientName" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_patientName" value="<?= HtmlEncode($Grid->patientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DoctorID->Visible) { // DoctorID ?>
        <td data-name="DoctorID" <?= $Grid->DoctorID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->DoctorID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorID" class="form-group">
<span<?= $Grid->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DoctorID->getDisplayValue($Grid->DoctorID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DoctorID" name="x<?= $Grid->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Grid->DoctorID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorID" class="form-group">
<input type="<?= $Grid->DoctorID->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorID" name="x<?= $Grid->RowIndex ?>_DoctorID" id="x<?= $Grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?= HtmlEncode($Grid->DoctorID->getPlaceHolder()) ?>" value="<?= $Grid->DoctorID->EditValue ?>"<?= $Grid->DoctorID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoctorID->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DoctorID" id="o<?= $Grid->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Grid->DoctorID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->DoctorID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorID" class="form-group">
<span<?= $Grid->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DoctorID->getDisplayValue($Grid->DoctorID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DoctorID" name="x<?= $Grid->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Grid->DoctorID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorID" class="form-group">
<input type="<?= $Grid->DoctorID->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorID" name="x<?= $Grid->RowIndex ?>_DoctorID" id="x<?= $Grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?= HtmlEncode($Grid->DoctorID->getPlaceHolder()) ?>" value="<?= $Grid->DoctorID->EditValue ?>"<?= $Grid->DoctorID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoctorID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorID">
<span<?= $Grid->DoctorID->viewAttributes() ?>>
<?= $Grid->DoctorID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_DoctorID" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Grid->DoctorID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_DoctorID" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Grid->DoctorID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DoctorName->Visible) { // DoctorName ?>
        <td data-name="DoctorName" <?= $Grid->DoctorName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorName" class="form-group">
<?php $Grid->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_DoctorName"><?= EmptyValue(strval($Grid->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->DoctorName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->DoctorName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->DoctorName->ReadOnly || $Grid->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->DoctorName->getErrorMessage() ?></div>
<?= $Grid->DoctorName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DoctorName") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_DoctorName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_DoctorName" id="x<?= $Grid->RowIndex ?>_DoctorName" value="<?= $Grid->DoctorName->CurrentValue ?>"<?= $Grid->DoctorName->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DoctorName" id="o<?= $Grid->RowIndex ?>_DoctorName" value="<?= HtmlEncode($Grid->DoctorName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorName" class="form-group">
<?php $Grid->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_DoctorName"><?= EmptyValue(strval($Grid->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->DoctorName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->DoctorName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->DoctorName->ReadOnly || $Grid->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->DoctorName->getErrorMessage() ?></div>
<?= $Grid->DoctorName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DoctorName") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_DoctorName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_DoctorName" id="x<?= $Grid->RowIndex ?>_DoctorName" value="<?= $Grid->DoctorName->CurrentValue ?>"<?= $Grid->DoctorName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorName">
<span<?= $Grid->DoctorName->viewAttributes() ?>>
<?= $Grid->DoctorName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_DoctorName" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_DoctorName" value="<?= HtmlEncode($Grid->DoctorName->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_DoctorName" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_DoctorName" value="<?= HtmlEncode($Grid->DoctorName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <td data-name="AppointmentStatus" <?= $Grid->AppointmentStatus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_AppointmentStatus" class="form-group">
<input type="<?= $Grid->AppointmentStatus->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x<?= $Grid->RowIndex ?>_AppointmentStatus" id="x<?= $Grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AppointmentStatus->getPlaceHolder()) ?>" value="<?= $Grid->AppointmentStatus->EditValue ?>"<?= $Grid->AppointmentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AppointmentStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AppointmentStatus" id="o<?= $Grid->RowIndex ?>_AppointmentStatus" value="<?= HtmlEncode($Grid->AppointmentStatus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_AppointmentStatus" class="form-group">
<input type="<?= $Grid->AppointmentStatus->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x<?= $Grid->RowIndex ?>_AppointmentStatus" id="x<?= $Grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AppointmentStatus->getPlaceHolder()) ?>" value="<?= $Grid->AppointmentStatus->EditValue ?>"<?= $Grid->AppointmentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AppointmentStatus->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_AppointmentStatus">
<span<?= $Grid->AppointmentStatus->viewAttributes() ?>>
<?= $Grid->AppointmentStatus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_AppointmentStatus" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_AppointmentStatus" value="<?= HtmlEncode($Grid->AppointmentStatus->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_AppointmentStatus" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_AppointmentStatus" value="<?= HtmlEncode($Grid->AppointmentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_status" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_status">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status"<?= $Grid->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_status[]"
    name="x<?= $Grid->RowIndex ?>_status[]"
    value="<?= HtmlEncode($Grid->status->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_status"
    data-target="dsl_x<?= $Grid->RowIndex ?>_status"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->status->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_status"
    data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
    <?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status[]" id="o<?= $Grid->RowIndex ?>_status[]" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_status" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_status">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status"<?= $Grid->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_status[]"
    name="x<?= $Grid->RowIndex ?>_status[]"
    value="<?= HtmlEncode($Grid->status->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_status"
    data-target="dsl_x<?= $Grid->RowIndex ?>_status"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->status->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_status"
    data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
    <?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_status" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_status[]" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_status[]" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DoctorCode->Visible) { // DoctorCode ?>
        <td data-name="DoctorCode" <?= $Grid->DoctorCode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorCode" class="form-group">
<input type="<?= $Grid->DoctorCode->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x<?= $Grid->RowIndex ?>_DoctorCode" id="x<?= $Grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?= HtmlEncode($Grid->DoctorCode->getPlaceHolder()) ?>" value="<?= $Grid->DoctorCode->EditValue ?>"<?= $Grid->DoctorCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoctorCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DoctorCode" id="o<?= $Grid->RowIndex ?>_DoctorCode" value="<?= HtmlEncode($Grid->DoctorCode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorCode" class="form-group">
<input type="<?= $Grid->DoctorCode->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x<?= $Grid->RowIndex ?>_DoctorCode" id="x<?= $Grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?= HtmlEncode($Grid->DoctorCode->getPlaceHolder()) ?>" value="<?= $Grid->DoctorCode->EditValue ?>"<?= $Grid->DoctorCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoctorCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_DoctorCode">
<span<?= $Grid->DoctorCode->viewAttributes() ?>>
<?= $Grid->DoctorCode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_DoctorCode" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_DoctorCode" value="<?= HtmlEncode($Grid->DoctorCode->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_DoctorCode" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_DoctorCode" value="<?= HtmlEncode($Grid->DoctorCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Department->Visible) { // Department ?>
        <td data-name="Department" <?= $Grid->Department->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Department" class="form-group">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Department" id="o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Department" class="form-group">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Department">
<span<?= $Grid->Department->viewAttributes() ?>>
<?= $Grid->Department->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Department" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Department" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->scheduler_id->Visible) { // scheduler_id ?>
        <td data-name="scheduler_id" <?= $Grid->scheduler_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_scheduler_id" class="form-group">
<input type="<?= $Grid->scheduler_id->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x<?= $Grid->RowIndex ?>_scheduler_id" id="x<?= $Grid->RowIndex ?>_scheduler_id" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->scheduler_id->getPlaceHolder()) ?>" value="<?= $Grid->scheduler_id->EditValue ?>"<?= $Grid->scheduler_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->scheduler_id->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_scheduler_id" id="o<?= $Grid->RowIndex ?>_scheduler_id" value="<?= HtmlEncode($Grid->scheduler_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_scheduler_id" class="form-group">
<span<?= $Grid->scheduler_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->scheduler_id->getDisplayValue($Grid->scheduler_id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_scheduler_id" id="x<?= $Grid->RowIndex ?>_scheduler_id" value="<?= HtmlEncode($Grid->scheduler_id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_scheduler_id">
<span<?= $Grid->scheduler_id->viewAttributes() ?>>
<?= $Grid->scheduler_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_scheduler_id" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_scheduler_id" value="<?= HtmlEncode($Grid->scheduler_id->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_scheduler_id" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_scheduler_id" value="<?= HtmlEncode($Grid->scheduler_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->text->Visible) { // text ?>
        <td data-name="text" <?= $Grid->text->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_text" class="form-group">
<input type="<?= $Grid->text->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_text" name="x<?= $Grid->RowIndex ?>_text" id="x<?= $Grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->text->getPlaceHolder()) ?>" value="<?= $Grid->text->EditValue ?>"<?= $Grid->text->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->text->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" data-hidden="1" name="o<?= $Grid->RowIndex ?>_text" id="o<?= $Grid->RowIndex ?>_text" value="<?= HtmlEncode($Grid->text->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_text" class="form-group">
<input type="<?= $Grid->text->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_text" name="x<?= $Grid->RowIndex ?>_text" id="x<?= $Grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->text->getPlaceHolder()) ?>" value="<?= $Grid->text->EditValue ?>"<?= $Grid->text->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->text->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_text">
<span<?= $Grid->text->viewAttributes() ?>>
<?= $Grid->text->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_text" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_text" value="<?= HtmlEncode($Grid->text->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_text" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_text" value="<?= HtmlEncode($Grid->text->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->appointment_status->Visible) { // appointment_status ?>
        <td data-name="appointment_status" <?= $Grid->appointment_status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_appointment_status" class="form-group">
<input type="<?= $Grid->appointment_status->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_appointment_status" name="x<?= $Grid->RowIndex ?>_appointment_status" id="x<?= $Grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->appointment_status->getPlaceHolder()) ?>" value="<?= $Grid->appointment_status->EditValue ?>"<?= $Grid->appointment_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->appointment_status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_appointment_status" id="o<?= $Grid->RowIndex ?>_appointment_status" value="<?= HtmlEncode($Grid->appointment_status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_appointment_status" class="form-group">
<input type="<?= $Grid->appointment_status->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_appointment_status" name="x<?= $Grid->RowIndex ?>_appointment_status" id="x<?= $Grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->appointment_status->getPlaceHolder()) ?>" value="<?= $Grid->appointment_status->EditValue ?>"<?= $Grid->appointment_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->appointment_status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_appointment_status">
<span<?= $Grid->appointment_status->viewAttributes() ?>>
<?= $Grid->appointment_status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_appointment_status" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_appointment_status" value="<?= HtmlEncode($Grid->appointment_status->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_appointment_status" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_appointment_status" value="<?= HtmlEncode($Grid->appointment_status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PId->Visible) { // PId ?>
        <td data-name="PId" <?= $Grid->PId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PId" class="form-group">
<input type="<?= $Grid->PId->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_PId" name="x<?= $Grid->RowIndex ?>_PId" id="x<?= $Grid->RowIndex ?>_PId" size="30" placeholder="<?= HtmlEncode($Grid->PId->getPlaceHolder()) ?>" value="<?= $Grid->PId->EditValue ?>"<?= $Grid->PId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PId" id="o<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PId" class="form-group">
<input type="<?= $Grid->PId->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_PId" name="x<?= $Grid->RowIndex ?>_PId" id="x<?= $Grid->RowIndex ?>_PId" size="30" placeholder="<?= HtmlEncode($Grid->PId->getPlaceHolder()) ?>" value="<?= $Grid->PId->EditValue ?>"<?= $Grid->PId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PId">
<span<?= $Grid->PId->viewAttributes() ?>>
<?= $Grid->PId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_PId" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_PId" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Grid->MobileNumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<?= $Grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_MobileNumber" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_MobileNumber" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SchEmail->Visible) { // SchEmail ?>
        <td data-name="SchEmail" <?= $Grid->SchEmail->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_SchEmail" class="form-group">
<input type="<?= $Grid->SchEmail->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_SchEmail" name="x<?= $Grid->RowIndex ?>_SchEmail" id="x<?= $Grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SchEmail->getPlaceHolder()) ?>" value="<?= $Grid->SchEmail->EditValue ?>"<?= $Grid->SchEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SchEmail->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SchEmail" id="o<?= $Grid->RowIndex ?>_SchEmail" value="<?= HtmlEncode($Grid->SchEmail->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_SchEmail" class="form-group">
<input type="<?= $Grid->SchEmail->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_SchEmail" name="x<?= $Grid->RowIndex ?>_SchEmail" id="x<?= $Grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SchEmail->getPlaceHolder()) ?>" value="<?= $Grid->SchEmail->EditValue ?>"<?= $Grid->SchEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SchEmail->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_SchEmail">
<span<?= $Grid->SchEmail->viewAttributes() ?>>
<?= $Grid->SchEmail->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_SchEmail" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_SchEmail" value="<?= HtmlEncode($Grid->SchEmail->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_SchEmail" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_SchEmail" value="<?= HtmlEncode($Grid->SchEmail->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->appointment_type->Visible) { // appointment_type ?>
        <td data-name="appointment_type" <?= $Grid->appointment_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_appointment_type" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_appointment_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_appointment_type" name="x<?= $Grid->RowIndex ?>_appointment_type" id="x<?= $Grid->RowIndex ?>_appointment_type"<?= $Grid->appointment_type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_appointment_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_appointment_type"
    name="x<?= $Grid->RowIndex ?>_appointment_type"
    value="<?= HtmlEncode($Grid->appointment_type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_appointment_type"
    data-target="dsl_x<?= $Grid->RowIndex ?>_appointment_type"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->appointment_type->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_appointment_type"
    data-value-separator="<?= $Grid->appointment_type->displayValueSeparatorAttribute() ?>"
    <?= $Grid->appointment_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->appointment_type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_appointment_type" id="o<?= $Grid->RowIndex ?>_appointment_type" value="<?= HtmlEncode($Grid->appointment_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_appointment_type" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_appointment_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_appointment_type" name="x<?= $Grid->RowIndex ?>_appointment_type" id="x<?= $Grid->RowIndex ?>_appointment_type"<?= $Grid->appointment_type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_appointment_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_appointment_type"
    name="x<?= $Grid->RowIndex ?>_appointment_type"
    value="<?= HtmlEncode($Grid->appointment_type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_appointment_type"
    data-target="dsl_x<?= $Grid->RowIndex ?>_appointment_type"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->appointment_type->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_appointment_type"
    data-value-separator="<?= $Grid->appointment_type->displayValueSeparatorAttribute() ?>"
    <?= $Grid->appointment_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->appointment_type->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_appointment_type">
<span<?= $Grid->appointment_type->viewAttributes() ?>>
<?= $Grid->appointment_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_appointment_type" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_appointment_type" value="<?= HtmlEncode($Grid->appointment_type->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_appointment_type" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_appointment_type" value="<?= HtmlEncode($Grid->appointment_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Notified->Visible) { // Notified ?>
        <td data-name="Notified" <?= $Grid->Notified->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Notified" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Notified">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_Notified" name="x<?= $Grid->RowIndex ?>_Notified" id="x<?= $Grid->RowIndex ?>_Notified"<?= $Grid->Notified->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Notified" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Notified[]"
    name="x<?= $Grid->RowIndex ?>_Notified[]"
    value="<?= HtmlEncode($Grid->Notified->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Notified"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Notified"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Notified->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_Notified"
    data-value-separator="<?= $Grid->Notified->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Notified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Notified->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Notified[]" id="o<?= $Grid->RowIndex ?>_Notified[]" value="<?= HtmlEncode($Grid->Notified->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Notified" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Notified">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_Notified" name="x<?= $Grid->RowIndex ?>_Notified" id="x<?= $Grid->RowIndex ?>_Notified"<?= $Grid->Notified->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Notified" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Notified[]"
    name="x<?= $Grid->RowIndex ?>_Notified[]"
    value="<?= HtmlEncode($Grid->Notified->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Notified"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Notified"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Notified->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_Notified"
    data-value-separator="<?= $Grid->Notified->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Notified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Notified->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Notified">
<span<?= $Grid->Notified->viewAttributes() ?>>
<?= $Grid->Notified->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Notified" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Notified" value="<?= HtmlEncode($Grid->Notified->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Notified[]" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Notified[]" value="<?= HtmlEncode($Grid->Notified->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Purpose->Visible) { // Purpose ?>
        <td data-name="Purpose" <?= $Grid->Purpose->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Purpose" class="form-group">
<input type="<?= $Grid->Purpose->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Purpose" name="x<?= $Grid->RowIndex ?>_Purpose" id="x<?= $Grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Purpose->getPlaceHolder()) ?>" value="<?= $Grid->Purpose->EditValue ?>"<?= $Grid->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Purpose->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Purpose" id="o<?= $Grid->RowIndex ?>_Purpose" value="<?= HtmlEncode($Grid->Purpose->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Purpose" class="form-group">
<input type="<?= $Grid->Purpose->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Purpose" name="x<?= $Grid->RowIndex ?>_Purpose" id="x<?= $Grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Purpose->getPlaceHolder()) ?>" value="<?= $Grid->Purpose->EditValue ?>"<?= $Grid->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Purpose->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Purpose">
<span<?= $Grid->Purpose->viewAttributes() ?>>
<?= $Grid->Purpose->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Purpose" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Purpose" value="<?= HtmlEncode($Grid->Purpose->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Purpose" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Purpose" value="<?= HtmlEncode($Grid->Purpose->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Notes->Visible) { // Notes ?>
        <td data-name="Notes" <?= $Grid->Notes->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Notes" class="form-group">
<input type="<?= $Grid->Notes->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Notes" name="x<?= $Grid->RowIndex ?>_Notes" id="x<?= $Grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Notes->getPlaceHolder()) ?>" value="<?= $Grid->Notes->EditValue ?>"<?= $Grid->Notes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Notes->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Notes" id="o<?= $Grid->RowIndex ?>_Notes" value="<?= HtmlEncode($Grid->Notes->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Notes" class="form-group">
<input type="<?= $Grid->Notes->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Notes" name="x<?= $Grid->RowIndex ?>_Notes" id="x<?= $Grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Notes->getPlaceHolder()) ?>" value="<?= $Grid->Notes->EditValue ?>"<?= $Grid->Notes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Notes->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Notes">
<span<?= $Grid->Notes->viewAttributes() ?>>
<?= $Grid->Notes->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Notes" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Notes" value="<?= HtmlEncode($Grid->Notes->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Notes" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Notes" value="<?= HtmlEncode($Grid->Notes->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientType->Visible) { // PatientType ?>
        <td data-name="PatientType" <?= $Grid->PatientType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PatientType" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_PatientType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_PatientType" name="x<?= $Grid->RowIndex ?>_PatientType" id="x<?= $Grid->RowIndex ?>_PatientType"<?= $Grid->PatientType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PatientType" class="ew-item-list"></div>
<?php $Grid->PatientType->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PatientType"
    name="x<?= $Grid->RowIndex ?>_PatientType"
    value="<?= HtmlEncode($Grid->PatientType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_PatientType"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PatientType"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PatientType->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_PatientType"
    data-value-separator="<?= $Grid->PatientType->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PatientType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientType" id="o<?= $Grid->RowIndex ?>_PatientType" value="<?= HtmlEncode($Grid->PatientType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PatientType" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_PatientType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_PatientType" name="x<?= $Grid->RowIndex ?>_PatientType" id="x<?= $Grid->RowIndex ?>_PatientType"<?= $Grid->PatientType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PatientType" class="ew-item-list"></div>
<?php $Grid->PatientType->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PatientType"
    name="x<?= $Grid->RowIndex ?>_PatientType"
    value="<?= HtmlEncode($Grid->PatientType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_PatientType"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PatientType"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PatientType->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_PatientType"
    data-value-separator="<?= $Grid->PatientType->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PatientType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PatientType">
<span<?= $Grid->PatientType->viewAttributes() ?>>
<?= $Grid->PatientType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_PatientType" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_PatientType" value="<?= HtmlEncode($Grid->PatientType->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_PatientType" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_PatientType" value="<?= HtmlEncode($Grid->PatientType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Referal->Visible) { // Referal ?>
        <td data-name="Referal" <?= $Grid->Referal->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Referal" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Referal"><?= EmptyValue(strval($Grid->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Referal->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Referal->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Referal->ReadOnly || $Grid->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Grid->Referal->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_Referal" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->Referal->caption() ?>" data-title="<?= $Grid->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Referal',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Referal->getErrorMessage() ?></div>
<?= $Grid->Referal->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Referal") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_Referal" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Referal->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Referal" id="x<?= $Grid->RowIndex ?>_Referal" value="<?= $Grid->Referal->CurrentValue ?>"<?= $Grid->Referal->editAttributes() ?>>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Referal" id="o<?= $Grid->RowIndex ?>_Referal" value="<?= HtmlEncode($Grid->Referal->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Referal" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Referal"><?= EmptyValue(strval($Grid->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Referal->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Referal->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Referal->ReadOnly || $Grid->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Grid->Referal->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_Referal" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->Referal->caption() ?>" data-title="<?= $Grid->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Referal',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Referal->getErrorMessage() ?></div>
<?= $Grid->Referal->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Referal") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_Referal" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Referal->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Referal" id="x<?= $Grid->RowIndex ?>_Referal" value="<?= $Grid->Referal->CurrentValue ?>"<?= $Grid->Referal->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_Referal">
<span<?= $Grid->Referal->viewAttributes() ?>>
<?= $Grid->Referal->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Referal" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_Referal" value="<?= HtmlEncode($Grid->Referal->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Referal" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_Referal" value="<?= HtmlEncode($Grid->Referal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->paymentType->Visible) { // paymentType ?>
        <td data-name="paymentType" <?= $Grid->paymentType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_paymentType" class="form-group">
<input type="<?= $Grid->paymentType->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_paymentType" name="x<?= $Grid->RowIndex ?>_paymentType" id="x<?= $Grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->paymentType->getPlaceHolder()) ?>" value="<?= $Grid->paymentType->EditValue ?>"<?= $Grid->paymentType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->paymentType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_paymentType" id="o<?= $Grid->RowIndex ?>_paymentType" value="<?= HtmlEncode($Grid->paymentType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_paymentType" class="form-group">
<input type="<?= $Grid->paymentType->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_paymentType" name="x<?= $Grid->RowIndex ?>_paymentType" id="x<?= $Grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->paymentType->getPlaceHolder()) ?>" value="<?= $Grid->paymentType->EditValue ?>"<?= $Grid->paymentType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->paymentType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_paymentType">
<span<?= $Grid->paymentType->viewAttributes() ?>>
<?= $Grid->paymentType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_paymentType" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_paymentType" value="<?= HtmlEncode($Grid->paymentType->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_paymentType" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_paymentType" value="<?= HtmlEncode($Grid->paymentType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear" <?= $Grid->WhereDidYouHear->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_WhereDidYouHear" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_WhereDidYouHear">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear"<?= $Grid->WhereDidYouHear->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_WhereDidYouHear" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_WhereDidYouHear[]"
    name="x<?= $Grid->RowIndex ?>_WhereDidYouHear[]"
    value="<?= HtmlEncode($Grid->WhereDidYouHear->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_WhereDidYouHear"
    data-target="dsl_x<?= $Grid->RowIndex ?>_WhereDidYouHear"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->WhereDidYouHear->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_WhereDidYouHear"
    data-value-separator="<?= $Grid->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
    <?= $Grid->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WhereDidYouHear->getErrorMessage() ?></div>
<?= $Grid->WhereDidYouHear->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-hidden="1" name="o<?= $Grid->RowIndex ?>_WhereDidYouHear[]" id="o<?= $Grid->RowIndex ?>_WhereDidYouHear[]" value="<?= HtmlEncode($Grid->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_WhereDidYouHear" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_WhereDidYouHear">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear"<?= $Grid->WhereDidYouHear->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_WhereDidYouHear" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_WhereDidYouHear[]"
    name="x<?= $Grid->RowIndex ?>_WhereDidYouHear[]"
    value="<?= HtmlEncode($Grid->WhereDidYouHear->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_WhereDidYouHear"
    data-target="dsl_x<?= $Grid->RowIndex ?>_WhereDidYouHear"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->WhereDidYouHear->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_WhereDidYouHear"
    data-value-separator="<?= $Grid->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
    <?= $Grid->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WhereDidYouHear->getErrorMessage() ?></div>
<?= $Grid->WhereDidYouHear->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_WhereDidYouHear">
<span<?= $Grid->WhereDidYouHear->viewAttributes() ?>>
<?= $Grid->WhereDidYouHear->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_WhereDidYouHear[]" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_WhereDidYouHear[]" value="<?= HtmlEncode($Grid->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_HospID" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_HospID" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdBy->Visible) { // createdBy ?>
        <td data-name="createdBy" <?= $Grid->createdBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdBy" id="o<?= $Grid->RowIndex ?>_createdBy" value="<?= HtmlEncode($Grid->createdBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_createdBy">
<span<?= $Grid->createdBy->viewAttributes() ?>>
<?= $Grid->createdBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_createdBy" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_createdBy" value="<?= HtmlEncode($Grid->createdBy->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_createdBy" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_createdBy" value="<?= HtmlEncode($Grid->createdBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdDateTime->Visible) { // createdDateTime ?>
        <td data-name="createdDateTime" <?= $Grid->createdDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdDateTime" id="o<?= $Grid->RowIndex ?>_createdDateTime" value="<?= HtmlEncode($Grid->createdDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_createdDateTime">
<span<?= $Grid->createdDateTime->viewAttributes() ?>>
<?= $Grid->createdDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_createdDateTime" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_createdDateTime" value="<?= HtmlEncode($Grid->createdDateTime->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_createdDateTime" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_createdDateTime" value="<?= HtmlEncode($Grid->createdDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientTypee->Visible) { // PatientTypee ?>
        <td data-name="PatientTypee" <?= $Grid->PatientTypee->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PatientTypee" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PatientTypee"
        name="x<?= $Grid->RowIndex ?>_PatientTypee"
        class="form-control ew-select<?= $Grid->PatientTypee->isInvalidClass() ?>"
        data-select2-id="appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee"
        data-table="appointment_scheduler"
        data-field="x_PatientTypee"
        data-value-separator="<?= $Grid->PatientTypee->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PatientTypee->getPlaceHolder()) ?>"
        <?= $Grid->PatientTypee->editAttributes() ?>>
        <?= $Grid->PatientTypee->selectOptionListHtml("x{$Grid->RowIndex}_PatientTypee") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PatientTypee->getErrorMessage() ?></div>
<?= $Grid->PatientTypee->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PatientTypee") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PatientTypee", selectId: "appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.appointment_scheduler.fields.PatientTypee.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientTypee" id="o<?= $Grid->RowIndex ?>_PatientTypee" value="<?= HtmlEncode($Grid->PatientTypee->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PatientTypee" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PatientTypee"
        name="x<?= $Grid->RowIndex ?>_PatientTypee"
        class="form-control ew-select<?= $Grid->PatientTypee->isInvalidClass() ?>"
        data-select2-id="appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee"
        data-table="appointment_scheduler"
        data-field="x_PatientTypee"
        data-value-separator="<?= $Grid->PatientTypee->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PatientTypee->getPlaceHolder()) ?>"
        <?= $Grid->PatientTypee->editAttributes() ?>>
        <?= $Grid->PatientTypee->selectOptionListHtml("x{$Grid->RowIndex}_PatientTypee") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PatientTypee->getErrorMessage() ?></div>
<?= $Grid->PatientTypee->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PatientTypee") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PatientTypee", selectId: "appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.appointment_scheduler.fields.PatientTypee.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_appointment_scheduler_PatientTypee">
<span<?= $Grid->PatientTypee->viewAttributes() ?>>
<?= $Grid->PatientTypee->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" data-hidden="1" name="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_PatientTypee" id="fappointment_schedulergrid$x<?= $Grid->RowIndex ?>_PatientTypee" value="<?= HtmlEncode($Grid->PatientTypee->FormValue) ?>">
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" data-hidden="1" name="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_PatientTypee" id="fappointment_schedulergrid$o<?= $Grid->RowIndex ?>_PatientTypee" value="<?= HtmlEncode($Grid->PatientTypee->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == ROWTYPE_ADD || $Grid->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid","load"], function () {
    fappointment_schedulergrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Grid->isGridAdd() || $Grid->CurrentMode == "copy")
        if (!$Grid->Recordset->EOF) {
            $Grid->Recordset->moveNext();
        }
}
?>
<?php
    if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy" || $Grid->CurrentMode == "edit") {
        $Grid->RowIndex = '$rowindex$';
        $Grid->loadRowValues();

        // Set row properties
        $Grid->resetAttributes();
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_appointment_scheduler", "data-rowtype" => ROWTYPE_ADD]);
        $Grid->RowAttrs->appendClass("ew-template");
        $Grid->RowType = ROWTYPE_ADD;

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();
        $Grid->StartRowCount = 0;
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowIndex);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_id" class="form-group appointment_scheduler_id"></span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_id" class="form-group appointment_scheduler_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->start_date->Visible) { // start_date ?>
        <td data-name="start_date">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_start_date" class="form-group appointment_scheduler_start_date">
<input type="<?= $Grid->start_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_start_date" data-format="11" name="x<?= $Grid->RowIndex ?>_start_date" id="x<?= $Grid->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Grid->start_date->getPlaceHolder()) ?>" value="<?= $Grid->start_date->EditValue ?>"<?= $Grid->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->start_date->getErrorMessage() ?></div>
<?php if (!$Grid->start_date->ReadOnly && !$Grid->start_date->Disabled && !isset($Grid->start_date->EditAttrs["readonly"]) && !isset($Grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_schedulergrid", "x<?= $Grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_start_date" class="form-group appointment_scheduler_start_date">
<span<?= $Grid->start_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->start_date->getDisplayValue($Grid->start_date->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" data-hidden="1" name="x<?= $Grid->RowIndex ?>_start_date" id="x<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_start_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_start_date" id="o<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->end_date->Visible) { // end_date ?>
        <td data-name="end_date">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_end_date" class="form-group appointment_scheduler_end_date">
<input type="<?= $Grid->end_date->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_end_date" data-format="11" name="x<?= $Grid->RowIndex ?>_end_date" id="x<?= $Grid->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Grid->end_date->getPlaceHolder()) ?>" value="<?= $Grid->end_date->EditValue ?>"<?= $Grid->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->end_date->getErrorMessage() ?></div>
<?php if (!$Grid->end_date->ReadOnly && !$Grid->end_date->Disabled && !isset($Grid->end_date->EditAttrs["readonly"]) && !isset($Grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fappointment_schedulergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fappointment_schedulergrid", "x<?= $Grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_end_date" class="form-group appointment_scheduler_end_date">
<span<?= $Grid->end_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->end_date->getDisplayValue($Grid->end_date->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" data-hidden="1" name="x<?= $Grid->RowIndex ?>_end_date" id="x<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_end_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_end_date" id="o<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patientID->Visible) { // patientID ?>
        <td data-name="patientID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_patientID" class="form-group appointment_scheduler_patientID">
<?php $Grid->patientID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_patientID"><?= EmptyValue(strval($Grid->patientID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->patientID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->patientID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->patientID->ReadOnly || $Grid->patientID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_patientID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->patientID->getErrorMessage() ?></div>
<?= $Grid->patientID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_patientID") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_patientID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->patientID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_patientID" id="x<?= $Grid->RowIndex ?>_patientID" value="<?= $Grid->patientID->CurrentValue ?>"<?= $Grid->patientID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_patientID" class="form-group appointment_scheduler_patientID">
<span<?= $Grid->patientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patientID->getDisplayValue($Grid->patientID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patientID" id="x<?= $Grid->RowIndex ?>_patientID" value="<?= HtmlEncode($Grid->patientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patientID" id="o<?= $Grid->RowIndex ?>_patientID" value="<?= HtmlEncode($Grid->patientID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patientName->Visible) { // patientName ?>
        <td data-name="patientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_patientName" class="form-group appointment_scheduler_patientName">
<input type="<?= $Grid->patientName->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_patientName" name="x<?= $Grid->RowIndex ?>_patientName" id="x<?= $Grid->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->patientName->getPlaceHolder()) ?>" value="<?= $Grid->patientName->EditValue ?>"<?= $Grid->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_patientName" class="form-group appointment_scheduler_patientName">
<span<?= $Grid->patientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patientName->getDisplayValue($Grid->patientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patientName" id="x<?= $Grid->RowIndex ?>_patientName" value="<?= HtmlEncode($Grid->patientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_patientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patientName" id="o<?= $Grid->RowIndex ?>_patientName" value="<?= HtmlEncode($Grid->patientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DoctorID->Visible) { // DoctorID ?>
        <td data-name="DoctorID">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->DoctorID->getSessionValue() != "") { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorID" class="form-group appointment_scheduler_DoctorID">
<span<?= $Grid->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DoctorID->getDisplayValue($Grid->DoctorID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DoctorID" name="x<?= $Grid->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Grid->DoctorID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorID" class="form-group appointment_scheduler_DoctorID">
<input type="<?= $Grid->DoctorID->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorID" name="x<?= $Grid->RowIndex ?>_DoctorID" id="x<?= $Grid->RowIndex ?>_DoctorID" size="3" maxlength="5" placeholder="<?= HtmlEncode($Grid->DoctorID->getPlaceHolder()) ?>" value="<?= $Grid->DoctorID->EditValue ?>"<?= $Grid->DoctorID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoctorID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorID" class="form-group appointment_scheduler_DoctorID">
<span<?= $Grid->DoctorID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DoctorID->getDisplayValue($Grid->DoctorID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DoctorID" id="x<?= $Grid->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Grid->DoctorID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DoctorID" id="o<?= $Grid->RowIndex ?>_DoctorID" value="<?= HtmlEncode($Grid->DoctorID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DoctorName->Visible) { // DoctorName ?>
        <td data-name="DoctorName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorName" class="form-group appointment_scheduler_DoctorName">
<?php $Grid->DoctorName->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_DoctorName"><?= EmptyValue(strval($Grid->DoctorName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->DoctorName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->DoctorName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->DoctorName->ReadOnly || $Grid->DoctorName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DoctorName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->DoctorName->getErrorMessage() ?></div>
<?= $Grid->DoctorName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DoctorName") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_DoctorName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->DoctorName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_DoctorName" id="x<?= $Grid->RowIndex ?>_DoctorName" value="<?= $Grid->DoctorName->CurrentValue ?>"<?= $Grid->DoctorName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorName" class="form-group appointment_scheduler_DoctorName">
<span<?= $Grid->DoctorName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DoctorName->getDisplayValue($Grid->DoctorName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DoctorName" id="x<?= $Grid->RowIndex ?>_DoctorName" value="<?= HtmlEncode($Grid->DoctorName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DoctorName" id="o<?= $Grid->RowIndex ?>_DoctorName" value="<?= HtmlEncode($Grid->DoctorName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AppointmentStatus->Visible) { // AppointmentStatus ?>
        <td data-name="AppointmentStatus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_AppointmentStatus" class="form-group appointment_scheduler_AppointmentStatus">
<input type="<?= $Grid->AppointmentStatus->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_AppointmentStatus" name="x<?= $Grid->RowIndex ?>_AppointmentStatus" id="x<?= $Grid->RowIndex ?>_AppointmentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AppointmentStatus->getPlaceHolder()) ?>" value="<?= $Grid->AppointmentStatus->EditValue ?>"<?= $Grid->AppointmentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AppointmentStatus->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_AppointmentStatus" class="form-group appointment_scheduler_AppointmentStatus">
<span<?= $Grid->AppointmentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AppointmentStatus->getDisplayValue($Grid->AppointmentStatus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AppointmentStatus" id="x<?= $Grid->RowIndex ?>_AppointmentStatus" value="<?= HtmlEncode($Grid->AppointmentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_AppointmentStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AppointmentStatus" id="o<?= $Grid->RowIndex ?>_AppointmentStatus" value="<?= HtmlEncode($Grid->AppointmentStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_status" class="form-group appointment_scheduler_status">
<template id="tp_x<?= $Grid->RowIndex ?>_status">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status"<?= $Grid->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_status[]"
    name="x<?= $Grid->RowIndex ?>_status[]"
    value="<?= HtmlEncode($Grid->status->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_status"
    data-target="dsl_x<?= $Grid->RowIndex ?>_status"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->status->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_status"
    data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
    <?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_status" class="form-group appointment_scheduler_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status[]" id="o<?= $Grid->RowIndex ?>_status[]" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DoctorCode->Visible) { // DoctorCode ?>
        <td data-name="DoctorCode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorCode" class="form-group appointment_scheduler_DoctorCode">
<input type="<?= $Grid->DoctorCode->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_DoctorCode" name="x<?= $Grid->RowIndex ?>_DoctorCode" id="x<?= $Grid->RowIndex ?>_DoctorCode" size="5" maxlength="7" placeholder="<?= HtmlEncode($Grid->DoctorCode->getPlaceHolder()) ?>" value="<?= $Grid->DoctorCode->EditValue ?>"<?= $Grid->DoctorCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DoctorCode->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_DoctorCode" class="form-group appointment_scheduler_DoctorCode">
<span<?= $Grid->DoctorCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DoctorCode->getDisplayValue($Grid->DoctorCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DoctorCode" id="x<?= $Grid->RowIndex ?>_DoctorCode" value="<?= HtmlEncode($Grid->DoctorCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_DoctorCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DoctorCode" id="o<?= $Grid->RowIndex ?>_DoctorCode" value="<?= HtmlEncode($Grid->DoctorCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Department->Visible) { // Department ?>
        <td data-name="Department">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Department" class="form-group appointment_scheduler_Department">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="8" maxlength="15" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Department" class="form-group appointment_scheduler_Department">
<span<?= $Grid->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Department->getDisplayValue($Grid->Department->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Department" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Department" id="o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->scheduler_id->Visible) { // scheduler_id ?>
        <td data-name="scheduler_id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_scheduler_id" class="form-group appointment_scheduler_scheduler_id">
<input type="<?= $Grid->scheduler_id->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_scheduler_id" name="x<?= $Grid->RowIndex ?>_scheduler_id" id="x<?= $Grid->RowIndex ?>_scheduler_id" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->scheduler_id->getPlaceHolder()) ?>" value="<?= $Grid->scheduler_id->EditValue ?>"<?= $Grid->scheduler_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->scheduler_id->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_scheduler_id" class="form-group appointment_scheduler_scheduler_id">
<span<?= $Grid->scheduler_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->scheduler_id->getDisplayValue($Grid->scheduler_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_scheduler_id" id="x<?= $Grid->RowIndex ?>_scheduler_id" value="<?= HtmlEncode($Grid->scheduler_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_scheduler_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_scheduler_id" id="o<?= $Grid->RowIndex ?>_scheduler_id" value="<?= HtmlEncode($Grid->scheduler_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->text->Visible) { // text ?>
        <td data-name="text">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_text" class="form-group appointment_scheduler_text">
<input type="<?= $Grid->text->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_text" name="x<?= $Grid->RowIndex ?>_text" id="x<?= $Grid->RowIndex ?>_text" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->text->getPlaceHolder()) ?>" value="<?= $Grid->text->EditValue ?>"<?= $Grid->text->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->text->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_text" class="form-group appointment_scheduler_text">
<span<?= $Grid->text->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->text->getDisplayValue($Grid->text->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" data-hidden="1" name="x<?= $Grid->RowIndex ?>_text" id="x<?= $Grid->RowIndex ?>_text" value="<?= HtmlEncode($Grid->text->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_text" data-hidden="1" name="o<?= $Grid->RowIndex ?>_text" id="o<?= $Grid->RowIndex ?>_text" value="<?= HtmlEncode($Grid->text->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->appointment_status->Visible) { // appointment_status ?>
        <td data-name="appointment_status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_appointment_status" class="form-group appointment_scheduler_appointment_status">
<input type="<?= $Grid->appointment_status->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_appointment_status" name="x<?= $Grid->RowIndex ?>_appointment_status" id="x<?= $Grid->RowIndex ?>_appointment_status" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->appointment_status->getPlaceHolder()) ?>" value="<?= $Grid->appointment_status->EditValue ?>"<?= $Grid->appointment_status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->appointment_status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_appointment_status" class="form-group appointment_scheduler_appointment_status">
<span<?= $Grid->appointment_status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->appointment_status->getDisplayValue($Grid->appointment_status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_appointment_status" id="x<?= $Grid->RowIndex ?>_appointment_status" value="<?= HtmlEncode($Grid->appointment_status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_appointment_status" id="o<?= $Grid->RowIndex ?>_appointment_status" value="<?= HtmlEncode($Grid->appointment_status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PId->Visible) { // PId ?>
        <td data-name="PId">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_PId" class="form-group appointment_scheduler_PId">
<input type="<?= $Grid->PId->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_PId" name="x<?= $Grid->RowIndex ?>_PId" id="x<?= $Grid->RowIndex ?>_PId" size="30" placeholder="<?= HtmlEncode($Grid->PId->getPlaceHolder()) ?>" value="<?= $Grid->PId->EditValue ?>"<?= $Grid->PId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PId->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_PId" class="form-group appointment_scheduler_PId">
<span<?= $Grid->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PId->getDisplayValue($Grid->PId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PId" id="x<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PId" id="o<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_MobileNumber" class="form-group appointment_scheduler_MobileNumber">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_MobileNumber" class="form-group appointment_scheduler_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MobileNumber->getDisplayValue($Grid->MobileNumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SchEmail->Visible) { // SchEmail ?>
        <td data-name="SchEmail">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_SchEmail" class="form-group appointment_scheduler_SchEmail">
<input type="<?= $Grid->SchEmail->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_SchEmail" name="x<?= $Grid->RowIndex ?>_SchEmail" id="x<?= $Grid->RowIndex ?>_SchEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SchEmail->getPlaceHolder()) ?>" value="<?= $Grid->SchEmail->EditValue ?>"<?= $Grid->SchEmail->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SchEmail->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_SchEmail" class="form-group appointment_scheduler_SchEmail">
<span<?= $Grid->SchEmail->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SchEmail->getDisplayValue($Grid->SchEmail->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SchEmail" id="x<?= $Grid->RowIndex ?>_SchEmail" value="<?= HtmlEncode($Grid->SchEmail->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_SchEmail" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SchEmail" id="o<?= $Grid->RowIndex ?>_SchEmail" value="<?= HtmlEncode($Grid->SchEmail->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->appointment_type->Visible) { // appointment_type ?>
        <td data-name="appointment_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_appointment_type" class="form-group appointment_scheduler_appointment_type">
<template id="tp_x<?= $Grid->RowIndex ?>_appointment_type">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_appointment_type" name="x<?= $Grid->RowIndex ?>_appointment_type" id="x<?= $Grid->RowIndex ?>_appointment_type"<?= $Grid->appointment_type->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_appointment_type" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_appointment_type"
    name="x<?= $Grid->RowIndex ?>_appointment_type"
    value="<?= HtmlEncode($Grid->appointment_type->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_appointment_type"
    data-target="dsl_x<?= $Grid->RowIndex ?>_appointment_type"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->appointment_type->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_appointment_type"
    data-value-separator="<?= $Grid->appointment_type->displayValueSeparatorAttribute() ?>"
    <?= $Grid->appointment_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->appointment_type->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_appointment_type" class="form-group appointment_scheduler_appointment_type">
<span<?= $Grid->appointment_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->appointment_type->getDisplayValue($Grid->appointment_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_appointment_type" id="x<?= $Grid->RowIndex ?>_appointment_type" value="<?= HtmlEncode($Grid->appointment_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_appointment_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_appointment_type" id="o<?= $Grid->RowIndex ?>_appointment_type" value="<?= HtmlEncode($Grid->appointment_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Notified->Visible) { // Notified ?>
        <td data-name="Notified">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Notified" class="form-group appointment_scheduler_Notified">
<template id="tp_x<?= $Grid->RowIndex ?>_Notified">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_Notified" name="x<?= $Grid->RowIndex ?>_Notified" id="x<?= $Grid->RowIndex ?>_Notified"<?= $Grid->Notified->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Notified" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Notified[]"
    name="x<?= $Grid->RowIndex ?>_Notified[]"
    value="<?= HtmlEncode($Grid->Notified->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Notified"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Notified"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Notified->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_Notified"
    data-value-separator="<?= $Grid->Notified->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Notified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Notified->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Notified" class="form-group appointment_scheduler_Notified">
<span<?= $Grid->Notified->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Notified->getDisplayValue($Grid->Notified->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Notified" id="x<?= $Grid->RowIndex ?>_Notified" value="<?= HtmlEncode($Grid->Notified->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notified" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Notified[]" id="o<?= $Grid->RowIndex ?>_Notified[]" value="<?= HtmlEncode($Grid->Notified->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Purpose->Visible) { // Purpose ?>
        <td data-name="Purpose">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Purpose" class="form-group appointment_scheduler_Purpose">
<input type="<?= $Grid->Purpose->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Purpose" name="x<?= $Grid->RowIndex ?>_Purpose" id="x<?= $Grid->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Purpose->getPlaceHolder()) ?>" value="<?= $Grid->Purpose->EditValue ?>"<?= $Grid->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Purpose->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Purpose" class="form-group appointment_scheduler_Purpose">
<span<?= $Grid->Purpose->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Purpose->getDisplayValue($Grid->Purpose->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Purpose" id="x<?= $Grid->RowIndex ?>_Purpose" value="<?= HtmlEncode($Grid->Purpose->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Purpose" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Purpose" id="o<?= $Grid->RowIndex ?>_Purpose" value="<?= HtmlEncode($Grid->Purpose->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Notes->Visible) { // Notes ?>
        <td data-name="Notes">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Notes" class="form-group appointment_scheduler_Notes">
<input type="<?= $Grid->Notes->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_Notes" name="x<?= $Grid->RowIndex ?>_Notes" id="x<?= $Grid->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Notes->getPlaceHolder()) ?>" value="<?= $Grid->Notes->EditValue ?>"<?= $Grid->Notes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Notes->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Notes" class="form-group appointment_scheduler_Notes">
<span<?= $Grid->Notes->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Notes->getDisplayValue($Grid->Notes->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Notes" id="x<?= $Grid->RowIndex ?>_Notes" value="<?= HtmlEncode($Grid->Notes->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Notes" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Notes" id="o<?= $Grid->RowIndex ?>_Notes" value="<?= HtmlEncode($Grid->Notes->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientType->Visible) { // PatientType ?>
        <td data-name="PatientType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_PatientType" class="form-group appointment_scheduler_PatientType">
<template id="tp_x<?= $Grid->RowIndex ?>_PatientType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="appointment_scheduler" data-field="x_PatientType" name="x<?= $Grid->RowIndex ?>_PatientType" id="x<?= $Grid->RowIndex ?>_PatientType"<?= $Grid->PatientType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_PatientType" class="ew-item-list"></div>
<?php $Grid->PatientType->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_PatientType"
    name="x<?= $Grid->RowIndex ?>_PatientType"
    value="<?= HtmlEncode($Grid->PatientType->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Grid->RowIndex ?>_PatientType"
    data-target="dsl_x<?= $Grid->RowIndex ?>_PatientType"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->PatientType->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_PatientType"
    data-value-separator="<?= $Grid->PatientType->displayValueSeparatorAttribute() ?>"
    <?= $Grid->PatientType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_PatientType" class="form-group appointment_scheduler_PatientType">
<span<?= $Grid->PatientType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientType->getDisplayValue($Grid->PatientType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientType" id="x<?= $Grid->RowIndex ?>_PatientType" value="<?= HtmlEncode($Grid->PatientType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientType" id="o<?= $Grid->RowIndex ?>_PatientType" value="<?= HtmlEncode($Grid->PatientType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Referal->Visible) { // Referal ?>
        <td data-name="Referal">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_Referal" class="form-group appointment_scheduler_Referal">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Referal"><?= EmptyValue(strval($Grid->Referal->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Referal->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Referal->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Referal->ReadOnly || $Grid->Referal->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Referal',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "mas_reference_type") && !$Grid->Referal->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_Referal" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->Referal->caption() ?>" data-title="<?= $Grid->Referal->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Referal',url:'<?= GetUrl("MasReferenceTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Referal->getErrorMessage() ?></div>
<?= $Grid->Referal->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Referal") ?>
<input type="hidden" is="selection-list" data-table="appointment_scheduler" data-field="x_Referal" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Referal->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Referal" id="x<?= $Grid->RowIndex ?>_Referal" value="<?= $Grid->Referal->CurrentValue ?>"<?= $Grid->Referal->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_Referal" class="form-group appointment_scheduler_Referal">
<span<?= $Grid->Referal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Referal->getDisplayValue($Grid->Referal->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Referal" id="x<?= $Grid->RowIndex ?>_Referal" value="<?= HtmlEncode($Grid->Referal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_Referal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Referal" id="o<?= $Grid->RowIndex ?>_Referal" value="<?= HtmlEncode($Grid->Referal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->paymentType->Visible) { // paymentType ?>
        <td data-name="paymentType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_paymentType" class="form-group appointment_scheduler_paymentType">
<input type="<?= $Grid->paymentType->getInputTextType() ?>" data-table="appointment_scheduler" data-field="x_paymentType" name="x<?= $Grid->RowIndex ?>_paymentType" id="x<?= $Grid->RowIndex ?>_paymentType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->paymentType->getPlaceHolder()) ?>" value="<?= $Grid->paymentType->EditValue ?>"<?= $Grid->paymentType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->paymentType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_paymentType" class="form-group appointment_scheduler_paymentType">
<span<?= $Grid->paymentType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->paymentType->getDisplayValue($Grid->paymentType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_paymentType" id="x<?= $Grid->RowIndex ?>_paymentType" value="<?= HtmlEncode($Grid->paymentType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_paymentType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_paymentType" id="o<?= $Grid->RowIndex ?>_paymentType" value="<?= HtmlEncode($Grid->paymentType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_WhereDidYouHear" class="form-group appointment_scheduler_WhereDidYouHear">
<template id="tp_x<?= $Grid->RowIndex ?>_WhereDidYouHear">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear"<?= $Grid->WhereDidYouHear->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_WhereDidYouHear" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_WhereDidYouHear[]"
    name="x<?= $Grid->RowIndex ?>_WhereDidYouHear[]"
    value="<?= HtmlEncode($Grid->WhereDidYouHear->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_WhereDidYouHear"
    data-target="dsl_x<?= $Grid->RowIndex ?>_WhereDidYouHear"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->WhereDidYouHear->isInvalidClass() ?>"
    data-table="appointment_scheduler"
    data-field="x_WhereDidYouHear"
    data-value-separator="<?= $Grid->WhereDidYouHear->displayValueSeparatorAttribute() ?>"
    <?= $Grid->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WhereDidYouHear->getErrorMessage() ?></div>
<?= $Grid->WhereDidYouHear->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_WhereDidYouHear") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_WhereDidYouHear" class="form-group appointment_scheduler_WhereDidYouHear">
<span<?= $Grid->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->WhereDidYouHear->getDisplayValue($Grid->WhereDidYouHear->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-hidden="1" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_WhereDidYouHear" data-hidden="1" name="o<?= $Grid->RowIndex ?>_WhereDidYouHear[]" id="o<?= $Grid->RowIndex ?>_WhereDidYouHear[]" value="<?= HtmlEncode($Grid->WhereDidYouHear->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_HospID" class="form-group appointment_scheduler_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdBy->Visible) { // createdBy ?>
        <td data-name="createdBy">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_createdBy" class="form-group appointment_scheduler_createdBy">
<span<?= $Grid->createdBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdBy->getDisplayValue($Grid->createdBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdBy" id="x<?= $Grid->RowIndex ?>_createdBy" value="<?= HtmlEncode($Grid->createdBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdBy" id="o<?= $Grid->RowIndex ?>_createdBy" value="<?= HtmlEncode($Grid->createdBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdDateTime->Visible) { // createdDateTime ?>
        <td data-name="createdDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_createdDateTime" class="form-group appointment_scheduler_createdDateTime">
<span<?= $Grid->createdDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDateTime->getDisplayValue($Grid->createdDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdDateTime" id="x<?= $Grid->RowIndex ?>_createdDateTime" value="<?= HtmlEncode($Grid->createdDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_createdDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdDateTime" id="o<?= $Grid->RowIndex ?>_createdDateTime" value="<?= HtmlEncode($Grid->createdDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientTypee->Visible) { // PatientTypee ?>
        <td data-name="PatientTypee">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_appointment_scheduler_PatientTypee" class="form-group appointment_scheduler_PatientTypee">
    <select
        id="x<?= $Grid->RowIndex ?>_PatientTypee"
        name="x<?= $Grid->RowIndex ?>_PatientTypee"
        class="form-control ew-select<?= $Grid->PatientTypee->isInvalidClass() ?>"
        data-select2-id="appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee"
        data-table="appointment_scheduler"
        data-field="x_PatientTypee"
        data-value-separator="<?= $Grid->PatientTypee->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PatientTypee->getPlaceHolder()) ?>"
        <?= $Grid->PatientTypee->editAttributes() ?>>
        <?= $Grid->PatientTypee->selectOptionListHtml("x{$Grid->RowIndex}_PatientTypee") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PatientTypee->getErrorMessage() ?></div>
<?= $Grid->PatientTypee->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PatientTypee") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PatientTypee", selectId: "appointment_scheduler_x<?= $Grid->RowIndex ?>_PatientTypee", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.appointment_scheduler.fields.PatientTypee.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_appointment_scheduler_PatientTypee" class="form-group appointment_scheduler_PatientTypee">
<span<?= $Grid->PatientTypee->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientTypee->getDisplayValue($Grid->PatientTypee->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientTypee" id="x<?= $Grid->RowIndex ?>_PatientTypee" value="<?= HtmlEncode($Grid->PatientTypee->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="appointment_scheduler" data-field="x_PatientTypee" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientTypee" id="o<?= $Grid->RowIndex ?>_PatientTypee" value="<?= HtmlEncode($Grid->PatientTypee->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fappointment_schedulergrid","load"], function() {
    fappointment_schedulergrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "edit") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fappointment_schedulergrid">
</div><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Grid->Recordset) {
    $Grid->Recordset->close();
}
?>
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $Grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Grid->TotalRecords == 0 && !$Grid->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$Grid->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("appointment_scheduler");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_appointment_scheduler",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientRoomGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_roomgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_roomgrid = new ew.Form("fpatient_roomgrid", "grid");
    fpatient_roomgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_room")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_room)
        ew.vars.tables.patient_room = currentTable;
    fpatient_roomgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["RoomID", [fields.RoomID.visible && fields.RoomID.required ? ew.Validators.required(fields.RoomID.caption) : null], fields.RoomID.isInvalid],
        ["RoomNo", [fields.RoomNo.visible && fields.RoomNo.required ? ew.Validators.required(fields.RoomNo.caption) : null], fields.RoomNo.isInvalid],
        ["RoomType", [fields.RoomType.visible && fields.RoomType.required ? ew.Validators.required(fields.RoomType.caption) : null], fields.RoomType.isInvalid],
        ["SharingRoom", [fields.SharingRoom.visible && fields.SharingRoom.required ? ew.Validators.required(fields.SharingRoom.caption) : null], fields.SharingRoom.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["Startdatetime", [fields.Startdatetime.visible && fields.Startdatetime.required ? ew.Validators.required(fields.Startdatetime.caption) : null, ew.Validators.datetime(0)], fields.Startdatetime.isInvalid],
        ["Enddatetime", [fields.Enddatetime.visible && fields.Enddatetime.required ? ew.Validators.required(fields.Enddatetime.caption) : null, ew.Validators.datetime(0)], fields.Enddatetime.isInvalid],
        ["DaysHours", [fields.DaysHours.visible && fields.DaysHours.required ? ew.Validators.required(fields.DaysHours.caption) : null], fields.DaysHours.isInvalid],
        ["Days", [fields.Days.visible && fields.Days.required ? ew.Validators.required(fields.Days.caption) : null, ew.Validators.integer], fields.Days.isInvalid],
        ["Hours", [fields.Hours.visible && fields.Hours.required ? ew.Validators.required(fields.Hours.caption) : null, ew.Validators.integer], fields.Hours.isInvalid],
        ["TotalAmount", [fields.TotalAmount.visible && fields.TotalAmount.required ? ew.Validators.required(fields.TotalAmount.caption) : null, ew.Validators.float], fields.TotalAmount.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_roomgrid,
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
    fpatient_roomgrid.validate = function () {
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
    fpatient_roomgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RoomID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RoomNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RoomType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SharingRoom", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Startdatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Enddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DaysHours", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Days", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Hours", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TotalAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MobileNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_roomgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_roomgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_roomgrid.lists.Reception = <?= $Grid->Reception->toClientList($Grid) ?>;
    fpatient_roomgrid.lists.RoomID = <?= $Grid->RoomID->toClientList($Grid) ?>;
    loadjs.done("fpatient_roomgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_room">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_roomgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_room" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_roomgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_room_id" class="patient_room_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Grid->Reception->headerCellClass() ?>"><div id="elh_patient_room_Reception" class="patient_room_Reception"><?= $Grid->renderSort($Grid->Reception) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Grid->PatientId->headerCellClass() ?>"><div id="elh_patient_room_PatientId" class="patient_room_PatientId"><?= $Grid->renderSort($Grid->PatientId) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_patient_room_mrnno" class="patient_room_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_patient_room_PatientName" class="patient_room_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Grid->Gender->headerCellClass() ?>"><div id="elh_patient_room_Gender" class="patient_room_Gender"><?= $Grid->renderSort($Grid->Gender) ?></div></th>
<?php } ?>
<?php if ($Grid->RoomID->Visible) { // RoomID ?>
        <th data-name="RoomID" class="<?= $Grid->RoomID->headerCellClass() ?>"><div id="elh_patient_room_RoomID" class="patient_room_RoomID"><?= $Grid->renderSort($Grid->RoomID) ?></div></th>
<?php } ?>
<?php if ($Grid->RoomNo->Visible) { // RoomNo ?>
        <th data-name="RoomNo" class="<?= $Grid->RoomNo->headerCellClass() ?>"><div id="elh_patient_room_RoomNo" class="patient_room_RoomNo"><?= $Grid->renderSort($Grid->RoomNo) ?></div></th>
<?php } ?>
<?php if ($Grid->RoomType->Visible) { // RoomType ?>
        <th data-name="RoomType" class="<?= $Grid->RoomType->headerCellClass() ?>"><div id="elh_patient_room_RoomType" class="patient_room_RoomType"><?= $Grid->renderSort($Grid->RoomType) ?></div></th>
<?php } ?>
<?php if ($Grid->SharingRoom->Visible) { // SharingRoom ?>
        <th data-name="SharingRoom" class="<?= $Grid->SharingRoom->headerCellClass() ?>"><div id="elh_patient_room_SharingRoom" class="patient_room_SharingRoom"><?= $Grid->renderSort($Grid->SharingRoom) ?></div></th>
<?php } ?>
<?php if ($Grid->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Grid->Amount->headerCellClass() ?>"><div id="elh_patient_room_Amount" class="patient_room_Amount"><?= $Grid->renderSort($Grid->Amount) ?></div></th>
<?php } ?>
<?php if ($Grid->Startdatetime->Visible) { // Startdatetime ?>
        <th data-name="Startdatetime" class="<?= $Grid->Startdatetime->headerCellClass() ?>"><div id="elh_patient_room_Startdatetime" class="patient_room_Startdatetime"><?= $Grid->renderSort($Grid->Startdatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->Enddatetime->Visible) { // Enddatetime ?>
        <th data-name="Enddatetime" class="<?= $Grid->Enddatetime->headerCellClass() ?>"><div id="elh_patient_room_Enddatetime" class="patient_room_Enddatetime"><?= $Grid->renderSort($Grid->Enddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->DaysHours->Visible) { // DaysHours ?>
        <th data-name="DaysHours" class="<?= $Grid->DaysHours->headerCellClass() ?>"><div id="elh_patient_room_DaysHours" class="patient_room_DaysHours"><?= $Grid->renderSort($Grid->DaysHours) ?></div></th>
<?php } ?>
<?php if ($Grid->Days->Visible) { // Days ?>
        <th data-name="Days" class="<?= $Grid->Days->headerCellClass() ?>"><div id="elh_patient_room_Days" class="patient_room_Days"><?= $Grid->renderSort($Grid->Days) ?></div></th>
<?php } ?>
<?php if ($Grid->Hours->Visible) { // Hours ?>
        <th data-name="Hours" class="<?= $Grid->Hours->headerCellClass() ?>"><div id="elh_patient_room_Hours" class="patient_room_Hours"><?= $Grid->renderSort($Grid->Hours) ?></div></th>
<?php } ?>
<?php if ($Grid->TotalAmount->Visible) { // TotalAmount ?>
        <th data-name="TotalAmount" class="<?= $Grid->TotalAmount->headerCellClass() ?>"><div id="elh_patient_room_TotalAmount" class="patient_room_TotalAmount"><?= $Grid->renderSort($Grid->TotalAmount) ?></div></th>
<?php } ?>
<?php if ($Grid->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Grid->PatID->headerCellClass() ?>"><div id="elh_patient_room_PatID" class="patient_room_PatID"><?= $Grid->renderSort($Grid->PatID) ?></div></th>
<?php } ?>
<?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_room_MobileNumber" class="patient_room_MobileNumber"><?= $Grid->renderSort($Grid->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_patient_room_HospID" class="patient_room_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_patient_room_status" class="patient_room_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_patient_room_createdby" class="patient_room_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_patient_room_createddatetime" class="patient_room_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_patient_room_modifiedby" class="patient_room_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_room_modifieddatetime" class="patient_room_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_room", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_room_id" class="form-group"></span>
<input type="hidden" data-table="patient_room" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_id" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_id" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_room" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Grid->Reception->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Reception" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Reception"><?= EmptyValue(strval($Grid->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Reception->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Reception->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Reception->ReadOnly || $Grid->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
<?= $Grid->Reception->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Reception") ?>
<input type="hidden" is="selection-list" data-table="patient_room" data-field="x_Reception" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Reception->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= $Grid->Reception->CurrentValue ?>"<?= $Grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<?= $Grid->Reception->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Reception" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Reception" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Grid->PatientId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_room" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<?= $Grid->PatientId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_PatientId" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientId" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_PatientId" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_room" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_mrnno" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_mrnno" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_mrnno" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_room" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_room" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_PatientName" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatientName" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_PatientName" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Grid->Gender->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_room" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_room" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<?= $Grid->Gender->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Gender" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Gender" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Gender" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Gender" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RoomID->Visible) { // RoomID ?>
        <td data-name="RoomID" <?= $Grid->RoomID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomID" class="form-group">
<?php $Grid->RoomID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_RoomID"><?= EmptyValue(strval($Grid->RoomID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->RoomID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->RoomID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->RoomID->ReadOnly || $Grid->RoomID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->RoomID->getErrorMessage() ?></div>
<?= $Grid->RoomID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_RoomID") ?>
<input type="hidden" is="selection-list" data-table="patient_room" data-field="x_RoomID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->RoomID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_RoomID" id="x<?= $Grid->RowIndex ?>_RoomID" value="<?= $Grid->RoomID->CurrentValue ?>"<?= $Grid->RoomID->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RoomID" id="o<?= $Grid->RowIndex ?>_RoomID" value="<?= HtmlEncode($Grid->RoomID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomID" class="form-group">
<?php $Grid->RoomID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_RoomID"><?= EmptyValue(strval($Grid->RoomID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->RoomID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->RoomID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->RoomID->ReadOnly || $Grid->RoomID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->RoomID->getErrorMessage() ?></div>
<?= $Grid->RoomID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_RoomID") ?>
<input type="hidden" is="selection-list" data-table="patient_room" data-field="x_RoomID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->RoomID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_RoomID" id="x<?= $Grid->RowIndex ?>_RoomID" value="<?= $Grid->RoomID->CurrentValue ?>"<?= $Grid->RoomID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomID">
<span<?= $Grid->RoomID->viewAttributes() ?>>
<?= $Grid->RoomID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_RoomID" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_RoomID" value="<?= HtmlEncode($Grid->RoomID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_RoomID" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_RoomID" value="<?= HtmlEncode($Grid->RoomID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RoomNo->Visible) { // RoomNo ?>
        <td data-name="RoomNo" <?= $Grid->RoomNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomNo" class="form-group">
<input type="<?= $Grid->RoomNo->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomNo" name="x<?= $Grid->RowIndex ?>_RoomNo" id="x<?= $Grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RoomNo->getPlaceHolder()) ?>" value="<?= $Grid->RoomNo->EditValue ?>"<?= $Grid->RoomNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RoomNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RoomNo" id="o<?= $Grid->RowIndex ?>_RoomNo" value="<?= HtmlEncode($Grid->RoomNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomNo" class="form-group">
<input type="<?= $Grid->RoomNo->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomNo" name="x<?= $Grid->RowIndex ?>_RoomNo" id="x<?= $Grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RoomNo->getPlaceHolder()) ?>" value="<?= $Grid->RoomNo->EditValue ?>"<?= $Grid->RoomNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RoomNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomNo">
<span<?= $Grid->RoomNo->viewAttributes() ?>>
<?= $Grid->RoomNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_RoomNo" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_RoomNo" value="<?= HtmlEncode($Grid->RoomNo->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_RoomNo" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_RoomNo" value="<?= HtmlEncode($Grid->RoomNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RoomType->Visible) { // RoomType ?>
        <td data-name="RoomType" <?= $Grid->RoomType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomType" class="form-group">
<input type="<?= $Grid->RoomType->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomType" name="x<?= $Grid->RowIndex ?>_RoomType" id="x<?= $Grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RoomType->getPlaceHolder()) ?>" value="<?= $Grid->RoomType->EditValue ?>"<?= $Grid->RoomType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RoomType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RoomType" id="o<?= $Grid->RowIndex ?>_RoomType" value="<?= HtmlEncode($Grid->RoomType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomType" class="form-group">
<input type="<?= $Grid->RoomType->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomType" name="x<?= $Grid->RowIndex ?>_RoomType" id="x<?= $Grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RoomType->getPlaceHolder()) ?>" value="<?= $Grid->RoomType->EditValue ?>"<?= $Grid->RoomType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RoomType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_RoomType">
<span<?= $Grid->RoomType->viewAttributes() ?>>
<?= $Grid->RoomType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_RoomType" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_RoomType" value="<?= HtmlEncode($Grid->RoomType->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_RoomType" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_RoomType" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_RoomType" value="<?= HtmlEncode($Grid->RoomType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SharingRoom->Visible) { // SharingRoom ?>
        <td data-name="SharingRoom" <?= $Grid->SharingRoom->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_SharingRoom" class="form-group">
<input type="<?= $Grid->SharingRoom->getInputTextType() ?>" data-table="patient_room" data-field="x_SharingRoom" name="x<?= $Grid->RowIndex ?>_SharingRoom" id="x<?= $Grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SharingRoom->getPlaceHolder()) ?>" value="<?= $Grid->SharingRoom->EditValue ?>"<?= $Grid->SharingRoom->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SharingRoom->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SharingRoom" id="o<?= $Grid->RowIndex ?>_SharingRoom" value="<?= HtmlEncode($Grid->SharingRoom->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_SharingRoom" class="form-group">
<input type="<?= $Grid->SharingRoom->getInputTextType() ?>" data-table="patient_room" data-field="x_SharingRoom" name="x<?= $Grid->RowIndex ?>_SharingRoom" id="x<?= $Grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SharingRoom->getPlaceHolder()) ?>" value="<?= $Grid->SharingRoom->EditValue ?>"<?= $Grid->SharingRoom->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SharingRoom->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_SharingRoom">
<span<?= $Grid->SharingRoom->viewAttributes() ?>>
<?= $Grid->SharingRoom->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_SharingRoom" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_SharingRoom" value="<?= HtmlEncode($Grid->SharingRoom->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_SharingRoom" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_SharingRoom" value="<?= HtmlEncode($Grid->SharingRoom->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Grid->Amount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Amount" class="form-group">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="patient_room" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Amount" id="o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Amount" class="form-group">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="patient_room" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Amount">
<span<?= $Grid->Amount->viewAttributes() ?>>
<?= $Grid->Amount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Amount" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Amount" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Amount" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Amount" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Startdatetime->Visible) { // Startdatetime ?>
        <td data-name="Startdatetime" <?= $Grid->Startdatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Startdatetime" class="form-group">
<input type="<?= $Grid->Startdatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Startdatetime" name="x<?= $Grid->RowIndex ?>_Startdatetime" id="x<?= $Grid->RowIndex ?>_Startdatetime" placeholder="<?= HtmlEncode($Grid->Startdatetime->getPlaceHolder()) ?>" value="<?= $Grid->Startdatetime->EditValue ?>"<?= $Grid->Startdatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Startdatetime->getErrorMessage() ?></div>
<?php if (!$Grid->Startdatetime->ReadOnly && !$Grid->Startdatetime->Disabled && !isset($Grid->Startdatetime->EditAttrs["readonly"]) && !isset($Grid->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomgrid", "x<?= $Grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Startdatetime" id="o<?= $Grid->RowIndex ?>_Startdatetime" value="<?= HtmlEncode($Grid->Startdatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Startdatetime" class="form-group">
<input type="<?= $Grid->Startdatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Startdatetime" name="x<?= $Grid->RowIndex ?>_Startdatetime" id="x<?= $Grid->RowIndex ?>_Startdatetime" placeholder="<?= HtmlEncode($Grid->Startdatetime->getPlaceHolder()) ?>" value="<?= $Grid->Startdatetime->EditValue ?>"<?= $Grid->Startdatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Startdatetime->getErrorMessage() ?></div>
<?php if (!$Grid->Startdatetime->ReadOnly && !$Grid->Startdatetime->Disabled && !isset($Grid->Startdatetime->EditAttrs["readonly"]) && !isset($Grid->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomgrid", "x<?= $Grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Startdatetime">
<span<?= $Grid->Startdatetime->viewAttributes() ?>>
<?= $Grid->Startdatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Startdatetime" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Startdatetime" value="<?= HtmlEncode($Grid->Startdatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Startdatetime" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Startdatetime" value="<?= HtmlEncode($Grid->Startdatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Enddatetime->Visible) { // Enddatetime ?>
        <td data-name="Enddatetime" <?= $Grid->Enddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Enddatetime" class="form-group">
<input type="<?= $Grid->Enddatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Enddatetime" name="x<?= $Grid->RowIndex ?>_Enddatetime" id="x<?= $Grid->RowIndex ?>_Enddatetime" placeholder="<?= HtmlEncode($Grid->Enddatetime->getPlaceHolder()) ?>" value="<?= $Grid->Enddatetime->EditValue ?>"<?= $Grid->Enddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Enddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->Enddatetime->ReadOnly && !$Grid->Enddatetime->Disabled && !isset($Grid->Enddatetime->EditAttrs["readonly"]) && !isset($Grid->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomgrid", "x<?= $Grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Enddatetime" id="o<?= $Grid->RowIndex ?>_Enddatetime" value="<?= HtmlEncode($Grid->Enddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Enddatetime" class="form-group">
<input type="<?= $Grid->Enddatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Enddatetime" name="x<?= $Grid->RowIndex ?>_Enddatetime" id="x<?= $Grid->RowIndex ?>_Enddatetime" placeholder="<?= HtmlEncode($Grid->Enddatetime->getPlaceHolder()) ?>" value="<?= $Grid->Enddatetime->EditValue ?>"<?= $Grid->Enddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Enddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->Enddatetime->ReadOnly && !$Grid->Enddatetime->Disabled && !isset($Grid->Enddatetime->EditAttrs["readonly"]) && !isset($Grid->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomgrid", "x<?= $Grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Enddatetime">
<span<?= $Grid->Enddatetime->viewAttributes() ?>>
<?= $Grid->Enddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Enddatetime" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Enddatetime" value="<?= HtmlEncode($Grid->Enddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Enddatetime" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Enddatetime" value="<?= HtmlEncode($Grid->Enddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DaysHours->Visible) { // DaysHours ?>
        <td data-name="DaysHours" <?= $Grid->DaysHours->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_DaysHours" class="form-group">
<input type="<?= $Grid->DaysHours->getInputTextType() ?>" data-table="patient_room" data-field="x_DaysHours" name="x<?= $Grid->RowIndex ?>_DaysHours" id="x<?= $Grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DaysHours->getPlaceHolder()) ?>" value="<?= $Grid->DaysHours->EditValue ?>"<?= $Grid->DaysHours->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DaysHours->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DaysHours" id="o<?= $Grid->RowIndex ?>_DaysHours" value="<?= HtmlEncode($Grid->DaysHours->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_DaysHours" class="form-group">
<input type="<?= $Grid->DaysHours->getInputTextType() ?>" data-table="patient_room" data-field="x_DaysHours" name="x<?= $Grid->RowIndex ?>_DaysHours" id="x<?= $Grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DaysHours->getPlaceHolder()) ?>" value="<?= $Grid->DaysHours->EditValue ?>"<?= $Grid->DaysHours->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DaysHours->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_DaysHours">
<span<?= $Grid->DaysHours->viewAttributes() ?>>
<?= $Grid->DaysHours->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_DaysHours" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_DaysHours" value="<?= HtmlEncode($Grid->DaysHours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_DaysHours" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_DaysHours" value="<?= HtmlEncode($Grid->DaysHours->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Days->Visible) { // Days ?>
        <td data-name="Days" <?= $Grid->Days->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Days" class="form-group">
<input type="<?= $Grid->Days->getInputTextType() ?>" data-table="patient_room" data-field="x_Days" name="x<?= $Grid->RowIndex ?>_Days" id="x<?= $Grid->RowIndex ?>_Days" size="30" placeholder="<?= HtmlEncode($Grid->Days->getPlaceHolder()) ?>" value="<?= $Grid->Days->EditValue ?>"<?= $Grid->Days->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Days->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Days" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Days" id="o<?= $Grid->RowIndex ?>_Days" value="<?= HtmlEncode($Grid->Days->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Days" class="form-group">
<input type="<?= $Grid->Days->getInputTextType() ?>" data-table="patient_room" data-field="x_Days" name="x<?= $Grid->RowIndex ?>_Days" id="x<?= $Grid->RowIndex ?>_Days" size="30" placeholder="<?= HtmlEncode($Grid->Days->getPlaceHolder()) ?>" value="<?= $Grid->Days->EditValue ?>"<?= $Grid->Days->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Days->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Days">
<span<?= $Grid->Days->viewAttributes() ?>>
<?= $Grid->Days->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Days" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Days" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Days" value="<?= HtmlEncode($Grid->Days->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Days" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Days" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Days" value="<?= HtmlEncode($Grid->Days->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Hours->Visible) { // Hours ?>
        <td data-name="Hours" <?= $Grid->Hours->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Hours" class="form-group">
<input type="<?= $Grid->Hours->getInputTextType() ?>" data-table="patient_room" data-field="x_Hours" name="x<?= $Grid->RowIndex ?>_Hours" id="x<?= $Grid->RowIndex ?>_Hours" size="30" placeholder="<?= HtmlEncode($Grid->Hours->getPlaceHolder()) ?>" value="<?= $Grid->Hours->EditValue ?>"<?= $Grid->Hours->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Hours->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Hours" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Hours" id="o<?= $Grid->RowIndex ?>_Hours" value="<?= HtmlEncode($Grid->Hours->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Hours" class="form-group">
<input type="<?= $Grid->Hours->getInputTextType() ?>" data-table="patient_room" data-field="x_Hours" name="x<?= $Grid->RowIndex ?>_Hours" id="x<?= $Grid->RowIndex ?>_Hours" size="30" placeholder="<?= HtmlEncode($Grid->Hours->getPlaceHolder()) ?>" value="<?= $Grid->Hours->EditValue ?>"<?= $Grid->Hours->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Hours->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_Hours">
<span<?= $Grid->Hours->viewAttributes() ?>>
<?= $Grid->Hours->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_Hours" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Hours" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_Hours" value="<?= HtmlEncode($Grid->Hours->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_Hours" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Hours" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_Hours" value="<?= HtmlEncode($Grid->Hours->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TotalAmount->Visible) { // TotalAmount ?>
        <td data-name="TotalAmount" <?= $Grid->TotalAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_TotalAmount" class="form-group">
<input type="<?= $Grid->TotalAmount->getInputTextType() ?>" data-table="patient_room" data-field="x_TotalAmount" name="x<?= $Grid->RowIndex ?>_TotalAmount" id="x<?= $Grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?= HtmlEncode($Grid->TotalAmount->getPlaceHolder()) ?>" value="<?= $Grid->TotalAmount->EditValue ?>"<?= $Grid->TotalAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalAmount" id="o<?= $Grid->RowIndex ?>_TotalAmount" value="<?= HtmlEncode($Grid->TotalAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_TotalAmount" class="form-group">
<input type="<?= $Grid->TotalAmount->getInputTextType() ?>" data-table="patient_room" data-field="x_TotalAmount" name="x<?= $Grid->RowIndex ?>_TotalAmount" id="x<?= $Grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?= HtmlEncode($Grid->TotalAmount->getPlaceHolder()) ?>" value="<?= $Grid->TotalAmount->EditValue ?>"<?= $Grid->TotalAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_TotalAmount">
<span<?= $Grid->TotalAmount->viewAttributes() ?>>
<?= $Grid->TotalAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_TotalAmount" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_TotalAmount" value="<?= HtmlEncode($Grid->TotalAmount->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_TotalAmount" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_TotalAmount" value="<?= HtmlEncode($Grid->TotalAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Grid->PatID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PatID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatID" class="form-group">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatID" name="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_room" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->PatID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatID" class="form-group">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatID" name="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_room" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<?= $Grid->PatID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_PatID" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_PatID" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_PatID" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Grid->MobileNumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_room" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_room" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<?= $Grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_MobileNumber" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_MobileNumber" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_HospID" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_HospID" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_HospID" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="patient_room" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_room" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="patient_room" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_status" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_status" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_status" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_status" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_createdby" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createdby" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_createdby" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_room_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" data-hidden="1" name="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fpatient_roomgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" data-hidden="1" name="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fpatient_roomgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
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
loadjs.ready(["fpatient_roomgrid","load"], function () {
    fpatient_roomgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_room", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_room_id" class="form-group patient_room_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_id" class="form-group patient_room_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_Reception"><?= EmptyValue(strval($Grid->Reception->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->Reception->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Reception->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->Reception->ReadOnly || $Grid->Reception->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Reception',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
<?= $Grid->Reception->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Reception") ?>
<input type="hidden" is="selection-list" data-table="patient_room" data-field="x_Reception" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Reception->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= $Grid->Reception->CurrentValue ?>"<?= $Grid->Reception->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Reception" class="form-group patient_room_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_PatientId" class="form-group patient_room_PatientId">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_room" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatientId" class="form-group patient_room_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_room" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_mrnno" class="form-group patient_room_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_PatientName" class="form-group patient_room_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_room" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatientName" class="form-group patient_room_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Gender" class="form-group patient_room_Gender">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_room" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Gender" class="form-group patient_room_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gender->getDisplayValue($Grid->Gender->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Gender" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RoomID->Visible) { // RoomID ?>
        <td data-name="RoomID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomID" class="form-group patient_room_RoomID">
<?php $Grid->RoomID->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_RoomID"><?= EmptyValue(strval($Grid->RoomID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->RoomID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->RoomID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->RoomID->ReadOnly || $Grid->RoomID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_RoomID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->RoomID->getErrorMessage() ?></div>
<?= $Grid->RoomID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_RoomID") ?>
<input type="hidden" is="selection-list" data-table="patient_room" data-field="x_RoomID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->RoomID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_RoomID" id="x<?= $Grid->RowIndex ?>_RoomID" value="<?= $Grid->RoomID->CurrentValue ?>"<?= $Grid->RoomID->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomID" class="form-group patient_room_RoomID">
<span<?= $Grid->RoomID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RoomID->getDisplayValue($Grid->RoomID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RoomID" id="x<?= $Grid->RowIndex ?>_RoomID" value="<?= HtmlEncode($Grid->RoomID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RoomID" id="o<?= $Grid->RowIndex ?>_RoomID" value="<?= HtmlEncode($Grid->RoomID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RoomNo->Visible) { // RoomNo ?>
        <td data-name="RoomNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomNo" class="form-group patient_room_RoomNo">
<input type="<?= $Grid->RoomNo->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomNo" name="x<?= $Grid->RowIndex ?>_RoomNo" id="x<?= $Grid->RowIndex ?>_RoomNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RoomNo->getPlaceHolder()) ?>" value="<?= $Grid->RoomNo->EditValue ?>"<?= $Grid->RoomNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RoomNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomNo" class="form-group patient_room_RoomNo">
<span<?= $Grid->RoomNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RoomNo->getDisplayValue($Grid->RoomNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RoomNo" id="x<?= $Grid->RowIndex ?>_RoomNo" value="<?= HtmlEncode($Grid->RoomNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RoomNo" id="o<?= $Grid->RowIndex ?>_RoomNo" value="<?= HtmlEncode($Grid->RoomNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RoomType->Visible) { // RoomType ?>
        <td data-name="RoomType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_RoomType" class="form-group patient_room_RoomType">
<input type="<?= $Grid->RoomType->getInputTextType() ?>" data-table="patient_room" data-field="x_RoomType" name="x<?= $Grid->RowIndex ?>_RoomType" id="x<?= $Grid->RowIndex ?>_RoomType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RoomType->getPlaceHolder()) ?>" value="<?= $Grid->RoomType->EditValue ?>"<?= $Grid->RoomType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RoomType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_RoomType" class="form-group patient_room_RoomType">
<span<?= $Grid->RoomType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RoomType->getDisplayValue($Grid->RoomType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RoomType" id="x<?= $Grid->RowIndex ?>_RoomType" value="<?= HtmlEncode($Grid->RoomType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_RoomType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RoomType" id="o<?= $Grid->RowIndex ?>_RoomType" value="<?= HtmlEncode($Grid->RoomType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SharingRoom->Visible) { // SharingRoom ?>
        <td data-name="SharingRoom">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_SharingRoom" class="form-group patient_room_SharingRoom">
<input type="<?= $Grid->SharingRoom->getInputTextType() ?>" data-table="patient_room" data-field="x_SharingRoom" name="x<?= $Grid->RowIndex ?>_SharingRoom" id="x<?= $Grid->RowIndex ?>_SharingRoom" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SharingRoom->getPlaceHolder()) ?>" value="<?= $Grid->SharingRoom->EditValue ?>"<?= $Grid->SharingRoom->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SharingRoom->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_SharingRoom" class="form-group patient_room_SharingRoom">
<span<?= $Grid->SharingRoom->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SharingRoom->getDisplayValue($Grid->SharingRoom->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SharingRoom" id="x<?= $Grid->RowIndex ?>_SharingRoom" value="<?= HtmlEncode($Grid->SharingRoom->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_SharingRoom" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SharingRoom" id="o<?= $Grid->RowIndex ?>_SharingRoom" value="<?= HtmlEncode($Grid->SharingRoom->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Amount" class="form-group patient_room_Amount">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="patient_room" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Amount" class="form-group patient_room_Amount">
<span<?= $Grid->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Amount->getDisplayValue($Grid->Amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Amount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Amount" id="o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Startdatetime->Visible) { // Startdatetime ?>
        <td data-name="Startdatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Startdatetime" class="form-group patient_room_Startdatetime">
<input type="<?= $Grid->Startdatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Startdatetime" name="x<?= $Grid->RowIndex ?>_Startdatetime" id="x<?= $Grid->RowIndex ?>_Startdatetime" placeholder="<?= HtmlEncode($Grid->Startdatetime->getPlaceHolder()) ?>" value="<?= $Grid->Startdatetime->EditValue ?>"<?= $Grid->Startdatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Startdatetime->getErrorMessage() ?></div>
<?php if (!$Grid->Startdatetime->ReadOnly && !$Grid->Startdatetime->Disabled && !isset($Grid->Startdatetime->EditAttrs["readonly"]) && !isset($Grid->Startdatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomgrid", "x<?= $Grid->RowIndex ?>_Startdatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Startdatetime" class="form-group patient_room_Startdatetime">
<span<?= $Grid->Startdatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Startdatetime->getDisplayValue($Grid->Startdatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Startdatetime" id="x<?= $Grid->RowIndex ?>_Startdatetime" value="<?= HtmlEncode($Grid->Startdatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Startdatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Startdatetime" id="o<?= $Grid->RowIndex ?>_Startdatetime" value="<?= HtmlEncode($Grid->Startdatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Enddatetime->Visible) { // Enddatetime ?>
        <td data-name="Enddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Enddatetime" class="form-group patient_room_Enddatetime">
<input type="<?= $Grid->Enddatetime->getInputTextType() ?>" data-table="patient_room" data-field="x_Enddatetime" name="x<?= $Grid->RowIndex ?>_Enddatetime" id="x<?= $Grid->RowIndex ?>_Enddatetime" placeholder="<?= HtmlEncode($Grid->Enddatetime->getPlaceHolder()) ?>" value="<?= $Grid->Enddatetime->EditValue ?>"<?= $Grid->Enddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Enddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->Enddatetime->ReadOnly && !$Grid->Enddatetime->Disabled && !isset($Grid->Enddatetime->EditAttrs["readonly"]) && !isset($Grid->Enddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_roomgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_roomgrid", "x<?= $Grid->RowIndex ?>_Enddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Enddatetime" class="form-group patient_room_Enddatetime">
<span<?= $Grid->Enddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Enddatetime->getDisplayValue($Grid->Enddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Enddatetime" id="x<?= $Grid->RowIndex ?>_Enddatetime" value="<?= HtmlEncode($Grid->Enddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Enddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Enddatetime" id="o<?= $Grid->RowIndex ?>_Enddatetime" value="<?= HtmlEncode($Grid->Enddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DaysHours->Visible) { // DaysHours ?>
        <td data-name="DaysHours">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_DaysHours" class="form-group patient_room_DaysHours">
<input type="<?= $Grid->DaysHours->getInputTextType() ?>" data-table="patient_room" data-field="x_DaysHours" name="x<?= $Grid->RowIndex ?>_DaysHours" id="x<?= $Grid->RowIndex ?>_DaysHours" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DaysHours->getPlaceHolder()) ?>" value="<?= $Grid->DaysHours->EditValue ?>"<?= $Grid->DaysHours->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DaysHours->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_DaysHours" class="form-group patient_room_DaysHours">
<span<?= $Grid->DaysHours->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DaysHours->getDisplayValue($Grid->DaysHours->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DaysHours" id="x<?= $Grid->RowIndex ?>_DaysHours" value="<?= HtmlEncode($Grid->DaysHours->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_DaysHours" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DaysHours" id="o<?= $Grid->RowIndex ?>_DaysHours" value="<?= HtmlEncode($Grid->DaysHours->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Days->Visible) { // Days ?>
        <td data-name="Days">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Days" class="form-group patient_room_Days">
<input type="<?= $Grid->Days->getInputTextType() ?>" data-table="patient_room" data-field="x_Days" name="x<?= $Grid->RowIndex ?>_Days" id="x<?= $Grid->RowIndex ?>_Days" size="30" placeholder="<?= HtmlEncode($Grid->Days->getPlaceHolder()) ?>" value="<?= $Grid->Days->EditValue ?>"<?= $Grid->Days->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Days->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Days" class="form-group patient_room_Days">
<span<?= $Grid->Days->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Days->getDisplayValue($Grid->Days->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Days" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Days" id="x<?= $Grid->RowIndex ?>_Days" value="<?= HtmlEncode($Grid->Days->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Days" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Days" id="o<?= $Grid->RowIndex ?>_Days" value="<?= HtmlEncode($Grid->Days->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Hours->Visible) { // Hours ?>
        <td data-name="Hours">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_Hours" class="form-group patient_room_Hours">
<input type="<?= $Grid->Hours->getInputTextType() ?>" data-table="patient_room" data-field="x_Hours" name="x<?= $Grid->RowIndex ?>_Hours" id="x<?= $Grid->RowIndex ?>_Hours" size="30" placeholder="<?= HtmlEncode($Grid->Hours->getPlaceHolder()) ?>" value="<?= $Grid->Hours->EditValue ?>"<?= $Grid->Hours->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Hours->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_Hours" class="form-group patient_room_Hours">
<span<?= $Grid->Hours->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Hours->getDisplayValue($Grid->Hours->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_Hours" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Hours" id="x<?= $Grid->RowIndex ?>_Hours" value="<?= HtmlEncode($Grid->Hours->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_Hours" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Hours" id="o<?= $Grid->RowIndex ?>_Hours" value="<?= HtmlEncode($Grid->Hours->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TotalAmount->Visible) { // TotalAmount ?>
        <td data-name="TotalAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_TotalAmount" class="form-group patient_room_TotalAmount">
<input type="<?= $Grid->TotalAmount->getInputTextType() ?>" data-table="patient_room" data-field="x_TotalAmount" name="x<?= $Grid->RowIndex ?>_TotalAmount" id="x<?= $Grid->RowIndex ?>_TotalAmount" size="30" placeholder="<?= HtmlEncode($Grid->TotalAmount->getPlaceHolder()) ?>" value="<?= $Grid->TotalAmount->EditValue ?>"<?= $Grid->TotalAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TotalAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_TotalAmount" class="form-group patient_room_TotalAmount">
<span<?= $Grid->TotalAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TotalAmount->getDisplayValue($Grid->TotalAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TotalAmount" id="x<?= $Grid->RowIndex ?>_TotalAmount" value="<?= HtmlEncode($Grid->TotalAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_TotalAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TotalAmount" id="o<?= $Grid->RowIndex ?>_TotalAmount" value="<?= HtmlEncode($Grid->TotalAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PatID->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatID" name="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_room" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_PatID" class="form-group patient_room_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_MobileNumber" class="form-group patient_room_MobileNumber">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_room" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_MobileNumber" class="form-group patient_room_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MobileNumber->getDisplayValue($Grid->MobileNumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_HospID" class="form-group patient_room_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_room_status" class="form-group patient_room_status">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="patient_room" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_room_status" class="form-group patient_room_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_createdby" class="form-group patient_room_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_createddatetime" class="form-group patient_room_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_modifiedby" class="form-group patient_room_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_room_modifieddatetime" class="form-group patient_room_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_room" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_roomgrid","load"], function() {
    fpatient_roomgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpatient_roomgrid">
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
    ew.addEventHandlers("patient_room");
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
        container: "gmp_patient_room",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

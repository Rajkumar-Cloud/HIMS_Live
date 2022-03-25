<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientPrescriptionGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_prescriptiongrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_prescriptiongrid = new ew.Form("fpatient_prescriptiongrid", "grid");
    fpatient_prescriptiongrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_prescription")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_prescription)
        ew.vars.tables.patient_prescription = currentTable;
    fpatient_prescriptiongrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Medicine", [fields.Medicine.visible && fields.Medicine.required ? ew.Validators.required(fields.Medicine.caption) : null], fields.Medicine.isInvalid],
        ["M", [fields.M.visible && fields.M.required ? ew.Validators.required(fields.M.caption) : null], fields.M.isInvalid],
        ["A", [fields.A.visible && fields.A.required ? ew.Validators.required(fields.A.caption) : null], fields.A.isInvalid],
        ["N", [fields.N.visible && fields.N.required ? ew.Validators.required(fields.N.caption) : null], fields.N.isInvalid],
        ["NoOfDays", [fields.NoOfDays.visible && fields.NoOfDays.required ? ew.Validators.required(fields.NoOfDays.caption) : null], fields.NoOfDays.isInvalid],
        ["PreRoute", [fields.PreRoute.visible && fields.PreRoute.required ? ew.Validators.required(fields.PreRoute.caption) : null], fields.PreRoute.isInvalid],
        ["TimeOfTaking", [fields.TimeOfTaking.visible && fields.TimeOfTaking.required ? ew.Validators.required(fields.TimeOfTaking.caption) : null], fields.TimeOfTaking.isInvalid],
        ["Type", [fields.Type.visible && fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreateDateTime", [fields.CreateDateTime.visible && fields.CreateDateTime.required ? ew.Validators.required(fields.CreateDateTime.caption) : null], fields.CreateDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_prescriptiongrid,
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
    fpatient_prescriptiongrid.validate = function () {
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
    fpatient_prescriptiongrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Medicine", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "M", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "N", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoOfDays", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PreRoute", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TimeOfTaking", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "profilePic", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CreatedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CreateDateTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModifiedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModifiedDateTime", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_prescriptiongrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_prescriptiongrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_prescriptiongrid.lists.Medicine = <?= $Grid->Medicine->toClientList($Grid) ?>;
    fpatient_prescriptiongrid.lists.PreRoute = <?= $Grid->PreRoute->toClientList($Grid) ?>;
    fpatient_prescriptiongrid.lists.TimeOfTaking = <?= $Grid->TimeOfTaking->toClientList($Grid) ?>;
    fpatient_prescriptiongrid.lists.Type = <?= $Grid->Type->toClientList($Grid) ?>;
    fpatient_prescriptiongrid.lists.Status = <?= $Grid->Status->toClientList($Grid) ?>;
    loadjs.done("fpatient_prescriptiongrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_prescription">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_prescriptiongrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_prescription" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_prescriptiongrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_prescription_id" class="patient_prescription_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Grid->Reception->headerCellClass() ?>"><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><?= $Grid->renderSort($Grid->Reception) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Grid->PatientId->headerCellClass() ?>"><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><?= $Grid->renderSort($Grid->PatientId) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->Medicine->Visible) { // Medicine ?>
        <th data-name="Medicine" class="<?= $Grid->Medicine->headerCellClass() ?>" style="min-width: 20px;"><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><?= $Grid->renderSort($Grid->Medicine) ?></div></th>
<?php } ?>
<?php if ($Grid->M->Visible) { // M ?>
        <th data-name="M" class="<?= $Grid->M->headerCellClass() ?>"><div id="elh_patient_prescription_M" class="patient_prescription_M"><?= $Grid->renderSort($Grid->M) ?></div></th>
<?php } ?>
<?php if ($Grid->A->Visible) { // A ?>
        <th data-name="A" class="<?= $Grid->A->headerCellClass() ?>"><div id="elh_patient_prescription_A" class="patient_prescription_A"><?= $Grid->renderSort($Grid->A) ?></div></th>
<?php } ?>
<?php if ($Grid->N->Visible) { // N ?>
        <th data-name="N" class="<?= $Grid->N->headerCellClass() ?>"><div id="elh_patient_prescription_N" class="patient_prescription_N"><?= $Grid->renderSort($Grid->N) ?></div></th>
<?php } ?>
<?php if ($Grid->NoOfDays->Visible) { // NoOfDays ?>
        <th data-name="NoOfDays" class="<?= $Grid->NoOfDays->headerCellClass() ?>"><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><?= $Grid->renderSort($Grid->NoOfDays) ?></div></th>
<?php } ?>
<?php if ($Grid->PreRoute->Visible) { // PreRoute ?>
        <th data-name="PreRoute" class="<?= $Grid->PreRoute->headerCellClass() ?>"><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><?= $Grid->renderSort($Grid->PreRoute) ?></div></th>
<?php } ?>
<?php if ($Grid->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <th data-name="TimeOfTaking" class="<?= $Grid->TimeOfTaking->headerCellClass() ?>"><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><?= $Grid->renderSort($Grid->TimeOfTaking) ?></div></th>
<?php } ?>
<?php if ($Grid->Type->Visible) { // Type ?>
        <th data-name="Type" class="<?= $Grid->Type->headerCellClass() ?>" style="min-width: 12px;"><div id="elh_patient_prescription_Type" class="patient_prescription_Type"><?= $Grid->renderSort($Grid->Type) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
<?php } ?>
<?php if ($Grid->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Grid->Age->headerCellClass() ?>"><div id="elh_patient_prescription_Age" class="patient_prescription_Age"><?= $Grid->renderSort($Grid->Age) ?></div></th>
<?php } ?>
<?php if ($Grid->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Grid->Gender->headerCellClass() ?>"><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><?= $Grid->renderSort($Grid->Gender) ?></div></th>
<?php } ?>
<?php if ($Grid->profilePic->Visible) { // profilePic ?>
        <th data-name="profilePic" class="<?= $Grid->profilePic->headerCellClass() ?>"><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic"><?= $Grid->renderSort($Grid->profilePic) ?></div></th>
<?php } ?>
<?php if ($Grid->Status->Visible) { // Status ?>
        <th data-name="Status" class="<?= $Grid->Status->headerCellClass() ?>"><div id="elh_patient_prescription_Status" class="patient_prescription_Status"><?= $Grid->renderSort($Grid->Status) ?></div></th>
<?php } ?>
<?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Grid->CreatedBy->headerCellClass() ?>"><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><?= $Grid->renderSort($Grid->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->CreateDateTime->Visible) { // CreateDateTime ?>
        <th data-name="CreateDateTime" class="<?= $Grid->CreateDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><?= $Grid->renderSort($Grid->CreateDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Grid->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><?= $Grid->renderSort($Grid->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Grid->ModifiedDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><?= $Grid->renderSort($Grid->ModifiedDateTime) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_prescription", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_prescription_id" class="form-group"></span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Grid->Reception->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Reception" class="form-group">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<?= $Grid->Reception->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Reception" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Reception" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Grid->PatientId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<?= $Grid->PatientId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_PatientId" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_PatientId" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_PatientName" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_PatientName" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Medicine->Visible) { // Medicine ?>
        <td data-name="Medicine" <?= $Grid->Medicine->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Medicine" class="form-group">
<?php
$onchange = $Grid->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Grid->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Medicine" id="sv_x<?= $Grid->RowIndex ?>_Medicine" value="<?= RemoveHtml($Grid->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?= HtmlEncode($Grid->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Medicine->getPlaceHolder()) ?>"<?= $Grid->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Grid->Medicine->ReadOnly || $Grid->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_Medicine" data-input="sv_x<?= $Grid->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Medicine" id="x<?= $Grid->RowIndex ?>_Medicine" value="<?= HtmlEncode($Grid->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Medicine","forceSelect":false}, ew.vars.tables.patient_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Grid->Medicine->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Medicine") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Medicine" id="o<?= $Grid->RowIndex ?>_Medicine" value="<?= HtmlEncode($Grid->Medicine->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Medicine" class="form-group">
<?php
$onchange = $Grid->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Grid->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Medicine" id="sv_x<?= $Grid->RowIndex ?>_Medicine" value="<?= RemoveHtml($Grid->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?= HtmlEncode($Grid->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Medicine->getPlaceHolder()) ?>"<?= $Grid->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Grid->Medicine->ReadOnly || $Grid->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_Medicine" data-input="sv_x<?= $Grid->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Medicine" id="x<?= $Grid->RowIndex ?>_Medicine" value="<?= HtmlEncode($Grid->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Medicine","forceSelect":false}, ew.vars.tables.patient_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Grid->Medicine->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Medicine") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Medicine">
<span<?= $Grid->Medicine->viewAttributes() ?>>
<?= $Grid->Medicine->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Medicine" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Medicine" value="<?= HtmlEncode($Grid->Medicine->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Medicine" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Medicine" value="<?= HtmlEncode($Grid->Medicine->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->M->Visible) { // M ?>
        <td data-name="M" <?= $Grid->M->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_M" class="form-group">
<input type="<?= $Grid->M->getInputTextType() ?>" data-table="patient_prescription" data-field="x_M" name="x<?= $Grid->RowIndex ?>_M" id="x<?= $Grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->M->getPlaceHolder()) ?>" value="<?= $Grid->M->EditValue ?>"<?= $Grid->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->M->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_M" data-hidden="1" name="o<?= $Grid->RowIndex ?>_M" id="o<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_M" class="form-group">
<input type="<?= $Grid->M->getInputTextType() ?>" data-table="patient_prescription" data-field="x_M" name="x<?= $Grid->RowIndex ?>_M" id="x<?= $Grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->M->getPlaceHolder()) ?>" value="<?= $Grid->M->EditValue ?>"<?= $Grid->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->M->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_M">
<span<?= $Grid->M->viewAttributes() ?>>
<?= $Grid->M->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_M" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_M" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_M" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_M" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->A->Visible) { // A ?>
        <td data-name="A" <?= $Grid->A->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_A" class="form-group">
<input type="<?= $Grid->A->getInputTextType() ?>" data-table="patient_prescription" data-field="x_A" name="x<?= $Grid->RowIndex ?>_A" id="x<?= $Grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->A->getPlaceHolder()) ?>" value="<?= $Grid->A->EditValue ?>"<?= $Grid->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_A" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A" id="o<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_A" class="form-group">
<input type="<?= $Grid->A->getInputTextType() ?>" data-table="patient_prescription" data-field="x_A" name="x<?= $Grid->RowIndex ?>_A" id="x<?= $Grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->A->getPlaceHolder()) ?>" value="<?= $Grid->A->EditValue ?>"<?= $Grid->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_A">
<span<?= $Grid->A->viewAttributes() ?>>
<?= $Grid->A->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_A" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_A" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_A" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_A" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->N->Visible) { // N ?>
        <td data-name="N" <?= $Grid->N->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_N" class="form-group">
<input type="<?= $Grid->N->getInputTextType() ?>" data-table="patient_prescription" data-field="x_N" name="x<?= $Grid->RowIndex ?>_N" id="x<?= $Grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->N->getPlaceHolder()) ?>" value="<?= $Grid->N->EditValue ?>"<?= $Grid->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->N->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_N" data-hidden="1" name="o<?= $Grid->RowIndex ?>_N" id="o<?= $Grid->RowIndex ?>_N" value="<?= HtmlEncode($Grid->N->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_N" class="form-group">
<input type="<?= $Grid->N->getInputTextType() ?>" data-table="patient_prescription" data-field="x_N" name="x<?= $Grid->RowIndex ?>_N" id="x<?= $Grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->N->getPlaceHolder()) ?>" value="<?= $Grid->N->EditValue ?>"<?= $Grid->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->N->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_N">
<span<?= $Grid->N->viewAttributes() ?>>
<?= $Grid->N->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_N" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_N" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_N" value="<?= HtmlEncode($Grid->N->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_N" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_N" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_N" value="<?= HtmlEncode($Grid->N->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NoOfDays->Visible) { // NoOfDays ?>
        <td data-name="NoOfDays" <?= $Grid->NoOfDays->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_NoOfDays" class="form-group">
<input type="<?= $Grid->NoOfDays->getInputTextType() ?>" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?= $Grid->RowIndex ?>_NoOfDays" id="x<?= $Grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NoOfDays->getPlaceHolder()) ?>" value="<?= $Grid->NoOfDays->EditValue ?>"<?= $Grid->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfDays->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoOfDays" id="o<?= $Grid->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Grid->NoOfDays->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_NoOfDays" class="form-group">
<input type="<?= $Grid->NoOfDays->getInputTextType() ?>" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?= $Grid->RowIndex ?>_NoOfDays" id="x<?= $Grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NoOfDays->getPlaceHolder()) ?>" value="<?= $Grid->NoOfDays->EditValue ?>"<?= $Grid->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfDays->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_NoOfDays">
<span<?= $Grid->NoOfDays->viewAttributes() ?>>
<?= $Grid->NoOfDays->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_NoOfDays" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Grid->NoOfDays->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_NoOfDays" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Grid->NoOfDays->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PreRoute->Visible) { // PreRoute ?>
        <td data-name="PreRoute" <?= $Grid->PreRoute->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PreRoute" class="form-group">
<?php
$onchange = $Grid->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PreRoute" id="sv_x<?= $Grid->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Grid->PreRoute->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Grid->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PreRoute->getPlaceHolder()) ?>"<?= $Grid->PreRoute->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Grid->PreRoute->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->PreRoute->caption() ?>" data-title="<?= $Grid->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Grid->RowIndex ?>_PreRoute" data-value-separator="<?= $Grid->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PreRoute" id="x<?= $Grid->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Grid->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"}, ew.vars.tables.patient_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Grid->PreRoute->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PreRoute") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreRoute" id="o<?= $Grid->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Grid->PreRoute->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PreRoute" class="form-group">
<?php
$onchange = $Grid->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PreRoute" id="sv_x<?= $Grid->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Grid->PreRoute->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Grid->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PreRoute->getPlaceHolder()) ?>"<?= $Grid->PreRoute->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Grid->PreRoute->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->PreRoute->caption() ?>" data-title="<?= $Grid->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Grid->RowIndex ?>_PreRoute" data-value-separator="<?= $Grid->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PreRoute" id="x<?= $Grid->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Grid->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"}, ew.vars.tables.patient_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Grid->PreRoute->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PreRoute") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_PreRoute">
<span<?= $Grid->PreRoute->viewAttributes() ?>>
<?= $Grid->PreRoute->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_PreRoute" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Grid->PreRoute->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_PreRoute" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Grid->PreRoute->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <td data-name="TimeOfTaking" <?= $Grid->TimeOfTaking->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $Grid->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Grid->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Grid->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->TimeOfTaking->getPlaceHolder()) ?>"<?= $Grid->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Grid->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->TimeOfTaking->caption() ?>" data-title="<?= $Grid->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Grid->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_TimeOfTaking" id="x<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Grid->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"}, ew.vars.tables.patient_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Grid->TimeOfTaking->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_TimeOfTaking") ?>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TimeOfTaking" id="o<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Grid->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $Grid->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Grid->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Grid->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->TimeOfTaking->getPlaceHolder()) ?>"<?= $Grid->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Grid->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->TimeOfTaking->caption() ?>" data-title="<?= $Grid->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Grid->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_TimeOfTaking" id="x<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Grid->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"}, ew.vars.tables.patient_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Grid->TimeOfTaking->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_TimeOfTaking") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_TimeOfTaking">
<span<?= $Grid->TimeOfTaking->viewAttributes() ?>>
<?= $Grid->TimeOfTaking->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_TimeOfTaking" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Grid->TimeOfTaking->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_TimeOfTaking" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Grid->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Type->Visible) { // Type ?>
        <td data-name="Type" <?= $Grid->Type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Type" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Type"
        name="x<?= $Grid->RowIndex ?>_Type"
        class="form-control ew-select<?= $Grid->Type->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Grid->RowIndex ?>_Type"
        data-table="patient_prescription"
        data-field="x_Type"
        data-value-separator="<?= $Grid->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Type->getPlaceHolder()) ?>"
        <?= $Grid->Type->editAttributes() ?>>
        <?= $Grid->Type->selectOptionListHtml("x{$Grid->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Grid->RowIndex ?>_Type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Type", selectId: "patient_prescription_x<?= $Grid->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_prescription.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Type" id="o<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Type" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Type"
        name="x<?= $Grid->RowIndex ?>_Type"
        class="form-control ew-select<?= $Grid->Type->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Grid->RowIndex ?>_Type"
        data-table="patient_prescription"
        data-field="x_Type"
        data-value-separator="<?= $Grid->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Type->getPlaceHolder()) ?>"
        <?= $Grid->Type->editAttributes() ?>>
        <?= $Grid->Type->selectOptionListHtml("x{$Grid->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Grid->RowIndex ?>_Type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Type", selectId: "patient_prescription_x<?= $Grid->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_prescription.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Type">
<span<?= $Grid->Type->viewAttributes() ?>>
<?= $Grid->Type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Type" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Type" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Type" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_prescription" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_mrnno" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_mrnno" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Grid->Age->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<?= $Grid->Age->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Age" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Age" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Age" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Grid->Gender->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<?= $Grid->Gender->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Gender" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Gender" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic" <?= $Grid->profilePic->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_profilePic" class="form-group">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?= $Grid->RowIndex ?>_profilePic" id="x<?= $Grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->profilePic->getPlaceHolder()) ?>"<?= $Grid->profilePic->editAttributes() ?>><?= $Grid->profilePic->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->profilePic->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" data-hidden="1" name="o<?= $Grid->RowIndex ?>_profilePic" id="o<?= $Grid->RowIndex ?>_profilePic" value="<?= HtmlEncode($Grid->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_profilePic" class="form-group">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?= $Grid->RowIndex ?>_profilePic" id="x<?= $Grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->profilePic->getPlaceHolder()) ?>"<?= $Grid->profilePic->editAttributes() ?>><?= $Grid->profilePic->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->profilePic->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_profilePic">
<span<?= $Grid->profilePic->viewAttributes() ?>>
<?= $Grid->profilePic->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_profilePic" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_profilePic" value="<?= HtmlEncode($Grid->profilePic->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_profilePic" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_profilePic" value="<?= HtmlEncode($Grid->profilePic->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Status->Visible) { // Status ?>
        <td data-name="Status" <?= $Grid->Status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Status"
        name="x<?= $Grid->RowIndex ?>_Status"
        class="form-control ew-select<?= $Grid->Status->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Grid->RowIndex ?>_Status"
        data-table="patient_prescription"
        data-field="x_Status"
        data-value-separator="<?= $Grid->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Status->getPlaceHolder()) ?>"
        <?= $Grid->Status->editAttributes() ?>>
        <?= $Grid->Status->selectOptionListHtml("x{$Grid->RowIndex}_Status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Status->getErrorMessage() ?></div>
<?= $Grid->Status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Grid->RowIndex ?>_Status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Status", selectId: "patient_prescription_x<?= $Grid->RowIndex ?>_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Status" id="o<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Status"
        name="x<?= $Grid->RowIndex ?>_Status"
        class="form-control ew-select<?= $Grid->Status->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Grid->RowIndex ?>_Status"
        data-table="patient_prescription"
        data-field="x_Status"
        data-value-separator="<?= $Grid->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Status->getPlaceHolder()) ?>"
        <?= $Grid->Status->editAttributes() ?>>
        <?= $Grid->Status->selectOptionListHtml("x{$Grid->RowIndex}_Status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Status->getErrorMessage() ?></div>
<?= $Grid->Status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Grid->RowIndex ?>_Status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Status", selectId: "patient_prescription_x<?= $Grid->RowIndex ?>_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_Status">
<span<?= $Grid->Status->viewAttributes() ?>>
<?= $Grid->Status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Status" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_Status" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Status" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Grid->CreatedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_CreatedBy" class="form-group">
<input type="<?= $Grid->CreatedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreatedBy->getPlaceHolder()) ?>" value="<?= $Grid->CreatedBy->EditValue ?>"<?= $Grid->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreatedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreatedBy" id="o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_CreatedBy" class="form-group">
<input type="<?= $Grid->CreatedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreatedBy->getPlaceHolder()) ?>" value="<?= $Grid->CreatedBy->EditValue ?>"<?= $Grid->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreatedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_CreatedBy">
<span<?= $Grid->CreatedBy->viewAttributes() ?>>
<?= $Grid->CreatedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_CreatedBy" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_CreatedBy" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CreateDateTime->Visible) { // CreateDateTime ?>
        <td data-name="CreateDateTime" <?= $Grid->CreateDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_CreateDateTime" class="form-group">
<input type="<?= $Grid->CreateDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?= $Grid->RowIndex ?>_CreateDateTime" id="x<?= $Grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Grid->CreateDateTime->EditValue ?>"<?= $Grid->CreateDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreateDateTime->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreateDateTime" id="o<?= $Grid->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Grid->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_CreateDateTime" class="form-group">
<input type="<?= $Grid->CreateDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?= $Grid->RowIndex ?>_CreateDateTime" id="x<?= $Grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Grid->CreateDateTime->EditValue ?>"<?= $Grid->CreateDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreateDateTime->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_CreateDateTime">
<span<?= $Grid->CreateDateTime->viewAttributes() ?>>
<?= $Grid->CreateDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_CreateDateTime" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Grid->CreateDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_CreateDateTime" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Grid->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Grid->ModifiedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_ModifiedBy" class="form-group">
<input type="<?= $Grid->ModifiedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedBy->EditValue ?>"<?= $Grid->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedBy" id="o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_ModifiedBy" class="form-group">
<input type="<?= $Grid->ModifiedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedBy->EditValue ?>"<?= $Grid->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_ModifiedBy">
<span<?= $Grid->ModifiedBy->viewAttributes() ?>>
<?= $Grid->ModifiedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_ModifiedBy" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_ModifiedBy" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Grid->ModifiedDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group">
<input type="<?= $Grid->ModifiedDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?= $Grid->RowIndex ?>_ModifiedDateTime" id="x<?= $Grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedDateTime->EditValue ?>"<?= $Grid->ModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedDateTime->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedDateTime" id="o<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group">
<input type="<?= $Grid->ModifiedDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?= $Grid->RowIndex ?>_ModifiedDateTime" id="x<?= $Grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedDateTime->EditValue ?>"<?= $Grid->ModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedDateTime->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_prescription_ModifiedDateTime">
<span<?= $Grid->ModifiedDateTime->viewAttributes() ?>>
<?= $Grid->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_ModifiedDateTime" id="fpatient_prescriptiongrid$x<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_ModifiedDateTime" id="fpatient_prescriptiongrid$o<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->OldValue) ?>">
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
loadjs.ready(["fpatient_prescriptiongrid","load"], function () {
    fpatient_prescriptiongrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_prescription", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_prescription_id" class="form-group patient_prescription_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_id" class="form-group patient_prescription_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Medicine->Visible) { // Medicine ?>
        <td data-name="Medicine">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$onchange = $Grid->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Grid->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Medicine" id="sv_x<?= $Grid->RowIndex ?>_Medicine" value="<?= RemoveHtml($Grid->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?= HtmlEncode($Grid->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Medicine->getPlaceHolder()) ?>"<?= $Grid->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Grid->Medicine->ReadOnly || $Grid->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_Medicine" data-input="sv_x<?= $Grid->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Medicine" id="x<?= $Grid->RowIndex ?>_Medicine" value="<?= HtmlEncode($Grid->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Medicine","forceSelect":false}, ew.vars.tables.patient_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Grid->Medicine->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Medicine") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<span<?= $Grid->Medicine->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Medicine->getDisplayValue($Grid->Medicine->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Medicine" id="x<?= $Grid->RowIndex ?>_Medicine" value="<?= HtmlEncode($Grid->Medicine->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Medicine" id="o<?= $Grid->RowIndex ?>_Medicine" value="<?= HtmlEncode($Grid->Medicine->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->M->Visible) { // M ?>
        <td data-name="M">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_M" class="form-group patient_prescription_M">
<input type="<?= $Grid->M->getInputTextType() ?>" data-table="patient_prescription" data-field="x_M" name="x<?= $Grid->RowIndex ?>_M" id="x<?= $Grid->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->M->getPlaceHolder()) ?>" value="<?= $Grid->M->EditValue ?>"<?= $Grid->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->M->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_M" class="form-group patient_prescription_M">
<span<?= $Grid->M->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->M->getDisplayValue($Grid->M->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_M" data-hidden="1" name="x<?= $Grid->RowIndex ?>_M" id="x<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_M" data-hidden="1" name="o<?= $Grid->RowIndex ?>_M" id="o<?= $Grid->RowIndex ?>_M" value="<?= HtmlEncode($Grid->M->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->A->Visible) { // A ?>
        <td data-name="A">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_A" class="form-group patient_prescription_A">
<input type="<?= $Grid->A->getInputTextType() ?>" data-table="patient_prescription" data-field="x_A" name="x<?= $Grid->RowIndex ?>_A" id="x<?= $Grid->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->A->getPlaceHolder()) ?>" value="<?= $Grid->A->EditValue ?>"<?= $Grid->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->A->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_A" class="form-group patient_prescription_A">
<span<?= $Grid->A->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->A->getDisplayValue($Grid->A->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_A" data-hidden="1" name="x<?= $Grid->RowIndex ?>_A" id="x<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_A" data-hidden="1" name="o<?= $Grid->RowIndex ?>_A" id="o<?= $Grid->RowIndex ?>_A" value="<?= HtmlEncode($Grid->A->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->N->Visible) { // N ?>
        <td data-name="N">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_N" class="form-group patient_prescription_N">
<input type="<?= $Grid->N->getInputTextType() ?>" data-table="patient_prescription" data-field="x_N" name="x<?= $Grid->RowIndex ?>_N" id="x<?= $Grid->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?= HtmlEncode($Grid->N->getPlaceHolder()) ?>" value="<?= $Grid->N->EditValue ?>"<?= $Grid->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->N->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_N" class="form-group patient_prescription_N">
<span<?= $Grid->N->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->N->getDisplayValue($Grid->N->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_N" data-hidden="1" name="x<?= $Grid->RowIndex ?>_N" id="x<?= $Grid->RowIndex ?>_N" value="<?= HtmlEncode($Grid->N->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_N" data-hidden="1" name="o<?= $Grid->RowIndex ?>_N" id="o<?= $Grid->RowIndex ?>_N" value="<?= HtmlEncode($Grid->N->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NoOfDays->Visible) { // NoOfDays ?>
        <td data-name="NoOfDays">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="<?= $Grid->NoOfDays->getInputTextType() ?>" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?= $Grid->RowIndex ?>_NoOfDays" id="x<?= $Grid->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?= HtmlEncode($Grid->NoOfDays->getPlaceHolder()) ?>" value="<?= $Grid->NoOfDays->EditValue ?>"<?= $Grid->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoOfDays->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<span<?= $Grid->NoOfDays->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NoOfDays->getDisplayValue($Grid->NoOfDays->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NoOfDays" id="x<?= $Grid->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Grid->NoOfDays->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoOfDays" id="o<?= $Grid->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Grid->NoOfDays->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PreRoute->Visible) { // PreRoute ?>
        <td data-name="PreRoute">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$onchange = $Grid->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PreRoute" id="sv_x<?= $Grid->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Grid->PreRoute->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Grid->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PreRoute->getPlaceHolder()) ?>"<?= $Grid->PreRoute->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Grid->PreRoute->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->PreRoute->caption() ?>" data-title="<?= $Grid->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Grid->RowIndex ?>_PreRoute" data-value-separator="<?= $Grid->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PreRoute" id="x<?= $Grid->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Grid->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"}, ew.vars.tables.patient_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Grid->PreRoute->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PreRoute") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<span<?= $Grid->PreRoute->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PreRoute->getDisplayValue($Grid->PreRoute->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PreRoute" id="x<?= $Grid->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Grid->PreRoute->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PreRoute" id="o<?= $Grid->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Grid->PreRoute->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <td data-name="TimeOfTaking">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$onchange = $Grid->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Grid->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Grid->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Grid->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->TimeOfTaking->getPlaceHolder()) ?>"<?= $Grid->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Grid->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->TimeOfTaking->caption() ?>" data-title="<?= $Grid->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Grid->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Grid->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_TimeOfTaking" id="x<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Grid->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptiongrid"], function() {
    fpatient_prescriptiongrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"}, ew.vars.tables.patient_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Grid->TimeOfTaking->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_TimeOfTaking") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<span<?= $Grid->TimeOfTaking->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TimeOfTaking->getDisplayValue($Grid->TimeOfTaking->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TimeOfTaking" id="x<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Grid->TimeOfTaking->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TimeOfTaking" id="o<?= $Grid->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Grid->TimeOfTaking->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Type->Visible) { // Type ?>
        <td data-name="Type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Type" class="form-group patient_prescription_Type">
    <select
        id="x<?= $Grid->RowIndex ?>_Type"
        name="x<?= $Grid->RowIndex ?>_Type"
        class="form-control ew-select<?= $Grid->Type->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Grid->RowIndex ?>_Type"
        data-table="patient_prescription"
        data-field="x_Type"
        data-value-separator="<?= $Grid->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Type->getPlaceHolder()) ?>"
        <?= $Grid->Type->editAttributes() ?>>
        <?= $Grid->Type->selectOptionListHtml("x{$Grid->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Grid->RowIndex ?>_Type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Type", selectId: "patient_prescription_x<?= $Grid->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_prescription.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Type" class="form-group patient_prescription_Type">
<span<?= $Grid->Type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Type->getDisplayValue($Grid->Type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Type" id="x<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Type" id="o<?= $Grid->RowIndex ?>_Type" value="<?= HtmlEncode($Grid->Type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_prescription" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Age" class="form-group patient_prescription_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Age->getDisplayValue($Grid->Age->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gender->getDisplayValue($Grid->Gender->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?= $Grid->RowIndex ?>_profilePic" id="x<?= $Grid->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->profilePic->getPlaceHolder()) ?>"<?= $Grid->profilePic->editAttributes() ?>><?= $Grid->profilePic->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->profilePic->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<span<?= $Grid->profilePic->viewAttributes() ?>>
<?= $Grid->profilePic->ViewValue ?></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" data-hidden="1" name="x<?= $Grid->RowIndex ?>_profilePic" id="x<?= $Grid->RowIndex ?>_profilePic" value="<?= HtmlEncode($Grid->profilePic->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" data-hidden="1" name="o<?= $Grid->RowIndex ?>_profilePic" id="o<?= $Grid->RowIndex ?>_profilePic" value="<?= HtmlEncode($Grid->profilePic->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Status->Visible) { // Status ?>
        <td data-name="Status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_Status" class="form-group patient_prescription_Status">
    <select
        id="x<?= $Grid->RowIndex ?>_Status"
        name="x<?= $Grid->RowIndex ?>_Status"
        class="form-control ew-select<?= $Grid->Status->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Grid->RowIndex ?>_Status"
        data-table="patient_prescription"
        data-field="x_Status"
        data-value-separator="<?= $Grid->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Status->getPlaceHolder()) ?>"
        <?= $Grid->Status->editAttributes() ?>>
        <?= $Grid->Status->selectOptionListHtml("x{$Grid->RowIndex}_Status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Status->getErrorMessage() ?></div>
<?= $Grid->Status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Grid->RowIndex ?>_Status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Status", selectId: "patient_prescription_x<?= $Grid->RowIndex ?>_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_Status" class="form-group patient_prescription_Status">
<span<?= $Grid->Status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Status->getDisplayValue($Grid->Status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Status" id="x<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Status" id="o<?= $Grid->RowIndex ?>_Status" value="<?= HtmlEncode($Grid->Status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="<?= $Grid->CreatedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreatedBy->getPlaceHolder()) ?>" value="<?= $Grid->CreatedBy->EditValue ?>"<?= $Grid->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreatedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<span<?= $Grid->CreatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CreatedBy->getDisplayValue($Grid->CreatedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreatedBy" id="o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CreateDateTime->Visible) { // CreateDateTime ?>
        <td data-name="CreateDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="<?= $Grid->CreateDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?= $Grid->RowIndex ?>_CreateDateTime" id="x<?= $Grid->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Grid->CreateDateTime->EditValue ?>"<?= $Grid->CreateDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreateDateTime->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<span<?= $Grid->CreateDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CreateDateTime->getDisplayValue($Grid->CreateDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CreateDateTime" id="x<?= $Grid->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Grid->CreateDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreateDateTime" id="o<?= $Grid->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Grid->CreateDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="<?= $Grid->ModifiedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedBy->EditValue ?>"<?= $Grid->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<span<?= $Grid->ModifiedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModifiedBy->getDisplayValue($Grid->ModifiedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedBy" id="o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="<?= $Grid->ModifiedDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?= $Grid->RowIndex ?>_ModifiedDateTime" id="x<?= $Grid->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedDateTime->EditValue ?>"<?= $Grid->ModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedDateTime->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<span<?= $Grid->ModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModifiedDateTime->getDisplayValue($Grid->ModifiedDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModifiedDateTime" id="x<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedDateTime" id="o<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_prescriptiongrid","load"], function() {
    fpatient_prescriptiongrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpatient_prescriptiongrid">
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
    ew.addEventHandlers("patient_prescription");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
     var c = document.getElementById("el_ip_admission_profilePic").children;
     var d = c[0].children;
     var evalue = c[0].innerText;
     //document.getElementById("profilePicturePatient").src = 'uploads/' + evalue;
    	var myParent =  document.getElementById("tpd_ip_admissionmaster");
    	var t = document.createTextNode("Select Drug Template : ");
    	myParent.appendChild(t);

    //Create array of options to be added
    var array = ["Volvo","Saab","Mercades","Audi"];

    //Create and append select list
    var selectList = document.createElement("select");
    selectList.id = "mySelect";
    myParent.appendChild(selectList);

    //Create and append the options
    //for (var i = 0; i < array.length; i++) {
    //    var option = document.createElement("option");
    //    option.value = array[i];
    //    option.text = array[i];
    //    selectList.appendChild(option);
    //}
    	var btn = document.createElement("BUTTON");   // Create a <button> element
    	btn.innerHTML = "Select";                   // Insert text
    	btn.addEventListener("click", myScriptSelect);
    myParent.appendChild(btn);               // Append <button> to <body>
    		var user = [{
    			'CustomerName': '<?php  echo CurrentUserName();  ?>'                    
    		}];

    	//v
    		var jsonString = JSON.stringify(user);
    			$.ajax({
    				type: "POST",
    				url: "ajaxinsert.php?control=selectTemplatePRE",
    				data: { data: jsonString },
    				cache: false,
    				success: function (data) {
    					let jsonObject = JSON.parse(data);
    					var json = jsonObject["records"];
    					for(var i = 0; i < json.length; i++) {
    						var obj = json[i];
    						console.log(obj.id);
    						 var option = document.createElement("option");
    	option.value = obj.TemplateName;
    	option.text = obj.TemplateName;
    	selectList.appendChild(option);
    					  }

    					//alert(data + "Saved Sucessfully...........");
    					//swal({ text: "Saved Sucessfully......", icon: "success", });
    				   // Receiptreset();
    				  //  document.getElementById("VoucherAmt0").focus();
    				}
    			});
    	for (var i = 0; i < 20; i++) {
    		var kkk = $('*[data-caption="Add Blank Row"]')
    		ew.addGridRow(kkk);
    	}

    	function myScriptSelect() {
    	   // alert("hai");
    //n
    		var hhhh = document.getElementById("mySelect");
    				var user = [{
    					'CustomerName': '<?php  echo CurrentUserName();  ?>',
    					'TemplateName': hhhh.value
    		}];

    	//v
    		var jsonString = JSON.stringify(user);
    			$.ajax({
    				type: "POST",
    				url: "ajaxinsert.php?control=selectTemplatePREItem",
    				data: { data: jsonString },
    				cache: false,
    				success: function (data) {
    					let jsonObject = JSON.parse(data);
    					var json = jsonObject["records"];
    					for(var i = 0; i < json.length; i++) {
    						var obj = json[i];
    						console.log(obj.id);
    						 var option = document.createElement("option");
    	option.value = obj.TemplateName;
    	option.text = obj.TemplateName;
    						selectList.appendChild(option);
    						var Medicine = document.getElementById("sv_x"+(i+1)+"_Medicine");
    						Medicine.value = obj.Medicine;
    						Medicine.innerHTML  = obj.Medicine;
    						Medicine.selectedIndex = obj.Medicine;
    						Medicine.value = obj.Medicine;
    						Medicine.text = obj.Medicine;
    						var Medicine = document.getElementById("x"+(i+1)+"_Medicine");
    						Medicine.value = obj.Medicine;
    						var M = document.getElementById("x"+(i+1)+"_M");
    						M.value = obj.M;
    						var A = document.getElementById("x"+(i+1)+"_A");
    						A.value = obj.A;
    						var N = document.getElementById("x"+(i+1)+"_N");
    						N.value = obj.N;
    						var NoOfDays = document.getElementById("x"+(i+1)+"_NoOfDays");
    						NoOfDays.value = obj.NoOfDays;
    						var PreRoute = document.getElementById("sv_x"+(i+1)+"_PreRoute");
    						PreRoute.value = obj.PreRoute;
    						  var PreRoute = document.getElementById("x"+(i+1)+"_PreRoute");
    						PreRoute.value = obj.PreRoute;
    						var TimeOfTaking = document.getElementById("sv_x"+(i+1)+"_TimeOfTaking");
    						TimeOfTaking.value = obj.TimeOfTaking;
    							var TimeOfTaking = document.getElementById("x"+(i+1)+"_TimeOfTaking");
    						TimeOfTaking.value = obj.TimeOfTaking;
    						   var TimeOfTaking = document.getElementById("x"+(i+1)+"_Type");
    						TimeOfTaking.value = 'Normal';
    						var TimeOfTaking = document.getElementById("x"+(i+1)+"_Status");
    						TimeOfTaking.value = 'Live';
    					  }

    					//alert(data + "Saved Sucessfully...........");
    					//swal({ text: "Saved Sucessfully......", icon: "success", });
    				   // Receiptreset();
    				  //  document.getElementById("VoucherAmt0").focus();
    				}
    			});
    	}
     </script>
    <style>
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: unset;
    	align-items: stretch;
    	width: 100%;
    }
    .ew-grid .ew-table>tbody>tr>td, .ew-grid .ew-table>tfoot>tr>td {
    	padding: .0rem;
    	border-bottom: 1px solid;
    	border-top: 0;
    	border-left: 0;
    	border-right: 1px solid;
    	border-color: silver;
    }
    .text-nowrap {
    	white-space: nowrap !important;
    	line-height: 1;
    	height: 33px;
    }
    </style>
    <script>
    jQuery("#tpd_patient_prescriptionlist th.ew-list-option-header").each(function() {this.rowSpan = 1});
    jQuery("#tpd_patient_prescriptionlist td.ew-list-option-body").each(function() {this.rowSpan = 1});
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_patient_prescription",
        width: "100%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

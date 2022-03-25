<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientFollowUpGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_follow_upgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_follow_upgrid = new ew.Form("fpatient_follow_upgrid", "grid");
    fpatient_follow_upgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_follow_up")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_follow_up)
        ew.vars.tables.patient_follow_up = currentTable;
    fpatient_follow_upgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["BP", [fields.BP.visible && fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["Pulse", [fields.Pulse.visible && fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["Resp", [fields.Resp.visible && fields.Resp.required ? ew.Validators.required(fields.Resp.caption) : null], fields.Resp.isInvalid],
        ["SPO2", [fields.SPO2.visible && fields.SPO2.required ? ew.Validators.required(fields.SPO2.caption) : null], fields.SPO2.isInvalid],
        ["NextReviewDate", [fields.NextReviewDate.visible && fields.NextReviewDate.required ? ew.Validators.required(fields.NextReviewDate.caption) : null], fields.NextReviewDate.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_follow_upgrid,
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
    fpatient_follow_upgrid.validate = function () {
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
    fpatient_follow_upgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PatID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MobileNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pulse", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Resp", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SPO2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NextReviewDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_follow_upgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_follow_upgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_follow_upgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_follow_up">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_follow_upgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_follow_up" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_follow_upgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_follow_up_id" class="patient_follow_up_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Grid->PatID->headerCellClass() ?>"><div id="elh_patient_follow_up_PatID" class="patient_follow_up_PatID"><?= $Grid->renderSort($Grid->PatID) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_patient_follow_up_PatientName" class="patient_follow_up_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_follow_up_MobileNumber" class="patient_follow_up_MobileNumber"><?= $Grid->renderSort($Grid->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_patient_follow_up_mrnno" class="patient_follow_up_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
<?php } ?>
<?php if ($Grid->BP->Visible) { // BP ?>
        <th data-name="BP" class="<?= $Grid->BP->headerCellClass() ?>"><div id="elh_patient_follow_up_BP" class="patient_follow_up_BP"><?= $Grid->renderSort($Grid->BP) ?></div></th>
<?php } ?>
<?php if ($Grid->Pulse->Visible) { // Pulse ?>
        <th data-name="Pulse" class="<?= $Grid->Pulse->headerCellClass() ?>"><div id="elh_patient_follow_up_Pulse" class="patient_follow_up_Pulse"><?= $Grid->renderSort($Grid->Pulse) ?></div></th>
<?php } ?>
<?php if ($Grid->Resp->Visible) { // Resp ?>
        <th data-name="Resp" class="<?= $Grid->Resp->headerCellClass() ?>"><div id="elh_patient_follow_up_Resp" class="patient_follow_up_Resp"><?= $Grid->renderSort($Grid->Resp) ?></div></th>
<?php } ?>
<?php if ($Grid->SPO2->Visible) { // SPO2 ?>
        <th data-name="SPO2" class="<?= $Grid->SPO2->headerCellClass() ?>"><div id="elh_patient_follow_up_SPO2" class="patient_follow_up_SPO2"><?= $Grid->renderSort($Grid->SPO2) ?></div></th>
<?php } ?>
<?php if ($Grid->NextReviewDate->Visible) { // NextReviewDate ?>
        <th data-name="NextReviewDate" class="<?= $Grid->NextReviewDate->headerCellClass() ?>"><div id="elh_patient_follow_up_NextReviewDate" class="patient_follow_up_NextReviewDate"><?= $Grid->renderSort($Grid->NextReviewDate) ?></div></th>
<?php } ?>
<?php if ($Grid->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Grid->Age->headerCellClass() ?>"><div id="elh_patient_follow_up_Age" class="patient_follow_up_Age"><?= $Grid->renderSort($Grid->Age) ?></div></th>
<?php } ?>
<?php if ($Grid->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Grid->Gender->headerCellClass() ?>"><div id="elh_patient_follow_up_Gender" class="patient_follow_up_Gender"><?= $Grid->renderSort($Grid->Gender) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_patient_follow_up_HospID" class="patient_follow_up_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Grid->Reception->headerCellClass() ?>"><div id="elh_patient_follow_up_Reception" class="patient_follow_up_Reception"><?= $Grid->renderSort($Grid->Reception) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Grid->PatientId->headerCellClass() ?>"><div id="elh_patient_follow_up_PatientId" class="patient_follow_up_PatientId"><?= $Grid->renderSort($Grid->PatientId) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_follow_up", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_id" class="form-group"></span>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_id" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_follow_up" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Grid->PatID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<?= $Grid->PatID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_PatID" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_PatID" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_PatientName" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_PatientName" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Grid->MobileNumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<?= $Grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_MobileNumber" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_MobileNumber" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_mrnno" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_mrnno" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BP->Visible) { // BP ?>
        <td data-name="BP" <?= $Grid->BP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_BP" class="form-group">
<input type="<?= $Grid->BP->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_BP" name="x<?= $Grid->RowIndex ?>_BP" id="x<?= $Grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BP->getPlaceHolder()) ?>" value="<?= $Grid->BP->EditValue ?>"<?= $Grid->BP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BP" id="o<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_BP" class="form-group">
<input type="<?= $Grid->BP->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_BP" name="x<?= $Grid->RowIndex ?>_BP" id="x<?= $Grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BP->getPlaceHolder()) ?>" value="<?= $Grid->BP->EditValue ?>"<?= $Grid->BP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_BP">
<span<?= $Grid->BP->viewAttributes() ?>>
<?= $Grid->BP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_BP" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_BP" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Pulse->Visible) { // Pulse ?>
        <td data-name="Pulse" <?= $Grid->Pulse->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Pulse" class="form-group">
<input type="<?= $Grid->Pulse->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Pulse" name="x<?= $Grid->RowIndex ?>_Pulse" id="x<?= $Grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pulse->getPlaceHolder()) ?>" value="<?= $Grid->Pulse->EditValue ?>"<?= $Grid->Pulse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pulse->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pulse" id="o<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Pulse" class="form-group">
<input type="<?= $Grid->Pulse->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Pulse" name="x<?= $Grid->RowIndex ?>_Pulse" id="x<?= $Grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pulse->getPlaceHolder()) ?>" value="<?= $Grid->Pulse->EditValue ?>"<?= $Grid->Pulse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pulse->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Pulse">
<span<?= $Grid->Pulse->viewAttributes() ?>>
<?= $Grid->Pulse->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Pulse" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Pulse" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Resp->Visible) { // Resp ?>
        <td data-name="Resp" <?= $Grid->Resp->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Resp" class="form-group">
<input type="<?= $Grid->Resp->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Resp" name="x<?= $Grid->RowIndex ?>_Resp" id="x<?= $Grid->RowIndex ?>_Resp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Resp->getPlaceHolder()) ?>" value="<?= $Grid->Resp->EditValue ?>"<?= $Grid->Resp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Resp" id="o<?= $Grid->RowIndex ?>_Resp" value="<?= HtmlEncode($Grid->Resp->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Resp" class="form-group">
<input type="<?= $Grid->Resp->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Resp" name="x<?= $Grid->RowIndex ?>_Resp" id="x<?= $Grid->RowIndex ?>_Resp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Resp->getPlaceHolder()) ?>" value="<?= $Grid->Resp->EditValue ?>"<?= $Grid->Resp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resp->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Resp">
<span<?= $Grid->Resp->viewAttributes() ?>>
<?= $Grid->Resp->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Resp" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Resp" value="<?= HtmlEncode($Grid->Resp->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Resp" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Resp" value="<?= HtmlEncode($Grid->Resp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SPO2->Visible) { // SPO2 ?>
        <td data-name="SPO2" <?= $Grid->SPO2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_SPO2" class="form-group">
<input type="<?= $Grid->SPO2->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_SPO2" name="x<?= $Grid->RowIndex ?>_SPO2" id="x<?= $Grid->RowIndex ?>_SPO2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SPO2->getPlaceHolder()) ?>" value="<?= $Grid->SPO2->EditValue ?>"<?= $Grid->SPO2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SPO2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SPO2" id="o<?= $Grid->RowIndex ?>_SPO2" value="<?= HtmlEncode($Grid->SPO2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_SPO2" class="form-group">
<input type="<?= $Grid->SPO2->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_SPO2" name="x<?= $Grid->RowIndex ?>_SPO2" id="x<?= $Grid->RowIndex ?>_SPO2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SPO2->getPlaceHolder()) ?>" value="<?= $Grid->SPO2->EditValue ?>"<?= $Grid->SPO2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SPO2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_SPO2">
<span<?= $Grid->SPO2->viewAttributes() ?>>
<?= $Grid->SPO2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_SPO2" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_SPO2" value="<?= HtmlEncode($Grid->SPO2->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_SPO2" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_SPO2" value="<?= HtmlEncode($Grid->SPO2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NextReviewDate->Visible) { // NextReviewDate ?>
        <td data-name="NextReviewDate" <?= $Grid->NextReviewDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_NextReviewDate" class="form-group">
<input type="<?= $Grid->NextReviewDate->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?= $Grid->RowIndex ?>_NextReviewDate" id="x<?= $Grid->RowIndex ?>_NextReviewDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Grid->NextReviewDate->EditValue ?>"<?= $Grid->NextReviewDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Grid->NextReviewDate->ReadOnly && !$Grid->NextReviewDate->Disabled && !isset($Grid->NextReviewDate->EditAttrs["readonly"]) && !isset($Grid->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_follow_upgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_follow_upgrid", "x<?= $Grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NextReviewDate" id="o<?= $Grid->RowIndex ?>_NextReviewDate" value="<?= HtmlEncode($Grid->NextReviewDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_NextReviewDate" class="form-group">
<input type="<?= $Grid->NextReviewDate->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?= $Grid->RowIndex ?>_NextReviewDate" id="x<?= $Grid->RowIndex ?>_NextReviewDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Grid->NextReviewDate->EditValue ?>"<?= $Grid->NextReviewDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Grid->NextReviewDate->ReadOnly && !$Grid->NextReviewDate->Disabled && !isset($Grid->NextReviewDate->EditAttrs["readonly"]) && !isset($Grid->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_follow_upgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_follow_upgrid", "x<?= $Grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_NextReviewDate">
<span<?= $Grid->NextReviewDate->viewAttributes() ?>>
<?= $Grid->NextReviewDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_NextReviewDate" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_NextReviewDate" value="<?= HtmlEncode($Grid->NextReviewDate->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_NextReviewDate" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_NextReviewDate" value="<?= HtmlEncode($Grid->NextReviewDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Grid->Age->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<?= $Grid->Age->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Age" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Age" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Grid->Gender->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<?= $Grid->Gender->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Gender" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Gender" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_HospID" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_HospID" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Grid->Reception->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Reception" class="form-group">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<?= $Grid->Reception->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Reception" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Reception" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Grid->PatientId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_follow_up_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<?= $Grid->PatientId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" data-hidden="1" name="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_PatientId" id="fpatient_follow_upgrid$x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" data-hidden="1" name="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_PatientId" id="fpatient_follow_upgrid$o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
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
loadjs.ready(["fpatient_follow_upgrid","load"], function () {
    fpatient_follow_upgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_follow_up", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_follow_up_id" class="form-group patient_follow_up_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_id" class="form-group patient_follow_up_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_PatID" class="form-group patient_follow_up_PatID">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_PatID" class="form-group patient_follow_up_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_PatientName" class="form-group patient_follow_up_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_PatientName" class="form-group patient_follow_up_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_MobileNumber" class="form-group patient_follow_up_MobileNumber">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_MobileNumber" class="form-group patient_follow_up_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MobileNumber->getDisplayValue($Grid->MobileNumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_follow_up_mrnno" class="form-group patient_follow_up_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_mrnno" class="form-group patient_follow_up_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_mrnno" class="form-group patient_follow_up_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BP->Visible) { // BP ?>
        <td data-name="BP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_BP" class="form-group patient_follow_up_BP">
<input type="<?= $Grid->BP->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_BP" name="x<?= $Grid->RowIndex ?>_BP" id="x<?= $Grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BP->getPlaceHolder()) ?>" value="<?= $Grid->BP->EditValue ?>"<?= $Grid->BP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BP->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_BP" class="form-group patient_follow_up_BP">
<span<?= $Grid->BP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BP->getDisplayValue($Grid->BP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BP" id="x<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_BP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BP" id="o<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Pulse->Visible) { // Pulse ?>
        <td data-name="Pulse">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_Pulse" class="form-group patient_follow_up_Pulse">
<input type="<?= $Grid->Pulse->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Pulse" name="x<?= $Grid->RowIndex ?>_Pulse" id="x<?= $Grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pulse->getPlaceHolder()) ?>" value="<?= $Grid->Pulse->EditValue ?>"<?= $Grid->Pulse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pulse->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Pulse" class="form-group patient_follow_up_Pulse">
<span<?= $Grid->Pulse->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pulse->getDisplayValue($Grid->Pulse->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Pulse" id="x<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Pulse" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pulse" id="o<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Resp->Visible) { // Resp ?>
        <td data-name="Resp">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_Resp" class="form-group patient_follow_up_Resp">
<input type="<?= $Grid->Resp->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Resp" name="x<?= $Grid->RowIndex ?>_Resp" id="x<?= $Grid->RowIndex ?>_Resp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Resp->getPlaceHolder()) ?>" value="<?= $Grid->Resp->EditValue ?>"<?= $Grid->Resp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resp->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Resp" class="form-group patient_follow_up_Resp">
<span<?= $Grid->Resp->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Resp->getDisplayValue($Grid->Resp->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Resp" id="x<?= $Grid->RowIndex ?>_Resp" value="<?= HtmlEncode($Grid->Resp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Resp" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Resp" id="o<?= $Grid->RowIndex ?>_Resp" value="<?= HtmlEncode($Grid->Resp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SPO2->Visible) { // SPO2 ?>
        <td data-name="SPO2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_SPO2" class="form-group patient_follow_up_SPO2">
<input type="<?= $Grid->SPO2->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_SPO2" name="x<?= $Grid->RowIndex ?>_SPO2" id="x<?= $Grid->RowIndex ?>_SPO2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SPO2->getPlaceHolder()) ?>" value="<?= $Grid->SPO2->EditValue ?>"<?= $Grid->SPO2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SPO2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_SPO2" class="form-group patient_follow_up_SPO2">
<span<?= $Grid->SPO2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SPO2->getDisplayValue($Grid->SPO2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SPO2" id="x<?= $Grid->RowIndex ?>_SPO2" value="<?= HtmlEncode($Grid->SPO2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_SPO2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SPO2" id="o<?= $Grid->RowIndex ?>_SPO2" value="<?= HtmlEncode($Grid->SPO2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NextReviewDate->Visible) { // NextReviewDate ?>
        <td data-name="NextReviewDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_NextReviewDate" class="form-group patient_follow_up_NextReviewDate">
<input type="<?= $Grid->NextReviewDate->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_NextReviewDate" data-format="7" name="x<?= $Grid->RowIndex ?>_NextReviewDate" id="x<?= $Grid->RowIndex ?>_NextReviewDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Grid->NextReviewDate->EditValue ?>"<?= $Grid->NextReviewDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Grid->NextReviewDate->ReadOnly && !$Grid->NextReviewDate->Disabled && !isset($Grid->NextReviewDate->EditAttrs["readonly"]) && !isset($Grid->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_follow_upgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_follow_upgrid", "x<?= $Grid->RowIndex ?>_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_NextReviewDate" class="form-group patient_follow_up_NextReviewDate">
<span<?= $Grid->NextReviewDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NextReviewDate->getDisplayValue($Grid->NextReviewDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NextReviewDate" id="x<?= $Grid->RowIndex ?>_NextReviewDate" value="<?= HtmlEncode($Grid->NextReviewDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_NextReviewDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NextReviewDate" id="o<?= $Grid->RowIndex ?>_NextReviewDate" value="<?= HtmlEncode($Grid->NextReviewDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_Age" class="form-group patient_follow_up_Age">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Age" class="form-group patient_follow_up_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Age->getDisplayValue($Grid->Age->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_follow_up_Gender" class="form-group patient_follow_up_Gender">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Gender" class="form-group patient_follow_up_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gender->getDisplayValue($Grid->Gender->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_HospID" class="form-group patient_follow_up_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_follow_up_Reception" class="form-group patient_follow_up_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Reception" class="form-group patient_follow_up_Reception">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_Reception" class="form-group patient_follow_up_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_follow_up_PatientId" class="form-group patient_follow_up_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_PatientId" class="form-group patient_follow_up_PatientId">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_follow_up_PatientId" class="form-group patient_follow_up_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_follow_up" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_follow_upgrid","load"], function() {
    fpatient_follow_upgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpatient_follow_upgrid">
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
    ew.addEventHandlers("patient_follow_up");
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
        container: "gmp_patient_follow_up",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

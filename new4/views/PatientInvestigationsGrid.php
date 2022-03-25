<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientInvestigationsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_investigationsgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_investigationsgrid = new ew.Form("fpatient_investigationsgrid", "grid");
    fpatient_investigationsgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_investigations")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_investigations)
        ew.vars.tables.patient_investigations = currentTable;
    fpatient_investigationsgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Investigation", [fields.Investigation.visible && fields.Investigation.required ? ew.Validators.required(fields.Investigation.caption) : null], fields.Investigation.isInvalid],
        ["Value", [fields.Value.visible && fields.Value.required ? ew.Validators.required(fields.Value.caption) : null], fields.Value.isInvalid],
        ["NormalRange", [fields.NormalRange.visible && fields.NormalRange.required ? ew.Validators.required(fields.NormalRange.caption) : null], fields.NormalRange.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["SampleCollected", [fields.SampleCollected.visible && fields.SampleCollected.required ? ew.Validators.required(fields.SampleCollected.caption) : null, ew.Validators.datetime(0)], fields.SampleCollected.isInvalid],
        ["SampleCollectedBy", [fields.SampleCollectedBy.visible && fields.SampleCollectedBy.required ? ew.Validators.required(fields.SampleCollectedBy.caption) : null], fields.SampleCollectedBy.isInvalid],
        ["ResultedDate", [fields.ResultedDate.visible && fields.ResultedDate.required ? ew.Validators.required(fields.ResultedDate.caption) : null, ew.Validators.datetime(0)], fields.ResultedDate.isInvalid],
        ["ResultedBy", [fields.ResultedBy.visible && fields.ResultedBy.required ? ew.Validators.required(fields.ResultedBy.caption) : null], fields.ResultedBy.isInvalid],
        ["Modified", [fields.Modified.visible && fields.Modified.required ? ew.Validators.required(fields.Modified.caption) : null, ew.Validators.datetime(0)], fields.Modified.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["Created", [fields.Created.visible && fields.Created.required ? ew.Validators.required(fields.Created.caption) : null, ew.Validators.datetime(0)], fields.Created.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["GroupHead", [fields.GroupHead.visible && fields.GroupHead.required ? ew.Validators.required(fields.GroupHead.caption) : null], fields.GroupHead.isInvalid],
        ["Cost", [fields.Cost.visible && fields.Cost.required ? ew.Validators.required(fields.Cost.caption) : null, ew.Validators.float], fields.Cost.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["PayMode", [fields.PayMode.visible && fields.PayMode.required ? ew.Validators.required(fields.PayMode.caption) : null], fields.PayMode.isInvalid],
        ["VoucherNo", [fields.VoucherNo.visible && fields.VoucherNo.required ? ew.Validators.required(fields.VoucherNo.caption) : null], fields.VoucherNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_investigationsgrid,
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
    fpatient_investigationsgrid.validate = function () {
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
    fpatient_investigationsgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Investigation", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Value", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NormalRange", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SampleCollected", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SampleCollectedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultedDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResultedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Modified", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModifiedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Created", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CreatedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GroupHead", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Cost", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaymentStatus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PayMode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "VoucherNo", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_investigationsgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_investigationsgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_investigationsgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_investigations">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_investigationsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_investigations" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_investigationsgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_investigations_id" class="patient_investigations_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->Investigation->Visible) { // Investigation ?>
        <th data-name="Investigation" class="<?= $Grid->Investigation->headerCellClass() ?>"><div id="elh_patient_investigations_Investigation" class="patient_investigations_Investigation"><?= $Grid->renderSort($Grid->Investigation) ?></div></th>
<?php } ?>
<?php if ($Grid->Value->Visible) { // Value ?>
        <th data-name="Value" class="<?= $Grid->Value->headerCellClass() ?>"><div id="elh_patient_investigations_Value" class="patient_investigations_Value"><?= $Grid->renderSort($Grid->Value) ?></div></th>
<?php } ?>
<?php if ($Grid->NormalRange->Visible) { // NormalRange ?>
        <th data-name="NormalRange" class="<?= $Grid->NormalRange->headerCellClass() ?>"><div id="elh_patient_investigations_NormalRange" class="patient_investigations_NormalRange"><?= $Grid->renderSort($Grid->NormalRange) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_patient_investigations_mrnno" class="patient_investigations_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
<?php } ?>
<?php if ($Grid->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Grid->Age->headerCellClass() ?>"><div id="elh_patient_investigations_Age" class="patient_investigations_Age"><?= $Grid->renderSort($Grid->Age) ?></div></th>
<?php } ?>
<?php if ($Grid->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Grid->Gender->headerCellClass() ?>"><div id="elh_patient_investigations_Gender" class="patient_investigations_Gender"><?= $Grid->renderSort($Grid->Gender) ?></div></th>
<?php } ?>
<?php if ($Grid->SampleCollected->Visible) { // SampleCollected ?>
        <th data-name="SampleCollected" class="<?= $Grid->SampleCollected->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollected" class="patient_investigations_SampleCollected"><?= $Grid->renderSort($Grid->SampleCollected) ?></div></th>
<?php } ?>
<?php if ($Grid->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
        <th data-name="SampleCollectedBy" class="<?= $Grid->SampleCollectedBy->headerCellClass() ?>"><div id="elh_patient_investigations_SampleCollectedBy" class="patient_investigations_SampleCollectedBy"><?= $Grid->renderSort($Grid->SampleCollectedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->ResultedDate->Visible) { // ResultedDate ?>
        <th data-name="ResultedDate" class="<?= $Grid->ResultedDate->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedDate" class="patient_investigations_ResultedDate"><?= $Grid->renderSort($Grid->ResultedDate) ?></div></th>
<?php } ?>
<?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <th data-name="ResultedBy" class="<?= $Grid->ResultedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ResultedBy" class="patient_investigations_ResultedBy"><?= $Grid->renderSort($Grid->ResultedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->Modified->Visible) { // Modified ?>
        <th data-name="Modified" class="<?= $Grid->Modified->headerCellClass() ?>"><div id="elh_patient_investigations_Modified" class="patient_investigations_Modified"><?= $Grid->renderSort($Grid->Modified) ?></div></th>
<?php } ?>
<?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Grid->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_investigations_ModifiedBy" class="patient_investigations_ModifiedBy"><?= $Grid->renderSort($Grid->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->Created->Visible) { // Created ?>
        <th data-name="Created" class="<?= $Grid->Created->headerCellClass() ?>"><div id="elh_patient_investigations_Created" class="patient_investigations_Created"><?= $Grid->renderSort($Grid->Created) ?></div></th>
<?php } ?>
<?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Grid->CreatedBy->headerCellClass() ?>"><div id="elh_patient_investigations_CreatedBy" class="patient_investigations_CreatedBy"><?= $Grid->renderSort($Grid->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->GroupHead->Visible) { // GroupHead ?>
        <th data-name="GroupHead" class="<?= $Grid->GroupHead->headerCellClass() ?>"><div id="elh_patient_investigations_GroupHead" class="patient_investigations_GroupHead"><?= $Grid->renderSort($Grid->GroupHead) ?></div></th>
<?php } ?>
<?php if ($Grid->Cost->Visible) { // Cost ?>
        <th data-name="Cost" class="<?= $Grid->Cost->headerCellClass() ?>"><div id="elh_patient_investigations_Cost" class="patient_investigations_Cost"><?= $Grid->renderSort($Grid->Cost) ?></div></th>
<?php } ?>
<?php if ($Grid->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Grid->PaymentStatus->headerCellClass() ?>"><div id="elh_patient_investigations_PaymentStatus" class="patient_investigations_PaymentStatus"><?= $Grid->renderSort($Grid->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Grid->PayMode->Visible) { // PayMode ?>
        <th data-name="PayMode" class="<?= $Grid->PayMode->headerCellClass() ?>"><div id="elh_patient_investigations_PayMode" class="patient_investigations_PayMode"><?= $Grid->renderSort($Grid->PayMode) ?></div></th>
<?php } ?>
<?php if ($Grid->VoucherNo->Visible) { // VoucherNo ?>
        <th data-name="VoucherNo" class="<?= $Grid->VoucherNo->headerCellClass() ?>"><div id="elh_patient_investigations_VoucherNo" class="patient_investigations_VoucherNo"><?= $Grid->renderSort($Grid->VoucherNo) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_investigations", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_investigations_id" class="form-group"></span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->Investigation->Visible) { // Investigation ?>
        <td data-name="Investigation" <?= $Grid->Investigation->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Investigation" class="form-group">
<input type="<?= $Grid->Investigation->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Investigation" name="x<?= $Grid->RowIndex ?>_Investigation" id="x<?= $Grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Investigation->getPlaceHolder()) ?>" value="<?= $Grid->Investigation->EditValue ?>"<?= $Grid->Investigation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Investigation->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Investigation" id="o<?= $Grid->RowIndex ?>_Investigation" value="<?= HtmlEncode($Grid->Investigation->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Investigation" class="form-group">
<input type="<?= $Grid->Investigation->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Investigation" name="x<?= $Grid->RowIndex ?>_Investigation" id="x<?= $Grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Investigation->getPlaceHolder()) ?>" value="<?= $Grid->Investigation->EditValue ?>"<?= $Grid->Investigation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Investigation->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Investigation">
<span<?= $Grid->Investigation->viewAttributes() ?>>
<?= $Grid->Investigation->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Investigation" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Investigation" value="<?= HtmlEncode($Grid->Investigation->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Investigation" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Investigation" value="<?= HtmlEncode($Grid->Investigation->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Value->Visible) { // Value ?>
        <td data-name="Value" <?= $Grid->Value->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Value" class="form-group">
<input type="<?= $Grid->Value->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Value" name="x<?= $Grid->RowIndex ?>_Value" id="x<?= $Grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Value->getPlaceHolder()) ?>" value="<?= $Grid->Value->EditValue ?>"<?= $Grid->Value->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Value->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Value" id="o<?= $Grid->RowIndex ?>_Value" value="<?= HtmlEncode($Grid->Value->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Value" class="form-group">
<input type="<?= $Grid->Value->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Value" name="x<?= $Grid->RowIndex ?>_Value" id="x<?= $Grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Value->getPlaceHolder()) ?>" value="<?= $Grid->Value->EditValue ?>"<?= $Grid->Value->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Value->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Value">
<span<?= $Grid->Value->viewAttributes() ?>>
<?= $Grid->Value->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Value" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Value" value="<?= HtmlEncode($Grid->Value->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Value" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Value" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Value" value="<?= HtmlEncode($Grid->Value->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NormalRange->Visible) { // NormalRange ?>
        <td data-name="NormalRange" <?= $Grid->NormalRange->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_NormalRange" class="form-group">
<input type="<?= $Grid->NormalRange->getInputTextType() ?>" data-table="patient_investigations" data-field="x_NormalRange" name="x<?= $Grid->RowIndex ?>_NormalRange" id="x<?= $Grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NormalRange->getPlaceHolder()) ?>" value="<?= $Grid->NormalRange->EditValue ?>"<?= $Grid->NormalRange->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NormalRange->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NormalRange" id="o<?= $Grid->RowIndex ?>_NormalRange" value="<?= HtmlEncode($Grid->NormalRange->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_NormalRange" class="form-group">
<input type="<?= $Grid->NormalRange->getInputTextType() ?>" data-table="patient_investigations" data-field="x_NormalRange" name="x<?= $Grid->RowIndex ?>_NormalRange" id="x<?= $Grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NormalRange->getPlaceHolder()) ?>" value="<?= $Grid->NormalRange->EditValue ?>"<?= $Grid->NormalRange->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NormalRange->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_NormalRange">
<span<?= $Grid->NormalRange->viewAttributes() ?>>
<?= $Grid->NormalRange->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_NormalRange" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_NormalRange" value="<?= HtmlEncode($Grid->NormalRange->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_NormalRange" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_NormalRange" value="<?= HtmlEncode($Grid->NormalRange->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_investigations" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_mrnno" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_mrnno" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Grid->Age->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<?= $Grid->Age->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Age" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Age" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Age" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Grid->Gender->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<?= $Grid->Gender->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Gender" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Gender" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SampleCollected->Visible) { // SampleCollected ?>
        <td data-name="SampleCollected" <?= $Grid->SampleCollected->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_SampleCollected" class="form-group">
<input type="<?= $Grid->SampleCollected->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?= $Grid->RowIndex ?>_SampleCollected" id="x<?= $Grid->RowIndex ?>_SampleCollected" placeholder="<?= HtmlEncode($Grid->SampleCollected->getPlaceHolder()) ?>" value="<?= $Grid->SampleCollected->EditValue ?>"<?= $Grid->SampleCollected->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleCollected->getErrorMessage() ?></div>
<?php if (!$Grid->SampleCollected->ReadOnly && !$Grid->SampleCollected->Disabled && !isset($Grid->SampleCollected->EditAttrs["readonly"]) && !isset($Grid->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SampleCollected" id="o<?= $Grid->RowIndex ?>_SampleCollected" value="<?= HtmlEncode($Grid->SampleCollected->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_SampleCollected" class="form-group">
<input type="<?= $Grid->SampleCollected->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?= $Grid->RowIndex ?>_SampleCollected" id="x<?= $Grid->RowIndex ?>_SampleCollected" placeholder="<?= HtmlEncode($Grid->SampleCollected->getPlaceHolder()) ?>" value="<?= $Grid->SampleCollected->EditValue ?>"<?= $Grid->SampleCollected->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleCollected->getErrorMessage() ?></div>
<?php if (!$Grid->SampleCollected->ReadOnly && !$Grid->SampleCollected->Disabled && !isset($Grid->SampleCollected->EditAttrs["readonly"]) && !isset($Grid->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_SampleCollected">
<span<?= $Grid->SampleCollected->viewAttributes() ?>>
<?= $Grid->SampleCollected->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_SampleCollected" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_SampleCollected" value="<?= HtmlEncode($Grid->SampleCollected->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_SampleCollected" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_SampleCollected" value="<?= HtmlEncode($Grid->SampleCollected->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
        <td data-name="SampleCollectedBy" <?= $Grid->SampleCollectedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_SampleCollectedBy" class="form-group">
<input type="<?= $Grid->SampleCollectedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?= $Grid->RowIndex ?>_SampleCollectedBy" id="x<?= $Grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SampleCollectedBy->getPlaceHolder()) ?>" value="<?= $Grid->SampleCollectedBy->EditValue ?>"<?= $Grid->SampleCollectedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleCollectedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SampleCollectedBy" id="o<?= $Grid->RowIndex ?>_SampleCollectedBy" value="<?= HtmlEncode($Grid->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_SampleCollectedBy" class="form-group">
<input type="<?= $Grid->SampleCollectedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?= $Grid->RowIndex ?>_SampleCollectedBy" id="x<?= $Grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SampleCollectedBy->getPlaceHolder()) ?>" value="<?= $Grid->SampleCollectedBy->EditValue ?>"<?= $Grid->SampleCollectedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleCollectedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_SampleCollectedBy">
<span<?= $Grid->SampleCollectedBy->viewAttributes() ?>>
<?= $Grid->SampleCollectedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_SampleCollectedBy" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_SampleCollectedBy" value="<?= HtmlEncode($Grid->SampleCollectedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_SampleCollectedBy" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_SampleCollectedBy" value="<?= HtmlEncode($Grid->SampleCollectedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResultedDate->Visible) { // ResultedDate ?>
        <td data-name="ResultedDate" <?= $Grid->ResultedDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ResultedDate" class="form-group">
<input type="<?= $Grid->ResultedDate->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?= $Grid->RowIndex ?>_ResultedDate" id="x<?= $Grid->RowIndex ?>_ResultedDate" placeholder="<?= HtmlEncode($Grid->ResultedDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultedDate->EditValue ?>"<?= $Grid->ResultedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultedDate->ReadOnly && !$Grid->ResultedDate->Disabled && !isset($Grid->ResultedDate->EditAttrs["readonly"]) && !isset($Grid->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultedDate" id="o<?= $Grid->RowIndex ?>_ResultedDate" value="<?= HtmlEncode($Grid->ResultedDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ResultedDate" class="form-group">
<input type="<?= $Grid->ResultedDate->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?= $Grid->RowIndex ?>_ResultedDate" id="x<?= $Grid->RowIndex ?>_ResultedDate" placeholder="<?= HtmlEncode($Grid->ResultedDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultedDate->EditValue ?>"<?= $Grid->ResultedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultedDate->ReadOnly && !$Grid->ResultedDate->Disabled && !isset($Grid->ResultedDate->EditAttrs["readonly"]) && !isset($Grid->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ResultedDate">
<span<?= $Grid->ResultedDate->viewAttributes() ?>>
<?= $Grid->ResultedDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_ResultedDate" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_ResultedDate" value="<?= HtmlEncode($Grid->ResultedDate->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_ResultedDate" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_ResultedDate" value="<?= HtmlEncode($Grid->ResultedDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" <?= $Grid->ResultedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ResultedBy" class="form-group">
<input type="<?= $Grid->ResultedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResultedBy->getPlaceHolder()) ?>" value="<?= $Grid->ResultedBy->EditValue ?>"<?= $Grid->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultedBy" id="o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ResultedBy" class="form-group">
<input type="<?= $Grid->ResultedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResultedBy->getPlaceHolder()) ?>" value="<?= $Grid->ResultedBy->EditValue ?>"<?= $Grid->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ResultedBy">
<span<?= $Grid->ResultedBy->viewAttributes() ?>>
<?= $Grid->ResultedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_ResultedBy" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_ResultedBy" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Modified->Visible) { // Modified ?>
        <td data-name="Modified" <?= $Grid->Modified->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Modified" class="form-group">
<input type="<?= $Grid->Modified->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Modified" name="x<?= $Grid->RowIndex ?>_Modified" id="x<?= $Grid->RowIndex ?>_Modified" placeholder="<?= HtmlEncode($Grid->Modified->getPlaceHolder()) ?>" value="<?= $Grid->Modified->EditValue ?>"<?= $Grid->Modified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Modified->getErrorMessage() ?></div>
<?php if (!$Grid->Modified->ReadOnly && !$Grid->Modified->Disabled && !isset($Grid->Modified->EditAttrs["readonly"]) && !isset($Grid->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Modified" id="o<?= $Grid->RowIndex ?>_Modified" value="<?= HtmlEncode($Grid->Modified->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Modified" class="form-group">
<input type="<?= $Grid->Modified->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Modified" name="x<?= $Grid->RowIndex ?>_Modified" id="x<?= $Grid->RowIndex ?>_Modified" placeholder="<?= HtmlEncode($Grid->Modified->getPlaceHolder()) ?>" value="<?= $Grid->Modified->EditValue ?>"<?= $Grid->Modified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Modified->getErrorMessage() ?></div>
<?php if (!$Grid->Modified->ReadOnly && !$Grid->Modified->Disabled && !isset($Grid->Modified->EditAttrs["readonly"]) && !isset($Grid->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Modified">
<span<?= $Grid->Modified->viewAttributes() ?>>
<?= $Grid->Modified->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Modified" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Modified" value="<?= HtmlEncode($Grid->Modified->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Modified" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Modified" value="<?= HtmlEncode($Grid->Modified->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Grid->ModifiedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ModifiedBy" class="form-group">
<input type="<?= $Grid->ModifiedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedBy->EditValue ?>"<?= $Grid->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedBy" id="o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ModifiedBy" class="form-group">
<input type="<?= $Grid->ModifiedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedBy->EditValue ?>"<?= $Grid->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_ModifiedBy">
<span<?= $Grid->ModifiedBy->viewAttributes() ?>>
<?= $Grid->ModifiedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_ModifiedBy" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_ModifiedBy" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Created->Visible) { // Created ?>
        <td data-name="Created" <?= $Grid->Created->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Created" class="form-group">
<input type="<?= $Grid->Created->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Created" name="x<?= $Grid->RowIndex ?>_Created" id="x<?= $Grid->RowIndex ?>_Created" placeholder="<?= HtmlEncode($Grid->Created->getPlaceHolder()) ?>" value="<?= $Grid->Created->EditValue ?>"<?= $Grid->Created->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Created->getErrorMessage() ?></div>
<?php if (!$Grid->Created->ReadOnly && !$Grid->Created->Disabled && !isset($Grid->Created->EditAttrs["readonly"]) && !isset($Grid->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Created" id="o<?= $Grid->RowIndex ?>_Created" value="<?= HtmlEncode($Grid->Created->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Created" class="form-group">
<input type="<?= $Grid->Created->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Created" name="x<?= $Grid->RowIndex ?>_Created" id="x<?= $Grid->RowIndex ?>_Created" placeholder="<?= HtmlEncode($Grid->Created->getPlaceHolder()) ?>" value="<?= $Grid->Created->EditValue ?>"<?= $Grid->Created->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Created->getErrorMessage() ?></div>
<?php if (!$Grid->Created->ReadOnly && !$Grid->Created->Disabled && !isset($Grid->Created->EditAttrs["readonly"]) && !isset($Grid->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Created">
<span<?= $Grid->Created->viewAttributes() ?>>
<?= $Grid->Created->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Created" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Created" value="<?= HtmlEncode($Grid->Created->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Created" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Created" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Created" value="<?= HtmlEncode($Grid->Created->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Grid->CreatedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_CreatedBy" class="form-group">
<input type="<?= $Grid->CreatedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreatedBy->getPlaceHolder()) ?>" value="<?= $Grid->CreatedBy->EditValue ?>"<?= $Grid->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreatedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreatedBy" id="o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_CreatedBy" class="form-group">
<input type="<?= $Grid->CreatedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreatedBy->getPlaceHolder()) ?>" value="<?= $Grid->CreatedBy->EditValue ?>"<?= $Grid->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreatedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_CreatedBy">
<span<?= $Grid->CreatedBy->viewAttributes() ?>>
<?= $Grid->CreatedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_CreatedBy" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_CreatedBy" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GroupHead->Visible) { // GroupHead ?>
        <td data-name="GroupHead" <?= $Grid->GroupHead->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_GroupHead" class="form-group">
<input type="<?= $Grid->GroupHead->getInputTextType() ?>" data-table="patient_investigations" data-field="x_GroupHead" name="x<?= $Grid->RowIndex ?>_GroupHead" id="x<?= $Grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?= HtmlEncode($Grid->GroupHead->getPlaceHolder()) ?>" value="<?= $Grid->GroupHead->EditValue ?>"<?= $Grid->GroupHead->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GroupHead->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GroupHead" id="o<?= $Grid->RowIndex ?>_GroupHead" value="<?= HtmlEncode($Grid->GroupHead->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_GroupHead" class="form-group">
<input type="<?= $Grid->GroupHead->getInputTextType() ?>" data-table="patient_investigations" data-field="x_GroupHead" name="x<?= $Grid->RowIndex ?>_GroupHead" id="x<?= $Grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?= HtmlEncode($Grid->GroupHead->getPlaceHolder()) ?>" value="<?= $Grid->GroupHead->EditValue ?>"<?= $Grid->GroupHead->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GroupHead->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_GroupHead">
<span<?= $Grid->GroupHead->viewAttributes() ?>>
<?= $Grid->GroupHead->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_GroupHead" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_GroupHead" value="<?= HtmlEncode($Grid->GroupHead->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_GroupHead" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_GroupHead" value="<?= HtmlEncode($Grid->GroupHead->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Cost->Visible) { // Cost ?>
        <td data-name="Cost" <?= $Grid->Cost->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Cost" class="form-group">
<input type="<?= $Grid->Cost->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Cost" name="x<?= $Grid->RowIndex ?>_Cost" id="x<?= $Grid->RowIndex ?>_Cost" size="30" placeholder="<?= HtmlEncode($Grid->Cost->getPlaceHolder()) ?>" value="<?= $Grid->Cost->EditValue ?>"<?= $Grid->Cost->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Cost->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Cost" id="o<?= $Grid->RowIndex ?>_Cost" value="<?= HtmlEncode($Grid->Cost->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Cost" class="form-group">
<input type="<?= $Grid->Cost->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Cost" name="x<?= $Grid->RowIndex ?>_Cost" id="x<?= $Grid->RowIndex ?>_Cost" size="30" placeholder="<?= HtmlEncode($Grid->Cost->getPlaceHolder()) ?>" value="<?= $Grid->Cost->EditValue ?>"<?= $Grid->Cost->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Cost->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_Cost">
<span<?= $Grid->Cost->viewAttributes() ?>>
<?= $Grid->Cost->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Cost" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_Cost" value="<?= HtmlEncode($Grid->Cost->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Cost" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_Cost" value="<?= HtmlEncode($Grid->Cost->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Grid->PaymentStatus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_PaymentStatus" class="form-group">
<input type="<?= $Grid->PaymentStatus->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?= $Grid->RowIndex ?>_PaymentStatus" id="x<?= $Grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Grid->PaymentStatus->EditValue ?>"<?= $Grid->PaymentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaymentStatus" id="o<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_PaymentStatus" class="form-group">
<input type="<?= $Grid->PaymentStatus->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?= $Grid->RowIndex ?>_PaymentStatus" id="x<?= $Grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Grid->PaymentStatus->EditValue ?>"<?= $Grid->PaymentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentStatus->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_PaymentStatus">
<span<?= $Grid->PaymentStatus->viewAttributes() ?>>
<?= $Grid->PaymentStatus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_PaymentStatus" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_PaymentStatus" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PayMode->Visible) { // PayMode ?>
        <td data-name="PayMode" <?= $Grid->PayMode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_PayMode" class="form-group">
<input type="<?= $Grid->PayMode->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PayMode" name="x<?= $Grid->RowIndex ?>_PayMode" id="x<?= $Grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PayMode->getPlaceHolder()) ?>" value="<?= $Grid->PayMode->EditValue ?>"<?= $Grid->PayMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PayMode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PayMode" id="o<?= $Grid->RowIndex ?>_PayMode" value="<?= HtmlEncode($Grid->PayMode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_PayMode" class="form-group">
<input type="<?= $Grid->PayMode->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PayMode" name="x<?= $Grid->RowIndex ?>_PayMode" id="x<?= $Grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PayMode->getPlaceHolder()) ?>" value="<?= $Grid->PayMode->EditValue ?>"<?= $Grid->PayMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PayMode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_PayMode">
<span<?= $Grid->PayMode->viewAttributes() ?>>
<?= $Grid->PayMode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_PayMode" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_PayMode" value="<?= HtmlEncode($Grid->PayMode->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_PayMode" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_PayMode" value="<?= HtmlEncode($Grid->PayMode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->VoucherNo->Visible) { // VoucherNo ?>
        <td data-name="VoucherNo" <?= $Grid->VoucherNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_VoucherNo" class="form-group">
<input type="<?= $Grid->VoucherNo->getInputTextType() ?>" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?= $Grid->RowIndex ?>_VoucherNo" id="x<?= $Grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->VoucherNo->getPlaceHolder()) ?>" value="<?= $Grid->VoucherNo->EditValue ?>"<?= $Grid->VoucherNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VoucherNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VoucherNo" id="o<?= $Grid->RowIndex ?>_VoucherNo" value="<?= HtmlEncode($Grid->VoucherNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_VoucherNo" class="form-group">
<input type="<?= $Grid->VoucherNo->getInputTextType() ?>" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?= $Grid->RowIndex ?>_VoucherNo" id="x<?= $Grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->VoucherNo->getPlaceHolder()) ?>" value="<?= $Grid->VoucherNo->EditValue ?>"<?= $Grid->VoucherNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VoucherNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_investigations_VoucherNo">
<span<?= $Grid->VoucherNo->viewAttributes() ?>>
<?= $Grid->VoucherNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" data-hidden="1" name="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_VoucherNo" id="fpatient_investigationsgrid$x<?= $Grid->RowIndex ?>_VoucherNo" value="<?= HtmlEncode($Grid->VoucherNo->FormValue) ?>">
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" data-hidden="1" name="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_VoucherNo" id="fpatient_investigationsgrid$o<?= $Grid->RowIndex ?>_VoucherNo" value="<?= HtmlEncode($Grid->VoucherNo->OldValue) ?>">
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
loadjs.ready(["fpatient_investigationsgrid","load"], function () {
    fpatient_investigationsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_investigations", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_investigations_id" class="form-group patient_investigations_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_id" class="form-group patient_investigations_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Investigation->Visible) { // Investigation ?>
        <td data-name="Investigation">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<input type="<?= $Grid->Investigation->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Investigation" name="x<?= $Grid->RowIndex ?>_Investigation" id="x<?= $Grid->RowIndex ?>_Investigation" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Investigation->getPlaceHolder()) ?>" value="<?= $Grid->Investigation->EditValue ?>"<?= $Grid->Investigation->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Investigation->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Investigation" class="form-group patient_investigations_Investigation">
<span<?= $Grid->Investigation->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Investigation->getDisplayValue($Grid->Investigation->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Investigation" id="x<?= $Grid->RowIndex ?>_Investigation" value="<?= HtmlEncode($Grid->Investigation->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Investigation" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Investigation" id="o<?= $Grid->RowIndex ?>_Investigation" value="<?= HtmlEncode($Grid->Investigation->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Value->Visible) { // Value ?>
        <td data-name="Value">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Value" class="form-group patient_investigations_Value">
<input type="<?= $Grid->Value->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Value" name="x<?= $Grid->RowIndex ?>_Value" id="x<?= $Grid->RowIndex ?>_Value" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Value->getPlaceHolder()) ?>" value="<?= $Grid->Value->EditValue ?>"<?= $Grid->Value->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Value->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Value" class="form-group patient_investigations_Value">
<span<?= $Grid->Value->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Value->getDisplayValue($Grid->Value->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Value" id="x<?= $Grid->RowIndex ?>_Value" value="<?= HtmlEncode($Grid->Value->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Value" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Value" id="o<?= $Grid->RowIndex ?>_Value" value="<?= HtmlEncode($Grid->Value->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NormalRange->Visible) { // NormalRange ?>
        <td data-name="NormalRange">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<input type="<?= $Grid->NormalRange->getInputTextType() ?>" data-table="patient_investigations" data-field="x_NormalRange" name="x<?= $Grid->RowIndex ?>_NormalRange" id="x<?= $Grid->RowIndex ?>_NormalRange" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->NormalRange->getPlaceHolder()) ?>" value="<?= $Grid->NormalRange->EditValue ?>"<?= $Grid->NormalRange->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NormalRange->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_NormalRange" class="form-group patient_investigations_NormalRange">
<span<?= $Grid->NormalRange->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NormalRange->getDisplayValue($Grid->NormalRange->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NormalRange" id="x<?= $Grid->RowIndex ?>_NormalRange" value="<?= HtmlEncode($Grid->NormalRange->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_NormalRange" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NormalRange" id="o<?= $Grid->RowIndex ?>_NormalRange" value="<?= HtmlEncode($Grid->NormalRange->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_investigations" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_mrnno" class="form-group patient_investigations_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Age" class="form-group patient_investigations_Age">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Age" class="form-group patient_investigations_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Age->getDisplayValue($Grid->Age->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Gender" class="form-group patient_investigations_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gender->getDisplayValue($Grid->Gender->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SampleCollected->Visible) { // SampleCollected ?>
        <td data-name="SampleCollected">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<input type="<?= $Grid->SampleCollected->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollected" name="x<?= $Grid->RowIndex ?>_SampleCollected" id="x<?= $Grid->RowIndex ?>_SampleCollected" placeholder="<?= HtmlEncode($Grid->SampleCollected->getPlaceHolder()) ?>" value="<?= $Grid->SampleCollected->EditValue ?>"<?= $Grid->SampleCollected->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleCollected->getErrorMessage() ?></div>
<?php if (!$Grid->SampleCollected->ReadOnly && !$Grid->SampleCollected->Disabled && !isset($Grid->SampleCollected->EditAttrs["readonly"]) && !isset($Grid->SampleCollected->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_SampleCollected", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_SampleCollected" class="form-group patient_investigations_SampleCollected">
<span<?= $Grid->SampleCollected->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SampleCollected->getDisplayValue($Grid->SampleCollected->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SampleCollected" id="x<?= $Grid->RowIndex ?>_SampleCollected" value="<?= HtmlEncode($Grid->SampleCollected->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollected" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SampleCollected" id="o<?= $Grid->RowIndex ?>_SampleCollected" value="<?= HtmlEncode($Grid->SampleCollected->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
        <td data-name="SampleCollectedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<input type="<?= $Grid->SampleCollectedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_SampleCollectedBy" name="x<?= $Grid->RowIndex ?>_SampleCollectedBy" id="x<?= $Grid->RowIndex ?>_SampleCollectedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SampleCollectedBy->getPlaceHolder()) ?>" value="<?= $Grid->SampleCollectedBy->EditValue ?>"<?= $Grid->SampleCollectedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SampleCollectedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_SampleCollectedBy" class="form-group patient_investigations_SampleCollectedBy">
<span<?= $Grid->SampleCollectedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SampleCollectedBy->getDisplayValue($Grid->SampleCollectedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SampleCollectedBy" id="x<?= $Grid->RowIndex ?>_SampleCollectedBy" value="<?= HtmlEncode($Grid->SampleCollectedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_SampleCollectedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SampleCollectedBy" id="o<?= $Grid->RowIndex ?>_SampleCollectedBy" value="<?= HtmlEncode($Grid->SampleCollectedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResultedDate->Visible) { // ResultedDate ?>
        <td data-name="ResultedDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<input type="<?= $Grid->ResultedDate->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedDate" name="x<?= $Grid->RowIndex ?>_ResultedDate" id="x<?= $Grid->RowIndex ?>_ResultedDate" placeholder="<?= HtmlEncode($Grid->ResultedDate->getPlaceHolder()) ?>" value="<?= $Grid->ResultedDate->EditValue ?>"<?= $Grid->ResultedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedDate->getErrorMessage() ?></div>
<?php if (!$Grid->ResultedDate->ReadOnly && !$Grid->ResultedDate->Disabled && !isset($Grid->ResultedDate->EditAttrs["readonly"]) && !isset($Grid->ResultedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_ResultedDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ResultedDate" class="form-group patient_investigations_ResultedDate">
<span<?= $Grid->ResultedDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResultedDate->getDisplayValue($Grid->ResultedDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResultedDate" id="x<?= $Grid->RowIndex ?>_ResultedDate" value="<?= HtmlEncode($Grid->ResultedDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultedDate" id="o<?= $Grid->RowIndex ?>_ResultedDate" value="<?= HtmlEncode($Grid->ResultedDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<input type="<?= $Grid->ResultedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ResultedBy" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResultedBy->getPlaceHolder()) ?>" value="<?= $Grid->ResultedBy->EditValue ?>"<?= $Grid->ResultedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResultedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ResultedBy" class="form-group patient_investigations_ResultedBy">
<span<?= $Grid->ResultedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResultedBy->getDisplayValue($Grid->ResultedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultedBy" id="o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Modified->Visible) { // Modified ?>
        <td data-name="Modified">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<input type="<?= $Grid->Modified->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Modified" name="x<?= $Grid->RowIndex ?>_Modified" id="x<?= $Grid->RowIndex ?>_Modified" placeholder="<?= HtmlEncode($Grid->Modified->getPlaceHolder()) ?>" value="<?= $Grid->Modified->EditValue ?>"<?= $Grid->Modified->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Modified->getErrorMessage() ?></div>
<?php if (!$Grid->Modified->ReadOnly && !$Grid->Modified->Disabled && !isset($Grid->Modified->EditAttrs["readonly"]) && !isset($Grid->Modified->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_Modified", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Modified" class="form-group patient_investigations_Modified">
<span<?= $Grid->Modified->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Modified->getDisplayValue($Grid->Modified->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Modified" id="x<?= $Grid->RowIndex ?>_Modified" value="<?= HtmlEncode($Grid->Modified->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Modified" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Modified" id="o<?= $Grid->RowIndex ?>_Modified" value="<?= HtmlEncode($Grid->Modified->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<input type="<?= $Grid->ModifiedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_ModifiedBy" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Grid->ModifiedBy->EditValue ?>"<?= $Grid->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModifiedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_ModifiedBy" class="form-group patient_investigations_ModifiedBy">
<span<?= $Grid->ModifiedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModifiedBy->getDisplayValue($Grid->ModifiedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedBy" id="o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Created->Visible) { // Created ?>
        <td data-name="Created">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Created" class="form-group patient_investigations_Created">
<input type="<?= $Grid->Created->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Created" name="x<?= $Grid->RowIndex ?>_Created" id="x<?= $Grid->RowIndex ?>_Created" placeholder="<?= HtmlEncode($Grid->Created->getPlaceHolder()) ?>" value="<?= $Grid->Created->EditValue ?>"<?= $Grid->Created->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Created->getErrorMessage() ?></div>
<?php if (!$Grid->Created->ReadOnly && !$Grid->Created->Disabled && !isset($Grid->Created->EditAttrs["readonly"]) && !isset($Grid->Created->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_investigationsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_investigationsgrid", "x<?= $Grid->RowIndex ?>_Created", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Created" class="form-group patient_investigations_Created">
<span<?= $Grid->Created->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Created->getDisplayValue($Grid->Created->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Created" id="x<?= $Grid->RowIndex ?>_Created" value="<?= HtmlEncode($Grid->Created->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Created" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Created" id="o<?= $Grid->RowIndex ?>_Created" value="<?= HtmlEncode($Grid->Created->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<input type="<?= $Grid->CreatedBy->getInputTextType() ?>" data-table="patient_investigations" data-field="x_CreatedBy" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CreatedBy->getPlaceHolder()) ?>" value="<?= $Grid->CreatedBy->EditValue ?>"<?= $Grid->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CreatedBy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_CreatedBy" class="form-group patient_investigations_CreatedBy">
<span<?= $Grid->CreatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CreatedBy->getDisplayValue($Grid->CreatedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreatedBy" id="o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GroupHead->Visible) { // GroupHead ?>
        <td data-name="GroupHead">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<input type="<?= $Grid->GroupHead->getInputTextType() ?>" data-table="patient_investigations" data-field="x_GroupHead" name="x<?= $Grid->RowIndex ?>_GroupHead" id="x<?= $Grid->RowIndex ?>_GroupHead" size="30" maxlength="4" placeholder="<?= HtmlEncode($Grid->GroupHead->getPlaceHolder()) ?>" value="<?= $Grid->GroupHead->EditValue ?>"<?= $Grid->GroupHead->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GroupHead->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_GroupHead" class="form-group patient_investigations_GroupHead">
<span<?= $Grid->GroupHead->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GroupHead->getDisplayValue($Grid->GroupHead->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GroupHead" id="x<?= $Grid->RowIndex ?>_GroupHead" value="<?= HtmlEncode($Grid->GroupHead->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_GroupHead" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GroupHead" id="o<?= $Grid->RowIndex ?>_GroupHead" value="<?= HtmlEncode($Grid->GroupHead->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Cost->Visible) { // Cost ?>
        <td data-name="Cost">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<input type="<?= $Grid->Cost->getInputTextType() ?>" data-table="patient_investigations" data-field="x_Cost" name="x<?= $Grid->RowIndex ?>_Cost" id="x<?= $Grid->RowIndex ?>_Cost" size="30" placeholder="<?= HtmlEncode($Grid->Cost->getPlaceHolder()) ?>" value="<?= $Grid->Cost->EditValue ?>"<?= $Grid->Cost->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Cost->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_Cost" class="form-group patient_investigations_Cost">
<span<?= $Grid->Cost->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Cost->getDisplayValue($Grid->Cost->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Cost" id="x<?= $Grid->RowIndex ?>_Cost" value="<?= HtmlEncode($Grid->Cost->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_Cost" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Cost" id="o<?= $Grid->RowIndex ?>_Cost" value="<?= HtmlEncode($Grid->Cost->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<input type="<?= $Grid->PaymentStatus->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PaymentStatus" name="x<?= $Grid->RowIndex ?>_PaymentStatus" id="x<?= $Grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Grid->PaymentStatus->EditValue ?>"<?= $Grid->PaymentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentStatus->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_PaymentStatus" class="form-group patient_investigations_PaymentStatus">
<span<?= $Grid->PaymentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PaymentStatus->getDisplayValue($Grid->PaymentStatus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PaymentStatus" id="x<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PaymentStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaymentStatus" id="o<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PayMode->Visible) { // PayMode ?>
        <td data-name="PayMode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<input type="<?= $Grid->PayMode->getInputTextType() ?>" data-table="patient_investigations" data-field="x_PayMode" name="x<?= $Grid->RowIndex ?>_PayMode" id="x<?= $Grid->RowIndex ?>_PayMode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PayMode->getPlaceHolder()) ?>" value="<?= $Grid->PayMode->EditValue ?>"<?= $Grid->PayMode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PayMode->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_PayMode" class="form-group patient_investigations_PayMode">
<span<?= $Grid->PayMode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PayMode->getDisplayValue($Grid->PayMode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PayMode" id="x<?= $Grid->RowIndex ?>_PayMode" value="<?= HtmlEncode($Grid->PayMode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_PayMode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PayMode" id="o<?= $Grid->RowIndex ?>_PayMode" value="<?= HtmlEncode($Grid->PayMode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->VoucherNo->Visible) { // VoucherNo ?>
        <td data-name="VoucherNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<input type="<?= $Grid->VoucherNo->getInputTextType() ?>" data-table="patient_investigations" data-field="x_VoucherNo" name="x<?= $Grid->RowIndex ?>_VoucherNo" id="x<?= $Grid->RowIndex ?>_VoucherNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->VoucherNo->getPlaceHolder()) ?>" value="<?= $Grid->VoucherNo->EditValue ?>"<?= $Grid->VoucherNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->VoucherNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_investigations_VoucherNo" class="form-group patient_investigations_VoucherNo">
<span<?= $Grid->VoucherNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->VoucherNo->getDisplayValue($Grid->VoucherNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_VoucherNo" id="x<?= $Grid->RowIndex ?>_VoucherNo" value="<?= HtmlEncode($Grid->VoucherNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_investigations" data-field="x_VoucherNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_VoucherNo" id="o<?= $Grid->RowIndex ?>_VoucherNo" value="<?= HtmlEncode($Grid->VoucherNo->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_investigationsgrid","load"], function() {
    fpatient_investigationsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpatient_investigationsgrid">
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
    ew.addEventHandlers("patient_investigations");
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
        container: "gmp_patient_investigations",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientTelephoneGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_telephonegrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_telephonegrid = new ew.Form("fpatient_telephonegrid", "grid");
    fpatient_telephonegrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_telephone")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_telephone)
        ew.vars.tables.patient_telephone = currentTable;
    fpatient_telephonegrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null], fields.patient_id.isInvalid],
        ["tele_type", [fields.tele_type.visible && fields.tele_type.required ? ew.Validators.required(fields.tele_type.caption) : null], fields.tele_type.isInvalid],
        ["telephone", [fields.telephone.visible && fields.telephone.required ? ew.Validators.required(fields.telephone.caption) : null], fields.telephone.isInvalid],
        ["telephone_type", [fields.telephone_type.visible && fields.telephone_type.required ? ew.Validators.required(fields.telephone_type.caption) : null], fields.telephone_type.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_telephonegrid,
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
    fpatient_telephonegrid.validate = function () {
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
    fpatient_telephonegrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "patient_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "tele_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "telephone", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "telephone_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_telephonegrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_telephonegrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_telephonegrid.lists.tele_type = <?= $Grid->tele_type->toClientList($Grid) ?>;
    fpatient_telephonegrid.lists.telephone_type = <?= $Grid->telephone_type->toClientList($Grid) ?>;
    fpatient_telephonegrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("fpatient_telephonegrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_telephone">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_telephonegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_telephone" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_telephonegrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_telephone_id" class="patient_telephone_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Grid->patient_id->headerCellClass() ?>"><div id="elh_patient_telephone_patient_id" class="patient_telephone_patient_id"><?= $Grid->renderSort($Grid->patient_id) ?></div></th>
<?php } ?>
<?php if ($Grid->tele_type->Visible) { // tele_type ?>
        <th data-name="tele_type" class="<?= $Grid->tele_type->headerCellClass() ?>"><div id="elh_patient_telephone_tele_type" class="patient_telephone_tele_type"><?= $Grid->renderSort($Grid->tele_type) ?></div></th>
<?php } ?>
<?php if ($Grid->telephone->Visible) { // telephone ?>
        <th data-name="telephone" class="<?= $Grid->telephone->headerCellClass() ?>"><div id="elh_patient_telephone_telephone" class="patient_telephone_telephone"><?= $Grid->renderSort($Grid->telephone) ?></div></th>
<?php } ?>
<?php if ($Grid->telephone_type->Visible) { // telephone_type ?>
        <th data-name="telephone_type" class="<?= $Grid->telephone_type->headerCellClass() ?>"><div id="elh_patient_telephone_telephone_type" class="patient_telephone_telephone_type"><?= $Grid->renderSort($Grid->telephone_type) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_patient_telephone_status" class="patient_telephone_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_telephone", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_telephone_id" class="form-group"></span>
<input type="hidden" data-table="patient_telephone" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_id" data-hidden="1" name="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_id" data-hidden="1" name="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_telephone" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Grid->patient_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->patient_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_patient_id" class="form-group">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_patient_id" class="form-group">
<input type="<?= $Grid->patient_id->getInputTextType() ?>" data-table="patient_telephone" data-field="x_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" size="30" placeholder="<?= HtmlEncode($Grid->patient_id->getPlaceHolder()) ?>" value="<?= $Grid->patient_id->EditValue ?>"<?= $Grid->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient_id" id="o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_patient_id" class="form-group">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<?= $Grid->patient_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" data-hidden="1" name="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_patient_id" id="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" data-hidden="1" name="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_patient_id" id="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->tele_type->Visible) { // tele_type ?>
        <td data-name="tele_type" <?= $Grid->tele_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_tele_type" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_tele_type"
        name="x<?= $Grid->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Grid->tele_type->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_tele_type"
        data-table="patient_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Grid->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tele_type->getPlaceHolder()) ?>"
        <?= $Grid->tele_type->editAttributes() ?>>
        <?= $Grid->tele_type->selectOptionListHtml("x{$Grid->RowIndex}_tele_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->tele_type->getErrorMessage() ?></div>
<?= $Grid->tele_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tele_type", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_tele_type" id="o<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_tele_type" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_tele_type"
        name="x<?= $Grid->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Grid->tele_type->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_tele_type"
        data-table="patient_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Grid->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tele_type->getPlaceHolder()) ?>"
        <?= $Grid->tele_type->editAttributes() ?>>
        <?= $Grid->tele_type->selectOptionListHtml("x{$Grid->RowIndex}_tele_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->tele_type->getErrorMessage() ?></div>
<?= $Grid->tele_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tele_type", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_tele_type">
<span<?= $Grid->tele_type->viewAttributes() ?>>
<?= $Grid->tele_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" data-hidden="1" name="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_tele_type" id="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" data-hidden="1" name="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_tele_type" id="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->telephone->Visible) { // telephone ?>
        <td data-name="telephone" <?= $Grid->telephone->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_telephone" class="form-group">
<input type="<?= $Grid->telephone->getInputTextType() ?>" data-table="patient_telephone" data-field="x_telephone" name="x<?= $Grid->RowIndex ?>_telephone" id="x<?= $Grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Grid->telephone->getPlaceHolder()) ?>" value="<?= $Grid->telephone->EditValue ?>"<?= $Grid->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->telephone->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" data-hidden="1" name="o<?= $Grid->RowIndex ?>_telephone" id="o<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_telephone" class="form-group">
<input type="<?= $Grid->telephone->getInputTextType() ?>" data-table="patient_telephone" data-field="x_telephone" name="x<?= $Grid->RowIndex ?>_telephone" id="x<?= $Grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Grid->telephone->getPlaceHolder()) ?>" value="<?= $Grid->telephone->EditValue ?>"<?= $Grid->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->telephone->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_telephone">
<span<?= $Grid->telephone->viewAttributes() ?>>
<?= $Grid->telephone->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" data-hidden="1" name="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_telephone" id="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" data-hidden="1" name="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_telephone" id="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->telephone_type->Visible) { // telephone_type ?>
        <td data-name="telephone_type" <?= $Grid->telephone_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_telephone_type" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_telephone_type"
        name="x<?= $Grid->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Grid->telephone_type->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type"
        data-table="patient_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Grid->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->telephone_type->getPlaceHolder()) ?>"
        <?= $Grid->telephone_type->editAttributes() ?>>
        <?= $Grid->telephone_type->selectOptionListHtml("x{$Grid->RowIndex}_telephone_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->telephone_type->getErrorMessage() ?></div>
<?= $Grid->telephone_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_telephone_type", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_telephone_type" id="o<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_telephone_type" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_telephone_type"
        name="x<?= $Grid->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Grid->telephone_type->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type"
        data-table="patient_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Grid->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->telephone_type->getPlaceHolder()) ?>"
        <?= $Grid->telephone_type->editAttributes() ?>>
        <?= $Grid->telephone_type->selectOptionListHtml("x{$Grid->RowIndex}_telephone_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->telephone_type->getErrorMessage() ?></div>
<?= $Grid->telephone_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_telephone_type", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_telephone_type">
<span<?= $Grid->telephone_type->viewAttributes() ?>>
<?= $Grid->telephone_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" data-hidden="1" name="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_telephone_type" id="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" data-hidden="1" name="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_telephone_type" id="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_telephone"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_telephone"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_telephone_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_telephone" data-field="x_status" data-hidden="1" name="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_status" id="fpatient_telephonegrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_telephone" data-field="x_status" data-hidden="1" name="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_status" id="fpatient_telephonegrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
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
loadjs.ready(["fpatient_telephonegrid","load"], function () {
    fpatient_telephonegrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_telephone", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_telephone_id" class="form-group patient_telephone_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_id" class="form-group patient_telephone_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->patient_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_telephone_patient_id" class="form-group patient_telephone_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_patient_id" class="form-group patient_telephone_patient_id">
<input type="<?= $Grid->patient_id->getInputTextType() ?>" data-table="patient_telephone" data-field="x_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" size="30" placeholder="<?= HtmlEncode($Grid->patient_id->getPlaceHolder()) ?>" value="<?= $Grid->patient_id->EditValue ?>"<?= $Grid->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_patient_id" class="form-group patient_telephone_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_patient_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient_id" id="o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->tele_type->Visible) { // tele_type ?>
        <td data-name="tele_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_tele_type" class="form-group patient_telephone_tele_type">
    <select
        id="x<?= $Grid->RowIndex ?>_tele_type"
        name="x<?= $Grid->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Grid->tele_type->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_tele_type"
        data-table="patient_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Grid->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tele_type->getPlaceHolder()) ?>"
        <?= $Grid->tele_type->editAttributes() ?>>
        <?= $Grid->tele_type->selectOptionListHtml("x{$Grid->RowIndex}_tele_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->tele_type->getErrorMessage() ?></div>
<?= $Grid->tele_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tele_type", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_tele_type" class="form-group patient_telephone_tele_type">
<span<?= $Grid->tele_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->tele_type->getDisplayValue($Grid->tele_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_tele_type" id="x<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_tele_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_tele_type" id="o<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->telephone->Visible) { // telephone ?>
        <td data-name="telephone">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_telephone" class="form-group patient_telephone_telephone">
<input type="<?= $Grid->telephone->getInputTextType() ?>" data-table="patient_telephone" data-field="x_telephone" name="x<?= $Grid->RowIndex ?>_telephone" id="x<?= $Grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Grid->telephone->getPlaceHolder()) ?>" value="<?= $Grid->telephone->EditValue ?>"<?= $Grid->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->telephone->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_telephone" class="form-group patient_telephone_telephone">
<span<?= $Grid->telephone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->telephone->getDisplayValue($Grid->telephone->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" data-hidden="1" name="x<?= $Grid->RowIndex ?>_telephone" id="x<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone" data-hidden="1" name="o<?= $Grid->RowIndex ?>_telephone" id="o<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->telephone_type->Visible) { // telephone_type ?>
        <td data-name="telephone_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_telephone_type" class="form-group patient_telephone_telephone_type">
    <select
        id="x<?= $Grid->RowIndex ?>_telephone_type"
        name="x<?= $Grid->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Grid->telephone_type->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type"
        data-table="patient_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Grid->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->telephone_type->getPlaceHolder()) ?>"
        <?= $Grid->telephone_type->editAttributes() ?>>
        <?= $Grid->telephone_type->selectOptionListHtml("x{$Grid->RowIndex}_telephone_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->telephone_type->getErrorMessage() ?></div>
<?= $Grid->telephone_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_telephone_type", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_telephone_type" class="form-group patient_telephone_telephone_type">
<span<?= $Grid->telephone_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->telephone_type->getDisplayValue($Grid->telephone_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_telephone_type" id="x<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_telephone_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_telephone_type" id="o<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_telephone_status" class="form-group patient_telephone_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_telephone_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_telephone"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_telephone_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_telephone_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_telephone_status" class="form-group patient_telephone_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_telephone" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_telephone" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_telephonegrid","load"], function() {
    fpatient_telephonegrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpatient_telephonegrid">
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
    ew.addEventHandlers("patient_telephone");
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
        container: "gmp_patient_telephone",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

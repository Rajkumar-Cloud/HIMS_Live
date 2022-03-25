<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientAddressGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_addressgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_addressgrid = new ew.Form("fpatient_addressgrid", "grid");
    fpatient_addressgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_address")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_address)
        ew.vars.tables.patient_address = currentTable;
    fpatient_addressgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null], fields.patient_id.isInvalid],
        ["street", [fields.street.visible && fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["town", [fields.town.visible && fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["address_type", [fields.address_type.visible && fields.address_type.required ? ew.Validators.required(fields.address_type.caption) : null], fields.address_type.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_addressgrid,
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
    fpatient_addressgrid.validate = function () {
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
    fpatient_addressgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "patient_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "street", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "town", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "province", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "postal_code", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "address_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_addressgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_addressgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_addressgrid.lists.address_type = <?= $Grid->address_type->toClientList($Grid) ?>;
    fpatient_addressgrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("fpatient_addressgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_address">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_addressgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_address" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_addressgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_address_id" class="patient_address_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Grid->patient_id->headerCellClass() ?>"><div id="elh_patient_address_patient_id" class="patient_address_patient_id"><?= $Grid->renderSort($Grid->patient_id) ?></div></th>
<?php } ?>
<?php if ($Grid->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Grid->street->headerCellClass() ?>"><div id="elh_patient_address_street" class="patient_address_street"><?= $Grid->renderSort($Grid->street) ?></div></th>
<?php } ?>
<?php if ($Grid->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Grid->town->headerCellClass() ?>"><div id="elh_patient_address_town" class="patient_address_town"><?= $Grid->renderSort($Grid->town) ?></div></th>
<?php } ?>
<?php if ($Grid->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Grid->province->headerCellClass() ?>"><div id="elh_patient_address_province" class="patient_address_province"><?= $Grid->renderSort($Grid->province) ?></div></th>
<?php } ?>
<?php if ($Grid->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Grid->postal_code->headerCellClass() ?>"><div id="elh_patient_address_postal_code" class="patient_address_postal_code"><?= $Grid->renderSort($Grid->postal_code) ?></div></th>
<?php } ?>
<?php if ($Grid->address_type->Visible) { // address_type ?>
        <th data-name="address_type" class="<?= $Grid->address_type->headerCellClass() ?>"><div id="elh_patient_address_address_type" class="patient_address_address_type"><?= $Grid->renderSort($Grid->address_type) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_patient_address_status" class="patient_address_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_address", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_address_id" class="form-group"></span>
<input type="hidden" data-table="patient_address" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_id" data-hidden="1" name="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_id" data-hidden="1" name="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_address" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Grid->patient_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->patient_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_patient_id" class="form-group">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_patient_id" class="form-group">
<input type="<?= $Grid->patient_id->getInputTextType() ?>" data-table="patient_address" data-field="x_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" size="30" placeholder="<?= HtmlEncode($Grid->patient_id->getPlaceHolder()) ?>" value="<?= $Grid->patient_id->EditValue ?>"<?= $Grid->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient_id" id="o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_patient_id" class="form-group">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<?= $Grid->patient_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" data-hidden="1" name="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_patient_id" id="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_patient_id" data-hidden="1" name="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_patient_id" id="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->street->Visible) { // street ?>
        <td data-name="street" <?= $Grid->street->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_street" class="form-group">
<input type="<?= $Grid->street->getInputTextType() ?>" data-table="patient_address" data-field="x_street" name="x<?= $Grid->RowIndex ?>_street" id="x<?= $Grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->street->getPlaceHolder()) ?>" value="<?= $Grid->street->EditValue ?>"<?= $Grid->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->street->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_address" data-field="x_street" data-hidden="1" name="o<?= $Grid->RowIndex ?>_street" id="o<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_street" class="form-group">
<input type="<?= $Grid->street->getInputTextType() ?>" data-table="patient_address" data-field="x_street" name="x<?= $Grid->RowIndex ?>_street" id="x<?= $Grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->street->getPlaceHolder()) ?>" value="<?= $Grid->street->EditValue ?>"<?= $Grid->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->street->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_street">
<span<?= $Grid->street->viewAttributes() ?>>
<?= $Grid->street->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_street" data-hidden="1" name="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_street" id="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_street" data-hidden="1" name="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_street" id="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->town->Visible) { // town ?>
        <td data-name="town" <?= $Grid->town->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_town" class="form-group">
<input type="<?= $Grid->town->getInputTextType() ?>" data-table="patient_address" data-field="x_town" name="x<?= $Grid->RowIndex ?>_town" id="x<?= $Grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->town->getPlaceHolder()) ?>" value="<?= $Grid->town->EditValue ?>"<?= $Grid->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->town->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_address" data-field="x_town" data-hidden="1" name="o<?= $Grid->RowIndex ?>_town" id="o<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_town" class="form-group">
<input type="<?= $Grid->town->getInputTextType() ?>" data-table="patient_address" data-field="x_town" name="x<?= $Grid->RowIndex ?>_town" id="x<?= $Grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->town->getPlaceHolder()) ?>" value="<?= $Grid->town->EditValue ?>"<?= $Grid->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->town->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_town">
<span<?= $Grid->town->viewAttributes() ?>>
<?= $Grid->town->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_town" data-hidden="1" name="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_town" id="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_town" data-hidden="1" name="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_town" id="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->province->Visible) { // province ?>
        <td data-name="province" <?= $Grid->province->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_province" class="form-group">
<input type="<?= $Grid->province->getInputTextType() ?>" data-table="patient_address" data-field="x_province" name="x<?= $Grid->RowIndex ?>_province" id="x<?= $Grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->province->getPlaceHolder()) ?>" value="<?= $Grid->province->EditValue ?>"<?= $Grid->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->province->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_address" data-field="x_province" data-hidden="1" name="o<?= $Grid->RowIndex ?>_province" id="o<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_province" class="form-group">
<input type="<?= $Grid->province->getInputTextType() ?>" data-table="patient_address" data-field="x_province" name="x<?= $Grid->RowIndex ?>_province" id="x<?= $Grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->province->getPlaceHolder()) ?>" value="<?= $Grid->province->EditValue ?>"<?= $Grid->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->province->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_province">
<span<?= $Grid->province->viewAttributes() ?>>
<?= $Grid->province->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_province" data-hidden="1" name="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_province" id="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_province" data-hidden="1" name="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_province" id="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Grid->postal_code->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_postal_code" class="form-group">
<input type="<?= $Grid->postal_code->getInputTextType() ?>" data-table="patient_address" data-field="x_postal_code" name="x<?= $Grid->RowIndex ?>_postal_code" id="x<?= $Grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->postal_code->getPlaceHolder()) ?>" value="<?= $Grid->postal_code->EditValue ?>"<?= $Grid->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->postal_code->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" data-hidden="1" name="o<?= $Grid->RowIndex ?>_postal_code" id="o<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_postal_code" class="form-group">
<input type="<?= $Grid->postal_code->getInputTextType() ?>" data-table="patient_address" data-field="x_postal_code" name="x<?= $Grid->RowIndex ?>_postal_code" id="x<?= $Grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->postal_code->getPlaceHolder()) ?>" value="<?= $Grid->postal_code->EditValue ?>"<?= $Grid->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->postal_code->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_postal_code">
<span<?= $Grid->postal_code->viewAttributes() ?>>
<?= $Grid->postal_code->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" data-hidden="1" name="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_postal_code" id="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_postal_code" data-hidden="1" name="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_postal_code" id="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->address_type->Visible) { // address_type ?>
        <td data-name="address_type" <?= $Grid->address_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_address_type" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_address_type"
        name="x<?= $Grid->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Grid->address_type->isInvalidClass() ?>"
        data-select2-id="patient_address_x<?= $Grid->RowIndex ?>_address_type"
        data-table="patient_address"
        data-field="x_address_type"
        data-value-separator="<?= $Grid->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->address_type->getPlaceHolder()) ?>"
        <?= $Grid->address_type->editAttributes() ?>>
        <?= $Grid->address_type->selectOptionListHtml("x{$Grid->RowIndex}_address_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->address_type->getErrorMessage() ?></div>
<?= $Grid->address_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_address_x<?= $Grid->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_address_type", selectId: "patient_address_x<?= $Grid->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_address" data-field="x_address_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_address_type" id="o<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_address_type" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_address_type"
        name="x<?= $Grid->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Grid->address_type->isInvalidClass() ?>"
        data-select2-id="patient_address_x<?= $Grid->RowIndex ?>_address_type"
        data-table="patient_address"
        data-field="x_address_type"
        data-value-separator="<?= $Grid->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->address_type->getPlaceHolder()) ?>"
        <?= $Grid->address_type->editAttributes() ?>>
        <?= $Grid->address_type->selectOptionListHtml("x{$Grid->RowIndex}_address_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->address_type->getErrorMessage() ?></div>
<?= $Grid->address_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_address_x<?= $Grid->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_address_type", selectId: "patient_address_x<?= $Grid->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_address_type">
<span<?= $Grid->address_type->viewAttributes() ?>>
<?= $Grid->address_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_address_type" data-hidden="1" name="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_address_type" id="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_address_type" data-hidden="1" name="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_address_type" id="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_address_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_address"
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
    var el = document.querySelector("select[data-select2-id='patient_address_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_address_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_address" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_address_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_address"
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
    var el = document.querySelector("select[data-select2-id='patient_address_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_address_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_address_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_address" data-field="x_status" data-hidden="1" name="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_status" id="fpatient_addressgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_address" data-field="x_status" data-hidden="1" name="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_status" id="fpatient_addressgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
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
loadjs.ready(["fpatient_addressgrid","load"], function () {
    fpatient_addressgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_address", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_address_id" class="form-group patient_address_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_id" class="form-group patient_address_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->patient_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<input type="<?= $Grid->patient_id->getInputTextType() ?>" data-table="patient_address" data-field="x_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" size="30" placeholder="<?= HtmlEncode($Grid->patient_id->getPlaceHolder()) ?>" value="<?= $Grid->patient_id->EditValue ?>"<?= $Grid->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_address_patient_id" class="form-group patient_address_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_patient_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient_id" id="o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->street->Visible) { // street ?>
        <td data-name="street">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_street" class="form-group patient_address_street">
<input type="<?= $Grid->street->getInputTextType() ?>" data-table="patient_address" data-field="x_street" name="x<?= $Grid->RowIndex ?>_street" id="x<?= $Grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->street->getPlaceHolder()) ?>" value="<?= $Grid->street->EditValue ?>"<?= $Grid->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->street->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_street" class="form-group patient_address_street">
<span<?= $Grid->street->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->street->getDisplayValue($Grid->street->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_street" data-hidden="1" name="x<?= $Grid->RowIndex ?>_street" id="x<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_street" data-hidden="1" name="o<?= $Grid->RowIndex ?>_street" id="o<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->town->Visible) { // town ?>
        <td data-name="town">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_town" class="form-group patient_address_town">
<input type="<?= $Grid->town->getInputTextType() ?>" data-table="patient_address" data-field="x_town" name="x<?= $Grid->RowIndex ?>_town" id="x<?= $Grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->town->getPlaceHolder()) ?>" value="<?= $Grid->town->EditValue ?>"<?= $Grid->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->town->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_town" class="form-group patient_address_town">
<span<?= $Grid->town->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->town->getDisplayValue($Grid->town->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_town" data-hidden="1" name="x<?= $Grid->RowIndex ?>_town" id="x<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_town" data-hidden="1" name="o<?= $Grid->RowIndex ?>_town" id="o<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->province->Visible) { // province ?>
        <td data-name="province">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_province" class="form-group patient_address_province">
<input type="<?= $Grid->province->getInputTextType() ?>" data-table="patient_address" data-field="x_province" name="x<?= $Grid->RowIndex ?>_province" id="x<?= $Grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->province->getPlaceHolder()) ?>" value="<?= $Grid->province->EditValue ?>"<?= $Grid->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->province->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_province" class="form-group patient_address_province">
<span<?= $Grid->province->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->province->getDisplayValue($Grid->province->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_province" data-hidden="1" name="x<?= $Grid->RowIndex ?>_province" id="x<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_province" data-hidden="1" name="o<?= $Grid->RowIndex ?>_province" id="o<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_postal_code" class="form-group patient_address_postal_code">
<input type="<?= $Grid->postal_code->getInputTextType() ?>" data-table="patient_address" data-field="x_postal_code" name="x<?= $Grid->RowIndex ?>_postal_code" id="x<?= $Grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->postal_code->getPlaceHolder()) ?>" value="<?= $Grid->postal_code->EditValue ?>"<?= $Grid->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->postal_code->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_postal_code" class="form-group patient_address_postal_code">
<span<?= $Grid->postal_code->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->postal_code->getDisplayValue($Grid->postal_code->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" data-hidden="1" name="x<?= $Grid->RowIndex ?>_postal_code" id="x<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_postal_code" data-hidden="1" name="o<?= $Grid->RowIndex ?>_postal_code" id="o<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->address_type->Visible) { // address_type ?>
        <td data-name="address_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_address_type" class="form-group patient_address_address_type">
    <select
        id="x<?= $Grid->RowIndex ?>_address_type"
        name="x<?= $Grid->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Grid->address_type->isInvalidClass() ?>"
        data-select2-id="patient_address_x<?= $Grid->RowIndex ?>_address_type"
        data-table="patient_address"
        data-field="x_address_type"
        data-value-separator="<?= $Grid->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->address_type->getPlaceHolder()) ?>"
        <?= $Grid->address_type->editAttributes() ?>>
        <?= $Grid->address_type->selectOptionListHtml("x{$Grid->RowIndex}_address_type") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->address_type->getErrorMessage() ?></div>
<?= $Grid->address_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_address_x<?= $Grid->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_address_type", selectId: "patient_address_x<?= $Grid->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_address_type" class="form-group patient_address_address_type">
<span<?= $Grid->address_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->address_type->getDisplayValue($Grid->address_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_address_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_address_type" id="x<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_address_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_address_type" id="o<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_address_status" class="form-group patient_address_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_address_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_address"
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
    var el = document.querySelector("select[data-select2-id='patient_address_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_address_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_address_status" class="form-group patient_address_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_address" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_address" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_addressgrid","load"], function() {
    fpatient_addressgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpatient_addressgrid">
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
    ew.addEventHandlers("patient_address");
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
        container: "gmp_patient_address",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

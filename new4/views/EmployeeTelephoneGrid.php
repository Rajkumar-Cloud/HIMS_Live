<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("EmployeeTelephoneGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_telephonegrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    femployee_telephonegrid = new ew.Form("femployee_telephonegrid", "grid");
    femployee_telephonegrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_telephone")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_telephone)
        ew.vars.tables.employee_telephone = currentTable;
    femployee_telephonegrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["tele_type", [fields.tele_type.visible && fields.tele_type.required ? ew.Validators.required(fields.tele_type.caption) : null], fields.tele_type.isInvalid],
        ["telephone", [fields.telephone.visible && fields.telephone.required ? ew.Validators.required(fields.telephone.caption) : null], fields.telephone.isInvalid],
        ["telephone_type", [fields.telephone_type.visible && fields.telephone_type.required ? ew.Validators.required(fields.telephone_type.caption) : null], fields.telephone_type.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_telephonegrid,
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
    femployee_telephonegrid.validate = function () {
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
    femployee_telephonegrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "tele_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "telephone", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "telephone_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    femployee_telephonegrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_telephonegrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_telephonegrid.lists.tele_type = <?= $Grid->tele_type->toClientList($Grid) ?>;
    femployee_telephonegrid.lists.telephone_type = <?= $Grid->telephone_type->toClientList($Grid) ?>;
    femployee_telephonegrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("femployee_telephonegrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_telephone">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_telephonegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_telephone" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_telephonegrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_employee_telephone_id" class="employee_telephone_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Grid->employee_id->headerCellClass() ?>"><div id="elh_employee_telephone_employee_id" class="employee_telephone_employee_id"><?= $Grid->renderSort($Grid->employee_id) ?></div></th>
<?php } ?>
<?php if ($Grid->tele_type->Visible) { // tele_type ?>
        <th data-name="tele_type" class="<?= $Grid->tele_type->headerCellClass() ?>"><div id="elh_employee_telephone_tele_type" class="employee_telephone_tele_type"><?= $Grid->renderSort($Grid->tele_type) ?></div></th>
<?php } ?>
<?php if ($Grid->telephone->Visible) { // telephone ?>
        <th data-name="telephone" class="<?= $Grid->telephone->headerCellClass() ?>"><div id="elh_employee_telephone_telephone" class="employee_telephone_telephone"><?= $Grid->renderSort($Grid->telephone) ?></div></th>
<?php } ?>
<?php if ($Grid->telephone_type->Visible) { // telephone_type ?>
        <th data-name="telephone_type" class="<?= $Grid->telephone_type->headerCellClass() ?>"><div id="elh_employee_telephone_telephone_type" class="employee_telephone_telephone_type"><?= $Grid->renderSort($Grid->telephone_type) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_employee_telephone_status" class="employee_telephone_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_employee_telephone_HospID" class="employee_telephone_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_employee_telephone", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_employee_telephone_id" class="form-group"></span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_id" id="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_id" id="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Grid->employee_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_telephone" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_telephone" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<?= $Grid->employee_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" data-hidden="1" name="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_employee_id" id="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" data-hidden="1" name="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_employee_id" id="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->tele_type->Visible) { // tele_type ?>
        <td data-name="tele_type" <?= $Grid->tele_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_tele_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_tele_type"
        name="x<?= $Grid->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Grid->tele_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_tele_type"
        data-table="employee_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Grid->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tele_type->getPlaceHolder()) ?>"
        <?= $Grid->tele_type->editAttributes() ?>>
        <?= $Grid->tele_type->selectOptionListHtml("x{$Grid->RowIndex}_tele_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$Grid->tele_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_tele_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->tele_type->caption() ?>" data-title="<?= $Grid->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_tele_type',url:'<?= GetUrl("SysTeleTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->tele_type->getErrorMessage() ?></div>
<?= $Grid->tele_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tele_type", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_tele_type" id="o<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_tele_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_tele_type"
        name="x<?= $Grid->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Grid->tele_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_tele_type"
        data-table="employee_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Grid->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tele_type->getPlaceHolder()) ?>"
        <?= $Grid->tele_type->editAttributes() ?>>
        <?= $Grid->tele_type->selectOptionListHtml("x{$Grid->RowIndex}_tele_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$Grid->tele_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_tele_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->tele_type->caption() ?>" data-title="<?= $Grid->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_tele_type',url:'<?= GetUrl("SysTeleTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->tele_type->getErrorMessage() ?></div>
<?= $Grid->tele_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tele_type", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_tele_type">
<span<?= $Grid->tele_type->viewAttributes() ?>>
<?= $Grid->tele_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" data-hidden="1" name="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_tele_type" id="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" data-hidden="1" name="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_tele_type" id="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->telephone->Visible) { // telephone ?>
        <td data-name="telephone" <?= $Grid->telephone->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_telephone" class="form-group">
<input type="<?= $Grid->telephone->getInputTextType() ?>" data-table="employee_telephone" data-field="x_telephone" name="x<?= $Grid->RowIndex ?>_telephone" id="x<?= $Grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Grid->telephone->getPlaceHolder()) ?>" value="<?= $Grid->telephone->EditValue ?>"<?= $Grid->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->telephone->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" data-hidden="1" name="o<?= $Grid->RowIndex ?>_telephone" id="o<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_telephone" class="form-group">
<input type="<?= $Grid->telephone->getInputTextType() ?>" data-table="employee_telephone" data-field="x_telephone" name="x<?= $Grid->RowIndex ?>_telephone" id="x<?= $Grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Grid->telephone->getPlaceHolder()) ?>" value="<?= $Grid->telephone->EditValue ?>"<?= $Grid->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->telephone->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_telephone">
<span<?= $Grid->telephone->viewAttributes() ?>>
<?= $Grid->telephone->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" data-hidden="1" name="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_telephone" id="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" data-hidden="1" name="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_telephone" id="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->telephone_type->Visible) { // telephone_type ?>
        <td data-name="telephone_type" <?= $Grid->telephone_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_telephone_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_telephone_type"
        name="x<?= $Grid->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Grid->telephone_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type"
        data-table="employee_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Grid->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->telephone_type->getPlaceHolder()) ?>"
        <?= $Grid->telephone_type->editAttributes() ?>>
        <?= $Grid->telephone_type->selectOptionListHtml("x{$Grid->RowIndex}_telephone_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$Grid->telephone_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_telephone_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->telephone_type->caption() ?>" data-title="<?= $Grid->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_telephone_type',url:'<?= GetUrl("SysTelephoneTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->telephone_type->getErrorMessage() ?></div>
<?= $Grid->telephone_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_telephone_type", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_telephone_type" id="o<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_telephone_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_telephone_type"
        name="x<?= $Grid->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Grid->telephone_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type"
        data-table="employee_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Grid->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->telephone_type->getPlaceHolder()) ?>"
        <?= $Grid->telephone_type->editAttributes() ?>>
        <?= $Grid->telephone_type->selectOptionListHtml("x{$Grid->RowIndex}_telephone_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$Grid->telephone_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_telephone_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->telephone_type->caption() ?>" data-title="<?= $Grid->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_telephone_type',url:'<?= GetUrl("SysTelephoneTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->telephone_type->getErrorMessage() ?></div>
<?= $Grid->telephone_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_telephone_type", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_telephone_type">
<span<?= $Grid->telephone_type->viewAttributes() ?>>
<?= $Grid->telephone_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" data-hidden="1" name="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_telephone_type" id="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" data-hidden="1" name="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_telephone_type" id="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_telephone"
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
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_telephone"
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
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_status" data-hidden="1" name="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_status" id="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_status" data-hidden="1" name="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_status" id="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_telephone" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_telephone" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_telephone_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" data-hidden="1" name="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_HospID" id="femployee_telephonegrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" data-hidden="1" name="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_HospID" id="femployee_telephonegrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["femployee_telephonegrid","load"], function () {
    femployee_telephonegrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_employee_telephone", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_employee_telephone_id" class="form-group employee_telephone_id"></span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_id" class="form-group employee_telephone_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_telephone" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_employee_id" class="form-group employee_telephone_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->tele_type->Visible) { // tele_type ?>
        <td data-name="tele_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_tele_type"
        name="x<?= $Grid->RowIndex ?>_tele_type"
        class="form-control ew-select<?= $Grid->tele_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_tele_type"
        data-table="employee_telephone"
        data-field="x_tele_type"
        data-value-separator="<?= $Grid->tele_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->tele_type->getPlaceHolder()) ?>"
        <?= $Grid->tele_type->editAttributes() ?>>
        <?= $Grid->tele_type->selectOptionListHtml("x{$Grid->RowIndex}_tele_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_tele_type") && !$Grid->tele_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_tele_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->tele_type->caption() ?>" data-title="<?= $Grid->tele_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_tele_type',url:'<?= GetUrl("SysTeleTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->tele_type->getErrorMessage() ?></div>
<?= $Grid->tele_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_tele_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_tele_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_tele_type", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_tele_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.tele_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_tele_type" class="form-group employee_telephone_tele_type">
<span<?= $Grid->tele_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->tele_type->getDisplayValue($Grid->tele_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_tele_type" id="x<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_tele_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_tele_type" id="o<?= $Grid->RowIndex ?>_tele_type" value="<?= HtmlEncode($Grid->tele_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->telephone->Visible) { // telephone ?>
        <td data-name="telephone">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<input type="<?= $Grid->telephone->getInputTextType() ?>" data-table="employee_telephone" data-field="x_telephone" name="x<?= $Grid->RowIndex ?>_telephone" id="x<?= $Grid->RowIndex ?>_telephone" size="30" maxlength="10" placeholder="<?= HtmlEncode($Grid->telephone->getPlaceHolder()) ?>" value="<?= $Grid->telephone->EditValue ?>"<?= $Grid->telephone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->telephone->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_telephone" class="form-group employee_telephone_telephone">
<span<?= $Grid->telephone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->telephone->getDisplayValue($Grid->telephone->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" data-hidden="1" name="x<?= $Grid->RowIndex ?>_telephone" id="x<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone" data-hidden="1" name="o<?= $Grid->RowIndex ?>_telephone" id="o<?= $Grid->RowIndex ?>_telephone" value="<?= HtmlEncode($Grid->telephone->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->telephone_type->Visible) { // telephone_type ?>
        <td data-name="telephone_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_telephone_type"
        name="x<?= $Grid->RowIndex ?>_telephone_type"
        class="form-control ew-select<?= $Grid->telephone_type->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type"
        data-table="employee_telephone"
        data-field="x_telephone_type"
        data-value-separator="<?= $Grid->telephone_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->telephone_type->getPlaceHolder()) ?>"
        <?= $Grid->telephone_type->editAttributes() ?>>
        <?= $Grid->telephone_type->selectOptionListHtml("x{$Grid->RowIndex}_telephone_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_telephone_type") && !$Grid->telephone_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_telephone_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->telephone_type->caption() ?>" data-title="<?= $Grid->telephone_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_telephone_type',url:'<?= GetUrl("SysTelephoneTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->telephone_type->getErrorMessage() ?></div>
<?= $Grid->telephone_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_telephone_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_telephone_type", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_telephone_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.telephone_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_telephone_type" class="form-group employee_telephone_telephone_type">
<span<?= $Grid->telephone_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->telephone_type->getDisplayValue($Grid->telephone_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_telephone_type" id="x<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_telephone_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_telephone_type" id="o<?= $Grid->RowIndex ?>_telephone_type" value="<?= HtmlEncode($Grid->telephone_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_status" class="form-group employee_telephone_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_telephone_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_telephone"
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
    var el = document.querySelector("select[data-select2-id='employee_telephone_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_telephone_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_telephone.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_status" class="form-group employee_telephone_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_telephone" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_telephone_HospID" class="form-group employee_telephone_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_telephone" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["femployee_telephonegrid","load"], function() {
    femployee_telephonegrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="femployee_telephonegrid">
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
    ew.addEventHandlers("employee_telephone");
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
        container: "gmp_employee_telephone",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("EmployeeDocumentGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_documentgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    femployee_documentgrid = new ew.Form("femployee_documentgrid", "grid");
    femployee_documentgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_document")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_document)
        ew.vars.tables.employee_document = currentTable;
    femployee_documentgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["DocumentName", [fields.DocumentName.visible && fields.DocumentName.required ? ew.Validators.required(fields.DocumentName.caption) : null], fields.DocumentName.isInvalid],
        ["DocumentNumber", [fields.DocumentNumber.visible && fields.DocumentNumber.required ? ew.Validators.required(fields.DocumentNumber.caption) : null], fields.DocumentNumber.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_documentgrid,
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
    femployee_documentgrid.validate = function () {
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
    femployee_documentgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DocumentName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DocumentNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    femployee_documentgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_documentgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_documentgrid.lists.DocumentName = <?= $Grid->DocumentName->toClientList($Grid) ?>;
    femployee_documentgrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("femployee_documentgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_document">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_documentgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_document" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_documentgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_employee_document_id" class="employee_document_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Grid->employee_id->headerCellClass() ?>"><div id="elh_employee_document_employee_id" class="employee_document_employee_id"><?= $Grid->renderSort($Grid->employee_id) ?></div></th>
<?php } ?>
<?php if ($Grid->DocumentName->Visible) { // DocumentName ?>
        <th data-name="DocumentName" class="<?= $Grid->DocumentName->headerCellClass() ?>"><div id="elh_employee_document_DocumentName" class="employee_document_DocumentName"><?= $Grid->renderSort($Grid->DocumentName) ?></div></th>
<?php } ?>
<?php if ($Grid->DocumentNumber->Visible) { // DocumentNumber ?>
        <th data-name="DocumentNumber" class="<?= $Grid->DocumentNumber->headerCellClass() ?>"><div id="elh_employee_document_DocumentNumber" class="employee_document_DocumentNumber"><?= $Grid->renderSort($Grid->DocumentNumber) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_employee_document_status" class="employee_document_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_employee_document_createdby" class="employee_document_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_employee_document_createddatetime" class="employee_document_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_employee_document_modifiedby" class="employee_document_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_employee_document_modifieddatetime" class="employee_document_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_employee_document_HospID" class="employee_document_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_employee_document", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_employee_document_id" class="form-group"></span>
<input type="hidden" data-table="employee_document" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_id" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_id" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_id" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_id" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_document" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Grid->employee_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_document" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_document" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<?= $Grid->employee_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_employee_id" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_employee_id" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_employee_id" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DocumentName->Visible) { // DocumentName ?>
        <td data-name="DocumentName" <?= $Grid->DocumentName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_DocumentName" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_DocumentName"
        name="x<?= $Grid->RowIndex ?>_DocumentName"
        class="form-control ew-select<?= $Grid->DocumentName->isInvalidClass() ?>"
        data-select2-id="employee_document_x<?= $Grid->RowIndex ?>_DocumentName"
        data-table="employee_document"
        data-field="x_DocumentName"
        data-value-separator="<?= $Grid->DocumentName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->DocumentName->getPlaceHolder()) ?>"
        <?= $Grid->DocumentName->editAttributes() ?>>
        <?= $Grid->DocumentName->selectOptionListHtml("x{$Grid->RowIndex}_DocumentName") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$Grid->DocumentName->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_DocumentName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->DocumentName->caption() ?>" data-title="<?= $Grid->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DocumentName',url:'<?= GetUrl("MasDocumentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->DocumentName->getErrorMessage() ?></div>
<?= $Grid->DocumentName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DocumentName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_document_x<?= $Grid->RowIndex ?>_DocumentName']"),
        options = { name: "x<?= $Grid->RowIndex ?>_DocumentName", selectId: "employee_document_x<?= $Grid->RowIndex ?>_DocumentName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_document.fields.DocumentName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DocumentName" id="o<?= $Grid->RowIndex ?>_DocumentName" value="<?= HtmlEncode($Grid->DocumentName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_DocumentName" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_DocumentName"
        name="x<?= $Grid->RowIndex ?>_DocumentName"
        class="form-control ew-select<?= $Grid->DocumentName->isInvalidClass() ?>"
        data-select2-id="employee_document_x<?= $Grid->RowIndex ?>_DocumentName"
        data-table="employee_document"
        data-field="x_DocumentName"
        data-value-separator="<?= $Grid->DocumentName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->DocumentName->getPlaceHolder()) ?>"
        <?= $Grid->DocumentName->editAttributes() ?>>
        <?= $Grid->DocumentName->selectOptionListHtml("x{$Grid->RowIndex}_DocumentName") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$Grid->DocumentName->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_DocumentName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->DocumentName->caption() ?>" data-title="<?= $Grid->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DocumentName',url:'<?= GetUrl("MasDocumentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->DocumentName->getErrorMessage() ?></div>
<?= $Grid->DocumentName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DocumentName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_document_x<?= $Grid->RowIndex ?>_DocumentName']"),
        options = { name: "x<?= $Grid->RowIndex ?>_DocumentName", selectId: "employee_document_x<?= $Grid->RowIndex ?>_DocumentName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_document.fields.DocumentName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_DocumentName">
<span<?= $Grid->DocumentName->viewAttributes() ?>>
<?= $Grid->DocumentName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_DocumentName" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_DocumentName" value="<?= HtmlEncode($Grid->DocumentName->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_DocumentName" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_DocumentName" value="<?= HtmlEncode($Grid->DocumentName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DocumentNumber->Visible) { // DocumentNumber ?>
        <td data-name="DocumentNumber" <?= $Grid->DocumentNumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_DocumentNumber" class="form-group">
<input type="<?= $Grid->DocumentNumber->getInputTextType() ?>" data-table="employee_document" data-field="x_DocumentNumber" name="x<?= $Grid->RowIndex ?>_DocumentNumber" id="x<?= $Grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DocumentNumber->getPlaceHolder()) ?>" value="<?= $Grid->DocumentNumber->EditValue ?>"<?= $Grid->DocumentNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DocumentNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DocumentNumber" id="o<?= $Grid->RowIndex ?>_DocumentNumber" value="<?= HtmlEncode($Grid->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_DocumentNumber" class="form-group">
<input type="<?= $Grid->DocumentNumber->getInputTextType() ?>" data-table="employee_document" data-field="x_DocumentNumber" name="x<?= $Grid->RowIndex ?>_DocumentNumber" id="x<?= $Grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DocumentNumber->getPlaceHolder()) ?>" value="<?= $Grid->DocumentNumber->EditValue ?>"<?= $Grid->DocumentNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DocumentNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_DocumentNumber">
<span<?= $Grid->DocumentNumber->viewAttributes() ?>>
<?= $Grid->DocumentNumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_DocumentNumber" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_DocumentNumber" value="<?= HtmlEncode($Grid->DocumentNumber->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_DocumentNumber" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_DocumentNumber" value="<?= HtmlEncode($Grid->DocumentNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_document_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_document"
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
    var el = document.querySelector("select[data-select2-id='employee_document_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_document_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_document.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_document_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_document"
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
    var el = document.querySelector("select[data-select2-id='employee_document_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_document_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_document.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_status" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_status" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_status" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_status" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_createdby" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createdby" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_createdby" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_modifiedby" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_modifiedby" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_document" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_document" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_document" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_document_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_document" data-field="x_HospID" data-hidden="1" name="femployee_documentgrid$x<?= $Grid->RowIndex ?>_HospID" id="femployee_documentgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_document" data-field="x_HospID" data-hidden="1" name="femployee_documentgrid$o<?= $Grid->RowIndex ?>_HospID" id="femployee_documentgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["femployee_documentgrid","load"], function () {
    femployee_documentgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_employee_document", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_employee_document_id" class="form-group employee_document_id"></span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_id" class="form-group employee_document_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_document" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_employee_id" class="form-group employee_document_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DocumentName->Visible) { // DocumentName ?>
        <td data-name="DocumentName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_DocumentName"
        name="x<?= $Grid->RowIndex ?>_DocumentName"
        class="form-control ew-select<?= $Grid->DocumentName->isInvalidClass() ?>"
        data-select2-id="employee_document_x<?= $Grid->RowIndex ?>_DocumentName"
        data-table="employee_document"
        data-field="x_DocumentName"
        data-value-separator="<?= $Grid->DocumentName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->DocumentName->getPlaceHolder()) ?>"
        <?= $Grid->DocumentName->editAttributes() ?>>
        <?= $Grid->DocumentName->selectOptionListHtml("x{$Grid->RowIndex}_DocumentName") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_document") && !$Grid->DocumentName->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_DocumentName" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->DocumentName->caption() ?>" data-title="<?= $Grid->DocumentName->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DocumentName',url:'<?= GetUrl("MasDocumentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->DocumentName->getErrorMessage() ?></div>
<?= $Grid->DocumentName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DocumentName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_document_x<?= $Grid->RowIndex ?>_DocumentName']"),
        options = { name: "x<?= $Grid->RowIndex ?>_DocumentName", selectId: "employee_document_x<?= $Grid->RowIndex ?>_DocumentName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_document.fields.DocumentName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_DocumentName" class="form-group employee_document_DocumentName">
<span<?= $Grid->DocumentName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DocumentName->getDisplayValue($Grid->DocumentName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DocumentName" id="x<?= $Grid->RowIndex ?>_DocumentName" value="<?= HtmlEncode($Grid->DocumentName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DocumentName" id="o<?= $Grid->RowIndex ?>_DocumentName" value="<?= HtmlEncode($Grid->DocumentName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DocumentNumber->Visible) { // DocumentNumber ?>
        <td data-name="DocumentNumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<input type="<?= $Grid->DocumentNumber->getInputTextType() ?>" data-table="employee_document" data-field="x_DocumentNumber" name="x<?= $Grid->RowIndex ?>_DocumentNumber" id="x<?= $Grid->RowIndex ?>_DocumentNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DocumentNumber->getPlaceHolder()) ?>" value="<?= $Grid->DocumentNumber->EditValue ?>"<?= $Grid->DocumentNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DocumentNumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_DocumentNumber" class="form-group employee_document_DocumentNumber">
<span<?= $Grid->DocumentNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DocumentNumber->getDisplayValue($Grid->DocumentNumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DocumentNumber" id="x<?= $Grid->RowIndex ?>_DocumentNumber" value="<?= HtmlEncode($Grid->DocumentNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_DocumentNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DocumentNumber" id="o<?= $Grid->RowIndex ?>_DocumentNumber" value="<?= HtmlEncode($Grid->DocumentNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_status" class="form-group employee_document_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_document_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_document"
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
    var el = document.querySelector("select[data-select2-id='employee_document_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_document_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_document.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_status" class="form-group employee_document_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_createdby" class="form-group employee_document_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_createddatetime" class="form-group employee_document_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_modifiedby" class="form-group employee_document_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_employee_document_modifieddatetime" class="form-group employee_document_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_document_HospID" class="form-group employee_document_HospID">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_document" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_document_HospID" class="form-group employee_document_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_document" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_document" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["femployee_documentgrid","load"], function() {
    femployee_documentgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="femployee_documentgrid">
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
    ew.addEventHandlers("employee_document");
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
        container: "gmp_employee_document",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

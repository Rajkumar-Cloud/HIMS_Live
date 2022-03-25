<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("EmployeeHasDegreeGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_has_degreegrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    femployee_has_degreegrid = new ew.Form("femployee_has_degreegrid", "grid");
    femployee_has_degreegrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_has_degree")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_has_degree)
        ew.vars.tables.employee_has_degree = currentTable;
    femployee_has_degreegrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["degree_id", [fields.degree_id.visible && fields.degree_id.required ? ew.Validators.required(fields.degree_id.caption) : null], fields.degree_id.isInvalid],
        ["college_or_school", [fields.college_or_school.visible && fields.college_or_school.required ? ew.Validators.required(fields.college_or_school.caption) : null], fields.college_or_school.isInvalid],
        ["university_or_board", [fields.university_or_board.visible && fields.university_or_board.required ? ew.Validators.required(fields.university_or_board.caption) : null], fields.university_or_board.isInvalid],
        ["year_of_passing", [fields.year_of_passing.visible && fields.year_of_passing.required ? ew.Validators.required(fields.year_of_passing.caption) : null], fields.year_of_passing.isInvalid],
        ["scoring_marks", [fields.scoring_marks.visible && fields.scoring_marks.required ? ew.Validators.required(fields.scoring_marks.caption) : null], fields.scoring_marks.isInvalid],
        ["certificates", [fields.certificates.visible && fields.certificates.required ? ew.Validators.fileRequired(fields.certificates.caption) : null], fields.certificates.isInvalid],
        ["_others", [fields._others.visible && fields._others.required ? ew.Validators.fileRequired(fields._others.caption) : null], fields._others.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_has_degreegrid,
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
    femployee_has_degreegrid.validate = function () {
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
    femployee_has_degreegrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "degree_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "college_or_school", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "university_or_board", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "year_of_passing", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "scoring_marks", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "certificates", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "_others", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    femployee_has_degreegrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_has_degreegrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_has_degreegrid.lists.degree_id = <?= $Grid->degree_id->toClientList($Grid) ?>;
    femployee_has_degreegrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("femployee_has_degreegrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_degree">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_has_degreegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_has_degree" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_has_degreegrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_employee_has_degree_id" class="employee_has_degree_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Grid->employee_id->headerCellClass() ?>"><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id"><?= $Grid->renderSort($Grid->employee_id) ?></div></th>
<?php } ?>
<?php if ($Grid->degree_id->Visible) { // degree_id ?>
        <th data-name="degree_id" class="<?= $Grid->degree_id->headerCellClass() ?>"><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id"><?= $Grid->renderSort($Grid->degree_id) ?></div></th>
<?php } ?>
<?php if ($Grid->college_or_school->Visible) { // college_or_school ?>
        <th data-name="college_or_school" class="<?= $Grid->college_or_school->headerCellClass() ?>"><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school"><?= $Grid->renderSort($Grid->college_or_school) ?></div></th>
<?php } ?>
<?php if ($Grid->university_or_board->Visible) { // university_or_board ?>
        <th data-name="university_or_board" class="<?= $Grid->university_or_board->headerCellClass() ?>"><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board"><?= $Grid->renderSort($Grid->university_or_board) ?></div></th>
<?php } ?>
<?php if ($Grid->year_of_passing->Visible) { // year_of_passing ?>
        <th data-name="year_of_passing" class="<?= $Grid->year_of_passing->headerCellClass() ?>"><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing"><?= $Grid->renderSort($Grid->year_of_passing) ?></div></th>
<?php } ?>
<?php if ($Grid->scoring_marks->Visible) { // scoring_marks ?>
        <th data-name="scoring_marks" class="<?= $Grid->scoring_marks->headerCellClass() ?>"><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks"><?= $Grid->renderSort($Grid->scoring_marks) ?></div></th>
<?php } ?>
<?php if ($Grid->certificates->Visible) { // certificates ?>
        <th data-name="certificates" class="<?= $Grid->certificates->headerCellClass() ?>"><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates"><?= $Grid->renderSort($Grid->certificates) ?></div></th>
<?php } ?>
<?php if ($Grid->_others->Visible) { // others ?>
        <th data-name="_others" class="<?= $Grid->_others->headerCellClass() ?>"><div id="elh_employee_has_degree__others" class="employee_has_degree__others"><?= $Grid->renderSort($Grid->_others) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_employee_has_degree_status" class="employee_has_degree_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_employee_has_degree_HospID" class="employee_has_degree_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_employee_has_degree", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_id" class="form-group"></span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_id" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_id" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Grid->employee_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<?= $Grid->employee_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_employee_id" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_employee_id" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->degree_id->Visible) { // degree_id ?>
        <td data-name="degree_id" <?= $Grid->degree_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_degree_id" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_degree_id"
        name="x<?= $Grid->RowIndex ?>_degree_id"
        class="form-control ew-select<?= $Grid->degree_id->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id"
        data-table="employee_has_degree"
        data-field="x_degree_id"
        data-value-separator="<?= $Grid->degree_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->degree_id->getPlaceHolder()) ?>"
        <?= $Grid->degree_id->editAttributes() ?>>
        <?= $Grid->degree_id->selectOptionListHtml("x{$Grid->RowIndex}_degree_id") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$Grid->degree_id->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_degree_id" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->degree_id->caption() ?>" data-title="<?= $Grid->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_degree_id',url:'<?= GetUrl("MasDegreeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->degree_id->getErrorMessage() ?></div>
<?= $Grid->degree_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_degree_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id']"),
        options = { name: "x<?= $Grid->RowIndex ?>_degree_id", selectId: "employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.degree_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_degree_id" id="o<?= $Grid->RowIndex ?>_degree_id" value="<?= HtmlEncode($Grid->degree_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_degree_id" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_degree_id"
        name="x<?= $Grid->RowIndex ?>_degree_id"
        class="form-control ew-select<?= $Grid->degree_id->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id"
        data-table="employee_has_degree"
        data-field="x_degree_id"
        data-value-separator="<?= $Grid->degree_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->degree_id->getPlaceHolder()) ?>"
        <?= $Grid->degree_id->editAttributes() ?>>
        <?= $Grid->degree_id->selectOptionListHtml("x{$Grid->RowIndex}_degree_id") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$Grid->degree_id->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_degree_id" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->degree_id->caption() ?>" data-title="<?= $Grid->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_degree_id',url:'<?= GetUrl("MasDegreeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->degree_id->getErrorMessage() ?></div>
<?= $Grid->degree_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_degree_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id']"),
        options = { name: "x<?= $Grid->RowIndex ?>_degree_id", selectId: "employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.degree_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_degree_id">
<span<?= $Grid->degree_id->viewAttributes() ?>>
<?= $Grid->degree_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_degree_id" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_degree_id" value="<?= HtmlEncode($Grid->degree_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_degree_id" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_degree_id" value="<?= HtmlEncode($Grid->degree_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->college_or_school->Visible) { // college_or_school ?>
        <td data-name="college_or_school" <?= $Grid->college_or_school->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_college_or_school" class="form-group">
<input type="<?= $Grid->college_or_school->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?= $Grid->RowIndex ?>_college_or_school" id="x<?= $Grid->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->college_or_school->getPlaceHolder()) ?>" value="<?= $Grid->college_or_school->EditValue ?>"<?= $Grid->college_or_school->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->college_or_school->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" data-hidden="1" name="o<?= $Grid->RowIndex ?>_college_or_school" id="o<?= $Grid->RowIndex ?>_college_or_school" value="<?= HtmlEncode($Grid->college_or_school->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_college_or_school" class="form-group">
<input type="<?= $Grid->college_or_school->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?= $Grid->RowIndex ?>_college_or_school" id="x<?= $Grid->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->college_or_school->getPlaceHolder()) ?>" value="<?= $Grid->college_or_school->EditValue ?>"<?= $Grid->college_or_school->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->college_or_school->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_college_or_school">
<span<?= $Grid->college_or_school->viewAttributes() ?>>
<?= $Grid->college_or_school->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_college_or_school" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_college_or_school" value="<?= HtmlEncode($Grid->college_or_school->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_college_or_school" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_college_or_school" value="<?= HtmlEncode($Grid->college_or_school->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->university_or_board->Visible) { // university_or_board ?>
        <td data-name="university_or_board" <?= $Grid->university_or_board->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_university_or_board" class="form-group">
<input type="<?= $Grid->university_or_board->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?= $Grid->RowIndex ?>_university_or_board" id="x<?= $Grid->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->university_or_board->getPlaceHolder()) ?>" value="<?= $Grid->university_or_board->EditValue ?>"<?= $Grid->university_or_board->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->university_or_board->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" data-hidden="1" name="o<?= $Grid->RowIndex ?>_university_or_board" id="o<?= $Grid->RowIndex ?>_university_or_board" value="<?= HtmlEncode($Grid->university_or_board->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_university_or_board" class="form-group">
<input type="<?= $Grid->university_or_board->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?= $Grid->RowIndex ?>_university_or_board" id="x<?= $Grid->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->university_or_board->getPlaceHolder()) ?>" value="<?= $Grid->university_or_board->EditValue ?>"<?= $Grid->university_or_board->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->university_or_board->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_university_or_board">
<span<?= $Grid->university_or_board->viewAttributes() ?>>
<?= $Grid->university_or_board->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_university_or_board" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_university_or_board" value="<?= HtmlEncode($Grid->university_or_board->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_university_or_board" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_university_or_board" value="<?= HtmlEncode($Grid->university_or_board->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->year_of_passing->Visible) { // year_of_passing ?>
        <td data-name="year_of_passing" <?= $Grid->year_of_passing->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_year_of_passing" class="form-group">
<input type="<?= $Grid->year_of_passing->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?= $Grid->RowIndex ?>_year_of_passing" id="x<?= $Grid->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->year_of_passing->getPlaceHolder()) ?>" value="<?= $Grid->year_of_passing->EditValue ?>"<?= $Grid->year_of_passing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->year_of_passing->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" data-hidden="1" name="o<?= $Grid->RowIndex ?>_year_of_passing" id="o<?= $Grid->RowIndex ?>_year_of_passing" value="<?= HtmlEncode($Grid->year_of_passing->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_year_of_passing" class="form-group">
<input type="<?= $Grid->year_of_passing->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?= $Grid->RowIndex ?>_year_of_passing" id="x<?= $Grid->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->year_of_passing->getPlaceHolder()) ?>" value="<?= $Grid->year_of_passing->EditValue ?>"<?= $Grid->year_of_passing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->year_of_passing->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_year_of_passing">
<span<?= $Grid->year_of_passing->viewAttributes() ?>>
<?= $Grid->year_of_passing->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_year_of_passing" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_year_of_passing" value="<?= HtmlEncode($Grid->year_of_passing->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_year_of_passing" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_year_of_passing" value="<?= HtmlEncode($Grid->year_of_passing->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->scoring_marks->Visible) { // scoring_marks ?>
        <td data-name="scoring_marks" <?= $Grid->scoring_marks->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_scoring_marks" class="form-group">
<input type="<?= $Grid->scoring_marks->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?= $Grid->RowIndex ?>_scoring_marks" id="x<?= $Grid->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->scoring_marks->getPlaceHolder()) ?>" value="<?= $Grid->scoring_marks->EditValue ?>"<?= $Grid->scoring_marks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->scoring_marks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" data-hidden="1" name="o<?= $Grid->RowIndex ?>_scoring_marks" id="o<?= $Grid->RowIndex ?>_scoring_marks" value="<?= HtmlEncode($Grid->scoring_marks->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_scoring_marks" class="form-group">
<input type="<?= $Grid->scoring_marks->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?= $Grid->RowIndex ?>_scoring_marks" id="x<?= $Grid->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->scoring_marks->getPlaceHolder()) ?>" value="<?= $Grid->scoring_marks->EditValue ?>"<?= $Grid->scoring_marks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->scoring_marks->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_scoring_marks">
<span<?= $Grid->scoring_marks->viewAttributes() ?>>
<?= $Grid->scoring_marks->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_scoring_marks" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_scoring_marks" value="<?= HtmlEncode($Grid->scoring_marks->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_scoring_marks" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_scoring_marks" value="<?= HtmlEncode($Grid->scoring_marks->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->certificates->Visible) { // certificates ?>
        <td data-name="certificates" <?= $Grid->certificates->cellAttributes() ?>>
<?php if ($Grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?= $Grid->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?= $Grid->RowIndex ?>_certificates" id="x<?= $Grid->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->certificates->editAttributes() ?><?= ($Grid->certificates->ReadOnly || $Grid->certificates->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_certificates"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->certificates->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_certificates" id= "fn_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_certificates" id= "fa_x<?= $Grid->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_certificates" id= "fs_x<?= $Grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_certificates" id= "fx_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_certificates" id= "fm_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Grid->RowIndex ?>_certificates" id= "fc_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" data-hidden="1" name="o<?= $Grid->RowIndex ?>_certificates" id="o<?= $Grid->RowIndex ?>_certificates" value="<?= HtmlEncode($Grid->certificates->OldValue) ?>">
<?php } elseif ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_certificates">
<span>
<?= GetFileViewTag($Grid->certificates, $Grid->certificates->getViewValue(), false) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?= $Grid->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?= $Grid->RowIndex ?>_certificates" id="x<?= $Grid->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->certificates->editAttributes() ?><?= ($Grid->certificates->ReadOnly || $Grid->certificates->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_certificates"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->certificates->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_certificates" id= "fn_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_certificates" id= "fa_x<?= $Grid->RowIndex ?>_certificates" value="<?= (Post("fa_x<?= $Grid->RowIndex ?>_certificates") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_certificates" id= "fs_x<?= $Grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_certificates" id= "fx_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_certificates" id= "fm_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Grid->RowIndex ?>_certificates" id= "fc_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->_others->Visible) { // others ?>
        <td data-name="_others" <?= $Grid->_others->cellAttributes() ?>>
<?php if ($Grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_employee_has_degree__others" class="form-group employee_has_degree__others">
<div id="fd_x<?= $Grid->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->_others->title() ?>" data-table="employee_has_degree" data-field="x__others" name="x<?= $Grid->RowIndex ?>__others" id="x<?= $Grid->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->_others->editAttributes() ?><?= ($Grid->_others->ReadOnly || $Grid->_others->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>__others"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->_others->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>__others" id= "fn_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>__others" id= "fa_x<?= $Grid->RowIndex ?>__others" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>__others" id= "fs_x<?= $Grid->RowIndex ?>__others" value="100">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>__others" id= "fx_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>__others" id= "fm_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Grid->RowIndex ?>__others" id= "fc_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>__others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x__others" data-hidden="1" name="o<?= $Grid->RowIndex ?>__others" id="o<?= $Grid->RowIndex ?>__others" value="<?= HtmlEncode($Grid->_others->OldValue) ?>">
<?php } elseif ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree__others">
<span<?= $Grid->_others->viewAttributes() ?>>
<?= GetFileViewTag($Grid->_others, $Grid->_others->getViewValue(), false) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree__others" class="form-group employee_has_degree__others">
<div id="fd_x<?= $Grid->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->_others->title() ?>" data-table="employee_has_degree" data-field="x__others" name="x<?= $Grid->RowIndex ?>__others" id="x<?= $Grid->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->_others->editAttributes() ?><?= ($Grid->_others->ReadOnly || $Grid->_others->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>__others"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->_others->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>__others" id= "fn_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>__others" id= "fa_x<?= $Grid->RowIndex ?>__others" value="<?= (Post("fa_x<?= $Grid->RowIndex ?>__others") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>__others" id= "fs_x<?= $Grid->RowIndex ?>__others" value="100">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>__others" id= "fx_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>__others" id= "fm_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Grid->RowIndex ?>__others" id= "fc_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>__others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_has_degree"
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
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_has_degree_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_has_degree"
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
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_has_degree_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_status" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_status" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_status" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_degree_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" data-hidden="1" name="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_HospID" id="femployee_has_degreegrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" data-hidden="1" name="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_HospID" id="femployee_has_degreegrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["femployee_has_degreegrid","load"], function () {
    femployee_has_degreegrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_employee_has_degree", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_employee_has_degree_id" class="form-group employee_has_degree_id"></span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_id" class="form-group employee_has_degree_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_employee_id" class="form-group employee_has_degree_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->degree_id->Visible) { // degree_id ?>
        <td data-name="degree_id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_degree_id"
        name="x<?= $Grid->RowIndex ?>_degree_id"
        class="form-control ew-select<?= $Grid->degree_id->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id"
        data-table="employee_has_degree"
        data-field="x_degree_id"
        data-value-separator="<?= $Grid->degree_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->degree_id->getPlaceHolder()) ?>"
        <?= $Grid->degree_id->editAttributes() ?>>
        <?= $Grid->degree_id->selectOptionListHtml("x{$Grid->RowIndex}_degree_id") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_degree") && !$Grid->degree_id->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_degree_id" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->degree_id->caption() ?>" data-title="<?= $Grid->degree_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_degree_id',url:'<?= GetUrl("MasDegreeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->degree_id->getErrorMessage() ?></div>
<?= $Grid->degree_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_degree_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id']"),
        options = { name: "x<?= $Grid->RowIndex ?>_degree_id", selectId: "employee_has_degree_x<?= $Grid->RowIndex ?>_degree_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.degree_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_degree_id" class="form-group employee_has_degree_degree_id">
<span<?= $Grid->degree_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->degree_id->getDisplayValue($Grid->degree_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_degree_id" id="x<?= $Grid->RowIndex ?>_degree_id" value="<?= HtmlEncode($Grid->degree_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_degree_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_degree_id" id="o<?= $Grid->RowIndex ?>_degree_id" value="<?= HtmlEncode($Grid->degree_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->college_or_school->Visible) { // college_or_school ?>
        <td data-name="college_or_school">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<input type="<?= $Grid->college_or_school->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_college_or_school" name="x<?= $Grid->RowIndex ?>_college_or_school" id="x<?= $Grid->RowIndex ?>_college_or_school" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->college_or_school->getPlaceHolder()) ?>" value="<?= $Grid->college_or_school->EditValue ?>"<?= $Grid->college_or_school->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->college_or_school->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_college_or_school" class="form-group employee_has_degree_college_or_school">
<span<?= $Grid->college_or_school->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->college_or_school->getDisplayValue($Grid->college_or_school->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" data-hidden="1" name="x<?= $Grid->RowIndex ?>_college_or_school" id="x<?= $Grid->RowIndex ?>_college_or_school" value="<?= HtmlEncode($Grid->college_or_school->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_college_or_school" data-hidden="1" name="o<?= $Grid->RowIndex ?>_college_or_school" id="o<?= $Grid->RowIndex ?>_college_or_school" value="<?= HtmlEncode($Grid->college_or_school->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->university_or_board->Visible) { // university_or_board ?>
        <td data-name="university_or_board">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<input type="<?= $Grid->university_or_board->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_university_or_board" name="x<?= $Grid->RowIndex ?>_university_or_board" id="x<?= $Grid->RowIndex ?>_university_or_board" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->university_or_board->getPlaceHolder()) ?>" value="<?= $Grid->university_or_board->EditValue ?>"<?= $Grid->university_or_board->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->university_or_board->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_university_or_board" class="form-group employee_has_degree_university_or_board">
<span<?= $Grid->university_or_board->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->university_or_board->getDisplayValue($Grid->university_or_board->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" data-hidden="1" name="x<?= $Grid->RowIndex ?>_university_or_board" id="x<?= $Grid->RowIndex ?>_university_or_board" value="<?= HtmlEncode($Grid->university_or_board->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_university_or_board" data-hidden="1" name="o<?= $Grid->RowIndex ?>_university_or_board" id="o<?= $Grid->RowIndex ?>_university_or_board" value="<?= HtmlEncode($Grid->university_or_board->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->year_of_passing->Visible) { // year_of_passing ?>
        <td data-name="year_of_passing">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<input type="<?= $Grid->year_of_passing->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_year_of_passing" name="x<?= $Grid->RowIndex ?>_year_of_passing" id="x<?= $Grid->RowIndex ?>_year_of_passing" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->year_of_passing->getPlaceHolder()) ?>" value="<?= $Grid->year_of_passing->EditValue ?>"<?= $Grid->year_of_passing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->year_of_passing->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_year_of_passing" class="form-group employee_has_degree_year_of_passing">
<span<?= $Grid->year_of_passing->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->year_of_passing->getDisplayValue($Grid->year_of_passing->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" data-hidden="1" name="x<?= $Grid->RowIndex ?>_year_of_passing" id="x<?= $Grid->RowIndex ?>_year_of_passing" value="<?= HtmlEncode($Grid->year_of_passing->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_year_of_passing" data-hidden="1" name="o<?= $Grid->RowIndex ?>_year_of_passing" id="o<?= $Grid->RowIndex ?>_year_of_passing" value="<?= HtmlEncode($Grid->year_of_passing->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->scoring_marks->Visible) { // scoring_marks ?>
        <td data-name="scoring_marks">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<input type="<?= $Grid->scoring_marks->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_scoring_marks" name="x<?= $Grid->RowIndex ?>_scoring_marks" id="x<?= $Grid->RowIndex ?>_scoring_marks" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->scoring_marks->getPlaceHolder()) ?>" value="<?= $Grid->scoring_marks->EditValue ?>"<?= $Grid->scoring_marks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->scoring_marks->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_scoring_marks" class="form-group employee_has_degree_scoring_marks">
<span<?= $Grid->scoring_marks->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->scoring_marks->getDisplayValue($Grid->scoring_marks->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" data-hidden="1" name="x<?= $Grid->RowIndex ?>_scoring_marks" id="x<?= $Grid->RowIndex ?>_scoring_marks" value="<?= HtmlEncode($Grid->scoring_marks->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_scoring_marks" data-hidden="1" name="o<?= $Grid->RowIndex ?>_scoring_marks" id="o<?= $Grid->RowIndex ?>_scoring_marks" value="<?= HtmlEncode($Grid->scoring_marks->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->certificates->Visible) { // certificates ?>
        <td data-name="certificates">
<span id="el$rowindex$_employee_has_degree_certificates" class="form-group employee_has_degree_certificates">
<div id="fd_x<?= $Grid->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->certificates->title() ?>" data-table="employee_has_degree" data-field="x_certificates" name="x<?= $Grid->RowIndex ?>_certificates" id="x<?= $Grid->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->certificates->editAttributes() ?><?= ($Grid->certificates->ReadOnly || $Grid->certificates->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_certificates"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->certificates->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_certificates" id= "fn_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_certificates" id= "fa_x<?= $Grid->RowIndex ?>_certificates" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_certificates" id= "fs_x<?= $Grid->RowIndex ?>_certificates" value="100">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_certificates" id= "fx_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_certificates" id= "fm_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Grid->RowIndex ?>_certificates" id= "fc_x<?= $Grid->RowIndex ?>_certificates" value="<?= $Grid->certificates->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_certificates" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_certificates" data-hidden="1" name="o<?= $Grid->RowIndex ?>_certificates" id="o<?= $Grid->RowIndex ?>_certificates" value="<?= HtmlEncode($Grid->certificates->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->_others->Visible) { // others ?>
        <td data-name="_others">
<span id="el$rowindex$_employee_has_degree__others" class="form-group employee_has_degree__others">
<div id="fd_x<?= $Grid->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->_others->title() ?>" data-table="employee_has_degree" data-field="x__others" name="x<?= $Grid->RowIndex ?>__others" id="x<?= $Grid->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->_others->editAttributes() ?><?= ($Grid->_others->ReadOnly || $Grid->_others->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>__others"><?= $Language->phrase("ChooseFiles") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->_others->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>__others" id= "fn_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>__others" id= "fa_x<?= $Grid->RowIndex ?>__others" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>__others" id= "fs_x<?= $Grid->RowIndex ?>__others" value="100">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>__others" id= "fx_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>__others" id= "fm_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadMaxFileSize ?>">
<input type="hidden" name="fc_x<?= $Grid->RowIndex ?>__others" id= "fc_x<?= $Grid->RowIndex ?>__others" value="<?= $Grid->_others->UploadMaxFileCount ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>__others" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x__others" data-hidden="1" name="o<?= $Grid->RowIndex ?>__others" id="o<?= $Grid->RowIndex ?>__others" value="<?= HtmlEncode($Grid->_others->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_status" class="form-group employee_has_degree_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_has_degree_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_has_degree"
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
    var el = document.querySelector("select[data-select2-id='employee_has_degree_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_has_degree_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_degree.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_status" class="form-group employee_has_degree_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_degree_HospID" class="form-group employee_has_degree_HospID">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_has_degree" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_degree_HospID" class="form-group employee_has_degree_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_degree" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["femployee_has_degreegrid","load"], function() {
    femployee_has_degreegrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="femployee_has_degreegrid">
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
    ew.addEventHandlers("employee_has_degree");
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
        container: "gmp_employee_has_degree",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

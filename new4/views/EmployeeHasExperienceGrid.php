<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("EmployeeHasExperienceGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_has_experiencegrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    femployee_has_experiencegrid = new ew.Form("femployee_has_experiencegrid", "grid");
    femployee_has_experiencegrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_has_experience")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_has_experience)
        ew.vars.tables.employee_has_experience = currentTable;
    femployee_has_experiencegrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["working_at", [fields.working_at.visible && fields.working_at.required ? ew.Validators.required(fields.working_at.caption) : null], fields.working_at.isInvalid],
        ["jobdescription", [fields.jobdescription.visible && fields.jobdescription.required ? ew.Validators.required(fields.jobdescription.caption) : null], fields.jobdescription.isInvalid],
        ["role", [fields.role.visible && fields.role.required ? ew.Validators.required(fields.role.caption) : null], fields.role.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(0)], fields.start_date.isInvalid],
        ["end_date", [fields.end_date.visible && fields.end_date.required ? ew.Validators.required(fields.end_date.caption) : null, ew.Validators.datetime(0)], fields.end_date.isInvalid],
        ["total_experience", [fields.total_experience.visible && fields.total_experience.required ? ew.Validators.required(fields.total_experience.caption) : null], fields.total_experience.isInvalid],
        ["certificates", [fields.certificates.visible && fields.certificates.required ? ew.Validators.fileRequired(fields.certificates.caption) : null], fields.certificates.isInvalid],
        ["_others", [fields._others.visible && fields._others.required ? ew.Validators.fileRequired(fields._others.caption) : null], fields._others.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_has_experiencegrid,
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
    femployee_has_experiencegrid.validate = function () {
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
    femployee_has_experiencegrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "working_at", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "jobdescription", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "role", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "start_date", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "end_date", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "total_experience", false))
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
    femployee_has_experiencegrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_has_experiencegrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_has_experiencegrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("femployee_has_experiencegrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_experience">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_has_experiencegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_has_experience" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_has_experiencegrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_employee_has_experience_id" class="employee_has_experience_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Grid->employee_id->headerCellClass() ?>"><div id="elh_employee_has_experience_employee_id" class="employee_has_experience_employee_id"><?= $Grid->renderSort($Grid->employee_id) ?></div></th>
<?php } ?>
<?php if ($Grid->working_at->Visible) { // working_at ?>
        <th data-name="working_at" class="<?= $Grid->working_at->headerCellClass() ?>"><div id="elh_employee_has_experience_working_at" class="employee_has_experience_working_at"><?= $Grid->renderSort($Grid->working_at) ?></div></th>
<?php } ?>
<?php if ($Grid->jobdescription->Visible) { // job description ?>
        <th data-name="jobdescription" class="<?= $Grid->jobdescription->headerCellClass() ?>"><div id="elh_employee_has_experience_jobdescription" class="employee_has_experience_jobdescription"><?= $Grid->renderSort($Grid->jobdescription) ?></div></th>
<?php } ?>
<?php if ($Grid->role->Visible) { // role ?>
        <th data-name="role" class="<?= $Grid->role->headerCellClass() ?>"><div id="elh_employee_has_experience_role" class="employee_has_experience_role"><?= $Grid->renderSort($Grid->role) ?></div></th>
<?php } ?>
<?php if ($Grid->start_date->Visible) { // start_date ?>
        <th data-name="start_date" class="<?= $Grid->start_date->headerCellClass() ?>"><div id="elh_employee_has_experience_start_date" class="employee_has_experience_start_date"><?= $Grid->renderSort($Grid->start_date) ?></div></th>
<?php } ?>
<?php if ($Grid->end_date->Visible) { // end_date ?>
        <th data-name="end_date" class="<?= $Grid->end_date->headerCellClass() ?>"><div id="elh_employee_has_experience_end_date" class="employee_has_experience_end_date"><?= $Grid->renderSort($Grid->end_date) ?></div></th>
<?php } ?>
<?php if ($Grid->total_experience->Visible) { // total_experience ?>
        <th data-name="total_experience" class="<?= $Grid->total_experience->headerCellClass() ?>"><div id="elh_employee_has_experience_total_experience" class="employee_has_experience_total_experience"><?= $Grid->renderSort($Grid->total_experience) ?></div></th>
<?php } ?>
<?php if ($Grid->certificates->Visible) { // certificates ?>
        <th data-name="certificates" class="<?= $Grid->certificates->headerCellClass() ?>"><div id="elh_employee_has_experience_certificates" class="employee_has_experience_certificates"><?= $Grid->renderSort($Grid->certificates) ?></div></th>
<?php } ?>
<?php if ($Grid->_others->Visible) { // others ?>
        <th data-name="_others" class="<?= $Grid->_others->headerCellClass() ?>"><div id="elh_employee_has_experience__others" class="employee_has_experience__others"><?= $Grid->renderSort($Grid->_others) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_employee_has_experience_status" class="employee_has_experience_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_employee_has_experience_HospID" class="employee_has_experience_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_employee_has_experience", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_id" class="form-group"></span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_id" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_id" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Grid->employee_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<?= $Grid->employee_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_employee_id" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_employee_id" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->working_at->Visible) { // working_at ?>
        <td data-name="working_at" <?= $Grid->working_at->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_working_at" class="form-group">
<input type="<?= $Grid->working_at->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_working_at" name="x<?= $Grid->RowIndex ?>_working_at" id="x<?= $Grid->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->working_at->getPlaceHolder()) ?>" value="<?= $Grid->working_at->EditValue ?>"<?= $Grid->working_at->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->working_at->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" data-hidden="1" name="o<?= $Grid->RowIndex ?>_working_at" id="o<?= $Grid->RowIndex ?>_working_at" value="<?= HtmlEncode($Grid->working_at->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_working_at" class="form-group">
<input type="<?= $Grid->working_at->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_working_at" name="x<?= $Grid->RowIndex ?>_working_at" id="x<?= $Grid->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->working_at->getPlaceHolder()) ?>" value="<?= $Grid->working_at->EditValue ?>"<?= $Grid->working_at->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->working_at->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_working_at">
<span<?= $Grid->working_at->viewAttributes() ?>>
<?= $Grid->working_at->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_working_at" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_working_at" value="<?= HtmlEncode($Grid->working_at->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_working_at" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_working_at" value="<?= HtmlEncode($Grid->working_at->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->jobdescription->Visible) { // job description ?>
        <td data-name="jobdescription" <?= $Grid->jobdescription->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_jobdescription" class="form-group">
<input type="<?= $Grid->jobdescription->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_jobdescription" name="x<?= $Grid->RowIndex ?>_jobdescription" id="x<?= $Grid->RowIndex ?>_jobdescription" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->jobdescription->getPlaceHolder()) ?>" value="<?= $Grid->jobdescription->EditValue ?>"<?= $Grid->jobdescription->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->jobdescription->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_jobdescription" data-hidden="1" name="o<?= $Grid->RowIndex ?>_jobdescription" id="o<?= $Grid->RowIndex ?>_jobdescription" value="<?= HtmlEncode($Grid->jobdescription->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_jobdescription" class="form-group">
<input type="<?= $Grid->jobdescription->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_jobdescription" name="x<?= $Grid->RowIndex ?>_jobdescription" id="x<?= $Grid->RowIndex ?>_jobdescription" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->jobdescription->getPlaceHolder()) ?>" value="<?= $Grid->jobdescription->EditValue ?>"<?= $Grid->jobdescription->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->jobdescription->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_jobdescription">
<span<?= $Grid->jobdescription->viewAttributes() ?>>
<?= $Grid->jobdescription->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_jobdescription" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_jobdescription" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_jobdescription" value="<?= HtmlEncode($Grid->jobdescription->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_jobdescription" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_jobdescription" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_jobdescription" value="<?= HtmlEncode($Grid->jobdescription->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->role->Visible) { // role ?>
        <td data-name="role" <?= $Grid->role->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_role" class="form-group">
<input type="<?= $Grid->role->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_role" name="x<?= $Grid->RowIndex ?>_role" id="x<?= $Grid->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->role->getPlaceHolder()) ?>" value="<?= $Grid->role->EditValue ?>"<?= $Grid->role->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->role->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" data-hidden="1" name="o<?= $Grid->RowIndex ?>_role" id="o<?= $Grid->RowIndex ?>_role" value="<?= HtmlEncode($Grid->role->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_role" class="form-group">
<input type="<?= $Grid->role->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_role" name="x<?= $Grid->RowIndex ?>_role" id="x<?= $Grid->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->role->getPlaceHolder()) ?>" value="<?= $Grid->role->EditValue ?>"<?= $Grid->role->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->role->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_role">
<span<?= $Grid->role->viewAttributes() ?>>
<?= $Grid->role->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_role" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_role" value="<?= HtmlEncode($Grid->role->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_role" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_role" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_role" value="<?= HtmlEncode($Grid->role->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->start_date->Visible) { // start_date ?>
        <td data-name="start_date" <?= $Grid->start_date->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_start_date" class="form-group">
<input type="<?= $Grid->start_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_start_date" name="x<?= $Grid->RowIndex ?>_start_date" id="x<?= $Grid->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Grid->start_date->getPlaceHolder()) ?>" value="<?= $Grid->start_date->EditValue ?>"<?= $Grid->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->start_date->getErrorMessage() ?></div>
<?php if (!$Grid->start_date->ReadOnly && !$Grid->start_date->Disabled && !isset($Grid->start_date->EditAttrs["readonly"]) && !isset($Grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencegrid", "x<?= $Grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_start_date" id="o<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_start_date" class="form-group">
<input type="<?= $Grid->start_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_start_date" name="x<?= $Grid->RowIndex ?>_start_date" id="x<?= $Grid->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Grid->start_date->getPlaceHolder()) ?>" value="<?= $Grid->start_date->EditValue ?>"<?= $Grid->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->start_date->getErrorMessage() ?></div>
<?php if (!$Grid->start_date->ReadOnly && !$Grid->start_date->Disabled && !isset($Grid->start_date->EditAttrs["readonly"]) && !isset($Grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencegrid", "x<?= $Grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_start_date">
<span<?= $Grid->start_date->viewAttributes() ?>>
<?= $Grid->start_date->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_start_date" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_start_date" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->end_date->Visible) { // end_date ?>
        <td data-name="end_date" <?= $Grid->end_date->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_end_date" class="form-group">
<input type="<?= $Grid->end_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_end_date" name="x<?= $Grid->RowIndex ?>_end_date" id="x<?= $Grid->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Grid->end_date->getPlaceHolder()) ?>" value="<?= $Grid->end_date->EditValue ?>"<?= $Grid->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->end_date->getErrorMessage() ?></div>
<?php if (!$Grid->end_date->ReadOnly && !$Grid->end_date->Disabled && !isset($Grid->end_date->EditAttrs["readonly"]) && !isset($Grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencegrid", "x<?= $Grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_end_date" id="o<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_end_date" class="form-group">
<input type="<?= $Grid->end_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_end_date" name="x<?= $Grid->RowIndex ?>_end_date" id="x<?= $Grid->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Grid->end_date->getPlaceHolder()) ?>" value="<?= $Grid->end_date->EditValue ?>"<?= $Grid->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->end_date->getErrorMessage() ?></div>
<?php if (!$Grid->end_date->ReadOnly && !$Grid->end_date->Disabled && !isset($Grid->end_date->EditAttrs["readonly"]) && !isset($Grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencegrid", "x<?= $Grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_end_date">
<span<?= $Grid->end_date->viewAttributes() ?>>
<?= $Grid->end_date->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_end_date" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_end_date" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->total_experience->Visible) { // total_experience ?>
        <td data-name="total_experience" <?= $Grid->total_experience->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_total_experience" class="form-group">
<input type="<?= $Grid->total_experience->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_total_experience" name="x<?= $Grid->RowIndex ?>_total_experience" id="x<?= $Grid->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->total_experience->getPlaceHolder()) ?>" value="<?= $Grid->total_experience->EditValue ?>"<?= $Grid->total_experience->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->total_experience->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" data-hidden="1" name="o<?= $Grid->RowIndex ?>_total_experience" id="o<?= $Grid->RowIndex ?>_total_experience" value="<?= HtmlEncode($Grid->total_experience->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_total_experience" class="form-group">
<input type="<?= $Grid->total_experience->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_total_experience" name="x<?= $Grid->RowIndex ?>_total_experience" id="x<?= $Grid->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->total_experience->getPlaceHolder()) ?>" value="<?= $Grid->total_experience->EditValue ?>"<?= $Grid->total_experience->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->total_experience->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_total_experience">
<span<?= $Grid->total_experience->viewAttributes() ?>>
<?= $Grid->total_experience->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_total_experience" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_total_experience" value="<?= HtmlEncode($Grid->total_experience->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_total_experience" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_total_experience" value="<?= HtmlEncode($Grid->total_experience->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->certificates->Visible) { // certificates ?>
        <td data-name="certificates" <?= $Grid->certificates->cellAttributes() ?>>
<?php if ($Grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?= $Grid->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?= $Grid->RowIndex ?>_certificates" id="x<?= $Grid->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->certificates->editAttributes() ?><?= ($Grid->certificates->ReadOnly || $Grid->certificates->Disabled) ? " disabled" : "" ?>>
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
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" data-hidden="1" name="o<?= $Grid->RowIndex ?>_certificates" id="o<?= $Grid->RowIndex ?>_certificates" value="<?= HtmlEncode($Grid->certificates->OldValue) ?>">
<?php } elseif ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_certificates">
<span>
<?= GetFileViewTag($Grid->certificates, $Grid->certificates->getViewValue(), false) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?= $Grid->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?= $Grid->RowIndex ?>_certificates" id="x<?= $Grid->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->certificates->editAttributes() ?><?= ($Grid->certificates->ReadOnly || $Grid->certificates->Disabled) ? " disabled" : "" ?>>
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
<span id="el$rowindex$_employee_has_experience__others" class="form-group employee_has_experience__others">
<div id="fd_x<?= $Grid->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->_others->title() ?>" data-table="employee_has_experience" data-field="x__others" name="x<?= $Grid->RowIndex ?>__others" id="x<?= $Grid->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->_others->editAttributes() ?><?= ($Grid->_others->ReadOnly || $Grid->_others->Disabled) ? " disabled" : "" ?>>
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
<input type="hidden" data-table="employee_has_experience" data-field="x__others" data-hidden="1" name="o<?= $Grid->RowIndex ?>__others" id="o<?= $Grid->RowIndex ?>__others" value="<?= HtmlEncode($Grid->_others->OldValue) ?>">
<?php } elseif ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience__others">
<span<?= $Grid->_others->viewAttributes() ?>>
<?= GetFileViewTag($Grid->_others, $Grid->_others->getViewValue(), false) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience__others" class="form-group employee_has_experience__others">
<div id="fd_x<?= $Grid->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->_others->title() ?>" data-table="employee_has_experience" data-field="x__others" name="x<?= $Grid->RowIndex ?>__others" id="x<?= $Grid->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->_others->editAttributes() ?><?= ($Grid->_others->ReadOnly || $Grid->_others->Disabled) ? " disabled" : "" ?>>
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
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_has_experience_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_has_experience"
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
    var el = document.querySelector("select[data-select2-id='employee_has_experience_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_has_experience_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_experience.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_has_experience_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_has_experience"
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
    var el = document.querySelector("select[data-select2-id='employee_has_experience_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_has_experience_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_experience.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_status" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_status" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_status" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_has_experience_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" data-hidden="1" name="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_HospID" id="femployee_has_experiencegrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" data-hidden="1" name="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_HospID" id="femployee_has_experiencegrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["femployee_has_experiencegrid","load"], function () {
    femployee_has_experiencegrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_employee_has_experience", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_employee_has_experience_id" class="form-group employee_has_experience_id"></span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_id" class="form-group employee_has_experience_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_employee_id" class="form-group employee_has_experience_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->working_at->Visible) { // working_at ?>
        <td data-name="working_at">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<input type="<?= $Grid->working_at->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_working_at" name="x<?= $Grid->RowIndex ?>_working_at" id="x<?= $Grid->RowIndex ?>_working_at" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->working_at->getPlaceHolder()) ?>" value="<?= $Grid->working_at->EditValue ?>"<?= $Grid->working_at->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->working_at->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_working_at" class="form-group employee_has_experience_working_at">
<span<?= $Grid->working_at->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->working_at->getDisplayValue($Grid->working_at->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" data-hidden="1" name="x<?= $Grid->RowIndex ?>_working_at" id="x<?= $Grid->RowIndex ?>_working_at" value="<?= HtmlEncode($Grid->working_at->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_working_at" data-hidden="1" name="o<?= $Grid->RowIndex ?>_working_at" id="o<?= $Grid->RowIndex ?>_working_at" value="<?= HtmlEncode($Grid->working_at->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->jobdescription->Visible) { // job description ?>
        <td data-name="jobdescription">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_jobdescription" class="form-group employee_has_experience_jobdescription">
<input type="<?= $Grid->jobdescription->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_jobdescription" name="x<?= $Grid->RowIndex ?>_jobdescription" id="x<?= $Grid->RowIndex ?>_jobdescription" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->jobdescription->getPlaceHolder()) ?>" value="<?= $Grid->jobdescription->EditValue ?>"<?= $Grid->jobdescription->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->jobdescription->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_jobdescription" class="form-group employee_has_experience_jobdescription">
<span<?= $Grid->jobdescription->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->jobdescription->getDisplayValue($Grid->jobdescription->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_jobdescription" data-hidden="1" name="x<?= $Grid->RowIndex ?>_jobdescription" id="x<?= $Grid->RowIndex ?>_jobdescription" value="<?= HtmlEncode($Grid->jobdescription->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_jobdescription" data-hidden="1" name="o<?= $Grid->RowIndex ?>_jobdescription" id="o<?= $Grid->RowIndex ?>_jobdescription" value="<?= HtmlEncode($Grid->jobdescription->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->role->Visible) { // role ?>
        <td data-name="role">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_role" class="form-group employee_has_experience_role">
<input type="<?= $Grid->role->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_role" name="x<?= $Grid->RowIndex ?>_role" id="x<?= $Grid->RowIndex ?>_role" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->role->getPlaceHolder()) ?>" value="<?= $Grid->role->EditValue ?>"<?= $Grid->role->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->role->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_role" class="form-group employee_has_experience_role">
<span<?= $Grid->role->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->role->getDisplayValue($Grid->role->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" data-hidden="1" name="x<?= $Grid->RowIndex ?>_role" id="x<?= $Grid->RowIndex ?>_role" value="<?= HtmlEncode($Grid->role->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_role" data-hidden="1" name="o<?= $Grid->RowIndex ?>_role" id="o<?= $Grid->RowIndex ?>_role" value="<?= HtmlEncode($Grid->role->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->start_date->Visible) { // start_date ?>
        <td data-name="start_date">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<input type="<?= $Grid->start_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_start_date" name="x<?= $Grid->RowIndex ?>_start_date" id="x<?= $Grid->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Grid->start_date->getPlaceHolder()) ?>" value="<?= $Grid->start_date->EditValue ?>"<?= $Grid->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->start_date->getErrorMessage() ?></div>
<?php if (!$Grid->start_date->ReadOnly && !$Grid->start_date->Disabled && !isset($Grid->start_date->EditAttrs["readonly"]) && !isset($Grid->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencegrid", "x<?= $Grid->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_start_date" class="form-group employee_has_experience_start_date">
<span<?= $Grid->start_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->start_date->getDisplayValue($Grid->start_date->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" data-hidden="1" name="x<?= $Grid->RowIndex ?>_start_date" id="x<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_start_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_start_date" id="o<?= $Grid->RowIndex ?>_start_date" value="<?= HtmlEncode($Grid->start_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->end_date->Visible) { // end_date ?>
        <td data-name="end_date">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<input type="<?= $Grid->end_date->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_end_date" name="x<?= $Grid->RowIndex ?>_end_date" id="x<?= $Grid->RowIndex ?>_end_date" placeholder="<?= HtmlEncode($Grid->end_date->getPlaceHolder()) ?>" value="<?= $Grid->end_date->EditValue ?>"<?= $Grid->end_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->end_date->getErrorMessage() ?></div>
<?php if (!$Grid->end_date->ReadOnly && !$Grid->end_date->Disabled && !isset($Grid->end_date->EditAttrs["readonly"]) && !isset($Grid->end_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["femployee_has_experiencegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("femployee_has_experiencegrid", "x<?= $Grid->RowIndex ?>_end_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_end_date" class="form-group employee_has_experience_end_date">
<span<?= $Grid->end_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->end_date->getDisplayValue($Grid->end_date->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" data-hidden="1" name="x<?= $Grid->RowIndex ?>_end_date" id="x<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_end_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_end_date" id="o<?= $Grid->RowIndex ?>_end_date" value="<?= HtmlEncode($Grid->end_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->total_experience->Visible) { // total_experience ?>
        <td data-name="total_experience">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<input type="<?= $Grid->total_experience->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_total_experience" name="x<?= $Grid->RowIndex ?>_total_experience" id="x<?= $Grid->RowIndex ?>_total_experience" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->total_experience->getPlaceHolder()) ?>" value="<?= $Grid->total_experience->EditValue ?>"<?= $Grid->total_experience->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->total_experience->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_total_experience" class="form-group employee_has_experience_total_experience">
<span<?= $Grid->total_experience->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->total_experience->getDisplayValue($Grid->total_experience->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" data-hidden="1" name="x<?= $Grid->RowIndex ?>_total_experience" id="x<?= $Grid->RowIndex ?>_total_experience" value="<?= HtmlEncode($Grid->total_experience->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_total_experience" data-hidden="1" name="o<?= $Grid->RowIndex ?>_total_experience" id="o<?= $Grid->RowIndex ?>_total_experience" value="<?= HtmlEncode($Grid->total_experience->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->certificates->Visible) { // certificates ?>
        <td data-name="certificates">
<span id="el$rowindex$_employee_has_experience_certificates" class="form-group employee_has_experience_certificates">
<div id="fd_x<?= $Grid->RowIndex ?>_certificates">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->certificates->title() ?>" data-table="employee_has_experience" data-field="x_certificates" name="x<?= $Grid->RowIndex ?>_certificates" id="x<?= $Grid->RowIndex ?>_certificates" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->certificates->editAttributes() ?><?= ($Grid->certificates->ReadOnly || $Grid->certificates->Disabled) ? " disabled" : "" ?>>
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
<input type="hidden" data-table="employee_has_experience" data-field="x_certificates" data-hidden="1" name="o<?= $Grid->RowIndex ?>_certificates" id="o<?= $Grid->RowIndex ?>_certificates" value="<?= HtmlEncode($Grid->certificates->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->_others->Visible) { // others ?>
        <td data-name="_others">
<span id="el$rowindex$_employee_has_experience__others" class="form-group employee_has_experience__others">
<div id="fd_x<?= $Grid->RowIndex ?>__others">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->_others->title() ?>" data-table="employee_has_experience" data-field="x__others" name="x<?= $Grid->RowIndex ?>__others" id="x<?= $Grid->RowIndex ?>__others" lang="<?= CurrentLanguageID() ?>" multiple<?= $Grid->_others->editAttributes() ?><?= ($Grid->_others->ReadOnly || $Grid->_others->Disabled) ? " disabled" : "" ?>>
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
<input type="hidden" data-table="employee_has_experience" data-field="x__others" data-hidden="1" name="o<?= $Grid->RowIndex ?>__others" id="o<?= $Grid->RowIndex ?>__others" value="<?= HtmlEncode($Grid->_others->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_status" class="form-group employee_has_experience_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_has_experience_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_has_experience"
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
    var el = document.querySelector("select[data-select2-id='employee_has_experience_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_has_experience_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_has_experience.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_status" class="form-group employee_has_experience_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_has_experience" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_has_experience_HospID" class="form-group employee_has_experience_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_has_experience" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["femployee_has_experiencegrid","load"], function() {
    femployee_has_experiencegrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="femployee_has_experiencegrid">
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
    ew.addEventHandlers("employee_has_experience");
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
        container: "gmp_employee_has_experience",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

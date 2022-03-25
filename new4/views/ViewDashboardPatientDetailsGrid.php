<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewDashboardPatientDetailsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_dashboard_patient_detailsgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_dashboard_patient_detailsgrid = new ew.Form("fview_dashboard_patient_detailsgrid", "grid");
    fview_dashboard_patient_detailsgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_patient_details")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_dashboard_patient_details)
        ew.vars.tables.view_dashboard_patient_details = currentTable;
    fview_dashboard_patient_detailsgrid.addFields([
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["first_name", [fields.first_name.visible && fields.first_name.required ? ew.Validators.required(fields.first_name.caption) : null], fields.first_name.isInvalid],
        ["mobile_no", [fields.mobile_no.visible && fields.mobile_no.required ? ew.Validators.required(fields.mobile_no.caption) : null], fields.mobile_no.isInvalid],
        ["ReferA4TreatingConsultant", [fields.ReferA4TreatingConsultant.visible && fields.ReferA4TreatingConsultant.required ? ew.Validators.required(fields.ReferA4TreatingConsultant.caption) : null], fields.ReferA4TreatingConsultant.isInvalid],
        ["Patient_Language", [fields.Patient_Language.visible && fields.Patient_Language.required ? ew.Validators.required(fields.Patient_Language.caption) : null], fields.Patient_Language.isInvalid],
        ["WhereDidYouHear", [fields.WhereDidYouHear.visible && fields.WhereDidYouHear.required ? ew.Validators.required(fields.WhereDidYouHear.caption) : null], fields.WhereDidYouHear.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdDate", [fields.createdDate.visible && fields.createdDate.required ? ew.Validators.required(fields.createdDate.caption) : null, ew.Validators.datetime(7)], fields.createdDate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_dashboard_patient_detailsgrid,
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
    fview_dashboard_patient_detailsgrid.validate = function () {
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
    fview_dashboard_patient_detailsgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PatientID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "first_name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mobile_no", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ReferA4TreatingConsultant", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Patient_Language", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "WhereDidYouHear", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createdDate", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_dashboard_patient_detailsgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_patient_detailsgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_dashboard_patient_detailsgrid.lists.HospID = <?= $Grid->HospID->toClientList($Grid) ?>;
    loadjs.done("fview_dashboard_patient_detailsgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_patient_details">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_patient_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_patient_details" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_patient_detailsgrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Grid->PatientID->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_PatientID" class="view_dashboard_patient_details_PatientID"><?= $Grid->renderSort($Grid->PatientID) ?></div></th>
<?php } ?>
<?php if ($Grid->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Grid->first_name->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_first_name" class="view_dashboard_patient_details_first_name"><?= $Grid->renderSort($Grid->first_name) ?></div></th>
<?php } ?>
<?php if ($Grid->mobile_no->Visible) { // mobile_no ?>
        <th data-name="mobile_no" class="<?= $Grid->mobile_no->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_mobile_no" class="view_dashboard_patient_details_mobile_no"><?= $Grid->renderSort($Grid->mobile_no) ?></div></th>
<?php } ?>
<?php if ($Grid->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <th data-name="ReferA4TreatingConsultant" class="<?= $Grid->ReferA4TreatingConsultant->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_ReferA4TreatingConsultant" class="view_dashboard_patient_details_ReferA4TreatingConsultant"><?= $Grid->renderSort($Grid->ReferA4TreatingConsultant) ?></div></th>
<?php } ?>
<?php if ($Grid->Patient_Language->Visible) { // Patient_Language ?>
        <th data-name="Patient_Language" class="<?= $Grid->Patient_Language->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_Patient_Language" class="view_dashboard_patient_details_Patient_Language"><?= $Grid->renderSort($Grid->Patient_Language) ?></div></th>
<?php } ?>
<?php if ($Grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <th data-name="WhereDidYouHear" class="<?= $Grid->WhereDidYouHear->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_WhereDidYouHear" class="view_dashboard_patient_details_WhereDidYouHear"><?= $Grid->renderSort($Grid->WhereDidYouHear) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_HospID" class="view_dashboard_patient_details_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <th data-name="createdDate" class="<?= $Grid->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_patient_details_createdDate" class="view_dashboard_patient_details_createdDate"><?= $Grid->renderSort($Grid->createdDate) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_dashboard_patient_details", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Grid->PatientID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_PatientID" class="form-group">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue ?? $Grid->PatientID->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_PatientID">
<span<?= $Grid->PatientID->viewAttributes() ?>>
<?= $Grid->PatientID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" data-hidden="1" name="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_PatientID" id="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" data-hidden="1" name="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_PatientID" id="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Grid->first_name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_first_name" class="form-group">
<input type="<?= $Grid->first_name->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_first_name" name="x<?= $Grid->RowIndex ?>_first_name" id="x<?= $Grid->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->first_name->getPlaceHolder()) ?>" value="<?= $Grid->first_name->EditValue ?>"<?= $Grid->first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->first_name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_first_name" id="o<?= $Grid->RowIndex ?>_first_name" value="<?= HtmlEncode($Grid->first_name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_first_name" class="form-group">
<input type="<?= $Grid->first_name->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_first_name" name="x<?= $Grid->RowIndex ?>_first_name" id="x<?= $Grid->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->first_name->getPlaceHolder()) ?>" value="<?= $Grid->first_name->EditValue ?>"<?= $Grid->first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->first_name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_first_name">
<span<?= $Grid->first_name->viewAttributes() ?>>
<?= $Grid->first_name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" data-hidden="1" name="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_first_name" id="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_first_name" value="<?= HtmlEncode($Grid->first_name->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" data-hidden="1" name="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_first_name" id="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_first_name" value="<?= HtmlEncode($Grid->first_name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mobile_no->Visible) { // mobile_no ?>
        <td data-name="mobile_no" <?= $Grid->mobile_no->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_mobile_no" class="form-group">
<input type="<?= $Grid->mobile_no->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="x<?= $Grid->RowIndex ?>_mobile_no" id="x<?= $Grid->RowIndex ?>_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mobile_no->getPlaceHolder()) ?>" value="<?= $Grid->mobile_no->EditValue ?>"<?= $Grid->mobile_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mobile_no->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mobile_no" id="o<?= $Grid->RowIndex ?>_mobile_no" value="<?= HtmlEncode($Grid->mobile_no->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_mobile_no" class="form-group">
<input type="<?= $Grid->mobile_no->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="x<?= $Grid->RowIndex ?>_mobile_no" id="x<?= $Grid->RowIndex ?>_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mobile_no->getPlaceHolder()) ?>" value="<?= $Grid->mobile_no->EditValue ?>"<?= $Grid->mobile_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mobile_no->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_mobile_no">
<span<?= $Grid->mobile_no->viewAttributes() ?>>
<?= $Grid->mobile_no->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" data-hidden="1" name="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_mobile_no" id="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_mobile_no" value="<?= HtmlEncode($Grid->mobile_no->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" data-hidden="1" name="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_mobile_no" id="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_mobile_no" value="<?= HtmlEncode($Grid->mobile_no->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td data-name="ReferA4TreatingConsultant" <?= $Grid->ReferA4TreatingConsultant->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_ReferA4TreatingConsultant" class="form-group">
<input type="<?= $Grid->ReferA4TreatingConsultant->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?= $Grid->ReferA4TreatingConsultant->EditValue ?>"<?= $Grid->ReferA4TreatingConsultant->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferA4TreatingConsultant->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" id="o<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?= HtmlEncode($Grid->ReferA4TreatingConsultant->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_ReferA4TreatingConsultant" class="form-group">
<input type="<?= $Grid->ReferA4TreatingConsultant->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?= $Grid->ReferA4TreatingConsultant->EditValue ?>"<?= $Grid->ReferA4TreatingConsultant->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferA4TreatingConsultant->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_ReferA4TreatingConsultant">
<span<?= $Grid->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Grid->ReferA4TreatingConsultant->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" data-hidden="1" name="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" id="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?= HtmlEncode($Grid->ReferA4TreatingConsultant->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" data-hidden="1" name="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" id="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?= HtmlEncode($Grid->ReferA4TreatingConsultant->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Patient_Language->Visible) { // Patient_Language ?>
        <td data-name="Patient_Language" <?= $Grid->Patient_Language->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_Patient_Language" class="form-group">
<input type="<?= $Grid->Patient_Language->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="x<?= $Grid->RowIndex ?>_Patient_Language" id="x<?= $Grid->RowIndex ?>_Patient_Language" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Patient_Language->getPlaceHolder()) ?>" value="<?= $Grid->Patient_Language->EditValue ?>"<?= $Grid->Patient_Language->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Patient_Language->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Patient_Language" id="o<?= $Grid->RowIndex ?>_Patient_Language" value="<?= HtmlEncode($Grid->Patient_Language->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_Patient_Language" class="form-group">
<input type="<?= $Grid->Patient_Language->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="x<?= $Grid->RowIndex ?>_Patient_Language" id="x<?= $Grid->RowIndex ?>_Patient_Language" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Patient_Language->getPlaceHolder()) ?>" value="<?= $Grid->Patient_Language->EditValue ?>"<?= $Grid->Patient_Language->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Patient_Language->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_Patient_Language">
<span<?= $Grid->Patient_Language->viewAttributes() ?>>
<?= $Grid->Patient_Language->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" data-hidden="1" name="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_Patient_Language" id="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_Patient_Language" value="<?= HtmlEncode($Grid->Patient_Language->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" data-hidden="1" name="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_Patient_Language" id="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_Patient_Language" value="<?= HtmlEncode($Grid->Patient_Language->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear" <?= $Grid->WhereDidYouHear->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->WhereDidYouHear->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_WhereDidYouHear" class="form-group">
<span<?= $Grid->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->WhereDidYouHear->getDisplayValue($Grid->WhereDidYouHear->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_WhereDidYouHear" class="form-group">
<input type="<?= $Grid->WhereDidYouHear->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->WhereDidYouHear->getPlaceHolder()) ?>" value="<?= $Grid->WhereDidYouHear->EditValue ?>"<?= $Grid->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WhereDidYouHear->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" data-hidden="1" name="o<?= $Grid->RowIndex ?>_WhereDidYouHear" id="o<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->WhereDidYouHear->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_WhereDidYouHear" class="form-group">
<span<?= $Grid->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->WhereDidYouHear->getDisplayValue($Grid->WhereDidYouHear->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_WhereDidYouHear" class="form-group">
<input type="<?= $Grid->WhereDidYouHear->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->WhereDidYouHear->getPlaceHolder()) ?>" value="<?= $Grid->WhereDidYouHear->EditValue ?>"<?= $Grid->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WhereDidYouHear->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_WhereDidYouHear">
<span<?= $Grid->WhereDidYouHear->viewAttributes() ?>>
<?= $Grid->WhereDidYouHear->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" data-hidden="1" name="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" data-hidden="1" name="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_WhereDidYouHear" id="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_patient_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_patient_detailsgrid"], function() {
    fview_dashboard_patient_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_patient_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_patient_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_patient_detailsgrid"], function() {
    fview_dashboard_patient_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_patient_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" data-hidden="1" name="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" data-hidden="1" name="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate" <?= $Grid->createdDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_createdDate" class="form-group">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_createdDate" class="form-group">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_patient_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_patient_detailsgrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdDate" id="o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_createdDate" class="form-group">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_createdDate" class="form-group">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_patient_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_patient_detailsgrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_patient_details_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<?= $Grid->createdDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-hidden="1" name="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_createdDate" id="fview_dashboard_patient_detailsgrid$x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-hidden="1" name="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_createdDate" id="fview_dashboard_patient_detailsgrid$o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
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
loadjs.ready(["fview_dashboard_patient_detailsgrid","load"], function () {
    fview_dashboard_patient_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_dashboard_patient_details", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_PatientID" class="form-group view_dashboard_patient_details_PatientID">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_PatientID" class="form-group view_dashboard_patient_details_PatientID">
<span<?= $Grid->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientID->getDisplayValue($Grid->PatientID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->first_name->Visible) { // first_name ?>
        <td data-name="first_name">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_first_name" class="form-group view_dashboard_patient_details_first_name">
<input type="<?= $Grid->first_name->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_first_name" name="x<?= $Grid->RowIndex ?>_first_name" id="x<?= $Grid->RowIndex ?>_first_name" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->first_name->getPlaceHolder()) ?>" value="<?= $Grid->first_name->EditValue ?>"<?= $Grid->first_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->first_name->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_first_name" class="form-group view_dashboard_patient_details_first_name">
<span<?= $Grid->first_name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->first_name->getDisplayValue($Grid->first_name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_first_name" id="x<?= $Grid->RowIndex ?>_first_name" value="<?= HtmlEncode($Grid->first_name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_first_name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_first_name" id="o<?= $Grid->RowIndex ?>_first_name" value="<?= HtmlEncode($Grid->first_name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mobile_no->Visible) { // mobile_no ?>
        <td data-name="mobile_no">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_mobile_no" class="form-group view_dashboard_patient_details_mobile_no">
<input type="<?= $Grid->mobile_no->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_mobile_no" name="x<?= $Grid->RowIndex ?>_mobile_no" id="x<?= $Grid->RowIndex ?>_mobile_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mobile_no->getPlaceHolder()) ?>" value="<?= $Grid->mobile_no->EditValue ?>"<?= $Grid->mobile_no->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mobile_no->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_mobile_no" class="form-group view_dashboard_patient_details_mobile_no">
<span<?= $Grid->mobile_no->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mobile_no->getDisplayValue($Grid->mobile_no->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mobile_no" id="x<?= $Grid->RowIndex ?>_mobile_no" value="<?= HtmlEncode($Grid->mobile_no->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_mobile_no" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mobile_no" id="o<?= $Grid->RowIndex ?>_mobile_no" value="<?= HtmlEncode($Grid->mobile_no->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <td data-name="ReferA4TreatingConsultant">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_ReferA4TreatingConsultant" class="form-group view_dashboard_patient_details_ReferA4TreatingConsultant">
<input type="<?= $Grid->ReferA4TreatingConsultant->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" name="x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ReferA4TreatingConsultant->getPlaceHolder()) ?>" value="<?= $Grid->ReferA4TreatingConsultant->EditValue ?>"<?= $Grid->ReferA4TreatingConsultant->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ReferA4TreatingConsultant->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_ReferA4TreatingConsultant" class="form-group view_dashboard_patient_details_ReferA4TreatingConsultant">
<span<?= $Grid->ReferA4TreatingConsultant->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ReferA4TreatingConsultant->getDisplayValue($Grid->ReferA4TreatingConsultant->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" id="x<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?= HtmlEncode($Grid->ReferA4TreatingConsultant->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_ReferA4TreatingConsultant" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" id="o<?= $Grid->RowIndex ?>_ReferA4TreatingConsultant" value="<?= HtmlEncode($Grid->ReferA4TreatingConsultant->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Patient_Language->Visible) { // Patient_Language ?>
        <td data-name="Patient_Language">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_Patient_Language" class="form-group view_dashboard_patient_details_Patient_Language">
<input type="<?= $Grid->Patient_Language->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" name="x<?= $Grid->RowIndex ?>_Patient_Language" id="x<?= $Grid->RowIndex ?>_Patient_Language" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Patient_Language->getPlaceHolder()) ?>" value="<?= $Grid->Patient_Language->EditValue ?>"<?= $Grid->Patient_Language->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Patient_Language->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_Patient_Language" class="form-group view_dashboard_patient_details_Patient_Language">
<span<?= $Grid->Patient_Language->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Patient_Language->getDisplayValue($Grid->Patient_Language->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Patient_Language" id="x<?= $Grid->RowIndex ?>_Patient_Language" value="<?= HtmlEncode($Grid->Patient_Language->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_Patient_Language" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Patient_Language" id="o<?= $Grid->RowIndex ?>_Patient_Language" value="<?= HtmlEncode($Grid->Patient_Language->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <td data-name="WhereDidYouHear">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->WhereDidYouHear->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<span<?= $Grid->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->WhereDidYouHear->getDisplayValue($Grid->WhereDidYouHear->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<input type="<?= $Grid->WhereDidYouHear->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->WhereDidYouHear->getPlaceHolder()) ?>" value="<?= $Grid->WhereDidYouHear->EditValue ?>"<?= $Grid->WhereDidYouHear->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WhereDidYouHear->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_WhereDidYouHear" class="form-group view_dashboard_patient_details_WhereDidYouHear">
<span<?= $Grid->WhereDidYouHear->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->WhereDidYouHear->getDisplayValue($Grid->WhereDidYouHear->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" data-hidden="1" name="x<?= $Grid->RowIndex ?>_WhereDidYouHear" id="x<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_WhereDidYouHear" data-hidden="1" name="o<?= $Grid->RowIndex ?>_WhereDidYouHear" id="o<?= $Grid->RowIndex ?>_WhereDidYouHear" value="<?= HtmlEncode($Grid->WhereDidYouHear->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_patient_details_HospID" class="form-group view_dashboard_patient_details_HospID">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_patient_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_patient_detailsgrid"], function() {
    fview_dashboard_patient_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_patient_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_HospID" class="form-group view_dashboard_patient_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_patient_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_patient_detailsgrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_patient_details_createdDate" class="form-group view_dashboard_patient_details_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_patient_details" data-field="x_createdDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdDate" id="o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_dashboard_patient_detailsgrid","load"], function() {
    fview_dashboard_patient_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fview_dashboard_patient_detailsgrid">
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
    ew.addEventHandlers("view_dashboard_patient_details");
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
        container: "gmp_view_dashboard_patient_details",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

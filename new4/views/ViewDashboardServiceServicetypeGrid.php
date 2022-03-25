<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewDashboardServiceServicetypeGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_dashboard_service_servicetypegrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_dashboard_service_servicetypegrid = new ew.Form("fview_dashboard_service_servicetypegrid", "grid");
    fview_dashboard_service_servicetypegrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_service_servicetype")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_dashboard_service_servicetype)
        ew.vars.tables.view_dashboard_service_servicetype = currentTable;
    fview_dashboard_service_servicetypegrid.addFields([
        ["DEPARTMENT", [fields.DEPARTMENT.visible && fields.DEPARTMENT.required ? ew.Validators.required(fields.DEPARTMENT.caption) : null], fields.DEPARTMENT.isInvalid],
        ["SERVICE_TYPE", [fields.SERVICE_TYPE.visible && fields.SERVICE_TYPE.required ? ew.Validators.required(fields.SERVICE_TYPE.caption) : null], fields.SERVICE_TYPE.isInvalid],
        ["sumSubTotal", [fields.sumSubTotal.visible && fields.sumSubTotal.required ? ew.Validators.required(fields.sumSubTotal.caption) : null, ew.Validators.float], fields.sumSubTotal.isInvalid],
        ["createdDate", [fields.createdDate.visible && fields.createdDate.required ? ew.Validators.required(fields.createdDate.caption) : null, ew.Validators.datetime(7)], fields.createdDate.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_dashboard_service_servicetypegrid,
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
    fview_dashboard_service_servicetypegrid.validate = function () {
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
    fview_dashboard_service_servicetypegrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "DEPARTMENT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SERVICE_TYPE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "sumSubTotal", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createdDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_dashboard_service_servicetypegrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_service_servicetypegrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_dashboard_service_servicetypegrid.lists.HospID = <?= $Grid->HospID->toClientList($Grid) ?>;
    loadjs.done("fview_dashboard_service_servicetypegrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_servicetype">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_service_servicetypegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_service_servicetype" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_service_servicetypegrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th data-name="DEPARTMENT" class="<?= $Grid->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_DEPARTMENT" class="view_dashboard_service_servicetype_DEPARTMENT"><?= $Grid->renderSort($Grid->DEPARTMENT) ?></div></th>
<?php } ?>
<?php if ($Grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <th data-name="SERVICE_TYPE" class="<?= $Grid->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_SERVICE_TYPE" class="view_dashboard_service_servicetype_SERVICE_TYPE"><?= $Grid->renderSort($Grid->SERVICE_TYPE) ?></div></th>
<?php } ?>
<?php if ($Grid->sumSubTotal->Visible) { // sum(SubTotal) ?>
        <th data-name="sumSubTotal" class="<?= $Grid->sumSubTotal->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_sumSubTotal" class="view_dashboard_service_servicetype_sumSubTotal"><?= $Grid->renderSort($Grid->sumSubTotal) ?></div></th>
<?php } ?>
<?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <th data-name="createdDate" class="<?= $Grid->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_createdDate" class="view_dashboard_service_servicetype_createdDate"><?= $Grid->renderSort($Grid->createdDate) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_servicetype_HospID" class="view_dashboard_service_servicetype_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_dashboard_service_servicetype", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" <?= $Grid->DEPARTMENT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_DEPARTMENT" class="form-group">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEPARTMENT->getDisplayValue($Grid->DEPARTMENT->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_DEPARTMENT" class="form-group">
<input type="<?= $Grid->DEPARTMENT->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Grid->DEPARTMENT->EditValue ?>"<?= $Grid->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEPARTMENT->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEPARTMENT" id="o<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_DEPARTMENT" class="form-group">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEPARTMENT->getDisplayValue($Grid->DEPARTMENT->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_DEPARTMENT" class="form-group">
<input type="<?= $Grid->DEPARTMENT->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Grid->DEPARTMENT->EditValue ?>"<?= $Grid->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEPARTMENT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_DEPARTMENT">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<?= $Grid->DEPARTMENT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" data-hidden="1" name="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" data-hidden="1" name="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE" <?= $Grid->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_SERVICE_TYPE" class="form-group">
<input type="<?= $Grid->SERVICE_TYPE->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE_TYPE->EditValue ?>"<?= $Grid->SERVICE_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE_TYPE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="o<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_SERVICE_TYPE" class="form-group">
<input type="<?= $Grid->SERVICE_TYPE->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE_TYPE->EditValue ?>"<?= $Grid->SERVICE_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE_TYPE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_SERVICE_TYPE">
<span<?= $Grid->SERVICE_TYPE->viewAttributes() ?>>
<?= $Grid->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" data-hidden="1" name="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" data-hidden="1" name="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->sumSubTotal->Visible) { // sum(SubTotal) ?>
        <td data-name="sumSubTotal" <?= $Grid->sumSubTotal->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_sumSubTotal" class="form-group">
<input type="<?= $Grid->sumSubTotal->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_sumSubTotal" name="x<?= $Grid->RowIndex ?>_sumSubTotal" id="x<?= $Grid->RowIndex ?>_sumSubTotal" size="30" placeholder="<?= HtmlEncode($Grid->sumSubTotal->getPlaceHolder()) ?>" value="<?= $Grid->sumSubTotal->EditValue ?>"<?= $Grid->sumSubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sumSubTotal->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sumSubTotal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sumSubTotal" id="o<?= $Grid->RowIndex ?>_sumSubTotal" value="<?= HtmlEncode($Grid->sumSubTotal->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_sumSubTotal" class="form-group">
<input type="<?= $Grid->sumSubTotal->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_sumSubTotal" name="x<?= $Grid->RowIndex ?>_sumSubTotal" id="x<?= $Grid->RowIndex ?>_sumSubTotal" size="30" placeholder="<?= HtmlEncode($Grid->sumSubTotal->getPlaceHolder()) ?>" value="<?= $Grid->sumSubTotal->EditValue ?>"<?= $Grid->sumSubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sumSubTotal->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_sumSubTotal">
<span<?= $Grid->sumSubTotal->viewAttributes() ?>>
<?= $Grid->sumSubTotal->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sumSubTotal" data-hidden="1" name="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_sumSubTotal" id="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_sumSubTotal" value="<?= HtmlEncode($Grid->sumSubTotal->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sumSubTotal" data-hidden="1" name="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_sumSubTotal" id="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_sumSubTotal" value="<?= HtmlEncode($Grid->sumSubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate" <?= $Grid->createdDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_createdDate" class="form-group">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_createdDate" class="form-group">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_servicetypegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_servicetypegrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdDate" id="o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_createdDate" class="form-group">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_createdDate" class="form-group">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_servicetypegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_servicetypegrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<?= $Grid->createdDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-hidden="1" name="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_createdDate" id="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-hidden="1" name="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_createdDate" id="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_HospID" class="form-group">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_service_servicetypegrid"], function() {
    fview_dashboard_service_servicetypegrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_service_servicetype.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_HospID" class="form-group">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_service_servicetypegrid"], function() {
    fview_dashboard_service_servicetypegrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_service_servicetype.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_servicetype_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-hidden="1" name="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_service_servicetypegrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-hidden="1" name="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_service_servicetypegrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["fview_dashboard_service_servicetypegrid","load"], function () {
    fview_dashboard_service_servicetypegrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_dashboard_service_servicetype", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEPARTMENT->getDisplayValue($Grid->DEPARTMENT->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<input type="<?= $Grid->DEPARTMENT->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Grid->DEPARTMENT->EditValue ?>"<?= $Grid->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEPARTMENT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_DEPARTMENT" class="form-group view_dashboard_service_servicetype_DEPARTMENT">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEPARTMENT->getDisplayValue($Grid->DEPARTMENT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_DEPARTMENT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEPARTMENT" id="o<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_SERVICE_TYPE" class="form-group view_dashboard_service_servicetype_SERVICE_TYPE">
<input type="<?= $Grid->SERVICE_TYPE->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE_TYPE->EditValue ?>"<?= $Grid->SERVICE_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE_TYPE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_SERVICE_TYPE" class="form-group view_dashboard_service_servicetype_SERVICE_TYPE">
<span<?= $Grid->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SERVICE_TYPE->getDisplayValue($Grid->SERVICE_TYPE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_SERVICE_TYPE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="o<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->sumSubTotal->Visible) { // sum(SubTotal) ?>
        <td data-name="sumSubTotal">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_sumSubTotal" class="form-group view_dashboard_service_servicetype_sumSubTotal">
<input type="<?= $Grid->sumSubTotal->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_sumSubTotal" name="x<?= $Grid->RowIndex ?>_sumSubTotal" id="x<?= $Grid->RowIndex ?>_sumSubTotal" size="30" placeholder="<?= HtmlEncode($Grid->sumSubTotal->getPlaceHolder()) ?>" value="<?= $Grid->sumSubTotal->EditValue ?>"<?= $Grid->sumSubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sumSubTotal->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_sumSubTotal" class="form-group view_dashboard_service_servicetype_sumSubTotal">
<span<?= $Grid->sumSubTotal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->sumSubTotal->getDisplayValue($Grid->sumSubTotal->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sumSubTotal" data-hidden="1" name="x<?= $Grid->RowIndex ?>_sumSubTotal" id="x<?= $Grid->RowIndex ?>_sumSubTotal" value="<?= HtmlEncode($Grid->sumSubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_sumSubTotal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sumSubTotal" id="o<?= $Grid->RowIndex ?>_sumSubTotal" value="<?= HtmlEncode($Grid->sumSubTotal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_servicetypegrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_servicetypegrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_createdDate" class="form-group view_dashboard_service_servicetype_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_createdDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdDate" id="o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_service_servicetypegrid"], function() {
    fview_dashboard_service_servicetypegrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_service_servicetype.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_servicetype_HospID" class="form-group view_dashboard_service_servicetype_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_servicetype" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_dashboard_service_servicetypegrid","load"], function() {
    fview_dashboard_service_servicetypegrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
<?php
// Render aggregate row
$Grid->RowType = ROWTYPE_AGGREGATE;
$Grid->resetAttributes();
$Grid->renderRow();
?>
<?php if ($Grid->TotalRecords > 0 && $Grid->CurrentMode == "view") { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Grid->renderListOptions();

// Render list options (footer, left)
$Grid->ListOptions->render("footer", "left");
?>
    <?php if ($Grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" class="<?= $Grid->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_DEPARTMENT" class="view_dashboard_service_servicetype_DEPARTMENT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE" class="<?= $Grid->SERVICE_TYPE->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_SERVICE_TYPE" class="view_dashboard_service_servicetype_SERVICE_TYPE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->sumSubTotal->Visible) { // sum(SubTotal) ?>
        <td data-name="sumSubTotal" class="<?= $Grid->sumSubTotal->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_sumSubTotal" class="view_dashboard_service_servicetype_sumSubTotal">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->sumSubTotal->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate" class="<?= $Grid->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_createdDate" class="view_dashboard_service_servicetype_createdDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Grid->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_servicetype_HospID" class="view_dashboard_service_servicetype_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Grid->ListOptions->render("footer", "right");
?>
    </tr>
</tfoot>
<?php } ?>
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
<input type="hidden" name="detailpage" value="fview_dashboard_service_servicetypegrid">
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
    ew.addEventHandlers("view_dashboard_service_servicetype");
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
        container: "gmp_view_dashboard_service_servicetype",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

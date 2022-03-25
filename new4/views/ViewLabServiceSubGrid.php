<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewLabServiceSubGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_lab_service_subgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_lab_service_subgrid = new ew.Form("fview_lab_service_subgrid", "grid");
    fview_lab_service_subgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_lab_service_sub")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_lab_service_sub)
        ew.vars.tables.view_lab_service_sub = currentTable;
    fview_lab_service_subgrid.addFields([
        ["Id", [fields.Id.visible && fields.Id.required ? ew.Validators.required(fields.Id.caption) : null], fields.Id.isInvalid],
        ["CODE", [fields.CODE.visible && fields.CODE.required ? ew.Validators.required(fields.CODE.caption) : null], fields.CODE.isInvalid],
        ["SERVICE", [fields.SERVICE.visible && fields.SERVICE.required ? ew.Validators.required(fields.SERVICE.caption) : null], fields.SERVICE.isInvalid],
        ["UNITS", [fields.UNITS.visible && fields.UNITS.required ? ew.Validators.required(fields.UNITS.caption) : null], fields.UNITS.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["TestSubCd", [fields.TestSubCd.visible && fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Order", [fields.Order.visible && fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["ResType", [fields.ResType.visible && fields.ResType.required ? ew.Validators.required(fields.ResType.caption) : null], fields.ResType.isInvalid],
        ["UnitCD", [fields.UnitCD.visible && fields.UnitCD.required ? ew.Validators.required(fields.UnitCD.caption) : null], fields.UnitCD.isInvalid],
        ["Sample", [fields.Sample.visible && fields.Sample.required ? ew.Validators.required(fields.Sample.caption) : null], fields.Sample.isInvalid],
        ["NoD", [fields.NoD.visible && fields.NoD.required ? ew.Validators.required(fields.NoD.caption) : null, ew.Validators.float], fields.NoD.isInvalid],
        ["BillOrder", [fields.BillOrder.visible && fields.BillOrder.required ? ew.Validators.required(fields.BillOrder.caption) : null, ew.Validators.float], fields.BillOrder.isInvalid],
        ["Formula", [fields.Formula.visible && fields.Formula.required ? ew.Validators.required(fields.Formula.caption) : null], fields.Formula.isInvalid],
        ["Inactive", [fields.Inactive.visible && fields.Inactive.required ? ew.Validators.required(fields.Inactive.caption) : null], fields.Inactive.isInvalid],
        ["Outsource", [fields.Outsource.visible && fields.Outsource.required ? ew.Validators.required(fields.Outsource.caption) : null], fields.Outsource.isInvalid],
        ["CollSample", [fields.CollSample.visible && fields.CollSample.required ? ew.Validators.required(fields.CollSample.caption) : null], fields.CollSample.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_lab_service_subgrid,
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
    fview_lab_service_subgrid.validate = function () {
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
    fview_lab_service_subgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "CODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SERVICE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UNITS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestSubCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Method", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Order", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UnitCD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Sample", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillOrder", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Formula", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Inactive[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Outsource", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CollSample", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_lab_service_subgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_lab_service_subgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_lab_service_subgrid.lists.UNITS = <?= $Grid->UNITS->toClientList($Grid) ?>;
    fview_lab_service_subgrid.lists.Inactive = <?= $Grid->Inactive->toClientList($Grid) ?>;
    loadjs.done("fview_lab_service_subgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_service_sub">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_lab_service_subgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_lab_service_sub" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_lab_service_subgrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->Id->Visible) { // Id ?>
        <th data-name="Id" class="<?= $Grid->Id->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Id" class="view_lab_service_sub_Id"><?= $Grid->renderSort($Grid->Id) ?></div></th>
<?php } ?>
<?php if ($Grid->CODE->Visible) { // CODE ?>
        <th data-name="CODE" class="<?= $Grid->CODE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CODE" class="view_lab_service_sub_CODE"><?= $Grid->renderSort($Grid->CODE) ?></div></th>
<?php } ?>
<?php if ($Grid->SERVICE->Visible) { // SERVICE ?>
        <th data-name="SERVICE" class="<?= $Grid->SERVICE->headerCellClass() ?>"><div id="elh_view_lab_service_sub_SERVICE" class="view_lab_service_sub_SERVICE"><?= $Grid->renderSort($Grid->SERVICE) ?></div></th>
<?php } ?>
<?php if ($Grid->UNITS->Visible) { // UNITS ?>
        <th data-name="UNITS" class="<?= $Grid->UNITS->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UNITS" class="view_lab_service_sub_UNITS"><?= $Grid->renderSort($Grid->UNITS) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_lab_service_sub_HospID" class="view_lab_service_sub_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Grid->TestSubCd->headerCellClass() ?>"><div id="elh_view_lab_service_sub_TestSubCd" class="view_lab_service_sub_TestSubCd"><?= $Grid->renderSort($Grid->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Grid->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Grid->Method->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Method" class="view_lab_service_sub_Method"><?= $Grid->renderSort($Grid->Method) ?></div></th>
<?php } ?>
<?php if ($Grid->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Grid->Order->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Order" class="view_lab_service_sub_Order"><?= $Grid->renderSort($Grid->Order) ?></div></th>
<?php } ?>
<?php if ($Grid->ResType->Visible) { // ResType ?>
        <th data-name="ResType" class="<?= $Grid->ResType->headerCellClass() ?>"><div id="elh_view_lab_service_sub_ResType" class="view_lab_service_sub_ResType"><?= $Grid->renderSort($Grid->ResType) ?></div></th>
<?php } ?>
<?php if ($Grid->UnitCD->Visible) { // UnitCD ?>
        <th data-name="UnitCD" class="<?= $Grid->UnitCD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_UnitCD" class="view_lab_service_sub_UnitCD"><?= $Grid->renderSort($Grid->UnitCD) ?></div></th>
<?php } ?>
<?php if ($Grid->Sample->Visible) { // Sample ?>
        <th data-name="Sample" class="<?= $Grid->Sample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Sample" class="view_lab_service_sub_Sample"><?= $Grid->renderSort($Grid->Sample) ?></div></th>
<?php } ?>
<?php if ($Grid->NoD->Visible) { // NoD ?>
        <th data-name="NoD" class="<?= $Grid->NoD->headerCellClass() ?>"><div id="elh_view_lab_service_sub_NoD" class="view_lab_service_sub_NoD"><?= $Grid->renderSort($Grid->NoD) ?></div></th>
<?php } ?>
<?php if ($Grid->BillOrder->Visible) { // BillOrder ?>
        <th data-name="BillOrder" class="<?= $Grid->BillOrder->headerCellClass() ?>"><div id="elh_view_lab_service_sub_BillOrder" class="view_lab_service_sub_BillOrder"><?= $Grid->renderSort($Grid->BillOrder) ?></div></th>
<?php } ?>
<?php if ($Grid->Formula->Visible) { // Formula ?>
        <th data-name="Formula" class="<?= $Grid->Formula->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Formula" class="view_lab_service_sub_Formula"><?= $Grid->renderSort($Grid->Formula) ?></div></th>
<?php } ?>
<?php if ($Grid->Inactive->Visible) { // Inactive ?>
        <th data-name="Inactive" class="<?= $Grid->Inactive->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Inactive" class="view_lab_service_sub_Inactive"><?= $Grid->renderSort($Grid->Inactive) ?></div></th>
<?php } ?>
<?php if ($Grid->Outsource->Visible) { // Outsource ?>
        <th data-name="Outsource" class="<?= $Grid->Outsource->headerCellClass() ?>"><div id="elh_view_lab_service_sub_Outsource" class="view_lab_service_sub_Outsource"><?= $Grid->renderSort($Grid->Outsource) ?></div></th>
<?php } ?>
<?php if ($Grid->CollSample->Visible) { // CollSample ?>
        <th data-name="CollSample" class="<?= $Grid->CollSample->headerCellClass() ?>"><div id="elh_view_lab_service_sub_CollSample" class="view_lab_service_sub_CollSample"><?= $Grid->renderSort($Grid->CollSample) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_lab_service_sub", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->Id->Visible) { // Id ?>
        <td data-name="Id" <?= $Grid->Id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Id" class="form-group"></span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Id" id="o<?= $Grid->RowIndex ?>_Id" value="<?= HtmlEncode($Grid->Id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Id" class="form-group">
<span<?= $Grid->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Id->getDisplayValue($Grid->Id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Id" id="x<?= $Grid->RowIndex ?>_Id" value="<?= HtmlEncode($Grid->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Id">
<span<?= $Grid->Id->viewAttributes() ?>>
<?= $Grid->Id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Id" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Id" value="<?= HtmlEncode($Grid->Id->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Id" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Id" value="<?= HtmlEncode($Grid->Id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Id" id="x<?= $Grid->RowIndex ?>_Id" value="<?= HtmlEncode($Grid->Id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->CODE->Visible) { // CODE ?>
        <td data-name="CODE" <?= $Grid->CODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->CODE->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_CODE" class="form-group">
<span<?= $Grid->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CODE->getDisplayValue($Grid->CODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_CODE" name="x<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_CODE" class="form-group">
<input type="<?= $Grid->CODE->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?= $Grid->RowIndex ?>_CODE" id="x<?= $Grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CODE->getPlaceHolder()) ?>" value="<?= $Grid->CODE->EditValue ?>"<?= $Grid->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CODE" id="o<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->CODE->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_CODE" class="form-group">
<span<?= $Grid->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CODE->getDisplayValue($Grid->CODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_CODE" name="x<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_CODE" class="form-group">
<input type="<?= $Grid->CODE->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?= $Grid->RowIndex ?>_CODE" id="x<?= $Grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CODE->getPlaceHolder()) ?>" value="<?= $Grid->CODE->EditValue ?>"<?= $Grid->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_CODE">
<span<?= $Grid->CODE->viewAttributes() ?>>
<?= $Grid->CODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_CODE" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_CODE" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE" <?= $Grid->SERVICE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_SERVICE" class="form-group">
<input type="<?= $Grid->SERVICE->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?= $Grid->RowIndex ?>_SERVICE" id="x<?= $Grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE->EditValue ?>"<?= $Grid->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SERVICE" id="o<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_SERVICE" class="form-group">
<input type="<?= $Grid->SERVICE->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?= $Grid->RowIndex ?>_SERVICE" id="x<?= $Grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE->EditValue ?>"<?= $Grid->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_SERVICE">
<span<?= $Grid->SERVICE->viewAttributes() ?>>
<?= $Grid->SERVICE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_SERVICE" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_SERVICE" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->UNITS->Visible) { // UNITS ?>
        <td data-name="UNITS" <?= $Grid->UNITS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_UNITS" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_UNITS"><?= EmptyValue(strval($Grid->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->UNITS->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->UNITS->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->UNITS->ReadOnly || $Grid->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$Grid->UNITS->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_UNITS" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->UNITS->caption() ?>" data-title="<?= $Grid->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_UNITS',url:'<?= GetUrl("LabUnitMastAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->UNITS->getErrorMessage() ?></div>
<?= $Grid->UNITS->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_UNITS") ?>
<input type="hidden" is="selection-list" data-table="view_lab_service_sub" data-field="x_UNITS" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->UNITS->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_UNITS" id="x<?= $Grid->RowIndex ?>_UNITS" value="<?= $Grid->UNITS->CurrentValue ?>"<?= $Grid->UNITS->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_UNITS" id="o<?= $Grid->RowIndex ?>_UNITS" value="<?= HtmlEncode($Grid->UNITS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_UNITS" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_UNITS"><?= EmptyValue(strval($Grid->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->UNITS->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->UNITS->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->UNITS->ReadOnly || $Grid->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$Grid->UNITS->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_UNITS" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->UNITS->caption() ?>" data-title="<?= $Grid->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_UNITS',url:'<?= GetUrl("LabUnitMastAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->UNITS->getErrorMessage() ?></div>
<?= $Grid->UNITS->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_UNITS") ?>
<input type="hidden" is="selection-list" data-table="view_lab_service_sub" data-field="x_UNITS" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->UNITS->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_UNITS" id="x<?= $Grid->RowIndex ?>_UNITS" value="<?= $Grid->UNITS->CurrentValue ?>"<?= $Grid->UNITS->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_UNITS">
<span<?= $Grid->UNITS->viewAttributes() ?>>
<?= $Grid->UNITS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_UNITS" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_UNITS" value="<?= HtmlEncode($Grid->UNITS->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_UNITS" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_UNITS" value="<?= HtmlEncode($Grid->UNITS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Grid->TestSubCd->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_TestSubCd" class="form-group">
<input type="<?= $Grid->TestSubCd->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?= $Grid->RowIndex ?>_TestSubCd" id="x<?= $Grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestSubCd->getPlaceHolder()) ?>" value="<?= $Grid->TestSubCd->EditValue ?>"<?= $Grid->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestSubCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestSubCd" id="o<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_TestSubCd" class="form-group">
<input type="<?= $Grid->TestSubCd->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?= $Grid->RowIndex ?>_TestSubCd" id="x<?= $Grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestSubCd->getPlaceHolder()) ?>" value="<?= $Grid->TestSubCd->EditValue ?>"<?= $Grid->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestSubCd->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_TestSubCd">
<span<?= $Grid->TestSubCd->viewAttributes() ?>>
<?= $Grid->TestSubCd->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_TestSubCd" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_TestSubCd" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Grid->Method->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Method" class="form-group">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Method" id="o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Method" class="form-group">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Method">
<span<?= $Grid->Method->viewAttributes() ?>>
<?= $Grid->Method->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Method" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Method" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Grid->Order->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Order" class="form-group">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="8" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Order" id="o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Order" class="form-group">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="8" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Order">
<span<?= $Grid->Order->viewAttributes() ?>>
<?= $Grid->Order->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Order" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Order" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResType->Visible) { // ResType ?>
        <td data-name="ResType" <?= $Grid->ResType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_ResType" class="form-group">
<input type="<?= $Grid->ResType->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?= $Grid->RowIndex ?>_ResType" id="x<?= $Grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResType->getPlaceHolder()) ?>" value="<?= $Grid->ResType->EditValue ?>"<?= $Grid->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResType" id="o<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_ResType" class="form-group">
<input type="<?= $Grid->ResType->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?= $Grid->RowIndex ?>_ResType" id="x<?= $Grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResType->getPlaceHolder()) ?>" value="<?= $Grid->ResType->EditValue ?>"<?= $Grid->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_ResType">
<span<?= $Grid->ResType->viewAttributes() ?>>
<?= $Grid->ResType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_ResType" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_ResType" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->UnitCD->Visible) { // UnitCD ?>
        <td data-name="UnitCD" <?= $Grid->UnitCD->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_UnitCD" class="form-group">
<input type="<?= $Grid->UnitCD->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?= $Grid->RowIndex ?>_UnitCD" id="x<?= $Grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->UnitCD->getPlaceHolder()) ?>" value="<?= $Grid->UnitCD->EditValue ?>"<?= $Grid->UnitCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UnitCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_UnitCD" id="o<?= $Grid->RowIndex ?>_UnitCD" value="<?= HtmlEncode($Grid->UnitCD->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_UnitCD" class="form-group">
<input type="<?= $Grid->UnitCD->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?= $Grid->RowIndex ?>_UnitCD" id="x<?= $Grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->UnitCD->getPlaceHolder()) ?>" value="<?= $Grid->UnitCD->EditValue ?>"<?= $Grid->UnitCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UnitCD->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_UnitCD">
<span<?= $Grid->UnitCD->viewAttributes() ?>>
<?= $Grid->UnitCD->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_UnitCD" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_UnitCD" value="<?= HtmlEncode($Grid->UnitCD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_UnitCD" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_UnitCD" value="<?= HtmlEncode($Grid->UnitCD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Sample->Visible) { // Sample ?>
        <td data-name="Sample" <?= $Grid->Sample->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Sample" class="form-group">
<input type="<?= $Grid->Sample->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?= $Grid->RowIndex ?>_Sample" id="x<?= $Grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?= HtmlEncode($Grid->Sample->getPlaceHolder()) ?>" value="<?= $Grid->Sample->EditValue ?>"<?= $Grid->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Sample" id="o<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Sample" class="form-group">
<input type="<?= $Grid->Sample->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?= $Grid->RowIndex ?>_Sample" id="x<?= $Grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?= HtmlEncode($Grid->Sample->getPlaceHolder()) ?>" value="<?= $Grid->Sample->EditValue ?>"<?= $Grid->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sample->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Sample">
<span<?= $Grid->Sample->viewAttributes() ?>>
<?= $Grid->Sample->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Sample" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Sample" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->NoD->Visible) { // NoD ?>
        <td data-name="NoD" <?= $Grid->NoD->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_NoD" class="form-group">
<input type="<?= $Grid->NoD->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?= $Grid->RowIndex ?>_NoD" id="x<?= $Grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?= HtmlEncode($Grid->NoD->getPlaceHolder()) ?>" value="<?= $Grid->NoD->EditValue ?>"<?= $Grid->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoD" id="o<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_NoD" class="form-group">
<input type="<?= $Grid->NoD->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?= $Grid->RowIndex ?>_NoD" id="x<?= $Grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?= HtmlEncode($Grid->NoD->getPlaceHolder()) ?>" value="<?= $Grid->NoD->EditValue ?>"<?= $Grid->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoD->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_NoD">
<span<?= $Grid->NoD->viewAttributes() ?>>
<?= $Grid->NoD->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_NoD" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_NoD" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" <?= $Grid->BillOrder->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_BillOrder" class="form-group">
<input type="<?= $Grid->BillOrder->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?= $Grid->RowIndex ?>_BillOrder" id="x<?= $Grid->RowIndex ?>_BillOrder" size="8" placeholder="<?= HtmlEncode($Grid->BillOrder->getPlaceHolder()) ?>" value="<?= $Grid->BillOrder->EditValue ?>"<?= $Grid->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillOrder->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillOrder" id="o<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_BillOrder" class="form-group">
<input type="<?= $Grid->BillOrder->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?= $Grid->RowIndex ?>_BillOrder" id="x<?= $Grid->RowIndex ?>_BillOrder" size="8" placeholder="<?= HtmlEncode($Grid->BillOrder->getPlaceHolder()) ?>" value="<?= $Grid->BillOrder->EditValue ?>"<?= $Grid->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillOrder->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_BillOrder">
<span<?= $Grid->BillOrder->viewAttributes() ?>>
<?= $Grid->BillOrder->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_BillOrder" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_BillOrder" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Formula->Visible) { // Formula ?>
        <td data-name="Formula" <?= $Grid->Formula->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Formula" class="form-group">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?= $Grid->RowIndex ?>_Formula" id="x<?= $Grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Formula->getPlaceHolder()) ?>"<?= $Grid->Formula->editAttributes() ?>><?= $Grid->Formula->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Formula->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Formula" id="o<?= $Grid->RowIndex ?>_Formula" value="<?= HtmlEncode($Grid->Formula->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Formula" class="form-group">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?= $Grid->RowIndex ?>_Formula" id="x<?= $Grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Formula->getPlaceHolder()) ?>"<?= $Grid->Formula->editAttributes() ?>><?= $Grid->Formula->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Formula->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Formula">
<span<?= $Grid->Formula->viewAttributes() ?>>
<?= $Grid->Formula->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Formula" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Formula" value="<?= HtmlEncode($Grid->Formula->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Formula" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Formula" value="<?= HtmlEncode($Grid->Formula->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" <?= $Grid->Inactive->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Inactive" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Inactive">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_service_sub" data-field="x_Inactive" name="x<?= $Grid->RowIndex ?>_Inactive" id="x<?= $Grid->RowIndex ?>_Inactive"<?= $Grid->Inactive->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Inactive" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Inactive[]"
    name="x<?= $Grid->RowIndex ?>_Inactive[]"
    value="<?= HtmlEncode($Grid->Inactive->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Inactive"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Inactive"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Inactive->isInvalidClass() ?>"
    data-table="view_lab_service_sub"
    data-field="x_Inactive"
    data-value-separator="<?= $Grid->Inactive->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Inactive->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Inactive[]" id="o<?= $Grid->RowIndex ?>_Inactive[]" value="<?= HtmlEncode($Grid->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Inactive" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Inactive">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_service_sub" data-field="x_Inactive" name="x<?= $Grid->RowIndex ?>_Inactive" id="x<?= $Grid->RowIndex ?>_Inactive"<?= $Grid->Inactive->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Inactive" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Inactive[]"
    name="x<?= $Grid->RowIndex ?>_Inactive[]"
    value="<?= HtmlEncode($Grid->Inactive->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Inactive"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Inactive"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Inactive->isInvalidClass() ?>"
    data-table="view_lab_service_sub"
    data-field="x_Inactive"
    data-value-separator="<?= $Grid->Inactive->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Inactive->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Inactive">
<span<?= $Grid->Inactive->viewAttributes() ?>>
<?= $Grid->Inactive->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Inactive" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Inactive" value="<?= HtmlEncode($Grid->Inactive->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Inactive[]" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Inactive[]" value="<?= HtmlEncode($Grid->Inactive->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Outsource->Visible) { // Outsource ?>
        <td data-name="Outsource" <?= $Grid->Outsource->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Outsource" class="form-group">
<input type="<?= $Grid->Outsource->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?= $Grid->RowIndex ?>_Outsource" id="x<?= $Grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Outsource->getPlaceHolder()) ?>" value="<?= $Grid->Outsource->EditValue ?>"<?= $Grid->Outsource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Outsource->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Outsource" id="o<?= $Grid->RowIndex ?>_Outsource" value="<?= HtmlEncode($Grid->Outsource->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Outsource" class="form-group">
<input type="<?= $Grid->Outsource->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?= $Grid->RowIndex ?>_Outsource" id="x<?= $Grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Outsource->getPlaceHolder()) ?>" value="<?= $Grid->Outsource->EditValue ?>"<?= $Grid->Outsource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Outsource->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_Outsource">
<span<?= $Grid->Outsource->viewAttributes() ?>>
<?= $Grid->Outsource->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Outsource" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_Outsource" value="<?= HtmlEncode($Grid->Outsource->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Outsource" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_Outsource" value="<?= HtmlEncode($Grid->Outsource->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" <?= $Grid->CollSample->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_CollSample" class="form-group">
<input type="<?= $Grid->CollSample->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?= $Grid->RowIndex ?>_CollSample" id="x<?= $Grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->CollSample->getPlaceHolder()) ?>" value="<?= $Grid->CollSample->EditValue ?>"<?= $Grid->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollSample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollSample" id="o<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_CollSample" class="form-group">
<input type="<?= $Grid->CollSample->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?= $Grid->RowIndex ?>_CollSample" id="x<?= $Grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->CollSample->getPlaceHolder()) ?>" value="<?= $Grid->CollSample->EditValue ?>"<?= $Grid->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollSample->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_service_sub_CollSample">
<span<?= $Grid->CollSample->viewAttributes() ?>>
<?= $Grid->CollSample->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" data-hidden="1" name="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_CollSample" id="fview_lab_service_subgrid$x<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->FormValue) ?>">
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" data-hidden="1" name="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_CollSample" id="fview_lab_service_subgrid$o<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->OldValue) ?>">
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
loadjs.ready(["fview_lab_service_subgrid","load"], function () {
    fview_lab_service_subgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_lab_service_sub", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->Id->Visible) { // Id ?>
        <td data-name="Id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Id" class="form-group view_lab_service_sub_Id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Id" class="form-group view_lab_service_sub_Id">
<span<?= $Grid->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Id->getDisplayValue($Grid->Id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Id" id="x<?= $Grid->RowIndex ?>_Id" value="<?= HtmlEncode($Grid->Id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Id" id="o<?= $Grid->RowIndex ?>_Id" value="<?= HtmlEncode($Grid->Id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CODE->Visible) { // CODE ?>
        <td data-name="CODE">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->CODE->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<span<?= $Grid->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CODE->getDisplayValue($Grid->CODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_CODE" name="x<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<input type="<?= $Grid->CODE->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_CODE" name="x<?= $Grid->RowIndex ?>_CODE" id="x<?= $Grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CODE->getPlaceHolder()) ?>" value="<?= $Grid->CODE->EditValue ?>"<?= $Grid->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CODE" class="form-group view_lab_service_sub_CODE">
<span<?= $Grid->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CODE->getDisplayValue($Grid->CODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CODE" id="x<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CODE" id="o<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_SERVICE" class="form-group view_lab_service_sub_SERVICE">
<input type="<?= $Grid->SERVICE->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_SERVICE" name="x<?= $Grid->RowIndex ?>_SERVICE" id="x<?= $Grid->RowIndex ?>_SERVICE" size="25" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE->EditValue ?>"<?= $Grid->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_SERVICE" class="form-group view_lab_service_sub_SERVICE">
<span<?= $Grid->SERVICE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SERVICE->getDisplayValue($Grid->SERVICE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SERVICE" id="x<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_SERVICE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SERVICE" id="o<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->UNITS->Visible) { // UNITS ?>
        <td data-name="UNITS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_UNITS" class="form-group view_lab_service_sub_UNITS">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_UNITS"><?= EmptyValue(strval($Grid->UNITS->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->UNITS->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->UNITS->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->UNITS->ReadOnly || $Grid->UNITS->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_UNITS',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
        <?php if (AllowAdd(CurrentProjectID() . "lab_unit_mast") && !$Grid->UNITS->ReadOnly) { ?>
        <button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_UNITS" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->UNITS->caption() ?>" data-title="<?= $Grid->UNITS->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_UNITS',url:'<?= GetUrl("LabUnitMastAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button>
        <?php } ?>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->UNITS->getErrorMessage() ?></div>
<?= $Grid->UNITS->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_UNITS") ?>
<input type="hidden" is="selection-list" data-table="view_lab_service_sub" data-field="x_UNITS" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->UNITS->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_UNITS" id="x<?= $Grid->RowIndex ?>_UNITS" value="<?= $Grid->UNITS->CurrentValue ?>"<?= $Grid->UNITS->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_UNITS" class="form-group view_lab_service_sub_UNITS">
<span<?= $Grid->UNITS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->UNITS->getDisplayValue($Grid->UNITS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_UNITS" id="x<?= $Grid->RowIndex ?>_UNITS" value="<?= HtmlEncode($Grid->UNITS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UNITS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_UNITS" id="o<?= $Grid->RowIndex ?>_UNITS" value="<?= HtmlEncode($Grid->UNITS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_HospID" class="form-group view_lab_service_sub_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_TestSubCd" class="form-group view_lab_service_sub_TestSubCd">
<input type="<?= $Grid->TestSubCd->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_TestSubCd" name="x<?= $Grid->RowIndex ?>_TestSubCd" id="x<?= $Grid->RowIndex ?>_TestSubCd" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestSubCd->getPlaceHolder()) ?>" value="<?= $Grid->TestSubCd->EditValue ?>"<?= $Grid->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestSubCd->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_TestSubCd" class="form-group view_lab_service_sub_TestSubCd">
<span<?= $Grid->TestSubCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestSubCd->getDisplayValue($Grid->TestSubCd->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestSubCd" id="x<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestSubCd" id="o<?= $Grid->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Grid->TestSubCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Method->Visible) { // Method ?>
        <td data-name="Method">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Method" class="form-group view_lab_service_sub_Method">
<input type="<?= $Grid->Method->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Method" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->Method->getPlaceHolder()) ?>" value="<?= $Grid->Method->EditValue ?>"<?= $Grid->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Method->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Method" class="form-group view_lab_service_sub_Method">
<span<?= $Grid->Method->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Method->getDisplayValue($Grid->Method->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Method" id="x<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Method" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Method" id="o<?= $Grid->RowIndex ?>_Method" value="<?= HtmlEncode($Grid->Method->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Order->Visible) { // Order ?>
        <td data-name="Order">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Order" class="form-group view_lab_service_sub_Order">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="8" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Order" class="form-group view_lab_service_sub_Order">
<span<?= $Grid->Order->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Order->getDisplayValue($Grid->Order->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Order" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Order" id="o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResType->Visible) { // ResType ?>
        <td data-name="ResType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_ResType" class="form-group view_lab_service_sub_ResType">
<input type="<?= $Grid->ResType->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_ResType" name="x<?= $Grid->RowIndex ?>_ResType" id="x<?= $Grid->RowIndex ?>_ResType" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->ResType->getPlaceHolder()) ?>" value="<?= $Grid->ResType->EditValue ?>"<?= $Grid->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ResType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_ResType" class="form-group view_lab_service_sub_ResType">
<span<?= $Grid->ResType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResType->getDisplayValue($Grid->ResType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResType" id="x<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_ResType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResType" id="o<?= $Grid->RowIndex ?>_ResType" value="<?= HtmlEncode($Grid->ResType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->UnitCD->Visible) { // UnitCD ?>
        <td data-name="UnitCD">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_UnitCD" class="form-group view_lab_service_sub_UnitCD">
<input type="<?= $Grid->UnitCD->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_UnitCD" name="x<?= $Grid->RowIndex ?>_UnitCD" id="x<?= $Grid->RowIndex ?>_UnitCD" size="8" maxlength="45" placeholder="<?= HtmlEncode($Grid->UnitCD->getPlaceHolder()) ?>" value="<?= $Grid->UnitCD->EditValue ?>"<?= $Grid->UnitCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->UnitCD->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_UnitCD" class="form-group view_lab_service_sub_UnitCD">
<span<?= $Grid->UnitCD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->UnitCD->getDisplayValue($Grid->UnitCD->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" data-hidden="1" name="x<?= $Grid->RowIndex ?>_UnitCD" id="x<?= $Grid->RowIndex ?>_UnitCD" value="<?= HtmlEncode($Grid->UnitCD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_UnitCD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_UnitCD" id="o<?= $Grid->RowIndex ?>_UnitCD" value="<?= HtmlEncode($Grid->UnitCD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Sample->Visible) { // Sample ?>
        <td data-name="Sample">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Sample" class="form-group view_lab_service_sub_Sample">
<input type="<?= $Grid->Sample->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Sample" name="x<?= $Grid->RowIndex ?>_Sample" id="x<?= $Grid->RowIndex ?>_Sample" size="8" maxlength="105" placeholder="<?= HtmlEncode($Grid->Sample->getPlaceHolder()) ?>" value="<?= $Grid->Sample->EditValue ?>"<?= $Grid->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Sample->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Sample" class="form-group view_lab_service_sub_Sample">
<span<?= $Grid->Sample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Sample->getDisplayValue($Grid->Sample->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Sample" id="x<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Sample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Sample" id="o<?= $Grid->RowIndex ?>_Sample" value="<?= HtmlEncode($Grid->Sample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->NoD->Visible) { // NoD ?>
        <td data-name="NoD">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_NoD" class="form-group view_lab_service_sub_NoD">
<input type="<?= $Grid->NoD->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_NoD" name="x<?= $Grid->RowIndex ?>_NoD" id="x<?= $Grid->RowIndex ?>_NoD" size="8" maxlength="20" placeholder="<?= HtmlEncode($Grid->NoD->getPlaceHolder()) ?>" value="<?= $Grid->NoD->EditValue ?>"<?= $Grid->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->NoD->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_NoD" class="form-group view_lab_service_sub_NoD">
<span<?= $Grid->NoD->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->NoD->getDisplayValue($Grid->NoD->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" data-hidden="1" name="x<?= $Grid->RowIndex ?>_NoD" id="x<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_NoD" data-hidden="1" name="o<?= $Grid->RowIndex ?>_NoD" id="o<?= $Grid->RowIndex ?>_NoD" value="<?= HtmlEncode($Grid->NoD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_BillOrder" class="form-group view_lab_service_sub_BillOrder">
<input type="<?= $Grid->BillOrder->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_BillOrder" name="x<?= $Grid->RowIndex ?>_BillOrder" id="x<?= $Grid->RowIndex ?>_BillOrder" size="8" placeholder="<?= HtmlEncode($Grid->BillOrder->getPlaceHolder()) ?>" value="<?= $Grid->BillOrder->EditValue ?>"<?= $Grid->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillOrder->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_BillOrder" class="form-group view_lab_service_sub_BillOrder">
<span<?= $Grid->BillOrder->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillOrder->getDisplayValue($Grid->BillOrder->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillOrder" id="x<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_BillOrder" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillOrder" id="o<?= $Grid->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Grid->BillOrder->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Formula->Visible) { // Formula ?>
        <td data-name="Formula">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Formula" class="form-group view_lab_service_sub_Formula">
<textarea data-table="view_lab_service_sub" data-field="x_Formula" name="x<?= $Grid->RowIndex ?>_Formula" id="x<?= $Grid->RowIndex ?>_Formula" cols="35" rows="4" placeholder="<?= HtmlEncode($Grid->Formula->getPlaceHolder()) ?>"<?= $Grid->Formula->editAttributes() ?>><?= $Grid->Formula->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->Formula->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Formula" class="form-group view_lab_service_sub_Formula">
<span<?= $Grid->Formula->viewAttributes() ?>>
<?= $Grid->Formula->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Formula" id="x<?= $Grid->RowIndex ?>_Formula" value="<?= HtmlEncode($Grid->Formula->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Formula" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Formula" id="o<?= $Grid->RowIndex ?>_Formula" value="<?= HtmlEncode($Grid->Formula->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Inactive" class="form-group view_lab_service_sub_Inactive">
<template id="tp_x<?= $Grid->RowIndex ?>_Inactive">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_service_sub" data-field="x_Inactive" name="x<?= $Grid->RowIndex ?>_Inactive" id="x<?= $Grid->RowIndex ?>_Inactive"<?= $Grid->Inactive->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Inactive" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Inactive[]"
    name="x<?= $Grid->RowIndex ?>_Inactive[]"
    value="<?= HtmlEncode($Grid->Inactive->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Inactive"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Inactive"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Inactive->isInvalidClass() ?>"
    data-table="view_lab_service_sub"
    data-field="x_Inactive"
    data-value-separator="<?= $Grid->Inactive->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Inactive->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Inactive" class="form-group view_lab_service_sub_Inactive">
<span<?= $Grid->Inactive->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Inactive->getDisplayValue($Grid->Inactive->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Inactive" id="x<?= $Grid->RowIndex ?>_Inactive" value="<?= HtmlEncode($Grid->Inactive->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Inactive" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Inactive[]" id="o<?= $Grid->RowIndex ?>_Inactive[]" value="<?= HtmlEncode($Grid->Inactive->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Outsource->Visible) { // Outsource ?>
        <td data-name="Outsource">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_Outsource" class="form-group view_lab_service_sub_Outsource">
<input type="<?= $Grid->Outsource->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_Outsource" name="x<?= $Grid->RowIndex ?>_Outsource" id="x<?= $Grid->RowIndex ?>_Outsource" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->Outsource->getPlaceHolder()) ?>" value="<?= $Grid->Outsource->EditValue ?>"<?= $Grid->Outsource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Outsource->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_Outsource" class="form-group view_lab_service_sub_Outsource">
<span<?= $Grid->Outsource->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Outsource->getDisplayValue($Grid->Outsource->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Outsource" id="x<?= $Grid->RowIndex ?>_Outsource" value="<?= HtmlEncode($Grid->Outsource->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_Outsource" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Outsource" id="o<?= $Grid->RowIndex ?>_Outsource" value="<?= HtmlEncode($Grid->Outsource->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_service_sub_CollSample" class="form-group view_lab_service_sub_CollSample">
<input type="<?= $Grid->CollSample->getInputTextType() ?>" data-table="view_lab_service_sub" data-field="x_CollSample" name="x<?= $Grid->RowIndex ?>_CollSample" id="x<?= $Grid->RowIndex ?>_CollSample" size="4" maxlength="45" placeholder="<?= HtmlEncode($Grid->CollSample->getPlaceHolder()) ?>" value="<?= $Grid->CollSample->EditValue ?>"<?= $Grid->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CollSample->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_service_sub_CollSample" class="form-group view_lab_service_sub_CollSample">
<span<?= $Grid->CollSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CollSample->getDisplayValue($Grid->CollSample->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CollSample" id="x<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_service_sub" data-field="x_CollSample" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CollSample" id="o<?= $Grid->RowIndex ?>_CollSample" value="<?= HtmlEncode($Grid->CollSample->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_lab_service_subgrid","load"], function() {
    fview_lab_service_subgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fview_lab_service_subgrid">
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
    ew.addEventHandlers("view_lab_service_sub");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    $("[data-name='id']").hide(),$("[data-name='id']").width("8px"),$("[data-name='UNITS']").width("8px"),$("[data-name='TestSubCd']").width("8px"),$("[data-name='Method']").width("8px"),$("[data-name='Order']").width("8px"),$("[data-name='ResType']").width("8px"),$("[data-name='UnitCD']").width("8px"),$("[data-name='Sample']").width("8px"),$("[data-name='NoD']").width("8px"),$("[data-name='BillOrder']").width("8px"),$("[data-name='Formula']").width("8px"),$("[data-name='Inactive']").width("8px"),$("[data-name='Outsource']").width("8px"),$("[data-name='CollSample']").width("8px");
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_lab_service_sub",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PharmacyGrnGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_grngrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpharmacy_grngrid = new ew.Form("fpharmacy_grngrid", "grid");
    fpharmacy_grngrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_grn")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_grn)
        ew.vars.tables.pharmacy_grn = currentTable;
    fpharmacy_grngrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["GRNNO", [fields.GRNNO.visible && fields.GRNNO.required ? ew.Validators.required(fields.GRNNO.caption) : null], fields.GRNNO.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null, ew.Validators.datetime(7)], fields.DT.isInvalid],
        ["Customername", [fields.Customername.visible && fields.Customername.required ? ew.Validators.required(fields.Customername.caption) : null], fields.Customername.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Pincode", [fields.Pincode.visible && fields.Pincode.required ? ew.Validators.required(fields.Pincode.caption) : null], fields.Pincode.isInvalid],
        ["Phone", [fields.Phone.visible && fields.Phone.required ? ew.Validators.required(fields.Phone.caption) : null], fields.Phone.isInvalid],
        ["BILLNO", [fields.BILLNO.visible && fields.BILLNO.required ? ew.Validators.required(fields.BILLNO.caption) : null], fields.BILLNO.isInvalid],
        ["BILLDT", [fields.BILLDT.visible && fields.BILLDT.required ? ew.Validators.required(fields.BILLDT.caption) : null, ew.Validators.datetime(0)], fields.BILLDT.isInvalid],
        ["BillTotalValue", [fields.BillTotalValue.visible && fields.BillTotalValue.required ? ew.Validators.required(fields.BillTotalValue.caption) : null, ew.Validators.float], fields.BillTotalValue.isInvalid],
        ["GRNTotalValue", [fields.GRNTotalValue.visible && fields.GRNTotalValue.required ? ew.Validators.required(fields.GRNTotalValue.caption) : null, ew.Validators.float], fields.GRNTotalValue.isInvalid],
        ["BillDiscount", [fields.BillDiscount.visible && fields.BillDiscount.required ? ew.Validators.required(fields.BillDiscount.caption) : null, ew.Validators.float], fields.BillDiscount.isInvalid],
        ["GrnValue", [fields.GrnValue.visible && fields.GrnValue.required ? ew.Validators.required(fields.GrnValue.caption) : null, ew.Validators.float], fields.GrnValue.isInvalid],
        ["Pid", [fields.Pid.visible && fields.Pid.required ? ew.Validators.required(fields.Pid.caption) : null, ew.Validators.integer], fields.Pid.isInvalid],
        ["PaymentNo", [fields.PaymentNo.visible && fields.PaymentNo.required ? ew.Validators.required(fields.PaymentNo.caption) : null], fields.PaymentNo.isInvalid],
        ["PaymentStatus", [fields.PaymentStatus.visible && fields.PaymentStatus.required ? ew.Validators.required(fields.PaymentStatus.caption) : null], fields.PaymentStatus.isInvalid],
        ["PaidAmount", [fields.PaidAmount.visible && fields.PaidAmount.required ? ew.Validators.required(fields.PaidAmount.caption) : null, ew.Validators.float], fields.PaidAmount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_grngrid,
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
    fpharmacy_grngrid.validate = function () {
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
    fpharmacy_grngrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "GRNNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Customername", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "State", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pincode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Phone", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BILLNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BILLDT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillTotalValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GRNTotalValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillDiscount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GrnValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaymentNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaymentStatus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PaidAmount", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_grngrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_grngrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpharmacy_grngrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_grn">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_grngrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_grn" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_grngrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_pharmacy_grn_id" class="pharmacy_grn_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->GRNNO->Visible) { // GRNNO ?>
        <th data-name="GRNNO" class="<?= $Grid->GRNNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO"><?= $Grid->renderSort($Grid->GRNNO) ?></div></th>
<?php } ?>
<?php if ($Grid->DT->Visible) { // DT ?>
        <th data-name="DT" class="<?= $Grid->DT->headerCellClass() ?>"><div id="elh_pharmacy_grn_DT" class="pharmacy_grn_DT"><?= $Grid->renderSort($Grid->DT) ?></div></th>
<?php } ?>
<?php if ($Grid->Customername->Visible) { // Customername ?>
        <th data-name="Customername" class="<?= $Grid->Customername->headerCellClass() ?>"><div id="elh_pharmacy_grn_Customername" class="pharmacy_grn_Customername"><?= $Grid->renderSort($Grid->Customername) ?></div></th>
<?php } ?>
<?php if ($Grid->State->Visible) { // State ?>
        <th data-name="State" class="<?= $Grid->State->headerCellClass() ?>"><div id="elh_pharmacy_grn_State" class="pharmacy_grn_State"><?= $Grid->renderSort($Grid->State) ?></div></th>
<?php } ?>
<?php if ($Grid->Pincode->Visible) { // Pincode ?>
        <th data-name="Pincode" class="<?= $Grid->Pincode->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode"><?= $Grid->renderSort($Grid->Pincode) ?></div></th>
<?php } ?>
<?php if ($Grid->Phone->Visible) { // Phone ?>
        <th data-name="Phone" class="<?= $Grid->Phone->headerCellClass() ?>"><div id="elh_pharmacy_grn_Phone" class="pharmacy_grn_Phone"><?= $Grid->renderSort($Grid->Phone) ?></div></th>
<?php } ?>
<?php if ($Grid->BILLNO->Visible) { // BILLNO ?>
        <th data-name="BILLNO" class="<?= $Grid->BILLNO->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO"><?= $Grid->renderSort($Grid->BILLNO) ?></div></th>
<?php } ?>
<?php if ($Grid->BILLDT->Visible) { // BILLDT ?>
        <th data-name="BILLDT" class="<?= $Grid->BILLDT->headerCellClass() ?>"><div id="elh_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT"><?= $Grid->renderSort($Grid->BILLDT) ?></div></th>
<?php } ?>
<?php if ($Grid->BillTotalValue->Visible) { // BillTotalValue ?>
        <th data-name="BillTotalValue" class="<?= $Grid->BillTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue"><?= $Grid->renderSort($Grid->BillTotalValue) ?></div></th>
<?php } ?>
<?php if ($Grid->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <th data-name="GRNTotalValue" class="<?= $Grid->GRNTotalValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue"><?= $Grid->renderSort($Grid->GRNTotalValue) ?></div></th>
<?php } ?>
<?php if ($Grid->BillDiscount->Visible) { // BillDiscount ?>
        <th data-name="BillDiscount" class="<?= $Grid->BillDiscount->headerCellClass() ?>"><div id="elh_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount"><?= $Grid->renderSort($Grid->BillDiscount) ?></div></th>
<?php } ?>
<?php if ($Grid->GrnValue->Visible) { // GrnValue ?>
        <th data-name="GrnValue" class="<?= $Grid->GrnValue->headerCellClass() ?>"><div id="elh_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue"><?= $Grid->renderSort($Grid->GrnValue) ?></div></th>
<?php } ?>
<?php if ($Grid->Pid->Visible) { // Pid ?>
        <th data-name="Pid" class="<?= $Grid->Pid->headerCellClass() ?>"><div id="elh_pharmacy_grn_Pid" class="pharmacy_grn_Pid"><?= $Grid->renderSort($Grid->Pid) ?></div></th>
<?php } ?>
<?php if ($Grid->PaymentNo->Visible) { // PaymentNo ?>
        <th data-name="PaymentNo" class="<?= $Grid->PaymentNo->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo"><?= $Grid->renderSort($Grid->PaymentNo) ?></div></th>
<?php } ?>
<?php if ($Grid->PaymentStatus->Visible) { // PaymentStatus ?>
        <th data-name="PaymentStatus" class="<?= $Grid->PaymentStatus->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus"><?= $Grid->renderSort($Grid->PaymentStatus) ?></div></th>
<?php } ?>
<?php if ($Grid->PaidAmount->Visible) { // PaidAmount ?>
        <th data-name="PaidAmount" class="<?= $Grid->PaidAmount->headerCellClass() ?>"><div id="elh_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount"><?= $Grid->renderSort($Grid->PaidAmount) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_pharmacy_grn", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_id" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_id" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_grn" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO" <?= $Grid->GRNNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GRNNO" class="form-group">
<input type="<?= $Grid->GRNNO->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?= $Grid->RowIndex ?>_GRNNO" id="x<?= $Grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GRNNO->getPlaceHolder()) ?>" value="<?= $Grid->GRNNO->EditValue ?>"<?= $Grid->GRNNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNNO" id="o<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GRNNO" class="form-group">
<input type="<?= $Grid->GRNNO->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?= $Grid->RowIndex ?>_GRNNO" id="x<?= $Grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GRNNO->getPlaceHolder()) ?>" value="<?= $Grid->GRNNO->EditValue ?>"<?= $Grid->GRNNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GRNNO">
<span<?= $Grid->GRNNO->viewAttributes() ?>>
<?= $Grid->GRNNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_GRNNO" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_GRNNO" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DT->Visible) { // DT ?>
        <td data-name="DT" <?= $Grid->DT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_DT" class="form-group">
<input type="<?= $Grid->DT->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_DT" data-format="7" name="x<?= $Grid->RowIndex ?>_DT" id="x<?= $Grid->RowIndex ?>_DT" placeholder="<?= HtmlEncode($Grid->DT->getPlaceHolder()) ?>" value="<?= $Grid->DT->EditValue ?>"<?= $Grid->DT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DT->getErrorMessage() ?></div>
<?php if (!$Grid->DT->ReadOnly && !$Grid->DT->Disabled && !isset($Grid->DT->EditAttrs["readonly"]) && !isset($Grid->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_grngrid", "x<?= $Grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DT" id="o<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_DT" class="form-group">
<input type="<?= $Grid->DT->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_DT" data-format="7" name="x<?= $Grid->RowIndex ?>_DT" id="x<?= $Grid->RowIndex ?>_DT" placeholder="<?= HtmlEncode($Grid->DT->getPlaceHolder()) ?>" value="<?= $Grid->DT->EditValue ?>"<?= $Grid->DT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DT->getErrorMessage() ?></div>
<?php if (!$Grid->DT->ReadOnly && !$Grid->DT->Disabled && !isset($Grid->DT->EditAttrs["readonly"]) && !isset($Grid->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_grngrid", "x<?= $Grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_DT">
<span<?= $Grid->DT->viewAttributes() ?>>
<?= $Grid->DT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_DT" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_DT" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Customername->Visible) { // Customername ?>
        <td data-name="Customername" <?= $Grid->Customername->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Customername" class="form-group">
<input type="<?= $Grid->Customername->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Customername" name="x<?= $Grid->RowIndex ?>_Customername" id="x<?= $Grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Customername->getPlaceHolder()) ?>" value="<?= $Grid->Customername->EditValue ?>"<?= $Grid->Customername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Customername->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Customername" id="o<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Customername" class="form-group">
<input type="<?= $Grid->Customername->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Customername" name="x<?= $Grid->RowIndex ?>_Customername" id="x<?= $Grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Customername->getPlaceHolder()) ?>" value="<?= $Grid->Customername->EditValue ?>"<?= $Grid->Customername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Customername->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Customername">
<span<?= $Grid->Customername->viewAttributes() ?>>
<?= $Grid->Customername->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_Customername" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_Customername" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->State->Visible) { // State ?>
        <td data-name="State" <?= $Grid->State->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_State" class="form-group">
<input type="<?= $Grid->State->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_State" name="x<?= $Grid->RowIndex ?>_State" id="x<?= $Grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->State->getPlaceHolder()) ?>" value="<?= $Grid->State->EditValue ?>"<?= $Grid->State->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->State->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" data-hidden="1" name="o<?= $Grid->RowIndex ?>_State" id="o<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_State" class="form-group">
<input type="<?= $Grid->State->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_State" name="x<?= $Grid->RowIndex ?>_State" id="x<?= $Grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->State->getPlaceHolder()) ?>" value="<?= $Grid->State->EditValue ?>"<?= $Grid->State->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->State->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_State">
<span<?= $Grid->State->viewAttributes() ?>>
<?= $Grid->State->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_State" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_State" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" <?= $Grid->Pincode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Pincode" class="form-group">
<input type="<?= $Grid->Pincode->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?= $Grid->RowIndex ?>_Pincode" id="x<?= $Grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pincode->getPlaceHolder()) ?>" value="<?= $Grid->Pincode->EditValue ?>"<?= $Grid->Pincode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pincode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pincode" id="o<?= $Grid->RowIndex ?>_Pincode" value="<?= HtmlEncode($Grid->Pincode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Pincode" class="form-group">
<input type="<?= $Grid->Pincode->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?= $Grid->RowIndex ?>_Pincode" id="x<?= $Grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pincode->getPlaceHolder()) ?>" value="<?= $Grid->Pincode->EditValue ?>"<?= $Grid->Pincode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pincode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Pincode">
<span<?= $Grid->Pincode->viewAttributes() ?>>
<?= $Grid->Pincode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_Pincode" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_Pincode" value="<?= HtmlEncode($Grid->Pincode->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_Pincode" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_Pincode" value="<?= HtmlEncode($Grid->Pincode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Phone->Visible) { // Phone ?>
        <td data-name="Phone" <?= $Grid->Phone->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Phone" class="form-group">
<input type="<?= $Grid->Phone->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Phone" name="x<?= $Grid->RowIndex ?>_Phone" id="x<?= $Grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Phone->getPlaceHolder()) ?>" value="<?= $Grid->Phone->EditValue ?>"<?= $Grid->Phone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Phone->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Phone" id="o<?= $Grid->RowIndex ?>_Phone" value="<?= HtmlEncode($Grid->Phone->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Phone" class="form-group">
<input type="<?= $Grid->Phone->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Phone" name="x<?= $Grid->RowIndex ?>_Phone" id="x<?= $Grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Phone->getPlaceHolder()) ?>" value="<?= $Grid->Phone->EditValue ?>"<?= $Grid->Phone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Phone->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Phone">
<span<?= $Grid->Phone->viewAttributes() ?>>
<?= $Grid->Phone->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_Phone" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_Phone" value="<?= HtmlEncode($Grid->Phone->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_Phone" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_Phone" value="<?= HtmlEncode($Grid->Phone->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" <?= $Grid->BILLNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BILLNO" class="form-group">
<input type="<?= $Grid->BILLNO->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?= $Grid->RowIndex ?>_BILLNO" id="x<?= $Grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BILLNO->getPlaceHolder()) ?>" value="<?= $Grid->BILLNO->EditValue ?>"<?= $Grid->BILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BILLNO" id="o<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BILLNO" class="form-group">
<input type="<?= $Grid->BILLNO->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?= $Grid->RowIndex ?>_BILLNO" id="x<?= $Grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BILLNO->getPlaceHolder()) ?>" value="<?= $Grid->BILLNO->EditValue ?>"<?= $Grid->BILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BILLNO">
<span<?= $Grid->BILLNO->viewAttributes() ?>>
<?= $Grid->BILLNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_BILLNO" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_BILLNO" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" <?= $Grid->BILLDT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BILLDT" class="form-group">
<input type="<?= $Grid->BILLDT->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?= $Grid->RowIndex ?>_BILLDT" id="x<?= $Grid->RowIndex ?>_BILLDT" placeholder="<?= HtmlEncode($Grid->BILLDT->getPlaceHolder()) ?>" value="<?= $Grid->BILLDT->EditValue ?>"<?= $Grid->BILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLDT->getErrorMessage() ?></div>
<?php if (!$Grid->BILLDT->ReadOnly && !$Grid->BILLDT->Disabled && !isset($Grid->BILLDT->EditAttrs["readonly"]) && !isset($Grid->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_grngrid", "x<?= $Grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BILLDT" id="o<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BILLDT" class="form-group">
<input type="<?= $Grid->BILLDT->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?= $Grid->RowIndex ?>_BILLDT" id="x<?= $Grid->RowIndex ?>_BILLDT" placeholder="<?= HtmlEncode($Grid->BILLDT->getPlaceHolder()) ?>" value="<?= $Grid->BILLDT->EditValue ?>"<?= $Grid->BILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLDT->getErrorMessage() ?></div>
<?php if (!$Grid->BILLDT->ReadOnly && !$Grid->BILLDT->Disabled && !isset($Grid->BILLDT->EditAttrs["readonly"]) && !isset($Grid->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_grngrid", "x<?= $Grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BILLDT">
<span<?= $Grid->BILLDT->viewAttributes() ?>>
<?= $Grid->BILLDT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_BILLDT" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_BILLDT" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillTotalValue->Visible) { // BillTotalValue ?>
        <td data-name="BillTotalValue" <?= $Grid->BillTotalValue->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BillTotalValue" class="form-group">
<input type="<?= $Grid->BillTotalValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?= $Grid->RowIndex ?>_BillTotalValue" id="x<?= $Grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?= HtmlEncode($Grid->BillTotalValue->getPlaceHolder()) ?>" value="<?= $Grid->BillTotalValue->EditValue ?>"<?= $Grid->BillTotalValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillTotalValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillTotalValue" id="o<?= $Grid->RowIndex ?>_BillTotalValue" value="<?= HtmlEncode($Grid->BillTotalValue->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BillTotalValue" class="form-group">
<input type="<?= $Grid->BillTotalValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?= $Grid->RowIndex ?>_BillTotalValue" id="x<?= $Grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?= HtmlEncode($Grid->BillTotalValue->getPlaceHolder()) ?>" value="<?= $Grid->BillTotalValue->EditValue ?>"<?= $Grid->BillTotalValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillTotalValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BillTotalValue">
<span<?= $Grid->BillTotalValue->viewAttributes() ?>>
<?= $Grid->BillTotalValue->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_BillTotalValue" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_BillTotalValue" value="<?= HtmlEncode($Grid->BillTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_BillTotalValue" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_BillTotalValue" value="<?= HtmlEncode($Grid->BillTotalValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td data-name="GRNTotalValue" <?= $Grid->GRNTotalValue->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GRNTotalValue" class="form-group">
<input type="<?= $Grid->GRNTotalValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?= $Grid->RowIndex ?>_GRNTotalValue" id="x<?= $Grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?= HtmlEncode($Grid->GRNTotalValue->getPlaceHolder()) ?>" value="<?= $Grid->GRNTotalValue->EditValue ?>"<?= $Grid->GRNTotalValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNTotalValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNTotalValue" id="o<?= $Grid->RowIndex ?>_GRNTotalValue" value="<?= HtmlEncode($Grid->GRNTotalValue->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GRNTotalValue" class="form-group">
<input type="<?= $Grid->GRNTotalValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?= $Grid->RowIndex ?>_GRNTotalValue" id="x<?= $Grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?= HtmlEncode($Grid->GRNTotalValue->getPlaceHolder()) ?>" value="<?= $Grid->GRNTotalValue->EditValue ?>"<?= $Grid->GRNTotalValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNTotalValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GRNTotalValue">
<span<?= $Grid->GRNTotalValue->viewAttributes() ?>>
<?= $Grid->GRNTotalValue->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_GRNTotalValue" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_GRNTotalValue" value="<?= HtmlEncode($Grid->GRNTotalValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_GRNTotalValue" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_GRNTotalValue" value="<?= HtmlEncode($Grid->GRNTotalValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillDiscount->Visible) { // BillDiscount ?>
        <td data-name="BillDiscount" <?= $Grid->BillDiscount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BillDiscount" class="form-group">
<input type="<?= $Grid->BillDiscount->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?= $Grid->RowIndex ?>_BillDiscount" id="x<?= $Grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?= HtmlEncode($Grid->BillDiscount->getPlaceHolder()) ?>" value="<?= $Grid->BillDiscount->EditValue ?>"<?= $Grid->BillDiscount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDiscount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillDiscount" id="o<?= $Grid->RowIndex ?>_BillDiscount" value="<?= HtmlEncode($Grid->BillDiscount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BillDiscount" class="form-group">
<input type="<?= $Grid->BillDiscount->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?= $Grid->RowIndex ?>_BillDiscount" id="x<?= $Grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?= HtmlEncode($Grid->BillDiscount->getPlaceHolder()) ?>" value="<?= $Grid->BillDiscount->EditValue ?>"<?= $Grid->BillDiscount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDiscount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_BillDiscount">
<span<?= $Grid->BillDiscount->viewAttributes() ?>>
<?= $Grid->BillDiscount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_BillDiscount" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_BillDiscount" value="<?= HtmlEncode($Grid->BillDiscount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_BillDiscount" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_BillDiscount" value="<?= HtmlEncode($Grid->BillDiscount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GrnValue->Visible) { // GrnValue ?>
        <td data-name="GrnValue" <?= $Grid->GrnValue->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GrnValue" class="form-group">
<input type="<?= $Grid->GrnValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?= $Grid->RowIndex ?>_GrnValue" id="x<?= $Grid->RowIndex ?>_GrnValue" size="30" placeholder="<?= HtmlEncode($Grid->GrnValue->getPlaceHolder()) ?>" value="<?= $Grid->GrnValue->EditValue ?>"<?= $Grid->GrnValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrnValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GrnValue" id="o<?= $Grid->RowIndex ?>_GrnValue" value="<?= HtmlEncode($Grid->GrnValue->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GrnValue" class="form-group">
<input type="<?= $Grid->GrnValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?= $Grid->RowIndex ?>_GrnValue" id="x<?= $Grid->RowIndex ?>_GrnValue" size="30" placeholder="<?= HtmlEncode($Grid->GrnValue->getPlaceHolder()) ?>" value="<?= $Grid->GrnValue->EditValue ?>"<?= $Grid->GrnValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrnValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_GrnValue">
<span<?= $Grid->GrnValue->viewAttributes() ?>>
<?= $Grid->GrnValue->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_GrnValue" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_GrnValue" value="<?= HtmlEncode($Grid->GrnValue->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_GrnValue" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_GrnValue" value="<?= HtmlEncode($Grid->GrnValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Pid->Visible) { // Pid ?>
        <td data-name="Pid" <?= $Grid->Pid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Pid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Pid" class="form-group">
<span<?= $Grid->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pid->getDisplayValue($Grid->Pid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Pid" name="x<?= $Grid->RowIndex ?>_Pid" value="<?= HtmlEncode($Grid->Pid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Pid" class="form-group">
<input type="<?= $Grid->Pid->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Pid" name="x<?= $Grid->RowIndex ?>_Pid" id="x<?= $Grid->RowIndex ?>_Pid" size="30" placeholder="<?= HtmlEncode($Grid->Pid->getPlaceHolder()) ?>" value="<?= $Grid->Pid->EditValue ?>"<?= $Grid->Pid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pid" id="o<?= $Grid->RowIndex ?>_Pid" value="<?= HtmlEncode($Grid->Pid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->Pid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Pid" class="form-group">
<span<?= $Grid->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pid->getDisplayValue($Grid->Pid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Pid" name="x<?= $Grid->RowIndex ?>_Pid" value="<?= HtmlEncode($Grid->Pid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Pid" class="form-group">
<input type="<?= $Grid->Pid->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Pid" name="x<?= $Grid->RowIndex ?>_Pid" id="x<?= $Grid->RowIndex ?>_Pid" size="30" placeholder="<?= HtmlEncode($Grid->Pid->getPlaceHolder()) ?>" value="<?= $Grid->Pid->EditValue ?>"<?= $Grid->Pid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_Pid">
<span<?= $Grid->Pid->viewAttributes() ?>>
<?= $Grid->Pid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_Pid" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_Pid" value="<?= HtmlEncode($Grid->Pid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_Pid" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_Pid" value="<?= HtmlEncode($Grid->Pid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PaymentNo->Visible) { // PaymentNo ?>
        <td data-name="PaymentNo" <?= $Grid->PaymentNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaymentNo" class="form-group">
<input type="<?= $Grid->PaymentNo->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?= $Grid->RowIndex ?>_PaymentNo" id="x<?= $Grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentNo->getPlaceHolder()) ?>" value="<?= $Grid->PaymentNo->EditValue ?>"<?= $Grid->PaymentNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaymentNo" id="o<?= $Grid->RowIndex ?>_PaymentNo" value="<?= HtmlEncode($Grid->PaymentNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaymentNo" class="form-group">
<input type="<?= $Grid->PaymentNo->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?= $Grid->RowIndex ?>_PaymentNo" id="x<?= $Grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentNo->getPlaceHolder()) ?>" value="<?= $Grid->PaymentNo->EditValue ?>"<?= $Grid->PaymentNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaymentNo">
<span<?= $Grid->PaymentNo->viewAttributes() ?>>
<?= $Grid->PaymentNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_PaymentNo" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_PaymentNo" value="<?= HtmlEncode($Grid->PaymentNo->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_PaymentNo" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_PaymentNo" value="<?= HtmlEncode($Grid->PaymentNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" <?= $Grid->PaymentStatus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaymentStatus" class="form-group">
<input type="<?= $Grid->PaymentStatus->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?= $Grid->RowIndex ?>_PaymentStatus" id="x<?= $Grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Grid->PaymentStatus->EditValue ?>"<?= $Grid->PaymentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaymentStatus" id="o<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaymentStatus" class="form-group">
<input type="<?= $Grid->PaymentStatus->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?= $Grid->RowIndex ?>_PaymentStatus" id="x<?= $Grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Grid->PaymentStatus->EditValue ?>"<?= $Grid->PaymentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentStatus->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaymentStatus">
<span<?= $Grid->PaymentStatus->viewAttributes() ?>>
<?= $Grid->PaymentStatus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_PaymentStatus" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_PaymentStatus" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount" <?= $Grid->PaidAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaidAmount" class="form-group">
<input type="<?= $Grid->PaidAmount->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?= $Grid->RowIndex ?>_PaidAmount" id="x<?= $Grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?= HtmlEncode($Grid->PaidAmount->getPlaceHolder()) ?>" value="<?= $Grid->PaidAmount->EditValue ?>"<?= $Grid->PaidAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaidAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaidAmount" id="o<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaidAmount" class="form-group">
<input type="<?= $Grid->PaidAmount->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?= $Grid->RowIndex ?>_PaidAmount" id="x<?= $Grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?= HtmlEncode($Grid->PaidAmount->getPlaceHolder()) ?>" value="<?= $Grid->PaidAmount->EditValue ?>"<?= $Grid->PaidAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaidAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_grn_PaidAmount">
<span<?= $Grid->PaidAmount->viewAttributes() ?>>
<?= $Grid->PaidAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" data-hidden="1" name="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_PaidAmount" id="fpharmacy_grngrid$x<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" data-hidden="1" name="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_PaidAmount" id="fpharmacy_grngrid$o<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->OldValue) ?>">
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
loadjs.ready(["fpharmacy_grngrid","load"], function () {
    fpharmacy_grngrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_pharmacy_grn", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_pharmacy_grn_id" class="form-group pharmacy_grn_id"></span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_id" class="form-group pharmacy_grn_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GRNNO" class="form-group pharmacy_grn_GRNNO">
<input type="<?= $Grid->GRNNO->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GRNNO" name="x<?= $Grid->RowIndex ?>_GRNNO" id="x<?= $Grid->RowIndex ?>_GRNNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->GRNNO->getPlaceHolder()) ?>" value="<?= $Grid->GRNNO->EditValue ?>"<?= $Grid->GRNNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GRNNO" class="form-group pharmacy_grn_GRNNO">
<span<?= $Grid->GRNNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GRNNO->getDisplayValue($Grid->GRNNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GRNNO" id="x<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNNO" id="o<?= $Grid->RowIndex ?>_GRNNO" value="<?= HtmlEncode($Grid->GRNNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DT->Visible) { // DT ?>
        <td data-name="DT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_DT" class="form-group pharmacy_grn_DT">
<input type="<?= $Grid->DT->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_DT" data-format="7" name="x<?= $Grid->RowIndex ?>_DT" id="x<?= $Grid->RowIndex ?>_DT" placeholder="<?= HtmlEncode($Grid->DT->getPlaceHolder()) ?>" value="<?= $Grid->DT->EditValue ?>"<?= $Grid->DT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DT->getErrorMessage() ?></div>
<?php if (!$Grid->DT->ReadOnly && !$Grid->DT->Disabled && !isset($Grid->DT->EditAttrs["readonly"]) && !isset($Grid->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_grngrid", "x<?= $Grid->RowIndex ?>_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_DT" class="form-group pharmacy_grn_DT">
<span<?= $Grid->DT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DT->getDisplayValue($Grid->DT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DT" id="x<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_DT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DT" id="o<?= $Grid->RowIndex ?>_DT" value="<?= HtmlEncode($Grid->DT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Customername->Visible) { // Customername ?>
        <td data-name="Customername">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Customername" class="form-group pharmacy_grn_Customername">
<input type="<?= $Grid->Customername->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Customername" name="x<?= $Grid->RowIndex ?>_Customername" id="x<?= $Grid->RowIndex ?>_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Customername->getPlaceHolder()) ?>" value="<?= $Grid->Customername->EditValue ?>"<?= $Grid->Customername->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Customername->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Customername" class="form-group pharmacy_grn_Customername">
<span<?= $Grid->Customername->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Customername->getDisplayValue($Grid->Customername->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Customername" id="x<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Customername" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Customername" id="o<?= $Grid->RowIndex ?>_Customername" value="<?= HtmlEncode($Grid->Customername->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->State->Visible) { // State ?>
        <td data-name="State">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_State" class="form-group pharmacy_grn_State">
<input type="<?= $Grid->State->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_State" name="x<?= $Grid->RowIndex ?>_State" id="x<?= $Grid->RowIndex ?>_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->State->getPlaceHolder()) ?>" value="<?= $Grid->State->EditValue ?>"<?= $Grid->State->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->State->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_State" class="form-group pharmacy_grn_State">
<span<?= $Grid->State->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->State->getDisplayValue($Grid->State->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" data-hidden="1" name="x<?= $Grid->RowIndex ?>_State" id="x<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_State" data-hidden="1" name="o<?= $Grid->RowIndex ?>_State" id="o<?= $Grid->RowIndex ?>_State" value="<?= HtmlEncode($Grid->State->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Pincode" class="form-group pharmacy_grn_Pincode">
<input type="<?= $Grid->Pincode->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Pincode" name="x<?= $Grid->RowIndex ?>_Pincode" id="x<?= $Grid->RowIndex ?>_Pincode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pincode->getPlaceHolder()) ?>" value="<?= $Grid->Pincode->EditValue ?>"<?= $Grid->Pincode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pincode->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pincode" class="form-group pharmacy_grn_Pincode">
<span<?= $Grid->Pincode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pincode->getDisplayValue($Grid->Pincode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Pincode" id="x<?= $Grid->RowIndex ?>_Pincode" value="<?= HtmlEncode($Grid->Pincode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pincode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pincode" id="o<?= $Grid->RowIndex ?>_Pincode" value="<?= HtmlEncode($Grid->Pincode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Phone->Visible) { // Phone ?>
        <td data-name="Phone">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_Phone" class="form-group pharmacy_grn_Phone">
<input type="<?= $Grid->Phone->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Phone" name="x<?= $Grid->RowIndex ?>_Phone" id="x<?= $Grid->RowIndex ?>_Phone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Phone->getPlaceHolder()) ?>" value="<?= $Grid->Phone->EditValue ?>"<?= $Grid->Phone->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Phone->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Phone" class="form-group pharmacy_grn_Phone">
<span<?= $Grid->Phone->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Phone->getDisplayValue($Grid->Phone->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Phone" id="x<?= $Grid->RowIndex ?>_Phone" value="<?= HtmlEncode($Grid->Phone->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Phone" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Phone" id="o<?= $Grid->RowIndex ?>_Phone" value="<?= HtmlEncode($Grid->Phone->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BILLNO" class="form-group pharmacy_grn_BILLNO">
<input type="<?= $Grid->BILLNO->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BILLNO" name="x<?= $Grid->RowIndex ?>_BILLNO" id="x<?= $Grid->RowIndex ?>_BILLNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BILLNO->getPlaceHolder()) ?>" value="<?= $Grid->BILLNO->EditValue ?>"<?= $Grid->BILLNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLNO->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BILLNO" class="form-group pharmacy_grn_BILLNO">
<span<?= $Grid->BILLNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BILLNO->getDisplayValue($Grid->BILLNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BILLNO" id="x<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BILLNO" id="o<?= $Grid->RowIndex ?>_BILLNO" value="<?= HtmlEncode($Grid->BILLNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BILLDT" class="form-group pharmacy_grn_BILLDT">
<input type="<?= $Grid->BILLDT->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BILLDT" name="x<?= $Grid->RowIndex ?>_BILLDT" id="x<?= $Grid->RowIndex ?>_BILLDT" placeholder="<?= HtmlEncode($Grid->BILLDT->getPlaceHolder()) ?>" value="<?= $Grid->BILLDT->EditValue ?>"<?= $Grid->BILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BILLDT->getErrorMessage() ?></div>
<?php if (!$Grid->BILLDT->ReadOnly && !$Grid->BILLDT->Disabled && !isset($Grid->BILLDT->EditAttrs["readonly"]) && !isset($Grid->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_grngrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_grngrid", "x<?= $Grid->RowIndex ?>_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BILLDT" class="form-group pharmacy_grn_BILLDT">
<span<?= $Grid->BILLDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BILLDT->getDisplayValue($Grid->BILLDT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BILLDT" id="x<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BILLDT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BILLDT" id="o<?= $Grid->RowIndex ?>_BILLDT" value="<?= HtmlEncode($Grid->BILLDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillTotalValue->Visible) { // BillTotalValue ?>
        <td data-name="BillTotalValue">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BillTotalValue" class="form-group pharmacy_grn_BillTotalValue">
<input type="<?= $Grid->BillTotalValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BillTotalValue" name="x<?= $Grid->RowIndex ?>_BillTotalValue" id="x<?= $Grid->RowIndex ?>_BillTotalValue" size="30" placeholder="<?= HtmlEncode($Grid->BillTotalValue->getPlaceHolder()) ?>" value="<?= $Grid->BillTotalValue->EditValue ?>"<?= $Grid->BillTotalValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillTotalValue->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BillTotalValue" class="form-group pharmacy_grn_BillTotalValue">
<span<?= $Grid->BillTotalValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillTotalValue->getDisplayValue($Grid->BillTotalValue->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillTotalValue" id="x<?= $Grid->RowIndex ?>_BillTotalValue" value="<?= HtmlEncode($Grid->BillTotalValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillTotalValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillTotalValue" id="o<?= $Grid->RowIndex ?>_BillTotalValue" value="<?= HtmlEncode($Grid->BillTotalValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td data-name="GRNTotalValue">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GRNTotalValue" class="form-group pharmacy_grn_GRNTotalValue">
<input type="<?= $Grid->GRNTotalValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GRNTotalValue" name="x<?= $Grid->RowIndex ?>_GRNTotalValue" id="x<?= $Grid->RowIndex ?>_GRNTotalValue" size="30" placeholder="<?= HtmlEncode($Grid->GRNTotalValue->getPlaceHolder()) ?>" value="<?= $Grid->GRNTotalValue->EditValue ?>"<?= $Grid->GRNTotalValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNTotalValue->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GRNTotalValue" class="form-group pharmacy_grn_GRNTotalValue">
<span<?= $Grid->GRNTotalValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GRNTotalValue->getDisplayValue($Grid->GRNTotalValue->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GRNTotalValue" id="x<?= $Grid->RowIndex ?>_GRNTotalValue" value="<?= HtmlEncode($Grid->GRNTotalValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GRNTotalValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNTotalValue" id="o<?= $Grid->RowIndex ?>_GRNTotalValue" value="<?= HtmlEncode($Grid->GRNTotalValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillDiscount->Visible) { // BillDiscount ?>
        <td data-name="BillDiscount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_BillDiscount" class="form-group pharmacy_grn_BillDiscount">
<input type="<?= $Grid->BillDiscount->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_BillDiscount" name="x<?= $Grid->RowIndex ?>_BillDiscount" id="x<?= $Grid->RowIndex ?>_BillDiscount" size="30" placeholder="<?= HtmlEncode($Grid->BillDiscount->getPlaceHolder()) ?>" value="<?= $Grid->BillDiscount->EditValue ?>"<?= $Grid->BillDiscount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDiscount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_BillDiscount" class="form-group pharmacy_grn_BillDiscount">
<span<?= $Grid->BillDiscount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillDiscount->getDisplayValue($Grid->BillDiscount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillDiscount" id="x<?= $Grid->RowIndex ?>_BillDiscount" value="<?= HtmlEncode($Grid->BillDiscount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_BillDiscount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillDiscount" id="o<?= $Grid->RowIndex ?>_BillDiscount" value="<?= HtmlEncode($Grid->BillDiscount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GrnValue->Visible) { // GrnValue ?>
        <td data-name="GrnValue">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_GrnValue" class="form-group pharmacy_grn_GrnValue">
<input type="<?= $Grid->GrnValue->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_GrnValue" name="x<?= $Grid->RowIndex ?>_GrnValue" id="x<?= $Grid->RowIndex ?>_GrnValue" size="30" placeholder="<?= HtmlEncode($Grid->GrnValue->getPlaceHolder()) ?>" value="<?= $Grid->GrnValue->EditValue ?>"<?= $Grid->GrnValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GrnValue->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_GrnValue" class="form-group pharmacy_grn_GrnValue">
<span<?= $Grid->GrnValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GrnValue->getDisplayValue($Grid->GrnValue->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GrnValue" id="x<?= $Grid->RowIndex ?>_GrnValue" value="<?= HtmlEncode($Grid->GrnValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_GrnValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GrnValue" id="o<?= $Grid->RowIndex ?>_GrnValue" value="<?= HtmlEncode($Grid->GrnValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Pid->Visible) { // Pid ?>
        <td data-name="Pid">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Pid->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<span<?= $Grid->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pid->getDisplayValue($Grid->Pid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Pid" name="x<?= $Grid->RowIndex ?>_Pid" value="<?= HtmlEncode($Grid->Pid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<input type="<?= $Grid->Pid->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_Pid" name="x<?= $Grid->RowIndex ?>_Pid" id="x<?= $Grid->RowIndex ?>_Pid" size="30" placeholder="<?= HtmlEncode($Grid->Pid->getPlaceHolder()) ?>" value="<?= $Grid->Pid->EditValue ?>"<?= $Grid->Pid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_Pid" class="form-group pharmacy_grn_Pid">
<span<?= $Grid->Pid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pid->getDisplayValue($Grid->Pid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Pid" id="x<?= $Grid->RowIndex ?>_Pid" value="<?= HtmlEncode($Grid->Pid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_Pid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pid" id="o<?= $Grid->RowIndex ?>_Pid" value="<?= HtmlEncode($Grid->Pid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PaymentNo->Visible) { // PaymentNo ?>
        <td data-name="PaymentNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentNo" class="form-group pharmacy_grn_PaymentNo">
<input type="<?= $Grid->PaymentNo->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaymentNo" name="x<?= $Grid->RowIndex ?>_PaymentNo" id="x<?= $Grid->RowIndex ?>_PaymentNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentNo->getPlaceHolder()) ?>" value="<?= $Grid->PaymentNo->EditValue ?>"<?= $Grid->PaymentNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentNo" class="form-group pharmacy_grn_PaymentNo">
<span<?= $Grid->PaymentNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PaymentNo->getDisplayValue($Grid->PaymentNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PaymentNo" id="x<?= $Grid->RowIndex ?>_PaymentNo" value="<?= HtmlEncode($Grid->PaymentNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaymentNo" id="o<?= $Grid->RowIndex ?>_PaymentNo" value="<?= HtmlEncode($Grid->PaymentNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentStatus" class="form-group pharmacy_grn_PaymentStatus">
<input type="<?= $Grid->PaymentStatus->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaymentStatus" name="x<?= $Grid->RowIndex ?>_PaymentStatus" id="x<?= $Grid->RowIndex ?>_PaymentStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PaymentStatus->getPlaceHolder()) ?>" value="<?= $Grid->PaymentStatus->EditValue ?>"<?= $Grid->PaymentStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaymentStatus->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaymentStatus" class="form-group pharmacy_grn_PaymentStatus">
<span<?= $Grid->PaymentStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PaymentStatus->getDisplayValue($Grid->PaymentStatus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PaymentStatus" id="x<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaymentStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaymentStatus" id="o<?= $Grid->RowIndex ?>_PaymentStatus" value="<?= HtmlEncode($Grid->PaymentStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_grn_PaidAmount" class="form-group pharmacy_grn_PaidAmount">
<input type="<?= $Grid->PaidAmount->getInputTextType() ?>" data-table="pharmacy_grn" data-field="x_PaidAmount" name="x<?= $Grid->RowIndex ?>_PaidAmount" id="x<?= $Grid->RowIndex ?>_PaidAmount" size="30" placeholder="<?= HtmlEncode($Grid->PaidAmount->getPlaceHolder()) ?>" value="<?= $Grid->PaidAmount->EditValue ?>"<?= $Grid->PaidAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PaidAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_grn_PaidAmount" class="form-group pharmacy_grn_PaidAmount">
<span<?= $Grid->PaidAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PaidAmount->getDisplayValue($Grid->PaidAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PaidAmount" id="x<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_grn" data-field="x_PaidAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PaidAmount" id="o<?= $Grid->RowIndex ?>_PaidAmount" value="<?= HtmlEncode($Grid->PaidAmount->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_grngrid","load"], function() {
    fpharmacy_grngrid.updateLists(<?= $Grid->RowIndex ?>);
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
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" class="<?= $Grid->id->footerCellClass() ?>"><span id="elf_pharmacy_grn_id" class="pharmacy_grn_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->GRNNO->Visible) { // GRNNO ?>
        <td data-name="GRNNO" class="<?= $Grid->GRNNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNNO" class="pharmacy_grn_GRNNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DT->Visible) { // DT ?>
        <td data-name="DT" class="<?= $Grid->DT->footerCellClass() ?>"><span id="elf_pharmacy_grn_DT" class="pharmacy_grn_DT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Customername->Visible) { // Customername ?>
        <td data-name="Customername" class="<?= $Grid->Customername->footerCellClass() ?>"><span id="elf_pharmacy_grn_Customername" class="pharmacy_grn_Customername">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->State->Visible) { // State ?>
        <td data-name="State" class="<?= $Grid->State->footerCellClass() ?>"><span id="elf_pharmacy_grn_State" class="pharmacy_grn_State">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Pincode->Visible) { // Pincode ?>
        <td data-name="Pincode" class="<?= $Grid->Pincode->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pincode" class="pharmacy_grn_Pincode">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Phone->Visible) { // Phone ?>
        <td data-name="Phone" class="<?= $Grid->Phone->footerCellClass() ?>"><span id="elf_pharmacy_grn_Phone" class="pharmacy_grn_Phone">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" class="<?= $Grid->BILLNO->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLNO" class="pharmacy_grn_BILLNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BILLDT->Visible) { // BILLDT ?>
        <td data-name="BILLDT" class="<?= $Grid->BILLDT->footerCellClass() ?>"><span id="elf_pharmacy_grn_BILLDT" class="pharmacy_grn_BILLDT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BillTotalValue->Visible) { // BillTotalValue ?>
        <td data-name="BillTotalValue" class="<?= $Grid->BillTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillTotalValue" class="pharmacy_grn_BillTotalValue">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->BillTotalValue->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->GRNTotalValue->Visible) { // GRNTotalValue ?>
        <td data-name="GRNTotalValue" class="<?= $Grid->GRNTotalValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GRNTotalValue" class="pharmacy_grn_GRNTotalValue">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->GRNTotalValue->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->BillDiscount->Visible) { // BillDiscount ?>
        <td data-name="BillDiscount" class="<?= $Grid->BillDiscount->footerCellClass() ?>"><span id="elf_pharmacy_grn_BillDiscount" class="pharmacy_grn_BillDiscount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->BillDiscount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->GrnValue->Visible) { // GrnValue ?>
        <td data-name="GrnValue" class="<?= $Grid->GrnValue->footerCellClass() ?>"><span id="elf_pharmacy_grn_GrnValue" class="pharmacy_grn_GrnValue">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Pid->Visible) { // Pid ?>
        <td data-name="Pid" class="<?= $Grid->Pid->footerCellClass() ?>"><span id="elf_pharmacy_grn_Pid" class="pharmacy_grn_Pid">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PaymentNo->Visible) { // PaymentNo ?>
        <td data-name="PaymentNo" class="<?= $Grid->PaymentNo->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentNo" class="pharmacy_grn_PaymentNo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PaymentStatus->Visible) { // PaymentStatus ?>
        <td data-name="PaymentStatus" class="<?= $Grid->PaymentStatus->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaymentStatus" class="pharmacy_grn_PaymentStatus">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PaidAmount->Visible) { // PaidAmount ?>
        <td data-name="PaidAmount" class="<?= $Grid->PaidAmount->footerCellClass() ?>"><span id="elf_pharmacy_grn_PaidAmount" class="pharmacy_grn_PaidAmount">
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
<input type="hidden" name="detailpage" value="fpharmacy_grngrid">
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
    ew.addEventHandlers("pharmacy_grn");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");

    // Write your table-specific startup script here
    // document.write("page loaded");

    // Write your table-specific startup script here
    // document.write("page loaded");
    </script>
    <style>
    .input-group>.form-control.ew-lookup-text {
    	width: 35em;
    }
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: nowrap;
    	align-items: stretch;
    	width: 100%;
    }
    .ew-grid .ew-table, .ew-grid .ew-grid-middle-panel {
    	border: 0;
    	padding: 0;
    	margin-bottom: 0;
    	overflow-x: scroll;
    }
    </style>
    <script>
    $("[data-name='Quantity']").hide();
    $("[data-name='BillDate']").hide();
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_pharmacy_grn",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

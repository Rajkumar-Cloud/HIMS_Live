<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PharmacyPurchaseorderGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchaseordergrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpharmacy_purchaseordergrid = new ew.Form("fpharmacy_purchaseordergrid", "grid");
    fpharmacy_purchaseordergrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_purchaseorder")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_purchaseorder)
        ew.vars.tables.pharmacy_purchaseorder = currentTable;
    fpharmacy_purchaseordergrid.addFields([
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["QTY", [fields.QTY.visible && fields.QTY.required ? ew.Validators.required(fields.QTY.caption) : null, ew.Validators.float], fields.QTY.isInvalid],
        ["Stock", [fields.Stock.visible && fields.Stock.required ? ew.Validators.required(fields.Stock.caption) : null, ew.Validators.float], fields.Stock.isInvalid],
        ["LastMonthSale", [fields.LastMonthSale.visible && fields.LastMonthSale.required ? ew.Validators.required(fields.LastMonthSale.caption) : null, ew.Validators.float], fields.LastMonthSale.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.visible && fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid],
        ["BillDate", [fields.BillDate.visible && fields.BillDate.required ? ew.Validators.required(fields.BillDate.caption) : null, ew.Validators.datetime(0)], fields.BillDate.isInvalid],
        ["CurStock", [fields.CurStock.visible && fields.CurStock.required ? ew.Validators.required(fields.CurStock.caption) : null, ew.Validators.integer], fields.CurStock.isInvalid],
        ["grndate", [fields.grndate.visible && fields.grndate.required ? ew.Validators.required(fields.grndate.caption) : null], fields.grndate.isInvalid],
        ["grndatetime", [fields.grndatetime.visible && fields.grndatetime.required ? ew.Validators.required(fields.grndatetime.caption) : null], fields.grndatetime.isInvalid],
        ["strid", [fields.strid.visible && fields.strid.required ? ew.Validators.required(fields.strid.caption) : null, ew.Validators.integer], fields.strid.isInvalid],
        ["GRNPer", [fields.GRNPer.visible && fields.GRNPer.required ? ew.Validators.required(fields.GRNPer.caption) : null, ew.Validators.float], fields.GRNPer.isInvalid],
        ["FreeQtyyy", [fields.FreeQtyyy.visible && fields.FreeQtyyy.required ? ew.Validators.required(fields.FreeQtyyy.caption) : null, ew.Validators.integer], fields.FreeQtyyy.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_purchaseordergrid,
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
    fpharmacy_purchaseordergrid.validate = function () {
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
    fpharmacy_purchaseordergrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "QTY", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Stock", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LastMonthSale", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CurStock", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "strid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GRNPer", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FreeQtyyy", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_purchaseordergrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_purchaseordergrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_purchaseordergrid.lists.PRC = <?= $Grid->PRC->toClientList($Grid) ?>;
    loadjs.done("fpharmacy_purchaseordergrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchaseorder">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_purchaseordergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_purchaseorder" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_purchaseordergrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Grid->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_PRC" class="pharmacy_purchaseorder_PRC"><?= $Grid->renderSort($Grid->PRC) ?></div></th>
<?php } ?>
<?php if ($Grid->QTY->Visible) { // QTY ?>
        <th data-name="QTY" class="<?= $Grid->QTY->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_QTY" class="pharmacy_purchaseorder_QTY"><?= $Grid->renderSort($Grid->QTY) ?></div></th>
<?php } ?>
<?php if ($Grid->Stock->Visible) { // Stock ?>
        <th data-name="Stock" class="<?= $Grid->Stock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_Stock" class="pharmacy_purchaseorder_Stock"><?= $Grid->renderSort($Grid->Stock) ?></div></th>
<?php } ?>
<?php if ($Grid->LastMonthSale->Visible) { // LastMonthSale ?>
        <th data-name="LastMonthSale" class="<?= $Grid->LastMonthSale->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_LastMonthSale" class="pharmacy_purchaseorder_LastMonthSale"><?= $Grid->renderSort($Grid->LastMonthSale) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_HospID" class="pharmacy_purchaseorder_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Grid->CreatedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedBy" class="pharmacy_purchaseorder_CreatedBy"><?= $Grid->renderSort($Grid->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Grid->CreatedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CreatedDateTime" class="pharmacy_purchaseorder_CreatedDateTime"><?= $Grid->renderSort($Grid->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Grid->ModifiedBy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedBy" class="pharmacy_purchaseorder_ModifiedBy"><?= $Grid->renderSort($Grid->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Grid->ModifiedDateTime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_ModifiedDateTime" class="pharmacy_purchaseorder_ModifiedDateTime"><?= $Grid->renderSort($Grid->ModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Grid->BillDate->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_BillDate" class="pharmacy_purchaseorder_BillDate"><?= $Grid->renderSort($Grid->BillDate) ?></div></th>
<?php } ?>
<?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <th data-name="CurStock" class="<?= $Grid->CurStock->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_CurStock" class="pharmacy_purchaseorder_CurStock"><?= $Grid->renderSort($Grid->CurStock) ?></div></th>
<?php } ?>
<?php if ($Grid->grndate->Visible) { // grndate ?>
        <th data-name="grndate" class="<?= $Grid->grndate->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_grndate" class="pharmacy_purchaseorder_grndate"><?= $Grid->renderSort($Grid->grndate) ?></div></th>
<?php } ?>
<?php if ($Grid->grndatetime->Visible) { // grndatetime ?>
        <th data-name="grndatetime" class="<?= $Grid->grndatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_grndatetime" class="pharmacy_purchaseorder_grndatetime"><?= $Grid->renderSort($Grid->grndatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->strid->Visible) { // strid ?>
        <th data-name="strid" class="<?= $Grid->strid->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_strid" class="pharmacy_purchaseorder_strid"><?= $Grid->renderSort($Grid->strid) ?></div></th>
<?php } ?>
<?php if ($Grid->GRNPer->Visible) { // GRNPer ?>
        <th data-name="GRNPer" class="<?= $Grid->GRNPer->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_GRNPer" class="pharmacy_purchaseorder_GRNPer"><?= $Grid->renderSort($Grid->GRNPer) ?></div></th>
<?php } ?>
<?php if ($Grid->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <th data-name="FreeQtyyy" class="<?= $Grid->FreeQtyyy->headerCellClass() ?>"><div id="elh_pharmacy_purchaseorder_FreeQtyyy" class="pharmacy_purchaseorder_FreeQtyyy"><?= $Grid->renderSort($Grid->FreeQtyyy) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_pharmacy_purchaseorder", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Grid->PRC->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_PRC" class="form-group">
<?php
$onchange = $Grid->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PRC" class="ew-auto-suggest">
    <input type="<?= $Grid->PRC->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PRC" id="sv_x<?= $Grid->RowIndex ?>_PRC" value="<?= RemoveHtml($Grid->PRC->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>"<?= $Grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-input="sv_x<?= $Grid->RowIndex ?>_PRC" data-value-separator="<?= $Grid->PRC->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid"], function() {
    fpharmacy_purchaseordergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PRC","forceSelect":true}, ew.vars.tables.pharmacy_purchaseorder.fields.PRC.autoSuggestOptions));
});
</script>
<?= $Grid->PRC->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PRC") ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_PRC" class="form-group">
<?php
$onchange = $Grid->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PRC" class="ew-auto-suggest">
    <input type="<?= $Grid->PRC->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PRC" id="sv_x<?= $Grid->RowIndex ?>_PRC" value="<?= RemoveHtml($Grid->PRC->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>"<?= $Grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-input="sv_x<?= $Grid->RowIndex ?>_PRC" data-value-separator="<?= $Grid->PRC->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid"], function() {
    fpharmacy_purchaseordergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PRC","forceSelect":true}, ew.vars.tables.pharmacy_purchaseorder.fields.PRC.autoSuggestOptions));
});
</script>
<?= $Grid->PRC->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PRC") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<?= $Grid->PRC->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_PRC" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_PRC" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->QTY->Visible) { // QTY ?>
        <td data-name="QTY" <?= $Grid->QTY->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_QTY" class="form-group">
<input type="<?= $Grid->QTY->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?= $Grid->RowIndex ?>_QTY" id="x<?= $Grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->QTY->getPlaceHolder()) ?>" value="<?= $Grid->QTY->EditValue ?>"<?= $Grid->QTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QTY->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" data-hidden="1" name="o<?= $Grid->RowIndex ?>_QTY" id="o<?= $Grid->RowIndex ?>_QTY" value="<?= HtmlEncode($Grid->QTY->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_QTY" class="form-group">
<input type="<?= $Grid->QTY->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?= $Grid->RowIndex ?>_QTY" id="x<?= $Grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->QTY->getPlaceHolder()) ?>" value="<?= $Grid->QTY->EditValue ?>"<?= $Grid->QTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QTY->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_QTY">
<span<?= $Grid->QTY->viewAttributes() ?>>
<?= $Grid->QTY->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_QTY" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_QTY" value="<?= HtmlEncode($Grid->QTY->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_QTY" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_QTY" value="<?= HtmlEncode($Grid->QTY->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Stock->Visible) { // Stock ?>
        <td data-name="Stock" <?= $Grid->Stock->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_Stock" class="form-group">
<input type="<?= $Grid->Stock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?= $Grid->RowIndex ?>_Stock" id="x<?= $Grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->Stock->getPlaceHolder()) ?>" value="<?= $Grid->Stock->EditValue ?>"<?= $Grid->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Stock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Stock" id="o<?= $Grid->RowIndex ?>_Stock" value="<?= HtmlEncode($Grid->Stock->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_Stock" class="form-group">
<input type="<?= $Grid->Stock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?= $Grid->RowIndex ?>_Stock" id="x<?= $Grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->Stock->getPlaceHolder()) ?>" value="<?= $Grid->Stock->EditValue ?>"<?= $Grid->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Stock->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_Stock">
<span<?= $Grid->Stock->viewAttributes() ?>>
<?= $Grid->Stock->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_Stock" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_Stock" value="<?= HtmlEncode($Grid->Stock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_Stock" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_Stock" value="<?= HtmlEncode($Grid->Stock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale" <?= $Grid->LastMonthSale->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group">
<input type="<?= $Grid->LastMonthSale->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?= $Grid->RowIndex ?>_LastMonthSale" id="x<?= $Grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>" value="<?= $Grid->LastMonthSale->EditValue ?>"<?= $Grid->LastMonthSale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LastMonthSale->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LastMonthSale" id="o<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_LastMonthSale" class="form-group">
<input type="<?= $Grid->LastMonthSale->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?= $Grid->RowIndex ?>_LastMonthSale" id="x<?= $Grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>" value="<?= $Grid->LastMonthSale->EditValue ?>"<?= $Grid->LastMonthSale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LastMonthSale->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_LastMonthSale">
<span<?= $Grid->LastMonthSale->viewAttributes() ?>>
<?= $Grid->LastMonthSale->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_LastMonthSale" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_LastMonthSale" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_HospID" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_HospID" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Grid->CreatedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreatedBy" id="o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_CreatedBy">
<span<?= $Grid->CreatedBy->viewAttributes() ?>>
<?= $Grid->CreatedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_CreatedBy" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_CreatedBy" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Grid->CreatedDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreatedDateTime" id="o<?= $Grid->RowIndex ?>_CreatedDateTime" value="<?= HtmlEncode($Grid->CreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_CreatedDateTime">
<span<?= $Grid->CreatedDateTime->viewAttributes() ?>>
<?= $Grid->CreatedDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_CreatedDateTime" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_CreatedDateTime" value="<?= HtmlEncode($Grid->CreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_CreatedDateTime" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_CreatedDateTime" value="<?= HtmlEncode($Grid->CreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Grid->ModifiedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedBy" id="o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_ModifiedBy">
<span<?= $Grid->ModifiedBy->viewAttributes() ?>>
<?= $Grid->ModifiedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_ModifiedBy" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_ModifiedBy" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Grid->ModifiedDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedDateTime" id="o<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_ModifiedDateTime">
<span<?= $Grid->ModifiedDateTime->viewAttributes() ?>>
<?= $Grid->ModifiedDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_ModifiedDateTime" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_ModifiedDateTime" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Grid->BillDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_BillDate" class="form-group">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillDate" id="o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_BillDate" class="form-group">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_BillDate">
<span<?= $Grid->BillDate->viewAttributes() ?>>
<?= $Grid->BillDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_BillDate" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_BillDate" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock" <?= $Grid->CurStock->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_CurStock" class="form-group">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CurStock" id="o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_CurStock" class="form-group">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_CurStock">
<span<?= $Grid->CurStock->viewAttributes() ?>>
<?= $Grid->CurStock->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_CurStock" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_CurStock" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grndate->Visible) { // grndate ?>
        <td data-name="grndate" <?= $Grid->grndate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grndate" id="o<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_grndate">
<span<?= $Grid->grndate->viewAttributes() ?>>
<?= $Grid->grndate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_grndate" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_grndate" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime" <?= $Grid->grndatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grndatetime" id="o<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_grndatetime">
<span<?= $Grid->grndatetime->viewAttributes() ?>>
<?= $Grid->grndatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_grndatetime" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_grndatetime" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->strid->Visible) { // strid ?>
        <td data-name="strid" <?= $Grid->strid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_strid" class="form-group">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_strid" id="o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_strid" class="form-group">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_strid">
<span<?= $Grid->strid->viewAttributes() ?>>
<?= $Grid->strid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_strid" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_strid" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GRNPer->Visible) { // GRNPer ?>
        <td data-name="GRNPer" <?= $Grid->GRNPer->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_GRNPer" class="form-group">
<input type="<?= $Grid->GRNPer->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?= $Grid->RowIndex ?>_GRNPer" id="x<?= $Grid->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Grid->GRNPer->getPlaceHolder()) ?>" value="<?= $Grid->GRNPer->EditValue ?>"<?= $Grid->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNPer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNPer" id="o<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_GRNPer" class="form-group">
<input type="<?= $Grid->GRNPer->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?= $Grid->RowIndex ?>_GRNPer" id="x<?= $Grid->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Grid->GRNPer->getPlaceHolder()) ?>" value="<?= $Grid->GRNPer->EditValue ?>"<?= $Grid->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNPer->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_GRNPer">
<span<?= $Grid->GRNPer->viewAttributes() ?>>
<?= $Grid->GRNPer->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_GRNPer" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_GRNPer" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy" <?= $Grid->FreeQtyyy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_FreeQtyyy" class="form-group">
<input type="<?= $Grid->FreeQtyyy->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?= $Grid->RowIndex ?>_FreeQtyyy" id="x<?= $Grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Grid->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Grid->FreeQtyyy->EditValue ?>"<?= $Grid->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQtyyy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FreeQtyyy" id="o<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_FreeQtyyy" class="form-group">
<input type="<?= $Grid->FreeQtyyy->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?= $Grid->RowIndex ?>_FreeQtyyy" id="x<?= $Grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Grid->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Grid->FreeQtyyy->EditValue ?>"<?= $Grid->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQtyyy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchaseorder_FreeQtyyy">
<span<?= $Grid->FreeQtyyy->viewAttributes() ?>>
<?= $Grid->FreeQtyyy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" data-hidden="1" name="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_FreeQtyyy" id="fpharmacy_purchaseordergrid$x<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" data-hidden="1" name="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_FreeQtyyy" id="fpharmacy_purchaseordergrid$o<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->OldValue) ?>">
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
loadjs.ready(["fpharmacy_purchaseordergrid","load"], function () {
    fpharmacy_purchaseordergrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_pharmacy_purchaseorder", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<?php
$onchange = $Grid->PRC->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PRC->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PRC" class="ew-auto-suggest">
    <input type="<?= $Grid->PRC->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PRC" id="sv_x<?= $Grid->RowIndex ?>_PRC" value="<?= RemoveHtml($Grid->PRC->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>"<?= $Grid->PRC->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-input="sv_x<?= $Grid->RowIndex ?>_PRC" data-value-separator="<?= $Grid->PRC->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid"], function() {
    fpharmacy_purchaseordergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PRC","forceSelect":true}, ew.vars.tables.pharmacy_purchaseorder.fields.PRC.autoSuggestOptions));
});
</script>
<?= $Grid->PRC->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PRC") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_PRC" class="form-group pharmacy_purchaseorder_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PRC->getDisplayValue($Grid->PRC->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->QTY->Visible) { // QTY ?>
        <td data-name="QTY">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<input type="<?= $Grid->QTY->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_QTY" name="x<?= $Grid->RowIndex ?>_QTY" id="x<?= $Grid->RowIndex ?>_QTY" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->QTY->getPlaceHolder()) ?>" value="<?= $Grid->QTY->EditValue ?>"<?= $Grid->QTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->QTY->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_QTY" class="form-group pharmacy_purchaseorder_QTY">
<span<?= $Grid->QTY->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->QTY->getDisplayValue($Grid->QTY->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" data-hidden="1" name="x<?= $Grid->RowIndex ?>_QTY" id="x<?= $Grid->RowIndex ?>_QTY" value="<?= HtmlEncode($Grid->QTY->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_QTY" data-hidden="1" name="o<?= $Grid->RowIndex ?>_QTY" id="o<?= $Grid->RowIndex ?>_QTY" value="<?= HtmlEncode($Grid->QTY->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Stock->Visible) { // Stock ?>
        <td data-name="Stock">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<input type="<?= $Grid->Stock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_Stock" name="x<?= $Grid->RowIndex ?>_Stock" id="x<?= $Grid->RowIndex ?>_Stock" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->Stock->getPlaceHolder()) ?>" value="<?= $Grid->Stock->EditValue ?>"<?= $Grid->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Stock->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_Stock" class="form-group pharmacy_purchaseorder_Stock">
<span<?= $Grid->Stock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Stock->getDisplayValue($Grid->Stock->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Stock" id="x<?= $Grid->RowIndex ?>_Stock" value="<?= HtmlEncode($Grid->Stock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_Stock" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Stock" id="o<?= $Grid->RowIndex ?>_Stock" value="<?= HtmlEncode($Grid->Stock->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<input type="<?= $Grid->LastMonthSale->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" name="x<?= $Grid->RowIndex ?>_LastMonthSale" id="x<?= $Grid->RowIndex ?>_LastMonthSale" size="4" maxlength="6" placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>" value="<?= $Grid->LastMonthSale->EditValue ?>"<?= $Grid->LastMonthSale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->LastMonthSale->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_LastMonthSale" class="form-group pharmacy_purchaseorder_LastMonthSale">
<span<?= $Grid->LastMonthSale->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->LastMonthSale->getDisplayValue($Grid->LastMonthSale->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" data-hidden="1" name="x<?= $Grid->RowIndex ?>_LastMonthSale" id="x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_LastMonthSale" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LastMonthSale" id="o<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_HospID" class="form-group pharmacy_purchaseorder_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CreatedBy" class="form-group pharmacy_purchaseorder_CreatedBy">
<span<?= $Grid->CreatedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CreatedBy->getDisplayValue($Grid->CreatedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CreatedBy" id="x<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreatedBy" id="o<?= $Grid->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Grid->CreatedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CreatedDateTime" class="form-group pharmacy_purchaseorder_CreatedDateTime">
<span<?= $Grid->CreatedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CreatedDateTime->getDisplayValue($Grid->CreatedDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CreatedDateTime" id="x<?= $Grid->RowIndex ?>_CreatedDateTime" value="<?= HtmlEncode($Grid->CreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CreatedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CreatedDateTime" id="o<?= $Grid->RowIndex ?>_CreatedDateTime" value="<?= HtmlEncode($Grid->CreatedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_ModifiedBy" class="form-group pharmacy_purchaseorder_ModifiedBy">
<span<?= $Grid->ModifiedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModifiedBy->getDisplayValue($Grid->ModifiedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModifiedBy" id="x<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedBy" id="o<?= $Grid->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Grid->ModifiedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_ModifiedDateTime" class="form-group pharmacy_purchaseorder_ModifiedDateTime">
<span<?= $Grid->ModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModifiedDateTime->getDisplayValue($Grid->ModifiedDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModifiedDateTime" id="x<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModifiedDateTime" id="o<?= $Grid->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Grid->ModifiedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_purchaseordergrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_BillDate" class="form-group pharmacy_purchaseorder_BillDate">
<span<?= $Grid->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillDate->getDisplayValue($Grid->BillDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_BillDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillDate" id="o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_CurStock" class="form-group pharmacy_purchaseorder_CurStock">
<span<?= $Grid->CurStock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CurStock->getDisplayValue($Grid->CurStock->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_CurStock" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CurStock" id="o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grndate->Visible) { // grndate ?>
        <td data-name="grndate">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_grndate" class="form-group pharmacy_purchaseorder_grndate">
<span<?= $Grid->grndate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grndate->getDisplayValue($Grid->grndate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grndate" id="x<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grndate" id="o<?= $Grid->RowIndex ?>_grndate" value="<?= HtmlEncode($Grid->grndate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grndatetime->Visible) { // grndatetime ?>
        <td data-name="grndatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_grndatetime" class="form-group pharmacy_purchaseorder_grndatetime">
<span<?= $Grid->grndatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grndatetime->getDisplayValue($Grid->grndatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grndatetime" id="x<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_grndatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grndatetime" id="o<?= $Grid->RowIndex ?>_grndatetime" value="<?= HtmlEncode($Grid->grndatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->strid->Visible) { // strid ?>
        <td data-name="strid">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_strid" class="form-group pharmacy_purchaseorder_strid">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_strid" class="form-group pharmacy_purchaseorder_strid">
<span<?= $Grid->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->strid->getDisplayValue($Grid->strid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_strid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_strid" id="o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GRNPer->Visible) { // GRNPer ?>
        <td data-name="GRNPer">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_GRNPer" class="form-group pharmacy_purchaseorder_GRNPer">
<input type="<?= $Grid->GRNPer->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" name="x<?= $Grid->RowIndex ?>_GRNPer" id="x<?= $Grid->RowIndex ?>_GRNPer" size="30" placeholder="<?= HtmlEncode($Grid->GRNPer->getPlaceHolder()) ?>" value="<?= $Grid->GRNPer->EditValue ?>"<?= $Grid->GRNPer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->GRNPer->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_GRNPer" class="form-group pharmacy_purchaseorder_GRNPer">
<span<?= $Grid->GRNPer->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GRNPer->getDisplayValue($Grid->GRNPer->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GRNPer" id="x<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_GRNPer" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GRNPer" id="o<?= $Grid->RowIndex ?>_GRNPer" value="<?= HtmlEncode($Grid->GRNPer->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <td data-name="FreeQtyyy">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_FreeQtyyy" class="form-group pharmacy_purchaseorder_FreeQtyyy">
<input type="<?= $Grid->FreeQtyyy->getInputTextType() ?>" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" name="x<?= $Grid->RowIndex ?>_FreeQtyyy" id="x<?= $Grid->RowIndex ?>_FreeQtyyy" size="30" placeholder="<?= HtmlEncode($Grid->FreeQtyyy->getPlaceHolder()) ?>" value="<?= $Grid->FreeQtyyy->EditValue ?>"<?= $Grid->FreeQtyyy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FreeQtyyy->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchaseorder_FreeQtyyy" class="form-group pharmacy_purchaseorder_FreeQtyyy">
<span<?= $Grid->FreeQtyyy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FreeQtyyy->getDisplayValue($Grid->FreeQtyyy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FreeQtyyy" id="x<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchaseorder" data-field="x_FreeQtyyy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FreeQtyyy" id="o<?= $Grid->RowIndex ?>_FreeQtyyy" value="<?= HtmlEncode($Grid->FreeQtyyy->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_purchaseordergrid","load"], function() {
    fpharmacy_purchaseordergrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpharmacy_purchaseordergrid">
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
    ew.addEventHandlers("pharmacy_purchaseorder");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
    </script>
    <style>
    .input-group>.form-control.ew-lookup-text {
    	width: 35em;
    }
    </style>
    <script>
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_pharmacy_purchaseorder",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

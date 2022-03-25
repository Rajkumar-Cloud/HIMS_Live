<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewStoreTransferGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_store_transfergrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_store_transfergrid = new ew.Form("fview_store_transfergrid", "grid");
    fview_store_transfergrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_store_transfer")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_store_transfer)
        ew.vars.tables.view_store_transfer = currentTable;
    fview_store_transfergrid.addFields([
        ["ORDNO", [fields.ORDNO.visible && fields.ORDNO.required ? ew.Validators.required(fields.ORDNO.caption) : null], fields.ORDNO.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["LastMonthSale", [fields.LastMonthSale.visible && fields.LastMonthSale.required ? ew.Validators.required(fields.LastMonthSale.caption) : null, ew.Validators.integer], fields.LastMonthSale.isInvalid],
        ["BatchNo", [fields.BatchNo.visible && fields.BatchNo.required ? ew.Validators.required(fields.BatchNo.caption) : null], fields.BatchNo.isInvalid],
        ["ExpDate", [fields.ExpDate.visible && fields.ExpDate.required ? ew.Validators.required(fields.ExpDate.caption) : null, ew.Validators.datetime(0)], fields.ExpDate.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["ItemValue", [fields.ItemValue.visible && fields.ItemValue.required ? ew.Validators.required(fields.ItemValue.caption) : null, ew.Validators.float], fields.ItemValue.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null, ew.Validators.integer], fields.BRCODE.isInvalid],
        ["strid", [fields.strid.visible && fields.strid.required ? ew.Validators.required(fields.strid.caption) : null, ew.Validators.integer], fields.strid.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["grncreatedby", [fields.grncreatedby.visible && fields.grncreatedby.required ? ew.Validators.required(fields.grncreatedby.caption) : null], fields.grncreatedby.isInvalid],
        ["grncreatedDateTime", [fields.grncreatedDateTime.visible && fields.grncreatedDateTime.required ? ew.Validators.required(fields.grncreatedDateTime.caption) : null], fields.grncreatedDateTime.isInvalid],
        ["grnModifiedby", [fields.grnModifiedby.visible && fields.grnModifiedby.required ? ew.Validators.required(fields.grnModifiedby.caption) : null], fields.grnModifiedby.isInvalid],
        ["grnModifiedDateTime", [fields.grnModifiedDateTime.visible && fields.grnModifiedDateTime.required ? ew.Validators.required(fields.grnModifiedDateTime.caption) : null], fields.grnModifiedDateTime.isInvalid],
        ["BillDate", [fields.BillDate.visible && fields.BillDate.required ? ew.Validators.required(fields.BillDate.caption) : null, ew.Validators.datetime(0)], fields.BillDate.isInvalid],
        ["CurStock", [fields.CurStock.visible && fields.CurStock.required ? ew.Validators.required(fields.CurStock.caption) : null, ew.Validators.integer], fields.CurStock.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_store_transfergrid,
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
    fview_store_transfergrid.validate = function () {
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
    fview_store_transfergrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LastMonthSale", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BatchNo", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ExpDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ItemValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MRP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BRCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "strid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CurStock", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_store_transfergrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_store_transfergrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_store_transfergrid.lists.ORDNO = <?= $Grid->ORDNO->toClientList($Grid) ?>;
    fview_store_transfergrid.lists.LastMonthSale = <?= $Grid->LastMonthSale->toClientList($Grid) ?>;
    fview_store_transfergrid.lists.BRCODE = <?= $Grid->BRCODE->toClientList($Grid) ?>;
    loadjs.done("fview_store_transfergrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_store_transfer">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_store_transfergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_store_transfer" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_store_transfergrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->ORDNO->Visible) { // ORDNO ?>
        <th data-name="ORDNO" class="<?= $Grid->ORDNO->headerCellClass() ?>"><div id="elh_view_store_transfer_ORDNO" class="view_store_transfer_ORDNO"><?= $Grid->renderSort($Grid->ORDNO) ?></div></th>
<?php } ?>
<?php if ($Grid->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Grid->PRC->headerCellClass() ?>"><div id="elh_view_store_transfer_PRC" class="view_store_transfer_PRC"><?= $Grid->renderSort($Grid->PRC) ?></div></th>
<?php } ?>
<?php if ($Grid->LastMonthSale->Visible) { // LastMonthSale ?>
        <th data-name="LastMonthSale" class="<?= $Grid->LastMonthSale->headerCellClass() ?>"><div id="elh_view_store_transfer_LastMonthSale" class="view_store_transfer_LastMonthSale"><?= $Grid->renderSort($Grid->LastMonthSale) ?></div></th>
<?php } ?>
<?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Grid->BatchNo->headerCellClass() ?>"><div id="elh_view_store_transfer_BatchNo" class="view_store_transfer_BatchNo"><?= $Grid->renderSort($Grid->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Grid->ExpDate->headerCellClass() ?>"><div id="elh_view_store_transfer_ExpDate" class="view_store_transfer_ExpDate"><?= $Grid->renderSort($Grid->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Grid->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Grid->PrName->headerCellClass() ?>"><div id="elh_view_store_transfer_PrName" class="view_store_transfer_PrName"><?= $Grid->renderSort($Grid->PrName) ?></div></th>
<?php } ?>
<?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Grid->Quantity->headerCellClass() ?>"><div id="elh_view_store_transfer_Quantity" class="view_store_transfer_Quantity"><?= $Grid->renderSort($Grid->Quantity) ?></div></th>
<?php } ?>
<?php if ($Grid->ItemValue->Visible) { // ItemValue ?>
        <th data-name="ItemValue" class="<?= $Grid->ItemValue->headerCellClass() ?>"><div id="elh_view_store_transfer_ItemValue" class="view_store_transfer_ItemValue"><?= $Grid->renderSort($Grid->ItemValue) ?></div></th>
<?php } ?>
<?php if ($Grid->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Grid->MRP->headerCellClass() ?>"><div id="elh_view_store_transfer_MRP" class="view_store_transfer_MRP"><?= $Grid->renderSort($Grid->MRP) ?></div></th>
<?php } ?>
<?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Grid->BRCODE->headerCellClass() ?>"><div id="elh_view_store_transfer_BRCODE" class="view_store_transfer_BRCODE"><?= $Grid->renderSort($Grid->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->strid->Visible) { // strid ?>
        <th data-name="strid" class="<?= $Grid->strid->headerCellClass() ?>"><div id="elh_view_store_transfer_strid" class="view_store_transfer_strid"><?= $Grid->renderSort($Grid->strid) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_store_transfer_HospID" class="view_store_transfer_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->grncreatedby->Visible) { // grncreatedby ?>
        <th data-name="grncreatedby" class="<?= $Grid->grncreatedby->headerCellClass() ?>"><div id="elh_view_store_transfer_grncreatedby" class="view_store_transfer_grncreatedby"><?= $Grid->renderSort($Grid->grncreatedby) ?></div></th>
<?php } ?>
<?php if ($Grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <th data-name="grncreatedDateTime" class="<?= $Grid->grncreatedDateTime->headerCellClass() ?>"><div id="elh_view_store_transfer_grncreatedDateTime" class="view_store_transfer_grncreatedDateTime"><?= $Grid->renderSort($Grid->grncreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->grnModifiedby->Visible) { // grnModifiedby ?>
        <th data-name="grnModifiedby" class="<?= $Grid->grnModifiedby->headerCellClass() ?>"><div id="elh_view_store_transfer_grnModifiedby" class="view_store_transfer_grnModifiedby"><?= $Grid->renderSort($Grid->grnModifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <th data-name="grnModifiedDateTime" class="<?= $Grid->grnModifiedDateTime->headerCellClass() ?>"><div id="elh_view_store_transfer_grnModifiedDateTime" class="view_store_transfer_grnModifiedDateTime"><?= $Grid->renderSort($Grid->grnModifiedDateTime) ?></div></th>
<?php } ?>
<?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Grid->BillDate->headerCellClass() ?>"><div id="elh_view_store_transfer_BillDate" class="view_store_transfer_BillDate"><?= $Grid->renderSort($Grid->BillDate) ?></div></th>
<?php } ?>
<?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <th data-name="CurStock" class="<?= $Grid->CurStock->headerCellClass() ?>"><div id="elh_view_store_transfer_CurStock" class="view_store_transfer_CurStock"><?= $Grid->renderSort($Grid->CurStock) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_store_transfer", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->ORDNO->Visible) { // ORDNO ?>
        <td data-name="ORDNO" <?= $Grid->ORDNO->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ORDNO" id="o<?= $Grid->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Grid->ORDNO->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_ORDNO">
<span<?= $Grid->ORDNO->viewAttributes() ?>>
<?= $Grid->ORDNO->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_ORDNO" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Grid->ORDNO->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_ORDNO" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Grid->ORDNO->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Grid->PRC->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<?= $Grid->PRC->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_PRC" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_PRC" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale" <?= $Grid->LastMonthSale->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_LastMonthSale" class="form-group">
<?php
$onchange = $Grid->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_LastMonthSale" class="ew-auto-suggest">
    <input type="<?= $Grid->LastMonthSale->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" id="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= RemoveHtml($Grid->LastMonthSale->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>"<?= $Grid->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_transfer" data-field="x_LastMonthSale" data-input="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" data-value-separator="<?= $Grid->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_LastMonthSale" id="x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->LastMonthSale->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_transfergrid"], function() {
    fview_store_transfergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_LastMonthSale","forceSelect":true}, ew.vars.tables.view_store_transfer.fields.LastMonthSale.autoSuggestOptions));
});
</script>
<?= $Grid->LastMonthSale->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_LastMonthSale") ?>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LastMonthSale" id="o<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_LastMonthSale" class="form-group">
<?php
$onchange = $Grid->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_LastMonthSale" class="ew-auto-suggest">
    <input type="<?= $Grid->LastMonthSale->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" id="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= RemoveHtml($Grid->LastMonthSale->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>"<?= $Grid->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_transfer" data-field="x_LastMonthSale" data-input="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" data-value-separator="<?= $Grid->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_LastMonthSale" id="x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->LastMonthSale->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_transfergrid"], function() {
    fview_store_transfergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_LastMonthSale","forceSelect":true}, ew.vars.tables.view_store_transfer.fields.LastMonthSale.autoSuggestOptions));
});
</script>
<?= $Grid->LastMonthSale->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_LastMonthSale") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_LastMonthSale">
<span<?= $Grid->LastMonthSale->viewAttributes() ?>>
<?= $Grid->LastMonthSale->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_LastMonthSale" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_LastMonthSale" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Grid->BatchNo->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BatchNo" class="form-group">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BatchNo" id="o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BatchNo" class="form-group">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BatchNo">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<?= $Grid->BatchNo->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_BatchNo" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_BatchNo" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Grid->ExpDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_ExpDate" class="form-group">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ExpDate" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transfergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transfergrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExpDate" id="o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_ExpDate" class="form-group">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ExpDate" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transfergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transfergrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_ExpDate">
<span<?= $Grid->ExpDate->viewAttributes() ?>>
<?= $Grid->ExpDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_ExpDate" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_ExpDate" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Grid->PrName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_PrName" class="form-group">
<input type="<?= $Grid->PrName->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PrName" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" value="<?= $Grid->PrName->EditValue ?>"<?= $Grid->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_PrName" class="form-group">
<input type="<?= $Grid->PrName->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PrName" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" value="<?= $Grid->PrName->EditValue ?>"<?= $Grid->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<?= $Grid->PrName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_PrName" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_PrName" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Grid->Quantity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<?= $Grid->Quantity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_Quantity" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_Quantity" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue" <?= $Grid->ItemValue->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_ItemValue" class="form-group">
<input type="<?= $Grid->ItemValue->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ItemValue" name="x<?= $Grid->RowIndex ?>_ItemValue" id="x<?= $Grid->RowIndex ?>_ItemValue" size="10" placeholder="<?= HtmlEncode($Grid->ItemValue->getPlaceHolder()) ?>" value="<?= $Grid->ItemValue->EditValue ?>"<?= $Grid->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemValue" id="o<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_ItemValue" class="form-group">
<input type="<?= $Grid->ItemValue->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ItemValue" name="x<?= $Grid->RowIndex ?>_ItemValue" id="x<?= $Grid->RowIndex ?>_ItemValue" size="10" placeholder="<?= HtmlEncode($Grid->ItemValue->getPlaceHolder()) ?>" value="<?= $Grid->ItemValue->EditValue ?>"<?= $Grid->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_ItemValue">
<span<?= $Grid->ItemValue->viewAttributes() ?>>
<?= $Grid->ItemValue->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_ItemValue" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_ItemValue" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Grid->MRP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_MRP" class="form-group">
<input type="<?= $Grid->MRP->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_MRP" name="x<?= $Grid->RowIndex ?>_MRP" id="x<?= $Grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->MRP->getPlaceHolder()) ?>" value="<?= $Grid->MRP->EditValue ?>"<?= $Grid->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MRP" id="o<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_MRP" class="form-group">
<input type="<?= $Grid->MRP->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_MRP" name="x<?= $Grid->RowIndex ?>_MRP" id="x<?= $Grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->MRP->getPlaceHolder()) ?>" value="<?= $Grid->MRP->EditValue ?>"<?= $Grid->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_MRP">
<span<?= $Grid->MRP->viewAttributes() ?>>
<?= $Grid->MRP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_MRP" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_MRP" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Grid->BRCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BRCODE" class="form-group">
<?php
$onchange = $Grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Grid->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_BRCODE" id="sv_x<?= $Grid->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Grid->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>"<?= $Grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_transfer" data-field="x_BRCODE" data-input="sv_x<?= $Grid->RowIndex ?>_BRCODE" data-value-separator="<?= $Grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_transfergrid"], function() {
    fview_store_transfergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_BRCODE","forceSelect":false}, ew.vars.tables.view_store_transfer.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Grid->BRCODE->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_BRCODE") ?>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BRCODE" class="form-group">
<?php
$onchange = $Grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Grid->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_BRCODE" id="sv_x<?= $Grid->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Grid->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>"<?= $Grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_transfer" data-field="x_BRCODE" data-input="sv_x<?= $Grid->RowIndex ?>_BRCODE" data-value-separator="<?= $Grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_transfergrid"], function() {
    fview_store_transfergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_BRCODE","forceSelect":false}, ew.vars.tables.view_store_transfer.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Grid->BRCODE->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_BRCODE") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<?= $Grid->BRCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_BRCODE" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_BRCODE" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->strid->Visible) { // strid ?>
        <td data-name="strid" <?= $Grid->strid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->strid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_strid" class="form-group">
<span<?= $Grid->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->strid->getDisplayValue($Grid->strid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_strid" name="x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_strid" class="form-group">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_strid" id="o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->strid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_strid" class="form-group">
<span<?= $Grid->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->strid->getDisplayValue($Grid->strid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_strid" name="x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_strid" class="form-group">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_strid">
<span<?= $Grid->strid->viewAttributes() ?>>
<?= $Grid->strid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_strid" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_strid" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby" <?= $Grid->grncreatedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grncreatedby" id="o<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_grncreatedby">
<span<?= $Grid->grncreatedby->viewAttributes() ?>>
<?= $Grid->grncreatedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_grncreatedby" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_grncreatedby" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime" <?= $Grid->grncreatedDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grncreatedDateTime" id="o<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_grncreatedDateTime">
<span<?= $Grid->grncreatedDateTime->viewAttributes() ?>>
<?= $Grid->grncreatedDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_grncreatedDateTime" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_grncreatedDateTime" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby" <?= $Grid->grnModifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grnModifiedby" id="o<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_grnModifiedby">
<span<?= $Grid->grnModifiedby->viewAttributes() ?>>
<?= $Grid->grnModifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_grnModifiedby" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_grnModifiedby" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime" <?= $Grid->grnModifiedDateTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="o<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_grnModifiedDateTime">
<span<?= $Grid->grnModifiedDateTime->viewAttributes() ?>>
<?= $Grid->grnModifiedDateTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Grid->BillDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BillDate" class="form-group">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transfergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transfergrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillDate" id="o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BillDate" class="form-group">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transfergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transfergrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_BillDate">
<span<?= $Grid->BillDate->viewAttributes() ?>>
<?= $Grid->BillDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_BillDate" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_BillDate" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock" <?= $Grid->CurStock->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_CurStock" class="form-group">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CurStock" id="o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_CurStock" class="form-group">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_store_transfer_CurStock">
<span<?= $Grid->CurStock->viewAttributes() ?>>
<?= $Grid->CurStock->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" data-hidden="1" name="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_CurStock" id="fview_store_transfergrid$x<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->FormValue) ?>">
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" data-hidden="1" name="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_CurStock" id="fview_store_transfergrid$o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
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
loadjs.ready(["fview_store_transfergrid","load"], function () {
    fview_store_transfergrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_store_transfer", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->ORDNO->Visible) { // ORDNO ?>
        <td data-name="ORDNO">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_ORDNO" class="form-group view_store_transfer_ORDNO">
<span<?= $Grid->ORDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ORDNO->getDisplayValue($Grid->ORDNO->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ORDNO" id="x<?= $Grid->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Grid->ORDNO->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ORDNO" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ORDNO" id="o<?= $Grid->RowIndex ?>_ORDNO" value="<?= HtmlEncode($Grid->ORDNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_PRC" class="form-group view_store_transfer_PRC">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_PRC" class="form-group view_store_transfer_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PRC->getDisplayValue($Grid->PRC->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->LastMonthSale->Visible) { // LastMonthSale ?>
        <td data-name="LastMonthSale">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_LastMonthSale" class="form-group view_store_transfer_LastMonthSale">
<?php
$onchange = $Grid->LastMonthSale->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->LastMonthSale->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_LastMonthSale" class="ew-auto-suggest">
    <input type="<?= $Grid->LastMonthSale->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" id="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= RemoveHtml($Grid->LastMonthSale->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->LastMonthSale->getPlaceHolder()) ?>"<?= $Grid->LastMonthSale->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_transfer" data-field="x_LastMonthSale" data-input="sv_x<?= $Grid->RowIndex ?>_LastMonthSale" data-value-separator="<?= $Grid->LastMonthSale->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_LastMonthSale" id="x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->LastMonthSale->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_transfergrid"], function() {
    fview_store_transfergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_LastMonthSale","forceSelect":true}, ew.vars.tables.view_store_transfer.fields.LastMonthSale.autoSuggestOptions));
});
</script>
<?= $Grid->LastMonthSale->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_LastMonthSale") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_LastMonthSale" class="form-group view_store_transfer_LastMonthSale">
<span<?= $Grid->LastMonthSale->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->LastMonthSale->getDisplayValue($Grid->LastMonthSale->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-hidden="1" name="x<?= $Grid->RowIndex ?>_LastMonthSale" id="x<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_LastMonthSale" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LastMonthSale" id="o<?= $Grid->RowIndex ?>_LastMonthSale" value="<?= HtmlEncode($Grid->LastMonthSale->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_BatchNo" class="form-group view_store_transfer_BatchNo">
<input type="<?= $Grid->BatchNo->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_BatchNo" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BatchNo->getPlaceHolder()) ?>" value="<?= $Grid->BatchNo->EditValue ?>"<?= $Grid->BatchNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BatchNo->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_BatchNo" class="form-group view_store_transfer_BatchNo">
<span<?= $Grid->BatchNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BatchNo->getDisplayValue($Grid->BatchNo->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BatchNo" id="x<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BatchNo" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BatchNo" id="o<?= $Grid->RowIndex ?>_BatchNo" value="<?= HtmlEncode($Grid->BatchNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_ExpDate" class="form-group view_store_transfer_ExpDate">
<input type="<?= $Grid->ExpDate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ExpDate" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" size="12" maxlength="12" placeholder="<?= HtmlEncode($Grid->ExpDate->getPlaceHolder()) ?>" value="<?= $Grid->ExpDate->EditValue ?>"<?= $Grid->ExpDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ExpDate->getErrorMessage() ?></div>
<?php if (!$Grid->ExpDate->ReadOnly && !$Grid->ExpDate->Disabled && !isset($Grid->ExpDate->EditAttrs["readonly"]) && !isset($Grid->ExpDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transfergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transfergrid", "x<?= $Grid->RowIndex ?>_ExpDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_ExpDate" class="form-group view_store_transfer_ExpDate">
<span<?= $Grid->ExpDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ExpDate->getDisplayValue($Grid->ExpDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ExpDate" id="x<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ExpDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ExpDate" id="o<?= $Grid->RowIndex ?>_ExpDate" value="<?= HtmlEncode($Grid->ExpDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_PrName" class="form-group view_store_transfer_PrName">
<input type="<?= $Grid->PrName->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_PrName" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" value="<?= $Grid->PrName->EditValue ?>"<?= $Grid->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_PrName" class="form-group view_store_transfer_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrName->getDisplayValue($Grid->PrName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_Quantity" class="form-group view_store_transfer_Quantity">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_Quantity" class="form-group view_store_transfer_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Quantity->getDisplayValue($Grid->Quantity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ItemValue->Visible) { // ItemValue ?>
        <td data-name="ItemValue">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_ItemValue" class="form-group view_store_transfer_ItemValue">
<input type="<?= $Grid->ItemValue->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_ItemValue" name="x<?= $Grid->RowIndex ?>_ItemValue" id="x<?= $Grid->RowIndex ?>_ItemValue" size="10" placeholder="<?= HtmlEncode($Grid->ItemValue->getPlaceHolder()) ?>" value="<?= $Grid->ItemValue->EditValue ?>"<?= $Grid->ItemValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemValue->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_ItemValue" class="form-group view_store_transfer_ItemValue">
<span<?= $Grid->ItemValue->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ItemValue->getDisplayValue($Grid->ItemValue->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ItemValue" id="x<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_ItemValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemValue" id="o<?= $Grid->RowIndex ?>_ItemValue" value="<?= HtmlEncode($Grid->ItemValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MRP->Visible) { // MRP ?>
        <td data-name="MRP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_MRP" class="form-group view_store_transfer_MRP">
<input type="<?= $Grid->MRP->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_MRP" name="x<?= $Grid->RowIndex ?>_MRP" id="x<?= $Grid->RowIndex ?>_MRP" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->MRP->getPlaceHolder()) ?>" value="<?= $Grid->MRP->EditValue ?>"<?= $Grid->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MRP->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_MRP" class="form-group view_store_transfer_MRP">
<span<?= $Grid->MRP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MRP->getDisplayValue($Grid->MRP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MRP" id="x<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_MRP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MRP" id="o<?= $Grid->RowIndex ?>_MRP" value="<?= HtmlEncode($Grid->MRP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_BRCODE" class="form-group view_store_transfer_BRCODE">
<?php
$onchange = $Grid->BRCODE->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->BRCODE->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_BRCODE" class="ew-auto-suggest">
    <input type="<?= $Grid->BRCODE->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_BRCODE" id="sv_x<?= $Grid->RowIndex ?>_BRCODE" value="<?= RemoveHtml($Grid->BRCODE->EditValue) ?>" size="10" maxlength="10" placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->BRCODE->getPlaceHolder()) ?>"<?= $Grid->BRCODE->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_store_transfer" data-field="x_BRCODE" data-input="sv_x<?= $Grid->RowIndex ?>_BRCODE" data-value-separator="<?= $Grid->BRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->BRCODE->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_store_transfergrid"], function() {
    fview_store_transfergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_BRCODE","forceSelect":false}, ew.vars.tables.view_store_transfer.fields.BRCODE.autoSuggestOptions));
});
</script>
<?= $Grid->BRCODE->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_BRCODE") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_BRCODE" class="form-group view_store_transfer_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BRCODE->getDisplayValue($Grid->BRCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->strid->Visible) { // strid ?>
        <td data-name="strid">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->strid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<span<?= $Grid->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->strid->getDisplayValue($Grid->strid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_strid" name="x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<input type="<?= $Grid->strid->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_strid" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" size="30" placeholder="<?= HtmlEncode($Grid->strid->getPlaceHolder()) ?>" value="<?= $Grid->strid->EditValue ?>"<?= $Grid->strid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->strid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_strid" class="form-group view_store_transfer_strid">
<span<?= $Grid->strid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->strid->getDisplayValue($Grid->strid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_strid" id="x<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_strid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_strid" id="o<?= $Grid->RowIndex ?>_strid" value="<?= HtmlEncode($Grid->strid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_HospID" class="form-group view_store_transfer_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grncreatedby->Visible) { // grncreatedby ?>
        <td data-name="grncreatedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_grncreatedby" class="form-group view_store_transfer_grncreatedby">
<span<?= $Grid->grncreatedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grncreatedby->getDisplayValue($Grid->grncreatedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grncreatedby" id="x<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grncreatedby" id="o<?= $Grid->RowIndex ?>_grncreatedby" value="<?= HtmlEncode($Grid->grncreatedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <td data-name="grncreatedDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_grncreatedDateTime" class="form-group view_store_transfer_grncreatedDateTime">
<span<?= $Grid->grncreatedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grncreatedDateTime->getDisplayValue($Grid->grncreatedDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grncreatedDateTime" id="x<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grncreatedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grncreatedDateTime" id="o<?= $Grid->RowIndex ?>_grncreatedDateTime" value="<?= HtmlEncode($Grid->grncreatedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grnModifiedby->Visible) { // grnModifiedby ?>
        <td data-name="grnModifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_grnModifiedby" class="form-group view_store_transfer_grnModifiedby">
<span<?= $Grid->grnModifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grnModifiedby->getDisplayValue($Grid->grnModifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grnModifiedby" id="x<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grnModifiedby" id="o<?= $Grid->RowIndex ?>_grnModifiedby" value="<?= HtmlEncode($Grid->grnModifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <td data-name="grnModifiedDateTime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_grnModifiedDateTime" class="form-group view_store_transfer_grnModifiedDateTime">
<span<?= $Grid->grnModifiedDateTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->grnModifiedDateTime->getDisplayValue($Grid->grnModifiedDateTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="x<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_grnModifiedDateTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_grnModifiedDateTime" id="o<?= $Grid->RowIndex ?>_grnModifiedDateTime" value="<?= HtmlEncode($Grid->grnModifiedDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_BillDate" class="form-group view_store_transfer_BillDate">
<input type="<?= $Grid->BillDate->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_BillDate" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" placeholder="<?= HtmlEncode($Grid->BillDate->getPlaceHolder()) ?>" value="<?= $Grid->BillDate->EditValue ?>"<?= $Grid->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillDate->getErrorMessage() ?></div>
<?php if (!$Grid->BillDate->ReadOnly && !$Grid->BillDate->Disabled && !isset($Grid->BillDate->EditAttrs["readonly"]) && !isset($Grid->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_store_transfergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_store_transfergrid", "x<?= $Grid->RowIndex ?>_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_BillDate" class="form-group view_store_transfer_BillDate">
<span<?= $Grid->BillDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillDate->getDisplayValue($Grid->BillDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillDate" id="x<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_BillDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillDate" id="o<?= $Grid->RowIndex ?>_BillDate" value="<?= HtmlEncode($Grid->BillDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CurStock->Visible) { // CurStock ?>
        <td data-name="CurStock">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_store_transfer_CurStock" class="form-group view_store_transfer_CurStock">
<input type="<?= $Grid->CurStock->getInputTextType() ?>" data-table="view_store_transfer" data-field="x_CurStock" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" size="30" placeholder="<?= HtmlEncode($Grid->CurStock->getPlaceHolder()) ?>" value="<?= $Grid->CurStock->EditValue ?>"<?= $Grid->CurStock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CurStock->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_store_transfer_CurStock" class="form-group view_store_transfer_CurStock">
<span<?= $Grid->CurStock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CurStock->getDisplayValue($Grid->CurStock->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CurStock" id="x<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_store_transfer" data-field="x_CurStock" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CurStock" id="o<?= $Grid->RowIndex ?>_CurStock" value="<?= HtmlEncode($Grid->CurStock->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_store_transfergrid","load"], function() {
    fview_store_transfergrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fview_store_transfergrid">
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
    ew.addEventHandlers("view_store_transfer");
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
});
</script>
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_store_transfer",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

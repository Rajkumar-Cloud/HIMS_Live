<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewPharmacyPurchaseRequestItemsPurchasedGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_purchase_request_items_purchasedgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_pharmacy_purchase_request_items_purchasedgrid = new ew.Form("fview_pharmacy_purchase_request_items_purchasedgrid", "grid");
    fview_pharmacy_purchase_request_items_purchasedgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_purchase_request_items_purchased")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacy_purchase_request_items_purchased)
        ew.vars.tables.view_pharmacy_purchase_request_items_purchased = currentTable;
    fview_pharmacy_purchase_request_items_purchasedgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["ApprovedStatus", [fields.ApprovedStatus.visible && fields.ApprovedStatus.required ? ew.Validators.required(fields.ApprovedStatus.caption) : null], fields.ApprovedStatus.isInvalid],
        ["PurchaseStatus", [fields.PurchaseStatus.visible && fields.PurchaseStatus.required ? ew.Validators.required(fields.PurchaseStatus.caption) : null], fields.PurchaseStatus.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacy_purchase_request_items_purchasedgrid,
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
    fview_pharmacy_purchase_request_items_purchasedgrid.validate = function () {
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
    fview_pharmacy_purchase_request_items_purchasedgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ApprovedStatus", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PurchaseStatus", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_pharmacy_purchase_request_items_purchasedgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_purchase_request_items_purchasedgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_purchase_request_items_purchasedgrid.lists.PurchaseStatus = <?= $Grid->PurchaseStatus->toClientList($Grid) ?>;
    loadjs.done("fview_pharmacy_purchase_request_items_purchasedgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_purchase_request_items_purchased">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_pharmacy_purchase_request_items_purchasedgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_pharmacy_purchase_request_items_purchased" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_pharmacy_purchase_request_items_purchasedgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_id" class="view_pharmacy_purchase_request_items_purchased_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Grid->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PRC" class="view_pharmacy_purchase_request_items_purchased_PRC"><?= $Grid->renderSort($Grid->PRC) ?></div></th>
<?php } ?>
<?php if ($Grid->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Grid->PrName->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PrName" class="view_pharmacy_purchase_request_items_purchased_PrName"><?= $Grid->renderSort($Grid->PrName) ?></div></th>
<?php } ?>
<?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Grid->Quantity->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_Quantity" class="view_pharmacy_purchase_request_items_purchased_Quantity"><?= $Grid->renderSort($Grid->Quantity) ?></div></th>
<?php } ?>
<?php if ($Grid->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <th data-name="ApprovedStatus" class="<?= $Grid->ApprovedStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="view_pharmacy_purchase_request_items_purchased_ApprovedStatus"><?= $Grid->renderSort($Grid->ApprovedStatus) ?></div></th>
<?php } ?>
<?php if ($Grid->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <th data-name="PurchaseStatus" class="<?= $Grid->PurchaseStatus->headerCellClass() ?>"><div id="elh_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="view_pharmacy_purchase_request_items_purchased_PurchaseStatus"><?= $Grid->renderSort($Grid->PurchaseStatus) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_pharmacy_purchase_request_items_purchased", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_id" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_id" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Grid->PRC->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group">
<span<?= $Grid->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PRC->getDisplayValue($Grid->PRC->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<?= $Grid->PRC->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_PRC" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_PRC" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Grid->PrName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group">
<input type="<?= $Grid->PrName->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" value="<?= $Grid->PrName->EditValue ?>"<?= $Grid->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group">
<span<?= $Grid->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrName->getDisplayValue($Grid->PrName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<?= $Grid->PrName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_PrName" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_PrName" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Grid->Quantity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<?= $Grid->Quantity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_Quantity" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_Quantity" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <td data-name="ApprovedStatus" <?= $Grid->ApprovedStatus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group">
<input type="<?= $Grid->ApprovedStatus->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?= $Grid->RowIndex ?>_ApprovedStatus" id="x<?= $Grid->RowIndex ?>_ApprovedStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ApprovedStatus->getPlaceHolder()) ?>" value="<?= $Grid->ApprovedStatus->EditValue ?>"<?= $Grid->ApprovedStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ApprovedStatus->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ApprovedStatus" id="o<?= $Grid->RowIndex ?>_ApprovedStatus" value="<?= HtmlEncode($Grid->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group">
<span<?= $Grid->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ApprovedStatus->getDisplayValue($Grid->ApprovedStatus->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ApprovedStatus" id="x<?= $Grid->RowIndex ?>_ApprovedStatus" value="<?= HtmlEncode($Grid->ApprovedStatus->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?= $Grid->ApprovedStatus->viewAttributes() ?>>
<?= $Grid->ApprovedStatus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_ApprovedStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_ApprovedStatus" value="<?= HtmlEncode($Grid->ApprovedStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_ApprovedStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_ApprovedStatus" value="<?= HtmlEncode($Grid->ApprovedStatus->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <td data-name="PurchaseStatus" <?= $Grid->PurchaseStatus->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PurchaseStatus"
        name="x<?= $Grid->RowIndex ?>_PurchaseStatus"
        class="form-control ew-select<?= $Grid->PurchaseStatus->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus"
        data-table="view_pharmacy_purchase_request_items_purchased"
        data-field="x_PurchaseStatus"
        data-value-separator="<?= $Grid->PurchaseStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PurchaseStatus->getPlaceHolder()) ?>"
        <?= $Grid->PurchaseStatus->editAttributes() ?>>
        <?= $Grid->PurchaseStatus->selectOptionListHtml("x{$Grid->RowIndex}_PurchaseStatus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PurchaseStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PurchaseStatus", selectId: "view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_pharmacy_purchase_request_items_purchased.fields.PurchaseStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_purchase_request_items_purchased.fields.PurchaseStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PurchaseStatus" id="o<?= $Grid->RowIndex ?>_PurchaseStatus" value="<?= HtmlEncode($Grid->PurchaseStatus->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_PurchaseStatus"
        name="x<?= $Grid->RowIndex ?>_PurchaseStatus"
        class="form-control ew-select<?= $Grid->PurchaseStatus->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus"
        data-table="view_pharmacy_purchase_request_items_purchased"
        data-field="x_PurchaseStatus"
        data-value-separator="<?= $Grid->PurchaseStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PurchaseStatus->getPlaceHolder()) ?>"
        <?= $Grid->PurchaseStatus->editAttributes() ?>>
        <?= $Grid->PurchaseStatus->selectOptionListHtml("x{$Grid->RowIndex}_PurchaseStatus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PurchaseStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PurchaseStatus", selectId: "view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_pharmacy_purchase_request_items_purchased.fields.PurchaseStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_purchase_request_items_purchased.fields.PurchaseStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?= $Grid->PurchaseStatus->viewAttributes() ?>>
<?= $Grid->PurchaseStatus->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_PurchaseStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$x<?= $Grid->RowIndex ?>_PurchaseStatus" value="<?= HtmlEncode($Grid->PurchaseStatus->FormValue) ?>">
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-hidden="1" name="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_PurchaseStatus" id="fview_pharmacy_purchase_request_items_purchasedgrid$o<?= $Grid->RowIndex ?>_PurchaseStatus" value="<?= HtmlEncode($Grid->PurchaseStatus->OldValue) ?>">
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
loadjs.ready(["fview_pharmacy_purchase_request_items_purchasedgrid","load"], function () {
    fview_pharmacy_purchase_request_items_purchasedgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_pharmacy_purchase_request_items_purchased", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_id" class="form-group view_pharmacy_purchase_request_items_purchased_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_id" class="form-group view_pharmacy_purchase_request_items_purchased_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PRC" class="form-group view_pharmacy_purchase_request_items_purchased_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PRC->getDisplayValue($Grid->PRC->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<input type="<?= $Grid->PrName->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" size="60" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" value="<?= $Grid->PrName->EditValue ?>"<?= $Grid->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PrName" class="form-group view_pharmacy_purchase_request_items_purchased_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrName->getDisplayValue($Grid->PrName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_Quantity" class="form-group view_pharmacy_purchase_request_items_purchased_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Quantity->getDisplayValue($Grid->Quantity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <td data-name="ApprovedStatus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<input type="<?= $Grid->ApprovedStatus->getInputTextType() ?>" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" name="x<?= $Grid->RowIndex ?>_ApprovedStatus" id="x<?= $Grid->RowIndex ?>_ApprovedStatus" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ApprovedStatus->getPlaceHolder()) ?>" value="<?= $Grid->ApprovedStatus->EditValue ?>"<?= $Grid->ApprovedStatus->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ApprovedStatus->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_ApprovedStatus" class="form-group view_pharmacy_purchase_request_items_purchased_ApprovedStatus">
<span<?= $Grid->ApprovedStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ApprovedStatus->getDisplayValue($Grid->ApprovedStatus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ApprovedStatus" id="x<?= $Grid->RowIndex ?>_ApprovedStatus" value="<?= HtmlEncode($Grid->ApprovedStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_ApprovedStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ApprovedStatus" id="o<?= $Grid->RowIndex ?>_ApprovedStatus" value="<?= HtmlEncode($Grid->ApprovedStatus->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <td data-name="PurchaseStatus">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
    <select
        id="x<?= $Grid->RowIndex ?>_PurchaseStatus"
        name="x<?= $Grid->RowIndex ?>_PurchaseStatus"
        class="form-control ew-select<?= $Grid->PurchaseStatus->isInvalidClass() ?>"
        data-select2-id="view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus"
        data-table="view_pharmacy_purchase_request_items_purchased"
        data-field="x_PurchaseStatus"
        data-value-separator="<?= $Grid->PurchaseStatus->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->PurchaseStatus->getPlaceHolder()) ?>"
        <?= $Grid->PurchaseStatus->editAttributes() ?>>
        <?= $Grid->PurchaseStatus->selectOptionListHtml("x{$Grid->RowIndex}_PurchaseStatus") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->PurchaseStatus->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus']"),
        options = { name: "x<?= $Grid->RowIndex ?>_PurchaseStatus", selectId: "view_pharmacy_purchase_request_items_purchased_x<?= $Grid->RowIndex ?>_PurchaseStatus", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_pharmacy_purchase_request_items_purchased.fields.PurchaseStatus.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_pharmacy_purchase_request_items_purchased.fields.PurchaseStatus.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_pharmacy_purchase_request_items_purchased_PurchaseStatus" class="form-group view_pharmacy_purchase_request_items_purchased_PurchaseStatus">
<span<?= $Grid->PurchaseStatus->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PurchaseStatus->getDisplayValue($Grid->PurchaseStatus->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PurchaseStatus" id="x<?= $Grid->RowIndex ?>_PurchaseStatus" value="<?= HtmlEncode($Grid->PurchaseStatus->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_pharmacy_purchase_request_items_purchased" data-field="x_PurchaseStatus" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PurchaseStatus" id="o<?= $Grid->RowIndex ?>_PurchaseStatus" value="<?= HtmlEncode($Grid->PurchaseStatus->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_purchase_request_items_purchasedgrid","load"], function() {
    fview_pharmacy_purchase_request_items_purchasedgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fview_pharmacy_purchase_request_items_purchasedgrid">
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
    ew.addEventHandlers("view_pharmacy_purchase_request_items_purchased");
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
        container: "gmp_view_pharmacy_purchase_request_items_purchased",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

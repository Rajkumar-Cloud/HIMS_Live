<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PharmacyPurchaseRequestItemsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_purchase_request_itemsgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpharmacy_purchase_request_itemsgrid = new ew.Form("fpharmacy_purchase_request_itemsgrid", "grid");
    fpharmacy_purchase_request_itemsgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_purchase_request_items")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_purchase_request_items)
        ew.vars.tables.pharmacy_purchase_request_items = currentTable;
    fpharmacy_purchase_request_itemsgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["Quantity", [fields.Quantity.visible && fields.Quantity.required ? ew.Validators.required(fields.Quantity.caption) : null, ew.Validators.integer], fields.Quantity.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["prid", [fields.prid.visible && fields.prid.required ? ew.Validators.required(fields.prid.caption) : null, ew.Validators.integer], fields.prid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_purchase_request_itemsgrid,
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
    fpharmacy_purchase_request_itemsgrid.validate = function () {
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
    fpharmacy_purchase_request_itemsgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Quantity", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "prid", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_purchase_request_itemsgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_purchase_request_itemsgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_purchase_request_itemsgrid.lists.PrName = <?= $Grid->PrName->toClientList($Grid) ?>;
    loadjs.done("fpharmacy_purchase_request_itemsgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_purchase_request_items">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_purchase_request_itemsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_purchase_request_items" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_purchase_request_itemsgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_id" class="pharmacy_purchase_request_items_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Grid->PRC->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PRC" class="pharmacy_purchase_request_items_PRC"><?= $Grid->renderSort($Grid->PRC) ?></div></th>
<?php } ?>
<?php if ($Grid->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Grid->PrName->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_PrName" class="pharmacy_purchase_request_items_PrName"><?= $Grid->renderSort($Grid->PrName) ?></div></th>
<?php } ?>
<?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Grid->Quantity->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_Quantity" class="pharmacy_purchase_request_items_Quantity"><?= $Grid->renderSort($Grid->Quantity) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_HospID" class="pharmacy_purchase_request_items_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createdby" class="pharmacy_purchase_request_items_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_createddatetime" class="pharmacy_purchase_request_items_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifiedby" class="pharmacy_purchase_request_items_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_modifieddatetime" class="pharmacy_purchase_request_items_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Grid->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_BRCODE" class="pharmacy_purchase_request_items_BRCODE"><?= $Grid->renderSort($Grid->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->prid->Visible) { // prid ?>
        <th data-name="prid" class="<?= $Grid->prid->headerCellClass() ?>"><div id="elh_pharmacy_purchase_request_items_prid" class="pharmacy_purchase_request_items_prid"><?= $Grid->renderSort($Grid->prid) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_pharmacy_purchase_request_items", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_id" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_id" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Grid->PRC->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_PRC" class="form-group">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<?= $Grid->PRC->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_PRC" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_PRC" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Grid->PrName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_PrName" class="form-group">
<?php
$onchange = $Grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Grid->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PrName" id="sv_x<?= $Grid->RowIndex ?>_PrName" value="<?= RemoveHtml($Grid->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>"<?= $Grid->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-input="sv_x<?= $Grid->RowIndex ?>_PrName" data-value-separator="<?= $Grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid"], function() {
    fpharmacy_purchase_request_itemsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_purchase_request_items.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Grid->PrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_PrName" class="form-group">
<?php
$onchange = $Grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Grid->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PrName" id="sv_x<?= $Grid->RowIndex ?>_PrName" value="<?= RemoveHtml($Grid->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>"<?= $Grid->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-input="sv_x<?= $Grid->RowIndex ?>_PrName" data-value-separator="<?= $Grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid"], function() {
    fpharmacy_purchase_request_itemsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_purchase_request_items.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Grid->PrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<?= $Grid->PrName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_PrName" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_PrName" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Grid->Quantity->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_Quantity" class="form-group">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<?= $Grid->Quantity->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_Quantity" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_Quantity" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_HospID" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_HospID" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_createdby" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_createdby" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Grid->BRCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<?= $Grid->BRCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_BRCODE" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_BRCODE" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->prid->Visible) { // prid ?>
        <td data-name="prid" <?= $Grid->prid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->prid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<span<?= $Grid->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->prid->getDisplayValue($Grid->prid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_prid" name="x<?= $Grid->RowIndex ?>_prid" value="<?= HtmlEncode($Grid->prid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<input type="<?= $Grid->prid->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?= $Grid->RowIndex ?>_prid" id="x<?= $Grid->RowIndex ?>_prid" size="30" placeholder="<?= HtmlEncode($Grid->prid->getPlaceHolder()) ?>" value="<?= $Grid->prid->EditValue ?>"<?= $Grid->prid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->prid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_prid" id="o<?= $Grid->RowIndex ?>_prid" value="<?= HtmlEncode($Grid->prid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->prid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<span<?= $Grid->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->prid->getDisplayValue($Grid->prid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_prid" name="x<?= $Grid->RowIndex ?>_prid" value="<?= HtmlEncode($Grid->prid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_prid" class="form-group">
<input type="<?= $Grid->prid->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?= $Grid->RowIndex ?>_prid" id="x<?= $Grid->RowIndex ?>_prid" size="30" placeholder="<?= HtmlEncode($Grid->prid->getPlaceHolder()) ?>" value="<?= $Grid->prid->EditValue ?>"<?= $Grid->prid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->prid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_purchase_request_items_prid">
<span<?= $Grid->prid->viewAttributes() ?>>
<?= $Grid->prid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_prid" id="fpharmacy_purchase_request_itemsgrid$x<?= $Grid->RowIndex ?>_prid" value="<?= HtmlEncode($Grid->prid->FormValue) ?>">
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" data-hidden="1" name="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_prid" id="fpharmacy_purchase_request_itemsgrid$o<?= $Grid->RowIndex ?>_prid" value="<?= HtmlEncode($Grid->prid->OldValue) ?>">
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
loadjs.ready(["fpharmacy_purchase_request_itemsgrid","load"], function () {
    fpharmacy_purchase_request_itemsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_pharmacy_purchase_request_items", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_pharmacy_purchase_request_items_id" class="form-group pharmacy_purchase_request_items_id"></span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_id" class="form-group pharmacy_purchase_request_items_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<input type="<?= $Grid->PRC->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_PRC" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" size="9" maxlength="9" placeholder="<?= HtmlEncode($Grid->PRC->getPlaceHolder()) ?>" value="<?= $Grid->PRC->EditValue ?>"<?= $Grid->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PRC->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_PRC" class="form-group pharmacy_purchase_request_items_PRC">
<span<?= $Grid->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PRC->getDisplayValue($Grid->PRC->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PRC" id="x<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PRC" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PRC" id="o<?= $Grid->RowIndex ?>_PRC" value="<?= HtmlEncode($Grid->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<?php
$onchange = $Grid->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Grid->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_PrName" id="sv_x<?= $Grid->RowIndex ?>_PrName" value="<?= RemoveHtml($Grid->PrName->EditValue) ?>" size="60" maxlength="100" placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->PrName->getPlaceHolder()) ?>"<?= $Grid->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-input="sv_x<?= $Grid->RowIndex ?>_PrName" data-value-separator="<?= $Grid->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid"], function() {
    fpharmacy_purchase_request_itemsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_purchase_request_items.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Grid->PrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_PrName") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_PrName" class="form-group pharmacy_purchase_request_items_PrName">
<span<?= $Grid->PrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PrName->getDisplayValue($Grid->PrName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PrName" id="x<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_PrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PrName" id="o<?= $Grid->RowIndex ?>_PrName" value="<?= HtmlEncode($Grid->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<input type="<?= $Grid->Quantity->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" size="8" maxlength="8" placeholder="<?= HtmlEncode($Grid->Quantity->getPlaceHolder()) ?>" value="<?= $Grid->Quantity->EditValue ?>"<?= $Grid->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Quantity->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_Quantity" class="form-group pharmacy_purchase_request_items_Quantity">
<span<?= $Grid->Quantity->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Quantity->getDisplayValue($Grid->Quantity->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Quantity" id="x<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_Quantity" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Quantity" id="o<?= $Grid->RowIndex ?>_Quantity" value="<?= HtmlEncode($Grid->Quantity->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_HospID" class="form-group pharmacy_purchase_request_items_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_createdby" class="form-group pharmacy_purchase_request_items_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_createddatetime" class="form-group pharmacy_purchase_request_items_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_modifiedby" class="form-group pharmacy_purchase_request_items_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_modifieddatetime" class="form-group pharmacy_purchase_request_items_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_BRCODE" class="form-group pharmacy_purchase_request_items_BRCODE">
<span<?= $Grid->BRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BRCODE->getDisplayValue($Grid->BRCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BRCODE" id="x<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_BRCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BRCODE" id="o<?= $Grid->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Grid->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->prid->Visible) { // prid ?>
        <td data-name="prid">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->prid->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?= $Grid->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->prid->getDisplayValue($Grid->prid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_prid" name="x<?= $Grid->RowIndex ?>_prid" value="<?= HtmlEncode($Grid->prid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<input type="<?= $Grid->prid->getInputTextType() ?>" data-table="pharmacy_purchase_request_items" data-field="x_prid" name="x<?= $Grid->RowIndex ?>_prid" id="x<?= $Grid->RowIndex ?>_prid" size="30" placeholder="<?= HtmlEncode($Grid->prid->getPlaceHolder()) ?>" value="<?= $Grid->prid->EditValue ?>"<?= $Grid->prid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->prid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_purchase_request_items_prid" class="form-group pharmacy_purchase_request_items_prid">
<span<?= $Grid->prid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->prid->getDisplayValue($Grid->prid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_prid" id="x<?= $Grid->RowIndex ?>_prid" value="<?= HtmlEncode($Grid->prid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_purchase_request_items" data-field="x_prid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_prid" id="o<?= $Grid->RowIndex ?>_prid" value="<?= HtmlEncode($Grid->prid->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_purchase_request_itemsgrid","load"], function() {
    fpharmacy_purchase_request_itemsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpharmacy_purchase_request_itemsgrid">
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
    ew.addEventHandlers("pharmacy_purchase_request_items");
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
        container: "gmp_pharmacy_purchase_request_items",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

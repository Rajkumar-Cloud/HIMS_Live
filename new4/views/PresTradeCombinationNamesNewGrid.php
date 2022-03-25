<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PresTradeCombinationNamesNewGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_trade_combination_names_newgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpres_trade_combination_names_newgrid = new ew.Form("fpres_trade_combination_names_newgrid", "grid");
    fpres_trade_combination_names_newgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_trade_combination_names_new")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_trade_combination_names_new)
        ew.vars.tables.pres_trade_combination_names_new = currentTable;
    fpres_trade_combination_names_newgrid.addFields([
        ["ID", [fields.ID.visible && fields.ID.required ? ew.Validators.required(fields.ID.caption) : null], fields.ID.isInvalid],
        ["tradenames_id", [fields.tradenames_id.visible && fields.tradenames_id.required ? ew.Validators.required(fields.tradenames_id.caption) : null, ew.Validators.integer], fields.tradenames_id.isInvalid],
        ["Drug_Name", [fields.Drug_Name.visible && fields.Drug_Name.required ? ew.Validators.required(fields.Drug_Name.caption) : null], fields.Drug_Name.isInvalid],
        ["Generic_Name", [fields.Generic_Name.visible && fields.Generic_Name.required ? ew.Validators.required(fields.Generic_Name.caption) : null], fields.Generic_Name.isInvalid],
        ["Trade_Name", [fields.Trade_Name.visible && fields.Trade_Name.required ? ew.Validators.required(fields.Trade_Name.caption) : null], fields.Trade_Name.isInvalid],
        ["PR_CODE", [fields.PR_CODE.visible && fields.PR_CODE.required ? ew.Validators.required(fields.PR_CODE.caption) : null], fields.PR_CODE.isInvalid],
        ["Form", [fields.Form.visible && fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["Strength", [fields.Strength.visible && fields.Strength.required ? ew.Validators.required(fields.Strength.caption) : null], fields.Strength.isInvalid],
        ["Unit", [fields.Unit.visible && fields.Unit.required ? ew.Validators.required(fields.Unit.caption) : null], fields.Unit.isInvalid],
        ["CONTAINER_TYPE", [fields.CONTAINER_TYPE.visible && fields.CONTAINER_TYPE.required ? ew.Validators.required(fields.CONTAINER_TYPE.caption) : null], fields.CONTAINER_TYPE.isInvalid],
        ["CONTAINER_STRENGTH", [fields.CONTAINER_STRENGTH.visible && fields.CONTAINER_STRENGTH.required ? ew.Validators.required(fields.CONTAINER_STRENGTH.caption) : null], fields.CONTAINER_STRENGTH.isInvalid],
        ["TypeOfDrug", [fields.TypeOfDrug.visible && fields.TypeOfDrug.required ? ew.Validators.required(fields.TypeOfDrug.caption) : null], fields.TypeOfDrug.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_trade_combination_names_newgrid,
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
    fpres_trade_combination_names_newgrid.validate = function () {
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
    fpres_trade_combination_names_newgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "tradenames_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Drug_Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Generic_Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Trade_Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PR_CODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Form", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Strength", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Unit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CONTAINER_TYPE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CONTAINER_STRENGTH", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TypeOfDrug", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpres_trade_combination_names_newgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_trade_combination_names_newgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpres_trade_combination_names_newgrid.lists.Generic_Name = <?= $Grid->Generic_Name->toClientList($Grid) ?>;
    fpres_trade_combination_names_newgrid.lists.Form = <?= $Grid->Form->toClientList($Grid) ?>;
    fpres_trade_combination_names_newgrid.lists.Unit = <?= $Grid->Unit->toClientList($Grid) ?>;
    fpres_trade_combination_names_newgrid.lists.TypeOfDrug = <?= $Grid->TypeOfDrug->toClientList($Grid) ?>;
    loadjs.done("fpres_trade_combination_names_newgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_trade_combination_names_new">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpres_trade_combination_names_newgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pres_trade_combination_names_new" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pres_trade_combination_names_newgrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->ID->Visible) { // ID ?>
        <th data-name="ID" class="<?= $Grid->ID->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID"><?= $Grid->renderSort($Grid->ID) ?></div></th>
<?php } ?>
<?php if ($Grid->tradenames_id->Visible) { // tradenames_id ?>
        <th data-name="tradenames_id" class="<?= $Grid->tradenames_id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id"><?= $Grid->renderSort($Grid->tradenames_id) ?></div></th>
<?php } ?>
<?php if ($Grid->Drug_Name->Visible) { // Drug_Name ?>
        <th data-name="Drug_Name" class="<?= $Grid->Drug_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name"><?= $Grid->renderSort($Grid->Drug_Name) ?></div></th>
<?php } ?>
<?php if ($Grid->Generic_Name->Visible) { // Generic_Name ?>
        <th data-name="Generic_Name" class="<?= $Grid->Generic_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name"><?= $Grid->renderSort($Grid->Generic_Name) ?></div></th>
<?php } ?>
<?php if ($Grid->Trade_Name->Visible) { // Trade_Name ?>
        <th data-name="Trade_Name" class="<?= $Grid->Trade_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name"><?= $Grid->renderSort($Grid->Trade_Name) ?></div></th>
<?php } ?>
<?php if ($Grid->PR_CODE->Visible) { // PR_CODE ?>
        <th data-name="PR_CODE" class="<?= $Grid->PR_CODE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE"><?= $Grid->renderSort($Grid->PR_CODE) ?></div></th>
<?php } ?>
<?php if ($Grid->Form->Visible) { // Form ?>
        <th data-name="Form" class="<?= $Grid->Form->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form"><?= $Grid->renderSort($Grid->Form) ?></div></th>
<?php } ?>
<?php if ($Grid->Strength->Visible) { // Strength ?>
        <th data-name="Strength" class="<?= $Grid->Strength->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength"><?= $Grid->renderSort($Grid->Strength) ?></div></th>
<?php } ?>
<?php if ($Grid->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Grid->Unit->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit"><?= $Grid->renderSort($Grid->Unit) ?></div></th>
<?php } ?>
<?php if ($Grid->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <th data-name="CONTAINER_TYPE" class="<?= $Grid->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE"><?= $Grid->renderSort($Grid->CONTAINER_TYPE) ?></div></th>
<?php } ?>
<?php if ($Grid->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <th data-name="CONTAINER_STRENGTH" class="<?= $Grid->CONTAINER_STRENGTH->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH"><?= $Grid->renderSort($Grid->CONTAINER_STRENGTH) ?></div></th>
<?php } ?>
<?php if ($Grid->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <th data-name="TypeOfDrug" class="<?= $Grid->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug"><?= $Grid->renderSort($Grid->TypeOfDrug) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_pres_trade_combination_names_new", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->ID->Visible) { // ID ?>
        <td data-name="ID" <?= $Grid->ID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group"></span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ID" id="o<?= $Grid->RowIndex ?>_ID" value="<?= HtmlEncode($Grid->ID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group">
<span<?= $Grid->ID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ID->getDisplayValue($Grid->ID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ID" id="x<?= $Grid->RowIndex ?>_ID" value="<?= HtmlEncode($Grid->ID->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_ID">
<span<?= $Grid->ID->viewAttributes() ?>>
<?= $Grid->ID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_ID" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_ID" value="<?= HtmlEncode($Grid->ID->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_ID" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_ID" value="<?= HtmlEncode($Grid->ID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ID" id="x<?= $Grid->RowIndex ?>_ID" value="<?= HtmlEncode($Grid->ID->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->tradenames_id->Visible) { // tradenames_id ?>
        <td data-name="tradenames_id" <?= $Grid->tradenames_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<span<?= $Grid->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->tradenames_id->getDisplayValue($Grid->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_tradenames_id" name="x<?= $Grid->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Grid->tradenames_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<input type="<?= $Grid->tradenames_id->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?= $Grid->RowIndex ?>_tradenames_id" id="x<?= $Grid->RowIndex ?>_tradenames_id" size="30" placeholder="<?= HtmlEncode($Grid->tradenames_id->getPlaceHolder()) ?>" value="<?= $Grid->tradenames_id->EditValue ?>"<?= $Grid->tradenames_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->tradenames_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_tradenames_id" id="o<?= $Grid->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Grid->tradenames_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<span<?= $Grid->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->tradenames_id->getDisplayValue($Grid->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_tradenames_id" name="x<?= $Grid->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Grid->tradenames_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<input type="<?= $Grid->tradenames_id->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?= $Grid->RowIndex ?>_tradenames_id" id="x<?= $Grid->RowIndex ?>_tradenames_id" size="30" placeholder="<?= HtmlEncode($Grid->tradenames_id->getPlaceHolder()) ?>" value="<?= $Grid->tradenames_id->EditValue ?>"<?= $Grid->tradenames_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->tradenames_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_tradenames_id">
<span<?= $Grid->tradenames_id->viewAttributes() ?>>
<?= $Grid->tradenames_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_tradenames_id" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Grid->tradenames_id->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_tradenames_id" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Grid->tradenames_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Drug_Name->Visible) { // Drug_Name ?>
        <td data-name="Drug_Name" <?= $Grid->Drug_Name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group">
<input type="<?= $Grid->Drug_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?= $Grid->RowIndex ?>_Drug_Name" id="x<?= $Grid->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Drug_Name->getPlaceHolder()) ?>" value="<?= $Grid->Drug_Name->EditValue ?>"<?= $Grid->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Drug_Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Drug_Name" id="o<?= $Grid->RowIndex ?>_Drug_Name" value="<?= HtmlEncode($Grid->Drug_Name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group">
<input type="<?= $Grid->Drug_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?= $Grid->RowIndex ?>_Drug_Name" id="x<?= $Grid->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Drug_Name->getPlaceHolder()) ?>" value="<?= $Grid->Drug_Name->EditValue ?>"<?= $Grid->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Drug_Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Drug_Name">
<span<?= $Grid->Drug_Name->viewAttributes() ?>>
<?= $Grid->Drug_Name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Drug_Name" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Drug_Name" value="<?= HtmlEncode($Grid->Drug_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Drug_Name" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Drug_Name" value="<?= HtmlEncode($Grid->Drug_Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Generic_Name->Visible) { // Generic_Name ?>
        <td data-name="Generic_Name" <?= $Grid->Generic_Name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Generic_Name"
        name="x<?= $Grid->RowIndex ?>_Generic_Name"
        class="form-control ew-select<?= $Grid->Generic_Name->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name"
        data-table="pres_trade_combination_names_new"
        data-field="x_Generic_Name"
        data-value-separator="<?= $Grid->Generic_Name->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Generic_Name->getPlaceHolder()) ?>"
        <?= $Grid->Generic_Name->editAttributes() ?>>
        <?= $Grid->Generic_Name->selectOptionListHtml("x{$Grid->RowIndex}_Generic_Name") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Generic_Name->getErrorMessage() ?></div>
<?= $Grid->Generic_Name->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Generic_Name") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Generic_Name", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Generic_Name.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Generic_Name" id="o<?= $Grid->RowIndex ?>_Generic_Name" value="<?= HtmlEncode($Grid->Generic_Name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Generic_Name"
        name="x<?= $Grid->RowIndex ?>_Generic_Name"
        class="form-control ew-select<?= $Grid->Generic_Name->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name"
        data-table="pres_trade_combination_names_new"
        data-field="x_Generic_Name"
        data-value-separator="<?= $Grid->Generic_Name->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Generic_Name->getPlaceHolder()) ?>"
        <?= $Grid->Generic_Name->editAttributes() ?>>
        <?= $Grid->Generic_Name->selectOptionListHtml("x{$Grid->RowIndex}_Generic_Name") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Generic_Name->getErrorMessage() ?></div>
<?= $Grid->Generic_Name->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Generic_Name") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Generic_Name", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Generic_Name.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Generic_Name">
<span<?= $Grid->Generic_Name->viewAttributes() ?>>
<?= $Grid->Generic_Name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Generic_Name" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Generic_Name" value="<?= HtmlEncode($Grid->Generic_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Generic_Name" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Generic_Name" value="<?= HtmlEncode($Grid->Generic_Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Trade_Name->Visible) { // Trade_Name ?>
        <td data-name="Trade_Name" <?= $Grid->Trade_Name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group">
<input type="<?= $Grid->Trade_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?= $Grid->RowIndex ?>_Trade_Name" id="x<?= $Grid->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Trade_Name->getPlaceHolder()) ?>" value="<?= $Grid->Trade_Name->EditValue ?>"<?= $Grid->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Trade_Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Trade_Name" id="o<?= $Grid->RowIndex ?>_Trade_Name" value="<?= HtmlEncode($Grid->Trade_Name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group">
<input type="<?= $Grid->Trade_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?= $Grid->RowIndex ?>_Trade_Name" id="x<?= $Grid->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Trade_Name->getPlaceHolder()) ?>" value="<?= $Grid->Trade_Name->EditValue ?>"<?= $Grid->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Trade_Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Trade_Name">
<span<?= $Grid->Trade_Name->viewAttributes() ?>>
<?= $Grid->Trade_Name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Trade_Name" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Trade_Name" value="<?= HtmlEncode($Grid->Trade_Name->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Trade_Name" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Trade_Name" value="<?= HtmlEncode($Grid->Trade_Name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PR_CODE->Visible) { // PR_CODE ?>
        <td data-name="PR_CODE" <?= $Grid->PR_CODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group">
<input type="<?= $Grid->PR_CODE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?= $Grid->RowIndex ?>_PR_CODE" id="x<?= $Grid->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PR_CODE->getPlaceHolder()) ?>" value="<?= $Grid->PR_CODE->EditValue ?>"<?= $Grid->PR_CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PR_CODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PR_CODE" id="o<?= $Grid->RowIndex ?>_PR_CODE" value="<?= HtmlEncode($Grid->PR_CODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group">
<input type="<?= $Grid->PR_CODE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?= $Grid->RowIndex ?>_PR_CODE" id="x<?= $Grid->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PR_CODE->getPlaceHolder()) ?>" value="<?= $Grid->PR_CODE->EditValue ?>"<?= $Grid->PR_CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PR_CODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_PR_CODE">
<span<?= $Grid->PR_CODE->viewAttributes() ?>>
<?= $Grid->PR_CODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_PR_CODE" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_PR_CODE" value="<?= HtmlEncode($Grid->PR_CODE->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_PR_CODE" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_PR_CODE" value="<?= HtmlEncode($Grid->PR_CODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Form->Visible) { // Form ?>
        <td data-name="Form" <?= $Grid->Form->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Form"
        name="x<?= $Grid->RowIndex ?>_Form"
        class="form-control ew-select<?= $Grid->Form->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form"
        data-table="pres_trade_combination_names_new"
        data-field="x_Form"
        data-value-separator="<?= $Grid->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Form->getPlaceHolder()) ?>"
        <?= $Grid->Form->editAttributes() ?>>
        <?= $Grid->Form->selectOptionListHtml("x{$Grid->RowIndex}_Form") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Form->getErrorMessage() ?></div>
<?= $Grid->Form->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Form", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Form" id="o<?= $Grid->RowIndex ?>_Form" value="<?= HtmlEncode($Grid->Form->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Form"
        name="x<?= $Grid->RowIndex ?>_Form"
        class="form-control ew-select<?= $Grid->Form->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form"
        data-table="pres_trade_combination_names_new"
        data-field="x_Form"
        data-value-separator="<?= $Grid->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Form->getPlaceHolder()) ?>"
        <?= $Grid->Form->editAttributes() ?>>
        <?= $Grid->Form->selectOptionListHtml("x{$Grid->RowIndex}_Form") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Form->getErrorMessage() ?></div>
<?= $Grid->Form->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Form", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Form">
<span<?= $Grid->Form->viewAttributes() ?>>
<?= $Grid->Form->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Form" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Form" value="<?= HtmlEncode($Grid->Form->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Form" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Form" value="<?= HtmlEncode($Grid->Form->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Strength->Visible) { // Strength ?>
        <td data-name="Strength" <?= $Grid->Strength->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group">
<input type="<?= $Grid->Strength->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?= $Grid->RowIndex ?>_Strength" id="x<?= $Grid->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Strength->getPlaceHolder()) ?>" value="<?= $Grid->Strength->EditValue ?>"<?= $Grid->Strength->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Strength->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Strength" id="o<?= $Grid->RowIndex ?>_Strength" value="<?= HtmlEncode($Grid->Strength->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group">
<input type="<?= $Grid->Strength->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?= $Grid->RowIndex ?>_Strength" id="x<?= $Grid->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Strength->getPlaceHolder()) ?>" value="<?= $Grid->Strength->EditValue ?>"<?= $Grid->Strength->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Strength->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Strength">
<span<?= $Grid->Strength->viewAttributes() ?>>
<?= $Grid->Strength->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Strength" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Strength" value="<?= HtmlEncode($Grid->Strength->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Strength" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Strength" value="<?= HtmlEncode($Grid->Strength->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Grid->Unit->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Unit"
        name="x<?= $Grid->RowIndex ?>_Unit"
        class="form-control ew-select<?= $Grid->Unit->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit"
        data-table="pres_trade_combination_names_new"
        data-field="x_Unit"
        data-value-separator="<?= $Grid->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Unit->getPlaceHolder()) ?>"
        <?= $Grid->Unit->editAttributes() ?>>
        <?= $Grid->Unit->selectOptionListHtml("x{$Grid->RowIndex}_Unit") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Unit->getErrorMessage() ?></div>
<?= $Grid->Unit->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Unit", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Unit" id="o<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_Unit"
        name="x<?= $Grid->RowIndex ?>_Unit"
        class="form-control ew-select<?= $Grid->Unit->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit"
        data-table="pres_trade_combination_names_new"
        data-field="x_Unit"
        data-value-separator="<?= $Grid->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Unit->getPlaceHolder()) ?>"
        <?= $Grid->Unit->editAttributes() ?>>
        <?= $Grid->Unit->selectOptionListHtml("x{$Grid->RowIndex}_Unit") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Unit->getErrorMessage() ?></div>
<?= $Grid->Unit->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Unit", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_Unit">
<span<?= $Grid->Unit->viewAttributes() ?>>
<?= $Grid->Unit->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Unit" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Unit" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td data-name="CONTAINER_TYPE" <?= $Grid->CONTAINER_TYPE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group">
<input type="<?= $Grid->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" id="x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->CONTAINER_TYPE->EditValue ?>"<?= $Grid->CONTAINER_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CONTAINER_TYPE" id="o<?= $Grid->RowIndex ?>_CONTAINER_TYPE" value="<?= HtmlEncode($Grid->CONTAINER_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group">
<input type="<?= $Grid->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" id="x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->CONTAINER_TYPE->EditValue ?>"<?= $Grid->CONTAINER_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?= $Grid->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Grid->CONTAINER_TYPE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" value="<?= HtmlEncode($Grid->CONTAINER_TYPE->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_CONTAINER_TYPE" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_CONTAINER_TYPE" value="<?= HtmlEncode($Grid->CONTAINER_TYPE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td data-name="CONTAINER_STRENGTH" <?= $Grid->CONTAINER_STRENGTH->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group">
<input type="<?= $Grid->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Grid->CONTAINER_STRENGTH->EditValue ?>"<?= $Grid->CONTAINER_STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" id="o<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?= HtmlEncode($Grid->CONTAINER_STRENGTH->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group">
<input type="<?= $Grid->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Grid->CONTAINER_STRENGTH->EditValue ?>"<?= $Grid->CONTAINER_STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?= $Grid->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Grid->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?= HtmlEncode($Grid->CONTAINER_STRENGTH->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?= HtmlEncode($Grid->CONTAINER_STRENGTH->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td data-name="TypeOfDrug" <?= $Grid->TypeOfDrug->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_TypeOfDrug"
        name="x<?= $Grid->RowIndex ?>_TypeOfDrug"
        class="form-control ew-select<?= $Grid->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug"
        data-table="pres_trade_combination_names_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Grid->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Grid->TypeOfDrug->editAttributes() ?>>
        <?= $Grid->TypeOfDrug->selectOptionListHtml("x{$Grid->RowIndex}_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug']"),
        options = { name: "x<?= $Grid->RowIndex ?>_TypeOfDrug", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TypeOfDrug" id="o<?= $Grid->RowIndex ?>_TypeOfDrug" value="<?= HtmlEncode($Grid->TypeOfDrug->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_TypeOfDrug"
        name="x<?= $Grid->RowIndex ?>_TypeOfDrug"
        class="form-control ew-select<?= $Grid->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug"
        data-table="pres_trade_combination_names_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Grid->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Grid->TypeOfDrug->editAttributes() ?>>
        <?= $Grid->TypeOfDrug->selectOptionListHtml("x{$Grid->RowIndex}_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug']"),
        options = { name: "x<?= $Grid->RowIndex ?>_TypeOfDrug", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug">
<span<?= $Grid->TypeOfDrug->viewAttributes() ?>>
<?= $Grid->TypeOfDrug->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-hidden="1" name="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_TypeOfDrug" id="fpres_trade_combination_names_newgrid$x<?= $Grid->RowIndex ?>_TypeOfDrug" value="<?= HtmlEncode($Grid->TypeOfDrug->FormValue) ?>">
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-hidden="1" name="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_TypeOfDrug" id="fpres_trade_combination_names_newgrid$o<?= $Grid->RowIndex ?>_TypeOfDrug" value="<?= HtmlEncode($Grid->TypeOfDrug->OldValue) ?>">
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
loadjs.ready(["fpres_trade_combination_names_newgrid","load"], function () {
    fpres_trade_combination_names_newgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_pres_trade_combination_names_new", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->ID->Visible) { // ID ?>
        <td data-name="ID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_ID" class="form-group pres_trade_combination_names_new_ID"></span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_ID" class="form-group pres_trade_combination_names_new_ID">
<span<?= $Grid->ID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ID->getDisplayValue($Grid->ID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ID" id="x<?= $Grid->RowIndex ?>_ID" value="<?= HtmlEncode($Grid->ID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ID" id="o<?= $Grid->RowIndex ?>_ID" value="<?= HtmlEncode($Grid->ID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->tradenames_id->Visible) { // tradenames_id ?>
        <td data-name="tradenames_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->tradenames_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<span<?= $Grid->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->tradenames_id->getDisplayValue($Grid->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_tradenames_id" name="x<?= $Grid->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Grid->tradenames_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<input type="<?= $Grid->tradenames_id->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?= $Grid->RowIndex ?>_tradenames_id" id="x<?= $Grid->RowIndex ?>_tradenames_id" size="30" placeholder="<?= HtmlEncode($Grid->tradenames_id->getPlaceHolder()) ?>" value="<?= $Grid->tradenames_id->EditValue ?>"<?= $Grid->tradenames_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->tradenames_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<span<?= $Grid->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->tradenames_id->getDisplayValue($Grid->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_tradenames_id" id="x<?= $Grid->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Grid->tradenames_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_tradenames_id" id="o<?= $Grid->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Grid->tradenames_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Drug_Name->Visible) { // Drug_Name ?>
        <td data-name="Drug_Name">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Drug_Name" class="form-group pres_trade_combination_names_new_Drug_Name">
<input type="<?= $Grid->Drug_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?= $Grid->RowIndex ?>_Drug_Name" id="x<?= $Grid->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Drug_Name->getPlaceHolder()) ?>" value="<?= $Grid->Drug_Name->EditValue ?>"<?= $Grid->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Drug_Name->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Drug_Name" class="form-group pres_trade_combination_names_new_Drug_Name">
<span<?= $Grid->Drug_Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Drug_Name->getDisplayValue($Grid->Drug_Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Drug_Name" id="x<?= $Grid->RowIndex ?>_Drug_Name" value="<?= HtmlEncode($Grid->Drug_Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Drug_Name" id="o<?= $Grid->RowIndex ?>_Drug_Name" value="<?= HtmlEncode($Grid->Drug_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Generic_Name->Visible) { // Generic_Name ?>
        <td data-name="Generic_Name">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Generic_Name" class="form-group pres_trade_combination_names_new_Generic_Name">
    <select
        id="x<?= $Grid->RowIndex ?>_Generic_Name"
        name="x<?= $Grid->RowIndex ?>_Generic_Name"
        class="form-control ew-select<?= $Grid->Generic_Name->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name"
        data-table="pres_trade_combination_names_new"
        data-field="x_Generic_Name"
        data-value-separator="<?= $Grid->Generic_Name->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Generic_Name->getPlaceHolder()) ?>"
        <?= $Grid->Generic_Name->editAttributes() ?>>
        <?= $Grid->Generic_Name->selectOptionListHtml("x{$Grid->RowIndex}_Generic_Name") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Generic_Name->getErrorMessage() ?></div>
<?= $Grid->Generic_Name->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Generic_Name") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Generic_Name", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Generic_Name", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Generic_Name.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Generic_Name" class="form-group pres_trade_combination_names_new_Generic_Name">
<span<?= $Grid->Generic_Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Generic_Name->getDisplayValue($Grid->Generic_Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Generic_Name" id="x<?= $Grid->RowIndex ?>_Generic_Name" value="<?= HtmlEncode($Grid->Generic_Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Generic_Name" id="o<?= $Grid->RowIndex ?>_Generic_Name" value="<?= HtmlEncode($Grid->Generic_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Trade_Name->Visible) { // Trade_Name ?>
        <td data-name="Trade_Name">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Trade_Name" class="form-group pres_trade_combination_names_new_Trade_Name">
<input type="<?= $Grid->Trade_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?= $Grid->RowIndex ?>_Trade_Name" id="x<?= $Grid->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->Trade_Name->getPlaceHolder()) ?>" value="<?= $Grid->Trade_Name->EditValue ?>"<?= $Grid->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Trade_Name->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Trade_Name" class="form-group pres_trade_combination_names_new_Trade_Name">
<span<?= $Grid->Trade_Name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Trade_Name->getDisplayValue($Grid->Trade_Name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Trade_Name" id="x<?= $Grid->RowIndex ?>_Trade_Name" value="<?= HtmlEncode($Grid->Trade_Name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Trade_Name" id="o<?= $Grid->RowIndex ?>_Trade_Name" value="<?= HtmlEncode($Grid->Trade_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PR_CODE->Visible) { // PR_CODE ?>
        <td data-name="PR_CODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_PR_CODE" class="form-group pres_trade_combination_names_new_PR_CODE">
<input type="<?= $Grid->PR_CODE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?= $Grid->RowIndex ?>_PR_CODE" id="x<?= $Grid->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->PR_CODE->getPlaceHolder()) ?>" value="<?= $Grid->PR_CODE->EditValue ?>"<?= $Grid->PR_CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PR_CODE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_PR_CODE" class="form-group pres_trade_combination_names_new_PR_CODE">
<span<?= $Grid->PR_CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PR_CODE->getDisplayValue($Grid->PR_CODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PR_CODE" id="x<?= $Grid->RowIndex ?>_PR_CODE" value="<?= HtmlEncode($Grid->PR_CODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PR_CODE" id="o<?= $Grid->RowIndex ?>_PR_CODE" value="<?= HtmlEncode($Grid->PR_CODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Form->Visible) { // Form ?>
        <td data-name="Form">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Form" class="form-group pres_trade_combination_names_new_Form">
    <select
        id="x<?= $Grid->RowIndex ?>_Form"
        name="x<?= $Grid->RowIndex ?>_Form"
        class="form-control ew-select<?= $Grid->Form->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form"
        data-table="pres_trade_combination_names_new"
        data-field="x_Form"
        data-value-separator="<?= $Grid->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Form->getPlaceHolder()) ?>"
        <?= $Grid->Form->editAttributes() ?>>
        <?= $Grid->Form->selectOptionListHtml("x{$Grid->RowIndex}_Form") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Form->getErrorMessage() ?></div>
<?= $Grid->Form->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Form", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Form" class="form-group pres_trade_combination_names_new_Form">
<span<?= $Grid->Form->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Form->getDisplayValue($Grid->Form->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Form" id="x<?= $Grid->RowIndex ?>_Form" value="<?= HtmlEncode($Grid->Form->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Form" id="o<?= $Grid->RowIndex ?>_Form" value="<?= HtmlEncode($Grid->Form->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Strength->Visible) { // Strength ?>
        <td data-name="Strength">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Strength" class="form-group pres_trade_combination_names_new_Strength">
<input type="<?= $Grid->Strength->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?= $Grid->RowIndex ?>_Strength" id="x<?= $Grid->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Strength->getPlaceHolder()) ?>" value="<?= $Grid->Strength->EditValue ?>"<?= $Grid->Strength->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Strength->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Strength" class="form-group pres_trade_combination_names_new_Strength">
<span<?= $Grid->Strength->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Strength->getDisplayValue($Grid->Strength->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Strength" id="x<?= $Grid->RowIndex ?>_Strength" value="<?= HtmlEncode($Grid->Strength->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Strength" id="o<?= $Grid->RowIndex ?>_Strength" value="<?= HtmlEncode($Grid->Strength->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Unit->Visible) { // Unit ?>
        <td data-name="Unit">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Unit" class="form-group pres_trade_combination_names_new_Unit">
    <select
        id="x<?= $Grid->RowIndex ?>_Unit"
        name="x<?= $Grid->RowIndex ?>_Unit"
        class="form-control ew-select<?= $Grid->Unit->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit"
        data-table="pres_trade_combination_names_new"
        data-field="x_Unit"
        data-value-separator="<?= $Grid->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->Unit->getPlaceHolder()) ?>"
        <?= $Grid->Unit->editAttributes() ?>>
        <?= $Grid->Unit->selectOptionListHtml("x{$Grid->RowIndex}_Unit") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->Unit->getErrorMessage() ?></div>
<?= $Grid->Unit->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit']"),
        options = { name: "x<?= $Grid->RowIndex ?>_Unit", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_Unit" class="form-group pres_trade_combination_names_new_Unit">
<span<?= $Grid->Unit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Unit->getDisplayValue($Grid->Unit->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Unit" id="x<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Unit" id="o<?= $Grid->RowIndex ?>_Unit" value="<?= HtmlEncode($Grid->Unit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td data-name="CONTAINER_TYPE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group pres_trade_combination_names_new_CONTAINER_TYPE">
<input type="<?= $Grid->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" id="x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->CONTAINER_TYPE->EditValue ?>"<?= $Grid->CONTAINER_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?= $Grid->CONTAINER_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CONTAINER_TYPE->getDisplayValue($Grid->CONTAINER_TYPE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" id="x<?= $Grid->RowIndex ?>_CONTAINER_TYPE" value="<?= HtmlEncode($Grid->CONTAINER_TYPE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CONTAINER_TYPE" id="o<?= $Grid->RowIndex ?>_CONTAINER_TYPE" value="<?= HtmlEncode($Grid->CONTAINER_TYPE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td data-name="CONTAINER_STRENGTH">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group pres_trade_combination_names_new_CONTAINER_STRENGTH">
<input type="<?= $Grid->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Grid->CONTAINER_STRENGTH->EditValue ?>"<?= $Grid->CONTAINER_STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?= $Grid->CONTAINER_STRENGTH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CONTAINER_STRENGTH->getDisplayValue($Grid->CONTAINER_STRENGTH->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" id="x<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?= HtmlEncode($Grid->CONTAINER_STRENGTH->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" id="o<?= $Grid->RowIndex ?>_CONTAINER_STRENGTH" value="<?= HtmlEncode($Grid->CONTAINER_STRENGTH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td data-name="TypeOfDrug">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_TypeOfDrug" class="form-group pres_trade_combination_names_new_TypeOfDrug">
    <select
        id="x<?= $Grid->RowIndex ?>_TypeOfDrug"
        name="x<?= $Grid->RowIndex ?>_TypeOfDrug"
        class="form-control ew-select<?= $Grid->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug"
        data-table="pres_trade_combination_names_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Grid->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Grid->TypeOfDrug->editAttributes() ?>>
        <?= $Grid->TypeOfDrug->selectOptionListHtml("x{$Grid->RowIndex}_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug']"),
        options = { name: "x<?= $Grid->RowIndex ?>_TypeOfDrug", selectId: "pres_trade_combination_names_new_x<?= $Grid->RowIndex ?>_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_TypeOfDrug" class="form-group pres_trade_combination_names_new_TypeOfDrug">
<span<?= $Grid->TypeOfDrug->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TypeOfDrug->getDisplayValue($Grid->TypeOfDrug->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TypeOfDrug" id="x<?= $Grid->RowIndex ?>_TypeOfDrug" value="<?= HtmlEncode($Grid->TypeOfDrug->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TypeOfDrug" id="o<?= $Grid->RowIndex ?>_TypeOfDrug" value="<?= HtmlEncode($Grid->TypeOfDrug->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpres_trade_combination_names_newgrid","load"], function() {
    fpres_trade_combination_names_newgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpres_trade_combination_names_newgrid">
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
    ew.addEventHandlers("pres_trade_combination_names_new");
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
        container: "gmp_pres_trade_combination_names_new",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

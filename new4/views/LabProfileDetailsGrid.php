<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("LabProfileDetailsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_profile_detailsgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    flab_profile_detailsgrid = new ew.Form("flab_profile_detailsgrid", "grid");
    flab_profile_detailsgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "lab_profile_details")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.lab_profile_details)
        ew.vars.tables.lab_profile_details = currentTable;
    flab_profile_detailsgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["ProfileCode", [fields.ProfileCode.visible && fields.ProfileCode.required ? ew.Validators.required(fields.ProfileCode.caption) : null], fields.ProfileCode.isInvalid],
        ["SubProfileCode", [fields.SubProfileCode.visible && fields.SubProfileCode.required ? ew.Validators.required(fields.SubProfileCode.caption) : null], fields.SubProfileCode.isInvalid],
        ["ProfileTestCode", [fields.ProfileTestCode.visible && fields.ProfileTestCode.required ? ew.Validators.required(fields.ProfileTestCode.caption) : null], fields.ProfileTestCode.isInvalid],
        ["ProfileSubTestCode", [fields.ProfileSubTestCode.visible && fields.ProfileSubTestCode.required ? ew.Validators.required(fields.ProfileSubTestCode.caption) : null], fields.ProfileSubTestCode.isInvalid],
        ["TestOrder", [fields.TestOrder.visible && fields.TestOrder.required ? ew.Validators.required(fields.TestOrder.caption) : null, ew.Validators.float], fields.TestOrder.isInvalid],
        ["TestAmount", [fields.TestAmount.visible && fields.TestAmount.required ? ew.Validators.required(fields.TestAmount.caption) : null, ew.Validators.float], fields.TestAmount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = flab_profile_detailsgrid,
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
    flab_profile_detailsgrid.validate = function () {
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
    flab_profile_detailsgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "ProfileCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SubProfileCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProfileTestCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ProfileSubTestCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestOrder", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestAmount", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    flab_profile_detailsgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    flab_profile_detailsgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    flab_profile_detailsgrid.lists.SubProfileCode = <?= $Grid->SubProfileCode->toClientList($Grid) ?>;
    flab_profile_detailsgrid.lists.ProfileTestCode = <?= $Grid->ProfileTestCode->toClientList($Grid) ?>;
    loadjs.done("flab_profile_detailsgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_profile_details">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="flab_profile_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_lab_profile_details" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_lab_profile_detailsgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_lab_profile_details_id" class="lab_profile_details_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->ProfileCode->Visible) { // ProfileCode ?>
        <th data-name="ProfileCode" class="<?= $Grid->ProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileCode" class="lab_profile_details_ProfileCode"><?= $Grid->renderSort($Grid->ProfileCode) ?></div></th>
<?php } ?>
<?php if ($Grid->SubProfileCode->Visible) { // SubProfileCode ?>
        <th data-name="SubProfileCode" class="<?= $Grid->SubProfileCode->headerCellClass() ?>"><div id="elh_lab_profile_details_SubProfileCode" class="lab_profile_details_SubProfileCode"><?= $Grid->renderSort($Grid->SubProfileCode) ?></div></th>
<?php } ?>
<?php if ($Grid->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <th data-name="ProfileTestCode" class="<?= $Grid->ProfileTestCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileTestCode" class="lab_profile_details_ProfileTestCode"><?= $Grid->renderSort($Grid->ProfileTestCode) ?></div></th>
<?php } ?>
<?php if ($Grid->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <th data-name="ProfileSubTestCode" class="<?= $Grid->ProfileSubTestCode->headerCellClass() ?>"><div id="elh_lab_profile_details_ProfileSubTestCode" class="lab_profile_details_ProfileSubTestCode"><?= $Grid->renderSort($Grid->ProfileSubTestCode) ?></div></th>
<?php } ?>
<?php if ($Grid->TestOrder->Visible) { // TestOrder ?>
        <th data-name="TestOrder" class="<?= $Grid->TestOrder->headerCellClass() ?>"><div id="elh_lab_profile_details_TestOrder" class="lab_profile_details_TestOrder"><?= $Grid->renderSort($Grid->TestOrder) ?></div></th>
<?php } ?>
<?php if ($Grid->TestAmount->Visible) { // TestAmount ?>
        <th data-name="TestAmount" class="<?= $Grid->TestAmount->headerCellClass() ?>"><div id="elh_lab_profile_details_TestAmount" class="lab_profile_details_TestAmount"><?= $Grid->renderSort($Grid->TestAmount) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_lab_profile_details", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_id" class="form-group"></span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_id" id="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_id" id="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->ProfileCode->Visible) { // ProfileCode ?>
        <td data-name="ProfileCode" <?= $Grid->ProfileCode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->ProfileCode->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<span<?= $Grid->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProfileCode->getDisplayValue($Grid->ProfileCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_ProfileCode" name="x<?= $Grid->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Grid->ProfileCode->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<input type="<?= $Grid->ProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?= $Grid->RowIndex ?>_ProfileCode" id="x<?= $Grid->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Grid->ProfileCode->getPlaceHolder()) ?>" value="<?= $Grid->ProfileCode->EditValue ?>"<?= $Grid->ProfileCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfileCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProfileCode" id="o<?= $Grid->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Grid->ProfileCode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->ProfileCode->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<span<?= $Grid->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProfileCode->getDisplayValue($Grid->ProfileCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_ProfileCode" name="x<?= $Grid->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Grid->ProfileCode->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileCode" class="form-group">
<input type="<?= $Grid->ProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?= $Grid->RowIndex ?>_ProfileCode" id="x<?= $Grid->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Grid->ProfileCode->getPlaceHolder()) ?>" value="<?= $Grid->ProfileCode->EditValue ?>"<?= $Grid->ProfileCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfileCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileCode">
<span<?= $Grid->ProfileCode->viewAttributes() ?>>
<?= $Grid->ProfileCode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" data-hidden="1" name="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_ProfileCode" id="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Grid->ProfileCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" data-hidden="1" name="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_ProfileCode" id="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Grid->ProfileCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SubProfileCode->Visible) { // SubProfileCode ?>
        <td data-name="SubProfileCode" <?= $Grid->SubProfileCode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_SubProfileCode" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_SubProfileCode"><?= EmptyValue(strval($Grid->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->SubProfileCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->SubProfileCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->SubProfileCode->ReadOnly || $Grid->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->SubProfileCode->getErrorMessage() ?></div>
<?= $Grid->SubProfileCode->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SubProfileCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_SubProfileCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SubProfileCode" id="x<?= $Grid->RowIndex ?>_SubProfileCode" value="<?= $Grid->SubProfileCode->CurrentValue ?>"<?= $Grid->SubProfileCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SubProfileCode" id="o<?= $Grid->RowIndex ?>_SubProfileCode" value="<?= HtmlEncode($Grid->SubProfileCode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_SubProfileCode" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_SubProfileCode"><?= EmptyValue(strval($Grid->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->SubProfileCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->SubProfileCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->SubProfileCode->ReadOnly || $Grid->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->SubProfileCode->getErrorMessage() ?></div>
<?= $Grid->SubProfileCode->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SubProfileCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_SubProfileCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SubProfileCode" id="x<?= $Grid->RowIndex ?>_SubProfileCode" value="<?= $Grid->SubProfileCode->CurrentValue ?>"<?= $Grid->SubProfileCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_SubProfileCode">
<span<?= $Grid->SubProfileCode->viewAttributes() ?>>
<?= $Grid->SubProfileCode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-hidden="1" name="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_SubProfileCode" id="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_SubProfileCode" value="<?= HtmlEncode($Grid->SubProfileCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-hidden="1" name="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_SubProfileCode" id="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_SubProfileCode" value="<?= HtmlEncode($Grid->SubProfileCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <td data-name="ProfileTestCode" <?= $Grid->ProfileTestCode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileTestCode" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_ProfileTestCode"><?= EmptyValue(strval($Grid->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->ProfileTestCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->ProfileTestCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->ProfileTestCode->ReadOnly || $Grid->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->ProfileTestCode->getErrorMessage() ?></div>
<?= $Grid->ProfileTestCode->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_ProfileTestCode" id="x<?= $Grid->RowIndex ?>_ProfileTestCode" value="<?= $Grid->ProfileTestCode->CurrentValue ?>"<?= $Grid->ProfileTestCode->editAttributes() ?>>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProfileTestCode" id="o<?= $Grid->RowIndex ?>_ProfileTestCode" value="<?= HtmlEncode($Grid->ProfileTestCode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileTestCode" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_ProfileTestCode"><?= EmptyValue(strval($Grid->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->ProfileTestCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->ProfileTestCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->ProfileTestCode->ReadOnly || $Grid->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->ProfileTestCode->getErrorMessage() ?></div>
<?= $Grid->ProfileTestCode->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_ProfileTestCode" id="x<?= $Grid->RowIndex ?>_ProfileTestCode" value="<?= $Grid->ProfileTestCode->CurrentValue ?>"<?= $Grid->ProfileTestCode->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileTestCode">
<span<?= $Grid->ProfileTestCode->viewAttributes() ?>>
<?= $Grid->ProfileTestCode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-hidden="1" name="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_ProfileTestCode" id="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_ProfileTestCode" value="<?= HtmlEncode($Grid->ProfileTestCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-hidden="1" name="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_ProfileTestCode" id="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_ProfileTestCode" value="<?= HtmlEncode($Grid->ProfileTestCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <td data-name="ProfileSubTestCode" <?= $Grid->ProfileSubTestCode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileSubTestCode" class="form-group">
<input type="<?= $Grid->ProfileSubTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?= $Grid->RowIndex ?>_ProfileSubTestCode" id="x<?= $Grid->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?= HtmlEncode($Grid->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?= $Grid->ProfileSubTestCode->EditValue ?>"<?= $Grid->ProfileSubTestCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfileSubTestCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProfileSubTestCode" id="o<?= $Grid->RowIndex ?>_ProfileSubTestCode" value="<?= HtmlEncode($Grid->ProfileSubTestCode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileSubTestCode" class="form-group">
<input type="<?= $Grid->ProfileSubTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?= $Grid->RowIndex ?>_ProfileSubTestCode" id="x<?= $Grid->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?= HtmlEncode($Grid->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?= $Grid->ProfileSubTestCode->EditValue ?>"<?= $Grid->ProfileSubTestCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfileSubTestCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_ProfileSubTestCode">
<span<?= $Grid->ProfileSubTestCode->viewAttributes() ?>>
<?= $Grid->ProfileSubTestCode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" data-hidden="1" name="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_ProfileSubTestCode" id="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_ProfileSubTestCode" value="<?= HtmlEncode($Grid->ProfileSubTestCode->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" data-hidden="1" name="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_ProfileSubTestCode" id="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_ProfileSubTestCode" value="<?= HtmlEncode($Grid->ProfileSubTestCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestOrder->Visible) { // TestOrder ?>
        <td data-name="TestOrder" <?= $Grid->TestOrder->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_TestOrder" class="form-group">
<input type="<?= $Grid->TestOrder->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?= $Grid->RowIndex ?>_TestOrder" id="x<?= $Grid->RowIndex ?>_TestOrder" size="30" placeholder="<?= HtmlEncode($Grid->TestOrder->getPlaceHolder()) ?>" value="<?= $Grid->TestOrder->EditValue ?>"<?= $Grid->TestOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestOrder->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestOrder" id="o<?= $Grid->RowIndex ?>_TestOrder" value="<?= HtmlEncode($Grid->TestOrder->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_TestOrder" class="form-group">
<input type="<?= $Grid->TestOrder->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?= $Grid->RowIndex ?>_TestOrder" id="x<?= $Grid->RowIndex ?>_TestOrder" size="30" placeholder="<?= HtmlEncode($Grid->TestOrder->getPlaceHolder()) ?>" value="<?= $Grid->TestOrder->EditValue ?>"<?= $Grid->TestOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestOrder->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_TestOrder">
<span<?= $Grid->TestOrder->viewAttributes() ?>>
<?= $Grid->TestOrder->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" data-hidden="1" name="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_TestOrder" id="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_TestOrder" value="<?= HtmlEncode($Grid->TestOrder->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" data-hidden="1" name="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_TestOrder" id="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_TestOrder" value="<?= HtmlEncode($Grid->TestOrder->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestAmount->Visible) { // TestAmount ?>
        <td data-name="TestAmount" <?= $Grid->TestAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_TestAmount" class="form-group">
<input type="<?= $Grid->TestAmount->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?= $Grid->RowIndex ?>_TestAmount" id="x<?= $Grid->RowIndex ?>_TestAmount" size="30" placeholder="<?= HtmlEncode($Grid->TestAmount->getPlaceHolder()) ?>" value="<?= $Grid->TestAmount->EditValue ?>"<?= $Grid->TestAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestAmount" id="o<?= $Grid->RowIndex ?>_TestAmount" value="<?= HtmlEncode($Grid->TestAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_TestAmount" class="form-group">
<input type="<?= $Grid->TestAmount->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?= $Grid->RowIndex ?>_TestAmount" id="x<?= $Grid->RowIndex ?>_TestAmount" size="30" placeholder="<?= HtmlEncode($Grid->TestAmount->getPlaceHolder()) ?>" value="<?= $Grid->TestAmount->EditValue ?>"<?= $Grid->TestAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_lab_profile_details_TestAmount">
<span<?= $Grid->TestAmount->viewAttributes() ?>>
<?= $Grid->TestAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" data-hidden="1" name="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_TestAmount" id="flab_profile_detailsgrid$x<?= $Grid->RowIndex ?>_TestAmount" value="<?= HtmlEncode($Grid->TestAmount->FormValue) ?>">
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" data-hidden="1" name="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_TestAmount" id="flab_profile_detailsgrid$o<?= $Grid->RowIndex ?>_TestAmount" value="<?= HtmlEncode($Grid->TestAmount->OldValue) ?>">
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
loadjs.ready(["flab_profile_detailsgrid","load"], function () {
    flab_profile_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_lab_profile_details", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_lab_profile_details_id" class="form-group lab_profile_details_id"></span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_id" class="form-group lab_profile_details_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ProfileCode->Visible) { // ProfileCode ?>
        <td data-name="ProfileCode">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->ProfileCode->getSessionValue() != "") { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<span<?= $Grid->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProfileCode->getDisplayValue($Grid->ProfileCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_ProfileCode" name="x<?= $Grid->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Grid->ProfileCode->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<input type="<?= $Grid->ProfileCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileCode" name="x<?= $Grid->RowIndex ?>_ProfileCode" id="x<?= $Grid->RowIndex ?>_ProfileCode" size="30" maxlength="6" placeholder="<?= HtmlEncode($Grid->ProfileCode->getPlaceHolder()) ?>" value="<?= $Grid->ProfileCode->EditValue ?>"<?= $Grid->ProfileCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfileCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileCode" class="form-group lab_profile_details_ProfileCode">
<span<?= $Grid->ProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProfileCode->getDisplayValue($Grid->ProfileCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProfileCode" id="x<?= $Grid->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Grid->ProfileCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProfileCode" id="o<?= $Grid->RowIndex ?>_ProfileCode" value="<?= HtmlEncode($Grid->ProfileCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SubProfileCode->Visible) { // SubProfileCode ?>
        <td data-name="SubProfileCode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_SubProfileCode" class="form-group lab_profile_details_SubProfileCode">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_SubProfileCode"><?= EmptyValue(strval($Grid->SubProfileCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->SubProfileCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->SubProfileCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->SubProfileCode->ReadOnly || $Grid->SubProfileCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_SubProfileCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->SubProfileCode->getErrorMessage() ?></div>
<?= $Grid->SubProfileCode->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_SubProfileCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_SubProfileCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->SubProfileCode->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_SubProfileCode" id="x<?= $Grid->RowIndex ?>_SubProfileCode" value="<?= $Grid->SubProfileCode->CurrentValue ?>"<?= $Grid->SubProfileCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_SubProfileCode" class="form-group lab_profile_details_SubProfileCode">
<span<?= $Grid->SubProfileCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SubProfileCode->getDisplayValue($Grid->SubProfileCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SubProfileCode" id="x<?= $Grid->RowIndex ?>_SubProfileCode" value="<?= HtmlEncode($Grid->SubProfileCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_SubProfileCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SubProfileCode" id="o<?= $Grid->RowIndex ?>_SubProfileCode" value="<?= HtmlEncode($Grid->SubProfileCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <td data-name="ProfileTestCode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_ProfileTestCode" class="form-group lab_profile_details_ProfileTestCode">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_ProfileTestCode"><?= EmptyValue(strval($Grid->ProfileTestCode->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->ProfileTestCode->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->ProfileTestCode->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->ProfileTestCode->ReadOnly || $Grid->ProfileTestCode->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_ProfileTestCode',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->ProfileTestCode->getErrorMessage() ?></div>
<?= $Grid->ProfileTestCode->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_ProfileTestCode") ?>
<input type="hidden" is="selection-list" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->ProfileTestCode->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_ProfileTestCode" id="x<?= $Grid->RowIndex ?>_ProfileTestCode" value="<?= $Grid->ProfileTestCode->CurrentValue ?>"<?= $Grid->ProfileTestCode->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileTestCode" class="form-group lab_profile_details_ProfileTestCode">
<span<?= $Grid->ProfileTestCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProfileTestCode->getDisplayValue($Grid->ProfileTestCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProfileTestCode" id="x<?= $Grid->RowIndex ?>_ProfileTestCode" value="<?= HtmlEncode($Grid->ProfileTestCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileTestCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProfileTestCode" id="o<?= $Grid->RowIndex ?>_ProfileTestCode" value="<?= HtmlEncode($Grid->ProfileTestCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <td data-name="ProfileSubTestCode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_ProfileSubTestCode" class="form-group lab_profile_details_ProfileSubTestCode">
<input type="<?= $Grid->ProfileSubTestCode->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" name="x<?= $Grid->RowIndex ?>_ProfileSubTestCode" id="x<?= $Grid->RowIndex ?>_ProfileSubTestCode" size="30" maxlength="3" placeholder="<?= HtmlEncode($Grid->ProfileSubTestCode->getPlaceHolder()) ?>" value="<?= $Grid->ProfileSubTestCode->EditValue ?>"<?= $Grid->ProfileSubTestCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ProfileSubTestCode->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_ProfileSubTestCode" class="form-group lab_profile_details_ProfileSubTestCode">
<span<?= $Grid->ProfileSubTestCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ProfileSubTestCode->getDisplayValue($Grid->ProfileSubTestCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ProfileSubTestCode" id="x<?= $Grid->RowIndex ?>_ProfileSubTestCode" value="<?= HtmlEncode($Grid->ProfileSubTestCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_ProfileSubTestCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ProfileSubTestCode" id="o<?= $Grid->RowIndex ?>_ProfileSubTestCode" value="<?= HtmlEncode($Grid->ProfileSubTestCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestOrder->Visible) { // TestOrder ?>
        <td data-name="TestOrder">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_TestOrder" class="form-group lab_profile_details_TestOrder">
<input type="<?= $Grid->TestOrder->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestOrder" name="x<?= $Grid->RowIndex ?>_TestOrder" id="x<?= $Grid->RowIndex ?>_TestOrder" size="30" placeholder="<?= HtmlEncode($Grid->TestOrder->getPlaceHolder()) ?>" value="<?= $Grid->TestOrder->EditValue ?>"<?= $Grid->TestOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestOrder->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_TestOrder" class="form-group lab_profile_details_TestOrder">
<span<?= $Grid->TestOrder->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestOrder->getDisplayValue($Grid->TestOrder->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestOrder" id="x<?= $Grid->RowIndex ?>_TestOrder" value="<?= HtmlEncode($Grid->TestOrder->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestOrder" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestOrder" id="o<?= $Grid->RowIndex ?>_TestOrder" value="<?= HtmlEncode($Grid->TestOrder->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestAmount->Visible) { // TestAmount ?>
        <td data-name="TestAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_lab_profile_details_TestAmount" class="form-group lab_profile_details_TestAmount">
<input type="<?= $Grid->TestAmount->getInputTextType() ?>" data-table="lab_profile_details" data-field="x_TestAmount" name="x<?= $Grid->RowIndex ?>_TestAmount" id="x<?= $Grid->RowIndex ?>_TestAmount" size="30" placeholder="<?= HtmlEncode($Grid->TestAmount->getPlaceHolder()) ?>" value="<?= $Grid->TestAmount->EditValue ?>"<?= $Grid->TestAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_lab_profile_details_TestAmount" class="form-group lab_profile_details_TestAmount">
<span<?= $Grid->TestAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestAmount->getDisplayValue($Grid->TestAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestAmount" id="x<?= $Grid->RowIndex ?>_TestAmount" value="<?= HtmlEncode($Grid->TestAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="lab_profile_details" data-field="x_TestAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestAmount" id="o<?= $Grid->RowIndex ?>_TestAmount" value="<?= HtmlEncode($Grid->TestAmount->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["flab_profile_detailsgrid","load"], function() {
    flab_profile_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="flab_profile_detailsgrid">
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
    ew.addEventHandlers("lab_profile_details");
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
        container: "gmp_lab_profile_details",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PharmacyServicesGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_servicesgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpharmacy_servicesgrid = new ew.Form("fpharmacy_servicesgrid", "grid");
    fpharmacy_servicesgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_services")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_services)
        ew.vars.tables.pharmacy_services = currentTable;
    fpharmacy_servicesgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["pharmacy_id", [fields.pharmacy_id.visible && fields.pharmacy_id.required ? ew.Validators.required(fields.pharmacy_id.caption) : null], fields.pharmacy_id.isInvalid],
        ["patient_id", [fields.patient_id.visible && fields.patient_id.required ? ew.Validators.required(fields.patient_id.caption) : null, ew.Validators.integer], fields.patient_id.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["charged_date", [fields.charged_date.visible && fields.charged_date.required ? ew.Validators.required(fields.charged_date.caption) : null], fields.charged_date.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_servicesgrid,
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
    fpharmacy_servicesgrid.validate = function () {
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
    fpharmacy_servicesgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "pharmacy_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "patient_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_servicesgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_servicesgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_servicesgrid.lists.pharmacy_id = <?= $Grid->pharmacy_id->toClientList($Grid) ?>;
    fpharmacy_servicesgrid.lists.name = <?= $Grid->name->toClientList($Grid) ?>;
    fpharmacy_servicesgrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("fpharmacy_servicesgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_services">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpharmacy_servicesgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_pharmacy_services" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_pharmacy_servicesgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_pharmacy_services_id" class="pharmacy_services_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->pharmacy_id->Visible) { // pharmacy_id ?>
        <th data-name="pharmacy_id" class="<?= $Grid->pharmacy_id->headerCellClass() ?>"><div id="elh_pharmacy_services_pharmacy_id" class="pharmacy_services_pharmacy_id"><?= $Grid->renderSort($Grid->pharmacy_id) ?></div></th>
<?php } ?>
<?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Grid->patient_id->headerCellClass() ?>"><div id="elh_pharmacy_services_patient_id" class="pharmacy_services_patient_id"><?= $Grid->renderSort($Grid->patient_id) ?></div></th>
<?php } ?>
<?php if ($Grid->name->Visible) { // name ?>
        <th data-name="name" class="<?= $Grid->name->headerCellClass() ?>"><div id="elh_pharmacy_services_name" class="pharmacy_services_name"><?= $Grid->renderSort($Grid->name) ?></div></th>
<?php } ?>
<?php if ($Grid->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Grid->amount->headerCellClass() ?>"><div id="elh_pharmacy_services_amount" class="pharmacy_services_amount"><?= $Grid->renderSort($Grid->amount) ?></div></th>
<?php } ?>
<?php if ($Grid->charged_date->Visible) { // charged_date ?>
        <th data-name="charged_date" class="<?= $Grid->charged_date->headerCellClass() ?>"><div id="elh_pharmacy_services_charged_date" class="pharmacy_services_charged_date"><?= $Grid->renderSort($Grid->charged_date) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_pharmacy_services_status" class="pharmacy_services_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_pharmacy_services", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" data-hidden="1" name="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_id" id="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_id" data-hidden="1" name="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_id" id="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_services" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->pharmacy_id->Visible) { // pharmacy_id ?>
        <td data-name="pharmacy_id" <?= $Grid->pharmacy_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->pharmacy_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_pharmacy_id" class="form-group">
<span<?= $Grid->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pharmacy_id->getDisplayValue($Grid->pharmacy_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_pharmacy_id" name="x<?= $Grid->RowIndex ?>_pharmacy_id" value="<?= HtmlEncode($Grid->pharmacy_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_pharmacy_id" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_pharmacy_id"
        name="x<?= $Grid->RowIndex ?>_pharmacy_id"
        class="form-control ew-select<?= $Grid->pharmacy_id->isInvalidClass() ?>"
        data-select2-id="pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id"
        data-table="pharmacy_services"
        data-field="x_pharmacy_id"
        data-value-separator="<?= $Grid->pharmacy_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->pharmacy_id->getPlaceHolder()) ?>"
        <?= $Grid->pharmacy_id->editAttributes() ?>>
        <?= $Grid->pharmacy_id->selectOptionListHtml("x{$Grid->RowIndex}_pharmacy_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->pharmacy_id->getErrorMessage() ?></div>
<?= $Grid->pharmacy_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_pharmacy_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id']"),
        options = { name: "x<?= $Grid->RowIndex ?>_pharmacy_id", selectId: "pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_services.fields.pharmacy_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_pharmacy_id" id="o<?= $Grid->RowIndex ?>_pharmacy_id" value="<?= HtmlEncode($Grid->pharmacy_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->pharmacy_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_pharmacy_id" class="form-group">
<span<?= $Grid->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pharmacy_id->getDisplayValue($Grid->pharmacy_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_pharmacy_id" name="x<?= $Grid->RowIndex ?>_pharmacy_id" value="<?= HtmlEncode($Grid->pharmacy_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_pharmacy_id" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_pharmacy_id"
        name="x<?= $Grid->RowIndex ?>_pharmacy_id"
        class="form-control ew-select<?= $Grid->pharmacy_id->isInvalidClass() ?>"
        data-select2-id="pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id"
        data-table="pharmacy_services"
        data-field="x_pharmacy_id"
        data-value-separator="<?= $Grid->pharmacy_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->pharmacy_id->getPlaceHolder()) ?>"
        <?= $Grid->pharmacy_id->editAttributes() ?>>
        <?= $Grid->pharmacy_id->selectOptionListHtml("x{$Grid->RowIndex}_pharmacy_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->pharmacy_id->getErrorMessage() ?></div>
<?= $Grid->pharmacy_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_pharmacy_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id']"),
        options = { name: "x<?= $Grid->RowIndex ?>_pharmacy_id", selectId: "pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_services.fields.pharmacy_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_pharmacy_id">
<span<?= $Grid->pharmacy_id->viewAttributes() ?>>
<?= $Grid->pharmacy_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" data-hidden="1" name="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_pharmacy_id" id="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_pharmacy_id" value="<?= HtmlEncode($Grid->pharmacy_id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" data-hidden="1" name="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_pharmacy_id" id="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_pharmacy_id" value="<?= HtmlEncode($Grid->pharmacy_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Grid->patient_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->patient_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_patient_id" class="form-group">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_patient_id" class="form-group">
<input type="<?= $Grid->patient_id->getInputTextType() ?>" data-table="pharmacy_services" data-field="x_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" size="30" placeholder="<?= HtmlEncode($Grid->patient_id->getPlaceHolder()) ?>" value="<?= $Grid->patient_id->EditValue ?>"<?= $Grid->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient_id" id="o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->patient_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_patient_id" class="form-group">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_patient_id" class="form-group">
<input type="<?= $Grid->patient_id->getInputTextType() ?>" data-table="pharmacy_services" data-field="x_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" size="30" placeholder="<?= HtmlEncode($Grid->patient_id->getPlaceHolder()) ?>" value="<?= $Grid->patient_id->EditValue ?>"<?= $Grid->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<?= $Grid->patient_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" data-hidden="1" name="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_patient_id" id="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" data-hidden="1" name="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_patient_id" id="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->name->Visible) { // name ?>
        <td data-name="name" <?= $Grid->name->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->name->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_name" class="form-group">
<span<?= $Grid->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->name->getDisplayValue($Grid->name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_name" name="x<?= $Grid->RowIndex ?>_name" value="<?= HtmlEncode($Grid->name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_name" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_name"><?= EmptyValue(strval($Grid->name->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->name->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->name->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->name->ReadOnly || $Grid->name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->name->getErrorMessage() ?></div>
<?= $Grid->name->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_name") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_services" data-field="x_name" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->name->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_name" id="x<?= $Grid->RowIndex ?>_name" value="<?= $Grid->name->CurrentValue ?>"<?= $Grid->name->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_name" id="o<?= $Grid->RowIndex ?>_name" value="<?= HtmlEncode($Grid->name->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->name->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_name" class="form-group">
<span<?= $Grid->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->name->getDisplayValue($Grid->name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_name" name="x<?= $Grid->RowIndex ?>_name" value="<?= HtmlEncode($Grid->name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_name" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_name"><?= EmptyValue(strval($Grid->name->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->name->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->name->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->name->ReadOnly || $Grid->name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->name->getErrorMessage() ?></div>
<?= $Grid->name->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_name") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_services" data-field="x_name" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->name->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_name" id="x<?= $Grid->RowIndex ?>_name" value="<?= $Grid->name->CurrentValue ?>"<?= $Grid->name->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_name">
<span<?= $Grid->name->viewAttributes() ?>>
<?= $Grid->name->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-hidden="1" name="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_name" id="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_name" value="<?= HtmlEncode($Grid->name->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-hidden="1" name="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_name" id="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_name" value="<?= HtmlEncode($Grid->name->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Grid->amount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->amount->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_amount" class="form-group">
<span<?= $Grid->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->amount->getDisplayValue($Grid->amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_amount" name="x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_amount" class="form-group">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="pharmacy_services" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="30" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_amount" id="o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->amount->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_amount" class="form-group">
<span<?= $Grid->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->amount->getDisplayValue($Grid->amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_amount" name="x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_amount" class="form-group">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="pharmacy_services" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="30" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_amount">
<span<?= $Grid->amount->viewAttributes() ?>>
<?= $Grid->amount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" data-hidden="1" name="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_amount" id="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" data-hidden="1" name="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_amount" id="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date" <?= $Grid->charged_date->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_charged_date" id="o<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_charged_date">
<span<?= $Grid->charged_date->viewAttributes() ?>>
<?= $Grid->charged_date->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" data-hidden="1" name="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_charged_date" id="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" data-hidden="1" name="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_charged_date" id="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="pharmacy_services_x<?= $Grid->RowIndex ?>_status"
        data-table="pharmacy_services"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_services_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "pharmacy_services_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="pharmacy_services_x<?= $Grid->RowIndex ?>_status"
        data-table="pharmacy_services"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_services_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "pharmacy_services_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_pharmacy_services_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" data-hidden="1" name="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_status" id="fpharmacy_servicesgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="pharmacy_services" data-field="x_status" data-hidden="1" name="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_status" id="fpharmacy_servicesgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
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
loadjs.ready(["fpharmacy_servicesgrid","load"], function () {
    fpharmacy_servicesgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_pharmacy_services", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_pharmacy_services_id" class="form-group pharmacy_services_id"></span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_id" class="form-group pharmacy_services_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->pharmacy_id->Visible) { // pharmacy_id ?>
        <td data-name="pharmacy_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->pharmacy_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<span<?= $Grid->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pharmacy_id->getDisplayValue($Grid->pharmacy_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_pharmacy_id" name="x<?= $Grid->RowIndex ?>_pharmacy_id" value="<?= HtmlEncode($Grid->pharmacy_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
    <select
        id="x<?= $Grid->RowIndex ?>_pharmacy_id"
        name="x<?= $Grid->RowIndex ?>_pharmacy_id"
        class="form-control ew-select<?= $Grid->pharmacy_id->isInvalidClass() ?>"
        data-select2-id="pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id"
        data-table="pharmacy_services"
        data-field="x_pharmacy_id"
        data-value-separator="<?= $Grid->pharmacy_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->pharmacy_id->getPlaceHolder()) ?>"
        <?= $Grid->pharmacy_id->editAttributes() ?>>
        <?= $Grid->pharmacy_id->selectOptionListHtml("x{$Grid->RowIndex}_pharmacy_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->pharmacy_id->getErrorMessage() ?></div>
<?= $Grid->pharmacy_id->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_pharmacy_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id']"),
        options = { name: "x<?= $Grid->RowIndex ?>_pharmacy_id", selectId: "pharmacy_services_x<?= $Grid->RowIndex ?>_pharmacy_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_services.fields.pharmacy_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_pharmacy_id" class="form-group pharmacy_services_pharmacy_id">
<span<?= $Grid->pharmacy_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->pharmacy_id->getDisplayValue($Grid->pharmacy_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_pharmacy_id" id="x<?= $Grid->RowIndex ?>_pharmacy_id" value="<?= HtmlEncode($Grid->pharmacy_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_pharmacy_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_pharmacy_id" id="o<?= $Grid->RowIndex ?>_pharmacy_id" value="<?= HtmlEncode($Grid->pharmacy_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->patient_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<input type="<?= $Grid->patient_id->getInputTextType() ?>" data-table="pharmacy_services" data-field="x_patient_id" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" size="30" placeholder="<?= HtmlEncode($Grid->patient_id->getPlaceHolder()) ?>" value="<?= $Grid->patient_id->EditValue ?>"<?= $Grid->patient_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->patient_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_patient_id" class="form-group pharmacy_services_patient_id">
<span<?= $Grid->patient_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->patient_id->getDisplayValue($Grid->patient_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_patient_id" id="x<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_patient_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_patient_id" id="o<?= $Grid->RowIndex ?>_patient_id" value="<?= HtmlEncode($Grid->patient_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->name->Visible) { // name ?>
        <td data-name="name">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->name->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_services_name" class="form-group pharmacy_services_name">
<span<?= $Grid->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->name->getDisplayValue($Grid->name->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_name" name="x<?= $Grid->RowIndex ?>_name" value="<?= HtmlEncode($Grid->name->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_name" class="form-group pharmacy_services_name">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_name"><?= EmptyValue(strval($Grid->name->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->name->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->name->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->name->ReadOnly || $Grid->name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->name->getErrorMessage() ?></div>
<?= $Grid->name->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_name") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_services" data-field="x_name" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->name->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_name" id="x<?= $Grid->RowIndex ?>_name" value="<?= $Grid->name->CurrentValue ?>"<?= $Grid->name->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_name" class="form-group pharmacy_services_name">
<span<?= $Grid->name->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->name->getDisplayValue($Grid->name->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-hidden="1" name="x<?= $Grid->RowIndex ?>_name" id="x<?= $Grid->RowIndex ?>_name" value="<?= HtmlEncode($Grid->name->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_name" data-hidden="1" name="o<?= $Grid->RowIndex ?>_name" id="o<?= $Grid->RowIndex ?>_name" value="<?= HtmlEncode($Grid->name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->amount->Visible) { // amount ?>
        <td data-name="amount">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->amount->getSessionValue() != "") { ?>
<span id="el$rowindex$_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<span<?= $Grid->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->amount->getDisplayValue($Grid->amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_amount" name="x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="pharmacy_services" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="30" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_amount" class="form-group pharmacy_services_amount">
<span<?= $Grid->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->amount->getDisplayValue($Grid->amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_amount" id="o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->charged_date->Visible) { // charged_date ?>
        <td data-name="charged_date">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_charged_date" class="form-group pharmacy_services_charged_date">
<span<?= $Grid->charged_date->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->charged_date->getDisplayValue($Grid->charged_date->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" data-hidden="1" name="x<?= $Grid->RowIndex ?>_charged_date" id="x<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_charged_date" data-hidden="1" name="o<?= $Grid->RowIndex ?>_charged_date" id="o<?= $Grid->RowIndex ?>_charged_date" value="<?= HtmlEncode($Grid->charged_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_pharmacy_services_status" class="form-group pharmacy_services_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="pharmacy_services_x<?= $Grid->RowIndex ?>_status"
        data-table="pharmacy_services"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_services_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "pharmacy_services_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_services.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_pharmacy_services_status" class="form-group pharmacy_services_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="pharmacy_services" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_servicesgrid","load"], function() {
    fpharmacy_servicesgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpharmacy_servicesgrid">
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
    ew.addEventHandlers("pharmacy_services");
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
        container: "gmp_pharmacy_services",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("EmployeeAddressGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_addressgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    femployee_addressgrid = new ew.Form("femployee_addressgrid", "grid");
    femployee_addressgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_address")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.employee_address)
        ew.vars.tables.employee_address = currentTable;
    femployee_addressgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["employee_id", [fields.employee_id.visible && fields.employee_id.required ? ew.Validators.required(fields.employee_id.caption) : null, ew.Validators.integer], fields.employee_id.isInvalid],
        ["contact_persion", [fields.contact_persion.visible && fields.contact_persion.required ? ew.Validators.required(fields.contact_persion.caption) : null], fields.contact_persion.isInvalid],
        ["street", [fields.street.visible && fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["town", [fields.town.visible && fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["address_type", [fields.address_type.visible && fields.address_type.required ? ew.Validators.required(fields.address_type.caption) : null], fields.address_type.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = femployee_addressgrid,
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
    femployee_addressgrid.validate = function () {
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
    femployee_addressgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "employee_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "contact_persion", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "street", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "town", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "province", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "postal_code", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "address_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    femployee_addressgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_addressgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_addressgrid.lists.address_type = <?= $Grid->address_type->toClientList($Grid) ?>;
    femployee_addressgrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("femployee_addressgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_address">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="femployee_addressgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_employee_address" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_employee_addressgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_employee_address_id" class="employee_address_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Grid->employee_id->headerCellClass() ?>"><div id="elh_employee_address_employee_id" class="employee_address_employee_id"><?= $Grid->renderSort($Grid->employee_id) ?></div></th>
<?php } ?>
<?php if ($Grid->contact_persion->Visible) { // contact_persion ?>
        <th data-name="contact_persion" class="<?= $Grid->contact_persion->headerCellClass() ?>"><div id="elh_employee_address_contact_persion" class="employee_address_contact_persion"><?= $Grid->renderSort($Grid->contact_persion) ?></div></th>
<?php } ?>
<?php if ($Grid->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Grid->street->headerCellClass() ?>"><div id="elh_employee_address_street" class="employee_address_street"><?= $Grid->renderSort($Grid->street) ?></div></th>
<?php } ?>
<?php if ($Grid->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Grid->town->headerCellClass() ?>"><div id="elh_employee_address_town" class="employee_address_town"><?= $Grid->renderSort($Grid->town) ?></div></th>
<?php } ?>
<?php if ($Grid->province->Visible) { // province ?>
        <th data-name="province" class="<?= $Grid->province->headerCellClass() ?>"><div id="elh_employee_address_province" class="employee_address_province"><?= $Grid->renderSort($Grid->province) ?></div></th>
<?php } ?>
<?php if ($Grid->postal_code->Visible) { // postal_code ?>
        <th data-name="postal_code" class="<?= $Grid->postal_code->headerCellClass() ?>"><div id="elh_employee_address_postal_code" class="employee_address_postal_code"><?= $Grid->renderSort($Grid->postal_code) ?></div></th>
<?php } ?>
<?php if ($Grid->address_type->Visible) { // address_type ?>
        <th data-name="address_type" class="<?= $Grid->address_type->headerCellClass() ?>"><div id="elh_employee_address_address_type" class="employee_address_address_type"><?= $Grid->renderSort($Grid->address_type) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_employee_address_status" class="employee_address_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_employee_address_HospID" class="employee_address_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_employee_address", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_employee_address_id" class="form-group"></span>
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_id" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_id" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Grid->employee_id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_address" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_employee_id" class="form-group">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_employee_id" class="form-group">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_address" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<?= $Grid->employee_id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_employee_id" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_employee_id" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_employee_id" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->contact_persion->Visible) { // contact_persion ?>
        <td data-name="contact_persion" <?= $Grid->contact_persion->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_contact_persion" class="form-group">
<input type="<?= $Grid->contact_persion->getInputTextType() ?>" data-table="employee_address" data-field="x_contact_persion" name="x<?= $Grid->RowIndex ?>_contact_persion" id="x<?= $Grid->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->contact_persion->getPlaceHolder()) ?>" value="<?= $Grid->contact_persion->EditValue ?>"<?= $Grid->contact_persion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->contact_persion->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" data-hidden="1" name="o<?= $Grid->RowIndex ?>_contact_persion" id="o<?= $Grid->RowIndex ?>_contact_persion" value="<?= HtmlEncode($Grid->contact_persion->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_contact_persion" class="form-group">
<input type="<?= $Grid->contact_persion->getInputTextType() ?>" data-table="employee_address" data-field="x_contact_persion" name="x<?= $Grid->RowIndex ?>_contact_persion" id="x<?= $Grid->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->contact_persion->getPlaceHolder()) ?>" value="<?= $Grid->contact_persion->EditValue ?>"<?= $Grid->contact_persion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->contact_persion->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_contact_persion">
<span<?= $Grid->contact_persion->viewAttributes() ?>>
<?= $Grid->contact_persion->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_contact_persion" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_contact_persion" value="<?= HtmlEncode($Grid->contact_persion->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_contact_persion" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_contact_persion" value="<?= HtmlEncode($Grid->contact_persion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->street->Visible) { // street ?>
        <td data-name="street" <?= $Grid->street->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_street" class="form-group">
<input type="<?= $Grid->street->getInputTextType() ?>" data-table="employee_address" data-field="x_street" name="x<?= $Grid->RowIndex ?>_street" id="x<?= $Grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->street->getPlaceHolder()) ?>" value="<?= $Grid->street->EditValue ?>"<?= $Grid->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->street->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_street" data-hidden="1" name="o<?= $Grid->RowIndex ?>_street" id="o<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_street" class="form-group">
<input type="<?= $Grid->street->getInputTextType() ?>" data-table="employee_address" data-field="x_street" name="x<?= $Grid->RowIndex ?>_street" id="x<?= $Grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->street->getPlaceHolder()) ?>" value="<?= $Grid->street->EditValue ?>"<?= $Grid->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->street->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_street">
<span<?= $Grid->street->viewAttributes() ?>>
<?= $Grid->street->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_street" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_street" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_street" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_street" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->town->Visible) { // town ?>
        <td data-name="town" <?= $Grid->town->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_town" class="form-group">
<input type="<?= $Grid->town->getInputTextType() ?>" data-table="employee_address" data-field="x_town" name="x<?= $Grid->RowIndex ?>_town" id="x<?= $Grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->town->getPlaceHolder()) ?>" value="<?= $Grid->town->EditValue ?>"<?= $Grid->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->town->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_town" data-hidden="1" name="o<?= $Grid->RowIndex ?>_town" id="o<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_town" class="form-group">
<input type="<?= $Grid->town->getInputTextType() ?>" data-table="employee_address" data-field="x_town" name="x<?= $Grid->RowIndex ?>_town" id="x<?= $Grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->town->getPlaceHolder()) ?>" value="<?= $Grid->town->EditValue ?>"<?= $Grid->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->town->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_town">
<span<?= $Grid->town->viewAttributes() ?>>
<?= $Grid->town->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_town" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_town" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_town" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_town" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->province->Visible) { // province ?>
        <td data-name="province" <?= $Grid->province->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_province" class="form-group">
<input type="<?= $Grid->province->getInputTextType() ?>" data-table="employee_address" data-field="x_province" name="x<?= $Grid->RowIndex ?>_province" id="x<?= $Grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->province->getPlaceHolder()) ?>" value="<?= $Grid->province->EditValue ?>"<?= $Grid->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->province->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_province" data-hidden="1" name="o<?= $Grid->RowIndex ?>_province" id="o<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_province" class="form-group">
<input type="<?= $Grid->province->getInputTextType() ?>" data-table="employee_address" data-field="x_province" name="x<?= $Grid->RowIndex ?>_province" id="x<?= $Grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->province->getPlaceHolder()) ?>" value="<?= $Grid->province->EditValue ?>"<?= $Grid->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->province->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_province">
<span<?= $Grid->province->viewAttributes() ?>>
<?= $Grid->province->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_province" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_province" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_province" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_province" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code" <?= $Grid->postal_code->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_postal_code" class="form-group">
<input type="<?= $Grid->postal_code->getInputTextType() ?>" data-table="employee_address" data-field="x_postal_code" name="x<?= $Grid->RowIndex ?>_postal_code" id="x<?= $Grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->postal_code->getPlaceHolder()) ?>" value="<?= $Grid->postal_code->EditValue ?>"<?= $Grid->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->postal_code->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" data-hidden="1" name="o<?= $Grid->RowIndex ?>_postal_code" id="o<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_postal_code" class="form-group">
<input type="<?= $Grid->postal_code->getInputTextType() ?>" data-table="employee_address" data-field="x_postal_code" name="x<?= $Grid->RowIndex ?>_postal_code" id="x<?= $Grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->postal_code->getPlaceHolder()) ?>" value="<?= $Grid->postal_code->EditValue ?>"<?= $Grid->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->postal_code->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_postal_code">
<span<?= $Grid->postal_code->viewAttributes() ?>>
<?= $Grid->postal_code->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_postal_code" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_postal_code" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_postal_code" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->address_type->Visible) { // address_type ?>
        <td data-name="address_type" <?= $Grid->address_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_address_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_address_type"
        name="x<?= $Grid->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Grid->address_type->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Grid->RowIndex ?>_address_type"
        data-table="employee_address"
        data-field="x_address_type"
        data-value-separator="<?= $Grid->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->address_type->getPlaceHolder()) ?>"
        <?= $Grid->address_type->editAttributes() ?>>
        <?= $Grid->address_type->selectOptionListHtml("x{$Grid->RowIndex}_address_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$Grid->address_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_address_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->address_type->caption() ?>" data-title="<?= $Grid->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_address_type',url:'<?= GetUrl("SysAddressTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->address_type->getErrorMessage() ?></div>
<?= $Grid->address_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Grid->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_address_type", selectId: "employee_address_x<?= $Grid->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_address" data-field="x_address_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_address_type" id="o<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_address_type" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_address_type"
        name="x<?= $Grid->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Grid->address_type->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Grid->RowIndex ?>_address_type"
        data-table="employee_address"
        data-field="x_address_type"
        data-value-separator="<?= $Grid->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->address_type->getPlaceHolder()) ?>"
        <?= $Grid->address_type->editAttributes() ?>>
        <?= $Grid->address_type->selectOptionListHtml("x{$Grid->RowIndex}_address_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$Grid->address_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_address_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->address_type->caption() ?>" data-title="<?= $Grid->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_address_type',url:'<?= GetUrl("SysAddressTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->address_type->getErrorMessage() ?></div>
<?= $Grid->address_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Grid->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_address_type", selectId: "employee_address_x<?= $Grid->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_address_type">
<span<?= $Grid->address_type->viewAttributes() ?>>
<?= $Grid->address_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_address_type" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_address_type" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_address_type" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_address_type" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_address"
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
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_address_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="employee_address" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_address"
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
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_address_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_status" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_status" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_status" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_status" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_address" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="employee_address" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_address" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_employee_address_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="employee_address" data-field="x_HospID" data-hidden="1" name="femployee_addressgrid$x<?= $Grid->RowIndex ?>_HospID" id="femployee_addressgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="employee_address" data-field="x_HospID" data-hidden="1" name="femployee_addressgrid$o<?= $Grid->RowIndex ?>_HospID" id="femployee_addressgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["femployee_addressgrid","load"], function () {
    femployee_addressgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_employee_address", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_employee_address_id" class="form-group employee_address_id"></span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_id" class="form-group employee_address_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->employee_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<input type="<?= $Grid->employee_id->getInputTextType() ?>" data-table="employee_address" data-field="x_employee_id" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" size="30" placeholder="<?= HtmlEncode($Grid->employee_id->getPlaceHolder()) ?>" value="<?= $Grid->employee_id->EditValue ?>"<?= $Grid->employee_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->employee_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_employee_address_employee_id" class="form-group employee_address_employee_id">
<span<?= $Grid->employee_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->employee_id->getDisplayValue($Grid->employee_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_employee_id" id="x<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_employee_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_employee_id" id="o<?= $Grid->RowIndex ?>_employee_id" value="<?= HtmlEncode($Grid->employee_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->contact_persion->Visible) { // contact_persion ?>
        <td data-name="contact_persion">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_contact_persion" class="form-group employee_address_contact_persion">
<input type="<?= $Grid->contact_persion->getInputTextType() ?>" data-table="employee_address" data-field="x_contact_persion" name="x<?= $Grid->RowIndex ?>_contact_persion" id="x<?= $Grid->RowIndex ?>_contact_persion" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->contact_persion->getPlaceHolder()) ?>" value="<?= $Grid->contact_persion->EditValue ?>"<?= $Grid->contact_persion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->contact_persion->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_contact_persion" class="form-group employee_address_contact_persion">
<span<?= $Grid->contact_persion->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->contact_persion->getDisplayValue($Grid->contact_persion->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" data-hidden="1" name="x<?= $Grid->RowIndex ?>_contact_persion" id="x<?= $Grid->RowIndex ?>_contact_persion" value="<?= HtmlEncode($Grid->contact_persion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_contact_persion" data-hidden="1" name="o<?= $Grid->RowIndex ?>_contact_persion" id="o<?= $Grid->RowIndex ?>_contact_persion" value="<?= HtmlEncode($Grid->contact_persion->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->street->Visible) { // street ?>
        <td data-name="street">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_street" class="form-group employee_address_street">
<input type="<?= $Grid->street->getInputTextType() ?>" data-table="employee_address" data-field="x_street" name="x<?= $Grid->RowIndex ?>_street" id="x<?= $Grid->RowIndex ?>_street" size="30" maxlength="100" placeholder="<?= HtmlEncode($Grid->street->getPlaceHolder()) ?>" value="<?= $Grid->street->EditValue ?>"<?= $Grid->street->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->street->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_street" class="form-group employee_address_street">
<span<?= $Grid->street->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->street->getDisplayValue($Grid->street->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_street" data-hidden="1" name="x<?= $Grid->RowIndex ?>_street" id="x<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_street" data-hidden="1" name="o<?= $Grid->RowIndex ?>_street" id="o<?= $Grid->RowIndex ?>_street" value="<?= HtmlEncode($Grid->street->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->town->Visible) { // town ?>
        <td data-name="town">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_town" class="form-group employee_address_town">
<input type="<?= $Grid->town->getInputTextType() ?>" data-table="employee_address" data-field="x_town" name="x<?= $Grid->RowIndex ?>_town" id="x<?= $Grid->RowIndex ?>_town" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->town->getPlaceHolder()) ?>" value="<?= $Grid->town->EditValue ?>"<?= $Grid->town->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->town->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_town" class="form-group employee_address_town">
<span<?= $Grid->town->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->town->getDisplayValue($Grid->town->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_town" data-hidden="1" name="x<?= $Grid->RowIndex ?>_town" id="x<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_town" data-hidden="1" name="o<?= $Grid->RowIndex ?>_town" id="o<?= $Grid->RowIndex ?>_town" value="<?= HtmlEncode($Grid->town->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->province->Visible) { // province ?>
        <td data-name="province">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_province" class="form-group employee_address_province">
<input type="<?= $Grid->province->getInputTextType() ?>" data-table="employee_address" data-field="x_province" name="x<?= $Grid->RowIndex ?>_province" id="x<?= $Grid->RowIndex ?>_province" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->province->getPlaceHolder()) ?>" value="<?= $Grid->province->EditValue ?>"<?= $Grid->province->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->province->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_province" class="form-group employee_address_province">
<span<?= $Grid->province->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->province->getDisplayValue($Grid->province->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_province" data-hidden="1" name="x<?= $Grid->RowIndex ?>_province" id="x<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_province" data-hidden="1" name="o<?= $Grid->RowIndex ?>_province" id="o<?= $Grid->RowIndex ?>_province" value="<?= HtmlEncode($Grid->province->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->postal_code->Visible) { // postal_code ?>
        <td data-name="postal_code">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_postal_code" class="form-group employee_address_postal_code">
<input type="<?= $Grid->postal_code->getInputTextType() ?>" data-table="employee_address" data-field="x_postal_code" name="x<?= $Grid->RowIndex ?>_postal_code" id="x<?= $Grid->RowIndex ?>_postal_code" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->postal_code->getPlaceHolder()) ?>" value="<?= $Grid->postal_code->EditValue ?>"<?= $Grid->postal_code->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->postal_code->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_postal_code" class="form-group employee_address_postal_code">
<span<?= $Grid->postal_code->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->postal_code->getDisplayValue($Grid->postal_code->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" data-hidden="1" name="x<?= $Grid->RowIndex ?>_postal_code" id="x<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_postal_code" data-hidden="1" name="o<?= $Grid->RowIndex ?>_postal_code" id="o<?= $Grid->RowIndex ?>_postal_code" value="<?= HtmlEncode($Grid->postal_code->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->address_type->Visible) { // address_type ?>
        <td data-name="address_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_address_type" class="form-group employee_address_address_type">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Grid->RowIndex ?>_address_type"
        name="x<?= $Grid->RowIndex ?>_address_type"
        class="form-control ew-select<?= $Grid->address_type->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Grid->RowIndex ?>_address_type"
        data-table="employee_address"
        data-field="x_address_type"
        data-value-separator="<?= $Grid->address_type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->address_type->getPlaceHolder()) ?>"
        <?= $Grid->address_type->editAttributes() ?>>
        <?= $Grid->address_type->selectOptionListHtml("x{$Grid->RowIndex}_address_type") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "sys_address_type") && !$Grid->address_type->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Grid->RowIndex ?>_address_type" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Grid->address_type->caption() ?>" data-title="<?= $Grid->address_type->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_address_type',url:'<?= GetUrl("SysAddressTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Grid->address_type->getErrorMessage() ?></div>
<?= $Grid->address_type->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_address_type") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Grid->RowIndex ?>_address_type']"),
        options = { name: "x<?= $Grid->RowIndex ?>_address_type", selectId: "employee_address_x<?= $Grid->RowIndex ?>_address_type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.address_type.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_address_type" class="form-group employee_address_address_type">
<span<?= $Grid->address_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->address_type->getDisplayValue($Grid->address_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_address_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_address_type" id="x<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_address_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_address_type" id="o<?= $Grid->RowIndex ?>_address_type" value="<?= HtmlEncode($Grid->address_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_status" class="form-group employee_address_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="employee_address_x<?= $Grid->RowIndex ?>_status"
        data-table="employee_address"
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
    var el = document.querySelector("select[data-select2-id='employee_address_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "employee_address_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.employee_address.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_status" class="form-group employee_address_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_employee_address_HospID" class="form-group employee_address_HospID">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="employee_address" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_employee_address_HospID" class="form-group employee_address_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="employee_address" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="employee_address" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["femployee_addressgrid","load"], function() {
    femployee_addressgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="femployee_addressgrid">
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
    ew.addEventHandlers("employee_address");
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
        container: "gmp_employee_address",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

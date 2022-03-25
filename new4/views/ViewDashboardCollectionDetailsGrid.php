<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewDashboardCollectionDetailsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_dashboard_collection_detailsgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_dashboard_collection_detailsgrid = new ew.Form("fview_dashboard_collection_detailsgrid", "grid");
    fview_dashboard_collection_detailsgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_collection_details")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_dashboard_collection_details)
        ew.vars.tables.view_dashboard_collection_details = currentTable;
    fview_dashboard_collection_detailsgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null, ew.Validators.integer], fields.id.isInvalid],
        ["createddate", [fields.createddate.visible && fields.createddate.required ? ew.Validators.required(fields.createddate.caption) : null, ew.Validators.datetime(0)], fields.createddate.isInvalid],
        ["_UserName", [fields._UserName.visible && fields._UserName.required ? ew.Validators.required(fields._UserName.caption) : null], fields._UserName.isInvalid],
        ["BillNumber", [fields.BillNumber.visible && fields.BillNumber.required ? ew.Validators.required(fields.BillNumber.caption) : null], fields.BillNumber.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Mobile", [fields.Mobile.visible && fields.Mobile.required ? ew.Validators.required(fields.Mobile.caption) : null], fields.Mobile.isInvalid],
        ["voucher_type", [fields.voucher_type.visible && fields.voucher_type.required ? ew.Validators.required(fields.voucher_type.caption) : null], fields.voucher_type.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["AnyDues", [fields.AnyDues.visible && fields.AnyDues.required ? ew.Validators.required(fields.AnyDues.caption) : null], fields.AnyDues.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["BillType", [fields.BillType.visible && fields.BillType.required ? ew.Validators.required(fields.BillType.caption) : null], fields.BillType.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_dashboard_collection_detailsgrid,
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
    fview_dashboard_collection_detailsgrid.validate = function () {
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
    fview_dashboard_collection_detailsgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createddate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "_UserName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Mobile", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "voucher_type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Details", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModeofPayment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnyDues", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createdby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modifiedby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modifieddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_dashboard_collection_detailsgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_collection_detailsgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_dashboard_collection_detailsgrid.lists.HospID = <?= $Grid->HospID->toClientList($Grid) ?>;
    loadjs.done("fview_dashboard_collection_detailsgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_collection_details">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_collection_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_collection_details" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_collection_detailsgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->createddate->Visible) { // createddate ?>
        <th data-name="createddate" class="<?= $Grid->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate"><?= $Grid->renderSort($Grid->createddate) ?></div></th>
<?php } ?>
<?php if ($Grid->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Grid->_UserName->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details__UserName" class="view_dashboard_collection_details__UserName"><?= $Grid->renderSort($Grid->_UserName) ?></div></th>
<?php } ?>
<?php if ($Grid->BillNumber->Visible) { // BillNumber ?>
        <th data-name="BillNumber" class="<?= $Grid->BillNumber->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber"><?= $Grid->renderSort($Grid->BillNumber) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Grid->PatientID->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID"><?= $Grid->renderSort($Grid->PatientID) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <th data-name="Mobile" class="<?= $Grid->Mobile->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile"><?= $Grid->renderSort($Grid->Mobile) ?></div></th>
<?php } ?>
<?php if ($Grid->voucher_type->Visible) { // voucher_type ?>
        <th data-name="voucher_type" class="<?= $Grid->voucher_type->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type"><?= $Grid->renderSort($Grid->voucher_type) ?></div></th>
<?php } ?>
<?php if ($Grid->Details->Visible) { // Details ?>
        <th data-name="Details" class="<?= $Grid->Details->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details"><?= $Grid->renderSort($Grid->Details) ?></div></th>
<?php } ?>
<?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Grid->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment"><?= $Grid->renderSort($Grid->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Grid->Amount->Visible) { // Amount ?>
        <th data-name="Amount" class="<?= $Grid->Amount->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount"><?= $Grid->renderSort($Grid->Amount) ?></div></th>
<?php } ?>
<?php if ($Grid->AnyDues->Visible) { // AnyDues ?>
        <th data-name="AnyDues" class="<?= $Grid->AnyDues->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues"><?= $Grid->renderSort($Grid->AnyDues) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Grid->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType"><?= $Grid->renderSort($Grid->BillType) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_dashboard_collection_details", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_id" class="form-group">
<input type="<?= $Grid->id->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_id" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" size="30" placeholder="<?= HtmlEncode($Grid->id->getPlaceHolder()) ?>" value="<?= $Grid->id->EditValue ?>"<?= $Grid->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->id->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_id" class="form-group">
<input type="<?= $Grid->id->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_id" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" size="30" placeholder="<?= HtmlEncode($Grid->id->getPlaceHolder()) ?>" value="<?= $Grid->id->EditValue ?>"<?= $Grid->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_id" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_id" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddate->Visible) { // createddate ?>
        <td data-name="createddate" <?= $Grid->createddate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->createddate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createddate" class="form-group">
<span<?= $Grid->createddate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddate->getDisplayValue($Grid->createddate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createddate" name="x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode(FormatDateTime($Grid->createddate->CurrentValue, 0)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createddate" class="form-group">
<input type="<?= $Grid->createddate->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x<?= $Grid->RowIndex ?>_createddate" id="x<?= $Grid->RowIndex ?>_createddate" placeholder="<?= HtmlEncode($Grid->createddate->getPlaceHolder()) ?>" value="<?= $Grid->createddate->EditValue ?>"<?= $Grid->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddate->getErrorMessage() ?></div>
<?php if (!$Grid->createddate->ReadOnly && !$Grid->createddate->Disabled && !isset($Grid->createddate->EditAttrs["readonly"]) && !isset($Grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddate" id="o<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->createddate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createddate" class="form-group">
<span<?= $Grid->createddate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddate->getDisplayValue($Grid->createddate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createddate" name="x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode(FormatDateTime($Grid->createddate->CurrentValue, 0)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createddate" class="form-group">
<input type="<?= $Grid->createddate->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x<?= $Grid->RowIndex ?>_createddate" id="x<?= $Grid->RowIndex ?>_createddate" placeholder="<?= HtmlEncode($Grid->createddate->getPlaceHolder()) ?>" value="<?= $Grid->createddate->EditValue ?>"<?= $Grid->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddate->getErrorMessage() ?></div>
<?php if (!$Grid->createddate->ReadOnly && !$Grid->createddate->Disabled && !isset($Grid->createddate->EditAttrs["readonly"]) && !isset($Grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createddate">
<span<?= $Grid->createddate->viewAttributes() ?>>
<?= $Grid->createddate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_createddate" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_createddate" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Grid->_UserName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->_UserName->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details__UserName" class="form-group">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_UserName->getDisplayValue($Grid->_UserName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>__UserName" name="x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details__UserName" class="form-group">
<input type="<?= $Grid->_UserName->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x__UserName" name="x<?= $Grid->RowIndex ?>__UserName" id="x<?= $Grid->RowIndex ?>__UserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->_UserName->getPlaceHolder()) ?>" value="<?= $Grid->_UserName->EditValue ?>"<?= $Grid->_UserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->_UserName->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x__UserName" data-hidden="1" name="o<?= $Grid->RowIndex ?>__UserName" id="o<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->_UserName->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details__UserName" class="form-group">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_UserName->getDisplayValue($Grid->_UserName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>__UserName" name="x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details__UserName" class="form-group">
<input type="<?= $Grid->_UserName->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x__UserName" name="x<?= $Grid->RowIndex ?>__UserName" id="x<?= $Grid->RowIndex ?>__UserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->_UserName->getPlaceHolder()) ?>" value="<?= $Grid->_UserName->EditValue ?>"<?= $Grid->_UserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->_UserName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details__UserName">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<?= $Grid->_UserName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x__UserName" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>__UserName" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x__UserName" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>__UserName" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" <?= $Grid->BillNumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_BillNumber" class="form-group">
<input type="<?= $Grid->BillNumber->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x<?= $Grid->RowIndex ?>_BillNumber" id="x<?= $Grid->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BillNumber->getPlaceHolder()) ?>" value="<?= $Grid->BillNumber->EditValue ?>"<?= $Grid->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillNumber" id="o<?= $Grid->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Grid->BillNumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_BillNumber" class="form-group">
<input type="<?= $Grid->BillNumber->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x<?= $Grid->RowIndex ?>_BillNumber" id="x<?= $Grid->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BillNumber->getPlaceHolder()) ?>" value="<?= $Grid->BillNumber->EditValue ?>"<?= $Grid->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_BillNumber">
<span<?= $Grid->BillNumber->viewAttributes() ?>>
<?= $Grid->BillNumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_BillNumber" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Grid->BillNumber->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_BillNumber" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Grid->BillNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Grid->PatientID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_PatientID" class="form-group">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_PatientID" class="form-group">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_PatientID">
<span<?= $Grid->PatientID->viewAttributes() ?>>
<?= $Grid->PatientID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_PatientID" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_PatientID" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_PatientName" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_PatientName" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" <?= $Grid->Mobile->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Mobile" class="form-group">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mobile" id="o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Mobile" class="form-group">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Mobile">
<span<?= $Grid->Mobile->viewAttributes() ?>>
<?= $Grid->Mobile->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_Mobile" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_Mobile" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type" <?= $Grid->voucher_type->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_voucher_type" class="form-group">
<input type="<?= $Grid->voucher_type->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x<?= $Grid->RowIndex ?>_voucher_type" id="x<?= $Grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->voucher_type->getPlaceHolder()) ?>" value="<?= $Grid->voucher_type->EditValue ?>"<?= $Grid->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->voucher_type->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_voucher_type" id="o<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_voucher_type" class="form-group">
<input type="<?= $Grid->voucher_type->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x<?= $Grid->RowIndex ?>_voucher_type" id="x<?= $Grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->voucher_type->getPlaceHolder()) ?>" value="<?= $Grid->voucher_type->EditValue ?>"<?= $Grid->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->voucher_type->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_voucher_type">
<span<?= $Grid->voucher_type->viewAttributes() ?>>
<?= $Grid->voucher_type->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_voucher_type" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_voucher_type" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Details->Visible) { // Details ?>
        <td data-name="Details" <?= $Grid->Details->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Details" class="form-group">
<input type="<?= $Grid->Details->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Details" name="x<?= $Grid->RowIndex ?>_Details" id="x<?= $Grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Details->getPlaceHolder()) ?>" value="<?= $Grid->Details->EditValue ?>"<?= $Grid->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Details->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Details" id="o<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Details" class="form-group">
<input type="<?= $Grid->Details->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Details" name="x<?= $Grid->RowIndex ?>_Details" id="x<?= $Grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Details->getPlaceHolder()) ?>" value="<?= $Grid->Details->EditValue ?>"<?= $Grid->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Details->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Details">
<span<?= $Grid->Details->viewAttributes() ?>>
<?= $Grid->Details->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_Details" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_Details" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Grid->ModeofPayment->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->ModeofPayment->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment" class="form-group">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModeofPayment->getDisplayValue($Grid->ModeofPayment->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment" class="form-group">
<input type="<?= $Grid->ModeofPayment->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Grid->ModeofPayment->EditValue ?>"<?= $Grid->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModeofPayment" id="o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->ModeofPayment->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment" class="form-group">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModeofPayment->getDisplayValue($Grid->ModeofPayment->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment" class="form-group">
<input type="<?= $Grid->ModeofPayment->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Grid->ModeofPayment->EditValue ?>"<?= $Grid->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_ModeofPayment">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<?= $Grid->ModeofPayment->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_ModeofPayment" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_ModeofPayment" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Amount->Visible) { // Amount ?>
        <td data-name="Amount" <?= $Grid->Amount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Amount" class="form-group">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Amount" id="o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Amount" class="form-group">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_Amount">
<span<?= $Grid->Amount->viewAttributes() ?>>
<?= $Grid->Amount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_Amount" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_Amount" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues" <?= $Grid->AnyDues->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_AnyDues" class="form-group">
<input type="<?= $Grid->AnyDues->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x<?= $Grid->RowIndex ?>_AnyDues" id="x<?= $Grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnyDues->getPlaceHolder()) ?>" value="<?= $Grid->AnyDues->EditValue ?>"<?= $Grid->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnyDues->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnyDues" id="o<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_AnyDues" class="form-group">
<input type="<?= $Grid->AnyDues->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x<?= $Grid->RowIndex ?>_AnyDues" id="x<?= $Grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnyDues->getPlaceHolder()) ?>" value="<?= $Grid->AnyDues->EditValue ?>"<?= $Grid->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnyDues->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_AnyDues">
<span<?= $Grid->AnyDues->viewAttributes() ?>>
<?= $Grid->AnyDues->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_AnyDues" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_AnyDues" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_createdby" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_createdby" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_modifiedby" class="form-group">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_modifiedby" class="form-group">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_modifieddatetime" class="form-group">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_modifieddatetime" class="form-group">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Grid->BillType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_BillType" class="form-group">
<input type="<?= $Grid->BillType->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x<?= $Grid->RowIndex ?>_BillType" id="x<?= $Grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?= HtmlEncode($Grid->BillType->getPlaceHolder()) ?>" value="<?= $Grid->BillType->EditValue ?>"<?= $Grid->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillType" id="o<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_BillType" class="form-group">
<input type="<?= $Grid->BillType->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x<?= $Grid->RowIndex ?>_BillType" id="x<?= $Grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?= HtmlEncode($Grid->BillType->getPlaceHolder()) ?>" value="<?= $Grid->BillType->EditValue ?>"<?= $Grid->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_BillType">
<span<?= $Grid->BillType->viewAttributes() ?>>
<?= $Grid->BillType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_BillType" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_BillType" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_HospID" class="form-group">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_collection_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid"], function() {
    fview_dashboard_collection_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_collection_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_HospID" class="form-group">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_collection_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid"], function() {
    fview_dashboard_collection_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_collection_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_collection_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-hidden="1" name="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_collection_detailsgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-hidden="1" name="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_collection_detailsgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["fview_dashboard_collection_detailsgrid","load"], function () {
    fview_dashboard_collection_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_dashboard_collection_details", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_view_dashboard_collection_details_id" class="form-group view_dashboard_collection_details_id">
<input type="<?= $Grid->id->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_id" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" size="30" placeholder="<?= HtmlEncode($Grid->id->getPlaceHolder()) ?>" value="<?= $Grid->id->EditValue ?>"<?= $Grid->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->id->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_id" class="form-group view_dashboard_collection_details_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddate->Visible) { // createddate ?>
        <td data-name="createddate">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->createddate->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddate" class="form-group view_dashboard_collection_details_createddate">
<span<?= $Grid->createddate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddate->getDisplayValue($Grid->createddate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createddate" name="x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode(FormatDateTime($Grid->createddate->CurrentValue, 0)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddate" class="form-group view_dashboard_collection_details_createddate">
<input type="<?= $Grid->createddate->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddate" name="x<?= $Grid->RowIndex ?>_createddate" id="x<?= $Grid->RowIndex ?>_createddate" placeholder="<?= HtmlEncode($Grid->createddate->getPlaceHolder()) ?>" value="<?= $Grid->createddate->EditValue ?>"<?= $Grid->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddate->getErrorMessage() ?></div>
<?php if (!$Grid->createddate->ReadOnly && !$Grid->createddate->Disabled && !isset($Grid->createddate->EditAttrs["readonly"]) && !isset($Grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddate" class="form-group view_dashboard_collection_details_createddate">
<span<?= $Grid->createddate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddate->getDisplayValue($Grid->createddate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddate" id="x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddate" id="o<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->_UserName->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_collection_details__UserName" class="form-group view_dashboard_collection_details__UserName">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_UserName->getDisplayValue($Grid->_UserName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>__UserName" name="x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details__UserName" class="form-group view_dashboard_collection_details__UserName">
<input type="<?= $Grid->_UserName->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x__UserName" name="x<?= $Grid->RowIndex ?>__UserName" id="x<?= $Grid->RowIndex ?>__UserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->_UserName->getPlaceHolder()) ?>" value="<?= $Grid->_UserName->EditValue ?>"<?= $Grid->_UserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->_UserName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details__UserName" class="form-group view_dashboard_collection_details__UserName">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_UserName->getDisplayValue($Grid->_UserName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x__UserName" data-hidden="1" name="x<?= $Grid->RowIndex ?>__UserName" id="x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x__UserName" data-hidden="1" name="o<?= $Grid->RowIndex ?>__UserName" id="o<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_BillNumber" class="form-group view_dashboard_collection_details_BillNumber">
<input type="<?= $Grid->BillNumber->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_BillNumber" name="x<?= $Grid->RowIndex ?>_BillNumber" id="x<?= $Grid->RowIndex ?>_BillNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BillNumber->getPlaceHolder()) ?>" value="<?= $Grid->BillNumber->EditValue ?>"<?= $Grid->BillNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillNumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_BillNumber" class="form-group view_dashboard_collection_details_BillNumber">
<span<?= $Grid->BillNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillNumber->getDisplayValue($Grid->BillNumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillNumber" id="x<?= $Grid->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Grid->BillNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillNumber" id="o<?= $Grid->RowIndex ?>_BillNumber" value="<?= HtmlEncode($Grid->BillNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_PatientID" class="form-group view_dashboard_collection_details_PatientID">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_PatientID" class="form-group view_dashboard_collection_details_PatientID">
<span<?= $Grid->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientID->getDisplayValue($Grid->PatientID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_PatientName" class="form-group view_dashboard_collection_details_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_PatientName" class="form-group view_dashboard_collection_details_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Mobile" class="form-group view_dashboard_collection_details_Mobile">
<input type="<?= $Grid->Mobile->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Mobile" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Mobile->getPlaceHolder()) ?>" value="<?= $Grid->Mobile->EditValue ?>"<?= $Grid->Mobile->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Mobile->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Mobile" class="form-group view_dashboard_collection_details_Mobile">
<span<?= $Grid->Mobile->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Mobile->getDisplayValue($Grid->Mobile->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Mobile" id="x<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Mobile" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Mobile" id="o<?= $Grid->RowIndex ?>_Mobile" value="<?= HtmlEncode($Grid->Mobile->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_voucher_type" class="form-group view_dashboard_collection_details_voucher_type">
<input type="<?= $Grid->voucher_type->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_voucher_type" name="x<?= $Grid->RowIndex ?>_voucher_type" id="x<?= $Grid->RowIndex ?>_voucher_type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->voucher_type->getPlaceHolder()) ?>" value="<?= $Grid->voucher_type->EditValue ?>"<?= $Grid->voucher_type->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->voucher_type->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_voucher_type" class="form-group view_dashboard_collection_details_voucher_type">
<span<?= $Grid->voucher_type->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->voucher_type->getDisplayValue($Grid->voucher_type->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" data-hidden="1" name="x<?= $Grid->RowIndex ?>_voucher_type" id="x<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_voucher_type" data-hidden="1" name="o<?= $Grid->RowIndex ?>_voucher_type" id="o<?= $Grid->RowIndex ?>_voucher_type" value="<?= HtmlEncode($Grid->voucher_type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Details->Visible) { // Details ?>
        <td data-name="Details">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Details" class="form-group view_dashboard_collection_details_Details">
<input type="<?= $Grid->Details->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Details" name="x<?= $Grid->RowIndex ?>_Details" id="x<?= $Grid->RowIndex ?>_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Details->getPlaceHolder()) ?>" value="<?= $Grid->Details->EditValue ?>"<?= $Grid->Details->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Details->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Details" class="form-group view_dashboard_collection_details_Details">
<span<?= $Grid->Details->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Details->getDisplayValue($Grid->Details->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Details" id="x<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Details" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Details" id="o<?= $Grid->RowIndex ?>_Details" value="<?= HtmlEncode($Grid->Details->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->ModeofPayment->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_collection_details_ModeofPayment" class="form-group view_dashboard_collection_details_ModeofPayment">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModeofPayment->getDisplayValue($Grid->ModeofPayment->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_ModeofPayment" class="form-group view_dashboard_collection_details_ModeofPayment">
<input type="<?= $Grid->ModeofPayment->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Grid->ModeofPayment->EditValue ?>"<?= $Grid->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_ModeofPayment" class="form-group view_dashboard_collection_details_ModeofPayment">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModeofPayment->getDisplayValue($Grid->ModeofPayment->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModeofPayment" id="o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Amount->Visible) { // Amount ?>
        <td data-name="Amount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Amount" class="form-group view_dashboard_collection_details_Amount">
<input type="<?= $Grid->Amount->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_Amount" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" size="30" placeholder="<?= HtmlEncode($Grid->Amount->getPlaceHolder()) ?>" value="<?= $Grid->Amount->EditValue ?>"<?= $Grid->Amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Amount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_Amount" class="form-group view_dashboard_collection_details_Amount">
<span<?= $Grid->Amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Amount->getDisplayValue($Grid->Amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Amount" id="x<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_Amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Amount" id="o<?= $Grid->RowIndex ?>_Amount" value="<?= HtmlEncode($Grid->Amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_AnyDues" class="form-group view_dashboard_collection_details_AnyDues">
<input type="<?= $Grid->AnyDues->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_AnyDues" name="x<?= $Grid->RowIndex ?>_AnyDues" id="x<?= $Grid->RowIndex ?>_AnyDues" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnyDues->getPlaceHolder()) ?>" value="<?= $Grid->AnyDues->EditValue ?>"<?= $Grid->AnyDues->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnyDues->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_AnyDues" class="form-group view_dashboard_collection_details_AnyDues">
<span<?= $Grid->AnyDues->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AnyDues->getDisplayValue($Grid->AnyDues->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AnyDues" id="x<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_AnyDues" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnyDues" id="o<?= $Grid->RowIndex ?>_AnyDues" value="<?= HtmlEncode($Grid->AnyDues->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createdby" class="form-group view_dashboard_collection_details_createdby">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createdby" class="form-group view_dashboard_collection_details_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddatetime" class="form-group view_dashboard_collection_details_createddatetime">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_createddatetime" class="form-group view_dashboard_collection_details_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_modifiedby" class="form-group view_dashboard_collection_details_modifiedby">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_modifiedby" class="form-group view_dashboard_collection_details_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_modifieddatetime" class="form-group view_dashboard_collection_details_modifieddatetime">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_collection_detailsgrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_modifieddatetime" class="form-group view_dashboard_collection_details_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillType->Visible) { // BillType ?>
        <td data-name="BillType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_collection_details_BillType" class="form-group view_dashboard_collection_details_BillType">
<input type="<?= $Grid->BillType->getInputTextType() ?>" data-table="view_dashboard_collection_details" data-field="x_BillType" name="x<?= $Grid->RowIndex ?>_BillType" id="x<?= $Grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?= HtmlEncode($Grid->BillType->getPlaceHolder()) ?>" value="<?= $Grid->BillType->EditValue ?>"<?= $Grid->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_BillType" class="form-group view_dashboard_collection_details_BillType">
<span<?= $Grid->BillType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillType->getDisplayValue($Grid->BillType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillType" id="x<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_BillType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillType" id="o<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_collection_details_HospID" class="form-group view_dashboard_collection_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_HospID" class="form-group view_dashboard_collection_details_HospID">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_collection_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid"], function() {
    fview_dashboard_collection_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_collection_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_collection_details_HospID" class="form-group view_dashboard_collection_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_collection_details" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_dashboard_collection_detailsgrid","load"], function() {
    fview_dashboard_collection_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        <td data-name="id" class="<?= $Grid->id->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_id" class="view_dashboard_collection_details_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->createddate->Visible) { // createddate ?>
        <td data-name="createddate" class="<?= $Grid->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createddate" class="view_dashboard_collection_details_createddate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" class="<?= $Grid->_UserName->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details__UserName" class="view_dashboard_collection_details__UserName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BillNumber->Visible) { // BillNumber ?>
        <td data-name="BillNumber" class="<?= $Grid->BillNumber->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_BillNumber" class="view_dashboard_collection_details_BillNumber">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" class="<?= $Grid->PatientID->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_PatientID" class="view_dashboard_collection_details_PatientID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" class="<?= $Grid->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_PatientName" class="view_dashboard_collection_details_PatientName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Mobile->Visible) { // Mobile ?>
        <td data-name="Mobile" class="<?= $Grid->Mobile->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Mobile" class="view_dashboard_collection_details_Mobile">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->voucher_type->Visible) { // voucher_type ?>
        <td data-name="voucher_type" class="<?= $Grid->voucher_type->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_voucher_type" class="view_dashboard_collection_details_voucher_type">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Details->Visible) { // Details ?>
        <td data-name="Details" class="<?= $Grid->Details->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Details" class="view_dashboard_collection_details_Details">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" class="<?= $Grid->ModeofPayment->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_ModeofPayment" class="view_dashboard_collection_details_ModeofPayment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Amount->Visible) { // Amount ?>
        <td data-name="Amount" class="<?= $Grid->Amount->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_Amount" class="view_dashboard_collection_details_Amount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->Amount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->AnyDues->Visible) { // AnyDues ?>
        <td data-name="AnyDues" class="<?= $Grid->AnyDues->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_AnyDues" class="view_dashboard_collection_details_AnyDues">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" class="<?= $Grid->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createdby" class="view_dashboard_collection_details_createdby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" class="<?= $Grid->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_createddatetime" class="view_dashboard_collection_details_createddatetime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" class="<?= $Grid->modifiedby->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_modifiedby" class="view_dashboard_collection_details_modifiedby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_modifieddatetime" class="view_dashboard_collection_details_modifieddatetime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BillType->Visible) { // BillType ?>
        <td data-name="BillType" class="<?= $Grid->BillType->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_BillType" class="view_dashboard_collection_details_BillType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Grid->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_collection_details_HospID" class="view_dashboard_collection_details_HospID">
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
<input type="hidden" name="detailpage" value="fview_dashboard_collection_detailsgrid">
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
    ew.addEventHandlers("view_dashboard_collection_details");
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
        container: "gmp_view_dashboard_collection_details",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

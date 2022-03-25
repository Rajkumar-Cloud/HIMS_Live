<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewDashboardSummaryModeofpaymentDetailsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_dashboard_summary_modeofpayment_detailsgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_dashboard_summary_modeofpayment_detailsgrid = new ew.Form("fview_dashboard_summary_modeofpayment_detailsgrid", "grid");
    fview_dashboard_summary_modeofpayment_detailsgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_summary_modeofpayment_details")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_dashboard_summary_modeofpayment_details)
        ew.vars.tables.view_dashboard_summary_modeofpayment_details = currentTable;
    fview_dashboard_summary_modeofpayment_detailsgrid.addFields([
        ["_UserName", [fields._UserName.visible && fields._UserName.required ? ew.Validators.required(fields._UserName.caption) : null], fields._UserName.isInvalid],
        ["ModeofPayment", [fields.ModeofPayment.visible && fields.ModeofPayment.required ? ew.Validators.required(fields.ModeofPayment.caption) : null], fields.ModeofPayment.isInvalid],
        ["sumAmount", [fields.sumAmount.visible && fields.sumAmount.required ? ew.Validators.required(fields.sumAmount.caption) : null, ew.Validators.float], fields.sumAmount.isInvalid],
        ["createddate", [fields.createddate.visible && fields.createddate.required ? ew.Validators.required(fields.createddate.caption) : null, ew.Validators.datetime(0)], fields.createddate.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["BillType", [fields.BillType.visible && fields.BillType.required ? ew.Validators.required(fields.BillType.caption) : null], fields.BillType.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_dashboard_summary_modeofpayment_detailsgrid,
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
    fview_dashboard_summary_modeofpayment_detailsgrid.validate = function () {
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
    fview_dashboard_summary_modeofpayment_detailsgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "_UserName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModeofPayment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "sumAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createddate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillType", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_dashboard_summary_modeofpayment_detailsgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_summary_modeofpayment_detailsgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_dashboard_summary_modeofpayment_detailsgrid.lists.HospID = <?= $Grid->HospID->toClientList($Grid) ?>;
    loadjs.done("fview_dashboard_summary_modeofpayment_detailsgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_summary_modeofpayment_details">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_summary_modeofpayment_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_summary_modeofpayment_details" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_summary_modeofpayment_detailsgrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Grid->_UserName->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details__UserName" class="view_dashboard_summary_modeofpayment_details__UserName"><?= $Grid->renderSort($Grid->_UserName) ?></div></th>
<?php } ?>
<?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <th data-name="ModeofPayment" class="<?= $Grid->ModeofPayment->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment"><?= $Grid->renderSort($Grid->ModeofPayment) ?></div></th>
<?php } ?>
<?php if ($Grid->sumAmount->Visible) { // sum(Amount) ?>
        <th data-name="sumAmount" class="<?= $Grid->sumAmount->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_sumAmount" class="view_dashboard_summary_modeofpayment_details_sumAmount"><?= $Grid->renderSort($Grid->sumAmount) ?></div></th>
<?php } ?>
<?php if ($Grid->createddate->Visible) { // createddate ?>
        <th data-name="createddate" class="<?= $Grid->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate"><?= $Grid->renderSort($Grid->createddate) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Grid->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType"><?= $Grid->renderSort($Grid->BillType) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_dashboard_summary_modeofpayment_details", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Grid->_UserName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->_UserName->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details__UserName" class="form-group">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_UserName->getDisplayValue($Grid->_UserName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>__UserName" name="x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details__UserName" class="form-group">
<input type="<?= $Grid->_UserName->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x__UserName" name="x<?= $Grid->RowIndex ?>__UserName" id="x<?= $Grid->RowIndex ?>__UserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->_UserName->getPlaceHolder()) ?>" value="<?= $Grid->_UserName->EditValue ?>"<?= $Grid->_UserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->_UserName->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x__UserName" data-hidden="1" name="o<?= $Grid->RowIndex ?>__UserName" id="o<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->_UserName->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details__UserName" class="form-group">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_UserName->getDisplayValue($Grid->_UserName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>__UserName" name="x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details__UserName" class="form-group">
<input type="<?= $Grid->_UserName->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x__UserName" name="x<?= $Grid->RowIndex ?>__UserName" id="x<?= $Grid->RowIndex ?>__UserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->_UserName->getPlaceHolder()) ?>" value="<?= $Grid->_UserName->EditValue ?>"<?= $Grid->_UserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->_UserName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details__UserName">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<?= $Grid->_UserName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x__UserName" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>__UserName" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x__UserName" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>__UserName" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" <?= $Grid->ModeofPayment->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="form-group">
<input type="<?= $Grid->ModeofPayment->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Grid->ModeofPayment->EditValue ?>"<?= $Grid->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModeofPayment" id="o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="form-group">
<input type="<?= $Grid->ModeofPayment->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Grid->ModeofPayment->EditValue ?>"<?= $Grid->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_ModeofPayment">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<?= $Grid->ModeofPayment->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_ModeofPayment" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_ModeofPayment" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->sumAmount->Visible) { // sum(Amount) ?>
        <td data-name="sumAmount" <?= $Grid->sumAmount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_sumAmount" class="form-group">
<input type="<?= $Grid->sumAmount->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sumAmount" name="x<?= $Grid->RowIndex ?>_sumAmount" id="x<?= $Grid->RowIndex ?>_sumAmount" size="30" placeholder="<?= HtmlEncode($Grid->sumAmount->getPlaceHolder()) ?>" value="<?= $Grid->sumAmount->EditValue ?>"<?= $Grid->sumAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sumAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sumAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sumAmount" id="o<?= $Grid->RowIndex ?>_sumAmount" value="<?= HtmlEncode($Grid->sumAmount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_sumAmount" class="form-group">
<input type="<?= $Grid->sumAmount->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sumAmount" name="x<?= $Grid->RowIndex ?>_sumAmount" id="x<?= $Grid->RowIndex ?>_sumAmount" size="30" placeholder="<?= HtmlEncode($Grid->sumAmount->getPlaceHolder()) ?>" value="<?= $Grid->sumAmount->EditValue ?>"<?= $Grid->sumAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sumAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_sumAmount">
<span<?= $Grid->sumAmount->viewAttributes() ?>>
<?= $Grid->sumAmount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sumAmount" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_sumAmount" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_sumAmount" value="<?= HtmlEncode($Grid->sumAmount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sumAmount" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_sumAmount" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_sumAmount" value="<?= HtmlEncode($Grid->sumAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddate->Visible) { // createddate ?>
        <td data-name="createddate" <?= $Grid->createddate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->createddate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate" class="form-group">
<span<?= $Grid->createddate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddate->getDisplayValue($Grid->createddate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createddate" name="x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode(FormatDateTime($Grid->createddate->CurrentValue, 0)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate" class="form-group">
<input type="<?= $Grid->createddate->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x<?= $Grid->RowIndex ?>_createddate" id="x<?= $Grid->RowIndex ?>_createddate" placeholder="<?= HtmlEncode($Grid->createddate->getPlaceHolder()) ?>" value="<?= $Grid->createddate->EditValue ?>"<?= $Grid->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddate->getErrorMessage() ?></div>
<?php if (!$Grid->createddate->ReadOnly && !$Grid->createddate->Disabled && !isset($Grid->createddate->EditAttrs["readonly"]) && !isset($Grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailsgrid", "x<?= $Grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddate" id="o<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->createddate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate" class="form-group">
<span<?= $Grid->createddate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddate->getDisplayValue($Grid->createddate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createddate" name="x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode(FormatDateTime($Grid->createddate->CurrentValue, 0)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate" class="form-group">
<input type="<?= $Grid->createddate->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x<?= $Grid->RowIndex ?>_createddate" id="x<?= $Grid->RowIndex ?>_createddate" placeholder="<?= HtmlEncode($Grid->createddate->getPlaceHolder()) ?>" value="<?= $Grid->createddate->EditValue ?>"<?= $Grid->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddate->getErrorMessage() ?></div>
<?php if (!$Grid->createddate->ReadOnly && !$Grid->createddate->Disabled && !isset($Grid->createddate->EditAttrs["readonly"]) && !isset($Grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailsgrid", "x<?= $Grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_createddate">
<span<?= $Grid->createddate->viewAttributes() ?>>
<?= $Grid->createddate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_createddate" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_createddate" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID" class="form-group">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid"], function() {
    fview_dashboard_summary_modeofpayment_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_summary_modeofpayment_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID" class="form-group">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid"], function() {
    fview_dashboard_summary_modeofpayment_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_summary_modeofpayment_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Grid->BillType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_BillType" class="form-group">
<input type="<?= $Grid->BillType->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="x<?= $Grid->RowIndex ?>_BillType" id="x<?= $Grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?= HtmlEncode($Grid->BillType->getPlaceHolder()) ?>" value="<?= $Grid->BillType->EditValue ?>"<?= $Grid->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillType" id="o<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_BillType" class="form-group">
<input type="<?= $Grid->BillType->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="x<?= $Grid->RowIndex ?>_BillType" id="x<?= $Grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?= HtmlEncode($Grid->BillType->getPlaceHolder()) ?>" value="<?= $Grid->BillType->EditValue ?>"<?= $Grid->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_summary_modeofpayment_details_BillType">
<span<?= $Grid->BillType->viewAttributes() ?>>
<?= $Grid->BillType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_BillType" id="fview_dashboard_summary_modeofpayment_detailsgrid$x<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" data-hidden="1" name="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_BillType" id="fview_dashboard_summary_modeofpayment_detailsgrid$o<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->OldValue) ?>">
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
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid","load"], function () {
    fview_dashboard_summary_modeofpayment_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_dashboard_summary_modeofpayment_details", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->_UserName->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details__UserName" class="form-group view_dashboard_summary_modeofpayment_details__UserName">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_UserName->getDisplayValue($Grid->_UserName->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>__UserName" name="x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details__UserName" class="form-group view_dashboard_summary_modeofpayment_details__UserName">
<input type="<?= $Grid->_UserName->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x__UserName" name="x<?= $Grid->RowIndex ?>__UserName" id="x<?= $Grid->RowIndex ?>__UserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->_UserName->getPlaceHolder()) ?>" value="<?= $Grid->_UserName->EditValue ?>"<?= $Grid->_UserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->_UserName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details__UserName" class="form-group view_dashboard_summary_modeofpayment_details__UserName">
<span<?= $Grid->_UserName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->_UserName->getDisplayValue($Grid->_UserName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x__UserName" data-hidden="1" name="x<?= $Grid->RowIndex ?>__UserName" id="x<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x__UserName" data-hidden="1" name="o<?= $Grid->RowIndex ?>__UserName" id="o<?= $Grid->RowIndex ?>__UserName" value="<?= HtmlEncode($Grid->_UserName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="form-group view_dashboard_summary_modeofpayment_details_ModeofPayment">
<input type="<?= $Grid->ModeofPayment->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ModeofPayment->getPlaceHolder()) ?>" value="<?= $Grid->ModeofPayment->EditValue ?>"<?= $Grid->ModeofPayment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ModeofPayment->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="form-group view_dashboard_summary_modeofpayment_details_ModeofPayment">
<span<?= $Grid->ModeofPayment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ModeofPayment->getDisplayValue($Grid->ModeofPayment->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ModeofPayment" id="x<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_ModeofPayment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ModeofPayment" id="o<?= $Grid->RowIndex ?>_ModeofPayment" value="<?= HtmlEncode($Grid->ModeofPayment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->sumAmount->Visible) { // sum(Amount) ?>
        <td data-name="sumAmount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_sumAmount" class="form-group view_dashboard_summary_modeofpayment_details_sumAmount">
<input type="<?= $Grid->sumAmount->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sumAmount" name="x<?= $Grid->RowIndex ?>_sumAmount" id="x<?= $Grid->RowIndex ?>_sumAmount" size="30" placeholder="<?= HtmlEncode($Grid->sumAmount->getPlaceHolder()) ?>" value="<?= $Grid->sumAmount->EditValue ?>"<?= $Grid->sumAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sumAmount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_sumAmount" class="form-group view_dashboard_summary_modeofpayment_details_sumAmount">
<span<?= $Grid->sumAmount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->sumAmount->getDisplayValue($Grid->sumAmount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sumAmount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_sumAmount" id="x<?= $Grid->RowIndex ?>_sumAmount" value="<?= HtmlEncode($Grid->sumAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_sumAmount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sumAmount" id="o<?= $Grid->RowIndex ?>_sumAmount" value="<?= HtmlEncode($Grid->sumAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddate->Visible) { // createddate ?>
        <td data-name="createddate">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->createddate->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_createddate" class="form-group view_dashboard_summary_modeofpayment_details_createddate">
<span<?= $Grid->createddate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddate->getDisplayValue($Grid->createddate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createddate" name="x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode(FormatDateTime($Grid->createddate->CurrentValue, 0)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_createddate" class="form-group view_dashboard_summary_modeofpayment_details_createddate">
<input type="<?= $Grid->createddate->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" name="x<?= $Grid->RowIndex ?>_createddate" id="x<?= $Grid->RowIndex ?>_createddate" placeholder="<?= HtmlEncode($Grid->createddate->getPlaceHolder()) ?>" value="<?= $Grid->createddate->EditValue ?>"<?= $Grid->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddate->getErrorMessage() ?></div>
<?php if (!$Grid->createddate->ReadOnly && !$Grid->createddate->Disabled && !isset($Grid->createddate->EditAttrs["readonly"]) && !isset($Grid->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_summary_modeofpayment_detailsgrid", "x<?= $Grid->RowIndex ?>_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_createddate" class="form-group view_dashboard_summary_modeofpayment_details_createddate">
<span<?= $Grid->createddate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddate->getDisplayValue($Grid->createddate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddate" id="x<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_createddate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddate" id="o<?= $Grid->RowIndex ?>_createddate" value="<?= HtmlEncode($Grid->createddate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_HospID" class="form-group view_dashboard_summary_modeofpayment_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_HospID" class="form-group view_dashboard_summary_modeofpayment_details_HospID">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid"], function() {
    fview_dashboard_summary_modeofpayment_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_summary_modeofpayment_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_HospID" class="form-group view_dashboard_summary_modeofpayment_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BillType->Visible) { // BillType ?>
        <td data-name="BillType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_BillType" class="form-group view_dashboard_summary_modeofpayment_details_BillType">
<input type="<?= $Grid->BillType->getInputTextType() ?>" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" name="x<?= $Grid->RowIndex ?>_BillType" id="x<?= $Grid->RowIndex ?>_BillType" size="30" maxlength="8" placeholder="<?= HtmlEncode($Grid->BillType->getPlaceHolder()) ?>" value="<?= $Grid->BillType->EditValue ?>"<?= $Grid->BillType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BillType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_summary_modeofpayment_details_BillType" class="form-group view_dashboard_summary_modeofpayment_details_BillType">
<span<?= $Grid->BillType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BillType->getDisplayValue($Grid->BillType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BillType" id="x<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_summary_modeofpayment_details" data-field="x_BillType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BillType" id="o<?= $Grid->RowIndex ?>_BillType" value="<?= HtmlEncode($Grid->BillType->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_dashboard_summary_modeofpayment_detailsgrid","load"], function() {
    fview_dashboard_summary_modeofpayment_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
    <?php if ($Grid->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" class="<?= $Grid->_UserName->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details__UserName" class="view_dashboard_summary_modeofpayment_details__UserName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ModeofPayment->Visible) { // ModeofPayment ?>
        <td data-name="ModeofPayment" class="<?= $Grid->ModeofPayment->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_ModeofPayment" class="view_dashboard_summary_modeofpayment_details_ModeofPayment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->sumAmount->Visible) { // sum(Amount) ?>
        <td data-name="sumAmount" class="<?= $Grid->sumAmount->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_sumAmount" class="view_dashboard_summary_modeofpayment_details_sumAmount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->sumAmount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->createddate->Visible) { // createddate ?>
        <td data-name="createddate" class="<?= $Grid->createddate->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_createddate" class="view_dashboard_summary_modeofpayment_details_createddate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Grid->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_HospID" class="view_dashboard_summary_modeofpayment_details_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->BillType->Visible) { // BillType ?>
        <td data-name="BillType" class="<?= $Grid->BillType->footerCellClass() ?>"><span id="elf_view_dashboard_summary_modeofpayment_details_BillType" class="view_dashboard_summary_modeofpayment_details_BillType">
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
<input type="hidden" name="detailpage" value="fview_dashboard_summary_modeofpayment_detailsgrid">
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
    ew.addEventHandlers("view_dashboard_summary_modeofpayment_details");
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
        container: "gmp_view_dashboard_summary_modeofpayment_details",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

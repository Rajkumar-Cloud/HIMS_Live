<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewDashboardServiceDetailsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_dashboard_service_detailsgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_dashboard_service_detailsgrid = new ew.Form("fview_dashboard_service_detailsgrid", "grid");
    fview_dashboard_service_detailsgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_service_details")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_dashboard_service_details)
        ew.vars.tables.view_dashboard_service_details = currentTable;
    fview_dashboard_service_detailsgrid.addFields([
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Services", [fields.Services.visible && fields.Services.required ? ew.Validators.required(fields.Services.caption) : null], fields.Services.isInvalid],
        ["amount", [fields.amount.visible && fields.amount.required ? ew.Validators.required(fields.amount.caption) : null, ew.Validators.float], fields.amount.isInvalid],
        ["SubTotal", [fields.SubTotal.visible && fields.SubTotal.required ? ew.Validators.required(fields.SubTotal.caption) : null, ew.Validators.float], fields.SubTotal.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["createdDate", [fields.createdDate.visible && fields.createdDate.required ? ew.Validators.required(fields.createdDate.caption) : null, ew.Validators.datetime(7)], fields.createdDate.isInvalid],
        ["DrName", [fields.DrName.visible && fields.DrName.required ? ew.Validators.required(fields.DrName.caption) : null], fields.DrName.isInvalid],
        ["DRDepartment", [fields.DRDepartment.visible && fields.DRDepartment.required ? ew.Validators.required(fields.DRDepartment.caption) : null], fields.DRDepartment.isInvalid],
        ["ItemCode", [fields.ItemCode.visible && fields.ItemCode.required ? ew.Validators.required(fields.ItemCode.caption) : null], fields.ItemCode.isInvalid],
        ["DEptCd", [fields.DEptCd.visible && fields.DEptCd.required ? ew.Validators.required(fields.DEptCd.caption) : null], fields.DEptCd.isInvalid],
        ["CODE", [fields.CODE.visible && fields.CODE.required ? ew.Validators.required(fields.CODE.caption) : null], fields.CODE.isInvalid],
        ["SERVICE", [fields.SERVICE.visible && fields.SERVICE.required ? ew.Validators.required(fields.SERVICE.caption) : null], fields.SERVICE.isInvalid],
        ["SERVICE_TYPE", [fields.SERVICE_TYPE.visible && fields.SERVICE_TYPE.required ? ew.Validators.required(fields.SERVICE_TYPE.caption) : null], fields.SERVICE_TYPE.isInvalid],
        ["DEPARTMENT", [fields.DEPARTMENT.visible && fields.DEPARTMENT.required ? ew.Validators.required(fields.DEPARTMENT.caption) : null], fields.DEPARTMENT.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["vid", [fields.vid.visible && fields.vid.required ? ew.Validators.required(fields.vid.caption) : null], fields.vid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_dashboard_service_detailsgrid,
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
    fview_dashboard_service_detailsgrid.validate = function () {
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
    fview_dashboard_service_detailsgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Services", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "amount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SubTotal", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createdby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createdDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DRDepartment", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ItemCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DEptCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SERVICE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SERVICE_TYPE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DEPARTMENT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_dashboard_service_detailsgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_service_detailsgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_dashboard_service_detailsgrid.lists.DrName = <?= $Grid->DrName->toClientList($Grid) ?>;
    fview_dashboard_service_detailsgrid.lists.HospID = <?= $Grid->HospID->toClientList($Grid) ?>;
    loadjs.done("fview_dashboard_service_detailsgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_service_details">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_dashboard_service_detailsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_dashboard_service_details" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_dashboard_service_detailsgrid" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Grid->PatientId->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId"><?= $Grid->renderSort($Grid->PatientId) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->Services->Visible) { // Services ?>
        <th data-name="Services" class="<?= $Grid->Services->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services"><?= $Grid->renderSort($Grid->Services) ?></div></th>
<?php } ?>
<?php if ($Grid->amount->Visible) { // amount ?>
        <th data-name="amount" class="<?= $Grid->amount->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount"><?= $Grid->renderSort($Grid->amount) ?></div></th>
<?php } ?>
<?php if ($Grid->SubTotal->Visible) { // SubTotal ?>
        <th data-name="SubTotal" class="<?= $Grid->SubTotal->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal"><?= $Grid->renderSort($Grid->SubTotal) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <th data-name="createdDate" class="<?= $Grid->createdDate->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate"><?= $Grid->renderSort($Grid->createdDate) ?></div></th>
<?php } ?>
<?php if ($Grid->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Grid->DrName->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName"><?= $Grid->renderSort($Grid->DrName) ?></div></th>
<?php } ?>
<?php if ($Grid->DRDepartment->Visible) { // DRDepartment ?>
        <th data-name="DRDepartment" class="<?= $Grid->DRDepartment->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment"><?= $Grid->renderSort($Grid->DRDepartment) ?></div></th>
<?php } ?>
<?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <th data-name="ItemCode" class="<?= $Grid->ItemCode->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode"><?= $Grid->renderSort($Grid->ItemCode) ?></div></th>
<?php } ?>
<?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Grid->DEptCd->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd"><?= $Grid->renderSort($Grid->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Grid->CODE->Visible) { // CODE ?>
        <th data-name="CODE" class="<?= $Grid->CODE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE"><?= $Grid->renderSort($Grid->CODE) ?></div></th>
<?php } ?>
<?php if ($Grid->SERVICE->Visible) { // SERVICE ?>
        <th data-name="SERVICE" class="<?= $Grid->SERVICE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE"><?= $Grid->renderSort($Grid->SERVICE) ?></div></th>
<?php } ?>
<?php if ($Grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <th data-name="SERVICE_TYPE" class="<?= $Grid->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE"><?= $Grid->renderSort($Grid->SERVICE_TYPE) ?></div></th>
<?php } ?>
<?php if ($Grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th data-name="DEPARTMENT" class="<?= $Grid->DEPARTMENT->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT"><?= $Grid->renderSort($Grid->DEPARTMENT) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->vid->Visible) { // vid ?>
        <th data-name="vid" class="<?= $Grid->vid->headerCellClass() ?>"><div id="elh_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid"><?= $Grid->renderSort($Grid->vid) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_dashboard_service_details", "data-rowtype" => $Grid->RowType]);

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
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Grid->PatientId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<?= $Grid->PatientId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_PatientId" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_PatientId" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_PatientName" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_PatientName" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Services->Visible) { // Services ?>
        <td data-name="Services" <?= $Grid->Services->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_Services" class="form-group">
<input type="<?= $Grid->Services->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" value="<?= $Grid->Services->EditValue ?>"<?= $Grid->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Services" id="o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_Services" class="form-group">
<input type="<?= $Grid->Services->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" value="<?= $Grid->Services->EditValue ?>"<?= $Grid->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_Services">
<span<?= $Grid->Services->viewAttributes() ?>>
<?= $Grid->Services->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_Services" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_Services" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->amount->Visible) { // amount ?>
        <td data-name="amount" <?= $Grid->amount->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_amount" class="form-group">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="30" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_amount" id="o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_amount" class="form-group">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="30" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_amount">
<span<?= $Grid->amount->viewAttributes() ?>>
<?= $Grid->amount->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_amount" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_amount" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" <?= $Grid->SubTotal->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SubTotal" class="form-group">
<input type="<?= $Grid->SubTotal->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?= $Grid->RowIndex ?>_SubTotal" id="x<?= $Grid->RowIndex ?>_SubTotal" size="30" placeholder="<?= HtmlEncode($Grid->SubTotal->getPlaceHolder()) ?>" value="<?= $Grid->SubTotal->EditValue ?>"<?= $Grid->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SubTotal->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SubTotal" id="o<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SubTotal" class="form-group">
<input type="<?= $Grid->SubTotal->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?= $Grid->RowIndex ?>_SubTotal" id="x<?= $Grid->RowIndex ?>_SubTotal" size="30" placeholder="<?= HtmlEncode($Grid->SubTotal->getPlaceHolder()) ?>" value="<?= $Grid->SubTotal->EditValue ?>"<?= $Grid->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SubTotal->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SubTotal">
<span<?= $Grid->SubTotal->viewAttributes() ?>>
<?= $Grid->SubTotal->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_SubTotal" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_SubTotal" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_createdby" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_createdby" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate" <?= $Grid->createdDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createdDate" class="form-group">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createdDate" class="form-group">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdDate" id="o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createdDate" class="form-group">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createdDate" class="form-group">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<?= $Grid->createdDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_createdDate" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_createdDate" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Grid->DrName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DrName" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_DrName"><?= EmptyValue(strval($Grid->DrName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->DrName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->DrName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->DrName->ReadOnly || $Grid->DrName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DrName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
<?= $Grid->DrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DrName") ?>
<input type="hidden" is="selection-list" data-table="view_dashboard_service_details" data-field="x_DrName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->DrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" value="<?= $Grid->DrName->CurrentValue ?>"<?= $Grid->DrName->editAttributes() ?>>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrName" id="o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DrName" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_DrName"><?= EmptyValue(strval($Grid->DrName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->DrName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->DrName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->DrName->ReadOnly || $Grid->DrName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DrName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
<?= $Grid->DrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DrName") ?>
<input type="hidden" is="selection-list" data-table="view_dashboard_service_details" data-field="x_DrName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->DrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" value="<?= $Grid->DrName->CurrentValue ?>"<?= $Grid->DrName->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DrName">
<span<?= $Grid->DrName->viewAttributes() ?>>
<?= $Grid->DrName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_DrName" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_DrName" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DRDepartment->Visible) { // DRDepartment ?>
        <td data-name="DRDepartment" <?= $Grid->DRDepartment->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DRDepartment" class="form-group">
<input type="<?= $Grid->DRDepartment->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?= $Grid->RowIndex ?>_DRDepartment" id="x<?= $Grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DRDepartment->getPlaceHolder()) ?>" value="<?= $Grid->DRDepartment->EditValue ?>"<?= $Grid->DRDepartment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DRDepartment->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DRDepartment" id="o<?= $Grid->RowIndex ?>_DRDepartment" value="<?= HtmlEncode($Grid->DRDepartment->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DRDepartment" class="form-group">
<input type="<?= $Grid->DRDepartment->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?= $Grid->RowIndex ?>_DRDepartment" id="x<?= $Grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DRDepartment->getPlaceHolder()) ?>" value="<?= $Grid->DRDepartment->EditValue ?>"<?= $Grid->DRDepartment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DRDepartment->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DRDepartment">
<span<?= $Grid->DRDepartment->viewAttributes() ?>>
<?= $Grid->DRDepartment->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_DRDepartment" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_DRDepartment" value="<?= HtmlEncode($Grid->DRDepartment->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_DRDepartment" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_DRDepartment" value="<?= HtmlEncode($Grid->DRDepartment->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" <?= $Grid->ItemCode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_ItemCode" class="form-group">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemCode" id="o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_ItemCode" class="form-group">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_ItemCode">
<span<?= $Grid->ItemCode->viewAttributes() ?>>
<?= $Grid->ItemCode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_ItemCode" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_ItemCode" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Grid->DEptCd->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DEptCd" class="form-group">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEptCd" id="o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DEptCd" class="form-group">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DEptCd">
<span<?= $Grid->DEptCd->viewAttributes() ?>>
<?= $Grid->DEptCd->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_DEptCd" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_DEptCd" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CODE->Visible) { // CODE ?>
        <td data-name="CODE" <?= $Grid->CODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_CODE" class="form-group">
<input type="<?= $Grid->CODE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?= $Grid->RowIndex ?>_CODE" id="x<?= $Grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CODE->getPlaceHolder()) ?>" value="<?= $Grid->CODE->EditValue ?>"<?= $Grid->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CODE" id="o<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_CODE" class="form-group">
<input type="<?= $Grid->CODE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?= $Grid->RowIndex ?>_CODE" id="x<?= $Grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CODE->getPlaceHolder()) ?>" value="<?= $Grid->CODE->EditValue ?>"<?= $Grid->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_CODE">
<span<?= $Grid->CODE->viewAttributes() ?>>
<?= $Grid->CODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_CODE" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_CODE" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE" <?= $Grid->SERVICE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SERVICE" class="form-group">
<input type="<?= $Grid->SERVICE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?= $Grid->RowIndex ?>_SERVICE" id="x<?= $Grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE->EditValue ?>"<?= $Grid->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SERVICE" id="o<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SERVICE" class="form-group">
<input type="<?= $Grid->SERVICE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?= $Grid->RowIndex ?>_SERVICE" id="x<?= $Grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE->EditValue ?>"<?= $Grid->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SERVICE">
<span<?= $Grid->SERVICE->viewAttributes() ?>>
<?= $Grid->SERVICE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_SERVICE" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_SERVICE" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE" <?= $Grid->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->SERVICE_TYPE->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group">
<span<?= $Grid->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SERVICE_TYPE->getDisplayValue($Grid->SERVICE_TYPE->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group">
<input type="<?= $Grid->SERVICE_TYPE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE_TYPE->EditValue ?>"<?= $Grid->SERVICE_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE_TYPE->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="o<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->SERVICE_TYPE->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group">
<span<?= $Grid->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SERVICE_TYPE->getDisplayValue($Grid->SERVICE_TYPE->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE" class="form-group">
<input type="<?= $Grid->SERVICE_TYPE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE_TYPE->EditValue ?>"<?= $Grid->SERVICE_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE_TYPE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_SERVICE_TYPE">
<span<?= $Grid->SERVICE_TYPE->viewAttributes() ?>>
<?= $Grid->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" <?= $Grid->DEPARTMENT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT" class="form-group">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEPARTMENT->getDisplayValue($Grid->DEPARTMENT->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT" class="form-group">
<input type="<?= $Grid->DEPARTMENT->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Grid->DEPARTMENT->EditValue ?>"<?= $Grid->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEPARTMENT->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEPARTMENT" id="o<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT" class="form-group">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEPARTMENT->getDisplayValue($Grid->DEPARTMENT->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT" class="form-group">
<input type="<?= $Grid->DEPARTMENT->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Grid->DEPARTMENT->EditValue ?>"<?= $Grid->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEPARTMENT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_DEPARTMENT">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<?= $Grid->DEPARTMENT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_DEPARTMENT" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_HospID" class="form-group">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_service_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid"], function() {
    fview_dashboard_service_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_service_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_HospID" class="form-group">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_HospID" class="form-group">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_service_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid"], function() {
    fview_dashboard_service_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_service_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->vid->Visible) { // vid ?>
        <td data-name="vid" <?= $Grid->vid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_vid" class="form-group"></span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vid" id="o<?= $Grid->RowIndex ?>_vid" value="<?= HtmlEncode($Grid->vid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_vid" class="form-group">
<span<?= $Grid->vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vid->getDisplayValue($Grid->vid->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vid" id="x<?= $Grid->RowIndex ?>_vid" value="<?= HtmlEncode($Grid->vid->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_dashboard_service_details_vid">
<span<?= $Grid->vid->viewAttributes() ?>>
<?= $Grid->vid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" data-hidden="1" name="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_vid" id="fview_dashboard_service_detailsgrid$x<?= $Grid->RowIndex ?>_vid" value="<?= HtmlEncode($Grid->vid->FormValue) ?>">
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" data-hidden="1" name="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_vid" id="fview_dashboard_service_detailsgrid$o<?= $Grid->RowIndex ?>_vid" value="<?= HtmlEncode($Grid->vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vid" id="x<?= $Grid->RowIndex ?>_vid" value="<?= HtmlEncode($Grid->vid->CurrentValue) ?>">
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == ROWTYPE_ADD || $Grid->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid","load"], function () {
    fview_dashboard_service_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_dashboard_service_details", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientId" class="form-group view_dashboard_service_details_PatientId">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientId" class="form-group view_dashboard_service_details_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientName" class="form-group view_dashboard_service_details_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_PatientName" class="form-group view_dashboard_service_details_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Services->Visible) { // Services ?>
        <td data-name="Services">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_Services" class="form-group view_dashboard_service_details_Services">
<input type="<?= $Grid->Services->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_Services" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" value="<?= $Grid->Services->EditValue ?>"<?= $Grid->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_Services" class="form-group view_dashboard_service_details_Services">
<span<?= $Grid->Services->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Services->getDisplayValue($Grid->Services->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_Services" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Services" id="o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->amount->Visible) { // amount ?>
        <td data-name="amount">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_amount" class="form-group view_dashboard_service_details_amount">
<input type="<?= $Grid->amount->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_amount" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" size="30" placeholder="<?= HtmlEncode($Grid->amount->getPlaceHolder()) ?>" value="<?= $Grid->amount->EditValue ?>"<?= $Grid->amount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->amount->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_amount" class="form-group view_dashboard_service_details_amount">
<span<?= $Grid->amount->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->amount->getDisplayValue($Grid->amount->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" data-hidden="1" name="x<?= $Grid->RowIndex ?>_amount" id="x<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_amount" data-hidden="1" name="o<?= $Grid->RowIndex ?>_amount" id="o<?= $Grid->RowIndex ?>_amount" value="<?= HtmlEncode($Grid->amount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_SubTotal" class="form-group view_dashboard_service_details_SubTotal">
<input type="<?= $Grid->SubTotal->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SubTotal" name="x<?= $Grid->RowIndex ?>_SubTotal" id="x<?= $Grid->RowIndex ?>_SubTotal" size="30" placeholder="<?= HtmlEncode($Grid->SubTotal->getPlaceHolder()) ?>" value="<?= $Grid->SubTotal->EditValue ?>"<?= $Grid->SubTotal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SubTotal->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SubTotal" class="form-group view_dashboard_service_details_SubTotal">
<span<?= $Grid->SubTotal->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SubTotal->getDisplayValue($Grid->SubTotal->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SubTotal" id="x<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SubTotal" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SubTotal" id="o<?= $Grid->RowIndex ?>_SubTotal" value="<?= HtmlEncode($Grid->SubTotal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdby" class="form-group view_dashboard_service_details_createdby">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdby" class="form-group view_dashboard_service_details_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_createddatetime" class="form-group view_dashboard_service_details_createddatetime">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createddatetime" class="form-group view_dashboard_service_details_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->createdDate->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_createdDate" name="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode(FormatDateTime($Grid->createdDate->CurrentValue, 7)) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<input type="<?= $Grid->createdDate->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_createdDate" data-format="7" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" placeholder="<?= HtmlEncode($Grid->createdDate->getPlaceHolder()) ?>" value="<?= $Grid->createdDate->EditValue ?>"<?= $Grid->createdDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdDate->getErrorMessage() ?></div>
<?php if (!$Grid->createdDate->ReadOnly && !$Grid->createdDate->Disabled && !isset($Grid->createdDate->EditAttrs["readonly"]) && !isset($Grid->createdDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_service_detailsgrid", "x<?= $Grid->RowIndex ?>_createdDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_createdDate" class="form-group view_dashboard_service_details_createdDate">
<span<?= $Grid->createdDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdDate->getDisplayValue($Grid->createdDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdDate" id="x<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_createdDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdDate" id="o<?= $Grid->RowIndex ?>_createdDate" value="<?= HtmlEncode($Grid->createdDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrName->Visible) { // DrName ?>
        <td data-name="DrName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DrName" class="form-group view_dashboard_service_details_DrName">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_DrName"><?= EmptyValue(strval($Grid->DrName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->DrName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->DrName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->DrName->ReadOnly || $Grid->DrName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_DrName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
<?= $Grid->DrName->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_DrName") ?>
<input type="hidden" is="selection-list" data-table="view_dashboard_service_details" data-field="x_DrName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->DrName->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" value="<?= $Grid->DrName->CurrentValue ?>"<?= $Grid->DrName->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DrName" class="form-group view_dashboard_service_details_DrName">
<span<?= $Grid->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrName->getDisplayValue($Grid->DrName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrName" id="o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DRDepartment->Visible) { // DRDepartment ?>
        <td data-name="DRDepartment">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DRDepartment" class="form-group view_dashboard_service_details_DRDepartment">
<input type="<?= $Grid->DRDepartment->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DRDepartment" name="x<?= $Grid->RowIndex ?>_DRDepartment" id="x<?= $Grid->RowIndex ?>_DRDepartment" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DRDepartment->getPlaceHolder()) ?>" value="<?= $Grid->DRDepartment->EditValue ?>"<?= $Grid->DRDepartment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DRDepartment->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DRDepartment" class="form-group view_dashboard_service_details_DRDepartment">
<span<?= $Grid->DRDepartment->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DRDepartment->getDisplayValue($Grid->DRDepartment->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DRDepartment" id="x<?= $Grid->RowIndex ?>_DRDepartment" value="<?= HtmlEncode($Grid->DRDepartment->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DRDepartment" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DRDepartment" id="o<?= $Grid->RowIndex ?>_DRDepartment" value="<?= HtmlEncode($Grid->DRDepartment->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_ItemCode" class="form-group view_dashboard_service_details_ItemCode">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_ItemCode" class="form-group view_dashboard_service_details_ItemCode">
<span<?= $Grid->ItemCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ItemCode->getDisplayValue($Grid->ItemCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_ItemCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemCode" id="o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEptCd" class="form-group view_dashboard_service_details_DEptCd">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEptCd" class="form-group view_dashboard_service_details_DEptCd">
<span<?= $Grid->DEptCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEptCd->getDisplayValue($Grid->DEptCd->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEptCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEptCd" id="o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CODE->Visible) { // CODE ?>
        <td data-name="CODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_CODE" class="form-group view_dashboard_service_details_CODE">
<input type="<?= $Grid->CODE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_CODE" name="x<?= $Grid->RowIndex ?>_CODE" id="x<?= $Grid->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->CODE->getPlaceHolder()) ?>" value="<?= $Grid->CODE->EditValue ?>"<?= $Grid->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CODE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_CODE" class="form-group view_dashboard_service_details_CODE">
<span<?= $Grid->CODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CODE->getDisplayValue($Grid->CODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CODE" id="x<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_CODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CODE" id="o<?= $Grid->RowIndex ?>_CODE" value="<?= HtmlEncode($Grid->CODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE" class="form-group view_dashboard_service_details_SERVICE">
<input type="<?= $Grid->SERVICE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SERVICE" name="x<?= $Grid->RowIndex ?>_SERVICE" id="x<?= $Grid->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE->EditValue ?>"<?= $Grid->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE" class="form-group view_dashboard_service_details_SERVICE">
<span<?= $Grid->SERVICE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SERVICE->getDisplayValue($Grid->SERVICE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SERVICE" id="x<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SERVICE" id="o<?= $Grid->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Grid->SERVICE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->SERVICE_TYPE->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<span<?= $Grid->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SERVICE_TYPE->getDisplayValue($Grid->SERVICE_TYPE->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<input type="<?= $Grid->SERVICE_TYPE->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->SERVICE_TYPE->getPlaceHolder()) ?>" value="<?= $Grid->SERVICE_TYPE->EditValue ?>"<?= $Grid->SERVICE_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SERVICE_TYPE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_SERVICE_TYPE" class="form-group view_dashboard_service_details_SERVICE_TYPE">
<span<?= $Grid->SERVICE_TYPE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SERVICE_TYPE->getDisplayValue($Grid->SERVICE_TYPE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="x<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_SERVICE_TYPE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SERVICE_TYPE" id="o<?= $Grid->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Grid->SERVICE_TYPE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->DEPARTMENT->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEPARTMENT->getDisplayValue($Grid->DEPARTMENT->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<input type="<?= $Grid->DEPARTMENT->getInputTextType() ?>" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Grid->DEPARTMENT->EditValue ?>"<?= $Grid->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEPARTMENT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_DEPARTMENT" class="form-group view_dashboard_service_details_DEPARTMENT">
<span<?= $Grid->DEPARTMENT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEPARTMENT->getDisplayValue($Grid->DEPARTMENT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DEPARTMENT" id="x<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_DEPARTMENT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEPARTMENT" id="o<?= $Grid->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Grid->DEPARTMENT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->HospID->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_HospID" name="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<?php
$onchange = $Grid->HospID->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->HospID->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_HospID" class="ew-auto-suggest">
    <input type="<?= $Grid->HospID->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_HospID" id="sv_x<?= $Grid->RowIndex ?>_HospID" value="<?= RemoveHtml($Grid->HospID->EditValue) ?>" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>"<?= $Grid->HospID->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_dashboard_service_details" data-field="x_HospID" data-input="sv_x<?= $Grid->RowIndex ?>_HospID" data-value-separator="<?= $Grid->HospID->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid"], function() {
    fview_dashboard_service_detailsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_HospID","forceSelect":false}, ew.vars.tables.view_dashboard_service_details.fields.HospID.autoSuggestOptions));
});
</script>
<?= $Grid->HospID->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_HospID") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_HospID" class="form-group view_dashboard_service_details_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->vid->Visible) { // vid ?>
        <td data-name="vid">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_dashboard_service_details_vid" class="form-group view_dashboard_service_details_vid"></span>
<?php } else { ?>
<span id="el$rowindex$_view_dashboard_service_details_vid" class="form-group view_dashboard_service_details_vid">
<span<?= $Grid->vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->vid->getDisplayValue($Grid->vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_vid" id="x<?= $Grid->RowIndex ?>_vid" value="<?= HtmlEncode($Grid->vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_dashboard_service_details" data-field="x_vid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_vid" id="o<?= $Grid->RowIndex ?>_vid" value="<?= HtmlEncode($Grid->vid->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_dashboard_service_detailsgrid","load"], function() {
    fview_dashboard_service_detailsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" class="<?= $Grid->PatientId->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientId" class="view_dashboard_service_details_PatientId">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" class="<?= $Grid->PatientName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_PatientName" class="view_dashboard_service_details_PatientName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->Services->Visible) { // Services ?>
        <td data-name="Services" class="<?= $Grid->Services->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_Services" class="view_dashboard_service_details_Services">
        <span class="ew-aggregate"><?= $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
        <?= $Grid->Services->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->amount->Visible) { // amount ?>
        <td data-name="amount" class="<?= $Grid->amount->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_amount" class="view_dashboard_service_details_amount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->amount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->SubTotal->Visible) { // SubTotal ?>
        <td data-name="SubTotal" class="<?= $Grid->SubTotal->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SubTotal" class="view_dashboard_service_details_SubTotal">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Grid->SubTotal->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" class="<?= $Grid->createdby->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdby" class="view_dashboard_service_details_createdby">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" class="<?= $Grid->createddatetime->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createddatetime" class="view_dashboard_service_details_createddatetime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->createdDate->Visible) { // createdDate ?>
        <td data-name="createdDate" class="<?= $Grid->createdDate->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_createdDate" class="view_dashboard_service_details_createdDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DrName->Visible) { // DrName ?>
        <td data-name="DrName" class="<?= $Grid->DrName->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DrName" class="view_dashboard_service_details_DrName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DRDepartment->Visible) { // DRDepartment ?>
        <td data-name="DRDepartment" class="<?= $Grid->DRDepartment->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DRDepartment" class="view_dashboard_service_details_DRDepartment">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" class="<?= $Grid->ItemCode->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_ItemCode" class="view_dashboard_service_details_ItemCode">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" class="<?= $Grid->DEptCd->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEptCd" class="view_dashboard_service_details_DEptCd">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->CODE->Visible) { // CODE ?>
        <td data-name="CODE" class="<?= $Grid->CODE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_CODE" class="view_dashboard_service_details_CODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE" class="<?= $Grid->SERVICE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE" class="view_dashboard_service_details_SERVICE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE" class="<?= $Grid->SERVICE_TYPE->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_SERVICE_TYPE" class="view_dashboard_service_details_SERVICE_TYPE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" class="<?= $Grid->DEPARTMENT->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_DEPARTMENT" class="view_dashboard_service_details_DEPARTMENT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Grid->HospID->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_HospID" class="view_dashboard_service_details_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Grid->vid->Visible) { // vid ?>
        <td data-name="vid" class="<?= $Grid->vid->footerCellClass() ?>"><span id="elf_view_dashboard_service_details_vid" class="view_dashboard_service_details_vid">
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
<input type="hidden" name="detailpage" value="fview_dashboard_service_detailsgrid">
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
    ew.addEventHandlers("view_dashboard_service_details");
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
        container: "gmp_view_dashboard_service_details",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

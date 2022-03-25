<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("ViewLabResultreleasedGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_lab_resultreleasedgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fview_lab_resultreleasedgrid = new ew.Form("fview_lab_resultreleasedgrid", "grid");
    fview_lab_resultreleasedgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_lab_resultreleased")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_lab_resultreleased)
        ew.vars.tables.view_lab_resultreleased = currentTable;
    fview_lab_resultreleasedgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null, ew.Validators.integer], fields.PatID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["sid", [fields.sid.visible && fields.sid.required ? ew.Validators.required(fields.sid.caption) : null, ew.Validators.integer], fields.sid.isInvalid],
        ["ItemCode", [fields.ItemCode.visible && fields.ItemCode.required ? ew.Validators.required(fields.ItemCode.caption) : null], fields.ItemCode.isInvalid],
        ["DEptCd", [fields.DEptCd.visible && fields.DEptCd.required ? ew.Validators.required(fields.DEptCd.caption) : null], fields.DEptCd.isInvalid],
        ["Resulted", [fields.Resulted.visible && fields.Resulted.required ? ew.Validators.required(fields.Resulted.caption) : null], fields.Resulted.isInvalid],
        ["Services", [fields.Services.visible && fields.Services.required ? ew.Validators.required(fields.Services.caption) : null], fields.Services.isInvalid],
        ["LabReport", [fields.LabReport.visible && fields.LabReport.required ? ew.Validators.required(fields.LabReport.caption) : null], fields.LabReport.isInvalid],
        ["Pic1", [fields.Pic1.visible && fields.Pic1.required ? ew.Validators.fileRequired(fields.Pic1.caption) : null], fields.Pic1.isInvalid],
        ["Pic2", [fields.Pic2.visible && fields.Pic2.required ? ew.Validators.fileRequired(fields.Pic2.caption) : null], fields.Pic2.isInvalid],
        ["TestUnit", [fields.TestUnit.visible && fields.TestUnit.required ? ew.Validators.required(fields.TestUnit.caption) : null], fields.TestUnit.isInvalid],
        ["RefValue", [fields.RefValue.visible && fields.RefValue.required ? ew.Validators.required(fields.RefValue.caption) : null], fields.RefValue.isInvalid],
        ["Order", [fields.Order.visible && fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["Repeated", [fields.Repeated.visible && fields.Repeated.required ? ew.Validators.required(fields.Repeated.caption) : null], fields.Repeated.isInvalid],
        ["Vid", [fields.Vid.visible && fields.Vid.required ? ew.Validators.required(fields.Vid.caption) : null, ew.Validators.integer], fields.Vid.isInvalid],
        ["invoiceId", [fields.invoiceId.visible && fields.invoiceId.required ? ew.Validators.required(fields.invoiceId.caption) : null, ew.Validators.integer], fields.invoiceId.isInvalid],
        ["DrID", [fields.DrID.visible && fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null, ew.Validators.integer], fields.DrID.isInvalid],
        ["DrCODE", [fields.DrCODE.visible && fields.DrCODE.required ? ew.Validators.required(fields.DrCODE.caption) : null], fields.DrCODE.isInvalid],
        ["DrName", [fields.DrName.visible && fields.DrName.required ? ew.Validators.required(fields.DrName.caption) : null], fields.DrName.isInvalid],
        ["Department", [fields.Department.visible && fields.Department.required ? ew.Validators.required(fields.Department.caption) : null], fields.Department.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["TestType", [fields.TestType.visible && fields.TestType.required ? ew.Validators.required(fields.TestType.caption) : null], fields.TestType.isInvalid],
        ["ResultDate", [fields.ResultDate.visible && fields.ResultDate.required ? ew.Validators.required(fields.ResultDate.caption) : null], fields.ResultDate.isInvalid],
        ["ResultedBy", [fields.ResultedBy.visible && fields.ResultedBy.required ? ew.Validators.required(fields.ResultedBy.caption) : null], fields.ResultedBy.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_lab_resultreleasedgrid,
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
    fview_lab_resultreleasedgrid.validate = function () {
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
    fview_lab_resultreleasedgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PatID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "sid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ItemCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DEptCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Resulted[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Services", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LabReport", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pic1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pic2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RefValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Order", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Repeated[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Vid", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "invoiceId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Department", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fview_lab_resultreleasedgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_lab_resultreleasedgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_lab_resultreleasedgrid.lists.Resulted = <?= $Grid->Resulted->toClientList($Grid) ?>;
    fview_lab_resultreleasedgrid.lists.TestUnit = <?= $Grid->TestUnit->toClientList($Grid) ?>;
    fview_lab_resultreleasedgrid.lists.Repeated = <?= $Grid->Repeated->toClientList($Grid) ?>;
    loadjs.done("fview_lab_resultreleasedgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_resultreleased">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fview_lab_resultreleasedgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_view_lab_resultreleased" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_view_lab_resultreleasedgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_id" class="view_lab_resultreleased_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Grid->PatID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_PatID" class="view_lab_resultreleased_PatID"><?= $Grid->renderSort($Grid->PatID) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_PatientName" class="view_lab_resultreleased_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Grid->Age->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Age" class="view_lab_resultreleased_Age"><?= $Grid->renderSort($Grid->Age) ?></div></th>
<?php } ?>
<?php if ($Grid->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Grid->Gender->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Gender" class="view_lab_resultreleased_Gender"><?= $Grid->renderSort($Grid->Gender) ?></div></th>
<?php } ?>
<?php if ($Grid->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Grid->sid->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_sid" class="view_lab_resultreleased_sid"><?= $Grid->renderSort($Grid->sid) ?></div></th>
<?php } ?>
<?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <th data-name="ItemCode" class="<?= $Grid->ItemCode->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ItemCode" class="view_lab_resultreleased_ItemCode"><?= $Grid->renderSort($Grid->ItemCode) ?></div></th>
<?php } ?>
<?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Grid->DEptCd->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DEptCd" class="view_lab_resultreleased_DEptCd"><?= $Grid->renderSort($Grid->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Grid->Resulted->Visible) { // Resulted ?>
        <th data-name="Resulted" class="<?= $Grid->Resulted->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Resulted" class="view_lab_resultreleased_Resulted"><?= $Grid->renderSort($Grid->Resulted) ?></div></th>
<?php } ?>
<?php if ($Grid->Services->Visible) { // Services ?>
        <th data-name="Services" class="<?= $Grid->Services->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Services" class="view_lab_resultreleased_Services"><?= $Grid->renderSort($Grid->Services) ?></div></th>
<?php } ?>
<?php if ($Grid->LabReport->Visible) { // LabReport ?>
        <th data-name="LabReport" class="<?= $Grid->LabReport->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_LabReport" class="view_lab_resultreleased_LabReport"><?= $Grid->renderSort($Grid->LabReport) ?></div></th>
<?php } ?>
<?php if ($Grid->Pic1->Visible) { // Pic1 ?>
        <th data-name="Pic1" class="<?= $Grid->Pic1->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Pic1" class="view_lab_resultreleased_Pic1"><?= $Grid->renderSort($Grid->Pic1) ?></div></th>
<?php } ?>
<?php if ($Grid->Pic2->Visible) { // Pic2 ?>
        <th data-name="Pic2" class="<?= $Grid->Pic2->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Pic2" class="view_lab_resultreleased_Pic2"><?= $Grid->renderSort($Grid->Pic2) ?></div></th>
<?php } ?>
<?php if ($Grid->TestUnit->Visible) { // TestUnit ?>
        <th data-name="TestUnit" class="<?= $Grid->TestUnit->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_TestUnit" class="view_lab_resultreleased_TestUnit"><?= $Grid->renderSort($Grid->TestUnit) ?></div></th>
<?php } ?>
<?php if ($Grid->RefValue->Visible) { // RefValue ?>
        <th data-name="RefValue" class="<?= $Grid->RefValue->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_RefValue" class="view_lab_resultreleased_RefValue"><?= $Grid->renderSort($Grid->RefValue) ?></div></th>
<?php } ?>
<?php if ($Grid->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Grid->Order->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Order" class="view_lab_resultreleased_Order"><?= $Grid->renderSort($Grid->Order) ?></div></th>
<?php } ?>
<?php if ($Grid->Repeated->Visible) { // Repeated ?>
        <th data-name="Repeated" class="<?= $Grid->Repeated->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Repeated" class="view_lab_resultreleased_Repeated"><?= $Grid->renderSort($Grid->Repeated) ?></div></th>
<?php } ?>
<?php if ($Grid->Vid->Visible) { // Vid ?>
        <th data-name="Vid" class="<?= $Grid->Vid->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Vid" class="view_lab_resultreleased_Vid"><?= $Grid->renderSort($Grid->Vid) ?></div></th>
<?php } ?>
<?php if ($Grid->invoiceId->Visible) { // invoiceId ?>
        <th data-name="invoiceId" class="<?= $Grid->invoiceId->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_invoiceId" class="view_lab_resultreleased_invoiceId"><?= $Grid->renderSort($Grid->invoiceId) ?></div></th>
<?php } ?>
<?php if ($Grid->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Grid->DrID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrID" class="view_lab_resultreleased_DrID"><?= $Grid->renderSort($Grid->DrID) ?></div></th>
<?php } ?>
<?php if ($Grid->DrCODE->Visible) { // DrCODE ?>
        <th data-name="DrCODE" class="<?= $Grid->DrCODE->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrCODE" class="view_lab_resultreleased_DrCODE"><?= $Grid->renderSort($Grid->DrCODE) ?></div></th>
<?php } ?>
<?php if ($Grid->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Grid->DrName->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_DrName" class="view_lab_resultreleased_DrName"><?= $Grid->renderSort($Grid->DrName) ?></div></th>
<?php } ?>
<?php if ($Grid->Department->Visible) { // Department ?>
        <th data-name="Department" class="<?= $Grid->Department->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_Department" class="view_lab_resultreleased_Department"><?= $Grid->renderSort($Grid->Department) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_createddatetime" class="view_lab_resultreleased_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_status" class="view_lab_resultreleased_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->TestType->Visible) { // TestType ?>
        <th data-name="TestType" class="<?= $Grid->TestType->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_TestType" class="view_lab_resultreleased_TestType"><?= $Grid->renderSort($Grid->TestType) ?></div></th>
<?php } ?>
<?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Grid->ResultDate->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ResultDate" class="view_lab_resultreleased_ResultDate"><?= $Grid->renderSort($Grid->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <th data-name="ResultedBy" class="<?= $Grid->ResultedBy->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_ResultedBy" class="view_lab_resultreleased_ResultedBy"><?= $Grid->renderSort($Grid->ResultedBy) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_view_lab_resultreleased_HospID" class="view_lab_resultreleased_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_view_lab_resultreleased", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_id" class="form-group"></span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_id" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_id" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Grid->PatID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<?= $Grid->PatID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatID" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_PatID" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatID" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_PatID" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatientName" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_PatientName" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatientName" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_PatientName" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Grid->Age->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<?= $Grid->Age->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Age" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Age" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Age" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Age" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Grid->Gender->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<?= $Grid->Gender->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Gender" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Gender" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Gender" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Gender" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Grid->sid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_sid" class="form-group">
<input type="<?= $Grid->sid->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_sid" name="x<?= $Grid->RowIndex ?>_sid" id="x<?= $Grid->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Grid->sid->getPlaceHolder()) ?>" value="<?= $Grid->sid->EditValue ?>"<?= $Grid->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_sid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sid" id="o<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_sid" class="form-group">
<input type="<?= $Grid->sid->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_sid" name="x<?= $Grid->RowIndex ?>_sid" id="x<?= $Grid->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Grid->sid->getPlaceHolder()) ?>" value="<?= $Grid->sid->EditValue ?>"<?= $Grid->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_sid">
<span<?= $Grid->sid->viewAttributes() ?>>
<?= $Grid->sid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_sid" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_sid" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_sid" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_sid" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" <?= $Grid->ItemCode->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_ItemCode" class="form-group">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ItemCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemCode" id="o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_ItemCode" class="form-group">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_ItemCode">
<span<?= $Grid->ItemCode->viewAttributes() ?>>
<?= $Grid->ItemCode->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ItemCode" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_ItemCode" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ItemCode" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_ItemCode" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Grid->DEptCd->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DEptCd" class="form-group">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DEptCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEptCd" id="o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DEptCd" class="form-group">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DEptCd">
<span<?= $Grid->DEptCd->viewAttributes() ?>>
<?= $Grid->DEptCd->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DEptCd" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_DEptCd" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DEptCd" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_DEptCd" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted" <?= $Grid->Resulted->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Resulted" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Resulted">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased" data-field="x_Resulted" name="x<?= $Grid->RowIndex ?>_Resulted" id="x<?= $Grid->RowIndex ?>_Resulted"<?= $Grid->Resulted->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Resulted" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Resulted[]"
    name="x<?= $Grid->RowIndex ?>_Resulted[]"
    value="<?= HtmlEncode($Grid->Resulted->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Resulted"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Resulted"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Resulted->isInvalidClass() ?>"
    data-table="view_lab_resultreleased"
    data-field="x_Resulted"
    data-value-separator="<?= $Grid->Resulted->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resulted->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Resulted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Resulted[]" id="o<?= $Grid->RowIndex ?>_Resulted[]" value="<?= HtmlEncode($Grid->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Resulted" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Resulted">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased" data-field="x_Resulted" name="x<?= $Grid->RowIndex ?>_Resulted" id="x<?= $Grid->RowIndex ?>_Resulted"<?= $Grid->Resulted->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Resulted" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Resulted[]"
    name="x<?= $Grid->RowIndex ?>_Resulted[]"
    value="<?= HtmlEncode($Grid->Resulted->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Resulted"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Resulted"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Resulted->isInvalidClass() ?>"
    data-table="view_lab_resultreleased"
    data-field="x_Resulted"
    data-value-separator="<?= $Grid->Resulted->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resulted->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Resulted">
<span<?= $Grid->Resulted->viewAttributes() ?>>
<?= $Grid->Resulted->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Resulted" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Resulted" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Resulted" value="<?= HtmlEncode($Grid->Resulted->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Resulted" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Resulted[]" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Resulted[]" value="<?= HtmlEncode($Grid->Resulted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Services->Visible) { // Services ?>
        <td data-name="Services" <?= $Grid->Services->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Services" class="form-group">
<input type="<?= $Grid->Services->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Services" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" value="<?= $Grid->Services->EditValue ?>"<?= $Grid->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Services" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Services" id="o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Services" class="form-group">
<input type="<?= $Grid->Services->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Services" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" value="<?= $Grid->Services->EditValue ?>"<?= $Grid->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Services">
<span<?= $Grid->Services->viewAttributes() ?>>
<?= $Grid->Services->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Services" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Services" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Services" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Services" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->LabReport->Visible) { // LabReport ?>
        <td data-name="LabReport" <?= $Grid->LabReport->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_LabReport" class="form-group">
<textarea data-table="view_lab_resultreleased" data-field="x_LabReport" name="x<?= $Grid->RowIndex ?>_LabReport" id="x<?= $Grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?= HtmlEncode($Grid->LabReport->getPlaceHolder()) ?>"<?= $Grid->LabReport->editAttributes() ?>><?= $Grid->LabReport->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->LabReport->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_LabReport" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LabReport" id="o<?= $Grid->RowIndex ?>_LabReport" value="<?= HtmlEncode($Grid->LabReport->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_LabReport" class="form-group">
<textarea data-table="view_lab_resultreleased" data-field="x_LabReport" name="x<?= $Grid->RowIndex ?>_LabReport" id="x<?= $Grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?= HtmlEncode($Grid->LabReport->getPlaceHolder()) ?>"<?= $Grid->LabReport->editAttributes() ?>><?= $Grid->LabReport->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->LabReport->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_LabReport">
<span<?= $Grid->LabReport->viewAttributes() ?>>
<?= $Grid->LabReport->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_LabReport" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_LabReport" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_LabReport" value="<?= HtmlEncode($Grid->LabReport->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_LabReport" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_LabReport" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_LabReport" value="<?= HtmlEncode($Grid->LabReport->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" <?= $Grid->Pic1->cellAttributes() ?>>
<?php if ($Grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_view_lab_resultreleased_Pic1" class="form-group view_lab_resultreleased_Pic1">
<div id="fd_x<?= $Grid->RowIndex ?>_Pic1">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->Pic1->title() ?>" data-table="view_lab_resultreleased" data-field="x_Pic1" name="x<?= $Grid->RowIndex ?>_Pic1" id="x<?= $Grid->RowIndex ?>_Pic1" lang="<?= CurrentLanguageID() ?>"<?= $Grid->Pic1->editAttributes() ?><?= ($Grid->Pic1->ReadOnly || $Grid->Pic1->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_Pic1"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Pic1->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_Pic1" id= "fn_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_Pic1" id= "fa_x<?= $Grid->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_Pic1" id= "fs_x<?= $Grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_Pic1" id= "fx_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_Pic1" id= "fm_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Pic1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pic1" id="o<?= $Grid->RowIndex ?>_Pic1" value="<?= HtmlEncode($Grid->Pic1->OldValue) ?>">
<?php } elseif ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Pic1">
<span<?= $Grid->Pic1->viewAttributes() ?>>
<?= GetFileViewTag($Grid->Pic1, $Grid->Pic1->getViewValue(), false) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Pic1" class="form-group view_lab_resultreleased_Pic1">
<div id="fd_x<?= $Grid->RowIndex ?>_Pic1">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->Pic1->title() ?>" data-table="view_lab_resultreleased" data-field="x_Pic1" name="x<?= $Grid->RowIndex ?>_Pic1" id="x<?= $Grid->RowIndex ?>_Pic1" lang="<?= CurrentLanguageID() ?>"<?= $Grid->Pic1->editAttributes() ?><?= ($Grid->Pic1->ReadOnly || $Grid->Pic1->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_Pic1"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Pic1->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_Pic1" id= "fn_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_Pic1" id= "fa_x<?= $Grid->RowIndex ?>_Pic1" value="<?= (Post("fa_x<?= $Grid->RowIndex ?>_Pic1") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_Pic1" id= "fs_x<?= $Grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_Pic1" id= "fx_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_Pic1" id= "fm_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" <?= $Grid->Pic2->cellAttributes() ?>>
<?php if ($Grid->RowAction == "insert") { // Add record ?>
<span id="el$rowindex$_view_lab_resultreleased_Pic2" class="form-group view_lab_resultreleased_Pic2">
<div id="fd_x<?= $Grid->RowIndex ?>_Pic2">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->Pic2->title() ?>" data-table="view_lab_resultreleased" data-field="x_Pic2" name="x<?= $Grid->RowIndex ?>_Pic2" id="x<?= $Grid->RowIndex ?>_Pic2" lang="<?= CurrentLanguageID() ?>"<?= $Grid->Pic2->editAttributes() ?><?= ($Grid->Pic2->ReadOnly || $Grid->Pic2->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_Pic2"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Pic2->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_Pic2" id= "fn_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_Pic2" id= "fa_x<?= $Grid->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_Pic2" id= "fs_x<?= $Grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_Pic2" id= "fx_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_Pic2" id= "fm_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Pic2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pic2" id="o<?= $Grid->RowIndex ?>_Pic2" value="<?= HtmlEncode($Grid->Pic2->OldValue) ?>">
<?php } elseif ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Pic2">
<span<?= $Grid->Pic2->viewAttributes() ?>>
<?= GetFileViewTag($Grid->Pic2, $Grid->Pic2->getViewValue(), false) ?>
</span>
</span>
<?php } else  { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Pic2" class="form-group view_lab_resultreleased_Pic2">
<div id="fd_x<?= $Grid->RowIndex ?>_Pic2">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->Pic2->title() ?>" data-table="view_lab_resultreleased" data-field="x_Pic2" name="x<?= $Grid->RowIndex ?>_Pic2" id="x<?= $Grid->RowIndex ?>_Pic2" lang="<?= CurrentLanguageID() ?>"<?= $Grid->Pic2->editAttributes() ?><?= ($Grid->Pic2->ReadOnly || $Grid->Pic2->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_Pic2"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Pic2->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_Pic2" id= "fn_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_Pic2" id= "fa_x<?= $Grid->RowIndex ?>_Pic2" value="<?= (Post("fa_x<?= $Grid->RowIndex ?>_Pic2") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_Pic2" id= "fs_x<?= $Grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_Pic2" id= "fx_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_Pic2" id= "fm_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit" <?= $Grid->TestUnit->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_TestUnit" class="form-group">
<?php
$onchange = $Grid->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_TestUnit" class="ew-auto-suggest">
    <input type="<?= $Grid->TestUnit->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_TestUnit" id="sv_x<?= $Grid->RowIndex ?>_TestUnit" value="<?= RemoveHtml($Grid->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>"<?= $Grid->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-input="sv_x<?= $Grid->RowIndex ?>_TestUnit" data-value-separator="<?= $Grid->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_TestUnit" id="x<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->TestUnit->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_lab_resultreleasedgrid"], function() {
    fview_lab_resultreleasedgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_TestUnit","forceSelect":false}, ew.vars.tables.view_lab_resultreleased.fields.TestUnit.autoSuggestOptions));
});
</script>
<?= $Grid->TestUnit->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestUnit" id="o<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_TestUnit" class="form-group">
<?php
$onchange = $Grid->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_TestUnit" class="ew-auto-suggest">
    <input type="<?= $Grid->TestUnit->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_TestUnit" id="sv_x<?= $Grid->RowIndex ?>_TestUnit" value="<?= RemoveHtml($Grid->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>"<?= $Grid->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-input="sv_x<?= $Grid->RowIndex ?>_TestUnit" data-value-separator="<?= $Grid->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_TestUnit" id="x<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->TestUnit->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_lab_resultreleasedgrid"], function() {
    fview_lab_resultreleasedgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_TestUnit","forceSelect":false}, ew.vars.tables.view_lab_resultreleased.fields.TestUnit.autoSuggestOptions));
});
</script>
<?= $Grid->TestUnit->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_TestUnit") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_TestUnit">
<span<?= $Grid->TestUnit->viewAttributes() ?>>
<?= $Grid->TestUnit->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_TestUnit" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_TestUnit" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RefValue->Visible) { // RefValue ?>
        <td data-name="RefValue" <?= $Grid->RefValue->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_RefValue" class="form-group">
<textarea data-table="view_lab_resultreleased" data-field="x_RefValue" name="x<?= $Grid->RowIndex ?>_RefValue" id="x<?= $Grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?= HtmlEncode($Grid->RefValue->getPlaceHolder()) ?>"<?= $Grid->RefValue->editAttributes() ?>><?= $Grid->RefValue->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->RefValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_RefValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RefValue" id="o<?= $Grid->RowIndex ?>_RefValue" value="<?= HtmlEncode($Grid->RefValue->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_RefValue" class="form-group">
<textarea data-table="view_lab_resultreleased" data-field="x_RefValue" name="x<?= $Grid->RowIndex ?>_RefValue" id="x<?= $Grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?= HtmlEncode($Grid->RefValue->getPlaceHolder()) ?>"<?= $Grid->RefValue->editAttributes() ?>><?= $Grid->RefValue->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->RefValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_RefValue">
<span<?= $Grid->RefValue->viewAttributes() ?>>
<?= $Grid->RefValue->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_RefValue" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_RefValue" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_RefValue" value="<?= HtmlEncode($Grid->RefValue->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_RefValue" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_RefValue" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_RefValue" value="<?= HtmlEncode($Grid->RefValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Grid->Order->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Order" class="form-group">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Order" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Order" id="o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Order" class="form-group">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Order">
<span<?= $Grid->Order->viewAttributes() ?>>
<?= $Grid->Order->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Order" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Order" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Order" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Order" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated" <?= $Grid->Repeated->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Repeated" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Repeated">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased" data-field="x_Repeated" name="x<?= $Grid->RowIndex ?>_Repeated" id="x<?= $Grid->RowIndex ?>_Repeated"<?= $Grid->Repeated->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Repeated" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Repeated[]"
    name="x<?= $Grid->RowIndex ?>_Repeated[]"
    value="<?= HtmlEncode($Grid->Repeated->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Repeated"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Repeated"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Repeated->isInvalidClass() ?>"
    data-table="view_lab_resultreleased"
    data-field="x_Repeated"
    data-value-separator="<?= $Grid->Repeated->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Repeated->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Repeated" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Repeated[]" id="o<?= $Grid->RowIndex ?>_Repeated[]" value="<?= HtmlEncode($Grid->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Repeated" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_Repeated">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased" data-field="x_Repeated" name="x<?= $Grid->RowIndex ?>_Repeated" id="x<?= $Grid->RowIndex ?>_Repeated"<?= $Grid->Repeated->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Repeated" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Repeated[]"
    name="x<?= $Grid->RowIndex ?>_Repeated[]"
    value="<?= HtmlEncode($Grid->Repeated->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Repeated"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Repeated"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Repeated->isInvalidClass() ?>"
    data-table="view_lab_resultreleased"
    data-field="x_Repeated"
    data-value-separator="<?= $Grid->Repeated->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Repeated->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Repeated">
<span<?= $Grid->Repeated->viewAttributes() ?>>
<?= $Grid->Repeated->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Repeated" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Repeated" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Repeated" value="<?= HtmlEncode($Grid->Repeated->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Repeated" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Repeated[]" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Repeated[]" value="<?= HtmlEncode($Grid->Repeated->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Vid->Visible) { // Vid ?>
        <td data-name="Vid" <?= $Grid->Vid->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Vid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Vid" class="form-group">
<span<?= $Grid->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vid->getDisplayValue($Grid->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Vid" name="x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Vid" class="form-group">
<input type="<?= $Grid->Vid->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Vid" name="x<?= $Grid->RowIndex ?>_Vid" id="x<?= $Grid->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Grid->Vid->getPlaceHolder()) ?>" value="<?= $Grid->Vid->EditValue ?>"<?= $Grid->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Vid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Vid" id="o<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->Vid->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Vid" class="form-group">
<span<?= $Grid->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vid->getDisplayValue($Grid->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Vid" name="x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Vid" class="form-group">
<input type="<?= $Grid->Vid->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Vid" name="x<?= $Grid->RowIndex ?>_Vid" id="x<?= $Grid->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Grid->Vid->getPlaceHolder()) ?>" value="<?= $Grid->Vid->EditValue ?>"<?= $Grid->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Vid">
<span<?= $Grid->Vid->viewAttributes() ?>>
<?= $Grid->Vid->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Vid" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Vid" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Vid" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Vid" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" <?= $Grid->invoiceId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_invoiceId" class="form-group">
<input type="<?= $Grid->invoiceId->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="x<?= $Grid->RowIndex ?>_invoiceId" id="x<?= $Grid->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Grid->invoiceId->getPlaceHolder()) ?>" value="<?= $Grid->invoiceId->EditValue ?>"<?= $Grid->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_invoiceId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_invoiceId" id="o<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_invoiceId" class="form-group">
<input type="<?= $Grid->invoiceId->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="x<?= $Grid->RowIndex ?>_invoiceId" id="x<?= $Grid->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Grid->invoiceId->getPlaceHolder()) ?>" value="<?= $Grid->invoiceId->EditValue ?>"<?= $Grid->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_invoiceId">
<span<?= $Grid->invoiceId->viewAttributes() ?>>
<?= $Grid->invoiceId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_invoiceId" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_invoiceId" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_invoiceId" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_invoiceId" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Grid->DrID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrID" class="form-group">
<input type="<?= $Grid->DrID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrID" name="x<?= $Grid->RowIndex ?>_DrID" id="x<?= $Grid->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Grid->DrID->getPlaceHolder()) ?>" value="<?= $Grid->DrID->EditValue ?>"<?= $Grid->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrID" id="o<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrID" class="form-group">
<input type="<?= $Grid->DrID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrID" name="x<?= $Grid->RowIndex ?>_DrID" id="x<?= $Grid->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Grid->DrID->getPlaceHolder()) ?>" value="<?= $Grid->DrID->EditValue ?>"<?= $Grid->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrID">
<span<?= $Grid->DrID->viewAttributes() ?>>
<?= $Grid->DrID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrID" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_DrID" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrID" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_DrID" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE" <?= $Grid->DrCODE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrCODE" class="form-group">
<input type="<?= $Grid->DrCODE->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="x<?= $Grid->RowIndex ?>_DrCODE" id="x<?= $Grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrCODE->getPlaceHolder()) ?>" value="<?= $Grid->DrCODE->EditValue ?>"<?= $Grid->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrCODE" id="o<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrCODE" class="form-group">
<input type="<?= $Grid->DrCODE->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="x<?= $Grid->RowIndex ?>_DrCODE" id="x<?= $Grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrCODE->getPlaceHolder()) ?>" value="<?= $Grid->DrCODE->EditValue ?>"<?= $Grid->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrCODE">
<span<?= $Grid->DrCODE->viewAttributes() ?>>
<?= $Grid->DrCODE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrCODE" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_DrCODE" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrCODE" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_DrCODE" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Grid->DrName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrName" class="form-group">
<input type="<?= $Grid->DrName->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrName" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrName->getPlaceHolder()) ?>" value="<?= $Grid->DrName->EditValue ?>"<?= $Grid->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrName" id="o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrName" class="form-group">
<input type="<?= $Grid->DrName->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrName" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrName->getPlaceHolder()) ?>" value="<?= $Grid->DrName->EditValue ?>"<?= $Grid->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_DrName">
<span<?= $Grid->DrName->viewAttributes() ?>>
<?= $Grid->DrName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrName" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_DrName" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrName" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_DrName" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Department->Visible) { // Department ?>
        <td data-name="Department" <?= $Grid->Department->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Department" class="form-group">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Department" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Department" id="o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Department" class="form-group">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_Department">
<span<?= $Grid->Department->viewAttributes() ?>>
<?= $Grid->Department->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Department" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Department" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Department" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Department" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleasedgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_lab_resultreleasedgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleasedgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_lab_resultreleasedgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_createddatetime" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_createddatetime" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_status" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_status" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_status" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_status" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->TestType->Visible) { // TestType ?>
        <td data-name="TestType" <?= $Grid->TestType->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_TestType" class="form-group">
<input type="<?= $Grid->TestType->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_TestType" name="x<?= $Grid->RowIndex ?>_TestType" id="x<?= $Grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestType->getPlaceHolder()) ?>" value="<?= $Grid->TestType->EditValue ?>"<?= $Grid->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestType" id="o<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_TestType" class="form-group">
<input type="<?= $Grid->TestType->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_TestType" name="x<?= $Grid->RowIndex ?>_TestType" id="x<?= $Grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestType->getPlaceHolder()) ?>" value="<?= $Grid->TestType->EditValue ?>"<?= $Grid->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_TestType">
<span<?= $Grid->TestType->viewAttributes() ?>>
<?= $Grid->TestType->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestType" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_TestType" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestType" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_TestType" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Grid->ResultDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultDate" id="o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_ResultDate">
<span<?= $Grid->ResultDate->viewAttributes() ?>>
<?= $Grid->ResultDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultDate" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_ResultDate" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultDate" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_ResultDate" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" <?= $Grid->ResultedBy->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultedBy" id="o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_ResultedBy">
<span<?= $Grid->ResultedBy->viewAttributes() ?>>
<?= $Grid->ResultedBy->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultedBy" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_ResultedBy" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultedBy" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_ResultedBy" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_HospID" class="form-group">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_view_lab_resultreleased_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_HospID" data-hidden="1" name="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_HospID" id="fview_lab_resultreleasedgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_HospID" data-hidden="1" name="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_HospID" id="fview_lab_resultreleasedgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["fview_lab_resultreleasedgrid","load"], function () {
    fview_lab_resultreleasedgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_view_lab_resultreleased", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_view_lab_resultreleased_id" class="form-group view_lab_resultreleased_id"></span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_id" class="form-group view_lab_resultreleased_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_PatID" class="form-group view_lab_resultreleased_PatID">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_PatID" class="form-group view_lab_resultreleased_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_PatientName" class="form-group view_lab_resultreleased_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_PatientName" class="form-group view_lab_resultreleased_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_Age" class="form-group view_lab_resultreleased_Age">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Age" class="form-group view_lab_resultreleased_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Age->getDisplayValue($Grid->Age->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Age" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_Gender" class="form-group view_lab_resultreleased_Gender">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Gender" class="form-group view_lab_resultreleased_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gender->getDisplayValue($Grid->Gender->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Gender" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->sid->Visible) { // sid ?>
        <td data-name="sid">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_sid" class="form-group view_lab_resultreleased_sid">
<input type="<?= $Grid->sid->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_sid" name="x<?= $Grid->RowIndex ?>_sid" id="x<?= $Grid->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Grid->sid->getPlaceHolder()) ?>" value="<?= $Grid->sid->EditValue ?>"<?= $Grid->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->sid->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_sid" class="form-group view_lab_resultreleased_sid">
<span<?= $Grid->sid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->sid->getDisplayValue($Grid->sid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_sid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_sid" id="x<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_sid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_sid" id="o<?= $Grid->RowIndex ?>_sid" value="<?= HtmlEncode($Grid->sid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_ItemCode" class="form-group view_lab_resultreleased_ItemCode">
<input type="<?= $Grid->ItemCode->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_ItemCode" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->ItemCode->getPlaceHolder()) ?>" value="<?= $Grid->ItemCode->EditValue ?>"<?= $Grid->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ItemCode->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_ItemCode" class="form-group view_lab_resultreleased_ItemCode">
<span<?= $Grid->ItemCode->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ItemCode->getDisplayValue($Grid->ItemCode->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ItemCode" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ItemCode" id="x<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ItemCode" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ItemCode" id="o<?= $Grid->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Grid->ItemCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_DEptCd" class="form-group view_lab_resultreleased_DEptCd">
<input type="<?= $Grid->DEptCd->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DEptCd" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DEptCd->getPlaceHolder()) ?>" value="<?= $Grid->DEptCd->EditValue ?>"<?= $Grid->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DEptCd->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_DEptCd" class="form-group view_lab_resultreleased_DEptCd">
<span<?= $Grid->DEptCd->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DEptCd->getDisplayValue($Grid->DEptCd->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DEptCd" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DEptCd" id="x<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DEptCd" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DEptCd" id="o<?= $Grid->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Grid->DEptCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_Resulted" class="form-group view_lab_resultreleased_Resulted">
<template id="tp_x<?= $Grid->RowIndex ?>_Resulted">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased" data-field="x_Resulted" name="x<?= $Grid->RowIndex ?>_Resulted" id="x<?= $Grid->RowIndex ?>_Resulted"<?= $Grid->Resulted->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Resulted" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Resulted[]"
    name="x<?= $Grid->RowIndex ?>_Resulted[]"
    value="<?= HtmlEncode($Grid->Resulted->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Resulted"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Resulted"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Resulted->isInvalidClass() ?>"
    data-table="view_lab_resultreleased"
    data-field="x_Resulted"
    data-value-separator="<?= $Grid->Resulted->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Resulted->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Resulted" class="form-group view_lab_resultreleased_Resulted">
<span<?= $Grid->Resulted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Resulted->getDisplayValue($Grid->Resulted->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Resulted" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Resulted" id="x<?= $Grid->RowIndex ?>_Resulted" value="<?= HtmlEncode($Grid->Resulted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Resulted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Resulted[]" id="o<?= $Grid->RowIndex ?>_Resulted[]" value="<?= HtmlEncode($Grid->Resulted->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Services->Visible) { // Services ?>
        <td data-name="Services">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_Services" class="form-group view_lab_resultreleased_Services">
<input type="<?= $Grid->Services->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Services" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Services->getPlaceHolder()) ?>" value="<?= $Grid->Services->EditValue ?>"<?= $Grid->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Services->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Services" class="form-group view_lab_resultreleased_Services">
<span<?= $Grid->Services->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Services->getDisplayValue($Grid->Services->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Services" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Services" id="x<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Services" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Services" id="o<?= $Grid->RowIndex ?>_Services" value="<?= HtmlEncode($Grid->Services->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->LabReport->Visible) { // LabReport ?>
        <td data-name="LabReport">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_LabReport" class="form-group view_lab_resultreleased_LabReport">
<textarea data-table="view_lab_resultreleased" data-field="x_LabReport" name="x<?= $Grid->RowIndex ?>_LabReport" id="x<?= $Grid->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?= HtmlEncode($Grid->LabReport->getPlaceHolder()) ?>"<?= $Grid->LabReport->editAttributes() ?>><?= $Grid->LabReport->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->LabReport->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_LabReport" class="form-group view_lab_resultreleased_LabReport">
<span<?= $Grid->LabReport->viewAttributes() ?>>
<?= $Grid->LabReport->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_LabReport" data-hidden="1" name="x<?= $Grid->RowIndex ?>_LabReport" id="x<?= $Grid->RowIndex ?>_LabReport" value="<?= HtmlEncode($Grid->LabReport->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_LabReport" data-hidden="1" name="o<?= $Grid->RowIndex ?>_LabReport" id="o<?= $Grid->RowIndex ?>_LabReport" value="<?= HtmlEncode($Grid->LabReport->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1">
<span id="el$rowindex$_view_lab_resultreleased_Pic1" class="form-group view_lab_resultreleased_Pic1">
<div id="fd_x<?= $Grid->RowIndex ?>_Pic1">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->Pic1->title() ?>" data-table="view_lab_resultreleased" data-field="x_Pic1" name="x<?= $Grid->RowIndex ?>_Pic1" id="x<?= $Grid->RowIndex ?>_Pic1" lang="<?= CurrentLanguageID() ?>"<?= $Grid->Pic1->editAttributes() ?><?= ($Grid->Pic1->ReadOnly || $Grid->Pic1->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_Pic1"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Pic1->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_Pic1" id= "fn_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_Pic1" id= "fa_x<?= $Grid->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_Pic1" id= "fs_x<?= $Grid->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_Pic1" id= "fx_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_Pic1" id= "fm_x<?= $Grid->RowIndex ?>_Pic1" value="<?= $Grid->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Pic1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pic1" id="o<?= $Grid->RowIndex ?>_Pic1" value="<?= HtmlEncode($Grid->Pic1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2">
<span id="el$rowindex$_view_lab_resultreleased_Pic2" class="form-group view_lab_resultreleased_Pic2">
<div id="fd_x<?= $Grid->RowIndex ?>_Pic2">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Grid->Pic2->title() ?>" data-table="view_lab_resultreleased" data-field="x_Pic2" name="x<?= $Grid->RowIndex ?>_Pic2" id="x<?= $Grid->RowIndex ?>_Pic2" lang="<?= CurrentLanguageID() ?>"<?= $Grid->Pic2->editAttributes() ?><?= ($Grid->Pic2->ReadOnly || $Grid->Pic2->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Grid->RowIndex ?>_Pic2"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->Pic2->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Grid->RowIndex ?>_Pic2" id= "fn_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Grid->RowIndex ?>_Pic2" id= "fa_x<?= $Grid->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?= $Grid->RowIndex ?>_Pic2" id= "fs_x<?= $Grid->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?= $Grid->RowIndex ?>_Pic2" id= "fx_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Grid->RowIndex ?>_Pic2" id= "fm_x<?= $Grid->RowIndex ?>_Pic2" value="<?= $Grid->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Grid->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Pic2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pic2" id="o<?= $Grid->RowIndex ?>_Pic2" value="<?= HtmlEncode($Grid->Pic2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_TestUnit" class="form-group view_lab_resultreleased_TestUnit">
<?php
$onchange = $Grid->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_TestUnit" class="ew-auto-suggest">
    <input type="<?= $Grid->TestUnit->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_TestUnit" id="sv_x<?= $Grid->RowIndex ?>_TestUnit" value="<?= RemoveHtml($Grid->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->TestUnit->getPlaceHolder()) ?>"<?= $Grid->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-input="sv_x<?= $Grid->RowIndex ?>_TestUnit" data-value-separator="<?= $Grid->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_TestUnit" id="x<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->TestUnit->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_lab_resultreleasedgrid"], function() {
    fview_lab_resultreleasedgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_TestUnit","forceSelect":false}, ew.vars.tables.view_lab_resultreleased.fields.TestUnit.autoSuggestOptions));
});
</script>
<?= $Grid->TestUnit->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_TestUnit") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_TestUnit" class="form-group view_lab_resultreleased_TestUnit">
<span<?= $Grid->TestUnit->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestUnit->getDisplayValue($Grid->TestUnit->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestUnit" id="x<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestUnit" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestUnit" id="o<?= $Grid->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Grid->TestUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RefValue->Visible) { // RefValue ?>
        <td data-name="RefValue">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_RefValue" class="form-group view_lab_resultreleased_RefValue">
<textarea data-table="view_lab_resultreleased" data-field="x_RefValue" name="x<?= $Grid->RowIndex ?>_RefValue" id="x<?= $Grid->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?= HtmlEncode($Grid->RefValue->getPlaceHolder()) ?>"<?= $Grid->RefValue->editAttributes() ?>><?= $Grid->RefValue->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Grid->RefValue->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_RefValue" class="form-group view_lab_resultreleased_RefValue">
<span<?= $Grid->RefValue->viewAttributes() ?>>
<?= $Grid->RefValue->ViewValue ?></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_RefValue" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RefValue" id="x<?= $Grid->RowIndex ?>_RefValue" value="<?= HtmlEncode($Grid->RefValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_RefValue" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RefValue" id="o<?= $Grid->RowIndex ?>_RefValue" value="<?= HtmlEncode($Grid->RefValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Order->Visible) { // Order ?>
        <td data-name="Order">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_Order" class="form-group view_lab_resultreleased_Order">
<input type="<?= $Grid->Order->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Order" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Grid->Order->getPlaceHolder()) ?>" value="<?= $Grid->Order->EditValue ?>"<?= $Grid->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Order->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Order" class="form-group view_lab_resultreleased_Order">
<span<?= $Grid->Order->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Order->getDisplayValue($Grid->Order->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Order" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Order" id="x<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Order" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Order" id="o<?= $Grid->RowIndex ?>_Order" value="<?= HtmlEncode($Grid->Order->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_Repeated" class="form-group view_lab_resultreleased_Repeated">
<template id="tp_x<?= $Grid->RowIndex ?>_Repeated">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleased" data-field="x_Repeated" name="x<?= $Grid->RowIndex ?>_Repeated" id="x<?= $Grid->RowIndex ?>_Repeated"<?= $Grid->Repeated->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_Repeated" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_Repeated[]"
    name="x<?= $Grid->RowIndex ?>_Repeated[]"
    value="<?= HtmlEncode($Grid->Repeated->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_Repeated"
    data-target="dsl_x<?= $Grid->RowIndex ?>_Repeated"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->Repeated->isInvalidClass() ?>"
    data-table="view_lab_resultreleased"
    data-field="x_Repeated"
    data-value-separator="<?= $Grid->Repeated->displayValueSeparatorAttribute() ?>"
    <?= $Grid->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Repeated->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Repeated" class="form-group view_lab_resultreleased_Repeated">
<span<?= $Grid->Repeated->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Repeated->getDisplayValue($Grid->Repeated->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Repeated" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Repeated" id="x<?= $Grid->RowIndex ?>_Repeated" value="<?= HtmlEncode($Grid->Repeated->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Repeated" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Repeated[]" id="o<?= $Grid->RowIndex ?>_Repeated[]" value="<?= HtmlEncode($Grid->Repeated->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Vid->Visible) { // Vid ?>
        <td data-name="Vid">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Vid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<span<?= $Grid->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vid->getDisplayValue($Grid->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Vid" name="x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<input type="<?= $Grid->Vid->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Vid" name="x<?= $Grid->RowIndex ?>_Vid" id="x<?= $Grid->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Grid->Vid->getPlaceHolder()) ?>" value="<?= $Grid->Vid->EditValue ?>"<?= $Grid->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Vid" class="form-group view_lab_resultreleased_Vid">
<span<?= $Grid->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Vid->getDisplayValue($Grid->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Vid" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Vid" id="x<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Vid" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Vid" id="o<?= $Grid->RowIndex ?>_Vid" value="<?= HtmlEncode($Grid->Vid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_invoiceId" class="form-group view_lab_resultreleased_invoiceId">
<input type="<?= $Grid->invoiceId->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_invoiceId" name="x<?= $Grid->RowIndex ?>_invoiceId" id="x<?= $Grid->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Grid->invoiceId->getPlaceHolder()) ?>" value="<?= $Grid->invoiceId->EditValue ?>"<?= $Grid->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->invoiceId->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_invoiceId" class="form-group view_lab_resultreleased_invoiceId">
<span<?= $Grid->invoiceId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->invoiceId->getDisplayValue($Grid->invoiceId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_invoiceId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_invoiceId" id="x<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_invoiceId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_invoiceId" id="o<?= $Grid->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Grid->invoiceId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrID->Visible) { // DrID ?>
        <td data-name="DrID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_DrID" class="form-group view_lab_resultreleased_DrID">
<input type="<?= $Grid->DrID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrID" name="x<?= $Grid->RowIndex ?>_DrID" id="x<?= $Grid->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Grid->DrID->getPlaceHolder()) ?>" value="<?= $Grid->DrID->EditValue ?>"<?= $Grid->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_DrID" class="form-group view_lab_resultreleased_DrID">
<span<?= $Grid->DrID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrID->getDisplayValue($Grid->DrID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrID" id="x<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrID" id="o<?= $Grid->RowIndex ?>_DrID" value="<?= HtmlEncode($Grid->DrID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_DrCODE" class="form-group view_lab_resultreleased_DrCODE">
<input type="<?= $Grid->DrCODE->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrCODE" name="x<?= $Grid->RowIndex ?>_DrCODE" id="x<?= $Grid->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrCODE->getPlaceHolder()) ?>" value="<?= $Grid->DrCODE->EditValue ?>"<?= $Grid->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrCODE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_DrCODE" class="form-group view_lab_resultreleased_DrCODE">
<span<?= $Grid->DrCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrCODE->getDisplayValue($Grid->DrCODE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrCODE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrCODE" id="x<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrCODE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrCODE" id="o<?= $Grid->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Grid->DrCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->DrName->Visible) { // DrName ?>
        <td data-name="DrName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_DrName" class="form-group view_lab_resultreleased_DrName">
<input type="<?= $Grid->DrName->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_DrName" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->DrName->getPlaceHolder()) ?>" value="<?= $Grid->DrName->EditValue ?>"<?= $Grid->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->DrName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_DrName" class="form-group view_lab_resultreleased_DrName">
<span<?= $Grid->DrName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->DrName->getDisplayValue($Grid->DrName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_DrName" id="x<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_DrName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_DrName" id="o<?= $Grid->RowIndex ?>_DrName" value="<?= HtmlEncode($Grid->DrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Department->Visible) { // Department ?>
        <td data-name="Department">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_Department" class="form-group view_lab_resultreleased_Department">
<input type="<?= $Grid->Department->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_Department" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Department->getPlaceHolder()) ?>" value="<?= $Grid->Department->EditValue ?>"<?= $Grid->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Department->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_Department" class="form-group view_lab_resultreleased_Department">
<span<?= $Grid->Department->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Department->getDisplayValue($Grid->Department->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Department" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Department" id="x<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_Department" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Department" id="o<?= $Grid->RowIndex ?>_Department" value="<?= HtmlEncode($Grid->Department->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_createddatetime" class="form-group view_lab_resultreleased_createddatetime">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleasedgrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_lab_resultreleasedgrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_createddatetime" class="form-group view_lab_resultreleased_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_status" class="form-group view_lab_resultreleased_status">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_status" class="form-group view_lab_resultreleased_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->TestType->Visible) { // TestType ?>
        <td data-name="TestType">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_TestType" class="form-group view_lab_resultreleased_TestType">
<input type="<?= $Grid->TestType->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_TestType" name="x<?= $Grid->RowIndex ?>_TestType" id="x<?= $Grid->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->TestType->getPlaceHolder()) ?>" value="<?= $Grid->TestType->EditValue ?>"<?= $Grid->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->TestType->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_TestType" class="form-group view_lab_resultreleased_TestType">
<span<?= $Grid->TestType->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->TestType->getDisplayValue($Grid->TestType->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestType" data-hidden="1" name="x<?= $Grid->RowIndex ?>_TestType" id="x<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_TestType" data-hidden="1" name="o<?= $Grid->RowIndex ?>_TestType" id="o<?= $Grid->RowIndex ?>_TestType" value="<?= HtmlEncode($Grid->TestType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_ResultDate" class="form-group view_lab_resultreleased_ResultDate">
<span<?= $Grid->ResultDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResultDate->getDisplayValue($Grid->ResultDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResultDate" id="x<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultDate" id="o<?= $Grid->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Grid->ResultDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_ResultedBy" class="form-group view_lab_resultreleased_ResultedBy">
<span<?= $Grid->ResultedBy->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ResultedBy->getDisplayValue($Grid->ResultedBy->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultedBy" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ResultedBy" id="x<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ResultedBy" id="o<?= $Grid->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Grid->ResultedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_view_lab_resultreleased_HospID" class="form-group view_lab_resultreleased_HospID">
<input type="<?= $Grid->HospID->getInputTextType() ?>" data-table="view_lab_resultreleased" data-field="x_HospID" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Grid->HospID->getPlaceHolder()) ?>" value="<?= $Grid->HospID->EditValue ?>"<?= $Grid->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HospID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleased_HospID" class="form-group view_lab_resultreleased_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleased" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fview_lab_resultreleasedgrid","load"], function() {
    fview_lab_resultreleasedgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fview_lab_resultreleasedgrid">
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
    ew.addEventHandlers("view_lab_resultreleased");
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
        container: "gmp_view_lab_resultreleased",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

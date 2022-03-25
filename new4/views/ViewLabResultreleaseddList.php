<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabResultreleaseddList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_lab_resultreleaseddlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_lab_resultreleaseddlist = currentForm = new ew.Form("fview_lab_resultreleaseddlist", "list");
    fview_lab_resultreleaseddlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_lab_resultreleasedd")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_lab_resultreleasedd)
        ew.vars.tables.view_lab_resultreleasedd = currentTable;
    fview_lab_resultreleaseddlist.addFields([
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
        var f = fview_lab_resultreleaseddlist,
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
    fview_lab_resultreleaseddlist.validate = function () {
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

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }
        return true;
    }

    // Form_CustomValidate
    fview_lab_resultreleaseddlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_lab_resultreleaseddlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_lab_resultreleaseddlist.lists.Resulted = <?= $Page->Resulted->toClientList($Page) ?>;
    fview_lab_resultreleaseddlist.lists.TestUnit = <?= $Page->TestUnit->toClientList($Page) ?>;
    fview_lab_resultreleaseddlist.lists.Repeated = <?= $Page->Repeated->toClientList($Page) ?>;
    loadjs.done("fview_lab_resultreleaseddlist");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "view_lab_servicess") {
    if ($Page->MasterRecordExists) {
        include_once "views/ViewLabServicessMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_lab_resultreleasedd">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fview_lab_resultreleaseddlist" id="fview_lab_resultreleaseddlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_lab_resultreleasedd">
<?php if ($Page->getCurrentMasterTable() == "view_lab_servicess" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="view_lab_servicess">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Vid->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_view_lab_resultreleasedd" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_lab_resultreleaseddlist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_id" class="view_lab_resultreleasedd_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Page->PatID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_PatID" class="view_lab_resultreleasedd_PatID"><?= $Page->renderSort($Page->PatID) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_PatientName" class="view_lab_resultreleasedd_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Age" class="view_lab_resultreleasedd_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Gender" class="view_lab_resultreleasedd_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <th data-name="sid" class="<?= $Page->sid->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_sid" class="view_lab_resultreleasedd_sid"><?= $Page->renderSort($Page->sid) ?></div></th>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <th data-name="ItemCode" class="<?= $Page->ItemCode->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ItemCode" class="view_lab_resultreleasedd_ItemCode"><?= $Page->renderSort($Page->ItemCode) ?></div></th>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <th data-name="DEptCd" class="<?= $Page->DEptCd->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DEptCd" class="view_lab_resultreleasedd_DEptCd"><?= $Page->renderSort($Page->DEptCd) ?></div></th>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <th data-name="Resulted" class="<?= $Page->Resulted->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Resulted" class="view_lab_resultreleasedd_Resulted"><?= $Page->renderSort($Page->Resulted) ?></div></th>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <th data-name="Services" class="<?= $Page->Services->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Services" class="view_lab_resultreleasedd_Services"><?= $Page->renderSort($Page->Services) ?></div></th>
<?php } ?>
<?php if ($Page->LabReport->Visible) { // LabReport ?>
        <th data-name="LabReport" class="<?= $Page->LabReport->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_LabReport" class="view_lab_resultreleasedd_LabReport"><?= $Page->renderSort($Page->LabReport) ?></div></th>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <th data-name="Pic1" class="<?= $Page->Pic1->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Pic1" class="view_lab_resultreleasedd_Pic1"><?= $Page->renderSort($Page->Pic1) ?></div></th>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <th data-name="Pic2" class="<?= $Page->Pic2->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Pic2" class="view_lab_resultreleasedd_Pic2"><?= $Page->renderSort($Page->Pic2) ?></div></th>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <th data-name="TestUnit" class="<?= $Page->TestUnit->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_TestUnit" class="view_lab_resultreleasedd_TestUnit"><?= $Page->renderSort($Page->TestUnit) ?></div></th>
<?php } ?>
<?php if ($Page->RefValue->Visible) { // RefValue ?>
        <th data-name="RefValue" class="<?= $Page->RefValue->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_RefValue" class="view_lab_resultreleasedd_RefValue"><?= $Page->renderSort($Page->RefValue) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Order" class="view_lab_resultreleasedd_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <th data-name="Repeated" class="<?= $Page->Repeated->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Repeated" class="view_lab_resultreleasedd_Repeated"><?= $Page->renderSort($Page->Repeated) ?></div></th>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <th data-name="Vid" class="<?= $Page->Vid->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Vid" class="view_lab_resultreleasedd_Vid"><?= $Page->renderSort($Page->Vid) ?></div></th>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <th data-name="invoiceId" class="<?= $Page->invoiceId->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_invoiceId" class="view_lab_resultreleasedd_invoiceId"><?= $Page->renderSort($Page->invoiceId) ?></div></th>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <th data-name="DrID" class="<?= $Page->DrID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrID" class="view_lab_resultreleasedd_DrID"><?= $Page->renderSort($Page->DrID) ?></div></th>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <th data-name="DrCODE" class="<?= $Page->DrCODE->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrCODE" class="view_lab_resultreleasedd_DrCODE"><?= $Page->renderSort($Page->DrCODE) ?></div></th>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <th data-name="DrName" class="<?= $Page->DrName->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_DrName" class="view_lab_resultreleasedd_DrName"><?= $Page->renderSort($Page->DrName) ?></div></th>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <th data-name="Department" class="<?= $Page->Department->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_Department" class="view_lab_resultreleasedd_Department"><?= $Page->renderSort($Page->Department) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_createddatetime" class="view_lab_resultreleasedd_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_status" class="view_lab_resultreleasedd_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th data-name="TestType" class="<?= $Page->TestType->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_TestType" class="view_lab_resultreleasedd_TestType"><?= $Page->renderSort($Page->TestType) ?></div></th>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <th data-name="ResultDate" class="<?= $Page->ResultDate->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ResultDate" class="view_lab_resultreleasedd_ResultDate"><?= $Page->renderSort($Page->ResultDate) ?></div></th>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <th data-name="ResultedBy" class="<?= $Page->ResultedBy->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_ResultedBy" class="view_lab_resultreleasedd_ResultedBy"><?= $Page->renderSort($Page->ResultedBy) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_lab_resultreleasedd_HospID" class="view_lab_resultreleasedd_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}

// Restore number of post back records
if ($CurrentForm && ($Page->isConfirm() || $Page->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Page->FormKeyCountName) && ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm())) {
        $Page->KeyCount = $CurrentForm->getValue($Page->FormKeyCountName);
        $Page->StopRecord = $Page->StartRecord + $Page->KeyCount - 1;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
if ($Page->isGridEdit())
    $Page->RowIndex = 0;
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;
        if ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm()) {
            $Page->RowIndex++;
            $CurrentForm->Index = $Page->RowIndex;
            if ($CurrentForm->hasValue($Page->FormActionName) && ($Page->isConfirm() || $Page->EventCancelled)) {
                $Page->RowAction = strval($CurrentForm->getValue($Page->FormActionName));
            } elseif ($Page->isGridAdd()) {
                $Page->RowAction = "insert";
            } else {
                $Page->RowAction = "";
            }
        }

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view
        if ($Page->isGridEdit()) { // Grid edit
            if ($Page->EventCancelled) {
                $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
            }
            if ($Page->RowAction == "insert") {
                $Page->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_lab_resultreleasedd", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_id" class="form-group"></span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Page->PatID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_PatID" class="form-group">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?= $Page->RowIndex ?>_PatID" id="x<?= $Page->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatID" id="o<?= $Page->RowIndex ?>_PatID" value="<?= HtmlEncode($Page->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_PatID" class="form-group">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?= $Page->RowIndex ?>_PatID" id="x<?= $Page->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_PatID">
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Age" class="form-group">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" data-hidden="1" name="o<?= $Page->RowIndex ?>_Age" id="o<?= $Page->RowIndex ?>_Age" value="<?= HtmlEncode($Page->Age->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Age" class="form-group">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Gender" class="form-group">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" data-hidden="1" name="o<?= $Page->RowIndex ?>_Gender" id="o<?= $Page->RowIndex ?>_Gender" value="<?= HtmlEncode($Page->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Gender" class="form-group">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid" <?= $Page->sid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_sid" class="form-group">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" data-hidden="1" name="o<?= $Page->RowIndex ?>_sid" id="o<?= $Page->RowIndex ?>_sid" value="<?= HtmlEncode($Page->sid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_sid" class="form-group">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_sid">
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode" <?= $Page->ItemCode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_ItemCode" class="form-group">
<input type="<?= $Page->ItemCode->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?= $Page->RowIndex ?>_ItemCode" id="x<?= $Page->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ItemCode->getPlaceHolder()) ?>" value="<?= $Page->ItemCode->EditValue ?>"<?= $Page->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ItemCode" id="o<?= $Page->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Page->ItemCode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_ItemCode" class="form-group">
<input type="<?= $Page->ItemCode->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?= $Page->RowIndex ?>_ItemCode" id="x<?= $Page->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ItemCode->getPlaceHolder()) ?>" value="<?= $Page->ItemCode->EditValue ?>"<?= $Page->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_ItemCode">
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd" <?= $Page->DEptCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DEptCd" class="form-group">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?= $Page->RowIndex ?>_DEptCd" id="x<?= $Page->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_DEptCd" id="o<?= $Page->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Page->DEptCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DEptCd" class="form-group">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?= $Page->RowIndex ?>_DEptCd" id="x<?= $Page->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DEptCd">
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted" <?= $Page->Resulted->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Resulted" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Resulted">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="x<?= $Page->RowIndex ?>_Resulted" id="x<?= $Page->RowIndex ?>_Resulted"<?= $Page->Resulted->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Resulted" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Resulted[]"
    name="x<?= $Page->RowIndex ?>_Resulted[]"
    value="<?= HtmlEncode($Page->Resulted->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Resulted"
    data-target="dsl_x<?= $Page->RowIndex ?>_Resulted"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Resulted->isInvalidClass() ?>"
    data-table="view_lab_resultreleasedd"
    data-field="x_Resulted"
    data-value-separator="<?= $Page->Resulted->displayValueSeparatorAttribute() ?>"
    <?= $Page->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Resulted->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-hidden="1" name="o<?= $Page->RowIndex ?>_Resulted[]" id="o<?= $Page->RowIndex ?>_Resulted[]" value="<?= HtmlEncode($Page->Resulted->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Resulted" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Resulted">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="x<?= $Page->RowIndex ?>_Resulted" id="x<?= $Page->RowIndex ?>_Resulted"<?= $Page->Resulted->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Resulted" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Resulted[]"
    name="x<?= $Page->RowIndex ?>_Resulted[]"
    value="<?= HtmlEncode($Page->Resulted->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Resulted"
    data-target="dsl_x<?= $Page->RowIndex ?>_Resulted"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Resulted->isInvalidClass() ?>"
    data-table="view_lab_resultreleasedd"
    data-field="x_Resulted"
    data-value-separator="<?= $Page->Resulted->displayValueSeparatorAttribute() ?>"
    <?= $Page->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Resulted->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Resulted">
<span<?= $Page->Resulted->viewAttributes() ?>>
<?= $Page->Resulted->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Services->Visible) { // Services ?>
        <td data-name="Services" <?= $Page->Services->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Services" class="form-group">
<input type="<?= $Page->Services->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?= $Page->RowIndex ?>_Services" id="x<?= $Page->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" value="<?= $Page->Services->EditValue ?>"<?= $Page->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" data-hidden="1" name="o<?= $Page->RowIndex ?>_Services" id="o<?= $Page->RowIndex ?>_Services" value="<?= HtmlEncode($Page->Services->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Services" class="form-group">
<input type="<?= $Page->Services->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?= $Page->RowIndex ?>_Services" id="x<?= $Page->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" value="<?= $Page->Services->EditValue ?>"<?= $Page->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Services">
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LabReport->Visible) { // LabReport ?>
        <td data-name="LabReport" <?= $Page->LabReport->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_LabReport" class="form-group">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?= $Page->RowIndex ?>_LabReport" id="x<?= $Page->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?= HtmlEncode($Page->LabReport->getPlaceHolder()) ?>"<?= $Page->LabReport->editAttributes() ?>><?= $Page->LabReport->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->LabReport->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" data-hidden="1" name="o<?= $Page->RowIndex ?>_LabReport" id="o<?= $Page->RowIndex ?>_LabReport" value="<?= HtmlEncode($Page->LabReport->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_LabReport" class="form-group">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?= $Page->RowIndex ?>_LabReport" id="x<?= $Page->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?= HtmlEncode($Page->LabReport->getPlaceHolder()) ?>"<?= $Page->LabReport->editAttributes() ?>><?= $Page->LabReport->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->LabReport->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_LabReport">
<span<?= $Page->LabReport->viewAttributes() ?>>
<?= $Page->LabReport->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1" <?= $Page->Pic1->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Pic1" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>_Pic1">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->Pic1->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?= $Page->RowIndex ?>_Pic1" id="x<?= $Page->RowIndex ?>_Pic1" lang="<?= CurrentLanguageID() ?>"<?= $Page->Pic1->editAttributes() ?><?= ($Page->Pic1->ReadOnly || $Page->Pic1->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_Pic1"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_Pic1" id= "fn_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_Pic1" id= "fa_x<?= $Page->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_Pic1" id= "fs_x<?= $Page->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_Pic1" id= "fx_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_Pic1" id= "fm_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic1" id="o<?= $Page->RowIndex ?>_Pic1" value="<?= HtmlEncode($Page->Pic1->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Pic1" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>_Pic1">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->Pic1->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?= $Page->RowIndex ?>_Pic1" id="x<?= $Page->RowIndex ?>_Pic1" lang="<?= CurrentLanguageID() ?>"<?= $Page->Pic1->editAttributes() ?><?= ($Page->Pic1->ReadOnly || $Page->Pic1->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_Pic1"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_Pic1" id= "fn_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_Pic1" id= "fa_x<?= $Page->RowIndex ?>_Pic1" value="<?= (Post("fa_x<?= $Page->RowIndex ?>_Pic1") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_Pic1" id= "fs_x<?= $Page->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_Pic1" id= "fx_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_Pic1" id= "fm_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Pic1">
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= GetFileViewTag($Page->Pic1, $Page->Pic1->getViewValue(), false) ?>
</span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2" <?= $Page->Pic2->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Pic2" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>_Pic2">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->Pic2->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?= $Page->RowIndex ?>_Pic2" id="x<?= $Page->RowIndex ?>_Pic2" lang="<?= CurrentLanguageID() ?>"<?= $Page->Pic2->editAttributes() ?><?= ($Page->Pic2->ReadOnly || $Page->Pic2->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_Pic2"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_Pic2" id= "fn_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_Pic2" id= "fa_x<?= $Page->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_Pic2" id= "fs_x<?= $Page->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_Pic2" id= "fx_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_Pic2" id= "fm_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic2" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic2" id="o<?= $Page->RowIndex ?>_Pic2" value="<?= HtmlEncode($Page->Pic2->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Pic2" class="form-group">
<div id="fd_x<?= $Page->RowIndex ?>_Pic2">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->Pic2->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?= $Page->RowIndex ?>_Pic2" id="x<?= $Page->RowIndex ?>_Pic2" lang="<?= CurrentLanguageID() ?>"<?= $Page->Pic2->editAttributes() ?><?= ($Page->Pic2->ReadOnly || $Page->Pic2->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_Pic2"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_Pic2" id= "fn_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_Pic2" id= "fa_x<?= $Page->RowIndex ?>_Pic2" value="<?= (Post("fa_x<?= $Page->RowIndex ?>_Pic2") == "0") ? "0" : "1" ?>">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_Pic2" id= "fs_x<?= $Page->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_Pic2" id= "fx_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_Pic2" id= "fm_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Pic2">
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= GetFileViewTag($Page->Pic2, $Page->Pic2->getViewValue(), false) ?>
</span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit" <?= $Page->TestUnit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_TestUnit" class="form-group">
<?php
$onchange = $Page->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TestUnit" class="ew-auto-suggest">
    <input type="<?= $Page->TestUnit->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TestUnit" id="sv_x<?= $Page->RowIndex ?>_TestUnit" value="<?= RemoveHtml($Page->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>"<?= $Page->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-input="sv_x<?= $Page->RowIndex ?>_TestUnit" data-value-separator="<?= $Page->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TestUnit" id="x<?= $Page->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Page->TestUnit->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TestUnit->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist"], function() {
    fview_lab_resultreleaseddlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TestUnit","forceSelect":false}, ew.vars.tables.view_lab_resultreleasedd.fields.TestUnit.autoSuggestOptions));
});
</script>
<?= $Page->TestUnit->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestUnit" id="o<?= $Page->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Page->TestUnit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_TestUnit" class="form-group">
<?php
$onchange = $Page->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TestUnit" class="ew-auto-suggest">
    <input type="<?= $Page->TestUnit->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TestUnit" id="sv_x<?= $Page->RowIndex ?>_TestUnit" value="<?= RemoveHtml($Page->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>"<?= $Page->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-input="sv_x<?= $Page->RowIndex ?>_TestUnit" data-value-separator="<?= $Page->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TestUnit" id="x<?= $Page->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Page->TestUnit->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TestUnit->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist"], function() {
    fview_lab_resultreleaseddlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TestUnit","forceSelect":false}, ew.vars.tables.view_lab_resultreleasedd.fields.TestUnit.autoSuggestOptions));
});
</script>
<?= $Page->TestUnit->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TestUnit") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_TestUnit">
<span<?= $Page->TestUnit->viewAttributes() ?>>
<?= $Page->TestUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RefValue->Visible) { // RefValue ?>
        <td data-name="RefValue" <?= $Page->RefValue->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_RefValue" class="form-group">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?= $Page->RowIndex ?>_RefValue" id="x<?= $Page->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>"<?= $Page->RefValue->editAttributes() ?>><?= $Page->RefValue->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_RefValue" id="o<?= $Page->RowIndex ?>_RefValue" value="<?= HtmlEncode($Page->RefValue->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_RefValue" class="form-group">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?= $Page->RowIndex ?>_RefValue" id="x<?= $Page->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>"<?= $Page->RefValue->editAttributes() ?>><?= $Page->RefValue->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_RefValue">
<span<?= $Page->RefValue->viewAttributes() ?>>
<?= $Page->RefValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Order" class="form-group">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" data-hidden="1" name="o<?= $Page->RowIndex ?>_Order" id="o<?= $Page->RowIndex ?>_Order" value="<?= HtmlEncode($Page->Order->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Order" class="form-group">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated" <?= $Page->Repeated->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Repeated" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Repeated">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="x<?= $Page->RowIndex ?>_Repeated" id="x<?= $Page->RowIndex ?>_Repeated"<?= $Page->Repeated->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Repeated" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Repeated[]"
    name="x<?= $Page->RowIndex ?>_Repeated[]"
    value="<?= HtmlEncode($Page->Repeated->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Repeated"
    data-target="dsl_x<?= $Page->RowIndex ?>_Repeated"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Repeated->isInvalidClass() ?>"
    data-table="view_lab_resultreleasedd"
    data-field="x_Repeated"
    data-value-separator="<?= $Page->Repeated->displayValueSeparatorAttribute() ?>"
    <?= $Page->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeated->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-hidden="1" name="o<?= $Page->RowIndex ?>_Repeated[]" id="o<?= $Page->RowIndex ?>_Repeated[]" value="<?= HtmlEncode($Page->Repeated->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Repeated" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Repeated">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="x<?= $Page->RowIndex ?>_Repeated" id="x<?= $Page->RowIndex ?>_Repeated"<?= $Page->Repeated->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Repeated" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Repeated[]"
    name="x<?= $Page->RowIndex ?>_Repeated[]"
    value="<?= HtmlEncode($Page->Repeated->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Repeated"
    data-target="dsl_x<?= $Page->RowIndex ?>_Repeated"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Repeated->isInvalidClass() ?>"
    data-table="view_lab_resultreleasedd"
    data-field="x_Repeated"
    data-value-separator="<?= $Page->Repeated->displayValueSeparatorAttribute() ?>"
    <?= $Page->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeated->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Repeated">
<span<?= $Page->Repeated->viewAttributes() ?>>
<?= $Page->Repeated->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Vid->Visible) { // Vid ?>
        <td data-name="Vid" <?= $Page->Vid->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->Vid->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Vid" class="form-group">
<span<?= $Page->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Vid->getDisplayValue($Page->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Vid" name="x<?= $Page->RowIndex ?>_Vid" value="<?= HtmlEncode($Page->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Vid" class="form-group">
<input type="<?= $Page->Vid->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?= $Page->RowIndex ?>_Vid" id="x<?= $Page->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Page->Vid->getPlaceHolder()) ?>" value="<?= $Page->Vid->EditValue ?>"<?= $Page->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" data-hidden="1" name="o<?= $Page->RowIndex ?>_Vid" id="o<?= $Page->RowIndex ?>_Vid" value="<?= HtmlEncode($Page->Vid->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->Vid->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Vid" class="form-group">
<span<?= $Page->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Vid->getDisplayValue($Page->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Vid" name="x<?= $Page->RowIndex ?>_Vid" value="<?= HtmlEncode($Page->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Vid" class="form-group">
<input type="<?= $Page->Vid->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?= $Page->RowIndex ?>_Vid" id="x<?= $Page->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Page->Vid->getPlaceHolder()) ?>" value="<?= $Page->Vid->EditValue ?>"<?= $Page->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId" <?= $Page->invoiceId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_invoiceId" class="form-group">
<input type="<?= $Page->invoiceId->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?= $Page->RowIndex ?>_invoiceId" id="x<?= $Page->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Page->invoiceId->getPlaceHolder()) ?>" value="<?= $Page->invoiceId->EditValue ?>"<?= $Page->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" data-hidden="1" name="o<?= $Page->RowIndex ?>_invoiceId" id="o<?= $Page->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Page->invoiceId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_invoiceId" class="form-group">
<input type="<?= $Page->invoiceId->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?= $Page->RowIndex ?>_invoiceId" id="x<?= $Page->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Page->invoiceId->getPlaceHolder()) ?>" value="<?= $Page->invoiceId->EditValue ?>"<?= $Page->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_invoiceId">
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID" <?= $Page->DrID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrID" class="form-group">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?= $Page->RowIndex ?>_DrID" id="x<?= $Page->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrID" id="o<?= $Page->RowIndex ?>_DrID" value="<?= HtmlEncode($Page->DrID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrID" class="form-group">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?= $Page->RowIndex ?>_DrID" id="x<?= $Page->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrID">
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE" <?= $Page->DrCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrCODE" class="form-group">
<input type="<?= $Page->DrCODE->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?= $Page->RowIndex ?>_DrCODE" id="x<?= $Page->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrCODE->getPlaceHolder()) ?>" value="<?= $Page->DrCODE->EditValue ?>"<?= $Page->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrCODE" id="o<?= $Page->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Page->DrCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrCODE" class="form-group">
<input type="<?= $Page->DrCODE->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?= $Page->RowIndex ?>_DrCODE" id="x<?= $Page->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrCODE->getPlaceHolder()) ?>" value="<?= $Page->DrCODE->EditValue ?>"<?= $Page->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrCODE">
<span<?= $Page->DrCODE->viewAttributes() ?>>
<?= $Page->DrCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName" <?= $Page->DrName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrName" class="form-group">
<input type="<?= $Page->DrName->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?= $Page->RowIndex ?>_DrName" id="x<?= $Page->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrName->getPlaceHolder()) ?>" value="<?= $Page->DrName->EditValue ?>"<?= $Page->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrName" id="o<?= $Page->RowIndex ?>_DrName" value="<?= HtmlEncode($Page->DrName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrName" class="form-group">
<input type="<?= $Page->DrName->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?= $Page->RowIndex ?>_DrName" id="x<?= $Page->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrName->getPlaceHolder()) ?>" value="<?= $Page->DrName->EditValue ?>"<?= $Page->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_DrName">
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Department->Visible) { // Department ?>
        <td data-name="Department" <?= $Page->Department->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Department" class="form-group">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?= $Page->RowIndex ?>_Department" id="x<?= $Page->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" data-hidden="1" name="o<?= $Page->RowIndex ?>_Department" id="o<?= $Page->RowIndex ?>_Department" value="<?= HtmlEncode($Page->Department->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Department" class="form-group">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?= $Page->RowIndex ?>_Department" id="x<?= $Page->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_Department">
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_createddatetime" class="form-group">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?= $Page->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_createddatetime" class="form-group">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?= $Page->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_status" class="form-group">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?= $Page->RowIndex ?>_status" id="x<?= $Page->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_status" class="form-group">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?= $Page->RowIndex ?>_status" id="x<?= $Page->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_TestType" class="form-group">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestType" id="o<?= $Page->RowIndex ?>_TestType" value="<?= HtmlEncode($Page->TestType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_TestType" class="form-group">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate" <?= $Page->ResultDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultDate" id="o<?= $Page->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Page->ResultDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_ResultDate">
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy" <?= $Page->ResultedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultedBy" id="o<?= $Page->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Page->ResultedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_ResultedBy">
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_lab_resultreleasedd_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist","load"], function () {
    fview_lab_resultreleaseddlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Page->isGridAdd())
        if (!$Page->Recordset->EOF) {
            $Page->Recordset->moveNext();
        }
}
?>
<?php
    if ($Page->isGridAdd() || $Page->isGridEdit()) {
        $Page->RowIndex = '$rowindex$';
        $Page->loadRowValues();

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_lab_resultreleasedd", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowAttrs->appendClass("ew-template");
        $Page->RowType = ROWTYPE_ADD;

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
        $Page->StartRowCount = 0;
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowIndex);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_view_lab_resultreleasedd_id" class="form-group view_lab_resultreleasedd_id"></span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<span id="el$rowindex$_view_lab_resultreleasedd_PatID" class="form-group view_lab_resultreleasedd_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_PatID" name="x<?= $Page->RowIndex ?>_PatID" id="x<?= $Page->RowIndex ?>_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatID" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatID" id="o<?= $Page->RowIndex ?>_PatID" value="<?= HtmlEncode($Page->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<span id="el$rowindex$_view_lab_resultreleasedd_PatientName" class="form-group view_lab_resultreleasedd_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age">
<span id="el$rowindex$_view_lab_resultreleasedd_Age" class="form-group view_lab_resultreleasedd_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Age" data-hidden="1" name="o<?= $Page->RowIndex ?>_Age" id="o<?= $Page->RowIndex ?>_Age" value="<?= HtmlEncode($Page->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<span id="el$rowindex$_view_lab_resultreleasedd_Gender" class="form-group view_lab_resultreleasedd_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Gender" data-hidden="1" name="o<?= $Page->RowIndex ?>_Gender" id="o<?= $Page->RowIndex ?>_Gender" value="<?= HtmlEncode($Page->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->sid->Visible) { // sid ?>
        <td data-name="sid">
<span id="el$rowindex$_view_lab_resultreleasedd_sid" class="form-group view_lab_resultreleasedd_sid">
<input type="<?= $Page->sid->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_sid" name="x<?= $Page->RowIndex ?>_sid" id="x<?= $Page->RowIndex ?>_sid" size="30" placeholder="<?= HtmlEncode($Page->sid->getPlaceHolder()) ?>" value="<?= $Page->sid->EditValue ?>"<?= $Page->sid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->sid->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_sid" data-hidden="1" name="o<?= $Page->RowIndex ?>_sid" id="o<?= $Page->RowIndex ?>_sid" value="<?= HtmlEncode($Page->sid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <td data-name="ItemCode">
<span id="el$rowindex$_view_lab_resultreleasedd_ItemCode" class="form-group view_lab_resultreleasedd_ItemCode">
<input type="<?= $Page->ItemCode->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" name="x<?= $Page->RowIndex ?>_ItemCode" id="x<?= $Page->RowIndex ?>_ItemCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ItemCode->getPlaceHolder()) ?>" value="<?= $Page->ItemCode->EditValue ?>"<?= $Page->ItemCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ItemCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ItemCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ItemCode" id="o<?= $Page->RowIndex ?>_ItemCode" value="<?= HtmlEncode($Page->ItemCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <td data-name="DEptCd">
<span id="el$rowindex$_view_lab_resultreleasedd_DEptCd" class="form-group view_lab_resultreleasedd_DEptCd">
<input type="<?= $Page->DEptCd->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" name="x<?= $Page->RowIndex ?>_DEptCd" id="x<?= $Page->RowIndex ?>_DEptCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEptCd->getPlaceHolder()) ?>" value="<?= $Page->DEptCd->EditValue ?>"<?= $Page->DEptCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEptCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DEptCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_DEptCd" id="o<?= $Page->RowIndex ?>_DEptCd" value="<?= HtmlEncode($Page->DEptCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Resulted->Visible) { // Resulted ?>
        <td data-name="Resulted">
<span id="el$rowindex$_view_lab_resultreleasedd_Resulted" class="form-group view_lab_resultreleasedd_Resulted">
<template id="tp_x<?= $Page->RowIndex ?>_Resulted">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Resulted" name="x<?= $Page->RowIndex ?>_Resulted" id="x<?= $Page->RowIndex ?>_Resulted"<?= $Page->Resulted->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Resulted" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Resulted[]"
    name="x<?= $Page->RowIndex ?>_Resulted[]"
    value="<?= HtmlEncode($Page->Resulted->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Resulted"
    data-target="dsl_x<?= $Page->RowIndex ?>_Resulted"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Resulted->isInvalidClass() ?>"
    data-table="view_lab_resultreleasedd"
    data-field="x_Resulted"
    data-value-separator="<?= $Page->Resulted->displayValueSeparatorAttribute() ?>"
    <?= $Page->Resulted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Resulted->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Resulted" data-hidden="1" name="o<?= $Page->RowIndex ?>_Resulted[]" id="o<?= $Page->RowIndex ?>_Resulted[]" value="<?= HtmlEncode($Page->Resulted->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Services->Visible) { // Services ?>
        <td data-name="Services">
<span id="el$rowindex$_view_lab_resultreleasedd_Services" class="form-group view_lab_resultreleasedd_Services">
<input type="<?= $Page->Services->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Services" name="x<?= $Page->RowIndex ?>_Services" id="x<?= $Page->RowIndex ?>_Services" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Services->getPlaceHolder()) ?>" value="<?= $Page->Services->EditValue ?>"<?= $Page->Services->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Services->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Services" data-hidden="1" name="o<?= $Page->RowIndex ?>_Services" id="o<?= $Page->RowIndex ?>_Services" value="<?= HtmlEncode($Page->Services->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LabReport->Visible) { // LabReport ?>
        <td data-name="LabReport">
<span id="el$rowindex$_view_lab_resultreleasedd_LabReport" class="form-group view_lab_resultreleasedd_LabReport">
<textarea data-table="view_lab_resultreleasedd" data-field="x_LabReport" name="x<?= $Page->RowIndex ?>_LabReport" id="x<?= $Page->RowIndex ?>_LabReport" cols="20" rows="2" placeholder="<?= HtmlEncode($Page->LabReport->getPlaceHolder()) ?>"<?= $Page->LabReport->editAttributes() ?>><?= $Page->LabReport->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->LabReport->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_LabReport" data-hidden="1" name="o<?= $Page->RowIndex ?>_LabReport" id="o<?= $Page->RowIndex ?>_LabReport" value="<?= HtmlEncode($Page->LabReport->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <td data-name="Pic1">
<span id="el$rowindex$_view_lab_resultreleasedd_Pic1" class="form-group view_lab_resultreleasedd_Pic1">
<div id="fd_x<?= $Page->RowIndex ?>_Pic1">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->Pic1->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic1" name="x<?= $Page->RowIndex ?>_Pic1" id="x<?= $Page->RowIndex ?>_Pic1" lang="<?= CurrentLanguageID() ?>"<?= $Page->Pic1->editAttributes() ?><?= ($Page->Pic1->ReadOnly || $Page->Pic1->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_Pic1"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Pic1->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_Pic1" id= "fn_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_Pic1" id= "fa_x<?= $Page->RowIndex ?>_Pic1" value="0">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_Pic1" id= "fs_x<?= $Page->RowIndex ?>_Pic1" value="45">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_Pic1" id= "fx_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_Pic1" id= "fm_x<?= $Page->RowIndex ?>_Pic1" value="<?= $Page->Pic1->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_Pic1" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic1" id="o<?= $Page->RowIndex ?>_Pic1" value="<?= HtmlEncode($Page->Pic1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <td data-name="Pic2">
<span id="el$rowindex$_view_lab_resultreleasedd_Pic2" class="form-group view_lab_resultreleasedd_Pic2">
<div id="fd_x<?= $Page->RowIndex ?>_Pic2">
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" title="<?= $Page->Pic2->title() ?>" data-table="view_lab_resultreleasedd" data-field="x_Pic2" name="x<?= $Page->RowIndex ?>_Pic2" id="x<?= $Page->RowIndex ?>_Pic2" lang="<?= CurrentLanguageID() ?>"<?= $Page->Pic2->editAttributes() ?><?= ($Page->Pic2->ReadOnly || $Page->Pic2->Disabled) ? " disabled" : "" ?>>
        <label class="custom-file-label ew-file-label" for="x<?= $Page->RowIndex ?>_Pic2"><?= $Language->phrase("ChooseFile") ?></label>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Pic2->getErrorMessage() ?></div>
<input type="hidden" name="fn_x<?= $Page->RowIndex ?>_Pic2" id= "fn_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->Upload->FileName ?>">
<input type="hidden" name="fa_x<?= $Page->RowIndex ?>_Pic2" id= "fa_x<?= $Page->RowIndex ?>_Pic2" value="0">
<input type="hidden" name="fs_x<?= $Page->RowIndex ?>_Pic2" id= "fs_x<?= $Page->RowIndex ?>_Pic2" value="45">
<input type="hidden" name="fx_x<?= $Page->RowIndex ?>_Pic2" id= "fx_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->UploadAllowedFileExt ?>">
<input type="hidden" name="fm_x<?= $Page->RowIndex ?>_Pic2" id= "fm_x<?= $Page->RowIndex ?>_Pic2" value="<?= $Page->Pic2->UploadMaxFileSize ?>">
</div>
<table id="ft_x<?= $Page->RowIndex ?>_Pic2" class="table table-sm float-left ew-upload-table"><tbody class="files"></tbody></table>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Pic2" data-hidden="1" name="o<?= $Page->RowIndex ?>_Pic2" id="o<?= $Page->RowIndex ?>_Pic2" value="<?= HtmlEncode($Page->Pic2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <td data-name="TestUnit">
<span id="el$rowindex$_view_lab_resultreleasedd_TestUnit" class="form-group view_lab_resultreleasedd_TestUnit">
<?php
$onchange = $Page->TestUnit->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TestUnit->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TestUnit" class="ew-auto-suggest">
    <input type="<?= $Page->TestUnit->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TestUnit" id="sv_x<?= $Page->RowIndex ?>_TestUnit" value="<?= RemoveHtml($Page->TestUnit->EditValue) ?>" size="20" maxlength="45" placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TestUnit->getPlaceHolder()) ?>"<?= $Page->TestUnit->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-input="sv_x<?= $Page->RowIndex ?>_TestUnit" data-value-separator="<?= $Page->TestUnit->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TestUnit" id="x<?= $Page->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Page->TestUnit->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TestUnit->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist"], function() {
    fview_lab_resultreleaseddlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TestUnit","forceSelect":false}, ew.vars.tables.view_lab_resultreleasedd.fields.TestUnit.autoSuggestOptions));
});
</script>
<?= $Page->TestUnit->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TestUnit") ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestUnit" id="o<?= $Page->RowIndex ?>_TestUnit" value="<?= HtmlEncode($Page->TestUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RefValue->Visible) { // RefValue ?>
        <td data-name="RefValue">
<span id="el$rowindex$_view_lab_resultreleasedd_RefValue" class="form-group view_lab_resultreleasedd_RefValue">
<textarea data-table="view_lab_resultreleasedd" data-field="x_RefValue" name="x<?= $Page->RowIndex ?>_RefValue" id="x<?= $Page->RowIndex ?>_RefValue" cols="20" rows="2" placeholder="<?= HtmlEncode($Page->RefValue->getPlaceHolder()) ?>"<?= $Page->RefValue->editAttributes() ?>><?= $Page->RefValue->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->RefValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_RefValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_RefValue" id="o<?= $Page->RowIndex ?>_RefValue" value="<?= HtmlEncode($Page->RefValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order">
<span id="el$rowindex$_view_lab_resultreleasedd_Order" class="form-group view_lab_resultreleasedd_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Order" data-hidden="1" name="o<?= $Page->RowIndex ?>_Order" id="o<?= $Page->RowIndex ?>_Order" value="<?= HtmlEncode($Page->Order->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Repeated->Visible) { // Repeated ?>
        <td data-name="Repeated">
<span id="el$rowindex$_view_lab_resultreleasedd_Repeated" class="form-group view_lab_resultreleasedd_Repeated">
<template id="tp_x<?= $Page->RowIndex ?>_Repeated">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_lab_resultreleasedd" data-field="x_Repeated" name="x<?= $Page->RowIndex ?>_Repeated" id="x<?= $Page->RowIndex ?>_Repeated"<?= $Page->Repeated->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Repeated" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Repeated[]"
    name="x<?= $Page->RowIndex ?>_Repeated[]"
    value="<?= HtmlEncode($Page->Repeated->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Repeated"
    data-target="dsl_x<?= $Page->RowIndex ?>_Repeated"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Repeated->isInvalidClass() ?>"
    data-table="view_lab_resultreleasedd"
    data-field="x_Repeated"
    data-value-separator="<?= $Page->Repeated->displayValueSeparatorAttribute() ?>"
    <?= $Page->Repeated->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Repeated->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Repeated" data-hidden="1" name="o<?= $Page->RowIndex ?>_Repeated[]" id="o<?= $Page->RowIndex ?>_Repeated[]" value="<?= HtmlEncode($Page->Repeated->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Vid->Visible) { // Vid ?>
        <td data-name="Vid">
<?php if ($Page->Vid->getSessionValue() != "") { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<span<?= $Page->Vid->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Vid->getDisplayValue($Page->Vid->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Vid" name="x<?= $Page->RowIndex ?>_Vid" value="<?= HtmlEncode($Page->Vid->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_view_lab_resultreleasedd_Vid" class="form-group view_lab_resultreleasedd_Vid">
<input type="<?= $Page->Vid->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Vid" name="x<?= $Page->RowIndex ?>_Vid" id="x<?= $Page->RowIndex ?>_Vid" size="30" placeholder="<?= HtmlEncode($Page->Vid->getPlaceHolder()) ?>" value="<?= $Page->Vid->EditValue ?>"<?= $Page->Vid->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Vid->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Vid" data-hidden="1" name="o<?= $Page->RowIndex ?>_Vid" id="o<?= $Page->RowIndex ?>_Vid" value="<?= HtmlEncode($Page->Vid->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <td data-name="invoiceId">
<span id="el$rowindex$_view_lab_resultreleasedd_invoiceId" class="form-group view_lab_resultreleasedd_invoiceId">
<input type="<?= $Page->invoiceId->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" name="x<?= $Page->RowIndex ?>_invoiceId" id="x<?= $Page->RowIndex ?>_invoiceId" size="30" placeholder="<?= HtmlEncode($Page->invoiceId->getPlaceHolder()) ?>" value="<?= $Page->invoiceId->EditValue ?>"<?= $Page->invoiceId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->invoiceId->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_invoiceId" data-hidden="1" name="o<?= $Page->RowIndex ?>_invoiceId" id="o<?= $Page->RowIndex ?>_invoiceId" value="<?= HtmlEncode($Page->invoiceId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DrID->Visible) { // DrID ?>
        <td data-name="DrID">
<span id="el$rowindex$_view_lab_resultreleasedd_DrID" class="form-group view_lab_resultreleasedd_DrID">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrID" name="x<?= $Page->RowIndex ?>_DrID" id="x<?= $Page->RowIndex ?>_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrID" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrID" id="o<?= $Page->RowIndex ?>_DrID" value="<?= HtmlEncode($Page->DrID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <td data-name="DrCODE">
<span id="el$rowindex$_view_lab_resultreleasedd_DrCODE" class="form-group view_lab_resultreleasedd_DrCODE">
<input type="<?= $Page->DrCODE->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" name="x<?= $Page->RowIndex ?>_DrCODE" id="x<?= $Page->RowIndex ?>_DrCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrCODE->getPlaceHolder()) ?>" value="<?= $Page->DrCODE->EditValue ?>"<?= $Page->DrCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrCODE" id="o<?= $Page->RowIndex ?>_DrCODE" value="<?= HtmlEncode($Page->DrCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DrName->Visible) { // DrName ?>
        <td data-name="DrName">
<span id="el$rowindex$_view_lab_resultreleasedd_DrName" class="form-group view_lab_resultreleasedd_DrName">
<input type="<?= $Page->DrName->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_DrName" name="x<?= $Page->RowIndex ?>_DrName" id="x<?= $Page->RowIndex ?>_DrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DrName->getPlaceHolder()) ?>" value="<?= $Page->DrName->EditValue ?>"<?= $Page->DrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_DrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrName" id="o<?= $Page->RowIndex ?>_DrName" value="<?= HtmlEncode($Page->DrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Department->Visible) { // Department ?>
        <td data-name="Department">
<span id="el$rowindex$_view_lab_resultreleasedd_Department" class="form-group view_lab_resultreleasedd_Department">
<input type="<?= $Page->Department->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_Department" name="x<?= $Page->RowIndex ?>_Department" id="x<?= $Page->RowIndex ?>_Department" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Department->getPlaceHolder()) ?>" value="<?= $Page->Department->EditValue ?>"<?= $Page->Department->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Department->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_Department" data-hidden="1" name="o<?= $Page->RowIndex ?>_Department" id="o<?= $Page->RowIndex ?>_Department" value="<?= HtmlEncode($Page->Department->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<span id="el$rowindex$_view_lab_resultreleasedd_createddatetime" class="form-group view_lab_resultreleasedd_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" name="x<?= $Page->RowIndex ?>_createddatetime" id="x<?= $Page->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_lab_resultreleaseddlist", "x<?= $Page->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_createddatetime" data-hidden="1" name="o<?= $Page->RowIndex ?>_createddatetime" id="o<?= $Page->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Page->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status">
<span id="el$rowindex$_view_lab_resultreleasedd_status" class="form-group view_lab_resultreleasedd_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_status" name="x<?= $Page->RowIndex ?>_status" id="x<?= $Page->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_status" data-hidden="1" name="o<?= $Page->RowIndex ?>_status" id="o<?= $Page->RowIndex ?>_status" value="<?= HtmlEncode($Page->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType">
<span id="el$rowindex$_view_lab_resultreleasedd_TestType" class="form-group view_lab_resultreleasedd_TestType">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_TestType" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestType" id="o<?= $Page->RowIndex ?>_TestType" value="<?= HtmlEncode($Page->TestType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <td data-name="ResultDate">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultDate" id="o<?= $Page->RowIndex ?>_ResultDate" value="<?= HtmlEncode($Page->ResultDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <td data-name="ResultedBy">
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_ResultedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResultedBy" id="o<?= $Page->RowIndex ?>_ResultedBy" value="<?= HtmlEncode($Page->ResultedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<span id="el$rowindex$_view_lab_resultreleasedd_HospID" class="form-group view_lab_resultreleasedd_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_lab_resultreleasedd" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_lab_resultreleasedd" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_lab_resultreleaseddlist","load"], function() {
    fview_lab_resultreleaseddlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_lab_resultreleasedd");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_lab_resultreleasedd",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

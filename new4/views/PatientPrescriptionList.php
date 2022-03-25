<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientPrescriptionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_prescriptionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpatient_prescriptionlist = currentForm = new ew.Form("fpatient_prescriptionlist", "list");
    fpatient_prescriptionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_prescription")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_prescription)
        ew.vars.tables.patient_prescription = currentTable;
    fpatient_prescriptionlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Medicine", [fields.Medicine.visible && fields.Medicine.required ? ew.Validators.required(fields.Medicine.caption) : null], fields.Medicine.isInvalid],
        ["M", [fields.M.visible && fields.M.required ? ew.Validators.required(fields.M.caption) : null], fields.M.isInvalid],
        ["A", [fields.A.visible && fields.A.required ? ew.Validators.required(fields.A.caption) : null], fields.A.isInvalid],
        ["N", [fields.N.visible && fields.N.required ? ew.Validators.required(fields.N.caption) : null], fields.N.isInvalid],
        ["NoOfDays", [fields.NoOfDays.visible && fields.NoOfDays.required ? ew.Validators.required(fields.NoOfDays.caption) : null], fields.NoOfDays.isInvalid],
        ["PreRoute", [fields.PreRoute.visible && fields.PreRoute.required ? ew.Validators.required(fields.PreRoute.caption) : null], fields.PreRoute.isInvalid],
        ["TimeOfTaking", [fields.TimeOfTaking.visible && fields.TimeOfTaking.required ? ew.Validators.required(fields.TimeOfTaking.caption) : null], fields.TimeOfTaking.isInvalid],
        ["Type", [fields.Type.visible && fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["Status", [fields.Status.visible && fields.Status.required ? ew.Validators.required(fields.Status.caption) : null], fields.Status.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreateDateTime", [fields.CreateDateTime.visible && fields.CreateDateTime.required ? ew.Validators.required(fields.CreateDateTime.caption) : null], fields.CreateDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_prescriptionlist,
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
    fpatient_prescriptionlist.validate = function () {
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
        if (gridinsert && addcnt == 0) { // No row added
            ew.alert(ew.language.phrase("NoAddRecord"));
            return false;
        }
        return true;
    }

    // Check empty row
    fpatient_prescriptionlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Medicine", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "M", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "A", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "N", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoOfDays", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PreRoute", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TimeOfTaking", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Type", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "profilePic", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CreatedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CreateDateTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModifiedBy", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ModifiedDateTime", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_prescriptionlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_prescriptionlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_prescriptionlist.lists.Medicine = <?= $Page->Medicine->toClientList($Page) ?>;
    fpatient_prescriptionlist.lists.PreRoute = <?= $Page->PreRoute->toClientList($Page) ?>;
    fpatient_prescriptionlist.lists.TimeOfTaking = <?= $Page->TimeOfTaking->toClientList($Page) ?>;
    fpatient_prescriptionlist.lists.Type = <?= $Page->Type->toClientList($Page) ?>;
    fpatient_prescriptionlist.lists.Status = <?= $Page->Status->toClientList($Page) ?>;
    loadjs.done("fpatient_prescriptionlist");
});
var fpatient_prescriptionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpatient_prescriptionlistsrch = currentSearchForm = new ew.Form("fpatient_prescriptionlistsrch");

    // Dynamic selection lists

    // Filters
    fpatient_prescriptionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpatient_prescriptionlistsrch");
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
    ew.PREVIEW_OVERLAY = true;
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
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "ip_admission") {
    if ($Page->MasterRecordExists) {
        include_once "views/IpAdmissionMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpatient_prescriptionlistsrch" id="fpatient_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpatient_prescriptionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="patient_prescription">
    <div class="ew-extended-search">
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_prescription">
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
<form name="fpatient_prescriptionlist" id="fpatient_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_prescription">
<?php if ($Page->getCurrentMasterTable() == "ip_admission" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_patient_prescription" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isAdd() || $Page->isCopy() || $Page->isGridEdit()) { ?>
<table id="tbl_patient_prescriptionlist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "patient_prescriptionlist");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_patient_prescription_id" class="patient_prescription_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Page->Reception->headerCellClass() ?>"><div id="elh_patient_prescription_Reception" class="patient_prescription_Reception"><?= $Page->renderSort($Page->Reception) ?></div></th>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Page->PatientId->headerCellClass() ?>"><div id="elh_patient_prescription_PatientId" class="patient_prescription_PatientId"><?= $Page->renderSort($Page->PatientId) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_patient_prescription_PatientName" class="patient_prescription_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
        <th data-name="Medicine" class="<?= $Page->Medicine->headerCellClass() ?>" style="min-width: 20px;"><div id="elh_patient_prescription_Medicine" class="patient_prescription_Medicine"><?= $Page->renderSort($Page->Medicine) ?></div></th>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <th data-name="M" class="<?= $Page->M->headerCellClass() ?>"><div id="elh_patient_prescription_M" class="patient_prescription_M"><?= $Page->renderSort($Page->M) ?></div></th>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <th data-name="A" class="<?= $Page->A->headerCellClass() ?>"><div id="elh_patient_prescription_A" class="patient_prescription_A"><?= $Page->renderSort($Page->A) ?></div></th>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
        <th data-name="N" class="<?= $Page->N->headerCellClass() ?>"><div id="elh_patient_prescription_N" class="patient_prescription_N"><?= $Page->renderSort($Page->N) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <th data-name="NoOfDays" class="<?= $Page->NoOfDays->headerCellClass() ?>"><div id="elh_patient_prescription_NoOfDays" class="patient_prescription_NoOfDays"><?= $Page->renderSort($Page->NoOfDays) ?></div></th>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <th data-name="PreRoute" class="<?= $Page->PreRoute->headerCellClass() ?>"><div id="elh_patient_prescription_PreRoute" class="patient_prescription_PreRoute"><?= $Page->renderSort($Page->PreRoute) ?></div></th>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <th data-name="TimeOfTaking" class="<?= $Page->TimeOfTaking->headerCellClass() ?>"><div id="elh_patient_prescription_TimeOfTaking" class="patient_prescription_TimeOfTaking"><?= $Page->renderSort($Page->TimeOfTaking) ?></div></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th data-name="Type" class="<?= $Page->Type->headerCellClass() ?>" style="min-width: 12px;"><div id="elh_patient_prescription_Type" class="patient_prescription_Type"><?= $Page->renderSort($Page->Type) ?></div></th>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Page->mrnno->headerCellClass() ?>"><div id="elh_patient_prescription_mrnno" class="patient_prescription_mrnno"><?= $Page->renderSort($Page->mrnno) ?></div></th>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Page->Age->headerCellClass() ?>"><div id="elh_patient_prescription_Age" class="patient_prescription_Age"><?= $Page->renderSort($Page->Age) ?></div></th>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Page->Gender->headerCellClass() ?>"><div id="elh_patient_prescription_Gender" class="patient_prescription_Gender"><?= $Page->renderSort($Page->Gender) ?></div></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th data-name="profilePic" class="<?= $Page->profilePic->headerCellClass() ?>"><div id="elh_patient_prescription_profilePic" class="patient_prescription_profilePic"><?= $Page->renderSort($Page->profilePic) ?></div></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th data-name="Status" class="<?= $Page->Status->headerCellClass() ?>"><div id="elh_patient_prescription_Status" class="patient_prescription_Status"><?= $Page->renderSort($Page->Status) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Page->CreatedBy->headerCellClass() ?>"><div id="elh_patient_prescription_CreatedBy" class="patient_prescription_CreatedBy"><?= $Page->renderSort($Page->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <th data-name="CreateDateTime" class="<?= $Page->CreateDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_CreateDateTime" class="patient_prescription_CreateDateTime"><?= $Page->renderSort($Page->CreateDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedBy" class="patient_prescription_ModifiedBy"><?= $Page->renderSort($Page->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div id="elh_patient_prescription_ModifiedDateTime" class="patient_prescription_ModifiedDateTime"><?= $Page->renderSort($Page->ModifiedDateTime) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "patient_prescriptionlist");
?>
    </tr>
</thead>
<tbody>
<?php
    if ($Page->isAdd() || $Page->isCopy()) {
        $Page->RowIndex = 0;
        $Page->KeyCount = $Page->RowIndex;
        if ($Page->isCopy() && !$Page->loadRow())
            $Page->CurrentAction = "add";
        if ($Page->isAdd())
            $Page->loadRowValues();
        if ($Page->EventCancelled) // Insert failed
            $Page->restoreFormValues(); // Restore form values

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_patient_prescription", "data-rowtype" => ROWTYPE_ADD]);
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
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "patient_prescriptionlist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_id"><span id="el<?= $Page->RowCount ?>_patient_prescription_id" class="form-group patient_prescription_id"></span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Reception"><span id="el<?= $Page->RowCount ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Reception" name="x<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Reception"><span id="el<?= $Page->RowCount ?>_patient_prescription_Reception" class="form-group patient_prescription_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Reception" name="x<?= $Page->RowIndex ?>_Reception" id="x<?= $Page->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="o<?= $Page->RowIndex ?>_Reception" id="o<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<?php if ($Page->PatientId->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientId"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientId"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientId" class="form-group patient_prescription_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientName"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientName" class="form-group patient_prescription_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Medicine->Visible) { // Medicine ?>
        <td data-name="Medicine">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Medicine"><span id="el<?= $Page->RowCount ?>_patient_prescription_Medicine" class="form-group patient_prescription_Medicine">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Medicine" id="sv_x<?= $Page->RowIndex ?>_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_Medicine" data-input="sv_x<?= $Page->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Medicine" id="x<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Medicine","forceSelect":false}, ew.vars.tables.patient_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Medicine") ?>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-hidden="1" name="o<?= $Page->RowIndex ?>_Medicine" id="o<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->M->Visible) { // M ?>
        <td data-name="M">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_M"><span id="el<?= $Page->RowCount ?>_patient_prescription_M" class="form-group patient_prescription_M">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="patient_prescription" data-field="x_M" name="x<?= $Page->RowIndex ?>_M" id="x<?= $Page->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_M" data-hidden="1" name="o<?= $Page->RowIndex ?>_M" id="o<?= $Page->RowIndex ?>_M" value="<?= HtmlEncode($Page->M->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->A->Visible) { // A ?>
        <td data-name="A">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_A"><span id="el<?= $Page->RowCount ?>_patient_prescription_A" class="form-group patient_prescription_A">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="patient_prescription" data-field="x_A" name="x<?= $Page->RowIndex ?>_A" id="x<?= $Page->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_A" data-hidden="1" name="o<?= $Page->RowIndex ?>_A" id="o<?= $Page->RowIndex ?>_A" value="<?= HtmlEncode($Page->A->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->N->Visible) { // N ?>
        <td data-name="N">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_N"><span id="el<?= $Page->RowCount ?>_patient_prescription_N" class="form-group patient_prescription_N">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="patient_prescription" data-field="x_N" name="x<?= $Page->RowIndex ?>_N" id="x<?= $Page->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_N" data-hidden="1" name="o<?= $Page->RowIndex ?>_N" id="o<?= $Page->RowIndex ?>_N" value="<?= HtmlEncode($Page->N->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <td data-name="NoOfDays">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_NoOfDays"><span id="el<?= $Page->RowCount ?>_patient_prescription_NoOfDays" class="form-group patient_prescription_NoOfDays">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?= $Page->RowIndex ?>_NoOfDays" id="x<?= $Page->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoOfDays" id="o<?= $Page->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Page->NoOfDays->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <td data-name="PreRoute">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PreRoute"><span id="el<?= $Page->RowCount ?>_patient_prescription_PreRoute" class="form-group patient_prescription_PreRoute">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PreRoute" id="sv_x<?= $Page->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Page->PreRoute->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PreRoute->caption() ?>" data-title="<?= $Page->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Page->RowIndex ?>_PreRoute" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PreRoute" id="x<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"}, ew.vars.tables.patient_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PreRoute") ?>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-hidden="1" name="o<?= $Page->RowIndex ?>_PreRoute" id="o<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <td data-name="TimeOfTaking">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking"><span id="el<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group patient_prescription_TimeOfTaking">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Page->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TimeOfTaking->caption() ?>" data-title="<?= $Page->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TimeOfTaking" id="x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"}, ew.vars.tables.patient_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TimeOfTaking") ?>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="o<?= $Page->RowIndex ?>_TimeOfTaking" id="o<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Type"><span id="el<?= $Page->RowCount ?>_patient_prescription_Type" class="form-group patient_prescription_Type">
    <select
        id="x<?= $Page->RowIndex ?>_Type"
        name="x<?= $Page->RowIndex ?>_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Page->RowIndex ?>_Type"
        data-table="patient_prescription"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x{$Page->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Page->RowIndex ?>_Type']"),
        options = { name: "x<?= $Page->RowIndex ?>_Type", selectId: "patient_prescription_x<?= $Page->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_prescription.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" data-hidden="1" name="o<?= $Page->RowIndex ?>_Type" id="o<?= $Page->RowIndex ?>_Type" value="<?= HtmlEncode($Page->Type->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_mrnno"><span id="el<?= $Page->RowCount ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_mrnno"><span id="el<?= $Page->RowCount ?>_patient_prescription_mrnno" class="form-group patient_prescription_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_prescription" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="o<?= $Page->RowIndex ?>_mrnno" id="o<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Age"><span id="el<?= $Page->RowCount ?>_patient_prescription_Age" class="form-group patient_prescription_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" data-hidden="1" name="o<?= $Page->RowIndex ?>_Age" id="o<?= $Page->RowIndex ?>_Age" value="<?= HtmlEncode($Page->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Gender"><span id="el<?= $Page->RowCount ?>_patient_prescription_Gender" class="form-group patient_prescription_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" data-hidden="1" name="o<?= $Page->RowIndex ?>_Gender" id="o<?= $Page->RowIndex ?>_Gender" value="<?= HtmlEncode($Page->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_profilePic"><span id="el<?= $Page->RowCount ?>_patient_prescription_profilePic" class="form-group patient_prescription_profilePic">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?= $Page->RowIndex ?>_profilePic" id="x<?= $Page->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?>><?= $Page->profilePic->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" data-hidden="1" name="o<?= $Page->RowIndex ?>_profilePic" id="o<?= $Page->RowIndex ?>_profilePic" value="<?= HtmlEncode($Page->profilePic->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Status->Visible) { // Status ?>
        <td data-name="Status">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Status"><span id="el<?= $Page->RowCount ?>_patient_prescription_Status" class="form-group patient_prescription_Status">
    <select
        id="x<?= $Page->RowIndex ?>_Status"
        name="x<?= $Page->RowIndex ?>_Status"
        class="form-control ew-select<?= $Page->Status->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Page->RowIndex ?>_Status"
        data-table="patient_prescription"
        data-field="x_Status"
        data-value-separator="<?= $Page->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>"
        <?= $Page->Status->editAttributes() ?>>
        <?= $Page->Status->selectOptionListHtml("x{$Page->RowIndex}_Status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
<?= $Page->Status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Page->RowIndex ?>_Status']"),
        options = { name: "x<?= $Page->RowIndex ?>_Status", selectId: "patient_prescription_x<?= $Page->RowIndex ?>_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" data-hidden="1" name="o<?= $Page->RowIndex ?>_Status" id="o<?= $Page->RowIndex ?>_Status" value="<?= HtmlEncode($Page->Status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_CreatedBy"><span id="el<?= $Page->RowCount ?>_patient_prescription_CreatedBy" class="form-group patient_prescription_CreatedBy">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?= $Page->RowIndex ?>_CreatedBy" id="x<?= $Page->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedBy" id="o<?= $Page->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Page->CreatedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <td data-name="CreateDateTime">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_CreateDateTime"><span id="el<?= $Page->RowCount ?>_patient_prescription_CreateDateTime" class="form-group patient_prescription_CreateDateTime">
<input type="<?= $Page->CreateDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?= $Page->RowIndex ?>_CreateDateTime" id="x<?= $Page->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreateDateTime->EditValue ?>"<?= $Page->CreateDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreateDateTime->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreateDateTime" id="o<?= $Page->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Page->CreateDateTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_ModifiedBy"><span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedBy" class="form-group patient_prescription_ModifiedBy">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?= $Page->RowIndex ?>_ModifiedBy" id="x<?= $Page->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedBy" id="o<?= $Page->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Page->ModifiedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime">
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime"><span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group patient_prescription_ModifiedDateTime">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?= $Page->RowIndex ?>_ModifiedDateTime" id="x<?= $Page->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedDateTime" id="o<?= $Page->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Page->ModifiedDateTime->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "patient_prescriptionlist");
?>
<script>
loadjs.ready(["fpatient_prescriptionlist","load","customtemplate"], function() {
    fpatient_prescriptionlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
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
$Page->EditRowCount = 0;
if ($Page->isEdit())
    $Page->RowIndex = 1;
if ($Page->isGridAdd())
    $Page->RowIndex = 0;
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
        if ($Page->isGridAdd()) { // Grid add
            $Page->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Page->isGridAdd() && $Page->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->isEdit()) {
            if ($Page->checkInlineEditKey() && $Page->EditRowCount == 0) { // Inline edit
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
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
        if ($Page->isEdit() && $Page->RowType == ROWTYPE_EDIT && $Page->EventCancelled) { // Update failed
            $CurrentForm->Index = 1;
            $Page->restoreFormValues(); // Restore form values
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_patient_prescription", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Save row and cell attributes
        $Page->Attrs[$Page->RowCount] = ["row_attrs" => $Page->rowAttributes(), "cell_attrs" => []];
        $Page->Attrs[$Page->RowCount]["cell_attrs"] = $Page->fieldCellAttributes();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "patient_prescriptionlist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_id"><span id="el<?= $Page->RowCount ?>_patient_prescription_id" class="form-group"></span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_id"><span id="el<?= $Page->RowCount ?>_patient_prescription_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_id"><span id="el<?= $Page->RowCount ?>_patient_prescription_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_prescription" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Reception"><span id="el<?= $Page->RowCount ?>_patient_prescription_Reception" class="form-group">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_Reception" name="x<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Reception"><span id="el<?= $Page->RowCount ?>_patient_prescription_Reception" class="form-group">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Reception" name="x<?= $Page->RowIndex ?>_Reception" id="x<?= $Page->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="o<?= $Page->RowIndex ?>_Reception" id="o<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Reception"><span id="el<?= $Page->RowCount ?>_patient_prescription_Reception" class="form-group">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Reception" data-hidden="1" name="x<?= $Page->RowIndex ?>_Reception" id="x<?= $Page->RowIndex ?>_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Reception"><span id="el<?= $Page->RowCount ?>_patient_prescription_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->PatientId->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientId"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientId" class="form-group">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientId"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientId" class="form-group">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientId" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" size="30" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientId" id="o<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientId"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientId" class="form-group">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientId" data-hidden="1" name="x<?= $Page->RowIndex ?>_PatientId" id="x<?= $Page->RowIndex ?>_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientId"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientName"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientName"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientName" class="form-group">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_prescription" data-field="x_PatientName" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PatientName"><span id="el<?= $Page->RowCount ?>_patient_prescription_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Medicine->Visible) { // Medicine ?>
        <td data-name="Medicine" <?= $Page->Medicine->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Medicine"><span id="el<?= $Page->RowCount ?>_patient_prescription_Medicine" class="form-group">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Medicine" id="sv_x<?= $Page->RowIndex ?>_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_Medicine" data-input="sv_x<?= $Page->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Medicine" id="x<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Medicine","forceSelect":false}, ew.vars.tables.patient_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Medicine") ?>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Medicine" data-hidden="1" name="o<?= $Page->RowIndex ?>_Medicine" id="o<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Medicine"><span id="el<?= $Page->RowCount ?>_patient_prescription_Medicine" class="form-group">
<?php
$onchange = $Page->Medicine->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Medicine->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Medicine" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Medicine->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Medicine" id="sv_x<?= $Page->RowIndex ?>_Medicine" value="<?= RemoveHtml($Page->Medicine->EditValue) ?>" size="20" maxlength="30" placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Medicine->getPlaceHolder()) ?>"<?= $Page->Medicine->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Medicine->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_Medicine',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->Medicine->ReadOnly || $Page->Medicine->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_Medicine" data-input="sv_x<?= $Page->RowIndex ?>_Medicine" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Medicine->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Medicine" id="x<?= $Page->RowIndex ?>_Medicine" value="<?= HtmlEncode($Page->Medicine->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Medicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Medicine","forceSelect":false}, ew.vars.tables.patient_prescription.fields.Medicine.autoSuggestOptions));
});
</script>
<?= $Page->Medicine->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Medicine") ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Medicine"><span id="el<?= $Page->RowCount ?>_patient_prescription_Medicine">
<span<?= $Page->Medicine->viewAttributes() ?>>
<?= $Page->Medicine->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->M->Visible) { // M ?>
        <td data-name="M" <?= $Page->M->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_M"><span id="el<?= $Page->RowCount ?>_patient_prescription_M" class="form-group">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="patient_prescription" data-field="x_M" name="x<?= $Page->RowIndex ?>_M" id="x<?= $Page->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_M" data-hidden="1" name="o<?= $Page->RowIndex ?>_M" id="o<?= $Page->RowIndex ?>_M" value="<?= HtmlEncode($Page->M->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_M"><span id="el<?= $Page->RowCount ?>_patient_prescription_M" class="form-group">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="patient_prescription" data-field="x_M" name="x<?= $Page->RowIndex ?>_M" id="x<?= $Page->RowIndex ?>_M" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_M"><span id="el<?= $Page->RowCount ?>_patient_prescription_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->A->Visible) { // A ?>
        <td data-name="A" <?= $Page->A->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_A"><span id="el<?= $Page->RowCount ?>_patient_prescription_A" class="form-group">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="patient_prescription" data-field="x_A" name="x<?= $Page->RowIndex ?>_A" id="x<?= $Page->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_A" data-hidden="1" name="o<?= $Page->RowIndex ?>_A" id="o<?= $Page->RowIndex ?>_A" value="<?= HtmlEncode($Page->A->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_A"><span id="el<?= $Page->RowCount ?>_patient_prescription_A" class="form-group">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="patient_prescription" data-field="x_A" name="x<?= $Page->RowIndex ?>_A" id="x<?= $Page->RowIndex ?>_A" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_A"><span id="el<?= $Page->RowCount ?>_patient_prescription_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->N->Visible) { // N ?>
        <td data-name="N" <?= $Page->N->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_N"><span id="el<?= $Page->RowCount ?>_patient_prescription_N" class="form-group">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="patient_prescription" data-field="x_N" name="x<?= $Page->RowIndex ?>_N" id="x<?= $Page->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_N" data-hidden="1" name="o<?= $Page->RowIndex ?>_N" id="o<?= $Page->RowIndex ?>_N" value="<?= HtmlEncode($Page->N->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_N"><span id="el<?= $Page->RowCount ?>_patient_prescription_N" class="form-group">
<input type="<?= $Page->N->getInputTextType() ?>" data-table="patient_prescription" data-field="x_N" name="x<?= $Page->RowIndex ?>_N" id="x<?= $Page->RowIndex ?>_N" size="2" maxlength="30" placeholder="<?= HtmlEncode($Page->N->getPlaceHolder()) ?>" value="<?= $Page->N->EditValue ?>"<?= $Page->N->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->N->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_N"><span id="el<?= $Page->RowCount ?>_patient_prescription_N">
<span<?= $Page->N->viewAttributes() ?>>
<?= $Page->N->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <td data-name="NoOfDays" <?= $Page->NoOfDays->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_NoOfDays"><span id="el<?= $Page->RowCount ?>_patient_prescription_NoOfDays" class="form-group">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?= $Page->RowIndex ?>_NoOfDays" id="x<?= $Page->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_NoOfDays" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoOfDays" id="o<?= $Page->RowIndex ?>_NoOfDays" value="<?= HtmlEncode($Page->NoOfDays->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_NoOfDays"><span id="el<?= $Page->RowCount ?>_patient_prescription_NoOfDays" class="form-group">
<input type="<?= $Page->NoOfDays->getInputTextType() ?>" data-table="patient_prescription" data-field="x_NoOfDays" name="x<?= $Page->RowIndex ?>_NoOfDays" id="x<?= $Page->RowIndex ?>_NoOfDays" size="5" maxlength="45" placeholder="<?= HtmlEncode($Page->NoOfDays->getPlaceHolder()) ?>" value="<?= $Page->NoOfDays->EditValue ?>"<?= $Page->NoOfDays->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoOfDays->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_NoOfDays"><span id="el<?= $Page->RowCount ?>_patient_prescription_NoOfDays">
<span<?= $Page->NoOfDays->viewAttributes() ?>>
<?= $Page->NoOfDays->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <td data-name="PreRoute" <?= $Page->PreRoute->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PreRoute"><span id="el<?= $Page->RowCount ?>_patient_prescription_PreRoute" class="form-group">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PreRoute" id="sv_x<?= $Page->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Page->PreRoute->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PreRoute->caption() ?>" data-title="<?= $Page->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Page->RowIndex ?>_PreRoute" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PreRoute" id="x<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"}, ew.vars.tables.patient_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PreRoute") ?>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_PreRoute" data-hidden="1" name="o<?= $Page->RowIndex ?>_PreRoute" id="o<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PreRoute"><span id="el<?= $Page->RowCount ?>_patient_prescription_PreRoute" class="form-group">
<?php
$onchange = $Page->PreRoute->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PreRoute->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PreRoute" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->PreRoute->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PreRoute" id="sv_x<?= $Page->RowIndex ?>_PreRoute" value="<?= RemoveHtml($Page->PreRoute->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PreRoute->getPlaceHolder()) ?>"<?= $Page->PreRoute->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_route") && !$Page->PreRoute->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_PreRoute" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->PreRoute->caption() ?>" data-title="<?= $Page->PreRoute->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_PreRoute',url:'<?= GetUrl("PresMasRouteAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_PreRoute" data-input="sv_x<?= $Page->RowIndex ?>_PreRoute" data-value-separator="<?= $Page->PreRoute->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PreRoute" id="x<?= $Page->RowIndex ?>_PreRoute" value="<?= HtmlEncode($Page->PreRoute->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PreRoute->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PreRoute","forceSelect":false,"minWidth":"50px","maxHeight":"80px"}, ew.vars.tables.patient_prescription.fields.PreRoute.autoSuggestOptions));
});
</script>
<?= $Page->PreRoute->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PreRoute") ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_PreRoute"><span id="el<?= $Page->RowCount ?>_patient_prescription_PreRoute">
<span<?= $Page->PreRoute->viewAttributes() ?>>
<?= $Page->PreRoute->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <td data-name="TimeOfTaking" <?= $Page->TimeOfTaking->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking"><span id="el<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Page->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TimeOfTaking->caption() ?>" data-title="<?= $Page->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TimeOfTaking" id="x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"}, ew.vars.tables.patient_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TimeOfTaking") ?>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_TimeOfTaking" data-hidden="1" name="o<?= $Page->RowIndex ?>_TimeOfTaking" id="o<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking"><span id="el<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking" class="form-group">
<?php
$onchange = $Page->TimeOfTaking->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->TimeOfTaking->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_TimeOfTaking" class="ew-auto-suggest">
    <div class="input-group">
        <input type="<?= $Page->TimeOfTaking->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" id="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= RemoveHtml($Page->TimeOfTaking->EditValue) ?>" size="5" placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->TimeOfTaking->getPlaceHolder()) ?>"<?= $Page->TimeOfTaking->editAttributes() ?>>
        <?php if (AllowAdd(CurrentProjectID() . "pres_mas_timeoftaking") && !$Page->TimeOfTaking->ReadOnly) { ?>
        <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_TimeOfTaking" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TimeOfTaking->caption() ?>" data-title="<?= $Page->TimeOfTaking->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_TimeOfTaking',url:'<?= GetUrl("PresMasTimeoftakingAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
        <?php } ?>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_prescription" data-field="x_TimeOfTaking" data-input="sv_x<?= $Page->RowIndex ?>_TimeOfTaking" data-value-separator="<?= $Page->TimeOfTaking->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_TimeOfTaking" id="x<?= $Page->RowIndex ?>_TimeOfTaking" value="<?= HtmlEncode($Page->TimeOfTaking->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->TimeOfTaking->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_prescriptionlist"], function() {
    fpatient_prescriptionlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_TimeOfTaking","forceSelect":false,"minWidth":"100px","maxHeight":"150px"}, ew.vars.tables.patient_prescription.fields.TimeOfTaking.autoSuggestOptions));
});
</script>
<?= $Page->TimeOfTaking->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_TimeOfTaking") ?>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking"><span id="el<?= $Page->RowCount ?>_patient_prescription_TimeOfTaking">
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Type"><span id="el<?= $Page->RowCount ?>_patient_prescription_Type" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Type"
        name="x<?= $Page->RowIndex ?>_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Page->RowIndex ?>_Type"
        data-table="patient_prescription"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x{$Page->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Page->RowIndex ?>_Type']"),
        options = { name: "x<?= $Page->RowIndex ?>_Type", selectId: "patient_prescription_x<?= $Page->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_prescription.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Type" data-hidden="1" name="o<?= $Page->RowIndex ?>_Type" id="o<?= $Page->RowIndex ?>_Type" value="<?= HtmlEncode($Page->Type->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Type"><span id="el<?= $Page->RowCount ?>_patient_prescription_Type" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Type"
        name="x<?= $Page->RowIndex ?>_Type"
        class="form-control ew-select<?= $Page->Type->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Page->RowIndex ?>_Type"
        data-table="patient_prescription"
        data-field="x_Type"
        data-value-separator="<?= $Page->Type->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>"
        <?= $Page->Type->editAttributes() ?>>
        <?= $Page->Type->selectOptionListHtml("x{$Page->RowIndex}_Type") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Page->RowIndex ?>_Type']"),
        options = { name: "x<?= $Page->RowIndex ?>_Type", selectId: "patient_prescription_x<?= $Page->RowIndex ?>_Type", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.patient_prescription.fields.Type.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Type.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Type"><span id="el<?= $Page->RowCount ?>_patient_prescription_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_mrnno"><span id="el<?= $Page->RowCount ?>_patient_prescription_mrnno" class="form-group">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x<?= $Page->RowIndex ?>_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_mrnno"><span id="el<?= $Page->RowCount ?>_patient_prescription_mrnno" class="form-group">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_prescription" data-field="x_mrnno" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="o<?= $Page->RowIndex ?>_mrnno" id="o<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_mrnno"><span id="el<?= $Page->RowCount ?>_patient_prescription_mrnno" class="form-group">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_mrnno" data-hidden="1" name="x<?= $Page->RowIndex ?>_mrnno" id="x<?= $Page->RowIndex ?>_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_mrnno"><span id="el<?= $Page->RowCount ?>_patient_prescription_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Page->Age->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Age"><span id="el<?= $Page->RowCount ?>_patient_prescription_Age" class="form-group">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Age" data-hidden="1" name="o<?= $Page->RowIndex ?>_Age" id="o<?= $Page->RowIndex ?>_Age" value="<?= HtmlEncode($Page->Age->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Age"><span id="el<?= $Page->RowCount ?>_patient_prescription_Age" class="form-group">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Age" name="x<?= $Page->RowIndex ?>_Age" id="x<?= $Page->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Age"><span id="el<?= $Page->RowCount ?>_patient_prescription_Age">
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Page->Gender->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Gender"><span id="el<?= $Page->RowCount ?>_patient_prescription_Gender" class="form-group">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Gender" data-hidden="1" name="o<?= $Page->RowIndex ?>_Gender" id="o<?= $Page->RowIndex ?>_Gender" value="<?= HtmlEncode($Page->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Gender"><span id="el<?= $Page->RowCount ?>_patient_prescription_Gender" class="form-group">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_prescription" data-field="x_Gender" name="x<?= $Page->RowIndex ?>_Gender" id="x<?= $Page->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Gender"><span id="el<?= $Page->RowCount ?>_patient_prescription_Gender">
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_profilePic"><span id="el<?= $Page->RowCount ?>_patient_prescription_profilePic" class="form-group">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?= $Page->RowIndex ?>_profilePic" id="x<?= $Page->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?>><?= $Page->profilePic->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_profilePic" data-hidden="1" name="o<?= $Page->RowIndex ?>_profilePic" id="o<?= $Page->RowIndex ?>_profilePic" value="<?= HtmlEncode($Page->profilePic->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_profilePic"><span id="el<?= $Page->RowCount ?>_patient_prescription_profilePic" class="form-group">
<textarea data-table="patient_prescription" data-field="x_profilePic" name="x<?= $Page->RowIndex ?>_profilePic" id="x<?= $Page->RowIndex ?>_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?>><?= $Page->profilePic->EditValue ?></textarea>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_profilePic"><span id="el<?= $Page->RowCount ?>_patient_prescription_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Status->Visible) { // Status ?>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Status"><span id="el<?= $Page->RowCount ?>_patient_prescription_Status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Status"
        name="x<?= $Page->RowIndex ?>_Status"
        class="form-control ew-select<?= $Page->Status->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Page->RowIndex ?>_Status"
        data-table="patient_prescription"
        data-field="x_Status"
        data-value-separator="<?= $Page->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>"
        <?= $Page->Status->editAttributes() ?>>
        <?= $Page->Status->selectOptionListHtml("x{$Page->RowIndex}_Status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
<?= $Page->Status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Page->RowIndex ?>_Status']"),
        options = { name: "x<?= $Page->RowIndex ?>_Status", selectId: "patient_prescription_x<?= $Page->RowIndex ?>_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_Status" data-hidden="1" name="o<?= $Page->RowIndex ?>_Status" id="o<?= $Page->RowIndex ?>_Status" value="<?= HtmlEncode($Page->Status->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Status"><span id="el<?= $Page->RowCount ?>_patient_prescription_Status" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Status"
        name="x<?= $Page->RowIndex ?>_Status"
        class="form-control ew-select<?= $Page->Status->isInvalidClass() ?>"
        data-select2-id="patient_prescription_x<?= $Page->RowIndex ?>_Status"
        data-table="patient_prescription"
        data-field="x_Status"
        data-value-separator="<?= $Page->Status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Status->getPlaceHolder()) ?>"
        <?= $Page->Status->editAttributes() ?>>
        <?= $Page->Status->selectOptionListHtml("x{$Page->RowIndex}_Status") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Status->getErrorMessage() ?></div>
<?= $Page->Status->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_prescription_x<?= $Page->RowIndex ?>_Status']"),
        options = { name: "x<?= $Page->RowIndex ?>_Status", selectId: "patient_prescription_x<?= $Page->RowIndex ?>_Status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_prescription.fields.Status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_Status"><span id="el<?= $Page->RowCount ?>_patient_prescription_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_CreatedBy"><span id="el<?= $Page->RowCount ?>_patient_prescription_CreatedBy" class="form-group">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?= $Page->RowIndex ?>_CreatedBy" id="x<?= $Page->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_CreatedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedBy" id="o<?= $Page->RowIndex ?>_CreatedBy" value="<?= HtmlEncode($Page->CreatedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_CreatedBy"><span id="el<?= $Page->RowCount ?>_patient_prescription_CreatedBy" class="form-group">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreatedBy" name="x<?= $Page->RowIndex ?>_CreatedBy" id="x<?= $Page->RowIndex ?>_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_CreatedBy"><span id="el<?= $Page->RowCount ?>_patient_prescription_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <td data-name="CreateDateTime" <?= $Page->CreateDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_CreateDateTime"><span id="el<?= $Page->RowCount ?>_patient_prescription_CreateDateTime" class="form-group">
<input type="<?= $Page->CreateDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?= $Page->RowIndex ?>_CreateDateTime" id="x<?= $Page->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreateDateTime->EditValue ?>"<?= $Page->CreateDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreateDateTime->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_CreateDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreateDateTime" id="o<?= $Page->RowIndex ?>_CreateDateTime" value="<?= HtmlEncode($Page->CreateDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_CreateDateTime"><span id="el<?= $Page->RowCount ?>_patient_prescription_CreateDateTime" class="form-group">
<input type="<?= $Page->CreateDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_CreateDateTime" name="x<?= $Page->RowIndex ?>_CreateDateTime" id="x<?= $Page->RowIndex ?>_CreateDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreateDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreateDateTime->EditValue ?>"<?= $Page->CreateDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreateDateTime->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_CreateDateTime"><span id="el<?= $Page->RowCount ?>_patient_prescription_CreateDateTime">
<span<?= $Page->CreateDateTime->viewAttributes() ?>>
<?= $Page->CreateDateTime->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_ModifiedBy"><span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedBy" class="form-group">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?= $Page->RowIndex ?>_ModifiedBy" id="x<?= $Page->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedBy" id="o<?= $Page->RowIndex ?>_ModifiedBy" value="<?= HtmlEncode($Page->ModifiedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_ModifiedBy"><span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedBy" class="form-group">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedBy" name="x<?= $Page->RowIndex ?>_ModifiedBy" id="x<?= $Page->RowIndex ?>_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_ModifiedBy"><span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime"><span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?= $Page->RowIndex ?>_ModifiedDateTime" id="x<?= $Page->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
</span></template>
<input type="hidden" data-table="patient_prescription" data-field="x_ModifiedDateTime" data-hidden="1" name="o<?= $Page->RowIndex ?>_ModifiedDateTime" id="o<?= $Page->RowIndex ?>_ModifiedDateTime" value="<?= HtmlEncode($Page->ModifiedDateTime->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime"><span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime" class="form-group">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="patient_prescription" data-field="x_ModifiedDateTime" name="x<?= $Page->RowIndex ?>_ModifiedDateTime" id="x<?= $Page->RowIndex ?>_ModifiedDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
</span></template>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<template id="tpx<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime"><span id="el<?= $Page->RowCount ?>_patient_prescription_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</span></template>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "patient_prescriptionlist");
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_prescriptionlist","load","customtemplate"], function () {
    fpatient_prescriptionlist.updateLists(<?= $Page->RowIndex ?>);
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
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_patient_prescriptionlist" class="ew-custom-template"></div>
<template id="tpm_patient_prescriptionlist">
<div id="ct_PatientPrescriptionList"><?php if ($Page->RowCount > 0) { ?>
<div style="overflow-x:auto;">
<table class="ew-table">
	<thead>
	<col>
		<col>
		<colgroup span="3" style="background-color:#adff2f;"></colgroup>
		<col>
		<col>
		<col>
		<col>
		<col>
		<tr>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th class="text-center" colspan="3" scope="colgroup">Dose</th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
			<th rowspan="1"></th>
		</tr>
		<tr class="ew-table-header">
		<td class="text-center" >*</td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_Medicine"></slot></td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_M"></slot></td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_A"></slot></td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_N"></slot></td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_NoOfDays"></slot></td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_PreRoute"></slot></td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_TimeOfTaking"></slot></td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_Type"></slot></td>
			<td class="text-center" ><slot class="ew-slot" name="tpc_patient_prescription_Status"></slot></td>
		</tr>    
	</thead> 
<tbody>
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
<tr<?= @$Page->Attrs[$i]['row_attrs'] ?>>
<td class="ew-list-option-body text-nowrap" data-name="button"><div style="width: 25px;"><div class="btn-group btn-group-sm ew-btn-group"><a class="btn btn-default ew-grid-link ew-grid-delete" title="" data-caption="Delete" onclick="return ew.deleteGridRow(this, <?php echo $i ?>);" data-original-title="Delete"><i data-phrase="DeleteLink" class="fa fa-trash ew-icon" data-caption="Delete"></i></a></div></div></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_Medicine"></slot></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_M"></slot></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_A"></slot></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_N"></slot></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_NoOfDays"></slot></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_PreRoute"></slot></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_TimeOfTaking"></slot></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_Type"></slot></td>
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_patient_prescription_Status"></slot></td>
</tr>
<?php } ?>
<?php if ($Page->TotalRecords > 0 && !$patient_prescription->isGridAdd() && !$patient_prescription->isGridEdit()) { ?>
 </tbody>
</table>
</div>
<?php } ?>
<?php } ?>
</div>
</template>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isAdd() || $Page->isCopy()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
<?php if ($Page->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
<?php if ($Page->isEdit()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
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
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_prescriptionlist", "tpm_patient_prescriptionlist", "patient_prescriptionlist", "<?= $Page->CustomExport ?>", ew.templateData);
    loadjs.done("customtemplate");
});
</script>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("patient_prescription");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
     var c = document.getElementById("el_ip_admission_profilePic").children;
     var d = c[0].children;
     var evalue = c[0].innerText;
     //document.getElementById("profilePicturePatient").src = 'uploads/' + evalue;
    	var myParent =  document.getElementById("tpd_ip_admissionmaster");
    	var t = document.createTextNode("Select Drug Template : ");
    	myParent.appendChild(t);

    //Create array of options to be added
    var array = ["Volvo","Saab","Mercades","Audi"];

    //Create and append select list
    var selectList = document.createElement("select");
    selectList.id = "mySelect";
    myParent.appendChild(selectList);

    //Create and append the options
    //for (var i = 0; i < array.length; i++) {
    //    var option = document.createElement("option");
    //    option.value = array[i];
    //    option.text = array[i];
    //    selectList.appendChild(option);
    //}
    	var btn = document.createElement("BUTTON");   // Create a <button> element
    	btn.innerHTML = "Select";                   // Insert text
    	btn.addEventListener("click", myScriptSelect);
    myParent.appendChild(btn);               // Append <button> to <body>
    		var user = [{
    			'CustomerName': '<?php  echo CurrentUserName();  ?>'                    
    		}];

    	//v
    		var jsonString = JSON.stringify(user);
    			$.ajax({
    				type: "POST",
    				url: "ajaxinsert.php?control=selectTemplatePRE",
    				data: { data: jsonString },
    				cache: false,
    				success: function (data) {
    					let jsonObject = JSON.parse(data);
    					var json = jsonObject["records"];
    					for(var i = 0; i < json.length; i++) {
    						var obj = json[i];
    						console.log(obj.id);
    						 var option = document.createElement("option");
    	option.value = obj.TemplateName;
    	option.text = obj.TemplateName;
    	selectList.appendChild(option);
    					  }

    					//alert(data + "Saved Sucessfully...........");
    					//swal({ text: "Saved Sucessfully......", icon: "success", });
    				   // Receiptreset();
    				  //  document.getElementById("VoucherAmt0").focus();
    				}
    			});
    	for (var i = 0; i < 20; i++) {
    		var kkk = $('*[data-caption="Add Blank Row"]')
    		ew.addGridRow(kkk);
    	}

    	function myScriptSelect() {
    	   // alert("hai");
    //n
    		var hhhh = document.getElementById("mySelect");
    				var user = [{
    					'CustomerName': '<?php  echo CurrentUserName();  ?>',
    					'TemplateName': hhhh.value
    		}];

    	//v
    		var jsonString = JSON.stringify(user);
    			$.ajax({
    				type: "POST",
    				url: "ajaxinsert.php?control=selectTemplatePREItem",
    				data: { data: jsonString },
    				cache: false,
    				success: function (data) {
    					let jsonObject = JSON.parse(data);
    					var json = jsonObject["records"];
    					for(var i = 0; i < json.length; i++) {
    						var obj = json[i];
    						console.log(obj.id);
    						 var option = document.createElement("option");
    	option.value = obj.TemplateName;
    	option.text = obj.TemplateName;
    						selectList.appendChild(option);
    						var Medicine = document.getElementById("sv_x"+(i+1)+"_Medicine");
    						Medicine.value = obj.Medicine;
    						Medicine.innerHTML  = obj.Medicine;
    						Medicine.selectedIndex = obj.Medicine;
    						Medicine.value = obj.Medicine;
    						Medicine.text = obj.Medicine;
    						var Medicine = document.getElementById("x"+(i+1)+"_Medicine");
    						Medicine.value = obj.Medicine;
    						var M = document.getElementById("x"+(i+1)+"_M");
    						M.value = obj.M;
    						var A = document.getElementById("x"+(i+1)+"_A");
    						A.value = obj.A;
    						var N = document.getElementById("x"+(i+1)+"_N");
    						N.value = obj.N;
    						var NoOfDays = document.getElementById("x"+(i+1)+"_NoOfDays");
    						NoOfDays.value = obj.NoOfDays;
    						var PreRoute = document.getElementById("sv_x"+(i+1)+"_PreRoute");
    						PreRoute.value = obj.PreRoute;
    						  var PreRoute = document.getElementById("x"+(i+1)+"_PreRoute");
    						PreRoute.value = obj.PreRoute;
    						var TimeOfTaking = document.getElementById("sv_x"+(i+1)+"_TimeOfTaking");
    						TimeOfTaking.value = obj.TimeOfTaking;
    							var TimeOfTaking = document.getElementById("x"+(i+1)+"_TimeOfTaking");
    						TimeOfTaking.value = obj.TimeOfTaking;
    						   var TimeOfTaking = document.getElementById("x"+(i+1)+"_Type");
    						TimeOfTaking.value = 'Normal';
    						var TimeOfTaking = document.getElementById("x"+(i+1)+"_Status");
    						TimeOfTaking.value = 'Live';
    					  }

    					//alert(data + "Saved Sucessfully...........");
    					//swal({ text: "Saved Sucessfully......", icon: "success", });
    				   // Receiptreset();
    				  //  document.getElementById("VoucherAmt0").focus();
    				}
    			});
    	}
     </script>
    <style>
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: unset;
    	align-items: stretch;
    	width: 100%;
    }
    .ew-grid .ew-table>tbody>tr>td, .ew-grid .ew-table>tfoot>tr>td {
    	padding: .0rem;
    	border-bottom: 1px solid;
    	border-top: 0;
    	border-left: 0;
    	border-right: 1px solid;
    	border-color: silver;
    }
    .text-nowrap {
    	white-space: nowrap !important;
    	line-height: 1;
    	height: 33px;
    }
    </style>
    <script>
    jQuery("#tpd_patient_prescriptionlist th.ew-list-option-header").each(function() {this.rowSpan = 1});
    jQuery("#tpd_patient_prescriptionlist td.ew-list-option-body").each(function() {this.rowSpan = 1});
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_patient_prescription",
        width: "100%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

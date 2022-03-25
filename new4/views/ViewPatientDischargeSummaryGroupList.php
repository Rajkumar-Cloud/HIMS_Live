<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPatientDischargeSummaryGroupList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_patient_discharge_summary_grouplist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_patient_discharge_summary_grouplist = currentForm = new ew.Form("fview_patient_discharge_summary_grouplist", "list");
    fview_patient_discharge_summary_grouplist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_patient_discharge_summary_grouplist");
});
var fview_patient_discharge_summary_grouplistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_patient_discharge_summary_grouplistsrch = currentSearchForm = new ew.Form("fview_patient_discharge_summary_grouplistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_patient_discharge_summary_group")) ?>,
        fields = currentTable.fields;
    fview_patient_discharge_summary_grouplistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["patient_id", [], fields.patient_id.isInvalid],
        ["patient_name", [], fields.patient_name.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["mrnNo", [], fields.mrnNo.isInvalid],
        ["profilePic", [], fields.profilePic.isInvalid],
        ["gender", [], fields.gender.isInvalid],
        ["physician_id", [], fields.physician_id.isInvalid],
        ["typeRegsisteration", [], fields.typeRegsisteration.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["AdviceToOtherHospital", [], fields.AdviceToOtherHospital.isInvalid],
        ["vid", [], fields.vid.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_patient_discharge_summary_grouplistsrch.setInvalid();
    });

    // Validate form
    fview_patient_discharge_summary_grouplistsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    fview_patient_discharge_summary_grouplistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_patient_discharge_summary_grouplistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_patient_discharge_summary_grouplistsrch.lists.physician_id = <?= $Page->physician_id->toClientList($Page) ?>;

    // Filters
    fview_patient_discharge_summary_grouplistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_patient_discharge_summary_grouplistsrch");
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
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fview_patient_discharge_summary_grouplistsrch" id="fview_patient_discharge_summary_grouplistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_patient_discharge_summary_grouplistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_patient_discharge_summary_group">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_patient_name" class="ew-cell form-group">
        <label for="x_patient_name" class="ew-search-caption ew-label"><?= $Page->patient_name->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patient_name" id="z_patient_name" value="LIKE">
</span>
        <span id="el_view_patient_discharge_summary_group_patient_name" class="ew-search-field">
<input type="<?= $Page->patient_name->getInputTextType() ?>" data-table="view_patient_discharge_summary_group" data-field="x_patient_name" name="x_patient_name" id="x_patient_name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patient_name->getPlaceHolder()) ?>" value="<?= $Page->patient_name->EditValue ?>"<?= $Page->patient_name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patient_name->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientID" class="ew-cell form-group">
        <label for="x_PatientID" class="ew-search-caption ew-label"><?= $Page->PatientID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientID" id="z_PatientID" value="LIKE">
</span>
        <span id="el_view_patient_discharge_summary_group_PatientID" class="ew-search-field">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="view_patient_discharge_summary_group" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_physician_id" class="ew-cell form-group">
        <label for="x_physician_id" class="ew-search-caption ew-label"><?= $Page->physician_id->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_physician_id" id="z_physician_id" value="=">
</span>
        <span id="el_view_patient_discharge_summary_group_physician_id" class="ew-search-field">
    <select
        id="x_physician_id"
        name="x_physician_id"
        class="form-control ew-select<?= $Page->physician_id->isInvalidClass() ?>"
        data-select2-id="view_patient_discharge_summary_group_x_physician_id"
        data-table="view_patient_discharge_summary_group"
        data-field="x_physician_id"
        data-value-separator="<?= $Page->physician_id->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->physician_id->getPlaceHolder()) ?>"
        <?= $Page->physician_id->editAttributes() ?>>
        <?= $Page->physician_id->selectOptionListHtml("x_physician_id") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->physician_id->getErrorMessage(false) ?></div>
<?= $Page->physician_id->Lookup->getParamTag($Page, "p_x_physician_id") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_patient_discharge_summary_group_x_physician_id']"),
        options = { name: "x_physician_id", selectId: "view_patient_discharge_summary_group_x_physician_id", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_patient_discharge_summary_group.fields.physician_id.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_typeRegsisteration" class="ew-cell form-group">
        <label for="x_typeRegsisteration" class="ew-search-caption ew-label"><?= $Page->typeRegsisteration->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_typeRegsisteration" id="z_typeRegsisteration" value="LIKE">
</span>
        <span id="el_view_patient_discharge_summary_group_typeRegsisteration" class="ew-search-field">
<input type="<?= $Page->typeRegsisteration->getInputTextType() ?>" data-table="view_patient_discharge_summary_group" data-field="x_typeRegsisteration" name="x_typeRegsisteration" id="x_typeRegsisteration" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->typeRegsisteration->getPlaceHolder()) ?>" value="<?= $Page->typeRegsisteration->EditValue ?>"<?= $Page->typeRegsisteration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->typeRegsisteration->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_patient_discharge_summary_group">
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
<form name="fview_patient_discharge_summary_grouplist" id="fview_patient_discharge_summary_grouplist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_patient_discharge_summary_group">
<div id="gmp_view_patient_discharge_summary_group" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_patient_discharge_summary_grouplist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "view_patient_discharge_summary_grouplist");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_id" class="view_patient_discharge_summary_group_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <th data-name="patient_id" class="<?= $Page->patient_id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_patient_id" class="view_patient_discharge_summary_group_patient_id"><?= $Page->renderSort($Page->patient_id) ?></div></th>
<?php } ?>
<?php if ($Page->patient_name->Visible) { // patient_name ?>
        <th data-name="patient_name" class="<?= $Page->patient_name->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_patient_name" class="view_patient_discharge_summary_group_patient_name"><?= $Page->renderSort($Page->patient_name) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_PatientID" class="view_patient_discharge_summary_group_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <th data-name="mrnNo" class="<?= $Page->mrnNo->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_mrnNo" class="view_patient_discharge_summary_group_mrnNo"><?= $Page->renderSort($Page->mrnNo) ?></div></th>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <th data-name="profilePic" class="<?= $Page->profilePic->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_profilePic" class="view_patient_discharge_summary_group_profilePic"><?= $Page->renderSort($Page->profilePic) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_gender" class="view_patient_discharge_summary_group_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->physician_id->Visible) { // physician_id ?>
        <th data-name="physician_id" class="<?= $Page->physician_id->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_physician_id" class="view_patient_discharge_summary_group_physician_id"><?= $Page->renderSort($Page->physician_id) ?></div></th>
<?php } ?>
<?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <th data-name="typeRegsisteration" class="<?= $Page->typeRegsisteration->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_typeRegsisteration" class="view_patient_discharge_summary_group_typeRegsisteration"><?= $Page->renderSort($Page->typeRegsisteration) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_HospID" class="view_patient_discharge_summary_group_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <th data-name="AdviceToOtherHospital" class="<?= $Page->AdviceToOtherHospital->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_AdviceToOtherHospital" class="view_patient_discharge_summary_group_AdviceToOtherHospital"><?= $Page->renderSort($Page->AdviceToOtherHospital) ?></div></th>
<?php } ?>
<?php if ($Page->vid->Visible) { // vid ?>
        <th data-name="vid" class="<?= $Page->vid->headerCellClass() ?>"><div id="elh_view_patient_discharge_summary_group_vid" class="view_patient_discharge_summary_group_vid"><?= $Page->renderSort($Page->vid) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "view_patient_discharge_summary_grouplist");
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
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

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

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_patient_discharge_summary_group", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Save row and cell attributes
        $Page->Attrs[$Page->RowCount] = ["row_attrs" => $Page->rowAttributes(), "cell_attrs" => []];
        $Page->Attrs[$Page->RowCount]["cell_attrs"] = $Page->fieldCellAttributes();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "view_patient_discharge_summary_grouplist");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_id"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->patient_id->Visible) { // patient_id ?>
        <td data-name="patient_id" <?= $Page->patient_id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_patient_id"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_patient_id">
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->patient_name->Visible) { // patient_name ?>
        <td data-name="patient_name" <?= $Page->patient_name->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_patient_name"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_patient_name">
<span<?= $Page->patient_name->viewAttributes() ?>>
<?= $Page->patient_name->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_PatientID"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->mrnNo->Visible) { // mrnNo ?>
        <td data-name="mrnNo" <?= $Page->mrnNo->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_mrnNo"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_mrnNo">
<span<?= $Page->mrnNo->viewAttributes() ?>>
<?= $Page->mrnNo->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->profilePic->Visible) { // profilePic ?>
        <td data-name="profilePic" <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_profilePic"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_profilePic">
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_gender"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->physician_id->Visible) { // physician_id ?>
        <td data-name="physician_id" <?= $Page->physician_id->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_physician_id"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_physician_id">
<span<?= $Page->physician_id->viewAttributes() ?>>
<?= $Page->physician_id->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->typeRegsisteration->Visible) { // typeRegsisteration ?>
        <td data-name="typeRegsisteration" <?= $Page->typeRegsisteration->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_typeRegsisteration"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_typeRegsisteration">
<span<?= $Page->typeRegsisteration->viewAttributes() ?>>
<?= $Page->typeRegsisteration->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_HospID"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->AdviceToOtherHospital->Visible) { // AdviceToOtherHospital ?>
        <td data-name="AdviceToOtherHospital" <?= $Page->AdviceToOtherHospital->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_AdviceToOtherHospital"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_AdviceToOtherHospital">
<span<?= $Page->AdviceToOtherHospital->viewAttributes() ?>>
<?= $Page->AdviceToOtherHospital->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->vid->Visible) { // vid ?>
        <td data-name="vid" <?= $Page->vid->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_patient_discharge_summary_group_vid"><span id="el<?= $Page->RowCount ?>_view_patient_discharge_summary_group_vid">
<span<?= $Page->vid->viewAttributes() ?>>
<?= $Page->vid->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "view_patient_discharge_summary_grouplist");
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_patient_discharge_summary_grouplist" class="ew-custom-template"></div>
<template id="tpm_view_patient_discharge_summary_grouplist">
<div id="ct_ViewPatientDischargeSummaryGroupList"><?php if ($Page->RowCount > 0) { ?>
<table cellspacing="0" class="ew-table ew-table-separate">
	<thead>
		<tr class="ew-table-header">
			<th class="ew-slot" id="tpoh_view_patient_discharge_summary_group" data-rowspan="2"></th>
			<td rowspan="2">Print</td>
				<td rowspan="2">Edit</td>
			<td rowspan="2"><slot class="ew-slot" name="tpc_view_patient_discharge_summary_group_profilePic"></slot></td>
			<td><slot class="ew-slot" name="tpc_view_patient_discharge_summary_group_PatientID"></slot></td><td><slot class="ew-slot" name="tpc_view_patient_discharge_summary_group_patient_name"></slot></td> <td><slot class="ew-slot" name="tpc_view_patient_discharge_summary_group_gender"></slot></td> 
		</tr>
		<tr class="ew-table-header">
			<td><slot class="ew-slot" name="tpc_view_patient_discharge_summary_group_physician_id"></slot></td><td><slot class="ew-slot" name="tpc_view_patient_discharge_summary_group_typeRegsisteration"></slot></td><td><slot class="ew-slot" name="tpc_view_patient_discharge_summary_group_mrnNo"></slot></td>
		</tr> 
	</thead>
	<tbody> 
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
<tr<?= @$Page->Attrs[$i]['row_attrs'] ?>>
	<td class="ew-slot" id="tpob<?= $i ?>_view_patient_discharge_summary_group" data-rowspan="2"></td>
<td rowspan="2">
<a id="ggh{{: ~root.rows[<?= $i - 1 ?>].id }}"  href=""  onload= class="faa-parent animated-hover">
				<i  id="bbbg{{: ~root.rows[<?= $i - 1 ?>].id }}"   class="fa fa-print faa-tada fa-2x" style="color:green"></i>
 </a>
<img hidden src="ff" onerror=" var mmk = document.getElementById('ggh{{: ~root.rows[<?= $i - 1 ?>].id }}'); var kkkl = document.getElementById('bbbg{{: ~root.rows[<?= $i - 1 ?>].id }}'); var ad='{{: ~root.rows[<?= $i - 1 ?>].AdviceToOtherHospital }}'; if(ad == 'Yes'){ mmk.href = 'view_patient_clinical_summaryview.php?showdetail=&id={{: ~root.rows[<?= $i - 1 ?>].id }}';  kkkl.style.color = '#ff0000'; } else {  mmk.href = 'view_patient_discharge_summaryview.php?showdetail=&id={{: ~root.rows[<?= $i - 1 ?>].id }}'  }  a" > 
</td>
	<td rowspan="2">
				<a class="btn btn-app" href="patient_vitalsedit.php?showmaster=ip_admission&amp;fk_id={{: ~root.rows[<?= $i - 1 ?>].id }}&amp;fk_patient_id={{: ~root.rows[<?= $i - 1 ?>].patient_id }}&amp;fk_mrnNo={{: ~root.rows[<?= $i - 1 ?>].mrnNo }}&amp;id={{: ~root.rows[<?= $i - 1 ?>].vid }}">
				 <i class="fas fa-edit fa-2x" style="color:purple"></i> Edit
				</a>
	</td>
	<td rowspan="2">
<div class="image">
		  <img  style="height: auto;width: 4rem;" src='uploads/<?php echo $view_patient_discharge_summary_group->profilePic->getViewValue() ?>'  class="img-circle elevation-2" alt="User Image">
</div>
	</td>
	<td><slot class="ew-slot" name="tpx<?= $i ?>_view_patient_discharge_summary_group_PatientID"></slot></td><td><slot class="ew-slot" name="tpx<?= $i ?>_view_patient_discharge_summary_group_patient_name"></slot></td> <td><slot class="ew-slot" name="tpx<?= $i ?>_view_patient_discharge_summary_group_gender"></slot></td> 
 </tr>
 <tr<?= @$Page->Attrs[$i]['row_attrs'] ?>> 
	 <td><slot class="ew-slot" name="tpx<?= $i ?>_view_patient_discharge_summary_group_physician_id"></slot></td><td><slot class="ew-slot" name="tpx<?= $i ?>_view_patient_discharge_summary_group_typeRegsisteration"></slot></td><td><slot class="ew-slot" name="tpx<?= $i ?>_view_patient_discharge_summary_group_mrnNo"></slot></td>
 </tr> 
<?php } ?>
</tbody></table>
<?php } ?>
</div>
</template>
</div><!-- /.ew-grid-middle-panel -->
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
    ew.applyTemplate("tpd_view_patient_discharge_summary_grouplist", "tpm_view_patient_discharge_summary_grouplist", "view_patient_discharge_summary_grouplist", "<?= $Page->CustomExport ?>", ew.templateData);
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
    ew.addEventHandlers("view_patient_discharge_summary_group");
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
        container: "gmp_view_patient_discharge_summary_group",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

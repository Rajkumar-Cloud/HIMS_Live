<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewTreatmendStatusList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_treatmend_statuslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_treatmend_statuslist = currentForm = new ew.Form("fview_treatmend_statuslist", "list");
    fview_treatmend_statuslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_treatmend_statuslist");
});
var fview_treatmend_statuslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_treatmend_statuslistsrch = currentSearchForm = new ew.Form("fview_treatmend_statuslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_treatmend_status")) ?>,
        fields = currentTable.fields;
    fview_treatmend_statuslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["TreatmentStartDate", [ew.Validators.datetime(14)], fields.TreatmentStartDate.isInvalid],
        ["y_TreatmentStartDate", [ew.Validators.between], false],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["first_name", [], fields.first_name.isInvalid],
        ["Treatment", [], fields.Treatment.isInvalid],
        ["OPUDATE", [], fields.OPUDATE.isInvalid],
        ["Treatment1", [], fields.Treatment1.isInvalid],
        ["Status", [], fields.Status.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_treatmend_statuslistsrch.setInvalid();
    });

    // Validate form
    fview_treatmend_statuslistsrch.validate = function () {
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
    fview_treatmend_statuslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_treatmend_statuslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_treatmend_statuslistsrch.lists.Treatment = <?= $Page->Treatment->toClientList($Page) ?>;
    fview_treatmend_statuslistsrch.lists.Treatment1 = <?= $Page->Treatment1->toClientList($Page) ?>;

    // Filters
    fview_treatmend_statuslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_treatmend_statuslistsrch");
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
<form name="fview_treatmend_statuslistsrch" id="fview_treatmend_statuslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_treatmend_statuslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_treatmend_status">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_TreatmentStartDate" class="ew-cell form-group">
        <label for="x_TreatmentStartDate" class="ew-search-caption ew-label"><?= $Page->TreatmentStartDate->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("BETWEEN") ?>
<input type="hidden" name="z_TreatmentStartDate" id="z_TreatmentStartDate" value="BETWEEN">
</span>
        <span id="el_view_treatmend_status_TreatmentStartDate" class="ew-search-field">
<input type="<?= $Page->TreatmentStartDate->getInputTextType() ?>" data-table="view_treatmend_status" data-field="x_TreatmentStartDate" data-format="14" name="x_TreatmentStartDate" id="x_TreatmentStartDate" placeholder="<?= HtmlEncode($Page->TreatmentStartDate->getPlaceHolder()) ?>" value="<?= $Page->TreatmentStartDate->EditValue ?>"<?= $Page->TreatmentStartDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TreatmentStartDate->getErrorMessage(false) ?></div>
<?php if (!$Page->TreatmentStartDate->ReadOnly && !$Page->TreatmentStartDate->Disabled && !isset($Page->TreatmentStartDate->EditAttrs["readonly"]) && !isset($Page->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_treatmend_statuslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_treatmend_statuslistsrch", "x_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":14});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_treatmend_status_TreatmentStartDate" class="ew-search-field2">
<input type="<?= $Page->TreatmentStartDate->getInputTextType() ?>" data-table="view_treatmend_status" data-field="x_TreatmentStartDate" data-format="14" name="y_TreatmentStartDate" id="y_TreatmentStartDate" placeholder="<?= HtmlEncode($Page->TreatmentStartDate->getPlaceHolder()) ?>" value="<?= $Page->TreatmentStartDate->EditValue2 ?>"<?= $Page->TreatmentStartDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TreatmentStartDate->getErrorMessage(false) ?></div>
<?php if (!$Page->TreatmentStartDate->ReadOnly && !$Page->TreatmentStartDate->Disabled && !isset($Page->TreatmentStartDate->EditAttrs["readonly"]) && !isset($Page->TreatmentStartDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_treatmend_statuslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_treatmend_statuslistsrch", "y_TreatmentStartDate", {"ignoreReadonly":true,"useCurrent":false,"format":14});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Treatment" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->Treatment->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Treatment" id="z_Treatment" value="LIKE">
</span>
        <span id="el_view_treatmend_status_Treatment" class="ew-search-field">
<template id="tp_x_Treatment">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="view_treatmend_status" data-field="x_Treatment" name="x_Treatment" id="x_Treatment"<?= $Page->Treatment->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Treatment" class="ew-item-list"></div>
<?php $Page->Treatment->EditAttrs->prepend("onchange", "ew.updateOptions.call(this);"); ?>
<input type="hidden"
    is="selection-list"
    id="x_Treatment"
    name="x_Treatment"
    value="<?= HtmlEncode($Page->Treatment->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_Treatment"
    data-target="dsl_x_Treatment"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Treatment->isInvalidClass() ?>"
    data-table="view_treatmend_status"
    data-field="x_Treatment"
    data-value-separator="<?= $Page->Treatment->displayValueSeparatorAttribute() ?>"
    <?= $Page->Treatment->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Treatment->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Treatment1->Visible) { // Treatment1 ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Treatment1" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->Treatment1->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Treatment1" id="z_Treatment1" value="LIKE">
</span>
        <span id="el_view_treatmend_status_Treatment1" class="ew-search-field">
<template id="tp_x_Treatment1">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_treatmend_status" data-field="x_Treatment1" name="x_Treatment1" id="x_Treatment1"<?= $Page->Treatment1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Treatment1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Treatment1[]"
    name="x_Treatment1[]"
    value="<?= HtmlEncode($Page->Treatment1->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_Treatment1"
    data-target="dsl_x_Treatment1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Treatment1->isInvalidClass() ?>"
    data-table="view_treatmend_status"
    data-field="x_Treatment1"
    data-value-separator="<?= $Page->Treatment1->displayValueSeparatorAttribute() ?>"
    <?= $Page->Treatment1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Treatment1->getErrorMessage(false) ?></div>
<?= $Page->Treatment1->Lookup->getParamTag($Page, "p_x_Treatment1") ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_treatmend_status">
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
<form name="fview_treatmend_statuslist" id="fview_treatmend_statuslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_treatmend_status">
<div id="gmp_view_treatmend_status" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_treatmend_statuslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_treatmend_status_id" class="view_treatmend_status_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <th data-name="TreatmentStartDate" class="<?= $Page->TreatmentStartDate->headerCellClass() ?>"><div id="elh_view_treatmend_status_TreatmentStartDate" class="view_treatmend_status_TreatmentStartDate"><?= $Page->renderSort($Page->TreatmentStartDate) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_treatmend_status_PatientID" class="view_treatmend_status_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_view_treatmend_status_first_name" class="view_treatmend_status_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <th data-name="Treatment" class="<?= $Page->Treatment->headerCellClass() ?>"><div id="elh_view_treatmend_status_Treatment" class="view_treatmend_status_Treatment"><?= $Page->renderSort($Page->Treatment) ?></div></th>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <th data-name="OPUDATE" class="<?= $Page->OPUDATE->headerCellClass() ?>"><div id="elh_view_treatmend_status_OPUDATE" class="view_treatmend_status_OPUDATE"><?= $Page->renderSort($Page->OPUDATE) ?></div></th>
<?php } ?>
<?php if ($Page->Treatment1->Visible) { // Treatment1 ?>
        <th data-name="Treatment1" class="<?= $Page->Treatment1->headerCellClass() ?>"><div id="elh_view_treatmend_status_Treatment1" class="view_treatmend_status_Treatment1"><?= $Page->renderSort($Page->Treatment1) ?></div></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th data-name="Status" class="<?= $Page->Status->headerCellClass() ?>"><div id="elh_view_treatmend_status_Status" class="view_treatmend_status_Status"><?= $Page->renderSort($Page->Status) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_treatmend_status", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatmend_status_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <td data-name="TreatmentStartDate" <?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatmend_status_TreatmentStartDate">
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatmend_status_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatmend_status_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Treatment->Visible) { // Treatment ?>
        <td data-name="Treatment" <?= $Page->Treatment->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatmend_status_Treatment">
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <td data-name="OPUDATE" <?= $Page->OPUDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatmend_status_OPUDATE">
<span<?= $Page->OPUDATE->viewAttributes() ?>>
<?= $Page->OPUDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Treatment1->Visible) { // Treatment1 ?>
        <td data-name="Treatment1" <?= $Page->Treatment1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatmend_status_Treatment1">
<span<?= $Page->Treatment1->viewAttributes() ?>>
<?= $Page->Treatment1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Status->Visible) { // Status ?>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatmend_status_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
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
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("view_treatmend_status");
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
        container: "gmp_view_treatmend_status",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIcsiAdvisedList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_icsi_advisedlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_icsi_advisedlist = currentForm = new ew.Form("fview_icsi_advisedlist", "list");
    fview_icsi_advisedlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_icsi_advisedlist");
});
var fview_icsi_advisedlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_icsi_advisedlistsrch = currentSearchForm = new ew.Form("fview_icsi_advisedlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_icsi_advised")) ?>,
        fields = currentTable.fields;
    fview_icsi_advisedlistsrch.addFields([
        ["first_name", [], fields.first_name.isInvalid],
        ["PatientID", [], fields.PatientID.isInvalid],
        ["mobile_no", [], fields.mobile_no.isInvalid],
        ["street", [], fields.street.isInvalid],
        ["town", [], fields.town.isInvalid],
        ["ICSIAdvised", [], fields.ICSIAdvised.isInvalid],
        ["ICSIDate", [ew.Validators.datetime(7)], fields.ICSIDate.isInvalid],
        ["y_ICSIDate", [ew.Validators.between], false],
        ["createdUserName", [], fields.createdUserName.isInvalid],
        ["HospID", [], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_icsi_advisedlistsrch.setInvalid();
    });

    // Validate form
    fview_icsi_advisedlistsrch.validate = function () {
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
    fview_icsi_advisedlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_icsi_advisedlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_icsi_advisedlistsrch.lists.ICSIAdvised = <?= $Page->ICSIAdvised->toClientList($Page) ?>;

    // Filters
    fview_icsi_advisedlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_icsi_advisedlistsrch");
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
<form name="fview_icsi_advisedlistsrch" id="fview_icsi_advisedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_icsi_advisedlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_icsi_advised">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ICSIAdvised" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->ICSIAdvised->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ICSIAdvised" id="z_ICSIAdvised" value="LIKE">
</span>
        <span id="el_view_icsi_advised_ICSIAdvised" class="ew-search-field">
<template id="tp_x_ICSIAdvised">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_icsi_advised" data-field="x_ICSIAdvised" name="x_ICSIAdvised" id="x_ICSIAdvised"<?= $Page->ICSIAdvised->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ICSIAdvised" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ICSIAdvised[]"
    name="x_ICSIAdvised[]"
    value="<?= HtmlEncode($Page->ICSIAdvised->AdvancedSearch->SearchValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ICSIAdvised"
    data-target="dsl_x_ICSIAdvised"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ICSIAdvised->isInvalidClass() ?>"
    data-table="view_icsi_advised"
    data-field="x_ICSIAdvised"
    data-value-separator="<?= $Page->ICSIAdvised->displayValueSeparatorAttribute() ?>"
    <?= $Page->ICSIAdvised->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSIAdvised->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ICSIDate" class="ew-cell form-group">
        <label for="x_ICSIDate" class="ew-search-caption ew-label"><?= $Page->ICSIDate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_ICSIDate" id="z_ICSIDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->ICSIDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_icsi_advised_ICSIDate" class="ew-search-field">
<input type="<?= $Page->ICSIDate->getInputTextType() ?>" data-table="view_icsi_advised" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?= HtmlEncode($Page->ICSIDate->getPlaceHolder()) ?>" value="<?= $Page->ICSIDate->EditValue ?>"<?= $Page->ICSIDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSIDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ICSIDate->ReadOnly && !$Page->ICSIDate->Disabled && !isset($Page->ICSIDate->EditAttrs["readonly"]) && !isset($Page->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_icsi_advisedlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_icsi_advisedlistsrch", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_icsi_advised_ICSIDate" class="ew-search-field2 d-none">
<input type="<?= $Page->ICSIDate->getInputTextType() ?>" data-table="view_icsi_advised" data-field="x_ICSIDate" data-format="7" name="y_ICSIDate" id="y_ICSIDate" placeholder="<?= HtmlEncode($Page->ICSIDate->getPlaceHolder()) ?>" value="<?= $Page->ICSIDate->EditValue2 ?>"<?= $Page->ICSIDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ICSIDate->getErrorMessage(false) ?></div>
<?php if (!$Page->ICSIDate->ReadOnly && !$Page->ICSIDate->Disabled && !isset($Page->ICSIDate->EditAttrs["readonly"]) && !isset($Page->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_icsi_advisedlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_icsi_advisedlistsrch", "y_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_icsi_advised">
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
<form name="fview_icsi_advisedlist" id="fview_icsi_advisedlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_icsi_advised">
<div id="gmp_view_icsi_advised" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_icsi_advisedlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_view_icsi_advised_first_name" class="view_icsi_advised_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Page->PatientID->headerCellClass() ?>"><div id="elh_view_icsi_advised_PatientID" class="view_icsi_advised_PatientID"><?= $Page->renderSort($Page->PatientID) ?></div></th>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <th data-name="mobile_no" class="<?= $Page->mobile_no->headerCellClass() ?>"><div id="elh_view_icsi_advised_mobile_no" class="view_icsi_advised_mobile_no"><?= $Page->renderSort($Page->mobile_no) ?></div></th>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <th data-name="street" class="<?= $Page->street->headerCellClass() ?>"><div id="elh_view_icsi_advised_street" class="view_icsi_advised_street"><?= $Page->renderSort($Page->street) ?></div></th>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <th data-name="town" class="<?= $Page->town->headerCellClass() ?>"><div id="elh_view_icsi_advised_town" class="view_icsi_advised_town"><?= $Page->renderSort($Page->town) ?></div></th>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
        <th data-name="ICSIAdvised" class="<?= $Page->ICSIAdvised->headerCellClass() ?>"><div id="elh_view_icsi_advised_ICSIAdvised" class="view_icsi_advised_ICSIAdvised"><?= $Page->renderSort($Page->ICSIAdvised) ?></div></th>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
        <th data-name="ICSIDate" class="<?= $Page->ICSIDate->headerCellClass() ?>"><div id="elh_view_icsi_advised_ICSIDate" class="view_icsi_advised_ICSIDate"><?= $Page->renderSort($Page->ICSIDate) ?></div></th>
<?php } ?>
<?php if ($Page->createdUserName->Visible) { // createdUserName ?>
        <th data-name="createdUserName" class="<?= $Page->createdUserName->headerCellClass() ?>"><div id="elh_view_icsi_advised_createdUserName" class="view_icsi_advised_createdUserName"><?= $Page->renderSort($Page->createdUserName) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_icsi_advised_HospID" class="view_icsi_advised_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_icsi_advised", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Page->PatientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_PatientID">
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <td data-name="mobile_no" <?= $Page->mobile_no->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_mobile_no">
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->street->Visible) { // street ?>
        <td data-name="street" <?= $Page->street->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_street">
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->town->Visible) { // town ?>
        <td data-name="town" <?= $Page->town->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_town">
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
        <td data-name="ICSIAdvised" <?= $Page->ICSIAdvised->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_ICSIAdvised">
<span<?= $Page->ICSIAdvised->viewAttributes() ?>>
<?= $Page->ICSIAdvised->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
        <td data-name="ICSIDate" <?= $Page->ICSIDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_ICSIDate">
<span<?= $Page->ICSIDate->viewAttributes() ?>>
<?= $Page->ICSIDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdUserName->Visible) { // createdUserName ?>
        <td data-name="createdUserName" <?= $Page->createdUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_createdUserName">
<span<?= $Page->createdUserName->viewAttributes() ?>>
<?= $Page->createdUserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_icsi_advised_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_icsi_advised");
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
        container: "gmp_view_icsi_advised",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

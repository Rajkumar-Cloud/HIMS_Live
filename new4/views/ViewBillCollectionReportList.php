<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewBillCollectionReportList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_bill_collection_reportlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_bill_collection_reportlist = currentForm = new ew.Form("fview_bill_collection_reportlist", "list");
    fview_bill_collection_reportlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_bill_collection_reportlist");
});
var fview_bill_collection_reportlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_bill_collection_reportlistsrch = currentSearchForm = new ew.Form("fview_bill_collection_reportlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_bill_collection_report")) ?>,
        fields = currentTable.fields;
    fview_bill_collection_reportlistsrch.addFields([
        ["createddate", [ew.Validators.datetime(7)], fields.createddate.isInvalid],
        ["y_createddate", [ew.Validators.between], false],
        ["_UserName", [], fields._UserName.isInvalid],
        ["CARD", [], fields.CARD.isInvalid],
        ["CASH", [], fields.CASH.isInvalid],
        ["NEFT", [], fields.NEFT.isInvalid],
        ["PAYTM", [], fields.PAYTM.isInvalid],
        ["CHEQUE", [], fields.CHEQUE.isInvalid],
        ["RTGS", [], fields.RTGS.isInvalid],
        ["NotSelected", [], fields.NotSelected.isInvalid],
        ["REFUND", [], fields.REFUND.isInvalid],
        ["CANCEL", [], fields.CANCEL.isInvalid],
        ["Total", [], fields.Total.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["BillType", [], fields.BillType.isInvalid],
        ["AdjAdvance", [], fields.AdjAdvance.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_bill_collection_reportlistsrch.setInvalid();
    });

    // Validate form
    fview_bill_collection_reportlistsrch.validate = function () {
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
    fview_bill_collection_reportlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_bill_collection_reportlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_bill_collection_reportlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_bill_collection_reportlistsrch");
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
<form name="fview_bill_collection_reportlistsrch" id="fview_bill_collection_reportlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_bill_collection_reportlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_bill_collection_report">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->createddate->Visible) { // createddate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_createddate" class="ew-cell form-group">
        <label for="x_createddate" class="ew-search-caption ew-label"><?= $Page->createddate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_createddate" id="z_createddate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->createddate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->createddate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->createddate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->createddate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->createddate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->createddate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->createddate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_bill_collection_report_createddate" class="ew-search-field">
<input type="<?= $Page->createddate->getInputTextType() ?>" data-table="view_bill_collection_report" data-field="x_createddate" data-format="7" name="x_createddate" id="x_createddate" placeholder="<?= HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?= $Page->createddate->EditValue ?>"<?= $Page->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddate->getErrorMessage(false) ?></div>
<?php if (!$Page->createddate->ReadOnly && !$Page->createddate->Disabled && !isset($Page->createddate->EditAttrs["readonly"]) && !isset($Page->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_bill_collection_reportlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_bill_collection_reportlistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_bill_collection_report_createddate" class="ew-search-field2 d-none">
<input type="<?= $Page->createddate->getInputTextType() ?>" data-table="view_bill_collection_report" data-field="x_createddate" data-format="7" name="y_createddate" id="y_createddate" placeholder="<?= HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?= $Page->createddate->EditValue2 ?>"<?= $Page->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddate->getErrorMessage(false) ?></div>
<?php if (!$Page->createddate->ReadOnly && !$Page->createddate->Disabled && !isset($Page->createddate->EditAttrs["readonly"]) && !isset($Page->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_bill_collection_reportlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_bill_collection_reportlistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_bill_collection_report">
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
<form name="fview_bill_collection_reportlist" id="fview_bill_collection_reportlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_bill_collection_report">
<div id="gmp_view_bill_collection_report" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_bill_collection_reportlist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "view_bill_collection_reportlist");
?>
<?php if ($Page->createddate->Visible) { // createddate ?>
        <th data-name="createddate" class="<?= $Page->createddate->headerCellClass() ?>"><div id="elh_view_bill_collection_report_createddate" class="view_bill_collection_report_createddate"><?= $Page->renderSort($Page->createddate) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_view_bill_collection_report__UserName" class="view_bill_collection_report__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->CARD->Visible) { // CARD ?>
        <th data-name="CARD" class="<?= $Page->CARD->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CARD" class="view_bill_collection_report_CARD"><?= $Page->renderSort($Page->CARD) ?></div></th>
<?php } ?>
<?php if ($Page->CASH->Visible) { // CASH ?>
        <th data-name="CASH" class="<?= $Page->CASH->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CASH" class="view_bill_collection_report_CASH"><?= $Page->renderSort($Page->CASH) ?></div></th>
<?php } ?>
<?php if ($Page->NEFT->Visible) { // NEFT ?>
        <th data-name="NEFT" class="<?= $Page->NEFT->headerCellClass() ?>"><div id="elh_view_bill_collection_report_NEFT" class="view_bill_collection_report_NEFT"><?= $Page->renderSort($Page->NEFT) ?></div></th>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <th data-name="PAYTM" class="<?= $Page->PAYTM->headerCellClass() ?>"><div id="elh_view_bill_collection_report_PAYTM" class="view_bill_collection_report_PAYTM"><?= $Page->renderSort($Page->PAYTM) ?></div></th>
<?php } ?>
<?php if ($Page->CHEQUE->Visible) { // CHEQUE ?>
        <th data-name="CHEQUE" class="<?= $Page->CHEQUE->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CHEQUE" class="view_bill_collection_report_CHEQUE"><?= $Page->renderSort($Page->CHEQUE) ?></div></th>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <th data-name="RTGS" class="<?= $Page->RTGS->headerCellClass() ?>"><div id="elh_view_bill_collection_report_RTGS" class="view_bill_collection_report_RTGS"><?= $Page->renderSort($Page->RTGS) ?></div></th>
<?php } ?>
<?php if ($Page->NotSelected->Visible) { // NotSelected ?>
        <th data-name="NotSelected" class="<?= $Page->NotSelected->headerCellClass() ?>"><div id="elh_view_bill_collection_report_NotSelected" class="view_bill_collection_report_NotSelected"><?= $Page->renderSort($Page->NotSelected) ?></div></th>
<?php } ?>
<?php if ($Page->REFUND->Visible) { // REFUND ?>
        <th data-name="REFUND" class="<?= $Page->REFUND->headerCellClass() ?>"><div id="elh_view_bill_collection_report_REFUND" class="view_bill_collection_report_REFUND"><?= $Page->renderSort($Page->REFUND) ?></div></th>
<?php } ?>
<?php if ($Page->CANCEL->Visible) { // CANCEL ?>
        <th data-name="CANCEL" class="<?= $Page->CANCEL->headerCellClass() ?>"><div id="elh_view_bill_collection_report_CANCEL" class="view_bill_collection_report_CANCEL"><?= $Page->renderSort($Page->CANCEL) ?></div></th>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <th data-name="Total" class="<?= $Page->Total->headerCellClass() ?>"><div id="elh_view_bill_collection_report_Total" class="view_bill_collection_report_Total"><?= $Page->renderSort($Page->Total) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_bill_collection_report_HospID" class="view_bill_collection_report_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_view_bill_collection_report_BillType" class="view_bill_collection_report_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
<?php } ?>
<?php if ($Page->AdjAdvance->Visible) { // AdjAdvance ?>
        <th data-name="AdjAdvance" class="<?= $Page->AdjAdvance->headerCellClass() ?>"><div id="elh_view_bill_collection_report_AdjAdvance" class="view_bill_collection_report_AdjAdvance"><?= $Page->renderSort($Page->AdjAdvance) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "view_bill_collection_reportlist");
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_bill_collection_report", "data-rowtype" => $Page->RowType]);

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
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "view_bill_collection_reportlist");
?>
    <?php if ($Page->createddate->Visible) { // createddate ?>
        <td data-name="createddate" <?= $Page->createddate->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_createddate"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_createddate">
<span<?= $Page->createddate->viewAttributes() ?>>
<?= $Page->createddate->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report__UserName"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CARD->Visible) { // CARD ?>
        <td data-name="CARD" <?= $Page->CARD->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_CARD"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_CARD">
<span<?= $Page->CARD->viewAttributes() ?>>
<?= $Page->CARD->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CASH->Visible) { // CASH ?>
        <td data-name="CASH" <?= $Page->CASH->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_CASH"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_CASH">
<span<?= $Page->CASH->viewAttributes() ?>>
<?= $Page->CASH->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->NEFT->Visible) { // NEFT ?>
        <td data-name="NEFT" <?= $Page->NEFT->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_NEFT"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_NEFT">
<span<?= $Page->NEFT->viewAttributes() ?>>
<?= $Page->NEFT->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" <?= $Page->PAYTM->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_PAYTM"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CHEQUE->Visible) { // CHEQUE ?>
        <td data-name="CHEQUE" <?= $Page->CHEQUE->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_CHEQUE"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_CHEQUE">
<span<?= $Page->CHEQUE->viewAttributes() ?>>
<?= $Page->CHEQUE->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" <?= $Page->RTGS->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_RTGS"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->NotSelected->Visible) { // NotSelected ?>
        <td data-name="NotSelected" <?= $Page->NotSelected->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_NotSelected"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_NotSelected">
<span<?= $Page->NotSelected->viewAttributes() ?>>
<?= $Page->NotSelected->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->REFUND->Visible) { // REFUND ?>
        <td data-name="REFUND" <?= $Page->REFUND->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_REFUND"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_REFUND">
<span<?= $Page->REFUND->viewAttributes() ?>>
<?= $Page->REFUND->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CANCEL->Visible) { // CANCEL ?>
        <td data-name="CANCEL" <?= $Page->CANCEL->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_CANCEL"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_CANCEL">
<span<?= $Page->CANCEL->viewAttributes() ?>>
<?= $Page->CANCEL->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Total->Visible) { // Total ?>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_Total"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_HospID"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_BillType"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->AdjAdvance->Visible) { // AdjAdvance ?>
        <td data-name="AdjAdvance" <?= $Page->AdjAdvance->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_bill_collection_report_AdjAdvance"><span id="el<?= $Page->RowCount ?>_view_bill_collection_report_AdjAdvance">
<span<?= $Page->AdjAdvance->viewAttributes() ?>>
<?= $Page->AdjAdvance->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "view_bill_collection_reportlist");
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
<?php
// Render aggregate row
$Page->RowType = ROWTYPE_AGGREGATE;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->TotalRecords > 0 && !$Page->isGridAdd() && !$Page->isGridEdit()) { ?>
<tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options
$Page->renderListOptions();

// Render list options (footer, left)
$Page->ListOptions->render("footer", "left", "", "block", $Page->TableVar, "view_bill_collection_reportlist");
?>
    <?php if ($Page->createddate->Visible) { // createddate ?>
        <td data-name="createddate" class="<?= $Page->createddate->footerCellClass() ?>"><span id="elf_view_bill_collection_report_createddate" class="view_bill_collection_report_createddate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" class="<?= $Page->_UserName->footerCellClass() ?>"><span id="elf_view_bill_collection_report__UserName" class="view_bill_collection_report__UserName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CARD->Visible) { // CARD ?>
        <td data-name="CARD" class="<?= $Page->CARD->footerCellClass() ?>"><span id="elf_view_bill_collection_report_CARD" class="view_bill_collection_report_CARD">
        <template id="tpg_view_bill_collection_report_CARD" class="view_bill_collection_reportlist"><span<?= $Page->CARD->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->CARD->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->CASH->Visible) { // CASH ?>
        <td data-name="CASH" class="<?= $Page->CASH->footerCellClass() ?>"><span id="elf_view_bill_collection_report_CASH" class="view_bill_collection_report_CASH">
        <template id="tpg_view_bill_collection_report_CASH" class="view_bill_collection_reportlist"><span<?= $Page->CASH->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->CASH->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->NEFT->Visible) { // NEFT ?>
        <td data-name="NEFT" class="<?= $Page->NEFT->footerCellClass() ?>"><span id="elf_view_bill_collection_report_NEFT" class="view_bill_collection_report_NEFT">
        <template id="tpg_view_bill_collection_report_NEFT" class="view_bill_collection_reportlist"><span<?= $Page->NEFT->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->NEFT->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" class="<?= $Page->PAYTM->footerCellClass() ?>"><span id="elf_view_bill_collection_report_PAYTM" class="view_bill_collection_report_PAYTM">
        <template id="tpg_view_bill_collection_report_PAYTM" class="view_bill_collection_reportlist"><span<?= $Page->PAYTM->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->PAYTM->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->CHEQUE->Visible) { // CHEQUE ?>
        <td data-name="CHEQUE" class="<?= $Page->CHEQUE->footerCellClass() ?>"><span id="elf_view_bill_collection_report_CHEQUE" class="view_bill_collection_report_CHEQUE">
        <template id="tpg_view_bill_collection_report_CHEQUE" class="view_bill_collection_reportlist"><span<?= $Page->CHEQUE->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->CHEQUE->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" class="<?= $Page->RTGS->footerCellClass() ?>"><span id="elf_view_bill_collection_report_RTGS" class="view_bill_collection_report_RTGS">
        <template id="tpg_view_bill_collection_report_RTGS" class="view_bill_collection_reportlist"><span<?= $Page->RTGS->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->RTGS->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->NotSelected->Visible) { // NotSelected ?>
        <td data-name="NotSelected" class="<?= $Page->NotSelected->footerCellClass() ?>"><span id="elf_view_bill_collection_report_NotSelected" class="view_bill_collection_report_NotSelected">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->REFUND->Visible) { // REFUND ?>
        <td data-name="REFUND" class="<?= $Page->REFUND->footerCellClass() ?>"><span id="elf_view_bill_collection_report_REFUND" class="view_bill_collection_report_REFUND">
        <template id="tpg_view_bill_collection_report_REFUND" class="view_bill_collection_reportlist"><span<?= $Page->REFUND->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->REFUND->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->CANCEL->Visible) { // CANCEL ?>
        <td data-name="CANCEL" class="<?= $Page->CANCEL->footerCellClass() ?>"><span id="elf_view_bill_collection_report_CANCEL" class="view_bill_collection_report_CANCEL">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Total->Visible) { // Total ?>
        <td data-name="Total" class="<?= $Page->Total->footerCellClass() ?>"><span id="elf_view_bill_collection_report_Total" class="view_bill_collection_report_Total">
        <template id="tpg_view_bill_collection_report_Total" class="view_bill_collection_reportlist"><span<?= $Page->Total->viewAttributes() ?>><span class="ew-aggregate-value"><span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Total->ViewValue ?></span></span></span></template>
        </span></td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Page->HospID->footerCellClass() ?>"><span id="elf_view_bill_collection_report_HospID" class="view_bill_collection_report_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" class="<?= $Page->BillType->footerCellClass() ?>"><span id="elf_view_bill_collection_report_BillType" class="view_bill_collection_report_BillType">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->AdjAdvance->Visible) { // AdjAdvance ?>
        <td data-name="AdjAdvance" class="<?= $Page->AdjAdvance->footerCellClass() ?>"><span id="elf_view_bill_collection_report_AdjAdvance" class="view_bill_collection_report_AdjAdvance">
        &nbsp;
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right", "", "block", $Page->TableVar, "view_bill_collection_reportlist");
?>
    </tr>
</tfoot>
<?php } ?>
</table><!-- /.ew-table -->
<?php } ?>
<div id="tpd_view_bill_collection_reportlist" class="ew-custom-template"></div>
<template id="tpm_view_bill_collection_reportlist">
<div id="ct_ViewBillCollectionReportList"><?php if ($Page->RowCount > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
  <tr>
	</tr>
<?php } ?>
</tbody>
  <?php if ($Page->TotalRecords > 0 && !$view_bill_collection_report->isGridAdd() && !$view_bill_collection_report->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_bill_collection_report->createddate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
	if($todate == "--")
	{
	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}	
	(int)$SumAmount = 0;
(int)$SumCARD =  0;
(int)$SumCASH =  0;
(int)$SumNEFT =  0;
(int)$SumPAYTM =  0;
(int)$SumCHEQUE =  0;
(int)$SumRTGS =  0;
(int)$SumNotSelected =  0;
(int)$SumREFUND =  0;
(int)$SumCANCEL =  0;
(int)$SumTotal =  0;
(int)$SumAdj =  0;
	$sql = "SELECT  `UserName`, sum(`CARD`) as CARD, sum( `CASH`) as CASH, sum( `NEFT`) as NEFT,
	sum( `PAYTM`) as PAYTM,sum( `AdjAdvance`) as AdjAdvance,
 sum(  `CHEQUE`) as CHEQUE, sum(  `RTGS`) as RTGS, sum( `NotSelected`) as NotSelected,
 sum( `REFUND`) as REFUND, sum( `CANCEL`) as CANCEL, sum( `Total`)  as Total
	 FROM ganeshkumar_bjhims.view_bill_collection_report
	where HospID='".HospitalID()."' and createddate between '".$fromdte."' and '".$todate."' and  BillType in ('Bill', 'Pharmacy')  
   group by UserName";
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
		$hhh = '<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td><b>UserName</b></td>
<td><b align="right">CARD</b></td>
<td><b align="right">CASH</b></td>
<td><b align="right">NEFT</b></td>
<td><b align="right">PAYTM</b></td>
<td><b align="right">CHEQUE</b></td>
<td><b align="right">RTGS</b></td>
<td><b align="right">AdjAdvance</b></td>
<td><b align="right">NotSelected</b></td>
<td><b align="right">REFUND</b></td>
<td><b align="right">CANCEL</b></td>
<td><b align="right">Total</b></td>
</tr>';
for ($x = 0; $x < $VCount; $x++) {
				$UserName =  $results2[$x]["UserName"];				
$CARD =  $results2[$x]["CARD"];
$CASH =  $results2[$x]["CASH"];
$NEFT =  $results2[$x]["NEFT"];
$PAYTM =  $results2[$x]["PAYTM"];
$CHEQUE =  $results2[$x]["CHEQUE"];
$RTGS =  $results2[$x]["RTGS"];
$AdjAdvance =  $results2[$x]["AdjAdvance"];
$NotSelected =  $results2[$x]["NotSelected"];
$REFUND =  $results2[$x]["REFUND"];
$CANCEL =  $results2[$x]["CANCEL"];
$Total =  $results2[$x]["Total"];
				$hhh .= '<tr><td>'.$UserName.'</td><td align="right">'.$CARD.'</td><td align="right">'.$CASH.'</td>
				<td align="right">'.$NEFT.'</td><td align="right">'.$PAYTM.'</td><td align="right">'.$CHEQUE.'</td>
				<td align="right">'.$RTGS.'</td><td align="right">'.$AdjAdvance.'</td><td align="right">'.$NotSelected.'</td><td align="right">'.$REFUND.'</td>
				<td align="right">'.$CANCEL.'</td><td align="right">'.$Total.'</td>				
				</tr>  ';
(int)$SumAmount = (int)$SumAmount + (int)$Amount;
(int)$SumCARD =  (int)$SumCARD + (int)$CARD;
(int)$SumCASH =  (int)$SumCASH + (int)$CASH;
(int)$SumNEFT =  (int)$SumNEFT + (int)$NEFT;
(int)$SumPAYTM =  (int)$SumPAYTM + (int)$PAYTM;
(int)$SumCHEQUE =  (int)$SumCHEQUE + (int)$CHEQUE;
(int)$SumAdj =  (int)$SumAdj + (int)$AdjAdvance;
(int)$SumRTGS =  (int)$SumRTGS + (int)$RTGS;
(int)$SumNotSelected =  (int)$SumNotSelected + (int)$NotSelected;
(int)$SumREFUND =  (int)$SumREFUND + (int)$REFUND;
(int)$SumCANCEL =  (int)$SumCANCEL + (int)$CANCEL;
(int)$SumTotal =  (int)$SumTotal + (int)$Total;
}
$hhh .= '<tr><td align="right">Total</td><td align="right">'.number_format ($SumCARD,2).'</td><td align="right">'.number_format ($SumCASH,2).'</td>
<td align="right">'.number_format ($SumNEFT,2).'</td><td align="right">'.number_format ($SumPAYTM,2).'</td>
<td align="right">'.number_format ($SumCHEQUE,2).'</td><td align="right">'.number_format ($SumRTGS,2).'</td><td align="right">'.number_format ($SumAdj,2).'</td>
<td align="right">'.number_format ($SumNotSelected,2).'</td><td align="right">'.number_format ($SumREFUND,2).'</td>
<td align="right">'.number_format ($SumCANCEL,2).'</td><td align="right">'.number_format ($SumTotal,2).'</td>
</tr></table>  ';
echo $hhh;
?>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Deptment Wise</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_bill_collection_report->createddate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_bill_collection_report->createddate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
	$fromdte =  explode("/",$fromdte);
	if(count($fromdte)!=3)
	{
		 $fromdte =  explode("-",$fromdte);        
	}
	 $todate =  explode("/",$todate);
	if(count($todate)!=3)
	{
		 $todate =  explode("-",$todate);        
	}
	$fromdte =   $fromdte[2]."-".$fromdte[1]."-".$fromdte[0];
	$todate = $todate[2]."-".$todate[1]."-".$todate[0];
	if($fromdte == "--")
	{
	   $fromdte = date("Y-m-d");
	   $todate = date("Y-m-d");
	}	
$dataPoints = array();
	if($todate == "--")
	{
	  // $fromdte = $fromdte;
	   $todate = $fromdte;
	}	
	(int)$SumAmount = 0;
	(int)$rowid = 0;
	$sql = "SELECT  BillType as ProcedureName , sum(ProcedureAmount) as Amount ,count(ProcedureName) as Count FROM ganeshkumar_bjhims.view_dash_billing_voucher
	where HospID='".HospitalID()."' and createddate between '".$fromdte."' and '".$todate."' and CancelBill not like '%Cancel%'    group by BillType";
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
		$hhh = '<table class="table table-striped ew-table ew-export-table" width="100%">
<tr>
<td style="width:10px;" ></td>
<td><b>Service</b></td>
<td><b>Count</b></td>
<td><b align="right">Amount</b></td>
</tr>';
for ($x = 0; $x < $VCount; $x++) {
				$DEPARTMENT =  $results2[$x]["ProcedureName"];
				$Count =  $results2[$x]["Count"];				
				$Amount =  $results2[$x]["Amount"];
			if($Amount != '')
			{
				$hhh .= '<tr id="row'.$rowid.'"><td><i  onclick="selectedItemA(this, '.$rowid.' )" id="'.$DEPARTMENT.'" class="fas fa-plus-square circle-icon"></i></td><td>'.$DEPARTMENT.'</td><td>'.$Count.'</td><td align="right">'.$Amount.'</td></tr>  ';
				(int)$SumAmount = (int)$SumAmount + (int)$Amount;
				(int)$rowid = (int)$rowid + 1;
								$product_itemA=array(
								"label"=> $DEPARTMENT ,
								 "y"=> $Count
								 );
								 array_push($dataPoints , $product_itemA);
			}
}
$sql = "select 'Pharmachy' as Services , sum(Amount) as Amount, '1' as Count
from 
view_pharmacy_billing_voucher
where HospID='".HospitalID()."' and createddate between '".$fromdte."' and '".$todate."' " ;
	$results2 = $dbhelper->ExecuteRows($sql);
	$VCount = count($results2);
for ($x = 0; $x < $VCount; $x++) {
				$DEPARTMENT =  $results2[$x]["Services"];
				$Count =  $results2[$x]["Count"];				
				$Amount =  $results2[$x]["Amount"];
			if($Amount != '')
			{
				$hhh .= '<tr id="rowBB'.$rowid.'"><td><i  onclick="selectedItemB(this, '.$rowid.' )" id="'.$DEPARTMENT.'" class="fas fa-plus-square circle-icon"></i></td><td >'.$DEPARTMENT.'</td><td>'.$Count.'</td><td align="right">'.$Amount.'</td></tr>  ';
				(int)$SumAmount = (int)$SumAmount + (int)$Amount;
				(int)$rowid = (int)$rowid + 1;
				$product_item=array(
"label"=> $DEPARTMENT ,
 "y"=> $Count
);
array_push($dataPoints , $product_item);
			}
}
$hhh .= '<tr><td></td><td></td><td align="right">Total</td><td align="right">'.number_format ($SumAmount,2).'</td></tr></table>  ';
echo $hhh;
?>
	</div>
</div>
</div>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
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
    ew.applyTemplate("tpd_view_bill_collection_reportlist", "tpm_view_bill_collection_reportlist", "view_bill_collection_reportlist", "<?= $Page->CustomExport ?>", ew.templateData);
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
    ew.addEventHandlers("view_bill_collection_report");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
    function selectedItem(item, rowID)
    {
     //alert(item.id);
     // $fromdte = date("Y-m-d");
    //	   $todate 
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
    	var Itemmed = item.id;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNo",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    					$("#ServicTableRow").empty();
    		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    				var	createddate =  obj.createddate;											
    			var	PatientId =  obj.PatientId;
    			var	PatientName =  obj.PatientName;				
    			var	Mobile =  obj.Mobile;
    			var	amount =  obj.amount;
    			var	Vid =  obj.Vid;
    			var	hhh = hhh + '<tr><td><a href="view_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="view_billing_voucheredit.php?showdetail=view_patient_services&id='+ Vid +'" class="fas fa-edit"></a> </td> <td>' + createddate + '</td> <td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#rowAA' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});		
    }

    function selectedItemA(item, rowID)
    {
     //alert(item.id);
     // $fromdte = date("Y-m-d");
    //	   $todate 
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
    	var Itemmed = item.id;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNoA",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    				var $rowid = 0;
    					$("#ServicTableRowMM").empty();
    		var	hhh = '<table id="ServicTableRowMM" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Services</b></td><td><b>Count</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    			var	Services =  obj.Services;
    			var	amount =  obj.amount;				
    			var	Count =  obj.Count;
    			var	hhh = hhh + '<tr id="rowAA'+$rowid+'"><td><i  onclick="selectedItem(this, ' +$rowid+' )" id="'+Services+'" class="fas fa-plus-square circle-iconA"></i></td><td>' + Services + '</td><td>' + Count + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    		   $rowid = $rowid + 1;
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#row' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});		
    }

    function selectedItemB(item, rowID)
    {
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
    	var Itemmed = item.id;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNoA",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    				var $rowid = 0;
    					$("#ServicTableRowMM").empty();
    		var	hhh = '<table id="ServicTableRowMM" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Services</b></td><td><b>Count</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    			var	Services =  obj.Services;
    			var	amount =  obj.amount;				
    			var	Count =  obj.Count;
    			var	hhh = hhh + '<tr id="rowAA'+$rowid+'"><td><i  onclick="selectedItem(this, ' +$rowid+' )" id="'+Services+'" class="fas fa-plus-square circle-iconA"></i></td><td>' + Services + '</td><td>' + Count + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    		   $rowid = $rowid + 1;
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#row' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});		
    }

    function selectedItemBAAAAAAAA(item, rowID)
    {
     //alert(item.id);
     // $fromdte = date("Y-m-d");
    //	   $todate 
    	var fromdte = "<?php echo $fromdte; ?>";
    	var todate = "<?php echo $todate; ?>";
    	var HospitalID = "<?php echo HospitalID(); ?>";
    	var Itemmed = item.id;
     								var user = [{
    									'fromdte': fromdte,
    									'todate': todate,
    									'HospitalID': HospitalID,
    									'Itemmed': Itemmed
    								}];
    								var jsonString = JSON.stringify(user);
    								$.ajax({
    									type: "GET",
    									url: "ajaxinsert.php?control=ServiceWiseBillNoB",
    									data: { data: jsonString },
    									cache: false,
    									success: function (data) {
    										let jsonObject = JSON.parse(data);
    										var json = jsonObject["records"];
    				var umAmount = 0;
    					$("#ServicTableRow").empty();
    		var	hhh = '<table id="ServicTableRow" class="table table-striped ew-table ew-export-table" width="100%"><tr><td style="width:10px;" ></td><td><b>Date</b></td><td><b>PatientId</b></td><td><b>PatientName</b></td><td><b align="right">Amount</b></td></tr>';									
    										for (var i = 0; i < json.length; i++) {
    											var obj = json[i];
    			var	createddate =  obj.createddate;								
    			var	PatientId =  obj.PatientId;
    			var	PatientName =  obj.PatientName;				
    			var	Mobile =  obj.Mobile;
    			var	amount =  obj.amount;
    			var	Vid =  obj.Vid;
    			var	hhh = hhh + '<tr><td><a href="view_billing_voucherview.php?showdetail=&id='+Vid+'" class="fas fa-search"></a> <a href="view_billing_voucheredit.php?showdetail=view_patient_services&id='+ Vid +'" class="fas fa-edit"></a> </td><td>' + createddate + '</td><td>' + PatientId + '</td><td>' + PatientName + '</td><td align="right">' + amount + '</td></tr>  ';
    			umAmount = parseInt(umAmount) + parseInt(amount);
    										}
    hhh = hhh +  '<tr><td></td><td></td><td align="right">Total</td><td align="right">' + umAmount.toFixed(2) + '</td></tr></table>  ';
    		var rr = '#rowBB' + rowID;
    		$(rr).after(hhh);

    //var x = document.getElementById(item.id).parentElement;
    //var child = x.childNodes(hhh);
    									}
    	});		
    }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script>
    //window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,
    	exportEnabled: true,
    	title:{
    		text: ""
    	},
    	subtitles: [{
    		text: ""
    	}],
    	data: [{
    		type: "pie",
    		showInLegend: "true",
    		legendText: "{label}",
    		indexLabelFontSize: 16,
    		indexLabel: "{label} - #percent%",
    		yValueFormatString: "฿#,##0",
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chart.render();

    //}
    </script>
    <style>
    .circle-icon {
    	background: #0073b7;
    	/* width: 4px; */
    	/* height: 10px; */
    	border-radius: 50%;
    	text-align: center;
    	/* line-height: 10px; */
    	vertical-align: middle;
    	padding: 5px;
    	color: white;
    }
    .circle-iconA {
    	background: #28a745;
    	/* width: 4px; */
    	/* height: 10px; */
    	border-radius: 50%;
    	text-align: center;
    	/* line-height: 10px; */
    	vertical-align: middle;
    	padding: 5px;
    	color: white;
    }
    </style>
    <script>
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_view_bill_collection_report",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

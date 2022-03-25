<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardSummaryPaymentModeList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_dashboard_summary_payment_modelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_dashboard_summary_payment_modelist = currentForm = new ew.Form("fview_dashboard_summary_payment_modelist", "list");
    fview_dashboard_summary_payment_modelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_dashboard_summary_payment_modelist");
});
var fview_dashboard_summary_payment_modelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_dashboard_summary_payment_modelistsrch = currentSearchForm = new ew.Form("fview_dashboard_summary_payment_modelistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_dashboard_summary_payment_mode")) ?>,
        fields = currentTable.fields;
    fview_dashboard_summary_payment_modelistsrch.addFields([
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
        ["Total", [], fields.Total.isInvalid],
        ["REFUND", [], fields.REFUND.isInvalid],
        ["CANCEL", [], fields.CANCEL.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["BillType", [], fields.BillType.isInvalid],
        ["AdjAdvance", [], fields.AdjAdvance.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_dashboard_summary_payment_modelistsrch.setInvalid();
    });

    // Validate form
    fview_dashboard_summary_payment_modelistsrch.validate = function () {
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
    fview_dashboard_summary_payment_modelistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_dashboard_summary_payment_modelistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_dashboard_summary_payment_modelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_dashboard_summary_payment_modelistsrch");
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
<form name="fview_dashboard_summary_payment_modelistsrch" id="fview_dashboard_summary_payment_modelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_dashboard_summary_payment_modelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_dashboard_summary_payment_mode">
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
        <span id="el_view_dashboard_summary_payment_mode_createddate" class="ew-search-field">
<input type="<?= $Page->createddate->getInputTextType() ?>" data-table="view_dashboard_summary_payment_mode" data-field="x_createddate" data-format="7" name="x_createddate" id="x_createddate" placeholder="<?= HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?= $Page->createddate->EditValue ?>"<?= $Page->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddate->getErrorMessage(false) ?></div>
<?php if (!$Page->createddate->ReadOnly && !$Page->createddate->Disabled && !isset($Page->createddate->EditAttrs["readonly"]) && !isset($Page->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_payment_modelistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_summary_payment_modelistsrch", "x_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_dashboard_summary_payment_mode_createddate" class="ew-search-field2 d-none">
<input type="<?= $Page->createddate->getInputTextType() ?>" data-table="view_dashboard_summary_payment_mode" data-field="x_createddate" data-format="7" name="y_createddate" id="y_createddate" placeholder="<?= HtmlEncode($Page->createddate->getPlaceHolder()) ?>" value="<?= $Page->createddate->EditValue2 ?>"<?= $Page->createddate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->createddate->getErrorMessage(false) ?></div>
<?php if (!$Page->createddate->ReadOnly && !$Page->createddate->Disabled && !isset($Page->createddate->EditAttrs["readonly"]) && !isset($Page->createddate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_dashboard_summary_payment_modelistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_dashboard_summary_payment_modelistsrch", "y_createddate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_dashboard_summary_payment_mode">
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
<form name="fview_dashboard_summary_payment_modelist" id="fview_dashboard_summary_payment_modelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_dashboard_summary_payment_mode">
<div id="gmp_view_dashboard_summary_payment_mode" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_dashboard_summary_payment_modelist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->createddate->Visible) { // createddate ?>
        <th data-name="createddate" class="<?= $Page->createddate->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_createddate" class="view_dashboard_summary_payment_mode_createddate"><?= $Page->renderSort($Page->createddate) ?></div></th>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <th data-name="_UserName" class="<?= $Page->_UserName->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode__UserName" class="view_dashboard_summary_payment_mode__UserName"><?= $Page->renderSort($Page->_UserName) ?></div></th>
<?php } ?>
<?php if ($Page->CARD->Visible) { // CARD ?>
        <th data-name="CARD" class="<?= $Page->CARD->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_CARD" class="view_dashboard_summary_payment_mode_CARD"><?= $Page->renderSort($Page->CARD) ?></div></th>
<?php } ?>
<?php if ($Page->CASH->Visible) { // CASH ?>
        <th data-name="CASH" class="<?= $Page->CASH->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_CASH" class="view_dashboard_summary_payment_mode_CASH"><?= $Page->renderSort($Page->CASH) ?></div></th>
<?php } ?>
<?php if ($Page->NEFT->Visible) { // NEFT ?>
        <th data-name="NEFT" class="<?= $Page->NEFT->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_NEFT" class="view_dashboard_summary_payment_mode_NEFT"><?= $Page->renderSort($Page->NEFT) ?></div></th>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <th data-name="PAYTM" class="<?= $Page->PAYTM->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_PAYTM" class="view_dashboard_summary_payment_mode_PAYTM"><?= $Page->renderSort($Page->PAYTM) ?></div></th>
<?php } ?>
<?php if ($Page->CHEQUE->Visible) { // CHEQUE ?>
        <th data-name="CHEQUE" class="<?= $Page->CHEQUE->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_CHEQUE" class="view_dashboard_summary_payment_mode_CHEQUE"><?= $Page->renderSort($Page->CHEQUE) ?></div></th>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <th data-name="RTGS" class="<?= $Page->RTGS->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_RTGS" class="view_dashboard_summary_payment_mode_RTGS"><?= $Page->renderSort($Page->RTGS) ?></div></th>
<?php } ?>
<?php if ($Page->NotSelected->Visible) { // NotSelected ?>
        <th data-name="NotSelected" class="<?= $Page->NotSelected->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_NotSelected" class="view_dashboard_summary_payment_mode_NotSelected"><?= $Page->renderSort($Page->NotSelected) ?></div></th>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <th data-name="Total" class="<?= $Page->Total->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_Total" class="view_dashboard_summary_payment_mode_Total"><?= $Page->renderSort($Page->Total) ?></div></th>
<?php } ?>
<?php if ($Page->REFUND->Visible) { // REFUND ?>
        <th data-name="REFUND" class="<?= $Page->REFUND->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_REFUND" class="view_dashboard_summary_payment_mode_REFUND"><?= $Page->renderSort($Page->REFUND) ?></div></th>
<?php } ?>
<?php if ($Page->CANCEL->Visible) { // CANCEL ?>
        <th data-name="CANCEL" class="<?= $Page->CANCEL->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_CANCEL" class="view_dashboard_summary_payment_mode_CANCEL"><?= $Page->renderSort($Page->CANCEL) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_HospID" class="view_dashboard_summary_payment_mode_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <th data-name="BillType" class="<?= $Page->BillType->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_BillType" class="view_dashboard_summary_payment_mode_BillType"><?= $Page->renderSort($Page->BillType) ?></div></th>
<?php } ?>
<?php if ($Page->AdjAdvance->Visible) { // AdjAdvance ?>
        <th data-name="AdjAdvance" class="<?= $Page->AdjAdvance->headerCellClass() ?>"><div id="elh_view_dashboard_summary_payment_mode_AdjAdvance" class="view_dashboard_summary_payment_mode_AdjAdvance"><?= $Page->renderSort($Page->AdjAdvance) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_dashboard_summary_payment_mode", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->createddate->Visible) { // createddate ?>
        <td data-name="createddate" <?= $Page->createddate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_createddate">
<span<?= $Page->createddate->viewAttributes() ?>>
<?= $Page->createddate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_UserName->Visible) { // UserName ?>
        <td data-name="_UserName" <?= $Page->_UserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode__UserName">
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CARD->Visible) { // CARD ?>
        <td data-name="CARD" <?= $Page->CARD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_CARD">
<span<?= $Page->CARD->viewAttributes() ?>>
<?= $Page->CARD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CASH->Visible) { // CASH ?>
        <td data-name="CASH" <?= $Page->CASH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_CASH">
<span<?= $Page->CASH->viewAttributes() ?>>
<?= $Page->CASH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEFT->Visible) { // NEFT ?>
        <td data-name="NEFT" <?= $Page->NEFT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_NEFT">
<span<?= $Page->NEFT->viewAttributes() ?>>
<?= $Page->NEFT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" <?= $Page->PAYTM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CHEQUE->Visible) { // CHEQUE ?>
        <td data-name="CHEQUE" <?= $Page->CHEQUE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_CHEQUE">
<span<?= $Page->CHEQUE->viewAttributes() ?>>
<?= $Page->CHEQUE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" <?= $Page->RTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NotSelected->Visible) { // NotSelected ?>
        <td data-name="NotSelected" <?= $Page->NotSelected->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_NotSelected">
<span<?= $Page->NotSelected->viewAttributes() ?>>
<?= $Page->NotSelected->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Total->Visible) { // Total ?>
        <td data-name="Total" <?= $Page->Total->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_Total">
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->REFUND->Visible) { // REFUND ?>
        <td data-name="REFUND" <?= $Page->REFUND->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_REFUND">
<span<?= $Page->REFUND->viewAttributes() ?>>
<?= $Page->REFUND->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CANCEL->Visible) { // CANCEL ?>
        <td data-name="CANCEL" <?= $Page->CANCEL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_CANCEL">
<span<?= $Page->CANCEL->viewAttributes() ?>>
<?= $Page->CANCEL->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillType->Visible) { // BillType ?>
        <td data-name="BillType" <?= $Page->BillType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_BillType">
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AdjAdvance->Visible) { // AdjAdvance ?>
        <td data-name="AdjAdvance" <?= $Page->AdjAdvance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_dashboard_summary_payment_mode_AdjAdvance">
<span<?= $Page->AdjAdvance->viewAttributes() ?>>
<?= $Page->AdjAdvance->getViewValue() ?></span>
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
    ew.addEventHandlers("view_dashboard_summary_payment_mode");
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
        container: "gmp_view_dashboard_summary_payment_mode",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewTillSearchViewRevenewList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_till_search_view_revenewlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_till_search_view_revenewlist = currentForm = new ew.Form("fview_till_search_view_revenewlist", "list");
    fview_till_search_view_revenewlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_till_search_view_revenewlist");
});
var fview_till_search_view_revenewlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_till_search_view_revenewlistsrch = currentSearchForm = new ew.Form("fview_till_search_view_revenewlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_till_search_view_revenew")) ?>,
        fields = currentTable.fields;
    fview_till_search_view_revenewlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["DepositDate", [ew.Validators.datetime(7)], fields.DepositDate.isInvalid],
        ["y_DepositDate", [ew.Validators.between], false],
        ["CreatedDateTime", [], fields.CreatedDateTime.isInvalid],
        ["CreatedUserName", [], fields.CreatedUserName.isInvalid],
        ["TransferTo", [], fields.TransferTo.isInvalid],
        ["OpeningBalance", [], fields.OpeningBalance.isInvalid],
        ["TotalCash", [], fields.TotalCash.isInvalid],
        ["Cheque", [], fields.Cheque.isInvalid],
        ["Card", [], fields.Card.isInvalid],
        ["NEFTRTGS", [], fields.NEFTRTGS.isInvalid],
        ["RTGS", [], fields.RTGS.isInvalid],
        ["PAYTM", [], fields.PAYTM.isInvalid],
        ["ManualCash", [], fields.ManualCash.isInvalid],
        ["ManualCard", [], fields.ManualCard.isInvalid],
        ["TotalCashAmount", [], fields.TotalCashAmount.isInvalid],
        ["TotalCardAmount", [], fields.TotalCardAmount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_till_search_view_revenewlistsrch.setInvalid();
    });

    // Validate form
    fview_till_search_view_revenewlistsrch.validate = function () {
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
    fview_till_search_view_revenewlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_till_search_view_revenewlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_till_search_view_revenewlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_till_search_view_revenewlistsrch");
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
<form name="fview_till_search_view_revenewlistsrch" id="fview_till_search_view_revenewlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_till_search_view_revenewlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_till_search_view_revenew">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DepositDate" class="ew-cell form-group">
        <label for="x_DepositDate" class="ew-search-caption ew-label"><?= $Page->DepositDate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_DepositDate" id="z_DepositDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->DepositDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->DepositDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->DepositDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->DepositDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->DepositDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->DepositDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->DepositDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->DepositDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->DepositDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_till_search_view_revenew_DepositDate" class="ew-search-field">
<input type="<?= $Page->DepositDate->getInputTextType() ?>" data-table="view_till_search_view_revenew" data-field="x_DepositDate" data-format="7" name="x_DepositDate" id="x_DepositDate" placeholder="<?= HtmlEncode($Page->DepositDate->getPlaceHolder()) ?>" value="<?= $Page->DepositDate->EditValue ?>"<?= $Page->DepositDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DepositDate->getErrorMessage(false) ?></div>
<?php if (!$Page->DepositDate->ReadOnly && !$Page->DepositDate->Disabled && !isset($Page->DepositDate->EditAttrs["readonly"]) && !isset($Page->DepositDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_till_search_view_revenewlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_till_search_view_revenewlistsrch", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_till_search_view_revenew_DepositDate" class="ew-search-field2 d-none">
<input type="<?= $Page->DepositDate->getInputTextType() ?>" data-table="view_till_search_view_revenew" data-field="x_DepositDate" data-format="7" name="y_DepositDate" id="y_DepositDate" placeholder="<?= HtmlEncode($Page->DepositDate->getPlaceHolder()) ?>" value="<?= $Page->DepositDate->EditValue2 ?>"<?= $Page->DepositDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DepositDate->getErrorMessage(false) ?></div>
<?php if (!$Page->DepositDate->ReadOnly && !$Page->DepositDate->Disabled && !isset($Page->DepositDate->EditAttrs["readonly"]) && !isset($Page->DepositDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_till_search_view_revenewlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_till_search_view_revenewlistsrch", "y_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_till_search_view_revenew">
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
<form name="fview_till_search_view_revenewlist" id="fview_till_search_view_revenewlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_till_search_view_revenew">
<div id="gmp_view_till_search_view_revenew" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_till_search_view_revenewlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_id" class="view_till_search_view_revenew_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <th data-name="DepositDate" class="<?= $Page->DepositDate->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_DepositDate" class="view_till_search_view_revenew_DepositDate"><?= $Page->renderSort($Page->DepositDate) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_CreatedDateTime" class="view_till_search_view_revenew_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <th data-name="CreatedUserName" class="<?= $Page->CreatedUserName->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_CreatedUserName" class="view_till_search_view_revenew_CreatedUserName"><?= $Page->renderSort($Page->CreatedUserName) ?></div></th>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <th data-name="TransferTo" class="<?= $Page->TransferTo->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_TransferTo" class="view_till_search_view_revenew_TransferTo"><?= $Page->renderSort($Page->TransferTo) ?></div></th>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <th data-name="OpeningBalance" class="<?= $Page->OpeningBalance->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_OpeningBalance" class="view_till_search_view_revenew_OpeningBalance"><?= $Page->renderSort($Page->OpeningBalance) ?></div></th>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <th data-name="TotalCash" class="<?= $Page->TotalCash->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_TotalCash" class="view_till_search_view_revenew_TotalCash"><?= $Page->renderSort($Page->TotalCash) ?></div></th>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
        <th data-name="Cheque" class="<?= $Page->Cheque->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_Cheque" class="view_till_search_view_revenew_Cheque"><?= $Page->renderSort($Page->Cheque) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_Card" class="view_till_search_view_revenew_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <th data-name="NEFTRTGS" class="<?= $Page->NEFTRTGS->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_NEFTRTGS" class="view_till_search_view_revenew_NEFTRTGS"><?= $Page->renderSort($Page->NEFTRTGS) ?></div></th>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <th data-name="RTGS" class="<?= $Page->RTGS->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_RTGS" class="view_till_search_view_revenew_RTGS"><?= $Page->renderSort($Page->RTGS) ?></div></th>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <th data-name="PAYTM" class="<?= $Page->PAYTM->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_PAYTM" class="view_till_search_view_revenew_PAYTM"><?= $Page->renderSort($Page->PAYTM) ?></div></th>
<?php } ?>
<?php if ($Page->ManualCash->Visible) { // ManualCash ?>
        <th data-name="ManualCash" class="<?= $Page->ManualCash->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_ManualCash" class="view_till_search_view_revenew_ManualCash"><?= $Page->renderSort($Page->ManualCash) ?></div></th>
<?php } ?>
<?php if ($Page->ManualCard->Visible) { // ManualCard ?>
        <th data-name="ManualCard" class="<?= $Page->ManualCard->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_ManualCard" class="view_till_search_view_revenew_ManualCard"><?= $Page->renderSort($Page->ManualCard) ?></div></th>
<?php } ?>
<?php if ($Page->TotalCashAmount->Visible) { // TotalCashAmount ?>
        <th data-name="TotalCashAmount" class="<?= $Page->TotalCashAmount->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_TotalCashAmount" class="view_till_search_view_revenew_TotalCashAmount"><?= $Page->renderSort($Page->TotalCashAmount) ?></div></th>
<?php } ?>
<?php if ($Page->TotalCardAmount->Visible) { // TotalCardAmount ?>
        <th data-name="TotalCardAmount" class="<?= $Page->TotalCardAmount->headerCellClass() ?>"><div id="elh_view_till_search_view_revenew_TotalCardAmount" class="view_till_search_view_revenew_TotalCardAmount"><?= $Page->renderSort($Page->TotalCardAmount) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_till_search_view_revenew", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <td data-name="DepositDate" <?= $Page->DepositDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_DepositDate">
<span<?= $Page->DepositDate->viewAttributes() ?>>
<?= $Page->DepositDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <td data-name="CreatedUserName" <?= $Page->CreatedUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_CreatedUserName">
<span<?= $Page->CreatedUserName->viewAttributes() ?>>
<?= $Page->CreatedUserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <td data-name="TransferTo" <?= $Page->TransferTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_TransferTo">
<span<?= $Page->TransferTo->viewAttributes() ?>>
<?= $Page->TransferTo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <td data-name="OpeningBalance" <?= $Page->OpeningBalance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_OpeningBalance">
<span<?= $Page->OpeningBalance->viewAttributes() ?>>
<?= $Page->OpeningBalance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <td data-name="TotalCash" <?= $Page->TotalCash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_TotalCash">
<span<?= $Page->TotalCash->viewAttributes() ?>>
<?= $Page->TotalCash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cheque->Visible) { // Cheque ?>
        <td data-name="Cheque" <?= $Page->Cheque->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_Cheque">
<span<?= $Page->Cheque->viewAttributes() ?>>
<?= $Page->Cheque->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <td data-name="NEFTRTGS" <?= $Page->NEFTRTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_NEFTRTGS">
<span<?= $Page->NEFTRTGS->viewAttributes() ?>>
<?= $Page->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" <?= $Page->RTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" <?= $Page->PAYTM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ManualCash->Visible) { // ManualCash ?>
        <td data-name="ManualCash" <?= $Page->ManualCash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_ManualCash">
<span<?= $Page->ManualCash->viewAttributes() ?>>
<?= $Page->ManualCash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ManualCard->Visible) { // ManualCard ?>
        <td data-name="ManualCard" <?= $Page->ManualCard->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_ManualCard">
<span<?= $Page->ManualCard->viewAttributes() ?>>
<?= $Page->ManualCard->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalCashAmount->Visible) { // TotalCashAmount ?>
        <td data-name="TotalCashAmount" <?= $Page->TotalCashAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_TotalCashAmount">
<span<?= $Page->TotalCashAmount->viewAttributes() ?>>
<?= $Page->TotalCashAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalCardAmount->Visible) { // TotalCardAmount ?>
        <td data-name="TotalCardAmount" <?= $Page->TotalCardAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view_revenew_TotalCardAmount">
<span<?= $Page->TotalCardAmount->viewAttributes() ?>>
<?= $Page->TotalCardAmount->getViewValue() ?></span>
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
$Page->ListOptions->render("footer", "left");
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_id" class="view_till_search_view_revenew_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <td data-name="DepositDate" class="<?= $Page->DepositDate->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_DepositDate" class="view_till_search_view_revenew_DepositDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_CreatedDateTime" class="view_till_search_view_revenew_CreatedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <td data-name="CreatedUserName" class="<?= $Page->CreatedUserName->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_CreatedUserName" class="view_till_search_view_revenew_CreatedUserName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <td data-name="TransferTo" class="<?= $Page->TransferTo->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_TransferTo" class="view_till_search_view_revenew_TransferTo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <td data-name="OpeningBalance" class="<?= $Page->OpeningBalance->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_OpeningBalance" class="view_till_search_view_revenew_OpeningBalance">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->OpeningBalance->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <td data-name="TotalCash" class="<?= $Page->TotalCash->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_TotalCash" class="view_till_search_view_revenew_TotalCash">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->TotalCash->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->Cheque->Visible) { // Cheque ?>
        <td data-name="Cheque" class="<?= $Page->Cheque->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_Cheque" class="view_till_search_view_revenew_Cheque">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Cheque->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" class="<?= $Page->Card->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_Card" class="view_till_search_view_revenew_Card">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Card->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <td data-name="NEFTRTGS" class="<?= $Page->NEFTRTGS->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_NEFTRTGS" class="view_till_search_view_revenew_NEFTRTGS">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->NEFTRTGS->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" class="<?= $Page->RTGS->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_RTGS" class="view_till_search_view_revenew_RTGS">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->RTGS->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" class="<?= $Page->PAYTM->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_PAYTM" class="view_till_search_view_revenew_PAYTM">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->PAYTM->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->ManualCash->Visible) { // ManualCash ?>
        <td data-name="ManualCash" class="<?= $Page->ManualCash->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_ManualCash" class="view_till_search_view_revenew_ManualCash">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ManualCard->Visible) { // ManualCard ?>
        <td data-name="ManualCard" class="<?= $Page->ManualCard->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_ManualCard" class="view_till_search_view_revenew_ManualCard">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TotalCashAmount->Visible) { // TotalCashAmount ?>
        <td data-name="TotalCashAmount" class="<?= $Page->TotalCashAmount->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_TotalCashAmount" class="view_till_search_view_revenew_TotalCashAmount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->TotalCashAmount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->TotalCardAmount->Visible) { // TotalCardAmount ?>
        <td data-name="TotalCardAmount" class="<?= $Page->TotalCardAmount->footerCellClass() ?>"><span id="elf_view_till_search_view_revenew_TotalCardAmount" class="view_till_search_view_revenew_TotalCardAmount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->TotalCardAmount->ViewValue ?></span>
        </span></td>
    <?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right");
?>
    </tr>
</tfoot>
<?php } ?>
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
    ew.addEventHandlers("view_till_search_view_revenew");
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
        container: "gmp_view_till_search_view_revenew",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

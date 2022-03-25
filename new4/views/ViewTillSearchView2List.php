<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewTillSearchView2List = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_till_search_view2list;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_till_search_view2list = currentForm = new ew.Form("fview_till_search_view2list", "list");
    fview_till_search_view2list.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_till_search_view2list");
});
var fview_till_search_view2listsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_till_search_view2listsrch = currentSearchForm = new ew.Form("fview_till_search_view2listsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_till_search_view2")) ?>,
        fields = currentTable.fields;
    fview_till_search_view2listsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["DepositDate", [ew.Validators.datetime(7)], fields.DepositDate.isInvalid],
        ["y_DepositDate", [ew.Validators.between], false],
        ["CreatedUserName", [], fields.CreatedUserName.isInvalid],
        ["TransferTo", [], fields.TransferTo.isInvalid],
        ["OpeningBalance", [], fields.OpeningBalance.isInvalid],
        ["CashCollected", [], fields.CashCollected.isInvalid],
        ["TotalCash", [], fields.TotalCash.isInvalid],
        ["Cheque", [], fields.Cheque.isInvalid],
        ["Card", [], fields.Card.isInvalid],
        ["RTGS", [], fields.RTGS.isInvalid],
        ["NEFTRTGS", [], fields.NEFTRTGS.isInvalid],
        ["PAYTM", [], fields.PAYTM.isInvalid],
        ["Other", [], fields.Other.isInvalid],
        ["CreatedDateTime", [], fields.CreatedDateTime.isInvalid],
        ["BalanceAmount", [], fields.BalanceAmount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_till_search_view2listsrch.setInvalid();
    });

    // Validate form
    fview_till_search_view2listsrch.validate = function () {
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
    fview_till_search_view2listsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_till_search_view2listsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_till_search_view2listsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_till_search_view2listsrch");
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
<form name="fview_till_search_view2listsrch" id="fview_till_search_view2listsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_till_search_view2listsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_till_search_view2">
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
        <span id="el_view_till_search_view2_DepositDate" class="ew-search-field">
<input type="<?= $Page->DepositDate->getInputTextType() ?>" data-table="view_till_search_view2" data-field="x_DepositDate" data-format="7" name="x_DepositDate" id="x_DepositDate" placeholder="<?= HtmlEncode($Page->DepositDate->getPlaceHolder()) ?>" value="<?= $Page->DepositDate->EditValue ?>"<?= $Page->DepositDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DepositDate->getErrorMessage(false) ?></div>
<?php if (!$Page->DepositDate->ReadOnly && !$Page->DepositDate->Disabled && !isset($Page->DepositDate->EditAttrs["readonly"]) && !isset($Page->DepositDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_till_search_view2listsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_till_search_view2listsrch", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_till_search_view2_DepositDate" class="ew-search-field2 d-none">
<input type="<?= $Page->DepositDate->getInputTextType() ?>" data-table="view_till_search_view2" data-field="x_DepositDate" data-format="7" name="y_DepositDate" id="y_DepositDate" placeholder="<?= HtmlEncode($Page->DepositDate->getPlaceHolder()) ?>" value="<?= $Page->DepositDate->EditValue2 ?>"<?= $Page->DepositDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DepositDate->getErrorMessage(false) ?></div>
<?php if (!$Page->DepositDate->ReadOnly && !$Page->DepositDate->Disabled && !isset($Page->DepositDate->EditAttrs["readonly"]) && !isset($Page->DepositDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_till_search_view2listsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_till_search_view2listsrch", "y_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_CreatedUserName" class="ew-cell form-group">
        <label for="x_CreatedUserName" class="ew-search-caption ew-label"><?= $Page->CreatedUserName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CreatedUserName" id="z_CreatedUserName" value="LIKE">
</span>
        <span id="el_view_till_search_view2_CreatedUserName" class="ew-search-field">
<input type="<?= $Page->CreatedUserName->getInputTextType() ?>" data-table="view_till_search_view2" data-field="x_CreatedUserName" name="x_CreatedUserName" id="x_CreatedUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedUserName->getPlaceHolder()) ?>" value="<?= $Page->CreatedUserName->EditValue ?>"<?= $Page->CreatedUserName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedUserName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_TransferTo" class="ew-cell form-group">
        <label for="x_TransferTo" class="ew-search-caption ew-label"><?= $Page->TransferTo->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TransferTo" id="z_TransferTo" value="LIKE">
</span>
        <span id="el_view_till_search_view2_TransferTo" class="ew-search-field">
<input type="<?= $Page->TransferTo->getInputTextType() ?>" data-table="view_till_search_view2" data-field="x_TransferTo" name="x_TransferTo" id="x_TransferTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TransferTo->getPlaceHolder()) ?>" value="<?= $Page->TransferTo->EditValue ?>"<?= $Page->TransferTo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TransferTo->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_till_search_view2">
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
<form name="fview_till_search_view2list" id="fview_till_search_view2list" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_till_search_view2">
<div id="gmp_view_till_search_view2" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_till_search_view2list" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_till_search_view2_id" class="view_till_search_view2_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <th data-name="DepositDate" class="<?= $Page->DepositDate->headerCellClass() ?>"><div id="elh_view_till_search_view2_DepositDate" class="view_till_search_view2_DepositDate"><?= $Page->renderSort($Page->DepositDate) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <th data-name="CreatedUserName" class="<?= $Page->CreatedUserName->headerCellClass() ?>"><div id="elh_view_till_search_view2_CreatedUserName" class="view_till_search_view2_CreatedUserName"><?= $Page->renderSort($Page->CreatedUserName) ?></div></th>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <th data-name="TransferTo" class="<?= $Page->TransferTo->headerCellClass() ?>"><div id="elh_view_till_search_view2_TransferTo" class="view_till_search_view2_TransferTo"><?= $Page->renderSort($Page->TransferTo) ?></div></th>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <th data-name="OpeningBalance" class="<?= $Page->OpeningBalance->headerCellClass() ?>"><div id="elh_view_till_search_view2_OpeningBalance" class="view_till_search_view2_OpeningBalance"><?= $Page->renderSort($Page->OpeningBalance) ?></div></th>
<?php } ?>
<?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <th data-name="CashCollected" class="<?= $Page->CashCollected->headerCellClass() ?>"><div id="elh_view_till_search_view2_CashCollected" class="view_till_search_view2_CashCollected"><?= $Page->renderSort($Page->CashCollected) ?></div></th>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <th data-name="TotalCash" class="<?= $Page->TotalCash->headerCellClass() ?>"><div id="elh_view_till_search_view2_TotalCash" class="view_till_search_view2_TotalCash"><?= $Page->renderSort($Page->TotalCash) ?></div></th>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
        <th data-name="Cheque" class="<?= $Page->Cheque->headerCellClass() ?>"><div id="elh_view_till_search_view2_Cheque" class="view_till_search_view2_Cheque"><?= $Page->renderSort($Page->Cheque) ?></div></th>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
        <th data-name="Card" class="<?= $Page->Card->headerCellClass() ?>"><div id="elh_view_till_search_view2_Card" class="view_till_search_view2_Card"><?= $Page->renderSort($Page->Card) ?></div></th>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
        <th data-name="RTGS" class="<?= $Page->RTGS->headerCellClass() ?>"><div id="elh_view_till_search_view2_RTGS" class="view_till_search_view2_RTGS"><?= $Page->renderSort($Page->RTGS) ?></div></th>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <th data-name="NEFTRTGS" class="<?= $Page->NEFTRTGS->headerCellClass() ?>"><div id="elh_view_till_search_view2_NEFTRTGS" class="view_till_search_view2_NEFTRTGS"><?= $Page->renderSort($Page->NEFTRTGS) ?></div></th>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <th data-name="PAYTM" class="<?= $Page->PAYTM->headerCellClass() ?>"><div id="elh_view_till_search_view2_PAYTM" class="view_till_search_view2_PAYTM"><?= $Page->renderSort($Page->PAYTM) ?></div></th>
<?php } ?>
<?php if ($Page->Other->Visible) { // Other ?>
        <th data-name="Other" class="<?= $Page->Other->headerCellClass() ?>"><div id="elh_view_till_search_view2_Other" class="view_till_search_view2_Other"><?= $Page->renderSort($Page->Other) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_view_till_search_view2_CreatedDateTime" class="view_till_search_view2_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
        <th data-name="BalanceAmount" class="<?= $Page->BalanceAmount->headerCellClass() ?>"><div id="elh_view_till_search_view2_BalanceAmount" class="view_till_search_view2_BalanceAmount"><?= $Page->renderSort($Page->BalanceAmount) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_till_search_view2", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <td data-name="DepositDate" <?= $Page->DepositDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_DepositDate">
<span<?= $Page->DepositDate->viewAttributes() ?>>
<?= $Page->DepositDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <td data-name="CreatedUserName" <?= $Page->CreatedUserName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_CreatedUserName">
<span<?= $Page->CreatedUserName->viewAttributes() ?>>
<?= $Page->CreatedUserName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <td data-name="TransferTo" <?= $Page->TransferTo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_TransferTo">
<span<?= $Page->TransferTo->viewAttributes() ?>>
<?= $Page->TransferTo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <td data-name="OpeningBalance" <?= $Page->OpeningBalance->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_OpeningBalance">
<span<?= $Page->OpeningBalance->viewAttributes() ?>>
<?= $Page->OpeningBalance->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <td data-name="CashCollected" <?= $Page->CashCollected->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_CashCollected">
<span<?= $Page->CashCollected->viewAttributes() ?>>
<?= $Page->CashCollected->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <td data-name="TotalCash" <?= $Page->TotalCash->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_TotalCash">
<span<?= $Page->TotalCash->viewAttributes() ?>>
<?= $Page->TotalCash->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Cheque->Visible) { // Cheque ?>
        <td data-name="Cheque" <?= $Page->Cheque->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_Cheque">
<span<?= $Page->Cheque->viewAttributes() ?>>
<?= $Page->Cheque->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" <?= $Page->Card->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_Card">
<span<?= $Page->Card->viewAttributes() ?>>
<?= $Page->Card->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" <?= $Page->RTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_RTGS">
<span<?= $Page->RTGS->viewAttributes() ?>>
<?= $Page->RTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <td data-name="NEFTRTGS" <?= $Page->NEFTRTGS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_NEFTRTGS">
<span<?= $Page->NEFTRTGS->viewAttributes() ?>>
<?= $Page->NEFTRTGS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" <?= $Page->PAYTM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_PAYTM">
<span<?= $Page->PAYTM->viewAttributes() ?>>
<?= $Page->PAYTM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Other->Visible) { // Other ?>
        <td data-name="Other" <?= $Page->Other->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_Other">
<span<?= $Page->Other->viewAttributes() ?>>
<?= $Page->Other->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
        <td data-name="BalanceAmount" <?= $Page->BalanceAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_till_search_view2_BalanceAmount">
<span<?= $Page->BalanceAmount->viewAttributes() ?>>
<?= $Page->BalanceAmount->getViewValue() ?></span>
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
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_view_till_search_view2_id" class="view_till_search_view2_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DepositDate->Visible) { // DepositDate ?>
        <td data-name="DepositDate" class="<?= $Page->DepositDate->footerCellClass() ?>"><span id="elf_view_till_search_view2_DepositDate" class="view_till_search_view2_DepositDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
        <td data-name="CreatedUserName" class="<?= $Page->CreatedUserName->footerCellClass() ?>"><span id="elf_view_till_search_view2_CreatedUserName" class="view_till_search_view2_CreatedUserName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->TransferTo->Visible) { // TransferTo ?>
        <td data-name="TransferTo" class="<?= $Page->TransferTo->footerCellClass() ?>"><span id="elf_view_till_search_view2_TransferTo" class="view_till_search_view2_TransferTo">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
        <td data-name="OpeningBalance" class="<?= $Page->OpeningBalance->footerCellClass() ?>"><span id="elf_view_till_search_view2_OpeningBalance" class="view_till_search_view2_OpeningBalance">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->OpeningBalance->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->CashCollected->Visible) { // CashCollected ?>
        <td data-name="CashCollected" class="<?= $Page->CashCollected->footerCellClass() ?>"><span id="elf_view_till_search_view2_CashCollected" class="view_till_search_view2_CashCollected">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->CashCollected->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->TotalCash->Visible) { // TotalCash ?>
        <td data-name="TotalCash" class="<?= $Page->TotalCash->footerCellClass() ?>"><span id="elf_view_till_search_view2_TotalCash" class="view_till_search_view2_TotalCash">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->TotalCash->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->Cheque->Visible) { // Cheque ?>
        <td data-name="Cheque" class="<?= $Page->Cheque->footerCellClass() ?>"><span id="elf_view_till_search_view2_Cheque" class="view_till_search_view2_Cheque">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Cheque->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->Card->Visible) { // Card ?>
        <td data-name="Card" class="<?= $Page->Card->footerCellClass() ?>"><span id="elf_view_till_search_view2_Card" class="view_till_search_view2_Card">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Card->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->RTGS->Visible) { // RTGS ?>
        <td data-name="RTGS" class="<?= $Page->RTGS->footerCellClass() ?>"><span id="elf_view_till_search_view2_RTGS" class="view_till_search_view2_RTGS">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->RTGS->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
        <td data-name="NEFTRTGS" class="<?= $Page->NEFTRTGS->footerCellClass() ?>"><span id="elf_view_till_search_view2_NEFTRTGS" class="view_till_search_view2_NEFTRTGS">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->NEFTRTGS->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->PAYTM->Visible) { // PAYTM ?>
        <td data-name="PAYTM" class="<?= $Page->PAYTM->footerCellClass() ?>"><span id="elf_view_till_search_view2_PAYTM" class="view_till_search_view2_PAYTM">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->PAYTM->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->Other->Visible) { // Other ?>
        <td data-name="Other" class="<?= $Page->Other->footerCellClass() ?>"><span id="elf_view_till_search_view2_Other" class="view_till_search_view2_Other">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Other->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->footerCellClass() ?>"><span id="elf_view_till_search_view2_CreatedDateTime" class="view_till_search_view2_CreatedDateTime">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
        <td data-name="BalanceAmount" class="<?= $Page->BalanceAmount->footerCellClass() ?>"><span id="elf_view_till_search_view2_BalanceAmount" class="view_till_search_view2_BalanceAmount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->BalanceAmount->ViewValue ?></span>
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
    ew.addEventHandlers("view_till_search_view2");
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
        container: "gmp_view_till_search_view2",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

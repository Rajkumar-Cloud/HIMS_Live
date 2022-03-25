<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyReportEarningList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_report_earninglist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_report_earninglist = currentForm = new ew.Form("fview_pharmacy_report_earninglist", "list");
    fview_pharmacy_report_earninglist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_report_earninglist");
});
var fview_pharmacy_report_earninglistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_report_earninglistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_earninglistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_report_earning")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_report_earninglistsrch.addFields([
        ["ProductCode", [], fields.ProductCode.isInvalid],
        ["ProductName", [], fields.ProductName.isInvalid],
        ["SaleQuantity", [], fields.SaleQuantity.isInvalid],
        ["RT", [], fields.RT.isInvalid],
        ["SaleValue", [], fields.SaleValue.isInvalid],
        ["PurRate", [], fields.PurRate.isInvalid],
        ["PurchaseCostValue1", [], fields.PurchaseCostValue1.isInvalid],
        ["MarginAmount1", [], fields.MarginAmount1.isInvalid],
        ["MarginOnSale1", [], fields.MarginOnSale1.isInvalid],
        ["MarginOnCost1", [], fields.MarginOnCost1.isInvalid],
        ["Date", [ew.Validators.datetime(0)], fields.Date.isInvalid],
        ["y_Date", [ew.Validators.between], false],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["HosoID", [], fields.HosoID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_report_earninglistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_report_earninglistsrch.validate = function () {
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
    fview_pharmacy_report_earninglistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_report_earninglistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_report_earninglistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_report_earninglistsrch");
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
<form name="fview_pharmacy_report_earninglistsrch" id="fview_pharmacy_report_earninglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_report_earninglistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_earning">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->ProductCode->Visible) { // ProductCode ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ProductCode" class="ew-cell form-group">
        <label for="x_ProductCode" class="ew-search-caption ew-label"><?= $Page->ProductCode->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProductCode" id="z_ProductCode" value="LIKE">
</span>
        <span id="el_view_pharmacy_report_earning_ProductCode" class="ew-search-field">
<input type="<?= $Page->ProductCode->getInputTextType() ?>" data-table="view_pharmacy_report_earning" data-field="x_ProductCode" name="x_ProductCode" id="x_ProductCode" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->ProductCode->getPlaceHolder()) ?>" value="<?= $Page->ProductCode->EditValue ?>"<?= $Page->ProductCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProductCode->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProductName->Visible) { // ProductName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ProductName" class="ew-cell form-group">
        <label for="x_ProductName" class="ew-search-caption ew-label"><?= $Page->ProductName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ProductName" id="z_ProductName" value="LIKE">
</span>
        <span id="el_view_pharmacy_report_earning_ProductName" class="ew-search-field">
<input type="<?= $Page->ProductName->getInputTextType() ?>" data-table="view_pharmacy_report_earning" data-field="x_ProductName" name="x_ProductName" id="x_ProductName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->ProductName->getPlaceHolder()) ?>" value="<?= $Page->ProductName->EditValue ?>"<?= $Page->ProductName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ProductName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Date" class="ew-cell form-group">
        <label for="x_Date" class="ew-search-caption ew-label"><?= $Page->Date->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_Date" id="z_Date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->Date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_report_earning_Date" class="ew-search-field">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_pharmacy_report_earning" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_report_earninglistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_report_earninglistsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_report_earning_Date" class="ew-search-field2 d-none">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="view_pharmacy_report_earning" data-field="x_Date" name="y_Date" id="y_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue2 ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_report_earninglistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_report_earninglistsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_earning">
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
<form name="fview_pharmacy_report_earninglist" id="fview_pharmacy_report_earninglist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_earning">
<div id="gmp_view_pharmacy_report_earning" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_earninglist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->ProductCode->Visible) { // ProductCode ?>
        <th data-name="ProductCode" class="<?= $Page->ProductCode->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_ProductCode" class="view_pharmacy_report_earning_ProductCode"><?= $Page->renderSort($Page->ProductCode) ?></div></th>
<?php } ?>
<?php if ($Page->ProductName->Visible) { // ProductName ?>
        <th data-name="ProductName" class="<?= $Page->ProductName->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_ProductName" class="view_pharmacy_report_earning_ProductName"><?= $Page->renderSort($Page->ProductName) ?></div></th>
<?php } ?>
<?php if ($Page->SaleQuantity->Visible) { // SaleQuantity ?>
        <th data-name="SaleQuantity" class="<?= $Page->SaleQuantity->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_SaleQuantity" class="view_pharmacy_report_earning_SaleQuantity"><?= $Page->renderSort($Page->SaleQuantity) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_RT" class="view_pharmacy_report_earning_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <th data-name="SaleValue" class="<?= $Page->SaleValue->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_SaleValue" class="view_pharmacy_report_earning_SaleValue"><?= $Page->renderSort($Page->SaleValue) ?></div></th>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <th data-name="PurRate" class="<?= $Page->PurRate->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_PurRate" class="view_pharmacy_report_earning_PurRate"><?= $Page->renderSort($Page->PurRate) ?></div></th>
<?php } ?>
<?php if ($Page->PurchaseCostValue1->Visible) { // PurchaseCostValue1 ?>
        <th data-name="PurchaseCostValue1" class="<?= $Page->PurchaseCostValue1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_PurchaseCostValue1" class="view_pharmacy_report_earning_PurchaseCostValue1"><?= $Page->renderSort($Page->PurchaseCostValue1) ?></div></th>
<?php } ?>
<?php if ($Page->MarginAmount1->Visible) { // MarginAmount1 ?>
        <th data-name="MarginAmount1" class="<?= $Page->MarginAmount1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_MarginAmount1" class="view_pharmacy_report_earning_MarginAmount1"><?= $Page->renderSort($Page->MarginAmount1) ?></div></th>
<?php } ?>
<?php if ($Page->MarginOnSale1->Visible) { // MarginOnSale1 ?>
        <th data-name="MarginOnSale1" class="<?= $Page->MarginOnSale1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_MarginOnSale1" class="view_pharmacy_report_earning_MarginOnSale1"><?= $Page->renderSort($Page->MarginOnSale1) ?></div></th>
<?php } ?>
<?php if ($Page->MarginOnCost1->Visible) { // MarginOnCost1 ?>
        <th data-name="MarginOnCost1" class="<?= $Page->MarginOnCost1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_MarginOnCost1" class="view_pharmacy_report_earning_MarginOnCost1"><?= $Page->renderSort($Page->MarginOnCost1) ?></div></th>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th data-name="Date" class="<?= $Page->Date->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_Date" class="view_pharmacy_report_earning_Date"><?= $Page->renderSort($Page->Date) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_BRCODE" class="view_pharmacy_report_earning_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Page->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_report_earning_HosoID" class="view_pharmacy_report_earning_HosoID"><?= $Page->renderSort($Page->HosoID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_report_earning", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->ProductCode->Visible) { // ProductCode ?>
        <td data-name="ProductCode" <?= $Page->ProductCode->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_ProductCode">
<span<?= $Page->ProductCode->viewAttributes() ?>>
<?= $Page->ProductCode->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductName->Visible) { // ProductName ?>
        <td data-name="ProductName" <?= $Page->ProductName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_ProductName">
<span<?= $Page->ProductName->viewAttributes() ?>>
<?= $Page->ProductName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SaleQuantity->Visible) { // SaleQuantity ?>
        <td data-name="SaleQuantity" <?= $Page->SaleQuantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_SaleQuantity">
<span<?= $Page->SaleQuantity->viewAttributes() ?>>
<?= $Page->SaleQuantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <td data-name="SaleValue" <?= $Page->SaleValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_SaleValue">
<span<?= $Page->SaleValue->viewAttributes() ?>>
<?= $Page->SaleValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" <?= $Page->PurRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurchaseCostValue1->Visible) { // PurchaseCostValue1 ?>
        <td data-name="PurchaseCostValue1" <?= $Page->PurchaseCostValue1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_PurchaseCostValue1">
<span<?= $Page->PurchaseCostValue1->viewAttributes() ?>>
<?= $Page->PurchaseCostValue1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarginAmount1->Visible) { // MarginAmount1 ?>
        <td data-name="MarginAmount1" <?= $Page->MarginAmount1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_MarginAmount1">
<span<?= $Page->MarginAmount1->viewAttributes() ?>>
<?= $Page->MarginAmount1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarginOnSale1->Visible) { // MarginOnSale1 ?>
        <td data-name="MarginOnSale1" <?= $Page->MarginOnSale1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_MarginOnSale1">
<span<?= $Page->MarginOnSale1->viewAttributes() ?>>
<?= $Page->MarginOnSale1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MarginOnCost1->Visible) { // MarginOnCost1 ?>
        <td data-name="MarginOnCost1" <?= $Page->MarginOnCost1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_MarginOnCost1">
<span<?= $Page->MarginOnCost1->viewAttributes() ?>>
<?= $Page->MarginOnCost1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_earning_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
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
    <?php if ($Page->ProductCode->Visible) { // ProductCode ?>
        <td data-name="ProductCode" class="<?= $Page->ProductCode->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_ProductCode" class="view_pharmacy_report_earning_ProductCode">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->ProductName->Visible) { // ProductName ?>
        <td data-name="ProductName" class="<?= $Page->ProductName->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_ProductName" class="view_pharmacy_report_earning_ProductName">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SaleQuantity->Visible) { // SaleQuantity ?>
        <td data-name="SaleQuantity" class="<?= $Page->SaleQuantity->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_SaleQuantity" class="view_pharmacy_report_earning_SaleQuantity">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" class="<?= $Page->RT->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_RT" class="view_pharmacy_report_earning_RT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <td data-name="SaleValue" class="<?= $Page->SaleValue->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_SaleValue" class="view_pharmacy_report_earning_SaleValue">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SaleValue->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" class="<?= $Page->PurRate->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_PurRate" class="view_pharmacy_report_earning_PurRate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PurchaseCostValue1->Visible) { // PurchaseCostValue1 ?>
        <td data-name="PurchaseCostValue1" class="<?= $Page->PurchaseCostValue1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_PurchaseCostValue1" class="view_pharmacy_report_earning_PurchaseCostValue1">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->PurchaseCostValue1->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->MarginAmount1->Visible) { // MarginAmount1 ?>
        <td data-name="MarginAmount1" class="<?= $Page->MarginAmount1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_MarginAmount1" class="view_pharmacy_report_earning_MarginAmount1">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->MarginAmount1->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->MarginOnSale1->Visible) { // MarginOnSale1 ?>
        <td data-name="MarginOnSale1" class="<?= $Page->MarginOnSale1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_MarginOnSale1" class="view_pharmacy_report_earning_MarginOnSale1">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->MarginOnSale1->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->MarginOnCost1->Visible) { // MarginOnCost1 ?>
        <td data-name="MarginOnCost1" class="<?= $Page->MarginOnCost1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_MarginOnCost1" class="view_pharmacy_report_earning_MarginOnCost1">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->MarginOnCost1->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date" class="<?= $Page->Date->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_Date" class="view_pharmacy_report_earning_Date">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" class="<?= $Page->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_BRCODE" class="view_pharmacy_report_earning_BRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" class="<?= $Page->HosoID->footerCellClass() ?>"><span id="elf_view_pharmacy_report_earning_HosoID" class="view_pharmacy_report_earning_HosoID">
        &nbsp;
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
    ew.addEventHandlers("view_pharmacy_report_earning");
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
        container: "gmp_view_pharmacy_report_earning",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

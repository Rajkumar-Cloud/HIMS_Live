<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacySalesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_saleslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_saleslist = currentForm = new ew.Form("fview_pharmacy_saleslist", "list");
    fview_pharmacy_saleslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_saleslist");
});
var fview_pharmacy_saleslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_saleslistsrch = currentSearchForm = new ew.Form("fview_pharmacy_saleslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_sales")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_saleslistsrch.addFields([
        ["BillDate", [ew.Validators.datetime(7)], fields.BillDate.isInvalid],
        ["y_BillDate", [ew.Validators.between], false],
        ["BILLNO", [], fields.BILLNO.isInvalid],
        ["Product", [], fields.Product.isInvalid],
        ["HSN", [], fields.HSN.isInvalid],
        ["OPNO", [], fields.OPNO.isInvalid],
        ["SalRate", [], fields.SalRate.isInvalid],
        ["IQ", [], fields.IQ.isInvalid],
        ["DAMT", [], fields.DAMT.isInvalid],
        ["Taxable", [], fields.Taxable.isInvalid],
        ["SSGST", [], fields.SSGST.isInvalid],
        ["SCGST", [], fields.SCGST.isInvalid],
        ["SSGSTAmount", [], fields.SSGSTAmount.isInvalid],
        ["SCGSTAmount", [], fields.SCGSTAmount.isInvalid],
        ["HosoID", [], fields.HosoID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_saleslistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_saleslistsrch.validate = function () {
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
    fview_pharmacy_saleslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_saleslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_saleslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_saleslistsrch");
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
<form name="fview_pharmacy_saleslistsrch" id="fview_pharmacy_saleslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_saleslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_sales">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_BillDate" class="ew-cell form-group">
        <label for="x_BillDate" class="ew-search-caption ew-label"><?= $Page->BillDate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_BillDate" id="z_BillDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->BillDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->BillDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->BillDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->BillDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->BillDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_sales_BillDate" class="ew-search-field">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="x_BillDate" id="x_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_saleslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_saleslistsrch", "x_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_sales_BillDate" class="ew-search-field2 d-none">
<input type="<?= $Page->BillDate->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_BillDate" data-format="7" name="y_BillDate" id="y_BillDate" placeholder="<?= HtmlEncode($Page->BillDate->getPlaceHolder()) ?>" value="<?= $Page->BillDate->EditValue2 ?>"<?= $Page->BillDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillDate->getErrorMessage(false) ?></div>
<?php if (!$Page->BillDate->ReadOnly && !$Page->BillDate->Disabled && !isset($Page->BillDate->EditAttrs["readonly"]) && !isset($Page->BillDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_saleslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_saleslistsrch", "y_BillDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Product" class="ew-cell form-group">
        <label for="x_Product" class="ew-search-caption ew-label"><?= $Page->Product->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Product" id="z_Product" value="LIKE">
</span>
        <span id="el_view_pharmacy_sales_Product" class="ew-search-field">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_OPNO" class="ew-cell form-group">
        <label for="x_OPNO" class="ew-search-caption ew-label"><?= $Page->OPNO->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OPNO" id="z_OPNO" value="LIKE">
</span>
        <span id="el_view_pharmacy_sales_OPNO" class="ew-search-field">
<input type="<?= $Page->OPNO->getInputTextType() ?>" data-table="view_pharmacy_sales" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OPNO->getPlaceHolder()) ?>" value="<?= $Page->OPNO->EditValue ?>"<?= $Page->OPNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OPNO->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_sales">
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
<form name="fview_pharmacy_saleslist" id="fview_pharmacy_saleslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_sales">
<div id="gmp_view_pharmacy_sales" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_saleslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <th data-name="BILLNO" class="<?= $Page->BILLNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_BILLNO" class="view_pharmacy_sales_BILLNO"><?= $Page->renderSort($Page->BILLNO) ?></div></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Page->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product"><?= $Page->renderSort($Page->Product) ?></div></th>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <th data-name="HSN" class="<?= $Page->HSN->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN"><?= $Page->renderSort($Page->HSN) ?></div></th>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <th data-name="OPNO" class="<?= $Page->OPNO->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO"><?= $Page->renderSort($Page->OPNO) ?></div></th>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <th data-name="SalRate" class="<?= $Page->SalRate->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate"><?= $Page->renderSort($Page->SalRate) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <th data-name="DAMT" class="<?= $Page->DAMT->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT"><?= $Page->renderSort($Page->DAMT) ?></div></th>
<?php } ?>
<?php if ($Page->Taxable->Visible) { // Taxable ?>
        <th data-name="Taxable" class="<?= $Page->Taxable->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_Taxable" class="view_pharmacy_sales_Taxable"><?= $Page->renderSort($Page->Taxable) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SSGSTAmount->Visible) { // SSGSTAmount ?>
        <th data-name="SSGSTAmount" class="<?= $Page->SSGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount"><?= $Page->renderSort($Page->SSGSTAmount) ?></div></th>
<?php } ?>
<?php if ($Page->SCGSTAmount->Visible) { // SCGSTAmount ?>
        <th data-name="SCGSTAmount" class="<?= $Page->SCGSTAmount->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount"><?= $Page->renderSort($Page->SCGSTAmount) ?></div></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Page->HosoID->headerCellClass() ?>"><div id="elh_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID"><?= $Page->renderSort($Page->HosoID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_sales", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_BILLNO">
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSN->Visible) { // HSN ?>
        <td data-name="HSN" <?= $Page->HSN->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_HSN">
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OPNO->Visible) { // OPNO ?>
        <td data-name="OPNO" <?= $Page->OPNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_OPNO">
<span<?= $Page->OPNO->viewAttributes() ?>>
<?= $Page->OPNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" <?= $Page->SalRate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SalRate">
<span<?= $Page->SalRate->viewAttributes() ?>>
<?= $Page->SalRate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT" <?= $Page->DAMT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_DAMT">
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Taxable->Visible) { // Taxable ?>
        <td data-name="Taxable" <?= $Page->Taxable->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_Taxable">
<span<?= $Page->Taxable->viewAttributes() ?>>
<?= $Page->Taxable->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGSTAmount->Visible) { // SSGSTAmount ?>
        <td data-name="SSGSTAmount" <?= $Page->SSGSTAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SSGSTAmount">
<span<?= $Page->SSGSTAmount->viewAttributes() ?>>
<?= $Page->SSGSTAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGSTAmount->Visible) { // SCGSTAmount ?>
        <td data-name="SCGSTAmount" <?= $Page->SCGSTAmount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_SCGSTAmount">
<span<?= $Page->SCGSTAmount->viewAttributes() ?>>
<?= $Page->SCGSTAmount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_sales_HosoID">
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
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" class="<?= $Page->BillDate->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_BillDate" class="view_pharmacy_sales_BillDate">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <td data-name="BILLNO" class="<?= $Page->BILLNO->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_BILLNO" class="view_pharmacy_sales_BILLNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" class="<?= $Page->Product->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_Product" class="view_pharmacy_sales_Product">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HSN->Visible) { // HSN ?>
        <td data-name="HSN" class="<?= $Page->HSN->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_HSN" class="view_pharmacy_sales_HSN">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->OPNO->Visible) { // OPNO ?>
        <td data-name="OPNO" class="<?= $Page->OPNO->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_OPNO" class="view_pharmacy_sales_OPNO">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SalRate->Visible) { // SalRate ?>
        <td data-name="SalRate" class="<?= $Page->SalRate->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SalRate" class="view_pharmacy_sales_SalRate">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SalRate->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" class="<?= $Page->IQ->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_IQ" class="view_pharmacy_sales_IQ">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DAMT->Visible) { // DAMT ?>
        <td data-name="DAMT" class="<?= $Page->DAMT->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_DAMT" class="view_pharmacy_sales_DAMT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Taxable->Visible) { // Taxable ?>
        <td data-name="Taxable" class="<?= $Page->Taxable->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_Taxable" class="view_pharmacy_sales_Taxable">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" class="<?= $Page->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SSGST" class="view_pharmacy_sales_SSGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" class="<?= $Page->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SCGST" class="view_pharmacy_sales_SCGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SSGSTAmount->Visible) { // SSGSTAmount ?>
        <td data-name="SSGSTAmount" class="<?= $Page->SSGSTAmount->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SSGSTAmount" class="view_pharmacy_sales_SSGSTAmount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SSGSTAmount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->SCGSTAmount->Visible) { // SCGSTAmount ?>
        <td data-name="SCGSTAmount" class="<?= $Page->SCGSTAmount->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_SCGSTAmount" class="view_pharmacy_sales_SCGSTAmount">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SCGSTAmount->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" class="<?= $Page->HosoID->footerCellClass() ?>"><span id="elf_view_pharmacy_sales_HosoID" class="view_pharmacy_sales_HosoID">
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
    ew.addEventHandlers("view_pharmacy_sales");
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
        container: "gmp_view_pharmacy_sales",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

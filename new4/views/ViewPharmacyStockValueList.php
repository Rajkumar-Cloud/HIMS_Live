<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyStockValueList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_stock_valuelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_stock_valuelist = currentForm = new ew.Form("fview_pharmacy_stock_valuelist", "list");
    fview_pharmacy_stock_valuelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_stock_valuelist");
});
var fview_pharmacy_stock_valuelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_stock_valuelistsrch = currentSearchForm = new ew.Form("fview_pharmacy_stock_valuelistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_stock_value")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_stock_valuelistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["DES", [], fields.DES.isInvalid],
        ["BATCH", [], fields.BATCH.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["OQ", [], fields.OQ.isInvalid],
        ["Stock", [ew.Validators.integer], fields.Stock.isInvalid],
        ["RT", [], fields.RT.isInvalid],
        ["StockValue", [], fields.StockValue.isInvalid],
        ["EXPDT", [], fields.EXPDT.isInvalid],
        ["y_EXPDT", [ew.Validators.between], false],
        ["GENNAME", [], fields.GENNAME.isInvalid],
        ["UNIT", [], fields.UNIT.isInvalid],
        ["SSGST", [], fields.SSGST.isInvalid],
        ["SCGST", [], fields.SCGST.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["BILLDATE", [], fields.BILLDATE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_stock_valuelistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_stock_valuelistsrch.validate = function () {
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
    fview_pharmacy_stock_valuelistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_stock_valuelistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_stock_valuelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_stock_valuelistsrch");
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
<form name="fview_pharmacy_stock_valuelistsrch" id="fview_pharmacy_stock_valuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_stock_valuelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_stock_value">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->DES->Visible) { // DES ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DES" class="ew-cell form-group">
        <label for="x_DES" class="ew-search-caption ew-label"><?= $Page->DES->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
        <span id="el_view_pharmacy_stock_value_DES" class="ew-search-field">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="view_pharmacy_stock_value" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PRC" class="ew-cell form-group">
        <label for="x_PRC" class="ew-search-caption ew-label"><?= $Page->PRC->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
        <span id="el_view_pharmacy_stock_value_PRC" class="ew-search-field">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_stock_value" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Stock" class="ew-cell form-group">
        <label for="x_Stock" class="ew-search-caption ew-label"><?= $Page->Stock->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_Stock" id="z_Stock" value="=">
</span>
        <span id="el_view_pharmacy_stock_value_Stock" class="ew-search-field">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_pharmacy_stock_value" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_GENNAME" class="ew-cell form-group">
        <label for="x_GENNAME" class="ew-search-caption ew-label"><?= $Page->GENNAME->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
        <span id="el_view_pharmacy_stock_value_GENNAME" class="ew-search-field">
<input type="<?= $Page->GENNAME->getInputTextType() ?>" data-table="view_pharmacy_stock_value" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" value="<?= $Page->GENNAME->EditValue ?>"<?= $Page->GENNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_stock_value">
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
<form name="fview_pharmacy_stock_valuelist" id="fview_pharmacy_stock_valuelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_stock_value">
<div id="gmp_view_pharmacy_stock_value" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_stock_valuelist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_id" class="view_pharmacy_stock_value_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <th data-name="DES" class="<?= $Page->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_DES" class="view_pharmacy_stock_value_DES"><?= $Page->renderSort($Page->DES) ?></div></th>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
        <th data-name="BATCH" class="<?= $Page->BATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_BATCH" class="view_pharmacy_stock_value_BATCH"><?= $Page->renderSort($Page->BATCH) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_PRC" class="view_pharmacy_stock_value_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th data-name="OQ" class="<?= $Page->OQ->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_OQ" class="view_pharmacy_stock_value_OQ"><?= $Page->renderSort($Page->OQ) ?></div></th>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <th data-name="Stock" class="<?= $Page->Stock->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_Stock" class="view_pharmacy_stock_value_Stock"><?= $Page->renderSort($Page->Stock) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_RT" class="view_pharmacy_stock_value_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->StockValue->Visible) { // StockValue ?>
        <th data-name="StockValue" class="<?= $Page->StockValue->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_StockValue" class="view_pharmacy_stock_value_StockValue"><?= $Page->renderSort($Page->StockValue) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_EXPDT" class="view_pharmacy_stock_value_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th data-name="GENNAME" class="<?= $Page->GENNAME->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_GENNAME" class="view_pharmacy_stock_value_GENNAME"><?= $Page->renderSort($Page->GENNAME) ?></div></th>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
        <th data-name="UNIT" class="<?= $Page->UNIT->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_UNIT" class="view_pharmacy_stock_value_UNIT"><?= $Page->renderSort($Page->UNIT) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_SSGST" class="view_pharmacy_stock_value_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_SCGST" class="view_pharmacy_stock_value_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_MFRCODE" class="view_pharmacy_stock_value_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_BRCODE" class="view_pharmacy_stock_value_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_HospID" class="view_pharmacy_stock_value_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <th data-name="BILLDATE" class="<?= $Page->BILLDATE->headerCellClass() ?>"><div id="elh_view_pharmacy_stock_value_BILLDATE" class="view_pharmacy_stock_value_BILLDATE"><?= $Page->renderSort($Page->BILLDATE) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_stock_value", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES" <?= $Page->DES->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_DES">
<span<?= $Page->DES->viewAttributes() ?>>
<?= $Page->DES->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCH->Visible) { // BATCH ?>
        <td data-name="BATCH" <?= $Page->BATCH->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_BATCH">
<span<?= $Page->BATCH->viewAttributes() ?>>
<?= $Page->BATCH->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OQ->Visible) { // OQ ?>
        <td data-name="OQ" <?= $Page->OQ->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Stock->Visible) { // Stock ?>
        <td data-name="Stock" <?= $Page->Stock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_Stock">
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->StockValue->Visible) { // StockValue ?>
        <td data-name="StockValue" <?= $Page->StockValue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_StockValue">
<span<?= $Page->StockValue->viewAttributes() ?>>
<?= $Page->StockValue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td data-name="GENNAME" <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UNIT->Visible) { // UNIT ?>
        <td data-name="UNIT" <?= $Page->UNIT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_UNIT">
<span<?= $Page->UNIT->viewAttributes() ?>>
<?= $Page->UNIT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <td data-name="BILLDATE" <?= $Page->BILLDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_stock_value_BILLDATE">
<span<?= $Page->BILLDATE->viewAttributes() ?>>
<?= $Page->BILLDATE->getViewValue() ?></span>
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
        <td data-name="id" class="<?= $Page->id->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_id" class="view_pharmacy_stock_value_id">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES" class="<?= $Page->DES->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_DES" class="view_pharmacy_stock_value_DES">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BATCH->Visible) { // BATCH ?>
        <td data-name="BATCH" class="<?= $Page->BATCH->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_BATCH" class="view_pharmacy_stock_value_BATCH">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" class="<?= $Page->PRC->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_PRC" class="view_pharmacy_stock_value_PRC">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->OQ->Visible) { // OQ ?>
        <td data-name="OQ" class="<?= $Page->OQ->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_OQ" class="view_pharmacy_stock_value_OQ">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Stock->Visible) { // Stock ?>
        <td data-name="Stock" class="<?= $Page->Stock->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_Stock" class="view_pharmacy_stock_value_Stock">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" class="<?= $Page->RT->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_RT" class="view_pharmacy_stock_value_RT">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->RT->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->StockValue->Visible) { // StockValue ?>
        <td data-name="StockValue" class="<?= $Page->StockValue->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_StockValue" class="view_pharmacy_stock_value_StockValue">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->StockValue->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" class="<?= $Page->EXPDT->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_EXPDT" class="view_pharmacy_stock_value_EXPDT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td data-name="GENNAME" class="<?= $Page->GENNAME->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_GENNAME" class="view_pharmacy_stock_value_GENNAME">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->UNIT->Visible) { // UNIT ?>
        <td data-name="UNIT" class="<?= $Page->UNIT->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_UNIT" class="view_pharmacy_stock_value_UNIT">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" class="<?= $Page->SSGST->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_SSGST" class="view_pharmacy_stock_value_SSGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" class="<?= $Page->SCGST->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_SCGST" class="view_pharmacy_stock_value_SCGST">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" class="<?= $Page->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_MFRCODE" class="view_pharmacy_stock_value_MFRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" class="<?= $Page->BRCODE->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_BRCODE" class="view_pharmacy_stock_value_BRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" class="<?= $Page->HospID->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_HospID" class="view_pharmacy_stock_value_HospID">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <td data-name="BILLDATE" class="<?= $Page->BILLDATE->footerCellClass() ?>"><span id="elf_view_pharmacy_stock_value_BILLDATE" class="view_pharmacy_stock_value_BILLDATE">
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
    ew.addEventHandlers("view_pharmacy_stock_value");
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
        container: "gmp_view_pharmacy_stock_value",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyReportStockValueList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_report_stock_valuelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_report_stock_valuelist = currentForm = new ew.Form("fview_pharmacy_report_stock_valuelist", "list");
    fview_pharmacy_report_stock_valuelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_report_stock_valuelist");
});
var fview_pharmacy_report_stock_valuelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_report_stock_valuelistsrch = currentSearchForm = new ew.Form("fview_pharmacy_report_stock_valuelistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_report_stock_value")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_report_stock_valuelistsrch.addFields([
        ["PRC", [], fields.PRC.isInvalid],
        ["DES", [], fields.DES.isInvalid],
        ["Batch", [], fields.Batch.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["stock", [ew.Validators.integer], fields.stock.isInvalid],
        ["y_stock", [ew.Validators.between], false],
        ["Mrp", [], fields.Mrp.isInvalid],
        ["PurValue1", [], fields.PurValue1.isInvalid],
        ["ssgst", [], fields.ssgst.isInvalid],
        ["scgst", [], fields.scgst.isInvalid],
        ["stockvalue1", [], fields.stockvalue1.isInvalid],
        ["PUnit", [], fields.PUnit.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_report_stock_valuelistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_report_stock_valuelistsrch.validate = function () {
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
    fview_pharmacy_report_stock_valuelistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_report_stock_valuelistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_report_stock_valuelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_report_stock_valuelistsrch");
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
<form name="fview_pharmacy_report_stock_valuelistsrch" id="fview_pharmacy_report_stock_valuelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_report_stock_valuelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_report_stock_value">
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
        <span id="el_view_pharmacy_report_stock_value_DES" class="ew-search-field">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="view_pharmacy_report_stock_value" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->stock->Visible) { // stock ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_stock" class="ew-cell form-group">
        <label for="x_stock" class="ew-search-caption ew-label"><?= $Page->stock->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_stock" id="z_stock" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->stock->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->stock->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->stock->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->stock->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->stock->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->stock->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->stock->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->stock->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->stock->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_report_stock_value_stock" class="ew-search-field">
<input type="<?= $Page->stock->getInputTextType() ?>" data-table="view_pharmacy_report_stock_value" data-field="x_stock" name="x_stock" id="x_stock" size="30" placeholder="<?= HtmlEncode($Page->stock->getPlaceHolder()) ?>" value="<?= $Page->stock->EditValue ?>"<?= $Page->stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->stock->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_report_stock_value_stock" class="ew-search-field2 d-none">
<input type="<?= $Page->stock->getInputTextType() ?>" data-table="view_pharmacy_report_stock_value" data-field="x_stock" name="y_stock" id="y_stock" size="30" placeholder="<?= HtmlEncode($Page->stock->getPlaceHolder()) ?>" value="<?= $Page->stock->EditValue2 ?>"<?= $Page->stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->stock->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_report_stock_value">
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
<form name="fview_pharmacy_report_stock_valuelist" id="fview_pharmacy_report_stock_valuelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_report_stock_value">
<div id="gmp_view_pharmacy_report_stock_value" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_report_stock_valuelist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_PRC" class="view_pharmacy_report_stock_value_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <th data-name="DES" class="<?= $Page->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_DES" class="view_pharmacy_report_stock_value_DES"><?= $Page->renderSort($Page->DES) ?></div></th>
<?php } ?>
<?php if ($Page->Batch->Visible) { // Batch ?>
        <th data-name="Batch" class="<?= $Page->Batch->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_Batch" class="view_pharmacy_report_stock_value_Batch"><?= $Page->renderSort($Page->Batch) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_MFRCODE" class="view_pharmacy_report_stock_value_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->stock->Visible) { // stock ?>
        <th data-name="stock" class="<?= $Page->stock->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_stock" class="view_pharmacy_report_stock_value_stock"><?= $Page->renderSort($Page->stock) ?></div></th>
<?php } ?>
<?php if ($Page->Mrp->Visible) { // Mrp ?>
        <th data-name="Mrp" class="<?= $Page->Mrp->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_Mrp" class="view_pharmacy_report_stock_value_Mrp"><?= $Page->renderSort($Page->Mrp) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue1->Visible) { // PurValue1 ?>
        <th data-name="PurValue1" class="<?= $Page->PurValue1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_PurValue1" class="view_pharmacy_report_stock_value_PurValue1"><?= $Page->renderSort($Page->PurValue1) ?></div></th>
<?php } ?>
<?php if ($Page->ssgst->Visible) { // ssgst ?>
        <th data-name="ssgst" class="<?= $Page->ssgst->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_ssgst" class="view_pharmacy_report_stock_value_ssgst"><?= $Page->renderSort($Page->ssgst) ?></div></th>
<?php } ?>
<?php if ($Page->scgst->Visible) { // scgst ?>
        <th data-name="scgst" class="<?= $Page->scgst->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_scgst" class="view_pharmacy_report_stock_value_scgst"><?= $Page->renderSort($Page->scgst) ?></div></th>
<?php } ?>
<?php if ($Page->stockvalue1->Visible) { // stockvalue1 ?>
        <th data-name="stockvalue1" class="<?= $Page->stockvalue1->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_stockvalue1" class="view_pharmacy_report_stock_value_stockvalue1"><?= $Page->renderSort($Page->stockvalue1) ?></div></th>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <th data-name="PUnit" class="<?= $Page->PUnit->headerCellClass() ?>"><div id="elh_view_pharmacy_report_stock_value_PUnit" class="view_pharmacy_report_stock_value_PUnit"><?= $Page->renderSort($Page->PUnit) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_report_stock_value", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES" <?= $Page->DES->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_DES">
<span<?= $Page->DES->viewAttributes() ?>>
<?= $Page->DES->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Batch->Visible) { // Batch ?>
        <td data-name="Batch" <?= $Page->Batch->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_Batch">
<span<?= $Page->Batch->viewAttributes() ?>>
<?= $Page->Batch->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->stock->Visible) { // stock ?>
        <td data-name="stock" <?= $Page->stock->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_stock">
<span<?= $Page->stock->viewAttributes() ?>>
<?= $Page->stock->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Mrp->Visible) { // Mrp ?>
        <td data-name="Mrp" <?= $Page->Mrp->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_Mrp">
<span<?= $Page->Mrp->viewAttributes() ?>>
<?= $Page->Mrp->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PurValue1->Visible) { // PurValue1 ?>
        <td data-name="PurValue1" <?= $Page->PurValue1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_PurValue1">
<span<?= $Page->PurValue1->viewAttributes() ?>>
<?= $Page->PurValue1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ssgst->Visible) { // ssgst ?>
        <td data-name="ssgst" <?= $Page->ssgst->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_ssgst">
<span<?= $Page->ssgst->viewAttributes() ?>>
<?= $Page->ssgst->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->scgst->Visible) { // scgst ?>
        <td data-name="scgst" <?= $Page->scgst->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_scgst">
<span<?= $Page->scgst->viewAttributes() ?>>
<?= $Page->scgst->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->stockvalue1->Visible) { // stockvalue1 ?>
        <td data-name="stockvalue1" <?= $Page->stockvalue1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_stockvalue1">
<span<?= $Page->stockvalue1->viewAttributes() ?>>
<?= $Page->stockvalue1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_report_stock_value_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
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
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" class="<?= $Page->PRC->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_PRC" class="view_pharmacy_report_stock_value_PRC">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES" class="<?= $Page->DES->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_DES" class="view_pharmacy_report_stock_value_DES">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Batch->Visible) { // Batch ?>
        <td data-name="Batch" class="<?= $Page->Batch->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_Batch" class="view_pharmacy_report_stock_value_Batch">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" class="<?= $Page->MFRCODE->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_MFRCODE" class="view_pharmacy_report_stock_value_MFRCODE">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->stock->Visible) { // stock ?>
        <td data-name="stock" class="<?= $Page->stock->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_stock" class="view_pharmacy_report_stock_value_stock">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->Mrp->Visible) { // Mrp ?>
        <td data-name="Mrp" class="<?= $Page->Mrp->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_Mrp" class="view_pharmacy_report_stock_value_Mrp">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->PurValue1->Visible) { // PurValue1 ?>
        <td data-name="PurValue1" class="<?= $Page->PurValue1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_PurValue1" class="view_pharmacy_report_stock_value_PurValue1">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->PurValue1->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->ssgst->Visible) { // ssgst ?>
        <td data-name="ssgst" class="<?= $Page->ssgst->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_ssgst" class="view_pharmacy_report_stock_value_ssgst">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->scgst->Visible) { // scgst ?>
        <td data-name="scgst" class="<?= $Page->scgst->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_scgst" class="view_pharmacy_report_stock_value_scgst">
        &nbsp;
        </span></td>
    <?php } ?>
    <?php if ($Page->stockvalue1->Visible) { // stockvalue1 ?>
        <td data-name="stockvalue1" class="<?= $Page->stockvalue1->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_stockvalue1" class="view_pharmacy_report_stock_value_stockvalue1">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->stockvalue1->ViewValue ?></span>
        </span></td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" class="<?= $Page->PUnit->footerCellClass() ?>"><span id="elf_view_pharmacy_report_stock_value_PUnit" class="view_pharmacy_report_stock_value_PUnit">
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
    ew.addEventHandlers("view_pharmacy_report_stock_value");
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
        container: "gmp_view_pharmacy_report_stock_value",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyLastSaleList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_last_salelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_last_salelist = currentForm = new ew.Form("fview_pharmacy_last_salelist", "list");
    fview_pharmacy_last_salelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_pharmacy_last_salelist");
});
var fview_pharmacy_last_salelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_last_salelistsrch = currentSearchForm = new ew.Form("fview_pharmacy_last_salelistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_last_sale")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_last_salelistsrch.addFields([
        ["LastSaleBILLDT", [ew.Validators.datetime(0)], fields.LastSaleBILLDT.isInvalid],
        ["y_LastSaleBILLDT", [ew.Validators.between], false],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["prc", [], fields.prc.isInvalid],
        ["BATCHNO", [], fields.BATCHNO.isInvalid],
        ["expdt", [ew.Validators.datetime(0)], fields.expdt.isInvalid],
        ["y_expdt", [ew.Validators.between], false],
        ["Product", [], fields.Product.isInvalid],
        ["mfg", [], fields.mfg.isInvalid],
        ["HospID", [], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_last_salelistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_last_salelistsrch.validate = function () {
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
    fview_pharmacy_last_salelistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_last_salelistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_last_salelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_last_salelistsrch");
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
<form name="fview_pharmacy_last_salelistsrch" id="fview_pharmacy_last_salelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_last_salelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_last_sale">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->LastSaleBILLDT->Visible) { // LastSaleBILLDT ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_LastSaleBILLDT" class="ew-cell form-group">
        <label for="x_LastSaleBILLDT" class="ew-search-caption ew-label"><?= $Page->LastSaleBILLDT->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_LastSaleBILLDT" id="z_LastSaleBILLDT" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->LastSaleBILLDT->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_last_sale_LastSaleBILLDT" class="ew-search-field">
<input type="<?= $Page->LastSaleBILLDT->getInputTextType() ?>" data-table="view_pharmacy_last_sale" data-field="x_LastSaleBILLDT" name="x_LastSaleBILLDT" id="x_LastSaleBILLDT" placeholder="<?= HtmlEncode($Page->LastSaleBILLDT->getPlaceHolder()) ?>" value="<?= $Page->LastSaleBILLDT->EditValue ?>"<?= $Page->LastSaleBILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LastSaleBILLDT->getErrorMessage(false) ?></div>
<?php if (!$Page->LastSaleBILLDT->ReadOnly && !$Page->LastSaleBILLDT->Disabled && !isset($Page->LastSaleBILLDT->EditAttrs["readonly"]) && !isset($Page->LastSaleBILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_last_salelistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_last_salelistsrch", "x_LastSaleBILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_last_sale_LastSaleBILLDT" class="ew-search-field2 d-none">
<input type="<?= $Page->LastSaleBILLDT->getInputTextType() ?>" data-table="view_pharmacy_last_sale" data-field="x_LastSaleBILLDT" name="y_LastSaleBILLDT" id="y_LastSaleBILLDT" placeholder="<?= HtmlEncode($Page->LastSaleBILLDT->getPlaceHolder()) ?>" value="<?= $Page->LastSaleBILLDT->EditValue2 ?>"<?= $Page->LastSaleBILLDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LastSaleBILLDT->getErrorMessage(false) ?></div>
<?php if (!$Page->LastSaleBILLDT->ReadOnly && !$Page->LastSaleBILLDT->Disabled && !isset($Page->LastSaleBILLDT->EditAttrs["readonly"]) && !isset($Page->LastSaleBILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_last_salelistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_last_salelistsrch", "y_LastSaleBILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->prc->Visible) { // prc ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_prc" class="ew-cell form-group">
        <label for="x_prc" class="ew-search-caption ew-label"><?= $Page->prc->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_prc" id="z_prc" value="LIKE">
</span>
        <span id="el_view_pharmacy_last_sale_prc" class="ew-search-field">
<input type="<?= $Page->prc->getInputTextType() ?>" data-table="view_pharmacy_last_sale" data-field="x_prc" name="x_prc" id="x_prc" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->prc->getPlaceHolder()) ?>" value="<?= $Page->prc->EditValue ?>"<?= $Page->prc->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->prc->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->expdt->Visible) { // expdt ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_expdt" class="ew-cell form-group">
        <label for="x_expdt" class="ew-search-caption ew-label"><?= $Page->expdt->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_expdt" id="z_expdt" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->expdt->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->expdt->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->expdt->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->expdt->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->expdt->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->expdt->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->expdt->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->expdt->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->expdt->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_last_sale_expdt" class="ew-search-field">
<input type="<?= $Page->expdt->getInputTextType() ?>" data-table="view_pharmacy_last_sale" data-field="x_expdt" name="x_expdt" id="x_expdt" placeholder="<?= HtmlEncode($Page->expdt->getPlaceHolder()) ?>" value="<?= $Page->expdt->EditValue ?>"<?= $Page->expdt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->expdt->getErrorMessage(false) ?></div>
<?php if (!$Page->expdt->ReadOnly && !$Page->expdt->Disabled && !isset($Page->expdt->EditAttrs["readonly"]) && !isset($Page->expdt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_last_salelistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_last_salelistsrch", "x_expdt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_last_sale_expdt" class="ew-search-field2 d-none">
<input type="<?= $Page->expdt->getInputTextType() ?>" data-table="view_pharmacy_last_sale" data-field="x_expdt" name="y_expdt" id="y_expdt" placeholder="<?= HtmlEncode($Page->expdt->getPlaceHolder()) ?>" value="<?= $Page->expdt->EditValue2 ?>"<?= $Page->expdt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->expdt->getErrorMessage(false) ?></div>
<?php if (!$Page->expdt->ReadOnly && !$Page->expdt->Disabled && !isset($Page->expdt->EditAttrs["readonly"]) && !isset($Page->expdt->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_last_salelistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_last_salelistsrch", "y_expdt", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
        <span id="el_view_pharmacy_last_sale_Product" class="ew-search-field">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="view_pharmacy_last_sale" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_last_sale">
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
<form name="fview_pharmacy_last_salelist" id="fview_pharmacy_last_salelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_last_sale">
<div id="gmp_view_pharmacy_last_sale" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_last_salelist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->LastSaleBILLDT->Visible) { // LastSaleBILLDT ?>
        <th data-name="LastSaleBILLDT" class="<?= $Page->LastSaleBILLDT->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_LastSaleBILLDT" class="view_pharmacy_last_sale_LastSaleBILLDT"><?= $Page->renderSort($Page->LastSaleBILLDT) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_BRCODE" class="view_pharmacy_last_sale_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->prc->Visible) { // prc ?>
        <th data-name="prc" class="<?= $Page->prc->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_prc" class="view_pharmacy_last_sale_prc"><?= $Page->renderSort($Page->prc) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_BATCHNO" class="view_pharmacy_last_sale_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->expdt->Visible) { // expdt ?>
        <th data-name="expdt" class="<?= $Page->expdt->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_expdt" class="view_pharmacy_last_sale_expdt"><?= $Page->renderSort($Page->expdt) ?></div></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Page->Product->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_Product" class="view_pharmacy_last_sale_Product"><?= $Page->renderSort($Page->Product) ?></div></th>
<?php } ?>
<?php if ($Page->mfg->Visible) { // mfg ?>
        <th data-name="mfg" class="<?= $Page->mfg->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_mfg" class="view_pharmacy_last_sale_mfg"><?= $Page->renderSort($Page->mfg) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_pharmacy_last_sale_HospID" class="view_pharmacy_last_sale_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_last_sale", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->LastSaleBILLDT->Visible) { // LastSaleBILLDT ?>
        <td data-name="LastSaleBILLDT" <?= $Page->LastSaleBILLDT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_last_sale_LastSaleBILLDT">
<span<?= $Page->LastSaleBILLDT->viewAttributes() ?>>
<?= $Page->LastSaleBILLDT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_last_sale_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->prc->Visible) { // prc ?>
        <td data-name="prc" <?= $Page->prc->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_last_sale_prc">
<span<?= $Page->prc->viewAttributes() ?>>
<?= $Page->prc->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_last_sale_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->expdt->Visible) { // expdt ?>
        <td data-name="expdt" <?= $Page->expdt->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_last_sale_expdt">
<span<?= $Page->expdt->viewAttributes() ?>>
<?= $Page->expdt->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_last_sale_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->mfg->Visible) { // mfg ?>
        <td data-name="mfg" <?= $Page->mfg->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_last_sale_mfg">
<span<?= $Page->mfg->viewAttributes() ?>>
<?= $Page->mfg->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_last_sale_HospID">
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
    ew.addEventHandlers("view_pharmacy_last_sale");
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
        container: "gmp_view_pharmacy_last_sale",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

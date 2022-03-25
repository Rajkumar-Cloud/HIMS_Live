<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewItemReceivedItemsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_item_received_itemslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_item_received_itemslist = currentForm = new ew.Form("fview_item_received_itemslist", "list");
    fview_item_received_itemslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_item_received_itemslist");
});
var fview_item_received_itemslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_item_received_itemslistsrch = currentSearchForm = new ew.Form("fview_item_received_itemslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_item_received_items")) ?>,
        fields = currentTable.fields;
    fview_item_received_itemslistsrch.addFields([
        ["Received", [], fields.Received.isInvalid],
        ["y_Received", [ew.Validators.between], false],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["PrName", [], fields.PrName.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["BatchNo", [], fields.BatchNo.isInvalid],
        ["BillDate", [], fields.BillDate.isInvalid],
        ["ExpDate", [], fields.ExpDate.isInvalid],
        ["Quantity", [ew.Validators.integer], fields.Quantity.isInvalid],
        ["y_Quantity", [ew.Validators.between], false],
        ["FreeQty", [], fields.FreeQty.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_item_received_itemslistsrch.setInvalid();
    });

    // Validate form
    fview_item_received_itemslistsrch.validate = function () {
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
    fview_item_received_itemslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_item_received_itemslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_item_received_itemslistsrch.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;

    // Filters
    fview_item_received_itemslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_item_received_itemslistsrch");
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
<form name="fview_item_received_itemslistsrch" id="fview_item_received_itemslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_item_received_itemslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_item_received_items">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Received->Visible) { // Received ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Received" class="ew-cell form-group">
        <label for="x_Received" class="ew-search-caption ew-label"><?= $Page->Received->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_Received" id="z_Received" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Received->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Received->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Received->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Received->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Received->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Received->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="LIKE"<?= $Page->Received->AdvancedSearch->SearchOperator == "LIKE" ? " selected" : "" ?>><?= $Language->phrase("LIKE") ?></option>
<option value="NOT LIKE"<?= $Page->Received->AdvancedSearch->SearchOperator == "NOT LIKE" ? " selected" : "" ?>><?= $Language->phrase("NOT LIKE") ?></option>
<option value="STARTS WITH"<?= $Page->Received->AdvancedSearch->SearchOperator == "STARTS WITH" ? " selected" : "" ?>><?= $Language->phrase("STARTS WITH") ?></option>
<option value="ENDS WITH"<?= $Page->Received->AdvancedSearch->SearchOperator == "ENDS WITH" ? " selected" : "" ?>><?= $Language->phrase("ENDS WITH") ?></option>
<option value="IS NULL"<?= $Page->Received->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Received->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Received->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_item_received_items_Received" class="ew-search-field">
<input type="<?= $Page->Received->getInputTextType() ?>" data-table="view_item_received_items" data-field="x_Received" name="x_Received" id="x_Received" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Received->getPlaceHolder()) ?>" value="<?= $Page->Received->EditValue ?>"<?= $Page->Received->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_item_received_items_Received" class="ew-search-field2 d-none">
<input type="<?= $Page->Received->getInputTextType() ?>" data-table="view_item_received_items" data-field="x_Received" name="y_Received" id="y_Received" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Received->getPlaceHolder()) ?>" value="<?= $Page->Received->EditValue2 ?>"<?= $Page->Received->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Received->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_BRCODE" class="ew-cell form-group">
        <label for="x_BRCODE" class="ew-search-caption ew-label"><?= $Page->BRCODE->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
        <span id="el_view_item_received_items_BRCODE" class="ew-search-field">
    <select
        id="x_BRCODE"
        name="x_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="view_item_received_items_x_BRCODE"
        data-table="view_item_received_items"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x_BRCODE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage(false) ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_item_received_items_x_BRCODE']"),
        options = { name: "x_BRCODE", selectId: "view_item_received_items_x_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_item_received_items.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
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
        <span id="el_view_item_received_items_PRC" class="ew-search-field">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_item_received_items" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PrName" class="ew-cell form-group">
        <label for="x_PrName" class="ew-search-caption ew-label"><?= $Page->PrName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
        <span id="el_view_item_received_items_PrName" class="ew-search-field">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="view_item_received_items" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Quantity" class="ew-cell form-group">
        <label for="x_Quantity" class="ew-search-caption ew-label"><?= $Page->Quantity->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_Quantity" id="z_Quantity" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Quantity->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Quantity->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Quantity->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Quantity->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Quantity->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Quantity->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->Quantity->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Quantity->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Quantity->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_item_received_items_Quantity" class="ew-search-field">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_item_received_items" data-field="x_Quantity" name="x_Quantity" id="x_Quantity" size="30" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_item_received_items_Quantity" class="ew-search-field2 d-none">
<input type="<?= $Page->Quantity->getInputTextType() ?>" data-table="view_item_received_items" data-field="x_Quantity" name="y_Quantity" id="y_Quantity" size="30" placeholder="<?= HtmlEncode($Page->Quantity->getPlaceHolder()) ?>" value="<?= $Page->Quantity->EditValue2 ?>"<?= $Page->Quantity->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Quantity->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_item_received_items">
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
<form name="fview_item_received_itemslist" id="fview_item_received_itemslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_item_received_items">
<div id="gmp_view_item_received_items" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_item_received_itemslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Received->Visible) { // Received ?>
        <th data-name="Received" class="<?= $Page->Received->headerCellClass() ?>"><div id="elh_view_item_received_items_Received" class="view_item_received_items_Received"><?= $Page->renderSort($Page->Received) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_item_received_items_BRCODE" class="view_item_received_items_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_item_received_items_PRC" class="view_item_received_items_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_view_item_received_items_PrName" class="view_item_received_items_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_item_received_items_MFRCODE" class="view_item_received_items_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <th data-name="BatchNo" class="<?= $Page->BatchNo->headerCellClass() ?>"><div id="elh_view_item_received_items_BatchNo" class="view_item_received_items_BatchNo"><?= $Page->renderSort($Page->BatchNo) ?></div></th>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_item_received_items_BillDate" class="view_item_received_items_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <th data-name="ExpDate" class="<?= $Page->ExpDate->headerCellClass() ?>"><div id="elh_view_item_received_items_ExpDate" class="view_item_received_items_ExpDate"><?= $Page->renderSort($Page->ExpDate) ?></div></th>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <th data-name="Quantity" class="<?= $Page->Quantity->headerCellClass() ?>"><div id="elh_view_item_received_items_Quantity" class="view_item_received_items_Quantity"><?= $Page->renderSort($Page->Quantity) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <th data-name="FreeQty" class="<?= $Page->FreeQty->headerCellClass() ?>"><div id="elh_view_item_received_items_FreeQty" class="view_item_received_items_FreeQty"><?= $Page->renderSort($Page->FreeQty) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_item_received_items", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->Received->Visible) { // Received ?>
        <td data-name="Received" <?= $Page->Received->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_Received">
<span<?= $Page->Received->viewAttributes() ?>>
<?= $Page->Received->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <td data-name="BatchNo" <?= $Page->BatchNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_BatchNo">
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <td data-name="ExpDate" <?= $Page->ExpDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_ExpDate">
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Quantity->Visible) { // Quantity ?>
        <td data-name="Quantity" <?= $Page->Quantity->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_Quantity">
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" <?= $Page->FreeQty->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_item_received_items_FreeQty">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
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
    ew.addEventHandlers("view_item_received_items");
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
        container: "gmp_view_item_received_items",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

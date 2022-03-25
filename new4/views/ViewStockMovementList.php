<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewStockMovementList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_stock_movementlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_stock_movementlist = currentForm = new ew.Form("fview_stock_movementlist", "list");
    fview_stock_movementlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_stock_movementlist");
});
var fview_stock_movementlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_stock_movementlistsrch = currentSearchForm = new ew.Form("fview_stock_movementlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_stock_movement")) ?>,
        fields = currentTable.fields;
    fview_stock_movementlistsrch.addFields([
        ["prc", [], fields.prc.isInvalid],
        ["Product", [], fields.Product.isInvalid],
        ["BATCHNO", [], fields.BATCHNO.isInvalid],
        ["IQ", [], fields.IQ.isInvalid],
        ["GrnQuantity", [], fields.GrnQuantity.isInvalid],
        ["FreeQty", [], fields.FreeQty.isInvalid],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["CreatedDateTime", [], fields.CreatedDateTime.isInvalid],
        ["CreatedDate", [ew.Validators.datetime(7)], fields.CreatedDate.isInvalid],
        ["y_CreatedDate", [ew.Validators.between], false]
    ]);

    // Set invalid fields
    $(function() {
        fview_stock_movementlistsrch.setInvalid();
    });

    // Validate form
    fview_stock_movementlistsrch.validate = function () {
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
    fview_stock_movementlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_stock_movementlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_stock_movementlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_stock_movementlistsrch");
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
<form name="fview_stock_movementlistsrch" id="fview_stock_movementlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_stock_movementlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_stock_movement">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_CreatedDate" class="ew-cell form-group">
        <label for="x_CreatedDate" class="ew-search-caption ew-label"><?= $Page->CreatedDate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_CreatedDate" id="z_CreatedDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->CreatedDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_stock_movement_CreatedDate" class="ew-search-field">
<input type="<?= $Page->CreatedDate->getInputTextType() ?>" data-table="view_stock_movement" data-field="x_CreatedDate" data-format="7" name="x_CreatedDate" id="x_CreatedDate" placeholder="<?= HtmlEncode($Page->CreatedDate->getPlaceHolder()) ?>" value="<?= $Page->CreatedDate->EditValue ?>"<?= $Page->CreatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CreatedDate->ReadOnly && !$Page->CreatedDate->Disabled && !isset($Page->CreatedDate->EditAttrs["readonly"]) && !isset($Page->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_stock_movementlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_stock_movementlistsrch", "x_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_stock_movement_CreatedDate" class="ew-search-field2 d-none">
<input type="<?= $Page->CreatedDate->getInputTextType() ?>" data-table="view_stock_movement" data-field="x_CreatedDate" data-format="7" name="y_CreatedDate" id="y_CreatedDate" placeholder="<?= HtmlEncode($Page->CreatedDate->getPlaceHolder()) ?>" value="<?= $Page->CreatedDate->EditValue2 ?>"<?= $Page->CreatedDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CreatedDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CreatedDate->ReadOnly && !$Page->CreatedDate->Disabled && !isset($Page->CreatedDate->EditAttrs["readonly"]) && !isset($Page->CreatedDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_stock_movementlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_stock_movementlistsrch", "y_CreatedDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_stock_movement">
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
<form name="fview_stock_movementlist" id="fview_stock_movementlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_stock_movement">
<div id="gmp_view_stock_movement" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_stock_movementlist" class="table ew-table d-none"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left", "", "block", $Page->TableVar, "view_stock_movementlist");
?>
<?php if ($Page->prc->Visible) { // prc ?>
        <th data-name="prc" class="<?= $Page->prc->headerCellClass() ?>"><div id="elh_view_stock_movement_prc" class="view_stock_movement_prc"><?= $Page->renderSort($Page->prc) ?></div></th>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <th data-name="Product" class="<?= $Page->Product->headerCellClass() ?>"><div id="elh_view_stock_movement_Product" class="view_stock_movement_Product"><?= $Page->renderSort($Page->Product) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_view_stock_movement_BATCHNO" class="view_stock_movement_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_view_stock_movement_IQ" class="view_stock_movement_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <th data-name="GrnQuantity" class="<?= $Page->GrnQuantity->headerCellClass() ?>"><div id="elh_view_stock_movement_GrnQuantity" class="view_stock_movement_GrnQuantity"><?= $Page->renderSort($Page->GrnQuantity) ?></div></th>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <th data-name="FreeQty" class="<?= $Page->FreeQty->headerCellClass() ?>"><div id="elh_view_stock_movement_FreeQty" class="view_stock_movement_FreeQty"><?= $Page->renderSort($Page->FreeQty) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_view_stock_movement_BRCODE" class="view_stock_movement_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_stock_movement_HospID" class="view_stock_movement_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <th data-name="CreatedDateTime" class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div id="elh_view_stock_movement_CreatedDateTime" class="view_stock_movement_CreatedDateTime"><?= $Page->renderSort($Page->CreatedDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <th data-name="CreatedDate" class="<?= $Page->CreatedDate->headerCellClass() ?>"><div id="elh_view_stock_movement_CreatedDate" class="view_stock_movement_CreatedDate"><?= $Page->renderSort($Page->CreatedDate) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right", "", "block", $Page->TableVar, "view_stock_movementlist");
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_stock_movement", "data-rowtype" => $Page->RowType]);

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
$Page->ListOptions->render("body", "left", $Page->RowCount, "block", $Page->TableVar, "view_stock_movementlist");
?>
    <?php if ($Page->prc->Visible) { // prc ?>
        <td data-name="prc" <?= $Page->prc->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_prc"><span id="el<?= $Page->RowCount ?>_view_stock_movement_prc">
<span<?= $Page->prc->viewAttributes() ?>>
<?= $Page->prc->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->Product->Visible) { // Product ?>
        <td data-name="Product" <?= $Page->Product->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_Product"><span id="el<?= $Page->RowCount ?>_view_stock_movement_Product">
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_BATCHNO"><span id="el<?= $Page->RowCount ?>_view_stock_movement_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_IQ"><span id="el<?= $Page->RowCount ?>_view_stock_movement_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <td data-name="GrnQuantity" <?= $Page->GrnQuantity->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_GrnQuantity"><span id="el<?= $Page->RowCount ?>_view_stock_movement_GrnQuantity">
<span<?= $Page->GrnQuantity->viewAttributes() ?>>
<?= $Page->GrnQuantity->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <td data-name="FreeQty" <?= $Page->FreeQty->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_FreeQty"><span id="el<?= $Page->RowCount ?>_view_stock_movement_FreeQty">
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_BRCODE"><span id="el<?= $Page->RowCount ?>_view_stock_movement_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_HospID"><span id="el<?= $Page->RowCount ?>_view_stock_movement_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <td data-name="CreatedDateTime" <?= $Page->CreatedDateTime->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_CreatedDateTime"><span id="el<?= $Page->RowCount ?>_view_stock_movement_CreatedDateTime">
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td data-name="CreatedDate" <?= $Page->CreatedDate->cellAttributes() ?>>
<template id="tpx<?= $Page->RowCount ?>_view_stock_movement_CreatedDate"><span id="el<?= $Page->RowCount ?>_view_stock_movement_CreatedDate">
<span<?= $Page->CreatedDate->viewAttributes() ?>>
<?= $Page->CreatedDate->getViewValue() ?></span>
</span></template>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount, "block", $Page->TableVar, "view_stock_movementlist");
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
<div id="tpd_view_stock_movementlist" class="ew-custom-template"></div>
<template id="tpm_view_stock_movementlist">
<div id="ct_ViewStockMovementList"><?php if ($Page->RowCount > 0) { ?>
<table  style="width:100%">
  <thead>
  </thead>
  <tbody>
<?php for ($i = $Page->StartRowCount; $i <= $Page->RowCount; $i++) { ?>
  <tr>
	</tr>
<?php } ?>
</tbody>
  <?php if ($Page->TotalRecords > 0 && !$view_stock_movement->isGridAdd() && !$view_stock_movement->isGridEdit()) { ?>
<tfoot>
  </tfoot>
<?php } ?>  
</table>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Stock Movement</h3>
	</div>
	<div class="card-body p-0">
<?php
$dbhelper = &DbHelper();
$Typpe = $view_stock_movement_list->CreatedDate->AdvancedSearch->SearchOperator; //$_GET["z_createddate"];
$fromdte = $view_stock_movement_list->CreatedDate->AdvancedSearch->SearchValue; //$_GET["z_createddate"];
$todate = $view_stock_movement_list->CreatedDate->AdvancedSearch->SearchValue2; //$_GET["x_createddate"]
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
	(int)$rowid = 0;
	(int)$CARDsum = 0;
$dataPoints = array();
?>
<?php
	 $db =& DbHelper(); // Create instance of the database helper class by DbHelper() (for main database) or DbHelper("<dbname>") (for linked databases) where <dbname> is database variable name
 ?>
 <div class="card">
	 <div class="card-body">
 <?php
 $sql = "SELECT a.prc,product,  
(CASE
	WHEN (((select sum(stock) from
ganeshkumar_bjhims.view_pharmacy_search_product where  prc = a.prc
 and brcode =  '".PharmacyID()."' and hospid = '".HospitalID()."') + sum(iq) ) - (sum(grnquantity) + sum(freeqty))) < 0 then 0
	else (((select sum(stock) from
ganeshkumar_bjhims.view_pharmacy_search_product where  prc = a.prc
 and brcode =  '".PharmacyID()."' and hospid = '".HospitalID()."') + sum(iq) ) - (sum(grnquantity) + sum(freeqty))) end)
	as OpeingStock,
	 ( sum(grnquantity) ) as GRNQuantity ,
	sum(freeqty) as FreeQuantity ,
	sum(iq) as IssueQuantity ,
 (select sum(stock) from
ganeshkumar_bjhims.view_pharmacy_search_product where  prc = a.prc
 and brcode =  '".PharmacyID()."' and hospid = '".HospitalID()."') as ClossingStock
FROM ganeshkumar_bjhims.view_stock_movement a left join
ganeshkumar_bjhims.view_pharmacy_search_product b on a.prc = b.prc where a.batchno = b.batch 
and a.brcode = b.brcode and  a.hospid = b.hospid
and a.brcode = '".PharmacyID()."' and a.hospid = '".HospitalID()."' and CreatedDate between '".$fromdte."' and '".$todate."'
group by prc,product
order by product asc
;";
 echo $db->ExecuteHtml($sql, ["fieldcaption" => TRUE, "tablename" => ["view_stock_movement", "view_pharmacy_search_product"]]); // Execute a SQL and show as HTML table
 ?>
	 </div>
 </div>
	</div>
</div>
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
    ew.applyTemplate("tpd_view_stock_movementlist", "tpm_view_stock_movementlist", "view_stock_movementlist", "<?= $Page->CustomExport ?>", ew.templateData);
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
    ew.addEventHandlers("view_stock_movement");
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
        container: "gmp_view_stock_movement",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

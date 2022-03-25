<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDonorSemenStockList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_donor_semen_stocklist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_donor_semen_stocklist = currentForm = new ew.Form("fview_donor_semen_stocklist", "list");
    fview_donor_semen_stocklist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_donor_semen_stocklist");
});
var fview_donor_semen_stocklistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_donor_semen_stocklistsrch = currentSearchForm = new ew.Form("fview_donor_semen_stocklistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_donor_semen_stock")) ?>,
        fields = currentTable.fields;
    fview_donor_semen_stocklistsrch.addFields([
        ["Agency", [], fields.Agency.isInvalid],
        ["ReceivedOn", [ew.Validators.datetime(0)], fields.ReceivedOn.isInvalid],
        ["ReceivedBy", [], fields.ReceivedBy.isInvalid],
        ["TotalCount", [], fields.TotalCount.isInvalid],
        ["Remaining", [], fields.Remaining.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_donor_semen_stocklistsrch.setInvalid();
    });

    // Validate form
    fview_donor_semen_stocklistsrch.validate = function () {
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
    fview_donor_semen_stocklistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_donor_semen_stocklistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_donor_semen_stocklistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_donor_semen_stocklistsrch");
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
<form name="fview_donor_semen_stocklistsrch" id="fview_donor_semen_stocklistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_donor_semen_stocklistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_donor_semen_stock">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Agency->Visible) { // Agency ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Agency" class="ew-cell form-group">
        <label for="x_Agency" class="ew-search-caption ew-label"><?= $Page->Agency->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Agency" id="z_Agency" value="LIKE">
</span>
        <span id="el_view_donor_semen_stock_Agency" class="ew-search-field">
<input type="<?= $Page->Agency->getInputTextType() ?>" data-table="view_donor_semen_stock" data-field="x_Agency" name="x_Agency" id="x_Agency" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Agency->getPlaceHolder()) ?>" value="<?= $Page->Agency->EditValue ?>"<?= $Page->Agency->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Agency->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ReceivedOn" class="ew-cell form-group">
        <label for="x_ReceivedOn" class="ew-search-caption ew-label"><?= $Page->ReceivedOn->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_ReceivedOn" id="z_ReceivedOn" value="=">
</span>
        <span id="el_view_donor_semen_stock_ReceivedOn" class="ew-search-field">
<input type="<?= $Page->ReceivedOn->getInputTextType() ?>" data-table="view_donor_semen_stock" data-field="x_ReceivedOn" name="x_ReceivedOn" id="x_ReceivedOn" placeholder="<?= HtmlEncode($Page->ReceivedOn->getPlaceHolder()) ?>" value="<?= $Page->ReceivedOn->EditValue ?>"<?= $Page->ReceivedOn->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedOn->getErrorMessage(false) ?></div>
<?php if (!$Page->ReceivedOn->ReadOnly && !$Page->ReceivedOn->Disabled && !isset($Page->ReceivedOn->EditAttrs["readonly"]) && !isset($Page->ReceivedOn->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_donor_semen_stocklistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_donor_semen_stocklistsrch", "x_ReceivedOn", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_ReceivedBy" class="ew-cell form-group">
        <label for="x_ReceivedBy" class="ew-search-caption ew-label"><?= $Page->ReceivedBy->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ReceivedBy" id="z_ReceivedBy" value="LIKE">
</span>
        <span id="el_view_donor_semen_stock_ReceivedBy" class="ew-search-field">
<input type="<?= $Page->ReceivedBy->getInputTextType() ?>" data-table="view_donor_semen_stock" data-field="x_ReceivedBy" name="x_ReceivedBy" id="x_ReceivedBy" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ReceivedBy->getPlaceHolder()) ?>" value="<?= $Page->ReceivedBy->EditValue ?>"<?= $Page->ReceivedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ReceivedBy->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_donor_semen_stock">
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
<form name="fview_donor_semen_stocklist" id="fview_donor_semen_stocklist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_donor_semen_stock">
<div id="gmp_view_donor_semen_stock" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_donor_semen_stocklist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Agency->Visible) { // Agency ?>
        <th data-name="Agency" class="<?= $Page->Agency->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_Agency" class="view_donor_semen_stock_Agency"><?= $Page->renderSort($Page->Agency) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
        <th data-name="ReceivedOn" class="<?= $Page->ReceivedOn->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_ReceivedOn" class="view_donor_semen_stock_ReceivedOn"><?= $Page->renderSort($Page->ReceivedOn) ?></div></th>
<?php } ?>
<?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
        <th data-name="ReceivedBy" class="<?= $Page->ReceivedBy->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_ReceivedBy" class="view_donor_semen_stock_ReceivedBy"><?= $Page->renderSort($Page->ReceivedBy) ?></div></th>
<?php } ?>
<?php if ($Page->TotalCount->Visible) { // TotalCount ?>
        <th data-name="TotalCount" class="<?= $Page->TotalCount->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_TotalCount" class="view_donor_semen_stock_TotalCount"><?= $Page->renderSort($Page->TotalCount) ?></div></th>
<?php } ?>
<?php if ($Page->Remaining->Visible) { // Remaining ?>
        <th data-name="Remaining" class="<?= $Page->Remaining->headerCellClass() ?>"><div id="elh_view_donor_semen_stock_Remaining" class="view_donor_semen_stock_Remaining"><?= $Page->renderSort($Page->Remaining) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_donor_semen_stock", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->Agency->Visible) { // Agency ?>
        <td data-name="Agency" <?= $Page->Agency->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_semen_stock_Agency">
<span<?= $Page->Agency->viewAttributes() ?>>
<?= $Page->Agency->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedOn->Visible) { // ReceivedOn ?>
        <td data-name="ReceivedOn" <?= $Page->ReceivedOn->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_semen_stock_ReceivedOn">
<span<?= $Page->ReceivedOn->viewAttributes() ?>>
<?= $Page->ReceivedOn->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ReceivedBy->Visible) { // ReceivedBy ?>
        <td data-name="ReceivedBy" <?= $Page->ReceivedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_semen_stock_ReceivedBy">
<span<?= $Page->ReceivedBy->viewAttributes() ?>>
<?= $Page->ReceivedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TotalCount->Visible) { // TotalCount ?>
        <td data-name="TotalCount" <?= $Page->TotalCount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_semen_stock_TotalCount">
<span<?= $Page->TotalCount->viewAttributes() ?>>
<?= $Page->TotalCount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Remaining->Visible) { // Remaining ?>
        <td data-name="Remaining" <?= $Page->Remaining->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_donor_semen_stock_Remaining">
<span<?= $Page->Remaining->viewAttributes() ?>>
<?= $Page->Remaining->getViewValue() ?></span>
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
    ew.addEventHandlers("view_donor_semen_stock");
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
        container: "gmp_view_donor_semen_stock",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

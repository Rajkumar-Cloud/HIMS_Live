<?php

namespace PHPMaker2021\project3;

// Page object
$IvfMasUserTemplateList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fivf_mas_user_templatelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fivf_mas_user_templatelist = currentForm = new ew.Form("fivf_mas_user_templatelist", "list");
    fivf_mas_user_templatelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fivf_mas_user_templatelist");
});
var fivf_mas_user_templatelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fivf_mas_user_templatelistsrch = currentSearchForm = new ew.Form("fivf_mas_user_templatelistsrch");

    // Dynamic selection lists

    // Filters
    fivf_mas_user_templatelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fivf_mas_user_templatelistsrch");
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
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fivf_mas_user_templatelistsrch" id="fivf_mas_user_templatelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fivf_mas_user_templatelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="ivf_mas_user_template">
    <div class="ew-extended-search">
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
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> ivf_mas_user_template">
<form name="fivf_mas_user_templatelist" id="fivf_mas_user_templatelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="ivf_mas_user_template">
<div id="gmp_ivf_mas_user_template" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_ivf_mas_user_templatelist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_id" class="ivf_mas_user_template_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <th data-name="TemplateName" class="<?= $Page->TemplateName->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_TemplateName" class="ivf_mas_user_template_TemplateName"><?= $Page->renderSort($Page->TemplateName) ?></div></th>
<?php } ?>
<?php if ($Page->TemplateType->Visible) { // TemplateType ?>
        <th data-name="TemplateType" class="<?= $Page->TemplateType->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_TemplateType" class="ivf_mas_user_template_TemplateType"><?= $Page->renderSort($Page->TemplateType) ?></div></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th data-name="created" class="<?= $Page->created->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_created" class="ivf_mas_user_template_created"><?= $Page->renderSort($Page->created) ?></div></th>
<?php } ?>
<?php if ($Page->createdDatetime->Visible) { // createdDatetime ?>
        <th data-name="createdDatetime" class="<?= $Page->createdDatetime->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_createdDatetime" class="ivf_mas_user_template_createdDatetime"><?= $Page->renderSort($Page->createdDatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modified->Visible) { // modified ?>
        <th data-name="modified" class="<?= $Page->modified->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_modified" class="ivf_mas_user_template_modified"><?= $Page->renderSort($Page->modified) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedDatetime->Visible) { // modifiedDatetime ?>
        <th data-name="modifiedDatetime" class="<?= $Page->modifiedDatetime->headerCellClass() ?>"><div id="elh_ivf_mas_user_template_modifiedDatetime" class="ivf_mas_user_template_modifiedDatetime"><?= $Page->renderSort($Page->modifiedDatetime) ?></div></th>
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
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_ivf_mas_user_template", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <td data-name="TemplateName" <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_TemplateName">
<span<?= $Page->TemplateName->viewAttributes() ?>>
<?= $Page->TemplateName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TemplateType->Visible) { // TemplateType ?>
        <td data-name="TemplateType" <?= $Page->TemplateType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_TemplateType">
<span<?= $Page->TemplateType->viewAttributes() ?>>
<?= $Page->TemplateType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->created->Visible) { // created ?>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdDatetime->Visible) { // createdDatetime ?>
        <td data-name="createdDatetime" <?= $Page->createdDatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_createdDatetime">
<span<?= $Page->createdDatetime->viewAttributes() ?>>
<?= $Page->createdDatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modified->Visible) { // modified ?>
        <td data-name="modified" <?= $Page->modified->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_modified">
<span<?= $Page->modified->viewAttributes() ?>>
<?= $Page->modified->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedDatetime->Visible) { // modifiedDatetime ?>
        <td data-name="modifiedDatetime" <?= $Page->modifiedDatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_ivf_mas_user_template_modifiedDatetime">
<span<?= $Page->modifiedDatetime->viewAttributes() ?>>
<?= $Page->modifiedDatetime->getViewValue() ?></span>
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
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl() ?>">
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
    ew.addEventHandlers("ivf_mas_user_template");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

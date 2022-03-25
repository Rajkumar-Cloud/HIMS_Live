<?php

namespace PHPMaker2021\project3;

// Page object
$LabDeptMastList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var flab_dept_mastlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    flab_dept_mastlist = currentForm = new ew.Form("flab_dept_mastlist", "list");
    flab_dept_mastlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("flab_dept_mastlist");
});
var flab_dept_mastlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    flab_dept_mastlistsrch = currentSearchForm = new ew.Form("flab_dept_mastlistsrch");

    // Dynamic selection lists

    // Filters
    flab_dept_mastlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("flab_dept_mastlistsrch");
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
<form name="flab_dept_mastlistsrch" id="flab_dept_mastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="flab_dept_mastlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="lab_dept_mast">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> lab_dept_mast">
<form name="flab_dept_mastlist" id="flab_dept_mastlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="lab_dept_mast">
<div id="gmp_lab_dept_mast" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_lab_dept_mastlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->MainCD->Visible) { // MainCD ?>
        <th data-name="MainCD" class="<?= $Page->MainCD->headerCellClass() ?>"><div id="elh_lab_dept_mast_MainCD" class="lab_dept_mast_MainCD"><?= $Page->renderSort($Page->MainCD) ?></div></th>
<?php } ?>
<?php if ($Page->Code->Visible) { // Code ?>
        <th data-name="Code" class="<?= $Page->Code->headerCellClass() ?>"><div id="elh_lab_dept_mast_Code" class="lab_dept_mast_Code"><?= $Page->renderSort($Page->Code) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_lab_dept_mast_Name" class="lab_dept_mast_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_lab_dept_mast_Order" class="lab_dept_mast_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->SignCD->Visible) { // SignCD ?>
        <th data-name="SignCD" class="<?= $Page->SignCD->headerCellClass() ?>"><div id="elh_lab_dept_mast_SignCD" class="lab_dept_mast_SignCD"><?= $Page->renderSort($Page->SignCD) ?></div></th>
<?php } ?>
<?php if ($Page->Collection->Visible) { // Collection ?>
        <th data-name="Collection" class="<?= $Page->Collection->headerCellClass() ?>"><div id="elh_lab_dept_mast_Collection" class="lab_dept_mast_Collection"><?= $Page->renderSort($Page->Collection) ?></div></th>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <th data-name="EditDate" class="<?= $Page->EditDate->headerCellClass() ?>"><div id="elh_lab_dept_mast_EditDate" class="lab_dept_mast_EditDate"><?= $Page->renderSort($Page->EditDate) ?></div></th>
<?php } ?>
<?php if ($Page->SMS->Visible) { // SMS ?>
        <th data-name="SMS" class="<?= $Page->SMS->headerCellClass() ?>"><div id="elh_lab_dept_mast_SMS" class="lab_dept_mast_SMS"><?= $Page->renderSort($Page->SMS) ?></div></th>
<?php } ?>
<?php if ($Page->WorkList->Visible) { // WorkList ?>
        <th data-name="WorkList" class="<?= $Page->WorkList->headerCellClass() ?>"><div id="elh_lab_dept_mast_WorkList" class="lab_dept_mast_WorkList"><?= $Page->renderSort($Page->WorkList) ?></div></th>
<?php } ?>
<?php if ($Page->_Page->Visible) { // Page ?>
        <th data-name="_Page" class="<?= $Page->_Page->headerCellClass() ?>"><div id="elh_lab_dept_mast__Page" class="lab_dept_mast__Page"><?= $Page->renderSort($Page->_Page) ?></div></th>
<?php } ?>
<?php if ($Page->Incharge->Visible) { // Incharge ?>
        <th data-name="Incharge" class="<?= $Page->Incharge->headerCellClass() ?>"><div id="elh_lab_dept_mast_Incharge" class="lab_dept_mast_Incharge"><?= $Page->renderSort($Page->Incharge) ?></div></th>
<?php } ?>
<?php if ($Page->AutoNum->Visible) { // AutoNum ?>
        <th data-name="AutoNum" class="<?= $Page->AutoNum->headerCellClass() ?>"><div id="elh_lab_dept_mast_AutoNum" class="lab_dept_mast_AutoNum"><?= $Page->renderSort($Page->AutoNum) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_lab_dept_mast_id" class="lab_dept_mast_id"><?= $Page->renderSort($Page->id) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_lab_dept_mast", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->MainCD->Visible) { // MainCD ?>
        <td data-name="MainCD" <?= $Page->MainCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_MainCD">
<span<?= $Page->MainCD->viewAttributes() ?>>
<?= $Page->MainCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Code->Visible) { // Code ?>
        <td data-name="Code" <?= $Page->Code->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Code">
<span<?= $Page->Code->viewAttributes() ?>>
<?= $Page->Code->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SignCD->Visible) { // SignCD ?>
        <td data-name="SignCD" <?= $Page->SignCD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_SignCD">
<span<?= $Page->SignCD->viewAttributes() ?>>
<?= $Page->SignCD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Collection->Visible) { // Collection ?>
        <td data-name="Collection" <?= $Page->Collection->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Collection">
<span<?= $Page->Collection->viewAttributes() ?>>
<?= $Page->Collection->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EditDate->Visible) { // EditDate ?>
        <td data-name="EditDate" <?= $Page->EditDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_EditDate">
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SMS->Visible) { // SMS ?>
        <td data-name="SMS" <?= $Page->SMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_SMS">
<span<?= $Page->SMS->viewAttributes() ?>>
<?= $Page->SMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->WorkList->Visible) { // WorkList ?>
        <td data-name="WorkList" <?= $Page->WorkList->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_WorkList">
<span<?= $Page->WorkList->viewAttributes() ?>>
<?= $Page->WorkList->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_Page->Visible) { // Page ?>
        <td data-name="_Page" <?= $Page->_Page->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast__Page">
<span<?= $Page->_Page->viewAttributes() ?>>
<?= $Page->_Page->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Incharge->Visible) { // Incharge ?>
        <td data-name="Incharge" <?= $Page->Incharge->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_Incharge">
<span<?= $Page->Incharge->viewAttributes() ?>>
<?= $Page->Incharge->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AutoNum->Visible) { // AutoNum ?>
        <td data-name="AutoNum" <?= $Page->AutoNum->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_AutoNum">
<span<?= $Page->AutoNum->viewAttributes() ?>>
<?= $Page->AutoNum->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_lab_dept_mast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
    ew.addEventHandlers("lab_dept_mast");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

<?php

namespace PHPMaker2021\project3;

// Page object
$MasUserTemplatePrescriptionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmas_user_template_prescriptionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fmas_user_template_prescriptionlist = currentForm = new ew.Form("fmas_user_template_prescriptionlist", "list");
    fmas_user_template_prescriptionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fmas_user_template_prescriptionlist");
});
var fmas_user_template_prescriptionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fmas_user_template_prescriptionlistsrch = currentSearchForm = new ew.Form("fmas_user_template_prescriptionlistsrch");

    // Dynamic selection lists

    // Filters
    fmas_user_template_prescriptionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fmas_user_template_prescriptionlistsrch");
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
<form name="fmas_user_template_prescriptionlistsrch" id="fmas_user_template_prescriptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fmas_user_template_prescriptionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_user_template_prescription">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_user_template_prescription">
<form name="fmas_user_template_prescriptionlist" id="fmas_user_template_prescriptionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_user_template_prescription">
<div id="gmp_mas_user_template_prescription" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_mas_user_template_prescriptionlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_id" class="mas_user_template_prescription_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <th data-name="TemplateName" class="<?= $Page->TemplateName->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_TemplateName" class="mas_user_template_prescription_TemplateName"><?= $Page->renderSort($Page->TemplateName) ?></div></th>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
        <th data-name="Medicine" class="<?= $Page->Medicine->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_Medicine" class="mas_user_template_prescription_Medicine"><?= $Page->renderSort($Page->Medicine) ?></div></th>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <th data-name="M" class="<?= $Page->M->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_M" class="mas_user_template_prescription_M"><?= $Page->renderSort($Page->M) ?></div></th>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <th data-name="A" class="<?= $Page->A->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_A" class="mas_user_template_prescription_A"><?= $Page->renderSort($Page->A) ?></div></th>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
        <th data-name="N" class="<?= $Page->N->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_N" class="mas_user_template_prescription_N"><?= $Page->renderSort($Page->N) ?></div></th>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <th data-name="NoOfDays" class="<?= $Page->NoOfDays->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_NoOfDays" class="mas_user_template_prescription_NoOfDays"><?= $Page->renderSort($Page->NoOfDays) ?></div></th>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <th data-name="PreRoute" class="<?= $Page->PreRoute->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_PreRoute" class="mas_user_template_prescription_PreRoute"><?= $Page->renderSort($Page->PreRoute) ?></div></th>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <th data-name="TimeOfTaking" class="<?= $Page->TimeOfTaking->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_TimeOfTaking" class="mas_user_template_prescription_TimeOfTaking"><?= $Page->renderSort($Page->TimeOfTaking) ?></div></th>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <th data-name="Type" class="<?= $Page->Type->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_Type" class="mas_user_template_prescription_Type"><?= $Page->renderSort($Page->Type) ?></div></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th data-name="Status" class="<?= $Page->Status->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_Status" class="mas_user_template_prescription_Status"><?= $Page->renderSort($Page->Status) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <th data-name="CreatedBy" class="<?= $Page->CreatedBy->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_CreatedBy" class="mas_user_template_prescription_CreatedBy"><?= $Page->renderSort($Page->CreatedBy) ?></div></th>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <th data-name="CreateDateTime" class="<?= $Page->CreateDateTime->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_CreateDateTime" class="mas_user_template_prescription_CreateDateTime"><?= $Page->renderSort($Page->CreateDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <th data-name="ModifiedBy" class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_ModifiedBy" class="mas_user_template_prescription_ModifiedBy"><?= $Page->renderSort($Page->ModifiedBy) ?></div></th>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <th data-name="ModifiedDateTime" class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div id="elh_mas_user_template_prescription_ModifiedDateTime" class="mas_user_template_prescription_ModifiedDateTime"><?= $Page->renderSort($Page->ModifiedDateTime) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_mas_user_template_prescription", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TemplateName->Visible) { // TemplateName ?>
        <td data-name="TemplateName" <?= $Page->TemplateName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_TemplateName">
<span<?= $Page->TemplateName->viewAttributes() ?>>
<?= $Page->TemplateName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Medicine->Visible) { // Medicine ?>
        <td data-name="Medicine" <?= $Page->Medicine->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_Medicine">
<span<?= $Page->Medicine->viewAttributes() ?>>
<?= $Page->Medicine->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->M->Visible) { // M ?>
        <td data-name="M" <?= $Page->M->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_M">
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->A->Visible) { // A ?>
        <td data-name="A" <?= $Page->A->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_A">
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->N->Visible) { // N ?>
        <td data-name="N" <?= $Page->N->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_N">
<span<?= $Page->N->viewAttributes() ?>>
<?= $Page->N->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <td data-name="NoOfDays" <?= $Page->NoOfDays->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_NoOfDays">
<span<?= $Page->NoOfDays->viewAttributes() ?>>
<?= $Page->NoOfDays->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <td data-name="PreRoute" <?= $Page->PreRoute->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_PreRoute">
<span<?= $Page->PreRoute->viewAttributes() ?>>
<?= $Page->PreRoute->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <td data-name="TimeOfTaking" <?= $Page->TimeOfTaking->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_TimeOfTaking">
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Type->Visible) { // Type ?>
        <td data-name="Type" <?= $Page->Type->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_Type">
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Status->Visible) { // Status ?>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <td data-name="CreatedBy" <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_CreatedBy">
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <td data-name="CreateDateTime" <?= $Page->CreateDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_CreateDateTime">
<span<?= $Page->CreateDateTime->viewAttributes() ?>>
<?= $Page->CreateDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <td data-name="ModifiedBy" <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_ModifiedBy">
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <td data-name="ModifiedDateTime" <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_mas_user_template_prescription_ModifiedDateTime">
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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
    ew.addEventHandlers("mas_user_template_prescription");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

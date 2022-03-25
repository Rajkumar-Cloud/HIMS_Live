<?php

namespace PHPMaker2021\project3;

// Page object
$ViewIuiExcelList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_iui_excellist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_iui_excellist = currentForm = new ew.Form("fview_iui_excellist", "list");
    fview_iui_excellist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_iui_excellist");
});
var fview_iui_excellistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_iui_excellistsrch = currentSearchForm = new ew.Form("fview_iui_excellistsrch");

    // Dynamic selection lists

    // Filters
    fview_iui_excellistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_iui_excellistsrch");
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
<form name="fview_iui_excellistsrch" id="fview_iui_excellistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_iui_excellistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_iui_excel">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_iui_excel">
<form name="fview_iui_excellist" id="fview_iui_excellist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_iui_excel">
<div id="gmp_view_iui_excel" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_iui_excellist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->NAME->Visible) { // NAME ?>
        <th data-name="NAME" class="<?= $Page->NAME->headerCellClass() ?>"><div id="elh_view_iui_excel_NAME" class="view_iui_excel_NAME"><?= $Page->renderSort($Page->NAME) ?></div></th>
<?php } ?>
<?php if ($Page->HUSBAND_NAME->Visible) { // HUSBAND NAME ?>
        <th data-name="HUSBAND_NAME" class="<?= $Page->HUSBAND_NAME->headerCellClass() ?>"><div id="elh_view_iui_excel_HUSBAND_NAME" class="view_iui_excel_HUSBAND_NAME"><?= $Page->renderSort($Page->HUSBAND_NAME) ?></div></th>
<?php } ?>
<?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <th data-name="CoupleID" class="<?= $Page->CoupleID->headerCellClass() ?>"><div id="elh_view_iui_excel_CoupleID" class="view_iui_excel_CoupleID"><?= $Page->renderSort($Page->CoupleID) ?></div></th>
<?php } ?>
<?php if ($Page->AGE___WIFE->Visible) { // AGE  - WIFE ?>
        <th data-name="AGE___WIFE" class="<?= $Page->AGE___WIFE->headerCellClass() ?>"><div id="elh_view_iui_excel_AGE___WIFE" class="view_iui_excel_AGE___WIFE"><?= $Page->renderSort($Page->AGE___WIFE) ?></div></th>
<?php } ?>
<?php if ($Page->AGE_HUSBAND->Visible) { // AGE- HUSBAND ?>
        <th data-name="AGE_HUSBAND" class="<?= $Page->AGE_HUSBAND->headerCellClass() ?>"><div id="elh_view_iui_excel_AGE_HUSBAND" class="view_iui_excel_AGE_HUSBAND"><?= $Page->renderSort($Page->AGE_HUSBAND) ?></div></th>
<?php } ?>
<?php if ($Page->ANXIOUS_TO_CONCEIVE_FOR->Visible) { // ANXIOUS TO CONCEIVE FOR ?>
        <th data-name="ANXIOUS_TO_CONCEIVE_FOR" class="<?= $Page->ANXIOUS_TO_CONCEIVE_FOR->headerCellClass() ?>"><div id="elh_view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR" class="view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR"><?= $Page->renderSort($Page->ANXIOUS_TO_CONCEIVE_FOR) ?></div></th>
<?php } ?>
<?php if ($Page->AMH__NGML->Visible) { // AMH ( NG/ML) ?>
        <th data-name="AMH__NGML" class="<?= $Page->AMH__NGML->headerCellClass() ?>"><div id="elh_view_iui_excel_AMH__NGML" class="view_iui_excel_AMH__NGML"><?= $Page->renderSort($Page->AMH__NGML) ?></div></th>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <th data-name="TUBAL_PATENCY" class="<?= $Page->TUBAL_PATENCY->headerCellClass() ?>"><div id="elh_view_iui_excel_TUBAL_PATENCY" class="view_iui_excel_TUBAL_PATENCY"><?= $Page->renderSort($Page->TUBAL_PATENCY) ?></div></th>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
        <th data-name="HSG" class="<?= $Page->HSG->headerCellClass() ?>"><div id="elh_view_iui_excel_HSG" class="view_iui_excel_HSG"><?= $Page->renderSort($Page->HSG) ?></div></th>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
        <th data-name="DHL" class="<?= $Page->DHL->headerCellClass() ?>"><div id="elh_view_iui_excel_DHL" class="view_iui_excel_DHL"><?= $Page->renderSort($Page->DHL) ?></div></th>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <th data-name="UTERINE_PROBLEMS" class="<?= $Page->UTERINE_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_UTERINE_PROBLEMS" class="view_iui_excel_UTERINE_PROBLEMS"><?= $Page->renderSort($Page->UTERINE_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <th data-name="W_COMORBIDS" class="<?= $Page->W_COMORBIDS->headerCellClass() ?>"><div id="elh_view_iui_excel_W_COMORBIDS" class="view_iui_excel_W_COMORBIDS"><?= $Page->renderSort($Page->W_COMORBIDS) ?></div></th>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <th data-name="H_COMORBIDS" class="<?= $Page->H_COMORBIDS->headerCellClass() ?>"><div id="elh_view_iui_excel_H_COMORBIDS" class="view_iui_excel_H_COMORBIDS"><?= $Page->renderSort($Page->H_COMORBIDS) ?></div></th>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <th data-name="SEXUAL_DYSFUNCTION" class="<?= $Page->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div id="elh_view_iui_excel_SEXUAL_DYSFUNCTION" class="view_iui_excel_SEXUAL_DYSFUNCTION"><?= $Page->renderSort($Page->SEXUAL_DYSFUNCTION) ?></div></th>
<?php } ?>
<?php if ($Page->PREV_IUI->Visible) { // PREV IUI ?>
        <th data-name="PREV_IUI" class="<?= $Page->PREV_IUI->headerCellClass() ?>"><div id="elh_view_iui_excel_PREV_IUI" class="view_iui_excel_PREV_IUI"><?= $Page->renderSort($Page->PREV_IUI) ?></div></th>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <th data-name="TABLETS" class="<?= $Page->TABLETS->headerCellClass() ?>"><div id="elh_view_iui_excel_TABLETS" class="view_iui_excel_TABLETS"><?= $Page->renderSort($Page->TABLETS) ?></div></th>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <th data-name="INJTYPE" class="<?= $Page->INJTYPE->headerCellClass() ?>"><div id="elh_view_iui_excel_INJTYPE" class="view_iui_excel_INJTYPE"><?= $Page->renderSort($Page->INJTYPE) ?></div></th>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <th data-name="LMP" class="<?= $Page->LMP->headerCellClass() ?>"><div id="elh_view_iui_excel_LMP" class="view_iui_excel_LMP"><?= $Page->renderSort($Page->LMP) ?></div></th>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <th data-name="TRIGGERR" class="<?= $Page->TRIGGERR->headerCellClass() ?>"><div id="elh_view_iui_excel_TRIGGERR" class="view_iui_excel_TRIGGERR"><?= $Page->renderSort($Page->TRIGGERR) ?></div></th>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <th data-name="TRIGGERDATE" class="<?= $Page->TRIGGERDATE->headerCellClass() ?>"><div id="elh_view_iui_excel_TRIGGERDATE" class="view_iui_excel_TRIGGERDATE"><?= $Page->renderSort($Page->TRIGGERDATE) ?></div></th>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <th data-name="FOLLICLE_STATUS" class="<?= $Page->FOLLICLE_STATUS->headerCellClass() ?>"><div id="elh_view_iui_excel_FOLLICLE_STATUS" class="view_iui_excel_FOLLICLE_STATUS"><?= $Page->renderSort($Page->FOLLICLE_STATUS) ?></div></th>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <th data-name="NUMBER_OF_IUI" class="<?= $Page->NUMBER_OF_IUI->headerCellClass() ?>"><div id="elh_view_iui_excel_NUMBER_OF_IUI" class="view_iui_excel_NUMBER_OF_IUI"><?= $Page->renderSort($Page->NUMBER_OF_IUI) ?></div></th>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <th data-name="PROCEDURE" class="<?= $Page->PROCEDURE->headerCellClass() ?>"><div id="elh_view_iui_excel_PROCEDURE" class="view_iui_excel_PROCEDURE"><?= $Page->renderSort($Page->PROCEDURE) ?></div></th>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <th data-name="LUTEAL_SUPPORT" class="<?= $Page->LUTEAL_SUPPORT->headerCellClass() ?>"><div id="elh_view_iui_excel_LUTEAL_SUPPORT" class="view_iui_excel_LUTEAL_SUPPORT"><?= $Page->renderSort($Page->LUTEAL_SUPPORT) ?></div></th>
<?php } ?>
<?php if ($Page->HD_SAMPLE->Visible) { // H/D SAMPLE ?>
        <th data-name="HD_SAMPLE" class="<?= $Page->HD_SAMPLE->headerCellClass() ?>"><div id="elh_view_iui_excel_HD_SAMPLE" class="view_iui_excel_HD_SAMPLE"><?= $Page->renderSort($Page->HD_SAMPLE) ?></div></th>
<?php } ?>
<?php if ($Page->DONOR__ID->Visible) { // DONOR - I.D ?>
        <th data-name="DONOR__ID" class="<?= $Page->DONOR__ID->headerCellClass() ?>"><div id="elh_view_iui_excel_DONOR__ID" class="view_iui_excel_DONOR__ID"><?= $Page->renderSort($Page->DONOR__ID) ?></div></th>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <th data-name="PREG_TEST_DATE" class="<?= $Page->PREG_TEST_DATE->headerCellClass() ?>"><div id="elh_view_iui_excel_PREG_TEST_DATE" class="view_iui_excel_PREG_TEST_DATE"><?= $Page->renderSort($Page->PREG_TEST_DATE) ?></div></th>
<?php } ?>
<?php if ($Page->COLLECTION__METHOD->Visible) { // COLLECTION  METHOD ?>
        <th data-name="COLLECTION__METHOD" class="<?= $Page->COLLECTION__METHOD->headerCellClass() ?>"><div id="elh_view_iui_excel_COLLECTION__METHOD" class="view_iui_excel_COLLECTION__METHOD"><?= $Page->renderSort($Page->COLLECTION__METHOD) ?></div></th>
<?php } ?>
<?php if ($Page->SAMPLE_SOURCE->Visible) { // SAMPLE SOURCE ?>
        <th data-name="SAMPLE_SOURCE" class="<?= $Page->SAMPLE_SOURCE->headerCellClass() ?>"><div id="elh_view_iui_excel_SAMPLE_SOURCE" class="view_iui_excel_SAMPLE_SOURCE"><?= $Page->renderSort($Page->SAMPLE_SOURCE) ?></div></th>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <th data-name="SPECIFIC_PROBLEMS" class="<?= $Page->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_SPECIFIC_PROBLEMS" class="view_iui_excel_SPECIFIC_PROBLEMS"><?= $Page->renderSort($Page->SPECIFIC_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <th data-name="IMSC_1" class="<?= $Page->IMSC_1->headerCellClass() ?>"><div id="elh_view_iui_excel_IMSC_1" class="view_iui_excel_IMSC_1"><?= $Page->renderSort($Page->IMSC_1) ?></div></th>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <th data-name="IMSC_2" class="<?= $Page->IMSC_2->headerCellClass() ?>"><div id="elh_view_iui_excel_IMSC_2" class="view_iui_excel_IMSC_2"><?= $Page->renderSort($Page->IMSC_2) ?></div></th>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <th data-name="LIQUIFACTION_STORAGE" class="<?= $Page->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div id="elh_view_iui_excel_LIQUIFACTION_STORAGE" class="view_iui_excel_LIQUIFACTION_STORAGE"><?= $Page->renderSort($Page->LIQUIFACTION_STORAGE) ?></div></th>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <th data-name="IUI_PREP_METHOD" class="<?= $Page->IUI_PREP_METHOD->headerCellClass() ?>"><div id="elh_view_iui_excel_IUI_PREP_METHOD" class="view_iui_excel_IUI_PREP_METHOD"><?= $Page->renderSort($Page->IUI_PREP_METHOD) ?></div></th>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <th data-name="TIME_FROM_TRIGGER" class="<?= $Page->TIME_FROM_TRIGGER->headerCellClass() ?>"><div id="elh_view_iui_excel_TIME_FROM_TRIGGER" class="view_iui_excel_TIME_FROM_TRIGGER"><?= $Page->renderSort($Page->TIME_FROM_TRIGGER) ?></div></th>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <th data-name="COLLECTION_TO_PREPARATION" class="<?= $Page->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div id="elh_view_iui_excel_COLLECTION_TO_PREPARATION" class="view_iui_excel_COLLECTION_TO_PREPARATION"><?= $Page->renderSort($Page->COLLECTION_TO_PREPARATION) ?></div></th>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <th data-name="TIME_FROM_PREP_TO_INSEM" class="<?= $Page->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div id="elh_view_iui_excel_TIME_FROM_PREP_TO_INSEM" class="view_iui_excel_TIME_FROM_PREP_TO_INSEM"><?= $Page->renderSort($Page->TIME_FROM_PREP_TO_INSEM) ?></div></th>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <th data-name="SPECIFIC_MATERNAL_PROBLEMS" class="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div id="elh_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS" class="view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS"><?= $Page->renderSort($Page->SPECIFIC_MATERNAL_PROBLEMS) ?></div></th>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <th data-name="ONGOING_PREG" class="<?= $Page->ONGOING_PREG->headerCellClass() ?>"><div id="elh_view_iui_excel_ONGOING_PREG" class="view_iui_excel_ONGOING_PREG"><?= $Page->renderSort($Page->ONGOING_PREG) ?></div></th>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <th data-name="EDD_Date" class="<?= $Page->EDD_Date->headerCellClass() ?>"><div id="elh_view_iui_excel_EDD_Date" class="view_iui_excel_EDD_Date"><?= $Page->renderSort($Page->EDD_Date) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_iui_excel", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->NAME->Visible) { // NAME ?>
        <td data-name="NAME" <?= $Page->NAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_NAME">
<span<?= $Page->NAME->viewAttributes() ?>>
<?= $Page->NAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HUSBAND_NAME->Visible) { // HUSBAND NAME ?>
        <td data-name="HUSBAND_NAME" <?= $Page->HUSBAND_NAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_HUSBAND_NAME">
<span<?= $Page->HUSBAND_NAME->viewAttributes() ?>>
<?= $Page->HUSBAND_NAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CoupleID->Visible) { // CoupleID ?>
        <td data-name="CoupleID" <?= $Page->CoupleID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_CoupleID">
<span<?= $Page->CoupleID->viewAttributes() ?>>
<?= $Page->CoupleID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AGE___WIFE->Visible) { // AGE  - WIFE ?>
        <td data-name="AGE___WIFE" <?= $Page->AGE___WIFE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_AGE___WIFE">
<span<?= $Page->AGE___WIFE->viewAttributes() ?>>
<?= $Page->AGE___WIFE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AGE_HUSBAND->Visible) { // AGE- HUSBAND ?>
        <td data-name="AGE_HUSBAND" <?= $Page->AGE_HUSBAND->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_AGE_HUSBAND">
<span<?= $Page->AGE_HUSBAND->viewAttributes() ?>>
<?= $Page->AGE_HUSBAND->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ANXIOUS_TO_CONCEIVE_FOR->Visible) { // ANXIOUS TO CONCEIVE FOR ?>
        <td data-name="ANXIOUS_TO_CONCEIVE_FOR" <?= $Page->ANXIOUS_TO_CONCEIVE_FOR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_ANXIOUS_TO_CONCEIVE_FOR">
<span<?= $Page->ANXIOUS_TO_CONCEIVE_FOR->viewAttributes() ?>>
<?= $Page->ANXIOUS_TO_CONCEIVE_FOR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AMH__NGML->Visible) { // AMH ( NG/ML) ?>
        <td data-name="AMH__NGML" <?= $Page->AMH__NGML->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_AMH__NGML">
<span<?= $Page->AMH__NGML->viewAttributes() ?>>
<?= $Page->AMH__NGML->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <td data-name="TUBAL_PATENCY" <?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TUBAL_PATENCY">
<span<?= $Page->TUBAL_PATENCY->viewAttributes() ?>>
<?= $Page->TUBAL_PATENCY->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HSG->Visible) { // HSG ?>
        <td data-name="HSG" <?= $Page->HSG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_HSG">
<span<?= $Page->HSG->viewAttributes() ?>>
<?= $Page->HSG->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DHL->Visible) { // DHL ?>
        <td data-name="DHL" <?= $Page->DHL->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_DHL">
<span<?= $Page->DHL->viewAttributes() ?>>
<?= $Page->DHL->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <td data-name="UTERINE_PROBLEMS" <?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_UTERINE_PROBLEMS">
<span<?= $Page->UTERINE_PROBLEMS->viewAttributes() ?>>
<?= $Page->UTERINE_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <td data-name="W_COMORBIDS" <?= $Page->W_COMORBIDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_W_COMORBIDS">
<span<?= $Page->W_COMORBIDS->viewAttributes() ?>>
<?= $Page->W_COMORBIDS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <td data-name="H_COMORBIDS" <?= $Page->H_COMORBIDS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_H_COMORBIDS">
<span<?= $Page->H_COMORBIDS->viewAttributes() ?>>
<?= $Page->H_COMORBIDS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <td data-name="SEXUAL_DYSFUNCTION" <?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_SEXUAL_DYSFUNCTION">
<span<?= $Page->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?= $Page->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PREV_IUI->Visible) { // PREV IUI ?>
        <td data-name="PREV_IUI" <?= $Page->PREV_IUI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_PREV_IUI">
<span<?= $Page->PREV_IUI->viewAttributes() ?>>
<?= $Page->PREV_IUI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <td data-name="TABLETS" <?= $Page->TABLETS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TABLETS">
<span<?= $Page->TABLETS->viewAttributes() ?>>
<?= $Page->TABLETS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <td data-name="INJTYPE" <?= $Page->INJTYPE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_INJTYPE">
<span<?= $Page->INJTYPE->viewAttributes() ?>>
<?= $Page->INJTYPE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LMP->Visible) { // LMP ?>
        <td data-name="LMP" <?= $Page->LMP->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_LMP">
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <td data-name="TRIGGERR" <?= $Page->TRIGGERR->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TRIGGERR">
<span<?= $Page->TRIGGERR->viewAttributes() ?>>
<?= $Page->TRIGGERR->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <td data-name="TRIGGERDATE" <?= $Page->TRIGGERDATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TRIGGERDATE">
<span<?= $Page->TRIGGERDATE->viewAttributes() ?>>
<?= $Page->TRIGGERDATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <td data-name="FOLLICLE_STATUS" <?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_FOLLICLE_STATUS">
<span<?= $Page->FOLLICLE_STATUS->viewAttributes() ?>>
<?= $Page->FOLLICLE_STATUS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <td data-name="NUMBER_OF_IUI" <?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_NUMBER_OF_IUI">
<span<?= $Page->NUMBER_OF_IUI->viewAttributes() ?>>
<?= $Page->NUMBER_OF_IUI->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <td data-name="PROCEDURE" <?= $Page->PROCEDURE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_PROCEDURE">
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <td data-name="LUTEAL_SUPPORT" <?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_LUTEAL_SUPPORT">
<span<?= $Page->LUTEAL_SUPPORT->viewAttributes() ?>>
<?= $Page->LUTEAL_SUPPORT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HD_SAMPLE->Visible) { // H/D SAMPLE ?>
        <td data-name="HD_SAMPLE" <?= $Page->HD_SAMPLE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_HD_SAMPLE">
<span<?= $Page->HD_SAMPLE->viewAttributes() ?>>
<?= $Page->HD_SAMPLE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DONOR__ID->Visible) { // DONOR - I.D ?>
        <td data-name="DONOR__ID" <?= $Page->DONOR__ID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_DONOR__ID">
<span<?= $Page->DONOR__ID->viewAttributes() ?>>
<?= $Page->DONOR__ID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <td data-name="PREG_TEST_DATE" <?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_PREG_TEST_DATE">
<span<?= $Page->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Page->PREG_TEST_DATE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->COLLECTION__METHOD->Visible) { // COLLECTION  METHOD ?>
        <td data-name="COLLECTION__METHOD" <?= $Page->COLLECTION__METHOD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_COLLECTION__METHOD">
<span<?= $Page->COLLECTION__METHOD->viewAttributes() ?>>
<?= $Page->COLLECTION__METHOD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SAMPLE_SOURCE->Visible) { // SAMPLE SOURCE ?>
        <td data-name="SAMPLE_SOURCE" <?= $Page->SAMPLE_SOURCE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_SAMPLE_SOURCE">
<span<?= $Page->SAMPLE_SOURCE->viewAttributes() ?>>
<?= $Page->SAMPLE_SOURCE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <td data-name="SPECIFIC_PROBLEMS" <?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_SPECIFIC_PROBLEMS">
<span<?= $Page->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <td data-name="IMSC_1" <?= $Page->IMSC_1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_IMSC_1">
<span<?= $Page->IMSC_1->viewAttributes() ?>>
<?= $Page->IMSC_1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <td data-name="IMSC_2" <?= $Page->IMSC_2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_IMSC_2">
<span<?= $Page->IMSC_2->viewAttributes() ?>>
<?= $Page->IMSC_2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <td data-name="LIQUIFACTION_STORAGE" <?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_LIQUIFACTION_STORAGE">
<span<?= $Page->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?= $Page->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <td data-name="IUI_PREP_METHOD" <?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_IUI_PREP_METHOD">
<span<?= $Page->IUI_PREP_METHOD->viewAttributes() ?>>
<?= $Page->IUI_PREP_METHOD->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <td data-name="TIME_FROM_TRIGGER" <?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TIME_FROM_TRIGGER">
<span<?= $Page->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?= $Page->TIME_FROM_TRIGGER->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <td data-name="COLLECTION_TO_PREPARATION" <?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_COLLECTION_TO_PREPARATION">
<span<?= $Page->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?= $Page->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <td data-name="TIME_FROM_PREP_TO_INSEM" <?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_TIME_FROM_PREP_TO_INSEM">
<span<?= $Page->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?= $Page->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <td data-name="SPECIFIC_MATERNAL_PROBLEMS" <?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_SPECIFIC_MATERNAL_PROBLEMS">
<span<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <td data-name="ONGOING_PREG" <?= $Page->ONGOING_PREG->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_ONGOING_PREG">
<span<?= $Page->ONGOING_PREG->viewAttributes() ?>>
<?= $Page->ONGOING_PREG->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <td data-name="EDD_Date" <?= $Page->EDD_Date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_iui_excel_EDD_Date">
<span<?= $Page->EDD_Date->viewAttributes() ?>>
<?= $Page->EDD_Date->getViewValue() ?></span>
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
    ew.addEventHandlers("view_iui_excel");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

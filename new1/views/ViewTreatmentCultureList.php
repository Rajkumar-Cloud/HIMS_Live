<?php

namespace PHPMaker2021\project3;

// Page object
$ViewTreatmentCultureList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_treatment_culturelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_treatment_culturelist = currentForm = new ew.Form("fview_treatment_culturelist", "list");
    fview_treatment_culturelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_treatment_culturelist");
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
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_treatment_culture">
<form name="fview_treatment_culturelist" id="fview_treatment_culturelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_treatment_culture">
<div id="gmp_view_treatment_culture" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_treatment_culturelist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_view_treatment_culture_TidNo" class="view_treatment_culture_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <th data-name="Day0OocyteStage" class="<?= $Page->Day0OocyteStage->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day0OocyteStage" class="view_treatment_culture_Day0OocyteStage"><?= $Page->renderSort($Page->Day0OocyteStage) ?></div></th>
<?php } ?>
<?php if ($Page->Day1->Visible) { // Day1 ?>
        <th data-name="Day1" class="<?= $Page->Day1->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day1" class="view_treatment_culture_Day1"><?= $Page->renderSort($Page->Day1) ?></div></th>
<?php } ?>
<?php if ($Page->Day2->Visible) { // Day2 ?>
        <th data-name="Day2" class="<?= $Page->Day2->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day2" class="view_treatment_culture_Day2"><?= $Page->renderSort($Page->Day2) ?></div></th>
<?php } ?>
<?php if ($Page->Day3->Visible) { // Day3 ?>
        <th data-name="Day3" class="<?= $Page->Day3->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day3" class="view_treatment_culture_Day3"><?= $Page->renderSort($Page->Day3) ?></div></th>
<?php } ?>
<?php if ($Page->Day4->Visible) { // Day4 ?>
        <th data-name="Day4" class="<?= $Page->Day4->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day4" class="view_treatment_culture_Day4"><?= $Page->renderSort($Page->Day4) ?></div></th>
<?php } ?>
<?php if ($Page->Day5->Visible) { // Day5 ?>
        <th data-name="Day5" class="<?= $Page->Day5->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day5" class="view_treatment_culture_Day5"><?= $Page->renderSort($Page->Day5) ?></div></th>
<?php } ?>
<?php if ($Page->Day6->Visible) { // Day6 ?>
        <th data-name="Day6" class="<?= $Page->Day6->headerCellClass() ?>"><div id="elh_view_treatment_culture_Day6" class="view_treatment_culture_Day6"><?= $Page->renderSort($Page->Day6) ?></div></th>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
        <th data-name="ET" class="<?= $Page->ET->headerCellClass() ?>"><div id="elh_view_treatment_culture_ET" class="view_treatment_culture_ET"><?= $Page->renderSort($Page->ET) ?></div></th>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <th data-name="ETDate" class="<?= $Page->ETDate->headerCellClass() ?>"><div id="elh_view_treatment_culture_ETDate" class="view_treatment_culture_ETDate"><?= $Page->renderSort($Page->ETDate) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_treatment_culture", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage" <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_Day0OocyteStage">
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day1->Visible) { // Day1 ?>
        <td data-name="Day1" <?= $Page->Day1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_Day1">
<span<?= $Page->Day1->viewAttributes() ?>>
<?= $Page->Day1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day2->Visible) { // Day2 ?>
        <td data-name="Day2" <?= $Page->Day2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_Day2">
<span<?= $Page->Day2->viewAttributes() ?>>
<?= $Page->Day2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day3->Visible) { // Day3 ?>
        <td data-name="Day3" <?= $Page->Day3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_Day3">
<span<?= $Page->Day3->viewAttributes() ?>>
<?= $Page->Day3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day4->Visible) { // Day4 ?>
        <td data-name="Day4" <?= $Page->Day4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_Day4">
<span<?= $Page->Day4->viewAttributes() ?>>
<?= $Page->Day4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day5->Visible) { // Day5 ?>
        <td data-name="Day5" <?= $Page->Day5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_Day5">
<span<?= $Page->Day5->viewAttributes() ?>>
<?= $Page->Day5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Day6->Visible) { // Day6 ?>
        <td data-name="Day6" <?= $Page->Day6->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_Day6">
<span<?= $Page->Day6->viewAttributes() ?>>
<?= $Page->Day6->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ET->Visible) { // ET ?>
        <td data-name="ET" <?= $Page->ET->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_ET">
<span<?= $Page->ET->viewAttributes() ?>>
<?= $Page->ET->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ETDate->Visible) { // ETDate ?>
        <td data-name="ETDate" <?= $Page->ETDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_treatment_culture_ETDate">
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
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
    ew.addEventHandlers("view_treatment_culture");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

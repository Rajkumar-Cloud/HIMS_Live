<?php

namespace PHPMaker2021\project3;

// Page object
$ViewGstOutputList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_gst_outputlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_gst_outputlist = currentForm = new ew.Form("fview_gst_outputlist", "list");
    fview_gst_outputlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_gst_outputlist");
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_gst_output">
<form name="fview_gst_outputlist" id="fview_gst_outputlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_gst_output">
<div id="gmp_view_gst_output" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_gst_outputlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <th data-name="BillDate" class="<?= $Page->BillDate->headerCellClass() ?>"><div id="elh_view_gst_output_BillDate" class="view_gst_output_BillDate"><?= $Page->renderSort($Page->BillDate) ?></div></th>
<?php } ?>
<?php if ($Page->IP_25_SGST->Visible) { // IP 2.5% SGST ?>
        <th data-name="IP_25_SGST" class="<?= $Page->IP_25_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_25_SGST" class="view_gst_output_IP_25_SGST"><?= $Page->renderSort($Page->IP_25_SGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP_25_CGST->Visible) { // IP 2.5% CGST ?>
        <th data-name="IP_25_CGST" class="<?= $Page->IP_25_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_25_CGST" class="view_gst_output_IP_25_CGST"><?= $Page->renderSort($Page->IP_25_CGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP_60_SGST->Visible) { // IP 6.0% SGST ?>
        <th data-name="IP_60_SGST" class="<?= $Page->IP_60_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_60_SGST" class="view_gst_output_IP_60_SGST"><?= $Page->renderSort($Page->IP_60_SGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP_60_CGST->Visible) { // IP 6.0% CGST ?>
        <th data-name="IP_60_CGST" class="<?= $Page->IP_60_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_60_CGST" class="view_gst_output_IP_60_CGST"><?= $Page->renderSort($Page->IP_60_CGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP_90_SGST->Visible) { // IP 9.0% SGST ?>
        <th data-name="IP_90_SGST" class="<?= $Page->IP_90_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_90_SGST" class="view_gst_output_IP_90_SGST"><?= $Page->renderSort($Page->IP_90_SGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP_90_CGST->Visible) { // IP 9.0% CGST ?>
        <th data-name="IP_90_CGST" class="<?= $Page->IP_90_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_90_CGST" class="view_gst_output_IP_90_CGST"><?= $Page->renderSort($Page->IP_90_CGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP_140_SGST->Visible) { // IP 14.0% SGST ?>
        <th data-name="IP_140_SGST" class="<?= $Page->IP_140_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_140_SGST" class="view_gst_output_IP_140_SGST"><?= $Page->renderSort($Page->IP_140_SGST) ?></div></th>
<?php } ?>
<?php if ($Page->IP_140_CGST->Visible) { // IP 14.0% CGST ?>
        <th data-name="IP_140_CGST" class="<?= $Page->IP_140_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_IP_140_CGST" class="view_gst_output_IP_140_CGST"><?= $Page->renderSort($Page->IP_140_CGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP_25_SGST->Visible) { // OP 2.5% SGST ?>
        <th data-name="OP_25_SGST" class="<?= $Page->OP_25_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_25_SGST" class="view_gst_output_OP_25_SGST"><?= $Page->renderSort($Page->OP_25_SGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP_25_CGST->Visible) { // OP 2.5% CGST ?>
        <th data-name="OP_25_CGST" class="<?= $Page->OP_25_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_25_CGST" class="view_gst_output_OP_25_CGST"><?= $Page->renderSort($Page->OP_25_CGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP_60_SGST->Visible) { // OP 6.0% SGST ?>
        <th data-name="OP_60_SGST" class="<?= $Page->OP_60_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_60_SGST" class="view_gst_output_OP_60_SGST"><?= $Page->renderSort($Page->OP_60_SGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP_60_CGST->Visible) { // OP 6.0% CGST ?>
        <th data-name="OP_60_CGST" class="<?= $Page->OP_60_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_60_CGST" class="view_gst_output_OP_60_CGST"><?= $Page->renderSort($Page->OP_60_CGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP_90_SGST->Visible) { // OP 9.0% SGST ?>
        <th data-name="OP_90_SGST" class="<?= $Page->OP_90_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_90_SGST" class="view_gst_output_OP_90_SGST"><?= $Page->renderSort($Page->OP_90_SGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP_90_CGST->Visible) { // OP 9.0% CGST ?>
        <th data-name="OP_90_CGST" class="<?= $Page->OP_90_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_90_CGST" class="view_gst_output_OP_90_CGST"><?= $Page->renderSort($Page->OP_90_CGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP_140_SGST->Visible) { // OP 14.0% SGST ?>
        <th data-name="OP_140_SGST" class="<?= $Page->OP_140_SGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_140_SGST" class="view_gst_output_OP_140_SGST"><?= $Page->renderSort($Page->OP_140_SGST) ?></div></th>
<?php } ?>
<?php if ($Page->OP_140_CGST->Visible) { // OP 14.0% CGST ?>
        <th data-name="OP_140_CGST" class="<?= $Page->OP_140_CGST->headerCellClass() ?>"><div id="elh_view_gst_output_OP_140_CGST" class="view_gst_output_OP_140_CGST"><?= $Page->renderSort($Page->OP_140_CGST) ?></div></th>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <th data-name="HosoID" class="<?= $Page->HosoID->headerCellClass() ?>"><div id="elh_view_gst_output_HosoID" class="view_gst_output_HosoID"><?= $Page->renderSort($Page->HosoID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_gst_output", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->BillDate->Visible) { // BillDate ?>
        <td data-name="BillDate" <?= $Page->BillDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_BillDate">
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_25_SGST->Visible) { // IP 2.5% SGST ?>
        <td data-name="IP_25_SGST" <?= $Page->IP_25_SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP_25_SGST">
<span<?= $Page->IP_25_SGST->viewAttributes() ?>>
<?= $Page->IP_25_SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_25_CGST->Visible) { // IP 2.5% CGST ?>
        <td data-name="IP_25_CGST" <?= $Page->IP_25_CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP_25_CGST">
<span<?= $Page->IP_25_CGST->viewAttributes() ?>>
<?= $Page->IP_25_CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_60_SGST->Visible) { // IP 6.0% SGST ?>
        <td data-name="IP_60_SGST" <?= $Page->IP_60_SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP_60_SGST">
<span<?= $Page->IP_60_SGST->viewAttributes() ?>>
<?= $Page->IP_60_SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_60_CGST->Visible) { // IP 6.0% CGST ?>
        <td data-name="IP_60_CGST" <?= $Page->IP_60_CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP_60_CGST">
<span<?= $Page->IP_60_CGST->viewAttributes() ?>>
<?= $Page->IP_60_CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_90_SGST->Visible) { // IP 9.0% SGST ?>
        <td data-name="IP_90_SGST" <?= $Page->IP_90_SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP_90_SGST">
<span<?= $Page->IP_90_SGST->viewAttributes() ?>>
<?= $Page->IP_90_SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_90_CGST->Visible) { // IP 9.0% CGST ?>
        <td data-name="IP_90_CGST" <?= $Page->IP_90_CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP_90_CGST">
<span<?= $Page->IP_90_CGST->viewAttributes() ?>>
<?= $Page->IP_90_CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_140_SGST->Visible) { // IP 14.0% SGST ?>
        <td data-name="IP_140_SGST" <?= $Page->IP_140_SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP_140_SGST">
<span<?= $Page->IP_140_SGST->viewAttributes() ?>>
<?= $Page->IP_140_SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->IP_140_CGST->Visible) { // IP 14.0% CGST ?>
        <td data-name="IP_140_CGST" <?= $Page->IP_140_CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_IP_140_CGST">
<span<?= $Page->IP_140_CGST->viewAttributes() ?>>
<?= $Page->IP_140_CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP_25_SGST->Visible) { // OP 2.5% SGST ?>
        <td data-name="OP_25_SGST" <?= $Page->OP_25_SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP_25_SGST">
<span<?= $Page->OP_25_SGST->viewAttributes() ?>>
<?= $Page->OP_25_SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP_25_CGST->Visible) { // OP 2.5% CGST ?>
        <td data-name="OP_25_CGST" <?= $Page->OP_25_CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP_25_CGST">
<span<?= $Page->OP_25_CGST->viewAttributes() ?>>
<?= $Page->OP_25_CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP_60_SGST->Visible) { // OP 6.0% SGST ?>
        <td data-name="OP_60_SGST" <?= $Page->OP_60_SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP_60_SGST">
<span<?= $Page->OP_60_SGST->viewAttributes() ?>>
<?= $Page->OP_60_SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP_60_CGST->Visible) { // OP 6.0% CGST ?>
        <td data-name="OP_60_CGST" <?= $Page->OP_60_CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP_60_CGST">
<span<?= $Page->OP_60_CGST->viewAttributes() ?>>
<?= $Page->OP_60_CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP_90_SGST->Visible) { // OP 9.0% SGST ?>
        <td data-name="OP_90_SGST" <?= $Page->OP_90_SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP_90_SGST">
<span<?= $Page->OP_90_SGST->viewAttributes() ?>>
<?= $Page->OP_90_SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP_90_CGST->Visible) { // OP 9.0% CGST ?>
        <td data-name="OP_90_CGST" <?= $Page->OP_90_CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP_90_CGST">
<span<?= $Page->OP_90_CGST->viewAttributes() ?>>
<?= $Page->OP_90_CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP_140_SGST->Visible) { // OP 14.0% SGST ?>
        <td data-name="OP_140_SGST" <?= $Page->OP_140_SGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP_140_SGST">
<span<?= $Page->OP_140_SGST->viewAttributes() ?>>
<?= $Page->OP_140_SGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->OP_140_CGST->Visible) { // OP 14.0% CGST ?>
        <td data-name="OP_140_CGST" <?= $Page->OP_140_CGST->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_OP_140_CGST">
<span<?= $Page->OP_140_CGST->viewAttributes() ?>>
<?= $Page->OP_140_CGST->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HosoID->Visible) { // HosoID ?>
        <td data-name="HosoID" <?= $Page->HosoID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_gst_output_HosoID">
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_gst_output");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

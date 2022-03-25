<?php

namespace PHPMaker2021\HIMS;

// Page object
$LabProfileDetailsPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid lab_profile_details"><!-- .card -->
<div class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel ew-preview-middle-panel"><!-- .table-responsive -->
<table class="table ew-table ew-preview-table"><!-- .table -->
    <thead><!-- Table header -->
        <tr class="ew-table-header">
<?php
// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
    <?php if ($Page->SortUrl($Page->id) == "") { ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><?= $Page->id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
    <?php if ($Page->SortUrl($Page->ProfileCode) == "") { ?>
        <th class="<?= $Page->ProfileCode->headerCellClass() ?>"><?= $Page->ProfileCode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProfileCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProfileCode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProfileCode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProfileCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProfileCode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
    <?php if ($Page->SortUrl($Page->SubProfileCode) == "") { ?>
        <th class="<?= $Page->SubProfileCode->headerCellClass() ?>"><?= $Page->SubProfileCode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SubProfileCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SubProfileCode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SubProfileCode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SubProfileCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SubProfileCode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
    <?php if ($Page->SortUrl($Page->ProfileTestCode) == "") { ?>
        <th class="<?= $Page->ProfileTestCode->headerCellClass() ?>"><?= $Page->ProfileTestCode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProfileTestCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProfileTestCode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProfileTestCode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProfileTestCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProfileTestCode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
    <?php if ($Page->SortUrl($Page->ProfileSubTestCode) == "") { ?>
        <th class="<?= $Page->ProfileSubTestCode->headerCellClass() ?>"><?= $Page->ProfileSubTestCode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProfileSubTestCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProfileSubTestCode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProfileSubTestCode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProfileSubTestCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProfileSubTestCode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TestOrder->Visible) { // TestOrder ?>
    <?php if ($Page->SortUrl($Page->TestOrder) == "") { ?>
        <th class="<?= $Page->TestOrder->headerCellClass() ?>"><?= $Page->TestOrder->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TestOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TestOrder->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TestOrder->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TestOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TestOrder->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TestAmount->Visible) { // TestAmount ?>
    <?php if ($Page->SortUrl($Page->TestAmount) == "") { ?>
        <th class="<?= $Page->TestAmount->headerCellClass() ?>"><?= $Page->TestAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TestAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TestAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TestAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TestAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TestAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
        </tr>
    </thead>
    <tbody><!-- Table body -->
<?php
$Page->RecCount = 0;
$Page->RowCount = 0;
while ($Page->Recordset && !$Page->Recordset->EOF) {
    // Init row class and style
    $Page->RecCount++;
    $Page->RowCount++;
    $Page->CssStyle = "";
    $Page->loadListRowValues($Page->Recordset);

    // Render row
    $Page->RowType = ROWTYPE_PREVIEW; // Preview record
    $Page->resetAttributes();
    $Page->renderListRow();

    // Render list options
    $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td<?= $Page->id->cellAttributes() ?>>
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProfileCode->Visible) { // ProfileCode ?>
        <!-- ProfileCode -->
        <td<?= $Page->ProfileCode->cellAttributes() ?>>
<span<?= $Page->ProfileCode->viewAttributes() ?>>
<?= $Page->ProfileCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SubProfileCode->Visible) { // SubProfileCode ?>
        <!-- SubProfileCode -->
        <td<?= $Page->SubProfileCode->cellAttributes() ?>>
<span<?= $Page->SubProfileCode->viewAttributes() ?>>
<?= $Page->SubProfileCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProfileTestCode->Visible) { // ProfileTestCode ?>
        <!-- ProfileTestCode -->
        <td<?= $Page->ProfileTestCode->cellAttributes() ?>>
<span<?= $Page->ProfileTestCode->viewAttributes() ?>>
<?= $Page->ProfileTestCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProfileSubTestCode->Visible) { // ProfileSubTestCode ?>
        <!-- ProfileSubTestCode -->
        <td<?= $Page->ProfileSubTestCode->cellAttributes() ?>>
<span<?= $Page->ProfileSubTestCode->viewAttributes() ?>>
<?= $Page->ProfileSubTestCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TestOrder->Visible) { // TestOrder ?>
        <!-- TestOrder -->
        <td<?= $Page->TestOrder->cellAttributes() ?>>
<span<?= $Page->TestOrder->viewAttributes() ?>>
<?= $Page->TestOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TestAmount->Visible) { // TestAmount ?>
        <!-- TestAmount -->
        <td<?= $Page->TestAmount->cellAttributes() ?>>
<span<?= $Page->TestAmount->viewAttributes() ?>>
<?= $Page->TestAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    $Page->Recordset->moveNext();
} // while
?>
    </tbody>
</table><!-- /.table -->
</div><!-- /.table-responsive -->
<div class="card-footer ew-grid-lower-panel ew-preview-lower-panel"><!-- .card-footer -->
<?= $Page->Pager->render() ?>
<?php } else { // No record ?>
<div class="card no-border">
<div class="ew-detail-count"><?= $Language->phrase("NoRecord") ?></div>
<?php } ?>
<div class="ew-preview-other-options">
<?php
    foreach ($Page->OtherOptions as $option)
        $option->render("body");
?>
</div>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="clearfix"></div>
</div><!-- /.card-footer -->
<?php } ?>
</div><!-- /.card -->
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPurchaseorderPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid pharmacy_purchaseorder"><!-- .card -->
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
<?php if ($Page->PRC->Visible) { // PRC ?>
    <?php if ($Page->SortUrl($Page->PRC) == "") { ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><?= $Page->PRC->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PRC->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PRC->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PRC->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
    <?php if ($Page->SortUrl($Page->QTY) == "") { ?>
        <th class="<?= $Page->QTY->headerCellClass() ?>"><?= $Page->QTY->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->QTY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->QTY->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->QTY->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->QTY->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->QTY->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <?php if ($Page->SortUrl($Page->Stock) == "") { ?>
        <th class="<?= $Page->Stock->headerCellClass() ?>"><?= $Page->Stock->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Stock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Stock->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Stock->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Stock->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Stock->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
    <?php if ($Page->SortUrl($Page->LastMonthSale) == "") { ?>
        <th class="<?= $Page->LastMonthSale->headerCellClass() ?>"><?= $Page->LastMonthSale->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->LastMonthSale->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->LastMonthSale->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->LastMonthSale->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <?php if ($Page->SortUrl($Page->HospID) == "") { ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><?= $Page->HospID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HospID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HospID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HospID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HospID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HospID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <?php if ($Page->SortUrl($Page->CreatedBy) == "") { ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><?= $Page->CreatedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CreatedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CreatedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CreatedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <?php if ($Page->SortUrl($Page->CreatedDateTime) == "") { ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><?= $Page->CreatedDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CreatedDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CreatedDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CreatedDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <?php if ($Page->SortUrl($Page->ModifiedBy) == "") { ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><?= $Page->ModifiedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ModifiedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ModifiedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ModifiedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <?php if ($Page->SortUrl($Page->ModifiedDateTime) == "") { ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><?= $Page->ModifiedDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ModifiedDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ModifiedDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ModifiedDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
    <?php if ($Page->SortUrl($Page->BillDate) == "") { ?>
        <th class="<?= $Page->BillDate->headerCellClass() ?>"><?= $Page->BillDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BillDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BillDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BillDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BillDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BillDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
    <?php if ($Page->SortUrl($Page->CurStock) == "") { ?>
        <th class="<?= $Page->CurStock->headerCellClass() ?>"><?= $Page->CurStock->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CurStock->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CurStock->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CurStock->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CurStock->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CurStock->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
    <?php if ($Page->SortUrl($Page->grndate) == "") { ?>
        <th class="<?= $Page->grndate->headerCellClass() ?>"><?= $Page->grndate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->grndate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->grndate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->grndate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->grndate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->grndate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
    <?php if ($Page->SortUrl($Page->grndatetime) == "") { ?>
        <th class="<?= $Page->grndatetime->headerCellClass() ?>"><?= $Page->grndatetime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->grndatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->grndatetime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->grndatetime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->grndatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->grndatetime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
    <?php if ($Page->SortUrl($Page->strid) == "") { ?>
        <th class="<?= $Page->strid->headerCellClass() ?>"><?= $Page->strid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->strid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->strid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->strid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->strid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->strid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GRNPer->Visible) { // GRNPer ?>
    <?php if ($Page->SortUrl($Page->GRNPer) == "") { ?>
        <th class="<?= $Page->GRNPer->headerCellClass() ?>"><?= $Page->GRNPer->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GRNPer->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GRNPer->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GRNPer->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GRNPer->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GRNPer->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
    <?php if ($Page->SortUrl($Page->FreeQtyyy) == "") { ?>
        <th class="<?= $Page->FreeQtyyy->headerCellClass() ?>"><?= $Page->FreeQtyyy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FreeQtyyy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FreeQtyyy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FreeQtyyy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FreeQtyyy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FreeQtyyy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <!-- PRC -->
        <td<?= $Page->PRC->cellAttributes() ?>>
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->QTY->Visible) { // QTY ?>
        <!-- QTY -->
        <td<?= $Page->QTY->cellAttributes() ?>>
<span<?= $Page->QTY->viewAttributes() ?>>
<?= $Page->QTY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <!-- Stock -->
        <td<?= $Page->Stock->cellAttributes() ?>>
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <!-- LastMonthSale -->
        <td<?= $Page->LastMonthSale->cellAttributes() ?>>
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <!-- CreatedBy -->
        <td<?= $Page->CreatedBy->cellAttributes() ?>>
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
        <!-- CreatedDateTime -->
        <td<?= $Page->CreatedDateTime->cellAttributes() ?>>
<span<?= $Page->CreatedDateTime->viewAttributes() ?>>
<?= $Page->CreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <!-- ModifiedBy -->
        <td<?= $Page->ModifiedBy->cellAttributes() ?>>
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <!-- ModifiedDateTime -->
        <td<?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <!-- BillDate -->
        <td<?= $Page->BillDate->cellAttributes() ?>>
<span<?= $Page->BillDate->viewAttributes() ?>>
<?= $Page->BillDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CurStock->Visible) { // CurStock ?>
        <!-- CurStock -->
        <td<?= $Page->CurStock->cellAttributes() ?>>
<span<?= $Page->CurStock->viewAttributes() ?>>
<?= $Page->CurStock->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
        <!-- grndate -->
        <td<?= $Page->grndate->cellAttributes() ?>>
<span<?= $Page->grndate->viewAttributes() ?>>
<?= $Page->grndate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <!-- grndatetime -->
        <td<?= $Page->grndatetime->cellAttributes() ?>>
<span<?= $Page->grndatetime->viewAttributes() ?>>
<?= $Page->grndatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->strid->Visible) { // strid ?>
        <!-- strid -->
        <td<?= $Page->strid->cellAttributes() ?>>
<span<?= $Page->strid->viewAttributes() ?>>
<?= $Page->strid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GRNPer->Visible) { // GRNPer ?>
        <!-- GRNPer -->
        <td<?= $Page->GRNPer->cellAttributes() ?>>
<span<?= $Page->GRNPer->viewAttributes() ?>>
<?= $Page->GRNPer->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <!-- FreeQtyyy -->
        <td<?= $Page->FreeQtyyy->cellAttributes() ?>>
<span<?= $Page->FreeQtyyy->viewAttributes() ?>>
<?= $Page->FreeQtyyy->getViewValue() ?></span>
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

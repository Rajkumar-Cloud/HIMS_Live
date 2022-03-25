<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPurchaseRequestItemsPurchasedPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacy_purchase_request_items_purchased"><!-- .card -->
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
<?php if ($Page->PRC->Visible) { // PRC ?>
    <?php if ($Page->SortUrl($Page->PRC) == "") { ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><?= $Page->PRC->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PRC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PRC->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PRC->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PRC->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PRC->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <?php if ($Page->SortUrl($Page->PrName) == "") { ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><?= $Page->PrName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PrName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PrName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PrName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
    <?php if ($Page->SortUrl($Page->Quantity) == "") { ?>
        <th class="<?= $Page->Quantity->headerCellClass() ?>"><?= $Page->Quantity->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Quantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Quantity->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Quantity->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Quantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Quantity->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
    <?php if ($Page->SortUrl($Page->ApprovedStatus) == "") { ?>
        <th class="<?= $Page->ApprovedStatus->headerCellClass() ?>"><?= $Page->ApprovedStatus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ApprovedStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ApprovedStatus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ApprovedStatus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ApprovedStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ApprovedStatus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
    <?php if ($Page->SortUrl($Page->PurchaseStatus) == "") { ?>
        <th class="<?= $Page->PurchaseStatus->headerCellClass() ?>"><?= $Page->PurchaseStatus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PurchaseStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PurchaseStatus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PurchaseStatus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PurchaseStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PurchaseStatus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <!-- PRC -->
        <td<?= $Page->PRC->cellAttributes() ?>>
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <!-- PrName -->
        <td<?= $Page->PrName->cellAttributes() ?>>
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <!-- Quantity -->
        <td<?= $Page->Quantity->cellAttributes() ?>>
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ApprovedStatus->Visible) { // ApprovedStatus ?>
        <!-- ApprovedStatus -->
        <td<?= $Page->ApprovedStatus->cellAttributes() ?>>
<span<?= $Page->ApprovedStatus->viewAttributes() ?>>
<?= $Page->ApprovedStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PurchaseStatus->Visible) { // PurchaseStatus ?>
        <!-- PurchaseStatus -->
        <td<?= $Page->PurchaseStatus->cellAttributes() ?>>
<span<?= $Page->PurchaseStatus->viewAttributes() ?>>
<?= $Page->PurchaseStatus->getViewValue() ?></span>
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

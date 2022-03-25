<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardServiceServicetypePreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_service_servicetype"><!-- .card -->
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
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <?php if ($Page->SortUrl($Page->DEPARTMENT) == "") { ?>
        <th class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><?= $Page->DEPARTMENT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DEPARTMENT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DEPARTMENT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DEPARTMENT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
    <?php if ($Page->SortUrl($Page->SERVICE_TYPE) == "") { ?>
        <th class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><?= $Page->SERVICE_TYPE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SERVICE_TYPE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SERVICE_TYPE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SERVICE_TYPE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->sumSubTotal->Visible) { // sum(SubTotal) ?>
    <?php if ($Page->SortUrl($Page->sumSubTotal) == "") { ?>
        <th class="<?= $Page->sumSubTotal->headerCellClass() ?>"><?= $Page->sumSubTotal->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->sumSubTotal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->sumSubTotal->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->sumSubTotal->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->sumSubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->sumSubTotal->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
    <?php if ($Page->SortUrl($Page->createdDate) == "") { ?>
        <th class="<?= $Page->createdDate->headerCellClass() ?>"><?= $Page->createdDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createdDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createdDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createdDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
    $Page->aggregateListRowValues(); // Aggregate row values

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
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <!-- DEPARTMENT -->
        <td<?= $Page->DEPARTMENT->cellAttributes() ?>>
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <!-- SERVICE_TYPE -->
        <td<?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->sumSubTotal->Visible) { // sum(SubTotal) ?>
        <!-- sum(SubTotal) -->
        <td<?= $Page->sumSubTotal->cellAttributes() ?>>
<span<?= $Page->sumSubTotal->viewAttributes() ?>>
<?= $Page->sumSubTotal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
        <!-- createdDate -->
        <td<?= $Page->createdDate->cellAttributes() ?>>
<span<?= $Page->createdDate->viewAttributes() ?>>
<?= $Page->createdDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
<?php
    // Render aggregate row
    $Page->RowType = ROWTYPE_AGGREGATE; // Aggregate
    $Page->aggregateListRow(); // Prepare aggregate row

    // Render list options
    $Page->renderListOptions();
?>
    <tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options (footer, left)
$Page->ListOptions->render("footer", "left");
?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <!-- DEPARTMENT -->
        <td class="<?= $Page->DEPARTMENT->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <!-- SERVICE_TYPE -->
        <td class="<?= $Page->SERVICE_TYPE->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->sumSubTotal->Visible) { // sum(SubTotal) ?>
        <!-- sum(SubTotal) -->
        <td class="<?= $Page->sumSubTotal->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->sumSubTotal->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
        <!-- createdDate -->
        <td class="<?= $Page->createdDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td class="<?= $Page->HospID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right");
?>
    </tr>
    </tfoot>
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

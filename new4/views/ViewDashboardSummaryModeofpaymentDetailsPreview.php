<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardSummaryModeofpaymentDetailsPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_summary_modeofpayment_details"><!-- .card -->
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
<?php if ($Page->_UserName->Visible) { // UserName ?>
    <?php if ($Page->SortUrl($Page->_UserName) == "") { ?>
        <th class="<?= $Page->_UserName->headerCellClass() ?>"><?= $Page->_UserName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->_UserName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->_UserName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->_UserName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->_UserName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->_UserName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <?php if ($Page->SortUrl($Page->ModeofPayment) == "") { ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><?= $Page->ModeofPayment->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ModeofPayment->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ModeofPayment->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ModeofPayment->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->sumAmount->Visible) { // sum(Amount) ?>
    <?php if ($Page->SortUrl($Page->sumAmount) == "") { ?>
        <th class="<?= $Page->sumAmount->headerCellClass() ?>"><?= $Page->sumAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->sumAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->sumAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->sumAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->sumAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->sumAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->createddate->Visible) { // createddate ?>
    <?php if ($Page->SortUrl($Page->createddate) == "") { ?>
        <th class="<?= $Page->createddate->headerCellClass() ?>"><?= $Page->createddate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createddate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createddate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createddate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createddate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->BillType->Visible) { // BillType ?>
    <?php if ($Page->SortUrl($Page->BillType) == "") { ?>
        <th class="<?= $Page->BillType->headerCellClass() ?>"><?= $Page->BillType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BillType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BillType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BillType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BillType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BillType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <!-- UserName -->
        <td<?= $Page->_UserName->cellAttributes() ?>>
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <!-- ModeofPayment -->
        <td<?= $Page->ModeofPayment->cellAttributes() ?>>
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->sumAmount->Visible) { // sum(Amount) ?>
        <!-- sum(Amount) -->
        <td<?= $Page->sumAmount->cellAttributes() ?>>
<span<?= $Page->sumAmount->viewAttributes() ?>>
<?= $Page->sumAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createddate->Visible) { // createddate ?>
        <!-- createddate -->
        <td<?= $Page->createddate->cellAttributes() ?>>
<span<?= $Page->createddate->viewAttributes() ?>>
<?= $Page->createddate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <!-- BillType -->
        <td<?= $Page->BillType->cellAttributes() ?>>
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
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
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <!-- UserName -->
        <td class="<?= $Page->_UserName->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <!-- ModeofPayment -->
        <td class="<?= $Page->ModeofPayment->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->sumAmount->Visible) { // sum(Amount) ?>
        <!-- sum(Amount) -->
        <td class="<?= $Page->sumAmount->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->sumAmount->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->createddate->Visible) { // createddate ?>
        <!-- createddate -->
        <td class="<?= $Page->createddate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td class="<?= $Page->HospID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <!-- BillType -->
        <td class="<?= $Page->BillType->footerCellClass() ?>">
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

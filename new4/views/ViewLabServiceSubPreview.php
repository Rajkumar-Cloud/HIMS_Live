<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewLabServiceSubPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_lab_service_sub"><!-- .card -->
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
<?php if ($Page->Id->Visible) { // Id ?>
    <?php if ($Page->SortUrl($Page->Id) == "") { ?>
        <th class="<?= $Page->Id->headerCellClass() ?>"><?= $Page->Id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <?php if ($Page->SortUrl($Page->CODE) == "") { ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><?= $Page->CODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
    <?php if ($Page->SortUrl($Page->SERVICE) == "") { ?>
        <th class="<?= $Page->SERVICE->headerCellClass() ?>"><?= $Page->SERVICE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SERVICE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SERVICE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SERVICE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SERVICE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SERVICE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
    <?php if ($Page->SortUrl($Page->UNITS) == "") { ?>
        <th class="<?= $Page->UNITS->headerCellClass() ?>"><?= $Page->UNITS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->UNITS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->UNITS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->UNITS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->UNITS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->UNITS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
    <?php if ($Page->SortUrl($Page->TestSubCd) == "") { ?>
        <th class="<?= $Page->TestSubCd->headerCellClass() ?>"><?= $Page->TestSubCd->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TestSubCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TestSubCd->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TestSubCd->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TestSubCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TestSubCd->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
    <?php if ($Page->SortUrl($Page->Method) == "") { ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><?= $Page->Method->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Method->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Method->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Method->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Method->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Method->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
    <?php if ($Page->SortUrl($Page->Order) == "") { ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><?= $Page->Order->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Order->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Order->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Order->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Order->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Order->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
    <?php if ($Page->SortUrl($Page->ResType) == "") { ?>
        <th class="<?= $Page->ResType->headerCellClass() ?>"><?= $Page->ResType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ResType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ResType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ResType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ResType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ResType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
    <?php if ($Page->SortUrl($Page->UnitCD) == "") { ?>
        <th class="<?= $Page->UnitCD->headerCellClass() ?>"><?= $Page->UnitCD->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->UnitCD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->UnitCD->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->UnitCD->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->UnitCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->UnitCD->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
    <?php if ($Page->SortUrl($Page->Sample) == "") { ?>
        <th class="<?= $Page->Sample->headerCellClass() ?>"><?= $Page->Sample->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Sample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Sample->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Sample->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Sample->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Sample->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
    <?php if ($Page->SortUrl($Page->NoD) == "") { ?>
        <th class="<?= $Page->NoD->headerCellClass() ?>"><?= $Page->NoD->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NoD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NoD->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NoD->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NoD->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NoD->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
    <?php if ($Page->SortUrl($Page->BillOrder) == "") { ?>
        <th class="<?= $Page->BillOrder->headerCellClass() ?>"><?= $Page->BillOrder->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BillOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BillOrder->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BillOrder->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BillOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BillOrder->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
    <?php if ($Page->SortUrl($Page->Formula) == "") { ?>
        <th class="<?= $Page->Formula->headerCellClass() ?>"><?= $Page->Formula->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Formula->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Formula->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Formula->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Formula->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Formula->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <?php if ($Page->SortUrl($Page->Inactive) == "") { ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><?= $Page->Inactive->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Inactive->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Inactive->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Inactive->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
    <?php if ($Page->SortUrl($Page->Outsource) == "") { ?>
        <th class="<?= $Page->Outsource->headerCellClass() ?>"><?= $Page->Outsource->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Outsource->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Outsource->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Outsource->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Outsource->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Outsource->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
    <?php if ($Page->SortUrl($Page->CollSample) == "") { ?>
        <th class="<?= $Page->CollSample->headerCellClass() ?>"><?= $Page->CollSample->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CollSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CollSample->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CollSample->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CollSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CollSample->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Id->Visible) { // Id ?>
        <!-- Id -->
        <td<?= $Page->Id->cellAttributes() ?>>
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <!-- CODE -->
        <td<?= $Page->CODE->cellAttributes() ?>>
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <!-- SERVICE -->
        <td<?= $Page->SERVICE->cellAttributes() ?>>
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <!-- UNITS -->
        <td<?= $Page->UNITS->cellAttributes() ?>>
<span<?= $Page->UNITS->viewAttributes() ?>>
<?= $Page->UNITS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <!-- TestSubCd -->
        <td<?= $Page->TestSubCd->cellAttributes() ?>>
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <!-- Method -->
        <td<?= $Page->Method->cellAttributes() ?>>
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <!-- Order -->
        <td<?= $Page->Order->cellAttributes() ?>>
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <!-- ResType -->
        <td<?= $Page->ResType->cellAttributes() ?>>
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <!-- UnitCD -->
        <td<?= $Page->UnitCD->cellAttributes() ?>>
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <!-- Sample -->
        <td<?= $Page->Sample->cellAttributes() ?>>
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <!-- NoD -->
        <td<?= $Page->NoD->cellAttributes() ?>>
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <!-- BillOrder -->
        <td<?= $Page->BillOrder->cellAttributes() ?>>
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Formula->Visible) { // Formula ?>
        <!-- Formula -->
        <td<?= $Page->Formula->cellAttributes() ?>>
<span<?= $Page->Formula->viewAttributes() ?>>
<?= $Page->Formula->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <!-- Inactive -->
        <td<?= $Page->Inactive->cellAttributes() ?>>
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <!-- Outsource -->
        <td<?= $Page->Outsource->cellAttributes() ?>>
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <!-- CollSample -->
        <td<?= $Page->CollSample->cellAttributes() ?>>
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
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

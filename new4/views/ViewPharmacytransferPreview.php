<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacytransferPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacytransfer"><!-- .card -->
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
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <?php if ($Page->SortUrl($Page->ORDNO) == "") { ?>
        <th class="<?= $Page->ORDNO->headerCellClass() ?>"><?= $Page->ORDNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ORDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ORDNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ORDNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ORDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ORDNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <?php if ($Page->SortUrl($Page->BRCODE) == "") { ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><?= $Page->BRCODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BRCODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BRCODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BRCODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
    <?php if ($Page->SortUrl($Page->LastMonthSale) == "") { ?>
        <th class="<?= $Page->LastMonthSale->headerCellClass() ?>"><?= $Page->LastMonthSale->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->LastMonthSale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->LastMonthSale->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->LastMonthSale->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->LastMonthSale->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->LastMonthSale->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
    <?php if ($Page->SortUrl($Page->BatchNo) == "") { ?>
        <th class="<?= $Page->BatchNo->headerCellClass() ?>"><?= $Page->BatchNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BatchNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BatchNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BatchNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BatchNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BatchNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
    <?php if ($Page->SortUrl($Page->ExpDate) == "") { ?>
        <th class="<?= $Page->ExpDate->headerCellClass() ?>"><?= $Page->ExpDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ExpDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ExpDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ExpDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ExpDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ExpDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <?php if ($Page->SortUrl($Page->MRP) == "") { ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><?= $Page->MRP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MRP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MRP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MRP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
    <?php if ($Page->SortUrl($Page->ItemValue) == "") { ?>
        <th class="<?= $Page->ItemValue->headerCellClass() ?>"><?= $Page->ItemValue->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ItemValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ItemValue->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ItemValue->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ItemValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ItemValue->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
    <?php if ($Page->SortUrl($Page->trid) == "") { ?>
        <th class="<?= $Page->trid->headerCellClass() ?>"><?= $Page->trid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->trid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->trid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->trid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->trid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->trid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
    <?php if ($Page->SortUrl($Page->grncreatedby) == "") { ?>
        <th class="<?= $Page->grncreatedby->headerCellClass() ?>"><?= $Page->grncreatedby->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->grncreatedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->grncreatedby->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->grncreatedby->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->grncreatedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->grncreatedby->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
    <?php if ($Page->SortUrl($Page->grncreatedDateTime) == "") { ?>
        <th class="<?= $Page->grncreatedDateTime->headerCellClass() ?>"><?= $Page->grncreatedDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->grncreatedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->grncreatedDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->grncreatedDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->grncreatedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->grncreatedDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
    <?php if ($Page->SortUrl($Page->grnModifiedby) == "") { ?>
        <th class="<?= $Page->grnModifiedby->headerCellClass() ?>"><?= $Page->grnModifiedby->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->grnModifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->grnModifiedby->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->grnModifiedby->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->grnModifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->grnModifiedby->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
    <?php if ($Page->SortUrl($Page->grnModifiedDateTime) == "") { ?>
        <th class="<?= $Page->grnModifiedDateTime->headerCellClass() ?>"><?= $Page->grnModifiedDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->grnModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->grnModifiedDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->grnModifiedDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->grnModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->grnModifiedDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
        <!-- ORDNO -->
        <td<?= $Page->ORDNO->cellAttributes() ?>>
<span<?= $Page->ORDNO->viewAttributes() ?>>
<?= $Page->ORDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <!-- BRCODE -->
        <td<?= $Page->BRCODE->cellAttributes() ?>>
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <!-- PRC -->
        <td<?= $Page->PRC->cellAttributes() ?>>
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->LastMonthSale->Visible) { // LastMonthSale ?>
        <!-- LastMonthSale -->
        <td<?= $Page->LastMonthSale->cellAttributes() ?>>
<span<?= $Page->LastMonthSale->viewAttributes() ?>>
<?= $Page->LastMonthSale->getViewValue() ?></span>
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
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <!-- BatchNo -->
        <td<?= $Page->BatchNo->cellAttributes() ?>>
<span<?= $Page->BatchNo->viewAttributes() ?>>
<?= $Page->BatchNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <!-- ExpDate -->
        <td<?= $Page->ExpDate->cellAttributes() ?>>
<span<?= $Page->ExpDate->viewAttributes() ?>>
<?= $Page->ExpDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <!-- MRP -->
        <td<?= $Page->MRP->cellAttributes() ?>>
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <!-- ItemValue -->
        <td<?= $Page->ItemValue->cellAttributes() ?>>
<span<?= $Page->ItemValue->viewAttributes() ?>>
<?= $Page->ItemValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->trid->Visible) { // trid ?>
        <!-- trid -->
        <td<?= $Page->trid->cellAttributes() ?>>
<span<?= $Page->trid->viewAttributes() ?>>
<?= $Page->trid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <!-- grncreatedby -->
        <td<?= $Page->grncreatedby->cellAttributes() ?>>
<span<?= $Page->grncreatedby->viewAttributes() ?>>
<?= $Page->grncreatedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <!-- grncreatedDateTime -->
        <td<?= $Page->grncreatedDateTime->cellAttributes() ?>>
<span<?= $Page->grncreatedDateTime->viewAttributes() ?>>
<?= $Page->grncreatedDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <!-- grnModifiedby -->
        <td<?= $Page->grnModifiedby->cellAttributes() ?>>
<span<?= $Page->grnModifiedby->viewAttributes() ?>>
<?= $Page->grnModifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <!-- grnModifiedDateTime -->
        <td<?= $Page->grnModifiedDateTime->cellAttributes() ?>>
<span<?= $Page->grnModifiedDateTime->viewAttributes() ?>>
<?= $Page->grnModifiedDateTime->getViewValue() ?></span>
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

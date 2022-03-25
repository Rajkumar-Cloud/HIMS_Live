<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacygrnPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacygrn"><!-- .card -->
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
<?php if ($Page->PrName->Visible) { // PrName ?>
    <?php if ($Page->SortUrl($Page->PrName) == "") { ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><?= $Page->PrName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PrName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PrName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PrName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
    <?php if ($Page->SortUrl($Page->GrnQuantity) == "") { ?>
        <th class="<?= $Page->GrnQuantity->headerCellClass() ?>"><?= $Page->GrnQuantity->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GrnQuantity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GrnQuantity->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GrnQuantity->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GrnQuantity->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GrnQuantity->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
    <?php if ($Page->SortUrl($Page->FreeQty) == "") { ?>
        <th class="<?= $Page->FreeQty->headerCellClass() ?>"><?= $Page->FreeQty->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FreeQty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FreeQty->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FreeQty->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FreeQty->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FreeQty->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->HSN->Visible) { // HSN ?>
    <?php if ($Page->SortUrl($Page->HSN) == "") { ?>
        <th class="<?= $Page->HSN->headerCellClass() ?>"><?= $Page->HSN->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HSN->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HSN->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HSN->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HSN->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HSN->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <?php if ($Page->SortUrl($Page->MFRCODE) == "") { ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><?= $Page->MFRCODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MFRCODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MFRCODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MFRCODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <?php if ($Page->SortUrl($Page->PUnit) == "") { ?>
        <th class="<?= $Page->PUnit->headerCellClass() ?>"><?= $Page->PUnit->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PUnit->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PUnit->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PUnit->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <?php if ($Page->SortUrl($Page->SUnit) == "") { ?>
        <th class="<?= $Page->SUnit->headerCellClass() ?>"><?= $Page->SUnit->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SUnit->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SUnit->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SUnit->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <?php if ($Page->SortUrl($Page->PurValue) == "") { ?>
        <th class="<?= $Page->PurValue->headerCellClass() ?>"><?= $Page->PurValue->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PurValue->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PurValue->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PurValue->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PurValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PurValue->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
    <?php if ($Page->SortUrl($Page->Disc) == "") { ?>
        <th class="<?= $Page->Disc->headerCellClass() ?>"><?= $Page->Disc->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Disc->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Disc->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Disc->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Disc->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Disc->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <?php if ($Page->SortUrl($Page->PSGST) == "") { ?>
        <th class="<?= $Page->PSGST->headerCellClass() ?>"><?= $Page->PSGST->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PSGST->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PSGST->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PSGST->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <?php if ($Page->SortUrl($Page->PCGST) == "") { ?>
        <th class="<?= $Page->PCGST->headerCellClass() ?>"><?= $Page->PCGST->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PCGST->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PCGST->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PCGST->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
    <?php if ($Page->SortUrl($Page->PTax) == "") { ?>
        <th class="<?= $Page->PTax->headerCellClass() ?>"><?= $Page->PTax->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PTax->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PTax->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PTax->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PTax->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->SalTax->Visible) { // SalTax ?>
    <?php if ($Page->SortUrl($Page->SalTax) == "") { ?>
        <th class="<?= $Page->SalTax->headerCellClass() ?>"><?= $Page->SalTax->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SalTax->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SalTax->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SalTax->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SalTax->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SalTax->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
    <?php if ($Page->SortUrl($Page->PurRate) == "") { ?>
        <th class="<?= $Page->PurRate->headerCellClass() ?>"><?= $Page->PurRate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PurRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PurRate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PurRate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PurRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PurRate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
    <?php if ($Page->SortUrl($Page->SalRate) == "") { ?>
        <th class="<?= $Page->SalRate->headerCellClass() ?>"><?= $Page->SalRate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SalRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SalRate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SalRate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SalRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SalRate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <?php if ($Page->SortUrl($Page->SSGST) == "") { ?>
        <th class="<?= $Page->SSGST->headerCellClass() ?>"><?= $Page->SSGST->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SSGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SSGST->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SSGST->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SSGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SSGST->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <?php if ($Page->SortUrl($Page->SCGST) == "") { ?>
        <th class="<?= $Page->SCGST->headerCellClass() ?>"><?= $Page->SCGST->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SCGST->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SCGST->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SCGST->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SCGST->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SCGST->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <!-- GrnQuantity -->
        <td<?= $Page->GrnQuantity->cellAttributes() ?>>
<span<?= $Page->GrnQuantity->viewAttributes() ?>>
<?= $Page->GrnQuantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <!-- Quantity -->
        <td<?= $Page->Quantity->cellAttributes() ?>>
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <!-- FreeQty -->
        <td<?= $Page->FreeQty->cellAttributes() ?>>
<span<?= $Page->FreeQty->viewAttributes() ?>>
<?= $Page->FreeQty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <!-- FreeQtyyy -->
        <td<?= $Page->FreeQtyyy->cellAttributes() ?>>
<span<?= $Page->FreeQtyyy->viewAttributes() ?>>
<?= $Page->FreeQtyyy->getViewValue() ?></span>
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
<?php if ($Page->HSN->Visible) { // HSN ?>
        <!-- HSN -->
        <td<?= $Page->HSN->cellAttributes() ?>>
<span<?= $Page->HSN->viewAttributes() ?>>
<?= $Page->HSN->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <!-- MFRCODE -->
        <td<?= $Page->MFRCODE->cellAttributes() ?>>
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <!-- PUnit -->
        <td<?= $Page->PUnit->cellAttributes() ?>>
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <!-- SUnit -->
        <td<?= $Page->SUnit->cellAttributes() ?>>
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <!-- MRP -->
        <td<?= $Page->MRP->cellAttributes() ?>>
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <!-- PurValue -->
        <td<?= $Page->PurValue->cellAttributes() ?>>
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
        <!-- Disc -->
        <td<?= $Page->Disc->cellAttributes() ?>>
<span<?= $Page->Disc->viewAttributes() ?>>
<?= $Page->Disc->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <!-- PSGST -->
        <td<?= $Page->PSGST->cellAttributes() ?>>
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <!-- PCGST -->
        <td<?= $Page->PCGST->cellAttributes() ?>>
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
        <!-- PTax -->
        <td<?= $Page->PTax->cellAttributes() ?>>
<span<?= $Page->PTax->viewAttributes() ?>>
<?= $Page->PTax->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <!-- ItemValue -->
        <td<?= $Page->ItemValue->cellAttributes() ?>>
<span<?= $Page->ItemValue->viewAttributes() ?>>
<?= $Page->ItemValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
        <!-- SalTax -->
        <td<?= $Page->SalTax->cellAttributes() ?>>
<span<?= $Page->SalTax->viewAttributes() ?>>
<?= $Page->SalTax->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <!-- PurRate -->
        <td<?= $Page->PurRate->cellAttributes() ?>>
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <!-- SalRate -->
        <td<?= $Page->SalRate->cellAttributes() ?>>
<span<?= $Page->SalRate->viewAttributes() ?>>
<?= $Page->SalRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <!-- SSGST -->
        <td<?= $Page->SSGST->cellAttributes() ?>>
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <!-- SCGST -->
        <td<?= $Page->SCGST->cellAttributes() ?>>
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <!-- BRCODE -->
        <td<?= $Page->BRCODE->cellAttributes() ?>>
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <!-- PRC -->
        <td class="<?= $Page->PRC->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <!-- PrName -->
        <td class="<?= $Page->PrName->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->GrnQuantity->Visible) { // GrnQuantity ?>
        <!-- GrnQuantity -->
        <td class="<?= $Page->GrnQuantity->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <!-- Quantity -->
        <td class="<?= $Page->Quantity->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->FreeQty->Visible) { // FreeQty ?>
        <!-- FreeQty -->
        <td class="<?= $Page->FreeQty->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->FreeQtyyy->Visible) { // FreeQtyyy ?>
        <!-- FreeQtyyy -->
        <td class="<?= $Page->FreeQtyyy->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BatchNo->Visible) { // BatchNo ?>
        <!-- BatchNo -->
        <td class="<?= $Page->BatchNo->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ExpDate->Visible) { // ExpDate ?>
        <!-- ExpDate -->
        <td class="<?= $Page->ExpDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HSN->Visible) { // HSN ?>
        <!-- HSN -->
        <td class="<?= $Page->HSN->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <!-- MFRCODE -->
        <td class="<?= $Page->MFRCODE->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <!-- PUnit -->
        <td class="<?= $Page->PUnit->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <!-- SUnit -->
        <td class="<?= $Page->SUnit->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <!-- MRP -->
        <td class="<?= $Page->MRP->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <!-- PurValue -->
        <td class="<?= $Page->PurValue->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Disc->Visible) { // Disc ?>
        <!-- Disc -->
        <td class="<?= $Page->Disc->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <!-- PSGST -->
        <td class="<?= $Page->PSGST->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <!-- PCGST -->
        <td class="<?= $Page->PCGST->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PTax->Visible) { // PTax ?>
        <!-- PTax -->
        <td class="<?= $Page->PTax->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->PTax->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->ItemValue->Visible) { // ItemValue ?>
        <!-- ItemValue -->
        <td class="<?= $Page->ItemValue->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->ItemValue->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->SalTax->Visible) { // SalTax ?>
        <!-- SalTax -->
        <td class="<?= $Page->SalTax->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SalTax->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <!-- PurRate -->
        <td class="<?= $Page->PurRate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SalRate->Visible) { // SalRate ?>
        <!-- SalRate -->
        <td class="<?= $Page->SalRate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <!-- SSGST -->
        <td class="<?= $Page->SSGST->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <!-- SCGST -->
        <td class="<?= $Page->SCGST->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <!-- BRCODE -->
        <td class="<?= $Page->BRCODE->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td class="<?= $Page->HospID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->grncreatedby->Visible) { // grncreatedby ?>
        <!-- grncreatedby -->
        <td class="<?= $Page->grncreatedby->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->grncreatedDateTime->Visible) { // grncreatedDateTime ?>
        <!-- grncreatedDateTime -->
        <td class="<?= $Page->grncreatedDateTime->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->grnModifiedby->Visible) { // grnModifiedby ?>
        <!-- grnModifiedby -->
        <td class="<?= $Page->grnModifiedby->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->grnModifiedDateTime->Visible) { // grnModifiedDateTime ?>
        <!-- grnModifiedDateTime -->
        <td class="<?= $Page->grnModifiedDateTime->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BillDate->Visible) { // BillDate ?>
        <!-- BillDate -->
        <td class="<?= $Page->BillDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->grndate->Visible) { // grndate ?>
        <!-- grndate -->
        <td class="<?= $Page->grndate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->grndatetime->Visible) { // grndatetime ?>
        <!-- grndatetime -->
        <td class="<?= $Page->grndatetime->footerCellClass() ?>">
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

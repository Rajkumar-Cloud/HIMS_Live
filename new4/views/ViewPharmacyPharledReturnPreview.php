<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyPharledReturnPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacy_pharled_return"><!-- .card -->
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
<?php if ($Page->SiNo->Visible) { // SiNo ?>
    <?php if ($Page->SortUrl($Page->SiNo) == "") { ?>
        <th class="<?= $Page->SiNo->headerCellClass() ?>"><?= $Page->SiNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SiNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SiNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SiNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
    <?php if ($Page->SortUrl($Page->Product) == "") { ?>
        <th class="<?= $Page->Product->headerCellClass() ?>"><?= $Page->Product->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Product->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Product->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Product->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Product->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Product->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
    <?php if ($Page->SortUrl($Page->SLNO) == "") { ?>
        <th class="<?= $Page->SLNO->headerCellClass() ?>"><?= $Page->SLNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SLNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SLNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SLNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <?php if ($Page->SortUrl($Page->RT) == "") { ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><?= $Page->RT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <?php if ($Page->SortUrl($Page->MRQ) == "") { ?>
        <th class="<?= $Page->MRQ->headerCellClass() ?>"><?= $Page->MRQ->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MRQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MRQ->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MRQ->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MRQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MRQ->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <?php if ($Page->SortUrl($Page->IQ) == "") { ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><?= $Page->IQ->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IQ->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IQ->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IQ->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
    <?php if ($Page->SortUrl($Page->DAMT) == "") { ?>
        <th class="<?= $Page->DAMT->headerCellClass() ?>"><?= $Page->DAMT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DAMT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DAMT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DAMT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DAMT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DAMT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <?php if ($Page->SortUrl($Page->BATCHNO) == "") { ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><?= $Page->BATCHNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BATCHNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BATCHNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BATCHNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BATCHNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BATCHNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <?php if ($Page->SortUrl($Page->EXPDT) == "") { ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><?= $Page->EXPDT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EXPDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EXPDT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EXPDT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EXPDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EXPDT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
    <?php if ($Page->SortUrl($Page->Mfg) == "") { ?>
        <th class="<?= $Page->Mfg->headerCellClass() ?>"><?= $Page->Mfg->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Mfg->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Mfg->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Mfg->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Mfg->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Mfg->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
    <?php if ($Page->SortUrl($Page->UR) == "") { ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><?= $Page->UR->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->UR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->UR->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->UR->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->UR->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->UR->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
    <?php if ($Page->SortUrl($Page->_USERID) == "") { ?>
        <th class="<?= $Page->_USERID->headerCellClass() ?>"><?= $Page->_USERID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->_USERID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->_USERID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->_USERID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->_USERID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->_USERID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <?php if ($Page->SortUrl($Page->id) == "") { ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><?= $Page->id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
    <?php if ($Page->SortUrl($Page->HosoID) == "") { ?>
        <th class="<?= $Page->HosoID->headerCellClass() ?>"><?= $Page->HosoID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HosoID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HosoID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HosoID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HosoID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HosoID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <?php if ($Page->SortUrl($Page->createdby) == "") { ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><?= $Page->createdby->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createdby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createdby->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createdby->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createdby->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createdby->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <?php if ($Page->SortUrl($Page->createddatetime) == "") { ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><?= $Page->createddatetime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createddatetime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createddatetime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createddatetime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <?php if ($Page->SortUrl($Page->modifiedby) == "") { ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><?= $Page->modifiedby->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->modifiedby->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->modifiedby->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->modifiedby->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->modifiedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->modifiedby->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <?php if ($Page->SortUrl($Page->modifieddatetime) == "") { ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><?= $Page->modifieddatetime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->modifieddatetime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->modifieddatetime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->modifieddatetime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->modifieddatetime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
    <?php if ($Page->SortUrl($Page->BRNAME) == "") { ?>
        <th class="<?= $Page->BRNAME->headerCellClass() ?>"><?= $Page->BRNAME->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BRNAME->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BRNAME->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BRNAME->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BRNAME->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BRNAME->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->SiNo->Visible) { // SiNo ?>
        <!-- SiNo -->
        <td<?= $Page->SiNo->cellAttributes() ?>>
<span<?= $Page->SiNo->viewAttributes() ?>>
<?= $Page->SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
        <!-- Product -->
        <td<?= $Page->Product->cellAttributes() ?>>
<span<?= $Page->Product->viewAttributes() ?>>
<?= $Page->Product->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
        <!-- SLNO -->
        <td<?= $Page->SLNO->cellAttributes() ?>>
<span<?= $Page->SLNO->viewAttributes() ?>>
<?= $Page->SLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <!-- RT -->
        <td<?= $Page->RT->cellAttributes() ?>>
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <!-- MRQ -->
        <td<?= $Page->MRQ->cellAttributes() ?>>
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <!-- IQ -->
        <td<?= $Page->IQ->cellAttributes() ?>>
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
        <!-- DAMT -->
        <td<?= $Page->DAMT->cellAttributes() ?>>
<span<?= $Page->DAMT->viewAttributes() ?>>
<?= $Page->DAMT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <!-- BATCHNO -->
        <td<?= $Page->BATCHNO->cellAttributes() ?>>
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <!-- EXPDT -->
        <td<?= $Page->EXPDT->cellAttributes() ?>>
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
        <!-- Mfg -->
        <td<?= $Page->Mfg->cellAttributes() ?>>
<span<?= $Page->Mfg->viewAttributes() ?>>
<?= $Page->Mfg->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <!-- UR -->
        <td<?= $Page->UR->cellAttributes() ?>>
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
        <!-- USERID -->
        <td<?= $Page->_USERID->cellAttributes() ?>>
<span<?= $Page->_USERID->viewAttributes() ?>>
<?= $Page->_USERID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td<?= $Page->id->cellAttributes() ?>>
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
        <!-- HosoID -->
        <td<?= $Page->HosoID->cellAttributes() ?>>
<span<?= $Page->HosoID->viewAttributes() ?>>
<?= $Page->HosoID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <!-- createdby -->
        <td<?= $Page->createdby->cellAttributes() ?>>
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <!-- createddatetime -->
        <td<?= $Page->createddatetime->cellAttributes() ?>>
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <!-- modifiedby -->
        <td<?= $Page->modifiedby->cellAttributes() ?>>
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <!-- modifieddatetime -->
        <td<?= $Page->modifieddatetime->cellAttributes() ?>>
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <!-- BRNAME -->
        <td<?= $Page->BRNAME->cellAttributes() ?>>
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
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

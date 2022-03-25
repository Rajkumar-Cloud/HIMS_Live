<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyMovementItemPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_pharmacy_movement_item"><!-- .card -->
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
<?php if ($Page->ProductFrom->Visible) { // ProductFrom ?>
    <?php if ($Page->SortUrl($Page->ProductFrom) == "") { ?>
        <th class="<?= $Page->ProductFrom->headerCellClass() ?>"><?= $Page->ProductFrom->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProductFrom->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProductFrom->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProductFrom->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProductFrom->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProductFrom->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->IQ->Visible) { // IQ ?>
    <?php if ($Page->SortUrl($Page->IQ) == "") { ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><?= $Page->IQ->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IQ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IQ->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IQ->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IQ->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IQ->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <?php if ($Page->SortUrl($Page->BRCODE) == "") { ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><?= $Page->BRCODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BRCODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BRCODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BRCODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
    <?php if ($Page->SortUrl($Page->OPNO) == "") { ?>
        <th class="<?= $Page->OPNO->headerCellClass() ?>"><?= $Page->OPNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OPNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OPNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OPNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OPNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OPNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
    <?php if ($Page->SortUrl($Page->IPNO) == "") { ?>
        <th class="<?= $Page->IPNO->headerCellClass() ?>"><?= $Page->IPNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IPNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IPNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IPNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IPNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IPNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientBILLNO->Visible) { // PatientBILLNO ?>
    <?php if ($Page->SortUrl($Page->PatientBILLNO) == "") { ?>
        <th class="<?= $Page->PatientBILLNO->headerCellClass() ?>"><?= $Page->PatientBILLNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientBILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientBILLNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientBILLNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientBILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientBILLNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
    <?php if ($Page->SortUrl($Page->BILLDT) == "") { ?>
        <th class="<?= $Page->BILLDT->headerCellClass() ?>"><?= $Page->BILLDT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BILLDT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BILLDT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BILLDT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BILLDT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BILLDT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
    <?php if ($Page->SortUrl($Page->GRNNO) == "") { ?>
        <th class="<?= $Page->GRNNO->headerCellClass() ?>"><?= $Page->GRNNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GRNNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GRNNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GRNNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GRNNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GRNNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <?php if ($Page->SortUrl($Page->DT) == "") { ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><?= $Page->DT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <?php if ($Page->SortUrl($Page->Customername) == "") { ?>
        <th class="<?= $Page->Customername->headerCellClass() ?>"><?= $Page->Customername->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Customername->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Customername->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Customername->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Customername->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Customername->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
    <?php if ($Page->SortUrl($Page->BILLNO) == "") { ?>
        <th class="<?= $Page->BILLNO->headerCellClass() ?>"><?= $Page->BILLNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BILLNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BILLNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BILLNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BILLNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BILLNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->prc->Visible) { // prc ?>
    <?php if ($Page->SortUrl($Page->prc) == "") { ?>
        <th class="<?= $Page->prc->headerCellClass() ?>"><?= $Page->prc->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->prc->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->prc->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->prc->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->prc->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->prc->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <?php if ($Page->SortUrl($Page->MFRCODE) == "") { ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><?= $Page->MFRCODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MFRCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MFRCODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MFRCODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MFRCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MFRCODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->hsn->Visible) { // hsn ?>
    <?php if ($Page->SortUrl($Page->hsn) == "") { ?>
        <th class="<?= $Page->hsn->headerCellClass() ?>"><?= $Page->hsn->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->hsn->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->hsn->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->hsn->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->hsn->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->hsn->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->ProductFrom->Visible) { // ProductFrom ?>
        <!-- ProductFrom -->
        <td<?= $Page->ProductFrom->cellAttributes() ?>>
<span<?= $Page->ProductFrom->viewAttributes() ?>>
<?= $Page->ProductFrom->getViewValue() ?></span>
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
<?php if ($Page->IQ->Visible) { // IQ ?>
        <!-- IQ -->
        <td<?= $Page->IQ->cellAttributes() ?>>
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <!-- MRQ -->
        <td<?= $Page->MRQ->cellAttributes() ?>>
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <!-- BRCODE -->
        <td<?= $Page->BRCODE->cellAttributes() ?>>
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
        <!-- OPNO -->
        <td<?= $Page->OPNO->cellAttributes() ?>>
<span<?= $Page->OPNO->viewAttributes() ?>>
<?= $Page->OPNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
        <!-- IPNO -->
        <td<?= $Page->IPNO->cellAttributes() ?>>
<span<?= $Page->IPNO->viewAttributes() ?>>
<?= $Page->IPNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientBILLNO->Visible) { // PatientBILLNO ?>
        <!-- PatientBILLNO -->
        <td<?= $Page->PatientBILLNO->cellAttributes() ?>>
<span<?= $Page->PatientBILLNO->viewAttributes() ?>>
<?= $Page->PatientBILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
        <!-- BILLDT -->
        <td<?= $Page->BILLDT->cellAttributes() ?>>
<span<?= $Page->BILLDT->viewAttributes() ?>>
<?= $Page->BILLDT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GRNNO->Visible) { // GRNNO ?>
        <!-- GRNNO -->
        <td<?= $Page->GRNNO->cellAttributes() ?>>
<span<?= $Page->GRNNO->viewAttributes() ?>>
<?= $Page->GRNNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
        <!-- DT -->
        <td<?= $Page->DT->cellAttributes() ?>>
<span<?= $Page->DT->viewAttributes() ?>>
<?= $Page->DT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
        <!-- Customername -->
        <td<?= $Page->Customername->cellAttributes() ?>>
<span<?= $Page->Customername->viewAttributes() ?>>
<?= $Page->Customername->getViewValue() ?></span>
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
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
        <!-- BILLNO -->
        <td<?= $Page->BILLNO->cellAttributes() ?>>
<span<?= $Page->BILLNO->viewAttributes() ?>>
<?= $Page->BILLNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->prc->Visible) { // prc ?>
        <!-- prc -->
        <td<?= $Page->prc->cellAttributes() ?>>
<span<?= $Page->prc->viewAttributes() ?>>
<?= $Page->prc->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <!-- PrName -->
        <td<?= $Page->PrName->cellAttributes() ?>>
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
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
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <!-- MFRCODE -->
        <td<?= $Page->MFRCODE->cellAttributes() ?>>
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->hsn->Visible) { // hsn ?>
        <!-- hsn -->
        <td<?= $Page->hsn->cellAttributes() ?>>
<span<?= $Page->hsn->viewAttributes() ?>>
<?= $Page->hsn->getViewValue() ?></span>
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

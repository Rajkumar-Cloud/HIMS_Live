<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIpAdvancePreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_ip_advance"><!-- .card -->
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
<?php if ($Page->Name->Visible) { // Name ?>
    <?php if ($Page->SortUrl($Page->Name) == "") { ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><?= $Page->Name->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Name->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Name->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Name->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <?php if ($Page->SortUrl($Page->Mobile) == "") { ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><?= $Page->Mobile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Mobile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Mobile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Mobile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <?php if ($Page->SortUrl($Page->voucher_type) == "") { ?>
        <th class="<?= $Page->voucher_type->headerCellClass() ?>"><?= $Page->voucher_type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->voucher_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->voucher_type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->voucher_type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->voucher_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->voucher_type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <?php if ($Page->SortUrl($Page->Details) == "") { ?>
        <th class="<?= $Page->Details->headerCellClass() ?>"><?= $Page->Details->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Details->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Details->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Details->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Details->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Details->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Amount->Visible) { // Amount ?>
    <?php if ($Page->SortUrl($Page->Amount) == "") { ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><?= $Page->Amount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Amount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Amount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Amount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <?php if ($Page->SortUrl($Page->AnyDues) == "") { ?>
        <th class="<?= $Page->AnyDues->headerCellClass() ?>"><?= $Page->AnyDues->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AnyDues->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AnyDues->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AnyDues->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AnyDues->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AnyDues->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatID->Visible) { // PatID ?>
    <?php if ($Page->SortUrl($Page->PatID) == "") { ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><?= $Page->PatID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php if ($Page->SortUrl($Page->PatientID) == "") { ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><?= $Page->PatientID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php if ($Page->SortUrl($Page->PatientName) == "") { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><?= $Page->PatientName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
    <?php if ($Page->SortUrl($Page->VisiteType) == "") { ?>
        <th class="<?= $Page->VisiteType->headerCellClass() ?>"><?= $Page->VisiteType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->VisiteType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->VisiteType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->VisiteType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->VisiteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->VisiteType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
    <?php if ($Page->SortUrl($Page->VisitDate) == "") { ?>
        <th class="<?= $Page->VisitDate->headerCellClass() ?>"><?= $Page->VisitDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->VisitDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->VisitDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->VisitDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->VisitDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->VisitDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
    <?php if ($Page->SortUrl($Page->AdvanceNo) == "") { ?>
        <th class="<?= $Page->AdvanceNo->headerCellClass() ?>"><?= $Page->AdvanceNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AdvanceNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AdvanceNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AdvanceNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AdvanceNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AdvanceNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <?php if ($Page->SortUrl($Page->Status) == "") { ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><?= $Page->Status->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Status->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Status->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Status->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
    <?php if ($Page->SortUrl($Page->Date) == "") { ?>
        <th class="<?= $Page->Date->headerCellClass() ?>"><?= $Page->Date->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Date->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Date->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Date->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
    <?php if ($Page->SortUrl($Page->AdvanceValidityDate) == "") { ?>
        <th class="<?= $Page->AdvanceValidityDate->headerCellClass() ?>"><?= $Page->AdvanceValidityDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AdvanceValidityDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AdvanceValidityDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AdvanceValidityDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AdvanceValidityDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AdvanceValidityDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
    <?php if ($Page->SortUrl($Page->TotalRemainingAdvance) == "") { ?>
        <th class="<?= $Page->TotalRemainingAdvance->headerCellClass() ?>"><?= $Page->TotalRemainingAdvance->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TotalRemainingAdvance->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TotalRemainingAdvance->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TotalRemainingAdvance->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TotalRemainingAdvance->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TotalRemainingAdvance->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
    <?php if ($Page->SortUrl($Page->Remarks) == "") { ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><?= $Page->Remarks->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Remarks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Remarks->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Remarks->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Remarks->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
    <?php if ($Page->SortUrl($Page->SeectPaymentMode) == "") { ?>
        <th class="<?= $Page->SeectPaymentMode->headerCellClass() ?>"><?= $Page->SeectPaymentMode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SeectPaymentMode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SeectPaymentMode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SeectPaymentMode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SeectPaymentMode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SeectPaymentMode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
    <?php if ($Page->SortUrl($Page->PaidAmount) == "") { ?>
        <th class="<?= $Page->PaidAmount->headerCellClass() ?>"><?= $Page->PaidAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PaidAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PaidAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PaidAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PaidAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PaidAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
    <?php if ($Page->SortUrl($Page->Currency) == "") { ?>
        <th class="<?= $Page->Currency->headerCellClass() ?>"><?= $Page->Currency->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Currency->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Currency->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Currency->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Currency->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Currency->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
    <?php if ($Page->SortUrl($Page->CardNumber) == "") { ?>
        <th class="<?= $Page->CardNumber->headerCellClass() ?>"><?= $Page->CardNumber->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CardNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CardNumber->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CardNumber->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CardNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CardNumber->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
    <?php if ($Page->SortUrl($Page->BankName) == "") { ?>
        <th class="<?= $Page->BankName->headerCellClass() ?>"><?= $Page->BankName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BankName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BankName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BankName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BankName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BankName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Reception->Visible) { // Reception ?>
    <?php if ($Page->SortUrl($Page->Reception) == "") { ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><?= $Page->Reception->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Reception->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Reception->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Reception->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <?php if ($Page->SortUrl($Page->mrnno) == "") { ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><?= $Page->mrnno->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->mrnno->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->mrnno->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->mrnno->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Name->Visible) { // Name ?>
        <!-- Name -->
        <td<?= $Page->Name->cellAttributes() ?>>
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <!-- Mobile -->
        <td<?= $Page->Mobile->cellAttributes() ?>>
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <!-- voucher_type -->
        <td<?= $Page->voucher_type->cellAttributes() ?>>
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <!-- Details -->
        <td<?= $Page->Details->cellAttributes() ?>>
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <!-- ModeofPayment -->
        <td<?= $Page->ModeofPayment->cellAttributes() ?>>
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <!-- Amount -->
        <td<?= $Page->Amount->cellAttributes() ?>>
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <!-- AnyDues -->
        <td<?= $Page->AnyDues->cellAttributes() ?>>
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
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
<?php if ($Page->PatID->Visible) { // PatID ?>
        <!-- PatID -->
        <td<?= $Page->PatID->cellAttributes() ?>>
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <!-- PatientID -->
        <td<?= $Page->PatientID->cellAttributes() ?>>
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td<?= $Page->PatientName->cellAttributes() ?>>
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->VisiteType->Visible) { // VisiteType ?>
        <!-- VisiteType -->
        <td<?= $Page->VisiteType->cellAttributes() ?>>
<span<?= $Page->VisiteType->viewAttributes() ?>>
<?= $Page->VisiteType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->VisitDate->Visible) { // VisitDate ?>
        <!-- VisitDate -->
        <td<?= $Page->VisitDate->cellAttributes() ?>>
<span<?= $Page->VisitDate->viewAttributes() ?>>
<?= $Page->VisitDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AdvanceNo->Visible) { // AdvanceNo ?>
        <!-- AdvanceNo -->
        <td<?= $Page->AdvanceNo->cellAttributes() ?>>
<span<?= $Page->AdvanceNo->viewAttributes() ?>>
<?= $Page->AdvanceNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <!-- Status -->
        <td<?= $Page->Status->cellAttributes() ?>>
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <!-- Date -->
        <td<?= $Page->Date->cellAttributes() ?>>
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AdvanceValidityDate->Visible) { // AdvanceValidityDate ?>
        <!-- AdvanceValidityDate -->
        <td<?= $Page->AdvanceValidityDate->cellAttributes() ?>>
<span<?= $Page->AdvanceValidityDate->viewAttributes() ?>>
<?= $Page->AdvanceValidityDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TotalRemainingAdvance->Visible) { // TotalRemainingAdvance ?>
        <!-- TotalRemainingAdvance -->
        <td<?= $Page->TotalRemainingAdvance->cellAttributes() ?>>
<span<?= $Page->TotalRemainingAdvance->viewAttributes() ?>>
<?= $Page->TotalRemainingAdvance->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <!-- Remarks -->
        <td<?= $Page->Remarks->cellAttributes() ?>>
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SeectPaymentMode->Visible) { // SeectPaymentMode ?>
        <!-- SeectPaymentMode -->
        <td<?= $Page->SeectPaymentMode->cellAttributes() ?>>
<span<?= $Page->SeectPaymentMode->viewAttributes() ?>>
<?= $Page->SeectPaymentMode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PaidAmount->Visible) { // PaidAmount ?>
        <!-- PaidAmount -->
        <td<?= $Page->PaidAmount->cellAttributes() ?>>
<span<?= $Page->PaidAmount->viewAttributes() ?>>
<?= $Page->PaidAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Currency->Visible) { // Currency ?>
        <!-- Currency -->
        <td<?= $Page->Currency->cellAttributes() ?>>
<span<?= $Page->Currency->viewAttributes() ?>>
<?= $Page->Currency->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CardNumber->Visible) { // CardNumber ?>
        <!-- CardNumber -->
        <td<?= $Page->CardNumber->cellAttributes() ?>>
<span<?= $Page->CardNumber->viewAttributes() ?>>
<?= $Page->CardNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BankName->Visible) { // BankName ?>
        <!-- BankName -->
        <td<?= $Page->BankName->cellAttributes() ?>>
<span<?= $Page->BankName->viewAttributes() ?>>
<?= $Page->BankName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <!-- Reception -->
        <td<?= $Page->Reception->cellAttributes() ?>>
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <!-- mrnno -->
        <td<?= $Page->mrnno->cellAttributes() ?>>
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
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

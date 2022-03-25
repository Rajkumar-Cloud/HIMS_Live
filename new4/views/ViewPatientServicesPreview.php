<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPatientServicesPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_patient_services"><!-- .card -->
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
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php if ($Page->SortUrl($Page->PatientName) == "") { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><?= $Page->PatientName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <?php if ($Page->SortUrl($Page->Age) == "") { ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><?= $Page->Age->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Age->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Age->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Age->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <?php if ($Page->SortUrl($Page->Gender) == "") { ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><?= $Page->Gender->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Gender->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Gender->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Gender->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Gender->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Gender->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <?php if ($Page->SortUrl($Page->profilePic) == "") { ?>
        <th class="<?= $Page->profilePic->headerCellClass() ?>"><?= $Page->profilePic->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->profilePic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->profilePic->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->profilePic->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->profilePic->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->profilePic->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
    <?php if ($Page->SortUrl($Page->Services) == "") { ?>
        <th class="<?= $Page->Services->headerCellClass() ?>"><?= $Page->Services->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Services->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Services->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Services->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <?php if ($Page->SortUrl($Page->Unit) == "") { ?>
        <th class="<?= $Page->Unit->headerCellClass() ?>"><?= $Page->Unit->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Unit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Unit->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Unit->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Unit->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <?php if ($Page->SortUrl($Page->amount) == "") { ?>
        <th class="<?= $Page->amount->headerCellClass() ?>"><?= $Page->amount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->amount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->amount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->amount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
    <?php if ($Page->SortUrl($Page->DiscountCategory) == "") { ?>
        <th class="<?= $Page->DiscountCategory->headerCellClass() ?>"><?= $Page->DiscountCategory->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DiscountCategory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DiscountCategory->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DiscountCategory->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DiscountCategory->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DiscountCategory->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
    <?php if ($Page->SortUrl($Page->Discount) == "") { ?>
        <th class="<?= $Page->Discount->headerCellClass() ?>"><?= $Page->Discount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Discount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Discount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Discount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Discount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Discount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
    <?php if ($Page->SortUrl($Page->SubTotal) == "") { ?>
        <th class="<?= $Page->SubTotal->headerCellClass() ?>"><?= $Page->SubTotal->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SubTotal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SubTotal->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SubTotal->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SubTotal->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
    <?php if ($Page->SortUrl($Page->description) == "") { ?>
        <th class="<?= $Page->description->headerCellClass() ?>"><?= $Page->description->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->description->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->description->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->description->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->description->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->description->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
    <?php if ($Page->SortUrl($Page->patient_type) == "") { ?>
        <th class="<?= $Page->patient_type->headerCellClass() ?>"><?= $Page->patient_type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->patient_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->patient_type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->patient_type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->patient_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->patient_type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <?php if ($Page->SortUrl($Page->charged_date) == "") { ?>
        <th class="<?= $Page->charged_date->headerCellClass() ?>"><?= $Page->charged_date->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->charged_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->charged_date->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->charged_date->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->charged_date->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <?php if ($Page->SortUrl($Page->status) == "") { ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><?= $Page->status->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->status->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->status->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->status->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->status->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Aid->Visible) { // Aid ?>
    <?php if ($Page->SortUrl($Page->Aid) == "") { ?>
        <th class="<?= $Page->Aid->headerCellClass() ?>"><?= $Page->Aid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Aid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Aid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Aid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Aid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Aid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
    <?php if ($Page->SortUrl($Page->Vid) == "") { ?>
        <th class="<?= $Page->Vid->headerCellClass() ?>"><?= $Page->Vid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Vid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Vid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Vid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <?php if ($Page->SortUrl($Page->DrID) == "") { ?>
        <th class="<?= $Page->DrID->headerCellClass() ?>"><?= $Page->DrID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
    <?php if ($Page->SortUrl($Page->DrCODE) == "") { ?>
        <th class="<?= $Page->DrCODE->headerCellClass() ?>"><?= $Page->DrCODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrCODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrCODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrCODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrCODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrCODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <?php if ($Page->SortUrl($Page->DrName) == "") { ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><?= $Page->DrName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
    <?php if ($Page->SortUrl($Page->Department) == "") { ?>
        <th class="<?= $Page->Department->headerCellClass() ?>"><?= $Page->Department->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Department->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Department->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Department->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
    <?php if ($Page->SortUrl($Page->DrSharePres) == "") { ?>
        <th class="<?= $Page->DrSharePres->headerCellClass() ?>"><?= $Page->DrSharePres->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrSharePres->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrSharePres->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrSharePres->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrSharePres->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
    <?php if ($Page->SortUrl($Page->HospSharePres) == "") { ?>
        <th class="<?= $Page->HospSharePres->headerCellClass() ?>"><?= $Page->HospSharePres->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HospSharePres->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HospSharePres->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HospSharePres->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HospSharePres->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HospSharePres->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
    <?php if ($Page->SortUrl($Page->DrShareAmount) == "") { ?>
        <th class="<?= $Page->DrShareAmount->headerCellClass() ?>"><?= $Page->DrShareAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrShareAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrShareAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrShareAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrShareAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
    <?php if ($Page->SortUrl($Page->HospShareAmount) == "") { ?>
        <th class="<?= $Page->HospShareAmount->headerCellClass() ?>"><?= $Page->HospShareAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HospShareAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HospShareAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HospShareAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HospShareAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HospShareAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
    <?php if ($Page->SortUrl($Page->DrShareSettiledAmount) == "") { ?>
        <th class="<?= $Page->DrShareSettiledAmount->headerCellClass() ?>"><?= $Page->DrShareSettiledAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrShareSettiledAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrShareSettiledAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrShareSettiledAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrShareSettiledAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrShareSettiledAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
    <?php if ($Page->SortUrl($Page->DrShareSettledId) == "") { ?>
        <th class="<?= $Page->DrShareSettledId->headerCellClass() ?>"><?= $Page->DrShareSettledId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrShareSettledId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrShareSettledId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrShareSettledId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrShareSettledId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrShareSettledId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
    <?php if ($Page->SortUrl($Page->DrShareSettiledStatus) == "") { ?>
        <th class="<?= $Page->DrShareSettiledStatus->headerCellClass() ?>"><?= $Page->DrShareSettiledStatus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrShareSettiledStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrShareSettiledStatus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrShareSettiledStatus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrShareSettiledStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrShareSettiledStatus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
    <?php if ($Page->SortUrl($Page->invoiceId) == "") { ?>
        <th class="<?= $Page->invoiceId->headerCellClass() ?>"><?= $Page->invoiceId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->invoiceId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->invoiceId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->invoiceId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->invoiceId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->invoiceId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
    <?php if ($Page->SortUrl($Page->invoiceAmount) == "") { ?>
        <th class="<?= $Page->invoiceAmount->headerCellClass() ?>"><?= $Page->invoiceAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->invoiceAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->invoiceAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->invoiceAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->invoiceAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->invoiceAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
    <?php if ($Page->SortUrl($Page->invoiceStatus) == "") { ?>
        <th class="<?= $Page->invoiceStatus->headerCellClass() ?>"><?= $Page->invoiceStatus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->invoiceStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->invoiceStatus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->invoiceStatus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->invoiceStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->invoiceStatus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
    <?php if ($Page->SortUrl($Page->modeOfPayment) == "") { ?>
        <th class="<?= $Page->modeOfPayment->headerCellClass() ?>"><?= $Page->modeOfPayment->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->modeOfPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->modeOfPayment->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->modeOfPayment->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->modeOfPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->modeOfPayment->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <?php if ($Page->SortUrl($Page->RIDNO) == "") { ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><?= $Page->RIDNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RIDNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RIDNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RIDNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
    <?php if ($Page->SortUrl($Page->ItemCode) == "") { ?>
        <th class="<?= $Page->ItemCode->headerCellClass() ?>"><?= $Page->ItemCode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ItemCode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ItemCode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ItemCode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <?php if ($Page->SortUrl($Page->TidNo) == "") { ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><?= $Page->TidNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TidNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TidNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TidNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
    <?php if ($Page->SortUrl($Page->sid) == "") { ?>
        <th class="<?= $Page->sid->headerCellClass() ?>"><?= $Page->sid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->sid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->sid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->sid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->sid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->sid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <?php if ($Page->SortUrl($Page->DEptCd) == "") { ?>
        <th class="<?= $Page->DEptCd->headerCellClass() ?>"><?= $Page->DEptCd->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DEptCd->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DEptCd->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DEptCd->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
    <?php if ($Page->SortUrl($Page->ProfCd) == "") { ?>
        <th class="<?= $Page->ProfCd->headerCellClass() ?>"><?= $Page->ProfCd->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProfCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProfCd->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProfCd->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProfCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProfCd->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
    <?php if ($Page->SortUrl($Page->Comments) == "") { ?>
        <th class="<?= $Page->Comments->headerCellClass() ?>"><?= $Page->Comments->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Comments->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Comments->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Comments->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Comments->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Comments->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Specimen->Visible) { // Specimen ?>
    <?php if ($Page->SortUrl($Page->Specimen) == "") { ?>
        <th class="<?= $Page->Specimen->headerCellClass() ?>"><?= $Page->Specimen->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Specimen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Specimen->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Specimen->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Specimen->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Specimen->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
    <?php if ($Page->SortUrl($Page->Abnormal) == "") { ?>
        <th class="<?= $Page->Abnormal->headerCellClass() ?>"><?= $Page->Abnormal->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Abnormal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Abnormal->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Abnormal->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Abnormal->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Abnormal->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
    <?php if ($Page->SortUrl($Page->TestUnit) == "") { ?>
        <th class="<?= $Page->TestUnit->headerCellClass() ?>"><?= $Page->TestUnit->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TestUnit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TestUnit->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TestUnit->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TestUnit->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TestUnit->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
    <?php if ($Page->SortUrl($Page->LOWHIGH) == "") { ?>
        <th class="<?= $Page->LOWHIGH->headerCellClass() ?>"><?= $Page->LOWHIGH->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->LOWHIGH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->LOWHIGH->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->LOWHIGH->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->LOWHIGH->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->LOWHIGH->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
    <?php if ($Page->SortUrl($Page->Branch) == "") { ?>
        <th class="<?= $Page->Branch->headerCellClass() ?>"><?= $Page->Branch->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Branch->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Branch->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Branch->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Branch->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Branch->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
    <?php if ($Page->SortUrl($Page->Dispatch) == "") { ?>
        <th class="<?= $Page->Dispatch->headerCellClass() ?>"><?= $Page->Dispatch->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Dispatch->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Dispatch->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Dispatch->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Dispatch->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Dispatch->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
    <?php if ($Page->SortUrl($Page->Pic1) == "") { ?>
        <th class="<?= $Page->Pic1->headerCellClass() ?>"><?= $Page->Pic1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Pic1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Pic1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Pic1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Pic1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Pic1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
    <?php if ($Page->SortUrl($Page->Pic2) == "") { ?>
        <th class="<?= $Page->Pic2->headerCellClass() ?>"><?= $Page->Pic2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Pic2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Pic2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Pic2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Pic2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Pic2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
    <?php if ($Page->SortUrl($Page->GraphPath) == "") { ?>
        <th class="<?= $Page->GraphPath->headerCellClass() ?>"><?= $Page->GraphPath->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GraphPath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GraphPath->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GraphPath->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GraphPath->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GraphPath->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
    <?php if ($Page->SortUrl($Page->MachineCD) == "") { ?>
        <th class="<?= $Page->MachineCD->headerCellClass() ?>"><?= $Page->MachineCD->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MachineCD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MachineCD->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MachineCD->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MachineCD->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MachineCD->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
    <?php if ($Page->SortUrl($Page->TestCancel) == "") { ?>
        <th class="<?= $Page->TestCancel->headerCellClass() ?>"><?= $Page->TestCancel->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TestCancel->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TestCancel->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TestCancel->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TestCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TestCancel->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
    <?php if ($Page->SortUrl($Page->OutSource) == "") { ?>
        <th class="<?= $Page->OutSource->headerCellClass() ?>"><?= $Page->OutSource->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OutSource->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OutSource->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OutSource->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OutSource->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OutSource->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
    <?php if ($Page->SortUrl($Page->Printed) == "") { ?>
        <th class="<?= $Page->Printed->headerCellClass() ?>"><?= $Page->Printed->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Printed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Printed->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Printed->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Printed->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Printed->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
    <?php if ($Page->SortUrl($Page->PrintBy) == "") { ?>
        <th class="<?= $Page->PrintBy->headerCellClass() ?>"><?= $Page->PrintBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PrintBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PrintBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PrintBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PrintBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PrintBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
    <?php if ($Page->SortUrl($Page->PrintDate) == "") { ?>
        <th class="<?= $Page->PrintDate->headerCellClass() ?>"><?= $Page->PrintDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PrintDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PrintDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PrintDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PrintDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PrintDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
    <?php if ($Page->SortUrl($Page->BillingDate) == "") { ?>
        <th class="<?= $Page->BillingDate->headerCellClass() ?>"><?= $Page->BillingDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BillingDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BillingDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BillingDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BillingDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BillingDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
    <?php if ($Page->SortUrl($Page->BilledBy) == "") { ?>
        <th class="<?= $Page->BilledBy->headerCellClass() ?>"><?= $Page->BilledBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BilledBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BilledBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BilledBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BilledBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BilledBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
    <?php if ($Page->SortUrl($Page->Resulted) == "") { ?>
        <th class="<?= $Page->Resulted->headerCellClass() ?>"><?= $Page->Resulted->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Resulted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Resulted->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Resulted->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Resulted->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Resulted->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <?php if ($Page->SortUrl($Page->ResultDate) == "") { ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><?= $Page->ResultDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ResultDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ResultDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ResultDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
    <?php if ($Page->SortUrl($Page->ResultedBy) == "") { ?>
        <th class="<?= $Page->ResultedBy->headerCellClass() ?>"><?= $Page->ResultedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ResultedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ResultedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ResultedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
    <?php if ($Page->SortUrl($Page->SampleDate) == "") { ?>
        <th class="<?= $Page->SampleDate->headerCellClass() ?>"><?= $Page->SampleDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SampleDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SampleDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SampleDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SampleDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SampleDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
    <?php if ($Page->SortUrl($Page->SampleUser) == "") { ?>
        <th class="<?= $Page->SampleUser->headerCellClass() ?>"><?= $Page->SampleUser->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SampleUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SampleUser->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SampleUser->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SampleUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SampleUser->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
    <?php if ($Page->SortUrl($Page->Sampled) == "") { ?>
        <th class="<?= $Page->Sampled->headerCellClass() ?>"><?= $Page->Sampled->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Sampled->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Sampled->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Sampled->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Sampled->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Sampled->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
    <?php if ($Page->SortUrl($Page->ReceivedDate) == "") { ?>
        <th class="<?= $Page->ReceivedDate->headerCellClass() ?>"><?= $Page->ReceivedDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ReceivedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ReceivedDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ReceivedDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ReceivedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ReceivedDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
    <?php if ($Page->SortUrl($Page->ReceivedUser) == "") { ?>
        <th class="<?= $Page->ReceivedUser->headerCellClass() ?>"><?= $Page->ReceivedUser->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ReceivedUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ReceivedUser->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ReceivedUser->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ReceivedUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ReceivedUser->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
    <?php if ($Page->SortUrl($Page->Recevied) == "") { ?>
        <th class="<?= $Page->Recevied->headerCellClass() ?>"><?= $Page->Recevied->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Recevied->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Recevied->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Recevied->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Recevied->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Recevied->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
    <?php if ($Page->SortUrl($Page->DeptRecvDate) == "") { ?>
        <th class="<?= $Page->DeptRecvDate->headerCellClass() ?>"><?= $Page->DeptRecvDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DeptRecvDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DeptRecvDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DeptRecvDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DeptRecvDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DeptRecvDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
    <?php if ($Page->SortUrl($Page->DeptRecvUser) == "") { ?>
        <th class="<?= $Page->DeptRecvUser->headerCellClass() ?>"><?= $Page->DeptRecvUser->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DeptRecvUser->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DeptRecvUser->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DeptRecvUser->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DeptRecvUser->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DeptRecvUser->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
    <?php if ($Page->SortUrl($Page->DeptRecived) == "") { ?>
        <th class="<?= $Page->DeptRecived->headerCellClass() ?>"><?= $Page->DeptRecived->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DeptRecived->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DeptRecived->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DeptRecived->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DeptRecived->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DeptRecived->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
    <?php if ($Page->SortUrl($Page->SAuthDate) == "") { ?>
        <th class="<?= $Page->SAuthDate->headerCellClass() ?>"><?= $Page->SAuthDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SAuthDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SAuthDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SAuthDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SAuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SAuthDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
    <?php if ($Page->SortUrl($Page->SAuthBy) == "") { ?>
        <th class="<?= $Page->SAuthBy->headerCellClass() ?>"><?= $Page->SAuthBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SAuthBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SAuthBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SAuthBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SAuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SAuthBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
    <?php if ($Page->SortUrl($Page->SAuthendicate) == "") { ?>
        <th class="<?= $Page->SAuthendicate->headerCellClass() ?>"><?= $Page->SAuthendicate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SAuthendicate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SAuthendicate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SAuthendicate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SAuthendicate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SAuthendicate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
    <?php if ($Page->SortUrl($Page->AuthDate) == "") { ?>
        <th class="<?= $Page->AuthDate->headerCellClass() ?>"><?= $Page->AuthDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AuthDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AuthDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AuthDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AuthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AuthDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
    <?php if ($Page->SortUrl($Page->AuthBy) == "") { ?>
        <th class="<?= $Page->AuthBy->headerCellClass() ?>"><?= $Page->AuthBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AuthBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AuthBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AuthBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AuthBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AuthBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
    <?php if ($Page->SortUrl($Page->Authencate) == "") { ?>
        <th class="<?= $Page->Authencate->headerCellClass() ?>"><?= $Page->Authencate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Authencate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Authencate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Authencate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Authencate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Authencate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
    <?php if ($Page->SortUrl($Page->EditDate) == "") { ?>
        <th class="<?= $Page->EditDate->headerCellClass() ?>"><?= $Page->EditDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EditDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EditDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EditDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EditDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EditDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
    <?php if ($Page->SortUrl($Page->EditBy) == "") { ?>
        <th class="<?= $Page->EditBy->headerCellClass() ?>"><?= $Page->EditBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EditBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EditBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EditBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EditBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EditBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
    <?php if ($Page->SortUrl($Page->Editted) == "") { ?>
        <th class="<?= $Page->Editted->headerCellClass() ?>"><?= $Page->Editted->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Editted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Editted->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Editted->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Editted->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Editted->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <?php if ($Page->SortUrl($Page->PatientId) == "") { ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><?= $Page->PatientId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->CId->Visible) { // CId ?>
    <?php if ($Page->SortUrl($Page->CId) == "") { ?>
        <th class="<?= $Page->CId->headerCellClass() ?>"><?= $Page->CId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Inactive->Visible) { // Inactive ?>
    <?php if ($Page->SortUrl($Page->Inactive) == "") { ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><?= $Page->Inactive->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Inactive->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Inactive->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Inactive->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Inactive->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Inactive->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->TestType->Visible) { // TestType ?>
    <?php if ($Page->SortUrl($Page->TestType) == "") { ?>
        <th class="<?= $Page->TestType->headerCellClass() ?>"><?= $Page->TestType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TestType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TestType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TestType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TestType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TestType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
    <?php if ($Page->SortUrl($Page->Repeated) == "") { ?>
        <th class="<?= $Page->Repeated->headerCellClass() ?>"><?= $Page->Repeated->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Repeated->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Repeated->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Repeated->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Repeated->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Repeated->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
    <?php if ($Page->SortUrl($Page->RepeatedBy) == "") { ?>
        <th class="<?= $Page->RepeatedBy->headerCellClass() ?>"><?= $Page->RepeatedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RepeatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RepeatedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RepeatedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RepeatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RepeatedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
    <?php if ($Page->SortUrl($Page->RepeatedDate) == "") { ?>
        <th class="<?= $Page->RepeatedDate->headerCellClass() ?>"><?= $Page->RepeatedDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RepeatedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RepeatedDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RepeatedDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RepeatedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RepeatedDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
    <?php if ($Page->SortUrl($Page->serviceID) == "") { ?>
        <th class="<?= $Page->serviceID->headerCellClass() ?>"><?= $Page->serviceID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->serviceID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->serviceID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->serviceID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->serviceID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->serviceID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
    <?php if ($Page->SortUrl($Page->Service_Type) == "") { ?>
        <th class="<?= $Page->Service_Type->headerCellClass() ?>"><?= $Page->Service_Type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Service_Type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Service_Type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Service_Type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Service_Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Service_Type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
    <?php if ($Page->SortUrl($Page->Service_Department) == "") { ?>
        <th class="<?= $Page->Service_Department->headerCellClass() ?>"><?= $Page->Service_Department->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Service_Department->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Service_Department->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Service_Department->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Service_Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Service_Department->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
    <?php if ($Page->SortUrl($Page->RequestNo) == "") { ?>
        <th class="<?= $Page->RequestNo->headerCellClass() ?>"><?= $Page->RequestNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RequestNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RequestNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RequestNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RequestNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RequestNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td<?= $Page->id->cellAttributes() ?>>
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td<?= $Page->PatientName->cellAttributes() ?>>
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <!-- Age -->
        <td<?= $Page->Age->cellAttributes() ?>>
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <!-- Gender -->
        <td<?= $Page->Gender->cellAttributes() ?>>
<span<?= $Page->Gender->viewAttributes() ?>>
<?= $Page->Gender->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <!-- profilePic -->
        <td<?= $Page->profilePic->cellAttributes() ?>>
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <!-- Services -->
        <td<?= $Page->Services->cellAttributes() ?>>
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <!-- Unit -->
        <td<?= $Page->Unit->cellAttributes() ?>>
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <!-- amount -->
        <td<?= $Page->amount->cellAttributes() ?>>
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <!-- Quantity -->
        <td<?= $Page->Quantity->cellAttributes() ?>>
<span<?= $Page->Quantity->viewAttributes() ?>>
<?= $Page->Quantity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <!-- DiscountCategory -->
        <td<?= $Page->DiscountCategory->cellAttributes() ?>>
<span<?= $Page->DiscountCategory->viewAttributes() ?>>
<?= $Page->DiscountCategory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <!-- Discount -->
        <td<?= $Page->Discount->cellAttributes() ?>>
<span<?= $Page->Discount->viewAttributes() ?>>
<?= $Page->Discount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <!-- SubTotal -->
        <td<?= $Page->SubTotal->cellAttributes() ?>>
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
        <!-- description -->
        <td<?= $Page->description->cellAttributes() ?>>
<span<?= $Page->description->viewAttributes() ?>>
<?= $Page->description->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <!-- patient_type -->
        <td<?= $Page->patient_type->cellAttributes() ?>>
<span<?= $Page->patient_type->viewAttributes() ?>>
<?= $Page->patient_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <!-- charged_date -->
        <td<?= $Page->charged_date->cellAttributes() ?>>
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <!-- status -->
        <td<?= $Page->status->cellAttributes() ?>>
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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
<?php if ($Page->Aid->Visible) { // Aid ?>
        <!-- Aid -->
        <td<?= $Page->Aid->cellAttributes() ?>>
<span<?= $Page->Aid->viewAttributes() ?>>
<?= $Page->Aid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <!-- Vid -->
        <td<?= $Page->Vid->cellAttributes() ?>>
<span<?= $Page->Vid->viewAttributes() ?>>
<?= $Page->Vid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <!-- DrID -->
        <td<?= $Page->DrID->cellAttributes() ?>>
<span<?= $Page->DrID->viewAttributes() ?>>
<?= $Page->DrID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <!-- DrCODE -->
        <td<?= $Page->DrCODE->cellAttributes() ?>>
<span<?= $Page->DrCODE->viewAttributes() ?>>
<?= $Page->DrCODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <!-- DrName -->
        <td<?= $Page->DrName->cellAttributes() ?>>
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <!-- Department -->
        <td<?= $Page->Department->cellAttributes() ?>>
<span<?= $Page->Department->viewAttributes() ?>>
<?= $Page->Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <!-- DrSharePres -->
        <td<?= $Page->DrSharePres->cellAttributes() ?>>
<span<?= $Page->DrSharePres->viewAttributes() ?>>
<?= $Page->DrSharePres->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <!-- HospSharePres -->
        <td<?= $Page->HospSharePres->cellAttributes() ?>>
<span<?= $Page->HospSharePres->viewAttributes() ?>>
<?= $Page->HospSharePres->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <!-- DrShareAmount -->
        <td<?= $Page->DrShareAmount->cellAttributes() ?>>
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <!-- HospShareAmount -->
        <td<?= $Page->HospShareAmount->cellAttributes() ?>>
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <!-- DrShareSettiledAmount -->
        <td<?= $Page->DrShareSettiledAmount->cellAttributes() ?>>
<span<?= $Page->DrShareSettiledAmount->viewAttributes() ?>>
<?= $Page->DrShareSettiledAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <!-- DrShareSettledId -->
        <td<?= $Page->DrShareSettledId->cellAttributes() ?>>
<span<?= $Page->DrShareSettledId->viewAttributes() ?>>
<?= $Page->DrShareSettledId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <!-- DrShareSettiledStatus -->
        <td<?= $Page->DrShareSettiledStatus->cellAttributes() ?>>
<span<?= $Page->DrShareSettiledStatus->viewAttributes() ?>>
<?= $Page->DrShareSettiledStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <!-- invoiceId -->
        <td<?= $Page->invoiceId->cellAttributes() ?>>
<span<?= $Page->invoiceId->viewAttributes() ?>>
<?= $Page->invoiceId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <!-- invoiceAmount -->
        <td<?= $Page->invoiceAmount->cellAttributes() ?>>
<span<?= $Page->invoiceAmount->viewAttributes() ?>>
<?= $Page->invoiceAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <!-- invoiceStatus -->
        <td<?= $Page->invoiceStatus->cellAttributes() ?>>
<span<?= $Page->invoiceStatus->viewAttributes() ?>>
<?= $Page->invoiceStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <!-- modeOfPayment -->
        <td<?= $Page->modeOfPayment->cellAttributes() ?>>
<span<?= $Page->modeOfPayment->viewAttributes() ?>>
<?= $Page->modeOfPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <!-- RIDNO -->
        <td<?= $Page->RIDNO->cellAttributes() ?>>
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <!-- ItemCode -->
        <td<?= $Page->ItemCode->cellAttributes() ?>>
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <!-- TidNo -->
        <td<?= $Page->TidNo->cellAttributes() ?>>
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <!-- sid -->
        <td<?= $Page->sid->cellAttributes() ?>>
<span<?= $Page->sid->viewAttributes() ?>>
<?= $Page->sid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <!-- TestSubCd -->
        <td<?= $Page->TestSubCd->cellAttributes() ?>>
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <!-- DEptCd -->
        <td<?= $Page->DEptCd->cellAttributes() ?>>
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <!-- ProfCd -->
        <td<?= $Page->ProfCd->cellAttributes() ?>>
<span<?= $Page->ProfCd->viewAttributes() ?>>
<?= $Page->ProfCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <!-- Comments -->
        <td<?= $Page->Comments->cellAttributes() ?>>
<span<?= $Page->Comments->viewAttributes() ?>>
<?= $Page->Comments->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <!-- Method -->
        <td<?= $Page->Method->cellAttributes() ?>>
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
        <!-- Specimen -->
        <td<?= $Page->Specimen->cellAttributes() ?>>
<span<?= $Page->Specimen->viewAttributes() ?>>
<?= $Page->Specimen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <!-- Abnormal -->
        <td<?= $Page->Abnormal->cellAttributes() ?>>
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <!-- TestUnit -->
        <td<?= $Page->TestUnit->cellAttributes() ?>>
<span<?= $Page->TestUnit->viewAttributes() ?>>
<?= $Page->TestUnit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <!-- LOWHIGH -->
        <td<?= $Page->LOWHIGH->cellAttributes() ?>>
<span<?= $Page->LOWHIGH->viewAttributes() ?>>
<?= $Page->LOWHIGH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
        <!-- Branch -->
        <td<?= $Page->Branch->cellAttributes() ?>>
<span<?= $Page->Branch->viewAttributes() ?>>
<?= $Page->Branch->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <!-- Dispatch -->
        <td<?= $Page->Dispatch->cellAttributes() ?>>
<span<?= $Page->Dispatch->viewAttributes() ?>>
<?= $Page->Dispatch->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <!-- Pic1 -->
        <td<?= $Page->Pic1->cellAttributes() ?>>
<span<?= $Page->Pic1->viewAttributes() ?>>
<?= $Page->Pic1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <!-- Pic2 -->
        <td<?= $Page->Pic2->cellAttributes() ?>>
<span<?= $Page->Pic2->viewAttributes() ?>>
<?= $Page->Pic2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <!-- GraphPath -->
        <td<?= $Page->GraphPath->cellAttributes() ?>>
<span<?= $Page->GraphPath->viewAttributes() ?>>
<?= $Page->GraphPath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <!-- MachineCD -->
        <td<?= $Page->MachineCD->cellAttributes() ?>>
<span<?= $Page->MachineCD->viewAttributes() ?>>
<?= $Page->MachineCD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <!-- TestCancel -->
        <td<?= $Page->TestCancel->cellAttributes() ?>>
<span<?= $Page->TestCancel->viewAttributes() ?>>
<?= $Page->TestCancel->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <!-- OutSource -->
        <td<?= $Page->OutSource->cellAttributes() ?>>
<span<?= $Page->OutSource->viewAttributes() ?>>
<?= $Page->OutSource->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
        <!-- Printed -->
        <td<?= $Page->Printed->cellAttributes() ?>>
<span<?= $Page->Printed->viewAttributes() ?>>
<?= $Page->Printed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <!-- PrintBy -->
        <td<?= $Page->PrintBy->cellAttributes() ?>>
<span<?= $Page->PrintBy->viewAttributes() ?>>
<?= $Page->PrintBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <!-- PrintDate -->
        <td<?= $Page->PrintDate->cellAttributes() ?>>
<span<?= $Page->PrintDate->viewAttributes() ?>>
<?= $Page->PrintDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <!-- BillingDate -->
        <td<?= $Page->BillingDate->cellAttributes() ?>>
<span<?= $Page->BillingDate->viewAttributes() ?>>
<?= $Page->BillingDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <!-- BilledBy -->
        <td<?= $Page->BilledBy->cellAttributes() ?>>
<span<?= $Page->BilledBy->viewAttributes() ?>>
<?= $Page->BilledBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <!-- Resulted -->
        <td<?= $Page->Resulted->cellAttributes() ?>>
<span<?= $Page->Resulted->viewAttributes() ?>>
<?= $Page->Resulted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <!-- ResultDate -->
        <td<?= $Page->ResultDate->cellAttributes() ?>>
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <!-- ResultedBy -->
        <td<?= $Page->ResultedBy->cellAttributes() ?>>
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <!-- SampleDate -->
        <td<?= $Page->SampleDate->cellAttributes() ?>>
<span<?= $Page->SampleDate->viewAttributes() ?>>
<?= $Page->SampleDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <!-- SampleUser -->
        <td<?= $Page->SampleUser->cellAttributes() ?>>
<span<?= $Page->SampleUser->viewAttributes() ?>>
<?= $Page->SampleUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
        <!-- Sampled -->
        <td<?= $Page->Sampled->cellAttributes() ?>>
<span<?= $Page->Sampled->viewAttributes() ?>>
<?= $Page->Sampled->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <!-- ReceivedDate -->
        <td<?= $Page->ReceivedDate->cellAttributes() ?>>
<span<?= $Page->ReceivedDate->viewAttributes() ?>>
<?= $Page->ReceivedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <!-- ReceivedUser -->
        <td<?= $Page->ReceivedUser->cellAttributes() ?>>
<span<?= $Page->ReceivedUser->viewAttributes() ?>>
<?= $Page->ReceivedUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
        <!-- Recevied -->
        <td<?= $Page->Recevied->cellAttributes() ?>>
<span<?= $Page->Recevied->viewAttributes() ?>>
<?= $Page->Recevied->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <!-- DeptRecvDate -->
        <td<?= $Page->DeptRecvDate->cellAttributes() ?>>
<span<?= $Page->DeptRecvDate->viewAttributes() ?>>
<?= $Page->DeptRecvDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <!-- DeptRecvUser -->
        <td<?= $Page->DeptRecvUser->cellAttributes() ?>>
<span<?= $Page->DeptRecvUser->viewAttributes() ?>>
<?= $Page->DeptRecvUser->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <!-- DeptRecived -->
        <td<?= $Page->DeptRecived->cellAttributes() ?>>
<span<?= $Page->DeptRecived->viewAttributes() ?>>
<?= $Page->DeptRecived->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <!-- SAuthDate -->
        <td<?= $Page->SAuthDate->cellAttributes() ?>>
<span<?= $Page->SAuthDate->viewAttributes() ?>>
<?= $Page->SAuthDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <!-- SAuthBy -->
        <td<?= $Page->SAuthBy->cellAttributes() ?>>
<span<?= $Page->SAuthBy->viewAttributes() ?>>
<?= $Page->SAuthBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <!-- SAuthendicate -->
        <td<?= $Page->SAuthendicate->cellAttributes() ?>>
<span<?= $Page->SAuthendicate->viewAttributes() ?>>
<?= $Page->SAuthendicate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <!-- AuthDate -->
        <td<?= $Page->AuthDate->cellAttributes() ?>>
<span<?= $Page->AuthDate->viewAttributes() ?>>
<?= $Page->AuthDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <!-- AuthBy -->
        <td<?= $Page->AuthBy->cellAttributes() ?>>
<span<?= $Page->AuthBy->viewAttributes() ?>>
<?= $Page->AuthBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
        <!-- Authencate -->
        <td<?= $Page->Authencate->cellAttributes() ?>>
<span<?= $Page->Authencate->viewAttributes() ?>>
<?= $Page->Authencate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <!-- EditDate -->
        <td<?= $Page->EditDate->cellAttributes() ?>>
<span<?= $Page->EditDate->viewAttributes() ?>>
<?= $Page->EditDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
        <!-- EditBy -->
        <td<?= $Page->EditBy->cellAttributes() ?>>
<span<?= $Page->EditBy->viewAttributes() ?>>
<?= $Page->EditBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
        <!-- Editted -->
        <td<?= $Page->Editted->cellAttributes() ?>>
<span<?= $Page->Editted->viewAttributes() ?>>
<?= $Page->Editted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <!-- PatID -->
        <td<?= $Page->PatID->cellAttributes() ?>>
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <!-- PatientId -->
        <td<?= $Page->PatientId->cellAttributes() ?>>
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <!-- Mobile -->
        <td<?= $Page->Mobile->cellAttributes() ?>>
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <!-- CId -->
        <td<?= $Page->CId->cellAttributes() ?>>
<span<?= $Page->CId->viewAttributes() ?>>
<?= $Page->CId->getViewValue() ?></span>
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
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <!-- Inactive -->
        <td<?= $Page->Inactive->cellAttributes() ?>>
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <!-- CollSample -->
        <td<?= $Page->CollSample->cellAttributes() ?>>
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <!-- TestType -->
        <td<?= $Page->TestType->cellAttributes() ?>>
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <!-- Repeated -->
        <td<?= $Page->Repeated->cellAttributes() ?>>
<span<?= $Page->Repeated->viewAttributes() ?>>
<?= $Page->Repeated->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <!-- RepeatedBy -->
        <td<?= $Page->RepeatedBy->cellAttributes() ?>>
<span<?= $Page->RepeatedBy->viewAttributes() ?>>
<?= $Page->RepeatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <!-- RepeatedDate -->
        <td<?= $Page->RepeatedDate->cellAttributes() ?>>
<span<?= $Page->RepeatedDate->viewAttributes() ?>>
<?= $Page->RepeatedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
        <!-- serviceID -->
        <td<?= $Page->serviceID->cellAttributes() ?>>
<span<?= $Page->serviceID->viewAttributes() ?>>
<?= $Page->serviceID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <!-- Service_Type -->
        <td<?= $Page->Service_Type->cellAttributes() ?>>
<span<?= $Page->Service_Type->viewAttributes() ?>>
<?= $Page->Service_Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <!-- Service_Department -->
        <td<?= $Page->Service_Department->cellAttributes() ?>>
<span<?= $Page->Service_Department->viewAttributes() ?>>
<?= $Page->Service_Department->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <!-- RequestNo -->
        <td<?= $Page->RequestNo->cellAttributes() ?>>
<span<?= $Page->RequestNo->viewAttributes() ?>>
<?= $Page->RequestNo->getViewValue() ?></span>
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
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td class="<?= $Page->id->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <!-- Reception -->
        <td class="<?= $Page->Reception->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <!-- mrnno -->
        <td class="<?= $Page->mrnno->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td class="<?= $Page->PatientName->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <!-- Age -->
        <td class="<?= $Page->Age->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
        <!-- Gender -->
        <td class="<?= $Page->Gender->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <!-- profilePic -->
        <td class="<?= $Page->profilePic->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <!-- Services -->
        <td class="<?= $Page->Services->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <!-- Unit -->
        <td class="<?= $Page->Unit->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <!-- amount -->
        <td class="<?= $Page->amount->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->amount->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->Quantity->Visible) { // Quantity ?>
        <!-- Quantity -->
        <td class="<?= $Page->Quantity->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DiscountCategory->Visible) { // DiscountCategory ?>
        <!-- DiscountCategory -->
        <td class="<?= $Page->DiscountCategory->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Discount->Visible) { // Discount ?>
        <!-- Discount -->
        <td class="<?= $Page->Discount->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <!-- SubTotal -->
        <td class="<?= $Page->SubTotal->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SubTotal->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->description->Visible) { // description ?>
        <!-- description -->
        <td class="<?= $Page->description->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->patient_type->Visible) { // patient_type ?>
        <!-- patient_type -->
        <td class="<?= $Page->patient_type->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <!-- charged_date -->
        <td class="<?= $Page->charged_date->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <!-- status -->
        <td class="<?= $Page->status->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <!-- createdby -->
        <td class="<?= $Page->createdby->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <!-- createddatetime -->
        <td class="<?= $Page->createddatetime->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <!-- modifiedby -->
        <td class="<?= $Page->modifiedby->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <!-- modifieddatetime -->
        <td class="<?= $Page->modifieddatetime->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Aid->Visible) { // Aid ?>
        <!-- Aid -->
        <td class="<?= $Page->Aid->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Vid->Visible) { // Vid ?>
        <!-- Vid -->
        <td class="<?= $Page->Vid->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
        <!-- DrID -->
        <td class="<?= $Page->DrID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrCODE->Visible) { // DrCODE ?>
        <!-- DrCODE -->
        <td class="<?= $Page->DrCODE->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <!-- DrName -->
        <td class="<?= $Page->DrName->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Department->Visible) { // Department ?>
        <!-- Department -->
        <td class="<?= $Page->Department->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrSharePres->Visible) { // DrSharePres ?>
        <!-- DrSharePres -->
        <td class="<?= $Page->DrSharePres->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HospSharePres->Visible) { // HospSharePres ?>
        <!-- HospSharePres -->
        <td class="<?= $Page->HospSharePres->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <!-- DrShareAmount -->
        <td class="<?= $Page->DrShareAmount->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <!-- HospShareAmount -->
        <td class="<?= $Page->HospShareAmount->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrShareSettiledAmount->Visible) { // DrShareSettiledAmount ?>
        <!-- DrShareSettiledAmount -->
        <td class="<?= $Page->DrShareSettiledAmount->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrShareSettledId->Visible) { // DrShareSettledId ?>
        <!-- DrShareSettledId -->
        <td class="<?= $Page->DrShareSettledId->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrShareSettiledStatus->Visible) { // DrShareSettiledStatus ?>
        <!-- DrShareSettiledStatus -->
        <td class="<?= $Page->DrShareSettiledStatus->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->invoiceId->Visible) { // invoiceId ?>
        <!-- invoiceId -->
        <td class="<?= $Page->invoiceId->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->invoiceAmount->Visible) { // invoiceAmount ?>
        <!-- invoiceAmount -->
        <td class="<?= $Page->invoiceAmount->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->invoiceStatus->Visible) { // invoiceStatus ?>
        <!-- invoiceStatus -->
        <td class="<?= $Page->invoiceStatus->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->modeOfPayment->Visible) { // modeOfPayment ?>
        <!-- modeOfPayment -->
        <td class="<?= $Page->modeOfPayment->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td class="<?= $Page->HospID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <!-- RIDNO -->
        <td class="<?= $Page->RIDNO->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <!-- ItemCode -->
        <td class="<?= $Page->ItemCode->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <!-- TidNo -->
        <td class="<?= $Page->TidNo->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->sid->Visible) { // sid ?>
        <!-- sid -->
        <td class="<?= $Page->sid->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <!-- TestSubCd -->
        <td class="<?= $Page->TestSubCd->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <!-- DEptCd -->
        <td class="<?= $Page->DEptCd->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ProfCd->Visible) { // ProfCd ?>
        <!-- ProfCd -->
        <td class="<?= $Page->ProfCd->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Comments->Visible) { // Comments ?>
        <!-- Comments -->
        <td class="<?= $Page->Comments->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <!-- Method -->
        <td class="<?= $Page->Method->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Specimen->Visible) { // Specimen ?>
        <!-- Specimen -->
        <td class="<?= $Page->Specimen->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <!-- Abnormal -->
        <td class="<?= $Page->Abnormal->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->TestUnit->Visible) { // TestUnit ?>
        <!-- TestUnit -->
        <td class="<?= $Page->TestUnit->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->LOWHIGH->Visible) { // LOWHIGH ?>
        <!-- LOWHIGH -->
        <td class="<?= $Page->LOWHIGH->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Branch->Visible) { // Branch ?>
        <!-- Branch -->
        <td class="<?= $Page->Branch->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Dispatch->Visible) { // Dispatch ?>
        <!-- Dispatch -->
        <td class="<?= $Page->Dispatch->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Pic1->Visible) { // Pic1 ?>
        <!-- Pic1 -->
        <td class="<?= $Page->Pic1->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Pic2->Visible) { // Pic2 ?>
        <!-- Pic2 -->
        <td class="<?= $Page->Pic2->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->GraphPath->Visible) { // GraphPath ?>
        <!-- GraphPath -->
        <td class="<?= $Page->GraphPath->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->MachineCD->Visible) { // MachineCD ?>
        <!-- MachineCD -->
        <td class="<?= $Page->MachineCD->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->TestCancel->Visible) { // TestCancel ?>
        <!-- TestCancel -->
        <td class="<?= $Page->TestCancel->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->OutSource->Visible) { // OutSource ?>
        <!-- OutSource -->
        <td class="<?= $Page->OutSource->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Printed->Visible) { // Printed ?>
        <!-- Printed -->
        <td class="<?= $Page->Printed->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PrintBy->Visible) { // PrintBy ?>
        <!-- PrintBy -->
        <td class="<?= $Page->PrintBy->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PrintDate->Visible) { // PrintDate ?>
        <!-- PrintDate -->
        <td class="<?= $Page->PrintDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BillingDate->Visible) { // BillingDate ?>
        <!-- BillingDate -->
        <td class="<?= $Page->BillingDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BilledBy->Visible) { // BilledBy ?>
        <!-- BilledBy -->
        <td class="<?= $Page->BilledBy->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Resulted->Visible) { // Resulted ?>
        <!-- Resulted -->
        <td class="<?= $Page->Resulted->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <!-- ResultDate -->
        <td class="<?= $Page->ResultDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <!-- ResultedBy -->
        <td class="<?= $Page->ResultedBy->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SampleDate->Visible) { // SampleDate ?>
        <!-- SampleDate -->
        <td class="<?= $Page->SampleDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SampleUser->Visible) { // SampleUser ?>
        <!-- SampleUser -->
        <td class="<?= $Page->SampleUser->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Sampled->Visible) { // Sampled ?>
        <!-- Sampled -->
        <td class="<?= $Page->Sampled->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ReceivedDate->Visible) { // ReceivedDate ?>
        <!-- ReceivedDate -->
        <td class="<?= $Page->ReceivedDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ReceivedUser->Visible) { // ReceivedUser ?>
        <!-- ReceivedUser -->
        <td class="<?= $Page->ReceivedUser->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Recevied->Visible) { // Recevied ?>
        <!-- Recevied -->
        <td class="<?= $Page->Recevied->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DeptRecvDate->Visible) { // DeptRecvDate ?>
        <!-- DeptRecvDate -->
        <td class="<?= $Page->DeptRecvDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DeptRecvUser->Visible) { // DeptRecvUser ?>
        <!-- DeptRecvUser -->
        <td class="<?= $Page->DeptRecvUser->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DeptRecived->Visible) { // DeptRecived ?>
        <!-- DeptRecived -->
        <td class="<?= $Page->DeptRecived->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SAuthDate->Visible) { // SAuthDate ?>
        <!-- SAuthDate -->
        <td class="<?= $Page->SAuthDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SAuthBy->Visible) { // SAuthBy ?>
        <!-- SAuthBy -->
        <td class="<?= $Page->SAuthBy->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SAuthendicate->Visible) { // SAuthendicate ?>
        <!-- SAuthendicate -->
        <td class="<?= $Page->SAuthendicate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->AuthDate->Visible) { // AuthDate ?>
        <!-- AuthDate -->
        <td class="<?= $Page->AuthDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->AuthBy->Visible) { // AuthBy ?>
        <!-- AuthBy -->
        <td class="<?= $Page->AuthBy->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Authencate->Visible) { // Authencate ?>
        <!-- Authencate -->
        <td class="<?= $Page->Authencate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->EditDate->Visible) { // EditDate ?>
        <!-- EditDate -->
        <td class="<?= $Page->EditDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->EditBy->Visible) { // EditBy ?>
        <!-- EditBy -->
        <td class="<?= $Page->EditBy->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Editted->Visible) { // Editted ?>
        <!-- Editted -->
        <td class="<?= $Page->Editted->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
        <!-- PatID -->
        <td class="<?= $Page->PatID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <!-- PatientId -->
        <td class="<?= $Page->PatientId->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <!-- Mobile -->
        <td class="<?= $Page->Mobile->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
        <!-- CId -->
        <td class="<?= $Page->CId->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <!-- Order -->
        <td class="<?= $Page->Order->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <!-- ResType -->
        <td class="<?= $Page->ResType->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <!-- Sample -->
        <td class="<?= $Page->Sample->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <!-- NoD -->
        <td class="<?= $Page->NoD->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <!-- BillOrder -->
        <td class="<?= $Page->BillOrder->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <!-- Inactive -->
        <td class="<?= $Page->Inactive->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <!-- CollSample -->
        <td class="<?= $Page->CollSample->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <!-- TestType -->
        <td class="<?= $Page->TestType->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Repeated->Visible) { // Repeated ?>
        <!-- Repeated -->
        <td class="<?= $Page->Repeated->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->RepeatedBy->Visible) { // RepeatedBy ?>
        <!-- RepeatedBy -->
        <td class="<?= $Page->RepeatedBy->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->RepeatedDate->Visible) { // RepeatedDate ?>
        <!-- RepeatedDate -->
        <td class="<?= $Page->RepeatedDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->serviceID->Visible) { // serviceID ?>
        <!-- serviceID -->
        <td class="<?= $Page->serviceID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Service_Type->Visible) { // Service_Type ?>
        <!-- Service_Type -->
        <td class="<?= $Page->Service_Type->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Service_Department->Visible) { // Service_Department ?>
        <!-- Service_Department -->
        <td class="<?= $Page->Service_Department->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->RequestNo->Visible) { // RequestNo ?>
        <!-- RequestNo -->
        <td class="<?= $Page->RequestNo->footerCellClass() ?>">
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfSemenanalysisreportPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_semenanalysisreport"><!-- .card -->
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
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <?php if ($Page->SortUrl($Page->RIDNo) == "") { ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><?= $Page->RIDNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RIDNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RIDNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RIDNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RIDNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RIDNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
    <?php if ($Page->SortUrl($Page->HusbandName) == "") { ?>
        <th class="<?= $Page->HusbandName->headerCellClass() ?>"><?= $Page->HusbandName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HusbandName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HusbandName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HusbandName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HusbandName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HusbandName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
    <?php if ($Page->SortUrl($Page->RequestDr) == "") { ?>
        <th class="<?= $Page->RequestDr->headerCellClass() ?>"><?= $Page->RequestDr->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RequestDr->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RequestDr->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RequestDr->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RequestDr->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RequestDr->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
    <?php if ($Page->SortUrl($Page->CollectionDate) == "") { ?>
        <th class="<?= $Page->CollectionDate->headerCellClass() ?>"><?= $Page->CollectionDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CollectionDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CollectionDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CollectionDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CollectionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CollectionDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
    <?php if ($Page->SortUrl($Page->RequestSample) == "") { ?>
        <th class="<?= $Page->RequestSample->headerCellClass() ?>"><?= $Page->RequestSample->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RequestSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RequestSample->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RequestSample->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RequestSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RequestSample->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
    <?php if ($Page->SortUrl($Page->CollectionType) == "") { ?>
        <th class="<?= $Page->CollectionType->headerCellClass() ?>"><?= $Page->CollectionType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CollectionType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CollectionType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CollectionType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CollectionType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CollectionType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
    <?php if ($Page->SortUrl($Page->CollectionMethod) == "") { ?>
        <th class="<?= $Page->CollectionMethod->headerCellClass() ?>"><?= $Page->CollectionMethod->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CollectionMethod->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CollectionMethod->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CollectionMethod->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CollectionMethod->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CollectionMethod->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
    <?php if ($Page->SortUrl($Page->Medicationused) == "") { ?>
        <th class="<?= $Page->Medicationused->headerCellClass() ?>"><?= $Page->Medicationused->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Medicationused->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Medicationused->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Medicationused->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Medicationused->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Medicationused->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
    <?php if ($Page->SortUrl($Page->DifficultiesinCollection) == "") { ?>
        <th class="<?= $Page->DifficultiesinCollection->headerCellClass() ?>"><?= $Page->DifficultiesinCollection->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DifficultiesinCollection->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DifficultiesinCollection->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DifficultiesinCollection->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DifficultiesinCollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DifficultiesinCollection->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
    <?php if ($Page->SortUrl($Page->pH) == "") { ?>
        <th class="<?= $Page->pH->headerCellClass() ?>"><?= $Page->pH->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->pH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->pH->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->pH->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->pH->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->pH->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
    <?php if ($Page->SortUrl($Page->Timeofcollection) == "") { ?>
        <th class="<?= $Page->Timeofcollection->headerCellClass() ?>"><?= $Page->Timeofcollection->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Timeofcollection->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Timeofcollection->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Timeofcollection->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Timeofcollection->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Timeofcollection->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
    <?php if ($Page->SortUrl($Page->Timeofexamination) == "") { ?>
        <th class="<?= $Page->Timeofexamination->headerCellClass() ?>"><?= $Page->Timeofexamination->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Timeofexamination->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Timeofexamination->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Timeofexamination->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Timeofexamination->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Timeofexamination->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <?php if ($Page->SortUrl($Page->Volume) == "") { ?>
        <th class="<?= $Page->Volume->headerCellClass() ?>"><?= $Page->Volume->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Volume->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Volume->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Volume->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Volume->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Volume->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
    <?php if ($Page->SortUrl($Page->Concentration) == "") { ?>
        <th class="<?= $Page->Concentration->headerCellClass() ?>"><?= $Page->Concentration->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Concentration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Concentration->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Concentration->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Concentration->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Concentration->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
    <?php if ($Page->SortUrl($Page->Total) == "") { ?>
        <th class="<?= $Page->Total->headerCellClass() ?>"><?= $Page->Total->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Total->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Total->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Total->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Total->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Total->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
    <?php if ($Page->SortUrl($Page->ProgressiveMotility) == "") { ?>
        <th class="<?= $Page->ProgressiveMotility->headerCellClass() ?>"><?= $Page->ProgressiveMotility->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProgressiveMotility->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProgressiveMotility->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProgressiveMotility->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProgressiveMotility->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProgressiveMotility->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
    <?php if ($Page->SortUrl($Page->NonProgrssiveMotile) == "") { ?>
        <th class="<?= $Page->NonProgrssiveMotile->headerCellClass() ?>"><?= $Page->NonProgrssiveMotile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NonProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NonProgrssiveMotile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NonProgrssiveMotile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NonProgrssiveMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NonProgrssiveMotile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
    <?php if ($Page->SortUrl($Page->Immotile) == "") { ?>
        <th class="<?= $Page->Immotile->headerCellClass() ?>"><?= $Page->Immotile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Immotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Immotile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Immotile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Immotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Immotile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
    <?php if ($Page->SortUrl($Page->TotalProgrssiveMotile) == "") { ?>
        <th class="<?= $Page->TotalProgrssiveMotile->headerCellClass() ?>"><?= $Page->TotalProgrssiveMotile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TotalProgrssiveMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TotalProgrssiveMotile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TotalProgrssiveMotile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TotalProgrssiveMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TotalProgrssiveMotile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
    <?php if ($Page->SortUrl($Page->Appearance) == "") { ?>
        <th class="<?= $Page->Appearance->headerCellClass() ?>"><?= $Page->Appearance->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Appearance->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Appearance->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Appearance->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Appearance->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Appearance->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
    <?php if ($Page->SortUrl($Page->Homogenosity) == "") { ?>
        <th class="<?= $Page->Homogenosity->headerCellClass() ?>"><?= $Page->Homogenosity->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Homogenosity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Homogenosity->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Homogenosity->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Homogenosity->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Homogenosity->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
    <?php if ($Page->SortUrl($Page->CompleteSample) == "") { ?>
        <th class="<?= $Page->CompleteSample->headerCellClass() ?>"><?= $Page->CompleteSample->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CompleteSample->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CompleteSample->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CompleteSample->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CompleteSample->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CompleteSample->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
    <?php if ($Page->SortUrl($Page->Liquefactiontime) == "") { ?>
        <th class="<?= $Page->Liquefactiontime->headerCellClass() ?>"><?= $Page->Liquefactiontime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Liquefactiontime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Liquefactiontime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Liquefactiontime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Liquefactiontime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Liquefactiontime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
    <?php if ($Page->SortUrl($Page->Normal) == "") { ?>
        <th class="<?= $Page->Normal->headerCellClass() ?>"><?= $Page->Normal->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Normal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Normal->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Normal->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Normal->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Normal->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
    <?php if ($Page->SortUrl($Page->Headdefects) == "") { ?>
        <th class="<?= $Page->Headdefects->headerCellClass() ?>"><?= $Page->Headdefects->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Headdefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Headdefects->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Headdefects->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Headdefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Headdefects->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
    <?php if ($Page->SortUrl($Page->MidpieceDefects) == "") { ?>
        <th class="<?= $Page->MidpieceDefects->headerCellClass() ?>"><?= $Page->MidpieceDefects->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MidpieceDefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MidpieceDefects->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MidpieceDefects->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MidpieceDefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MidpieceDefects->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
    <?php if ($Page->SortUrl($Page->TailDefects) == "") { ?>
        <th class="<?= $Page->TailDefects->headerCellClass() ?>"><?= $Page->TailDefects->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TailDefects->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TailDefects->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TailDefects->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TailDefects->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TailDefects->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
    <?php if ($Page->SortUrl($Page->NormalProgMotile) == "") { ?>
        <th class="<?= $Page->NormalProgMotile->headerCellClass() ?>"><?= $Page->NormalProgMotile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NormalProgMotile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NormalProgMotile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NormalProgMotile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NormalProgMotile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NormalProgMotile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
    <?php if ($Page->SortUrl($Page->ImmatureForms) == "") { ?>
        <th class="<?= $Page->ImmatureForms->headerCellClass() ?>"><?= $Page->ImmatureForms->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ImmatureForms->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ImmatureForms->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ImmatureForms->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ImmatureForms->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ImmatureForms->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
    <?php if ($Page->SortUrl($Page->Leucocytes) == "") { ?>
        <th class="<?= $Page->Leucocytes->headerCellClass() ?>"><?= $Page->Leucocytes->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Leucocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Leucocytes->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Leucocytes->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Leucocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Leucocytes->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
    <?php if ($Page->SortUrl($Page->Agglutination) == "") { ?>
        <th class="<?= $Page->Agglutination->headerCellClass() ?>"><?= $Page->Agglutination->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Agglutination->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Agglutination->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Agglutination->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Agglutination->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Agglutination->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
    <?php if ($Page->SortUrl($Page->Debris) == "") { ?>
        <th class="<?= $Page->Debris->headerCellClass() ?>"><?= $Page->Debris->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Debris->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Debris->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Debris->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Debris->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Debris->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
    <?php if ($Page->SortUrl($Page->Diagnosis) == "") { ?>
        <th class="<?= $Page->Diagnosis->headerCellClass() ?>"><?= $Page->Diagnosis->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Diagnosis->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Diagnosis->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Diagnosis->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Diagnosis->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Diagnosis->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
    <?php if ($Page->SortUrl($Page->Observations) == "") { ?>
        <th class="<?= $Page->Observations->headerCellClass() ?>"><?= $Page->Observations->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Observations->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Observations->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Observations->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Observations->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Observations->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
    <?php if ($Page->SortUrl($Page->Signature) == "") { ?>
        <th class="<?= $Page->Signature->headerCellClass() ?>"><?= $Page->Signature->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Signature->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Signature->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Signature->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Signature->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Signature->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
    <?php if ($Page->SortUrl($Page->SemenOrgin) == "") { ?>
        <th class="<?= $Page->SemenOrgin->headerCellClass() ?>"><?= $Page->SemenOrgin->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SemenOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SemenOrgin->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SemenOrgin->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SemenOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SemenOrgin->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
    <?php if ($Page->SortUrl($Page->Donor) == "") { ?>
        <th class="<?= $Page->Donor->headerCellClass() ?>"><?= $Page->Donor->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Donor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Donor->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Donor->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Donor->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
    <?php if ($Page->SortUrl($Page->DonorBloodgroup) == "") { ?>
        <th class="<?= $Page->DonorBloodgroup->headerCellClass() ?>"><?= $Page->DonorBloodgroup->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DonorBloodgroup->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DonorBloodgroup->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DonorBloodgroup->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DonorBloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DonorBloodgroup->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
    <?php if ($Page->SortUrl($Page->Tank) == "") { ?>
        <th class="<?= $Page->Tank->headerCellClass() ?>"><?= $Page->Tank->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tank->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tank->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tank->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tank->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tank->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
    <?php if ($Page->SortUrl($Page->Location) == "") { ?>
        <th class="<?= $Page->Location->headerCellClass() ?>"><?= $Page->Location->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Location->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Location->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Location->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Location->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Location->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
    <?php if ($Page->SortUrl($Page->Volume1) == "") { ?>
        <th class="<?= $Page->Volume1->headerCellClass() ?>"><?= $Page->Volume1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Volume1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Volume1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Volume1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Volume1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Volume1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
    <?php if ($Page->SortUrl($Page->Concentration1) == "") { ?>
        <th class="<?= $Page->Concentration1->headerCellClass() ?>"><?= $Page->Concentration1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Concentration1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Concentration1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Concentration1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Concentration1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Concentration1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
    <?php if ($Page->SortUrl($Page->Total1) == "") { ?>
        <th class="<?= $Page->Total1->headerCellClass() ?>"><?= $Page->Total1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Total1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Total1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Total1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Total1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Total1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
    <?php if ($Page->SortUrl($Page->ProgressiveMotility1) == "") { ?>
        <th class="<?= $Page->ProgressiveMotility1->headerCellClass() ?>"><?= $Page->ProgressiveMotility1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProgressiveMotility1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProgressiveMotility1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProgressiveMotility1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProgressiveMotility1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProgressiveMotility1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
    <?php if ($Page->SortUrl($Page->NonProgrssiveMotile1) == "") { ?>
        <th class="<?= $Page->NonProgrssiveMotile1->headerCellClass() ?>"><?= $Page->NonProgrssiveMotile1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NonProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NonProgrssiveMotile1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NonProgrssiveMotile1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NonProgrssiveMotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NonProgrssiveMotile1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
    <?php if ($Page->SortUrl($Page->Immotile1) == "") { ?>
        <th class="<?= $Page->Immotile1->headerCellClass() ?>"><?= $Page->Immotile1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Immotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Immotile1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Immotile1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Immotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Immotile1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
    <?php if ($Page->SortUrl($Page->TotalProgrssiveMotile1) == "") { ?>
        <th class="<?= $Page->TotalProgrssiveMotile1->headerCellClass() ?>"><?= $Page->TotalProgrssiveMotile1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TotalProgrssiveMotile1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TotalProgrssiveMotile1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TotalProgrssiveMotile1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TotalProgrssiveMotile1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TotalProgrssiveMotile1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Color->Visible) { // Color ?>
    <?php if ($Page->SortUrl($Page->Color) == "") { ?>
        <th class="<?= $Page->Color->headerCellClass() ?>"><?= $Page->Color->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Color->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Color->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Color->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Color->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Color->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
    <?php if ($Page->SortUrl($Page->DoneBy) == "") { ?>
        <th class="<?= $Page->DoneBy->headerCellClass() ?>"><?= $Page->DoneBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DoneBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DoneBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DoneBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
    <?php if ($Page->SortUrl($Page->Abstinence) == "") { ?>
        <th class="<?= $Page->Abstinence->headerCellClass() ?>"><?= $Page->Abstinence->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Abstinence->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Abstinence->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Abstinence->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Abstinence->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Abstinence->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
    <?php if ($Page->SortUrl($Page->ProcessedBy) == "") { ?>
        <th class="<?= $Page->ProcessedBy->headerCellClass() ?>"><?= $Page->ProcessedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProcessedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProcessedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProcessedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProcessedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProcessedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
    <?php if ($Page->SortUrl($Page->InseminationTime) == "") { ?>
        <th class="<?= $Page->InseminationTime->headerCellClass() ?>"><?= $Page->InseminationTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->InseminationTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->InseminationTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->InseminationTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->InseminationTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->InseminationTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
    <?php if ($Page->SortUrl($Page->InseminationBy) == "") { ?>
        <th class="<?= $Page->InseminationBy->headerCellClass() ?>"><?= $Page->InseminationBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->InseminationBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->InseminationBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->InseminationBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->InseminationBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->InseminationBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
    <?php if ($Page->SortUrl($Page->Big) == "") { ?>
        <th class="<?= $Page->Big->headerCellClass() ?>"><?= $Page->Big->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Big->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Big->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Big->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Big->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Big->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
    <?php if ($Page->SortUrl($Page->Medium) == "") { ?>
        <th class="<?= $Page->Medium->headerCellClass() ?>"><?= $Page->Medium->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Medium->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Medium->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Medium->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Medium->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Medium->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
    <?php if ($Page->SortUrl($Page->Small) == "") { ?>
        <th class="<?= $Page->Small->headerCellClass() ?>"><?= $Page->Small->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Small->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Small->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Small->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Small->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Small->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
    <?php if ($Page->SortUrl($Page->NoHalo) == "") { ?>
        <th class="<?= $Page->NoHalo->headerCellClass() ?>"><?= $Page->NoHalo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NoHalo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NoHalo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NoHalo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NoHalo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NoHalo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
    <?php if ($Page->SortUrl($Page->Fragmented) == "") { ?>
        <th class="<?= $Page->Fragmented->headerCellClass() ?>"><?= $Page->Fragmented->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Fragmented->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Fragmented->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Fragmented->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Fragmented->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Fragmented->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
    <?php if ($Page->SortUrl($Page->NonFragmented) == "") { ?>
        <th class="<?= $Page->NonFragmented->headerCellClass() ?>"><?= $Page->NonFragmented->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NonFragmented->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NonFragmented->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NonFragmented->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NonFragmented->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NonFragmented->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
    <?php if ($Page->SortUrl($Page->DFI) == "") { ?>
        <th class="<?= $Page->DFI->headerCellClass() ?>"><?= $Page->DFI->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DFI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DFI->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DFI->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DFI->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DFI->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
    <?php if ($Page->SortUrl($Page->IsueBy) == "") { ?>
        <th class="<?= $Page->IsueBy->headerCellClass() ?>"><?= $Page->IsueBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IsueBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IsueBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IsueBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IsueBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IsueBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
    <?php if ($Page->SortUrl($Page->Volume2) == "") { ?>
        <th class="<?= $Page->Volume2->headerCellClass() ?>"><?= $Page->Volume2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Volume2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Volume2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Volume2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Volume2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Volume2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
    <?php if ($Page->SortUrl($Page->Concentration2) == "") { ?>
        <th class="<?= $Page->Concentration2->headerCellClass() ?>"><?= $Page->Concentration2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Concentration2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Concentration2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Concentration2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Concentration2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Concentration2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
    <?php if ($Page->SortUrl($Page->Total2) == "") { ?>
        <th class="<?= $Page->Total2->headerCellClass() ?>"><?= $Page->Total2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Total2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Total2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Total2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Total2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Total2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
    <?php if ($Page->SortUrl($Page->ProgressiveMotility2) == "") { ?>
        <th class="<?= $Page->ProgressiveMotility2->headerCellClass() ?>"><?= $Page->ProgressiveMotility2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProgressiveMotility2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProgressiveMotility2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProgressiveMotility2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProgressiveMotility2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProgressiveMotility2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
    <?php if ($Page->SortUrl($Page->NonProgrssiveMotile2) == "") { ?>
        <th class="<?= $Page->NonProgrssiveMotile2->headerCellClass() ?>"><?= $Page->NonProgrssiveMotile2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NonProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NonProgrssiveMotile2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NonProgrssiveMotile2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NonProgrssiveMotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NonProgrssiveMotile2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
    <?php if ($Page->SortUrl($Page->Immotile2) == "") { ?>
        <th class="<?= $Page->Immotile2->headerCellClass() ?>"><?= $Page->Immotile2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Immotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Immotile2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Immotile2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Immotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Immotile2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
    <?php if ($Page->SortUrl($Page->TotalProgrssiveMotile2) == "") { ?>
        <th class="<?= $Page->TotalProgrssiveMotile2->headerCellClass() ?>"><?= $Page->TotalProgrssiveMotile2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TotalProgrssiveMotile2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TotalProgrssiveMotile2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TotalProgrssiveMotile2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TotalProgrssiveMotile2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TotalProgrssiveMotile2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
    <?php if ($Page->SortUrl($Page->IssuedBy) == "") { ?>
        <th class="<?= $Page->IssuedBy->headerCellClass() ?>"><?= $Page->IssuedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IssuedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IssuedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IssuedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IssuedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IssuedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
    <?php if ($Page->SortUrl($Page->IssuedTo) == "") { ?>
        <th class="<?= $Page->IssuedTo->headerCellClass() ?>"><?= $Page->IssuedTo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IssuedTo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IssuedTo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IssuedTo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IssuedTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IssuedTo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
    <?php if ($Page->SortUrl($Page->PaID) == "") { ?>
        <th class="<?= $Page->PaID->headerCellClass() ?>"><?= $Page->PaID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PaID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PaID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PaID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PaID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PaID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
    <?php if ($Page->SortUrl($Page->PaName) == "") { ?>
        <th class="<?= $Page->PaName->headerCellClass() ?>"><?= $Page->PaName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PaName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PaName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PaName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PaName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PaName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
    <?php if ($Page->SortUrl($Page->PaMobile) == "") { ?>
        <th class="<?= $Page->PaMobile->headerCellClass() ?>"><?= $Page->PaMobile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PaMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PaMobile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PaMobile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PaMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PaMobile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
    <?php if ($Page->SortUrl($Page->PartnerID) == "") { ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><?= $Page->PartnerID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PartnerID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PartnerID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PartnerID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PartnerID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PartnerID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
    <?php if ($Page->SortUrl($Page->PartnerName) == "") { ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><?= $Page->PartnerName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PartnerName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PartnerName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PartnerName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PartnerName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PartnerName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
    <?php if ($Page->SortUrl($Page->PartnerMobile) == "") { ?>
        <th class="<?= $Page->PartnerMobile->headerCellClass() ?>"><?= $Page->PartnerMobile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PartnerMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PartnerMobile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PartnerMobile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PartnerMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PartnerMobile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
    <?php if ($Page->SortUrl($Page->PREG_TEST_DATE) == "") { ?>
        <th class="<?= $Page->PREG_TEST_DATE->headerCellClass() ?>"><?= $Page->PREG_TEST_DATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PREG_TEST_DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PREG_TEST_DATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PREG_TEST_DATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PREG_TEST_DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PREG_TEST_DATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
    <?php if ($Page->SortUrl($Page->SPECIFIC_PROBLEMS) == "") { ?>
        <th class="<?= $Page->SPECIFIC_PROBLEMS->headerCellClass() ?>"><?= $Page->SPECIFIC_PROBLEMS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SPECIFIC_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SPECIFIC_PROBLEMS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SPECIFIC_PROBLEMS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SPECIFIC_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SPECIFIC_PROBLEMS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
    <?php if ($Page->SortUrl($Page->IMSC_1) == "") { ?>
        <th class="<?= $Page->IMSC_1->headerCellClass() ?>"><?= $Page->IMSC_1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IMSC_1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IMSC_1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IMSC_1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IMSC_1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IMSC_1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
    <?php if ($Page->SortUrl($Page->IMSC_2) == "") { ?>
        <th class="<?= $Page->IMSC_2->headerCellClass() ?>"><?= $Page->IMSC_2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IMSC_2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IMSC_2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IMSC_2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IMSC_2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IMSC_2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
    <?php if ($Page->SortUrl($Page->LIQUIFACTION_STORAGE) == "") { ?>
        <th class="<?= $Page->LIQUIFACTION_STORAGE->headerCellClass() ?>"><?= $Page->LIQUIFACTION_STORAGE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->LIQUIFACTION_STORAGE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->LIQUIFACTION_STORAGE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->LIQUIFACTION_STORAGE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->LIQUIFACTION_STORAGE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->LIQUIFACTION_STORAGE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
    <?php if ($Page->SortUrl($Page->IUI_PREP_METHOD) == "") { ?>
        <th class="<?= $Page->IUI_PREP_METHOD->headerCellClass() ?>"><?= $Page->IUI_PREP_METHOD->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IUI_PREP_METHOD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IUI_PREP_METHOD->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IUI_PREP_METHOD->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IUI_PREP_METHOD->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IUI_PREP_METHOD->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
    <?php if ($Page->SortUrl($Page->TIME_FROM_TRIGGER) == "") { ?>
        <th class="<?= $Page->TIME_FROM_TRIGGER->headerCellClass() ?>"><?= $Page->TIME_FROM_TRIGGER->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TIME_FROM_TRIGGER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TIME_FROM_TRIGGER->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TIME_FROM_TRIGGER->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TIME_FROM_TRIGGER->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TIME_FROM_TRIGGER->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
    <?php if ($Page->SortUrl($Page->COLLECTION_TO_PREPARATION) == "") { ?>
        <th class="<?= $Page->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->COLLECTION_TO_PREPARATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->COLLECTION_TO_PREPARATION->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->COLLECTION_TO_PREPARATION->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->COLLECTION_TO_PREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->COLLECTION_TO_PREPARATION->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
    <?php if ($Page->SortUrl($Page->TIME_FROM_PREP_TO_INSEM) == "") { ?>
        <th class="<?= $Page->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TIME_FROM_PREP_TO_INSEM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TIME_FROM_PREP_TO_INSEM->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TIME_FROM_PREP_TO_INSEM->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TIME_FROM_PREP_TO_INSEM->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TIME_FROM_PREP_TO_INSEM->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <!-- RIDNo -->
        <td<?= $Page->RIDNo->cellAttributes() ?>>
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td<?= $Page->PatientName->cellAttributes() ?>>
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
        <!-- HusbandName -->
        <td<?= $Page->HusbandName->cellAttributes() ?>>
<span<?= $Page->HusbandName->viewAttributes() ?>>
<?= $Page->HusbandName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <!-- RequestDr -->
        <td<?= $Page->RequestDr->cellAttributes() ?>>
<span<?= $Page->RequestDr->viewAttributes() ?>>
<?= $Page->RequestDr->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <!-- CollectionDate -->
        <td<?= $Page->CollectionDate->cellAttributes() ?>>
<span<?= $Page->CollectionDate->viewAttributes() ?>>
<?= $Page->CollectionDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <!-- ResultDate -->
        <td<?= $Page->ResultDate->cellAttributes() ?>>
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <!-- RequestSample -->
        <td<?= $Page->RequestSample->cellAttributes() ?>>
<span<?= $Page->RequestSample->viewAttributes() ?>>
<?= $Page->RequestSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CollectionType->Visible) { // CollectionType ?>
        <!-- CollectionType -->
        <td<?= $Page->CollectionType->cellAttributes() ?>>
<span<?= $Page->CollectionType->viewAttributes() ?>>
<?= $Page->CollectionType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CollectionMethod->Visible) { // CollectionMethod ?>
        <!-- CollectionMethod -->
        <td<?= $Page->CollectionMethod->cellAttributes() ?>>
<span<?= $Page->CollectionMethod->viewAttributes() ?>>
<?= $Page->CollectionMethod->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Medicationused->Visible) { // Medicationused ?>
        <!-- Medicationused -->
        <td<?= $Page->Medicationused->cellAttributes() ?>>
<span<?= $Page->Medicationused->viewAttributes() ?>>
<?= $Page->Medicationused->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DifficultiesinCollection->Visible) { // DifficultiesinCollection ?>
        <!-- DifficultiesinCollection -->
        <td<?= $Page->DifficultiesinCollection->cellAttributes() ?>>
<span<?= $Page->DifficultiesinCollection->viewAttributes() ?>>
<?= $Page->DifficultiesinCollection->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->pH->Visible) { // pH ?>
        <!-- pH -->
        <td<?= $Page->pH->cellAttributes() ?>>
<span<?= $Page->pH->viewAttributes() ?>>
<?= $Page->pH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Timeofcollection->Visible) { // Timeofcollection ?>
        <!-- Timeofcollection -->
        <td<?= $Page->Timeofcollection->cellAttributes() ?>>
<span<?= $Page->Timeofcollection->viewAttributes() ?>>
<?= $Page->Timeofcollection->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Timeofexamination->Visible) { // Timeofexamination ?>
        <!-- Timeofexamination -->
        <td<?= $Page->Timeofexamination->cellAttributes() ?>>
<span<?= $Page->Timeofexamination->viewAttributes() ?>>
<?= $Page->Timeofexamination->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
        <!-- Volume -->
        <td<?= $Page->Volume->cellAttributes() ?>>
<span<?= $Page->Volume->viewAttributes() ?>>
<?= $Page->Volume->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Concentration->Visible) { // Concentration ?>
        <!-- Concentration -->
        <td<?= $Page->Concentration->cellAttributes() ?>>
<span<?= $Page->Concentration->viewAttributes() ?>>
<?= $Page->Concentration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Total->Visible) { // Total ?>
        <!-- Total -->
        <td<?= $Page->Total->cellAttributes() ?>>
<span<?= $Page->Total->viewAttributes() ?>>
<?= $Page->Total->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProgressiveMotility->Visible) { // ProgressiveMotility ?>
        <!-- ProgressiveMotility -->
        <td<?= $Page->ProgressiveMotility->cellAttributes() ?>>
<span<?= $Page->ProgressiveMotility->viewAttributes() ?>>
<?= $Page->ProgressiveMotility->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile->Visible) { // NonProgrssiveMotile ?>
        <!-- NonProgrssiveMotile -->
        <td<?= $Page->NonProgrssiveMotile->cellAttributes() ?>>
<span<?= $Page->NonProgrssiveMotile->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Immotile->Visible) { // Immotile ?>
        <!-- Immotile -->
        <td<?= $Page->Immotile->cellAttributes() ?>>
<span<?= $Page->Immotile->viewAttributes() ?>>
<?= $Page->Immotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile->Visible) { // TotalProgrssiveMotile ?>
        <!-- TotalProgrssiveMotile -->
        <td<?= $Page->TotalProgrssiveMotile->cellAttributes() ?>>
<span<?= $Page->TotalProgrssiveMotile->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Appearance->Visible) { // Appearance ?>
        <!-- Appearance -->
        <td<?= $Page->Appearance->cellAttributes() ?>>
<span<?= $Page->Appearance->viewAttributes() ?>>
<?= $Page->Appearance->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Homogenosity->Visible) { // Homogenosity ?>
        <!-- Homogenosity -->
        <td<?= $Page->Homogenosity->cellAttributes() ?>>
<span<?= $Page->Homogenosity->viewAttributes() ?>>
<?= $Page->Homogenosity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CompleteSample->Visible) { // CompleteSample ?>
        <!-- CompleteSample -->
        <td<?= $Page->CompleteSample->cellAttributes() ?>>
<span<?= $Page->CompleteSample->viewAttributes() ?>>
<?= $Page->CompleteSample->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Liquefactiontime->Visible) { // Liquefactiontime ?>
        <!-- Liquefactiontime -->
        <td<?= $Page->Liquefactiontime->cellAttributes() ?>>
<span<?= $Page->Liquefactiontime->viewAttributes() ?>>
<?= $Page->Liquefactiontime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Normal->Visible) { // Normal ?>
        <!-- Normal -->
        <td<?= $Page->Normal->cellAttributes() ?>>
<span<?= $Page->Normal->viewAttributes() ?>>
<?= $Page->Normal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Abnormal->Visible) { // Abnormal ?>
        <!-- Abnormal -->
        <td<?= $Page->Abnormal->cellAttributes() ?>>
<span<?= $Page->Abnormal->viewAttributes() ?>>
<?= $Page->Abnormal->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Headdefects->Visible) { // Headdefects ?>
        <!-- Headdefects -->
        <td<?= $Page->Headdefects->cellAttributes() ?>>
<span<?= $Page->Headdefects->viewAttributes() ?>>
<?= $Page->Headdefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MidpieceDefects->Visible) { // MidpieceDefects ?>
        <!-- MidpieceDefects -->
        <td<?= $Page->MidpieceDefects->cellAttributes() ?>>
<span<?= $Page->MidpieceDefects->viewAttributes() ?>>
<?= $Page->MidpieceDefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TailDefects->Visible) { // TailDefects ?>
        <!-- TailDefects -->
        <td<?= $Page->TailDefects->cellAttributes() ?>>
<span<?= $Page->TailDefects->viewAttributes() ?>>
<?= $Page->TailDefects->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NormalProgMotile->Visible) { // NormalProgMotile ?>
        <!-- NormalProgMotile -->
        <td<?= $Page->NormalProgMotile->cellAttributes() ?>>
<span<?= $Page->NormalProgMotile->viewAttributes() ?>>
<?= $Page->NormalProgMotile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ImmatureForms->Visible) { // ImmatureForms ?>
        <!-- ImmatureForms -->
        <td<?= $Page->ImmatureForms->cellAttributes() ?>>
<span<?= $Page->ImmatureForms->viewAttributes() ?>>
<?= $Page->ImmatureForms->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Leucocytes->Visible) { // Leucocytes ?>
        <!-- Leucocytes -->
        <td<?= $Page->Leucocytes->cellAttributes() ?>>
<span<?= $Page->Leucocytes->viewAttributes() ?>>
<?= $Page->Leucocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Agglutination->Visible) { // Agglutination ?>
        <!-- Agglutination -->
        <td<?= $Page->Agglutination->cellAttributes() ?>>
<span<?= $Page->Agglutination->viewAttributes() ?>>
<?= $Page->Agglutination->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Debris->Visible) { // Debris ?>
        <!-- Debris -->
        <td<?= $Page->Debris->cellAttributes() ?>>
<span<?= $Page->Debris->viewAttributes() ?>>
<?= $Page->Debris->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Diagnosis->Visible) { // Diagnosis ?>
        <!-- Diagnosis -->
        <td<?= $Page->Diagnosis->cellAttributes() ?>>
<span<?= $Page->Diagnosis->viewAttributes() ?>>
<?= $Page->Diagnosis->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Observations->Visible) { // Observations ?>
        <!-- Observations -->
        <td<?= $Page->Observations->cellAttributes() ?>>
<span<?= $Page->Observations->viewAttributes() ?>>
<?= $Page->Observations->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Signature->Visible) { // Signature ?>
        <!-- Signature -->
        <td<?= $Page->Signature->cellAttributes() ?>>
<span<?= $Page->Signature->viewAttributes() ?>>
<?= $Page->Signature->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SemenOrgin->Visible) { // SemenOrgin ?>
        <!-- SemenOrgin -->
        <td<?= $Page->SemenOrgin->cellAttributes() ?>>
<span<?= $Page->SemenOrgin->viewAttributes() ?>>
<?= $Page->SemenOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Donor->Visible) { // Donor ?>
        <!-- Donor -->
        <td<?= $Page->Donor->cellAttributes() ?>>
<span<?= $Page->Donor->viewAttributes() ?>>
<?= $Page->Donor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DonorBloodgroup->Visible) { // DonorBloodgroup ?>
        <!-- DonorBloodgroup -->
        <td<?= $Page->DonorBloodgroup->cellAttributes() ?>>
<span<?= $Page->DonorBloodgroup->viewAttributes() ?>>
<?= $Page->DonorBloodgroup->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <!-- Tank -->
        <td<?= $Page->Tank->cellAttributes() ?>>
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
        <!-- Location -->
        <td<?= $Page->Location->cellAttributes() ?>>
<span<?= $Page->Location->viewAttributes() ?>>
<?= $Page->Location->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Volume1->Visible) { // Volume1 ?>
        <!-- Volume1 -->
        <td<?= $Page->Volume1->cellAttributes() ?>>
<span<?= $Page->Volume1->viewAttributes() ?>>
<?= $Page->Volume1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Concentration1->Visible) { // Concentration1 ?>
        <!-- Concentration1 -->
        <td<?= $Page->Concentration1->cellAttributes() ?>>
<span<?= $Page->Concentration1->viewAttributes() ?>>
<?= $Page->Concentration1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Total1->Visible) { // Total1 ?>
        <!-- Total1 -->
        <td<?= $Page->Total1->cellAttributes() ?>>
<span<?= $Page->Total1->viewAttributes() ?>>
<?= $Page->Total1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProgressiveMotility1->Visible) { // ProgressiveMotility1 ?>
        <!-- ProgressiveMotility1 -->
        <td<?= $Page->ProgressiveMotility1->cellAttributes() ?>>
<span<?= $Page->ProgressiveMotility1->viewAttributes() ?>>
<?= $Page->ProgressiveMotility1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile1->Visible) { // NonProgrssiveMotile1 ?>
        <!-- NonProgrssiveMotile1 -->
        <td<?= $Page->NonProgrssiveMotile1->cellAttributes() ?>>
<span<?= $Page->NonProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Immotile1->Visible) { // Immotile1 ?>
        <!-- Immotile1 -->
        <td<?= $Page->Immotile1->cellAttributes() ?>>
<span<?= $Page->Immotile1->viewAttributes() ?>>
<?= $Page->Immotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile1->Visible) { // TotalProgrssiveMotile1 ?>
        <!-- TotalProgrssiveMotile1 -->
        <td<?= $Page->TotalProgrssiveMotile1->cellAttributes() ?>>
<span<?= $Page->TotalProgrssiveMotile1->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <!-- TidNo -->
        <td<?= $Page->TidNo->cellAttributes() ?>>
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Color->Visible) { // Color ?>
        <!-- Color -->
        <td<?= $Page->Color->cellAttributes() ?>>
<span<?= $Page->Color->viewAttributes() ?>>
<?= $Page->Color->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DoneBy->Visible) { // DoneBy ?>
        <!-- DoneBy -->
        <td<?= $Page->DoneBy->cellAttributes() ?>>
<span<?= $Page->DoneBy->viewAttributes() ?>>
<?= $Page->DoneBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <!-- Method -->
        <td<?= $Page->Method->cellAttributes() ?>>
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Abstinence->Visible) { // Abstinence ?>
        <!-- Abstinence -->
        <td<?= $Page->Abstinence->cellAttributes() ?>>
<span<?= $Page->Abstinence->viewAttributes() ?>>
<?= $Page->Abstinence->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProcessedBy->Visible) { // ProcessedBy ?>
        <!-- ProcessedBy -->
        <td<?= $Page->ProcessedBy->cellAttributes() ?>>
<span<?= $Page->ProcessedBy->viewAttributes() ?>>
<?= $Page->ProcessedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->InseminationTime->Visible) { // InseminationTime ?>
        <!-- InseminationTime -->
        <td<?= $Page->InseminationTime->cellAttributes() ?>>
<span<?= $Page->InseminationTime->viewAttributes() ?>>
<?= $Page->InseminationTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->InseminationBy->Visible) { // InseminationBy ?>
        <!-- InseminationBy -->
        <td<?= $Page->InseminationBy->cellAttributes() ?>>
<span<?= $Page->InseminationBy->viewAttributes() ?>>
<?= $Page->InseminationBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Big->Visible) { // Big ?>
        <!-- Big -->
        <td<?= $Page->Big->cellAttributes() ?>>
<span<?= $Page->Big->viewAttributes() ?>>
<?= $Page->Big->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Medium->Visible) { // Medium ?>
        <!-- Medium -->
        <td<?= $Page->Medium->cellAttributes() ?>>
<span<?= $Page->Medium->viewAttributes() ?>>
<?= $Page->Medium->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Small->Visible) { // Small ?>
        <!-- Small -->
        <td<?= $Page->Small->cellAttributes() ?>>
<span<?= $Page->Small->viewAttributes() ?>>
<?= $Page->Small->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NoHalo->Visible) { // NoHalo ?>
        <!-- NoHalo -->
        <td<?= $Page->NoHalo->cellAttributes() ?>>
<span<?= $Page->NoHalo->viewAttributes() ?>>
<?= $Page->NoHalo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Fragmented->Visible) { // Fragmented ?>
        <!-- Fragmented -->
        <td<?= $Page->Fragmented->cellAttributes() ?>>
<span<?= $Page->Fragmented->viewAttributes() ?>>
<?= $Page->Fragmented->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NonFragmented->Visible) { // NonFragmented ?>
        <!-- NonFragmented -->
        <td<?= $Page->NonFragmented->cellAttributes() ?>>
<span<?= $Page->NonFragmented->viewAttributes() ?>>
<?= $Page->NonFragmented->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DFI->Visible) { // DFI ?>
        <!-- DFI -->
        <td<?= $Page->DFI->cellAttributes() ?>>
<span<?= $Page->DFI->viewAttributes() ?>>
<?= $Page->DFI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IsueBy->Visible) { // IsueBy ?>
        <!-- IsueBy -->
        <td<?= $Page->IsueBy->cellAttributes() ?>>
<span<?= $Page->IsueBy->viewAttributes() ?>>
<?= $Page->IsueBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Volume2->Visible) { // Volume2 ?>
        <!-- Volume2 -->
        <td<?= $Page->Volume2->cellAttributes() ?>>
<span<?= $Page->Volume2->viewAttributes() ?>>
<?= $Page->Volume2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Concentration2->Visible) { // Concentration2 ?>
        <!-- Concentration2 -->
        <td<?= $Page->Concentration2->cellAttributes() ?>>
<span<?= $Page->Concentration2->viewAttributes() ?>>
<?= $Page->Concentration2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Total2->Visible) { // Total2 ?>
        <!-- Total2 -->
        <td<?= $Page->Total2->cellAttributes() ?>>
<span<?= $Page->Total2->viewAttributes() ?>>
<?= $Page->Total2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProgressiveMotility2->Visible) { // ProgressiveMotility2 ?>
        <!-- ProgressiveMotility2 -->
        <td<?= $Page->ProgressiveMotility2->cellAttributes() ?>>
<span<?= $Page->ProgressiveMotility2->viewAttributes() ?>>
<?= $Page->ProgressiveMotility2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NonProgrssiveMotile2->Visible) { // NonProgrssiveMotile2 ?>
        <!-- NonProgrssiveMotile2 -->
        <td<?= $Page->NonProgrssiveMotile2->cellAttributes() ?>>
<span<?= $Page->NonProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->NonProgrssiveMotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Immotile2->Visible) { // Immotile2 ?>
        <!-- Immotile2 -->
        <td<?= $Page->Immotile2->cellAttributes() ?>>
<span<?= $Page->Immotile2->viewAttributes() ?>>
<?= $Page->Immotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TotalProgrssiveMotile2->Visible) { // TotalProgrssiveMotile2 ?>
        <!-- TotalProgrssiveMotile2 -->
        <td<?= $Page->TotalProgrssiveMotile2->cellAttributes() ?>>
<span<?= $Page->TotalProgrssiveMotile2->viewAttributes() ?>>
<?= $Page->TotalProgrssiveMotile2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
        <!-- IssuedBy -->
        <td<?= $Page->IssuedBy->cellAttributes() ?>>
<span<?= $Page->IssuedBy->viewAttributes() ?>>
<?= $Page->IssuedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
        <!-- IssuedTo -->
        <td<?= $Page->IssuedTo->cellAttributes() ?>>
<span<?= $Page->IssuedTo->viewAttributes() ?>>
<?= $Page->IssuedTo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PaID->Visible) { // PaID ?>
        <!-- PaID -->
        <td<?= $Page->PaID->cellAttributes() ?>>
<span<?= $Page->PaID->viewAttributes() ?>>
<?= $Page->PaID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PaName->Visible) { // PaName ?>
        <!-- PaName -->
        <td<?= $Page->PaName->cellAttributes() ?>>
<span<?= $Page->PaName->viewAttributes() ?>>
<?= $Page->PaName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PaMobile->Visible) { // PaMobile ?>
        <!-- PaMobile -->
        <td<?= $Page->PaMobile->cellAttributes() ?>>
<span<?= $Page->PaMobile->viewAttributes() ?>>
<?= $Page->PaMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PartnerID->Visible) { // PartnerID ?>
        <!-- PartnerID -->
        <td<?= $Page->PartnerID->cellAttributes() ?>>
<span<?= $Page->PartnerID->viewAttributes() ?>>
<?= $Page->PartnerID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PartnerName->Visible) { // PartnerName ?>
        <!-- PartnerName -->
        <td<?= $Page->PartnerName->cellAttributes() ?>>
<span<?= $Page->PartnerName->viewAttributes() ?>>
<?= $Page->PartnerName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PartnerMobile->Visible) { // PartnerMobile ?>
        <!-- PartnerMobile -->
        <td<?= $Page->PartnerMobile->cellAttributes() ?>>
<span<?= $Page->PartnerMobile->viewAttributes() ?>>
<?= $Page->PartnerMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PREG_TEST_DATE->Visible) { // PREG_TEST_DATE ?>
        <!-- PREG_TEST_DATE -->
        <td<?= $Page->PREG_TEST_DATE->cellAttributes() ?>>
<span<?= $Page->PREG_TEST_DATE->viewAttributes() ?>>
<?= $Page->PREG_TEST_DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SPECIFIC_PROBLEMS->Visible) { // SPECIFIC_PROBLEMS ?>
        <!-- SPECIFIC_PROBLEMS -->
        <td<?= $Page->SPECIFIC_PROBLEMS->cellAttributes() ?>>
<span<?= $Page->SPECIFIC_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IMSC_1->Visible) { // IMSC_1 ?>
        <!-- IMSC_1 -->
        <td<?= $Page->IMSC_1->cellAttributes() ?>>
<span<?= $Page->IMSC_1->viewAttributes() ?>>
<?= $Page->IMSC_1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IMSC_2->Visible) { // IMSC_2 ?>
        <!-- IMSC_2 -->
        <td<?= $Page->IMSC_2->cellAttributes() ?>>
<span<?= $Page->IMSC_2->viewAttributes() ?>>
<?= $Page->IMSC_2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->LIQUIFACTION_STORAGE->Visible) { // LIQUIFACTION_STORAGE ?>
        <!-- LIQUIFACTION_STORAGE -->
        <td<?= $Page->LIQUIFACTION_STORAGE->cellAttributes() ?>>
<span<?= $Page->LIQUIFACTION_STORAGE->viewAttributes() ?>>
<?= $Page->LIQUIFACTION_STORAGE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IUI_PREP_METHOD->Visible) { // IUI_PREP_METHOD ?>
        <!-- IUI_PREP_METHOD -->
        <td<?= $Page->IUI_PREP_METHOD->cellAttributes() ?>>
<span<?= $Page->IUI_PREP_METHOD->viewAttributes() ?>>
<?= $Page->IUI_PREP_METHOD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TIME_FROM_TRIGGER->Visible) { // TIME_FROM_TRIGGER ?>
        <!-- TIME_FROM_TRIGGER -->
        <td<?= $Page->TIME_FROM_TRIGGER->cellAttributes() ?>>
<span<?= $Page->TIME_FROM_TRIGGER->viewAttributes() ?>>
<?= $Page->TIME_FROM_TRIGGER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->COLLECTION_TO_PREPARATION->Visible) { // COLLECTION_TO_PREPARATION ?>
        <!-- COLLECTION_TO_PREPARATION -->
        <td<?= $Page->COLLECTION_TO_PREPARATION->cellAttributes() ?>>
<span<?= $Page->COLLECTION_TO_PREPARATION->viewAttributes() ?>>
<?= $Page->COLLECTION_TO_PREPARATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TIME_FROM_PREP_TO_INSEM->Visible) { // TIME_FROM_PREP_TO_INSEM ?>
        <!-- TIME_FROM_PREP_TO_INSEM -->
        <td<?= $Page->TIME_FROM_PREP_TO_INSEM->cellAttributes() ?>>
<span<?= $Page->TIME_FROM_PREP_TO_INSEM->viewAttributes() ?>>
<?= $Page->TIME_FROM_PREP_TO_INSEM->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfStimulationChartPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_stimulation_chart"><!-- .card -->
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
<?php if ($Page->Name->Visible) { // Name ?>
    <?php if ($Page->SortUrl($Page->Name) == "") { ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><?= $Page->Name->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Name->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Name->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Name->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
    <?php if ($Page->SortUrl($Page->ARTCycle) == "") { ?>
        <th class="<?= $Page->ARTCycle->headerCellClass() ?>"><?= $Page->ARTCycle->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ARTCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ARTCycle->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ARTCycle->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ARTCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ARTCycle->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
    <?php if ($Page->SortUrl($Page->FemaleFactor) == "") { ?>
        <th class="<?= $Page->FemaleFactor->headerCellClass() ?>"><?= $Page->FemaleFactor->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FemaleFactor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FemaleFactor->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FemaleFactor->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FemaleFactor->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FemaleFactor->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
    <?php if ($Page->SortUrl($Page->MaleFactor) == "") { ?>
        <th class="<?= $Page->MaleFactor->headerCellClass() ?>"><?= $Page->MaleFactor->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MaleFactor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MaleFactor->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MaleFactor->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MaleFactor->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MaleFactor->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
    <?php if ($Page->SortUrl($Page->Protocol) == "") { ?>
        <th class="<?= $Page->Protocol->headerCellClass() ?>"><?= $Page->Protocol->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Protocol->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Protocol->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Protocol->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Protocol->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Protocol->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
    <?php if ($Page->SortUrl($Page->SemenFrozen) == "") { ?>
        <th class="<?= $Page->SemenFrozen->headerCellClass() ?>"><?= $Page->SemenFrozen->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SemenFrozen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SemenFrozen->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SemenFrozen->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SemenFrozen->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SemenFrozen->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
    <?php if ($Page->SortUrl($Page->A4ICSICycle) == "") { ?>
        <th class="<?= $Page->A4ICSICycle->headerCellClass() ?>"><?= $Page->A4ICSICycle->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A4ICSICycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A4ICSICycle->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A4ICSICycle->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A4ICSICycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A4ICSICycle->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
    <?php if ($Page->SortUrl($Page->TotalICSICycle) == "") { ?>
        <th class="<?= $Page->TotalICSICycle->headerCellClass() ?>"><?= $Page->TotalICSICycle->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TotalICSICycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TotalICSICycle->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TotalICSICycle->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TotalICSICycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TotalICSICycle->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
    <?php if ($Page->SortUrl($Page->TypeOfInfertility) == "") { ?>
        <th class="<?= $Page->TypeOfInfertility->headerCellClass() ?>"><?= $Page->TypeOfInfertility->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TypeOfInfertility->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TypeOfInfertility->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TypeOfInfertility->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TypeOfInfertility->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TypeOfInfertility->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <?php if ($Page->SortUrl($Page->Duration) == "") { ?>
        <th class="<?= $Page->Duration->headerCellClass() ?>"><?= $Page->Duration->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Duration->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Duration->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Duration->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Duration->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Duration->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <?php if ($Page->SortUrl($Page->LMP) == "") { ?>
        <th class="<?= $Page->LMP->headerCellClass() ?>"><?= $Page->LMP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->LMP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->LMP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->LMP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->LMP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->LMP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
    <?php if ($Page->SortUrl($Page->RelevantHistory) == "") { ?>
        <th class="<?= $Page->RelevantHistory->headerCellClass() ?>"><?= $Page->RelevantHistory->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RelevantHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RelevantHistory->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RelevantHistory->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RelevantHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RelevantHistory->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
    <?php if ($Page->SortUrl($Page->IUICycles) == "") { ?>
        <th class="<?= $Page->IUICycles->headerCellClass() ?>"><?= $Page->IUICycles->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IUICycles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IUICycles->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IUICycles->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IUICycles->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IUICycles->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
    <?php if ($Page->SortUrl($Page->AFC) == "") { ?>
        <th class="<?= $Page->AFC->headerCellClass() ?>"><?= $Page->AFC->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AFC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AFC->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AFC->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AFC->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AFC->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
    <?php if ($Page->SortUrl($Page->AMH) == "") { ?>
        <th class="<?= $Page->AMH->headerCellClass() ?>"><?= $Page->AMH->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AMH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AMH->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AMH->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AMH->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AMH->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
    <?php if ($Page->SortUrl($Page->FBMI) == "") { ?>
        <th class="<?= $Page->FBMI->headerCellClass() ?>"><?= $Page->FBMI->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FBMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FBMI->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FBMI->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FBMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FBMI->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
    <?php if ($Page->SortUrl($Page->MBMI) == "") { ?>
        <th class="<?= $Page->MBMI->headerCellClass() ?>"><?= $Page->MBMI->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MBMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MBMI->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MBMI->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MBMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MBMI->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
    <?php if ($Page->SortUrl($Page->OvarianVolumeRT) == "") { ?>
        <th class="<?= $Page->OvarianVolumeRT->headerCellClass() ?>"><?= $Page->OvarianVolumeRT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OvarianVolumeRT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OvarianVolumeRT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OvarianVolumeRT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OvarianVolumeRT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OvarianVolumeRT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
    <?php if ($Page->SortUrl($Page->OvarianVolumeLT) == "") { ?>
        <th class="<?= $Page->OvarianVolumeLT->headerCellClass() ?>"><?= $Page->OvarianVolumeLT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OvarianVolumeLT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OvarianVolumeLT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OvarianVolumeLT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OvarianVolumeLT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OvarianVolumeLT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
    <?php if ($Page->SortUrl($Page->DAYSOFSTIMULATION) == "") { ?>
        <th class="<?= $Page->DAYSOFSTIMULATION->headerCellClass() ?>"><?= $Page->DAYSOFSTIMULATION->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DAYSOFSTIMULATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DAYSOFSTIMULATION->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DAYSOFSTIMULATION->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DAYSOFSTIMULATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DAYSOFSTIMULATION->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
    <?php if ($Page->SortUrl($Page->DOSEOFGONADOTROPINS) == "") { ?>
        <th class="<?= $Page->DOSEOFGONADOTROPINS->headerCellClass() ?>"><?= $Page->DOSEOFGONADOTROPINS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DOSEOFGONADOTROPINS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DOSEOFGONADOTROPINS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DOSEOFGONADOTROPINS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DOSEOFGONADOTROPINS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DOSEOFGONADOTROPINS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
    <?php if ($Page->SortUrl($Page->INJTYPE) == "") { ?>
        <th class="<?= $Page->INJTYPE->headerCellClass() ?>"><?= $Page->INJTYPE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->INJTYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->INJTYPE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->INJTYPE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->INJTYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->INJTYPE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
    <?php if ($Page->SortUrl($Page->ANTAGONISTDAYS) == "") { ?>
        <th class="<?= $Page->ANTAGONISTDAYS->headerCellClass() ?>"><?= $Page->ANTAGONISTDAYS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ANTAGONISTDAYS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ANTAGONISTDAYS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ANTAGONISTDAYS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ANTAGONISTDAYS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ANTAGONISTDAYS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
    <?php if ($Page->SortUrl($Page->ANTAGONISTSTARTDAY) == "") { ?>
        <th class="<?= $Page->ANTAGONISTSTARTDAY->headerCellClass() ?>"><?= $Page->ANTAGONISTSTARTDAY->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ANTAGONISTSTARTDAY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ANTAGONISTSTARTDAY->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ANTAGONISTSTARTDAY->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ANTAGONISTSTARTDAY->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ANTAGONISTSTARTDAY->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
    <?php if ($Page->SortUrl($Page->GROWTHHORMONE) == "") { ?>
        <th class="<?= $Page->GROWTHHORMONE->headerCellClass() ?>"><?= $Page->GROWTHHORMONE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GROWTHHORMONE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GROWTHHORMONE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GROWTHHORMONE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GROWTHHORMONE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GROWTHHORMONE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
    <?php if ($Page->SortUrl($Page->PRETREATMENT) == "") { ?>
        <th class="<?= $Page->PRETREATMENT->headerCellClass() ?>"><?= $Page->PRETREATMENT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PRETREATMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PRETREATMENT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PRETREATMENT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PRETREATMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PRETREATMENT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
    <?php if ($Page->SortUrl($Page->SerumP4) == "") { ?>
        <th class="<?= $Page->SerumP4->headerCellClass() ?>"><?= $Page->SerumP4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SerumP4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SerumP4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SerumP4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SerumP4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SerumP4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
    <?php if ($Page->SortUrl($Page->FORT) == "") { ?>
        <th class="<?= $Page->FORT->headerCellClass() ?>"><?= $Page->FORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
    <?php if ($Page->SortUrl($Page->MedicalFactors) == "") { ?>
        <th class="<?= $Page->MedicalFactors->headerCellClass() ?>"><?= $Page->MedicalFactors->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MedicalFactors->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MedicalFactors->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MedicalFactors->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MedicalFactors->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MedicalFactors->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
    <?php if ($Page->SortUrl($Page->SCDate) == "") { ?>
        <th class="<?= $Page->SCDate->headerCellClass() ?>"><?= $Page->SCDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SCDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SCDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SCDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SCDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SCDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
    <?php if ($Page->SortUrl($Page->OvarianSurgery) == "") { ?>
        <th class="<?= $Page->OvarianSurgery->headerCellClass() ?>"><?= $Page->OvarianSurgery->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OvarianSurgery->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OvarianSurgery->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OvarianSurgery->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OvarianSurgery->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OvarianSurgery->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
    <?php if ($Page->SortUrl($Page->PreProcedureOrder) == "") { ?>
        <th class="<?= $Page->PreProcedureOrder->headerCellClass() ?>"><?= $Page->PreProcedureOrder->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PreProcedureOrder->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PreProcedureOrder->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PreProcedureOrder->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PreProcedureOrder->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PreProcedureOrder->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
    <?php if ($Page->SortUrl($Page->TRIGGERR) == "") { ?>
        <th class="<?= $Page->TRIGGERR->headerCellClass() ?>"><?= $Page->TRIGGERR->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TRIGGERR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TRIGGERR->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TRIGGERR->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TRIGGERR->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TRIGGERR->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
    <?php if ($Page->SortUrl($Page->TRIGGERDATE) == "") { ?>
        <th class="<?= $Page->TRIGGERDATE->headerCellClass() ?>"><?= $Page->TRIGGERDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TRIGGERDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TRIGGERDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TRIGGERDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TRIGGERDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TRIGGERDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
    <?php if ($Page->SortUrl($Page->ATHOMEorCLINIC) == "") { ?>
        <th class="<?= $Page->ATHOMEorCLINIC->headerCellClass() ?>"><?= $Page->ATHOMEorCLINIC->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ATHOMEorCLINIC->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ATHOMEorCLINIC->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ATHOMEorCLINIC->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ATHOMEorCLINIC->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ATHOMEorCLINIC->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
    <?php if ($Page->SortUrl($Page->OPUDATE) == "") { ?>
        <th class="<?= $Page->OPUDATE->headerCellClass() ?>"><?= $Page->OPUDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OPUDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OPUDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OPUDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OPUDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OPUDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
    <?php if ($Page->SortUrl($Page->ALLFREEZEINDICATION) == "") { ?>
        <th class="<?= $Page->ALLFREEZEINDICATION->headerCellClass() ?>"><?= $Page->ALLFREEZEINDICATION->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ALLFREEZEINDICATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ALLFREEZEINDICATION->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ALLFREEZEINDICATION->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ALLFREEZEINDICATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ALLFREEZEINDICATION->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
    <?php if ($Page->SortUrl($Page->ERA) == "") { ?>
        <th class="<?= $Page->ERA->headerCellClass() ?>"><?= $Page->ERA->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ERA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ERA->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ERA->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ERA->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ERA->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
    <?php if ($Page->SortUrl($Page->PGTA) == "") { ?>
        <th class="<?= $Page->PGTA->headerCellClass() ?>"><?= $Page->PGTA->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PGTA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PGTA->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PGTA->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PGTA->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PGTA->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
    <?php if ($Page->SortUrl($Page->PGD) == "") { ?>
        <th class="<?= $Page->PGD->headerCellClass() ?>"><?= $Page->PGD->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PGD->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PGD->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PGD->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PGD->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PGD->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
    <?php if ($Page->SortUrl($Page->DATEOFET) == "") { ?>
        <th class="<?= $Page->DATEOFET->headerCellClass() ?>"><?= $Page->DATEOFET->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DATEOFET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DATEOFET->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DATEOFET->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DATEOFET->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DATEOFET->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
    <?php if ($Page->SortUrl($Page->ET) == "") { ?>
        <th class="<?= $Page->ET->headerCellClass() ?>"><?= $Page->ET->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ET->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ET->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ET->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ET->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
    <?php if ($Page->SortUrl($Page->ESET) == "") { ?>
        <th class="<?= $Page->ESET->headerCellClass() ?>"><?= $Page->ESET->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ESET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ESET->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ESET->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ESET->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ESET->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
    <?php if ($Page->SortUrl($Page->DOET) == "") { ?>
        <th class="<?= $Page->DOET->headerCellClass() ?>"><?= $Page->DOET->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DOET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DOET->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DOET->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DOET->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DOET->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
    <?php if ($Page->SortUrl($Page->SEMENPREPARATION) == "") { ?>
        <th class="<?= $Page->SEMENPREPARATION->headerCellClass() ?>"><?= $Page->SEMENPREPARATION->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SEMENPREPARATION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SEMENPREPARATION->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SEMENPREPARATION->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SEMENPREPARATION->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SEMENPREPARATION->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
    <?php if ($Page->SortUrl($Page->REASONFORESET) == "") { ?>
        <th class="<?= $Page->REASONFORESET->headerCellClass() ?>"><?= $Page->REASONFORESET->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->REASONFORESET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->REASONFORESET->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->REASONFORESET->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->REASONFORESET->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->REASONFORESET->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
    <?php if ($Page->SortUrl($Page->Expectedoocytes) == "") { ?>
        <th class="<?= $Page->Expectedoocytes->headerCellClass() ?>"><?= $Page->Expectedoocytes->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Expectedoocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Expectedoocytes->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Expectedoocytes->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Expectedoocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Expectedoocytes->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
    <?php if ($Page->SortUrl($Page->StChDate1) == "") { ?>
        <th class="<?= $Page->StChDate1->headerCellClass() ?>"><?= $Page->StChDate1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
    <?php if ($Page->SortUrl($Page->StChDate2) == "") { ?>
        <th class="<?= $Page->StChDate2->headerCellClass() ?>"><?= $Page->StChDate2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
    <?php if ($Page->SortUrl($Page->StChDate3) == "") { ?>
        <th class="<?= $Page->StChDate3->headerCellClass() ?>"><?= $Page->StChDate3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
    <?php if ($Page->SortUrl($Page->StChDate4) == "") { ?>
        <th class="<?= $Page->StChDate4->headerCellClass() ?>"><?= $Page->StChDate4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
    <?php if ($Page->SortUrl($Page->StChDate5) == "") { ?>
        <th class="<?= $Page->StChDate5->headerCellClass() ?>"><?= $Page->StChDate5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
    <?php if ($Page->SortUrl($Page->StChDate6) == "") { ?>
        <th class="<?= $Page->StChDate6->headerCellClass() ?>"><?= $Page->StChDate6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
    <?php if ($Page->SortUrl($Page->StChDate7) == "") { ?>
        <th class="<?= $Page->StChDate7->headerCellClass() ?>"><?= $Page->StChDate7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
    <?php if ($Page->SortUrl($Page->StChDate8) == "") { ?>
        <th class="<?= $Page->StChDate8->headerCellClass() ?>"><?= $Page->StChDate8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
    <?php if ($Page->SortUrl($Page->StChDate9) == "") { ?>
        <th class="<?= $Page->StChDate9->headerCellClass() ?>"><?= $Page->StChDate9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
    <?php if ($Page->SortUrl($Page->StChDate10) == "") { ?>
        <th class="<?= $Page->StChDate10->headerCellClass() ?>"><?= $Page->StChDate10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
    <?php if ($Page->SortUrl($Page->StChDate11) == "") { ?>
        <th class="<?= $Page->StChDate11->headerCellClass() ?>"><?= $Page->StChDate11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
    <?php if ($Page->SortUrl($Page->StChDate12) == "") { ?>
        <th class="<?= $Page->StChDate12->headerCellClass() ?>"><?= $Page->StChDate12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
    <?php if ($Page->SortUrl($Page->StChDate13) == "") { ?>
        <th class="<?= $Page->StChDate13->headerCellClass() ?>"><?= $Page->StChDate13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
    <?php if ($Page->SortUrl($Page->CycleDay1) == "") { ?>
        <th class="<?= $Page->CycleDay1->headerCellClass() ?>"><?= $Page->CycleDay1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
    <?php if ($Page->SortUrl($Page->CycleDay2) == "") { ?>
        <th class="<?= $Page->CycleDay2->headerCellClass() ?>"><?= $Page->CycleDay2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
    <?php if ($Page->SortUrl($Page->CycleDay3) == "") { ?>
        <th class="<?= $Page->CycleDay3->headerCellClass() ?>"><?= $Page->CycleDay3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
    <?php if ($Page->SortUrl($Page->CycleDay4) == "") { ?>
        <th class="<?= $Page->CycleDay4->headerCellClass() ?>"><?= $Page->CycleDay4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
    <?php if ($Page->SortUrl($Page->CycleDay5) == "") { ?>
        <th class="<?= $Page->CycleDay5->headerCellClass() ?>"><?= $Page->CycleDay5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
    <?php if ($Page->SortUrl($Page->CycleDay6) == "") { ?>
        <th class="<?= $Page->CycleDay6->headerCellClass() ?>"><?= $Page->CycleDay6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
    <?php if ($Page->SortUrl($Page->CycleDay7) == "") { ?>
        <th class="<?= $Page->CycleDay7->headerCellClass() ?>"><?= $Page->CycleDay7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
    <?php if ($Page->SortUrl($Page->CycleDay8) == "") { ?>
        <th class="<?= $Page->CycleDay8->headerCellClass() ?>"><?= $Page->CycleDay8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
    <?php if ($Page->SortUrl($Page->CycleDay9) == "") { ?>
        <th class="<?= $Page->CycleDay9->headerCellClass() ?>"><?= $Page->CycleDay9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
    <?php if ($Page->SortUrl($Page->CycleDay10) == "") { ?>
        <th class="<?= $Page->CycleDay10->headerCellClass() ?>"><?= $Page->CycleDay10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
    <?php if ($Page->SortUrl($Page->CycleDay11) == "") { ?>
        <th class="<?= $Page->CycleDay11->headerCellClass() ?>"><?= $Page->CycleDay11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
    <?php if ($Page->SortUrl($Page->CycleDay12) == "") { ?>
        <th class="<?= $Page->CycleDay12->headerCellClass() ?>"><?= $Page->CycleDay12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
    <?php if ($Page->SortUrl($Page->CycleDay13) == "") { ?>
        <th class="<?= $Page->CycleDay13->headerCellClass() ?>"><?= $Page->CycleDay13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay1) == "") { ?>
        <th class="<?= $Page->StimulationDay1->headerCellClass() ?>"><?= $Page->StimulationDay1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay2) == "") { ?>
        <th class="<?= $Page->StimulationDay2->headerCellClass() ?>"><?= $Page->StimulationDay2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay3) == "") { ?>
        <th class="<?= $Page->StimulationDay3->headerCellClass() ?>"><?= $Page->StimulationDay3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay4) == "") { ?>
        <th class="<?= $Page->StimulationDay4->headerCellClass() ?>"><?= $Page->StimulationDay4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay5) == "") { ?>
        <th class="<?= $Page->StimulationDay5->headerCellClass() ?>"><?= $Page->StimulationDay5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay6) == "") { ?>
        <th class="<?= $Page->StimulationDay6->headerCellClass() ?>"><?= $Page->StimulationDay6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay7) == "") { ?>
        <th class="<?= $Page->StimulationDay7->headerCellClass() ?>"><?= $Page->StimulationDay7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay8) == "") { ?>
        <th class="<?= $Page->StimulationDay8->headerCellClass() ?>"><?= $Page->StimulationDay8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay9) == "") { ?>
        <th class="<?= $Page->StimulationDay9->headerCellClass() ?>"><?= $Page->StimulationDay9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay10) == "") { ?>
        <th class="<?= $Page->StimulationDay10->headerCellClass() ?>"><?= $Page->StimulationDay10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay11) == "") { ?>
        <th class="<?= $Page->StimulationDay11->headerCellClass() ?>"><?= $Page->StimulationDay11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay12) == "") { ?>
        <th class="<?= $Page->StimulationDay12->headerCellClass() ?>"><?= $Page->StimulationDay12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay13) == "") { ?>
        <th class="<?= $Page->StimulationDay13->headerCellClass() ?>"><?= $Page->StimulationDay13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
    <?php if ($Page->SortUrl($Page->Tablet1) == "") { ?>
        <th class="<?= $Page->Tablet1->headerCellClass() ?>"><?= $Page->Tablet1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
    <?php if ($Page->SortUrl($Page->Tablet2) == "") { ?>
        <th class="<?= $Page->Tablet2->headerCellClass() ?>"><?= $Page->Tablet2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
    <?php if ($Page->SortUrl($Page->Tablet3) == "") { ?>
        <th class="<?= $Page->Tablet3->headerCellClass() ?>"><?= $Page->Tablet3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
    <?php if ($Page->SortUrl($Page->Tablet4) == "") { ?>
        <th class="<?= $Page->Tablet4->headerCellClass() ?>"><?= $Page->Tablet4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
    <?php if ($Page->SortUrl($Page->Tablet5) == "") { ?>
        <th class="<?= $Page->Tablet5->headerCellClass() ?>"><?= $Page->Tablet5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
    <?php if ($Page->SortUrl($Page->Tablet6) == "") { ?>
        <th class="<?= $Page->Tablet6->headerCellClass() ?>"><?= $Page->Tablet6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
    <?php if ($Page->SortUrl($Page->Tablet7) == "") { ?>
        <th class="<?= $Page->Tablet7->headerCellClass() ?>"><?= $Page->Tablet7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
    <?php if ($Page->SortUrl($Page->Tablet8) == "") { ?>
        <th class="<?= $Page->Tablet8->headerCellClass() ?>"><?= $Page->Tablet8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
    <?php if ($Page->SortUrl($Page->Tablet9) == "") { ?>
        <th class="<?= $Page->Tablet9->headerCellClass() ?>"><?= $Page->Tablet9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
    <?php if ($Page->SortUrl($Page->Tablet10) == "") { ?>
        <th class="<?= $Page->Tablet10->headerCellClass() ?>"><?= $Page->Tablet10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
    <?php if ($Page->SortUrl($Page->Tablet11) == "") { ?>
        <th class="<?= $Page->Tablet11->headerCellClass() ?>"><?= $Page->Tablet11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
    <?php if ($Page->SortUrl($Page->Tablet12) == "") { ?>
        <th class="<?= $Page->Tablet12->headerCellClass() ?>"><?= $Page->Tablet12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
    <?php if ($Page->SortUrl($Page->Tablet13) == "") { ?>
        <th class="<?= $Page->Tablet13->headerCellClass() ?>"><?= $Page->Tablet13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
    <?php if ($Page->SortUrl($Page->RFSH1) == "") { ?>
        <th class="<?= $Page->RFSH1->headerCellClass() ?>"><?= $Page->RFSH1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
    <?php if ($Page->SortUrl($Page->RFSH2) == "") { ?>
        <th class="<?= $Page->RFSH2->headerCellClass() ?>"><?= $Page->RFSH2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
    <?php if ($Page->SortUrl($Page->RFSH3) == "") { ?>
        <th class="<?= $Page->RFSH3->headerCellClass() ?>"><?= $Page->RFSH3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
    <?php if ($Page->SortUrl($Page->RFSH4) == "") { ?>
        <th class="<?= $Page->RFSH4->headerCellClass() ?>"><?= $Page->RFSH4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
    <?php if ($Page->SortUrl($Page->RFSH5) == "") { ?>
        <th class="<?= $Page->RFSH5->headerCellClass() ?>"><?= $Page->RFSH5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
    <?php if ($Page->SortUrl($Page->RFSH6) == "") { ?>
        <th class="<?= $Page->RFSH6->headerCellClass() ?>"><?= $Page->RFSH6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
    <?php if ($Page->SortUrl($Page->RFSH7) == "") { ?>
        <th class="<?= $Page->RFSH7->headerCellClass() ?>"><?= $Page->RFSH7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
    <?php if ($Page->SortUrl($Page->RFSH8) == "") { ?>
        <th class="<?= $Page->RFSH8->headerCellClass() ?>"><?= $Page->RFSH8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
    <?php if ($Page->SortUrl($Page->RFSH9) == "") { ?>
        <th class="<?= $Page->RFSH9->headerCellClass() ?>"><?= $Page->RFSH9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
    <?php if ($Page->SortUrl($Page->RFSH10) == "") { ?>
        <th class="<?= $Page->RFSH10->headerCellClass() ?>"><?= $Page->RFSH10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
    <?php if ($Page->SortUrl($Page->RFSH11) == "") { ?>
        <th class="<?= $Page->RFSH11->headerCellClass() ?>"><?= $Page->RFSH11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
    <?php if ($Page->SortUrl($Page->RFSH12) == "") { ?>
        <th class="<?= $Page->RFSH12->headerCellClass() ?>"><?= $Page->RFSH12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
    <?php if ($Page->SortUrl($Page->RFSH13) == "") { ?>
        <th class="<?= $Page->RFSH13->headerCellClass() ?>"><?= $Page->RFSH13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
    <?php if ($Page->SortUrl($Page->HMG1) == "") { ?>
        <th class="<?= $Page->HMG1->headerCellClass() ?>"><?= $Page->HMG1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
    <?php if ($Page->SortUrl($Page->HMG2) == "") { ?>
        <th class="<?= $Page->HMG2->headerCellClass() ?>"><?= $Page->HMG2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
    <?php if ($Page->SortUrl($Page->HMG3) == "") { ?>
        <th class="<?= $Page->HMG3->headerCellClass() ?>"><?= $Page->HMG3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
    <?php if ($Page->SortUrl($Page->HMG4) == "") { ?>
        <th class="<?= $Page->HMG4->headerCellClass() ?>"><?= $Page->HMG4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
    <?php if ($Page->SortUrl($Page->HMG5) == "") { ?>
        <th class="<?= $Page->HMG5->headerCellClass() ?>"><?= $Page->HMG5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
    <?php if ($Page->SortUrl($Page->HMG6) == "") { ?>
        <th class="<?= $Page->HMG6->headerCellClass() ?>"><?= $Page->HMG6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
    <?php if ($Page->SortUrl($Page->HMG7) == "") { ?>
        <th class="<?= $Page->HMG7->headerCellClass() ?>"><?= $Page->HMG7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
    <?php if ($Page->SortUrl($Page->HMG8) == "") { ?>
        <th class="<?= $Page->HMG8->headerCellClass() ?>"><?= $Page->HMG8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
    <?php if ($Page->SortUrl($Page->HMG9) == "") { ?>
        <th class="<?= $Page->HMG9->headerCellClass() ?>"><?= $Page->HMG9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
    <?php if ($Page->SortUrl($Page->HMG10) == "") { ?>
        <th class="<?= $Page->HMG10->headerCellClass() ?>"><?= $Page->HMG10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
    <?php if ($Page->SortUrl($Page->HMG11) == "") { ?>
        <th class="<?= $Page->HMG11->headerCellClass() ?>"><?= $Page->HMG11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
    <?php if ($Page->SortUrl($Page->HMG12) == "") { ?>
        <th class="<?= $Page->HMG12->headerCellClass() ?>"><?= $Page->HMG12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
    <?php if ($Page->SortUrl($Page->HMG13) == "") { ?>
        <th class="<?= $Page->HMG13->headerCellClass() ?>"><?= $Page->HMG13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
    <?php if ($Page->SortUrl($Page->GnRH1) == "") { ?>
        <th class="<?= $Page->GnRH1->headerCellClass() ?>"><?= $Page->GnRH1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
    <?php if ($Page->SortUrl($Page->GnRH2) == "") { ?>
        <th class="<?= $Page->GnRH2->headerCellClass() ?>"><?= $Page->GnRH2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
    <?php if ($Page->SortUrl($Page->GnRH3) == "") { ?>
        <th class="<?= $Page->GnRH3->headerCellClass() ?>"><?= $Page->GnRH3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
    <?php if ($Page->SortUrl($Page->GnRH4) == "") { ?>
        <th class="<?= $Page->GnRH4->headerCellClass() ?>"><?= $Page->GnRH4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
    <?php if ($Page->SortUrl($Page->GnRH5) == "") { ?>
        <th class="<?= $Page->GnRH5->headerCellClass() ?>"><?= $Page->GnRH5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
    <?php if ($Page->SortUrl($Page->GnRH6) == "") { ?>
        <th class="<?= $Page->GnRH6->headerCellClass() ?>"><?= $Page->GnRH6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
    <?php if ($Page->SortUrl($Page->GnRH7) == "") { ?>
        <th class="<?= $Page->GnRH7->headerCellClass() ?>"><?= $Page->GnRH7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
    <?php if ($Page->SortUrl($Page->GnRH8) == "") { ?>
        <th class="<?= $Page->GnRH8->headerCellClass() ?>"><?= $Page->GnRH8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
    <?php if ($Page->SortUrl($Page->GnRH9) == "") { ?>
        <th class="<?= $Page->GnRH9->headerCellClass() ?>"><?= $Page->GnRH9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
    <?php if ($Page->SortUrl($Page->GnRH10) == "") { ?>
        <th class="<?= $Page->GnRH10->headerCellClass() ?>"><?= $Page->GnRH10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
    <?php if ($Page->SortUrl($Page->GnRH11) == "") { ?>
        <th class="<?= $Page->GnRH11->headerCellClass() ?>"><?= $Page->GnRH11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
    <?php if ($Page->SortUrl($Page->GnRH12) == "") { ?>
        <th class="<?= $Page->GnRH12->headerCellClass() ?>"><?= $Page->GnRH12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
    <?php if ($Page->SortUrl($Page->GnRH13) == "") { ?>
        <th class="<?= $Page->GnRH13->headerCellClass() ?>"><?= $Page->GnRH13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
    <?php if ($Page->SortUrl($Page->E21) == "") { ?>
        <th class="<?= $Page->E21->headerCellClass() ?>"><?= $Page->E21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
    <?php if ($Page->SortUrl($Page->E22) == "") { ?>
        <th class="<?= $Page->E22->headerCellClass() ?>"><?= $Page->E22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
    <?php if ($Page->SortUrl($Page->E23) == "") { ?>
        <th class="<?= $Page->E23->headerCellClass() ?>"><?= $Page->E23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
    <?php if ($Page->SortUrl($Page->E24) == "") { ?>
        <th class="<?= $Page->E24->headerCellClass() ?>"><?= $Page->E24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
    <?php if ($Page->SortUrl($Page->E25) == "") { ?>
        <th class="<?= $Page->E25->headerCellClass() ?>"><?= $Page->E25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
    <?php if ($Page->SortUrl($Page->E26) == "") { ?>
        <th class="<?= $Page->E26->headerCellClass() ?>"><?= $Page->E26->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E26->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E26->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E26->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E26->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E26->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
    <?php if ($Page->SortUrl($Page->E27) == "") { ?>
        <th class="<?= $Page->E27->headerCellClass() ?>"><?= $Page->E27->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E27->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E27->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E27->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E27->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E27->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
    <?php if ($Page->SortUrl($Page->E28) == "") { ?>
        <th class="<?= $Page->E28->headerCellClass() ?>"><?= $Page->E28->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E28->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E28->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E28->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E28->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E28->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
    <?php if ($Page->SortUrl($Page->E29) == "") { ?>
        <th class="<?= $Page->E29->headerCellClass() ?>"><?= $Page->E29->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E29->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E29->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E29->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E29->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E29->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
    <?php if ($Page->SortUrl($Page->E210) == "") { ?>
        <th class="<?= $Page->E210->headerCellClass() ?>"><?= $Page->E210->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E210->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E210->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E210->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E210->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E210->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
    <?php if ($Page->SortUrl($Page->E211) == "") { ?>
        <th class="<?= $Page->E211->headerCellClass() ?>"><?= $Page->E211->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E211->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E211->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E211->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E211->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E211->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
    <?php if ($Page->SortUrl($Page->E212) == "") { ?>
        <th class="<?= $Page->E212->headerCellClass() ?>"><?= $Page->E212->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E212->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E212->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E212->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E212->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E212->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
    <?php if ($Page->SortUrl($Page->E213) == "") { ?>
        <th class="<?= $Page->E213->headerCellClass() ?>"><?= $Page->E213->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E213->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E213->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E213->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E213->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E213->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
    <?php if ($Page->SortUrl($Page->P41) == "") { ?>
        <th class="<?= $Page->P41->headerCellClass() ?>"><?= $Page->P41->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P41->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P41->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P41->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P41->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P41->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
    <?php if ($Page->SortUrl($Page->P42) == "") { ?>
        <th class="<?= $Page->P42->headerCellClass() ?>"><?= $Page->P42->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P42->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P42->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P42->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P42->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P42->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
    <?php if ($Page->SortUrl($Page->P43) == "") { ?>
        <th class="<?= $Page->P43->headerCellClass() ?>"><?= $Page->P43->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P43->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P43->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P43->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P43->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P43->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
    <?php if ($Page->SortUrl($Page->P44) == "") { ?>
        <th class="<?= $Page->P44->headerCellClass() ?>"><?= $Page->P44->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P44->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P44->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P44->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P44->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P44->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
    <?php if ($Page->SortUrl($Page->P45) == "") { ?>
        <th class="<?= $Page->P45->headerCellClass() ?>"><?= $Page->P45->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P45->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P45->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P45->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P45->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P45->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
    <?php if ($Page->SortUrl($Page->P46) == "") { ?>
        <th class="<?= $Page->P46->headerCellClass() ?>"><?= $Page->P46->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P46->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P46->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P46->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P46->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P46->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
    <?php if ($Page->SortUrl($Page->P47) == "") { ?>
        <th class="<?= $Page->P47->headerCellClass() ?>"><?= $Page->P47->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P47->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P47->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P47->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P47->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P47->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
    <?php if ($Page->SortUrl($Page->P48) == "") { ?>
        <th class="<?= $Page->P48->headerCellClass() ?>"><?= $Page->P48->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P48->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P48->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P48->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P48->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P48->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
    <?php if ($Page->SortUrl($Page->P49) == "") { ?>
        <th class="<?= $Page->P49->headerCellClass() ?>"><?= $Page->P49->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P49->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P49->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P49->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P49->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P49->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
    <?php if ($Page->SortUrl($Page->P410) == "") { ?>
        <th class="<?= $Page->P410->headerCellClass() ?>"><?= $Page->P410->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P410->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P410->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P410->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P410->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P410->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
    <?php if ($Page->SortUrl($Page->P411) == "") { ?>
        <th class="<?= $Page->P411->headerCellClass() ?>"><?= $Page->P411->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P411->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P411->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P411->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P411->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P411->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
    <?php if ($Page->SortUrl($Page->P412) == "") { ?>
        <th class="<?= $Page->P412->headerCellClass() ?>"><?= $Page->P412->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P412->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P412->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P412->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P412->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P412->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
    <?php if ($Page->SortUrl($Page->P413) == "") { ?>
        <th class="<?= $Page->P413->headerCellClass() ?>"><?= $Page->P413->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P413->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P413->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P413->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P413->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P413->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
    <?php if ($Page->SortUrl($Page->USGRt1) == "") { ?>
        <th class="<?= $Page->USGRt1->headerCellClass() ?>"><?= $Page->USGRt1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
    <?php if ($Page->SortUrl($Page->USGRt2) == "") { ?>
        <th class="<?= $Page->USGRt2->headerCellClass() ?>"><?= $Page->USGRt2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
    <?php if ($Page->SortUrl($Page->USGRt3) == "") { ?>
        <th class="<?= $Page->USGRt3->headerCellClass() ?>"><?= $Page->USGRt3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
    <?php if ($Page->SortUrl($Page->USGRt4) == "") { ?>
        <th class="<?= $Page->USGRt4->headerCellClass() ?>"><?= $Page->USGRt4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
    <?php if ($Page->SortUrl($Page->USGRt5) == "") { ?>
        <th class="<?= $Page->USGRt5->headerCellClass() ?>"><?= $Page->USGRt5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
    <?php if ($Page->SortUrl($Page->USGRt6) == "") { ?>
        <th class="<?= $Page->USGRt6->headerCellClass() ?>"><?= $Page->USGRt6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
    <?php if ($Page->SortUrl($Page->USGRt7) == "") { ?>
        <th class="<?= $Page->USGRt7->headerCellClass() ?>"><?= $Page->USGRt7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
    <?php if ($Page->SortUrl($Page->USGRt8) == "") { ?>
        <th class="<?= $Page->USGRt8->headerCellClass() ?>"><?= $Page->USGRt8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
    <?php if ($Page->SortUrl($Page->USGRt9) == "") { ?>
        <th class="<?= $Page->USGRt9->headerCellClass() ?>"><?= $Page->USGRt9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
    <?php if ($Page->SortUrl($Page->USGRt10) == "") { ?>
        <th class="<?= $Page->USGRt10->headerCellClass() ?>"><?= $Page->USGRt10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
    <?php if ($Page->SortUrl($Page->USGRt11) == "") { ?>
        <th class="<?= $Page->USGRt11->headerCellClass() ?>"><?= $Page->USGRt11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
    <?php if ($Page->SortUrl($Page->USGRt12) == "") { ?>
        <th class="<?= $Page->USGRt12->headerCellClass() ?>"><?= $Page->USGRt12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
    <?php if ($Page->SortUrl($Page->USGRt13) == "") { ?>
        <th class="<?= $Page->USGRt13->headerCellClass() ?>"><?= $Page->USGRt13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
    <?php if ($Page->SortUrl($Page->USGLt1) == "") { ?>
        <th class="<?= $Page->USGLt1->headerCellClass() ?>"><?= $Page->USGLt1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
    <?php if ($Page->SortUrl($Page->USGLt2) == "") { ?>
        <th class="<?= $Page->USGLt2->headerCellClass() ?>"><?= $Page->USGLt2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
    <?php if ($Page->SortUrl($Page->USGLt3) == "") { ?>
        <th class="<?= $Page->USGLt3->headerCellClass() ?>"><?= $Page->USGLt3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
    <?php if ($Page->SortUrl($Page->USGLt4) == "") { ?>
        <th class="<?= $Page->USGLt4->headerCellClass() ?>"><?= $Page->USGLt4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
    <?php if ($Page->SortUrl($Page->USGLt5) == "") { ?>
        <th class="<?= $Page->USGLt5->headerCellClass() ?>"><?= $Page->USGLt5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
    <?php if ($Page->SortUrl($Page->USGLt6) == "") { ?>
        <th class="<?= $Page->USGLt6->headerCellClass() ?>"><?= $Page->USGLt6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
    <?php if ($Page->SortUrl($Page->USGLt7) == "") { ?>
        <th class="<?= $Page->USGLt7->headerCellClass() ?>"><?= $Page->USGLt7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
    <?php if ($Page->SortUrl($Page->USGLt8) == "") { ?>
        <th class="<?= $Page->USGLt8->headerCellClass() ?>"><?= $Page->USGLt8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
    <?php if ($Page->SortUrl($Page->USGLt9) == "") { ?>
        <th class="<?= $Page->USGLt9->headerCellClass() ?>"><?= $Page->USGLt9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
    <?php if ($Page->SortUrl($Page->USGLt10) == "") { ?>
        <th class="<?= $Page->USGLt10->headerCellClass() ?>"><?= $Page->USGLt10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
    <?php if ($Page->SortUrl($Page->USGLt11) == "") { ?>
        <th class="<?= $Page->USGLt11->headerCellClass() ?>"><?= $Page->USGLt11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
    <?php if ($Page->SortUrl($Page->USGLt12) == "") { ?>
        <th class="<?= $Page->USGLt12->headerCellClass() ?>"><?= $Page->USGLt12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
    <?php if ($Page->SortUrl($Page->USGLt13) == "") { ?>
        <th class="<?= $Page->USGLt13->headerCellClass() ?>"><?= $Page->USGLt13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
    <?php if ($Page->SortUrl($Page->EM1) == "") { ?>
        <th class="<?= $Page->EM1->headerCellClass() ?>"><?= $Page->EM1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
    <?php if ($Page->SortUrl($Page->EM2) == "") { ?>
        <th class="<?= $Page->EM2->headerCellClass() ?>"><?= $Page->EM2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
    <?php if ($Page->SortUrl($Page->EM3) == "") { ?>
        <th class="<?= $Page->EM3->headerCellClass() ?>"><?= $Page->EM3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
    <?php if ($Page->SortUrl($Page->EM4) == "") { ?>
        <th class="<?= $Page->EM4->headerCellClass() ?>"><?= $Page->EM4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
    <?php if ($Page->SortUrl($Page->EM5) == "") { ?>
        <th class="<?= $Page->EM5->headerCellClass() ?>"><?= $Page->EM5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
    <?php if ($Page->SortUrl($Page->EM6) == "") { ?>
        <th class="<?= $Page->EM6->headerCellClass() ?>"><?= $Page->EM6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
    <?php if ($Page->SortUrl($Page->EM7) == "") { ?>
        <th class="<?= $Page->EM7->headerCellClass() ?>"><?= $Page->EM7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
    <?php if ($Page->SortUrl($Page->EM8) == "") { ?>
        <th class="<?= $Page->EM8->headerCellClass() ?>"><?= $Page->EM8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
    <?php if ($Page->SortUrl($Page->EM9) == "") { ?>
        <th class="<?= $Page->EM9->headerCellClass() ?>"><?= $Page->EM9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
    <?php if ($Page->SortUrl($Page->EM10) == "") { ?>
        <th class="<?= $Page->EM10->headerCellClass() ?>"><?= $Page->EM10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
    <?php if ($Page->SortUrl($Page->EM11) == "") { ?>
        <th class="<?= $Page->EM11->headerCellClass() ?>"><?= $Page->EM11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
    <?php if ($Page->SortUrl($Page->EM12) == "") { ?>
        <th class="<?= $Page->EM12->headerCellClass() ?>"><?= $Page->EM12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
    <?php if ($Page->SortUrl($Page->EM13) == "") { ?>
        <th class="<?= $Page->EM13->headerCellClass() ?>"><?= $Page->EM13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <?php if ($Page->SortUrl($Page->Others1) == "") { ?>
        <th class="<?= $Page->Others1->headerCellClass() ?>"><?= $Page->Others1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <?php if ($Page->SortUrl($Page->Others2) == "") { ?>
        <th class="<?= $Page->Others2->headerCellClass() ?>"><?= $Page->Others2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
    <?php if ($Page->SortUrl($Page->Others3) == "") { ?>
        <th class="<?= $Page->Others3->headerCellClass() ?>"><?= $Page->Others3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
    <?php if ($Page->SortUrl($Page->Others4) == "") { ?>
        <th class="<?= $Page->Others4->headerCellClass() ?>"><?= $Page->Others4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
    <?php if ($Page->SortUrl($Page->Others5) == "") { ?>
        <th class="<?= $Page->Others5->headerCellClass() ?>"><?= $Page->Others5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
    <?php if ($Page->SortUrl($Page->Others6) == "") { ?>
        <th class="<?= $Page->Others6->headerCellClass() ?>"><?= $Page->Others6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
    <?php if ($Page->SortUrl($Page->Others7) == "") { ?>
        <th class="<?= $Page->Others7->headerCellClass() ?>"><?= $Page->Others7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
    <?php if ($Page->SortUrl($Page->Others8) == "") { ?>
        <th class="<?= $Page->Others8->headerCellClass() ?>"><?= $Page->Others8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
    <?php if ($Page->SortUrl($Page->Others9) == "") { ?>
        <th class="<?= $Page->Others9->headerCellClass() ?>"><?= $Page->Others9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
    <?php if ($Page->SortUrl($Page->Others10) == "") { ?>
        <th class="<?= $Page->Others10->headerCellClass() ?>"><?= $Page->Others10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
    <?php if ($Page->SortUrl($Page->Others11) == "") { ?>
        <th class="<?= $Page->Others11->headerCellClass() ?>"><?= $Page->Others11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
    <?php if ($Page->SortUrl($Page->Others12) == "") { ?>
        <th class="<?= $Page->Others12->headerCellClass() ?>"><?= $Page->Others12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
    <?php if ($Page->SortUrl($Page->Others13) == "") { ?>
        <th class="<?= $Page->Others13->headerCellClass() ?>"><?= $Page->Others13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
    <?php if ($Page->SortUrl($Page->DR1) == "") { ?>
        <th class="<?= $Page->DR1->headerCellClass() ?>"><?= $Page->DR1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
    <?php if ($Page->SortUrl($Page->DR2) == "") { ?>
        <th class="<?= $Page->DR2->headerCellClass() ?>"><?= $Page->DR2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
    <?php if ($Page->SortUrl($Page->DR3) == "") { ?>
        <th class="<?= $Page->DR3->headerCellClass() ?>"><?= $Page->DR3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
    <?php if ($Page->SortUrl($Page->DR4) == "") { ?>
        <th class="<?= $Page->DR4->headerCellClass() ?>"><?= $Page->DR4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
    <?php if ($Page->SortUrl($Page->DR5) == "") { ?>
        <th class="<?= $Page->DR5->headerCellClass() ?>"><?= $Page->DR5->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR5->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR5->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR5->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR5->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR5->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
    <?php if ($Page->SortUrl($Page->DR6) == "") { ?>
        <th class="<?= $Page->DR6->headerCellClass() ?>"><?= $Page->DR6->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR6->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR6->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR6->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR6->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR6->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
    <?php if ($Page->SortUrl($Page->DR7) == "") { ?>
        <th class="<?= $Page->DR7->headerCellClass() ?>"><?= $Page->DR7->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR7->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR7->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR7->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR7->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR7->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
    <?php if ($Page->SortUrl($Page->DR8) == "") { ?>
        <th class="<?= $Page->DR8->headerCellClass() ?>"><?= $Page->DR8->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR8->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR8->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR8->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR8->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR8->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
    <?php if ($Page->SortUrl($Page->DR9) == "") { ?>
        <th class="<?= $Page->DR9->headerCellClass() ?>"><?= $Page->DR9->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR9->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR9->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR9->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR9->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR9->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
    <?php if ($Page->SortUrl($Page->DR10) == "") { ?>
        <th class="<?= $Page->DR10->headerCellClass() ?>"><?= $Page->DR10->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR10->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR10->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR10->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR10->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR10->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
    <?php if ($Page->SortUrl($Page->DR11) == "") { ?>
        <th class="<?= $Page->DR11->headerCellClass() ?>"><?= $Page->DR11->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR11->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR11->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR11->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR11->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR11->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
    <?php if ($Page->SortUrl($Page->DR12) == "") { ?>
        <th class="<?= $Page->DR12->headerCellClass() ?>"><?= $Page->DR12->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR12->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR12->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR12->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR12->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR12->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
    <?php if ($Page->SortUrl($Page->DR13) == "") { ?>
        <th class="<?= $Page->DR13->headerCellClass() ?>"><?= $Page->DR13->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR13->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR13->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR13->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR13->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR13->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Convert->Visible) { // Convert ?>
    <?php if ($Page->SortUrl($Page->Convert) == "") { ?>
        <th class="<?= $Page->Convert->headerCellClass() ?>"><?= $Page->Convert->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Convert->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Convert->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Convert->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Convert->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Convert->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
    <?php if ($Page->SortUrl($Page->Consultant) == "") { ?>
        <th class="<?= $Page->Consultant->headerCellClass() ?>"><?= $Page->Consultant->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Consultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Consultant->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Consultant->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Consultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Consultant->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
    <?php if ($Page->SortUrl($Page->InseminatinTechnique) == "") { ?>
        <th class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><?= $Page->InseminatinTechnique->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->InseminatinTechnique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->InseminatinTechnique->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->InseminatinTechnique->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->InseminatinTechnique->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->InseminatinTechnique->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
    <?php if ($Page->SortUrl($Page->IndicationForART) == "") { ?>
        <th class="<?= $Page->IndicationForART->headerCellClass() ?>"><?= $Page->IndicationForART->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IndicationForART->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IndicationForART->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IndicationForART->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IndicationForART->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IndicationForART->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
    <?php if ($Page->SortUrl($Page->Hysteroscopy) == "") { ?>
        <th class="<?= $Page->Hysteroscopy->headerCellClass() ?>"><?= $Page->Hysteroscopy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Hysteroscopy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Hysteroscopy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Hysteroscopy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Hysteroscopy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Hysteroscopy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
    <?php if ($Page->SortUrl($Page->EndometrialScratching) == "") { ?>
        <th class="<?= $Page->EndometrialScratching->headerCellClass() ?>"><?= $Page->EndometrialScratching->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EndometrialScratching->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EndometrialScratching->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EndometrialScratching->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EndometrialScratching->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EndometrialScratching->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
    <?php if ($Page->SortUrl($Page->TrialCannulation) == "") { ?>
        <th class="<?= $Page->TrialCannulation->headerCellClass() ?>"><?= $Page->TrialCannulation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TrialCannulation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TrialCannulation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TrialCannulation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TrialCannulation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TrialCannulation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
    <?php if ($Page->SortUrl($Page->CYCLETYPE) == "") { ?>
        <th class="<?= $Page->CYCLETYPE->headerCellClass() ?>"><?= $Page->CYCLETYPE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CYCLETYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CYCLETYPE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CYCLETYPE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CYCLETYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CYCLETYPE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
    <?php if ($Page->SortUrl($Page->HRTCYCLE) == "") { ?>
        <th class="<?= $Page->HRTCYCLE->headerCellClass() ?>"><?= $Page->HRTCYCLE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HRTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HRTCYCLE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HRTCYCLE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HRTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HRTCYCLE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
    <?php if ($Page->SortUrl($Page->OralEstrogenDosage) == "") { ?>
        <th class="<?= $Page->OralEstrogenDosage->headerCellClass() ?>"><?= $Page->OralEstrogenDosage->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OralEstrogenDosage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OralEstrogenDosage->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OralEstrogenDosage->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OralEstrogenDosage->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OralEstrogenDosage->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
    <?php if ($Page->SortUrl($Page->VaginalEstrogen) == "") { ?>
        <th class="<?= $Page->VaginalEstrogen->headerCellClass() ?>"><?= $Page->VaginalEstrogen->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->VaginalEstrogen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->VaginalEstrogen->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->VaginalEstrogen->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->VaginalEstrogen->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->VaginalEstrogen->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
    <?php if ($Page->SortUrl($Page->GCSF) == "") { ?>
        <th class="<?= $Page->GCSF->headerCellClass() ?>"><?= $Page->GCSF->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GCSF->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GCSF->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GCSF->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GCSF->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GCSF->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
    <?php if ($Page->SortUrl($Page->ActivatedPRP) == "") { ?>
        <th class="<?= $Page->ActivatedPRP->headerCellClass() ?>"><?= $Page->ActivatedPRP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ActivatedPRP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ActivatedPRP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ActivatedPRP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ActivatedPRP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ActivatedPRP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
    <?php if ($Page->SortUrl($Page->UCLcm) == "") { ?>
        <th class="<?= $Page->UCLcm->headerCellClass() ?>"><?= $Page->UCLcm->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->UCLcm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->UCLcm->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->UCLcm->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->UCLcm->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->UCLcm->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
    <?php if ($Page->SortUrl($Page->DATOFEMBRYOTRANSFER) == "") { ?>
        <th class="<?= $Page->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><?= $Page->DATOFEMBRYOTRANSFER->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DATOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DATOFEMBRYOTRANSFER->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DATOFEMBRYOTRANSFER->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DATOFEMBRYOTRANSFER->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DATOFEMBRYOTRANSFER->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
    <?php if ($Page->SortUrl($Page->DAYOFEMBRYOTRANSFER) == "") { ?>
        <th class="<?= $Page->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DAYOFEMBRYOTRANSFER->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DAYOFEMBRYOTRANSFER->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DAYOFEMBRYOTRANSFER->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DAYOFEMBRYOTRANSFER->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DAYOFEMBRYOTRANSFER->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
    <?php if ($Page->SortUrl($Page->NOOFEMBRYOSTHAWED) == "") { ?>
        <th class="<?= $Page->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NOOFEMBRYOSTHAWED->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NOOFEMBRYOSTHAWED->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NOOFEMBRYOSTHAWED->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NOOFEMBRYOSTHAWED->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NOOFEMBRYOSTHAWED->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
    <?php if ($Page->SortUrl($Page->NOOFEMBRYOSTRANSFERRED) == "") { ?>
        <th class="<?= $Page->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NOOFEMBRYOSTRANSFERRED->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NOOFEMBRYOSTRANSFERRED->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NOOFEMBRYOSTRANSFERRED->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NOOFEMBRYOSTRANSFERRED->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NOOFEMBRYOSTRANSFERRED->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
    <?php if ($Page->SortUrl($Page->DAYOFEMBRYOS) == "") { ?>
        <th class="<?= $Page->DAYOFEMBRYOS->headerCellClass() ?>"><?= $Page->DAYOFEMBRYOS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DAYOFEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DAYOFEMBRYOS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DAYOFEMBRYOS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DAYOFEMBRYOS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DAYOFEMBRYOS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
    <?php if ($Page->SortUrl($Page->CRYOPRESERVEDEMBRYOS) == "") { ?>
        <th class="<?= $Page->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CRYOPRESERVEDEMBRYOS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CRYOPRESERVEDEMBRYOS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CRYOPRESERVEDEMBRYOS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CRYOPRESERVEDEMBRYOS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CRYOPRESERVEDEMBRYOS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
    <?php if ($Page->SortUrl($Page->ViaAdmin) == "") { ?>
        <th class="<?= $Page->ViaAdmin->headerCellClass() ?>"><?= $Page->ViaAdmin->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ViaAdmin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ViaAdmin->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ViaAdmin->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ViaAdmin->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ViaAdmin->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
    <?php if ($Page->SortUrl($Page->ViaStartDateTime) == "") { ?>
        <th class="<?= $Page->ViaStartDateTime->headerCellClass() ?>"><?= $Page->ViaStartDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ViaStartDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ViaStartDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ViaStartDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ViaStartDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ViaStartDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
    <?php if ($Page->SortUrl($Page->ViaDose) == "") { ?>
        <th class="<?= $Page->ViaDose->headerCellClass() ?>"><?= $Page->ViaDose->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ViaDose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ViaDose->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ViaDose->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ViaDose->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ViaDose->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
    <?php if ($Page->SortUrl($Page->AllFreeze) == "") { ?>
        <th class="<?= $Page->AllFreeze->headerCellClass() ?>"><?= $Page->AllFreeze->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AllFreeze->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AllFreeze->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AllFreeze->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AllFreeze->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AllFreeze->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
    <?php if ($Page->SortUrl($Page->TreatmentCancel) == "") { ?>
        <th class="<?= $Page->TreatmentCancel->headerCellClass() ?>"><?= $Page->TreatmentCancel->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TreatmentCancel->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TreatmentCancel->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TreatmentCancel->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TreatmentCancel->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TreatmentCancel->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
    <?php if ($Page->SortUrl($Page->ProgesteroneAdmin) == "") { ?>
        <th class="<?= $Page->ProgesteroneAdmin->headerCellClass() ?>"><?= $Page->ProgesteroneAdmin->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProgesteroneAdmin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProgesteroneAdmin->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProgesteroneAdmin->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProgesteroneAdmin->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProgesteroneAdmin->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
    <?php if ($Page->SortUrl($Page->ProgesteroneStart) == "") { ?>
        <th class="<?= $Page->ProgesteroneStart->headerCellClass() ?>"><?= $Page->ProgesteroneStart->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProgesteroneStart->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProgesteroneStart->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProgesteroneStart->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProgesteroneStart->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProgesteroneStart->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
    <?php if ($Page->SortUrl($Page->ProgesteroneDose) == "") { ?>
        <th class="<?= $Page->ProgesteroneDose->headerCellClass() ?>"><?= $Page->ProgesteroneDose->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ProgesteroneDose->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ProgesteroneDose->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ProgesteroneDose->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ProgesteroneDose->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ProgesteroneDose->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
    <?php if ($Page->SortUrl($Page->StChDate14) == "") { ?>
        <th class="<?= $Page->StChDate14->headerCellClass() ?>"><?= $Page->StChDate14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
    <?php if ($Page->SortUrl($Page->StChDate15) == "") { ?>
        <th class="<?= $Page->StChDate15->headerCellClass() ?>"><?= $Page->StChDate15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
    <?php if ($Page->SortUrl($Page->StChDate16) == "") { ?>
        <th class="<?= $Page->StChDate16->headerCellClass() ?>"><?= $Page->StChDate16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
    <?php if ($Page->SortUrl($Page->StChDate17) == "") { ?>
        <th class="<?= $Page->StChDate17->headerCellClass() ?>"><?= $Page->StChDate17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
    <?php if ($Page->SortUrl($Page->StChDate18) == "") { ?>
        <th class="<?= $Page->StChDate18->headerCellClass() ?>"><?= $Page->StChDate18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
    <?php if ($Page->SortUrl($Page->StChDate19) == "") { ?>
        <th class="<?= $Page->StChDate19->headerCellClass() ?>"><?= $Page->StChDate19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
    <?php if ($Page->SortUrl($Page->StChDate20) == "") { ?>
        <th class="<?= $Page->StChDate20->headerCellClass() ?>"><?= $Page->StChDate20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
    <?php if ($Page->SortUrl($Page->StChDate21) == "") { ?>
        <th class="<?= $Page->StChDate21->headerCellClass() ?>"><?= $Page->StChDate21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
    <?php if ($Page->SortUrl($Page->StChDate22) == "") { ?>
        <th class="<?= $Page->StChDate22->headerCellClass() ?>"><?= $Page->StChDate22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
    <?php if ($Page->SortUrl($Page->StChDate23) == "") { ?>
        <th class="<?= $Page->StChDate23->headerCellClass() ?>"><?= $Page->StChDate23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
    <?php if ($Page->SortUrl($Page->StChDate24) == "") { ?>
        <th class="<?= $Page->StChDate24->headerCellClass() ?>"><?= $Page->StChDate24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
    <?php if ($Page->SortUrl($Page->StChDate25) == "") { ?>
        <th class="<?= $Page->StChDate25->headerCellClass() ?>"><?= $Page->StChDate25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StChDate25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StChDate25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StChDate25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StChDate25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StChDate25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
    <?php if ($Page->SortUrl($Page->CycleDay14) == "") { ?>
        <th class="<?= $Page->CycleDay14->headerCellClass() ?>"><?= $Page->CycleDay14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
    <?php if ($Page->SortUrl($Page->CycleDay15) == "") { ?>
        <th class="<?= $Page->CycleDay15->headerCellClass() ?>"><?= $Page->CycleDay15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
    <?php if ($Page->SortUrl($Page->CycleDay16) == "") { ?>
        <th class="<?= $Page->CycleDay16->headerCellClass() ?>"><?= $Page->CycleDay16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
    <?php if ($Page->SortUrl($Page->CycleDay17) == "") { ?>
        <th class="<?= $Page->CycleDay17->headerCellClass() ?>"><?= $Page->CycleDay17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
    <?php if ($Page->SortUrl($Page->CycleDay18) == "") { ?>
        <th class="<?= $Page->CycleDay18->headerCellClass() ?>"><?= $Page->CycleDay18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
    <?php if ($Page->SortUrl($Page->CycleDay19) == "") { ?>
        <th class="<?= $Page->CycleDay19->headerCellClass() ?>"><?= $Page->CycleDay19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
    <?php if ($Page->SortUrl($Page->CycleDay20) == "") { ?>
        <th class="<?= $Page->CycleDay20->headerCellClass() ?>"><?= $Page->CycleDay20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
    <?php if ($Page->SortUrl($Page->CycleDay21) == "") { ?>
        <th class="<?= $Page->CycleDay21->headerCellClass() ?>"><?= $Page->CycleDay21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
    <?php if ($Page->SortUrl($Page->CycleDay22) == "") { ?>
        <th class="<?= $Page->CycleDay22->headerCellClass() ?>"><?= $Page->CycleDay22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
    <?php if ($Page->SortUrl($Page->CycleDay23) == "") { ?>
        <th class="<?= $Page->CycleDay23->headerCellClass() ?>"><?= $Page->CycleDay23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
    <?php if ($Page->SortUrl($Page->CycleDay24) == "") { ?>
        <th class="<?= $Page->CycleDay24->headerCellClass() ?>"><?= $Page->CycleDay24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
    <?php if ($Page->SortUrl($Page->CycleDay25) == "") { ?>
        <th class="<?= $Page->CycleDay25->headerCellClass() ?>"><?= $Page->CycleDay25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CycleDay25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CycleDay25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CycleDay25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CycleDay25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CycleDay25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay14) == "") { ?>
        <th class="<?= $Page->StimulationDay14->headerCellClass() ?>"><?= $Page->StimulationDay14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay15) == "") { ?>
        <th class="<?= $Page->StimulationDay15->headerCellClass() ?>"><?= $Page->StimulationDay15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay16) == "") { ?>
        <th class="<?= $Page->StimulationDay16->headerCellClass() ?>"><?= $Page->StimulationDay16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay17) == "") { ?>
        <th class="<?= $Page->StimulationDay17->headerCellClass() ?>"><?= $Page->StimulationDay17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay18) == "") { ?>
        <th class="<?= $Page->StimulationDay18->headerCellClass() ?>"><?= $Page->StimulationDay18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay19) == "") { ?>
        <th class="<?= $Page->StimulationDay19->headerCellClass() ?>"><?= $Page->StimulationDay19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay20) == "") { ?>
        <th class="<?= $Page->StimulationDay20->headerCellClass() ?>"><?= $Page->StimulationDay20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay21) == "") { ?>
        <th class="<?= $Page->StimulationDay21->headerCellClass() ?>"><?= $Page->StimulationDay21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay22) == "") { ?>
        <th class="<?= $Page->StimulationDay22->headerCellClass() ?>"><?= $Page->StimulationDay22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay23) == "") { ?>
        <th class="<?= $Page->StimulationDay23->headerCellClass() ?>"><?= $Page->StimulationDay23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay24) == "") { ?>
        <th class="<?= $Page->StimulationDay24->headerCellClass() ?>"><?= $Page->StimulationDay24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
    <?php if ($Page->SortUrl($Page->StimulationDay25) == "") { ?>
        <th class="<?= $Page->StimulationDay25->headerCellClass() ?>"><?= $Page->StimulationDay25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->StimulationDay25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->StimulationDay25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->StimulationDay25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->StimulationDay25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->StimulationDay25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
    <?php if ($Page->SortUrl($Page->Tablet14) == "") { ?>
        <th class="<?= $Page->Tablet14->headerCellClass() ?>"><?= $Page->Tablet14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
    <?php if ($Page->SortUrl($Page->Tablet15) == "") { ?>
        <th class="<?= $Page->Tablet15->headerCellClass() ?>"><?= $Page->Tablet15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
    <?php if ($Page->SortUrl($Page->Tablet16) == "") { ?>
        <th class="<?= $Page->Tablet16->headerCellClass() ?>"><?= $Page->Tablet16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
    <?php if ($Page->SortUrl($Page->Tablet17) == "") { ?>
        <th class="<?= $Page->Tablet17->headerCellClass() ?>"><?= $Page->Tablet17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
    <?php if ($Page->SortUrl($Page->Tablet18) == "") { ?>
        <th class="<?= $Page->Tablet18->headerCellClass() ?>"><?= $Page->Tablet18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
    <?php if ($Page->SortUrl($Page->Tablet19) == "") { ?>
        <th class="<?= $Page->Tablet19->headerCellClass() ?>"><?= $Page->Tablet19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
    <?php if ($Page->SortUrl($Page->Tablet20) == "") { ?>
        <th class="<?= $Page->Tablet20->headerCellClass() ?>"><?= $Page->Tablet20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
    <?php if ($Page->SortUrl($Page->Tablet21) == "") { ?>
        <th class="<?= $Page->Tablet21->headerCellClass() ?>"><?= $Page->Tablet21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
    <?php if ($Page->SortUrl($Page->Tablet22) == "") { ?>
        <th class="<?= $Page->Tablet22->headerCellClass() ?>"><?= $Page->Tablet22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
    <?php if ($Page->SortUrl($Page->Tablet23) == "") { ?>
        <th class="<?= $Page->Tablet23->headerCellClass() ?>"><?= $Page->Tablet23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
    <?php if ($Page->SortUrl($Page->Tablet24) == "") { ?>
        <th class="<?= $Page->Tablet24->headerCellClass() ?>"><?= $Page->Tablet24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
    <?php if ($Page->SortUrl($Page->Tablet25) == "") { ?>
        <th class="<?= $Page->Tablet25->headerCellClass() ?>"><?= $Page->Tablet25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Tablet25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Tablet25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Tablet25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Tablet25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Tablet25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
    <?php if ($Page->SortUrl($Page->RFSH14) == "") { ?>
        <th class="<?= $Page->RFSH14->headerCellClass() ?>"><?= $Page->RFSH14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
    <?php if ($Page->SortUrl($Page->RFSH15) == "") { ?>
        <th class="<?= $Page->RFSH15->headerCellClass() ?>"><?= $Page->RFSH15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
    <?php if ($Page->SortUrl($Page->RFSH16) == "") { ?>
        <th class="<?= $Page->RFSH16->headerCellClass() ?>"><?= $Page->RFSH16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
    <?php if ($Page->SortUrl($Page->RFSH17) == "") { ?>
        <th class="<?= $Page->RFSH17->headerCellClass() ?>"><?= $Page->RFSH17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
    <?php if ($Page->SortUrl($Page->RFSH18) == "") { ?>
        <th class="<?= $Page->RFSH18->headerCellClass() ?>"><?= $Page->RFSH18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
    <?php if ($Page->SortUrl($Page->RFSH19) == "") { ?>
        <th class="<?= $Page->RFSH19->headerCellClass() ?>"><?= $Page->RFSH19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
    <?php if ($Page->SortUrl($Page->RFSH20) == "") { ?>
        <th class="<?= $Page->RFSH20->headerCellClass() ?>"><?= $Page->RFSH20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
    <?php if ($Page->SortUrl($Page->RFSH21) == "") { ?>
        <th class="<?= $Page->RFSH21->headerCellClass() ?>"><?= $Page->RFSH21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
    <?php if ($Page->SortUrl($Page->RFSH22) == "") { ?>
        <th class="<?= $Page->RFSH22->headerCellClass() ?>"><?= $Page->RFSH22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
    <?php if ($Page->SortUrl($Page->RFSH23) == "") { ?>
        <th class="<?= $Page->RFSH23->headerCellClass() ?>"><?= $Page->RFSH23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
    <?php if ($Page->SortUrl($Page->RFSH24) == "") { ?>
        <th class="<?= $Page->RFSH24->headerCellClass() ?>"><?= $Page->RFSH24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
    <?php if ($Page->SortUrl($Page->RFSH25) == "") { ?>
        <th class="<?= $Page->RFSH25->headerCellClass() ?>"><?= $Page->RFSH25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RFSH25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RFSH25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RFSH25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RFSH25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RFSH25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
    <?php if ($Page->SortUrl($Page->HMG14) == "") { ?>
        <th class="<?= $Page->HMG14->headerCellClass() ?>"><?= $Page->HMG14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
    <?php if ($Page->SortUrl($Page->HMG15) == "") { ?>
        <th class="<?= $Page->HMG15->headerCellClass() ?>"><?= $Page->HMG15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
    <?php if ($Page->SortUrl($Page->HMG16) == "") { ?>
        <th class="<?= $Page->HMG16->headerCellClass() ?>"><?= $Page->HMG16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
    <?php if ($Page->SortUrl($Page->HMG17) == "") { ?>
        <th class="<?= $Page->HMG17->headerCellClass() ?>"><?= $Page->HMG17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
    <?php if ($Page->SortUrl($Page->HMG18) == "") { ?>
        <th class="<?= $Page->HMG18->headerCellClass() ?>"><?= $Page->HMG18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
    <?php if ($Page->SortUrl($Page->HMG19) == "") { ?>
        <th class="<?= $Page->HMG19->headerCellClass() ?>"><?= $Page->HMG19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
    <?php if ($Page->SortUrl($Page->HMG20) == "") { ?>
        <th class="<?= $Page->HMG20->headerCellClass() ?>"><?= $Page->HMG20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
    <?php if ($Page->SortUrl($Page->HMG21) == "") { ?>
        <th class="<?= $Page->HMG21->headerCellClass() ?>"><?= $Page->HMG21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
    <?php if ($Page->SortUrl($Page->HMG22) == "") { ?>
        <th class="<?= $Page->HMG22->headerCellClass() ?>"><?= $Page->HMG22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
    <?php if ($Page->SortUrl($Page->HMG23) == "") { ?>
        <th class="<?= $Page->HMG23->headerCellClass() ?>"><?= $Page->HMG23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
    <?php if ($Page->SortUrl($Page->HMG24) == "") { ?>
        <th class="<?= $Page->HMG24->headerCellClass() ?>"><?= $Page->HMG24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
    <?php if ($Page->SortUrl($Page->HMG25) == "") { ?>
        <th class="<?= $Page->HMG25->headerCellClass() ?>"><?= $Page->HMG25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HMG25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HMG25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HMG25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HMG25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HMG25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
    <?php if ($Page->SortUrl($Page->GnRH14) == "") { ?>
        <th class="<?= $Page->GnRH14->headerCellClass() ?>"><?= $Page->GnRH14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
    <?php if ($Page->SortUrl($Page->GnRH15) == "") { ?>
        <th class="<?= $Page->GnRH15->headerCellClass() ?>"><?= $Page->GnRH15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
    <?php if ($Page->SortUrl($Page->GnRH16) == "") { ?>
        <th class="<?= $Page->GnRH16->headerCellClass() ?>"><?= $Page->GnRH16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
    <?php if ($Page->SortUrl($Page->GnRH17) == "") { ?>
        <th class="<?= $Page->GnRH17->headerCellClass() ?>"><?= $Page->GnRH17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
    <?php if ($Page->SortUrl($Page->GnRH18) == "") { ?>
        <th class="<?= $Page->GnRH18->headerCellClass() ?>"><?= $Page->GnRH18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
    <?php if ($Page->SortUrl($Page->GnRH19) == "") { ?>
        <th class="<?= $Page->GnRH19->headerCellClass() ?>"><?= $Page->GnRH19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
    <?php if ($Page->SortUrl($Page->GnRH20) == "") { ?>
        <th class="<?= $Page->GnRH20->headerCellClass() ?>"><?= $Page->GnRH20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
    <?php if ($Page->SortUrl($Page->GnRH21) == "") { ?>
        <th class="<?= $Page->GnRH21->headerCellClass() ?>"><?= $Page->GnRH21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
    <?php if ($Page->SortUrl($Page->GnRH22) == "") { ?>
        <th class="<?= $Page->GnRH22->headerCellClass() ?>"><?= $Page->GnRH22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
    <?php if ($Page->SortUrl($Page->GnRH23) == "") { ?>
        <th class="<?= $Page->GnRH23->headerCellClass() ?>"><?= $Page->GnRH23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
    <?php if ($Page->SortUrl($Page->GnRH24) == "") { ?>
        <th class="<?= $Page->GnRH24->headerCellClass() ?>"><?= $Page->GnRH24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
    <?php if ($Page->SortUrl($Page->GnRH25) == "") { ?>
        <th class="<?= $Page->GnRH25->headerCellClass() ?>"><?= $Page->GnRH25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GnRH25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GnRH25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GnRH25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GnRH25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GnRH25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
    <?php if ($Page->SortUrl($Page->P414) == "") { ?>
        <th class="<?= $Page->P414->headerCellClass() ?>"><?= $Page->P414->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P414->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P414->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P414->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P414->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P414->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
    <?php if ($Page->SortUrl($Page->P415) == "") { ?>
        <th class="<?= $Page->P415->headerCellClass() ?>"><?= $Page->P415->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P415->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P415->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P415->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P415->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P415->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
    <?php if ($Page->SortUrl($Page->P416) == "") { ?>
        <th class="<?= $Page->P416->headerCellClass() ?>"><?= $Page->P416->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P416->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P416->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P416->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P416->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P416->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
    <?php if ($Page->SortUrl($Page->P417) == "") { ?>
        <th class="<?= $Page->P417->headerCellClass() ?>"><?= $Page->P417->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P417->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P417->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P417->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P417->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P417->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
    <?php if ($Page->SortUrl($Page->P418) == "") { ?>
        <th class="<?= $Page->P418->headerCellClass() ?>"><?= $Page->P418->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P418->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P418->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P418->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P418->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P418->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
    <?php if ($Page->SortUrl($Page->P419) == "") { ?>
        <th class="<?= $Page->P419->headerCellClass() ?>"><?= $Page->P419->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P419->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P419->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P419->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P419->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P419->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
    <?php if ($Page->SortUrl($Page->P420) == "") { ?>
        <th class="<?= $Page->P420->headerCellClass() ?>"><?= $Page->P420->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P420->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P420->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P420->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P420->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P420->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
    <?php if ($Page->SortUrl($Page->P421) == "") { ?>
        <th class="<?= $Page->P421->headerCellClass() ?>"><?= $Page->P421->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P421->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P421->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P421->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P421->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P421->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
    <?php if ($Page->SortUrl($Page->P422) == "") { ?>
        <th class="<?= $Page->P422->headerCellClass() ?>"><?= $Page->P422->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P422->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P422->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P422->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P422->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P422->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
    <?php if ($Page->SortUrl($Page->P423) == "") { ?>
        <th class="<?= $Page->P423->headerCellClass() ?>"><?= $Page->P423->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P423->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P423->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P423->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P423->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P423->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
    <?php if ($Page->SortUrl($Page->P424) == "") { ?>
        <th class="<?= $Page->P424->headerCellClass() ?>"><?= $Page->P424->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P424->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P424->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P424->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P424->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P424->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
    <?php if ($Page->SortUrl($Page->P425) == "") { ?>
        <th class="<?= $Page->P425->headerCellClass() ?>"><?= $Page->P425->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P425->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P425->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P425->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P425->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P425->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
    <?php if ($Page->SortUrl($Page->USGRt14) == "") { ?>
        <th class="<?= $Page->USGRt14->headerCellClass() ?>"><?= $Page->USGRt14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
    <?php if ($Page->SortUrl($Page->USGRt15) == "") { ?>
        <th class="<?= $Page->USGRt15->headerCellClass() ?>"><?= $Page->USGRt15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
    <?php if ($Page->SortUrl($Page->USGRt16) == "") { ?>
        <th class="<?= $Page->USGRt16->headerCellClass() ?>"><?= $Page->USGRt16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
    <?php if ($Page->SortUrl($Page->USGRt17) == "") { ?>
        <th class="<?= $Page->USGRt17->headerCellClass() ?>"><?= $Page->USGRt17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
    <?php if ($Page->SortUrl($Page->USGRt18) == "") { ?>
        <th class="<?= $Page->USGRt18->headerCellClass() ?>"><?= $Page->USGRt18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
    <?php if ($Page->SortUrl($Page->USGRt19) == "") { ?>
        <th class="<?= $Page->USGRt19->headerCellClass() ?>"><?= $Page->USGRt19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
    <?php if ($Page->SortUrl($Page->USGRt20) == "") { ?>
        <th class="<?= $Page->USGRt20->headerCellClass() ?>"><?= $Page->USGRt20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
    <?php if ($Page->SortUrl($Page->USGRt21) == "") { ?>
        <th class="<?= $Page->USGRt21->headerCellClass() ?>"><?= $Page->USGRt21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
    <?php if ($Page->SortUrl($Page->USGRt22) == "") { ?>
        <th class="<?= $Page->USGRt22->headerCellClass() ?>"><?= $Page->USGRt22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
    <?php if ($Page->SortUrl($Page->USGRt23) == "") { ?>
        <th class="<?= $Page->USGRt23->headerCellClass() ?>"><?= $Page->USGRt23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
    <?php if ($Page->SortUrl($Page->USGRt24) == "") { ?>
        <th class="<?= $Page->USGRt24->headerCellClass() ?>"><?= $Page->USGRt24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
    <?php if ($Page->SortUrl($Page->USGRt25) == "") { ?>
        <th class="<?= $Page->USGRt25->headerCellClass() ?>"><?= $Page->USGRt25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGRt25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGRt25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGRt25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGRt25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGRt25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
    <?php if ($Page->SortUrl($Page->USGLt14) == "") { ?>
        <th class="<?= $Page->USGLt14->headerCellClass() ?>"><?= $Page->USGLt14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
    <?php if ($Page->SortUrl($Page->USGLt15) == "") { ?>
        <th class="<?= $Page->USGLt15->headerCellClass() ?>"><?= $Page->USGLt15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
    <?php if ($Page->SortUrl($Page->USGLt16) == "") { ?>
        <th class="<?= $Page->USGLt16->headerCellClass() ?>"><?= $Page->USGLt16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
    <?php if ($Page->SortUrl($Page->USGLt17) == "") { ?>
        <th class="<?= $Page->USGLt17->headerCellClass() ?>"><?= $Page->USGLt17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
    <?php if ($Page->SortUrl($Page->USGLt18) == "") { ?>
        <th class="<?= $Page->USGLt18->headerCellClass() ?>"><?= $Page->USGLt18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
    <?php if ($Page->SortUrl($Page->USGLt19) == "") { ?>
        <th class="<?= $Page->USGLt19->headerCellClass() ?>"><?= $Page->USGLt19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
    <?php if ($Page->SortUrl($Page->USGLt20) == "") { ?>
        <th class="<?= $Page->USGLt20->headerCellClass() ?>"><?= $Page->USGLt20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
    <?php if ($Page->SortUrl($Page->USGLt21) == "") { ?>
        <th class="<?= $Page->USGLt21->headerCellClass() ?>"><?= $Page->USGLt21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
    <?php if ($Page->SortUrl($Page->USGLt22) == "") { ?>
        <th class="<?= $Page->USGLt22->headerCellClass() ?>"><?= $Page->USGLt22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
    <?php if ($Page->SortUrl($Page->USGLt23) == "") { ?>
        <th class="<?= $Page->USGLt23->headerCellClass() ?>"><?= $Page->USGLt23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
    <?php if ($Page->SortUrl($Page->USGLt24) == "") { ?>
        <th class="<?= $Page->USGLt24->headerCellClass() ?>"><?= $Page->USGLt24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
    <?php if ($Page->SortUrl($Page->USGLt25) == "") { ?>
        <th class="<?= $Page->USGLt25->headerCellClass() ?>"><?= $Page->USGLt25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->USGLt25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->USGLt25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->USGLt25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->USGLt25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->USGLt25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
    <?php if ($Page->SortUrl($Page->EM14) == "") { ?>
        <th class="<?= $Page->EM14->headerCellClass() ?>"><?= $Page->EM14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
    <?php if ($Page->SortUrl($Page->EM15) == "") { ?>
        <th class="<?= $Page->EM15->headerCellClass() ?>"><?= $Page->EM15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
    <?php if ($Page->SortUrl($Page->EM16) == "") { ?>
        <th class="<?= $Page->EM16->headerCellClass() ?>"><?= $Page->EM16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
    <?php if ($Page->SortUrl($Page->EM17) == "") { ?>
        <th class="<?= $Page->EM17->headerCellClass() ?>"><?= $Page->EM17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
    <?php if ($Page->SortUrl($Page->EM18) == "") { ?>
        <th class="<?= $Page->EM18->headerCellClass() ?>"><?= $Page->EM18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
    <?php if ($Page->SortUrl($Page->EM19) == "") { ?>
        <th class="<?= $Page->EM19->headerCellClass() ?>"><?= $Page->EM19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
    <?php if ($Page->SortUrl($Page->EM20) == "") { ?>
        <th class="<?= $Page->EM20->headerCellClass() ?>"><?= $Page->EM20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
    <?php if ($Page->SortUrl($Page->EM21) == "") { ?>
        <th class="<?= $Page->EM21->headerCellClass() ?>"><?= $Page->EM21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
    <?php if ($Page->SortUrl($Page->EM22) == "") { ?>
        <th class="<?= $Page->EM22->headerCellClass() ?>"><?= $Page->EM22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
    <?php if ($Page->SortUrl($Page->EM23) == "") { ?>
        <th class="<?= $Page->EM23->headerCellClass() ?>"><?= $Page->EM23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
    <?php if ($Page->SortUrl($Page->EM24) == "") { ?>
        <th class="<?= $Page->EM24->headerCellClass() ?>"><?= $Page->EM24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
    <?php if ($Page->SortUrl($Page->EM25) == "") { ?>
        <th class="<?= $Page->EM25->headerCellClass() ?>"><?= $Page->EM25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EM25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EM25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EM25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EM25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EM25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
    <?php if ($Page->SortUrl($Page->Others14) == "") { ?>
        <th class="<?= $Page->Others14->headerCellClass() ?>"><?= $Page->Others14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
    <?php if ($Page->SortUrl($Page->Others15) == "") { ?>
        <th class="<?= $Page->Others15->headerCellClass() ?>"><?= $Page->Others15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
    <?php if ($Page->SortUrl($Page->Others16) == "") { ?>
        <th class="<?= $Page->Others16->headerCellClass() ?>"><?= $Page->Others16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
    <?php if ($Page->SortUrl($Page->Others17) == "") { ?>
        <th class="<?= $Page->Others17->headerCellClass() ?>"><?= $Page->Others17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
    <?php if ($Page->SortUrl($Page->Others18) == "") { ?>
        <th class="<?= $Page->Others18->headerCellClass() ?>"><?= $Page->Others18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
    <?php if ($Page->SortUrl($Page->Others19) == "") { ?>
        <th class="<?= $Page->Others19->headerCellClass() ?>"><?= $Page->Others19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
    <?php if ($Page->SortUrl($Page->Others20) == "") { ?>
        <th class="<?= $Page->Others20->headerCellClass() ?>"><?= $Page->Others20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
    <?php if ($Page->SortUrl($Page->Others21) == "") { ?>
        <th class="<?= $Page->Others21->headerCellClass() ?>"><?= $Page->Others21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
    <?php if ($Page->SortUrl($Page->Others22) == "") { ?>
        <th class="<?= $Page->Others22->headerCellClass() ?>"><?= $Page->Others22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
    <?php if ($Page->SortUrl($Page->Others23) == "") { ?>
        <th class="<?= $Page->Others23->headerCellClass() ?>"><?= $Page->Others23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
    <?php if ($Page->SortUrl($Page->Others24) == "") { ?>
        <th class="<?= $Page->Others24->headerCellClass() ?>"><?= $Page->Others24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
    <?php if ($Page->SortUrl($Page->Others25) == "") { ?>
        <th class="<?= $Page->Others25->headerCellClass() ?>"><?= $Page->Others25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Others25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Others25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Others25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Others25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Others25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
    <?php if ($Page->SortUrl($Page->DR14) == "") { ?>
        <th class="<?= $Page->DR14->headerCellClass() ?>"><?= $Page->DR14->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR14->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR14->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR14->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR14->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR14->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
    <?php if ($Page->SortUrl($Page->DR15) == "") { ?>
        <th class="<?= $Page->DR15->headerCellClass() ?>"><?= $Page->DR15->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR15->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR15->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR15->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR15->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR15->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
    <?php if ($Page->SortUrl($Page->DR16) == "") { ?>
        <th class="<?= $Page->DR16->headerCellClass() ?>"><?= $Page->DR16->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR16->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR16->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR16->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR16->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR16->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
    <?php if ($Page->SortUrl($Page->DR17) == "") { ?>
        <th class="<?= $Page->DR17->headerCellClass() ?>"><?= $Page->DR17->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR17->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR17->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR17->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR17->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR17->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
    <?php if ($Page->SortUrl($Page->DR18) == "") { ?>
        <th class="<?= $Page->DR18->headerCellClass() ?>"><?= $Page->DR18->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR18->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR18->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR18->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR18->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR18->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
    <?php if ($Page->SortUrl($Page->DR19) == "") { ?>
        <th class="<?= $Page->DR19->headerCellClass() ?>"><?= $Page->DR19->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR19->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR19->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR19->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR19->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR19->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
    <?php if ($Page->SortUrl($Page->DR20) == "") { ?>
        <th class="<?= $Page->DR20->headerCellClass() ?>"><?= $Page->DR20->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR20->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR20->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR20->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR20->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR20->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
    <?php if ($Page->SortUrl($Page->DR21) == "") { ?>
        <th class="<?= $Page->DR21->headerCellClass() ?>"><?= $Page->DR21->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR21->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR21->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR21->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR21->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR21->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
    <?php if ($Page->SortUrl($Page->DR22) == "") { ?>
        <th class="<?= $Page->DR22->headerCellClass() ?>"><?= $Page->DR22->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR22->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR22->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR22->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR22->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR22->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
    <?php if ($Page->SortUrl($Page->DR23) == "") { ?>
        <th class="<?= $Page->DR23->headerCellClass() ?>"><?= $Page->DR23->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR23->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR23->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR23->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR23->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR23->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
    <?php if ($Page->SortUrl($Page->DR24) == "") { ?>
        <th class="<?= $Page->DR24->headerCellClass() ?>"><?= $Page->DR24->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR24->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR24->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR24->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR24->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR24->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
    <?php if ($Page->SortUrl($Page->DR25) == "") { ?>
        <th class="<?= $Page->DR25->headerCellClass() ?>"><?= $Page->DR25->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DR25->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DR25->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DR25->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DR25->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DR25->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
    <?php if ($Page->SortUrl($Page->E214) == "") { ?>
        <th class="<?= $Page->E214->headerCellClass() ?>"><?= $Page->E214->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E214->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E214->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E214->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E214->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E214->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
    <?php if ($Page->SortUrl($Page->E215) == "") { ?>
        <th class="<?= $Page->E215->headerCellClass() ?>"><?= $Page->E215->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E215->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E215->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E215->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E215->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E215->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
    <?php if ($Page->SortUrl($Page->E216) == "") { ?>
        <th class="<?= $Page->E216->headerCellClass() ?>"><?= $Page->E216->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E216->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E216->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E216->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E216->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E216->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
    <?php if ($Page->SortUrl($Page->E217) == "") { ?>
        <th class="<?= $Page->E217->headerCellClass() ?>"><?= $Page->E217->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E217->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E217->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E217->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E217->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E217->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
    <?php if ($Page->SortUrl($Page->E218) == "") { ?>
        <th class="<?= $Page->E218->headerCellClass() ?>"><?= $Page->E218->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E218->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E218->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E218->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E218->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E218->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
    <?php if ($Page->SortUrl($Page->E219) == "") { ?>
        <th class="<?= $Page->E219->headerCellClass() ?>"><?= $Page->E219->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E219->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E219->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E219->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E219->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E219->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
    <?php if ($Page->SortUrl($Page->E220) == "") { ?>
        <th class="<?= $Page->E220->headerCellClass() ?>"><?= $Page->E220->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E220->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E220->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E220->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E220->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E220->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
    <?php if ($Page->SortUrl($Page->E221) == "") { ?>
        <th class="<?= $Page->E221->headerCellClass() ?>"><?= $Page->E221->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E221->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E221->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E221->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E221->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E221->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
    <?php if ($Page->SortUrl($Page->E222) == "") { ?>
        <th class="<?= $Page->E222->headerCellClass() ?>"><?= $Page->E222->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E222->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E222->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E222->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E222->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E222->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
    <?php if ($Page->SortUrl($Page->E223) == "") { ?>
        <th class="<?= $Page->E223->headerCellClass() ?>"><?= $Page->E223->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E223->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E223->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E223->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E223->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E223->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
    <?php if ($Page->SortUrl($Page->E224) == "") { ?>
        <th class="<?= $Page->E224->headerCellClass() ?>"><?= $Page->E224->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E224->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E224->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E224->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E224->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E224->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
    <?php if ($Page->SortUrl($Page->E225) == "") { ?>
        <th class="<?= $Page->E225->headerCellClass() ?>"><?= $Page->E225->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E225->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E225->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E225->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E225->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E225->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
    <?php if ($Page->SortUrl($Page->EEETTTDTE) == "") { ?>
        <th class="<?= $Page->EEETTTDTE->headerCellClass() ?>"><?= $Page->EEETTTDTE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EEETTTDTE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EEETTTDTE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EEETTTDTE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EEETTTDTE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EEETTTDTE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
    <?php if ($Page->SortUrl($Page->bhcgdate) == "") { ?>
        <th class="<?= $Page->bhcgdate->headerCellClass() ?>"><?= $Page->bhcgdate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->bhcgdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->bhcgdate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->bhcgdate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->bhcgdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->bhcgdate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
    <?php if ($Page->SortUrl($Page->TUBAL_PATENCY) == "") { ?>
        <th class="<?= $Page->TUBAL_PATENCY->headerCellClass() ?>"><?= $Page->TUBAL_PATENCY->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TUBAL_PATENCY->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TUBAL_PATENCY->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TUBAL_PATENCY->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TUBAL_PATENCY->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TUBAL_PATENCY->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
    <?php if ($Page->SortUrl($Page->HSG) == "") { ?>
        <th class="<?= $Page->HSG->headerCellClass() ?>"><?= $Page->HSG->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HSG->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HSG->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HSG->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HSG->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HSG->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
    <?php if ($Page->SortUrl($Page->DHL) == "") { ?>
        <th class="<?= $Page->DHL->headerCellClass() ?>"><?= $Page->DHL->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DHL->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DHL->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DHL->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DHL->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DHL->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
    <?php if ($Page->SortUrl($Page->UTERINE_PROBLEMS) == "") { ?>
        <th class="<?= $Page->UTERINE_PROBLEMS->headerCellClass() ?>"><?= $Page->UTERINE_PROBLEMS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->UTERINE_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->UTERINE_PROBLEMS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->UTERINE_PROBLEMS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->UTERINE_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->UTERINE_PROBLEMS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
    <?php if ($Page->SortUrl($Page->W_COMORBIDS) == "") { ?>
        <th class="<?= $Page->W_COMORBIDS->headerCellClass() ?>"><?= $Page->W_COMORBIDS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->W_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->W_COMORBIDS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->W_COMORBIDS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->W_COMORBIDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->W_COMORBIDS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
    <?php if ($Page->SortUrl($Page->H_COMORBIDS) == "") { ?>
        <th class="<?= $Page->H_COMORBIDS->headerCellClass() ?>"><?= $Page->H_COMORBIDS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->H_COMORBIDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->H_COMORBIDS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->H_COMORBIDS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->H_COMORBIDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->H_COMORBIDS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
    <?php if ($Page->SortUrl($Page->SEXUAL_DYSFUNCTION) == "") { ?>
        <th class="<?= $Page->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><?= $Page->SEXUAL_DYSFUNCTION->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SEXUAL_DYSFUNCTION->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SEXUAL_DYSFUNCTION->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SEXUAL_DYSFUNCTION->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SEXUAL_DYSFUNCTION->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SEXUAL_DYSFUNCTION->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
    <?php if ($Page->SortUrl($Page->TABLETS) == "") { ?>
        <th class="<?= $Page->TABLETS->headerCellClass() ?>"><?= $Page->TABLETS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TABLETS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TABLETS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TABLETS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TABLETS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TABLETS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
    <?php if ($Page->SortUrl($Page->FOLLICLE_STATUS) == "") { ?>
        <th class="<?= $Page->FOLLICLE_STATUS->headerCellClass() ?>"><?= $Page->FOLLICLE_STATUS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FOLLICLE_STATUS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FOLLICLE_STATUS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FOLLICLE_STATUS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FOLLICLE_STATUS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FOLLICLE_STATUS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
    <?php if ($Page->SortUrl($Page->NUMBER_OF_IUI) == "") { ?>
        <th class="<?= $Page->NUMBER_OF_IUI->headerCellClass() ?>"><?= $Page->NUMBER_OF_IUI->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NUMBER_OF_IUI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NUMBER_OF_IUI->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NUMBER_OF_IUI->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NUMBER_OF_IUI->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NUMBER_OF_IUI->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
    <?php if ($Page->SortUrl($Page->PROCEDURE) == "") { ?>
        <th class="<?= $Page->PROCEDURE->headerCellClass() ?>"><?= $Page->PROCEDURE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PROCEDURE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PROCEDURE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PROCEDURE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PROCEDURE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PROCEDURE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
    <?php if ($Page->SortUrl($Page->LUTEAL_SUPPORT) == "") { ?>
        <th class="<?= $Page->LUTEAL_SUPPORT->headerCellClass() ?>"><?= $Page->LUTEAL_SUPPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->LUTEAL_SUPPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->LUTEAL_SUPPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->LUTEAL_SUPPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->LUTEAL_SUPPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->LUTEAL_SUPPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
    <?php if ($Page->SortUrl($Page->SPECIFIC_MATERNAL_PROBLEMS) == "") { ?>
        <th class="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SPECIFIC_MATERNAL_PROBLEMS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SPECIFIC_MATERNAL_PROBLEMS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SPECIFIC_MATERNAL_PROBLEMS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SPECIFIC_MATERNAL_PROBLEMS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
    <?php if ($Page->SortUrl($Page->ONGOING_PREG) == "") { ?>
        <th class="<?= $Page->ONGOING_PREG->headerCellClass() ?>"><?= $Page->ONGOING_PREG->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ONGOING_PREG->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ONGOING_PREG->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ONGOING_PREG->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ONGOING_PREG->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ONGOING_PREG->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
    <?php if ($Page->SortUrl($Page->EDD_Date) == "") { ?>
        <th class="<?= $Page->EDD_Date->headerCellClass() ?>"><?= $Page->EDD_Date->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EDD_Date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EDD_Date->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EDD_Date->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EDD_Date->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EDD_Date->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Name->Visible) { // Name ?>
        <!-- Name -->
        <td<?= $Page->Name->cellAttributes() ?>>
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ARTCycle->Visible) { // ARTCycle ?>
        <!-- ARTCycle -->
        <td<?= $Page->ARTCycle->cellAttributes() ?>>
<span<?= $Page->ARTCycle->viewAttributes() ?>>
<?= $Page->ARTCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FemaleFactor->Visible) { // FemaleFactor ?>
        <!-- FemaleFactor -->
        <td<?= $Page->FemaleFactor->cellAttributes() ?>>
<span<?= $Page->FemaleFactor->viewAttributes() ?>>
<?= $Page->FemaleFactor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MaleFactor->Visible) { // MaleFactor ?>
        <!-- MaleFactor -->
        <td<?= $Page->MaleFactor->cellAttributes() ?>>
<span<?= $Page->MaleFactor->viewAttributes() ?>>
<?= $Page->MaleFactor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Protocol->Visible) { // Protocol ?>
        <!-- Protocol -->
        <td<?= $Page->Protocol->cellAttributes() ?>>
<span<?= $Page->Protocol->viewAttributes() ?>>
<?= $Page->Protocol->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SemenFrozen->Visible) { // SemenFrozen ?>
        <!-- SemenFrozen -->
        <td<?= $Page->SemenFrozen->cellAttributes() ?>>
<span<?= $Page->SemenFrozen->viewAttributes() ?>>
<?= $Page->SemenFrozen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A4ICSICycle->Visible) { // A4ICSICycle ?>
        <!-- A4ICSICycle -->
        <td<?= $Page->A4ICSICycle->cellAttributes() ?>>
<span<?= $Page->A4ICSICycle->viewAttributes() ?>>
<?= $Page->A4ICSICycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TotalICSICycle->Visible) { // TotalICSICycle ?>
        <!-- TotalICSICycle -->
        <td<?= $Page->TotalICSICycle->cellAttributes() ?>>
<span<?= $Page->TotalICSICycle->viewAttributes() ?>>
<?= $Page->TotalICSICycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TypeOfInfertility->Visible) { // TypeOfInfertility ?>
        <!-- TypeOfInfertility -->
        <td<?= $Page->TypeOfInfertility->cellAttributes() ?>>
<span<?= $Page->TypeOfInfertility->viewAttributes() ?>>
<?= $Page->TypeOfInfertility->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <!-- Duration -->
        <td<?= $Page->Duration->cellAttributes() ?>>
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <!-- LMP -->
        <td<?= $Page->LMP->cellAttributes() ?>>
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RelevantHistory->Visible) { // RelevantHistory ?>
        <!-- RelevantHistory -->
        <td<?= $Page->RelevantHistory->cellAttributes() ?>>
<span<?= $Page->RelevantHistory->viewAttributes() ?>>
<?= $Page->RelevantHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IUICycles->Visible) { // IUICycles ?>
        <!-- IUICycles -->
        <td<?= $Page->IUICycles->cellAttributes() ?>>
<span<?= $Page->IUICycles->viewAttributes() ?>>
<?= $Page->IUICycles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AFC->Visible) { // AFC ?>
        <!-- AFC -->
        <td<?= $Page->AFC->cellAttributes() ?>>
<span<?= $Page->AFC->viewAttributes() ?>>
<?= $Page->AFC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AMH->Visible) { // AMH ?>
        <!-- AMH -->
        <td<?= $Page->AMH->cellAttributes() ?>>
<span<?= $Page->AMH->viewAttributes() ?>>
<?= $Page->AMH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FBMI->Visible) { // FBMI ?>
        <!-- FBMI -->
        <td<?= $Page->FBMI->cellAttributes() ?>>
<span<?= $Page->FBMI->viewAttributes() ?>>
<?= $Page->FBMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MBMI->Visible) { // MBMI ?>
        <!-- MBMI -->
        <td<?= $Page->MBMI->cellAttributes() ?>>
<span<?= $Page->MBMI->viewAttributes() ?>>
<?= $Page->MBMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OvarianVolumeRT->Visible) { // OvarianVolumeRT ?>
        <!-- OvarianVolumeRT -->
        <td<?= $Page->OvarianVolumeRT->cellAttributes() ?>>
<span<?= $Page->OvarianVolumeRT->viewAttributes() ?>>
<?= $Page->OvarianVolumeRT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OvarianVolumeLT->Visible) { // OvarianVolumeLT ?>
        <!-- OvarianVolumeLT -->
        <td<?= $Page->OvarianVolumeLT->cellAttributes() ?>>
<span<?= $Page->OvarianVolumeLT->viewAttributes() ?>>
<?= $Page->OvarianVolumeLT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DAYSOFSTIMULATION->Visible) { // DAYSOFSTIMULATION ?>
        <!-- DAYSOFSTIMULATION -->
        <td<?= $Page->DAYSOFSTIMULATION->cellAttributes() ?>>
<span<?= $Page->DAYSOFSTIMULATION->viewAttributes() ?>>
<?= $Page->DAYSOFSTIMULATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DOSEOFGONADOTROPINS->Visible) { // DOSEOFGONADOTROPINS ?>
        <!-- DOSEOFGONADOTROPINS -->
        <td<?= $Page->DOSEOFGONADOTROPINS->cellAttributes() ?>>
<span<?= $Page->DOSEOFGONADOTROPINS->viewAttributes() ?>>
<?= $Page->DOSEOFGONADOTROPINS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->INJTYPE->Visible) { // INJTYPE ?>
        <!-- INJTYPE -->
        <td<?= $Page->INJTYPE->cellAttributes() ?>>
<span<?= $Page->INJTYPE->viewAttributes() ?>>
<?= $Page->INJTYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ANTAGONISTDAYS->Visible) { // ANTAGONISTDAYS ?>
        <!-- ANTAGONISTDAYS -->
        <td<?= $Page->ANTAGONISTDAYS->cellAttributes() ?>>
<span<?= $Page->ANTAGONISTDAYS->viewAttributes() ?>>
<?= $Page->ANTAGONISTDAYS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ANTAGONISTSTARTDAY->Visible) { // ANTAGONISTSTARTDAY ?>
        <!-- ANTAGONISTSTARTDAY -->
        <td<?= $Page->ANTAGONISTSTARTDAY->cellAttributes() ?>>
<span<?= $Page->ANTAGONISTSTARTDAY->viewAttributes() ?>>
<?= $Page->ANTAGONISTSTARTDAY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GROWTHHORMONE->Visible) { // GROWTHHORMONE ?>
        <!-- GROWTHHORMONE -->
        <td<?= $Page->GROWTHHORMONE->cellAttributes() ?>>
<span<?= $Page->GROWTHHORMONE->viewAttributes() ?>>
<?= $Page->GROWTHHORMONE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PRETREATMENT->Visible) { // PRETREATMENT ?>
        <!-- PRETREATMENT -->
        <td<?= $Page->PRETREATMENT->cellAttributes() ?>>
<span<?= $Page->PRETREATMENT->viewAttributes() ?>>
<?= $Page->PRETREATMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SerumP4->Visible) { // SerumP4 ?>
        <!-- SerumP4 -->
        <td<?= $Page->SerumP4->cellAttributes() ?>>
<span<?= $Page->SerumP4->viewAttributes() ?>>
<?= $Page->SerumP4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FORT->Visible) { // FORT ?>
        <!-- FORT -->
        <td<?= $Page->FORT->cellAttributes() ?>>
<span<?= $Page->FORT->viewAttributes() ?>>
<?= $Page->FORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MedicalFactors->Visible) { // MedicalFactors ?>
        <!-- MedicalFactors -->
        <td<?= $Page->MedicalFactors->cellAttributes() ?>>
<span<?= $Page->MedicalFactors->viewAttributes() ?>>
<?= $Page->MedicalFactors->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SCDate->Visible) { // SCDate ?>
        <!-- SCDate -->
        <td<?= $Page->SCDate->cellAttributes() ?>>
<span<?= $Page->SCDate->viewAttributes() ?>>
<?= $Page->SCDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OvarianSurgery->Visible) { // OvarianSurgery ?>
        <!-- OvarianSurgery -->
        <td<?= $Page->OvarianSurgery->cellAttributes() ?>>
<span<?= $Page->OvarianSurgery->viewAttributes() ?>>
<?= $Page->OvarianSurgery->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PreProcedureOrder->Visible) { // PreProcedureOrder ?>
        <!-- PreProcedureOrder -->
        <td<?= $Page->PreProcedureOrder->cellAttributes() ?>>
<span<?= $Page->PreProcedureOrder->viewAttributes() ?>>
<?= $Page->PreProcedureOrder->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TRIGGERR->Visible) { // TRIGGERR ?>
        <!-- TRIGGERR -->
        <td<?= $Page->TRIGGERR->cellAttributes() ?>>
<span<?= $Page->TRIGGERR->viewAttributes() ?>>
<?= $Page->TRIGGERR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TRIGGERDATE->Visible) { // TRIGGERDATE ?>
        <!-- TRIGGERDATE -->
        <td<?= $Page->TRIGGERDATE->cellAttributes() ?>>
<span<?= $Page->TRIGGERDATE->viewAttributes() ?>>
<?= $Page->TRIGGERDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ATHOMEorCLINIC->Visible) { // ATHOMEorCLINIC ?>
        <!-- ATHOMEorCLINIC -->
        <td<?= $Page->ATHOMEorCLINIC->cellAttributes() ?>>
<span<?= $Page->ATHOMEorCLINIC->viewAttributes() ?>>
<?= $Page->ATHOMEorCLINIC->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OPUDATE->Visible) { // OPUDATE ?>
        <!-- OPUDATE -->
        <td<?= $Page->OPUDATE->cellAttributes() ?>>
<span<?= $Page->OPUDATE->viewAttributes() ?>>
<?= $Page->OPUDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ALLFREEZEINDICATION->Visible) { // ALLFREEZEINDICATION ?>
        <!-- ALLFREEZEINDICATION -->
        <td<?= $Page->ALLFREEZEINDICATION->cellAttributes() ?>>
<span<?= $Page->ALLFREEZEINDICATION->viewAttributes() ?>>
<?= $Page->ALLFREEZEINDICATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ERA->Visible) { // ERA ?>
        <!-- ERA -->
        <td<?= $Page->ERA->cellAttributes() ?>>
<span<?= $Page->ERA->viewAttributes() ?>>
<?= $Page->ERA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PGTA->Visible) { // PGTA ?>
        <!-- PGTA -->
        <td<?= $Page->PGTA->cellAttributes() ?>>
<span<?= $Page->PGTA->viewAttributes() ?>>
<?= $Page->PGTA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PGD->Visible) { // PGD ?>
        <!-- PGD -->
        <td<?= $Page->PGD->cellAttributes() ?>>
<span<?= $Page->PGD->viewAttributes() ?>>
<?= $Page->PGD->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DATEOFET->Visible) { // DATEOFET ?>
        <!-- DATEOFET -->
        <td<?= $Page->DATEOFET->cellAttributes() ?>>
<span<?= $Page->DATEOFET->viewAttributes() ?>>
<?= $Page->DATEOFET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ET->Visible) { // ET ?>
        <!-- ET -->
        <td<?= $Page->ET->cellAttributes() ?>>
<span<?= $Page->ET->viewAttributes() ?>>
<?= $Page->ET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ESET->Visible) { // ESET ?>
        <!-- ESET -->
        <td<?= $Page->ESET->cellAttributes() ?>>
<span<?= $Page->ESET->viewAttributes() ?>>
<?= $Page->ESET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DOET->Visible) { // DOET ?>
        <!-- DOET -->
        <td<?= $Page->DOET->cellAttributes() ?>>
<span<?= $Page->DOET->viewAttributes() ?>>
<?= $Page->DOET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SEMENPREPARATION->Visible) { // SEMENPREPARATION ?>
        <!-- SEMENPREPARATION -->
        <td<?= $Page->SEMENPREPARATION->cellAttributes() ?>>
<span<?= $Page->SEMENPREPARATION->viewAttributes() ?>>
<?= $Page->SEMENPREPARATION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->REASONFORESET->Visible) { // REASONFORESET ?>
        <!-- REASONFORESET -->
        <td<?= $Page->REASONFORESET->cellAttributes() ?>>
<span<?= $Page->REASONFORESET->viewAttributes() ?>>
<?= $Page->REASONFORESET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Expectedoocytes->Visible) { // Expectedoocytes ?>
        <!-- Expectedoocytes -->
        <td<?= $Page->Expectedoocytes->cellAttributes() ?>>
<span<?= $Page->Expectedoocytes->viewAttributes() ?>>
<?= $Page->Expectedoocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate1->Visible) { // StChDate1 ?>
        <!-- StChDate1 -->
        <td<?= $Page->StChDate1->cellAttributes() ?>>
<span<?= $Page->StChDate1->viewAttributes() ?>>
<?= $Page->StChDate1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate2->Visible) { // StChDate2 ?>
        <!-- StChDate2 -->
        <td<?= $Page->StChDate2->cellAttributes() ?>>
<span<?= $Page->StChDate2->viewAttributes() ?>>
<?= $Page->StChDate2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate3->Visible) { // StChDate3 ?>
        <!-- StChDate3 -->
        <td<?= $Page->StChDate3->cellAttributes() ?>>
<span<?= $Page->StChDate3->viewAttributes() ?>>
<?= $Page->StChDate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate4->Visible) { // StChDate4 ?>
        <!-- StChDate4 -->
        <td<?= $Page->StChDate4->cellAttributes() ?>>
<span<?= $Page->StChDate4->viewAttributes() ?>>
<?= $Page->StChDate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate5->Visible) { // StChDate5 ?>
        <!-- StChDate5 -->
        <td<?= $Page->StChDate5->cellAttributes() ?>>
<span<?= $Page->StChDate5->viewAttributes() ?>>
<?= $Page->StChDate5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate6->Visible) { // StChDate6 ?>
        <!-- StChDate6 -->
        <td<?= $Page->StChDate6->cellAttributes() ?>>
<span<?= $Page->StChDate6->viewAttributes() ?>>
<?= $Page->StChDate6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate7->Visible) { // StChDate7 ?>
        <!-- StChDate7 -->
        <td<?= $Page->StChDate7->cellAttributes() ?>>
<span<?= $Page->StChDate7->viewAttributes() ?>>
<?= $Page->StChDate7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate8->Visible) { // StChDate8 ?>
        <!-- StChDate8 -->
        <td<?= $Page->StChDate8->cellAttributes() ?>>
<span<?= $Page->StChDate8->viewAttributes() ?>>
<?= $Page->StChDate8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate9->Visible) { // StChDate9 ?>
        <!-- StChDate9 -->
        <td<?= $Page->StChDate9->cellAttributes() ?>>
<span<?= $Page->StChDate9->viewAttributes() ?>>
<?= $Page->StChDate9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate10->Visible) { // StChDate10 ?>
        <!-- StChDate10 -->
        <td<?= $Page->StChDate10->cellAttributes() ?>>
<span<?= $Page->StChDate10->viewAttributes() ?>>
<?= $Page->StChDate10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate11->Visible) { // StChDate11 ?>
        <!-- StChDate11 -->
        <td<?= $Page->StChDate11->cellAttributes() ?>>
<span<?= $Page->StChDate11->viewAttributes() ?>>
<?= $Page->StChDate11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate12->Visible) { // StChDate12 ?>
        <!-- StChDate12 -->
        <td<?= $Page->StChDate12->cellAttributes() ?>>
<span<?= $Page->StChDate12->viewAttributes() ?>>
<?= $Page->StChDate12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate13->Visible) { // StChDate13 ?>
        <!-- StChDate13 -->
        <td<?= $Page->StChDate13->cellAttributes() ?>>
<span<?= $Page->StChDate13->viewAttributes() ?>>
<?= $Page->StChDate13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay1->Visible) { // CycleDay1 ?>
        <!-- CycleDay1 -->
        <td<?= $Page->CycleDay1->cellAttributes() ?>>
<span<?= $Page->CycleDay1->viewAttributes() ?>>
<?= $Page->CycleDay1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay2->Visible) { // CycleDay2 ?>
        <!-- CycleDay2 -->
        <td<?= $Page->CycleDay2->cellAttributes() ?>>
<span<?= $Page->CycleDay2->viewAttributes() ?>>
<?= $Page->CycleDay2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay3->Visible) { // CycleDay3 ?>
        <!-- CycleDay3 -->
        <td<?= $Page->CycleDay3->cellAttributes() ?>>
<span<?= $Page->CycleDay3->viewAttributes() ?>>
<?= $Page->CycleDay3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay4->Visible) { // CycleDay4 ?>
        <!-- CycleDay4 -->
        <td<?= $Page->CycleDay4->cellAttributes() ?>>
<span<?= $Page->CycleDay4->viewAttributes() ?>>
<?= $Page->CycleDay4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay5->Visible) { // CycleDay5 ?>
        <!-- CycleDay5 -->
        <td<?= $Page->CycleDay5->cellAttributes() ?>>
<span<?= $Page->CycleDay5->viewAttributes() ?>>
<?= $Page->CycleDay5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay6->Visible) { // CycleDay6 ?>
        <!-- CycleDay6 -->
        <td<?= $Page->CycleDay6->cellAttributes() ?>>
<span<?= $Page->CycleDay6->viewAttributes() ?>>
<?= $Page->CycleDay6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay7->Visible) { // CycleDay7 ?>
        <!-- CycleDay7 -->
        <td<?= $Page->CycleDay7->cellAttributes() ?>>
<span<?= $Page->CycleDay7->viewAttributes() ?>>
<?= $Page->CycleDay7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay8->Visible) { // CycleDay8 ?>
        <!-- CycleDay8 -->
        <td<?= $Page->CycleDay8->cellAttributes() ?>>
<span<?= $Page->CycleDay8->viewAttributes() ?>>
<?= $Page->CycleDay8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay9->Visible) { // CycleDay9 ?>
        <!-- CycleDay9 -->
        <td<?= $Page->CycleDay9->cellAttributes() ?>>
<span<?= $Page->CycleDay9->viewAttributes() ?>>
<?= $Page->CycleDay9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay10->Visible) { // CycleDay10 ?>
        <!-- CycleDay10 -->
        <td<?= $Page->CycleDay10->cellAttributes() ?>>
<span<?= $Page->CycleDay10->viewAttributes() ?>>
<?= $Page->CycleDay10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay11->Visible) { // CycleDay11 ?>
        <!-- CycleDay11 -->
        <td<?= $Page->CycleDay11->cellAttributes() ?>>
<span<?= $Page->CycleDay11->viewAttributes() ?>>
<?= $Page->CycleDay11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay12->Visible) { // CycleDay12 ?>
        <!-- CycleDay12 -->
        <td<?= $Page->CycleDay12->cellAttributes() ?>>
<span<?= $Page->CycleDay12->viewAttributes() ?>>
<?= $Page->CycleDay12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay13->Visible) { // CycleDay13 ?>
        <!-- CycleDay13 -->
        <td<?= $Page->CycleDay13->cellAttributes() ?>>
<span<?= $Page->CycleDay13->viewAttributes() ?>>
<?= $Page->CycleDay13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay1->Visible) { // StimulationDay1 ?>
        <!-- StimulationDay1 -->
        <td<?= $Page->StimulationDay1->cellAttributes() ?>>
<span<?= $Page->StimulationDay1->viewAttributes() ?>>
<?= $Page->StimulationDay1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay2->Visible) { // StimulationDay2 ?>
        <!-- StimulationDay2 -->
        <td<?= $Page->StimulationDay2->cellAttributes() ?>>
<span<?= $Page->StimulationDay2->viewAttributes() ?>>
<?= $Page->StimulationDay2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay3->Visible) { // StimulationDay3 ?>
        <!-- StimulationDay3 -->
        <td<?= $Page->StimulationDay3->cellAttributes() ?>>
<span<?= $Page->StimulationDay3->viewAttributes() ?>>
<?= $Page->StimulationDay3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay4->Visible) { // StimulationDay4 ?>
        <!-- StimulationDay4 -->
        <td<?= $Page->StimulationDay4->cellAttributes() ?>>
<span<?= $Page->StimulationDay4->viewAttributes() ?>>
<?= $Page->StimulationDay4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay5->Visible) { // StimulationDay5 ?>
        <!-- StimulationDay5 -->
        <td<?= $Page->StimulationDay5->cellAttributes() ?>>
<span<?= $Page->StimulationDay5->viewAttributes() ?>>
<?= $Page->StimulationDay5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay6->Visible) { // StimulationDay6 ?>
        <!-- StimulationDay6 -->
        <td<?= $Page->StimulationDay6->cellAttributes() ?>>
<span<?= $Page->StimulationDay6->viewAttributes() ?>>
<?= $Page->StimulationDay6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay7->Visible) { // StimulationDay7 ?>
        <!-- StimulationDay7 -->
        <td<?= $Page->StimulationDay7->cellAttributes() ?>>
<span<?= $Page->StimulationDay7->viewAttributes() ?>>
<?= $Page->StimulationDay7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay8->Visible) { // StimulationDay8 ?>
        <!-- StimulationDay8 -->
        <td<?= $Page->StimulationDay8->cellAttributes() ?>>
<span<?= $Page->StimulationDay8->viewAttributes() ?>>
<?= $Page->StimulationDay8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay9->Visible) { // StimulationDay9 ?>
        <!-- StimulationDay9 -->
        <td<?= $Page->StimulationDay9->cellAttributes() ?>>
<span<?= $Page->StimulationDay9->viewAttributes() ?>>
<?= $Page->StimulationDay9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay10->Visible) { // StimulationDay10 ?>
        <!-- StimulationDay10 -->
        <td<?= $Page->StimulationDay10->cellAttributes() ?>>
<span<?= $Page->StimulationDay10->viewAttributes() ?>>
<?= $Page->StimulationDay10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay11->Visible) { // StimulationDay11 ?>
        <!-- StimulationDay11 -->
        <td<?= $Page->StimulationDay11->cellAttributes() ?>>
<span<?= $Page->StimulationDay11->viewAttributes() ?>>
<?= $Page->StimulationDay11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay12->Visible) { // StimulationDay12 ?>
        <!-- StimulationDay12 -->
        <td<?= $Page->StimulationDay12->cellAttributes() ?>>
<span<?= $Page->StimulationDay12->viewAttributes() ?>>
<?= $Page->StimulationDay12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay13->Visible) { // StimulationDay13 ?>
        <!-- StimulationDay13 -->
        <td<?= $Page->StimulationDay13->cellAttributes() ?>>
<span<?= $Page->StimulationDay13->viewAttributes() ?>>
<?= $Page->StimulationDay13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet1->Visible) { // Tablet1 ?>
        <!-- Tablet1 -->
        <td<?= $Page->Tablet1->cellAttributes() ?>>
<span<?= $Page->Tablet1->viewAttributes() ?>>
<?= $Page->Tablet1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet2->Visible) { // Tablet2 ?>
        <!-- Tablet2 -->
        <td<?= $Page->Tablet2->cellAttributes() ?>>
<span<?= $Page->Tablet2->viewAttributes() ?>>
<?= $Page->Tablet2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet3->Visible) { // Tablet3 ?>
        <!-- Tablet3 -->
        <td<?= $Page->Tablet3->cellAttributes() ?>>
<span<?= $Page->Tablet3->viewAttributes() ?>>
<?= $Page->Tablet3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet4->Visible) { // Tablet4 ?>
        <!-- Tablet4 -->
        <td<?= $Page->Tablet4->cellAttributes() ?>>
<span<?= $Page->Tablet4->viewAttributes() ?>>
<?= $Page->Tablet4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet5->Visible) { // Tablet5 ?>
        <!-- Tablet5 -->
        <td<?= $Page->Tablet5->cellAttributes() ?>>
<span<?= $Page->Tablet5->viewAttributes() ?>>
<?= $Page->Tablet5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet6->Visible) { // Tablet6 ?>
        <!-- Tablet6 -->
        <td<?= $Page->Tablet6->cellAttributes() ?>>
<span<?= $Page->Tablet6->viewAttributes() ?>>
<?= $Page->Tablet6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet7->Visible) { // Tablet7 ?>
        <!-- Tablet7 -->
        <td<?= $Page->Tablet7->cellAttributes() ?>>
<span<?= $Page->Tablet7->viewAttributes() ?>>
<?= $Page->Tablet7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet8->Visible) { // Tablet8 ?>
        <!-- Tablet8 -->
        <td<?= $Page->Tablet8->cellAttributes() ?>>
<span<?= $Page->Tablet8->viewAttributes() ?>>
<?= $Page->Tablet8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet9->Visible) { // Tablet9 ?>
        <!-- Tablet9 -->
        <td<?= $Page->Tablet9->cellAttributes() ?>>
<span<?= $Page->Tablet9->viewAttributes() ?>>
<?= $Page->Tablet9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet10->Visible) { // Tablet10 ?>
        <!-- Tablet10 -->
        <td<?= $Page->Tablet10->cellAttributes() ?>>
<span<?= $Page->Tablet10->viewAttributes() ?>>
<?= $Page->Tablet10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet11->Visible) { // Tablet11 ?>
        <!-- Tablet11 -->
        <td<?= $Page->Tablet11->cellAttributes() ?>>
<span<?= $Page->Tablet11->viewAttributes() ?>>
<?= $Page->Tablet11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet12->Visible) { // Tablet12 ?>
        <!-- Tablet12 -->
        <td<?= $Page->Tablet12->cellAttributes() ?>>
<span<?= $Page->Tablet12->viewAttributes() ?>>
<?= $Page->Tablet12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet13->Visible) { // Tablet13 ?>
        <!-- Tablet13 -->
        <td<?= $Page->Tablet13->cellAttributes() ?>>
<span<?= $Page->Tablet13->viewAttributes() ?>>
<?= $Page->Tablet13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH1->Visible) { // RFSH1 ?>
        <!-- RFSH1 -->
        <td<?= $Page->RFSH1->cellAttributes() ?>>
<span<?= $Page->RFSH1->viewAttributes() ?>>
<?= $Page->RFSH1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH2->Visible) { // RFSH2 ?>
        <!-- RFSH2 -->
        <td<?= $Page->RFSH2->cellAttributes() ?>>
<span<?= $Page->RFSH2->viewAttributes() ?>>
<?= $Page->RFSH2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH3->Visible) { // RFSH3 ?>
        <!-- RFSH3 -->
        <td<?= $Page->RFSH3->cellAttributes() ?>>
<span<?= $Page->RFSH3->viewAttributes() ?>>
<?= $Page->RFSH3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH4->Visible) { // RFSH4 ?>
        <!-- RFSH4 -->
        <td<?= $Page->RFSH4->cellAttributes() ?>>
<span<?= $Page->RFSH4->viewAttributes() ?>>
<?= $Page->RFSH4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH5->Visible) { // RFSH5 ?>
        <!-- RFSH5 -->
        <td<?= $Page->RFSH5->cellAttributes() ?>>
<span<?= $Page->RFSH5->viewAttributes() ?>>
<?= $Page->RFSH5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH6->Visible) { // RFSH6 ?>
        <!-- RFSH6 -->
        <td<?= $Page->RFSH6->cellAttributes() ?>>
<span<?= $Page->RFSH6->viewAttributes() ?>>
<?= $Page->RFSH6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH7->Visible) { // RFSH7 ?>
        <!-- RFSH7 -->
        <td<?= $Page->RFSH7->cellAttributes() ?>>
<span<?= $Page->RFSH7->viewAttributes() ?>>
<?= $Page->RFSH7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH8->Visible) { // RFSH8 ?>
        <!-- RFSH8 -->
        <td<?= $Page->RFSH8->cellAttributes() ?>>
<span<?= $Page->RFSH8->viewAttributes() ?>>
<?= $Page->RFSH8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH9->Visible) { // RFSH9 ?>
        <!-- RFSH9 -->
        <td<?= $Page->RFSH9->cellAttributes() ?>>
<span<?= $Page->RFSH9->viewAttributes() ?>>
<?= $Page->RFSH9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH10->Visible) { // RFSH10 ?>
        <!-- RFSH10 -->
        <td<?= $Page->RFSH10->cellAttributes() ?>>
<span<?= $Page->RFSH10->viewAttributes() ?>>
<?= $Page->RFSH10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH11->Visible) { // RFSH11 ?>
        <!-- RFSH11 -->
        <td<?= $Page->RFSH11->cellAttributes() ?>>
<span<?= $Page->RFSH11->viewAttributes() ?>>
<?= $Page->RFSH11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH12->Visible) { // RFSH12 ?>
        <!-- RFSH12 -->
        <td<?= $Page->RFSH12->cellAttributes() ?>>
<span<?= $Page->RFSH12->viewAttributes() ?>>
<?= $Page->RFSH12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH13->Visible) { // RFSH13 ?>
        <!-- RFSH13 -->
        <td<?= $Page->RFSH13->cellAttributes() ?>>
<span<?= $Page->RFSH13->viewAttributes() ?>>
<?= $Page->RFSH13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG1->Visible) { // HMG1 ?>
        <!-- HMG1 -->
        <td<?= $Page->HMG1->cellAttributes() ?>>
<span<?= $Page->HMG1->viewAttributes() ?>>
<?= $Page->HMG1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG2->Visible) { // HMG2 ?>
        <!-- HMG2 -->
        <td<?= $Page->HMG2->cellAttributes() ?>>
<span<?= $Page->HMG2->viewAttributes() ?>>
<?= $Page->HMG2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG3->Visible) { // HMG3 ?>
        <!-- HMG3 -->
        <td<?= $Page->HMG3->cellAttributes() ?>>
<span<?= $Page->HMG3->viewAttributes() ?>>
<?= $Page->HMG3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG4->Visible) { // HMG4 ?>
        <!-- HMG4 -->
        <td<?= $Page->HMG4->cellAttributes() ?>>
<span<?= $Page->HMG4->viewAttributes() ?>>
<?= $Page->HMG4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG5->Visible) { // HMG5 ?>
        <!-- HMG5 -->
        <td<?= $Page->HMG5->cellAttributes() ?>>
<span<?= $Page->HMG5->viewAttributes() ?>>
<?= $Page->HMG5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG6->Visible) { // HMG6 ?>
        <!-- HMG6 -->
        <td<?= $Page->HMG6->cellAttributes() ?>>
<span<?= $Page->HMG6->viewAttributes() ?>>
<?= $Page->HMG6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG7->Visible) { // HMG7 ?>
        <!-- HMG7 -->
        <td<?= $Page->HMG7->cellAttributes() ?>>
<span<?= $Page->HMG7->viewAttributes() ?>>
<?= $Page->HMG7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG8->Visible) { // HMG8 ?>
        <!-- HMG8 -->
        <td<?= $Page->HMG8->cellAttributes() ?>>
<span<?= $Page->HMG8->viewAttributes() ?>>
<?= $Page->HMG8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG9->Visible) { // HMG9 ?>
        <!-- HMG9 -->
        <td<?= $Page->HMG9->cellAttributes() ?>>
<span<?= $Page->HMG9->viewAttributes() ?>>
<?= $Page->HMG9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG10->Visible) { // HMG10 ?>
        <!-- HMG10 -->
        <td<?= $Page->HMG10->cellAttributes() ?>>
<span<?= $Page->HMG10->viewAttributes() ?>>
<?= $Page->HMG10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG11->Visible) { // HMG11 ?>
        <!-- HMG11 -->
        <td<?= $Page->HMG11->cellAttributes() ?>>
<span<?= $Page->HMG11->viewAttributes() ?>>
<?= $Page->HMG11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG12->Visible) { // HMG12 ?>
        <!-- HMG12 -->
        <td<?= $Page->HMG12->cellAttributes() ?>>
<span<?= $Page->HMG12->viewAttributes() ?>>
<?= $Page->HMG12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG13->Visible) { // HMG13 ?>
        <!-- HMG13 -->
        <td<?= $Page->HMG13->cellAttributes() ?>>
<span<?= $Page->HMG13->viewAttributes() ?>>
<?= $Page->HMG13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH1->Visible) { // GnRH1 ?>
        <!-- GnRH1 -->
        <td<?= $Page->GnRH1->cellAttributes() ?>>
<span<?= $Page->GnRH1->viewAttributes() ?>>
<?= $Page->GnRH1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH2->Visible) { // GnRH2 ?>
        <!-- GnRH2 -->
        <td<?= $Page->GnRH2->cellAttributes() ?>>
<span<?= $Page->GnRH2->viewAttributes() ?>>
<?= $Page->GnRH2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH3->Visible) { // GnRH3 ?>
        <!-- GnRH3 -->
        <td<?= $Page->GnRH3->cellAttributes() ?>>
<span<?= $Page->GnRH3->viewAttributes() ?>>
<?= $Page->GnRH3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH4->Visible) { // GnRH4 ?>
        <!-- GnRH4 -->
        <td<?= $Page->GnRH4->cellAttributes() ?>>
<span<?= $Page->GnRH4->viewAttributes() ?>>
<?= $Page->GnRH4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH5->Visible) { // GnRH5 ?>
        <!-- GnRH5 -->
        <td<?= $Page->GnRH5->cellAttributes() ?>>
<span<?= $Page->GnRH5->viewAttributes() ?>>
<?= $Page->GnRH5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH6->Visible) { // GnRH6 ?>
        <!-- GnRH6 -->
        <td<?= $Page->GnRH6->cellAttributes() ?>>
<span<?= $Page->GnRH6->viewAttributes() ?>>
<?= $Page->GnRH6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH7->Visible) { // GnRH7 ?>
        <!-- GnRH7 -->
        <td<?= $Page->GnRH7->cellAttributes() ?>>
<span<?= $Page->GnRH7->viewAttributes() ?>>
<?= $Page->GnRH7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH8->Visible) { // GnRH8 ?>
        <!-- GnRH8 -->
        <td<?= $Page->GnRH8->cellAttributes() ?>>
<span<?= $Page->GnRH8->viewAttributes() ?>>
<?= $Page->GnRH8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH9->Visible) { // GnRH9 ?>
        <!-- GnRH9 -->
        <td<?= $Page->GnRH9->cellAttributes() ?>>
<span<?= $Page->GnRH9->viewAttributes() ?>>
<?= $Page->GnRH9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH10->Visible) { // GnRH10 ?>
        <!-- GnRH10 -->
        <td<?= $Page->GnRH10->cellAttributes() ?>>
<span<?= $Page->GnRH10->viewAttributes() ?>>
<?= $Page->GnRH10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH11->Visible) { // GnRH11 ?>
        <!-- GnRH11 -->
        <td<?= $Page->GnRH11->cellAttributes() ?>>
<span<?= $Page->GnRH11->viewAttributes() ?>>
<?= $Page->GnRH11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH12->Visible) { // GnRH12 ?>
        <!-- GnRH12 -->
        <td<?= $Page->GnRH12->cellAttributes() ?>>
<span<?= $Page->GnRH12->viewAttributes() ?>>
<?= $Page->GnRH12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH13->Visible) { // GnRH13 ?>
        <!-- GnRH13 -->
        <td<?= $Page->GnRH13->cellAttributes() ?>>
<span<?= $Page->GnRH13->viewAttributes() ?>>
<?= $Page->GnRH13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E21->Visible) { // E21 ?>
        <!-- E21 -->
        <td<?= $Page->E21->cellAttributes() ?>>
<span<?= $Page->E21->viewAttributes() ?>>
<?= $Page->E21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E22->Visible) { // E22 ?>
        <!-- E22 -->
        <td<?= $Page->E22->cellAttributes() ?>>
<span<?= $Page->E22->viewAttributes() ?>>
<?= $Page->E22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E23->Visible) { // E23 ?>
        <!-- E23 -->
        <td<?= $Page->E23->cellAttributes() ?>>
<span<?= $Page->E23->viewAttributes() ?>>
<?= $Page->E23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E24->Visible) { // E24 ?>
        <!-- E24 -->
        <td<?= $Page->E24->cellAttributes() ?>>
<span<?= $Page->E24->viewAttributes() ?>>
<?= $Page->E24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E25->Visible) { // E25 ?>
        <!-- E25 -->
        <td<?= $Page->E25->cellAttributes() ?>>
<span<?= $Page->E25->viewAttributes() ?>>
<?= $Page->E25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E26->Visible) { // E26 ?>
        <!-- E26 -->
        <td<?= $Page->E26->cellAttributes() ?>>
<span<?= $Page->E26->viewAttributes() ?>>
<?= $Page->E26->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E27->Visible) { // E27 ?>
        <!-- E27 -->
        <td<?= $Page->E27->cellAttributes() ?>>
<span<?= $Page->E27->viewAttributes() ?>>
<?= $Page->E27->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E28->Visible) { // E28 ?>
        <!-- E28 -->
        <td<?= $Page->E28->cellAttributes() ?>>
<span<?= $Page->E28->viewAttributes() ?>>
<?= $Page->E28->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E29->Visible) { // E29 ?>
        <!-- E29 -->
        <td<?= $Page->E29->cellAttributes() ?>>
<span<?= $Page->E29->viewAttributes() ?>>
<?= $Page->E29->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E210->Visible) { // E210 ?>
        <!-- E210 -->
        <td<?= $Page->E210->cellAttributes() ?>>
<span<?= $Page->E210->viewAttributes() ?>>
<?= $Page->E210->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E211->Visible) { // E211 ?>
        <!-- E211 -->
        <td<?= $Page->E211->cellAttributes() ?>>
<span<?= $Page->E211->viewAttributes() ?>>
<?= $Page->E211->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E212->Visible) { // E212 ?>
        <!-- E212 -->
        <td<?= $Page->E212->cellAttributes() ?>>
<span<?= $Page->E212->viewAttributes() ?>>
<?= $Page->E212->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E213->Visible) { // E213 ?>
        <!-- E213 -->
        <td<?= $Page->E213->cellAttributes() ?>>
<span<?= $Page->E213->viewAttributes() ?>>
<?= $Page->E213->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P41->Visible) { // P41 ?>
        <!-- P41 -->
        <td<?= $Page->P41->cellAttributes() ?>>
<span<?= $Page->P41->viewAttributes() ?>>
<?= $Page->P41->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P42->Visible) { // P42 ?>
        <!-- P42 -->
        <td<?= $Page->P42->cellAttributes() ?>>
<span<?= $Page->P42->viewAttributes() ?>>
<?= $Page->P42->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P43->Visible) { // P43 ?>
        <!-- P43 -->
        <td<?= $Page->P43->cellAttributes() ?>>
<span<?= $Page->P43->viewAttributes() ?>>
<?= $Page->P43->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P44->Visible) { // P44 ?>
        <!-- P44 -->
        <td<?= $Page->P44->cellAttributes() ?>>
<span<?= $Page->P44->viewAttributes() ?>>
<?= $Page->P44->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P45->Visible) { // P45 ?>
        <!-- P45 -->
        <td<?= $Page->P45->cellAttributes() ?>>
<span<?= $Page->P45->viewAttributes() ?>>
<?= $Page->P45->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P46->Visible) { // P46 ?>
        <!-- P46 -->
        <td<?= $Page->P46->cellAttributes() ?>>
<span<?= $Page->P46->viewAttributes() ?>>
<?= $Page->P46->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P47->Visible) { // P47 ?>
        <!-- P47 -->
        <td<?= $Page->P47->cellAttributes() ?>>
<span<?= $Page->P47->viewAttributes() ?>>
<?= $Page->P47->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P48->Visible) { // P48 ?>
        <!-- P48 -->
        <td<?= $Page->P48->cellAttributes() ?>>
<span<?= $Page->P48->viewAttributes() ?>>
<?= $Page->P48->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P49->Visible) { // P49 ?>
        <!-- P49 -->
        <td<?= $Page->P49->cellAttributes() ?>>
<span<?= $Page->P49->viewAttributes() ?>>
<?= $Page->P49->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P410->Visible) { // P410 ?>
        <!-- P410 -->
        <td<?= $Page->P410->cellAttributes() ?>>
<span<?= $Page->P410->viewAttributes() ?>>
<?= $Page->P410->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P411->Visible) { // P411 ?>
        <!-- P411 -->
        <td<?= $Page->P411->cellAttributes() ?>>
<span<?= $Page->P411->viewAttributes() ?>>
<?= $Page->P411->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P412->Visible) { // P412 ?>
        <!-- P412 -->
        <td<?= $Page->P412->cellAttributes() ?>>
<span<?= $Page->P412->viewAttributes() ?>>
<?= $Page->P412->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P413->Visible) { // P413 ?>
        <!-- P413 -->
        <td<?= $Page->P413->cellAttributes() ?>>
<span<?= $Page->P413->viewAttributes() ?>>
<?= $Page->P413->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt1->Visible) { // USGRt1 ?>
        <!-- USGRt1 -->
        <td<?= $Page->USGRt1->cellAttributes() ?>>
<span<?= $Page->USGRt1->viewAttributes() ?>>
<?= $Page->USGRt1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt2->Visible) { // USGRt2 ?>
        <!-- USGRt2 -->
        <td<?= $Page->USGRt2->cellAttributes() ?>>
<span<?= $Page->USGRt2->viewAttributes() ?>>
<?= $Page->USGRt2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt3->Visible) { // USGRt3 ?>
        <!-- USGRt3 -->
        <td<?= $Page->USGRt3->cellAttributes() ?>>
<span<?= $Page->USGRt3->viewAttributes() ?>>
<?= $Page->USGRt3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt4->Visible) { // USGRt4 ?>
        <!-- USGRt4 -->
        <td<?= $Page->USGRt4->cellAttributes() ?>>
<span<?= $Page->USGRt4->viewAttributes() ?>>
<?= $Page->USGRt4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt5->Visible) { // USGRt5 ?>
        <!-- USGRt5 -->
        <td<?= $Page->USGRt5->cellAttributes() ?>>
<span<?= $Page->USGRt5->viewAttributes() ?>>
<?= $Page->USGRt5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt6->Visible) { // USGRt6 ?>
        <!-- USGRt6 -->
        <td<?= $Page->USGRt6->cellAttributes() ?>>
<span<?= $Page->USGRt6->viewAttributes() ?>>
<?= $Page->USGRt6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt7->Visible) { // USGRt7 ?>
        <!-- USGRt7 -->
        <td<?= $Page->USGRt7->cellAttributes() ?>>
<span<?= $Page->USGRt7->viewAttributes() ?>>
<?= $Page->USGRt7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt8->Visible) { // USGRt8 ?>
        <!-- USGRt8 -->
        <td<?= $Page->USGRt8->cellAttributes() ?>>
<span<?= $Page->USGRt8->viewAttributes() ?>>
<?= $Page->USGRt8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt9->Visible) { // USGRt9 ?>
        <!-- USGRt9 -->
        <td<?= $Page->USGRt9->cellAttributes() ?>>
<span<?= $Page->USGRt9->viewAttributes() ?>>
<?= $Page->USGRt9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt10->Visible) { // USGRt10 ?>
        <!-- USGRt10 -->
        <td<?= $Page->USGRt10->cellAttributes() ?>>
<span<?= $Page->USGRt10->viewAttributes() ?>>
<?= $Page->USGRt10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt11->Visible) { // USGRt11 ?>
        <!-- USGRt11 -->
        <td<?= $Page->USGRt11->cellAttributes() ?>>
<span<?= $Page->USGRt11->viewAttributes() ?>>
<?= $Page->USGRt11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt12->Visible) { // USGRt12 ?>
        <!-- USGRt12 -->
        <td<?= $Page->USGRt12->cellAttributes() ?>>
<span<?= $Page->USGRt12->viewAttributes() ?>>
<?= $Page->USGRt12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt13->Visible) { // USGRt13 ?>
        <!-- USGRt13 -->
        <td<?= $Page->USGRt13->cellAttributes() ?>>
<span<?= $Page->USGRt13->viewAttributes() ?>>
<?= $Page->USGRt13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt1->Visible) { // USGLt1 ?>
        <!-- USGLt1 -->
        <td<?= $Page->USGLt1->cellAttributes() ?>>
<span<?= $Page->USGLt1->viewAttributes() ?>>
<?= $Page->USGLt1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt2->Visible) { // USGLt2 ?>
        <!-- USGLt2 -->
        <td<?= $Page->USGLt2->cellAttributes() ?>>
<span<?= $Page->USGLt2->viewAttributes() ?>>
<?= $Page->USGLt2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt3->Visible) { // USGLt3 ?>
        <!-- USGLt3 -->
        <td<?= $Page->USGLt3->cellAttributes() ?>>
<span<?= $Page->USGLt3->viewAttributes() ?>>
<?= $Page->USGLt3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt4->Visible) { // USGLt4 ?>
        <!-- USGLt4 -->
        <td<?= $Page->USGLt4->cellAttributes() ?>>
<span<?= $Page->USGLt4->viewAttributes() ?>>
<?= $Page->USGLt4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt5->Visible) { // USGLt5 ?>
        <!-- USGLt5 -->
        <td<?= $Page->USGLt5->cellAttributes() ?>>
<span<?= $Page->USGLt5->viewAttributes() ?>>
<?= $Page->USGLt5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt6->Visible) { // USGLt6 ?>
        <!-- USGLt6 -->
        <td<?= $Page->USGLt6->cellAttributes() ?>>
<span<?= $Page->USGLt6->viewAttributes() ?>>
<?= $Page->USGLt6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt7->Visible) { // USGLt7 ?>
        <!-- USGLt7 -->
        <td<?= $Page->USGLt7->cellAttributes() ?>>
<span<?= $Page->USGLt7->viewAttributes() ?>>
<?= $Page->USGLt7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt8->Visible) { // USGLt8 ?>
        <!-- USGLt8 -->
        <td<?= $Page->USGLt8->cellAttributes() ?>>
<span<?= $Page->USGLt8->viewAttributes() ?>>
<?= $Page->USGLt8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt9->Visible) { // USGLt9 ?>
        <!-- USGLt9 -->
        <td<?= $Page->USGLt9->cellAttributes() ?>>
<span<?= $Page->USGLt9->viewAttributes() ?>>
<?= $Page->USGLt9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt10->Visible) { // USGLt10 ?>
        <!-- USGLt10 -->
        <td<?= $Page->USGLt10->cellAttributes() ?>>
<span<?= $Page->USGLt10->viewAttributes() ?>>
<?= $Page->USGLt10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt11->Visible) { // USGLt11 ?>
        <!-- USGLt11 -->
        <td<?= $Page->USGLt11->cellAttributes() ?>>
<span<?= $Page->USGLt11->viewAttributes() ?>>
<?= $Page->USGLt11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt12->Visible) { // USGLt12 ?>
        <!-- USGLt12 -->
        <td<?= $Page->USGLt12->cellAttributes() ?>>
<span<?= $Page->USGLt12->viewAttributes() ?>>
<?= $Page->USGLt12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt13->Visible) { // USGLt13 ?>
        <!-- USGLt13 -->
        <td<?= $Page->USGLt13->cellAttributes() ?>>
<span<?= $Page->USGLt13->viewAttributes() ?>>
<?= $Page->USGLt13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM1->Visible) { // EM1 ?>
        <!-- EM1 -->
        <td<?= $Page->EM1->cellAttributes() ?>>
<span<?= $Page->EM1->viewAttributes() ?>>
<?= $Page->EM1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM2->Visible) { // EM2 ?>
        <!-- EM2 -->
        <td<?= $Page->EM2->cellAttributes() ?>>
<span<?= $Page->EM2->viewAttributes() ?>>
<?= $Page->EM2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM3->Visible) { // EM3 ?>
        <!-- EM3 -->
        <td<?= $Page->EM3->cellAttributes() ?>>
<span<?= $Page->EM3->viewAttributes() ?>>
<?= $Page->EM3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM4->Visible) { // EM4 ?>
        <!-- EM4 -->
        <td<?= $Page->EM4->cellAttributes() ?>>
<span<?= $Page->EM4->viewAttributes() ?>>
<?= $Page->EM4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM5->Visible) { // EM5 ?>
        <!-- EM5 -->
        <td<?= $Page->EM5->cellAttributes() ?>>
<span<?= $Page->EM5->viewAttributes() ?>>
<?= $Page->EM5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM6->Visible) { // EM6 ?>
        <!-- EM6 -->
        <td<?= $Page->EM6->cellAttributes() ?>>
<span<?= $Page->EM6->viewAttributes() ?>>
<?= $Page->EM6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM7->Visible) { // EM7 ?>
        <!-- EM7 -->
        <td<?= $Page->EM7->cellAttributes() ?>>
<span<?= $Page->EM7->viewAttributes() ?>>
<?= $Page->EM7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM8->Visible) { // EM8 ?>
        <!-- EM8 -->
        <td<?= $Page->EM8->cellAttributes() ?>>
<span<?= $Page->EM8->viewAttributes() ?>>
<?= $Page->EM8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM9->Visible) { // EM9 ?>
        <!-- EM9 -->
        <td<?= $Page->EM9->cellAttributes() ?>>
<span<?= $Page->EM9->viewAttributes() ?>>
<?= $Page->EM9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM10->Visible) { // EM10 ?>
        <!-- EM10 -->
        <td<?= $Page->EM10->cellAttributes() ?>>
<span<?= $Page->EM10->viewAttributes() ?>>
<?= $Page->EM10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM11->Visible) { // EM11 ?>
        <!-- EM11 -->
        <td<?= $Page->EM11->cellAttributes() ?>>
<span<?= $Page->EM11->viewAttributes() ?>>
<?= $Page->EM11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM12->Visible) { // EM12 ?>
        <!-- EM12 -->
        <td<?= $Page->EM12->cellAttributes() ?>>
<span<?= $Page->EM12->viewAttributes() ?>>
<?= $Page->EM12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM13->Visible) { // EM13 ?>
        <!-- EM13 -->
        <td<?= $Page->EM13->cellAttributes() ?>>
<span<?= $Page->EM13->viewAttributes() ?>>
<?= $Page->EM13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
        <!-- Others1 -->
        <td<?= $Page->Others1->cellAttributes() ?>>
<span<?= $Page->Others1->viewAttributes() ?>>
<?= $Page->Others1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
        <!-- Others2 -->
        <td<?= $Page->Others2->cellAttributes() ?>>
<span<?= $Page->Others2->viewAttributes() ?>>
<?= $Page->Others2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others3->Visible) { // Others3 ?>
        <!-- Others3 -->
        <td<?= $Page->Others3->cellAttributes() ?>>
<span<?= $Page->Others3->viewAttributes() ?>>
<?= $Page->Others3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others4->Visible) { // Others4 ?>
        <!-- Others4 -->
        <td<?= $Page->Others4->cellAttributes() ?>>
<span<?= $Page->Others4->viewAttributes() ?>>
<?= $Page->Others4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others5->Visible) { // Others5 ?>
        <!-- Others5 -->
        <td<?= $Page->Others5->cellAttributes() ?>>
<span<?= $Page->Others5->viewAttributes() ?>>
<?= $Page->Others5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others6->Visible) { // Others6 ?>
        <!-- Others6 -->
        <td<?= $Page->Others6->cellAttributes() ?>>
<span<?= $Page->Others6->viewAttributes() ?>>
<?= $Page->Others6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others7->Visible) { // Others7 ?>
        <!-- Others7 -->
        <td<?= $Page->Others7->cellAttributes() ?>>
<span<?= $Page->Others7->viewAttributes() ?>>
<?= $Page->Others7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others8->Visible) { // Others8 ?>
        <!-- Others8 -->
        <td<?= $Page->Others8->cellAttributes() ?>>
<span<?= $Page->Others8->viewAttributes() ?>>
<?= $Page->Others8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others9->Visible) { // Others9 ?>
        <!-- Others9 -->
        <td<?= $Page->Others9->cellAttributes() ?>>
<span<?= $Page->Others9->viewAttributes() ?>>
<?= $Page->Others9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others10->Visible) { // Others10 ?>
        <!-- Others10 -->
        <td<?= $Page->Others10->cellAttributes() ?>>
<span<?= $Page->Others10->viewAttributes() ?>>
<?= $Page->Others10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others11->Visible) { // Others11 ?>
        <!-- Others11 -->
        <td<?= $Page->Others11->cellAttributes() ?>>
<span<?= $Page->Others11->viewAttributes() ?>>
<?= $Page->Others11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others12->Visible) { // Others12 ?>
        <!-- Others12 -->
        <td<?= $Page->Others12->cellAttributes() ?>>
<span<?= $Page->Others12->viewAttributes() ?>>
<?= $Page->Others12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others13->Visible) { // Others13 ?>
        <!-- Others13 -->
        <td<?= $Page->Others13->cellAttributes() ?>>
<span<?= $Page->Others13->viewAttributes() ?>>
<?= $Page->Others13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR1->Visible) { // DR1 ?>
        <!-- DR1 -->
        <td<?= $Page->DR1->cellAttributes() ?>>
<span<?= $Page->DR1->viewAttributes() ?>>
<?= $Page->DR1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR2->Visible) { // DR2 ?>
        <!-- DR2 -->
        <td<?= $Page->DR2->cellAttributes() ?>>
<span<?= $Page->DR2->viewAttributes() ?>>
<?= $Page->DR2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR3->Visible) { // DR3 ?>
        <!-- DR3 -->
        <td<?= $Page->DR3->cellAttributes() ?>>
<span<?= $Page->DR3->viewAttributes() ?>>
<?= $Page->DR3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR4->Visible) { // DR4 ?>
        <!-- DR4 -->
        <td<?= $Page->DR4->cellAttributes() ?>>
<span<?= $Page->DR4->viewAttributes() ?>>
<?= $Page->DR4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR5->Visible) { // DR5 ?>
        <!-- DR5 -->
        <td<?= $Page->DR5->cellAttributes() ?>>
<span<?= $Page->DR5->viewAttributes() ?>>
<?= $Page->DR5->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR6->Visible) { // DR6 ?>
        <!-- DR6 -->
        <td<?= $Page->DR6->cellAttributes() ?>>
<span<?= $Page->DR6->viewAttributes() ?>>
<?= $Page->DR6->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR7->Visible) { // DR7 ?>
        <!-- DR7 -->
        <td<?= $Page->DR7->cellAttributes() ?>>
<span<?= $Page->DR7->viewAttributes() ?>>
<?= $Page->DR7->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR8->Visible) { // DR8 ?>
        <!-- DR8 -->
        <td<?= $Page->DR8->cellAttributes() ?>>
<span<?= $Page->DR8->viewAttributes() ?>>
<?= $Page->DR8->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR9->Visible) { // DR9 ?>
        <!-- DR9 -->
        <td<?= $Page->DR9->cellAttributes() ?>>
<span<?= $Page->DR9->viewAttributes() ?>>
<?= $Page->DR9->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR10->Visible) { // DR10 ?>
        <!-- DR10 -->
        <td<?= $Page->DR10->cellAttributes() ?>>
<span<?= $Page->DR10->viewAttributes() ?>>
<?= $Page->DR10->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR11->Visible) { // DR11 ?>
        <!-- DR11 -->
        <td<?= $Page->DR11->cellAttributes() ?>>
<span<?= $Page->DR11->viewAttributes() ?>>
<?= $Page->DR11->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR12->Visible) { // DR12 ?>
        <!-- DR12 -->
        <td<?= $Page->DR12->cellAttributes() ?>>
<span<?= $Page->DR12->viewAttributes() ?>>
<?= $Page->DR12->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR13->Visible) { // DR13 ?>
        <!-- DR13 -->
        <td<?= $Page->DR13->cellAttributes() ?>>
<span<?= $Page->DR13->viewAttributes() ?>>
<?= $Page->DR13->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <!-- TidNo -->
        <td<?= $Page->TidNo->cellAttributes() ?>>
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Convert->Visible) { // Convert ?>
        <!-- Convert -->
        <td<?= $Page->Convert->cellAttributes() ?>>
<span<?= $Page->Convert->viewAttributes() ?>>
<?= $Page->Convert->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Consultant->Visible) { // Consultant ?>
        <!-- Consultant -->
        <td<?= $Page->Consultant->cellAttributes() ?>>
<span<?= $Page->Consultant->viewAttributes() ?>>
<?= $Page->Consultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->InseminatinTechnique->Visible) { // InseminatinTechnique ?>
        <!-- InseminatinTechnique -->
        <td<?= $Page->InseminatinTechnique->cellAttributes() ?>>
<span<?= $Page->InseminatinTechnique->viewAttributes() ?>>
<?= $Page->InseminatinTechnique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IndicationForART->Visible) { // IndicationForART ?>
        <!-- IndicationForART -->
        <td<?= $Page->IndicationForART->cellAttributes() ?>>
<span<?= $Page->IndicationForART->viewAttributes() ?>>
<?= $Page->IndicationForART->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Hysteroscopy->Visible) { // Hysteroscopy ?>
        <!-- Hysteroscopy -->
        <td<?= $Page->Hysteroscopy->cellAttributes() ?>>
<span<?= $Page->Hysteroscopy->viewAttributes() ?>>
<?= $Page->Hysteroscopy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EndometrialScratching->Visible) { // EndometrialScratching ?>
        <!-- EndometrialScratching -->
        <td<?= $Page->EndometrialScratching->cellAttributes() ?>>
<span<?= $Page->EndometrialScratching->viewAttributes() ?>>
<?= $Page->EndometrialScratching->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TrialCannulation->Visible) { // TrialCannulation ?>
        <!-- TrialCannulation -->
        <td<?= $Page->TrialCannulation->cellAttributes() ?>>
<span<?= $Page->TrialCannulation->viewAttributes() ?>>
<?= $Page->TrialCannulation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CYCLETYPE->Visible) { // CYCLETYPE ?>
        <!-- CYCLETYPE -->
        <td<?= $Page->CYCLETYPE->cellAttributes() ?>>
<span<?= $Page->CYCLETYPE->viewAttributes() ?>>
<?= $Page->CYCLETYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HRTCYCLE->Visible) { // HRTCYCLE ?>
        <!-- HRTCYCLE -->
        <td<?= $Page->HRTCYCLE->cellAttributes() ?>>
<span<?= $Page->HRTCYCLE->viewAttributes() ?>>
<?= $Page->HRTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OralEstrogenDosage->Visible) { // OralEstrogenDosage ?>
        <!-- OralEstrogenDosage -->
        <td<?= $Page->OralEstrogenDosage->cellAttributes() ?>>
<span<?= $Page->OralEstrogenDosage->viewAttributes() ?>>
<?= $Page->OralEstrogenDosage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->VaginalEstrogen->Visible) { // VaginalEstrogen ?>
        <!-- VaginalEstrogen -->
        <td<?= $Page->VaginalEstrogen->cellAttributes() ?>>
<span<?= $Page->VaginalEstrogen->viewAttributes() ?>>
<?= $Page->VaginalEstrogen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GCSF->Visible) { // GCSF ?>
        <!-- GCSF -->
        <td<?= $Page->GCSF->cellAttributes() ?>>
<span<?= $Page->GCSF->viewAttributes() ?>>
<?= $Page->GCSF->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ActivatedPRP->Visible) { // ActivatedPRP ?>
        <!-- ActivatedPRP -->
        <td<?= $Page->ActivatedPRP->cellAttributes() ?>>
<span<?= $Page->ActivatedPRP->viewAttributes() ?>>
<?= $Page->ActivatedPRP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->UCLcm->Visible) { // UCLcm ?>
        <!-- UCLcm -->
        <td<?= $Page->UCLcm->cellAttributes() ?>>
<span<?= $Page->UCLcm->viewAttributes() ?>>
<?= $Page->UCLcm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DATOFEMBRYOTRANSFER->Visible) { // DATOFEMBRYOTRANSFER ?>
        <!-- DATOFEMBRYOTRANSFER -->
        <td<?= $Page->DATOFEMBRYOTRANSFER->cellAttributes() ?>>
<span<?= $Page->DATOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DATOFEMBRYOTRANSFER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOTRANSFER->Visible) { // DAYOFEMBRYOTRANSFER ?>
        <!-- DAYOFEMBRYOTRANSFER -->
        <td<?= $Page->DAYOFEMBRYOTRANSFER->cellAttributes() ?>>
<span<?= $Page->DAYOFEMBRYOTRANSFER->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOTRANSFER->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTHAWED->Visible) { // NOOFEMBRYOSTHAWED ?>
        <!-- NOOFEMBRYOSTHAWED -->
        <td<?= $Page->NOOFEMBRYOSTHAWED->cellAttributes() ?>>
<span<?= $Page->NOOFEMBRYOSTHAWED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTHAWED->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NOOFEMBRYOSTRANSFERRED->Visible) { // NOOFEMBRYOSTRANSFERRED ?>
        <!-- NOOFEMBRYOSTRANSFERRED -->
        <td<?= $Page->NOOFEMBRYOSTRANSFERRED->cellAttributes() ?>>
<span<?= $Page->NOOFEMBRYOSTRANSFERRED->viewAttributes() ?>>
<?= $Page->NOOFEMBRYOSTRANSFERRED->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DAYOFEMBRYOS->Visible) { // DAYOFEMBRYOS ?>
        <!-- DAYOFEMBRYOS -->
        <td<?= $Page->DAYOFEMBRYOS->cellAttributes() ?>>
<span<?= $Page->DAYOFEMBRYOS->viewAttributes() ?>>
<?= $Page->DAYOFEMBRYOS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CRYOPRESERVEDEMBRYOS->Visible) { // CRYOPRESERVEDEMBRYOS ?>
        <!-- CRYOPRESERVEDEMBRYOS -->
        <td<?= $Page->CRYOPRESERVEDEMBRYOS->cellAttributes() ?>>
<span<?= $Page->CRYOPRESERVEDEMBRYOS->viewAttributes() ?>>
<?= $Page->CRYOPRESERVEDEMBRYOS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ViaAdmin->Visible) { // ViaAdmin ?>
        <!-- ViaAdmin -->
        <td<?= $Page->ViaAdmin->cellAttributes() ?>>
<span<?= $Page->ViaAdmin->viewAttributes() ?>>
<?= $Page->ViaAdmin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ViaStartDateTime->Visible) { // ViaStartDateTime ?>
        <!-- ViaStartDateTime -->
        <td<?= $Page->ViaStartDateTime->cellAttributes() ?>>
<span<?= $Page->ViaStartDateTime->viewAttributes() ?>>
<?= $Page->ViaStartDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ViaDose->Visible) { // ViaDose ?>
        <!-- ViaDose -->
        <td<?= $Page->ViaDose->cellAttributes() ?>>
<span<?= $Page->ViaDose->viewAttributes() ?>>
<?= $Page->ViaDose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AllFreeze->Visible) { // AllFreeze ?>
        <!-- AllFreeze -->
        <td<?= $Page->AllFreeze->cellAttributes() ?>>
<span<?= $Page->AllFreeze->viewAttributes() ?>>
<?= $Page->AllFreeze->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TreatmentCancel->Visible) { // TreatmentCancel ?>
        <!-- TreatmentCancel -->
        <td<?= $Page->TreatmentCancel->cellAttributes() ?>>
<span<?= $Page->TreatmentCancel->viewAttributes() ?>>
<?= $Page->TreatmentCancel->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProgesteroneAdmin->Visible) { // ProgesteroneAdmin ?>
        <!-- ProgesteroneAdmin -->
        <td<?= $Page->ProgesteroneAdmin->cellAttributes() ?>>
<span<?= $Page->ProgesteroneAdmin->viewAttributes() ?>>
<?= $Page->ProgesteroneAdmin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProgesteroneStart->Visible) { // ProgesteroneStart ?>
        <!-- ProgesteroneStart -->
        <td<?= $Page->ProgesteroneStart->cellAttributes() ?>>
<span<?= $Page->ProgesteroneStart->viewAttributes() ?>>
<?= $Page->ProgesteroneStart->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ProgesteroneDose->Visible) { // ProgesteroneDose ?>
        <!-- ProgesteroneDose -->
        <td<?= $Page->ProgesteroneDose->cellAttributes() ?>>
<span<?= $Page->ProgesteroneDose->viewAttributes() ?>>
<?= $Page->ProgesteroneDose->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate14->Visible) { // StChDate14 ?>
        <!-- StChDate14 -->
        <td<?= $Page->StChDate14->cellAttributes() ?>>
<span<?= $Page->StChDate14->viewAttributes() ?>>
<?= $Page->StChDate14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate15->Visible) { // StChDate15 ?>
        <!-- StChDate15 -->
        <td<?= $Page->StChDate15->cellAttributes() ?>>
<span<?= $Page->StChDate15->viewAttributes() ?>>
<?= $Page->StChDate15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate16->Visible) { // StChDate16 ?>
        <!-- StChDate16 -->
        <td<?= $Page->StChDate16->cellAttributes() ?>>
<span<?= $Page->StChDate16->viewAttributes() ?>>
<?= $Page->StChDate16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate17->Visible) { // StChDate17 ?>
        <!-- StChDate17 -->
        <td<?= $Page->StChDate17->cellAttributes() ?>>
<span<?= $Page->StChDate17->viewAttributes() ?>>
<?= $Page->StChDate17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate18->Visible) { // StChDate18 ?>
        <!-- StChDate18 -->
        <td<?= $Page->StChDate18->cellAttributes() ?>>
<span<?= $Page->StChDate18->viewAttributes() ?>>
<?= $Page->StChDate18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate19->Visible) { // StChDate19 ?>
        <!-- StChDate19 -->
        <td<?= $Page->StChDate19->cellAttributes() ?>>
<span<?= $Page->StChDate19->viewAttributes() ?>>
<?= $Page->StChDate19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate20->Visible) { // StChDate20 ?>
        <!-- StChDate20 -->
        <td<?= $Page->StChDate20->cellAttributes() ?>>
<span<?= $Page->StChDate20->viewAttributes() ?>>
<?= $Page->StChDate20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate21->Visible) { // StChDate21 ?>
        <!-- StChDate21 -->
        <td<?= $Page->StChDate21->cellAttributes() ?>>
<span<?= $Page->StChDate21->viewAttributes() ?>>
<?= $Page->StChDate21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate22->Visible) { // StChDate22 ?>
        <!-- StChDate22 -->
        <td<?= $Page->StChDate22->cellAttributes() ?>>
<span<?= $Page->StChDate22->viewAttributes() ?>>
<?= $Page->StChDate22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate23->Visible) { // StChDate23 ?>
        <!-- StChDate23 -->
        <td<?= $Page->StChDate23->cellAttributes() ?>>
<span<?= $Page->StChDate23->viewAttributes() ?>>
<?= $Page->StChDate23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate24->Visible) { // StChDate24 ?>
        <!-- StChDate24 -->
        <td<?= $Page->StChDate24->cellAttributes() ?>>
<span<?= $Page->StChDate24->viewAttributes() ?>>
<?= $Page->StChDate24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StChDate25->Visible) { // StChDate25 ?>
        <!-- StChDate25 -->
        <td<?= $Page->StChDate25->cellAttributes() ?>>
<span<?= $Page->StChDate25->viewAttributes() ?>>
<?= $Page->StChDate25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay14->Visible) { // CycleDay14 ?>
        <!-- CycleDay14 -->
        <td<?= $Page->CycleDay14->cellAttributes() ?>>
<span<?= $Page->CycleDay14->viewAttributes() ?>>
<?= $Page->CycleDay14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay15->Visible) { // CycleDay15 ?>
        <!-- CycleDay15 -->
        <td<?= $Page->CycleDay15->cellAttributes() ?>>
<span<?= $Page->CycleDay15->viewAttributes() ?>>
<?= $Page->CycleDay15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay16->Visible) { // CycleDay16 ?>
        <!-- CycleDay16 -->
        <td<?= $Page->CycleDay16->cellAttributes() ?>>
<span<?= $Page->CycleDay16->viewAttributes() ?>>
<?= $Page->CycleDay16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay17->Visible) { // CycleDay17 ?>
        <!-- CycleDay17 -->
        <td<?= $Page->CycleDay17->cellAttributes() ?>>
<span<?= $Page->CycleDay17->viewAttributes() ?>>
<?= $Page->CycleDay17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay18->Visible) { // CycleDay18 ?>
        <!-- CycleDay18 -->
        <td<?= $Page->CycleDay18->cellAttributes() ?>>
<span<?= $Page->CycleDay18->viewAttributes() ?>>
<?= $Page->CycleDay18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay19->Visible) { // CycleDay19 ?>
        <!-- CycleDay19 -->
        <td<?= $Page->CycleDay19->cellAttributes() ?>>
<span<?= $Page->CycleDay19->viewAttributes() ?>>
<?= $Page->CycleDay19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay20->Visible) { // CycleDay20 ?>
        <!-- CycleDay20 -->
        <td<?= $Page->CycleDay20->cellAttributes() ?>>
<span<?= $Page->CycleDay20->viewAttributes() ?>>
<?= $Page->CycleDay20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay21->Visible) { // CycleDay21 ?>
        <!-- CycleDay21 -->
        <td<?= $Page->CycleDay21->cellAttributes() ?>>
<span<?= $Page->CycleDay21->viewAttributes() ?>>
<?= $Page->CycleDay21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay22->Visible) { // CycleDay22 ?>
        <!-- CycleDay22 -->
        <td<?= $Page->CycleDay22->cellAttributes() ?>>
<span<?= $Page->CycleDay22->viewAttributes() ?>>
<?= $Page->CycleDay22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay23->Visible) { // CycleDay23 ?>
        <!-- CycleDay23 -->
        <td<?= $Page->CycleDay23->cellAttributes() ?>>
<span<?= $Page->CycleDay23->viewAttributes() ?>>
<?= $Page->CycleDay23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay24->Visible) { // CycleDay24 ?>
        <!-- CycleDay24 -->
        <td<?= $Page->CycleDay24->cellAttributes() ?>>
<span<?= $Page->CycleDay24->viewAttributes() ?>>
<?= $Page->CycleDay24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CycleDay25->Visible) { // CycleDay25 ?>
        <!-- CycleDay25 -->
        <td<?= $Page->CycleDay25->cellAttributes() ?>>
<span<?= $Page->CycleDay25->viewAttributes() ?>>
<?= $Page->CycleDay25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay14->Visible) { // StimulationDay14 ?>
        <!-- StimulationDay14 -->
        <td<?= $Page->StimulationDay14->cellAttributes() ?>>
<span<?= $Page->StimulationDay14->viewAttributes() ?>>
<?= $Page->StimulationDay14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay15->Visible) { // StimulationDay15 ?>
        <!-- StimulationDay15 -->
        <td<?= $Page->StimulationDay15->cellAttributes() ?>>
<span<?= $Page->StimulationDay15->viewAttributes() ?>>
<?= $Page->StimulationDay15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay16->Visible) { // StimulationDay16 ?>
        <!-- StimulationDay16 -->
        <td<?= $Page->StimulationDay16->cellAttributes() ?>>
<span<?= $Page->StimulationDay16->viewAttributes() ?>>
<?= $Page->StimulationDay16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay17->Visible) { // StimulationDay17 ?>
        <!-- StimulationDay17 -->
        <td<?= $Page->StimulationDay17->cellAttributes() ?>>
<span<?= $Page->StimulationDay17->viewAttributes() ?>>
<?= $Page->StimulationDay17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay18->Visible) { // StimulationDay18 ?>
        <!-- StimulationDay18 -->
        <td<?= $Page->StimulationDay18->cellAttributes() ?>>
<span<?= $Page->StimulationDay18->viewAttributes() ?>>
<?= $Page->StimulationDay18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay19->Visible) { // StimulationDay19 ?>
        <!-- StimulationDay19 -->
        <td<?= $Page->StimulationDay19->cellAttributes() ?>>
<span<?= $Page->StimulationDay19->viewAttributes() ?>>
<?= $Page->StimulationDay19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay20->Visible) { // StimulationDay20 ?>
        <!-- StimulationDay20 -->
        <td<?= $Page->StimulationDay20->cellAttributes() ?>>
<span<?= $Page->StimulationDay20->viewAttributes() ?>>
<?= $Page->StimulationDay20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay21->Visible) { // StimulationDay21 ?>
        <!-- StimulationDay21 -->
        <td<?= $Page->StimulationDay21->cellAttributes() ?>>
<span<?= $Page->StimulationDay21->viewAttributes() ?>>
<?= $Page->StimulationDay21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay22->Visible) { // StimulationDay22 ?>
        <!-- StimulationDay22 -->
        <td<?= $Page->StimulationDay22->cellAttributes() ?>>
<span<?= $Page->StimulationDay22->viewAttributes() ?>>
<?= $Page->StimulationDay22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay23->Visible) { // StimulationDay23 ?>
        <!-- StimulationDay23 -->
        <td<?= $Page->StimulationDay23->cellAttributes() ?>>
<span<?= $Page->StimulationDay23->viewAttributes() ?>>
<?= $Page->StimulationDay23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay24->Visible) { // StimulationDay24 ?>
        <!-- StimulationDay24 -->
        <td<?= $Page->StimulationDay24->cellAttributes() ?>>
<span<?= $Page->StimulationDay24->viewAttributes() ?>>
<?= $Page->StimulationDay24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->StimulationDay25->Visible) { // StimulationDay25 ?>
        <!-- StimulationDay25 -->
        <td<?= $Page->StimulationDay25->cellAttributes() ?>>
<span<?= $Page->StimulationDay25->viewAttributes() ?>>
<?= $Page->StimulationDay25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet14->Visible) { // Tablet14 ?>
        <!-- Tablet14 -->
        <td<?= $Page->Tablet14->cellAttributes() ?>>
<span<?= $Page->Tablet14->viewAttributes() ?>>
<?= $Page->Tablet14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet15->Visible) { // Tablet15 ?>
        <!-- Tablet15 -->
        <td<?= $Page->Tablet15->cellAttributes() ?>>
<span<?= $Page->Tablet15->viewAttributes() ?>>
<?= $Page->Tablet15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet16->Visible) { // Tablet16 ?>
        <!-- Tablet16 -->
        <td<?= $Page->Tablet16->cellAttributes() ?>>
<span<?= $Page->Tablet16->viewAttributes() ?>>
<?= $Page->Tablet16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet17->Visible) { // Tablet17 ?>
        <!-- Tablet17 -->
        <td<?= $Page->Tablet17->cellAttributes() ?>>
<span<?= $Page->Tablet17->viewAttributes() ?>>
<?= $Page->Tablet17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet18->Visible) { // Tablet18 ?>
        <!-- Tablet18 -->
        <td<?= $Page->Tablet18->cellAttributes() ?>>
<span<?= $Page->Tablet18->viewAttributes() ?>>
<?= $Page->Tablet18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet19->Visible) { // Tablet19 ?>
        <!-- Tablet19 -->
        <td<?= $Page->Tablet19->cellAttributes() ?>>
<span<?= $Page->Tablet19->viewAttributes() ?>>
<?= $Page->Tablet19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet20->Visible) { // Tablet20 ?>
        <!-- Tablet20 -->
        <td<?= $Page->Tablet20->cellAttributes() ?>>
<span<?= $Page->Tablet20->viewAttributes() ?>>
<?= $Page->Tablet20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet21->Visible) { // Tablet21 ?>
        <!-- Tablet21 -->
        <td<?= $Page->Tablet21->cellAttributes() ?>>
<span<?= $Page->Tablet21->viewAttributes() ?>>
<?= $Page->Tablet21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet22->Visible) { // Tablet22 ?>
        <!-- Tablet22 -->
        <td<?= $Page->Tablet22->cellAttributes() ?>>
<span<?= $Page->Tablet22->viewAttributes() ?>>
<?= $Page->Tablet22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet23->Visible) { // Tablet23 ?>
        <!-- Tablet23 -->
        <td<?= $Page->Tablet23->cellAttributes() ?>>
<span<?= $Page->Tablet23->viewAttributes() ?>>
<?= $Page->Tablet23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet24->Visible) { // Tablet24 ?>
        <!-- Tablet24 -->
        <td<?= $Page->Tablet24->cellAttributes() ?>>
<span<?= $Page->Tablet24->viewAttributes() ?>>
<?= $Page->Tablet24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Tablet25->Visible) { // Tablet25 ?>
        <!-- Tablet25 -->
        <td<?= $Page->Tablet25->cellAttributes() ?>>
<span<?= $Page->Tablet25->viewAttributes() ?>>
<?= $Page->Tablet25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH14->Visible) { // RFSH14 ?>
        <!-- RFSH14 -->
        <td<?= $Page->RFSH14->cellAttributes() ?>>
<span<?= $Page->RFSH14->viewAttributes() ?>>
<?= $Page->RFSH14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH15->Visible) { // RFSH15 ?>
        <!-- RFSH15 -->
        <td<?= $Page->RFSH15->cellAttributes() ?>>
<span<?= $Page->RFSH15->viewAttributes() ?>>
<?= $Page->RFSH15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH16->Visible) { // RFSH16 ?>
        <!-- RFSH16 -->
        <td<?= $Page->RFSH16->cellAttributes() ?>>
<span<?= $Page->RFSH16->viewAttributes() ?>>
<?= $Page->RFSH16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH17->Visible) { // RFSH17 ?>
        <!-- RFSH17 -->
        <td<?= $Page->RFSH17->cellAttributes() ?>>
<span<?= $Page->RFSH17->viewAttributes() ?>>
<?= $Page->RFSH17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH18->Visible) { // RFSH18 ?>
        <!-- RFSH18 -->
        <td<?= $Page->RFSH18->cellAttributes() ?>>
<span<?= $Page->RFSH18->viewAttributes() ?>>
<?= $Page->RFSH18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH19->Visible) { // RFSH19 ?>
        <!-- RFSH19 -->
        <td<?= $Page->RFSH19->cellAttributes() ?>>
<span<?= $Page->RFSH19->viewAttributes() ?>>
<?= $Page->RFSH19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH20->Visible) { // RFSH20 ?>
        <!-- RFSH20 -->
        <td<?= $Page->RFSH20->cellAttributes() ?>>
<span<?= $Page->RFSH20->viewAttributes() ?>>
<?= $Page->RFSH20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH21->Visible) { // RFSH21 ?>
        <!-- RFSH21 -->
        <td<?= $Page->RFSH21->cellAttributes() ?>>
<span<?= $Page->RFSH21->viewAttributes() ?>>
<?= $Page->RFSH21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH22->Visible) { // RFSH22 ?>
        <!-- RFSH22 -->
        <td<?= $Page->RFSH22->cellAttributes() ?>>
<span<?= $Page->RFSH22->viewAttributes() ?>>
<?= $Page->RFSH22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH23->Visible) { // RFSH23 ?>
        <!-- RFSH23 -->
        <td<?= $Page->RFSH23->cellAttributes() ?>>
<span<?= $Page->RFSH23->viewAttributes() ?>>
<?= $Page->RFSH23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH24->Visible) { // RFSH24 ?>
        <!-- RFSH24 -->
        <td<?= $Page->RFSH24->cellAttributes() ?>>
<span<?= $Page->RFSH24->viewAttributes() ?>>
<?= $Page->RFSH24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RFSH25->Visible) { // RFSH25 ?>
        <!-- RFSH25 -->
        <td<?= $Page->RFSH25->cellAttributes() ?>>
<span<?= $Page->RFSH25->viewAttributes() ?>>
<?= $Page->RFSH25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG14->Visible) { // HMG14 ?>
        <!-- HMG14 -->
        <td<?= $Page->HMG14->cellAttributes() ?>>
<span<?= $Page->HMG14->viewAttributes() ?>>
<?= $Page->HMG14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG15->Visible) { // HMG15 ?>
        <!-- HMG15 -->
        <td<?= $Page->HMG15->cellAttributes() ?>>
<span<?= $Page->HMG15->viewAttributes() ?>>
<?= $Page->HMG15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG16->Visible) { // HMG16 ?>
        <!-- HMG16 -->
        <td<?= $Page->HMG16->cellAttributes() ?>>
<span<?= $Page->HMG16->viewAttributes() ?>>
<?= $Page->HMG16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG17->Visible) { // HMG17 ?>
        <!-- HMG17 -->
        <td<?= $Page->HMG17->cellAttributes() ?>>
<span<?= $Page->HMG17->viewAttributes() ?>>
<?= $Page->HMG17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG18->Visible) { // HMG18 ?>
        <!-- HMG18 -->
        <td<?= $Page->HMG18->cellAttributes() ?>>
<span<?= $Page->HMG18->viewAttributes() ?>>
<?= $Page->HMG18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG19->Visible) { // HMG19 ?>
        <!-- HMG19 -->
        <td<?= $Page->HMG19->cellAttributes() ?>>
<span<?= $Page->HMG19->viewAttributes() ?>>
<?= $Page->HMG19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG20->Visible) { // HMG20 ?>
        <!-- HMG20 -->
        <td<?= $Page->HMG20->cellAttributes() ?>>
<span<?= $Page->HMG20->viewAttributes() ?>>
<?= $Page->HMG20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG21->Visible) { // HMG21 ?>
        <!-- HMG21 -->
        <td<?= $Page->HMG21->cellAttributes() ?>>
<span<?= $Page->HMG21->viewAttributes() ?>>
<?= $Page->HMG21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG22->Visible) { // HMG22 ?>
        <!-- HMG22 -->
        <td<?= $Page->HMG22->cellAttributes() ?>>
<span<?= $Page->HMG22->viewAttributes() ?>>
<?= $Page->HMG22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG23->Visible) { // HMG23 ?>
        <!-- HMG23 -->
        <td<?= $Page->HMG23->cellAttributes() ?>>
<span<?= $Page->HMG23->viewAttributes() ?>>
<?= $Page->HMG23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG24->Visible) { // HMG24 ?>
        <!-- HMG24 -->
        <td<?= $Page->HMG24->cellAttributes() ?>>
<span<?= $Page->HMG24->viewAttributes() ?>>
<?= $Page->HMG24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HMG25->Visible) { // HMG25 ?>
        <!-- HMG25 -->
        <td<?= $Page->HMG25->cellAttributes() ?>>
<span<?= $Page->HMG25->viewAttributes() ?>>
<?= $Page->HMG25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH14->Visible) { // GnRH14 ?>
        <!-- GnRH14 -->
        <td<?= $Page->GnRH14->cellAttributes() ?>>
<span<?= $Page->GnRH14->viewAttributes() ?>>
<?= $Page->GnRH14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH15->Visible) { // GnRH15 ?>
        <!-- GnRH15 -->
        <td<?= $Page->GnRH15->cellAttributes() ?>>
<span<?= $Page->GnRH15->viewAttributes() ?>>
<?= $Page->GnRH15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH16->Visible) { // GnRH16 ?>
        <!-- GnRH16 -->
        <td<?= $Page->GnRH16->cellAttributes() ?>>
<span<?= $Page->GnRH16->viewAttributes() ?>>
<?= $Page->GnRH16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH17->Visible) { // GnRH17 ?>
        <!-- GnRH17 -->
        <td<?= $Page->GnRH17->cellAttributes() ?>>
<span<?= $Page->GnRH17->viewAttributes() ?>>
<?= $Page->GnRH17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH18->Visible) { // GnRH18 ?>
        <!-- GnRH18 -->
        <td<?= $Page->GnRH18->cellAttributes() ?>>
<span<?= $Page->GnRH18->viewAttributes() ?>>
<?= $Page->GnRH18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH19->Visible) { // GnRH19 ?>
        <!-- GnRH19 -->
        <td<?= $Page->GnRH19->cellAttributes() ?>>
<span<?= $Page->GnRH19->viewAttributes() ?>>
<?= $Page->GnRH19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH20->Visible) { // GnRH20 ?>
        <!-- GnRH20 -->
        <td<?= $Page->GnRH20->cellAttributes() ?>>
<span<?= $Page->GnRH20->viewAttributes() ?>>
<?= $Page->GnRH20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH21->Visible) { // GnRH21 ?>
        <!-- GnRH21 -->
        <td<?= $Page->GnRH21->cellAttributes() ?>>
<span<?= $Page->GnRH21->viewAttributes() ?>>
<?= $Page->GnRH21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH22->Visible) { // GnRH22 ?>
        <!-- GnRH22 -->
        <td<?= $Page->GnRH22->cellAttributes() ?>>
<span<?= $Page->GnRH22->viewAttributes() ?>>
<?= $Page->GnRH22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH23->Visible) { // GnRH23 ?>
        <!-- GnRH23 -->
        <td<?= $Page->GnRH23->cellAttributes() ?>>
<span<?= $Page->GnRH23->viewAttributes() ?>>
<?= $Page->GnRH23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH24->Visible) { // GnRH24 ?>
        <!-- GnRH24 -->
        <td<?= $Page->GnRH24->cellAttributes() ?>>
<span<?= $Page->GnRH24->viewAttributes() ?>>
<?= $Page->GnRH24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GnRH25->Visible) { // GnRH25 ?>
        <!-- GnRH25 -->
        <td<?= $Page->GnRH25->cellAttributes() ?>>
<span<?= $Page->GnRH25->viewAttributes() ?>>
<?= $Page->GnRH25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P414->Visible) { // P414 ?>
        <!-- P414 -->
        <td<?= $Page->P414->cellAttributes() ?>>
<span<?= $Page->P414->viewAttributes() ?>>
<?= $Page->P414->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P415->Visible) { // P415 ?>
        <!-- P415 -->
        <td<?= $Page->P415->cellAttributes() ?>>
<span<?= $Page->P415->viewAttributes() ?>>
<?= $Page->P415->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P416->Visible) { // P416 ?>
        <!-- P416 -->
        <td<?= $Page->P416->cellAttributes() ?>>
<span<?= $Page->P416->viewAttributes() ?>>
<?= $Page->P416->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P417->Visible) { // P417 ?>
        <!-- P417 -->
        <td<?= $Page->P417->cellAttributes() ?>>
<span<?= $Page->P417->viewAttributes() ?>>
<?= $Page->P417->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P418->Visible) { // P418 ?>
        <!-- P418 -->
        <td<?= $Page->P418->cellAttributes() ?>>
<span<?= $Page->P418->viewAttributes() ?>>
<?= $Page->P418->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P419->Visible) { // P419 ?>
        <!-- P419 -->
        <td<?= $Page->P419->cellAttributes() ?>>
<span<?= $Page->P419->viewAttributes() ?>>
<?= $Page->P419->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P420->Visible) { // P420 ?>
        <!-- P420 -->
        <td<?= $Page->P420->cellAttributes() ?>>
<span<?= $Page->P420->viewAttributes() ?>>
<?= $Page->P420->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P421->Visible) { // P421 ?>
        <!-- P421 -->
        <td<?= $Page->P421->cellAttributes() ?>>
<span<?= $Page->P421->viewAttributes() ?>>
<?= $Page->P421->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P422->Visible) { // P422 ?>
        <!-- P422 -->
        <td<?= $Page->P422->cellAttributes() ?>>
<span<?= $Page->P422->viewAttributes() ?>>
<?= $Page->P422->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P423->Visible) { // P423 ?>
        <!-- P423 -->
        <td<?= $Page->P423->cellAttributes() ?>>
<span<?= $Page->P423->viewAttributes() ?>>
<?= $Page->P423->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P424->Visible) { // P424 ?>
        <!-- P424 -->
        <td<?= $Page->P424->cellAttributes() ?>>
<span<?= $Page->P424->viewAttributes() ?>>
<?= $Page->P424->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P425->Visible) { // P425 ?>
        <!-- P425 -->
        <td<?= $Page->P425->cellAttributes() ?>>
<span<?= $Page->P425->viewAttributes() ?>>
<?= $Page->P425->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt14->Visible) { // USGRt14 ?>
        <!-- USGRt14 -->
        <td<?= $Page->USGRt14->cellAttributes() ?>>
<span<?= $Page->USGRt14->viewAttributes() ?>>
<?= $Page->USGRt14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt15->Visible) { // USGRt15 ?>
        <!-- USGRt15 -->
        <td<?= $Page->USGRt15->cellAttributes() ?>>
<span<?= $Page->USGRt15->viewAttributes() ?>>
<?= $Page->USGRt15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt16->Visible) { // USGRt16 ?>
        <!-- USGRt16 -->
        <td<?= $Page->USGRt16->cellAttributes() ?>>
<span<?= $Page->USGRt16->viewAttributes() ?>>
<?= $Page->USGRt16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt17->Visible) { // USGRt17 ?>
        <!-- USGRt17 -->
        <td<?= $Page->USGRt17->cellAttributes() ?>>
<span<?= $Page->USGRt17->viewAttributes() ?>>
<?= $Page->USGRt17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt18->Visible) { // USGRt18 ?>
        <!-- USGRt18 -->
        <td<?= $Page->USGRt18->cellAttributes() ?>>
<span<?= $Page->USGRt18->viewAttributes() ?>>
<?= $Page->USGRt18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt19->Visible) { // USGRt19 ?>
        <!-- USGRt19 -->
        <td<?= $Page->USGRt19->cellAttributes() ?>>
<span<?= $Page->USGRt19->viewAttributes() ?>>
<?= $Page->USGRt19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt20->Visible) { // USGRt20 ?>
        <!-- USGRt20 -->
        <td<?= $Page->USGRt20->cellAttributes() ?>>
<span<?= $Page->USGRt20->viewAttributes() ?>>
<?= $Page->USGRt20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt21->Visible) { // USGRt21 ?>
        <!-- USGRt21 -->
        <td<?= $Page->USGRt21->cellAttributes() ?>>
<span<?= $Page->USGRt21->viewAttributes() ?>>
<?= $Page->USGRt21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt22->Visible) { // USGRt22 ?>
        <!-- USGRt22 -->
        <td<?= $Page->USGRt22->cellAttributes() ?>>
<span<?= $Page->USGRt22->viewAttributes() ?>>
<?= $Page->USGRt22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt23->Visible) { // USGRt23 ?>
        <!-- USGRt23 -->
        <td<?= $Page->USGRt23->cellAttributes() ?>>
<span<?= $Page->USGRt23->viewAttributes() ?>>
<?= $Page->USGRt23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt24->Visible) { // USGRt24 ?>
        <!-- USGRt24 -->
        <td<?= $Page->USGRt24->cellAttributes() ?>>
<span<?= $Page->USGRt24->viewAttributes() ?>>
<?= $Page->USGRt24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGRt25->Visible) { // USGRt25 ?>
        <!-- USGRt25 -->
        <td<?= $Page->USGRt25->cellAttributes() ?>>
<span<?= $Page->USGRt25->viewAttributes() ?>>
<?= $Page->USGRt25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt14->Visible) { // USGLt14 ?>
        <!-- USGLt14 -->
        <td<?= $Page->USGLt14->cellAttributes() ?>>
<span<?= $Page->USGLt14->viewAttributes() ?>>
<?= $Page->USGLt14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt15->Visible) { // USGLt15 ?>
        <!-- USGLt15 -->
        <td<?= $Page->USGLt15->cellAttributes() ?>>
<span<?= $Page->USGLt15->viewAttributes() ?>>
<?= $Page->USGLt15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt16->Visible) { // USGLt16 ?>
        <!-- USGLt16 -->
        <td<?= $Page->USGLt16->cellAttributes() ?>>
<span<?= $Page->USGLt16->viewAttributes() ?>>
<?= $Page->USGLt16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt17->Visible) { // USGLt17 ?>
        <!-- USGLt17 -->
        <td<?= $Page->USGLt17->cellAttributes() ?>>
<span<?= $Page->USGLt17->viewAttributes() ?>>
<?= $Page->USGLt17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt18->Visible) { // USGLt18 ?>
        <!-- USGLt18 -->
        <td<?= $Page->USGLt18->cellAttributes() ?>>
<span<?= $Page->USGLt18->viewAttributes() ?>>
<?= $Page->USGLt18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt19->Visible) { // USGLt19 ?>
        <!-- USGLt19 -->
        <td<?= $Page->USGLt19->cellAttributes() ?>>
<span<?= $Page->USGLt19->viewAttributes() ?>>
<?= $Page->USGLt19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt20->Visible) { // USGLt20 ?>
        <!-- USGLt20 -->
        <td<?= $Page->USGLt20->cellAttributes() ?>>
<span<?= $Page->USGLt20->viewAttributes() ?>>
<?= $Page->USGLt20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt21->Visible) { // USGLt21 ?>
        <!-- USGLt21 -->
        <td<?= $Page->USGLt21->cellAttributes() ?>>
<span<?= $Page->USGLt21->viewAttributes() ?>>
<?= $Page->USGLt21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt22->Visible) { // USGLt22 ?>
        <!-- USGLt22 -->
        <td<?= $Page->USGLt22->cellAttributes() ?>>
<span<?= $Page->USGLt22->viewAttributes() ?>>
<?= $Page->USGLt22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt23->Visible) { // USGLt23 ?>
        <!-- USGLt23 -->
        <td<?= $Page->USGLt23->cellAttributes() ?>>
<span<?= $Page->USGLt23->viewAttributes() ?>>
<?= $Page->USGLt23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt24->Visible) { // USGLt24 ?>
        <!-- USGLt24 -->
        <td<?= $Page->USGLt24->cellAttributes() ?>>
<span<?= $Page->USGLt24->viewAttributes() ?>>
<?= $Page->USGLt24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->USGLt25->Visible) { // USGLt25 ?>
        <!-- USGLt25 -->
        <td<?= $Page->USGLt25->cellAttributes() ?>>
<span<?= $Page->USGLt25->viewAttributes() ?>>
<?= $Page->USGLt25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM14->Visible) { // EM14 ?>
        <!-- EM14 -->
        <td<?= $Page->EM14->cellAttributes() ?>>
<span<?= $Page->EM14->viewAttributes() ?>>
<?= $Page->EM14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM15->Visible) { // EM15 ?>
        <!-- EM15 -->
        <td<?= $Page->EM15->cellAttributes() ?>>
<span<?= $Page->EM15->viewAttributes() ?>>
<?= $Page->EM15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM16->Visible) { // EM16 ?>
        <!-- EM16 -->
        <td<?= $Page->EM16->cellAttributes() ?>>
<span<?= $Page->EM16->viewAttributes() ?>>
<?= $Page->EM16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM17->Visible) { // EM17 ?>
        <!-- EM17 -->
        <td<?= $Page->EM17->cellAttributes() ?>>
<span<?= $Page->EM17->viewAttributes() ?>>
<?= $Page->EM17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM18->Visible) { // EM18 ?>
        <!-- EM18 -->
        <td<?= $Page->EM18->cellAttributes() ?>>
<span<?= $Page->EM18->viewAttributes() ?>>
<?= $Page->EM18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM19->Visible) { // EM19 ?>
        <!-- EM19 -->
        <td<?= $Page->EM19->cellAttributes() ?>>
<span<?= $Page->EM19->viewAttributes() ?>>
<?= $Page->EM19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM20->Visible) { // EM20 ?>
        <!-- EM20 -->
        <td<?= $Page->EM20->cellAttributes() ?>>
<span<?= $Page->EM20->viewAttributes() ?>>
<?= $Page->EM20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM21->Visible) { // EM21 ?>
        <!-- EM21 -->
        <td<?= $Page->EM21->cellAttributes() ?>>
<span<?= $Page->EM21->viewAttributes() ?>>
<?= $Page->EM21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM22->Visible) { // EM22 ?>
        <!-- EM22 -->
        <td<?= $Page->EM22->cellAttributes() ?>>
<span<?= $Page->EM22->viewAttributes() ?>>
<?= $Page->EM22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM23->Visible) { // EM23 ?>
        <!-- EM23 -->
        <td<?= $Page->EM23->cellAttributes() ?>>
<span<?= $Page->EM23->viewAttributes() ?>>
<?= $Page->EM23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM24->Visible) { // EM24 ?>
        <!-- EM24 -->
        <td<?= $Page->EM24->cellAttributes() ?>>
<span<?= $Page->EM24->viewAttributes() ?>>
<?= $Page->EM24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EM25->Visible) { // EM25 ?>
        <!-- EM25 -->
        <td<?= $Page->EM25->cellAttributes() ?>>
<span<?= $Page->EM25->viewAttributes() ?>>
<?= $Page->EM25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others14->Visible) { // Others14 ?>
        <!-- Others14 -->
        <td<?= $Page->Others14->cellAttributes() ?>>
<span<?= $Page->Others14->viewAttributes() ?>>
<?= $Page->Others14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others15->Visible) { // Others15 ?>
        <!-- Others15 -->
        <td<?= $Page->Others15->cellAttributes() ?>>
<span<?= $Page->Others15->viewAttributes() ?>>
<?= $Page->Others15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others16->Visible) { // Others16 ?>
        <!-- Others16 -->
        <td<?= $Page->Others16->cellAttributes() ?>>
<span<?= $Page->Others16->viewAttributes() ?>>
<?= $Page->Others16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others17->Visible) { // Others17 ?>
        <!-- Others17 -->
        <td<?= $Page->Others17->cellAttributes() ?>>
<span<?= $Page->Others17->viewAttributes() ?>>
<?= $Page->Others17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others18->Visible) { // Others18 ?>
        <!-- Others18 -->
        <td<?= $Page->Others18->cellAttributes() ?>>
<span<?= $Page->Others18->viewAttributes() ?>>
<?= $Page->Others18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others19->Visible) { // Others19 ?>
        <!-- Others19 -->
        <td<?= $Page->Others19->cellAttributes() ?>>
<span<?= $Page->Others19->viewAttributes() ?>>
<?= $Page->Others19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others20->Visible) { // Others20 ?>
        <!-- Others20 -->
        <td<?= $Page->Others20->cellAttributes() ?>>
<span<?= $Page->Others20->viewAttributes() ?>>
<?= $Page->Others20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others21->Visible) { // Others21 ?>
        <!-- Others21 -->
        <td<?= $Page->Others21->cellAttributes() ?>>
<span<?= $Page->Others21->viewAttributes() ?>>
<?= $Page->Others21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others22->Visible) { // Others22 ?>
        <!-- Others22 -->
        <td<?= $Page->Others22->cellAttributes() ?>>
<span<?= $Page->Others22->viewAttributes() ?>>
<?= $Page->Others22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others23->Visible) { // Others23 ?>
        <!-- Others23 -->
        <td<?= $Page->Others23->cellAttributes() ?>>
<span<?= $Page->Others23->viewAttributes() ?>>
<?= $Page->Others23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others24->Visible) { // Others24 ?>
        <!-- Others24 -->
        <td<?= $Page->Others24->cellAttributes() ?>>
<span<?= $Page->Others24->viewAttributes() ?>>
<?= $Page->Others24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Others25->Visible) { // Others25 ?>
        <!-- Others25 -->
        <td<?= $Page->Others25->cellAttributes() ?>>
<span<?= $Page->Others25->viewAttributes() ?>>
<?= $Page->Others25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR14->Visible) { // DR14 ?>
        <!-- DR14 -->
        <td<?= $Page->DR14->cellAttributes() ?>>
<span<?= $Page->DR14->viewAttributes() ?>>
<?= $Page->DR14->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR15->Visible) { // DR15 ?>
        <!-- DR15 -->
        <td<?= $Page->DR15->cellAttributes() ?>>
<span<?= $Page->DR15->viewAttributes() ?>>
<?= $Page->DR15->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR16->Visible) { // DR16 ?>
        <!-- DR16 -->
        <td<?= $Page->DR16->cellAttributes() ?>>
<span<?= $Page->DR16->viewAttributes() ?>>
<?= $Page->DR16->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR17->Visible) { // DR17 ?>
        <!-- DR17 -->
        <td<?= $Page->DR17->cellAttributes() ?>>
<span<?= $Page->DR17->viewAttributes() ?>>
<?= $Page->DR17->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR18->Visible) { // DR18 ?>
        <!-- DR18 -->
        <td<?= $Page->DR18->cellAttributes() ?>>
<span<?= $Page->DR18->viewAttributes() ?>>
<?= $Page->DR18->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR19->Visible) { // DR19 ?>
        <!-- DR19 -->
        <td<?= $Page->DR19->cellAttributes() ?>>
<span<?= $Page->DR19->viewAttributes() ?>>
<?= $Page->DR19->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR20->Visible) { // DR20 ?>
        <!-- DR20 -->
        <td<?= $Page->DR20->cellAttributes() ?>>
<span<?= $Page->DR20->viewAttributes() ?>>
<?= $Page->DR20->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR21->Visible) { // DR21 ?>
        <!-- DR21 -->
        <td<?= $Page->DR21->cellAttributes() ?>>
<span<?= $Page->DR21->viewAttributes() ?>>
<?= $Page->DR21->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR22->Visible) { // DR22 ?>
        <!-- DR22 -->
        <td<?= $Page->DR22->cellAttributes() ?>>
<span<?= $Page->DR22->viewAttributes() ?>>
<?= $Page->DR22->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR23->Visible) { // DR23 ?>
        <!-- DR23 -->
        <td<?= $Page->DR23->cellAttributes() ?>>
<span<?= $Page->DR23->viewAttributes() ?>>
<?= $Page->DR23->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR24->Visible) { // DR24 ?>
        <!-- DR24 -->
        <td<?= $Page->DR24->cellAttributes() ?>>
<span<?= $Page->DR24->viewAttributes() ?>>
<?= $Page->DR24->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DR25->Visible) { // DR25 ?>
        <!-- DR25 -->
        <td<?= $Page->DR25->cellAttributes() ?>>
<span<?= $Page->DR25->viewAttributes() ?>>
<?= $Page->DR25->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E214->Visible) { // E214 ?>
        <!-- E214 -->
        <td<?= $Page->E214->cellAttributes() ?>>
<span<?= $Page->E214->viewAttributes() ?>>
<?= $Page->E214->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E215->Visible) { // E215 ?>
        <!-- E215 -->
        <td<?= $Page->E215->cellAttributes() ?>>
<span<?= $Page->E215->viewAttributes() ?>>
<?= $Page->E215->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E216->Visible) { // E216 ?>
        <!-- E216 -->
        <td<?= $Page->E216->cellAttributes() ?>>
<span<?= $Page->E216->viewAttributes() ?>>
<?= $Page->E216->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E217->Visible) { // E217 ?>
        <!-- E217 -->
        <td<?= $Page->E217->cellAttributes() ?>>
<span<?= $Page->E217->viewAttributes() ?>>
<?= $Page->E217->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E218->Visible) { // E218 ?>
        <!-- E218 -->
        <td<?= $Page->E218->cellAttributes() ?>>
<span<?= $Page->E218->viewAttributes() ?>>
<?= $Page->E218->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E219->Visible) { // E219 ?>
        <!-- E219 -->
        <td<?= $Page->E219->cellAttributes() ?>>
<span<?= $Page->E219->viewAttributes() ?>>
<?= $Page->E219->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E220->Visible) { // E220 ?>
        <!-- E220 -->
        <td<?= $Page->E220->cellAttributes() ?>>
<span<?= $Page->E220->viewAttributes() ?>>
<?= $Page->E220->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E221->Visible) { // E221 ?>
        <!-- E221 -->
        <td<?= $Page->E221->cellAttributes() ?>>
<span<?= $Page->E221->viewAttributes() ?>>
<?= $Page->E221->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E222->Visible) { // E222 ?>
        <!-- E222 -->
        <td<?= $Page->E222->cellAttributes() ?>>
<span<?= $Page->E222->viewAttributes() ?>>
<?= $Page->E222->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E223->Visible) { // E223 ?>
        <!-- E223 -->
        <td<?= $Page->E223->cellAttributes() ?>>
<span<?= $Page->E223->viewAttributes() ?>>
<?= $Page->E223->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E224->Visible) { // E224 ?>
        <!-- E224 -->
        <td<?= $Page->E224->cellAttributes() ?>>
<span<?= $Page->E224->viewAttributes() ?>>
<?= $Page->E224->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E225->Visible) { // E225 ?>
        <!-- E225 -->
        <td<?= $Page->E225->cellAttributes() ?>>
<span<?= $Page->E225->viewAttributes() ?>>
<?= $Page->E225->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EEETTTDTE->Visible) { // EEETTTDTE ?>
        <!-- EEETTTDTE -->
        <td<?= $Page->EEETTTDTE->cellAttributes() ?>>
<span<?= $Page->EEETTTDTE->viewAttributes() ?>>
<?= $Page->EEETTTDTE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->bhcgdate->Visible) { // bhcgdate ?>
        <!-- bhcgdate -->
        <td<?= $Page->bhcgdate->cellAttributes() ?>>
<span<?= $Page->bhcgdate->viewAttributes() ?>>
<?= $Page->bhcgdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TUBAL_PATENCY->Visible) { // TUBAL_PATENCY ?>
        <!-- TUBAL_PATENCY -->
        <td<?= $Page->TUBAL_PATENCY->cellAttributes() ?>>
<span<?= $Page->TUBAL_PATENCY->viewAttributes() ?>>
<?= $Page->TUBAL_PATENCY->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HSG->Visible) { // HSG ?>
        <!-- HSG -->
        <td<?= $Page->HSG->cellAttributes() ?>>
<span<?= $Page->HSG->viewAttributes() ?>>
<?= $Page->HSG->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DHL->Visible) { // DHL ?>
        <!-- DHL -->
        <td<?= $Page->DHL->cellAttributes() ?>>
<span<?= $Page->DHL->viewAttributes() ?>>
<?= $Page->DHL->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->UTERINE_PROBLEMS->Visible) { // UTERINE_PROBLEMS ?>
        <!-- UTERINE_PROBLEMS -->
        <td<?= $Page->UTERINE_PROBLEMS->cellAttributes() ?>>
<span<?= $Page->UTERINE_PROBLEMS->viewAttributes() ?>>
<?= $Page->UTERINE_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->W_COMORBIDS->Visible) { // W_COMORBIDS ?>
        <!-- W_COMORBIDS -->
        <td<?= $Page->W_COMORBIDS->cellAttributes() ?>>
<span<?= $Page->W_COMORBIDS->viewAttributes() ?>>
<?= $Page->W_COMORBIDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->H_COMORBIDS->Visible) { // H_COMORBIDS ?>
        <!-- H_COMORBIDS -->
        <td<?= $Page->H_COMORBIDS->cellAttributes() ?>>
<span<?= $Page->H_COMORBIDS->viewAttributes() ?>>
<?= $Page->H_COMORBIDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SEXUAL_DYSFUNCTION->Visible) { // SEXUAL_DYSFUNCTION ?>
        <!-- SEXUAL_DYSFUNCTION -->
        <td<?= $Page->SEXUAL_DYSFUNCTION->cellAttributes() ?>>
<span<?= $Page->SEXUAL_DYSFUNCTION->viewAttributes() ?>>
<?= $Page->SEXUAL_DYSFUNCTION->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TABLETS->Visible) { // TABLETS ?>
        <!-- TABLETS -->
        <td<?= $Page->TABLETS->cellAttributes() ?>>
<span<?= $Page->TABLETS->viewAttributes() ?>>
<?= $Page->TABLETS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FOLLICLE_STATUS->Visible) { // FOLLICLE_STATUS ?>
        <!-- FOLLICLE_STATUS -->
        <td<?= $Page->FOLLICLE_STATUS->cellAttributes() ?>>
<span<?= $Page->FOLLICLE_STATUS->viewAttributes() ?>>
<?= $Page->FOLLICLE_STATUS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NUMBER_OF_IUI->Visible) { // NUMBER_OF_IUI ?>
        <!-- NUMBER_OF_IUI -->
        <td<?= $Page->NUMBER_OF_IUI->cellAttributes() ?>>
<span<?= $Page->NUMBER_OF_IUI->viewAttributes() ?>>
<?= $Page->NUMBER_OF_IUI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PROCEDURE->Visible) { // PROCEDURE ?>
        <!-- PROCEDURE -->
        <td<?= $Page->PROCEDURE->cellAttributes() ?>>
<span<?= $Page->PROCEDURE->viewAttributes() ?>>
<?= $Page->PROCEDURE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->LUTEAL_SUPPORT->Visible) { // LUTEAL_SUPPORT ?>
        <!-- LUTEAL_SUPPORT -->
        <td<?= $Page->LUTEAL_SUPPORT->cellAttributes() ?>>
<span<?= $Page->LUTEAL_SUPPORT->viewAttributes() ?>>
<?= $Page->LUTEAL_SUPPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SPECIFIC_MATERNAL_PROBLEMS->Visible) { // SPECIFIC_MATERNAL_PROBLEMS ?>
        <!-- SPECIFIC_MATERNAL_PROBLEMS -->
        <td<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->cellAttributes() ?>>
<span<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->viewAttributes() ?>>
<?= $Page->SPECIFIC_MATERNAL_PROBLEMS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ONGOING_PREG->Visible) { // ONGOING_PREG ?>
        <!-- ONGOING_PREG -->
        <td<?= $Page->ONGOING_PREG->cellAttributes() ?>>
<span<?= $Page->ONGOING_PREG->viewAttributes() ?>>
<?= $Page->ONGOING_PREG->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EDD_Date->Visible) { // EDD_Date ?>
        <!-- EDD_Date -->
        <td<?= $Page->EDD_Date->cellAttributes() ?>>
<span<?= $Page->EDD_Date->viewAttributes() ?>>
<?= $Page->EDD_Date->getViewValue() ?></span>
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

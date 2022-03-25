<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOocytedenudationPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_oocytedenudation"><!-- .card -->
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
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
    <?php if ($Page->SortUrl($Page->ResultDate) == "") { ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><?= $Page->ResultDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ResultDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ResultDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ResultDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ResultDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ResultDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <?php if ($Page->SortUrl($Page->Surgeon) == "") { ?>
        <th class="<?= $Page->Surgeon->headerCellClass() ?>"><?= $Page->Surgeon->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Surgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Surgeon->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Surgeon->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Surgeon->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
    <?php if ($Page->SortUrl($Page->AsstSurgeon) == "") { ?>
        <th class="<?= $Page->AsstSurgeon->headerCellClass() ?>"><?= $Page->AsstSurgeon->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AsstSurgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AsstSurgeon->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AsstSurgeon->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AsstSurgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AsstSurgeon->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <?php if ($Page->SortUrl($Page->Anaesthetist) == "") { ?>
        <th class="<?= $Page->Anaesthetist->headerCellClass() ?>"><?= $Page->Anaesthetist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Anaesthetist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Anaesthetist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Anaesthetist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Anaesthetist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Anaesthetist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
    <?php if ($Page->SortUrl($Page->AnaestheiaType) == "") { ?>
        <th class="<?= $Page->AnaestheiaType->headerCellClass() ?>"><?= $Page->AnaestheiaType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AnaestheiaType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AnaestheiaType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AnaestheiaType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AnaestheiaType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AnaestheiaType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
    <?php if ($Page->SortUrl($Page->PrimaryEmbryologist) == "") { ?>
        <th class="<?= $Page->PrimaryEmbryologist->headerCellClass() ?>"><?= $Page->PrimaryEmbryologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PrimaryEmbryologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PrimaryEmbryologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PrimaryEmbryologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
    <?php if ($Page->SortUrl($Page->SecondaryEmbryologist) == "") { ?>
        <th class="<?= $Page->SecondaryEmbryologist->headerCellClass() ?>"><?= $Page->SecondaryEmbryologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SecondaryEmbryologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SecondaryEmbryologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SecondaryEmbryologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
    <?php if ($Page->SortUrl($Page->NoOfFolliclesRight) == "") { ?>
        <th class="<?= $Page->NoOfFolliclesRight->headerCellClass() ?>"><?= $Page->NoOfFolliclesRight->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NoOfFolliclesRight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NoOfFolliclesRight->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NoOfFolliclesRight->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NoOfFolliclesRight->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NoOfFolliclesRight->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
    <?php if ($Page->SortUrl($Page->NoOfFolliclesLeft) == "") { ?>
        <th class="<?= $Page->NoOfFolliclesLeft->headerCellClass() ?>"><?= $Page->NoOfFolliclesLeft->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NoOfFolliclesLeft->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NoOfFolliclesLeft->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NoOfFolliclesLeft->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NoOfFolliclesLeft->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NoOfFolliclesLeft->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
    <?php if ($Page->SortUrl($Page->NoOfOocytes) == "") { ?>
        <th class="<?= $Page->NoOfOocytes->headerCellClass() ?>"><?= $Page->NoOfOocytes->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NoOfOocytes->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NoOfOocytes->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NoOfOocytes->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NoOfOocytes->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NoOfOocytes->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
    <?php if ($Page->SortUrl($Page->RecordOocyteDenudation) == "") { ?>
        <th class="<?= $Page->RecordOocyteDenudation->headerCellClass() ?>"><?= $Page->RecordOocyteDenudation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RecordOocyteDenudation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RecordOocyteDenudation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RecordOocyteDenudation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RecordOocyteDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RecordOocyteDenudation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
    <?php if ($Page->SortUrl($Page->DateOfDenudation) == "") { ?>
        <th class="<?= $Page->DateOfDenudation->headerCellClass() ?>"><?= $Page->DateOfDenudation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DateOfDenudation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DateOfDenudation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DateOfDenudation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DateOfDenudation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DateOfDenudation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
    <?php if ($Page->SortUrl($Page->DenudationDoneBy) == "") { ?>
        <th class="<?= $Page->DenudationDoneBy->headerCellClass() ?>"><?= $Page->DenudationDoneBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DenudationDoneBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DenudationDoneBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DenudationDoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DenudationDoneBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <?php if ($Page->SortUrl($Page->TidNo) == "") { ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><?= $Page->TidNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TidNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TidNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TidNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TidNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TidNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
    <?php if ($Page->SortUrl($Page->ExpFollicles) == "") { ?>
        <th class="<?= $Page->ExpFollicles->headerCellClass() ?>"><?= $Page->ExpFollicles->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ExpFollicles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ExpFollicles->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ExpFollicles->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ExpFollicles->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ExpFollicles->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
    <?php if ($Page->SortUrl($Page->SecondaryDenudationDoneBy) == "") { ?>
        <th class="<?= $Page->SecondaryDenudationDoneBy->headerCellClass() ?>"><?= $Page->SecondaryDenudationDoneBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SecondaryDenudationDoneBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SecondaryDenudationDoneBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SecondaryDenudationDoneBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SecondaryDenudationDoneBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SecondaryDenudationDoneBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
    <?php if ($Page->SortUrl($Page->OocyteOrgin) == "") { ?>
        <th class="<?= $Page->OocyteOrgin->headerCellClass() ?>"><?= $Page->OocyteOrgin->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OocyteOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OocyteOrgin->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OocyteOrgin->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OocyteOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OocyteOrgin->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
    <?php if ($Page->SortUrl($Page->patient1) == "") { ?>
        <th class="<?= $Page->patient1->headerCellClass() ?>"><?= $Page->patient1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->patient1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->patient1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->patient1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->patient1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->patient1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
    <?php if ($Page->SortUrl($Page->OocyteType) == "") { ?>
        <th class="<?= $Page->OocyteType->headerCellClass() ?>"><?= $Page->OocyteType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OocyteType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OocyteType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OocyteType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OocyteType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OocyteType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
    <?php if ($Page->SortUrl($Page->MIOocytesDonate1) == "") { ?>
        <th class="<?= $Page->MIOocytesDonate1->headerCellClass() ?>"><?= $Page->MIOocytesDonate1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MIOocytesDonate1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MIOocytesDonate1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MIOocytesDonate1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MIOocytesDonate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MIOocytesDonate1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
    <?php if ($Page->SortUrl($Page->MIOocytesDonate2) == "") { ?>
        <th class="<?= $Page->MIOocytesDonate2->headerCellClass() ?>"><?= $Page->MIOocytesDonate2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MIOocytesDonate2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MIOocytesDonate2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MIOocytesDonate2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MIOocytesDonate2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MIOocytesDonate2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
    <?php if ($Page->SortUrl($Page->SelfMI) == "") { ?>
        <th class="<?= $Page->SelfMI->headerCellClass() ?>"><?= $Page->SelfMI->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SelfMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SelfMI->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SelfMI->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SelfMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SelfMI->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
    <?php if ($Page->SortUrl($Page->SelfMII) == "") { ?>
        <th class="<?= $Page->SelfMII->headerCellClass() ?>"><?= $Page->SelfMII->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SelfMII->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SelfMII->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SelfMII->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SelfMII->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SelfMII->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
    <?php if ($Page->SortUrl($Page->patient3) == "") { ?>
        <th class="<?= $Page->patient3->headerCellClass() ?>"><?= $Page->patient3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->patient3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->patient3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->patient3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->patient3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->patient3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
    <?php if ($Page->SortUrl($Page->patient4) == "") { ?>
        <th class="<?= $Page->patient4->headerCellClass() ?>"><?= $Page->patient4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->patient4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->patient4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->patient4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->patient4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->patient4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
    <?php if ($Page->SortUrl($Page->OocytesDonate3) == "") { ?>
        <th class="<?= $Page->OocytesDonate3->headerCellClass() ?>"><?= $Page->OocytesDonate3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OocytesDonate3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OocytesDonate3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OocytesDonate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OocytesDonate3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
    <?php if ($Page->SortUrl($Page->OocytesDonate4) == "") { ?>
        <th class="<?= $Page->OocytesDonate4->headerCellClass() ?>"><?= $Page->OocytesDonate4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OocytesDonate4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OocytesDonate4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OocytesDonate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OocytesDonate4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
    <?php if ($Page->SortUrl($Page->MIOocytesDonate3) == "") { ?>
        <th class="<?= $Page->MIOocytesDonate3->headerCellClass() ?>"><?= $Page->MIOocytesDonate3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MIOocytesDonate3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MIOocytesDonate3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MIOocytesDonate3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MIOocytesDonate3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MIOocytesDonate3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
    <?php if ($Page->SortUrl($Page->MIOocytesDonate4) == "") { ?>
        <th class="<?= $Page->MIOocytesDonate4->headerCellClass() ?>"><?= $Page->MIOocytesDonate4->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MIOocytesDonate4->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MIOocytesDonate4->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MIOocytesDonate4->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MIOocytesDonate4->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MIOocytesDonate4->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
    <?php if ($Page->SortUrl($Page->SelfOocytesMI) == "") { ?>
        <th class="<?= $Page->SelfOocytesMI->headerCellClass() ?>"><?= $Page->SelfOocytesMI->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SelfOocytesMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SelfOocytesMI->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SelfOocytesMI->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SelfOocytesMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SelfOocytesMI->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
    <?php if ($Page->SortUrl($Page->SelfOocytesMII) == "") { ?>
        <th class="<?= $Page->SelfOocytesMII->headerCellClass() ?>"><?= $Page->SelfOocytesMII->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SelfOocytesMII->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SelfOocytesMII->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SelfOocytesMII->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SelfOocytesMII->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SelfOocytesMII->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->donor->Visible) { // donor ?>
    <?php if ($Page->SortUrl($Page->donor) == "") { ?>
        <th class="<?= $Page->donor->headerCellClass() ?>"><?= $Page->donor->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->donor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->donor->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->donor->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->donor->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->donor->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->ResultDate->Visible) { // ResultDate ?>
        <!-- ResultDate -->
        <td<?= $Page->ResultDate->cellAttributes() ?>>
<span<?= $Page->ResultDate->viewAttributes() ?>>
<?= $Page->ResultDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <!-- Surgeon -->
        <td<?= $Page->Surgeon->cellAttributes() ?>>
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AsstSurgeon->Visible) { // AsstSurgeon ?>
        <!-- AsstSurgeon -->
        <td<?= $Page->AsstSurgeon->cellAttributes() ?>>
<span<?= $Page->AsstSurgeon->viewAttributes() ?>>
<?= $Page->AsstSurgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <!-- Anaesthetist -->
        <td<?= $Page->Anaesthetist->cellAttributes() ?>>
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AnaestheiaType->Visible) { // AnaestheiaType ?>
        <!-- AnaestheiaType -->
        <td<?= $Page->AnaestheiaType->cellAttributes() ?>>
<span<?= $Page->AnaestheiaType->viewAttributes() ?>>
<?= $Page->AnaestheiaType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PrimaryEmbryologist->Visible) { // PrimaryEmbryologist ?>
        <!-- PrimaryEmbryologist -->
        <td<?= $Page->PrimaryEmbryologist->cellAttributes() ?>>
<span<?= $Page->PrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SecondaryEmbryologist->Visible) { // SecondaryEmbryologist ?>
        <!-- SecondaryEmbryologist -->
        <td<?= $Page->SecondaryEmbryologist->cellAttributes() ?>>
<span<?= $Page->SecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NoOfFolliclesRight->Visible) { // NoOfFolliclesRight ?>
        <!-- NoOfFolliclesRight -->
        <td<?= $Page->NoOfFolliclesRight->cellAttributes() ?>>
<span<?= $Page->NoOfFolliclesRight->viewAttributes() ?>>
<?= $Page->NoOfFolliclesRight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NoOfFolliclesLeft->Visible) { // NoOfFolliclesLeft ?>
        <!-- NoOfFolliclesLeft -->
        <td<?= $Page->NoOfFolliclesLeft->cellAttributes() ?>>
<span<?= $Page->NoOfFolliclesLeft->viewAttributes() ?>>
<?= $Page->NoOfFolliclesLeft->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NoOfOocytes->Visible) { // NoOfOocytes ?>
        <!-- NoOfOocytes -->
        <td<?= $Page->NoOfOocytes->cellAttributes() ?>>
<span<?= $Page->NoOfOocytes->viewAttributes() ?>>
<?= $Page->NoOfOocytes->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RecordOocyteDenudation->Visible) { // RecordOocyteDenudation ?>
        <!-- RecordOocyteDenudation -->
        <td<?= $Page->RecordOocyteDenudation->cellAttributes() ?>>
<span<?= $Page->RecordOocyteDenudation->viewAttributes() ?>>
<?= $Page->RecordOocyteDenudation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DateOfDenudation->Visible) { // DateOfDenudation ?>
        <!-- DateOfDenudation -->
        <td<?= $Page->DateOfDenudation->cellAttributes() ?>>
<span<?= $Page->DateOfDenudation->viewAttributes() ?>>
<?= $Page->DateOfDenudation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DenudationDoneBy->Visible) { // DenudationDoneBy ?>
        <!-- DenudationDoneBy -->
        <td<?= $Page->DenudationDoneBy->cellAttributes() ?>>
<span<?= $Page->DenudationDoneBy->viewAttributes() ?>>
<?= $Page->DenudationDoneBy->getViewValue() ?></span>
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
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <!-- TidNo -->
        <td<?= $Page->TidNo->cellAttributes() ?>>
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ExpFollicles->Visible) { // ExpFollicles ?>
        <!-- ExpFollicles -->
        <td<?= $Page->ExpFollicles->cellAttributes() ?>>
<span<?= $Page->ExpFollicles->viewAttributes() ?>>
<?= $Page->ExpFollicles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SecondaryDenudationDoneBy->Visible) { // SecondaryDenudationDoneBy ?>
        <!-- SecondaryDenudationDoneBy -->
        <td<?= $Page->SecondaryDenudationDoneBy->cellAttributes() ?>>
<span<?= $Page->SecondaryDenudationDoneBy->viewAttributes() ?>>
<?= $Page->SecondaryDenudationDoneBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OocyteOrgin->Visible) { // OocyteOrgin ?>
        <!-- OocyteOrgin -->
        <td<?= $Page->OocyteOrgin->cellAttributes() ?>>
<span<?= $Page->OocyteOrgin->viewAttributes() ?>>
<?= $Page->OocyteOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->patient1->Visible) { // patient1 ?>
        <!-- patient1 -->
        <td<?= $Page->patient1->cellAttributes() ?>>
<span<?= $Page->patient1->viewAttributes() ?>>
<?= $Page->patient1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OocyteType->Visible) { // OocyteType ?>
        <!-- OocyteType -->
        <td<?= $Page->OocyteType->cellAttributes() ?>>
<span<?= $Page->OocyteType->viewAttributes() ?>>
<?= $Page->OocyteType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MIOocytesDonate1->Visible) { // MIOocytesDonate1 ?>
        <!-- MIOocytesDonate1 -->
        <td<?= $Page->MIOocytesDonate1->cellAttributes() ?>>
<span<?= $Page->MIOocytesDonate1->viewAttributes() ?>>
<?= $Page->MIOocytesDonate1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MIOocytesDonate2->Visible) { // MIOocytesDonate2 ?>
        <!-- MIOocytesDonate2 -->
        <td<?= $Page->MIOocytesDonate2->cellAttributes() ?>>
<span<?= $Page->MIOocytesDonate2->viewAttributes() ?>>
<?= $Page->MIOocytesDonate2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SelfMI->Visible) { // SelfMI ?>
        <!-- SelfMI -->
        <td<?= $Page->SelfMI->cellAttributes() ?>>
<span<?= $Page->SelfMI->viewAttributes() ?>>
<?= $Page->SelfMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SelfMII->Visible) { // SelfMII ?>
        <!-- SelfMII -->
        <td<?= $Page->SelfMII->cellAttributes() ?>>
<span<?= $Page->SelfMII->viewAttributes() ?>>
<?= $Page->SelfMII->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->patient3->Visible) { // patient3 ?>
        <!-- patient3 -->
        <td<?= $Page->patient3->cellAttributes() ?>>
<span<?= $Page->patient3->viewAttributes() ?>>
<?= $Page->patient3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->patient4->Visible) { // patient4 ?>
        <!-- patient4 -->
        <td<?= $Page->patient4->cellAttributes() ?>>
<span<?= $Page->patient4->viewAttributes() ?>>
<?= $Page->patient4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OocytesDonate3->Visible) { // OocytesDonate3 ?>
        <!-- OocytesDonate3 -->
        <td<?= $Page->OocytesDonate3->cellAttributes() ?>>
<span<?= $Page->OocytesDonate3->viewAttributes() ?>>
<?= $Page->OocytesDonate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OocytesDonate4->Visible) { // OocytesDonate4 ?>
        <!-- OocytesDonate4 -->
        <td<?= $Page->OocytesDonate4->cellAttributes() ?>>
<span<?= $Page->OocytesDonate4->viewAttributes() ?>>
<?= $Page->OocytesDonate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MIOocytesDonate3->Visible) { // MIOocytesDonate3 ?>
        <!-- MIOocytesDonate3 -->
        <td<?= $Page->MIOocytesDonate3->cellAttributes() ?>>
<span<?= $Page->MIOocytesDonate3->viewAttributes() ?>>
<?= $Page->MIOocytesDonate3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MIOocytesDonate4->Visible) { // MIOocytesDonate4 ?>
        <!-- MIOocytesDonate4 -->
        <td<?= $Page->MIOocytesDonate4->cellAttributes() ?>>
<span<?= $Page->MIOocytesDonate4->viewAttributes() ?>>
<?= $Page->MIOocytesDonate4->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SelfOocytesMI->Visible) { // SelfOocytesMI ?>
        <!-- SelfOocytesMI -->
        <td<?= $Page->SelfOocytesMI->cellAttributes() ?>>
<span<?= $Page->SelfOocytesMI->viewAttributes() ?>>
<?= $Page->SelfOocytesMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SelfOocytesMII->Visible) { // SelfOocytesMII ?>
        <!-- SelfOocytesMII -->
        <td<?= $Page->SelfOocytesMII->cellAttributes() ?>>
<span<?= $Page->SelfOocytesMII->viewAttributes() ?>>
<?= $Page->SelfOocytesMII->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->donor->Visible) { // donor ?>
        <!-- donor -->
        <td<?= $Page->donor->cellAttributes() ?>>
<span<?= $Page->donor->viewAttributes() ?>>
<?= $Page->donor->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfOutcomePreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_outcome"><!-- .card -->
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
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <?php if ($Page->SortUrl($Page->RIDNO) == "") { ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><?= $Page->RIDNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RIDNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RIDNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RIDNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RIDNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RIDNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Age->Visible) { // Age ?>
    <?php if ($Page->SortUrl($Page->Age) == "") { ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><?= $Page->Age->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Age->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Age->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Age->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Age->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Age->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
    <?php if ($Page->SortUrl($Page->treatment_status) == "") { ?>
        <th class="<?= $Page->treatment_status->headerCellClass() ?>"><?= $Page->treatment_status->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->treatment_status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->treatment_status->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->treatment_status->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->treatment_status->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->treatment_status->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
    <?php if ($Page->SortUrl($Page->ARTCYCLE) == "") { ?>
        <th class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><?= $Page->ARTCYCLE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ARTCYCLE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ARTCYCLE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ARTCYCLE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ARTCYCLE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ARTCYCLE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
    <?php if ($Page->SortUrl($Page->RESULT) == "") { ?>
        <th class="<?= $Page->RESULT->headerCellClass() ?>"><?= $Page->RESULT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RESULT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RESULT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RESULT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RESULT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RESULT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
    <?php if ($Page->SortUrl($Page->outcomeDate) == "") { ?>
        <th class="<?= $Page->outcomeDate->headerCellClass() ?>"><?= $Page->outcomeDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->outcomeDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->outcomeDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->outcomeDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->outcomeDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->outcomeDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
    <?php if ($Page->SortUrl($Page->outcomeDay) == "") { ?>
        <th class="<?= $Page->outcomeDay->headerCellClass() ?>"><?= $Page->outcomeDay->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->outcomeDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->outcomeDay->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->outcomeDay->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->outcomeDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->outcomeDay->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
    <?php if ($Page->SortUrl($Page->OPResult) == "") { ?>
        <th class="<?= $Page->OPResult->headerCellClass() ?>"><?= $Page->OPResult->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OPResult->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OPResult->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OPResult->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OPResult->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OPResult->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
    <?php if ($Page->SortUrl($Page->Gestation) == "") { ?>
        <th class="<?= $Page->Gestation->headerCellClass() ?>"><?= $Page->Gestation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Gestation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Gestation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Gestation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Gestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Gestation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
    <?php if ($Page->SortUrl($Page->TransferdEmbryos) == "") { ?>
        <th class="<?= $Page->TransferdEmbryos->headerCellClass() ?>"><?= $Page->TransferdEmbryos->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TransferdEmbryos->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TransferdEmbryos->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TransferdEmbryos->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TransferdEmbryos->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TransferdEmbryos->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
    <?php if ($Page->SortUrl($Page->InitalOfSacs) == "") { ?>
        <th class="<?= $Page->InitalOfSacs->headerCellClass() ?>"><?= $Page->InitalOfSacs->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->InitalOfSacs->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->InitalOfSacs->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->InitalOfSacs->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->InitalOfSacs->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->InitalOfSacs->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
    <?php if ($Page->SortUrl($Page->ImplimentationRate) == "") { ?>
        <th class="<?= $Page->ImplimentationRate->headerCellClass() ?>"><?= $Page->ImplimentationRate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ImplimentationRate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ImplimentationRate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ImplimentationRate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ImplimentationRate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ImplimentationRate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
    <?php if ($Page->SortUrl($Page->EmbryoNo) == "") { ?>
        <th class="<?= $Page->EmbryoNo->headerCellClass() ?>"><?= $Page->EmbryoNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EmbryoNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EmbryoNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EmbryoNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EmbryoNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EmbryoNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
    <?php if ($Page->SortUrl($Page->ExtrauterineSac) == "") { ?>
        <th class="<?= $Page->ExtrauterineSac->headerCellClass() ?>"><?= $Page->ExtrauterineSac->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ExtrauterineSac->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ExtrauterineSac->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ExtrauterineSac->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ExtrauterineSac->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ExtrauterineSac->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
    <?php if ($Page->SortUrl($Page->PregnancyMonozygotic) == "") { ?>
        <th class="<?= $Page->PregnancyMonozygotic->headerCellClass() ?>"><?= $Page->PregnancyMonozygotic->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PregnancyMonozygotic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PregnancyMonozygotic->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PregnancyMonozygotic->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PregnancyMonozygotic->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PregnancyMonozygotic->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
    <?php if ($Page->SortUrl($Page->TypeGestation) == "") { ?>
        <th class="<?= $Page->TypeGestation->headerCellClass() ?>"><?= $Page->TypeGestation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TypeGestation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TypeGestation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TypeGestation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TypeGestation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TypeGestation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
    <?php if ($Page->SortUrl($Page->Urine) == "") { ?>
        <th class="<?= $Page->Urine->headerCellClass() ?>"><?= $Page->Urine->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Urine->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Urine->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Urine->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Urine->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Urine->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
    <?php if ($Page->SortUrl($Page->PTdate) == "") { ?>
        <th class="<?= $Page->PTdate->headerCellClass() ?>"><?= $Page->PTdate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PTdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PTdate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PTdate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PTdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PTdate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
    <?php if ($Page->SortUrl($Page->Reduced) == "") { ?>
        <th class="<?= $Page->Reduced->headerCellClass() ?>"><?= $Page->Reduced->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Reduced->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Reduced->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Reduced->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Reduced->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Reduced->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
    <?php if ($Page->SortUrl($Page->INduced) == "") { ?>
        <th class="<?= $Page->INduced->headerCellClass() ?>"><?= $Page->INduced->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->INduced->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->INduced->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->INduced->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->INduced->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->INduced->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
    <?php if ($Page->SortUrl($Page->INducedDate) == "") { ?>
        <th class="<?= $Page->INducedDate->headerCellClass() ?>"><?= $Page->INducedDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->INducedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->INducedDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->INducedDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->INducedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->INducedDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <?php if ($Page->SortUrl($Page->Miscarriage) == "") { ?>
        <th class="<?= $Page->Miscarriage->headerCellClass() ?>"><?= $Page->Miscarriage->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Miscarriage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Miscarriage->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Miscarriage->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Miscarriage->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Miscarriage->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
    <?php if ($Page->SortUrl($Page->Induced1) == "") { ?>
        <th class="<?= $Page->Induced1->headerCellClass() ?>"><?= $Page->Induced1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Induced1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Induced1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Induced1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Induced1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Induced1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <?php if ($Page->SortUrl($Page->Type) == "") { ?>
        <th class="<?= $Page->Type->headerCellClass() ?>"><?= $Page->Type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
    <?php if ($Page->SortUrl($Page->IfClinical) == "") { ?>
        <th class="<?= $Page->IfClinical->headerCellClass() ?>"><?= $Page->IfClinical->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IfClinical->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IfClinical->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IfClinical->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IfClinical->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IfClinical->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
    <?php if ($Page->SortUrl($Page->GADate) == "") { ?>
        <th class="<?= $Page->GADate->headerCellClass() ?>"><?= $Page->GADate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GADate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GADate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GADate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GADate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GADate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
    <?php if ($Page->SortUrl($Page->GA) == "") { ?>
        <th class="<?= $Page->GA->headerCellClass() ?>"><?= $Page->GA->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GA->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GA->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GA->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GA->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
    <?php if ($Page->SortUrl($Page->FoetalDeath) == "") { ?>
        <th class="<?= $Page->FoetalDeath->headerCellClass() ?>"><?= $Page->FoetalDeath->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FoetalDeath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FoetalDeath->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FoetalDeath->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FoetalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FoetalDeath->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
    <?php if ($Page->SortUrl($Page->FerinatalDeath) == "") { ?>
        <th class="<?= $Page->FerinatalDeath->headerCellClass() ?>"><?= $Page->FerinatalDeath->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FerinatalDeath->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FerinatalDeath->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FerinatalDeath->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FerinatalDeath->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FerinatalDeath->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
    <?php if ($Page->SortUrl($Page->Ectopic) == "") { ?>
        <th class="<?= $Page->Ectopic->headerCellClass() ?>"><?= $Page->Ectopic->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Ectopic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Ectopic->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Ectopic->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Ectopic->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Ectopic->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
    <?php if ($Page->SortUrl($Page->Extra) == "") { ?>
        <th class="<?= $Page->Extra->headerCellClass() ?>"><?= $Page->Extra->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Extra->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Extra->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Extra->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Extra->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Extra->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Implantation->Visible) { // Implantation ?>
    <?php if ($Page->SortUrl($Page->Implantation) == "") { ?>
        <th class="<?= $Page->Implantation->headerCellClass() ?>"><?= $Page->Implantation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Implantation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Implantation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Implantation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Implantation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Implantation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DeliveryDate->Visible) { // DeliveryDate ?>
    <?php if ($Page->SortUrl($Page->DeliveryDate) == "") { ?>
        <th class="<?= $Page->DeliveryDate->headerCellClass() ?>"><?= $Page->DeliveryDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DeliveryDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DeliveryDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DeliveryDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DeliveryDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DeliveryDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
        <!-- RIDNO -->
        <td<?= $Page->RIDNO->cellAttributes() ?>>
<span<?= $Page->RIDNO->viewAttributes() ?>>
<?= $Page->RIDNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <!-- Name -->
        <td<?= $Page->Name->cellAttributes() ?>>
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
        <!-- Age -->
        <td<?= $Page->Age->cellAttributes() ?>>
<span<?= $Page->Age->viewAttributes() ?>>
<?= $Page->Age->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->treatment_status->Visible) { // treatment_status ?>
        <!-- treatment_status -->
        <td<?= $Page->treatment_status->cellAttributes() ?>>
<span<?= $Page->treatment_status->viewAttributes() ?>>
<?= $Page->treatment_status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ARTCYCLE->Visible) { // ARTCYCLE ?>
        <!-- ARTCYCLE -->
        <td<?= $Page->ARTCYCLE->cellAttributes() ?>>
<span<?= $Page->ARTCYCLE->viewAttributes() ?>>
<?= $Page->ARTCYCLE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RESULT->Visible) { // RESULT ?>
        <!-- RESULT -->
        <td<?= $Page->RESULT->cellAttributes() ?>>
<span<?= $Page->RESULT->viewAttributes() ?>>
<?= $Page->RESULT->getViewValue() ?></span>
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
<?php if ($Page->outcomeDate->Visible) { // outcomeDate ?>
        <!-- outcomeDate -->
        <td<?= $Page->outcomeDate->cellAttributes() ?>>
<span<?= $Page->outcomeDate->viewAttributes() ?>>
<?= $Page->outcomeDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->outcomeDay->Visible) { // outcomeDay ?>
        <!-- outcomeDay -->
        <td<?= $Page->outcomeDay->cellAttributes() ?>>
<span<?= $Page->outcomeDay->viewAttributes() ?>>
<?= $Page->outcomeDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OPResult->Visible) { // OPResult ?>
        <!-- OPResult -->
        <td<?= $Page->OPResult->cellAttributes() ?>>
<span<?= $Page->OPResult->viewAttributes() ?>>
<?= $Page->OPResult->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Gestation->Visible) { // Gestation ?>
        <!-- Gestation -->
        <td<?= $Page->Gestation->cellAttributes() ?>>
<span<?= $Page->Gestation->viewAttributes() ?>>
<?= $Page->Gestation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TransferdEmbryos->Visible) { // TransferdEmbryos ?>
        <!-- TransferdEmbryos -->
        <td<?= $Page->TransferdEmbryos->cellAttributes() ?>>
<span<?= $Page->TransferdEmbryos->viewAttributes() ?>>
<?= $Page->TransferdEmbryos->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->InitalOfSacs->Visible) { // InitalOfSacs ?>
        <!-- InitalOfSacs -->
        <td<?= $Page->InitalOfSacs->cellAttributes() ?>>
<span<?= $Page->InitalOfSacs->viewAttributes() ?>>
<?= $Page->InitalOfSacs->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ImplimentationRate->Visible) { // ImplimentationRate ?>
        <!-- ImplimentationRate -->
        <td<?= $Page->ImplimentationRate->cellAttributes() ?>>
<span<?= $Page->ImplimentationRate->viewAttributes() ?>>
<?= $Page->ImplimentationRate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EmbryoNo->Visible) { // EmbryoNo ?>
        <!-- EmbryoNo -->
        <td<?= $Page->EmbryoNo->cellAttributes() ?>>
<span<?= $Page->EmbryoNo->viewAttributes() ?>>
<?= $Page->EmbryoNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ExtrauterineSac->Visible) { // ExtrauterineSac ?>
        <!-- ExtrauterineSac -->
        <td<?= $Page->ExtrauterineSac->cellAttributes() ?>>
<span<?= $Page->ExtrauterineSac->viewAttributes() ?>>
<?= $Page->ExtrauterineSac->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PregnancyMonozygotic->Visible) { // PregnancyMonozygotic ?>
        <!-- PregnancyMonozygotic -->
        <td<?= $Page->PregnancyMonozygotic->cellAttributes() ?>>
<span<?= $Page->PregnancyMonozygotic->viewAttributes() ?>>
<?= $Page->PregnancyMonozygotic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TypeGestation->Visible) { // TypeGestation ?>
        <!-- TypeGestation -->
        <td<?= $Page->TypeGestation->cellAttributes() ?>>
<span<?= $Page->TypeGestation->viewAttributes() ?>>
<?= $Page->TypeGestation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Urine->Visible) { // Urine ?>
        <!-- Urine -->
        <td<?= $Page->Urine->cellAttributes() ?>>
<span<?= $Page->Urine->viewAttributes() ?>>
<?= $Page->Urine->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PTdate->Visible) { // PTdate ?>
        <!-- PTdate -->
        <td<?= $Page->PTdate->cellAttributes() ?>>
<span<?= $Page->PTdate->viewAttributes() ?>>
<?= $Page->PTdate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Reduced->Visible) { // Reduced ?>
        <!-- Reduced -->
        <td<?= $Page->Reduced->cellAttributes() ?>>
<span<?= $Page->Reduced->viewAttributes() ?>>
<?= $Page->Reduced->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->INduced->Visible) { // INduced ?>
        <!-- INduced -->
        <td<?= $Page->INduced->cellAttributes() ?>>
<span<?= $Page->INduced->viewAttributes() ?>>
<?= $Page->INduced->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->INducedDate->Visible) { // INducedDate ?>
        <!-- INducedDate -->
        <td<?= $Page->INducedDate->cellAttributes() ?>>
<span<?= $Page->INducedDate->viewAttributes() ?>>
<?= $Page->INducedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <!-- Miscarriage -->
        <td<?= $Page->Miscarriage->cellAttributes() ?>>
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Induced1->Visible) { // Induced1 ?>
        <!-- Induced1 -->
        <td<?= $Page->Induced1->cellAttributes() ?>>
<span<?= $Page->Induced1->viewAttributes() ?>>
<?= $Page->Induced1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <!-- Type -->
        <td<?= $Page->Type->cellAttributes() ?>>
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IfClinical->Visible) { // IfClinical ?>
        <!-- IfClinical -->
        <td<?= $Page->IfClinical->cellAttributes() ?>>
<span<?= $Page->IfClinical->viewAttributes() ?>>
<?= $Page->IfClinical->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GADate->Visible) { // GADate ?>
        <!-- GADate -->
        <td<?= $Page->GADate->cellAttributes() ?>>
<span<?= $Page->GADate->viewAttributes() ?>>
<?= $Page->GADate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GA->Visible) { // GA ?>
        <!-- GA -->
        <td<?= $Page->GA->cellAttributes() ?>>
<span<?= $Page->GA->viewAttributes() ?>>
<?= $Page->GA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FoetalDeath->Visible) { // FoetalDeath ?>
        <!-- FoetalDeath -->
        <td<?= $Page->FoetalDeath->cellAttributes() ?>>
<span<?= $Page->FoetalDeath->viewAttributes() ?>>
<?= $Page->FoetalDeath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FerinatalDeath->Visible) { // FerinatalDeath ?>
        <!-- FerinatalDeath -->
        <td<?= $Page->FerinatalDeath->cellAttributes() ?>>
<span<?= $Page->FerinatalDeath->viewAttributes() ?>>
<?= $Page->FerinatalDeath->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <!-- TidNo -->
        <td<?= $Page->TidNo->cellAttributes() ?>>
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Ectopic->Visible) { // Ectopic ?>
        <!-- Ectopic -->
        <td<?= $Page->Ectopic->cellAttributes() ?>>
<span<?= $Page->Ectopic->viewAttributes() ?>>
<?= $Page->Ectopic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Extra->Visible) { // Extra ?>
        <!-- Extra -->
        <td<?= $Page->Extra->cellAttributes() ?>>
<span<?= $Page->Extra->viewAttributes() ?>>
<?= $Page->Extra->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Implantation->Visible) { // Implantation ?>
        <!-- Implantation -->
        <td<?= $Page->Implantation->cellAttributes() ?>>
<span<?= $Page->Implantation->viewAttributes() ?>>
<?= $Page->Implantation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DeliveryDate->Visible) { // DeliveryDate ?>
        <!-- DeliveryDate -->
        <td<?= $Page->DeliveryDate->cellAttributes() ?>>
<span<?= $Page->DeliveryDate->viewAttributes() ?>>
<?= $Page->DeliveryDate->getViewValue() ?></span>
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

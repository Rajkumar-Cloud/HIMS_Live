<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfEmbryologyChartPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_embryology_chart"><!-- .card -->
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
<?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
    <?php if ($Page->SortUrl($Page->SpermOrigin) == "") { ?>
        <th class="<?= $Page->SpermOrigin->headerCellClass() ?>"><?= $Page->SpermOrigin->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SpermOrigin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SpermOrigin->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SpermOrigin->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SpermOrigin->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SpermOrigin->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
    <?php if ($Page->SortUrl($Page->Day0sino) == "") { ?>
        <th class="<?= $Page->Day0sino->headerCellClass() ?>"><?= $Page->Day0sino->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day0sino->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day0sino->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day0sino->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day0sino->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day0sino->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
    <?php if ($Page->SortUrl($Page->Day0OocyteStage) == "") { ?>
        <th class="<?= $Page->Day0OocyteStage->headerCellClass() ?>"><?= $Page->Day0OocyteStage->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day0OocyteStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day0OocyteStage->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day0OocyteStage->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day0OocyteStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day0OocyteStage->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
    <?php if ($Page->SortUrl($Page->Day0PolarBodyPosition) == "") { ?>
        <th class="<?= $Page->Day0PolarBodyPosition->headerCellClass() ?>"><?= $Page->Day0PolarBodyPosition->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day0PolarBodyPosition->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day0PolarBodyPosition->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day0PolarBodyPosition->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day0PolarBodyPosition->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day0PolarBodyPosition->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
    <?php if ($Page->SortUrl($Page->Day0Breakage) == "") { ?>
        <th class="<?= $Page->Day0Breakage->headerCellClass() ?>"><?= $Page->Day0Breakage->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day0Breakage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day0Breakage->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day0Breakage->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day0Breakage->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day0Breakage->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
    <?php if ($Page->SortUrl($Page->Day0Attempts) == "") { ?>
        <th class="<?= $Page->Day0Attempts->headerCellClass() ?>"><?= $Page->Day0Attempts->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day0Attempts->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day0Attempts->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day0Attempts->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day0Attempts->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day0Attempts->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
    <?php if ($Page->SortUrl($Page->Day0SPZMorpho) == "") { ?>
        <th class="<?= $Page->Day0SPZMorpho->headerCellClass() ?>"><?= $Page->Day0SPZMorpho->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day0SPZMorpho->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day0SPZMorpho->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day0SPZMorpho->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day0SPZMorpho->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day0SPZMorpho->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
    <?php if ($Page->SortUrl($Page->Day0SPZLocation) == "") { ?>
        <th class="<?= $Page->Day0SPZLocation->headerCellClass() ?>"><?= $Page->Day0SPZLocation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day0SPZLocation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day0SPZLocation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day0SPZLocation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day0SPZLocation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day0SPZLocation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
    <?php if ($Page->SortUrl($Page->Day0SpOrgin) == "") { ?>
        <th class="<?= $Page->Day0SpOrgin->headerCellClass() ?>"><?= $Page->Day0SpOrgin->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day0SpOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day0SpOrgin->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day0SpOrgin->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day0SpOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day0SpOrgin->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
    <?php if ($Page->SortUrl($Page->Day5Cryoptop) == "") { ?>
        <th class="<?= $Page->Day5Cryoptop->headerCellClass() ?>"><?= $Page->Day5Cryoptop->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day5Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day5Cryoptop->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day5Cryoptop->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day5Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day5Cryoptop->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
    <?php if ($Page->SortUrl($Page->Day1Sperm) == "") { ?>
        <th class="<?= $Page->Day1Sperm->headerCellClass() ?>"><?= $Page->Day1Sperm->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day1Sperm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day1Sperm->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day1Sperm->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day1Sperm->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day1Sperm->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day1PN->Visible) { // Day1PN ?>
    <?php if ($Page->SortUrl($Page->Day1PN) == "") { ?>
        <th class="<?= $Page->Day1PN->headerCellClass() ?>"><?= $Page->Day1PN->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day1PN->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day1PN->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day1PN->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day1PN->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day1PN->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day1PB->Visible) { // Day1PB ?>
    <?php if ($Page->SortUrl($Page->Day1PB) == "") { ?>
        <th class="<?= $Page->Day1PB->headerCellClass() ?>"><?= $Page->Day1PB->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day1PB->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day1PB->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day1PB->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day1PB->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day1PB->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
    <?php if ($Page->SortUrl($Page->Day1Pronucleus) == "") { ?>
        <th class="<?= $Page->Day1Pronucleus->headerCellClass() ?>"><?= $Page->Day1Pronucleus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day1Pronucleus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day1Pronucleus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day1Pronucleus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day1Pronucleus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day1Pronucleus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
    <?php if ($Page->SortUrl($Page->Day1Nucleolus) == "") { ?>
        <th class="<?= $Page->Day1Nucleolus->headerCellClass() ?>"><?= $Page->Day1Nucleolus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day1Nucleolus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day1Nucleolus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day1Nucleolus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day1Nucleolus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day1Nucleolus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
    <?php if ($Page->SortUrl($Page->Day1Halo) == "") { ?>
        <th class="<?= $Page->Day1Halo->headerCellClass() ?>"><?= $Page->Day1Halo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day1Halo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day1Halo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day1Halo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day1Halo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day1Halo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
    <?php if ($Page->SortUrl($Page->Day2SiNo) == "") { ?>
        <th class="<?= $Page->Day2SiNo->headerCellClass() ?>"><?= $Page->Day2SiNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day2SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day2SiNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day2SiNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day2SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day2SiNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
    <?php if ($Page->SortUrl($Page->Day2CellNo) == "") { ?>
        <th class="<?= $Page->Day2CellNo->headerCellClass() ?>"><?= $Page->Day2CellNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day2CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day2CellNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day2CellNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day2CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day2CellNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
    <?php if ($Page->SortUrl($Page->Day2Frag) == "") { ?>
        <th class="<?= $Page->Day2Frag->headerCellClass() ?>"><?= $Page->Day2Frag->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day2Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day2Frag->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day2Frag->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day2Frag->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day2Frag->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
    <?php if ($Page->SortUrl($Page->Day2Symmetry) == "") { ?>
        <th class="<?= $Page->Day2Symmetry->headerCellClass() ?>"><?= $Page->Day2Symmetry->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day2Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day2Symmetry->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day2Symmetry->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day2Symmetry->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day2Symmetry->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
    <?php if ($Page->SortUrl($Page->Day2Cryoptop) == "") { ?>
        <th class="<?= $Page->Day2Cryoptop->headerCellClass() ?>"><?= $Page->Day2Cryoptop->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day2Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day2Cryoptop->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day2Cryoptop->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day2Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day2Cryoptop->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
    <?php if ($Page->SortUrl($Page->Day2Grade) == "") { ?>
        <th class="<?= $Page->Day2Grade->headerCellClass() ?>"><?= $Page->Day2Grade->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day2Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day2Grade->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day2Grade->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day2Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day2Grade->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day2End->Visible) { // Day2End ?>
    <?php if ($Page->SortUrl($Page->Day2End) == "") { ?>
        <th class="<?= $Page->Day2End->headerCellClass() ?>"><?= $Page->Day2End->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day2End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day2End->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day2End->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day2End->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day2End->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
    <?php if ($Page->SortUrl($Page->Day3Sino) == "") { ?>
        <th class="<?= $Page->Day3Sino->headerCellClass() ?>"><?= $Page->Day3Sino->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3Sino->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3Sino->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3Sino->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3Sino->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3Sino->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
    <?php if ($Page->SortUrl($Page->Day3CellNo) == "") { ?>
        <th class="<?= $Page->Day3CellNo->headerCellClass() ?>"><?= $Page->Day3CellNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3CellNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3CellNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3CellNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
    <?php if ($Page->SortUrl($Page->Day3Frag) == "") { ?>
        <th class="<?= $Page->Day3Frag->headerCellClass() ?>"><?= $Page->Day3Frag->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3Frag->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3Frag->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3Frag->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3Frag->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
    <?php if ($Page->SortUrl($Page->Day3Symmetry) == "") { ?>
        <th class="<?= $Page->Day3Symmetry->headerCellClass() ?>"><?= $Page->Day3Symmetry->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3Symmetry->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3Symmetry->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3Symmetry->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3Symmetry->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
    <?php if ($Page->SortUrl($Page->Day3ZP) == "") { ?>
        <th class="<?= $Page->Day3ZP->headerCellClass() ?>"><?= $Page->Day3ZP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3ZP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3ZP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3ZP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3ZP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3ZP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
    <?php if ($Page->SortUrl($Page->Day3Vacoules) == "") { ?>
        <th class="<?= $Page->Day3Vacoules->headerCellClass() ?>"><?= $Page->Day3Vacoules->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3Vacoules->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3Vacoules->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3Vacoules->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3Vacoules->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3Vacoules->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
    <?php if ($Page->SortUrl($Page->Day3Grade) == "") { ?>
        <th class="<?= $Page->Day3Grade->headerCellClass() ?>"><?= $Page->Day3Grade->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3Grade->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3Grade->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3Grade->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
    <?php if ($Page->SortUrl($Page->Day3Cryoptop) == "") { ?>
        <th class="<?= $Page->Day3Cryoptop->headerCellClass() ?>"><?= $Page->Day3Cryoptop->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3Cryoptop->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3Cryoptop->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3Cryoptop->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day3End->Visible) { // Day3End ?>
    <?php if ($Page->SortUrl($Page->Day3End) == "") { ?>
        <th class="<?= $Page->Day3End->headerCellClass() ?>"><?= $Page->Day3End->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day3End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day3End->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day3End->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day3End->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day3End->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
    <?php if ($Page->SortUrl($Page->Day4SiNo) == "") { ?>
        <th class="<?= $Page->Day4SiNo->headerCellClass() ?>"><?= $Page->Day4SiNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day4SiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day4SiNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day4SiNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day4SiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day4SiNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
    <?php if ($Page->SortUrl($Page->Day4CellNo) == "") { ?>
        <th class="<?= $Page->Day4CellNo->headerCellClass() ?>"><?= $Page->Day4CellNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day4CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day4CellNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day4CellNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day4CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day4CellNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
    <?php if ($Page->SortUrl($Page->Day4Frag) == "") { ?>
        <th class="<?= $Page->Day4Frag->headerCellClass() ?>"><?= $Page->Day4Frag->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day4Frag->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day4Frag->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day4Frag->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day4Frag->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day4Frag->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
    <?php if ($Page->SortUrl($Page->Day4Symmetry) == "") { ?>
        <th class="<?= $Page->Day4Symmetry->headerCellClass() ?>"><?= $Page->Day4Symmetry->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day4Symmetry->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day4Symmetry->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day4Symmetry->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day4Symmetry->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day4Symmetry->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
    <?php if ($Page->SortUrl($Page->Day4Grade) == "") { ?>
        <th class="<?= $Page->Day4Grade->headerCellClass() ?>"><?= $Page->Day4Grade->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day4Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day4Grade->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day4Grade->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day4Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day4Grade->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
    <?php if ($Page->SortUrl($Page->Day4Cryoptop) == "") { ?>
        <th class="<?= $Page->Day4Cryoptop->headerCellClass() ?>"><?= $Page->Day4Cryoptop->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day4Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day4Cryoptop->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day4Cryoptop->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day4Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day4Cryoptop->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day4End->Visible) { // Day4End ?>
    <?php if ($Page->SortUrl($Page->Day4End) == "") { ?>
        <th class="<?= $Page->Day4End->headerCellClass() ?>"><?= $Page->Day4End->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day4End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day4End->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day4End->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day4End->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day4End->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
    <?php if ($Page->SortUrl($Page->Day5CellNo) == "") { ?>
        <th class="<?= $Page->Day5CellNo->headerCellClass() ?>"><?= $Page->Day5CellNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day5CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day5CellNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day5CellNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day5CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day5CellNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
    <?php if ($Page->SortUrl($Page->Day5ICM) == "") { ?>
        <th class="<?= $Page->Day5ICM->headerCellClass() ?>"><?= $Page->Day5ICM->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day5ICM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day5ICM->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day5ICM->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day5ICM->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day5ICM->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day5TE->Visible) { // Day5TE ?>
    <?php if ($Page->SortUrl($Page->Day5TE) == "") { ?>
        <th class="<?= $Page->Day5TE->headerCellClass() ?>"><?= $Page->Day5TE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day5TE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day5TE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day5TE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day5TE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day5TE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
    <?php if ($Page->SortUrl($Page->Day5Observation) == "") { ?>
        <th class="<?= $Page->Day5Observation->headerCellClass() ?>"><?= $Page->Day5Observation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day5Observation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day5Observation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day5Observation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day5Observation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day5Observation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
    <?php if ($Page->SortUrl($Page->Day5Collapsed) == "") { ?>
        <th class="<?= $Page->Day5Collapsed->headerCellClass() ?>"><?= $Page->Day5Collapsed->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day5Collapsed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day5Collapsed->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day5Collapsed->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day5Collapsed->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day5Collapsed->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
    <?php if ($Page->SortUrl($Page->Day5Vacoulles) == "") { ?>
        <th class="<?= $Page->Day5Vacoulles->headerCellClass() ?>"><?= $Page->Day5Vacoulles->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day5Vacoulles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day5Vacoulles->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day5Vacoulles->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day5Vacoulles->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day5Vacoulles->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
    <?php if ($Page->SortUrl($Page->Day5Grade) == "") { ?>
        <th class="<?= $Page->Day5Grade->headerCellClass() ?>"><?= $Page->Day5Grade->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day5Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day5Grade->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day5Grade->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day5Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day5Grade->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
    <?php if ($Page->SortUrl($Page->Day6CellNo) == "") { ?>
        <th class="<?= $Page->Day6CellNo->headerCellClass() ?>"><?= $Page->Day6CellNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day6CellNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day6CellNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day6CellNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day6CellNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day6CellNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
    <?php if ($Page->SortUrl($Page->Day6ICM) == "") { ?>
        <th class="<?= $Page->Day6ICM->headerCellClass() ?>"><?= $Page->Day6ICM->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day6ICM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day6ICM->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day6ICM->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day6ICM->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day6ICM->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day6TE->Visible) { // Day6TE ?>
    <?php if ($Page->SortUrl($Page->Day6TE) == "") { ?>
        <th class="<?= $Page->Day6TE->headerCellClass() ?>"><?= $Page->Day6TE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day6TE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day6TE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day6TE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day6TE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day6TE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
    <?php if ($Page->SortUrl($Page->Day6Observation) == "") { ?>
        <th class="<?= $Page->Day6Observation->headerCellClass() ?>"><?= $Page->Day6Observation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day6Observation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day6Observation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day6Observation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day6Observation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day6Observation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
    <?php if ($Page->SortUrl($Page->Day6Collapsed) == "") { ?>
        <th class="<?= $Page->Day6Collapsed->headerCellClass() ?>"><?= $Page->Day6Collapsed->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day6Collapsed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day6Collapsed->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day6Collapsed->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day6Collapsed->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day6Collapsed->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
    <?php if ($Page->SortUrl($Page->Day6Vacoulles) == "") { ?>
        <th class="<?= $Page->Day6Vacoulles->headerCellClass() ?>"><?= $Page->Day6Vacoulles->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day6Vacoulles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day6Vacoulles->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day6Vacoulles->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day6Vacoulles->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day6Vacoulles->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
    <?php if ($Page->SortUrl($Page->Day6Grade) == "") { ?>
        <th class="<?= $Page->Day6Grade->headerCellClass() ?>"><?= $Page->Day6Grade->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day6Grade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day6Grade->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day6Grade->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day6Grade->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day6Grade->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
    <?php if ($Page->SortUrl($Page->Day6Cryoptop) == "") { ?>
        <th class="<?= $Page->Day6Cryoptop->headerCellClass() ?>"><?= $Page->Day6Cryoptop->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day6Cryoptop->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day6Cryoptop->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day6Cryoptop->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day6Cryoptop->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day6Cryoptop->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
    <?php if ($Page->SortUrl($Page->EndSiNo) == "") { ?>
        <th class="<?= $Page->EndSiNo->headerCellClass() ?>"><?= $Page->EndSiNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EndSiNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EndSiNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EndSiNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EndSiNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EndSiNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EndingDay->Visible) { // EndingDay ?>
    <?php if ($Page->SortUrl($Page->EndingDay) == "") { ?>
        <th class="<?= $Page->EndingDay->headerCellClass() ?>"><?= $Page->EndingDay->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EndingDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EndingDay->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EndingDay->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EndingDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EndingDay->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
    <?php if ($Page->SortUrl($Page->EndingCellStage) == "") { ?>
        <th class="<?= $Page->EndingCellStage->headerCellClass() ?>"><?= $Page->EndingCellStage->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EndingCellStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EndingCellStage->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EndingCellStage->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EndingCellStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EndingCellStage->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
    <?php if ($Page->SortUrl($Page->EndingGrade) == "") { ?>
        <th class="<?= $Page->EndingGrade->headerCellClass() ?>"><?= $Page->EndingGrade->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EndingGrade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EndingGrade->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EndingGrade->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EndingGrade->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EndingGrade->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EndingState->Visible) { // EndingState ?>
    <?php if ($Page->SortUrl($Page->EndingState) == "") { ?>
        <th class="<?= $Page->EndingState->headerCellClass() ?>"><?= $Page->EndingState->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EndingState->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EndingState->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EndingState->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EndingState->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EndingState->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->DidNO->Visible) { // DidNO ?>
    <?php if ($Page->SortUrl($Page->DidNO) == "") { ?>
        <th class="<?= $Page->DidNO->headerCellClass() ?>"><?= $Page->DidNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DidNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DidNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DidNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DidNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DidNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
    <?php if ($Page->SortUrl($Page->ICSiIVFDateTime) == "") { ?>
        <th class="<?= $Page->ICSiIVFDateTime->headerCellClass() ?>"><?= $Page->ICSiIVFDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ICSiIVFDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ICSiIVFDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ICSiIVFDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ICSiIVFDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ICSiIVFDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
    <?php if ($Page->SortUrl($Page->PrimaryEmbrologist) == "") { ?>
        <th class="<?= $Page->PrimaryEmbrologist->headerCellClass() ?>"><?= $Page->PrimaryEmbrologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PrimaryEmbrologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PrimaryEmbrologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PrimaryEmbrologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PrimaryEmbrologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PrimaryEmbrologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
    <?php if ($Page->SortUrl($Page->SecondaryEmbrologist) == "") { ?>
        <th class="<?= $Page->SecondaryEmbrologist->headerCellClass() ?>"><?= $Page->SecondaryEmbrologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SecondaryEmbrologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SecondaryEmbrologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SecondaryEmbrologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SecondaryEmbrologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SecondaryEmbrologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
    <?php if ($Page->SortUrl($Page->Incubator) == "") { ?>
        <th class="<?= $Page->Incubator->headerCellClass() ?>"><?= $Page->Incubator->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Incubator->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Incubator->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Incubator->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Incubator->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Incubator->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
    <?php if ($Page->SortUrl($Page->location) == "") { ?>
        <th class="<?= $Page->location->headerCellClass() ?>"><?= $Page->location->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->location->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->location->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->location->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->location->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->location->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
    <?php if ($Page->SortUrl($Page->OocyteNo) == "") { ?>
        <th class="<?= $Page->OocyteNo->headerCellClass() ?>"><?= $Page->OocyteNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->OocyteNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->OocyteNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->OocyteNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->OocyteNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->OocyteNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
    <?php if ($Page->SortUrl($Page->Stage) == "") { ?>
        <th class="<?= $Page->Stage->headerCellClass() ?>"><?= $Page->Stage->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Stage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Stage->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Stage->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Stage->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Stage->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
    <?php if ($Page->SortUrl($Page->vitrificationDate) == "") { ?>
        <th class="<?= $Page->vitrificationDate->headerCellClass() ?>"><?= $Page->vitrificationDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitrificationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitrificationDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitrificationDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitrificationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitrificationDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
    <?php if ($Page->SortUrl($Page->vitriPrimaryEmbryologist) == "") { ?>
        <th class="<?= $Page->vitriPrimaryEmbryologist->headerCellClass() ?>"><?= $Page->vitriPrimaryEmbryologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriPrimaryEmbryologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriPrimaryEmbryologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriPrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriPrimaryEmbryologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
    <?php if ($Page->SortUrl($Page->vitriSecondaryEmbryologist) == "") { ?>
        <th class="<?= $Page->vitriSecondaryEmbryologist->headerCellClass() ?>"><?= $Page->vitriSecondaryEmbryologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriSecondaryEmbryologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriSecondaryEmbryologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriSecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriSecondaryEmbryologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
    <?php if ($Page->SortUrl($Page->vitriEmbryoNo) == "") { ?>
        <th class="<?= $Page->vitriEmbryoNo->headerCellClass() ?>"><?= $Page->vitriEmbryoNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriEmbryoNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriEmbryoNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriEmbryoNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriEmbryoNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriEmbryoNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
    <?php if ($Page->SortUrl($Page->thawReFrozen) == "") { ?>
        <th class="<?= $Page->thawReFrozen->headerCellClass() ?>"><?= $Page->thawReFrozen->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->thawReFrozen->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->thawReFrozen->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->thawReFrozen->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->thawReFrozen->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->thawReFrozen->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
    <?php if ($Page->SortUrl($Page->vitriFertilisationDate) == "") { ?>
        <th class="<?= $Page->vitriFertilisationDate->headerCellClass() ?>"><?= $Page->vitriFertilisationDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriFertilisationDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriFertilisationDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriFertilisationDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriFertilisationDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriFertilisationDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriDay->Visible) { // vitriDay ?>
    <?php if ($Page->SortUrl($Page->vitriDay) == "") { ?>
        <th class="<?= $Page->vitriDay->headerCellClass() ?>"><?= $Page->vitriDay->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriDay->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriDay->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriDay->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriStage->Visible) { // vitriStage ?>
    <?php if ($Page->SortUrl($Page->vitriStage) == "") { ?>
        <th class="<?= $Page->vitriStage->headerCellClass() ?>"><?= $Page->vitriStage->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriStage->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriStage->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriStage->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriStage->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriStage->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
    <?php if ($Page->SortUrl($Page->vitriGrade) == "") { ?>
        <th class="<?= $Page->vitriGrade->headerCellClass() ?>"><?= $Page->vitriGrade->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriGrade->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriGrade->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriGrade->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriGrade->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriGrade->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
    <?php if ($Page->SortUrl($Page->vitriIncubator) == "") { ?>
        <th class="<?= $Page->vitriIncubator->headerCellClass() ?>"><?= $Page->vitriIncubator->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriIncubator->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriIncubator->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriIncubator->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriIncubator->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriIncubator->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriTank->Visible) { // vitriTank ?>
    <?php if ($Page->SortUrl($Page->vitriTank) == "") { ?>
        <th class="<?= $Page->vitriTank->headerCellClass() ?>"><?= $Page->vitriTank->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriTank->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriTank->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriTank->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriTank->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriTank->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
    <?php if ($Page->SortUrl($Page->vitriCanister) == "") { ?>
        <th class="<?= $Page->vitriCanister->headerCellClass() ?>"><?= $Page->vitriCanister->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriCanister->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriCanister->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriCanister->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriCanister->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriCanister->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
    <?php if ($Page->SortUrl($Page->vitriGobiet) == "") { ?>
        <th class="<?= $Page->vitriGobiet->headerCellClass() ?>"><?= $Page->vitriGobiet->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriGobiet->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriGobiet->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriGobiet->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriGobiet->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriGobiet->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
    <?php if ($Page->SortUrl($Page->vitriViscotube) == "") { ?>
        <th class="<?= $Page->vitriViscotube->headerCellClass() ?>"><?= $Page->vitriViscotube->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriViscotube->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriViscotube->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriViscotube->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriViscotube->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriViscotube->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
    <?php if ($Page->SortUrl($Page->vitriCryolockNo) == "") { ?>
        <th class="<?= $Page->vitriCryolockNo->headerCellClass() ?>"><?= $Page->vitriCryolockNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriCryolockNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriCryolockNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriCryolockNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriCryolockNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriCryolockNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
    <?php if ($Page->SortUrl($Page->vitriCryolockColour) == "") { ?>
        <th class="<?= $Page->vitriCryolockColour->headerCellClass() ?>"><?= $Page->vitriCryolockColour->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vitriCryolockColour->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vitriCryolockColour->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vitriCryolockColour->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vitriCryolockColour->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vitriCryolockColour->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
    <?php if ($Page->SortUrl($Page->thawDate) == "") { ?>
        <th class="<?= $Page->thawDate->headerCellClass() ?>"><?= $Page->thawDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->thawDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->thawDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->thawDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->thawDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->thawDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
    <?php if ($Page->SortUrl($Page->thawPrimaryEmbryologist) == "") { ?>
        <th class="<?= $Page->thawPrimaryEmbryologist->headerCellClass() ?>"><?= $Page->thawPrimaryEmbryologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->thawPrimaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->thawPrimaryEmbryologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->thawPrimaryEmbryologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->thawPrimaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->thawPrimaryEmbryologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
    <?php if ($Page->SortUrl($Page->thawSecondaryEmbryologist) == "") { ?>
        <th class="<?= $Page->thawSecondaryEmbryologist->headerCellClass() ?>"><?= $Page->thawSecondaryEmbryologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->thawSecondaryEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->thawSecondaryEmbryologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->thawSecondaryEmbryologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->thawSecondaryEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->thawSecondaryEmbryologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
    <?php if ($Page->SortUrl($Page->thawET) == "") { ?>
        <th class="<?= $Page->thawET->headerCellClass() ?>"><?= $Page->thawET->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->thawET->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->thawET->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->thawET->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->thawET->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->thawET->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
    <?php if ($Page->SortUrl($Page->thawAbserve) == "") { ?>
        <th class="<?= $Page->thawAbserve->headerCellClass() ?>"><?= $Page->thawAbserve->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->thawAbserve->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->thawAbserve->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->thawAbserve->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->thawAbserve->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->thawAbserve->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
    <?php if ($Page->SortUrl($Page->thawDiscard) == "") { ?>
        <th class="<?= $Page->thawDiscard->headerCellClass() ?>"><?= $Page->thawDiscard->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->thawDiscard->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->thawDiscard->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->thawDiscard->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->thawDiscard->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->thawDiscard->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
    <?php if ($Page->SortUrl($Page->ETCatheter) == "") { ?>
        <th class="<?= $Page->ETCatheter->headerCellClass() ?>"><?= $Page->ETCatheter->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ETCatheter->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ETCatheter->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ETCatheter->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ETCatheter->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ETCatheter->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
    <?php if ($Page->SortUrl($Page->ETDifficulty) == "") { ?>
        <th class="<?= $Page->ETDifficulty->headerCellClass() ?>"><?= $Page->ETDifficulty->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ETDifficulty->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ETDifficulty->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ETDifficulty->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ETDifficulty->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ETDifficulty->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ETEasy->Visible) { // ETEasy ?>
    <?php if ($Page->SortUrl($Page->ETEasy) == "") { ?>
        <th class="<?= $Page->ETEasy->headerCellClass() ?>"><?= $Page->ETEasy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ETEasy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ETEasy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ETEasy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ETEasy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ETEasy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ETComments->Visible) { // ETComments ?>
    <?php if ($Page->SortUrl($Page->ETComments) == "") { ?>
        <th class="<?= $Page->ETComments->headerCellClass() ?>"><?= $Page->ETComments->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ETComments->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ETComments->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ETComments->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ETComments->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ETComments->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
    <?php if ($Page->SortUrl($Page->ETDoctor) == "") { ?>
        <th class="<?= $Page->ETDoctor->headerCellClass() ?>"><?= $Page->ETDoctor->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ETDoctor->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ETDoctor->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ETDoctor->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ETDoctor->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ETDoctor->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
    <?php if ($Page->SortUrl($Page->ETEmbryologist) == "") { ?>
        <th class="<?= $Page->ETEmbryologist->headerCellClass() ?>"><?= $Page->ETEmbryologist->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ETEmbryologist->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ETEmbryologist->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ETEmbryologist->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ETEmbryologist->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ETEmbryologist->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
    <?php if ($Page->SortUrl($Page->ETDate) == "") { ?>
        <th class="<?= $Page->ETDate->headerCellClass() ?>"><?= $Page->ETDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ETDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ETDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ETDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ETDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ETDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Day1End->Visible) { // Day1End ?>
    <?php if ($Page->SortUrl($Page->Day1End) == "") { ?>
        <th class="<?= $Page->Day1End->headerCellClass() ?>"><?= $Page->Day1End->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Day1End->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Day1End->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Day1End->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Day1End->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Day1End->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->SpermOrigin->Visible) { // SpermOrigin ?>
        <!-- SpermOrigin -->
        <td<?= $Page->SpermOrigin->cellAttributes() ?>>
<span<?= $Page->SpermOrigin->viewAttributes() ?>>
<?= $Page->SpermOrigin->getViewValue() ?></span>
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
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <!-- Day0sino -->
        <td<?= $Page->Day0sino->cellAttributes() ?>>
<span<?= $Page->Day0sino->viewAttributes() ?>>
<?= $Page->Day0sino->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <!-- Day0OocyteStage -->
        <td<?= $Page->Day0OocyteStage->cellAttributes() ?>>
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day0PolarBodyPosition->Visible) { // Day0PolarBodyPosition ?>
        <!-- Day0PolarBodyPosition -->
        <td<?= $Page->Day0PolarBodyPosition->cellAttributes() ?>>
<span<?= $Page->Day0PolarBodyPosition->viewAttributes() ?>>
<?= $Page->Day0PolarBodyPosition->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day0Breakage->Visible) { // Day0Breakage ?>
        <!-- Day0Breakage -->
        <td<?= $Page->Day0Breakage->cellAttributes() ?>>
<span<?= $Page->Day0Breakage->viewAttributes() ?>>
<?= $Page->Day0Breakage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day0Attempts->Visible) { // Day0Attempts ?>
        <!-- Day0Attempts -->
        <td<?= $Page->Day0Attempts->cellAttributes() ?>>
<span<?= $Page->Day0Attempts->viewAttributes() ?>>
<?= $Page->Day0Attempts->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day0SPZMorpho->Visible) { // Day0SPZMorpho ?>
        <!-- Day0SPZMorpho -->
        <td<?= $Page->Day0SPZMorpho->cellAttributes() ?>>
<span<?= $Page->Day0SPZMorpho->viewAttributes() ?>>
<?= $Page->Day0SPZMorpho->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day0SPZLocation->Visible) { // Day0SPZLocation ?>
        <!-- Day0SPZLocation -->
        <td<?= $Page->Day0SPZLocation->cellAttributes() ?>>
<span<?= $Page->Day0SPZLocation->viewAttributes() ?>>
<?= $Page->Day0SPZLocation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day0SpOrgin->Visible) { // Day0SpOrgin ?>
        <!-- Day0SpOrgin -->
        <td<?= $Page->Day0SpOrgin->cellAttributes() ?>>
<span<?= $Page->Day0SpOrgin->viewAttributes() ?>>
<?= $Page->Day0SpOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day5Cryoptop->Visible) { // Day5Cryoptop ?>
        <!-- Day5Cryoptop -->
        <td<?= $Page->Day5Cryoptop->cellAttributes() ?>>
<span<?= $Page->Day5Cryoptop->viewAttributes() ?>>
<?= $Page->Day5Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day1Sperm->Visible) { // Day1Sperm ?>
        <!-- Day1Sperm -->
        <td<?= $Page->Day1Sperm->cellAttributes() ?>>
<span<?= $Page->Day1Sperm->viewAttributes() ?>>
<?= $Page->Day1Sperm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day1PN->Visible) { // Day1PN ?>
        <!-- Day1PN -->
        <td<?= $Page->Day1PN->cellAttributes() ?>>
<span<?= $Page->Day1PN->viewAttributes() ?>>
<?= $Page->Day1PN->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day1PB->Visible) { // Day1PB ?>
        <!-- Day1PB -->
        <td<?= $Page->Day1PB->cellAttributes() ?>>
<span<?= $Page->Day1PB->viewAttributes() ?>>
<?= $Page->Day1PB->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day1Pronucleus->Visible) { // Day1Pronucleus ?>
        <!-- Day1Pronucleus -->
        <td<?= $Page->Day1Pronucleus->cellAttributes() ?>>
<span<?= $Page->Day1Pronucleus->viewAttributes() ?>>
<?= $Page->Day1Pronucleus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day1Nucleolus->Visible) { // Day1Nucleolus ?>
        <!-- Day1Nucleolus -->
        <td<?= $Page->Day1Nucleolus->cellAttributes() ?>>
<span<?= $Page->Day1Nucleolus->viewAttributes() ?>>
<?= $Page->Day1Nucleolus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day1Halo->Visible) { // Day1Halo ?>
        <!-- Day1Halo -->
        <td<?= $Page->Day1Halo->cellAttributes() ?>>
<span<?= $Page->Day1Halo->viewAttributes() ?>>
<?= $Page->Day1Halo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day2SiNo->Visible) { // Day2SiNo ?>
        <!-- Day2SiNo -->
        <td<?= $Page->Day2SiNo->cellAttributes() ?>>
<span<?= $Page->Day2SiNo->viewAttributes() ?>>
<?= $Page->Day2SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day2CellNo->Visible) { // Day2CellNo ?>
        <!-- Day2CellNo -->
        <td<?= $Page->Day2CellNo->cellAttributes() ?>>
<span<?= $Page->Day2CellNo->viewAttributes() ?>>
<?= $Page->Day2CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day2Frag->Visible) { // Day2Frag ?>
        <!-- Day2Frag -->
        <td<?= $Page->Day2Frag->cellAttributes() ?>>
<span<?= $Page->Day2Frag->viewAttributes() ?>>
<?= $Page->Day2Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day2Symmetry->Visible) { // Day2Symmetry ?>
        <!-- Day2Symmetry -->
        <td<?= $Page->Day2Symmetry->cellAttributes() ?>>
<span<?= $Page->Day2Symmetry->viewAttributes() ?>>
<?= $Page->Day2Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day2Cryoptop->Visible) { // Day2Cryoptop ?>
        <!-- Day2Cryoptop -->
        <td<?= $Page->Day2Cryoptop->cellAttributes() ?>>
<span<?= $Page->Day2Cryoptop->viewAttributes() ?>>
<?= $Page->Day2Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day2Grade->Visible) { // Day2Grade ?>
        <!-- Day2Grade -->
        <td<?= $Page->Day2Grade->cellAttributes() ?>>
<span<?= $Page->Day2Grade->viewAttributes() ?>>
<?= $Page->Day2Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day2End->Visible) { // Day2End ?>
        <!-- Day2End -->
        <td<?= $Page->Day2End->cellAttributes() ?>>
<span<?= $Page->Day2End->viewAttributes() ?>>
<?= $Page->Day2End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3Sino->Visible) { // Day3Sino ?>
        <!-- Day3Sino -->
        <td<?= $Page->Day3Sino->cellAttributes() ?>>
<span<?= $Page->Day3Sino->viewAttributes() ?>>
<?= $Page->Day3Sino->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3CellNo->Visible) { // Day3CellNo ?>
        <!-- Day3CellNo -->
        <td<?= $Page->Day3CellNo->cellAttributes() ?>>
<span<?= $Page->Day3CellNo->viewAttributes() ?>>
<?= $Page->Day3CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3Frag->Visible) { // Day3Frag ?>
        <!-- Day3Frag -->
        <td<?= $Page->Day3Frag->cellAttributes() ?>>
<span<?= $Page->Day3Frag->viewAttributes() ?>>
<?= $Page->Day3Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3Symmetry->Visible) { // Day3Symmetry ?>
        <!-- Day3Symmetry -->
        <td<?= $Page->Day3Symmetry->cellAttributes() ?>>
<span<?= $Page->Day3Symmetry->viewAttributes() ?>>
<?= $Page->Day3Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3ZP->Visible) { // Day3ZP ?>
        <!-- Day3ZP -->
        <td<?= $Page->Day3ZP->cellAttributes() ?>>
<span<?= $Page->Day3ZP->viewAttributes() ?>>
<?= $Page->Day3ZP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3Vacoules->Visible) { // Day3Vacoules ?>
        <!-- Day3Vacoules -->
        <td<?= $Page->Day3Vacoules->cellAttributes() ?>>
<span<?= $Page->Day3Vacoules->viewAttributes() ?>>
<?= $Page->Day3Vacoules->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3Grade->Visible) { // Day3Grade ?>
        <!-- Day3Grade -->
        <td<?= $Page->Day3Grade->cellAttributes() ?>>
<span<?= $Page->Day3Grade->viewAttributes() ?>>
<?= $Page->Day3Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3Cryoptop->Visible) { // Day3Cryoptop ?>
        <!-- Day3Cryoptop -->
        <td<?= $Page->Day3Cryoptop->cellAttributes() ?>>
<span<?= $Page->Day3Cryoptop->viewAttributes() ?>>
<?= $Page->Day3Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day3End->Visible) { // Day3End ?>
        <!-- Day3End -->
        <td<?= $Page->Day3End->cellAttributes() ?>>
<span<?= $Page->Day3End->viewAttributes() ?>>
<?= $Page->Day3End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day4SiNo->Visible) { // Day4SiNo ?>
        <!-- Day4SiNo -->
        <td<?= $Page->Day4SiNo->cellAttributes() ?>>
<span<?= $Page->Day4SiNo->viewAttributes() ?>>
<?= $Page->Day4SiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day4CellNo->Visible) { // Day4CellNo ?>
        <!-- Day4CellNo -->
        <td<?= $Page->Day4CellNo->cellAttributes() ?>>
<span<?= $Page->Day4CellNo->viewAttributes() ?>>
<?= $Page->Day4CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day4Frag->Visible) { // Day4Frag ?>
        <!-- Day4Frag -->
        <td<?= $Page->Day4Frag->cellAttributes() ?>>
<span<?= $Page->Day4Frag->viewAttributes() ?>>
<?= $Page->Day4Frag->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day4Symmetry->Visible) { // Day4Symmetry ?>
        <!-- Day4Symmetry -->
        <td<?= $Page->Day4Symmetry->cellAttributes() ?>>
<span<?= $Page->Day4Symmetry->viewAttributes() ?>>
<?= $Page->Day4Symmetry->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day4Grade->Visible) { // Day4Grade ?>
        <!-- Day4Grade -->
        <td<?= $Page->Day4Grade->cellAttributes() ?>>
<span<?= $Page->Day4Grade->viewAttributes() ?>>
<?= $Page->Day4Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day4Cryoptop->Visible) { // Day4Cryoptop ?>
        <!-- Day4Cryoptop -->
        <td<?= $Page->Day4Cryoptop->cellAttributes() ?>>
<span<?= $Page->Day4Cryoptop->viewAttributes() ?>>
<?= $Page->Day4Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day4End->Visible) { // Day4End ?>
        <!-- Day4End -->
        <td<?= $Page->Day4End->cellAttributes() ?>>
<span<?= $Page->Day4End->viewAttributes() ?>>
<?= $Page->Day4End->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day5CellNo->Visible) { // Day5CellNo ?>
        <!-- Day5CellNo -->
        <td<?= $Page->Day5CellNo->cellAttributes() ?>>
<span<?= $Page->Day5CellNo->viewAttributes() ?>>
<?= $Page->Day5CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day5ICM->Visible) { // Day5ICM ?>
        <!-- Day5ICM -->
        <td<?= $Page->Day5ICM->cellAttributes() ?>>
<span<?= $Page->Day5ICM->viewAttributes() ?>>
<?= $Page->Day5ICM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day5TE->Visible) { // Day5TE ?>
        <!-- Day5TE -->
        <td<?= $Page->Day5TE->cellAttributes() ?>>
<span<?= $Page->Day5TE->viewAttributes() ?>>
<?= $Page->Day5TE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day5Observation->Visible) { // Day5Observation ?>
        <!-- Day5Observation -->
        <td<?= $Page->Day5Observation->cellAttributes() ?>>
<span<?= $Page->Day5Observation->viewAttributes() ?>>
<?= $Page->Day5Observation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day5Collapsed->Visible) { // Day5Collapsed ?>
        <!-- Day5Collapsed -->
        <td<?= $Page->Day5Collapsed->cellAttributes() ?>>
<span<?= $Page->Day5Collapsed->viewAttributes() ?>>
<?= $Page->Day5Collapsed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day5Vacoulles->Visible) { // Day5Vacoulles ?>
        <!-- Day5Vacoulles -->
        <td<?= $Page->Day5Vacoulles->cellAttributes() ?>>
<span<?= $Page->Day5Vacoulles->viewAttributes() ?>>
<?= $Page->Day5Vacoulles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day5Grade->Visible) { // Day5Grade ?>
        <!-- Day5Grade -->
        <td<?= $Page->Day5Grade->cellAttributes() ?>>
<span<?= $Page->Day5Grade->viewAttributes() ?>>
<?= $Page->Day5Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day6CellNo->Visible) { // Day6CellNo ?>
        <!-- Day6CellNo -->
        <td<?= $Page->Day6CellNo->cellAttributes() ?>>
<span<?= $Page->Day6CellNo->viewAttributes() ?>>
<?= $Page->Day6CellNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day6ICM->Visible) { // Day6ICM ?>
        <!-- Day6ICM -->
        <td<?= $Page->Day6ICM->cellAttributes() ?>>
<span<?= $Page->Day6ICM->viewAttributes() ?>>
<?= $Page->Day6ICM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day6TE->Visible) { // Day6TE ?>
        <!-- Day6TE -->
        <td<?= $Page->Day6TE->cellAttributes() ?>>
<span<?= $Page->Day6TE->viewAttributes() ?>>
<?= $Page->Day6TE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day6Observation->Visible) { // Day6Observation ?>
        <!-- Day6Observation -->
        <td<?= $Page->Day6Observation->cellAttributes() ?>>
<span<?= $Page->Day6Observation->viewAttributes() ?>>
<?= $Page->Day6Observation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day6Collapsed->Visible) { // Day6Collapsed ?>
        <!-- Day6Collapsed -->
        <td<?= $Page->Day6Collapsed->cellAttributes() ?>>
<span<?= $Page->Day6Collapsed->viewAttributes() ?>>
<?= $Page->Day6Collapsed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day6Vacoulles->Visible) { // Day6Vacoulles ?>
        <!-- Day6Vacoulles -->
        <td<?= $Page->Day6Vacoulles->cellAttributes() ?>>
<span<?= $Page->Day6Vacoulles->viewAttributes() ?>>
<?= $Page->Day6Vacoulles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day6Grade->Visible) { // Day6Grade ?>
        <!-- Day6Grade -->
        <td<?= $Page->Day6Grade->cellAttributes() ?>>
<span<?= $Page->Day6Grade->viewAttributes() ?>>
<?= $Page->Day6Grade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day6Cryoptop->Visible) { // Day6Cryoptop ?>
        <!-- Day6Cryoptop -->
        <td<?= $Page->Day6Cryoptop->cellAttributes() ?>>
<span<?= $Page->Day6Cryoptop->viewAttributes() ?>>
<?= $Page->Day6Cryoptop->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EndSiNo->Visible) { // EndSiNo ?>
        <!-- EndSiNo -->
        <td<?= $Page->EndSiNo->cellAttributes() ?>>
<span<?= $Page->EndSiNo->viewAttributes() ?>>
<?= $Page->EndSiNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EndingDay->Visible) { // EndingDay ?>
        <!-- EndingDay -->
        <td<?= $Page->EndingDay->cellAttributes() ?>>
<span<?= $Page->EndingDay->viewAttributes() ?>>
<?= $Page->EndingDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EndingCellStage->Visible) { // EndingCellStage ?>
        <!-- EndingCellStage -->
        <td<?= $Page->EndingCellStage->cellAttributes() ?>>
<span<?= $Page->EndingCellStage->viewAttributes() ?>>
<?= $Page->EndingCellStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EndingGrade->Visible) { // EndingGrade ?>
        <!-- EndingGrade -->
        <td<?= $Page->EndingGrade->cellAttributes() ?>>
<span<?= $Page->EndingGrade->viewAttributes() ?>>
<?= $Page->EndingGrade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EndingState->Visible) { // EndingState ?>
        <!-- EndingState -->
        <td<?= $Page->EndingState->cellAttributes() ?>>
<span<?= $Page->EndingState->viewAttributes() ?>>
<?= $Page->EndingState->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <!-- TidNo -->
        <td<?= $Page->TidNo->cellAttributes() ?>>
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
        <!-- DidNO -->
        <td<?= $Page->DidNO->cellAttributes() ?>>
<span<?= $Page->DidNO->viewAttributes() ?>>
<?= $Page->DidNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ICSiIVFDateTime->Visible) { // ICSiIVFDateTime ?>
        <!-- ICSiIVFDateTime -->
        <td<?= $Page->ICSiIVFDateTime->cellAttributes() ?>>
<span<?= $Page->ICSiIVFDateTime->viewAttributes() ?>>
<?= $Page->ICSiIVFDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PrimaryEmbrologist->Visible) { // PrimaryEmbrologist ?>
        <!-- PrimaryEmbrologist -->
        <td<?= $Page->PrimaryEmbrologist->cellAttributes() ?>>
<span<?= $Page->PrimaryEmbrologist->viewAttributes() ?>>
<?= $Page->PrimaryEmbrologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SecondaryEmbrologist->Visible) { // SecondaryEmbrologist ?>
        <!-- SecondaryEmbrologist -->
        <td<?= $Page->SecondaryEmbrologist->cellAttributes() ?>>
<span<?= $Page->SecondaryEmbrologist->viewAttributes() ?>>
<?= $Page->SecondaryEmbrologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Incubator->Visible) { // Incubator ?>
        <!-- Incubator -->
        <td<?= $Page->Incubator->cellAttributes() ?>>
<span<?= $Page->Incubator->viewAttributes() ?>>
<?= $Page->Incubator->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->location->Visible) { // location ?>
        <!-- location -->
        <td<?= $Page->location->cellAttributes() ?>>
<span<?= $Page->location->viewAttributes() ?>>
<?= $Page->location->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <!-- OocyteNo -->
        <td<?= $Page->OocyteNo->cellAttributes() ?>>
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <!-- Stage -->
        <td<?= $Page->Stage->cellAttributes() ?>>
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <!-- Remarks -->
        <td<?= $Page->Remarks->cellAttributes() ?>>
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitrificationDate->Visible) { // vitrificationDate ?>
        <!-- vitrificationDate -->
        <td<?= $Page->vitrificationDate->cellAttributes() ?>>
<span<?= $Page->vitrificationDate->viewAttributes() ?>>
<?= $Page->vitrificationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriPrimaryEmbryologist->Visible) { // vitriPrimaryEmbryologist ?>
        <!-- vitriPrimaryEmbryologist -->
        <td<?= $Page->vitriPrimaryEmbryologist->cellAttributes() ?>>
<span<?= $Page->vitriPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriPrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriSecondaryEmbryologist->Visible) { // vitriSecondaryEmbryologist ?>
        <!-- vitriSecondaryEmbryologist -->
        <td<?= $Page->vitriSecondaryEmbryologist->cellAttributes() ?>>
<span<?= $Page->vitriSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->vitriSecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriEmbryoNo->Visible) { // vitriEmbryoNo ?>
        <!-- vitriEmbryoNo -->
        <td<?= $Page->vitriEmbryoNo->cellAttributes() ?>>
<span<?= $Page->vitriEmbryoNo->viewAttributes() ?>>
<?= $Page->vitriEmbryoNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->thawReFrozen->Visible) { // thawReFrozen ?>
        <!-- thawReFrozen -->
        <td<?= $Page->thawReFrozen->cellAttributes() ?>>
<span<?= $Page->thawReFrozen->viewAttributes() ?>>
<?= $Page->thawReFrozen->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriFertilisationDate->Visible) { // vitriFertilisationDate ?>
        <!-- vitriFertilisationDate -->
        <td<?= $Page->vitriFertilisationDate->cellAttributes() ?>>
<span<?= $Page->vitriFertilisationDate->viewAttributes() ?>>
<?= $Page->vitriFertilisationDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriDay->Visible) { // vitriDay ?>
        <!-- vitriDay -->
        <td<?= $Page->vitriDay->cellAttributes() ?>>
<span<?= $Page->vitriDay->viewAttributes() ?>>
<?= $Page->vitriDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriStage->Visible) { // vitriStage ?>
        <!-- vitriStage -->
        <td<?= $Page->vitriStage->cellAttributes() ?>>
<span<?= $Page->vitriStage->viewAttributes() ?>>
<?= $Page->vitriStage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriGrade->Visible) { // vitriGrade ?>
        <!-- vitriGrade -->
        <td<?= $Page->vitriGrade->cellAttributes() ?>>
<span<?= $Page->vitriGrade->viewAttributes() ?>>
<?= $Page->vitriGrade->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriIncubator->Visible) { // vitriIncubator ?>
        <!-- vitriIncubator -->
        <td<?= $Page->vitriIncubator->cellAttributes() ?>>
<span<?= $Page->vitriIncubator->viewAttributes() ?>>
<?= $Page->vitriIncubator->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriTank->Visible) { // vitriTank ?>
        <!-- vitriTank -->
        <td<?= $Page->vitriTank->cellAttributes() ?>>
<span<?= $Page->vitriTank->viewAttributes() ?>>
<?= $Page->vitriTank->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriCanister->Visible) { // vitriCanister ?>
        <!-- vitriCanister -->
        <td<?= $Page->vitriCanister->cellAttributes() ?>>
<span<?= $Page->vitriCanister->viewAttributes() ?>>
<?= $Page->vitriCanister->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriGobiet->Visible) { // vitriGobiet ?>
        <!-- vitriGobiet -->
        <td<?= $Page->vitriGobiet->cellAttributes() ?>>
<span<?= $Page->vitriGobiet->viewAttributes() ?>>
<?= $Page->vitriGobiet->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriViscotube->Visible) { // vitriViscotube ?>
        <!-- vitriViscotube -->
        <td<?= $Page->vitriViscotube->cellAttributes() ?>>
<span<?= $Page->vitriViscotube->viewAttributes() ?>>
<?= $Page->vitriViscotube->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriCryolockNo->Visible) { // vitriCryolockNo ?>
        <!-- vitriCryolockNo -->
        <td<?= $Page->vitriCryolockNo->cellAttributes() ?>>
<span<?= $Page->vitriCryolockNo->viewAttributes() ?>>
<?= $Page->vitriCryolockNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vitriCryolockColour->Visible) { // vitriCryolockColour ?>
        <!-- vitriCryolockColour -->
        <td<?= $Page->vitriCryolockColour->cellAttributes() ?>>
<span<?= $Page->vitriCryolockColour->viewAttributes() ?>>
<?= $Page->vitriCryolockColour->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->thawDate->Visible) { // thawDate ?>
        <!-- thawDate -->
        <td<?= $Page->thawDate->cellAttributes() ?>>
<span<?= $Page->thawDate->viewAttributes() ?>>
<?= $Page->thawDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->thawPrimaryEmbryologist->Visible) { // thawPrimaryEmbryologist ?>
        <!-- thawPrimaryEmbryologist -->
        <td<?= $Page->thawPrimaryEmbryologist->cellAttributes() ?>>
<span<?= $Page->thawPrimaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawPrimaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->thawSecondaryEmbryologist->Visible) { // thawSecondaryEmbryologist ?>
        <!-- thawSecondaryEmbryologist -->
        <td<?= $Page->thawSecondaryEmbryologist->cellAttributes() ?>>
<span<?= $Page->thawSecondaryEmbryologist->viewAttributes() ?>>
<?= $Page->thawSecondaryEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->thawET->Visible) { // thawET ?>
        <!-- thawET -->
        <td<?= $Page->thawET->cellAttributes() ?>>
<span<?= $Page->thawET->viewAttributes() ?>>
<?= $Page->thawET->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->thawAbserve->Visible) { // thawAbserve ?>
        <!-- thawAbserve -->
        <td<?= $Page->thawAbserve->cellAttributes() ?>>
<span<?= $Page->thawAbserve->viewAttributes() ?>>
<?= $Page->thawAbserve->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->thawDiscard->Visible) { // thawDiscard ?>
        <!-- thawDiscard -->
        <td<?= $Page->thawDiscard->cellAttributes() ?>>
<span<?= $Page->thawDiscard->viewAttributes() ?>>
<?= $Page->thawDiscard->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ETCatheter->Visible) { // ETCatheter ?>
        <!-- ETCatheter -->
        <td<?= $Page->ETCatheter->cellAttributes() ?>>
<span<?= $Page->ETCatheter->viewAttributes() ?>>
<?= $Page->ETCatheter->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ETDifficulty->Visible) { // ETDifficulty ?>
        <!-- ETDifficulty -->
        <td<?= $Page->ETDifficulty->cellAttributes() ?>>
<span<?= $Page->ETDifficulty->viewAttributes() ?>>
<?= $Page->ETDifficulty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ETEasy->Visible) { // ETEasy ?>
        <!-- ETEasy -->
        <td<?= $Page->ETEasy->cellAttributes() ?>>
<span<?= $Page->ETEasy->viewAttributes() ?>>
<?= $Page->ETEasy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ETComments->Visible) { // ETComments ?>
        <!-- ETComments -->
        <td<?= $Page->ETComments->cellAttributes() ?>>
<span<?= $Page->ETComments->viewAttributes() ?>>
<?= $Page->ETComments->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ETDoctor->Visible) { // ETDoctor ?>
        <!-- ETDoctor -->
        <td<?= $Page->ETDoctor->cellAttributes() ?>>
<span<?= $Page->ETDoctor->viewAttributes() ?>>
<?= $Page->ETDoctor->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ETEmbryologist->Visible) { // ETEmbryologist ?>
        <!-- ETEmbryologist -->
        <td<?= $Page->ETEmbryologist->cellAttributes() ?>>
<span<?= $Page->ETEmbryologist->viewAttributes() ?>>
<?= $Page->ETEmbryologist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ETDate->Visible) { // ETDate ?>
        <!-- ETDate -->
        <td<?= $Page->ETDate->cellAttributes() ?>>
<span<?= $Page->ETDate->viewAttributes() ?>>
<?= $Page->ETDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Day1End->Visible) { // Day1End ?>
        <!-- Day1End -->
        <td<?= $Page->Day1End->cellAttributes() ?>>
<span<?= $Page->Day1End->viewAttributes() ?>>
<?= $Page->Day1End->getViewValue() ?></span>
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

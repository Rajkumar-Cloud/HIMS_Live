<?php

namespace PHPMaker2021\HIMS;

// Page object
$IvfTreatmentPlanPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid ivf_treatment_plan"><!-- .card -->
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
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
    <?php if ($Page->SortUrl($Page->TreatmentStartDate) == "") { ?>
        <th class="<?= $Page->TreatmentStartDate->headerCellClass() ?>"><?= $Page->TreatmentStartDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TreatmentStartDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TreatmentStartDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TreatmentStartDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TreatmentStartDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TreatmentStartDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
    <?php if ($Page->SortUrl($Page->IVFCycleNO) == "") { ?>
        <th class="<?= $Page->IVFCycleNO->headerCellClass() ?>"><?= $Page->IVFCycleNO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IVFCycleNO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IVFCycleNO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IVFCycleNO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IVFCycleNO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IVFCycleNO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
    <?php if ($Page->SortUrl($Page->Treatment) == "") { ?>
        <th class="<?= $Page->Treatment->headerCellClass() ?>"><?= $Page->Treatment->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Treatment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Treatment->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Treatment->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Treatment->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Treatment->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
    <?php if ($Page->SortUrl($Page->TreatmentTec) == "") { ?>
        <th class="<?= $Page->TreatmentTec->headerCellClass() ?>"><?= $Page->TreatmentTec->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TreatmentTec->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TreatmentTec->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TreatmentTec->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TreatmentTec->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TreatmentTec->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
    <?php if ($Page->SortUrl($Page->TypeOfCycle) == "") { ?>
        <th class="<?= $Page->TypeOfCycle->headerCellClass() ?>"><?= $Page->TypeOfCycle->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TypeOfCycle->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TypeOfCycle->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TypeOfCycle->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TypeOfCycle->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TypeOfCycle->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
    <?php if ($Page->SortUrl($Page->SpermOrgin) == "") { ?>
        <th class="<?= $Page->SpermOrgin->headerCellClass() ?>"><?= $Page->SpermOrgin->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SpermOrgin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SpermOrgin->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SpermOrgin->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SpermOrgin->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SpermOrgin->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <?php if ($Page->SortUrl($Page->State) == "") { ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><?= $Page->State->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->State->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->State->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->State->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->State->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->State->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
    <?php if ($Page->SortUrl($Page->Origin) == "") { ?>
        <th class="<?= $Page->Origin->headerCellClass() ?>"><?= $Page->Origin->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Origin->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Origin->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Origin->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Origin->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Origin->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
    <?php if ($Page->SortUrl($Page->MACS) == "") { ?>
        <th class="<?= $Page->MACS->headerCellClass() ?>"><?= $Page->MACS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MACS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MACS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MACS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MACS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MACS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
    <?php if ($Page->SortUrl($Page->Technique) == "") { ?>
        <th class="<?= $Page->Technique->headerCellClass() ?>"><?= $Page->Technique->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Technique->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Technique->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Technique->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Technique->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Technique->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
    <?php if ($Page->SortUrl($Page->PgdPlanning) == "") { ?>
        <th class="<?= $Page->PgdPlanning->headerCellClass() ?>"><?= $Page->PgdPlanning->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PgdPlanning->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PgdPlanning->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PgdPlanning->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PgdPlanning->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PgdPlanning->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
    <?php if ($Page->SortUrl($Page->IMSI) == "") { ?>
        <th class="<?= $Page->IMSI->headerCellClass() ?>"><?= $Page->IMSI->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->IMSI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->IMSI->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->IMSI->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->IMSI->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->IMSI->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
    <?php if ($Page->SortUrl($Page->SequentialCulture) == "") { ?>
        <th class="<?= $Page->SequentialCulture->headerCellClass() ?>"><?= $Page->SequentialCulture->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SequentialCulture->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SequentialCulture->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SequentialCulture->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SequentialCulture->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SequentialCulture->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
    <?php if ($Page->SortUrl($Page->TimeLapse) == "") { ?>
        <th class="<?= $Page->TimeLapse->headerCellClass() ?>"><?= $Page->TimeLapse->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TimeLapse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TimeLapse->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TimeLapse->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TimeLapse->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TimeLapse->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
    <?php if ($Page->SortUrl($Page->AH) == "") { ?>
        <th class="<?= $Page->AH->headerCellClass() ?>"><?= $Page->AH->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AH->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AH->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AH->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AH->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
    <?php if ($Page->SortUrl($Page->Weight) == "") { ?>
        <th class="<?= $Page->Weight->headerCellClass() ?>"><?= $Page->Weight->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Weight->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Weight->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Weight->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Weight->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Weight->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
    <?php if ($Page->SortUrl($Page->BMI) == "") { ?>
        <th class="<?= $Page->BMI->headerCellClass() ?>"><?= $Page->BMI->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BMI->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BMI->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BMI->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BMI->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BMI->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
    <?php if ($Page->SortUrl($Page->MaleIndications) == "") { ?>
        <th class="<?= $Page->MaleIndications->headerCellClass() ?>"><?= $Page->MaleIndications->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MaleIndications->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MaleIndications->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MaleIndications->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MaleIndications->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
    <?php if ($Page->SortUrl($Page->FemaleIndications) == "") { ?>
        <th class="<?= $Page->FemaleIndications->headerCellClass() ?>"><?= $Page->FemaleIndications->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FemaleIndications->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FemaleIndications->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FemaleIndications->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FemaleIndications->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FemaleIndications->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->TreatmentStartDate->Visible) { // TreatmentStartDate ?>
        <!-- TreatmentStartDate -->
        <td<?= $Page->TreatmentStartDate->cellAttributes() ?>>
<span<?= $Page->TreatmentStartDate->viewAttributes() ?>>
<?= $Page->TreatmentStartDate->getViewValue() ?></span>
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
<?php if ($Page->IVFCycleNO->Visible) { // IVFCycleNO ?>
        <!-- IVFCycleNO -->
        <td<?= $Page->IVFCycleNO->cellAttributes() ?>>
<span<?= $Page->IVFCycleNO->viewAttributes() ?>>
<?= $Page->IVFCycleNO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Treatment->Visible) { // Treatment ?>
        <!-- Treatment -->
        <td<?= $Page->Treatment->cellAttributes() ?>>
<span<?= $Page->Treatment->viewAttributes() ?>>
<?= $Page->Treatment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TreatmentTec->Visible) { // TreatmentTec ?>
        <!-- TreatmentTec -->
        <td<?= $Page->TreatmentTec->cellAttributes() ?>>
<span<?= $Page->TreatmentTec->viewAttributes() ?>>
<?= $Page->TreatmentTec->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TypeOfCycle->Visible) { // TypeOfCycle ?>
        <!-- TypeOfCycle -->
        <td<?= $Page->TypeOfCycle->cellAttributes() ?>>
<span<?= $Page->TypeOfCycle->viewAttributes() ?>>
<?= $Page->TypeOfCycle->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SpermOrgin->Visible) { // SpermOrgin ?>
        <!-- SpermOrgin -->
        <td<?= $Page->SpermOrgin->cellAttributes() ?>>
<span<?= $Page->SpermOrgin->viewAttributes() ?>>
<?= $Page->SpermOrgin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
        <!-- State -->
        <td<?= $Page->State->cellAttributes() ?>>
<span<?= $Page->State->viewAttributes() ?>>
<?= $Page->State->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Origin->Visible) { // Origin ?>
        <!-- Origin -->
        <td<?= $Page->Origin->cellAttributes() ?>>
<span<?= $Page->Origin->viewAttributes() ?>>
<?= $Page->Origin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MACS->Visible) { // MACS ?>
        <!-- MACS -->
        <td<?= $Page->MACS->cellAttributes() ?>>
<span<?= $Page->MACS->viewAttributes() ?>>
<?= $Page->MACS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Technique->Visible) { // Technique ?>
        <!-- Technique -->
        <td<?= $Page->Technique->cellAttributes() ?>>
<span<?= $Page->Technique->viewAttributes() ?>>
<?= $Page->Technique->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PgdPlanning->Visible) { // PgdPlanning ?>
        <!-- PgdPlanning -->
        <td<?= $Page->PgdPlanning->cellAttributes() ?>>
<span<?= $Page->PgdPlanning->viewAttributes() ?>>
<?= $Page->PgdPlanning->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->IMSI->Visible) { // IMSI ?>
        <!-- IMSI -->
        <td<?= $Page->IMSI->cellAttributes() ?>>
<span<?= $Page->IMSI->viewAttributes() ?>>
<?= $Page->IMSI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SequentialCulture->Visible) { // SequentialCulture ?>
        <!-- SequentialCulture -->
        <td<?= $Page->SequentialCulture->cellAttributes() ?>>
<span<?= $Page->SequentialCulture->viewAttributes() ?>>
<?= $Page->SequentialCulture->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TimeLapse->Visible) { // TimeLapse ?>
        <!-- TimeLapse -->
        <td<?= $Page->TimeLapse->cellAttributes() ?>>
<span<?= $Page->TimeLapse->viewAttributes() ?>>
<?= $Page->TimeLapse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AH->Visible) { // AH ?>
        <!-- AH -->
        <td<?= $Page->AH->cellAttributes() ?>>
<span<?= $Page->AH->viewAttributes() ?>>
<?= $Page->AH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Weight->Visible) { // Weight ?>
        <!-- Weight -->
        <td<?= $Page->Weight->cellAttributes() ?>>
<span<?= $Page->Weight->viewAttributes() ?>>
<?= $Page->Weight->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BMI->Visible) { // BMI ?>
        <!-- BMI -->
        <td<?= $Page->BMI->cellAttributes() ?>>
<span<?= $Page->BMI->viewAttributes() ?>>
<?= $Page->BMI->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MaleIndications->Visible) { // MaleIndications ?>
        <!-- MaleIndications -->
        <td<?= $Page->MaleIndications->cellAttributes() ?>>
<span<?= $Page->MaleIndications->viewAttributes() ?>>
<?= $Page->MaleIndications->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FemaleIndications->Visible) { // FemaleIndications ?>
        <!-- FemaleIndications -->
        <td<?= $Page->FemaleIndications->cellAttributes() ?>>
<span<?= $Page->FemaleIndications->viewAttributes() ?>>
<?= $Page->FemaleIndications->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientAnRegistrationPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_an_registration"><!-- .card -->
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
<?php if ($Page->pid->Visible) { // pid ?>
    <?php if ($Page->SortUrl($Page->pid) == "") { ?>
        <th class="<?= $Page->pid->headerCellClass() ?>"><?= $Page->pid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->pid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->pid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->pid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->pid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->pid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
    <?php if ($Page->SortUrl($Page->fid) == "") { ?>
        <th class="<?= $Page->fid->headerCellClass() ?>"><?= $Page->fid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->fid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->fid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->fid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->fid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->fid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
    <?php if ($Page->SortUrl($Page->G) == "") { ?>
        <th class="<?= $Page->G->headerCellClass() ?>"><?= $Page->G->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->G->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->G->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->G->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->G->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->G->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
    <?php if ($Page->SortUrl($Page->P) == "") { ?>
        <th class="<?= $Page->P->headerCellClass() ?>"><?= $Page->P->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->P->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->P->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->P->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->P->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->P->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
    <?php if ($Page->SortUrl($Page->L) == "") { ?>
        <th class="<?= $Page->L->headerCellClass() ?>"><?= $Page->L->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->L->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->L->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->L->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->L->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->L->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <?php if ($Page->SortUrl($Page->A) == "") { ?>
        <th class="<?= $Page->A->headerCellClass() ?>"><?= $Page->A->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
    <?php if ($Page->SortUrl($Page->E) == "") { ?>
        <th class="<?= $Page->E->headerCellClass() ?>"><?= $Page->E->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->E->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->E->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->E->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->E->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->E->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <?php if ($Page->SortUrl($Page->M) == "") { ?>
        <th class="<?= $Page->M->headerCellClass() ?>"><?= $Page->M->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->M->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->M->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->M->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->M->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->M->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->EDO->Visible) { // EDO ?>
    <?php if ($Page->SortUrl($Page->EDO) == "") { ?>
        <th class="<?= $Page->EDO->headerCellClass() ?>"><?= $Page->EDO->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EDO->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EDO->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EDO->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EDO->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EDO->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <?php if ($Page->SortUrl($Page->MenstrualHistory) == "") { ?>
        <th class="<?= $Page->MenstrualHistory->headerCellClass() ?>"><?= $Page->MenstrualHistory->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MenstrualHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MenstrualHistory->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MenstrualHistory->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MenstrualHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MenstrualHistory->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
    <?php if ($Page->SortUrl($Page->MaritalHistory) == "") { ?>
        <th class="<?= $Page->MaritalHistory->headerCellClass() ?>"><?= $Page->MaritalHistory->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MaritalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MaritalHistory->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MaritalHistory->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MaritalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MaritalHistory->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <?php if ($Page->SortUrl($Page->ObstetricHistory) == "") { ?>
        <th class="<?= $Page->ObstetricHistory->headerCellClass() ?>"><?= $Page->ObstetricHistory->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ObstetricHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ObstetricHistory->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ObstetricHistory->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ObstetricHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ObstetricHistory->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
    <?php if ($Page->SortUrl($Page->PreviousHistoryofGDM) == "") { ?>
        <th class="<?= $Page->PreviousHistoryofGDM->headerCellClass() ?>"><?= $Page->PreviousHistoryofGDM->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PreviousHistoryofGDM->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PreviousHistoryofGDM->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PreviousHistoryofGDM->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PreviousHistoryofGDM->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PreviousHistoryofGDM->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
    <?php if ($Page->SortUrl($Page->PreviousHistorofPIH) == "") { ?>
        <th class="<?= $Page->PreviousHistorofPIH->headerCellClass() ?>"><?= $Page->PreviousHistorofPIH->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PreviousHistorofPIH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PreviousHistorofPIH->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PreviousHistorofPIH->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PreviousHistorofPIH->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PreviousHistorofPIH->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
    <?php if ($Page->SortUrl($Page->PreviousHistoryofIUGR) == "") { ?>
        <th class="<?= $Page->PreviousHistoryofIUGR->headerCellClass() ?>"><?= $Page->PreviousHistoryofIUGR->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PreviousHistoryofIUGR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PreviousHistoryofIUGR->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PreviousHistoryofIUGR->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PreviousHistoryofIUGR->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PreviousHistoryofIUGR->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
    <?php if ($Page->SortUrl($Page->PreviousHistoryofOligohydramnios) == "") { ?>
        <th class="<?= $Page->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><?= $Page->PreviousHistoryofOligohydramnios->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PreviousHistoryofOligohydramnios->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PreviousHistoryofOligohydramnios->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PreviousHistoryofOligohydramnios->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PreviousHistoryofOligohydramnios->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PreviousHistoryofOligohydramnios->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
    <?php if ($Page->SortUrl($Page->PreviousHistoryofPreterm) == "") { ?>
        <th class="<?= $Page->PreviousHistoryofPreterm->headerCellClass() ?>"><?= $Page->PreviousHistoryofPreterm->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PreviousHistoryofPreterm->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PreviousHistoryofPreterm->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PreviousHistoryofPreterm->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PreviousHistoryofPreterm->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PreviousHistoryofPreterm->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
    <?php if ($Page->SortUrl($Page->G1) == "") { ?>
        <th class="<?= $Page->G1->headerCellClass() ?>"><?= $Page->G1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->G1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->G1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->G1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->G1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->G1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
    <?php if ($Page->SortUrl($Page->G2) == "") { ?>
        <th class="<?= $Page->G2->headerCellClass() ?>"><?= $Page->G2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->G2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->G2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->G2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->G2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->G2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
    <?php if ($Page->SortUrl($Page->G3) == "") { ?>
        <th class="<?= $Page->G3->headerCellClass() ?>"><?= $Page->G3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->G3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->G3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->G3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->G3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->G3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
    <?php if ($Page->SortUrl($Page->DeliveryNDLSCS1) == "") { ?>
        <th class="<?= $Page->DeliveryNDLSCS1->headerCellClass() ?>"><?= $Page->DeliveryNDLSCS1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DeliveryNDLSCS1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DeliveryNDLSCS1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DeliveryNDLSCS1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DeliveryNDLSCS1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DeliveryNDLSCS1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
    <?php if ($Page->SortUrl($Page->DeliveryNDLSCS2) == "") { ?>
        <th class="<?= $Page->DeliveryNDLSCS2->headerCellClass() ?>"><?= $Page->DeliveryNDLSCS2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DeliveryNDLSCS2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DeliveryNDLSCS2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DeliveryNDLSCS2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DeliveryNDLSCS2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DeliveryNDLSCS2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
    <?php if ($Page->SortUrl($Page->DeliveryNDLSCS3) == "") { ?>
        <th class="<?= $Page->DeliveryNDLSCS3->headerCellClass() ?>"><?= $Page->DeliveryNDLSCS3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DeliveryNDLSCS3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DeliveryNDLSCS3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DeliveryNDLSCS3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DeliveryNDLSCS3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DeliveryNDLSCS3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
    <?php if ($Page->SortUrl($Page->BabySexweight1) == "") { ?>
        <th class="<?= $Page->BabySexweight1->headerCellClass() ?>"><?= $Page->BabySexweight1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BabySexweight1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BabySexweight1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BabySexweight1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BabySexweight1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BabySexweight1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
    <?php if ($Page->SortUrl($Page->BabySexweight2) == "") { ?>
        <th class="<?= $Page->BabySexweight2->headerCellClass() ?>"><?= $Page->BabySexweight2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BabySexweight2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BabySexweight2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BabySexweight2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BabySexweight2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BabySexweight2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
    <?php if ($Page->SortUrl($Page->BabySexweight3) == "") { ?>
        <th class="<?= $Page->BabySexweight3->headerCellClass() ?>"><?= $Page->BabySexweight3->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BabySexweight3->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BabySexweight3->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BabySexweight3->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BabySexweight3->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BabySexweight3->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
    <?php if ($Page->SortUrl($Page->PastMedicalHistory) == "") { ?>
        <th class="<?= $Page->PastMedicalHistory->headerCellClass() ?>"><?= $Page->PastMedicalHistory->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PastMedicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PastMedicalHistory->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PastMedicalHistory->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PastMedicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PastMedicalHistory->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
    <?php if ($Page->SortUrl($Page->PastSurgicalHistory) == "") { ?>
        <th class="<?= $Page->PastSurgicalHistory->headerCellClass() ?>"><?= $Page->PastSurgicalHistory->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PastSurgicalHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PastSurgicalHistory->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PastSurgicalHistory->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PastSurgicalHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PastSurgicalHistory->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <?php if ($Page->SortUrl($Page->FamilyHistory) == "") { ?>
        <th class="<?= $Page->FamilyHistory->headerCellClass() ?>"><?= $Page->FamilyHistory->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FamilyHistory->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FamilyHistory->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FamilyHistory->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FamilyHistory->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FamilyHistory->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
    <?php if ($Page->SortUrl($Page->Viability) == "") { ?>
        <th class="<?= $Page->Viability->headerCellClass() ?>"><?= $Page->Viability->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Viability->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Viability->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Viability->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Viability->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Viability->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
    <?php if ($Page->SortUrl($Page->ViabilityDATE) == "") { ?>
        <th class="<?= $Page->ViabilityDATE->headerCellClass() ?>"><?= $Page->ViabilityDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ViabilityDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ViabilityDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ViabilityDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ViabilityDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ViabilityDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
    <?php if ($Page->SortUrl($Page->ViabilityREPORT) == "") { ?>
        <th class="<?= $Page->ViabilityREPORT->headerCellClass() ?>"><?= $Page->ViabilityREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ViabilityREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ViabilityREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ViabilityREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ViabilityREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ViabilityREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
    <?php if ($Page->SortUrl($Page->Viability2) == "") { ?>
        <th class="<?= $Page->Viability2->headerCellClass() ?>"><?= $Page->Viability2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Viability2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Viability2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Viability2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Viability2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Viability2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
    <?php if ($Page->SortUrl($Page->Viability2DATE) == "") { ?>
        <th class="<?= $Page->Viability2DATE->headerCellClass() ?>"><?= $Page->Viability2DATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Viability2DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Viability2DATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Viability2DATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Viability2DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Viability2DATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Viability2REPORT->Visible) { // Viability2REPORT ?>
    <?php if ($Page->SortUrl($Page->Viability2REPORT) == "") { ?>
        <th class="<?= $Page->Viability2REPORT->headerCellClass() ?>"><?= $Page->Viability2REPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Viability2REPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Viability2REPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Viability2REPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Viability2REPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Viability2REPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
    <?php if ($Page->SortUrl($Page->NTscan) == "") { ?>
        <th class="<?= $Page->NTscan->headerCellClass() ?>"><?= $Page->NTscan->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NTscan->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NTscan->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NTscan->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NTscan->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NTscan->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
    <?php if ($Page->SortUrl($Page->NTscanDATE) == "") { ?>
        <th class="<?= $Page->NTscanDATE->headerCellClass() ?>"><?= $Page->NTscanDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NTscanDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NTscanDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NTscanDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NTscanDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NTscanDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NTscanREPORT->Visible) { // NTscanREPORT ?>
    <?php if ($Page->SortUrl($Page->NTscanREPORT) == "") { ?>
        <th class="<?= $Page->NTscanREPORT->headerCellClass() ?>"><?= $Page->NTscanREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NTscanREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NTscanREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NTscanREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NTscanREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NTscanREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
    <?php if ($Page->SortUrl($Page->EarlyTarget) == "") { ?>
        <th class="<?= $Page->EarlyTarget->headerCellClass() ?>"><?= $Page->EarlyTarget->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EarlyTarget->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EarlyTarget->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EarlyTarget->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EarlyTarget->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EarlyTarget->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
    <?php if ($Page->SortUrl($Page->EarlyTargetDATE) == "") { ?>
        <th class="<?= $Page->EarlyTargetDATE->headerCellClass() ?>"><?= $Page->EarlyTargetDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EarlyTargetDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EarlyTargetDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EarlyTargetDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EarlyTargetDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EarlyTargetDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
    <?php if ($Page->SortUrl($Page->EarlyTargetREPORT) == "") { ?>
        <th class="<?= $Page->EarlyTargetREPORT->headerCellClass() ?>"><?= $Page->EarlyTargetREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EarlyTargetREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EarlyTargetREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EarlyTargetREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EarlyTargetREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EarlyTargetREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
    <?php if ($Page->SortUrl($Page->Anomaly) == "") { ?>
        <th class="<?= $Page->Anomaly->headerCellClass() ?>"><?= $Page->Anomaly->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Anomaly->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Anomaly->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Anomaly->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Anomaly->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Anomaly->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
    <?php if ($Page->SortUrl($Page->AnomalyDATE) == "") { ?>
        <th class="<?= $Page->AnomalyDATE->headerCellClass() ?>"><?= $Page->AnomalyDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AnomalyDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AnomalyDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AnomalyDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AnomalyDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AnomalyDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
    <?php if ($Page->SortUrl($Page->AnomalyREPORT) == "") { ?>
        <th class="<?= $Page->AnomalyREPORT->headerCellClass() ?>"><?= $Page->AnomalyREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AnomalyREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AnomalyREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AnomalyREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AnomalyREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AnomalyREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
    <?php if ($Page->SortUrl($Page->Growth) == "") { ?>
        <th class="<?= $Page->Growth->headerCellClass() ?>"><?= $Page->Growth->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Growth->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Growth->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Growth->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Growth->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Growth->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
    <?php if ($Page->SortUrl($Page->GrowthDATE) == "") { ?>
        <th class="<?= $Page->GrowthDATE->headerCellClass() ?>"><?= $Page->GrowthDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GrowthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GrowthDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GrowthDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GrowthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GrowthDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GrowthREPORT->Visible) { // GrowthREPORT ?>
    <?php if ($Page->SortUrl($Page->GrowthREPORT) == "") { ?>
        <th class="<?= $Page->GrowthREPORT->headerCellClass() ?>"><?= $Page->GrowthREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GrowthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GrowthREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GrowthREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GrowthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GrowthREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
    <?php if ($Page->SortUrl($Page->Growth1) == "") { ?>
        <th class="<?= $Page->Growth1->headerCellClass() ?>"><?= $Page->Growth1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Growth1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Growth1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Growth1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Growth1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Growth1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
    <?php if ($Page->SortUrl($Page->Growth1DATE) == "") { ?>
        <th class="<?= $Page->Growth1DATE->headerCellClass() ?>"><?= $Page->Growth1DATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Growth1DATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Growth1DATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Growth1DATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Growth1DATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Growth1DATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Growth1REPORT->Visible) { // Growth1REPORT ?>
    <?php if ($Page->SortUrl($Page->Growth1REPORT) == "") { ?>
        <th class="<?= $Page->Growth1REPORT->headerCellClass() ?>"><?= $Page->Growth1REPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Growth1REPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Growth1REPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Growth1REPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Growth1REPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Growth1REPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
    <?php if ($Page->SortUrl($Page->ANProfile) == "") { ?>
        <th class="<?= $Page->ANProfile->headerCellClass() ?>"><?= $Page->ANProfile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ANProfile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ANProfile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ANProfile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ANProfile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ANProfile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
    <?php if ($Page->SortUrl($Page->ANProfileDATE) == "") { ?>
        <th class="<?= $Page->ANProfileDATE->headerCellClass() ?>"><?= $Page->ANProfileDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ANProfileDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ANProfileDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ANProfileDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ANProfileDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ANProfileDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
    <?php if ($Page->SortUrl($Page->ANProfileINHOUSE) == "") { ?>
        <th class="<?= $Page->ANProfileINHOUSE->headerCellClass() ?>"><?= $Page->ANProfileINHOUSE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ANProfileINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ANProfileINHOUSE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ANProfileINHOUSE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ANProfileINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ANProfileINHOUSE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
    <?php if ($Page->SortUrl($Page->ANProfileREPORT) == "") { ?>
        <th class="<?= $Page->ANProfileREPORT->headerCellClass() ?>"><?= $Page->ANProfileREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ANProfileREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ANProfileREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ANProfileREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ANProfileREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ANProfileREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
    <?php if ($Page->SortUrl($Page->DualMarker) == "") { ?>
        <th class="<?= $Page->DualMarker->headerCellClass() ?>"><?= $Page->DualMarker->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DualMarker->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DualMarker->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DualMarker->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DualMarker->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DualMarker->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
    <?php if ($Page->SortUrl($Page->DualMarkerDATE) == "") { ?>
        <th class="<?= $Page->DualMarkerDATE->headerCellClass() ?>"><?= $Page->DualMarkerDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DualMarkerDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DualMarkerDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DualMarkerDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DualMarkerDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DualMarkerDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
    <?php if ($Page->SortUrl($Page->DualMarkerINHOUSE) == "") { ?>
        <th class="<?= $Page->DualMarkerINHOUSE->headerCellClass() ?>"><?= $Page->DualMarkerINHOUSE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DualMarkerINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DualMarkerINHOUSE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DualMarkerINHOUSE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DualMarkerINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DualMarkerINHOUSE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
    <?php if ($Page->SortUrl($Page->DualMarkerREPORT) == "") { ?>
        <th class="<?= $Page->DualMarkerREPORT->headerCellClass() ?>"><?= $Page->DualMarkerREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DualMarkerREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DualMarkerREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DualMarkerREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DualMarkerREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DualMarkerREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
    <?php if ($Page->SortUrl($Page->Quadruple) == "") { ?>
        <th class="<?= $Page->Quadruple->headerCellClass() ?>"><?= $Page->Quadruple->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Quadruple->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Quadruple->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Quadruple->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Quadruple->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Quadruple->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
    <?php if ($Page->SortUrl($Page->QuadrupleDATE) == "") { ?>
        <th class="<?= $Page->QuadrupleDATE->headerCellClass() ?>"><?= $Page->QuadrupleDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->QuadrupleDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->QuadrupleDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->QuadrupleDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->QuadrupleDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->QuadrupleDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
    <?php if ($Page->SortUrl($Page->QuadrupleINHOUSE) == "") { ?>
        <th class="<?= $Page->QuadrupleINHOUSE->headerCellClass() ?>"><?= $Page->QuadrupleINHOUSE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->QuadrupleINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->QuadrupleINHOUSE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->QuadrupleINHOUSE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->QuadrupleINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->QuadrupleINHOUSE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
    <?php if ($Page->SortUrl($Page->QuadrupleREPORT) == "") { ?>
        <th class="<?= $Page->QuadrupleREPORT->headerCellClass() ?>"><?= $Page->QuadrupleREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->QuadrupleREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->QuadrupleREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->QuadrupleREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->QuadrupleREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->QuadrupleREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
    <?php if ($Page->SortUrl($Page->A5month) == "") { ?>
        <th class="<?= $Page->A5month->headerCellClass() ?>"><?= $Page->A5month->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A5month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A5month->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A5month->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A5month->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A5month->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
    <?php if ($Page->SortUrl($Page->A5monthDATE) == "") { ?>
        <th class="<?= $Page->A5monthDATE->headerCellClass() ?>"><?= $Page->A5monthDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A5monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A5monthDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A5monthDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A5monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A5monthDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
    <?php if ($Page->SortUrl($Page->A5monthINHOUSE) == "") { ?>
        <th class="<?= $Page->A5monthINHOUSE->headerCellClass() ?>"><?= $Page->A5monthINHOUSE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A5monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A5monthINHOUSE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A5monthINHOUSE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A5monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A5monthINHOUSE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A5monthREPORT->Visible) { // A5monthREPORT ?>
    <?php if ($Page->SortUrl($Page->A5monthREPORT) == "") { ?>
        <th class="<?= $Page->A5monthREPORT->headerCellClass() ?>"><?= $Page->A5monthREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A5monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A5monthREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A5monthREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A5monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A5monthREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
    <?php if ($Page->SortUrl($Page->A7month) == "") { ?>
        <th class="<?= $Page->A7month->headerCellClass() ?>"><?= $Page->A7month->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A7month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A7month->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A7month->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A7month->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A7month->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
    <?php if ($Page->SortUrl($Page->A7monthDATE) == "") { ?>
        <th class="<?= $Page->A7monthDATE->headerCellClass() ?>"><?= $Page->A7monthDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A7monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A7monthDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A7monthDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A7monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A7monthDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
    <?php if ($Page->SortUrl($Page->A7monthINHOUSE) == "") { ?>
        <th class="<?= $Page->A7monthINHOUSE->headerCellClass() ?>"><?= $Page->A7monthINHOUSE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A7monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A7monthINHOUSE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A7monthINHOUSE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A7monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A7monthINHOUSE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A7monthREPORT->Visible) { // A7monthREPORT ?>
    <?php if ($Page->SortUrl($Page->A7monthREPORT) == "") { ?>
        <th class="<?= $Page->A7monthREPORT->headerCellClass() ?>"><?= $Page->A7monthREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A7monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A7monthREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A7monthREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A7monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A7monthREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
    <?php if ($Page->SortUrl($Page->A9month) == "") { ?>
        <th class="<?= $Page->A9month->headerCellClass() ?>"><?= $Page->A9month->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A9month->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A9month->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A9month->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A9month->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A9month->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
    <?php if ($Page->SortUrl($Page->A9monthDATE) == "") { ?>
        <th class="<?= $Page->A9monthDATE->headerCellClass() ?>"><?= $Page->A9monthDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A9monthDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A9monthDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A9monthDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A9monthDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A9monthDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
    <?php if ($Page->SortUrl($Page->A9monthINHOUSE) == "") { ?>
        <th class="<?= $Page->A9monthINHOUSE->headerCellClass() ?>"><?= $Page->A9monthINHOUSE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A9monthINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A9monthINHOUSE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A9monthINHOUSE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A9monthINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A9monthINHOUSE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->A9monthREPORT->Visible) { // A9monthREPORT ?>
    <?php if ($Page->SortUrl($Page->A9monthREPORT) == "") { ?>
        <th class="<?= $Page->A9monthREPORT->headerCellClass() ?>"><?= $Page->A9monthREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A9monthREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A9monthREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A9monthREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A9monthREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A9monthREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
    <?php if ($Page->SortUrl($Page->INJ) == "") { ?>
        <th class="<?= $Page->INJ->headerCellClass() ?>"><?= $Page->INJ->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->INJ->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->INJ->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->INJ->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->INJ->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->INJ->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
    <?php if ($Page->SortUrl($Page->INJDATE) == "") { ?>
        <th class="<?= $Page->INJDATE->headerCellClass() ?>"><?= $Page->INJDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->INJDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->INJDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->INJDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->INJDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->INJDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
    <?php if ($Page->SortUrl($Page->INJINHOUSE) == "") { ?>
        <th class="<?= $Page->INJINHOUSE->headerCellClass() ?>"><?= $Page->INJINHOUSE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->INJINHOUSE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->INJINHOUSE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->INJINHOUSE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->INJINHOUSE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->INJINHOUSE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->INJREPORT->Visible) { // INJREPORT ?>
    <?php if ($Page->SortUrl($Page->INJREPORT) == "") { ?>
        <th class="<?= $Page->INJREPORT->headerCellClass() ?>"><?= $Page->INJREPORT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->INJREPORT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->INJREPORT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->INJREPORT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->INJREPORT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->INJREPORT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
    <?php if ($Page->SortUrl($Page->Bleeding) == "") { ?>
        <th class="<?= $Page->Bleeding->headerCellClass() ?>"><?= $Page->Bleeding->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Bleeding->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Bleeding->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Bleeding->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Bleeding->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Bleeding->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
    <?php if ($Page->SortUrl($Page->Hypothyroidism) == "") { ?>
        <th class="<?= $Page->Hypothyroidism->headerCellClass() ?>"><?= $Page->Hypothyroidism->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Hypothyroidism->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Hypothyroidism->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Hypothyroidism->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Hypothyroidism->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Hypothyroidism->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
    <?php if ($Page->SortUrl($Page->PICMENumber) == "") { ?>
        <th class="<?= $Page->PICMENumber->headerCellClass() ?>"><?= $Page->PICMENumber->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PICMENumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PICMENumber->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PICMENumber->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PICMENumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PICMENumber->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
    <?php if ($Page->SortUrl($Page->Outcome) == "") { ?>
        <th class="<?= $Page->Outcome->headerCellClass() ?>"><?= $Page->Outcome->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Outcome->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Outcome->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Outcome->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Outcome->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Outcome->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <?php if ($Page->SortUrl($Page->DateofAdmission) == "") { ?>
        <th class="<?= $Page->DateofAdmission->headerCellClass() ?>"><?= $Page->DateofAdmission->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DateofAdmission->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DateofAdmission->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DateofAdmission->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DateofAdmission->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DateofAdmission->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
    <?php if ($Page->SortUrl($Page->DateodProcedure) == "") { ?>
        <th class="<?= $Page->DateodProcedure->headerCellClass() ?>"><?= $Page->DateodProcedure->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DateodProcedure->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DateodProcedure->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DateodProcedure->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DateodProcedure->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DateodProcedure->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
    <?php if ($Page->SortUrl($Page->ModeOfDelivery) == "") { ?>
        <th class="<?= $Page->ModeOfDelivery->headerCellClass() ?>"><?= $Page->ModeOfDelivery->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ModeOfDelivery->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ModeOfDelivery->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ModeOfDelivery->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ModeOfDelivery->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ModeOfDelivery->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
    <?php if ($Page->SortUrl($Page->ND) == "") { ?>
        <th class="<?= $Page->ND->headerCellClass() ?>"><?= $Page->ND->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ND->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ND->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ND->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ND->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ND->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
    <?php if ($Page->SortUrl($Page->NDS) == "") { ?>
        <th class="<?= $Page->NDS->headerCellClass() ?>"><?= $Page->NDS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NDS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NDS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NDS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NDS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NDS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
    <?php if ($Page->SortUrl($Page->NDP) == "") { ?>
        <th class="<?= $Page->NDP->headerCellClass() ?>"><?= $Page->NDP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NDP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NDP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NDP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NDP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NDP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
    <?php if ($Page->SortUrl($Page->Vaccum) == "") { ?>
        <th class="<?= $Page->Vaccum->headerCellClass() ?>"><?= $Page->Vaccum->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Vaccum->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Vaccum->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Vaccum->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Vaccum->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Vaccum->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
    <?php if ($Page->SortUrl($Page->VaccumS) == "") { ?>
        <th class="<?= $Page->VaccumS->headerCellClass() ?>"><?= $Page->VaccumS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->VaccumS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->VaccumS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->VaccumS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->VaccumS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->VaccumS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
    <?php if ($Page->SortUrl($Page->VaccumP) == "") { ?>
        <th class="<?= $Page->VaccumP->headerCellClass() ?>"><?= $Page->VaccumP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->VaccumP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->VaccumP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->VaccumP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->VaccumP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->VaccumP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
    <?php if ($Page->SortUrl($Page->Forceps) == "") { ?>
        <th class="<?= $Page->Forceps->headerCellClass() ?>"><?= $Page->Forceps->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Forceps->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Forceps->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Forceps->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Forceps->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Forceps->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
    <?php if ($Page->SortUrl($Page->ForcepsS) == "") { ?>
        <th class="<?= $Page->ForcepsS->headerCellClass() ?>"><?= $Page->ForcepsS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ForcepsS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ForcepsS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ForcepsS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ForcepsS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ForcepsS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
    <?php if ($Page->SortUrl($Page->ForcepsP) == "") { ?>
        <th class="<?= $Page->ForcepsP->headerCellClass() ?>"><?= $Page->ForcepsP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ForcepsP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ForcepsP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ForcepsP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ForcepsP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ForcepsP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
    <?php if ($Page->SortUrl($Page->Elective) == "") { ?>
        <th class="<?= $Page->Elective->headerCellClass() ?>"><?= $Page->Elective->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Elective->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Elective->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Elective->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Elective->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Elective->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
    <?php if ($Page->SortUrl($Page->ElectiveS) == "") { ?>
        <th class="<?= $Page->ElectiveS->headerCellClass() ?>"><?= $Page->ElectiveS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ElectiveS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ElectiveS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ElectiveS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ElectiveS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ElectiveS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
    <?php if ($Page->SortUrl($Page->ElectiveP) == "") { ?>
        <th class="<?= $Page->ElectiveP->headerCellClass() ?>"><?= $Page->ElectiveP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ElectiveP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ElectiveP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ElectiveP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ElectiveP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ElectiveP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
    <?php if ($Page->SortUrl($Page->Emergency) == "") { ?>
        <th class="<?= $Page->Emergency->headerCellClass() ?>"><?= $Page->Emergency->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Emergency->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Emergency->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Emergency->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Emergency->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Emergency->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
    <?php if ($Page->SortUrl($Page->EmergencyS) == "") { ?>
        <th class="<?= $Page->EmergencyS->headerCellClass() ?>"><?= $Page->EmergencyS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EmergencyS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EmergencyS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EmergencyS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EmergencyS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EmergencyS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
    <?php if ($Page->SortUrl($Page->EmergencyP) == "") { ?>
        <th class="<?= $Page->EmergencyP->headerCellClass() ?>"><?= $Page->EmergencyP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->EmergencyP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->EmergencyP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->EmergencyP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->EmergencyP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->EmergencyP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
    <?php if ($Page->SortUrl($Page->Maturity) == "") { ?>
        <th class="<?= $Page->Maturity->headerCellClass() ?>"><?= $Page->Maturity->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Maturity->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Maturity->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Maturity->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Maturity->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Maturity->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
    <?php if ($Page->SortUrl($Page->Baby1) == "") { ?>
        <th class="<?= $Page->Baby1->headerCellClass() ?>"><?= $Page->Baby1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Baby1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Baby1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Baby1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Baby1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Baby1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
    <?php if ($Page->SortUrl($Page->Baby2) == "") { ?>
        <th class="<?= $Page->Baby2->headerCellClass() ?>"><?= $Page->Baby2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Baby2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Baby2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Baby2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Baby2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Baby2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
    <?php if ($Page->SortUrl($Page->sex1) == "") { ?>
        <th class="<?= $Page->sex1->headerCellClass() ?>"><?= $Page->sex1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->sex1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->sex1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->sex1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->sex1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->sex1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
    <?php if ($Page->SortUrl($Page->sex2) == "") { ?>
        <th class="<?= $Page->sex2->headerCellClass() ?>"><?= $Page->sex2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->sex2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->sex2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->sex2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->sex2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->sex2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
    <?php if ($Page->SortUrl($Page->weight1) == "") { ?>
        <th class="<?= $Page->weight1->headerCellClass() ?>"><?= $Page->weight1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->weight1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->weight1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->weight1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->weight1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->weight1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
    <?php if ($Page->SortUrl($Page->weight2) == "") { ?>
        <th class="<?= $Page->weight2->headerCellClass() ?>"><?= $Page->weight2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->weight2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->weight2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->weight2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->weight2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->weight2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
    <?php if ($Page->SortUrl($Page->NICU1) == "") { ?>
        <th class="<?= $Page->NICU1->headerCellClass() ?>"><?= $Page->NICU1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NICU1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NICU1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NICU1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NICU1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NICU1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
    <?php if ($Page->SortUrl($Page->NICU2) == "") { ?>
        <th class="<?= $Page->NICU2->headerCellClass() ?>"><?= $Page->NICU2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NICU2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NICU2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NICU2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NICU2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NICU2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
    <?php if ($Page->SortUrl($Page->Jaundice1) == "") { ?>
        <th class="<?= $Page->Jaundice1->headerCellClass() ?>"><?= $Page->Jaundice1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Jaundice1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Jaundice1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Jaundice1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Jaundice1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Jaundice1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
    <?php if ($Page->SortUrl($Page->Jaundice2) == "") { ?>
        <th class="<?= $Page->Jaundice2->headerCellClass() ?>"><?= $Page->Jaundice2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Jaundice2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Jaundice2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Jaundice2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Jaundice2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Jaundice2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
    <?php if ($Page->SortUrl($Page->SpillOverReasons) == "") { ?>
        <th class="<?= $Page->SpillOverReasons->headerCellClass() ?>"><?= $Page->SpillOverReasons->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SpillOverReasons->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SpillOverReasons->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SpillOverReasons->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SpillOverReasons->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SpillOverReasons->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
    <?php if ($Page->SortUrl($Page->ANClosed) == "") { ?>
        <th class="<?= $Page->ANClosed->headerCellClass() ?>"><?= $Page->ANClosed->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ANClosed->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ANClosed->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ANClosed->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ANClosed->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ANClosed->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
    <?php if ($Page->SortUrl($Page->ANClosedDATE) == "") { ?>
        <th class="<?= $Page->ANClosedDATE->headerCellClass() ?>"><?= $Page->ANClosedDATE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ANClosedDATE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ANClosedDATE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ANClosedDATE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ANClosedDATE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ANClosedDATE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
    <?php if ($Page->SortUrl($Page->PastMedicalHistoryOthers) == "") { ?>
        <th class="<?= $Page->PastMedicalHistoryOthers->headerCellClass() ?>"><?= $Page->PastMedicalHistoryOthers->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PastMedicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PastMedicalHistoryOthers->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PastMedicalHistoryOthers->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PastMedicalHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PastMedicalHistoryOthers->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
    <?php if ($Page->SortUrl($Page->PastSurgicalHistoryOthers) == "") { ?>
        <th class="<?= $Page->PastSurgicalHistoryOthers->headerCellClass() ?>"><?= $Page->PastSurgicalHistoryOthers->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PastSurgicalHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PastSurgicalHistoryOthers->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PastSurgicalHistoryOthers->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PastSurgicalHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PastSurgicalHistoryOthers->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
    <?php if ($Page->SortUrl($Page->FamilyHistoryOthers) == "") { ?>
        <th class="<?= $Page->FamilyHistoryOthers->headerCellClass() ?>"><?= $Page->FamilyHistoryOthers->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FamilyHistoryOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FamilyHistoryOthers->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FamilyHistoryOthers->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FamilyHistoryOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FamilyHistoryOthers->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
    <?php if ($Page->SortUrl($Page->PresentPregnancyComplicationsOthers) == "") { ?>
        <th class="<?= $Page->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><?= $Page->PresentPregnancyComplicationsOthers->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PresentPregnancyComplicationsOthers->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PresentPregnancyComplicationsOthers->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PresentPregnancyComplicationsOthers->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PresentPregnancyComplicationsOthers->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PresentPregnancyComplicationsOthers->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
    <?php if ($Page->SortUrl($Page->ETdate) == "") { ?>
        <th class="<?= $Page->ETdate->headerCellClass() ?>"><?= $Page->ETdate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ETdate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ETdate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ETdate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ETdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ETdate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->pid->Visible) { // pid ?>
        <!-- pid -->
        <td<?= $Page->pid->cellAttributes() ?>>
<span<?= $Page->pid->viewAttributes() ?>>
<?= $Page->pid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
        <!-- fid -->
        <td<?= $Page->fid->cellAttributes() ?>>
<span<?= $Page->fid->viewAttributes() ?>>
<?= $Page->fid->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
        <!-- G -->
        <td<?= $Page->G->cellAttributes() ?>>
<span<?= $Page->G->viewAttributes() ?>>
<?= $Page->G->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
        <!-- P -->
        <td<?= $Page->P->cellAttributes() ?>>
<span<?= $Page->P->viewAttributes() ?>>
<?= $Page->P->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
        <!-- L -->
        <td<?= $Page->L->cellAttributes() ?>>
<span<?= $Page->L->viewAttributes() ?>>
<?= $Page->L->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <!-- A -->
        <td<?= $Page->A->cellAttributes() ?>>
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
        <!-- E -->
        <td<?= $Page->E->cellAttributes() ?>>
<span<?= $Page->E->viewAttributes() ?>>
<?= $Page->E->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <!-- M -->
        <td<?= $Page->M->cellAttributes() ?>>
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
        <!-- LMP -->
        <td<?= $Page->LMP->cellAttributes() ?>>
<span<?= $Page->LMP->viewAttributes() ?>>
<?= $Page->LMP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EDO->Visible) { // EDO ?>
        <!-- EDO -->
        <td<?= $Page->EDO->cellAttributes() ?>>
<span<?= $Page->EDO->viewAttributes() ?>>
<?= $Page->EDO->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
        <!-- MenstrualHistory -->
        <td<?= $Page->MenstrualHistory->cellAttributes() ?>>
<span<?= $Page->MenstrualHistory->viewAttributes() ?>>
<?= $Page->MenstrualHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
        <!-- MaritalHistory -->
        <td<?= $Page->MaritalHistory->cellAttributes() ?>>
<span<?= $Page->MaritalHistory->viewAttributes() ?>>
<?= $Page->MaritalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
        <!-- ObstetricHistory -->
        <td<?= $Page->ObstetricHistory->cellAttributes() ?>>
<span<?= $Page->ObstetricHistory->viewAttributes() ?>>
<?= $Page->ObstetricHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
        <!-- PreviousHistoryofGDM -->
        <td<?= $Page->PreviousHistoryofGDM->cellAttributes() ?>>
<span<?= $Page->PreviousHistoryofGDM->viewAttributes() ?>>
<?= $Page->PreviousHistoryofGDM->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
        <!-- PreviousHistorofPIH -->
        <td<?= $Page->PreviousHistorofPIH->cellAttributes() ?>>
<span<?= $Page->PreviousHistorofPIH->viewAttributes() ?>>
<?= $Page->PreviousHistorofPIH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
        <!-- PreviousHistoryofIUGR -->
        <td<?= $Page->PreviousHistoryofIUGR->cellAttributes() ?>>
<span<?= $Page->PreviousHistoryofIUGR->viewAttributes() ?>>
<?= $Page->PreviousHistoryofIUGR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
        <!-- PreviousHistoryofOligohydramnios -->
        <td<?= $Page->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span<?= $Page->PreviousHistoryofOligohydramnios->viewAttributes() ?>>
<?= $Page->PreviousHistoryofOligohydramnios->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
        <!-- PreviousHistoryofPreterm -->
        <td<?= $Page->PreviousHistoryofPreterm->cellAttributes() ?>>
<span<?= $Page->PreviousHistoryofPreterm->viewAttributes() ?>>
<?= $Page->PreviousHistoryofPreterm->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
        <!-- G1 -->
        <td<?= $Page->G1->cellAttributes() ?>>
<span<?= $Page->G1->viewAttributes() ?>>
<?= $Page->G1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
        <!-- G2 -->
        <td<?= $Page->G2->cellAttributes() ?>>
<span<?= $Page->G2->viewAttributes() ?>>
<?= $Page->G2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
        <!-- G3 -->
        <td<?= $Page->G3->cellAttributes() ?>>
<span<?= $Page->G3->viewAttributes() ?>>
<?= $Page->G3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
        <!-- DeliveryNDLSCS1 -->
        <td<?= $Page->DeliveryNDLSCS1->cellAttributes() ?>>
<span<?= $Page->DeliveryNDLSCS1->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
        <!-- DeliveryNDLSCS2 -->
        <td<?= $Page->DeliveryNDLSCS2->cellAttributes() ?>>
<span<?= $Page->DeliveryNDLSCS2->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
        <!-- DeliveryNDLSCS3 -->
        <td<?= $Page->DeliveryNDLSCS3->cellAttributes() ?>>
<span<?= $Page->DeliveryNDLSCS3->viewAttributes() ?>>
<?= $Page->DeliveryNDLSCS3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
        <!-- BabySexweight1 -->
        <td<?= $Page->BabySexweight1->cellAttributes() ?>>
<span<?= $Page->BabySexweight1->viewAttributes() ?>>
<?= $Page->BabySexweight1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
        <!-- BabySexweight2 -->
        <td<?= $Page->BabySexweight2->cellAttributes() ?>>
<span<?= $Page->BabySexweight2->viewAttributes() ?>>
<?= $Page->BabySexweight2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
        <!-- BabySexweight3 -->
        <td<?= $Page->BabySexweight3->cellAttributes() ?>>
<span<?= $Page->BabySexweight3->viewAttributes() ?>>
<?= $Page->BabySexweight3->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
        <!-- PastMedicalHistory -->
        <td<?= $Page->PastMedicalHistory->cellAttributes() ?>>
<span<?= $Page->PastMedicalHistory->viewAttributes() ?>>
<?= $Page->PastMedicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
        <!-- PastSurgicalHistory -->
        <td<?= $Page->PastSurgicalHistory->cellAttributes() ?>>
<span<?= $Page->PastSurgicalHistory->viewAttributes() ?>>
<?= $Page->PastSurgicalHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
        <!-- FamilyHistory -->
        <td<?= $Page->FamilyHistory->cellAttributes() ?>>
<span<?= $Page->FamilyHistory->viewAttributes() ?>>
<?= $Page->FamilyHistory->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
        <!-- Viability -->
        <td<?= $Page->Viability->cellAttributes() ?>>
<span<?= $Page->Viability->viewAttributes() ?>>
<?= $Page->Viability->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
        <!-- ViabilityDATE -->
        <td<?= $Page->ViabilityDATE->cellAttributes() ?>>
<span<?= $Page->ViabilityDATE->viewAttributes() ?>>
<?= $Page->ViabilityDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
        <!-- ViabilityREPORT -->
        <td<?= $Page->ViabilityREPORT->cellAttributes() ?>>
<span<?= $Page->ViabilityREPORT->viewAttributes() ?>>
<?= $Page->ViabilityREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
        <!-- Viability2 -->
        <td<?= $Page->Viability2->cellAttributes() ?>>
<span<?= $Page->Viability2->viewAttributes() ?>>
<?= $Page->Viability2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
        <!-- Viability2DATE -->
        <td<?= $Page->Viability2DATE->cellAttributes() ?>>
<span<?= $Page->Viability2DATE->viewAttributes() ?>>
<?= $Page->Viability2DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Viability2REPORT->Visible) { // Viability2REPORT ?>
        <!-- Viability2REPORT -->
        <td<?= $Page->Viability2REPORT->cellAttributes() ?>>
<span<?= $Page->Viability2REPORT->viewAttributes() ?>>
<?= $Page->Viability2REPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
        <!-- NTscan -->
        <td<?= $Page->NTscan->cellAttributes() ?>>
<span<?= $Page->NTscan->viewAttributes() ?>>
<?= $Page->NTscan->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
        <!-- NTscanDATE -->
        <td<?= $Page->NTscanDATE->cellAttributes() ?>>
<span<?= $Page->NTscanDATE->viewAttributes() ?>>
<?= $Page->NTscanDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NTscanREPORT->Visible) { // NTscanREPORT ?>
        <!-- NTscanREPORT -->
        <td<?= $Page->NTscanREPORT->cellAttributes() ?>>
<span<?= $Page->NTscanREPORT->viewAttributes() ?>>
<?= $Page->NTscanREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
        <!-- EarlyTarget -->
        <td<?= $Page->EarlyTarget->cellAttributes() ?>>
<span<?= $Page->EarlyTarget->viewAttributes() ?>>
<?= $Page->EarlyTarget->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
        <!-- EarlyTargetDATE -->
        <td<?= $Page->EarlyTargetDATE->cellAttributes() ?>>
<span<?= $Page->EarlyTargetDATE->viewAttributes() ?>>
<?= $Page->EarlyTargetDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
        <!-- EarlyTargetREPORT -->
        <td<?= $Page->EarlyTargetREPORT->cellAttributes() ?>>
<span<?= $Page->EarlyTargetREPORT->viewAttributes() ?>>
<?= $Page->EarlyTargetREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
        <!-- Anomaly -->
        <td<?= $Page->Anomaly->cellAttributes() ?>>
<span<?= $Page->Anomaly->viewAttributes() ?>>
<?= $Page->Anomaly->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
        <!-- AnomalyDATE -->
        <td<?= $Page->AnomalyDATE->cellAttributes() ?>>
<span<?= $Page->AnomalyDATE->viewAttributes() ?>>
<?= $Page->AnomalyDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
        <!-- AnomalyREPORT -->
        <td<?= $Page->AnomalyREPORT->cellAttributes() ?>>
<span<?= $Page->AnomalyREPORT->viewAttributes() ?>>
<?= $Page->AnomalyREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
        <!-- Growth -->
        <td<?= $Page->Growth->cellAttributes() ?>>
<span<?= $Page->Growth->viewAttributes() ?>>
<?= $Page->Growth->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
        <!-- GrowthDATE -->
        <td<?= $Page->GrowthDATE->cellAttributes() ?>>
<span<?= $Page->GrowthDATE->viewAttributes() ?>>
<?= $Page->GrowthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GrowthREPORT->Visible) { // GrowthREPORT ?>
        <!-- GrowthREPORT -->
        <td<?= $Page->GrowthREPORT->cellAttributes() ?>>
<span<?= $Page->GrowthREPORT->viewAttributes() ?>>
<?= $Page->GrowthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
        <!-- Growth1 -->
        <td<?= $Page->Growth1->cellAttributes() ?>>
<span<?= $Page->Growth1->viewAttributes() ?>>
<?= $Page->Growth1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
        <!-- Growth1DATE -->
        <td<?= $Page->Growth1DATE->cellAttributes() ?>>
<span<?= $Page->Growth1DATE->viewAttributes() ?>>
<?= $Page->Growth1DATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Growth1REPORT->Visible) { // Growth1REPORT ?>
        <!-- Growth1REPORT -->
        <td<?= $Page->Growth1REPORT->cellAttributes() ?>>
<span<?= $Page->Growth1REPORT->viewAttributes() ?>>
<?= $Page->Growth1REPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
        <!-- ANProfile -->
        <td<?= $Page->ANProfile->cellAttributes() ?>>
<span<?= $Page->ANProfile->viewAttributes() ?>>
<?= $Page->ANProfile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
        <!-- ANProfileDATE -->
        <td<?= $Page->ANProfileDATE->cellAttributes() ?>>
<span<?= $Page->ANProfileDATE->viewAttributes() ?>>
<?= $Page->ANProfileDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
        <!-- ANProfileINHOUSE -->
        <td<?= $Page->ANProfileINHOUSE->cellAttributes() ?>>
<span<?= $Page->ANProfileINHOUSE->viewAttributes() ?>>
<?= $Page->ANProfileINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
        <!-- ANProfileREPORT -->
        <td<?= $Page->ANProfileREPORT->cellAttributes() ?>>
<span<?= $Page->ANProfileREPORT->viewAttributes() ?>>
<?= $Page->ANProfileREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
        <!-- DualMarker -->
        <td<?= $Page->DualMarker->cellAttributes() ?>>
<span<?= $Page->DualMarker->viewAttributes() ?>>
<?= $Page->DualMarker->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
        <!-- DualMarkerDATE -->
        <td<?= $Page->DualMarkerDATE->cellAttributes() ?>>
<span<?= $Page->DualMarkerDATE->viewAttributes() ?>>
<?= $Page->DualMarkerDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
        <!-- DualMarkerINHOUSE -->
        <td<?= $Page->DualMarkerINHOUSE->cellAttributes() ?>>
<span<?= $Page->DualMarkerINHOUSE->viewAttributes() ?>>
<?= $Page->DualMarkerINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
        <!-- DualMarkerREPORT -->
        <td<?= $Page->DualMarkerREPORT->cellAttributes() ?>>
<span<?= $Page->DualMarkerREPORT->viewAttributes() ?>>
<?= $Page->DualMarkerREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
        <!-- Quadruple -->
        <td<?= $Page->Quadruple->cellAttributes() ?>>
<span<?= $Page->Quadruple->viewAttributes() ?>>
<?= $Page->Quadruple->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
        <!-- QuadrupleDATE -->
        <td<?= $Page->QuadrupleDATE->cellAttributes() ?>>
<span<?= $Page->QuadrupleDATE->viewAttributes() ?>>
<?= $Page->QuadrupleDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
        <!-- QuadrupleINHOUSE -->
        <td<?= $Page->QuadrupleINHOUSE->cellAttributes() ?>>
<span<?= $Page->QuadrupleINHOUSE->viewAttributes() ?>>
<?= $Page->QuadrupleINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
        <!-- QuadrupleREPORT -->
        <td<?= $Page->QuadrupleREPORT->cellAttributes() ?>>
<span<?= $Page->QuadrupleREPORT->viewAttributes() ?>>
<?= $Page->QuadrupleREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
        <!-- A5month -->
        <td<?= $Page->A5month->cellAttributes() ?>>
<span<?= $Page->A5month->viewAttributes() ?>>
<?= $Page->A5month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
        <!-- A5monthDATE -->
        <td<?= $Page->A5monthDATE->cellAttributes() ?>>
<span<?= $Page->A5monthDATE->viewAttributes() ?>>
<?= $Page->A5monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
        <!-- A5monthINHOUSE -->
        <td<?= $Page->A5monthINHOUSE->cellAttributes() ?>>
<span<?= $Page->A5monthINHOUSE->viewAttributes() ?>>
<?= $Page->A5monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A5monthREPORT->Visible) { // A5monthREPORT ?>
        <!-- A5monthREPORT -->
        <td<?= $Page->A5monthREPORT->cellAttributes() ?>>
<span<?= $Page->A5monthREPORT->viewAttributes() ?>>
<?= $Page->A5monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
        <!-- A7month -->
        <td<?= $Page->A7month->cellAttributes() ?>>
<span<?= $Page->A7month->viewAttributes() ?>>
<?= $Page->A7month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
        <!-- A7monthDATE -->
        <td<?= $Page->A7monthDATE->cellAttributes() ?>>
<span<?= $Page->A7monthDATE->viewAttributes() ?>>
<?= $Page->A7monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
        <!-- A7monthINHOUSE -->
        <td<?= $Page->A7monthINHOUSE->cellAttributes() ?>>
<span<?= $Page->A7monthINHOUSE->viewAttributes() ?>>
<?= $Page->A7monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A7monthREPORT->Visible) { // A7monthREPORT ?>
        <!-- A7monthREPORT -->
        <td<?= $Page->A7monthREPORT->cellAttributes() ?>>
<span<?= $Page->A7monthREPORT->viewAttributes() ?>>
<?= $Page->A7monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
        <!-- A9month -->
        <td<?= $Page->A9month->cellAttributes() ?>>
<span<?= $Page->A9month->viewAttributes() ?>>
<?= $Page->A9month->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
        <!-- A9monthDATE -->
        <td<?= $Page->A9monthDATE->cellAttributes() ?>>
<span<?= $Page->A9monthDATE->viewAttributes() ?>>
<?= $Page->A9monthDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
        <!-- A9monthINHOUSE -->
        <td<?= $Page->A9monthINHOUSE->cellAttributes() ?>>
<span<?= $Page->A9monthINHOUSE->viewAttributes() ?>>
<?= $Page->A9monthINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A9monthREPORT->Visible) { // A9monthREPORT ?>
        <!-- A9monthREPORT -->
        <td<?= $Page->A9monthREPORT->cellAttributes() ?>>
<span<?= $Page->A9monthREPORT->viewAttributes() ?>>
<?= $Page->A9monthREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
        <!-- INJ -->
        <td<?= $Page->INJ->cellAttributes() ?>>
<span<?= $Page->INJ->viewAttributes() ?>>
<?= $Page->INJ->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
        <!-- INJDATE -->
        <td<?= $Page->INJDATE->cellAttributes() ?>>
<span<?= $Page->INJDATE->viewAttributes() ?>>
<?= $Page->INJDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
        <!-- INJINHOUSE -->
        <td<?= $Page->INJINHOUSE->cellAttributes() ?>>
<span<?= $Page->INJINHOUSE->viewAttributes() ?>>
<?= $Page->INJINHOUSE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->INJREPORT->Visible) { // INJREPORT ?>
        <!-- INJREPORT -->
        <td<?= $Page->INJREPORT->cellAttributes() ?>>
<span<?= $Page->INJREPORT->viewAttributes() ?>>
<?= $Page->INJREPORT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
        <!-- Bleeding -->
        <td<?= $Page->Bleeding->cellAttributes() ?>>
<span<?= $Page->Bleeding->viewAttributes() ?>>
<?= $Page->Bleeding->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
        <!-- Hypothyroidism -->
        <td<?= $Page->Hypothyroidism->cellAttributes() ?>>
<span<?= $Page->Hypothyroidism->viewAttributes() ?>>
<?= $Page->Hypothyroidism->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
        <!-- PICMENumber -->
        <td<?= $Page->PICMENumber->cellAttributes() ?>>
<span<?= $Page->PICMENumber->viewAttributes() ?>>
<?= $Page->PICMENumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
        <!-- Outcome -->
        <td<?= $Page->Outcome->cellAttributes() ?>>
<span<?= $Page->Outcome->viewAttributes() ?>>
<?= $Page->Outcome->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
        <!-- DateofAdmission -->
        <td<?= $Page->DateofAdmission->cellAttributes() ?>>
<span<?= $Page->DateofAdmission->viewAttributes() ?>>
<?= $Page->DateofAdmission->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
        <!-- DateodProcedure -->
        <td<?= $Page->DateodProcedure->cellAttributes() ?>>
<span<?= $Page->DateodProcedure->viewAttributes() ?>>
<?= $Page->DateodProcedure->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
        <!-- Miscarriage -->
        <td<?= $Page->Miscarriage->cellAttributes() ?>>
<span<?= $Page->Miscarriage->viewAttributes() ?>>
<?= $Page->Miscarriage->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
        <!-- ModeOfDelivery -->
        <td<?= $Page->ModeOfDelivery->cellAttributes() ?>>
<span<?= $Page->ModeOfDelivery->viewAttributes() ?>>
<?= $Page->ModeOfDelivery->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
        <!-- ND -->
        <td<?= $Page->ND->cellAttributes() ?>>
<span<?= $Page->ND->viewAttributes() ?>>
<?= $Page->ND->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
        <!-- NDS -->
        <td<?= $Page->NDS->cellAttributes() ?>>
<span<?= $Page->NDS->viewAttributes() ?>>
<?= $Page->NDS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
        <!-- NDP -->
        <td<?= $Page->NDP->cellAttributes() ?>>
<span<?= $Page->NDP->viewAttributes() ?>>
<?= $Page->NDP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
        <!-- Vaccum -->
        <td<?= $Page->Vaccum->cellAttributes() ?>>
<span<?= $Page->Vaccum->viewAttributes() ?>>
<?= $Page->Vaccum->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
        <!-- VaccumS -->
        <td<?= $Page->VaccumS->cellAttributes() ?>>
<span<?= $Page->VaccumS->viewAttributes() ?>>
<?= $Page->VaccumS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
        <!-- VaccumP -->
        <td<?= $Page->VaccumP->cellAttributes() ?>>
<span<?= $Page->VaccumP->viewAttributes() ?>>
<?= $Page->VaccumP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
        <!-- Forceps -->
        <td<?= $Page->Forceps->cellAttributes() ?>>
<span<?= $Page->Forceps->viewAttributes() ?>>
<?= $Page->Forceps->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
        <!-- ForcepsS -->
        <td<?= $Page->ForcepsS->cellAttributes() ?>>
<span<?= $Page->ForcepsS->viewAttributes() ?>>
<?= $Page->ForcepsS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
        <!-- ForcepsP -->
        <td<?= $Page->ForcepsP->cellAttributes() ?>>
<span<?= $Page->ForcepsP->viewAttributes() ?>>
<?= $Page->ForcepsP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
        <!-- Elective -->
        <td<?= $Page->Elective->cellAttributes() ?>>
<span<?= $Page->Elective->viewAttributes() ?>>
<?= $Page->Elective->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
        <!-- ElectiveS -->
        <td<?= $Page->ElectiveS->cellAttributes() ?>>
<span<?= $Page->ElectiveS->viewAttributes() ?>>
<?= $Page->ElectiveS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
        <!-- ElectiveP -->
        <td<?= $Page->ElectiveP->cellAttributes() ?>>
<span<?= $Page->ElectiveP->viewAttributes() ?>>
<?= $Page->ElectiveP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
        <!-- Emergency -->
        <td<?= $Page->Emergency->cellAttributes() ?>>
<span<?= $Page->Emergency->viewAttributes() ?>>
<?= $Page->Emergency->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
        <!-- EmergencyS -->
        <td<?= $Page->EmergencyS->cellAttributes() ?>>
<span<?= $Page->EmergencyS->viewAttributes() ?>>
<?= $Page->EmergencyS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
        <!-- EmergencyP -->
        <td<?= $Page->EmergencyP->cellAttributes() ?>>
<span<?= $Page->EmergencyP->viewAttributes() ?>>
<?= $Page->EmergencyP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
        <!-- Maturity -->
        <td<?= $Page->Maturity->cellAttributes() ?>>
<span<?= $Page->Maturity->viewAttributes() ?>>
<?= $Page->Maturity->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
        <!-- Baby1 -->
        <td<?= $Page->Baby1->cellAttributes() ?>>
<span<?= $Page->Baby1->viewAttributes() ?>>
<?= $Page->Baby1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
        <!-- Baby2 -->
        <td<?= $Page->Baby2->cellAttributes() ?>>
<span<?= $Page->Baby2->viewAttributes() ?>>
<?= $Page->Baby2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
        <!-- sex1 -->
        <td<?= $Page->sex1->cellAttributes() ?>>
<span<?= $Page->sex1->viewAttributes() ?>>
<?= $Page->sex1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
        <!-- sex2 -->
        <td<?= $Page->sex2->cellAttributes() ?>>
<span<?= $Page->sex2->viewAttributes() ?>>
<?= $Page->sex2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
        <!-- weight1 -->
        <td<?= $Page->weight1->cellAttributes() ?>>
<span<?= $Page->weight1->viewAttributes() ?>>
<?= $Page->weight1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
        <!-- weight2 -->
        <td<?= $Page->weight2->cellAttributes() ?>>
<span<?= $Page->weight2->viewAttributes() ?>>
<?= $Page->weight2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
        <!-- NICU1 -->
        <td<?= $Page->NICU1->cellAttributes() ?>>
<span<?= $Page->NICU1->viewAttributes() ?>>
<?= $Page->NICU1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
        <!-- NICU2 -->
        <td<?= $Page->NICU2->cellAttributes() ?>>
<span<?= $Page->NICU2->viewAttributes() ?>>
<?= $Page->NICU2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
        <!-- Jaundice1 -->
        <td<?= $Page->Jaundice1->cellAttributes() ?>>
<span<?= $Page->Jaundice1->viewAttributes() ?>>
<?= $Page->Jaundice1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
        <!-- Jaundice2 -->
        <td<?= $Page->Jaundice2->cellAttributes() ?>>
<span<?= $Page->Jaundice2->viewAttributes() ?>>
<?= $Page->Jaundice2->getViewValue() ?></span>
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
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
        <!-- SpillOverReasons -->
        <td<?= $Page->SpillOverReasons->cellAttributes() ?>>
<span<?= $Page->SpillOverReasons->viewAttributes() ?>>
<?= $Page->SpillOverReasons->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
        <!-- ANClosed -->
        <td<?= $Page->ANClosed->cellAttributes() ?>>
<span<?= $Page->ANClosed->viewAttributes() ?>>
<?= $Page->ANClosed->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
        <!-- ANClosedDATE -->
        <td<?= $Page->ANClosedDATE->cellAttributes() ?>>
<span<?= $Page->ANClosedDATE->viewAttributes() ?>>
<?= $Page->ANClosedDATE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
        <!-- PastMedicalHistoryOthers -->
        <td<?= $Page->PastMedicalHistoryOthers->cellAttributes() ?>>
<span<?= $Page->PastMedicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastMedicalHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
        <!-- PastSurgicalHistoryOthers -->
        <td<?= $Page->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span<?= $Page->PastSurgicalHistoryOthers->viewAttributes() ?>>
<?= $Page->PastSurgicalHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
        <!-- FamilyHistoryOthers -->
        <td<?= $Page->FamilyHistoryOthers->cellAttributes() ?>>
<span<?= $Page->FamilyHistoryOthers->viewAttributes() ?>>
<?= $Page->FamilyHistoryOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
        <!-- PresentPregnancyComplicationsOthers -->
        <td<?= $Page->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span<?= $Page->PresentPregnancyComplicationsOthers->viewAttributes() ?>>
<?= $Page->PresentPregnancyComplicationsOthers->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
        <!-- ETdate -->
        <td<?= $Page->ETdate->cellAttributes() ?>>
<span<?= $Page->ETdate->viewAttributes() ?>>
<?= $Page->ETdate->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientVitalsPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_vitals"><!-- .card -->
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
<?php if ($Page->PatID->Visible) { // PatID ?>
    <?php if ($Page->SortUrl($Page->PatID) == "") { ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><?= $Page->PatID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <?php if ($Page->SortUrl($Page->MobileNumber) == "") { ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><?= $Page->MobileNumber->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MobileNumber->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MobileNumber->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MobileNumber->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
    <?php if ($Page->SortUrl($Page->HT) == "") { ?>
        <th class="<?= $Page->HT->headerCellClass() ?>"><?= $Page->HT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
    <?php if ($Page->SortUrl($Page->WT) == "") { ?>
        <th class="<?= $Page->WT->headerCellClass() ?>"><?= $Page->WT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->WT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->WT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->WT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->WT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->WT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
    <?php if ($Page->SortUrl($Page->SurfaceArea) == "") { ?>
        <th class="<?= $Page->SurfaceArea->headerCellClass() ?>"><?= $Page->SurfaceArea->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SurfaceArea->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SurfaceArea->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SurfaceArea->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SurfaceArea->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SurfaceArea->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
    <?php if ($Page->SortUrl($Page->BodyMassIndex) == "") { ?>
        <th class="<?= $Page->BodyMassIndex->headerCellClass() ?>"><?= $Page->BodyMassIndex->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BodyMassIndex->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BodyMassIndex->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BodyMassIndex->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BodyMassIndex->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BodyMassIndex->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
    <?php if ($Page->SortUrl($Page->AnticoagulantifAny) == "") { ?>
        <th class="<?= $Page->AnticoagulantifAny->headerCellClass() ?>"><?= $Page->AnticoagulantifAny->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AnticoagulantifAny->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AnticoagulantifAny->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AnticoagulantifAny->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AnticoagulantifAny->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AnticoagulantifAny->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
    <?php if ($Page->SortUrl($Page->FoodAllergies) == "") { ?>
        <th class="<?= $Page->FoodAllergies->headerCellClass() ?>"><?= $Page->FoodAllergies->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FoodAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FoodAllergies->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FoodAllergies->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FoodAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FoodAllergies->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
    <?php if ($Page->SortUrl($Page->GenericAllergies) == "") { ?>
        <th class="<?= $Page->GenericAllergies->headerCellClass() ?>"><?= $Page->GenericAllergies->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GenericAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GenericAllergies->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GenericAllergies->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GenericAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GenericAllergies->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
    <?php if ($Page->SortUrl($Page->GroupAllergies) == "") { ?>
        <th class="<?= $Page->GroupAllergies->headerCellClass() ?>"><?= $Page->GroupAllergies->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GroupAllergies->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GroupAllergies->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GroupAllergies->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GroupAllergies->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GroupAllergies->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
    <?php if ($Page->SortUrl($Page->Temp) == "") { ?>
        <th class="<?= $Page->Temp->headerCellClass() ?>"><?= $Page->Temp->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Temp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Temp->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Temp->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Temp->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Temp->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <?php if ($Page->SortUrl($Page->Pulse) == "") { ?>
        <th class="<?= $Page->Pulse->headerCellClass() ?>"><?= $Page->Pulse->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Pulse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Pulse->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Pulse->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Pulse->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Pulse->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <?php if ($Page->SortUrl($Page->BP) == "") { ?>
        <th class="<?= $Page->BP->headerCellClass() ?>"><?= $Page->BP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
    <?php if ($Page->SortUrl($Page->PR) == "") { ?>
        <th class="<?= $Page->PR->headerCellClass() ?>"><?= $Page->PR->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PR->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PR->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PR->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PR->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PR->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
    <?php if ($Page->SortUrl($Page->CNS) == "") { ?>
        <th class="<?= $Page->CNS->headerCellClass() ?>"><?= $Page->CNS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CNS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CNS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CNS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CNS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CNS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
    <?php if ($Page->SortUrl($Page->RSA) == "") { ?>
        <th class="<?= $Page->RSA->headerCellClass() ?>"><?= $Page->RSA->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RSA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RSA->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RSA->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RSA->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RSA->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
    <?php if ($Page->SortUrl($Page->CVS) == "") { ?>
        <th class="<?= $Page->CVS->headerCellClass() ?>"><?= $Page->CVS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CVS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CVS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CVS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CVS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CVS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
    <?php if ($Page->SortUrl($Page->PA) == "") { ?>
        <th class="<?= $Page->PA->headerCellClass() ?>"><?= $Page->PA->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PA->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PA->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PA->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PA->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PA->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
    <?php if ($Page->SortUrl($Page->PS) == "") { ?>
        <th class="<?= $Page->PS->headerCellClass() ?>"><?= $Page->PS->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PS->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PS->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PS->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PS->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PS->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
    <?php if ($Page->SortUrl($Page->PV) == "") { ?>
        <th class="<?= $Page->PV->headerCellClass() ?>"><?= $Page->PV->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PV->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PV->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PV->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PV->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PV->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
    <?php if ($Page->SortUrl($Page->clinicaldetails) == "") { ?>
        <th class="<?= $Page->clinicaldetails->headerCellClass() ?>"><?= $Page->clinicaldetails->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->clinicaldetails->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->clinicaldetails->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->clinicaldetails->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->clinicaldetails->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->clinicaldetails->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <?php if ($Page->SortUrl($Page->PatientId) == "") { ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><?= $Page->PatientId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td<?= $Page->id->cellAttributes() ?>>
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
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
<?php if ($Page->PatID->Visible) { // PatID ?>
        <!-- PatID -->
        <td<?= $Page->PatID->cellAttributes() ?>>
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <!-- MobileNumber -->
        <td<?= $Page->MobileNumber->cellAttributes() ?>>
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HT->Visible) { // HT ?>
        <!-- HT -->
        <td<?= $Page->HT->cellAttributes() ?>>
<span<?= $Page->HT->viewAttributes() ?>>
<?= $Page->HT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->WT->Visible) { // WT ?>
        <!-- WT -->
        <td<?= $Page->WT->cellAttributes() ?>>
<span<?= $Page->WT->viewAttributes() ?>>
<?= $Page->WT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SurfaceArea->Visible) { // SurfaceArea ?>
        <!-- SurfaceArea -->
        <td<?= $Page->SurfaceArea->cellAttributes() ?>>
<span<?= $Page->SurfaceArea->viewAttributes() ?>>
<?= $Page->SurfaceArea->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BodyMassIndex->Visible) { // BodyMassIndex ?>
        <!-- BodyMassIndex -->
        <td<?= $Page->BodyMassIndex->cellAttributes() ?>>
<span<?= $Page->BodyMassIndex->viewAttributes() ?>>
<?= $Page->BodyMassIndex->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
        <!-- AnticoagulantifAny -->
        <td<?= $Page->AnticoagulantifAny->cellAttributes() ?>>
<span<?= $Page->AnticoagulantifAny->viewAttributes() ?>>
<?= $Page->AnticoagulantifAny->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FoodAllergies->Visible) { // FoodAllergies ?>
        <!-- FoodAllergies -->
        <td<?= $Page->FoodAllergies->cellAttributes() ?>>
<span<?= $Page->FoodAllergies->viewAttributes() ?>>
<?= $Page->FoodAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GenericAllergies->Visible) { // GenericAllergies ?>
        <!-- GenericAllergies -->
        <td<?= $Page->GenericAllergies->cellAttributes() ?>>
<span<?= $Page->GenericAllergies->viewAttributes() ?>>
<?= $Page->GenericAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GroupAllergies->Visible) { // GroupAllergies ?>
        <!-- GroupAllergies -->
        <td<?= $Page->GroupAllergies->cellAttributes() ?>>
<span<?= $Page->GroupAllergies->viewAttributes() ?>>
<?= $Page->GroupAllergies->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Temp->Visible) { // Temp ?>
        <!-- Temp -->
        <td<?= $Page->Temp->cellAttributes() ?>>
<span<?= $Page->Temp->viewAttributes() ?>>
<?= $Page->Temp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <!-- Pulse -->
        <td<?= $Page->Pulse->cellAttributes() ?>>
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <!-- BP -->
        <td<?= $Page->BP->cellAttributes() ?>>
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PR->Visible) { // PR ?>
        <!-- PR -->
        <td<?= $Page->PR->cellAttributes() ?>>
<span<?= $Page->PR->viewAttributes() ?>>
<?= $Page->PR->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CNS->Visible) { // CNS ?>
        <!-- CNS -->
        <td<?= $Page->CNS->cellAttributes() ?>>
<span<?= $Page->CNS->viewAttributes() ?>>
<?= $Page->CNS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RSA->Visible) { // RSA ?>
        <!-- RSA -->
        <td<?= $Page->RSA->cellAttributes() ?>>
<span<?= $Page->RSA->viewAttributes() ?>>
<?= $Page->RSA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CVS->Visible) { // CVS ?>
        <!-- CVS -->
        <td<?= $Page->CVS->cellAttributes() ?>>
<span<?= $Page->CVS->viewAttributes() ?>>
<?= $Page->CVS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PA->Visible) { // PA ?>
        <!-- PA -->
        <td<?= $Page->PA->cellAttributes() ?>>
<span<?= $Page->PA->viewAttributes() ?>>
<?= $Page->PA->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PS->Visible) { // PS ?>
        <!-- PS -->
        <td<?= $Page->PS->cellAttributes() ?>>
<span<?= $Page->PS->viewAttributes() ?>>
<?= $Page->PS->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PV->Visible) { // PV ?>
        <!-- PV -->
        <td<?= $Page->PV->cellAttributes() ?>>
<span<?= $Page->PV->viewAttributes() ?>>
<?= $Page->PV->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->clinicaldetails->Visible) { // clinicaldetails ?>
        <!-- clinicaldetails -->
        <td<?= $Page->clinicaldetails->cellAttributes() ?>>
<span<?= $Page->clinicaldetails->viewAttributes() ?>>
<?= $Page->clinicaldetails->getViewValue() ?></span>
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <!-- PatientId -->
        <td<?= $Page->PatientId->cellAttributes() ?>>
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
        <!-- Reception -->
        <td<?= $Page->Reception->cellAttributes() ?>>
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
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

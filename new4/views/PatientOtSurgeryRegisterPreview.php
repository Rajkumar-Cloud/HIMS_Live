<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOtSurgeryRegisterPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_ot_surgery_register"><!-- .card -->
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
<?php if ($Page->PatID->Visible) { // PatID ?>
    <?php if ($Page->SortUrl($Page->PatID) == "") { ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><?= $Page->PatID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <?php if ($Page->SortUrl($Page->mrnno) == "") { ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><?= $Page->mrnno->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->mrnno->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->mrnno->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->mrnno->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
    <?php if ($Page->SortUrl($Page->RecievedTime) == "") { ?>
        <th class="<?= $Page->RecievedTime->headerCellClass() ?>"><?= $Page->RecievedTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RecievedTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RecievedTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RecievedTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RecievedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RecievedTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
    <?php if ($Page->SortUrl($Page->AnaesthesiaStarted) == "") { ?>
        <th class="<?= $Page->AnaesthesiaStarted->headerCellClass() ?>"><?= $Page->AnaesthesiaStarted->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AnaesthesiaStarted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AnaesthesiaStarted->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AnaesthesiaStarted->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AnaesthesiaStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AnaesthesiaStarted->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
    <?php if ($Page->SortUrl($Page->AnaesthesiaEnded) == "") { ?>
        <th class="<?= $Page->AnaesthesiaEnded->headerCellClass() ?>"><?= $Page->AnaesthesiaEnded->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AnaesthesiaEnded->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AnaesthesiaEnded->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AnaesthesiaEnded->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AnaesthesiaEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AnaesthesiaEnded->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
    <?php if ($Page->SortUrl($Page->surgeryStarted) == "") { ?>
        <th class="<?= $Page->surgeryStarted->headerCellClass() ?>"><?= $Page->surgeryStarted->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->surgeryStarted->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->surgeryStarted->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->surgeryStarted->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->surgeryStarted->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->surgeryStarted->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
    <?php if ($Page->SortUrl($Page->surgeryEnded) == "") { ?>
        <th class="<?= $Page->surgeryEnded->headerCellClass() ?>"><?= $Page->surgeryEnded->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->surgeryEnded->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->surgeryEnded->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->surgeryEnded->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->surgeryEnded->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->surgeryEnded->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
    <?php if ($Page->SortUrl($Page->RecoveryTime) == "") { ?>
        <th class="<?= $Page->RecoveryTime->headerCellClass() ?>"><?= $Page->RecoveryTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RecoveryTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RecoveryTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RecoveryTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RecoveryTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RecoveryTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
    <?php if ($Page->SortUrl($Page->ShiftedTime) == "") { ?>
        <th class="<?= $Page->ShiftedTime->headerCellClass() ?>"><?= $Page->ShiftedTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ShiftedTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ShiftedTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ShiftedTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ShiftedTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ShiftedTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <?php if ($Page->SortUrl($Page->Surgeon) == "") { ?>
        <th class="<?= $Page->Surgeon->headerCellClass() ?>"><?= $Page->Surgeon->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Surgeon->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Surgeon->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Surgeon->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Surgeon->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Surgeon->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
    <?php if ($Page->SortUrl($Page->AsstSurgeon1) == "") { ?>
        <th class="<?= $Page->AsstSurgeon1->headerCellClass() ?>"><?= $Page->AsstSurgeon1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AsstSurgeon1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AsstSurgeon1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AsstSurgeon1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AsstSurgeon1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AsstSurgeon1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
    <?php if ($Page->SortUrl($Page->AsstSurgeon2) == "") { ?>
        <th class="<?= $Page->AsstSurgeon2->headerCellClass() ?>"><?= $Page->AsstSurgeon2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AsstSurgeon2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AsstSurgeon2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AsstSurgeon2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AsstSurgeon2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AsstSurgeon2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
    <?php if ($Page->SortUrl($Page->paediatric) == "") { ?>
        <th class="<?= $Page->paediatric->headerCellClass() ?>"><?= $Page->paediatric->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->paediatric->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->paediatric->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->paediatric->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->paediatric->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->paediatric->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
    <?php if ($Page->SortUrl($Page->ScrubNurse1) == "") { ?>
        <th class="<?= $Page->ScrubNurse1->headerCellClass() ?>"><?= $Page->ScrubNurse1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ScrubNurse1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ScrubNurse1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ScrubNurse1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ScrubNurse1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ScrubNurse1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
    <?php if ($Page->SortUrl($Page->ScrubNurse2) == "") { ?>
        <th class="<?= $Page->ScrubNurse2->headerCellClass() ?>"><?= $Page->ScrubNurse2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ScrubNurse2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ScrubNurse2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ScrubNurse2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ScrubNurse2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ScrubNurse2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
    <?php if ($Page->SortUrl($Page->FloorNurse) == "") { ?>
        <th class="<?= $Page->FloorNurse->headerCellClass() ?>"><?= $Page->FloorNurse->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->FloorNurse->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->FloorNurse->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->FloorNurse->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->FloorNurse->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->FloorNurse->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
    <?php if ($Page->SortUrl($Page->Technician) == "") { ?>
        <th class="<?= $Page->Technician->headerCellClass() ?>"><?= $Page->Technician->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Technician->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Technician->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Technician->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Technician->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Technician->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
    <?php if ($Page->SortUrl($Page->HouseKeeping) == "") { ?>
        <th class="<?= $Page->HouseKeeping->headerCellClass() ?>"><?= $Page->HouseKeeping->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->HouseKeeping->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->HouseKeeping->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->HouseKeeping->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->HouseKeeping->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->HouseKeeping->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
    <?php if ($Page->SortUrl($Page->countsCheckedMops) == "") { ?>
        <th class="<?= $Page->countsCheckedMops->headerCellClass() ?>"><?= $Page->countsCheckedMops->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->countsCheckedMops->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->countsCheckedMops->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->countsCheckedMops->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->countsCheckedMops->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->countsCheckedMops->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
    <?php if ($Page->SortUrl($Page->gauze) == "") { ?>
        <th class="<?= $Page->gauze->headerCellClass() ?>"><?= $Page->gauze->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->gauze->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->gauze->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->gauze->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->gauze->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->gauze->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
    <?php if ($Page->SortUrl($Page->needles) == "") { ?>
        <th class="<?= $Page->needles->headerCellClass() ?>"><?= $Page->needles->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->needles->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->needles->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->needles->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->needles->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->needles->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
    <?php if ($Page->SortUrl($Page->bloodloss) == "") { ?>
        <th class="<?= $Page->bloodloss->headerCellClass() ?>"><?= $Page->bloodloss->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->bloodloss->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->bloodloss->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->bloodloss->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->bloodloss->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->bloodloss->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
    <?php if ($Page->SortUrl($Page->bloodtransfusion) == "") { ?>
        <th class="<?= $Page->bloodtransfusion->headerCellClass() ?>"><?= $Page->bloodtransfusion->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->bloodtransfusion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->bloodtransfusion->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->bloodtransfusion->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->bloodtransfusion->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->bloodtransfusion->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php if ($Page->SortUrl($Page->PatientID) == "") { ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><?= $Page->PatientID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <?php if ($Page->SortUrl($Page->PId) == "") { ?>
        <th class="<?= $Page->PId->headerCellClass() ?>"><?= $Page->PId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatID->Visible) { // PatID ?>
        <!-- PatID -->
        <td<?= $Page->PatID->cellAttributes() ?>>
<span<?= $Page->PatID->viewAttributes() ?>>
<?= $Page->PatID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td<?= $Page->PatientName->cellAttributes() ?>>
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <!-- mrnno -->
        <td<?= $Page->mrnno->cellAttributes() ?>>
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <!-- MobileNumber -->
        <td<?= $Page->MobileNumber->cellAttributes() ?>>
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
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
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
        <!-- RecievedTime -->
        <td<?= $Page->RecievedTime->cellAttributes() ?>>
<span<?= $Page->RecievedTime->viewAttributes() ?>>
<?= $Page->RecievedTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <!-- AnaesthesiaStarted -->
        <td<?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<span<?= $Page->AnaesthesiaStarted->viewAttributes() ?>>
<?= $Page->AnaesthesiaStarted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <!-- AnaesthesiaEnded -->
        <td<?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<span<?= $Page->AnaesthesiaEnded->viewAttributes() ?>>
<?= $Page->AnaesthesiaEnded->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
        <!-- surgeryStarted -->
        <td<?= $Page->surgeryStarted->cellAttributes() ?>>
<span<?= $Page->surgeryStarted->viewAttributes() ?>>
<?= $Page->surgeryStarted->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
        <!-- surgeryEnded -->
        <td<?= $Page->surgeryEnded->cellAttributes() ?>>
<span<?= $Page->surgeryEnded->viewAttributes() ?>>
<?= $Page->surgeryEnded->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
        <!-- RecoveryTime -->
        <td<?= $Page->RecoveryTime->cellAttributes() ?>>
<span<?= $Page->RecoveryTime->viewAttributes() ?>>
<?= $Page->RecoveryTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
        <!-- ShiftedTime -->
        <td<?= $Page->ShiftedTime->cellAttributes() ?>>
<span<?= $Page->ShiftedTime->viewAttributes() ?>>
<?= $Page->ShiftedTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
        <!-- Duration -->
        <td<?= $Page->Duration->cellAttributes() ?>>
<span<?= $Page->Duration->viewAttributes() ?>>
<?= $Page->Duration->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
        <!-- Surgeon -->
        <td<?= $Page->Surgeon->cellAttributes() ?>>
<span<?= $Page->Surgeon->viewAttributes() ?>>
<?= $Page->Surgeon->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
        <!-- Anaesthetist -->
        <td<?= $Page->Anaesthetist->cellAttributes() ?>>
<span<?= $Page->Anaesthetist->viewAttributes() ?>>
<?= $Page->Anaesthetist->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <!-- AsstSurgeon1 -->
        <td<?= $Page->AsstSurgeon1->cellAttributes() ?>>
<span<?= $Page->AsstSurgeon1->viewAttributes() ?>>
<?= $Page->AsstSurgeon1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <!-- AsstSurgeon2 -->
        <td<?= $Page->AsstSurgeon2->cellAttributes() ?>>
<span<?= $Page->AsstSurgeon2->viewAttributes() ?>>
<?= $Page->AsstSurgeon2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
        <!-- paediatric -->
        <td<?= $Page->paediatric->cellAttributes() ?>>
<span<?= $Page->paediatric->viewAttributes() ?>>
<?= $Page->paediatric->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <!-- ScrubNurse1 -->
        <td<?= $Page->ScrubNurse1->cellAttributes() ?>>
<span<?= $Page->ScrubNurse1->viewAttributes() ?>>
<?= $Page->ScrubNurse1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <!-- ScrubNurse2 -->
        <td<?= $Page->ScrubNurse2->cellAttributes() ?>>
<span<?= $Page->ScrubNurse2->viewAttributes() ?>>
<?= $Page->ScrubNurse2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
        <!-- FloorNurse -->
        <td<?= $Page->FloorNurse->cellAttributes() ?>>
<span<?= $Page->FloorNurse->viewAttributes() ?>>
<?= $Page->FloorNurse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
        <!-- Technician -->
        <td<?= $Page->Technician->cellAttributes() ?>>
<span<?= $Page->Technician->viewAttributes() ?>>
<?= $Page->Technician->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
        <!-- HouseKeeping -->
        <td<?= $Page->HouseKeeping->cellAttributes() ?>>
<span<?= $Page->HouseKeeping->viewAttributes() ?>>
<?= $Page->HouseKeeping->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <!-- countsCheckedMops -->
        <td<?= $Page->countsCheckedMops->cellAttributes() ?>>
<span<?= $Page->countsCheckedMops->viewAttributes() ?>>
<?= $Page->countsCheckedMops->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
        <!-- gauze -->
        <td<?= $Page->gauze->cellAttributes() ?>>
<span<?= $Page->gauze->viewAttributes() ?>>
<?= $Page->gauze->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
        <!-- needles -->
        <td<?= $Page->needles->cellAttributes() ?>>
<span<?= $Page->needles->viewAttributes() ?>>
<?= $Page->needles->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
        <!-- bloodloss -->
        <td<?= $Page->bloodloss->cellAttributes() ?>>
<span<?= $Page->bloodloss->viewAttributes() ?>>
<?= $Page->bloodloss->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <!-- bloodtransfusion -->
        <td<?= $Page->bloodtransfusion->cellAttributes() ?>>
<span<?= $Page->bloodtransfusion->viewAttributes() ?>>
<?= $Page->bloodtransfusion->getViewValue() ?></span>
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
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <!-- PatientID -->
        <td<?= $Page->PatientID->cellAttributes() ?>>
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
        <!-- PId -->
        <td<?= $Page->PId->cellAttributes() ?>>
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
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

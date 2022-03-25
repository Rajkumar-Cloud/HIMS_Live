<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOtDeliveryRegisterPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_ot_delivery_register"><!-- .card -->
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
<?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
    <?php if ($Page->SortUrl($Page->ObstetricsHistryFeMale) == "") { ?>
        <th class="<?= $Page->ObstetricsHistryFeMale->headerCellClass() ?>"><?= $Page->ObstetricsHistryFeMale->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ObstetricsHistryFeMale->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ObstetricsHistryFeMale->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ObstetricsHistryFeMale->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ObstetricsHistryFeMale->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ObstetricsHistryFeMale->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Abortion->Visible) { // Abortion ?>
    <?php if ($Page->SortUrl($Page->Abortion) == "") { ?>
        <th class="<?= $Page->Abortion->headerCellClass() ?>"><?= $Page->Abortion->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Abortion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Abortion->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Abortion->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Abortion->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Abortion->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
    <?php if ($Page->SortUrl($Page->ChildBirthDate) == "") { ?>
        <th class="<?= $Page->ChildBirthDate->headerCellClass() ?>"><?= $Page->ChildBirthDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildBirthDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildBirthDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildBirthDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildBirthDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildBirthDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
    <?php if ($Page->SortUrl($Page->ChildBirthTime) == "") { ?>
        <th class="<?= $Page->ChildBirthTime->headerCellClass() ?>"><?= $Page->ChildBirthTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildBirthTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildBirthTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildBirthTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildBirthTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildBirthTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildSex->Visible) { // ChildSex ?>
    <?php if ($Page->SortUrl($Page->ChildSex) == "") { ?>
        <th class="<?= $Page->ChildSex->headerCellClass() ?>"><?= $Page->ChildSex->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildSex->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildSex->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildSex->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildSex->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildSex->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildWt->Visible) { // ChildWt ?>
    <?php if ($Page->SortUrl($Page->ChildWt) == "") { ?>
        <th class="<?= $Page->ChildWt->headerCellClass() ?>"><?= $Page->ChildWt->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildWt->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildWt->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildWt->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildWt->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildWt->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildDay->Visible) { // ChildDay ?>
    <?php if ($Page->SortUrl($Page->ChildDay) == "") { ?>
        <th class="<?= $Page->ChildDay->headerCellClass() ?>"><?= $Page->ChildDay->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildDay->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildDay->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildDay->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildDay->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildDay->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildOE->Visible) { // ChildOE ?>
    <?php if ($Page->SortUrl($Page->ChildOE) == "") { ?>
        <th class="<?= $Page->ChildOE->headerCellClass() ?>"><?= $Page->ChildOE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildOE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildOE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildOE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildOE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildOE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
    <?php if ($Page->SortUrl($Page->ChildBlGrp) == "") { ?>
        <th class="<?= $Page->ChildBlGrp->headerCellClass() ?>"><?= $Page->ChildBlGrp->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildBlGrp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildBlGrp->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildBlGrp->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildBlGrp->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildBlGrp->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
    <?php if ($Page->SortUrl($Page->ApgarScore) == "") { ?>
        <th class="<?= $Page->ApgarScore->headerCellClass() ?>"><?= $Page->ApgarScore->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ApgarScore->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ApgarScore->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ApgarScore->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ApgarScore->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ApgarScore->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->birthnotification->Visible) { // birthnotification ?>
    <?php if ($Page->SortUrl($Page->birthnotification) == "") { ?>
        <th class="<?= $Page->birthnotification->headerCellClass() ?>"><?= $Page->birthnotification->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->birthnotification->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->birthnotification->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->birthnotification->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->birthnotification->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->birthnotification->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->formno->Visible) { // formno ?>
    <?php if ($Page->SortUrl($Page->formno) == "") { ?>
        <th class="<?= $Page->formno->headerCellClass() ?>"><?= $Page->formno->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->formno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->formno->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->formno->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->formno->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->formno->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
    <?php if ($Page->SortUrl($Page->dte) == "") { ?>
        <th class="<?= $Page->dte->headerCellClass() ?>"><?= $Page->dte->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->dte->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->dte->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->dte->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->dte->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->dte->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->motherReligion->Visible) { // motherReligion ?>
    <?php if ($Page->SortUrl($Page->motherReligion) == "") { ?>
        <th class="<?= $Page->motherReligion->headerCellClass() ?>"><?= $Page->motherReligion->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->motherReligion->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->motherReligion->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->motherReligion->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->motherReligion->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->motherReligion->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
    <?php if ($Page->SortUrl($Page->bloodgroup) == "") { ?>
        <th class="<?= $Page->bloodgroup->headerCellClass() ?>"><?= $Page->bloodgroup->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->bloodgroup->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->bloodgroup->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->bloodgroup->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->bloodgroup->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->bloodgroup->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php if ($Page->SortUrl($Page->PatientID) == "") { ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><?= $Page->PatientID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
    <?php if ($Page->SortUrl($Page->ChildBirthDate1) == "") { ?>
        <th class="<?= $Page->ChildBirthDate1->headerCellClass() ?>"><?= $Page->ChildBirthDate1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildBirthDate1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildBirthDate1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildBirthDate1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildBirthDate1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildBirthDate1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
    <?php if ($Page->SortUrl($Page->ChildBirthTime1) == "") { ?>
        <th class="<?= $Page->ChildBirthTime1->headerCellClass() ?>"><?= $Page->ChildBirthTime1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildBirthTime1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildBirthTime1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildBirthTime1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildBirthTime1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildBirthTime1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
    <?php if ($Page->SortUrl($Page->ChildSex1) == "") { ?>
        <th class="<?= $Page->ChildSex1->headerCellClass() ?>"><?= $Page->ChildSex1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildSex1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildSex1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildSex1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildSex1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildSex1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
    <?php if ($Page->SortUrl($Page->ChildWt1) == "") { ?>
        <th class="<?= $Page->ChildWt1->headerCellClass() ?>"><?= $Page->ChildWt1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildWt1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildWt1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildWt1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildWt1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildWt1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
    <?php if ($Page->SortUrl($Page->ChildDay1) == "") { ?>
        <th class="<?= $Page->ChildDay1->headerCellClass() ?>"><?= $Page->ChildDay1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildDay1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildDay1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildDay1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildDay1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildDay1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
    <?php if ($Page->SortUrl($Page->ChildOE1) == "") { ?>
        <th class="<?= $Page->ChildOE1->headerCellClass() ?>"><?= $Page->ChildOE1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildOE1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildOE1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildOE1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildOE1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildOE1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
    <?php if ($Page->SortUrl($Page->ChildBlGrp1) == "") { ?>
        <th class="<?= $Page->ChildBlGrp1->headerCellClass() ?>"><?= $Page->ChildBlGrp1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ChildBlGrp1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ChildBlGrp1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ChildBlGrp1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ChildBlGrp1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ChildBlGrp1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
    <?php if ($Page->SortUrl($Page->ApgarScore1) == "") { ?>
        <th class="<?= $Page->ApgarScore1->headerCellClass() ?>"><?= $Page->ApgarScore1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ApgarScore1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ApgarScore1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ApgarScore1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ApgarScore1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ApgarScore1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
    <?php if ($Page->SortUrl($Page->birthnotification1) == "") { ?>
        <th class="<?= $Page->birthnotification1->headerCellClass() ?>"><?= $Page->birthnotification1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->birthnotification1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->birthnotification1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->birthnotification1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->birthnotification1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->birthnotification1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->formno1->Visible) { // formno1 ?>
    <?php if ($Page->SortUrl($Page->formno1) == "") { ?>
        <th class="<?= $Page->formno1->headerCellClass() ?>"><?= $Page->formno1->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->formno1->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->formno1->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->formno1->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->formno1->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->formno1->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Reception->Visible) { // Reception ?>
    <?php if ($Page->SortUrl($Page->Reception) == "") { ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><?= $Page->Reception->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Reception->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Reception->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Reception->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
        <!-- ObstetricsHistryFeMale -->
        <td<?= $Page->ObstetricsHistryFeMale->cellAttributes() ?>>
<span<?= $Page->ObstetricsHistryFeMale->viewAttributes() ?>>
<?= $Page->ObstetricsHistryFeMale->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Abortion->Visible) { // Abortion ?>
        <!-- Abortion -->
        <td<?= $Page->Abortion->cellAttributes() ?>>
<span<?= $Page->Abortion->viewAttributes() ?>>
<?= $Page->Abortion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
        <!-- ChildBirthDate -->
        <td<?= $Page->ChildBirthDate->cellAttributes() ?>>
<span<?= $Page->ChildBirthDate->viewAttributes() ?>>
<?= $Page->ChildBirthDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
        <!-- ChildBirthTime -->
        <td<?= $Page->ChildBirthTime->cellAttributes() ?>>
<span<?= $Page->ChildBirthTime->viewAttributes() ?>>
<?= $Page->ChildBirthTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildSex->Visible) { // ChildSex ?>
        <!-- ChildSex -->
        <td<?= $Page->ChildSex->cellAttributes() ?>>
<span<?= $Page->ChildSex->viewAttributes() ?>>
<?= $Page->ChildSex->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildWt->Visible) { // ChildWt ?>
        <!-- ChildWt -->
        <td<?= $Page->ChildWt->cellAttributes() ?>>
<span<?= $Page->ChildWt->viewAttributes() ?>>
<?= $Page->ChildWt->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildDay->Visible) { // ChildDay ?>
        <!-- ChildDay -->
        <td<?= $Page->ChildDay->cellAttributes() ?>>
<span<?= $Page->ChildDay->viewAttributes() ?>>
<?= $Page->ChildDay->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildOE->Visible) { // ChildOE ?>
        <!-- ChildOE -->
        <td<?= $Page->ChildOE->cellAttributes() ?>>
<span<?= $Page->ChildOE->viewAttributes() ?>>
<?= $Page->ChildOE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
        <!-- ChildBlGrp -->
        <td<?= $Page->ChildBlGrp->cellAttributes() ?>>
<span<?= $Page->ChildBlGrp->viewAttributes() ?>>
<?= $Page->ChildBlGrp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
        <!-- ApgarScore -->
        <td<?= $Page->ApgarScore->cellAttributes() ?>>
<span<?= $Page->ApgarScore->viewAttributes() ?>>
<?= $Page->ApgarScore->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->birthnotification->Visible) { // birthnotification ?>
        <!-- birthnotification -->
        <td<?= $Page->birthnotification->cellAttributes() ?>>
<span<?= $Page->birthnotification->viewAttributes() ?>>
<?= $Page->birthnotification->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->formno->Visible) { // formno ?>
        <!-- formno -->
        <td<?= $Page->formno->cellAttributes() ?>>
<span<?= $Page->formno->viewAttributes() ?>>
<?= $Page->formno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
        <!-- dte -->
        <td<?= $Page->dte->cellAttributes() ?>>
<span<?= $Page->dte->viewAttributes() ?>>
<?= $Page->dte->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->motherReligion->Visible) { // motherReligion ?>
        <!-- motherReligion -->
        <td<?= $Page->motherReligion->cellAttributes() ?>>
<span<?= $Page->motherReligion->viewAttributes() ?>>
<?= $Page->motherReligion->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
        <!-- bloodgroup -->
        <td<?= $Page->bloodgroup->cellAttributes() ?>>
<span<?= $Page->bloodgroup->viewAttributes() ?>>
<?= $Page->bloodgroup->getViewValue() ?></span>
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
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <!-- PatientID -->
        <td<?= $Page->PatientID->cellAttributes() ?>>
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
        <!-- ChildBirthDate1 -->
        <td<?= $Page->ChildBirthDate1->cellAttributes() ?>>
<span<?= $Page->ChildBirthDate1->viewAttributes() ?>>
<?= $Page->ChildBirthDate1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
        <!-- ChildBirthTime1 -->
        <td<?= $Page->ChildBirthTime1->cellAttributes() ?>>
<span<?= $Page->ChildBirthTime1->viewAttributes() ?>>
<?= $Page->ChildBirthTime1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
        <!-- ChildSex1 -->
        <td<?= $Page->ChildSex1->cellAttributes() ?>>
<span<?= $Page->ChildSex1->viewAttributes() ?>>
<?= $Page->ChildSex1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
        <!-- ChildWt1 -->
        <td<?= $Page->ChildWt1->cellAttributes() ?>>
<span<?= $Page->ChildWt1->viewAttributes() ?>>
<?= $Page->ChildWt1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
        <!-- ChildDay1 -->
        <td<?= $Page->ChildDay1->cellAttributes() ?>>
<span<?= $Page->ChildDay1->viewAttributes() ?>>
<?= $Page->ChildDay1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
        <!-- ChildOE1 -->
        <td<?= $Page->ChildOE1->cellAttributes() ?>>
<span<?= $Page->ChildOE1->viewAttributes() ?>>
<?= $Page->ChildOE1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
        <!-- ChildBlGrp1 -->
        <td<?= $Page->ChildBlGrp1->cellAttributes() ?>>
<span<?= $Page->ChildBlGrp1->viewAttributes() ?>>
<?= $Page->ChildBlGrp1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
        <!-- ApgarScore1 -->
        <td<?= $Page->ApgarScore1->cellAttributes() ?>>
<span<?= $Page->ApgarScore1->viewAttributes() ?>>
<?= $Page->ApgarScore1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
        <!-- birthnotification1 -->
        <td<?= $Page->birthnotification1->cellAttributes() ?>>
<span<?= $Page->birthnotification1->viewAttributes() ?>>
<?= $Page->birthnotification1->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->formno1->Visible) { // formno1 ?>
        <!-- formno1 -->
        <td<?= $Page->formno1->cellAttributes() ?>>
<span<?= $Page->formno1->viewAttributes() ?>>
<?= $Page->formno1->getViewValue() ?></span>
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
<?php if ($Page->Reception->Visible) { // Reception ?>
        <!-- Reception -->
        <td<?= $Page->Reception->cellAttributes() ?>>
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
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

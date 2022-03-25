<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientPrescriptionPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_prescription"><!-- .card -->
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
<?php if ($Page->Reception->Visible) { // Reception ?>
    <?php if ($Page->SortUrl($Page->Reception) == "") { ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><?= $Page->Reception->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Reception->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Reception->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Reception->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Reception->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Reception->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php if ($Page->SortUrl($Page->PatientName) == "") { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><?= $Page->PatientName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
    <?php if ($Page->SortUrl($Page->Medicine) == "") { ?>
        <th class="<?= $Page->Medicine->headerCellClass() ?>"><?= $Page->Medicine->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Medicine->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Medicine->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Medicine->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Medicine->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Medicine->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->A->Visible) { // A ?>
    <?php if ($Page->SortUrl($Page->A) == "") { ?>
        <th class="<?= $Page->A->headerCellClass() ?>"><?= $Page->A->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->A->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->A->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->A->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->A->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->A->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
    <?php if ($Page->SortUrl($Page->N) == "") { ?>
        <th class="<?= $Page->N->headerCellClass() ?>"><?= $Page->N->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->N->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->N->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->N->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->N->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->N->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
    <?php if ($Page->SortUrl($Page->NoOfDays) == "") { ?>
        <th class="<?= $Page->NoOfDays->headerCellClass() ?>"><?= $Page->NoOfDays->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NoOfDays->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NoOfDays->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NoOfDays->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NoOfDays->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NoOfDays->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
    <?php if ($Page->SortUrl($Page->PreRoute) == "") { ?>
        <th class="<?= $Page->PreRoute->headerCellClass() ?>"><?= $Page->PreRoute->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PreRoute->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PreRoute->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PreRoute->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PreRoute->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PreRoute->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
    <?php if ($Page->SortUrl($Page->TimeOfTaking) == "") { ?>
        <th class="<?= $Page->TimeOfTaking->headerCellClass() ?>"><?= $Page->TimeOfTaking->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TimeOfTaking->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TimeOfTaking->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TimeOfTaking->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TimeOfTaking->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TimeOfTaking->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <?php if ($Page->SortUrl($Page->mrnno) == "") { ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><?= $Page->mrnno->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->mrnno->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->mrnno->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->mrnno->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <?php if ($Page->SortUrl($Page->profilePic) == "") { ?>
        <th class="<?= $Page->profilePic->headerCellClass() ?>"><?= $Page->profilePic->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->profilePic->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->profilePic->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->profilePic->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->profilePic->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->profilePic->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
    <?php if ($Page->SortUrl($Page->Status) == "") { ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><?= $Page->Status->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Status->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Status->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Status->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Status->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <?php if ($Page->SortUrl($Page->CreatedBy) == "") { ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><?= $Page->CreatedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CreatedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CreatedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CreatedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CreatedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CreatedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
    <?php if ($Page->SortUrl($Page->CreateDateTime) == "") { ?>
        <th class="<?= $Page->CreateDateTime->headerCellClass() ?>"><?= $Page->CreateDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CreateDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CreateDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CreateDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CreateDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CreateDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <?php if ($Page->SortUrl($Page->ModifiedBy) == "") { ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><?= $Page->ModifiedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ModifiedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ModifiedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ModifiedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ModifiedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ModifiedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <?php if ($Page->SortUrl($Page->ModifiedDateTime) == "") { ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><?= $Page->ModifiedDateTime->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ModifiedDateTime->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ModifiedDateTime->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ModifiedDateTime->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ModifiedDateTime->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ModifiedDateTime->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Reception->Visible) { // Reception ?>
        <!-- Reception -->
        <td<?= $Page->Reception->cellAttributes() ?>>
<span<?= $Page->Reception->viewAttributes() ?>>
<?= $Page->Reception->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <!-- PatientId -->
        <td<?= $Page->PatientId->cellAttributes() ?>>
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td<?= $Page->PatientName->cellAttributes() ?>>
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Medicine->Visible) { // Medicine ?>
        <!-- Medicine -->
        <td<?= $Page->Medicine->cellAttributes() ?>>
<span<?= $Page->Medicine->viewAttributes() ?>>
<?= $Page->Medicine->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
        <!-- M -->
        <td<?= $Page->M->cellAttributes() ?>>
<span<?= $Page->M->viewAttributes() ?>>
<?= $Page->M->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
        <!-- A -->
        <td<?= $Page->A->cellAttributes() ?>>
<span<?= $Page->A->viewAttributes() ?>>
<?= $Page->A->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->N->Visible) { // N ?>
        <!-- N -->
        <td<?= $Page->N->cellAttributes() ?>>
<span<?= $Page->N->viewAttributes() ?>>
<?= $Page->N->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NoOfDays->Visible) { // NoOfDays ?>
        <!-- NoOfDays -->
        <td<?= $Page->NoOfDays->cellAttributes() ?>>
<span<?= $Page->NoOfDays->viewAttributes() ?>>
<?= $Page->NoOfDays->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PreRoute->Visible) { // PreRoute ?>
        <!-- PreRoute -->
        <td<?= $Page->PreRoute->cellAttributes() ?>>
<span<?= $Page->PreRoute->viewAttributes() ?>>
<?= $Page->PreRoute->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TimeOfTaking->Visible) { // TimeOfTaking ?>
        <!-- TimeOfTaking -->
        <td<?= $Page->TimeOfTaking->cellAttributes() ?>>
<span<?= $Page->TimeOfTaking->viewAttributes() ?>>
<?= $Page->TimeOfTaking->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
        <!-- Type -->
        <td<?= $Page->Type->cellAttributes() ?>>
<span<?= $Page->Type->viewAttributes() ?>>
<?= $Page->Type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <!-- mrnno -->
        <td<?= $Page->mrnno->cellAttributes() ?>>
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
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
<?php if ($Page->profilePic->Visible) { // profilePic ?>
        <!-- profilePic -->
        <td<?= $Page->profilePic->cellAttributes() ?>>
<span<?= $Page->profilePic->viewAttributes() ?>>
<?= $Page->profilePic->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <!-- Status -->
        <td<?= $Page->Status->cellAttributes() ?>>
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <!-- CreatedBy -->
        <td<?= $Page->CreatedBy->cellAttributes() ?>>
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CreateDateTime->Visible) { // CreateDateTime ?>
        <!-- CreateDateTime -->
        <td<?= $Page->CreateDateTime->cellAttributes() ?>>
<span<?= $Page->CreateDateTime->viewAttributes() ?>>
<?= $Page->CreateDateTime->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <!-- ModifiedBy -->
        <td<?= $Page->ModifiedBy->cellAttributes() ?>>
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
        <!-- ModifiedDateTime -->
        <td<?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span<?= $Page->ModifiedDateTime->viewAttributes() ?>>
<?= $Page->ModifiedDateTime->getViewValue() ?></span>
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

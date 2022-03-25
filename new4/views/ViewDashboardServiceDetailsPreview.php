<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardServiceDetailsPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_service_details"><!-- .card -->
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
<?php if ($Page->Services->Visible) { // Services ?>
    <?php if ($Page->SortUrl($Page->Services) == "") { ?>
        <th class="<?= $Page->Services->headerCellClass() ?>"><?= $Page->Services->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Services->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Services->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Services->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Services->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Services->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
    <?php if ($Page->SortUrl($Page->amount) == "") { ?>
        <th class="<?= $Page->amount->headerCellClass() ?>"><?= $Page->amount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->amount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->amount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->amount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
    <?php if ($Page->SortUrl($Page->SubTotal) == "") { ?>
        <th class="<?= $Page->SubTotal->headerCellClass() ?>"><?= $Page->SubTotal->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SubTotal->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SubTotal->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SubTotal->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SubTotal->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SubTotal->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->createdDate->Visible) { // createdDate ?>
    <?php if ($Page->SortUrl($Page->createdDate) == "") { ?>
        <th class="<?= $Page->createdDate->headerCellClass() ?>"><?= $Page->createdDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createdDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createdDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createdDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <?php if ($Page->SortUrl($Page->DrName) == "") { ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><?= $Page->DrName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DrName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DrName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DrName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DrName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DrName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DRDepartment->Visible) { // DRDepartment ?>
    <?php if ($Page->SortUrl($Page->DRDepartment) == "") { ?>
        <th class="<?= $Page->DRDepartment->headerCellClass() ?>"><?= $Page->DRDepartment->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DRDepartment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DRDepartment->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DRDepartment->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DRDepartment->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DRDepartment->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
    <?php if ($Page->SortUrl($Page->ItemCode) == "") { ?>
        <th class="<?= $Page->ItemCode->headerCellClass() ?>"><?= $Page->ItemCode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ItemCode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ItemCode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ItemCode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ItemCode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ItemCode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
    <?php if ($Page->SortUrl($Page->DEptCd) == "") { ?>
        <th class="<?= $Page->DEptCd->headerCellClass() ?>"><?= $Page->DEptCd->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DEptCd->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DEptCd->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DEptCd->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DEptCd->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DEptCd->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <?php if ($Page->SortUrl($Page->CODE) == "") { ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><?= $Page->CODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
    <?php if ($Page->SortUrl($Page->SERVICE) == "") { ?>
        <th class="<?= $Page->SERVICE->headerCellClass() ?>"><?= $Page->SERVICE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SERVICE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SERVICE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SERVICE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SERVICE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SERVICE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
    <?php if ($Page->SortUrl($Page->SERVICE_TYPE) == "") { ?>
        <th class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><?= $Page->SERVICE_TYPE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SERVICE_TYPE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SERVICE_TYPE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SERVICE_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SERVICE_TYPE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <?php if ($Page->SortUrl($Page->DEPARTMENT) == "") { ?>
        <th class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><?= $Page->DEPARTMENT->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->DEPARTMENT->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->DEPARTMENT->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->DEPARTMENT->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->DEPARTMENT->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->vid->Visible) { // vid ?>
    <?php if ($Page->SortUrl($Page->vid) == "") { ?>
        <th class="<?= $Page->vid->headerCellClass() ?>"><?= $Page->vid->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->vid->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->vid->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->vid->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->vid->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->vid->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
    $Page->aggregateListRowValues(); // Aggregate row values

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
<?php if ($Page->Services->Visible) { // Services ?>
        <!-- Services -->
        <td<?= $Page->Services->cellAttributes() ?>>
<span<?= $Page->Services->viewAttributes() ?>>
<?= $Page->Services->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <!-- amount -->
        <td<?= $Page->amount->cellAttributes() ?>>
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <!-- SubTotal -->
        <td<?= $Page->SubTotal->cellAttributes() ?>>
<span<?= $Page->SubTotal->viewAttributes() ?>>
<?= $Page->SubTotal->getViewValue() ?></span>
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
<?php if ($Page->createdDate->Visible) { // createdDate ?>
        <!-- createdDate -->
        <td<?= $Page->createdDate->cellAttributes() ?>>
<span<?= $Page->createdDate->viewAttributes() ?>>
<?= $Page->createdDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <!-- DrName -->
        <td<?= $Page->DrName->cellAttributes() ?>>
<span<?= $Page->DrName->viewAttributes() ?>>
<?= $Page->DrName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DRDepartment->Visible) { // DRDepartment ?>
        <!-- DRDepartment -->
        <td<?= $Page->DRDepartment->cellAttributes() ?>>
<span<?= $Page->DRDepartment->viewAttributes() ?>>
<?= $Page->DRDepartment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <!-- ItemCode -->
        <td<?= $Page->ItemCode->cellAttributes() ?>>
<span<?= $Page->ItemCode->viewAttributes() ?>>
<?= $Page->ItemCode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <!-- DEptCd -->
        <td<?= $Page->DEptCd->cellAttributes() ?>>
<span<?= $Page->DEptCd->viewAttributes() ?>>
<?= $Page->DEptCd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <!-- CODE -->
        <td<?= $Page->CODE->cellAttributes() ?>>
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <!-- SERVICE -->
        <td<?= $Page->SERVICE->cellAttributes() ?>>
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <!-- SERVICE_TYPE -->
        <td<?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <!-- DEPARTMENT -->
        <td<?= $Page->DEPARTMENT->cellAttributes() ?>>
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->vid->Visible) { // vid ?>
        <!-- vid -->
        <td<?= $Page->vid->cellAttributes() ?>>
<span<?= $Page->vid->viewAttributes() ?>>
<?= $Page->vid->getViewValue() ?></span>
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
<?php
    // Render aggregate row
    $Page->RowType = ROWTYPE_AGGREGATE; // Aggregate
    $Page->aggregateListRow(); // Prepare aggregate row

    // Render list options
    $Page->renderListOptions();
?>
    <tfoot><!-- Table footer -->
    <tr class="ew-table-footer">
<?php
// Render list options (footer, left)
$Page->ListOptions->render("footer", "left");
?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <!-- PatientId -->
        <td class="<?= $Page->PatientId->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td class="<?= $Page->PatientName->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Services->Visible) { // Services ?>
        <!-- Services -->
        <td class="<?= $Page->Services->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("COUNT") ?></span><span class="ew-aggregate-value">
        <?= $Page->Services->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <!-- amount -->
        <td class="<?= $Page->amount->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->amount->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->SubTotal->Visible) { // SubTotal ?>
        <!-- SubTotal -->
        <td class="<?= $Page->SubTotal->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->SubTotal->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <!-- createdby -->
        <td class="<?= $Page->createdby->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <!-- createddatetime -->
        <td class="<?= $Page->createddatetime->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
        <!-- createdDate -->
        <td class="<?= $Page->createdDate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
        <!-- DrName -->
        <td class="<?= $Page->DrName->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DRDepartment->Visible) { // DRDepartment ?>
        <!-- DRDepartment -->
        <td class="<?= $Page->DRDepartment->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ItemCode->Visible) { // ItemCode ?>
        <!-- ItemCode -->
        <td class="<?= $Page->ItemCode->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DEptCd->Visible) { // DEptCd ?>
        <!-- DEptCd -->
        <td class="<?= $Page->DEptCd->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <!-- CODE -->
        <td class="<?= $Page->CODE->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <!-- SERVICE -->
        <td class="<?= $Page->SERVICE->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <!-- SERVICE_TYPE -->
        <td class="<?= $Page->SERVICE_TYPE->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <!-- DEPARTMENT -->
        <td class="<?= $Page->DEPARTMENT->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td class="<?= $Page->HospID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->vid->Visible) { // vid ?>
        <!-- vid -->
        <td class="<?= $Page->vid->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php
// Render list options (footer, right)
$Page->ListOptions->render("footer", "right");
?>
    </tr>
    </tfoot>
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

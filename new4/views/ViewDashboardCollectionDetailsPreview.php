<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardCollectionDetailsPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_collection_details"><!-- .card -->
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
<?php if ($Page->createddate->Visible) { // createddate ?>
    <?php if ($Page->SortUrl($Page->createddate) == "") { ?>
        <th class="<?= $Page->createddate->headerCellClass() ?>"><?= $Page->createddate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createddate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createddate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createddate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createddate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createddate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
    <?php if ($Page->SortUrl($Page->_UserName) == "") { ?>
        <th class="<?= $Page->_UserName->headerCellClass() ?>"><?= $Page->_UserName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->_UserName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->_UserName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->_UserName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->_UserName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->_UserName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
    <?php if ($Page->SortUrl($Page->BillNumber) == "") { ?>
        <th class="<?= $Page->BillNumber->headerCellClass() ?>"><?= $Page->BillNumber->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BillNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BillNumber->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BillNumber->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BillNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BillNumber->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php if ($Page->SortUrl($Page->PatientName) == "") { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><?= $Page->PatientName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
    <?php if ($Page->SortUrl($Page->Mobile) == "") { ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><?= $Page->Mobile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Mobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Mobile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Mobile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Mobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Mobile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
    <?php if ($Page->SortUrl($Page->voucher_type) == "") { ?>
        <th class="<?= $Page->voucher_type->headerCellClass() ?>"><?= $Page->voucher_type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->voucher_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->voucher_type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->voucher_type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->voucher_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->voucher_type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <?php if ($Page->SortUrl($Page->Details) == "") { ?>
        <th class="<?= $Page->Details->headerCellClass() ?>"><?= $Page->Details->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Details->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Details->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Details->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Details->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Details->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
    <?php if ($Page->SortUrl($Page->ModeofPayment) == "") { ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><?= $Page->ModeofPayment->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ModeofPayment->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ModeofPayment->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ModeofPayment->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ModeofPayment->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ModeofPayment->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <?php if ($Page->SortUrl($Page->Amount) == "") { ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><?= $Page->Amount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Amount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Amount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Amount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Amount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Amount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
    <?php if ($Page->SortUrl($Page->AnyDues) == "") { ?>
        <th class="<?= $Page->AnyDues->headerCellClass() ?>"><?= $Page->AnyDues->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AnyDues->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AnyDues->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AnyDues->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AnyDues->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AnyDues->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->BillType->Visible) { // BillType ?>
    <?php if ($Page->SortUrl($Page->BillType) == "") { ?>
        <th class="<?= $Page->BillType->headerCellClass() ?>"><?= $Page->BillType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BillType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BillType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BillType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BillType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BillType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td<?= $Page->id->cellAttributes() ?>>
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createddate->Visible) { // createddate ?>
        <!-- createddate -->
        <td<?= $Page->createddate->cellAttributes() ?>>
<span<?= $Page->createddate->viewAttributes() ?>>
<?= $Page->createddate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <!-- UserName -->
        <td<?= $Page->_UserName->cellAttributes() ?>>
<span<?= $Page->_UserName->viewAttributes() ?>>
<?= $Page->_UserName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <!-- BillNumber -->
        <td<?= $Page->BillNumber->cellAttributes() ?>>
<span<?= $Page->BillNumber->viewAttributes() ?>>
<?= $Page->BillNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <!-- PatientID -->
        <td<?= $Page->PatientID->cellAttributes() ?>>
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td<?= $Page->PatientName->cellAttributes() ?>>
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <!-- Mobile -->
        <td<?= $Page->Mobile->cellAttributes() ?>>
<span<?= $Page->Mobile->viewAttributes() ?>>
<?= $Page->Mobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <!-- voucher_type -->
        <td<?= $Page->voucher_type->cellAttributes() ?>>
<span<?= $Page->voucher_type->viewAttributes() ?>>
<?= $Page->voucher_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <!-- Details -->
        <td<?= $Page->Details->cellAttributes() ?>>
<span<?= $Page->Details->viewAttributes() ?>>
<?= $Page->Details->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <!-- ModeofPayment -->
        <td<?= $Page->ModeofPayment->cellAttributes() ?>>
<span<?= $Page->ModeofPayment->viewAttributes() ?>>
<?= $Page->ModeofPayment->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <!-- Amount -->
        <td<?= $Page->Amount->cellAttributes() ?>>
<span<?= $Page->Amount->viewAttributes() ?>>
<?= $Page->Amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <!-- AnyDues -->
        <td<?= $Page->AnyDues->cellAttributes() ?>>
<span<?= $Page->AnyDues->viewAttributes() ?>>
<?= $Page->AnyDues->getViewValue() ?></span>
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
<?php if ($Page->BillType->Visible) { // BillType ?>
        <!-- BillType -->
        <td<?= $Page->BillType->cellAttributes() ?>>
<span<?= $Page->BillType->viewAttributes() ?>>
<?= $Page->BillType->getViewValue() ?></span>
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
<?php if ($Page->id->Visible) { // id ?>
        <!-- id -->
        <td class="<?= $Page->id->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->createddate->Visible) { // createddate ?>
        <!-- createddate -->
        <td class="<?= $Page->createddate->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->_UserName->Visible) { // UserName ?>
        <!-- UserName -->
        <td class="<?= $Page->_UserName->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BillNumber->Visible) { // BillNumber ?>
        <!-- BillNumber -->
        <td class="<?= $Page->BillNumber->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <!-- PatientID -->
        <td class="<?= $Page->PatientID->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <!-- PatientName -->
        <td class="<?= $Page->PatientName->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Mobile->Visible) { // Mobile ?>
        <!-- Mobile -->
        <td class="<?= $Page->Mobile->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->voucher_type->Visible) { // voucher_type ?>
        <!-- voucher_type -->
        <td class="<?= $Page->voucher_type->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
        <!-- Details -->
        <td class="<?= $Page->Details->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->ModeofPayment->Visible) { // ModeofPayment ?>
        <!-- ModeofPayment -->
        <td class="<?= $Page->ModeofPayment->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
        <!-- Amount -->
        <td class="<?= $Page->Amount->footerCellClass() ?>">
        <span class="ew-aggregate"><?= $Language->phrase("TOTAL") ?></span><span class="ew-aggregate-value">
        <?= $Page->Amount->ViewValue ?></span>
        </td>
<?php } ?>
<?php if ($Page->AnyDues->Visible) { // AnyDues ?>
        <!-- AnyDues -->
        <td class="<?= $Page->AnyDues->footerCellClass() ?>">
        &nbsp;
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
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <!-- modifiedby -->
        <td class="<?= $Page->modifiedby->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <!-- modifieddatetime -->
        <td class="<?= $Page->modifieddatetime->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->BillType->Visible) { // BillType ?>
        <!-- BillType -->
        <td class="<?= $Page->BillType->footerCellClass() ?>">
        &nbsp;
        </td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td class="<?= $Page->HospID->footerCellClass() ?>">
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

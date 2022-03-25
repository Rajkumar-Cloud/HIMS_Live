<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientInsurancePreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_insurance"><!-- .card -->
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
<?php if ($Page->Company->Visible) { // Company ?>
    <?php if ($Page->SortUrl($Page->Company) == "") { ?>
        <th class="<?= $Page->Company->headerCellClass() ?>"><?= $Page->Company->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Company->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Company->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Company->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Company->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Company->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
    <?php if ($Page->SortUrl($Page->AddressInsuranceCarierName) == "") { ?>
        <th class="<?= $Page->AddressInsuranceCarierName->headerCellClass() ?>"><?= $Page->AddressInsuranceCarierName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->AddressInsuranceCarierName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->AddressInsuranceCarierName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->AddressInsuranceCarierName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->AddressInsuranceCarierName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->AddressInsuranceCarierName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ContactName->Visible) { // ContactName ?>
    <?php if ($Page->SortUrl($Page->ContactName) == "") { ?>
        <th class="<?= $Page->ContactName->headerCellClass() ?>"><?= $Page->ContactName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ContactName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ContactName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ContactName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ContactName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ContactName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ContactMobile->Visible) { // ContactMobile ?>
    <?php if ($Page->SortUrl($Page->ContactMobile) == "") { ?>
        <th class="<?= $Page->ContactMobile->headerCellClass() ?>"><?= $Page->ContactMobile->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ContactMobile->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ContactMobile->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ContactMobile->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ContactMobile->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ContactMobile->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PolicyType->Visible) { // PolicyType ?>
    <?php if ($Page->SortUrl($Page->PolicyType) == "") { ?>
        <th class="<?= $Page->PolicyType->headerCellClass() ?>"><?= $Page->PolicyType->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PolicyType->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PolicyType->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PolicyType->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PolicyType->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PolicyType->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PolicyName->Visible) { // PolicyName ?>
    <?php if ($Page->SortUrl($Page->PolicyName) == "") { ?>
        <th class="<?= $Page->PolicyName->headerCellClass() ?>"><?= $Page->PolicyName->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PolicyName->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PolicyName->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PolicyName->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PolicyName->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PolicyName->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PolicyNo->Visible) { // PolicyNo ?>
    <?php if ($Page->SortUrl($Page->PolicyNo) == "") { ?>
        <th class="<?= $Page->PolicyNo->headerCellClass() ?>"><?= $Page->PolicyNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PolicyNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PolicyNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PolicyNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PolicyNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PolicyNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PolicyAmount->Visible) { // PolicyAmount ?>
    <?php if ($Page->SortUrl($Page->PolicyAmount) == "") { ?>
        <th class="<?= $Page->PolicyAmount->headerCellClass() ?>"><?= $Page->PolicyAmount->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PolicyAmount->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PolicyAmount->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PolicyAmount->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PolicyAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PolicyAmount->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->RefLetterNo->Visible) { // RefLetterNo ?>
    <?php if ($Page->SortUrl($Page->RefLetterNo) == "") { ?>
        <th class="<?= $Page->RefLetterNo->headerCellClass() ?>"><?= $Page->RefLetterNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->RefLetterNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->RefLetterNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->RefLetterNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->RefLetterNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->RefLetterNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ReferenceBy->Visible) { // ReferenceBy ?>
    <?php if ($Page->SortUrl($Page->ReferenceBy) == "") { ?>
        <th class="<?= $Page->ReferenceBy->headerCellClass() ?>"><?= $Page->ReferenceBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ReferenceBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ReferenceBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ReferenceBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ReferenceBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ReferenceBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ReferenceDate->Visible) { // ReferenceDate ?>
    <?php if ($Page->SortUrl($Page->ReferenceDate) == "") { ?>
        <th class="<?= $Page->ReferenceDate->headerCellClass() ?>"><?= $Page->ReferenceDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ReferenceDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ReferenceDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ReferenceDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ReferenceDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ReferenceDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <?php if ($Page->SortUrl($Page->mrnno) == "") { ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><?= $Page->mrnno->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->mrnno->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->mrnno->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->mrnno->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->mrnno->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->mrnno->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Company->Visible) { // Company ?>
        <!-- Company -->
        <td<?= $Page->Company->cellAttributes() ?>>
<span<?= $Page->Company->viewAttributes() ?>>
<?= $Page->Company->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->AddressInsuranceCarierName->Visible) { // AddressInsuranceCarierName ?>
        <!-- AddressInsuranceCarierName -->
        <td<?= $Page->AddressInsuranceCarierName->cellAttributes() ?>>
<span<?= $Page->AddressInsuranceCarierName->viewAttributes() ?>>
<?= $Page->AddressInsuranceCarierName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ContactName->Visible) { // ContactName ?>
        <!-- ContactName -->
        <td<?= $Page->ContactName->cellAttributes() ?>>
<span<?= $Page->ContactName->viewAttributes() ?>>
<?= $Page->ContactName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ContactMobile->Visible) { // ContactMobile ?>
        <!-- ContactMobile -->
        <td<?= $Page->ContactMobile->cellAttributes() ?>>
<span<?= $Page->ContactMobile->viewAttributes() ?>>
<?= $Page->ContactMobile->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PolicyType->Visible) { // PolicyType ?>
        <!-- PolicyType -->
        <td<?= $Page->PolicyType->cellAttributes() ?>>
<span<?= $Page->PolicyType->viewAttributes() ?>>
<?= $Page->PolicyType->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PolicyName->Visible) { // PolicyName ?>
        <!-- PolicyName -->
        <td<?= $Page->PolicyName->cellAttributes() ?>>
<span<?= $Page->PolicyName->viewAttributes() ?>>
<?= $Page->PolicyName->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PolicyNo->Visible) { // PolicyNo ?>
        <!-- PolicyNo -->
        <td<?= $Page->PolicyNo->cellAttributes() ?>>
<span<?= $Page->PolicyNo->viewAttributes() ?>>
<?= $Page->PolicyNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PolicyAmount->Visible) { // PolicyAmount ?>
        <!-- PolicyAmount -->
        <td<?= $Page->PolicyAmount->cellAttributes() ?>>
<span<?= $Page->PolicyAmount->viewAttributes() ?>>
<?= $Page->PolicyAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->RefLetterNo->Visible) { // RefLetterNo ?>
        <!-- RefLetterNo -->
        <td<?= $Page->RefLetterNo->cellAttributes() ?>>
<span<?= $Page->RefLetterNo->viewAttributes() ?>>
<?= $Page->RefLetterNo->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ReferenceBy->Visible) { // ReferenceBy ?>
        <!-- ReferenceBy -->
        <td<?= $Page->ReferenceBy->cellAttributes() ?>>
<span<?= $Page->ReferenceBy->viewAttributes() ?>>
<?= $Page->ReferenceBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ReferenceDate->Visible) { // ReferenceDate ?>
        <!-- ReferenceDate -->
        <td<?= $Page->ReferenceDate->cellAttributes() ?>>
<span<?= $Page->ReferenceDate->viewAttributes() ?>>
<?= $Page->ReferenceDate->getViewValue() ?></span>
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
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <!-- mrnno -->
        <td<?= $Page->mrnno->cellAttributes() ?>>
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
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

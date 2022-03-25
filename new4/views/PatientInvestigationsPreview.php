<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientInvestigationsPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_investigations"><!-- .card -->
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
<?php if ($Page->Investigation->Visible) { // Investigation ?>
    <?php if ($Page->SortUrl($Page->Investigation) == "") { ?>
        <th class="<?= $Page->Investigation->headerCellClass() ?>"><?= $Page->Investigation->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Investigation->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Investigation->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Investigation->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Investigation->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Investigation->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Value->Visible) { // Value ?>
    <?php if ($Page->SortUrl($Page->Value) == "") { ?>
        <th class="<?= $Page->Value->headerCellClass() ?>"><?= $Page->Value->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Value->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Value->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Value->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Value->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Value->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NormalRange->Visible) { // NormalRange ?>
    <?php if ($Page->SortUrl($Page->NormalRange) == "") { ?>
        <th class="<?= $Page->NormalRange->headerCellClass() ?>"><?= $Page->NormalRange->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NormalRange->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NormalRange->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NormalRange->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NormalRange->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NormalRange->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->SampleCollected->Visible) { // SampleCollected ?>
    <?php if ($Page->SortUrl($Page->SampleCollected) == "") { ?>
        <th class="<?= $Page->SampleCollected->headerCellClass() ?>"><?= $Page->SampleCollected->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SampleCollected->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SampleCollected->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SampleCollected->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SampleCollected->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SampleCollected->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
    <?php if ($Page->SortUrl($Page->SampleCollectedBy) == "") { ?>
        <th class="<?= $Page->SampleCollectedBy->headerCellClass() ?>"><?= $Page->SampleCollectedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SampleCollectedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SampleCollectedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SampleCollectedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SampleCollectedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SampleCollectedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ResultedDate->Visible) { // ResultedDate ?>
    <?php if ($Page->SortUrl($Page->ResultedDate) == "") { ?>
        <th class="<?= $Page->ResultedDate->headerCellClass() ?>"><?= $Page->ResultedDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ResultedDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ResultedDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ResultedDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ResultedDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ResultedDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
    <?php if ($Page->SortUrl($Page->ResultedBy) == "") { ?>
        <th class="<?= $Page->ResultedBy->headerCellClass() ?>"><?= $Page->ResultedBy->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ResultedBy->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ResultedBy->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ResultedBy->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ResultedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ResultedBy->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
    <?php if ($Page->SortUrl($Page->Modified) == "") { ?>
        <th class="<?= $Page->Modified->headerCellClass() ?>"><?= $Page->Modified->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Modified->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Modified->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Modified->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Modified->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Modified->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Created->Visible) { // Created ?>
    <?php if ($Page->SortUrl($Page->Created) == "") { ?>
        <th class="<?= $Page->Created->headerCellClass() ?>"><?= $Page->Created->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Created->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Created->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Created->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Created->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Created->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->GroupHead->Visible) { // GroupHead ?>
    <?php if ($Page->SortUrl($Page->GroupHead) == "") { ?>
        <th class="<?= $Page->GroupHead->headerCellClass() ?>"><?= $Page->GroupHead->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->GroupHead->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->GroupHead->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->GroupHead->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->GroupHead->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->GroupHead->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Cost->Visible) { // Cost ?>
    <?php if ($Page->SortUrl($Page->Cost) == "") { ?>
        <th class="<?= $Page->Cost->headerCellClass() ?>"><?= $Page->Cost->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Cost->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Cost->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Cost->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Cost->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Cost->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
    <?php if ($Page->SortUrl($Page->PaymentStatus) == "") { ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><?= $Page->PaymentStatus->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PaymentStatus->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PaymentStatus->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PaymentStatus->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PaymentStatus->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PaymentStatus->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PayMode->Visible) { // PayMode ?>
    <?php if ($Page->SortUrl($Page->PayMode) == "") { ?>
        <th class="<?= $Page->PayMode->headerCellClass() ?>"><?= $Page->PayMode->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PayMode->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PayMode->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PayMode->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PayMode->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PayMode->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->VoucherNo->Visible) { // VoucherNo ?>
    <?php if ($Page->SortUrl($Page->VoucherNo) == "") { ?>
        <th class="<?= $Page->VoucherNo->headerCellClass() ?>"><?= $Page->VoucherNo->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->VoucherNo->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->VoucherNo->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->VoucherNo->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->VoucherNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->VoucherNo->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Investigation->Visible) { // Investigation ?>
        <!-- Investigation -->
        <td<?= $Page->Investigation->cellAttributes() ?>>
<span<?= $Page->Investigation->viewAttributes() ?>>
<?= $Page->Investigation->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Value->Visible) { // Value ?>
        <!-- Value -->
        <td<?= $Page->Value->cellAttributes() ?>>
<span<?= $Page->Value->viewAttributes() ?>>
<?= $Page->Value->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NormalRange->Visible) { // NormalRange ?>
        <!-- NormalRange -->
        <td<?= $Page->NormalRange->cellAttributes() ?>>
<span<?= $Page->NormalRange->viewAttributes() ?>>
<?= $Page->NormalRange->getViewValue() ?></span>
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
<?php if ($Page->SampleCollected->Visible) { // SampleCollected ?>
        <!-- SampleCollected -->
        <td<?= $Page->SampleCollected->cellAttributes() ?>>
<span<?= $Page->SampleCollected->viewAttributes() ?>>
<?= $Page->SampleCollected->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SampleCollectedBy->Visible) { // SampleCollectedBy ?>
        <!-- SampleCollectedBy -->
        <td<?= $Page->SampleCollectedBy->cellAttributes() ?>>
<span<?= $Page->SampleCollectedBy->viewAttributes() ?>>
<?= $Page->SampleCollectedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ResultedDate->Visible) { // ResultedDate ?>
        <!-- ResultedDate -->
        <td<?= $Page->ResultedDate->cellAttributes() ?>>
<span<?= $Page->ResultedDate->viewAttributes() ?>>
<?= $Page->ResultedDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ResultedBy->Visible) { // ResultedBy ?>
        <!-- ResultedBy -->
        <td<?= $Page->ResultedBy->cellAttributes() ?>>
<span<?= $Page->ResultedBy->viewAttributes() ?>>
<?= $Page->ResultedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Modified->Visible) { // Modified ?>
        <!-- Modified -->
        <td<?= $Page->Modified->cellAttributes() ?>>
<span<?= $Page->Modified->viewAttributes() ?>>
<?= $Page->Modified->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
        <!-- ModifiedBy -->
        <td<?= $Page->ModifiedBy->cellAttributes() ?>>
<span<?= $Page->ModifiedBy->viewAttributes() ?>>
<?= $Page->ModifiedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
        <!-- Created -->
        <td<?= $Page->Created->cellAttributes() ?>>
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
        <!-- CreatedBy -->
        <td<?= $Page->CreatedBy->cellAttributes() ?>>
<span<?= $Page->CreatedBy->viewAttributes() ?>>
<?= $Page->CreatedBy->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->GroupHead->Visible) { // GroupHead ?>
        <!-- GroupHead -->
        <td<?= $Page->GroupHead->cellAttributes() ?>>
<span<?= $Page->GroupHead->viewAttributes() ?>>
<?= $Page->GroupHead->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Cost->Visible) { // Cost ?>
        <!-- Cost -->
        <td<?= $Page->Cost->cellAttributes() ?>>
<span<?= $Page->Cost->viewAttributes() ?>>
<?= $Page->Cost->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PaymentStatus->Visible) { // PaymentStatus ?>
        <!-- PaymentStatus -->
        <td<?= $Page->PaymentStatus->cellAttributes() ?>>
<span<?= $Page->PaymentStatus->viewAttributes() ?>>
<?= $Page->PaymentStatus->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PayMode->Visible) { // PayMode ?>
        <!-- PayMode -->
        <td<?= $Page->PayMode->cellAttributes() ?>>
<span<?= $Page->PayMode->viewAttributes() ?>>
<?= $Page->PayMode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->VoucherNo->Visible) { // VoucherNo ?>
        <!-- VoucherNo -->
        <td<?= $Page->VoucherNo->cellAttributes() ?>>
<span<?= $Page->VoucherNo->viewAttributes() ?>>
<?= $Page->VoucherNo->getViewValue() ?></span>
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

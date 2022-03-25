<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientFollowUpPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_follow_up"><!-- .card -->
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
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <?php if ($Page->SortUrl($Page->MobileNumber) == "") { ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><?= $Page->MobileNumber->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->MobileNumber->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->MobileNumber->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->MobileNumber->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->MobileNumber->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->MobileNumber->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->BP->Visible) { // BP ?>
    <?php if ($Page->SortUrl($Page->BP) == "") { ?>
        <th class="<?= $Page->BP->headerCellClass() ?>"><?= $Page->BP->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->BP->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->BP->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->BP->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->BP->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->BP->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->Resp->Visible) { // Resp ?>
    <?php if ($Page->SortUrl($Page->Resp) == "") { ?>
        <th class="<?= $Page->Resp->headerCellClass() ?>"><?= $Page->Resp->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Resp->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Resp->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Resp->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Resp->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Resp->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
    <?php if ($Page->SortUrl($Page->SPO2) == "") { ?>
        <th class="<?= $Page->SPO2->headerCellClass() ?>"><?= $Page->SPO2->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->SPO2->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->SPO2->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->SPO2->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->SPO2->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->SPO2->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <?php if ($Page->SortUrl($Page->NextReviewDate) == "") { ?>
        <th class="<?= $Page->NextReviewDate->headerCellClass() ?>"><?= $Page->NextReviewDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->NextReviewDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->NextReviewDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->NextReviewDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->NextReviewDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->NextReviewDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <?php if ($Page->SortUrl($Page->PatientId) == "") { ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><?= $Page->PatientId->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientId->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientId->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientId->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientId->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientId->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <!-- MobileNumber -->
        <td<?= $Page->MobileNumber->cellAttributes() ?>>
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
        <!-- mrnno -->
        <td<?= $Page->mrnno->cellAttributes() ?>>
<span<?= $Page->mrnno->viewAttributes() ?>>
<?= $Page->mrnno->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
        <!-- BP -->
        <td<?= $Page->BP->cellAttributes() ?>>
<span<?= $Page->BP->viewAttributes() ?>>
<?= $Page->BP->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
        <!-- Pulse -->
        <td<?= $Page->Pulse->cellAttributes() ?>>
<span<?= $Page->Pulse->viewAttributes() ?>>
<?= $Page->Pulse->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
        <!-- Resp -->
        <td<?= $Page->Resp->cellAttributes() ?>>
<span<?= $Page->Resp->viewAttributes() ?>>
<?= $Page->Resp->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
        <!-- SPO2 -->
        <td<?= $Page->SPO2->cellAttributes() ?>>
<span<?= $Page->SPO2->viewAttributes() ?>>
<?= $Page->SPO2->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
        <!-- NextReviewDate -->
        <td<?= $Page->NextReviewDate->cellAttributes() ?>>
<span<?= $Page->NextReviewDate->viewAttributes() ?>>
<?= $Page->NextReviewDate->getViewValue() ?></span>
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
<?php if ($Page->PatientId->Visible) { // PatientId ?>
        <!-- PatientId -->
        <td<?= $Page->PatientId->cellAttributes() ?>>
<span<?= $Page->PatientId->viewAttributes() ?>>
<?= $Page->PatientId->getViewValue() ?></span>
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

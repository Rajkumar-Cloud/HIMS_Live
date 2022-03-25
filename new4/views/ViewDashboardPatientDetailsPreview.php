<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDashboardPatientDetailsPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid view_dashboard_patient_details"><!-- .card -->
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
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <?php if ($Page->SortUrl($Page->PatientID) == "") { ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><?= $Page->PatientID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PatientID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PatientID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PatientID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PatientID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PatientID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
    <?php if ($Page->SortUrl($Page->first_name) == "") { ?>
        <th class="<?= $Page->first_name->headerCellClass() ?>"><?= $Page->first_name->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->first_name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->first_name->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->first_name->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->first_name->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->first_name->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
    <?php if ($Page->SortUrl($Page->mobile_no) == "") { ?>
        <th class="<?= $Page->mobile_no->headerCellClass() ?>"><?= $Page->mobile_no->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->mobile_no->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->mobile_no->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->mobile_no->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->mobile_no->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->mobile_no->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
    <?php if ($Page->SortUrl($Page->ReferA4TreatingConsultant) == "") { ?>
        <th class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><?= $Page->ReferA4TreatingConsultant->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ReferA4TreatingConsultant->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ReferA4TreatingConsultant->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ReferA4TreatingConsultant->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ReferA4TreatingConsultant->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ReferA4TreatingConsultant->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
    <?php if ($Page->SortUrl($Page->Patient_Language) == "") { ?>
        <th class="<?= $Page->Patient_Language->headerCellClass() ?>"><?= $Page->Patient_Language->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Patient_Language->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Patient_Language->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Patient_Language->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Patient_Language->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Patient_Language->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
    <?php if ($Page->SortUrl($Page->WhereDidYouHear) == "") { ?>
        <th class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><?= $Page->WhereDidYouHear->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->WhereDidYouHear->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->WhereDidYouHear->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->WhereDidYouHear->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->WhereDidYouHear->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->WhereDidYouHear->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->createdDate->Visible) { // createdDate ?>
    <?php if ($Page->SortUrl($Page->createdDate) == "") { ?>
        <th class="<?= $Page->createdDate->headerCellClass() ?>"><?= $Page->createdDate->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->createdDate->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->createdDate->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->createdDate->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->createdDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->createdDate->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->PatientID->Visible) { // PatientID ?>
        <!-- PatientID -->
        <td<?= $Page->PatientID->cellAttributes() ?>>
<span<?= $Page->PatientID->viewAttributes() ?>>
<?= $Page->PatientID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <!-- first_name -->
        <td<?= $Page->first_name->cellAttributes() ?>>
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->mobile_no->Visible) { // mobile_no ?>
        <!-- mobile_no -->
        <td<?= $Page->mobile_no->cellAttributes() ?>>
<span<?= $Page->mobile_no->viewAttributes() ?>>
<?= $Page->mobile_no->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->ReferA4TreatingConsultant->Visible) { // ReferA4TreatingConsultant ?>
        <!-- ReferA4TreatingConsultant -->
        <td<?= $Page->ReferA4TreatingConsultant->cellAttributes() ?>>
<span<?= $Page->ReferA4TreatingConsultant->viewAttributes() ?>>
<?= $Page->ReferA4TreatingConsultant->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Patient_Language->Visible) { // Patient_Language ?>
        <!-- Patient_Language -->
        <td<?= $Page->Patient_Language->cellAttributes() ?>>
<span<?= $Page->Patient_Language->viewAttributes() ?>>
<?= $Page->Patient_Language->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->WhereDidYouHear->Visible) { // WhereDidYouHear ?>
        <!-- WhereDidYouHear -->
        <td<?= $Page->WhereDidYouHear->cellAttributes() ?>>
<span<?= $Page->WhereDidYouHear->viewAttributes() ?>>
<?= $Page->WhereDidYouHear->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <!-- HospID -->
        <td<?= $Page->HospID->cellAttributes() ?>>
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->createdDate->Visible) { // createdDate ?>
        <!-- createdDate -->
        <td<?= $Page->createdDate->cellAttributes() ?>>
<span<?= $Page->createdDate->viewAttributes() ?>>
<?= $Page->createdDate->getViewValue() ?></span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeTelephonePreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid employee_telephone"><!-- .card -->
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
<?php if ($Page->employee_id->Visible) { // employee_id ?>
    <?php if ($Page->SortUrl($Page->employee_id) == "") { ?>
        <th class="<?= $Page->employee_id->headerCellClass() ?>"><?= $Page->employee_id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->employee_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->employee_id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->employee_id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->employee_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->employee_id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->tele_type->Visible) { // tele_type ?>
    <?php if ($Page->SortUrl($Page->tele_type) == "") { ?>
        <th class="<?= $Page->tele_type->headerCellClass() ?>"><?= $Page->tele_type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->tele_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->tele_type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->tele_type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->tele_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->tele_type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->telephone->Visible) { // telephone ?>
    <?php if ($Page->SortUrl($Page->telephone) == "") { ?>
        <th class="<?= $Page->telephone->headerCellClass() ?>"><?= $Page->telephone->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->telephone->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->telephone->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->telephone->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->telephone->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->telephone->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->telephone_type->Visible) { // telephone_type ?>
    <?php if ($Page->SortUrl($Page->telephone_type) == "") { ?>
        <th class="<?= $Page->telephone_type->headerCellClass() ?>"><?= $Page->telephone_type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->telephone_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->telephone_type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->telephone_type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->telephone_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->telephone_type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <!-- employee_id -->
        <td<?= $Page->employee_id->cellAttributes() ?>>
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->tele_type->Visible) { // tele_type ?>
        <!-- tele_type -->
        <td<?= $Page->tele_type->cellAttributes() ?>>
<span<?= $Page->tele_type->viewAttributes() ?>>
<?= $Page->tele_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->telephone->Visible) { // telephone ?>
        <!-- telephone -->
        <td<?= $Page->telephone->cellAttributes() ?>>
<span<?= $Page->telephone->viewAttributes() ?>>
<?= $Page->telephone->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->telephone_type->Visible) { // telephone_type ?>
        <!-- telephone_type -->
        <td<?= $Page->telephone_type->cellAttributes() ?>>
<span<?= $Page->telephone_type->viewAttributes() ?>>
<?= $Page->telephone_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <!-- status -->
        <td<?= $Page->status->cellAttributes() ?>>
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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

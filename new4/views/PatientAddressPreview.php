<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientAddressPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid patient_address"><!-- .card -->
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
<?php if ($Page->patient_id->Visible) { // patient_id ?>
    <?php if ($Page->SortUrl($Page->patient_id) == "") { ?>
        <th class="<?= $Page->patient_id->headerCellClass() ?>"><?= $Page->patient_id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->patient_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->patient_id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->patient_id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->patient_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->patient_id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <?php if ($Page->SortUrl($Page->street) == "") { ?>
        <th class="<?= $Page->street->headerCellClass() ?>"><?= $Page->street->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->street->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->street->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->street->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->street->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->street->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <?php if ($Page->SortUrl($Page->town) == "") { ?>
        <th class="<?= $Page->town->headerCellClass() ?>"><?= $Page->town->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->town->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->town->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->town->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->town->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->town->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <?php if ($Page->SortUrl($Page->province) == "") { ?>
        <th class="<?= $Page->province->headerCellClass() ?>"><?= $Page->province->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->province->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->province->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->province->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->province->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->province->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <?php if ($Page->SortUrl($Page->postal_code) == "") { ?>
        <th class="<?= $Page->postal_code->headerCellClass() ?>"><?= $Page->postal_code->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->postal_code->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->postal_code->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->postal_code->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->postal_code->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->postal_code->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->address_type->Visible) { // address_type ?>
    <?php if ($Page->SortUrl($Page->address_type) == "") { ?>
        <th class="<?= $Page->address_type->headerCellClass() ?>"><?= $Page->address_type->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->address_type->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->address_type->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->address_type->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->address_type->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->address_type->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <!-- patient_id -->
        <td<?= $Page->patient_id->cellAttributes() ?>>
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
        <!-- street -->
        <td<?= $Page->street->cellAttributes() ?>>
<span<?= $Page->street->viewAttributes() ?>>
<?= $Page->street->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
        <!-- town -->
        <td<?= $Page->town->cellAttributes() ?>>
<span<?= $Page->town->viewAttributes() ?>>
<?= $Page->town->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
        <!-- province -->
        <td<?= $Page->province->cellAttributes() ?>>
<span<?= $Page->province->viewAttributes() ?>>
<?= $Page->province->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
        <!-- postal_code -->
        <td<?= $Page->postal_code->cellAttributes() ?>>
<span<?= $Page->postal_code->viewAttributes() ?>>
<?= $Page->postal_code->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->address_type->Visible) { // address_type ?>
        <!-- address_type -->
        <td<?= $Page->address_type->cellAttributes() ?>>
<span<?= $Page->address_type->viewAttributes() ?>>
<?= $Page->address_type->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <!-- status -->
        <td<?= $Page->status->cellAttributes() ?>>
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
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

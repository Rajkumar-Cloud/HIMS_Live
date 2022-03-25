<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyServicesPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid pharmacy_services"><!-- .card -->
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
<?php if ($Page->pharmacy_id->Visible) { // pharmacy_id ?>
    <?php if ($Page->SortUrl($Page->pharmacy_id) == "") { ?>
        <th class="<?= $Page->pharmacy_id->headerCellClass() ?>"><?= $Page->pharmacy_id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->pharmacy_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->pharmacy_id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->pharmacy_id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->pharmacy_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->pharmacy_id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->name->Visible) { // name ?>
    <?php if ($Page->SortUrl($Page->name) == "") { ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><?= $Page->name->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->name->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->name->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->name->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->name->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->charged_date->Visible) { // charged_date ?>
    <?php if ($Page->SortUrl($Page->charged_date) == "") { ?>
        <th class="<?= $Page->charged_date->headerCellClass() ?>"><?= $Page->charged_date->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->charged_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->charged_date->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->charged_date->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->charged_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->charged_date->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->pharmacy_id->Visible) { // pharmacy_id ?>
        <!-- pharmacy_id -->
        <td<?= $Page->pharmacy_id->cellAttributes() ?>>
<span<?= $Page->pharmacy_id->viewAttributes() ?>>
<?= $Page->pharmacy_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->patient_id->Visible) { // patient_id ?>
        <!-- patient_id -->
        <td<?= $Page->patient_id->cellAttributes() ?>>
<span<?= $Page->patient_id->viewAttributes() ?>>
<?= $Page->patient_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <!-- name -->
        <td<?= $Page->name->cellAttributes() ?>>
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->amount->Visible) { // amount ?>
        <!-- amount -->
        <td<?= $Page->amount->cellAttributes() ?>>
<span<?= $Page->amount->viewAttributes() ?>>
<?= $Page->amount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->charged_date->Visible) { // charged_date ?>
        <!-- charged_date -->
        <td<?= $Page->charged_date->cellAttributes() ?>>
<span<?= $Page->charged_date->viewAttributes() ?>>
<?= $Page->charged_date->getViewValue() ?></span>
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

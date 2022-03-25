<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradeCombinationNamesNewPreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid pres_trade_combination_names_new"><!-- .card -->
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
<?php if ($Page->ID->Visible) { // ID ?>
    <?php if ($Page->SortUrl($Page->ID) == "") { ?>
        <th class="<?= $Page->ID->headerCellClass() ?>"><?= $Page->ID->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->ID->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->ID->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->ID->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->ID->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->ID->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
    <?php if ($Page->SortUrl($Page->tradenames_id) == "") { ?>
        <th class="<?= $Page->tradenames_id->headerCellClass() ?>"><?= $Page->tradenames_id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->tradenames_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->tradenames_id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->tradenames_id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->tradenames_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->tradenames_id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <?php if ($Page->SortUrl($Page->Drug_Name) == "") { ?>
        <th class="<?= $Page->Drug_Name->headerCellClass() ?>"><?= $Page->Drug_Name->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Drug_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Drug_Name->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Drug_Name->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Drug_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Drug_Name->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
    <?php if ($Page->SortUrl($Page->Generic_Name) == "") { ?>
        <th class="<?= $Page->Generic_Name->headerCellClass() ?>"><?= $Page->Generic_Name->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Generic_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Generic_Name->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Generic_Name->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Generic_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Generic_Name->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
    <?php if ($Page->SortUrl($Page->Trade_Name) == "") { ?>
        <th class="<?= $Page->Trade_Name->headerCellClass() ?>"><?= $Page->Trade_Name->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Trade_Name->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Trade_Name->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Trade_Name->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Trade_Name->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Trade_Name->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
    <?php if ($Page->SortUrl($Page->PR_CODE) == "") { ?>
        <th class="<?= $Page->PR_CODE->headerCellClass() ?>"><?= $Page->PR_CODE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->PR_CODE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->PR_CODE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->PR_CODE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->PR_CODE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->PR_CODE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
    <?php if ($Page->SortUrl($Page->Form) == "") { ?>
        <th class="<?= $Page->Form->headerCellClass() ?>"><?= $Page->Form->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Form->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Form->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Form->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Form->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Form->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <?php if ($Page->SortUrl($Page->Strength) == "") { ?>
        <th class="<?= $Page->Strength->headerCellClass() ?>"><?= $Page->Strength->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Strength->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Strength->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Strength->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Strength->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Strength->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
    <?php if ($Page->SortUrl($Page->Unit) == "") { ?>
        <th class="<?= $Page->Unit->headerCellClass() ?>"><?= $Page->Unit->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->Unit->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->Unit->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->Unit->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->Unit->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->Unit->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
    <?php if ($Page->SortUrl($Page->CONTAINER_TYPE) == "") { ?>
        <th class="<?= $Page->CONTAINER_TYPE->headerCellClass() ?>"><?= $Page->CONTAINER_TYPE->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CONTAINER_TYPE->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CONTAINER_TYPE->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CONTAINER_TYPE->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CONTAINER_TYPE->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CONTAINER_TYPE->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
    <?php if ($Page->SortUrl($Page->CONTAINER_STRENGTH) == "") { ?>
        <th class="<?= $Page->CONTAINER_STRENGTH->headerCellClass() ?>"><?= $Page->CONTAINER_STRENGTH->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->CONTAINER_STRENGTH->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->CONTAINER_STRENGTH->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->CONTAINER_STRENGTH->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->CONTAINER_STRENGTH->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->CONTAINER_STRENGTH->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
    <?php if ($Page->SortUrl($Page->TypeOfDrug) == "") { ?>
        <th class="<?= $Page->TypeOfDrug->headerCellClass() ?>"><?= $Page->TypeOfDrug->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->TypeOfDrug->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->TypeOfDrug->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->TypeOfDrug->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->TypeOfDrug->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->TypeOfDrug->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->ID->Visible) { // ID ?>
        <!-- ID -->
        <td<?= $Page->ID->cellAttributes() ?>>
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <!-- tradenames_id -->
        <td<?= $Page->tradenames_id->cellAttributes() ?>>
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<?= $Page->tradenames_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <!-- Drug_Name -->
        <td<?= $Page->Drug_Name->cellAttributes() ?>>
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <!-- Generic_Name -->
        <td<?= $Page->Generic_Name->cellAttributes() ?>>
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <!-- Trade_Name -->
        <td<?= $Page->Trade_Name->cellAttributes() ?>>
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <!-- PR_CODE -->
        <td<?= $Page->PR_CODE->cellAttributes() ?>>
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <!-- Form -->
        <td<?= $Page->Form->cellAttributes() ?>>
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <!-- Strength -->
        <td<?= $Page->Strength->cellAttributes() ?>>
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <!-- Unit -->
        <td<?= $Page->Unit->cellAttributes() ?>>
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <!-- CONTAINER_TYPE -->
        <td<?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <!-- CONTAINER_STRENGTH -->
        <td<?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<span<?= $Page->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Page->CONTAINER_STRENGTH->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <!-- TypeOfDrug -->
        <td<?= $Page->TypeOfDrug->cellAttributes() ?>>
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
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

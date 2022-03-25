<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeHasExperiencePreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid employee_has_experience"><!-- .card -->
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
<?php if ($Page->working_at->Visible) { // working_at ?>
    <?php if ($Page->SortUrl($Page->working_at) == "") { ?>
        <th class="<?= $Page->working_at->headerCellClass() ?>"><?= $Page->working_at->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->working_at->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->working_at->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->working_at->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->working_at->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->working_at->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->jobdescription->Visible) { // job description ?>
    <?php if ($Page->SortUrl($Page->jobdescription) == "") { ?>
        <th class="<?= $Page->jobdescription->headerCellClass() ?>"><?= $Page->jobdescription->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->jobdescription->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->jobdescription->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->jobdescription->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->jobdescription->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->jobdescription->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
    <?php if ($Page->SortUrl($Page->role) == "") { ?>
        <th class="<?= $Page->role->headerCellClass() ?>"><?= $Page->role->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->role->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->role->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->role->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->role->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->role->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <?php if ($Page->SortUrl($Page->start_date) == "") { ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><?= $Page->start_date->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->start_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->start_date->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->start_date->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->start_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->start_date->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
    <?php if ($Page->SortUrl($Page->end_date) == "") { ?>
        <th class="<?= $Page->end_date->headerCellClass() ?>"><?= $Page->end_date->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->end_date->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->end_date->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->end_date->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->end_date->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->end_date->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->total_experience->Visible) { // total_experience ?>
    <?php if ($Page->SortUrl($Page->total_experience) == "") { ?>
        <th class="<?= $Page->total_experience->headerCellClass() ?>"><?= $Page->total_experience->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->total_experience->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->total_experience->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->total_experience->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->total_experience->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->total_experience->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
    <?php if ($Page->SortUrl($Page->certificates) == "") { ?>
        <th class="<?= $Page->certificates->headerCellClass() ?>"><?= $Page->certificates->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->certificates->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->certificates->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->certificates->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->certificates->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->certificates->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
    <?php if ($Page->SortUrl($Page->_others) == "") { ?>
        <th class="<?= $Page->_others->headerCellClass() ?>"><?= $Page->_others->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->_others->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->_others->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->_others->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->_others->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->_others->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->working_at->Visible) { // working_at ?>
        <!-- working_at -->
        <td<?= $Page->working_at->cellAttributes() ?>>
<span<?= $Page->working_at->viewAttributes() ?>>
<?= $Page->working_at->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->jobdescription->Visible) { // job description ?>
        <!-- job description -->
        <td<?= $Page->jobdescription->cellAttributes() ?>>
<span<?= $Page->jobdescription->viewAttributes() ?>>
<?= $Page->jobdescription->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->role->Visible) { // role ?>
        <!-- role -->
        <td<?= $Page->role->cellAttributes() ?>>
<span<?= $Page->role->viewAttributes() ?>>
<?= $Page->role->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <!-- start_date -->
        <td<?= $Page->start_date->cellAttributes() ?>>
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->end_date->Visible) { // end_date ?>
        <!-- end_date -->
        <td<?= $Page->end_date->cellAttributes() ?>>
<span<?= $Page->end_date->viewAttributes() ?>>
<?= $Page->end_date->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->total_experience->Visible) { // total_experience ?>
        <!-- total_experience -->
        <td<?= $Page->total_experience->cellAttributes() ?>>
<span<?= $Page->total_experience->viewAttributes() ?>>
<?= $Page->total_experience->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
        <!-- certificates -->
        <td<?= $Page->certificates->cellAttributes() ?>>
<span>
<?= GetFileViewTag($Page->certificates, $Page->certificates->getViewValue(), false) ?>
</span>
</td>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
        <!-- others -->
        <td<?= $Page->_others->cellAttributes() ?>>
<span<?= $Page->_others->viewAttributes() ?>>
<?= GetFileViewTag($Page->_others, $Page->_others->getViewValue(), false) ?>
</span>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeHasDegreePreview = &$Page;
?>
<?php $Page->showPageHeader(); ?>
<?php if ($Page->TotalRecords > 0) { ?>
<div class="card ew-grid employee_has_degree"><!-- .card -->
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
<?php if ($Page->degree_id->Visible) { // degree_id ?>
    <?php if ($Page->SortUrl($Page->degree_id) == "") { ?>
        <th class="<?= $Page->degree_id->headerCellClass() ?>"><?= $Page->degree_id->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->degree_id->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->degree_id->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->degree_id->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->degree_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->degree_id->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->college_or_school->Visible) { // college_or_school ?>
    <?php if ($Page->SortUrl($Page->college_or_school) == "") { ?>
        <th class="<?= $Page->college_or_school->headerCellClass() ?>"><?= $Page->college_or_school->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->college_or_school->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->college_or_school->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->college_or_school->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->college_or_school->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->college_or_school->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->university_or_board->Visible) { // university_or_board ?>
    <?php if ($Page->SortUrl($Page->university_or_board) == "") { ?>
        <th class="<?= $Page->university_or_board->headerCellClass() ?>"><?= $Page->university_or_board->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->university_or_board->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->university_or_board->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->university_or_board->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->university_or_board->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->university_or_board->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
    <?php if ($Page->SortUrl($Page->year_of_passing) == "") { ?>
        <th class="<?= $Page->year_of_passing->headerCellClass() ?>"><?= $Page->year_of_passing->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->year_of_passing->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->year_of_passing->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->year_of_passing->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->year_of_passing->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->year_of_passing->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
        </div></div></th>
    <?php } ?>
<?php } ?>
<?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
    <?php if ($Page->SortUrl($Page->scoring_marks) == "") { ?>
        <th class="<?= $Page->scoring_marks->headerCellClass() ?>"><?= $Page->scoring_marks->caption() ?></th>
    <?php } else { ?>
        <th class="<?= $Page->scoring_marks->headerCellClass() ?>"><div class="ew-pointer" data-sort="<?= HtmlEncode($Page->scoring_marks->Name) ?>" data-sort-order="<?= $Page->SortField == $Page->scoring_marks->Name && $Page->SortOrder == "ASC" ? "DESC" : "ASC" ?>">
            <div class="ew-table-header-btn"><span class="ew-table-header-caption"><?= $Page->scoring_marks->caption() ?></span><span class="ew-table-header-sort"><?php if ($Page->SortField == $Page->scoring_marks->Name) { ?><?php if ($Page->SortOrder == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($Page->SortOrder == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?><?php } ?></span>
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
<?php if ($Page->degree_id->Visible) { // degree_id ?>
        <!-- degree_id -->
        <td<?= $Page->degree_id->cellAttributes() ?>>
<span<?= $Page->degree_id->viewAttributes() ?>>
<?= $Page->degree_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->college_or_school->Visible) { // college_or_school ?>
        <!-- college_or_school -->
        <td<?= $Page->college_or_school->cellAttributes() ?>>
<span<?= $Page->college_or_school->viewAttributes() ?>>
<?= $Page->college_or_school->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->university_or_board->Visible) { // university_or_board ?>
        <!-- university_or_board -->
        <td<?= $Page->university_or_board->cellAttributes() ?>>
<span<?= $Page->university_or_board->viewAttributes() ?>>
<?= $Page->university_or_board->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
        <!-- year_of_passing -->
        <td<?= $Page->year_of_passing->cellAttributes() ?>>
<span<?= $Page->year_of_passing->viewAttributes() ?>>
<?= $Page->year_of_passing->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
        <!-- scoring_marks -->
        <td<?= $Page->scoring_marks->cellAttributes() ?>>
<span<?= $Page->scoring_marks->viewAttributes() ?>>
<?= $Page->scoring_marks->getViewValue() ?></span>
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

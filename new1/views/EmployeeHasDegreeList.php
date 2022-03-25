<?php

namespace PHPMaker2021\project3;

// Page object
$EmployeeHasDegreeList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_has_degreelist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_has_degreelist = currentForm = new ew.Form("femployee_has_degreelist", "list");
    femployee_has_degreelist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("femployee_has_degreelist");
});
var femployee_has_degreelistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_has_degreelistsrch = currentSearchForm = new ew.Form("femployee_has_degreelistsrch");

    // Dynamic selection lists

    // Filters
    femployee_has_degreelistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_has_degreelistsrch");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php } ?>
<?php if (!$Page->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($Page->TotalRecords > 0 && $Page->ExportOptions->visible()) { ?>
<?php $Page->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->ImportOptions->visible()) { ?>
<?php $Page->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($Page->SearchOptions->visible()) { ?>
<?php $Page->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($Page->FilterOptions->visible()) { ?>
<?php $Page->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="femployee_has_degreelistsrch" id="femployee_has_degreelistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="femployee_has_degreelistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_has_degree">
    <div class="ew-extended-search">
<div id="xsr_<?= $Page->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
    <div class="ew-quick-search input-group">
        <input type="text" name="<?= Config("TABLE_BASIC_SEARCH") ?>" id="<?= Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?= HtmlEncode($Page->BasicSearch->getKeyword()) ?>" placeholder="<?= HtmlEncode($Language->phrase("Search")) ?>">
        <input type="hidden" name="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?= Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?= HtmlEncode($Page->BasicSearch->getType()) ?>">
        <div class="input-group-append">
            <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?= $Page->BasicSearch->getTypeNameShort() ?></span></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?= $Language->phrase("QuickSearchAuto") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?= $Language->phrase("QuickSearchExact") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?= $Language->phrase("QuickSearchAll") ?></a>
                <a class="dropdown-item<?php if ($Page->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?= $Language->phrase("QuickSearchAny") ?></a>
            </div>
        </div>
    </div>
</div>
    </div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_has_degree">
<form name="femployee_has_degreelist" id="femployee_has_degreelist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_has_degree">
<div id="gmp_employee_has_degree" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_has_degreelist" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Page->RowType = ROWTYPE_HEADER;

// Render list options
$Page->renderListOptions();

// Render list options (header, left)
$Page->ListOptions->render("header", "left");
?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_has_degree_id" class="employee_has_degree_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Page->employee_id->headerCellClass() ?>"><div id="elh_employee_has_degree_employee_id" class="employee_has_degree_employee_id"><?= $Page->renderSort($Page->employee_id) ?></div></th>
<?php } ?>
<?php if ($Page->degree_id->Visible) { // degree_id ?>
        <th data-name="degree_id" class="<?= $Page->degree_id->headerCellClass() ?>"><div id="elh_employee_has_degree_degree_id" class="employee_has_degree_degree_id"><?= $Page->renderSort($Page->degree_id) ?></div></th>
<?php } ?>
<?php if ($Page->college_or_school->Visible) { // college_or_school ?>
        <th data-name="college_or_school" class="<?= $Page->college_or_school->headerCellClass() ?>"><div id="elh_employee_has_degree_college_or_school" class="employee_has_degree_college_or_school"><?= $Page->renderSort($Page->college_or_school) ?></div></th>
<?php } ?>
<?php if ($Page->university_or_board->Visible) { // university_or_board ?>
        <th data-name="university_or_board" class="<?= $Page->university_or_board->headerCellClass() ?>"><div id="elh_employee_has_degree_university_or_board" class="employee_has_degree_university_or_board"><?= $Page->renderSort($Page->university_or_board) ?></div></th>
<?php } ?>
<?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
        <th data-name="year_of_passing" class="<?= $Page->year_of_passing->headerCellClass() ?>"><div id="elh_employee_has_degree_year_of_passing" class="employee_has_degree_year_of_passing"><?= $Page->renderSort($Page->year_of_passing) ?></div></th>
<?php } ?>
<?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
        <th data-name="scoring_marks" class="<?= $Page->scoring_marks->headerCellClass() ?>"><div id="elh_employee_has_degree_scoring_marks" class="employee_has_degree_scoring_marks"><?= $Page->renderSort($Page->scoring_marks) ?></div></th>
<?php } ?>
<?php if ($Page->certificates->Visible) { // certificates ?>
        <th data-name="certificates" class="<?= $Page->certificates->headerCellClass() ?>"><div id="elh_employee_has_degree_certificates" class="employee_has_degree_certificates"><?= $Page->renderSort($Page->certificates) ?></div></th>
<?php } ?>
<?php if ($Page->_others->Visible) { // others ?>
        <th data-name="_others" class="<?= $Page->_others->headerCellClass() ?>"><div id="elh_employee_has_degree__others" class="employee_has_degree__others"><?= $Page->renderSort($Page->_others) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_employee_has_degree_status" class="employee_has_degree_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Page->createdby->headerCellClass() ?>"><div id="elh_employee_has_degree_createdby" class="employee_has_degree_createdby"><?= $Page->renderSort($Page->createdby) ?></div></th>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Page->createddatetime->headerCellClass() ?>"><div id="elh_employee_has_degree_createddatetime" class="employee_has_degree_createddatetime"><?= $Page->renderSort($Page->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Page->modifiedby->headerCellClass() ?>"><div id="elh_employee_has_degree_modifiedby" class="employee_has_degree_modifiedby"><?= $Page->renderSort($Page->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Page->modifieddatetime->headerCellClass() ?>"><div id="elh_employee_has_degree_modifieddatetime" class="employee_has_degree_modifieddatetime"><?= $Page->renderSort($Page->modifieddatetime) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
if ($Page->ExportAll && $Page->isExport()) {
    $Page->StopRecord = $Page->TotalRecords;
} else {
    // Set the last record to display
    if ($Page->TotalRecords > $Page->StartRecord + $Page->DisplayRecords - 1) {
        $Page->StopRecord = $Page->StartRecord + $Page->DisplayRecords - 1;
    } else {
        $Page->StopRecord = $Page->TotalRecords;
    }
}
$Page->RecordCount = $Page->StartRecord - 1;
if ($Page->Recordset && !$Page->Recordset->EOF) {
    // Nothing to do
} elseif (!$Page->AllowAddDeleteRow && $Page->StopRecord == 0) {
    $Page->StopRecord = $Page->GridAddRowCount;
}

// Initialize aggregate
$Page->RowType = ROWTYPE_AGGREGATEINIT;
$Page->resetAttributes();
$Page->renderRow();
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;

        // Set up key count
        $Page->KeyCount = $Page->RowIndex;

        // Init row class and style
        $Page->resetAttributes();
        $Page->CssClass = "";
        if ($Page->isGridAdd()) {
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_has_degree", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->degree_id->Visible) { // degree_id ?>
        <td data-name="degree_id" <?= $Page->degree_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_degree_id">
<span<?= $Page->degree_id->viewAttributes() ?>>
<?= $Page->degree_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->college_or_school->Visible) { // college_or_school ?>
        <td data-name="college_or_school" <?= $Page->college_or_school->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_college_or_school">
<span<?= $Page->college_or_school->viewAttributes() ?>>
<?= $Page->college_or_school->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->university_or_board->Visible) { // university_or_board ?>
        <td data-name="university_or_board" <?= $Page->university_or_board->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_university_or_board">
<span<?= $Page->university_or_board->viewAttributes() ?>>
<?= $Page->university_or_board->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->year_of_passing->Visible) { // year_of_passing ?>
        <td data-name="year_of_passing" <?= $Page->year_of_passing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_year_of_passing">
<span<?= $Page->year_of_passing->viewAttributes() ?>>
<?= $Page->year_of_passing->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->scoring_marks->Visible) { // scoring_marks ?>
        <td data-name="scoring_marks" <?= $Page->scoring_marks->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_scoring_marks">
<span<?= $Page->scoring_marks->viewAttributes() ?>>
<?= $Page->scoring_marks->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->certificates->Visible) { // certificates ?>
        <td data-name="certificates" <?= $Page->certificates->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_certificates">
<span<?= $Page->certificates->viewAttributes() ?>>
<?= $Page->certificates->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_others->Visible) { // others ?>
        <td data-name="_others" <?= $Page->_others->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree__others">
<span<?= $Page->_others->viewAttributes() ?>>
<?= $Page->_others->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Page->createdby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_createdby">
<span<?= $Page->createdby->viewAttributes() ?>>
<?= $Page->createdby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_createddatetime">
<span<?= $Page->createddatetime->viewAttributes() ?>>
<?= $Page->createddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_modifiedby">
<span<?= $Page->modifiedby->viewAttributes() ?>>
<?= $Page->modifiedby->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_has_degree_modifieddatetime">
<span<?= $Page->modifieddatetime->viewAttributes() ?>>
<?= $Page->modifieddatetime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php
    }
    if (!$Page->isGridAdd()) {
        $Page->Recordset->moveNext();
    }
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$Page->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Page->Recordset) {
    $Page->Recordset->close();
}
?>
<?php if (!$Page->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl() ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Page->TotalRecords == 0 && !$Page->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
<?php if (!$Page->isExport()) { ?>
<script>
// Field event handlers
loadjs.ready("head", function() {
    ew.addEventHandlers("employee_has_degree");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

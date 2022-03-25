<?php

namespace PHPMaker2021\HIMS;

// Page object
$DoctorsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fdoctorslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fdoctorslist = currentForm = new ew.Form("fdoctorslist", "list");
    fdoctorslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fdoctorslist");
});
var fdoctorslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fdoctorslistsrch = currentSearchForm = new ew.Form("fdoctorslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "doctors")) ?>,
        fields = currentTable.fields;
    fdoctorslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["CODE", [], fields.CODE.isInvalid],
        ["NAME", [], fields.NAME.isInvalid],
        ["DEPARTMENT", [], fields.DEPARTMENT.isInvalid],
        ["start_time", [], fields.start_time.isInvalid],
        ["end_time", [], fields.end_time.isInvalid],
        ["start_time1", [], fields.start_time1.isInvalid],
        ["end_time1", [], fields.end_time1.isInvalid],
        ["start_time2", [], fields.start_time2.isInvalid],
        ["end_time2", [], fields.end_time2.isInvalid],
        ["slot_time", [], fields.slot_time.isInvalid],
        ["Fees", [], fields.Fees.isInvalid],
        ["slot_days", [], fields.slot_days.isInvalid],
        ["Status", [], fields.Status.isInvalid],
        ["scheduler_id", [], fields.scheduler_id.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["Designation", [], fields.Designation.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fdoctorslistsrch.setInvalid();
    });

    // Validate form
    fdoctorslistsrch.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj),
            rowIndex = "";
        $fobj.data("rowindex", rowIndex);

        // Validate fields
        if (!this.validateFields(rowIndex))
            return false;

        // Call Form_CustomValidate event
        if (!this.customValidate(fobj)) {
            this.focus();
            return false;
        }
        return true;
    }

    // Form_CustomValidate
    fdoctorslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fdoctorslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fdoctorslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fdoctorslistsrch");
});
</script>
<style type="text/css">
.ew-table-preview-row { /* main table preview row color */
    background-color: #FFFFFF; /* preview row color */
}
.ew-table-preview-row .ew-grid {
    display: table;
}
</style>
<div id="ew-preview" class="d-none"><!-- preview -->
    <div class="ew-nav-tabs"><!-- .ew-nav-tabs -->
        <ul class="nav nav-tabs"></ul>
        <div class="tab-content"><!-- .tab-content -->
            <div class="tab-pane fade active show"></div>
        </div><!-- /.tab-content -->
    </div><!-- /.ew-nav-tabs -->
</div><!-- /preview -->
<script>
loadjs.ready("head", function() {
    ew.PREVIEW_PLACEMENT = ew.CSS_FLIP ? "left" : "right";
    ew.PREVIEW_SINGLE_ROW = false;
    ew.PREVIEW_OVERLAY = false;
    loadjs(ew.PATH_BASE + "js/ewpreview.js", "preview");
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
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fdoctorslistsrch" id="fdoctorslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fdoctorslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="doctors">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DEPARTMENT" class="ew-cell form-group">
        <label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?= $Page->DEPARTMENT->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
        <span id="el_doctors_DEPARTMENT" class="ew-search-field">
<input type="<?= $Page->DEPARTMENT->getInputTextType() ?>" data-table="doctors" data-field="x_DEPARTMENT" name="x_DEPARTMENT" id="x_DEPARTMENT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>" value="<?= $Page->DEPARTMENT->EditValue ?>"<?= $Page->DEPARTMENT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
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
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> doctors">
<?php if (!$Page->isExport()) { ?>
<div class="card-header ew-grid-upper-panel">
<?php if (!$Page->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
<?= $Page->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $Page->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
<form name="fdoctorslist" id="fdoctorslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="doctors">
<div id="gmp_doctors" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_doctorslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_doctors_id" class="doctors_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th data-name="CODE" class="<?= $Page->CODE->headerCellClass() ?>"><div id="elh_doctors_CODE" class="doctors_CODE"><?= $Page->renderSort($Page->CODE) ?></div></th>
<?php } ?>
<?php if ($Page->NAME->Visible) { // NAME ?>
        <th data-name="NAME" class="<?= $Page->NAME->headerCellClass() ?>"><div id="elh_doctors_NAME" class="doctors_NAME"><?= $Page->renderSort($Page->NAME) ?></div></th>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th data-name="DEPARTMENT" class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><div id="elh_doctors_DEPARTMENT" class="doctors_DEPARTMENT"><?= $Page->renderSort($Page->DEPARTMENT) ?></div></th>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
        <th data-name="start_time" class="<?= $Page->start_time->headerCellClass() ?>"><div id="elh_doctors_start_time" class="doctors_start_time"><?= $Page->renderSort($Page->start_time) ?></div></th>
<?php } ?>
<?php if ($Page->end_time->Visible) { // end_time ?>
        <th data-name="end_time" class="<?= $Page->end_time->headerCellClass() ?>"><div id="elh_doctors_end_time" class="doctors_end_time"><?= $Page->renderSort($Page->end_time) ?></div></th>
<?php } ?>
<?php if ($Page->start_time1->Visible) { // start_time1 ?>
        <th data-name="start_time1" class="<?= $Page->start_time1->headerCellClass() ?>"><div id="elh_doctors_start_time1" class="doctors_start_time1"><?= $Page->renderSort($Page->start_time1) ?></div></th>
<?php } ?>
<?php if ($Page->end_time1->Visible) { // end_time1 ?>
        <th data-name="end_time1" class="<?= $Page->end_time1->headerCellClass() ?>"><div id="elh_doctors_end_time1" class="doctors_end_time1"><?= $Page->renderSort($Page->end_time1) ?></div></th>
<?php } ?>
<?php if ($Page->start_time2->Visible) { // start_time2 ?>
        <th data-name="start_time2" class="<?= $Page->start_time2->headerCellClass() ?>"><div id="elh_doctors_start_time2" class="doctors_start_time2"><?= $Page->renderSort($Page->start_time2) ?></div></th>
<?php } ?>
<?php if ($Page->end_time2->Visible) { // end_time2 ?>
        <th data-name="end_time2" class="<?= $Page->end_time2->headerCellClass() ?>"><div id="elh_doctors_end_time2" class="doctors_end_time2"><?= $Page->renderSort($Page->end_time2) ?></div></th>
<?php } ?>
<?php if ($Page->slot_time->Visible) { // slot_time ?>
        <th data-name="slot_time" class="<?= $Page->slot_time->headerCellClass() ?>"><div id="elh_doctors_slot_time" class="doctors_slot_time"><?= $Page->renderSort($Page->slot_time) ?></div></th>
<?php } ?>
<?php if ($Page->Fees->Visible) { // Fees ?>
        <th data-name="Fees" class="<?= $Page->Fees->headerCellClass() ?>"><div id="elh_doctors_Fees" class="doctors_Fees"><?= $Page->renderSort($Page->Fees) ?></div></th>
<?php } ?>
<?php if ($Page->slot_days->Visible) { // slot_days ?>
        <th data-name="slot_days" class="<?= $Page->slot_days->headerCellClass() ?>"><div id="elh_doctors_slot_days" class="doctors_slot_days"><?= $Page->renderSort($Page->slot_days) ?></div></th>
<?php } ?>
<?php if ($Page->Status->Visible) { // Status ?>
        <th data-name="Status" class="<?= $Page->Status->headerCellClass() ?>"><div id="elh_doctors_Status" class="doctors_Status"><?= $Page->renderSort($Page->Status) ?></div></th>
<?php } ?>
<?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <th data-name="scheduler_id" class="<?= $Page->scheduler_id->headerCellClass() ?>"><div id="elh_doctors_scheduler_id" class="doctors_scheduler_id"><?= $Page->renderSort($Page->scheduler_id) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_doctors_HospID" class="doctors_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->Designation->Visible) { // Designation ?>
        <th data-name="Designation" class="<?= $Page->Designation->headerCellClass() ?>"><div id="elh_doctors_Designation" class="doctors_Designation"><?= $Page->renderSort($Page->Designation) ?></div></th>
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
            $Page->loadRowValues(); // Load default values
            $Page->OldKey = "";
            $Page->setKey($Page->OldKey);
        } else {
            $Page->loadRowValues($Page->Recordset); // Load row values
            if ($Page->isGridEdit()) {
                $Page->OldKey = $Page->getKey(true); // Get from CurrentValue
                $Page->setKey($Page->OldKey);
            }
        }
        $Page->RowType = ROWTYPE_VIEW; // Render view

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_doctors", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_doctors_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->CODE->Visible) { // CODE ?>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->NAME->Visible) { // NAME ?>
        <td data-name="NAME" <?= $Page->NAME->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_NAME">
<span<?= $Page->NAME->viewAttributes() ?>>
<?= $Page->NAME->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" <?= $Page->DEPARTMENT->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->start_time->Visible) { // start_time ?>
        <td data-name="start_time" <?= $Page->start_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_start_time">
<span<?= $Page->start_time->viewAttributes() ?>>
<?= $Page->start_time->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->end_time->Visible) { // end_time ?>
        <td data-name="end_time" <?= $Page->end_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_end_time">
<span<?= $Page->end_time->viewAttributes() ?>>
<?= $Page->end_time->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->start_time1->Visible) { // start_time1 ?>
        <td data-name="start_time1" <?= $Page->start_time1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_start_time1">
<span<?= $Page->start_time1->viewAttributes() ?>>
<?= $Page->start_time1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->end_time1->Visible) { // end_time1 ?>
        <td data-name="end_time1" <?= $Page->end_time1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_end_time1">
<span<?= $Page->end_time1->viewAttributes() ?>>
<?= $Page->end_time1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->start_time2->Visible) { // start_time2 ?>
        <td data-name="start_time2" <?= $Page->start_time2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_start_time2">
<span<?= $Page->start_time2->viewAttributes() ?>>
<?= $Page->start_time2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->end_time2->Visible) { // end_time2 ?>
        <td data-name="end_time2" <?= $Page->end_time2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_end_time2">
<span<?= $Page->end_time2->viewAttributes() ?>>
<?= $Page->end_time2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->slot_time->Visible) { // slot_time ?>
        <td data-name="slot_time" <?= $Page->slot_time->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_slot_time">
<span<?= $Page->slot_time->viewAttributes() ?>>
<?= $Page->slot_time->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Fees->Visible) { // Fees ?>
        <td data-name="Fees" <?= $Page->Fees->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_Fees">
<span<?= $Page->Fees->viewAttributes() ?>>
<?= $Page->Fees->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->slot_days->Visible) { // slot_days ?>
        <td data-name="slot_days" <?= $Page->slot_days->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_slot_days">
<span<?= $Page->slot_days->viewAttributes() ?>>
<?= $Page->slot_days->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Status->Visible) { // Status ?>
        <td data-name="Status" <?= $Page->Status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_Status">
<span<?= $Page->Status->viewAttributes() ?>>
<?= $Page->Status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->scheduler_id->Visible) { // scheduler_id ?>
        <td data-name="scheduler_id" <?= $Page->scheduler_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_scheduler_id">
<span<?= $Page->scheduler_id->viewAttributes() ?>>
<?= $Page->scheduler_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Designation->Visible) { // Designation ?>
        <td data-name="Designation" <?= $Page->Designation->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_doctors_Designation">
<span<?= $Page->Designation->viewAttributes() ?>>
<?= $Page->Designation->getViewValue() ?></span>
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
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?= CurrentPageUrl(false) ?>">
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
    ew.addEventHandlers("doctors");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_doctors",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

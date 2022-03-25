<?php

namespace PHPMaker2021\project3;

// Page object
$ViewAppointmentList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_appointmentlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_appointmentlist = currentForm = new ew.Form("fview_appointmentlist", "list");
    fview_appointmentlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_appointmentlist");
});
var fview_appointmentlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_appointmentlistsrch = currentSearchForm = new ew.Form("fview_appointmentlistsrch");

    // Dynamic selection lists

    // Filters
    fview_appointmentlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_appointmentlistsrch");
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
<form name="fview_appointmentlistsrch" id="fview_appointmentlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl() ?>">
<div id="fview_appointmentlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_appointment">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment">
<form name="fview_appointmentlist" id="fview_appointmentlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment">
<div id="gmp_view_appointment" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_appointmentlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->PId->Visible) { // PId ?>
        <th data-name="PId" class="<?= $Page->PId->headerCellClass() ?>"><div id="elh_view_appointment_PId" class="view_appointment_PId"><?= $Page->renderSort($Page->PId) ?></div></th>
<?php } ?>
<?php if ($Page->patientID->Visible) { // patientID ?>
        <th data-name="patientID" class="<?= $Page->patientID->headerCellClass() ?>"><div id="elh_view_appointment_patientID" class="view_appointment_patientID"><?= $Page->renderSort($Page->patientID) ?></div></th>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <th data-name="patientName" class="<?= $Page->patientName->headerCellClass() ?>"><div id="elh_view_appointment_patientName" class="view_appointment_patientName"><?= $Page->renderSort($Page->patientName) ?></div></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Page->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_MobileNumber" class="view_appointment_MobileNumber"><?= $Page->renderSort($Page->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <th data-name="Referal" class="<?= $Page->Referal->headerCellClass() ?>"><div id="elh_view_appointment_Referal" class="view_appointment_Referal"><?= $Page->renderSort($Page->Referal) ?></div></th>
<?php } ?>
<?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
        <th data-name="createdDateTime" class="<?= $Page->createdDateTime->headerCellClass() ?>"><div id="elh_view_appointment_createdDateTime" class="view_appointment_createdDateTime"><?= $Page->renderSort($Page->createdDateTime) ?></div></th>
<?php } ?>
<?php if ($Page->_App->Visible) { // App ?>
        <th data-name="_App" class="<?= $Page->_App->headerCellClass() ?>"><div id="elh_view_appointment__App" class="view_appointment__App"><?= $Page->renderSort($Page->_App) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_appointment_HospID" class="view_appointment_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_appointment", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->PId->Visible) { // PId ?>
        <td data-name="PId" <?= $Page->PId->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<?= $Page->PId->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patientID->Visible) { // patientID ?>
        <td data-name="patientID" <?= $Page->patientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patientName->Visible) { // patientName ?>
        <td data-name="patientName" <?= $Page->patientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Referal->Visible) { // Referal ?>
        <td data-name="Referal" <?= $Page->Referal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->createdDateTime->Visible) { // createdDateTime ?>
        <td data-name="createdDateTime" <?= $Page->createdDateTime->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_createdDateTime">
<span<?= $Page->createdDateTime->viewAttributes() ?>>
<?= $Page->createdDateTime->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->_App->Visible) { // App ?>
        <td data-name="_App" <?= $Page->_App->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment__App">
<span<?= $Page->_App->viewAttributes() ?>>
<?= $Page->_App->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_appointment_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
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
    ew.addEventHandlers("view_appointment");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
<?php } ?>

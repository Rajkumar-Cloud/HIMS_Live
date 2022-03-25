<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewDoctorNotesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_doctor_noteslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_doctor_noteslist = currentForm = new ew.Form("fview_doctor_noteslist", "list");
    fview_doctor_noteslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fview_doctor_noteslist");
});
var fview_doctor_noteslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_doctor_noteslistsrch = currentSearchForm = new ew.Form("fview_doctor_noteslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_doctor_notes")) ?>,
        fields = currentTable.fields;
    fview_doctor_noteslistsrch.addFields([
        ["patientID", [], fields.patientID.isInvalid],
        ["patientName", [], fields.patientName.isInvalid],
        ["DoctorName", [], fields.DoctorName.isInvalid],
        ["Referal", [], fields.Referal.isInvalid],
        ["PatientTypee", [], fields.PatientTypee.isInvalid],
        ["procedurenotes", [], fields.procedurenotes.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["Created", [], fields.Created.isInvalid],
        ["y_Created", [ew.Validators.between], false],
        ["Started", [], fields.Started.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_doctor_noteslistsrch.setInvalid();
    });

    // Validate form
    fview_doctor_noteslistsrch.validate = function () {
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
    fview_doctor_noteslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_doctor_noteslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_doctor_noteslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_doctor_noteslistsrch");
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
<form name="fview_doctor_noteslistsrch" id="fview_doctor_noteslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_doctor_noteslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_doctor_notes">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->patientID->Visible) { // patientID ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_patientID" class="ew-cell form-group">
        <label for="x_patientID" class="ew-search-caption ew-label"><?= $Page->patientID->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientID" id="z_patientID" value="LIKE">
</span>
        <span id="el_view_doctor_notes_patientID" class="ew-search-field">
<input type="<?= $Page->patientID->getInputTextType() ?>" data-table="view_doctor_notes" data-field="x_patientID" name="x_patientID" id="x_patientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientID->getPlaceHolder()) ?>" value="<?= $Page->patientID->EditValue ?>"<?= $Page->patientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientID->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_patientName" class="ew-cell form-group">
        <label for="x_patientName" class="ew-search-caption ew-label"><?= $Page->patientName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientName" id="z_patientName" value="LIKE">
</span>
        <span id="el_view_doctor_notes_patientName" class="ew-search-field">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_doctor_notes" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DoctorName" class="ew-cell form-group">
        <label for="x_DoctorName" class="ew-search-caption ew-label"><?= $Page->DoctorName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE">
</span>
        <span id="el_view_doctor_notes_DoctorName" class="ew-search-field">
<input type="<?= $Page->DoctorName->getInputTextType() ?>" data-table="view_doctor_notes" data-field="x_DoctorName" name="x_DoctorName" id="x_DoctorName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DoctorName->getPlaceHolder()) ?>" value="<?= $Page->DoctorName->EditValue ?>"<?= $Page->DoctorName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Referal" class="ew-cell form-group">
        <label for="x_Referal" class="ew-search-caption ew-label"><?= $Page->Referal->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Referal" id="z_Referal" value="LIKE">
</span>
        <span id="el_view_doctor_notes_Referal" class="ew-search-field">
<input type="<?= $Page->Referal->getInputTextType() ?>" data-table="view_doctor_notes" data-field="x_Referal" name="x_Referal" id="x_Referal" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>" value="<?= $Page->Referal->EditValue ?>"<?= $Page->Referal->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Referal->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_doctor_notes">
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
<form name="fview_doctor_noteslist" id="fview_doctor_noteslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_doctor_notes">
<div id="gmp_view_doctor_notes" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_doctor_noteslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->patientID->Visible) { // patientID ?>
        <th data-name="patientID" class="<?= $Page->patientID->headerCellClass() ?>"><div id="elh_view_doctor_notes_patientID" class="view_doctor_notes_patientID"><?= $Page->renderSort($Page->patientID) ?></div></th>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <th data-name="patientName" class="<?= $Page->patientName->headerCellClass() ?>"><div id="elh_view_doctor_notes_patientName" class="view_doctor_notes_patientName"><?= $Page->renderSort($Page->patientName) ?></div></th>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <th data-name="DoctorName" class="<?= $Page->DoctorName->headerCellClass() ?>"><div id="elh_view_doctor_notes_DoctorName" class="view_doctor_notes_DoctorName"><?= $Page->renderSort($Page->DoctorName) ?></div></th>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <th data-name="Referal" class="<?= $Page->Referal->headerCellClass() ?>"><div id="elh_view_doctor_notes_Referal" class="view_doctor_notes_Referal"><?= $Page->renderSort($Page->Referal) ?></div></th>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <th data-name="PatientTypee" class="<?= $Page->PatientTypee->headerCellClass() ?>"><div id="elh_view_doctor_notes_PatientTypee" class="view_doctor_notes_PatientTypee"><?= $Page->renderSort($Page->PatientTypee) ?></div></th>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
        <th data-name="procedurenotes" class="<?= $Page->procedurenotes->headerCellClass() ?>"><div id="elh_view_doctor_notes_procedurenotes" class="view_doctor_notes_procedurenotes"><?= $Page->renderSort($Page->procedurenotes) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_doctor_notes_HospID" class="view_doctor_notes_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->Created->Visible) { // Created ?>
        <th data-name="Created" class="<?= $Page->Created->headerCellClass() ?>"><div id="elh_view_doctor_notes_Created" class="view_doctor_notes_Created"><?= $Page->renderSort($Page->Created) ?></div></th>
<?php } ?>
<?php if ($Page->Started->Visible) { // Started ?>
        <th data-name="Started" class="<?= $Page->Started->headerCellClass() ?>"><div id="elh_view_doctor_notes_Started" class="view_doctor_notes_Started"><?= $Page->renderSort($Page->Started) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_doctor_notes", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->patientID->Visible) { // patientID ?>
        <td data-name="patientID" <?= $Page->patientID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->patientName->Visible) { // patientName ?>
        <td data-name="patientName" <?= $Page->patientName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <td data-name="DoctorName" <?= $Page->DoctorName->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_DoctorName">
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Referal->Visible) { // Referal ?>
        <td data-name="Referal" <?= $Page->Referal->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <td data-name="PatientTypee" <?= $Page->PatientTypee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_PatientTypee">
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
        <td data-name="procedurenotes" <?= $Page->procedurenotes->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_procedurenotes">
<span<?= $Page->procedurenotes->viewAttributes() ?>>
<?= $Page->procedurenotes->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Created->Visible) { // Created ?>
        <td data-name="Created" <?= $Page->Created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_Created">
<span<?= $Page->Created->viewAttributes() ?>>
<?= $Page->Created->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Started->Visible) { // Started ?>
        <td data-name="Started" <?= $Page->Started->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_view_doctor_notes_Started">
<span<?= $Page->Started->viewAttributes() ?>>
<?= $Page->Started->getViewValue() ?></span>
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
    ew.addEventHandlers("view_doctor_notes");
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
        container: "gmp_view_doctor_notes",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

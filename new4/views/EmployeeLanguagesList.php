<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeLanguagesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_languageslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_languageslist = currentForm = new ew.Form("femployee_languageslist", "list");
    femployee_languageslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("femployee_languageslist");
});
var femployee_languageslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_languageslistsrch = currentSearchForm = new ew.Form("femployee_languageslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_languages")) ?>,
        fields = currentTable.fields;
    femployee_languageslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["language_id", [], fields.language_id.isInvalid],
        ["employee", [], fields.employee.isInvalid],
        ["reading", [], fields.reading.isInvalid],
        ["speaking", [], fields.speaking.isInvalid],
        ["writing", [], fields.writing.isInvalid],
        ["understanding", [], fields.understanding.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        femployee_languageslistsrch.setInvalid();
    });

    // Validate form
    femployee_languageslistsrch.validate = function () {
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
    femployee_languageslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_languageslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_languageslistsrch.lists.reading = <?= $Page->reading->toClientList($Page) ?>;
    femployee_languageslistsrch.lists.speaking = <?= $Page->speaking->toClientList($Page) ?>;
    femployee_languageslistsrch.lists.writing = <?= $Page->writing->toClientList($Page) ?>;
    femployee_languageslistsrch.lists.understanding = <?= $Page->understanding->toClientList($Page) ?>;

    // Filters
    femployee_languageslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_languageslistsrch");
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
<form name="femployee_languageslistsrch" id="femployee_languageslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployee_languageslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_languages">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->reading->Visible) { // reading ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_reading" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->reading->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_reading" id="z_reading" value="=">
</span>
        <span id="el_employee_languages_reading" class="ew-search-field">
<template id="tp_x_reading">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_languages" data-field="x_reading" name="x_reading" id="x_reading"<?= $Page->reading->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_reading" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_reading"
    name="x_reading"
    value="<?= HtmlEncode($Page->reading->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_reading"
    data-target="dsl_x_reading"
    data-repeatcolumn="5"
    class="form-control<?= $Page->reading->isInvalidClass() ?>"
    data-table="employee_languages"
    data-field="x_reading"
    data-value-separator="<?= $Page->reading->displayValueSeparatorAttribute() ?>"
    <?= $Page->reading->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->reading->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->speaking->Visible) { // speaking ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_speaking" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->speaking->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_speaking" id="z_speaking" value="=">
</span>
        <span id="el_employee_languages_speaking" class="ew-search-field">
<template id="tp_x_speaking">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_languages" data-field="x_speaking" name="x_speaking" id="x_speaking"<?= $Page->speaking->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_speaking" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_speaking"
    name="x_speaking"
    value="<?= HtmlEncode($Page->speaking->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_speaking"
    data-target="dsl_x_speaking"
    data-repeatcolumn="5"
    class="form-control<?= $Page->speaking->isInvalidClass() ?>"
    data-table="employee_languages"
    data-field="x_speaking"
    data-value-separator="<?= $Page->speaking->displayValueSeparatorAttribute() ?>"
    <?= $Page->speaking->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->speaking->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->writing->Visible) { // writing ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_writing" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->writing->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_writing" id="z_writing" value="=">
</span>
        <span id="el_employee_languages_writing" class="ew-search-field">
<template id="tp_x_writing">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_languages" data-field="x_writing" name="x_writing" id="x_writing"<?= $Page->writing->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_writing" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_writing"
    name="x_writing"
    value="<?= HtmlEncode($Page->writing->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_writing"
    data-target="dsl_x_writing"
    data-repeatcolumn="5"
    class="form-control<?= $Page->writing->isInvalidClass() ?>"
    data-table="employee_languages"
    data-field="x_writing"
    data-value-separator="<?= $Page->writing->displayValueSeparatorAttribute() ?>"
    <?= $Page->writing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->writing->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->understanding->Visible) { // understanding ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_understanding" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->understanding->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_understanding" id="z_understanding" value="=">
</span>
        <span id="el_employee_languages_understanding" class="ew-search-field">
<template id="tp_x_understanding">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_languages" data-field="x_understanding" name="x_understanding" id="x_understanding"<?= $Page->understanding->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_understanding" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_understanding"
    name="x_understanding"
    value="<?= HtmlEncode($Page->understanding->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_understanding"
    data-target="dsl_x_understanding"
    data-repeatcolumn="5"
    class="form-control<?= $Page->understanding->isInvalidClass() ?>"
    data-table="employee_languages"
    data-field="x_understanding"
    data-value-separator="<?= $Page->understanding->displayValueSeparatorAttribute() ?>"
    <?= $Page->understanding->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->understanding->getErrorMessage(false) ?></div>
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
    <button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?= $Language->phrase("SearchBtn") ?></button>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_languages">
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
<form name="femployee_languageslist" id="femployee_languageslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_languages">
<div id="gmp_employee_languages" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_languageslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_languages_id" class="employee_languages_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->language_id->Visible) { // language_id ?>
        <th data-name="language_id" class="<?= $Page->language_id->headerCellClass() ?>"><div id="elh_employee_languages_language_id" class="employee_languages_language_id"><?= $Page->renderSort($Page->language_id) ?></div></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th data-name="employee" class="<?= $Page->employee->headerCellClass() ?>"><div id="elh_employee_languages_employee" class="employee_languages_employee"><?= $Page->renderSort($Page->employee) ?></div></th>
<?php } ?>
<?php if ($Page->reading->Visible) { // reading ?>
        <th data-name="reading" class="<?= $Page->reading->headerCellClass() ?>"><div id="elh_employee_languages_reading" class="employee_languages_reading"><?= $Page->renderSort($Page->reading) ?></div></th>
<?php } ?>
<?php if ($Page->speaking->Visible) { // speaking ?>
        <th data-name="speaking" class="<?= $Page->speaking->headerCellClass() ?>"><div id="elh_employee_languages_speaking" class="employee_languages_speaking"><?= $Page->renderSort($Page->speaking) ?></div></th>
<?php } ?>
<?php if ($Page->writing->Visible) { // writing ?>
        <th data-name="writing" class="<?= $Page->writing->headerCellClass() ?>"><div id="elh_employee_languages_writing" class="employee_languages_writing"><?= $Page->renderSort($Page->writing) ?></div></th>
<?php } ?>
<?php if ($Page->understanding->Visible) { // understanding ?>
        <th data-name="understanding" class="<?= $Page->understanding->headerCellClass() ?>"><div id="elh_employee_languages_understanding" class="employee_languages_understanding"><?= $Page->renderSort($Page->understanding) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_languages", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_employee_languages_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->language_id->Visible) { // language_id ?>
        <td data-name="language_id" <?= $Page->language_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_language_id">
<span<?= $Page->language_id->viewAttributes() ?>>
<?= $Page->language_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->employee->Visible) { // employee ?>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->reading->Visible) { // reading ?>
        <td data-name="reading" <?= $Page->reading->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_reading">
<span<?= $Page->reading->viewAttributes() ?>>
<?= $Page->reading->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->speaking->Visible) { // speaking ?>
        <td data-name="speaking" <?= $Page->speaking->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_speaking">
<span<?= $Page->speaking->viewAttributes() ?>>
<?= $Page->speaking->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->writing->Visible) { // writing ?>
        <td data-name="writing" <?= $Page->writing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_writing">
<span<?= $Page->writing->viewAttributes() ?>>
<?= $Page->writing->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->understanding->Visible) { // understanding ?>
        <td data-name="understanding" <?= $Page->understanding->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_languages_understanding">
<span<?= $Page->understanding->viewAttributes() ?>>
<?= $Page->understanding->getViewValue() ?></span>
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
    ew.addEventHandlers("employee_languages");
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
        container: "gmp_employee_languages",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

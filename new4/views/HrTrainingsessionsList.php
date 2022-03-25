<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrTrainingsessionsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhr_trainingsessionslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fhr_trainingsessionslist = currentForm = new ew.Form("fhr_trainingsessionslist", "list");
    fhr_trainingsessionslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fhr_trainingsessionslist");
});
var fhr_trainingsessionslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fhr_trainingsessionslistsrch = currentSearchForm = new ew.Form("fhr_trainingsessionslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_trainingsessions")) ?>,
        fields = currentTable.fields;
    fhr_trainingsessionslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["course", [], fields.course.isInvalid],
        ["scheduled", [], fields.scheduled.isInvalid],
        ["dueDate", [], fields.dueDate.isInvalid],
        ["deliveryMethod", [], fields.deliveryMethod.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["attendanceType", [], fields.attendanceType.isInvalid],
        ["created", [], fields.created.isInvalid],
        ["updated", [], fields.updated.isInvalid],
        ["requireProof", [], fields.requireProof.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fhr_trainingsessionslistsrch.setInvalid();
    });

    // Validate form
    fhr_trainingsessionslistsrch.validate = function () {
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
    fhr_trainingsessionslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_trainingsessionslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhr_trainingsessionslistsrch.lists.deliveryMethod = <?= $Page->deliveryMethod->toClientList($Page) ?>;
    fhr_trainingsessionslistsrch.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fhr_trainingsessionslistsrch.lists.attendanceType = <?= $Page->attendanceType->toClientList($Page) ?>;
    fhr_trainingsessionslistsrch.lists.requireProof = <?= $Page->requireProof->toClientList($Page) ?>;

    // Filters
    fhr_trainingsessionslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fhr_trainingsessionslistsrch");
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
<form name="fhr_trainingsessionslistsrch" id="fhr_trainingsessionslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fhr_trainingsessionslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_trainingsessions">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->deliveryMethod->Visible) { // deliveryMethod ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_deliveryMethod" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->deliveryMethod->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_deliveryMethod" id="z_deliveryMethod" value="=">
</span>
        <span id="el_hr_trainingsessions_deliveryMethod" class="ew-search-field">
<template id="tp_x_deliveryMethod">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_trainingsessions" data-field="x_deliveryMethod" name="x_deliveryMethod" id="x_deliveryMethod"<?= $Page->deliveryMethod->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_deliveryMethod" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_deliveryMethod"
    name="x_deliveryMethod"
    value="<?= HtmlEncode($Page->deliveryMethod->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_deliveryMethod"
    data-target="dsl_x_deliveryMethod"
    data-repeatcolumn="5"
    class="form-control<?= $Page->deliveryMethod->isInvalidClass() ?>"
    data-table="hr_trainingsessions"
    data-field="x_deliveryMethod"
    data-value-separator="<?= $Page->deliveryMethod->displayValueSeparatorAttribute() ?>"
    <?= $Page->deliveryMethod->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->deliveryMethod->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_status" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->status->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_status" id="z_status" value="=">
</span>
        <span id="el_hr_trainingsessions_status" class="ew-search-field">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_trainingsessions" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_status" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_status"
    name="x_status"
    value="<?= HtmlEncode($Page->status->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_status"
    data-target="dsl_x_status"
    data-repeatcolumn="5"
    class="form-control<?= $Page->status->isInvalidClass() ?>"
    data-table="hr_trainingsessions"
    data-field="x_status"
    data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
    <?= $Page->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->attendanceType->Visible) { // attendanceType ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_attendanceType" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->attendanceType->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_attendanceType" id="z_attendanceType" value="=">
</span>
        <span id="el_hr_trainingsessions_attendanceType" class="ew-search-field">
<template id="tp_x_attendanceType">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_trainingsessions" data-field="x_attendanceType" name="x_attendanceType" id="x_attendanceType"<?= $Page->attendanceType->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_attendanceType" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_attendanceType"
    name="x_attendanceType"
    value="<?= HtmlEncode($Page->attendanceType->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_attendanceType"
    data-target="dsl_x_attendanceType"
    data-repeatcolumn="5"
    class="form-control<?= $Page->attendanceType->isInvalidClass() ?>"
    data-table="hr_trainingsessions"
    data-field="x_attendanceType"
    data-value-separator="<?= $Page->attendanceType->displayValueSeparatorAttribute() ?>"
    <?= $Page->attendanceType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->attendanceType->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->requireProof->Visible) { // requireProof ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_requireProof" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->requireProof->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_requireProof" id="z_requireProof" value="=">
</span>
        <span id="el_hr_trainingsessions_requireProof" class="ew-search-field">
<template id="tp_x_requireProof">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_trainingsessions" data-field="x_requireProof" name="x_requireProof" id="x_requireProof"<?= $Page->requireProof->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_requireProof" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_requireProof"
    name="x_requireProof"
    value="<?= HtmlEncode($Page->requireProof->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_requireProof"
    data-target="dsl_x_requireProof"
    data-repeatcolumn="5"
    class="form-control<?= $Page->requireProof->isInvalidClass() ?>"
    data-table="hr_trainingsessions"
    data-field="x_requireProof"
    data-value-separator="<?= $Page->requireProof->displayValueSeparatorAttribute() ?>"
    <?= $Page->requireProof->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->requireProof->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_trainingsessions">
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
<form name="fhr_trainingsessionslist" id="fhr_trainingsessionslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_trainingsessions">
<div id="gmp_hr_trainingsessions" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_hr_trainingsessionslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_hr_trainingsessions_id" class="hr_trainingsessions_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->course->Visible) { // course ?>
        <th data-name="course" class="<?= $Page->course->headerCellClass() ?>"><div id="elh_hr_trainingsessions_course" class="hr_trainingsessions_course"><?= $Page->renderSort($Page->course) ?></div></th>
<?php } ?>
<?php if ($Page->scheduled->Visible) { // scheduled ?>
        <th data-name="scheduled" class="<?= $Page->scheduled->headerCellClass() ?>"><div id="elh_hr_trainingsessions_scheduled" class="hr_trainingsessions_scheduled"><?= $Page->renderSort($Page->scheduled) ?></div></th>
<?php } ?>
<?php if ($Page->dueDate->Visible) { // dueDate ?>
        <th data-name="dueDate" class="<?= $Page->dueDate->headerCellClass() ?>"><div id="elh_hr_trainingsessions_dueDate" class="hr_trainingsessions_dueDate"><?= $Page->renderSort($Page->dueDate) ?></div></th>
<?php } ?>
<?php if ($Page->deliveryMethod->Visible) { // deliveryMethod ?>
        <th data-name="deliveryMethod" class="<?= $Page->deliveryMethod->headerCellClass() ?>"><div id="elh_hr_trainingsessions_deliveryMethod" class="hr_trainingsessions_deliveryMethod"><?= $Page->renderSort($Page->deliveryMethod) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_hr_trainingsessions_status" class="hr_trainingsessions_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->attendanceType->Visible) { // attendanceType ?>
        <th data-name="attendanceType" class="<?= $Page->attendanceType->headerCellClass() ?>"><div id="elh_hr_trainingsessions_attendanceType" class="hr_trainingsessions_attendanceType"><?= $Page->renderSort($Page->attendanceType) ?></div></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th data-name="created" class="<?= $Page->created->headerCellClass() ?>"><div id="elh_hr_trainingsessions_created" class="hr_trainingsessions_created"><?= $Page->renderSort($Page->created) ?></div></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th data-name="updated" class="<?= $Page->updated->headerCellClass() ?>"><div id="elh_hr_trainingsessions_updated" class="hr_trainingsessions_updated"><?= $Page->renderSort($Page->updated) ?></div></th>
<?php } ?>
<?php if ($Page->requireProof->Visible) { // requireProof ?>
        <th data-name="requireProof" class="<?= $Page->requireProof->headerCellClass() ?>"><div id="elh_hr_trainingsessions_requireProof" class="hr_trainingsessions_requireProof"><?= $Page->renderSort($Page->requireProof) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_hr_trainingsessions", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->course->Visible) { // course ?>
        <td data-name="course" <?= $Page->course->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_course">
<span<?= $Page->course->viewAttributes() ?>>
<?= $Page->course->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->scheduled->Visible) { // scheduled ?>
        <td data-name="scheduled" <?= $Page->scheduled->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_scheduled">
<span<?= $Page->scheduled->viewAttributes() ?>>
<?= $Page->scheduled->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->dueDate->Visible) { // dueDate ?>
        <td data-name="dueDate" <?= $Page->dueDate->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_dueDate">
<span<?= $Page->dueDate->viewAttributes() ?>>
<?= $Page->dueDate->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->deliveryMethod->Visible) { // deliveryMethod ?>
        <td data-name="deliveryMethod" <?= $Page->deliveryMethod->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_deliveryMethod">
<span<?= $Page->deliveryMethod->viewAttributes() ?>>
<?= $Page->deliveryMethod->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->attendanceType->Visible) { // attendanceType ?>
        <td data-name="attendanceType" <?= $Page->attendanceType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_attendanceType">
<span<?= $Page->attendanceType->viewAttributes() ?>>
<?= $Page->attendanceType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->created->Visible) { // created ?>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->updated->Visible) { // updated ?>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->requireProof->Visible) { // requireProof ?>
        <td data-name="requireProof" <?= $Page->requireProof->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_trainingsessions_requireProof">
<span<?= $Page->requireProof->viewAttributes() ?>>
<?= $Page->requireProof->getViewValue() ?></span>
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
    ew.addEventHandlers("hr_trainingsessions");
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
        container: "gmp_hr_trainingsessions",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

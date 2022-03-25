<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeImmigrationsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_immigrationslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_immigrationslist = currentForm = new ew.Form("femployee_immigrationslist", "list");
    femployee_immigrationslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("femployee_immigrationslist");
});
var femployee_immigrationslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_immigrationslistsrch = currentSearchForm = new ew.Form("femployee_immigrationslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_immigrations")) ?>,
        fields = currentTable.fields;
    femployee_immigrationslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["employee", [], fields.employee.isInvalid],
        ["document", [], fields.document.isInvalid],
        ["documentname", [], fields.documentname.isInvalid],
        ["valid_until", [], fields.valid_until.isInvalid],
        ["status", [], fields.status.isInvalid],
        ["attachment1", [], fields.attachment1.isInvalid],
        ["attachment2", [], fields.attachment2.isInvalid],
        ["attachment3", [], fields.attachment3.isInvalid],
        ["created", [], fields.created.isInvalid],
        ["updated", [], fields.updated.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        femployee_immigrationslistsrch.setInvalid();
    });

    // Validate form
    femployee_immigrationslistsrch.validate = function () {
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
    femployee_immigrationslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_immigrationslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_immigrationslistsrch.lists.status = <?= $Page->status->toClientList($Page) ?>;

    // Filters
    femployee_immigrationslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_immigrationslistsrch");
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
<form name="femployee_immigrationslistsrch" id="femployee_immigrationslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployee_immigrationslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_immigrations">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
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
        <span id="el_employee_immigrations_status" class="ew-search-field">
<template id="tp_x_status">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_immigrations" data-field="x_status" name="x_status" id="x_status"<?= $Page->status->editAttributes() ?>>
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
    data-table="employee_immigrations"
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_immigrations">
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
<form name="femployee_immigrationslist" id="femployee_immigrationslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_immigrations">
<div id="gmp_employee_immigrations" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_immigrationslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_immigrations_id" class="employee_immigrations_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->employee->Visible) { // employee ?>
        <th data-name="employee" class="<?= $Page->employee->headerCellClass() ?>"><div id="elh_employee_immigrations_employee" class="employee_immigrations_employee"><?= $Page->renderSort($Page->employee) ?></div></th>
<?php } ?>
<?php if ($Page->document->Visible) { // document ?>
        <th data-name="document" class="<?= $Page->document->headerCellClass() ?>"><div id="elh_employee_immigrations_document" class="employee_immigrations_document"><?= $Page->renderSort($Page->document) ?></div></th>
<?php } ?>
<?php if ($Page->documentname->Visible) { // documentname ?>
        <th data-name="documentname" class="<?= $Page->documentname->headerCellClass() ?>"><div id="elh_employee_immigrations_documentname" class="employee_immigrations_documentname"><?= $Page->renderSort($Page->documentname) ?></div></th>
<?php } ?>
<?php if ($Page->valid_until->Visible) { // valid_until ?>
        <th data-name="valid_until" class="<?= $Page->valid_until->headerCellClass() ?>"><div id="elh_employee_immigrations_valid_until" class="employee_immigrations_valid_until"><?= $Page->renderSort($Page->valid_until) ?></div></th>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Page->status->headerCellClass() ?>"><div id="elh_employee_immigrations_status" class="employee_immigrations_status"><?= $Page->renderSort($Page->status) ?></div></th>
<?php } ?>
<?php if ($Page->attachment1->Visible) { // attachment1 ?>
        <th data-name="attachment1" class="<?= $Page->attachment1->headerCellClass() ?>"><div id="elh_employee_immigrations_attachment1" class="employee_immigrations_attachment1"><?= $Page->renderSort($Page->attachment1) ?></div></th>
<?php } ?>
<?php if ($Page->attachment2->Visible) { // attachment2 ?>
        <th data-name="attachment2" class="<?= $Page->attachment2->headerCellClass() ?>"><div id="elh_employee_immigrations_attachment2" class="employee_immigrations_attachment2"><?= $Page->renderSort($Page->attachment2) ?></div></th>
<?php } ?>
<?php if ($Page->attachment3->Visible) { // attachment3 ?>
        <th data-name="attachment3" class="<?= $Page->attachment3->headerCellClass() ?>"><div id="elh_employee_immigrations_attachment3" class="employee_immigrations_attachment3"><?= $Page->renderSort($Page->attachment3) ?></div></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th data-name="created" class="<?= $Page->created->headerCellClass() ?>"><div id="elh_employee_immigrations_created" class="employee_immigrations_created"><?= $Page->renderSort($Page->created) ?></div></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th data-name="updated" class="<?= $Page->updated->headerCellClass() ?>"><div id="elh_employee_immigrations_updated" class="employee_immigrations_updated"><?= $Page->renderSort($Page->updated) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_immigrations", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_employee_immigrations_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->employee->Visible) { // employee ?>
        <td data-name="employee" <?= $Page->employee->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_employee">
<span<?= $Page->employee->viewAttributes() ?>>
<?= $Page->employee->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->document->Visible) { // document ?>
        <td data-name="document" <?= $Page->document->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_document">
<span<?= $Page->document->viewAttributes() ?>>
<?= $Page->document->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->documentname->Visible) { // documentname ?>
        <td data-name="documentname" <?= $Page->documentname->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_documentname">
<span<?= $Page->documentname->viewAttributes() ?>>
<?= $Page->documentname->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->valid_until->Visible) { // valid_until ?>
        <td data-name="valid_until" <?= $Page->valid_until->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_valid_until">
<span<?= $Page->valid_until->viewAttributes() ?>>
<?= $Page->valid_until->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->status->Visible) { // status ?>
        <td data-name="status" <?= $Page->status->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_status">
<span<?= $Page->status->viewAttributes() ?>>
<?= $Page->status->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->attachment1->Visible) { // attachment1 ?>
        <td data-name="attachment1" <?= $Page->attachment1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_attachment1">
<span<?= $Page->attachment1->viewAttributes() ?>>
<?= $Page->attachment1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->attachment2->Visible) { // attachment2 ?>
        <td data-name="attachment2" <?= $Page->attachment2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_attachment2">
<span<?= $Page->attachment2->viewAttributes() ?>>
<?= $Page->attachment2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->attachment3->Visible) { // attachment3 ?>
        <td data-name="attachment3" <?= $Page->attachment3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_attachment3">
<span<?= $Page->attachment3->viewAttributes() ?>>
<?= $Page->attachment3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->created->Visible) { // created ?>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->updated->Visible) { // updated ?>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrations_updated">
<span<?= $Page->updated->viewAttributes() ?>>
<?= $Page->updated->getViewValue() ?></span>
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
    ew.addEventHandlers("employee_immigrations");
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
        container: "gmp_employee_immigrations",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

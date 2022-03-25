<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeeImmigrationdocumentsList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployee_immigrationdocumentslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployee_immigrationdocumentslist = currentForm = new ew.Form("femployee_immigrationdocumentslist", "list");
    femployee_immigrationdocumentslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("femployee_immigrationdocumentslist");
});
var femployee_immigrationdocumentslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployee_immigrationdocumentslistsrch = currentSearchForm = new ew.Form("femployee_immigrationdocumentslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employee_immigrationdocuments")) ?>,
        fields = currentTable.fields;
    femployee_immigrationdocumentslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["name", [], fields.name.isInvalid],
        ["required", [], fields.required.isInvalid],
        ["alert_on_missing", [], fields.alert_on_missing.isInvalid],
        ["alert_before_expiry", [], fields.alert_before_expiry.isInvalid],
        ["alert_before_day_number", [], fields.alert_before_day_number.isInvalid],
        ["created", [], fields.created.isInvalid],
        ["updated", [], fields.updated.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        femployee_immigrationdocumentslistsrch.setInvalid();
    });

    // Validate form
    femployee_immigrationdocumentslistsrch.validate = function () {
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
    femployee_immigrationdocumentslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployee_immigrationdocumentslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployee_immigrationdocumentslistsrch.lists.required = <?= $Page->required->toClientList($Page) ?>;
    femployee_immigrationdocumentslistsrch.lists.alert_on_missing = <?= $Page->alert_on_missing->toClientList($Page) ?>;
    femployee_immigrationdocumentslistsrch.lists.alert_before_expiry = <?= $Page->alert_before_expiry->toClientList($Page) ?>;

    // Filters
    femployee_immigrationdocumentslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployee_immigrationdocumentslistsrch");
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
<form name="femployee_immigrationdocumentslistsrch" id="femployee_immigrationdocumentslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployee_immigrationdocumentslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employee_immigrationdocuments">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->required->Visible) { // required ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_required" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->required->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_required" id="z_required" value="=">
</span>
        <span id="el_employee_immigrationdocuments_required" class="ew-search-field">
<template id="tp_x_required">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_immigrationdocuments" data-field="x_required" name="x_required" id="x_required"<?= $Page->required->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_required" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_required"
    name="x_required"
    value="<?= HtmlEncode($Page->required->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_required"
    data-target="dsl_x_required"
    data-repeatcolumn="5"
    class="form-control<?= $Page->required->isInvalidClass() ?>"
    data-table="employee_immigrationdocuments"
    data-field="x_required"
    data-value-separator="<?= $Page->required->displayValueSeparatorAttribute() ?>"
    <?= $Page->required->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->required->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->alert_on_missing->Visible) { // alert_on_missing ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_alert_on_missing" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->alert_on_missing->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_alert_on_missing" id="z_alert_on_missing" value="=">
</span>
        <span id="el_employee_immigrationdocuments_alert_on_missing" class="ew-search-field">
<template id="tp_x_alert_on_missing">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_immigrationdocuments" data-field="x_alert_on_missing" name="x_alert_on_missing" id="x_alert_on_missing"<?= $Page->alert_on_missing->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_alert_on_missing" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_alert_on_missing"
    name="x_alert_on_missing"
    value="<?= HtmlEncode($Page->alert_on_missing->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_alert_on_missing"
    data-target="dsl_x_alert_on_missing"
    data-repeatcolumn="5"
    class="form-control<?= $Page->alert_on_missing->isInvalidClass() ?>"
    data-table="employee_immigrationdocuments"
    data-field="x_alert_on_missing"
    data-value-separator="<?= $Page->alert_on_missing->displayValueSeparatorAttribute() ?>"
    <?= $Page->alert_on_missing->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->alert_on_missing->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->alert_before_expiry->Visible) { // alert_before_expiry ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_alert_before_expiry" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->alert_before_expiry->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_alert_before_expiry" id="z_alert_before_expiry" value="=">
</span>
        <span id="el_employee_immigrationdocuments_alert_before_expiry" class="ew-search-field">
<template id="tp_x_alert_before_expiry">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employee_immigrationdocuments" data-field="x_alert_before_expiry" name="x_alert_before_expiry" id="x_alert_before_expiry"<?= $Page->alert_before_expiry->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_alert_before_expiry" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_alert_before_expiry"
    name="x_alert_before_expiry"
    value="<?= HtmlEncode($Page->alert_before_expiry->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_alert_before_expiry"
    data-target="dsl_x_alert_before_expiry"
    data-repeatcolumn="5"
    class="form-control<?= $Page->alert_before_expiry->isInvalidClass() ?>"
    data-table="employee_immigrationdocuments"
    data-field="x_alert_before_expiry"
    data-value-separator="<?= $Page->alert_before_expiry->displayValueSeparatorAttribute() ?>"
    <?= $Page->alert_before_expiry->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->alert_before_expiry->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employee_immigrationdocuments">
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
<form name="femployee_immigrationdocumentslist" id="femployee_immigrationdocumentslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employee_immigrationdocuments">
<div id="gmp_employee_immigrationdocuments" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employee_immigrationdocumentslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_id" class="employee_immigrationdocuments_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th data-name="name" class="<?= $Page->name->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_name" class="employee_immigrationdocuments_name"><?= $Page->renderSort($Page->name) ?></div></th>
<?php } ?>
<?php if ($Page->required->Visible) { // required ?>
        <th data-name="required" class="<?= $Page->required->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_required" class="employee_immigrationdocuments_required"><?= $Page->renderSort($Page->required) ?></div></th>
<?php } ?>
<?php if ($Page->alert_on_missing->Visible) { // alert_on_missing ?>
        <th data-name="alert_on_missing" class="<?= $Page->alert_on_missing->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_alert_on_missing" class="employee_immigrationdocuments_alert_on_missing"><?= $Page->renderSort($Page->alert_on_missing) ?></div></th>
<?php } ?>
<?php if ($Page->alert_before_expiry->Visible) { // alert_before_expiry ?>
        <th data-name="alert_before_expiry" class="<?= $Page->alert_before_expiry->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_alert_before_expiry" class="employee_immigrationdocuments_alert_before_expiry"><?= $Page->renderSort($Page->alert_before_expiry) ?></div></th>
<?php } ?>
<?php if ($Page->alert_before_day_number->Visible) { // alert_before_day_number ?>
        <th data-name="alert_before_day_number" class="<?= $Page->alert_before_day_number->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_alert_before_day_number" class="employee_immigrationdocuments_alert_before_day_number"><?= $Page->renderSort($Page->alert_before_day_number) ?></div></th>
<?php } ?>
<?php if ($Page->created->Visible) { // created ?>
        <th data-name="created" class="<?= $Page->created->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_created" class="employee_immigrationdocuments_created"><?= $Page->renderSort($Page->created) ?></div></th>
<?php } ?>
<?php if ($Page->updated->Visible) { // updated ?>
        <th data-name="updated" class="<?= $Page->updated->headerCellClass() ?>"><div id="elh_employee_immigrationdocuments_updated" class="employee_immigrationdocuments_updated"><?= $Page->renderSort($Page->updated) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employee_immigrationdocuments", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->name->Visible) { // name ?>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->required->Visible) { // required ?>
        <td data-name="required" <?= $Page->required->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_required">
<span<?= $Page->required->viewAttributes() ?>>
<?= $Page->required->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->alert_on_missing->Visible) { // alert_on_missing ?>
        <td data-name="alert_on_missing" <?= $Page->alert_on_missing->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_alert_on_missing">
<span<?= $Page->alert_on_missing->viewAttributes() ?>>
<?= $Page->alert_on_missing->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->alert_before_expiry->Visible) { // alert_before_expiry ?>
        <td data-name="alert_before_expiry" <?= $Page->alert_before_expiry->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_alert_before_expiry">
<span<?= $Page->alert_before_expiry->viewAttributes() ?>>
<?= $Page->alert_before_expiry->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->alert_before_day_number->Visible) { // alert_before_day_number ?>
        <td data-name="alert_before_day_number" <?= $Page->alert_before_day_number->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_alert_before_day_number">
<span<?= $Page->alert_before_day_number->viewAttributes() ?>>
<?= $Page->alert_before_day_number->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->created->Visible) { // created ?>
        <td data-name="created" <?= $Page->created->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_created">
<span<?= $Page->created->viewAttributes() ?>>
<?= $Page->created->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->updated->Visible) { // updated ?>
        <td data-name="updated" <?= $Page->updated->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employee_immigrationdocuments_updated">
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
    ew.addEventHandlers("employee_immigrationdocuments");
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
        container: "gmp_employee_immigrationdocuments",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

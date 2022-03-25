<?php

namespace PHPMaker2021\HIMS;

// Page object
$EmployeesArchivedList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var femployees_archivedlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    femployees_archivedlist = currentForm = new ew.Form("femployees_archivedlist", "list");
    femployees_archivedlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("femployees_archivedlist");
});
var femployees_archivedlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    femployees_archivedlistsrch = currentSearchForm = new ew.Form("femployees_archivedlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "employees_archived")) ?>,
        fields = currentTable.fields;
    femployees_archivedlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["ref_id", [], fields.ref_id.isInvalid],
        ["employee_id", [], fields.employee_id.isInvalid],
        ["first_name", [], fields.first_name.isInvalid],
        ["last_name", [], fields.last_name.isInvalid],
        ["gender", [], fields.gender.isInvalid],
        ["ssn_num", [], fields.ssn_num.isInvalid],
        ["nic_num", [], fields.nic_num.isInvalid],
        ["other_id", [], fields.other_id.isInvalid],
        ["work_email", [], fields.work_email.isInvalid],
        ["joined_date", [], fields.joined_date.isInvalid],
        ["confirmation_date", [], fields.confirmation_date.isInvalid],
        ["supervisor", [], fields.supervisor.isInvalid],
        ["department", [], fields.department.isInvalid],
        ["termination_date", [], fields.termination_date.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        femployees_archivedlistsrch.setInvalid();
    });

    // Validate form
    femployees_archivedlistsrch.validate = function () {
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
    femployees_archivedlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    femployees_archivedlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    femployees_archivedlistsrch.lists.gender = <?= $Page->gender->toClientList($Page) ?>;

    // Filters
    femployees_archivedlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("femployees_archivedlistsrch");
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
<form name="femployees_archivedlistsrch" id="femployees_archivedlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="femployees_archivedlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="employees_archived">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->gender->Visible) { // gender ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_gender" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->gender->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_gender" id="z_gender" value="=">
</span>
        <span id="el_employees_archived_gender" class="ew-search-field">
<template id="tp_x_gender">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="employees_archived" data-field="x_gender" name="x_gender" id="x_gender"<?= $Page->gender->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_gender" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_gender"
    name="x_gender"
    value="<?= HtmlEncode($Page->gender->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_gender"
    data-target="dsl_x_gender"
    data-repeatcolumn="5"
    class="form-control<?= $Page->gender->isInvalidClass() ?>"
    data-table="employees_archived"
    data-field="x_gender"
    data-value-separator="<?= $Page->gender->displayValueSeparatorAttribute() ?>"
    <?= $Page->gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->gender->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> employees_archived">
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
<form name="femployees_archivedlist" id="femployees_archivedlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="employees_archived">
<div id="gmp_employees_archived" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_employees_archivedlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_employees_archived_id" class="employees_archived_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->ref_id->Visible) { // ref_id ?>
        <th data-name="ref_id" class="<?= $Page->ref_id->headerCellClass() ?>"><div id="elh_employees_archived_ref_id" class="employees_archived_ref_id"><?= $Page->renderSort($Page->ref_id) ?></div></th>
<?php } ?>
<?php if ($Page->employee_id->Visible) { // employee_id ?>
        <th data-name="employee_id" class="<?= $Page->employee_id->headerCellClass() ?>"><div id="elh_employees_archived_employee_id" class="employees_archived_employee_id"><?= $Page->renderSort($Page->employee_id) ?></div></th>
<?php } ?>
<?php if ($Page->first_name->Visible) { // first_name ?>
        <th data-name="first_name" class="<?= $Page->first_name->headerCellClass() ?>"><div id="elh_employees_archived_first_name" class="employees_archived_first_name"><?= $Page->renderSort($Page->first_name) ?></div></th>
<?php } ?>
<?php if ($Page->last_name->Visible) { // last_name ?>
        <th data-name="last_name" class="<?= $Page->last_name->headerCellClass() ?>"><div id="elh_employees_archived_last_name" class="employees_archived_last_name"><?= $Page->renderSort($Page->last_name) ?></div></th>
<?php } ?>
<?php if ($Page->gender->Visible) { // gender ?>
        <th data-name="gender" class="<?= $Page->gender->headerCellClass() ?>"><div id="elh_employees_archived_gender" class="employees_archived_gender"><?= $Page->renderSort($Page->gender) ?></div></th>
<?php } ?>
<?php if ($Page->ssn_num->Visible) { // ssn_num ?>
        <th data-name="ssn_num" class="<?= $Page->ssn_num->headerCellClass() ?>"><div id="elh_employees_archived_ssn_num" class="employees_archived_ssn_num"><?= $Page->renderSort($Page->ssn_num) ?></div></th>
<?php } ?>
<?php if ($Page->nic_num->Visible) { // nic_num ?>
        <th data-name="nic_num" class="<?= $Page->nic_num->headerCellClass() ?>"><div id="elh_employees_archived_nic_num" class="employees_archived_nic_num"><?= $Page->renderSort($Page->nic_num) ?></div></th>
<?php } ?>
<?php if ($Page->other_id->Visible) { // other_id ?>
        <th data-name="other_id" class="<?= $Page->other_id->headerCellClass() ?>"><div id="elh_employees_archived_other_id" class="employees_archived_other_id"><?= $Page->renderSort($Page->other_id) ?></div></th>
<?php } ?>
<?php if ($Page->work_email->Visible) { // work_email ?>
        <th data-name="work_email" class="<?= $Page->work_email->headerCellClass() ?>"><div id="elh_employees_archived_work_email" class="employees_archived_work_email"><?= $Page->renderSort($Page->work_email) ?></div></th>
<?php } ?>
<?php if ($Page->joined_date->Visible) { // joined_date ?>
        <th data-name="joined_date" class="<?= $Page->joined_date->headerCellClass() ?>"><div id="elh_employees_archived_joined_date" class="employees_archived_joined_date"><?= $Page->renderSort($Page->joined_date) ?></div></th>
<?php } ?>
<?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
        <th data-name="confirmation_date" class="<?= $Page->confirmation_date->headerCellClass() ?>"><div id="elh_employees_archived_confirmation_date" class="employees_archived_confirmation_date"><?= $Page->renderSort($Page->confirmation_date) ?></div></th>
<?php } ?>
<?php if ($Page->supervisor->Visible) { // supervisor ?>
        <th data-name="supervisor" class="<?= $Page->supervisor->headerCellClass() ?>"><div id="elh_employees_archived_supervisor" class="employees_archived_supervisor"><?= $Page->renderSort($Page->supervisor) ?></div></th>
<?php } ?>
<?php if ($Page->department->Visible) { // department ?>
        <th data-name="department" class="<?= $Page->department->headerCellClass() ?>"><div id="elh_employees_archived_department" class="employees_archived_department"><?= $Page->renderSort($Page->department) ?></div></th>
<?php } ?>
<?php if ($Page->termination_date->Visible) { // termination_date ?>
        <th data-name="termination_date" class="<?= $Page->termination_date->headerCellClass() ?>"><div id="elh_employees_archived_termination_date" class="employees_archived_termination_date"><?= $Page->renderSort($Page->termination_date) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_employees_archived", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_employees_archived_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ref_id->Visible) { // ref_id ?>
        <td data-name="ref_id" <?= $Page->ref_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_ref_id">
<span<?= $Page->ref_id->viewAttributes() ?>>
<?= $Page->ref_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->employee_id->Visible) { // employee_id ?>
        <td data-name="employee_id" <?= $Page->employee_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_employee_id">
<span<?= $Page->employee_id->viewAttributes() ?>>
<?= $Page->employee_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->first_name->Visible) { // first_name ?>
        <td data-name="first_name" <?= $Page->first_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_first_name">
<span<?= $Page->first_name->viewAttributes() ?>>
<?= $Page->first_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->last_name->Visible) { // last_name ?>
        <td data-name="last_name" <?= $Page->last_name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_last_name">
<span<?= $Page->last_name->viewAttributes() ?>>
<?= $Page->last_name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->gender->Visible) { // gender ?>
        <td data-name="gender" <?= $Page->gender->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_gender">
<span<?= $Page->gender->viewAttributes() ?>>
<?= $Page->gender->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ssn_num->Visible) { // ssn_num ?>
        <td data-name="ssn_num" <?= $Page->ssn_num->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_ssn_num">
<span<?= $Page->ssn_num->viewAttributes() ?>>
<?= $Page->ssn_num->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->nic_num->Visible) { // nic_num ?>
        <td data-name="nic_num" <?= $Page->nic_num->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_nic_num">
<span<?= $Page->nic_num->viewAttributes() ?>>
<?= $Page->nic_num->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->other_id->Visible) { // other_id ?>
        <td data-name="other_id" <?= $Page->other_id->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_other_id">
<span<?= $Page->other_id->viewAttributes() ?>>
<?= $Page->other_id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->work_email->Visible) { // work_email ?>
        <td data-name="work_email" <?= $Page->work_email->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_work_email">
<span<?= $Page->work_email->viewAttributes() ?>>
<?= $Page->work_email->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->joined_date->Visible) { // joined_date ?>
        <td data-name="joined_date" <?= $Page->joined_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_joined_date">
<span<?= $Page->joined_date->viewAttributes() ?>>
<?= $Page->joined_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->confirmation_date->Visible) { // confirmation_date ?>
        <td data-name="confirmation_date" <?= $Page->confirmation_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_confirmation_date">
<span<?= $Page->confirmation_date->viewAttributes() ?>>
<?= $Page->confirmation_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->supervisor->Visible) { // supervisor ?>
        <td data-name="supervisor" <?= $Page->supervisor->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_supervisor">
<span<?= $Page->supervisor->viewAttributes() ?>>
<?= $Page->supervisor->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->department->Visible) { // department ?>
        <td data-name="department" <?= $Page->department->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_department">
<span<?= $Page->department->viewAttributes() ?>>
<?= $Page->department->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->termination_date->Visible) { // termination_date ?>
        <td data-name="termination_date" <?= $Page->termination_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_employees_archived_termination_date">
<span<?= $Page->termination_date->viewAttributes() ?>>
<?= $Page->termination_date->getViewValue() ?></span>
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
    ew.addEventHandlers("employees_archived");
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
        container: "gmp_employees_archived",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$HrLeavetypesList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fhr_leavetypeslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fhr_leavetypeslist = currentForm = new ew.Form("fhr_leavetypeslist", "list");
    fhr_leavetypeslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fhr_leavetypeslist");
});
var fhr_leavetypeslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fhr_leavetypeslistsrch = currentSearchForm = new ew.Form("fhr_leavetypeslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "hr_leavetypes")) ?>,
        fields = currentTable.fields;
    fhr_leavetypeslistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["name", [], fields.name.isInvalid],
        ["supervisor_leave_assign", [], fields.supervisor_leave_assign.isInvalid],
        ["employee_can_apply", [], fields.employee_can_apply.isInvalid],
        ["apply_beyond_current", [], fields.apply_beyond_current.isInvalid],
        ["leave_accrue", [], fields.leave_accrue.isInvalid],
        ["carried_forward", [], fields.carried_forward.isInvalid],
        ["default_per_year", [], fields.default_per_year.isInvalid],
        ["carried_forward_percentage", [], fields.carried_forward_percentage.isInvalid],
        ["carried_forward_leave_availability", [], fields.carried_forward_leave_availability.isInvalid],
        ["propotionate_on_joined_date", [], fields.propotionate_on_joined_date.isInvalid],
        ["send_notification_emails", [], fields.send_notification_emails.isInvalid],
        ["leave_group", [], fields.leave_group.isInvalid],
        ["leave_color", [], fields.leave_color.isInvalid],
        ["max_carried_forward_amount", [], fields.max_carried_forward_amount.isInvalid],
        ["HospID", [], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fhr_leavetypeslistsrch.setInvalid();
    });

    // Validate form
    fhr_leavetypeslistsrch.validate = function () {
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
    fhr_leavetypeslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fhr_leavetypeslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fhr_leavetypeslistsrch.lists.supervisor_leave_assign = <?= $Page->supervisor_leave_assign->toClientList($Page) ?>;
    fhr_leavetypeslistsrch.lists.employee_can_apply = <?= $Page->employee_can_apply->toClientList($Page) ?>;
    fhr_leavetypeslistsrch.lists.apply_beyond_current = <?= $Page->apply_beyond_current->toClientList($Page) ?>;
    fhr_leavetypeslistsrch.lists.leave_accrue = <?= $Page->leave_accrue->toClientList($Page) ?>;
    fhr_leavetypeslistsrch.lists.carried_forward = <?= $Page->carried_forward->toClientList($Page) ?>;
    fhr_leavetypeslistsrch.lists.propotionate_on_joined_date = <?= $Page->propotionate_on_joined_date->toClientList($Page) ?>;
    fhr_leavetypeslistsrch.lists.send_notification_emails = <?= $Page->send_notification_emails->toClientList($Page) ?>;

    // Filters
    fhr_leavetypeslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fhr_leavetypeslistsrch");
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
<form name="fhr_leavetypeslistsrch" id="fhr_leavetypeslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fhr_leavetypeslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="hr_leavetypes">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_supervisor_leave_assign" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->supervisor_leave_assign->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_supervisor_leave_assign" id="z_supervisor_leave_assign" value="=">
</span>
        <span id="el_hr_leavetypes_supervisor_leave_assign" class="ew-search-field">
<template id="tp_x_supervisor_leave_assign">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_supervisor_leave_assign" name="x_supervisor_leave_assign" id="x_supervisor_leave_assign"<?= $Page->supervisor_leave_assign->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_supervisor_leave_assign" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_supervisor_leave_assign"
    name="x_supervisor_leave_assign"
    value="<?= HtmlEncode($Page->supervisor_leave_assign->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_supervisor_leave_assign"
    data-target="dsl_x_supervisor_leave_assign"
    data-repeatcolumn="5"
    class="form-control<?= $Page->supervisor_leave_assign->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_supervisor_leave_assign"
    data-value-separator="<?= $Page->supervisor_leave_assign->displayValueSeparatorAttribute() ?>"
    <?= $Page->supervisor_leave_assign->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->supervisor_leave_assign->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->employee_can_apply->Visible) { // employee_can_apply ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_employee_can_apply" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->employee_can_apply->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_employee_can_apply" id="z_employee_can_apply" value="=">
</span>
        <span id="el_hr_leavetypes_employee_can_apply" class="ew-search-field">
<template id="tp_x_employee_can_apply">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_employee_can_apply" name="x_employee_can_apply" id="x_employee_can_apply"<?= $Page->employee_can_apply->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_employee_can_apply" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_employee_can_apply"
    name="x_employee_can_apply"
    value="<?= HtmlEncode($Page->employee_can_apply->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_employee_can_apply"
    data-target="dsl_x_employee_can_apply"
    data-repeatcolumn="5"
    class="form-control<?= $Page->employee_can_apply->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_employee_can_apply"
    data-value-separator="<?= $Page->employee_can_apply->displayValueSeparatorAttribute() ?>"
    <?= $Page->employee_can_apply->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->employee_can_apply->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->apply_beyond_current->Visible) { // apply_beyond_current ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_apply_beyond_current" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->apply_beyond_current->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_apply_beyond_current" id="z_apply_beyond_current" value="=">
</span>
        <span id="el_hr_leavetypes_apply_beyond_current" class="ew-search-field">
<template id="tp_x_apply_beyond_current">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_apply_beyond_current" name="x_apply_beyond_current" id="x_apply_beyond_current"<?= $Page->apply_beyond_current->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_apply_beyond_current" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_apply_beyond_current"
    name="x_apply_beyond_current"
    value="<?= HtmlEncode($Page->apply_beyond_current->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_apply_beyond_current"
    data-target="dsl_x_apply_beyond_current"
    data-repeatcolumn="5"
    class="form-control<?= $Page->apply_beyond_current->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_apply_beyond_current"
    data-value-separator="<?= $Page->apply_beyond_current->displayValueSeparatorAttribute() ?>"
    <?= $Page->apply_beyond_current->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->apply_beyond_current->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->leave_accrue->Visible) { // leave_accrue ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_leave_accrue" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->leave_accrue->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_leave_accrue" id="z_leave_accrue" value="=">
</span>
        <span id="el_hr_leavetypes_leave_accrue" class="ew-search-field">
<template id="tp_x_leave_accrue">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_leave_accrue" name="x_leave_accrue" id="x_leave_accrue"<?= $Page->leave_accrue->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_leave_accrue" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_leave_accrue"
    name="x_leave_accrue"
    value="<?= HtmlEncode($Page->leave_accrue->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_leave_accrue"
    data-target="dsl_x_leave_accrue"
    data-repeatcolumn="5"
    class="form-control<?= $Page->leave_accrue->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_leave_accrue"
    data-value-separator="<?= $Page->leave_accrue->displayValueSeparatorAttribute() ?>"
    <?= $Page->leave_accrue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->leave_accrue->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->carried_forward->Visible) { // carried_forward ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_carried_forward" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->carried_forward->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_carried_forward" id="z_carried_forward" value="=">
</span>
        <span id="el_hr_leavetypes_carried_forward" class="ew-search-field">
<template id="tp_x_carried_forward">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_carried_forward" name="x_carried_forward" id="x_carried_forward"<?= $Page->carried_forward->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_carried_forward" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_carried_forward"
    name="x_carried_forward"
    value="<?= HtmlEncode($Page->carried_forward->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_carried_forward"
    data-target="dsl_x_carried_forward"
    data-repeatcolumn="5"
    class="form-control<?= $Page->carried_forward->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_carried_forward"
    data-value-separator="<?= $Page->carried_forward->displayValueSeparatorAttribute() ?>"
    <?= $Page->carried_forward->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->carried_forward->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_propotionate_on_joined_date" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->propotionate_on_joined_date->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_propotionate_on_joined_date" id="z_propotionate_on_joined_date" value="=">
</span>
        <span id="el_hr_leavetypes_propotionate_on_joined_date" class="ew-search-field">
<template id="tp_x_propotionate_on_joined_date">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_propotionate_on_joined_date" name="x_propotionate_on_joined_date" id="x_propotionate_on_joined_date"<?= $Page->propotionate_on_joined_date->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_propotionate_on_joined_date" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_propotionate_on_joined_date"
    name="x_propotionate_on_joined_date"
    value="<?= HtmlEncode($Page->propotionate_on_joined_date->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_propotionate_on_joined_date"
    data-target="dsl_x_propotionate_on_joined_date"
    data-repeatcolumn="5"
    class="form-control<?= $Page->propotionate_on_joined_date->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_propotionate_on_joined_date"
    data-value-separator="<?= $Page->propotionate_on_joined_date->displayValueSeparatorAttribute() ?>"
    <?= $Page->propotionate_on_joined_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->propotionate_on_joined_date->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->send_notification_emails->Visible) { // send_notification_emails ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_send_notification_emails" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->send_notification_emails->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_send_notification_emails" id="z_send_notification_emails" value="=">
</span>
        <span id="el_hr_leavetypes_send_notification_emails" class="ew-search-field">
<template id="tp_x_send_notification_emails">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="hr_leavetypes" data-field="x_send_notification_emails" name="x_send_notification_emails" id="x_send_notification_emails"<?= $Page->send_notification_emails->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_send_notification_emails" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_send_notification_emails"
    name="x_send_notification_emails"
    value="<?= HtmlEncode($Page->send_notification_emails->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_send_notification_emails"
    data-target="dsl_x_send_notification_emails"
    data-repeatcolumn="5"
    class="form-control<?= $Page->send_notification_emails->isInvalidClass() ?>"
    data-table="hr_leavetypes"
    data-field="x_send_notification_emails"
    data-value-separator="<?= $Page->send_notification_emails->displayValueSeparatorAttribute() ?>"
    <?= $Page->send_notification_emails->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->send_notification_emails->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> hr_leavetypes">
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
<form name="fhr_leavetypeslist" id="fhr_leavetypeslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="hr_leavetypes">
<div id="gmp_hr_leavetypes" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_hr_leavetypeslist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_hr_leavetypes_id" class="hr_leavetypes_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
        <th data-name="name" class="<?= $Page->name->headerCellClass() ?>"><div id="elh_hr_leavetypes_name" class="hr_leavetypes_name"><?= $Page->renderSort($Page->name) ?></div></th>
<?php } ?>
<?php if ($Page->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
        <th data-name="supervisor_leave_assign" class="<?= $Page->supervisor_leave_assign->headerCellClass() ?>"><div id="elh_hr_leavetypes_supervisor_leave_assign" class="hr_leavetypes_supervisor_leave_assign"><?= $Page->renderSort($Page->supervisor_leave_assign) ?></div></th>
<?php } ?>
<?php if ($Page->employee_can_apply->Visible) { // employee_can_apply ?>
        <th data-name="employee_can_apply" class="<?= $Page->employee_can_apply->headerCellClass() ?>"><div id="elh_hr_leavetypes_employee_can_apply" class="hr_leavetypes_employee_can_apply"><?= $Page->renderSort($Page->employee_can_apply) ?></div></th>
<?php } ?>
<?php if ($Page->apply_beyond_current->Visible) { // apply_beyond_current ?>
        <th data-name="apply_beyond_current" class="<?= $Page->apply_beyond_current->headerCellClass() ?>"><div id="elh_hr_leavetypes_apply_beyond_current" class="hr_leavetypes_apply_beyond_current"><?= $Page->renderSort($Page->apply_beyond_current) ?></div></th>
<?php } ?>
<?php if ($Page->leave_accrue->Visible) { // leave_accrue ?>
        <th data-name="leave_accrue" class="<?= $Page->leave_accrue->headerCellClass() ?>"><div id="elh_hr_leavetypes_leave_accrue" class="hr_leavetypes_leave_accrue"><?= $Page->renderSort($Page->leave_accrue) ?></div></th>
<?php } ?>
<?php if ($Page->carried_forward->Visible) { // carried_forward ?>
        <th data-name="carried_forward" class="<?= $Page->carried_forward->headerCellClass() ?>"><div id="elh_hr_leavetypes_carried_forward" class="hr_leavetypes_carried_forward"><?= $Page->renderSort($Page->carried_forward) ?></div></th>
<?php } ?>
<?php if ($Page->default_per_year->Visible) { // default_per_year ?>
        <th data-name="default_per_year" class="<?= $Page->default_per_year->headerCellClass() ?>"><div id="elh_hr_leavetypes_default_per_year" class="hr_leavetypes_default_per_year"><?= $Page->renderSort($Page->default_per_year) ?></div></th>
<?php } ?>
<?php if ($Page->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
        <th data-name="carried_forward_percentage" class="<?= $Page->carried_forward_percentage->headerCellClass() ?>"><div id="elh_hr_leavetypes_carried_forward_percentage" class="hr_leavetypes_carried_forward_percentage"><?= $Page->renderSort($Page->carried_forward_percentage) ?></div></th>
<?php } ?>
<?php if ($Page->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
        <th data-name="carried_forward_leave_availability" class="<?= $Page->carried_forward_leave_availability->headerCellClass() ?>"><div id="elh_hr_leavetypes_carried_forward_leave_availability" class="hr_leavetypes_carried_forward_leave_availability"><?= $Page->renderSort($Page->carried_forward_leave_availability) ?></div></th>
<?php } ?>
<?php if ($Page->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
        <th data-name="propotionate_on_joined_date" class="<?= $Page->propotionate_on_joined_date->headerCellClass() ?>"><div id="elh_hr_leavetypes_propotionate_on_joined_date" class="hr_leavetypes_propotionate_on_joined_date"><?= $Page->renderSort($Page->propotionate_on_joined_date) ?></div></th>
<?php } ?>
<?php if ($Page->send_notification_emails->Visible) { // send_notification_emails ?>
        <th data-name="send_notification_emails" class="<?= $Page->send_notification_emails->headerCellClass() ?>"><div id="elh_hr_leavetypes_send_notification_emails" class="hr_leavetypes_send_notification_emails"><?= $Page->renderSort($Page->send_notification_emails) ?></div></th>
<?php } ?>
<?php if ($Page->leave_group->Visible) { // leave_group ?>
        <th data-name="leave_group" class="<?= $Page->leave_group->headerCellClass() ?>"><div id="elh_hr_leavetypes_leave_group" class="hr_leavetypes_leave_group"><?= $Page->renderSort($Page->leave_group) ?></div></th>
<?php } ?>
<?php if ($Page->leave_color->Visible) { // leave_color ?>
        <th data-name="leave_color" class="<?= $Page->leave_color->headerCellClass() ?>"><div id="elh_hr_leavetypes_leave_color" class="hr_leavetypes_leave_color"><?= $Page->renderSort($Page->leave_color) ?></div></th>
<?php } ?>
<?php if ($Page->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
        <th data-name="max_carried_forward_amount" class="<?= $Page->max_carried_forward_amount->headerCellClass() ?>"><div id="elh_hr_leavetypes_max_carried_forward_amount" class="hr_leavetypes_max_carried_forward_amount"><?= $Page->renderSort($Page->max_carried_forward_amount) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_hr_leavetypes_HospID" class="hr_leavetypes_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_hr_leavetypes", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->name->Visible) { // name ?>
        <td data-name="name" <?= $Page->name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_name">
<span<?= $Page->name->viewAttributes() ?>>
<?= $Page->name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->supervisor_leave_assign->Visible) { // supervisor_leave_assign ?>
        <td data-name="supervisor_leave_assign" <?= $Page->supervisor_leave_assign->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_supervisor_leave_assign">
<span<?= $Page->supervisor_leave_assign->viewAttributes() ?>>
<?= $Page->supervisor_leave_assign->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->employee_can_apply->Visible) { // employee_can_apply ?>
        <td data-name="employee_can_apply" <?= $Page->employee_can_apply->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_employee_can_apply">
<span<?= $Page->employee_can_apply->viewAttributes() ?>>
<?= $Page->employee_can_apply->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->apply_beyond_current->Visible) { // apply_beyond_current ?>
        <td data-name="apply_beyond_current" <?= $Page->apply_beyond_current->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_apply_beyond_current">
<span<?= $Page->apply_beyond_current->viewAttributes() ?>>
<?= $Page->apply_beyond_current->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->leave_accrue->Visible) { // leave_accrue ?>
        <td data-name="leave_accrue" <?= $Page->leave_accrue->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_leave_accrue">
<span<?= $Page->leave_accrue->viewAttributes() ?>>
<?= $Page->leave_accrue->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->carried_forward->Visible) { // carried_forward ?>
        <td data-name="carried_forward" <?= $Page->carried_forward->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_carried_forward">
<span<?= $Page->carried_forward->viewAttributes() ?>>
<?= $Page->carried_forward->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->default_per_year->Visible) { // default_per_year ?>
        <td data-name="default_per_year" <?= $Page->default_per_year->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_default_per_year">
<span<?= $Page->default_per_year->viewAttributes() ?>>
<?= $Page->default_per_year->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->carried_forward_percentage->Visible) { // carried_forward_percentage ?>
        <td data-name="carried_forward_percentage" <?= $Page->carried_forward_percentage->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_carried_forward_percentage">
<span<?= $Page->carried_forward_percentage->viewAttributes() ?>>
<?= $Page->carried_forward_percentage->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->carried_forward_leave_availability->Visible) { // carried_forward_leave_availability ?>
        <td data-name="carried_forward_leave_availability" <?= $Page->carried_forward_leave_availability->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_carried_forward_leave_availability">
<span<?= $Page->carried_forward_leave_availability->viewAttributes() ?>>
<?= $Page->carried_forward_leave_availability->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->propotionate_on_joined_date->Visible) { // propotionate_on_joined_date ?>
        <td data-name="propotionate_on_joined_date" <?= $Page->propotionate_on_joined_date->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_propotionate_on_joined_date">
<span<?= $Page->propotionate_on_joined_date->viewAttributes() ?>>
<?= $Page->propotionate_on_joined_date->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->send_notification_emails->Visible) { // send_notification_emails ?>
        <td data-name="send_notification_emails" <?= $Page->send_notification_emails->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_send_notification_emails">
<span<?= $Page->send_notification_emails->viewAttributes() ?>>
<?= $Page->send_notification_emails->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->leave_group->Visible) { // leave_group ?>
        <td data-name="leave_group" <?= $Page->leave_group->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_leave_group">
<span<?= $Page->leave_group->viewAttributes() ?>>
<?= $Page->leave_group->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->leave_color->Visible) { // leave_color ?>
        <td data-name="leave_color" <?= $Page->leave_color->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_leave_color">
<span<?= $Page->leave_color->viewAttributes() ?>>
<?= $Page->leave_color->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->max_carried_forward_amount->Visible) { // max_carried_forward_amount ?>
        <td data-name="max_carried_forward_amount" <?= $Page->max_carried_forward_amount->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_max_carried_forward_amount">
<span<?= $Page->max_carried_forward_amount->viewAttributes() ?>>
<?= $Page->max_carried_forward_amount->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_hr_leavetypes_HospID">
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
    ew.addEventHandlers("hr_leavetypes");
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
        container: "gmp_hr_leavetypes",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

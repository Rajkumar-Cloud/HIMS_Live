<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewAppointmentSchedulerNewList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_appointment_scheduler_newlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_appointment_scheduler_newlist = currentForm = new ew.Form("fview_appointment_scheduler_newlist", "list");
    fview_appointment_scheduler_newlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler_new")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_appointment_scheduler_new)
        ew.vars.tables.view_appointment_scheduler_new = currentTable;
    fview_appointment_scheduler_newlist.addFields([
        ["patientID", [fields.patientID.visible && fields.patientID.required ? ew.Validators.required(fields.patientID.caption) : null], fields.patientID.isInvalid],
        ["patientName", [fields.patientName.visible && fields.patientName.required ? ew.Validators.required(fields.patientName.caption) : null], fields.patientName.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["start_time", [fields.start_time.visible && fields.start_time.required ? ew.Validators.required(fields.start_time.caption) : null, ew.Validators.datetime(3)], fields.start_time.isInvalid],
        ["Purpose", [fields.Purpose.visible && fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["patienttype", [fields.patienttype.visible && fields.patienttype.required ? ew.Validators.required(fields.patienttype.caption) : null], fields.patienttype.isInvalid],
        ["Referal", [fields.Referal.visible && fields.Referal.required ? ew.Validators.required(fields.Referal.caption) : null], fields.Referal.isInvalid],
        ["start_date", [fields.start_date.visible && fields.start_date.required ? ew.Validators.required(fields.start_date.caption) : null, ew.Validators.datetime(11)], fields.start_date.isInvalid],
        ["DoctorName", [fields.DoctorName.visible && fields.DoctorName.required ? ew.Validators.required(fields.DoctorName.caption) : null], fields.DoctorName.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["Id", [fields.Id.visible && fields.Id.required ? ew.Validators.required(fields.Id.caption) : null], fields.Id.isInvalid],
        ["PatientTypee", [fields.PatientTypee.visible && fields.PatientTypee.required ? ew.Validators.required(fields.PatientTypee.caption) : null], fields.PatientTypee.isInvalid],
        ["Notes", [fields.Notes.visible && fields.Notes.required ? ew.Validators.required(fields.Notes.caption) : null], fields.Notes.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_appointment_scheduler_newlist,
            fobj = f.getForm(),
            $fobj = $(fobj),
            $k = $fobj.find("#" + f.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            f.setInvalid(rowIndex);
        }
    });

    // Validate form
    fview_appointment_scheduler_newlist.validate = function () {
        if (!this.validateRequired)
            return true; // Ignore validation
        var fobj = this.getForm(),
            $fobj = $(fobj);
        if ($fobj.find("#confirm").val() == "confirm")
            return true;
        var addcnt = 0,
            $k = $fobj.find("#" + this.formKeyCountName), // Get key_count
            rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1,
            startcnt = (rowcnt == 0) ? 0 : 1, // Check rowcnt == 0 => Inline-Add
            gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
        for (var i = startcnt; i <= rowcnt; i++) {
            var rowIndex = ($k[0]) ? String(i) : "";
            $fobj.data("rowindex", rowIndex);

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
        }
        return true;
    }

    // Form_CustomValidate
    fview_appointment_scheduler_newlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_appointment_scheduler_newlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_appointment_scheduler_newlist.lists.Referal = <?= $Page->Referal->toClientList($Page) ?>;
    fview_appointment_scheduler_newlist.lists.DoctorName = <?= $Page->DoctorName->toClientList($Page) ?>;
    loadjs.done("fview_appointment_scheduler_newlist");
});
var fview_appointment_scheduler_newlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_appointment_scheduler_newlistsrch = currentSearchForm = new ew.Form("fview_appointment_scheduler_newlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_appointment_scheduler_new")) ?>,
        fields = currentTable.fields;
    fview_appointment_scheduler_newlistsrch.addFields([
        ["patientID", [], fields.patientID.isInvalid],
        ["patientName", [], fields.patientName.isInvalid],
        ["MobileNumber", [], fields.MobileNumber.isInvalid],
        ["start_time", [], fields.start_time.isInvalid],
        ["Purpose", [], fields.Purpose.isInvalid],
        ["patienttype", [], fields.patienttype.isInvalid],
        ["Referal", [], fields.Referal.isInvalid],
        ["start_date", [ew.Validators.datetime(11)], fields.start_date.isInvalid],
        ["y_start_date", [ew.Validators.between], false],
        ["DoctorName", [], fields.DoctorName.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["Id", [], fields.Id.isInvalid],
        ["PatientTypee", [], fields.PatientTypee.isInvalid],
        ["Notes", [], fields.Notes.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_appointment_scheduler_newlistsrch.setInvalid();
    });

    // Validate form
    fview_appointment_scheduler_newlistsrch.validate = function () {
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
    fview_appointment_scheduler_newlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_appointment_scheduler_newlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_appointment_scheduler_newlistsrch.lists.DoctorName = <?= $Page->DoctorName->toClientList($Page) ?>;

    // Filters
    fview_appointment_scheduler_newlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_appointment_scheduler_newlistsrch");
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
<form name="fview_appointment_scheduler_newlistsrch" id="fview_appointment_scheduler_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_appointment_scheduler_newlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_appointment_scheduler_new">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->patientName->Visible) { // patientName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex d-none">
    <?php
        }
     ?>
    <div id="xsc_patientName" class="ew-cell form-group">
        <template id="tpsc_view_appointment_scheduler_new_patientName"><label for="x_patientName" class="ew-search-caption ew-label"><?= $Page->patientName->caption() ?></label></template>
        <template id="tpz_view_appointment_scheduler_new_patientName"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_patientName" id="z_patientName" value="LIKE">
</span></template>
        <template id="tpx_view_appointment_scheduler_new_patientName"><span id="el_view_appointment_scheduler_new_patientName" class="ew-search-field">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x_patientName" id="x_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_new_patientName">
        </template>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex d-none">
    <?php
        }
     ?>
    <div id="xsc_MobileNumber" class="ew-cell form-group">
        <template id="tpsc_view_appointment_scheduler_new_MobileNumber"><label for="x_MobileNumber" class="ew-search-caption ew-label"><?= $Page->MobileNumber->caption() ?></label></template>
        <template id="tpz_view_appointment_scheduler_new_MobileNumber"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MobileNumber" id="z_MobileNumber" value="LIKE">
</span></template>
        <template id="tpx_view_appointment_scheduler_new_MobileNumber"><span id="el_view_appointment_scheduler_new_MobileNumber" class="ew-search-field">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage(false) ?></div>
</span></template>
        <template id="tpv_view_appointment_scheduler_new_MobileNumber">
        </template>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex d-none">
    <?php
        }
     ?>
    <div id="xsc_start_date" class="ew-cell form-group">
        <template id="tpsc_view_appointment_scheduler_new_start_date"><label for="x_start_date" class="ew-search-caption ew-label"><?= $Page->start_date->caption() ?></label></template>
        <template id="tpz_view_appointment_scheduler_new_start_date"><span class="ew-search-operator">
<select name="z_start_date" id="z_start_date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->start_date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->start_date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->start_date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->start_date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->start_date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->start_date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->start_date->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->start_date->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->start_date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span></template>
        <template id="tpx_view_appointment_scheduler_new_start_date"><span id="el_view_appointment_scheduler_new_start_date" class="ew-search-field">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x_start_date" id="x_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage(false) ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newlistsrch", "x_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
        <template id="tpv_view_appointment_scheduler_new_start_date">
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        </template>
        <template id="tpy_view_appointment_scheduler_new_start_date"><span id="el2_view_appointment_scheduler_new_start_date" class="ew-search-field2 d-none">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="y_start_date" id="y_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue2 ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage(false) ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newlistsrch", "y_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
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
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex d-none">
    <?php
        }
     ?>
    <div id="xsc_DoctorName" class="ew-cell form-group">
        <template id="tpsc_view_appointment_scheduler_new_DoctorName"><label for="x_DoctorName" class="ew-search-caption ew-label"><?= $Page->DoctorName->caption() ?></label></template>
        <template id="tpz_view_appointment_scheduler_new_DoctorName"><span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DoctorName" id="z_DoctorName" value="LIKE">
</span></template>
        <template id="tpx_view_appointment_scheduler_new_DoctorName"><span id="el_view_appointment_scheduler_new_DoctorName" class="ew-search-field">
    <select
        id="x_DoctorName"
        name="x_DoctorName"
        class="form-control ew-select<?= $Page->DoctorName->isInvalidClass() ?>"
        data-select2-id="view_appointment_scheduler_new_x_DoctorName"
        data-table="view_appointment_scheduler_new"
        data-field="x_DoctorName"
        data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DoctorName->getPlaceHolder()) ?>"
        <?= $Page->DoctorName->editAttributes() ?>>
        <?= $Page->DoctorName->selectOptionListHtml("x_DoctorName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage(false) ?></div>
<?= $Page->DoctorName->Lookup->getParamTag($Page, "p_x_DoctorName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_appointment_scheduler_new_x_DoctorName']"),
        options = { name: "x_DoctorName", selectId: "view_appointment_scheduler_new_x_DoctorName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_appointment_scheduler_new.fields.DoctorName.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
        <template id="tpv_view_appointment_scheduler_new_DoctorName">
        </template>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow > 0) { ?>
</div>
    <?php } ?>
<div id="tpsd_view_appointment_scheduler_newlist" class="ew-custom-template-search"></div>
<template id="tpsm_view_appointment_scheduler_newlist">
<div id="view_appointment_scheduler_newlist"><table class="ew-table">
	 <tbody>
		<tr><td><?= $Page->patientName->caption() ?>&nbsp;<slot class="ew-slot" name="tpz_view_appointment_scheduler_new_patientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_appointment_scheduler_new_patientName"></slot></td><td><?= $Page->MobileNumber->caption() ?>&nbsp;<slot class="ew-slot" name="tpz_view_appointment_scheduler_new_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_appointment_scheduler_new_MobileNumber"></slot></td></tr>
			<tr><td><?= $Page->DoctorName->caption() ?>&nbsp;<slot class="ew-slot" name="tpz_view_appointment_scheduler_new_DoctorName"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_appointment_scheduler_new_DoctorName"></slot></td></tr>
		</tbody>
</table>
		<div class="info-box row" style="width:100%;"><span class="info-box-icon bg-info elevation-1"><i class="fas fa-calendar"></i></span>&nbsp;&nbsp;<?= $Page->start_date->caption() ?>&nbsp;<slot class="ew-slot" name="tpz_view_appointment_scheduler_new_start_date"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_appointment_scheduler_new_start_date"></slot>&nbsp;<slot class="ew-slot" name="tpv_view_appointment_scheduler_new_start_date"></slot>&nbsp;<slot class="ew-slot" name="tpy_view_appointment_scheduler_new_start_date"></slot></div>
</div>
</template>
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
<script>
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.applyTemplate("tpsd_view_appointment_scheduler_newlist", "tpsm_view_appointment_scheduler_newlist");
});
</script>
<?php } ?>
<?php } ?>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<?php if ($Page->TotalRecords > 0 || $Page->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_appointment_scheduler_new">
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
<form name="fview_appointment_scheduler_newlist" id="fview_appointment_scheduler_newlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_appointment_scheduler_new">
<div id="gmp_view_appointment_scheduler_new" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isAdd() || $Page->isCopy() || $Page->isGridEdit()) { ?>
<table id="tbl_view_appointment_scheduler_newlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="patientID" class="<?= $Page->patientID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patientID" class="view_appointment_scheduler_new_patientID"><?= $Page->renderSort($Page->patientID) ?></div></th>
<?php } ?>
<?php if ($Page->patientName->Visible) { // patientName ?>
        <th data-name="patientName" class="<?= $Page->patientName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patientName" class="view_appointment_scheduler_new_patientName"><?= $Page->renderSort($Page->patientName) ?></div></th>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Page->MobileNumber->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_MobileNumber" class="view_appointment_scheduler_new_MobileNumber"><?= $Page->renderSort($Page->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Page->start_time->Visible) { // start_time ?>
        <th data-name="start_time" class="<?= $Page->start_time->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_start_time" class="view_appointment_scheduler_new_start_time"><?= $Page->renderSort($Page->start_time) ?></div></th>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
        <th data-name="Purpose" class="<?= $Page->Purpose->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Purpose" class="view_appointment_scheduler_new_Purpose"><?= $Page->renderSort($Page->Purpose) ?></div></th>
<?php } ?>
<?php if ($Page->patienttype->Visible) { // patienttype ?>
        <th data-name="patienttype" class="<?= $Page->patienttype->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_patienttype" class="view_appointment_scheduler_new_patienttype"><?= $Page->renderSort($Page->patienttype) ?></div></th>
<?php } ?>
<?php if ($Page->Referal->Visible) { // Referal ?>
        <th data-name="Referal" class="<?= $Page->Referal->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Referal" class="view_appointment_scheduler_new_Referal"><?= $Page->renderSort($Page->Referal) ?></div></th>
<?php } ?>
<?php if ($Page->start_date->Visible) { // start_date ?>
        <th data-name="start_date" class="<?= $Page->start_date->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_start_date" class="view_appointment_scheduler_new_start_date"><?= $Page->renderSort($Page->start_date) ?></div></th>
<?php } ?>
<?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <th data-name="DoctorName" class="<?= $Page->DoctorName->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_DoctorName" class="view_appointment_scheduler_new_DoctorName"><?= $Page->renderSort($Page->DoctorName) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_HospID" class="view_appointment_scheduler_new_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->Id->Visible) { // Id ?>
        <th data-name="Id" class="<?= $Page->Id->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Id" class="view_appointment_scheduler_new_Id"><?= $Page->renderSort($Page->Id) ?></div></th>
<?php } ?>
<?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <th data-name="PatientTypee" class="<?= $Page->PatientTypee->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_PatientTypee" class="view_appointment_scheduler_new_PatientTypee"><?= $Page->renderSort($Page->PatientTypee) ?></div></th>
<?php } ?>
<?php if ($Page->Notes->Visible) { // Notes ?>
        <th data-name="Notes" class="<?= $Page->Notes->headerCellClass() ?>"><div id="elh_view_appointment_scheduler_new_Notes" class="view_appointment_scheduler_new_Notes"><?= $Page->renderSort($Page->Notes) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Page->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
    if ($Page->isAdd() || $Page->isCopy()) {
        $Page->RowIndex = 0;
        $Page->KeyCount = $Page->RowIndex;
        if ($Page->isCopy() && !$Page->loadRow())
            $Page->CurrentAction = "add";
        if ($Page->isAdd())
            $Page->loadRowValues();
        if ($Page->EventCancelled) // Insert failed
            $Page->restoreFormValues(); // Restore form values

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_view_appointment_scheduler_new", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowType = ROWTYPE_ADD;

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();
        $Page->StartRowCount = 0;
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->patientID->Visible) { // patientID ?>
        <td data-name="patientID">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patientID" class="form-group view_appointment_scheduler_new_patientID">
<input type="<?= $Page->patientID->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x<?= $Page->RowIndex ?>_patientID" id="x<?= $Page->RowIndex ?>_patientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientID->getPlaceHolder()) ?>" value="<?= $Page->patientID->EditValue ?>"<?= $Page->patientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patientID" data-hidden="1" name="o<?= $Page->RowIndex ?>_patientID" id="o<?= $Page->RowIndex ?>_patientID" value="<?= HtmlEncode($Page->patientID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->patientName->Visible) { // patientName ?>
        <td data-name="patientName">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patientName" class="form-group view_appointment_scheduler_new_patientName">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x<?= $Page->RowIndex ?>_patientName" id="x<?= $Page->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_patientName" id="o<?= $Page->RowIndex ?>_patientName" value="<?= HtmlEncode($Page->patientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_MobileNumber" class="form-group view_appointment_scheduler_new_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x<?= $Page->RowIndex ?>_MobileNumber" id="x<?= $Page->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Page->RowIndex ?>_MobileNumber" id="o<?= $Page->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Page->MobileNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->start_time->Visible) { // start_time ?>
        <td data-name="start_time">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_start_time" class="form-group view_appointment_scheduler_new_start_time">
<input type="<?= $Page->start_time->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x<?= $Page->RowIndex ?>_start_time" id="x<?= $Page->RowIndex ?>_start_time" placeholder="<?= HtmlEncode($Page->start_time->getPlaceHolder()) ?>" value="<?= $Page->start_time->EditValue ?>"<?= $Page->start_time->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_time->getErrorMessage() ?></div>
<?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?= $Page->RowIndex ?>_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "timepicker"], function() {
    ew.createTimePicker("fview_appointment_scheduler_newlist", "x<?= $Page->RowIndex ?>_start_time", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-hidden="1" name="o<?= $Page->RowIndex ?>_start_time" id="o<?= $Page->RowIndex ?>_start_time" value="<?= HtmlEncode($Page->start_time->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Purpose->Visible) { // Purpose ?>
        <td data-name="Purpose">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Purpose" class="form-group view_appointment_scheduler_new_Purpose">
<input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x<?= $Page->RowIndex ?>_Purpose" id="x<?= $Page->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Purpose" data-hidden="1" name="o<?= $Page->RowIndex ?>_Purpose" id="o<?= $Page->RowIndex ?>_Purpose" value="<?= HtmlEncode($Page->Purpose->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->patienttype->Visible) { // patienttype ?>
        <td data-name="patienttype">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patienttype" class="form-group view_appointment_scheduler_new_patienttype">
<input type="<?= $Page->patienttype->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x<?= $Page->RowIndex ?>_patienttype" id="x<?= $Page->RowIndex ?>_patienttype" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patienttype->getPlaceHolder()) ?>" value="<?= $Page->patienttype->EditValue ?>"<?= $Page->patienttype->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patienttype->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_patienttype" data-hidden="1" name="o<?= $Page->RowIndex ?>_patienttype" id="o<?= $Page->RowIndex ?>_patienttype" value="<?= HtmlEncode($Page->patienttype->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Referal->Visible) { // Referal ?>
        <td data-name="Referal">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Referal" class="form-group view_appointment_scheduler_new_Referal">
<?php
$onchange = $Page->Referal->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Referal" class="ew-auto-suggest">
    <input type="<?= $Page->Referal->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Referal" id="sv_x<?= $Page->RowIndex ?>_Referal" value="<?= RemoveHtml($Page->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>"<?= $Page->Referal->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-input="sv_x<?= $Page->RowIndex ?>_Referal" data-value-separator="<?= $Page->Referal->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Referal" id="x<?= $Page->RowIndex ?>_Referal" value="<?= HtmlEncode($Page->Referal->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Referal->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist"], function() {
    fview_appointment_scheduler_newlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Referal","forceSelect":false}, ew.vars.tables.view_appointment_scheduler_new.fields.Referal.autoSuggestOptions));
});
</script>
<?= $Page->Referal->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Referal") ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-hidden="1" name="o<?= $Page->RowIndex ?>_Referal" id="o<?= $Page->RowIndex ?>_Referal" value="<?= HtmlEncode($Page->Referal->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->start_date->Visible) { // start_date ?>
        <td data-name="start_date">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_start_date" class="form-group view_appointment_scheduler_new_start_date">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x<?= $Page->RowIndex ?>_start_date" id="x<?= $Page->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?= $Page->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-hidden="1" name="o<?= $Page->RowIndex ?>_start_date" id="o<?= $Page->RowIndex ?>_start_date" value="<?= HtmlEncode($Page->start_date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <td data-name="DoctorName">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_DoctorName" class="form-group view_appointment_scheduler_new_DoctorName">
    <select
        id="x<?= $Page->RowIndex ?>_DoctorName"
        name="x<?= $Page->RowIndex ?>_DoctorName"
        class="form-control ew-select<?= $Page->DoctorName->isInvalidClass() ?>"
        data-select2-id="view_appointment_scheduler_new_x<?= $Page->RowIndex ?>_DoctorName"
        data-table="view_appointment_scheduler_new"
        data-field="x_DoctorName"
        data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DoctorName->getPlaceHolder()) ?>"
        <?= $Page->DoctorName->editAttributes() ?>>
        <?= $Page->DoctorName->selectOptionListHtml("x{$Page->RowIndex}_DoctorName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage() ?></div>
<?= $Page->DoctorName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DoctorName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_appointment_scheduler_new_x<?= $Page->RowIndex ?>_DoctorName']"),
        options = { name: "x<?= $Page->RowIndex ?>_DoctorName", selectId: "view_appointment_scheduler_new_x<?= $Page->RowIndex ?>_DoctorName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_appointment_scheduler_new.fields.DoctorName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_DoctorName" data-hidden="1" name="o<?= $Page->RowIndex ?>_DoctorName" id="o<?= $Page->RowIndex ?>_DoctorName" value="<?= HtmlEncode($Page->DoctorName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_HospID" class="form-group view_appointment_scheduler_new_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Id->Visible) { // Id ?>
        <td data-name="Id">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Id" class="form-group view_appointment_scheduler_new_Id"></span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Id" data-hidden="1" name="o<?= $Page->RowIndex ?>_Id" id="o<?= $Page->RowIndex ?>_Id" value="<?= HtmlEncode($Page->Id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <td data-name="PatientTypee">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_PatientTypee" class="form-group view_appointment_scheduler_new_PatientTypee">
<input type="<?= $Page->PatientTypee->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x<?= $Page->RowIndex ?>_PatientTypee" id="x<?= $Page->RowIndex ?>_PatientTypee" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientTypee->getPlaceHolder()) ?>" value="<?= $Page->PatientTypee->EditValue ?>"<?= $Page->PatientTypee->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientTypee->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientTypee" id="o<?= $Page->RowIndex ?>_PatientTypee" value="<?= HtmlEncode($Page->PatientTypee->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Notes->Visible) { // Notes ?>
        <td data-name="Notes">
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Notes" class="form-group view_appointment_scheduler_new_Notes">
<input type="<?= $Page->Notes->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x<?= $Page->RowIndex ?>_Notes" id="x<?= $Page->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Notes->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Notes" data-hidden="1" name="o<?= $Page->RowIndex ?>_Notes" id="o<?= $Page->RowIndex ?>_Notes" value="<?= HtmlEncode($Page->Notes->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist","load"], function() {
    fview_appointment_scheduler_newlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
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

// Restore number of post back records
if ($CurrentForm && ($Page->isConfirm() || $Page->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Page->FormKeyCountName) && ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm())) {
        $Page->KeyCount = $CurrentForm->getValue($Page->FormKeyCountName);
        $Page->StopRecord = $Page->StartRecord + $Page->KeyCount - 1;
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
$Page->EditRowCount = 0;
if ($Page->isEdit())
    $Page->RowIndex = 1;
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
        if ($Page->isEdit()) {
            if ($Page->checkInlineEditKey() && $Page->EditRowCount == 0) { // Inline edit
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isEdit() && $Page->RowType == ROWTYPE_EDIT && $Page->EventCancelled) { // Update failed
            $CurrentForm->Index = 1;
            $Page->restoreFormValues(); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_appointment_scheduler_new", "data-rowtype" => $Page->RowType]);

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
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patientID" class="form-group">
<input type="<?= $Page->patientID->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientID" name="x<?= $Page->RowIndex ?>_patientID" id="x<?= $Page->RowIndex ?>_patientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientID->getPlaceHolder()) ?>" value="<?= $Page->patientID->EditValue ?>"<?= $Page->patientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patientID">
<span<?= $Page->patientID->viewAttributes() ?>>
<?= $Page->patientID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->patientName->Visible) { // patientName ?>
        <td data-name="patientName" <?= $Page->patientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patientName" class="form-group">
<input type="<?= $Page->patientName->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patientName" name="x<?= $Page->RowIndex ?>_patientName" id="x<?= $Page->RowIndex ?>_patientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patientName->getPlaceHolder()) ?>" value="<?= $Page->patientName->EditValue ?>"<?= $Page->patientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patientName">
<span<?= $Page->patientName->viewAttributes() ?>>
<?= $Page->patientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Page->MobileNumber->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_MobileNumber" class="form-group">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_MobileNumber" name="x<?= $Page->RowIndex ?>_MobileNumber" id="x<?= $Page->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_MobileNumber">
<span<?= $Page->MobileNumber->viewAttributes() ?>>
<?= $Page->MobileNumber->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->start_time->Visible) { // start_time ?>
        <td data-name="start_time" <?= $Page->start_time->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_start_time" class="form-group">
<input type="<?= $Page->start_time->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_time" data-format="3" name="x<?= $Page->RowIndex ?>_start_time" id="x<?= $Page->RowIndex ?>_start_time" placeholder="<?= HtmlEncode($Page->start_time->getPlaceHolder()) ?>" value="<?= $Page->start_time->EditValue ?>"<?= $Page->start_time->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_time->getErrorMessage() ?></div>
<?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?= $Page->RowIndex ?>_start_time", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
<?php if (!$Page->start_time->ReadOnly && !$Page->start_time->Disabled && !isset($Page->start_time->EditAttrs["readonly"]) && !isset($Page->start_time->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "timepicker"], function() {
    ew.createTimePicker("fview_appointment_scheduler_newlist", "x<?= $Page->RowIndex ?>_start_time", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_start_time">
<span<?= $Page->start_time->viewAttributes() ?>>
<?= $Page->start_time->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Purpose->Visible) { // Purpose ?>
        <td data-name="Purpose" <?= $Page->Purpose->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Purpose" class="form-group">
<input type="<?= $Page->Purpose->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Purpose" name="x<?= $Page->RowIndex ?>_Purpose" id="x<?= $Page->RowIndex ?>_Purpose" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>" value="<?= $Page->Purpose->EditValue ?>"<?= $Page->Purpose->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Purpose">
<span<?= $Page->Purpose->viewAttributes() ?>>
<?= $Page->Purpose->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->patienttype->Visible) { // patienttype ?>
        <td data-name="patienttype" <?= $Page->patienttype->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patienttype" class="form-group">
<input type="<?= $Page->patienttype->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_patienttype" name="x<?= $Page->RowIndex ?>_patienttype" id="x<?= $Page->RowIndex ?>_patienttype" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->patienttype->getPlaceHolder()) ?>" value="<?= $Page->patienttype->EditValue ?>"<?= $Page->patienttype->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->patienttype->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_patienttype">
<span<?= $Page->patienttype->viewAttributes() ?>>
<?= $Page->patienttype->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Referal->Visible) { // Referal ?>
        <td data-name="Referal" <?= $Page->Referal->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Referal" class="form-group">
<?php
$onchange = $Page->Referal->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Referal->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_Referal" class="ew-auto-suggest">
    <input type="<?= $Page->Referal->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_Referal" id="sv_x<?= $Page->RowIndex ?>_Referal" value="<?= RemoveHtml($Page->Referal->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Referal->getPlaceHolder()) ?>"<?= $Page->Referal->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="view_appointment_scheduler_new" data-field="x_Referal" data-input="sv_x<?= $Page->RowIndex ?>_Referal" data-value-separator="<?= $Page->Referal->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_Referal" id="x<?= $Page->RowIndex ?>_Referal" value="<?= HtmlEncode($Page->Referal->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->Referal->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist"], function() {
    fview_appointment_scheduler_newlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_Referal","forceSelect":false}, ew.vars.tables.view_appointment_scheduler_new.fields.Referal.autoSuggestOptions));
});
</script>
<?= $Page->Referal->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Referal") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Referal">
<span<?= $Page->Referal->viewAttributes() ?>>
<?= $Page->Referal->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->start_date->Visible) { // start_date ?>
        <td data-name="start_date" <?= $Page->start_date->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_start_date" class="form-group">
<input type="<?= $Page->start_date->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_start_date" data-format="11" name="x<?= $Page->RowIndex ?>_start_date" id="x<?= $Page->RowIndex ?>_start_date" placeholder="<?= HtmlEncode($Page->start_date->getPlaceHolder()) ?>" value="<?= $Page->start_date->EditValue ?>"<?= $Page->start_date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->start_date->getErrorMessage() ?></div>
<?php if (!$Page->start_date->ReadOnly && !$Page->start_date->Disabled && !isset($Page->start_date->EditAttrs["readonly"]) && !isset($Page->start_date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_appointment_scheduler_newlist", "x<?= $Page->RowIndex ?>_start_date", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_start_date">
<span<?= $Page->start_date->viewAttributes() ?>>
<?= $Page->start_date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DoctorName->Visible) { // DoctorName ?>
        <td data-name="DoctorName" <?= $Page->DoctorName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_DoctorName" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_DoctorName"
        name="x<?= $Page->RowIndex ?>_DoctorName"
        class="form-control ew-select<?= $Page->DoctorName->isInvalidClass() ?>"
        data-select2-id="view_appointment_scheduler_new_x<?= $Page->RowIndex ?>_DoctorName"
        data-table="view_appointment_scheduler_new"
        data-field="x_DoctorName"
        data-value-separator="<?= $Page->DoctorName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DoctorName->getPlaceHolder()) ?>"
        <?= $Page->DoctorName->editAttributes() ?>>
        <?= $Page->DoctorName->selectOptionListHtml("x{$Page->RowIndex}_DoctorName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->DoctorName->getErrorMessage() ?></div>
<?= $Page->DoctorName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DoctorName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_appointment_scheduler_new_x<?= $Page->RowIndex ?>_DoctorName']"),
        options = { name: "x<?= $Page->RowIndex ?>_DoctorName", selectId: "view_appointment_scheduler_new_x<?= $Page->RowIndex ?>_DoctorName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_appointment_scheduler_new.fields.DoctorName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_DoctorName">
<span<?= $Page->DoctorName->viewAttributes() ?>>
<?= $Page->DoctorName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Id->Visible) { // Id ?>
        <td data-name="Id" <?= $Page->Id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Id" class="form-group">
<span<?= $Page->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Id->getDisplayValue($Page->Id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Id" data-hidden="1" name="x<?= $Page->RowIndex ?>_Id" id="x<?= $Page->RowIndex ?>_Id" value="<?= HtmlEncode($Page->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_appointment_scheduler_new" data-field="x_Id" data-hidden="1" name="x<?= $Page->RowIndex ?>_Id" id="x<?= $Page->RowIndex ?>_Id" value="<?= HtmlEncode($Page->Id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->PatientTypee->Visible) { // PatientTypee ?>
        <td data-name="PatientTypee" <?= $Page->PatientTypee->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_PatientTypee" class="form-group">
<input type="<?= $Page->PatientTypee->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_PatientTypee" name="x<?= $Page->RowIndex ?>_PatientTypee" id="x<?= $Page->RowIndex ?>_PatientTypee" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientTypee->getPlaceHolder()) ?>" value="<?= $Page->PatientTypee->EditValue ?>"<?= $Page->PatientTypee->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PatientTypee->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_PatientTypee">
<span<?= $Page->PatientTypee->viewAttributes() ?>>
<?= $Page->PatientTypee->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Notes->Visible) { // Notes ?>
        <td data-name="Notes" <?= $Page->Notes->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Notes" class="form-group">
<input type="<?= $Page->Notes->getInputTextType() ?>" data-table="view_appointment_scheduler_new" data-field="x_Notes" name="x<?= $Page->RowIndex ?>_Notes" id="x<?= $Page->RowIndex ?>_Notes" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Notes->getPlaceHolder()) ?>" value="<?= $Page->Notes->EditValue ?>"<?= $Page->Notes->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Notes->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_appointment_scheduler_new_Notes">
<span<?= $Page->Notes->viewAttributes() ?>>
<?= $Page->Notes->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
    </tr>
<?php if ($Page->RowType == ROWTYPE_ADD || $Page->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fview_appointment_scheduler_newlist","load"], function () {
    fview_appointment_scheduler_newlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
<?php } ?>
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
<?php if ($Page->isAdd() || $Page->isCopy()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
<?php if ($Page->isEdit()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
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
    ew.addEventHandlers("view_appointment_scheduler_new");
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
        container: "gmp_view_appointment_scheduler_new",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

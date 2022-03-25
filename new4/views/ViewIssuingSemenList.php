<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIssuingSemenList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_issuing_semenlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_issuing_semenlist = currentForm = new ew.Form("fview_issuing_semenlist", "list");
    fview_issuing_semenlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_issuing_semen")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_issuing_semen)
        ew.vars.tables.view_issuing_semen = currentTable;
    fview_issuing_semenlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null], fields.RIDNo.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["HusbandName", [fields.HusbandName.visible && fields.HusbandName.required ? ew.Validators.required(fields.HusbandName.caption) : null], fields.HusbandName.isInvalid],
        ["RequestDr", [fields.RequestDr.visible && fields.RequestDr.required ? ew.Validators.required(fields.RequestDr.caption) : null], fields.RequestDr.isInvalid],
        ["CollectionDate", [fields.CollectionDate.visible && fields.CollectionDate.required ? ew.Validators.required(fields.CollectionDate.caption) : null], fields.CollectionDate.isInvalid],
        ["Tank", [fields.Tank.visible && fields.Tank.required ? ew.Validators.required(fields.Tank.caption) : null], fields.Tank.isInvalid],
        ["Location", [fields.Location.visible && fields.Location.required ? ew.Validators.required(fields.Location.caption) : null], fields.Location.isInvalid],
        ["IssuedBy", [fields.IssuedBy.visible && fields.IssuedBy.required ? ew.Validators.required(fields.IssuedBy.caption) : null], fields.IssuedBy.isInvalid],
        ["IssuedTo", [fields.IssuedTo.visible && fields.IssuedTo.required ? ew.Validators.required(fields.IssuedTo.caption) : null], fields.IssuedTo.isInvalid],
        ["RequestSample", [fields.RequestSample.visible && fields.RequestSample.required ? ew.Validators.required(fields.RequestSample.caption) : null], fields.RequestSample.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_issuing_semenlist,
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
    fview_issuing_semenlist.validate = function () {
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
    fview_issuing_semenlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_issuing_semenlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_issuing_semenlist.lists.PatientName = <?= $Page->PatientName->toClientList($Page) ?>;
    fview_issuing_semenlist.lists.HusbandName = <?= $Page->HusbandName->toClientList($Page) ?>;
    fview_issuing_semenlist.lists.IssuedTo = <?= $Page->IssuedTo->toClientList($Page) ?>;
    fview_issuing_semenlist.lists.RequestSample = <?= $Page->RequestSample->toClientList($Page) ?>;
    loadjs.done("fview_issuing_semenlist");
});
var fview_issuing_semenlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_issuing_semenlistsrch = currentSearchForm = new ew.Form("fview_issuing_semenlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_issuing_semen")) ?>,
        fields = currentTable.fields;
    fview_issuing_semenlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["RIDNo", [ew.Validators.integer], fields.RIDNo.isInvalid],
        ["PatientName", [], fields.PatientName.isInvalid],
        ["HusbandName", [], fields.HusbandName.isInvalid],
        ["RequestDr", [], fields.RequestDr.isInvalid],
        ["CollectionDate", [ew.Validators.datetime(0)], fields.CollectionDate.isInvalid],
        ["y_CollectionDate", [ew.Validators.between], false],
        ["Tank", [], fields.Tank.isInvalid],
        ["Location", [], fields.Location.isInvalid],
        ["IssuedBy", [], fields.IssuedBy.isInvalid],
        ["IssuedTo", [], fields.IssuedTo.isInvalid],
        ["RequestSample", [], fields.RequestSample.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_issuing_semenlistsrch.setInvalid();
    });

    // Validate form
    fview_issuing_semenlistsrch.validate = function () {
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
    fview_issuing_semenlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_issuing_semenlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_issuing_semenlistsrch.lists.PatientName = <?= $Page->PatientName->toClientList($Page) ?>;
    fview_issuing_semenlistsrch.lists.HusbandName = <?= $Page->HusbandName->toClientList($Page) ?>;

    // Filters
    fview_issuing_semenlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_issuing_semenlistsrch");
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
<form name="fview_issuing_semenlistsrch" id="fview_issuing_semenlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_issuing_semenlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_issuing_semen">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_RIDNo" class="ew-cell form-group">
        <label for="x_RIDNo" class="ew-search-caption ew-label"><?= $Page->RIDNo->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RIDNo" id="z_RIDNo" value="=">
</span>
        <span id="el_view_issuing_semen_RIDNo" class="ew-search-field">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PatientName" class="ew-cell form-group">
        <label for="x_PatientName" class="ew-search-caption ew-label"><?= $Page->PatientName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PatientName" id="z_PatientName" value="LIKE">
</span>
        <span id="el_view_issuing_semen_PatientName" class="ew-search-field">
    <select
        id="x_PatientName"
        name="x_PatientName"
        class="form-control ew-select<?= $Page->PatientName->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x_PatientName"
        data-table="view_issuing_semen"
        data-field="x_PatientName"
        data-value-separator="<?= $Page->PatientName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>"
        <?= $Page->PatientName->editAttributes() ?>>
        <?= $Page->PatientName->selectOptionListHtml("x_PatientName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage(false) ?></div>
<?= $Page->PatientName->Lookup->getParamTag($Page, "p_x_PatientName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x_PatientName']"),
        options = { name: "x_PatientName", selectId: "view_issuing_semen_x_PatientName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.PatientName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_HusbandName" class="ew-cell form-group">
        <label for="x_HusbandName" class="ew-search-caption ew-label"><?= $Page->HusbandName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_HusbandName" id="z_HusbandName" value="LIKE">
</span>
        <span id="el_view_issuing_semen_HusbandName" class="ew-search-field">
    <select
        id="x_HusbandName"
        name="x_HusbandName"
        class="form-control ew-select<?= $Page->HusbandName->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x_HusbandName"
        data-table="view_issuing_semen"
        data-field="x_HusbandName"
        data-value-separator="<?= $Page->HusbandName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HusbandName->getPlaceHolder()) ?>"
        <?= $Page->HusbandName->editAttributes() ?>>
        <?= $Page->HusbandName->selectOptionListHtml("x_HusbandName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HusbandName->getErrorMessage(false) ?></div>
<?= $Page->HusbandName->Lookup->getParamTag($Page, "p_x_HusbandName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x_HusbandName']"),
        options = { name: "x_HusbandName", selectId: "view_issuing_semen_x_HusbandName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.HusbandName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_RequestDr" class="ew-cell form-group">
        <label for="x_RequestDr" class="ew-search-caption ew-label"><?= $Page->RequestDr->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RequestDr" id="z_RequestDr" value="LIKE">
</span>
        <span id="el_view_issuing_semen_RequestDr" class="ew-search-field">
<input type="<?= $Page->RequestDr->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_RequestDr" name="x_RequestDr" id="x_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RequestDr->getPlaceHolder()) ?>" value="<?= $Page->RequestDr->EditValue ?>"<?= $Page->RequestDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RequestDr->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_CollectionDate" class="ew-cell form-group">
        <label for="x_CollectionDate" class="ew-search-caption ew-label"><?= $Page->CollectionDate->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_CollectionDate" id="z_CollectionDate" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->CollectionDate->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_issuing_semen_CollectionDate" class="ew-search-field">
<input type="<?= $Page->CollectionDate->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x_CollectionDate" id="x_CollectionDate" placeholder="<?= HtmlEncode($Page->CollectionDate->getPlaceHolder()) ?>" value="<?= $Page->CollectionDate->EditValue ?>"<?= $Page->CollectionDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollectionDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CollectionDate->ReadOnly && !$Page->CollectionDate->Disabled && !isset($Page->CollectionDate->EditAttrs["readonly"]) && !isset($Page->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_issuing_semenlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_issuing_semenlistsrch", "x_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_issuing_semen_CollectionDate" class="ew-search-field2 d-none">
<input type="<?= $Page->CollectionDate->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_CollectionDate" name="y_CollectionDate" id="y_CollectionDate" placeholder="<?= HtmlEncode($Page->CollectionDate->getPlaceHolder()) ?>" value="<?= $Page->CollectionDate->EditValue2 ?>"<?= $Page->CollectionDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollectionDate->getErrorMessage(false) ?></div>
<?php if (!$Page->CollectionDate->ReadOnly && !$Page->CollectionDate->Disabled && !isset($Page->CollectionDate->EditAttrs["readonly"]) && !isset($Page->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_issuing_semenlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_issuing_semenlistsrch", "y_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_issuing_semen">
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
<form name="fview_issuing_semenlist" id="fview_issuing_semenlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_issuing_semen">
<div id="gmp_view_issuing_semen" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_issuing_semenlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_issuing_semen_id" class="view_issuing_semen_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_view_issuing_semen_RIDNo" class="view_issuing_semen_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Page->PatientName->headerCellClass() ?>"><div id="elh_view_issuing_semen_PatientName" class="view_issuing_semen_PatientName"><?= $Page->renderSort($Page->PatientName) ?></div></th>
<?php } ?>
<?php if ($Page->HusbandName->Visible) { // HusbandName ?>
        <th data-name="HusbandName" class="<?= $Page->HusbandName->headerCellClass() ?>"><div id="elh_view_issuing_semen_HusbandName" class="view_issuing_semen_HusbandName"><?= $Page->renderSort($Page->HusbandName) ?></div></th>
<?php } ?>
<?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <th data-name="RequestDr" class="<?= $Page->RequestDr->headerCellClass() ?>"><div id="elh_view_issuing_semen_RequestDr" class="view_issuing_semen_RequestDr"><?= $Page->renderSort($Page->RequestDr) ?></div></th>
<?php } ?>
<?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <th data-name="CollectionDate" class="<?= $Page->CollectionDate->headerCellClass() ?>"><div id="elh_view_issuing_semen_CollectionDate" class="view_issuing_semen_CollectionDate"><?= $Page->renderSort($Page->CollectionDate) ?></div></th>
<?php } ?>
<?php if ($Page->Tank->Visible) { // Tank ?>
        <th data-name="Tank" class="<?= $Page->Tank->headerCellClass() ?>"><div id="elh_view_issuing_semen_Tank" class="view_issuing_semen_Tank"><?= $Page->renderSort($Page->Tank) ?></div></th>
<?php } ?>
<?php if ($Page->Location->Visible) { // Location ?>
        <th data-name="Location" class="<?= $Page->Location->headerCellClass() ?>"><div id="elh_view_issuing_semen_Location" class="view_issuing_semen_Location"><?= $Page->renderSort($Page->Location) ?></div></th>
<?php } ?>
<?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
        <th data-name="IssuedBy" class="<?= $Page->IssuedBy->headerCellClass() ?>"><div id="elh_view_issuing_semen_IssuedBy" class="view_issuing_semen_IssuedBy"><?= $Page->renderSort($Page->IssuedBy) ?></div></th>
<?php } ?>
<?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
        <th data-name="IssuedTo" class="<?= $Page->IssuedTo->headerCellClass() ?>"><div id="elh_view_issuing_semen_IssuedTo" class="view_issuing_semen_IssuedTo"><?= $Page->renderSort($Page->IssuedTo) ?></div></th>
<?php } ?>
<?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <th data-name="RequestSample" class="<?= $Page->RequestSample->headerCellClass() ?>"><div id="elh_view_issuing_semen_RequestSample" class="view_issuing_semen_RequestSample"><?= $Page->renderSort($Page->RequestSample) ?></div></th>
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
if ($Page->isGridEdit())
    $Page->RowIndex = 0;
while ($Page->RecordCount < $Page->StopRecord) {
    $Page->RecordCount++;
    if ($Page->RecordCount >= $Page->StartRecord) {
        $Page->RowCount++;
        if ($Page->isGridAdd() || $Page->isGridEdit() || $Page->isConfirm()) {
            $Page->RowIndex++;
            $CurrentForm->Index = $Page->RowIndex;
            if ($CurrentForm->hasValue($Page->FormActionName) && ($Page->isConfirm() || $Page->EventCancelled)) {
                $Page->RowAction = strval($CurrentForm->getValue($Page->FormActionName));
            } elseif ($Page->isGridAdd()) {
                $Page->RowAction = "insert";
            } else {
                $Page->RowAction = "";
            }
        }

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
        if ($Page->isGridEdit()) { // Grid edit
            if ($Page->EventCancelled) {
                $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
            }
            if ($Page->RowAction == "insert") {
                $Page->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Page->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Page->isEdit() && $Page->RowType == ROWTYPE_EDIT && $Page->EventCancelled) { // Update failed
            $CurrentForm->Index = 1;
            $Page->restoreFormValues(); // Restore form values
        }
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_issuing_semen", "data-rowtype" => $Page->RowType]);

        // Render row
        $Page->renderRow();

        // Render list options
        $Page->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Page->RowAction != "delete" && $Page->RowAction != "insertdelete" && !($Page->RowAction == "insert" && $Page->isConfirm() && $Page->emptyRow())) {
?>
    <tr <?= $Page->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Page->ListOptions->render("body", "left", $Page->RowCount);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_id" class="form-group"></span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_issuing_semen" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RIDNo" class="form-group">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_RIDNo" id="o<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RIDNo" class="form-group">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RIDNo->getDisplayValue($Page->RIDNo->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" data-hidden="1" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Page->PatientName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_PatientName" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_PatientName"
        name="x<?= $Page->RowIndex ?>_PatientName"
        class="form-control ew-select<?= $Page->PatientName->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_PatientName"
        data-table="view_issuing_semen"
        data-field="x_PatientName"
        data-value-separator="<?= $Page->PatientName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>"
        <?= $Page->PatientName->editAttributes() ?>>
        <?= $Page->PatientName->selectOptionListHtml("x{$Page->RowIndex}_PatientName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
<?= $Page->PatientName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PatientName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_PatientName']"),
        options = { name: "x<?= $Page->RowIndex ?>_PatientName", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_PatientName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.PatientName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_PatientName" class="form-group">
<span<?= $Page->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientName->getDisplayValue($Page->PatientName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" data-hidden="1" name="x<?= $Page->RowIndex ?>_PatientName" id="x<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_PatientName">
<span<?= $Page->PatientName->viewAttributes() ?>>
<?= $Page->PatientName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HusbandName->Visible) { // HusbandName ?>
        <td data-name="HusbandName" <?= $Page->HusbandName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_HusbandName" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_HusbandName"
        name="x<?= $Page->RowIndex ?>_HusbandName"
        class="form-control ew-select<?= $Page->HusbandName->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_HusbandName"
        data-table="view_issuing_semen"
        data-field="x_HusbandName"
        data-value-separator="<?= $Page->HusbandName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HusbandName->getPlaceHolder()) ?>"
        <?= $Page->HusbandName->editAttributes() ?>>
        <?= $Page->HusbandName->selectOptionListHtml("x{$Page->RowIndex}_HusbandName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HusbandName->getErrorMessage() ?></div>
<?= $Page->HusbandName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_HusbandName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_HusbandName']"),
        options = { name: "x<?= $Page->RowIndex ?>_HusbandName", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_HusbandName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.HusbandName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" data-hidden="1" name="o<?= $Page->RowIndex ?>_HusbandName" id="o<?= $Page->RowIndex ?>_HusbandName" value="<?= HtmlEncode($Page->HusbandName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_HusbandName" class="form-group">
<span<?= $Page->HusbandName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->HusbandName->getDisplayValue($Page->HusbandName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" data-hidden="1" name="x<?= $Page->RowIndex ?>_HusbandName" id="x<?= $Page->RowIndex ?>_HusbandName" value="<?= HtmlEncode($Page->HusbandName->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_HusbandName">
<span<?= $Page->HusbandName->viewAttributes() ?>>
<?= $Page->HusbandName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <td data-name="RequestDr" <?= $Page->RequestDr->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RequestDr" class="form-group">
<input type="<?= $Page->RequestDr->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_RequestDr" name="x<?= $Page->RowIndex ?>_RequestDr" id="x<?= $Page->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RequestDr->getPlaceHolder()) ?>" value="<?= $Page->RequestDr->EditValue ?>"<?= $Page->RequestDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RequestDr->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" data-hidden="1" name="o<?= $Page->RowIndex ?>_RequestDr" id="o<?= $Page->RowIndex ?>_RequestDr" value="<?= HtmlEncode($Page->RequestDr->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RequestDr" class="form-group">
<span<?= $Page->RequestDr->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RequestDr->getDisplayValue($Page->RequestDr->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" data-hidden="1" name="x<?= $Page->RowIndex ?>_RequestDr" id="x<?= $Page->RowIndex ?>_RequestDr" value="<?= HtmlEncode($Page->RequestDr->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RequestDr">
<span<?= $Page->RequestDr->viewAttributes() ?>>
<?= $Page->RequestDr->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <td data-name="CollectionDate" <?= $Page->CollectionDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_CollectionDate" class="form-group">
<input type="<?= $Page->CollectionDate->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x<?= $Page->RowIndex ?>_CollectionDate" id="x<?= $Page->RowIndex ?>_CollectionDate" placeholder="<?= HtmlEncode($Page->CollectionDate->getPlaceHolder()) ?>" value="<?= $Page->CollectionDate->EditValue ?>"<?= $Page->CollectionDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollectionDate->getErrorMessage() ?></div>
<?php if (!$Page->CollectionDate->ReadOnly && !$Page->CollectionDate->Disabled && !isset($Page->CollectionDate->EditAttrs["readonly"]) && !isset($Page->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_issuing_semenlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_issuing_semenlist", "x<?= $Page->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_CollectionDate" id="o<?= $Page->RowIndex ?>_CollectionDate" value="<?= HtmlEncode($Page->CollectionDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_CollectionDate" class="form-group">
<span<?= $Page->CollectionDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->CollectionDate->getDisplayValue($Page->CollectionDate->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" data-hidden="1" name="x<?= $Page->RowIndex ?>_CollectionDate" id="x<?= $Page->RowIndex ?>_CollectionDate" value="<?= HtmlEncode($Page->CollectionDate->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_CollectionDate">
<span<?= $Page->CollectionDate->viewAttributes() ?>>
<?= $Page->CollectionDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank" <?= $Page->Tank->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_Tank" class="form-group">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_Tank" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" data-hidden="1" name="o<?= $Page->RowIndex ?>_Tank" id="o<?= $Page->RowIndex ?>_Tank" value="<?= HtmlEncode($Page->Tank->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_Tank" class="form-group">
<span<?= $Page->Tank->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Tank->getDisplayValue($Page->Tank->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" data-hidden="1" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" value="<?= HtmlEncode($Page->Tank->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_Tank">
<span<?= $Page->Tank->viewAttributes() ?>>
<?= $Page->Tank->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Location->Visible) { // Location ?>
        <td data-name="Location" <?= $Page->Location->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_Location" class="form-group">
<input type="<?= $Page->Location->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_Location" name="x<?= $Page->RowIndex ?>_Location" id="x<?= $Page->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Location->getPlaceHolder()) ?>" value="<?= $Page->Location->EditValue ?>"<?= $Page->Location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Location->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" data-hidden="1" name="o<?= $Page->RowIndex ?>_Location" id="o<?= $Page->RowIndex ?>_Location" value="<?= HtmlEncode($Page->Location->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_Location" class="form-group">
<span<?= $Page->Location->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Location->getDisplayValue($Page->Location->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" data-hidden="1" name="x<?= $Page->RowIndex ?>_Location" id="x<?= $Page->RowIndex ?>_Location" value="<?= HtmlEncode($Page->Location->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_Location">
<span<?= $Page->Location->viewAttributes() ?>>
<?= $Page->Location->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
        <td data-name="IssuedBy" <?= $Page->IssuedBy->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_IssuedBy" class="form-group">
<input type="<?= $Page->IssuedBy->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?= $Page->RowIndex ?>_IssuedBy" id="x<?= $Page->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedBy->getPlaceHolder()) ?>" value="<?= $Page->IssuedBy->EditValue ?>"<?= $Page->IssuedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IssuedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_IssuedBy" id="o<?= $Page->RowIndex ?>_IssuedBy" value="<?= HtmlEncode($Page->IssuedBy->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_IssuedBy" class="form-group">
<input type="<?= $Page->IssuedBy->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?= $Page->RowIndex ?>_IssuedBy" id="x<?= $Page->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedBy->getPlaceHolder()) ?>" value="<?= $Page->IssuedBy->EditValue ?>"<?= $Page->IssuedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IssuedBy->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_IssuedBy">
<span<?= $Page->IssuedBy->viewAttributes() ?>>
<?= $Page->IssuedBy->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
        <td data-name="IssuedTo" <?= $Page->IssuedTo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_IssuedTo" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_IssuedTo"
        name="x<?= $Page->RowIndex ?>_IssuedTo"
        class="form-control ew-select<?= $Page->IssuedTo->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo"
        data-table="view_issuing_semen"
        data-field="x_IssuedTo"
        data-value-separator="<?= $Page->IssuedTo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->IssuedTo->getPlaceHolder()) ?>"
        <?= $Page->IssuedTo->editAttributes() ?>>
        <?= $Page->IssuedTo->selectOptionListHtml("x{$Page->RowIndex}_IssuedTo") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->IssuedTo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo']"),
        options = { name: "x<?= $Page->RowIndex ?>_IssuedTo", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_issuing_semen.fields.IssuedTo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.IssuedTo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedTo" data-hidden="1" name="o<?= $Page->RowIndex ?>_IssuedTo" id="o<?= $Page->RowIndex ?>_IssuedTo" value="<?= HtmlEncode($Page->IssuedTo->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_IssuedTo" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_IssuedTo"
        name="x<?= $Page->RowIndex ?>_IssuedTo"
        class="form-control ew-select<?= $Page->IssuedTo->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo"
        data-table="view_issuing_semen"
        data-field="x_IssuedTo"
        data-value-separator="<?= $Page->IssuedTo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->IssuedTo->getPlaceHolder()) ?>"
        <?= $Page->IssuedTo->editAttributes() ?>>
        <?= $Page->IssuedTo->selectOptionListHtml("x{$Page->RowIndex}_IssuedTo") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->IssuedTo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo']"),
        options = { name: "x<?= $Page->RowIndex ?>_IssuedTo", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_issuing_semen.fields.IssuedTo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.IssuedTo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_IssuedTo">
<span<?= $Page->IssuedTo->viewAttributes() ?>>
<?= $Page->IssuedTo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <td data-name="RequestSample" <?= $Page->RequestSample->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RequestSample" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_RequestSample"
        name="x<?= $Page->RowIndex ?>_RequestSample"
        class="form-control ew-select<?= $Page->RequestSample->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_RequestSample"
        data-table="view_issuing_semen"
        data-field="x_RequestSample"
        data-value-separator="<?= $Page->RequestSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RequestSample->getPlaceHolder()) ?>"
        <?= $Page->RequestSample->editAttributes() ?>>
        <?= $Page->RequestSample->selectOptionListHtml("x{$Page->RowIndex}_RequestSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->RequestSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_RequestSample']"),
        options = { name: "x<?= $Page->RowIndex ?>_RequestSample", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_RequestSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_issuing_semen.fields.RequestSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.RequestSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" data-hidden="1" name="o<?= $Page->RowIndex ?>_RequestSample" id="o<?= $Page->RowIndex ?>_RequestSample" value="<?= HtmlEncode($Page->RequestSample->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RequestSample" class="form-group">
<span<?= $Page->RequestSample->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->RequestSample->getDisplayValue($Page->RequestSample->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" data-hidden="1" name="x<?= $Page->RowIndex ?>_RequestSample" id="x<?= $Page->RowIndex ?>_RequestSample" value="<?= HtmlEncode($Page->RequestSample->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_issuing_semen_RequestSample">
<span<?= $Page->RequestSample->viewAttributes() ?>>
<?= $Page->RequestSample->getViewValue() ?></span>
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
loadjs.ready(["fview_issuing_semenlist","load"], function () {
    fview_issuing_semenlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Page->isGridAdd())
        if (!$Page->Recordset->EOF) {
            $Page->Recordset->moveNext();
        }
}
?>
<?php
    if ($Page->isGridAdd() || $Page->isGridEdit()) {
        $Page->RowIndex = '$rowindex$';
        $Page->loadRowValues();

        // Set row properties
        $Page->resetAttributes();
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_issuing_semen", "data-rowtype" => ROWTYPE_ADD]);
        $Page->RowAttrs->appendClass("ew-template");
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
$Page->ListOptions->render("body", "left", $Page->RowIndex);
?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_view_issuing_semen_id" class="form-group view_issuing_semen_id"></span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo">
<span id="el$rowindex$_view_issuing_semen_RIDNo" class="form-group view_issuing_semen_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RIDNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_RIDNo" id="o<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<span id="el$rowindex$_view_issuing_semen_PatientName" class="form-group view_issuing_semen_PatientName">
    <select
        id="x<?= $Page->RowIndex ?>_PatientName"
        name="x<?= $Page->RowIndex ?>_PatientName"
        class="form-control ew-select<?= $Page->PatientName->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_PatientName"
        data-table="view_issuing_semen"
        data-field="x_PatientName"
        data-value-separator="<?= $Page->PatientName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>"
        <?= $Page->PatientName->editAttributes() ?>>
        <?= $Page->PatientName->selectOptionListHtml("x{$Page->RowIndex}_PatientName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
<?= $Page->PatientName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PatientName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_PatientName']"),
        options = { name: "x<?= $Page->RowIndex ?>_PatientName", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_PatientName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.PatientName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_PatientName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PatientName" id="o<?= $Page->RowIndex ?>_PatientName" value="<?= HtmlEncode($Page->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HusbandName->Visible) { // HusbandName ?>
        <td data-name="HusbandName">
<span id="el$rowindex$_view_issuing_semen_HusbandName" class="form-group view_issuing_semen_HusbandName">
    <select
        id="x<?= $Page->RowIndex ?>_HusbandName"
        name="x<?= $Page->RowIndex ?>_HusbandName"
        class="form-control ew-select<?= $Page->HusbandName->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_HusbandName"
        data-table="view_issuing_semen"
        data-field="x_HusbandName"
        data-value-separator="<?= $Page->HusbandName->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->HusbandName->getPlaceHolder()) ?>"
        <?= $Page->HusbandName->editAttributes() ?>>
        <?= $Page->HusbandName->selectOptionListHtml("x{$Page->RowIndex}_HusbandName") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->HusbandName->getErrorMessage() ?></div>
<?= $Page->HusbandName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_HusbandName") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_HusbandName']"),
        options = { name: "x<?= $Page->RowIndex ?>_HusbandName", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_HusbandName", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.HusbandName.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_HusbandName" data-hidden="1" name="o<?= $Page->RowIndex ?>_HusbandName" id="o<?= $Page->RowIndex ?>_HusbandName" value="<?= HtmlEncode($Page->HusbandName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RequestDr->Visible) { // RequestDr ?>
        <td data-name="RequestDr">
<span id="el$rowindex$_view_issuing_semen_RequestDr" class="form-group view_issuing_semen_RequestDr">
<input type="<?= $Page->RequestDr->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_RequestDr" name="x<?= $Page->RowIndex ?>_RequestDr" id="x<?= $Page->RowIndex ?>_RequestDr" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->RequestDr->getPlaceHolder()) ?>" value="<?= $Page->RequestDr->EditValue ?>"<?= $Page->RequestDr->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RequestDr->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestDr" data-hidden="1" name="o<?= $Page->RowIndex ?>_RequestDr" id="o<?= $Page->RowIndex ?>_RequestDr" value="<?= HtmlEncode($Page->RequestDr->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CollectionDate->Visible) { // CollectionDate ?>
        <td data-name="CollectionDate">
<span id="el$rowindex$_view_issuing_semen_CollectionDate" class="form-group view_issuing_semen_CollectionDate">
<input type="<?= $Page->CollectionDate->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_CollectionDate" name="x<?= $Page->RowIndex ?>_CollectionDate" id="x<?= $Page->RowIndex ?>_CollectionDate" placeholder="<?= HtmlEncode($Page->CollectionDate->getPlaceHolder()) ?>" value="<?= $Page->CollectionDate->EditValue ?>"<?= $Page->CollectionDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollectionDate->getErrorMessage() ?></div>
<?php if (!$Page->CollectionDate->ReadOnly && !$Page->CollectionDate->Disabled && !isset($Page->CollectionDate->EditAttrs["readonly"]) && !isset($Page->CollectionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_issuing_semenlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_issuing_semenlist", "x<?= $Page->RowIndex ?>_CollectionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_CollectionDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_CollectionDate" id="o<?= $Page->RowIndex ?>_CollectionDate" value="<?= HtmlEncode($Page->CollectionDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Tank->Visible) { // Tank ?>
        <td data-name="Tank">
<span id="el$rowindex$_view_issuing_semen_Tank" class="form-group view_issuing_semen_Tank">
<input type="<?= $Page->Tank->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_Tank" name="x<?= $Page->RowIndex ?>_Tank" id="x<?= $Page->RowIndex ?>_Tank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Tank->getPlaceHolder()) ?>" value="<?= $Page->Tank->EditValue ?>"<?= $Page->Tank->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Tank->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Tank" data-hidden="1" name="o<?= $Page->RowIndex ?>_Tank" id="o<?= $Page->RowIndex ?>_Tank" value="<?= HtmlEncode($Page->Tank->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Location->Visible) { // Location ?>
        <td data-name="Location">
<span id="el$rowindex$_view_issuing_semen_Location" class="form-group view_issuing_semen_Location">
<input type="<?= $Page->Location->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_Location" name="x<?= $Page->RowIndex ?>_Location" id="x<?= $Page->RowIndex ?>_Location" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Location->getPlaceHolder()) ?>" value="<?= $Page->Location->EditValue ?>"<?= $Page->Location->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Location->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_Location" data-hidden="1" name="o<?= $Page->RowIndex ?>_Location" id="o<?= $Page->RowIndex ?>_Location" value="<?= HtmlEncode($Page->Location->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->IssuedBy->Visible) { // IssuedBy ?>
        <td data-name="IssuedBy">
<span id="el$rowindex$_view_issuing_semen_IssuedBy" class="form-group view_issuing_semen_IssuedBy">
<input type="<?= $Page->IssuedBy->getInputTextType() ?>" data-table="view_issuing_semen" data-field="x_IssuedBy" name="x<?= $Page->RowIndex ?>_IssuedBy" id="x<?= $Page->RowIndex ?>_IssuedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->IssuedBy->getPlaceHolder()) ?>" value="<?= $Page->IssuedBy->EditValue ?>"<?= $Page->IssuedBy->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IssuedBy->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedBy" data-hidden="1" name="o<?= $Page->RowIndex ?>_IssuedBy" id="o<?= $Page->RowIndex ?>_IssuedBy" value="<?= HtmlEncode($Page->IssuedBy->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->IssuedTo->Visible) { // IssuedTo ?>
        <td data-name="IssuedTo">
<span id="el$rowindex$_view_issuing_semen_IssuedTo" class="form-group view_issuing_semen_IssuedTo">
    <select
        id="x<?= $Page->RowIndex ?>_IssuedTo"
        name="x<?= $Page->RowIndex ?>_IssuedTo"
        class="form-control ew-select<?= $Page->IssuedTo->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo"
        data-table="view_issuing_semen"
        data-field="x_IssuedTo"
        data-value-separator="<?= $Page->IssuedTo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->IssuedTo->getPlaceHolder()) ?>"
        <?= $Page->IssuedTo->editAttributes() ?>>
        <?= $Page->IssuedTo->selectOptionListHtml("x{$Page->RowIndex}_IssuedTo") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->IssuedTo->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo']"),
        options = { name: "x<?= $Page->RowIndex ?>_IssuedTo", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_IssuedTo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_issuing_semen.fields.IssuedTo.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.IssuedTo.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_IssuedTo" data-hidden="1" name="o<?= $Page->RowIndex ?>_IssuedTo" id="o<?= $Page->RowIndex ?>_IssuedTo" value="<?= HtmlEncode($Page->IssuedTo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RequestSample->Visible) { // RequestSample ?>
        <td data-name="RequestSample">
<span id="el$rowindex$_view_issuing_semen_RequestSample" class="form-group view_issuing_semen_RequestSample">
    <select
        id="x<?= $Page->RowIndex ?>_RequestSample"
        name="x<?= $Page->RowIndex ?>_RequestSample"
        class="form-control ew-select<?= $Page->RequestSample->isInvalidClass() ?>"
        data-select2-id="view_issuing_semen_x<?= $Page->RowIndex ?>_RequestSample"
        data-table="view_issuing_semen"
        data-field="x_RequestSample"
        data-value-separator="<?= $Page->RequestSample->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->RequestSample->getPlaceHolder()) ?>"
        <?= $Page->RequestSample->editAttributes() ?>>
        <?= $Page->RequestSample->selectOptionListHtml("x{$Page->RowIndex}_RequestSample") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->RequestSample->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='view_issuing_semen_x<?= $Page->RowIndex ?>_RequestSample']"),
        options = { name: "x<?= $Page->RowIndex ?>_RequestSample", selectId: "view_issuing_semen_x<?= $Page->RowIndex ?>_RequestSample", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.view_issuing_semen.fields.RequestSample.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.view_issuing_semen.fields.RequestSample.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="view_issuing_semen" data-field="x_RequestSample" data-hidden="1" name="o<?= $Page->RowIndex ?>_RequestSample" id="o<?= $Page->RowIndex ?>_RequestSample" value="<?= HtmlEncode($Page->RequestSample->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_issuing_semenlist","load"], function() {
    fview_issuing_semenlist.updateLists(<?= $Page->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Page->isEdit()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
<?php if ($Page->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
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
    ew.addEventHandlers("view_issuing_semen");
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
        container: "gmp_view_issuing_semen",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

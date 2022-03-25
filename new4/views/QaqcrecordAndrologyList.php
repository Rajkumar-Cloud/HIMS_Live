<?php

namespace PHPMaker2021\HIMS;

// Page object
$QaqcrecordAndrologyList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fqaqcrecord_andrologylist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fqaqcrecord_andrologylist = currentForm = new ew.Form("fqaqcrecord_andrologylist", "list");
    fqaqcrecord_andrologylist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "qaqcrecord_andrology")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.qaqcrecord_andrology)
        ew.vars.tables.qaqcrecord_andrology = currentTable;
    fqaqcrecord_andrologylist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Date", [fields.Date.visible && fields.Date.required ? ew.Validators.required(fields.Date.caption) : null, ew.Validators.datetime(0)], fields.Date.isInvalid],
        ["LN2_Level", [fields.LN2_Level.visible && fields.LN2_Level.required ? ew.Validators.required(fields.LN2_Level.caption) : null, ew.Validators.float], fields.LN2_Level.isInvalid],
        ["LN2_Checked", [fields.LN2_Checked.visible && fields.LN2_Checked.required ? ew.Validators.required(fields.LN2_Checked.caption) : null], fields.LN2_Checked.isInvalid],
        ["Incubator_Temp", [fields.Incubator_Temp.visible && fields.Incubator_Temp.required ? ew.Validators.required(fields.Incubator_Temp.caption) : null, ew.Validators.float], fields.Incubator_Temp.isInvalid],
        ["Incubator_Cleaned", [fields.Incubator_Cleaned.visible && fields.Incubator_Cleaned.required ? ew.Validators.required(fields.Incubator_Cleaned.caption) : null], fields.Incubator_Cleaned.isInvalid],
        ["LAF_MG", [fields.LAF_MG.visible && fields.LAF_MG.required ? ew.Validators.required(fields.LAF_MG.caption) : null, ew.Validators.float], fields.LAF_MG.isInvalid],
        ["LAF_Cleaned", [fields.LAF_Cleaned.visible && fields.LAF_Cleaned.required ? ew.Validators.required(fields.LAF_Cleaned.caption) : null], fields.LAF_Cleaned.isInvalid],
        ["REF_Temp", [fields.REF_Temp.visible && fields.REF_Temp.required ? ew.Validators.required(fields.REF_Temp.caption) : null, ew.Validators.float], fields.REF_Temp.isInvalid],
        ["REF_Cleaned", [fields.REF_Cleaned.visible && fields.REF_Cleaned.required ? ew.Validators.required(fields.REF_Cleaned.caption) : null], fields.REF_Cleaned.isInvalid],
        ["Heating_Temp", [fields.Heating_Temp.visible && fields.Heating_Temp.required ? ew.Validators.required(fields.Heating_Temp.caption) : null, ew.Validators.float], fields.Heating_Temp.isInvalid],
        ["Heating_Cleaned", [fields.Heating_Cleaned.visible && fields.Heating_Cleaned.required ? ew.Validators.required(fields.Heating_Cleaned.caption) : null], fields.Heating_Cleaned.isInvalid],
        ["Createdby", [fields.Createdby.visible && fields.Createdby.required ? ew.Validators.required(fields.Createdby.caption) : null], fields.Createdby.isInvalid],
        ["CreatedDate", [fields.CreatedDate.visible && fields.CreatedDate.required ? ew.Validators.required(fields.CreatedDate.caption) : null], fields.CreatedDate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fqaqcrecord_andrologylist,
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
    fqaqcrecord_andrologylist.validate = function () {
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
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        if (gridinsert && addcnt == 0) { // No row added
            ew.alert(ew.language.phrase("NoAddRecord"));
            return false;
        }
        return true;
    }

    // Check empty row
    fqaqcrecord_andrologylist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "Date", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LN2_Level", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LN2_Checked[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Incubator_Temp", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Incubator_Cleaned[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LAF_MG", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "LAF_Cleaned[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "REF_Temp", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "REF_Cleaned[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Heating_Temp", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Heating_Cleaned[]", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fqaqcrecord_andrologylist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fqaqcrecord_andrologylist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fqaqcrecord_andrologylist.lists.LN2_Checked = <?= $Page->LN2_Checked->toClientList($Page) ?>;
    fqaqcrecord_andrologylist.lists.Incubator_Cleaned = <?= $Page->Incubator_Cleaned->toClientList($Page) ?>;
    fqaqcrecord_andrologylist.lists.LAF_Cleaned = <?= $Page->LAF_Cleaned->toClientList($Page) ?>;
    fqaqcrecord_andrologylist.lists.REF_Cleaned = <?= $Page->REF_Cleaned->toClientList($Page) ?>;
    fqaqcrecord_andrologylist.lists.Heating_Cleaned = <?= $Page->Heating_Cleaned->toClientList($Page) ?>;
    loadjs.done("fqaqcrecord_andrologylist");
});
var fqaqcrecord_andrologylistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fqaqcrecord_andrologylistsrch = currentSearchForm = new ew.Form("fqaqcrecord_andrologylistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "qaqcrecord_andrology")) ?>,
        fields = currentTable.fields;
    fqaqcrecord_andrologylistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["Date", [ew.Validators.datetime(0)], fields.Date.isInvalid],
        ["y_Date", [ew.Validators.between], false],
        ["LN2_Level", [], fields.LN2_Level.isInvalid],
        ["LN2_Checked", [], fields.LN2_Checked.isInvalid],
        ["Incubator_Temp", [], fields.Incubator_Temp.isInvalid],
        ["Incubator_Cleaned", [], fields.Incubator_Cleaned.isInvalid],
        ["LAF_MG", [], fields.LAF_MG.isInvalid],
        ["LAF_Cleaned", [], fields.LAF_Cleaned.isInvalid],
        ["REF_Temp", [], fields.REF_Temp.isInvalid],
        ["REF_Cleaned", [], fields.REF_Cleaned.isInvalid],
        ["Heating_Temp", [], fields.Heating_Temp.isInvalid],
        ["Heating_Cleaned", [], fields.Heating_Cleaned.isInvalid],
        ["Createdby", [], fields.Createdby.isInvalid],
        ["CreatedDate", [], fields.CreatedDate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fqaqcrecord_andrologylistsrch.setInvalid();
    });

    // Validate form
    fqaqcrecord_andrologylistsrch.validate = function () {
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
    fqaqcrecord_andrologylistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fqaqcrecord_andrologylistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fqaqcrecord_andrologylistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fqaqcrecord_andrologylistsrch");
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
<form name="fqaqcrecord_andrologylistsrch" id="fqaqcrecord_andrologylistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fqaqcrecord_andrologylistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="qaqcrecord_andrology">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Date->Visible) { // Date ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Date" class="ew-cell form-group">
        <label for="x_Date" class="ew-search-caption ew-label"><?= $Page->Date->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_Date" id="z_Date" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Date->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Date->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Date->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Date->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Date->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Date->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="BETWEEN"<?= $Page->Date->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_qaqcrecord_andrology_Date" class="ew-search-field">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Date" name="x_Date" id="x_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fqaqcrecord_andrologylistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fqaqcrecord_andrologylistsrch", "x_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_qaqcrecord_andrology_Date" class="ew-search-field2 d-none">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Date" name="y_Date" id="y_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue2 ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage(false) ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fqaqcrecord_andrologylistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fqaqcrecord_andrologylistsrch", "y_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> qaqcrecord_andrology">
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
<form name="fqaqcrecord_andrologylist" id="fqaqcrecord_andrologylist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="qaqcrecord_andrology">
<div id="gmp_qaqcrecord_andrology" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isAdd() || $Page->isCopy() || $Page->isGridEdit()) { ?>
<table id="tbl_qaqcrecord_andrologylist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_id" class="qaqcrecord_andrology_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->Date->Visible) { // Date ?>
        <th data-name="Date" class="<?= $Page->Date->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Date" class="qaqcrecord_andrology_Date"><?= $Page->renderSort($Page->Date) ?></div></th>
<?php } ?>
<?php if ($Page->LN2_Level->Visible) { // LN2_Level ?>
        <th data-name="LN2_Level" class="<?= $Page->LN2_Level->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_LN2_Level" class="qaqcrecord_andrology_LN2_Level"><?= $Page->renderSort($Page->LN2_Level) ?></div></th>
<?php } ?>
<?php if ($Page->LN2_Checked->Visible) { // LN2_Checked ?>
        <th data-name="LN2_Checked" class="<?= $Page->LN2_Checked->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_LN2_Checked" class="qaqcrecord_andrology_LN2_Checked"><?= $Page->renderSort($Page->LN2_Checked) ?></div></th>
<?php } ?>
<?php if ($Page->Incubator_Temp->Visible) { // Incubator_Temp ?>
        <th data-name="Incubator_Temp" class="<?= $Page->Incubator_Temp->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Incubator_Temp" class="qaqcrecord_andrology_Incubator_Temp"><?= $Page->renderSort($Page->Incubator_Temp) ?></div></th>
<?php } ?>
<?php if ($Page->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
        <th data-name="Incubator_Cleaned" class="<?= $Page->Incubator_Cleaned->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Incubator_Cleaned" class="qaqcrecord_andrology_Incubator_Cleaned"><?= $Page->renderSort($Page->Incubator_Cleaned) ?></div></th>
<?php } ?>
<?php if ($Page->LAF_MG->Visible) { // LAF_MG ?>
        <th data-name="LAF_MG" class="<?= $Page->LAF_MG->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_LAF_MG" class="qaqcrecord_andrology_LAF_MG"><?= $Page->renderSort($Page->LAF_MG) ?></div></th>
<?php } ?>
<?php if ($Page->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
        <th data-name="LAF_Cleaned" class="<?= $Page->LAF_Cleaned->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_LAF_Cleaned" class="qaqcrecord_andrology_LAF_Cleaned"><?= $Page->renderSort($Page->LAF_Cleaned) ?></div></th>
<?php } ?>
<?php if ($Page->REF_Temp->Visible) { // REF_Temp ?>
        <th data-name="REF_Temp" class="<?= $Page->REF_Temp->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_REF_Temp" class="qaqcrecord_andrology_REF_Temp"><?= $Page->renderSort($Page->REF_Temp) ?></div></th>
<?php } ?>
<?php if ($Page->REF_Cleaned->Visible) { // REF_Cleaned ?>
        <th data-name="REF_Cleaned" class="<?= $Page->REF_Cleaned->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_REF_Cleaned" class="qaqcrecord_andrology_REF_Cleaned"><?= $Page->renderSort($Page->REF_Cleaned) ?></div></th>
<?php } ?>
<?php if ($Page->Heating_Temp->Visible) { // Heating_Temp ?>
        <th data-name="Heating_Temp" class="<?= $Page->Heating_Temp->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Heating_Temp" class="qaqcrecord_andrology_Heating_Temp"><?= $Page->renderSort($Page->Heating_Temp) ?></div></th>
<?php } ?>
<?php if ($Page->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
        <th data-name="Heating_Cleaned" class="<?= $Page->Heating_Cleaned->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Heating_Cleaned" class="qaqcrecord_andrology_Heating_Cleaned"><?= $Page->renderSort($Page->Heating_Cleaned) ?></div></th>
<?php } ?>
<?php if ($Page->Createdby->Visible) { // Createdby ?>
        <th data-name="Createdby" class="<?= $Page->Createdby->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_Createdby" class="qaqcrecord_andrology_Createdby"><?= $Page->renderSort($Page->Createdby) ?></div></th>
<?php } ?>
<?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <th data-name="CreatedDate" class="<?= $Page->CreatedDate->headerCellClass() ?>"><div id="elh_qaqcrecord_andrology_CreatedDate" class="qaqcrecord_andrology_CreatedDate"><?= $Page->renderSort($Page->CreatedDate) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_qaqcrecord_andrology", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_id" class="form-group qaqcrecord_andrology_id"></span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Date" class="form-group qaqcrecord_andrology_Date">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Date" name="x<?= $Page->RowIndex ?>_Date" id="x<?= $Page->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fqaqcrecord_andrologylist", "datetimepicker"], function() {
    ew.createDateTimePicker("fqaqcrecord_andrologylist", "x<?= $Page->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Date" data-hidden="1" name="o<?= $Page->RowIndex ?>_Date" id="o<?= $Page->RowIndex ?>_Date" value="<?= HtmlEncode($Page->Date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LN2_Level->Visible) { // LN2_Level ?>
        <td data-name="LN2_Level">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Level" class="form-group qaqcrecord_andrology_LN2_Level">
<input type="<?= $Page->LN2_Level->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x<?= $Page->RowIndex ?>_LN2_Level" id="x<?= $Page->RowIndex ?>_LN2_Level" size="30" placeholder="<?= HtmlEncode($Page->LN2_Level->getPlaceHolder()) ?>" value="<?= $Page->LN2_Level->EditValue ?>"<?= $Page->LN2_Level->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LN2_Level->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" data-hidden="1" name="o<?= $Page->RowIndex ?>_LN2_Level" id="o<?= $Page->RowIndex ?>_LN2_Level" value="<?= HtmlEncode($Page->LN2_Level->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LN2_Checked->Visible) { // LN2_Checked ?>
        <td data-name="LN2_Checked">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Checked" class="form-group qaqcrecord_andrology_LN2_Checked">
<template id="tp_x<?= $Page->RowIndex ?>_LN2_Checked">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" name="x<?= $Page->RowIndex ?>_LN2_Checked" id="x<?= $Page->RowIndex ?>_LN2_Checked"<?= $Page->LN2_Checked->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_LN2_Checked" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_LN2_Checked[]"
    name="x<?= $Page->RowIndex ?>_LN2_Checked[]"
    value="<?= HtmlEncode($Page->LN2_Checked->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_LN2_Checked"
    data-target="dsl_x<?= $Page->RowIndex ?>_LN2_Checked"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LN2_Checked->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LN2_Checked"
    data-value-separator="<?= $Page->LN2_Checked->displayValueSeparatorAttribute() ?>"
    <?= $Page->LN2_Checked->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LN2_Checked->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" data-hidden="1" name="o<?= $Page->RowIndex ?>_LN2_Checked[]" id="o<?= $Page->RowIndex ?>_LN2_Checked[]" value="<?= HtmlEncode($Page->LN2_Checked->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Incubator_Temp->Visible) { // Incubator_Temp ?>
        <td data-name="Incubator_Temp">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Temp" class="form-group qaqcrecord_andrology_Incubator_Temp">
<input type="<?= $Page->Incubator_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x<?= $Page->RowIndex ?>_Incubator_Temp" id="x<?= $Page->RowIndex ?>_Incubator_Temp" size="30" placeholder="<?= HtmlEncode($Page->Incubator_Temp->getPlaceHolder()) ?>" value="<?= $Page->Incubator_Temp->EditValue ?>"<?= $Page->Incubator_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator_Temp" id="o<?= $Page->RowIndex ?>_Incubator_Temp" value="<?= HtmlEncode($Page->Incubator_Temp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
        <td data-name="Incubator_Cleaned">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Cleaned" class="form-group qaqcrecord_andrology_Incubator_Cleaned">
<template id="tp_x<?= $Page->RowIndex ?>_Incubator_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" name="x<?= $Page->RowIndex ?>_Incubator_Cleaned" id="x<?= $Page->RowIndex ?>_Incubator_Cleaned"<?= $Page->Incubator_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Incubator_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Incubator_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_Incubator_Cleaned[]"
    value="<?= HtmlEncode($Page->Incubator_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Incubator_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_Incubator_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Incubator_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Incubator_Cleaned"
    data-value-separator="<?= $Page->Incubator_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Incubator_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator_Cleaned[]" id="o<?= $Page->RowIndex ?>_Incubator_Cleaned[]" value="<?= HtmlEncode($Page->Incubator_Cleaned->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LAF_MG->Visible) { // LAF_MG ?>
        <td data-name="LAF_MG">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_MG" class="form-group qaqcrecord_andrology_LAF_MG">
<input type="<?= $Page->LAF_MG->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x<?= $Page->RowIndex ?>_LAF_MG" id="x<?= $Page->RowIndex ?>_LAF_MG" size="30" placeholder="<?= HtmlEncode($Page->LAF_MG->getPlaceHolder()) ?>" value="<?= $Page->LAF_MG->EditValue ?>"<?= $Page->LAF_MG->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LAF_MG->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" data-hidden="1" name="o<?= $Page->RowIndex ?>_LAF_MG" id="o<?= $Page->RowIndex ?>_LAF_MG" value="<?= HtmlEncode($Page->LAF_MG->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
        <td data-name="LAF_Cleaned">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_Cleaned" class="form-group qaqcrecord_andrology_LAF_Cleaned">
<template id="tp_x<?= $Page->RowIndex ?>_LAF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" name="x<?= $Page->RowIndex ?>_LAF_Cleaned" id="x<?= $Page->RowIndex ?>_LAF_Cleaned"<?= $Page->LAF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_LAF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_LAF_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_LAF_Cleaned[]"
    value="<?= HtmlEncode($Page->LAF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_LAF_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_LAF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LAF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LAF_Cleaned"
    data-value-separator="<?= $Page->LAF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->LAF_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LAF_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_LAF_Cleaned[]" id="o<?= $Page->RowIndex ?>_LAF_Cleaned[]" value="<?= HtmlEncode($Page->LAF_Cleaned->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->REF_Temp->Visible) { // REF_Temp ?>
        <td data-name="REF_Temp">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Temp" class="form-group qaqcrecord_andrology_REF_Temp">
<input type="<?= $Page->REF_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x<?= $Page->RowIndex ?>_REF_Temp" id="x<?= $Page->RowIndex ?>_REF_Temp" size="30" placeholder="<?= HtmlEncode($Page->REF_Temp->getPlaceHolder()) ?>" value="<?= $Page->REF_Temp->EditValue ?>"<?= $Page->REF_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REF_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_REF_Temp" id="o<?= $Page->RowIndex ?>_REF_Temp" value="<?= HtmlEncode($Page->REF_Temp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->REF_Cleaned->Visible) { // REF_Cleaned ?>
        <td data-name="REF_Cleaned">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Cleaned" class="form-group qaqcrecord_andrology_REF_Cleaned">
<template id="tp_x<?= $Page->RowIndex ?>_REF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" name="x<?= $Page->RowIndex ?>_REF_Cleaned" id="x<?= $Page->RowIndex ?>_REF_Cleaned"<?= $Page->REF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_REF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_REF_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_REF_Cleaned[]"
    value="<?= HtmlEncode($Page->REF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_REF_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_REF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->REF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_REF_Cleaned"
    data-value-separator="<?= $Page->REF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->REF_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REF_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_REF_Cleaned[]" id="o<?= $Page->RowIndex ?>_REF_Cleaned[]" value="<?= HtmlEncode($Page->REF_Cleaned->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Heating_Temp->Visible) { // Heating_Temp ?>
        <td data-name="Heating_Temp">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Temp" class="form-group qaqcrecord_andrology_Heating_Temp">
<input type="<?= $Page->Heating_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x<?= $Page->RowIndex ?>_Heating_Temp" id="x<?= $Page->RowIndex ?>_Heating_Temp" size="30" placeholder="<?= HtmlEncode($Page->Heating_Temp->getPlaceHolder()) ?>" value="<?= $Page->Heating_Temp->EditValue ?>"<?= $Page->Heating_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Heating_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_Heating_Temp" id="o<?= $Page->RowIndex ?>_Heating_Temp" value="<?= HtmlEncode($Page->Heating_Temp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
        <td data-name="Heating_Cleaned">
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Cleaned" class="form-group qaqcrecord_andrology_Heating_Cleaned">
<template id="tp_x<?= $Page->RowIndex ?>_Heating_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" name="x<?= $Page->RowIndex ?>_Heating_Cleaned" id="x<?= $Page->RowIndex ?>_Heating_Cleaned"<?= $Page->Heating_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Heating_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Heating_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_Heating_Cleaned[]"
    value="<?= HtmlEncode($Page->Heating_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Heating_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_Heating_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Heating_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Heating_Cleaned"
    data-value-separator="<?= $Page->Heating_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Heating_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Heating_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_Heating_Cleaned[]" id="o<?= $Page->RowIndex ?>_Heating_Cleaned[]" value="<?= HtmlEncode($Page->Heating_Cleaned->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Createdby->Visible) { // Createdby ?>
        <td data-name="Createdby">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_Createdby" id="o<?= $Page->RowIndex ?>_Createdby" value="<?= HtmlEncode($Page->Createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td data-name="CreatedDate">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_CreatedDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedDate" id="o<?= $Page->RowIndex ?>_CreatedDate" value="<?= HtmlEncode($Page->CreatedDate->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
<script>
loadjs.ready(["fqaqcrecord_andrologylist","load"], function() {
    fqaqcrecord_andrologylist.updateLists(<?= $Page->RowIndex ?>);
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
if ($Page->isGridAdd())
    $Page->RowIndex = 0;
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
        if ($Page->isGridAdd()) { // Grid add
            $Page->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Page->isGridAdd() && $Page->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_qaqcrecord_andrology", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_id" class="form-group"></span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date" <?= $Page->Date->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Date" class="form-group">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Date" name="x<?= $Page->RowIndex ?>_Date" id="x<?= $Page->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fqaqcrecord_andrologylist", "datetimepicker"], function() {
    ew.createDateTimePicker("fqaqcrecord_andrologylist", "x<?= $Page->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Date" data-hidden="1" name="o<?= $Page->RowIndex ?>_Date" id="o<?= $Page->RowIndex ?>_Date" value="<?= HtmlEncode($Page->Date->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Date" class="form-group">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Date" name="x<?= $Page->RowIndex ?>_Date" id="x<?= $Page->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fqaqcrecord_andrologylist", "datetimepicker"], function() {
    ew.createDateTimePicker("fqaqcrecord_andrologylist", "x<?= $Page->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Date">
<span<?= $Page->Date->viewAttributes() ?>>
<?= $Page->Date->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LN2_Level->Visible) { // LN2_Level ?>
        <td data-name="LN2_Level" <?= $Page->LN2_Level->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Level" class="form-group">
<input type="<?= $Page->LN2_Level->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x<?= $Page->RowIndex ?>_LN2_Level" id="x<?= $Page->RowIndex ?>_LN2_Level" size="30" placeholder="<?= HtmlEncode($Page->LN2_Level->getPlaceHolder()) ?>" value="<?= $Page->LN2_Level->EditValue ?>"<?= $Page->LN2_Level->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LN2_Level->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" data-hidden="1" name="o<?= $Page->RowIndex ?>_LN2_Level" id="o<?= $Page->RowIndex ?>_LN2_Level" value="<?= HtmlEncode($Page->LN2_Level->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Level" class="form-group">
<input type="<?= $Page->LN2_Level->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x<?= $Page->RowIndex ?>_LN2_Level" id="x<?= $Page->RowIndex ?>_LN2_Level" size="30" placeholder="<?= HtmlEncode($Page->LN2_Level->getPlaceHolder()) ?>" value="<?= $Page->LN2_Level->EditValue ?>"<?= $Page->LN2_Level->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LN2_Level->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Level">
<span<?= $Page->LN2_Level->viewAttributes() ?>>
<?= $Page->LN2_Level->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LN2_Checked->Visible) { // LN2_Checked ?>
        <td data-name="LN2_Checked" <?= $Page->LN2_Checked->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Checked" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_LN2_Checked">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" name="x<?= $Page->RowIndex ?>_LN2_Checked" id="x<?= $Page->RowIndex ?>_LN2_Checked"<?= $Page->LN2_Checked->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_LN2_Checked" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_LN2_Checked[]"
    name="x<?= $Page->RowIndex ?>_LN2_Checked[]"
    value="<?= HtmlEncode($Page->LN2_Checked->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_LN2_Checked"
    data-target="dsl_x<?= $Page->RowIndex ?>_LN2_Checked"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LN2_Checked->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LN2_Checked"
    data-value-separator="<?= $Page->LN2_Checked->displayValueSeparatorAttribute() ?>"
    <?= $Page->LN2_Checked->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LN2_Checked->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" data-hidden="1" name="o<?= $Page->RowIndex ?>_LN2_Checked[]" id="o<?= $Page->RowIndex ?>_LN2_Checked[]" value="<?= HtmlEncode($Page->LN2_Checked->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Checked" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_LN2_Checked">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" name="x<?= $Page->RowIndex ?>_LN2_Checked" id="x<?= $Page->RowIndex ?>_LN2_Checked"<?= $Page->LN2_Checked->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_LN2_Checked" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_LN2_Checked[]"
    name="x<?= $Page->RowIndex ?>_LN2_Checked[]"
    value="<?= HtmlEncode($Page->LN2_Checked->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_LN2_Checked"
    data-target="dsl_x<?= $Page->RowIndex ?>_LN2_Checked"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LN2_Checked->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LN2_Checked"
    data-value-separator="<?= $Page->LN2_Checked->displayValueSeparatorAttribute() ?>"
    <?= $Page->LN2_Checked->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LN2_Checked->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LN2_Checked">
<span<?= $Page->LN2_Checked->viewAttributes() ?>>
<?= $Page->LN2_Checked->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Incubator_Temp->Visible) { // Incubator_Temp ?>
        <td data-name="Incubator_Temp" <?= $Page->Incubator_Temp->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Temp" class="form-group">
<input type="<?= $Page->Incubator_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x<?= $Page->RowIndex ?>_Incubator_Temp" id="x<?= $Page->RowIndex ?>_Incubator_Temp" size="30" placeholder="<?= HtmlEncode($Page->Incubator_Temp->getPlaceHolder()) ?>" value="<?= $Page->Incubator_Temp->EditValue ?>"<?= $Page->Incubator_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator_Temp" id="o<?= $Page->RowIndex ?>_Incubator_Temp" value="<?= HtmlEncode($Page->Incubator_Temp->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Temp" class="form-group">
<input type="<?= $Page->Incubator_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x<?= $Page->RowIndex ?>_Incubator_Temp" id="x<?= $Page->RowIndex ?>_Incubator_Temp" size="30" placeholder="<?= HtmlEncode($Page->Incubator_Temp->getPlaceHolder()) ?>" value="<?= $Page->Incubator_Temp->EditValue ?>"<?= $Page->Incubator_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator_Temp->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Temp">
<span<?= $Page->Incubator_Temp->viewAttributes() ?>>
<?= $Page->Incubator_Temp->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
        <td data-name="Incubator_Cleaned" <?= $Page->Incubator_Cleaned->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Cleaned" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Incubator_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" name="x<?= $Page->RowIndex ?>_Incubator_Cleaned" id="x<?= $Page->RowIndex ?>_Incubator_Cleaned"<?= $Page->Incubator_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Incubator_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Incubator_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_Incubator_Cleaned[]"
    value="<?= HtmlEncode($Page->Incubator_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Incubator_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_Incubator_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Incubator_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Incubator_Cleaned"
    data-value-separator="<?= $Page->Incubator_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Incubator_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator_Cleaned[]" id="o<?= $Page->RowIndex ?>_Incubator_Cleaned[]" value="<?= HtmlEncode($Page->Incubator_Cleaned->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Cleaned" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Incubator_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" name="x<?= $Page->RowIndex ?>_Incubator_Cleaned" id="x<?= $Page->RowIndex ?>_Incubator_Cleaned"<?= $Page->Incubator_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Incubator_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Incubator_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_Incubator_Cleaned[]"
    value="<?= HtmlEncode($Page->Incubator_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Incubator_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_Incubator_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Incubator_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Incubator_Cleaned"
    data-value-separator="<?= $Page->Incubator_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Incubator_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator_Cleaned->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Incubator_Cleaned">
<span<?= $Page->Incubator_Cleaned->viewAttributes() ?>>
<?= $Page->Incubator_Cleaned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LAF_MG->Visible) { // LAF_MG ?>
        <td data-name="LAF_MG" <?= $Page->LAF_MG->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_MG" class="form-group">
<input type="<?= $Page->LAF_MG->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x<?= $Page->RowIndex ?>_LAF_MG" id="x<?= $Page->RowIndex ?>_LAF_MG" size="30" placeholder="<?= HtmlEncode($Page->LAF_MG->getPlaceHolder()) ?>" value="<?= $Page->LAF_MG->EditValue ?>"<?= $Page->LAF_MG->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LAF_MG->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" data-hidden="1" name="o<?= $Page->RowIndex ?>_LAF_MG" id="o<?= $Page->RowIndex ?>_LAF_MG" value="<?= HtmlEncode($Page->LAF_MG->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_MG" class="form-group">
<input type="<?= $Page->LAF_MG->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x<?= $Page->RowIndex ?>_LAF_MG" id="x<?= $Page->RowIndex ?>_LAF_MG" size="30" placeholder="<?= HtmlEncode($Page->LAF_MG->getPlaceHolder()) ?>" value="<?= $Page->LAF_MG->EditValue ?>"<?= $Page->LAF_MG->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LAF_MG->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_MG">
<span<?= $Page->LAF_MG->viewAttributes() ?>>
<?= $Page->LAF_MG->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
        <td data-name="LAF_Cleaned" <?= $Page->LAF_Cleaned->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_Cleaned" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_LAF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" name="x<?= $Page->RowIndex ?>_LAF_Cleaned" id="x<?= $Page->RowIndex ?>_LAF_Cleaned"<?= $Page->LAF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_LAF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_LAF_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_LAF_Cleaned[]"
    value="<?= HtmlEncode($Page->LAF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_LAF_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_LAF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LAF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LAF_Cleaned"
    data-value-separator="<?= $Page->LAF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->LAF_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LAF_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_LAF_Cleaned[]" id="o<?= $Page->RowIndex ?>_LAF_Cleaned[]" value="<?= HtmlEncode($Page->LAF_Cleaned->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_Cleaned" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_LAF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" name="x<?= $Page->RowIndex ?>_LAF_Cleaned" id="x<?= $Page->RowIndex ?>_LAF_Cleaned"<?= $Page->LAF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_LAF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_LAF_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_LAF_Cleaned[]"
    value="<?= HtmlEncode($Page->LAF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_LAF_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_LAF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LAF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LAF_Cleaned"
    data-value-separator="<?= $Page->LAF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->LAF_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LAF_Cleaned->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_LAF_Cleaned">
<span<?= $Page->LAF_Cleaned->viewAttributes() ?>>
<?= $Page->LAF_Cleaned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->REF_Temp->Visible) { // REF_Temp ?>
        <td data-name="REF_Temp" <?= $Page->REF_Temp->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Temp" class="form-group">
<input type="<?= $Page->REF_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x<?= $Page->RowIndex ?>_REF_Temp" id="x<?= $Page->RowIndex ?>_REF_Temp" size="30" placeholder="<?= HtmlEncode($Page->REF_Temp->getPlaceHolder()) ?>" value="<?= $Page->REF_Temp->EditValue ?>"<?= $Page->REF_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REF_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_REF_Temp" id="o<?= $Page->RowIndex ?>_REF_Temp" value="<?= HtmlEncode($Page->REF_Temp->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Temp" class="form-group">
<input type="<?= $Page->REF_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x<?= $Page->RowIndex ?>_REF_Temp" id="x<?= $Page->RowIndex ?>_REF_Temp" size="30" placeholder="<?= HtmlEncode($Page->REF_Temp->getPlaceHolder()) ?>" value="<?= $Page->REF_Temp->EditValue ?>"<?= $Page->REF_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REF_Temp->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Temp">
<span<?= $Page->REF_Temp->viewAttributes() ?>>
<?= $Page->REF_Temp->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->REF_Cleaned->Visible) { // REF_Cleaned ?>
        <td data-name="REF_Cleaned" <?= $Page->REF_Cleaned->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Cleaned" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_REF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" name="x<?= $Page->RowIndex ?>_REF_Cleaned" id="x<?= $Page->RowIndex ?>_REF_Cleaned"<?= $Page->REF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_REF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_REF_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_REF_Cleaned[]"
    value="<?= HtmlEncode($Page->REF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_REF_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_REF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->REF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_REF_Cleaned"
    data-value-separator="<?= $Page->REF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->REF_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REF_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_REF_Cleaned[]" id="o<?= $Page->RowIndex ?>_REF_Cleaned[]" value="<?= HtmlEncode($Page->REF_Cleaned->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Cleaned" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_REF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" name="x<?= $Page->RowIndex ?>_REF_Cleaned" id="x<?= $Page->RowIndex ?>_REF_Cleaned"<?= $Page->REF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_REF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_REF_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_REF_Cleaned[]"
    value="<?= HtmlEncode($Page->REF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_REF_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_REF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->REF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_REF_Cleaned"
    data-value-separator="<?= $Page->REF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->REF_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REF_Cleaned->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_REF_Cleaned">
<span<?= $Page->REF_Cleaned->viewAttributes() ?>>
<?= $Page->REF_Cleaned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Heating_Temp->Visible) { // Heating_Temp ?>
        <td data-name="Heating_Temp" <?= $Page->Heating_Temp->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Temp" class="form-group">
<input type="<?= $Page->Heating_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x<?= $Page->RowIndex ?>_Heating_Temp" id="x<?= $Page->RowIndex ?>_Heating_Temp" size="30" placeholder="<?= HtmlEncode($Page->Heating_Temp->getPlaceHolder()) ?>" value="<?= $Page->Heating_Temp->EditValue ?>"<?= $Page->Heating_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Heating_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_Heating_Temp" id="o<?= $Page->RowIndex ?>_Heating_Temp" value="<?= HtmlEncode($Page->Heating_Temp->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Temp" class="form-group">
<input type="<?= $Page->Heating_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x<?= $Page->RowIndex ?>_Heating_Temp" id="x<?= $Page->RowIndex ?>_Heating_Temp" size="30" placeholder="<?= HtmlEncode($Page->Heating_Temp->getPlaceHolder()) ?>" value="<?= $Page->Heating_Temp->EditValue ?>"<?= $Page->Heating_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Heating_Temp->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Temp">
<span<?= $Page->Heating_Temp->viewAttributes() ?>>
<?= $Page->Heating_Temp->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
        <td data-name="Heating_Cleaned" <?= $Page->Heating_Cleaned->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Cleaned" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Heating_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" name="x<?= $Page->RowIndex ?>_Heating_Cleaned" id="x<?= $Page->RowIndex ?>_Heating_Cleaned"<?= $Page->Heating_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Heating_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Heating_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_Heating_Cleaned[]"
    value="<?= HtmlEncode($Page->Heating_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Heating_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_Heating_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Heating_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Heating_Cleaned"
    data-value-separator="<?= $Page->Heating_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Heating_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Heating_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_Heating_Cleaned[]" id="o<?= $Page->RowIndex ?>_Heating_Cleaned[]" value="<?= HtmlEncode($Page->Heating_Cleaned->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Cleaned" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Heating_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" name="x<?= $Page->RowIndex ?>_Heating_Cleaned" id="x<?= $Page->RowIndex ?>_Heating_Cleaned"<?= $Page->Heating_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Heating_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Heating_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_Heating_Cleaned[]"
    value="<?= HtmlEncode($Page->Heating_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Heating_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_Heating_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Heating_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Heating_Cleaned"
    data-value-separator="<?= $Page->Heating_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Heating_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Heating_Cleaned->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Heating_Cleaned">
<span<?= $Page->Heating_Cleaned->viewAttributes() ?>>
<?= $Page->Heating_Cleaned->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Createdby->Visible) { // Createdby ?>
        <td data-name="Createdby" <?= $Page->Createdby->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_Createdby" id="o<?= $Page->RowIndex ?>_Createdby" value="<?= HtmlEncode($Page->Createdby->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_Createdby">
<span<?= $Page->Createdby->viewAttributes() ?>>
<?= $Page->Createdby->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td data-name="CreatedDate" <?= $Page->CreatedDate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_CreatedDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedDate" id="o<?= $Page->RowIndex ?>_CreatedDate" value="<?= HtmlEncode($Page->CreatedDate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_qaqcrecord_andrology_CreatedDate">
<span<?= $Page->CreatedDate->viewAttributes() ?>>
<?= $Page->CreatedDate->getViewValue() ?></span>
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
loadjs.ready(["fqaqcrecord_andrologylist","load"], function () {
    fqaqcrecord_andrologylist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_qaqcrecord_andrology", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_qaqcrecord_andrology_id" class="form-group qaqcrecord_andrology_id"></span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Date->Visible) { // Date ?>
        <td data-name="Date">
<span id="el$rowindex$_qaqcrecord_andrology_Date" class="form-group qaqcrecord_andrology_Date">
<input type="<?= $Page->Date->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Date" name="x<?= $Page->RowIndex ?>_Date" id="x<?= $Page->RowIndex ?>_Date" placeholder="<?= HtmlEncode($Page->Date->getPlaceHolder()) ?>" value="<?= $Page->Date->EditValue ?>"<?= $Page->Date->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Date->getErrorMessage() ?></div>
<?php if (!$Page->Date->ReadOnly && !$Page->Date->Disabled && !isset($Page->Date->EditAttrs["readonly"]) && !isset($Page->Date->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fqaqcrecord_andrologylist", "datetimepicker"], function() {
    ew.createDateTimePicker("fqaqcrecord_andrologylist", "x<?= $Page->RowIndex ?>_Date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Date" data-hidden="1" name="o<?= $Page->RowIndex ?>_Date" id="o<?= $Page->RowIndex ?>_Date" value="<?= HtmlEncode($Page->Date->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LN2_Level->Visible) { // LN2_Level ?>
        <td data-name="LN2_Level">
<span id="el$rowindex$_qaqcrecord_andrology_LN2_Level" class="form-group qaqcrecord_andrology_LN2_Level">
<input type="<?= $Page->LN2_Level->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" name="x<?= $Page->RowIndex ?>_LN2_Level" id="x<?= $Page->RowIndex ?>_LN2_Level" size="30" placeholder="<?= HtmlEncode($Page->LN2_Level->getPlaceHolder()) ?>" value="<?= $Page->LN2_Level->EditValue ?>"<?= $Page->LN2_Level->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LN2_Level->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Level" data-hidden="1" name="o<?= $Page->RowIndex ?>_LN2_Level" id="o<?= $Page->RowIndex ?>_LN2_Level" value="<?= HtmlEncode($Page->LN2_Level->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LN2_Checked->Visible) { // LN2_Checked ?>
        <td data-name="LN2_Checked">
<span id="el$rowindex$_qaqcrecord_andrology_LN2_Checked" class="form-group qaqcrecord_andrology_LN2_Checked">
<template id="tp_x<?= $Page->RowIndex ?>_LN2_Checked">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" name="x<?= $Page->RowIndex ?>_LN2_Checked" id="x<?= $Page->RowIndex ?>_LN2_Checked"<?= $Page->LN2_Checked->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_LN2_Checked" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_LN2_Checked[]"
    name="x<?= $Page->RowIndex ?>_LN2_Checked[]"
    value="<?= HtmlEncode($Page->LN2_Checked->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_LN2_Checked"
    data-target="dsl_x<?= $Page->RowIndex ?>_LN2_Checked"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LN2_Checked->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LN2_Checked"
    data-value-separator="<?= $Page->LN2_Checked->displayValueSeparatorAttribute() ?>"
    <?= $Page->LN2_Checked->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LN2_Checked->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LN2_Checked" data-hidden="1" name="o<?= $Page->RowIndex ?>_LN2_Checked[]" id="o<?= $Page->RowIndex ?>_LN2_Checked[]" value="<?= HtmlEncode($Page->LN2_Checked->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Incubator_Temp->Visible) { // Incubator_Temp ?>
        <td data-name="Incubator_Temp">
<span id="el$rowindex$_qaqcrecord_andrology_Incubator_Temp" class="form-group qaqcrecord_andrology_Incubator_Temp">
<input type="<?= $Page->Incubator_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" name="x<?= $Page->RowIndex ?>_Incubator_Temp" id="x<?= $Page->RowIndex ?>_Incubator_Temp" size="30" placeholder="<?= HtmlEncode($Page->Incubator_Temp->getPlaceHolder()) ?>" value="<?= $Page->Incubator_Temp->EditValue ?>"<?= $Page->Incubator_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator_Temp" id="o<?= $Page->RowIndex ?>_Incubator_Temp" value="<?= HtmlEncode($Page->Incubator_Temp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Incubator_Cleaned->Visible) { // Incubator_Cleaned ?>
        <td data-name="Incubator_Cleaned">
<span id="el$rowindex$_qaqcrecord_andrology_Incubator_Cleaned" class="form-group qaqcrecord_andrology_Incubator_Cleaned">
<template id="tp_x<?= $Page->RowIndex ?>_Incubator_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" name="x<?= $Page->RowIndex ?>_Incubator_Cleaned" id="x<?= $Page->RowIndex ?>_Incubator_Cleaned"<?= $Page->Incubator_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Incubator_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Incubator_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_Incubator_Cleaned[]"
    value="<?= HtmlEncode($Page->Incubator_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Incubator_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_Incubator_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Incubator_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Incubator_Cleaned"
    data-value-separator="<?= $Page->Incubator_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Incubator_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Incubator_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Incubator_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_Incubator_Cleaned[]" id="o<?= $Page->RowIndex ?>_Incubator_Cleaned[]" value="<?= HtmlEncode($Page->Incubator_Cleaned->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LAF_MG->Visible) { // LAF_MG ?>
        <td data-name="LAF_MG">
<span id="el$rowindex$_qaqcrecord_andrology_LAF_MG" class="form-group qaqcrecord_andrology_LAF_MG">
<input type="<?= $Page->LAF_MG->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" name="x<?= $Page->RowIndex ?>_LAF_MG" id="x<?= $Page->RowIndex ?>_LAF_MG" size="30" placeholder="<?= HtmlEncode($Page->LAF_MG->getPlaceHolder()) ?>" value="<?= $Page->LAF_MG->EditValue ?>"<?= $Page->LAF_MG->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LAF_MG->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_MG" data-hidden="1" name="o<?= $Page->RowIndex ?>_LAF_MG" id="o<?= $Page->RowIndex ?>_LAF_MG" value="<?= HtmlEncode($Page->LAF_MG->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->LAF_Cleaned->Visible) { // LAF_Cleaned ?>
        <td data-name="LAF_Cleaned">
<span id="el$rowindex$_qaqcrecord_andrology_LAF_Cleaned" class="form-group qaqcrecord_andrology_LAF_Cleaned">
<template id="tp_x<?= $Page->RowIndex ?>_LAF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" name="x<?= $Page->RowIndex ?>_LAF_Cleaned" id="x<?= $Page->RowIndex ?>_LAF_Cleaned"<?= $Page->LAF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_LAF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_LAF_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_LAF_Cleaned[]"
    value="<?= HtmlEncode($Page->LAF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_LAF_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_LAF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->LAF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_LAF_Cleaned"
    data-value-separator="<?= $Page->LAF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->LAF_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LAF_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_LAF_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_LAF_Cleaned[]" id="o<?= $Page->RowIndex ?>_LAF_Cleaned[]" value="<?= HtmlEncode($Page->LAF_Cleaned->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->REF_Temp->Visible) { // REF_Temp ?>
        <td data-name="REF_Temp">
<span id="el$rowindex$_qaqcrecord_andrology_REF_Temp" class="form-group qaqcrecord_andrology_REF_Temp">
<input type="<?= $Page->REF_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" name="x<?= $Page->RowIndex ?>_REF_Temp" id="x<?= $Page->RowIndex ?>_REF_Temp" size="30" placeholder="<?= HtmlEncode($Page->REF_Temp->getPlaceHolder()) ?>" value="<?= $Page->REF_Temp->EditValue ?>"<?= $Page->REF_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REF_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_REF_Temp" id="o<?= $Page->RowIndex ?>_REF_Temp" value="<?= HtmlEncode($Page->REF_Temp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->REF_Cleaned->Visible) { // REF_Cleaned ?>
        <td data-name="REF_Cleaned">
<span id="el$rowindex$_qaqcrecord_andrology_REF_Cleaned" class="form-group qaqcrecord_andrology_REF_Cleaned">
<template id="tp_x<?= $Page->RowIndex ?>_REF_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" name="x<?= $Page->RowIndex ?>_REF_Cleaned" id="x<?= $Page->RowIndex ?>_REF_Cleaned"<?= $Page->REF_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_REF_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_REF_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_REF_Cleaned[]"
    value="<?= HtmlEncode($Page->REF_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_REF_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_REF_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->REF_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_REF_Cleaned"
    data-value-separator="<?= $Page->REF_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->REF_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REF_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_REF_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_REF_Cleaned[]" id="o<?= $Page->RowIndex ?>_REF_Cleaned[]" value="<?= HtmlEncode($Page->REF_Cleaned->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Heating_Temp->Visible) { // Heating_Temp ?>
        <td data-name="Heating_Temp">
<span id="el$rowindex$_qaqcrecord_andrology_Heating_Temp" class="form-group qaqcrecord_andrology_Heating_Temp">
<input type="<?= $Page->Heating_Temp->getInputTextType() ?>" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" name="x<?= $Page->RowIndex ?>_Heating_Temp" id="x<?= $Page->RowIndex ?>_Heating_Temp" size="30" placeholder="<?= HtmlEncode($Page->Heating_Temp->getPlaceHolder()) ?>" value="<?= $Page->Heating_Temp->EditValue ?>"<?= $Page->Heating_Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Heating_Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Temp" data-hidden="1" name="o<?= $Page->RowIndex ?>_Heating_Temp" id="o<?= $Page->RowIndex ?>_Heating_Temp" value="<?= HtmlEncode($Page->Heating_Temp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Heating_Cleaned->Visible) { // Heating_Cleaned ?>
        <td data-name="Heating_Cleaned">
<span id="el$rowindex$_qaqcrecord_andrology_Heating_Cleaned" class="form-group qaqcrecord_andrology_Heating_Cleaned">
<template id="tp_x<?= $Page->RowIndex ?>_Heating_Cleaned">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" name="x<?= $Page->RowIndex ?>_Heating_Cleaned" id="x<?= $Page->RowIndex ?>_Heating_Cleaned"<?= $Page->Heating_Cleaned->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Heating_Cleaned" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Heating_Cleaned[]"
    name="x<?= $Page->RowIndex ?>_Heating_Cleaned[]"
    value="<?= HtmlEncode($Page->Heating_Cleaned->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Heating_Cleaned"
    data-target="dsl_x<?= $Page->RowIndex ?>_Heating_Cleaned"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Heating_Cleaned->isInvalidClass() ?>"
    data-table="qaqcrecord_andrology"
    data-field="x_Heating_Cleaned"
    data-value-separator="<?= $Page->Heating_Cleaned->displayValueSeparatorAttribute() ?>"
    <?= $Page->Heating_Cleaned->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Heating_Cleaned->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Heating_Cleaned" data-hidden="1" name="o<?= $Page->RowIndex ?>_Heating_Cleaned[]" id="o<?= $Page->RowIndex ?>_Heating_Cleaned[]" value="<?= HtmlEncode($Page->Heating_Cleaned->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Createdby->Visible) { // Createdby ?>
        <td data-name="Createdby">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_Createdby" data-hidden="1" name="o<?= $Page->RowIndex ?>_Createdby" id="o<?= $Page->RowIndex ?>_Createdby" value="<?= HtmlEncode($Page->Createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CreatedDate->Visible) { // CreatedDate ?>
        <td data-name="CreatedDate">
<input type="hidden" data-table="qaqcrecord_andrology" data-field="x_CreatedDate" data-hidden="1" name="o<?= $Page->RowIndex ?>_CreatedDate" id="o<?= $Page->RowIndex ?>_CreatedDate" value="<?= HtmlEncode($Page->CreatedDate->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fqaqcrecord_andrologylist","load"], function() {
    fqaqcrecord_andrologylist.updateLists(<?= $Page->RowIndex ?>);
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
<?php if ($Page->isAdd() || $Page->isCopy()) { ?>
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php } ?>
<?php if ($Page->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?= $Page->FormKeyCountName ?>" id="<?= $Page->FormKeyCountName ?>" value="<?= $Page->KeyCount ?>">
<?= $Page->MultiSelectKey ?>
<?php } ?>
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
    ew.addEventHandlers("qaqcrecord_andrology");
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
        container: "gmp_qaqcrecord_andrology",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

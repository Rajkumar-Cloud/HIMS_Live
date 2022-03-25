<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewPharmacyConsumptionList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_pharmacy_consumptionlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_pharmacy_consumptionlist = currentForm = new ew.Form("fview_pharmacy_consumptionlist", "list");
    fview_pharmacy_consumptionlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_consumption")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_pharmacy_consumption)
        ew.vars.tables.view_pharmacy_consumption = currentTable;
    fview_pharmacy_consumptionlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["DES", [fields.DES.visible && fields.DES.required ? ew.Validators.required(fields.DES.caption) : null], fields.DES.isInvalid],
        ["BATCH", [fields.BATCH.visible && fields.BATCH.required ? ew.Validators.required(fields.BATCH.caption) : null], fields.BATCH.isInvalid],
        ["Stock", [fields.Stock.visible && fields.Stock.required ? ew.Validators.required(fields.Stock.caption) : null], fields.Stock.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null], fields.EXPDT.isInvalid],
        ["BILLDATE", [fields.BILLDATE.visible && fields.BILLDATE.required ? ew.Validators.required(fields.BILLDATE.caption) : null], fields.BILLDATE.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["Select", [fields.Select.visible && fields.Select.required ? ew.Validators.required(fields.Select.caption) : null], fields.Select.isInvalid],
        ["ConsQTY", [fields.ConsQTY.visible && fields.ConsQTY.required ? ew.Validators.required(fields.ConsQTY.caption) : null], fields.ConsQTY.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_pharmacy_consumptionlist,
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
    fview_pharmacy_consumptionlist.validate = function () {
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
    fview_pharmacy_consumptionlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_consumptionlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_pharmacy_consumptionlist.lists.Select = <?= $Page->Select->toClientList($Page) ?>;
    loadjs.done("fview_pharmacy_consumptionlist");
});
var fview_pharmacy_consumptionlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_pharmacy_consumptionlistsrch = currentSearchForm = new ew.Form("fview_pharmacy_consumptionlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_pharmacy_consumption")) ?>,
        fields = currentTable.fields;
    fview_pharmacy_consumptionlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["DES", [], fields.DES.isInvalid],
        ["BATCH", [], fields.BATCH.isInvalid],
        ["Stock", [ew.Validators.integer], fields.Stock.isInvalid],
        ["y_Stock", [ew.Validators.between], false],
        ["EXPDT", [ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["y_EXPDT", [ew.Validators.between], false],
        ["BILLDATE", [ew.Validators.datetime(0)], fields.BILLDATE.isInvalid],
        ["y_BILLDATE", [ew.Validators.between], false],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["Select", [], fields.Select.isInvalid],
        ["ConsQTY", [], fields.ConsQTY.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_pharmacy_consumptionlistsrch.setInvalid();
    });

    // Validate form
    fview_pharmacy_consumptionlistsrch.validate = function () {
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
    fview_pharmacy_consumptionlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_pharmacy_consumptionlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_pharmacy_consumptionlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_pharmacy_consumptionlistsrch");
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
<form name="fview_pharmacy_consumptionlistsrch" id="fview_pharmacy_consumptionlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_pharmacy_consumptionlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_pharmacy_consumption">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->DES->Visible) { // DES ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DES" class="ew-cell form-group">
        <label for="x_DES" class="ew-search-caption ew-label"><?= $Page->DES->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
        <span id="el_view_pharmacy_consumption_DES" class="ew-search-field">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Stock" class="ew-cell form-group">
        <label for="x_Stock" class="ew-search-caption ew-label"><?= $Page->Stock->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_Stock" id="z_Stock" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->Stock->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->Stock->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->Stock->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->Stock->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->Stock->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->Stock->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->Stock->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->Stock->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->Stock->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_consumption_Stock" class="ew-search-field">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x_Stock" id="x_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage(false) ?></div>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_consumption_Stock" class="ew-search-field2 d-none">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_Stock" name="y_Stock" id="y_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue2 ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_EXPDT" class="ew-cell form-group">
        <label for="x_EXPDT" class="ew-search-caption ew-label"><?= $Page->EXPDT->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_EXPDT" id="z_EXPDT" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->EXPDT->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->EXPDT->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_consumption_EXPDT" class="ew-search-field">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage(false) ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionlistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_consumption_EXPDT" class="ew-search-field2 d-none">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue2 ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage(false) ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionlistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_BILLDATE" class="ew-cell form-group">
        <label for="x_BILLDATE" class="ew-search-caption ew-label"><?= $Page->BILLDATE->caption() ?></label>
        <span class="ew-search-operator">
<select name="z_BILLDATE" id="z_BILLDATE" class="custom-select" onchange="ew.searchOperatorChanged(this);">
<option value="="<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "=" ? " selected" : "" ?>><?= $Language->phrase("EQUAL") ?></option>
<option value="&lt;&gt;"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "<>" ? " selected" : "" ?>><?= $Language->phrase("<>") ?></option>
<option value="&lt;"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "<" ? " selected" : "" ?>><?= $Language->phrase("<") ?></option>
<option value="&lt;="<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "<=" ? " selected" : "" ?>><?= $Language->phrase("<=") ?></option>
<option value="&gt;"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == ">" ? " selected" : "" ?>><?= $Language->phrase(">") ?></option>
<option value="&gt;="<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == ">=" ? " selected" : "" ?>><?= $Language->phrase(">=") ?></option>
<option value="IS NULL"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "IS NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NULL") ?></option>
<option value="IS NOT NULL"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "IS NOT NULL" ? " selected" : "" ?>><?= $Language->phrase("IS NOT NULL") ?></option>
<option value="BETWEEN"<?= $Page->BILLDATE->AdvancedSearch->SearchOperator == "BETWEEN" ? " selected" : "" ?>><?= $Language->phrase("BETWEEN") ?></option>
</select>
</span>
        <span id="el_view_pharmacy_consumption_BILLDATE" class="ew-search-field">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage(false) ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionlistsrch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_view_pharmacy_consumption_BILLDATE" class="ew-search-field2 d-none">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="y_BILLDATE" id="y_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue2 ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage(false) ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionlistsrch", "y_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_pharmacy_consumption">
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
<form name="fview_pharmacy_consumptionlist" id="fview_pharmacy_consumptionlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_pharmacy_consumption">
<div id="gmp_view_pharmacy_consumption" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_view_pharmacy_consumptionlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_id" class="view_pharmacy_consumption_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_PRC" class="view_pharmacy_consumption_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <th data-name="DES" class="<?= $Page->DES->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_DES" class="view_pharmacy_consumption_DES"><?= $Page->renderSort($Page->DES) ?></div></th>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
        <th data-name="BATCH" class="<?= $Page->BATCH->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_BATCH" class="view_pharmacy_consumption_BATCH"><?= $Page->renderSort($Page->BATCH) ?></div></th>
<?php } ?>
<?php if ($Page->Stock->Visible) { // Stock ?>
        <th data-name="Stock" class="<?= $Page->Stock->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_Stock" class="view_pharmacy_consumption_Stock"><?= $Page->renderSort($Page->Stock) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_EXPDT" class="view_pharmacy_consumption_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <th data-name="BILLDATE" class="<?= $Page->BILLDATE->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_BILLDATE" class="view_pharmacy_consumption_BILLDATE"><?= $Page->renderSort($Page->BILLDATE) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_MFRCODE" class="view_pharmacy_consumption_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->Select->Visible) { // Select ?>
        <th data-name="Select" class="<?= $Page->Select->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_Select" class="view_pharmacy_consumption_Select"><?= $Page->renderSort($Page->Select) ?></div></th>
<?php } ?>
<?php if ($Page->ConsQTY->Visible) { // ConsQTY ?>
        <th data-name="ConsQTY" class="<?= $Page->ConsQTY->headerCellClass() ?>"><div id="elh_view_pharmacy_consumption_ConsQTY" class="view_pharmacy_consumption_ConsQTY"><?= $Page->renderSort($Page->ConsQTY) ?></div></th>
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
        if ($Page->isGridEdit() && ($Page->RowType == ROWTYPE_EDIT || $Page->RowType == ROWTYPE_ADD) && $Page->EventCancelled) { // Update failed
            $Page->restoreCurrentRowFormValues($Page->RowIndex); // Restore form values
        }
        if ($Page->RowType == ROWTYPE_EDIT) { // Edit row
            $Page->EditRowCount++;
        }

        // Set up row id / data-rowindex
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_pharmacy_consumption", "data-rowtype" => $Page->RowType]);

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
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_id" class="form-group"></span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_pharmacy_consumption" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_PRC" class="form-group">
<span<?= $Page->PRC->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PRC->getDisplayValue($Page->PRC->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_PRC" data-hidden="1" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES" <?= $Page->DES->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_DES" class="form-group">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_DES" name="x<?= $Page->RowIndex ?>_DES" id="x<?= $Page->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_DES" data-hidden="1" name="o<?= $Page->RowIndex ?>_DES" id="o<?= $Page->RowIndex ?>_DES" value="<?= HtmlEncode($Page->DES->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_DES" class="form-group">
<span<?= $Page->DES->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->DES->getDisplayValue($Page->DES->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_DES" data-hidden="1" name="x<?= $Page->RowIndex ?>_DES" id="x<?= $Page->RowIndex ?>_DES" value="<?= HtmlEncode($Page->DES->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_DES">
<span<?= $Page->DES->viewAttributes() ?>>
<?= $Page->DES->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BATCH->Visible) { // BATCH ?>
        <td data-name="BATCH" <?= $Page->BATCH->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_BATCH" class="form-group">
<input type="<?= $Page->BATCH->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="x<?= $Page->RowIndex ?>_BATCH" id="x<?= $Page->RowIndex ?>_BATCH" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCH->getPlaceHolder()) ?>" value="<?= $Page->BATCH->EditValue ?>"<?= $Page->BATCH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BATCH" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCH" id="o<?= $Page->RowIndex ?>_BATCH" value="<?= HtmlEncode($Page->BATCH->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_BATCH" class="form-group">
<span<?= $Page->BATCH->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BATCH->getDisplayValue($Page->BATCH->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BATCH" data-hidden="1" name="x<?= $Page->RowIndex ?>_BATCH" id="x<?= $Page->RowIndex ?>_BATCH" value="<?= HtmlEncode($Page->BATCH->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_BATCH">
<span<?= $Page->BATCH->viewAttributes() ?>>
<?= $Page->BATCH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Stock->Visible) { // Stock ?>
        <td data-name="Stock" <?= $Page->Stock->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_Stock" class="form-group">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x<?= $Page->RowIndex ?>_Stock" id="x<?= $Page->RowIndex ?>_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Stock" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stock" id="o<?= $Page->RowIndex ?>_Stock" value="<?= HtmlEncode($Page->Stock->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_Stock" class="form-group">
<span<?= $Page->Stock->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Stock->getDisplayValue($Page->Stock->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Stock" data-hidden="1" name="x<?= $Page->RowIndex ?>_Stock" id="x<?= $Page->RowIndex ?>_Stock" value="<?= HtmlEncode($Page->Stock->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_Stock">
<span<?= $Page->Stock->viewAttributes() ?>>
<?= $Page->Stock->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_EXPDT" class="form-group">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->EXPDT->getDisplayValue($Page->EXPDT->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_EXPDT" data-hidden="1" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <td data-name="BILLDATE" <?= $Page->BILLDATE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_BILLDATE" class="form-group">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x<?= $Page->RowIndex ?>_BILLDATE" id="x<?= $Page->RowIndex ?>_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage() ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionlist", "x<?= $Page->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BILLDATE" id="o<?= $Page->RowIndex ?>_BILLDATE" value="<?= HtmlEncode($Page->BILLDATE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_BILLDATE" class="form-group">
<span<?= $Page->BILLDATE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->BILLDATE->getDisplayValue($Page->BILLDATE->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" data-hidden="1" name="x<?= $Page->RowIndex ?>_BILLDATE" id="x<?= $Page->RowIndex ?>_BILLDATE" value="<?= HtmlEncode($Page->BILLDATE->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_BILLDATE">
<span<?= $Page->BILLDATE->viewAttributes() ?>>
<?= $Page->BILLDATE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_MFRCODE" class="form-group">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_MFRCODE" id="o<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_MFRCODE" class="form-group">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->MFRCODE->getDisplayValue($Page->MFRCODE->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" data-hidden="1" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Select->Visible) { // Select ?>
        <td data-name="Select" <?= $Page->Select->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_Select" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Select">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_pharmacy_consumption" data-field="x_Select" name="x<?= $Page->RowIndex ?>_Select" id="x<?= $Page->RowIndex ?>_Select"<?= $Page->Select->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Select" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Select[]"
    name="x<?= $Page->RowIndex ?>_Select[]"
    value="<?= HtmlEncode($Page->Select->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Select"
    data-target="dsl_x<?= $Page->RowIndex ?>_Select"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Select->isInvalidClass() ?>"
    data-table="view_pharmacy_consumption"
    data-field="x_Select"
    data-value-separator="<?= $Page->Select->displayValueSeparatorAttribute() ?>"
    <?= $Page->Select->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Select->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Select" data-hidden="1" name="o<?= $Page->RowIndex ?>_Select[]" id="o<?= $Page->RowIndex ?>_Select[]" value="<?= HtmlEncode($Page->Select->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_Select" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Select">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_pharmacy_consumption" data-field="x_Select" name="x<?= $Page->RowIndex ?>_Select" id="x<?= $Page->RowIndex ?>_Select"<?= $Page->Select->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Select" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Select[]"
    name="x<?= $Page->RowIndex ?>_Select[]"
    value="<?= HtmlEncode($Page->Select->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Select"
    data-target="dsl_x<?= $Page->RowIndex ?>_Select"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Select->isInvalidClass() ?>"
    data-table="view_pharmacy_consumption"
    data-field="x_Select"
    data-value-separator="<?= $Page->Select->displayValueSeparatorAttribute() ?>"
    <?= $Page->Select->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Select->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_Select">
<span<?= $Page->Select->viewAttributes() ?>>
<?= $Page->Select->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ConsQTY->Visible) { // ConsQTY ?>
        <td data-name="ConsQTY" <?= $Page->ConsQTY->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_ConsQTY" class="form-group">
<input type="<?= $Page->ConsQTY->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="x<?= $Page->RowIndex ?>_ConsQTY" id="x<?= $Page->RowIndex ?>_ConsQTY" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->ConsQTY->getPlaceHolder()) ?>" value="<?= $Page->ConsQTY->EditValue ?>"<?= $Page->ConsQTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ConsQTY->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" data-hidden="1" name="o<?= $Page->RowIndex ?>_ConsQTY" id="o<?= $Page->RowIndex ?>_ConsQTY" value="<?= HtmlEncode($Page->ConsQTY->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_ConsQTY" class="form-group">
<input type="<?= $Page->ConsQTY->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="x<?= $Page->RowIndex ?>_ConsQTY" id="x<?= $Page->RowIndex ?>_ConsQTY" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->ConsQTY->getPlaceHolder()) ?>" value="<?= $Page->ConsQTY->EditValue ?>"<?= $Page->ConsQTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ConsQTY->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_pharmacy_consumption_ConsQTY">
<span<?= $Page->ConsQTY->viewAttributes() ?>>
<?= $Page->ConsQTY->getViewValue() ?></span>
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
loadjs.ready(["fview_pharmacy_consumptionlist","load"], function () {
    fview_pharmacy_consumptionlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_view_pharmacy_consumption", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_view_pharmacy_consumption_id" class="form-group view_pharmacy_consumption_id"></span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_view_pharmacy_consumption_PRC" class="form-group view_pharmacy_consumption_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES">
<span id="el$rowindex$_view_pharmacy_consumption_DES" class="form-group view_pharmacy_consumption_DES">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_DES" name="x<?= $Page->RowIndex ?>_DES" id="x<?= $Page->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_DES" data-hidden="1" name="o<?= $Page->RowIndex ?>_DES" id="o<?= $Page->RowIndex ?>_DES" value="<?= HtmlEncode($Page->DES->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BATCH->Visible) { // BATCH ?>
        <td data-name="BATCH">
<span id="el$rowindex$_view_pharmacy_consumption_BATCH" class="form-group view_pharmacy_consumption_BATCH">
<input type="<?= $Page->BATCH->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BATCH" name="x<?= $Page->RowIndex ?>_BATCH" id="x<?= $Page->RowIndex ?>_BATCH" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCH->getPlaceHolder()) ?>" value="<?= $Page->BATCH->EditValue ?>"<?= $Page->BATCH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BATCH" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCH" id="o<?= $Page->RowIndex ?>_BATCH" value="<?= HtmlEncode($Page->BATCH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Stock->Visible) { // Stock ?>
        <td data-name="Stock">
<span id="el$rowindex$_view_pharmacy_consumption_Stock" class="form-group view_pharmacy_consumption_Stock">
<input type="<?= $Page->Stock->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_Stock" name="x<?= $Page->RowIndex ?>_Stock" id="x<?= $Page->RowIndex ?>_Stock" size="30" placeholder="<?= HtmlEncode($Page->Stock->getPlaceHolder()) ?>" value="<?= $Page->Stock->EditValue ?>"<?= $Page->Stock->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stock->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Stock" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stock" id="o<?= $Page->RowIndex ?>_Stock" value="<?= HtmlEncode($Page->Stock->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT">
<span id="el$rowindex$_view_pharmacy_consumption_EXPDT" class="form-group view_pharmacy_consumption_EXPDT">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <td data-name="BILLDATE">
<span id="el$rowindex$_view_pharmacy_consumption_BILLDATE" class="form-group view_pharmacy_consumption_BILLDATE">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" name="x<?= $Page->RowIndex ?>_BILLDATE" id="x<?= $Page->RowIndex ?>_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage() ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_pharmacy_consumptionlist", "x<?= $Page->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_BILLDATE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BILLDATE" id="o<?= $Page->RowIndex ?>_BILLDATE" value="<?= HtmlEncode($Page->BILLDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE">
<span id="el$rowindex$_view_pharmacy_consumption_MFRCODE" class="form-group view_pharmacy_consumption_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_MFRCODE" id="o<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Select->Visible) { // Select ?>
        <td data-name="Select">
<span id="el$rowindex$_view_pharmacy_consumption_Select" class="form-group view_pharmacy_consumption_Select">
<template id="tp_x<?= $Page->RowIndex ?>_Select">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_pharmacy_consumption" data-field="x_Select" name="x<?= $Page->RowIndex ?>_Select" id="x<?= $Page->RowIndex ?>_Select"<?= $Page->Select->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Select" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Select[]"
    name="x<?= $Page->RowIndex ?>_Select[]"
    value="<?= HtmlEncode($Page->Select->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Page->RowIndex ?>_Select"
    data-target="dsl_x<?= $Page->RowIndex ?>_Select"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Select->isInvalidClass() ?>"
    data-table="view_pharmacy_consumption"
    data-field="x_Select"
    data-value-separator="<?= $Page->Select->displayValueSeparatorAttribute() ?>"
    <?= $Page->Select->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Select->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_Select" data-hidden="1" name="o<?= $Page->RowIndex ?>_Select[]" id="o<?= $Page->RowIndex ?>_Select[]" value="<?= HtmlEncode($Page->Select->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ConsQTY->Visible) { // ConsQTY ?>
        <td data-name="ConsQTY">
<span id="el$rowindex$_view_pharmacy_consumption_ConsQTY" class="form-group view_pharmacy_consumption_ConsQTY">
<input type="<?= $Page->ConsQTY->getInputTextType() ?>" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" name="x<?= $Page->RowIndex ?>_ConsQTY" id="x<?= $Page->RowIndex ?>_ConsQTY" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->ConsQTY->getPlaceHolder()) ?>" value="<?= $Page->ConsQTY->EditValue ?>"<?= $Page->ConsQTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ConsQTY->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_pharmacy_consumption" data-field="x_ConsQTY" data-hidden="1" name="o<?= $Page->RowIndex ?>_ConsQTY" id="o<?= $Page->RowIndex ?>_ConsQTY" value="<?= HtmlEncode($Page->ConsQTY->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fview_pharmacy_consumptionlist","load"], function() {
    fview_pharmacy_consumptionlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("view_pharmacy_consumption");
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
        container: "gmp_view_pharmacy_consumption",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

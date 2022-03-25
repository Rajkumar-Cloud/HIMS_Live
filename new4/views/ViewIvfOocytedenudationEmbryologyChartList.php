<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewIvfOocytedenudationEmbryologyChartList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fview_ivf_oocytedenudation_embryology_chartlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fview_ivf_oocytedenudation_embryology_chartlist = currentForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartlist", "list");
    fview_ivf_oocytedenudation_embryology_chartlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ivf_oocytedenudation_embryology_chart")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_ivf_oocytedenudation_embryology_chart)
        ew.vars.tables.view_ivf_oocytedenudation_embryology_chart = currentTable;
    fview_ivf_oocytedenudation_embryology_chartlist.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["OocyteNo", [fields.OocyteNo.visible && fields.OocyteNo.required ? ew.Validators.required(fields.OocyteNo.caption) : null], fields.OocyteNo.isInvalid],
        ["Stage", [fields.Stage.visible && fields.Stage.required ? ew.Validators.required(fields.Stage.caption) : null], fields.Stage.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null, ew.Validators.integer], fields.RIDNo.isInvalid],
        ["Name", [fields.Name.visible && fields.Name.required ? ew.Validators.required(fields.Name.caption) : null], fields.Name.isInvalid],
        ["Day0OocyteStage", [fields.Day0OocyteStage.visible && fields.Day0OocyteStage.required ? ew.Validators.required(fields.Day0OocyteStage.caption) : null], fields.Day0OocyteStage.isInvalid],
        ["Day0sino", [fields.Day0sino.visible && fields.Day0sino.required ? ew.Validators.required(fields.Day0sino.caption) : null], fields.Day0sino.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["DidNO", [fields.DidNO.visible && fields.DidNO.required ? ew.Validators.required(fields.DidNO.caption) : null], fields.DidNO.isInvalid],
        ["Remarks", [fields.Remarks.visible && fields.Remarks.required ? ew.Validators.required(fields.Remarks.caption) : null], fields.Remarks.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_ivf_oocytedenudation_embryology_chartlist,
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
    fview_ivf_oocytedenudation_embryology_chartlist.validate = function () {
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
    fview_ivf_oocytedenudation_embryology_chartlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ivf_oocytedenudation_embryology_chartlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fview_ivf_oocytedenudation_embryology_chartlist");
});
var fview_ivf_oocytedenudation_embryology_chartlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fview_ivf_oocytedenudation_embryology_chartlistsrch = currentSearchForm = new ew.Form("fview_ivf_oocytedenudation_embryology_chartlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_ivf_oocytedenudation_embryology_chart")) ?>,
        fields = currentTable.fields;
    fview_ivf_oocytedenudation_embryology_chartlistsrch.addFields([
        ["id", [], fields.id.isInvalid],
        ["OocyteNo", [], fields.OocyteNo.isInvalid],
        ["Stage", [], fields.Stage.isInvalid],
        ["RIDNo", [], fields.RIDNo.isInvalid],
        ["Name", [], fields.Name.isInvalid],
        ["Day0OocyteStage", [], fields.Day0OocyteStage.isInvalid],
        ["Day0sino", [], fields.Day0sino.isInvalid],
        ["TidNo", [], fields.TidNo.isInvalid],
        ["DidNO", [], fields.DidNO.isInvalid],
        ["Remarks", [], fields.Remarks.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fview_ivf_oocytedenudation_embryology_chartlistsrch.setInvalid();
    });

    // Validate form
    fview_ivf_oocytedenudation_embryology_chartlistsrch.validate = function () {
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
    fview_ivf_oocytedenudation_embryology_chartlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_ivf_oocytedenudation_embryology_chartlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists

    // Filters
    fview_ivf_oocytedenudation_embryology_chartlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fview_ivf_oocytedenudation_embryology_chartlistsrch");
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
<form name="fview_ivf_oocytedenudation_embryology_chartlistsrch" id="fview_ivf_oocytedenudation_embryology_chartlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fview_ivf_oocytedenudation_embryology_chartlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DidNO" class="ew-cell form-group">
        <label for="x_DidNO" class="ew-search-caption ew-label"><?= $Page->DidNO->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_DidNO" id="z_DidNO" value="=">
</span>
        <span id="el_view_ivf_oocytedenudation_embryology_chart_DidNO" class="ew-search-field">
<input type="<?= $Page->DidNO->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x_DidNO" id="x_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DidNO->getPlaceHolder()) ?>" value="<?= $Page->DidNO->EditValue ?>"<?= $Page->DidNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DidNO->getErrorMessage(false) ?></div>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> view_ivf_oocytedenudation_embryology_chart">
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
<form name="fview_ivf_oocytedenudation_embryology_chartlist" id="fview_ivf_oocytedenudation_embryology_chartlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_ivf_oocytedenudation_embryology_chart">
<div id="gmp_view_ivf_oocytedenudation_embryology_chart" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isAdd() || $Page->isCopy() || $Page->isGridEdit()) { ?>
<table id="tbl_view_ivf_oocytedenudation_embryology_chartlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_id" class="view_ivf_oocytedenudation_embryology_chart_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <th data-name="OocyteNo" class="<?= $Page->OocyteNo->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="view_ivf_oocytedenudation_embryology_chart_OocyteNo"><?= $Page->renderSort($Page->OocyteNo) ?></div></th>
<?php } ?>
<?php if ($Page->Stage->Visible) { // Stage ?>
        <th data-name="Stage" class="<?= $Page->Stage->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Stage" class="view_ivf_oocytedenudation_embryology_chart_Stage"><?= $Page->renderSort($Page->Stage) ?></div></th>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <th data-name="RIDNo" class="<?= $Page->RIDNo->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="view_ivf_oocytedenudation_embryology_chart_RIDNo"><?= $Page->renderSort($Page->RIDNo) ?></div></th>
<?php } ?>
<?php if ($Page->Name->Visible) { // Name ?>
        <th data-name="Name" class="<?= $Page->Name->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Name" class="view_ivf_oocytedenudation_embryology_chart_Name"><?= $Page->renderSort($Page->Name) ?></div></th>
<?php } ?>
<?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <th data-name="Day0OocyteStage" class="<?= $Page->Day0OocyteStage->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage"><?= $Page->renderSort($Page->Day0OocyteStage) ?></div></th>
<?php } ?>
<?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <th data-name="Day0sino" class="<?= $Page->Day0sino->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="view_ivf_oocytedenudation_embryology_chart_Day0sino"><?= $Page->renderSort($Page->Day0sino) ?></div></th>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
        <th data-name="TidNo" class="<?= $Page->TidNo->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_TidNo" class="view_ivf_oocytedenudation_embryology_chart_TidNo"><?= $Page->renderSort($Page->TidNo) ?></div></th>
<?php } ?>
<?php if ($Page->DidNO->Visible) { // DidNO ?>
        <th data-name="DidNO" class="<?= $Page->DidNO->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_DidNO" class="view_ivf_oocytedenudation_embryology_chart_DidNO"><?= $Page->renderSort($Page->DidNO) ?></div></th>
<?php } ?>
<?php if ($Page->Remarks->Visible) { // Remarks ?>
        <th data-name="Remarks" class="<?= $Page->Remarks->headerCellClass() ?>"><div id="elh_view_ivf_oocytedenudation_embryology_chart_Remarks" class="view_ivf_oocytedenudation_embryology_chart_Remarks"><?= $Page->renderSort($Page->Remarks) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_view_ivf_oocytedenudation_embryology_chart", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_id" class="form-group view_ivf_oocytedenudation_embryology_chart_id"></span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="form-group view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_OocyteNo" id="o<?= $Page->RowIndex ?>_OocyteNo" value="<?= HtmlEncode($Page->OocyteNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Stage" class="form-group view_ivf_oocytedenudation_embryology_chart_Stage">
<input type="<?= $Page->Stage->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" name="x<?= $Page->RowIndex ?>_Stage" id="x<?= $Page->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Stage" id="o<?= $Page->RowIndex ?>_Stage" value="<?= HtmlEncode($Page->Stage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="form-group view_ivf_oocytedenudation_embryology_chart_RIDNo">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_RIDNo" id="o<?= $Page->RowIndex ?>_RIDNo" value="<?= HtmlEncode($Page->RIDNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Name" class="form-group view_ivf_oocytedenudation_embryology_chart_Name">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" name="x<?= $Page->RowIndex ?>_Name" id="x<?= $Page->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Name" id="o<?= $Page->RowIndex ?>_Name" value="<?= HtmlEncode($Page->Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="form-group view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<input type="<?= $Page->Day0OocyteStage->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Page->RowIndex ?>_Day0OocyteStage" id="x<?= $Page->RowIndex ?>_Day0OocyteStage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Page->Day0OocyteStage->EditValue ?>"<?= $Page->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0OocyteStage" id="o<?= $Page->RowIndex ?>_Day0OocyteStage" value="<?= HtmlEncode($Page->Day0OocyteStage->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <td data-name="Day0sino">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="form-group view_ivf_oocytedenudation_embryology_chart_Day0sino">
<input type="<?= $Page->Day0sino->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" name="x<?= $Page->RowIndex ?>_Day0sino" id="x<?= $Page->RowIndex ?>_Day0sino" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0sino->getPlaceHolder()) ?>" value="<?= $Page->Day0sino->EditValue ?>"<?= $Page->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0sino->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" data-hidden="1" name="o<?= $Page->RowIndex ?>_Day0sino" id="o<?= $Page->RowIndex ?>_Day0sino" value="<?= HtmlEncode($Page->Day0sino->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_TidNo" class="form-group view_ivf_oocytedenudation_embryology_chart_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" id="x<?= $Page->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" data-hidden="1" name="o<?= $Page->RowIndex ?>_TidNo" id="o<?= $Page->RowIndex ?>_TidNo" value="<?= HtmlEncode($Page->TidNo->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DidNO->Visible) { // DidNO ?>
        <td data-name="DidNO">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_DidNO" class="form-group view_ivf_oocytedenudation_embryology_chart_DidNO">
<input type="<?= $Page->DidNO->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x<?= $Page->RowIndex ?>_DidNO" id="x<?= $Page->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DidNO->getPlaceHolder()) ?>" value="<?= $Page->DidNO->EditValue ?>"<?= $Page->DidNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DidNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_DidNO" id="o<?= $Page->RowIndex ?>_DidNO" value="<?= HtmlEncode($Page->DidNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks">
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Remarks" class="form-group view_ivf_oocytedenudation_embryology_chart_Remarks">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" data-hidden="1" name="o<?= $Page->RowIndex ?>_Remarks" id="o<?= $Page->RowIndex ?>_Remarks" value="<?= HtmlEncode($Page->Remarks->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
<script>
loadjs.ready(["fview_ivf_oocytedenudation_embryology_chartlist","load"], function() {
    fview_ivf_oocytedenudation_embryology_chartlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_view_ivf_oocytedenudation_embryology_chart", "data-rowtype" => $Page->RowType]);

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
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->OocyteNo->Visible) { // OocyteNo ?>
        <td data-name="OocyteNo" <?= $Page->OocyteNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_OocyteNo" class="form-group">
<input type="<?= $Page->OocyteNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_OocyteNo" name="x<?= $Page->RowIndex ?>_OocyteNo" id="x<?= $Page->RowIndex ?>_OocyteNo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->OocyteNo->getPlaceHolder()) ?>" value="<?= $Page->OocyteNo->EditValue ?>"<?= $Page->OocyteNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OocyteNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_OocyteNo">
<span<?= $Page->OocyteNo->viewAttributes() ?>>
<?= $Page->OocyteNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Stage->Visible) { // Stage ?>
        <td data-name="Stage" <?= $Page->Stage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Stage" class="form-group">
<input type="<?= $Page->Stage->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Stage" name="x<?= $Page->RowIndex ?>_Stage" id="x<?= $Page->RowIndex ?>_Stage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Stage->getPlaceHolder()) ?>" value="<?= $Page->Stage->EditValue ?>"<?= $Page->Stage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Stage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Stage">
<span<?= $Page->Stage->viewAttributes() ?>>
<?= $Page->Stage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RIDNo->Visible) { // RIDNo ?>
        <td data-name="RIDNo" <?= $Page->RIDNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_RIDNo" class="form-group">
<input type="<?= $Page->RIDNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_RIDNo" name="x<?= $Page->RowIndex ?>_RIDNo" id="x<?= $Page->RowIndex ?>_RIDNo" size="30" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>" value="<?= $Page->RIDNo->EditValue ?>"<?= $Page->RIDNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_RIDNo">
<span<?= $Page->RIDNo->viewAttributes() ?>>
<?= $Page->RIDNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Name->Visible) { // Name ?>
        <td data-name="Name" <?= $Page->Name->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Name" class="form-group">
<input type="<?= $Page->Name->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Name" name="x<?= $Page->RowIndex ?>_Name" id="x<?= $Page->RowIndex ?>_Name" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Name->getPlaceHolder()) ?>" value="<?= $Page->Name->EditValue ?>"<?= $Page->Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Name">
<span<?= $Page->Name->viewAttributes() ?>>
<?= $Page->Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0OocyteStage->Visible) { // Day0OocyteStage ?>
        <td data-name="Day0OocyteStage" <?= $Page->Day0OocyteStage->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage" class="form-group">
<input type="<?= $Page->Day0OocyteStage->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0OocyteStage" name="x<?= $Page->RowIndex ?>_Day0OocyteStage" id="x<?= $Page->RowIndex ?>_Day0OocyteStage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0OocyteStage->getPlaceHolder()) ?>" value="<?= $Page->Day0OocyteStage->EditValue ?>"<?= $Page->Day0OocyteStage->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0OocyteStage->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Day0OocyteStage">
<span<?= $Page->Day0OocyteStage->viewAttributes() ?>>
<?= $Page->Day0OocyteStage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Day0sino->Visible) { // Day0sino ?>
        <td data-name="Day0sino" <?= $Page->Day0sino->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Day0sino" class="form-group">
<input type="<?= $Page->Day0sino->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Day0sino" name="x<?= $Page->RowIndex ?>_Day0sino" id="x<?= $Page->RowIndex ?>_Day0sino" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Day0sino->getPlaceHolder()) ?>" value="<?= $Page->Day0sino->EditValue ?>"<?= $Page->Day0sino->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Day0sino->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Day0sino">
<span<?= $Page->Day0sino->viewAttributes() ?>>
<?= $Page->Day0sino->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TidNo->Visible) { // TidNo ?>
        <td data-name="TidNo" <?= $Page->TidNo->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_TidNo" class="form-group">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_TidNo" name="x<?= $Page->RowIndex ?>_TidNo" id="x<?= $Page->RowIndex ?>_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_TidNo">
<span<?= $Page->TidNo->viewAttributes() ?>>
<?= $Page->TidNo->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DidNO->Visible) { // DidNO ?>
        <td data-name="DidNO" <?= $Page->DidNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_DidNO" class="form-group">
<input type="<?= $Page->DidNO->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_DidNO" name="x<?= $Page->RowIndex ?>_DidNO" id="x<?= $Page->RowIndex ?>_DidNO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DidNO->getPlaceHolder()) ?>" value="<?= $Page->DidNO->EditValue ?>"<?= $Page->DidNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DidNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_DidNO">
<span<?= $Page->DidNO->viewAttributes() ?>>
<?= $Page->DidNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Remarks->Visible) { // Remarks ?>
        <td data-name="Remarks" <?= $Page->Remarks->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Remarks" class="form-group">
<input type="<?= $Page->Remarks->getInputTextType() ?>" data-table="view_ivf_oocytedenudation_embryology_chart" data-field="x_Remarks" name="x<?= $Page->RowIndex ?>_Remarks" id="x<?= $Page->RowIndex ?>_Remarks" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Remarks->getPlaceHolder()) ?>" value="<?= $Page->Remarks->EditValue ?>"<?= $Page->Remarks->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Remarks->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_view_ivf_oocytedenudation_embryology_chart_Remarks">
<span<?= $Page->Remarks->viewAttributes() ?>>
<?= $Page->Remarks->getViewValue() ?></span>
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
loadjs.ready(["fview_ivf_oocytedenudation_embryology_chartlist","load"], function () {
    fview_ivf_oocytedenudation_embryology_chartlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("view_ivf_oocytedenudation_embryology_chart");
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
        container: "gmp_view_ivf_oocytedenudation_embryology_chart",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

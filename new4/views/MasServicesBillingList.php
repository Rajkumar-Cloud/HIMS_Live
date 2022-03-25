<?php

namespace PHPMaker2021\HIMS;

// Page object
$MasServicesBillingList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fmas_services_billinglist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fmas_services_billinglist = currentForm = new ew.Form("fmas_services_billinglist", "list");
    fmas_services_billinglist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_services_billing")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.mas_services_billing)
        ew.vars.tables.mas_services_billing = currentTable;
    fmas_services_billinglist.addFields([
        ["Id", [fields.Id.visible && fields.Id.required ? ew.Validators.required(fields.Id.caption) : null], fields.Id.isInvalid],
        ["CODE", [fields.CODE.visible && fields.CODE.required ? ew.Validators.required(fields.CODE.caption) : null], fields.CODE.isInvalid],
        ["SERVICE", [fields.SERVICE.visible && fields.SERVICE.required ? ew.Validators.required(fields.SERVICE.caption) : null], fields.SERVICE.isInvalid],
        ["UNITS", [fields.UNITS.visible && fields.UNITS.required ? ew.Validators.required(fields.UNITS.caption) : null, ew.Validators.integer], fields.UNITS.isInvalid],
        ["AMOUNT", [fields.AMOUNT.visible && fields.AMOUNT.required ? ew.Validators.required(fields.AMOUNT.caption) : null], fields.AMOUNT.isInvalid],
        ["SERVICE_TYPE", [fields.SERVICE_TYPE.visible && fields.SERVICE_TYPE.required ? ew.Validators.required(fields.SERVICE_TYPE.caption) : null], fields.SERVICE_TYPE.isInvalid],
        ["DEPARTMENT", [fields.DEPARTMENT.visible && fields.DEPARTMENT.required ? ew.Validators.required(fields.DEPARTMENT.caption) : null], fields.DEPARTMENT.isInvalid],
        ["mas_services_billingcol", [fields.mas_services_billingcol.visible && fields.mas_services_billingcol.required ? ew.Validators.required(fields.mas_services_billingcol.caption) : null], fields.mas_services_billingcol.isInvalid],
        ["DrShareAmount", [fields.DrShareAmount.visible && fields.DrShareAmount.required ? ew.Validators.required(fields.DrShareAmount.caption) : null, ew.Validators.float], fields.DrShareAmount.isInvalid],
        ["HospShareAmount", [fields.HospShareAmount.visible && fields.HospShareAmount.required ? ew.Validators.required(fields.HospShareAmount.caption) : null, ew.Validators.float], fields.HospShareAmount.isInvalid],
        ["DrSharePer", [fields.DrSharePer.visible && fields.DrSharePer.required ? ew.Validators.required(fields.DrSharePer.caption) : null, ew.Validators.integer], fields.DrSharePer.isInvalid],
        ["HospSharePer", [fields.HospSharePer.visible && fields.HospSharePer.required ? ew.Validators.required(fields.HospSharePer.caption) : null, ew.Validators.integer], fields.HospSharePer.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["TestSubCd", [fields.TestSubCd.visible && fields.TestSubCd.required ? ew.Validators.required(fields.TestSubCd.caption) : null], fields.TestSubCd.isInvalid],
        ["Method", [fields.Method.visible && fields.Method.required ? ew.Validators.required(fields.Method.caption) : null], fields.Method.isInvalid],
        ["Order", [fields.Order.visible && fields.Order.required ? ew.Validators.required(fields.Order.caption) : null, ew.Validators.float], fields.Order.isInvalid],
        ["ResType", [fields.ResType.visible && fields.ResType.required ? ew.Validators.required(fields.ResType.caption) : null], fields.ResType.isInvalid],
        ["UnitCD", [fields.UnitCD.visible && fields.UnitCD.required ? ew.Validators.required(fields.UnitCD.caption) : null], fields.UnitCD.isInvalid],
        ["Sample", [fields.Sample.visible && fields.Sample.required ? ew.Validators.required(fields.Sample.caption) : null], fields.Sample.isInvalid],
        ["NoD", [fields.NoD.visible && fields.NoD.required ? ew.Validators.required(fields.NoD.caption) : null, ew.Validators.float], fields.NoD.isInvalid],
        ["BillOrder", [fields.BillOrder.visible && fields.BillOrder.required ? ew.Validators.required(fields.BillOrder.caption) : null, ew.Validators.float], fields.BillOrder.isInvalid],
        ["Inactive", [fields.Inactive.visible && fields.Inactive.required ? ew.Validators.required(fields.Inactive.caption) : null], fields.Inactive.isInvalid],
        ["Outsource", [fields.Outsource.visible && fields.Outsource.required ? ew.Validators.required(fields.Outsource.caption) : null], fields.Outsource.isInvalid],
        ["CollSample", [fields.CollSample.visible && fields.CollSample.required ? ew.Validators.required(fields.CollSample.caption) : null], fields.CollSample.isInvalid],
        ["TestType", [fields.TestType.visible && fields.TestType.required ? ew.Validators.required(fields.TestType.caption) : null], fields.TestType.isInvalid],
        ["NoHeading", [fields.NoHeading.visible && fields.NoHeading.required ? ew.Validators.required(fields.NoHeading.caption) : null], fields.NoHeading.isInvalid],
        ["ChemicalCode", [fields.ChemicalCode.visible && fields.ChemicalCode.required ? ew.Validators.required(fields.ChemicalCode.caption) : null], fields.ChemicalCode.isInvalid],
        ["ChemicalName", [fields.ChemicalName.visible && fields.ChemicalName.required ? ew.Validators.required(fields.ChemicalName.caption) : null], fields.ChemicalName.isInvalid],
        ["Utilaization", [fields.Utilaization.visible && fields.Utilaization.required ? ew.Validators.required(fields.Utilaization.caption) : null], fields.Utilaization.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_services_billinglist,
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
    fmas_services_billinglist.validate = function () {
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
    fmas_services_billinglist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "CODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SERVICE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UNITS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AMOUNT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SERVICE_TYPE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DEPARTMENT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mas_services_billingcol", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrShareAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospShareAmount", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "DrSharePer", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospSharePer", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestSubCd", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Method", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Order", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ResType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UnitCD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Sample", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoD", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BillOrder", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Inactive", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Outsource", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CollSample", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TestType", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "NoHeading", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChemicalCode", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChemicalName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Utilaization", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fmas_services_billinglist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_services_billinglist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fmas_services_billinglist.lists.SERVICE_TYPE = <?= $Page->SERVICE_TYPE->toClientList($Page) ?>;
    fmas_services_billinglist.lists.DEPARTMENT = <?= $Page->DEPARTMENT->toClientList($Page) ?>;
    loadjs.done("fmas_services_billinglist");
});
var fmas_services_billinglistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fmas_services_billinglistsrch = currentSearchForm = new ew.Form("fmas_services_billinglistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "mas_services_billing")) ?>,
        fields = currentTable.fields;
    fmas_services_billinglistsrch.addFields([
        ["Id", [], fields.Id.isInvalid],
        ["CODE", [], fields.CODE.isInvalid],
        ["SERVICE", [], fields.SERVICE.isInvalid],
        ["UNITS", [], fields.UNITS.isInvalid],
        ["AMOUNT", [], fields.AMOUNT.isInvalid],
        ["SERVICE_TYPE", [], fields.SERVICE_TYPE.isInvalid],
        ["DEPARTMENT", [], fields.DEPARTMENT.isInvalid],
        ["mas_services_billingcol", [], fields.mas_services_billingcol.isInvalid],
        ["DrShareAmount", [], fields.DrShareAmount.isInvalid],
        ["HospShareAmount", [], fields.HospShareAmount.isInvalid],
        ["DrSharePer", [], fields.DrSharePer.isInvalid],
        ["HospSharePer", [], fields.HospSharePer.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["TestSubCd", [], fields.TestSubCd.isInvalid],
        ["Method", [], fields.Method.isInvalid],
        ["Order", [], fields.Order.isInvalid],
        ["ResType", [], fields.ResType.isInvalid],
        ["UnitCD", [], fields.UnitCD.isInvalid],
        ["Sample", [], fields.Sample.isInvalid],
        ["NoD", [], fields.NoD.isInvalid],
        ["BillOrder", [], fields.BillOrder.isInvalid],
        ["Inactive", [], fields.Inactive.isInvalid],
        ["Outsource", [], fields.Outsource.isInvalid],
        ["CollSample", [], fields.CollSample.isInvalid],
        ["TestType", [], fields.TestType.isInvalid],
        ["NoHeading", [], fields.NoHeading.isInvalid],
        ["ChemicalCode", [], fields.ChemicalCode.isInvalid],
        ["ChemicalName", [], fields.ChemicalName.isInvalid],
        ["Utilaization", [], fields.Utilaization.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fmas_services_billinglistsrch.setInvalid();
    });

    // Validate form
    fmas_services_billinglistsrch.validate = function () {
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
    fmas_services_billinglistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_services_billinglistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fmas_services_billinglistsrch.lists.SERVICE_TYPE = <?= $Page->SERVICE_TYPE->toClientList($Page) ?>;
    fmas_services_billinglistsrch.lists.DEPARTMENT = <?= $Page->DEPARTMENT->toClientList($Page) ?>;

    // Filters
    fmas_services_billinglistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fmas_services_billinglistsrch");
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
<form name="fmas_services_billinglistsrch" id="fmas_services_billinglistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fmas_services_billinglistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="mas_services_billing">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_SERVICE_TYPE" class="ew-cell form-group">
        <label for="x_SERVICE_TYPE" class="ew-search-caption ew-label"><?= $Page->SERVICE_TYPE->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SERVICE_TYPE" id="z_SERVICE_TYPE" value="LIKE">
</span>
        <span id="el_mas_services_billing_SERVICE_TYPE" class="ew-search-field">
    <select
        id="x_SERVICE_TYPE"
        name="x_SERVICE_TYPE"
        class="form-control ew-select<?= $Page->SERVICE_TYPE->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x_SERVICE_TYPE"
        data-table="mas_services_billing"
        data-field="x_SERVICE_TYPE"
        data-value-separator="<?= $Page->SERVICE_TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SERVICE_TYPE->getPlaceHolder()) ?>"
        <?= $Page->SERVICE_TYPE->editAttributes() ?>>
        <?= $Page->SERVICE_TYPE->selectOptionListHtml("x_SERVICE_TYPE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->SERVICE_TYPE->getErrorMessage(false) ?></div>
<?= $Page->SERVICE_TYPE->Lookup->getParamTag($Page, "p_x_SERVICE_TYPE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x_SERVICE_TYPE']"),
        options = { name: "x_SERVICE_TYPE", selectId: "mas_services_billing_x_SERVICE_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.SERVICE_TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_DEPARTMENT" class="ew-cell form-group">
        <label for="x_DEPARTMENT" class="ew-search-caption ew-label"><?= $Page->DEPARTMENT->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DEPARTMENT" id="z_DEPARTMENT" value="LIKE">
</span>
        <span id="el_mas_services_billing_DEPARTMENT" class="ew-search-field">
    <select
        id="x_DEPARTMENT"
        name="x_DEPARTMENT"
        class="form-control ew-select<?= $Page->DEPARTMENT->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x_DEPARTMENT"
        data-table="mas_services_billing"
        data-field="x_DEPARTMENT"
        data-value-separator="<?= $Page->DEPARTMENT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>"
        <?= $Page->DEPARTMENT->editAttributes() ?>>
        <?= $Page->DEPARTMENT->selectOptionListHtml("x_DEPARTMENT") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage(false) ?></div>
<?= $Page->DEPARTMENT->Lookup->getParamTag($Page, "p_x_DEPARTMENT") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x_DEPARTMENT']"),
        options = { name: "x_DEPARTMENT", selectId: "mas_services_billing_x_DEPARTMENT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.DEPARTMENT.selectOptions);
    ew.createSelect(options);
});
</script>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> mas_services_billing">
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
<form name="fmas_services_billinglist" id="fmas_services_billinglist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_services_billing">
<div id="gmp_mas_services_billing" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isAdd() || $Page->isCopy() || $Page->isGridEdit()) { ?>
<table id="tbl_mas_services_billinglist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->Id->Visible) { // Id ?>
        <th data-name="Id" class="<?= $Page->Id->headerCellClass() ?>"><div id="elh_mas_services_billing_Id" class="mas_services_billing_Id"><?= $Page->renderSort($Page->Id) ?></div></th>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
        <th data-name="CODE" class="<?= $Page->CODE->headerCellClass() ?>"><div id="elh_mas_services_billing_CODE" class="mas_services_billing_CODE"><?= $Page->renderSort($Page->CODE) ?></div></th>
<?php } ?>
<?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <th data-name="SERVICE" class="<?= $Page->SERVICE->headerCellClass() ?>"><div id="elh_mas_services_billing_SERVICE" class="mas_services_billing_SERVICE"><?= $Page->renderSort($Page->SERVICE) ?></div></th>
<?php } ?>
<?php if ($Page->UNITS->Visible) { // UNITS ?>
        <th data-name="UNITS" class="<?= $Page->UNITS->headerCellClass() ?>"><div id="elh_mas_services_billing_UNITS" class="mas_services_billing_UNITS"><?= $Page->renderSort($Page->UNITS) ?></div></th>
<?php } ?>
<?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <th data-name="AMOUNT" class="<?= $Page->AMOUNT->headerCellClass() ?>"><div id="elh_mas_services_billing_AMOUNT" class="mas_services_billing_AMOUNT"><?= $Page->renderSort($Page->AMOUNT) ?></div></th>
<?php } ?>
<?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <th data-name="SERVICE_TYPE" class="<?= $Page->SERVICE_TYPE->headerCellClass() ?>"><div id="elh_mas_services_billing_SERVICE_TYPE" class="mas_services_billing_SERVICE_TYPE"><?= $Page->renderSort($Page->SERVICE_TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <th data-name="DEPARTMENT" class="<?= $Page->DEPARTMENT->headerCellClass() ?>"><div id="elh_mas_services_billing_DEPARTMENT" class="mas_services_billing_DEPARTMENT"><?= $Page->renderSort($Page->DEPARTMENT) ?></div></th>
<?php } ?>
<?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <th data-name="mas_services_billingcol" class="<?= $Page->mas_services_billingcol->headerCellClass() ?>"><div id="elh_mas_services_billing_mas_services_billingcol" class="mas_services_billing_mas_services_billingcol"><?= $Page->renderSort($Page->mas_services_billingcol) ?></div></th>
<?php } ?>
<?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <th data-name="DrShareAmount" class="<?= $Page->DrShareAmount->headerCellClass() ?>"><div id="elh_mas_services_billing_DrShareAmount" class="mas_services_billing_DrShareAmount"><?= $Page->renderSort($Page->DrShareAmount) ?></div></th>
<?php } ?>
<?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <th data-name="HospShareAmount" class="<?= $Page->HospShareAmount->headerCellClass() ?>"><div id="elh_mas_services_billing_HospShareAmount" class="mas_services_billing_HospShareAmount"><?= $Page->renderSort($Page->HospShareAmount) ?></div></th>
<?php } ?>
<?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <th data-name="DrSharePer" class="<?= $Page->DrSharePer->headerCellClass() ?>"><div id="elh_mas_services_billing_DrSharePer" class="mas_services_billing_DrSharePer"><?= $Page->renderSort($Page->DrSharePer) ?></div></th>
<?php } ?>
<?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <th data-name="HospSharePer" class="<?= $Page->HospSharePer->headerCellClass() ?>"><div id="elh_mas_services_billing_HospSharePer" class="mas_services_billing_HospSharePer"><?= $Page->renderSort($Page->HospSharePer) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_mas_services_billing_HospID" class="mas_services_billing_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <th data-name="TestSubCd" class="<?= $Page->TestSubCd->headerCellClass() ?>"><div id="elh_mas_services_billing_TestSubCd" class="mas_services_billing_TestSubCd"><?= $Page->renderSort($Page->TestSubCd) ?></div></th>
<?php } ?>
<?php if ($Page->Method->Visible) { // Method ?>
        <th data-name="Method" class="<?= $Page->Method->headerCellClass() ?>"><div id="elh_mas_services_billing_Method" class="mas_services_billing_Method"><?= $Page->renderSort($Page->Method) ?></div></th>
<?php } ?>
<?php if ($Page->Order->Visible) { // Order ?>
        <th data-name="Order" class="<?= $Page->Order->headerCellClass() ?>"><div id="elh_mas_services_billing_Order" class="mas_services_billing_Order"><?= $Page->renderSort($Page->Order) ?></div></th>
<?php } ?>
<?php if ($Page->ResType->Visible) { // ResType ?>
        <th data-name="ResType" class="<?= $Page->ResType->headerCellClass() ?>"><div id="elh_mas_services_billing_ResType" class="mas_services_billing_ResType"><?= $Page->renderSort($Page->ResType) ?></div></th>
<?php } ?>
<?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <th data-name="UnitCD" class="<?= $Page->UnitCD->headerCellClass() ?>"><div id="elh_mas_services_billing_UnitCD" class="mas_services_billing_UnitCD"><?= $Page->renderSort($Page->UnitCD) ?></div></th>
<?php } ?>
<?php if ($Page->Sample->Visible) { // Sample ?>
        <th data-name="Sample" class="<?= $Page->Sample->headerCellClass() ?>"><div id="elh_mas_services_billing_Sample" class="mas_services_billing_Sample"><?= $Page->renderSort($Page->Sample) ?></div></th>
<?php } ?>
<?php if ($Page->NoD->Visible) { // NoD ?>
        <th data-name="NoD" class="<?= $Page->NoD->headerCellClass() ?>"><div id="elh_mas_services_billing_NoD" class="mas_services_billing_NoD"><?= $Page->renderSort($Page->NoD) ?></div></th>
<?php } ?>
<?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <th data-name="BillOrder" class="<?= $Page->BillOrder->headerCellClass() ?>"><div id="elh_mas_services_billing_BillOrder" class="mas_services_billing_BillOrder"><?= $Page->renderSort($Page->BillOrder) ?></div></th>
<?php } ?>
<?php if ($Page->Inactive->Visible) { // Inactive ?>
        <th data-name="Inactive" class="<?= $Page->Inactive->headerCellClass() ?>"><div id="elh_mas_services_billing_Inactive" class="mas_services_billing_Inactive"><?= $Page->renderSort($Page->Inactive) ?></div></th>
<?php } ?>
<?php if ($Page->Outsource->Visible) { // Outsource ?>
        <th data-name="Outsource" class="<?= $Page->Outsource->headerCellClass() ?>"><div id="elh_mas_services_billing_Outsource" class="mas_services_billing_Outsource"><?= $Page->renderSort($Page->Outsource) ?></div></th>
<?php } ?>
<?php if ($Page->CollSample->Visible) { // CollSample ?>
        <th data-name="CollSample" class="<?= $Page->CollSample->headerCellClass() ?>"><div id="elh_mas_services_billing_CollSample" class="mas_services_billing_CollSample"><?= $Page->renderSort($Page->CollSample) ?></div></th>
<?php } ?>
<?php if ($Page->TestType->Visible) { // TestType ?>
        <th data-name="TestType" class="<?= $Page->TestType->headerCellClass() ?>"><div id="elh_mas_services_billing_TestType" class="mas_services_billing_TestType"><?= $Page->renderSort($Page->TestType) ?></div></th>
<?php } ?>
<?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <th data-name="NoHeading" class="<?= $Page->NoHeading->headerCellClass() ?>"><div id="elh_mas_services_billing_NoHeading" class="mas_services_billing_NoHeading"><?= $Page->renderSort($Page->NoHeading) ?></div></th>
<?php } ?>
<?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <th data-name="ChemicalCode" class="<?= $Page->ChemicalCode->headerCellClass() ?>"><div id="elh_mas_services_billing_ChemicalCode" class="mas_services_billing_ChemicalCode"><?= $Page->renderSort($Page->ChemicalCode) ?></div></th>
<?php } ?>
<?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <th data-name="ChemicalName" class="<?= $Page->ChemicalName->headerCellClass() ?>"><div id="elh_mas_services_billing_ChemicalName" class="mas_services_billing_ChemicalName"><?= $Page->renderSort($Page->ChemicalName) ?></div></th>
<?php } ?>
<?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <th data-name="Utilaization" class="<?= $Page->Utilaization->headerCellClass() ?>"><div id="elh_mas_services_billing_Utilaization" class="mas_services_billing_Utilaization"><?= $Page->renderSort($Page->Utilaization) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_mas_services_billing", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->Id->Visible) { // Id ?>
        <td data-name="Id">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Id" class="form-group mas_services_billing_Id"></span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" data-hidden="1" name="o<?= $Page->RowIndex ?>_Id" id="o<?= $Page->RowIndex ?>_Id" value="<?= HtmlEncode($Page->Id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CODE->Visible) { // CODE ?>
        <td data-name="CODE">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CODE" class="form-group mas_services_billing_CODE">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CODE" name="x<?= $Page->RowIndex ?>_CODE" id="x<?= $Page->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_CODE" id="o<?= $Page->RowIndex ?>_CODE" value="<?= HtmlEncode($Page->CODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE" class="form-group mas_services_billing_SERVICE">
<input type="<?= $Page->SERVICE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?= $Page->RowIndex ?>_SERVICE" id="x<?= $Page->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE->EditValue ?>"<?= $Page->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SERVICE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" data-hidden="1" name="o<?= $Page->RowIndex ?>_SERVICE" id="o<?= $Page->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Page->SERVICE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UNITS->Visible) { // UNITS ?>
        <td data-name="UNITS">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UNITS" class="form-group mas_services_billing_UNITS">
<input type="<?= $Page->UNITS->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UNITS" name="x<?= $Page->RowIndex ?>_UNITS" id="x<?= $Page->RowIndex ?>_UNITS" size="30" placeholder="<?= HtmlEncode($Page->UNITS->getPlaceHolder()) ?>" value="<?= $Page->UNITS->EditValue ?>"<?= $Page->UNITS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UNITS->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" data-hidden="1" name="o<?= $Page->RowIndex ?>_UNITS" id="o<?= $Page->RowIndex ?>_UNITS" value="<?= HtmlEncode($Page->UNITS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <td data-name="AMOUNT">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_AMOUNT" class="form-group mas_services_billing_AMOUNT">
<input type="<?= $Page->AMOUNT->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?= $Page->RowIndex ?>_AMOUNT" id="x<?= $Page->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AMOUNT->getPlaceHolder()) ?>" value="<?= $Page->AMOUNT->EditValue ?>"<?= $Page->AMOUNT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AMOUNT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" data-hidden="1" name="o<?= $Page->RowIndex ?>_AMOUNT" id="o<?= $Page->RowIndex ?>_AMOUNT" value="<?= HtmlEncode($Page->AMOUNT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE_TYPE" class="form-group mas_services_billing_SERVICE_TYPE">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        name="x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        class="form-control ew-select<?= $Page->SERVICE_TYPE->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        data-table="mas_services_billing"
        data-field="x_SERVICE_TYPE"
        data-value-separator="<?= $Page->SERVICE_TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SERVICE_TYPE->getPlaceHolder()) ?>"
        <?= $Page->SERVICE_TYPE->editAttributes() ?>>
        <?= $Page->SERVICE_TYPE->selectOptionListHtml("x{$Page->RowIndex}_SERVICE_TYPE") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$Page->SERVICE_TYPE->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_SERVICE_TYPE" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->SERVICE_TYPE->caption() ?>" data-title="<?= $Page->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_SERVICE_TYPE',url:'<?= GetUrl("MasServicesTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->SERVICE_TYPE->getErrorMessage() ?></div>
<?= $Page->SERVICE_TYPE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SERVICE_TYPE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE']"),
        options = { name: "x<?= $Page->RowIndex ?>_SERVICE_TYPE", selectId: "mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.SERVICE_TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-hidden="1" name="o<?= $Page->RowIndex ?>_SERVICE_TYPE" id="o<?= $Page->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Page->SERVICE_TYPE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DEPARTMENT" class="form-group mas_services_billing_DEPARTMENT">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_DEPARTMENT"
        name="x<?= $Page->RowIndex ?>_DEPARTMENT"
        class="form-control ew-select<?= $Page->DEPARTMENT->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT"
        data-table="mas_services_billing"
        data-field="x_DEPARTMENT"
        data-value-separator="<?= $Page->DEPARTMENT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>"
        <?= $Page->DEPARTMENT->editAttributes() ?>>
        <?= $Page->DEPARTMENT->selectOptionListHtml("x{$Page->RowIndex}_DEPARTMENT") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$Page->DEPARTMENT->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_DEPARTMENT" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->DEPARTMENT->caption() ?>" data-title="<?= $Page->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_DEPARTMENT',url:'<?= GetUrl("MasBillingDepartmentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage() ?></div>
<?= $Page->DEPARTMENT->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DEPARTMENT") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT']"),
        options = { name: "x<?= $Page->RowIndex ?>_DEPARTMENT", selectId: "mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.DEPARTMENT.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-hidden="1" name="o<?= $Page->RowIndex ?>_DEPARTMENT" id="o<?= $Page->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Page->DEPARTMENT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <td data-name="mas_services_billingcol">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_mas_services_billingcol" class="form-group mas_services_billing_mas_services_billingcol">
<input type="<?= $Page->mas_services_billingcol->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?= $Page->RowIndex ?>_mas_services_billingcol" id="x<?= $Page->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mas_services_billingcol->getPlaceHolder()) ?>" value="<?= $Page->mas_services_billingcol->EditValue ?>"<?= $Page->mas_services_billingcol->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mas_services_billingcol->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" data-hidden="1" name="o<?= $Page->RowIndex ?>_mas_services_billingcol" id="o<?= $Page->RowIndex ?>_mas_services_billingcol" value="<?= HtmlEncode($Page->mas_services_billingcol->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrShareAmount" class="form-group mas_services_billing_DrShareAmount">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?= $Page->RowIndex ?>_DrShareAmount" id="x<?= $Page->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrShareAmount" id="o<?= $Page->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Page->DrShareAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospShareAmount" class="form-group mas_services_billing_HospShareAmount">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?= $Page->RowIndex ?>_HospShareAmount" id="x<?= $Page->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospShareAmount" id="o<?= $Page->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Page->HospShareAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <td data-name="DrSharePer">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrSharePer" class="form-group mas_services_billing_DrSharePer">
<input type="<?= $Page->DrSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?= $Page->RowIndex ?>_DrSharePer" id="x<?= $Page->RowIndex ?>_DrSharePer" size="30" placeholder="<?= HtmlEncode($Page->DrSharePer->getPlaceHolder()) ?>" value="<?= $Page->DrSharePer->EditValue ?>"<?= $Page->DrSharePer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrSharePer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrSharePer" id="o<?= $Page->RowIndex ?>_DrSharePer" value="<?= HtmlEncode($Page->DrSharePer->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <td data-name="HospSharePer">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospSharePer" class="form-group mas_services_billing_HospSharePer">
<input type="<?= $Page->HospSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?= $Page->RowIndex ?>_HospSharePer" id="x<?= $Page->RowIndex ?>_HospSharePer" size="30" placeholder="<?= HtmlEncode($Page->HospSharePer->getPlaceHolder()) ?>" value="<?= $Page->HospSharePer->EditValue ?>"<?= $Page->HospSharePer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospSharePer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospSharePer" id="o<?= $Page->RowIndex ?>_HospSharePer" value="<?= HtmlEncode($Page->HospSharePer->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestSubCd" class="form-group mas_services_billing_TestSubCd">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?= $Page->RowIndex ?>_TestSubCd" id="x<?= $Page->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestSubCd" id="o<?= $Page->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Page->TestSubCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Method" class="form-group mas_services_billing_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Method" name="x<?= $Page->RowIndex ?>_Method" id="x<?= $Page->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" data-hidden="1" name="o<?= $Page->RowIndex ?>_Method" id="o<?= $Page->RowIndex ?>_Method" value="<?= HtmlEncode($Page->Method->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Order" class="form-group mas_services_billing_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" data-hidden="1" name="o<?= $Page->RowIndex ?>_Order" id="o<?= $Page->RowIndex ?>_Order" value="<?= HtmlEncode($Page->Order->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ResType->Visible) { // ResType ?>
        <td data-name="ResType">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ResType" class="form-group mas_services_billing_ResType">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ResType" name="x<?= $Page->RowIndex ?>_ResType" id="x<?= $Page->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResType" id="o<?= $Page->RowIndex ?>_ResType" value="<?= HtmlEncode($Page->ResType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td data-name="UnitCD">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UnitCD" class="form-group mas_services_billing_UnitCD">
<input type="<?= $Page->UnitCD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?= $Page->RowIndex ?>_UnitCD" id="x<?= $Page->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UnitCD->getPlaceHolder()) ?>" value="<?= $Page->UnitCD->EditValue ?>"<?= $Page->UnitCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UnitCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_UnitCD" id="o<?= $Page->RowIndex ?>_UnitCD" value="<?= HtmlEncode($Page->UnitCD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Sample->Visible) { // Sample ?>
        <td data-name="Sample">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Sample" class="form-group mas_services_billing_Sample">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Sample" name="x<?= $Page->RowIndex ?>_Sample" id="x<?= $Page->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" data-hidden="1" name="o<?= $Page->RowIndex ?>_Sample" id="o<?= $Page->RowIndex ?>_Sample" value="<?= HtmlEncode($Page->Sample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoD->Visible) { // NoD ?>
        <td data-name="NoD">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoD" class="form-group mas_services_billing_NoD">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoD" name="x<?= $Page->RowIndex ?>_NoD" id="x<?= $Page->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoD" id="o<?= $Page->RowIndex ?>_NoD" value="<?= HtmlEncode($Page->NoD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_BillOrder" class="form-group mas_services_billing_BillOrder">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?= $Page->RowIndex ?>_BillOrder" id="x<?= $Page->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillOrder" id="o<?= $Page->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Page->BillOrder->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Inactive" class="form-group mas_services_billing_Inactive">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Inactive" name="x<?= $Page->RowIndex ?>_Inactive" id="x<?= $Page->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" data-hidden="1" name="o<?= $Page->RowIndex ?>_Inactive" id="o<?= $Page->RowIndex ?>_Inactive" value="<?= HtmlEncode($Page->Inactive->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td data-name="Outsource">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Outsource" class="form-group mas_services_billing_Outsource">
<input type="<?= $Page->Outsource->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Outsource" name="x<?= $Page->RowIndex ?>_Outsource" id="x<?= $Page->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Outsource->getPlaceHolder()) ?>" value="<?= $Page->Outsource->EditValue ?>"<?= $Page->Outsource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Outsource->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" data-hidden="1" name="o<?= $Page->RowIndex ?>_Outsource" id="o<?= $Page->RowIndex ?>_Outsource" value="<?= HtmlEncode($Page->Outsource->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CollSample" class="form-group mas_services_billing_CollSample">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CollSample" name="x<?= $Page->RowIndex ?>_CollSample" id="x<?= $Page->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" data-hidden="1" name="o<?= $Page->RowIndex ?>_CollSample" id="o<?= $Page->RowIndex ?>_CollSample" value="<?= HtmlEncode($Page->CollSample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestType" class="form-group mas_services_billing_TestType">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestType" id="o<?= $Page->RowIndex ?>_TestType" value="<?= HtmlEncode($Page->TestType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <td data-name="NoHeading">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoHeading" class="form-group mas_services_billing_NoHeading">
<input type="<?= $Page->NoHeading->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?= $Page->RowIndex ?>_NoHeading" id="x<?= $Page->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHeading->getPlaceHolder()) ?>" value="<?= $Page->NoHeading->EditValue ?>"<?= $Page->NoHeading->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoHeading->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoHeading" id="o<?= $Page->RowIndex ?>_NoHeading" value="<?= HtmlEncode($Page->NoHeading->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <td data-name="ChemicalCode">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalCode" class="form-group mas_services_billing_ChemicalCode">
<input type="<?= $Page->ChemicalCode->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?= $Page->RowIndex ?>_ChemicalCode" id="x<?= $Page->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalCode->getPlaceHolder()) ?>" value="<?= $Page->ChemicalCode->EditValue ?>"<?= $Page->ChemicalCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ChemicalCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ChemicalCode" id="o<?= $Page->RowIndex ?>_ChemicalCode" value="<?= HtmlEncode($Page->ChemicalCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <td data-name="ChemicalName">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalName" class="form-group mas_services_billing_ChemicalName">
<input type="<?= $Page->ChemicalName->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?= $Page->RowIndex ?>_ChemicalName" id="x<?= $Page->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalName->getPlaceHolder()) ?>" value="<?= $Page->ChemicalName->EditValue ?>"<?= $Page->ChemicalName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ChemicalName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" data-hidden="1" name="o<?= $Page->RowIndex ?>_ChemicalName" id="o<?= $Page->RowIndex ?>_ChemicalName" value="<?= HtmlEncode($Page->ChemicalName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <td data-name="Utilaization">
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Utilaization" class="form-group mas_services_billing_Utilaization">
<input type="<?= $Page->Utilaization->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?= $Page->RowIndex ?>_Utilaization" id="x<?= $Page->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Utilaization->getPlaceHolder()) ?>" value="<?= $Page->Utilaization->EditValue ?>"<?= $Page->Utilaization->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Utilaization->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" data-hidden="1" name="o<?= $Page->RowIndex ?>_Utilaization" id="o<?= $Page->RowIndex ?>_Utilaization" value="<?= HtmlEncode($Page->Utilaization->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
<script>
loadjs.ready(["fmas_services_billinglist","load"], function() {
    fmas_services_billinglist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_mas_services_billing", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->Id->Visible) { // Id ?>
        <td data-name="Id" <?= $Page->Id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Id" class="form-group"></span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" data-hidden="1" name="o<?= $Page->RowIndex ?>_Id" id="o<?= $Page->RowIndex ?>_Id" value="<?= HtmlEncode($Page->Id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Id" class="form-group">
<span<?= $Page->Id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Id->getDisplayValue($Page->Id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" data-hidden="1" name="x<?= $Page->RowIndex ?>_Id" id="x<?= $Page->RowIndex ?>_Id" value="<?= HtmlEncode($Page->Id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Id">
<span<?= $Page->Id->viewAttributes() ?>>
<?= $Page->Id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="mas_services_billing" data-field="x_Id" data-hidden="1" name="x<?= $Page->RowIndex ?>_Id" id="x<?= $Page->RowIndex ?>_Id" value="<?= HtmlEncode($Page->Id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->CODE->Visible) { // CODE ?>
        <td data-name="CODE" <?= $Page->CODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CODE" class="form-group">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CODE" name="x<?= $Page->RowIndex ?>_CODE" id="x<?= $Page->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_CODE" id="o<?= $Page->RowIndex ?>_CODE" value="<?= HtmlEncode($Page->CODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CODE" class="form-group">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CODE" name="x<?= $Page->RowIndex ?>_CODE" id="x<?= $Page->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CODE">
<span<?= $Page->CODE->viewAttributes() ?>>
<?= $Page->CODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE" <?= $Page->SERVICE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE" class="form-group">
<input type="<?= $Page->SERVICE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?= $Page->RowIndex ?>_SERVICE" id="x<?= $Page->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE->EditValue ?>"<?= $Page->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SERVICE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" data-hidden="1" name="o<?= $Page->RowIndex ?>_SERVICE" id="o<?= $Page->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Page->SERVICE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE" class="form-group">
<input type="<?= $Page->SERVICE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?= $Page->RowIndex ?>_SERVICE" id="x<?= $Page->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE->EditValue ?>"<?= $Page->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SERVICE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE">
<span<?= $Page->SERVICE->viewAttributes() ?>>
<?= $Page->SERVICE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UNITS->Visible) { // UNITS ?>
        <td data-name="UNITS" <?= $Page->UNITS->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UNITS" class="form-group">
<input type="<?= $Page->UNITS->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UNITS" name="x<?= $Page->RowIndex ?>_UNITS" id="x<?= $Page->RowIndex ?>_UNITS" size="30" placeholder="<?= HtmlEncode($Page->UNITS->getPlaceHolder()) ?>" value="<?= $Page->UNITS->EditValue ?>"<?= $Page->UNITS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UNITS->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" data-hidden="1" name="o<?= $Page->RowIndex ?>_UNITS" id="o<?= $Page->RowIndex ?>_UNITS" value="<?= HtmlEncode($Page->UNITS->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UNITS" class="form-group">
<input type="<?= $Page->UNITS->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UNITS" name="x<?= $Page->RowIndex ?>_UNITS" id="x<?= $Page->RowIndex ?>_UNITS" size="30" placeholder="<?= HtmlEncode($Page->UNITS->getPlaceHolder()) ?>" value="<?= $Page->UNITS->EditValue ?>"<?= $Page->UNITS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UNITS->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UNITS">
<span<?= $Page->UNITS->viewAttributes() ?>>
<?= $Page->UNITS->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <td data-name="AMOUNT" <?= $Page->AMOUNT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_AMOUNT" class="form-group">
<input type="<?= $Page->AMOUNT->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?= $Page->RowIndex ?>_AMOUNT" id="x<?= $Page->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AMOUNT->getPlaceHolder()) ?>" value="<?= $Page->AMOUNT->EditValue ?>"<?= $Page->AMOUNT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AMOUNT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" data-hidden="1" name="o<?= $Page->RowIndex ?>_AMOUNT" id="o<?= $Page->RowIndex ?>_AMOUNT" value="<?= HtmlEncode($Page->AMOUNT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_AMOUNT" class="form-group">
<input type="<?= $Page->AMOUNT->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?= $Page->RowIndex ?>_AMOUNT" id="x<?= $Page->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AMOUNT->getPlaceHolder()) ?>" value="<?= $Page->AMOUNT->EditValue ?>"<?= $Page->AMOUNT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AMOUNT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_AMOUNT">
<span<?= $Page->AMOUNT->viewAttributes() ?>>
<?= $Page->AMOUNT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE" <?= $Page->SERVICE_TYPE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE_TYPE" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        name="x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        class="form-control ew-select<?= $Page->SERVICE_TYPE->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        data-table="mas_services_billing"
        data-field="x_SERVICE_TYPE"
        data-value-separator="<?= $Page->SERVICE_TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SERVICE_TYPE->getPlaceHolder()) ?>"
        <?= $Page->SERVICE_TYPE->editAttributes() ?>>
        <?= $Page->SERVICE_TYPE->selectOptionListHtml("x{$Page->RowIndex}_SERVICE_TYPE") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$Page->SERVICE_TYPE->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_SERVICE_TYPE" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->SERVICE_TYPE->caption() ?>" data-title="<?= $Page->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_SERVICE_TYPE',url:'<?= GetUrl("MasServicesTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->SERVICE_TYPE->getErrorMessage() ?></div>
<?= $Page->SERVICE_TYPE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SERVICE_TYPE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE']"),
        options = { name: "x<?= $Page->RowIndex ?>_SERVICE_TYPE", selectId: "mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.SERVICE_TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-hidden="1" name="o<?= $Page->RowIndex ?>_SERVICE_TYPE" id="o<?= $Page->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Page->SERVICE_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE_TYPE" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        name="x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        class="form-control ew-select<?= $Page->SERVICE_TYPE->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        data-table="mas_services_billing"
        data-field="x_SERVICE_TYPE"
        data-value-separator="<?= $Page->SERVICE_TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SERVICE_TYPE->getPlaceHolder()) ?>"
        <?= $Page->SERVICE_TYPE->editAttributes() ?>>
        <?= $Page->SERVICE_TYPE->selectOptionListHtml("x{$Page->RowIndex}_SERVICE_TYPE") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$Page->SERVICE_TYPE->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_SERVICE_TYPE" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->SERVICE_TYPE->caption() ?>" data-title="<?= $Page->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_SERVICE_TYPE',url:'<?= GetUrl("MasServicesTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->SERVICE_TYPE->getErrorMessage() ?></div>
<?= $Page->SERVICE_TYPE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SERVICE_TYPE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE']"),
        options = { name: "x<?= $Page->RowIndex ?>_SERVICE_TYPE", selectId: "mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.SERVICE_TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_SERVICE_TYPE">
<span<?= $Page->SERVICE_TYPE->viewAttributes() ?>>
<?= $Page->SERVICE_TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT" <?= $Page->DEPARTMENT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DEPARTMENT" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_DEPARTMENT"
        name="x<?= $Page->RowIndex ?>_DEPARTMENT"
        class="form-control ew-select<?= $Page->DEPARTMENT->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT"
        data-table="mas_services_billing"
        data-field="x_DEPARTMENT"
        data-value-separator="<?= $Page->DEPARTMENT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>"
        <?= $Page->DEPARTMENT->editAttributes() ?>>
        <?= $Page->DEPARTMENT->selectOptionListHtml("x{$Page->RowIndex}_DEPARTMENT") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$Page->DEPARTMENT->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_DEPARTMENT" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->DEPARTMENT->caption() ?>" data-title="<?= $Page->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_DEPARTMENT',url:'<?= GetUrl("MasBillingDepartmentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage() ?></div>
<?= $Page->DEPARTMENT->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DEPARTMENT") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT']"),
        options = { name: "x<?= $Page->RowIndex ?>_DEPARTMENT", selectId: "mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.DEPARTMENT.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-hidden="1" name="o<?= $Page->RowIndex ?>_DEPARTMENT" id="o<?= $Page->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Page->DEPARTMENT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DEPARTMENT" class="form-group">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_DEPARTMENT"
        name="x<?= $Page->RowIndex ?>_DEPARTMENT"
        class="form-control ew-select<?= $Page->DEPARTMENT->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT"
        data-table="mas_services_billing"
        data-field="x_DEPARTMENT"
        data-value-separator="<?= $Page->DEPARTMENT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>"
        <?= $Page->DEPARTMENT->editAttributes() ?>>
        <?= $Page->DEPARTMENT->selectOptionListHtml("x{$Page->RowIndex}_DEPARTMENT") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$Page->DEPARTMENT->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_DEPARTMENT" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->DEPARTMENT->caption() ?>" data-title="<?= $Page->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_DEPARTMENT',url:'<?= GetUrl("MasBillingDepartmentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage() ?></div>
<?= $Page->DEPARTMENT->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DEPARTMENT") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT']"),
        options = { name: "x<?= $Page->RowIndex ?>_DEPARTMENT", selectId: "mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.DEPARTMENT.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DEPARTMENT">
<span<?= $Page->DEPARTMENT->viewAttributes() ?>>
<?= $Page->DEPARTMENT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <td data-name="mas_services_billingcol" <?= $Page->mas_services_billingcol->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_mas_services_billingcol" class="form-group">
<input type="<?= $Page->mas_services_billingcol->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?= $Page->RowIndex ?>_mas_services_billingcol" id="x<?= $Page->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mas_services_billingcol->getPlaceHolder()) ?>" value="<?= $Page->mas_services_billingcol->EditValue ?>"<?= $Page->mas_services_billingcol->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mas_services_billingcol->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" data-hidden="1" name="o<?= $Page->RowIndex ?>_mas_services_billingcol" id="o<?= $Page->RowIndex ?>_mas_services_billingcol" value="<?= HtmlEncode($Page->mas_services_billingcol->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_mas_services_billingcol" class="form-group">
<input type="<?= $Page->mas_services_billingcol->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?= $Page->RowIndex ?>_mas_services_billingcol" id="x<?= $Page->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mas_services_billingcol->getPlaceHolder()) ?>" value="<?= $Page->mas_services_billingcol->EditValue ?>"<?= $Page->mas_services_billingcol->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mas_services_billingcol->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_mas_services_billingcol">
<span<?= $Page->mas_services_billingcol->viewAttributes() ?>>
<?= $Page->mas_services_billingcol->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount" <?= $Page->DrShareAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrShareAmount" class="form-group">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?= $Page->RowIndex ?>_DrShareAmount" id="x<?= $Page->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrShareAmount" id="o<?= $Page->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Page->DrShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrShareAmount" class="form-group">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?= $Page->RowIndex ?>_DrShareAmount" id="x<?= $Page->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrShareAmount">
<span<?= $Page->DrShareAmount->viewAttributes() ?>>
<?= $Page->DrShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount" <?= $Page->HospShareAmount->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospShareAmount" class="form-group">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?= $Page->RowIndex ?>_HospShareAmount" id="x<?= $Page->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospShareAmount" id="o<?= $Page->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Page->HospShareAmount->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospShareAmount" class="form-group">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?= $Page->RowIndex ?>_HospShareAmount" id="x<?= $Page->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospShareAmount">
<span<?= $Page->HospShareAmount->viewAttributes() ?>>
<?= $Page->HospShareAmount->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <td data-name="DrSharePer" <?= $Page->DrSharePer->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrSharePer" class="form-group">
<input type="<?= $Page->DrSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?= $Page->RowIndex ?>_DrSharePer" id="x<?= $Page->RowIndex ?>_DrSharePer" size="30" placeholder="<?= HtmlEncode($Page->DrSharePer->getPlaceHolder()) ?>" value="<?= $Page->DrSharePer->EditValue ?>"<?= $Page->DrSharePer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrSharePer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrSharePer" id="o<?= $Page->RowIndex ?>_DrSharePer" value="<?= HtmlEncode($Page->DrSharePer->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrSharePer" class="form-group">
<input type="<?= $Page->DrSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?= $Page->RowIndex ?>_DrSharePer" id="x<?= $Page->RowIndex ?>_DrSharePer" size="30" placeholder="<?= HtmlEncode($Page->DrSharePer->getPlaceHolder()) ?>" value="<?= $Page->DrSharePer->EditValue ?>"<?= $Page->DrSharePer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrSharePer->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_DrSharePer">
<span<?= $Page->DrSharePer->viewAttributes() ?>>
<?= $Page->DrSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <td data-name="HospSharePer" <?= $Page->HospSharePer->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospSharePer" class="form-group">
<input type="<?= $Page->HospSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?= $Page->RowIndex ?>_HospSharePer" id="x<?= $Page->RowIndex ?>_HospSharePer" size="30" placeholder="<?= HtmlEncode($Page->HospSharePer->getPlaceHolder()) ?>" value="<?= $Page->HospSharePer->EditValue ?>"<?= $Page->HospSharePer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospSharePer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospSharePer" id="o<?= $Page->RowIndex ?>_HospSharePer" value="<?= HtmlEncode($Page->HospSharePer->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospSharePer" class="form-group">
<input type="<?= $Page->HospSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?= $Page->RowIndex ?>_HospSharePer" id="x<?= $Page->RowIndex ?>_HospSharePer" size="30" placeholder="<?= HtmlEncode($Page->HospSharePer->getPlaceHolder()) ?>" value="<?= $Page->HospSharePer->EditValue ?>"<?= $Page->HospSharePer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospSharePer->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospSharePer">
<span<?= $Page->HospSharePer->viewAttributes() ?>>
<?= $Page->HospSharePer->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd" <?= $Page->TestSubCd->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestSubCd" class="form-group">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?= $Page->RowIndex ?>_TestSubCd" id="x<?= $Page->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestSubCd" id="o<?= $Page->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Page->TestSubCd->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestSubCd" class="form-group">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?= $Page->RowIndex ?>_TestSubCd" id="x<?= $Page->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestSubCd">
<span<?= $Page->TestSubCd->viewAttributes() ?>>
<?= $Page->TestSubCd->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method" <?= $Page->Method->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Method" class="form-group">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Method" name="x<?= $Page->RowIndex ?>_Method" id="x<?= $Page->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" data-hidden="1" name="o<?= $Page->RowIndex ?>_Method" id="o<?= $Page->RowIndex ?>_Method" value="<?= HtmlEncode($Page->Method->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Method" class="form-group">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Method" name="x<?= $Page->RowIndex ?>_Method" id="x<?= $Page->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Method">
<span<?= $Page->Method->viewAttributes() ?>>
<?= $Page->Method->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order" <?= $Page->Order->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Order" class="form-group">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" data-hidden="1" name="o<?= $Page->RowIndex ?>_Order" id="o<?= $Page->RowIndex ?>_Order" value="<?= HtmlEncode($Page->Order->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Order" class="form-group">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Order">
<span<?= $Page->Order->viewAttributes() ?>>
<?= $Page->Order->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ResType->Visible) { // ResType ?>
        <td data-name="ResType" <?= $Page->ResType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ResType" class="form-group">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ResType" name="x<?= $Page->RowIndex ?>_ResType" id="x<?= $Page->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResType" id="o<?= $Page->RowIndex ?>_ResType" value="<?= HtmlEncode($Page->ResType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ResType" class="form-group">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ResType" name="x<?= $Page->RowIndex ?>_ResType" id="x<?= $Page->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ResType">
<span<?= $Page->ResType->viewAttributes() ?>>
<?= $Page->ResType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td data-name="UnitCD" <?= $Page->UnitCD->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UnitCD" class="form-group">
<input type="<?= $Page->UnitCD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?= $Page->RowIndex ?>_UnitCD" id="x<?= $Page->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UnitCD->getPlaceHolder()) ?>" value="<?= $Page->UnitCD->EditValue ?>"<?= $Page->UnitCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UnitCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_UnitCD" id="o<?= $Page->RowIndex ?>_UnitCD" value="<?= HtmlEncode($Page->UnitCD->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UnitCD" class="form-group">
<input type="<?= $Page->UnitCD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?= $Page->RowIndex ?>_UnitCD" id="x<?= $Page->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UnitCD->getPlaceHolder()) ?>" value="<?= $Page->UnitCD->EditValue ?>"<?= $Page->UnitCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UnitCD->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_UnitCD">
<span<?= $Page->UnitCD->viewAttributes() ?>>
<?= $Page->UnitCD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Sample->Visible) { // Sample ?>
        <td data-name="Sample" <?= $Page->Sample->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Sample" class="form-group">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Sample" name="x<?= $Page->RowIndex ?>_Sample" id="x<?= $Page->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" data-hidden="1" name="o<?= $Page->RowIndex ?>_Sample" id="o<?= $Page->RowIndex ?>_Sample" value="<?= HtmlEncode($Page->Sample->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Sample" class="form-group">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Sample" name="x<?= $Page->RowIndex ?>_Sample" id="x<?= $Page->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Sample">
<span<?= $Page->Sample->viewAttributes() ?>>
<?= $Page->Sample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NoD->Visible) { // NoD ?>
        <td data-name="NoD" <?= $Page->NoD->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoD" class="form-group">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoD" name="x<?= $Page->RowIndex ?>_NoD" id="x<?= $Page->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoD" id="o<?= $Page->RowIndex ?>_NoD" value="<?= HtmlEncode($Page->NoD->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoD" class="form-group">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoD" name="x<?= $Page->RowIndex ?>_NoD" id="x<?= $Page->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoD">
<span<?= $Page->NoD->viewAttributes() ?>>
<?= $Page->NoD->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder" <?= $Page->BillOrder->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_BillOrder" class="form-group">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?= $Page->RowIndex ?>_BillOrder" id="x<?= $Page->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillOrder" id="o<?= $Page->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Page->BillOrder->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_BillOrder" class="form-group">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?= $Page->RowIndex ?>_BillOrder" id="x<?= $Page->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_BillOrder">
<span<?= $Page->BillOrder->viewAttributes() ?>>
<?= $Page->BillOrder->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive" <?= $Page->Inactive->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Inactive" class="form-group">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Inactive" name="x<?= $Page->RowIndex ?>_Inactive" id="x<?= $Page->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" data-hidden="1" name="o<?= $Page->RowIndex ?>_Inactive" id="o<?= $Page->RowIndex ?>_Inactive" value="<?= HtmlEncode($Page->Inactive->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Inactive" class="form-group">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Inactive" name="x<?= $Page->RowIndex ?>_Inactive" id="x<?= $Page->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Inactive">
<span<?= $Page->Inactive->viewAttributes() ?>>
<?= $Page->Inactive->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td data-name="Outsource" <?= $Page->Outsource->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Outsource" class="form-group">
<input type="<?= $Page->Outsource->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Outsource" name="x<?= $Page->RowIndex ?>_Outsource" id="x<?= $Page->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Outsource->getPlaceHolder()) ?>" value="<?= $Page->Outsource->EditValue ?>"<?= $Page->Outsource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Outsource->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" data-hidden="1" name="o<?= $Page->RowIndex ?>_Outsource" id="o<?= $Page->RowIndex ?>_Outsource" value="<?= HtmlEncode($Page->Outsource->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Outsource" class="form-group">
<input type="<?= $Page->Outsource->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Outsource" name="x<?= $Page->RowIndex ?>_Outsource" id="x<?= $Page->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Outsource->getPlaceHolder()) ?>" value="<?= $Page->Outsource->EditValue ?>"<?= $Page->Outsource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Outsource->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Outsource">
<span<?= $Page->Outsource->viewAttributes() ?>>
<?= $Page->Outsource->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample" <?= $Page->CollSample->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CollSample" class="form-group">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CollSample" name="x<?= $Page->RowIndex ?>_CollSample" id="x<?= $Page->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" data-hidden="1" name="o<?= $Page->RowIndex ?>_CollSample" id="o<?= $Page->RowIndex ?>_CollSample" value="<?= HtmlEncode($Page->CollSample->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CollSample" class="form-group">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CollSample" name="x<?= $Page->RowIndex ?>_CollSample" id="x<?= $Page->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_CollSample">
<span<?= $Page->CollSample->viewAttributes() ?>>
<?= $Page->CollSample->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType" <?= $Page->TestType->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestType" class="form-group">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestType" id="o<?= $Page->RowIndex ?>_TestType" value="<?= HtmlEncode($Page->TestType->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestType" class="form-group">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_TestType">
<span<?= $Page->TestType->viewAttributes() ?>>
<?= $Page->TestType->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <td data-name="NoHeading" <?= $Page->NoHeading->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoHeading" class="form-group">
<input type="<?= $Page->NoHeading->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?= $Page->RowIndex ?>_NoHeading" id="x<?= $Page->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHeading->getPlaceHolder()) ?>" value="<?= $Page->NoHeading->EditValue ?>"<?= $Page->NoHeading->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoHeading->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoHeading" id="o<?= $Page->RowIndex ?>_NoHeading" value="<?= HtmlEncode($Page->NoHeading->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoHeading" class="form-group">
<input type="<?= $Page->NoHeading->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?= $Page->RowIndex ?>_NoHeading" id="x<?= $Page->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHeading->getPlaceHolder()) ?>" value="<?= $Page->NoHeading->EditValue ?>"<?= $Page->NoHeading->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoHeading->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_NoHeading">
<span<?= $Page->NoHeading->viewAttributes() ?>>
<?= $Page->NoHeading->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <td data-name="ChemicalCode" <?= $Page->ChemicalCode->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalCode" class="form-group">
<input type="<?= $Page->ChemicalCode->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?= $Page->RowIndex ?>_ChemicalCode" id="x<?= $Page->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalCode->getPlaceHolder()) ?>" value="<?= $Page->ChemicalCode->EditValue ?>"<?= $Page->ChemicalCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ChemicalCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ChemicalCode" id="o<?= $Page->RowIndex ?>_ChemicalCode" value="<?= HtmlEncode($Page->ChemicalCode->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalCode" class="form-group">
<input type="<?= $Page->ChemicalCode->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?= $Page->RowIndex ?>_ChemicalCode" id="x<?= $Page->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalCode->getPlaceHolder()) ?>" value="<?= $Page->ChemicalCode->EditValue ?>"<?= $Page->ChemicalCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ChemicalCode->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalCode">
<span<?= $Page->ChemicalCode->viewAttributes() ?>>
<?= $Page->ChemicalCode->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <td data-name="ChemicalName" <?= $Page->ChemicalName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalName" class="form-group">
<input type="<?= $Page->ChemicalName->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?= $Page->RowIndex ?>_ChemicalName" id="x<?= $Page->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalName->getPlaceHolder()) ?>" value="<?= $Page->ChemicalName->EditValue ?>"<?= $Page->ChemicalName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ChemicalName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" data-hidden="1" name="o<?= $Page->RowIndex ?>_ChemicalName" id="o<?= $Page->RowIndex ?>_ChemicalName" value="<?= HtmlEncode($Page->ChemicalName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalName" class="form-group">
<input type="<?= $Page->ChemicalName->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?= $Page->RowIndex ?>_ChemicalName" id="x<?= $Page->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalName->getPlaceHolder()) ?>" value="<?= $Page->ChemicalName->EditValue ?>"<?= $Page->ChemicalName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ChemicalName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_ChemicalName">
<span<?= $Page->ChemicalName->viewAttributes() ?>>
<?= $Page->ChemicalName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <td data-name="Utilaization" <?= $Page->Utilaization->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Utilaization" class="form-group">
<input type="<?= $Page->Utilaization->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?= $Page->RowIndex ?>_Utilaization" id="x<?= $Page->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Utilaization->getPlaceHolder()) ?>" value="<?= $Page->Utilaization->EditValue ?>"<?= $Page->Utilaization->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Utilaization->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" data-hidden="1" name="o<?= $Page->RowIndex ?>_Utilaization" id="o<?= $Page->RowIndex ?>_Utilaization" value="<?= HtmlEncode($Page->Utilaization->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Utilaization" class="form-group">
<input type="<?= $Page->Utilaization->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?= $Page->RowIndex ?>_Utilaization" id="x<?= $Page->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Utilaization->getPlaceHolder()) ?>" value="<?= $Page->Utilaization->EditValue ?>"<?= $Page->Utilaization->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Utilaization->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_mas_services_billing_Utilaization">
<span<?= $Page->Utilaization->viewAttributes() ?>>
<?= $Page->Utilaization->getViewValue() ?></span>
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
loadjs.ready(["fmas_services_billinglist","load"], function () {
    fmas_services_billinglist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_mas_services_billing", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->Id->Visible) { // Id ?>
        <td data-name="Id">
<span id="el$rowindex$_mas_services_billing_Id" class="form-group mas_services_billing_Id"></span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Id" data-hidden="1" name="o<?= $Page->RowIndex ?>_Id" id="o<?= $Page->RowIndex ?>_Id" value="<?= HtmlEncode($Page->Id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CODE->Visible) { // CODE ?>
        <td data-name="CODE">
<span id="el$rowindex$_mas_services_billing_CODE" class="form-group mas_services_billing_CODE">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CODE" name="x<?= $Page->RowIndex ?>_CODE" id="x<?= $Page->RowIndex ?>_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_CODE" id="o<?= $Page->RowIndex ?>_CODE" value="<?= HtmlEncode($Page->CODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SERVICE->Visible) { // SERVICE ?>
        <td data-name="SERVICE">
<span id="el$rowindex$_mas_services_billing_SERVICE" class="form-group mas_services_billing_SERVICE">
<input type="<?= $Page->SERVICE->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_SERVICE" name="x<?= $Page->RowIndex ?>_SERVICE" id="x<?= $Page->RowIndex ?>_SERVICE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SERVICE->getPlaceHolder()) ?>" value="<?= $Page->SERVICE->EditValue ?>"<?= $Page->SERVICE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SERVICE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE" data-hidden="1" name="o<?= $Page->RowIndex ?>_SERVICE" id="o<?= $Page->RowIndex ?>_SERVICE" value="<?= HtmlEncode($Page->SERVICE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UNITS->Visible) { // UNITS ?>
        <td data-name="UNITS">
<span id="el$rowindex$_mas_services_billing_UNITS" class="form-group mas_services_billing_UNITS">
<input type="<?= $Page->UNITS->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UNITS" name="x<?= $Page->RowIndex ?>_UNITS" id="x<?= $Page->RowIndex ?>_UNITS" size="30" placeholder="<?= HtmlEncode($Page->UNITS->getPlaceHolder()) ?>" value="<?= $Page->UNITS->EditValue ?>"<?= $Page->UNITS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UNITS->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UNITS" data-hidden="1" name="o<?= $Page->RowIndex ?>_UNITS" id="o<?= $Page->RowIndex ?>_UNITS" value="<?= HtmlEncode($Page->UNITS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->AMOUNT->Visible) { // AMOUNT ?>
        <td data-name="AMOUNT">
<span id="el$rowindex$_mas_services_billing_AMOUNT" class="form-group mas_services_billing_AMOUNT">
<input type="<?= $Page->AMOUNT->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_AMOUNT" name="x<?= $Page->RowIndex ?>_AMOUNT" id="x<?= $Page->RowIndex ?>_AMOUNT" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AMOUNT->getPlaceHolder()) ?>" value="<?= $Page->AMOUNT->EditValue ?>"<?= $Page->AMOUNT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->AMOUNT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_AMOUNT" data-hidden="1" name="o<?= $Page->RowIndex ?>_AMOUNT" id="o<?= $Page->RowIndex ?>_AMOUNT" value="<?= HtmlEncode($Page->AMOUNT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SERVICE_TYPE->Visible) { // SERVICE_TYPE ?>
        <td data-name="SERVICE_TYPE">
<span id="el$rowindex$_mas_services_billing_SERVICE_TYPE" class="form-group mas_services_billing_SERVICE_TYPE">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        name="x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        class="form-control ew-select<?= $Page->SERVICE_TYPE->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE"
        data-table="mas_services_billing"
        data-field="x_SERVICE_TYPE"
        data-value-separator="<?= $Page->SERVICE_TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->SERVICE_TYPE->getPlaceHolder()) ?>"
        <?= $Page->SERVICE_TYPE->editAttributes() ?>>
        <?= $Page->SERVICE_TYPE->selectOptionListHtml("x{$Page->RowIndex}_SERVICE_TYPE") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_services_type") && !$Page->SERVICE_TYPE->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_SERVICE_TYPE" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->SERVICE_TYPE->caption() ?>" data-title="<?= $Page->SERVICE_TYPE->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_SERVICE_TYPE',url:'<?= GetUrl("MasServicesTypeAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->SERVICE_TYPE->getErrorMessage() ?></div>
<?= $Page->SERVICE_TYPE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_SERVICE_TYPE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE']"),
        options = { name: "x<?= $Page->RowIndex ?>_SERVICE_TYPE", selectId: "mas_services_billing_x<?= $Page->RowIndex ?>_SERVICE_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.SERVICE_TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_SERVICE_TYPE" data-hidden="1" name="o<?= $Page->RowIndex ?>_SERVICE_TYPE" id="o<?= $Page->RowIndex ?>_SERVICE_TYPE" value="<?= HtmlEncode($Page->SERVICE_TYPE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DEPARTMENT->Visible) { // DEPARTMENT ?>
        <td data-name="DEPARTMENT">
<span id="el$rowindex$_mas_services_billing_DEPARTMENT" class="form-group mas_services_billing_DEPARTMENT">
<div class="input-group flex-nowrap">
    <select
        id="x<?= $Page->RowIndex ?>_DEPARTMENT"
        name="x<?= $Page->RowIndex ?>_DEPARTMENT"
        class="form-control ew-select<?= $Page->DEPARTMENT->isInvalidClass() ?>"
        data-select2-id="mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT"
        data-table="mas_services_billing"
        data-field="x_DEPARTMENT"
        data-value-separator="<?= $Page->DEPARTMENT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DEPARTMENT->getPlaceHolder()) ?>"
        <?= $Page->DEPARTMENT->editAttributes() ?>>
        <?= $Page->DEPARTMENT->selectOptionListHtml("x{$Page->RowIndex}_DEPARTMENT") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_billing_department") && !$Page->DEPARTMENT->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?= $Page->RowIndex ?>_DEPARTMENT" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->DEPARTMENT->caption() ?>" data-title="<?= $Page->DEPARTMENT->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?= $Page->RowIndex ?>_DEPARTMENT',url:'<?= GetUrl("MasBillingDepartmentAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<div class="invalid-feedback"><?= $Page->DEPARTMENT->getErrorMessage() ?></div>
<?= $Page->DEPARTMENT->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DEPARTMENT") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT']"),
        options = { name: "x<?= $Page->RowIndex ?>_DEPARTMENT", selectId: "mas_services_billing_x<?= $Page->RowIndex ?>_DEPARTMENT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.mas_services_billing.fields.DEPARTMENT.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DEPARTMENT" data-hidden="1" name="o<?= $Page->RowIndex ?>_DEPARTMENT" id="o<?= $Page->RowIndex ?>_DEPARTMENT" value="<?= HtmlEncode($Page->DEPARTMENT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->mas_services_billingcol->Visible) { // mas_services_billingcol ?>
        <td data-name="mas_services_billingcol">
<span id="el$rowindex$_mas_services_billing_mas_services_billingcol" class="form-group mas_services_billing_mas_services_billingcol">
<input type="<?= $Page->mas_services_billingcol->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_mas_services_billingcol" name="x<?= $Page->RowIndex ?>_mas_services_billingcol" id="x<?= $Page->RowIndex ?>_mas_services_billingcol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mas_services_billingcol->getPlaceHolder()) ?>" value="<?= $Page->mas_services_billingcol->EditValue ?>"<?= $Page->mas_services_billingcol->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->mas_services_billingcol->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_mas_services_billingcol" data-hidden="1" name="o<?= $Page->RowIndex ?>_mas_services_billingcol" id="o<?= $Page->RowIndex ?>_mas_services_billingcol" value="<?= HtmlEncode($Page->mas_services_billingcol->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DrShareAmount->Visible) { // DrShareAmount ?>
        <td data-name="DrShareAmount">
<span id="el$rowindex$_mas_services_billing_DrShareAmount" class="form-group mas_services_billing_DrShareAmount">
<input type="<?= $Page->DrShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrShareAmount" name="x<?= $Page->RowIndex ?>_DrShareAmount" id="x<?= $Page->RowIndex ?>_DrShareAmount" size="30" placeholder="<?= HtmlEncode($Page->DrShareAmount->getPlaceHolder()) ?>" value="<?= $Page->DrShareAmount->EditValue ?>"<?= $Page->DrShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrShareAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrShareAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrShareAmount" id="o<?= $Page->RowIndex ?>_DrShareAmount" value="<?= HtmlEncode($Page->DrShareAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospShareAmount->Visible) { // HospShareAmount ?>
        <td data-name="HospShareAmount">
<span id="el$rowindex$_mas_services_billing_HospShareAmount" class="form-group mas_services_billing_HospShareAmount">
<input type="<?= $Page->HospShareAmount->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospShareAmount" name="x<?= $Page->RowIndex ?>_HospShareAmount" id="x<?= $Page->RowIndex ?>_HospShareAmount" size="30" placeholder="<?= HtmlEncode($Page->HospShareAmount->getPlaceHolder()) ?>" value="<?= $Page->HospShareAmount->EditValue ?>"<?= $Page->HospShareAmount->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospShareAmount->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospShareAmount" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospShareAmount" id="o<?= $Page->RowIndex ?>_HospShareAmount" value="<?= HtmlEncode($Page->HospShareAmount->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DrSharePer->Visible) { // DrSharePer ?>
        <td data-name="DrSharePer">
<span id="el$rowindex$_mas_services_billing_DrSharePer" class="form-group mas_services_billing_DrSharePer">
<input type="<?= $Page->DrSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_DrSharePer" name="x<?= $Page->RowIndex ?>_DrSharePer" id="x<?= $Page->RowIndex ?>_DrSharePer" size="30" placeholder="<?= HtmlEncode($Page->DrSharePer->getPlaceHolder()) ?>" value="<?= $Page->DrSharePer->EditValue ?>"<?= $Page->DrSharePer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DrSharePer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_DrSharePer" data-hidden="1" name="o<?= $Page->RowIndex ?>_DrSharePer" id="o<?= $Page->RowIndex ?>_DrSharePer" value="<?= HtmlEncode($Page->DrSharePer->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospSharePer->Visible) { // HospSharePer ?>
        <td data-name="HospSharePer">
<span id="el$rowindex$_mas_services_billing_HospSharePer" class="form-group mas_services_billing_HospSharePer">
<input type="<?= $Page->HospSharePer->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_HospSharePer" name="x<?= $Page->RowIndex ?>_HospSharePer" id="x<?= $Page->RowIndex ?>_HospSharePer" size="30" placeholder="<?= HtmlEncode($Page->HospSharePer->getPlaceHolder()) ?>" value="<?= $Page->HospSharePer->EditValue ?>"<?= $Page->HospSharePer->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospSharePer->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_HospSharePer" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospSharePer" id="o<?= $Page->RowIndex ?>_HospSharePer" value="<?= HtmlEncode($Page->HospSharePer->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<input type="hidden" data-table="mas_services_billing" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestSubCd->Visible) { // TestSubCd ?>
        <td data-name="TestSubCd">
<span id="el$rowindex$_mas_services_billing_TestSubCd" class="form-group mas_services_billing_TestSubCd">
<input type="<?= $Page->TestSubCd->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestSubCd" name="x<?= $Page->RowIndex ?>_TestSubCd" id="x<?= $Page->RowIndex ?>_TestSubCd" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestSubCd->getPlaceHolder()) ?>" value="<?= $Page->TestSubCd->EditValue ?>"<?= $Page->TestSubCd->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestSubCd->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestSubCd" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestSubCd" id="o<?= $Page->RowIndex ?>_TestSubCd" value="<?= HtmlEncode($Page->TestSubCd->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Method->Visible) { // Method ?>
        <td data-name="Method">
<span id="el$rowindex$_mas_services_billing_Method" class="form-group mas_services_billing_Method">
<input type="<?= $Page->Method->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Method" name="x<?= $Page->RowIndex ?>_Method" id="x<?= $Page->RowIndex ?>_Method" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Method->getPlaceHolder()) ?>" value="<?= $Page->Method->EditValue ?>"<?= $Page->Method->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Method->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Method" data-hidden="1" name="o<?= $Page->RowIndex ?>_Method" id="o<?= $Page->RowIndex ?>_Method" value="<?= HtmlEncode($Page->Method->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Order->Visible) { // Order ?>
        <td data-name="Order">
<span id="el$rowindex$_mas_services_billing_Order" class="form-group mas_services_billing_Order">
<input type="<?= $Page->Order->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Order" name="x<?= $Page->RowIndex ?>_Order" id="x<?= $Page->RowIndex ?>_Order" size="30" placeholder="<?= HtmlEncode($Page->Order->getPlaceHolder()) ?>" value="<?= $Page->Order->EditValue ?>"<?= $Page->Order->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Order->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Order" data-hidden="1" name="o<?= $Page->RowIndex ?>_Order" id="o<?= $Page->RowIndex ?>_Order" value="<?= HtmlEncode($Page->Order->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ResType->Visible) { // ResType ?>
        <td data-name="ResType">
<span id="el$rowindex$_mas_services_billing_ResType" class="form-group mas_services_billing_ResType">
<input type="<?= $Page->ResType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ResType" name="x<?= $Page->RowIndex ?>_ResType" id="x<?= $Page->RowIndex ?>_ResType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ResType->getPlaceHolder()) ?>" value="<?= $Page->ResType->EditValue ?>"<?= $Page->ResType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ResType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ResType" data-hidden="1" name="o<?= $Page->RowIndex ?>_ResType" id="o<?= $Page->RowIndex ?>_ResType" value="<?= HtmlEncode($Page->ResType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UnitCD->Visible) { // UnitCD ?>
        <td data-name="UnitCD">
<span id="el$rowindex$_mas_services_billing_UnitCD" class="form-group mas_services_billing_UnitCD">
<input type="<?= $Page->UnitCD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_UnitCD" name="x<?= $Page->RowIndex ?>_UnitCD" id="x<?= $Page->RowIndex ?>_UnitCD" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UnitCD->getPlaceHolder()) ?>" value="<?= $Page->UnitCD->EditValue ?>"<?= $Page->UnitCD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UnitCD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_UnitCD" data-hidden="1" name="o<?= $Page->RowIndex ?>_UnitCD" id="o<?= $Page->RowIndex ?>_UnitCD" value="<?= HtmlEncode($Page->UnitCD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Sample->Visible) { // Sample ?>
        <td data-name="Sample">
<span id="el$rowindex$_mas_services_billing_Sample" class="form-group mas_services_billing_Sample">
<input type="<?= $Page->Sample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Sample" name="x<?= $Page->RowIndex ?>_Sample" id="x<?= $Page->RowIndex ?>_Sample" size="30" maxlength="105" placeholder="<?= HtmlEncode($Page->Sample->getPlaceHolder()) ?>" value="<?= $Page->Sample->EditValue ?>"<?= $Page->Sample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Sample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Sample" data-hidden="1" name="o<?= $Page->RowIndex ?>_Sample" id="o<?= $Page->RowIndex ?>_Sample" value="<?= HtmlEncode($Page->Sample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoD->Visible) { // NoD ?>
        <td data-name="NoD">
<span id="el$rowindex$_mas_services_billing_NoD" class="form-group mas_services_billing_NoD">
<input type="<?= $Page->NoD->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoD" name="x<?= $Page->RowIndex ?>_NoD" id="x<?= $Page->RowIndex ?>_NoD" size="30" placeholder="<?= HtmlEncode($Page->NoD->getPlaceHolder()) ?>" value="<?= $Page->NoD->EditValue ?>"<?= $Page->NoD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoD->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoD" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoD" id="o<?= $Page->RowIndex ?>_NoD" value="<?= HtmlEncode($Page->NoD->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BillOrder->Visible) { // BillOrder ?>
        <td data-name="BillOrder">
<span id="el$rowindex$_mas_services_billing_BillOrder" class="form-group mas_services_billing_BillOrder">
<input type="<?= $Page->BillOrder->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_BillOrder" name="x<?= $Page->RowIndex ?>_BillOrder" id="x<?= $Page->RowIndex ?>_BillOrder" size="30" placeholder="<?= HtmlEncode($Page->BillOrder->getPlaceHolder()) ?>" value="<?= $Page->BillOrder->EditValue ?>"<?= $Page->BillOrder->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BillOrder->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_BillOrder" data-hidden="1" name="o<?= $Page->RowIndex ?>_BillOrder" id="o<?= $Page->RowIndex ?>_BillOrder" value="<?= HtmlEncode($Page->BillOrder->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Inactive->Visible) { // Inactive ?>
        <td data-name="Inactive">
<span id="el$rowindex$_mas_services_billing_Inactive" class="form-group mas_services_billing_Inactive">
<input type="<?= $Page->Inactive->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Inactive" name="x<?= $Page->RowIndex ?>_Inactive" id="x<?= $Page->RowIndex ?>_Inactive" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Inactive->getPlaceHolder()) ?>" value="<?= $Page->Inactive->EditValue ?>"<?= $Page->Inactive->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Inactive->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Inactive" data-hidden="1" name="o<?= $Page->RowIndex ?>_Inactive" id="o<?= $Page->RowIndex ?>_Inactive" value="<?= HtmlEncode($Page->Inactive->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Outsource->Visible) { // Outsource ?>
        <td data-name="Outsource">
<span id="el$rowindex$_mas_services_billing_Outsource" class="form-group mas_services_billing_Outsource">
<input type="<?= $Page->Outsource->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Outsource" name="x<?= $Page->RowIndex ?>_Outsource" id="x<?= $Page->RowIndex ?>_Outsource" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Outsource->getPlaceHolder()) ?>" value="<?= $Page->Outsource->EditValue ?>"<?= $Page->Outsource->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Outsource->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Outsource" data-hidden="1" name="o<?= $Page->RowIndex ?>_Outsource" id="o<?= $Page->RowIndex ?>_Outsource" value="<?= HtmlEncode($Page->Outsource->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CollSample->Visible) { // CollSample ?>
        <td data-name="CollSample">
<span id="el$rowindex$_mas_services_billing_CollSample" class="form-group mas_services_billing_CollSample">
<input type="<?= $Page->CollSample->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_CollSample" name="x<?= $Page->RowIndex ?>_CollSample" id="x<?= $Page->RowIndex ?>_CollSample" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CollSample->getPlaceHolder()) ?>" value="<?= $Page->CollSample->EditValue ?>"<?= $Page->CollSample->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CollSample->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_CollSample" data-hidden="1" name="o<?= $Page->RowIndex ?>_CollSample" id="o<?= $Page->RowIndex ?>_CollSample" value="<?= HtmlEncode($Page->CollSample->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TestType->Visible) { // TestType ?>
        <td data-name="TestType">
<span id="el$rowindex$_mas_services_billing_TestType" class="form-group mas_services_billing_TestType">
<input type="<?= $Page->TestType->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_TestType" name="x<?= $Page->RowIndex ?>_TestType" id="x<?= $Page->RowIndex ?>_TestType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TestType->getPlaceHolder()) ?>" value="<?= $Page->TestType->EditValue ?>"<?= $Page->TestType->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TestType->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_TestType" data-hidden="1" name="o<?= $Page->RowIndex ?>_TestType" id="o<?= $Page->RowIndex ?>_TestType" value="<?= HtmlEncode($Page->TestType->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->NoHeading->Visible) { // NoHeading ?>
        <td data-name="NoHeading">
<span id="el$rowindex$_mas_services_billing_NoHeading" class="form-group mas_services_billing_NoHeading">
<input type="<?= $Page->NoHeading->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_NoHeading" name="x<?= $Page->RowIndex ?>_NoHeading" id="x<?= $Page->RowIndex ?>_NoHeading" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NoHeading->getPlaceHolder()) ?>" value="<?= $Page->NoHeading->EditValue ?>"<?= $Page->NoHeading->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NoHeading->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_NoHeading" data-hidden="1" name="o<?= $Page->RowIndex ?>_NoHeading" id="o<?= $Page->RowIndex ?>_NoHeading" value="<?= HtmlEncode($Page->NoHeading->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ChemicalCode->Visible) { // ChemicalCode ?>
        <td data-name="ChemicalCode">
<span id="el$rowindex$_mas_services_billing_ChemicalCode" class="form-group mas_services_billing_ChemicalCode">
<input type="<?= $Page->ChemicalCode->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalCode" name="x<?= $Page->RowIndex ?>_ChemicalCode" id="x<?= $Page->RowIndex ?>_ChemicalCode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalCode->getPlaceHolder()) ?>" value="<?= $Page->ChemicalCode->EditValue ?>"<?= $Page->ChemicalCode->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ChemicalCode->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalCode" data-hidden="1" name="o<?= $Page->RowIndex ?>_ChemicalCode" id="o<?= $Page->RowIndex ?>_ChemicalCode" value="<?= HtmlEncode($Page->ChemicalCode->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->ChemicalName->Visible) { // ChemicalName ?>
        <td data-name="ChemicalName">
<span id="el$rowindex$_mas_services_billing_ChemicalName" class="form-group mas_services_billing_ChemicalName">
<input type="<?= $Page->ChemicalName->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_ChemicalName" name="x<?= $Page->RowIndex ?>_ChemicalName" id="x<?= $Page->RowIndex ?>_ChemicalName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ChemicalName->getPlaceHolder()) ?>" value="<?= $Page->ChemicalName->EditValue ?>"<?= $Page->ChemicalName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ChemicalName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_ChemicalName" data-hidden="1" name="o<?= $Page->RowIndex ?>_ChemicalName" id="o<?= $Page->RowIndex ?>_ChemicalName" value="<?= HtmlEncode($Page->ChemicalName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Utilaization->Visible) { // Utilaization ?>
        <td data-name="Utilaization">
<span id="el$rowindex$_mas_services_billing_Utilaization" class="form-group mas_services_billing_Utilaization">
<input type="<?= $Page->Utilaization->getInputTextType() ?>" data-table="mas_services_billing" data-field="x_Utilaization" name="x<?= $Page->RowIndex ?>_Utilaization" id="x<?= $Page->RowIndex ?>_Utilaization" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Utilaization->getPlaceHolder()) ?>" value="<?= $Page->Utilaization->EditValue ?>"<?= $Page->Utilaization->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Utilaization->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="mas_services_billing" data-field="x_Utilaization" data-hidden="1" name="o<?= $Page->RowIndex ?>_Utilaization" id="o<?= $Page->RowIndex ?>_Utilaization" value="<?= HtmlEncode($Page->Utilaization->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fmas_services_billinglist","load"], function() {
    fmas_services_billinglist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("mas_services_billing");
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
        container: "gmp_mas_services_billing",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

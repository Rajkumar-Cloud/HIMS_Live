<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradenamesNewList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_tradenames_newlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpres_tradenames_newlist = currentForm = new ew.Form("fpres_tradenames_newlist", "list");
    fpres_tradenames_newlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';
    loadjs.done("fpres_tradenames_newlist");
});
var fpres_tradenames_newlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpres_tradenames_newlistsrch = currentSearchForm = new ew.Form("fpres_tradenames_newlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_tradenames_new")) ?>,
        fields = currentTable.fields;
    fpres_tradenames_newlistsrch.addFields([
        ["ID", [], fields.ID.isInvalid],
        ["Drug_Name", [], fields.Drug_Name.isInvalid],
        ["Generic_Name", [], fields.Generic_Name.isInvalid],
        ["Trade_Name", [], fields.Trade_Name.isInvalid],
        ["PR_CODE", [], fields.PR_CODE.isInvalid],
        ["Form", [], fields.Form.isInvalid],
        ["Strength", [], fields.Strength.isInvalid],
        ["Unit", [], fields.Unit.isInvalid],
        ["TypeOfDrug", [], fields.TypeOfDrug.isInvalid],
        ["ProductType", [], fields.ProductType.isInvalid],
        ["Generic_Name1", [], fields.Generic_Name1.isInvalid],
        ["Strength1", [], fields.Strength1.isInvalid],
        ["Unit1", [], fields.Unit1.isInvalid],
        ["Generic_Name2", [], fields.Generic_Name2.isInvalid],
        ["Strength2", [], fields.Strength2.isInvalid],
        ["Unit2", [], fields.Unit2.isInvalid],
        ["Generic_Name3", [], fields.Generic_Name3.isInvalid],
        ["Strength3", [], fields.Strength3.isInvalid],
        ["Unit3", [], fields.Unit3.isInvalid],
        ["Generic_Name4", [], fields.Generic_Name4.isInvalid],
        ["Generic_Name5", [], fields.Generic_Name5.isInvalid],
        ["Strength4", [], fields.Strength4.isInvalid],
        ["Strength5", [], fields.Strength5.isInvalid],
        ["Unit4", [], fields.Unit4.isInvalid],
        ["Unit5", [], fields.Unit5.isInvalid],
        ["AlterNative1", [], fields.AlterNative1.isInvalid],
        ["AlterNative2", [], fields.AlterNative2.isInvalid],
        ["AlterNative3", [], fields.AlterNative3.isInvalid],
        ["AlterNative4", [], fields.AlterNative4.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpres_tradenames_newlistsrch.setInvalid();
    });

    // Validate form
    fpres_tradenames_newlistsrch.validate = function () {
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
    fpres_tradenames_newlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_tradenames_newlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpres_tradenames_newlistsrch.lists.Generic_Name = <?= $Page->Generic_Name->toClientList($Page) ?>;
    fpres_tradenames_newlistsrch.lists.TypeOfDrug = <?= $Page->TypeOfDrug->toClientList($Page) ?>;

    // Filters
    fpres_tradenames_newlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpres_tradenames_newlistsrch");
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
<form name="fpres_tradenames_newlistsrch" id="fpres_tradenames_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpres_tradenames_newlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_tradenames_new">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Drug_Name" class="ew-cell form-group">
        <label for="x_Drug_Name" class="ew-search-caption ew-label"><?= $Page->Drug_Name->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Drug_Name" id="z_Drug_Name" value="LIKE">
</span>
        <span id="el_pres_tradenames_new_Drug_Name" class="ew-search-field">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Drug_Name" name="x_Drug_Name" id="x_Drug_Name" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Generic_Name" class="ew-cell form-group">
        <label for="x_Generic_Name" class="ew-search-caption ew-label"><?= $Page->Generic_Name->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Generic_Name" id="z_Generic_Name" value="LIKE">
</span>
        <span id="el_pres_tradenames_new_Generic_Name" class="ew-search-field">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Generic_Name"><?= EmptyValue(strval($Page->Generic_Name->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Generic_Name->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Generic_Name->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Generic_Name->ReadOnly || $Page->Generic_Name->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Generic_Name',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage(false) ?></div>
<?= $Page->Generic_Name->Lookup->getParamTag($Page, "p_x_Generic_Name") ?>
<input type="hidden" is="selection-list" data-table="pres_tradenames_new" data-field="x_Generic_Name" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Generic_Name->displayValueSeparatorAttribute() ?>" name="x_Generic_Name" id="x_Generic_Name" value="<?= $Page->Generic_Name->AdvancedSearch->SearchValue ?>"<?= $Page->Generic_Name->editAttributes() ?>>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_Trade_Name" class="ew-cell form-group">
        <label for="x_Trade_Name" class="ew-search-caption ew-label"><?= $Page->Trade_Name->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Trade_Name" id="z_Trade_Name" value="LIKE">
</span>
        <span id="el_pres_tradenames_new_Trade_Name" class="ew-search-field">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_tradenames_new" data-field="x_Trade_Name" name="x_Trade_Name" id="x_Trade_Name" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_TypeOfDrug" class="ew-cell form-group">
        <label for="x_TypeOfDrug" class="ew-search-caption ew-label"><?= $Page->TypeOfDrug->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TypeOfDrug" id="z_TypeOfDrug" value="LIKE">
</span>
        <span id="el_pres_tradenames_new_TypeOfDrug" class="ew-search-field">
    <select
        id="x_TypeOfDrug"
        name="x_TypeOfDrug"
        class="form-control ew-select<?= $Page->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_tradenames_new_x_TypeOfDrug"
        data-table="pres_tradenames_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Page->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Page->TypeOfDrug->editAttributes() ?>>
        <?= $Page->TypeOfDrug->selectOptionListHtml("x_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TypeOfDrug->getErrorMessage(false) ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_tradenames_new_x_TypeOfDrug']"),
        options = { name: "x_TypeOfDrug", selectId: "pres_tradenames_new_x_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_tradenames_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_tradenames_new.fields.TypeOfDrug.selectOptions);
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_tradenames_new">
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
<form name="fpres_tradenames_newlist" id="fpres_tradenames_newlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_tradenames_new">
<div id="gmp_pres_tradenames_new" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pres_tradenames_newlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->ID->Visible) { // ID ?>
        <th data-name="ID" class="<?= $Page->ID->headerCellClass() ?>"><div id="elh_pres_tradenames_new_ID" class="pres_tradenames_new_ID"><?= $Page->renderSort($Page->ID) ?></div></th>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <th data-name="Drug_Name" class="<?= $Page->Drug_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Drug_Name" class="pres_tradenames_new_Drug_Name"><?= $Page->renderSort($Page->Drug_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <th data-name="Generic_Name" class="<?= $Page->Generic_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name" class="pres_tradenames_new_Generic_Name"><?= $Page->renderSort($Page->Generic_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <th data-name="Trade_Name" class="<?= $Page->Trade_Name->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Trade_Name" class="pres_tradenames_new_Trade_Name"><?= $Page->renderSort($Page->Trade_Name) ?></div></th>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <th data-name="PR_CODE" class="<?= $Page->PR_CODE->headerCellClass() ?>"><div id="elh_pres_tradenames_new_PR_CODE" class="pres_tradenames_new_PR_CODE"><?= $Page->renderSort($Page->PR_CODE) ?></div></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th data-name="Form" class="<?= $Page->Form->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Form" class="pres_tradenames_new_Form"><?= $Page->renderSort($Page->Form) ?></div></th>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <th data-name="Strength" class="<?= $Page->Strength->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength" class="pres_tradenames_new_Strength"><?= $Page->renderSort($Page->Strength) ?></div></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Page->Unit->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit" class="pres_tradenames_new_Unit"><?= $Page->renderSort($Page->Unit) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <th data-name="TypeOfDrug" class="<?= $Page->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_tradenames_new_TypeOfDrug" class="pres_tradenames_new_TypeOfDrug"><?= $Page->renderSort($Page->TypeOfDrug) ?></div></th>
<?php } ?>
<?php if ($Page->ProductType->Visible) { // ProductType ?>
        <th data-name="ProductType" class="<?= $Page->ProductType->headerCellClass() ?>"><div id="elh_pres_tradenames_new_ProductType" class="pres_tradenames_new_ProductType"><?= $Page->renderSort($Page->ProductType) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
        <th data-name="Generic_Name1" class="<?= $Page->Generic_Name1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name1" class="pres_tradenames_new_Generic_Name1"><?= $Page->renderSort($Page->Generic_Name1) ?></div></th>
<?php } ?>
<?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <th data-name="Strength1" class="<?= $Page->Strength1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength1" class="pres_tradenames_new_Strength1"><?= $Page->renderSort($Page->Strength1) ?></div></th>
<?php } ?>
<?php if ($Page->Unit1->Visible) { // Unit1 ?>
        <th data-name="Unit1" class="<?= $Page->Unit1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit1" class="pres_tradenames_new_Unit1"><?= $Page->renderSort($Page->Unit1) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
        <th data-name="Generic_Name2" class="<?= $Page->Generic_Name2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name2" class="pres_tradenames_new_Generic_Name2"><?= $Page->renderSort($Page->Generic_Name2) ?></div></th>
<?php } ?>
<?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <th data-name="Strength2" class="<?= $Page->Strength2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength2" class="pres_tradenames_new_Strength2"><?= $Page->renderSort($Page->Strength2) ?></div></th>
<?php } ?>
<?php if ($Page->Unit2->Visible) { // Unit2 ?>
        <th data-name="Unit2" class="<?= $Page->Unit2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit2" class="pres_tradenames_new_Unit2"><?= $Page->renderSort($Page->Unit2) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
        <th data-name="Generic_Name3" class="<?= $Page->Generic_Name3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name3" class="pres_tradenames_new_Generic_Name3"><?= $Page->renderSort($Page->Generic_Name3) ?></div></th>
<?php } ?>
<?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <th data-name="Strength3" class="<?= $Page->Strength3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength3" class="pres_tradenames_new_Strength3"><?= $Page->renderSort($Page->Strength3) ?></div></th>
<?php } ?>
<?php if ($Page->Unit3->Visible) { // Unit3 ?>
        <th data-name="Unit3" class="<?= $Page->Unit3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit3" class="pres_tradenames_new_Unit3"><?= $Page->renderSort($Page->Unit3) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
        <th data-name="Generic_Name4" class="<?= $Page->Generic_Name4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name4" class="pres_tradenames_new_Generic_Name4"><?= $Page->renderSort($Page->Generic_Name4) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
        <th data-name="Generic_Name5" class="<?= $Page->Generic_Name5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Generic_Name5" class="pres_tradenames_new_Generic_Name5"><?= $Page->renderSort($Page->Generic_Name5) ?></div></th>
<?php } ?>
<?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <th data-name="Strength4" class="<?= $Page->Strength4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength4" class="pres_tradenames_new_Strength4"><?= $Page->renderSort($Page->Strength4) ?></div></th>
<?php } ?>
<?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <th data-name="Strength5" class="<?= $Page->Strength5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Strength5" class="pres_tradenames_new_Strength5"><?= $Page->renderSort($Page->Strength5) ?></div></th>
<?php } ?>
<?php if ($Page->Unit4->Visible) { // Unit4 ?>
        <th data-name="Unit4" class="<?= $Page->Unit4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit4" class="pres_tradenames_new_Unit4"><?= $Page->renderSort($Page->Unit4) ?></div></th>
<?php } ?>
<?php if ($Page->Unit5->Visible) { // Unit5 ?>
        <th data-name="Unit5" class="<?= $Page->Unit5->headerCellClass() ?>"><div id="elh_pres_tradenames_new_Unit5" class="pres_tradenames_new_Unit5"><?= $Page->renderSort($Page->Unit5) ?></div></th>
<?php } ?>
<?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
        <th data-name="AlterNative1" class="<?= $Page->AlterNative1->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative1" class="pres_tradenames_new_AlterNative1"><?= $Page->renderSort($Page->AlterNative1) ?></div></th>
<?php } ?>
<?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
        <th data-name="AlterNative2" class="<?= $Page->AlterNative2->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative2" class="pres_tradenames_new_AlterNative2"><?= $Page->renderSort($Page->AlterNative2) ?></div></th>
<?php } ?>
<?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
        <th data-name="AlterNative3" class="<?= $Page->AlterNative3->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative3" class="pres_tradenames_new_AlterNative3"><?= $Page->renderSort($Page->AlterNative3) ?></div></th>
<?php } ?>
<?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
        <th data-name="AlterNative4" class="<?= $Page->AlterNative4->headerCellClass() ?>"><div id="elh_pres_tradenames_new_AlterNative4" class="pres_tradenames_new_AlterNative4"><?= $Page->renderSort($Page->AlterNative4) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pres_tradenames_new", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->ID->Visible) { // ID ?>
        <td data-name="ID" <?= $Page->ID->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <td data-name="Drug_Name" <?= $Page->Drug_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <td data-name="Generic_Name" <?= $Page->Generic_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name">
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <td data-name="Trade_Name" <?= $Page->Trade_Name->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Trade_Name">
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td data-name="PR_CODE" <?= $Page->PR_CODE->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Form->Visible) { // Form ?>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength->Visible) { // Strength ?>
        <td data-name="Strength" <?= $Page->Strength->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td data-name="TypeOfDrug" <?= $Page->TypeOfDrug->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_TypeOfDrug">
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->ProductType->Visible) { // ProductType ?>
        <td data-name="ProductType" <?= $Page->ProductType->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_ProductType">
<span<?= $Page->ProductType->viewAttributes() ?>>
<?= $Page->ProductType->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name1->Visible) { // Generic_Name1 ?>
        <td data-name="Generic_Name1" <?= $Page->Generic_Name1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name1">
<span<?= $Page->Generic_Name1->viewAttributes() ?>>
<?= $Page->Generic_Name1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength1->Visible) { // Strength1 ?>
        <td data-name="Strength1" <?= $Page->Strength1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength1">
<span<?= $Page->Strength1->viewAttributes() ?>>
<?= $Page->Strength1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit1->Visible) { // Unit1 ?>
        <td data-name="Unit1" <?= $Page->Unit1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit1">
<span<?= $Page->Unit1->viewAttributes() ?>>
<?= $Page->Unit1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name2->Visible) { // Generic_Name2 ?>
        <td data-name="Generic_Name2" <?= $Page->Generic_Name2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name2">
<span<?= $Page->Generic_Name2->viewAttributes() ?>>
<?= $Page->Generic_Name2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength2->Visible) { // Strength2 ?>
        <td data-name="Strength2" <?= $Page->Strength2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength2">
<span<?= $Page->Strength2->viewAttributes() ?>>
<?= $Page->Strength2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit2->Visible) { // Unit2 ?>
        <td data-name="Unit2" <?= $Page->Unit2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit2">
<span<?= $Page->Unit2->viewAttributes() ?>>
<?= $Page->Unit2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name3->Visible) { // Generic_Name3 ?>
        <td data-name="Generic_Name3" <?= $Page->Generic_Name3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name3">
<span<?= $Page->Generic_Name3->viewAttributes() ?>>
<?= $Page->Generic_Name3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength3->Visible) { // Strength3 ?>
        <td data-name="Strength3" <?= $Page->Strength3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength3">
<span<?= $Page->Strength3->viewAttributes() ?>>
<?= $Page->Strength3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit3->Visible) { // Unit3 ?>
        <td data-name="Unit3" <?= $Page->Unit3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit3">
<span<?= $Page->Unit3->viewAttributes() ?>>
<?= $Page->Unit3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name4->Visible) { // Generic_Name4 ?>
        <td data-name="Generic_Name4" <?= $Page->Generic_Name4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name4">
<span<?= $Page->Generic_Name4->viewAttributes() ?>>
<?= $Page->Generic_Name4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name5->Visible) { // Generic_Name5 ?>
        <td data-name="Generic_Name5" <?= $Page->Generic_Name5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Generic_Name5">
<span<?= $Page->Generic_Name5->viewAttributes() ?>>
<?= $Page->Generic_Name5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength4->Visible) { // Strength4 ?>
        <td data-name="Strength4" <?= $Page->Strength4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength4">
<span<?= $Page->Strength4->viewAttributes() ?>>
<?= $Page->Strength4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Strength5->Visible) { // Strength5 ?>
        <td data-name="Strength5" <?= $Page->Strength5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Strength5">
<span<?= $Page->Strength5->viewAttributes() ?>>
<?= $Page->Strength5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit4->Visible) { // Unit4 ?>
        <td data-name="Unit4" <?= $Page->Unit4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit4">
<span<?= $Page->Unit4->viewAttributes() ?>>
<?= $Page->Unit4->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->Unit5->Visible) { // Unit5 ?>
        <td data-name="Unit5" <?= $Page->Unit5->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_Unit5">
<span<?= $Page->Unit5->viewAttributes() ?>>
<?= $Page->Unit5->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlterNative1->Visible) { // AlterNative1 ?>
        <td data-name="AlterNative1" <?= $Page->AlterNative1->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative1">
<span<?= $Page->AlterNative1->viewAttributes() ?>>
<?= $Page->AlterNative1->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlterNative2->Visible) { // AlterNative2 ?>
        <td data-name="AlterNative2" <?= $Page->AlterNative2->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative2">
<span<?= $Page->AlterNative2->viewAttributes() ?>>
<?= $Page->AlterNative2->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlterNative3->Visible) { // AlterNative3 ?>
        <td data-name="AlterNative3" <?= $Page->AlterNative3->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative3">
<span<?= $Page->AlterNative3->viewAttributes() ?>>
<?= $Page->AlterNative3->getViewValue() ?></span>
</span>
</td>
    <?php } ?>
    <?php if ($Page->AlterNative4->Visible) { // AlterNative4 ?>
        <td data-name="AlterNative4" <?= $Page->AlterNative4->cellAttributes() ?>>
<span id="el<?= $Page->RowCount ?>_pres_tradenames_new_AlterNative4">
<span<?= $Page->AlterNative4->viewAttributes() ?>>
<?= $Page->AlterNative4->getViewValue() ?></span>
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
    ew.addEventHandlers("pres_tradenames_new");
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
        container: "gmp_pres_tradenames_new",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

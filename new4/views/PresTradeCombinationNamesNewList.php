<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresTradeCombinationNamesNewList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpres_trade_combination_names_newlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpres_trade_combination_names_newlist = currentForm = new ew.Form("fpres_trade_combination_names_newlist", "list");
    fpres_trade_combination_names_newlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_trade_combination_names_new")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_trade_combination_names_new)
        ew.vars.tables.pres_trade_combination_names_new = currentTable;
    fpres_trade_combination_names_newlist.addFields([
        ["ID", [fields.ID.visible && fields.ID.required ? ew.Validators.required(fields.ID.caption) : null], fields.ID.isInvalid],
        ["tradenames_id", [fields.tradenames_id.visible && fields.tradenames_id.required ? ew.Validators.required(fields.tradenames_id.caption) : null, ew.Validators.integer], fields.tradenames_id.isInvalid],
        ["Drug_Name", [fields.Drug_Name.visible && fields.Drug_Name.required ? ew.Validators.required(fields.Drug_Name.caption) : null], fields.Drug_Name.isInvalid],
        ["Generic_Name", [fields.Generic_Name.visible && fields.Generic_Name.required ? ew.Validators.required(fields.Generic_Name.caption) : null], fields.Generic_Name.isInvalid],
        ["Trade_Name", [fields.Trade_Name.visible && fields.Trade_Name.required ? ew.Validators.required(fields.Trade_Name.caption) : null], fields.Trade_Name.isInvalid],
        ["PR_CODE", [fields.PR_CODE.visible && fields.PR_CODE.required ? ew.Validators.required(fields.PR_CODE.caption) : null], fields.PR_CODE.isInvalid],
        ["Form", [fields.Form.visible && fields.Form.required ? ew.Validators.required(fields.Form.caption) : null], fields.Form.isInvalid],
        ["Strength", [fields.Strength.visible && fields.Strength.required ? ew.Validators.required(fields.Strength.caption) : null], fields.Strength.isInvalid],
        ["Unit", [fields.Unit.visible && fields.Unit.required ? ew.Validators.required(fields.Unit.caption) : null], fields.Unit.isInvalid],
        ["CONTAINER_TYPE", [fields.CONTAINER_TYPE.visible && fields.CONTAINER_TYPE.required ? ew.Validators.required(fields.CONTAINER_TYPE.caption) : null], fields.CONTAINER_TYPE.isInvalid],
        ["CONTAINER_STRENGTH", [fields.CONTAINER_STRENGTH.visible && fields.CONTAINER_STRENGTH.required ? ew.Validators.required(fields.CONTAINER_STRENGTH.caption) : null], fields.CONTAINER_STRENGTH.isInvalid],
        ["TypeOfDrug", [fields.TypeOfDrug.visible && fields.TypeOfDrug.required ? ew.Validators.required(fields.TypeOfDrug.caption) : null], fields.TypeOfDrug.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_trade_combination_names_newlist,
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
    fpres_trade_combination_names_newlist.validate = function () {
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
    fpres_trade_combination_names_newlist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "tradenames_id", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Drug_Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Generic_Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Trade_Name", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PR_CODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Form", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Strength", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Unit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CONTAINER_TYPE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CONTAINER_STRENGTH", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "TypeOfDrug", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpres_trade_combination_names_newlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_trade_combination_names_newlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpres_trade_combination_names_newlist.lists.Generic_Name = <?= $Page->Generic_Name->toClientList($Page) ?>;
    fpres_trade_combination_names_newlist.lists.Form = <?= $Page->Form->toClientList($Page) ?>;
    fpres_trade_combination_names_newlist.lists.Unit = <?= $Page->Unit->toClientList($Page) ?>;
    fpres_trade_combination_names_newlist.lists.TypeOfDrug = <?= $Page->TypeOfDrug->toClientList($Page) ?>;
    loadjs.done("fpres_trade_combination_names_newlist");
});
var fpres_trade_combination_names_newlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpres_trade_combination_names_newlistsrch = currentSearchForm = new ew.Form("fpres_trade_combination_names_newlistsrch");

    // Dynamic selection lists

    // Filters
    fpres_trade_combination_names_newlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpres_trade_combination_names_newlistsrch");
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
<?php if (!$Page->isExport() || Config("EXPORT_MASTER_RECORD") && $Page->isExport("print")) { ?>
<?php
if ($Page->DbMasterFilter != "" && $Page->getCurrentMasterTable() == "pres_tradenames_new") {
    if ($Page->MasterRecordExists) {
        include_once "views/PresTradenamesNewMaster.php";
    }
}
?>
<?php } ?>
<?php
$Page->renderOtherOptions();
?>
<?php if ($Security->canSearch()) { ?>
<?php if (!$Page->isExport() && !$Page->CurrentAction) { ?>
<form name="fpres_trade_combination_names_newlistsrch" id="fpres_trade_combination_names_newlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpres_trade_combination_names_newlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pres_trade_combination_names_new">
    <div class="ew-extended-search">
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pres_trade_combination_names_new">
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
<form name="fpres_trade_combination_names_newlist" id="fpres_trade_combination_names_newlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_trade_combination_names_new">
<?php if ($Page->getCurrentMasterTable() == "pres_tradenames_new" && $Page->CurrentAction) { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="pres_tradenames_new">
<input type="hidden" name="fk_ID" value="<?= HtmlEncode($Page->tradenames_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_pres_trade_combination_names_new" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isAdd() || $Page->isCopy() || $Page->isGridEdit()) { ?>
<table id="tbl_pres_trade_combination_names_newlist" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="ID" class="<?= $Page->ID->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_ID" class="pres_trade_combination_names_new_ID"><?= $Page->renderSort($Page->ID) ?></div></th>
<?php } ?>
<?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <th data-name="tradenames_id" class="<?= $Page->tradenames_id->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_tradenames_id" class="pres_trade_combination_names_new_tradenames_id"><?= $Page->renderSort($Page->tradenames_id) ?></div></th>
<?php } ?>
<?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <th data-name="Drug_Name" class="<?= $Page->Drug_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Drug_Name" class="pres_trade_combination_names_new_Drug_Name"><?= $Page->renderSort($Page->Drug_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <th data-name="Generic_Name" class="<?= $Page->Generic_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Generic_Name" class="pres_trade_combination_names_new_Generic_Name"><?= $Page->renderSort($Page->Generic_Name) ?></div></th>
<?php } ?>
<?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <th data-name="Trade_Name" class="<?= $Page->Trade_Name->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Trade_Name" class="pres_trade_combination_names_new_Trade_Name"><?= $Page->renderSort($Page->Trade_Name) ?></div></th>
<?php } ?>
<?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <th data-name="PR_CODE" class="<?= $Page->PR_CODE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_PR_CODE" class="pres_trade_combination_names_new_PR_CODE"><?= $Page->renderSort($Page->PR_CODE) ?></div></th>
<?php } ?>
<?php if ($Page->Form->Visible) { // Form ?>
        <th data-name="Form" class="<?= $Page->Form->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Form" class="pres_trade_combination_names_new_Form"><?= $Page->renderSort($Page->Form) ?></div></th>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
        <th data-name="Strength" class="<?= $Page->Strength->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Strength" class="pres_trade_combination_names_new_Strength"><?= $Page->renderSort($Page->Strength) ?></div></th>
<?php } ?>
<?php if ($Page->Unit->Visible) { // Unit ?>
        <th data-name="Unit" class="<?= $Page->Unit->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_Unit" class="pres_trade_combination_names_new_Unit"><?= $Page->renderSort($Page->Unit) ?></div></th>
<?php } ?>
<?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <th data-name="CONTAINER_TYPE" class="<?= $Page->CONTAINER_TYPE->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_TYPE" class="pres_trade_combination_names_new_CONTAINER_TYPE"><?= $Page->renderSort($Page->CONTAINER_TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <th data-name="CONTAINER_STRENGTH" class="<?= $Page->CONTAINER_STRENGTH->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="pres_trade_combination_names_new_CONTAINER_STRENGTH"><?= $Page->renderSort($Page->CONTAINER_STRENGTH) ?></div></th>
<?php } ?>
<?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <th data-name="TypeOfDrug" class="<?= $Page->TypeOfDrug->headerCellClass() ?>"><div id="elh_pres_trade_combination_names_new_TypeOfDrug" class="pres_trade_combination_names_new_TypeOfDrug"><?= $Page->renderSort($Page->TypeOfDrug) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_pres_trade_combination_names_new", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->ID->Visible) { // ID ?>
        <td data-name="ID">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group pres_trade_combination_names_new_ID"></span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="o<?= $Page->RowIndex ?>_ID" id="o<?= $Page->RowIndex ?>_ID" value="<?= HtmlEncode($Page->ID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <td data-name="tradenames_id">
<?php if ($Page->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->tradenames_id->getDisplayValue($Page->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_tradenames_id" name="x<?= $Page->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Page->tradenames_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<input type="<?= $Page->tradenames_id->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?= $Page->RowIndex ?>_tradenames_id" id="x<?= $Page->RowIndex ?>_tradenames_id" size="30" placeholder="<?= HtmlEncode($Page->tradenames_id->getPlaceHolder()) ?>" value="<?= $Page->tradenames_id->EditValue ?>"<?= $Page->tradenames_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->tradenames_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_tradenames_id" id="o<?= $Page->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Page->tradenames_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <td data-name="Drug_Name">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group pres_trade_combination_names_new_Drug_Name">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?= $Page->RowIndex ?>_Drug_Name" id="x<?= $Page->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Drug_Name" id="o<?= $Page->RowIndex ?>_Drug_Name" value="<?= HtmlEncode($Page->Drug_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <td data-name="Generic_Name">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group pres_trade_combination_names_new_Generic_Name">
    <select
        id="x<?= $Page->RowIndex ?>_Generic_Name"
        name="x<?= $Page->RowIndex ?>_Generic_Name"
        class="form-control ew-select<?= $Page->Generic_Name->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name"
        data-table="pres_trade_combination_names_new"
        data-field="x_Generic_Name"
        data-value-separator="<?= $Page->Generic_Name->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Generic_Name->getPlaceHolder()) ?>"
        <?= $Page->Generic_Name->editAttributes() ?>>
        <?= $Page->Generic_Name->selectOptionListHtml("x{$Page->RowIndex}_Generic_Name") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage() ?></div>
<?= $Page->Generic_Name->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Generic_Name") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name']"),
        options = { name: "x<?= $Page->RowIndex ?>_Generic_Name", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Generic_Name.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Generic_Name" id="o<?= $Page->RowIndex ?>_Generic_Name" value="<?= HtmlEncode($Page->Generic_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <td data-name="Trade_Name">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group pres_trade_combination_names_new_Trade_Name">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?= $Page->RowIndex ?>_Trade_Name" id="x<?= $Page->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Trade_Name" id="o<?= $Page->RowIndex ?>_Trade_Name" value="<?= HtmlEncode($Page->Trade_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td data-name="PR_CODE">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group pres_trade_combination_names_new_PR_CODE">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?= $Page->RowIndex ?>_PR_CODE" id="x<?= $Page->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_PR_CODE" id="o<?= $Page->RowIndex ?>_PR_CODE" value="<?= HtmlEncode($Page->PR_CODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Form->Visible) { // Form ?>
        <td data-name="Form">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group pres_trade_combination_names_new_Form">
    <select
        id="x<?= $Page->RowIndex ?>_Form"
        name="x<?= $Page->RowIndex ?>_Form"
        class="form-control ew-select<?= $Page->Form->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form"
        data-table="pres_trade_combination_names_new"
        data-field="x_Form"
        data-value-separator="<?= $Page->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"
        <?= $Page->Form->editAttributes() ?>>
        <?= $Page->Form->selectOptionListHtml("x{$Page->RowIndex}_Form") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
<?= $Page->Form->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form']"),
        options = { name: "x<?= $Page->RowIndex ?>_Form", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" data-hidden="1" name="o<?= $Page->RowIndex ?>_Form" id="o<?= $Page->RowIndex ?>_Form" value="<?= HtmlEncode($Page->Form->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Strength->Visible) { // Strength ?>
        <td data-name="Strength">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group pres_trade_combination_names_new_Strength">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?= $Page->RowIndex ?>_Strength" id="x<?= $Page->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" data-hidden="1" name="o<?= $Page->RowIndex ?>_Strength" id="o<?= $Page->RowIndex ?>_Strength" value="<?= HtmlEncode($Page->Strength->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group pres_trade_combination_names_new_Unit">
    <select
        id="x<?= $Page->RowIndex ?>_Unit"
        name="x<?= $Page->RowIndex ?>_Unit"
        class="form-control ew-select<?= $Page->Unit->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit"
        data-table="pres_trade_combination_names_new"
        data-field="x_Unit"
        data-value-separator="<?= $Page->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>"
        <?= $Page->Unit->editAttributes() ?>>
        <?= $Page->Unit->selectOptionListHtml("x{$Page->RowIndex}_Unit") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
<?= $Page->Unit->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit']"),
        options = { name: "x<?= $Page->RowIndex ?>_Unit", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-hidden="1" name="o<?= $Page->RowIndex ?>_Unit" id="o<?= $Page->RowIndex ?>_Unit" value="<?= HtmlEncode($Page->Unit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td data-name="CONTAINER_TYPE">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group pres_trade_combination_names_new_CONTAINER_TYPE">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?= $Page->RowIndex ?>_CONTAINER_TYPE" id="x<?= $Page->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" data-hidden="1" name="o<?= $Page->RowIndex ?>_CONTAINER_TYPE" id="o<?= $Page->RowIndex ?>_CONTAINER_TYPE" value="<?= HtmlEncode($Page->CONTAINER_TYPE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td data-name="CONTAINER_STRENGTH">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group pres_trade_combination_names_new_CONTAINER_STRENGTH">
<input type="<?= $Page->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" id="x<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_STRENGTH->EditValue ?>"<?= $Page->CONTAINER_STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" data-hidden="1" name="o<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" id="o<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" value="<?= HtmlEncode($Page->CONTAINER_STRENGTH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td data-name="TypeOfDrug">
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group pres_trade_combination_names_new_TypeOfDrug">
    <select
        id="x<?= $Page->RowIndex ?>_TypeOfDrug"
        name="x<?= $Page->RowIndex ?>_TypeOfDrug"
        class="form-control ew-select<?= $Page->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug"
        data-table="pres_trade_combination_names_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Page->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Page->TypeOfDrug->editAttributes() ?>>
        <?= $Page->TypeOfDrug->selectOptionListHtml("x{$Page->RowIndex}_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug']"),
        options = { name: "x<?= $Page->RowIndex ?>_TypeOfDrug", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-hidden="1" name="o<?= $Page->RowIndex ?>_TypeOfDrug" id="o<?= $Page->RowIndex ?>_TypeOfDrug" value="<?= HtmlEncode($Page->TypeOfDrug->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowCount);
?>
<script>
loadjs.ready(["fpres_trade_combination_names_newlist","load"], function() {
    fpres_trade_combination_names_newlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pres_trade_combination_names_new", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->ID->Visible) { // ID ?>
        <td data-name="ID" <?= $Page->ID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group"></span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="o<?= $Page->RowIndex ?>_ID" id="o<?= $Page->RowIndex ?>_ID" value="<?= HtmlEncode($Page->ID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_ID" class="form-group">
<span<?= $Page->ID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ID->getDisplayValue($Page->ID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="x<?= $Page->RowIndex ?>_ID" id="x<?= $Page->RowIndex ?>_ID" value="<?= HtmlEncode($Page->ID->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_ID">
<span<?= $Page->ID->viewAttributes() ?>>
<?= $Page->ID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="x<?= $Page->RowIndex ?>_ID" id="x<?= $Page->RowIndex ?>_ID" value="<?= HtmlEncode($Page->ID->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <td data-name="tradenames_id" <?= $Page->tradenames_id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Page->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->tradenames_id->getDisplayValue($Page->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_tradenames_id" name="x<?= $Page->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Page->tradenames_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<input type="<?= $Page->tradenames_id->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?= $Page->RowIndex ?>_tradenames_id" id="x<?= $Page->RowIndex ?>_tradenames_id" size="30" placeholder="<?= HtmlEncode($Page->tradenames_id->getPlaceHolder()) ?>" value="<?= $Page->tradenames_id->EditValue ?>"<?= $Page->tradenames_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->tradenames_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_tradenames_id" id="o<?= $Page->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Page->tradenames_id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Page->tradenames_id->getSessionValue() != "") { ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->tradenames_id->getDisplayValue($Page->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_tradenames_id" name="x<?= $Page->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Page->tradenames_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id" class="form-group">
<input type="<?= $Page->tradenames_id->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?= $Page->RowIndex ?>_tradenames_id" id="x<?= $Page->RowIndex ?>_tradenames_id" size="30" placeholder="<?= HtmlEncode($Page->tradenames_id->getPlaceHolder()) ?>" value="<?= $Page->tradenames_id->EditValue ?>"<?= $Page->tradenames_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->tradenames_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_tradenames_id">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<?= $Page->tradenames_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <td data-name="Drug_Name" <?= $Page->Drug_Name->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?= $Page->RowIndex ?>_Drug_Name" id="x<?= $Page->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Drug_Name" id="o<?= $Page->RowIndex ?>_Drug_Name" value="<?= HtmlEncode($Page->Drug_Name->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Drug_Name" class="form-group">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?= $Page->RowIndex ?>_Drug_Name" id="x<?= $Page->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Drug_Name">
<span<?= $Page->Drug_Name->viewAttributes() ?>>
<?= $Page->Drug_Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <td data-name="Generic_Name" <?= $Page->Generic_Name->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Generic_Name"
        name="x<?= $Page->RowIndex ?>_Generic_Name"
        class="form-control ew-select<?= $Page->Generic_Name->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name"
        data-table="pres_trade_combination_names_new"
        data-field="x_Generic_Name"
        data-value-separator="<?= $Page->Generic_Name->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Generic_Name->getPlaceHolder()) ?>"
        <?= $Page->Generic_Name->editAttributes() ?>>
        <?= $Page->Generic_Name->selectOptionListHtml("x{$Page->RowIndex}_Generic_Name") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage() ?></div>
<?= $Page->Generic_Name->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Generic_Name") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name']"),
        options = { name: "x<?= $Page->RowIndex ?>_Generic_Name", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Generic_Name.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Generic_Name" id="o<?= $Page->RowIndex ?>_Generic_Name" value="<?= HtmlEncode($Page->Generic_Name->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Generic_Name" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Generic_Name"
        name="x<?= $Page->RowIndex ?>_Generic_Name"
        class="form-control ew-select<?= $Page->Generic_Name->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name"
        data-table="pres_trade_combination_names_new"
        data-field="x_Generic_Name"
        data-value-separator="<?= $Page->Generic_Name->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Generic_Name->getPlaceHolder()) ?>"
        <?= $Page->Generic_Name->editAttributes() ?>>
        <?= $Page->Generic_Name->selectOptionListHtml("x{$Page->RowIndex}_Generic_Name") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage() ?></div>
<?= $Page->Generic_Name->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Generic_Name") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name']"),
        options = { name: "x<?= $Page->RowIndex ?>_Generic_Name", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Generic_Name.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Generic_Name">
<span<?= $Page->Generic_Name->viewAttributes() ?>>
<?= $Page->Generic_Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <td data-name="Trade_Name" <?= $Page->Trade_Name->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?= $Page->RowIndex ?>_Trade_Name" id="x<?= $Page->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Trade_Name" id="o<?= $Page->RowIndex ?>_Trade_Name" value="<?= HtmlEncode($Page->Trade_Name->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Trade_Name" class="form-group">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?= $Page->RowIndex ?>_Trade_Name" id="x<?= $Page->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Trade_Name">
<span<?= $Page->Trade_Name->viewAttributes() ?>>
<?= $Page->Trade_Name->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td data-name="PR_CODE" <?= $Page->PR_CODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?= $Page->RowIndex ?>_PR_CODE" id="x<?= $Page->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_PR_CODE" id="o<?= $Page->RowIndex ?>_PR_CODE" value="<?= HtmlEncode($Page->PR_CODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_PR_CODE" class="form-group">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?= $Page->RowIndex ?>_PR_CODE" id="x<?= $Page->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_PR_CODE">
<span<?= $Page->PR_CODE->viewAttributes() ?>>
<?= $Page->PR_CODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Form->Visible) { // Form ?>
        <td data-name="Form" <?= $Page->Form->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Form"
        name="x<?= $Page->RowIndex ?>_Form"
        class="form-control ew-select<?= $Page->Form->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form"
        data-table="pres_trade_combination_names_new"
        data-field="x_Form"
        data-value-separator="<?= $Page->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"
        <?= $Page->Form->editAttributes() ?>>
        <?= $Page->Form->selectOptionListHtml("x{$Page->RowIndex}_Form") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
<?= $Page->Form->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form']"),
        options = { name: "x<?= $Page->RowIndex ?>_Form", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" data-hidden="1" name="o<?= $Page->RowIndex ?>_Form" id="o<?= $Page->RowIndex ?>_Form" value="<?= HtmlEncode($Page->Form->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Form" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Form"
        name="x<?= $Page->RowIndex ?>_Form"
        class="form-control ew-select<?= $Page->Form->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form"
        data-table="pres_trade_combination_names_new"
        data-field="x_Form"
        data-value-separator="<?= $Page->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"
        <?= $Page->Form->editAttributes() ?>>
        <?= $Page->Form->selectOptionListHtml("x{$Page->RowIndex}_Form") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
<?= $Page->Form->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form']"),
        options = { name: "x<?= $Page->RowIndex ?>_Form", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Form">
<span<?= $Page->Form->viewAttributes() ?>>
<?= $Page->Form->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Strength->Visible) { // Strength ?>
        <td data-name="Strength" <?= $Page->Strength->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?= $Page->RowIndex ?>_Strength" id="x<?= $Page->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" data-hidden="1" name="o<?= $Page->RowIndex ?>_Strength" id="o<?= $Page->RowIndex ?>_Strength" value="<?= HtmlEncode($Page->Strength->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Strength" class="form-group">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?= $Page->RowIndex ?>_Strength" id="x<?= $Page->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Strength">
<span<?= $Page->Strength->viewAttributes() ?>>
<?= $Page->Strength->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit" <?= $Page->Unit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Unit"
        name="x<?= $Page->RowIndex ?>_Unit"
        class="form-control ew-select<?= $Page->Unit->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit"
        data-table="pres_trade_combination_names_new"
        data-field="x_Unit"
        data-value-separator="<?= $Page->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>"
        <?= $Page->Unit->editAttributes() ?>>
        <?= $Page->Unit->selectOptionListHtml("x{$Page->RowIndex}_Unit") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
<?= $Page->Unit->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit']"),
        options = { name: "x<?= $Page->RowIndex ?>_Unit", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-hidden="1" name="o<?= $Page->RowIndex ?>_Unit" id="o<?= $Page->RowIndex ?>_Unit" value="<?= HtmlEncode($Page->Unit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Unit" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_Unit"
        name="x<?= $Page->RowIndex ?>_Unit"
        class="form-control ew-select<?= $Page->Unit->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit"
        data-table="pres_trade_combination_names_new"
        data-field="x_Unit"
        data-value-separator="<?= $Page->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>"
        <?= $Page->Unit->editAttributes() ?>>
        <?= $Page->Unit->selectOptionListHtml("x{$Page->RowIndex}_Unit") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
<?= $Page->Unit->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit']"),
        options = { name: "x<?= $Page->RowIndex ?>_Unit", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_Unit">
<span<?= $Page->Unit->viewAttributes() ?>>
<?= $Page->Unit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td data-name="CONTAINER_TYPE" <?= $Page->CONTAINER_TYPE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?= $Page->RowIndex ?>_CONTAINER_TYPE" id="x<?= $Page->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" data-hidden="1" name="o<?= $Page->RowIndex ?>_CONTAINER_TYPE" id="o<?= $Page->RowIndex ?>_CONTAINER_TYPE" value="<?= HtmlEncode($Page->CONTAINER_TYPE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?= $Page->RowIndex ?>_CONTAINER_TYPE" id="x<?= $Page->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_TYPE">
<span<?= $Page->CONTAINER_TYPE->viewAttributes() ?>>
<?= $Page->CONTAINER_TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td data-name="CONTAINER_STRENGTH" <?= $Page->CONTAINER_STRENGTH->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group">
<input type="<?= $Page->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" id="x<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_STRENGTH->EditValue ?>"<?= $Page->CONTAINER_STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" data-hidden="1" name="o<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" id="o<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" value="<?= HtmlEncode($Page->CONTAINER_STRENGTH->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group">
<input type="<?= $Page->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" id="x<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_STRENGTH->EditValue ?>"<?= $Page->CONTAINER_STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_CONTAINER_STRENGTH">
<span<?= $Page->CONTAINER_STRENGTH->viewAttributes() ?>>
<?= $Page->CONTAINER_STRENGTH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td data-name="TypeOfDrug" <?= $Page->TypeOfDrug->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_TypeOfDrug"
        name="x<?= $Page->RowIndex ?>_TypeOfDrug"
        class="form-control ew-select<?= $Page->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug"
        data-table="pres_trade_combination_names_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Page->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Page->TypeOfDrug->editAttributes() ?>>
        <?= $Page->TypeOfDrug->selectOptionListHtml("x{$Page->RowIndex}_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug']"),
        options = { name: "x<?= $Page->RowIndex ?>_TypeOfDrug", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-hidden="1" name="o<?= $Page->RowIndex ?>_TypeOfDrug" id="o<?= $Page->RowIndex ?>_TypeOfDrug" value="<?= HtmlEncode($Page->TypeOfDrug->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_TypeOfDrug"
        name="x<?= $Page->RowIndex ?>_TypeOfDrug"
        class="form-control ew-select<?= $Page->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug"
        data-table="pres_trade_combination_names_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Page->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Page->TypeOfDrug->editAttributes() ?>>
        <?= $Page->TypeOfDrug->selectOptionListHtml("x{$Page->RowIndex}_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug']"),
        options = { name: "x<?= $Page->RowIndex ?>_TypeOfDrug", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pres_trade_combination_names_new_TypeOfDrug">
<span<?= $Page->TypeOfDrug->viewAttributes() ?>>
<?= $Page->TypeOfDrug->getViewValue() ?></span>
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
loadjs.ready(["fpres_trade_combination_names_newlist","load"], function () {
    fpres_trade_combination_names_newlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_pres_trade_combination_names_new", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->ID->Visible) { // ID ?>
        <td data-name="ID">
<span id="el$rowindex$_pres_trade_combination_names_new_ID" class="form-group pres_trade_combination_names_new_ID"></span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_ID" data-hidden="1" name="o<?= $Page->RowIndex ?>_ID" id="o<?= $Page->RowIndex ?>_ID" value="<?= HtmlEncode($Page->ID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->tradenames_id->Visible) { // tradenames_id ?>
        <td data-name="tradenames_id">
<?php if ($Page->tradenames_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<span<?= $Page->tradenames_id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->tradenames_id->getDisplayValue($Page->tradenames_id->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Page->RowIndex ?>_tradenames_id" name="x<?= $Page->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Page->tradenames_id->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_pres_trade_combination_names_new_tradenames_id" class="form-group pres_trade_combination_names_new_tradenames_id">
<input type="<?= $Page->tradenames_id->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" name="x<?= $Page->RowIndex ?>_tradenames_id" id="x<?= $Page->RowIndex ?>_tradenames_id" size="30" placeholder="<?= HtmlEncode($Page->tradenames_id->getPlaceHolder()) ?>" value="<?= $Page->tradenames_id->EditValue ?>"<?= $Page->tradenames_id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->tradenames_id->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_tradenames_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_tradenames_id" id="o<?= $Page->RowIndex ?>_tradenames_id" value="<?= HtmlEncode($Page->tradenames_id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Drug_Name->Visible) { // Drug_Name ?>
        <td data-name="Drug_Name">
<span id="el$rowindex$_pres_trade_combination_names_new_Drug_Name" class="form-group pres_trade_combination_names_new_Drug_Name">
<input type="<?= $Page->Drug_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" name="x<?= $Page->RowIndex ?>_Drug_Name" id="x<?= $Page->RowIndex ?>_Drug_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Drug_Name->getPlaceHolder()) ?>" value="<?= $Page->Drug_Name->EditValue ?>"<?= $Page->Drug_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Drug_Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Drug_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Drug_Name" id="o<?= $Page->RowIndex ?>_Drug_Name" value="<?= HtmlEncode($Page->Drug_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Generic_Name->Visible) { // Generic_Name ?>
        <td data-name="Generic_Name">
<span id="el$rowindex$_pres_trade_combination_names_new_Generic_Name" class="form-group pres_trade_combination_names_new_Generic_Name">
    <select
        id="x<?= $Page->RowIndex ?>_Generic_Name"
        name="x<?= $Page->RowIndex ?>_Generic_Name"
        class="form-control ew-select<?= $Page->Generic_Name->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name"
        data-table="pres_trade_combination_names_new"
        data-field="x_Generic_Name"
        data-value-separator="<?= $Page->Generic_Name->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Generic_Name->getPlaceHolder()) ?>"
        <?= $Page->Generic_Name->editAttributes() ?>>
        <?= $Page->Generic_Name->selectOptionListHtml("x{$Page->RowIndex}_Generic_Name") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Generic_Name->getErrorMessage() ?></div>
<?= $Page->Generic_Name->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Generic_Name") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name']"),
        options = { name: "x<?= $Page->RowIndex ?>_Generic_Name", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Generic_Name", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Generic_Name.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Generic_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Generic_Name" id="o<?= $Page->RowIndex ?>_Generic_Name" value="<?= HtmlEncode($Page->Generic_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Trade_Name->Visible) { // Trade_Name ?>
        <td data-name="Trade_Name">
<span id="el$rowindex$_pres_trade_combination_names_new_Trade_Name" class="form-group pres_trade_combination_names_new_Trade_Name">
<input type="<?= $Page->Trade_Name->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" name="x<?= $Page->RowIndex ?>_Trade_Name" id="x<?= $Page->RowIndex ?>_Trade_Name" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Trade_Name->getPlaceHolder()) ?>" value="<?= $Page->Trade_Name->EditValue ?>"<?= $Page->Trade_Name->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Trade_Name->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Trade_Name" data-hidden="1" name="o<?= $Page->RowIndex ?>_Trade_Name" id="o<?= $Page->RowIndex ?>_Trade_Name" value="<?= HtmlEncode($Page->Trade_Name->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PR_CODE->Visible) { // PR_CODE ?>
        <td data-name="PR_CODE">
<span id="el$rowindex$_pres_trade_combination_names_new_PR_CODE" class="form-group pres_trade_combination_names_new_PR_CODE">
<input type="<?= $Page->PR_CODE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" name="x<?= $Page->RowIndex ?>_PR_CODE" id="x<?= $Page->RowIndex ?>_PR_CODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->PR_CODE->getPlaceHolder()) ?>" value="<?= $Page->PR_CODE->EditValue ?>"<?= $Page->PR_CODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PR_CODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_PR_CODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_PR_CODE" id="o<?= $Page->RowIndex ?>_PR_CODE" value="<?= HtmlEncode($Page->PR_CODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Form->Visible) { // Form ?>
        <td data-name="Form">
<span id="el$rowindex$_pres_trade_combination_names_new_Form" class="form-group pres_trade_combination_names_new_Form">
    <select
        id="x<?= $Page->RowIndex ?>_Form"
        name="x<?= $Page->RowIndex ?>_Form"
        class="form-control ew-select<?= $Page->Form->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form"
        data-table="pres_trade_combination_names_new"
        data-field="x_Form"
        data-value-separator="<?= $Page->Form->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Form->getPlaceHolder()) ?>"
        <?= $Page->Form->editAttributes() ?>>
        <?= $Page->Form->selectOptionListHtml("x{$Page->RowIndex}_Form") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Form->getErrorMessage() ?></div>
<?= $Page->Form->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Form") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form']"),
        options = { name: "x<?= $Page->RowIndex ?>_Form", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Form", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Form.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Form" data-hidden="1" name="o<?= $Page->RowIndex ?>_Form" id="o<?= $Page->RowIndex ?>_Form" value="<?= HtmlEncode($Page->Form->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Strength->Visible) { // Strength ?>
        <td data-name="Strength">
<span id="el$rowindex$_pres_trade_combination_names_new_Strength" class="form-group pres_trade_combination_names_new_Strength">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_Strength" name="x<?= $Page->RowIndex ?>_Strength" id="x<?= $Page->RowIndex ?>_Strength" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Strength" data-hidden="1" name="o<?= $Page->RowIndex ?>_Strength" id="o<?= $Page->RowIndex ?>_Strength" value="<?= HtmlEncode($Page->Strength->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Unit->Visible) { // Unit ?>
        <td data-name="Unit">
<span id="el$rowindex$_pres_trade_combination_names_new_Unit" class="form-group pres_trade_combination_names_new_Unit">
    <select
        id="x<?= $Page->RowIndex ?>_Unit"
        name="x<?= $Page->RowIndex ?>_Unit"
        class="form-control ew-select<?= $Page->Unit->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit"
        data-table="pres_trade_combination_names_new"
        data-field="x_Unit"
        data-value-separator="<?= $Page->Unit->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Unit->getPlaceHolder()) ?>"
        <?= $Page->Unit->editAttributes() ?>>
        <?= $Page->Unit->selectOptionListHtml("x{$Page->RowIndex}_Unit") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->Unit->getErrorMessage() ?></div>
<?= $Page->Unit->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_Unit") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit']"),
        options = { name: "x<?= $Page->RowIndex ?>_Unit", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_Unit", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.Unit.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_Unit" data-hidden="1" name="o<?= $Page->RowIndex ?>_Unit" id="o<?= $Page->RowIndex ?>_Unit" value="<?= HtmlEncode($Page->Unit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_TYPE->Visible) { // CONTAINER_TYPE ?>
        <td data-name="CONTAINER_TYPE">
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_TYPE" class="form-group pres_trade_combination_names_new_CONTAINER_TYPE">
<input type="<?= $Page->CONTAINER_TYPE->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" name="x<?= $Page->RowIndex ?>_CONTAINER_TYPE" id="x<?= $Page->RowIndex ?>_CONTAINER_TYPE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_TYPE->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_TYPE->EditValue ?>"<?= $Page->CONTAINER_TYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_TYPE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_TYPE" data-hidden="1" name="o<?= $Page->RowIndex ?>_CONTAINER_TYPE" id="o<?= $Page->RowIndex ?>_CONTAINER_TYPE" value="<?= HtmlEncode($Page->CONTAINER_TYPE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CONTAINER_STRENGTH->Visible) { // CONTAINER_STRENGTH ?>
        <td data-name="CONTAINER_STRENGTH">
<span id="el$rowindex$_pres_trade_combination_names_new_CONTAINER_STRENGTH" class="form-group pres_trade_combination_names_new_CONTAINER_STRENGTH">
<input type="<?= $Page->CONTAINER_STRENGTH->getInputTextType() ?>" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" name="x<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" id="x<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->CONTAINER_STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->CONTAINER_STRENGTH->EditValue ?>"<?= $Page->CONTAINER_STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CONTAINER_STRENGTH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_CONTAINER_STRENGTH" data-hidden="1" name="o<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" id="o<?= $Page->RowIndex ?>_CONTAINER_STRENGTH" value="<?= HtmlEncode($Page->CONTAINER_STRENGTH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TypeOfDrug->Visible) { // TypeOfDrug ?>
        <td data-name="TypeOfDrug">
<span id="el$rowindex$_pres_trade_combination_names_new_TypeOfDrug" class="form-group pres_trade_combination_names_new_TypeOfDrug">
    <select
        id="x<?= $Page->RowIndex ?>_TypeOfDrug"
        name="x<?= $Page->RowIndex ?>_TypeOfDrug"
        class="form-control ew-select<?= $Page->TypeOfDrug->isInvalidClass() ?>"
        data-select2-id="pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug"
        data-table="pres_trade_combination_names_new"
        data-field="x_TypeOfDrug"
        data-value-separator="<?= $Page->TypeOfDrug->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TypeOfDrug->getPlaceHolder()) ?>"
        <?= $Page->TypeOfDrug->editAttributes() ?>>
        <?= $Page->TypeOfDrug->selectOptionListHtml("x{$Page->RowIndex}_TypeOfDrug") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TypeOfDrug->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug']"),
        options = { name: "x<?= $Page->RowIndex ?>_TypeOfDrug", selectId: "pres_trade_combination_names_new_x<?= $Page->RowIndex ?>_TypeOfDrug", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pres_trade_combination_names_new.fields.TypeOfDrug.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pres_trade_combination_names_new" data-field="x_TypeOfDrug" data-hidden="1" name="o<?= $Page->RowIndex ?>_TypeOfDrug" id="o<?= $Page->RowIndex ?>_TypeOfDrug" value="<?= HtmlEncode($Page->TypeOfDrug->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fpres_trade_combination_names_newlist","load"], function() {
    fpres_trade_combination_names_newlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("pres_trade_combination_names_new");
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
        container: "gmp_pres_trade_combination_names_new",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

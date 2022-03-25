<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBatchmasList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_batchmaslist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_batchmaslist = currentForm = new ew.Form("fpharmacy_batchmaslist", "list");
    fpharmacy_batchmaslist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_batchmas")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_batchmas)
        ew.vars.tables.pharmacy_batchmas = currentTable;
    fpharmacy_batchmaslist.addFields([
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["PrName", [fields.PrName.visible && fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["PRCODE", [fields.PRCODE.visible && fields.PRCODE.required ? ew.Validators.required(fields.PRCODE.caption) : null], fields.PRCODE.isInvalid],
        ["OQ", [fields.OQ.visible && fields.OQ.required ? ew.Validators.required(fields.OQ.caption) : null, ew.Validators.float], fields.OQ.isInvalid],
        ["RQ", [fields.RQ.visible && fields.RQ.required ? ew.Validators.required(fields.RQ.caption) : null, ew.Validators.float], fields.RQ.isInvalid],
        ["FRQ", [fields.FRQ.visible && fields.FRQ.required ? ew.Validators.required(fields.FRQ.caption) : null, ew.Validators.float], fields.FRQ.isInvalid],
        ["IQ", [fields.IQ.visible && fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["MRQ", [fields.MRQ.visible && fields.MRQ.required ? ew.Validators.required(fields.MRQ.caption) : null, ew.Validators.float], fields.MRQ.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["UR", [fields.UR.visible && fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null], fields.SCGST.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["UM", [fields.UM.visible && fields.UM.required ? ew.Validators.required(fields.UM.caption) : null], fields.UM.isInvalid],
        ["GENNAME", [fields.GENNAME.visible && fields.GENNAME.required ? ew.Validators.required(fields.GENNAME.caption) : null], fields.GENNAME.isInvalid],
        ["BILLDATE", [fields.BILLDATE.visible && fields.BILLDATE.required ? ew.Validators.required(fields.BILLDATE.caption) : null, ew.Validators.datetime(0)], fields.BILLDATE.isInvalid],
        ["PUnit", [fields.PUnit.visible && fields.PUnit.required ? ew.Validators.required(fields.PUnit.caption) : null, ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [fields.SUnit.visible && fields.SUnit.required ? ew.Validators.required(fields.SUnit.caption) : null, ew.Validators.integer], fields.SUnit.isInvalid],
        ["PurValue", [fields.PurValue.visible && fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["PurRate", [fields.PurRate.visible && fields.PurRate.required ? ew.Validators.required(fields.PurRate.caption) : null, ew.Validators.float], fields.PurRate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_batchmaslist,
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
    fpharmacy_batchmaslist.validate = function () {
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
    fpharmacy_batchmaslist.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PRC", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PrName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BATCHNO", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MFRCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "EXPDT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PRCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "OQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FRQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "IQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MRQ", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MRP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UR", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SSGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SCGST", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BRCODE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HospID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "UM", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GENNAME", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BILLDATE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SUnit", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PurValue", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PurRate", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpharmacy_batchmaslist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_batchmaslist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_batchmaslist.lists.PrName = <?= $Page->PrName->toClientList($Page) ?>;
    fpharmacy_batchmaslist.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    loadjs.done("fpharmacy_batchmaslist");
});
var fpharmacy_batchmaslistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_batchmaslistsrch = currentSearchForm = new ew.Form("fpharmacy_batchmaslistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_batchmas")) ?>,
        fields = currentTable.fields;
    fpharmacy_batchmaslistsrch.addFields([
        ["PRC", [], fields.PRC.isInvalid],
        ["PrName", [], fields.PrName.isInvalid],
        ["BATCHNO", [], fields.BATCHNO.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["EXPDT", [ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["y_EXPDT", [ew.Validators.between], false],
        ["PRCODE", [], fields.PRCODE.isInvalid],
        ["OQ", [], fields.OQ.isInvalid],
        ["RQ", [], fields.RQ.isInvalid],
        ["FRQ", [], fields.FRQ.isInvalid],
        ["IQ", [], fields.IQ.isInvalid],
        ["MRQ", [], fields.MRQ.isInvalid],
        ["MRP", [], fields.MRP.isInvalid],
        ["UR", [], fields.UR.isInvalid],
        ["SSGST", [], fields.SSGST.isInvalid],
        ["SCGST", [], fields.SCGST.isInvalid],
        ["RT", [], fields.RT.isInvalid],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["UM", [], fields.UM.isInvalid],
        ["GENNAME", [], fields.GENNAME.isInvalid],
        ["BILLDATE", [], fields.BILLDATE.isInvalid],
        ["PUnit", [], fields.PUnit.isInvalid],
        ["SUnit", [], fields.SUnit.isInvalid],
        ["PurValue", [], fields.PurValue.isInvalid],
        ["PurRate", [], fields.PurRate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpharmacy_batchmaslistsrch.setInvalid();
    });

    // Validate form
    fpharmacy_batchmaslistsrch.validate = function () {
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
    fpharmacy_batchmaslistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_batchmaslistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_batchmaslistsrch.lists.PrName = <?= $Page->PrName->toClientList($Page) ?>;

    // Filters
    fpharmacy_batchmaslistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_batchmaslistsrch");
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
<form name="fpharmacy_batchmaslistsrch" id="fpharmacy_batchmaslistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_batchmaslistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_batchmas">
    <div class="ew-extended-search">
<?php
// Render search row
$Page->RowType = ROWTYPE_SEARCH;
$Page->resetAttributes();
$Page->renderRow();
?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PRC" class="ew-cell form-group">
        <label for="x_PRC" class="ew-search-caption ew-label"><?= $Page->PRC->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
        <span id="el_pharmacy_batchmas_PRC" class="ew-search-field">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_PrName" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->PrName->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
        <span id="el_pharmacy_batchmas_PrName" class="ew-search-field">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x_PrName" class="ew-auto-suggest">
    <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x_PrName" id="sv_x_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_batchmas" data-field="x_PrName" data-input="sv_x_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x_PrName" id="x_PrName" value="<?= HtmlEncode($Page->PrName->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpharmacy_batchmaslistsrch"], function() {
    fpharmacy_batchmaslistsrch.createAutoSuggest(Object.assign({"id":"x_PrName","forceSelect":true}, ew.vars.tables.pharmacy_batchmas.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x_PrName") ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_BATCHNO" class="ew-cell form-group">
        <label for="x_BATCHNO" class="ew-search-caption ew-label"><?= $Page->BATCHNO->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
        <span id="el_pharmacy_batchmas_BATCHNO" class="ew-search-field">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_MFRCODE" class="ew-cell form-group">
        <label for="x_MFRCODE" class="ew-search-caption ew-label"><?= $Page->MFRCODE->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
        <span id="el_pharmacy_batchmas_MFRCODE" class="ew-search-field">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage(false) ?></div>
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
        <span id="el_pharmacy_batchmas_EXPDT" class="ew-search-field">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage(false) ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmaslistsrch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        <span class="ew-search-and d-none"><label><?= $Language->phrase("AND") ?></label></span>
        <span id="el2_pharmacy_batchmas_EXPDT" class="ew-search-field2 d-none">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="y_EXPDT" id="y_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue2 ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage(false) ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslistsrch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmaslistsrch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_batchmas">
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
<form name="fpharmacy_batchmaslist" id="fpharmacy_batchmaslist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<div id="gmp_pharmacy_batchmas" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_batchmaslist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PRC" class="pharmacy_batchmas_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
        <th data-name="PrName" class="<?= $Page->PrName->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PrName" class="pharmacy_batchmas_PrName"><?= $Page->renderSort($Page->PrName) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BATCHNO" class="pharmacy_batchmas_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MFRCODE" class="pharmacy_batchmas_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_EXPDT" class="pharmacy_batchmas_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <th data-name="PRCODE" class="<?= $Page->PRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PRCODE" class="pharmacy_batchmas_PRCODE"><?= $Page->renderSort($Page->PRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
        <th data-name="OQ" class="<?= $Page->OQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_OQ" class="pharmacy_batchmas_OQ"><?= $Page->renderSort($Page->OQ) ?></div></th>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
        <th data-name="RQ" class="<?= $Page->RQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_RQ" class="pharmacy_batchmas_RQ"><?= $Page->renderSort($Page->RQ) ?></div></th>
<?php } ?>
<?php if ($Page->FRQ->Visible) { // FRQ ?>
        <th data-name="FRQ" class="<?= $Page->FRQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_FRQ" class="pharmacy_batchmas_FRQ"><?= $Page->renderSort($Page->FRQ) ?></div></th>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
        <th data-name="IQ" class="<?= $Page->IQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_IQ" class="pharmacy_batchmas_IQ"><?= $Page->renderSort($Page->IQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
        <th data-name="MRQ" class="<?= $Page->MRQ->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MRQ" class="pharmacy_batchmas_MRQ"><?= $Page->renderSort($Page->MRQ) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_MRP" class="pharmacy_batchmas_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
        <th data-name="UR" class="<?= $Page->UR->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_UR" class="pharmacy_batchmas_UR"><?= $Page->renderSort($Page->UR) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_SSGST" class="pharmacy_batchmas_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_SCGST" class="pharmacy_batchmas_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_RT" class="pharmacy_batchmas_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BRCODE" class="pharmacy_batchmas_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_HospID" class="pharmacy_batchmas_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <th data-name="UM" class="<?= $Page->UM->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_UM" class="pharmacy_batchmas_UM"><?= $Page->renderSort($Page->UM) ?></div></th>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th data-name="GENNAME" class="<?= $Page->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_GENNAME" class="pharmacy_batchmas_GENNAME"><?= $Page->renderSort($Page->GENNAME) ?></div></th>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <th data-name="BILLDATE" class="<?= $Page->BILLDATE->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_BILLDATE" class="pharmacy_batchmas_BILLDATE"><?= $Page->renderSort($Page->BILLDATE) ?></div></th>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
        <th data-name="PUnit" class="<?= $Page->PUnit->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PUnit" class="pharmacy_batchmas_PUnit"><?= $Page->renderSort($Page->PUnit) ?></div></th>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
        <th data-name="SUnit" class="<?= $Page->SUnit->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_SUnit" class="pharmacy_batchmas_SUnit"><?= $Page->renderSort($Page->SUnit) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Page->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PurValue" class="pharmacy_batchmas_PurValue"><?= $Page->renderSort($Page->PurValue) ?></div></th>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
        <th data-name="PurRate" class="<?= $Page->PurRate->headerCellClass() ?>"><div id="elh_pharmacy_batchmas_PurRate" class="pharmacy_batchmas_PurRate"><?= $Page->renderSort($Page->PurRate) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_batchmas", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName" <?= $Page->PrName->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PrName" class="form-group">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PrName" id="sv_x<?= $Page->RowIndex ?>_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_batchmas" data-field="x_PrName" data-input="sv_x<?= $Page->RowIndex ?>_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_batchmaslist"], function() {
    fpharmacy_batchmaslist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_batchmas.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PrName" class="form-group">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PrName" id="sv_x<?= $Page->RowIndex ?>_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_batchmas" data-field="x_PrName" data-input="sv_x<?= $Page->RowIndex ?>_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_batchmaslist"], function() {
    fpharmacy_batchmaslist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_batchmas.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PrName") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PrName">
<span<?= $Page->PrName->viewAttributes() ?>>
<?= $Page->PrName->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BATCHNO" class="form-group">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCHNO" id="o<?= $Page->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Page->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BATCHNO" class="form-group">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MFRCODE" class="form-group">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_MFRCODE" id="o<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MFRCODE" class="form-group">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td data-name="PRCODE" <?= $Page->PRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PRCODE" class="form-group">
<input type="<?= $Page->PRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?= $Page->RowIndex ?>_PRCODE" id="x<?= $Page->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRCODE->getPlaceHolder()) ?>" value="<?= $Page->PRCODE->EditValue ?>"<?= $Page->PRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRCODE" id="o<?= $Page->RowIndex ?>_PRCODE" value="<?= HtmlEncode($Page->PRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PRCODE" class="form-group">
<input type="<?= $Page->PRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?= $Page->RowIndex ?>_PRCODE" id="x<?= $Page->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRCODE->getPlaceHolder()) ?>" value="<?= $Page->PRCODE->EditValue ?>"<?= $Page->PRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRCODE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PRCODE">
<span<?= $Page->PRCODE->viewAttributes() ?>>
<?= $Page->PRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->OQ->Visible) { // OQ ?>
        <td data-name="OQ" <?= $Page->OQ->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_OQ" class="form-group">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?= $Page->RowIndex ?>_OQ" id="x<?= $Page->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_OQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_OQ" id="o<?= $Page->RowIndex ?>_OQ" value="<?= HtmlEncode($Page->OQ->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_OQ" class="form-group">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?= $Page->RowIndex ?>_OQ" id="x<?= $Page->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_OQ">
<span<?= $Page->OQ->viewAttributes() ?>>
<?= $Page->OQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RQ->Visible) { // RQ ?>
        <td data-name="RQ" <?= $Page->RQ->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_RQ" class="form-group">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?= $Page->RowIndex ?>_RQ" id="x<?= $Page->RowIndex ?>_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_RQ" id="o<?= $Page->RowIndex ?>_RQ" value="<?= HtmlEncode($Page->RQ->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_RQ" class="form-group">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?= $Page->RowIndex ?>_RQ" id="x<?= $Page->RowIndex ?>_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_RQ">
<span<?= $Page->RQ->viewAttributes() ?>>
<?= $Page->RQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->FRQ->Visible) { // FRQ ?>
        <td data-name="FRQ" <?= $Page->FRQ->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_FRQ" class="form-group">
<input type="<?= $Page->FRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?= $Page->RowIndex ?>_FRQ" id="x<?= $Page->RowIndex ?>_FRQ" size="30" placeholder="<?= HtmlEncode($Page->FRQ->getPlaceHolder()) ?>" value="<?= $Page->FRQ->EditValue ?>"<?= $Page->FRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FRQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_FRQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_FRQ" id="o<?= $Page->RowIndex ?>_FRQ" value="<?= HtmlEncode($Page->FRQ->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_FRQ" class="form-group">
<input type="<?= $Page->FRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?= $Page->RowIndex ?>_FRQ" id="x<?= $Page->RowIndex ?>_FRQ" size="30" placeholder="<?= HtmlEncode($Page->FRQ->getPlaceHolder()) ?>" value="<?= $Page->FRQ->EditValue ?>"<?= $Page->FRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FRQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_FRQ">
<span<?= $Page->FRQ->viewAttributes() ?>>
<?= $Page->FRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ" <?= $Page->IQ->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_IQ" class="form-group">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_IQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_IQ" id="o<?= $Page->RowIndex ?>_IQ" value="<?= HtmlEncode($Page->IQ->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_IQ" class="form-group">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_IQ">
<span<?= $Page->IQ->viewAttributes() ?>>
<?= $Page->IQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ" <?= $Page->MRQ->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MRQ" class="form-group">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?= $Page->RowIndex ?>_MRQ" id="x<?= $Page->RowIndex ?>_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRQ" id="o<?= $Page->RowIndex ?>_MRQ" value="<?= HtmlEncode($Page->MRQ->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MRQ" class="form-group">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?= $Page->RowIndex ?>_MRQ" id="x<?= $Page->RowIndex ?>_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MRQ">
<span<?= $Page->MRQ->viewAttributes() ?>>
<?= $Page->MRQ->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MRP" class="form-group">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRP" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRP" id="o<?= $Page->RowIndex ?>_MRP" value="<?= HtmlEncode($Page->MRP->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MRP" class="form-group">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR" <?= $Page->UR->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_UR" class="form-group">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UR" data-hidden="1" name="o<?= $Page->RowIndex ?>_UR" id="o<?= $Page->RowIndex ?>_UR" value="<?= HtmlEncode($Page->UR->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_UR" class="form-group">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_UR">
<span<?= $Page->UR->viewAttributes() ?>>
<?= $Page->UR->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SSGST" class="form-group">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SSGST" id="o<?= $Page->RowIndex ?>_SSGST" value="<?= HtmlEncode($Page->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SSGST" class="form-group">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SCGST" class="form-group">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SCGST" id="o<?= $Page->RowIndex ?>_SCGST" value="<?= HtmlEncode($Page->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SCGST" class="form-group">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_RT" class="form-group">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RT" data-hidden="1" name="o<?= $Page->RowIndex ?>_RT" id="o<?= $Page->RowIndex ?>_RT" value="<?= HtmlEncode($Page->RT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_RT" class="form-group">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BRCODE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_BRCODE"
        name="x<?= $Page->RowIndex ?>_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE"
        data-table="pharmacy_batchmas"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x{$Page->RowIndex}_BRCODE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE']"),
        options = { name: "x<?= $Page->RowIndex ?>_BRCODE", selectId: "pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_batchmas.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BRCODE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_BRCODE"
        name="x<?= $Page->RowIndex ?>_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE"
        data-table="pharmacy_batchmas"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x{$Page->RowIndex}_BRCODE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE']"),
        options = { name: "x<?= $Page->RowIndex ?>_BRCODE", selectId: "pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_batchmas.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_HospID" class="form-group">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UM->Visible) { // UM ?>
        <td data-name="UM" <?= $Page->UM->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_UM" class="form-group">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?= $Page->RowIndex ?>_UM" id="x<?= $Page->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UM" data-hidden="1" name="o<?= $Page->RowIndex ?>_UM" id="o<?= $Page->RowIndex ?>_UM" value="<?= HtmlEncode($Page->UM->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_UM" class="form-group">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?= $Page->RowIndex ?>_UM" id="x<?= $Page->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td data-name="GENNAME" <?= $Page->GENNAME->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_GENNAME" class="form-group">
<input type="<?= $Page->GENNAME->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?= $Page->RowIndex ?>_GENNAME" id="x<?= $Page->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" value="<?= $Page->GENNAME->EditValue ?>"<?= $Page->GENNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_GENNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_GENNAME" id="o<?= $Page->RowIndex ?>_GENNAME" value="<?= HtmlEncode($Page->GENNAME->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_GENNAME" class="form-group">
<input type="<?= $Page->GENNAME->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?= $Page->RowIndex ?>_GENNAME" id="x<?= $Page->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" value="<?= $Page->GENNAME->EditValue ?>"<?= $Page->GENNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <td data-name="BILLDATE" <?= $Page->BILLDATE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BILLDATE" class="form-group">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?= $Page->RowIndex ?>_BILLDATE" id="x<?= $Page->RowIndex ?>_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage() ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?= $Page->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BILLDATE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BILLDATE" id="o<?= $Page->RowIndex ?>_BILLDATE" value="<?= HtmlEncode($Page->BILLDATE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BILLDATE" class="form-group">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?= $Page->RowIndex ?>_BILLDATE" id="x<?= $Page->RowIndex ?>_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage() ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?= $Page->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_BILLDATE">
<span<?= $Page->BILLDATE->viewAttributes() ?>>
<?= $Page->BILLDATE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit" <?= $Page->PUnit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PUnit" class="form-group">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x<?= $Page->RowIndex ?>_PUnit" id="x<?= $Page->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_PUnit" id="o<?= $Page->RowIndex ?>_PUnit" value="<?= HtmlEncode($Page->PUnit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PUnit" class="form-group">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x<?= $Page->RowIndex ?>_PUnit" id="x<?= $Page->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PUnit">
<span<?= $Page->PUnit->viewAttributes() ?>>
<?= $Page->PUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit" <?= $Page->SUnit->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SUnit" class="form-group">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x<?= $Page->RowIndex ?>_SUnit" id="x<?= $Page->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_SUnit" id="o<?= $Page->RowIndex ?>_SUnit" value="<?= HtmlEncode($Page->SUnit->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SUnit" class="form-group">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x<?= $Page->RowIndex ?>_SUnit" id="x<?= $Page->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_SUnit">
<span<?= $Page->SUnit->viewAttributes() ?>>
<?= $Page->SUnit->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PurValue" class="form-group">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PurValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurValue" id="o<?= $Page->RowIndex ?>_PurValue" value="<?= HtmlEncode($Page->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PurValue" class="form-group">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate" <?= $Page->PurRate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PurRate" class="form-group">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x<?= $Page->RowIndex ?>_PurRate" id="x<?= $Page->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PurRate" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurRate" id="o<?= $Page->RowIndex ?>_PurRate" value="<?= HtmlEncode($Page->PurRate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PurRate" class="form-group">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x<?= $Page->RowIndex ?>_PurRate" id="x<?= $Page->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_batchmas_PurRate">
<span<?= $Page->PurRate->viewAttributes() ?>>
<?= $Page->PurRate->getViewValue() ?></span>
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
loadjs.ready(["fpharmacy_batchmaslist","load"], function () {
    fpharmacy_batchmaslist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_pharmacy_batchmas", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_pharmacy_batchmas_PRC" class="form-group pharmacy_batchmas_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PrName->Visible) { // PrName ?>
        <td data-name="PrName">
<span id="el$rowindex$_pharmacy_batchmas_PrName" class="form-group pharmacy_batchmas_PrName">
<?php
$onchange = $Page->PrName->EditAttrs->prepend("onchange", "ew.autoFill(this);");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->PrName->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_PrName" class="ew-auto-suggest">
    <input type="<?= $Page->PrName->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_PrName" id="sv_x<?= $Page->RowIndex ?>_PrName" value="<?= RemoveHtml($Page->PrName->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>"<?= $Page->PrName->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_batchmas" data-field="x_PrName" data-input="sv_x<?= $Page->RowIndex ?>_PrName" data-value-separator="<?= $Page->PrName->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_PrName" id="x<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_batchmaslist"], function() {
    fpharmacy_batchmaslist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_PrName","forceSelect":true}, ew.vars.tables.pharmacy_batchmas.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_PrName") ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PrName" data-hidden="1" name="o<?= $Page->RowIndex ?>_PrName" id="o<?= $Page->RowIndex ?>_PrName" value="<?= HtmlEncode($Page->PrName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO">
<span id="el$rowindex$_pharmacy_batchmas_BATCHNO" class="form-group pharmacy_batchmas_BATCHNO">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCHNO" id="o<?= $Page->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Page->BATCHNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE">
<span id="el$rowindex$_pharmacy_batchmas_MFRCODE" class="form-group pharmacy_batchmas_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_MFRCODE" id="o<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT">
<span id="el$rowindex$_pharmacy_batchmas_EXPDT" class="form-group pharmacy_batchmas_EXPDT">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" size="12" maxlength="12" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRCODE->Visible) { // PRCODE ?>
        <td data-name="PRCODE">
<span id="el$rowindex$_pharmacy_batchmas_PRCODE" class="form-group pharmacy_batchmas_PRCODE">
<input type="<?= $Page->PRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x<?= $Page->RowIndex ?>_PRCODE" id="x<?= $Page->RowIndex ?>_PRCODE" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRCODE->getPlaceHolder()) ?>" value="<?= $Page->PRCODE->EditValue ?>"<?= $Page->PRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRCODE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRCODE" id="o<?= $Page->RowIndex ?>_PRCODE" value="<?= HtmlEncode($Page->PRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->OQ->Visible) { // OQ ?>
        <td data-name="OQ">
<span id="el$rowindex$_pharmacy_batchmas_OQ" class="form-group pharmacy_batchmas_OQ">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_OQ" name="x<?= $Page->RowIndex ?>_OQ" id="x<?= $Page->RowIndex ?>_OQ" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_OQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_OQ" id="o<?= $Page->RowIndex ?>_OQ" value="<?= HtmlEncode($Page->OQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RQ->Visible) { // RQ ?>
        <td data-name="RQ">
<span id="el$rowindex$_pharmacy_batchmas_RQ" class="form-group pharmacy_batchmas_RQ">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_RQ" name="x<?= $Page->RowIndex ?>_RQ" id="x<?= $Page->RowIndex ?>_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_RQ" id="o<?= $Page->RowIndex ?>_RQ" value="<?= HtmlEncode($Page->RQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->FRQ->Visible) { // FRQ ?>
        <td data-name="FRQ">
<span id="el$rowindex$_pharmacy_batchmas_FRQ" class="form-group pharmacy_batchmas_FRQ">
<input type="<?= $Page->FRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x<?= $Page->RowIndex ?>_FRQ" id="x<?= $Page->RowIndex ?>_FRQ" size="30" placeholder="<?= HtmlEncode($Page->FRQ->getPlaceHolder()) ?>" value="<?= $Page->FRQ->EditValue ?>"<?= $Page->FRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FRQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_FRQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_FRQ" id="o<?= $Page->RowIndex ?>_FRQ" value="<?= HtmlEncode($Page->FRQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->IQ->Visible) { // IQ ?>
        <td data-name="IQ">
<span id="el$rowindex$_pharmacy_batchmas_IQ" class="form-group pharmacy_batchmas_IQ">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_IQ" name="x<?= $Page->RowIndex ?>_IQ" id="x<?= $Page->RowIndex ?>_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_IQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_IQ" id="o<?= $Page->RowIndex ?>_IQ" value="<?= HtmlEncode($Page->IQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MRQ->Visible) { // MRQ ?>
        <td data-name="MRQ">
<span id="el$rowindex$_pharmacy_batchmas_MRQ" class="form-group pharmacy_batchmas_MRQ">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x<?= $Page->RowIndex ?>_MRQ" id="x<?= $Page->RowIndex ?>_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRQ" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRQ" id="o<?= $Page->RowIndex ?>_MRQ" value="<?= HtmlEncode($Page->MRQ->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP">
<span id="el$rowindex$_pharmacy_batchmas_MRP" class="form-group pharmacy_batchmas_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_MRP" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRP" id="o<?= $Page->RowIndex ?>_MRP" value="<?= HtmlEncode($Page->MRP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UR->Visible) { // UR ?>
        <td data-name="UR">
<span id="el$rowindex$_pharmacy_batchmas_UR" class="form-group pharmacy_batchmas_UR">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_UR" name="x<?= $Page->RowIndex ?>_UR" id="x<?= $Page->RowIndex ?>_UR" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UR" data-hidden="1" name="o<?= $Page->RowIndex ?>_UR" id="o<?= $Page->RowIndex ?>_UR" value="<?= HtmlEncode($Page->UR->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST">
<span id="el$rowindex$_pharmacy_batchmas_SSGST" class="form-group pharmacy_batchmas_SSGST">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SSGST" id="o<?= $Page->RowIndex ?>_SSGST" value="<?= HtmlEncode($Page->SSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST">
<span id="el$rowindex$_pharmacy_batchmas_SCGST" class="form-group pharmacy_batchmas_SCGST">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SCGST" id="o<?= $Page->RowIndex ?>_SCGST" value="<?= HtmlEncode($Page->SCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT">
<span id="el$rowindex$_pharmacy_batchmas_RT" class="form-group pharmacy_batchmas_RT">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_RT" data-hidden="1" name="o<?= $Page->RowIndex ?>_RT" id="o<?= $Page->RowIndex ?>_RT" value="<?= HtmlEncode($Page->RT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<span id="el$rowindex$_pharmacy_batchmas_BRCODE" class="form-group pharmacy_batchmas_BRCODE">
    <select
        id="x<?= $Page->RowIndex ?>_BRCODE"
        name="x<?= $Page->RowIndex ?>_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE"
        data-table="pharmacy_batchmas"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x{$Page->RowIndex}_BRCODE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE']"),
        options = { name: "x<?= $Page->RowIndex ?>_BRCODE", selectId: "pharmacy_batchmas_x<?= $Page->RowIndex ?>_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_batchmas.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<span id="el$rowindex$_pharmacy_batchmas_HospID" class="form-group pharmacy_batchmas_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_HospID" name="x<?= $Page->RowIndex ?>_HospID" id="x<?= $Page->RowIndex ?>_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UM->Visible) { // UM ?>
        <td data-name="UM">
<span id="el$rowindex$_pharmacy_batchmas_UM" class="form-group pharmacy_batchmas_UM">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_UM" name="x<?= $Page->RowIndex ?>_UM" id="x<?= $Page->RowIndex ?>_UM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_UM" data-hidden="1" name="o<?= $Page->RowIndex ?>_UM" id="o<?= $Page->RowIndex ?>_UM" value="<?= HtmlEncode($Page->UM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td data-name="GENNAME">
<span id="el$rowindex$_pharmacy_batchmas_GENNAME" class="form-group pharmacy_batchmas_GENNAME">
<input type="<?= $Page->GENNAME->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x<?= $Page->RowIndex ?>_GENNAME" id="x<?= $Page->RowIndex ?>_GENNAME" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" value="<?= $Page->GENNAME->EditValue ?>"<?= $Page->GENNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_GENNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_GENNAME" id="o<?= $Page->RowIndex ?>_GENNAME" value="<?= HtmlEncode($Page->GENNAME->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
        <td data-name="BILLDATE">
<span id="el$rowindex$_pharmacy_batchmas_BILLDATE" class="form-group pharmacy_batchmas_BILLDATE">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x<?= $Page->RowIndex ?>_BILLDATE" id="x<?= $Page->RowIndex ?>_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage() ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmaslist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmaslist", "x<?= $Page->RowIndex ?>_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_BILLDATE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BILLDATE" id="o<?= $Page->RowIndex ?>_BILLDATE" value="<?= HtmlEncode($Page->BILLDATE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PUnit->Visible) { // PUnit ?>
        <td data-name="PUnit">
<span id="el$rowindex$_pharmacy_batchmas_PUnit" class="form-group pharmacy_batchmas_PUnit">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x<?= $Page->RowIndex ?>_PUnit" id="x<?= $Page->RowIndex ?>_PUnit" size="30" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_PUnit" id="o<?= $Page->RowIndex ?>_PUnit" value="<?= HtmlEncode($Page->PUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SUnit->Visible) { // SUnit ?>
        <td data-name="SUnit">
<span id="el$rowindex$_pharmacy_batchmas_SUnit" class="form-group pharmacy_batchmas_SUnit">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x<?= $Page->RowIndex ?>_SUnit" id="x<?= $Page->RowIndex ?>_SUnit" size="30" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_SUnit" data-hidden="1" name="o<?= $Page->RowIndex ?>_SUnit" id="o<?= $Page->RowIndex ?>_SUnit" value="<?= HtmlEncode($Page->SUnit->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue">
<span id="el$rowindex$_pharmacy_batchmas_PurValue" class="form-group pharmacy_batchmas_PurValue">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PurValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurValue" id="o<?= $Page->RowIndex ?>_PurValue" value="<?= HtmlEncode($Page->PurValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PurRate->Visible) { // PurRate ?>
        <td data-name="PurRate">
<span id="el$rowindex$_pharmacy_batchmas_PurRate" class="form-group pharmacy_batchmas_PurRate">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x<?= $Page->RowIndex ?>_PurRate" id="x<?= $Page->RowIndex ?>_PurRate" size="30" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_batchmas" data-field="x_PurRate" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurRate" id="o<?= $Page->RowIndex ?>_PurRate" value="<?= HtmlEncode($Page->PurRate->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_batchmaslist","load"], function() {
    fpharmacy_batchmaslist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("pharmacy_batchmas");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    // Write your table-specific startup script here
    // document.write("page loaded");
    </script>
    <style>
    .input-group {
    	position: relative;
    	display: flex;
    	flex-wrap: nowrap;
    	align-items: stretch;
    	width: 80%;
    }
    .form-control {
    	width: 100%;
    	flex-grow: 0;
    }
    .input-group>.form-control {
    	width: 100%;
    	flex-grow: 0;
    }
    </style>
    <script>
});
</script>
<?php if (!$Page->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_pharmacy_batchmas",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

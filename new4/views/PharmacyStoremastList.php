<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyStoremastList = &$Page;
?>
<?php if (!$Page->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpharmacy_storemastlist;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "list";
    fpharmacy_storemastlist = currentForm = new ew.Form("fpharmacy_storemastlist", "list");
    fpharmacy_storemastlist.formKeyCountName = '<?= $Page->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_storemast")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_storemast)
        ew.vars.tables.pharmacy_storemast = currentTable;
    fpharmacy_storemastlist.addFields([
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["TYPE", [fields.TYPE.visible && fields.TYPE.required ? ew.Validators.required(fields.TYPE.caption) : null], fields.TYPE.isInvalid],
        ["DES", [fields.DES.visible && fields.DES.required ? ew.Validators.required(fields.DES.caption) : null], fields.DES.isInvalid],
        ["UM", [fields.UM.visible && fields.UM.required ? ew.Validators.required(fields.UM.caption) : null], fields.UM.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["GENNAME", [fields.GENNAME.visible && fields.GENNAME.required ? ew.Validators.required(fields.GENNAME.caption) : null], fields.GENNAME.isInvalid],
        ["CREATEDDT", [fields.CREATEDDT.visible && fields.CREATEDDT.required ? ew.Validators.required(fields.CREATEDDT.caption) : null], fields.CREATEDDT.isInvalid],
        ["DRID", [fields.DRID.visible && fields.DRID.required ? ew.Validators.required(fields.DRID.caption) : null], fields.DRID.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["COMBCODE", [fields.COMBCODE.visible && fields.COMBCODE.required ? ew.Validators.required(fields.COMBCODE.caption) : null], fields.COMBCODE.isInvalid],
        ["GENCODE", [fields.GENCODE.visible && fields.GENCODE.required ? ew.Validators.required(fields.GENCODE.caption) : null], fields.GENCODE.isInvalid],
        ["STRENGTH", [fields.STRENGTH.visible && fields.STRENGTH.required ? ew.Validators.required(fields.STRENGTH.caption) : null, ew.Validators.float], fields.STRENGTH.isInvalid],
        ["UNIT", [fields.UNIT.visible && fields.UNIT.required ? ew.Validators.required(fields.UNIT.caption) : null], fields.UNIT.isInvalid],
        ["FORMULARY", [fields.FORMULARY.visible && fields.FORMULARY.required ? ew.Validators.required(fields.FORMULARY.caption) : null], fields.FORMULARY.isInvalid],
        ["COMBNAME", [fields.COMBNAME.visible && fields.COMBNAME.required ? ew.Validators.required(fields.COMBNAME.caption) : null], fields.COMBNAME.isInvalid],
        ["GENERICNAME", [fields.GENERICNAME.visible && fields.GENERICNAME.required ? ew.Validators.required(fields.GENERICNAME.caption) : null], fields.GENERICNAME.isInvalid],
        ["REMARK", [fields.REMARK.visible && fields.REMARK.required ? ew.Validators.required(fields.REMARK.caption) : null], fields.REMARK.isInvalid],
        ["TEMP", [fields.TEMP.visible && fields.TEMP.required ? ew.Validators.required(fields.TEMP.caption) : null], fields.TEMP.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PurValue", [fields.PurValue.visible && fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["PSGST", [fields.PSGST.visible && fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null, ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.visible && fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null, ew.Validators.float], fields.PCGST.isInvalid],
        ["SaleValue", [fields.SaleValue.visible && fields.SaleValue.required ? ew.Validators.required(fields.SaleValue.caption) : null, ew.Validators.float], fields.SaleValue.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null, ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null, ew.Validators.float], fields.SCGST.isInvalid],
        ["SaleRate", [fields.SaleRate.visible && fields.SaleRate.required ? ew.Validators.required(fields.SaleRate.caption) : null, ew.Validators.float], fields.SaleRate.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["BRNAME", [fields.BRNAME.visible && fields.BRNAME.required ? ew.Validators.required(fields.BRNAME.caption) : null], fields.BRNAME.isInvalid],
        ["Scheduling", [fields.Scheduling.visible && fields.Scheduling.required ? ew.Validators.required(fields.Scheduling.caption) : null], fields.Scheduling.isInvalid],
        ["Schedulingh1", [fields.Schedulingh1.visible && fields.Schedulingh1.required ? ew.Validators.required(fields.Schedulingh1.caption) : null], fields.Schedulingh1.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_storemastlist,
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
    fpharmacy_storemastlist.validate = function () {
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
    fpharmacy_storemastlist.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_storemastlist.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_storemastlist.lists.TYPE = <?= $Page->TYPE->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.GENNAME = <?= $Page->GENNAME->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.DRID = <?= $Page->DRID->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.MFRCODE = <?= $Page->MFRCODE->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.COMBCODE = <?= $Page->COMBCODE->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.GENCODE = <?= $Page->GENCODE->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.UNIT = <?= $Page->UNIT->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.FORMULARY = <?= $Page->FORMULARY->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.COMBNAME = <?= $Page->COMBNAME->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.GENERICNAME = <?= $Page->GENERICNAME->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.Scheduling = <?= $Page->Scheduling->toClientList($Page) ?>;
    fpharmacy_storemastlist.lists.Schedulingh1 = <?= $Page->Schedulingh1->toClientList($Page) ?>;
    loadjs.done("fpharmacy_storemastlist");
});
var fpharmacy_storemastlistsrch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    fpharmacy_storemastlistsrch = currentSearchForm = new ew.Form("fpharmacy_storemastlistsrch");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_storemast")) ?>,
        fields = currentTable.fields;
    fpharmacy_storemastlistsrch.addFields([
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["TYPE", [], fields.TYPE.isInvalid],
        ["DES", [], fields.DES.isInvalid],
        ["UM", [], fields.UM.isInvalid],
        ["RT", [], fields.RT.isInvalid],
        ["BATCHNO", [], fields.BATCHNO.isInvalid],
        ["MRP", [], fields.MRP.isInvalid],
        ["EXPDT", [], fields.EXPDT.isInvalid],
        ["GENNAME", [], fields.GENNAME.isInvalid],
        ["CREATEDDT", [], fields.CREATEDDT.isInvalid],
        ["DRID", [], fields.DRID.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["COMBCODE", [], fields.COMBCODE.isInvalid],
        ["GENCODE", [], fields.GENCODE.isInvalid],
        ["STRENGTH", [], fields.STRENGTH.isInvalid],
        ["UNIT", [], fields.UNIT.isInvalid],
        ["FORMULARY", [], fields.FORMULARY.isInvalid],
        ["COMBNAME", [], fields.COMBNAME.isInvalid],
        ["GENERICNAME", [], fields.GENERICNAME.isInvalid],
        ["REMARK", [], fields.REMARK.isInvalid],
        ["TEMP", [], fields.TEMP.isInvalid],
        ["id", [], fields.id.isInvalid],
        ["PurValue", [], fields.PurValue.isInvalid],
        ["PSGST", [], fields.PSGST.isInvalid],
        ["PCGST", [], fields.PCGST.isInvalid],
        ["SaleValue", [], fields.SaleValue.isInvalid],
        ["SSGST", [], fields.SSGST.isInvalid],
        ["SCGST", [], fields.SCGST.isInvalid],
        ["SaleRate", [], fields.SaleRate.isInvalid],
        ["HospID", [], fields.HospID.isInvalid],
        ["BRNAME", [], fields.BRNAME.isInvalid],
        ["Scheduling", [], fields.Scheduling.isInvalid],
        ["Schedulingh1", [], fields.Schedulingh1.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpharmacy_storemastlistsrch.setInvalid();
    });

    // Validate form
    fpharmacy_storemastlistsrch.validate = function () {
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
    fpharmacy_storemastlistsrch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_storemastlistsrch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_storemastlistsrch.lists.GENNAME = <?= $Page->GENNAME->toClientList($Page) ?>;
    fpharmacy_storemastlistsrch.lists.COMBNAME = <?= $Page->COMBNAME->toClientList($Page) ?>;
    fpharmacy_storemastlistsrch.lists.GENERICNAME = <?= $Page->GENERICNAME->toClientList($Page) ?>;

    // Filters
    fpharmacy_storemastlistsrch.filterList = <?= $Page->getFilterList() ?>;
    loadjs.done("fpharmacy_storemastlistsrch");
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
<form name="fpharmacy_storemastlistsrch" id="fpharmacy_storemastlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?= CurrentPageUrl(false) ?>">
<div id="fpharmacy_storemastlistsrch-search-panel" class="<?= $Page->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="pharmacy_storemast">
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
        <span id="el_pharmacy_storemast_DES" class="ew-search-field">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage(false) ?></div>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_GENNAME" class="ew-cell form-group">
        <label class="ew-search-caption ew-label"><?= $Page->GENNAME->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
        <span id="el_pharmacy_storemast_GENNAME" class="ew-search-field">
<?php
$onchange = $Page->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->GENNAME->getInputTextType() ?>" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?= RemoveHtml($Page->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>"<?= $Page->GENNAME->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENNAME->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->GENNAME->ReadOnly || $Page->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_storemast" data-field="x_GENNAME" data-input="sv_x_GENNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?= HtmlEncode($Page->GENNAME->AdvancedSearch->SearchValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage(false) ?></div>
<script>
loadjs.ready(["fpharmacy_storemastlistsrch"], function() {
    fpharmacy_storemastlistsrch.createAutoSuggest(Object.assign({"id":"x_GENNAME","forceSelect":false}, ew.vars.tables.pharmacy_storemast.fields.GENNAME.autoSuggestOptions));
});
</script>
<?= $Page->GENNAME->Lookup->getParamTag($Page, "p_x_GENNAME") ?>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_COMBNAME" class="ew-cell form-group">
        <label for="x_COMBNAME" class="ew-search-caption ew-label"><?= $Page->COMBNAME->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COMBNAME" id="z_COMBNAME" value="LIKE">
</span>
        <span id="el_pharmacy_storemast_COMBNAME" class="ew-search-field">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?= EmptyValue(strval($Page->COMBNAME->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBNAME->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBNAME->ReadOnly || $Page->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBNAME->getErrorMessage(false) ?></div>
<?= $Page->COMBNAME->Lookup->getParamTag($Page, "p_x_COMBNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?= $Page->COMBNAME->AdvancedSearch->SearchValue ?>"<?= $Page->COMBNAME->editAttributes() ?>>
</span>
    </div>
    <?php if ($Page->SearchColumnCount % $Page->SearchFieldsPerRow == 0) { ?>
</div>
    <?php } ?>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
    <?php
        $Page->SearchColumnCount++;
        if (($Page->SearchColumnCount - 1) % $Page->SearchFieldsPerRow == 0) {
            $Page->SearchRowCount++;
    ?>
<div id="xsr_<?= $Page->SearchRowCount ?>" class="ew-row d-sm-flex">
    <?php
        }
     ?>
    <div id="xsc_GENERICNAME" class="ew-cell form-group">
        <label for="x_GENERICNAME" class="ew-search-caption ew-label"><?= $Page->GENERICNAME->caption() ?></label>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENERICNAME" id="z_GENERICNAME" value="LIKE">
</span>
        <span id="el_pharmacy_storemast_GENERICNAME" class="ew-search-field">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?= EmptyValue(strval($Page->GENERICNAME->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENERICNAME->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENERICNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENERICNAME->ReadOnly || $Page->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENERICNAME->getErrorMessage(false) ?></div>
<?= $Page->GENERICNAME->Lookup->getParamTag($Page, "p_x_GENERICNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?= $Page->GENERICNAME->AdvancedSearch->SearchValue ?>"<?= $Page->GENERICNAME->editAttributes() ?>>
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
<div class="card ew-card ew-grid<?php if ($Page->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> pharmacy_storemast">
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
<form name="fpharmacy_storemastlist" id="fpharmacy_storemastlist" class="form-inline ew-form ew-list-form" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<div id="gmp_pharmacy_storemast" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($Page->TotalRecords > 0 || $Page->isGridEdit()) { ?>
<table id="tbl_pharmacy_storemastlist" class="table ew-table"><!-- .ew-table -->
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
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <th data-name="BRCODE" class="<?= $Page->BRCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BRCODE" class="pharmacy_storemast_BRCODE"><?= $Page->renderSort($Page->BRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
        <th data-name="PRC" class="<?= $Page->PRC->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PRC" class="pharmacy_storemast_PRC"><?= $Page->renderSort($Page->PRC) ?></div></th>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
        <th data-name="TYPE" class="<?= $Page->TYPE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TYPE" class="pharmacy_storemast_TYPE"><?= $Page->renderSort($Page->TYPE) ?></div></th>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
        <th data-name="DES" class="<?= $Page->DES->headerCellClass() ?>"><div id="elh_pharmacy_storemast_DES" class="pharmacy_storemast_DES"><?= $Page->renderSort($Page->DES) ?></div></th>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
        <th data-name="UM" class="<?= $Page->UM->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UM" class="pharmacy_storemast_UM"><?= $Page->renderSort($Page->UM) ?></div></th>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
        <th data-name="RT" class="<?= $Page->RT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_RT" class="pharmacy_storemast_RT"><?= $Page->renderSort($Page->RT) ?></div></th>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <th data-name="BATCHNO" class="<?= $Page->BATCHNO->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BATCHNO" class="pharmacy_storemast_BATCHNO"><?= $Page->renderSort($Page->BATCHNO) ?></div></th>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
        <th data-name="MRP" class="<?= $Page->MRP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MRP" class="pharmacy_storemast_MRP"><?= $Page->renderSort($Page->MRP) ?></div></th>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <th data-name="EXPDT" class="<?= $Page->EXPDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_EXPDT" class="pharmacy_storemast_EXPDT"><?= $Page->renderSort($Page->EXPDT) ?></div></th>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <th data-name="GENNAME" class="<?= $Page->GENNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENNAME" class="pharmacy_storemast_GENNAME"><?= $Page->renderSort($Page->GENNAME) ?></div></th>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <th data-name="CREATEDDT" class="<?= $Page->CREATEDDT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_CREATEDDT" class="pharmacy_storemast_CREATEDDT"><?= $Page->renderSort($Page->CREATEDDT) ?></div></th>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
        <th data-name="DRID" class="<?= $Page->DRID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_DRID" class="pharmacy_storemast_DRID"><?= $Page->renderSort($Page->DRID) ?></div></th>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <th data-name="MFRCODE" class="<?= $Page->MFRCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_MFRCODE" class="pharmacy_storemast_MFRCODE"><?= $Page->renderSort($Page->MFRCODE) ?></div></th>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <th data-name="COMBCODE" class="<?= $Page->COMBCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_COMBCODE" class="pharmacy_storemast_COMBCODE"><?= $Page->renderSort($Page->COMBCODE) ?></div></th>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <th data-name="GENCODE" class="<?= $Page->GENCODE->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENCODE" class="pharmacy_storemast_GENCODE"><?= $Page->renderSort($Page->GENCODE) ?></div></th>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <th data-name="STRENGTH" class="<?= $Page->STRENGTH->headerCellClass() ?>"><div id="elh_pharmacy_storemast_STRENGTH" class="pharmacy_storemast_STRENGTH"><?= $Page->renderSort($Page->STRENGTH) ?></div></th>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
        <th data-name="UNIT" class="<?= $Page->UNIT->headerCellClass() ?>"><div id="elh_pharmacy_storemast_UNIT" class="pharmacy_storemast_UNIT"><?= $Page->renderSort($Page->UNIT) ?></div></th>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <th data-name="FORMULARY" class="<?= $Page->FORMULARY->headerCellClass() ?>"><div id="elh_pharmacy_storemast_FORMULARY" class="pharmacy_storemast_FORMULARY"><?= $Page->renderSort($Page->FORMULARY) ?></div></th>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <th data-name="COMBNAME" class="<?= $Page->COMBNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_COMBNAME" class="pharmacy_storemast_COMBNAME"><?= $Page->renderSort($Page->COMBNAME) ?></div></th>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <th data-name="GENERICNAME" class="<?= $Page->GENERICNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_GENERICNAME" class="pharmacy_storemast_GENERICNAME"><?= $Page->renderSort($Page->GENERICNAME) ?></div></th>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
        <th data-name="REMARK" class="<?= $Page->REMARK->headerCellClass() ?>"><div id="elh_pharmacy_storemast_REMARK" class="pharmacy_storemast_REMARK"><?= $Page->renderSort($Page->REMARK) ?></div></th>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
        <th data-name="TEMP" class="<?= $Page->TEMP->headerCellClass() ?>"><div id="elh_pharmacy_storemast_TEMP" class="pharmacy_storemast_TEMP"><?= $Page->renderSort($Page->TEMP) ?></div></th>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Page->id->headerCellClass() ?>"><div id="elh_pharmacy_storemast_id" class="pharmacy_storemast_id"><?= $Page->renderSort($Page->id) ?></div></th>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
        <th data-name="PurValue" class="<?= $Page->PurValue->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PurValue" class="pharmacy_storemast_PurValue"><?= $Page->renderSort($Page->PurValue) ?></div></th>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
        <th data-name="PSGST" class="<?= $Page->PSGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PSGST" class="pharmacy_storemast_PSGST"><?= $Page->renderSort($Page->PSGST) ?></div></th>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
        <th data-name="PCGST" class="<?= $Page->PCGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_PCGST" class="pharmacy_storemast_PCGST"><?= $Page->renderSort($Page->PCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <th data-name="SaleValue" class="<?= $Page->SaleValue->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SaleValue" class="pharmacy_storemast_SaleValue"><?= $Page->renderSort($Page->SaleValue) ?></div></th>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
        <th data-name="SSGST" class="<?= $Page->SSGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SSGST" class="pharmacy_storemast_SSGST"><?= $Page->renderSort($Page->SSGST) ?></div></th>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
        <th data-name="SCGST" class="<?= $Page->SCGST->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SCGST" class="pharmacy_storemast_SCGST"><?= $Page->renderSort($Page->SCGST) ?></div></th>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <th data-name="SaleRate" class="<?= $Page->SaleRate->headerCellClass() ?>"><div id="elh_pharmacy_storemast_SaleRate" class="pharmacy_storemast_SaleRate"><?= $Page->renderSort($Page->SaleRate) ?></div></th>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Page->HospID->headerCellClass() ?>"><div id="elh_pharmacy_storemast_HospID" class="pharmacy_storemast_HospID"><?= $Page->renderSort($Page->HospID) ?></div></th>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <th data-name="BRNAME" class="<?= $Page->BRNAME->headerCellClass() ?>"><div id="elh_pharmacy_storemast_BRNAME" class="pharmacy_storemast_BRNAME"><?= $Page->renderSort($Page->BRNAME) ?></div></th>
<?php } ?>
<?php if ($Page->Scheduling->Visible) { // Scheduling ?>
        <th data-name="Scheduling" class="<?= $Page->Scheduling->headerCellClass() ?>"><div id="elh_pharmacy_storemast_Scheduling" class="pharmacy_storemast_Scheduling"><?= $Page->renderSort($Page->Scheduling) ?></div></th>
<?php } ?>
<?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
        <th data-name="Schedulingh1" class="<?= $Page->Schedulingh1->headerCellClass() ?>"><div id="elh_pharmacy_storemast_Schedulingh1" class="pharmacy_storemast_Schedulingh1"><?= $Page->renderSort($Page->Schedulingh1) ?></div></th>
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowCount, "id" => "r" . $Page->RowCount . "_pharmacy_storemast", "data-rowtype" => $Page->RowType]);

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
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE" <?= $Page->BRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BRCODE">
<span<?= $Page->BRCODE->viewAttributes() ?>>
<?= $Page->BRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC" <?= $Page->PRC->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PRC" class="form-group">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PRC">
<span<?= $Page->PRC->viewAttributes() ?>>
<?= $Page->PRC->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TYPE->Visible) { // TYPE ?>
        <td data-name="TYPE" <?= $Page->TYPE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TYPE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_TYPE"
        name="x<?= $Page->RowIndex ?>_TYPE"
        class="form-control ew-select<?= $Page->TYPE->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE"
        data-table="pharmacy_storemast"
        data-field="x_TYPE"
        data-value-separator="<?= $Page->TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TYPE->getPlaceHolder()) ?>"
        <?= $Page->TYPE->editAttributes() ?>>
        <?= $Page->TYPE->selectOptionListHtml("x{$Page->RowIndex}_TYPE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TYPE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE']"),
        options = { name: "x<?= $Page->RowIndex ?>_TYPE", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.TYPE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_TYPE" data-hidden="1" name="o<?= $Page->RowIndex ?>_TYPE" id="o<?= $Page->RowIndex ?>_TYPE" value="<?= HtmlEncode($Page->TYPE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TYPE" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_TYPE"
        name="x<?= $Page->RowIndex ?>_TYPE"
        class="form-control ew-select<?= $Page->TYPE->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE"
        data-table="pharmacy_storemast"
        data-field="x_TYPE"
        data-value-separator="<?= $Page->TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TYPE->getPlaceHolder()) ?>"
        <?= $Page->TYPE->editAttributes() ?>>
        <?= $Page->TYPE->selectOptionListHtml("x{$Page->RowIndex}_TYPE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TYPE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE']"),
        options = { name: "x<?= $Page->RowIndex ?>_TYPE", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.TYPE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TYPE">
<span<?= $Page->TYPE->viewAttributes() ?>>
<?= $Page->TYPE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES" <?= $Page->DES->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DES" class="form-group">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_DES" name="x<?= $Page->RowIndex ?>_DES" id="x<?= $Page->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DES" data-hidden="1" name="o<?= $Page->RowIndex ?>_DES" id="o<?= $Page->RowIndex ?>_DES" value="<?= HtmlEncode($Page->DES->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DES" class="form-group">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_DES" name="x<?= $Page->RowIndex ?>_DES" id="x<?= $Page->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DES">
<span<?= $Page->DES->viewAttributes() ?>>
<?= $Page->DES->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UM->Visible) { // UM ?>
        <td data-name="UM" <?= $Page->UM->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UM" class="form-group">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UM" name="x<?= $Page->RowIndex ?>_UM" id="x<?= $Page->RowIndex ?>_UM" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_UM" data-hidden="1" name="o<?= $Page->RowIndex ?>_UM" id="o<?= $Page->RowIndex ?>_UM" value="<?= HtmlEncode($Page->UM->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UM" class="form-group">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UM" name="x<?= $Page->RowIndex ?>_UM" id="x<?= $Page->RowIndex ?>_UM" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UM">
<span<?= $Page->UM->viewAttributes() ?>>
<?= $Page->UM->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT" <?= $Page->RT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RT" class="form-group">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_RT" data-hidden="1" name="o<?= $Page->RowIndex ?>_RT" id="o<?= $Page->RowIndex ?>_RT" value="<?= HtmlEncode($Page->RT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RT" class="form-group">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_RT">
<span<?= $Page->RT->viewAttributes() ?>>
<?= $Page->RT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO" <?= $Page->BATCHNO->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BATCHNO" class="form-group">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="30" maxlength="14" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCHNO" id="o<?= $Page->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Page->BATCHNO->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BATCHNO" class="form-group">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="30" maxlength="14" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BATCHNO">
<span<?= $Page->BATCHNO->viewAttributes() ?>>
<?= $Page->BATCHNO->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP" <?= $Page->MRP->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MRP" class="form-group">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MRP" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRP" id="o<?= $Page->RowIndex ?>_MRP" value="<?= HtmlEncode($Page->MRP->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MRP" class="form-group">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MRP">
<span<?= $Page->MRP->viewAttributes() ?>>
<?= $Page->MRP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT" <?= $Page->EXPDT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_EXPDT" class="form-group">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_EXPDT">
<span<?= $Page->EXPDT->viewAttributes() ?>>
<?= $Page->EXPDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td data-name="GENNAME" <?= $Page->GENNAME->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENNAME" class="form-group">
<?php
$onchange = $Page->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_GENNAME" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->GENNAME->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_GENNAME" id="sv_x<?= $Page->RowIndex ?>_GENNAME" value="<?= RemoveHtml($Page->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>"<?= $Page->GENNAME->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENNAME->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->GENNAME->ReadOnly || $Page->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_storemast" data-field="x_GENNAME" data-input="sv_x<?= $Page->RowIndex ?>_GENNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENNAME" id="x<?= $Page->RowIndex ?>_GENNAME" value="<?= HtmlEncode($Page->GENNAME->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_storemastlist"], function() {
    fpharmacy_storemastlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_GENNAME","forceSelect":false}, ew.vars.tables.pharmacy_storemast.fields.GENNAME.autoSuggestOptions));
});
</script>
<?= $Page->GENNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENNAME") ?>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_GENNAME" id="o<?= $Page->RowIndex ?>_GENNAME" value="<?= HtmlEncode($Page->GENNAME->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENNAME" class="form-group">
<?php
$onchange = $Page->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_GENNAME" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->GENNAME->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_GENNAME" id="sv_x<?= $Page->RowIndex ?>_GENNAME" value="<?= RemoveHtml($Page->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>"<?= $Page->GENNAME->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENNAME->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->GENNAME->ReadOnly || $Page->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_storemast" data-field="x_GENNAME" data-input="sv_x<?= $Page->RowIndex ?>_GENNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENNAME" id="x<?= $Page->RowIndex ?>_GENNAME" value="<?= HtmlEncode($Page->GENNAME->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_storemastlist"], function() {
    fpharmacy_storemastlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_GENNAME","forceSelect":false}, ew.vars.tables.pharmacy_storemast.fields.GENNAME.autoSuggestOptions));
});
</script>
<?= $Page->GENNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENNAME") ?>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENNAME">
<span<?= $Page->GENNAME->viewAttributes() ?>>
<?= $Page->GENNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <td data-name="CREATEDDT" <?= $Page->CREATEDDT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_CREATEDDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_CREATEDDT" id="o<?= $Page->RowIndex ?>_CREATEDDT" value="<?= HtmlEncode($Page->CREATEDDT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_CREATEDDT">
<span<?= $Page->CREATEDDT->viewAttributes() ?>>
<?= $Page->CREATEDDT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->DRID->Visible) { // DRID ?>
        <td data-name="DRID" <?= $Page->DRID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DRID" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_DRID"><?= EmptyValue(strval($Page->DRID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DRID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DRID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DRID->ReadOnly || $Page->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DRID->getErrorMessage() ?></div>
<?= $Page->DRID->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DRID") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_DRID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DRID->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_DRID" id="x<?= $Page->RowIndex ?>_DRID" value="<?= $Page->DRID->CurrentValue ?>"<?= $Page->DRID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-hidden="1" name="o<?= $Page->RowIndex ?>_DRID" id="o<?= $Page->RowIndex ?>_DRID" value="<?= HtmlEncode($Page->DRID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DRID" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_DRID"><?= EmptyValue(strval($Page->DRID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DRID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DRID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DRID->ReadOnly || $Page->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DRID->getErrorMessage() ?></div>
<?= $Page->DRID->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DRID") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_DRID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DRID->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_DRID" id="x<?= $Page->RowIndex ?>_DRID" value="<?= $Page->DRID->CurrentValue ?>"<?= $Page->DRID->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_DRID">
<span<?= $Page->DRID->viewAttributes() ?>>
<?= $Page->DRID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE" <?= $Page->MFRCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MFRCODE" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_MFRCODE"><?= EmptyValue(strval($Page->MFRCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->MFRCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->MFRCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->MFRCODE->ReadOnly || $Page->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
<?= $Page->MFRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_MFRCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->MFRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" value="<?= $Page->MFRCODE->CurrentValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_MFRCODE" id="o<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MFRCODE" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_MFRCODE"><?= EmptyValue(strval($Page->MFRCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->MFRCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->MFRCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->MFRCODE->ReadOnly || $Page->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
<?= $Page->MFRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_MFRCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->MFRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" value="<?= $Page->MFRCODE->CurrentValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_MFRCODE">
<span<?= $Page->MFRCODE->viewAttributes() ?>>
<?= $Page->MFRCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <td data-name="COMBCODE" <?= $Page->COMBCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBCODE" class="form-group">
<?php $Page->COMBCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_COMBCODE"><?= EmptyValue(strval($Page->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBCODE->ReadOnly || $Page->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBCODE->getErrorMessage() ?></div>
<?= $Page->COMBCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_COMBCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_COMBCODE" id="x<?= $Page->RowIndex ?>_COMBCODE" value="<?= $Page->COMBCODE->CurrentValue ?>"<?= $Page->COMBCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_COMBCODE" id="o<?= $Page->RowIndex ?>_COMBCODE" value="<?= HtmlEncode($Page->COMBCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBCODE" class="form-group">
<?php $Page->COMBCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_COMBCODE"><?= EmptyValue(strval($Page->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBCODE->ReadOnly || $Page->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBCODE->getErrorMessage() ?></div>
<?= $Page->COMBCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_COMBCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_COMBCODE" id="x<?= $Page->RowIndex ?>_COMBCODE" value="<?= $Page->COMBCODE->CurrentValue ?>"<?= $Page->COMBCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBCODE">
<span<?= $Page->COMBCODE->viewAttributes() ?>>
<?= $Page->COMBCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <td data-name="GENCODE" <?= $Page->GENCODE->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENCODE" class="form-group">
<?php $Page->GENCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_GENCODE"><?= EmptyValue(strval($Page->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENCODE->ReadOnly || $Page->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENCODE->getErrorMessage() ?></div>
<?= $Page->GENCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENCODE" id="x<?= $Page->RowIndex ?>_GENCODE" value="<?= $Page->GENCODE->CurrentValue ?>"<?= $Page->GENCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_GENCODE" id="o<?= $Page->RowIndex ?>_GENCODE" value="<?= HtmlEncode($Page->GENCODE->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENCODE" class="form-group">
<?php $Page->GENCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_GENCODE"><?= EmptyValue(strval($Page->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENCODE->ReadOnly || $Page->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENCODE->getErrorMessage() ?></div>
<?= $Page->GENCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENCODE" id="x<?= $Page->RowIndex ?>_GENCODE" value="<?= $Page->GENCODE->CurrentValue ?>"<?= $Page->GENCODE->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENCODE">
<span<?= $Page->GENCODE->viewAttributes() ?>>
<?= $Page->GENCODE->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <td data-name="STRENGTH" <?= $Page->STRENGTH->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_STRENGTH" class="form-group">
<input type="<?= $Page->STRENGTH->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x<?= $Page->RowIndex ?>_STRENGTH" id="x<?= $Page->RowIndex ?>_STRENGTH" size="30" placeholder="<?= HtmlEncode($Page->STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->STRENGTH->EditValue ?>"<?= $Page->STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STRENGTH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_STRENGTH" data-hidden="1" name="o<?= $Page->RowIndex ?>_STRENGTH" id="o<?= $Page->RowIndex ?>_STRENGTH" value="<?= HtmlEncode($Page->STRENGTH->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_STRENGTH" class="form-group">
<input type="<?= $Page->STRENGTH->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x<?= $Page->RowIndex ?>_STRENGTH" id="x<?= $Page->RowIndex ?>_STRENGTH" size="30" placeholder="<?= HtmlEncode($Page->STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->STRENGTH->EditValue ?>"<?= $Page->STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STRENGTH->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_STRENGTH">
<span<?= $Page->STRENGTH->viewAttributes() ?>>
<?= $Page->STRENGTH->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->UNIT->Visible) { // UNIT ?>
        <td data-name="UNIT" <?= $Page->UNIT->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UNIT" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_UNIT"
        name="x<?= $Page->RowIndex ?>_UNIT"
        class="form-control ew-select<?= $Page->UNIT->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT"
        data-table="pharmacy_storemast"
        data-field="x_UNIT"
        data-value-separator="<?= $Page->UNIT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->UNIT->getPlaceHolder()) ?>"
        <?= $Page->UNIT->editAttributes() ?>>
        <?= $Page->UNIT->selectOptionListHtml("x{$Page->RowIndex}_UNIT") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->UNIT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT']"),
        options = { name: "x<?= $Page->RowIndex ?>_UNIT", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.UNIT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.UNIT.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_UNIT" data-hidden="1" name="o<?= $Page->RowIndex ?>_UNIT" id="o<?= $Page->RowIndex ?>_UNIT" value="<?= HtmlEncode($Page->UNIT->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UNIT" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_UNIT"
        name="x<?= $Page->RowIndex ?>_UNIT"
        class="form-control ew-select<?= $Page->UNIT->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT"
        data-table="pharmacy_storemast"
        data-field="x_UNIT"
        data-value-separator="<?= $Page->UNIT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->UNIT->getPlaceHolder()) ?>"
        <?= $Page->UNIT->editAttributes() ?>>
        <?= $Page->UNIT->selectOptionListHtml("x{$Page->RowIndex}_UNIT") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->UNIT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT']"),
        options = { name: "x<?= $Page->RowIndex ?>_UNIT", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.UNIT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.UNIT.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_UNIT">
<span<?= $Page->UNIT->viewAttributes() ?>>
<?= $Page->UNIT->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <td data-name="FORMULARY" <?= $Page->FORMULARY->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_FORMULARY" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_FORMULARY"
        name="x<?= $Page->RowIndex ?>_FORMULARY"
        class="form-control ew-select<?= $Page->FORMULARY->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY"
        data-table="pharmacy_storemast"
        data-field="x_FORMULARY"
        data-value-separator="<?= $Page->FORMULARY->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FORMULARY->getPlaceHolder()) ?>"
        <?= $Page->FORMULARY->editAttributes() ?>>
        <?= $Page->FORMULARY->selectOptionListHtml("x{$Page->RowIndex}_FORMULARY") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->FORMULARY->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY']"),
        options = { name: "x<?= $Page->RowIndex ?>_FORMULARY", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.FORMULARY.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.FORMULARY.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-hidden="1" name="o<?= $Page->RowIndex ?>_FORMULARY" id="o<?= $Page->RowIndex ?>_FORMULARY" value="<?= HtmlEncode($Page->FORMULARY->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_FORMULARY" class="form-group">
    <select
        id="x<?= $Page->RowIndex ?>_FORMULARY"
        name="x<?= $Page->RowIndex ?>_FORMULARY"
        class="form-control ew-select<?= $Page->FORMULARY->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY"
        data-table="pharmacy_storemast"
        data-field="x_FORMULARY"
        data-value-separator="<?= $Page->FORMULARY->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FORMULARY->getPlaceHolder()) ?>"
        <?= $Page->FORMULARY->editAttributes() ?>>
        <?= $Page->FORMULARY->selectOptionListHtml("x{$Page->RowIndex}_FORMULARY") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->FORMULARY->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY']"),
        options = { name: "x<?= $Page->RowIndex ?>_FORMULARY", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.FORMULARY.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.FORMULARY.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_FORMULARY">
<span<?= $Page->FORMULARY->viewAttributes() ?>>
<?= $Page->FORMULARY->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <td data-name="COMBNAME" <?= $Page->COMBNAME->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBNAME" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_COMBNAME"><?= EmptyValue(strval($Page->COMBNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBNAME->ReadOnly || $Page->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBNAME->getErrorMessage() ?></div>
<?= $Page->COMBNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_COMBNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_COMBNAME" id="x<?= $Page->RowIndex ?>_COMBNAME" value="<?= $Page->COMBNAME->CurrentValue ?>"<?= $Page->COMBNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_COMBNAME" id="o<?= $Page->RowIndex ?>_COMBNAME" value="<?= HtmlEncode($Page->COMBNAME->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBNAME" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_COMBNAME"><?= EmptyValue(strval($Page->COMBNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBNAME->ReadOnly || $Page->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBNAME->getErrorMessage() ?></div>
<?= $Page->COMBNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_COMBNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_COMBNAME" id="x<?= $Page->RowIndex ?>_COMBNAME" value="<?= $Page->COMBNAME->CurrentValue ?>"<?= $Page->COMBNAME->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_COMBNAME">
<span<?= $Page->COMBNAME->viewAttributes() ?>>
<?= $Page->COMBNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <td data-name="GENERICNAME" <?= $Page->GENERICNAME->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENERICNAME" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_GENERICNAME"><?= EmptyValue(strval($Page->GENERICNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENERICNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENERICNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENERICNAME->ReadOnly || $Page->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENERICNAME->getErrorMessage() ?></div>
<?= $Page->GENERICNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENERICNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENERICNAME" id="x<?= $Page->RowIndex ?>_GENERICNAME" value="<?= $Page->GENERICNAME->CurrentValue ?>"<?= $Page->GENERICNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_GENERICNAME" id="o<?= $Page->RowIndex ?>_GENERICNAME" value="<?= HtmlEncode($Page->GENERICNAME->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENERICNAME" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_GENERICNAME"><?= EmptyValue(strval($Page->GENERICNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENERICNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENERICNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENERICNAME->ReadOnly || $Page->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENERICNAME->getErrorMessage() ?></div>
<?= $Page->GENERICNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENERICNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENERICNAME" id="x<?= $Page->RowIndex ?>_GENERICNAME" value="<?= $Page->GENERICNAME->CurrentValue ?>"<?= $Page->GENERICNAME->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_GENERICNAME">
<span<?= $Page->GENERICNAME->viewAttributes() ?>>
<?= $Page->GENERICNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->REMARK->Visible) { // REMARK ?>
        <td data-name="REMARK" <?= $Page->REMARK->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_REMARK" class="form-group">
<input type="<?= $Page->REMARK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_REMARK" name="x<?= $Page->RowIndex ?>_REMARK" id="x<?= $Page->RowIndex ?>_REMARK" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->REMARK->getPlaceHolder()) ?>" value="<?= $Page->REMARK->EditValue ?>"<?= $Page->REMARK->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REMARK->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_REMARK" data-hidden="1" name="o<?= $Page->RowIndex ?>_REMARK" id="o<?= $Page->RowIndex ?>_REMARK" value="<?= HtmlEncode($Page->REMARK->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_REMARK" class="form-group">
<input type="<?= $Page->REMARK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_REMARK" name="x<?= $Page->RowIndex ?>_REMARK" id="x<?= $Page->RowIndex ?>_REMARK" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->REMARK->getPlaceHolder()) ?>" value="<?= $Page->REMARK->EditValue ?>"<?= $Page->REMARK->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REMARK->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_REMARK">
<span<?= $Page->REMARK->viewAttributes() ?>>
<?= $Page->REMARK->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->TEMP->Visible) { // TEMP ?>
        <td data-name="TEMP" <?= $Page->TEMP->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TEMP" class="form-group">
<input type="<?= $Page->TEMP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TEMP" name="x<?= $Page->RowIndex ?>_TEMP" id="x<?= $Page->RowIndex ?>_TEMP" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->TEMP->getPlaceHolder()) ?>" value="<?= $Page->TEMP->EditValue ?>"<?= $Page->TEMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TEMP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_TEMP" data-hidden="1" name="o<?= $Page->RowIndex ?>_TEMP" id="o<?= $Page->RowIndex ?>_TEMP" value="<?= HtmlEncode($Page->TEMP->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TEMP" class="form-group">
<input type="<?= $Page->TEMP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TEMP" name="x<?= $Page->RowIndex ?>_TEMP" id="x<?= $Page->RowIndex ?>_TEMP" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->TEMP->getPlaceHolder()) ?>" value="<?= $Page->TEMP->EditValue ?>"<?= $Page->TEMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TEMP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_TEMP">
<span<?= $Page->TEMP->viewAttributes() ?>>
<?= $Page->TEMP->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id" <?= $Page->id->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_id" class="form-group"></span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_id" class="form-group">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_id">
<span<?= $Page->id->viewAttributes() ?>>
<?= $Page->id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="pharmacy_storemast" data-field="x_id" data-hidden="1" name="x<?= $Page->RowIndex ?>_id" id="x<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue" <?= $Page->PurValue->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PurValue" class="form-group">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PurValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurValue" id="o<?= $Page->RowIndex ?>_PurValue" value="<?= HtmlEncode($Page->PurValue->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PurValue" class="form-group">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PurValue">
<span<?= $Page->PurValue->viewAttributes() ?>>
<?= $Page->PurValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST" <?= $Page->PSGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PSGST" class="form-group">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PSGST" name="x<?= $Page->RowIndex ?>_PSGST" id="x<?= $Page->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PSGST" id="o<?= $Page->RowIndex ?>_PSGST" value="<?= HtmlEncode($Page->PSGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PSGST" class="form-group">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PSGST" name="x<?= $Page->RowIndex ?>_PSGST" id="x<?= $Page->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PSGST">
<span<?= $Page->PSGST->viewAttributes() ?>>
<?= $Page->PSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST" <?= $Page->PCGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PCGST" class="form-group">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PCGST" name="x<?= $Page->RowIndex ?>_PCGST" id="x<?= $Page->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PCGST" id="o<?= $Page->RowIndex ?>_PCGST" value="<?= HtmlEncode($Page->PCGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PCGST" class="form-group">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PCGST" name="x<?= $Page->RowIndex ?>_PCGST" id="x<?= $Page->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_PCGST">
<span<?= $Page->PCGST->viewAttributes() ?>>
<?= $Page->PCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <td data-name="SaleValue" <?= $Page->SaleValue->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleValue" class="form-group">
<input type="<?= $Page->SaleValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x<?= $Page->RowIndex ?>_SaleValue" id="x<?= $Page->RowIndex ?>_SaleValue" size="30" placeholder="<?= HtmlEncode($Page->SaleValue->getPlaceHolder()) ?>" value="<?= $Page->SaleValue->EditValue ?>"<?= $Page->SaleValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SaleValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_SaleValue" id="o<?= $Page->RowIndex ?>_SaleValue" value="<?= HtmlEncode($Page->SaleValue->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleValue" class="form-group">
<input type="<?= $Page->SaleValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x<?= $Page->RowIndex ?>_SaleValue" id="x<?= $Page->RowIndex ?>_SaleValue" size="30" placeholder="<?= HtmlEncode($Page->SaleValue->getPlaceHolder()) ?>" value="<?= $Page->SaleValue->EditValue ?>"<?= $Page->SaleValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleValue->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleValue">
<span<?= $Page->SaleValue->viewAttributes() ?>>
<?= $Page->SaleValue->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST" <?= $Page->SSGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SSGST" class="form-group">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SSGST" id="o<?= $Page->RowIndex ?>_SSGST" value="<?= HtmlEncode($Page->SSGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SSGST" class="form-group">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SSGST">
<span<?= $Page->SSGST->viewAttributes() ?>>
<?= $Page->SSGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST" <?= $Page->SCGST->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SCGST" class="form-group">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SCGST" id="o<?= $Page->RowIndex ?>_SCGST" value="<?= HtmlEncode($Page->SCGST->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SCGST" class="form-group">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SCGST">
<span<?= $Page->SCGST->viewAttributes() ?>>
<?= $Page->SCGST->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <td data-name="SaleRate" <?= $Page->SaleRate->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleRate" class="form-group">
<input type="<?= $Page->SaleRate->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x<?= $Page->RowIndex ?>_SaleRate" id="x<?= $Page->RowIndex ?>_SaleRate" size="30" placeholder="<?= HtmlEncode($Page->SaleRate->getPlaceHolder()) ?>" value="<?= $Page->SaleRate->EditValue ?>"<?= $Page->SaleRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SaleRate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SaleRate" id="o<?= $Page->RowIndex ?>_SaleRate" value="<?= HtmlEncode($Page->SaleRate->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleRate" class="form-group">
<input type="<?= $Page->SaleRate->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x<?= $Page->RowIndex ?>_SaleRate" id="x<?= $Page->RowIndex ?>_SaleRate" size="30" placeholder="<?= HtmlEncode($Page->SaleRate->getPlaceHolder()) ?>" value="<?= $Page->SaleRate->EditValue ?>"<?= $Page->SaleRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleRate->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_SaleRate">
<span<?= $Page->SaleRate->viewAttributes() ?>>
<?= $Page->SaleRate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Page->HospID->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_HospID">
<span<?= $Page->HospID->viewAttributes() ?>>
<?= $Page->HospID->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME" <?= $Page->BRNAME->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRNAME" id="o<?= $Page->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Page->BRNAME->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_BRNAME">
<span<?= $Page->BRNAME->viewAttributes() ?>>
<?= $Page->BRNAME->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Scheduling->Visible) { // Scheduling ?>
        <td data-name="Scheduling" <?= $Page->Scheduling->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_Scheduling" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Scheduling">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_storemast" data-field="x_Scheduling" name="x<?= $Page->RowIndex ?>_Scheduling" id="x<?= $Page->RowIndex ?>_Scheduling"<?= $Page->Scheduling->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Scheduling" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Scheduling"
    name="x<?= $Page->RowIndex ?>_Scheduling"
    value="<?= HtmlEncode($Page->Scheduling->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_Scheduling"
    data-target="dsl_x<?= $Page->RowIndex ?>_Scheduling"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Scheduling->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Scheduling"
    data-value-separator="<?= $Page->Scheduling->displayValueSeparatorAttribute() ?>"
    <?= $Page->Scheduling->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Scheduling->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_Scheduling" data-hidden="1" name="o<?= $Page->RowIndex ?>_Scheduling" id="o<?= $Page->RowIndex ?>_Scheduling" value="<?= HtmlEncode($Page->Scheduling->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_Scheduling" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Scheduling">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_storemast" data-field="x_Scheduling" name="x<?= $Page->RowIndex ?>_Scheduling" id="x<?= $Page->RowIndex ?>_Scheduling"<?= $Page->Scheduling->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Scheduling" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Scheduling"
    name="x<?= $Page->RowIndex ?>_Scheduling"
    value="<?= HtmlEncode($Page->Scheduling->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_Scheduling"
    data-target="dsl_x<?= $Page->RowIndex ?>_Scheduling"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Scheduling->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Scheduling"
    data-value-separator="<?= $Page->Scheduling->displayValueSeparatorAttribute() ?>"
    <?= $Page->Scheduling->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Scheduling->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_Scheduling">
<span<?= $Page->Scheduling->viewAttributes() ?>>
<?= $Page->Scheduling->getViewValue() ?></span>
</span>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
        <td data-name="Schedulingh1" <?= $Page->Schedulingh1->cellAttributes() ?>>
<?php if ($Page->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_Schedulingh1" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Schedulingh1">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" name="x<?= $Page->RowIndex ?>_Schedulingh1" id="x<?= $Page->RowIndex ?>_Schedulingh1"<?= $Page->Schedulingh1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Schedulingh1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Schedulingh1"
    name="x<?= $Page->RowIndex ?>_Schedulingh1"
    value="<?= HtmlEncode($Page->Schedulingh1->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_Schedulingh1"
    data-target="dsl_x<?= $Page->RowIndex ?>_Schedulingh1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Schedulingh1->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Schedulingh1"
    data-value-separator="<?= $Page->Schedulingh1->displayValueSeparatorAttribute() ?>"
    <?= $Page->Schedulingh1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Schedulingh1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_Schedulingh1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Schedulingh1" id="o<?= $Page->RowIndex ?>_Schedulingh1" value="<?= HtmlEncode($Page->Schedulingh1->OldValue) ?>">
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_Schedulingh1" class="form-group">
<template id="tp_x<?= $Page->RowIndex ?>_Schedulingh1">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" name="x<?= $Page->RowIndex ?>_Schedulingh1" id="x<?= $Page->RowIndex ?>_Schedulingh1"<?= $Page->Schedulingh1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Schedulingh1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Schedulingh1"
    name="x<?= $Page->RowIndex ?>_Schedulingh1"
    value="<?= HtmlEncode($Page->Schedulingh1->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_Schedulingh1"
    data-target="dsl_x<?= $Page->RowIndex ?>_Schedulingh1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Schedulingh1->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Schedulingh1"
    data-value-separator="<?= $Page->Schedulingh1->displayValueSeparatorAttribute() ?>"
    <?= $Page->Schedulingh1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Schedulingh1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Page->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Page->RowCount ?>_pharmacy_storemast_Schedulingh1">
<span<?= $Page->Schedulingh1->viewAttributes() ?>>
<?= $Page->Schedulingh1->getViewValue() ?></span>
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
loadjs.ready(["fpharmacy_storemastlist","load"], function () {
    fpharmacy_storemastlist.updateLists(<?= $Page->RowIndex ?>);
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
        $Page->RowAttrs->merge(["data-rowindex" => $Page->RowIndex, "id" => "r0_pharmacy_storemast", "data-rowtype" => ROWTYPE_ADD]);
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
    <?php if ($Page->BRCODE->Visible) { // BRCODE ?>
        <td data-name="BRCODE">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRCODE" id="o<?= $Page->RowIndex ?>_BRCODE" value="<?= HtmlEncode($Page->BRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PRC->Visible) { // PRC ?>
        <td data-name="PRC">
<span id="el$rowindex$_pharmacy_storemast_PRC" class="form-group pharmacy_storemast_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PRC" name="x<?= $Page->RowIndex ?>_PRC" id="x<?= $Page->RowIndex ?>_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PRC" data-hidden="1" name="o<?= $Page->RowIndex ?>_PRC" id="o<?= $Page->RowIndex ?>_PRC" value="<?= HtmlEncode($Page->PRC->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TYPE->Visible) { // TYPE ?>
        <td data-name="TYPE">
<span id="el$rowindex$_pharmacy_storemast_TYPE" class="form-group pharmacy_storemast_TYPE">
    <select
        id="x<?= $Page->RowIndex ?>_TYPE"
        name="x<?= $Page->RowIndex ?>_TYPE"
        class="form-control ew-select<?= $Page->TYPE->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE"
        data-table="pharmacy_storemast"
        data-field="x_TYPE"
        data-value-separator="<?= $Page->TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TYPE->getPlaceHolder()) ?>"
        <?= $Page->TYPE->editAttributes() ?>>
        <?= $Page->TYPE->selectOptionListHtml("x{$Page->RowIndex}_TYPE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->TYPE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE']"),
        options = { name: "x<?= $Page->RowIndex ?>_TYPE", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.TYPE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_TYPE" data-hidden="1" name="o<?= $Page->RowIndex ?>_TYPE" id="o<?= $Page->RowIndex ?>_TYPE" value="<?= HtmlEncode($Page->TYPE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DES->Visible) { // DES ?>
        <td data-name="DES">
<span id="el$rowindex$_pharmacy_storemast_DES" class="form-group pharmacy_storemast_DES">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_DES" name="x<?= $Page->RowIndex ?>_DES" id="x<?= $Page->RowIndex ?>_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DES" data-hidden="1" name="o<?= $Page->RowIndex ?>_DES" id="o<?= $Page->RowIndex ?>_DES" value="<?= HtmlEncode($Page->DES->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UM->Visible) { // UM ?>
        <td data-name="UM">
<span id="el$rowindex$_pharmacy_storemast_UM" class="form-group pharmacy_storemast_UM">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UM" name="x<?= $Page->RowIndex ?>_UM" id="x<?= $Page->RowIndex ?>_UM" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_UM" data-hidden="1" name="o<?= $Page->RowIndex ?>_UM" id="o<?= $Page->RowIndex ?>_UM" value="<?= HtmlEncode($Page->UM->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->RT->Visible) { // RT ?>
        <td data-name="RT">
<span id="el$rowindex$_pharmacy_storemast_RT" class="form-group pharmacy_storemast_RT">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RT" name="x<?= $Page->RowIndex ?>_RT" id="x<?= $Page->RowIndex ?>_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_RT" data-hidden="1" name="o<?= $Page->RowIndex ?>_RT" id="o<?= $Page->RowIndex ?>_RT" value="<?= HtmlEncode($Page->RT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
        <td data-name="BATCHNO">
<span id="el$rowindex$_pharmacy_storemast_BATCHNO" class="form-group pharmacy_storemast_BATCHNO">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x<?= $Page->RowIndex ?>_BATCHNO" id="x<?= $Page->RowIndex ?>_BATCHNO" size="30" maxlength="14" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BATCHNO" data-hidden="1" name="o<?= $Page->RowIndex ?>_BATCHNO" id="o<?= $Page->RowIndex ?>_BATCHNO" value="<?= HtmlEncode($Page->BATCHNO->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MRP->Visible) { // MRP ?>
        <td data-name="MRP">
<span id="el$rowindex$_pharmacy_storemast_MRP" class="form-group pharmacy_storemast_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRP" name="x<?= $Page->RowIndex ?>_MRP" id="x<?= $Page->RowIndex ?>_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MRP" data-hidden="1" name="o<?= $Page->RowIndex ?>_MRP" id="o<?= $Page->RowIndex ?>_MRP" value="<?= HtmlEncode($Page->MRP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->EXPDT->Visible) { // EXPDT ?>
        <td data-name="EXPDT">
<span id="el$rowindex$_pharmacy_storemast_EXPDT" class="form-group pharmacy_storemast_EXPDT">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x<?= $Page->RowIndex ?>_EXPDT" id="x<?= $Page->RowIndex ?>_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastlist", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastlist", "x<?= $Page->RowIndex ?>_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_EXPDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_EXPDT" id="o<?= $Page->RowIndex ?>_EXPDT" value="<?= HtmlEncode($Page->EXPDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->GENNAME->Visible) { // GENNAME ?>
        <td data-name="GENNAME">
<span id="el$rowindex$_pharmacy_storemast_GENNAME" class="form-group pharmacy_storemast_GENNAME">
<?php
$onchange = $Page->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Page->RowIndex ?>_GENNAME" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->GENNAME->getInputTextType() ?>" class="form-control" name="sv_x<?= $Page->RowIndex ?>_GENNAME" id="sv_x<?= $Page->RowIndex ?>_GENNAME" value="<?= RemoveHtml($Page->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>"<?= $Page->GENNAME->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENNAME->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->GENNAME->ReadOnly || $Page->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_storemast" data-field="x_GENNAME" data-input="sv_x<?= $Page->RowIndex ?>_GENNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENNAME" id="x<?= $Page->RowIndex ?>_GENNAME" value="<?= HtmlEncode($Page->GENNAME->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_storemastlist"], function() {
    fpharmacy_storemastlist.createAutoSuggest(Object.assign({"id":"x<?= $Page->RowIndex ?>_GENNAME","forceSelect":false}, ew.vars.tables.pharmacy_storemast.fields.GENNAME.autoSuggestOptions));
});
</script>
<?= $Page->GENNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENNAME") ?>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_GENNAME" id="o<?= $Page->RowIndex ?>_GENNAME" value="<?= HtmlEncode($Page->GENNAME->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
        <td data-name="CREATEDDT">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_CREATEDDT" data-hidden="1" name="o<?= $Page->RowIndex ?>_CREATEDDT" id="o<?= $Page->RowIndex ?>_CREATEDDT" value="<?= HtmlEncode($Page->CREATEDDT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->DRID->Visible) { // DRID ?>
        <td data-name="DRID">
<span id="el$rowindex$_pharmacy_storemast_DRID" class="form-group pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_DRID"><?= EmptyValue(strval($Page->DRID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DRID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DRID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DRID->ReadOnly || $Page->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DRID->getErrorMessage() ?></div>
<?= $Page->DRID->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_DRID") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_DRID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DRID->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_DRID" id="x<?= $Page->RowIndex ?>_DRID" value="<?= $Page->DRID->CurrentValue ?>"<?= $Page->DRID->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_DRID" data-hidden="1" name="o<?= $Page->RowIndex ?>_DRID" id="o<?= $Page->RowIndex ?>_DRID" value="<?= HtmlEncode($Page->DRID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
        <td data-name="MFRCODE">
<span id="el$rowindex$_pharmacy_storemast_MFRCODE" class="form-group pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_MFRCODE"><?= EmptyValue(strval($Page->MFRCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->MFRCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->MFRCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->MFRCODE->ReadOnly || $Page->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
<?= $Page->MFRCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_MFRCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->MFRCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_MFRCODE" id="x<?= $Page->RowIndex ?>_MFRCODE" value="<?= $Page->MFRCODE->CurrentValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_MFRCODE" id="o<?= $Page->RowIndex ?>_MFRCODE" value="<?= HtmlEncode($Page->MFRCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
        <td data-name="COMBCODE">
<span id="el$rowindex$_pharmacy_storemast_COMBCODE" class="form-group pharmacy_storemast_COMBCODE">
<?php $Page->COMBCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_COMBCODE"><?= EmptyValue(strval($Page->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBCODE->ReadOnly || $Page->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBCODE->getErrorMessage() ?></div>
<?= $Page->COMBCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_COMBCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_COMBCODE" id="x<?= $Page->RowIndex ?>_COMBCODE" value="<?= $Page->COMBCODE->CurrentValue ?>"<?= $Page->COMBCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_COMBCODE" id="o<?= $Page->RowIndex ?>_COMBCODE" value="<?= HtmlEncode($Page->COMBCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->GENCODE->Visible) { // GENCODE ?>
        <td data-name="GENCODE">
<span id="el$rowindex$_pharmacy_storemast_GENCODE" class="form-group pharmacy_storemast_GENCODE">
<?php $Page->GENCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_GENCODE"><?= EmptyValue(strval($Page->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENCODE->ReadOnly || $Page->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENCODE->getErrorMessage() ?></div>
<?= $Page->GENCODE->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENCODE->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENCODE" id="x<?= $Page->RowIndex ?>_GENCODE" value="<?= $Page->GENCODE->CurrentValue ?>"<?= $Page->GENCODE->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENCODE" data-hidden="1" name="o<?= $Page->RowIndex ?>_GENCODE" id="o<?= $Page->RowIndex ?>_GENCODE" value="<?= HtmlEncode($Page->GENCODE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
        <td data-name="STRENGTH">
<span id="el$rowindex$_pharmacy_storemast_STRENGTH" class="form-group pharmacy_storemast_STRENGTH">
<input type="<?= $Page->STRENGTH->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x<?= $Page->RowIndex ?>_STRENGTH" id="x<?= $Page->RowIndex ?>_STRENGTH" size="30" placeholder="<?= HtmlEncode($Page->STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->STRENGTH->EditValue ?>"<?= $Page->STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STRENGTH->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_STRENGTH" data-hidden="1" name="o<?= $Page->RowIndex ?>_STRENGTH" id="o<?= $Page->RowIndex ?>_STRENGTH" value="<?= HtmlEncode($Page->STRENGTH->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->UNIT->Visible) { // UNIT ?>
        <td data-name="UNIT">
<span id="el$rowindex$_pharmacy_storemast_UNIT" class="form-group pharmacy_storemast_UNIT">
    <select
        id="x<?= $Page->RowIndex ?>_UNIT"
        name="x<?= $Page->RowIndex ?>_UNIT"
        class="form-control ew-select<?= $Page->UNIT->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT"
        data-table="pharmacy_storemast"
        data-field="x_UNIT"
        data-value-separator="<?= $Page->UNIT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->UNIT->getPlaceHolder()) ?>"
        <?= $Page->UNIT->editAttributes() ?>>
        <?= $Page->UNIT->selectOptionListHtml("x{$Page->RowIndex}_UNIT") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->UNIT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT']"),
        options = { name: "x<?= $Page->RowIndex ?>_UNIT", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_UNIT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.UNIT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.UNIT.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_UNIT" data-hidden="1" name="o<?= $Page->RowIndex ?>_UNIT" id="o<?= $Page->RowIndex ?>_UNIT" value="<?= HtmlEncode($Page->UNIT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
        <td data-name="FORMULARY">
<span id="el$rowindex$_pharmacy_storemast_FORMULARY" class="form-group pharmacy_storemast_FORMULARY">
    <select
        id="x<?= $Page->RowIndex ?>_FORMULARY"
        name="x<?= $Page->RowIndex ?>_FORMULARY"
        class="form-control ew-select<?= $Page->FORMULARY->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY"
        data-table="pharmacy_storemast"
        data-field="x_FORMULARY"
        data-value-separator="<?= $Page->FORMULARY->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FORMULARY->getPlaceHolder()) ?>"
        <?= $Page->FORMULARY->editAttributes() ?>>
        <?= $Page->FORMULARY->selectOptionListHtml("x{$Page->RowIndex}_FORMULARY") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->FORMULARY->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY']"),
        options = { name: "x<?= $Page->RowIndex ?>_FORMULARY", selectId: "pharmacy_storemast_x<?= $Page->RowIndex ?>_FORMULARY", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.FORMULARY.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.FORMULARY.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_FORMULARY" data-hidden="1" name="o<?= $Page->RowIndex ?>_FORMULARY" id="o<?= $Page->RowIndex ?>_FORMULARY" value="<?= HtmlEncode($Page->FORMULARY->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
        <td data-name="COMBNAME">
<span id="el$rowindex$_pharmacy_storemast_COMBNAME" class="form-group pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_COMBNAME"><?= EmptyValue(strval($Page->COMBNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBNAME->ReadOnly || $Page->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBNAME->getErrorMessage() ?></div>
<?= $Page->COMBNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_COMBNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_COMBNAME" id="x<?= $Page->RowIndex ?>_COMBNAME" value="<?= $Page->COMBNAME->CurrentValue ?>"<?= $Page->COMBNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_COMBNAME" id="o<?= $Page->RowIndex ?>_COMBNAME" value="<?= HtmlEncode($Page->COMBNAME->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
        <td data-name="GENERICNAME">
<span id="el$rowindex$_pharmacy_storemast_GENERICNAME" class="form-group pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Page->RowIndex ?>_GENERICNAME"><?= EmptyValue(strval($Page->GENERICNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENERICNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENERICNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENERICNAME->ReadOnly || $Page->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Page->RowIndex ?>_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENERICNAME->getErrorMessage() ?></div>
<?= $Page->GENERICNAME->Lookup->getParamTag($Page, "p_x" . $Page->RowIndex . "_GENERICNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x<?= $Page->RowIndex ?>_GENERICNAME" id="x<?= $Page->RowIndex ?>_GENERICNAME" value="<?= $Page->GENERICNAME->CurrentValue ?>"<?= $Page->GENERICNAME->editAttributes() ?>>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_GENERICNAME" id="o<?= $Page->RowIndex ?>_GENERICNAME" value="<?= HtmlEncode($Page->GENERICNAME->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->REMARK->Visible) { // REMARK ?>
        <td data-name="REMARK">
<span id="el$rowindex$_pharmacy_storemast_REMARK" class="form-group pharmacy_storemast_REMARK">
<input type="<?= $Page->REMARK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_REMARK" name="x<?= $Page->RowIndex ?>_REMARK" id="x<?= $Page->RowIndex ?>_REMARK" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->REMARK->getPlaceHolder()) ?>" value="<?= $Page->REMARK->EditValue ?>"<?= $Page->REMARK->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REMARK->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_REMARK" data-hidden="1" name="o<?= $Page->RowIndex ?>_REMARK" id="o<?= $Page->RowIndex ?>_REMARK" value="<?= HtmlEncode($Page->REMARK->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->TEMP->Visible) { // TEMP ?>
        <td data-name="TEMP">
<span id="el$rowindex$_pharmacy_storemast_TEMP" class="form-group pharmacy_storemast_TEMP">
<input type="<?= $Page->TEMP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TEMP" name="x<?= $Page->RowIndex ?>_TEMP" id="x<?= $Page->RowIndex ?>_TEMP" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->TEMP->getPlaceHolder()) ?>" value="<?= $Page->TEMP->EditValue ?>"<?= $Page->TEMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TEMP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_TEMP" data-hidden="1" name="o<?= $Page->RowIndex ?>_TEMP" id="o<?= $Page->RowIndex ?>_TEMP" value="<?= HtmlEncode($Page->TEMP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->id->Visible) { // id ?>
        <td data-name="id">
<span id="el$rowindex$_pharmacy_storemast_id" class="form-group pharmacy_storemast_id"></span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_id" data-hidden="1" name="o<?= $Page->RowIndex ?>_id" id="o<?= $Page->RowIndex ?>_id" value="<?= HtmlEncode($Page->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PurValue->Visible) { // PurValue ?>
        <td data-name="PurValue">
<span id="el$rowindex$_pharmacy_storemast_PurValue" class="form-group pharmacy_storemast_PurValue">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PurValue" name="x<?= $Page->RowIndex ?>_PurValue" id="x<?= $Page->RowIndex ?>_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PurValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_PurValue" id="o<?= $Page->RowIndex ?>_PurValue" value="<?= HtmlEncode($Page->PurValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PSGST->Visible) { // PSGST ?>
        <td data-name="PSGST">
<span id="el$rowindex$_pharmacy_storemast_PSGST" class="form-group pharmacy_storemast_PSGST">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PSGST" name="x<?= $Page->RowIndex ?>_PSGST" id="x<?= $Page->RowIndex ?>_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PSGST" id="o<?= $Page->RowIndex ?>_PSGST" value="<?= HtmlEncode($Page->PSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->PCGST->Visible) { // PCGST ?>
        <td data-name="PCGST">
<span id="el$rowindex$_pharmacy_storemast_PCGST" class="form-group pharmacy_storemast_PCGST">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PCGST" name="x<?= $Page->RowIndex ?>_PCGST" id="x<?= $Page->RowIndex ?>_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_PCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_PCGST" id="o<?= $Page->RowIndex ?>_PCGST" value="<?= HtmlEncode($Page->PCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SaleValue->Visible) { // SaleValue ?>
        <td data-name="SaleValue">
<span id="el$rowindex$_pharmacy_storemast_SaleValue" class="form-group pharmacy_storemast_SaleValue">
<input type="<?= $Page->SaleValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x<?= $Page->RowIndex ?>_SaleValue" id="x<?= $Page->RowIndex ?>_SaleValue" size="30" placeholder="<?= HtmlEncode($Page->SaleValue->getPlaceHolder()) ?>" value="<?= $Page->SaleValue->EditValue ?>"<?= $Page->SaleValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleValue->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SaleValue" data-hidden="1" name="o<?= $Page->RowIndex ?>_SaleValue" id="o<?= $Page->RowIndex ?>_SaleValue" value="<?= HtmlEncode($Page->SaleValue->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SSGST->Visible) { // SSGST ?>
        <td data-name="SSGST">
<span id="el$rowindex$_pharmacy_storemast_SSGST" class="form-group pharmacy_storemast_SSGST">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SSGST" name="x<?= $Page->RowIndex ?>_SSGST" id="x<?= $Page->RowIndex ?>_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SSGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SSGST" id="o<?= $Page->RowIndex ?>_SSGST" value="<?= HtmlEncode($Page->SSGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SCGST->Visible) { // SCGST ?>
        <td data-name="SCGST">
<span id="el$rowindex$_pharmacy_storemast_SCGST" class="form-group pharmacy_storemast_SCGST">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SCGST" name="x<?= $Page->RowIndex ?>_SCGST" id="x<?= $Page->RowIndex ?>_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SCGST" data-hidden="1" name="o<?= $Page->RowIndex ?>_SCGST" id="o<?= $Page->RowIndex ?>_SCGST" value="<?= HtmlEncode($Page->SCGST->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->SaleRate->Visible) { // SaleRate ?>
        <td data-name="SaleRate">
<span id="el$rowindex$_pharmacy_storemast_SaleRate" class="form-group pharmacy_storemast_SaleRate">
<input type="<?= $Page->SaleRate->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x<?= $Page->RowIndex ?>_SaleRate" id="x<?= $Page->RowIndex ?>_SaleRate" size="30" placeholder="<?= HtmlEncode($Page->SaleRate->getPlaceHolder()) ?>" value="<?= $Page->SaleRate->EditValue ?>"<?= $Page->SaleRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleRate->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_SaleRate" data-hidden="1" name="o<?= $Page->RowIndex ?>_SaleRate" id="o<?= $Page->RowIndex ?>_SaleRate" value="<?= HtmlEncode($Page->SaleRate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_HospID" data-hidden="1" name="o<?= $Page->RowIndex ?>_HospID" id="o<?= $Page->RowIndex ?>_HospID" value="<?= HtmlEncode($Page->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->BRNAME->Visible) { // BRNAME ?>
        <td data-name="BRNAME">
<input type="hidden" data-table="pharmacy_storemast" data-field="x_BRNAME" data-hidden="1" name="o<?= $Page->RowIndex ?>_BRNAME" id="o<?= $Page->RowIndex ?>_BRNAME" value="<?= HtmlEncode($Page->BRNAME->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Scheduling->Visible) { // Scheduling ?>
        <td data-name="Scheduling">
<span id="el$rowindex$_pharmacy_storemast_Scheduling" class="form-group pharmacy_storemast_Scheduling">
<template id="tp_x<?= $Page->RowIndex ?>_Scheduling">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_storemast" data-field="x_Scheduling" name="x<?= $Page->RowIndex ?>_Scheduling" id="x<?= $Page->RowIndex ?>_Scheduling"<?= $Page->Scheduling->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Scheduling" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Scheduling"
    name="x<?= $Page->RowIndex ?>_Scheduling"
    value="<?= HtmlEncode($Page->Scheduling->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_Scheduling"
    data-target="dsl_x<?= $Page->RowIndex ?>_Scheduling"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Scheduling->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Scheduling"
    data-value-separator="<?= $Page->Scheduling->displayValueSeparatorAttribute() ?>"
    <?= $Page->Scheduling->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Scheduling->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_Scheduling" data-hidden="1" name="o<?= $Page->RowIndex ?>_Scheduling" id="o<?= $Page->RowIndex ?>_Scheduling" value="<?= HtmlEncode($Page->Scheduling->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
        <td data-name="Schedulingh1">
<span id="el$rowindex$_pharmacy_storemast_Schedulingh1" class="form-group pharmacy_storemast_Schedulingh1">
<template id="tp_x<?= $Page->RowIndex ?>_Schedulingh1">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" name="x<?= $Page->RowIndex ?>_Schedulingh1" id="x<?= $Page->RowIndex ?>_Schedulingh1"<?= $Page->Schedulingh1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Page->RowIndex ?>_Schedulingh1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Page->RowIndex ?>_Schedulingh1"
    name="x<?= $Page->RowIndex ?>_Schedulingh1"
    value="<?= HtmlEncode($Page->Schedulingh1->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x<?= $Page->RowIndex ?>_Schedulingh1"
    data-target="dsl_x<?= $Page->RowIndex ?>_Schedulingh1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Schedulingh1->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Schedulingh1"
    data-value-separator="<?= $Page->Schedulingh1->displayValueSeparatorAttribute() ?>"
    <?= $Page->Schedulingh1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Schedulingh1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="pharmacy_storemast" data-field="x_Schedulingh1" data-hidden="1" name="o<?= $Page->RowIndex ?>_Schedulingh1" id="o<?= $Page->RowIndex ?>_Schedulingh1" value="<?= HtmlEncode($Page->Schedulingh1->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Page->ListOptions->render("body", "right", $Page->RowIndex);
?>
<script>
loadjs.ready(["fpharmacy_storemastlist","load"], function() {
    fpharmacy_storemastlist.updateLists(<?= $Page->RowIndex ?>);
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
    ew.addEventHandlers("pharmacy_storemast");
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
        container: "gmp_pharmacy_storemast",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

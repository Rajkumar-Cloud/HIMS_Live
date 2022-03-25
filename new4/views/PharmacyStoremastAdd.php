<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyStoremastAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_storemastadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacy_storemastadd = currentForm = new ew.Form("fpharmacy_storemastadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_storemast")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_storemast)
        ew.vars.tables.pharmacy_storemast = currentTable;
    fpharmacy_storemastadd.addFields([
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["TYPE", [fields.TYPE.visible && fields.TYPE.required ? ew.Validators.required(fields.TYPE.caption) : null], fields.TYPE.isInvalid],
        ["DES", [fields.DES.visible && fields.DES.required ? ew.Validators.required(fields.DES.caption) : null], fields.DES.isInvalid],
        ["UM", [fields.UM.visible && fields.UM.required ? ew.Validators.required(fields.UM.caption) : null], fields.UM.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["LASTPURDT", [fields.LASTPURDT.visible && fields.LASTPURDT.required ? ew.Validators.required(fields.LASTPURDT.caption) : null, ew.Validators.datetime(0)], fields.LASTPURDT.isInvalid],
        ["LASTSUPP", [fields.LASTSUPP.visible && fields.LASTSUPP.required ? ew.Validators.required(fields.LASTSUPP.caption) : null], fields.LASTSUPP.isInvalid],
        ["GENNAME", [fields.GENNAME.visible && fields.GENNAME.required ? ew.Validators.required(fields.GENNAME.caption) : null], fields.GENNAME.isInvalid],
        ["LASTISSDT", [fields.LASTISSDT.visible && fields.LASTISSDT.required ? ew.Validators.required(fields.LASTISSDT.caption) : null, ew.Validators.datetime(0)], fields.LASTISSDT.isInvalid],
        ["CREATEDDT", [fields.CREATEDDT.visible && fields.CREATEDDT.required ? ew.Validators.required(fields.CREATEDDT.caption) : null], fields.CREATEDDT.isInvalid],
        ["DRID", [fields.DRID.visible && fields.DRID.required ? ew.Validators.required(fields.DRID.caption) : null], fields.DRID.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["COMBCODE", [fields.COMBCODE.visible && fields.COMBCODE.required ? ew.Validators.required(fields.COMBCODE.caption) : null], fields.COMBCODE.isInvalid],
        ["GENCODE", [fields.GENCODE.visible && fields.GENCODE.required ? ew.Validators.required(fields.GENCODE.caption) : null], fields.GENCODE.isInvalid],
        ["STRENGTH", [fields.STRENGTH.visible && fields.STRENGTH.required ? ew.Validators.required(fields.STRENGTH.caption) : null, ew.Validators.float], fields.STRENGTH.isInvalid],
        ["UNIT", [fields.UNIT.visible && fields.UNIT.required ? ew.Validators.required(fields.UNIT.caption) : null], fields.UNIT.isInvalid],
        ["FORMULARY", [fields.FORMULARY.visible && fields.FORMULARY.required ? ew.Validators.required(fields.FORMULARY.caption) : null], fields.FORMULARY.isInvalid],
        ["RACKNO", [fields.RACKNO.visible && fields.RACKNO.required ? ew.Validators.required(fields.RACKNO.caption) : null], fields.RACKNO.isInvalid],
        ["SUPPNAME", [fields.SUPPNAME.visible && fields.SUPPNAME.required ? ew.Validators.required(fields.SUPPNAME.caption) : null], fields.SUPPNAME.isInvalid],
        ["COMBNAME", [fields.COMBNAME.visible && fields.COMBNAME.required ? ew.Validators.required(fields.COMBNAME.caption) : null], fields.COMBNAME.isInvalid],
        ["GENERICNAME", [fields.GENERICNAME.visible && fields.GENERICNAME.required ? ew.Validators.required(fields.GENERICNAME.caption) : null], fields.GENERICNAME.isInvalid],
        ["REMARK", [fields.REMARK.visible && fields.REMARK.required ? ew.Validators.required(fields.REMARK.caption) : null], fields.REMARK.isInvalid],
        ["TEMP", [fields.TEMP.visible && fields.TEMP.required ? ew.Validators.required(fields.TEMP.caption) : null], fields.TEMP.isInvalid],
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
        var f = fpharmacy_storemastadd,
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
    fpharmacy_storemastadd.validate = function () {
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

        // Process detail forms
        var dfs = $fobj.find("input[name='detailpage']").get();
        for (var i = 0; i < dfs.length; i++) {
            var df = dfs[i],
                val = df.value,
                frm = ew.forms.get(val);
            if (val && frm && !frm.validate())
                return false;
        }
        return true;
    }

    // Form_CustomValidate
    fpharmacy_storemastadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_storemastadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_storemastadd.lists.TYPE = <?= $Page->TYPE->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.LASTSUPP = <?= $Page->LASTSUPP->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.GENNAME = <?= $Page->GENNAME->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.DRID = <?= $Page->DRID->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.MFRCODE = <?= $Page->MFRCODE->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.COMBCODE = <?= $Page->COMBCODE->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.GENCODE = <?= $Page->GENCODE->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.UNIT = <?= $Page->UNIT->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.FORMULARY = <?= $Page->FORMULARY->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.SUPPNAME = <?= $Page->SUPPNAME->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.COMBNAME = <?= $Page->COMBNAME->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.GENERICNAME = <?= $Page->GENERICNAME->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.Scheduling = <?= $Page->Scheduling->toClientList($Page) ?>;
    fpharmacy_storemastadd.lists.Schedulingh1 = <?= $Page->Schedulingh1->toClientList($Page) ?>;
    loadjs.done("fpharmacy_storemastadd");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<?php
$Page->showMessage();
?>
<form name="fpharmacy_storemastadd" id="fpharmacy_storemastadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_pharmacy_storemast_PRC" for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?> aria-describedby="x_PRC_help">
<?= $Page->PRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
    <div id="r_TYPE" class="form-group row">
        <label id="elh_pharmacy_storemast_TYPE" for="x_TYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TYPE->caption() ?><?= $Page->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TYPE">
    <select
        id="x_TYPE"
        name="x_TYPE"
        class="form-control ew-select<?= $Page->TYPE->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x_TYPE"
        data-table="pharmacy_storemast"
        data-field="x_TYPE"
        data-value-separator="<?= $Page->TYPE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TYPE->getPlaceHolder()) ?>"
        <?= $Page->TYPE->editAttributes() ?>>
        <?= $Page->TYPE->selectOptionListHtml("x_TYPE") ?>
    </select>
    <?= $Page->TYPE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TYPE->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x_TYPE']"),
        options = { name: "x_TYPE", selectId: "pharmacy_storemast_x_TYPE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.TYPE.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.TYPE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
    <div id="r_DES" class="form-group row">
        <label id="elh_pharmacy_storemast_DES" for="x_DES" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DES->caption() ?><?= $Page->DES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DES->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DES">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?> aria-describedby="x_DES_help">
<?= $Page->DES->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
    <div id="r_UM" class="form-group row">
        <label id="elh_pharmacy_storemast_UM" for="x_UM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UM->caption() ?><?= $Page->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UM->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UM">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?> aria-describedby="x_UM_help">
<?= $Page->UM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <div id="r_RT" class="form-group row">
        <label id="elh_pharmacy_storemast_RT" for="x_RT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RT->caption() ?><?= $Page->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RT">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?> aria-describedby="x_RT_help">
<?= $Page->RT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <div id="r_BATCHNO" class="form-group row">
        <label id="elh_pharmacy_storemast_BATCHNO" for="x_BATCHNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BATCHNO->caption() ?><?= $Page->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BATCHNO">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?> aria-describedby="x_BATCHNO_help">
<?= $Page->BATCHNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label id="elh_pharmacy_storemast_MRP" for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRP->caption() ?><?= $Page->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?> aria-describedby="x_MRP_help">
<?= $Page->MRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <div id="r_EXPDT" class="form-group row">
        <label id="elh_pharmacy_storemast_EXPDT" for="x_EXPDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EXPDT->caption() ?><?= $Page->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_EXPDT">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?> aria-describedby="x_EXPDT_help">
<?= $Page->EXPDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LASTPURDT->Visible) { // LASTPURDT ?>
    <div id="r_LASTPURDT" class="form-group row">
        <label id="elh_pharmacy_storemast_LASTPURDT" for="x_LASTPURDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LASTPURDT->caption() ?><?= $Page->LASTPURDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LASTPURDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTPURDT">
<input type="<?= $Page->LASTPURDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?= HtmlEncode($Page->LASTPURDT->getPlaceHolder()) ?>" value="<?= $Page->LASTPURDT->EditValue ?>"<?= $Page->LASTPURDT->editAttributes() ?> aria-describedby="x_LASTPURDT_help">
<?= $Page->LASTPURDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LASTPURDT->getErrorMessage() ?></div>
<?php if (!$Page->LASTPURDT->ReadOnly && !$Page->LASTPURDT->Disabled && !isset($Page->LASTPURDT->EditAttrs["readonly"]) && !isset($Page->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastadd", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LASTSUPP->Visible) { // LASTSUPP ?>
    <div id="r_LASTSUPP" class="form-group row">
        <label id="elh_pharmacy_storemast_LASTSUPP" for="x_LASTSUPP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LASTSUPP->caption() ?><?= $Page->LASTSUPP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LASTSUPP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTSUPP">
<div class="input-group ew-lookup-list" aria-describedby="x_LASTSUPP_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?= EmptyValue(strval($Page->LASTSUPP->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->LASTSUPP->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->LASTSUPP->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->LASTSUPP->ReadOnly || $Page->LASTSUPP->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->LASTSUPP->getErrorMessage() ?></div>
<?= $Page->LASTSUPP->getCustomMessage() ?>
<?= $Page->LASTSUPP->Lookup->getParamTag($Page, "p_x_LASTSUPP") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?= $Page->LASTSUPP->CurrentValue ?>"<?= $Page->LASTSUPP->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <div id="r_GENNAME" class="form-group row">
        <label id="elh_pharmacy_storemast_GENNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENNAME->caption() ?><?= $Page->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENNAME">
<?php
$onchange = $Page->GENNAME->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->GENNAME->EditAttrs["onchange"] = "";
?>
<span id="as_x_GENNAME" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->GENNAME->getInputTextType() ?>" class="form-control" name="sv_x_GENNAME" id="sv_x_GENNAME" value="<?= RemoveHtml($Page->GENNAME->EditValue) ?>" size="30" maxlength="75" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>"<?= $Page->GENNAME->editAttributes() ?> aria-describedby="x_GENNAME_help">
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENNAME->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_GENNAME',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->GENNAME->ReadOnly || $Page->GENNAME->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_storemast" data-field="x_GENNAME" data-input="sv_x_GENNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?= HtmlEncode($Page->GENNAME->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->GENNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_storemastadd"], function() {
    fpharmacy_storemastadd.createAutoSuggest(Object.assign({"id":"x_GENNAME","forceSelect":false}, ew.vars.tables.pharmacy_storemast.fields.GENNAME.autoSuggestOptions));
});
</script>
<?= $Page->GENNAME->Lookup->getParamTag($Page, "p_x_GENNAME") ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LASTISSDT->Visible) { // LASTISSDT ?>
    <div id="r_LASTISSDT" class="form-group row">
        <label id="elh_pharmacy_storemast_LASTISSDT" for="x_LASTISSDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LASTISSDT->caption() ?><?= $Page->LASTISSDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LASTISSDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LASTISSDT">
<input type="<?= $Page->LASTISSDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?= HtmlEncode($Page->LASTISSDT->getPlaceHolder()) ?>" value="<?= $Page->LASTISSDT->EditValue ?>"<?= $Page->LASTISSDT->editAttributes() ?> aria-describedby="x_LASTISSDT_help">
<?= $Page->LASTISSDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LASTISSDT->getErrorMessage() ?></div>
<?php if (!$Page->LASTISSDT->ReadOnly && !$Page->LASTISSDT->Disabled && !isset($Page->LASTISSDT->EditAttrs["readonly"]) && !isset($Page->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastadd", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
    <div id="r_DRID" class="form-group row">
        <label id="elh_pharmacy_storemast_DRID" for="x_DRID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DRID->caption() ?><?= $Page->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DRID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DRID">
<div class="input-group ew-lookup-list" aria-describedby="x_DRID_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?= EmptyValue(strval($Page->DRID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DRID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DRID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DRID->ReadOnly || $Page->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DRID->getErrorMessage() ?></div>
<?= $Page->DRID->getCustomMessage() ?>
<?= $Page->DRID->Lookup->getParamTag($Page, "p_x_DRID") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_DRID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?= $Page->DRID->CurrentValue ?>"<?= $Page->DRID->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label id="elh_pharmacy_storemast_MFRCODE" for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MFRCODE->caption() ?><?= $Page->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MFRCODE">
<div class="input-group ew-lookup-list" aria-describedby="x_MFRCODE_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?= EmptyValue(strval($Page->MFRCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->MFRCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->MFRCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->MFRCODE->ReadOnly || $Page->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
<?= $Page->MFRCODE->getCustomMessage() ?>
<?= $Page->MFRCODE->Lookup->getParamTag($Page, "p_x_MFRCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?= $Page->MFRCODE->CurrentValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
    <div id="r_COMBCODE" class="form-group row">
        <label id="elh_pharmacy_storemast_COMBCODE" for="x_COMBCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->COMBCODE->caption() ?><?= $Page->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBCODE">
<?php $Page->COMBCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_COMBCODE_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?= EmptyValue(strval($Page->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBCODE->ReadOnly || $Page->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBCODE->getErrorMessage() ?></div>
<?= $Page->COMBCODE->getCustomMessage() ?>
<?= $Page->COMBCODE->Lookup->getParamTag($Page, "p_x_COMBCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?= $Page->COMBCODE->CurrentValue ?>"<?= $Page->COMBCODE->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
    <div id="r_GENCODE" class="form-group row">
        <label id="elh_pharmacy_storemast_GENCODE" for="x_GENCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENCODE->caption() ?><?= $Page->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENCODE">
<?php $Page->GENCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_GENCODE_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?= EmptyValue(strval($Page->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENCODE->ReadOnly || $Page->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENCODE->getErrorMessage() ?></div>
<?= $Page->GENCODE->getCustomMessage() ?>
<?= $Page->GENCODE->Lookup->getParamTag($Page, "p_x_GENCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?= $Page->GENCODE->CurrentValue ?>"<?= $Page->GENCODE->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
    <div id="r_STRENGTH" class="form-group row">
        <label id="elh_pharmacy_storemast_STRENGTH" for="x_STRENGTH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->STRENGTH->caption() ?><?= $Page->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STRENGTH">
<input type="<?= $Page->STRENGTH->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?= HtmlEncode($Page->STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->STRENGTH->EditValue ?>"<?= $Page->STRENGTH->editAttributes() ?> aria-describedby="x_STRENGTH_help">
<?= $Page->STRENGTH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->STRENGTH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
    <div id="r_UNIT" class="form-group row">
        <label id="elh_pharmacy_storemast_UNIT" for="x_UNIT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UNIT->caption() ?><?= $Page->UNIT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UNIT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UNIT">
    <select
        id="x_UNIT"
        name="x_UNIT"
        class="form-control ew-select<?= $Page->UNIT->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x_UNIT"
        data-table="pharmacy_storemast"
        data-field="x_UNIT"
        data-value-separator="<?= $Page->UNIT->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->UNIT->getPlaceHolder()) ?>"
        <?= $Page->UNIT->editAttributes() ?>>
        <?= $Page->UNIT->selectOptionListHtml("x_UNIT") ?>
    </select>
    <?= $Page->UNIT->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->UNIT->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x_UNIT']"),
        options = { name: "x_UNIT", selectId: "pharmacy_storemast_x_UNIT", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.UNIT.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.UNIT.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
    <div id="r_FORMULARY" class="form-group row">
        <label id="elh_pharmacy_storemast_FORMULARY" for="x_FORMULARY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FORMULARY->caption() ?><?= $Page->FORMULARY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FORMULARY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_FORMULARY">
    <select
        id="x_FORMULARY"
        name="x_FORMULARY"
        class="form-control ew-select<?= $Page->FORMULARY->isInvalidClass() ?>"
        data-select2-id="pharmacy_storemast_x_FORMULARY"
        data-table="pharmacy_storemast"
        data-field="x_FORMULARY"
        data-value-separator="<?= $Page->FORMULARY->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->FORMULARY->getPlaceHolder()) ?>"
        <?= $Page->FORMULARY->editAttributes() ?>>
        <?= $Page->FORMULARY->selectOptionListHtml("x_FORMULARY") ?>
    </select>
    <?= $Page->FORMULARY->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->FORMULARY->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_storemast_x_FORMULARY']"),
        options = { name: "x_FORMULARY", selectId: "pharmacy_storemast_x_FORMULARY", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.pharmacy_storemast.fields.FORMULARY.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_storemast.fields.FORMULARY.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RACKNO->Visible) { // RACKNO ?>
    <div id="r_RACKNO" class="form-group row">
        <label id="elh_pharmacy_storemast_RACKNO" for="x_RACKNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RACKNO->caption() ?><?= $Page->RACKNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RACKNO->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RACKNO">
<input type="<?= $Page->RACKNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->RACKNO->getPlaceHolder()) ?>" value="<?= $Page->RACKNO->EditValue ?>"<?= $Page->RACKNO->editAttributes() ?> aria-describedby="x_RACKNO_help">
<?= $Page->RACKNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RACKNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SUPPNAME->Visible) { // SUPPNAME ?>
    <div id="r_SUPPNAME" class="form-group row">
        <label id="elh_pharmacy_storemast_SUPPNAME" for="x_SUPPNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SUPPNAME->caption() ?><?= $Page->SUPPNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SUPPNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SUPPNAME">
<div class="input-group ew-lookup-list" aria-describedby="x_SUPPNAME_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?= EmptyValue(strval($Page->SUPPNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->SUPPNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->SUPPNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->SUPPNAME->ReadOnly || $Page->SUPPNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->SUPPNAME->getErrorMessage() ?></div>
<?= $Page->SUPPNAME->getCustomMessage() ?>
<?= $Page->SUPPNAME->Lookup->getParamTag($Page, "p_x_SUPPNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?= $Page->SUPPNAME->CurrentValue ?>"<?= $Page->SUPPNAME->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
    <div id="r_COMBNAME" class="form-group row">
        <label id="elh_pharmacy_storemast_COMBNAME" for="x_COMBNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->COMBNAME->caption() ?><?= $Page->COMBNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COMBNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBNAME">
<div class="input-group ew-lookup-list" aria-describedby="x_COMBNAME_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?= EmptyValue(strval($Page->COMBNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBNAME->ReadOnly || $Page->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBNAME->getErrorMessage() ?></div>
<?= $Page->COMBNAME->getCustomMessage() ?>
<?= $Page->COMBNAME->Lookup->getParamTag($Page, "p_x_COMBNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?= $Page->COMBNAME->CurrentValue ?>"<?= $Page->COMBNAME->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
    <div id="r_GENERICNAME" class="form-group row">
        <label id="elh_pharmacy_storemast_GENERICNAME" for="x_GENERICNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENERICNAME->caption() ?><?= $Page->GENERICNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENERICNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENERICNAME">
<div class="input-group ew-lookup-list" aria-describedby="x_GENERICNAME_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?= EmptyValue(strval($Page->GENERICNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENERICNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENERICNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENERICNAME->ReadOnly || $Page->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENERICNAME->getErrorMessage() ?></div>
<?= $Page->GENERICNAME->getCustomMessage() ?>
<?= $Page->GENERICNAME->Lookup->getParamTag($Page, "p_x_GENERICNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?= $Page->GENERICNAME->CurrentValue ?>"<?= $Page->GENERICNAME->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
    <div id="r_REMARK" class="form-group row">
        <label id="elh_pharmacy_storemast_REMARK" for="x_REMARK" class="<?= $Page->LeftColumnClass ?>"><?= $Page->REMARK->caption() ?><?= $Page->REMARK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->REMARK->cellAttributes() ?>>
<span id="el_pharmacy_storemast_REMARK">
<input type="<?= $Page->REMARK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->REMARK->getPlaceHolder()) ?>" value="<?= $Page->REMARK->EditValue ?>"<?= $Page->REMARK->editAttributes() ?> aria-describedby="x_REMARK_help">
<?= $Page->REMARK->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->REMARK->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
    <div id="r_TEMP" class="form-group row">
        <label id="elh_pharmacy_storemast_TEMP" for="x_TEMP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TEMP->caption() ?><?= $Page->TEMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TEMP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TEMP">
<input type="<?= $Page->TEMP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->TEMP->getPlaceHolder()) ?>" value="<?= $Page->TEMP->EditValue ?>"<?= $Page->TEMP->editAttributes() ?> aria-describedby="x_TEMP_help">
<?= $Page->TEMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TEMP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <div id="r_PurValue" class="form-group row">
        <label id="elh_pharmacy_storemast_PurValue" for="x_PurValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PurValue->caption() ?><?= $Page->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PurValue">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?> aria-describedby="x_PurValue_help">
<?= $Page->PurValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label id="elh_pharmacy_storemast_PSGST" for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PSGST->caption() ?><?= $Page->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PSGST">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?> aria-describedby="x_PSGST_help">
<?= $Page->PSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label id="elh_pharmacy_storemast_PCGST" for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PCGST->caption() ?><?= $Page->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PCGST">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?> aria-describedby="x_PCGST_help">
<?= $Page->PCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
    <div id="r_SaleValue" class="form-group row">
        <label id="elh_pharmacy_storemast_SaleValue" for="x_SaleValue" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SaleValue->caption() ?><?= $Page->SaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SaleValue->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleValue">
<input type="<?= $Page->SaleValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?= HtmlEncode($Page->SaleValue->getPlaceHolder()) ?>" value="<?= $Page->SaleValue->EditValue ?>"<?= $Page->SaleValue->editAttributes() ?> aria-describedby="x_SaleValue_help">
<?= $Page->SaleValue->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SaleValue->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label id="elh_pharmacy_storemast_SSGST" for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SSGST->caption() ?><?= $Page->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SSGST">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?> aria-describedby="x_SSGST_help">
<?= $Page->SSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label id="elh_pharmacy_storemast_SCGST" for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SCGST->caption() ?><?= $Page->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SCGST">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?> aria-describedby="x_SCGST_help">
<?= $Page->SCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
    <div id="r_SaleRate" class="form-group row">
        <label id="elh_pharmacy_storemast_SaleRate" for="x_SaleRate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SaleRate->caption() ?><?= $Page->SaleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SaleRate->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SaleRate">
<input type="<?= $Page->SaleRate->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?= HtmlEncode($Page->SaleRate->getPlaceHolder()) ?>" value="<?= $Page->SaleRate->EditValue ?>"<?= $Page->SaleRate->editAttributes() ?> aria-describedby="x_SaleRate_help">
<?= $Page->SaleRate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SaleRate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Scheduling->Visible) { // Scheduling ?>
    <div id="r_Scheduling" class="form-group row">
        <label id="elh_pharmacy_storemast_Scheduling" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Scheduling->caption() ?><?= $Page->Scheduling->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Scheduling->cellAttributes() ?>>
<span id="el_pharmacy_storemast_Scheduling">
<template id="tp_x_Scheduling">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_storemast" data-field="x_Scheduling" name="x_Scheduling" id="x_Scheduling"<?= $Page->Scheduling->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Scheduling" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Scheduling"
    name="x_Scheduling"
    value="<?= HtmlEncode($Page->Scheduling->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Scheduling"
    data-target="dsl_x_Scheduling"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Scheduling->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Scheduling"
    data-value-separator="<?= $Page->Scheduling->displayValueSeparatorAttribute() ?>"
    <?= $Page->Scheduling->editAttributes() ?>>
<?= $Page->Scheduling->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Scheduling->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
    <div id="r_Schedulingh1" class="form-group row">
        <label id="elh_pharmacy_storemast_Schedulingh1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Schedulingh1->caption() ?><?= $Page->Schedulingh1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Schedulingh1->cellAttributes() ?>>
<span id="el_pharmacy_storemast_Schedulingh1">
<template id="tp_x_Schedulingh1">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="pharmacy_storemast" data-field="x_Schedulingh1" name="x_Schedulingh1" id="x_Schedulingh1"<?= $Page->Schedulingh1->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_Schedulingh1" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_Schedulingh1"
    name="x_Schedulingh1"
    value="<?= HtmlEncode($Page->Schedulingh1->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_Schedulingh1"
    data-target="dsl_x_Schedulingh1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Schedulingh1->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Schedulingh1"
    data-value-separator="<?= $Page->Schedulingh1->displayValueSeparatorAttribute() ?>"
    <?= $Page->Schedulingh1->editAttributes() ?>>
<?= $Page->Schedulingh1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Schedulingh1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$Page->showPageFooter();
echo GetDebugMessage();
?>
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

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBatchmasSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_batchmassearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fpharmacy_batchmassearch = currentAdvancedSearchForm = new ew.Form("fpharmacy_batchmassearch", "search");
    <?php } else { ?>
    fpharmacy_batchmassearch = currentForm = new ew.Form("fpharmacy_batchmassearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_batchmas")) ?>,
        fields = currentTable.fields;
    fpharmacy_batchmassearch.addFields([
        ["PRC", [], fields.PRC.isInvalid],
        ["PrName", [], fields.PrName.isInvalid],
        ["BATCHNO", [], fields.BATCHNO.isInvalid],
        ["BATCH", [], fields.BATCH.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["EXPDT", [ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["y_EXPDT", [ew.Validators.between], false],
        ["PRCODE", [], fields.PRCODE.isInvalid],
        ["OQ", [ew.Validators.float], fields.OQ.isInvalid],
        ["RQ", [ew.Validators.float], fields.RQ.isInvalid],
        ["FRQ", [ew.Validators.float], fields.FRQ.isInvalid],
        ["IQ", [ew.Validators.float], fields.IQ.isInvalid],
        ["MRQ", [ew.Validators.float], fields.MRQ.isInvalid],
        ["MRP", [ew.Validators.float], fields.MRP.isInvalid],
        ["UR", [ew.Validators.float], fields.UR.isInvalid],
        ["PC", [], fields.PC.isInvalid],
        ["OLDRT", [ew.Validators.float], fields.OLDRT.isInvalid],
        ["TEMPMRQ", [ew.Validators.float], fields.TEMPMRQ.isInvalid],
        ["TAXP", [ew.Validators.float], fields.TAXP.isInvalid],
        ["OLDRATE", [ew.Validators.float], fields.OLDRATE.isInvalid],
        ["NEWRATE", [ew.Validators.float], fields.NEWRATE.isInvalid],
        ["OTEMPMRA", [ew.Validators.float], fields.OTEMPMRA.isInvalid],
        ["ACTIVESTATUS", [], fields.ACTIVESTATUS.isInvalid],
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["PSGST", [], fields.PSGST.isInvalid],
        ["PCGST", [], fields.PCGST.isInvalid],
        ["SSGST", [], fields.SSGST.isInvalid],
        ["SCGST", [], fields.SCGST.isInvalid],
        ["RT", [ew.Validators.float], fields.RT.isInvalid],
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["UM", [], fields.UM.isInvalid],
        ["GENNAME", [], fields.GENNAME.isInvalid],
        ["BILLDATE", [ew.Validators.datetime(0)], fields.BILLDATE.isInvalid],
        ["PUnit", [ew.Validators.integer], fields.PUnit.isInvalid],
        ["SUnit", [ew.Validators.integer], fields.SUnit.isInvalid],
        ["PurValue", [ew.Validators.float], fields.PurValue.isInvalid],
        ["PurRate", [ew.Validators.float], fields.PurRate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpharmacy_batchmassearch.setInvalid();
    });

    // Validate form
    fpharmacy_batchmassearch.validate = function () {
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
    fpharmacy_batchmassearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_batchmassearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_batchmassearch.lists.PrName = <?= $Page->PrName->toClientList($Page) ?>;
    fpharmacy_batchmassearch.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    loadjs.done("fpharmacy_batchmassearch");
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
<form name="fpharmacy_batchmassearch" id="fpharmacy_batchmassearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_batchmas">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRC"><?= $Page->PRC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PRC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="4" maxlength="8" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PrName"><?= $Page->PrName->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PrName" id="z_PrName" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PrName" class="ew-search-field ew-search-field-single">
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
loadjs.ready(["fpharmacy_batchmassearch"], function() {
    fpharmacy_batchmassearch.createAutoSuggest(Object.assign({"id":"x_PrName","forceSelect":true}, ew.vars.tables.pharmacy_batchmas.fields.PrName.autoSuggestOptions));
});
</script>
<?= $Page->PrName->Lookup->getParamTag($Page, "p_x_PrName") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <div id="r_BATCHNO" class="form-group row">
        <label for="x_BATCHNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCHNO"><?= $Page->BATCHNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCHNO->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_BATCHNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
    <div id="r_BATCH" class="form-group row">
        <label for="x_BATCH" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BATCH"><?= $Page->BATCH->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCH" id="z_BATCH" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCH->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_BATCH" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BATCH->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCH->getPlaceHolder()) ?>" value="<?= $Page->BATCH->EditValue ?>"<?= $Page->BATCH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCH->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MFRCODE"><?= $Page->MFRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_MFRCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <div id="r_EXPDT" class="form-group row">
        <label for="x_EXPDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_EXPDT"><?= $Page->EXPDT->caption() ?></span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EXPDT->cellAttributes() ?>>
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
loadjs.ready(["fpharmacy_batchmassearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmassearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
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
loadjs.ready(["fpharmacy_batchmassearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmassearch", "y_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
    <div id="r_PRCODE" class="form-group row">
        <label for="x_PRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PRCODE"><?= $Page->PRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRCODE" id="z_PRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRCODE->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PRCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PRCODE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRCODE->getPlaceHolder()) ?>" value="<?= $Page->PRCODE->EditValue ?>"<?= $Page->PRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
    <div id="r_OQ" class="form-group row">
        <label for="x_OQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OQ"><?= $Page->OQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OQ" id="z_OQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OQ->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_OQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_OQ" name="x_OQ" id="x_OQ" size="6" maxlength="6" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
    <div id="r_RQ" class="form-group row">
        <label for="x_RQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RQ"><?= $Page->RQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RQ" id="z_RQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RQ->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_RQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->FRQ->Visible) { // FRQ ?>
    <div id="r_FRQ" class="form-group row">
        <label for="x_FRQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_FRQ"><?= $Page->FRQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_FRQ" id="z_FRQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FRQ->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_FRQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->FRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_FRQ" name="x_FRQ" id="x_FRQ" size="30" placeholder="<?= HtmlEncode($Page->FRQ->getPlaceHolder()) ?>" value="<?= $Page->FRQ->EditValue ?>"<?= $Page->FRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->FRQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <div id="r_IQ" class="form-group row">
        <label for="x_IQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_IQ"><?= $Page->IQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_IQ" id="z_IQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IQ->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_IQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <div id="r_MRQ" class="form-group row">
        <label for="x_MRQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRQ"><?= $Page->MRQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_MRQ" id="z_MRQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRQ->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_MRQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_MRP"><?= $Page->MRP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_MRP" id="z_MRP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_MRP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_MRP" name="x_MRP" id="x_MRP" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
    <div id="r_UR" class="form-group row">
        <label for="x_UR" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UR"><?= $Page->UR->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_UR" id="z_UR" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UR->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_UR" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_UR" name="x_UR" id="x_UR" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label for="x_PC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PC"><?= $Page->PC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PC" id="z_PC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PC->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->PC->getPlaceHolder()) ?>" value="<?= $Page->PC->EditValue ?>"<?= $Page->PC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
    <div id="r_OLDRT" class="form-group row">
        <label for="x_OLDRT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRT"><?= $Page->OLDRT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OLDRT" id="z_OLDRT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDRT->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_OLDRT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OLDRT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?= HtmlEncode($Page->OLDRT->getPlaceHolder()) ?>" value="<?= $Page->OLDRT->EditValue ?>"<?= $Page->OLDRT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OLDRT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
    <div id="r_TEMPMRQ" class="form-group row">
        <label for="x_TEMPMRQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TEMPMRQ"><?= $Page->TEMPMRQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TEMPMRQ" id="z_TEMPMRQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TEMPMRQ->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_TEMPMRQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TEMPMRQ->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?= HtmlEncode($Page->TEMPMRQ->getPlaceHolder()) ?>" value="<?= $Page->TEMPMRQ->EditValue ?>"<?= $Page->TEMPMRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TEMPMRQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
    <div id="r_TAXP" class="form-group row">
        <label for="x_TAXP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_TAXP"><?= $Page->TAXP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TAXP" id="z_TAXP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXP->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_TAXP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TAXP->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?= HtmlEncode($Page->TAXP->getPlaceHolder()) ?>" value="<?= $Page->TAXP->EditValue ?>"<?= $Page->TAXP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TAXP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
    <div id="r_OLDRATE" class="form-group row">
        <label for="x_OLDRATE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OLDRATE"><?= $Page->OLDRATE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OLDRATE" id="z_OLDRATE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDRATE->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_OLDRATE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OLDRATE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?= HtmlEncode($Page->OLDRATE->getPlaceHolder()) ?>" value="<?= $Page->OLDRATE->EditValue ?>"<?= $Page->OLDRATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OLDRATE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
    <div id="r_NEWRATE" class="form-group row">
        <label for="x_NEWRATE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_NEWRATE"><?= $Page->NEWRATE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_NEWRATE" id="z_NEWRATE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWRATE->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_NEWRATE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NEWRATE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?= HtmlEncode($Page->NEWRATE->getPlaceHolder()) ?>" value="<?= $Page->NEWRATE->EditValue ?>"<?= $Page->NEWRATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NEWRATE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
    <div id="r_OTEMPMRA" class="form-group row">
        <label for="x_OTEMPMRA" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_OTEMPMRA"><?= $Page->OTEMPMRA->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OTEMPMRA" id="z_OTEMPMRA" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OTEMPMRA->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_OTEMPMRA" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OTEMPMRA->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?= HtmlEncode($Page->OTEMPMRA->getPlaceHolder()) ?>" value="<?= $Page->OTEMPMRA->EditValue ?>"<?= $Page->OTEMPMRA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OTEMPMRA->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
    <div id="r_ACTIVESTATUS" class="form-group row">
        <label for="x_ACTIVESTATUS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_ACTIVESTATUS"><?= $Page->ACTIVESTATUS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ACTIVESTATUS" id="z_ACTIVESTATUS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ACTIVESTATUS->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_ACTIVESTATUS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ACTIVESTATUS->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?= HtmlEncode($Page->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?= $Page->ACTIVESTATUS->EditValue ?>"<?= $Page->ACTIVESTATUS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ACTIVESTATUS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PSGST"><?= $Page->PSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PSGST" id="z_PSGST" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PCGST"><?= $Page->PCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PCGST" id="z_PCGST" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SSGST"><?= $Page->SSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_SSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SCGST"><?= $Page->SCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_SCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="4" maxlength="4" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <div id="r_RT" class="form-group row">
        <label for="x_RT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_RT"><?= $Page->RT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RT" id="z_RT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RT->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_RT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_RT" name="x_RT" id="x_RT" size="8" maxlength="8" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BRCODE"><?= $Page->BRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_BRCODE" class="ew-search-field ew-search-field-single">
    <select
        id="x_BRCODE"
        name="x_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="pharmacy_batchmas_x_BRCODE"
        data-table="pharmacy_batchmas"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x_BRCODE") ?>
    </select>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage(false) ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_batchmas_x_BRCODE']"),
        options = { name: "x_BRCODE", selectId: "pharmacy_batchmas_x_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_batchmas.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
    <div id="r_UM" class="form-group row">
        <label for="x_UM" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_UM"><?= $Page->UM->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UM" id="z_UM" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UM->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_UM" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <div id="r_GENNAME" class="form-group row">
        <label for="x_GENNAME" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_GENNAME"><?= $Page->GENNAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENNAME->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_GENNAME" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->GENNAME->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="150" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" value="<?= $Page->GENNAME->EditValue ?>"<?= $Page->GENNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLDATE->Visible) { // BILLDATE ?>
    <div id="r_BILLDATE" class="form-group row">
        <label for="x_BILLDATE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_BILLDATE"><?= $Page->BILLDATE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_BILLDATE" id="z_BILLDATE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLDATE->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_BILLDATE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BILLDATE->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_BILLDATE" name="x_BILLDATE" id="x_BILLDATE" placeholder="<?= HtmlEncode($Page->BILLDATE->getPlaceHolder()) ?>" value="<?= $Page->BILLDATE->EditValue ?>"<?= $Page->BILLDATE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BILLDATE->getErrorMessage(false) ?></div>
<?php if (!$Page->BILLDATE->ReadOnly && !$Page->BILLDATE->Disabled && !isset($Page->BILLDATE->EditAttrs["readonly"]) && !isset($Page->BILLDATE->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_batchmassearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_batchmassearch", "x_BILLDATE", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PUnit->Visible) { // PUnit ?>
    <div id="r_PUnit" class="form-group row">
        <label for="x_PUnit" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PUnit"><?= $Page->PUnit->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PUnit" id="z_PUnit" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PUnit->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PUnit" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PUnit->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PUnit" name="x_PUnit" id="x_PUnit" size="30" placeholder="<?= HtmlEncode($Page->PUnit->getPlaceHolder()) ?>" value="<?= $Page->PUnit->EditValue ?>"<?= $Page->PUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PUnit->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SUnit->Visible) { // SUnit ?>
    <div id="r_SUnit" class="form-group row">
        <label for="x_SUnit" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_SUnit"><?= $Page->SUnit->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SUnit" id="z_SUnit" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SUnit->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_SUnit" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SUnit->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_SUnit" name="x_SUnit" id="x_SUnit" size="30" placeholder="<?= HtmlEncode($Page->SUnit->getPlaceHolder()) ?>" value="<?= $Page->SUnit->EditValue ?>"<?= $Page->SUnit->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SUnit->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <div id="r_PurValue" class="form-group row">
        <label for="x_PurValue" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PurValue"><?= $Page->PurValue->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PurValue" id="z_PurValue" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurValue->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PurValue" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurRate->Visible) { // PurRate ?>
    <div id="r_PurRate" class="form-group row">
        <label for="x_PurRate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_batchmas_PurRate"><?= $Page->PurRate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PurRate" id="z_PurRate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurRate->cellAttributes() ?>>
            <span id="el_pharmacy_batchmas_PurRate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurRate->getInputTextType() ?>" data-table="pharmacy_batchmas" data-field="x_PurRate" name="x_PurRate" id="x_PurRate" size="30" placeholder="<?= HtmlEncode($Page->PurRate->getPlaceHolder()) ?>" value="<?= $Page->PurRate->EditValue ?>"<?= $Page->PurRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurRate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
        <button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("Search") ?></button>
        <button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="location.reload();"><?= $Language->phrase("Reset") ?></button>
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
    ew.addEventHandlers("pharmacy_batchmas");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

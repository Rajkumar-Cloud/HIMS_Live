<?php

namespace PHPMaker2021\project3;

// Page object
$StoreBatchmasAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_batchmasadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fstore_batchmasadd = currentForm = new ew.Form("fstore_batchmasadd", "add");

    // Add fields
    var fields = ew.vars.tables.store_batchmas.fields;
    fstore_batchmasadd.addFields([
        ["PRC", [fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["BATCHNO", [fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["OQ", [fields.OQ.required ? ew.Validators.required(fields.OQ.caption) : null, ew.Validators.float], fields.OQ.isInvalid],
        ["RQ", [fields.RQ.required ? ew.Validators.required(fields.RQ.caption) : null, ew.Validators.float], fields.RQ.isInvalid],
        ["MRQ", [fields.MRQ.required ? ew.Validators.required(fields.MRQ.caption) : null, ew.Validators.float], fields.MRQ.isInvalid],
        ["IQ", [fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["MRP", [fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["EXPDT", [fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["UR", [fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["RT", [fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["PRCODE", [fields.PRCODE.required ? ew.Validators.required(fields.PRCODE.caption) : null], fields.PRCODE.isInvalid],
        ["BATCH", [fields.BATCH.required ? ew.Validators.required(fields.BATCH.caption) : null], fields.BATCH.isInvalid],
        ["PC", [fields.PC.required ? ew.Validators.required(fields.PC.caption) : null], fields.PC.isInvalid],
        ["OLDRT", [fields.OLDRT.required ? ew.Validators.required(fields.OLDRT.caption) : null, ew.Validators.float], fields.OLDRT.isInvalid],
        ["TEMPMRQ", [fields.TEMPMRQ.required ? ew.Validators.required(fields.TEMPMRQ.caption) : null, ew.Validators.float], fields.TEMPMRQ.isInvalid],
        ["TAXP", [fields.TAXP.required ? ew.Validators.required(fields.TAXP.caption) : null, ew.Validators.float], fields.TAXP.isInvalid],
        ["OLDRATE", [fields.OLDRATE.required ? ew.Validators.required(fields.OLDRATE.caption) : null, ew.Validators.float], fields.OLDRATE.isInvalid],
        ["NEWRATE", [fields.NEWRATE.required ? ew.Validators.required(fields.NEWRATE.caption) : null, ew.Validators.float], fields.NEWRATE.isInvalid],
        ["OTEMPMRA", [fields.OTEMPMRA.required ? ew.Validators.required(fields.OTEMPMRA.caption) : null, ew.Validators.float], fields.OTEMPMRA.isInvalid],
        ["ACTIVESTATUS", [fields.ACTIVESTATUS.required ? ew.Validators.required(fields.ACTIVESTATUS.caption) : null], fields.ACTIVESTATUS.isInvalid],
        ["PrName", [fields.PrName.required ? ew.Validators.required(fields.PrName.caption) : null], fields.PrName.isInvalid],
        ["PSGST", [fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null, ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null, ew.Validators.float], fields.PCGST.isInvalid],
        ["SSGST", [fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null, ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null, ew.Validators.float], fields.SCGST.isInvalid],
        ["MFRCODE", [fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["BRCODE", [fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null, ew.Validators.integer], fields.BRCODE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fstore_batchmasadd,
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
    fstore_batchmasadd.validate = function () {
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
    fstore_batchmasadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fstore_batchmasadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fstore_batchmasadd");
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
<form name="fstore_batchmasadd" id="fstore_batchmasadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_batchmas">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_store_batchmas_PRC" for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_store_batchmas_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="store_batchmas" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?> aria-describedby="x_PRC_help">
<?= $Page->PRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <div id="r_BATCHNO" class="form-group row">
        <label id="elh_store_batchmas_BATCHNO" for="x_BATCHNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BATCHNO->caption() ?><?= $Page->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el_store_batchmas_BATCHNO">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="store_batchmas" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?> aria-describedby="x_BATCHNO_help">
<?= $Page->BATCHNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
    <div id="r_OQ" class="form-group row">
        <label id="elh_store_batchmas_OQ" for="x_OQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OQ->caption() ?><?= $Page->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OQ->cellAttributes() ?>>
<span id="el_store_batchmas_OQ">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="store_batchmas" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?> aria-describedby="x_OQ_help">
<?= $Page->OQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
    <div id="r_RQ" class="form-group row">
        <label id="elh_store_batchmas_RQ" for="x_RQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RQ->caption() ?><?= $Page->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RQ->cellAttributes() ?>>
<span id="el_store_batchmas_RQ">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="store_batchmas" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?> aria-describedby="x_RQ_help">
<?= $Page->RQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <div id="r_MRQ" class="form-group row">
        <label id="elh_store_batchmas_MRQ" for="x_MRQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRQ->caption() ?><?= $Page->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRQ->cellAttributes() ?>>
<span id="el_store_batchmas_MRQ">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="store_batchmas" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?> aria-describedby="x_MRQ_help">
<?= $Page->MRQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <div id="r_IQ" class="form-group row">
        <label id="elh_store_batchmas_IQ" for="x_IQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IQ->caption() ?><?= $Page->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IQ->cellAttributes() ?>>
<span id="el_store_batchmas_IQ">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="store_batchmas" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?> aria-describedby="x_IQ_help">
<?= $Page->IQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label id="elh_store_batchmas_MRP" for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRP->caption() ?><?= $Page->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
<span id="el_store_batchmas_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="store_batchmas" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?> aria-describedby="x_MRP_help">
<?= $Page->MRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <div id="r_EXPDT" class="form-group row">
        <label id="elh_store_batchmas_EXPDT" for="x_EXPDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EXPDT->caption() ?><?= $Page->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el_store_batchmas_EXPDT">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="store_batchmas" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?> aria-describedby="x_EXPDT_help">
<?= $Page->EXPDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_batchmasadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_batchmasadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
    <div id="r_UR" class="form-group row">
        <label id="elh_store_batchmas_UR" for="x_UR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UR->caption() ?><?= $Page->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UR->cellAttributes() ?>>
<span id="el_store_batchmas_UR">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="store_batchmas" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?> aria-describedby="x_UR_help">
<?= $Page->UR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <div id="r_RT" class="form-group row">
        <label id="elh_store_batchmas_RT" for="x_RT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RT->caption() ?><?= $Page->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RT->cellAttributes() ?>>
<span id="el_store_batchmas_RT">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="store_batchmas" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?> aria-describedby="x_RT_help">
<?= $Page->RT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
    <div id="r_PRCODE" class="form-group row">
        <label id="elh_store_batchmas_PRCODE" for="x_PRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRCODE->caption() ?><?= $Page->PRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_PRCODE">
<input type="<?= $Page->PRCODE->getInputTextType() ?>" data-table="store_batchmas" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRCODE->getPlaceHolder()) ?>" value="<?= $Page->PRCODE->EditValue ?>"<?= $Page->PRCODE->editAttributes() ?> aria-describedby="x_PRCODE_help">
<?= $Page->PRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCH->Visible) { // BATCH ?>
    <div id="r_BATCH" class="form-group row">
        <label id="elh_store_batchmas_BATCH" for="x_BATCH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BATCH->caption() ?><?= $Page->BATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCH->cellAttributes() ?>>
<span id="el_store_batchmas_BATCH">
<input type="<?= $Page->BATCH->getInputTextType() ?>" data-table="store_batchmas" data-field="x_BATCH" name="x_BATCH" id="x_BATCH" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCH->getPlaceHolder()) ?>" value="<?= $Page->BATCH->EditValue ?>"<?= $Page->BATCH->editAttributes() ?> aria-describedby="x_BATCH_help">
<?= $Page->BATCH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BATCH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_store_batchmas_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<span id="el_store_batchmas_PC">
<input type="<?= $Page->PC->getInputTextType() ?>" data-table="store_batchmas" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->PC->getPlaceHolder()) ?>" value="<?= $Page->PC->EditValue ?>"<?= $Page->PC->editAttributes() ?> aria-describedby="x_PC_help">
<?= $Page->PC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDRT->Visible) { // OLDRT ?>
    <div id="r_OLDRT" class="form-group row">
        <label id="elh_store_batchmas_OLDRT" for="x_OLDRT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OLDRT->caption() ?><?= $Page->OLDRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDRT->cellAttributes() ?>>
<span id="el_store_batchmas_OLDRT">
<input type="<?= $Page->OLDRT->getInputTextType() ?>" data-table="store_batchmas" data-field="x_OLDRT" name="x_OLDRT" id="x_OLDRT" size="30" placeholder="<?= HtmlEncode($Page->OLDRT->getPlaceHolder()) ?>" value="<?= $Page->OLDRT->EditValue ?>"<?= $Page->OLDRT->editAttributes() ?> aria-describedby="x_OLDRT_help">
<?= $Page->OLDRT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OLDRT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TEMPMRQ->Visible) { // TEMPMRQ ?>
    <div id="r_TEMPMRQ" class="form-group row">
        <label id="elh_store_batchmas_TEMPMRQ" for="x_TEMPMRQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TEMPMRQ->caption() ?><?= $Page->TEMPMRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TEMPMRQ->cellAttributes() ?>>
<span id="el_store_batchmas_TEMPMRQ">
<input type="<?= $Page->TEMPMRQ->getInputTextType() ?>" data-table="store_batchmas" data-field="x_TEMPMRQ" name="x_TEMPMRQ" id="x_TEMPMRQ" size="30" placeholder="<?= HtmlEncode($Page->TEMPMRQ->getPlaceHolder()) ?>" value="<?= $Page->TEMPMRQ->EditValue ?>"<?= $Page->TEMPMRQ->editAttributes() ?> aria-describedby="x_TEMPMRQ_help">
<?= $Page->TEMPMRQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TEMPMRQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
    <div id="r_TAXP" class="form-group row">
        <label id="elh_store_batchmas_TAXP" for="x_TAXP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TAXP->caption() ?><?= $Page->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXP->cellAttributes() ?>>
<span id="el_store_batchmas_TAXP">
<input type="<?= $Page->TAXP->getInputTextType() ?>" data-table="store_batchmas" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?= HtmlEncode($Page->TAXP->getPlaceHolder()) ?>" value="<?= $Page->TAXP->EditValue ?>"<?= $Page->TAXP->editAttributes() ?> aria-describedby="x_TAXP_help">
<?= $Page->TAXP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TAXP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDRATE->Visible) { // OLDRATE ?>
    <div id="r_OLDRATE" class="form-group row">
        <label id="elh_store_batchmas_OLDRATE" for="x_OLDRATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OLDRATE->caption() ?><?= $Page->OLDRATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDRATE->cellAttributes() ?>>
<span id="el_store_batchmas_OLDRATE">
<input type="<?= $Page->OLDRATE->getInputTextType() ?>" data-table="store_batchmas" data-field="x_OLDRATE" name="x_OLDRATE" id="x_OLDRATE" size="30" placeholder="<?= HtmlEncode($Page->OLDRATE->getPlaceHolder()) ?>" value="<?= $Page->OLDRATE->EditValue ?>"<?= $Page->OLDRATE->editAttributes() ?> aria-describedby="x_OLDRATE_help">
<?= $Page->OLDRATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OLDRATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWRATE->Visible) { // NEWRATE ?>
    <div id="r_NEWRATE" class="form-group row">
        <label id="elh_store_batchmas_NEWRATE" for="x_NEWRATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NEWRATE->caption() ?><?= $Page->NEWRATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWRATE->cellAttributes() ?>>
<span id="el_store_batchmas_NEWRATE">
<input type="<?= $Page->NEWRATE->getInputTextType() ?>" data-table="store_batchmas" data-field="x_NEWRATE" name="x_NEWRATE" id="x_NEWRATE" size="30" placeholder="<?= HtmlEncode($Page->NEWRATE->getPlaceHolder()) ?>" value="<?= $Page->NEWRATE->EditValue ?>"<?= $Page->NEWRATE->editAttributes() ?> aria-describedby="x_NEWRATE_help">
<?= $Page->NEWRATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NEWRATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OTEMPMRA->Visible) { // OTEMPMRA ?>
    <div id="r_OTEMPMRA" class="form-group row">
        <label id="elh_store_batchmas_OTEMPMRA" for="x_OTEMPMRA" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OTEMPMRA->caption() ?><?= $Page->OTEMPMRA->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OTEMPMRA->cellAttributes() ?>>
<span id="el_store_batchmas_OTEMPMRA">
<input type="<?= $Page->OTEMPMRA->getInputTextType() ?>" data-table="store_batchmas" data-field="x_OTEMPMRA" name="x_OTEMPMRA" id="x_OTEMPMRA" size="30" placeholder="<?= HtmlEncode($Page->OTEMPMRA->getPlaceHolder()) ?>" value="<?= $Page->OTEMPMRA->EditValue ?>"<?= $Page->OTEMPMRA->editAttributes() ?> aria-describedby="x_OTEMPMRA_help">
<?= $Page->OTEMPMRA->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OTEMPMRA->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ACTIVESTATUS->Visible) { // ACTIVESTATUS ?>
    <div id="r_ACTIVESTATUS" class="form-group row">
        <label id="elh_store_batchmas_ACTIVESTATUS" for="x_ACTIVESTATUS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ACTIVESTATUS->caption() ?><?= $Page->ACTIVESTATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ACTIVESTATUS->cellAttributes() ?>>
<span id="el_store_batchmas_ACTIVESTATUS">
<input type="<?= $Page->ACTIVESTATUS->getInputTextType() ?>" data-table="store_batchmas" data-field="x_ACTIVESTATUS" name="x_ACTIVESTATUS" id="x_ACTIVESTATUS" size="30" maxlength="99" placeholder="<?= HtmlEncode($Page->ACTIVESTATUS->getPlaceHolder()) ?>" value="<?= $Page->ACTIVESTATUS->EditValue ?>"<?= $Page->ACTIVESTATUS->editAttributes() ?> aria-describedby="x_ACTIVESTATUS_help">
<?= $Page->ACTIVESTATUS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ACTIVESTATUS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PrName->Visible) { // PrName ?>
    <div id="r_PrName" class="form-group row">
        <label id="elh_store_batchmas_PrName" for="x_PrName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PrName->caption() ?><?= $Page->PrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PrName->cellAttributes() ?>>
<span id="el_store_batchmas_PrName">
<input type="<?= $Page->PrName->getInputTextType() ?>" data-table="store_batchmas" data-field="x_PrName" name="x_PrName" id="x_PrName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PrName->getPlaceHolder()) ?>" value="<?= $Page->PrName->EditValue ?>"<?= $Page->PrName->editAttributes() ?> aria-describedby="x_PrName_help">
<?= $Page->PrName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PrName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label id="elh_store_batchmas_PSGST" for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PSGST->caption() ?><?= $Page->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
<span id="el_store_batchmas_PSGST">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="store_batchmas" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?> aria-describedby="x_PSGST_help">
<?= $Page->PSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label id="elh_store_batchmas_PCGST" for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PCGST->caption() ?><?= $Page->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
<span id="el_store_batchmas_PCGST">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="store_batchmas" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?> aria-describedby="x_PCGST_help">
<?= $Page->PCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label id="elh_store_batchmas_SSGST" for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SSGST->caption() ?><?= $Page->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
<span id="el_store_batchmas_SSGST">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="store_batchmas" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?> aria-describedby="x_SSGST_help">
<?= $Page->SSGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label id="elh_store_batchmas_SCGST" for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SCGST->caption() ?><?= $Page->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
<span id="el_store_batchmas_SCGST">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="store_batchmas" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?> aria-describedby="x_SCGST_help">
<?= $Page->SCGST->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label id="elh_store_batchmas_MFRCODE" for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MFRCODE->caption() ?><?= $Page->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="store_batchmas" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?> aria-describedby="x_MFRCODE_help">
<?= $Page->MFRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_store_batchmas_BRCODE" for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_store_batchmas_BRCODE">
<input type="<?= $Page->BRCODE->getInputTextType() ?>" data-table="store_batchmas" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" value="<?= $Page->BRCODE->EditValue ?>"<?= $Page->BRCODE->editAttributes() ?> aria-describedby="x_BRCODE_help">
<?= $Page->BRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= GetUrl($Page->getReturnUrl()) ?>"><?= $Language->phrase("CancelBtn") ?></button>
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
    ew.addEventHandlers("store_batchmas");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

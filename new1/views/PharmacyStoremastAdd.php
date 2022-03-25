<?php

namespace PHPMaker2021\project3;

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
    var fields = ew.vars.tables.pharmacy_storemast.fields;
    fpharmacy_storemastadd.addFields([
        ["BRCODE", [fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null, ew.Validators.integer], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["TYPE", [fields.TYPE.required ? ew.Validators.required(fields.TYPE.caption) : null], fields.TYPE.isInvalid],
        ["DES", [fields.DES.required ? ew.Validators.required(fields.DES.caption) : null], fields.DES.isInvalid],
        ["UM", [fields.UM.required ? ew.Validators.required(fields.UM.caption) : null], fields.UM.isInvalid],
        ["RT", [fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["UR", [fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["TAXP", [fields.TAXP.required ? ew.Validators.required(fields.TAXP.caption) : null, ew.Validators.float], fields.TAXP.isInvalid],
        ["BATCHNO", [fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["OQ", [fields.OQ.required ? ew.Validators.required(fields.OQ.caption) : null, ew.Validators.float], fields.OQ.isInvalid],
        ["RQ", [fields.RQ.required ? ew.Validators.required(fields.RQ.caption) : null, ew.Validators.float], fields.RQ.isInvalid],
        ["MRQ", [fields.MRQ.required ? ew.Validators.required(fields.MRQ.caption) : null, ew.Validators.float], fields.MRQ.isInvalid],
        ["IQ", [fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["MRP", [fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["EXPDT", [fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["SALQTY", [fields.SALQTY.required ? ew.Validators.required(fields.SALQTY.caption) : null, ew.Validators.float], fields.SALQTY.isInvalid],
        ["LASTPURDT", [fields.LASTPURDT.required ? ew.Validators.required(fields.LASTPURDT.caption) : null, ew.Validators.datetime(0)], fields.LASTPURDT.isInvalid],
        ["LASTSUPP", [fields.LASTSUPP.required ? ew.Validators.required(fields.LASTSUPP.caption) : null], fields.LASTSUPP.isInvalid],
        ["GENNAME", [fields.GENNAME.required ? ew.Validators.required(fields.GENNAME.caption) : null], fields.GENNAME.isInvalid],
        ["LASTISSDT", [fields.LASTISSDT.required ? ew.Validators.required(fields.LASTISSDT.caption) : null, ew.Validators.datetime(0)], fields.LASTISSDT.isInvalid],
        ["CREATEDDT", [fields.CREATEDDT.required ? ew.Validators.required(fields.CREATEDDT.caption) : null, ew.Validators.datetime(0)], fields.CREATEDDT.isInvalid],
        ["OPPRC", [fields.OPPRC.required ? ew.Validators.required(fields.OPPRC.caption) : null], fields.OPPRC.isInvalid],
        ["RESTRICT", [fields.RESTRICT.required ? ew.Validators.required(fields.RESTRICT.caption) : null], fields.RESTRICT.isInvalid],
        ["BAWAPRC", [fields.BAWAPRC.required ? ew.Validators.required(fields.BAWAPRC.caption) : null], fields.BAWAPRC.isInvalid],
        ["STAXPER", [fields.STAXPER.required ? ew.Validators.required(fields.STAXPER.caption) : null, ew.Validators.float], fields.STAXPER.isInvalid],
        ["TAXTYPE", [fields.TAXTYPE.required ? ew.Validators.required(fields.TAXTYPE.caption) : null], fields.TAXTYPE.isInvalid],
        ["OLDTAXP", [fields.OLDTAXP.required ? ew.Validators.required(fields.OLDTAXP.caption) : null, ew.Validators.float], fields.OLDTAXP.isInvalid],
        ["TAXUPD", [fields.TAXUPD.required ? ew.Validators.required(fields.TAXUPD.caption) : null], fields.TAXUPD.isInvalid],
        ["PACKAGE", [fields.PACKAGE.required ? ew.Validators.required(fields.PACKAGE.caption) : null], fields.PACKAGE.isInvalid],
        ["NEWRT", [fields.NEWRT.required ? ew.Validators.required(fields.NEWRT.caption) : null, ew.Validators.float], fields.NEWRT.isInvalid],
        ["NEWMRP", [fields.NEWMRP.required ? ew.Validators.required(fields.NEWMRP.caption) : null, ew.Validators.float], fields.NEWMRP.isInvalid],
        ["NEWUR", [fields.NEWUR.required ? ew.Validators.required(fields.NEWUR.caption) : null, ew.Validators.float], fields.NEWUR.isInvalid],
        ["STATUS", [fields.STATUS.required ? ew.Validators.required(fields.STATUS.caption) : null], fields.STATUS.isInvalid],
        ["RETNQTY", [fields.RETNQTY.required ? ew.Validators.required(fields.RETNQTY.caption) : null, ew.Validators.float], fields.RETNQTY.isInvalid],
        ["KEMODISC", [fields.KEMODISC.required ? ew.Validators.required(fields.KEMODISC.caption) : null], fields.KEMODISC.isInvalid],
        ["PATSALE", [fields.PATSALE.required ? ew.Validators.required(fields.PATSALE.caption) : null, ew.Validators.float], fields.PATSALE.isInvalid],
        ["ORGAN", [fields.ORGAN.required ? ew.Validators.required(fields.ORGAN.caption) : null], fields.ORGAN.isInvalid],
        ["OLDRQ", [fields.OLDRQ.required ? ew.Validators.required(fields.OLDRQ.caption) : null, ew.Validators.float], fields.OLDRQ.isInvalid],
        ["DRID", [fields.DRID.required ? ew.Validators.required(fields.DRID.caption) : null], fields.DRID.isInvalid],
        ["MFRCODE", [fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["COMBCODE", [fields.COMBCODE.required ? ew.Validators.required(fields.COMBCODE.caption) : null], fields.COMBCODE.isInvalid],
        ["GENCODE", [fields.GENCODE.required ? ew.Validators.required(fields.GENCODE.caption) : null], fields.GENCODE.isInvalid],
        ["STRENGTH", [fields.STRENGTH.required ? ew.Validators.required(fields.STRENGTH.caption) : null, ew.Validators.float], fields.STRENGTH.isInvalid],
        ["UNIT", [fields.UNIT.required ? ew.Validators.required(fields.UNIT.caption) : null], fields.UNIT.isInvalid],
        ["FORMULARY", [fields.FORMULARY.required ? ew.Validators.required(fields.FORMULARY.caption) : null], fields.FORMULARY.isInvalid],
        ["STOCK", [fields.STOCK.required ? ew.Validators.required(fields.STOCK.caption) : null, ew.Validators.float], fields.STOCK.isInvalid],
        ["RACKNO", [fields.RACKNO.required ? ew.Validators.required(fields.RACKNO.caption) : null], fields.RACKNO.isInvalid],
        ["SUPPNAME", [fields.SUPPNAME.required ? ew.Validators.required(fields.SUPPNAME.caption) : null], fields.SUPPNAME.isInvalid],
        ["COMBNAME", [fields.COMBNAME.required ? ew.Validators.required(fields.COMBNAME.caption) : null], fields.COMBNAME.isInvalid],
        ["GENERICNAME", [fields.GENERICNAME.required ? ew.Validators.required(fields.GENERICNAME.caption) : null], fields.GENERICNAME.isInvalid],
        ["REMARK", [fields.REMARK.required ? ew.Validators.required(fields.REMARK.caption) : null], fields.REMARK.isInvalid],
        ["TEMP", [fields.TEMP.required ? ew.Validators.required(fields.TEMP.caption) : null], fields.TEMP.isInvalid],
        ["PACKING", [fields.PACKING.required ? ew.Validators.required(fields.PACKING.caption) : null, ew.Validators.float], fields.PACKING.isInvalid],
        ["PhysQty", [fields.PhysQty.required ? ew.Validators.required(fields.PhysQty.caption) : null, ew.Validators.float], fields.PhysQty.isInvalid],
        ["LedQty", [fields.LedQty.required ? ew.Validators.required(fields.LedQty.caption) : null, ew.Validators.float], fields.LedQty.isInvalid],
        ["PurValue", [fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["PSGST", [fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null, ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null, ew.Validators.float], fields.PCGST.isInvalid],
        ["SaleValue", [fields.SaleValue.required ? ew.Validators.required(fields.SaleValue.caption) : null, ew.Validators.float], fields.SaleValue.isInvalid],
        ["SSGST", [fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null, ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null, ew.Validators.float], fields.SCGST.isInvalid],
        ["SaleRate", [fields.SaleRate.required ? ew.Validators.required(fields.SaleRate.caption) : null, ew.Validators.float], fields.SaleRate.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["BRNAME", [fields.BRNAME.required ? ew.Validators.required(fields.BRNAME.caption) : null], fields.BRNAME.isInvalid],
        ["OV", [fields.OV.required ? ew.Validators.required(fields.OV.caption) : null, ew.Validators.float], fields.OV.isInvalid],
        ["LATESTOV", [fields.LATESTOV.required ? ew.Validators.required(fields.LATESTOV.caption) : null, ew.Validators.float], fields.LATESTOV.isInvalid],
        ["ITEMTYPE", [fields.ITEMTYPE.required ? ew.Validators.required(fields.ITEMTYPE.caption) : null], fields.ITEMTYPE.isInvalid],
        ["ROWID", [fields.ROWID.required ? ew.Validators.required(fields.ROWID.caption) : null], fields.ROWID.isInvalid],
        ["MOVED", [fields.MOVED.required ? ew.Validators.required(fields.MOVED.caption) : null, ew.Validators.integer], fields.MOVED.isInvalid],
        ["NEWTAX", [fields.NEWTAX.required ? ew.Validators.required(fields.NEWTAX.caption) : null, ew.Validators.float], fields.NEWTAX.isInvalid],
        ["HSNCODE", [fields.HSNCODE.required ? ew.Validators.required(fields.HSNCODE.caption) : null], fields.HSNCODE.isInvalid],
        ["OLDTAX", [fields.OLDTAX.required ? ew.Validators.required(fields.OLDTAX.caption) : null, ew.Validators.float], fields.OLDTAX.isInvalid]
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
<form name="fpharmacy_storemastadd" id="fpharmacy_storemastadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_pharmacy_storemast_BRCODE" for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BRCODE">
<input type="<?= $Page->BRCODE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" value="<?= $Page->BRCODE->EditValue ?>"<?= $Page->BRCODE->editAttributes() ?> aria-describedby="x_BRCODE_help">
<?= $Page->BRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
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
<input type="<?= $Page->TYPE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->TYPE->getPlaceHolder()) ?>" value="<?= $Page->TYPE->EditValue ?>"<?= $Page->TYPE->editAttributes() ?> aria-describedby="x_TYPE_help">
<?= $Page->TYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TYPE->getErrorMessage() ?></div>
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
<?php if ($Page->UR->Visible) { // UR ?>
    <div id="r_UR" class="form-group row">
        <label id="elh_pharmacy_storemast_UR" for="x_UR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UR->caption() ?><?= $Page->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UR->cellAttributes() ?>>
<span id="el_pharmacy_storemast_UR">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?> aria-describedby="x_UR_help">
<?= $Page->UR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
    <div id="r_TAXP" class="form-group row">
        <label id="elh_pharmacy_storemast_TAXP" for="x_TAXP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TAXP->caption() ?><?= $Page->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TAXP">
<input type="<?= $Page->TAXP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?= HtmlEncode($Page->TAXP->getPlaceHolder()) ?>" value="<?= $Page->TAXP->EditValue ?>"<?= $Page->TAXP->editAttributes() ?> aria-describedby="x_TAXP_help">
<?= $Page->TAXP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TAXP->getErrorMessage() ?></div>
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
<?php if ($Page->OQ->Visible) { // OQ ?>
    <div id="r_OQ" class="form-group row">
        <label id="elh_pharmacy_storemast_OQ" for="x_OQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OQ->caption() ?><?= $Page->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OQ->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OQ">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?> aria-describedby="x_OQ_help">
<?= $Page->OQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
    <div id="r_RQ" class="form-group row">
        <label id="elh_pharmacy_storemast_RQ" for="x_RQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RQ->caption() ?><?= $Page->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RQ->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RQ">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?> aria-describedby="x_RQ_help">
<?= $Page->RQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <div id="r_MRQ" class="form-group row">
        <label id="elh_pharmacy_storemast_MRQ" for="x_MRQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRQ->caption() ?><?= $Page->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRQ->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MRQ">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?> aria-describedby="x_MRQ_help">
<?= $Page->MRQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <div id="r_IQ" class="form-group row">
        <label id="elh_pharmacy_storemast_IQ" for="x_IQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IQ->caption() ?><?= $Page->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IQ->cellAttributes() ?>>
<span id="el_pharmacy_storemast_IQ">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?> aria-describedby="x_IQ_help">
<?= $Page->IQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
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
<?php if ($Page->SALQTY->Visible) { // SALQTY ?>
    <div id="r_SALQTY" class="form-group row">
        <label id="elh_pharmacy_storemast_SALQTY" for="x_SALQTY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SALQTY->caption() ?><?= $Page->SALQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SALQTY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_SALQTY">
<input type="<?= $Page->SALQTY->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?= HtmlEncode($Page->SALQTY->getPlaceHolder()) ?>" value="<?= $Page->SALQTY->EditValue ?>"<?= $Page->SALQTY->editAttributes() ?> aria-describedby="x_SALQTY_help">
<?= $Page->SALQTY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SALQTY->getErrorMessage() ?></div>
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
<input type="<?= $Page->LASTSUPP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LASTSUPP" name="x_LASTSUPP" id="x_LASTSUPP" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->LASTSUPP->getPlaceHolder()) ?>" value="<?= $Page->LASTSUPP->EditValue ?>"<?= $Page->LASTSUPP->editAttributes() ?> aria-describedby="x_LASTSUPP_help">
<?= $Page->LASTSUPP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LASTSUPP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <div id="r_GENNAME" class="form-group row">
        <label id="elh_pharmacy_storemast_GENNAME" for="x_GENNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENNAME->caption() ?><?= $Page->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENNAME">
<input type="<?= $Page->GENNAME->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="75" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" value="<?= $Page->GENNAME->EditValue ?>"<?= $Page->GENNAME->editAttributes() ?> aria-describedby="x_GENNAME_help">
<?= $Page->GENNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
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
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
    <div id="r_CREATEDDT" class="form-group row">
        <label id="elh_pharmacy_storemast_CREATEDDT" for="x_CREATEDDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CREATEDDT->caption() ?><?= $Page->CREATEDDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CREATEDDT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_CREATEDDT">
<input type="<?= $Page->CREATEDDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" placeholder="<?= HtmlEncode($Page->CREATEDDT->getPlaceHolder()) ?>" value="<?= $Page->CREATEDDT->EditValue ?>"<?= $Page->CREATEDDT->editAttributes() ?> aria-describedby="x_CREATEDDT_help">
<?= $Page->CREATEDDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CREATEDDT->getErrorMessage() ?></div>
<?php if (!$Page->CREATEDDT->ReadOnly && !$Page->CREATEDDT->Disabled && !isset($Page->CREATEDDT->EditAttrs["readonly"]) && !isset($Page->CREATEDDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastadd", "x_CREATEDDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPPRC->Visible) { // OPPRC ?>
    <div id="r_OPPRC" class="form-group row">
        <label id="elh_pharmacy_storemast_OPPRC" for="x_OPPRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OPPRC->caption() ?><?= $Page->OPPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPPRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OPPRC">
<input type="<?= $Page->OPPRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->OPPRC->getPlaceHolder()) ?>" value="<?= $Page->OPPRC->EditValue ?>"<?= $Page->OPPRC->editAttributes() ?> aria-describedby="x_OPPRC_help">
<?= $Page->OPPRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPPRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RESTRICT->Visible) { // RESTRICT ?>
    <div id="r_RESTRICT" class="form-group row">
        <label id="elh_pharmacy_storemast_RESTRICT" for="x_RESTRICT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RESTRICT->caption() ?><?= $Page->RESTRICT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESTRICT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RESTRICT">
<input type="<?= $Page->RESTRICT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->RESTRICT->getPlaceHolder()) ?>" value="<?= $Page->RESTRICT->EditValue ?>"<?= $Page->RESTRICT->editAttributes() ?> aria-describedby="x_RESTRICT_help">
<?= $Page->RESTRICT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RESTRICT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BAWAPRC->Visible) { // BAWAPRC ?>
    <div id="r_BAWAPRC" class="form-group row">
        <label id="elh_pharmacy_storemast_BAWAPRC" for="x_BAWAPRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BAWAPRC->caption() ?><?= $Page->BAWAPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BAWAPRC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BAWAPRC">
<input type="<?= $Page->BAWAPRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->BAWAPRC->getPlaceHolder()) ?>" value="<?= $Page->BAWAPRC->EditValue ?>"<?= $Page->BAWAPRC->editAttributes() ?> aria-describedby="x_BAWAPRC_help">
<?= $Page->BAWAPRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BAWAPRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->STAXPER->Visible) { // STAXPER ?>
    <div id="r_STAXPER" class="form-group row">
        <label id="elh_pharmacy_storemast_STAXPER" for="x_STAXPER" class="<?= $Page->LeftColumnClass ?>"><?= $Page->STAXPER->caption() ?><?= $Page->STAXPER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STAXPER->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STAXPER">
<input type="<?= $Page->STAXPER->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?= HtmlEncode($Page->STAXPER->getPlaceHolder()) ?>" value="<?= $Page->STAXPER->EditValue ?>"<?= $Page->STAXPER->editAttributes() ?> aria-describedby="x_STAXPER_help">
<?= $Page->STAXPER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->STAXPER->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXTYPE->Visible) { // TAXTYPE ?>
    <div id="r_TAXTYPE" class="form-group row">
        <label id="elh_pharmacy_storemast_TAXTYPE" for="x_TAXTYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TAXTYPE->caption() ?><?= $Page->TAXTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXTYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TAXTYPE">
<input type="<?= $Page->TAXTYPE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TAXTYPE->getPlaceHolder()) ?>" value="<?= $Page->TAXTYPE->EditValue ?>"<?= $Page->TAXTYPE->editAttributes() ?> aria-describedby="x_TAXTYPE_help">
<?= $Page->TAXTYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TAXTYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDTAXP->Visible) { // OLDTAXP ?>
    <div id="r_OLDTAXP" class="form-group row">
        <label id="elh_pharmacy_storemast_OLDTAXP" for="x_OLDTAXP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OLDTAXP->caption() ?><?= $Page->OLDTAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDTAXP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OLDTAXP">
<input type="<?= $Page->OLDTAXP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?= HtmlEncode($Page->OLDTAXP->getPlaceHolder()) ?>" value="<?= $Page->OLDTAXP->EditValue ?>"<?= $Page->OLDTAXP->editAttributes() ?> aria-describedby="x_OLDTAXP_help">
<?= $Page->OLDTAXP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OLDTAXP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXUPD->Visible) { // TAXUPD ?>
    <div id="r_TAXUPD" class="form-group row">
        <label id="elh_pharmacy_storemast_TAXUPD" for="x_TAXUPD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TAXUPD->caption() ?><?= $Page->TAXUPD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXUPD->cellAttributes() ?>>
<span id="el_pharmacy_storemast_TAXUPD">
<input type="<?= $Page->TAXUPD->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TAXUPD->getPlaceHolder()) ?>" value="<?= $Page->TAXUPD->EditValue ?>"<?= $Page->TAXUPD->editAttributes() ?> aria-describedby="x_TAXUPD_help">
<?= $Page->TAXUPD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TAXUPD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PACKAGE->Visible) { // PACKAGE ?>
    <div id="r_PACKAGE" class="form-group row">
        <label id="elh_pharmacy_storemast_PACKAGE" for="x_PACKAGE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PACKAGE->caption() ?><?= $Page->PACKAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PACKAGE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PACKAGE">
<input type="<?= $Page->PACKAGE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->PACKAGE->getPlaceHolder()) ?>" value="<?= $Page->PACKAGE->EditValue ?>"<?= $Page->PACKAGE->editAttributes() ?> aria-describedby="x_PACKAGE_help">
<?= $Page->PACKAGE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PACKAGE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWRT->Visible) { // NEWRT ?>
    <div id="r_NEWRT" class="form-group row">
        <label id="elh_pharmacy_storemast_NEWRT" for="x_NEWRT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NEWRT->caption() ?><?= $Page->NEWRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWRT->cellAttributes() ?>>
<span id="el_pharmacy_storemast_NEWRT">
<input type="<?= $Page->NEWRT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?= HtmlEncode($Page->NEWRT->getPlaceHolder()) ?>" value="<?= $Page->NEWRT->EditValue ?>"<?= $Page->NEWRT->editAttributes() ?> aria-describedby="x_NEWRT_help">
<?= $Page->NEWRT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NEWRT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWMRP->Visible) { // NEWMRP ?>
    <div id="r_NEWMRP" class="form-group row">
        <label id="elh_pharmacy_storemast_NEWMRP" for="x_NEWMRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NEWMRP->caption() ?><?= $Page->NEWMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWMRP->cellAttributes() ?>>
<span id="el_pharmacy_storemast_NEWMRP">
<input type="<?= $Page->NEWMRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?= HtmlEncode($Page->NEWMRP->getPlaceHolder()) ?>" value="<?= $Page->NEWMRP->EditValue ?>"<?= $Page->NEWMRP->editAttributes() ?> aria-describedby="x_NEWMRP_help">
<?= $Page->NEWMRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NEWMRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWUR->Visible) { // NEWUR ?>
    <div id="r_NEWUR" class="form-group row">
        <label id="elh_pharmacy_storemast_NEWUR" for="x_NEWUR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NEWUR->caption() ?><?= $Page->NEWUR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWUR->cellAttributes() ?>>
<span id="el_pharmacy_storemast_NEWUR">
<input type="<?= $Page->NEWUR->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?= HtmlEncode($Page->NEWUR->getPlaceHolder()) ?>" value="<?= $Page->NEWUR->EditValue ?>"<?= $Page->NEWUR->editAttributes() ?> aria-describedby="x_NEWUR_help">
<?= $Page->NEWUR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NEWUR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->STATUS->Visible) { // STATUS ?>
    <div id="r_STATUS" class="form-group row">
        <label id="elh_pharmacy_storemast_STATUS" for="x_STATUS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->STATUS->caption() ?><?= $Page->STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STATUS->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STATUS">
<input type="<?= $Page->STATUS->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->STATUS->getPlaceHolder()) ?>" value="<?= $Page->STATUS->EditValue ?>"<?= $Page->STATUS->editAttributes() ?> aria-describedby="x_STATUS_help">
<?= $Page->STATUS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->STATUS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RETNQTY->Visible) { // RETNQTY ?>
    <div id="r_RETNQTY" class="form-group row">
        <label id="elh_pharmacy_storemast_RETNQTY" for="x_RETNQTY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RETNQTY->caption() ?><?= $Page->RETNQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RETNQTY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_RETNQTY">
<input type="<?= $Page->RETNQTY->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?= HtmlEncode($Page->RETNQTY->getPlaceHolder()) ?>" value="<?= $Page->RETNQTY->EditValue ?>"<?= $Page->RETNQTY->editAttributes() ?> aria-describedby="x_RETNQTY_help">
<?= $Page->RETNQTY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RETNQTY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->KEMODISC->Visible) { // KEMODISC ?>
    <div id="r_KEMODISC" class="form-group row">
        <label id="elh_pharmacy_storemast_KEMODISC" for="x_KEMODISC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->KEMODISC->caption() ?><?= $Page->KEMODISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->KEMODISC->cellAttributes() ?>>
<span id="el_pharmacy_storemast_KEMODISC">
<input type="<?= $Page->KEMODISC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->KEMODISC->getPlaceHolder()) ?>" value="<?= $Page->KEMODISC->EditValue ?>"<?= $Page->KEMODISC->editAttributes() ?> aria-describedby="x_KEMODISC_help">
<?= $Page->KEMODISC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->KEMODISC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PATSALE->Visible) { // PATSALE ?>
    <div id="r_PATSALE" class="form-group row">
        <label id="elh_pharmacy_storemast_PATSALE" for="x_PATSALE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PATSALE->caption() ?><?= $Page->PATSALE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PATSALE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PATSALE">
<input type="<?= $Page->PATSALE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?= HtmlEncode($Page->PATSALE->getPlaceHolder()) ?>" value="<?= $Page->PATSALE->EditValue ?>"<?= $Page->PATSALE->editAttributes() ?> aria-describedby="x_PATSALE_help">
<?= $Page->PATSALE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PATSALE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ORGAN->Visible) { // ORGAN ?>
    <div id="r_ORGAN" class="form-group row">
        <label id="elh_pharmacy_storemast_ORGAN" for="x_ORGAN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ORGAN->caption() ?><?= $Page->ORGAN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ORGAN->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ORGAN">
<input type="<?= $Page->ORGAN->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ORGAN->getPlaceHolder()) ?>" value="<?= $Page->ORGAN->EditValue ?>"<?= $Page->ORGAN->editAttributes() ?> aria-describedby="x_ORGAN_help">
<?= $Page->ORGAN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ORGAN->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDRQ->Visible) { // OLDRQ ?>
    <div id="r_OLDRQ" class="form-group row">
        <label id="elh_pharmacy_storemast_OLDRQ" for="x_OLDRQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OLDRQ->caption() ?><?= $Page->OLDRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDRQ->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OLDRQ">
<input type="<?= $Page->OLDRQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?= HtmlEncode($Page->OLDRQ->getPlaceHolder()) ?>" value="<?= $Page->OLDRQ->EditValue ?>"<?= $Page->OLDRQ->editAttributes() ?> aria-describedby="x_OLDRQ_help">
<?= $Page->OLDRQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OLDRQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
    <div id="r_DRID" class="form-group row">
        <label id="elh_pharmacy_storemast_DRID" for="x_DRID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DRID->caption() ?><?= $Page->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DRID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_DRID">
<input type="<?= $Page->DRID->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->DRID->getPlaceHolder()) ?>" value="<?= $Page->DRID->EditValue ?>"<?= $Page->DRID->editAttributes() ?> aria-describedby="x_DRID_help">
<?= $Page->DRID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DRID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label id="elh_pharmacy_storemast_MFRCODE" for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MFRCODE->caption() ?><?= $Page->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?> aria-describedby="x_MFRCODE_help">
<?= $Page->MFRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
    <div id="r_COMBCODE" class="form-group row">
        <label id="elh_pharmacy_storemast_COMBCODE" for="x_COMBCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->COMBCODE->caption() ?><?= $Page->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBCODE">
<input type="<?= $Page->COMBCODE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_COMBCODE" name="x_COMBCODE" id="x_COMBCODE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->COMBCODE->getPlaceHolder()) ?>" value="<?= $Page->COMBCODE->EditValue ?>"<?= $Page->COMBCODE->editAttributes() ?> aria-describedby="x_COMBCODE_help">
<?= $Page->COMBCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->COMBCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
    <div id="r_GENCODE" class="form-group row">
        <label id="elh_pharmacy_storemast_GENCODE" for="x_GENCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENCODE->caption() ?><?= $Page->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENCODE">
<input type="<?= $Page->GENCODE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_GENCODE" name="x_GENCODE" id="x_GENCODE" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->GENCODE->getPlaceHolder()) ?>" value="<?= $Page->GENCODE->EditValue ?>"<?= $Page->GENCODE->editAttributes() ?> aria-describedby="x_GENCODE_help">
<?= $Page->GENCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GENCODE->getErrorMessage() ?></div>
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
<input type="<?= $Page->UNIT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UNIT" name="x_UNIT" id="x_UNIT" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->UNIT->getPlaceHolder()) ?>" value="<?= $Page->UNIT->EditValue ?>"<?= $Page->UNIT->editAttributes() ?> aria-describedby="x_UNIT_help">
<?= $Page->UNIT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UNIT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
    <div id="r_FORMULARY" class="form-group row">
        <label id="elh_pharmacy_storemast_FORMULARY" for="x_FORMULARY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FORMULARY->caption() ?><?= $Page->FORMULARY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FORMULARY->cellAttributes() ?>>
<span id="el_pharmacy_storemast_FORMULARY">
<input type="<?= $Page->FORMULARY->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_FORMULARY" name="x_FORMULARY" id="x_FORMULARY" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->FORMULARY->getPlaceHolder()) ?>" value="<?= $Page->FORMULARY->EditValue ?>"<?= $Page->FORMULARY->editAttributes() ?> aria-describedby="x_FORMULARY_help">
<?= $Page->FORMULARY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FORMULARY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->STOCK->Visible) { // STOCK ?>
    <div id="r_STOCK" class="form-group row">
        <label id="elh_pharmacy_storemast_STOCK" for="x_STOCK" class="<?= $Page->LeftColumnClass ?>"><?= $Page->STOCK->caption() ?><?= $Page->STOCK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STOCK->cellAttributes() ?>>
<span id="el_pharmacy_storemast_STOCK">
<input type="<?= $Page->STOCK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?= HtmlEncode($Page->STOCK->getPlaceHolder()) ?>" value="<?= $Page->STOCK->EditValue ?>"<?= $Page->STOCK->editAttributes() ?> aria-describedby="x_STOCK_help">
<?= $Page->STOCK->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->STOCK->getErrorMessage() ?></div>
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
<input type="<?= $Page->SUPPNAME->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SUPPNAME" name="x_SUPPNAME" id="x_SUPPNAME" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->SUPPNAME->getPlaceHolder()) ?>" value="<?= $Page->SUPPNAME->EditValue ?>"<?= $Page->SUPPNAME->editAttributes() ?> aria-describedby="x_SUPPNAME_help">
<?= $Page->SUPPNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SUPPNAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
    <div id="r_COMBNAME" class="form-group row">
        <label id="elh_pharmacy_storemast_COMBNAME" for="x_COMBNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->COMBNAME->caption() ?><?= $Page->COMBNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COMBNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_COMBNAME">
<input type="<?= $Page->COMBNAME->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_COMBNAME" name="x_COMBNAME" id="x_COMBNAME" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->COMBNAME->getPlaceHolder()) ?>" value="<?= $Page->COMBNAME->EditValue ?>"<?= $Page->COMBNAME->editAttributes() ?> aria-describedby="x_COMBNAME_help">
<?= $Page->COMBNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->COMBNAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
    <div id="r_GENERICNAME" class="form-group row">
        <label id="elh_pharmacy_storemast_GENERICNAME" for="x_GENERICNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENERICNAME->caption() ?><?= $Page->GENERICNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENERICNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_GENERICNAME">
<input type="<?= $Page->GENERICNAME->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_GENERICNAME" name="x_GENERICNAME" id="x_GENERICNAME" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->GENERICNAME->getPlaceHolder()) ?>" value="<?= $Page->GENERICNAME->EditValue ?>"<?= $Page->GENERICNAME->editAttributes() ?> aria-describedby="x_GENERICNAME_help">
<?= $Page->GENERICNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GENERICNAME->getErrorMessage() ?></div>
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
<?php if ($Page->PACKING->Visible) { // PACKING ?>
    <div id="r_PACKING" class="form-group row">
        <label id="elh_pharmacy_storemast_PACKING" for="x_PACKING" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PACKING->caption() ?><?= $Page->PACKING->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PACKING->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PACKING">
<input type="<?= $Page->PACKING->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?= HtmlEncode($Page->PACKING->getPlaceHolder()) ?>" value="<?= $Page->PACKING->EditValue ?>"<?= $Page->PACKING->editAttributes() ?> aria-describedby="x_PACKING_help">
<?= $Page->PACKING->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PACKING->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PhysQty->Visible) { // PhysQty ?>
    <div id="r_PhysQty" class="form-group row">
        <label id="elh_pharmacy_storemast_PhysQty" for="x_PhysQty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PhysQty->caption() ?><?= $Page->PhysQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PhysQty->cellAttributes() ?>>
<span id="el_pharmacy_storemast_PhysQty">
<input type="<?= $Page->PhysQty->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?= HtmlEncode($Page->PhysQty->getPlaceHolder()) ?>" value="<?= $Page->PhysQty->EditValue ?>"<?= $Page->PhysQty->editAttributes() ?> aria-describedby="x_PhysQty_help">
<?= $Page->PhysQty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PhysQty->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LedQty->Visible) { // LedQty ?>
    <div id="r_LedQty" class="form-group row">
        <label id="elh_pharmacy_storemast_LedQty" for="x_LedQty" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LedQty->caption() ?><?= $Page->LedQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LedQty->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LedQty">
<input type="<?= $Page->LedQty->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?= HtmlEncode($Page->LedQty->getPlaceHolder()) ?>" value="<?= $Page->LedQty->EditValue ?>"<?= $Page->LedQty->editAttributes() ?> aria-describedby="x_LedQty_help">
<?= $Page->LedQty->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LedQty->getErrorMessage() ?></div>
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
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_pharmacy_storemast_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
    <div id="r_BRNAME" class="form-group row">
        <label id="elh_pharmacy_storemast_BRNAME" for="x_BRNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BRNAME->caption() ?><?= $Page->BRNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el_pharmacy_storemast_BRNAME">
<input type="<?= $Page->BRNAME->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BRNAME->getPlaceHolder()) ?>" value="<?= $Page->BRNAME->EditValue ?>"<?= $Page->BRNAME->editAttributes() ?> aria-describedby="x_BRNAME_help">
<?= $Page->BRNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BRNAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OV->Visible) { // OV ?>
    <div id="r_OV" class="form-group row">
        <label id="elh_pharmacy_storemast_OV" for="x_OV" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OV->caption() ?><?= $Page->OV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OV->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OV">
<input type="<?= $Page->OV->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OV" name="x_OV" id="x_OV" size="30" placeholder="<?= HtmlEncode($Page->OV->getPlaceHolder()) ?>" value="<?= $Page->OV->EditValue ?>"<?= $Page->OV->editAttributes() ?> aria-describedby="x_OV_help">
<?= $Page->OV->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OV->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LATESTOV->Visible) { // LATESTOV ?>
    <div id="r_LATESTOV" class="form-group row">
        <label id="elh_pharmacy_storemast_LATESTOV" for="x_LATESTOV" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LATESTOV->caption() ?><?= $Page->LATESTOV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LATESTOV->cellAttributes() ?>>
<span id="el_pharmacy_storemast_LATESTOV">
<input type="<?= $Page->LATESTOV->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LATESTOV" name="x_LATESTOV" id="x_LATESTOV" size="30" placeholder="<?= HtmlEncode($Page->LATESTOV->getPlaceHolder()) ?>" value="<?= $Page->LATESTOV->EditValue ?>"<?= $Page->LATESTOV->editAttributes() ?> aria-describedby="x_LATESTOV_help">
<?= $Page->LATESTOV->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LATESTOV->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ITEMTYPE->Visible) { // ITEMTYPE ?>
    <div id="r_ITEMTYPE" class="form-group row">
        <label id="elh_pharmacy_storemast_ITEMTYPE" for="x_ITEMTYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ITEMTYPE->caption() ?><?= $Page->ITEMTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ITEMTYPE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ITEMTYPE">
<input type="<?= $Page->ITEMTYPE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_ITEMTYPE" name="x_ITEMTYPE" id="x_ITEMTYPE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ITEMTYPE->getPlaceHolder()) ?>" value="<?= $Page->ITEMTYPE->EditValue ?>"<?= $Page->ITEMTYPE->editAttributes() ?> aria-describedby="x_ITEMTYPE_help">
<?= $Page->ITEMTYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ITEMTYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ROWID->Visible) { // ROWID ?>
    <div id="r_ROWID" class="form-group row">
        <label id="elh_pharmacy_storemast_ROWID" for="x_ROWID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ROWID->caption() ?><?= $Page->ROWID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ROWID->cellAttributes() ?>>
<span id="el_pharmacy_storemast_ROWID">
<input type="<?= $Page->ROWID->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_ROWID" name="x_ROWID" id="x_ROWID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ROWID->getPlaceHolder()) ?>" value="<?= $Page->ROWID->EditValue ?>"<?= $Page->ROWID->editAttributes() ?> aria-describedby="x_ROWID_help">
<?= $Page->ROWID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ROWID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MOVED->Visible) { // MOVED ?>
    <div id="r_MOVED" class="form-group row">
        <label id="elh_pharmacy_storemast_MOVED" for="x_MOVED" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MOVED->caption() ?><?= $Page->MOVED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MOVED->cellAttributes() ?>>
<span id="el_pharmacy_storemast_MOVED">
<input type="<?= $Page->MOVED->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MOVED" name="x_MOVED" id="x_MOVED" size="30" placeholder="<?= HtmlEncode($Page->MOVED->getPlaceHolder()) ?>" value="<?= $Page->MOVED->EditValue ?>"<?= $Page->MOVED->editAttributes() ?> aria-describedby="x_MOVED_help">
<?= $Page->MOVED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MOVED->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWTAX->Visible) { // NEWTAX ?>
    <div id="r_NEWTAX" class="form-group row">
        <label id="elh_pharmacy_storemast_NEWTAX" for="x_NEWTAX" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NEWTAX->caption() ?><?= $Page->NEWTAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWTAX->cellAttributes() ?>>
<span id="el_pharmacy_storemast_NEWTAX">
<input type="<?= $Page->NEWTAX->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWTAX" name="x_NEWTAX" id="x_NEWTAX" size="30" placeholder="<?= HtmlEncode($Page->NEWTAX->getPlaceHolder()) ?>" value="<?= $Page->NEWTAX->EditValue ?>"<?= $Page->NEWTAX->editAttributes() ?> aria-describedby="x_NEWTAX_help">
<?= $Page->NEWTAX->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NEWTAX->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
    <div id="r_HSNCODE" class="form-group row">
        <label id="elh_pharmacy_storemast_HSNCODE" for="x_HSNCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HSNCODE->caption() ?><?= $Page->HSNCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HSNCODE->cellAttributes() ?>>
<span id="el_pharmacy_storemast_HSNCODE">
<input type="<?= $Page->HSNCODE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_HSNCODE" name="x_HSNCODE" id="x_HSNCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSNCODE->getPlaceHolder()) ?>" value="<?= $Page->HSNCODE->EditValue ?>"<?= $Page->HSNCODE->editAttributes() ?> aria-describedby="x_HSNCODE_help">
<?= $Page->HSNCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HSNCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDTAX->Visible) { // OLDTAX ?>
    <div id="r_OLDTAX" class="form-group row">
        <label id="elh_pharmacy_storemast_OLDTAX" for="x_OLDTAX" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OLDTAX->caption() ?><?= $Page->OLDTAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDTAX->cellAttributes() ?>>
<span id="el_pharmacy_storemast_OLDTAX">
<input type="<?= $Page->OLDTAX->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OLDTAX" name="x_OLDTAX" id="x_OLDTAX" size="30" placeholder="<?= HtmlEncode($Page->OLDTAX->getPlaceHolder()) ?>" value="<?= $Page->OLDTAX->EditValue ?>"<?= $Page->OLDTAX->editAttributes() ?> aria-describedby="x_OLDTAX_help">
<?= $Page->OLDTAX->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OLDTAX->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pharmacy_storemast");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

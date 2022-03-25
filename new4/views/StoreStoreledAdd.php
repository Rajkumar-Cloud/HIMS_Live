<?php

namespace PHPMaker2021\HIMS;

// Page object
$StoreStoreledAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fstore_storeledadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fstore_storeledadd = currentForm = new ew.Form("fstore_storeledadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "store_storeled")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.store_storeled)
        ew.vars.tables.store_storeled = currentTable;
    fstore_storeledadd.addFields([
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null, ew.Validators.integer], fields.BRCODE.isInvalid],
        ["TYPE", [fields.TYPE.visible && fields.TYPE.required ? ew.Validators.required(fields.TYPE.caption) : null], fields.TYPE.isInvalid],
        ["DN", [fields.DN.visible && fields.DN.required ? ew.Validators.required(fields.DN.caption) : null], fields.DN.isInvalid],
        ["RDN", [fields.RDN.visible && fields.RDN.required ? ew.Validators.required(fields.RDN.caption) : null], fields.RDN.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null, ew.Validators.datetime(0)], fields.DT.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["OQ", [fields.OQ.visible && fields.OQ.required ? ew.Validators.required(fields.OQ.caption) : null, ew.Validators.float], fields.OQ.isInvalid],
        ["RQ", [fields.RQ.visible && fields.RQ.required ? ew.Validators.required(fields.RQ.caption) : null, ew.Validators.float], fields.RQ.isInvalid],
        ["MRQ", [fields.MRQ.visible && fields.MRQ.required ? ew.Validators.required(fields.MRQ.caption) : null, ew.Validators.float], fields.MRQ.isInvalid],
        ["IQ", [fields.IQ.visible && fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["BILLNO", [fields.BILLNO.visible && fields.BILLNO.required ? ew.Validators.required(fields.BILLNO.caption) : null], fields.BILLNO.isInvalid],
        ["BILLDT", [fields.BILLDT.visible && fields.BILLDT.required ? ew.Validators.required(fields.BILLDT.caption) : null, ew.Validators.datetime(0)], fields.BILLDT.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["VALUE", [fields.VALUE.visible && fields.VALUE.required ? ew.Validators.required(fields.VALUE.caption) : null, ew.Validators.float], fields.VALUE.isInvalid],
        ["DISC", [fields.DISC.visible && fields.DISC.required ? ew.Validators.required(fields.DISC.caption) : null, ew.Validators.float], fields.DISC.isInvalid],
        ["TAXP", [fields.TAXP.visible && fields.TAXP.required ? ew.Validators.required(fields.TAXP.caption) : null, ew.Validators.float], fields.TAXP.isInvalid],
        ["TAX", [fields.TAX.visible && fields.TAX.required ? ew.Validators.required(fields.TAX.caption) : null, ew.Validators.float], fields.TAX.isInvalid],
        ["TAXR", [fields.TAXR.visible && fields.TAXR.required ? ew.Validators.required(fields.TAXR.caption) : null, ew.Validators.float], fields.TAXR.isInvalid],
        ["DAMT", [fields.DAMT.visible && fields.DAMT.required ? ew.Validators.required(fields.DAMT.caption) : null, ew.Validators.float], fields.DAMT.isInvalid],
        ["EMPNO", [fields.EMPNO.visible && fields.EMPNO.required ? ew.Validators.required(fields.EMPNO.caption) : null], fields.EMPNO.isInvalid],
        ["PC", [fields.PC.visible && fields.PC.required ? ew.Validators.required(fields.PC.caption) : null], fields.PC.isInvalid],
        ["DRNAME", [fields.DRNAME.visible && fields.DRNAME.required ? ew.Validators.required(fields.DRNAME.caption) : null], fields.DRNAME.isInvalid],
        ["BTIME", [fields.BTIME.visible && fields.BTIME.required ? ew.Validators.required(fields.BTIME.caption) : null], fields.BTIME.isInvalid],
        ["ONO", [fields.ONO.visible && fields.ONO.required ? ew.Validators.required(fields.ONO.caption) : null], fields.ONO.isInvalid],
        ["ODT", [fields.ODT.visible && fields.ODT.required ? ew.Validators.required(fields.ODT.caption) : null, ew.Validators.datetime(0)], fields.ODT.isInvalid],
        ["PURRT", [fields.PURRT.visible && fields.PURRT.required ? ew.Validators.required(fields.PURRT.caption) : null, ew.Validators.float], fields.PURRT.isInvalid],
        ["GRP", [fields.GRP.visible && fields.GRP.required ? ew.Validators.required(fields.GRP.caption) : null], fields.GRP.isInvalid],
        ["IBATCH", [fields.IBATCH.visible && fields.IBATCH.required ? ew.Validators.required(fields.IBATCH.caption) : null], fields.IBATCH.isInvalid],
        ["IPNO", [fields.IPNO.visible && fields.IPNO.required ? ew.Validators.required(fields.IPNO.caption) : null], fields.IPNO.isInvalid],
        ["OPNO", [fields.OPNO.visible && fields.OPNO.required ? ew.Validators.required(fields.OPNO.caption) : null], fields.OPNO.isInvalid],
        ["RECID", [fields.RECID.visible && fields.RECID.required ? ew.Validators.required(fields.RECID.caption) : null], fields.RECID.isInvalid],
        ["FQTY", [fields.FQTY.visible && fields.FQTY.required ? ew.Validators.required(fields.FQTY.caption) : null, ew.Validators.float], fields.FQTY.isInvalid],
        ["UR", [fields.UR.visible && fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["DCID", [fields.DCID.visible && fields.DCID.required ? ew.Validators.required(fields.DCID.caption) : null], fields.DCID.isInvalid],
        ["_USERID", [fields._USERID.visible && fields._USERID.required ? ew.Validators.required(fields._USERID.caption) : null], fields._USERID.isInvalid],
        ["MODDT", [fields.MODDT.visible && fields.MODDT.required ? ew.Validators.required(fields.MODDT.caption) : null, ew.Validators.datetime(0)], fields.MODDT.isInvalid],
        ["FYM", [fields.FYM.visible && fields.FYM.required ? ew.Validators.required(fields.FYM.caption) : null], fields.FYM.isInvalid],
        ["PRCBATCH", [fields.PRCBATCH.visible && fields.PRCBATCH.required ? ew.Validators.required(fields.PRCBATCH.caption) : null], fields.PRCBATCH.isInvalid],
        ["SLNO", [fields.SLNO.visible && fields.SLNO.required ? ew.Validators.required(fields.SLNO.caption) : null, ew.Validators.integer], fields.SLNO.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["BILLYM", [fields.BILLYM.visible && fields.BILLYM.required ? ew.Validators.required(fields.BILLYM.caption) : null], fields.BILLYM.isInvalid],
        ["BILLGRP", [fields.BILLGRP.visible && fields.BILLGRP.required ? ew.Validators.required(fields.BILLGRP.caption) : null], fields.BILLGRP.isInvalid],
        ["STAFF", [fields.STAFF.visible && fields.STAFF.required ? ew.Validators.required(fields.STAFF.caption) : null], fields.STAFF.isInvalid],
        ["TEMPIPNO", [fields.TEMPIPNO.visible && fields.TEMPIPNO.required ? ew.Validators.required(fields.TEMPIPNO.caption) : null], fields.TEMPIPNO.isInvalid],
        ["PRNTED", [fields.PRNTED.visible && fields.PRNTED.required ? ew.Validators.required(fields.PRNTED.caption) : null], fields.PRNTED.isInvalid],
        ["PATNAME", [fields.PATNAME.visible && fields.PATNAME.required ? ew.Validators.required(fields.PATNAME.caption) : null], fields.PATNAME.isInvalid],
        ["PJVNO", [fields.PJVNO.visible && fields.PJVNO.required ? ew.Validators.required(fields.PJVNO.caption) : null], fields.PJVNO.isInvalid],
        ["PJVSLNO", [fields.PJVSLNO.visible && fields.PJVSLNO.required ? ew.Validators.required(fields.PJVSLNO.caption) : null], fields.PJVSLNO.isInvalid],
        ["OTHDISC", [fields.OTHDISC.visible && fields.OTHDISC.required ? ew.Validators.required(fields.OTHDISC.caption) : null, ew.Validators.float], fields.OTHDISC.isInvalid],
        ["PJVYM", [fields.PJVYM.visible && fields.PJVYM.required ? ew.Validators.required(fields.PJVYM.caption) : null], fields.PJVYM.isInvalid],
        ["PURDISCPER", [fields.PURDISCPER.visible && fields.PURDISCPER.required ? ew.Validators.required(fields.PURDISCPER.caption) : null, ew.Validators.float], fields.PURDISCPER.isInvalid],
        ["CASHIER", [fields.CASHIER.visible && fields.CASHIER.required ? ew.Validators.required(fields.CASHIER.caption) : null], fields.CASHIER.isInvalid],
        ["CASHTIME", [fields.CASHTIME.visible && fields.CASHTIME.required ? ew.Validators.required(fields.CASHTIME.caption) : null], fields.CASHTIME.isInvalid],
        ["CASHRECD", [fields.CASHRECD.visible && fields.CASHRECD.required ? ew.Validators.required(fields.CASHRECD.caption) : null, ew.Validators.float], fields.CASHRECD.isInvalid],
        ["CASHREFNO", [fields.CASHREFNO.visible && fields.CASHREFNO.required ? ew.Validators.required(fields.CASHREFNO.caption) : null], fields.CASHREFNO.isInvalid],
        ["CASHIERSHIFT", [fields.CASHIERSHIFT.visible && fields.CASHIERSHIFT.required ? ew.Validators.required(fields.CASHIERSHIFT.caption) : null], fields.CASHIERSHIFT.isInvalid],
        ["PRCODE", [fields.PRCODE.visible && fields.PRCODE.required ? ew.Validators.required(fields.PRCODE.caption) : null], fields.PRCODE.isInvalid],
        ["RELEASEBY", [fields.RELEASEBY.visible && fields.RELEASEBY.required ? ew.Validators.required(fields.RELEASEBY.caption) : null], fields.RELEASEBY.isInvalid],
        ["CRAUTHOR", [fields.CRAUTHOR.visible && fields.CRAUTHOR.required ? ew.Validators.required(fields.CRAUTHOR.caption) : null], fields.CRAUTHOR.isInvalid],
        ["PAYMENT", [fields.PAYMENT.visible && fields.PAYMENT.required ? ew.Validators.required(fields.PAYMENT.caption) : null], fields.PAYMENT.isInvalid],
        ["DRID", [fields.DRID.visible && fields.DRID.required ? ew.Validators.required(fields.DRID.caption) : null], fields.DRID.isInvalid],
        ["WARD", [fields.WARD.visible && fields.WARD.required ? ew.Validators.required(fields.WARD.caption) : null], fields.WARD.isInvalid],
        ["STAXTYPE", [fields.STAXTYPE.visible && fields.STAXTYPE.required ? ew.Validators.required(fields.STAXTYPE.caption) : null], fields.STAXTYPE.isInvalid],
        ["PURDISCVAL", [fields.PURDISCVAL.visible && fields.PURDISCVAL.required ? ew.Validators.required(fields.PURDISCVAL.caption) : null, ew.Validators.float], fields.PURDISCVAL.isInvalid],
        ["RNDOFF", [fields.RNDOFF.visible && fields.RNDOFF.required ? ew.Validators.required(fields.RNDOFF.caption) : null, ew.Validators.float], fields.RNDOFF.isInvalid],
        ["DISCONMRP", [fields.DISCONMRP.visible && fields.DISCONMRP.required ? ew.Validators.required(fields.DISCONMRP.caption) : null, ew.Validators.float], fields.DISCONMRP.isInvalid],
        ["DELVDT", [fields.DELVDT.visible && fields.DELVDT.required ? ew.Validators.required(fields.DELVDT.caption) : null, ew.Validators.datetime(0)], fields.DELVDT.isInvalid],
        ["DELVTIME", [fields.DELVTIME.visible && fields.DELVTIME.required ? ew.Validators.required(fields.DELVTIME.caption) : null], fields.DELVTIME.isInvalid],
        ["DELVBY", [fields.DELVBY.visible && fields.DELVBY.required ? ew.Validators.required(fields.DELVBY.caption) : null], fields.DELVBY.isInvalid],
        ["HOSPNO", [fields.HOSPNO.visible && fields.HOSPNO.required ? ew.Validators.required(fields.HOSPNO.caption) : null], fields.HOSPNO.isInvalid],
        ["pbv", [fields.pbv.visible && fields.pbv.required ? ew.Validators.required(fields.pbv.caption) : null, ew.Validators.integer], fields.pbv.isInvalid],
        ["pbt", [fields.pbt.visible && fields.pbt.required ? ew.Validators.required(fields.pbt.caption) : null, ew.Validators.integer], fields.pbt.isInvalid],
        ["SiNo", [fields.SiNo.visible && fields.SiNo.required ? ew.Validators.required(fields.SiNo.caption) : null, ew.Validators.integer], fields.SiNo.isInvalid],
        ["Product", [fields.Product.visible && fields.Product.required ? ew.Validators.required(fields.Product.caption) : null], fields.Product.isInvalid],
        ["Mfg", [fields.Mfg.visible && fields.Mfg.required ? ew.Validators.required(fields.Mfg.caption) : null], fields.Mfg.isInvalid],
        ["HosoID", [fields.HosoID.visible && fields.HosoID.required ? ew.Validators.required(fields.HosoID.caption) : null, ew.Validators.integer], fields.HosoID.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null, ew.Validators.integer], fields.PatID.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["BRNAME", [fields.BRNAME.visible && fields.BRNAME.required ? ew.Validators.required(fields.BRNAME.caption) : null], fields.BRNAME.isInvalid],
        ["StoreID", [fields.StoreID.visible && fields.StoreID.required ? ew.Validators.required(fields.StoreID.caption) : null, ew.Validators.integer], fields.StoreID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fstore_storeledadd,
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
    fstore_storeledadd.validate = function () {
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
    fstore_storeledadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fstore_storeledadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fstore_storeledadd");
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
<form name="fstore_storeledadd" id="fstore_storeledadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="store_storeled">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_store_storeled_BRCODE" for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<span id="el_store_storeled_BRCODE">
<input type="<?= $Page->BRCODE->getInputTextType() ?>" data-table="store_storeled" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" value="<?= $Page->BRCODE->EditValue ?>"<?= $Page->BRCODE->editAttributes() ?> aria-describedby="x_BRCODE_help">
<?= $Page->BRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
    <div id="r_TYPE" class="form-group row">
        <label id="elh_store_storeled_TYPE" for="x_TYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TYPE->caption() ?><?= $Page->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TYPE->cellAttributes() ?>>
<span id="el_store_storeled_TYPE">
<input type="<?= $Page->TYPE->getInputTextType() ?>" data-table="store_storeled" data-field="x_TYPE" name="x_TYPE" id="x_TYPE" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->TYPE->getPlaceHolder()) ?>" value="<?= $Page->TYPE->EditValue ?>"<?= $Page->TYPE->editAttributes() ?> aria-describedby="x_TYPE_help">
<?= $Page->TYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DN->Visible) { // DN ?>
    <div id="r_DN" class="form-group row">
        <label id="elh_store_storeled_DN" for="x_DN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DN->caption() ?><?= $Page->DN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DN->cellAttributes() ?>>
<span id="el_store_storeled_DN">
<input type="<?= $Page->DN->getInputTextType() ?>" data-table="store_storeled" data-field="x_DN" name="x_DN" id="x_DN" size="30" maxlength="46" placeholder="<?= HtmlEncode($Page->DN->getPlaceHolder()) ?>" value="<?= $Page->DN->EditValue ?>"<?= $Page->DN->editAttributes() ?> aria-describedby="x_DN_help">
<?= $Page->DN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DN->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RDN->Visible) { // RDN ?>
    <div id="r_RDN" class="form-group row">
        <label id="elh_store_storeled_RDN" for="x_RDN" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RDN->caption() ?><?= $Page->RDN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RDN->cellAttributes() ?>>
<span id="el_store_storeled_RDN">
<input type="<?= $Page->RDN->getInputTextType() ?>" data-table="store_storeled" data-field="x_RDN" name="x_RDN" id="x_RDN" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->RDN->getPlaceHolder()) ?>" value="<?= $Page->RDN->EditValue ?>"<?= $Page->RDN->editAttributes() ?> aria-describedby="x_RDN_help">
<?= $Page->RDN->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RDN->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_store_storeled_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<span id="el_store_storeled_DT">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="store_storeled" data-field="x_DT" name="x_DT" id="x_DT" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?> aria-describedby="x_DT_help">
<?= $Page->DT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage() ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_storeledadd", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label id="elh_store_storeled_PRC" for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
<span id="el_store_storeled_PRC">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="store_storeled" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?> aria-describedby="x_PRC_help">
<?= $Page->PRC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
    <div id="r_OQ" class="form-group row">
        <label id="elh_store_storeled_OQ" for="x_OQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OQ->caption() ?><?= $Page->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OQ->cellAttributes() ?>>
<span id="el_store_storeled_OQ">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="store_storeled" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?> aria-describedby="x_OQ_help">
<?= $Page->OQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
    <div id="r_RQ" class="form-group row">
        <label id="elh_store_storeled_RQ" for="x_RQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RQ->caption() ?><?= $Page->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RQ->cellAttributes() ?>>
<span id="el_store_storeled_RQ">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="store_storeled" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?> aria-describedby="x_RQ_help">
<?= $Page->RQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <div id="r_MRQ" class="form-group row">
        <label id="elh_store_storeled_MRQ" for="x_MRQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRQ->caption() ?><?= $Page->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRQ->cellAttributes() ?>>
<span id="el_store_storeled_MRQ">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="store_storeled" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?> aria-describedby="x_MRQ_help">
<?= $Page->MRQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <div id="r_IQ" class="form-group row">
        <label id="elh_store_storeled_IQ" for="x_IQ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IQ->caption() ?><?= $Page->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IQ->cellAttributes() ?>>
<span id="el_store_storeled_IQ">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="store_storeled" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?> aria-describedby="x_IQ_help">
<?= $Page->IQ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <div id="r_BATCHNO" class="form-group row">
        <label id="elh_store_storeled_BATCHNO" for="x_BATCHNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BATCHNO->caption() ?><?= $Page->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCHNO->cellAttributes() ?>>
<span id="el_store_storeled_BATCHNO">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?> aria-describedby="x_BATCHNO_help">
<?= $Page->BATCHNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <div id="r_EXPDT" class="form-group row">
        <label id="elh_store_storeled_EXPDT" for="x_EXPDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EXPDT->caption() ?><?= $Page->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EXPDT->cellAttributes() ?>>
<span id="el_store_storeled_EXPDT">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="store_storeled" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?> aria-describedby="x_EXPDT_help">
<?= $Page->EXPDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_storeledadd", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLNO->Visible) { // BILLNO ?>
    <div id="r_BILLNO" class="form-group row">
        <label id="elh_store_storeled_BILLNO" for="x_BILLNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BILLNO->caption() ?><?= $Page->BILLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLNO->cellAttributes() ?>>
<span id="el_store_storeled_BILLNO">
<input type="<?= $Page->BILLNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_BILLNO" name="x_BILLNO" id="x_BILLNO" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->BILLNO->getPlaceHolder()) ?>" value="<?= $Page->BILLNO->EditValue ?>"<?= $Page->BILLNO->editAttributes() ?> aria-describedby="x_BILLNO_help">
<?= $Page->BILLNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BILLNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLDT->Visible) { // BILLDT ?>
    <div id="r_BILLDT" class="form-group row">
        <label id="elh_store_storeled_BILLDT" for="x_BILLDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BILLDT->caption() ?><?= $Page->BILLDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLDT->cellAttributes() ?>>
<span id="el_store_storeled_BILLDT">
<input type="<?= $Page->BILLDT->getInputTextType() ?>" data-table="store_storeled" data-field="x_BILLDT" name="x_BILLDT" id="x_BILLDT" placeholder="<?= HtmlEncode($Page->BILLDT->getPlaceHolder()) ?>" value="<?= $Page->BILLDT->EditValue ?>"<?= $Page->BILLDT->editAttributes() ?> aria-describedby="x_BILLDT_help">
<?= $Page->BILLDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BILLDT->getErrorMessage() ?></div>
<?php if (!$Page->BILLDT->ReadOnly && !$Page->BILLDT->Disabled && !isset($Page->BILLDT->EditAttrs["readonly"]) && !isset($Page->BILLDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_storeledadd", "x_BILLDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <div id="r_RT" class="form-group row">
        <label id="elh_store_storeled_RT" for="x_RT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RT->caption() ?><?= $Page->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RT->cellAttributes() ?>>
<span id="el_store_storeled_RT">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="store_storeled" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?> aria-describedby="x_RT_help">
<?= $Page->RT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VALUE->Visible) { // VALUE ?>
    <div id="r_VALUE" class="form-group row">
        <label id="elh_store_storeled_VALUE" for="x_VALUE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VALUE->caption() ?><?= $Page->VALUE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VALUE->cellAttributes() ?>>
<span id="el_store_storeled_VALUE">
<input type="<?= $Page->VALUE->getInputTextType() ?>" data-table="store_storeled" data-field="x_VALUE" name="x_VALUE" id="x_VALUE" size="30" placeholder="<?= HtmlEncode($Page->VALUE->getPlaceHolder()) ?>" value="<?= $Page->VALUE->EditValue ?>"<?= $Page->VALUE->editAttributes() ?> aria-describedby="x_VALUE_help">
<?= $Page->VALUE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VALUE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DISC->Visible) { // DISC ?>
    <div id="r_DISC" class="form-group row">
        <label id="elh_store_storeled_DISC" for="x_DISC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DISC->caption() ?><?= $Page->DISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DISC->cellAttributes() ?>>
<span id="el_store_storeled_DISC">
<input type="<?= $Page->DISC->getInputTextType() ?>" data-table="store_storeled" data-field="x_DISC" name="x_DISC" id="x_DISC" size="30" placeholder="<?= HtmlEncode($Page->DISC->getPlaceHolder()) ?>" value="<?= $Page->DISC->EditValue ?>"<?= $Page->DISC->editAttributes() ?> aria-describedby="x_DISC_help">
<?= $Page->DISC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DISC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
    <div id="r_TAXP" class="form-group row">
        <label id="elh_store_storeled_TAXP" for="x_TAXP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TAXP->caption() ?><?= $Page->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXP->cellAttributes() ?>>
<span id="el_store_storeled_TAXP">
<input type="<?= $Page->TAXP->getInputTextType() ?>" data-table="store_storeled" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?= HtmlEncode($Page->TAXP->getPlaceHolder()) ?>" value="<?= $Page->TAXP->EditValue ?>"<?= $Page->TAXP->editAttributes() ?> aria-describedby="x_TAXP_help">
<?= $Page->TAXP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TAXP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TAX->Visible) { // TAX ?>
    <div id="r_TAX" class="form-group row">
        <label id="elh_store_storeled_TAX" for="x_TAX" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TAX->caption() ?><?= $Page->TAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAX->cellAttributes() ?>>
<span id="el_store_storeled_TAX">
<input type="<?= $Page->TAX->getInputTextType() ?>" data-table="store_storeled" data-field="x_TAX" name="x_TAX" id="x_TAX" size="30" placeholder="<?= HtmlEncode($Page->TAX->getPlaceHolder()) ?>" value="<?= $Page->TAX->EditValue ?>"<?= $Page->TAX->editAttributes() ?> aria-describedby="x_TAX_help">
<?= $Page->TAX->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TAX->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXR->Visible) { // TAXR ?>
    <div id="r_TAXR" class="form-group row">
        <label id="elh_store_storeled_TAXR" for="x_TAXR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TAXR->caption() ?><?= $Page->TAXR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXR->cellAttributes() ?>>
<span id="el_store_storeled_TAXR">
<input type="<?= $Page->TAXR->getInputTextType() ?>" data-table="store_storeled" data-field="x_TAXR" name="x_TAXR" id="x_TAXR" size="30" placeholder="<?= HtmlEncode($Page->TAXR->getPlaceHolder()) ?>" value="<?= $Page->TAXR->EditValue ?>"<?= $Page->TAXR->editAttributes() ?> aria-describedby="x_TAXR_help">
<?= $Page->TAXR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TAXR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DAMT->Visible) { // DAMT ?>
    <div id="r_DAMT" class="form-group row">
        <label id="elh_store_storeled_DAMT" for="x_DAMT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DAMT->caption() ?><?= $Page->DAMT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DAMT->cellAttributes() ?>>
<span id="el_store_storeled_DAMT">
<input type="<?= $Page->DAMT->getInputTextType() ?>" data-table="store_storeled" data-field="x_DAMT" name="x_DAMT" id="x_DAMT" size="30" placeholder="<?= HtmlEncode($Page->DAMT->getPlaceHolder()) ?>" value="<?= $Page->DAMT->EditValue ?>"<?= $Page->DAMT->editAttributes() ?> aria-describedby="x_DAMT_help">
<?= $Page->DAMT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DAMT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EMPNO->Visible) { // EMPNO ?>
    <div id="r_EMPNO" class="form-group row">
        <label id="elh_store_storeled_EMPNO" for="x_EMPNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EMPNO->caption() ?><?= $Page->EMPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EMPNO->cellAttributes() ?>>
<span id="el_store_storeled_EMPNO">
<input type="<?= $Page->EMPNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_EMPNO" name="x_EMPNO" id="x_EMPNO" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->EMPNO->getPlaceHolder()) ?>" value="<?= $Page->EMPNO->EditValue ?>"<?= $Page->EMPNO->editAttributes() ?> aria-describedby="x_EMPNO_help">
<?= $Page->EMPNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EMPNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_store_storeled_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<span id="el_store_storeled_PC">
<input type="<?= $Page->PC->getInputTextType() ?>" data-table="store_storeled" data-field="x_PC" name="x_PC" id="x_PC" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->PC->getPlaceHolder()) ?>" value="<?= $Page->PC->EditValue ?>"<?= $Page->PC->editAttributes() ?> aria-describedby="x_PC_help">
<?= $Page->PC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DRNAME->Visible) { // DRNAME ?>
    <div id="r_DRNAME" class="form-group row">
        <label id="elh_store_storeled_DRNAME" for="x_DRNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DRNAME->caption() ?><?= $Page->DRNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DRNAME->cellAttributes() ?>>
<span id="el_store_storeled_DRNAME">
<input type="<?= $Page->DRNAME->getInputTextType() ?>" data-table="store_storeled" data-field="x_DRNAME" name="x_DRNAME" id="x_DRNAME" size="30" maxlength="40" placeholder="<?= HtmlEncode($Page->DRNAME->getPlaceHolder()) ?>" value="<?= $Page->DRNAME->EditValue ?>"<?= $Page->DRNAME->editAttributes() ?> aria-describedby="x_DRNAME_help">
<?= $Page->DRNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DRNAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BTIME->Visible) { // BTIME ?>
    <div id="r_BTIME" class="form-group row">
        <label id="elh_store_storeled_BTIME" for="x_BTIME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BTIME->caption() ?><?= $Page->BTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BTIME->cellAttributes() ?>>
<span id="el_store_storeled_BTIME">
<input type="<?= $Page->BTIME->getInputTextType() ?>" data-table="store_storeled" data-field="x_BTIME" name="x_BTIME" id="x_BTIME" size="30" maxlength="8" placeholder="<?= HtmlEncode($Page->BTIME->getPlaceHolder()) ?>" value="<?= $Page->BTIME->EditValue ?>"<?= $Page->BTIME->editAttributes() ?> aria-describedby="x_BTIME_help">
<?= $Page->BTIME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BTIME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ONO->Visible) { // ONO ?>
    <div id="r_ONO" class="form-group row">
        <label id="elh_store_storeled_ONO" for="x_ONO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ONO->caption() ?><?= $Page->ONO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ONO->cellAttributes() ?>>
<span id="el_store_storeled_ONO">
<input type="<?= $Page->ONO->getInputTextType() ?>" data-table="store_storeled" data-field="x_ONO" name="x_ONO" id="x_ONO" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->ONO->getPlaceHolder()) ?>" value="<?= $Page->ONO->EditValue ?>"<?= $Page->ONO->editAttributes() ?> aria-describedby="x_ONO_help">
<?= $Page->ONO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ONO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ODT->Visible) { // ODT ?>
    <div id="r_ODT" class="form-group row">
        <label id="elh_store_storeled_ODT" for="x_ODT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ODT->caption() ?><?= $Page->ODT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ODT->cellAttributes() ?>>
<span id="el_store_storeled_ODT">
<input type="<?= $Page->ODT->getInputTextType() ?>" data-table="store_storeled" data-field="x_ODT" name="x_ODT" id="x_ODT" placeholder="<?= HtmlEncode($Page->ODT->getPlaceHolder()) ?>" value="<?= $Page->ODT->EditValue ?>"<?= $Page->ODT->editAttributes() ?> aria-describedby="x_ODT_help">
<?= $Page->ODT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ODT->getErrorMessage() ?></div>
<?php if (!$Page->ODT->ReadOnly && !$Page->ODT->Disabled && !isset($Page->ODT->EditAttrs["readonly"]) && !isset($Page->ODT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_storeledadd", "x_ODT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PURRT->Visible) { // PURRT ?>
    <div id="r_PURRT" class="form-group row">
        <label id="elh_store_storeled_PURRT" for="x_PURRT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PURRT->caption() ?><?= $Page->PURRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PURRT->cellAttributes() ?>>
<span id="el_store_storeled_PURRT">
<input type="<?= $Page->PURRT->getInputTextType() ?>" data-table="store_storeled" data-field="x_PURRT" name="x_PURRT" id="x_PURRT" size="30" placeholder="<?= HtmlEncode($Page->PURRT->getPlaceHolder()) ?>" value="<?= $Page->PURRT->EditValue ?>"<?= $Page->PURRT->editAttributes() ?> aria-describedby="x_PURRT_help">
<?= $Page->PURRT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PURRT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GRP->Visible) { // GRP ?>
    <div id="r_GRP" class="form-group row">
        <label id="elh_store_storeled_GRP" for="x_GRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GRP->caption() ?><?= $Page->GRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRP->cellAttributes() ?>>
<span id="el_store_storeled_GRP">
<input type="<?= $Page->GRP->getInputTextType() ?>" data-table="store_storeled" data-field="x_GRP" name="x_GRP" id="x_GRP" size="30" maxlength="21" placeholder="<?= HtmlEncode($Page->GRP->getPlaceHolder()) ?>" value="<?= $Page->GRP->EditValue ?>"<?= $Page->GRP->editAttributes() ?> aria-describedby="x_GRP_help">
<?= $Page->GRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IBATCH->Visible) { // IBATCH ?>
    <div id="r_IBATCH" class="form-group row">
        <label id="elh_store_storeled_IBATCH" for="x_IBATCH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IBATCH->caption() ?><?= $Page->IBATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IBATCH->cellAttributes() ?>>
<span id="el_store_storeled_IBATCH">
<input type="<?= $Page->IBATCH->getInputTextType() ?>" data-table="store_storeled" data-field="x_IBATCH" name="x_IBATCH" id="x_IBATCH" size="30" maxlength="11" placeholder="<?= HtmlEncode($Page->IBATCH->getPlaceHolder()) ?>" value="<?= $Page->IBATCH->EditValue ?>"<?= $Page->IBATCH->editAttributes() ?> aria-describedby="x_IBATCH_help">
<?= $Page->IBATCH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IBATCH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->IPNO->Visible) { // IPNO ?>
    <div id="r_IPNO" class="form-group row">
        <label id="elh_store_storeled_IPNO" for="x_IPNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->IPNO->caption() ?><?= $Page->IPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IPNO->cellAttributes() ?>>
<span id="el_store_storeled_IPNO">
<input type="<?= $Page->IPNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_IPNO" name="x_IPNO" id="x_IPNO" size="30" maxlength="16" placeholder="<?= HtmlEncode($Page->IPNO->getPlaceHolder()) ?>" value="<?= $Page->IPNO->EditValue ?>"<?= $Page->IPNO->editAttributes() ?> aria-describedby="x_IPNO_help">
<?= $Page->IPNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->IPNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OPNO->Visible) { // OPNO ?>
    <div id="r_OPNO" class="form-group row">
        <label id="elh_store_storeled_OPNO" for="x_OPNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OPNO->caption() ?><?= $Page->OPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPNO->cellAttributes() ?>>
<span id="el_store_storeled_OPNO">
<input type="<?= $Page->OPNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_OPNO" name="x_OPNO" id="x_OPNO" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->OPNO->getPlaceHolder()) ?>" value="<?= $Page->OPNO->EditValue ?>"<?= $Page->OPNO->editAttributes() ?> aria-describedby="x_OPNO_help">
<?= $Page->OPNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OPNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RECID->Visible) { // RECID ?>
    <div id="r_RECID" class="form-group row">
        <label id="elh_store_storeled_RECID" for="x_RECID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RECID->caption() ?><?= $Page->RECID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RECID->cellAttributes() ?>>
<span id="el_store_storeled_RECID">
<input type="<?= $Page->RECID->getInputTextType() ?>" data-table="store_storeled" data-field="x_RECID" name="x_RECID" id="x_RECID" size="30" maxlength="18" placeholder="<?= HtmlEncode($Page->RECID->getPlaceHolder()) ?>" value="<?= $Page->RECID->EditValue ?>"<?= $Page->RECID->editAttributes() ?> aria-describedby="x_RECID_help">
<?= $Page->RECID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RECID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FQTY->Visible) { // FQTY ?>
    <div id="r_FQTY" class="form-group row">
        <label id="elh_store_storeled_FQTY" for="x_FQTY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FQTY->caption() ?><?= $Page->FQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FQTY->cellAttributes() ?>>
<span id="el_store_storeled_FQTY">
<input type="<?= $Page->FQTY->getInputTextType() ?>" data-table="store_storeled" data-field="x_FQTY" name="x_FQTY" id="x_FQTY" size="30" placeholder="<?= HtmlEncode($Page->FQTY->getPlaceHolder()) ?>" value="<?= $Page->FQTY->EditValue ?>"<?= $Page->FQTY->editAttributes() ?> aria-describedby="x_FQTY_help">
<?= $Page->FQTY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FQTY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
    <div id="r_UR" class="form-group row">
        <label id="elh_store_storeled_UR" for="x_UR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->UR->caption() ?><?= $Page->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UR->cellAttributes() ?>>
<span id="el_store_storeled_UR">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="store_storeled" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?> aria-describedby="x_UR_help">
<?= $Page->UR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DCID->Visible) { // DCID ?>
    <div id="r_DCID" class="form-group row">
        <label id="elh_store_storeled_DCID" for="x_DCID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DCID->caption() ?><?= $Page->DCID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DCID->cellAttributes() ?>>
<span id="el_store_storeled_DCID">
<input type="<?= $Page->DCID->getInputTextType() ?>" data-table="store_storeled" data-field="x_DCID" name="x_DCID" id="x_DCID" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->DCID->getPlaceHolder()) ?>" value="<?= $Page->DCID->EditValue ?>"<?= $Page->DCID->editAttributes() ?> aria-describedby="x_DCID_help">
<?= $Page->DCID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DCID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_USERID->Visible) { // USERID ?>
    <div id="r__USERID" class="form-group row">
        <label id="elh_store_storeled__USERID" for="x__USERID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_USERID->caption() ?><?= $Page->_USERID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_USERID->cellAttributes() ?>>
<span id="el_store_storeled__USERID">
<input type="<?= $Page->_USERID->getInputTextType() ?>" data-table="store_storeled" data-field="x__USERID" name="x__USERID" id="x__USERID" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->_USERID->getPlaceHolder()) ?>" value="<?= $Page->_USERID->EditValue ?>"<?= $Page->_USERID->editAttributes() ?> aria-describedby="x__USERID_help">
<?= $Page->_USERID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_USERID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MODDT->Visible) { // MODDT ?>
    <div id="r_MODDT" class="form-group row">
        <label id="elh_store_storeled_MODDT" for="x_MODDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MODDT->caption() ?><?= $Page->MODDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MODDT->cellAttributes() ?>>
<span id="el_store_storeled_MODDT">
<input type="<?= $Page->MODDT->getInputTextType() ?>" data-table="store_storeled" data-field="x_MODDT" name="x_MODDT" id="x_MODDT" placeholder="<?= HtmlEncode($Page->MODDT->getPlaceHolder()) ?>" value="<?= $Page->MODDT->EditValue ?>"<?= $Page->MODDT->editAttributes() ?> aria-describedby="x_MODDT_help">
<?= $Page->MODDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MODDT->getErrorMessage() ?></div>
<?php if (!$Page->MODDT->ReadOnly && !$Page->MODDT->Disabled && !isset($Page->MODDT->EditAttrs["readonly"]) && !isset($Page->MODDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_storeledadd", "x_MODDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FYM->Visible) { // FYM ?>
    <div id="r_FYM" class="form-group row">
        <label id="elh_store_storeled_FYM" for="x_FYM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FYM->caption() ?><?= $Page->FYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FYM->cellAttributes() ?>>
<span id="el_store_storeled_FYM">
<input type="<?= $Page->FYM->getInputTextType() ?>" data-table="store_storeled" data-field="x_FYM" name="x_FYM" id="x_FYM" size="30" maxlength="8" placeholder="<?= HtmlEncode($Page->FYM->getPlaceHolder()) ?>" value="<?= $Page->FYM->EditValue ?>"<?= $Page->FYM->editAttributes() ?> aria-describedby="x_FYM_help">
<?= $Page->FYM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FYM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRCBATCH->Visible) { // PRCBATCH ?>
    <div id="r_PRCBATCH" class="form-group row">
        <label id="elh_store_storeled_PRCBATCH" for="x_PRCBATCH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRCBATCH->caption() ?><?= $Page->PRCBATCH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRCBATCH->cellAttributes() ?>>
<span id="el_store_storeled_PRCBATCH">
<input type="<?= $Page->PRCBATCH->getInputTextType() ?>" data-table="store_storeled" data-field="x_PRCBATCH" name="x_PRCBATCH" id="x_PRCBATCH" size="30" maxlength="23" placeholder="<?= HtmlEncode($Page->PRCBATCH->getPlaceHolder()) ?>" value="<?= $Page->PRCBATCH->EditValue ?>"<?= $Page->PRCBATCH->editAttributes() ?> aria-describedby="x_PRCBATCH_help">
<?= $Page->PRCBATCH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRCBATCH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
    <div id="r_SLNO" class="form-group row">
        <label id="elh_store_storeled_SLNO" for="x_SLNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SLNO->caption() ?><?= $Page->SLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SLNO->cellAttributes() ?>>
<span id="el_store_storeled_SLNO">
<input type="<?= $Page->SLNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_SLNO" name="x_SLNO" id="x_SLNO" size="30" placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>" value="<?= $Page->SLNO->EditValue ?>"<?= $Page->SLNO->editAttributes() ?> aria-describedby="x_SLNO_help">
<?= $Page->SLNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SLNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label id="elh_store_storeled_MRP" for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MRP->caption() ?><?= $Page->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
<span id="el_store_storeled_MRP">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="store_storeled" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?> aria-describedby="x_MRP_help">
<?= $Page->MRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLYM->Visible) { // BILLYM ?>
    <div id="r_BILLYM" class="form-group row">
        <label id="elh_store_storeled_BILLYM" for="x_BILLYM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BILLYM->caption() ?><?= $Page->BILLYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLYM->cellAttributes() ?>>
<span id="el_store_storeled_BILLYM">
<input type="<?= $Page->BILLYM->getInputTextType() ?>" data-table="store_storeled" data-field="x_BILLYM" name="x_BILLYM" id="x_BILLYM" size="30" maxlength="8" placeholder="<?= HtmlEncode($Page->BILLYM->getPlaceHolder()) ?>" value="<?= $Page->BILLYM->EditValue ?>"<?= $Page->BILLYM->editAttributes() ?> aria-describedby="x_BILLYM_help">
<?= $Page->BILLYM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BILLYM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BILLGRP->Visible) { // BILLGRP ?>
    <div id="r_BILLGRP" class="form-group row">
        <label id="elh_store_storeled_BILLGRP" for="x_BILLGRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BILLGRP->caption() ?><?= $Page->BILLGRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BILLGRP->cellAttributes() ?>>
<span id="el_store_storeled_BILLGRP">
<input type="<?= $Page->BILLGRP->getInputTextType() ?>" data-table="store_storeled" data-field="x_BILLGRP" name="x_BILLGRP" id="x_BILLGRP" size="30" maxlength="21" placeholder="<?= HtmlEncode($Page->BILLGRP->getPlaceHolder()) ?>" value="<?= $Page->BILLGRP->EditValue ?>"<?= $Page->BILLGRP->editAttributes() ?> aria-describedby="x_BILLGRP_help">
<?= $Page->BILLGRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BILLGRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->STAFF->Visible) { // STAFF ?>
    <div id="r_STAFF" class="form-group row">
        <label id="elh_store_storeled_STAFF" for="x_STAFF" class="<?= $Page->LeftColumnClass ?>"><?= $Page->STAFF->caption() ?><?= $Page->STAFF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STAFF->cellAttributes() ?>>
<span id="el_store_storeled_STAFF">
<input type="<?= $Page->STAFF->getInputTextType() ?>" data-table="store_storeled" data-field="x_STAFF" name="x_STAFF" id="x_STAFF" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->STAFF->getPlaceHolder()) ?>" value="<?= $Page->STAFF->EditValue ?>"<?= $Page->STAFF->editAttributes() ?> aria-describedby="x_STAFF_help">
<?= $Page->STAFF->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->STAFF->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TEMPIPNO->Visible) { // TEMPIPNO ?>
    <div id="r_TEMPIPNO" class="form-group row">
        <label id="elh_store_storeled_TEMPIPNO" for="x_TEMPIPNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TEMPIPNO->caption() ?><?= $Page->TEMPIPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TEMPIPNO->cellAttributes() ?>>
<span id="el_store_storeled_TEMPIPNO">
<input type="<?= $Page->TEMPIPNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_TEMPIPNO" name="x_TEMPIPNO" id="x_TEMPIPNO" size="30" maxlength="16" placeholder="<?= HtmlEncode($Page->TEMPIPNO->getPlaceHolder()) ?>" value="<?= $Page->TEMPIPNO->EditValue ?>"<?= $Page->TEMPIPNO->editAttributes() ?> aria-describedby="x_TEMPIPNO_help">
<?= $Page->TEMPIPNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TEMPIPNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRNTED->Visible) { // PRNTED ?>
    <div id="r_PRNTED" class="form-group row">
        <label id="elh_store_storeled_PRNTED" for="x_PRNTED" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRNTED->caption() ?><?= $Page->PRNTED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRNTED->cellAttributes() ?>>
<span id="el_store_storeled_PRNTED">
<input type="<?= $Page->PRNTED->getInputTextType() ?>" data-table="store_storeled" data-field="x_PRNTED" name="x_PRNTED" id="x_PRNTED" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->PRNTED->getPlaceHolder()) ?>" value="<?= $Page->PRNTED->EditValue ?>"<?= $Page->PRNTED->editAttributes() ?> aria-describedby="x_PRNTED_help">
<?= $Page->PRNTED->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRNTED->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PATNAME->Visible) { // PATNAME ?>
    <div id="r_PATNAME" class="form-group row">
        <label id="elh_store_storeled_PATNAME" for="x_PATNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PATNAME->caption() ?><?= $Page->PATNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PATNAME->cellAttributes() ?>>
<span id="el_store_storeled_PATNAME">
<input type="<?= $Page->PATNAME->getInputTextType() ?>" data-table="store_storeled" data-field="x_PATNAME" name="x_PATNAME" id="x_PATNAME" size="30" maxlength="99" placeholder="<?= HtmlEncode($Page->PATNAME->getPlaceHolder()) ?>" value="<?= $Page->PATNAME->EditValue ?>"<?= $Page->PATNAME->editAttributes() ?> aria-describedby="x_PATNAME_help">
<?= $Page->PATNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PATNAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PJVNO->Visible) { // PJVNO ?>
    <div id="r_PJVNO" class="form-group row">
        <label id="elh_store_storeled_PJVNO" for="x_PJVNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PJVNO->caption() ?><?= $Page->PJVNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PJVNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVNO">
<input type="<?= $Page->PJVNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_PJVNO" name="x_PJVNO" id="x_PJVNO" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->PJVNO->getPlaceHolder()) ?>" value="<?= $Page->PJVNO->EditValue ?>"<?= $Page->PJVNO->editAttributes() ?> aria-describedby="x_PJVNO_help">
<?= $Page->PJVNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PJVNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PJVSLNO->Visible) { // PJVSLNO ?>
    <div id="r_PJVSLNO" class="form-group row">
        <label id="elh_store_storeled_PJVSLNO" for="x_PJVSLNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PJVSLNO->caption() ?><?= $Page->PJVSLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PJVSLNO->cellAttributes() ?>>
<span id="el_store_storeled_PJVSLNO">
<input type="<?= $Page->PJVSLNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_PJVSLNO" name="x_PJVSLNO" id="x_PJVSLNO" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->PJVSLNO->getPlaceHolder()) ?>" value="<?= $Page->PJVSLNO->EditValue ?>"<?= $Page->PJVSLNO->editAttributes() ?> aria-describedby="x_PJVSLNO_help">
<?= $Page->PJVSLNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PJVSLNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OTHDISC->Visible) { // OTHDISC ?>
    <div id="r_OTHDISC" class="form-group row">
        <label id="elh_store_storeled_OTHDISC" for="x_OTHDISC" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OTHDISC->caption() ?><?= $Page->OTHDISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OTHDISC->cellAttributes() ?>>
<span id="el_store_storeled_OTHDISC">
<input type="<?= $Page->OTHDISC->getInputTextType() ?>" data-table="store_storeled" data-field="x_OTHDISC" name="x_OTHDISC" id="x_OTHDISC" size="30" placeholder="<?= HtmlEncode($Page->OTHDISC->getPlaceHolder()) ?>" value="<?= $Page->OTHDISC->EditValue ?>"<?= $Page->OTHDISC->editAttributes() ?> aria-describedby="x_OTHDISC_help">
<?= $Page->OTHDISC->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OTHDISC->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PJVYM->Visible) { // PJVYM ?>
    <div id="r_PJVYM" class="form-group row">
        <label id="elh_store_storeled_PJVYM" for="x_PJVYM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PJVYM->caption() ?><?= $Page->PJVYM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PJVYM->cellAttributes() ?>>
<span id="el_store_storeled_PJVYM">
<input type="<?= $Page->PJVYM->getInputTextType() ?>" data-table="store_storeled" data-field="x_PJVYM" name="x_PJVYM" id="x_PJVYM" size="30" maxlength="6" placeholder="<?= HtmlEncode($Page->PJVYM->getPlaceHolder()) ?>" value="<?= $Page->PJVYM->EditValue ?>"<?= $Page->PJVYM->editAttributes() ?> aria-describedby="x_PJVYM_help">
<?= $Page->PJVYM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PJVYM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PURDISCPER->Visible) { // PURDISCPER ?>
    <div id="r_PURDISCPER" class="form-group row">
        <label id="elh_store_storeled_PURDISCPER" for="x_PURDISCPER" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PURDISCPER->caption() ?><?= $Page->PURDISCPER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PURDISCPER->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCPER">
<input type="<?= $Page->PURDISCPER->getInputTextType() ?>" data-table="store_storeled" data-field="x_PURDISCPER" name="x_PURDISCPER" id="x_PURDISCPER" size="30" placeholder="<?= HtmlEncode($Page->PURDISCPER->getPlaceHolder()) ?>" value="<?= $Page->PURDISCPER->EditValue ?>"<?= $Page->PURDISCPER->editAttributes() ?> aria-describedby="x_PURDISCPER_help">
<?= $Page->PURDISCPER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PURDISCPER->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CASHIER->Visible) { // CASHIER ?>
    <div id="r_CASHIER" class="form-group row">
        <label id="elh_store_storeled_CASHIER" for="x_CASHIER" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CASHIER->caption() ?><?= $Page->CASHIER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CASHIER->cellAttributes() ?>>
<span id="el_store_storeled_CASHIER">
<input type="<?= $Page->CASHIER->getInputTextType() ?>" data-table="store_storeled" data-field="x_CASHIER" name="x_CASHIER" id="x_CASHIER" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->CASHIER->getPlaceHolder()) ?>" value="<?= $Page->CASHIER->EditValue ?>"<?= $Page->CASHIER->editAttributes() ?> aria-describedby="x_CASHIER_help">
<?= $Page->CASHIER->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CASHIER->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CASHTIME->Visible) { // CASHTIME ?>
    <div id="r_CASHTIME" class="form-group row">
        <label id="elh_store_storeled_CASHTIME" for="x_CASHTIME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CASHTIME->caption() ?><?= $Page->CASHTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CASHTIME->cellAttributes() ?>>
<span id="el_store_storeled_CASHTIME">
<input type="<?= $Page->CASHTIME->getInputTextType() ?>" data-table="store_storeled" data-field="x_CASHTIME" name="x_CASHTIME" id="x_CASHTIME" size="30" maxlength="8" placeholder="<?= HtmlEncode($Page->CASHTIME->getPlaceHolder()) ?>" value="<?= $Page->CASHTIME->EditValue ?>"<?= $Page->CASHTIME->editAttributes() ?> aria-describedby="x_CASHTIME_help">
<?= $Page->CASHTIME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CASHTIME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CASHRECD->Visible) { // CASHRECD ?>
    <div id="r_CASHRECD" class="form-group row">
        <label id="elh_store_storeled_CASHRECD" for="x_CASHRECD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CASHRECD->caption() ?><?= $Page->CASHRECD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CASHRECD->cellAttributes() ?>>
<span id="el_store_storeled_CASHRECD">
<input type="<?= $Page->CASHRECD->getInputTextType() ?>" data-table="store_storeled" data-field="x_CASHRECD" name="x_CASHRECD" id="x_CASHRECD" size="30" placeholder="<?= HtmlEncode($Page->CASHRECD->getPlaceHolder()) ?>" value="<?= $Page->CASHRECD->EditValue ?>"<?= $Page->CASHRECD->editAttributes() ?> aria-describedby="x_CASHRECD_help">
<?= $Page->CASHRECD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CASHRECD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CASHREFNO->Visible) { // CASHREFNO ?>
    <div id="r_CASHREFNO" class="form-group row">
        <label id="elh_store_storeled_CASHREFNO" for="x_CASHREFNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CASHREFNO->caption() ?><?= $Page->CASHREFNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CASHREFNO->cellAttributes() ?>>
<span id="el_store_storeled_CASHREFNO">
<input type="<?= $Page->CASHREFNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_CASHREFNO" name="x_CASHREFNO" id="x_CASHREFNO" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->CASHREFNO->getPlaceHolder()) ?>" value="<?= $Page->CASHREFNO->EditValue ?>"<?= $Page->CASHREFNO->editAttributes() ?> aria-describedby="x_CASHREFNO_help">
<?= $Page->CASHREFNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CASHREFNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CASHIERSHIFT->Visible) { // CASHIERSHIFT ?>
    <div id="r_CASHIERSHIFT" class="form-group row">
        <label id="elh_store_storeled_CASHIERSHIFT" for="x_CASHIERSHIFT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CASHIERSHIFT->caption() ?><?= $Page->CASHIERSHIFT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CASHIERSHIFT->cellAttributes() ?>>
<span id="el_store_storeled_CASHIERSHIFT">
<input type="<?= $Page->CASHIERSHIFT->getInputTextType() ?>" data-table="store_storeled" data-field="x_CASHIERSHIFT" name="x_CASHIERSHIFT" id="x_CASHIERSHIFT" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->CASHIERSHIFT->getPlaceHolder()) ?>" value="<?= $Page->CASHIERSHIFT->EditValue ?>"<?= $Page->CASHIERSHIFT->editAttributes() ?> aria-describedby="x_CASHIERSHIFT_help">
<?= $Page->CASHIERSHIFT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CASHIERSHIFT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PRCODE->Visible) { // PRCODE ?>
    <div id="r_PRCODE" class="form-group row">
        <label id="elh_store_storeled_PRCODE" for="x_PRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PRCODE->caption() ?><?= $Page->PRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRCODE->cellAttributes() ?>>
<span id="el_store_storeled_PRCODE">
<input type="<?= $Page->PRCODE->getInputTextType() ?>" data-table="store_storeled" data-field="x_PRCODE" name="x_PRCODE" id="x_PRCODE" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRCODE->getPlaceHolder()) ?>" value="<?= $Page->PRCODE->EditValue ?>"<?= $Page->PRCODE->editAttributes() ?> aria-describedby="x_PRCODE_help">
<?= $Page->PRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RELEASEBY->Visible) { // RELEASEBY ?>
    <div id="r_RELEASEBY" class="form-group row">
        <label id="elh_store_storeled_RELEASEBY" for="x_RELEASEBY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RELEASEBY->caption() ?><?= $Page->RELEASEBY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RELEASEBY->cellAttributes() ?>>
<span id="el_store_storeled_RELEASEBY">
<input type="<?= $Page->RELEASEBY->getInputTextType() ?>" data-table="store_storeled" data-field="x_RELEASEBY" name="x_RELEASEBY" id="x_RELEASEBY" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->RELEASEBY->getPlaceHolder()) ?>" value="<?= $Page->RELEASEBY->EditValue ?>"<?= $Page->RELEASEBY->editAttributes() ?> aria-describedby="x_RELEASEBY_help">
<?= $Page->RELEASEBY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RELEASEBY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CRAUTHOR->Visible) { // CRAUTHOR ?>
    <div id="r_CRAUTHOR" class="form-group row">
        <label id="elh_store_storeled_CRAUTHOR" for="x_CRAUTHOR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CRAUTHOR->caption() ?><?= $Page->CRAUTHOR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CRAUTHOR->cellAttributes() ?>>
<span id="el_store_storeled_CRAUTHOR">
<input type="<?= $Page->CRAUTHOR->getInputTextType() ?>" data-table="store_storeled" data-field="x_CRAUTHOR" name="x_CRAUTHOR" id="x_CRAUTHOR" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->CRAUTHOR->getPlaceHolder()) ?>" value="<?= $Page->CRAUTHOR->EditValue ?>"<?= $Page->CRAUTHOR->editAttributes() ?> aria-describedby="x_CRAUTHOR_help">
<?= $Page->CRAUTHOR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CRAUTHOR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PAYMENT->Visible) { // PAYMENT ?>
    <div id="r_PAYMENT" class="form-group row">
        <label id="elh_store_storeled_PAYMENT" for="x_PAYMENT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PAYMENT->caption() ?><?= $Page->PAYMENT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PAYMENT->cellAttributes() ?>>
<span id="el_store_storeled_PAYMENT">
<input type="<?= $Page->PAYMENT->getInputTextType() ?>" data-table="store_storeled" data-field="x_PAYMENT" name="x_PAYMENT" id="x_PAYMENT" size="30" maxlength="4" placeholder="<?= HtmlEncode($Page->PAYMENT->getPlaceHolder()) ?>" value="<?= $Page->PAYMENT->EditValue ?>"<?= $Page->PAYMENT->editAttributes() ?> aria-describedby="x_PAYMENT_help">
<?= $Page->PAYMENT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PAYMENT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
    <div id="r_DRID" class="form-group row">
        <label id="elh_store_storeled_DRID" for="x_DRID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DRID->caption() ?><?= $Page->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DRID->cellAttributes() ?>>
<span id="el_store_storeled_DRID">
<input type="<?= $Page->DRID->getInputTextType() ?>" data-table="store_storeled" data-field="x_DRID" name="x_DRID" id="x_DRID" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->DRID->getPlaceHolder()) ?>" value="<?= $Page->DRID->EditValue ?>"<?= $Page->DRID->editAttributes() ?> aria-describedby="x_DRID_help">
<?= $Page->DRID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DRID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->WARD->Visible) { // WARD ?>
    <div id="r_WARD" class="form-group row">
        <label id="elh_store_storeled_WARD" for="x_WARD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->WARD->caption() ?><?= $Page->WARD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->WARD->cellAttributes() ?>>
<span id="el_store_storeled_WARD">
<input type="<?= $Page->WARD->getInputTextType() ?>" data-table="store_storeled" data-field="x_WARD" name="x_WARD" id="x_WARD" size="30" maxlength="30" placeholder="<?= HtmlEncode($Page->WARD->getPlaceHolder()) ?>" value="<?= $Page->WARD->EditValue ?>"<?= $Page->WARD->editAttributes() ?> aria-describedby="x_WARD_help">
<?= $Page->WARD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->WARD->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->STAXTYPE->Visible) { // STAXTYPE ?>
    <div id="r_STAXTYPE" class="form-group row">
        <label id="elh_store_storeled_STAXTYPE" for="x_STAXTYPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->STAXTYPE->caption() ?><?= $Page->STAXTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STAXTYPE->cellAttributes() ?>>
<span id="el_store_storeled_STAXTYPE">
<input type="<?= $Page->STAXTYPE->getInputTextType() ?>" data-table="store_storeled" data-field="x_STAXTYPE" name="x_STAXTYPE" id="x_STAXTYPE" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->STAXTYPE->getPlaceHolder()) ?>" value="<?= $Page->STAXTYPE->EditValue ?>"<?= $Page->STAXTYPE->editAttributes() ?> aria-describedby="x_STAXTYPE_help">
<?= $Page->STAXTYPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->STAXTYPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PURDISCVAL->Visible) { // PURDISCVAL ?>
    <div id="r_PURDISCVAL" class="form-group row">
        <label id="elh_store_storeled_PURDISCVAL" for="x_PURDISCVAL" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PURDISCVAL->caption() ?><?= $Page->PURDISCVAL->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PURDISCVAL->cellAttributes() ?>>
<span id="el_store_storeled_PURDISCVAL">
<input type="<?= $Page->PURDISCVAL->getInputTextType() ?>" data-table="store_storeled" data-field="x_PURDISCVAL" name="x_PURDISCVAL" id="x_PURDISCVAL" size="30" placeholder="<?= HtmlEncode($Page->PURDISCVAL->getPlaceHolder()) ?>" value="<?= $Page->PURDISCVAL->EditValue ?>"<?= $Page->PURDISCVAL->editAttributes() ?> aria-describedby="x_PURDISCVAL_help">
<?= $Page->PURDISCVAL->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PURDISCVAL->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RNDOFF->Visible) { // RNDOFF ?>
    <div id="r_RNDOFF" class="form-group row">
        <label id="elh_store_storeled_RNDOFF" for="x_RNDOFF" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RNDOFF->caption() ?><?= $Page->RNDOFF->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RNDOFF->cellAttributes() ?>>
<span id="el_store_storeled_RNDOFF">
<input type="<?= $Page->RNDOFF->getInputTextType() ?>" data-table="store_storeled" data-field="x_RNDOFF" name="x_RNDOFF" id="x_RNDOFF" size="30" placeholder="<?= HtmlEncode($Page->RNDOFF->getPlaceHolder()) ?>" value="<?= $Page->RNDOFF->EditValue ?>"<?= $Page->RNDOFF->editAttributes() ?> aria-describedby="x_RNDOFF_help">
<?= $Page->RNDOFF->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RNDOFF->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DISCONMRP->Visible) { // DISCONMRP ?>
    <div id="r_DISCONMRP" class="form-group row">
        <label id="elh_store_storeled_DISCONMRP" for="x_DISCONMRP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DISCONMRP->caption() ?><?= $Page->DISCONMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DISCONMRP->cellAttributes() ?>>
<span id="el_store_storeled_DISCONMRP">
<input type="<?= $Page->DISCONMRP->getInputTextType() ?>" data-table="store_storeled" data-field="x_DISCONMRP" name="x_DISCONMRP" id="x_DISCONMRP" size="30" placeholder="<?= HtmlEncode($Page->DISCONMRP->getPlaceHolder()) ?>" value="<?= $Page->DISCONMRP->EditValue ?>"<?= $Page->DISCONMRP->editAttributes() ?> aria-describedby="x_DISCONMRP_help">
<?= $Page->DISCONMRP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DISCONMRP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DELVDT->Visible) { // DELVDT ?>
    <div id="r_DELVDT" class="form-group row">
        <label id="elh_store_storeled_DELVDT" for="x_DELVDT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DELVDT->caption() ?><?= $Page->DELVDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DELVDT->cellAttributes() ?>>
<span id="el_store_storeled_DELVDT">
<input type="<?= $Page->DELVDT->getInputTextType() ?>" data-table="store_storeled" data-field="x_DELVDT" name="x_DELVDT" id="x_DELVDT" placeholder="<?= HtmlEncode($Page->DELVDT->getPlaceHolder()) ?>" value="<?= $Page->DELVDT->EditValue ?>"<?= $Page->DELVDT->editAttributes() ?> aria-describedby="x_DELVDT_help">
<?= $Page->DELVDT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DELVDT->getErrorMessage() ?></div>
<?php if (!$Page->DELVDT->ReadOnly && !$Page->DELVDT->Disabled && !isset($Page->DELVDT->EditAttrs["readonly"]) && !isset($Page->DELVDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_storeledadd", "x_DELVDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DELVTIME->Visible) { // DELVTIME ?>
    <div id="r_DELVTIME" class="form-group row">
        <label id="elh_store_storeled_DELVTIME" for="x_DELVTIME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DELVTIME->caption() ?><?= $Page->DELVTIME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DELVTIME->cellAttributes() ?>>
<span id="el_store_storeled_DELVTIME">
<input type="<?= $Page->DELVTIME->getInputTextType() ?>" data-table="store_storeled" data-field="x_DELVTIME" name="x_DELVTIME" id="x_DELVTIME" size="30" maxlength="8" placeholder="<?= HtmlEncode($Page->DELVTIME->getPlaceHolder()) ?>" value="<?= $Page->DELVTIME->EditValue ?>"<?= $Page->DELVTIME->editAttributes() ?> aria-describedby="x_DELVTIME_help">
<?= $Page->DELVTIME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DELVTIME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DELVBY->Visible) { // DELVBY ?>
    <div id="r_DELVBY" class="form-group row">
        <label id="elh_store_storeled_DELVBY" for="x_DELVBY" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DELVBY->caption() ?><?= $Page->DELVBY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DELVBY->cellAttributes() ?>>
<span id="el_store_storeled_DELVBY">
<input type="<?= $Page->DELVBY->getInputTextType() ?>" data-table="store_storeled" data-field="x_DELVBY" name="x_DELVBY" id="x_DELVBY" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->DELVBY->getPlaceHolder()) ?>" value="<?= $Page->DELVBY->EditValue ?>"<?= $Page->DELVBY->editAttributes() ?> aria-describedby="x_DELVBY_help">
<?= $Page->DELVBY->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DELVBY->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HOSPNO->Visible) { // HOSPNO ?>
    <div id="r_HOSPNO" class="form-group row">
        <label id="elh_store_storeled_HOSPNO" for="x_HOSPNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HOSPNO->caption() ?><?= $Page->HOSPNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HOSPNO->cellAttributes() ?>>
<span id="el_store_storeled_HOSPNO">
<input type="<?= $Page->HOSPNO->getInputTextType() ?>" data-table="store_storeled" data-field="x_HOSPNO" name="x_HOSPNO" id="x_HOSPNO" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->HOSPNO->getPlaceHolder()) ?>" value="<?= $Page->HOSPNO->EditValue ?>"<?= $Page->HOSPNO->editAttributes() ?> aria-describedby="x_HOSPNO_help">
<?= $Page->HOSPNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HOSPNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pbv->Visible) { // pbv ?>
    <div id="r_pbv" class="form-group row">
        <label id="elh_store_storeled_pbv" for="x_pbv" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pbv->caption() ?><?= $Page->pbv->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pbv->cellAttributes() ?>>
<span id="el_store_storeled_pbv">
<input type="<?= $Page->pbv->getInputTextType() ?>" data-table="store_storeled" data-field="x_pbv" name="x_pbv" id="x_pbv" size="30" placeholder="<?= HtmlEncode($Page->pbv->getPlaceHolder()) ?>" value="<?= $Page->pbv->EditValue ?>"<?= $Page->pbv->editAttributes() ?> aria-describedby="x_pbv_help">
<?= $Page->pbv->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pbv->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pbt->Visible) { // pbt ?>
    <div id="r_pbt" class="form-group row">
        <label id="elh_store_storeled_pbt" for="x_pbt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pbt->caption() ?><?= $Page->pbt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pbt->cellAttributes() ?>>
<span id="el_store_storeled_pbt">
<input type="<?= $Page->pbt->getInputTextType() ?>" data-table="store_storeled" data-field="x_pbt" name="x_pbt" id="x_pbt" size="30" placeholder="<?= HtmlEncode($Page->pbt->getPlaceHolder()) ?>" value="<?= $Page->pbt->EditValue ?>"<?= $Page->pbt->editAttributes() ?> aria-describedby="x_pbt_help">
<?= $Page->pbt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pbt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SiNo->Visible) { // SiNo ?>
    <div id="r_SiNo" class="form-group row">
        <label id="elh_store_storeled_SiNo" for="x_SiNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SiNo->caption() ?><?= $Page->SiNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SiNo->cellAttributes() ?>>
<span id="el_store_storeled_SiNo">
<input type="<?= $Page->SiNo->getInputTextType() ?>" data-table="store_storeled" data-field="x_SiNo" name="x_SiNo" id="x_SiNo" size="30" placeholder="<?= HtmlEncode($Page->SiNo->getPlaceHolder()) ?>" value="<?= $Page->SiNo->EditValue ?>"<?= $Page->SiNo->editAttributes() ?> aria-describedby="x_SiNo_help">
<?= $Page->SiNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SiNo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Product->Visible) { // Product ?>
    <div id="r_Product" class="form-group row">
        <label id="elh_store_storeled_Product" for="x_Product" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Product->caption() ?><?= $Page->Product->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Product->cellAttributes() ?>>
<span id="el_store_storeled_Product">
<input type="<?= $Page->Product->getInputTextType() ?>" data-table="store_storeled" data-field="x_Product" name="x_Product" id="x_Product" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Product->getPlaceHolder()) ?>" value="<?= $Page->Product->EditValue ?>"<?= $Page->Product->editAttributes() ?> aria-describedby="x_Product_help">
<?= $Page->Product->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Product->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mfg->Visible) { // Mfg ?>
    <div id="r_Mfg" class="form-group row">
        <label id="elh_store_storeled_Mfg" for="x_Mfg" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mfg->caption() ?><?= $Page->Mfg->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mfg->cellAttributes() ?>>
<span id="el_store_storeled_Mfg">
<input type="<?= $Page->Mfg->getInputTextType() ?>" data-table="store_storeled" data-field="x_Mfg" name="x_Mfg" id="x_Mfg" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mfg->getPlaceHolder()) ?>" value="<?= $Page->Mfg->EditValue ?>"<?= $Page->Mfg->editAttributes() ?> aria-describedby="x_Mfg_help">
<?= $Page->Mfg->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mfg->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HosoID->Visible) { // HosoID ?>
    <div id="r_HosoID" class="form-group row">
        <label id="elh_store_storeled_HosoID" for="x_HosoID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HosoID->caption() ?><?= $Page->HosoID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HosoID->cellAttributes() ?>>
<span id="el_store_storeled_HosoID">
<input type="<?= $Page->HosoID->getInputTextType() ?>" data-table="store_storeled" data-field="x_HosoID" name="x_HosoID" id="x_HosoID" size="30" placeholder="<?= HtmlEncode($Page->HosoID->getPlaceHolder()) ?>" value="<?= $Page->HosoID->EditValue ?>"<?= $Page->HosoID->editAttributes() ?> aria-describedby="x_HosoID_help">
<?= $Page->HosoID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HosoID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_store_storeled_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_store_storeled_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="store_storeled" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_store_storeled_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_store_storeled_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="store_storeled" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_storeledadd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_store_storeled_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_store_storeled_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="store_storeled" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_store_storeled_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_store_storeled_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="store_storeled" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fstore_storeledadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fstore_storeledadd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label id="elh_store_storeled_MFRCODE" for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MFRCODE->caption() ?><?= $Page->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
<span id="el_store_storeled_MFRCODE">
<input type="<?= $Page->MFRCODE->getInputTextType() ?>" data-table="store_storeled" data-field="x_MFRCODE" name="x_MFRCODE" id="x_MFRCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MFRCODE->getPlaceHolder()) ?>" value="<?= $Page->MFRCODE->EditValue ?>"<?= $Page->MFRCODE->editAttributes() ?> aria-describedby="x_MFRCODE_help">
<?= $Page->MFRCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_store_storeled_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_store_storeled_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="store_storeled" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_store_storeled_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_store_storeled_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="store_storeled" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_store_storeled_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_store_storeled_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="store_storeled" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
    <div id="r_BRNAME" class="form-group row">
        <label id="elh_store_storeled_BRNAME" for="x_BRNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BRNAME->caption() ?><?= $Page->BRNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRNAME->cellAttributes() ?>>
<span id="el_store_storeled_BRNAME">
<input type="<?= $Page->BRNAME->getInputTextType() ?>" data-table="store_storeled" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BRNAME->getPlaceHolder()) ?>" value="<?= $Page->BRNAME->EditValue ?>"<?= $Page->BRNAME->editAttributes() ?> aria-describedby="x_BRNAME_help">
<?= $Page->BRNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BRNAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StoreID->Visible) { // StoreID ?>
    <div id="r_StoreID" class="form-group row">
        <label id="elh_store_storeled_StoreID" for="x_StoreID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StoreID->caption() ?><?= $Page->StoreID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StoreID->cellAttributes() ?>>
<span id="el_store_storeled_StoreID">
<input type="<?= $Page->StoreID->getInputTextType() ?>" data-table="store_storeled" data-field="x_StoreID" name="x_StoreID" id="x_StoreID" size="30" placeholder="<?= HtmlEncode($Page->StoreID->getPlaceHolder()) ?>" value="<?= $Page->StoreID->EditValue ?>"<?= $Page->StoreID->editAttributes() ?> aria-describedby="x_StoreID_help">
<?= $Page->StoreID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StoreID->getErrorMessage() ?></div>
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
    ew.addEventHandlers("store_storeled");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

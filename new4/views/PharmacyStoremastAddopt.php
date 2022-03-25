<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyStoremastAddopt = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_storemastaddopt;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "addopt";
    fpharmacy_storemastaddopt = currentForm = new ew.Form("fpharmacy_storemastaddopt", "addopt");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_storemast")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_storemast)
        ew.vars.tables.pharmacy_storemast = currentTable;
    fpharmacy_storemastaddopt.addFields([
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid],
        ["PRC", [fields.PRC.visible && fields.PRC.required ? ew.Validators.required(fields.PRC.caption) : null], fields.PRC.isInvalid],
        ["TYPE", [fields.TYPE.visible && fields.TYPE.required ? ew.Validators.required(fields.TYPE.caption) : null], fields.TYPE.isInvalid],
        ["DES", [fields.DES.visible && fields.DES.required ? ew.Validators.required(fields.DES.caption) : null], fields.DES.isInvalid],
        ["UM", [fields.UM.visible && fields.UM.required ? ew.Validators.required(fields.UM.caption) : null], fields.UM.isInvalid],
        ["RT", [fields.RT.visible && fields.RT.required ? ew.Validators.required(fields.RT.caption) : null, ew.Validators.float], fields.RT.isInvalid],
        ["UR", [fields.UR.visible && fields.UR.required ? ew.Validators.required(fields.UR.caption) : null, ew.Validators.float], fields.UR.isInvalid],
        ["TAXP", [fields.TAXP.visible && fields.TAXP.required ? ew.Validators.required(fields.TAXP.caption) : null, ew.Validators.float], fields.TAXP.isInvalid],
        ["BATCHNO", [fields.BATCHNO.visible && fields.BATCHNO.required ? ew.Validators.required(fields.BATCHNO.caption) : null], fields.BATCHNO.isInvalid],
        ["OQ", [fields.OQ.visible && fields.OQ.required ? ew.Validators.required(fields.OQ.caption) : null, ew.Validators.float], fields.OQ.isInvalid],
        ["RQ", [fields.RQ.visible && fields.RQ.required ? ew.Validators.required(fields.RQ.caption) : null, ew.Validators.float], fields.RQ.isInvalid],
        ["MRQ", [fields.MRQ.visible && fields.MRQ.required ? ew.Validators.required(fields.MRQ.caption) : null, ew.Validators.float], fields.MRQ.isInvalid],
        ["IQ", [fields.IQ.visible && fields.IQ.required ? ew.Validators.required(fields.IQ.caption) : null, ew.Validators.float], fields.IQ.isInvalid],
        ["MRP", [fields.MRP.visible && fields.MRP.required ? ew.Validators.required(fields.MRP.caption) : null, ew.Validators.float], fields.MRP.isInvalid],
        ["EXPDT", [fields.EXPDT.visible && fields.EXPDT.required ? ew.Validators.required(fields.EXPDT.caption) : null, ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["SALQTY", [fields.SALQTY.visible && fields.SALQTY.required ? ew.Validators.required(fields.SALQTY.caption) : null, ew.Validators.float], fields.SALQTY.isInvalid],
        ["LASTPURDT", [fields.LASTPURDT.visible && fields.LASTPURDT.required ? ew.Validators.required(fields.LASTPURDT.caption) : null, ew.Validators.datetime(0)], fields.LASTPURDT.isInvalid],
        ["LASTSUPP", [fields.LASTSUPP.visible && fields.LASTSUPP.required ? ew.Validators.required(fields.LASTSUPP.caption) : null], fields.LASTSUPP.isInvalid],
        ["GENNAME", [fields.GENNAME.visible && fields.GENNAME.required ? ew.Validators.required(fields.GENNAME.caption) : null], fields.GENNAME.isInvalid],
        ["LASTISSDT", [fields.LASTISSDT.visible && fields.LASTISSDT.required ? ew.Validators.required(fields.LASTISSDT.caption) : null, ew.Validators.datetime(0)], fields.LASTISSDT.isInvalid],
        ["CREATEDDT", [fields.CREATEDDT.visible && fields.CREATEDDT.required ? ew.Validators.required(fields.CREATEDDT.caption) : null], fields.CREATEDDT.isInvalid],
        ["OPPRC", [fields.OPPRC.visible && fields.OPPRC.required ? ew.Validators.required(fields.OPPRC.caption) : null], fields.OPPRC.isInvalid],
        ["RESTRICT", [fields.RESTRICT.visible && fields.RESTRICT.required ? ew.Validators.required(fields.RESTRICT.caption) : null], fields.RESTRICT.isInvalid],
        ["BAWAPRC", [fields.BAWAPRC.visible && fields.BAWAPRC.required ? ew.Validators.required(fields.BAWAPRC.caption) : null], fields.BAWAPRC.isInvalid],
        ["STAXPER", [fields.STAXPER.visible && fields.STAXPER.required ? ew.Validators.required(fields.STAXPER.caption) : null, ew.Validators.float], fields.STAXPER.isInvalid],
        ["TAXTYPE", [fields.TAXTYPE.visible && fields.TAXTYPE.required ? ew.Validators.required(fields.TAXTYPE.caption) : null], fields.TAXTYPE.isInvalid],
        ["OLDTAXP", [fields.OLDTAXP.visible && fields.OLDTAXP.required ? ew.Validators.required(fields.OLDTAXP.caption) : null, ew.Validators.float], fields.OLDTAXP.isInvalid],
        ["TAXUPD", [fields.TAXUPD.visible && fields.TAXUPD.required ? ew.Validators.required(fields.TAXUPD.caption) : null], fields.TAXUPD.isInvalid],
        ["PACKAGE", [fields.PACKAGE.visible && fields.PACKAGE.required ? ew.Validators.required(fields.PACKAGE.caption) : null], fields.PACKAGE.isInvalid],
        ["NEWRT", [fields.NEWRT.visible && fields.NEWRT.required ? ew.Validators.required(fields.NEWRT.caption) : null, ew.Validators.float], fields.NEWRT.isInvalid],
        ["NEWMRP", [fields.NEWMRP.visible && fields.NEWMRP.required ? ew.Validators.required(fields.NEWMRP.caption) : null, ew.Validators.float], fields.NEWMRP.isInvalid],
        ["NEWUR", [fields.NEWUR.visible && fields.NEWUR.required ? ew.Validators.required(fields.NEWUR.caption) : null, ew.Validators.float], fields.NEWUR.isInvalid],
        ["STATUS", [fields.STATUS.visible && fields.STATUS.required ? ew.Validators.required(fields.STATUS.caption) : null], fields.STATUS.isInvalid],
        ["RETNQTY", [fields.RETNQTY.visible && fields.RETNQTY.required ? ew.Validators.required(fields.RETNQTY.caption) : null, ew.Validators.float], fields.RETNQTY.isInvalid],
        ["KEMODISC", [fields.KEMODISC.visible && fields.KEMODISC.required ? ew.Validators.required(fields.KEMODISC.caption) : null], fields.KEMODISC.isInvalid],
        ["PATSALE", [fields.PATSALE.visible && fields.PATSALE.required ? ew.Validators.required(fields.PATSALE.caption) : null, ew.Validators.float], fields.PATSALE.isInvalid],
        ["ORGAN", [fields.ORGAN.visible && fields.ORGAN.required ? ew.Validators.required(fields.ORGAN.caption) : null], fields.ORGAN.isInvalid],
        ["OLDRQ", [fields.OLDRQ.visible && fields.OLDRQ.required ? ew.Validators.required(fields.OLDRQ.caption) : null, ew.Validators.float], fields.OLDRQ.isInvalid],
        ["DRID", [fields.DRID.visible && fields.DRID.required ? ew.Validators.required(fields.DRID.caption) : null], fields.DRID.isInvalid],
        ["MFRCODE", [fields.MFRCODE.visible && fields.MFRCODE.required ? ew.Validators.required(fields.MFRCODE.caption) : null], fields.MFRCODE.isInvalid],
        ["COMBCODE", [fields.COMBCODE.visible && fields.COMBCODE.required ? ew.Validators.required(fields.COMBCODE.caption) : null], fields.COMBCODE.isInvalid],
        ["GENCODE", [fields.GENCODE.visible && fields.GENCODE.required ? ew.Validators.required(fields.GENCODE.caption) : null], fields.GENCODE.isInvalid],
        ["STRENGTH", [fields.STRENGTH.visible && fields.STRENGTH.required ? ew.Validators.required(fields.STRENGTH.caption) : null, ew.Validators.float], fields.STRENGTH.isInvalid],
        ["UNIT", [fields.UNIT.visible && fields.UNIT.required ? ew.Validators.required(fields.UNIT.caption) : null], fields.UNIT.isInvalid],
        ["FORMULARY", [fields.FORMULARY.visible && fields.FORMULARY.required ? ew.Validators.required(fields.FORMULARY.caption) : null], fields.FORMULARY.isInvalid],
        ["STOCK", [fields.STOCK.visible && fields.STOCK.required ? ew.Validators.required(fields.STOCK.caption) : null, ew.Validators.float], fields.STOCK.isInvalid],
        ["RACKNO", [fields.RACKNO.visible && fields.RACKNO.required ? ew.Validators.required(fields.RACKNO.caption) : null], fields.RACKNO.isInvalid],
        ["SUPPNAME", [fields.SUPPNAME.visible && fields.SUPPNAME.required ? ew.Validators.required(fields.SUPPNAME.caption) : null], fields.SUPPNAME.isInvalid],
        ["COMBNAME", [fields.COMBNAME.visible && fields.COMBNAME.required ? ew.Validators.required(fields.COMBNAME.caption) : null], fields.COMBNAME.isInvalid],
        ["GENERICNAME", [fields.GENERICNAME.visible && fields.GENERICNAME.required ? ew.Validators.required(fields.GENERICNAME.caption) : null], fields.GENERICNAME.isInvalid],
        ["REMARK", [fields.REMARK.visible && fields.REMARK.required ? ew.Validators.required(fields.REMARK.caption) : null], fields.REMARK.isInvalid],
        ["TEMP", [fields.TEMP.visible && fields.TEMP.required ? ew.Validators.required(fields.TEMP.caption) : null], fields.TEMP.isInvalid],
        ["PACKING", [fields.PACKING.visible && fields.PACKING.required ? ew.Validators.required(fields.PACKING.caption) : null, ew.Validators.float], fields.PACKING.isInvalid],
        ["PhysQty", [fields.PhysQty.visible && fields.PhysQty.required ? ew.Validators.required(fields.PhysQty.caption) : null, ew.Validators.float], fields.PhysQty.isInvalid],
        ["LedQty", [fields.LedQty.visible && fields.LedQty.required ? ew.Validators.required(fields.LedQty.caption) : null, ew.Validators.float], fields.LedQty.isInvalid],
        ["PurValue", [fields.PurValue.visible && fields.PurValue.required ? ew.Validators.required(fields.PurValue.caption) : null, ew.Validators.float], fields.PurValue.isInvalid],
        ["PSGST", [fields.PSGST.visible && fields.PSGST.required ? ew.Validators.required(fields.PSGST.caption) : null, ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [fields.PCGST.visible && fields.PCGST.required ? ew.Validators.required(fields.PCGST.caption) : null, ew.Validators.float], fields.PCGST.isInvalid],
        ["SaleValue", [fields.SaleValue.visible && fields.SaleValue.required ? ew.Validators.required(fields.SaleValue.caption) : null, ew.Validators.float], fields.SaleValue.isInvalid],
        ["SSGST", [fields.SSGST.visible && fields.SSGST.required ? ew.Validators.required(fields.SSGST.caption) : null, ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [fields.SCGST.visible && fields.SCGST.required ? ew.Validators.required(fields.SCGST.caption) : null, ew.Validators.float], fields.SCGST.isInvalid],
        ["SaleRate", [fields.SaleRate.visible && fields.SaleRate.required ? ew.Validators.required(fields.SaleRate.caption) : null, ew.Validators.float], fields.SaleRate.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["BRNAME", [fields.BRNAME.visible && fields.BRNAME.required ? ew.Validators.required(fields.BRNAME.caption) : null], fields.BRNAME.isInvalid],
        ["OV", [fields.OV.visible && fields.OV.required ? ew.Validators.required(fields.OV.caption) : null, ew.Validators.float], fields.OV.isInvalid],
        ["LATESTOV", [fields.LATESTOV.visible && fields.LATESTOV.required ? ew.Validators.required(fields.LATESTOV.caption) : null, ew.Validators.float], fields.LATESTOV.isInvalid],
        ["ITEMTYPE", [fields.ITEMTYPE.visible && fields.ITEMTYPE.required ? ew.Validators.required(fields.ITEMTYPE.caption) : null], fields.ITEMTYPE.isInvalid],
        ["ROWID", [fields.ROWID.visible && fields.ROWID.required ? ew.Validators.required(fields.ROWID.caption) : null], fields.ROWID.isInvalid],
        ["MOVED", [fields.MOVED.visible && fields.MOVED.required ? ew.Validators.required(fields.MOVED.caption) : null, ew.Validators.integer], fields.MOVED.isInvalid],
        ["NEWTAX", [fields.NEWTAX.visible && fields.NEWTAX.required ? ew.Validators.required(fields.NEWTAX.caption) : null, ew.Validators.float], fields.NEWTAX.isInvalid],
        ["HSNCODE", [fields.HSNCODE.visible && fields.HSNCODE.required ? ew.Validators.required(fields.HSNCODE.caption) : null], fields.HSNCODE.isInvalid],
        ["OLDTAX", [fields.OLDTAX.visible && fields.OLDTAX.required ? ew.Validators.required(fields.OLDTAX.caption) : null, ew.Validators.float], fields.OLDTAX.isInvalid],
        ["Scheduling", [fields.Scheduling.visible && fields.Scheduling.required ? ew.Validators.required(fields.Scheduling.caption) : null], fields.Scheduling.isInvalid],
        ["Schedulingh1", [fields.Schedulingh1.visible && fields.Schedulingh1.required ? ew.Validators.required(fields.Schedulingh1.caption) : null], fields.Schedulingh1.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_storemastaddopt,
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
    fpharmacy_storemastaddopt.validate = function () {
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
    fpharmacy_storemastaddopt.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_storemastaddopt.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_storemastaddopt.lists.TYPE = <?= $Page->TYPE->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.LASTSUPP = <?= $Page->LASTSUPP->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.GENNAME = <?= $Page->GENNAME->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.DRID = <?= $Page->DRID->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.MFRCODE = <?= $Page->MFRCODE->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.COMBCODE = <?= $Page->COMBCODE->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.GENCODE = <?= $Page->GENCODE->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.UNIT = <?= $Page->UNIT->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.FORMULARY = <?= $Page->FORMULARY->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.SUPPNAME = <?= $Page->SUPPNAME->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.COMBNAME = <?= $Page->COMBNAME->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.GENERICNAME = <?= $Page->GENERICNAME->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.Scheduling = <?= $Page->Scheduling->toClientList($Page) ?>;
    fpharmacy_storemastaddopt.lists.Schedulingh1 = <?= $Page->Schedulingh1->toClientList($Page) ?>;
    loadjs.done("fpharmacy_storemastaddopt");
});
</script>
<script>
loadjs.ready("head", function () {
    // Write your table-specific client script here, no need to add script tags.
});
</script>
<?php $Page->showPageHeader(); ?>
<form name="fpharmacy_storemastaddopt" id="fpharmacy_storemastaddopt" class="ew-form ew-horizontal" action="<?= HtmlEncode(GetUrl(Config("API_URL"))) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="<?= Config("API_ACTION_NAME") ?>" id="<?= Config("API_ACTION_NAME") ?>" value="<?= Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?= Config("API_OBJECT_NAME") ?>" id="<?= Config("API_OBJECT_NAME") ?>" value="pharmacy_storemast">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <input type="hidden" data-table="pharmacy_storemast" data-field="x_BRCODE" data-hidden="1" name="x_BRCODE" id="x_BRCODE" value="<?= HtmlEncode($Page->BRCODE->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PRC"><?= $Page->PRC->caption() ?><?= $Page->PRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TYPE"><?= $Page->TYPE->caption() ?><?= $Page->TYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
</div>
    </div>
<?php } ?>
<?php if ($Page->DES->Visible) { // DES ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_DES"><?= $Page->DES->caption() ?><?= $Page->DES->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_UM"><?= $Page->UM->caption() ?><?= $Page->UM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_RT"><?= $Page->RT->caption() ?><?= $Page->RT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_UR"><?= $Page->UR->caption() ?><?= $Page->UR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TAXP"><?= $Page->TAXP->caption() ?><?= $Page->TAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->TAXP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?= HtmlEncode($Page->TAXP->getPlaceHolder()) ?>" value="<?= $Page->TAXP->EditValue ?>"<?= $Page->TAXP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TAXP->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_BATCHNO"><?= $Page->BATCHNO->caption() ?><?= $Page->BATCHNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_OQ"><?= $Page->OQ->caption() ?><?= $Page->OQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_RQ"><?= $Page->RQ->caption() ?><?= $Page->RQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_MRQ"><?= $Page->MRQ->caption() ?><?= $Page->MRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_IQ"><?= $Page->IQ->caption() ?><?= $Page->IQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_MRP"><?= $Page->MRP->caption() ?><?= $Page->MRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_EXPDT"><?= $Page->EXPDT->caption() ?><?= $Page->EXPDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage() ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastaddopt", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->SALQTY->Visible) { // SALQTY ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_SALQTY"><?= $Page->SALQTY->caption() ?><?= $Page->SALQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->SALQTY->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?= HtmlEncode($Page->SALQTY->getPlaceHolder()) ?>" value="<?= $Page->SALQTY->EditValue ?>"<?= $Page->SALQTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SALQTY->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->LASTPURDT->Visible) { // LASTPURDT ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_LASTPURDT"><?= $Page->LASTPURDT->caption() ?><?= $Page->LASTPURDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->LASTPURDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?= HtmlEncode($Page->LASTPURDT->getPlaceHolder()) ?>" value="<?= $Page->LASTPURDT->EditValue ?>"<?= $Page->LASTPURDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LASTPURDT->getErrorMessage() ?></div>
<?php if (!$Page->LASTPURDT->ReadOnly && !$Page->LASTPURDT->Disabled && !isset($Page->LASTPURDT->EditAttrs["readonly"]) && !isset($Page->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastaddopt", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->LASTSUPP->Visible) { // LASTSUPP ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_LASTSUPP"><?= $Page->LASTSUPP->caption() ?><?= $Page->LASTSUPP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?= EmptyValue(strval($Page->LASTSUPP->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->LASTSUPP->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->LASTSUPP->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->LASTSUPP->ReadOnly || $Page->LASTSUPP->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->LASTSUPP->getErrorMessage() ?></div>
<?= $Page->LASTSUPP->Lookup->getParamTag($Page, "p_x_LASTSUPP") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?= $Page->LASTSUPP->CurrentValue ?>"<?= $Page->LASTSUPP->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label"><?= $Page->GENNAME->caption() ?><?= $Page->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
<input type="hidden" is="selection-list" class="form-control" data-table="pharmacy_storemast" data-field="x_GENNAME" data-input="sv_x_GENNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENNAME->displayValueSeparatorAttribute() ?>" name="x_GENNAME" id="x_GENNAME" value="<?= HtmlEncode($Page->GENNAME->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpharmacy_storemastaddopt"], function() {
    fpharmacy_storemastaddopt.createAutoSuggest(Object.assign({"id":"x_GENNAME","forceSelect":false}, ew.vars.tables.pharmacy_storemast.fields.GENNAME.autoSuggestOptions));
});
</script>
<?= $Page->GENNAME->Lookup->getParamTag($Page, "p_x_GENNAME") ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->LASTISSDT->Visible) { // LASTISSDT ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_LASTISSDT"><?= $Page->LASTISSDT->caption() ?><?= $Page->LASTISSDT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->LASTISSDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?= HtmlEncode($Page->LASTISSDT->getPlaceHolder()) ?>" value="<?= $Page->LASTISSDT->EditValue ?>"<?= $Page->LASTISSDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LASTISSDT->getErrorMessage() ?></div>
<?php if (!$Page->LASTISSDT->ReadOnly && !$Page->LASTISSDT->Disabled && !isset($Page->LASTISSDT->EditAttrs["readonly"]) && !isset($Page->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastaddopt", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastaddopt", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</div>
    </div>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
    <input type="hidden" data-table="pharmacy_storemast" data-field="x_CREATEDDT" data-hidden="1" name="x_CREATEDDT" id="x_CREATEDDT" value="<?= HtmlEncode($Page->CREATEDDT->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->OPPRC->Visible) { // OPPRC ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_OPPRC"><?= $Page->OPPRC->caption() ?><?= $Page->OPPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->OPPRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->OPPRC->getPlaceHolder()) ?>" value="<?= $Page->OPPRC->EditValue ?>"<?= $Page->OPPRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OPPRC->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->RESTRICT->Visible) { // RESTRICT ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_RESTRICT"><?= $Page->RESTRICT->caption() ?><?= $Page->RESTRICT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->RESTRICT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->RESTRICT->getPlaceHolder()) ?>" value="<?= $Page->RESTRICT->EditValue ?>"<?= $Page->RESTRICT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RESTRICT->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->BAWAPRC->Visible) { // BAWAPRC ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_BAWAPRC"><?= $Page->BAWAPRC->caption() ?><?= $Page->BAWAPRC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->BAWAPRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->BAWAPRC->getPlaceHolder()) ?>" value="<?= $Page->BAWAPRC->EditValue ?>"<?= $Page->BAWAPRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BAWAPRC->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->STAXPER->Visible) { // STAXPER ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_STAXPER"><?= $Page->STAXPER->caption() ?><?= $Page->STAXPER->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->STAXPER->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?= HtmlEncode($Page->STAXPER->getPlaceHolder()) ?>" value="<?= $Page->STAXPER->EditValue ?>"<?= $Page->STAXPER->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STAXPER->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->TAXTYPE->Visible) { // TAXTYPE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TAXTYPE"><?= $Page->TAXTYPE->caption() ?><?= $Page->TAXTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->TAXTYPE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TAXTYPE->getPlaceHolder()) ?>" value="<?= $Page->TAXTYPE->EditValue ?>"<?= $Page->TAXTYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TAXTYPE->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->OLDTAXP->Visible) { // OLDTAXP ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_OLDTAXP"><?= $Page->OLDTAXP->caption() ?><?= $Page->OLDTAXP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->OLDTAXP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?= HtmlEncode($Page->OLDTAXP->getPlaceHolder()) ?>" value="<?= $Page->OLDTAXP->EditValue ?>"<?= $Page->OLDTAXP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OLDTAXP->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->TAXUPD->Visible) { // TAXUPD ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TAXUPD"><?= $Page->TAXUPD->caption() ?><?= $Page->TAXUPD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->TAXUPD->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TAXUPD->getPlaceHolder()) ?>" value="<?= $Page->TAXUPD->EditValue ?>"<?= $Page->TAXUPD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TAXUPD->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PACKAGE->Visible) { // PACKAGE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PACKAGE"><?= $Page->PACKAGE->caption() ?><?= $Page->PACKAGE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PACKAGE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->PACKAGE->getPlaceHolder()) ?>" value="<?= $Page->PACKAGE->EditValue ?>"<?= $Page->PACKAGE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PACKAGE->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->NEWRT->Visible) { // NEWRT ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_NEWRT"><?= $Page->NEWRT->caption() ?><?= $Page->NEWRT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->NEWRT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?= HtmlEncode($Page->NEWRT->getPlaceHolder()) ?>" value="<?= $Page->NEWRT->EditValue ?>"<?= $Page->NEWRT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NEWRT->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->NEWMRP->Visible) { // NEWMRP ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_NEWMRP"><?= $Page->NEWMRP->caption() ?><?= $Page->NEWMRP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->NEWMRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?= HtmlEncode($Page->NEWMRP->getPlaceHolder()) ?>" value="<?= $Page->NEWMRP->EditValue ?>"<?= $Page->NEWMRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NEWMRP->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->NEWUR->Visible) { // NEWUR ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_NEWUR"><?= $Page->NEWUR->caption() ?><?= $Page->NEWUR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->NEWUR->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?= HtmlEncode($Page->NEWUR->getPlaceHolder()) ?>" value="<?= $Page->NEWUR->EditValue ?>"<?= $Page->NEWUR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NEWUR->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->STATUS->Visible) { // STATUS ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_STATUS"><?= $Page->STATUS->caption() ?><?= $Page->STATUS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->STATUS->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->STATUS->getPlaceHolder()) ?>" value="<?= $Page->STATUS->EditValue ?>"<?= $Page->STATUS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STATUS->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->RETNQTY->Visible) { // RETNQTY ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_RETNQTY"><?= $Page->RETNQTY->caption() ?><?= $Page->RETNQTY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->RETNQTY->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?= HtmlEncode($Page->RETNQTY->getPlaceHolder()) ?>" value="<?= $Page->RETNQTY->EditValue ?>"<?= $Page->RETNQTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RETNQTY->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->KEMODISC->Visible) { // KEMODISC ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_KEMODISC"><?= $Page->KEMODISC->caption() ?><?= $Page->KEMODISC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->KEMODISC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->KEMODISC->getPlaceHolder()) ?>" value="<?= $Page->KEMODISC->EditValue ?>"<?= $Page->KEMODISC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->KEMODISC->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PATSALE->Visible) { // PATSALE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PATSALE"><?= $Page->PATSALE->caption() ?><?= $Page->PATSALE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PATSALE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?= HtmlEncode($Page->PATSALE->getPlaceHolder()) ?>" value="<?= $Page->PATSALE->EditValue ?>"<?= $Page->PATSALE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PATSALE->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->ORGAN->Visible) { // ORGAN ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ORGAN"><?= $Page->ORGAN->caption() ?><?= $Page->ORGAN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->ORGAN->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ORGAN->getPlaceHolder()) ?>" value="<?= $Page->ORGAN->EditValue ?>"<?= $Page->ORGAN->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ORGAN->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->OLDRQ->Visible) { // OLDRQ ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_OLDRQ"><?= $Page->OLDRQ->caption() ?><?= $Page->OLDRQ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->OLDRQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?= HtmlEncode($Page->OLDRQ->getPlaceHolder()) ?>" value="<?= $Page->OLDRQ->EditValue ?>"<?= $Page->OLDRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OLDRQ->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_DRID"><?= $Page->DRID->caption() ?><?= $Page->DRID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?= EmptyValue(strval($Page->DRID->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DRID->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DRID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DRID->ReadOnly || $Page->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DRID->getErrorMessage() ?></div>
<?= $Page->DRID->Lookup->getParamTag($Page, "p_x_DRID") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_DRID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?= $Page->DRID->CurrentValue ?>"<?= $Page->DRID->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_MFRCODE"><?= $Page->MFRCODE->caption() ?><?= $Page->MFRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?= EmptyValue(strval($Page->MFRCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->MFRCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->MFRCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->MFRCODE->ReadOnly || $Page->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage() ?></div>
<?= $Page->MFRCODE->Lookup->getParamTag($Page, "p_x_MFRCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?= $Page->MFRCODE->CurrentValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_COMBCODE"><?= $Page->COMBCODE->caption() ?><?= $Page->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<?php $Page->COMBCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?= EmptyValue(strval($Page->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBCODE->ReadOnly || $Page->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBCODE->getErrorMessage() ?></div>
<?= $Page->COMBCODE->Lookup->getParamTag($Page, "p_x_COMBCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?= $Page->COMBCODE->CurrentValue ?>"<?= $Page->COMBCODE->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_GENCODE"><?= $Page->GENCODE->caption() ?><?= $Page->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<?php $Page->GENCODE->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?= EmptyValue(strval($Page->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENCODE->ReadOnly || $Page->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENCODE->getErrorMessage() ?></div>
<?= $Page->GENCODE->Lookup->getParamTag($Page, "p_x_GENCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?= $Page->GENCODE->CurrentValue ?>"<?= $Page->GENCODE->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_STRENGTH"><?= $Page->STRENGTH->caption() ?><?= $Page->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->STRENGTH->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?= HtmlEncode($Page->STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->STRENGTH->EditValue ?>"<?= $Page->STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STRENGTH->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_UNIT"><?= $Page->UNIT->caption() ?><?= $Page->UNIT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
</div>
    </div>
<?php } ?>
<?php if ($Page->FORMULARY->Visible) { // FORMULARY ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_FORMULARY"><?= $Page->FORMULARY->caption() ?><?= $Page->FORMULARY->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
</div>
    </div>
<?php } ?>
<?php if ($Page->STOCK->Visible) { // STOCK ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_STOCK"><?= $Page->STOCK->caption() ?><?= $Page->STOCK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->STOCK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?= HtmlEncode($Page->STOCK->getPlaceHolder()) ?>" value="<?= $Page->STOCK->EditValue ?>"<?= $Page->STOCK->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STOCK->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->RACKNO->Visible) { // RACKNO ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_RACKNO"><?= $Page->RACKNO->caption() ?><?= $Page->RACKNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->RACKNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->RACKNO->getPlaceHolder()) ?>" value="<?= $Page->RACKNO->EditValue ?>"<?= $Page->RACKNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RACKNO->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->SUPPNAME->Visible) { // SUPPNAME ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_SUPPNAME"><?= $Page->SUPPNAME->caption() ?><?= $Page->SUPPNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?= EmptyValue(strval($Page->SUPPNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->SUPPNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->SUPPNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->SUPPNAME->ReadOnly || $Page->SUPPNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->SUPPNAME->getErrorMessage() ?></div>
<?= $Page->SUPPNAME->Lookup->getParamTag($Page, "p_x_SUPPNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?= $Page->SUPPNAME->CurrentValue ?>"<?= $Page->SUPPNAME->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_COMBNAME"><?= $Page->COMBNAME->caption() ?><?= $Page->COMBNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBNAME"><?= EmptyValue(strval($Page->COMBNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBNAME->ReadOnly || $Page->COMBNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBNAME->getErrorMessage() ?></div>
<?= $Page->COMBNAME->Lookup->getParamTag($Page, "p_x_COMBNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBNAME->displayValueSeparatorAttribute() ?>" name="x_COMBNAME" id="x_COMBNAME" value="<?= $Page->COMBNAME->CurrentValue ?>"<?= $Page->COMBNAME->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_GENERICNAME"><?= $Page->GENERICNAME->caption() ?><?= $Page->GENERICNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENERICNAME"><?= EmptyValue(strval($Page->GENERICNAME->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENERICNAME->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENERICNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENERICNAME->ReadOnly || $Page->GENERICNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENERICNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENERICNAME->getErrorMessage() ?></div>
<?= $Page->GENERICNAME->Lookup->getParamTag($Page, "p_x_GENERICNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENERICNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENERICNAME->displayValueSeparatorAttribute() ?>" name="x_GENERICNAME" id="x_GENERICNAME" value="<?= $Page->GENERICNAME->CurrentValue ?>"<?= $Page->GENERICNAME->editAttributes() ?>>
</div>
    </div>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_REMARK"><?= $Page->REMARK->caption() ?><?= $Page->REMARK->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->REMARK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->REMARK->getPlaceHolder()) ?>" value="<?= $Page->REMARK->EditValue ?>"<?= $Page->REMARK->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REMARK->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_TEMP"><?= $Page->TEMP->caption() ?><?= $Page->TEMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->TEMP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->TEMP->getPlaceHolder()) ?>" value="<?= $Page->TEMP->EditValue ?>"<?= $Page->TEMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TEMP->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PACKING->Visible) { // PACKING ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PACKING"><?= $Page->PACKING->caption() ?><?= $Page->PACKING->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PACKING->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?= HtmlEncode($Page->PACKING->getPlaceHolder()) ?>" value="<?= $Page->PACKING->EditValue ?>"<?= $Page->PACKING->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PACKING->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PhysQty->Visible) { // PhysQty ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PhysQty"><?= $Page->PhysQty->caption() ?><?= $Page->PhysQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PhysQty->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?= HtmlEncode($Page->PhysQty->getPlaceHolder()) ?>" value="<?= $Page->PhysQty->EditValue ?>"<?= $Page->PhysQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PhysQty->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->LedQty->Visible) { // LedQty ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_LedQty"><?= $Page->LedQty->caption() ?><?= $Page->LedQty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->LedQty->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?= HtmlEncode($Page->LedQty->getPlaceHolder()) ?>" value="<?= $Page->LedQty->EditValue ?>"<?= $Page->LedQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LedQty->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PurValue"><?= $Page->PurValue->caption() ?><?= $Page->PurValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PSGST"><?= $Page->PSGST->caption() ?><?= $Page->PSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_PCGST"><?= $Page->PCGST->caption() ?><?= $Page->PCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_SaleValue"><?= $Page->SaleValue->caption() ?><?= $Page->SaleValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->SaleValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?= HtmlEncode($Page->SaleValue->getPlaceHolder()) ?>" value="<?= $Page->SaleValue->EditValue ?>"<?= $Page->SaleValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleValue->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_SSGST"><?= $Page->SSGST->caption() ?><?= $Page->SSGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_SCGST"><?= $Page->SCGST->caption() ?><?= $Page->SCGST->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_SaleRate"><?= $Page->SaleRate->caption() ?><?= $Page->SaleRate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->SaleRate->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?= HtmlEncode($Page->SaleRate->getPlaceHolder()) ?>" value="<?= $Page->SaleRate->EditValue ?>"<?= $Page->SaleRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleRate->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <input type="hidden" data-table="pharmacy_storemast" data-field="x_HospID" data-hidden="1" name="x_HospID" id="x_HospID" value="<?= HtmlEncode($Page->HospID->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
    <input type="hidden" data-table="pharmacy_storemast" data-field="x_BRNAME" data-hidden="1" name="x_BRNAME" id="x_BRNAME" value="<?= HtmlEncode($Page->BRNAME->CurrentValue) ?>">
<?php } ?>
<?php if ($Page->OV->Visible) { // OV ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_OV"><?= $Page->OV->caption() ?><?= $Page->OV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->OV->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OV" name="x_OV" id="x_OV" size="30" placeholder="<?= HtmlEncode($Page->OV->getPlaceHolder()) ?>" value="<?= $Page->OV->EditValue ?>"<?= $Page->OV->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OV->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->LATESTOV->Visible) { // LATESTOV ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_LATESTOV"><?= $Page->LATESTOV->caption() ?><?= $Page->LATESTOV->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->LATESTOV->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LATESTOV" name="x_LATESTOV" id="x_LATESTOV" size="30" placeholder="<?= HtmlEncode($Page->LATESTOV->getPlaceHolder()) ?>" value="<?= $Page->LATESTOV->EditValue ?>"<?= $Page->LATESTOV->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LATESTOV->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->ITEMTYPE->Visible) { // ITEMTYPE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ITEMTYPE"><?= $Page->ITEMTYPE->caption() ?><?= $Page->ITEMTYPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->ITEMTYPE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_ITEMTYPE" name="x_ITEMTYPE" id="x_ITEMTYPE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ITEMTYPE->getPlaceHolder()) ?>" value="<?= $Page->ITEMTYPE->EditValue ?>"<?= $Page->ITEMTYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ITEMTYPE->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->ROWID->Visible) { // ROWID ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_ROWID"><?= $Page->ROWID->caption() ?><?= $Page->ROWID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->ROWID->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_ROWID" name="x_ROWID" id="x_ROWID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ROWID->getPlaceHolder()) ?>" value="<?= $Page->ROWID->EditValue ?>"<?= $Page->ROWID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ROWID->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->MOVED->Visible) { // MOVED ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_MOVED"><?= $Page->MOVED->caption() ?><?= $Page->MOVED->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->MOVED->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MOVED" name="x_MOVED" id="x_MOVED" size="30" placeholder="<?= HtmlEncode($Page->MOVED->getPlaceHolder()) ?>" value="<?= $Page->MOVED->EditValue ?>"<?= $Page->MOVED->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MOVED->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->NEWTAX->Visible) { // NEWTAX ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_NEWTAX"><?= $Page->NEWTAX->caption() ?><?= $Page->NEWTAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->NEWTAX->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWTAX" name="x_NEWTAX" id="x_NEWTAX" size="30" placeholder="<?= HtmlEncode($Page->NEWTAX->getPlaceHolder()) ?>" value="<?= $Page->NEWTAX->EditValue ?>"<?= $Page->NEWTAX->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NEWTAX->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->HSNCODE->Visible) { // HSNCODE ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_HSNCODE"><?= $Page->HSNCODE->caption() ?><?= $Page->HSNCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->HSNCODE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_HSNCODE" name="x_HSNCODE" id="x_HSNCODE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->HSNCODE->getPlaceHolder()) ?>" value="<?= $Page->HSNCODE->EditValue ?>"<?= $Page->HSNCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HSNCODE->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->OLDTAX->Visible) { // OLDTAX ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label" for="x_OLDTAX"><?= $Page->OLDTAX->caption() ?><?= $Page->OLDTAX->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
<input type="<?= $Page->OLDTAX->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OLDTAX" name="x_OLDTAX" id="x_OLDTAX" size="30" placeholder="<?= HtmlEncode($Page->OLDTAX->getPlaceHolder()) ?>" value="<?= $Page->OLDTAX->EditValue ?>"<?= $Page->OLDTAX->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OLDTAX->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Scheduling->Visible) { // Scheduling ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label"><?= $Page->Scheduling->caption() ?><?= $Page->Scheduling->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
<div class="invalid-feedback"><?= $Page->Scheduling->getErrorMessage() ?></div>
</div>
    </div>
<?php } ?>
<?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label ew-label"><?= $Page->Schedulingh1->caption() ?><?= $Page->Schedulingh1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="col-sm-10">
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
<div class="invalid-feedback"><?= $Page->Schedulingh1->getErrorMessage() ?></div>
</div>
    </div>
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

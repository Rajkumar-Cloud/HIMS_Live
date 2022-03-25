<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyStoremastSearch = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_storemastsearch, currentSearchForm, currentAdvancedSearchForm;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object for search
    <?php if ($Page->IsModal) { ?>
    fpharmacy_storemastsearch = currentAdvancedSearchForm = new ew.Form("fpharmacy_storemastsearch", "search");
    <?php } else { ?>
    fpharmacy_storemastsearch = currentForm = new ew.Form("fpharmacy_storemastsearch", "search");
    <?php } ?>
    currentPageID = ew.PAGE_ID = "search";

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_storemast")) ?>,
        fields = currentTable.fields;
    fpharmacy_storemastsearch.addFields([
        ["BRCODE", [], fields.BRCODE.isInvalid],
        ["PRC", [], fields.PRC.isInvalid],
        ["TYPE", [], fields.TYPE.isInvalid],
        ["DES", [], fields.DES.isInvalid],
        ["UM", [], fields.UM.isInvalid],
        ["RT", [ew.Validators.float], fields.RT.isInvalid],
        ["UR", [ew.Validators.float], fields.UR.isInvalid],
        ["TAXP", [ew.Validators.float], fields.TAXP.isInvalid],
        ["BATCHNO", [], fields.BATCHNO.isInvalid],
        ["OQ", [ew.Validators.float], fields.OQ.isInvalid],
        ["RQ", [ew.Validators.float], fields.RQ.isInvalid],
        ["MRQ", [ew.Validators.float], fields.MRQ.isInvalid],
        ["IQ", [ew.Validators.float], fields.IQ.isInvalid],
        ["MRP", [ew.Validators.float], fields.MRP.isInvalid],
        ["EXPDT", [ew.Validators.datetime(0)], fields.EXPDT.isInvalid],
        ["SALQTY", [ew.Validators.float], fields.SALQTY.isInvalid],
        ["LASTPURDT", [ew.Validators.datetime(0)], fields.LASTPURDT.isInvalid],
        ["LASTSUPP", [], fields.LASTSUPP.isInvalid],
        ["GENNAME", [], fields.GENNAME.isInvalid],
        ["LASTISSDT", [ew.Validators.datetime(0)], fields.LASTISSDT.isInvalid],
        ["CREATEDDT", [ew.Validators.datetime(0)], fields.CREATEDDT.isInvalid],
        ["OPPRC", [], fields.OPPRC.isInvalid],
        ["RESTRICT", [], fields.RESTRICT.isInvalid],
        ["BAWAPRC", [], fields.BAWAPRC.isInvalid],
        ["STAXPER", [ew.Validators.float], fields.STAXPER.isInvalid],
        ["TAXTYPE", [], fields.TAXTYPE.isInvalid],
        ["OLDTAXP", [ew.Validators.float], fields.OLDTAXP.isInvalid],
        ["TAXUPD", [], fields.TAXUPD.isInvalid],
        ["PACKAGE", [], fields.PACKAGE.isInvalid],
        ["NEWRT", [ew.Validators.float], fields.NEWRT.isInvalid],
        ["NEWMRP", [ew.Validators.float], fields.NEWMRP.isInvalid],
        ["NEWUR", [ew.Validators.float], fields.NEWUR.isInvalid],
        ["STATUS", [], fields.STATUS.isInvalid],
        ["RETNQTY", [ew.Validators.float], fields.RETNQTY.isInvalid],
        ["KEMODISC", [], fields.KEMODISC.isInvalid],
        ["PATSALE", [ew.Validators.float], fields.PATSALE.isInvalid],
        ["ORGAN", [], fields.ORGAN.isInvalid],
        ["OLDRQ", [ew.Validators.float], fields.OLDRQ.isInvalid],
        ["DRID", [], fields.DRID.isInvalid],
        ["MFRCODE", [], fields.MFRCODE.isInvalid],
        ["COMBCODE", [], fields.COMBCODE.isInvalid],
        ["GENCODE", [], fields.GENCODE.isInvalid],
        ["STRENGTH", [ew.Validators.float], fields.STRENGTH.isInvalid],
        ["UNIT", [], fields.UNIT.isInvalid],
        ["FORMULARY", [], fields.FORMULARY.isInvalid],
        ["STOCK", [ew.Validators.float], fields.STOCK.isInvalid],
        ["RACKNO", [], fields.RACKNO.isInvalid],
        ["SUPPNAME", [], fields.SUPPNAME.isInvalid],
        ["COMBNAME", [], fields.COMBNAME.isInvalid],
        ["GENERICNAME", [], fields.GENERICNAME.isInvalid],
        ["REMARK", [], fields.REMARK.isInvalid],
        ["TEMP", [], fields.TEMP.isInvalid],
        ["PACKING", [ew.Validators.float], fields.PACKING.isInvalid],
        ["PhysQty", [ew.Validators.float], fields.PhysQty.isInvalid],
        ["LedQty", [ew.Validators.float], fields.LedQty.isInvalid],
        ["id", [ew.Validators.integer], fields.id.isInvalid],
        ["PurValue", [ew.Validators.float], fields.PurValue.isInvalid],
        ["PSGST", [ew.Validators.float], fields.PSGST.isInvalid],
        ["PCGST", [ew.Validators.float], fields.PCGST.isInvalid],
        ["SaleValue", [ew.Validators.float], fields.SaleValue.isInvalid],
        ["SSGST", [ew.Validators.float], fields.SSGST.isInvalid],
        ["SCGST", [ew.Validators.float], fields.SCGST.isInvalid],
        ["SaleRate", [ew.Validators.float], fields.SaleRate.isInvalid],
        ["HospID", [ew.Validators.integer], fields.HospID.isInvalid],
        ["BRNAME", [], fields.BRNAME.isInvalid],
        ["Scheduling", [], fields.Scheduling.isInvalid],
        ["Schedulingh1", [], fields.Schedulingh1.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        fpharmacy_storemastsearch.setInvalid();
    });

    // Validate form
    fpharmacy_storemastsearch.validate = function () {
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
    fpharmacy_storemastsearch.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_storemastsearch.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_storemastsearch.lists.TYPE = <?= $Page->TYPE->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.LASTSUPP = <?= $Page->LASTSUPP->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.GENNAME = <?= $Page->GENNAME->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.DRID = <?= $Page->DRID->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.MFRCODE = <?= $Page->MFRCODE->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.COMBCODE = <?= $Page->COMBCODE->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.GENCODE = <?= $Page->GENCODE->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.UNIT = <?= $Page->UNIT->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.FORMULARY = <?= $Page->FORMULARY->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.SUPPNAME = <?= $Page->SUPPNAME->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.COMBNAME = <?= $Page->COMBNAME->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.GENERICNAME = <?= $Page->GENERICNAME->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.Scheduling = <?= $Page->Scheduling->toClientList($Page) ?>;
    fpharmacy_storemastsearch.lists.Schedulingh1 = <?= $Page->Schedulingh1->toClientList($Page) ?>;
    loadjs.done("fpharmacy_storemastsearch");
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
<form name="fpharmacy_storemastsearch" id="fpharmacy_storemastsearch" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_storemast">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRCODE"><?= $Page->BRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BRCODE" id="z_BRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_BRCODE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BRCODE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BRCODE" name="x_BRCODE" id="x_BRCODE" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>" value="<?= $Page->BRCODE->EditValue ?>"<?= $Page->BRCODE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PRC->Visible) { // PRC ?>
    <div id="r_PRC" class="form-group row">
        <label for="x_PRC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PRC"><?= $Page->PRC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PRC" id="z_PRC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PRC->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_PRC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PRC" name="x_PRC" id="x_PRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->PRC->getPlaceHolder()) ?>" value="<?= $Page->PRC->EditValue ?>"<?= $Page->PRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PRC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TYPE->Visible) { // TYPE ?>
    <div id="r_TYPE" class="form-group row">
        <label for="x_TYPE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TYPE"><?= $Page->TYPE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TYPE" id="z_TYPE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TYPE->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_TYPE" class="ew-search-field ew-search-field-single">
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
    <div class="invalid-feedback"><?= $Page->TYPE->getErrorMessage(false) ?></div>
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
        <label for="x_DES" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_DES"><?= $Page->DES->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DES" id="z_DES" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DES->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_DES" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->DES->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_DES" name="x_DES" id="x_DES" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->DES->getPlaceHolder()) ?>" value="<?= $Page->DES->EditValue ?>"<?= $Page->DES->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->DES->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->UM->Visible) { // UM ?>
    <div id="r_UM" class="form-group row">
        <label for="x_UM" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UM"><?= $Page->UM->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UM" id="z_UM" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UM->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_UM" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->UM->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UM" name="x_UM" id="x_UM" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->UM->getPlaceHolder()) ?>" value="<?= $Page->UM->EditValue ?>"<?= $Page->UM->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UM->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RT->Visible) { // RT ?>
    <div id="r_RT" class="form-group row">
        <label for="x_RT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RT"><?= $Page->RT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RT" id="z_RT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RT->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_RT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RT" name="x_RT" id="x_RT" size="30" placeholder="<?= HtmlEncode($Page->RT->getPlaceHolder()) ?>" value="<?= $Page->RT->EditValue ?>"<?= $Page->RT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->UR->Visible) { // UR ?>
    <div id="r_UR" class="form-group row">
        <label for="x_UR" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UR"><?= $Page->UR->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_UR" id="z_UR" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UR->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_UR" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->UR->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_UR" name="x_UR" id="x_UR" size="30" placeholder="<?= HtmlEncode($Page->UR->getPlaceHolder()) ?>" value="<?= $Page->UR->EditValue ?>"<?= $Page->UR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->UR->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXP->Visible) { // TAXP ?>
    <div id="r_TAXP" class="form-group row">
        <label for="x_TAXP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXP"><?= $Page->TAXP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_TAXP" id="z_TAXP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXP->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_TAXP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TAXP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXP" name="x_TAXP" id="x_TAXP" size="30" placeholder="<?= HtmlEncode($Page->TAXP->getPlaceHolder()) ?>" value="<?= $Page->TAXP->EditValue ?>"<?= $Page->TAXP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TAXP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BATCHNO->Visible) { // BATCHNO ?>
    <div id="r_BATCHNO" class="form-group row">
        <label for="x_BATCHNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BATCHNO"><?= $Page->BATCHNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BATCHNO" id="z_BATCHNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BATCHNO->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_BATCHNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BATCHNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BATCHNO" name="x_BATCHNO" id="x_BATCHNO" size="30" maxlength="14" placeholder="<?= HtmlEncode($Page->BATCHNO->getPlaceHolder()) ?>" value="<?= $Page->BATCHNO->EditValue ?>"<?= $Page->BATCHNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BATCHNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OQ->Visible) { // OQ ?>
    <div id="r_OQ" class="form-group row">
        <label for="x_OQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OQ"><?= $Page->OQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OQ" id="z_OQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OQ->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_OQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OQ" name="x_OQ" id="x_OQ" size="30" placeholder="<?= HtmlEncode($Page->OQ->getPlaceHolder()) ?>" value="<?= $Page->OQ->EditValue ?>"<?= $Page->OQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RQ->Visible) { // RQ ?>
    <div id="r_RQ" class="form-group row">
        <label for="x_RQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RQ"><?= $Page->RQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RQ" id="z_RQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RQ->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_RQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RQ" name="x_RQ" id="x_RQ" size="30" placeholder="<?= HtmlEncode($Page->RQ->getPlaceHolder()) ?>" value="<?= $Page->RQ->EditValue ?>"<?= $Page->RQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MRQ->Visible) { // MRQ ?>
    <div id="r_MRQ" class="form-group row">
        <label for="x_MRQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRQ"><?= $Page->MRQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_MRQ" id="z_MRQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRQ->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_MRQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MRQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRQ" name="x_MRQ" id="x_MRQ" size="30" placeholder="<?= HtmlEncode($Page->MRQ->getPlaceHolder()) ?>" value="<?= $Page->MRQ->EditValue ?>"<?= $Page->MRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->IQ->Visible) { // IQ ?>
    <div id="r_IQ" class="form-group row">
        <label for="x_IQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_IQ"><?= $Page->IQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_IQ" id="z_IQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->IQ->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_IQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->IQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_IQ" name="x_IQ" id="x_IQ" size="30" placeholder="<?= HtmlEncode($Page->IQ->getPlaceHolder()) ?>" value="<?= $Page->IQ->EditValue ?>"<?= $Page->IQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->IQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MRP->Visible) { // MRP ?>
    <div id="r_MRP" class="form-group row">
        <label for="x_MRP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MRP"><?= $Page->MRP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_MRP" id="z_MRP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MRP->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_MRP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->MRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_MRP" name="x_MRP" id="x_MRP" size="30" placeholder="<?= HtmlEncode($Page->MRP->getPlaceHolder()) ?>" value="<?= $Page->MRP->EditValue ?>"<?= $Page->MRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->MRP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->EXPDT->Visible) { // EXPDT ?>
    <div id="r_EXPDT" class="form-group row">
        <label for="x_EXPDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_EXPDT"><?= $Page->EXPDT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_EXPDT" id="z_EXPDT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EXPDT->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_EXPDT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->EXPDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_EXPDT" name="x_EXPDT" id="x_EXPDT" placeholder="<?= HtmlEncode($Page->EXPDT->getPlaceHolder()) ?>" value="<?= $Page->EXPDT->EditValue ?>"<?= $Page->EXPDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->EXPDT->getErrorMessage(false) ?></div>
<?php if (!$Page->EXPDT->ReadOnly && !$Page->EXPDT->Disabled && !isset($Page->EXPDT->EditAttrs["readonly"]) && !isset($Page->EXPDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastsearch", "x_EXPDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SALQTY->Visible) { // SALQTY ?>
    <div id="r_SALQTY" class="form-group row">
        <label for="x_SALQTY" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SALQTY"><?= $Page->SALQTY->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SALQTY" id="z_SALQTY" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SALQTY->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_SALQTY" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SALQTY->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SALQTY" name="x_SALQTY" id="x_SALQTY" size="30" placeholder="<?= HtmlEncode($Page->SALQTY->getPlaceHolder()) ?>" value="<?= $Page->SALQTY->EditValue ?>"<?= $Page->SALQTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SALQTY->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LASTPURDT->Visible) { // LASTPURDT ?>
    <div id="r_LASTPURDT" class="form-group row">
        <label for="x_LASTPURDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTPURDT"><?= $Page->LASTPURDT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_LASTPURDT" id="z_LASTPURDT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LASTPURDT->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_LASTPURDT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LASTPURDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LASTPURDT" name="x_LASTPURDT" id="x_LASTPURDT" placeholder="<?= HtmlEncode($Page->LASTPURDT->getPlaceHolder()) ?>" value="<?= $Page->LASTPURDT->EditValue ?>"<?= $Page->LASTPURDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LASTPURDT->getErrorMessage(false) ?></div>
<?php if (!$Page->LASTPURDT->ReadOnly && !$Page->LASTPURDT->Disabled && !isset($Page->LASTPURDT->EditAttrs["readonly"]) && !isset($Page->LASTPURDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastsearch", "x_LASTPURDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LASTSUPP->Visible) { // LASTSUPP ?>
    <div id="r_LASTSUPP" class="form-group row">
        <label for="x_LASTSUPP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTSUPP"><?= $Page->LASTSUPP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_LASTSUPP" id="z_LASTSUPP" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LASTSUPP->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_LASTSUPP" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_LASTSUPP"><?= EmptyValue(strval($Page->LASTSUPP->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->LASTSUPP->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->LASTSUPP->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->LASTSUPP->ReadOnly || $Page->LASTSUPP->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_LASTSUPP',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->LASTSUPP->getErrorMessage(false) ?></div>
<?= $Page->LASTSUPP->Lookup->getParamTag($Page, "p_x_LASTSUPP") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_LASTSUPP" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->LASTSUPP->displayValueSeparatorAttribute() ?>" name="x_LASTSUPP" id="x_LASTSUPP" value="<?= $Page->LASTSUPP->AdvancedSearch->SearchValue ?>"<?= $Page->LASTSUPP->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <div id="r_GENNAME" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENNAME"><?= $Page->GENNAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENNAME" id="z_GENNAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENNAME->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_GENNAME" class="ew-search-field ew-search-field-single">
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
loadjs.ready(["fpharmacy_storemastsearch"], function() {
    fpharmacy_storemastsearch.createAutoSuggest(Object.assign({"id":"x_GENNAME","forceSelect":false}, ew.vars.tables.pharmacy_storemast.fields.GENNAME.autoSuggestOptions));
});
</script>
<?= $Page->GENNAME->Lookup->getParamTag($Page, "p_x_GENNAME") ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LASTISSDT->Visible) { // LASTISSDT ?>
    <div id="r_LASTISSDT" class="form-group row">
        <label for="x_LASTISSDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LASTISSDT"><?= $Page->LASTISSDT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_LASTISSDT" id="z_LASTISSDT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LASTISSDT->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_LASTISSDT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LASTISSDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LASTISSDT" name="x_LASTISSDT" id="x_LASTISSDT" placeholder="<?= HtmlEncode($Page->LASTISSDT->getPlaceHolder()) ?>" value="<?= $Page->LASTISSDT->EditValue ?>"<?= $Page->LASTISSDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LASTISSDT->getErrorMessage(false) ?></div>
<?php if (!$Page->LASTISSDT->ReadOnly && !$Page->LASTISSDT->Disabled && !isset($Page->LASTISSDT->EditAttrs["readonly"]) && !isset($Page->LASTISSDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastsearch", "x_LASTISSDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->CREATEDDT->Visible) { // CREATEDDT ?>
    <div id="r_CREATEDDT" class="form-group row">
        <label for="x_CREATEDDT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_CREATEDDT"><?= $Page->CREATEDDT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_CREATEDDT" id="z_CREATEDDT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CREATEDDT->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_CREATEDDT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->CREATEDDT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_CREATEDDT" name="x_CREATEDDT" id="x_CREATEDDT" placeholder="<?= HtmlEncode($Page->CREATEDDT->getPlaceHolder()) ?>" value="<?= $Page->CREATEDDT->EditValue ?>"<?= $Page->CREATEDDT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->CREATEDDT->getErrorMessage(false) ?></div>
<?php if (!$Page->CREATEDDT->ReadOnly && !$Page->CREATEDDT->Disabled && !isset($Page->CREATEDDT->EditAttrs["readonly"]) && !isset($Page->CREATEDDT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_storemastsearch", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_storemastsearch", "x_CREATEDDT", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OPPRC->Visible) { // OPPRC ?>
    <div id="r_OPPRC" class="form-group row">
        <label for="x_OPPRC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OPPRC"><?= $Page->OPPRC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_OPPRC" id="z_OPPRC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OPPRC->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_OPPRC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OPPRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OPPRC" name="x_OPPRC" id="x_OPPRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->OPPRC->getPlaceHolder()) ?>" value="<?= $Page->OPPRC->EditValue ?>"<?= $Page->OPPRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OPPRC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RESTRICT->Visible) { // RESTRICT ?>
    <div id="r_RESTRICT" class="form-group row">
        <label for="x_RESTRICT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RESTRICT"><?= $Page->RESTRICT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RESTRICT" id="z_RESTRICT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RESTRICT->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_RESTRICT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RESTRICT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RESTRICT" name="x_RESTRICT" id="x_RESTRICT" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->RESTRICT->getPlaceHolder()) ?>" value="<?= $Page->RESTRICT->EditValue ?>"<?= $Page->RESTRICT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RESTRICT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BAWAPRC->Visible) { // BAWAPRC ?>
    <div id="r_BAWAPRC" class="form-group row">
        <label for="x_BAWAPRC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BAWAPRC"><?= $Page->BAWAPRC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BAWAPRC" id="z_BAWAPRC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BAWAPRC->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_BAWAPRC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BAWAPRC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BAWAPRC" name="x_BAWAPRC" id="x_BAWAPRC" size="30" maxlength="9" placeholder="<?= HtmlEncode($Page->BAWAPRC->getPlaceHolder()) ?>" value="<?= $Page->BAWAPRC->EditValue ?>"<?= $Page->BAWAPRC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BAWAPRC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->STAXPER->Visible) { // STAXPER ?>
    <div id="r_STAXPER" class="form-group row">
        <label for="x_STAXPER" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STAXPER"><?= $Page->STAXPER->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_STAXPER" id="z_STAXPER" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STAXPER->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_STAXPER" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->STAXPER->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STAXPER" name="x_STAXPER" id="x_STAXPER" size="30" placeholder="<?= HtmlEncode($Page->STAXPER->getPlaceHolder()) ?>" value="<?= $Page->STAXPER->EditValue ?>"<?= $Page->STAXPER->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STAXPER->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXTYPE->Visible) { // TAXTYPE ?>
    <div id="r_TAXTYPE" class="form-group row">
        <label for="x_TAXTYPE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXTYPE"><?= $Page->TAXTYPE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TAXTYPE" id="z_TAXTYPE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXTYPE->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_TAXTYPE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TAXTYPE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXTYPE" name="x_TAXTYPE" id="x_TAXTYPE" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TAXTYPE->getPlaceHolder()) ?>" value="<?= $Page->TAXTYPE->EditValue ?>"<?= $Page->TAXTYPE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TAXTYPE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDTAXP->Visible) { // OLDTAXP ?>
    <div id="r_OLDTAXP" class="form-group row">
        <label for="x_OLDTAXP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDTAXP"><?= $Page->OLDTAXP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OLDTAXP" id="z_OLDTAXP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDTAXP->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_OLDTAXP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OLDTAXP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OLDTAXP" name="x_OLDTAXP" id="x_OLDTAXP" size="30" placeholder="<?= HtmlEncode($Page->OLDTAXP->getPlaceHolder()) ?>" value="<?= $Page->OLDTAXP->EditValue ?>"<?= $Page->OLDTAXP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OLDTAXP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TAXUPD->Visible) { // TAXUPD ?>
    <div id="r_TAXUPD" class="form-group row">
        <label for="x_TAXUPD" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TAXUPD"><?= $Page->TAXUPD->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TAXUPD" id="z_TAXUPD" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TAXUPD->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_TAXUPD" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TAXUPD->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TAXUPD" name="x_TAXUPD" id="x_TAXUPD" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->TAXUPD->getPlaceHolder()) ?>" value="<?= $Page->TAXUPD->EditValue ?>"<?= $Page->TAXUPD->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TAXUPD->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PACKAGE->Visible) { // PACKAGE ?>
    <div id="r_PACKAGE" class="form-group row">
        <label for="x_PACKAGE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PACKAGE"><?= $Page->PACKAGE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_PACKAGE" id="z_PACKAGE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PACKAGE->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_PACKAGE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PACKAGE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PACKAGE" name="x_PACKAGE" id="x_PACKAGE" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->PACKAGE->getPlaceHolder()) ?>" value="<?= $Page->PACKAGE->EditValue ?>"<?= $Page->PACKAGE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PACKAGE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWRT->Visible) { // NEWRT ?>
    <div id="r_NEWRT" class="form-group row">
        <label for="x_NEWRT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWRT"><?= $Page->NEWRT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_NEWRT" id="z_NEWRT" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWRT->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_NEWRT" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NEWRT->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWRT" name="x_NEWRT" id="x_NEWRT" size="30" placeholder="<?= HtmlEncode($Page->NEWRT->getPlaceHolder()) ?>" value="<?= $Page->NEWRT->EditValue ?>"<?= $Page->NEWRT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NEWRT->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWMRP->Visible) { // NEWMRP ?>
    <div id="r_NEWMRP" class="form-group row">
        <label for="x_NEWMRP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWMRP"><?= $Page->NEWMRP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_NEWMRP" id="z_NEWMRP" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWMRP->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_NEWMRP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NEWMRP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWMRP" name="x_NEWMRP" id="x_NEWMRP" size="30" placeholder="<?= HtmlEncode($Page->NEWMRP->getPlaceHolder()) ?>" value="<?= $Page->NEWMRP->EditValue ?>"<?= $Page->NEWMRP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NEWMRP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->NEWUR->Visible) { // NEWUR ?>
    <div id="r_NEWUR" class="form-group row">
        <label for="x_NEWUR" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_NEWUR"><?= $Page->NEWUR->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_NEWUR" id="z_NEWUR" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEWUR->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_NEWUR" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->NEWUR->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_NEWUR" name="x_NEWUR" id="x_NEWUR" size="30" placeholder="<?= HtmlEncode($Page->NEWUR->getPlaceHolder()) ?>" value="<?= $Page->NEWUR->EditValue ?>"<?= $Page->NEWUR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->NEWUR->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->STATUS->Visible) { // STATUS ?>
    <div id="r_STATUS" class="form-group row">
        <label for="x_STATUS" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STATUS"><?= $Page->STATUS->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_STATUS" id="z_STATUS" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STATUS->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_STATUS" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->STATUS->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STATUS" name="x_STATUS" id="x_STATUS" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->STATUS->getPlaceHolder()) ?>" value="<?= $Page->STATUS->EditValue ?>"<?= $Page->STATUS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STATUS->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RETNQTY->Visible) { // RETNQTY ?>
    <div id="r_RETNQTY" class="form-group row">
        <label for="x_RETNQTY" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RETNQTY"><?= $Page->RETNQTY->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_RETNQTY" id="z_RETNQTY" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RETNQTY->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_RETNQTY" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RETNQTY->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RETNQTY" name="x_RETNQTY" id="x_RETNQTY" size="30" placeholder="<?= HtmlEncode($Page->RETNQTY->getPlaceHolder()) ?>" value="<?= $Page->RETNQTY->EditValue ?>"<?= $Page->RETNQTY->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RETNQTY->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->KEMODISC->Visible) { // KEMODISC ?>
    <div id="r_KEMODISC" class="form-group row">
        <label for="x_KEMODISC" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_KEMODISC"><?= $Page->KEMODISC->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_KEMODISC" id="z_KEMODISC" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->KEMODISC->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_KEMODISC" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->KEMODISC->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_KEMODISC" name="x_KEMODISC" id="x_KEMODISC" size="30" maxlength="1" placeholder="<?= HtmlEncode($Page->KEMODISC->getPlaceHolder()) ?>" value="<?= $Page->KEMODISC->EditValue ?>"<?= $Page->KEMODISC->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->KEMODISC->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PATSALE->Visible) { // PATSALE ?>
    <div id="r_PATSALE" class="form-group row">
        <label for="x_PATSALE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PATSALE"><?= $Page->PATSALE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PATSALE" id="z_PATSALE" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PATSALE->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_PATSALE" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PATSALE->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PATSALE" name="x_PATSALE" id="x_PATSALE" size="30" placeholder="<?= HtmlEncode($Page->PATSALE->getPlaceHolder()) ?>" value="<?= $Page->PATSALE->EditValue ?>"<?= $Page->PATSALE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PATSALE->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->ORGAN->Visible) { // ORGAN ?>
    <div id="r_ORGAN" class="form-group row">
        <label for="x_ORGAN" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_ORGAN"><?= $Page->ORGAN->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_ORGAN" id="z_ORGAN" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ORGAN->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_ORGAN" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->ORGAN->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_ORGAN" name="x_ORGAN" id="x_ORGAN" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ORGAN->getPlaceHolder()) ?>" value="<?= $Page->ORGAN->EditValue ?>"<?= $Page->ORGAN->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->ORGAN->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->OLDRQ->Visible) { // OLDRQ ?>
    <div id="r_OLDRQ" class="form-group row">
        <label for="x_OLDRQ" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_OLDRQ"><?= $Page->OLDRQ->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_OLDRQ" id="z_OLDRQ" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OLDRQ->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_OLDRQ" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->OLDRQ->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_OLDRQ" name="x_OLDRQ" id="x_OLDRQ" size="30" placeholder="<?= HtmlEncode($Page->OLDRQ->getPlaceHolder()) ?>" value="<?= $Page->OLDRQ->EditValue ?>"<?= $Page->OLDRQ->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->OLDRQ->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->DRID->Visible) { // DRID ?>
    <div id="r_DRID" class="form-group row">
        <label for="x_DRID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_DRID"><?= $Page->DRID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_DRID" id="z_DRID" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DRID->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_DRID" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DRID"><?= EmptyValue(strval($Page->DRID->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DRID->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DRID->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DRID->ReadOnly || $Page->DRID->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DRID',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DRID->getErrorMessage(false) ?></div>
<?= $Page->DRID->Lookup->getParamTag($Page, "p_x_DRID") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_DRID" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DRID->displayValueSeparatorAttribute() ?>" name="x_DRID" id="x_DRID" value="<?= $Page->DRID->AdvancedSearch->SearchValue ?>"<?= $Page->DRID->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->MFRCODE->Visible) { // MFRCODE ?>
    <div id="r_MFRCODE" class="form-group row">
        <label for="x_MFRCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_MFRCODE"><?= $Page->MFRCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_MFRCODE" id="z_MFRCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MFRCODE->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_MFRCODE" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_MFRCODE"><?= EmptyValue(strval($Page->MFRCODE->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->MFRCODE->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->MFRCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->MFRCODE->ReadOnly || $Page->MFRCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_MFRCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->MFRCODE->getErrorMessage(false) ?></div>
<?= $Page->MFRCODE->Lookup->getParamTag($Page, "p_x_MFRCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_MFRCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->MFRCODE->displayValueSeparatorAttribute() ?>" name="x_MFRCODE" id="x_MFRCODE" value="<?= $Page->MFRCODE->AdvancedSearch->SearchValue ?>"<?= $Page->MFRCODE->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
    <div id="r_COMBCODE" class="form-group row">
        <label for="x_COMBCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBCODE"><?= $Page->COMBCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COMBCODE" id="z_COMBCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COMBCODE->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_COMBCODE" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?= EmptyValue(strval($Page->COMBCODE->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBCODE->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBCODE->ReadOnly || $Page->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBCODE->getErrorMessage(false) ?></div>
<?= $Page->COMBCODE->Lookup->getParamTag($Page, "p_x_COMBCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_COMBCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?= $Page->COMBCODE->AdvancedSearch->SearchValue ?>"<?= $Page->COMBCODE->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
    <div id="r_GENCODE" class="form-group row">
        <label for="x_GENCODE" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENCODE"><?= $Page->GENCODE->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENCODE" id="z_GENCODE" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENCODE->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_GENCODE" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?= EmptyValue(strval($Page->GENCODE->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENCODE->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENCODE->ReadOnly || $Page->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENCODE->getErrorMessage(false) ?></div>
<?= $Page->GENCODE->Lookup->getParamTag($Page, "p_x_GENCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_GENCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?= $Page->GENCODE->AdvancedSearch->SearchValue ?>"<?= $Page->GENCODE->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
    <div id="r_STRENGTH" class="form-group row">
        <label for="x_STRENGTH" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STRENGTH"><?= $Page->STRENGTH->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_STRENGTH" id="z_STRENGTH" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STRENGTH->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_STRENGTH" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->STRENGTH->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?= HtmlEncode($Page->STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->STRENGTH->EditValue ?>"<?= $Page->STRENGTH->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STRENGTH->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->UNIT->Visible) { // UNIT ?>
    <div id="r_UNIT" class="form-group row">
        <label for="x_UNIT" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_UNIT"><?= $Page->UNIT->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_UNIT" id="z_UNIT" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->UNIT->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_UNIT" class="ew-search-field ew-search-field-single">
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
    <div class="invalid-feedback"><?= $Page->UNIT->getErrorMessage(false) ?></div>
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
        <label for="x_FORMULARY" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_FORMULARY"><?= $Page->FORMULARY->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_FORMULARY" id="z_FORMULARY" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FORMULARY->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_FORMULARY" class="ew-search-field ew-search-field-single">
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
    <div class="invalid-feedback"><?= $Page->FORMULARY->getErrorMessage(false) ?></div>
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
<?php if ($Page->STOCK->Visible) { // STOCK ?>
    <div id="r_STOCK" class="form-group row">
        <label for="x_STOCK" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_STOCK"><?= $Page->STOCK->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_STOCK" id="z_STOCK" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STOCK->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_STOCK" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->STOCK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_STOCK" name="x_STOCK" id="x_STOCK" size="30" placeholder="<?= HtmlEncode($Page->STOCK->getPlaceHolder()) ?>" value="<?= $Page->STOCK->EditValue ?>"<?= $Page->STOCK->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->STOCK->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->RACKNO->Visible) { // RACKNO ?>
    <div id="r_RACKNO" class="form-group row">
        <label for="x_RACKNO" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_RACKNO"><?= $Page->RACKNO->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_RACKNO" id="z_RACKNO" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RACKNO->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_RACKNO" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->RACKNO->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_RACKNO" name="x_RACKNO" id="x_RACKNO" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->RACKNO->getPlaceHolder()) ?>" value="<?= $Page->RACKNO->EditValue ?>"<?= $Page->RACKNO->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->RACKNO->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SUPPNAME->Visible) { // SUPPNAME ?>
    <div id="r_SUPPNAME" class="form-group row">
        <label for="x_SUPPNAME" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SUPPNAME"><?= $Page->SUPPNAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_SUPPNAME" id="z_SUPPNAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SUPPNAME->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_SUPPNAME" class="ew-search-field ew-search-field-single">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_SUPPNAME"><?= EmptyValue(strval($Page->SUPPNAME->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->SUPPNAME->AdvancedSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->SUPPNAME->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->SUPPNAME->ReadOnly || $Page->SUPPNAME->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_SUPPNAME',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->SUPPNAME->getErrorMessage(false) ?></div>
<?= $Page->SUPPNAME->Lookup->getParamTag($Page, "p_x_SUPPNAME") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_storemast" data-field="x_SUPPNAME" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->SUPPNAME->displayValueSeparatorAttribute() ?>" name="x_SUPPNAME" id="x_SUPPNAME" value="<?= $Page->SUPPNAME->AdvancedSearch->SearchValue ?>"<?= $Page->SUPPNAME->editAttributes() ?>>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->COMBNAME->Visible) { // COMBNAME ?>
    <div id="r_COMBNAME" class="form-group row">
        <label for="x_COMBNAME" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_COMBNAME"><?= $Page->COMBNAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_COMBNAME" id="z_COMBNAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COMBNAME->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_COMBNAME" class="ew-search-field ew-search-field-single">
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
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->GENERICNAME->Visible) { // GENERICNAME ?>
    <div id="r_GENERICNAME" class="form-group row">
        <label for="x_GENERICNAME" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_GENERICNAME"><?= $Page->GENERICNAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_GENERICNAME" id="z_GENERICNAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENERICNAME->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_GENERICNAME" class="ew-search-field ew-search-field-single">
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
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->REMARK->Visible) { // REMARK ?>
    <div id="r_REMARK" class="form-group row">
        <label for="x_REMARK" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_REMARK"><?= $Page->REMARK->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_REMARK" id="z_REMARK" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->REMARK->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_REMARK" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->REMARK->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_REMARK" name="x_REMARK" id="x_REMARK" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->REMARK->getPlaceHolder()) ?>" value="<?= $Page->REMARK->EditValue ?>"<?= $Page->REMARK->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->REMARK->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->TEMP->Visible) { // TEMP ?>
    <div id="r_TEMP" class="form-group row">
        <label for="x_TEMP" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_TEMP"><?= $Page->TEMP->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TEMP" id="z_TEMP" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TEMP->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_TEMP" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->TEMP->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_TEMP" name="x_TEMP" id="x_TEMP" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->TEMP->getPlaceHolder()) ?>" value="<?= $Page->TEMP->EditValue ?>"<?= $Page->TEMP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->TEMP->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PACKING->Visible) { // PACKING ?>
    <div id="r_PACKING" class="form-group row">
        <label for="x_PACKING" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PACKING"><?= $Page->PACKING->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PACKING" id="z_PACKING" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PACKING->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_PACKING" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PACKING->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PACKING" name="x_PACKING" id="x_PACKING" size="30" placeholder="<?= HtmlEncode($Page->PACKING->getPlaceHolder()) ?>" value="<?= $Page->PACKING->EditValue ?>"<?= $Page->PACKING->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PACKING->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PhysQty->Visible) { // PhysQty ?>
    <div id="r_PhysQty" class="form-group row">
        <label for="x_PhysQty" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PhysQty"><?= $Page->PhysQty->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PhysQty" id="z_PhysQty" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PhysQty->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_PhysQty" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PhysQty->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PhysQty" name="x_PhysQty" id="x_PhysQty" size="30" placeholder="<?= HtmlEncode($Page->PhysQty->getPlaceHolder()) ?>" value="<?= $Page->PhysQty->EditValue ?>"<?= $Page->PhysQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PhysQty->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->LedQty->Visible) { // LedQty ?>
    <div id="r_LedQty" class="form-group row">
        <label for="x_LedQty" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_LedQty"><?= $Page->LedQty->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_LedQty" id="z_LedQty" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LedQty->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_LedQty" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->LedQty->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_LedQty" name="x_LedQty" id="x_LedQty" size="30" placeholder="<?= HtmlEncode($Page->LedQty->getPlaceHolder()) ?>" value="<?= $Page->LedQty->EditValue ?>"<?= $Page->LedQty->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->LedQty->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label for="x_id" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_id"><?= $Page->id->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_id" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->id->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_id" name="x_id" id="x_id" placeholder="<?= HtmlEncode($Page->id->getPlaceHolder()) ?>" value="<?= $Page->id->EditValue ?>"<?= $Page->id->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->id->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PurValue->Visible) { // PurValue ?>
    <div id="r_PurValue" class="form-group row">
        <label for="x_PurValue" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PurValue"><?= $Page->PurValue->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PurValue" id="z_PurValue" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PurValue->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_PurValue" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PurValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PurValue" name="x_PurValue" id="x_PurValue" size="30" placeholder="<?= HtmlEncode($Page->PurValue->getPlaceHolder()) ?>" value="<?= $Page->PurValue->EditValue ?>"<?= $Page->PurValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PurValue->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PSGST->Visible) { // PSGST ?>
    <div id="r_PSGST" class="form-group row">
        <label for="x_PSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PSGST"><?= $Page->PSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PSGST" id="z_PSGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PSGST->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_PSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PSGST" name="x_PSGST" id="x_PSGST" size="30" placeholder="<?= HtmlEncode($Page->PSGST->getPlaceHolder()) ?>" value="<?= $Page->PSGST->EditValue ?>"<?= $Page->PSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->PCGST->Visible) { // PCGST ?>
    <div id="r_PCGST" class="form-group row">
        <label for="x_PCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_PCGST"><?= $Page->PCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_PCGST" id="z_PCGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PCGST->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_PCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->PCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_PCGST" name="x_PCGST" id="x_PCGST" size="30" placeholder="<?= HtmlEncode($Page->PCGST->getPlaceHolder()) ?>" value="<?= $Page->PCGST->EditValue ?>"<?= $Page->PCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->PCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SaleValue->Visible) { // SaleValue ?>
    <div id="r_SaleValue" class="form-group row">
        <label for="x_SaleValue" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleValue"><?= $Page->SaleValue->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SaleValue" id="z_SaleValue" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SaleValue->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_SaleValue" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SaleValue->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleValue" name="x_SaleValue" id="x_SaleValue" size="30" placeholder="<?= HtmlEncode($Page->SaleValue->getPlaceHolder()) ?>" value="<?= $Page->SaleValue->EditValue ?>"<?= $Page->SaleValue->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleValue->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SSGST->Visible) { // SSGST ?>
    <div id="r_SSGST" class="form-group row">
        <label for="x_SSGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SSGST"><?= $Page->SSGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SSGST" id="z_SSGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SSGST->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_SSGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SSGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SSGST" name="x_SSGST" id="x_SSGST" size="30" placeholder="<?= HtmlEncode($Page->SSGST->getPlaceHolder()) ?>" value="<?= $Page->SSGST->EditValue ?>"<?= $Page->SSGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SSGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SCGST->Visible) { // SCGST ?>
    <div id="r_SCGST" class="form-group row">
        <label for="x_SCGST" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SCGST"><?= $Page->SCGST->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SCGST" id="z_SCGST" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SCGST->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_SCGST" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SCGST->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SCGST" name="x_SCGST" id="x_SCGST" size="30" placeholder="<?= HtmlEncode($Page->SCGST->getPlaceHolder()) ?>" value="<?= $Page->SCGST->EditValue ?>"<?= $Page->SCGST->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SCGST->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->SaleRate->Visible) { // SaleRate ?>
    <div id="r_SaleRate" class="form-group row">
        <label for="x_SaleRate" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_SaleRate"><?= $Page->SaleRate->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_SaleRate" id="z_SaleRate" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SaleRate->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_SaleRate" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->SaleRate->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_SaleRate" name="x_SaleRate" id="x_SaleRate" size="30" placeholder="<?= HtmlEncode($Page->SaleRate->getPlaceHolder()) ?>" value="<?= $Page->SaleRate->EditValue ?>"<?= $Page->SaleRate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->SaleRate->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_HospID"><?= $Page->HospID->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("=") ?>
<input type="hidden" name="z_HospID" id="z_HospID" value="=">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_HospID" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->BRNAME->Visible) { // BRNAME ?>
    <div id="r_BRNAME" class="form-group row">
        <label for="x_BRNAME" class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_BRNAME"><?= $Page->BRNAME->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_BRNAME" id="z_BRNAME" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRNAME->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_BRNAME" class="ew-search-field ew-search-field-single">
<input type="<?= $Page->BRNAME->getInputTextType() ?>" data-table="pharmacy_storemast" data-field="x_BRNAME" name="x_BRNAME" id="x_BRNAME" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BRNAME->getPlaceHolder()) ?>" value="<?= $Page->BRNAME->EditValue ?>"<?= $Page->BRNAME->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->BRNAME->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Scheduling->Visible) { // Scheduling ?>
    <div id="r_Scheduling" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_Scheduling"><?= $Page->Scheduling->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Scheduling" id="z_Scheduling" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Scheduling->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_Scheduling" class="ew-search-field ew-search-field-single">
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
    value="<?= HtmlEncode($Page->Scheduling->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_Scheduling"
    data-target="dsl_x_Scheduling"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Scheduling->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Scheduling"
    data-value-separator="<?= $Page->Scheduling->displayValueSeparatorAttribute() ?>"
    <?= $Page->Scheduling->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Scheduling->getErrorMessage(false) ?></div>
</span>
        </div></div>
    </div>
<?php } ?>
<?php if ($Page->Schedulingh1->Visible) { // Schedulingh1 ?>
    <div id="r_Schedulingh1" class="form-group row">
        <label class="<?= $Page->LeftColumnClass ?>"><span id="elh_pharmacy_storemast_Schedulingh1"><?= $Page->Schedulingh1->caption() ?></span>
        <span class="ew-search-operator">
<?= $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Schedulingh1" id="z_Schedulingh1" value="LIKE">
</span>
        </label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Schedulingh1->cellAttributes() ?>>
            <span id="el_pharmacy_storemast_Schedulingh1" class="ew-search-field ew-search-field-single">
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
    value="<?= HtmlEncode($Page->Schedulingh1->AdvancedSearch->SearchValue) ?>"
    data-type="select-one"
    data-template="tp_x_Schedulingh1"
    data-target="dsl_x_Schedulingh1"
    data-repeatcolumn="5"
    class="form-control<?= $Page->Schedulingh1->isInvalidClass() ?>"
    data-table="pharmacy_storemast"
    data-field="x_Schedulingh1"
    data-value-separator="<?= $Page->Schedulingh1->displayValueSeparatorAttribute() ?>"
    <?= $Page->Schedulingh1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Page->Schedulingh1->getErrorMessage(false) ?></div>
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
    ew.addEventHandlers("pharmacy_storemast");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

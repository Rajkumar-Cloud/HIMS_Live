<?php

namespace PHPMaker2021\HIMS;

// Page object
$CrmLeadaddressAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fcrm_leadaddressadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fcrm_leadaddressadd = currentForm = new ew.Form("fcrm_leadaddressadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "crm_leadaddress")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.crm_leadaddress)
        ew.vars.tables.crm_leadaddress = currentTable;
    fcrm_leadaddressadd.addFields([
        ["leadaddressid", [fields.leadaddressid.visible && fields.leadaddressid.required ? ew.Validators.required(fields.leadaddressid.caption) : null, ew.Validators.integer], fields.leadaddressid.isInvalid],
        ["phone", [fields.phone.visible && fields.phone.required ? ew.Validators.required(fields.phone.caption) : null], fields.phone.isInvalid],
        ["mobile", [fields.mobile.visible && fields.mobile.required ? ew.Validators.required(fields.mobile.caption) : null], fields.mobile.isInvalid],
        ["fax", [fields.fax.visible && fields.fax.required ? ew.Validators.required(fields.fax.caption) : null], fields.fax.isInvalid],
        ["addresslevel1a", [fields.addresslevel1a.visible && fields.addresslevel1a.required ? ew.Validators.required(fields.addresslevel1a.caption) : null], fields.addresslevel1a.isInvalid],
        ["addresslevel2a", [fields.addresslevel2a.visible && fields.addresslevel2a.required ? ew.Validators.required(fields.addresslevel2a.caption) : null], fields.addresslevel2a.isInvalid],
        ["addresslevel3a", [fields.addresslevel3a.visible && fields.addresslevel3a.required ? ew.Validators.required(fields.addresslevel3a.caption) : null], fields.addresslevel3a.isInvalid],
        ["addresslevel4a", [fields.addresslevel4a.visible && fields.addresslevel4a.required ? ew.Validators.required(fields.addresslevel4a.caption) : null], fields.addresslevel4a.isInvalid],
        ["addresslevel5a", [fields.addresslevel5a.visible && fields.addresslevel5a.required ? ew.Validators.required(fields.addresslevel5a.caption) : null], fields.addresslevel5a.isInvalid],
        ["addresslevel6a", [fields.addresslevel6a.visible && fields.addresslevel6a.required ? ew.Validators.required(fields.addresslevel6a.caption) : null], fields.addresslevel6a.isInvalid],
        ["addresslevel7a", [fields.addresslevel7a.visible && fields.addresslevel7a.required ? ew.Validators.required(fields.addresslevel7a.caption) : null], fields.addresslevel7a.isInvalid],
        ["addresslevel8a", [fields.addresslevel8a.visible && fields.addresslevel8a.required ? ew.Validators.required(fields.addresslevel8a.caption) : null], fields.addresslevel8a.isInvalid],
        ["buildingnumbera", [fields.buildingnumbera.visible && fields.buildingnumbera.required ? ew.Validators.required(fields.buildingnumbera.caption) : null], fields.buildingnumbera.isInvalid],
        ["localnumbera", [fields.localnumbera.visible && fields.localnumbera.required ? ew.Validators.required(fields.localnumbera.caption) : null], fields.localnumbera.isInvalid],
        ["poboxa", [fields.poboxa.visible && fields.poboxa.required ? ew.Validators.required(fields.poboxa.caption) : null], fields.poboxa.isInvalid],
        ["phone_extra", [fields.phone_extra.visible && fields.phone_extra.required ? ew.Validators.required(fields.phone_extra.caption) : null], fields.phone_extra.isInvalid],
        ["mobile_extra", [fields.mobile_extra.visible && fields.mobile_extra.required ? ew.Validators.required(fields.mobile_extra.caption) : null], fields.mobile_extra.isInvalid],
        ["fax_extra", [fields.fax_extra.visible && fields.fax_extra.required ? ew.Validators.required(fields.fax_extra.caption) : null], fields.fax_extra.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fcrm_leadaddressadd,
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
    fcrm_leadaddressadd.validate = function () {
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
    fcrm_leadaddressadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fcrm_leadaddressadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fcrm_leadaddressadd");
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
<form name="fcrm_leadaddressadd" id="fcrm_leadaddressadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="crm_leadaddress">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->leadaddressid->Visible) { // leadaddressid ?>
    <div id="r_leadaddressid" class="form-group row">
        <label id="elh_crm_leadaddress_leadaddressid" for="x_leadaddressid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->leadaddressid->caption() ?><?= $Page->leadaddressid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->leadaddressid->cellAttributes() ?>>
<span id="el_crm_leadaddress_leadaddressid">
<input type="<?= $Page->leadaddressid->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_leadaddressid" name="x_leadaddressid" id="x_leadaddressid" size="30" placeholder="<?= HtmlEncode($Page->leadaddressid->getPlaceHolder()) ?>" value="<?= $Page->leadaddressid->EditValue ?>"<?= $Page->leadaddressid->editAttributes() ?> aria-describedby="x_leadaddressid_help">
<?= $Page->leadaddressid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->leadaddressid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone->Visible) { // phone ?>
    <div id="r_phone" class="form-group row">
        <label id="elh_crm_leadaddress_phone" for="x_phone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->phone->caption() ?><?= $Page->phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->phone->cellAttributes() ?>>
<span id="el_crm_leadaddress_phone">
<input type="<?= $Page->phone->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_phone" name="x_phone" id="x_phone" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->phone->getPlaceHolder()) ?>" value="<?= $Page->phone->EditValue ?>"<?= $Page->phone->editAttributes() ?> aria-describedby="x_phone_help">
<?= $Page->phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile->Visible) { // mobile ?>
    <div id="r_mobile" class="form-group row">
        <label id="elh_crm_leadaddress_mobile" for="x_mobile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile->caption() ?><?= $Page->mobile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile->cellAttributes() ?>>
<span id="el_crm_leadaddress_mobile">
<input type="<?= $Page->mobile->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_mobile" name="x_mobile" id="x_mobile" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->mobile->getPlaceHolder()) ?>" value="<?= $Page->mobile->EditValue ?>"<?= $Page->mobile->editAttributes() ?> aria-describedby="x_mobile_help">
<?= $Page->mobile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fax->Visible) { // fax ?>
    <div id="r_fax" class="form-group row">
        <label id="elh_crm_leadaddress_fax" for="x_fax" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fax->caption() ?><?= $Page->fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->fax->cellAttributes() ?>>
<span id="el_crm_leadaddress_fax">
<input type="<?= $Page->fax->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_fax" name="x_fax" id="x_fax" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->fax->getPlaceHolder()) ?>" value="<?= $Page->fax->EditValue ?>"<?= $Page->fax->editAttributes() ?> aria-describedby="x_fax_help">
<?= $Page->fax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fax->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->addresslevel1a->Visible) { // addresslevel1a ?>
    <div id="r_addresslevel1a" class="form-group row">
        <label id="elh_crm_leadaddress_addresslevel1a" for="x_addresslevel1a" class="<?= $Page->LeftColumnClass ?>"><?= $Page->addresslevel1a->caption() ?><?= $Page->addresslevel1a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->addresslevel1a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel1a">
<input type="<?= $Page->addresslevel1a->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_addresslevel1a" name="x_addresslevel1a" id="x_addresslevel1a" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->addresslevel1a->getPlaceHolder()) ?>" value="<?= $Page->addresslevel1a->EditValue ?>"<?= $Page->addresslevel1a->editAttributes() ?> aria-describedby="x_addresslevel1a_help">
<?= $Page->addresslevel1a->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->addresslevel1a->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->addresslevel2a->Visible) { // addresslevel2a ?>
    <div id="r_addresslevel2a" class="form-group row">
        <label id="elh_crm_leadaddress_addresslevel2a" for="x_addresslevel2a" class="<?= $Page->LeftColumnClass ?>"><?= $Page->addresslevel2a->caption() ?><?= $Page->addresslevel2a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->addresslevel2a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel2a">
<input type="<?= $Page->addresslevel2a->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_addresslevel2a" name="x_addresslevel2a" id="x_addresslevel2a" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->addresslevel2a->getPlaceHolder()) ?>" value="<?= $Page->addresslevel2a->EditValue ?>"<?= $Page->addresslevel2a->editAttributes() ?> aria-describedby="x_addresslevel2a_help">
<?= $Page->addresslevel2a->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->addresslevel2a->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->addresslevel3a->Visible) { // addresslevel3a ?>
    <div id="r_addresslevel3a" class="form-group row">
        <label id="elh_crm_leadaddress_addresslevel3a" for="x_addresslevel3a" class="<?= $Page->LeftColumnClass ?>"><?= $Page->addresslevel3a->caption() ?><?= $Page->addresslevel3a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->addresslevel3a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel3a">
<input type="<?= $Page->addresslevel3a->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_addresslevel3a" name="x_addresslevel3a" id="x_addresslevel3a" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->addresslevel3a->getPlaceHolder()) ?>" value="<?= $Page->addresslevel3a->EditValue ?>"<?= $Page->addresslevel3a->editAttributes() ?> aria-describedby="x_addresslevel3a_help">
<?= $Page->addresslevel3a->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->addresslevel3a->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->addresslevel4a->Visible) { // addresslevel4a ?>
    <div id="r_addresslevel4a" class="form-group row">
        <label id="elh_crm_leadaddress_addresslevel4a" for="x_addresslevel4a" class="<?= $Page->LeftColumnClass ?>"><?= $Page->addresslevel4a->caption() ?><?= $Page->addresslevel4a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->addresslevel4a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel4a">
<input type="<?= $Page->addresslevel4a->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_addresslevel4a" name="x_addresslevel4a" id="x_addresslevel4a" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->addresslevel4a->getPlaceHolder()) ?>" value="<?= $Page->addresslevel4a->EditValue ?>"<?= $Page->addresslevel4a->editAttributes() ?> aria-describedby="x_addresslevel4a_help">
<?= $Page->addresslevel4a->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->addresslevel4a->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->addresslevel5a->Visible) { // addresslevel5a ?>
    <div id="r_addresslevel5a" class="form-group row">
        <label id="elh_crm_leadaddress_addresslevel5a" for="x_addresslevel5a" class="<?= $Page->LeftColumnClass ?>"><?= $Page->addresslevel5a->caption() ?><?= $Page->addresslevel5a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->addresslevel5a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel5a">
<input type="<?= $Page->addresslevel5a->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_addresslevel5a" name="x_addresslevel5a" id="x_addresslevel5a" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->addresslevel5a->getPlaceHolder()) ?>" value="<?= $Page->addresslevel5a->EditValue ?>"<?= $Page->addresslevel5a->editAttributes() ?> aria-describedby="x_addresslevel5a_help">
<?= $Page->addresslevel5a->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->addresslevel5a->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->addresslevel6a->Visible) { // addresslevel6a ?>
    <div id="r_addresslevel6a" class="form-group row">
        <label id="elh_crm_leadaddress_addresslevel6a" for="x_addresslevel6a" class="<?= $Page->LeftColumnClass ?>"><?= $Page->addresslevel6a->caption() ?><?= $Page->addresslevel6a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->addresslevel6a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel6a">
<input type="<?= $Page->addresslevel6a->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_addresslevel6a" name="x_addresslevel6a" id="x_addresslevel6a" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->addresslevel6a->getPlaceHolder()) ?>" value="<?= $Page->addresslevel6a->EditValue ?>"<?= $Page->addresslevel6a->editAttributes() ?> aria-describedby="x_addresslevel6a_help">
<?= $Page->addresslevel6a->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->addresslevel6a->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->addresslevel7a->Visible) { // addresslevel7a ?>
    <div id="r_addresslevel7a" class="form-group row">
        <label id="elh_crm_leadaddress_addresslevel7a" for="x_addresslevel7a" class="<?= $Page->LeftColumnClass ?>"><?= $Page->addresslevel7a->caption() ?><?= $Page->addresslevel7a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->addresslevel7a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel7a">
<input type="<?= $Page->addresslevel7a->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_addresslevel7a" name="x_addresslevel7a" id="x_addresslevel7a" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->addresslevel7a->getPlaceHolder()) ?>" value="<?= $Page->addresslevel7a->EditValue ?>"<?= $Page->addresslevel7a->editAttributes() ?> aria-describedby="x_addresslevel7a_help">
<?= $Page->addresslevel7a->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->addresslevel7a->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->addresslevel8a->Visible) { // addresslevel8a ?>
    <div id="r_addresslevel8a" class="form-group row">
        <label id="elh_crm_leadaddress_addresslevel8a" for="x_addresslevel8a" class="<?= $Page->LeftColumnClass ?>"><?= $Page->addresslevel8a->caption() ?><?= $Page->addresslevel8a->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->addresslevel8a->cellAttributes() ?>>
<span id="el_crm_leadaddress_addresslevel8a">
<input type="<?= $Page->addresslevel8a->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_addresslevel8a" name="x_addresslevel8a" id="x_addresslevel8a" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->addresslevel8a->getPlaceHolder()) ?>" value="<?= $Page->addresslevel8a->EditValue ?>"<?= $Page->addresslevel8a->editAttributes() ?> aria-describedby="x_addresslevel8a_help">
<?= $Page->addresslevel8a->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->addresslevel8a->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->buildingnumbera->Visible) { // buildingnumbera ?>
    <div id="r_buildingnumbera" class="form-group row">
        <label id="elh_crm_leadaddress_buildingnumbera" for="x_buildingnumbera" class="<?= $Page->LeftColumnClass ?>"><?= $Page->buildingnumbera->caption() ?><?= $Page->buildingnumbera->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->buildingnumbera->cellAttributes() ?>>
<span id="el_crm_leadaddress_buildingnumbera">
<input type="<?= $Page->buildingnumbera->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_buildingnumbera" name="x_buildingnumbera" id="x_buildingnumbera" size="30" maxlength="255" placeholder="<?= HtmlEncode($Page->buildingnumbera->getPlaceHolder()) ?>" value="<?= $Page->buildingnumbera->EditValue ?>"<?= $Page->buildingnumbera->editAttributes() ?> aria-describedby="x_buildingnumbera_help">
<?= $Page->buildingnumbera->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->buildingnumbera->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->localnumbera->Visible) { // localnumbera ?>
    <div id="r_localnumbera" class="form-group row">
        <label id="elh_crm_leadaddress_localnumbera" for="x_localnumbera" class="<?= $Page->LeftColumnClass ?>"><?= $Page->localnumbera->caption() ?><?= $Page->localnumbera->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->localnumbera->cellAttributes() ?>>
<span id="el_crm_leadaddress_localnumbera">
<input type="<?= $Page->localnumbera->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_localnumbera" name="x_localnumbera" id="x_localnumbera" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->localnumbera->getPlaceHolder()) ?>" value="<?= $Page->localnumbera->EditValue ?>"<?= $Page->localnumbera->editAttributes() ?> aria-describedby="x_localnumbera_help">
<?= $Page->localnumbera->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->localnumbera->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->poboxa->Visible) { // poboxa ?>
    <div id="r_poboxa" class="form-group row">
        <label id="elh_crm_leadaddress_poboxa" for="x_poboxa" class="<?= $Page->LeftColumnClass ?>"><?= $Page->poboxa->caption() ?><?= $Page->poboxa->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->poboxa->cellAttributes() ?>>
<span id="el_crm_leadaddress_poboxa">
<input type="<?= $Page->poboxa->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_poboxa" name="x_poboxa" id="x_poboxa" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->poboxa->getPlaceHolder()) ?>" value="<?= $Page->poboxa->EditValue ?>"<?= $Page->poboxa->editAttributes() ?> aria-describedby="x_poboxa_help">
<?= $Page->poboxa->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->poboxa->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone_extra->Visible) { // phone_extra ?>
    <div id="r_phone_extra" class="form-group row">
        <label id="elh_crm_leadaddress_phone_extra" for="x_phone_extra" class="<?= $Page->LeftColumnClass ?>"><?= $Page->phone_extra->caption() ?><?= $Page->phone_extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->phone_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_phone_extra">
<input type="<?= $Page->phone_extra->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_phone_extra" name="x_phone_extra" id="x_phone_extra" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->phone_extra->getPlaceHolder()) ?>" value="<?= $Page->phone_extra->EditValue ?>"<?= $Page->phone_extra->editAttributes() ?> aria-describedby="x_phone_extra_help">
<?= $Page->phone_extra->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone_extra->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mobile_extra->Visible) { // mobile_extra ?>
    <div id="r_mobile_extra" class="form-group row">
        <label id="elh_crm_leadaddress_mobile_extra" for="x_mobile_extra" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mobile_extra->caption() ?><?= $Page->mobile_extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mobile_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_mobile_extra">
<input type="<?= $Page->mobile_extra->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_mobile_extra" name="x_mobile_extra" id="x_mobile_extra" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->mobile_extra->getPlaceHolder()) ?>" value="<?= $Page->mobile_extra->EditValue ?>"<?= $Page->mobile_extra->editAttributes() ?> aria-describedby="x_mobile_extra_help">
<?= $Page->mobile_extra->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mobile_extra->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fax_extra->Visible) { // fax_extra ?>
    <div id="r_fax_extra" class="form-group row">
        <label id="elh_crm_leadaddress_fax_extra" for="x_fax_extra" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fax_extra->caption() ?><?= $Page->fax_extra->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->fax_extra->cellAttributes() ?>>
<span id="el_crm_leadaddress_fax_extra">
<input type="<?= $Page->fax_extra->getInputTextType() ?>" data-table="crm_leadaddress" data-field="x_fax_extra" name="x_fax_extra" id="x_fax_extra" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->fax_extra->getPlaceHolder()) ?>" value="<?= $Page->fax_extra->EditValue ?>"<?= $Page->fax_extra->editAttributes() ?> aria-describedby="x_fax_extra_help">
<?= $Page->fax_extra->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fax_extra->getErrorMessage() ?></div>
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
    ew.addEventHandlers("crm_leadaddress");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

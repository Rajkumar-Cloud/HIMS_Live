<?php

namespace PHPMaker2021\HIMS;

// Page object
$SysCountryAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fsys_countryadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fsys_countryadd = currentForm = new ew.Form("fsys_countryadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "sys_country")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.sys_country)
        ew.vars.tables.sys_country = currentTable;
    fsys_countryadd.addFields([
        ["code", [fields.code.visible && fields.code.required ? ew.Validators.required(fields.code.caption) : null], fields.code.isInvalid],
        ["namecap", [fields.namecap.visible && fields.namecap.required ? ew.Validators.required(fields.namecap.caption) : null], fields.namecap.isInvalid],
        ["name", [fields.name.visible && fields.name.required ? ew.Validators.required(fields.name.caption) : null], fields.name.isInvalid],
        ["iso3", [fields.iso3.visible && fields.iso3.required ? ew.Validators.required(fields.iso3.caption) : null], fields.iso3.isInvalid],
        ["numcode", [fields.numcode.visible && fields.numcode.required ? ew.Validators.required(fields.numcode.caption) : null, ew.Validators.integer], fields.numcode.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fsys_countryadd,
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
    fsys_countryadd.validate = function () {
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
    fsys_countryadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fsys_countryadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fsys_countryadd");
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
<form name="fsys_countryadd" id="fsys_countryadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="sys_country">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->code->Visible) { // code ?>
    <div id="r_code" class="form-group row">
        <label id="elh_sys_country_code" for="x_code" class="<?= $Page->LeftColumnClass ?>"><?= $Page->code->caption() ?><?= $Page->code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->code->cellAttributes() ?>>
<span id="el_sys_country_code">
<input type="<?= $Page->code->getInputTextType() ?>" data-table="sys_country" data-field="x_code" name="x_code" id="x_code" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->code->getPlaceHolder()) ?>" value="<?= $Page->code->EditValue ?>"<?= $Page->code->editAttributes() ?> aria-describedby="x_code_help">
<?= $Page->code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->code->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->namecap->Visible) { // namecap ?>
    <div id="r_namecap" class="form-group row">
        <label id="elh_sys_country_namecap" for="x_namecap" class="<?= $Page->LeftColumnClass ?>"><?= $Page->namecap->caption() ?><?= $Page->namecap->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->namecap->cellAttributes() ?>>
<span id="el_sys_country_namecap">
<input type="<?= $Page->namecap->getInputTextType() ?>" data-table="sys_country" data-field="x_namecap" name="x_namecap" id="x_namecap" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->namecap->getPlaceHolder()) ?>" value="<?= $Page->namecap->EditValue ?>"<?= $Page->namecap->editAttributes() ?> aria-describedby="x_namecap_help">
<?= $Page->namecap->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->namecap->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->name->Visible) { // name ?>
    <div id="r_name" class="form-group row">
        <label id="elh_sys_country_name" for="x_name" class="<?= $Page->LeftColumnClass ?>"><?= $Page->name->caption() ?><?= $Page->name->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->name->cellAttributes() ?>>
<span id="el_sys_country_name">
<input type="<?= $Page->name->getInputTextType() ?>" data-table="sys_country" data-field="x_name" name="x_name" id="x_name" size="30" maxlength="80" placeholder="<?= HtmlEncode($Page->name->getPlaceHolder()) ?>" value="<?= $Page->name->EditValue ?>"<?= $Page->name->editAttributes() ?> aria-describedby="x_name_help">
<?= $Page->name->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->name->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->iso3->Visible) { // iso3 ?>
    <div id="r_iso3" class="form-group row">
        <label id="elh_sys_country_iso3" for="x_iso3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->iso3->caption() ?><?= $Page->iso3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->iso3->cellAttributes() ?>>
<span id="el_sys_country_iso3">
<input type="<?= $Page->iso3->getInputTextType() ?>" data-table="sys_country" data-field="x_iso3" name="x_iso3" id="x_iso3" size="30" maxlength="3" placeholder="<?= HtmlEncode($Page->iso3->getPlaceHolder()) ?>" value="<?= $Page->iso3->EditValue ?>"<?= $Page->iso3->editAttributes() ?> aria-describedby="x_iso3_help">
<?= $Page->iso3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->iso3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->numcode->Visible) { // numcode ?>
    <div id="r_numcode" class="form-group row">
        <label id="elh_sys_country_numcode" for="x_numcode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->numcode->caption() ?><?= $Page->numcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->numcode->cellAttributes() ?>>
<span id="el_sys_country_numcode">
<input type="<?= $Page->numcode->getInputTextType() ?>" data-table="sys_country" data-field="x_numcode" name="x_numcode" id="x_numcode" size="30" placeholder="<?= HtmlEncode($Page->numcode->getPlaceHolder()) ?>" value="<?= $Page->numcode->EditValue ?>"<?= $Page->numcode->editAttributes() ?> aria-describedby="x_numcode_help">
<?= $Page->numcode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->numcode->getErrorMessage() ?></div>
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
    ew.addEventHandlers("sys_country");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

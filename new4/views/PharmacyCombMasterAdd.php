<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyCombMasterAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_comb_masteradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpharmacy_comb_masteradd = currentForm = new ew.Form("fpharmacy_comb_masteradd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_comb_master")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_comb_master)
        ew.vars.tables.pharmacy_comb_master = currentTable;
    fpharmacy_comb_masteradd.addFields([
        ["CODE", [fields.CODE.visible && fields.CODE.required ? ew.Validators.required(fields.CODE.caption) : null], fields.CODE.isInvalid],
        ["NAME", [fields.NAME.visible && fields.NAME.required ? ew.Validators.required(fields.NAME.caption) : null], fields.NAME.isInvalid],
        ["GRPCODE", [fields.GRPCODE.visible && fields.GRPCODE.required ? ew.Validators.required(fields.GRPCODE.caption) : null], fields.GRPCODE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_comb_masteradd,
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
    fpharmacy_comb_masteradd.validate = function () {
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
    fpharmacy_comb_masteradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_comb_masteradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_comb_masteradd.lists.GRPCODE = <?= $Page->GRPCODE->toClientList($Page) ?>;
    loadjs.done("fpharmacy_comb_masteradd");
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
<form name="fpharmacy_comb_masteradd" id="fpharmacy_comb_masteradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_comb_master">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->CODE->Visible) { // CODE ?>
    <div id="r_CODE" class="form-group row">
        <label id="elh_pharmacy_comb_master_CODE" for="x_CODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CODE->caption() ?><?= $Page->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CODE->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_CODE">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="pharmacy_comb_master" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?> aria-describedby="x_CODE_help">
<?= $Page->CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NAME->Visible) { // NAME ?>
    <div id="r_NAME" class="form-group row">
        <label id="elh_pharmacy_comb_master_NAME" for="x_NAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NAME->caption() ?><?= $Page->NAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NAME->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_NAME">
<input type="<?= $Page->NAME->getInputTextType() ?>" data-table="pharmacy_comb_master" data-field="x_NAME" name="x_NAME" id="x_NAME" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->NAME->getPlaceHolder()) ?>" value="<?= $Page->NAME->EditValue ?>"<?= $Page->NAME->editAttributes() ?> aria-describedby="x_NAME_help">
<?= $Page->NAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GRPCODE->Visible) { // GRPCODE ?>
    <div id="r_GRPCODE" class="form-group row">
        <label id="elh_pharmacy_comb_master_GRPCODE" for="x_GRPCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GRPCODE->caption() ?><?= $Page->GRPCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRPCODE->cellAttributes() ?>>
<span id="el_pharmacy_comb_master_GRPCODE">
<div class="input-group ew-lookup-list" aria-describedby="x_GRPCODE_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GRPCODE"><?= EmptyValue(strval($Page->GRPCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GRPCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GRPCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GRPCODE->ReadOnly || $Page->GRPCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GRPCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GRPCODE->getErrorMessage() ?></div>
<?= $Page->GRPCODE->getCustomMessage() ?>
<?= $Page->GRPCODE->Lookup->getParamTag($Page, "p_x_GRPCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_comb_master" data-field="x_GRPCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GRPCODE->displayValueSeparatorAttribute() ?>" name="x_GRPCODE" id="x_GRPCODE" value="<?= $Page->GRPCODE->CurrentValue ?>"<?= $Page->GRPCODE->editAttributes() ?>>
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
    ew.addEventHandlers("pharmacy_comb_master");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

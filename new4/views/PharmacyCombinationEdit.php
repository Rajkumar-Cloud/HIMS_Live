<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyCombinationEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_combinationedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpharmacy_combinationedit = currentForm = new ew.Form("fpharmacy_combinationedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_combination")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_combination)
        ew.vars.tables.pharmacy_combination = currentTable;
    fpharmacy_combinationedit.addFields([
        ["GENCODE", [fields.GENCODE.visible && fields.GENCODE.required ? ew.Validators.required(fields.GENCODE.caption) : null], fields.GENCODE.isInvalid],
        ["COMBCODE", [fields.COMBCODE.visible && fields.COMBCODE.required ? ew.Validators.required(fields.COMBCODE.caption) : null], fields.COMBCODE.isInvalid],
        ["STRENGTH", [fields.STRENGTH.visible && fields.STRENGTH.required ? ew.Validators.required(fields.STRENGTH.caption) : null, ew.Validators.float], fields.STRENGTH.isInvalid],
        ["SLNO", [fields.SLNO.visible && fields.SLNO.required ? ew.Validators.required(fields.SLNO.caption) : null], fields.SLNO.isInvalid],
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_combinationedit,
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
    fpharmacy_combinationedit.validate = function () {
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
    fpharmacy_combinationedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_combinationedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_combinationedit.lists.GENCODE = <?= $Page->GENCODE->toClientList($Page) ?>;
    fpharmacy_combinationedit.lists.COMBCODE = <?= $Page->COMBCODE->toClientList($Page) ?>;
    loadjs.done("fpharmacy_combinationedit");
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
<form name="fpharmacy_combinationedit" id="fpharmacy_combinationedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_combination">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->GENCODE->Visible) { // GENCODE ?>
    <div id="r_GENCODE" class="form-group row">
        <label id="elh_pharmacy_combination_GENCODE" for="x_GENCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENCODE->caption() ?><?= $Page->GENCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_GENCODE">
<div class="input-group ew-lookup-list" aria-describedby="x_GENCODE_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_GENCODE"><?= EmptyValue(strval($Page->GENCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->GENCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->GENCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->GENCODE->ReadOnly || $Page->GENCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_GENCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->GENCODE->getErrorMessage() ?></div>
<?= $Page->GENCODE->getCustomMessage() ?>
<?= $Page->GENCODE->Lookup->getParamTag($Page, "p_x_GENCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_combination" data-field="x_GENCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->GENCODE->displayValueSeparatorAttribute() ?>" name="x_GENCODE" id="x_GENCODE" value="<?= $Page->GENCODE->CurrentValue ?>"<?= $Page->GENCODE->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->COMBCODE->Visible) { // COMBCODE ?>
    <div id="r_COMBCODE" class="form-group row">
        <label id="elh_pharmacy_combination_COMBCODE" for="x_COMBCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->COMBCODE->caption() ?><?= $Page->COMBCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->COMBCODE->cellAttributes() ?>>
<span id="el_pharmacy_combination_COMBCODE">
<div class="input-group ew-lookup-list" aria-describedby="x_COMBCODE_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_COMBCODE"><?= EmptyValue(strval($Page->COMBCODE->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->COMBCODE->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->COMBCODE->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->COMBCODE->ReadOnly || $Page->COMBCODE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_COMBCODE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->COMBCODE->getErrorMessage() ?></div>
<?= $Page->COMBCODE->getCustomMessage() ?>
<?= $Page->COMBCODE->Lookup->getParamTag($Page, "p_x_COMBCODE") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_combination" data-field="x_COMBCODE" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->COMBCODE->displayValueSeparatorAttribute() ?>" name="x_COMBCODE" id="x_COMBCODE" value="<?= $Page->COMBCODE->CurrentValue ?>"<?= $Page->COMBCODE->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->STRENGTH->Visible) { // STRENGTH ?>
    <div id="r_STRENGTH" class="form-group row">
        <label id="elh_pharmacy_combination_STRENGTH" for="x_STRENGTH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->STRENGTH->caption() ?><?= $Page->STRENGTH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->STRENGTH->cellAttributes() ?>>
<span id="el_pharmacy_combination_STRENGTH">
<input type="<?= $Page->STRENGTH->getInputTextType() ?>" data-table="pharmacy_combination" data-field="x_STRENGTH" name="x_STRENGTH" id="x_STRENGTH" size="30" placeholder="<?= HtmlEncode($Page->STRENGTH->getPlaceHolder()) ?>" value="<?= $Page->STRENGTH->EditValue ?>"<?= $Page->STRENGTH->editAttributes() ?> aria-describedby="x_STRENGTH_help">
<?= $Page->STRENGTH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->STRENGTH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SLNO->Visible) { // SLNO ?>
    <div id="r_SLNO" class="form-group row">
        <label id="elh_pharmacy_combination_SLNO" for="x_SLNO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SLNO->caption() ?><?= $Page->SLNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SLNO->cellAttributes() ?>>
<span id="el_pharmacy_combination_SLNO">
<input type="<?= $Page->SLNO->getInputTextType() ?>" data-table="pharmacy_combination" data-field="x_SLNO" name="x_SLNO" id="x_SLNO" size="30" maxlength="2" placeholder="<?= HtmlEncode($Page->SLNO->getPlaceHolder()) ?>" value="<?= $Page->SLNO->EditValue ?>"<?= $Page->SLNO->editAttributes() ?> aria-describedby="x_SLNO_help">
<?= $Page->SLNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SLNO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_pharmacy_combination_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_combination_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_combination" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("pharmacy_combination");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\project3;

// Page object
$PharmacyMasterGenericEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_master_genericedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpharmacy_master_genericedit = currentForm = new ew.Form("fpharmacy_master_genericedit", "edit");

    // Add fields
    var fields = ew.vars.tables.pharmacy_master_generic.fields;
    fpharmacy_master_genericedit.addFields([
        ["GENNAME", [fields.GENNAME.required ? ew.Validators.required(fields.GENNAME.caption) : null], fields.GENNAME.isInvalid],
        ["CODE", [fields.CODE.required ? ew.Validators.required(fields.CODE.caption) : null], fields.CODE.isInvalid],
        ["GRPCODE", [fields.GRPCODE.required ? ew.Validators.required(fields.GRPCODE.caption) : null], fields.GRPCODE.isInvalid],
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_master_genericedit,
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
    fpharmacy_master_genericedit.validate = function () {
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
    fpharmacy_master_genericedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_master_genericedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpharmacy_master_genericedit");
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
<form name="fpharmacy_master_genericedit" id="fpharmacy_master_genericedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_master_generic">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->GENNAME->Visible) { // GENNAME ?>
    <div id="r_GENNAME" class="form-group row">
        <label id="elh_pharmacy_master_generic_GENNAME" for="x_GENNAME" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GENNAME->caption() ?><?= $Page->GENNAME->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GENNAME->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_GENNAME">
<input type="<?= $Page->GENNAME->getInputTextType() ?>" data-table="pharmacy_master_generic" data-field="x_GENNAME" name="x_GENNAME" id="x_GENNAME" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->GENNAME->getPlaceHolder()) ?>" value="<?= $Page->GENNAME->EditValue ?>"<?= $Page->GENNAME->editAttributes() ?> aria-describedby="x_GENNAME_help">
<?= $Page->GENNAME->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GENNAME->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CODE->Visible) { // CODE ?>
    <div id="r_CODE" class="form-group row">
        <label id="elh_pharmacy_master_generic_CODE" for="x_CODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CODE->caption() ?><?= $Page->CODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CODE->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_CODE">
<input type="<?= $Page->CODE->getInputTextType() ?>" data-table="pharmacy_master_generic" data-field="x_CODE" name="x_CODE" id="x_CODE" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->CODE->getPlaceHolder()) ?>" value="<?= $Page->CODE->EditValue ?>"<?= $Page->CODE->editAttributes() ?> aria-describedby="x_CODE_help">
<?= $Page->CODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GRPCODE->Visible) { // GRPCODE ?>
    <div id="r_GRPCODE" class="form-group row">
        <label id="elh_pharmacy_master_generic_GRPCODE" for="x_GRPCODE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GRPCODE->caption() ?><?= $Page->GRPCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GRPCODE->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_GRPCODE">
<input type="<?= $Page->GRPCODE->getInputTextType() ?>" data-table="pharmacy_master_generic" data-field="x_GRPCODE" name="x_GRPCODE" id="x_GRPCODE" size="30" maxlength="5" placeholder="<?= HtmlEncode($Page->GRPCODE->getPlaceHolder()) ?>" value="<?= $Page->GRPCODE->EditValue ?>"<?= $Page->GRPCODE->editAttributes() ?> aria-describedby="x_GRPCODE_help">
<?= $Page->GRPCODE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GRPCODE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_pharmacy_master_generic_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_pharmacy_master_generic_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pharmacy_master_generic" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("pharmacy_master_generic");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

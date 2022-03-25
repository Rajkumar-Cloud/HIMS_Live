<?php

namespace PHPMaker2021\project3;

// Page object
$PresSideeffectTableAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_sideeffect_tableadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpres_sideeffect_tableadd = currentForm = new ew.Form("fpres_sideeffect_tableadd", "add");

    // Add fields
    var fields = ew.vars.tables.pres_sideeffect_table.fields;
    fpres_sideeffect_tableadd.addFields([
        ["Genericname", [fields.Genericname.required ? ew.Validators.required(fields.Genericname.caption) : null], fields.Genericname.isInvalid],
        ["SideEffects", [fields.SideEffects.required ? ew.Validators.required(fields.SideEffects.caption) : null], fields.SideEffects.isInvalid],
        ["Contraindications", [fields.Contraindications.required ? ew.Validators.required(fields.Contraindications.caption) : null], fields.Contraindications.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_sideeffect_tableadd,
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
    fpres_sideeffect_tableadd.validate = function () {
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
    fpres_sideeffect_tableadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_sideeffect_tableadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_sideeffect_tableadd");
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
<form name="fpres_sideeffect_tableadd" id="fpres_sideeffect_tableadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_sideeffect_table">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <div id="r_Genericname" class="form-group row">
        <label id="elh_pres_sideeffect_table_Genericname" for="x_Genericname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Genericname->caption() ?><?= $Page->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Genericname">
<input type="<?= $Page->Genericname->getInputTextType() ?>" data-table="pres_sideeffect_table" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Genericname->getPlaceHolder()) ?>" value="<?= $Page->Genericname->EditValue ?>"<?= $Page->Genericname->editAttributes() ?> aria-describedby="x_Genericname_help">
<?= $Page->Genericname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Genericname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SideEffects->Visible) { // SideEffects ?>
    <div id="r_SideEffects" class="form-group row">
        <label id="elh_pres_sideeffect_table_SideEffects" for="x_SideEffects" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SideEffects->caption() ?><?= $Page->SideEffects->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SideEffects->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_SideEffects">
<textarea data-table="pres_sideeffect_table" data-field="x_SideEffects" name="x_SideEffects" id="x_SideEffects" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->SideEffects->getPlaceHolder()) ?>"<?= $Page->SideEffects->editAttributes() ?> aria-describedby="x_SideEffects_help"><?= $Page->SideEffects->EditValue ?></textarea>
<?= $Page->SideEffects->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SideEffects->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Contraindications->Visible) { // Contraindications ?>
    <div id="r_Contraindications" class="form-group row">
        <label id="elh_pres_sideeffect_table_Contraindications" for="x_Contraindications" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Contraindications->caption() ?><?= $Page->Contraindications->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Contraindications->cellAttributes() ?>>
<span id="el_pres_sideeffect_table_Contraindications">
<textarea data-table="pres_sideeffect_table" data-field="x_Contraindications" name="x_Contraindications" id="x_Contraindications" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Contraindications->getPlaceHolder()) ?>"<?= $Page->Contraindications->editAttributes() ?> aria-describedby="x_Contraindications_help"><?= $Page->Contraindications->EditValue ?></textarea>
<?= $Page->Contraindications->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Contraindications->getErrorMessage() ?></div>
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
    ew.addEventHandlers("pres_sideeffect_table");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

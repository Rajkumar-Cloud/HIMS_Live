<?php

namespace PHPMaker2021\HIMS;

// Page object
$PresFluidformulationEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpres_fluidformulationedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpres_fluidformulationedit = currentForm = new ew.Form("fpres_fluidformulationedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pres_fluidformulation")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pres_fluidformulation)
        ew.vars.tables.pres_fluidformulation = currentTable;
    fpres_fluidformulationedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Tradename", [fields.Tradename.visible && fields.Tradename.required ? ew.Validators.required(fields.Tradename.caption) : null], fields.Tradename.isInvalid],
        ["Itemcode", [fields.Itemcode.visible && fields.Itemcode.required ? ew.Validators.required(fields.Itemcode.caption) : null], fields.Itemcode.isInvalid],
        ["Genericname", [fields.Genericname.visible && fields.Genericname.required ? ew.Validators.required(fields.Genericname.caption) : null], fields.Genericname.isInvalid],
        ["Volume", [fields.Volume.visible && fields.Volume.required ? ew.Validators.required(fields.Volume.caption) : null, ew.Validators.float], fields.Volume.isInvalid],
        ["VolumeUnit", [fields.VolumeUnit.visible && fields.VolumeUnit.required ? ew.Validators.required(fields.VolumeUnit.caption) : null], fields.VolumeUnit.isInvalid],
        ["Strength", [fields.Strength.visible && fields.Strength.required ? ew.Validators.required(fields.Strength.caption) : null, ew.Validators.float], fields.Strength.isInvalid],
        ["StrengthUnit", [fields.StrengthUnit.visible && fields.StrengthUnit.required ? ew.Validators.required(fields.StrengthUnit.caption) : null], fields.StrengthUnit.isInvalid],
        ["_Route", [fields._Route.visible && fields._Route.required ? ew.Validators.required(fields._Route.caption) : null], fields._Route.isInvalid],
        ["Forms", [fields.Forms.visible && fields.Forms.required ? ew.Validators.required(fields.Forms.caption) : null], fields.Forms.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpres_fluidformulationedit,
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
    fpres_fluidformulationedit.validate = function () {
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
    fpres_fluidformulationedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpres_fluidformulationedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpres_fluidformulationedit");
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
<form name="fpres_fluidformulationedit" id="fpres_fluidformulationedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pres_fluidformulation">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_pres_fluidformulation_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_pres_fluidformulation_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="pres_fluidformulation" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Tradename->Visible) { // Tradename ?>
    <div id="r_Tradename" class="form-group row">
        <label id="elh_pres_fluidformulation_Tradename" for="x_Tradename" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Tradename->caption() ?><?= $Page->Tradename->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Tradename->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Tradename">
<input type="<?= $Page->Tradename->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x_Tradename" name="x_Tradename" id="x_Tradename" placeholder="<?= HtmlEncode($Page->Tradename->getPlaceHolder()) ?>" value="<?= $Page->Tradename->EditValue ?>"<?= $Page->Tradename->editAttributes() ?> aria-describedby="x_Tradename_help">
<?= $Page->Tradename->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Tradename->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Itemcode->Visible) { // Itemcode ?>
    <div id="r_Itemcode" class="form-group row">
        <label id="elh_pres_fluidformulation_Itemcode" for="x_Itemcode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Itemcode->caption() ?><?= $Page->Itemcode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Itemcode->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Itemcode">
<input type="<?= $Page->Itemcode->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x_Itemcode" name="x_Itemcode" id="x_Itemcode" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->Itemcode->getPlaceHolder()) ?>" value="<?= $Page->Itemcode->EditValue ?>"<?= $Page->Itemcode->editAttributes() ?> aria-describedby="x_Itemcode_help">
<?= $Page->Itemcode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Itemcode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Genericname->Visible) { // Genericname ?>
    <div id="r_Genericname" class="form-group row">
        <label id="elh_pres_fluidformulation_Genericname" for="x_Genericname" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Genericname->caption() ?><?= $Page->Genericname->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Genericname->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Genericname">
<input type="<?= $Page->Genericname->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x_Genericname" name="x_Genericname" id="x_Genericname" size="30" maxlength="100" placeholder="<?= HtmlEncode($Page->Genericname->getPlaceHolder()) ?>" value="<?= $Page->Genericname->EditValue ?>"<?= $Page->Genericname->editAttributes() ?> aria-describedby="x_Genericname_help">
<?= $Page->Genericname->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Genericname->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Volume->Visible) { // Volume ?>
    <div id="r_Volume" class="form-group row">
        <label id="elh_pres_fluidformulation_Volume" for="x_Volume" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Volume->caption() ?><?= $Page->Volume->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Volume->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Volume">
<input type="<?= $Page->Volume->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x_Volume" name="x_Volume" id="x_Volume" size="30" placeholder="<?= HtmlEncode($Page->Volume->getPlaceHolder()) ?>" value="<?= $Page->Volume->EditValue ?>"<?= $Page->Volume->editAttributes() ?> aria-describedby="x_Volume_help">
<?= $Page->Volume->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Volume->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VolumeUnit->Visible) { // VolumeUnit ?>
    <div id="r_VolumeUnit" class="form-group row">
        <label id="elh_pres_fluidformulation_VolumeUnit" for="x_VolumeUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VolumeUnit->caption() ?><?= $Page->VolumeUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VolumeUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_VolumeUnit">
<input type="<?= $Page->VolumeUnit->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x_VolumeUnit" name="x_VolumeUnit" id="x_VolumeUnit" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->VolumeUnit->getPlaceHolder()) ?>" value="<?= $Page->VolumeUnit->EditValue ?>"<?= $Page->VolumeUnit->editAttributes() ?> aria-describedby="x_VolumeUnit_help">
<?= $Page->VolumeUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VolumeUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Strength->Visible) { // Strength ?>
    <div id="r_Strength" class="form-group row">
        <label id="elh_pres_fluidformulation_Strength" for="x_Strength" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Strength->caption() ?><?= $Page->Strength->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Strength->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Strength">
<input type="<?= $Page->Strength->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x_Strength" name="x_Strength" id="x_Strength" size="30" placeholder="<?= HtmlEncode($Page->Strength->getPlaceHolder()) ?>" value="<?= $Page->Strength->EditValue ?>"<?= $Page->Strength->editAttributes() ?> aria-describedby="x_Strength_help">
<?= $Page->Strength->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Strength->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->StrengthUnit->Visible) { // StrengthUnit ?>
    <div id="r_StrengthUnit" class="form-group row">
        <label id="elh_pres_fluidformulation_StrengthUnit" for="x_StrengthUnit" class="<?= $Page->LeftColumnClass ?>"><?= $Page->StrengthUnit->caption() ?><?= $Page->StrengthUnit->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->StrengthUnit->cellAttributes() ?>>
<span id="el_pres_fluidformulation_StrengthUnit">
<input type="<?= $Page->StrengthUnit->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x_StrengthUnit" name="x_StrengthUnit" id="x_StrengthUnit" size="30" maxlength="15" placeholder="<?= HtmlEncode($Page->StrengthUnit->getPlaceHolder()) ?>" value="<?= $Page->StrengthUnit->EditValue ?>"<?= $Page->StrengthUnit->editAttributes() ?> aria-describedby="x_StrengthUnit_help">
<?= $Page->StrengthUnit->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->StrengthUnit->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Route->Visible) { // Route ?>
    <div id="r__Route" class="form-group row">
        <label id="elh_pres_fluidformulation__Route" for="x__Route" class="<?= $Page->LeftColumnClass ?>"><?= $Page->_Route->caption() ?><?= $Page->_Route->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Route->cellAttributes() ?>>
<span id="el_pres_fluidformulation__Route">
<input type="<?= $Page->_Route->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x__Route" name="x__Route" id="x__Route" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->_Route->getPlaceHolder()) ?>" value="<?= $Page->_Route->EditValue ?>"<?= $Page->_Route->editAttributes() ?> aria-describedby="x__Route_help">
<?= $Page->_Route->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Route->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Forms->Visible) { // Forms ?>
    <div id="r_Forms" class="form-group row">
        <label id="elh_pres_fluidformulation_Forms" for="x_Forms" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Forms->caption() ?><?= $Page->Forms->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Forms->cellAttributes() ?>>
<span id="el_pres_fluidformulation_Forms">
<input type="<?= $Page->Forms->getInputTextType() ?>" data-table="pres_fluidformulation" data-field="x_Forms" name="x_Forms" id="x_Forms" size="30" maxlength="10" placeholder="<?= HtmlEncode($Page->Forms->getPlaceHolder()) ?>" value="<?= $Page->Forms->EditValue ?>"<?= $Page->Forms->editAttributes() ?> aria-describedby="x_Forms_help">
<?= $Page->Forms->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Forms->getErrorMessage() ?></div>
</span>
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
    ew.addEventHandlers("pres_fluidformulation");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

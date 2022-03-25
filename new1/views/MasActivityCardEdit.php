<?php

namespace PHPMaker2021\project3;

// Page object
$MasActivityCardEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_activity_cardedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fmas_activity_cardedit = currentForm = new ew.Form("fmas_activity_cardedit", "edit");

    // Add fields
    var fields = ew.vars.tables.mas_activity_card.fields;
    fmas_activity_cardedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Activity", [fields.Activity.required ? ew.Validators.required(fields.Activity.caption) : null], fields.Activity.isInvalid],
        ["Type", [fields.Type.required ? ew.Validators.required(fields.Type.caption) : null], fields.Type.isInvalid],
        ["Selected", [fields.Selected.required ? ew.Validators.required(fields.Selected.caption) : null], fields.Selected.isInvalid],
        ["Units", [fields.Units.required ? ew.Validators.required(fields.Units.caption) : null], fields.Units.isInvalid],
        ["Amount", [fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_activity_cardedit,
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
    fmas_activity_cardedit.validate = function () {
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
    fmas_activity_cardedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_activity_cardedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmas_activity_cardedit");
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
<form name="fmas_activity_cardedit" id="fmas_activity_cardedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_activity_card">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_mas_activity_card_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_mas_activity_card_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="mas_activity_card" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Activity->Visible) { // Activity ?>
    <div id="r_Activity" class="form-group row">
        <label id="elh_mas_activity_card_Activity" for="x_Activity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Activity->caption() ?><?= $Page->Activity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Activity->cellAttributes() ?>>
<span id="el_mas_activity_card_Activity">
<input type="<?= $Page->Activity->getInputTextType() ?>" data-table="mas_activity_card" data-field="x_Activity" name="x_Activity" id="x_Activity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Activity->getPlaceHolder()) ?>" value="<?= $Page->Activity->EditValue ?>"<?= $Page->Activity->editAttributes() ?> aria-describedby="x_Activity_help">
<?= $Page->Activity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Activity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Type->Visible) { // Type ?>
    <div id="r_Type" class="form-group row">
        <label id="elh_mas_activity_card_Type" for="x_Type" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Type->caption() ?><?= $Page->Type->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Type->cellAttributes() ?>>
<span id="el_mas_activity_card_Type">
<input type="<?= $Page->Type->getInputTextType() ?>" data-table="mas_activity_card" data-field="x_Type" name="x_Type" id="x_Type" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Type->getPlaceHolder()) ?>" value="<?= $Page->Type->EditValue ?>"<?= $Page->Type->editAttributes() ?> aria-describedby="x_Type_help">
<?= $Page->Type->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Type->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Selected->Visible) { // Selected ?>
    <div id="r_Selected" class="form-group row">
        <label id="elh_mas_activity_card_Selected" for="x_Selected" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Selected->caption() ?><?= $Page->Selected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Selected->cellAttributes() ?>>
<span id="el_mas_activity_card_Selected">
<input type="<?= $Page->Selected->getInputTextType() ?>" data-table="mas_activity_card" data-field="x_Selected" name="x_Selected" id="x_Selected" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Selected->getPlaceHolder()) ?>" value="<?= $Page->Selected->EditValue ?>"<?= $Page->Selected->editAttributes() ?> aria-describedby="x_Selected_help">
<?= $Page->Selected->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Selected->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Units->Visible) { // Units ?>
    <div id="r_Units" class="form-group row">
        <label id="elh_mas_activity_card_Units" for="x_Units" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Units->caption() ?><?= $Page->Units->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Units->cellAttributes() ?>>
<span id="el_mas_activity_card_Units">
<input type="<?= $Page->Units->getInputTextType() ?>" data-table="mas_activity_card" data-field="x_Units" name="x_Units" id="x_Units" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Units->getPlaceHolder()) ?>" value="<?= $Page->Units->EditValue ?>"<?= $Page->Units->editAttributes() ?> aria-describedby="x_Units_help">
<?= $Page->Units->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Units->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_mas_activity_card_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_mas_activity_card_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="mas_activity_card" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
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
    ew.addEventHandlers("mas_activity_card");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\project3;

// Page object
$MasModepaymentEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fmas_modepaymentedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fmas_modepaymentedit = currentForm = new ew.Form("fmas_modepaymentedit", "edit");

    // Add fields
    var fields = ew.vars.tables.mas_modepayment.fields;
    fmas_modepaymentedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Mode", [fields.Mode.required ? ew.Validators.required(fields.Mode.caption) : null], fields.Mode.isInvalid],
        ["BankingDatails", [fields.BankingDatails.required ? ew.Validators.required(fields.BankingDatails.caption) : null], fields.BankingDatails.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fmas_modepaymentedit,
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
    fmas_modepaymentedit.validate = function () {
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
    fmas_modepaymentedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fmas_modepaymentedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fmas_modepaymentedit");
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
<form name="fmas_modepaymentedit" id="fmas_modepaymentedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="mas_modepayment">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_mas_modepayment_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_mas_modepayment_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="mas_modepayment" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Mode->Visible) { // Mode ?>
    <div id="r_Mode" class="form-group row">
        <label id="elh_mas_modepayment_Mode" for="x_Mode" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Mode->caption() ?><?= $Page->Mode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Mode->cellAttributes() ?>>
<span id="el_mas_modepayment_Mode">
<input type="<?= $Page->Mode->getInputTextType() ?>" data-table="mas_modepayment" data-field="x_Mode" name="x_Mode" id="x_Mode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Mode->getPlaceHolder()) ?>" value="<?= $Page->Mode->EditValue ?>"<?= $Page->Mode->editAttributes() ?> aria-describedby="x_Mode_help">
<?= $Page->Mode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Mode->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BankingDatails->Visible) { // BankingDatails ?>
    <div id="r_BankingDatails" class="form-group row">
        <label id="elh_mas_modepayment_BankingDatails" for="x_BankingDatails" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BankingDatails->caption() ?><?= $Page->BankingDatails->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BankingDatails->cellAttributes() ?>>
<span id="el_mas_modepayment_BankingDatails">
<input type="<?= $Page->BankingDatails->getInputTextType() ?>" data-table="mas_modepayment" data-field="x_BankingDatails" name="x_BankingDatails" id="x_BankingDatails" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BankingDatails->getPlaceHolder()) ?>" value="<?= $Page->BankingDatails->EditValue ?>"<?= $Page->BankingDatails->editAttributes() ?> aria-describedby="x_BankingDatails_help">
<?= $Page->BankingDatails->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BankingDatails->getErrorMessage() ?></div>
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
    ew.addEventHandlers("mas_modepayment");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

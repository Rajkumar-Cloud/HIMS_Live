<?php

namespace PHPMaker2021\project3;

// Page object
$DepositPettycashAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fdeposit_pettycashadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fdeposit_pettycashadd = currentForm = new ew.Form("fdeposit_pettycashadd", "add");

    // Add fields
    var fields = ew.vars.tables.deposit_pettycash.fields;
    fdeposit_pettycashadd.addFields([
        ["TransType", [fields.TransType.required ? ew.Validators.required(fields.TransType.caption) : null], fields.TransType.isInvalid],
        ["ShiftNumber", [fields.ShiftNumber.required ? ew.Validators.required(fields.ShiftNumber.caption) : null], fields.ShiftNumber.isInvalid],
        ["TerminalNumber", [fields.TerminalNumber.required ? ew.Validators.required(fields.TerminalNumber.caption) : null], fields.TerminalNumber.isInvalid],
        ["User", [fields.User.required ? ew.Validators.required(fields.User.caption) : null], fields.User.isInvalid],
        ["OpenedDateTime", [fields.OpenedDateTime.required ? ew.Validators.required(fields.OpenedDateTime.caption) : null, ew.Validators.datetime(0)], fields.OpenedDateTime.isInvalid],
        ["AccoundHead", [fields.AccoundHead.required ? ew.Validators.required(fields.AccoundHead.caption) : null], fields.AccoundHead.isInvalid],
        ["Amount", [fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["Narration", [fields.Narration.required ? ew.Validators.required(fields.Narration.caption) : null], fields.Narration.isInvalid],
        ["CreatedBy", [fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null, ew.Validators.datetime(0)], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null, ew.Validators.datetime(0)], fields.ModifiedDateTime.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fdeposit_pettycashadd,
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
    fdeposit_pettycashadd.validate = function () {
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
    fdeposit_pettycashadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fdeposit_pettycashadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fdeposit_pettycashadd");
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
<form name="fdeposit_pettycashadd" id="fdeposit_pettycashadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->TransType->Visible) { // TransType ?>
    <div id="r_TransType" class="form-group row">
        <label id="elh_deposit_pettycash_TransType" for="x_TransType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TransType->caption() ?><?= $Page->TransType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransType->cellAttributes() ?>>
<span id="el_deposit_pettycash_TransType">
<input type="<?= $Page->TransType->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_TransType" name="x_TransType" id="x_TransType" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TransType->getPlaceHolder()) ?>" value="<?= $Page->TransType->EditValue ?>"<?= $Page->TransType->editAttributes() ?> aria-describedby="x_TransType_help">
<?= $Page->TransType->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransType->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ShiftNumber->Visible) { // ShiftNumber ?>
    <div id="r_ShiftNumber" class="form-group row">
        <label id="elh_deposit_pettycash_ShiftNumber" for="x_ShiftNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ShiftNumber->caption() ?><?= $Page->ShiftNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ShiftNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_ShiftNumber">
<input type="<?= $Page->ShiftNumber->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_ShiftNumber" name="x_ShiftNumber" id="x_ShiftNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ShiftNumber->getPlaceHolder()) ?>" value="<?= $Page->ShiftNumber->EditValue ?>"<?= $Page->ShiftNumber->editAttributes() ?> aria-describedby="x_ShiftNumber_help">
<?= $Page->ShiftNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ShiftNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TerminalNumber->Visible) { // TerminalNumber ?>
    <div id="r_TerminalNumber" class="form-group row">
        <label id="elh_deposit_pettycash_TerminalNumber" for="x_TerminalNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TerminalNumber->caption() ?><?= $Page->TerminalNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TerminalNumber->cellAttributes() ?>>
<span id="el_deposit_pettycash_TerminalNumber">
<input type="<?= $Page->TerminalNumber->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_TerminalNumber" name="x_TerminalNumber" id="x_TerminalNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TerminalNumber->getPlaceHolder()) ?>" value="<?= $Page->TerminalNumber->EditValue ?>"<?= $Page->TerminalNumber->editAttributes() ?> aria-describedby="x_TerminalNumber_help">
<?= $Page->TerminalNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TerminalNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->User->Visible) { // User ?>
    <div id="r_User" class="form-group row">
        <label id="elh_deposit_pettycash_User" for="x_User" class="<?= $Page->LeftColumnClass ?>"><?= $Page->User->caption() ?><?= $Page->User->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->User->cellAttributes() ?>>
<span id="el_deposit_pettycash_User">
<input type="<?= $Page->User->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_User" name="x_User" id="x_User" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->User->getPlaceHolder()) ?>" value="<?= $Page->User->EditValue ?>"<?= $Page->User->editAttributes() ?> aria-describedby="x_User_help">
<?= $Page->User->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->User->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OpenedDateTime->Visible) { // OpenedDateTime ?>
    <div id="r_OpenedDateTime" class="form-group row">
        <label id="elh_deposit_pettycash_OpenedDateTime" for="x_OpenedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OpenedDateTime->caption() ?><?= $Page->OpenedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OpenedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_OpenedDateTime">
<input type="<?= $Page->OpenedDateTime->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_OpenedDateTime" name="x_OpenedDateTime" id="x_OpenedDateTime" placeholder="<?= HtmlEncode($Page->OpenedDateTime->getPlaceHolder()) ?>" value="<?= $Page->OpenedDateTime->EditValue ?>"<?= $Page->OpenedDateTime->editAttributes() ?> aria-describedby="x_OpenedDateTime_help">
<?= $Page->OpenedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OpenedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->OpenedDateTime->ReadOnly && !$Page->OpenedDateTime->Disabled && !isset($Page->OpenedDateTime->EditAttrs["readonly"]) && !isset($Page->OpenedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdeposit_pettycashadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fdeposit_pettycashadd", "x_OpenedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AccoundHead->Visible) { // AccoundHead ?>
    <div id="r_AccoundHead" class="form-group row">
        <label id="elh_deposit_pettycash_AccoundHead" for="x_AccoundHead" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AccoundHead->caption() ?><?= $Page->AccoundHead->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AccoundHead->cellAttributes() ?>>
<span id="el_deposit_pettycash_AccoundHead">
<input type="<?= $Page->AccoundHead->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_AccoundHead" name="x_AccoundHead" id="x_AccoundHead" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AccoundHead->getPlaceHolder()) ?>" value="<?= $Page->AccoundHead->EditValue ?>"<?= $Page->AccoundHead->editAttributes() ?> aria-describedby="x_AccoundHead_help">
<?= $Page->AccoundHead->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AccoundHead->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Amount->Visible) { // Amount ?>
    <div id="r_Amount" class="form-group row">
        <label id="elh_deposit_pettycash_Amount" for="x_Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Amount->caption() ?><?= $Page->Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Amount->cellAttributes() ?>>
<span id="el_deposit_pettycash_Amount">
<input type="<?= $Page->Amount->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_Amount" name="x_Amount" id="x_Amount" size="30" placeholder="<?= HtmlEncode($Page->Amount->getPlaceHolder()) ?>" value="<?= $Page->Amount->EditValue ?>"<?= $Page->Amount->editAttributes() ?> aria-describedby="x_Amount_help">
<?= $Page->Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Narration->Visible) { // Narration ?>
    <div id="r_Narration" class="form-group row">
        <label id="elh_deposit_pettycash_Narration" for="x_Narration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Narration->caption() ?><?= $Page->Narration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Narration->cellAttributes() ?>>
<span id="el_deposit_pettycash_Narration">
<textarea data-table="deposit_pettycash" data-field="x_Narration" name="x_Narration" id="x_Narration" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Narration->getPlaceHolder()) ?>"<?= $Page->Narration->editAttributes() ?> aria-describedby="x_Narration_help"><?= $Page->Narration->EditValue ?></textarea>
<?= $Page->Narration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Narration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label id="elh_deposit_pettycash_CreatedBy" for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedBy->caption() ?><?= $Page->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_deposit_pettycash_CreatedBy">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?> aria-describedby="x_CreatedBy_help">
<?= $Page->CreatedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <div id="r_CreatedDateTime" class="form-group row">
        <label id="elh_deposit_pettycash_CreatedDateTime" for="x_CreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedDateTime->caption() ?><?= $Page->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_CreatedDateTime">
<input type="<?= $Page->CreatedDateTime->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?= HtmlEncode($Page->CreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreatedDateTime->EditValue ?>"<?= $Page->CreatedDateTime->editAttributes() ?> aria-describedby="x_CreatedDateTime_help">
<?= $Page->CreatedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CreatedDateTime->ReadOnly && !$Page->CreatedDateTime->Disabled && !isset($Page->CreatedDateTime->EditAttrs["readonly"]) && !isset($Page->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdeposit_pettycashadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fdeposit_pettycashadd", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label id="elh_deposit_pettycash_ModifiedBy" for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedBy->caption() ?><?= $Page->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_deposit_pettycash_ModifiedBy">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?> aria-describedby="x_ModifiedBy_help">
<?= $Page->ModifiedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label id="elh_deposit_pettycash_ModifiedDateTime" for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedDateTime->caption() ?><?= $Page->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_deposit_pettycash_ModifiedDateTime">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?> aria-describedby="x_ModifiedDateTime_help">
<?= $Page->ModifiedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ModifiedDateTime->ReadOnly && !$Page->ModifiedDateTime->Disabled && !isset($Page->ModifiedDateTime->EditAttrs["readonly"]) && !isset($Page->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdeposit_pettycashadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fdeposit_pettycashadd", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
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
    ew.addEventHandlers("deposit_pettycash");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

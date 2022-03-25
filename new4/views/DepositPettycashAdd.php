<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "deposit_pettycash")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.deposit_pettycash)
        ew.vars.tables.deposit_pettycash = currentTable;
    fdeposit_pettycashadd.addFields([
        ["TransType", [fields.TransType.visible && fields.TransType.required ? ew.Validators.required(fields.TransType.caption) : null], fields.TransType.isInvalid],
        ["ShiftNumber", [fields.ShiftNumber.visible && fields.ShiftNumber.required ? ew.Validators.required(fields.ShiftNumber.caption) : null], fields.ShiftNumber.isInvalid],
        ["TerminalNumber", [fields.TerminalNumber.visible && fields.TerminalNumber.required ? ew.Validators.required(fields.TerminalNumber.caption) : null], fields.TerminalNumber.isInvalid],
        ["User", [fields.User.visible && fields.User.required ? ew.Validators.required(fields.User.caption) : null], fields.User.isInvalid],
        ["OpenedDateTime", [fields.OpenedDateTime.visible && fields.OpenedDateTime.required ? ew.Validators.required(fields.OpenedDateTime.caption) : null, ew.Validators.datetime(7)], fields.OpenedDateTime.isInvalid],
        ["AccoundHead", [fields.AccoundHead.visible && fields.AccoundHead.required ? ew.Validators.required(fields.AccoundHead.caption) : null], fields.AccoundHead.isInvalid],
        ["Amount", [fields.Amount.visible && fields.Amount.required ? ew.Validators.required(fields.Amount.caption) : null, ew.Validators.float], fields.Amount.isInvalid],
        ["Narration", [fields.Narration.visible && fields.Narration.required ? ew.Validators.required(fields.Narration.caption) : null], fields.Narration.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.visible && fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null], fields.CreatedDateTime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
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
    fdeposit_pettycashadd.lists.TransType = <?= $Page->TransType->toClientList($Page) ?>;
    fdeposit_pettycashadd.lists.TerminalNumber = <?= $Page->TerminalNumber->toClientList($Page) ?>;
    fdeposit_pettycashadd.lists.AccoundHead = <?= $Page->AccoundHead->toClientList($Page) ?>;
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
<form name="fdeposit_pettycashadd" id="fdeposit_pettycashadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="deposit_pettycash">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->TransType->Visible) { // TransType ?>
    <div id="r_TransType" class="form-group row">
        <label id="elh_deposit_pettycash_TransType" for="x_TransType" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TransType->caption() ?><?= $Page->TransType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransType->cellAttributes() ?>>
<span id="el_deposit_pettycash_TransType">
    <select
        id="x_TransType"
        name="x_TransType"
        class="form-control ew-select<?= $Page->TransType->isInvalidClass() ?>"
        data-select2-id="deposit_pettycash_x_TransType"
        data-table="deposit_pettycash"
        data-field="x_TransType"
        data-value-separator="<?= $Page->TransType->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TransType->getPlaceHolder()) ?>"
        <?= $Page->TransType->editAttributes() ?>>
        <?= $Page->TransType->selectOptionListHtml("x_TransType") ?>
    </select>
    <?= $Page->TransType->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TransType->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='deposit_pettycash_x_TransType']"),
        options = { name: "x_TransType", selectId: "deposit_pettycash_x_TransType", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.deposit_pettycash.fields.TransType.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.deposit_pettycash.fields.TransType.selectOptions);
    ew.createSelect(options);
});
</script>
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
    <select
        id="x_TerminalNumber"
        name="x_TerminalNumber"
        class="form-control ew-select<?= $Page->TerminalNumber->isInvalidClass() ?>"
        data-select2-id="deposit_pettycash_x_TerminalNumber"
        data-table="deposit_pettycash"
        data-field="x_TerminalNumber"
        data-value-separator="<?= $Page->TerminalNumber->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TerminalNumber->getPlaceHolder()) ?>"
        <?= $Page->TerminalNumber->editAttributes() ?>>
        <?= $Page->TerminalNumber->selectOptionListHtml("x_TerminalNumber") ?>
    </select>
    <?= $Page->TerminalNumber->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->TerminalNumber->getErrorMessage() ?></div>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='deposit_pettycash_x_TerminalNumber']"),
        options = { name: "x_TerminalNumber", selectId: "deposit_pettycash_x_TerminalNumber", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.data = ew.vars.tables.deposit_pettycash.fields.TerminalNumber.lookupOptions;
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.deposit_pettycash.fields.TerminalNumber.selectOptions);
    ew.createSelect(options);
});
</script>
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
<input type="<?= $Page->OpenedDateTime->getInputTextType() ?>" data-table="deposit_pettycash" data-field="x_OpenedDateTime" data-format="7" name="x_OpenedDateTime" id="x_OpenedDateTime" placeholder="<?= HtmlEncode($Page->OpenedDateTime->getPlaceHolder()) ?>" value="<?= $Page->OpenedDateTime->EditValue ?>"<?= $Page->OpenedDateTime->editAttributes() ?> aria-describedby="x_OpenedDateTime_help">
<?= $Page->OpenedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OpenedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->OpenedDateTime->ReadOnly && !$Page->OpenedDateTime->Disabled && !isset($Page->OpenedDateTime->EditAttrs["readonly"]) && !isset($Page->OpenedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdeposit_pettycashadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fdeposit_pettycashadd", "x_OpenedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":7});
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
<div class="input-group flex-nowrap">
    <select
        id="x_AccoundHead"
        name="x_AccoundHead"
        class="form-control ew-select<?= $Page->AccoundHead->isInvalidClass() ?>"
        data-select2-id="deposit_pettycash_x_AccoundHead"
        data-table="deposit_pettycash"
        data-field="x_AccoundHead"
        data-value-separator="<?= $Page->AccoundHead->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->AccoundHead->getPlaceHolder()) ?>"
        <?= $Page->AccoundHead->editAttributes() ?>>
        <?= $Page->AccoundHead->selectOptionListHtml("x_AccoundHead") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "deposit_account_head") && !$Page->AccoundHead->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_AccoundHead" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->AccoundHead->caption() ?>" data-title="<?= $Page->AccoundHead->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_AccoundHead',url:'<?= GetUrl("DepositAccountHeadAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->AccoundHead->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AccoundHead->getErrorMessage() ?></div>
<?= $Page->AccoundHead->Lookup->getParamTag($Page, "p_x_AccoundHead") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='deposit_pettycash_x_AccoundHead']"),
        options = { name: "x_AccoundHead", selectId: "deposit_pettycash_x_AccoundHead", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.deposit_pettycash.fields.AccoundHead.selectOptions);
    ew.createSelect(options);
});
</script>
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
    ew.addEventHandlers("deposit_pettycash");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

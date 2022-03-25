<?php

namespace PHPMaker2021\project3;

// Page object
$DepositdetailsEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fdepositdetailsedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fdepositdetailsedit = currentForm = new ew.Form("fdepositdetailsedit", "edit");

    // Add fields
    var fields = ew.vars.tables.depositdetails.fields;
    fdepositdetailsedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["DepositDate", [fields.DepositDate.required ? ew.Validators.required(fields.DepositDate.caption) : null, ew.Validators.datetime(0)], fields.DepositDate.isInvalid],
        ["DepositToBankSelect", [fields.DepositToBankSelect.required ? ew.Validators.required(fields.DepositToBankSelect.caption) : null], fields.DepositToBankSelect.isInvalid],
        ["DepositToBank", [fields.DepositToBank.required ? ew.Validators.required(fields.DepositToBank.caption) : null], fields.DepositToBank.isInvalid],
        ["TransferToSelect", [fields.TransferToSelect.required ? ew.Validators.required(fields.TransferToSelect.caption) : null], fields.TransferToSelect.isInvalid],
        ["TransferTo", [fields.TransferTo.required ? ew.Validators.required(fields.TransferTo.caption) : null], fields.TransferTo.isInvalid],
        ["OpeningBalance", [fields.OpeningBalance.required ? ew.Validators.required(fields.OpeningBalance.caption) : null, ew.Validators.float], fields.OpeningBalance.isInvalid],
        ["A2000Count", [fields.A2000Count.required ? ew.Validators.required(fields.A2000Count.caption) : null, ew.Validators.integer], fields.A2000Count.isInvalid],
        ["A2000Amount", [fields.A2000Amount.required ? ew.Validators.required(fields.A2000Amount.caption) : null, ew.Validators.float], fields.A2000Amount.isInvalid],
        ["A1000Count", [fields.A1000Count.required ? ew.Validators.required(fields.A1000Count.caption) : null, ew.Validators.integer], fields.A1000Count.isInvalid],
        ["A1000Amount", [fields.A1000Amount.required ? ew.Validators.required(fields.A1000Amount.caption) : null, ew.Validators.float], fields.A1000Amount.isInvalid],
        ["A500Count", [fields.A500Count.required ? ew.Validators.required(fields.A500Count.caption) : null, ew.Validators.integer], fields.A500Count.isInvalid],
        ["A500Amount", [fields.A500Amount.required ? ew.Validators.required(fields.A500Amount.caption) : null, ew.Validators.float], fields.A500Amount.isInvalid],
        ["A200Count", [fields.A200Count.required ? ew.Validators.required(fields.A200Count.caption) : null, ew.Validators.integer], fields.A200Count.isInvalid],
        ["A200Amount", [fields.A200Amount.required ? ew.Validators.required(fields.A200Amount.caption) : null, ew.Validators.float], fields.A200Amount.isInvalid],
        ["A100Count", [fields.A100Count.required ? ew.Validators.required(fields.A100Count.caption) : null, ew.Validators.integer], fields.A100Count.isInvalid],
        ["A100Amount", [fields.A100Amount.required ? ew.Validators.required(fields.A100Amount.caption) : null, ew.Validators.float], fields.A100Amount.isInvalid],
        ["A50Count", [fields.A50Count.required ? ew.Validators.required(fields.A50Count.caption) : null, ew.Validators.integer], fields.A50Count.isInvalid],
        ["A50Amount", [fields.A50Amount.required ? ew.Validators.required(fields.A50Amount.caption) : null, ew.Validators.float], fields.A50Amount.isInvalid],
        ["A20Count", [fields.A20Count.required ? ew.Validators.required(fields.A20Count.caption) : null, ew.Validators.integer], fields.A20Count.isInvalid],
        ["A20Amount", [fields.A20Amount.required ? ew.Validators.required(fields.A20Amount.caption) : null, ew.Validators.float], fields.A20Amount.isInvalid],
        ["A10Count", [fields.A10Count.required ? ew.Validators.required(fields.A10Count.caption) : null, ew.Validators.integer], fields.A10Count.isInvalid],
        ["A10Amount", [fields.A10Amount.required ? ew.Validators.required(fields.A10Amount.caption) : null, ew.Validators.float], fields.A10Amount.isInvalid],
        ["Other", [fields.Other.required ? ew.Validators.required(fields.Other.caption) : null, ew.Validators.float], fields.Other.isInvalid],
        ["TotalCash", [fields.TotalCash.required ? ew.Validators.required(fields.TotalCash.caption) : null, ew.Validators.float], fields.TotalCash.isInvalid],
        ["Cheque", [fields.Cheque.required ? ew.Validators.required(fields.Cheque.caption) : null, ew.Validators.float], fields.Cheque.isInvalid],
        ["Card", [fields.Card.required ? ew.Validators.required(fields.Card.caption) : null, ew.Validators.float], fields.Card.isInvalid],
        ["NEFTRTGS", [fields.NEFTRTGS.required ? ew.Validators.required(fields.NEFTRTGS.caption) : null, ew.Validators.float], fields.NEFTRTGS.isInvalid],
        ["TotalTransferDepositAmount", [fields.TotalTransferDepositAmount.required ? ew.Validators.required(fields.TotalTransferDepositAmount.caption) : null, ew.Validators.float], fields.TotalTransferDepositAmount.isInvalid],
        ["CreatedBy", [fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null, ew.Validators.integer], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null, ew.Validators.datetime(0)], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null, ew.Validators.integer], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null, ew.Validators.datetime(0)], fields.ModifiedDateTime.isInvalid],
        ["CreatedUserName", [fields.CreatedUserName.required ? ew.Validators.required(fields.CreatedUserName.caption) : null], fields.CreatedUserName.isInvalid],
        ["ModifiedUserName", [fields.ModifiedUserName.required ? ew.Validators.required(fields.ModifiedUserName.caption) : null], fields.ModifiedUserName.isInvalid],
        ["BalanceAmount", [fields.BalanceAmount.required ? ew.Validators.required(fields.BalanceAmount.caption) : null, ew.Validators.float], fields.BalanceAmount.isInvalid],
        ["CashCollected", [fields.CashCollected.required ? ew.Validators.required(fields.CashCollected.caption) : null, ew.Validators.float], fields.CashCollected.isInvalid],
        ["RTGS", [fields.RTGS.required ? ew.Validators.required(fields.RTGS.caption) : null, ew.Validators.float], fields.RTGS.isInvalid],
        ["PAYTM", [fields.PAYTM.required ? ew.Validators.required(fields.PAYTM.caption) : null, ew.Validators.float], fields.PAYTM.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fdepositdetailsedit,
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
    fdepositdetailsedit.validate = function () {
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
    fdepositdetailsedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fdepositdetailsedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fdepositdetailsedit");
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
<form name="fdepositdetailsedit" id="fdepositdetailsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_depositdetails_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_depositdetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="depositdetails" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
    <div id="r_DepositDate" class="form-group row">
        <label id="elh_depositdetails_DepositDate" for="x_DepositDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DepositDate->caption() ?><?= $Page->DepositDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DepositDate->cellAttributes() ?>>
<span id="el_depositdetails_DepositDate">
<input type="<?= $Page->DepositDate->getInputTextType() ?>" data-table="depositdetails" data-field="x_DepositDate" name="x_DepositDate" id="x_DepositDate" placeholder="<?= HtmlEncode($Page->DepositDate->getPlaceHolder()) ?>" value="<?= $Page->DepositDate->EditValue ?>"<?= $Page->DepositDate->editAttributes() ?> aria-describedby="x_DepositDate_help">
<?= $Page->DepositDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DepositDate->getErrorMessage() ?></div>
<?php if (!$Page->DepositDate->ReadOnly && !$Page->DepositDate->Disabled && !isset($Page->DepositDate->EditAttrs["readonly"]) && !isset($Page->DepositDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdepositdetailsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fdepositdetailsedit", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
    <div id="r_DepositToBankSelect" class="form-group row">
        <label id="elh_depositdetails_DepositToBankSelect" for="x_DepositToBankSelect" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DepositToBankSelect->caption() ?><?= $Page->DepositToBankSelect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DepositToBankSelect->cellAttributes() ?>>
<span id="el_depositdetails_DepositToBankSelect">
<input type="<?= $Page->DepositToBankSelect->getInputTextType() ?>" data-table="depositdetails" data-field="x_DepositToBankSelect" name="x_DepositToBankSelect" id="x_DepositToBankSelect" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DepositToBankSelect->getPlaceHolder()) ?>" value="<?= $Page->DepositToBankSelect->EditValue ?>"<?= $Page->DepositToBankSelect->editAttributes() ?> aria-describedby="x_DepositToBankSelect_help">
<?= $Page->DepositToBankSelect->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DepositToBankSelect->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DepositToBank->Visible) { // DepositToBank ?>
    <div id="r_DepositToBank" class="form-group row">
        <label id="elh_depositdetails_DepositToBank" for="x_DepositToBank" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DepositToBank->caption() ?><?= $Page->DepositToBank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DepositToBank->cellAttributes() ?>>
<span id="el_depositdetails_DepositToBank">
<input type="<?= $Page->DepositToBank->getInputTextType() ?>" data-table="depositdetails" data-field="x_DepositToBank" name="x_DepositToBank" id="x_DepositToBank" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DepositToBank->getPlaceHolder()) ?>" value="<?= $Page->DepositToBank->EditValue ?>"<?= $Page->DepositToBank->editAttributes() ?> aria-describedby="x_DepositToBank_help">
<?= $Page->DepositToBank->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DepositToBank->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransferToSelect->Visible) { // TransferToSelect ?>
    <div id="r_TransferToSelect" class="form-group row">
        <label id="elh_depositdetails_TransferToSelect" for="x_TransferToSelect" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TransferToSelect->caption() ?><?= $Page->TransferToSelect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransferToSelect->cellAttributes() ?>>
<span id="el_depositdetails_TransferToSelect">
<input type="<?= $Page->TransferToSelect->getInputTextType() ?>" data-table="depositdetails" data-field="x_TransferToSelect" name="x_TransferToSelect" id="x_TransferToSelect" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TransferToSelect->getPlaceHolder()) ?>" value="<?= $Page->TransferToSelect->EditValue ?>"<?= $Page->TransferToSelect->editAttributes() ?> aria-describedby="x_TransferToSelect_help">
<?= $Page->TransferToSelect->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransferToSelect->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
    <div id="r_TransferTo" class="form-group row">
        <label id="elh_depositdetails_TransferTo" for="x_TransferTo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TransferTo->caption() ?><?= $Page->TransferTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransferTo->cellAttributes() ?>>
<span id="el_depositdetails_TransferTo">
<input type="<?= $Page->TransferTo->getInputTextType() ?>" data-table="depositdetails" data-field="x_TransferTo" name="x_TransferTo" id="x_TransferTo" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TransferTo->getPlaceHolder()) ?>" value="<?= $Page->TransferTo->EditValue ?>"<?= $Page->TransferTo->editAttributes() ?> aria-describedby="x_TransferTo_help">
<?= $Page->TransferTo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransferTo->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
    <div id="r_OpeningBalance" class="form-group row">
        <label id="elh_depositdetails_OpeningBalance" for="x_OpeningBalance" class="<?= $Page->LeftColumnClass ?>"><?= $Page->OpeningBalance->caption() ?><?= $Page->OpeningBalance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OpeningBalance->cellAttributes() ?>>
<span id="el_depositdetails_OpeningBalance">
<input type="<?= $Page->OpeningBalance->getInputTextType() ?>" data-table="depositdetails" data-field="x_OpeningBalance" name="x_OpeningBalance" id="x_OpeningBalance" size="30" placeholder="<?= HtmlEncode($Page->OpeningBalance->getPlaceHolder()) ?>" value="<?= $Page->OpeningBalance->EditValue ?>"<?= $Page->OpeningBalance->editAttributes() ?> aria-describedby="x_OpeningBalance_help">
<?= $Page->OpeningBalance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OpeningBalance->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A2000Count->Visible) { // A2000Count ?>
    <div id="r_A2000Count" class="form-group row">
        <label id="elh_depositdetails_A2000Count" for="x_A2000Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A2000Count->caption() ?><?= $Page->A2000Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A2000Count->cellAttributes() ?>>
<span id="el_depositdetails_A2000Count">
<input type="<?= $Page->A2000Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A2000Count" name="x_A2000Count" id="x_A2000Count" size="30" placeholder="<?= HtmlEncode($Page->A2000Count->getPlaceHolder()) ?>" value="<?= $Page->A2000Count->EditValue ?>"<?= $Page->A2000Count->editAttributes() ?> aria-describedby="x_A2000Count_help">
<?= $Page->A2000Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A2000Count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A2000Amount->Visible) { // A2000Amount ?>
    <div id="r_A2000Amount" class="form-group row">
        <label id="elh_depositdetails_A2000Amount" for="x_A2000Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A2000Amount->caption() ?><?= $Page->A2000Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A2000Amount->cellAttributes() ?>>
<span id="el_depositdetails_A2000Amount">
<input type="<?= $Page->A2000Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A2000Amount" name="x_A2000Amount" id="x_A2000Amount" size="30" placeholder="<?= HtmlEncode($Page->A2000Amount->getPlaceHolder()) ?>" value="<?= $Page->A2000Amount->EditValue ?>"<?= $Page->A2000Amount->editAttributes() ?> aria-describedby="x_A2000Amount_help">
<?= $Page->A2000Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A2000Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A1000Count->Visible) { // A1000Count ?>
    <div id="r_A1000Count" class="form-group row">
        <label id="elh_depositdetails_A1000Count" for="x_A1000Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A1000Count->caption() ?><?= $Page->A1000Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A1000Count->cellAttributes() ?>>
<span id="el_depositdetails_A1000Count">
<input type="<?= $Page->A1000Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A1000Count" name="x_A1000Count" id="x_A1000Count" size="30" placeholder="<?= HtmlEncode($Page->A1000Count->getPlaceHolder()) ?>" value="<?= $Page->A1000Count->EditValue ?>"<?= $Page->A1000Count->editAttributes() ?> aria-describedby="x_A1000Count_help">
<?= $Page->A1000Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A1000Count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A1000Amount->Visible) { // A1000Amount ?>
    <div id="r_A1000Amount" class="form-group row">
        <label id="elh_depositdetails_A1000Amount" for="x_A1000Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A1000Amount->caption() ?><?= $Page->A1000Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A1000Amount->cellAttributes() ?>>
<span id="el_depositdetails_A1000Amount">
<input type="<?= $Page->A1000Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A1000Amount" name="x_A1000Amount" id="x_A1000Amount" size="30" placeholder="<?= HtmlEncode($Page->A1000Amount->getPlaceHolder()) ?>" value="<?= $Page->A1000Amount->EditValue ?>"<?= $Page->A1000Amount->editAttributes() ?> aria-describedby="x_A1000Amount_help">
<?= $Page->A1000Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A1000Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A500Count->Visible) { // A500Count ?>
    <div id="r_A500Count" class="form-group row">
        <label id="elh_depositdetails_A500Count" for="x_A500Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A500Count->caption() ?><?= $Page->A500Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A500Count->cellAttributes() ?>>
<span id="el_depositdetails_A500Count">
<input type="<?= $Page->A500Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A500Count" name="x_A500Count" id="x_A500Count" size="30" placeholder="<?= HtmlEncode($Page->A500Count->getPlaceHolder()) ?>" value="<?= $Page->A500Count->EditValue ?>"<?= $Page->A500Count->editAttributes() ?> aria-describedby="x_A500Count_help">
<?= $Page->A500Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A500Count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A500Amount->Visible) { // A500Amount ?>
    <div id="r_A500Amount" class="form-group row">
        <label id="elh_depositdetails_A500Amount" for="x_A500Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A500Amount->caption() ?><?= $Page->A500Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A500Amount->cellAttributes() ?>>
<span id="el_depositdetails_A500Amount">
<input type="<?= $Page->A500Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A500Amount" name="x_A500Amount" id="x_A500Amount" size="30" placeholder="<?= HtmlEncode($Page->A500Amount->getPlaceHolder()) ?>" value="<?= $Page->A500Amount->EditValue ?>"<?= $Page->A500Amount->editAttributes() ?> aria-describedby="x_A500Amount_help">
<?= $Page->A500Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A500Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A200Count->Visible) { // A200Count ?>
    <div id="r_A200Count" class="form-group row">
        <label id="elh_depositdetails_A200Count" for="x_A200Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A200Count->caption() ?><?= $Page->A200Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A200Count->cellAttributes() ?>>
<span id="el_depositdetails_A200Count">
<input type="<?= $Page->A200Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A200Count" name="x_A200Count" id="x_A200Count" size="30" placeholder="<?= HtmlEncode($Page->A200Count->getPlaceHolder()) ?>" value="<?= $Page->A200Count->EditValue ?>"<?= $Page->A200Count->editAttributes() ?> aria-describedby="x_A200Count_help">
<?= $Page->A200Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A200Count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A200Amount->Visible) { // A200Amount ?>
    <div id="r_A200Amount" class="form-group row">
        <label id="elh_depositdetails_A200Amount" for="x_A200Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A200Amount->caption() ?><?= $Page->A200Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A200Amount->cellAttributes() ?>>
<span id="el_depositdetails_A200Amount">
<input type="<?= $Page->A200Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A200Amount" name="x_A200Amount" id="x_A200Amount" size="30" placeholder="<?= HtmlEncode($Page->A200Amount->getPlaceHolder()) ?>" value="<?= $Page->A200Amount->EditValue ?>"<?= $Page->A200Amount->editAttributes() ?> aria-describedby="x_A200Amount_help">
<?= $Page->A200Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A200Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A100Count->Visible) { // A100Count ?>
    <div id="r_A100Count" class="form-group row">
        <label id="elh_depositdetails_A100Count" for="x_A100Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A100Count->caption() ?><?= $Page->A100Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A100Count->cellAttributes() ?>>
<span id="el_depositdetails_A100Count">
<input type="<?= $Page->A100Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A100Count" name="x_A100Count" id="x_A100Count" size="30" placeholder="<?= HtmlEncode($Page->A100Count->getPlaceHolder()) ?>" value="<?= $Page->A100Count->EditValue ?>"<?= $Page->A100Count->editAttributes() ?> aria-describedby="x_A100Count_help">
<?= $Page->A100Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A100Count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A100Amount->Visible) { // A100Amount ?>
    <div id="r_A100Amount" class="form-group row">
        <label id="elh_depositdetails_A100Amount" for="x_A100Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A100Amount->caption() ?><?= $Page->A100Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A100Amount->cellAttributes() ?>>
<span id="el_depositdetails_A100Amount">
<input type="<?= $Page->A100Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A100Amount" name="x_A100Amount" id="x_A100Amount" size="30" placeholder="<?= HtmlEncode($Page->A100Amount->getPlaceHolder()) ?>" value="<?= $Page->A100Amount->EditValue ?>"<?= $Page->A100Amount->editAttributes() ?> aria-describedby="x_A100Amount_help">
<?= $Page->A100Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A100Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A50Count->Visible) { // A50Count ?>
    <div id="r_A50Count" class="form-group row">
        <label id="elh_depositdetails_A50Count" for="x_A50Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A50Count->caption() ?><?= $Page->A50Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A50Count->cellAttributes() ?>>
<span id="el_depositdetails_A50Count">
<input type="<?= $Page->A50Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A50Count" name="x_A50Count" id="x_A50Count" size="30" placeholder="<?= HtmlEncode($Page->A50Count->getPlaceHolder()) ?>" value="<?= $Page->A50Count->EditValue ?>"<?= $Page->A50Count->editAttributes() ?> aria-describedby="x_A50Count_help">
<?= $Page->A50Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A50Count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A50Amount->Visible) { // A50Amount ?>
    <div id="r_A50Amount" class="form-group row">
        <label id="elh_depositdetails_A50Amount" for="x_A50Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A50Amount->caption() ?><?= $Page->A50Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A50Amount->cellAttributes() ?>>
<span id="el_depositdetails_A50Amount">
<input type="<?= $Page->A50Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A50Amount" name="x_A50Amount" id="x_A50Amount" size="30" placeholder="<?= HtmlEncode($Page->A50Amount->getPlaceHolder()) ?>" value="<?= $Page->A50Amount->EditValue ?>"<?= $Page->A50Amount->editAttributes() ?> aria-describedby="x_A50Amount_help">
<?= $Page->A50Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A50Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A20Count->Visible) { // A20Count ?>
    <div id="r_A20Count" class="form-group row">
        <label id="elh_depositdetails_A20Count" for="x_A20Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A20Count->caption() ?><?= $Page->A20Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A20Count->cellAttributes() ?>>
<span id="el_depositdetails_A20Count">
<input type="<?= $Page->A20Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A20Count" name="x_A20Count" id="x_A20Count" size="30" placeholder="<?= HtmlEncode($Page->A20Count->getPlaceHolder()) ?>" value="<?= $Page->A20Count->EditValue ?>"<?= $Page->A20Count->editAttributes() ?> aria-describedby="x_A20Count_help">
<?= $Page->A20Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A20Count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A20Amount->Visible) { // A20Amount ?>
    <div id="r_A20Amount" class="form-group row">
        <label id="elh_depositdetails_A20Amount" for="x_A20Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A20Amount->caption() ?><?= $Page->A20Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A20Amount->cellAttributes() ?>>
<span id="el_depositdetails_A20Amount">
<input type="<?= $Page->A20Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A20Amount" name="x_A20Amount" id="x_A20Amount" size="30" placeholder="<?= HtmlEncode($Page->A20Amount->getPlaceHolder()) ?>" value="<?= $Page->A20Amount->EditValue ?>"<?= $Page->A20Amount->editAttributes() ?> aria-describedby="x_A20Amount_help">
<?= $Page->A20Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A20Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A10Count->Visible) { // A10Count ?>
    <div id="r_A10Count" class="form-group row">
        <label id="elh_depositdetails_A10Count" for="x_A10Count" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A10Count->caption() ?><?= $Page->A10Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A10Count->cellAttributes() ?>>
<span id="el_depositdetails_A10Count">
<input type="<?= $Page->A10Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A10Count" name="x_A10Count" id="x_A10Count" size="30" placeholder="<?= HtmlEncode($Page->A10Count->getPlaceHolder()) ?>" value="<?= $Page->A10Count->EditValue ?>"<?= $Page->A10Count->editAttributes() ?> aria-describedby="x_A10Count_help">
<?= $Page->A10Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A10Count->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A10Amount->Visible) { // A10Amount ?>
    <div id="r_A10Amount" class="form-group row">
        <label id="elh_depositdetails_A10Amount" for="x_A10Amount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A10Amount->caption() ?><?= $Page->A10Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A10Amount->cellAttributes() ?>>
<span id="el_depositdetails_A10Amount">
<input type="<?= $Page->A10Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A10Amount" name="x_A10Amount" id="x_A10Amount" size="30" placeholder="<?= HtmlEncode($Page->A10Amount->getPlaceHolder()) ?>" value="<?= $Page->A10Amount->EditValue ?>"<?= $Page->A10Amount->editAttributes() ?> aria-describedby="x_A10Amount_help">
<?= $Page->A10Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A10Amount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Other->Visible) { // Other ?>
    <div id="r_Other" class="form-group row">
        <label id="elh_depositdetails_Other" for="x_Other" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Other->caption() ?><?= $Page->Other->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Other->cellAttributes() ?>>
<span id="el_depositdetails_Other">
<input type="<?= $Page->Other->getInputTextType() ?>" data-table="depositdetails" data-field="x_Other" name="x_Other" id="x_Other" size="30" placeholder="<?= HtmlEncode($Page->Other->getPlaceHolder()) ?>" value="<?= $Page->Other->EditValue ?>"<?= $Page->Other->editAttributes() ?> aria-describedby="x_Other_help">
<?= $Page->Other->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Other->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
    <div id="r_TotalCash" class="form-group row">
        <label id="elh_depositdetails_TotalCash" for="x_TotalCash" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalCash->caption() ?><?= $Page->TotalCash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalCash->cellAttributes() ?>>
<span id="el_depositdetails_TotalCash">
<input type="<?= $Page->TotalCash->getInputTextType() ?>" data-table="depositdetails" data-field="x_TotalCash" name="x_TotalCash" id="x_TotalCash" size="30" placeholder="<?= HtmlEncode($Page->TotalCash->getPlaceHolder()) ?>" value="<?= $Page->TotalCash->EditValue ?>"<?= $Page->TotalCash->editAttributes() ?> aria-describedby="x_TotalCash_help">
<?= $Page->TotalCash->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalCash->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
    <div id="r_Cheque" class="form-group row">
        <label id="elh_depositdetails_Cheque" for="x_Cheque" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Cheque->caption() ?><?= $Page->Cheque->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cheque->cellAttributes() ?>>
<span id="el_depositdetails_Cheque">
<input type="<?= $Page->Cheque->getInputTextType() ?>" data-table="depositdetails" data-field="x_Cheque" name="x_Cheque" id="x_Cheque" size="30" placeholder="<?= HtmlEncode($Page->Cheque->getPlaceHolder()) ?>" value="<?= $Page->Cheque->EditValue ?>"<?= $Page->Cheque->editAttributes() ?> aria-describedby="x_Cheque_help">
<?= $Page->Cheque->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cheque->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <div id="r_Card" class="form-group row">
        <label id="elh_depositdetails_Card" for="x_Card" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Card->caption() ?><?= $Page->Card->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Card->cellAttributes() ?>>
<span id="el_depositdetails_Card">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="depositdetails" data-field="x_Card" name="x_Card" id="x_Card" size="30" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?> aria-describedby="x_Card_help">
<?= $Page->Card->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
    <div id="r_NEFTRTGS" class="form-group row">
        <label id="elh_depositdetails_NEFTRTGS" for="x_NEFTRTGS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NEFTRTGS->caption() ?><?= $Page->NEFTRTGS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEFTRTGS->cellAttributes() ?>>
<span id="el_depositdetails_NEFTRTGS">
<input type="<?= $Page->NEFTRTGS->getInputTextType() ?>" data-table="depositdetails" data-field="x_NEFTRTGS" name="x_NEFTRTGS" id="x_NEFTRTGS" size="30" placeholder="<?= HtmlEncode($Page->NEFTRTGS->getPlaceHolder()) ?>" value="<?= $Page->NEFTRTGS->EditValue ?>"<?= $Page->NEFTRTGS->editAttributes() ?> aria-describedby="x_NEFTRTGS_help">
<?= $Page->NEFTRTGS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NEFTRTGS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
    <div id="r_TotalTransferDepositAmount" class="form-group row">
        <label id="elh_depositdetails_TotalTransferDepositAmount" for="x_TotalTransferDepositAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TotalTransferDepositAmount->caption() ?><?= $Page->TotalTransferDepositAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalTransferDepositAmount->cellAttributes() ?>>
<span id="el_depositdetails_TotalTransferDepositAmount">
<input type="<?= $Page->TotalTransferDepositAmount->getInputTextType() ?>" data-table="depositdetails" data-field="x_TotalTransferDepositAmount" name="x_TotalTransferDepositAmount" id="x_TotalTransferDepositAmount" size="30" placeholder="<?= HtmlEncode($Page->TotalTransferDepositAmount->getPlaceHolder()) ?>" value="<?= $Page->TotalTransferDepositAmount->EditValue ?>"<?= $Page->TotalTransferDepositAmount->editAttributes() ?> aria-describedby="x_TotalTransferDepositAmount_help">
<?= $Page->TotalTransferDepositAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalTransferDepositAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedBy->Visible) { // CreatedBy ?>
    <div id="r_CreatedBy" class="form-group row">
        <label id="elh_depositdetails_CreatedBy" for="x_CreatedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedBy->caption() ?><?= $Page->CreatedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedBy->cellAttributes() ?>>
<span id="el_depositdetails_CreatedBy">
<input type="<?= $Page->CreatedBy->getInputTextType() ?>" data-table="depositdetails" data-field="x_CreatedBy" name="x_CreatedBy" id="x_CreatedBy" size="30" placeholder="<?= HtmlEncode($Page->CreatedBy->getPlaceHolder()) ?>" value="<?= $Page->CreatedBy->EditValue ?>"<?= $Page->CreatedBy->editAttributes() ?> aria-describedby="x_CreatedBy_help">
<?= $Page->CreatedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedDateTime->Visible) { // CreatedDateTime ?>
    <div id="r_CreatedDateTime" class="form-group row">
        <label id="elh_depositdetails_CreatedDateTime" for="x_CreatedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedDateTime->caption() ?><?= $Page->CreatedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedDateTime->cellAttributes() ?>>
<span id="el_depositdetails_CreatedDateTime">
<input type="<?= $Page->CreatedDateTime->getInputTextType() ?>" data-table="depositdetails" data-field="x_CreatedDateTime" name="x_CreatedDateTime" id="x_CreatedDateTime" placeholder="<?= HtmlEncode($Page->CreatedDateTime->getPlaceHolder()) ?>" value="<?= $Page->CreatedDateTime->EditValue ?>"<?= $Page->CreatedDateTime->editAttributes() ?> aria-describedby="x_CreatedDateTime_help">
<?= $Page->CreatedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->CreatedDateTime->ReadOnly && !$Page->CreatedDateTime->Disabled && !isset($Page->CreatedDateTime->EditAttrs["readonly"]) && !isset($Page->CreatedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdepositdetailsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fdepositdetailsedit", "x_CreatedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedBy->Visible) { // ModifiedBy ?>
    <div id="r_ModifiedBy" class="form-group row">
        <label id="elh_depositdetails_ModifiedBy" for="x_ModifiedBy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedBy->caption() ?><?= $Page->ModifiedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedBy->cellAttributes() ?>>
<span id="el_depositdetails_ModifiedBy">
<input type="<?= $Page->ModifiedBy->getInputTextType() ?>" data-table="depositdetails" data-field="x_ModifiedBy" name="x_ModifiedBy" id="x_ModifiedBy" size="30" placeholder="<?= HtmlEncode($Page->ModifiedBy->getPlaceHolder()) ?>" value="<?= $Page->ModifiedBy->EditValue ?>"<?= $Page->ModifiedBy->editAttributes() ?> aria-describedby="x_ModifiedBy_help">
<?= $Page->ModifiedBy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedBy->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedDateTime->Visible) { // ModifiedDateTime ?>
    <div id="r_ModifiedDateTime" class="form-group row">
        <label id="elh_depositdetails_ModifiedDateTime" for="x_ModifiedDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedDateTime->caption() ?><?= $Page->ModifiedDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedDateTime->cellAttributes() ?>>
<span id="el_depositdetails_ModifiedDateTime">
<input type="<?= $Page->ModifiedDateTime->getInputTextType() ?>" data-table="depositdetails" data-field="x_ModifiedDateTime" name="x_ModifiedDateTime" id="x_ModifiedDateTime" placeholder="<?= HtmlEncode($Page->ModifiedDateTime->getPlaceHolder()) ?>" value="<?= $Page->ModifiedDateTime->EditValue ?>"<?= $Page->ModifiedDateTime->editAttributes() ?> aria-describedby="x_ModifiedDateTime_help">
<?= $Page->ModifiedDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ModifiedDateTime->ReadOnly && !$Page->ModifiedDateTime->Disabled && !isset($Page->ModifiedDateTime->EditAttrs["readonly"]) && !isset($Page->ModifiedDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdepositdetailsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fdepositdetailsedit", "x_ModifiedDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CreatedUserName->Visible) { // CreatedUserName ?>
    <div id="r_CreatedUserName" class="form-group row">
        <label id="elh_depositdetails_CreatedUserName" for="x_CreatedUserName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CreatedUserName->caption() ?><?= $Page->CreatedUserName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CreatedUserName->cellAttributes() ?>>
<span id="el_depositdetails_CreatedUserName">
<input type="<?= $Page->CreatedUserName->getInputTextType() ?>" data-table="depositdetails" data-field="x_CreatedUserName" name="x_CreatedUserName" id="x_CreatedUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->CreatedUserName->getPlaceHolder()) ?>" value="<?= $Page->CreatedUserName->EditValue ?>"<?= $Page->CreatedUserName->editAttributes() ?> aria-describedby="x_CreatedUserName_help">
<?= $Page->CreatedUserName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CreatedUserName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModifiedUserName->Visible) { // ModifiedUserName ?>
    <div id="r_ModifiedUserName" class="form-group row">
        <label id="elh_depositdetails_ModifiedUserName" for="x_ModifiedUserName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModifiedUserName->caption() ?><?= $Page->ModifiedUserName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModifiedUserName->cellAttributes() ?>>
<span id="el_depositdetails_ModifiedUserName">
<input type="<?= $Page->ModifiedUserName->getInputTextType() ?>" data-table="depositdetails" data-field="x_ModifiedUserName" name="x_ModifiedUserName" id="x_ModifiedUserName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModifiedUserName->getPlaceHolder()) ?>" value="<?= $Page->ModifiedUserName->EditValue ?>"<?= $Page->ModifiedUserName->editAttributes() ?> aria-describedby="x_ModifiedUserName_help">
<?= $Page->ModifiedUserName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModifiedUserName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
    <div id="r_BalanceAmount" class="form-group row">
        <label id="elh_depositdetails_BalanceAmount" for="x_BalanceAmount" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BalanceAmount->caption() ?><?= $Page->BalanceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BalanceAmount->cellAttributes() ?>>
<span id="el_depositdetails_BalanceAmount">
<input type="<?= $Page->BalanceAmount->getInputTextType() ?>" data-table="depositdetails" data-field="x_BalanceAmount" name="x_BalanceAmount" id="x_BalanceAmount" size="30" placeholder="<?= HtmlEncode($Page->BalanceAmount->getPlaceHolder()) ?>" value="<?= $Page->BalanceAmount->EditValue ?>"<?= $Page->BalanceAmount->editAttributes() ?> aria-describedby="x_BalanceAmount_help">
<?= $Page->BalanceAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BalanceAmount->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CashCollected->Visible) { // CashCollected ?>
    <div id="r_CashCollected" class="form-group row">
        <label id="elh_depositdetails_CashCollected" for="x_CashCollected" class="<?= $Page->LeftColumnClass ?>"><?= $Page->CashCollected->caption() ?><?= $Page->CashCollected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CashCollected->cellAttributes() ?>>
<span id="el_depositdetails_CashCollected">
<input type="<?= $Page->CashCollected->getInputTextType() ?>" data-table="depositdetails" data-field="x_CashCollected" name="x_CashCollected" id="x_CashCollected" size="30" placeholder="<?= HtmlEncode($Page->CashCollected->getPlaceHolder()) ?>" value="<?= $Page->CashCollected->EditValue ?>"<?= $Page->CashCollected->editAttributes() ?> aria-describedby="x_CashCollected_help">
<?= $Page->CashCollected->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CashCollected->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
    <div id="r_RTGS" class="form-group row">
        <label id="elh_depositdetails_RTGS" for="x_RTGS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RTGS->caption() ?><?= $Page->RTGS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RTGS->cellAttributes() ?>>
<span id="el_depositdetails_RTGS">
<input type="<?= $Page->RTGS->getInputTextType() ?>" data-table="depositdetails" data-field="x_RTGS" name="x_RTGS" id="x_RTGS" size="30" placeholder="<?= HtmlEncode($Page->RTGS->getPlaceHolder()) ?>" value="<?= $Page->RTGS->EditValue ?>"<?= $Page->RTGS->editAttributes() ?> aria-describedby="x_RTGS_help">
<?= $Page->RTGS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RTGS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
    <div id="r_PAYTM" class="form-group row">
        <label id="elh_depositdetails_PAYTM" for="x_PAYTM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PAYTM->caption() ?><?= $Page->PAYTM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PAYTM->cellAttributes() ?>>
<span id="el_depositdetails_PAYTM">
<input type="<?= $Page->PAYTM->getInputTextType() ?>" data-table="depositdetails" data-field="x_PAYTM" name="x_PAYTM" id="x_PAYTM" size="30" placeholder="<?= HtmlEncode($Page->PAYTM->getPlaceHolder()) ?>" value="<?= $Page->PAYTM->EditValue ?>"<?= $Page->PAYTM->editAttributes() ?> aria-describedby="x_PAYTM_help">
<?= $Page->PAYTM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PAYTM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_depositdetails_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_depositdetails_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="depositdetails" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
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
    ew.addEventHandlers("depositdetails");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

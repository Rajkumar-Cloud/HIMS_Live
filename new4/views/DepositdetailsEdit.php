<?php

namespace PHPMaker2021\HIMS;

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
    var currentTable = <?= JsonEncode(GetClientVar("tables", "depositdetails")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.depositdetails)
        ew.vars.tables.depositdetails = currentTable;
    fdepositdetailsedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["DepositDate", [fields.DepositDate.visible && fields.DepositDate.required ? ew.Validators.required(fields.DepositDate.caption) : null, ew.Validators.datetime(7)], fields.DepositDate.isInvalid],
        ["DepositToBankSelect", [fields.DepositToBankSelect.visible && fields.DepositToBankSelect.required ? ew.Validators.required(fields.DepositToBankSelect.caption) : null], fields.DepositToBankSelect.isInvalid],
        ["DepositToBank", [fields.DepositToBank.visible && fields.DepositToBank.required ? ew.Validators.required(fields.DepositToBank.caption) : null], fields.DepositToBank.isInvalid],
        ["TransferToSelect", [fields.TransferToSelect.visible && fields.TransferToSelect.required ? ew.Validators.required(fields.TransferToSelect.caption) : null], fields.TransferToSelect.isInvalid],
        ["TransferTo", [fields.TransferTo.visible && fields.TransferTo.required ? ew.Validators.required(fields.TransferTo.caption) : null], fields.TransferTo.isInvalid],
        ["OpeningBalance", [fields.OpeningBalance.visible && fields.OpeningBalance.required ? ew.Validators.required(fields.OpeningBalance.caption) : null], fields.OpeningBalance.isInvalid],
        ["Other", [fields.Other.visible && fields.Other.required ? ew.Validators.required(fields.Other.caption) : null], fields.Other.isInvalid],
        ["TotalCash", [fields.TotalCash.visible && fields.TotalCash.required ? ew.Validators.required(fields.TotalCash.caption) : null], fields.TotalCash.isInvalid],
        ["Cheque", [fields.Cheque.visible && fields.Cheque.required ? ew.Validators.required(fields.Cheque.caption) : null], fields.Cheque.isInvalid],
        ["Card", [fields.Card.visible && fields.Card.required ? ew.Validators.required(fields.Card.caption) : null], fields.Card.isInvalid],
        ["NEFTRTGS", [fields.NEFTRTGS.visible && fields.NEFTRTGS.required ? ew.Validators.required(fields.NEFTRTGS.caption) : null], fields.NEFTRTGS.isInvalid],
        ["TotalTransferDepositAmount", [fields.TotalTransferDepositAmount.visible && fields.TotalTransferDepositAmount.required ? ew.Validators.required(fields.TotalTransferDepositAmount.caption) : null], fields.TotalTransferDepositAmount.isInvalid],
        ["CreatedBy", [fields.CreatedBy.visible && fields.CreatedBy.required ? ew.Validators.required(fields.CreatedBy.caption) : null], fields.CreatedBy.isInvalid],
        ["CreatedDateTime", [fields.CreatedDateTime.visible && fields.CreatedDateTime.required ? ew.Validators.required(fields.CreatedDateTime.caption) : null], fields.CreatedDateTime.isInvalid],
        ["ModifiedBy", [fields.ModifiedBy.visible && fields.ModifiedBy.required ? ew.Validators.required(fields.ModifiedBy.caption) : null], fields.ModifiedBy.isInvalid],
        ["ModifiedDateTime", [fields.ModifiedDateTime.visible && fields.ModifiedDateTime.required ? ew.Validators.required(fields.ModifiedDateTime.caption) : null], fields.ModifiedDateTime.isInvalid],
        ["CreatedUserName", [fields.CreatedUserName.visible && fields.CreatedUserName.required ? ew.Validators.required(fields.CreatedUserName.caption) : null], fields.CreatedUserName.isInvalid],
        ["ModifiedUserName", [fields.ModifiedUserName.visible && fields.ModifiedUserName.required ? ew.Validators.required(fields.ModifiedUserName.caption) : null], fields.ModifiedUserName.isInvalid],
        ["A2000Count", [fields.A2000Count.visible && fields.A2000Count.required ? ew.Validators.required(fields.A2000Count.caption) : null, ew.Validators.integer], fields.A2000Count.isInvalid],
        ["A2000Amount", [fields.A2000Amount.visible && fields.A2000Amount.required ? ew.Validators.required(fields.A2000Amount.caption) : null, ew.Validators.float], fields.A2000Amount.isInvalid],
        ["A1000Count", [fields.A1000Count.visible && fields.A1000Count.required ? ew.Validators.required(fields.A1000Count.caption) : null, ew.Validators.integer], fields.A1000Count.isInvalid],
        ["A1000Amount", [fields.A1000Amount.visible && fields.A1000Amount.required ? ew.Validators.required(fields.A1000Amount.caption) : null, ew.Validators.float], fields.A1000Amount.isInvalid],
        ["A500Count", [fields.A500Count.visible && fields.A500Count.required ? ew.Validators.required(fields.A500Count.caption) : null, ew.Validators.integer], fields.A500Count.isInvalid],
        ["A500Amount", [fields.A500Amount.visible && fields.A500Amount.required ? ew.Validators.required(fields.A500Amount.caption) : null, ew.Validators.float], fields.A500Amount.isInvalid],
        ["A200Count", [fields.A200Count.visible && fields.A200Count.required ? ew.Validators.required(fields.A200Count.caption) : null, ew.Validators.integer], fields.A200Count.isInvalid],
        ["A200Amount", [fields.A200Amount.visible && fields.A200Amount.required ? ew.Validators.required(fields.A200Amount.caption) : null, ew.Validators.float], fields.A200Amount.isInvalid],
        ["A100Count", [fields.A100Count.visible && fields.A100Count.required ? ew.Validators.required(fields.A100Count.caption) : null, ew.Validators.integer], fields.A100Count.isInvalid],
        ["A100Amount", [fields.A100Amount.visible && fields.A100Amount.required ? ew.Validators.required(fields.A100Amount.caption) : null, ew.Validators.float], fields.A100Amount.isInvalid],
        ["A50Count", [fields.A50Count.visible && fields.A50Count.required ? ew.Validators.required(fields.A50Count.caption) : null, ew.Validators.integer], fields.A50Count.isInvalid],
        ["A50Amount", [fields.A50Amount.visible && fields.A50Amount.required ? ew.Validators.required(fields.A50Amount.caption) : null, ew.Validators.float], fields.A50Amount.isInvalid],
        ["A20Count", [fields.A20Count.visible && fields.A20Count.required ? ew.Validators.required(fields.A20Count.caption) : null, ew.Validators.integer], fields.A20Count.isInvalid],
        ["A20Amount", [fields.A20Amount.visible && fields.A20Amount.required ? ew.Validators.required(fields.A20Amount.caption) : null, ew.Validators.float], fields.A20Amount.isInvalid],
        ["A10Count", [fields.A10Count.visible && fields.A10Count.required ? ew.Validators.required(fields.A10Count.caption) : null, ew.Validators.integer], fields.A10Count.isInvalid],
        ["A10Amount", [fields.A10Amount.visible && fields.A10Amount.required ? ew.Validators.required(fields.A10Amount.caption) : null, ew.Validators.float], fields.A10Amount.isInvalid],
        ["BalanceAmount", [fields.BalanceAmount.visible && fields.BalanceAmount.required ? ew.Validators.required(fields.BalanceAmount.caption) : null, ew.Validators.float], fields.BalanceAmount.isInvalid],
        ["CashCollected", [fields.CashCollected.visible && fields.CashCollected.required ? ew.Validators.required(fields.CashCollected.caption) : null, ew.Validators.float], fields.CashCollected.isInvalid],
        ["RTGS", [fields.RTGS.visible && fields.RTGS.required ? ew.Validators.required(fields.RTGS.caption) : null, ew.Validators.float], fields.RTGS.isInvalid],
        ["PAYTM", [fields.PAYTM.visible && fields.PAYTM.required ? ew.Validators.required(fields.PAYTM.caption) : null, ew.Validators.float], fields.PAYTM.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["ManualCash", [fields.ManualCash.visible && fields.ManualCash.required ? ew.Validators.required(fields.ManualCash.caption) : null, ew.Validators.float], fields.ManualCash.isInvalid],
        ["ManualCard", [fields.ManualCard.visible && fields.ManualCard.required ? ew.Validators.required(fields.ManualCard.caption) : null, ew.Validators.float], fields.ManualCard.isInvalid]
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
    fdepositdetailsedit.lists.DepositToBankSelect = <?= $Page->DepositToBankSelect->toClientList($Page) ?>;
    fdepositdetailsedit.lists.DepositToBank = <?= $Page->DepositToBank->toClientList($Page) ?>;
    fdepositdetailsedit.lists.TransferTo = <?= $Page->TransferTo->toClientList($Page) ?>;
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
<form name="fdepositdetailsedit" id="fdepositdetailsedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="depositdetails">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_depositdetails_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_depositdetails_id"><span id="el_depositdetails_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="depositdetails" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DepositDate->Visible) { // DepositDate ?>
    <div id="r_DepositDate" class="form-group row">
        <label id="elh_depositdetails_DepositDate" for="x_DepositDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_DepositDate"><?= $Page->DepositDate->caption() ?><?= $Page->DepositDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DepositDate->cellAttributes() ?>>
<template id="tpx_depositdetails_DepositDate"><span id="el_depositdetails_DepositDate">
<input type="<?= $Page->DepositDate->getInputTextType() ?>" data-table="depositdetails" data-field="x_DepositDate" data-format="7" name="x_DepositDate" id="x_DepositDate" placeholder="<?= HtmlEncode($Page->DepositDate->getPlaceHolder()) ?>" value="<?= $Page->DepositDate->EditValue ?>"<?= $Page->DepositDate->editAttributes() ?> aria-describedby="x_DepositDate_help">
<?= $Page->DepositDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DepositDate->getErrorMessage() ?></div>
<?php if (!$Page->DepositDate->ReadOnly && !$Page->DepositDate->Disabled && !isset($Page->DepositDate->EditAttrs["readonly"]) && !isset($Page->DepositDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fdepositdetailsedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fdepositdetailsedit", "x_DepositDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DepositToBankSelect->Visible) { // DepositToBankSelect ?>
    <div id="r_DepositToBankSelect" class="form-group row">
        <label id="elh_depositdetails_DepositToBankSelect" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_DepositToBankSelect"><?= $Page->DepositToBankSelect->caption() ?><?= $Page->DepositToBankSelect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DepositToBankSelect->cellAttributes() ?>>
<template id="tpx_depositdetails_DepositToBankSelect"><span id="el_depositdetails_DepositToBankSelect">
<template id="tp_x_DepositToBankSelect">
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" data-table="depositdetails" data-field="x_DepositToBankSelect" name="x_DepositToBankSelect" id="x_DepositToBankSelect"<?= $Page->DepositToBankSelect->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_DepositToBankSelect" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_DepositToBankSelect"
    name="x_DepositToBankSelect"
    value="<?= HtmlEncode($Page->DepositToBankSelect->CurrentValue) ?>"
    data-type="select-one"
    data-template="tp_x_DepositToBankSelect"
    data-target="dsl_x_DepositToBankSelect"
    data-repeatcolumn="5"
    class="form-control<?= $Page->DepositToBankSelect->isInvalidClass() ?>"
    data-table="depositdetails"
    data-field="x_DepositToBankSelect"
    data-value-separator="<?= $Page->DepositToBankSelect->displayValueSeparatorAttribute() ?>"
    <?= $Page->DepositToBankSelect->editAttributes() ?>>
<?= $Page->DepositToBankSelect->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DepositToBankSelect->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DepositToBank->Visible) { // DepositToBank ?>
    <div id="r_DepositToBank" class="form-group row">
        <label id="elh_depositdetails_DepositToBank" for="x_DepositToBank" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_DepositToBank"><?= $Page->DepositToBank->caption() ?><?= $Page->DepositToBank->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DepositToBank->cellAttributes() ?>>
<template id="tpx_depositdetails_DepositToBank"><span id="el_depositdetails_DepositToBank">
<div class="input-group flex-nowrap">
    <select
        id="x_DepositToBank"
        name="x_DepositToBank"
        class="form-control ew-select<?= $Page->DepositToBank->isInvalidClass() ?>"
        data-select2-id="depositdetails_x_DepositToBank"
        data-table="depositdetails"
        data-field="x_DepositToBank"
        data-value-separator="<?= $Page->DepositToBank->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DepositToBank->getPlaceHolder()) ?>"
        <?= $Page->DepositToBank->editAttributes() ?>>
        <?= $Page->DepositToBank->selectOptionListHtml("x_DepositToBank") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "bankbranches") && !$Page->DepositToBank->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DepositToBank" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->DepositToBank->caption() ?>" data-title="<?= $Page->DepositToBank->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DepositToBank',url:'<?= GetUrl("BankbranchesAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->DepositToBank->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DepositToBank->getErrorMessage() ?></div>
<?= $Page->DepositToBank->Lookup->getParamTag($Page, "p_x_DepositToBank") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='depositdetails_x_DepositToBank']"),
        options = { name: "x_DepositToBank", selectId: "depositdetails_x_DepositToBank", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.depositdetails.fields.DepositToBank.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransferToSelect->Visible) { // TransferToSelect ?>
    <div id="r_TransferToSelect" class="form-group row">
        <label id="elh_depositdetails_TransferToSelect" for="x_TransferToSelect" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_TransferToSelect"><?= $Page->TransferToSelect->caption() ?><?= $Page->TransferToSelect->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransferToSelect->cellAttributes() ?>>
<template id="tpx_depositdetails_TransferToSelect"><span id="el_depositdetails_TransferToSelect">
<input type="<?= $Page->TransferToSelect->getInputTextType() ?>" data-table="depositdetails" data-field="x_TransferToSelect" name="x_TransferToSelect" id="x_TransferToSelect" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->TransferToSelect->getPlaceHolder()) ?>" value="<?= $Page->TransferToSelect->EditValue ?>"<?= $Page->TransferToSelect->editAttributes() ?> aria-describedby="x_TransferToSelect_help">
<?= $Page->TransferToSelect->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransferToSelect->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TransferTo->Visible) { // TransferTo ?>
    <div id="r_TransferTo" class="form-group row">
        <label id="elh_depositdetails_TransferTo" for="x_TransferTo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_TransferTo"><?= $Page->TransferTo->caption() ?><?= $Page->TransferTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TransferTo->cellAttributes() ?>>
<template id="tpx_depositdetails_TransferTo"><span id="el_depositdetails_TransferTo">
<div class="input-group flex-nowrap">
    <select
        id="x_TransferTo"
        name="x_TransferTo"
        class="form-control ew-select<?= $Page->TransferTo->isInvalidClass() ?>"
        data-select2-id="depositdetails_x_TransferTo"
        data-table="depositdetails"
        data-field="x_TransferTo"
        data-value-separator="<?= $Page->TransferTo->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TransferTo->getPlaceHolder()) ?>"
        <?= $Page->TransferTo->editAttributes() ?>>
        <?= $Page->TransferTo->selectOptionListHtml("x_TransferTo") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "banktransferto") && !$Page->TransferTo->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TransferTo" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TransferTo->caption() ?>" data-title="<?= $Page->TransferTo->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TransferTo',url:'<?= GetUrl("BanktransfertoAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TransferTo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TransferTo->getErrorMessage() ?></div>
<?= $Page->TransferTo->Lookup->getParamTag($Page, "p_x_TransferTo") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='depositdetails_x_TransferTo']"),
        options = { name: "x_TransferTo", selectId: "depositdetails_x_TransferTo", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.depositdetails.fields.TransferTo.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->OpeningBalance->Visible) { // OpeningBalance ?>
    <div id="r_OpeningBalance" class="form-group row">
        <label id="elh_depositdetails_OpeningBalance" for="x_OpeningBalance" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_OpeningBalance"><?= $Page->OpeningBalance->caption() ?><?= $Page->OpeningBalance->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->OpeningBalance->cellAttributes() ?>>
<template id="tpx_depositdetails_OpeningBalance"><span id="el_depositdetails_OpeningBalance">
<input type="<?= $Page->OpeningBalance->getInputTextType() ?>" data-table="depositdetails" data-field="x_OpeningBalance" name="x_OpeningBalance" id="x_OpeningBalance" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->OpeningBalance->getPlaceHolder()) ?>" value="<?= $Page->OpeningBalance->EditValue ?>"<?= $Page->OpeningBalance->editAttributes() ?> aria-describedby="x_OpeningBalance_help">
<?= $Page->OpeningBalance->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->OpeningBalance->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Other->Visible) { // Other ?>
    <div id="r_Other" class="form-group row">
        <label id="elh_depositdetails_Other" for="x_Other" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_Other"><?= $Page->Other->caption() ?><?= $Page->Other->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Other->cellAttributes() ?>>
<template id="tpx_depositdetails_Other"><span id="el_depositdetails_Other">
<input type="<?= $Page->Other->getInputTextType() ?>" data-table="depositdetails" data-field="x_Other" name="x_Other" id="x_Other" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Other->getPlaceHolder()) ?>" value="<?= $Page->Other->EditValue ?>"<?= $Page->Other->editAttributes() ?> aria-describedby="x_Other_help">
<?= $Page->Other->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Other->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalCash->Visible) { // TotalCash ?>
    <div id="r_TotalCash" class="form-group row">
        <label id="elh_depositdetails_TotalCash" for="x_TotalCash" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_TotalCash"><?= $Page->TotalCash->caption() ?><?= $Page->TotalCash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalCash->cellAttributes() ?>>
<template id="tpx_depositdetails_TotalCash"><span id="el_depositdetails_TotalCash">
<input type="<?= $Page->TotalCash->getInputTextType() ?>" data-table="depositdetails" data-field="x_TotalCash" name="x_TotalCash" id="x_TotalCash" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->TotalCash->getPlaceHolder()) ?>" value="<?= $Page->TotalCash->EditValue ?>"<?= $Page->TotalCash->editAttributes() ?> aria-describedby="x_TotalCash_help">
<?= $Page->TotalCash->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalCash->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Cheque->Visible) { // Cheque ?>
    <div id="r_Cheque" class="form-group row">
        <label id="elh_depositdetails_Cheque" for="x_Cheque" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_Cheque"><?= $Page->Cheque->caption() ?><?= $Page->Cheque->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Cheque->cellAttributes() ?>>
<template id="tpx_depositdetails_Cheque"><span id="el_depositdetails_Cheque">
<input type="<?= $Page->Cheque->getInputTextType() ?>" data-table="depositdetails" data-field="x_Cheque" name="x_Cheque" id="x_Cheque" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Cheque->getPlaceHolder()) ?>" value="<?= $Page->Cheque->EditValue ?>"<?= $Page->Cheque->editAttributes() ?> aria-describedby="x_Cheque_help">
<?= $Page->Cheque->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Cheque->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Card->Visible) { // Card ?>
    <div id="r_Card" class="form-group row">
        <label id="elh_depositdetails_Card" for="x_Card" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_Card"><?= $Page->Card->caption() ?><?= $Page->Card->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Card->cellAttributes() ?>>
<template id="tpx_depositdetails_Card"><span id="el_depositdetails_Card">
<input type="<?= $Page->Card->getInputTextType() ?>" data-table="depositdetails" data-field="x_Card" name="x_Card" id="x_Card" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->Card->getPlaceHolder()) ?>" value="<?= $Page->Card->EditValue ?>"<?= $Page->Card->editAttributes() ?> aria-describedby="x_Card_help">
<?= $Page->Card->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Card->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NEFTRTGS->Visible) { // NEFTRTGS ?>
    <div id="r_NEFTRTGS" class="form-group row">
        <label id="elh_depositdetails_NEFTRTGS" for="x_NEFTRTGS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_NEFTRTGS"><?= $Page->NEFTRTGS->caption() ?><?= $Page->NEFTRTGS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NEFTRTGS->cellAttributes() ?>>
<template id="tpx_depositdetails_NEFTRTGS"><span id="el_depositdetails_NEFTRTGS">
<input type="<?= $Page->NEFTRTGS->getInputTextType() ?>" data-table="depositdetails" data-field="x_NEFTRTGS" name="x_NEFTRTGS" id="x_NEFTRTGS" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->NEFTRTGS->getPlaceHolder()) ?>" value="<?= $Page->NEFTRTGS->EditValue ?>"<?= $Page->NEFTRTGS->editAttributes() ?> aria-describedby="x_NEFTRTGS_help">
<?= $Page->NEFTRTGS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NEFTRTGS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TotalTransferDepositAmount->Visible) { // TotalTransferDepositAmount ?>
    <div id="r_TotalTransferDepositAmount" class="form-group row">
        <label id="elh_depositdetails_TotalTransferDepositAmount" for="x_TotalTransferDepositAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_TotalTransferDepositAmount"><?= $Page->TotalTransferDepositAmount->caption() ?><?= $Page->TotalTransferDepositAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TotalTransferDepositAmount->cellAttributes() ?>>
<template id="tpx_depositdetails_TotalTransferDepositAmount"><span id="el_depositdetails_TotalTransferDepositAmount">
<input type="<?= $Page->TotalTransferDepositAmount->getInputTextType() ?>" data-table="depositdetails" data-field="x_TotalTransferDepositAmount" name="x_TotalTransferDepositAmount" id="x_TotalTransferDepositAmount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->TotalTransferDepositAmount->getPlaceHolder()) ?>" value="<?= $Page->TotalTransferDepositAmount->EditValue ?>"<?= $Page->TotalTransferDepositAmount->editAttributes() ?> aria-describedby="x_TotalTransferDepositAmount_help">
<?= $Page->TotalTransferDepositAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TotalTransferDepositAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A2000Count->Visible) { // A2000Count ?>
    <div id="r_A2000Count" class="form-group row">
        <label id="elh_depositdetails_A2000Count" for="x_A2000Count" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A2000Count"><?= $Page->A2000Count->caption() ?><?= $Page->A2000Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A2000Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A2000Count"><span id="el_depositdetails_A2000Count">
<input type="<?= $Page->A2000Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A2000Count" name="x_A2000Count" id="x_A2000Count" size="8" placeholder="<?= HtmlEncode($Page->A2000Count->getPlaceHolder()) ?>" value="<?= $Page->A2000Count->EditValue ?>"<?= $Page->A2000Count->editAttributes() ?> aria-describedby="x_A2000Count_help">
<?= $Page->A2000Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A2000Count->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A2000Amount->Visible) { // A2000Amount ?>
    <div id="r_A2000Amount" class="form-group row">
        <label id="elh_depositdetails_A2000Amount" for="x_A2000Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A2000Amount"><?= $Page->A2000Amount->caption() ?><?= $Page->A2000Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A2000Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A2000Amount"><span id="el_depositdetails_A2000Amount">
<input type="<?= $Page->A2000Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A2000Amount" name="x_A2000Amount" id="x_A2000Amount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->A2000Amount->getPlaceHolder()) ?>" value="<?= $Page->A2000Amount->EditValue ?>"<?= $Page->A2000Amount->editAttributes() ?> aria-describedby="x_A2000Amount_help">
<?= $Page->A2000Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A2000Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A1000Count->Visible) { // A1000Count ?>
    <div id="r_A1000Count" class="form-group row">
        <label id="elh_depositdetails_A1000Count" for="x_A1000Count" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A1000Count"><?= $Page->A1000Count->caption() ?><?= $Page->A1000Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A1000Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A1000Count"><span id="el_depositdetails_A1000Count">
<input type="<?= $Page->A1000Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A1000Count" name="x_A1000Count" id="x_A1000Count" size="8" placeholder="<?= HtmlEncode($Page->A1000Count->getPlaceHolder()) ?>" value="<?= $Page->A1000Count->EditValue ?>"<?= $Page->A1000Count->editAttributes() ?> aria-describedby="x_A1000Count_help">
<?= $Page->A1000Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A1000Count->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A1000Amount->Visible) { // A1000Amount ?>
    <div id="r_A1000Amount" class="form-group row">
        <label id="elh_depositdetails_A1000Amount" for="x_A1000Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A1000Amount"><?= $Page->A1000Amount->caption() ?><?= $Page->A1000Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A1000Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A1000Amount"><span id="el_depositdetails_A1000Amount">
<input type="<?= $Page->A1000Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A1000Amount" name="x_A1000Amount" id="x_A1000Amount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->A1000Amount->getPlaceHolder()) ?>" value="<?= $Page->A1000Amount->EditValue ?>"<?= $Page->A1000Amount->editAttributes() ?> aria-describedby="x_A1000Amount_help">
<?= $Page->A1000Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A1000Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A500Count->Visible) { // A500Count ?>
    <div id="r_A500Count" class="form-group row">
        <label id="elh_depositdetails_A500Count" for="x_A500Count" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A500Count"><?= $Page->A500Count->caption() ?><?= $Page->A500Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A500Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A500Count"><span id="el_depositdetails_A500Count">
<input type="<?= $Page->A500Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A500Count" name="x_A500Count" id="x_A500Count" size="8" placeholder="<?= HtmlEncode($Page->A500Count->getPlaceHolder()) ?>" value="<?= $Page->A500Count->EditValue ?>"<?= $Page->A500Count->editAttributes() ?> aria-describedby="x_A500Count_help">
<?= $Page->A500Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A500Count->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A500Amount->Visible) { // A500Amount ?>
    <div id="r_A500Amount" class="form-group row">
        <label id="elh_depositdetails_A500Amount" for="x_A500Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A500Amount"><?= $Page->A500Amount->caption() ?><?= $Page->A500Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A500Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A500Amount"><span id="el_depositdetails_A500Amount">
<input type="<?= $Page->A500Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A500Amount" name="x_A500Amount" id="x_A500Amount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->A500Amount->getPlaceHolder()) ?>" value="<?= $Page->A500Amount->EditValue ?>"<?= $Page->A500Amount->editAttributes() ?> aria-describedby="x_A500Amount_help">
<?= $Page->A500Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A500Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A200Count->Visible) { // A200Count ?>
    <div id="r_A200Count" class="form-group row">
        <label id="elh_depositdetails_A200Count" for="x_A200Count" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A200Count"><?= $Page->A200Count->caption() ?><?= $Page->A200Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A200Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A200Count"><span id="el_depositdetails_A200Count">
<input type="<?= $Page->A200Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A200Count" name="x_A200Count" id="x_A200Count" size="8" placeholder="<?= HtmlEncode($Page->A200Count->getPlaceHolder()) ?>" value="<?= $Page->A200Count->EditValue ?>"<?= $Page->A200Count->editAttributes() ?> aria-describedby="x_A200Count_help">
<?= $Page->A200Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A200Count->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A200Amount->Visible) { // A200Amount ?>
    <div id="r_A200Amount" class="form-group row">
        <label id="elh_depositdetails_A200Amount" for="x_A200Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A200Amount"><?= $Page->A200Amount->caption() ?><?= $Page->A200Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A200Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A200Amount"><span id="el_depositdetails_A200Amount">
<input type="<?= $Page->A200Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A200Amount" name="x_A200Amount" id="x_A200Amount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->A200Amount->getPlaceHolder()) ?>" value="<?= $Page->A200Amount->EditValue ?>"<?= $Page->A200Amount->editAttributes() ?> aria-describedby="x_A200Amount_help">
<?= $Page->A200Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A200Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A100Count->Visible) { // A100Count ?>
    <div id="r_A100Count" class="form-group row">
        <label id="elh_depositdetails_A100Count" for="x_A100Count" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A100Count"><?= $Page->A100Count->caption() ?><?= $Page->A100Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A100Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A100Count"><span id="el_depositdetails_A100Count">
<input type="<?= $Page->A100Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A100Count" name="x_A100Count" id="x_A100Count" size="8" placeholder="<?= HtmlEncode($Page->A100Count->getPlaceHolder()) ?>" value="<?= $Page->A100Count->EditValue ?>"<?= $Page->A100Count->editAttributes() ?> aria-describedby="x_A100Count_help">
<?= $Page->A100Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A100Count->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A100Amount->Visible) { // A100Amount ?>
    <div id="r_A100Amount" class="form-group row">
        <label id="elh_depositdetails_A100Amount" for="x_A100Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A100Amount"><?= $Page->A100Amount->caption() ?><?= $Page->A100Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A100Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A100Amount"><span id="el_depositdetails_A100Amount">
<input type="<?= $Page->A100Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A100Amount" name="x_A100Amount" id="x_A100Amount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->A100Amount->getPlaceHolder()) ?>" value="<?= $Page->A100Amount->EditValue ?>"<?= $Page->A100Amount->editAttributes() ?> aria-describedby="x_A100Amount_help">
<?= $Page->A100Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A100Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A50Count->Visible) { // A50Count ?>
    <div id="r_A50Count" class="form-group row">
        <label id="elh_depositdetails_A50Count" for="x_A50Count" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A50Count"><?= $Page->A50Count->caption() ?><?= $Page->A50Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A50Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A50Count"><span id="el_depositdetails_A50Count">
<input type="<?= $Page->A50Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A50Count" name="x_A50Count" id="x_A50Count" size="8" placeholder="<?= HtmlEncode($Page->A50Count->getPlaceHolder()) ?>" value="<?= $Page->A50Count->EditValue ?>"<?= $Page->A50Count->editAttributes() ?> aria-describedby="x_A50Count_help">
<?= $Page->A50Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A50Count->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A50Amount->Visible) { // A50Amount ?>
    <div id="r_A50Amount" class="form-group row">
        <label id="elh_depositdetails_A50Amount" for="x_A50Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A50Amount"><?= $Page->A50Amount->caption() ?><?= $Page->A50Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A50Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A50Amount"><span id="el_depositdetails_A50Amount">
<input type="<?= $Page->A50Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A50Amount" name="x_A50Amount" id="x_A50Amount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->A50Amount->getPlaceHolder()) ?>" value="<?= $Page->A50Amount->EditValue ?>"<?= $Page->A50Amount->editAttributes() ?> aria-describedby="x_A50Amount_help">
<?= $Page->A50Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A50Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A20Count->Visible) { // A20Count ?>
    <div id="r_A20Count" class="form-group row">
        <label id="elh_depositdetails_A20Count" for="x_A20Count" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A20Count"><?= $Page->A20Count->caption() ?><?= $Page->A20Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A20Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A20Count"><span id="el_depositdetails_A20Count">
<input type="<?= $Page->A20Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A20Count" name="x_A20Count" id="x_A20Count" size="8" placeholder="<?= HtmlEncode($Page->A20Count->getPlaceHolder()) ?>" value="<?= $Page->A20Count->EditValue ?>"<?= $Page->A20Count->editAttributes() ?> aria-describedby="x_A20Count_help">
<?= $Page->A20Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A20Count->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A20Amount->Visible) { // A20Amount ?>
    <div id="r_A20Amount" class="form-group row">
        <label id="elh_depositdetails_A20Amount" for="x_A20Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A20Amount"><?= $Page->A20Amount->caption() ?><?= $Page->A20Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A20Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A20Amount"><span id="el_depositdetails_A20Amount">
<input type="<?= $Page->A20Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A20Amount" name="x_A20Amount" id="x_A20Amount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->A20Amount->getPlaceHolder()) ?>" value="<?= $Page->A20Amount->EditValue ?>"<?= $Page->A20Amount->editAttributes() ?> aria-describedby="x_A20Amount_help">
<?= $Page->A20Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A20Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A10Count->Visible) { // A10Count ?>
    <div id="r_A10Count" class="form-group row">
        <label id="elh_depositdetails_A10Count" for="x_A10Count" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A10Count"><?= $Page->A10Count->caption() ?><?= $Page->A10Count->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A10Count->cellAttributes() ?>>
<template id="tpx_depositdetails_A10Count"><span id="el_depositdetails_A10Count">
<input type="<?= $Page->A10Count->getInputTextType() ?>" data-table="depositdetails" data-field="x_A10Count" name="x_A10Count" id="x_A10Count" size="8" placeholder="<?= HtmlEncode($Page->A10Count->getPlaceHolder()) ?>" value="<?= $Page->A10Count->EditValue ?>"<?= $Page->A10Count->editAttributes() ?> aria-describedby="x_A10Count_help">
<?= $Page->A10Count->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A10Count->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A10Amount->Visible) { // A10Amount ?>
    <div id="r_A10Amount" class="form-group row">
        <label id="elh_depositdetails_A10Amount" for="x_A10Amount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_A10Amount"><?= $Page->A10Amount->caption() ?><?= $Page->A10Amount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A10Amount->cellAttributes() ?>>
<template id="tpx_depositdetails_A10Amount"><span id="el_depositdetails_A10Amount">
<input type="<?= $Page->A10Amount->getInputTextType() ?>" data-table="depositdetails" data-field="x_A10Amount" name="x_A10Amount" id="x_A10Amount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->A10Amount->getPlaceHolder()) ?>" value="<?= $Page->A10Amount->EditValue ?>"<?= $Page->A10Amount->editAttributes() ?> aria-describedby="x_A10Amount_help">
<?= $Page->A10Amount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A10Amount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BalanceAmount->Visible) { // BalanceAmount ?>
    <div id="r_BalanceAmount" class="form-group row">
        <label id="elh_depositdetails_BalanceAmount" for="x_BalanceAmount" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_BalanceAmount"><?= $Page->BalanceAmount->caption() ?><?= $Page->BalanceAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BalanceAmount->cellAttributes() ?>>
<template id="tpx_depositdetails_BalanceAmount"><span id="el_depositdetails_BalanceAmount">
<input type="<?= $Page->BalanceAmount->getInputTextType() ?>" data-table="depositdetails" data-field="x_BalanceAmount" name="x_BalanceAmount" id="x_BalanceAmount" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->BalanceAmount->getPlaceHolder()) ?>" value="<?= $Page->BalanceAmount->EditValue ?>"<?= $Page->BalanceAmount->editAttributes() ?> aria-describedby="x_BalanceAmount_help">
<?= $Page->BalanceAmount->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BalanceAmount->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CashCollected->Visible) { // CashCollected ?>
    <div id="r_CashCollected" class="form-group row">
        <label id="elh_depositdetails_CashCollected" for="x_CashCollected" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_CashCollected"><?= $Page->CashCollected->caption() ?><?= $Page->CashCollected->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CashCollected->cellAttributes() ?>>
<template id="tpx_depositdetails_CashCollected"><span id="el_depositdetails_CashCollected">
<input type="<?= $Page->CashCollected->getInputTextType() ?>" data-table="depositdetails" data-field="x_CashCollected" name="x_CashCollected" id="x_CashCollected" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->CashCollected->getPlaceHolder()) ?>" value="<?= $Page->CashCollected->EditValue ?>"<?= $Page->CashCollected->editAttributes() ?> aria-describedby="x_CashCollected_help">
<?= $Page->CashCollected->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CashCollected->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RTGS->Visible) { // RTGS ?>
    <div id="r_RTGS" class="form-group row">
        <label id="elh_depositdetails_RTGS" for="x_RTGS" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_RTGS"><?= $Page->RTGS->caption() ?><?= $Page->RTGS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RTGS->cellAttributes() ?>>
<template id="tpx_depositdetails_RTGS"><span id="el_depositdetails_RTGS">
<input type="<?= $Page->RTGS->getInputTextType() ?>" data-table="depositdetails" data-field="x_RTGS" name="x_RTGS" id="x_RTGS" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->RTGS->getPlaceHolder()) ?>" value="<?= $Page->RTGS->EditValue ?>"<?= $Page->RTGS->editAttributes() ?> aria-describedby="x_RTGS_help">
<?= $Page->RTGS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RTGS->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PAYTM->Visible) { // PAYTM ?>
    <div id="r_PAYTM" class="form-group row">
        <label id="elh_depositdetails_PAYTM" for="x_PAYTM" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_PAYTM"><?= $Page->PAYTM->caption() ?><?= $Page->PAYTM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PAYTM->cellAttributes() ?>>
<template id="tpx_depositdetails_PAYTM"><span id="el_depositdetails_PAYTM">
<input type="<?= $Page->PAYTM->getInputTextType() ?>" data-table="depositdetails" data-field="x_PAYTM" name="x_PAYTM" id="x_PAYTM" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->PAYTM->getPlaceHolder()) ?>" value="<?= $Page->PAYTM->EditValue ?>"<?= $Page->PAYTM->editAttributes() ?> aria-describedby="x_PAYTM_help">
<?= $Page->PAYTM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PAYTM->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ManualCash->Visible) { // ManualCash ?>
    <div id="r_ManualCash" class="form-group row">
        <label id="elh_depositdetails_ManualCash" for="x_ManualCash" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_ManualCash"><?= $Page->ManualCash->caption() ?><?= $Page->ManualCash->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ManualCash->cellAttributes() ?>>
<template id="tpx_depositdetails_ManualCash"><span id="el_depositdetails_ManualCash">
<input type="<?= $Page->ManualCash->getInputTextType() ?>" data-table="depositdetails" data-field="x_ManualCash" name="x_ManualCash" id="x_ManualCash" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->ManualCash->getPlaceHolder()) ?>" value="<?= $Page->ManualCash->EditValue ?>"<?= $Page->ManualCash->editAttributes() ?> aria-describedby="x_ManualCash_help">
<?= $Page->ManualCash->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ManualCash->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ManualCard->Visible) { // ManualCard ?>
    <div id="r_ManualCard" class="form-group row">
        <label id="elh_depositdetails_ManualCard" for="x_ManualCard" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_depositdetails_ManualCard"><?= $Page->ManualCard->caption() ?><?= $Page->ManualCard->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ManualCard->cellAttributes() ?>>
<template id="tpx_depositdetails_ManualCard"><span id="el_depositdetails_ManualCard">
<input type="<?= $Page->ManualCard->getInputTextType() ?>" data-table="depositdetails" data-field="x_ManualCard" name="x_ManualCard" id="x_ManualCard" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->ManualCard->getPlaceHolder()) ?>" value="<?= $Page->ManualCard->EditValue ?>"<?= $Page->ManualCard->editAttributes() ?> aria-describedby="x_ManualCard_help">
<?= $Page->ManualCard->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ManualCard->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_depositdetailsedit" class="ew-custom-template"></div>
<template id="tpm_depositdetailsedit">
<div id="ct_DepositdetailsEdit"><style>
	.ew-form:not(.ew-list-form):not(.ew-pager-form), table.ew-master-table.ew-vertical {
		width: 100%;
	}
	.content-wrapper {
		background: #f4f6f9;
	}
	.form-control-plaintext {
		display: unset;
		width: unset;
	}
	.widget-user .widget-user-image {
		position: absolute;
		top: 65px;
		left: 90%;
		margin-left: -45px;
	}
	.widget-user .card-footer {
		padding-top: 0px;
	}
	.card-footer {
		padding: .05rem 0.025rem;
		background-color: rgba(17,17,17,0.03);
		border-top: 0 solid #f4f4f4;
	}
	.widget-user .widget-user-username {
	margin-top: 0;
	margin-bottom: 0px;
	font-size: 18px;
	font-weight: 300;
	text-shadow: 0 1px 1px rgba(0,0,0,0.2);
}
.widget-user .widget-user-image {
	position: absolute;
	top: 5px;
	left: 90%;
	margin-left: -45px;
}
.widget-user .widget-user-header {
	padding: 1rem;
	height: 100px;
	border-top-left-radius: .25rem;
	border-top-right-radius: .25rem;
}
.form-control:not(textarea) {
	width: -webkit-fill-available;
}
.ew-row .ew-cell {
	margin-right: unset;
}
.form-control:not(textarea) {
	width: auto;
}
</style>
<input id="createdbyId" name="createdbyId" type="hidden" value="<?php echo CurrentUserName(); ?>">
<input id="HospIDId" name="HospIDId" type="hidden" value="<?php echo HospitalID(); ?>">
<div class="row">
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Deposit Details</h3>
			</div>
			<div class="card-body">
				 <div><slot class="ew-slot" name="tpc_depositdetails_DepositToBankSelect"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_DepositToBankSelect"></slot></div>
				 <div id="DepositToBankid"><slot class="ew-slot" name="tpc_depositdetails_DepositToBank"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_DepositToBank"></slot></div>
				 <div id="TransferToid"><slot class="ew-slot" name="tpc_depositdetails_TransferTo"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_TransferTo"></slot></div>
				 <div><slot class="ew-slot" name="tpc_depositdetails_DepositDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_DepositDate"></slot></div>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Deposit Details</h3>
			</div>
			<div class="card-body">
			  <!-- /.card-body -->
<table class="table table-condensed">
				 <tbody align="right">
				 			<tr><td  align="right" style="width: 40px">Opening Balance</td><td  align="right" style="width: 40px"></td><td  align="right" style="width: 40px"><slot class="ew-slot" name="tpc_depositdetails_OpeningBalance"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_OpeningBalance"></slot></td></tr>
				</tbody>
</table>			
<table class="table table-condensed">
<thead align="right">
					<tr>
					  <th align="right" style="width: 40px">Denomination</th>
					  <th align="right" style="width: 40px">Count</th>
					  <th align="right" style="width: 40px">Amount</th>
					</tr>
				  </thead>
	 <tbody align="right">
		<tr><td>2000</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A2000Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A2000Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A2000Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A2000Amount"></slot></td></tr>
		<tr><td>1000</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A1000Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A1000Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A1000Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A1000Amount"></slot></td></tr>
		<tr><td>500</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A500Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A500Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A500Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A500Amount"></slot></td></tr>
		<tr><td>200</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A200Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A200Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A200Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A200Amount"></slot></td></tr>
		<tr><td>100</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A100Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A100Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A100Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A100Amount"></slot></td></tr>
		<tr><td>50</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A50Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A50Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A50Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A50Amount"></slot></td></tr>
		<tr><td>20</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A20Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A20Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A20Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A20Amount"></slot></td></tr>
		<tr><td>10</td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A10Count"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A10Count"></slot></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_A10Amount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_A10Amount"></slot></td></tr>
		<tr><td>Other</td><td></td><td align="right"><slot class="ew-slot" name="tpc_depositdetails_Other"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_Other"></slot></td></tr>
	</tbody>
</table>
<hr>
<table class="table table-condensed">
				 <tbody align="right">
				 			<tr><td>Total Cash</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_TotalCash"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_TotalCash"></slot></td></tr>
				 				<tr><td>Cash Collected</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_CashCollected"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_CashCollected"></slot></td></tr>
				 			<tr><td>Cheque</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_Cheque"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_Cheque"></slot></td></tr>
				 			<tr><td>Card</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_Card"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_Card"></slot></td></tr>
				 					<tr><td>PAYTM</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_PAYTM"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_PAYTM"></slot></td></tr>
				 			<tr><td>NEFT</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_NEFTRTGS"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_NEFTRTGS"></slot></td></tr>
				 				<tr><td>RTGS</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_RTGS"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_RTGS"></slot></td></tr>
				 					<tr><td>Manual Cash</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_ManualCash"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_ManualCash"></slot></td></tr>
				 						<tr><td>Manual Card </td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_ManualCard"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_ManualCard"></slot></td></tr>
				 			<tr><td>Total Transfer / Deposit Amount</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_TotalTransferDepositAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_TotalTransferDepositAmount"></slot></td></tr>
				 			<tr><td>Balance Amount</td><td></td><td><slot class="ew-slot" name="tpc_depositdetails_BalanceAmount"></slot>&nbsp;<slot class="ew-slot" name="tpx_depositdetails_BalanceAmount"></slot></td></tr>
				</tbody>
</table>			
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_depositdetailsedit", "tpm_depositdetailsedit", "depositdetailsedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
    loadjs.done("customtemplate");
});
</script>
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
    // Startup script
    function calculateAmount(){var e=+document.getElementById("x_A2000Count").value;document.getElementById("x_A2000Amount").value=2e3*e;var t=+document.getElementById("x_A1000Count").value;document.getElementById("x_A1000Amount").value=1e3*t;var n=+document.getElementById("x_A500Count").value;document.getElementById("x_A500Amount").value=500*n;var u=+document.getElementById("x_A200Count").value;document.getElementById("x_A200Amount").value=200*u;var m=+document.getElementById("x_A100Count").value;document.getElementById("x_A100Amount").value=100*m;var l=+document.getElementById("x_A50Count").value;document.getElementById("x_A50Amount").value=50*l;var d=+document.getElementById("x_A20Count").value;document.getElementById("x_A20Amount").value=20*d;var o=+document.getElementById("x_A10Count").value;document.getElementById("x_A10Amount").value=10*o;var a=+document.getElementById("x_A2000Amount").value,A=+document.getElementById("x_A1000Amount").value,v=+document.getElementById("x_A500Amount").value,c=+document.getElementById("x_A200Amount").value,y=+document.getElementById("x_A100Amount").value,B=+document.getElementById("x_A50Amount").value,g=+document.getElementById("x_A20Amount").value,E=+document.getElementById("x_A10Amount").value,I=+document.getElementById("x_OpeningBalance").value,x=+document.getElementById("x_Other").value;document.getElementById("x_TotalCash").value=a+A+v+c+y+B+g+E+I+x;var _=+document.getElementById("x_TotalCash").value,i=+document.getElementById("x_TotalTransferDepositAmount").value;document.getElementById("x_BalanceAmount").value=_-i}document.getElementById("DepositToBankid").style.visibility="hidden",document.getElementById("TransferToid").style.visibility="hidden";
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyBillingTransferEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_billing_transferedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpharmacy_billing_transferedit = currentForm = new ew.Form("fpharmacy_billing_transferedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_billing_transfer")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_billing_transfer)
        ew.vars.tables.pharmacy_billing_transfer = currentTable;
    fpharmacy_billing_transferedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PharID", [fields.PharID.visible && fields.PharID.required ? ew.Validators.required(fields.PharID.caption) : null], fields.PharID.isInvalid],
        ["pharmacy", [fields.pharmacy.visible && fields.pharmacy.required ? ew.Validators.required(fields.pharmacy.caption) : null], fields.pharmacy.isInvalid],
        ["Details", [fields.Details.visible && fields.Details.required ? ew.Validators.required(fields.Details.caption) : null], fields.Details.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["RIDNO", [fields.RIDNO.visible && fields.RIDNO.required ? ew.Validators.required(fields.RIDNO.caption) : null, ew.Validators.integer], fields.RIDNO.isInvalid],
        ["TidNo", [fields.TidNo.visible && fields.TidNo.required ? ew.Validators.required(fields.TidNo.caption) : null, ew.Validators.integer], fields.TidNo.isInvalid],
        ["CId", [fields.CId.visible && fields.CId.required ? ew.Validators.required(fields.CId.caption) : null, ew.Validators.integer], fields.CId.isInvalid],
        ["PatId", [fields.PatId.visible && fields.PatId.required ? ew.Validators.required(fields.PatId.caption) : null, ew.Validators.integer], fields.PatId.isInvalid],
        ["DrID", [fields.DrID.visible && fields.DrID.required ? ew.Validators.required(fields.DrID.caption) : null, ew.Validators.integer], fields.DrID.isInvalid],
        ["BillStatus", [fields.BillStatus.visible && fields.BillStatus.required ? ew.Validators.required(fields.BillStatus.caption) : null, ew.Validators.integer], fields.BillStatus.isInvalid],
        ["transfer", [fields.transfer.visible && fields.transfer.required ? ew.Validators.required(fields.transfer.caption) : null], fields.transfer.isInvalid],
        ["street", [fields.street.visible && fields.street.required ? ew.Validators.required(fields.street.caption) : null], fields.street.isInvalid],
        ["area", [fields.area.visible && fields.area.required ? ew.Validators.required(fields.area.caption) : null], fields.area.isInvalid],
        ["town", [fields.town.visible && fields.town.required ? ew.Validators.required(fields.town.caption) : null], fields.town.isInvalid],
        ["province", [fields.province.visible && fields.province.required ? ew.Validators.required(fields.province.caption) : null], fields.province.isInvalid],
        ["postal_code", [fields.postal_code.visible && fields.postal_code.required ? ew.Validators.required(fields.postal_code.caption) : null], fields.postal_code.isInvalid],
        ["phone_no", [fields.phone_no.visible && fields.phone_no.required ? ew.Validators.required(fields.phone_no.caption) : null], fields.phone_no.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_billing_transferedit,
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
    fpharmacy_billing_transferedit.validate = function () {
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
    fpharmacy_billing_transferedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_billing_transferedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_billing_transferedit.lists.PharID = <?= $Page->PharID->toClientList($Page) ?>;
    fpharmacy_billing_transferedit.lists.transfer = <?= $Page->transfer->toClientList($Page) ?>;
    loadjs.done("fpharmacy_billing_transferedit");
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
<form name="fpharmacy_billing_transferedit" id="fpharmacy_billing_transferedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_billing_transfer">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_id"><span id="el_pharmacy_billing_transfer_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="pharmacy_billing_transfer" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacy->Visible) { // pharmacy ?>
    <div id="r_pharmacy" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_pharmacy" for="x_pharmacy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_pharmacy"><?= $Page->pharmacy->caption() ?><?= $Page->pharmacy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacy->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_pharmacy"><span id="el_pharmacy_billing_transfer_pharmacy">
<input type="<?= $Page->pharmacy->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_pharmacy" name="x_pharmacy" id="x_pharmacy" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacy->getPlaceHolder()) ?>" value="<?= $Page->pharmacy->EditValue ?>"<?= $Page->pharmacy->editAttributes() ?> aria-describedby="x_pharmacy_help">
<?= $Page->pharmacy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacy->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Details->Visible) { // Details ?>
    <div id="r_Details" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_Details" for="x_Details" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_Details"><?= $Page->Details->caption() ?><?= $Page->Details->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Details->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_Details"><span id="el_pharmacy_billing_transfer_Details">
<input type="<?= $Page->Details->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_Details" name="x_Details" id="x_Details" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Details->getPlaceHolder()) ?>" value="<?= $Page->Details->EditValue ?>"<?= $Page->Details->editAttributes() ?> aria-describedby="x_Details_help">
<?= $Page->Details->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Details->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNO->Visible) { // RIDNO ?>
    <div id="r_RIDNO" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_RIDNO" for="x_RIDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_RIDNO"><?= $Page->RIDNO->caption() ?><?= $Page->RIDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNO->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_RIDNO"><span id="el_pharmacy_billing_transfer_RIDNO">
<input type="<?= $Page->RIDNO->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_RIDNO" name="x_RIDNO" id="x_RIDNO" size="30" placeholder="<?= HtmlEncode($Page->RIDNO->getPlaceHolder()) ?>" value="<?= $Page->RIDNO->EditValue ?>"<?= $Page->RIDNO->editAttributes() ?> aria-describedby="x_RIDNO_help">
<?= $Page->RIDNO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNO->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TidNo->Visible) { // TidNo ?>
    <div id="r_TidNo" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_TidNo" for="x_TidNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_TidNo"><?= $Page->TidNo->caption() ?><?= $Page->TidNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TidNo->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_TidNo"><span id="el_pharmacy_billing_transfer_TidNo">
<input type="<?= $Page->TidNo->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_TidNo" name="x_TidNo" id="x_TidNo" size="30" placeholder="<?= HtmlEncode($Page->TidNo->getPlaceHolder()) ?>" value="<?= $Page->TidNo->EditValue ?>"<?= $Page->TidNo->editAttributes() ?> aria-describedby="x_TidNo_help">
<?= $Page->TidNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TidNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->CId->Visible) { // CId ?>
    <div id="r_CId" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_CId" for="x_CId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_CId"><?= $Page->CId->caption() ?><?= $Page->CId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->CId->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_CId"><span id="el_pharmacy_billing_transfer_CId">
<input type="<?= $Page->CId->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_CId" name="x_CId" id="x_CId" size="30" placeholder="<?= HtmlEncode($Page->CId->getPlaceHolder()) ?>" value="<?= $Page->CId->EditValue ?>"<?= $Page->CId->editAttributes() ?> aria-describedby="x_CId_help">
<?= $Page->CId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->CId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatId->Visible) { // PatId ?>
    <div id="r_PatId" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_PatId" for="x_PatId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_PatId"><?= $Page->PatId->caption() ?><?= $Page->PatId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatId->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_PatId"><span id="el_pharmacy_billing_transfer_PatId">
<input type="<?= $Page->PatId->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_PatId" name="x_PatId" id="x_PatId" size="30" placeholder="<?= HtmlEncode($Page->PatId->getPlaceHolder()) ?>" value="<?= $Page->PatId->EditValue ?>"<?= $Page->PatId->editAttributes() ?> aria-describedby="x_PatId_help">
<?= $Page->PatId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrID->Visible) { // DrID ?>
    <div id="r_DrID" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_DrID" for="x_DrID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_DrID"><?= $Page->DrID->caption() ?><?= $Page->DrID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrID->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_DrID"><span id="el_pharmacy_billing_transfer_DrID">
<input type="<?= $Page->DrID->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_DrID" name="x_DrID" id="x_DrID" size="30" placeholder="<?= HtmlEncode($Page->DrID->getPlaceHolder()) ?>" value="<?= $Page->DrID->EditValue ?>"<?= $Page->DrID->editAttributes() ?> aria-describedby="x_DrID_help">
<?= $Page->DrID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BillStatus->Visible) { // BillStatus ?>
    <div id="r_BillStatus" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_BillStatus" for="x_BillStatus" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_BillStatus"><?= $Page->BillStatus->caption() ?><?= $Page->BillStatus->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BillStatus->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_BillStatus"><span id="el_pharmacy_billing_transfer_BillStatus">
<input type="<?= $Page->BillStatus->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_BillStatus" name="x_BillStatus" id="x_BillStatus" size="30" placeholder="<?= HtmlEncode($Page->BillStatus->getPlaceHolder()) ?>" value="<?= $Page->BillStatus->EditValue ?>"<?= $Page->BillStatus->editAttributes() ?> aria-describedby="x_BillStatus_help">
<?= $Page->BillStatus->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BillStatus->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->transfer->Visible) { // transfer ?>
    <div id="r_transfer" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_transfer" for="x_transfer" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_transfer"><?= $Page->transfer->caption() ?><?= $Page->transfer->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->transfer->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_transfer"><span id="el_pharmacy_billing_transfer_transfer">
<?php $Page->transfer->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
    <select
        id="x_transfer"
        name="x_transfer"
        class="form-control ew-select<?= $Page->transfer->isInvalidClass() ?>"
        data-select2-id="pharmacy_billing_transfer_x_transfer"
        data-table="pharmacy_billing_transfer"
        data-field="x_transfer"
        data-value-separator="<?= $Page->transfer->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->transfer->getPlaceHolder()) ?>"
        <?= $Page->transfer->editAttributes() ?>>
        <?= $Page->transfer->selectOptionListHtml("x_transfer") ?>
    </select>
    <?= $Page->transfer->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->transfer->getErrorMessage() ?></div>
<?= $Page->transfer->Lookup->getParamTag($Page, "p_x_transfer") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_billing_transfer_x_transfer']"),
        options = { name: "x_transfer", selectId: "pharmacy_billing_transfer_x_transfer", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_billing_transfer.fields.transfer.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->street->Visible) { // street ?>
    <div id="r_street" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_street" for="x_street" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_street"><?= $Page->street->caption() ?><?= $Page->street->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->street->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_street"><span id="el_pharmacy_billing_transfer_street">
<input type="<?= $Page->street->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_street" name="x_street" id="x_street" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->street->getPlaceHolder()) ?>" value="<?= $Page->street->EditValue ?>"<?= $Page->street->editAttributes() ?> aria-describedby="x_street_help">
<?= $Page->street->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->street->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->area->Visible) { // area ?>
    <div id="r_area" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_area" for="x_area" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_area"><?= $Page->area->caption() ?><?= $Page->area->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->area->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_area"><span id="el_pharmacy_billing_transfer_area">
<input type="<?= $Page->area->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_area" name="x_area" id="x_area" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->area->getPlaceHolder()) ?>" value="<?= $Page->area->EditValue ?>"<?= $Page->area->editAttributes() ?> aria-describedby="x_area_help">
<?= $Page->area->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->area->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->town->Visible) { // town ?>
    <div id="r_town" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_town" for="x_town" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_town"><?= $Page->town->caption() ?><?= $Page->town->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->town->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_town"><span id="el_pharmacy_billing_transfer_town">
<input type="<?= $Page->town->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_town" name="x_town" id="x_town" placeholder="<?= HtmlEncode($Page->town->getPlaceHolder()) ?>" value="<?= $Page->town->EditValue ?>"<?= $Page->town->editAttributes() ?> aria-describedby="x_town_help">
<?= $Page->town->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->town->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->province->Visible) { // province ?>
    <div id="r_province" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_province" for="x_province" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_province"><?= $Page->province->caption() ?><?= $Page->province->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->province->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_province"><span id="el_pharmacy_billing_transfer_province">
<input type="<?= $Page->province->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_province" name="x_province" id="x_province" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->province->getPlaceHolder()) ?>" value="<?= $Page->province->EditValue ?>"<?= $Page->province->editAttributes() ?> aria-describedby="x_province_help">
<?= $Page->province->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->province->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->postal_code->Visible) { // postal_code ?>
    <div id="r_postal_code" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_postal_code" for="x_postal_code" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_postal_code"><?= $Page->postal_code->caption() ?><?= $Page->postal_code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->postal_code->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_postal_code"><span id="el_pharmacy_billing_transfer_postal_code">
<input type="<?= $Page->postal_code->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_postal_code" name="x_postal_code" id="x_postal_code" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->postal_code->getPlaceHolder()) ?>" value="<?= $Page->postal_code->EditValue ?>"<?= $Page->postal_code->editAttributes() ?> aria-describedby="x_postal_code_help">
<?= $Page->postal_code->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->postal_code->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->phone_no->Visible) { // phone_no ?>
    <div id="r_phone_no" class="form-group row">
        <label id="elh_pharmacy_billing_transfer_phone_no" for="x_phone_no" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_billing_transfer_phone_no"><?= $Page->phone_no->caption() ?><?= $Page->phone_no->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->phone_no->cellAttributes() ?>>
<template id="tpx_pharmacy_billing_transfer_phone_no"><span id="el_pharmacy_billing_transfer_phone_no">
<input type="<?= $Page->phone_no->getInputTextType() ?>" data-table="pharmacy_billing_transfer" data-field="x_phone_no" name="x_phone_no" id="x_phone_no" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->phone_no->getPlaceHolder()) ?>" value="<?= $Page->phone_no->EditValue ?>"<?= $Page->phone_no->editAttributes() ?> aria-describedby="x_phone_no_help">
<?= $Page->phone_no->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->phone_no->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_billing_transferedit" class="ew-custom-template"></div>
<template id="tpm_pharmacy_billing_transferedit">
<div id="ct_PharmacyBillingTransferEdit"><style>
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
</style>
<div class="row">
	<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_billing_transfer_PatId"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_transfer_PatId"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_billing_transfer_RIDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_transfer_RIDNO"></slot></h3>
	</div>
		<div class="col-4">
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_billing_transfer_CId"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_transfer_CId"></slot></h3>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#229954">
				<h3 class="card-title">Patient Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
		<td><slot class="ew-slot" name="tpx_PatientId"></slot></td>
			<td><slot class="ew-slot" name="tpx_PatientName"></slot></td>
			<td><slot class="ew-slot" name="tpx_Mobile"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpx_Dob"></slot></td>
		<td><slot class="ew-slot" name="tpx_Age"></slot></td>
			<td><slot class="ew-slot" name="tpx_Gender"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpx_PartnerName"></slot></td>
			<td><slot class="ew-slot" name="tpx_PayerType"></slot></td>
			<td><slot class="ew-slot" name="tpx_RefferedBy"></slot></td>
			<td></td>
		</tr>
		 <tr>
		 	<td><slot class="ew-slot" name="tpc_pharmacy_billing_transfer_DrID"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_billing_transfer_DrID"></slot></td>
			<td><slot class="ew-slot" name="tpx_Doctor"></slot></td>
			<td><slot class="ew-slot" name="tpx_DrDepartment"></slot></td>
		</tr>
	</tbody>
</table>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
</div>
<slot class="ew-slot" name="tpx_ReportHeader"></slot>
<div class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#D68910">
				<h3 class="card-title">Payment Details</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td><slot class="ew-slot" name="tpx_ModeofPayment"></slot></td>
			<td><slot class="ew-slot" name="tpx_Amount"></slot></td>
			<td><slot class="ew-slot" name="tpx_AnyDues"></slot></td>
		</tr>
		<tr>
			<td><slot class="ew-slot" name="tpx_DiscountRemarks"></slot></td>
			<td><slot class="ew-slot" name="tpx_Remarks"></slot></td>
			<td></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
<div id="viewBankName" class="row">
	<div class="col-12">
		<div class="card card-danger">
			<div class="card-header"  style="background-color:#E706B7">
				<h3 id="viewBankDetails" class="card-title">BankName</h3>
			</div>
			<div class="card-body">
<table class="ew-table">
	 <tbody>
		<tr>
			<td><slot class="ew-slot" name="tpx_CardNumber"></slot></td>
			<td><slot class="ew-slot" name="tpx_BankName"></slot></td>
		</tr>
	</tbody>
</table>
			</div>
		</div>
	</div>
</div>
</div>
</template>
<?php
    if (in_array("view_pharmacytransfer", explode(",", $Page->getCurrentDetailTable())) && $view_pharmacytransfer->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("view_pharmacytransfer", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "ViewPharmacytransferGrid.php" ?>
<?php } ?>
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
    ew.applyTemplate("tpd_pharmacy_billing_transferedit", "tpm_pharmacy_billing_transferedit", "pharmacy_billing_transferedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("pharmacy_billing_transfer");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

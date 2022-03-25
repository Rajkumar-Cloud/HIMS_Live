<?php

namespace PHPMaker2021\HIMS;

// Page object
$PharmacyPoEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpharmacy_poedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpharmacy_poedit = currentForm = new ew.Form("fpharmacy_poedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "pharmacy_po")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.pharmacy_po)
        ew.vars.tables.pharmacy_po = currentTable;
    fpharmacy_poedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["ORDNO", [fields.ORDNO.visible && fields.ORDNO.required ? ew.Validators.required(fields.ORDNO.caption) : null], fields.ORDNO.isInvalid],
        ["DT", [fields.DT.visible && fields.DT.required ? ew.Validators.required(fields.DT.caption) : null], fields.DT.isInvalid],
        ["YM", [fields.YM.visible && fields.YM.required ? ew.Validators.required(fields.YM.caption) : null], fields.YM.isInvalid],
        ["PC", [fields.PC.visible && fields.PC.required ? ew.Validators.required(fields.PC.caption) : null], fields.PC.isInvalid],
        ["Customercode", [fields.Customercode.visible && fields.Customercode.required ? ew.Validators.required(fields.Customercode.caption) : null], fields.Customercode.isInvalid],
        ["Customername", [fields.Customername.visible && fields.Customername.required ? ew.Validators.required(fields.Customername.caption) : null], fields.Customername.isInvalid],
        ["pharmacy_pocol", [fields.pharmacy_pocol.visible && fields.pharmacy_pocol.required ? ew.Validators.required(fields.pharmacy_pocol.caption) : null], fields.pharmacy_pocol.isInvalid],
        ["Address1", [fields.Address1.visible && fields.Address1.required ? ew.Validators.required(fields.Address1.caption) : null], fields.Address1.isInvalid],
        ["Address2", [fields.Address2.visible && fields.Address2.required ? ew.Validators.required(fields.Address2.caption) : null], fields.Address2.isInvalid],
        ["Address3", [fields.Address3.visible && fields.Address3.required ? ew.Validators.required(fields.Address3.caption) : null], fields.Address3.isInvalid],
        ["State", [fields.State.visible && fields.State.required ? ew.Validators.required(fields.State.caption) : null], fields.State.isInvalid],
        ["Pincode", [fields.Pincode.visible && fields.Pincode.required ? ew.Validators.required(fields.Pincode.caption) : null], fields.Pincode.isInvalid],
        ["Phone", [fields.Phone.visible && fields.Phone.required ? ew.Validators.required(fields.Phone.caption) : null], fields.Phone.isInvalid],
        ["Fax", [fields.Fax.visible && fields.Fax.required ? ew.Validators.required(fields.Fax.caption) : null], fields.Fax.isInvalid],
        ["EEmail", [fields.EEmail.visible && fields.EEmail.required ? ew.Validators.required(fields.EEmail.caption) : null], fields.EEmail.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["BRCODE", [fields.BRCODE.visible && fields.BRCODE.required ? ew.Validators.required(fields.BRCODE.caption) : null], fields.BRCODE.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpharmacy_poedit,
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
    fpharmacy_poedit.validate = function () {
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
    fpharmacy_poedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpharmacy_poedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpharmacy_poedit.lists.PC = <?= $Page->PC->toClientList($Page) ?>;
    fpharmacy_poedit.lists.BRCODE = <?= $Page->BRCODE->toClientList($Page) ?>;
    loadjs.done("fpharmacy_poedit");
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
<form name="fpharmacy_poedit" id="fpharmacy_poedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="pharmacy_po">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_pharmacy_po_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_pharmacy_po_id"><span id="el_pharmacy_po_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="pharmacy_po" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ORDNO->Visible) { // ORDNO ?>
    <div id="r_ORDNO" class="form-group row">
        <label id="elh_pharmacy_po_ORDNO" for="x_ORDNO" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_ORDNO"><?= $Page->ORDNO->caption() ?><?= $Page->ORDNO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ORDNO->cellAttributes() ?>>
<template id="tpx_pharmacy_po_ORDNO"><span id="el_pharmacy_po_ORDNO">
<span<?= $Page->ORDNO->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->ORDNO->getDisplayValue($Page->ORDNO->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="pharmacy_po" data-field="x_ORDNO" data-hidden="1" name="x_ORDNO" id="x_ORDNO" value="<?= HtmlEncode($Page->ORDNO->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DT->Visible) { // DT ?>
    <div id="r_DT" class="form-group row">
        <label id="elh_pharmacy_po_DT" for="x_DT" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_DT"><?= $Page->DT->caption() ?><?= $Page->DT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DT->cellAttributes() ?>>
<template id="tpx_pharmacy_po_DT"><span id="el_pharmacy_po_DT">
<input type="<?= $Page->DT->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_DT" data-format="7" name="x_DT" id="x_DT" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DT->getPlaceHolder()) ?>" value="<?= $Page->DT->EditValue ?>"<?= $Page->DT->editAttributes() ?> aria-describedby="x_DT_help">
<?= $Page->DT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DT->getErrorMessage() ?></div>
<?php if (!$Page->DT->ReadOnly && !$Page->DT->Disabled && !isset($Page->DT->EditAttrs["readonly"]) && !isset($Page->DT->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpharmacy_poedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpharmacy_poedit", "x_DT", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->YM->Visible) { // YM ?>
    <div id="r_YM" class="form-group row">
        <label id="elh_pharmacy_po_YM" for="x_YM" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_YM"><?= $Page->YM->caption() ?><?= $Page->YM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->YM->cellAttributes() ?>>
<template id="tpx_pharmacy_po_YM"><span id="el_pharmacy_po_YM">
<input type="<?= $Page->YM->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_YM" name="x_YM" id="x_YM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->YM->getPlaceHolder()) ?>" value="<?= $Page->YM->EditValue ?>"<?= $Page->YM->editAttributes() ?> aria-describedby="x_YM_help">
<?= $Page->YM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->YM->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PC->Visible) { // PC ?>
    <div id="r_PC" class="form-group row">
        <label id="elh_pharmacy_po_PC" for="x_PC" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_PC"><?= $Page->PC->caption() ?><?= $Page->PC->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PC->cellAttributes() ?>>
<template id="tpx_pharmacy_po_PC"><span id="el_pharmacy_po_PC">
<?php $Page->PC->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group ew-lookup-list" aria-describedby="x_PC_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PC"><?= EmptyValue(strval($Page->PC->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PC->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PC->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PC->ReadOnly || $Page->PC->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PC',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PC->getErrorMessage() ?></div>
<?= $Page->PC->getCustomMessage() ?>
<?= $Page->PC->Lookup->getParamTag($Page, "p_x_PC") ?>
<input type="hidden" is="selection-list" data-table="pharmacy_po" data-field="x_PC" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PC->displayValueSeparatorAttribute() ?>" name="x_PC" id="x_PC" value="<?= $Page->PC->CurrentValue ?>"<?= $Page->PC->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Customercode->Visible) { // Customercode ?>
    <div id="r_Customercode" class="form-group row">
        <label id="elh_pharmacy_po_Customercode" for="x_Customercode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_Customercode"><?= $Page->Customercode->caption() ?><?= $Page->Customercode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customercode->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Customercode"><span id="el_pharmacy_po_Customercode">
<input type="<?= $Page->Customercode->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_Customercode" name="x_Customercode" id="x_Customercode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customercode->getPlaceHolder()) ?>" value="<?= $Page->Customercode->EditValue ?>"<?= $Page->Customercode->editAttributes() ?> aria-describedby="x_Customercode_help">
<?= $Page->Customercode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Customercode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Customername->Visible) { // Customername ?>
    <div id="r_Customername" class="form-group row">
        <label id="elh_pharmacy_po_Customername" for="x_Customername" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_Customername"><?= $Page->Customername->caption() ?><?= $Page->Customername->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Customername->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Customername"><span id="el_pharmacy_po_Customername">
<input type="<?= $Page->Customername->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_Customername" name="x_Customername" id="x_Customername" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Customername->getPlaceHolder()) ?>" value="<?= $Page->Customername->EditValue ?>"<?= $Page->Customername->editAttributes() ?> aria-describedby="x_Customername_help">
<?= $Page->Customername->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Customername->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pharmacy_pocol->Visible) { // pharmacy_pocol ?>
    <div id="r_pharmacy_pocol" class="form-group row">
        <label id="elh_pharmacy_po_pharmacy_pocol" for="x_pharmacy_pocol" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_pharmacy_pocol"><?= $Page->pharmacy_pocol->caption() ?><?= $Page->pharmacy_pocol->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pharmacy_pocol->cellAttributes() ?>>
<template id="tpx_pharmacy_po_pharmacy_pocol"><span id="el_pharmacy_po_pharmacy_pocol">
<input type="<?= $Page->pharmacy_pocol->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_pharmacy_pocol" name="x_pharmacy_pocol" id="x_pharmacy_pocol" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->pharmacy_pocol->getPlaceHolder()) ?>" value="<?= $Page->pharmacy_pocol->EditValue ?>"<?= $Page->pharmacy_pocol->editAttributes() ?> aria-describedby="x_pharmacy_pocol_help">
<?= $Page->pharmacy_pocol->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pharmacy_pocol->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address1->Visible) { // Address1 ?>
    <div id="r_Address1" class="form-group row">
        <label id="elh_pharmacy_po_Address1" for="x_Address1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_Address1"><?= $Page->Address1->caption() ?><?= $Page->Address1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address1->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address1"><span id="el_pharmacy_po_Address1">
<input type="<?= $Page->Address1->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_Address1" name="x_Address1" id="x_Address1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Address1->getPlaceHolder()) ?>" value="<?= $Page->Address1->EditValue ?>"<?= $Page->Address1->editAttributes() ?> aria-describedby="x_Address1_help">
<?= $Page->Address1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address2->Visible) { // Address2 ?>
    <div id="r_Address2" class="form-group row">
        <label id="elh_pharmacy_po_Address2" for="x_Address2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_Address2"><?= $Page->Address2->caption() ?><?= $Page->Address2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address2->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address2"><span id="el_pharmacy_po_Address2">
<input type="<?= $Page->Address2->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_Address2" name="x_Address2" id="x_Address2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Address2->getPlaceHolder()) ?>" value="<?= $Page->Address2->EditValue ?>"<?= $Page->Address2->editAttributes() ?> aria-describedby="x_Address2_help">
<?= $Page->Address2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Address3->Visible) { // Address3 ?>
    <div id="r_Address3" class="form-group row">
        <label id="elh_pharmacy_po_Address3" for="x_Address3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_Address3"><?= $Page->Address3->caption() ?><?= $Page->Address3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Address3->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Address3"><span id="el_pharmacy_po_Address3">
<input type="<?= $Page->Address3->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_Address3" name="x_Address3" id="x_Address3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Address3->getPlaceHolder()) ?>" value="<?= $Page->Address3->EditValue ?>"<?= $Page->Address3->editAttributes() ?> aria-describedby="x_Address3_help">
<?= $Page->Address3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Address3->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->State->Visible) { // State ?>
    <div id="r_State" class="form-group row">
        <label id="elh_pharmacy_po_State" for="x_State" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_State"><?= $Page->State->caption() ?><?= $Page->State->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->State->cellAttributes() ?>>
<template id="tpx_pharmacy_po_State"><span id="el_pharmacy_po_State">
<input type="<?= $Page->State->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_State" name="x_State" id="x_State" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->State->getPlaceHolder()) ?>" value="<?= $Page->State->EditValue ?>"<?= $Page->State->editAttributes() ?> aria-describedby="x_State_help">
<?= $Page->State->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->State->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pincode->Visible) { // Pincode ?>
    <div id="r_Pincode" class="form-group row">
        <label id="elh_pharmacy_po_Pincode" for="x_Pincode" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_Pincode"><?= $Page->Pincode->caption() ?><?= $Page->Pincode->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pincode->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Pincode"><span id="el_pharmacy_po_Pincode">
<input type="<?= $Page->Pincode->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_Pincode" name="x_Pincode" id="x_Pincode" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pincode->getPlaceHolder()) ?>" value="<?= $Page->Pincode->EditValue ?>"<?= $Page->Pincode->editAttributes() ?> aria-describedby="x_Pincode_help">
<?= $Page->Pincode->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pincode->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Phone->Visible) { // Phone ?>
    <div id="r_Phone" class="form-group row">
        <label id="elh_pharmacy_po_Phone" for="x_Phone" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_Phone"><?= $Page->Phone->caption() ?><?= $Page->Phone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Phone->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Phone"><span id="el_pharmacy_po_Phone">
<input type="<?= $Page->Phone->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_Phone" name="x_Phone" id="x_Phone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Phone->getPlaceHolder()) ?>" value="<?= $Page->Phone->EditValue ?>"<?= $Page->Phone->editAttributes() ?> aria-describedby="x_Phone_help">
<?= $Page->Phone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Phone->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Fax->Visible) { // Fax ?>
    <div id="r_Fax" class="form-group row">
        <label id="elh_pharmacy_po_Fax" for="x_Fax" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_Fax"><?= $Page->Fax->caption() ?><?= $Page->Fax->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Fax->cellAttributes() ?>>
<template id="tpx_pharmacy_po_Fax"><span id="el_pharmacy_po_Fax">
<input type="<?= $Page->Fax->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_Fax" name="x_Fax" id="x_Fax" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Fax->getPlaceHolder()) ?>" value="<?= $Page->Fax->EditValue ?>"<?= $Page->Fax->editAttributes() ?> aria-describedby="x_Fax_help">
<?= $Page->Fax->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Fax->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EEmail->Visible) { // EEmail ?>
    <div id="r_EEmail" class="form-group row">
        <label id="elh_pharmacy_po_EEmail" for="x_EEmail" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_EEmail"><?= $Page->EEmail->caption() ?><?= $Page->EEmail->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EEmail->cellAttributes() ?>>
<template id="tpx_pharmacy_po_EEmail"><span id="el_pharmacy_po_EEmail">
<input type="<?= $Page->EEmail->getInputTextType() ?>" data-table="pharmacy_po" data-field="x_EEmail" name="x_EEmail" id="x_EEmail" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EEmail->getPlaceHolder()) ?>" value="<?= $Page->EEmail->EditValue ?>"<?= $Page->EEmail->editAttributes() ?> aria-describedby="x_EEmail_help">
<?= $Page->EEmail->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EEmail->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BRCODE->Visible) { // BRCODE ?>
    <div id="r_BRCODE" class="form-group row">
        <label id="elh_pharmacy_po_BRCODE" for="x_BRCODE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_pharmacy_po_BRCODE"><?= $Page->BRCODE->caption() ?><?= $Page->BRCODE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BRCODE->cellAttributes() ?>>
<template id="tpx_pharmacy_po_BRCODE"><span id="el_pharmacy_po_BRCODE">
    <select
        id="x_BRCODE"
        name="x_BRCODE"
        class="form-control ew-select<?= $Page->BRCODE->isInvalidClass() ?>"
        data-select2-id="pharmacy_po_x_BRCODE"
        data-table="pharmacy_po"
        data-field="x_BRCODE"
        data-value-separator="<?= $Page->BRCODE->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->BRCODE->getPlaceHolder()) ?>"
        <?= $Page->BRCODE->editAttributes() ?>>
        <?= $Page->BRCODE->selectOptionListHtml("x_BRCODE") ?>
    </select>
    <?= $Page->BRCODE->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->BRCODE->getErrorMessage() ?></div>
<?= $Page->BRCODE->Lookup->getParamTag($Page, "p_x_BRCODE") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='pharmacy_po_x_BRCODE']"),
        options = { name: "x_BRCODE", selectId: "pharmacy_po_x_BRCODE", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.pharmacy_po.fields.BRCODE.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_pharmacy_poedit" class="ew-custom-template"></div>
<template id="tpm_pharmacy_poedit">
<div id="ct_PharmacyPoEdit"><style>
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
		<h3 class="card-title"><slot class="ew-slot" name="tpc_pharmacy_po_ORDNO"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_ORDNO"></slot></h3>
	</div>
</div>
<div class="row">
	<div class="col-4">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Supplier</h3>
			</div>
			<div class="card-body">
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_BRCODE"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_BRCODE"></slot></span>
				  </div>
				 <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_PC"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_PC"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_DT"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_DT"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_YM"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_YM"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Customercode"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Customercode"></slot></span>
				  </div>
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Customername"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Customername"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Phone"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Phone"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>
	</div>
	<div class="col-8">
		<div class="card card-danger">
			<div class="card-header" style="background-color:#707B7C">
				<h3 class="card-title">Details</h3>
			</div>
			<div class="card-body">
				   <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Address1"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Address1"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Address2"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Address2"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Address3"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Address3"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_State"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_State"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Pincode"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Pincode"></slot></span>
				  </div>
				  <div class="ew-row">
					<span class="ew-cell"><slot class="ew-slot" name="tpc_pharmacy_po_Fax"></slot>&nbsp;<slot class="ew-slot" name="tpx_pharmacy_po_Fax"></slot></span>
				  </div>
			  <!-- /.card-body -->
			</div>
		</div>				
	</div>
</div>
</div>
</template>
<?php
    if (in_array("pharmacy_purchaseorder", explode(",", $Page->getCurrentDetailTable())) && $pharmacy_purchaseorder->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("pharmacy_purchaseorder", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PharmacyPurchaseorderGrid.php" ?>
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
    ew.applyTemplate("tpd_pharmacy_poedit", "tpm_pharmacy_poedit", "pharmacy_poedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("pharmacy_po");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

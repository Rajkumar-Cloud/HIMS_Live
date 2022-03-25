<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOpdFollowUpEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_opd_follow_upedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_opd_follow_upedit = currentForm = new ew.Form("fpatient_opd_follow_upedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_opd_follow_up")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_opd_follow_up)
        ew.vars.tables.patient_opd_follow_up = currentTable;
    fpatient_opd_follow_upedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["procedurenotes", [fields.procedurenotes.visible && fields.procedurenotes.required ? ew.Validators.required(fields.procedurenotes.caption) : null], fields.procedurenotes.isInvalid],
        ["NextReviewDate", [fields.NextReviewDate.visible && fields.NextReviewDate.required ? ew.Validators.required(fields.NextReviewDate.caption) : null, ew.Validators.datetime(7)], fields.NextReviewDate.isInvalid],
        ["ICSIAdvised", [fields.ICSIAdvised.visible && fields.ICSIAdvised.required ? ew.Validators.required(fields.ICSIAdvised.caption) : null], fields.ICSIAdvised.isInvalid],
        ["DeliveryRegistered", [fields.DeliveryRegistered.visible && fields.DeliveryRegistered.required ? ew.Validators.required(fields.DeliveryRegistered.caption) : null], fields.DeliveryRegistered.isInvalid],
        ["EDD", [fields.EDD.visible && fields.EDD.required ? ew.Validators.required(fields.EDD.caption) : null, ew.Validators.datetime(7)], fields.EDD.isInvalid],
        ["SerologyPositive", [fields.SerologyPositive.visible && fields.SerologyPositive.required ? ew.Validators.required(fields.SerologyPositive.caption) : null], fields.SerologyPositive.isInvalid],
        ["Allergy", [fields.Allergy.visible && fields.Allergy.required ? ew.Validators.required(fields.Allergy.caption) : null], fields.Allergy.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["LMP", [fields.LMP.visible && fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null, ew.Validators.datetime(7)], fields.LMP.isInvalid],
        ["Procedure", [fields.Procedure.visible && fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid],
        ["ProcedureDateTime", [fields.ProcedureDateTime.visible && fields.ProcedureDateTime.required ? ew.Validators.required(fields.ProcedureDateTime.caption) : null], fields.ProcedureDateTime.isInvalid],
        ["ICSIDate", [fields.ICSIDate.visible && fields.ICSIDate.required ? ew.Validators.required(fields.ICSIDate.caption) : null, ew.Validators.datetime(7)], fields.ICSIDate.isInvalid],
        ["PatientSearch", [fields.PatientSearch.visible && fields.PatientSearch.required ? ew.Validators.required(fields.PatientSearch.caption) : null], fields.PatientSearch.isInvalid],
        ["TemplateDrNotes", [fields.TemplateDrNotes.visible && fields.TemplateDrNotes.required ? ew.Validators.required(fields.TemplateDrNotes.caption) : null], fields.TemplateDrNotes.isInvalid],
        ["reportheader", [fields.reportheader.visible && fields.reportheader.required ? ew.Validators.required(fields.reportheader.caption) : null], fields.reportheader.isInvalid],
        ["Purpose", [fields.Purpose.visible && fields.Purpose.required ? ew.Validators.required(fields.Purpose.caption) : null], fields.Purpose.isInvalid],
        ["DrName", [fields.DrName.visible && fields.DrName.required ? ew.Validators.required(fields.DrName.caption) : null], fields.DrName.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_opd_follow_upedit,
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
    fpatient_opd_follow_upedit.validate = function () {
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
    fpatient_opd_follow_upedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_opd_follow_upedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_opd_follow_upedit.lists.ICSIAdvised = <?= $Page->ICSIAdvised->toClientList($Page) ?>;
    fpatient_opd_follow_upedit.lists.DeliveryRegistered = <?= $Page->DeliveryRegistered->toClientList($Page) ?>;
    fpatient_opd_follow_upedit.lists.SerologyPositive = <?= $Page->SerologyPositive->toClientList($Page) ?>;
    fpatient_opd_follow_upedit.lists.Allergy = <?= $Page->Allergy->toClientList($Page) ?>;
    fpatient_opd_follow_upedit.lists.status = <?= $Page->status->toClientList($Page) ?>;
    fpatient_opd_follow_upedit.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    fpatient_opd_follow_upedit.lists.TemplateDrNotes = <?= $Page->TemplateDrNotes->toClientList($Page) ?>;
    fpatient_opd_follow_upedit.lists.reportheader = <?= $Page->reportheader->toClientList($Page) ?>;
    fpatient_opd_follow_upedit.lists.DrName = <?= $Page->DrName->toClientList($Page) ?>;
    loadjs.done("fpatient_opd_follow_upedit");
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
<form name="fpatient_opd_follow_upedit" id="fpatient_opd_follow_upedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_opd_follow_up">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_opd_follow_up_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_id"><span id="el_patient_opd_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_opd_follow_up" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label id="elh_patient_opd_follow_up_procedurenotes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?><?= $Page->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_procedurenotes"><span id="el_patient_opd_follow_up_procedurenotes">
<?php $Page->procedurenotes->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="22" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>"<?= $Page->procedurenotes->editAttributes() ?> aria-describedby="x_procedurenotes_help"><?= $Page->procedurenotes->EditValue ?></textarea>
<?= $Page->procedurenotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_opd_follow_upedit", "editor"], function() {
	ew.createEditor("fpatient_opd_follow_upedit", "x_procedurenotes", 35, 22, <?= $Page->procedurenotes->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label id="elh_patient_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?><?= $Page->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_NextReviewDate"><span id="el_patient_opd_follow_up_NextReviewDate">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" size="10" maxlength="10" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?> aria-describedby="x_NextReviewDate_help">
<?= $Page->NextReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <div id="r_ICSIAdvised" class="form-group row">
        <label id="elh_patient_opd_follow_up_ICSIAdvised" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_ICSIAdvised"><?= $Page->ICSIAdvised->caption() ?><?= $Page->ICSIAdvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIAdvised->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ICSIAdvised"><span id="el_patient_opd_follow_up_ICSIAdvised">
<template id="tp_x_ICSIAdvised">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_ICSIAdvised" name="x_ICSIAdvised" id="x_ICSIAdvised"<?= $Page->ICSIAdvised->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_ICSIAdvised" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_ICSIAdvised[]"
    name="x_ICSIAdvised[]"
    value="<?= HtmlEncode($Page->ICSIAdvised->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_ICSIAdvised"
    data-target="dsl_x_ICSIAdvised"
    data-repeatcolumn="5"
    class="form-control<?= $Page->ICSIAdvised->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_ICSIAdvised"
    data-value-separator="<?= $Page->ICSIAdvised->displayValueSeparatorAttribute() ?>"
    <?= $Page->ICSIAdvised->editAttributes() ?>>
<?= $Page->ICSIAdvised->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIAdvised->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
    <div id="r_DeliveryRegistered" class="form-group row">
        <label id="elh_patient_opd_follow_up_DeliveryRegistered" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_DeliveryRegistered"><?= $Page->DeliveryRegistered->caption() ?><?= $Page->DeliveryRegistered->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_DeliveryRegistered"><span id="el_patient_opd_follow_up_DeliveryRegistered">
<template id="tp_x_DeliveryRegistered">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_DeliveryRegistered" name="x_DeliveryRegistered" id="x_DeliveryRegistered"<?= $Page->DeliveryRegistered->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_DeliveryRegistered" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_DeliveryRegistered[]"
    name="x_DeliveryRegistered[]"
    value="<?= HtmlEncode($Page->DeliveryRegistered->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_DeliveryRegistered"
    data-target="dsl_x_DeliveryRegistered"
    data-repeatcolumn="5"
    class="form-control<?= $Page->DeliveryRegistered->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_DeliveryRegistered"
    data-value-separator="<?= $Page->DeliveryRegistered->displayValueSeparatorAttribute() ?>"
    <?= $Page->DeliveryRegistered->editAttributes() ?>>
<?= $Page->DeliveryRegistered->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryRegistered->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <div id="r_EDD" class="form-group row">
        <label id="elh_patient_opd_follow_up_EDD" for="x_EDD" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_EDD"><?= $Page->EDD->caption() ?><?= $Page->EDD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_EDD"><span id="el_patient_opd_follow_up_EDD">
<input type="<?= $Page->EDD->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_EDD" data-format="7" name="x_EDD" id="x_EDD" placeholder="<?= HtmlEncode($Page->EDD->getPlaceHolder()) ?>" value="<?= $Page->EDD->EditValue ?>"<?= $Page->EDD->editAttributes() ?> aria-describedby="x_EDD_help">
<?= $Page->EDD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDD->getErrorMessage() ?></div>
<?php if (!$Page->EDD->ReadOnly && !$Page->EDD->Disabled && !isset($Page->EDD->EditAttrs["readonly"]) && !isset($Page->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
    <div id="r_SerologyPositive" class="form-group row">
        <label id="elh_patient_opd_follow_up_SerologyPositive" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_SerologyPositive"><?= $Page->SerologyPositive->caption() ?><?= $Page->SerologyPositive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerologyPositive->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_SerologyPositive"><span id="el_patient_opd_follow_up_SerologyPositive">
<template id="tp_x_SerologyPositive">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_SerologyPositive" name="x_SerologyPositive" id="x_SerologyPositive"<?= $Page->SerologyPositive->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_SerologyPositive" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_SerologyPositive[]"
    name="x_SerologyPositive[]"
    value="<?= HtmlEncode($Page->SerologyPositive->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_SerologyPositive"
    data-target="dsl_x_SerologyPositive"
    data-repeatcolumn="5"
    class="form-control<?= $Page->SerologyPositive->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_SerologyPositive"
    data-value-separator="<?= $Page->SerologyPositive->displayValueSeparatorAttribute() ?>"
    <?= $Page->SerologyPositive->editAttributes() ?>>
<?= $Page->SerologyPositive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerologyPositive->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
    <div id="r_Allergy" class="form-group row">
        <label id="elh_patient_opd_follow_up_Allergy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Allergy"><?= $Page->Allergy->caption() ?><?= $Page->Allergy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Allergy->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Allergy"><span id="el_patient_opd_follow_up_Allergy">
<?php
$onchange = $Page->Allergy->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Allergy->EditAttrs["onchange"] = "";
?>
<span id="as_x_Allergy" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Page->Allergy->getInputTextType() ?>" class="form-control" name="sv_x_Allergy" id="sv_x_Allergy" value="<?= RemoveHtml($Page->Allergy->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Allergy->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Allergy->getPlaceHolder()) ?>"<?= $Page->Allergy->editAttributes() ?> aria-describedby="x_Allergy_help">
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Allergy->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?= ($Page->Allergy->ReadOnly || $Page->Allergy->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_opd_follow_up" data-field="x_Allergy" data-input="sv_x_Allergy" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?= HtmlEncode($Page->Allergy->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Allergy->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Allergy->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_opd_follow_upedit"], function() {
    fpatient_opd_follow_upedit.createAutoSuggest(Object.assign({"id":"x_Allergy","forceSelect":false}, ew.vars.tables.patient_opd_follow_up.fields.Allergy.autoSuggestOptions));
});
</script>
<?= $Page->Allergy->Lookup->getParamTag($Page, "p_x_Allergy") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_opd_follow_up_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_status"><span id="el_patient_opd_follow_up_status">
    <select
        id="x_status"
        name="x_status"
        class="form-control ew-select<?= $Page->status->isInvalidClass() ?>"
        data-select2-id="patient_opd_follow_up_x_status"
        data-table="patient_opd_follow_up"
        data-field="x_status"
        data-value-separator="<?= $Page->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>"
        <?= $Page->status->editAttributes() ?>>
        <?= $Page->status->selectOptionListHtml("x_status") ?>
    </select>
    <?= $Page->status->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
<?= $Page->status->Lookup->getParamTag($Page, "p_x_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_opd_follow_up_x_status']"),
        options = { name: "x_status", selectId: "patient_opd_follow_up_x_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_opd_follow_up.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_patient_opd_follow_up_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_LMP"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_LMP"><span id="el_patient_opd_follow_up_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_LMP" data-format="7" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_patient_opd_follow_up_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Procedure"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Procedure"><span id="el_patient_opd_follow_up_Procedure">
<textarea data-table="patient_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help"><?= $Page->Procedure->EditValue ?></textarea>
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
    <div id="r_ProcedureDateTime" class="form-group row">
        <label id="elh_patient_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_ProcedureDateTime"><?= $Page->ProcedureDateTime->caption() ?><?= $Page->ProcedureDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ProcedureDateTime"><span id="el_patient_opd_follow_up_ProcedureDateTime">
<input type="<?= $Page->ProcedureDateTime->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ProcedureDateTime" data-format="11" name="x_ProcedureDateTime" id="x_ProcedureDateTime" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ProcedureDateTime->getPlaceHolder()) ?>" value="<?= $Page->ProcedureDateTime->EditValue ?>"<?= $Page->ProcedureDateTime->editAttributes() ?> aria-describedby="x_ProcedureDateTime_help">
<?= $Page->ProcedureDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ProcedureDateTime->ReadOnly && !$Page->ProcedureDateTime->Disabled && !isset($Page->ProcedureDateTime->EditAttrs["readonly"]) && !isset($Page->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <div id="r_ICSIDate" class="form-group row">
        <label id="elh_patient_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_ICSIDate"><?= $Page->ICSIDate->caption() ?><?= $Page->ICSIDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIDate->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_ICSIDate"><span id="el_patient_opd_follow_up_ICSIDate">
<input type="<?= $Page->ICSIDate->getInputTextType() ?>" data-table="patient_opd_follow_up" data-field="x_ICSIDate" data-format="7" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?= HtmlEncode($Page->ICSIDate->getPlaceHolder()) ?>" value="<?= $Page->ICSIDate->EditValue ?>"<?= $Page->ICSIDate->editAttributes() ?> aria-describedby="x_ICSIDate_help">
<?= $Page->ICSIDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIDate->getErrorMessage() ?></div>
<?php if (!$Page->ICSIDate->ReadOnly && !$Page->ICSIDate->Disabled && !isset($Page->ICSIDate->EditAttrs["readonly"]) && !isset($Page->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_opd_follow_upedit", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label id="elh_patient_opd_follow_up_PatientSearch" for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_PatientSearch"><?= $Page->PatientSearch->caption() ?><?= $Page->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_PatientSearch"><span id="el_patient_opd_follow_up_PatientSearch">
<div class="input-group ew-lookup-list" aria-describedby="x_PatientSearch_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage() ?></div>
<?= $Page->PatientSearch->getCustomMessage() ?>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_opd_follow_up" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->CurrentValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TemplateDrNotes->Visible) { // TemplateDrNotes ?>
    <div id="r_TemplateDrNotes" class="form-group row">
        <label id="elh_patient_opd_follow_up_TemplateDrNotes" for="x_TemplateDrNotes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_TemplateDrNotes"><?= $Page->TemplateDrNotes->caption() ?><?= $Page->TemplateDrNotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TemplateDrNotes->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_TemplateDrNotes"><span id="el_patient_opd_follow_up_TemplateDrNotes">
<?php $Page->TemplateDrNotes->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_TemplateDrNotes"
        name="x_TemplateDrNotes"
        class="form-control ew-select<?= $Page->TemplateDrNotes->isInvalidClass() ?>"
        data-select2-id="patient_opd_follow_up_x_TemplateDrNotes"
        data-table="patient_opd_follow_up"
        data-field="x_TemplateDrNotes"
        data-value-separator="<?= $Page->TemplateDrNotes->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->TemplateDrNotes->getPlaceHolder()) ?>"
        <?= $Page->TemplateDrNotes->editAttributes() ?>>
        <?= $Page->TemplateDrNotes->selectOptionListHtml("x_TemplateDrNotes") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$Page->TemplateDrNotes->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_TemplateDrNotes" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->TemplateDrNotes->caption() ?>" data-title="<?= $Page->TemplateDrNotes->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_TemplateDrNotes',url:'<?= GetUrl("MasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->TemplateDrNotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TemplateDrNotes->getErrorMessage() ?></div>
<?= $Page->TemplateDrNotes->Lookup->getParamTag($Page, "p_x_TemplateDrNotes") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_opd_follow_up_x_TemplateDrNotes']"),
        options = { name: "x_TemplateDrNotes", selectId: "patient_opd_follow_up_x_TemplateDrNotes", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_opd_follow_up.fields.TemplateDrNotes.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->reportheader->Visible) { // reportheader ?>
    <div id="r_reportheader" class="form-group row">
        <label id="elh_patient_opd_follow_up_reportheader" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_reportheader"><?= $Page->reportheader->caption() ?><?= $Page->reportheader->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->reportheader->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_reportheader"><span id="el_patient_opd_follow_up_reportheader">
<template id="tp_x_reportheader">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_opd_follow_up" data-field="x_reportheader" name="x_reportheader" id="x_reportheader"<?= $Page->reportheader->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x_reportheader" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x_reportheader[]"
    name="x_reportheader[]"
    value="<?= HtmlEncode($Page->reportheader->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x_reportheader"
    data-target="dsl_x_reportheader"
    data-repeatcolumn="5"
    class="form-control<?= $Page->reportheader->isInvalidClass() ?>"
    data-table="patient_opd_follow_up"
    data-field="x_reportheader"
    data-value-separator="<?= $Page->reportheader->displayValueSeparatorAttribute() ?>"
    <?= $Page->reportheader->editAttributes() ?>>
<?= $Page->reportheader->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->reportheader->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Purpose->Visible) { // Purpose ?>
    <div id="r_Purpose" class="form-group row">
        <label id="elh_patient_opd_follow_up_Purpose" for="x_Purpose" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_Purpose"><?= $Page->Purpose->caption() ?><?= $Page->Purpose->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Purpose->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_Purpose"><span id="el_patient_opd_follow_up_Purpose">
<textarea data-table="patient_opd_follow_up" data-field="x_Purpose" name="x_Purpose" id="x_Purpose" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Purpose->getPlaceHolder()) ?>"<?= $Page->Purpose->editAttributes() ?> aria-describedby="x_Purpose_help"><?= $Page->Purpose->EditValue ?></textarea>
<?= $Page->Purpose->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Purpose->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrName->Visible) { // DrName ?>
    <div id="r_DrName" class="form-group row">
        <label id="elh_patient_opd_follow_up_DrName" for="x_DrName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_opd_follow_up_DrName"><?= $Page->DrName->caption() ?><?= $Page->DrName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrName->cellAttributes() ?>>
<template id="tpx_patient_opd_follow_up_DrName"><span id="el_patient_opd_follow_up_DrName">
<div class="input-group ew-lookup-list" aria-describedby="x_DrName_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DrName"><?= EmptyValue(strval($Page->DrName->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->DrName->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->DrName->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->DrName->ReadOnly || $Page->DrName->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DrName',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->DrName->getErrorMessage() ?></div>
<?= $Page->DrName->getCustomMessage() ?>
<?= $Page->DrName->Lookup->getParamTag($Page, "p_x_DrName") ?>
<input type="hidden" is="selection-list" data-table="patient_opd_follow_up" data-field="x_DrName" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->DrName->displayValueSeparatorAttribute() ?>" name="x_DrName" id="x_DrName" value="<?= $Page->DrName->CurrentValue ?>"<?= $Page->DrName->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_opd_follow_upedit" class="ew-custom-template"></div>
<template id="tpm_patient_opd_follow_upedit">
<div id="ct_PatientOpdFollowUpEdit"><style>
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
.input-group {
	position: relative;
	display: flex;
	flex-wrap: nowrap;
	align-items: stretch;
	width: 100%;
}
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["id"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where id='".$Tid."'; ";
	$results1AA = $dbhelper->ExecuteRows($sql);
	$Tid = $results1AA[0]["PatientId"];
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results1[0]["profilePic"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results1 = $dbhelper->ExecuteRows($sql);
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$Tid."'; ";
	$results2 = $dbhelper->ExecuteRows($sql);
	if($results2[0]["profilePic"] == "")
	{
		$PatientProfilePic = "hims\profile-picture.png";
	}else{
		$PatientProfilePic = $results2[0]["profilePic"];
	}
	if($results1[0]["profilePic"] == "")
	{
		$PartnerProfilePic = "hims\profile-picture.png";
	}else{
		$PartnerProfilePic = $results1[0]["profilePic"];
	}
	?>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_PatientSearch"></slot>	
	<div class="row">
<div id="patientdataview" class="col-md-12">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span id="SemPatientId" class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span id="SemPatientPatientName" class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span id="SemPatientGender" class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span id="SemPatientBloodGroup" class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient"  class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				<div class="col-sm-4">
					<div class="description-block">
					  <h5 id="SemPatientEmail" class="description-header">MRN No : <?php echo $fk_mrnNo; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span id="SemPatientAge" class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 id="SemPatientMobile" class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
$Refferrr = getSRefer($results2[0]["id"]);
if($Refferrr != '')
{
	echo 'Referred By : ' . $Refferrr .'<br>';
}
?>
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_opd_follow_up_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_opd_follow_up_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_opd_follow_up_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_opd_follow_up_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_PatientId"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_opd_follow_up_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_opd_follow_up_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_opd_follow_up_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_opd_follow_up_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_opd_follow_up_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_MobileNumber"></slot></p> 
</div>
<slot class="ew-slot" name="tpc_patient_opd_follow_up_reportheader"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_reportheader"></slot>
<div class="row">
<slot class="ew-slot" name="tpc_patient_opd_follow_up_TemplateDrNotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_TemplateDrNotes"></slot>
</div>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_opd_follow_up_procedurenotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_procedurenotes"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			   <div class="row">
			  <div class="col-lg-4">
			  		<slot class="ew-slot" name="tpc_patient_opd_follow_up_NextReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_NextReviewDate"></slot>
			  </div>
			  <div class="col-lg-4">
			   		<slot class="ew-slot" name="tpc_patient_opd_follow_up_Purpose"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Purpose"></slot>
			   </div>
			   <div class="col-lg-4">
			   		<slot class="ew-slot" name="tpc_patient_opd_follow_up_DrName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_DrName"></slot>
			   </div>
			   </div>
			  <br>
			    <slot class="ew-slot" name="tpc_patient_opd_follow_up_Procedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Procedure"></slot> <br>
			      <slot class="ew-slot" name="tpc_patient_opd_follow_up_ProcedureDateTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_ProcedureDateTime"></slot> <br>
			   <slot class="ew-slot" name="tpc_patient_opd_follow_up_SerologyPositive"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_SerologyPositive"></slot> <br>
			    <slot class="ew-slot" name="tpc_patient_opd_follow_up_Allergy"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_Allergy"></slot> <br>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			  <slot class="ew-slot" name="tpc_patient_opd_follow_up_ICSIAdvised"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_ICSIAdvised"></slot> <br>
			  			  <slot class="ew-slot" name="tpc_patient_opd_follow_up_ICSIDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_ICSIDate"></slot> <br>
			   <slot class="ew-slot" name="tpc_patient_opd_follow_up_DeliveryRegistered"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_DeliveryRegistered"></slot> <br>
			    <slot class="ew-slot" name="tpc_patient_opd_follow_up_LMP"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_LMP"></slot> <br>
			    <slot class="ew-slot" name="tpc_patient_opd_follow_up_EDD"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_opd_follow_up_EDD"></slot> <br>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<?php
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
	$results1 = $dbhelper->ExecuteRows($sql);
	if($results1[0]["id"] == "")
	{
		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
	}else{
		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
	}	
?>
<div class="row">
		 <div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr>
							<td>
								<a href="<?php echo $vitalsURL; ?>" class="btn btn-sm btn-success float-left">Vitals</a>
							</td>
							<td>
								<a href="<?php echo $historyURL; ?>" class="btn btn-sm btn-warning float-left">History</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $provisionaldiagnosisURL; ?>" class="btn btn-sm btn-danger float-left">Provisional Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $prescriptionURL; ?>" class="btn btn-sm btn-info float-left">Prescription</a>
							</td>
						</tr>						
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">             
			  <div class="card-body">
			  		<table  style="width: 100%;"  class="ew-table">
			  			<tbody>
						<tr>
							<td>
								<a href="<?php echo $finaldiagnosisURL; ?>" class="btn btn-sm btn-success float-left">Final Diagnosis</a>
							</td>
							<td>
								<a href="<?php echo $followupURL; ?>" class="btn btn-sm btn-warning float-left">Follow Up</a>
							</td>
						</tr>
						<tr>
							<td>
								<a href="<?php echo $deliveryregisterURL; ?>" class="btn btn-sm btn-danger float-left">Delivery Register</a>
							</td>
							<td>
								<a href="<?php echo $surgeryregisterURL; ?>" class="btn btn-sm btn-info float-left">Surgery Register</a>
							</td>
						</tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</template>
<?php
    if (in_array("patient_an_registration", explode(",", $Page->getCurrentDetailTable())) && $patient_an_registration->DetailEdit) {
?>
<?php if ($Page->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?= $Language->tablePhrase("patient_an_registration", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "PatientAnRegistrationGrid.php" ?>
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
    ew.applyTemplate("tpd_patient_opd_follow_upedit", "tpm_patient_opd_follow_upedit", "patient_opd_follow_upedit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_opd_follow_up");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewOpdFollowUpEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_opd_follow_upedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fview_opd_follow_upedit = currentForm = new ew.Form("fview_opd_follow_upedit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_opd_follow_up")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_opd_follow_up)
        ew.vars.tables.view_opd_follow_up = currentTable;
    fview_opd_follow_upedit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Telephone", [fields.Telephone.visible && fields.Telephone.required ? ew.Validators.required(fields.Telephone.caption) : null], fields.Telephone.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["procedurenotes", [fields.procedurenotes.visible && fields.procedurenotes.required ? ew.Validators.required(fields.procedurenotes.caption) : null], fields.procedurenotes.isInvalid],
        ["NextReviewDate", [fields.NextReviewDate.visible && fields.NextReviewDate.required ? ew.Validators.required(fields.NextReviewDate.caption) : null, ew.Validators.datetime(0)], fields.NextReviewDate.isInvalid],
        ["ICSIAdvised", [fields.ICSIAdvised.visible && fields.ICSIAdvised.required ? ew.Validators.required(fields.ICSIAdvised.caption) : null], fields.ICSIAdvised.isInvalid],
        ["DeliveryRegistered", [fields.DeliveryRegistered.visible && fields.DeliveryRegistered.required ? ew.Validators.required(fields.DeliveryRegistered.caption) : null], fields.DeliveryRegistered.isInvalid],
        ["EDD", [fields.EDD.visible && fields.EDD.required ? ew.Validators.required(fields.EDD.caption) : null, ew.Validators.datetime(0)], fields.EDD.isInvalid],
        ["SerologyPositive", [fields.SerologyPositive.visible && fields.SerologyPositive.required ? ew.Validators.required(fields.SerologyPositive.caption) : null], fields.SerologyPositive.isInvalid],
        ["Allergy", [fields.Allergy.visible && fields.Allergy.required ? ew.Validators.required(fields.Allergy.caption) : null], fields.Allergy.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["LMP", [fields.LMP.visible && fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null, ew.Validators.datetime(0)], fields.LMP.isInvalid],
        ["Procedure", [fields.Procedure.visible && fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid],
        ["ProcedureDateTime", [fields.ProcedureDateTime.visible && fields.ProcedureDateTime.required ? ew.Validators.required(fields.ProcedureDateTime.caption) : null, ew.Validators.datetime(0)], fields.ProcedureDateTime.isInvalid],
        ["ICSIDate", [fields.ICSIDate.visible && fields.ICSIDate.required ? ew.Validators.required(fields.ICSIDate.caption) : null, ew.Validators.datetime(0)], fields.ICSIDate.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null], fields.RIDNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_opd_follow_upedit,
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
    fview_opd_follow_upedit.validate = function () {
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
    fview_opd_follow_upedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_opd_follow_upedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_opd_follow_upedit.lists.ICSIAdvised = <?= $Page->ICSIAdvised->toClientList($Page) ?>;
    fview_opd_follow_upedit.lists.DeliveryRegistered = <?= $Page->DeliveryRegistered->toClientList($Page) ?>;
    fview_opd_follow_upedit.lists.SerologyPositive = <?= $Page->SerologyPositive->toClientList($Page) ?>;
    fview_opd_follow_upedit.lists.Allergy = <?= $Page->Allergy->toClientList($Page) ?>;
    loadjs.done("fview_opd_follow_upedit");
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
<form name="fview_opd_follow_upedit" id="fview_opd_follow_upedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_view_opd_follow_up_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_view_opd_follow_up_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="view_opd_follow_up" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_view_opd_follow_up_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_view_opd_follow_up_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<span id="el_view_opd_follow_up_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_view_opd_follow_up_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_view_opd_follow_up_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_opd_follow_up_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_view_opd_follow_up_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
    <div id="r_Telephone" class="form-group row">
        <label id="elh_view_opd_follow_up_Telephone" for="x_Telephone" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Telephone->caption() ?><?= $Page->Telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Telephone->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Telephone">
<input type="<?= $Page->Telephone->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Telephone->getPlaceHolder()) ?>" value="<?= $Page->Telephone->EditValue ?>"<?= $Page->Telephone->editAttributes() ?> aria-describedby="x_Telephone_help">
<?= $Page->Telephone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Telephone->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_view_opd_follow_up_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_view_opd_follow_up_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_opd_follow_up_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_view_opd_follow_up_profilePic">
<textarea data-table="view_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label id="elh_view_opd_follow_up_procedurenotes" class="<?= $Page->LeftColumnClass ?>"><?= $Page->procedurenotes->caption() ?><?= $Page->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
<span id="el_view_opd_follow_up_procedurenotes">
<?php $Page->procedurenotes->EditAttrs->appendClass("editor"); ?>
<textarea data-table="view_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>"<?= $Page->procedurenotes->editAttributes() ?> aria-describedby="x_procedurenotes_help"><?= $Page->procedurenotes->EditValue ?></textarea>
<?= $Page->procedurenotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_opd_follow_upedit", "editor"], function() {
	ew.createEditor("fview_opd_follow_upedit", "x_procedurenotes", 35, 4, <?= $Page->procedurenotes->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label id="elh_view_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NextReviewDate->caption() ?><?= $Page->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
<span id="el_view_opd_follow_up_NextReviewDate">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?> aria-describedby="x_NextReviewDate_help">
<?= $Page->NextReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upedit", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <div id="r_ICSIAdvised" class="form-group row">
        <label id="elh_view_opd_follow_up_ICSIAdvised" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ICSIAdvised->caption() ?><?= $Page->ICSIAdvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIAdvised->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ICSIAdvised">
<template id="tp_x_ICSIAdvised">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_opd_follow_up" data-field="x_ICSIAdvised" name="x_ICSIAdvised" id="x_ICSIAdvised"<?= $Page->ICSIAdvised->editAttributes() ?>>
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
    data-table="view_opd_follow_up"
    data-field="x_ICSIAdvised"
    data-value-separator="<?= $Page->ICSIAdvised->displayValueSeparatorAttribute() ?>"
    <?= $Page->ICSIAdvised->editAttributes() ?>>
<?= $Page->ICSIAdvised->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIAdvised->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
    <div id="r_DeliveryRegistered" class="form-group row">
        <label id="elh_view_opd_follow_up_DeliveryRegistered" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeliveryRegistered->caption() ?><?= $Page->DeliveryRegistered->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<span id="el_view_opd_follow_up_DeliveryRegistered">
<template id="tp_x_DeliveryRegistered">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_opd_follow_up" data-field="x_DeliveryRegistered" name="x_DeliveryRegistered" id="x_DeliveryRegistered"<?= $Page->DeliveryRegistered->editAttributes() ?>>
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
    data-table="view_opd_follow_up"
    data-field="x_DeliveryRegistered"
    data-value-separator="<?= $Page->DeliveryRegistered->displayValueSeparatorAttribute() ?>"
    <?= $Page->DeliveryRegistered->editAttributes() ?>>
<?= $Page->DeliveryRegistered->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryRegistered->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <div id="r_EDD" class="form-group row">
        <label id="elh_view_opd_follow_up_EDD" for="x_EDD" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EDD->caption() ?><?= $Page->EDD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD->cellAttributes() ?>>
<span id="el_view_opd_follow_up_EDD">
<input type="<?= $Page->EDD->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_EDD" name="x_EDD" id="x_EDD" placeholder="<?= HtmlEncode($Page->EDD->getPlaceHolder()) ?>" value="<?= $Page->EDD->EditValue ?>"<?= $Page->EDD->editAttributes() ?> aria-describedby="x_EDD_help">
<?= $Page->EDD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDD->getErrorMessage() ?></div>
<?php if (!$Page->EDD->ReadOnly && !$Page->EDD->Disabled && !isset($Page->EDD->EditAttrs["readonly"]) && !isset($Page->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upedit", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
    <div id="r_SerologyPositive" class="form-group row">
        <label id="elh_view_opd_follow_up_SerologyPositive" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SerologyPositive->caption() ?><?= $Page->SerologyPositive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerologyPositive->cellAttributes() ?>>
<span id="el_view_opd_follow_up_SerologyPositive">
<template id="tp_x_SerologyPositive">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="view_opd_follow_up" data-field="x_SerologyPositive" name="x_SerologyPositive" id="x_SerologyPositive"<?= $Page->SerologyPositive->editAttributes() ?>>
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
    data-table="view_opd_follow_up"
    data-field="x_SerologyPositive"
    data-value-separator="<?= $Page->SerologyPositive->displayValueSeparatorAttribute() ?>"
    <?= $Page->SerologyPositive->editAttributes() ?>>
<?= $Page->SerologyPositive->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SerologyPositive->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
    <div id="r_Allergy" class="form-group row">
        <label id="elh_view_opd_follow_up_Allergy" for="x_Allergy" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Allergy->caption() ?><?= $Page->Allergy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Allergy->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Allergy">
<div class="input-group ew-lookup-list" aria-describedby="x_Allergy_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Allergy"><?= EmptyValue(strval($Page->Allergy->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->Allergy->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->Allergy->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->Allergy->ReadOnly || $Page->Allergy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Allergy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->Allergy->getErrorMessage() ?></div>
<?= $Page->Allergy->getCustomMessage() ?>
<?= $Page->Allergy->Lookup->getParamTag($Page, "p_x_Allergy") ?>
<input type="hidden" is="selection-list" data-table="view_opd_follow_up" data-field="x_Allergy" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->Allergy->displayValueSeparatorAttribute() ?>" name="x_Allergy" id="x_Allergy" value="<?= $Page->Allergy->CurrentValue ?>"<?= $Page->Allergy->editAttributes() ?>>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_view_opd_follow_up_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_view_opd_follow_up_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_view_opd_follow_up_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<span id="el_view_opd_follow_up_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_LMP" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upedit", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_view_opd_follow_up_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<span id="el_view_opd_follow_up_Procedure">
<textarea data-table="view_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help"><?= $Page->Procedure->EditValue ?></textarea>
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
    <div id="r_ProcedureDateTime" class="form-group row">
        <label id="elh_view_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ProcedureDateTime->caption() ?><?= $Page->ProcedureDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ProcedureDateTime">
<input type="<?= $Page->ProcedureDateTime->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_ProcedureDateTime" name="x_ProcedureDateTime" id="x_ProcedureDateTime" placeholder="<?= HtmlEncode($Page->ProcedureDateTime->getPlaceHolder()) ?>" value="<?= $Page->ProcedureDateTime->EditValue ?>"<?= $Page->ProcedureDateTime->editAttributes() ?> aria-describedby="x_ProcedureDateTime_help">
<?= $Page->ProcedureDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ProcedureDateTime->ReadOnly && !$Page->ProcedureDateTime->Disabled && !isset($Page->ProcedureDateTime->EditAttrs["readonly"]) && !isset($Page->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upedit", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <div id="r_ICSIDate" class="form-group row">
        <label id="elh_view_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ICSIDate->caption() ?><?= $Page->ICSIDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIDate->cellAttributes() ?>>
<span id="el_view_opd_follow_up_ICSIDate">
<input type="<?= $Page->ICSIDate->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_ICSIDate" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?= HtmlEncode($Page->ICSIDate->getPlaceHolder()) ?>" value="<?= $Page->ICSIDate->EditValue ?>"<?= $Page->ICSIDate->editAttributes() ?> aria-describedby="x_ICSIDate_help">
<?= $Page->ICSIDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIDate->getErrorMessage() ?></div>
<?php if (!$Page->ICSIDate->ReadOnly && !$Page->ICSIDate->Disabled && !isset($Page->ICSIDate->EditAttrs["readonly"]) && !isset($Page->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upedit", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upedit", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_view_opd_follow_up_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<span id="el_view_opd_follow_up_RIDNo">
<textarea data-table="view_opd_follow_up" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help"><?= $Page->RIDNo->EditValue ?></textarea>
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
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
    ew.addEventHandlers("view_opd_follow_up");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

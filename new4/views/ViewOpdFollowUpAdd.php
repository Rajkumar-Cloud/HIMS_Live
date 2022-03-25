<?php

namespace PHPMaker2021\HIMS;

// Page object
$ViewOpdFollowUpAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fview_opd_follow_upadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fview_opd_follow_upadd = currentForm = new ew.Form("fview_opd_follow_upadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "view_opd_follow_up")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.view_opd_follow_up)
        ew.vars.tables.view_opd_follow_up = currentTable;
    fview_opd_follow_upadd.addFields([
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
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["LMP", [fields.LMP.visible && fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null, ew.Validators.datetime(0)], fields.LMP.isInvalid],
        ["Procedure", [fields.Procedure.visible && fields.Procedure.required ? ew.Validators.required(fields.Procedure.caption) : null], fields.Procedure.isInvalid],
        ["ProcedureDateTime", [fields.ProcedureDateTime.visible && fields.ProcedureDateTime.required ? ew.Validators.required(fields.ProcedureDateTime.caption) : null, ew.Validators.datetime(0)], fields.ProcedureDateTime.isInvalid],
        ["ICSIDate", [fields.ICSIDate.visible && fields.ICSIDate.required ? ew.Validators.required(fields.ICSIDate.caption) : null, ew.Validators.datetime(0)], fields.ICSIDate.isInvalid],
        ["RIDNo", [fields.RIDNo.visible && fields.RIDNo.required ? ew.Validators.required(fields.RIDNo.caption) : null], fields.RIDNo.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fview_opd_follow_upadd,
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
    fview_opd_follow_upadd.validate = function () {
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
    fview_opd_follow_upadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fview_opd_follow_upadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fview_opd_follow_upadd.lists.ICSIAdvised = <?= $Page->ICSIAdvised->toClientList($Page) ?>;
    fview_opd_follow_upadd.lists.DeliveryRegistered = <?= $Page->DeliveryRegistered->toClientList($Page) ?>;
    fview_opd_follow_upadd.lists.SerologyPositive = <?= $Page->SerologyPositive->toClientList($Page) ?>;
    fview_opd_follow_upadd.lists.Allergy = <?= $Page->Allergy->toClientList($Page) ?>;
    loadjs.done("fview_opd_follow_upadd");
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
<form name="fview_opd_follow_upadd" id="fview_opd_follow_upadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="view_opd_follow_up">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_view_opd_follow_up_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_Reception"><span id="el_view_opd_follow_up_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_view_opd_follow_up_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_PatientId"><span id="el_view_opd_follow_up_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_view_opd_follow_up_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_mrnno"><span id="el_view_opd_follow_up_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_view_opd_follow_up_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_PatientName"><span id="el_view_opd_follow_up_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Telephone->Visible) { // Telephone ?>
    <div id="r_Telephone" class="form-group row">
        <label id="elh_view_opd_follow_up_Telephone" for="x_Telephone" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_Telephone"><?= $Page->Telephone->caption() ?><?= $Page->Telephone->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Telephone->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_Telephone"><span id="el_view_opd_follow_up_Telephone">
<input type="<?= $Page->Telephone->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_Telephone" name="x_Telephone" id="x_Telephone" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Telephone->getPlaceHolder()) ?>" value="<?= $Page->Telephone->EditValue ?>"<?= $Page->Telephone->editAttributes() ?> aria-describedby="x_Telephone_help">
<?= $Page->Telephone->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Telephone->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_view_opd_follow_up_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_Age"><span id="el_view_opd_follow_up_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_view_opd_follow_up_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_Gender"><span id="el_view_opd_follow_up_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_view_opd_follow_up_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_profilePic"><span id="el_view_opd_follow_up_profilePic">
<textarea data-table="view_opd_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label id="elh_view_opd_follow_up_procedurenotes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?><?= $Page->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_procedurenotes"><span id="el_view_opd_follow_up_procedurenotes">
<?php $Page->procedurenotes->EditAttrs->appendClass("editor"); ?>
<textarea data-table="view_opd_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>"<?= $Page->procedurenotes->editAttributes() ?> aria-describedby="x_procedurenotes_help"><?= $Page->procedurenotes->EditValue ?></textarea>
<?= $Page->procedurenotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage() ?></div>
<script>
loadjs.ready(["fview_opd_follow_upadd", "editor"], function() {
	ew.createEditor("fview_opd_follow_upadd", "x_procedurenotes", 35, 4, <?= $Page->procedurenotes->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label id="elh_view_opd_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?><?= $Page->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_NextReviewDate"><span id="el_view_opd_follow_up_NextReviewDate">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_NextReviewDate" name="x_NextReviewDate" id="x_NextReviewDate" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?> aria-describedby="x_NextReviewDate_help">
<?= $Page->NextReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upadd", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIAdvised->Visible) { // ICSIAdvised ?>
    <div id="r_ICSIAdvised" class="form-group row">
        <label id="elh_view_opd_follow_up_ICSIAdvised" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_ICSIAdvised"><?= $Page->ICSIAdvised->caption() ?><?= $Page->ICSIAdvised->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIAdvised->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_ICSIAdvised"><span id="el_view_opd_follow_up_ICSIAdvised">
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryRegistered->Visible) { // DeliveryRegistered ?>
    <div id="r_DeliveryRegistered" class="form-group row">
        <label id="elh_view_opd_follow_up_DeliveryRegistered" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_DeliveryRegistered"><?= $Page->DeliveryRegistered->caption() ?><?= $Page->DeliveryRegistered->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryRegistered->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_DeliveryRegistered"><span id="el_view_opd_follow_up_DeliveryRegistered">
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDD->Visible) { // EDD ?>
    <div id="r_EDD" class="form-group row">
        <label id="elh_view_opd_follow_up_EDD" for="x_EDD" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_EDD"><?= $Page->EDD->caption() ?><?= $Page->EDD->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDD->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_EDD"><span id="el_view_opd_follow_up_EDD">
<input type="<?= $Page->EDD->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_EDD" name="x_EDD" id="x_EDD" placeholder="<?= HtmlEncode($Page->EDD->getPlaceHolder()) ?>" value="<?= $Page->EDD->EditValue ?>"<?= $Page->EDD->editAttributes() ?> aria-describedby="x_EDD_help">
<?= $Page->EDD->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDD->getErrorMessage() ?></div>
<?php if (!$Page->EDD->ReadOnly && !$Page->EDD->Disabled && !isset($Page->EDD->EditAttrs["readonly"]) && !isset($Page->EDD->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upadd", "x_EDD", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SerologyPositive->Visible) { // SerologyPositive ?>
    <div id="r_SerologyPositive" class="form-group row">
        <label id="elh_view_opd_follow_up_SerologyPositive" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_SerologyPositive"><?= $Page->SerologyPositive->caption() ?><?= $Page->SerologyPositive->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SerologyPositive->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_SerologyPositive"><span id="el_view_opd_follow_up_SerologyPositive">
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Allergy->Visible) { // Allergy ?>
    <div id="r_Allergy" class="form-group row">
        <label id="elh_view_opd_follow_up_Allergy" for="x_Allergy" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_Allergy"><?= $Page->Allergy->caption() ?><?= $Page->Allergy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Allergy->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_Allergy"><span id="el_view_opd_follow_up_Allergy">
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
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_view_opd_follow_up_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_status"><span id="el_view_opd_follow_up_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_view_opd_follow_up_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_LMP"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_LMP"><span id="el_view_opd_follow_up_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_LMP" name="x_LMP" id="x_LMP" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
<?php if (!$Page->LMP->ReadOnly && !$Page->LMP->Disabled && !isset($Page->LMP->EditAttrs["readonly"]) && !isset($Page->LMP->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upadd", "x_LMP", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Procedure->Visible) { // Procedure ?>
    <div id="r_Procedure" class="form-group row">
        <label id="elh_view_opd_follow_up_Procedure" for="x_Procedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_Procedure"><?= $Page->Procedure->caption() ?><?= $Page->Procedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Procedure->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_Procedure"><span id="el_view_opd_follow_up_Procedure">
<textarea data-table="view_opd_follow_up" data-field="x_Procedure" name="x_Procedure" id="x_Procedure" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Procedure->getPlaceHolder()) ?>"<?= $Page->Procedure->editAttributes() ?> aria-describedby="x_Procedure_help"><?= $Page->Procedure->EditValue ?></textarea>
<?= $Page->Procedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Procedure->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ProcedureDateTime->Visible) { // ProcedureDateTime ?>
    <div id="r_ProcedureDateTime" class="form-group row">
        <label id="elh_view_opd_follow_up_ProcedureDateTime" for="x_ProcedureDateTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_ProcedureDateTime"><?= $Page->ProcedureDateTime->caption() ?><?= $Page->ProcedureDateTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ProcedureDateTime->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_ProcedureDateTime"><span id="el_view_opd_follow_up_ProcedureDateTime">
<input type="<?= $Page->ProcedureDateTime->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_ProcedureDateTime" name="x_ProcedureDateTime" id="x_ProcedureDateTime" placeholder="<?= HtmlEncode($Page->ProcedureDateTime->getPlaceHolder()) ?>" value="<?= $Page->ProcedureDateTime->EditValue ?>"<?= $Page->ProcedureDateTime->editAttributes() ?> aria-describedby="x_ProcedureDateTime_help">
<?= $Page->ProcedureDateTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ProcedureDateTime->getErrorMessage() ?></div>
<?php if (!$Page->ProcedureDateTime->ReadOnly && !$Page->ProcedureDateTime->Disabled && !isset($Page->ProcedureDateTime->EditAttrs["readonly"]) && !isset($Page->ProcedureDateTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upadd", "x_ProcedureDateTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ICSIDate->Visible) { // ICSIDate ?>
    <div id="r_ICSIDate" class="form-group row">
        <label id="elh_view_opd_follow_up_ICSIDate" for="x_ICSIDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_ICSIDate"><?= $Page->ICSIDate->caption() ?><?= $Page->ICSIDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ICSIDate->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_ICSIDate"><span id="el_view_opd_follow_up_ICSIDate">
<input type="<?= $Page->ICSIDate->getInputTextType() ?>" data-table="view_opd_follow_up" data-field="x_ICSIDate" name="x_ICSIDate" id="x_ICSIDate" placeholder="<?= HtmlEncode($Page->ICSIDate->getPlaceHolder()) ?>" value="<?= $Page->ICSIDate->EditValue ?>"<?= $Page->ICSIDate->editAttributes() ?> aria-describedby="x_ICSIDate_help">
<?= $Page->ICSIDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ICSIDate->getErrorMessage() ?></div>
<?php if (!$Page->ICSIDate->ReadOnly && !$Page->ICSIDate->Disabled && !isset($Page->ICSIDate->EditAttrs["readonly"]) && !isset($Page->ICSIDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fview_opd_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fview_opd_follow_upadd", "x_ICSIDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RIDNo->Visible) { // RIDNo ?>
    <div id="r_RIDNo" class="form-group row">
        <label id="elh_view_opd_follow_up_RIDNo" for="x_RIDNo" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_view_opd_follow_up_RIDNo"><?= $Page->RIDNo->caption() ?><?= $Page->RIDNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RIDNo->cellAttributes() ?>>
<template id="tpx_view_opd_follow_up_RIDNo"><span id="el_view_opd_follow_up_RIDNo">
<textarea data-table="view_opd_follow_up" data-field="x_RIDNo" name="x_RIDNo" id="x_RIDNo" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->RIDNo->getPlaceHolder()) ?>"<?= $Page->RIDNo->editAttributes() ?> aria-describedby="x_RIDNo_help"><?= $Page->RIDNo->EditValue ?></textarea>
<?= $Page->RIDNo->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RIDNo->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_view_opd_follow_upadd" class="ew-custom-template"></div>
<template id="tpm_view_opd_follow_upadd">
<div id="ct_ViewOpdFollowUpAdd"><style>
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
<?php
$cid = $_GET["fk_id"] ;
$IVFid = $_GET["fk_RIDNO"] ;
$dbhelper = &DbHelper();
$sql = "SELECT * FROM ganeshkumar_bjhims.ivf where id='".$IVFid."'; ";
$results = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Male"]."'; ";
$results1 = $dbhelper->ExecuteRows($sql);
$sql = "SELECT * FROM ganeshkumar_bjhims.patient where id='".$results[0]["Female"]."'; ";
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
Couple ID : <?php echo $results[0]["CoupleID"]; ?>
<div class="row">
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Patient Id : <?php echo $results2[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Patient Name : <?php echo $results2[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results2[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results2[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PatientProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results2[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results2[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results2[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
<div class="col-md-6">
			<!-- Widget: user widget style 1 -->
			<div class="card card-widget widget-user">
			  <!-- Add the bg color to the header using any of the bg-* classes -->
			  <div class="widget-user-header bg-warning">
			  	<h4 class="widget-user-username"><span class="ew-cell">Partner Id : <?php echo $results1[0]["PatientID"]; ?></span></h4>
				<h4 class="widget-user-username"><span class="ew-cell">Partner Name :<?php echo $results1[0]["first_name"]; ?></span></h4>
				<h6 class="widget-user-desc"><span class="ew-cell">Gender : <?php echo $results1[0]["gender"]; ?></span></h6>	
				<h6 class="widget-user-desc"><span class="ew-cell">Blood Group : <?php echo $results1[0]["blood_group"]; ?></span></h6>
			  </div>
			  <div class="widget-user-image">
			   		<img id="profilePicturePatient" class="img-circle elevation-2" src='<?php echo "uploads/".$PartnerProfilePic; ?>' alt="User Avatar"> 
			  </div>
			  <div class="card-footer">
				<div class="row">
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header"><span class="ew-cell">Age : <?php echo AgeCalculationb($results1[0]["dob"]); ?></span></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4 border-right">
					<div class="description-block">
					  <h5 class="description-header">Mobile : <?php echo $results1[0]["mobile_no"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				  <div class="col-sm-4">
					<div class="description-block">
					  <h5 class="description-header">Email : <?php echo $results1[0]["PEmail"]; ?></h5>
					</div>
					<!-- /.description-block -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			</div>
			<!-- /.widget-user -->
</div>
</div>
<?php
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_vitals_history where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$VitalsHistory = $dbhelper->ExecuteRows($sql);
	$VitalsHistoryRowCount = count($VitalsHistory);
	if($VitalsHistoryRowCount > 0)
	{
		if($cid == $VitalsHistory[$VitalsHistoryRowCount-1]["TidNo"])
		{
			$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";  // ---- view
		}else{
			$kk = 0;
			for ($x = 0; $x < $VitalsHistoryRowCount; $x++) {
				if($cid == $VitalsHistory[$x]["TidNo"])
				{
					$kk = 1;
					$VitalsHistoryUrl = "ivf_vitals_historyview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$x]["id"]."";  // ---- view
				}
			}
			if($kk == 0)
			{
				$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$VitalsHistory[$VitalsHistoryRowCount-1]["id"]."";
			}
		}
	}else{
		$VitalsHistoryUrl = "ivf_vitals_historyadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}
	$opurl = "view_opd_follow_upadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_et_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivf_et_chart = $dbhelper->ExecuteRows($sql);
	$Vivf_et_chartRowCount = count($ivf_et_chart);
	if($ivf_et_chart == false)
	{
		$Etcountwarn = "";
		$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($Vivf_et_chartRowCount > 0)
		{
			$Etcountwarn ='<span class="badge bg-warning">'.$Vivf_et_chartRowCount.'</span>';
			if($cid == $ivf_et_chart[$Vivf_et_chartRowCount-1]["TidNo"])
			{
				$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $Vivf_et_chartRowCount; $x++) {
					if($cid == $ivf_et_chart[$x]["TidNo"])
					{
						$kk = 1;
						$ivf_et_chartUrl = "ivf_et_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivf_et_chart[$Vivf_et_chartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivf_et_chartUrl = "ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
	//http://localhost:1445/ivf_et_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_art_summary where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfartsummary = $dbhelper->ExecuteRows($sql);
	$ivfartsummaryRowCount = count($ivfartsummary);
	if($ivfartsummary == false)
	{
		$ivfartsummarycountwarn = "";
		$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfartsummaryRowCount > 0)
		{
			$ivfartsummarycountwarn ='<span class="badge bg-warning">'.$ivfartsummaryRowCount.'</span>';
			if($cid == $ivfartsummary[$ivfartsummaryRowCount-1]["TidNo"])
			{
				$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfartsummaryRowCount; $x++) {
					if($cid == $ivfartsummary[$x]["TidNo"])
					{
						$kk = 1;
						$ivfartsummaryUrl = "ivf_art_summaryview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfartsummary[$ivfartsummaryRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfartsummaryUrl = "ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_art_summaryadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_Name=597&fk_RIDNO=11
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_stimulation_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfstimulationchart = $dbhelper->ExecuteRows($sql);
	$ivfstimulationchartRowCount = count($ivfstimulationchart);
	if($ivfstimulationchart == false)
	{
		$ivfstimulationchartwarn = "";
		$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($VitalsHistoryRowCount > 0)
		{
			$ivfstimulationchartwarn ='<span class="badge bg-warning">'.$VitalsHistoryRowCount.'</span>';
			if($cid == $ivfstimulationchart[$ivfstimulationchartRowCount-1]["TidNo"])
			{
				$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfstimulationchartRowCount; $x++) {
					if($cid == $ivfstimulationchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfstimulationchartUrl = "ivf_stimulation_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfstimulationchart[$ivfstimulationchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfstimulationchartUrl = "ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_stimulation_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_semenanalysisreport where RIDNo='".$IVFid."' and PatientName='".$results2[0]["id"]."' ;";
	$ivfsemenanalysisreport = $dbhelper->ExecuteRows($sql);
	$ivfsemenanalysisreportRowCount = count($ivfsemenanalysisreport);
	if($ivfsemenanalysisreport == false)
	{
		$ivfsemenanalysisreportwarn = "";
		$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfsemenanalysisreportRowCount > 0)
		{
			$ivfsemenanalysisreportwarn ='<span class="badge bg-warning">'.$ivfsemenanalysisreportRowCount.'</span>';
			if($cid == $ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["TidNo"])
			{
				$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfsemenanalysisreportRowCount; $x++) {
					if($cid == $ivfsemenanalysisreport[$x]["TidNo"])
					{
						$kk = 1;
						$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfsemenanalysisreport[$ivfsemenanalysisreportRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfsemenanalysisreportUrl = "ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_semenanalysisreportadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_ovum_pick_up_chart where RIDNo='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfovumpickupchart = $dbhelper->ExecuteRows($sql);
	$ivfovumpickupchartRowCount = count($ivfovumpickupchart);
	if($ivfovumpickupchart == false)
	{
		$ivfovumpickupchartwarn = "";
		$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfovumpickupchartRowCount > 0)
		{
			$ivfovumpickupchartwarn ='<span class="badge bg-warning">'.$ivfovumpickupchartRowCount.'</span>';
			if($cid == $ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["TidNo"])
			{
				$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfovumpickupchartRowCount; $x++) {
					if($cid == $ivfovumpickupchart[$x]["TidNo"])
					{
						$kk = 1;
						$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfovumpickupchart[$ivfovumpickupchartRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfovumpickupchartUrl = "ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
   // http://localhost:1445/ivf_ovum_pick_up_chartadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$sql = "SELECT * FROM ganeshkumar_bjhims.ivf_otherprocedure where RIDNO='".$IVFid."' and Name='".$results2[0]["id"]."' ;";
	$ivfotherprocedure = $dbhelper->ExecuteRows($sql);
	$ivfotherprocedureRowCount = count($ivfotherprocedure);
	if($ivfotherprocedure == false)
	{
		$ivfotherprocedurewarn = "";
		$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	}else{
		if($ivfotherprocedureRowCount > 0)
		{
			$ivfotherprocedurewarn ='<span class="badge bg-warning">'.$ivfotherprocedureRowCount.'</span>';
			if($cid == $ivfotherprocedure[$ivfotherprocedureRowCount-1]["TidNo"])
			{
				$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";  // ---- view
			}else{
				$kk = 0;
				for ($x = 0; $x < $ivfotherprocedureRowCount; $x++) {
					if($cid == $ivfotherprocedure[$x]["TidNo"])
					{
						$kk = 1;
						$ivfotherprocedureUrl = "ivf_otherprocedureview.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$x]["id"]."";  // ---- view
					}
				}
				if($kk == 0)
				{
					$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."&id=".$ivfotherprocedure[$ivfotherprocedureRowCount-1]["id"]."";
				}
			}
		}else{
			$ivfotherprocedureUrl = "ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
		}
	}
  //  http://localhost:1445/ivf_otherprocedureadd.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$ivfembryologychartlistUrl = "ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";   // ---- new add
	//http://localhost:1445/ivf_embryology_chartlist.php?showmaster=ivf_treatment_plan&fk_RIDNO=11&fk_Name=597&fk_id=1
	$patientserviceslistUrl = "patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_id=".$cid."&fk_RIDNO=".$IVFid."&fk_Name=".$results2[0]["id"]."";
	//http://localhost:1445/patient_serviceslist.php?showmaster=ivf_treatment_plan&fk_Name=597&fk_RIDNO=11&fk_id=1
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	//http://localhost:1445/ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_id=1&fk_RIDNO=11&fk_Name=597
	$followupurl = "ivf_follow_up_trackingadd.php?showmaster=ivf_treatment_plan&fk_Name=".$results2[0]["id"]."&fk_id=".$cid."&fk_RIDNO=".$IVFid."";
	$TrPlanurl = "ivf_treatment_planview.php?showdetail=&id=".$cid."&showmaster=ivf&fk_id=".$IVFid."&fk_Female=".$results2[0]["id"]."";
	//http://localhost:1445/ivf_treatment_planview.php?showdetail=&id=1&showmaster=ivf&fk_id=11&fk_Female=597
?>
		<div class="card">
			  <div class="card-header">
				<h3 class="card-title">Application Buttons</h3>
			  </div>
			  <div class="card-body">
				<a class="btn btn-app" href="patientview.php?showdetail=&id=<?php echo $results2[0]["id"]; ?>">
				  <i class="fas fa-female"></i> Patient
				</a>
				<a class="btn btn-app"  href="patientview.php?showdetail=&id=<?php echo $results1[0]["id"]; ?>">
				  <i class="fas fa-male"></i> Partner
				</a>
				<a class="btn btn-app" href="<?php echo $VitalsHistoryUrl; ?>">
				  <span class="badge bg-warning"><?php echo $$VitalsHistorywarn; ?></span>
				  <i class="fas fa-thermometer-full"></i> Vitals & History
				</a>
				<a class="btn btn-app" href="<?php echo $opurl; ?>">
				  <i class="fas fa-pencil-square-o"></i> OP
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfTreatmentwarnUrl; ?>">
					<i class="fas fa-sticky-note "></i> Treatment
				</a>	  
				<a class="btn btn-app"  href="<?php echo $ivfstimulationchartUrl; ?>">
							<?php echo $ivfstimulationchartwarn; ?>
				  <i class="fas fa-sticky-note "></i> Stimulation
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfovumpickupchartUrl; ?>">
							<?php echo $ivfovumpickupchartwarn; ?>
				  <i class="fas fa-object-group"></i> Ovum Pick Up
				</a>
				<a class="btn btn-app"  href="<?php echo $ivf_et_chartUrl; ?>">
					<?php echo $Etcountwarn; ?>
				  <i class="fas fa-globe"></i> ET
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfsemenanalysisreportUrl; ?>">
							<?php echo $ivfsemenanalysisreportwarn; ?>
				  <i class="fas fa-puzzle-piece"></i> Semen Analysis
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfembryologychartlistUrl; ?>">
				  <i class="fas fa-bullseye"></i> Embryology 
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfotherprocedureUrl; ?>">
							<?php echo $ivfotherprocedurewarn; ?>
				  <i class="fas fa-life-ring"></i> Other Procedure
				</a>
				<a class="btn btn-app"  href="<?php echo $followupurl; ?>">
				  <i class="fas fa-map-marker"></i> Tracking
				</a>
				<a class="btn btn-app"  href="<?php echo $ivfartsummaryUrl; ?>">
							 <?php echo $ivfartsummarycountwarn; ?>
				  <i class="fas fa-medkit"></i> Summary
				</a>
				<a class="btn btn-app"  href="<?php echo $patientserviceslistUrl; ?>">
				  <i class="fas fa-credit-card"></i> Billing
				</a>
				<a class="btn btn-app"  href="<?php echo $TrPlanurl; ?>">
				  <i class="fas fa-cart-plus"></i> Out Come
				</a>
				<a class="btn btn-app"  href="javascript:history.back()">
				  <i class="fas fa-undo"></i> Back
				</a>	  
			  </div>
			  <!-- /.card-body -->
		</div>
<div class="row">
		 <div class="col-lg-8">
			<div class="card">             
			  <div class="card-body">
	   <div class="direct-chat-messages">
<?php
$sql = "SELECT * FROM ganeshkumar_bjhims.patient_opd_follow_up where PatientId='".$results[0]["Female"]."' ORDER BY id DESC; ";
$results3 = $dbhelper->ExecuteRows($sql);
	   for ($i=0;$i< count($results3) ;$i++)
		{
	   $printd .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["createddatetime"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$results3[$i]["procedurenotes"].'
						</div>
					</div>';
		}
	   echo $printd;
?>
	   </div>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
		<div class="col-lg-4">
			<div class="card">             
			  <div class="card-body">
	   <div class="direct-chat-messages">
<?php
for ($i=0;$i< count($results3) ;$i++)
{ 
	if($results3[$i]["ICSIAdvised"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["ICSIDate"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$results3[$i]["ICSIAdvised"].'
						</div>
					</div>';
	}
	if($results3[$i]["EDD"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["EDD"].'</span>
						</div>
						<div class="direct-chat-text">
							EDD
						</div>
					</div>';
	}
	if($results3[$i]["LMP"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["LMP"].'</span>
						</div>
						<div class="direct-chat-text">
							LMP
						</div>
					</div>';
	}
	if($results3[$i]["ProcedureDateTime"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">'.$results3[$i]["ProcedureDateTime"].'</span>
						</div>
						<div class="direct-chat-text">
							'.$results3[$i]["Procedure"].'
						</div>
					</div>';
	}
	if($results3[$i]["Allergy"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">Allergy</span>
						</div>
						<div class="direct-chat-text">
							'.$results3[$i]["Allergy"].'
						</div>
					</div>';
	}
	if($results3[$i]["SerologyPositive"] != null)
	{
		$printda .=  '<div class="direct-chat-msg">
						<div class="direct-chat-infos clearfix">
							<span class="direct-chat-name float-left">'.$results3[$i]["createdby"].'</span>
							<span class="direct-chat-timestamp float-right">Serology Positive</span>
						</div>
						<div class="direct-chat-text">
							Serology Positive
						</div>
					</div>';
	}
}
echo $printda;
?>
	   </div>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_view_opd_follow_up_procedurenotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_procedurenotes"></slot>
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
			  			  <slot class="ew-slot" name="tpc_view_opd_follow_up_ICSIAdvised"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_ICSIAdvised"></slot> <br>
			  			  <slot class="ew-slot" name="tpc_view_opd_follow_up_ICSIDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_ICSIDate"></slot> <br>
			  <slot class="ew-slot" name="tpc_view_opd_follow_up_NextReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_NextReviewDate"></slot> <br>
				<slot class="ew-slot" name="tpc_view_opd_follow_up_Procedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_Procedure"></slot> <br>
				  <slot class="ew-slot" name="tpc_view_opd_follow_up_ProcedureDateTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_ProcedureDateTime"></slot> <br>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card">
			  <div class="card-body">
			    <slot class="ew-slot" name="tpc_view_opd_follow_up_SerologyPositive"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_SerologyPositive"></slot> <br>
				<slot class="ew-slot" name="tpc_view_opd_follow_up_Allergy"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_Allergy"></slot> <br>
			    <slot class="ew-slot" name="tpc_view_opd_follow_up_DeliveryRegistered"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_DeliveryRegistered"></slot> <br>
				<slot class="ew-slot" name="tpc_view_opd_follow_up_LMP"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_LMP"></slot> <br>
				<slot class="ew-slot" name="tpc_view_opd_follow_up_EDD"></slot>&nbsp;<slot class="ew-slot" name="tpx_view_opd_follow_up_EDD"></slot> <br>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
</div>
</template>
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_view_opd_follow_upadd", "tpm_view_opd_follow_upadd", "view_opd_follow_upadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("view_opd_follow_up");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

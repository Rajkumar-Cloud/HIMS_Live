<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientFollowUpAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_follow_upadd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_follow_upadd = currentForm = new ew.Form("fpatient_follow_upadd", "add");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_follow_up")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_follow_up)
        ew.vars.tables.patient_follow_up = currentTable;
    fpatient_follow_upadd.addFields([
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["BP", [fields.BP.visible && fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["Pulse", [fields.Pulse.visible && fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["Resp", [fields.Resp.visible && fields.Resp.required ? ew.Validators.required(fields.Resp.caption) : null], fields.Resp.isInvalid],
        ["SPO2", [fields.SPO2.visible && fields.SPO2.required ? ew.Validators.required(fields.SPO2.caption) : null], fields.SPO2.isInvalid],
        ["FollowupAdvice", [fields.FollowupAdvice.visible && fields.FollowupAdvice.required ? ew.Validators.required(fields.FollowupAdvice.caption) : null], fields.FollowupAdvice.isInvalid],
        ["NextReviewDate", [fields.NextReviewDate.visible && fields.NextReviewDate.required ? ew.Validators.required(fields.NextReviewDate.caption) : null], fields.NextReviewDate.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["_Template", [fields._Template.visible && fields._Template.required ? ew.Validators.required(fields._Template.caption) : null], fields._Template.isInvalid],
        ["courseinhospital", [fields.courseinhospital.visible && fields.courseinhospital.required ? ew.Validators.required(fields.courseinhospital.caption) : null], fields.courseinhospital.isInvalid],
        ["procedurenotes", [fields.procedurenotes.visible && fields.procedurenotes.required ? ew.Validators.required(fields.procedurenotes.caption) : null], fields.procedurenotes.isInvalid],
        ["conditionatdischarge", [fields.conditionatdischarge.visible && fields.conditionatdischarge.required ? ew.Validators.required(fields.conditionatdischarge.caption) : null], fields.conditionatdischarge.isInvalid],
        ["Template1", [fields.Template1.visible && fields.Template1.required ? ew.Validators.required(fields.Template1.caption) : null], fields.Template1.isInvalid],
        ["Template2", [fields.Template2.visible && fields.Template2.required ? ew.Validators.required(fields.Template2.caption) : null], fields.Template2.isInvalid],
        ["Template3", [fields.Template3.visible && fields.Template3.required ? ew.Validators.required(fields.Template3.caption) : null], fields.Template3.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["PatientSearch", [fields.PatientSearch.visible && fields.PatientSearch.required ? ew.Validators.required(fields.PatientSearch.caption) : null], fields.PatientSearch.isInvalid],
        ["DischargeAdviceMedicine", [fields.DischargeAdviceMedicine.visible && fields.DischargeAdviceMedicine.required ? ew.Validators.required(fields.DischargeAdviceMedicine.caption) : null], fields.DischargeAdviceMedicine.isInvalid],
        ["DischargeAdviceMedicineTemplate", [fields.DischargeAdviceMedicineTemplate.visible && fields.DischargeAdviceMedicineTemplate.required ? ew.Validators.required(fields.DischargeAdviceMedicineTemplate.caption) : null], fields.DischargeAdviceMedicineTemplate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_follow_upadd,
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
    fpatient_follow_upadd.validate = function () {
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
    fpatient_follow_upadd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_follow_upadd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_follow_upadd.lists._Template = <?= $Page->_Template->toClientList($Page) ?>;
    fpatient_follow_upadd.lists.Template1 = <?= $Page->Template1->toClientList($Page) ?>;
    fpatient_follow_upadd.lists.Template2 = <?= $Page->Template2->toClientList($Page) ?>;
    fpatient_follow_upadd.lists.Template3 = <?= $Page->Template3->toClientList($Page) ?>;
    fpatient_follow_upadd.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    fpatient_follow_upadd.lists.DischargeAdviceMedicineTemplate = <?= $Page->DischargeAdviceMedicineTemplate->toClientList($Page) ?>;
    loadjs.done("fpatient_follow_upadd");
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
<form name="fpatient_follow_upadd" id="fpatient_follow_upadd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_follow_up">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PatientId->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div d-none"><!-- page* -->
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_follow_up_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_follow_up_PatID"><span id="el_patient_follow_up_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_follow_up_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_follow_up_PatientName"><span id="el_patient_follow_up_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_follow_up_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_MobileNumber"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_follow_up_MobileNumber"><span id="el_patient_follow_up_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_follow_up_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx_patient_follow_up_mrnno"><span id="el_patient_follow_up_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_follow_up_mrnno"><span id="el_patient_follow_up_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BP->Visible) { // BP ?>
    <div id="r_BP" class="form-group row">
        <label id="elh_patient_follow_up_BP" for="x_BP" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_BP"><?= $Page->BP->caption() ?><?= $Page->BP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BP->cellAttributes() ?>>
<template id="tpx_patient_follow_up_BP"><span id="el_patient_follow_up_BP">
<input type="<?= $Page->BP->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_BP" name="x_BP" id="x_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BP->getPlaceHolder()) ?>" value="<?= $Page->BP->EditValue ?>"<?= $Page->BP->editAttributes() ?> aria-describedby="x_BP_help">
<?= $Page->BP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BP->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Pulse->Visible) { // Pulse ?>
    <div id="r_Pulse" class="form-group row">
        <label id="elh_patient_follow_up_Pulse" for="x_Pulse" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_Pulse"><?= $Page->Pulse->caption() ?><?= $Page->Pulse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Pulse->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Pulse"><span id="el_patient_follow_up_Pulse">
<input type="<?= $Page->Pulse->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Pulse" name="x_Pulse" id="x_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Pulse->getPlaceHolder()) ?>" value="<?= $Page->Pulse->EditValue ?>"<?= $Page->Pulse->editAttributes() ?> aria-describedby="x_Pulse_help">
<?= $Page->Pulse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Pulse->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Resp->Visible) { // Resp ?>
    <div id="r_Resp" class="form-group row">
        <label id="elh_patient_follow_up_Resp" for="x_Resp" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_Resp"><?= $Page->Resp->caption() ?><?= $Page->Resp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Resp->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Resp"><span id="el_patient_follow_up_Resp">
<input type="<?= $Page->Resp->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Resp" name="x_Resp" id="x_Resp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Resp->getPlaceHolder()) ?>" value="<?= $Page->Resp->EditValue ?>"<?= $Page->Resp->editAttributes() ?> aria-describedby="x_Resp_help">
<?= $Page->Resp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Resp->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SPO2->Visible) { // SPO2 ?>
    <div id="r_SPO2" class="form-group row">
        <label id="elh_patient_follow_up_SPO2" for="x_SPO2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_SPO2"><?= $Page->SPO2->caption() ?><?= $Page->SPO2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SPO2->cellAttributes() ?>>
<template id="tpx_patient_follow_up_SPO2"><span id="el_patient_follow_up_SPO2">
<input type="<?= $Page->SPO2->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_SPO2" name="x_SPO2" id="x_SPO2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SPO2->getPlaceHolder()) ?>" value="<?= $Page->SPO2->EditValue ?>"<?= $Page->SPO2->editAttributes() ?> aria-describedby="x_SPO2_help">
<?= $Page->SPO2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SPO2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FollowupAdvice->Visible) { // FollowupAdvice ?>
    <div id="r_FollowupAdvice" class="form-group row">
        <label id="elh_patient_follow_up_FollowupAdvice" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_FollowupAdvice"><?= $Page->FollowupAdvice->caption() ?><?= $Page->FollowupAdvice->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FollowupAdvice->cellAttributes() ?>>
<template id="tpx_patient_follow_up_FollowupAdvice"><span id="el_patient_follow_up_FollowupAdvice">
<?php $Page->FollowupAdvice->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_FollowupAdvice" name="x_FollowupAdvice" id="x_FollowupAdvice" cols="35" rows="25" placeholder="<?= HtmlEncode($Page->FollowupAdvice->getPlaceHolder()) ?>"<?= $Page->FollowupAdvice->editAttributes() ?> aria-describedby="x_FollowupAdvice_help"><?= $Page->FollowupAdvice->EditValue ?></textarea>
<?= $Page->FollowupAdvice->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FollowupAdvice->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_follow_upadd", "editor"], function() {
	ew.createEditor("fpatient_follow_upadd", "x_FollowupAdvice", 35, 25, <?= $Page->FollowupAdvice->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NextReviewDate->Visible) { // NextReviewDate ?>
    <div id="r_NextReviewDate" class="form-group row">
        <label id="elh_patient_follow_up_NextReviewDate" for="x_NextReviewDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_NextReviewDate"><?= $Page->NextReviewDate->caption() ?><?= $Page->NextReviewDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NextReviewDate->cellAttributes() ?>>
<template id="tpx_patient_follow_up_NextReviewDate"><span id="el_patient_follow_up_NextReviewDate">
<input type="<?= $Page->NextReviewDate->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_NextReviewDate" data-format="7" name="x_NextReviewDate" id="x_NextReviewDate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NextReviewDate->getPlaceHolder()) ?>" value="<?= $Page->NextReviewDate->EditValue ?>"<?= $Page->NextReviewDate->editAttributes() ?> aria-describedby="x_NextReviewDate_help">
<?= $Page->NextReviewDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NextReviewDate->getErrorMessage() ?></div>
<?php if (!$Page->NextReviewDate->ReadOnly && !$Page->NextReviewDate->Disabled && !isset($Page->NextReviewDate->EditAttrs["readonly"]) && !isset($Page->NextReviewDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_follow_upadd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_follow_upadd", "x_NextReviewDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_follow_up_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Age"><span id="el_patient_follow_up_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_follow_up_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Gender"><span id="el_patient_follow_up_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_follow_up_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_follow_up_profilePic"><span id="el_patient_follow_up_profilePic">
<textarea data-table="patient_follow_up" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->_Template->Visible) { // Template ?>
    <div id="r__Template" class="form-group row">
        <label id="elh_patient_follow_up__Template" for="x__Template" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up__Template"><?= $Page->_Template->caption() ?><?= $Page->_Template->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->_Template->cellAttributes() ?>>
<template id="tpx_patient_follow_up__Template"><span id="el_patient_follow_up__Template">
<?php $Page->_Template->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x__Template"
        name="x__Template"
        class="form-control ew-select<?= $Page->_Template->isInvalidClass() ?>"
        data-select2-id="patient_follow_up_x__Template"
        data-table="patient_follow_up"
        data-field="x__Template"
        data-value-separator="<?= $Page->_Template->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->_Template->getPlaceHolder()) ?>"
        <?= $Page->_Template->editAttributes() ?>>
        <?= $Page->_Template->selectOptionListHtml("x__Template") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$Page->_Template->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x__Template" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->_Template->caption() ?>" data-title="<?= $Page->_Template->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x__Template',url:'<?= GetUrl("MasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->_Template->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->_Template->getErrorMessage() ?></div>
<?= $Page->_Template->Lookup->getParamTag($Page, "p_x__Template") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_follow_up_x__Template']"),
        options = { name: "x__Template", selectId: "patient_follow_up_x__Template", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_follow_up.fields._Template.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->courseinhospital->Visible) { // courseinhospital ?>
    <div id="r_courseinhospital" class="form-group row">
        <label id="elh_patient_follow_up_courseinhospital" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_courseinhospital"><?= $Page->courseinhospital->caption() ?><?= $Page->courseinhospital->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->courseinhospital->cellAttributes() ?>>
<template id="tpx_patient_follow_up_courseinhospital"><span id="el_patient_follow_up_courseinhospital">
<?php $Page->courseinhospital->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_courseinhospital" name="x_courseinhospital" id="x_courseinhospital" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->courseinhospital->getPlaceHolder()) ?>"<?= $Page->courseinhospital->editAttributes() ?> aria-describedby="x_courseinhospital_help"><?= $Page->courseinhospital->EditValue ?></textarea>
<?= $Page->courseinhospital->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->courseinhospital->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_follow_upadd", "editor"], function() {
	ew.createEditor("fpatient_follow_upadd", "x_courseinhospital", 35, 4, <?= $Page->courseinhospital->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->procedurenotes->Visible) { // procedurenotes ?>
    <div id="r_procedurenotes" class="form-group row">
        <label id="elh_patient_follow_up_procedurenotes" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_procedurenotes"><?= $Page->procedurenotes->caption() ?><?= $Page->procedurenotes->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->procedurenotes->cellAttributes() ?>>
<template id="tpx_patient_follow_up_procedurenotes"><span id="el_patient_follow_up_procedurenotes">
<?php $Page->procedurenotes->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_procedurenotes" name="x_procedurenotes" id="x_procedurenotes" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->procedurenotes->getPlaceHolder()) ?>"<?= $Page->procedurenotes->editAttributes() ?> aria-describedby="x_procedurenotes_help"><?= $Page->procedurenotes->EditValue ?></textarea>
<?= $Page->procedurenotes->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->procedurenotes->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_follow_upadd", "editor"], function() {
	ew.createEditor("fpatient_follow_upadd", "x_procedurenotes", 35, 4, <?= $Page->procedurenotes->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->conditionatdischarge->Visible) { // conditionatdischarge ?>
    <div id="r_conditionatdischarge" class="form-group row">
        <label id="elh_patient_follow_up_conditionatdischarge" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_conditionatdischarge"><?= $Page->conditionatdischarge->caption() ?><?= $Page->conditionatdischarge->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->conditionatdischarge->cellAttributes() ?>>
<template id="tpx_patient_follow_up_conditionatdischarge"><span id="el_patient_follow_up_conditionatdischarge">
<?php $Page->conditionatdischarge->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_conditionatdischarge" name="x_conditionatdischarge" id="x_conditionatdischarge" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->conditionatdischarge->getPlaceHolder()) ?>"<?= $Page->conditionatdischarge->editAttributes() ?> aria-describedby="x_conditionatdischarge_help"><?= $Page->conditionatdischarge->EditValue ?></textarea>
<?= $Page->conditionatdischarge->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->conditionatdischarge->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_follow_upadd", "editor"], function() {
	ew.createEditor("fpatient_follow_upadd", "x_conditionatdischarge", 35, 4, <?= $Page->conditionatdischarge->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Template1->Visible) { // Template1 ?>
    <div id="r_Template1" class="form-group row">
        <label id="elh_patient_follow_up_Template1" for="x_Template1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_Template1"><?= $Page->Template1->caption() ?><?= $Page->Template1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Template1->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Template1"><span id="el_patient_follow_up_Template1">
<?php $Page->Template1->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_Template1"
        name="x_Template1"
        class="form-control ew-select<?= $Page->Template1->isInvalidClass() ?>"
        data-select2-id="patient_follow_up_x_Template1"
        data-table="patient_follow_up"
        data-field="x_Template1"
        data-value-separator="<?= $Page->Template1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Template1->getPlaceHolder()) ?>"
        <?= $Page->Template1->editAttributes() ?>>
        <?= $Page->Template1->selectOptionListHtml("x_Template1") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$Page->Template1->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Template1" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Template1->caption() ?>" data-title="<?= $Page->Template1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Template1',url:'<?= GetUrl("MasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->Template1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Template1->getErrorMessage() ?></div>
<?= $Page->Template1->Lookup->getParamTag($Page, "p_x_Template1") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_follow_up_x_Template1']"),
        options = { name: "x_Template1", selectId: "patient_follow_up_x_Template1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_follow_up.fields.Template1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Template2->Visible) { // Template2 ?>
    <div id="r_Template2" class="form-group row">
        <label id="elh_patient_follow_up_Template2" for="x_Template2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_Template2"><?= $Page->Template2->caption() ?><?= $Page->Template2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Template2->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Template2"><span id="el_patient_follow_up_Template2">
<?php $Page->Template2->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_Template2"
        name="x_Template2"
        class="form-control ew-select<?= $Page->Template2->isInvalidClass() ?>"
        data-select2-id="patient_follow_up_x_Template2"
        data-table="patient_follow_up"
        data-field="x_Template2"
        data-value-separator="<?= $Page->Template2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Template2->getPlaceHolder()) ?>"
        <?= $Page->Template2->editAttributes() ?>>
        <?= $Page->Template2->selectOptionListHtml("x_Template2") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$Page->Template2->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Template2" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Template2->caption() ?>" data-title="<?= $Page->Template2->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Template2',url:'<?= GetUrl("MasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->Template2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Template2->getErrorMessage() ?></div>
<?= $Page->Template2->Lookup->getParamTag($Page, "p_x_Template2") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_follow_up_x_Template2']"),
        options = { name: "x_Template2", selectId: "patient_follow_up_x_Template2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_follow_up.fields.Template2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Template3->Visible) { // Template3 ?>
    <div id="r_Template3" class="form-group row">
        <label id="elh_patient_follow_up_Template3" for="x_Template3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_Template3"><?= $Page->Template3->caption() ?><?= $Page->Template3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Template3->cellAttributes() ?>>
<template id="tpx_patient_follow_up_Template3"><span id="el_patient_follow_up_Template3">
<?php $Page->Template3->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_Template3"
        name="x_Template3"
        class="form-control ew-select<?= $Page->Template3->isInvalidClass() ?>"
        data-select2-id="patient_follow_up_x_Template3"
        data-table="patient_follow_up"
        data-field="x_Template3"
        data-value-separator="<?= $Page->Template3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Template3->getPlaceHolder()) ?>"
        <?= $Page->Template3->editAttributes() ?>>
        <?= $Page->Template3->selectOptionListHtml("x_Template3") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$Page->Template3->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Template3" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->Template3->caption() ?>" data-title="<?= $Page->Template3->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Template3',url:'<?= GetUrl("MasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->Template3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Template3->getErrorMessage() ?></div>
<?= $Page->Template3->Lookup->getParamTag($Page, "p_x_Template3") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_follow_up_x_Template3']"),
        options = { name: "x_Template3", selectId: "patient_follow_up_x_Template3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_follow_up.fields.Template3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_follow_up_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx_patient_follow_up_Reception"><span id="el_patient_follow_up_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_follow_up_Reception"><span id="el_patient_follow_up_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientId->Visible) { // PatientId ?>
    <div id="r_PatientId" class="form-group row">
        <label id="elh_patient_follow_up_PatientId" for="x_PatientId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_PatientId"><?= $Page->PatientId->caption() ?><?= $Page->PatientId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientId->cellAttributes() ?>>
<?php if ($Page->PatientId->getSessionValue() != "") { ?>
<template id="tpx_patient_follow_up_PatientId"><span id="el_patient_follow_up_PatientId">
<span<?= $Page->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PatientId->getDisplayValue($Page->PatientId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_PatientId" name="x_PatientId" value="<?= HtmlEncode($Page->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_follow_up_PatientId"><span id="el_patient_follow_up_PatientId">
<input type="<?= $Page->PatientId->getInputTextType() ?>" data-table="patient_follow_up" data-field="x_PatientId" name="x_PatientId" id="x_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientId->getPlaceHolder()) ?>" value="<?= $Page->PatientId->EditValue ?>"<?= $Page->PatientId->editAttributes() ?> aria-describedby="x_PatientId_help">
<?= $Page->PatientId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label id="elh_patient_follow_up_PatientSearch" for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_PatientSearch"><?= $Page->PatientSearch->caption() ?><?= $Page->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_follow_up_PatientSearch"><span id="el_patient_follow_up_PatientSearch">
<div class="input-group ew-lookup-list" aria-describedby="x_PatientSearch_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage() ?></div>
<?= $Page->PatientSearch->getCustomMessage() ?>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_follow_up" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->CurrentValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DischargeAdviceMedicine->Visible) { // DischargeAdviceMedicine ?>
    <div id="r_DischargeAdviceMedicine" class="form-group row">
        <label id="elh_patient_follow_up_DischargeAdviceMedicine" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_DischargeAdviceMedicine"><?= $Page->DischargeAdviceMedicine->caption() ?><?= $Page->DischargeAdviceMedicine->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DischargeAdviceMedicine->cellAttributes() ?>>
<template id="tpx_patient_follow_up_DischargeAdviceMedicine"><span id="el_patient_follow_up_DischargeAdviceMedicine">
<?php $Page->DischargeAdviceMedicine->EditAttrs->appendClass("editor"); ?>
<textarea data-table="patient_follow_up" data-field="x_DischargeAdviceMedicine" name="x_DischargeAdviceMedicine" id="x_DischargeAdviceMedicine" cols="35" rows="10" placeholder="<?= HtmlEncode($Page->DischargeAdviceMedicine->getPlaceHolder()) ?>"<?= $Page->DischargeAdviceMedicine->editAttributes() ?> aria-describedby="x_DischargeAdviceMedicine_help"><?= $Page->DischargeAdviceMedicine->EditValue ?></textarea>
<?= $Page->DischargeAdviceMedicine->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DischargeAdviceMedicine->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_follow_upadd", "editor"], function() {
	ew.createEditor("fpatient_follow_upadd", "x_DischargeAdviceMedicine", 35, 10, <?= $Page->DischargeAdviceMedicine->ReadOnly || false ? "true" : "false" ?>);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DischargeAdviceMedicineTemplate->Visible) { // DischargeAdviceMedicineTemplate ?>
    <div id="r_DischargeAdviceMedicineTemplate" class="form-group row">
        <label id="elh_patient_follow_up_DischargeAdviceMedicineTemplate" for="x_DischargeAdviceMedicineTemplate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_follow_up_DischargeAdviceMedicineTemplate"><?= $Page->DischargeAdviceMedicineTemplate->caption() ?><?= $Page->DischargeAdviceMedicineTemplate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DischargeAdviceMedicineTemplate->cellAttributes() ?>>
<template id="tpx_patient_follow_up_DischargeAdviceMedicineTemplate"><span id="el_patient_follow_up_DischargeAdviceMedicineTemplate">
<?php $Page->DischargeAdviceMedicineTemplate->EditAttrs->prepend("onchange", "ew.autoFill(this);"); ?>
<div class="input-group flex-nowrap">
    <select
        id="x_DischargeAdviceMedicineTemplate"
        name="x_DischargeAdviceMedicineTemplate"
        class="form-control ew-select<?= $Page->DischargeAdviceMedicineTemplate->isInvalidClass() ?>"
        data-select2-id="patient_follow_up_x_DischargeAdviceMedicineTemplate"
        data-table="patient_follow_up"
        data-field="x_DischargeAdviceMedicineTemplate"
        data-value-separator="<?= $Page->DischargeAdviceMedicineTemplate->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DischargeAdviceMedicineTemplate->getPlaceHolder()) ?>"
        <?= $Page->DischargeAdviceMedicineTemplate->editAttributes() ?>>
        <?= $Page->DischargeAdviceMedicineTemplate->selectOptionListHtml("x_DischargeAdviceMedicineTemplate") ?>
    </select>
    <?php if (AllowAdd(CurrentProjectID() . "mas_user_template") && !$Page->DischargeAdviceMedicineTemplate->ReadOnly) { ?>
    <div class="input-group-append"><button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DischargeAdviceMedicineTemplate" title="<?= HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $Page->DischargeAdviceMedicineTemplate->caption() ?>" data-title="<?= $Page->DischargeAdviceMedicineTemplate->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DischargeAdviceMedicineTemplate',url:'<?= GetUrl("MasUserTemplateAddopt") ?>'});"><i class="fas fa-plus ew-icon"></i></button></div>
    <?php } ?>
</div>
<?= $Page->DischargeAdviceMedicineTemplate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DischargeAdviceMedicineTemplate->getErrorMessage() ?></div>
<?= $Page->DischargeAdviceMedicineTemplate->Lookup->getParamTag($Page, "p_x_DischargeAdviceMedicineTemplate") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_follow_up_x_DischargeAdviceMedicineTemplate']"),
        options = { name: "x_DischargeAdviceMedicineTemplate", selectId: "patient_follow_up_x_DischargeAdviceMedicineTemplate", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_follow_up.fields.DischargeAdviceMedicineTemplate.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_follow_upadd" class="ew-custom-template"></div>
<template id="tpm_patient_follow_upadd">
<div id="ct_PatientFollowUpAdd"><style>
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
</style>
	<?php
	$fk_id = $_GET["fk_id"] ;
	$fk_patient_id = $_GET["fk_patient_id"] ;
	$fk_mrnNo = $_GET["fk_mrnNo"] ;
	$dbhelper = &DbHelper();
	$Tid = $_GET["fk_patient_id"] ;
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
<?php
	$Reception = $_GET["fk_id"] ;
	$PatientId = $_GET["fk_patient_id"] ;
	$mrnno = $_GET["fk_mrnNo"] ;
?>
	<input type="hidden" id="fk_id" name="fk_id" value="<?php echo $Reception; ?>">
	<input type="hidden" id="fk_patient_id" name="fk_patient_id" value="<?php echo $PatientId; ?>">
	<input type="hidden" id="fk_mrnNo" name="fk_mrnNo" value="<?php echo $mrnno; ?>">
	<input type="hidden" id="Repagehistoryview" name="Repagehistoryview" value="3487">
<slot class="ew-slot" name="tpc_patient_follow_up_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_PatientSearch"></slot>	
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_follow_up_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_follow_up_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_follow_up_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_follow_up_PatientId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_PatientId"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_follow_up_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_follow_up_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_follow_up_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_follow_up_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_follow_up_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_MobileNumber"></slot></p> 
</div>
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
<slot class="ew-slot" name="tpc_patient_follow_up_Template1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Template1"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_courseinhospital"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_courseinhospital"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpc_patient_follow_up_Template2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Template2"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_procedurenotes"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_procedurenotes"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpc_patient_follow_up_Template3"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Template3"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_conditionatdischarge"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_conditionatdischarge"></slot>
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
			  	<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_BP"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_BP"></slot>  mm of Hg </td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_Pulse"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Pulse"></slot>  mints</td></tr>						
						<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_Resp"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_Resp"></slot></td></tr>
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
			  				<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_SPO2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_SPO2"></slot> F</td></tr>
			  				<tr><td><slot class="ew-slot" name="tpc_patient_follow_up_NextReviewDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_NextReviewDate"></slot> </td></tr>
			  			</tbody>
			  		</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpc_patient_follow_up_DischargeAdviceMedicineTemplate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_DischargeAdviceMedicineTemplate"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_DischargeAdviceMedicine"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_DischargeAdviceMedicine"></slot>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<slot class="ew-slot" name="tpx_Template"></slot>
<div class="row">
		 <div class="col-lg-12">
			<div class="card">             
			  <div class="card-body">
<slot class="ew-slot" name="tpc_patient_follow_up_FollowupAdvice"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_follow_up_FollowupAdvice"></slot>
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
<table class="ew-table">
	 <tbody>
		<tr>
			<td>
				<button class="btn bg-secondary btn-lg" onClick="callSpatientvitals()">Vitals</button>
			</td>
			<td>
				<button class="btn bg-info btn-lg" onClick="callpatienthistory()">History</button>
			</td>
			<td>
				<button class="btn bg-warning btn-lg" onClick="callpatientprovisionaldiagnosis()">Provisional Diagnosis</button>
			</td>
			<td>
				<button class="btn bg-success btn-lg" onClick="callpatientprescription()">Prescription</button>
			</td>
						<td>
				<button class="btn bg-danger btn-lg" onClick="callpatientfinaldiagnosis()">Final Diagnosis</button>
			</td>
			<td>
				<button class="btn bg-orange btn-lg" onClick="callpatientfollowup()">Follow Up</button>
			</td>
						<td>
				<button class="btn bg-purple btn-lg" onClick="callpatientotdeliveryregister()">Delivery Register</button>
			</td>
			<td>
				<button class="btn bg-maroon btn-lg" onClick="callpatientotsurgeryregister()">Surgery Register</button>
			</td>
		</tr>
	</tbody>
</table>
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
    ew.applyTemplate("tpd_patient_follow_upadd", "tpm_patient_follow_upadd", "patient_follow_upadd", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_follow_up");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function callSpatientvitals(){document.getElementById("Repagehistoryview").value="patientvitals"}function callpatienthistory(){document.getElementById("Repagehistoryview").value="patienthistory"}function callpatientprovisionaldiagnosis(){document.getElementById("Repagehistoryview").value="patientprovisionaldiagnosis"}function callpatientprescription(){document.getElementById("Repagehistoryview").value="patientprescription"}function callpatientfinaldiagnosis(){document.getElementById("Repagehistoryview").value="patientfinaldiagnosis"}function callpatientfollowup(){document.getElementById("Repagehistoryview").value="patientfollowup"}function callpatientotdeliveryregister(){document.getElementById("Repagehistoryview").value="patientotdeliveryregister"}function callpatientotsurgeryregister(){document.getElementById("Repagehistoryview").value="patientotsurgeryregister"}var c=document.getElementById("el_patient_follow_up_profilePic").children,d=c[0].children,evalue=c[0].innerText;
});
</script>

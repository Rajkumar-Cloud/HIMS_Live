<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOtSurgeryRegisterEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_ot_surgery_registeredit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_ot_surgery_registeredit = currentForm = new ew.Form("fpatient_ot_surgery_registeredit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_ot_surgery_register")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_ot_surgery_register)
        ew.vars.tables.patient_ot_surgery_register = currentTable;
    fpatient_ot_surgery_registeredit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["diagnosis", [fields.diagnosis.visible && fields.diagnosis.required ? ew.Validators.required(fields.diagnosis.caption) : null], fields.diagnosis.isInvalid],
        ["proposedSurgery", [fields.proposedSurgery.visible && fields.proposedSurgery.required ? ew.Validators.required(fields.proposedSurgery.caption) : null], fields.proposedSurgery.isInvalid],
        ["surgeryProcedure", [fields.surgeryProcedure.visible && fields.surgeryProcedure.required ? ew.Validators.required(fields.surgeryProcedure.caption) : null], fields.surgeryProcedure.isInvalid],
        ["typeOfAnaesthesia", [fields.typeOfAnaesthesia.visible && fields.typeOfAnaesthesia.required ? ew.Validators.required(fields.typeOfAnaesthesia.caption) : null], fields.typeOfAnaesthesia.isInvalid],
        ["RecievedTime", [fields.RecievedTime.visible && fields.RecievedTime.required ? ew.Validators.required(fields.RecievedTime.caption) : null, ew.Validators.datetime(11)], fields.RecievedTime.isInvalid],
        ["AnaesthesiaStarted", [fields.AnaesthesiaStarted.visible && fields.AnaesthesiaStarted.required ? ew.Validators.required(fields.AnaesthesiaStarted.caption) : null, ew.Validators.datetime(11)], fields.AnaesthesiaStarted.isInvalid],
        ["AnaesthesiaEnded", [fields.AnaesthesiaEnded.visible && fields.AnaesthesiaEnded.required ? ew.Validators.required(fields.AnaesthesiaEnded.caption) : null, ew.Validators.datetime(11)], fields.AnaesthesiaEnded.isInvalid],
        ["surgeryStarted", [fields.surgeryStarted.visible && fields.surgeryStarted.required ? ew.Validators.required(fields.surgeryStarted.caption) : null, ew.Validators.datetime(11)], fields.surgeryStarted.isInvalid],
        ["surgeryEnded", [fields.surgeryEnded.visible && fields.surgeryEnded.required ? ew.Validators.required(fields.surgeryEnded.caption) : null, ew.Validators.datetime(17)], fields.surgeryEnded.isInvalid],
        ["RecoveryTime", [fields.RecoveryTime.visible && fields.RecoveryTime.required ? ew.Validators.required(fields.RecoveryTime.caption) : null, ew.Validators.datetime(11)], fields.RecoveryTime.isInvalid],
        ["ShiftedTime", [fields.ShiftedTime.visible && fields.ShiftedTime.required ? ew.Validators.required(fields.ShiftedTime.caption) : null, ew.Validators.datetime(11)], fields.ShiftedTime.isInvalid],
        ["Duration", [fields.Duration.visible && fields.Duration.required ? ew.Validators.required(fields.Duration.caption) : null], fields.Duration.isInvalid],
        ["Surgeon", [fields.Surgeon.visible && fields.Surgeon.required ? ew.Validators.required(fields.Surgeon.caption) : null], fields.Surgeon.isInvalid],
        ["Anaesthetist", [fields.Anaesthetist.visible && fields.Anaesthetist.required ? ew.Validators.required(fields.Anaesthetist.caption) : null], fields.Anaesthetist.isInvalid],
        ["AsstSurgeon1", [fields.AsstSurgeon1.visible && fields.AsstSurgeon1.required ? ew.Validators.required(fields.AsstSurgeon1.caption) : null], fields.AsstSurgeon1.isInvalid],
        ["AsstSurgeon2", [fields.AsstSurgeon2.visible && fields.AsstSurgeon2.required ? ew.Validators.required(fields.AsstSurgeon2.caption) : null], fields.AsstSurgeon2.isInvalid],
        ["paediatric", [fields.paediatric.visible && fields.paediatric.required ? ew.Validators.required(fields.paediatric.caption) : null], fields.paediatric.isInvalid],
        ["ScrubNurse1", [fields.ScrubNurse1.visible && fields.ScrubNurse1.required ? ew.Validators.required(fields.ScrubNurse1.caption) : null], fields.ScrubNurse1.isInvalid],
        ["ScrubNurse2", [fields.ScrubNurse2.visible && fields.ScrubNurse2.required ? ew.Validators.required(fields.ScrubNurse2.caption) : null], fields.ScrubNurse2.isInvalid],
        ["FloorNurse", [fields.FloorNurse.visible && fields.FloorNurse.required ? ew.Validators.required(fields.FloorNurse.caption) : null], fields.FloorNurse.isInvalid],
        ["Technician", [fields.Technician.visible && fields.Technician.required ? ew.Validators.required(fields.Technician.caption) : null], fields.Technician.isInvalid],
        ["HouseKeeping", [fields.HouseKeeping.visible && fields.HouseKeeping.required ? ew.Validators.required(fields.HouseKeeping.caption) : null], fields.HouseKeeping.isInvalid],
        ["countsCheckedMops", [fields.countsCheckedMops.visible && fields.countsCheckedMops.required ? ew.Validators.required(fields.countsCheckedMops.caption) : null], fields.countsCheckedMops.isInvalid],
        ["gauze", [fields.gauze.visible && fields.gauze.required ? ew.Validators.required(fields.gauze.caption) : null], fields.gauze.isInvalid],
        ["needles", [fields.needles.visible && fields.needles.required ? ew.Validators.required(fields.needles.caption) : null], fields.needles.isInvalid],
        ["bloodloss", [fields.bloodloss.visible && fields.bloodloss.required ? ew.Validators.required(fields.bloodloss.caption) : null], fields.bloodloss.isInvalid],
        ["bloodtransfusion", [fields.bloodtransfusion.visible && fields.bloodtransfusion.required ? ew.Validators.required(fields.bloodtransfusion.caption) : null], fields.bloodtransfusion.isInvalid],
        ["implantsUsed", [fields.implantsUsed.visible && fields.implantsUsed.required ? ew.Validators.required(fields.implantsUsed.caption) : null], fields.implantsUsed.isInvalid],
        ["MaterialsForHPE", [fields.MaterialsForHPE.visible && fields.MaterialsForHPE.required ? ew.Validators.required(fields.MaterialsForHPE.caption) : null], fields.MaterialsForHPE.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["PatientSearch", [fields.PatientSearch.visible && fields.PatientSearch.required ? ew.Validators.required(fields.PatientSearch.caption) : null], fields.PatientSearch.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["PId", [fields.PId.visible && fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer], fields.PId.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_ot_surgery_registeredit,
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
    fpatient_ot_surgery_registeredit.validate = function () {
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
    fpatient_ot_surgery_registeredit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_ot_surgery_registeredit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_ot_surgery_registeredit.lists.Surgeon = <?= $Page->Surgeon->toClientList($Page) ?>;
    fpatient_ot_surgery_registeredit.lists.Anaesthetist = <?= $Page->Anaesthetist->toClientList($Page) ?>;
    fpatient_ot_surgery_registeredit.lists.AsstSurgeon1 = <?= $Page->AsstSurgeon1->toClientList($Page) ?>;
    fpatient_ot_surgery_registeredit.lists.AsstSurgeon2 = <?= $Page->AsstSurgeon2->toClientList($Page) ?>;
    fpatient_ot_surgery_registeredit.lists.paediatric = <?= $Page->paediatric->toClientList($Page) ?>;
    fpatient_ot_surgery_registeredit.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    loadjs.done("fpatient_ot_surgery_registeredit");
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
<form name="fpatient_ot_surgery_registeredit" id="fpatient_ot_surgery_registeredit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_ot_surgery_register">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<input type="hidden" name="<?= $Page->OldKeyName ?>" value="<?= $Page->OldKey ?>">
<?php if ($Page->getCurrentMasterTable() == "ip_admission") { ?>
<input type="hidden" name="<?= Config("TABLE_SHOW_MASTER") ?>" value="ip_admission">
<input type="hidden" name="fk_id" value="<?= HtmlEncode($Page->Reception->getSessionValue()) ?>">
<input type="hidden" name="fk_mrnNo" value="<?= HtmlEncode($Page->mrnno->getSessionValue()) ?>">
<input type="hidden" name="fk_patient_id" value="<?= HtmlEncode($Page->PId->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div d-none"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_ot_surgery_register_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_id"><span id="el_patient_ot_surgery_register_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_ot_surgery_register" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_ot_surgery_register_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_PatID"><span id="el_patient_ot_surgery_register_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_ot_surgery_register_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_PatientName"><span id="el_patient_ot_surgery_register_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_ot_surgery_register_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx_patient_ot_surgery_register_mrnno"><span id="el_patient_ot_surgery_register_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_ot_surgery_register_mrnno"><span id="el_patient_ot_surgery_register_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_ot_surgery_register_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_MobileNumber"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_MobileNumber"><span id="el_patient_ot_surgery_register_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_ot_surgery_register_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_Age"><span id="el_patient_ot_surgery_register_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_ot_surgery_register_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_Gender"><span id="el_patient_ot_surgery_register_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_ot_surgery_register_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_profilePic"><span id="el_patient_ot_surgery_register_profilePic">
<textarea data-table="patient_ot_surgery_register" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->diagnosis->Visible) { // diagnosis ?>
    <div id="r_diagnosis" class="form-group row">
        <label id="elh_patient_ot_surgery_register_diagnosis" for="x_diagnosis" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_diagnosis"><?= $Page->diagnosis->caption() ?><?= $Page->diagnosis->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->diagnosis->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_diagnosis"><span id="el_patient_ot_surgery_register_diagnosis">
<textarea data-table="patient_ot_surgery_register" data-field="x_diagnosis" name="x_diagnosis" id="x_diagnosis" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->diagnosis->getPlaceHolder()) ?>"<?= $Page->diagnosis->editAttributes() ?> aria-describedby="x_diagnosis_help"><?= $Page->diagnosis->EditValue ?></textarea>
<?= $Page->diagnosis->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->diagnosis->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->proposedSurgery->Visible) { // proposedSurgery ?>
    <div id="r_proposedSurgery" class="form-group row">
        <label id="elh_patient_ot_surgery_register_proposedSurgery" for="x_proposedSurgery" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_proposedSurgery"><?= $Page->proposedSurgery->caption() ?><?= $Page->proposedSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->proposedSurgery->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_proposedSurgery"><span id="el_patient_ot_surgery_register_proposedSurgery">
<textarea data-table="patient_ot_surgery_register" data-field="x_proposedSurgery" name="x_proposedSurgery" id="x_proposedSurgery" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->proposedSurgery->getPlaceHolder()) ?>"<?= $Page->proposedSurgery->editAttributes() ?> aria-describedby="x_proposedSurgery_help"><?= $Page->proposedSurgery->EditValue ?></textarea>
<?= $Page->proposedSurgery->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->proposedSurgery->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryProcedure->Visible) { // surgeryProcedure ?>
    <div id="r_surgeryProcedure" class="form-group row">
        <label id="elh_patient_ot_surgery_register_surgeryProcedure" for="x_surgeryProcedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_surgeryProcedure"><?= $Page->surgeryProcedure->caption() ?><?= $Page->surgeryProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryProcedure->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_surgeryProcedure"><span id="el_patient_ot_surgery_register_surgeryProcedure">
<textarea data-table="patient_ot_surgery_register" data-field="x_surgeryProcedure" name="x_surgeryProcedure" id="x_surgeryProcedure" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->surgeryProcedure->getPlaceHolder()) ?>"<?= $Page->surgeryProcedure->editAttributes() ?> aria-describedby="x_surgeryProcedure_help"><?= $Page->surgeryProcedure->EditValue ?></textarea>
<?= $Page->surgeryProcedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryProcedure->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
    <div id="r_typeOfAnaesthesia" class="form-group row">
        <label id="elh_patient_ot_surgery_register_typeOfAnaesthesia" for="x_typeOfAnaesthesia" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_typeOfAnaesthesia"><?= $Page->typeOfAnaesthesia->caption() ?><?= $Page->typeOfAnaesthesia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeOfAnaesthesia->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_typeOfAnaesthesia"><span id="el_patient_ot_surgery_register_typeOfAnaesthesia">
<textarea data-table="patient_ot_surgery_register" data-field="x_typeOfAnaesthesia" name="x_typeOfAnaesthesia" id="x_typeOfAnaesthesia" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->typeOfAnaesthesia->getPlaceHolder()) ?>"<?= $Page->typeOfAnaesthesia->editAttributes() ?> aria-describedby="x_typeOfAnaesthesia_help"><?= $Page->typeOfAnaesthesia->EditValue ?></textarea>
<?= $Page->typeOfAnaesthesia->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->typeOfAnaesthesia->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
    <div id="r_RecievedTime" class="form-group row">
        <label id="elh_patient_ot_surgery_register_RecievedTime" for="x_RecievedTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_RecievedTime"><?= $Page->RecievedTime->caption() ?><?= $Page->RecievedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecievedTime->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_RecievedTime"><span id="el_patient_ot_surgery_register_RecievedTime">
<input type="<?= $Page->RecievedTime->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_RecievedTime" data-format="11" name="x_RecievedTime" id="x_RecievedTime" placeholder="<?= HtmlEncode($Page->RecievedTime->getPlaceHolder()) ?>" value="<?= $Page->RecievedTime->EditValue ?>"<?= $Page->RecievedTime->editAttributes() ?> aria-describedby="x_RecievedTime_help">
<?= $Page->RecievedTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecievedTime->getErrorMessage() ?></div>
<?php if (!$Page->RecievedTime->ReadOnly && !$Page->RecievedTime->Disabled && !isset($Page->RecievedTime->EditAttrs["readonly"]) && !isset($Page->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
    <div id="r_AnaesthesiaStarted" class="form-group row">
        <label id="elh_patient_ot_surgery_register_AnaesthesiaStarted" for="x_AnaesthesiaStarted" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_AnaesthesiaStarted"><?= $Page->AnaesthesiaStarted->caption() ?><?= $Page->AnaesthesiaStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_AnaesthesiaStarted"><span id="el_patient_ot_surgery_register_AnaesthesiaStarted">
<input type="<?= $Page->AnaesthesiaStarted->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x_AnaesthesiaStarted" id="x_AnaesthesiaStarted" placeholder="<?= HtmlEncode($Page->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?= $Page->AnaesthesiaStarted->EditValue ?>"<?= $Page->AnaesthesiaStarted->editAttributes() ?> aria-describedby="x_AnaesthesiaStarted_help">
<?= $Page->AnaesthesiaStarted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnaesthesiaStarted->getErrorMessage() ?></div>
<?php if (!$Page->AnaesthesiaStarted->ReadOnly && !$Page->AnaesthesiaStarted->Disabled && !isset($Page->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($Page->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
    <div id="r_AnaesthesiaEnded" class="form-group row">
        <label id="elh_patient_ot_surgery_register_AnaesthesiaEnded" for="x_AnaesthesiaEnded" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_AnaesthesiaEnded"><?= $Page->AnaesthesiaEnded->caption() ?><?= $Page->AnaesthesiaEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_AnaesthesiaEnded"><span id="el_patient_ot_surgery_register_AnaesthesiaEnded">
<input type="<?= $Page->AnaesthesiaEnded->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x_AnaesthesiaEnded" id="x_AnaesthesiaEnded" placeholder="<?= HtmlEncode($Page->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?= $Page->AnaesthesiaEnded->EditValue ?>"<?= $Page->AnaesthesiaEnded->editAttributes() ?> aria-describedby="x_AnaesthesiaEnded_help">
<?= $Page->AnaesthesiaEnded->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnaesthesiaEnded->getErrorMessage() ?></div>
<?php if (!$Page->AnaesthesiaEnded->ReadOnly && !$Page->AnaesthesiaEnded->Disabled && !isset($Page->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($Page->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
    <div id="r_surgeryStarted" class="form-group row">
        <label id="elh_patient_ot_surgery_register_surgeryStarted" for="x_surgeryStarted" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_surgeryStarted"><?= $Page->surgeryStarted->caption() ?><?= $Page->surgeryStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryStarted->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_surgeryStarted"><span id="el_patient_ot_surgery_register_surgeryStarted">
<input type="<?= $Page->surgeryStarted->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_surgeryStarted" data-format="11" name="x_surgeryStarted" id="x_surgeryStarted" placeholder="<?= HtmlEncode($Page->surgeryStarted->getPlaceHolder()) ?>" value="<?= $Page->surgeryStarted->EditValue ?>"<?= $Page->surgeryStarted->editAttributes() ?> aria-describedby="x_surgeryStarted_help">
<?= $Page->surgeryStarted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryStarted->getErrorMessage() ?></div>
<?php if (!$Page->surgeryStarted->ReadOnly && !$Page->surgeryStarted->Disabled && !isset($Page->surgeryStarted->EditAttrs["readonly"]) && !isset($Page->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
    <div id="r_surgeryEnded" class="form-group row">
        <label id="elh_patient_ot_surgery_register_surgeryEnded" for="x_surgeryEnded" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_surgeryEnded"><?= $Page->surgeryEnded->caption() ?><?= $Page->surgeryEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryEnded->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_surgeryEnded"><span id="el_patient_ot_surgery_register_surgeryEnded">
<input type="<?= $Page->surgeryEnded->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_surgeryEnded" data-format="17" name="x_surgeryEnded" id="x_surgeryEnded" placeholder="<?= HtmlEncode($Page->surgeryEnded->getPlaceHolder()) ?>" value="<?= $Page->surgeryEnded->EditValue ?>"<?= $Page->surgeryEnded->editAttributes() ?> aria-describedby="x_surgeryEnded_help">
<?= $Page->surgeryEnded->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryEnded->getErrorMessage() ?></div>
<?php if (!$Page->surgeryEnded->ReadOnly && !$Page->surgeryEnded->Disabled && !isset($Page->surgeryEnded->EditAttrs["readonly"]) && !isset($Page->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":17});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
    <div id="r_RecoveryTime" class="form-group row">
        <label id="elh_patient_ot_surgery_register_RecoveryTime" for="x_RecoveryTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_RecoveryTime"><?= $Page->RecoveryTime->caption() ?><?= $Page->RecoveryTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecoveryTime->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_RecoveryTime"><span id="el_patient_ot_surgery_register_RecoveryTime">
<input type="<?= $Page->RecoveryTime->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_RecoveryTime" data-format="11" name="x_RecoveryTime" id="x_RecoveryTime" placeholder="<?= HtmlEncode($Page->RecoveryTime->getPlaceHolder()) ?>" value="<?= $Page->RecoveryTime->EditValue ?>"<?= $Page->RecoveryTime->editAttributes() ?> aria-describedby="x_RecoveryTime_help">
<?= $Page->RecoveryTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecoveryTime->getErrorMessage() ?></div>
<?php if (!$Page->RecoveryTime->ReadOnly && !$Page->RecoveryTime->Disabled && !isset($Page->RecoveryTime->EditAttrs["readonly"]) && !isset($Page->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
    <div id="r_ShiftedTime" class="form-group row">
        <label id="elh_patient_ot_surgery_register_ShiftedTime" for="x_ShiftedTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_ShiftedTime"><?= $Page->ShiftedTime->caption() ?><?= $Page->ShiftedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ShiftedTime->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_ShiftedTime"><span id="el_patient_ot_surgery_register_ShiftedTime">
<input type="<?= $Page->ShiftedTime->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_ShiftedTime" data-format="11" name="x_ShiftedTime" id="x_ShiftedTime" placeholder="<?= HtmlEncode($Page->ShiftedTime->getPlaceHolder()) ?>" value="<?= $Page->ShiftedTime->EditValue ?>"<?= $Page->ShiftedTime->editAttributes() ?> aria-describedby="x_ShiftedTime_help">
<?= $Page->ShiftedTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ShiftedTime->getErrorMessage() ?></div>
<?php if (!$Page->ShiftedTime->ReadOnly && !$Page->ShiftedTime->Disabled && !isset($Page->ShiftedTime->EditAttrs["readonly"]) && !isset($Page->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_surgery_registeredit", "x_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <div id="r_Duration" class="form-group row">
        <label id="elh_patient_ot_surgery_register_Duration" for="x_Duration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_Duration"><?= $Page->Duration->caption() ?><?= $Page->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Duration->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_Duration"><span id="el_patient_ot_surgery_register_Duration">
<input type="<?= $Page->Duration->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_Duration" name="x_Duration" id="x_Duration" placeholder="<?= HtmlEncode($Page->Duration->getPlaceHolder()) ?>" value="<?= $Page->Duration->EditValue ?>"<?= $Page->Duration->editAttributes() ?> aria-describedby="x_Duration_help">
<?= $Page->Duration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Duration->getErrorMessage() ?></div>
<?php if (!$Page->Duration->ReadOnly && !$Page->Duration->Disabled && !isset($Page->Duration->EditAttrs["readonly"]) && !isset($Page->Duration->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_surgery_registeredit", "timepicker"], function() {
    ew.createTimePicker("fpatient_ot_surgery_registeredit", "x_Duration", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <div id="r_Surgeon" class="form-group row">
        <label id="elh_patient_ot_surgery_register_Surgeon" for="x_Surgeon" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_Surgeon"><?= $Page->Surgeon->caption() ?><?= $Page->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgeon->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_Surgeon"><span id="el_patient_ot_surgery_register_Surgeon">
    <select
        id="x_Surgeon"
        name="x_Surgeon"
        class="form-control ew-select<?= $Page->Surgeon->isInvalidClass() ?>"
        data-select2-id="patient_ot_surgery_register_x_Surgeon"
        data-table="patient_ot_surgery_register"
        data-field="x_Surgeon"
        data-value-separator="<?= $Page->Surgeon->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Surgeon->getPlaceHolder()) ?>"
        <?= $Page->Surgeon->editAttributes() ?>>
        <?= $Page->Surgeon->selectOptionListHtml("x_Surgeon") ?>
    </select>
    <?= $Page->Surgeon->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Surgeon->getErrorMessage() ?></div>
<?= $Page->Surgeon->Lookup->getParamTag($Page, "p_x_Surgeon") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_surgery_register_x_Surgeon']"),
        options = { name: "x_Surgeon", selectId: "patient_ot_surgery_register_x_Surgeon", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_surgery_register.fields.Surgeon.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <div id="r_Anaesthetist" class="form-group row">
        <label id="elh_patient_ot_surgery_register_Anaesthetist" for="x_Anaesthetist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_Anaesthetist"><?= $Page->Anaesthetist->caption() ?><?= $Page->Anaesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anaesthetist->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_Anaesthetist"><span id="el_patient_ot_surgery_register_Anaesthetist">
    <select
        id="x_Anaesthetist"
        name="x_Anaesthetist"
        class="form-control ew-select<?= $Page->Anaesthetist->isInvalidClass() ?>"
        data-select2-id="patient_ot_surgery_register_x_Anaesthetist"
        data-table="patient_ot_surgery_register"
        data-field="x_Anaesthetist"
        data-value-separator="<?= $Page->Anaesthetist->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->Anaesthetist->getPlaceHolder()) ?>"
        <?= $Page->Anaesthetist->editAttributes() ?>>
        <?= $Page->Anaesthetist->selectOptionListHtml("x_Anaesthetist") ?>
    </select>
    <?= $Page->Anaesthetist->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->Anaesthetist->getErrorMessage() ?></div>
<?= $Page->Anaesthetist->Lookup->getParamTag($Page, "p_x_Anaesthetist") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_surgery_register_x_Anaesthetist']"),
        options = { name: "x_Anaesthetist", selectId: "patient_ot_surgery_register_x_Anaesthetist", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_surgery_register.fields.Anaesthetist.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
    <div id="r_AsstSurgeon1" class="form-group row">
        <label id="elh_patient_ot_surgery_register_AsstSurgeon1" for="x_AsstSurgeon1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_AsstSurgeon1"><?= $Page->AsstSurgeon1->caption() ?><?= $Page->AsstSurgeon1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AsstSurgeon1->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_AsstSurgeon1"><span id="el_patient_ot_surgery_register_AsstSurgeon1">
    <select
        id="x_AsstSurgeon1"
        name="x_AsstSurgeon1"
        class="form-control ew-select<?= $Page->AsstSurgeon1->isInvalidClass() ?>"
        data-select2-id="patient_ot_surgery_register_x_AsstSurgeon1"
        data-table="patient_ot_surgery_register"
        data-field="x_AsstSurgeon1"
        data-value-separator="<?= $Page->AsstSurgeon1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->AsstSurgeon1->getPlaceHolder()) ?>"
        <?= $Page->AsstSurgeon1->editAttributes() ?>>
        <?= $Page->AsstSurgeon1->selectOptionListHtml("x_AsstSurgeon1") ?>
    </select>
    <?= $Page->AsstSurgeon1->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->AsstSurgeon1->getErrorMessage() ?></div>
<?= $Page->AsstSurgeon1->Lookup->getParamTag($Page, "p_x_AsstSurgeon1") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_surgery_register_x_AsstSurgeon1']"),
        options = { name: "x_AsstSurgeon1", selectId: "patient_ot_surgery_register_x_AsstSurgeon1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_surgery_register.fields.AsstSurgeon1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
    <div id="r_AsstSurgeon2" class="form-group row">
        <label id="elh_patient_ot_surgery_register_AsstSurgeon2" for="x_AsstSurgeon2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_AsstSurgeon2"><?= $Page->AsstSurgeon2->caption() ?><?= $Page->AsstSurgeon2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AsstSurgeon2->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_AsstSurgeon2"><span id="el_patient_ot_surgery_register_AsstSurgeon2">
    <select
        id="x_AsstSurgeon2"
        name="x_AsstSurgeon2"
        class="form-control ew-select<?= $Page->AsstSurgeon2->isInvalidClass() ?>"
        data-select2-id="patient_ot_surgery_register_x_AsstSurgeon2"
        data-table="patient_ot_surgery_register"
        data-field="x_AsstSurgeon2"
        data-value-separator="<?= $Page->AsstSurgeon2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->AsstSurgeon2->getPlaceHolder()) ?>"
        <?= $Page->AsstSurgeon2->editAttributes() ?>>
        <?= $Page->AsstSurgeon2->selectOptionListHtml("x_AsstSurgeon2") ?>
    </select>
    <?= $Page->AsstSurgeon2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->AsstSurgeon2->getErrorMessage() ?></div>
<?= $Page->AsstSurgeon2->Lookup->getParamTag($Page, "p_x_AsstSurgeon2") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_surgery_register_x_AsstSurgeon2']"),
        options = { name: "x_AsstSurgeon2", selectId: "patient_ot_surgery_register_x_AsstSurgeon2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_surgery_register.fields.AsstSurgeon2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
    <div id="r_paediatric" class="form-group row">
        <label id="elh_patient_ot_surgery_register_paediatric" for="x_paediatric" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_paediatric"><?= $Page->paediatric->caption() ?><?= $Page->paediatric->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->paediatric->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_paediatric"><span id="el_patient_ot_surgery_register_paediatric">
    <select
        id="x_paediatric"
        name="x_paediatric"
        class="form-control ew-select<?= $Page->paediatric->isInvalidClass() ?>"
        data-select2-id="patient_ot_surgery_register_x_paediatric"
        data-table="patient_ot_surgery_register"
        data-field="x_paediatric"
        data-value-separator="<?= $Page->paediatric->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->paediatric->getPlaceHolder()) ?>"
        <?= $Page->paediatric->editAttributes() ?>>
        <?= $Page->paediatric->selectOptionListHtml("x_paediatric") ?>
    </select>
    <?= $Page->paediatric->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->paediatric->getErrorMessage() ?></div>
<?= $Page->paediatric->Lookup->getParamTag($Page, "p_x_paediatric") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_surgery_register_x_paediatric']"),
        options = { name: "x_paediatric", selectId: "patient_ot_surgery_register_x_paediatric", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_surgery_register.fields.paediatric.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
    <div id="r_ScrubNurse1" class="form-group row">
        <label id="elh_patient_ot_surgery_register_ScrubNurse1" for="x_ScrubNurse1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_ScrubNurse1"><?= $Page->ScrubNurse1->caption() ?><?= $Page->ScrubNurse1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ScrubNurse1->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_ScrubNurse1"><span id="el_patient_ot_surgery_register_ScrubNurse1">
<input type="<?= $Page->ScrubNurse1->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_ScrubNurse1" name="x_ScrubNurse1" id="x_ScrubNurse1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ScrubNurse1->getPlaceHolder()) ?>" value="<?= $Page->ScrubNurse1->EditValue ?>"<?= $Page->ScrubNurse1->editAttributes() ?> aria-describedby="x_ScrubNurse1_help">
<?= $Page->ScrubNurse1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ScrubNurse1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
    <div id="r_ScrubNurse2" class="form-group row">
        <label id="elh_patient_ot_surgery_register_ScrubNurse2" for="x_ScrubNurse2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_ScrubNurse2"><?= $Page->ScrubNurse2->caption() ?><?= $Page->ScrubNurse2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ScrubNurse2->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_ScrubNurse2"><span id="el_patient_ot_surgery_register_ScrubNurse2">
<input type="<?= $Page->ScrubNurse2->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_ScrubNurse2" name="x_ScrubNurse2" id="x_ScrubNurse2" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ScrubNurse2->getPlaceHolder()) ?>" value="<?= $Page->ScrubNurse2->EditValue ?>"<?= $Page->ScrubNurse2->editAttributes() ?> aria-describedby="x_ScrubNurse2_help">
<?= $Page->ScrubNurse2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ScrubNurse2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
    <div id="r_FloorNurse" class="form-group row">
        <label id="elh_patient_ot_surgery_register_FloorNurse" for="x_FloorNurse" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_FloorNurse"><?= $Page->FloorNurse->caption() ?><?= $Page->FloorNurse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FloorNurse->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_FloorNurse"><span id="el_patient_ot_surgery_register_FloorNurse">
<input type="<?= $Page->FloorNurse->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_FloorNurse" name="x_FloorNurse" id="x_FloorNurse" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->FloorNurse->getPlaceHolder()) ?>" value="<?= $Page->FloorNurse->EditValue ?>"<?= $Page->FloorNurse->editAttributes() ?> aria-describedby="x_FloorNurse_help">
<?= $Page->FloorNurse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FloorNurse->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
    <div id="r_Technician" class="form-group row">
        <label id="elh_patient_ot_surgery_register_Technician" for="x_Technician" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_Technician"><?= $Page->Technician->caption() ?><?= $Page->Technician->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Technician->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_Technician"><span id="el_patient_ot_surgery_register_Technician">
<input type="<?= $Page->Technician->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_Technician" name="x_Technician" id="x_Technician" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Technician->getPlaceHolder()) ?>" value="<?= $Page->Technician->EditValue ?>"<?= $Page->Technician->editAttributes() ?> aria-describedby="x_Technician_help">
<?= $Page->Technician->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Technician->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
    <div id="r_HouseKeeping" class="form-group row">
        <label id="elh_patient_ot_surgery_register_HouseKeeping" for="x_HouseKeeping" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_HouseKeeping"><?= $Page->HouseKeeping->caption() ?><?= $Page->HouseKeeping->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HouseKeeping->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_HouseKeeping"><span id="el_patient_ot_surgery_register_HouseKeeping">
<input type="<?= $Page->HouseKeeping->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_HouseKeeping" name="x_HouseKeeping" id="x_HouseKeeping" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->HouseKeeping->getPlaceHolder()) ?>" value="<?= $Page->HouseKeeping->EditValue ?>"<?= $Page->HouseKeeping->editAttributes() ?> aria-describedby="x_HouseKeeping_help">
<?= $Page->HouseKeeping->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HouseKeeping->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
    <div id="r_countsCheckedMops" class="form-group row">
        <label id="elh_patient_ot_surgery_register_countsCheckedMops" for="x_countsCheckedMops" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_countsCheckedMops"><?= $Page->countsCheckedMops->caption() ?><?= $Page->countsCheckedMops->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->countsCheckedMops->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_countsCheckedMops"><span id="el_patient_ot_surgery_register_countsCheckedMops">
<input type="<?= $Page->countsCheckedMops->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_countsCheckedMops" name="x_countsCheckedMops" id="x_countsCheckedMops" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->countsCheckedMops->getPlaceHolder()) ?>" value="<?= $Page->countsCheckedMops->EditValue ?>"<?= $Page->countsCheckedMops->editAttributes() ?> aria-describedby="x_countsCheckedMops_help">
<?= $Page->countsCheckedMops->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->countsCheckedMops->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
    <div id="r_gauze" class="form-group row">
        <label id="elh_patient_ot_surgery_register_gauze" for="x_gauze" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_gauze"><?= $Page->gauze->caption() ?><?= $Page->gauze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gauze->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_gauze"><span id="el_patient_ot_surgery_register_gauze">
<input type="<?= $Page->gauze->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_gauze" name="x_gauze" id="x_gauze" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->gauze->getPlaceHolder()) ?>" value="<?= $Page->gauze->EditValue ?>"<?= $Page->gauze->editAttributes() ?> aria-describedby="x_gauze_help">
<?= $Page->gauze->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gauze->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
    <div id="r_needles" class="form-group row">
        <label id="elh_patient_ot_surgery_register_needles" for="x_needles" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_needles"><?= $Page->needles->caption() ?><?= $Page->needles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->needles->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_needles"><span id="el_patient_ot_surgery_register_needles">
<input type="<?= $Page->needles->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_needles" name="x_needles" id="x_needles" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->needles->getPlaceHolder()) ?>" value="<?= $Page->needles->EditValue ?>"<?= $Page->needles->editAttributes() ?> aria-describedby="x_needles_help">
<?= $Page->needles->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->needles->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
    <div id="r_bloodloss" class="form-group row">
        <label id="elh_patient_ot_surgery_register_bloodloss" for="x_bloodloss" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_bloodloss"><?= $Page->bloodloss->caption() ?><?= $Page->bloodloss->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bloodloss->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_bloodloss"><span id="el_patient_ot_surgery_register_bloodloss">
<input type="<?= $Page->bloodloss->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_bloodloss" name="x_bloodloss" id="x_bloodloss" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->bloodloss->getPlaceHolder()) ?>" value="<?= $Page->bloodloss->EditValue ?>"<?= $Page->bloodloss->editAttributes() ?> aria-describedby="x_bloodloss_help">
<?= $Page->bloodloss->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bloodloss->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
    <div id="r_bloodtransfusion" class="form-group row">
        <label id="elh_patient_ot_surgery_register_bloodtransfusion" for="x_bloodtransfusion" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_bloodtransfusion"><?= $Page->bloodtransfusion->caption() ?><?= $Page->bloodtransfusion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bloodtransfusion->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_bloodtransfusion"><span id="el_patient_ot_surgery_register_bloodtransfusion">
<input type="<?= $Page->bloodtransfusion->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_bloodtransfusion" name="x_bloodtransfusion" id="x_bloodtransfusion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->bloodtransfusion->getPlaceHolder()) ?>" value="<?= $Page->bloodtransfusion->EditValue ?>"<?= $Page->bloodtransfusion->editAttributes() ?> aria-describedby="x_bloodtransfusion_help">
<?= $Page->bloodtransfusion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bloodtransfusion->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->implantsUsed->Visible) { // implantsUsed ?>
    <div id="r_implantsUsed" class="form-group row">
        <label id="elh_patient_ot_surgery_register_implantsUsed" for="x_implantsUsed" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_implantsUsed"><?= $Page->implantsUsed->caption() ?><?= $Page->implantsUsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->implantsUsed->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_implantsUsed"><span id="el_patient_ot_surgery_register_implantsUsed">
<textarea data-table="patient_ot_surgery_register" data-field="x_implantsUsed" name="x_implantsUsed" id="x_implantsUsed" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->implantsUsed->getPlaceHolder()) ?>"<?= $Page->implantsUsed->editAttributes() ?> aria-describedby="x_implantsUsed_help"><?= $Page->implantsUsed->EditValue ?></textarea>
<?= $Page->implantsUsed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->implantsUsed->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
    <div id="r_MaterialsForHPE" class="form-group row">
        <label id="elh_patient_ot_surgery_register_MaterialsForHPE" for="x_MaterialsForHPE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_MaterialsForHPE"><?= $Page->MaterialsForHPE->caption() ?><?= $Page->MaterialsForHPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaterialsForHPE->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_MaterialsForHPE"><span id="el_patient_ot_surgery_register_MaterialsForHPE">
<textarea data-table="patient_ot_surgery_register" data-field="x_MaterialsForHPE" name="x_MaterialsForHPE" id="x_MaterialsForHPE" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MaterialsForHPE->getPlaceHolder()) ?>"<?= $Page->MaterialsForHPE->editAttributes() ?> aria-describedby="x_MaterialsForHPE_help"><?= $Page->MaterialsForHPE->EditValue ?></textarea>
<?= $Page->MaterialsForHPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaterialsForHPE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label id="elh_patient_ot_surgery_register_PatientSearch" for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_PatientSearch"><?= $Page->PatientSearch->caption() ?><?= $Page->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_PatientSearch"><span id="el_patient_ot_surgery_register_PatientSearch">
<div class="input-group ew-lookup-list" aria-describedby="x_PatientSearch_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage() ?></div>
<?= $Page->PatientSearch->getCustomMessage() ?>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_ot_surgery_register" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->CurrentValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_ot_surgery_register_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx_patient_ot_surgery_register_Reception"><span id="el_patient_ot_surgery_register_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_ot_surgery_register_Reception"><span id="el_patient_ot_surgery_register_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_patient_ot_surgery_register_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_patient_ot_surgery_register_PatientID"><span id="el_patient_ot_surgery_register_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <div id="r_PId" class="form-group row">
        <label id="elh_patient_ot_surgery_register_PId" for="x_PId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_surgery_register_PId"><?= $Page->PId->caption() ?><?= $Page->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PId->cellAttributes() ?>>
<?php if ($Page->PId->getSessionValue() != "") { ?>
<template id="tpx_patient_ot_surgery_register_PId"><span id="el_patient_ot_surgery_register_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PId->getDisplayValue($Page->PId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_PId" name="x_PId" value="<?= HtmlEncode($Page->PId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_ot_surgery_register_PId"><span id="el_patient_ot_surgery_register_PId">
<input type="<?= $Page->PId->getInputTextType() ?>" data-table="patient_ot_surgery_register" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?= HtmlEncode($Page->PId->getPlaceHolder()) ?>" value="<?= $Page->PId->EditValue ?>"<?= $Page->PId->editAttributes() ?> aria-describedby="x_PId_help">
<?= $Page->PId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_ot_surgery_registeredit" class="ew-custom-template"></div>
<template id="tpm_patient_ot_surgery_registeredit">
<div id="ct_PatientOtSurgeryRegisterEdit"><style>
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
	if($Tid == "")
	{
		$vviid = $_GET["id"] ;
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientID"];
		if($Tid == null)
		{
$Tid = $resuVi[0]["PId"];
		}
		$fk_mrnNo = $resuVi[0]["mrnno"];
	}
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
<div hidden>
<p id="PPatientSearch" hidden><slot class="ew-slot" name="tpc_patient_ot_surgery_register_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_PatientSearch"></slot></p>
</div>
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_ot_surgery_register_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_ot_surgery_register_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_ot_surgery_register_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_surgery_register_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_PatientID"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_surgery_register_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_surgery_register_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_surgery_register_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_ot_surgery_register_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_ot_surgery_register_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_MobileNumber"></slot></p> 
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
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_diagnosis"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_diagnosis"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_proposedSurgery"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_proposedSurgery"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_surgeryProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_surgeryProcedure"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_typeOfAnaesthesia"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_typeOfAnaesthesia"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_RecievedTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_RecievedTime"></slot></td></tr>
							<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_AnaesthesiaStarted"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_AnaesthesiaStarted"></slot></td></tr>
							<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_AnaesthesiaEnded"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_AnaesthesiaEnded"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_surgeryStarted"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_surgeryStarted"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_surgeryEnded"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_surgeryEnded"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_RecoveryTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_RecoveryTime"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_ShiftedTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_ShiftedTime"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_Duration"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_Duration"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_Surgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_Surgeon"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_Anaesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_Anaesthetist"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_AsstSurgeon1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_AsstSurgeon1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_AsstSurgeon2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_AsstSurgeon2"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_paediatric"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_paediatric"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_ScrubNurse1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_ScrubNurse1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_ScrubNurse2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_ScrubNurse2"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_FloorNurse"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_FloorNurse"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_Technician"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_Technician"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_HouseKeeping"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_HouseKeeping"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
			<!-- /.card -->              
		</div>
	<!-- /.col-md-6 -->
</div>
<div class="row">
		 <div class="col-lg-6">
			<div class="card bg-info">             
			  <div class="card-body">
				<table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_countsCheckedMops"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_countsCheckedMops"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_gauze"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_gauze"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_needles"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_needles"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_bloodloss"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_bloodloss"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_bloodtransfusion"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_bloodtransfusion"></slot></td></tr>
					</tbody>
				</table>
			  </div>
			</div>
		 </div>
		  <!-- /.col-md-6 -->
		<div class="col-lg-6">
			<div class="card bg-success">             
			  <div class="card-body">
			  <table  style="width: 100%;"  class="ew-table">
					<tbody>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_implantsUsed"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_implantsUsed"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_surgery_register_MaterialsForHPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_surgery_register_MaterialsForHPE"></slot></td></tr>
					</tbody>
				</table>
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
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?= HtmlEncode(GetUrl($Page->getReturnUrl())) ?>"><?= $Language->phrase("CancelBtn") ?></button>
    </div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<script class="ew-apply-template">
loadjs.ready(["jsrender", "makerjs"], function() {
    ew.templateData = { rows: <?= JsonEncode($Page->Rows) ?> };
    ew.applyTemplate("tpd_patient_ot_surgery_registeredit", "tpm_patient_ot_surgery_registeredit", "patient_ot_surgery_registeredit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_ot_surgery_register");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function callSpatientvitals(){document.getElementById("Repagehistoryview").value="patientvitals"}function callpatienthistory(){document.getElementById("Repagehistoryview").value="patienthistory"}function callpatientprovisionaldiagnosis(){document.getElementById("Repagehistoryview").value="patientprovisionaldiagnosis"}function callpatientprescription(){document.getElementById("Repagehistoryview").value="patientprescription"}function callpatientfinaldiagnosis(){document.getElementById("Repagehistoryview").value="patientfinaldiagnosis"}function callpatientfollowup(){document.getElementById("Repagehistoryview").value="patientfollowup"}function callpatientotdeliveryregister(){document.getElementById("Repagehistoryview").value="patientotdeliveryregister"}function callpatientotsurgeryregister(){document.getElementById("Repagehistoryview").value="patientotsurgeryregister"}
});
</script>

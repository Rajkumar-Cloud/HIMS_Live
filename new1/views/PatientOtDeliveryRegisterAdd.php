<?php

namespace PHPMaker2021\project3;

// Page object
$PatientOtDeliveryRegisterAdd = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_ot_delivery_registeradd;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "add";
    fpatient_ot_delivery_registeradd = currentForm = new ew.Form("fpatient_ot_delivery_registeradd", "add");

    // Add fields
    var fields = ew.vars.tables.patient_ot_delivery_register.fields;
    fpatient_ot_delivery_registeradd.addFields([
        ["Reception", [fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PId", [fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer], fields.PId.isInvalid],
        ["mrnno", [fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["Age", [fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["ObstetricsHistryMale", [fields.ObstetricsHistryMale.required ? ew.Validators.required(fields.ObstetricsHistryMale.caption) : null], fields.ObstetricsHistryMale.isInvalid],
        ["ObstetricsHistryFeMale", [fields.ObstetricsHistryFeMale.required ? ew.Validators.required(fields.ObstetricsHistryFeMale.caption) : null], fields.ObstetricsHistryFeMale.isInvalid],
        ["Abortion", [fields.Abortion.required ? ew.Validators.required(fields.Abortion.caption) : null], fields.Abortion.isInvalid],
        ["ChildBirthDate", [fields.ChildBirthDate.required ? ew.Validators.required(fields.ChildBirthDate.caption) : null, ew.Validators.datetime(0)], fields.ChildBirthDate.isInvalid],
        ["ChildBirthTime", [fields.ChildBirthTime.required ? ew.Validators.required(fields.ChildBirthTime.caption) : null], fields.ChildBirthTime.isInvalid],
        ["ChildSex", [fields.ChildSex.required ? ew.Validators.required(fields.ChildSex.caption) : null], fields.ChildSex.isInvalid],
        ["ChildWt", [fields.ChildWt.required ? ew.Validators.required(fields.ChildWt.caption) : null], fields.ChildWt.isInvalid],
        ["ChildDay", [fields.ChildDay.required ? ew.Validators.required(fields.ChildDay.caption) : null], fields.ChildDay.isInvalid],
        ["ChildOE", [fields.ChildOE.required ? ew.Validators.required(fields.ChildOE.caption) : null], fields.ChildOE.isInvalid],
        ["TypeofDelivery", [fields.TypeofDelivery.required ? ew.Validators.required(fields.TypeofDelivery.caption) : null], fields.TypeofDelivery.isInvalid],
        ["ChildBlGrp", [fields.ChildBlGrp.required ? ew.Validators.required(fields.ChildBlGrp.caption) : null], fields.ChildBlGrp.isInvalid],
        ["ApgarScore", [fields.ApgarScore.required ? ew.Validators.required(fields.ApgarScore.caption) : null], fields.ApgarScore.isInvalid],
        ["birthnotification", [fields.birthnotification.required ? ew.Validators.required(fields.birthnotification.caption) : null], fields.birthnotification.isInvalid],
        ["formno", [fields.formno.required ? ew.Validators.required(fields.formno.caption) : null], fields.formno.isInvalid],
        ["ChildBirthDate1", [fields.ChildBirthDate1.required ? ew.Validators.required(fields.ChildBirthDate1.caption) : null, ew.Validators.datetime(0)], fields.ChildBirthDate1.isInvalid],
        ["ChildBirthTime1", [fields.ChildBirthTime1.required ? ew.Validators.required(fields.ChildBirthTime1.caption) : null], fields.ChildBirthTime1.isInvalid],
        ["ChildSex1", [fields.ChildSex1.required ? ew.Validators.required(fields.ChildSex1.caption) : null], fields.ChildSex1.isInvalid],
        ["ChildWt1", [fields.ChildWt1.required ? ew.Validators.required(fields.ChildWt1.caption) : null], fields.ChildWt1.isInvalid],
        ["ChildDay1", [fields.ChildDay1.required ? ew.Validators.required(fields.ChildDay1.caption) : null], fields.ChildDay1.isInvalid],
        ["ChildOE1", [fields.ChildOE1.required ? ew.Validators.required(fields.ChildOE1.caption) : null], fields.ChildOE1.isInvalid],
        ["TypeofDelivery1", [fields.TypeofDelivery1.required ? ew.Validators.required(fields.TypeofDelivery1.caption) : null], fields.TypeofDelivery1.isInvalid],
        ["ChildBlGrp1", [fields.ChildBlGrp1.required ? ew.Validators.required(fields.ChildBlGrp1.caption) : null], fields.ChildBlGrp1.isInvalid],
        ["ApgarScore1", [fields.ApgarScore1.required ? ew.Validators.required(fields.ApgarScore1.caption) : null], fields.ApgarScore1.isInvalid],
        ["birthnotification1", [fields.birthnotification1.required ? ew.Validators.required(fields.birthnotification1.caption) : null], fields.birthnotification1.isInvalid],
        ["formno1", [fields.formno1.required ? ew.Validators.required(fields.formno1.caption) : null], fields.formno1.isInvalid],
        ["proposedSurgery", [fields.proposedSurgery.required ? ew.Validators.required(fields.proposedSurgery.caption) : null], fields.proposedSurgery.isInvalid],
        ["surgeryProcedure", [fields.surgeryProcedure.required ? ew.Validators.required(fields.surgeryProcedure.caption) : null], fields.surgeryProcedure.isInvalid],
        ["typeOfAnaesthesia", [fields.typeOfAnaesthesia.required ? ew.Validators.required(fields.typeOfAnaesthesia.caption) : null], fields.typeOfAnaesthesia.isInvalid],
        ["RecievedTime", [fields.RecievedTime.required ? ew.Validators.required(fields.RecievedTime.caption) : null, ew.Validators.datetime(0)], fields.RecievedTime.isInvalid],
        ["AnaesthesiaStarted", [fields.AnaesthesiaStarted.required ? ew.Validators.required(fields.AnaesthesiaStarted.caption) : null, ew.Validators.datetime(0)], fields.AnaesthesiaStarted.isInvalid],
        ["AnaesthesiaEnded", [fields.AnaesthesiaEnded.required ? ew.Validators.required(fields.AnaesthesiaEnded.caption) : null, ew.Validators.datetime(0)], fields.AnaesthesiaEnded.isInvalid],
        ["surgeryStarted", [fields.surgeryStarted.required ? ew.Validators.required(fields.surgeryStarted.caption) : null, ew.Validators.datetime(0)], fields.surgeryStarted.isInvalid],
        ["surgeryEnded", [fields.surgeryEnded.required ? ew.Validators.required(fields.surgeryEnded.caption) : null, ew.Validators.datetime(0)], fields.surgeryEnded.isInvalid],
        ["RecoveryTime", [fields.RecoveryTime.required ? ew.Validators.required(fields.RecoveryTime.caption) : null, ew.Validators.datetime(0)], fields.RecoveryTime.isInvalid],
        ["ShiftedTime", [fields.ShiftedTime.required ? ew.Validators.required(fields.ShiftedTime.caption) : null, ew.Validators.datetime(0)], fields.ShiftedTime.isInvalid],
        ["Duration", [fields.Duration.required ? ew.Validators.required(fields.Duration.caption) : null], fields.Duration.isInvalid],
        ["DrVisit1", [fields.DrVisit1.required ? ew.Validators.required(fields.DrVisit1.caption) : null], fields.DrVisit1.isInvalid],
        ["DrVisit2", [fields.DrVisit2.required ? ew.Validators.required(fields.DrVisit2.caption) : null], fields.DrVisit2.isInvalid],
        ["DrVisit3", [fields.DrVisit3.required ? ew.Validators.required(fields.DrVisit3.caption) : null], fields.DrVisit3.isInvalid],
        ["DrVisit4", [fields.DrVisit4.required ? ew.Validators.required(fields.DrVisit4.caption) : null], fields.DrVisit4.isInvalid],
        ["Surgeon", [fields.Surgeon.required ? ew.Validators.required(fields.Surgeon.caption) : null], fields.Surgeon.isInvalid],
        ["Anaesthetist", [fields.Anaesthetist.required ? ew.Validators.required(fields.Anaesthetist.caption) : null], fields.Anaesthetist.isInvalid],
        ["AsstSurgeon1", [fields.AsstSurgeon1.required ? ew.Validators.required(fields.AsstSurgeon1.caption) : null], fields.AsstSurgeon1.isInvalid],
        ["AsstSurgeon2", [fields.AsstSurgeon2.required ? ew.Validators.required(fields.AsstSurgeon2.caption) : null], fields.AsstSurgeon2.isInvalid],
        ["paediatric", [fields.paediatric.required ? ew.Validators.required(fields.paediatric.caption) : null], fields.paediatric.isInvalid],
        ["ScrubNurse1", [fields.ScrubNurse1.required ? ew.Validators.required(fields.ScrubNurse1.caption) : null], fields.ScrubNurse1.isInvalid],
        ["ScrubNurse2", [fields.ScrubNurse2.required ? ew.Validators.required(fields.ScrubNurse2.caption) : null], fields.ScrubNurse2.isInvalid],
        ["FloorNurse", [fields.FloorNurse.required ? ew.Validators.required(fields.FloorNurse.caption) : null], fields.FloorNurse.isInvalid],
        ["Technician", [fields.Technician.required ? ew.Validators.required(fields.Technician.caption) : null], fields.Technician.isInvalid],
        ["HouseKeeping", [fields.HouseKeeping.required ? ew.Validators.required(fields.HouseKeeping.caption) : null], fields.HouseKeeping.isInvalid],
        ["countsCheckedMops", [fields.countsCheckedMops.required ? ew.Validators.required(fields.countsCheckedMops.caption) : null], fields.countsCheckedMops.isInvalid],
        ["gauze", [fields.gauze.required ? ew.Validators.required(fields.gauze.caption) : null], fields.gauze.isInvalid],
        ["needles", [fields.needles.required ? ew.Validators.required(fields.needles.caption) : null], fields.needles.isInvalid],
        ["bloodloss", [fields.bloodloss.required ? ew.Validators.required(fields.bloodloss.caption) : null], fields.bloodloss.isInvalid],
        ["bloodtransfusion", [fields.bloodtransfusion.required ? ew.Validators.required(fields.bloodtransfusion.caption) : null], fields.bloodtransfusion.isInvalid],
        ["implantsUsed", [fields.implantsUsed.required ? ew.Validators.required(fields.implantsUsed.caption) : null], fields.implantsUsed.isInvalid],
        ["MaterialsForHPE", [fields.MaterialsForHPE.required ? ew.Validators.required(fields.MaterialsForHPE.caption) : null], fields.MaterialsForHPE.isInvalid],
        ["dte", [fields.dte.required ? ew.Validators.required(fields.dte.caption) : null, ew.Validators.datetime(0)], fields.dte.isInvalid],
        ["motherReligion", [fields.motherReligion.required ? ew.Validators.required(fields.motherReligion.caption) : null], fields.motherReligion.isInvalid],
        ["bloodgroup", [fields.bloodgroup.required ? ew.Validators.required(fields.bloodgroup.caption) : null], fields.bloodgroup.isInvalid],
        ["status", [fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["PatientID", [fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["HospID", [fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null, ew.Validators.integer], fields.HospID.isInvalid],
        ["PatID", [fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_ot_delivery_registeradd,
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
    fpatient_ot_delivery_registeradd.validate = function () {
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
    fpatient_ot_delivery_registeradd.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_ot_delivery_registeradd.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_ot_delivery_registeradd");
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
<form name="fpatient_ot_delivery_registeradd" id="fpatient_ot_delivery_registeradd" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <div id="r_PId" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PId" for="x_PId" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PId->caption() ?><?= $Page->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PId->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_PId">
<input type="<?= $Page->PId->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?= HtmlEncode($Page->PId->getPlaceHolder()) ?>" value="<?= $Page->PId->EditValue ?>"<?= $Page->PId->editAttributes() ?> aria-describedby="x_PId_help">
<?= $Page->PId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PId->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_ot_delivery_register_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_ot_delivery_register_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_profilePic">
<textarea data-table="patient_ot_delivery_register" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricsHistryMale->Visible) { // ObstetricsHistryMale ?>
    <div id="r_ObstetricsHistryMale" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ObstetricsHistryMale" for="x_ObstetricsHistryMale" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ObstetricsHistryMale->caption() ?><?= $Page->ObstetricsHistryMale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricsHistryMale->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ObstetricsHistryMale">
<input type="<?= $Page->ObstetricsHistryMale->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryMale" name="x_ObstetricsHistryMale" id="x_ObstetricsHistryMale" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ObstetricsHistryMale->getPlaceHolder()) ?>" value="<?= $Page->ObstetricsHistryMale->EditValue ?>"<?= $Page->ObstetricsHistryMale->editAttributes() ?> aria-describedby="x_ObstetricsHistryMale_help">
<?= $Page->ObstetricsHistryMale->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ObstetricsHistryMale->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
    <div id="r_ObstetricsHistryFeMale" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" for="x_ObstetricsHistryFeMale" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ObstetricsHistryFeMale->caption() ?><?= $Page->ObstetricsHistryFeMale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricsHistryFeMale->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="<?= $Page->ObstetricsHistryFeMale->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x_ObstetricsHistryFeMale" id="x_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?= $Page->ObstetricsHistryFeMale->EditValue ?>"<?= $Page->ObstetricsHistryFeMale->editAttributes() ?> aria-describedby="x_ObstetricsHistryFeMale_help">
<?= $Page->ObstetricsHistryFeMale->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ObstetricsHistryFeMale->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abortion->Visible) { // Abortion ?>
    <div id="r_Abortion" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Abortion" for="x_Abortion" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Abortion->caption() ?><?= $Page->Abortion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abortion->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_Abortion">
<input type="<?= $Page->Abortion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x_Abortion" id="x_Abortion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Abortion->getPlaceHolder()) ?>" value="<?= $Page->Abortion->EditValue ?>"<?= $Page->Abortion->editAttributes() ?> aria-describedby="x_Abortion_help">
<?= $Page->Abortion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abortion->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
    <div id="r_ChildBirthDate" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBirthDate" for="x_ChildBirthDate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildBirthDate->caption() ?><?= $Page->ChildBirthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBirthDate->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildBirthDate">
<input type="<?= $Page->ChildBirthDate->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" name="x_ChildBirthDate" id="x_ChildBirthDate" placeholder="<?= HtmlEncode($Page->ChildBirthDate->getPlaceHolder()) ?>" value="<?= $Page->ChildBirthDate->EditValue ?>"<?= $Page->ChildBirthDate->editAttributes() ?> aria-describedby="x_ChildBirthDate_help">
<?= $Page->ChildBirthDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBirthDate->getErrorMessage() ?></div>
<?php if (!$Page->ChildBirthDate->ReadOnly && !$Page->ChildBirthDate->Disabled && !isset($Page->ChildBirthDate->EditAttrs["readonly"]) && !isset($Page->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
    <div id="r_ChildBirthTime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBirthTime" for="x_ChildBirthTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildBirthTime->caption() ?><?= $Page->ChildBirthTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBirthTime->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildBirthTime">
<input type="<?= $Page->ChildBirthTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x_ChildBirthTime" id="x_ChildBirthTime" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildBirthTime->getPlaceHolder()) ?>" value="<?= $Page->ChildBirthTime->EditValue ?>"<?= $Page->ChildBirthTime->editAttributes() ?> aria-describedby="x_ChildBirthTime_help">
<?= $Page->ChildBirthTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBirthTime->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildSex->Visible) { // ChildSex ?>
    <div id="r_ChildSex" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildSex" for="x_ChildSex" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildSex->caption() ?><?= $Page->ChildSex->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildSex->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildSex">
<input type="<?= $Page->ChildSex->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x_ChildSex" id="x_ChildSex" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildSex->getPlaceHolder()) ?>" value="<?= $Page->ChildSex->EditValue ?>"<?= $Page->ChildSex->editAttributes() ?> aria-describedby="x_ChildSex_help">
<?= $Page->ChildSex->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildSex->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildWt->Visible) { // ChildWt ?>
    <div id="r_ChildWt" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildWt" for="x_ChildWt" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildWt->caption() ?><?= $Page->ChildWt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildWt->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildWt">
<input type="<?= $Page->ChildWt->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x_ChildWt" id="x_ChildWt" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildWt->getPlaceHolder()) ?>" value="<?= $Page->ChildWt->EditValue ?>"<?= $Page->ChildWt->editAttributes() ?> aria-describedby="x_ChildWt_help">
<?= $Page->ChildWt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildWt->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildDay->Visible) { // ChildDay ?>
    <div id="r_ChildDay" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildDay" for="x_ChildDay" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildDay->caption() ?><?= $Page->ChildDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildDay->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildDay">
<input type="<?= $Page->ChildDay->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x_ChildDay" id="x_ChildDay" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildDay->getPlaceHolder()) ?>" value="<?= $Page->ChildDay->EditValue ?>"<?= $Page->ChildDay->editAttributes() ?> aria-describedby="x_ChildDay_help">
<?= $Page->ChildDay->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildDay->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildOE->Visible) { // ChildOE ?>
    <div id="r_ChildOE" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildOE" for="x_ChildOE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildOE->caption() ?><?= $Page->ChildOE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildOE->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildOE">
<input type="<?= $Page->ChildOE->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x_ChildOE" id="x_ChildOE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildOE->getPlaceHolder()) ?>" value="<?= $Page->ChildOE->EditValue ?>"<?= $Page->ChildOE->editAttributes() ?> aria-describedby="x_ChildOE_help">
<?= $Page->ChildOE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildOE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeofDelivery->Visible) { // TypeofDelivery ?>
    <div id="r_TypeofDelivery" class="form-group row">
        <label id="elh_patient_ot_delivery_register_TypeofDelivery" for="x_TypeofDelivery" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TypeofDelivery->caption() ?><?= $Page->TypeofDelivery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeofDelivery->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_TypeofDelivery">
<textarea data-table="patient_ot_delivery_register" data-field="x_TypeofDelivery" name="x_TypeofDelivery" id="x_TypeofDelivery" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->TypeofDelivery->getPlaceHolder()) ?>"<?= $Page->TypeofDelivery->editAttributes() ?> aria-describedby="x_TypeofDelivery_help"><?= $Page->TypeofDelivery->EditValue ?></textarea>
<?= $Page->TypeofDelivery->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeofDelivery->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
    <div id="r_ChildBlGrp" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBlGrp" for="x_ChildBlGrp" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildBlGrp->caption() ?><?= $Page->ChildBlGrp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBlGrp->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildBlGrp">
<input type="<?= $Page->ChildBlGrp->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x_ChildBlGrp" id="x_ChildBlGrp" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildBlGrp->getPlaceHolder()) ?>" value="<?= $Page->ChildBlGrp->EditValue ?>"<?= $Page->ChildBlGrp->editAttributes() ?> aria-describedby="x_ChildBlGrp_help">
<?= $Page->ChildBlGrp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBlGrp->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
    <div id="r_ApgarScore" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ApgarScore" for="x_ApgarScore" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ApgarScore->caption() ?><?= $Page->ApgarScore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ApgarScore->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ApgarScore">
<input type="<?= $Page->ApgarScore->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x_ApgarScore" id="x_ApgarScore" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ApgarScore->getPlaceHolder()) ?>" value="<?= $Page->ApgarScore->EditValue ?>"<?= $Page->ApgarScore->editAttributes() ?> aria-describedby="x_ApgarScore_help">
<?= $Page->ApgarScore->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ApgarScore->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->birthnotification->Visible) { // birthnotification ?>
    <div id="r_birthnotification" class="form-group row">
        <label id="elh_patient_ot_delivery_register_birthnotification" for="x_birthnotification" class="<?= $Page->LeftColumnClass ?>"><?= $Page->birthnotification->caption() ?><?= $Page->birthnotification->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->birthnotification->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_birthnotification">
<input type="<?= $Page->birthnotification->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x_birthnotification" id="x_birthnotification" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->birthnotification->getPlaceHolder()) ?>" value="<?= $Page->birthnotification->EditValue ?>"<?= $Page->birthnotification->editAttributes() ?> aria-describedby="x_birthnotification_help">
<?= $Page->birthnotification->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->birthnotification->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->formno->Visible) { // formno ?>
    <div id="r_formno" class="form-group row">
        <label id="elh_patient_ot_delivery_register_formno" for="x_formno" class="<?= $Page->LeftColumnClass ?>"><?= $Page->formno->caption() ?><?= $Page->formno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->formno->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_formno">
<input type="<?= $Page->formno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno" name="x_formno" id="x_formno" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->formno->getPlaceHolder()) ?>" value="<?= $Page->formno->EditValue ?>"<?= $Page->formno->editAttributes() ?> aria-describedby="x_formno_help">
<?= $Page->formno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->formno->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
    <div id="r_ChildBirthDate1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBirthDate1" for="x_ChildBirthDate1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildBirthDate1->caption() ?><?= $Page->ChildBirthDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBirthDate1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildBirthDate1">
<input type="<?= $Page->ChildBirthDate1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x_ChildBirthDate1" id="x_ChildBirthDate1" placeholder="<?= HtmlEncode($Page->ChildBirthDate1->getPlaceHolder()) ?>" value="<?= $Page->ChildBirthDate1->EditValue ?>"<?= $Page->ChildBirthDate1->editAttributes() ?> aria-describedby="x_ChildBirthDate1_help">
<?= $Page->ChildBirthDate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBirthDate1->getErrorMessage() ?></div>
<?php if (!$Page->ChildBirthDate1->ReadOnly && !$Page->ChildBirthDate1->Disabled && !isset($Page->ChildBirthDate1->EditAttrs["readonly"]) && !isset($Page->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
    <div id="r_ChildBirthTime1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBirthTime1" for="x_ChildBirthTime1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildBirthTime1->caption() ?><?= $Page->ChildBirthTime1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBirthTime1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildBirthTime1">
<input type="<?= $Page->ChildBirthTime1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x_ChildBirthTime1" id="x_ChildBirthTime1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildBirthTime1->getPlaceHolder()) ?>" value="<?= $Page->ChildBirthTime1->EditValue ?>"<?= $Page->ChildBirthTime1->editAttributes() ?> aria-describedby="x_ChildBirthTime1_help">
<?= $Page->ChildBirthTime1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBirthTime1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
    <div id="r_ChildSex1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildSex1" for="x_ChildSex1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildSex1->caption() ?><?= $Page->ChildSex1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildSex1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildSex1">
<input type="<?= $Page->ChildSex1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x_ChildSex1" id="x_ChildSex1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildSex1->getPlaceHolder()) ?>" value="<?= $Page->ChildSex1->EditValue ?>"<?= $Page->ChildSex1->editAttributes() ?> aria-describedby="x_ChildSex1_help">
<?= $Page->ChildSex1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildSex1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
    <div id="r_ChildWt1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildWt1" for="x_ChildWt1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildWt1->caption() ?><?= $Page->ChildWt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildWt1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildWt1">
<input type="<?= $Page->ChildWt1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x_ChildWt1" id="x_ChildWt1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildWt1->getPlaceHolder()) ?>" value="<?= $Page->ChildWt1->EditValue ?>"<?= $Page->ChildWt1->editAttributes() ?> aria-describedby="x_ChildWt1_help">
<?= $Page->ChildWt1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildWt1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
    <div id="r_ChildDay1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildDay1" for="x_ChildDay1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildDay1->caption() ?><?= $Page->ChildDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildDay1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildDay1">
<input type="<?= $Page->ChildDay1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x_ChildDay1" id="x_ChildDay1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildDay1->getPlaceHolder()) ?>" value="<?= $Page->ChildDay1->EditValue ?>"<?= $Page->ChildDay1->editAttributes() ?> aria-describedby="x_ChildDay1_help">
<?= $Page->ChildDay1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildDay1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
    <div id="r_ChildOE1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildOE1" for="x_ChildOE1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildOE1->caption() ?><?= $Page->ChildOE1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildOE1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildOE1">
<input type="<?= $Page->ChildOE1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x_ChildOE1" id="x_ChildOE1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildOE1->getPlaceHolder()) ?>" value="<?= $Page->ChildOE1->EditValue ?>"<?= $Page->ChildOE1->editAttributes() ?> aria-describedby="x_ChildOE1_help">
<?= $Page->ChildOE1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildOE1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeofDelivery1->Visible) { // TypeofDelivery1 ?>
    <div id="r_TypeofDelivery1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_TypeofDelivery1" for="x_TypeofDelivery1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->TypeofDelivery1->caption() ?><?= $Page->TypeofDelivery1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeofDelivery1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_TypeofDelivery1">
<textarea data-table="patient_ot_delivery_register" data-field="x_TypeofDelivery1" name="x_TypeofDelivery1" id="x_TypeofDelivery1" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->TypeofDelivery1->getPlaceHolder()) ?>"<?= $Page->TypeofDelivery1->editAttributes() ?> aria-describedby="x_TypeofDelivery1_help"><?= $Page->TypeofDelivery1->EditValue ?></textarea>
<?= $Page->TypeofDelivery1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeofDelivery1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
    <div id="r_ChildBlGrp1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBlGrp1" for="x_ChildBlGrp1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ChildBlGrp1->caption() ?><?= $Page->ChildBlGrp1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBlGrp1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ChildBlGrp1">
<input type="<?= $Page->ChildBlGrp1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x_ChildBlGrp1" id="x_ChildBlGrp1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildBlGrp1->getPlaceHolder()) ?>" value="<?= $Page->ChildBlGrp1->EditValue ?>"<?= $Page->ChildBlGrp1->editAttributes() ?> aria-describedby="x_ChildBlGrp1_help">
<?= $Page->ChildBlGrp1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBlGrp1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
    <div id="r_ApgarScore1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ApgarScore1" for="x_ApgarScore1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ApgarScore1->caption() ?><?= $Page->ApgarScore1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ApgarScore1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ApgarScore1">
<input type="<?= $Page->ApgarScore1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x_ApgarScore1" id="x_ApgarScore1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ApgarScore1->getPlaceHolder()) ?>" value="<?= $Page->ApgarScore1->EditValue ?>"<?= $Page->ApgarScore1->editAttributes() ?> aria-describedby="x_ApgarScore1_help">
<?= $Page->ApgarScore1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ApgarScore1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
    <div id="r_birthnotification1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_birthnotification1" for="x_birthnotification1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->birthnotification1->caption() ?><?= $Page->birthnotification1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->birthnotification1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_birthnotification1">
<input type="<?= $Page->birthnotification1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x_birthnotification1" id="x_birthnotification1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->birthnotification1->getPlaceHolder()) ?>" value="<?= $Page->birthnotification1->EditValue ?>"<?= $Page->birthnotification1->editAttributes() ?> aria-describedby="x_birthnotification1_help">
<?= $Page->birthnotification1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->birthnotification1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->formno1->Visible) { // formno1 ?>
    <div id="r_formno1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_formno1" for="x_formno1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->formno1->caption() ?><?= $Page->formno1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->formno1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_formno1">
<input type="<?= $Page->formno1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x_formno1" id="x_formno1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->formno1->getPlaceHolder()) ?>" value="<?= $Page->formno1->EditValue ?>"<?= $Page->formno1->editAttributes() ?> aria-describedby="x_formno1_help">
<?= $Page->formno1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->formno1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->proposedSurgery->Visible) { // proposedSurgery ?>
    <div id="r_proposedSurgery" class="form-group row">
        <label id="elh_patient_ot_delivery_register_proposedSurgery" for="x_proposedSurgery" class="<?= $Page->LeftColumnClass ?>"><?= $Page->proposedSurgery->caption() ?><?= $Page->proposedSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->proposedSurgery->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_proposedSurgery">
<textarea data-table="patient_ot_delivery_register" data-field="x_proposedSurgery" name="x_proposedSurgery" id="x_proposedSurgery" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->proposedSurgery->getPlaceHolder()) ?>"<?= $Page->proposedSurgery->editAttributes() ?> aria-describedby="x_proposedSurgery_help"><?= $Page->proposedSurgery->EditValue ?></textarea>
<?= $Page->proposedSurgery->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->proposedSurgery->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryProcedure->Visible) { // surgeryProcedure ?>
    <div id="r_surgeryProcedure" class="form-group row">
        <label id="elh_patient_ot_delivery_register_surgeryProcedure" for="x_surgeryProcedure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->surgeryProcedure->caption() ?><?= $Page->surgeryProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryProcedure->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_surgeryProcedure">
<textarea data-table="patient_ot_delivery_register" data-field="x_surgeryProcedure" name="x_surgeryProcedure" id="x_surgeryProcedure" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->surgeryProcedure->getPlaceHolder()) ?>"<?= $Page->surgeryProcedure->editAttributes() ?> aria-describedby="x_surgeryProcedure_help"><?= $Page->surgeryProcedure->EditValue ?></textarea>
<?= $Page->surgeryProcedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryProcedure->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
    <div id="r_typeOfAnaesthesia" class="form-group row">
        <label id="elh_patient_ot_delivery_register_typeOfAnaesthesia" for="x_typeOfAnaesthesia" class="<?= $Page->LeftColumnClass ?>"><?= $Page->typeOfAnaesthesia->caption() ?><?= $Page->typeOfAnaesthesia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeOfAnaesthesia->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_typeOfAnaesthesia">
<textarea data-table="patient_ot_delivery_register" data-field="x_typeOfAnaesthesia" name="x_typeOfAnaesthesia" id="x_typeOfAnaesthesia" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->typeOfAnaesthesia->getPlaceHolder()) ?>"<?= $Page->typeOfAnaesthesia->editAttributes() ?> aria-describedby="x_typeOfAnaesthesia_help"><?= $Page->typeOfAnaesthesia->EditValue ?></textarea>
<?= $Page->typeOfAnaesthesia->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->typeOfAnaesthesia->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
    <div id="r_RecievedTime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_RecievedTime" for="x_RecievedTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RecievedTime->caption() ?><?= $Page->RecievedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecievedTime->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_RecievedTime">
<input type="<?= $Page->RecievedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" name="x_RecievedTime" id="x_RecievedTime" placeholder="<?= HtmlEncode($Page->RecievedTime->getPlaceHolder()) ?>" value="<?= $Page->RecievedTime->EditValue ?>"<?= $Page->RecievedTime->editAttributes() ?> aria-describedby="x_RecievedTime_help">
<?= $Page->RecievedTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecievedTime->getErrorMessage() ?></div>
<?php if (!$Page->RecievedTime->ReadOnly && !$Page->RecievedTime->Disabled && !isset($Page->RecievedTime->EditAttrs["readonly"]) && !isset($Page->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
    <div id="r_AnaesthesiaStarted" class="form-group row">
        <label id="elh_patient_ot_delivery_register_AnaesthesiaStarted" for="x_AnaesthesiaStarted" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnaesthesiaStarted->caption() ?><?= $Page->AnaesthesiaStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_AnaesthesiaStarted">
<input type="<?= $Page->AnaesthesiaStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" name="x_AnaesthesiaStarted" id="x_AnaesthesiaStarted" placeholder="<?= HtmlEncode($Page->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?= $Page->AnaesthesiaStarted->EditValue ?>"<?= $Page->AnaesthesiaStarted->editAttributes() ?> aria-describedby="x_AnaesthesiaStarted_help">
<?= $Page->AnaesthesiaStarted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnaesthesiaStarted->getErrorMessage() ?></div>
<?php if (!$Page->AnaesthesiaStarted->ReadOnly && !$Page->AnaesthesiaStarted->Disabled && !isset($Page->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($Page->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
    <div id="r_AnaesthesiaEnded" class="form-group row">
        <label id="elh_patient_ot_delivery_register_AnaesthesiaEnded" for="x_AnaesthesiaEnded" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnaesthesiaEnded->caption() ?><?= $Page->AnaesthesiaEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_AnaesthesiaEnded">
<input type="<?= $Page->AnaesthesiaEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" name="x_AnaesthesiaEnded" id="x_AnaesthesiaEnded" placeholder="<?= HtmlEncode($Page->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?= $Page->AnaesthesiaEnded->EditValue ?>"<?= $Page->AnaesthesiaEnded->editAttributes() ?> aria-describedby="x_AnaesthesiaEnded_help">
<?= $Page->AnaesthesiaEnded->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnaesthesiaEnded->getErrorMessage() ?></div>
<?php if (!$Page->AnaesthesiaEnded->ReadOnly && !$Page->AnaesthesiaEnded->Disabled && !isset($Page->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($Page->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
    <div id="r_surgeryStarted" class="form-group row">
        <label id="elh_patient_ot_delivery_register_surgeryStarted" for="x_surgeryStarted" class="<?= $Page->LeftColumnClass ?>"><?= $Page->surgeryStarted->caption() ?><?= $Page->surgeryStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryStarted->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_surgeryStarted">
<input type="<?= $Page->surgeryStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" name="x_surgeryStarted" id="x_surgeryStarted" placeholder="<?= HtmlEncode($Page->surgeryStarted->getPlaceHolder()) ?>" value="<?= $Page->surgeryStarted->EditValue ?>"<?= $Page->surgeryStarted->editAttributes() ?> aria-describedby="x_surgeryStarted_help">
<?= $Page->surgeryStarted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryStarted->getErrorMessage() ?></div>
<?php if (!$Page->surgeryStarted->ReadOnly && !$Page->surgeryStarted->Disabled && !isset($Page->surgeryStarted->EditAttrs["readonly"]) && !isset($Page->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
    <div id="r_surgeryEnded" class="form-group row">
        <label id="elh_patient_ot_delivery_register_surgeryEnded" for="x_surgeryEnded" class="<?= $Page->LeftColumnClass ?>"><?= $Page->surgeryEnded->caption() ?><?= $Page->surgeryEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryEnded->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_surgeryEnded">
<input type="<?= $Page->surgeryEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" name="x_surgeryEnded" id="x_surgeryEnded" placeholder="<?= HtmlEncode($Page->surgeryEnded->getPlaceHolder()) ?>" value="<?= $Page->surgeryEnded->EditValue ?>"<?= $Page->surgeryEnded->editAttributes() ?> aria-describedby="x_surgeryEnded_help">
<?= $Page->surgeryEnded->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryEnded->getErrorMessage() ?></div>
<?php if (!$Page->surgeryEnded->ReadOnly && !$Page->surgeryEnded->Disabled && !isset($Page->surgeryEnded->EditAttrs["readonly"]) && !isset($Page->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
    <div id="r_RecoveryTime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_RecoveryTime" for="x_RecoveryTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->RecoveryTime->caption() ?><?= $Page->RecoveryTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecoveryTime->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_RecoveryTime">
<input type="<?= $Page->RecoveryTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" name="x_RecoveryTime" id="x_RecoveryTime" placeholder="<?= HtmlEncode($Page->RecoveryTime->getPlaceHolder()) ?>" value="<?= $Page->RecoveryTime->EditValue ?>"<?= $Page->RecoveryTime->editAttributes() ?> aria-describedby="x_RecoveryTime_help">
<?= $Page->RecoveryTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecoveryTime->getErrorMessage() ?></div>
<?php if (!$Page->RecoveryTime->ReadOnly && !$Page->RecoveryTime->Disabled && !isset($Page->RecoveryTime->EditAttrs["readonly"]) && !isset($Page->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
    <div id="r_ShiftedTime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ShiftedTime" for="x_ShiftedTime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ShiftedTime->caption() ?><?= $Page->ShiftedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ShiftedTime->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ShiftedTime">
<input type="<?= $Page->ShiftedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" name="x_ShiftedTime" id="x_ShiftedTime" placeholder="<?= HtmlEncode($Page->ShiftedTime->getPlaceHolder()) ?>" value="<?= $Page->ShiftedTime->EditValue ?>"<?= $Page->ShiftedTime->editAttributes() ?> aria-describedby="x_ShiftedTime_help">
<?= $Page->ShiftedTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ShiftedTime->getErrorMessage() ?></div>
<?php if (!$Page->ShiftedTime->ReadOnly && !$Page->ShiftedTime->Disabled && !isset($Page->ShiftedTime->EditAttrs["readonly"]) && !isset($Page->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <div id="r_Duration" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Duration" for="x_Duration" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Duration->caption() ?><?= $Page->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Duration->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_Duration">
<input type="<?= $Page->Duration->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Duration->getPlaceHolder()) ?>" value="<?= $Page->Duration->EditValue ?>"<?= $Page->Duration->editAttributes() ?> aria-describedby="x_Duration_help">
<?= $Page->Duration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Duration->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrVisit1->Visible) { // DrVisit1 ?>
    <div id="r_DrVisit1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_DrVisit1" for="x_DrVisit1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrVisit1->caption() ?><?= $Page->DrVisit1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrVisit1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_DrVisit1">
<textarea data-table="patient_ot_delivery_register" data-field="x_DrVisit1" name="x_DrVisit1" id="x_DrVisit1" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DrVisit1->getPlaceHolder()) ?>"<?= $Page->DrVisit1->editAttributes() ?> aria-describedby="x_DrVisit1_help"><?= $Page->DrVisit1->EditValue ?></textarea>
<?= $Page->DrVisit1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrVisit1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrVisit2->Visible) { // DrVisit2 ?>
    <div id="r_DrVisit2" class="form-group row">
        <label id="elh_patient_ot_delivery_register_DrVisit2" for="x_DrVisit2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrVisit2->caption() ?><?= $Page->DrVisit2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrVisit2->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_DrVisit2">
<textarea data-table="patient_ot_delivery_register" data-field="x_DrVisit2" name="x_DrVisit2" id="x_DrVisit2" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DrVisit2->getPlaceHolder()) ?>"<?= $Page->DrVisit2->editAttributes() ?> aria-describedby="x_DrVisit2_help"><?= $Page->DrVisit2->EditValue ?></textarea>
<?= $Page->DrVisit2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrVisit2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrVisit3->Visible) { // DrVisit3 ?>
    <div id="r_DrVisit3" class="form-group row">
        <label id="elh_patient_ot_delivery_register_DrVisit3" for="x_DrVisit3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrVisit3->caption() ?><?= $Page->DrVisit3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrVisit3->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_DrVisit3">
<textarea data-table="patient_ot_delivery_register" data-field="x_DrVisit3" name="x_DrVisit3" id="x_DrVisit3" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DrVisit3->getPlaceHolder()) ?>"<?= $Page->DrVisit3->editAttributes() ?> aria-describedby="x_DrVisit3_help"><?= $Page->DrVisit3->EditValue ?></textarea>
<?= $Page->DrVisit3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrVisit3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrVisit4->Visible) { // DrVisit4 ?>
    <div id="r_DrVisit4" class="form-group row">
        <label id="elh_patient_ot_delivery_register_DrVisit4" for="x_DrVisit4" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DrVisit4->caption() ?><?= $Page->DrVisit4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrVisit4->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_DrVisit4">
<textarea data-table="patient_ot_delivery_register" data-field="x_DrVisit4" name="x_DrVisit4" id="x_DrVisit4" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DrVisit4->getPlaceHolder()) ?>"<?= $Page->DrVisit4->editAttributes() ?> aria-describedby="x_DrVisit4_help"><?= $Page->DrVisit4->EditValue ?></textarea>
<?= $Page->DrVisit4->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DrVisit4->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <div id="r_Surgeon" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Surgeon" for="x_Surgeon" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Surgeon->caption() ?><?= $Page->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgeon->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_Surgeon">
<input type="<?= $Page->Surgeon->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Surgeon" name="x_Surgeon" id="x_Surgeon" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Surgeon->getPlaceHolder()) ?>" value="<?= $Page->Surgeon->EditValue ?>"<?= $Page->Surgeon->editAttributes() ?> aria-describedby="x_Surgeon_help">
<?= $Page->Surgeon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Surgeon->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <div id="r_Anaesthetist" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Anaesthetist" for="x_Anaesthetist" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Anaesthetist->caption() ?><?= $Page->Anaesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anaesthetist->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_Anaesthetist">
<input type="<?= $Page->Anaesthetist->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" name="x_Anaesthetist" id="x_Anaesthetist" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Anaesthetist->getPlaceHolder()) ?>" value="<?= $Page->Anaesthetist->EditValue ?>"<?= $Page->Anaesthetist->editAttributes() ?> aria-describedby="x_Anaesthetist_help">
<?= $Page->Anaesthetist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anaesthetist->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
    <div id="r_AsstSurgeon1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_AsstSurgeon1" for="x_AsstSurgeon1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AsstSurgeon1->caption() ?><?= $Page->AsstSurgeon1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AsstSurgeon1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_AsstSurgeon1">
<input type="<?= $Page->AsstSurgeon1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" name="x_AsstSurgeon1" id="x_AsstSurgeon1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AsstSurgeon1->getPlaceHolder()) ?>" value="<?= $Page->AsstSurgeon1->EditValue ?>"<?= $Page->AsstSurgeon1->editAttributes() ?> aria-describedby="x_AsstSurgeon1_help">
<?= $Page->AsstSurgeon1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AsstSurgeon1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
    <div id="r_AsstSurgeon2" class="form-group row">
        <label id="elh_patient_ot_delivery_register_AsstSurgeon2" for="x_AsstSurgeon2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AsstSurgeon2->caption() ?><?= $Page->AsstSurgeon2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AsstSurgeon2->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_AsstSurgeon2">
<input type="<?= $Page->AsstSurgeon2->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" name="x_AsstSurgeon2" id="x_AsstSurgeon2" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AsstSurgeon2->getPlaceHolder()) ?>" value="<?= $Page->AsstSurgeon2->EditValue ?>"<?= $Page->AsstSurgeon2->editAttributes() ?> aria-describedby="x_AsstSurgeon2_help">
<?= $Page->AsstSurgeon2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AsstSurgeon2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
    <div id="r_paediatric" class="form-group row">
        <label id="elh_patient_ot_delivery_register_paediatric" for="x_paediatric" class="<?= $Page->LeftColumnClass ?>"><?= $Page->paediatric->caption() ?><?= $Page->paediatric->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->paediatric->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_paediatric">
<input type="<?= $Page->paediatric->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_paediatric" name="x_paediatric" id="x_paediatric" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->paediatric->getPlaceHolder()) ?>" value="<?= $Page->paediatric->EditValue ?>"<?= $Page->paediatric->editAttributes() ?> aria-describedby="x_paediatric_help">
<?= $Page->paediatric->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->paediatric->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
    <div id="r_ScrubNurse1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ScrubNurse1" for="x_ScrubNurse1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ScrubNurse1->caption() ?><?= $Page->ScrubNurse1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ScrubNurse1->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ScrubNurse1">
<input type="<?= $Page->ScrubNurse1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x_ScrubNurse1" id="x_ScrubNurse1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ScrubNurse1->getPlaceHolder()) ?>" value="<?= $Page->ScrubNurse1->EditValue ?>"<?= $Page->ScrubNurse1->editAttributes() ?> aria-describedby="x_ScrubNurse1_help">
<?= $Page->ScrubNurse1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ScrubNurse1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
    <div id="r_ScrubNurse2" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ScrubNurse2" for="x_ScrubNurse2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ScrubNurse2->caption() ?><?= $Page->ScrubNurse2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ScrubNurse2->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_ScrubNurse2">
<input type="<?= $Page->ScrubNurse2->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x_ScrubNurse2" id="x_ScrubNurse2" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ScrubNurse2->getPlaceHolder()) ?>" value="<?= $Page->ScrubNurse2->EditValue ?>"<?= $Page->ScrubNurse2->editAttributes() ?> aria-describedby="x_ScrubNurse2_help">
<?= $Page->ScrubNurse2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ScrubNurse2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
    <div id="r_FloorNurse" class="form-group row">
        <label id="elh_patient_ot_delivery_register_FloorNurse" for="x_FloorNurse" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FloorNurse->caption() ?><?= $Page->FloorNurse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FloorNurse->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_FloorNurse">
<input type="<?= $Page->FloorNurse->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x_FloorNurse" id="x_FloorNurse" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->FloorNurse->getPlaceHolder()) ?>" value="<?= $Page->FloorNurse->EditValue ?>"<?= $Page->FloorNurse->editAttributes() ?> aria-describedby="x_FloorNurse_help">
<?= $Page->FloorNurse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FloorNurse->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
    <div id="r_Technician" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Technician" for="x_Technician" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Technician->caption() ?><?= $Page->Technician->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Technician->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_Technician">
<input type="<?= $Page->Technician->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x_Technician" id="x_Technician" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Technician->getPlaceHolder()) ?>" value="<?= $Page->Technician->EditValue ?>"<?= $Page->Technician->editAttributes() ?> aria-describedby="x_Technician_help">
<?= $Page->Technician->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Technician->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
    <div id="r_HouseKeeping" class="form-group row">
        <label id="elh_patient_ot_delivery_register_HouseKeeping" for="x_HouseKeeping" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HouseKeeping->caption() ?><?= $Page->HouseKeeping->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HouseKeeping->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_HouseKeeping">
<input type="<?= $Page->HouseKeeping->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x_HouseKeeping" id="x_HouseKeeping" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->HouseKeeping->getPlaceHolder()) ?>" value="<?= $Page->HouseKeeping->EditValue ?>"<?= $Page->HouseKeeping->editAttributes() ?> aria-describedby="x_HouseKeeping_help">
<?= $Page->HouseKeeping->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HouseKeeping->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
    <div id="r_countsCheckedMops" class="form-group row">
        <label id="elh_patient_ot_delivery_register_countsCheckedMops" for="x_countsCheckedMops" class="<?= $Page->LeftColumnClass ?>"><?= $Page->countsCheckedMops->caption() ?><?= $Page->countsCheckedMops->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->countsCheckedMops->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_countsCheckedMops">
<input type="<?= $Page->countsCheckedMops->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x_countsCheckedMops" id="x_countsCheckedMops" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->countsCheckedMops->getPlaceHolder()) ?>" value="<?= $Page->countsCheckedMops->EditValue ?>"<?= $Page->countsCheckedMops->editAttributes() ?> aria-describedby="x_countsCheckedMops_help">
<?= $Page->countsCheckedMops->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->countsCheckedMops->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
    <div id="r_gauze" class="form-group row">
        <label id="elh_patient_ot_delivery_register_gauze" for="x_gauze" class="<?= $Page->LeftColumnClass ?>"><?= $Page->gauze->caption() ?><?= $Page->gauze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gauze->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_gauze">
<input type="<?= $Page->gauze->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x_gauze" id="x_gauze" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->gauze->getPlaceHolder()) ?>" value="<?= $Page->gauze->EditValue ?>"<?= $Page->gauze->editAttributes() ?> aria-describedby="x_gauze_help">
<?= $Page->gauze->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gauze->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
    <div id="r_needles" class="form-group row">
        <label id="elh_patient_ot_delivery_register_needles" for="x_needles" class="<?= $Page->LeftColumnClass ?>"><?= $Page->needles->caption() ?><?= $Page->needles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->needles->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_needles">
<input type="<?= $Page->needles->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_needles" name="x_needles" id="x_needles" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->needles->getPlaceHolder()) ?>" value="<?= $Page->needles->EditValue ?>"<?= $Page->needles->editAttributes() ?> aria-describedby="x_needles_help">
<?= $Page->needles->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->needles->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
    <div id="r_bloodloss" class="form-group row">
        <label id="elh_patient_ot_delivery_register_bloodloss" for="x_bloodloss" class="<?= $Page->LeftColumnClass ?>"><?= $Page->bloodloss->caption() ?><?= $Page->bloodloss->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bloodloss->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_bloodloss">
<input type="<?= $Page->bloodloss->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x_bloodloss" id="x_bloodloss" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->bloodloss->getPlaceHolder()) ?>" value="<?= $Page->bloodloss->EditValue ?>"<?= $Page->bloodloss->editAttributes() ?> aria-describedby="x_bloodloss_help">
<?= $Page->bloodloss->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bloodloss->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
    <div id="r_bloodtransfusion" class="form-group row">
        <label id="elh_patient_ot_delivery_register_bloodtransfusion" for="x_bloodtransfusion" class="<?= $Page->LeftColumnClass ?>"><?= $Page->bloodtransfusion->caption() ?><?= $Page->bloodtransfusion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bloodtransfusion->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_bloodtransfusion">
<input type="<?= $Page->bloodtransfusion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x_bloodtransfusion" id="x_bloodtransfusion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->bloodtransfusion->getPlaceHolder()) ?>" value="<?= $Page->bloodtransfusion->EditValue ?>"<?= $Page->bloodtransfusion->editAttributes() ?> aria-describedby="x_bloodtransfusion_help">
<?= $Page->bloodtransfusion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bloodtransfusion->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->implantsUsed->Visible) { // implantsUsed ?>
    <div id="r_implantsUsed" class="form-group row">
        <label id="elh_patient_ot_delivery_register_implantsUsed" for="x_implantsUsed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->implantsUsed->caption() ?><?= $Page->implantsUsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->implantsUsed->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_implantsUsed">
<textarea data-table="patient_ot_delivery_register" data-field="x_implantsUsed" name="x_implantsUsed" id="x_implantsUsed" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->implantsUsed->getPlaceHolder()) ?>"<?= $Page->implantsUsed->editAttributes() ?> aria-describedby="x_implantsUsed_help"><?= $Page->implantsUsed->EditValue ?></textarea>
<?= $Page->implantsUsed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->implantsUsed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
    <div id="r_MaterialsForHPE" class="form-group row">
        <label id="elh_patient_ot_delivery_register_MaterialsForHPE" for="x_MaterialsForHPE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MaterialsForHPE->caption() ?><?= $Page->MaterialsForHPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaterialsForHPE->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_MaterialsForHPE">
<textarea data-table="patient_ot_delivery_register" data-field="x_MaterialsForHPE" name="x_MaterialsForHPE" id="x_MaterialsForHPE" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MaterialsForHPE->getPlaceHolder()) ?>"<?= $Page->MaterialsForHPE->editAttributes() ?> aria-describedby="x_MaterialsForHPE_help"><?= $Page->MaterialsForHPE->EditValue ?></textarea>
<?= $Page->MaterialsForHPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaterialsForHPE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
    <div id="r_dte" class="form-group row">
        <label id="elh_patient_ot_delivery_register_dte" for="x_dte" class="<?= $Page->LeftColumnClass ?>"><?= $Page->dte->caption() ?><?= $Page->dte->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->dte->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_dte">
<input type="<?= $Page->dte->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_dte" name="x_dte" id="x_dte" placeholder="<?= HtmlEncode($Page->dte->getPlaceHolder()) ?>" value="<?= $Page->dte->EditValue ?>"<?= $Page->dte->editAttributes() ?> aria-describedby="x_dte_help">
<?= $Page->dte->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dte->getErrorMessage() ?></div>
<?php if (!$Page->dte->ReadOnly && !$Page->dte->Disabled && !isset($Page->dte->EditAttrs["readonly"]) && !isset($Page->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->motherReligion->Visible) { // motherReligion ?>
    <div id="r_motherReligion" class="form-group row">
        <label id="elh_patient_ot_delivery_register_motherReligion" for="x_motherReligion" class="<?= $Page->LeftColumnClass ?>"><?= $Page->motherReligion->caption() ?><?= $Page->motherReligion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->motherReligion->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_motherReligion">
<input type="<?= $Page->motherReligion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x_motherReligion" id="x_motherReligion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->motherReligion->getPlaceHolder()) ?>" value="<?= $Page->motherReligion->EditValue ?>"<?= $Page->motherReligion->editAttributes() ?> aria-describedby="x_motherReligion_help">
<?= $Page->motherReligion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->motherReligion->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
    <div id="r_bloodgroup" class="form-group row">
        <label id="elh_patient_ot_delivery_register_bloodgroup" for="x_bloodgroup" class="<?= $Page->LeftColumnClass ?>"><?= $Page->bloodgroup->caption() ?><?= $Page->bloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bloodgroup->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_bloodgroup">
<input type="<?= $Page->bloodgroup->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x_bloodgroup" id="x_bloodgroup" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->bloodgroup->getPlaceHolder()) ?>" value="<?= $Page->bloodgroup->EditValue ?>"<?= $Page->bloodgroup->editAttributes() ?> aria-describedby="x_bloodgroup_help">
<?= $Page->bloodgroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bloodgroup->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_ot_delivery_register_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_patient_ot_delivery_register_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_patient_ot_delivery_register_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeradd", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeradd", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HospID->Visible) { // HospID ?>
    <div id="r_HospID" class="form-group row">
        <label id="elh_patient_ot_delivery_register_HospID" for="x_HospID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->HospID->caption() ?><?= $Page->HospID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HospID->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_HospID">
<input type="<?= $Page->HospID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_HospID" name="x_HospID" id="x_HospID" size="30" placeholder="<?= HtmlEncode($Page->HospID->getPlaceHolder()) ?>" value="<?= $Page->HospID->EditValue ?>"<?= $Page->HospID->editAttributes() ?> aria-describedby="x_HospID_help">
<?= $Page->HospID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HospID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_ot_delivery_register_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<span id="el_patient_ot_delivery_register_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("AddBtn") ?></button>
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
    ew.addEventHandlers("patient_ot_delivery_register");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>

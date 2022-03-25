<?php

namespace PHPMaker2021\HIMS;

// Page object
$PatientOtDeliveryRegisterEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_ot_delivery_registeredit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_ot_delivery_registeredit = currentForm = new ew.Form("fpatient_ot_delivery_registeredit", "edit");

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_ot_delivery_register")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_ot_delivery_register)
        ew.vars.tables.patient_ot_delivery_register = currentTable;
    fpatient_ot_delivery_registeredit.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["profilePic", [fields.profilePic.visible && fields.profilePic.required ? ew.Validators.required(fields.profilePic.caption) : null], fields.profilePic.isInvalid],
        ["ObstetricsHistryFeMale", [fields.ObstetricsHistryFeMale.visible && fields.ObstetricsHistryFeMale.required ? ew.Validators.required(fields.ObstetricsHistryFeMale.caption) : null], fields.ObstetricsHistryFeMale.isInvalid],
        ["Abortion", [fields.Abortion.visible && fields.Abortion.required ? ew.Validators.required(fields.Abortion.caption) : null], fields.Abortion.isInvalid],
        ["ChildBirthDate", [fields.ChildBirthDate.visible && fields.ChildBirthDate.required ? ew.Validators.required(fields.ChildBirthDate.caption) : null, ew.Validators.datetime(7)], fields.ChildBirthDate.isInvalid],
        ["ChildBirthTime", [fields.ChildBirthTime.visible && fields.ChildBirthTime.required ? ew.Validators.required(fields.ChildBirthTime.caption) : null], fields.ChildBirthTime.isInvalid],
        ["ChildSex", [fields.ChildSex.visible && fields.ChildSex.required ? ew.Validators.required(fields.ChildSex.caption) : null], fields.ChildSex.isInvalid],
        ["ChildWt", [fields.ChildWt.visible && fields.ChildWt.required ? ew.Validators.required(fields.ChildWt.caption) : null], fields.ChildWt.isInvalid],
        ["ChildDay", [fields.ChildDay.visible && fields.ChildDay.required ? ew.Validators.required(fields.ChildDay.caption) : null], fields.ChildDay.isInvalid],
        ["ChildOE", [fields.ChildOE.visible && fields.ChildOE.required ? ew.Validators.required(fields.ChildOE.caption) : null], fields.ChildOE.isInvalid],
        ["TypeofDelivery", [fields.TypeofDelivery.visible && fields.TypeofDelivery.required ? ew.Validators.required(fields.TypeofDelivery.caption) : null], fields.TypeofDelivery.isInvalid],
        ["ChildBlGrp", [fields.ChildBlGrp.visible && fields.ChildBlGrp.required ? ew.Validators.required(fields.ChildBlGrp.caption) : null], fields.ChildBlGrp.isInvalid],
        ["ApgarScore", [fields.ApgarScore.visible && fields.ApgarScore.required ? ew.Validators.required(fields.ApgarScore.caption) : null], fields.ApgarScore.isInvalid],
        ["birthnotification", [fields.birthnotification.visible && fields.birthnotification.required ? ew.Validators.required(fields.birthnotification.caption) : null], fields.birthnotification.isInvalid],
        ["formno", [fields.formno.visible && fields.formno.required ? ew.Validators.required(fields.formno.caption) : null], fields.formno.isInvalid],
        ["dte", [fields.dte.visible && fields.dte.required ? ew.Validators.required(fields.dte.caption) : null, ew.Validators.datetime(0)], fields.dte.isInvalid],
        ["motherReligion", [fields.motherReligion.visible && fields.motherReligion.required ? ew.Validators.required(fields.motherReligion.caption) : null], fields.motherReligion.isInvalid],
        ["bloodgroup", [fields.bloodgroup.visible && fields.bloodgroup.required ? ew.Validators.required(fields.bloodgroup.caption) : null], fields.bloodgroup.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null, ew.Validators.integer], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null, ew.Validators.integer], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null, ew.Validators.datetime(0)], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null, ew.Validators.integer], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null, ew.Validators.datetime(0)], fields.modifieddatetime.isInvalid],
        ["PatientID", [fields.PatientID.visible && fields.PatientID.required ? ew.Validators.required(fields.PatientID.caption) : null], fields.PatientID.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid],
        ["ChildBirthDate1", [fields.ChildBirthDate1.visible && fields.ChildBirthDate1.required ? ew.Validators.required(fields.ChildBirthDate1.caption) : null, ew.Validators.datetime(0)], fields.ChildBirthDate1.isInvalid],
        ["ChildBirthTime1", [fields.ChildBirthTime1.visible && fields.ChildBirthTime1.required ? ew.Validators.required(fields.ChildBirthTime1.caption) : null], fields.ChildBirthTime1.isInvalid],
        ["ChildSex1", [fields.ChildSex1.visible && fields.ChildSex1.required ? ew.Validators.required(fields.ChildSex1.caption) : null], fields.ChildSex1.isInvalid],
        ["ChildWt1", [fields.ChildWt1.visible && fields.ChildWt1.required ? ew.Validators.required(fields.ChildWt1.caption) : null], fields.ChildWt1.isInvalid],
        ["ChildDay1", [fields.ChildDay1.visible && fields.ChildDay1.required ? ew.Validators.required(fields.ChildDay1.caption) : null], fields.ChildDay1.isInvalid],
        ["ChildOE1", [fields.ChildOE1.visible && fields.ChildOE1.required ? ew.Validators.required(fields.ChildOE1.caption) : null], fields.ChildOE1.isInvalid],
        ["TypeofDelivery1", [fields.TypeofDelivery1.visible && fields.TypeofDelivery1.required ? ew.Validators.required(fields.TypeofDelivery1.caption) : null], fields.TypeofDelivery1.isInvalid],
        ["ChildBlGrp1", [fields.ChildBlGrp1.visible && fields.ChildBlGrp1.required ? ew.Validators.required(fields.ChildBlGrp1.caption) : null], fields.ChildBlGrp1.isInvalid],
        ["ApgarScore1", [fields.ApgarScore1.visible && fields.ApgarScore1.required ? ew.Validators.required(fields.ApgarScore1.caption) : null], fields.ApgarScore1.isInvalid],
        ["birthnotification1", [fields.birthnotification1.visible && fields.birthnotification1.required ? ew.Validators.required(fields.birthnotification1.caption) : null], fields.birthnotification1.isInvalid],
        ["formno1", [fields.formno1.visible && fields.formno1.required ? ew.Validators.required(fields.formno1.caption) : null], fields.formno1.isInvalid],
        ["proposedSurgery", [fields.proposedSurgery.visible && fields.proposedSurgery.required ? ew.Validators.required(fields.proposedSurgery.caption) : null], fields.proposedSurgery.isInvalid],
        ["surgeryProcedure", [fields.surgeryProcedure.visible && fields.surgeryProcedure.required ? ew.Validators.required(fields.surgeryProcedure.caption) : null], fields.surgeryProcedure.isInvalid],
        ["typeOfAnaesthesia", [fields.typeOfAnaesthesia.visible && fields.typeOfAnaesthesia.required ? ew.Validators.required(fields.typeOfAnaesthesia.caption) : null], fields.typeOfAnaesthesia.isInvalid],
        ["RecievedTime", [fields.RecievedTime.visible && fields.RecievedTime.required ? ew.Validators.required(fields.RecievedTime.caption) : null, ew.Validators.datetime(11)], fields.RecievedTime.isInvalid],
        ["AnaesthesiaStarted", [fields.AnaesthesiaStarted.visible && fields.AnaesthesiaStarted.required ? ew.Validators.required(fields.AnaesthesiaStarted.caption) : null, ew.Validators.datetime(11)], fields.AnaesthesiaStarted.isInvalid],
        ["AnaesthesiaEnded", [fields.AnaesthesiaEnded.visible && fields.AnaesthesiaEnded.required ? ew.Validators.required(fields.AnaesthesiaEnded.caption) : null, ew.Validators.datetime(11)], fields.AnaesthesiaEnded.isInvalid],
        ["surgeryStarted", [fields.surgeryStarted.visible && fields.surgeryStarted.required ? ew.Validators.required(fields.surgeryStarted.caption) : null, ew.Validators.datetime(11)], fields.surgeryStarted.isInvalid],
        ["surgeryEnded", [fields.surgeryEnded.visible && fields.surgeryEnded.required ? ew.Validators.required(fields.surgeryEnded.caption) : null, ew.Validators.datetime(11)], fields.surgeryEnded.isInvalid],
        ["RecoveryTime", [fields.RecoveryTime.visible && fields.RecoveryTime.required ? ew.Validators.required(fields.RecoveryTime.caption) : null, ew.Validators.datetime(11)], fields.RecoveryTime.isInvalid],
        ["ShiftedTime", [fields.ShiftedTime.visible && fields.ShiftedTime.required ? ew.Validators.required(fields.ShiftedTime.caption) : null, ew.Validators.datetime(11)], fields.ShiftedTime.isInvalid],
        ["Duration", [fields.Duration.visible && fields.Duration.required ? ew.Validators.required(fields.Duration.caption) : null], fields.Duration.isInvalid],
        ["DrVisit1", [fields.DrVisit1.visible && fields.DrVisit1.required ? ew.Validators.required(fields.DrVisit1.caption) : null], fields.DrVisit1.isInvalid],
        ["DrVisit2", [fields.DrVisit2.visible && fields.DrVisit2.required ? ew.Validators.required(fields.DrVisit2.caption) : null], fields.DrVisit2.isInvalid],
        ["DrVisit3", [fields.DrVisit3.visible && fields.DrVisit3.required ? ew.Validators.required(fields.DrVisit3.caption) : null], fields.DrVisit3.isInvalid],
        ["DrVisit4", [fields.DrVisit4.visible && fields.DrVisit4.required ? ew.Validators.required(fields.DrVisit4.caption) : null], fields.DrVisit4.isInvalid],
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
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PId", [fields.PId.visible && fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer], fields.PId.isInvalid],
        ["PatientSearch", [fields.PatientSearch.visible && fields.PatientSearch.required ? ew.Validators.required(fields.PatientSearch.caption) : null], fields.PatientSearch.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_ot_delivery_registeredit,
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
    fpatient_ot_delivery_registeredit.validate = function () {
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
    fpatient_ot_delivery_registeredit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_ot_delivery_registeredit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_ot_delivery_registeredit.lists.DrVisit1 = <?= $Page->DrVisit1->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.DrVisit2 = <?= $Page->DrVisit2->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.DrVisit3 = <?= $Page->DrVisit3->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.DrVisit4 = <?= $Page->DrVisit4->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.Surgeon = <?= $Page->Surgeon->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.Anaesthetist = <?= $Page->Anaesthetist->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.AsstSurgeon1 = <?= $Page->AsstSurgeon1->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.AsstSurgeon2 = <?= $Page->AsstSurgeon2->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.paediatric = <?= $Page->paediatric->toClientList($Page) ?>;
    fpatient_ot_delivery_registeredit.lists.PatientSearch = <?= $Page->PatientSearch->toClientList($Page) ?>;
    loadjs.done("fpatient_ot_delivery_registeredit");
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
<form name="fpatient_ot_delivery_registeredit" id="fpatient_ot_delivery_registeredit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl(false) ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_ot_delivery_register">
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
        <label id="elh_patient_ot_delivery_register_id" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_id"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_id"><span id="el_patient_ot_delivery_register_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span></template>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatID->Visible) { // PatID ?>
    <div id="r_PatID" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PatID" for="x_PatID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_PatID"><?= $Page->PatID->caption() ?><?= $Page->PatID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatID->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PatID"><span id="el_patient_ot_delivery_register_PatID">
<input type="<?= $Page->PatID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x_PatID" id="x_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatID->getPlaceHolder()) ?>" value="<?= $Page->PatID->EditValue ?>"<?= $Page->PatID->editAttributes() ?> aria-describedby="x_PatID_help">
<?= $Page->PatID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientName->Visible) { // PatientName ?>
    <div id="r_PatientName" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PatientName" for="x_PatientName" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_PatientName"><?= $Page->PatientName->caption() ?><?= $Page->PatientName->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientName->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PatientName"><span id="el_patient_ot_delivery_register_PatientName">
<input type="<?= $Page->PatientName->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x_PatientName" id="x_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientName->getPlaceHolder()) ?>" value="<?= $Page->PatientName->EditValue ?>"<?= $Page->PatientName->editAttributes() ?> aria-describedby="x_PatientName_help">
<?= $Page->PatientName->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientName->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->mrnno->Visible) { // mrnno ?>
    <div id="r_mrnno" class="form-group row">
        <label id="elh_patient_ot_delivery_register_mrnno" for="x_mrnno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_mrnno"><?= $Page->mrnno->caption() ?><?= $Page->mrnno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->mrnno->cellAttributes() ?>>
<?php if ($Page->mrnno->getSessionValue() != "") { ?>
<template id="tpx_patient_ot_delivery_register_mrnno"><span id="el_patient_ot_delivery_register_mrnno">
<span<?= $Page->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->mrnno->getDisplayValue($Page->mrnno->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_mrnno" name="x_mrnno" value="<?= HtmlEncode($Page->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_ot_delivery_register_mrnno"><span id="el_patient_ot_delivery_register_mrnno">
<input type="<?= $Page->mrnno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x_mrnno" id="x_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->mrnno->getPlaceHolder()) ?>" value="<?= $Page->mrnno->EditValue ?>"<?= $Page->mrnno->editAttributes() ?> aria-describedby="x_mrnno_help">
<?= $Page->mrnno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->mrnno->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MobileNumber->Visible) { // MobileNumber ?>
    <div id="r_MobileNumber" class="form-group row">
        <label id="elh_patient_ot_delivery_register_MobileNumber" for="x_MobileNumber" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_MobileNumber"><?= $Page->MobileNumber->caption() ?><?= $Page->MobileNumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MobileNumber->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_MobileNumber"><span id="el_patient_ot_delivery_register_MobileNumber">
<input type="<?= $Page->MobileNumber->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x_MobileNumber" id="x_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MobileNumber->getPlaceHolder()) ?>" value="<?= $Page->MobileNumber->EditValue ?>"<?= $Page->MobileNumber->editAttributes() ?> aria-describedby="x_MobileNumber_help">
<?= $Page->MobileNumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MobileNumber->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Age->Visible) { // Age ?>
    <div id="r_Age" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Age" for="x_Age" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_Age"><?= $Page->Age->caption() ?><?= $Page->Age->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Age->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Age"><span id="el_patient_ot_delivery_register_Age">
<input type="<?= $Page->Age->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Age" name="x_Age" id="x_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Age->getPlaceHolder()) ?>" value="<?= $Page->Age->EditValue ?>"<?= $Page->Age->editAttributes() ?> aria-describedby="x_Age_help">
<?= $Page->Age->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Age->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Gender->Visible) { // Gender ?>
    <div id="r_Gender" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Gender" for="x_Gender" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_Gender"><?= $Page->Gender->caption() ?><?= $Page->Gender->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Gender->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Gender"><span id="el_patient_ot_delivery_register_Gender">
<input type="<?= $Page->Gender->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x_Gender" id="x_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Gender->getPlaceHolder()) ?>" value="<?= $Page->Gender->EditValue ?>"<?= $Page->Gender->editAttributes() ?> aria-describedby="x_Gender_help">
<?= $Page->Gender->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Gender->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->profilePic->Visible) { // profilePic ?>
    <div id="r_profilePic" class="form-group row">
        <label id="elh_patient_ot_delivery_register_profilePic" for="x_profilePic" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_profilePic"><?= $Page->profilePic->caption() ?><?= $Page->profilePic->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->profilePic->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_profilePic"><span id="el_patient_ot_delivery_register_profilePic">
<textarea data-table="patient_ot_delivery_register" data-field="x_profilePic" name="x_profilePic" id="x_profilePic" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->profilePic->getPlaceHolder()) ?>"<?= $Page->profilePic->editAttributes() ?> aria-describedby="x_profilePic_help"><?= $Page->profilePic->EditValue ?></textarea>
<?= $Page->profilePic->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->profilePic->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
    <div id="r_ObstetricsHistryFeMale" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" for="x_ObstetricsHistryFeMale" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ObstetricsHistryFeMale"><?= $Page->ObstetricsHistryFeMale->caption() ?><?= $Page->ObstetricsHistryFeMale->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricsHistryFeMale->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ObstetricsHistryFeMale"><span id="el_patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="<?= $Page->ObstetricsHistryFeMale->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x_ObstetricsHistryFeMale" id="x_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?= $Page->ObstetricsHistryFeMale->EditValue ?>"<?= $Page->ObstetricsHistryFeMale->editAttributes() ?> aria-describedby="x_ObstetricsHistryFeMale_help">
<?= $Page->ObstetricsHistryFeMale->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ObstetricsHistryFeMale->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Abortion->Visible) { // Abortion ?>
    <div id="r_Abortion" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Abortion" for="x_Abortion" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_Abortion"><?= $Page->Abortion->caption() ?><?= $Page->Abortion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Abortion->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Abortion"><span id="el_patient_ot_delivery_register_Abortion">
<input type="<?= $Page->Abortion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x_Abortion" id="x_Abortion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Abortion->getPlaceHolder()) ?>" value="<?= $Page->Abortion->EditValue ?>"<?= $Page->Abortion->editAttributes() ?> aria-describedby="x_Abortion_help">
<?= $Page->Abortion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Abortion->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBirthDate->Visible) { // ChildBirthDate ?>
    <div id="r_ChildBirthDate" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBirthDate" for="x_ChildBirthDate" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildBirthDate"><?= $Page->ChildBirthDate->caption() ?><?= $Page->ChildBirthDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBirthDate->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBirthDate"><span id="el_patient_ot_delivery_register_ChildBirthDate">
<input type="<?= $Page->ChildBirthDate->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x_ChildBirthDate" id="x_ChildBirthDate" placeholder="<?= HtmlEncode($Page->ChildBirthDate->getPlaceHolder()) ?>" value="<?= $Page->ChildBirthDate->EditValue ?>"<?= $Page->ChildBirthDate->editAttributes() ?> aria-describedby="x_ChildBirthDate_help">
<?= $Page->ChildBirthDate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBirthDate->getErrorMessage() ?></div>
<?php if (!$Page->ChildBirthDate->ReadOnly && !$Page->ChildBirthDate->Disabled && !isset($Page->ChildBirthDate->EditAttrs["readonly"]) && !isset($Page->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBirthTime->Visible) { // ChildBirthTime ?>
    <div id="r_ChildBirthTime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBirthTime" for="x_ChildBirthTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildBirthTime"><?= $Page->ChildBirthTime->caption() ?><?= $Page->ChildBirthTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBirthTime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBirthTime"><span id="el_patient_ot_delivery_register_ChildBirthTime">
<input type="<?= $Page->ChildBirthTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x_ChildBirthTime" id="x_ChildBirthTime" placeholder="<?= HtmlEncode($Page->ChildBirthTime->getPlaceHolder()) ?>" value="<?= $Page->ChildBirthTime->EditValue ?>"<?= $Page->ChildBirthTime->editAttributes() ?> aria-describedby="x_ChildBirthTime_help">
<?= $Page->ChildBirthTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBirthTime->getErrorMessage() ?></div>
<?php if (!$Page->ChildBirthTime->ReadOnly && !$Page->ChildBirthTime->Disabled && !isset($Page->ChildBirthTime->EditAttrs["readonly"]) && !isset($Page->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "timepicker"], function() {
    ew.createTimePicker("fpatient_ot_delivery_registeredit", "x_ChildBirthTime", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildSex->Visible) { // ChildSex ?>
    <div id="r_ChildSex" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildSex" for="x_ChildSex" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildSex"><?= $Page->ChildSex->caption() ?><?= $Page->ChildSex->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildSex->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildSex"><span id="el_patient_ot_delivery_register_ChildSex">
<input type="<?= $Page->ChildSex->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x_ChildSex" id="x_ChildSex" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildSex->getPlaceHolder()) ?>" value="<?= $Page->ChildSex->EditValue ?>"<?= $Page->ChildSex->editAttributes() ?> aria-describedby="x_ChildSex_help">
<?= $Page->ChildSex->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildSex->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildWt->Visible) { // ChildWt ?>
    <div id="r_ChildWt" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildWt" for="x_ChildWt" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildWt"><?= $Page->ChildWt->caption() ?><?= $Page->ChildWt->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildWt->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildWt"><span id="el_patient_ot_delivery_register_ChildWt">
<input type="<?= $Page->ChildWt->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x_ChildWt" id="x_ChildWt" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildWt->getPlaceHolder()) ?>" value="<?= $Page->ChildWt->EditValue ?>"<?= $Page->ChildWt->editAttributes() ?> aria-describedby="x_ChildWt_help">
<?= $Page->ChildWt->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildWt->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildDay->Visible) { // ChildDay ?>
    <div id="r_ChildDay" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildDay" for="x_ChildDay" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildDay"><?= $Page->ChildDay->caption() ?><?= $Page->ChildDay->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildDay->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildDay"><span id="el_patient_ot_delivery_register_ChildDay">
<input type="<?= $Page->ChildDay->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x_ChildDay" id="x_ChildDay" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildDay->getPlaceHolder()) ?>" value="<?= $Page->ChildDay->EditValue ?>"<?= $Page->ChildDay->editAttributes() ?> aria-describedby="x_ChildDay_help">
<?= $Page->ChildDay->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildDay->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildOE->Visible) { // ChildOE ?>
    <div id="r_ChildOE" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildOE" for="x_ChildOE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildOE"><?= $Page->ChildOE->caption() ?><?= $Page->ChildOE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildOE->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildOE"><span id="el_patient_ot_delivery_register_ChildOE">
<input type="<?= $Page->ChildOE->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x_ChildOE" id="x_ChildOE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildOE->getPlaceHolder()) ?>" value="<?= $Page->ChildOE->EditValue ?>"<?= $Page->ChildOE->editAttributes() ?> aria-describedby="x_ChildOE_help">
<?= $Page->ChildOE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildOE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeofDelivery->Visible) { // TypeofDelivery ?>
    <div id="r_TypeofDelivery" class="form-group row">
        <label id="elh_patient_ot_delivery_register_TypeofDelivery" for="x_TypeofDelivery" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_TypeofDelivery"><?= $Page->TypeofDelivery->caption() ?><?= $Page->TypeofDelivery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeofDelivery->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_TypeofDelivery"><span id="el_patient_ot_delivery_register_TypeofDelivery">
<textarea data-table="patient_ot_delivery_register" data-field="x_TypeofDelivery" name="x_TypeofDelivery" id="x_TypeofDelivery" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->TypeofDelivery->getPlaceHolder()) ?>"<?= $Page->TypeofDelivery->editAttributes() ?> aria-describedby="x_TypeofDelivery_help"><?= $Page->TypeofDelivery->EditValue ?></textarea>
<?= $Page->TypeofDelivery->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeofDelivery->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBlGrp->Visible) { // ChildBlGrp ?>
    <div id="r_ChildBlGrp" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBlGrp" for="x_ChildBlGrp" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildBlGrp"><?= $Page->ChildBlGrp->caption() ?><?= $Page->ChildBlGrp->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBlGrp->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBlGrp"><span id="el_patient_ot_delivery_register_ChildBlGrp">
<input type="<?= $Page->ChildBlGrp->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x_ChildBlGrp" id="x_ChildBlGrp" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildBlGrp->getPlaceHolder()) ?>" value="<?= $Page->ChildBlGrp->EditValue ?>"<?= $Page->ChildBlGrp->editAttributes() ?> aria-describedby="x_ChildBlGrp_help">
<?= $Page->ChildBlGrp->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBlGrp->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ApgarScore->Visible) { // ApgarScore ?>
    <div id="r_ApgarScore" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ApgarScore" for="x_ApgarScore" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ApgarScore"><?= $Page->ApgarScore->caption() ?><?= $Page->ApgarScore->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ApgarScore->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ApgarScore"><span id="el_patient_ot_delivery_register_ApgarScore">
<input type="<?= $Page->ApgarScore->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x_ApgarScore" id="x_ApgarScore" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ApgarScore->getPlaceHolder()) ?>" value="<?= $Page->ApgarScore->EditValue ?>"<?= $Page->ApgarScore->editAttributes() ?> aria-describedby="x_ApgarScore_help">
<?= $Page->ApgarScore->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ApgarScore->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->birthnotification->Visible) { // birthnotification ?>
    <div id="r_birthnotification" class="form-group row">
        <label id="elh_patient_ot_delivery_register_birthnotification" for="x_birthnotification" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_birthnotification"><?= $Page->birthnotification->caption() ?><?= $Page->birthnotification->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->birthnotification->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_birthnotification"><span id="el_patient_ot_delivery_register_birthnotification">
<input type="<?= $Page->birthnotification->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x_birthnotification" id="x_birthnotification" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->birthnotification->getPlaceHolder()) ?>" value="<?= $Page->birthnotification->EditValue ?>"<?= $Page->birthnotification->editAttributes() ?> aria-describedby="x_birthnotification_help">
<?= $Page->birthnotification->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->birthnotification->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->formno->Visible) { // formno ?>
    <div id="r_formno" class="form-group row">
        <label id="elh_patient_ot_delivery_register_formno" for="x_formno" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_formno"><?= $Page->formno->caption() ?><?= $Page->formno->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->formno->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_formno"><span id="el_patient_ot_delivery_register_formno">
<input type="<?= $Page->formno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno" name="x_formno" id="x_formno" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->formno->getPlaceHolder()) ?>" value="<?= $Page->formno->EditValue ?>"<?= $Page->formno->editAttributes() ?> aria-describedby="x_formno_help">
<?= $Page->formno->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->formno->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->dte->Visible) { // dte ?>
    <div id="r_dte" class="form-group row">
        <label id="elh_patient_ot_delivery_register_dte" for="x_dte" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_dte"><?= $Page->dte->caption() ?><?= $Page->dte->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->dte->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_dte"><span id="el_patient_ot_delivery_register_dte">
<input type="<?= $Page->dte->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_dte" name="x_dte" id="x_dte" placeholder="<?= HtmlEncode($Page->dte->getPlaceHolder()) ?>" value="<?= $Page->dte->EditValue ?>"<?= $Page->dte->editAttributes() ?> aria-describedby="x_dte_help">
<?= $Page->dte->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->dte->getErrorMessage() ?></div>
<?php if (!$Page->dte->ReadOnly && !$Page->dte->Disabled && !isset($Page->dte->EditAttrs["readonly"]) && !isset($Page->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->motherReligion->Visible) { // motherReligion ?>
    <div id="r_motherReligion" class="form-group row">
        <label id="elh_patient_ot_delivery_register_motherReligion" for="x_motherReligion" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_motherReligion"><?= $Page->motherReligion->caption() ?><?= $Page->motherReligion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->motherReligion->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_motherReligion"><span id="el_patient_ot_delivery_register_motherReligion">
<input type="<?= $Page->motherReligion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x_motherReligion" id="x_motherReligion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->motherReligion->getPlaceHolder()) ?>" value="<?= $Page->motherReligion->EditValue ?>"<?= $Page->motherReligion->editAttributes() ?> aria-describedby="x_motherReligion_help">
<?= $Page->motherReligion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->motherReligion->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bloodgroup->Visible) { // bloodgroup ?>
    <div id="r_bloodgroup" class="form-group row">
        <label id="elh_patient_ot_delivery_register_bloodgroup" for="x_bloodgroup" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_bloodgroup"><?= $Page->bloodgroup->caption() ?><?= $Page->bloodgroup->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bloodgroup->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_bloodgroup"><span id="el_patient_ot_delivery_register_bloodgroup">
<input type="<?= $Page->bloodgroup->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x_bloodgroup" id="x_bloodgroup" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->bloodgroup->getPlaceHolder()) ?>" value="<?= $Page->bloodgroup->EditValue ?>"<?= $Page->bloodgroup->editAttributes() ?> aria-describedby="x_bloodgroup_help">
<?= $Page->bloodgroup->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bloodgroup->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->status->Visible) { // status ?>
    <div id="r_status" class="form-group row">
        <label id="elh_patient_ot_delivery_register_status" for="x_status" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_status"><?= $Page->status->caption() ?><?= $Page->status->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->status->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_status"><span id="el_patient_ot_delivery_register_status">
<input type="<?= $Page->status->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_status" name="x_status" id="x_status" size="30" placeholder="<?= HtmlEncode($Page->status->getPlaceHolder()) ?>" value="<?= $Page->status->EditValue ?>"<?= $Page->status->editAttributes() ?> aria-describedby="x_status_help">
<?= $Page->status->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->status->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createdby->Visible) { // createdby ?>
    <div id="r_createdby" class="form-group row">
        <label id="elh_patient_ot_delivery_register_createdby" for="x_createdby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_createdby"><?= $Page->createdby->caption() ?><?= $Page->createdby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createdby->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_createdby"><span id="el_patient_ot_delivery_register_createdby">
<input type="<?= $Page->createdby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x_createdby" id="x_createdby" size="30" placeholder="<?= HtmlEncode($Page->createdby->getPlaceHolder()) ?>" value="<?= $Page->createdby->EditValue ?>"<?= $Page->createdby->editAttributes() ?> aria-describedby="x_createdby_help">
<?= $Page->createdby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createdby->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->createddatetime->Visible) { // createddatetime ?>
    <div id="r_createddatetime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_createddatetime" for="x_createddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_createddatetime"><?= $Page->createddatetime->caption() ?><?= $Page->createddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->createddatetime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_createddatetime"><span id="el_patient_ot_delivery_register_createddatetime">
<input type="<?= $Page->createddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x_createddatetime" id="x_createddatetime" placeholder="<?= HtmlEncode($Page->createddatetime->getPlaceHolder()) ?>" value="<?= $Page->createddatetime->EditValue ?>"<?= $Page->createddatetime->editAttributes() ?> aria-describedby="x_createddatetime_help">
<?= $Page->createddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->createddatetime->getErrorMessage() ?></div>
<?php if (!$Page->createddatetime->ReadOnly && !$Page->createddatetime->Disabled && !isset($Page->createddatetime->EditAttrs["readonly"]) && !isset($Page->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifiedby->Visible) { // modifiedby ?>
    <div id="r_modifiedby" class="form-group row">
        <label id="elh_patient_ot_delivery_register_modifiedby" for="x_modifiedby" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_modifiedby"><?= $Page->modifiedby->caption() ?><?= $Page->modifiedby->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifiedby->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_modifiedby"><span id="el_patient_ot_delivery_register_modifiedby">
<input type="<?= $Page->modifiedby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x_modifiedby" id="x_modifiedby" size="30" placeholder="<?= HtmlEncode($Page->modifiedby->getPlaceHolder()) ?>" value="<?= $Page->modifiedby->EditValue ?>"<?= $Page->modifiedby->editAttributes() ?> aria-describedby="x_modifiedby_help">
<?= $Page->modifiedby->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifiedby->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->modifieddatetime->Visible) { // modifieddatetime ?>
    <div id="r_modifieddatetime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_modifieddatetime" for="x_modifieddatetime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_modifieddatetime"><?= $Page->modifieddatetime->caption() ?><?= $Page->modifieddatetime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->modifieddatetime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_modifieddatetime"><span id="el_patient_ot_delivery_register_modifieddatetime">
<input type="<?= $Page->modifieddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x_modifieddatetime" id="x_modifieddatetime" placeholder="<?= HtmlEncode($Page->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Page->modifieddatetime->EditValue ?>"<?= $Page->modifieddatetime->editAttributes() ?> aria-describedby="x_modifieddatetime_help">
<?= $Page->modifieddatetime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Page->modifieddatetime->ReadOnly && !$Page->modifieddatetime->Disabled && !isset($Page->modifieddatetime->EditAttrs["readonly"]) && !isset($Page->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientID->Visible) { // PatientID ?>
    <div id="r_PatientID" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PatientID" for="x_PatientID" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_PatientID"><?= $Page->PatientID->caption() ?><?= $Page->PatientID->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientID->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PatientID"><span id="el_patient_ot_delivery_register_PatientID">
<input type="<?= $Page->PatientID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x_PatientID" id="x_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PatientID->getPlaceHolder()) ?>" value="<?= $Page->PatientID->EditValue ?>"<?= $Page->PatientID->editAttributes() ?> aria-describedby="x_PatientID_help">
<?= $Page->PatientID->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PatientID->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
    <div id="r_ChildBirthDate1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBirthDate1" for="x_ChildBirthDate1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildBirthDate1"><?= $Page->ChildBirthDate1->caption() ?><?= $Page->ChildBirthDate1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBirthDate1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBirthDate1"><span id="el_patient_ot_delivery_register_ChildBirthDate1">
<input type="<?= $Page->ChildBirthDate1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x_ChildBirthDate1" id="x_ChildBirthDate1" placeholder="<?= HtmlEncode($Page->ChildBirthDate1->getPlaceHolder()) ?>" value="<?= $Page->ChildBirthDate1->EditValue ?>"<?= $Page->ChildBirthDate1->editAttributes() ?> aria-describedby="x_ChildBirthDate1_help">
<?= $Page->ChildBirthDate1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBirthDate1->getErrorMessage() ?></div>
<?php if (!$Page->ChildBirthDate1->ReadOnly && !$Page->ChildBirthDate1->Disabled && !isset($Page->ChildBirthDate1->EditAttrs["readonly"]) && !isset($Page->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
    <div id="r_ChildBirthTime1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBirthTime1" for="x_ChildBirthTime1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildBirthTime1"><?= $Page->ChildBirthTime1->caption() ?><?= $Page->ChildBirthTime1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBirthTime1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBirthTime1"><span id="el_patient_ot_delivery_register_ChildBirthTime1">
<input type="<?= $Page->ChildBirthTime1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x_ChildBirthTime1" id="x_ChildBirthTime1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildBirthTime1->getPlaceHolder()) ?>" value="<?= $Page->ChildBirthTime1->EditValue ?>"<?= $Page->ChildBirthTime1->editAttributes() ?> aria-describedby="x_ChildBirthTime1_help">
<?= $Page->ChildBirthTime1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBirthTime1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildSex1->Visible) { // ChildSex1 ?>
    <div id="r_ChildSex1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildSex1" for="x_ChildSex1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildSex1"><?= $Page->ChildSex1->caption() ?><?= $Page->ChildSex1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildSex1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildSex1"><span id="el_patient_ot_delivery_register_ChildSex1">
<input type="<?= $Page->ChildSex1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x_ChildSex1" id="x_ChildSex1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildSex1->getPlaceHolder()) ?>" value="<?= $Page->ChildSex1->EditValue ?>"<?= $Page->ChildSex1->editAttributes() ?> aria-describedby="x_ChildSex1_help">
<?= $Page->ChildSex1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildSex1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildWt1->Visible) { // ChildWt1 ?>
    <div id="r_ChildWt1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildWt1" for="x_ChildWt1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildWt1"><?= $Page->ChildWt1->caption() ?><?= $Page->ChildWt1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildWt1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildWt1"><span id="el_patient_ot_delivery_register_ChildWt1">
<input type="<?= $Page->ChildWt1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x_ChildWt1" id="x_ChildWt1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildWt1->getPlaceHolder()) ?>" value="<?= $Page->ChildWt1->EditValue ?>"<?= $Page->ChildWt1->editAttributes() ?> aria-describedby="x_ChildWt1_help">
<?= $Page->ChildWt1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildWt1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildDay1->Visible) { // ChildDay1 ?>
    <div id="r_ChildDay1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildDay1" for="x_ChildDay1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildDay1"><?= $Page->ChildDay1->caption() ?><?= $Page->ChildDay1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildDay1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildDay1"><span id="el_patient_ot_delivery_register_ChildDay1">
<input type="<?= $Page->ChildDay1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x_ChildDay1" id="x_ChildDay1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildDay1->getPlaceHolder()) ?>" value="<?= $Page->ChildDay1->EditValue ?>"<?= $Page->ChildDay1->editAttributes() ?> aria-describedby="x_ChildDay1_help">
<?= $Page->ChildDay1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildDay1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildOE1->Visible) { // ChildOE1 ?>
    <div id="r_ChildOE1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildOE1" for="x_ChildOE1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildOE1"><?= $Page->ChildOE1->caption() ?><?= $Page->ChildOE1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildOE1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildOE1"><span id="el_patient_ot_delivery_register_ChildOE1">
<input type="<?= $Page->ChildOE1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x_ChildOE1" id="x_ChildOE1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildOE1->getPlaceHolder()) ?>" value="<?= $Page->ChildOE1->EditValue ?>"<?= $Page->ChildOE1->editAttributes() ?> aria-describedby="x_ChildOE1_help">
<?= $Page->ChildOE1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildOE1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->TypeofDelivery1->Visible) { // TypeofDelivery1 ?>
    <div id="r_TypeofDelivery1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_TypeofDelivery1" for="x_TypeofDelivery1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_TypeofDelivery1"><?= $Page->TypeofDelivery1->caption() ?><?= $Page->TypeofDelivery1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->TypeofDelivery1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_TypeofDelivery1"><span id="el_patient_ot_delivery_register_TypeofDelivery1">
<textarea data-table="patient_ot_delivery_register" data-field="x_TypeofDelivery1" name="x_TypeofDelivery1" id="x_TypeofDelivery1" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->TypeofDelivery1->getPlaceHolder()) ?>"<?= $Page->TypeofDelivery1->editAttributes() ?> aria-describedby="x_TypeofDelivery1_help"><?= $Page->TypeofDelivery1->EditValue ?></textarea>
<?= $Page->TypeofDelivery1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->TypeofDelivery1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
    <div id="r_ChildBlGrp1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ChildBlGrp1" for="x_ChildBlGrp1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ChildBlGrp1"><?= $Page->ChildBlGrp1->caption() ?><?= $Page->ChildBlGrp1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ChildBlGrp1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ChildBlGrp1"><span id="el_patient_ot_delivery_register_ChildBlGrp1">
<input type="<?= $Page->ChildBlGrp1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x_ChildBlGrp1" id="x_ChildBlGrp1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ChildBlGrp1->getPlaceHolder()) ?>" value="<?= $Page->ChildBlGrp1->EditValue ?>"<?= $Page->ChildBlGrp1->editAttributes() ?> aria-describedby="x_ChildBlGrp1_help">
<?= $Page->ChildBlGrp1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ChildBlGrp1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ApgarScore1->Visible) { // ApgarScore1 ?>
    <div id="r_ApgarScore1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ApgarScore1" for="x_ApgarScore1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ApgarScore1"><?= $Page->ApgarScore1->caption() ?><?= $Page->ApgarScore1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ApgarScore1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ApgarScore1"><span id="el_patient_ot_delivery_register_ApgarScore1">
<input type="<?= $Page->ApgarScore1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x_ApgarScore1" id="x_ApgarScore1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ApgarScore1->getPlaceHolder()) ?>" value="<?= $Page->ApgarScore1->EditValue ?>"<?= $Page->ApgarScore1->editAttributes() ?> aria-describedby="x_ApgarScore1_help">
<?= $Page->ApgarScore1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ApgarScore1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->birthnotification1->Visible) { // birthnotification1 ?>
    <div id="r_birthnotification1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_birthnotification1" for="x_birthnotification1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_birthnotification1"><?= $Page->birthnotification1->caption() ?><?= $Page->birthnotification1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->birthnotification1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_birthnotification1"><span id="el_patient_ot_delivery_register_birthnotification1">
<input type="<?= $Page->birthnotification1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x_birthnotification1" id="x_birthnotification1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->birthnotification1->getPlaceHolder()) ?>" value="<?= $Page->birthnotification1->EditValue ?>"<?= $Page->birthnotification1->editAttributes() ?> aria-describedby="x_birthnotification1_help">
<?= $Page->birthnotification1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->birthnotification1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->formno1->Visible) { // formno1 ?>
    <div id="r_formno1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_formno1" for="x_formno1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_formno1"><?= $Page->formno1->caption() ?><?= $Page->formno1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->formno1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_formno1"><span id="el_patient_ot_delivery_register_formno1">
<input type="<?= $Page->formno1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x_formno1" id="x_formno1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->formno1->getPlaceHolder()) ?>" value="<?= $Page->formno1->EditValue ?>"<?= $Page->formno1->editAttributes() ?> aria-describedby="x_formno1_help">
<?= $Page->formno1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->formno1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->proposedSurgery->Visible) { // proposedSurgery ?>
    <div id="r_proposedSurgery" class="form-group row">
        <label id="elh_patient_ot_delivery_register_proposedSurgery" for="x_proposedSurgery" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_proposedSurgery"><?= $Page->proposedSurgery->caption() ?><?= $Page->proposedSurgery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->proposedSurgery->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_proposedSurgery"><span id="el_patient_ot_delivery_register_proposedSurgery">
<textarea data-table="patient_ot_delivery_register" data-field="x_proposedSurgery" name="x_proposedSurgery" id="x_proposedSurgery" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->proposedSurgery->getPlaceHolder()) ?>"<?= $Page->proposedSurgery->editAttributes() ?> aria-describedby="x_proposedSurgery_help"><?= $Page->proposedSurgery->EditValue ?></textarea>
<?= $Page->proposedSurgery->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->proposedSurgery->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryProcedure->Visible) { // surgeryProcedure ?>
    <div id="r_surgeryProcedure" class="form-group row">
        <label id="elh_patient_ot_delivery_register_surgeryProcedure" for="x_surgeryProcedure" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_surgeryProcedure"><?= $Page->surgeryProcedure->caption() ?><?= $Page->surgeryProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryProcedure->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_surgeryProcedure"><span id="el_patient_ot_delivery_register_surgeryProcedure">
<textarea data-table="patient_ot_delivery_register" data-field="x_surgeryProcedure" name="x_surgeryProcedure" id="x_surgeryProcedure" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->surgeryProcedure->getPlaceHolder()) ?>"<?= $Page->surgeryProcedure->editAttributes() ?> aria-describedby="x_surgeryProcedure_help"><?= $Page->surgeryProcedure->EditValue ?></textarea>
<?= $Page->surgeryProcedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryProcedure->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->typeOfAnaesthesia->Visible) { // typeOfAnaesthesia ?>
    <div id="r_typeOfAnaesthesia" class="form-group row">
        <label id="elh_patient_ot_delivery_register_typeOfAnaesthesia" for="x_typeOfAnaesthesia" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_typeOfAnaesthesia"><?= $Page->typeOfAnaesthesia->caption() ?><?= $Page->typeOfAnaesthesia->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->typeOfAnaesthesia->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_typeOfAnaesthesia"><span id="el_patient_ot_delivery_register_typeOfAnaesthesia">
<textarea data-table="patient_ot_delivery_register" data-field="x_typeOfAnaesthesia" name="x_typeOfAnaesthesia" id="x_typeOfAnaesthesia" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->typeOfAnaesthesia->getPlaceHolder()) ?>"<?= $Page->typeOfAnaesthesia->editAttributes() ?> aria-describedby="x_typeOfAnaesthesia_help"><?= $Page->typeOfAnaesthesia->EditValue ?></textarea>
<?= $Page->typeOfAnaesthesia->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->typeOfAnaesthesia->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecievedTime->Visible) { // RecievedTime ?>
    <div id="r_RecievedTime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_RecievedTime" for="x_RecievedTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_RecievedTime"><?= $Page->RecievedTime->caption() ?><?= $Page->RecievedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecievedTime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_RecievedTime"><span id="el_patient_ot_delivery_register_RecievedTime">
<input type="<?= $Page->RecievedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x_RecievedTime" id="x_RecievedTime" placeholder="<?= HtmlEncode($Page->RecievedTime->getPlaceHolder()) ?>" value="<?= $Page->RecievedTime->EditValue ?>"<?= $Page->RecievedTime->editAttributes() ?> aria-describedby="x_RecievedTime_help">
<?= $Page->RecievedTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecievedTime->getErrorMessage() ?></div>
<?php if (!$Page->RecievedTime->ReadOnly && !$Page->RecievedTime->Disabled && !isset($Page->RecievedTime->EditAttrs["readonly"]) && !isset($Page->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
    <div id="r_AnaesthesiaStarted" class="form-group row">
        <label id="elh_patient_ot_delivery_register_AnaesthesiaStarted" for="x_AnaesthesiaStarted" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_AnaesthesiaStarted"><?= $Page->AnaesthesiaStarted->caption() ?><?= $Page->AnaesthesiaStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnaesthesiaStarted->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_AnaesthesiaStarted"><span id="el_patient_ot_delivery_register_AnaesthesiaStarted">
<input type="<?= $Page->AnaesthesiaStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x_AnaesthesiaStarted" id="x_AnaesthesiaStarted" placeholder="<?= HtmlEncode($Page->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?= $Page->AnaesthesiaStarted->EditValue ?>"<?= $Page->AnaesthesiaStarted->editAttributes() ?> aria-describedby="x_AnaesthesiaStarted_help">
<?= $Page->AnaesthesiaStarted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnaesthesiaStarted->getErrorMessage() ?></div>
<?php if (!$Page->AnaesthesiaStarted->ReadOnly && !$Page->AnaesthesiaStarted->Disabled && !isset($Page->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($Page->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
    <div id="r_AnaesthesiaEnded" class="form-group row">
        <label id="elh_patient_ot_delivery_register_AnaesthesiaEnded" for="x_AnaesthesiaEnded" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_AnaesthesiaEnded"><?= $Page->AnaesthesiaEnded->caption() ?><?= $Page->AnaesthesiaEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnaesthesiaEnded->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_AnaesthesiaEnded"><span id="el_patient_ot_delivery_register_AnaesthesiaEnded">
<input type="<?= $Page->AnaesthesiaEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x_AnaesthesiaEnded" id="x_AnaesthesiaEnded" placeholder="<?= HtmlEncode($Page->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?= $Page->AnaesthesiaEnded->EditValue ?>"<?= $Page->AnaesthesiaEnded->editAttributes() ?> aria-describedby="x_AnaesthesiaEnded_help">
<?= $Page->AnaesthesiaEnded->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnaesthesiaEnded->getErrorMessage() ?></div>
<?php if (!$Page->AnaesthesiaEnded->ReadOnly && !$Page->AnaesthesiaEnded->Disabled && !isset($Page->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($Page->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryStarted->Visible) { // surgeryStarted ?>
    <div id="r_surgeryStarted" class="form-group row">
        <label id="elh_patient_ot_delivery_register_surgeryStarted" for="x_surgeryStarted" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_surgeryStarted"><?= $Page->surgeryStarted->caption() ?><?= $Page->surgeryStarted->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryStarted->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_surgeryStarted"><span id="el_patient_ot_delivery_register_surgeryStarted">
<input type="<?= $Page->surgeryStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x_surgeryStarted" id="x_surgeryStarted" placeholder="<?= HtmlEncode($Page->surgeryStarted->getPlaceHolder()) ?>" value="<?= $Page->surgeryStarted->EditValue ?>"<?= $Page->surgeryStarted->editAttributes() ?> aria-describedby="x_surgeryStarted_help">
<?= $Page->surgeryStarted->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryStarted->getErrorMessage() ?></div>
<?php if (!$Page->surgeryStarted->ReadOnly && !$Page->surgeryStarted->Disabled && !isset($Page->surgeryStarted->EditAttrs["readonly"]) && !isset($Page->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->surgeryEnded->Visible) { // surgeryEnded ?>
    <div id="r_surgeryEnded" class="form-group row">
        <label id="elh_patient_ot_delivery_register_surgeryEnded" for="x_surgeryEnded" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_surgeryEnded"><?= $Page->surgeryEnded->caption() ?><?= $Page->surgeryEnded->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->surgeryEnded->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_surgeryEnded"><span id="el_patient_ot_delivery_register_surgeryEnded">
<input type="<?= $Page->surgeryEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x_surgeryEnded" id="x_surgeryEnded" placeholder="<?= HtmlEncode($Page->surgeryEnded->getPlaceHolder()) ?>" value="<?= $Page->surgeryEnded->EditValue ?>"<?= $Page->surgeryEnded->editAttributes() ?> aria-describedby="x_surgeryEnded_help">
<?= $Page->surgeryEnded->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->surgeryEnded->getErrorMessage() ?></div>
<?php if (!$Page->surgeryEnded->ReadOnly && !$Page->surgeryEnded->Disabled && !isset($Page->surgeryEnded->EditAttrs["readonly"]) && !isset($Page->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->RecoveryTime->Visible) { // RecoveryTime ?>
    <div id="r_RecoveryTime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_RecoveryTime" for="x_RecoveryTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_RecoveryTime"><?= $Page->RecoveryTime->caption() ?><?= $Page->RecoveryTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->RecoveryTime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_RecoveryTime"><span id="el_patient_ot_delivery_register_RecoveryTime">
<input type="<?= $Page->RecoveryTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x_RecoveryTime" id="x_RecoveryTime" placeholder="<?= HtmlEncode($Page->RecoveryTime->getPlaceHolder()) ?>" value="<?= $Page->RecoveryTime->EditValue ?>"<?= $Page->RecoveryTime->editAttributes() ?> aria-describedby="x_RecoveryTime_help">
<?= $Page->RecoveryTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->RecoveryTime->getErrorMessage() ?></div>
<?php if (!$Page->RecoveryTime->ReadOnly && !$Page->RecoveryTime->Disabled && !isset($Page->RecoveryTime->EditAttrs["readonly"]) && !isset($Page->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ShiftedTime->Visible) { // ShiftedTime ?>
    <div id="r_ShiftedTime" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ShiftedTime" for="x_ShiftedTime" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ShiftedTime"><?= $Page->ShiftedTime->caption() ?><?= $Page->ShiftedTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ShiftedTime->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ShiftedTime"><span id="el_patient_ot_delivery_register_ShiftedTime">
<input type="<?= $Page->ShiftedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x_ShiftedTime" id="x_ShiftedTime" placeholder="<?= HtmlEncode($Page->ShiftedTime->getPlaceHolder()) ?>" value="<?= $Page->ShiftedTime->EditValue ?>"<?= $Page->ShiftedTime->editAttributes() ?> aria-describedby="x_ShiftedTime_help">
<?= $Page->ShiftedTime->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ShiftedTime->getErrorMessage() ?></div>
<?php if (!$Page->ShiftedTime->ReadOnly && !$Page->ShiftedTime->Disabled && !isset($Page->ShiftedTime->EditAttrs["readonly"]) && !isset($Page->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registeredit", "x_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Duration->Visible) { // Duration ?>
    <div id="r_Duration" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Duration" for="x_Duration" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_Duration"><?= $Page->Duration->caption() ?><?= $Page->Duration->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Duration->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Duration"><span id="el_patient_ot_delivery_register_Duration">
<input type="<?= $Page->Duration->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x_Duration" id="x_Duration" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Duration->getPlaceHolder()) ?>" value="<?= $Page->Duration->EditValue ?>"<?= $Page->Duration->editAttributes() ?> aria-describedby="x_Duration_help">
<?= $Page->Duration->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Duration->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrVisit1->Visible) { // DrVisit1 ?>
    <div id="r_DrVisit1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_DrVisit1" for="x_DrVisit1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_DrVisit1"><?= $Page->DrVisit1->caption() ?><?= $Page->DrVisit1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrVisit1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_DrVisit1"><span id="el_patient_ot_delivery_register_DrVisit1">
    <select
        id="x_DrVisit1"
        name="x_DrVisit1"
        class="form-control ew-select<?= $Page->DrVisit1->isInvalidClass() ?>"
        data-select2-id="patient_ot_delivery_register_x_DrVisit1"
        data-table="patient_ot_delivery_register"
        data-field="x_DrVisit1"
        data-value-separator="<?= $Page->DrVisit1->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DrVisit1->getPlaceHolder()) ?>"
        <?= $Page->DrVisit1->editAttributes() ?>>
        <?= $Page->DrVisit1->selectOptionListHtml("x_DrVisit1") ?>
    </select>
    <?= $Page->DrVisit1->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->DrVisit1->getErrorMessage() ?></div>
<?= $Page->DrVisit1->Lookup->getParamTag($Page, "p_x_DrVisit1") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_delivery_register_x_DrVisit1']"),
        options = { name: "x_DrVisit1", selectId: "patient_ot_delivery_register_x_DrVisit1", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_delivery_register.fields.DrVisit1.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrVisit2->Visible) { // DrVisit2 ?>
    <div id="r_DrVisit2" class="form-group row">
        <label id="elh_patient_ot_delivery_register_DrVisit2" for="x_DrVisit2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_DrVisit2"><?= $Page->DrVisit2->caption() ?><?= $Page->DrVisit2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrVisit2->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_DrVisit2"><span id="el_patient_ot_delivery_register_DrVisit2">
    <select
        id="x_DrVisit2"
        name="x_DrVisit2"
        class="form-control ew-select<?= $Page->DrVisit2->isInvalidClass() ?>"
        data-select2-id="patient_ot_delivery_register_x_DrVisit2"
        data-table="patient_ot_delivery_register"
        data-field="x_DrVisit2"
        data-value-separator="<?= $Page->DrVisit2->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DrVisit2->getPlaceHolder()) ?>"
        <?= $Page->DrVisit2->editAttributes() ?>>
        <?= $Page->DrVisit2->selectOptionListHtml("x_DrVisit2") ?>
    </select>
    <?= $Page->DrVisit2->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->DrVisit2->getErrorMessage() ?></div>
<?= $Page->DrVisit2->Lookup->getParamTag($Page, "p_x_DrVisit2") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_delivery_register_x_DrVisit2']"),
        options = { name: "x_DrVisit2", selectId: "patient_ot_delivery_register_x_DrVisit2", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_delivery_register.fields.DrVisit2.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrVisit3->Visible) { // DrVisit3 ?>
    <div id="r_DrVisit3" class="form-group row">
        <label id="elh_patient_ot_delivery_register_DrVisit3" for="x_DrVisit3" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_DrVisit3"><?= $Page->DrVisit3->caption() ?><?= $Page->DrVisit3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrVisit3->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_DrVisit3"><span id="el_patient_ot_delivery_register_DrVisit3">
    <select
        id="x_DrVisit3"
        name="x_DrVisit3"
        class="form-control ew-select<?= $Page->DrVisit3->isInvalidClass() ?>"
        data-select2-id="patient_ot_delivery_register_x_DrVisit3"
        data-table="patient_ot_delivery_register"
        data-field="x_DrVisit3"
        data-value-separator="<?= $Page->DrVisit3->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DrVisit3->getPlaceHolder()) ?>"
        <?= $Page->DrVisit3->editAttributes() ?>>
        <?= $Page->DrVisit3->selectOptionListHtml("x_DrVisit3") ?>
    </select>
    <?= $Page->DrVisit3->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->DrVisit3->getErrorMessage() ?></div>
<?= $Page->DrVisit3->Lookup->getParamTag($Page, "p_x_DrVisit3") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_delivery_register_x_DrVisit3']"),
        options = { name: "x_DrVisit3", selectId: "patient_ot_delivery_register_x_DrVisit3", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_delivery_register.fields.DrVisit3.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DrVisit4->Visible) { // DrVisit4 ?>
    <div id="r_DrVisit4" class="form-group row">
        <label id="elh_patient_ot_delivery_register_DrVisit4" for="x_DrVisit4" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_DrVisit4"><?= $Page->DrVisit4->caption() ?><?= $Page->DrVisit4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DrVisit4->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_DrVisit4"><span id="el_patient_ot_delivery_register_DrVisit4">
    <select
        id="x_DrVisit4"
        name="x_DrVisit4"
        class="form-control ew-select<?= $Page->DrVisit4->isInvalidClass() ?>"
        data-select2-id="patient_ot_delivery_register_x_DrVisit4"
        data-table="patient_ot_delivery_register"
        data-field="x_DrVisit4"
        data-value-separator="<?= $Page->DrVisit4->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Page->DrVisit4->getPlaceHolder()) ?>"
        <?= $Page->DrVisit4->editAttributes() ?>>
        <?= $Page->DrVisit4->selectOptionListHtml("x_DrVisit4") ?>
    </select>
    <?= $Page->DrVisit4->getCustomMessage() ?>
    <div class="invalid-feedback"><?= $Page->DrVisit4->getErrorMessage() ?></div>
<?= $Page->DrVisit4->Lookup->getParamTag($Page, "p_x_DrVisit4") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_ot_delivery_register_x_DrVisit4']"),
        options = { name: "x_DrVisit4", selectId: "patient_ot_delivery_register_x_DrVisit4", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_ot_delivery_register.fields.DrVisit4.selectOptions);
    ew.createSelect(options);
});
</script>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Surgeon->Visible) { // Surgeon ?>
    <div id="r_Surgeon" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Surgeon" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_Surgeon"><?= $Page->Surgeon->caption() ?><?= $Page->Surgeon->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Surgeon->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Surgeon"><span id="el_patient_ot_delivery_register_Surgeon">
<?php
$onchange = $Page->Surgeon->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x_Surgeon" class="ew-auto-suggest">
    <input type="<?= $Page->Surgeon->getInputTextType() ?>" class="form-control" name="sv_x_Surgeon" id="sv_x_Surgeon" value="<?= RemoveHtml($Page->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Surgeon->getPlaceHolder()) ?>"<?= $Page->Surgeon->editAttributes() ?> aria-describedby="x_Surgeon_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-input="sv_x_Surgeon" data-value-separator="<?= $Page->Surgeon->displayValueSeparatorAttribute() ?>" name="x_Surgeon" id="x_Surgeon" value="<?= HtmlEncode($Page->Surgeon->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Surgeon->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Surgeon->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit"], function() {
    fpatient_ot_delivery_registeredit.createAutoSuggest(Object.assign({"id":"x_Surgeon","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.Surgeon.autoSuggestOptions));
});
</script>
<?= $Page->Surgeon->Lookup->getParamTag($Page, "p_x_Surgeon") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anaesthetist->Visible) { // Anaesthetist ?>
    <div id="r_Anaesthetist" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Anaesthetist" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_Anaesthetist"><?= $Page->Anaesthetist->caption() ?><?= $Page->Anaesthetist->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anaesthetist->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Anaesthetist"><span id="el_patient_ot_delivery_register_Anaesthetist">
<?php
$onchange = $Page->Anaesthetist->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x_Anaesthetist" class="ew-auto-suggest">
    <input type="<?= $Page->Anaesthetist->getInputTextType() ?>" class="form-control" name="sv_x_Anaesthetist" id="sv_x_Anaesthetist" value="<?= RemoveHtml($Page->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->Anaesthetist->getPlaceHolder()) ?>"<?= $Page->Anaesthetist->editAttributes() ?> aria-describedby="x_Anaesthetist_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-input="sv_x_Anaesthetist" data-value-separator="<?= $Page->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x_Anaesthetist" id="x_Anaesthetist" value="<?= HtmlEncode($Page->Anaesthetist->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->Anaesthetist->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anaesthetist->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit"], function() {
    fpatient_ot_delivery_registeredit.createAutoSuggest(Object.assign({"id":"x_Anaesthetist","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.Anaesthetist.autoSuggestOptions));
});
</script>
<?= $Page->Anaesthetist->Lookup->getParamTag($Page, "p_x_Anaesthetist") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
    <div id="r_AsstSurgeon1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_AsstSurgeon1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_AsstSurgeon1"><?= $Page->AsstSurgeon1->caption() ?><?= $Page->AsstSurgeon1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AsstSurgeon1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_AsstSurgeon1"><span id="el_patient_ot_delivery_register_AsstSurgeon1">
<?php
$onchange = $Page->AsstSurgeon1->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x_AsstSurgeon1" class="ew-auto-suggest">
    <input type="<?= $Page->AsstSurgeon1->getInputTextType() ?>" class="form-control" name="sv_x_AsstSurgeon1" id="sv_x_AsstSurgeon1" value="<?= RemoveHtml($Page->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->AsstSurgeon1->getPlaceHolder()) ?>"<?= $Page->AsstSurgeon1->editAttributes() ?> aria-describedby="x_AsstSurgeon1_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-input="sv_x_AsstSurgeon1" data-value-separator="<?= $Page->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x_AsstSurgeon1" id="x_AsstSurgeon1" value="<?= HtmlEncode($Page->AsstSurgeon1->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->AsstSurgeon1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AsstSurgeon1->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit"], function() {
    fpatient_ot_delivery_registeredit.createAutoSuggest(Object.assign({"id":"x_AsstSurgeon1","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.AsstSurgeon1.autoSuggestOptions));
});
</script>
<?= $Page->AsstSurgeon1->Lookup->getParamTag($Page, "p_x_AsstSurgeon1") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
    <div id="r_AsstSurgeon2" class="form-group row">
        <label id="elh_patient_ot_delivery_register_AsstSurgeon2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_AsstSurgeon2"><?= $Page->AsstSurgeon2->caption() ?><?= $Page->AsstSurgeon2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AsstSurgeon2->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_AsstSurgeon2"><span id="el_patient_ot_delivery_register_AsstSurgeon2">
<?php
$onchange = $Page->AsstSurgeon2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x_AsstSurgeon2" class="ew-auto-suggest">
    <input type="<?= $Page->AsstSurgeon2->getInputTextType() ?>" class="form-control" name="sv_x_AsstSurgeon2" id="sv_x_AsstSurgeon2" value="<?= RemoveHtml($Page->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->AsstSurgeon2->getPlaceHolder()) ?>"<?= $Page->AsstSurgeon2->editAttributes() ?> aria-describedby="x_AsstSurgeon2_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-input="sv_x_AsstSurgeon2" data-value-separator="<?= $Page->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x_AsstSurgeon2" id="x_AsstSurgeon2" value="<?= HtmlEncode($Page->AsstSurgeon2->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->AsstSurgeon2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AsstSurgeon2->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit"], function() {
    fpatient_ot_delivery_registeredit.createAutoSuggest(Object.assign({"id":"x_AsstSurgeon2","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.AsstSurgeon2.autoSuggestOptions));
});
</script>
<?= $Page->AsstSurgeon2->Lookup->getParamTag($Page, "p_x_AsstSurgeon2") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->paediatric->Visible) { // paediatric ?>
    <div id="r_paediatric" class="form-group row">
        <label id="elh_patient_ot_delivery_register_paediatric" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_paediatric"><?= $Page->paediatric->caption() ?><?= $Page->paediatric->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->paediatric->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_paediatric"><span id="el_patient_ot_delivery_register_paediatric">
<?php
$onchange = $Page->paediatric->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Page->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x_paediatric" class="ew-auto-suggest">
    <input type="<?= $Page->paediatric->getInputTextType() ?>" class="form-control" name="sv_x_paediatric" id="sv_x_paediatric" value="<?= RemoveHtml($Page->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->paediatric->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Page->paediatric->getPlaceHolder()) ?>"<?= $Page->paediatric->editAttributes() ?> aria-describedby="x_paediatric_help">
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-input="sv_x_paediatric" data-value-separator="<?= $Page->paediatric->displayValueSeparatorAttribute() ?>" name="x_paediatric" id="x_paediatric" value="<?= HtmlEncode($Page->paediatric->CurrentValue) ?>"<?= $onchange ?>>
<?= $Page->paediatric->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->paediatric->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registeredit"], function() {
    fpatient_ot_delivery_registeredit.createAutoSuggest(Object.assign({"id":"x_paediatric","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.paediatric.autoSuggestOptions));
});
</script>
<?= $Page->paediatric->Lookup->getParamTag($Page, "p_x_paediatric") ?>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ScrubNurse1->Visible) { // ScrubNurse1 ?>
    <div id="r_ScrubNurse1" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ScrubNurse1" for="x_ScrubNurse1" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ScrubNurse1"><?= $Page->ScrubNurse1->caption() ?><?= $Page->ScrubNurse1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ScrubNurse1->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ScrubNurse1"><span id="el_patient_ot_delivery_register_ScrubNurse1">
<input type="<?= $Page->ScrubNurse1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x_ScrubNurse1" id="x_ScrubNurse1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ScrubNurse1->getPlaceHolder()) ?>" value="<?= $Page->ScrubNurse1->EditValue ?>"<?= $Page->ScrubNurse1->editAttributes() ?> aria-describedby="x_ScrubNurse1_help">
<?= $Page->ScrubNurse1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ScrubNurse1->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ScrubNurse2->Visible) { // ScrubNurse2 ?>
    <div id="r_ScrubNurse2" class="form-group row">
        <label id="elh_patient_ot_delivery_register_ScrubNurse2" for="x_ScrubNurse2" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_ScrubNurse2"><?= $Page->ScrubNurse2->caption() ?><?= $Page->ScrubNurse2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ScrubNurse2->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_ScrubNurse2"><span id="el_patient_ot_delivery_register_ScrubNurse2">
<input type="<?= $Page->ScrubNurse2->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x_ScrubNurse2" id="x_ScrubNurse2" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->ScrubNurse2->getPlaceHolder()) ?>" value="<?= $Page->ScrubNurse2->EditValue ?>"<?= $Page->ScrubNurse2->editAttributes() ?> aria-describedby="x_ScrubNurse2_help">
<?= $Page->ScrubNurse2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ScrubNurse2->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FloorNurse->Visible) { // FloorNurse ?>
    <div id="r_FloorNurse" class="form-group row">
        <label id="elh_patient_ot_delivery_register_FloorNurse" for="x_FloorNurse" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_FloorNurse"><?= $Page->FloorNurse->caption() ?><?= $Page->FloorNurse->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FloorNurse->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_FloorNurse"><span id="el_patient_ot_delivery_register_FloorNurse">
<input type="<?= $Page->FloorNurse->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x_FloorNurse" id="x_FloorNurse" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->FloorNurse->getPlaceHolder()) ?>" value="<?= $Page->FloorNurse->EditValue ?>"<?= $Page->FloorNurse->editAttributes() ?> aria-describedby="x_FloorNurse_help">
<?= $Page->FloorNurse->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FloorNurse->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Technician->Visible) { // Technician ?>
    <div id="r_Technician" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Technician" for="x_Technician" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_Technician"><?= $Page->Technician->caption() ?><?= $Page->Technician->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Technician->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_Technician"><span id="el_patient_ot_delivery_register_Technician">
<input type="<?= $Page->Technician->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x_Technician" id="x_Technician" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->Technician->getPlaceHolder()) ?>" value="<?= $Page->Technician->EditValue ?>"<?= $Page->Technician->editAttributes() ?> aria-describedby="x_Technician_help">
<?= $Page->Technician->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Technician->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->HouseKeeping->Visible) { // HouseKeeping ?>
    <div id="r_HouseKeeping" class="form-group row">
        <label id="elh_patient_ot_delivery_register_HouseKeeping" for="x_HouseKeeping" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_HouseKeeping"><?= $Page->HouseKeeping->caption() ?><?= $Page->HouseKeeping->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->HouseKeeping->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_HouseKeeping"><span id="el_patient_ot_delivery_register_HouseKeeping">
<input type="<?= $Page->HouseKeeping->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x_HouseKeeping" id="x_HouseKeeping" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->HouseKeeping->getPlaceHolder()) ?>" value="<?= $Page->HouseKeeping->EditValue ?>"<?= $Page->HouseKeeping->editAttributes() ?> aria-describedby="x_HouseKeeping_help">
<?= $Page->HouseKeeping->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->HouseKeeping->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->countsCheckedMops->Visible) { // countsCheckedMops ?>
    <div id="r_countsCheckedMops" class="form-group row">
        <label id="elh_patient_ot_delivery_register_countsCheckedMops" for="x_countsCheckedMops" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_countsCheckedMops"><?= $Page->countsCheckedMops->caption() ?><?= $Page->countsCheckedMops->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->countsCheckedMops->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_countsCheckedMops"><span id="el_patient_ot_delivery_register_countsCheckedMops">
<input type="<?= $Page->countsCheckedMops->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x_countsCheckedMops" id="x_countsCheckedMops" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->countsCheckedMops->getPlaceHolder()) ?>" value="<?= $Page->countsCheckedMops->EditValue ?>"<?= $Page->countsCheckedMops->editAttributes() ?> aria-describedby="x_countsCheckedMops_help">
<?= $Page->countsCheckedMops->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->countsCheckedMops->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->gauze->Visible) { // gauze ?>
    <div id="r_gauze" class="form-group row">
        <label id="elh_patient_ot_delivery_register_gauze" for="x_gauze" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_gauze"><?= $Page->gauze->caption() ?><?= $Page->gauze->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->gauze->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_gauze"><span id="el_patient_ot_delivery_register_gauze">
<input type="<?= $Page->gauze->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x_gauze" id="x_gauze" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->gauze->getPlaceHolder()) ?>" value="<?= $Page->gauze->EditValue ?>"<?= $Page->gauze->editAttributes() ?> aria-describedby="x_gauze_help">
<?= $Page->gauze->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->gauze->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->needles->Visible) { // needles ?>
    <div id="r_needles" class="form-group row">
        <label id="elh_patient_ot_delivery_register_needles" for="x_needles" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_needles"><?= $Page->needles->caption() ?><?= $Page->needles->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->needles->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_needles"><span id="el_patient_ot_delivery_register_needles">
<input type="<?= $Page->needles->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_needles" name="x_needles" id="x_needles" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->needles->getPlaceHolder()) ?>" value="<?= $Page->needles->EditValue ?>"<?= $Page->needles->editAttributes() ?> aria-describedby="x_needles_help">
<?= $Page->needles->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->needles->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bloodloss->Visible) { // bloodloss ?>
    <div id="r_bloodloss" class="form-group row">
        <label id="elh_patient_ot_delivery_register_bloodloss" for="x_bloodloss" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_bloodloss"><?= $Page->bloodloss->caption() ?><?= $Page->bloodloss->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bloodloss->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_bloodloss"><span id="el_patient_ot_delivery_register_bloodloss">
<input type="<?= $Page->bloodloss->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x_bloodloss" id="x_bloodloss" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->bloodloss->getPlaceHolder()) ?>" value="<?= $Page->bloodloss->EditValue ?>"<?= $Page->bloodloss->editAttributes() ?> aria-describedby="x_bloodloss_help">
<?= $Page->bloodloss->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bloodloss->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->bloodtransfusion->Visible) { // bloodtransfusion ?>
    <div id="r_bloodtransfusion" class="form-group row">
        <label id="elh_patient_ot_delivery_register_bloodtransfusion" for="x_bloodtransfusion" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_bloodtransfusion"><?= $Page->bloodtransfusion->caption() ?><?= $Page->bloodtransfusion->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->bloodtransfusion->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_bloodtransfusion"><span id="el_patient_ot_delivery_register_bloodtransfusion">
<input type="<?= $Page->bloodtransfusion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x_bloodtransfusion" id="x_bloodtransfusion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Page->bloodtransfusion->getPlaceHolder()) ?>" value="<?= $Page->bloodtransfusion->EditValue ?>"<?= $Page->bloodtransfusion->editAttributes() ?> aria-describedby="x_bloodtransfusion_help">
<?= $Page->bloodtransfusion->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->bloodtransfusion->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->implantsUsed->Visible) { // implantsUsed ?>
    <div id="r_implantsUsed" class="form-group row">
        <label id="elh_patient_ot_delivery_register_implantsUsed" for="x_implantsUsed" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_implantsUsed"><?= $Page->implantsUsed->caption() ?><?= $Page->implantsUsed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->implantsUsed->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_implantsUsed"><span id="el_patient_ot_delivery_register_implantsUsed">
<textarea data-table="patient_ot_delivery_register" data-field="x_implantsUsed" name="x_implantsUsed" id="x_implantsUsed" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->implantsUsed->getPlaceHolder()) ?>"<?= $Page->implantsUsed->editAttributes() ?> aria-describedby="x_implantsUsed_help"><?= $Page->implantsUsed->EditValue ?></textarea>
<?= $Page->implantsUsed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->implantsUsed->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaterialsForHPE->Visible) { // MaterialsForHPE ?>
    <div id="r_MaterialsForHPE" class="form-group row">
        <label id="elh_patient_ot_delivery_register_MaterialsForHPE" for="x_MaterialsForHPE" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_MaterialsForHPE"><?= $Page->MaterialsForHPE->caption() ?><?= $Page->MaterialsForHPE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaterialsForHPE->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_MaterialsForHPE"><span id="el_patient_ot_delivery_register_MaterialsForHPE">
<textarea data-table="patient_ot_delivery_register" data-field="x_MaterialsForHPE" name="x_MaterialsForHPE" id="x_MaterialsForHPE" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->MaterialsForHPE->getPlaceHolder()) ?>"<?= $Page->MaterialsForHPE->editAttributes() ?> aria-describedby="x_MaterialsForHPE_help"><?= $Page->MaterialsForHPE->EditValue ?></textarea>
<?= $Page->MaterialsForHPE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaterialsForHPE->getErrorMessage() ?></div>
</span></template>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Reception->Visible) { // Reception ?>
    <div id="r_Reception" class="form-group row">
        <label id="elh_patient_ot_delivery_register_Reception" for="x_Reception" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_Reception"><?= $Page->Reception->caption() ?><?= $Page->Reception->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Reception->cellAttributes() ?>>
<?php if ($Page->Reception->getSessionValue() != "") { ?>
<template id="tpx_patient_ot_delivery_register_Reception"><span id="el_patient_ot_delivery_register_Reception">
<span<?= $Page->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->Reception->getDisplayValue($Page->Reception->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_Reception" name="x_Reception" value="<?= HtmlEncode($Page->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_ot_delivery_register_Reception"><span id="el_patient_ot_delivery_register_Reception">
<input type="<?= $Page->Reception->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x_Reception" id="x_Reception" size="30" placeholder="<?= HtmlEncode($Page->Reception->getPlaceHolder()) ?>" value="<?= $Page->Reception->EditValue ?>"<?= $Page->Reception->editAttributes() ?> aria-describedby="x_Reception_help">
<?= $Page->Reception->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Reception->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PId->Visible) { // PId ?>
    <div id="r_PId" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PId" for="x_PId" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_PId"><?= $Page->PId->caption() ?><?= $Page->PId->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PId->cellAttributes() ?>>
<?php if ($Page->PId->getSessionValue() != "") { ?>
<template id="tpx_patient_ot_delivery_register_PId"><span id="el_patient_ot_delivery_register_PId">
<span<?= $Page->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->PId->getDisplayValue($Page->PId->ViewValue))) ?>"></span>
</span></template>
<input type="hidden" id="x_PId" name="x_PId" value="<?= HtmlEncode($Page->PId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<template id="tpx_patient_ot_delivery_register_PId"><span id="el_patient_ot_delivery_register_PId">
<input type="<?= $Page->PId->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PId" name="x_PId" id="x_PId" size="30" placeholder="<?= HtmlEncode($Page->PId->getPlaceHolder()) ?>" value="<?= $Page->PId->EditValue ?>"<?= $Page->PId->editAttributes() ?> aria-describedby="x_PId_help">
<?= $Page->PId->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PId->getErrorMessage() ?></div>
</span></template>
<?php } ?>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PatientSearch->Visible) { // PatientSearch ?>
    <div id="r_PatientSearch" class="form-group row">
        <label id="elh_patient_ot_delivery_register_PatientSearch" for="x_PatientSearch" class="<?= $Page->LeftColumnClass ?>"><template id="tpc_patient_ot_delivery_register_PatientSearch"><?= $Page->PatientSearch->caption() ?><?= $Page->PatientSearch->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></template></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PatientSearch->cellAttributes() ?>>
<template id="tpx_patient_ot_delivery_register_PatientSearch"><span id="el_patient_ot_delivery_register_PatientSearch">
<div class="input-group ew-lookup-list" aria-describedby="x_PatientSearch_help">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_PatientSearch"><?= EmptyValue(strval($Page->PatientSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $Page->PatientSearch->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Page->PatientSearch->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Page->PatientSearch->ReadOnly || $Page->PatientSearch->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_PatientSearch',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Page->PatientSearch->getErrorMessage() ?></div>
<?= $Page->PatientSearch->getCustomMessage() ?>
<?= $Page->PatientSearch->Lookup->getParamTag($Page, "p_x_PatientSearch") ?>
<input type="hidden" is="selection-list" data-table="patient_ot_delivery_register" data-field="x_PatientSearch" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Page->PatientSearch->displayValueSeparatorAttribute() ?>" name="x_PatientSearch" id="x_PatientSearch" value="<?= $Page->PatientSearch->CurrentValue ?>"<?= $Page->PatientSearch->editAttributes() ?>>
</span></template>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<div id="tpd_patient_ot_delivery_registeredit" class="ew-custom-template"></div>
<template id="tpm_patient_ot_delivery_registeredit">
<div id="ct_PatientOtDeliveryRegisterEdit"><style>
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
		$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where id='".$vviid."'; ";
		$resuVi = $dbhelper->ExecuteRows($sql);
		$Tid = $resuVi[0]["PatientId"];
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
<slot class="ew-slot" name="tpc_patient_ot_delivery_register_PatientSearch"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PatientSearch"></slot>	
<p id="profilePic" hidden><slot class="ew-slot" name="tpc_patient_ot_delivery_register_profilePic"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_profilePic"></slot></p>
<p id="SurfaceArea" hidden><slot class="ew-slot" name="tpx_SurfaceArea"></slot></p>
<p id="BodyMassIndex" hidden><slot class="ew-slot" name="tpx_BodyMassIndex"></slot></p>
<p id="idmrnnokk" hidden><slot class="ew-slot" name="tpc_patient_ot_delivery_register_mrnno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_mrnno"></slot></p>
<div hidden>
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Reception"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Reception"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_PatientID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PatientID"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_PatientName"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PatientName"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Age"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Age"></slot></p> 
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Gender"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Gender"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_PatID"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PatID"></slot></p>
  <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_MobileNumber"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_MobileNumber"></slot></p> 
   <p><slot class="ew-slot" name="tpc_patient_ot_delivery_register_PId"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_PId"></slot></p>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ObstetricsHistryFeMale"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ObstetricsHistryFeMale"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Abortion"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Abortion"></slot></td></tr>					
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_dte"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_dte"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_motherReligion"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_motherReligion"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBirthDate"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBirthDate"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBirthTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBirthTime"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildSex"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildSex"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildWt"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildWt"></slot></td></tr>
											<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildDay"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildDay"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildOE"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildOE"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_TypeofDelivery"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_TypeofDelivery"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBlGrp"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBlGrp"></slot></td></tr>
												<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ApgarScore"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ApgarScore"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_birthnotification"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_birthnotification"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_formno"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_formno"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBirthDate1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBirthDate1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBirthTime1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBirthTime1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildSex1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildSex1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildWt1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildWt1"></slot></td></tr>
											<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildDay1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildDay1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildOE1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildOE1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_TypeofDelivery1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_TypeofDelivery1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ChildBlGrp1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ChildBlGrp1"></slot></td></tr>
												<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ApgarScore1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ApgarScore1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_birthnotification1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_birthnotification1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_formno1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_formno1"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_bloodgroup"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_bloodgroup"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_proposedSurgery"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_proposedSurgery"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_surgeryProcedure"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_surgeryProcedure"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_typeOfAnaesthesia"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_typeOfAnaesthesia"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_RecievedTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_RecievedTime"></slot></td></tr>
							<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_AnaesthesiaStarted"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_AnaesthesiaStarted"></slot></td></tr>
							<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_AnaesthesiaEnded"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_AnaesthesiaEnded"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_surgeryStarted"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_surgeryStarted"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_surgeryEnded"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_surgeryEnded"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_RecoveryTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_RecoveryTime"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ShiftedTime"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ShiftedTime"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Duration"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Duration"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_DrVisit1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_DrVisit1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_DrVisit2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_DrVisit2"></slot></td></tr>					
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_DrVisit3"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_DrVisit3"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_DrVisit4"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_DrVisit4"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Surgeon"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Surgeon"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Anaesthetist"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Anaesthetist"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_AsstSurgeon1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_AsstSurgeon1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_AsstSurgeon2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_AsstSurgeon2"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_paediatric"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_paediatric"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ScrubNurse1"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ScrubNurse1"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_ScrubNurse2"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_ScrubNurse2"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_FloorNurse"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_FloorNurse"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_Technician"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_Technician"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_HouseKeeping"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_HouseKeeping"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_countsCheckedMops"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_countsCheckedMops"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_gauze"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_gauze"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_needles"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_needles"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_bloodloss"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_bloodloss"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_bloodtransfusion"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_bloodtransfusion"></slot></td></tr>
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
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_implantsUsed"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_implantsUsed"></slot></td></tr>
						<tr><td><slot class="ew-slot" name="tpc_patient_ot_delivery_register_MaterialsForHPE"></slot>&nbsp;<slot class="ew-slot" name="tpx_patient_ot_delivery_register_MaterialsForHPE"></slot></td></tr>
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
    ew.applyTemplate("tpd_patient_ot_delivery_registeredit", "tpm_patient_ot_delivery_registeredit", "patient_ot_delivery_registeredit", "<?= $Page->CustomExport ?>", ew.templateData.rows[0]);
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
    ew.addEventHandlers("patient_ot_delivery_register");
});
</script>
<script>
loadjs.ready("load", function () {
    // Startup script
    function callSpatientvitals(){document.getElementById("Repagehistoryview").value="patientvitals"}function callpatienthistory(){document.getElementById("Repagehistoryview").value="patienthistory"}function callpatientprovisionaldiagnosis(){document.getElementById("Repagehistoryview").value="patientprovisionaldiagnosis"}function callpatientprescription(){document.getElementById("Repagehistoryview").value="patientprescription"}function callpatientfinaldiagnosis(){document.getElementById("Repagehistoryview").value="patientfinaldiagnosis"}function callpatientfollowup(){document.getElementById("Repagehistoryview").value="patientfollowup"}function callpatientotdeliveryregister(){document.getElementById("Repagehistoryview").value="patientotdeliveryregister"}function callpatientotsurgeryregister(){document.getElementById("Repagehistoryview").value="patientotsurgeryregister"}
});
</script>

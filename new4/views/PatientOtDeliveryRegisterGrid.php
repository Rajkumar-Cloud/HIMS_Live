<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientOtDeliveryRegisterGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_ot_delivery_registergrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_ot_delivery_registergrid = new ew.Form("fpatient_ot_delivery_registergrid", "grid");
    fpatient_ot_delivery_registergrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_ot_delivery_register")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_ot_delivery_register)
        ew.vars.tables.patient_ot_delivery_register = currentTable;
    fpatient_ot_delivery_registergrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["ObstetricsHistryFeMale", [fields.ObstetricsHistryFeMale.visible && fields.ObstetricsHistryFeMale.required ? ew.Validators.required(fields.ObstetricsHistryFeMale.caption) : null], fields.ObstetricsHistryFeMale.isInvalid],
        ["Abortion", [fields.Abortion.visible && fields.Abortion.required ? ew.Validators.required(fields.Abortion.caption) : null], fields.Abortion.isInvalid],
        ["ChildBirthDate", [fields.ChildBirthDate.visible && fields.ChildBirthDate.required ? ew.Validators.required(fields.ChildBirthDate.caption) : null, ew.Validators.datetime(7)], fields.ChildBirthDate.isInvalid],
        ["ChildBirthTime", [fields.ChildBirthTime.visible && fields.ChildBirthTime.required ? ew.Validators.required(fields.ChildBirthTime.caption) : null], fields.ChildBirthTime.isInvalid],
        ["ChildSex", [fields.ChildSex.visible && fields.ChildSex.required ? ew.Validators.required(fields.ChildSex.caption) : null], fields.ChildSex.isInvalid],
        ["ChildWt", [fields.ChildWt.visible && fields.ChildWt.required ? ew.Validators.required(fields.ChildWt.caption) : null], fields.ChildWt.isInvalid],
        ["ChildDay", [fields.ChildDay.visible && fields.ChildDay.required ? ew.Validators.required(fields.ChildDay.caption) : null], fields.ChildDay.isInvalid],
        ["ChildOE", [fields.ChildOE.visible && fields.ChildOE.required ? ew.Validators.required(fields.ChildOE.caption) : null], fields.ChildOE.isInvalid],
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
        ["ChildBlGrp1", [fields.ChildBlGrp1.visible && fields.ChildBlGrp1.required ? ew.Validators.required(fields.ChildBlGrp1.caption) : null], fields.ChildBlGrp1.isInvalid],
        ["ApgarScore1", [fields.ApgarScore1.visible && fields.ApgarScore1.required ? ew.Validators.required(fields.ApgarScore1.caption) : null], fields.ApgarScore1.isInvalid],
        ["birthnotification1", [fields.birthnotification1.visible && fields.birthnotification1.required ? ew.Validators.required(fields.birthnotification1.caption) : null], fields.birthnotification1.isInvalid],
        ["formno1", [fields.formno1.visible && fields.formno1.required ? ew.Validators.required(fields.formno1.caption) : null], fields.formno1.isInvalid],
        ["RecievedTime", [fields.RecievedTime.visible && fields.RecievedTime.required ? ew.Validators.required(fields.RecievedTime.caption) : null, ew.Validators.datetime(11)], fields.RecievedTime.isInvalid],
        ["AnaesthesiaStarted", [fields.AnaesthesiaStarted.visible && fields.AnaesthesiaStarted.required ? ew.Validators.required(fields.AnaesthesiaStarted.caption) : null, ew.Validators.datetime(11)], fields.AnaesthesiaStarted.isInvalid],
        ["AnaesthesiaEnded", [fields.AnaesthesiaEnded.visible && fields.AnaesthesiaEnded.required ? ew.Validators.required(fields.AnaesthesiaEnded.caption) : null, ew.Validators.datetime(11)], fields.AnaesthesiaEnded.isInvalid],
        ["surgeryStarted", [fields.surgeryStarted.visible && fields.surgeryStarted.required ? ew.Validators.required(fields.surgeryStarted.caption) : null, ew.Validators.datetime(11)], fields.surgeryStarted.isInvalid],
        ["surgeryEnded", [fields.surgeryEnded.visible && fields.surgeryEnded.required ? ew.Validators.required(fields.surgeryEnded.caption) : null, ew.Validators.datetime(11)], fields.surgeryEnded.isInvalid],
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
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null, ew.Validators.integer], fields.Reception.isInvalid],
        ["PId", [fields.PId.visible && fields.PId.required ? ew.Validators.required(fields.PId.caption) : null, ew.Validators.integer], fields.PId.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_ot_delivery_registergrid,
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
    fpatient_ot_delivery_registergrid.validate = function () {
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
            var checkrow = (gridinsert) ? !this.emptyRow(rowIndex) : true;
            if (checkrow) {
                addcnt++;

            // Validate fields
            if (!this.validateFields(rowIndex))
                return false;

            // Call Form_CustomValidate event
            if (!this.customValidate(fobj)) {
                this.focus();
                return false;
            }
            } // End Grid Add checking
        }
        return true;
    }

    // Check empty row
    fpatient_ot_delivery_registergrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "PatID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MobileNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ObstetricsHistryFeMale", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Abortion", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildBirthDate", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildBirthTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildSex", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildWt", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildDay", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildOE", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildBlGrp", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ApgarScore", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "birthnotification", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "formno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "dte", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "motherReligion", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "bloodgroup", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createdby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "createddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modifiedby", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "modifieddatetime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildBirthDate1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildBirthTime1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildSex1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildWt1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildDay1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildOE1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ChildBlGrp1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ApgarScore1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "birthnotification1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "formno1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RecievedTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnaesthesiaStarted", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnaesthesiaEnded", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "surgeryStarted", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "surgeryEnded", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RecoveryTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ShiftedTime", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Duration", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Surgeon", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Anaesthetist", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AsstSurgeon1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AsstSurgeon2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "paediatric", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ScrubNurse1", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "ScrubNurse2", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FloorNurse", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Technician", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HouseKeeping", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "countsCheckedMops", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "gauze", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "needles", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "bloodloss", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "bloodtransfusion", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PId", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_ot_delivery_registergrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_ot_delivery_registergrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_ot_delivery_registergrid.lists.Surgeon = <?= $Grid->Surgeon->toClientList($Grid) ?>;
    fpatient_ot_delivery_registergrid.lists.Anaesthetist = <?= $Grid->Anaesthetist->toClientList($Grid) ?>;
    fpatient_ot_delivery_registergrid.lists.AsstSurgeon1 = <?= $Grid->AsstSurgeon1->toClientList($Grid) ?>;
    fpatient_ot_delivery_registergrid.lists.AsstSurgeon2 = <?= $Grid->AsstSurgeon2->toClientList($Grid) ?>;
    fpatient_ot_delivery_registergrid.lists.paediatric = <?= $Grid->paediatric->toClientList($Grid) ?>;
    loadjs.done("fpatient_ot_delivery_registergrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_ot_delivery_register">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_ot_delivery_registergrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_ot_delivery_register" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_ot_delivery_registergrid" class="table ew-table"><!-- .ew-table -->
<thead>
    <tr class="ew-table-header">
<?php
// Header row
$Grid->RowType = ROWTYPE_HEADER;

// Render list options
$Grid->renderListOptions();

// Render list options (header, left)
$Grid->ListOptions->render("header", "left");
?>
<?php if ($Grid->id->Visible) { // id ?>
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_id" class="patient_ot_delivery_register_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Grid->PatID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatID" class="patient_ot_delivery_register_PatID"><?= $Grid->renderSort($Grid->PatID) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientName" class="patient_ot_delivery_register_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_mrnno" class="patient_ot_delivery_register_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
<?php } ?>
<?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_MobileNumber" class="patient_ot_delivery_register_MobileNumber"><?= $Grid->renderSort($Grid->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Grid->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Grid->Age->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Age" class="patient_ot_delivery_register_Age"><?= $Grid->renderSort($Grid->Age) ?></div></th>
<?php } ?>
<?php if ($Grid->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Grid->Gender->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Gender" class="patient_ot_delivery_register_Gender"><?= $Grid->renderSort($Grid->Gender) ?></div></th>
<?php } ?>
<?php if ($Grid->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
        <th data-name="ObstetricsHistryFeMale" class="<?= $Grid->ObstetricsHistryFeMale->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ObstetricsHistryFeMale" class="patient_ot_delivery_register_ObstetricsHistryFeMale"><?= $Grid->renderSort($Grid->ObstetricsHistryFeMale) ?></div></th>
<?php } ?>
<?php if ($Grid->Abortion->Visible) { // Abortion ?>
        <th data-name="Abortion" class="<?= $Grid->Abortion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Abortion" class="patient_ot_delivery_register_Abortion"><?= $Grid->renderSort($Grid->Abortion) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildBirthDate->Visible) { // ChildBirthDate ?>
        <th data-name="ChildBirthDate" class="<?= $Grid->ChildBirthDate->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate" class="patient_ot_delivery_register_ChildBirthDate"><?= $Grid->renderSort($Grid->ChildBirthDate) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildBirthTime->Visible) { // ChildBirthTime ?>
        <th data-name="ChildBirthTime" class="<?= $Grid->ChildBirthTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime" class="patient_ot_delivery_register_ChildBirthTime"><?= $Grid->renderSort($Grid->ChildBirthTime) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildSex->Visible) { // ChildSex ?>
        <th data-name="ChildSex" class="<?= $Grid->ChildSex->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex" class="patient_ot_delivery_register_ChildSex"><?= $Grid->renderSort($Grid->ChildSex) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildWt->Visible) { // ChildWt ?>
        <th data-name="ChildWt" class="<?= $Grid->ChildWt->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt" class="patient_ot_delivery_register_ChildWt"><?= $Grid->renderSort($Grid->ChildWt) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildDay->Visible) { // ChildDay ?>
        <th data-name="ChildDay" class="<?= $Grid->ChildDay->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay" class="patient_ot_delivery_register_ChildDay"><?= $Grid->renderSort($Grid->ChildDay) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildOE->Visible) { // ChildOE ?>
        <th data-name="ChildOE" class="<?= $Grid->ChildOE->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE" class="patient_ot_delivery_register_ChildOE"><?= $Grid->renderSort($Grid->ChildOE) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildBlGrp->Visible) { // ChildBlGrp ?>
        <th data-name="ChildBlGrp" class="<?= $Grid->ChildBlGrp->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp" class="patient_ot_delivery_register_ChildBlGrp"><?= $Grid->renderSort($Grid->ChildBlGrp) ?></div></th>
<?php } ?>
<?php if ($Grid->ApgarScore->Visible) { // ApgarScore ?>
        <th data-name="ApgarScore" class="<?= $Grid->ApgarScore->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore" class="patient_ot_delivery_register_ApgarScore"><?= $Grid->renderSort($Grid->ApgarScore) ?></div></th>
<?php } ?>
<?php if ($Grid->birthnotification->Visible) { // birthnotification ?>
        <th data-name="birthnotification" class="<?= $Grid->birthnotification->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification" class="patient_ot_delivery_register_birthnotification"><?= $Grid->renderSort($Grid->birthnotification) ?></div></th>
<?php } ?>
<?php if ($Grid->formno->Visible) { // formno ?>
        <th data-name="formno" class="<?= $Grid->formno->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno" class="patient_ot_delivery_register_formno"><?= $Grid->renderSort($Grid->formno) ?></div></th>
<?php } ?>
<?php if ($Grid->dte->Visible) { // dte ?>
        <th data-name="dte" class="<?= $Grid->dte->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_dte" class="patient_ot_delivery_register_dte"><?= $Grid->renderSort($Grid->dte) ?></div></th>
<?php } ?>
<?php if ($Grid->motherReligion->Visible) { // motherReligion ?>
        <th data-name="motherReligion" class="<?= $Grid->motherReligion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_motherReligion" class="patient_ot_delivery_register_motherReligion"><?= $Grid->renderSort($Grid->motherReligion) ?></div></th>
<?php } ?>
<?php if ($Grid->bloodgroup->Visible) { // bloodgroup ?>
        <th data-name="bloodgroup" class="<?= $Grid->bloodgroup->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodgroup" class="patient_ot_delivery_register_bloodgroup"><?= $Grid->renderSort($Grid->bloodgroup) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_status" class="patient_ot_delivery_register_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createdby" class="patient_ot_delivery_register_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_createddatetime" class="patient_ot_delivery_register_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifiedby" class="patient_ot_delivery_register_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_modifieddatetime" class="patient_ot_delivery_register_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <th data-name="PatientID" class="<?= $Grid->PatientID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PatientID" class="patient_ot_delivery_register_PatientID"><?= $Grid->renderSort($Grid->PatientID) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HospID" class="patient_ot_delivery_register_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
        <th data-name="ChildBirthDate1" class="<?= $Grid->ChildBirthDate1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthDate1" class="patient_ot_delivery_register_ChildBirthDate1"><?= $Grid->renderSort($Grid->ChildBirthDate1) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
        <th data-name="ChildBirthTime1" class="<?= $Grid->ChildBirthTime1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBirthTime1" class="patient_ot_delivery_register_ChildBirthTime1"><?= $Grid->renderSort($Grid->ChildBirthTime1) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildSex1->Visible) { // ChildSex1 ?>
        <th data-name="ChildSex1" class="<?= $Grid->ChildSex1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildSex1" class="patient_ot_delivery_register_ChildSex1"><?= $Grid->renderSort($Grid->ChildSex1) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildWt1->Visible) { // ChildWt1 ?>
        <th data-name="ChildWt1" class="<?= $Grid->ChildWt1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildWt1" class="patient_ot_delivery_register_ChildWt1"><?= $Grid->renderSort($Grid->ChildWt1) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildDay1->Visible) { // ChildDay1 ?>
        <th data-name="ChildDay1" class="<?= $Grid->ChildDay1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildDay1" class="patient_ot_delivery_register_ChildDay1"><?= $Grid->renderSort($Grid->ChildDay1) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildOE1->Visible) { // ChildOE1 ?>
        <th data-name="ChildOE1" class="<?= $Grid->ChildOE1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildOE1" class="patient_ot_delivery_register_ChildOE1"><?= $Grid->renderSort($Grid->ChildOE1) ?></div></th>
<?php } ?>
<?php if ($Grid->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
        <th data-name="ChildBlGrp1" class="<?= $Grid->ChildBlGrp1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ChildBlGrp1" class="patient_ot_delivery_register_ChildBlGrp1"><?= $Grid->renderSort($Grid->ChildBlGrp1) ?></div></th>
<?php } ?>
<?php if ($Grid->ApgarScore1->Visible) { // ApgarScore1 ?>
        <th data-name="ApgarScore1" class="<?= $Grid->ApgarScore1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ApgarScore1" class="patient_ot_delivery_register_ApgarScore1"><?= $Grid->renderSort($Grid->ApgarScore1) ?></div></th>
<?php } ?>
<?php if ($Grid->birthnotification1->Visible) { // birthnotification1 ?>
        <th data-name="birthnotification1" class="<?= $Grid->birthnotification1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_birthnotification1" class="patient_ot_delivery_register_birthnotification1"><?= $Grid->renderSort($Grid->birthnotification1) ?></div></th>
<?php } ?>
<?php if ($Grid->formno1->Visible) { // formno1 ?>
        <th data-name="formno1" class="<?= $Grid->formno1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_formno1" class="patient_ot_delivery_register_formno1"><?= $Grid->renderSort($Grid->formno1) ?></div></th>
<?php } ?>
<?php if ($Grid->RecievedTime->Visible) { // RecievedTime ?>
        <th data-name="RecievedTime" class="<?= $Grid->RecievedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecievedTime" class="patient_ot_delivery_register_RecievedTime"><?= $Grid->renderSort($Grid->RecievedTime) ?></div></th>
<?php } ?>
<?php if ($Grid->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <th data-name="AnaesthesiaStarted" class="<?= $Grid->AnaesthesiaStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaStarted" class="patient_ot_delivery_register_AnaesthesiaStarted"><?= $Grid->renderSort($Grid->AnaesthesiaStarted) ?></div></th>
<?php } ?>
<?php if ($Grid->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <th data-name="AnaesthesiaEnded" class="<?= $Grid->AnaesthesiaEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AnaesthesiaEnded" class="patient_ot_delivery_register_AnaesthesiaEnded"><?= $Grid->renderSort($Grid->AnaesthesiaEnded) ?></div></th>
<?php } ?>
<?php if ($Grid->surgeryStarted->Visible) { // surgeryStarted ?>
        <th data-name="surgeryStarted" class="<?= $Grid->surgeryStarted->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryStarted" class="patient_ot_delivery_register_surgeryStarted"><?= $Grid->renderSort($Grid->surgeryStarted) ?></div></th>
<?php } ?>
<?php if ($Grid->surgeryEnded->Visible) { // surgeryEnded ?>
        <th data-name="surgeryEnded" class="<?= $Grid->surgeryEnded->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_surgeryEnded" class="patient_ot_delivery_register_surgeryEnded"><?= $Grid->renderSort($Grid->surgeryEnded) ?></div></th>
<?php } ?>
<?php if ($Grid->RecoveryTime->Visible) { // RecoveryTime ?>
        <th data-name="RecoveryTime" class="<?= $Grid->RecoveryTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_RecoveryTime" class="patient_ot_delivery_register_RecoveryTime"><?= $Grid->renderSort($Grid->RecoveryTime) ?></div></th>
<?php } ?>
<?php if ($Grid->ShiftedTime->Visible) { // ShiftedTime ?>
        <th data-name="ShiftedTime" class="<?= $Grid->ShiftedTime->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ShiftedTime" class="patient_ot_delivery_register_ShiftedTime"><?= $Grid->renderSort($Grid->ShiftedTime) ?></div></th>
<?php } ?>
<?php if ($Grid->Duration->Visible) { // Duration ?>
        <th data-name="Duration" class="<?= $Grid->Duration->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Duration" class="patient_ot_delivery_register_Duration"><?= $Grid->renderSort($Grid->Duration) ?></div></th>
<?php } ?>
<?php if ($Grid->Surgeon->Visible) { // Surgeon ?>
        <th data-name="Surgeon" class="<?= $Grid->Surgeon->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Surgeon" class="patient_ot_delivery_register_Surgeon"><?= $Grid->renderSort($Grid->Surgeon) ?></div></th>
<?php } ?>
<?php if ($Grid->Anaesthetist->Visible) { // Anaesthetist ?>
        <th data-name="Anaesthetist" class="<?= $Grid->Anaesthetist->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Anaesthetist" class="patient_ot_delivery_register_Anaesthetist"><?= $Grid->renderSort($Grid->Anaesthetist) ?></div></th>
<?php } ?>
<?php if ($Grid->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <th data-name="AsstSurgeon1" class="<?= $Grid->AsstSurgeon1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon1" class="patient_ot_delivery_register_AsstSurgeon1"><?= $Grid->renderSort($Grid->AsstSurgeon1) ?></div></th>
<?php } ?>
<?php if ($Grid->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <th data-name="AsstSurgeon2" class="<?= $Grid->AsstSurgeon2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_AsstSurgeon2" class="patient_ot_delivery_register_AsstSurgeon2"><?= $Grid->renderSort($Grid->AsstSurgeon2) ?></div></th>
<?php } ?>
<?php if ($Grid->paediatric->Visible) { // paediatric ?>
        <th data-name="paediatric" class="<?= $Grid->paediatric->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_paediatric" class="patient_ot_delivery_register_paediatric"><?= $Grid->renderSort($Grid->paediatric) ?></div></th>
<?php } ?>
<?php if ($Grid->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <th data-name="ScrubNurse1" class="<?= $Grid->ScrubNurse1->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse1" class="patient_ot_delivery_register_ScrubNurse1"><?= $Grid->renderSort($Grid->ScrubNurse1) ?></div></th>
<?php } ?>
<?php if ($Grid->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <th data-name="ScrubNurse2" class="<?= $Grid->ScrubNurse2->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_ScrubNurse2" class="patient_ot_delivery_register_ScrubNurse2"><?= $Grid->renderSort($Grid->ScrubNurse2) ?></div></th>
<?php } ?>
<?php if ($Grid->FloorNurse->Visible) { // FloorNurse ?>
        <th data-name="FloorNurse" class="<?= $Grid->FloorNurse->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_FloorNurse" class="patient_ot_delivery_register_FloorNurse"><?= $Grid->renderSort($Grid->FloorNurse) ?></div></th>
<?php } ?>
<?php if ($Grid->Technician->Visible) { // Technician ?>
        <th data-name="Technician" class="<?= $Grid->Technician->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Technician" class="patient_ot_delivery_register_Technician"><?= $Grid->renderSort($Grid->Technician) ?></div></th>
<?php } ?>
<?php if ($Grid->HouseKeeping->Visible) { // HouseKeeping ?>
        <th data-name="HouseKeeping" class="<?= $Grid->HouseKeeping->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_HouseKeeping" class="patient_ot_delivery_register_HouseKeeping"><?= $Grid->renderSort($Grid->HouseKeeping) ?></div></th>
<?php } ?>
<?php if ($Grid->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <th data-name="countsCheckedMops" class="<?= $Grid->countsCheckedMops->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_countsCheckedMops" class="patient_ot_delivery_register_countsCheckedMops"><?= $Grid->renderSort($Grid->countsCheckedMops) ?></div></th>
<?php } ?>
<?php if ($Grid->gauze->Visible) { // gauze ?>
        <th data-name="gauze" class="<?= $Grid->gauze->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_gauze" class="patient_ot_delivery_register_gauze"><?= $Grid->renderSort($Grid->gauze) ?></div></th>
<?php } ?>
<?php if ($Grid->needles->Visible) { // needles ?>
        <th data-name="needles" class="<?= $Grid->needles->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_needles" class="patient_ot_delivery_register_needles"><?= $Grid->renderSort($Grid->needles) ?></div></th>
<?php } ?>
<?php if ($Grid->bloodloss->Visible) { // bloodloss ?>
        <th data-name="bloodloss" class="<?= $Grid->bloodloss->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodloss" class="patient_ot_delivery_register_bloodloss"><?= $Grid->renderSort($Grid->bloodloss) ?></div></th>
<?php } ?>
<?php if ($Grid->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <th data-name="bloodtransfusion" class="<?= $Grid->bloodtransfusion->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_bloodtransfusion" class="patient_ot_delivery_register_bloodtransfusion"><?= $Grid->renderSort($Grid->bloodtransfusion) ?></div></th>
<?php } ?>
<?php if ($Grid->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Grid->Reception->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_Reception" class="patient_ot_delivery_register_Reception"><?= $Grid->renderSort($Grid->Reception) ?></div></th>
<?php } ?>
<?php if ($Grid->PId->Visible) { // PId ?>
        <th data-name="PId" class="<?= $Grid->PId->headerCellClass() ?>"><div id="elh_patient_ot_delivery_register_PId" class="patient_ot_delivery_register_PId"><?= $Grid->renderSort($Grid->PId) ?></div></th>
<?php } ?>
<?php
// Render list options (header, right)
$Grid->ListOptions->render("header", "right");
?>
    </tr>
</thead>
<tbody>
<?php
$Grid->StartRecord = 1;
$Grid->StopRecord = $Grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($Grid->isConfirm() || $Grid->EventCancelled)) {
    $CurrentForm->Index = -1;
    if ($CurrentForm->hasValue($Grid->FormKeyCountName) && ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm())) {
        $Grid->KeyCount = $CurrentForm->getValue($Grid->FormKeyCountName);
        $Grid->StopRecord = $Grid->StartRecord + $Grid->KeyCount - 1;
    }
}
$Grid->RecordCount = $Grid->StartRecord - 1;
if ($Grid->Recordset && !$Grid->Recordset->EOF) {
    // Nothing to do
} elseif (!$Grid->AllowAddDeleteRow && $Grid->StopRecord == 0) {
    $Grid->StopRecord = $Grid->GridAddRowCount;
}

// Initialize aggregate
$Grid->RowType = ROWTYPE_AGGREGATEINIT;
$Grid->resetAttributes();
$Grid->renderRow();
if ($Grid->isGridAdd())
    $Grid->RowIndex = 0;
if ($Grid->isGridEdit())
    $Grid->RowIndex = 0;
while ($Grid->RecordCount < $Grid->StopRecord) {
    $Grid->RecordCount++;
    if ($Grid->RecordCount >= $Grid->StartRecord) {
        $Grid->RowCount++;
        if ($Grid->isGridAdd() || $Grid->isGridEdit() || $Grid->isConfirm()) {
            $Grid->RowIndex++;
            $CurrentForm->Index = $Grid->RowIndex;
            if ($CurrentForm->hasValue($Grid->FormActionName) && ($Grid->isConfirm() || $Grid->EventCancelled)) {
                $Grid->RowAction = strval($CurrentForm->getValue($Grid->FormActionName));
            } elseif ($Grid->isGridAdd()) {
                $Grid->RowAction = "insert";
            } else {
                $Grid->RowAction = "";
            }
        }

        // Set up key count
        $Grid->KeyCount = $Grid->RowIndex;

        // Init row class and style
        $Grid->resetAttributes();
        $Grid->CssClass = "";
        if ($Grid->isGridAdd()) {
            if ($Grid->CurrentMode == "copy") {
                $Grid->loadRowValues($Grid->Recordset); // Load row values
                $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
            } else {
                $Grid->loadRowValues(); // Load default values
                $Grid->OldKey = "";
            }
        } else {
            $Grid->loadRowValues($Grid->Recordset); // Load row values
            $Grid->OldKey = $Grid->getKey(true); // Get from CurrentValue
        }
        $Grid->setKey($Grid->OldKey);
        $Grid->RowType = ROWTYPE_VIEW; // Render view
        if ($Grid->isGridAdd()) { // Grid add
            $Grid->RowType = ROWTYPE_ADD; // Render add
        }
        if ($Grid->isGridAdd() && $Grid->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) { // Insert failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->isGridEdit()) { // Grid edit
            if ($Grid->EventCancelled) {
                $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
            }
            if ($Grid->RowAction == "insert") {
                $Grid->RowType = ROWTYPE_ADD; // Render add
            } else {
                $Grid->RowType = ROWTYPE_EDIT; // Render edit
            }
        }
        if ($Grid->isGridEdit() && ($Grid->RowType == ROWTYPE_EDIT || $Grid->RowType == ROWTYPE_ADD) && $Grid->EventCancelled) { // Update failed
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }
        if ($Grid->RowType == ROWTYPE_EDIT) { // Edit row
            $Grid->EditRowCount++;
        }
        if ($Grid->isConfirm()) { // Confirm row
            $Grid->restoreCurrentRowFormValues($Grid->RowIndex); // Restore form values
        }

        // Set up row id / data-rowindex
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_ot_delivery_register", "data-rowtype" => $Grid->RowType]);

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();

        // Skip delete row / empty row for confirm page
        if ($Grid->RowAction != "delete" && $Grid->RowAction != "insertdelete" && !($Grid->RowAction == "insert" && $Grid->isConfirm() && $Grid->emptyRow())) {
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowCount);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id" <?= $Grid->id->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_id" class="form-group"></span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Grid->PatID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<?= $Grid->PatID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_PatID" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_PatID" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_PatientName" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_PatientName" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_mrnno" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_mrnno" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Grid->MobileNumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<?= $Grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_MobileNumber" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_MobileNumber" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Grid->Age->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<?= $Grid->Age->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Age" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Age" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Grid->Gender->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<?= $Grid->Gender->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Gender" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Gender" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
        <td data-name="ObstetricsHistryFeMale" <?= $Grid->ObstetricsHistryFeMale->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group">
<input type="<?= $Grid->ObstetricsHistryFeMale->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?= $Grid->ObstetricsHistryFeMale->EditValue ?>"<?= $Grid->ObstetricsHistryFeMale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ObstetricsHistryFeMale->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" id="o<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?= HtmlEncode($Grid->ObstetricsHistryFeMale->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group">
<input type="<?= $Grid->ObstetricsHistryFeMale->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?= $Grid->ObstetricsHistryFeMale->EditValue ?>"<?= $Grid->ObstetricsHistryFeMale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ObstetricsHistryFeMale->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?= $Grid->ObstetricsHistryFeMale->viewAttributes() ?>>
<?= $Grid->ObstetricsHistryFeMale->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?= HtmlEncode($Grid->ObstetricsHistryFeMale->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?= HtmlEncode($Grid->ObstetricsHistryFeMale->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Abortion->Visible) { // Abortion ?>
        <td data-name="Abortion" <?= $Grid->Abortion->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Abortion" class="form-group">
<input type="<?= $Grid->Abortion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?= $Grid->RowIndex ?>_Abortion" id="x<?= $Grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Abortion->getPlaceHolder()) ?>" value="<?= $Grid->Abortion->EditValue ?>"<?= $Grid->Abortion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abortion->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Abortion" id="o<?= $Grid->RowIndex ?>_Abortion" value="<?= HtmlEncode($Grid->Abortion->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Abortion" class="form-group">
<input type="<?= $Grid->Abortion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?= $Grid->RowIndex ?>_Abortion" id="x<?= $Grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Abortion->getPlaceHolder()) ?>" value="<?= $Grid->Abortion->EditValue ?>"<?= $Grid->Abortion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abortion->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Abortion">
<span<?= $Grid->Abortion->viewAttributes() ?>>
<?= $Grid->Abortion->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Abortion" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Abortion" value="<?= HtmlEncode($Grid->Abortion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Abortion" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Abortion" value="<?= HtmlEncode($Grid->Abortion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildBirthDate->Visible) { // ChildBirthDate ?>
        <td data-name="ChildBirthDate" <?= $Grid->ChildBirthDate->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate" class="form-group">
<input type="<?= $Grid->ChildBirthDate->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ChildBirthDate" id="x<?= $Grid->RowIndex ?>_ChildBirthDate" placeholder="<?= HtmlEncode($Grid->ChildBirthDate->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthDate->EditValue ?>"<?= $Grid->ChildBirthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthDate->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthDate->ReadOnly && !$Grid->ChildBirthDate->Disabled && !isset($Grid->ChildBirthDate->EditAttrs["readonly"]) && !isset($Grid->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBirthDate" id="o<?= $Grid->RowIndex ?>_ChildBirthDate" value="<?= HtmlEncode($Grid->ChildBirthDate->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate" class="form-group">
<input type="<?= $Grid->ChildBirthDate->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ChildBirthDate" id="x<?= $Grid->RowIndex ?>_ChildBirthDate" placeholder="<?= HtmlEncode($Grid->ChildBirthDate->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthDate->EditValue ?>"<?= $Grid->ChildBirthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthDate->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthDate->ReadOnly && !$Grid->ChildBirthDate->Disabled && !isset($Grid->ChildBirthDate->EditAttrs["readonly"]) && !isset($Grid->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate">
<span<?= $Grid->ChildBirthDate->viewAttributes() ?>>
<?= $Grid->ChildBirthDate->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBirthDate" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBirthDate" value="<?= HtmlEncode($Grid->ChildBirthDate->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBirthDate" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBirthDate" value="<?= HtmlEncode($Grid->ChildBirthDate->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildBirthTime->Visible) { // ChildBirthTime ?>
        <td data-name="ChildBirthTime" <?= $Grid->ChildBirthTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime" class="form-group">
<input type="<?= $Grid->ChildBirthTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?= $Grid->RowIndex ?>_ChildBirthTime" id="x<?= $Grid->RowIndex ?>_ChildBirthTime" placeholder="<?= HtmlEncode($Grid->ChildBirthTime->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthTime->EditValue ?>"<?= $Grid->ChildBirthTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthTime->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthTime->ReadOnly && !$Grid->ChildBirthTime->Disabled && !isset($Grid->ChildBirthTime->EditAttrs["readonly"]) && !isset($Grid->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "timepicker"], function() {
    ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBirthTime" id="o<?= $Grid->RowIndex ?>_ChildBirthTime" value="<?= HtmlEncode($Grid->ChildBirthTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime" class="form-group">
<input type="<?= $Grid->ChildBirthTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?= $Grid->RowIndex ?>_ChildBirthTime" id="x<?= $Grid->RowIndex ?>_ChildBirthTime" placeholder="<?= HtmlEncode($Grid->ChildBirthTime->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthTime->EditValue ?>"<?= $Grid->ChildBirthTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthTime->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthTime->ReadOnly && !$Grid->ChildBirthTime->Disabled && !isset($Grid->ChildBirthTime->EditAttrs["readonly"]) && !isset($Grid->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "timepicker"], function() {
    ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime">
<span<?= $Grid->ChildBirthTime->viewAttributes() ?>>
<?= $Grid->ChildBirthTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBirthTime" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBirthTime" value="<?= HtmlEncode($Grid->ChildBirthTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBirthTime" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBirthTime" value="<?= HtmlEncode($Grid->ChildBirthTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildSex->Visible) { // ChildSex ?>
        <td data-name="ChildSex" <?= $Grid->ChildSex->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildSex" class="form-group">
<input type="<?= $Grid->ChildSex->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?= $Grid->RowIndex ?>_ChildSex" id="x<?= $Grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildSex->getPlaceHolder()) ?>" value="<?= $Grid->ChildSex->EditValue ?>"<?= $Grid->ChildSex->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildSex->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildSex" id="o<?= $Grid->RowIndex ?>_ChildSex" value="<?= HtmlEncode($Grid->ChildSex->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildSex" class="form-group">
<input type="<?= $Grid->ChildSex->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?= $Grid->RowIndex ?>_ChildSex" id="x<?= $Grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildSex->getPlaceHolder()) ?>" value="<?= $Grid->ChildSex->EditValue ?>"<?= $Grid->ChildSex->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildSex->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildSex">
<span<?= $Grid->ChildSex->viewAttributes() ?>>
<?= $Grid->ChildSex->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildSex" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildSex" value="<?= HtmlEncode($Grid->ChildSex->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildSex" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildSex" value="<?= HtmlEncode($Grid->ChildSex->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildWt->Visible) { // ChildWt ?>
        <td data-name="ChildWt" <?= $Grid->ChildWt->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildWt" class="form-group">
<input type="<?= $Grid->ChildWt->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?= $Grid->RowIndex ?>_ChildWt" id="x<?= $Grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildWt->getPlaceHolder()) ?>" value="<?= $Grid->ChildWt->EditValue ?>"<?= $Grid->ChildWt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildWt->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildWt" id="o<?= $Grid->RowIndex ?>_ChildWt" value="<?= HtmlEncode($Grid->ChildWt->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildWt" class="form-group">
<input type="<?= $Grid->ChildWt->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?= $Grid->RowIndex ?>_ChildWt" id="x<?= $Grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildWt->getPlaceHolder()) ?>" value="<?= $Grid->ChildWt->EditValue ?>"<?= $Grid->ChildWt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildWt->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildWt">
<span<?= $Grid->ChildWt->viewAttributes() ?>>
<?= $Grid->ChildWt->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildWt" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildWt" value="<?= HtmlEncode($Grid->ChildWt->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildWt" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildWt" value="<?= HtmlEncode($Grid->ChildWt->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildDay->Visible) { // ChildDay ?>
        <td data-name="ChildDay" <?= $Grid->ChildDay->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildDay" class="form-group">
<input type="<?= $Grid->ChildDay->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?= $Grid->RowIndex ?>_ChildDay" id="x<?= $Grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildDay->getPlaceHolder()) ?>" value="<?= $Grid->ChildDay->EditValue ?>"<?= $Grid->ChildDay->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildDay->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildDay" id="o<?= $Grid->RowIndex ?>_ChildDay" value="<?= HtmlEncode($Grid->ChildDay->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildDay" class="form-group">
<input type="<?= $Grid->ChildDay->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?= $Grid->RowIndex ?>_ChildDay" id="x<?= $Grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildDay->getPlaceHolder()) ?>" value="<?= $Grid->ChildDay->EditValue ?>"<?= $Grid->ChildDay->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildDay->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildDay">
<span<?= $Grid->ChildDay->viewAttributes() ?>>
<?= $Grid->ChildDay->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildDay" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildDay" value="<?= HtmlEncode($Grid->ChildDay->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildDay" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildDay" value="<?= HtmlEncode($Grid->ChildDay->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildOE->Visible) { // ChildOE ?>
        <td data-name="ChildOE" <?= $Grid->ChildOE->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildOE" class="form-group">
<input type="<?= $Grid->ChildOE->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?= $Grid->RowIndex ?>_ChildOE" id="x<?= $Grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildOE->getPlaceHolder()) ?>" value="<?= $Grid->ChildOE->EditValue ?>"<?= $Grid->ChildOE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildOE->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildOE" id="o<?= $Grid->RowIndex ?>_ChildOE" value="<?= HtmlEncode($Grid->ChildOE->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildOE" class="form-group">
<input type="<?= $Grid->ChildOE->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?= $Grid->RowIndex ?>_ChildOE" id="x<?= $Grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildOE->getPlaceHolder()) ?>" value="<?= $Grid->ChildOE->EditValue ?>"<?= $Grid->ChildOE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildOE->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildOE">
<span<?= $Grid->ChildOE->viewAttributes() ?>>
<?= $Grid->ChildOE->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildOE" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildOE" value="<?= HtmlEncode($Grid->ChildOE->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildOE" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildOE" value="<?= HtmlEncode($Grid->ChildOE->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildBlGrp->Visible) { // ChildBlGrp ?>
        <td data-name="ChildBlGrp" <?= $Grid->ChildBlGrp->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp" class="form-group">
<input type="<?= $Grid->ChildBlGrp->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?= $Grid->RowIndex ?>_ChildBlGrp" id="x<?= $Grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBlGrp->getPlaceHolder()) ?>" value="<?= $Grid->ChildBlGrp->EditValue ?>"<?= $Grid->ChildBlGrp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBlGrp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBlGrp" id="o<?= $Grid->RowIndex ?>_ChildBlGrp" value="<?= HtmlEncode($Grid->ChildBlGrp->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp" class="form-group">
<input type="<?= $Grid->ChildBlGrp->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?= $Grid->RowIndex ?>_ChildBlGrp" id="x<?= $Grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBlGrp->getPlaceHolder()) ?>" value="<?= $Grid->ChildBlGrp->EditValue ?>"<?= $Grid->ChildBlGrp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBlGrp->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp">
<span<?= $Grid->ChildBlGrp->viewAttributes() ?>>
<?= $Grid->ChildBlGrp->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBlGrp" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBlGrp" value="<?= HtmlEncode($Grid->ChildBlGrp->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBlGrp" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBlGrp" value="<?= HtmlEncode($Grid->ChildBlGrp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ApgarScore->Visible) { // ApgarScore ?>
        <td data-name="ApgarScore" <?= $Grid->ApgarScore->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ApgarScore" class="form-group">
<input type="<?= $Grid->ApgarScore->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?= $Grid->RowIndex ?>_ApgarScore" id="x<?= $Grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ApgarScore->getPlaceHolder()) ?>" value="<?= $Grid->ApgarScore->EditValue ?>"<?= $Grid->ApgarScore->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ApgarScore->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ApgarScore" id="o<?= $Grid->RowIndex ?>_ApgarScore" value="<?= HtmlEncode($Grid->ApgarScore->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ApgarScore" class="form-group">
<input type="<?= $Grid->ApgarScore->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?= $Grid->RowIndex ?>_ApgarScore" id="x<?= $Grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ApgarScore->getPlaceHolder()) ?>" value="<?= $Grid->ApgarScore->EditValue ?>"<?= $Grid->ApgarScore->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ApgarScore->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ApgarScore">
<span<?= $Grid->ApgarScore->viewAttributes() ?>>
<?= $Grid->ApgarScore->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ApgarScore" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ApgarScore" value="<?= HtmlEncode($Grid->ApgarScore->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ApgarScore" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ApgarScore" value="<?= HtmlEncode($Grid->ApgarScore->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->birthnotification->Visible) { // birthnotification ?>
        <td data-name="birthnotification" <?= $Grid->birthnotification->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_birthnotification" class="form-group">
<input type="<?= $Grid->birthnotification->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?= $Grid->RowIndex ?>_birthnotification" id="x<?= $Grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->birthnotification->getPlaceHolder()) ?>" value="<?= $Grid->birthnotification->EditValue ?>"<?= $Grid->birthnotification->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->birthnotification->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" data-hidden="1" name="o<?= $Grid->RowIndex ?>_birthnotification" id="o<?= $Grid->RowIndex ?>_birthnotification" value="<?= HtmlEncode($Grid->birthnotification->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_birthnotification" class="form-group">
<input type="<?= $Grid->birthnotification->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?= $Grid->RowIndex ?>_birthnotification" id="x<?= $Grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->birthnotification->getPlaceHolder()) ?>" value="<?= $Grid->birthnotification->EditValue ?>"<?= $Grid->birthnotification->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->birthnotification->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_birthnotification">
<span<?= $Grid->birthnotification->viewAttributes() ?>>
<?= $Grid->birthnotification->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_birthnotification" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_birthnotification" value="<?= HtmlEncode($Grid->birthnotification->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_birthnotification" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_birthnotification" value="<?= HtmlEncode($Grid->birthnotification->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->formno->Visible) { // formno ?>
        <td data-name="formno" <?= $Grid->formno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_formno" class="form-group">
<input type="<?= $Grid->formno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?= $Grid->RowIndex ?>_formno" id="x<?= $Grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->formno->getPlaceHolder()) ?>" value="<?= $Grid->formno->EditValue ?>"<?= $Grid->formno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->formno->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_formno" id="o<?= $Grid->RowIndex ?>_formno" value="<?= HtmlEncode($Grid->formno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_formno" class="form-group">
<input type="<?= $Grid->formno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?= $Grid->RowIndex ?>_formno" id="x<?= $Grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->formno->getPlaceHolder()) ?>" value="<?= $Grid->formno->EditValue ?>"<?= $Grid->formno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->formno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_formno">
<span<?= $Grid->formno->viewAttributes() ?>>
<?= $Grid->formno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_formno" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_formno" value="<?= HtmlEncode($Grid->formno->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_formno" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_formno" value="<?= HtmlEncode($Grid->formno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->dte->Visible) { // dte ?>
        <td data-name="dte" <?= $Grid->dte->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_dte" class="form-group">
<input type="<?= $Grid->dte->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?= $Grid->RowIndex ?>_dte" id="x<?= $Grid->RowIndex ?>_dte" placeholder="<?= HtmlEncode($Grid->dte->getPlaceHolder()) ?>" value="<?= $Grid->dte->EditValue ?>"<?= $Grid->dte->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->dte->getErrorMessage() ?></div>
<?php if (!$Grid->dte->ReadOnly && !$Grid->dte->Disabled && !isset($Grid->dte->EditAttrs["readonly"]) && !isset($Grid->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" data-hidden="1" name="o<?= $Grid->RowIndex ?>_dte" id="o<?= $Grid->RowIndex ?>_dte" value="<?= HtmlEncode($Grid->dte->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_dte" class="form-group">
<input type="<?= $Grid->dte->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?= $Grid->RowIndex ?>_dte" id="x<?= $Grid->RowIndex ?>_dte" placeholder="<?= HtmlEncode($Grid->dte->getPlaceHolder()) ?>" value="<?= $Grid->dte->EditValue ?>"<?= $Grid->dte->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->dte->getErrorMessage() ?></div>
<?php if (!$Grid->dte->ReadOnly && !$Grid->dte->Disabled && !isset($Grid->dte->EditAttrs["readonly"]) && !isset($Grid->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_dte">
<span<?= $Grid->dte->viewAttributes() ?>>
<?= $Grid->dte->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_dte" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_dte" value="<?= HtmlEncode($Grid->dte->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_dte" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_dte" value="<?= HtmlEncode($Grid->dte->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->motherReligion->Visible) { // motherReligion ?>
        <td data-name="motherReligion" <?= $Grid->motherReligion->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_motherReligion" class="form-group">
<input type="<?= $Grid->motherReligion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?= $Grid->RowIndex ?>_motherReligion" id="x<?= $Grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->motherReligion->getPlaceHolder()) ?>" value="<?= $Grid->motherReligion->EditValue ?>"<?= $Grid->motherReligion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->motherReligion->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" data-hidden="1" name="o<?= $Grid->RowIndex ?>_motherReligion" id="o<?= $Grid->RowIndex ?>_motherReligion" value="<?= HtmlEncode($Grid->motherReligion->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_motherReligion" class="form-group">
<input type="<?= $Grid->motherReligion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?= $Grid->RowIndex ?>_motherReligion" id="x<?= $Grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->motherReligion->getPlaceHolder()) ?>" value="<?= $Grid->motherReligion->EditValue ?>"<?= $Grid->motherReligion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->motherReligion->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_motherReligion">
<span<?= $Grid->motherReligion->viewAttributes() ?>>
<?= $Grid->motherReligion->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_motherReligion" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_motherReligion" value="<?= HtmlEncode($Grid->motherReligion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_motherReligion" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_motherReligion" value="<?= HtmlEncode($Grid->motherReligion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->bloodgroup->Visible) { // bloodgroup ?>
        <td data-name="bloodgroup" <?= $Grid->bloodgroup->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodgroup" class="form-group">
<input type="<?= $Grid->bloodgroup->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?= $Grid->RowIndex ?>_bloodgroup" id="x<?= $Grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodgroup->getPlaceHolder()) ?>" value="<?= $Grid->bloodgroup->EditValue ?>"<?= $Grid->bloodgroup->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodgroup->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" data-hidden="1" name="o<?= $Grid->RowIndex ?>_bloodgroup" id="o<?= $Grid->RowIndex ?>_bloodgroup" value="<?= HtmlEncode($Grid->bloodgroup->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodgroup" class="form-group">
<input type="<?= $Grid->bloodgroup->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?= $Grid->RowIndex ?>_bloodgroup" id="x<?= $Grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodgroup->getPlaceHolder()) ?>" value="<?= $Grid->bloodgroup->EditValue ?>"<?= $Grid->bloodgroup->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodgroup->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodgroup">
<span<?= $Grid->bloodgroup->viewAttributes() ?>>
<?= $Grid->bloodgroup->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_bloodgroup" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_bloodgroup" value="<?= HtmlEncode($Grid->bloodgroup->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_bloodgroup" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_bloodgroup" value="<?= HtmlEncode($Grid->bloodgroup->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_status" class="form-group">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_status" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_status" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_createdby" class="form-group">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_createdby" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_createdby" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_createddatetime" class="form-group">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_modifiedby" class="form-group">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_modifiedby" class="form-group">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_modifieddatetime" class="form-group">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_modifieddatetime" class="form-group">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID" <?= $Grid->PatientID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatientID" class="form-group">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatientID" class="form-group">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PatientID">
<span<?= $Grid->PatientID->viewAttributes() ?>>
<?= $Grid->PatientID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_PatientID" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_PatientID" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_HospID" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_HospID" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
        <td data-name="ChildBirthDate1" <?= $Grid->ChildBirthDate1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1" class="form-group">
<input type="<?= $Grid->ChildBirthDate1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?= $Grid->RowIndex ?>_ChildBirthDate1" id="x<?= $Grid->RowIndex ?>_ChildBirthDate1" placeholder="<?= HtmlEncode($Grid->ChildBirthDate1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthDate1->EditValue ?>"<?= $Grid->ChildBirthDate1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthDate1->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthDate1->ReadOnly && !$Grid->ChildBirthDate1->Disabled && !isset($Grid->ChildBirthDate1->EditAttrs["readonly"]) && !isset($Grid->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBirthDate1" id="o<?= $Grid->RowIndex ?>_ChildBirthDate1" value="<?= HtmlEncode($Grid->ChildBirthDate1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1" class="form-group">
<input type="<?= $Grid->ChildBirthDate1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?= $Grid->RowIndex ?>_ChildBirthDate1" id="x<?= $Grid->RowIndex ?>_ChildBirthDate1" placeholder="<?= HtmlEncode($Grid->ChildBirthDate1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthDate1->EditValue ?>"<?= $Grid->ChildBirthDate1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthDate1->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthDate1->ReadOnly && !$Grid->ChildBirthDate1->Disabled && !isset($Grid->ChildBirthDate1->EditAttrs["readonly"]) && !isset($Grid->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthDate1">
<span<?= $Grid->ChildBirthDate1->viewAttributes() ?>>
<?= $Grid->ChildBirthDate1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBirthDate1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBirthDate1" value="<?= HtmlEncode($Grid->ChildBirthDate1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBirthDate1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBirthDate1" value="<?= HtmlEncode($Grid->ChildBirthDate1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
        <td data-name="ChildBirthTime1" <?= $Grid->ChildBirthTime1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1" class="form-group">
<input type="<?= $Grid->ChildBirthTime1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?= $Grid->RowIndex ?>_ChildBirthTime1" id="x<?= $Grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBirthTime1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthTime1->EditValue ?>"<?= $Grid->ChildBirthTime1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthTime1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBirthTime1" id="o<?= $Grid->RowIndex ?>_ChildBirthTime1" value="<?= HtmlEncode($Grid->ChildBirthTime1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1" class="form-group">
<input type="<?= $Grid->ChildBirthTime1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?= $Grid->RowIndex ?>_ChildBirthTime1" id="x<?= $Grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBirthTime1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthTime1->EditValue ?>"<?= $Grid->ChildBirthTime1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthTime1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBirthTime1">
<span<?= $Grid->ChildBirthTime1->viewAttributes() ?>>
<?= $Grid->ChildBirthTime1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBirthTime1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBirthTime1" value="<?= HtmlEncode($Grid->ChildBirthTime1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBirthTime1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBirthTime1" value="<?= HtmlEncode($Grid->ChildBirthTime1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildSex1->Visible) { // ChildSex1 ?>
        <td data-name="ChildSex1" <?= $Grid->ChildSex1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildSex1" class="form-group">
<input type="<?= $Grid->ChildSex1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?= $Grid->RowIndex ?>_ChildSex1" id="x<?= $Grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildSex1->getPlaceHolder()) ?>" value="<?= $Grid->ChildSex1->EditValue ?>"<?= $Grid->ChildSex1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildSex1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildSex1" id="o<?= $Grid->RowIndex ?>_ChildSex1" value="<?= HtmlEncode($Grid->ChildSex1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildSex1" class="form-group">
<input type="<?= $Grid->ChildSex1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?= $Grid->RowIndex ?>_ChildSex1" id="x<?= $Grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildSex1->getPlaceHolder()) ?>" value="<?= $Grid->ChildSex1->EditValue ?>"<?= $Grid->ChildSex1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildSex1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildSex1">
<span<?= $Grid->ChildSex1->viewAttributes() ?>>
<?= $Grid->ChildSex1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildSex1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildSex1" value="<?= HtmlEncode($Grid->ChildSex1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildSex1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildSex1" value="<?= HtmlEncode($Grid->ChildSex1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildWt1->Visible) { // ChildWt1 ?>
        <td data-name="ChildWt1" <?= $Grid->ChildWt1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildWt1" class="form-group">
<input type="<?= $Grid->ChildWt1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?= $Grid->RowIndex ?>_ChildWt1" id="x<?= $Grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildWt1->getPlaceHolder()) ?>" value="<?= $Grid->ChildWt1->EditValue ?>"<?= $Grid->ChildWt1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildWt1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildWt1" id="o<?= $Grid->RowIndex ?>_ChildWt1" value="<?= HtmlEncode($Grid->ChildWt1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildWt1" class="form-group">
<input type="<?= $Grid->ChildWt1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?= $Grid->RowIndex ?>_ChildWt1" id="x<?= $Grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildWt1->getPlaceHolder()) ?>" value="<?= $Grid->ChildWt1->EditValue ?>"<?= $Grid->ChildWt1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildWt1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildWt1">
<span<?= $Grid->ChildWt1->viewAttributes() ?>>
<?= $Grid->ChildWt1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildWt1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildWt1" value="<?= HtmlEncode($Grid->ChildWt1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildWt1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildWt1" value="<?= HtmlEncode($Grid->ChildWt1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildDay1->Visible) { // ChildDay1 ?>
        <td data-name="ChildDay1" <?= $Grid->ChildDay1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildDay1" class="form-group">
<input type="<?= $Grid->ChildDay1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?= $Grid->RowIndex ?>_ChildDay1" id="x<?= $Grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildDay1->getPlaceHolder()) ?>" value="<?= $Grid->ChildDay1->EditValue ?>"<?= $Grid->ChildDay1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildDay1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildDay1" id="o<?= $Grid->RowIndex ?>_ChildDay1" value="<?= HtmlEncode($Grid->ChildDay1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildDay1" class="form-group">
<input type="<?= $Grid->ChildDay1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?= $Grid->RowIndex ?>_ChildDay1" id="x<?= $Grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildDay1->getPlaceHolder()) ?>" value="<?= $Grid->ChildDay1->EditValue ?>"<?= $Grid->ChildDay1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildDay1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildDay1">
<span<?= $Grid->ChildDay1->viewAttributes() ?>>
<?= $Grid->ChildDay1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildDay1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildDay1" value="<?= HtmlEncode($Grid->ChildDay1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildDay1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildDay1" value="<?= HtmlEncode($Grid->ChildDay1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildOE1->Visible) { // ChildOE1 ?>
        <td data-name="ChildOE1" <?= $Grid->ChildOE1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildOE1" class="form-group">
<input type="<?= $Grid->ChildOE1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?= $Grid->RowIndex ?>_ChildOE1" id="x<?= $Grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildOE1->getPlaceHolder()) ?>" value="<?= $Grid->ChildOE1->EditValue ?>"<?= $Grid->ChildOE1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildOE1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildOE1" id="o<?= $Grid->RowIndex ?>_ChildOE1" value="<?= HtmlEncode($Grid->ChildOE1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildOE1" class="form-group">
<input type="<?= $Grid->ChildOE1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?= $Grid->RowIndex ?>_ChildOE1" id="x<?= $Grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildOE1->getPlaceHolder()) ?>" value="<?= $Grid->ChildOE1->EditValue ?>"<?= $Grid->ChildOE1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildOE1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildOE1">
<span<?= $Grid->ChildOE1->viewAttributes() ?>>
<?= $Grid->ChildOE1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildOE1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildOE1" value="<?= HtmlEncode($Grid->ChildOE1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildOE1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildOE1" value="<?= HtmlEncode($Grid->ChildOE1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
        <td data-name="ChildBlGrp1" <?= $Grid->ChildBlGrp1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1" class="form-group">
<input type="<?= $Grid->ChildBlGrp1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?= $Grid->RowIndex ?>_ChildBlGrp1" id="x<?= $Grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBlGrp1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBlGrp1->EditValue ?>"<?= $Grid->ChildBlGrp1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBlGrp1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBlGrp1" id="o<?= $Grid->RowIndex ?>_ChildBlGrp1" value="<?= HtmlEncode($Grid->ChildBlGrp1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1" class="form-group">
<input type="<?= $Grid->ChildBlGrp1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?= $Grid->RowIndex ?>_ChildBlGrp1" id="x<?= $Grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBlGrp1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBlGrp1->EditValue ?>"<?= $Grid->ChildBlGrp1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBlGrp1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ChildBlGrp1">
<span<?= $Grid->ChildBlGrp1->viewAttributes() ?>>
<?= $Grid->ChildBlGrp1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBlGrp1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ChildBlGrp1" value="<?= HtmlEncode($Grid->ChildBlGrp1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBlGrp1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ChildBlGrp1" value="<?= HtmlEncode($Grid->ChildBlGrp1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ApgarScore1->Visible) { // ApgarScore1 ?>
        <td data-name="ApgarScore1" <?= $Grid->ApgarScore1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ApgarScore1" class="form-group">
<input type="<?= $Grid->ApgarScore1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?= $Grid->RowIndex ?>_ApgarScore1" id="x<?= $Grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ApgarScore1->getPlaceHolder()) ?>" value="<?= $Grid->ApgarScore1->EditValue ?>"<?= $Grid->ApgarScore1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ApgarScore1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ApgarScore1" id="o<?= $Grid->RowIndex ?>_ApgarScore1" value="<?= HtmlEncode($Grid->ApgarScore1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ApgarScore1" class="form-group">
<input type="<?= $Grid->ApgarScore1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?= $Grid->RowIndex ?>_ApgarScore1" id="x<?= $Grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ApgarScore1->getPlaceHolder()) ?>" value="<?= $Grid->ApgarScore1->EditValue ?>"<?= $Grid->ApgarScore1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ApgarScore1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ApgarScore1">
<span<?= $Grid->ApgarScore1->viewAttributes() ?>>
<?= $Grid->ApgarScore1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ApgarScore1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ApgarScore1" value="<?= HtmlEncode($Grid->ApgarScore1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ApgarScore1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ApgarScore1" value="<?= HtmlEncode($Grid->ApgarScore1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->birthnotification1->Visible) { // birthnotification1 ?>
        <td data-name="birthnotification1" <?= $Grid->birthnotification1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_birthnotification1" class="form-group">
<input type="<?= $Grid->birthnotification1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?= $Grid->RowIndex ?>_birthnotification1" id="x<?= $Grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->birthnotification1->getPlaceHolder()) ?>" value="<?= $Grid->birthnotification1->EditValue ?>"<?= $Grid->birthnotification1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->birthnotification1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_birthnotification1" id="o<?= $Grid->RowIndex ?>_birthnotification1" value="<?= HtmlEncode($Grid->birthnotification1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_birthnotification1" class="form-group">
<input type="<?= $Grid->birthnotification1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?= $Grid->RowIndex ?>_birthnotification1" id="x<?= $Grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->birthnotification1->getPlaceHolder()) ?>" value="<?= $Grid->birthnotification1->EditValue ?>"<?= $Grid->birthnotification1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->birthnotification1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_birthnotification1">
<span<?= $Grid->birthnotification1->viewAttributes() ?>>
<?= $Grid->birthnotification1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_birthnotification1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_birthnotification1" value="<?= HtmlEncode($Grid->birthnotification1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_birthnotification1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_birthnotification1" value="<?= HtmlEncode($Grid->birthnotification1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->formno1->Visible) { // formno1 ?>
        <td data-name="formno1" <?= $Grid->formno1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_formno1" class="form-group">
<input type="<?= $Grid->formno1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?= $Grid->RowIndex ?>_formno1" id="x<?= $Grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->formno1->getPlaceHolder()) ?>" value="<?= $Grid->formno1->EditValue ?>"<?= $Grid->formno1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->formno1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_formno1" id="o<?= $Grid->RowIndex ?>_formno1" value="<?= HtmlEncode($Grid->formno1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_formno1" class="form-group">
<input type="<?= $Grid->formno1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?= $Grid->RowIndex ?>_formno1" id="x<?= $Grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->formno1->getPlaceHolder()) ?>" value="<?= $Grid->formno1->EditValue ?>"<?= $Grid->formno1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->formno1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_formno1">
<span<?= $Grid->formno1->viewAttributes() ?>>
<?= $Grid->formno1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_formno1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_formno1" value="<?= HtmlEncode($Grid->formno1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_formno1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_formno1" value="<?= HtmlEncode($Grid->formno1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RecievedTime->Visible) { // RecievedTime ?>
        <td data-name="RecievedTime" <?= $Grid->RecievedTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_RecievedTime" class="form-group">
<input type="<?= $Grid->RecievedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?= $Grid->RowIndex ?>_RecievedTime" id="x<?= $Grid->RowIndex ?>_RecievedTime" placeholder="<?= HtmlEncode($Grid->RecievedTime->getPlaceHolder()) ?>" value="<?= $Grid->RecievedTime->EditValue ?>"<?= $Grid->RecievedTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecievedTime->getErrorMessage() ?></div>
<?php if (!$Grid->RecievedTime->ReadOnly && !$Grid->RecievedTime->Disabled && !isset($Grid->RecievedTime->EditAttrs["readonly"]) && !isset($Grid->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RecievedTime" id="o<?= $Grid->RowIndex ?>_RecievedTime" value="<?= HtmlEncode($Grid->RecievedTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_RecievedTime" class="form-group">
<input type="<?= $Grid->RecievedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?= $Grid->RowIndex ?>_RecievedTime" id="x<?= $Grid->RowIndex ?>_RecievedTime" placeholder="<?= HtmlEncode($Grid->RecievedTime->getPlaceHolder()) ?>" value="<?= $Grid->RecievedTime->EditValue ?>"<?= $Grid->RecievedTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecievedTime->getErrorMessage() ?></div>
<?php if (!$Grid->RecievedTime->ReadOnly && !$Grid->RecievedTime->Disabled && !isset($Grid->RecievedTime->EditAttrs["readonly"]) && !isset($Grid->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_RecievedTime">
<span<?= $Grid->RecievedTime->viewAttributes() ?>>
<?= $Grid->RecievedTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_RecievedTime" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_RecievedTime" value="<?= HtmlEncode($Grid->RecievedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_RecievedTime" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_RecievedTime" value="<?= HtmlEncode($Grid->RecievedTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <td data-name="AnaesthesiaStarted" <?= $Grid->AnaesthesiaStarted->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group">
<input type="<?= $Grid->AnaesthesiaStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" id="x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?= HtmlEncode($Grid->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?= $Grid->AnaesthesiaStarted->EditValue ?>"<?= $Grid->AnaesthesiaStarted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaesthesiaStarted->getErrorMessage() ?></div>
<?php if (!$Grid->AnaesthesiaStarted->ReadOnly && !$Grid->AnaesthesiaStarted->Disabled && !isset($Grid->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($Grid->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnaesthesiaStarted" id="o<?= $Grid->RowIndex ?>_AnaesthesiaStarted" value="<?= HtmlEncode($Grid->AnaesthesiaStarted->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group">
<input type="<?= $Grid->AnaesthesiaStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" id="x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?= HtmlEncode($Grid->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?= $Grid->AnaesthesiaStarted->EditValue ?>"<?= $Grid->AnaesthesiaStarted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaesthesiaStarted->getErrorMessage() ?></div>
<?php if (!$Grid->AnaesthesiaStarted->ReadOnly && !$Grid->AnaesthesiaStarted->Disabled && !isset($Grid->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($Grid->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaStarted">
<span<?= $Grid->AnaesthesiaStarted->viewAttributes() ?>>
<?= $Grid->AnaesthesiaStarted->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" value="<?= HtmlEncode($Grid->AnaesthesiaStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_AnaesthesiaStarted" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_AnaesthesiaStarted" value="<?= HtmlEncode($Grid->AnaesthesiaStarted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <td data-name="AnaesthesiaEnded" <?= $Grid->AnaesthesiaEnded->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group">
<input type="<?= $Grid->AnaesthesiaEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" id="x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?= HtmlEncode($Grid->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?= $Grid->AnaesthesiaEnded->EditValue ?>"<?= $Grid->AnaesthesiaEnded->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaesthesiaEnded->getErrorMessage() ?></div>
<?php if (!$Grid->AnaesthesiaEnded->ReadOnly && !$Grid->AnaesthesiaEnded->Disabled && !isset($Grid->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($Grid->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnaesthesiaEnded" id="o<?= $Grid->RowIndex ?>_AnaesthesiaEnded" value="<?= HtmlEncode($Grid->AnaesthesiaEnded->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group">
<input type="<?= $Grid->AnaesthesiaEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" id="x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?= HtmlEncode($Grid->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?= $Grid->AnaesthesiaEnded->EditValue ?>"<?= $Grid->AnaesthesiaEnded->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaesthesiaEnded->getErrorMessage() ?></div>
<?php if (!$Grid->AnaesthesiaEnded->ReadOnly && !$Grid->AnaesthesiaEnded->Disabled && !isset($Grid->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($Grid->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AnaesthesiaEnded">
<span<?= $Grid->AnaesthesiaEnded->viewAttributes() ?>>
<?= $Grid->AnaesthesiaEnded->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" value="<?= HtmlEncode($Grid->AnaesthesiaEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_AnaesthesiaEnded" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_AnaesthesiaEnded" value="<?= HtmlEncode($Grid->AnaesthesiaEnded->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->surgeryStarted->Visible) { // surgeryStarted ?>
        <td data-name="surgeryStarted" <?= $Grid->surgeryStarted->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_surgeryStarted" class="form-group">
<input type="<?= $Grid->surgeryStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?= $Grid->RowIndex ?>_surgeryStarted" id="x<?= $Grid->RowIndex ?>_surgeryStarted" placeholder="<?= HtmlEncode($Grid->surgeryStarted->getPlaceHolder()) ?>" value="<?= $Grid->surgeryStarted->EditValue ?>"<?= $Grid->surgeryStarted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->surgeryStarted->getErrorMessage() ?></div>
<?php if (!$Grid->surgeryStarted->ReadOnly && !$Grid->surgeryStarted->Disabled && !isset($Grid->surgeryStarted->EditAttrs["readonly"]) && !isset($Grid->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_surgeryStarted" id="o<?= $Grid->RowIndex ?>_surgeryStarted" value="<?= HtmlEncode($Grid->surgeryStarted->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_surgeryStarted" class="form-group">
<input type="<?= $Grid->surgeryStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?= $Grid->RowIndex ?>_surgeryStarted" id="x<?= $Grid->RowIndex ?>_surgeryStarted" placeholder="<?= HtmlEncode($Grid->surgeryStarted->getPlaceHolder()) ?>" value="<?= $Grid->surgeryStarted->EditValue ?>"<?= $Grid->surgeryStarted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->surgeryStarted->getErrorMessage() ?></div>
<?php if (!$Grid->surgeryStarted->ReadOnly && !$Grid->surgeryStarted->Disabled && !isset($Grid->surgeryStarted->EditAttrs["readonly"]) && !isset($Grid->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_surgeryStarted">
<span<?= $Grid->surgeryStarted->viewAttributes() ?>>
<?= $Grid->surgeryStarted->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_surgeryStarted" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_surgeryStarted" value="<?= HtmlEncode($Grid->surgeryStarted->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_surgeryStarted" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_surgeryStarted" value="<?= HtmlEncode($Grid->surgeryStarted->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->surgeryEnded->Visible) { // surgeryEnded ?>
        <td data-name="surgeryEnded" <?= $Grid->surgeryEnded->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_surgeryEnded" class="form-group">
<input type="<?= $Grid->surgeryEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?= $Grid->RowIndex ?>_surgeryEnded" id="x<?= $Grid->RowIndex ?>_surgeryEnded" placeholder="<?= HtmlEncode($Grid->surgeryEnded->getPlaceHolder()) ?>" value="<?= $Grid->surgeryEnded->EditValue ?>"<?= $Grid->surgeryEnded->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->surgeryEnded->getErrorMessage() ?></div>
<?php if (!$Grid->surgeryEnded->ReadOnly && !$Grid->surgeryEnded->Disabled && !isset($Grid->surgeryEnded->EditAttrs["readonly"]) && !isset($Grid->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-hidden="1" name="o<?= $Grid->RowIndex ?>_surgeryEnded" id="o<?= $Grid->RowIndex ?>_surgeryEnded" value="<?= HtmlEncode($Grid->surgeryEnded->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_surgeryEnded" class="form-group">
<input type="<?= $Grid->surgeryEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?= $Grid->RowIndex ?>_surgeryEnded" id="x<?= $Grid->RowIndex ?>_surgeryEnded" placeholder="<?= HtmlEncode($Grid->surgeryEnded->getPlaceHolder()) ?>" value="<?= $Grid->surgeryEnded->EditValue ?>"<?= $Grid->surgeryEnded->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->surgeryEnded->getErrorMessage() ?></div>
<?php if (!$Grid->surgeryEnded->ReadOnly && !$Grid->surgeryEnded->Disabled && !isset($Grid->surgeryEnded->EditAttrs["readonly"]) && !isset($Grid->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_surgeryEnded">
<span<?= $Grid->surgeryEnded->viewAttributes() ?>>
<?= $Grid->surgeryEnded->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_surgeryEnded" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_surgeryEnded" value="<?= HtmlEncode($Grid->surgeryEnded->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_surgeryEnded" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_surgeryEnded" value="<?= HtmlEncode($Grid->surgeryEnded->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RecoveryTime->Visible) { // RecoveryTime ?>
        <td data-name="RecoveryTime" <?= $Grid->RecoveryTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_RecoveryTime" class="form-group">
<input type="<?= $Grid->RecoveryTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?= $Grid->RowIndex ?>_RecoveryTime" id="x<?= $Grid->RowIndex ?>_RecoveryTime" placeholder="<?= HtmlEncode($Grid->RecoveryTime->getPlaceHolder()) ?>" value="<?= $Grid->RecoveryTime->EditValue ?>"<?= $Grid->RecoveryTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecoveryTime->getErrorMessage() ?></div>
<?php if (!$Grid->RecoveryTime->ReadOnly && !$Grid->RecoveryTime->Disabled && !isset($Grid->RecoveryTime->EditAttrs["readonly"]) && !isset($Grid->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RecoveryTime" id="o<?= $Grid->RowIndex ?>_RecoveryTime" value="<?= HtmlEncode($Grid->RecoveryTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_RecoveryTime" class="form-group">
<input type="<?= $Grid->RecoveryTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?= $Grid->RowIndex ?>_RecoveryTime" id="x<?= $Grid->RowIndex ?>_RecoveryTime" placeholder="<?= HtmlEncode($Grid->RecoveryTime->getPlaceHolder()) ?>" value="<?= $Grid->RecoveryTime->EditValue ?>"<?= $Grid->RecoveryTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecoveryTime->getErrorMessage() ?></div>
<?php if (!$Grid->RecoveryTime->ReadOnly && !$Grid->RecoveryTime->Disabled && !isset($Grid->RecoveryTime->EditAttrs["readonly"]) && !isset($Grid->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_RecoveryTime">
<span<?= $Grid->RecoveryTime->viewAttributes() ?>>
<?= $Grid->RecoveryTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_RecoveryTime" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_RecoveryTime" value="<?= HtmlEncode($Grid->RecoveryTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_RecoveryTime" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_RecoveryTime" value="<?= HtmlEncode($Grid->RecoveryTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ShiftedTime->Visible) { // ShiftedTime ?>
        <td data-name="ShiftedTime" <?= $Grid->ShiftedTime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ShiftedTime" class="form-group">
<input type="<?= $Grid->ShiftedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?= $Grid->RowIndex ?>_ShiftedTime" id="x<?= $Grid->RowIndex ?>_ShiftedTime" placeholder="<?= HtmlEncode($Grid->ShiftedTime->getPlaceHolder()) ?>" value="<?= $Grid->ShiftedTime->EditValue ?>"<?= $Grid->ShiftedTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ShiftedTime->getErrorMessage() ?></div>
<?php if (!$Grid->ShiftedTime->ReadOnly && !$Grid->ShiftedTime->Disabled && !isset($Grid->ShiftedTime->EditAttrs["readonly"]) && !isset($Grid->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ShiftedTime" id="o<?= $Grid->RowIndex ?>_ShiftedTime" value="<?= HtmlEncode($Grid->ShiftedTime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ShiftedTime" class="form-group">
<input type="<?= $Grid->ShiftedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?= $Grid->RowIndex ?>_ShiftedTime" id="x<?= $Grid->RowIndex ?>_ShiftedTime" placeholder="<?= HtmlEncode($Grid->ShiftedTime->getPlaceHolder()) ?>" value="<?= $Grid->ShiftedTime->EditValue ?>"<?= $Grid->ShiftedTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ShiftedTime->getErrorMessage() ?></div>
<?php if (!$Grid->ShiftedTime->ReadOnly && !$Grid->ShiftedTime->Disabled && !isset($Grid->ShiftedTime->EditAttrs["readonly"]) && !isset($Grid->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ShiftedTime">
<span<?= $Grid->ShiftedTime->viewAttributes() ?>>
<?= $Grid->ShiftedTime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ShiftedTime" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ShiftedTime" value="<?= HtmlEncode($Grid->ShiftedTime->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ShiftedTime" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ShiftedTime" value="<?= HtmlEncode($Grid->ShiftedTime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Duration->Visible) { // Duration ?>
        <td data-name="Duration" <?= $Grid->Duration->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Duration" class="form-group">
<input type="<?= $Grid->Duration->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?= $Grid->RowIndex ?>_Duration" id="x<?= $Grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Duration->getPlaceHolder()) ?>" value="<?= $Grid->Duration->EditValue ?>"<?= $Grid->Duration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Duration->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Duration" id="o<?= $Grid->RowIndex ?>_Duration" value="<?= HtmlEncode($Grid->Duration->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Duration" class="form-group">
<input type="<?= $Grid->Duration->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?= $Grid->RowIndex ?>_Duration" id="x<?= $Grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Duration->getPlaceHolder()) ?>" value="<?= $Grid->Duration->EditValue ?>"<?= $Grid->Duration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Duration->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Duration">
<span<?= $Grid->Duration->viewAttributes() ?>>
<?= $Grid->Duration->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Duration" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Duration" value="<?= HtmlEncode($Grid->Duration->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Duration" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Duration" value="<?= HtmlEncode($Grid->Duration->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Surgeon->Visible) { // Surgeon ?>
        <td data-name="Surgeon" <?= $Grid->Surgeon->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Surgeon" class="form-group">
<?php
$onchange = $Grid->Surgeon->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Surgeon" class="ew-auto-suggest">
    <input type="<?= $Grid->Surgeon->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Surgeon" id="sv_x<?= $Grid->RowIndex ?>_Surgeon" value="<?= RemoveHtml($Grid->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>"<?= $Grid->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-input="sv_x<?= $Grid->RowIndex ?>_Surgeon" data-value-separator="<?= $Grid->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Surgeon" id="x<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Surgeon->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Surgeon","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.Surgeon.autoSuggestOptions));
});
</script>
<?= $Grid->Surgeon->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Surgeon") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Surgeon" id="o<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Surgeon" class="form-group">
<?php
$onchange = $Grid->Surgeon->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Surgeon" class="ew-auto-suggest">
    <input type="<?= $Grid->Surgeon->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Surgeon" id="sv_x<?= $Grid->RowIndex ?>_Surgeon" value="<?= RemoveHtml($Grid->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>"<?= $Grid->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-input="sv_x<?= $Grid->RowIndex ?>_Surgeon" data-value-separator="<?= $Grid->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Surgeon" id="x<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Surgeon->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Surgeon","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.Surgeon.autoSuggestOptions));
});
</script>
<?= $Grid->Surgeon->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Surgeon") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Surgeon">
<span<?= $Grid->Surgeon->viewAttributes() ?>>
<?= $Grid->Surgeon->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Surgeon" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Surgeon" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Anaesthetist->Visible) { // Anaesthetist ?>
        <td data-name="Anaesthetist" <?= $Grid->Anaesthetist->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Anaesthetist" class="form-group">
<?php
$onchange = $Grid->Anaesthetist->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Anaesthetist" class="ew-auto-suggest">
    <input type="<?= $Grid->Anaesthetist->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" id="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= RemoveHtml($Grid->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>"<?= $Grid->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-input="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" data-value-separator="<?= $Grid->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Anaesthetist" id="x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Anaesthetist->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Anaesthetist","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.Anaesthetist.autoSuggestOptions));
});
</script>
<?= $Grid->Anaesthetist->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Anaesthetist") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Anaesthetist" id="o<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Anaesthetist" class="form-group">
<?php
$onchange = $Grid->Anaesthetist->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Anaesthetist" class="ew-auto-suggest">
    <input type="<?= $Grid->Anaesthetist->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" id="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= RemoveHtml($Grid->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>"<?= $Grid->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-input="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" data-value-separator="<?= $Grid->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Anaesthetist" id="x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Anaesthetist->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Anaesthetist","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.Anaesthetist.autoSuggestOptions));
});
</script>
<?= $Grid->Anaesthetist->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Anaesthetist") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Anaesthetist">
<span<?= $Grid->Anaesthetist->viewAttributes() ?>>
<?= $Grid->Anaesthetist->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Anaesthetist" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Anaesthetist" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <td data-name="AsstSurgeon1" <?= $Grid->AsstSurgeon1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1" class="form-group">
<?php
$onchange = $Grid->AsstSurgeon1->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AsstSurgeon1" class="ew-auto-suggest">
    <input type="<?= $Grid->AsstSurgeon1->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= RemoveHtml($Grid->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AsstSurgeon1->getPlaceHolder()) ?>"<?= $Grid->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-input="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" data-value-separator="<?= $Grid->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AsstSurgeon1" id="x<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= HtmlEncode($Grid->AsstSurgeon1->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon1->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AsstSurgeon1","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.AsstSurgeon1.autoSuggestOptions));
});
</script>
<?= $Grid->AsstSurgeon1->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AsstSurgeon1" id="o<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= HtmlEncode($Grid->AsstSurgeon1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1" class="form-group">
<?php
$onchange = $Grid->AsstSurgeon1->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AsstSurgeon1" class="ew-auto-suggest">
    <input type="<?= $Grid->AsstSurgeon1->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= RemoveHtml($Grid->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AsstSurgeon1->getPlaceHolder()) ?>"<?= $Grid->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-input="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" data-value-separator="<?= $Grid->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AsstSurgeon1" id="x<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= HtmlEncode($Grid->AsstSurgeon1->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon1->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AsstSurgeon1","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.AsstSurgeon1.autoSuggestOptions));
});
</script>
<?= $Grid->AsstSurgeon1->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon1">
<span<?= $Grid->AsstSurgeon1->viewAttributes() ?>>
<?= $Grid->AsstSurgeon1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_AsstSurgeon1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= HtmlEncode($Grid->AsstSurgeon1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_AsstSurgeon1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= HtmlEncode($Grid->AsstSurgeon1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <td data-name="AsstSurgeon2" <?= $Grid->AsstSurgeon2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2" class="form-group">
<?php
$onchange = $Grid->AsstSurgeon2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AsstSurgeon2" class="ew-auto-suggest">
    <input type="<?= $Grid->AsstSurgeon2->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= RemoveHtml($Grid->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AsstSurgeon2->getPlaceHolder()) ?>"<?= $Grid->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-input="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" data-value-separator="<?= $Grid->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AsstSurgeon2" id="x<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= HtmlEncode($Grid->AsstSurgeon2->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon2->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AsstSurgeon2","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.AsstSurgeon2.autoSuggestOptions));
});
</script>
<?= $Grid->AsstSurgeon2->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AsstSurgeon2" id="o<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= HtmlEncode($Grid->AsstSurgeon2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2" class="form-group">
<?php
$onchange = $Grid->AsstSurgeon2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AsstSurgeon2" class="ew-auto-suggest">
    <input type="<?= $Grid->AsstSurgeon2->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= RemoveHtml($Grid->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AsstSurgeon2->getPlaceHolder()) ?>"<?= $Grid->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-input="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" data-value-separator="<?= $Grid->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AsstSurgeon2" id="x<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= HtmlEncode($Grid->AsstSurgeon2->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon2->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AsstSurgeon2","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.AsstSurgeon2.autoSuggestOptions));
});
</script>
<?= $Grid->AsstSurgeon2->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_AsstSurgeon2">
<span<?= $Grid->AsstSurgeon2->viewAttributes() ?>>
<?= $Grid->AsstSurgeon2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_AsstSurgeon2" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= HtmlEncode($Grid->AsstSurgeon2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_AsstSurgeon2" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= HtmlEncode($Grid->AsstSurgeon2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->paediatric->Visible) { // paediatric ?>
        <td data-name="paediatric" <?= $Grid->paediatric->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_paediatric" class="form-group">
<?php
$onchange = $Grid->paediatric->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_paediatric" class="ew-auto-suggest">
    <input type="<?= $Grid->paediatric->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_paediatric" id="sv_x<?= $Grid->RowIndex ?>_paediatric" value="<?= RemoveHtml($Grid->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->paediatric->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->paediatric->getPlaceHolder()) ?>"<?= $Grid->paediatric->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-input="sv_x<?= $Grid->RowIndex ?>_paediatric" data-value-separator="<?= $Grid->paediatric->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_paediatric" id="x<?= $Grid->RowIndex ?>_paediatric" value="<?= HtmlEncode($Grid->paediatric->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->paediatric->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_paediatric","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.paediatric.autoSuggestOptions));
});
</script>
<?= $Grid->paediatric->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_paediatric") ?>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-hidden="1" name="o<?= $Grid->RowIndex ?>_paediatric" id="o<?= $Grid->RowIndex ?>_paediatric" value="<?= HtmlEncode($Grid->paediatric->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_paediatric" class="form-group">
<?php
$onchange = $Grid->paediatric->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_paediatric" class="ew-auto-suggest">
    <input type="<?= $Grid->paediatric->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_paediatric" id="sv_x<?= $Grid->RowIndex ?>_paediatric" value="<?= RemoveHtml($Grid->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->paediatric->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->paediatric->getPlaceHolder()) ?>"<?= $Grid->paediatric->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-input="sv_x<?= $Grid->RowIndex ?>_paediatric" data-value-separator="<?= $Grid->paediatric->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_paediatric" id="x<?= $Grid->RowIndex ?>_paediatric" value="<?= HtmlEncode($Grid->paediatric->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->paediatric->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_paediatric","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.paediatric.autoSuggestOptions));
});
</script>
<?= $Grid->paediatric->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_paediatric") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_paediatric">
<span<?= $Grid->paediatric->viewAttributes() ?>>
<?= $Grid->paediatric->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_paediatric" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_paediatric" value="<?= HtmlEncode($Grid->paediatric->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_paediatric" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_paediatric" value="<?= HtmlEncode($Grid->paediatric->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <td data-name="ScrubNurse1" <?= $Grid->ScrubNurse1->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse1" class="form-group">
<input type="<?= $Grid->ScrubNurse1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?= $Grid->RowIndex ?>_ScrubNurse1" id="x<?= $Grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ScrubNurse1->getPlaceHolder()) ?>" value="<?= $Grid->ScrubNurse1->EditValue ?>"<?= $Grid->ScrubNurse1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ScrubNurse1->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ScrubNurse1" id="o<?= $Grid->RowIndex ?>_ScrubNurse1" value="<?= HtmlEncode($Grid->ScrubNurse1->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse1" class="form-group">
<input type="<?= $Grid->ScrubNurse1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?= $Grid->RowIndex ?>_ScrubNurse1" id="x<?= $Grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ScrubNurse1->getPlaceHolder()) ?>" value="<?= $Grid->ScrubNurse1->EditValue ?>"<?= $Grid->ScrubNurse1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ScrubNurse1->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse1">
<span<?= $Grid->ScrubNurse1->viewAttributes() ?>>
<?= $Grid->ScrubNurse1->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ScrubNurse1" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ScrubNurse1" value="<?= HtmlEncode($Grid->ScrubNurse1->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ScrubNurse1" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ScrubNurse1" value="<?= HtmlEncode($Grid->ScrubNurse1->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <td data-name="ScrubNurse2" <?= $Grid->ScrubNurse2->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse2" class="form-group">
<input type="<?= $Grid->ScrubNurse2->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?= $Grid->RowIndex ?>_ScrubNurse2" id="x<?= $Grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ScrubNurse2->getPlaceHolder()) ?>" value="<?= $Grid->ScrubNurse2->EditValue ?>"<?= $Grid->ScrubNurse2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ScrubNurse2->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ScrubNurse2" id="o<?= $Grid->RowIndex ?>_ScrubNurse2" value="<?= HtmlEncode($Grid->ScrubNurse2->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse2" class="form-group">
<input type="<?= $Grid->ScrubNurse2->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?= $Grid->RowIndex ?>_ScrubNurse2" id="x<?= $Grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ScrubNurse2->getPlaceHolder()) ?>" value="<?= $Grid->ScrubNurse2->EditValue ?>"<?= $Grid->ScrubNurse2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ScrubNurse2->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_ScrubNurse2">
<span<?= $Grid->ScrubNurse2->viewAttributes() ?>>
<?= $Grid->ScrubNurse2->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ScrubNurse2" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_ScrubNurse2" value="<?= HtmlEncode($Grid->ScrubNurse2->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ScrubNurse2" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_ScrubNurse2" value="<?= HtmlEncode($Grid->ScrubNurse2->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FloorNurse->Visible) { // FloorNurse ?>
        <td data-name="FloorNurse" <?= $Grid->FloorNurse->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_FloorNurse" class="form-group">
<input type="<?= $Grid->FloorNurse->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?= $Grid->RowIndex ?>_FloorNurse" id="x<?= $Grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->FloorNurse->getPlaceHolder()) ?>" value="<?= $Grid->FloorNurse->EditValue ?>"<?= $Grid->FloorNurse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FloorNurse->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FloorNurse" id="o<?= $Grid->RowIndex ?>_FloorNurse" value="<?= HtmlEncode($Grid->FloorNurse->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_FloorNurse" class="form-group">
<input type="<?= $Grid->FloorNurse->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?= $Grid->RowIndex ?>_FloorNurse" id="x<?= $Grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->FloorNurse->getPlaceHolder()) ?>" value="<?= $Grid->FloorNurse->EditValue ?>"<?= $Grid->FloorNurse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FloorNurse->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_FloorNurse">
<span<?= $Grid->FloorNurse->viewAttributes() ?>>
<?= $Grid->FloorNurse->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_FloorNurse" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_FloorNurse" value="<?= HtmlEncode($Grid->FloorNurse->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_FloorNurse" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_FloorNurse" value="<?= HtmlEncode($Grid->FloorNurse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Technician->Visible) { // Technician ?>
        <td data-name="Technician" <?= $Grid->Technician->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Technician" class="form-group">
<input type="<?= $Grid->Technician->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?= $Grid->RowIndex ?>_Technician" id="x<?= $Grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Technician->getPlaceHolder()) ?>" value="<?= $Grid->Technician->EditValue ?>"<?= $Grid->Technician->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Technician->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Technician" id="o<?= $Grid->RowIndex ?>_Technician" value="<?= HtmlEncode($Grid->Technician->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Technician" class="form-group">
<input type="<?= $Grid->Technician->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?= $Grid->RowIndex ?>_Technician" id="x<?= $Grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Technician->getPlaceHolder()) ?>" value="<?= $Grid->Technician->EditValue ?>"<?= $Grid->Technician->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Technician->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Technician">
<span<?= $Grid->Technician->viewAttributes() ?>>
<?= $Grid->Technician->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Technician" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Technician" value="<?= HtmlEncode($Grid->Technician->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Technician" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Technician" value="<?= HtmlEncode($Grid->Technician->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HouseKeeping->Visible) { // HouseKeeping ?>
        <td data-name="HouseKeeping" <?= $Grid->HouseKeeping->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_HouseKeeping" class="form-group">
<input type="<?= $Grid->HouseKeeping->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?= $Grid->RowIndex ?>_HouseKeeping" id="x<?= $Grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->HouseKeeping->getPlaceHolder()) ?>" value="<?= $Grid->HouseKeeping->EditValue ?>"<?= $Grid->HouseKeeping->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HouseKeeping->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HouseKeeping" id="o<?= $Grid->RowIndex ?>_HouseKeeping" value="<?= HtmlEncode($Grid->HouseKeeping->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_HouseKeeping" class="form-group">
<input type="<?= $Grid->HouseKeeping->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?= $Grid->RowIndex ?>_HouseKeeping" id="x<?= $Grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->HouseKeeping->getPlaceHolder()) ?>" value="<?= $Grid->HouseKeeping->EditValue ?>"<?= $Grid->HouseKeeping->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HouseKeeping->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_HouseKeeping">
<span<?= $Grid->HouseKeeping->viewAttributes() ?>>
<?= $Grid->HouseKeeping->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_HouseKeeping" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_HouseKeeping" value="<?= HtmlEncode($Grid->HouseKeeping->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_HouseKeeping" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_HouseKeeping" value="<?= HtmlEncode($Grid->HouseKeeping->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <td data-name="countsCheckedMops" <?= $Grid->countsCheckedMops->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_countsCheckedMops" class="form-group">
<input type="<?= $Grid->countsCheckedMops->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?= $Grid->RowIndex ?>_countsCheckedMops" id="x<?= $Grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->countsCheckedMops->getPlaceHolder()) ?>" value="<?= $Grid->countsCheckedMops->EditValue ?>"<?= $Grid->countsCheckedMops->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->countsCheckedMops->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" data-hidden="1" name="o<?= $Grid->RowIndex ?>_countsCheckedMops" id="o<?= $Grid->RowIndex ?>_countsCheckedMops" value="<?= HtmlEncode($Grid->countsCheckedMops->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_countsCheckedMops" class="form-group">
<input type="<?= $Grid->countsCheckedMops->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?= $Grid->RowIndex ?>_countsCheckedMops" id="x<?= $Grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->countsCheckedMops->getPlaceHolder()) ?>" value="<?= $Grid->countsCheckedMops->EditValue ?>"<?= $Grid->countsCheckedMops->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->countsCheckedMops->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_countsCheckedMops">
<span<?= $Grid->countsCheckedMops->viewAttributes() ?>>
<?= $Grid->countsCheckedMops->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_countsCheckedMops" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_countsCheckedMops" value="<?= HtmlEncode($Grid->countsCheckedMops->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_countsCheckedMops" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_countsCheckedMops" value="<?= HtmlEncode($Grid->countsCheckedMops->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->gauze->Visible) { // gauze ?>
        <td data-name="gauze" <?= $Grid->gauze->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_gauze" class="form-group">
<input type="<?= $Grid->gauze->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?= $Grid->RowIndex ?>_gauze" id="x<?= $Grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->gauze->getPlaceHolder()) ?>" value="<?= $Grid->gauze->EditValue ?>"<?= $Grid->gauze->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->gauze->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" data-hidden="1" name="o<?= $Grid->RowIndex ?>_gauze" id="o<?= $Grid->RowIndex ?>_gauze" value="<?= HtmlEncode($Grid->gauze->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_gauze" class="form-group">
<input type="<?= $Grid->gauze->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?= $Grid->RowIndex ?>_gauze" id="x<?= $Grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->gauze->getPlaceHolder()) ?>" value="<?= $Grid->gauze->EditValue ?>"<?= $Grid->gauze->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->gauze->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_gauze">
<span<?= $Grid->gauze->viewAttributes() ?>>
<?= $Grid->gauze->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_gauze" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_gauze" value="<?= HtmlEncode($Grid->gauze->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_gauze" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_gauze" value="<?= HtmlEncode($Grid->gauze->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->needles->Visible) { // needles ?>
        <td data-name="needles" <?= $Grid->needles->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_needles" class="form-group">
<input type="<?= $Grid->needles->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?= $Grid->RowIndex ?>_needles" id="x<?= $Grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->needles->getPlaceHolder()) ?>" value="<?= $Grid->needles->EditValue ?>"<?= $Grid->needles->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->needles->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" data-hidden="1" name="o<?= $Grid->RowIndex ?>_needles" id="o<?= $Grid->RowIndex ?>_needles" value="<?= HtmlEncode($Grid->needles->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_needles" class="form-group">
<input type="<?= $Grid->needles->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?= $Grid->RowIndex ?>_needles" id="x<?= $Grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->needles->getPlaceHolder()) ?>" value="<?= $Grid->needles->EditValue ?>"<?= $Grid->needles->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->needles->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_needles">
<span<?= $Grid->needles->viewAttributes() ?>>
<?= $Grid->needles->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_needles" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_needles" value="<?= HtmlEncode($Grid->needles->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_needles" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_needles" value="<?= HtmlEncode($Grid->needles->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->bloodloss->Visible) { // bloodloss ?>
        <td data-name="bloodloss" <?= $Grid->bloodloss->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodloss" class="form-group">
<input type="<?= $Grid->bloodloss->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?= $Grid->RowIndex ?>_bloodloss" id="x<?= $Grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodloss->getPlaceHolder()) ?>" value="<?= $Grid->bloodloss->EditValue ?>"<?= $Grid->bloodloss->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodloss->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" data-hidden="1" name="o<?= $Grid->RowIndex ?>_bloodloss" id="o<?= $Grid->RowIndex ?>_bloodloss" value="<?= HtmlEncode($Grid->bloodloss->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodloss" class="form-group">
<input type="<?= $Grid->bloodloss->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?= $Grid->RowIndex ?>_bloodloss" id="x<?= $Grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodloss->getPlaceHolder()) ?>" value="<?= $Grid->bloodloss->EditValue ?>"<?= $Grid->bloodloss->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodloss->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodloss">
<span<?= $Grid->bloodloss->viewAttributes() ?>>
<?= $Grid->bloodloss->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_bloodloss" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_bloodloss" value="<?= HtmlEncode($Grid->bloodloss->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_bloodloss" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_bloodloss" value="<?= HtmlEncode($Grid->bloodloss->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <td data-name="bloodtransfusion" <?= $Grid->bloodtransfusion->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodtransfusion" class="form-group">
<input type="<?= $Grid->bloodtransfusion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?= $Grid->RowIndex ?>_bloodtransfusion" id="x<?= $Grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodtransfusion->getPlaceHolder()) ?>" value="<?= $Grid->bloodtransfusion->EditValue ?>"<?= $Grid->bloodtransfusion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodtransfusion->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" data-hidden="1" name="o<?= $Grid->RowIndex ?>_bloodtransfusion" id="o<?= $Grid->RowIndex ?>_bloodtransfusion" value="<?= HtmlEncode($Grid->bloodtransfusion->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodtransfusion" class="form-group">
<input type="<?= $Grid->bloodtransfusion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?= $Grid->RowIndex ?>_bloodtransfusion" id="x<?= $Grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodtransfusion->getPlaceHolder()) ?>" value="<?= $Grid->bloodtransfusion->EditValue ?>"<?= $Grid->bloodtransfusion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodtransfusion->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_bloodtransfusion">
<span<?= $Grid->bloodtransfusion->viewAttributes() ?>>
<?= $Grid->bloodtransfusion->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_bloodtransfusion" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_bloodtransfusion" value="<?= HtmlEncode($Grid->bloodtransfusion->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_bloodtransfusion" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_bloodtransfusion" value="<?= HtmlEncode($Grid->bloodtransfusion->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Grid->Reception->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Reception" class="form-group">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Reception" class="form-group">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<?= $Grid->Reception->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Reception" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Reception" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PId->Visible) { // PId ?>
        <td data-name="PId" <?= $Grid->PId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PId->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PId" class="form-group">
<span<?= $Grid->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PId->getDisplayValue($Grid->PId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PId" name="x<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PId" class="form-group">
<input type="<?= $Grid->PId->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?= $Grid->RowIndex ?>_PId" id="x<?= $Grid->RowIndex ?>_PId" size="30" placeholder="<?= HtmlEncode($Grid->PId->getPlaceHolder()) ?>" value="<?= $Grid->PId->EditValue ?>"<?= $Grid->PId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PId->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PId" id="o<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($Grid->PId->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PId" class="form-group">
<span<?= $Grid->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PId->getDisplayValue($Grid->PId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PId" name="x<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PId" class="form-group">
<input type="<?= $Grid->PId->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?= $Grid->RowIndex ?>_PId" id="x<?= $Grid->RowIndex ?>_PId" size="30" placeholder="<?= HtmlEncode($Grid->PId->getPlaceHolder()) ?>" value="<?= $Grid->PId->EditValue ?>"<?= $Grid->PId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_ot_delivery_register_PId">
<span<?= $Grid->PId->viewAttributes() ?>>
<?= $Grid->PId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" data-hidden="1" name="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_PId" id="fpatient_ot_delivery_registergrid$x<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->FormValue) ?>">
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" data-hidden="1" name="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_PId" id="fpatient_ot_delivery_registergrid$o<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowCount);
?>
    </tr>
<?php if ($Grid->RowType == ROWTYPE_ADD || $Grid->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid","load"], function () {
    fpatient_ot_delivery_registergrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
    }
    } // End delete row checking
    if (!$Grid->isGridAdd() || $Grid->CurrentMode == "copy")
        if (!$Grid->Recordset->EOF) {
            $Grid->Recordset->moveNext();
        }
}
?>
<?php
    if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy" || $Grid->CurrentMode == "edit") {
        $Grid->RowIndex = '$rowindex$';
        $Grid->loadRowValues();

        // Set row properties
        $Grid->resetAttributes();
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_ot_delivery_register", "data-rowtype" => ROWTYPE_ADD]);
        $Grid->RowAttrs->appendClass("ew-template");
        $Grid->RowType = ROWTYPE_ADD;

        // Render row
        $Grid->renderRow();

        // Render list options
        $Grid->renderListOptions();
        $Grid->StartRowCount = 0;
?>
    <tr <?= $Grid->rowAttributes() ?>>
<?php
// Render list options (body, left)
$Grid->ListOptions->render("body", "left", $Grid->RowIndex);
?>
    <?php if ($Grid->id->Visible) { // id ?>
        <td data-name="id">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_id" class="form-group patient_ot_delivery_register_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_id" class="form-group patient_ot_delivery_register_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatID" class="form-group patient_ot_delivery_register_PatID">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatID" class="form-group patient_ot_delivery_register_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientName" class="form-group patient_ot_delivery_register_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientName" class="form-group patient_ot_delivery_register_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_mrnno" class="form-group patient_ot_delivery_register_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_MobileNumber" class="form-group patient_ot_delivery_register_MobileNumber">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_MobileNumber" class="form-group patient_ot_delivery_register_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MobileNumber->getDisplayValue($Grid->MobileNumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Age" class="form-group patient_ot_delivery_register_Age">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Age" class="form-group patient_ot_delivery_register_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Age->getDisplayValue($Grid->Age->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Gender" class="form-group patient_ot_delivery_register_Gender">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Gender" class="form-group patient_ot_delivery_register_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gender->getDisplayValue($Grid->Gender->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ObstetricsHistryFeMale->Visible) { // ObstetricsHistryFeMale ?>
        <td data-name="ObstetricsHistryFeMale">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group patient_ot_delivery_register_ObstetricsHistryFeMale">
<input type="<?= $Grid->ObstetricsHistryFeMale->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" name="x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ObstetricsHistryFeMale->getPlaceHolder()) ?>" value="<?= $Grid->ObstetricsHistryFeMale->EditValue ?>"<?= $Grid->ObstetricsHistryFeMale->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ObstetricsHistryFeMale->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ObstetricsHistryFeMale" class="form-group patient_ot_delivery_register_ObstetricsHistryFeMale">
<span<?= $Grid->ObstetricsHistryFeMale->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ObstetricsHistryFeMale->getDisplayValue($Grid->ObstetricsHistryFeMale->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" id="x<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?= HtmlEncode($Grid->ObstetricsHistryFeMale->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ObstetricsHistryFeMale" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" id="o<?= $Grid->RowIndex ?>_ObstetricsHistryFeMale" value="<?= HtmlEncode($Grid->ObstetricsHistryFeMale->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Abortion->Visible) { // Abortion ?>
        <td data-name="Abortion">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Abortion" class="form-group patient_ot_delivery_register_Abortion">
<input type="<?= $Grid->Abortion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Abortion" name="x<?= $Grid->RowIndex ?>_Abortion" id="x<?= $Grid->RowIndex ?>_Abortion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Abortion->getPlaceHolder()) ?>" value="<?= $Grid->Abortion->EditValue ?>"<?= $Grid->Abortion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Abortion->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Abortion" class="form-group patient_ot_delivery_register_Abortion">
<span<?= $Grid->Abortion->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Abortion->getDisplayValue($Grid->Abortion->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Abortion" id="x<?= $Grid->RowIndex ?>_Abortion" value="<?= HtmlEncode($Grid->Abortion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Abortion" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Abortion" id="o<?= $Grid->RowIndex ?>_Abortion" value="<?= HtmlEncode($Grid->Abortion->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildBirthDate->Visible) { // ChildBirthDate ?>
        <td data-name="ChildBirthDate">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate" class="form-group patient_ot_delivery_register_ChildBirthDate">
<input type="<?= $Grid->ChildBirthDate->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-format="7" name="x<?= $Grid->RowIndex ?>_ChildBirthDate" id="x<?= $Grid->RowIndex ?>_ChildBirthDate" placeholder="<?= HtmlEncode($Grid->ChildBirthDate->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthDate->EditValue ?>"<?= $Grid->ChildBirthDate->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthDate->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthDate->ReadOnly && !$Grid->ChildBirthDate->Disabled && !isset($Grid->ChildBirthDate->EditAttrs["readonly"]) && !isset($Grid->ChildBirthDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate" class="form-group patient_ot_delivery_register_ChildBirthDate">
<span<?= $Grid->ChildBirthDate->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildBirthDate->getDisplayValue($Grid->ChildBirthDate->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildBirthDate" id="x<?= $Grid->RowIndex ?>_ChildBirthDate" value="<?= HtmlEncode($Grid->ChildBirthDate->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBirthDate" id="o<?= $Grid->RowIndex ?>_ChildBirthDate" value="<?= HtmlEncode($Grid->ChildBirthDate->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildBirthTime->Visible) { // ChildBirthTime ?>
        <td data-name="ChildBirthTime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime" class="form-group patient_ot_delivery_register_ChildBirthTime">
<input type="<?= $Grid->ChildBirthTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" name="x<?= $Grid->RowIndex ?>_ChildBirthTime" id="x<?= $Grid->RowIndex ?>_ChildBirthTime" placeholder="<?= HtmlEncode($Grid->ChildBirthTime->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthTime->EditValue ?>"<?= $Grid->ChildBirthTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthTime->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthTime->ReadOnly && !$Grid->ChildBirthTime->Disabled && !isset($Grid->ChildBirthTime->EditAttrs["readonly"]) && !isset($Grid->ChildBirthTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "timepicker"], function() {
    ew.createTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthTime", {"timeFormat":"h:i A","step":15});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime" class="form-group patient_ot_delivery_register_ChildBirthTime">
<span<?= $Grid->ChildBirthTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildBirthTime->getDisplayValue($Grid->ChildBirthTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildBirthTime" id="x<?= $Grid->RowIndex ?>_ChildBirthTime" value="<?= HtmlEncode($Grid->ChildBirthTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBirthTime" id="o<?= $Grid->RowIndex ?>_ChildBirthTime" value="<?= HtmlEncode($Grid->ChildBirthTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildSex->Visible) { // ChildSex ?>
        <td data-name="ChildSex">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex" class="form-group patient_ot_delivery_register_ChildSex">
<input type="<?= $Grid->ChildSex->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex" name="x<?= $Grid->RowIndex ?>_ChildSex" id="x<?= $Grid->RowIndex ?>_ChildSex" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildSex->getPlaceHolder()) ?>" value="<?= $Grid->ChildSex->EditValue ?>"<?= $Grid->ChildSex->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildSex->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex" class="form-group patient_ot_delivery_register_ChildSex">
<span<?= $Grid->ChildSex->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildSex->getDisplayValue($Grid->ChildSex->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildSex" id="x<?= $Grid->RowIndex ?>_ChildSex" value="<?= HtmlEncode($Grid->ChildSex->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildSex" id="o<?= $Grid->RowIndex ?>_ChildSex" value="<?= HtmlEncode($Grid->ChildSex->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildWt->Visible) { // ChildWt ?>
        <td data-name="ChildWt">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt" class="form-group patient_ot_delivery_register_ChildWt">
<input type="<?= $Grid->ChildWt->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt" name="x<?= $Grid->RowIndex ?>_ChildWt" id="x<?= $Grid->RowIndex ?>_ChildWt" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildWt->getPlaceHolder()) ?>" value="<?= $Grid->ChildWt->EditValue ?>"<?= $Grid->ChildWt->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildWt->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt" class="form-group patient_ot_delivery_register_ChildWt">
<span<?= $Grid->ChildWt->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildWt->getDisplayValue($Grid->ChildWt->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildWt" id="x<?= $Grid->RowIndex ?>_ChildWt" value="<?= HtmlEncode($Grid->ChildWt->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildWt" id="o<?= $Grid->RowIndex ?>_ChildWt" value="<?= HtmlEncode($Grid->ChildWt->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildDay->Visible) { // ChildDay ?>
        <td data-name="ChildDay">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay" class="form-group patient_ot_delivery_register_ChildDay">
<input type="<?= $Grid->ChildDay->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay" name="x<?= $Grid->RowIndex ?>_ChildDay" id="x<?= $Grid->RowIndex ?>_ChildDay" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildDay->getPlaceHolder()) ?>" value="<?= $Grid->ChildDay->EditValue ?>"<?= $Grid->ChildDay->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildDay->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay" class="form-group patient_ot_delivery_register_ChildDay">
<span<?= $Grid->ChildDay->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildDay->getDisplayValue($Grid->ChildDay->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildDay" id="x<?= $Grid->RowIndex ?>_ChildDay" value="<?= HtmlEncode($Grid->ChildDay->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildDay" id="o<?= $Grid->RowIndex ?>_ChildDay" value="<?= HtmlEncode($Grid->ChildDay->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildOE->Visible) { // ChildOE ?>
        <td data-name="ChildOE">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE" class="form-group patient_ot_delivery_register_ChildOE">
<input type="<?= $Grid->ChildOE->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE" name="x<?= $Grid->RowIndex ?>_ChildOE" id="x<?= $Grid->RowIndex ?>_ChildOE" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildOE->getPlaceHolder()) ?>" value="<?= $Grid->ChildOE->EditValue ?>"<?= $Grid->ChildOE->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildOE->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE" class="form-group patient_ot_delivery_register_ChildOE">
<span<?= $Grid->ChildOE->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildOE->getDisplayValue($Grid->ChildOE->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildOE" id="x<?= $Grid->RowIndex ?>_ChildOE" value="<?= HtmlEncode($Grid->ChildOE->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildOE" id="o<?= $Grid->RowIndex ?>_ChildOE" value="<?= HtmlEncode($Grid->ChildOE->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildBlGrp->Visible) { // ChildBlGrp ?>
        <td data-name="ChildBlGrp">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp" class="form-group patient_ot_delivery_register_ChildBlGrp">
<input type="<?= $Grid->ChildBlGrp->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" name="x<?= $Grid->RowIndex ?>_ChildBlGrp" id="x<?= $Grid->RowIndex ?>_ChildBlGrp" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBlGrp->getPlaceHolder()) ?>" value="<?= $Grid->ChildBlGrp->EditValue ?>"<?= $Grid->ChildBlGrp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBlGrp->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp" class="form-group patient_ot_delivery_register_ChildBlGrp">
<span<?= $Grid->ChildBlGrp->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildBlGrp->getDisplayValue($Grid->ChildBlGrp->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildBlGrp" id="x<?= $Grid->RowIndex ?>_ChildBlGrp" value="<?= HtmlEncode($Grid->ChildBlGrp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBlGrp" id="o<?= $Grid->RowIndex ?>_ChildBlGrp" value="<?= HtmlEncode($Grid->ChildBlGrp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ApgarScore->Visible) { // ApgarScore ?>
        <td data-name="ApgarScore">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore" class="form-group patient_ot_delivery_register_ApgarScore">
<input type="<?= $Grid->ApgarScore->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" name="x<?= $Grid->RowIndex ?>_ApgarScore" id="x<?= $Grid->RowIndex ?>_ApgarScore" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ApgarScore->getPlaceHolder()) ?>" value="<?= $Grid->ApgarScore->EditValue ?>"<?= $Grid->ApgarScore->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ApgarScore->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore" class="form-group patient_ot_delivery_register_ApgarScore">
<span<?= $Grid->ApgarScore->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ApgarScore->getDisplayValue($Grid->ApgarScore->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ApgarScore" id="x<?= $Grid->RowIndex ?>_ApgarScore" value="<?= HtmlEncode($Grid->ApgarScore->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ApgarScore" id="o<?= $Grid->RowIndex ?>_ApgarScore" value="<?= HtmlEncode($Grid->ApgarScore->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->birthnotification->Visible) { // birthnotification ?>
        <td data-name="birthnotification">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification" class="form-group patient_ot_delivery_register_birthnotification">
<input type="<?= $Grid->birthnotification->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification" name="x<?= $Grid->RowIndex ?>_birthnotification" id="x<?= $Grid->RowIndex ?>_birthnotification" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->birthnotification->getPlaceHolder()) ?>" value="<?= $Grid->birthnotification->EditValue ?>"<?= $Grid->birthnotification->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->birthnotification->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification" class="form-group patient_ot_delivery_register_birthnotification">
<span<?= $Grid->birthnotification->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->birthnotification->getDisplayValue($Grid->birthnotification->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" data-hidden="1" name="x<?= $Grid->RowIndex ?>_birthnotification" id="x<?= $Grid->RowIndex ?>_birthnotification" value="<?= HtmlEncode($Grid->birthnotification->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification" data-hidden="1" name="o<?= $Grid->RowIndex ?>_birthnotification" id="o<?= $Grid->RowIndex ?>_birthnotification" value="<?= HtmlEncode($Grid->birthnotification->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->formno->Visible) { // formno ?>
        <td data-name="formno">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno" class="form-group patient_ot_delivery_register_formno">
<input type="<?= $Grid->formno->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno" name="x<?= $Grid->RowIndex ?>_formno" id="x<?= $Grid->RowIndex ?>_formno" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->formno->getPlaceHolder()) ?>" value="<?= $Grid->formno->EditValue ?>"<?= $Grid->formno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->formno->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno" class="form-group patient_ot_delivery_register_formno">
<span<?= $Grid->formno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->formno->getDisplayValue($Grid->formno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_formno" id="x<?= $Grid->RowIndex ?>_formno" value="<?= HtmlEncode($Grid->formno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_formno" id="o<?= $Grid->RowIndex ?>_formno" value="<?= HtmlEncode($Grid->formno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->dte->Visible) { // dte ?>
        <td data-name="dte">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_dte" class="form-group patient_ot_delivery_register_dte">
<input type="<?= $Grid->dte->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_dte" name="x<?= $Grid->RowIndex ?>_dte" id="x<?= $Grid->RowIndex ?>_dte" placeholder="<?= HtmlEncode($Grid->dte->getPlaceHolder()) ?>" value="<?= $Grid->dte->EditValue ?>"<?= $Grid->dte->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->dte->getErrorMessage() ?></div>
<?php if (!$Grid->dte->ReadOnly && !$Grid->dte->Disabled && !isset($Grid->dte->EditAttrs["readonly"]) && !isset($Grid->dte->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_dte", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_dte" class="form-group patient_ot_delivery_register_dte">
<span<?= $Grid->dte->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->dte->getDisplayValue($Grid->dte->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" data-hidden="1" name="x<?= $Grid->RowIndex ?>_dte" id="x<?= $Grid->RowIndex ?>_dte" value="<?= HtmlEncode($Grid->dte->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_dte" data-hidden="1" name="o<?= $Grid->RowIndex ?>_dte" id="o<?= $Grid->RowIndex ?>_dte" value="<?= HtmlEncode($Grid->dte->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->motherReligion->Visible) { // motherReligion ?>
        <td data-name="motherReligion">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_motherReligion" class="form-group patient_ot_delivery_register_motherReligion">
<input type="<?= $Grid->motherReligion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_motherReligion" name="x<?= $Grid->RowIndex ?>_motherReligion" id="x<?= $Grid->RowIndex ?>_motherReligion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->motherReligion->getPlaceHolder()) ?>" value="<?= $Grid->motherReligion->EditValue ?>"<?= $Grid->motherReligion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->motherReligion->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_motherReligion" class="form-group patient_ot_delivery_register_motherReligion">
<span<?= $Grid->motherReligion->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->motherReligion->getDisplayValue($Grid->motherReligion->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" data-hidden="1" name="x<?= $Grid->RowIndex ?>_motherReligion" id="x<?= $Grid->RowIndex ?>_motherReligion" value="<?= HtmlEncode($Grid->motherReligion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_motherReligion" data-hidden="1" name="o<?= $Grid->RowIndex ?>_motherReligion" id="o<?= $Grid->RowIndex ?>_motherReligion" value="<?= HtmlEncode($Grid->motherReligion->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->bloodgroup->Visible) { // bloodgroup ?>
        <td data-name="bloodgroup">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodgroup" class="form-group patient_ot_delivery_register_bloodgroup">
<input type="<?= $Grid->bloodgroup->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" name="x<?= $Grid->RowIndex ?>_bloodgroup" id="x<?= $Grid->RowIndex ?>_bloodgroup" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodgroup->getPlaceHolder()) ?>" value="<?= $Grid->bloodgroup->EditValue ?>"<?= $Grid->bloodgroup->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodgroup->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodgroup" class="form-group patient_ot_delivery_register_bloodgroup">
<span<?= $Grid->bloodgroup->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->bloodgroup->getDisplayValue($Grid->bloodgroup->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" data-hidden="1" name="x<?= $Grid->RowIndex ?>_bloodgroup" id="x<?= $Grid->RowIndex ?>_bloodgroup" value="<?= HtmlEncode($Grid->bloodgroup->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodgroup" data-hidden="1" name="o<?= $Grid->RowIndex ?>_bloodgroup" id="o<?= $Grid->RowIndex ?>_bloodgroup" value="<?= HtmlEncode($Grid->bloodgroup->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_status" class="form-group patient_ot_delivery_register_status">
<input type="<?= $Grid->status->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_status" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" size="30" placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>" value="<?= $Grid->status->EditValue ?>"<?= $Grid->status->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_status" class="form-group patient_ot_delivery_register_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createdby" class="form-group patient_ot_delivery_register_createdby">
<input type="<?= $Grid->createdby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createdby" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" size="30" placeholder="<?= HtmlEncode($Grid->createdby->getPlaceHolder()) ?>" value="<?= $Grid->createdby->EditValue ?>"<?= $Grid->createdby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createdby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createdby" class="form-group patient_ot_delivery_register_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createddatetime" class="form-group patient_ot_delivery_register_createddatetime">
<input type="<?= $Grid->createddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_createddatetime" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" placeholder="<?= HtmlEncode($Grid->createddatetime->getPlaceHolder()) ?>" value="<?= $Grid->createddatetime->EditValue ?>"<?= $Grid->createddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->createddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->createddatetime->ReadOnly && !$Grid->createddatetime->Disabled && !isset($Grid->createddatetime->EditAttrs["readonly"]) && !isset($Grid->createddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_createddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_createddatetime" class="form-group patient_ot_delivery_register_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifiedby" class="form-group patient_ot_delivery_register_modifiedby">
<input type="<?= $Grid->modifiedby->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifiedby" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" size="30" placeholder="<?= HtmlEncode($Grid->modifiedby->getPlaceHolder()) ?>" value="<?= $Grid->modifiedby->EditValue ?>"<?= $Grid->modifiedby->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifiedby->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifiedby" class="form-group patient_ot_delivery_register_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifieddatetime" class="form-group patient_ot_delivery_register_modifieddatetime">
<input type="<?= $Grid->modifieddatetime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" placeholder="<?= HtmlEncode($Grid->modifieddatetime->getPlaceHolder()) ?>" value="<?= $Grid->modifieddatetime->EditValue ?>"<?= $Grid->modifieddatetime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->modifieddatetime->getErrorMessage() ?></div>
<?php if (!$Grid->modifieddatetime->ReadOnly && !$Grid->modifieddatetime->Disabled && !isset($Grid->modifieddatetime->EditAttrs["readonly"]) && !isset($Grid->modifieddatetime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_modifieddatetime", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_modifieddatetime" class="form-group patient_ot_delivery_register_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientID->Visible) { // PatientID ?>
        <td data-name="PatientID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientID" class="form-group patient_ot_delivery_register_PatientID">
<input type="<?= $Grid->PatientID->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PatientID" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientID->getPlaceHolder()) ?>" value="<?= $Grid->PatientID->EditValue ?>"<?= $Grid->PatientID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PatientID" class="form-group patient_ot_delivery_register_PatientID">
<span<?= $Grid->PatientID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientID->getDisplayValue($Grid->PatientID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientID" id="x<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PatientID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientID" id="o<?= $Grid->RowIndex ?>_PatientID" value="<?= HtmlEncode($Grid->PatientID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HospID" class="form-group patient_ot_delivery_register_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildBirthDate1->Visible) { // ChildBirthDate1 ?>
        <td data-name="ChildBirthDate1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate1" class="form-group patient_ot_delivery_register_ChildBirthDate1">
<input type="<?= $Grid->ChildBirthDate1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" name="x<?= $Grid->RowIndex ?>_ChildBirthDate1" id="x<?= $Grid->RowIndex ?>_ChildBirthDate1" placeholder="<?= HtmlEncode($Grid->ChildBirthDate1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthDate1->EditValue ?>"<?= $Grid->ChildBirthDate1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthDate1->getErrorMessage() ?></div>
<?php if (!$Grid->ChildBirthDate1->ReadOnly && !$Grid->ChildBirthDate1->Disabled && !isset($Grid->ChildBirthDate1->EditAttrs["readonly"]) && !isset($Grid->ChildBirthDate1->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ChildBirthDate1", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthDate1" class="form-group patient_ot_delivery_register_ChildBirthDate1">
<span<?= $Grid->ChildBirthDate1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildBirthDate1->getDisplayValue($Grid->ChildBirthDate1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildBirthDate1" id="x<?= $Grid->RowIndex ?>_ChildBirthDate1" value="<?= HtmlEncode($Grid->ChildBirthDate1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthDate1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBirthDate1" id="o<?= $Grid->RowIndex ?>_ChildBirthDate1" value="<?= HtmlEncode($Grid->ChildBirthDate1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildBirthTime1->Visible) { // ChildBirthTime1 ?>
        <td data-name="ChildBirthTime1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime1" class="form-group patient_ot_delivery_register_ChildBirthTime1">
<input type="<?= $Grid->ChildBirthTime1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" name="x<?= $Grid->RowIndex ?>_ChildBirthTime1" id="x<?= $Grid->RowIndex ?>_ChildBirthTime1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBirthTime1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBirthTime1->EditValue ?>"<?= $Grid->ChildBirthTime1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBirthTime1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBirthTime1" class="form-group patient_ot_delivery_register_ChildBirthTime1">
<span<?= $Grid->ChildBirthTime1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildBirthTime1->getDisplayValue($Grid->ChildBirthTime1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildBirthTime1" id="x<?= $Grid->RowIndex ?>_ChildBirthTime1" value="<?= HtmlEncode($Grid->ChildBirthTime1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBirthTime1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBirthTime1" id="o<?= $Grid->RowIndex ?>_ChildBirthTime1" value="<?= HtmlEncode($Grid->ChildBirthTime1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildSex1->Visible) { // ChildSex1 ?>
        <td data-name="ChildSex1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex1" class="form-group patient_ot_delivery_register_ChildSex1">
<input type="<?= $Grid->ChildSex1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" name="x<?= $Grid->RowIndex ?>_ChildSex1" id="x<?= $Grid->RowIndex ?>_ChildSex1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildSex1->getPlaceHolder()) ?>" value="<?= $Grid->ChildSex1->EditValue ?>"<?= $Grid->ChildSex1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildSex1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildSex1" class="form-group patient_ot_delivery_register_ChildSex1">
<span<?= $Grid->ChildSex1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildSex1->getDisplayValue($Grid->ChildSex1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildSex1" id="x<?= $Grid->RowIndex ?>_ChildSex1" value="<?= HtmlEncode($Grid->ChildSex1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildSex1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildSex1" id="o<?= $Grid->RowIndex ?>_ChildSex1" value="<?= HtmlEncode($Grid->ChildSex1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildWt1->Visible) { // ChildWt1 ?>
        <td data-name="ChildWt1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt1" class="form-group patient_ot_delivery_register_ChildWt1">
<input type="<?= $Grid->ChildWt1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" name="x<?= $Grid->RowIndex ?>_ChildWt1" id="x<?= $Grid->RowIndex ?>_ChildWt1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildWt1->getPlaceHolder()) ?>" value="<?= $Grid->ChildWt1->EditValue ?>"<?= $Grid->ChildWt1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildWt1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildWt1" class="form-group patient_ot_delivery_register_ChildWt1">
<span<?= $Grid->ChildWt1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildWt1->getDisplayValue($Grid->ChildWt1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildWt1" id="x<?= $Grid->RowIndex ?>_ChildWt1" value="<?= HtmlEncode($Grid->ChildWt1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildWt1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildWt1" id="o<?= $Grid->RowIndex ?>_ChildWt1" value="<?= HtmlEncode($Grid->ChildWt1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildDay1->Visible) { // ChildDay1 ?>
        <td data-name="ChildDay1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay1" class="form-group patient_ot_delivery_register_ChildDay1">
<input type="<?= $Grid->ChildDay1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" name="x<?= $Grid->RowIndex ?>_ChildDay1" id="x<?= $Grid->RowIndex ?>_ChildDay1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildDay1->getPlaceHolder()) ?>" value="<?= $Grid->ChildDay1->EditValue ?>"<?= $Grid->ChildDay1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildDay1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildDay1" class="form-group patient_ot_delivery_register_ChildDay1">
<span<?= $Grid->ChildDay1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildDay1->getDisplayValue($Grid->ChildDay1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildDay1" id="x<?= $Grid->RowIndex ?>_ChildDay1" value="<?= HtmlEncode($Grid->ChildDay1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildDay1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildDay1" id="o<?= $Grid->RowIndex ?>_ChildDay1" value="<?= HtmlEncode($Grid->ChildDay1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildOE1->Visible) { // ChildOE1 ?>
        <td data-name="ChildOE1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE1" class="form-group patient_ot_delivery_register_ChildOE1">
<input type="<?= $Grid->ChildOE1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" name="x<?= $Grid->RowIndex ?>_ChildOE1" id="x<?= $Grid->RowIndex ?>_ChildOE1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildOE1->getPlaceHolder()) ?>" value="<?= $Grid->ChildOE1->EditValue ?>"<?= $Grid->ChildOE1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildOE1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildOE1" class="form-group patient_ot_delivery_register_ChildOE1">
<span<?= $Grid->ChildOE1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildOE1->getDisplayValue($Grid->ChildOE1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildOE1" id="x<?= $Grid->RowIndex ?>_ChildOE1" value="<?= HtmlEncode($Grid->ChildOE1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildOE1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildOE1" id="o<?= $Grid->RowIndex ?>_ChildOE1" value="<?= HtmlEncode($Grid->ChildOE1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ChildBlGrp1->Visible) { // ChildBlGrp1 ?>
        <td data-name="ChildBlGrp1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp1" class="form-group patient_ot_delivery_register_ChildBlGrp1">
<input type="<?= $Grid->ChildBlGrp1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" name="x<?= $Grid->RowIndex ?>_ChildBlGrp1" id="x<?= $Grid->RowIndex ?>_ChildBlGrp1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ChildBlGrp1->getPlaceHolder()) ?>" value="<?= $Grid->ChildBlGrp1->EditValue ?>"<?= $Grid->ChildBlGrp1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ChildBlGrp1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ChildBlGrp1" class="form-group patient_ot_delivery_register_ChildBlGrp1">
<span<?= $Grid->ChildBlGrp1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ChildBlGrp1->getDisplayValue($Grid->ChildBlGrp1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ChildBlGrp1" id="x<?= $Grid->RowIndex ?>_ChildBlGrp1" value="<?= HtmlEncode($Grid->ChildBlGrp1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ChildBlGrp1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ChildBlGrp1" id="o<?= $Grid->RowIndex ?>_ChildBlGrp1" value="<?= HtmlEncode($Grid->ChildBlGrp1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ApgarScore1->Visible) { // ApgarScore1 ?>
        <td data-name="ApgarScore1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore1" class="form-group patient_ot_delivery_register_ApgarScore1">
<input type="<?= $Grid->ApgarScore1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" name="x<?= $Grid->RowIndex ?>_ApgarScore1" id="x<?= $Grid->RowIndex ?>_ApgarScore1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ApgarScore1->getPlaceHolder()) ?>" value="<?= $Grid->ApgarScore1->EditValue ?>"<?= $Grid->ApgarScore1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ApgarScore1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ApgarScore1" class="form-group patient_ot_delivery_register_ApgarScore1">
<span<?= $Grid->ApgarScore1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ApgarScore1->getDisplayValue($Grid->ApgarScore1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ApgarScore1" id="x<?= $Grid->RowIndex ?>_ApgarScore1" value="<?= HtmlEncode($Grid->ApgarScore1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ApgarScore1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ApgarScore1" id="o<?= $Grid->RowIndex ?>_ApgarScore1" value="<?= HtmlEncode($Grid->ApgarScore1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->birthnotification1->Visible) { // birthnotification1 ?>
        <td data-name="birthnotification1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification1" class="form-group patient_ot_delivery_register_birthnotification1">
<input type="<?= $Grid->birthnotification1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" name="x<?= $Grid->RowIndex ?>_birthnotification1" id="x<?= $Grid->RowIndex ?>_birthnotification1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->birthnotification1->getPlaceHolder()) ?>" value="<?= $Grid->birthnotification1->EditValue ?>"<?= $Grid->birthnotification1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->birthnotification1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_birthnotification1" class="form-group patient_ot_delivery_register_birthnotification1">
<span<?= $Grid->birthnotification1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->birthnotification1->getDisplayValue($Grid->birthnotification1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_birthnotification1" id="x<?= $Grid->RowIndex ?>_birthnotification1" value="<?= HtmlEncode($Grid->birthnotification1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_birthnotification1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_birthnotification1" id="o<?= $Grid->RowIndex ?>_birthnotification1" value="<?= HtmlEncode($Grid->birthnotification1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->formno1->Visible) { // formno1 ?>
        <td data-name="formno1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno1" class="form-group patient_ot_delivery_register_formno1">
<input type="<?= $Grid->formno1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_formno1" name="x<?= $Grid->RowIndex ?>_formno1" id="x<?= $Grid->RowIndex ?>_formno1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->formno1->getPlaceHolder()) ?>" value="<?= $Grid->formno1->EditValue ?>"<?= $Grid->formno1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->formno1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_formno1" class="form-group patient_ot_delivery_register_formno1">
<span<?= $Grid->formno1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->formno1->getDisplayValue($Grid->formno1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_formno1" id="x<?= $Grid->RowIndex ?>_formno1" value="<?= HtmlEncode($Grid->formno1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_formno1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_formno1" id="o<?= $Grid->RowIndex ?>_formno1" value="<?= HtmlEncode($Grid->formno1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RecievedTime->Visible) { // RecievedTime ?>
        <td data-name="RecievedTime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecievedTime" class="form-group patient_ot_delivery_register_RecievedTime">
<input type="<?= $Grid->RecievedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-format="11" name="x<?= $Grid->RowIndex ?>_RecievedTime" id="x<?= $Grid->RowIndex ?>_RecievedTime" placeholder="<?= HtmlEncode($Grid->RecievedTime->getPlaceHolder()) ?>" value="<?= $Grid->RecievedTime->EditValue ?>"<?= $Grid->RecievedTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecievedTime->getErrorMessage() ?></div>
<?php if (!$Grid->RecievedTime->ReadOnly && !$Grid->RecievedTime->Disabled && !isset($Grid->RecievedTime->EditAttrs["readonly"]) && !isset($Grid->RecievedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_RecievedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecievedTime" class="form-group patient_ot_delivery_register_RecievedTime">
<span<?= $Grid->RecievedTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RecievedTime->getDisplayValue($Grid->RecievedTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RecievedTime" id="x<?= $Grid->RowIndex ?>_RecievedTime" value="<?= HtmlEncode($Grid->RecievedTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecievedTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RecievedTime" id="o<?= $Grid->RowIndex ?>_RecievedTime" value="<?= HtmlEncode($Grid->RecievedTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AnaesthesiaStarted->Visible) { // AnaesthesiaStarted ?>
        <td data-name="AnaesthesiaStarted">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group patient_ot_delivery_register_AnaesthesiaStarted">
<input type="<?= $Grid->AnaesthesiaStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-format="11" name="x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" id="x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" placeholder="<?= HtmlEncode($Grid->AnaesthesiaStarted->getPlaceHolder()) ?>" value="<?= $Grid->AnaesthesiaStarted->EditValue ?>"<?= $Grid->AnaesthesiaStarted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaesthesiaStarted->getErrorMessage() ?></div>
<?php if (!$Grid->AnaesthesiaStarted->ReadOnly && !$Grid->AnaesthesiaStarted->Disabled && !isset($Grid->AnaesthesiaStarted->EditAttrs["readonly"]) && !isset($Grid->AnaesthesiaStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_AnaesthesiaStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaStarted" class="form-group patient_ot_delivery_register_AnaesthesiaStarted">
<span<?= $Grid->AnaesthesiaStarted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AnaesthesiaStarted->getDisplayValue($Grid->AnaesthesiaStarted->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" id="x<?= $Grid->RowIndex ?>_AnaesthesiaStarted" value="<?= HtmlEncode($Grid->AnaesthesiaStarted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaStarted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnaesthesiaStarted" id="o<?= $Grid->RowIndex ?>_AnaesthesiaStarted" value="<?= HtmlEncode($Grid->AnaesthesiaStarted->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AnaesthesiaEnded->Visible) { // AnaesthesiaEnded ?>
        <td data-name="AnaesthesiaEnded">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group patient_ot_delivery_register_AnaesthesiaEnded">
<input type="<?= $Grid->AnaesthesiaEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-format="11" name="x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" id="x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" placeholder="<?= HtmlEncode($Grid->AnaesthesiaEnded->getPlaceHolder()) ?>" value="<?= $Grid->AnaesthesiaEnded->EditValue ?>"<?= $Grid->AnaesthesiaEnded->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->AnaesthesiaEnded->getErrorMessage() ?></div>
<?php if (!$Grid->AnaesthesiaEnded->ReadOnly && !$Grid->AnaesthesiaEnded->Disabled && !isset($Grid->AnaesthesiaEnded->EditAttrs["readonly"]) && !isset($Grid->AnaesthesiaEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_AnaesthesiaEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AnaesthesiaEnded" class="form-group patient_ot_delivery_register_AnaesthesiaEnded">
<span<?= $Grid->AnaesthesiaEnded->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AnaesthesiaEnded->getDisplayValue($Grid->AnaesthesiaEnded->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" id="x<?= $Grid->RowIndex ?>_AnaesthesiaEnded" value="<?= HtmlEncode($Grid->AnaesthesiaEnded->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AnaesthesiaEnded" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnaesthesiaEnded" id="o<?= $Grid->RowIndex ?>_AnaesthesiaEnded" value="<?= HtmlEncode($Grid->AnaesthesiaEnded->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->surgeryStarted->Visible) { // surgeryStarted ?>
        <td data-name="surgeryStarted">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryStarted" class="form-group patient_ot_delivery_register_surgeryStarted">
<input type="<?= $Grid->surgeryStarted->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-format="11" name="x<?= $Grid->RowIndex ?>_surgeryStarted" id="x<?= $Grid->RowIndex ?>_surgeryStarted" placeholder="<?= HtmlEncode($Grid->surgeryStarted->getPlaceHolder()) ?>" value="<?= $Grid->surgeryStarted->EditValue ?>"<?= $Grid->surgeryStarted->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->surgeryStarted->getErrorMessage() ?></div>
<?php if (!$Grid->surgeryStarted->ReadOnly && !$Grid->surgeryStarted->Disabled && !isset($Grid->surgeryStarted->EditAttrs["readonly"]) && !isset($Grid->surgeryStarted->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_surgeryStarted", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryStarted" class="form-group patient_ot_delivery_register_surgeryStarted">
<span<?= $Grid->surgeryStarted->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->surgeryStarted->getDisplayValue($Grid->surgeryStarted->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-hidden="1" name="x<?= $Grid->RowIndex ?>_surgeryStarted" id="x<?= $Grid->RowIndex ?>_surgeryStarted" value="<?= HtmlEncode($Grid->surgeryStarted->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryStarted" data-hidden="1" name="o<?= $Grid->RowIndex ?>_surgeryStarted" id="o<?= $Grid->RowIndex ?>_surgeryStarted" value="<?= HtmlEncode($Grid->surgeryStarted->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->surgeryEnded->Visible) { // surgeryEnded ?>
        <td data-name="surgeryEnded">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryEnded" class="form-group patient_ot_delivery_register_surgeryEnded">
<input type="<?= $Grid->surgeryEnded->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-format="11" name="x<?= $Grid->RowIndex ?>_surgeryEnded" id="x<?= $Grid->RowIndex ?>_surgeryEnded" placeholder="<?= HtmlEncode($Grid->surgeryEnded->getPlaceHolder()) ?>" value="<?= $Grid->surgeryEnded->EditValue ?>"<?= $Grid->surgeryEnded->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->surgeryEnded->getErrorMessage() ?></div>
<?php if (!$Grid->surgeryEnded->ReadOnly && !$Grid->surgeryEnded->Disabled && !isset($Grid->surgeryEnded->EditAttrs["readonly"]) && !isset($Grid->surgeryEnded->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_surgeryEnded", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_surgeryEnded" class="form-group patient_ot_delivery_register_surgeryEnded">
<span<?= $Grid->surgeryEnded->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->surgeryEnded->getDisplayValue($Grid->surgeryEnded->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-hidden="1" name="x<?= $Grid->RowIndex ?>_surgeryEnded" id="x<?= $Grid->RowIndex ?>_surgeryEnded" value="<?= HtmlEncode($Grid->surgeryEnded->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_surgeryEnded" data-hidden="1" name="o<?= $Grid->RowIndex ?>_surgeryEnded" id="o<?= $Grid->RowIndex ?>_surgeryEnded" value="<?= HtmlEncode($Grid->surgeryEnded->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RecoveryTime->Visible) { // RecoveryTime ?>
        <td data-name="RecoveryTime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecoveryTime" class="form-group patient_ot_delivery_register_RecoveryTime">
<input type="<?= $Grid->RecoveryTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-format="11" name="x<?= $Grid->RowIndex ?>_RecoveryTime" id="x<?= $Grid->RowIndex ?>_RecoveryTime" placeholder="<?= HtmlEncode($Grid->RecoveryTime->getPlaceHolder()) ?>" value="<?= $Grid->RecoveryTime->EditValue ?>"<?= $Grid->RecoveryTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RecoveryTime->getErrorMessage() ?></div>
<?php if (!$Grid->RecoveryTime->ReadOnly && !$Grid->RecoveryTime->Disabled && !isset($Grid->RecoveryTime->EditAttrs["readonly"]) && !isset($Grid->RecoveryTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_RecoveryTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_RecoveryTime" class="form-group patient_ot_delivery_register_RecoveryTime">
<span<?= $Grid->RecoveryTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RecoveryTime->getDisplayValue($Grid->RecoveryTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RecoveryTime" id="x<?= $Grid->RowIndex ?>_RecoveryTime" value="<?= HtmlEncode($Grid->RecoveryTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_RecoveryTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RecoveryTime" id="o<?= $Grid->RowIndex ?>_RecoveryTime" value="<?= HtmlEncode($Grid->RecoveryTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ShiftedTime->Visible) { // ShiftedTime ?>
        <td data-name="ShiftedTime">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ShiftedTime" class="form-group patient_ot_delivery_register_ShiftedTime">
<input type="<?= $Grid->ShiftedTime->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-format="11" name="x<?= $Grid->RowIndex ?>_ShiftedTime" id="x<?= $Grid->RowIndex ?>_ShiftedTime" placeholder="<?= HtmlEncode($Grid->ShiftedTime->getPlaceHolder()) ?>" value="<?= $Grid->ShiftedTime->EditValue ?>"<?= $Grid->ShiftedTime->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ShiftedTime->getErrorMessage() ?></div>
<?php if (!$Grid->ShiftedTime->ReadOnly && !$Grid->ShiftedTime->Disabled && !isset($Grid->ShiftedTime->EditAttrs["readonly"]) && !isset($Grid->ShiftedTime->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid", "datetimepicker"], function() {
    ew.createDateTimePicker("fpatient_ot_delivery_registergrid", "x<?= $Grid->RowIndex ?>_ShiftedTime", {"ignoreReadonly":true,"useCurrent":false,"format":11});
});
</script>
<?php } ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ShiftedTime" class="form-group patient_ot_delivery_register_ShiftedTime">
<span<?= $Grid->ShiftedTime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ShiftedTime->getDisplayValue($Grid->ShiftedTime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ShiftedTime" id="x<?= $Grid->RowIndex ?>_ShiftedTime" value="<?= HtmlEncode($Grid->ShiftedTime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ShiftedTime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ShiftedTime" id="o<?= $Grid->RowIndex ?>_ShiftedTime" value="<?= HtmlEncode($Grid->ShiftedTime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Duration->Visible) { // Duration ?>
        <td data-name="Duration">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Duration" class="form-group patient_ot_delivery_register_Duration">
<input type="<?= $Grid->Duration->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Duration" name="x<?= $Grid->RowIndex ?>_Duration" id="x<?= $Grid->RowIndex ?>_Duration" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Duration->getPlaceHolder()) ?>" value="<?= $Grid->Duration->EditValue ?>"<?= $Grid->Duration->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Duration->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Duration" class="form-group patient_ot_delivery_register_Duration">
<span<?= $Grid->Duration->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Duration->getDisplayValue($Grid->Duration->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Duration" id="x<?= $Grid->RowIndex ?>_Duration" value="<?= HtmlEncode($Grid->Duration->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Duration" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Duration" id="o<?= $Grid->RowIndex ?>_Duration" value="<?= HtmlEncode($Grid->Duration->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Surgeon->Visible) { // Surgeon ?>
        <td data-name="Surgeon">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Surgeon" class="form-group patient_ot_delivery_register_Surgeon">
<?php
$onchange = $Grid->Surgeon->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Surgeon->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Surgeon" class="ew-auto-suggest">
    <input type="<?= $Grid->Surgeon->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Surgeon" id="sv_x<?= $Grid->RowIndex ?>_Surgeon" value="<?= RemoveHtml($Grid->Surgeon->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Surgeon->getPlaceHolder()) ?>"<?= $Grid->Surgeon->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-input="sv_x<?= $Grid->RowIndex ?>_Surgeon" data-value-separator="<?= $Grid->Surgeon->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Surgeon" id="x<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Surgeon->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Surgeon","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.Surgeon.autoSuggestOptions));
});
</script>
<?= $Grid->Surgeon->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Surgeon") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Surgeon" class="form-group patient_ot_delivery_register_Surgeon">
<span<?= $Grid->Surgeon->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Surgeon->getDisplayValue($Grid->Surgeon->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Surgeon" id="x<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Surgeon" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Surgeon" id="o<?= $Grid->RowIndex ?>_Surgeon" value="<?= HtmlEncode($Grid->Surgeon->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Anaesthetist->Visible) { // Anaesthetist ?>
        <td data-name="Anaesthetist">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Anaesthetist" class="form-group patient_ot_delivery_register_Anaesthetist">
<?php
$onchange = $Grid->Anaesthetist->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->Anaesthetist->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_Anaesthetist" class="ew-auto-suggest">
    <input type="<?= $Grid->Anaesthetist->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" id="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= RemoveHtml($Grid->Anaesthetist->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->Anaesthetist->getPlaceHolder()) ?>"<?= $Grid->Anaesthetist->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-input="sv_x<?= $Grid->RowIndex ?>_Anaesthetist" data-value-separator="<?= $Grid->Anaesthetist->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_Anaesthetist" id="x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->Anaesthetist->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_Anaesthetist","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.Anaesthetist.autoSuggestOptions));
});
</script>
<?= $Grid->Anaesthetist->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_Anaesthetist") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Anaesthetist" class="form-group patient_ot_delivery_register_Anaesthetist">
<span<?= $Grid->Anaesthetist->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Anaesthetist->getDisplayValue($Grid->Anaesthetist->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Anaesthetist" id="x<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Anaesthetist" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Anaesthetist" id="o<?= $Grid->RowIndex ?>_Anaesthetist" value="<?= HtmlEncode($Grid->Anaesthetist->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AsstSurgeon1->Visible) { // AsstSurgeon1 ?>
        <td data-name="AsstSurgeon1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon1" class="form-group patient_ot_delivery_register_AsstSurgeon1">
<?php
$onchange = $Grid->AsstSurgeon1->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AsstSurgeon1->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AsstSurgeon1" class="ew-auto-suggest">
    <input type="<?= $Grid->AsstSurgeon1->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" id="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= RemoveHtml($Grid->AsstSurgeon1->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon1->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AsstSurgeon1->getPlaceHolder()) ?>"<?= $Grid->AsstSurgeon1->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-input="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon1" data-value-separator="<?= $Grid->AsstSurgeon1->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AsstSurgeon1" id="x<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= HtmlEncode($Grid->AsstSurgeon1->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon1->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AsstSurgeon1","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.AsstSurgeon1.autoSuggestOptions));
});
</script>
<?= $Grid->AsstSurgeon1->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AsstSurgeon1") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon1" class="form-group patient_ot_delivery_register_AsstSurgeon1">
<span<?= $Grid->AsstSurgeon1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AsstSurgeon1->getDisplayValue($Grid->AsstSurgeon1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AsstSurgeon1" id="x<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= HtmlEncode($Grid->AsstSurgeon1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AsstSurgeon1" id="o<?= $Grid->RowIndex ?>_AsstSurgeon1" value="<?= HtmlEncode($Grid->AsstSurgeon1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AsstSurgeon2->Visible) { // AsstSurgeon2 ?>
        <td data-name="AsstSurgeon2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon2" class="form-group patient_ot_delivery_register_AsstSurgeon2">
<?php
$onchange = $Grid->AsstSurgeon2->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AsstSurgeon2->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AsstSurgeon2" class="ew-auto-suggest">
    <input type="<?= $Grid->AsstSurgeon2->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" id="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= RemoveHtml($Grid->AsstSurgeon2->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->AsstSurgeon2->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AsstSurgeon2->getPlaceHolder()) ?>"<?= $Grid->AsstSurgeon2->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-input="sv_x<?= $Grid->RowIndex ?>_AsstSurgeon2" data-value-separator="<?= $Grid->AsstSurgeon2->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AsstSurgeon2" id="x<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= HtmlEncode($Grid->AsstSurgeon2->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AsstSurgeon2->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AsstSurgeon2","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.AsstSurgeon2.autoSuggestOptions));
});
</script>
<?= $Grid->AsstSurgeon2->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AsstSurgeon2") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_AsstSurgeon2" class="form-group patient_ot_delivery_register_AsstSurgeon2">
<span<?= $Grid->AsstSurgeon2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AsstSurgeon2->getDisplayValue($Grid->AsstSurgeon2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AsstSurgeon2" id="x<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= HtmlEncode($Grid->AsstSurgeon2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_AsstSurgeon2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AsstSurgeon2" id="o<?= $Grid->RowIndex ?>_AsstSurgeon2" value="<?= HtmlEncode($Grid->AsstSurgeon2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->paediatric->Visible) { // paediatric ?>
        <td data-name="paediatric">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_paediatric" class="form-group patient_ot_delivery_register_paediatric">
<?php
$onchange = $Grid->paediatric->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->paediatric->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_paediatric" class="ew-auto-suggest">
    <input type="<?= $Grid->paediatric->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_paediatric" id="sv_x<?= $Grid->RowIndex ?>_paediatric" value="<?= RemoveHtml($Grid->paediatric->EditValue) ?>" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->paediatric->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->paediatric->getPlaceHolder()) ?>"<?= $Grid->paediatric->editAttributes() ?>>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-input="sv_x<?= $Grid->RowIndex ?>_paediatric" data-value-separator="<?= $Grid->paediatric->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_paediatric" id="x<?= $Grid->RowIndex ?>_paediatric" value="<?= HtmlEncode($Grid->paediatric->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->paediatric->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid"], function() {
    fpatient_ot_delivery_registergrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_paediatric","forceSelect":false}, ew.vars.tables.patient_ot_delivery_register.fields.paediatric.autoSuggestOptions));
});
</script>
<?= $Grid->paediatric->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_paediatric") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_paediatric" class="form-group patient_ot_delivery_register_paediatric">
<span<?= $Grid->paediatric->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->paediatric->getDisplayValue($Grid->paediatric->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-hidden="1" name="x<?= $Grid->RowIndex ?>_paediatric" id="x<?= $Grid->RowIndex ?>_paediatric" value="<?= HtmlEncode($Grid->paediatric->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_paediatric" data-hidden="1" name="o<?= $Grid->RowIndex ?>_paediatric" id="o<?= $Grid->RowIndex ?>_paediatric" value="<?= HtmlEncode($Grid->paediatric->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ScrubNurse1->Visible) { // ScrubNurse1 ?>
        <td data-name="ScrubNurse1">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse1" class="form-group patient_ot_delivery_register_ScrubNurse1">
<input type="<?= $Grid->ScrubNurse1->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" name="x<?= $Grid->RowIndex ?>_ScrubNurse1" id="x<?= $Grid->RowIndex ?>_ScrubNurse1" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ScrubNurse1->getPlaceHolder()) ?>" value="<?= $Grid->ScrubNurse1->EditValue ?>"<?= $Grid->ScrubNurse1->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ScrubNurse1->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse1" class="form-group patient_ot_delivery_register_ScrubNurse1">
<span<?= $Grid->ScrubNurse1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ScrubNurse1->getDisplayValue($Grid->ScrubNurse1->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ScrubNurse1" id="x<?= $Grid->RowIndex ?>_ScrubNurse1" value="<?= HtmlEncode($Grid->ScrubNurse1->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse1" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ScrubNurse1" id="o<?= $Grid->RowIndex ?>_ScrubNurse1" value="<?= HtmlEncode($Grid->ScrubNurse1->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->ScrubNurse2->Visible) { // ScrubNurse2 ?>
        <td data-name="ScrubNurse2">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse2" class="form-group patient_ot_delivery_register_ScrubNurse2">
<input type="<?= $Grid->ScrubNurse2->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" name="x<?= $Grid->RowIndex ?>_ScrubNurse2" id="x<?= $Grid->RowIndex ?>_ScrubNurse2" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->ScrubNurse2->getPlaceHolder()) ?>" value="<?= $Grid->ScrubNurse2->EditValue ?>"<?= $Grid->ScrubNurse2->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->ScrubNurse2->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_ScrubNurse2" class="form-group patient_ot_delivery_register_ScrubNurse2">
<span<?= $Grid->ScrubNurse2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->ScrubNurse2->getDisplayValue($Grid->ScrubNurse2->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" data-hidden="1" name="x<?= $Grid->RowIndex ?>_ScrubNurse2" id="x<?= $Grid->RowIndex ?>_ScrubNurse2" value="<?= HtmlEncode($Grid->ScrubNurse2->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_ScrubNurse2" data-hidden="1" name="o<?= $Grid->RowIndex ?>_ScrubNurse2" id="o<?= $Grid->RowIndex ?>_ScrubNurse2" value="<?= HtmlEncode($Grid->ScrubNurse2->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FloorNurse->Visible) { // FloorNurse ?>
        <td data-name="FloorNurse">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_FloorNurse" class="form-group patient_ot_delivery_register_FloorNurse">
<input type="<?= $Grid->FloorNurse->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" name="x<?= $Grid->RowIndex ?>_FloorNurse" id="x<?= $Grid->RowIndex ?>_FloorNurse" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->FloorNurse->getPlaceHolder()) ?>" value="<?= $Grid->FloorNurse->EditValue ?>"<?= $Grid->FloorNurse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FloorNurse->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_FloorNurse" class="form-group patient_ot_delivery_register_FloorNurse">
<span<?= $Grid->FloorNurse->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FloorNurse->getDisplayValue($Grid->FloorNurse->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FloorNurse" id="x<?= $Grid->RowIndex ?>_FloorNurse" value="<?= HtmlEncode($Grid->FloorNurse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_FloorNurse" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FloorNurse" id="o<?= $Grid->RowIndex ?>_FloorNurse" value="<?= HtmlEncode($Grid->FloorNurse->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Technician->Visible) { // Technician ?>
        <td data-name="Technician">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Technician" class="form-group patient_ot_delivery_register_Technician">
<input type="<?= $Grid->Technician->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Technician" name="x<?= $Grid->RowIndex ?>_Technician" id="x<?= $Grid->RowIndex ?>_Technician" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->Technician->getPlaceHolder()) ?>" value="<?= $Grid->Technician->EditValue ?>"<?= $Grid->Technician->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Technician->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Technician" class="form-group patient_ot_delivery_register_Technician">
<span<?= $Grid->Technician->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Technician->getDisplayValue($Grid->Technician->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Technician" id="x<?= $Grid->RowIndex ?>_Technician" value="<?= HtmlEncode($Grid->Technician->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Technician" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Technician" id="o<?= $Grid->RowIndex ?>_Technician" value="<?= HtmlEncode($Grid->Technician->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HouseKeeping->Visible) { // HouseKeeping ?>
        <td data-name="HouseKeeping">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HouseKeeping" class="form-group patient_ot_delivery_register_HouseKeeping">
<input type="<?= $Grid->HouseKeeping->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" name="x<?= $Grid->RowIndex ?>_HouseKeeping" id="x<?= $Grid->RowIndex ?>_HouseKeeping" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->HouseKeeping->getPlaceHolder()) ?>" value="<?= $Grid->HouseKeeping->EditValue ?>"<?= $Grid->HouseKeeping->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HouseKeeping->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_HouseKeeping" class="form-group patient_ot_delivery_register_HouseKeeping">
<span<?= $Grid->HouseKeeping->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HouseKeeping->getDisplayValue($Grid->HouseKeeping->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HouseKeeping" id="x<?= $Grid->RowIndex ?>_HouseKeeping" value="<?= HtmlEncode($Grid->HouseKeeping->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_HouseKeeping" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HouseKeeping" id="o<?= $Grid->RowIndex ?>_HouseKeeping" value="<?= HtmlEncode($Grid->HouseKeeping->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->countsCheckedMops->Visible) { // countsCheckedMops ?>
        <td data-name="countsCheckedMops">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_countsCheckedMops" class="form-group patient_ot_delivery_register_countsCheckedMops">
<input type="<?= $Grid->countsCheckedMops->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" name="x<?= $Grid->RowIndex ?>_countsCheckedMops" id="x<?= $Grid->RowIndex ?>_countsCheckedMops" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->countsCheckedMops->getPlaceHolder()) ?>" value="<?= $Grid->countsCheckedMops->EditValue ?>"<?= $Grid->countsCheckedMops->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->countsCheckedMops->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_countsCheckedMops" class="form-group patient_ot_delivery_register_countsCheckedMops">
<span<?= $Grid->countsCheckedMops->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->countsCheckedMops->getDisplayValue($Grid->countsCheckedMops->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" data-hidden="1" name="x<?= $Grid->RowIndex ?>_countsCheckedMops" id="x<?= $Grid->RowIndex ?>_countsCheckedMops" value="<?= HtmlEncode($Grid->countsCheckedMops->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_countsCheckedMops" data-hidden="1" name="o<?= $Grid->RowIndex ?>_countsCheckedMops" id="o<?= $Grid->RowIndex ?>_countsCheckedMops" value="<?= HtmlEncode($Grid->countsCheckedMops->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->gauze->Visible) { // gauze ?>
        <td data-name="gauze">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_gauze" class="form-group patient_ot_delivery_register_gauze">
<input type="<?= $Grid->gauze->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_gauze" name="x<?= $Grid->RowIndex ?>_gauze" id="x<?= $Grid->RowIndex ?>_gauze" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->gauze->getPlaceHolder()) ?>" value="<?= $Grid->gauze->EditValue ?>"<?= $Grid->gauze->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->gauze->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_gauze" class="form-group patient_ot_delivery_register_gauze">
<span<?= $Grid->gauze->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->gauze->getDisplayValue($Grid->gauze->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" data-hidden="1" name="x<?= $Grid->RowIndex ?>_gauze" id="x<?= $Grid->RowIndex ?>_gauze" value="<?= HtmlEncode($Grid->gauze->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_gauze" data-hidden="1" name="o<?= $Grid->RowIndex ?>_gauze" id="o<?= $Grid->RowIndex ?>_gauze" value="<?= HtmlEncode($Grid->gauze->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->needles->Visible) { // needles ?>
        <td data-name="needles">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_needles" class="form-group patient_ot_delivery_register_needles">
<input type="<?= $Grid->needles->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_needles" name="x<?= $Grid->RowIndex ?>_needles" id="x<?= $Grid->RowIndex ?>_needles" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->needles->getPlaceHolder()) ?>" value="<?= $Grid->needles->EditValue ?>"<?= $Grid->needles->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->needles->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_needles" class="form-group patient_ot_delivery_register_needles">
<span<?= $Grid->needles->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->needles->getDisplayValue($Grid->needles->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" data-hidden="1" name="x<?= $Grid->RowIndex ?>_needles" id="x<?= $Grid->RowIndex ?>_needles" value="<?= HtmlEncode($Grid->needles->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_needles" data-hidden="1" name="o<?= $Grid->RowIndex ?>_needles" id="o<?= $Grid->RowIndex ?>_needles" value="<?= HtmlEncode($Grid->needles->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->bloodloss->Visible) { // bloodloss ?>
        <td data-name="bloodloss">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodloss" class="form-group patient_ot_delivery_register_bloodloss">
<input type="<?= $Grid->bloodloss->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodloss" name="x<?= $Grid->RowIndex ?>_bloodloss" id="x<?= $Grid->RowIndex ?>_bloodloss" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodloss->getPlaceHolder()) ?>" value="<?= $Grid->bloodloss->EditValue ?>"<?= $Grid->bloodloss->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodloss->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodloss" class="form-group patient_ot_delivery_register_bloodloss">
<span<?= $Grid->bloodloss->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->bloodloss->getDisplayValue($Grid->bloodloss->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" data-hidden="1" name="x<?= $Grid->RowIndex ?>_bloodloss" id="x<?= $Grid->RowIndex ?>_bloodloss" value="<?= HtmlEncode($Grid->bloodloss->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodloss" data-hidden="1" name="o<?= $Grid->RowIndex ?>_bloodloss" id="o<?= $Grid->RowIndex ?>_bloodloss" value="<?= HtmlEncode($Grid->bloodloss->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->bloodtransfusion->Visible) { // bloodtransfusion ?>
        <td data-name="bloodtransfusion">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodtransfusion" class="form-group patient_ot_delivery_register_bloodtransfusion">
<input type="<?= $Grid->bloodtransfusion->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" name="x<?= $Grid->RowIndex ?>_bloodtransfusion" id="x<?= $Grid->RowIndex ?>_bloodtransfusion" size="30" maxlength="50" placeholder="<?= HtmlEncode($Grid->bloodtransfusion->getPlaceHolder()) ?>" value="<?= $Grid->bloodtransfusion->EditValue ?>"<?= $Grid->bloodtransfusion->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->bloodtransfusion->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_bloodtransfusion" class="form-group patient_ot_delivery_register_bloodtransfusion">
<span<?= $Grid->bloodtransfusion->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->bloodtransfusion->getDisplayValue($Grid->bloodtransfusion->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" data-hidden="1" name="x<?= $Grid->RowIndex ?>_bloodtransfusion" id="x<?= $Grid->RowIndex ?>_bloodtransfusion" value="<?= HtmlEncode($Grid->bloodtransfusion->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_bloodtransfusion" data-hidden="1" name="o<?= $Grid->RowIndex ?>_bloodtransfusion" id="o<?= $Grid->RowIndex ?>_bloodtransfusion" value="<?= HtmlEncode($Grid->bloodtransfusion->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_Reception" class="form-group patient_ot_delivery_register_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PId->Visible) { // PId ?>
        <td data-name="PId">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<span<?= $Grid->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PId->getDisplayValue($Grid->PId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PId" name="x<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<input type="<?= $Grid->PId->getInputTextType() ?>" data-table="patient_ot_delivery_register" data-field="x_PId" name="x<?= $Grid->RowIndex ?>_PId" id="x<?= $Grid->RowIndex ?>_PId" size="30" placeholder="<?= HtmlEncode($Grid->PId->getPlaceHolder()) ?>" value="<?= $Grid->PId->EditValue ?>"<?= $Grid->PId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_ot_delivery_register_PId" class="form-group patient_ot_delivery_register_PId">
<span<?= $Grid->PId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PId->getDisplayValue($Grid->PId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PId" id="x<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_ot_delivery_register" data-field="x_PId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PId" id="o<?= $Grid->RowIndex ?>_PId" value="<?= HtmlEncode($Grid->PId->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_ot_delivery_registergrid","load"], function() {
    fpatient_ot_delivery_registergrid.updateLists(<?= $Grid->RowIndex ?>);
});
</script>
    </tr>
<?php
    }
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($Grid->CurrentMode == "add" || $Grid->CurrentMode == "copy") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "edit") { ?>
<input type="hidden" name="<?= $Grid->FormKeyCountName ?>" id="<?= $Grid->FormKeyCountName ?>" value="<?= $Grid->KeyCount ?>">
<?= $Grid->MultiSelectKey ?>
<?php } ?>
<?php if ($Grid->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fpatient_ot_delivery_registergrid">
</div><!-- /.ew-list-form -->
<?php
// Close recordset
if ($Grid->Recordset) {
    $Grid->Recordset->close();
}
?>
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $Grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($Grid->TotalRecords == 0 && !$Grid->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$Grid->isExport()) { ?>
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
<?php if (!$Grid->isExport()) { ?>
<script>
loadjs.ready("fixedheadertable", function () {
    ew.fixedHeaderTable({
        delay: 0,
        container: "gmp_patient_ot_delivery_register",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

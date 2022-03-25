<?php

namespace PHPMaker2021\HIMS;

// Set up and run Grid object
$Grid = Container("PatientVitalsGrid");
$Grid->run();
?>
<?php if (!$Grid->isExport()) { ?>
<script>
var currentForm, currentPageID;
var fpatient_vitalsgrid;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    fpatient_vitalsgrid = new ew.Form("fpatient_vitalsgrid", "grid");
    fpatient_vitalsgrid.formKeyCountName = '<?= $Grid->FormKeyCountName ?>';

    // Add fields
    var currentTable = <?= JsonEncode(GetClientVar("tables", "patient_vitals")) ?>,
        fields = currentTable.fields;
    if (!ew.vars.tables.patient_vitals)
        ew.vars.tables.patient_vitals = currentTable;
    fpatient_vitalsgrid.addFields([
        ["id", [fields.id.visible && fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["mrnno", [fields.mrnno.visible && fields.mrnno.required ? ew.Validators.required(fields.mrnno.caption) : null], fields.mrnno.isInvalid],
        ["PatientName", [fields.PatientName.visible && fields.PatientName.required ? ew.Validators.required(fields.PatientName.caption) : null], fields.PatientName.isInvalid],
        ["PatID", [fields.PatID.visible && fields.PatID.required ? ew.Validators.required(fields.PatID.caption) : null], fields.PatID.isInvalid],
        ["MobileNumber", [fields.MobileNumber.visible && fields.MobileNumber.required ? ew.Validators.required(fields.MobileNumber.caption) : null], fields.MobileNumber.isInvalid],
        ["HT", [fields.HT.visible && fields.HT.required ? ew.Validators.required(fields.HT.caption) : null], fields.HT.isInvalid],
        ["WT", [fields.WT.visible && fields.WT.required ? ew.Validators.required(fields.WT.caption) : null], fields.WT.isInvalid],
        ["SurfaceArea", [fields.SurfaceArea.visible && fields.SurfaceArea.required ? ew.Validators.required(fields.SurfaceArea.caption) : null], fields.SurfaceArea.isInvalid],
        ["BodyMassIndex", [fields.BodyMassIndex.visible && fields.BodyMassIndex.required ? ew.Validators.required(fields.BodyMassIndex.caption) : null], fields.BodyMassIndex.isInvalid],
        ["AnticoagulantifAny", [fields.AnticoagulantifAny.visible && fields.AnticoagulantifAny.required ? ew.Validators.required(fields.AnticoagulantifAny.caption) : null], fields.AnticoagulantifAny.isInvalid],
        ["FoodAllergies", [fields.FoodAllergies.visible && fields.FoodAllergies.required ? ew.Validators.required(fields.FoodAllergies.caption) : null], fields.FoodAllergies.isInvalid],
        ["GenericAllergies", [fields.GenericAllergies.visible && fields.GenericAllergies.required ? ew.Validators.required(fields.GenericAllergies.caption) : null], fields.GenericAllergies.isInvalid],
        ["GroupAllergies", [fields.GroupAllergies.visible && fields.GroupAllergies.required ? ew.Validators.required(fields.GroupAllergies.caption) : null], fields.GroupAllergies.isInvalid],
        ["Temp", [fields.Temp.visible && fields.Temp.required ? ew.Validators.required(fields.Temp.caption) : null], fields.Temp.isInvalid],
        ["Pulse", [fields.Pulse.visible && fields.Pulse.required ? ew.Validators.required(fields.Pulse.caption) : null], fields.Pulse.isInvalid],
        ["BP", [fields.BP.visible && fields.BP.required ? ew.Validators.required(fields.BP.caption) : null], fields.BP.isInvalid],
        ["PR", [fields.PR.visible && fields.PR.required ? ew.Validators.required(fields.PR.caption) : null], fields.PR.isInvalid],
        ["CNS", [fields.CNS.visible && fields.CNS.required ? ew.Validators.required(fields.CNS.caption) : null], fields.CNS.isInvalid],
        ["RSA", [fields.RSA.visible && fields.RSA.required ? ew.Validators.required(fields.RSA.caption) : null], fields.RSA.isInvalid],
        ["CVS", [fields.CVS.visible && fields.CVS.required ? ew.Validators.required(fields.CVS.caption) : null], fields.CVS.isInvalid],
        ["PA", [fields.PA.visible && fields.PA.required ? ew.Validators.required(fields.PA.caption) : null], fields.PA.isInvalid],
        ["PS", [fields.PS.visible && fields.PS.required ? ew.Validators.required(fields.PS.caption) : null], fields.PS.isInvalid],
        ["PV", [fields.PV.visible && fields.PV.required ? ew.Validators.required(fields.PV.caption) : null], fields.PV.isInvalid],
        ["clinicaldetails", [fields.clinicaldetails.visible && fields.clinicaldetails.required ? ew.Validators.required(fields.clinicaldetails.caption) : null], fields.clinicaldetails.isInvalid],
        ["status", [fields.status.visible && fields.status.required ? ew.Validators.required(fields.status.caption) : null], fields.status.isInvalid],
        ["createdby", [fields.createdby.visible && fields.createdby.required ? ew.Validators.required(fields.createdby.caption) : null], fields.createdby.isInvalid],
        ["createddatetime", [fields.createddatetime.visible && fields.createddatetime.required ? ew.Validators.required(fields.createddatetime.caption) : null], fields.createddatetime.isInvalid],
        ["modifiedby", [fields.modifiedby.visible && fields.modifiedby.required ? ew.Validators.required(fields.modifiedby.caption) : null], fields.modifiedby.isInvalid],
        ["modifieddatetime", [fields.modifieddatetime.visible && fields.modifieddatetime.required ? ew.Validators.required(fields.modifieddatetime.caption) : null], fields.modifieddatetime.isInvalid],
        ["Age", [fields.Age.visible && fields.Age.required ? ew.Validators.required(fields.Age.caption) : null], fields.Age.isInvalid],
        ["Gender", [fields.Gender.visible && fields.Gender.required ? ew.Validators.required(fields.Gender.caption) : null], fields.Gender.isInvalid],
        ["PatientId", [fields.PatientId.visible && fields.PatientId.required ? ew.Validators.required(fields.PatientId.caption) : null], fields.PatientId.isInvalid],
        ["Reception", [fields.Reception.visible && fields.Reception.required ? ew.Validators.required(fields.Reception.caption) : null], fields.Reception.isInvalid],
        ["HospID", [fields.HospID.visible && fields.HospID.required ? ew.Validators.required(fields.HospID.caption) : null], fields.HospID.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_vitalsgrid,
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
    fpatient_vitalsgrid.validate = function () {
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
    fpatient_vitalsgrid.emptyRow = function (rowIndex) {
        var fobj = this.getForm();
        if (ew.valueChanged(fobj, rowIndex, "mrnno", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientName", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatID", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "MobileNumber", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "HT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "WT", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "SurfaceArea", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BodyMassIndex", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "AnticoagulantifAny", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "FoodAllergies", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GenericAllergies[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "GroupAllergies[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Temp", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Pulse", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "BP", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PR", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CNS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "RSA", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "CVS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PA", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PS", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PV", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "clinicaldetails[]", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "status", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Age", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Gender", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "PatientId", false))
            return false;
        if (ew.valueChanged(fobj, rowIndex, "Reception", false))
            return false;
        return true;
    }

    // Form_CustomValidate
    fpatient_vitalsgrid.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_vitalsgrid.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    fpatient_vitalsgrid.lists.AnticoagulantifAny = <?= $Grid->AnticoagulantifAny->toClientList($Grid) ?>;
    fpatient_vitalsgrid.lists.GenericAllergies = <?= $Grid->GenericAllergies->toClientList($Grid) ?>;
    fpatient_vitalsgrid.lists.GroupAllergies = <?= $Grid->GroupAllergies->toClientList($Grid) ?>;
    fpatient_vitalsgrid.lists.clinicaldetails = <?= $Grid->clinicaldetails->toClientList($Grid) ?>;
    fpatient_vitalsgrid.lists.status = <?= $Grid->status->toClientList($Grid) ?>;
    loadjs.done("fpatient_vitalsgrid");
});
</script>
<?php } ?>
<?php
$Grid->renderOtherOptions();
?>
<?php if ($Grid->TotalRecords > 0 || $Grid->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($Grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> patient_vitals">
<?php if ($Grid->ShowOtherOptions) { ?>
<div class="card-header ew-grid-upper-panel">
<?php $Grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<div id="fpatient_vitalsgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_patient_vitals" class="<?= ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_patient_vitalsgrid" class="table ew-table"><!-- .ew-table -->
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
        <th data-name="id" class="<?= $Grid->id->headerCellClass() ?>"><div id="elh_patient_vitals_id" class="patient_vitals_id"><?= $Grid->renderSort($Grid->id) ?></div></th>
<?php } ?>
<?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <th data-name="mrnno" class="<?= $Grid->mrnno->headerCellClass() ?>"><div id="elh_patient_vitals_mrnno" class="patient_vitals_mrnno"><?= $Grid->renderSort($Grid->mrnno) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <th data-name="PatientName" class="<?= $Grid->PatientName->headerCellClass() ?>"><div id="elh_patient_vitals_PatientName" class="patient_vitals_PatientName"><?= $Grid->renderSort($Grid->PatientName) ?></div></th>
<?php } ?>
<?php if ($Grid->PatID->Visible) { // PatID ?>
        <th data-name="PatID" class="<?= $Grid->PatID->headerCellClass() ?>"><div id="elh_patient_vitals_PatID" class="patient_vitals_PatID"><?= $Grid->renderSort($Grid->PatID) ?></div></th>
<?php } ?>
<?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <th data-name="MobileNumber" class="<?= $Grid->MobileNumber->headerCellClass() ?>"><div id="elh_patient_vitals_MobileNumber" class="patient_vitals_MobileNumber"><?= $Grid->renderSort($Grid->MobileNumber) ?></div></th>
<?php } ?>
<?php if ($Grid->HT->Visible) { // HT ?>
        <th data-name="HT" class="<?= $Grid->HT->headerCellClass() ?>"><div id="elh_patient_vitals_HT" class="patient_vitals_HT"><?= $Grid->renderSort($Grid->HT) ?></div></th>
<?php } ?>
<?php if ($Grid->WT->Visible) { // WT ?>
        <th data-name="WT" class="<?= $Grid->WT->headerCellClass() ?>"><div id="elh_patient_vitals_WT" class="patient_vitals_WT"><?= $Grid->renderSort($Grid->WT) ?></div></th>
<?php } ?>
<?php if ($Grid->SurfaceArea->Visible) { // SurfaceArea ?>
        <th data-name="SurfaceArea" class="<?= $Grid->SurfaceArea->headerCellClass() ?>"><div id="elh_patient_vitals_SurfaceArea" class="patient_vitals_SurfaceArea"><?= $Grid->renderSort($Grid->SurfaceArea) ?></div></th>
<?php } ?>
<?php if ($Grid->BodyMassIndex->Visible) { // BodyMassIndex ?>
        <th data-name="BodyMassIndex" class="<?= $Grid->BodyMassIndex->headerCellClass() ?>"><div id="elh_patient_vitals_BodyMassIndex" class="patient_vitals_BodyMassIndex"><?= $Grid->renderSort($Grid->BodyMassIndex) ?></div></th>
<?php } ?>
<?php if ($Grid->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
        <th data-name="AnticoagulantifAny" class="<?= $Grid->AnticoagulantifAny->headerCellClass() ?>"><div id="elh_patient_vitals_AnticoagulantifAny" class="patient_vitals_AnticoagulantifAny"><?= $Grid->renderSort($Grid->AnticoagulantifAny) ?></div></th>
<?php } ?>
<?php if ($Grid->FoodAllergies->Visible) { // FoodAllergies ?>
        <th data-name="FoodAllergies" class="<?= $Grid->FoodAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_FoodAllergies" class="patient_vitals_FoodAllergies"><?= $Grid->renderSort($Grid->FoodAllergies) ?></div></th>
<?php } ?>
<?php if ($Grid->GenericAllergies->Visible) { // GenericAllergies ?>
        <th data-name="GenericAllergies" class="<?= $Grid->GenericAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GenericAllergies" class="patient_vitals_GenericAllergies"><?= $Grid->renderSort($Grid->GenericAllergies) ?></div></th>
<?php } ?>
<?php if ($Grid->GroupAllergies->Visible) { // GroupAllergies ?>
        <th data-name="GroupAllergies" class="<?= $Grid->GroupAllergies->headerCellClass() ?>"><div id="elh_patient_vitals_GroupAllergies" class="patient_vitals_GroupAllergies"><?= $Grid->renderSort($Grid->GroupAllergies) ?></div></th>
<?php } ?>
<?php if ($Grid->Temp->Visible) { // Temp ?>
        <th data-name="Temp" class="<?= $Grid->Temp->headerCellClass() ?>"><div id="elh_patient_vitals_Temp" class="patient_vitals_Temp"><?= $Grid->renderSort($Grid->Temp) ?></div></th>
<?php } ?>
<?php if ($Grid->Pulse->Visible) { // Pulse ?>
        <th data-name="Pulse" class="<?= $Grid->Pulse->headerCellClass() ?>"><div id="elh_patient_vitals_Pulse" class="patient_vitals_Pulse"><?= $Grid->renderSort($Grid->Pulse) ?></div></th>
<?php } ?>
<?php if ($Grid->BP->Visible) { // BP ?>
        <th data-name="BP" class="<?= $Grid->BP->headerCellClass() ?>"><div id="elh_patient_vitals_BP" class="patient_vitals_BP"><?= $Grid->renderSort($Grid->BP) ?></div></th>
<?php } ?>
<?php if ($Grid->PR->Visible) { // PR ?>
        <th data-name="PR" class="<?= $Grid->PR->headerCellClass() ?>"><div id="elh_patient_vitals_PR" class="patient_vitals_PR"><?= $Grid->renderSort($Grid->PR) ?></div></th>
<?php } ?>
<?php if ($Grid->CNS->Visible) { // CNS ?>
        <th data-name="CNS" class="<?= $Grid->CNS->headerCellClass() ?>"><div id="elh_patient_vitals_CNS" class="patient_vitals_CNS"><?= $Grid->renderSort($Grid->CNS) ?></div></th>
<?php } ?>
<?php if ($Grid->RSA->Visible) { // RSA ?>
        <th data-name="RSA" class="<?= $Grid->RSA->headerCellClass() ?>"><div id="elh_patient_vitals_RSA" class="patient_vitals_RSA"><?= $Grid->renderSort($Grid->RSA) ?></div></th>
<?php } ?>
<?php if ($Grid->CVS->Visible) { // CVS ?>
        <th data-name="CVS" class="<?= $Grid->CVS->headerCellClass() ?>"><div id="elh_patient_vitals_CVS" class="patient_vitals_CVS"><?= $Grid->renderSort($Grid->CVS) ?></div></th>
<?php } ?>
<?php if ($Grid->PA->Visible) { // PA ?>
        <th data-name="PA" class="<?= $Grid->PA->headerCellClass() ?>"><div id="elh_patient_vitals_PA" class="patient_vitals_PA"><?= $Grid->renderSort($Grid->PA) ?></div></th>
<?php } ?>
<?php if ($Grid->PS->Visible) { // PS ?>
        <th data-name="PS" class="<?= $Grid->PS->headerCellClass() ?>"><div id="elh_patient_vitals_PS" class="patient_vitals_PS"><?= $Grid->renderSort($Grid->PS) ?></div></th>
<?php } ?>
<?php if ($Grid->PV->Visible) { // PV ?>
        <th data-name="PV" class="<?= $Grid->PV->headerCellClass() ?>"><div id="elh_patient_vitals_PV" class="patient_vitals_PV"><?= $Grid->renderSort($Grid->PV) ?></div></th>
<?php } ?>
<?php if ($Grid->clinicaldetails->Visible) { // clinicaldetails ?>
        <th data-name="clinicaldetails" class="<?= $Grid->clinicaldetails->headerCellClass() ?>"><div id="elh_patient_vitals_clinicaldetails" class="patient_vitals_clinicaldetails"><?= $Grid->renderSort($Grid->clinicaldetails) ?></div></th>
<?php } ?>
<?php if ($Grid->status->Visible) { // status ?>
        <th data-name="status" class="<?= $Grid->status->headerCellClass() ?>"><div id="elh_patient_vitals_status" class="patient_vitals_status"><?= $Grid->renderSort($Grid->status) ?></div></th>
<?php } ?>
<?php if ($Grid->createdby->Visible) { // createdby ?>
        <th data-name="createdby" class="<?= $Grid->createdby->headerCellClass() ?>"><div id="elh_patient_vitals_createdby" class="patient_vitals_createdby"><?= $Grid->renderSort($Grid->createdby) ?></div></th>
<?php } ?>
<?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <th data-name="createddatetime" class="<?= $Grid->createddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_createddatetime" class="patient_vitals_createddatetime"><?= $Grid->renderSort($Grid->createddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <th data-name="modifiedby" class="<?= $Grid->modifiedby->headerCellClass() ?>"><div id="elh_patient_vitals_modifiedby" class="patient_vitals_modifiedby"><?= $Grid->renderSort($Grid->modifiedby) ?></div></th>
<?php } ?>
<?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <th data-name="modifieddatetime" class="<?= $Grid->modifieddatetime->headerCellClass() ?>"><div id="elh_patient_vitals_modifieddatetime" class="patient_vitals_modifieddatetime"><?= $Grid->renderSort($Grid->modifieddatetime) ?></div></th>
<?php } ?>
<?php if ($Grid->Age->Visible) { // Age ?>
        <th data-name="Age" class="<?= $Grid->Age->headerCellClass() ?>"><div id="elh_patient_vitals_Age" class="patient_vitals_Age"><?= $Grid->renderSort($Grid->Age) ?></div></th>
<?php } ?>
<?php if ($Grid->Gender->Visible) { // Gender ?>
        <th data-name="Gender" class="<?= $Grid->Gender->headerCellClass() ?>"><div id="elh_patient_vitals_Gender" class="patient_vitals_Gender"><?= $Grid->renderSort($Grid->Gender) ?></div></th>
<?php } ?>
<?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <th data-name="PatientId" class="<?= $Grid->PatientId->headerCellClass() ?>"><div id="elh_patient_vitals_PatientId" class="patient_vitals_PatientId"><?= $Grid->renderSort($Grid->PatientId) ?></div></th>
<?php } ?>
<?php if ($Grid->Reception->Visible) { // Reception ?>
        <th data-name="Reception" class="<?= $Grid->Reception->headerCellClass() ?>"><div id="elh_patient_vitals_Reception" class="patient_vitals_Reception"><?= $Grid->renderSort($Grid->Reception) ?></div></th>
<?php } ?>
<?php if ($Grid->HospID->Visible) { // HospID ?>
        <th data-name="HospID" class="<?= $Grid->HospID->headerCellClass() ?>"><div id="elh_patient_vitals_HospID" class="patient_vitals_HospID"><?= $Grid->renderSort($Grid->HospID) ?></div></th>
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowCount, "id" => "r" . $Grid->RowCount . "_patient_vitals", "data-rowtype" => $Grid->RowType]);

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
<span id="el<?= $Grid->RowCount ?>_patient_vitals_id" class="form-group"></span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_id" class="form-group">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_id">
<span<?= $Grid->id->viewAttributes() ?>>
<?= $Grid->id->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_id" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_id" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_id" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } else { ?>
            <input type="hidden" data-table="patient_vitals" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->CurrentValue) ?>">
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno" <?= $Grid->mrnno->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_mrnno" class="form-group">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_vitals" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_mrnno" class="form-group">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<?= $Grid->mrnno->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_mrnno" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_mrnno" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName" <?= $Grid->PatientName->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatientName" class="form-group">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatientName" class="form-group">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<?= $Grid->PatientName->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PatientName" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PatientName" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID" <?= $Grid->PatID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatID" class="form-group">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatID" class="form-group">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<?= $Grid->PatID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PatID" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PatID" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber" <?= $Grid->MobileNumber->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_MobileNumber" class="form-group">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<?= $Grid->MobileNumber->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_MobileNumber" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_MobileNumber" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HT->Visible) { // HT ?>
        <td data-name="HT" <?= $Grid->HT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_HT" class="form-group">
<input type="<?= $Grid->HT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_HT" name="x<?= $Grid->RowIndex ?>_HT" id="x<?= $Grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->HT->getPlaceHolder()) ?>" value="<?= $Grid->HT->EditValue ?>"<?= $Grid->HT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HT" id="o<?= $Grid->RowIndex ?>_HT" value="<?= HtmlEncode($Grid->HT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_HT" class="form-group">
<input type="<?= $Grid->HT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_HT" name="x<?= $Grid->RowIndex ?>_HT" id="x<?= $Grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->HT->getPlaceHolder()) ?>" value="<?= $Grid->HT->EditValue ?>"<?= $Grid->HT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_HT">
<span<?= $Grid->HT->viewAttributes() ?>>
<?= $Grid->HT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_HT" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_HT" value="<?= HtmlEncode($Grid->HT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HT" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_HT" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_HT" value="<?= HtmlEncode($Grid->HT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->WT->Visible) { // WT ?>
        <td data-name="WT" <?= $Grid->WT->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_WT" class="form-group">
<input type="<?= $Grid->WT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_WT" name="x<?= $Grid->RowIndex ?>_WT" id="x<?= $Grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->WT->getPlaceHolder()) ?>" value="<?= $Grid->WT->EditValue ?>"<?= $Grid->WT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WT->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_WT" id="o<?= $Grid->RowIndex ?>_WT" value="<?= HtmlEncode($Grid->WT->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_WT" class="form-group">
<input type="<?= $Grid->WT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_WT" name="x<?= $Grid->RowIndex ?>_WT" id="x<?= $Grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->WT->getPlaceHolder()) ?>" value="<?= $Grid->WT->EditValue ?>"<?= $Grid->WT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WT->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_WT">
<span<?= $Grid->WT->viewAttributes() ?>>
<?= $Grid->WT->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_WT" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_WT" value="<?= HtmlEncode($Grid->WT->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_WT" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_WT" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_WT" value="<?= HtmlEncode($Grid->WT->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->SurfaceArea->Visible) { // SurfaceArea ?>
        <td data-name="SurfaceArea" <?= $Grid->SurfaceArea->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_SurfaceArea" class="form-group">
<input type="<?= $Grid->SurfaceArea->getInputTextType() ?>" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?= $Grid->RowIndex ?>_SurfaceArea" id="x<?= $Grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SurfaceArea->getPlaceHolder()) ?>" value="<?= $Grid->SurfaceArea->EditValue ?>"<?= $Grid->SurfaceArea->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SurfaceArea->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SurfaceArea" id="o<?= $Grid->RowIndex ?>_SurfaceArea" value="<?= HtmlEncode($Grid->SurfaceArea->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_SurfaceArea" class="form-group">
<input type="<?= $Grid->SurfaceArea->getInputTextType() ?>" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?= $Grid->RowIndex ?>_SurfaceArea" id="x<?= $Grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SurfaceArea->getPlaceHolder()) ?>" value="<?= $Grid->SurfaceArea->EditValue ?>"<?= $Grid->SurfaceArea->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SurfaceArea->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_SurfaceArea">
<span<?= $Grid->SurfaceArea->viewAttributes() ?>>
<?= $Grid->SurfaceArea->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_SurfaceArea" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_SurfaceArea" value="<?= HtmlEncode($Grid->SurfaceArea->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_SurfaceArea" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_SurfaceArea" value="<?= HtmlEncode($Grid->SurfaceArea->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BodyMassIndex->Visible) { // BodyMassIndex ?>
        <td data-name="BodyMassIndex" <?= $Grid->BodyMassIndex->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_BodyMassIndex" class="form-group">
<input type="<?= $Grid->BodyMassIndex->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?= $Grid->RowIndex ?>_BodyMassIndex" id="x<?= $Grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BodyMassIndex->getPlaceHolder()) ?>" value="<?= $Grid->BodyMassIndex->EditValue ?>"<?= $Grid->BodyMassIndex->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BodyMassIndex->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BodyMassIndex" id="o<?= $Grid->RowIndex ?>_BodyMassIndex" value="<?= HtmlEncode($Grid->BodyMassIndex->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_BodyMassIndex" class="form-group">
<input type="<?= $Grid->BodyMassIndex->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?= $Grid->RowIndex ?>_BodyMassIndex" id="x<?= $Grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BodyMassIndex->getPlaceHolder()) ?>" value="<?= $Grid->BodyMassIndex->EditValue ?>"<?= $Grid->BodyMassIndex->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BodyMassIndex->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_BodyMassIndex">
<span<?= $Grid->BodyMassIndex->viewAttributes() ?>>
<?= $Grid->BodyMassIndex->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_BodyMassIndex" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_BodyMassIndex" value="<?= HtmlEncode($Grid->BodyMassIndex->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_BodyMassIndex" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_BodyMassIndex" value="<?= HtmlEncode($Grid->BodyMassIndex->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
        <td data-name="AnticoagulantifAny" <?= $Grid->AnticoagulantifAny->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_AnticoagulantifAny" class="form-group">
<?php
$onchange = $Grid->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Grid->AnticoagulantifAny->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= RemoveHtml($Grid->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AnticoagulantifAny->getPlaceHolder()) ?>"<?= $Grid->AnticoagulantifAny->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Grid->AnticoagulantifAny->ReadOnly || $Grid->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-input="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="x<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= HtmlEncode($Grid->AnticoagulantifAny->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AnticoagulantifAny->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_vitalsgrid"], function() {
    fpatient_vitalsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true}, ew.vars.tables.patient_vitals.fields.AnticoagulantifAny.autoSuggestOptions));
});
</script>
<?= $Grid->AnticoagulantifAny->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="o<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= HtmlEncode($Grid->AnticoagulantifAny->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_AnticoagulantifAny" class="form-group">
<?php
$onchange = $Grid->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Grid->AnticoagulantifAny->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= RemoveHtml($Grid->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AnticoagulantifAny->getPlaceHolder()) ?>"<?= $Grid->AnticoagulantifAny->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Grid->AnticoagulantifAny->ReadOnly || $Grid->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-input="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="x<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= HtmlEncode($Grid->AnticoagulantifAny->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AnticoagulantifAny->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_vitalsgrid"], function() {
    fpatient_vitalsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true}, ew.vars.tables.patient_vitals.fields.AnticoagulantifAny.autoSuggestOptions));
});
</script>
<?= $Grid->AnticoagulantifAny->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_AnticoagulantifAny">
<span<?= $Grid->AnticoagulantifAny->viewAttributes() ?>>
<?= $Grid->AnticoagulantifAny->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= HtmlEncode($Grid->AnticoagulantifAny->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= HtmlEncode($Grid->AnticoagulantifAny->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->FoodAllergies->Visible) { // FoodAllergies ?>
        <td data-name="FoodAllergies" <?= $Grid->FoodAllergies->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_FoodAllergies" class="form-group">
<input type="<?= $Grid->FoodAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?= $Grid->RowIndex ?>_FoodAllergies" id="x<?= $Grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->FoodAllergies->getPlaceHolder()) ?>" value="<?= $Grid->FoodAllergies->EditValue ?>"<?= $Grid->FoodAllergies->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FoodAllergies->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FoodAllergies" id="o<?= $Grid->RowIndex ?>_FoodAllergies" value="<?= HtmlEncode($Grid->FoodAllergies->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_FoodAllergies" class="form-group">
<input type="<?= $Grid->FoodAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?= $Grid->RowIndex ?>_FoodAllergies" id="x<?= $Grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->FoodAllergies->getPlaceHolder()) ?>" value="<?= $Grid->FoodAllergies->EditValue ?>"<?= $Grid->FoodAllergies->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FoodAllergies->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_FoodAllergies">
<span<?= $Grid->FoodAllergies->viewAttributes() ?>>
<?= $Grid->FoodAllergies->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_FoodAllergies" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_FoodAllergies" value="<?= HtmlEncode($Grid->FoodAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_FoodAllergies" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_FoodAllergies" value="<?= HtmlEncode($Grid->FoodAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GenericAllergies->Visible) { // GenericAllergies ?>
        <td data-name="GenericAllergies" <?= $Grid->GenericAllergies->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_GenericAllergies" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_GenericAllergies"><?= EmptyValue(strval($Grid->GenericAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->GenericAllergies->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->GenericAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->GenericAllergies->ReadOnly || $Grid->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->GenericAllergies->getErrorMessage() ?></div>
<?= $Grid->GenericAllergies->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GenericAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Grid->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_GenericAllergies[]" id="x<?= $Grid->RowIndex ?>_GenericAllergies[]" value="<?= $Grid->GenericAllergies->CurrentValue ?>"<?= $Grid->GenericAllergies->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GenericAllergies[]" id="o<?= $Grid->RowIndex ?>_GenericAllergies[]" value="<?= HtmlEncode($Grid->GenericAllergies->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_GenericAllergies" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_GenericAllergies"><?= EmptyValue(strval($Grid->GenericAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->GenericAllergies->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->GenericAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->GenericAllergies->ReadOnly || $Grid->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->GenericAllergies->getErrorMessage() ?></div>
<?= $Grid->GenericAllergies->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GenericAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Grid->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_GenericAllergies[]" id="x<?= $Grid->RowIndex ?>_GenericAllergies[]" value="<?= $Grid->GenericAllergies->CurrentValue ?>"<?= $Grid->GenericAllergies->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_GenericAllergies">
<span<?= $Grid->GenericAllergies->viewAttributes() ?>>
<?= $Grid->GenericAllergies->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_GenericAllergies" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_GenericAllergies" value="<?= HtmlEncode($Grid->GenericAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_GenericAllergies[]" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_GenericAllergies[]" value="<?= HtmlEncode($Grid->GenericAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->GroupAllergies->Visible) { // GroupAllergies ?>
        <td data-name="GroupAllergies" <?= $Grid->GroupAllergies->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_GroupAllergies" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_GroupAllergies"><?= EmptyValue(strval($Grid->GroupAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->GroupAllergies->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->GroupAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->GroupAllergies->ReadOnly || $Grid->GroupAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->GroupAllergies->getErrorMessage() ?></div>
<?= $Grid->GroupAllergies->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GroupAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Grid->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_GroupAllergies[]" id="x<?= $Grid->RowIndex ?>_GroupAllergies[]" value="<?= $Grid->GroupAllergies->CurrentValue ?>"<?= $Grid->GroupAllergies->editAttributes() ?>>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GroupAllergies[]" id="o<?= $Grid->RowIndex ?>_GroupAllergies[]" value="<?= HtmlEncode($Grid->GroupAllergies->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_GroupAllergies" class="form-group">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_GroupAllergies"><?= EmptyValue(strval($Grid->GroupAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->GroupAllergies->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->GroupAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->GroupAllergies->ReadOnly || $Grid->GroupAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->GroupAllergies->getErrorMessage() ?></div>
<?= $Grid->GroupAllergies->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GroupAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Grid->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_GroupAllergies[]" id="x<?= $Grid->RowIndex ?>_GroupAllergies[]" value="<?= $Grid->GroupAllergies->CurrentValue ?>"<?= $Grid->GroupAllergies->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_GroupAllergies">
<span<?= $Grid->GroupAllergies->viewAttributes() ?>>
<?= $Grid->GroupAllergies->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_GroupAllergies" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_GroupAllergies" value="<?= HtmlEncode($Grid->GroupAllergies->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_GroupAllergies[]" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_GroupAllergies[]" value="<?= HtmlEncode($Grid->GroupAllergies->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Temp->Visible) { // Temp ?>
        <td data-name="Temp" <?= $Grid->Temp->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Temp" class="form-group">
<input type="<?= $Grid->Temp->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Temp" name="x<?= $Grid->RowIndex ?>_Temp" id="x<?= $Grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Temp->getPlaceHolder()) ?>" value="<?= $Grid->Temp->EditValue ?>"<?= $Grid->Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Temp->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Temp" id="o<?= $Grid->RowIndex ?>_Temp" value="<?= HtmlEncode($Grid->Temp->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Temp" class="form-group">
<input type="<?= $Grid->Temp->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Temp" name="x<?= $Grid->RowIndex ?>_Temp" id="x<?= $Grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Temp->getPlaceHolder()) ?>" value="<?= $Grid->Temp->EditValue ?>"<?= $Grid->Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Temp->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Temp">
<span<?= $Grid->Temp->viewAttributes() ?>>
<?= $Grid->Temp->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Temp" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Temp" value="<?= HtmlEncode($Grid->Temp->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Temp" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Temp" value="<?= HtmlEncode($Grid->Temp->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Pulse->Visible) { // Pulse ?>
        <td data-name="Pulse" <?= $Grid->Pulse->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Pulse" class="form-group">
<input type="<?= $Grid->Pulse->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Pulse" name="x<?= $Grid->RowIndex ?>_Pulse" id="x<?= $Grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pulse->getPlaceHolder()) ?>" value="<?= $Grid->Pulse->EditValue ?>"<?= $Grid->Pulse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pulse->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pulse" id="o<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Pulse" class="form-group">
<input type="<?= $Grid->Pulse->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Pulse" name="x<?= $Grid->RowIndex ?>_Pulse" id="x<?= $Grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pulse->getPlaceHolder()) ?>" value="<?= $Grid->Pulse->EditValue ?>"<?= $Grid->Pulse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pulse->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Pulse">
<span<?= $Grid->Pulse->viewAttributes() ?>>
<?= $Grid->Pulse->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Pulse" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Pulse" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->BP->Visible) { // BP ?>
        <td data-name="BP" <?= $Grid->BP->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_BP" class="form-group">
<input type="<?= $Grid->BP->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BP" name="x<?= $Grid->RowIndex ?>_BP" id="x<?= $Grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BP->getPlaceHolder()) ?>" value="<?= $Grid->BP->EditValue ?>"<?= $Grid->BP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BP->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BP" id="o<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_BP" class="form-group">
<input type="<?= $Grid->BP->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BP" name="x<?= $Grid->RowIndex ?>_BP" id="x<?= $Grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BP->getPlaceHolder()) ?>" value="<?= $Grid->BP->EditValue ?>"<?= $Grid->BP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BP->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_BP">
<span<?= $Grid->BP->viewAttributes() ?>>
<?= $Grid->BP->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_BP" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_BP" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_BP" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PR->Visible) { // PR ?>
        <td data-name="PR" <?= $Grid->PR->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PR" class="form-group">
<input type="<?= $Grid->PR->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PR" name="x<?= $Grid->RowIndex ?>_PR" id="x<?= $Grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PR->getPlaceHolder()) ?>" value="<?= $Grid->PR->EditValue ?>"<?= $Grid->PR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PR->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PR" id="o<?= $Grid->RowIndex ?>_PR" value="<?= HtmlEncode($Grid->PR->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PR" class="form-group">
<input type="<?= $Grid->PR->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PR" name="x<?= $Grid->RowIndex ?>_PR" id="x<?= $Grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PR->getPlaceHolder()) ?>" value="<?= $Grid->PR->EditValue ?>"<?= $Grid->PR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PR->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PR">
<span<?= $Grid->PR->viewAttributes() ?>>
<?= $Grid->PR->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PR" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PR" value="<?= HtmlEncode($Grid->PR->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PR" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PR" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PR" value="<?= HtmlEncode($Grid->PR->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CNS->Visible) { // CNS ?>
        <td data-name="CNS" <?= $Grid->CNS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_CNS" class="form-group">
<input type="<?= $Grid->CNS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CNS" name="x<?= $Grid->RowIndex ?>_CNS" id="x<?= $Grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CNS->getPlaceHolder()) ?>" value="<?= $Grid->CNS->EditValue ?>"<?= $Grid->CNS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CNS->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CNS" id="o<?= $Grid->RowIndex ?>_CNS" value="<?= HtmlEncode($Grid->CNS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_CNS" class="form-group">
<input type="<?= $Grid->CNS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CNS" name="x<?= $Grid->RowIndex ?>_CNS" id="x<?= $Grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CNS->getPlaceHolder()) ?>" value="<?= $Grid->CNS->EditValue ?>"<?= $Grid->CNS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CNS->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_CNS">
<span<?= $Grid->CNS->viewAttributes() ?>>
<?= $Grid->CNS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_CNS" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_CNS" value="<?= HtmlEncode($Grid->CNS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_CNS" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_CNS" value="<?= HtmlEncode($Grid->CNS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->RSA->Visible) { // RSA ?>
        <td data-name="RSA" <?= $Grid->RSA->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_RSA" class="form-group">
<input type="<?= $Grid->RSA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_RSA" name="x<?= $Grid->RowIndex ?>_RSA" id="x<?= $Grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RSA->getPlaceHolder()) ?>" value="<?= $Grid->RSA->EditValue ?>"<?= $Grid->RSA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RSA->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RSA" id="o<?= $Grid->RowIndex ?>_RSA" value="<?= HtmlEncode($Grid->RSA->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_RSA" class="form-group">
<input type="<?= $Grid->RSA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_RSA" name="x<?= $Grid->RowIndex ?>_RSA" id="x<?= $Grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RSA->getPlaceHolder()) ?>" value="<?= $Grid->RSA->EditValue ?>"<?= $Grid->RSA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RSA->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_RSA">
<span<?= $Grid->RSA->viewAttributes() ?>>
<?= $Grid->RSA->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_RSA" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_RSA" value="<?= HtmlEncode($Grid->RSA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_RSA" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_RSA" value="<?= HtmlEncode($Grid->RSA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->CVS->Visible) { // CVS ?>
        <td data-name="CVS" <?= $Grid->CVS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_CVS" class="form-group">
<input type="<?= $Grid->CVS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CVS" name="x<?= $Grid->RowIndex ?>_CVS" id="x<?= $Grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CVS->getPlaceHolder()) ?>" value="<?= $Grid->CVS->EditValue ?>"<?= $Grid->CVS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CVS->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CVS" id="o<?= $Grid->RowIndex ?>_CVS" value="<?= HtmlEncode($Grid->CVS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_CVS" class="form-group">
<input type="<?= $Grid->CVS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CVS" name="x<?= $Grid->RowIndex ?>_CVS" id="x<?= $Grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CVS->getPlaceHolder()) ?>" value="<?= $Grid->CVS->EditValue ?>"<?= $Grid->CVS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CVS->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_CVS">
<span<?= $Grid->CVS->viewAttributes() ?>>
<?= $Grid->CVS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_CVS" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_CVS" value="<?= HtmlEncode($Grid->CVS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_CVS" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_CVS" value="<?= HtmlEncode($Grid->CVS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PA->Visible) { // PA ?>
        <td data-name="PA" <?= $Grid->PA->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PA" class="form-group">
<input type="<?= $Grid->PA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PA" name="x<?= $Grid->RowIndex ?>_PA" id="x<?= $Grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PA->getPlaceHolder()) ?>" value="<?= $Grid->PA->EditValue ?>"<?= $Grid->PA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PA->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PA" id="o<?= $Grid->RowIndex ?>_PA" value="<?= HtmlEncode($Grid->PA->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PA" class="form-group">
<input type="<?= $Grid->PA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PA" name="x<?= $Grid->RowIndex ?>_PA" id="x<?= $Grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PA->getPlaceHolder()) ?>" value="<?= $Grid->PA->EditValue ?>"<?= $Grid->PA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PA->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PA">
<span<?= $Grid->PA->viewAttributes() ?>>
<?= $Grid->PA->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PA" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PA" value="<?= HtmlEncode($Grid->PA->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PA" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PA" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PA" value="<?= HtmlEncode($Grid->PA->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PS->Visible) { // PS ?>
        <td data-name="PS" <?= $Grid->PS->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PS" class="form-group">
<input type="<?= $Grid->PS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PS" name="x<?= $Grid->RowIndex ?>_PS" id="x<?= $Grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PS->getPlaceHolder()) ?>" value="<?= $Grid->PS->EditValue ?>"<?= $Grid->PS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PS->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PS" id="o<?= $Grid->RowIndex ?>_PS" value="<?= HtmlEncode($Grid->PS->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PS" class="form-group">
<input type="<?= $Grid->PS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PS" name="x<?= $Grid->RowIndex ?>_PS" id="x<?= $Grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PS->getPlaceHolder()) ?>" value="<?= $Grid->PS->EditValue ?>"<?= $Grid->PS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PS->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PS">
<span<?= $Grid->PS->viewAttributes() ?>>
<?= $Grid->PS->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PS" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PS" value="<?= HtmlEncode($Grid->PS->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PS" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PS" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PS" value="<?= HtmlEncode($Grid->PS->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PV->Visible) { // PV ?>
        <td data-name="PV" <?= $Grid->PV->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PV" class="form-group">
<input type="<?= $Grid->PV->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PV" name="x<?= $Grid->RowIndex ?>_PV" id="x<?= $Grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PV->getPlaceHolder()) ?>" value="<?= $Grid->PV->EditValue ?>"<?= $Grid->PV->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PV->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PV" id="o<?= $Grid->RowIndex ?>_PV" value="<?= HtmlEncode($Grid->PV->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PV" class="form-group">
<input type="<?= $Grid->PV->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PV" name="x<?= $Grid->RowIndex ?>_PV" id="x<?= $Grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PV->getPlaceHolder()) ?>" value="<?= $Grid->PV->EditValue ?>"<?= $Grid->PV->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PV->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PV">
<span<?= $Grid->PV->viewAttributes() ?>>
<?= $Grid->PV->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PV" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PV" value="<?= HtmlEncode($Grid->PV->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PV" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PV" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PV" value="<?= HtmlEncode($Grid->PV->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->clinicaldetails->Visible) { // clinicaldetails ?>
        <td data-name="clinicaldetails" <?= $Grid->clinicaldetails->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_clinicaldetails" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_clinicaldetails">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" name="x<?= $Grid->RowIndex ?>_clinicaldetails" id="x<?= $Grid->RowIndex ?>_clinicaldetails"<?= $Grid->clinicaldetails->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_clinicaldetails" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_clinicaldetails[]"
    name="x<?= $Grid->RowIndex ?>_clinicaldetails[]"
    value="<?= HtmlEncode($Grid->clinicaldetails->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_clinicaldetails"
    data-target="dsl_x<?= $Grid->RowIndex ?>_clinicaldetails"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->clinicaldetails->isInvalidClass() ?>"
    data-table="patient_vitals"
    data-field="x_clinicaldetails"
    data-value-separator="<?= $Grid->clinicaldetails->displayValueSeparatorAttribute() ?>"
    <?= $Grid->clinicaldetails->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->clinicaldetails->getErrorMessage() ?></div>
<?= $Grid->clinicaldetails->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_clinicaldetails") ?>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" data-hidden="1" name="o<?= $Grid->RowIndex ?>_clinicaldetails[]" id="o<?= $Grid->RowIndex ?>_clinicaldetails[]" value="<?= HtmlEncode($Grid->clinicaldetails->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_clinicaldetails" class="form-group">
<template id="tp_x<?= $Grid->RowIndex ?>_clinicaldetails">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" name="x<?= $Grid->RowIndex ?>_clinicaldetails" id="x<?= $Grid->RowIndex ?>_clinicaldetails"<?= $Grid->clinicaldetails->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_clinicaldetails" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_clinicaldetails[]"
    name="x<?= $Grid->RowIndex ?>_clinicaldetails[]"
    value="<?= HtmlEncode($Grid->clinicaldetails->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_clinicaldetails"
    data-target="dsl_x<?= $Grid->RowIndex ?>_clinicaldetails"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->clinicaldetails->isInvalidClass() ?>"
    data-table="patient_vitals"
    data-field="x_clinicaldetails"
    data-value-separator="<?= $Grid->clinicaldetails->displayValueSeparatorAttribute() ?>"
    <?= $Grid->clinicaldetails->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->clinicaldetails->getErrorMessage() ?></div>
<?= $Grid->clinicaldetails->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_clinicaldetails") ?>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_clinicaldetails">
<span<?= $Grid->clinicaldetails->viewAttributes() ?>>
<?= $Grid->clinicaldetails->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_clinicaldetails" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_clinicaldetails" value="<?= HtmlEncode($Grid->clinicaldetails->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_clinicaldetails[]" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_clinicaldetails[]" value="<?= HtmlEncode($Grid->clinicaldetails->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status" <?= $Grid->status->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_vitals_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_vitals"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_vitals_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_vitals_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_vitals.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_status" class="form-group">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_vitals_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_vitals"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_vitals_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_vitals_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_vitals.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_status">
<span<?= $Grid->status->viewAttributes() ?>>
<?= $Grid->status->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_status" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_status" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_status" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_status" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby" <?= $Grid->createdby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<?= $Grid->createdby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_createdby" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_createdby" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime" <?= $Grid->createddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<?= $Grid->createddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_createddatetime" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_createddatetime" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby" <?= $Grid->modifiedby->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<?= $Grid->modifiedby->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_modifiedby" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_modifiedby" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime" <?= $Grid->modifieddatetime->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<?= $Grid->modifieddatetime->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age" <?= $Grid->Age->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Age" class="form-group">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<?= $Grid->Age->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Age" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Age" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Age" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender" <?= $Grid->Gender->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Gender" class="form-group">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<?= $Grid->Gender->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Gender" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Gender" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId" <?= $Grid->PatientId->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->PatientId->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatientId" class="form-group">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatientId" class="form-group">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<?= $Grid->PatientId->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PatientId" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PatientId" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception" <?= $Grid->Reception->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Reception" class="form-group">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Reception" class="form-group">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<?= $Grid->Reception->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Reception" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Reception" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID" <?= $Grid->HospID->cellAttributes() ?>>
<?php if ($Grid->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php } ?>
<?php if ($Grid->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?= $Grid->RowCount ?>_patient_vitals_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<?= $Grid->HospID->getViewValue() ?></span>
</span>
<?php if ($Grid->isConfirm()) { ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" data-hidden="1" name="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_HospID" id="fpatient_vitalsgrid$x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" data-hidden="1" name="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_HospID" id="fpatient_vitalsgrid$o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
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
loadjs.ready(["fpatient_vitalsgrid","load"], function () {
    fpatient_vitalsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
        $Grid->RowAttrs->merge(["data-rowindex" => $Grid->RowIndex, "id" => "r0_patient_vitals", "data-rowtype" => ROWTYPE_ADD]);
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
<span id="el$rowindex$_patient_vitals_id" class="form-group patient_vitals_id"></span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_id" class="form-group patient_vitals_id">
<span<?= $Grid->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->id->getDisplayValue($Grid->id->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_id" data-hidden="1" name="x<?= $Grid->RowIndex ?>_id" id="x<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_id" data-hidden="1" name="o<?= $Grid->RowIndex ?>_id" id="o<?= $Grid->RowIndex ?>_id" value="<?= HtmlEncode($Grid->id->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->mrnno->Visible) { // mrnno ?>
        <td data-name="mrnno">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->mrnno->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<input type="<?= $Grid->mrnno->getInputTextType() ?>" data-table="patient_vitals" data-field="x_mrnno" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->mrnno->getPlaceHolder()) ?>" value="<?= $Grid->mrnno->EditValue ?>"<?= $Grid->mrnno->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->mrnno->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_mrnno" class="form-group patient_vitals_mrnno">
<span<?= $Grid->mrnno->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->mrnno->getDisplayValue($Grid->mrnno->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" data-hidden="1" name="x<?= $Grid->RowIndex ?>_mrnno" id="x<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_mrnno" data-hidden="1" name="o<?= $Grid->RowIndex ?>_mrnno" id="o<?= $Grid->RowIndex ?>_mrnno" value="<?= HtmlEncode($Grid->mrnno->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientName->Visible) { // PatientName ?>
        <td data-name="PatientName">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PatientName" class="form-group patient_vitals_PatientName">
<input type="<?= $Grid->PatientName->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientName" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientName->getPlaceHolder()) ?>" value="<?= $Grid->PatientName->EditValue ?>"<?= $Grid->PatientName->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientName->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientName" class="form-group patient_vitals_PatientName">
<span<?= $Grid->PatientName->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientName->getDisplayValue($Grid->PatientName->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientName" id="x<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientName" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientName" id="o<?= $Grid->RowIndex ?>_PatientName" value="<?= HtmlEncode($Grid->PatientName->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatID->Visible) { // PatID ?>
        <td data-name="PatID">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PatID" class="form-group patient_vitals_PatID">
<input type="<?= $Grid->PatID->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatID" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatID->getPlaceHolder()) ?>" value="<?= $Grid->PatID->EditValue ?>"<?= $Grid->PatID->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatID->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatID" class="form-group patient_vitals_PatID">
<span<?= $Grid->PatID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatID->getDisplayValue($Grid->PatID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatID" id="x<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatID" id="o<?= $Grid->RowIndex ?>_PatID" value="<?= HtmlEncode($Grid->PatID->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->MobileNumber->Visible) { // MobileNumber ?>
        <td data-name="MobileNumber">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_MobileNumber" class="form-group patient_vitals_MobileNumber">
<input type="<?= $Grid->MobileNumber->getInputTextType() ?>" data-table="patient_vitals" data-field="x_MobileNumber" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->MobileNumber->getPlaceHolder()) ?>" value="<?= $Grid->MobileNumber->EditValue ?>"<?= $Grid->MobileNumber->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->MobileNumber->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_MobileNumber" class="form-group patient_vitals_MobileNumber">
<span<?= $Grid->MobileNumber->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->MobileNumber->getDisplayValue($Grid->MobileNumber->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" data-hidden="1" name="x<?= $Grid->RowIndex ?>_MobileNumber" id="x<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_MobileNumber" data-hidden="1" name="o<?= $Grid->RowIndex ?>_MobileNumber" id="o<?= $Grid->RowIndex ?>_MobileNumber" value="<?= HtmlEncode($Grid->MobileNumber->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HT->Visible) { // HT ?>
        <td data-name="HT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_HT" class="form-group patient_vitals_HT">
<input type="<?= $Grid->HT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_HT" name="x<?= $Grid->RowIndex ?>_HT" id="x<?= $Grid->RowIndex ?>_HT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->HT->getPlaceHolder()) ?>" value="<?= $Grid->HT->EditValue ?>"<?= $Grid->HT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->HT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_HT" class="form-group patient_vitals_HT">
<span<?= $Grid->HT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HT->getDisplayValue($Grid->HT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HT" id="x<?= $Grid->RowIndex ?>_HT" value="<?= HtmlEncode($Grid->HT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HT" id="o<?= $Grid->RowIndex ?>_HT" value="<?= HtmlEncode($Grid->HT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->WT->Visible) { // WT ?>
        <td data-name="WT">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_WT" class="form-group patient_vitals_WT">
<input type="<?= $Grid->WT->getInputTextType() ?>" data-table="patient_vitals" data-field="x_WT" name="x<?= $Grid->RowIndex ?>_WT" id="x<?= $Grid->RowIndex ?>_WT" size="6" maxlength="6" placeholder="<?= HtmlEncode($Grid->WT->getPlaceHolder()) ?>" value="<?= $Grid->WT->EditValue ?>"<?= $Grid->WT->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->WT->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_WT" class="form-group patient_vitals_WT">
<span<?= $Grid->WT->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->WT->getDisplayValue($Grid->WT->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" data-hidden="1" name="x<?= $Grid->RowIndex ?>_WT" id="x<?= $Grid->RowIndex ?>_WT" value="<?= HtmlEncode($Grid->WT->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_WT" data-hidden="1" name="o<?= $Grid->RowIndex ?>_WT" id="o<?= $Grid->RowIndex ?>_WT" value="<?= HtmlEncode($Grid->WT->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->SurfaceArea->Visible) { // SurfaceArea ?>
        <td data-name="SurfaceArea">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_SurfaceArea" class="form-group patient_vitals_SurfaceArea">
<input type="<?= $Grid->SurfaceArea->getInputTextType() ?>" data-table="patient_vitals" data-field="x_SurfaceArea" name="x<?= $Grid->RowIndex ?>_SurfaceArea" id="x<?= $Grid->RowIndex ?>_SurfaceArea" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->SurfaceArea->getPlaceHolder()) ?>" value="<?= $Grid->SurfaceArea->EditValue ?>"<?= $Grid->SurfaceArea->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->SurfaceArea->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_SurfaceArea" class="form-group patient_vitals_SurfaceArea">
<span<?= $Grid->SurfaceArea->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->SurfaceArea->getDisplayValue($Grid->SurfaceArea->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" data-hidden="1" name="x<?= $Grid->RowIndex ?>_SurfaceArea" id="x<?= $Grid->RowIndex ?>_SurfaceArea" value="<?= HtmlEncode($Grid->SurfaceArea->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_SurfaceArea" data-hidden="1" name="o<?= $Grid->RowIndex ?>_SurfaceArea" id="o<?= $Grid->RowIndex ?>_SurfaceArea" value="<?= HtmlEncode($Grid->SurfaceArea->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BodyMassIndex->Visible) { // BodyMassIndex ?>
        <td data-name="BodyMassIndex">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_BodyMassIndex" class="form-group patient_vitals_BodyMassIndex">
<input type="<?= $Grid->BodyMassIndex->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BodyMassIndex" name="x<?= $Grid->RowIndex ?>_BodyMassIndex" id="x<?= $Grid->RowIndex ?>_BodyMassIndex" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BodyMassIndex->getPlaceHolder()) ?>" value="<?= $Grid->BodyMassIndex->EditValue ?>"<?= $Grid->BodyMassIndex->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BodyMassIndex->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_BodyMassIndex" class="form-group patient_vitals_BodyMassIndex">
<span<?= $Grid->BodyMassIndex->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BodyMassIndex->getDisplayValue($Grid->BodyMassIndex->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BodyMassIndex" id="x<?= $Grid->RowIndex ?>_BodyMassIndex" value="<?= HtmlEncode($Grid->BodyMassIndex->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BodyMassIndex" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BodyMassIndex" id="o<?= $Grid->RowIndex ?>_BodyMassIndex" value="<?= HtmlEncode($Grid->BodyMassIndex->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->AnticoagulantifAny->Visible) { // AnticoagulantifAny ?>
        <td data-name="AnticoagulantifAny">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_AnticoagulantifAny" class="form-group patient_vitals_AnticoagulantifAny">
<?php
$onchange = $Grid->AnticoagulantifAny->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$Grid->AnticoagulantifAny->EditAttrs["onchange"] = "";
?>
<span id="as_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" class="ew-auto-suggest">
    <div class="input-group flex-nowrap">
        <input type="<?= $Grid->AnticoagulantifAny->getInputTextType() ?>" class="form-control" name="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= RemoveHtml($Grid->AnticoagulantifAny->EditValue) ?>" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->AnticoagulantifAny->getPlaceHolder()) ?>" data-placeholder="<?= HtmlEncode($Grid->AnticoagulantifAny->getPlaceHolder()) ?>"<?= $Grid->AnticoagulantifAny->editAttributes() ?>>
        <div class="input-group-append">
            <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->AnticoagulantifAny->caption()), $Language->phrase("LookupLink", true))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_AnticoagulantifAny',m:0,n:10,srch:false});" class="ew-lookup-btn btn btn-default"<?= ($Grid->AnticoagulantifAny->ReadOnly || $Grid->AnticoagulantifAny->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
        </div>
    </div>
</span>
<input type="hidden" is="selection-list" class="form-control" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-input="sv_x<?= $Grid->RowIndex ?>_AnticoagulantifAny" data-type="text" data-multiple="0" data-lookup="1" data-value-separator="<?= $Grid->AnticoagulantifAny->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="x<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= HtmlEncode($Grid->AnticoagulantifAny->CurrentValue) ?>"<?= $onchange ?>>
<div class="invalid-feedback"><?= $Grid->AnticoagulantifAny->getErrorMessage() ?></div>
<script>
loadjs.ready(["fpatient_vitalsgrid"], function() {
    fpatient_vitalsgrid.createAutoSuggest(Object.assign({"id":"x<?= $Grid->RowIndex ?>_AnticoagulantifAny","forceSelect":true}, ew.vars.tables.patient_vitals.fields.AnticoagulantifAny.autoSuggestOptions));
});
</script>
<?= $Grid->AnticoagulantifAny->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_AnticoagulantifAny") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_AnticoagulantifAny" class="form-group patient_vitals_AnticoagulantifAny">
<span<?= $Grid->AnticoagulantifAny->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->AnticoagulantifAny->getDisplayValue($Grid->AnticoagulantifAny->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-hidden="1" name="x<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="x<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= HtmlEncode($Grid->AnticoagulantifAny->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_AnticoagulantifAny" data-hidden="1" name="o<?= $Grid->RowIndex ?>_AnticoagulantifAny" id="o<?= $Grid->RowIndex ?>_AnticoagulantifAny" value="<?= HtmlEncode($Grid->AnticoagulantifAny->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->FoodAllergies->Visible) { // FoodAllergies ?>
        <td data-name="FoodAllergies">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_FoodAllergies" class="form-group patient_vitals_FoodAllergies">
<input type="<?= $Grid->FoodAllergies->getInputTextType() ?>" data-table="patient_vitals" data-field="x_FoodAllergies" name="x<?= $Grid->RowIndex ?>_FoodAllergies" id="x<?= $Grid->RowIndex ?>_FoodAllergies" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->FoodAllergies->getPlaceHolder()) ?>" value="<?= $Grid->FoodAllergies->EditValue ?>"<?= $Grid->FoodAllergies->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->FoodAllergies->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_FoodAllergies" class="form-group patient_vitals_FoodAllergies">
<span<?= $Grid->FoodAllergies->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->FoodAllergies->getDisplayValue($Grid->FoodAllergies->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" data-hidden="1" name="x<?= $Grid->RowIndex ?>_FoodAllergies" id="x<?= $Grid->RowIndex ?>_FoodAllergies" value="<?= HtmlEncode($Grid->FoodAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_FoodAllergies" data-hidden="1" name="o<?= $Grid->RowIndex ?>_FoodAllergies" id="o<?= $Grid->RowIndex ?>_FoodAllergies" value="<?= HtmlEncode($Grid->FoodAllergies->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GenericAllergies->Visible) { // GenericAllergies ?>
        <td data-name="GenericAllergies">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_GenericAllergies" class="form-group patient_vitals_GenericAllergies">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_GenericAllergies"><?= EmptyValue(strval($Grid->GenericAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->GenericAllergies->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->GenericAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->GenericAllergies->ReadOnly || $Grid->GenericAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_GenericAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->GenericAllergies->getErrorMessage() ?></div>
<?= $Grid->GenericAllergies->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_GenericAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GenericAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Grid->GenericAllergies->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_GenericAllergies[]" id="x<?= $Grid->RowIndex ?>_GenericAllergies[]" value="<?= $Grid->GenericAllergies->CurrentValue ?>"<?= $Grid->GenericAllergies->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_GenericAllergies" class="form-group patient_vitals_GenericAllergies">
<span<?= $Grid->GenericAllergies->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GenericAllergies->getDisplayValue($Grid->GenericAllergies->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GenericAllergies" id="x<?= $Grid->RowIndex ?>_GenericAllergies" value="<?= HtmlEncode($Grid->GenericAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GenericAllergies" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GenericAllergies[]" id="o<?= $Grid->RowIndex ?>_GenericAllergies[]" value="<?= HtmlEncode($Grid->GenericAllergies->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->GroupAllergies->Visible) { // GroupAllergies ?>
        <td data-name="GroupAllergies">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_GroupAllergies" class="form-group patient_vitals_GroupAllergies">
<div class="input-group ew-lookup-list">
    <div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?= $Grid->RowIndex ?>_GroupAllergies"><?= EmptyValue(strval($Grid->GroupAllergies->ViewValue)) ? $Language->phrase("PleaseSelect") : $Grid->GroupAllergies->ViewValue ?></div>
    <div class="input-group-append">
        <button type="button" title="<?= HtmlEncode(str_replace("%s", RemoveHtml($Grid->GroupAllergies->caption()), $Language->phrase("LookupLink", true))) ?>" class="ew-lookup-btn btn btn-default"<?= ($Grid->GroupAllergies->ReadOnly || $Grid->GroupAllergies->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?= $Grid->RowIndex ?>_GroupAllergies[]',m:1,n:10});"><i class="fas fa-search ew-icon"></i></button>
    </div>
</div>
<div class="invalid-feedback"><?= $Grid->GroupAllergies->getErrorMessage() ?></div>
<?= $Grid->GroupAllergies->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_GroupAllergies") ?>
<input type="hidden" is="selection-list" data-table="patient_vitals" data-field="x_GroupAllergies" data-type="text" data-multiple="1" data-lookup="1" data-value-separator="<?= $Grid->GroupAllergies->displayValueSeparatorAttribute() ?>" name="x<?= $Grid->RowIndex ?>_GroupAllergies[]" id="x<?= $Grid->RowIndex ?>_GroupAllergies[]" value="<?= $Grid->GroupAllergies->CurrentValue ?>"<?= $Grid->GroupAllergies->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_GroupAllergies" class="form-group patient_vitals_GroupAllergies">
<span<?= $Grid->GroupAllergies->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->GroupAllergies->getDisplayValue($Grid->GroupAllergies->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-hidden="1" name="x<?= $Grid->RowIndex ?>_GroupAllergies" id="x<?= $Grid->RowIndex ?>_GroupAllergies" value="<?= HtmlEncode($Grid->GroupAllergies->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_GroupAllergies" data-hidden="1" name="o<?= $Grid->RowIndex ?>_GroupAllergies[]" id="o<?= $Grid->RowIndex ?>_GroupAllergies[]" value="<?= HtmlEncode($Grid->GroupAllergies->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Temp->Visible) { // Temp ?>
        <td data-name="Temp">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Temp" class="form-group patient_vitals_Temp">
<input type="<?= $Grid->Temp->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Temp" name="x<?= $Grid->RowIndex ?>_Temp" id="x<?= $Grid->RowIndex ?>_Temp" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Temp->getPlaceHolder()) ?>" value="<?= $Grid->Temp->EditValue ?>"<?= $Grid->Temp->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Temp->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Temp" class="form-group patient_vitals_Temp">
<span<?= $Grid->Temp->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Temp->getDisplayValue($Grid->Temp->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Temp" id="x<?= $Grid->RowIndex ?>_Temp" value="<?= HtmlEncode($Grid->Temp->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Temp" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Temp" id="o<?= $Grid->RowIndex ?>_Temp" value="<?= HtmlEncode($Grid->Temp->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Pulse->Visible) { // Pulse ?>
        <td data-name="Pulse">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Pulse" class="form-group patient_vitals_Pulse">
<input type="<?= $Grid->Pulse->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Pulse" name="x<?= $Grid->RowIndex ?>_Pulse" id="x<?= $Grid->RowIndex ?>_Pulse" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Pulse->getPlaceHolder()) ?>" value="<?= $Grid->Pulse->EditValue ?>"<?= $Grid->Pulse->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Pulse->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Pulse" class="form-group patient_vitals_Pulse">
<span<?= $Grid->Pulse->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Pulse->getDisplayValue($Grid->Pulse->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Pulse" id="x<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Pulse" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Pulse" id="o<?= $Grid->RowIndex ?>_Pulse" value="<?= HtmlEncode($Grid->Pulse->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->BP->Visible) { // BP ?>
        <td data-name="BP">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_BP" class="form-group patient_vitals_BP">
<input type="<?= $Grid->BP->getInputTextType() ?>" data-table="patient_vitals" data-field="x_BP" name="x<?= $Grid->RowIndex ?>_BP" id="x<?= $Grid->RowIndex ?>_BP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->BP->getPlaceHolder()) ?>" value="<?= $Grid->BP->EditValue ?>"<?= $Grid->BP->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->BP->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_BP" class="form-group patient_vitals_BP">
<span<?= $Grid->BP->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->BP->getDisplayValue($Grid->BP->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" data-hidden="1" name="x<?= $Grid->RowIndex ?>_BP" id="x<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_BP" data-hidden="1" name="o<?= $Grid->RowIndex ?>_BP" id="o<?= $Grid->RowIndex ?>_BP" value="<?= HtmlEncode($Grid->BP->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PR->Visible) { // PR ?>
        <td data-name="PR">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PR" class="form-group patient_vitals_PR">
<input type="<?= $Grid->PR->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PR" name="x<?= $Grid->RowIndex ?>_PR" id="x<?= $Grid->RowIndex ?>_PR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PR->getPlaceHolder()) ?>" value="<?= $Grid->PR->EditValue ?>"<?= $Grid->PR->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PR->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PR" class="form-group patient_vitals_PR">
<span<?= $Grid->PR->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PR->getDisplayValue($Grid->PR->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PR" id="x<?= $Grid->RowIndex ?>_PR" value="<?= HtmlEncode($Grid->PR->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PR" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PR" id="o<?= $Grid->RowIndex ?>_PR" value="<?= HtmlEncode($Grid->PR->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CNS->Visible) { // CNS ?>
        <td data-name="CNS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_CNS" class="form-group patient_vitals_CNS">
<input type="<?= $Grid->CNS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CNS" name="x<?= $Grid->RowIndex ?>_CNS" id="x<?= $Grid->RowIndex ?>_CNS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CNS->getPlaceHolder()) ?>" value="<?= $Grid->CNS->EditValue ?>"<?= $Grid->CNS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CNS->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_CNS" class="form-group patient_vitals_CNS">
<span<?= $Grid->CNS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CNS->getDisplayValue($Grid->CNS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CNS" id="x<?= $Grid->RowIndex ?>_CNS" value="<?= HtmlEncode($Grid->CNS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CNS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CNS" id="o<?= $Grid->RowIndex ?>_CNS" value="<?= HtmlEncode($Grid->CNS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->RSA->Visible) { // RSA ?>
        <td data-name="RSA">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_RSA" class="form-group patient_vitals_RSA">
<input type="<?= $Grid->RSA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_RSA" name="x<?= $Grid->RowIndex ?>_RSA" id="x<?= $Grid->RowIndex ?>_RSA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->RSA->getPlaceHolder()) ?>" value="<?= $Grid->RSA->EditValue ?>"<?= $Grid->RSA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->RSA->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_RSA" class="form-group patient_vitals_RSA">
<span<?= $Grid->RSA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->RSA->getDisplayValue($Grid->RSA->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" data-hidden="1" name="x<?= $Grid->RowIndex ?>_RSA" id="x<?= $Grid->RowIndex ?>_RSA" value="<?= HtmlEncode($Grid->RSA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_RSA" data-hidden="1" name="o<?= $Grid->RowIndex ?>_RSA" id="o<?= $Grid->RowIndex ?>_RSA" value="<?= HtmlEncode($Grid->RSA->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->CVS->Visible) { // CVS ?>
        <td data-name="CVS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_CVS" class="form-group patient_vitals_CVS">
<input type="<?= $Grid->CVS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_CVS" name="x<?= $Grid->RowIndex ?>_CVS" id="x<?= $Grid->RowIndex ?>_CVS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->CVS->getPlaceHolder()) ?>" value="<?= $Grid->CVS->EditValue ?>"<?= $Grid->CVS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->CVS->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_CVS" class="form-group patient_vitals_CVS">
<span<?= $Grid->CVS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->CVS->getDisplayValue($Grid->CVS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_CVS" id="x<?= $Grid->RowIndex ?>_CVS" value="<?= HtmlEncode($Grid->CVS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_CVS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_CVS" id="o<?= $Grid->RowIndex ?>_CVS" value="<?= HtmlEncode($Grid->CVS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PA->Visible) { // PA ?>
        <td data-name="PA">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PA" class="form-group patient_vitals_PA">
<input type="<?= $Grid->PA->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PA" name="x<?= $Grid->RowIndex ?>_PA" id="x<?= $Grid->RowIndex ?>_PA" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PA->getPlaceHolder()) ?>" value="<?= $Grid->PA->EditValue ?>"<?= $Grid->PA->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PA->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PA" class="form-group patient_vitals_PA">
<span<?= $Grid->PA->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PA->getDisplayValue($Grid->PA->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PA" id="x<?= $Grid->RowIndex ?>_PA" value="<?= HtmlEncode($Grid->PA->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PA" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PA" id="o<?= $Grid->RowIndex ?>_PA" value="<?= HtmlEncode($Grid->PA->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PS->Visible) { // PS ?>
        <td data-name="PS">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PS" class="form-group patient_vitals_PS">
<input type="<?= $Grid->PS->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PS" name="x<?= $Grid->RowIndex ?>_PS" id="x<?= $Grid->RowIndex ?>_PS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PS->getPlaceHolder()) ?>" value="<?= $Grid->PS->EditValue ?>"<?= $Grid->PS->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PS->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PS" class="form-group patient_vitals_PS">
<span<?= $Grid->PS->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PS->getDisplayValue($Grid->PS->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PS" id="x<?= $Grid->RowIndex ?>_PS" value="<?= HtmlEncode($Grid->PS->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PS" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PS" id="o<?= $Grid->RowIndex ?>_PS" value="<?= HtmlEncode($Grid->PS->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PV->Visible) { // PV ?>
        <td data-name="PV">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_PV" class="form-group patient_vitals_PV">
<input type="<?= $Grid->PV->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PV" name="x<?= $Grid->RowIndex ?>_PV" id="x<?= $Grid->RowIndex ?>_PV" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PV->getPlaceHolder()) ?>" value="<?= $Grid->PV->EditValue ?>"<?= $Grid->PV->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PV->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PV" class="form-group patient_vitals_PV">
<span<?= $Grid->PV->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PV->getDisplayValue($Grid->PV->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PV" id="x<?= $Grid->RowIndex ?>_PV" value="<?= HtmlEncode($Grid->PV->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PV" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PV" id="o<?= $Grid->RowIndex ?>_PV" value="<?= HtmlEncode($Grid->PV->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->clinicaldetails->Visible) { // clinicaldetails ?>
        <td data-name="clinicaldetails">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_clinicaldetails" class="form-group patient_vitals_clinicaldetails">
<template id="tp_x<?= $Grid->RowIndex ?>_clinicaldetails">
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" data-table="patient_vitals" data-field="x_clinicaldetails" name="x<?= $Grid->RowIndex ?>_clinicaldetails" id="x<?= $Grid->RowIndex ?>_clinicaldetails"<?= $Grid->clinicaldetails->editAttributes() ?>>
        <label class="custom-control-label"></label>
    </div>
</template>
<div id="dsl_x<?= $Grid->RowIndex ?>_clinicaldetails" class="ew-item-list"></div>
<input type="hidden"
    is="selection-list"
    id="x<?= $Grid->RowIndex ?>_clinicaldetails[]"
    name="x<?= $Grid->RowIndex ?>_clinicaldetails[]"
    value="<?= HtmlEncode($Grid->clinicaldetails->CurrentValue) ?>"
    data-type="select-multiple"
    data-template="tp_x<?= $Grid->RowIndex ?>_clinicaldetails"
    data-target="dsl_x<?= $Grid->RowIndex ?>_clinicaldetails"
    data-repeatcolumn="5"
    class="form-control<?= $Grid->clinicaldetails->isInvalidClass() ?>"
    data-table="patient_vitals"
    data-field="x_clinicaldetails"
    data-value-separator="<?= $Grid->clinicaldetails->displayValueSeparatorAttribute() ?>"
    <?= $Grid->clinicaldetails->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->clinicaldetails->getErrorMessage() ?></div>
<?= $Grid->clinicaldetails->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_clinicaldetails") ?>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_clinicaldetails" class="form-group patient_vitals_clinicaldetails">
<span<?= $Grid->clinicaldetails->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->clinicaldetails->getDisplayValue($Grid->clinicaldetails->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" data-hidden="1" name="x<?= $Grid->RowIndex ?>_clinicaldetails" id="x<?= $Grid->RowIndex ?>_clinicaldetails" value="<?= HtmlEncode($Grid->clinicaldetails->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_clinicaldetails" data-hidden="1" name="o<?= $Grid->RowIndex ?>_clinicaldetails[]" id="o<?= $Grid->RowIndex ?>_clinicaldetails[]" value="<?= HtmlEncode($Grid->clinicaldetails->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->status->Visible) { // status ?>
        <td data-name="status">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_status" class="form-group patient_vitals_status">
    <select
        id="x<?= $Grid->RowIndex ?>_status"
        name="x<?= $Grid->RowIndex ?>_status"
        class="form-control ew-select<?= $Grid->status->isInvalidClass() ?>"
        data-select2-id="patient_vitals_x<?= $Grid->RowIndex ?>_status"
        data-table="patient_vitals"
        data-field="x_status"
        data-value-separator="<?= $Grid->status->displayValueSeparatorAttribute() ?>"
        data-placeholder="<?= HtmlEncode($Grid->status->getPlaceHolder()) ?>"
        <?= $Grid->status->editAttributes() ?>>
        <?= $Grid->status->selectOptionListHtml("x{$Grid->RowIndex}_status") ?>
    </select>
    <div class="invalid-feedback"><?= $Grid->status->getErrorMessage() ?></div>
<?= $Grid->status->Lookup->getParamTag($Grid, "p_x" . $Grid->RowIndex . "_status") ?>
<script>
loadjs.ready("head", function() {
    var el = document.querySelector("select[data-select2-id='patient_vitals_x<?= $Grid->RowIndex ?>_status']"),
        options = { name: "x<?= $Grid->RowIndex ?>_status", selectId: "patient_vitals_x<?= $Grid->RowIndex ?>_status", language: ew.LANGUAGE_ID, dir: ew.IS_RTL ? "rtl" : "ltr" };
    options.dropdownParent = $(el).closest("#ew-modal-dialog, #ew-add-opt-dialog")[0];
    Object.assign(options, ew.vars.tables.patient_vitals.fields.status.selectOptions);
    ew.createSelect(options);
});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_status" class="form-group patient_vitals_status">
<span<?= $Grid->status->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->status->getDisplayValue($Grid->status->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_status" data-hidden="1" name="x<?= $Grid->RowIndex ?>_status" id="x<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_status" data-hidden="1" name="o<?= $Grid->RowIndex ?>_status" id="o<?= $Grid->RowIndex ?>_status" value="<?= HtmlEncode($Grid->status->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createdby->Visible) { // createdby ?>
        <td data-name="createdby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_createdby" class="form-group patient_vitals_createdby">
<span<?= $Grid->createdby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createdby->getDisplayValue($Grid->createdby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createdby" id="x<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createdby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createdby" id="o<?= $Grid->RowIndex ?>_createdby" value="<?= HtmlEncode($Grid->createdby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->createddatetime->Visible) { // createddatetime ?>
        <td data-name="createddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_createddatetime" class="form-group patient_vitals_createddatetime">
<span<?= $Grid->createddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->createddatetime->getDisplayValue($Grid->createddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_createddatetime" id="x<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_createddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_createddatetime" id="o<?= $Grid->RowIndex ?>_createddatetime" value="<?= HtmlEncode($Grid->createddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifiedby->Visible) { // modifiedby ?>
        <td data-name="modifiedby">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_modifiedby" class="form-group patient_vitals_modifiedby">
<span<?= $Grid->modifiedby->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifiedby->getDisplayValue($Grid->modifiedby->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifiedby" id="x<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifiedby" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifiedby" id="o<?= $Grid->RowIndex ?>_modifiedby" value="<?= HtmlEncode($Grid->modifiedby->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->modifieddatetime->Visible) { // modifieddatetime ?>
        <td data-name="modifieddatetime">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_modifieddatetime" class="form-group patient_vitals_modifieddatetime">
<span<?= $Grid->modifieddatetime->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->modifieddatetime->getDisplayValue($Grid->modifieddatetime->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" data-hidden="1" name="x<?= $Grid->RowIndex ?>_modifieddatetime" id="x<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_modifieddatetime" data-hidden="1" name="o<?= $Grid->RowIndex ?>_modifieddatetime" id="o<?= $Grid->RowIndex ?>_modifieddatetime" value="<?= HtmlEncode($Grid->modifieddatetime->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Age->Visible) { // Age ?>
        <td data-name="Age">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Age" class="form-group patient_vitals_Age">
<input type="<?= $Grid->Age->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Age" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Age->getPlaceHolder()) ?>" value="<?= $Grid->Age->EditValue ?>"<?= $Grid->Age->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Age->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Age" class="form-group patient_vitals_Age">
<span<?= $Grid->Age->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Age->getDisplayValue($Grid->Age->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Age" id="x<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Age" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Age" id="o<?= $Grid->RowIndex ?>_Age" value="<?= HtmlEncode($Grid->Age->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Gender->Visible) { // Gender ?>
        <td data-name="Gender">
<?php if (!$Grid->isConfirm()) { ?>
<span id="el$rowindex$_patient_vitals_Gender" class="form-group patient_vitals_Gender">
<input type="<?= $Grid->Gender->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Gender" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->Gender->getPlaceHolder()) ?>" value="<?= $Grid->Gender->EditValue ?>"<?= $Grid->Gender->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Gender->getErrorMessage() ?></div>
</span>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Gender" class="form-group patient_vitals_Gender">
<span<?= $Grid->Gender->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Gender->getDisplayValue($Grid->Gender->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Gender" id="x<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Gender" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Gender" id="o<?= $Grid->RowIndex ?>_Gender" value="<?= HtmlEncode($Grid->Gender->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->PatientId->Visible) { // PatientId ?>
        <td data-name="PatientId">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->PatientId->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<input type="<?= $Grid->PatientId->getInputTextType() ?>" data-table="patient_vitals" data-field="x_PatientId" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" size="30" maxlength="45" placeholder="<?= HtmlEncode($Grid->PatientId->getPlaceHolder()) ?>" value="<?= $Grid->PatientId->EditValue ?>"<?= $Grid->PatientId->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->PatientId->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_PatientId" class="form-group patient_vitals_PatientId">
<span<?= $Grid->PatientId->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->PatientId->getDisplayValue($Grid->PatientId->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" data-hidden="1" name="x<?= $Grid->RowIndex ?>_PatientId" id="x<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_PatientId" data-hidden="1" name="o<?= $Grid->RowIndex ?>_PatientId" id="o<?= $Grid->RowIndex ?>_PatientId" value="<?= HtmlEncode($Grid->PatientId->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->Reception->Visible) { // Reception ?>
        <td data-name="Reception">
<?php if (!$Grid->isConfirm()) { ?>
<?php if ($Grid->Reception->getSessionValue() != "") { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" id="x<?= $Grid->RowIndex ?>_Reception" name="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->CurrentValue) ?>" data-hidden="1">
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<input type="<?= $Grid->Reception->getInputTextType() ?>" data-table="patient_vitals" data-field="x_Reception" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" size="30" placeholder="<?= HtmlEncode($Grid->Reception->getPlaceHolder()) ?>" value="<?= $Grid->Reception->EditValue ?>"<?= $Grid->Reception->editAttributes() ?>>
<div class="invalid-feedback"><?= $Grid->Reception->getErrorMessage() ?></div>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_Reception" class="form-group patient_vitals_Reception">
<span<?= $Grid->Reception->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->Reception->getDisplayValue($Grid->Reception->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" data-hidden="1" name="x<?= $Grid->RowIndex ?>_Reception" id="x<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_Reception" data-hidden="1" name="o<?= $Grid->RowIndex ?>_Reception" id="o<?= $Grid->RowIndex ?>_Reception" value="<?= HtmlEncode($Grid->Reception->OldValue) ?>">
</td>
    <?php } ?>
    <?php if ($Grid->HospID->Visible) { // HospID ?>
        <td data-name="HospID">
<?php if (!$Grid->isConfirm()) { ?>
<?php } else { ?>
<span id="el$rowindex$_patient_vitals_HospID" class="form-group patient_vitals_HospID">
<span<?= $Grid->HospID->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Grid->HospID->getDisplayValue($Grid->HospID->ViewValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" data-hidden="1" name="x<?= $Grid->RowIndex ?>_HospID" id="x<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="patient_vitals" data-field="x_HospID" data-hidden="1" name="o<?= $Grid->RowIndex ?>_HospID" id="o<?= $Grid->RowIndex ?>_HospID" value="<?= HtmlEncode($Grid->HospID->OldValue) ?>">
</td>
    <?php } ?>
<?php
// Render list options (body, right)
$Grid->ListOptions->render("body", "right", $Grid->RowIndex);
?>
<script>
loadjs.ready(["fpatient_vitalsgrid","load"], function() {
    fpatient_vitalsgrid.updateLists(<?= $Grid->RowIndex ?>);
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
<input type="hidden" name="detailpage" value="fpatient_vitalsgrid">
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
    ew.addEventHandlers("patient_vitals");
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
        container: "gmp_patient_vitals",
        width: "95%",
        height: ""
    });
});
</script>
<?php } ?>
<?php } ?>

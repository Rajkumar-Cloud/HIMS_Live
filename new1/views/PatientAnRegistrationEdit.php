<?php

namespace PHPMaker2021\project3;

// Page object
$PatientAnRegistrationEdit = &$Page;
?>
<script>
var currentForm, currentPageID;
var fpatient_an_registrationedit;
loadjs.ready("head", function () {
    var $ = jQuery;
    // Form object
    currentPageID = ew.PAGE_ID = "edit";
    fpatient_an_registrationedit = currentForm = new ew.Form("fpatient_an_registrationedit", "edit");

    // Add fields
    var fields = ew.vars.tables.patient_an_registration.fields;
    fpatient_an_registrationedit.addFields([
        ["id", [fields.id.required ? ew.Validators.required(fields.id.caption) : null], fields.id.isInvalid],
        ["pid", [fields.pid.required ? ew.Validators.required(fields.pid.caption) : null, ew.Validators.integer], fields.pid.isInvalid],
        ["fid", [fields.fid.required ? ew.Validators.required(fields.fid.caption) : null, ew.Validators.integer], fields.fid.isInvalid],
        ["G", [fields.G.required ? ew.Validators.required(fields.G.caption) : null], fields.G.isInvalid],
        ["P", [fields.P.required ? ew.Validators.required(fields.P.caption) : null], fields.P.isInvalid],
        ["L", [fields.L.required ? ew.Validators.required(fields.L.caption) : null], fields.L.isInvalid],
        ["A", [fields.A.required ? ew.Validators.required(fields.A.caption) : null], fields.A.isInvalid],
        ["E", [fields.E.required ? ew.Validators.required(fields.E.caption) : null], fields.E.isInvalid],
        ["M", [fields.M.required ? ew.Validators.required(fields.M.caption) : null], fields.M.isInvalid],
        ["LMP", [fields.LMP.required ? ew.Validators.required(fields.LMP.caption) : null], fields.LMP.isInvalid],
        ["EDO", [fields.EDO.required ? ew.Validators.required(fields.EDO.caption) : null], fields.EDO.isInvalid],
        ["MenstrualHistory", [fields.MenstrualHistory.required ? ew.Validators.required(fields.MenstrualHistory.caption) : null], fields.MenstrualHistory.isInvalid],
        ["MaritalHistory", [fields.MaritalHistory.required ? ew.Validators.required(fields.MaritalHistory.caption) : null], fields.MaritalHistory.isInvalid],
        ["ObstetricHistory", [fields.ObstetricHistory.required ? ew.Validators.required(fields.ObstetricHistory.caption) : null], fields.ObstetricHistory.isInvalid],
        ["PreviousHistoryofGDM", [fields.PreviousHistoryofGDM.required ? ew.Validators.required(fields.PreviousHistoryofGDM.caption) : null], fields.PreviousHistoryofGDM.isInvalid],
        ["PreviousHistorofPIH", [fields.PreviousHistorofPIH.required ? ew.Validators.required(fields.PreviousHistorofPIH.caption) : null], fields.PreviousHistorofPIH.isInvalid],
        ["PreviousHistoryofIUGR", [fields.PreviousHistoryofIUGR.required ? ew.Validators.required(fields.PreviousHistoryofIUGR.caption) : null], fields.PreviousHistoryofIUGR.isInvalid],
        ["PreviousHistoryofOligohydramnios", [fields.PreviousHistoryofOligohydramnios.required ? ew.Validators.required(fields.PreviousHistoryofOligohydramnios.caption) : null], fields.PreviousHistoryofOligohydramnios.isInvalid],
        ["PreviousHistoryofPreterm", [fields.PreviousHistoryofPreterm.required ? ew.Validators.required(fields.PreviousHistoryofPreterm.caption) : null], fields.PreviousHistoryofPreterm.isInvalid],
        ["G1", [fields.G1.required ? ew.Validators.required(fields.G1.caption) : null], fields.G1.isInvalid],
        ["G2", [fields.G2.required ? ew.Validators.required(fields.G2.caption) : null], fields.G2.isInvalid],
        ["G3", [fields.G3.required ? ew.Validators.required(fields.G3.caption) : null], fields.G3.isInvalid],
        ["DeliveryNDLSCS1", [fields.DeliveryNDLSCS1.required ? ew.Validators.required(fields.DeliveryNDLSCS1.caption) : null], fields.DeliveryNDLSCS1.isInvalid],
        ["DeliveryNDLSCS2", [fields.DeliveryNDLSCS2.required ? ew.Validators.required(fields.DeliveryNDLSCS2.caption) : null], fields.DeliveryNDLSCS2.isInvalid],
        ["DeliveryNDLSCS3", [fields.DeliveryNDLSCS3.required ? ew.Validators.required(fields.DeliveryNDLSCS3.caption) : null], fields.DeliveryNDLSCS3.isInvalid],
        ["BabySexweight1", [fields.BabySexweight1.required ? ew.Validators.required(fields.BabySexweight1.caption) : null], fields.BabySexweight1.isInvalid],
        ["BabySexweight2", [fields.BabySexweight2.required ? ew.Validators.required(fields.BabySexweight2.caption) : null], fields.BabySexweight2.isInvalid],
        ["BabySexweight3", [fields.BabySexweight3.required ? ew.Validators.required(fields.BabySexweight3.caption) : null], fields.BabySexweight3.isInvalid],
        ["PastMedicalHistory", [fields.PastMedicalHistory.required ? ew.Validators.required(fields.PastMedicalHistory.caption) : null], fields.PastMedicalHistory.isInvalid],
        ["PastSurgicalHistory", [fields.PastSurgicalHistory.required ? ew.Validators.required(fields.PastSurgicalHistory.caption) : null], fields.PastSurgicalHistory.isInvalid],
        ["FamilyHistory", [fields.FamilyHistory.required ? ew.Validators.required(fields.FamilyHistory.caption) : null], fields.FamilyHistory.isInvalid],
        ["Viability", [fields.Viability.required ? ew.Validators.required(fields.Viability.caption) : null], fields.Viability.isInvalid],
        ["ViabilityDATE", [fields.ViabilityDATE.required ? ew.Validators.required(fields.ViabilityDATE.caption) : null], fields.ViabilityDATE.isInvalid],
        ["ViabilityREPORT", [fields.ViabilityREPORT.required ? ew.Validators.required(fields.ViabilityREPORT.caption) : null], fields.ViabilityREPORT.isInvalid],
        ["Viability2", [fields.Viability2.required ? ew.Validators.required(fields.Viability2.caption) : null], fields.Viability2.isInvalid],
        ["Viability2DATE", [fields.Viability2DATE.required ? ew.Validators.required(fields.Viability2DATE.caption) : null], fields.Viability2DATE.isInvalid],
        ["Viability2REPORT", [fields.Viability2REPORT.required ? ew.Validators.required(fields.Viability2REPORT.caption) : null], fields.Viability2REPORT.isInvalid],
        ["NTscan", [fields.NTscan.required ? ew.Validators.required(fields.NTscan.caption) : null], fields.NTscan.isInvalid],
        ["NTscanDATE", [fields.NTscanDATE.required ? ew.Validators.required(fields.NTscanDATE.caption) : null], fields.NTscanDATE.isInvalid],
        ["NTscanREPORT", [fields.NTscanREPORT.required ? ew.Validators.required(fields.NTscanREPORT.caption) : null], fields.NTscanREPORT.isInvalid],
        ["EarlyTarget", [fields.EarlyTarget.required ? ew.Validators.required(fields.EarlyTarget.caption) : null], fields.EarlyTarget.isInvalid],
        ["EarlyTargetDATE", [fields.EarlyTargetDATE.required ? ew.Validators.required(fields.EarlyTargetDATE.caption) : null], fields.EarlyTargetDATE.isInvalid],
        ["EarlyTargetREPORT", [fields.EarlyTargetREPORT.required ? ew.Validators.required(fields.EarlyTargetREPORT.caption) : null], fields.EarlyTargetREPORT.isInvalid],
        ["Anomaly", [fields.Anomaly.required ? ew.Validators.required(fields.Anomaly.caption) : null], fields.Anomaly.isInvalid],
        ["AnomalyDATE", [fields.AnomalyDATE.required ? ew.Validators.required(fields.AnomalyDATE.caption) : null], fields.AnomalyDATE.isInvalid],
        ["AnomalyREPORT", [fields.AnomalyREPORT.required ? ew.Validators.required(fields.AnomalyREPORT.caption) : null], fields.AnomalyREPORT.isInvalid],
        ["Growth", [fields.Growth.required ? ew.Validators.required(fields.Growth.caption) : null], fields.Growth.isInvalid],
        ["GrowthDATE", [fields.GrowthDATE.required ? ew.Validators.required(fields.GrowthDATE.caption) : null], fields.GrowthDATE.isInvalid],
        ["GrowthREPORT", [fields.GrowthREPORT.required ? ew.Validators.required(fields.GrowthREPORT.caption) : null], fields.GrowthREPORT.isInvalid],
        ["Growth1", [fields.Growth1.required ? ew.Validators.required(fields.Growth1.caption) : null], fields.Growth1.isInvalid],
        ["Growth1DATE", [fields.Growth1DATE.required ? ew.Validators.required(fields.Growth1DATE.caption) : null], fields.Growth1DATE.isInvalid],
        ["Growth1REPORT", [fields.Growth1REPORT.required ? ew.Validators.required(fields.Growth1REPORT.caption) : null], fields.Growth1REPORT.isInvalid],
        ["ANProfile", [fields.ANProfile.required ? ew.Validators.required(fields.ANProfile.caption) : null], fields.ANProfile.isInvalid],
        ["ANProfileDATE", [fields.ANProfileDATE.required ? ew.Validators.required(fields.ANProfileDATE.caption) : null], fields.ANProfileDATE.isInvalid],
        ["ANProfileINHOUSE", [fields.ANProfileINHOUSE.required ? ew.Validators.required(fields.ANProfileINHOUSE.caption) : null], fields.ANProfileINHOUSE.isInvalid],
        ["ANProfileREPORT", [fields.ANProfileREPORT.required ? ew.Validators.required(fields.ANProfileREPORT.caption) : null], fields.ANProfileREPORT.isInvalid],
        ["DualMarker", [fields.DualMarker.required ? ew.Validators.required(fields.DualMarker.caption) : null], fields.DualMarker.isInvalid],
        ["DualMarkerDATE", [fields.DualMarkerDATE.required ? ew.Validators.required(fields.DualMarkerDATE.caption) : null], fields.DualMarkerDATE.isInvalid],
        ["DualMarkerINHOUSE", [fields.DualMarkerINHOUSE.required ? ew.Validators.required(fields.DualMarkerINHOUSE.caption) : null], fields.DualMarkerINHOUSE.isInvalid],
        ["DualMarkerREPORT", [fields.DualMarkerREPORT.required ? ew.Validators.required(fields.DualMarkerREPORT.caption) : null], fields.DualMarkerREPORT.isInvalid],
        ["Quadruple", [fields.Quadruple.required ? ew.Validators.required(fields.Quadruple.caption) : null], fields.Quadruple.isInvalid],
        ["QuadrupleDATE", [fields.QuadrupleDATE.required ? ew.Validators.required(fields.QuadrupleDATE.caption) : null], fields.QuadrupleDATE.isInvalid],
        ["QuadrupleINHOUSE", [fields.QuadrupleINHOUSE.required ? ew.Validators.required(fields.QuadrupleINHOUSE.caption) : null], fields.QuadrupleINHOUSE.isInvalid],
        ["QuadrupleREPORT", [fields.QuadrupleREPORT.required ? ew.Validators.required(fields.QuadrupleREPORT.caption) : null], fields.QuadrupleREPORT.isInvalid],
        ["A5month", [fields.A5month.required ? ew.Validators.required(fields.A5month.caption) : null], fields.A5month.isInvalid],
        ["A5monthDATE", [fields.A5monthDATE.required ? ew.Validators.required(fields.A5monthDATE.caption) : null], fields.A5monthDATE.isInvalid],
        ["A5monthINHOUSE", [fields.A5monthINHOUSE.required ? ew.Validators.required(fields.A5monthINHOUSE.caption) : null], fields.A5monthINHOUSE.isInvalid],
        ["A5monthREPORT", [fields.A5monthREPORT.required ? ew.Validators.required(fields.A5monthREPORT.caption) : null], fields.A5monthREPORT.isInvalid],
        ["A7month", [fields.A7month.required ? ew.Validators.required(fields.A7month.caption) : null], fields.A7month.isInvalid],
        ["A7monthDATE", [fields.A7monthDATE.required ? ew.Validators.required(fields.A7monthDATE.caption) : null], fields.A7monthDATE.isInvalid],
        ["A7monthINHOUSE", [fields.A7monthINHOUSE.required ? ew.Validators.required(fields.A7monthINHOUSE.caption) : null], fields.A7monthINHOUSE.isInvalid],
        ["A7monthREPORT", [fields.A7monthREPORT.required ? ew.Validators.required(fields.A7monthREPORT.caption) : null], fields.A7monthREPORT.isInvalid],
        ["A9month", [fields.A9month.required ? ew.Validators.required(fields.A9month.caption) : null], fields.A9month.isInvalid],
        ["A9monthDATE", [fields.A9monthDATE.required ? ew.Validators.required(fields.A9monthDATE.caption) : null], fields.A9monthDATE.isInvalid],
        ["A9monthINHOUSE", [fields.A9monthINHOUSE.required ? ew.Validators.required(fields.A9monthINHOUSE.caption) : null], fields.A9monthINHOUSE.isInvalid],
        ["A9monthREPORT", [fields.A9monthREPORT.required ? ew.Validators.required(fields.A9monthREPORT.caption) : null], fields.A9monthREPORT.isInvalid],
        ["INJ", [fields.INJ.required ? ew.Validators.required(fields.INJ.caption) : null], fields.INJ.isInvalid],
        ["INJDATE", [fields.INJDATE.required ? ew.Validators.required(fields.INJDATE.caption) : null], fields.INJDATE.isInvalid],
        ["INJINHOUSE", [fields.INJINHOUSE.required ? ew.Validators.required(fields.INJINHOUSE.caption) : null], fields.INJINHOUSE.isInvalid],
        ["INJREPORT", [fields.INJREPORT.required ? ew.Validators.required(fields.INJREPORT.caption) : null], fields.INJREPORT.isInvalid],
        ["Bleeding", [fields.Bleeding.required ? ew.Validators.required(fields.Bleeding.caption) : null], fields.Bleeding.isInvalid],
        ["Hypothyroidism", [fields.Hypothyroidism.required ? ew.Validators.required(fields.Hypothyroidism.caption) : null], fields.Hypothyroidism.isInvalid],
        ["PICMENumber", [fields.PICMENumber.required ? ew.Validators.required(fields.PICMENumber.caption) : null], fields.PICMENumber.isInvalid],
        ["Outcome", [fields.Outcome.required ? ew.Validators.required(fields.Outcome.caption) : null], fields.Outcome.isInvalid],
        ["DateofAdmission", [fields.DateofAdmission.required ? ew.Validators.required(fields.DateofAdmission.caption) : null], fields.DateofAdmission.isInvalid],
        ["DateodProcedure", [fields.DateodProcedure.required ? ew.Validators.required(fields.DateodProcedure.caption) : null], fields.DateodProcedure.isInvalid],
        ["Miscarriage", [fields.Miscarriage.required ? ew.Validators.required(fields.Miscarriage.caption) : null], fields.Miscarriage.isInvalid],
        ["ModeOfDelivery", [fields.ModeOfDelivery.required ? ew.Validators.required(fields.ModeOfDelivery.caption) : null], fields.ModeOfDelivery.isInvalid],
        ["ND", [fields.ND.required ? ew.Validators.required(fields.ND.caption) : null], fields.ND.isInvalid],
        ["NDS", [fields.NDS.required ? ew.Validators.required(fields.NDS.caption) : null], fields.NDS.isInvalid],
        ["NDP", [fields.NDP.required ? ew.Validators.required(fields.NDP.caption) : null], fields.NDP.isInvalid],
        ["Vaccum", [fields.Vaccum.required ? ew.Validators.required(fields.Vaccum.caption) : null], fields.Vaccum.isInvalid],
        ["VaccumS", [fields.VaccumS.required ? ew.Validators.required(fields.VaccumS.caption) : null], fields.VaccumS.isInvalid],
        ["VaccumP", [fields.VaccumP.required ? ew.Validators.required(fields.VaccumP.caption) : null], fields.VaccumP.isInvalid],
        ["Forceps", [fields.Forceps.required ? ew.Validators.required(fields.Forceps.caption) : null], fields.Forceps.isInvalid],
        ["ForcepsS", [fields.ForcepsS.required ? ew.Validators.required(fields.ForcepsS.caption) : null], fields.ForcepsS.isInvalid],
        ["ForcepsP", [fields.ForcepsP.required ? ew.Validators.required(fields.ForcepsP.caption) : null], fields.ForcepsP.isInvalid],
        ["Elective", [fields.Elective.required ? ew.Validators.required(fields.Elective.caption) : null], fields.Elective.isInvalid],
        ["ElectiveS", [fields.ElectiveS.required ? ew.Validators.required(fields.ElectiveS.caption) : null], fields.ElectiveS.isInvalid],
        ["ElectiveP", [fields.ElectiveP.required ? ew.Validators.required(fields.ElectiveP.caption) : null], fields.ElectiveP.isInvalid],
        ["Emergency", [fields.Emergency.required ? ew.Validators.required(fields.Emergency.caption) : null], fields.Emergency.isInvalid],
        ["EmergencyS", [fields.EmergencyS.required ? ew.Validators.required(fields.EmergencyS.caption) : null], fields.EmergencyS.isInvalid],
        ["EmergencyP", [fields.EmergencyP.required ? ew.Validators.required(fields.EmergencyP.caption) : null], fields.EmergencyP.isInvalid],
        ["Maturity", [fields.Maturity.required ? ew.Validators.required(fields.Maturity.caption) : null], fields.Maturity.isInvalid],
        ["Baby1", [fields.Baby1.required ? ew.Validators.required(fields.Baby1.caption) : null], fields.Baby1.isInvalid],
        ["Baby2", [fields.Baby2.required ? ew.Validators.required(fields.Baby2.caption) : null], fields.Baby2.isInvalid],
        ["sex1", [fields.sex1.required ? ew.Validators.required(fields.sex1.caption) : null], fields.sex1.isInvalid],
        ["sex2", [fields.sex2.required ? ew.Validators.required(fields.sex2.caption) : null], fields.sex2.isInvalid],
        ["weight1", [fields.weight1.required ? ew.Validators.required(fields.weight1.caption) : null], fields.weight1.isInvalid],
        ["weight2", [fields.weight2.required ? ew.Validators.required(fields.weight2.caption) : null], fields.weight2.isInvalid],
        ["NICU1", [fields.NICU1.required ? ew.Validators.required(fields.NICU1.caption) : null], fields.NICU1.isInvalid],
        ["NICU2", [fields.NICU2.required ? ew.Validators.required(fields.NICU2.caption) : null], fields.NICU2.isInvalid],
        ["Jaundice1", [fields.Jaundice1.required ? ew.Validators.required(fields.Jaundice1.caption) : null], fields.Jaundice1.isInvalid],
        ["Jaundice2", [fields.Jaundice2.required ? ew.Validators.required(fields.Jaundice2.caption) : null], fields.Jaundice2.isInvalid],
        ["Others1", [fields.Others1.required ? ew.Validators.required(fields.Others1.caption) : null], fields.Others1.isInvalid],
        ["Others2", [fields.Others2.required ? ew.Validators.required(fields.Others2.caption) : null], fields.Others2.isInvalid],
        ["SpillOverReasons", [fields.SpillOverReasons.required ? ew.Validators.required(fields.SpillOverReasons.caption) : null], fields.SpillOverReasons.isInvalid],
        ["ANClosed", [fields.ANClosed.required ? ew.Validators.required(fields.ANClosed.caption) : null], fields.ANClosed.isInvalid],
        ["ANClosedDATE", [fields.ANClosedDATE.required ? ew.Validators.required(fields.ANClosedDATE.caption) : null], fields.ANClosedDATE.isInvalid],
        ["PastMedicalHistoryOthers", [fields.PastMedicalHistoryOthers.required ? ew.Validators.required(fields.PastMedicalHistoryOthers.caption) : null], fields.PastMedicalHistoryOthers.isInvalid],
        ["PastSurgicalHistoryOthers", [fields.PastSurgicalHistoryOthers.required ? ew.Validators.required(fields.PastSurgicalHistoryOthers.caption) : null], fields.PastSurgicalHistoryOthers.isInvalid],
        ["FamilyHistoryOthers", [fields.FamilyHistoryOthers.required ? ew.Validators.required(fields.FamilyHistoryOthers.caption) : null], fields.FamilyHistoryOthers.isInvalid],
        ["PresentPregnancyComplicationsOthers", [fields.PresentPregnancyComplicationsOthers.required ? ew.Validators.required(fields.PresentPregnancyComplicationsOthers.caption) : null], fields.PresentPregnancyComplicationsOthers.isInvalid],
        ["ETdate", [fields.ETdate.required ? ew.Validators.required(fields.ETdate.caption) : null], fields.ETdate.isInvalid]
    ]);

    // Set invalid fields
    $(function() {
        var f = fpatient_an_registrationedit,
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
    fpatient_an_registrationedit.validate = function () {
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
    fpatient_an_registrationedit.customValidate = function(fobj) { // DO NOT CHANGE THIS LINE!
        // Your custom validation code here, return false if invalid.
        return true;
    }

    // Use JavaScript validation or not
    fpatient_an_registrationedit.validateRequired = <?= Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

    // Dynamic selection lists
    loadjs.done("fpatient_an_registrationedit");
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
<form name="fpatient_an_registrationedit" id="fpatient_an_registrationedit" class="<?= $Page->FormClassName ?>" action="<?= CurrentPageUrl() ?>" method="post">
<?php if (Config("CHECK_TOKEN")) { ?>
<input type="hidden" name="<?= $TokenNameKey ?>" value="<?= $TokenName ?>"><!-- CSRF token name -->
<input type="hidden" name="<?= $TokenValueKey ?>" value="<?= $TokenValue ?>"><!-- CSRF token value -->
<?php } ?>
<input type="hidden" name="t" value="patient_an_registration">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?= (int)$Page->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($Page->id->Visible) { // id ?>
    <div id="r_id" class="form-group row">
        <label id="elh_patient_an_registration_id" class="<?= $Page->LeftColumnClass ?>"><?= $Page->id->caption() ?><?= $Page->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->id->cellAttributes() ?>>
<span id="el_patient_an_registration_id">
<span<?= $Page->id->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?= HtmlEncode(RemoveHtml($Page->id->getDisplayValue($Page->id->EditValue))) ?>"></span>
</span>
<input type="hidden" data-table="patient_an_registration" data-field="x_id" data-hidden="1" name="x_id" id="x_id" value="<?= HtmlEncode($Page->id->CurrentValue) ?>">
</div></div>
    </div>
<?php } ?>
<?php if ($Page->pid->Visible) { // pid ?>
    <div id="r_pid" class="form-group row">
        <label id="elh_patient_an_registration_pid" for="x_pid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->pid->caption() ?><?= $Page->pid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->pid->cellAttributes() ?>>
<span id="el_patient_an_registration_pid">
<input type="<?= $Page->pid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_pid" name="x_pid" id="x_pid" size="30" placeholder="<?= HtmlEncode($Page->pid->getPlaceHolder()) ?>" value="<?= $Page->pid->EditValue ?>"<?= $Page->pid->editAttributes() ?> aria-describedby="x_pid_help">
<?= $Page->pid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->pid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->fid->Visible) { // fid ?>
    <div id="r_fid" class="form-group row">
        <label id="elh_patient_an_registration_fid" for="x_fid" class="<?= $Page->LeftColumnClass ?>"><?= $Page->fid->caption() ?><?= $Page->fid->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->fid->cellAttributes() ?>>
<span id="el_patient_an_registration_fid">
<input type="<?= $Page->fid->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_fid" name="x_fid" id="x_fid" size="30" placeholder="<?= HtmlEncode($Page->fid->getPlaceHolder()) ?>" value="<?= $Page->fid->EditValue ?>"<?= $Page->fid->editAttributes() ?> aria-describedby="x_fid_help">
<?= $Page->fid->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->fid->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->G->Visible) { // G ?>
    <div id="r_G" class="form-group row">
        <label id="elh_patient_an_registration_G" for="x_G" class="<?= $Page->LeftColumnClass ?>"><?= $Page->G->caption() ?><?= $Page->G->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->G->cellAttributes() ?>>
<span id="el_patient_an_registration_G">
<input type="<?= $Page->G->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G" name="x_G" id="x_G" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->G->getPlaceHolder()) ?>" value="<?= $Page->G->EditValue ?>"<?= $Page->G->editAttributes() ?> aria-describedby="x_G_help">
<?= $Page->G->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->G->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->P->Visible) { // P ?>
    <div id="r_P" class="form-group row">
        <label id="elh_patient_an_registration_P" for="x_P" class="<?= $Page->LeftColumnClass ?>"><?= $Page->P->caption() ?><?= $Page->P->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->P->cellAttributes() ?>>
<span id="el_patient_an_registration_P">
<input type="<?= $Page->P->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_P" name="x_P" id="x_P" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->P->getPlaceHolder()) ?>" value="<?= $Page->P->EditValue ?>"<?= $Page->P->editAttributes() ?> aria-describedby="x_P_help">
<?= $Page->P->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->P->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->L->Visible) { // L ?>
    <div id="r_L" class="form-group row">
        <label id="elh_patient_an_registration_L" for="x_L" class="<?= $Page->LeftColumnClass ?>"><?= $Page->L->caption() ?><?= $Page->L->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->L->cellAttributes() ?>>
<span id="el_patient_an_registration_L">
<input type="<?= $Page->L->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_L" name="x_L" id="x_L" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->L->getPlaceHolder()) ?>" value="<?= $Page->L->EditValue ?>"<?= $Page->L->editAttributes() ?> aria-describedby="x_L_help">
<?= $Page->L->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->L->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A->Visible) { // A ?>
    <div id="r_A" class="form-group row">
        <label id="elh_patient_an_registration_A" for="x_A" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A->caption() ?><?= $Page->A->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A->cellAttributes() ?>>
<span id="el_patient_an_registration_A">
<input type="<?= $Page->A->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A" name="x_A" id="x_A" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A->getPlaceHolder()) ?>" value="<?= $Page->A->EditValue ?>"<?= $Page->A->editAttributes() ?> aria-describedby="x_A_help">
<?= $Page->A->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->E->Visible) { // E ?>
    <div id="r_E" class="form-group row">
        <label id="elh_patient_an_registration_E" for="x_E" class="<?= $Page->LeftColumnClass ?>"><?= $Page->E->caption() ?><?= $Page->E->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->E->cellAttributes() ?>>
<span id="el_patient_an_registration_E">
<input type="<?= $Page->E->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_E" name="x_E" id="x_E" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->E->getPlaceHolder()) ?>" value="<?= $Page->E->EditValue ?>"<?= $Page->E->editAttributes() ?> aria-describedby="x_E_help">
<?= $Page->E->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->E->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->M->Visible) { // M ?>
    <div id="r_M" class="form-group row">
        <label id="elh_patient_an_registration_M" for="x_M" class="<?= $Page->LeftColumnClass ?>"><?= $Page->M->caption() ?><?= $Page->M->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->M->cellAttributes() ?>>
<span id="el_patient_an_registration_M">
<input type="<?= $Page->M->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_M" name="x_M" id="x_M" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->M->getPlaceHolder()) ?>" value="<?= $Page->M->EditValue ?>"<?= $Page->M->editAttributes() ?> aria-describedby="x_M_help">
<?= $Page->M->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->M->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->LMP->Visible) { // LMP ?>
    <div id="r_LMP" class="form-group row">
        <label id="elh_patient_an_registration_LMP" for="x_LMP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->LMP->caption() ?><?= $Page->LMP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->LMP->cellAttributes() ?>>
<span id="el_patient_an_registration_LMP">
<input type="<?= $Page->LMP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_LMP" name="x_LMP" id="x_LMP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->LMP->getPlaceHolder()) ?>" value="<?= $Page->LMP->EditValue ?>"<?= $Page->LMP->editAttributes() ?> aria-describedby="x_LMP_help">
<?= $Page->LMP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->LMP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EDO->Visible) { // EDO ?>
    <div id="r_EDO" class="form-group row">
        <label id="elh_patient_an_registration_EDO" for="x_EDO" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EDO->caption() ?><?= $Page->EDO->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EDO->cellAttributes() ?>>
<span id="el_patient_an_registration_EDO">
<input type="<?= $Page->EDO->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EDO" name="x_EDO" id="x_EDO" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EDO->getPlaceHolder()) ?>" value="<?= $Page->EDO->EditValue ?>"<?= $Page->EDO->editAttributes() ?> aria-describedby="x_EDO_help">
<?= $Page->EDO->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EDO->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MenstrualHistory->Visible) { // MenstrualHistory ?>
    <div id="r_MenstrualHistory" class="form-group row">
        <label id="elh_patient_an_registration_MenstrualHistory" for="x_MenstrualHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MenstrualHistory->caption() ?><?= $Page->MenstrualHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MenstrualHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_MenstrualHistory">
<input type="<?= $Page->MenstrualHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_MenstrualHistory" name="x_MenstrualHistory" id="x_MenstrualHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MenstrualHistory->getPlaceHolder()) ?>" value="<?= $Page->MenstrualHistory->EditValue ?>"<?= $Page->MenstrualHistory->editAttributes() ?> aria-describedby="x_MenstrualHistory_help">
<?= $Page->MenstrualHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MenstrualHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->MaritalHistory->Visible) { // MaritalHistory ?>
    <div id="r_MaritalHistory" class="form-group row">
        <label id="elh_patient_an_registration_MaritalHistory" for="x_MaritalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->MaritalHistory->caption() ?><?= $Page->MaritalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->MaritalHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_MaritalHistory">
<input type="<?= $Page->MaritalHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_MaritalHistory" name="x_MaritalHistory" id="x_MaritalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->MaritalHistory->getPlaceHolder()) ?>" value="<?= $Page->MaritalHistory->EditValue ?>"<?= $Page->MaritalHistory->editAttributes() ?> aria-describedby="x_MaritalHistory_help">
<?= $Page->MaritalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->MaritalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ObstetricHistory->Visible) { // ObstetricHistory ?>
    <div id="r_ObstetricHistory" class="form-group row">
        <label id="elh_patient_an_registration_ObstetricHistory" for="x_ObstetricHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ObstetricHistory->caption() ?><?= $Page->ObstetricHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ObstetricHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_ObstetricHistory">
<input type="<?= $Page->ObstetricHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ObstetricHistory" name="x_ObstetricHistory" id="x_ObstetricHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ObstetricHistory->getPlaceHolder()) ?>" value="<?= $Page->ObstetricHistory->EditValue ?>"<?= $Page->ObstetricHistory->editAttributes() ?> aria-describedby="x_ObstetricHistory_help">
<?= $Page->ObstetricHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ObstetricHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistoryofGDM->Visible) { // PreviousHistoryofGDM ?>
    <div id="r_PreviousHistoryofGDM" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistoryofGDM" for="x_PreviousHistoryofGDM" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreviousHistoryofGDM->caption() ?><?= $Page->PreviousHistoryofGDM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistoryofGDM->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistoryofGDM">
<input type="<?= $Page->PreviousHistoryofGDM->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PreviousHistoryofGDM" name="x_PreviousHistoryofGDM" id="x_PreviousHistoryofGDM" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreviousHistoryofGDM->getPlaceHolder()) ?>" value="<?= $Page->PreviousHistoryofGDM->EditValue ?>"<?= $Page->PreviousHistoryofGDM->editAttributes() ?> aria-describedby="x_PreviousHistoryofGDM_help">
<?= $Page->PreviousHistoryofGDM->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreviousHistoryofGDM->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistorofPIH->Visible) { // PreviousHistorofPIH ?>
    <div id="r_PreviousHistorofPIH" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistorofPIH" for="x_PreviousHistorofPIH" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreviousHistorofPIH->caption() ?><?= $Page->PreviousHistorofPIH->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistorofPIH->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistorofPIH">
<input type="<?= $Page->PreviousHistorofPIH->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PreviousHistorofPIH" name="x_PreviousHistorofPIH" id="x_PreviousHistorofPIH" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreviousHistorofPIH->getPlaceHolder()) ?>" value="<?= $Page->PreviousHistorofPIH->EditValue ?>"<?= $Page->PreviousHistorofPIH->editAttributes() ?> aria-describedby="x_PreviousHistorofPIH_help">
<?= $Page->PreviousHistorofPIH->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreviousHistorofPIH->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistoryofIUGR->Visible) { // PreviousHistoryofIUGR ?>
    <div id="r_PreviousHistoryofIUGR" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistoryofIUGR" for="x_PreviousHistoryofIUGR" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreviousHistoryofIUGR->caption() ?><?= $Page->PreviousHistoryofIUGR->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistoryofIUGR->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistoryofIUGR">
<input type="<?= $Page->PreviousHistoryofIUGR->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PreviousHistoryofIUGR" name="x_PreviousHistoryofIUGR" id="x_PreviousHistoryofIUGR" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreviousHistoryofIUGR->getPlaceHolder()) ?>" value="<?= $Page->PreviousHistoryofIUGR->EditValue ?>"<?= $Page->PreviousHistoryofIUGR->editAttributes() ?> aria-describedby="x_PreviousHistoryofIUGR_help">
<?= $Page->PreviousHistoryofIUGR->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreviousHistoryofIUGR->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistoryofOligohydramnios->Visible) { // PreviousHistoryofOligohydramnios ?>
    <div id="r_PreviousHistoryofOligohydramnios" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistoryofOligohydramnios" for="x_PreviousHistoryofOligohydramnios" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreviousHistoryofOligohydramnios->caption() ?><?= $Page->PreviousHistoryofOligohydramnios->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistoryofOligohydramnios->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistoryofOligohydramnios">
<input type="<?= $Page->PreviousHistoryofOligohydramnios->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PreviousHistoryofOligohydramnios" name="x_PreviousHistoryofOligohydramnios" id="x_PreviousHistoryofOligohydramnios" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreviousHistoryofOligohydramnios->getPlaceHolder()) ?>" value="<?= $Page->PreviousHistoryofOligohydramnios->EditValue ?>"<?= $Page->PreviousHistoryofOligohydramnios->editAttributes() ?> aria-describedby="x_PreviousHistoryofOligohydramnios_help">
<?= $Page->PreviousHistoryofOligohydramnios->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreviousHistoryofOligohydramnios->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PreviousHistoryofPreterm->Visible) { // PreviousHistoryofPreterm ?>
    <div id="r_PreviousHistoryofPreterm" class="form-group row">
        <label id="elh_patient_an_registration_PreviousHistoryofPreterm" for="x_PreviousHistoryofPreterm" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PreviousHistoryofPreterm->caption() ?><?= $Page->PreviousHistoryofPreterm->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PreviousHistoryofPreterm->cellAttributes() ?>>
<span id="el_patient_an_registration_PreviousHistoryofPreterm">
<input type="<?= $Page->PreviousHistoryofPreterm->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PreviousHistoryofPreterm" name="x_PreviousHistoryofPreterm" id="x_PreviousHistoryofPreterm" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PreviousHistoryofPreterm->getPlaceHolder()) ?>" value="<?= $Page->PreviousHistoryofPreterm->EditValue ?>"<?= $Page->PreviousHistoryofPreterm->editAttributes() ?> aria-describedby="x_PreviousHistoryofPreterm_help">
<?= $Page->PreviousHistoryofPreterm->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PreviousHistoryofPreterm->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->G1->Visible) { // G1 ?>
    <div id="r_G1" class="form-group row">
        <label id="elh_patient_an_registration_G1" for="x_G1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->G1->caption() ?><?= $Page->G1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->G1->cellAttributes() ?>>
<span id="el_patient_an_registration_G1">
<input type="<?= $Page->G1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G1" name="x_G1" id="x_G1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->G1->getPlaceHolder()) ?>" value="<?= $Page->G1->EditValue ?>"<?= $Page->G1->editAttributes() ?> aria-describedby="x_G1_help">
<?= $Page->G1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->G1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->G2->Visible) { // G2 ?>
    <div id="r_G2" class="form-group row">
        <label id="elh_patient_an_registration_G2" for="x_G2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->G2->caption() ?><?= $Page->G2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->G2->cellAttributes() ?>>
<span id="el_patient_an_registration_G2">
<input type="<?= $Page->G2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G2" name="x_G2" id="x_G2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->G2->getPlaceHolder()) ?>" value="<?= $Page->G2->EditValue ?>"<?= $Page->G2->editAttributes() ?> aria-describedby="x_G2_help">
<?= $Page->G2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->G2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->G3->Visible) { // G3 ?>
    <div id="r_G3" class="form-group row">
        <label id="elh_patient_an_registration_G3" for="x_G3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->G3->caption() ?><?= $Page->G3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->G3->cellAttributes() ?>>
<span id="el_patient_an_registration_G3">
<input type="<?= $Page->G3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_G3" name="x_G3" id="x_G3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->G3->getPlaceHolder()) ?>" value="<?= $Page->G3->EditValue ?>"<?= $Page->G3->editAttributes() ?> aria-describedby="x_G3_help">
<?= $Page->G3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->G3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS1->Visible) { // DeliveryNDLSCS1 ?>
    <div id="r_DeliveryNDLSCS1" class="form-group row">
        <label id="elh_patient_an_registration_DeliveryNDLSCS1" for="x_DeliveryNDLSCS1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeliveryNDLSCS1->caption() ?><?= $Page->DeliveryNDLSCS1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryNDLSCS1->cellAttributes() ?>>
<span id="el_patient_an_registration_DeliveryNDLSCS1">
<input type="<?= $Page->DeliveryNDLSCS1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS1" name="x_DeliveryNDLSCS1" id="x_DeliveryNDLSCS1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeliveryNDLSCS1->getPlaceHolder()) ?>" value="<?= $Page->DeliveryNDLSCS1->EditValue ?>"<?= $Page->DeliveryNDLSCS1->editAttributes() ?> aria-describedby="x_DeliveryNDLSCS1_help">
<?= $Page->DeliveryNDLSCS1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryNDLSCS1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS2->Visible) { // DeliveryNDLSCS2 ?>
    <div id="r_DeliveryNDLSCS2" class="form-group row">
        <label id="elh_patient_an_registration_DeliveryNDLSCS2" for="x_DeliveryNDLSCS2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeliveryNDLSCS2->caption() ?><?= $Page->DeliveryNDLSCS2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryNDLSCS2->cellAttributes() ?>>
<span id="el_patient_an_registration_DeliveryNDLSCS2">
<input type="<?= $Page->DeliveryNDLSCS2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS2" name="x_DeliveryNDLSCS2" id="x_DeliveryNDLSCS2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeliveryNDLSCS2->getPlaceHolder()) ?>" value="<?= $Page->DeliveryNDLSCS2->EditValue ?>"<?= $Page->DeliveryNDLSCS2->editAttributes() ?> aria-describedby="x_DeliveryNDLSCS2_help">
<?= $Page->DeliveryNDLSCS2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryNDLSCS2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DeliveryNDLSCS3->Visible) { // DeliveryNDLSCS3 ?>
    <div id="r_DeliveryNDLSCS3" class="form-group row">
        <label id="elh_patient_an_registration_DeliveryNDLSCS3" for="x_DeliveryNDLSCS3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DeliveryNDLSCS3->caption() ?><?= $Page->DeliveryNDLSCS3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DeliveryNDLSCS3->cellAttributes() ?>>
<span id="el_patient_an_registration_DeliveryNDLSCS3">
<input type="<?= $Page->DeliveryNDLSCS3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DeliveryNDLSCS3" name="x_DeliveryNDLSCS3" id="x_DeliveryNDLSCS3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DeliveryNDLSCS3->getPlaceHolder()) ?>" value="<?= $Page->DeliveryNDLSCS3->EditValue ?>"<?= $Page->DeliveryNDLSCS3->editAttributes() ?> aria-describedby="x_DeliveryNDLSCS3_help">
<?= $Page->DeliveryNDLSCS3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DeliveryNDLSCS3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BabySexweight1->Visible) { // BabySexweight1 ?>
    <div id="r_BabySexweight1" class="form-group row">
        <label id="elh_patient_an_registration_BabySexweight1" for="x_BabySexweight1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BabySexweight1->caption() ?><?= $Page->BabySexweight1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BabySexweight1->cellAttributes() ?>>
<span id="el_patient_an_registration_BabySexweight1">
<input type="<?= $Page->BabySexweight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight1" name="x_BabySexweight1" id="x_BabySexweight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BabySexweight1->getPlaceHolder()) ?>" value="<?= $Page->BabySexweight1->EditValue ?>"<?= $Page->BabySexweight1->editAttributes() ?> aria-describedby="x_BabySexweight1_help">
<?= $Page->BabySexweight1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BabySexweight1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BabySexweight2->Visible) { // BabySexweight2 ?>
    <div id="r_BabySexweight2" class="form-group row">
        <label id="elh_patient_an_registration_BabySexweight2" for="x_BabySexweight2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BabySexweight2->caption() ?><?= $Page->BabySexweight2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BabySexweight2->cellAttributes() ?>>
<span id="el_patient_an_registration_BabySexweight2">
<input type="<?= $Page->BabySexweight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight2" name="x_BabySexweight2" id="x_BabySexweight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BabySexweight2->getPlaceHolder()) ?>" value="<?= $Page->BabySexweight2->EditValue ?>"<?= $Page->BabySexweight2->editAttributes() ?> aria-describedby="x_BabySexweight2_help">
<?= $Page->BabySexweight2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BabySexweight2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->BabySexweight3->Visible) { // BabySexweight3 ?>
    <div id="r_BabySexweight3" class="form-group row">
        <label id="elh_patient_an_registration_BabySexweight3" for="x_BabySexweight3" class="<?= $Page->LeftColumnClass ?>"><?= $Page->BabySexweight3->caption() ?><?= $Page->BabySexweight3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->BabySexweight3->cellAttributes() ?>>
<span id="el_patient_an_registration_BabySexweight3">
<input type="<?= $Page->BabySexweight3->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_BabySexweight3" name="x_BabySexweight3" id="x_BabySexweight3" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->BabySexweight3->getPlaceHolder()) ?>" value="<?= $Page->BabySexweight3->EditValue ?>"<?= $Page->BabySexweight3->editAttributes() ?> aria-describedby="x_BabySexweight3_help">
<?= $Page->BabySexweight3->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->BabySexweight3->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastMedicalHistory->Visible) { // PastMedicalHistory ?>
    <div id="r_PastMedicalHistory" class="form-group row">
        <label id="elh_patient_an_registration_PastMedicalHistory" for="x_PastMedicalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PastMedicalHistory->caption() ?><?= $Page->PastMedicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastMedicalHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_PastMedicalHistory">
<input type="<?= $Page->PastMedicalHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastMedicalHistory" name="x_PastMedicalHistory" id="x_PastMedicalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PastMedicalHistory->getPlaceHolder()) ?>" value="<?= $Page->PastMedicalHistory->EditValue ?>"<?= $Page->PastMedicalHistory->editAttributes() ?> aria-describedby="x_PastMedicalHistory_help">
<?= $Page->PastMedicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastMedicalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastSurgicalHistory->Visible) { // PastSurgicalHistory ?>
    <div id="r_PastSurgicalHistory" class="form-group row">
        <label id="elh_patient_an_registration_PastSurgicalHistory" for="x_PastSurgicalHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PastSurgicalHistory->caption() ?><?= $Page->PastSurgicalHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastSurgicalHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_PastSurgicalHistory">
<input type="<?= $Page->PastSurgicalHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastSurgicalHistory" name="x_PastSurgicalHistory" id="x_PastSurgicalHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PastSurgicalHistory->getPlaceHolder()) ?>" value="<?= $Page->PastSurgicalHistory->EditValue ?>"<?= $Page->PastSurgicalHistory->editAttributes() ?> aria-describedby="x_PastSurgicalHistory_help">
<?= $Page->PastSurgicalHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastSurgicalHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistory->Visible) { // FamilyHistory ?>
    <div id="r_FamilyHistory" class="form-group row">
        <label id="elh_patient_an_registration_FamilyHistory" for="x_FamilyHistory" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FamilyHistory->caption() ?><?= $Page->FamilyHistory->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistory->cellAttributes() ?>>
<span id="el_patient_an_registration_FamilyHistory">
<input type="<?= $Page->FamilyHistory->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_FamilyHistory" name="x_FamilyHistory" id="x_FamilyHistory" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FamilyHistory->getPlaceHolder()) ?>" value="<?= $Page->FamilyHistory->EditValue ?>"<?= $Page->FamilyHistory->editAttributes() ?> aria-describedby="x_FamilyHistory_help">
<?= $Page->FamilyHistory->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistory->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Viability->Visible) { // Viability ?>
    <div id="r_Viability" class="form-group row">
        <label id="elh_patient_an_registration_Viability" for="x_Viability" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Viability->caption() ?><?= $Page->Viability->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Viability->cellAttributes() ?>>
<span id="el_patient_an_registration_Viability">
<input type="<?= $Page->Viability->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability" name="x_Viability" id="x_Viability" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Viability->getPlaceHolder()) ?>" value="<?= $Page->Viability->EditValue ?>"<?= $Page->Viability->editAttributes() ?> aria-describedby="x_Viability_help">
<?= $Page->Viability->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Viability->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViabilityDATE->Visible) { // ViabilityDATE ?>
    <div id="r_ViabilityDATE" class="form-group row">
        <label id="elh_patient_an_registration_ViabilityDATE" for="x_ViabilityDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ViabilityDATE->caption() ?><?= $Page->ViabilityDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViabilityDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_ViabilityDATE">
<input type="<?= $Page->ViabilityDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ViabilityDATE" name="x_ViabilityDATE" id="x_ViabilityDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ViabilityDATE->getPlaceHolder()) ?>" value="<?= $Page->ViabilityDATE->EditValue ?>"<?= $Page->ViabilityDATE->editAttributes() ?> aria-describedby="x_ViabilityDATE_help">
<?= $Page->ViabilityDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViabilityDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ViabilityREPORT->Visible) { // ViabilityREPORT ?>
    <div id="r_ViabilityREPORT" class="form-group row">
        <label id="elh_patient_an_registration_ViabilityREPORT" for="x_ViabilityREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ViabilityREPORT->caption() ?><?= $Page->ViabilityREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ViabilityREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_ViabilityREPORT">
<textarea data-table="patient_an_registration" data-field="x_ViabilityREPORT" name="x_ViabilityREPORT" id="x_ViabilityREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ViabilityREPORT->getPlaceHolder()) ?>"<?= $Page->ViabilityREPORT->editAttributes() ?> aria-describedby="x_ViabilityREPORT_help"><?= $Page->ViabilityREPORT->EditValue ?></textarea>
<?= $Page->ViabilityREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ViabilityREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Viability2->Visible) { // Viability2 ?>
    <div id="r_Viability2" class="form-group row">
        <label id="elh_patient_an_registration_Viability2" for="x_Viability2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Viability2->caption() ?><?= $Page->Viability2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Viability2->cellAttributes() ?>>
<span id="el_patient_an_registration_Viability2">
<input type="<?= $Page->Viability2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2" name="x_Viability2" id="x_Viability2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Viability2->getPlaceHolder()) ?>" value="<?= $Page->Viability2->EditValue ?>"<?= $Page->Viability2->editAttributes() ?> aria-describedby="x_Viability2_help">
<?= $Page->Viability2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Viability2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Viability2DATE->Visible) { // Viability2DATE ?>
    <div id="r_Viability2DATE" class="form-group row">
        <label id="elh_patient_an_registration_Viability2DATE" for="x_Viability2DATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Viability2DATE->caption() ?><?= $Page->Viability2DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Viability2DATE->cellAttributes() ?>>
<span id="el_patient_an_registration_Viability2DATE">
<input type="<?= $Page->Viability2DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Viability2DATE" name="x_Viability2DATE" id="x_Viability2DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Viability2DATE->getPlaceHolder()) ?>" value="<?= $Page->Viability2DATE->EditValue ?>"<?= $Page->Viability2DATE->editAttributes() ?> aria-describedby="x_Viability2DATE_help">
<?= $Page->Viability2DATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Viability2DATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Viability2REPORT->Visible) { // Viability2REPORT ?>
    <div id="r_Viability2REPORT" class="form-group row">
        <label id="elh_patient_an_registration_Viability2REPORT" for="x_Viability2REPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Viability2REPORT->caption() ?><?= $Page->Viability2REPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Viability2REPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_Viability2REPORT">
<textarea data-table="patient_an_registration" data-field="x_Viability2REPORT" name="x_Viability2REPORT" id="x_Viability2REPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Viability2REPORT->getPlaceHolder()) ?>"<?= $Page->Viability2REPORT->editAttributes() ?> aria-describedby="x_Viability2REPORT_help"><?= $Page->Viability2REPORT->EditValue ?></textarea>
<?= $Page->Viability2REPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Viability2REPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NTscan->Visible) { // NTscan ?>
    <div id="r_NTscan" class="form-group row">
        <label id="elh_patient_an_registration_NTscan" for="x_NTscan" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NTscan->caption() ?><?= $Page->NTscan->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NTscan->cellAttributes() ?>>
<span id="el_patient_an_registration_NTscan">
<input type="<?= $Page->NTscan->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscan" name="x_NTscan" id="x_NTscan" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NTscan->getPlaceHolder()) ?>" value="<?= $Page->NTscan->EditValue ?>"<?= $Page->NTscan->editAttributes() ?> aria-describedby="x_NTscan_help">
<?= $Page->NTscan->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NTscan->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NTscanDATE->Visible) { // NTscanDATE ?>
    <div id="r_NTscanDATE" class="form-group row">
        <label id="elh_patient_an_registration_NTscanDATE" for="x_NTscanDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NTscanDATE->caption() ?><?= $Page->NTscanDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NTscanDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_NTscanDATE">
<input type="<?= $Page->NTscanDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NTscanDATE" name="x_NTscanDATE" id="x_NTscanDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NTscanDATE->getPlaceHolder()) ?>" value="<?= $Page->NTscanDATE->EditValue ?>"<?= $Page->NTscanDATE->editAttributes() ?> aria-describedby="x_NTscanDATE_help">
<?= $Page->NTscanDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NTscanDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NTscanREPORT->Visible) { // NTscanREPORT ?>
    <div id="r_NTscanREPORT" class="form-group row">
        <label id="elh_patient_an_registration_NTscanREPORT" for="x_NTscanREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NTscanREPORT->caption() ?><?= $Page->NTscanREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NTscanREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_NTscanREPORT">
<textarea data-table="patient_an_registration" data-field="x_NTscanREPORT" name="x_NTscanREPORT" id="x_NTscanREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->NTscanREPORT->getPlaceHolder()) ?>"<?= $Page->NTscanREPORT->editAttributes() ?> aria-describedby="x_NTscanREPORT_help"><?= $Page->NTscanREPORT->EditValue ?></textarea>
<?= $Page->NTscanREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NTscanREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EarlyTarget->Visible) { // EarlyTarget ?>
    <div id="r_EarlyTarget" class="form-group row">
        <label id="elh_patient_an_registration_EarlyTarget" for="x_EarlyTarget" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EarlyTarget->caption() ?><?= $Page->EarlyTarget->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EarlyTarget->cellAttributes() ?>>
<span id="el_patient_an_registration_EarlyTarget">
<input type="<?= $Page->EarlyTarget->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTarget" name="x_EarlyTarget" id="x_EarlyTarget" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EarlyTarget->getPlaceHolder()) ?>" value="<?= $Page->EarlyTarget->EditValue ?>"<?= $Page->EarlyTarget->editAttributes() ?> aria-describedby="x_EarlyTarget_help">
<?= $Page->EarlyTarget->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EarlyTarget->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EarlyTargetDATE->Visible) { // EarlyTargetDATE ?>
    <div id="r_EarlyTargetDATE" class="form-group row">
        <label id="elh_patient_an_registration_EarlyTargetDATE" for="x_EarlyTargetDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EarlyTargetDATE->caption() ?><?= $Page->EarlyTargetDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EarlyTargetDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_EarlyTargetDATE">
<input type="<?= $Page->EarlyTargetDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EarlyTargetDATE" name="x_EarlyTargetDATE" id="x_EarlyTargetDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EarlyTargetDATE->getPlaceHolder()) ?>" value="<?= $Page->EarlyTargetDATE->EditValue ?>"<?= $Page->EarlyTargetDATE->editAttributes() ?> aria-describedby="x_EarlyTargetDATE_help">
<?= $Page->EarlyTargetDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EarlyTargetDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EarlyTargetREPORT->Visible) { // EarlyTargetREPORT ?>
    <div id="r_EarlyTargetREPORT" class="form-group row">
        <label id="elh_patient_an_registration_EarlyTargetREPORT" for="x_EarlyTargetREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EarlyTargetREPORT->caption() ?><?= $Page->EarlyTargetREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EarlyTargetREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_EarlyTargetREPORT">
<textarea data-table="patient_an_registration" data-field="x_EarlyTargetREPORT" name="x_EarlyTargetREPORT" id="x_EarlyTargetREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->EarlyTargetREPORT->getPlaceHolder()) ?>"<?= $Page->EarlyTargetREPORT->editAttributes() ?> aria-describedby="x_EarlyTargetREPORT_help"><?= $Page->EarlyTargetREPORT->EditValue ?></textarea>
<?= $Page->EarlyTargetREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EarlyTargetREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Anomaly->Visible) { // Anomaly ?>
    <div id="r_Anomaly" class="form-group row">
        <label id="elh_patient_an_registration_Anomaly" for="x_Anomaly" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Anomaly->caption() ?><?= $Page->Anomaly->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Anomaly->cellAttributes() ?>>
<span id="el_patient_an_registration_Anomaly">
<input type="<?= $Page->Anomaly->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Anomaly" name="x_Anomaly" id="x_Anomaly" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Anomaly->getPlaceHolder()) ?>" value="<?= $Page->Anomaly->EditValue ?>"<?= $Page->Anomaly->editAttributes() ?> aria-describedby="x_Anomaly_help">
<?= $Page->Anomaly->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Anomaly->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnomalyDATE->Visible) { // AnomalyDATE ?>
    <div id="r_AnomalyDATE" class="form-group row">
        <label id="elh_patient_an_registration_AnomalyDATE" for="x_AnomalyDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnomalyDATE->caption() ?><?= $Page->AnomalyDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnomalyDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_AnomalyDATE">
<input type="<?= $Page->AnomalyDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_AnomalyDATE" name="x_AnomalyDATE" id="x_AnomalyDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->AnomalyDATE->getPlaceHolder()) ?>" value="<?= $Page->AnomalyDATE->EditValue ?>"<?= $Page->AnomalyDATE->editAttributes() ?> aria-describedby="x_AnomalyDATE_help">
<?= $Page->AnomalyDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnomalyDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->AnomalyREPORT->Visible) { // AnomalyREPORT ?>
    <div id="r_AnomalyREPORT" class="form-group row">
        <label id="elh_patient_an_registration_AnomalyREPORT" for="x_AnomalyREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->AnomalyREPORT->caption() ?><?= $Page->AnomalyREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->AnomalyREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_AnomalyREPORT">
<textarea data-table="patient_an_registration" data-field="x_AnomalyREPORT" name="x_AnomalyREPORT" id="x_AnomalyREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->AnomalyREPORT->getPlaceHolder()) ?>"<?= $Page->AnomalyREPORT->editAttributes() ?> aria-describedby="x_AnomalyREPORT_help"><?= $Page->AnomalyREPORT->EditValue ?></textarea>
<?= $Page->AnomalyREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->AnomalyREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Growth->Visible) { // Growth ?>
    <div id="r_Growth" class="form-group row">
        <label id="elh_patient_an_registration_Growth" for="x_Growth" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Growth->caption() ?><?= $Page->Growth->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Growth->cellAttributes() ?>>
<span id="el_patient_an_registration_Growth">
<input type="<?= $Page->Growth->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth" name="x_Growth" id="x_Growth" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Growth->getPlaceHolder()) ?>" value="<?= $Page->Growth->EditValue ?>"<?= $Page->Growth->editAttributes() ?> aria-describedby="x_Growth_help">
<?= $Page->Growth->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Growth->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrowthDATE->Visible) { // GrowthDATE ?>
    <div id="r_GrowthDATE" class="form-group row">
        <label id="elh_patient_an_registration_GrowthDATE" for="x_GrowthDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GrowthDATE->caption() ?><?= $Page->GrowthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrowthDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_GrowthDATE">
<input type="<?= $Page->GrowthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_GrowthDATE" name="x_GrowthDATE" id="x_GrowthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->GrowthDATE->getPlaceHolder()) ?>" value="<?= $Page->GrowthDATE->EditValue ?>"<?= $Page->GrowthDATE->editAttributes() ?> aria-describedby="x_GrowthDATE_help">
<?= $Page->GrowthDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrowthDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->GrowthREPORT->Visible) { // GrowthREPORT ?>
    <div id="r_GrowthREPORT" class="form-group row">
        <label id="elh_patient_an_registration_GrowthREPORT" for="x_GrowthREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->GrowthREPORT->caption() ?><?= $Page->GrowthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->GrowthREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_GrowthREPORT">
<textarea data-table="patient_an_registration" data-field="x_GrowthREPORT" name="x_GrowthREPORT" id="x_GrowthREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->GrowthREPORT->getPlaceHolder()) ?>"<?= $Page->GrowthREPORT->editAttributes() ?> aria-describedby="x_GrowthREPORT_help"><?= $Page->GrowthREPORT->EditValue ?></textarea>
<?= $Page->GrowthREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->GrowthREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Growth1->Visible) { // Growth1 ?>
    <div id="r_Growth1" class="form-group row">
        <label id="elh_patient_an_registration_Growth1" for="x_Growth1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Growth1->caption() ?><?= $Page->Growth1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Growth1->cellAttributes() ?>>
<span id="el_patient_an_registration_Growth1">
<input type="<?= $Page->Growth1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1" name="x_Growth1" id="x_Growth1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Growth1->getPlaceHolder()) ?>" value="<?= $Page->Growth1->EditValue ?>"<?= $Page->Growth1->editAttributes() ?> aria-describedby="x_Growth1_help">
<?= $Page->Growth1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Growth1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Growth1DATE->Visible) { // Growth1DATE ?>
    <div id="r_Growth1DATE" class="form-group row">
        <label id="elh_patient_an_registration_Growth1DATE" for="x_Growth1DATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Growth1DATE->caption() ?><?= $Page->Growth1DATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Growth1DATE->cellAttributes() ?>>
<span id="el_patient_an_registration_Growth1DATE">
<input type="<?= $Page->Growth1DATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Growth1DATE" name="x_Growth1DATE" id="x_Growth1DATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Growth1DATE->getPlaceHolder()) ?>" value="<?= $Page->Growth1DATE->EditValue ?>"<?= $Page->Growth1DATE->editAttributes() ?> aria-describedby="x_Growth1DATE_help">
<?= $Page->Growth1DATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Growth1DATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Growth1REPORT->Visible) { // Growth1REPORT ?>
    <div id="r_Growth1REPORT" class="form-group row">
        <label id="elh_patient_an_registration_Growth1REPORT" for="x_Growth1REPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Growth1REPORT->caption() ?><?= $Page->Growth1REPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Growth1REPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_Growth1REPORT">
<textarea data-table="patient_an_registration" data-field="x_Growth1REPORT" name="x_Growth1REPORT" id="x_Growth1REPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->Growth1REPORT->getPlaceHolder()) ?>"<?= $Page->Growth1REPORT->editAttributes() ?> aria-describedby="x_Growth1REPORT_help"><?= $Page->Growth1REPORT->EditValue ?></textarea>
<?= $Page->Growth1REPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Growth1REPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANProfile->Visible) { // ANProfile ?>
    <div id="r_ANProfile" class="form-group row">
        <label id="elh_patient_an_registration_ANProfile" for="x_ANProfile" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ANProfile->caption() ?><?= $Page->ANProfile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANProfile->cellAttributes() ?>>
<span id="el_patient_an_registration_ANProfile">
<input type="<?= $Page->ANProfile->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfile" name="x_ANProfile" id="x_ANProfile" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANProfile->getPlaceHolder()) ?>" value="<?= $Page->ANProfile->EditValue ?>"<?= $Page->ANProfile->editAttributes() ?> aria-describedby="x_ANProfile_help">
<?= $Page->ANProfile->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANProfile->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANProfileDATE->Visible) { // ANProfileDATE ?>
    <div id="r_ANProfileDATE" class="form-group row">
        <label id="elh_patient_an_registration_ANProfileDATE" for="x_ANProfileDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ANProfileDATE->caption() ?><?= $Page->ANProfileDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANProfileDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_ANProfileDATE">
<input type="<?= $Page->ANProfileDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileDATE" name="x_ANProfileDATE" id="x_ANProfileDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANProfileDATE->getPlaceHolder()) ?>" value="<?= $Page->ANProfileDATE->EditValue ?>"<?= $Page->ANProfileDATE->editAttributes() ?> aria-describedby="x_ANProfileDATE_help">
<?= $Page->ANProfileDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANProfileDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANProfileINHOUSE->Visible) { // ANProfileINHOUSE ?>
    <div id="r_ANProfileINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_ANProfileINHOUSE" for="x_ANProfileINHOUSE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ANProfileINHOUSE->caption() ?><?= $Page->ANProfileINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANProfileINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_ANProfileINHOUSE">
<input type="<?= $Page->ANProfileINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANProfileINHOUSE" name="x_ANProfileINHOUSE" id="x_ANProfileINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANProfileINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->ANProfileINHOUSE->EditValue ?>"<?= $Page->ANProfileINHOUSE->editAttributes() ?> aria-describedby="x_ANProfileINHOUSE_help">
<?= $Page->ANProfileINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANProfileINHOUSE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANProfileREPORT->Visible) { // ANProfileREPORT ?>
    <div id="r_ANProfileREPORT" class="form-group row">
        <label id="elh_patient_an_registration_ANProfileREPORT" for="x_ANProfileREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ANProfileREPORT->caption() ?><?= $Page->ANProfileREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANProfileREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_ANProfileREPORT">
<textarea data-table="patient_an_registration" data-field="x_ANProfileREPORT" name="x_ANProfileREPORT" id="x_ANProfileREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->ANProfileREPORT->getPlaceHolder()) ?>"<?= $Page->ANProfileREPORT->editAttributes() ?> aria-describedby="x_ANProfileREPORT_help"><?= $Page->ANProfileREPORT->EditValue ?></textarea>
<?= $Page->ANProfileREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANProfileREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DualMarker->Visible) { // DualMarker ?>
    <div id="r_DualMarker" class="form-group row">
        <label id="elh_patient_an_registration_DualMarker" for="x_DualMarker" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DualMarker->caption() ?><?= $Page->DualMarker->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DualMarker->cellAttributes() ?>>
<span id="el_patient_an_registration_DualMarker">
<input type="<?= $Page->DualMarker->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarker" name="x_DualMarker" id="x_DualMarker" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DualMarker->getPlaceHolder()) ?>" value="<?= $Page->DualMarker->EditValue ?>"<?= $Page->DualMarker->editAttributes() ?> aria-describedby="x_DualMarker_help">
<?= $Page->DualMarker->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DualMarker->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DualMarkerDATE->Visible) { // DualMarkerDATE ?>
    <div id="r_DualMarkerDATE" class="form-group row">
        <label id="elh_patient_an_registration_DualMarkerDATE" for="x_DualMarkerDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DualMarkerDATE->caption() ?><?= $Page->DualMarkerDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DualMarkerDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_DualMarkerDATE">
<input type="<?= $Page->DualMarkerDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerDATE" name="x_DualMarkerDATE" id="x_DualMarkerDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DualMarkerDATE->getPlaceHolder()) ?>" value="<?= $Page->DualMarkerDATE->EditValue ?>"<?= $Page->DualMarkerDATE->editAttributes() ?> aria-describedby="x_DualMarkerDATE_help">
<?= $Page->DualMarkerDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DualMarkerDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DualMarkerINHOUSE->Visible) { // DualMarkerINHOUSE ?>
    <div id="r_DualMarkerINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_DualMarkerINHOUSE" for="x_DualMarkerINHOUSE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DualMarkerINHOUSE->caption() ?><?= $Page->DualMarkerINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DualMarkerINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_DualMarkerINHOUSE">
<input type="<?= $Page->DualMarkerINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DualMarkerINHOUSE" name="x_DualMarkerINHOUSE" id="x_DualMarkerINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DualMarkerINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->DualMarkerINHOUSE->EditValue ?>"<?= $Page->DualMarkerINHOUSE->editAttributes() ?> aria-describedby="x_DualMarkerINHOUSE_help">
<?= $Page->DualMarkerINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DualMarkerINHOUSE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DualMarkerREPORT->Visible) { // DualMarkerREPORT ?>
    <div id="r_DualMarkerREPORT" class="form-group row">
        <label id="elh_patient_an_registration_DualMarkerREPORT" for="x_DualMarkerREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DualMarkerREPORT->caption() ?><?= $Page->DualMarkerREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DualMarkerREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_DualMarkerREPORT">
<textarea data-table="patient_an_registration" data-field="x_DualMarkerREPORT" name="x_DualMarkerREPORT" id="x_DualMarkerREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->DualMarkerREPORT->getPlaceHolder()) ?>"<?= $Page->DualMarkerREPORT->editAttributes() ?> aria-describedby="x_DualMarkerREPORT_help"><?= $Page->DualMarkerREPORT->EditValue ?></textarea>
<?= $Page->DualMarkerREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DualMarkerREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Quadruple->Visible) { // Quadruple ?>
    <div id="r_Quadruple" class="form-group row">
        <label id="elh_patient_an_registration_Quadruple" for="x_Quadruple" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Quadruple->caption() ?><?= $Page->Quadruple->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Quadruple->cellAttributes() ?>>
<span id="el_patient_an_registration_Quadruple">
<input type="<?= $Page->Quadruple->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Quadruple" name="x_Quadruple" id="x_Quadruple" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Quadruple->getPlaceHolder()) ?>" value="<?= $Page->Quadruple->EditValue ?>"<?= $Page->Quadruple->editAttributes() ?> aria-describedby="x_Quadruple_help">
<?= $Page->Quadruple->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Quadruple->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QuadrupleDATE->Visible) { // QuadrupleDATE ?>
    <div id="r_QuadrupleDATE" class="form-group row">
        <label id="elh_patient_an_registration_QuadrupleDATE" for="x_QuadrupleDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->QuadrupleDATE->caption() ?><?= $Page->QuadrupleDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QuadrupleDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_QuadrupleDATE">
<input type="<?= $Page->QuadrupleDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleDATE" name="x_QuadrupleDATE" id="x_QuadrupleDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->QuadrupleDATE->getPlaceHolder()) ?>" value="<?= $Page->QuadrupleDATE->EditValue ?>"<?= $Page->QuadrupleDATE->editAttributes() ?> aria-describedby="x_QuadrupleDATE_help">
<?= $Page->QuadrupleDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QuadrupleDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QuadrupleINHOUSE->Visible) { // QuadrupleINHOUSE ?>
    <div id="r_QuadrupleINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_QuadrupleINHOUSE" for="x_QuadrupleINHOUSE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->QuadrupleINHOUSE->caption() ?><?= $Page->QuadrupleINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QuadrupleINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_QuadrupleINHOUSE">
<input type="<?= $Page->QuadrupleINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_QuadrupleINHOUSE" name="x_QuadrupleINHOUSE" id="x_QuadrupleINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->QuadrupleINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->QuadrupleINHOUSE->EditValue ?>"<?= $Page->QuadrupleINHOUSE->editAttributes() ?> aria-describedby="x_QuadrupleINHOUSE_help">
<?= $Page->QuadrupleINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QuadrupleINHOUSE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->QuadrupleREPORT->Visible) { // QuadrupleREPORT ?>
    <div id="r_QuadrupleREPORT" class="form-group row">
        <label id="elh_patient_an_registration_QuadrupleREPORT" for="x_QuadrupleREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->QuadrupleREPORT->caption() ?><?= $Page->QuadrupleREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->QuadrupleREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_QuadrupleREPORT">
<textarea data-table="patient_an_registration" data-field="x_QuadrupleREPORT" name="x_QuadrupleREPORT" id="x_QuadrupleREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->QuadrupleREPORT->getPlaceHolder()) ?>"<?= $Page->QuadrupleREPORT->editAttributes() ?> aria-describedby="x_QuadrupleREPORT_help"><?= $Page->QuadrupleREPORT->EditValue ?></textarea>
<?= $Page->QuadrupleREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->QuadrupleREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A5month->Visible) { // A5month ?>
    <div id="r_A5month" class="form-group row">
        <label id="elh_patient_an_registration_A5month" for="x_A5month" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A5month->caption() ?><?= $Page->A5month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A5month->cellAttributes() ?>>
<span id="el_patient_an_registration_A5month">
<input type="<?= $Page->A5month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5month" name="x_A5month" id="x_A5month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A5month->getPlaceHolder()) ?>" value="<?= $Page->A5month->EditValue ?>"<?= $Page->A5month->editAttributes() ?> aria-describedby="x_A5month_help">
<?= $Page->A5month->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A5month->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A5monthDATE->Visible) { // A5monthDATE ?>
    <div id="r_A5monthDATE" class="form-group row">
        <label id="elh_patient_an_registration_A5monthDATE" for="x_A5monthDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A5monthDATE->caption() ?><?= $Page->A5monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A5monthDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_A5monthDATE">
<input type="<?= $Page->A5monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthDATE" name="x_A5monthDATE" id="x_A5monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A5monthDATE->getPlaceHolder()) ?>" value="<?= $Page->A5monthDATE->EditValue ?>"<?= $Page->A5monthDATE->editAttributes() ?> aria-describedby="x_A5monthDATE_help">
<?= $Page->A5monthDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A5monthDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A5monthINHOUSE->Visible) { // A5monthINHOUSE ?>
    <div id="r_A5monthINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_A5monthINHOUSE" for="x_A5monthINHOUSE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A5monthINHOUSE->caption() ?><?= $Page->A5monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A5monthINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_A5monthINHOUSE">
<input type="<?= $Page->A5monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A5monthINHOUSE" name="x_A5monthINHOUSE" id="x_A5monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A5monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->A5monthINHOUSE->EditValue ?>"<?= $Page->A5monthINHOUSE->editAttributes() ?> aria-describedby="x_A5monthINHOUSE_help">
<?= $Page->A5monthINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A5monthINHOUSE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A5monthREPORT->Visible) { // A5monthREPORT ?>
    <div id="r_A5monthREPORT" class="form-group row">
        <label id="elh_patient_an_registration_A5monthREPORT" for="x_A5monthREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A5monthREPORT->caption() ?><?= $Page->A5monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A5monthREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_A5monthREPORT">
<textarea data-table="patient_an_registration" data-field="x_A5monthREPORT" name="x_A5monthREPORT" id="x_A5monthREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->A5monthREPORT->getPlaceHolder()) ?>"<?= $Page->A5monthREPORT->editAttributes() ?> aria-describedby="x_A5monthREPORT_help"><?= $Page->A5monthREPORT->EditValue ?></textarea>
<?= $Page->A5monthREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A5monthREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A7month->Visible) { // A7month ?>
    <div id="r_A7month" class="form-group row">
        <label id="elh_patient_an_registration_A7month" for="x_A7month" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A7month->caption() ?><?= $Page->A7month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A7month->cellAttributes() ?>>
<span id="el_patient_an_registration_A7month">
<input type="<?= $Page->A7month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7month" name="x_A7month" id="x_A7month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A7month->getPlaceHolder()) ?>" value="<?= $Page->A7month->EditValue ?>"<?= $Page->A7month->editAttributes() ?> aria-describedby="x_A7month_help">
<?= $Page->A7month->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A7month->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A7monthDATE->Visible) { // A7monthDATE ?>
    <div id="r_A7monthDATE" class="form-group row">
        <label id="elh_patient_an_registration_A7monthDATE" for="x_A7monthDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A7monthDATE->caption() ?><?= $Page->A7monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A7monthDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_A7monthDATE">
<input type="<?= $Page->A7monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthDATE" name="x_A7monthDATE" id="x_A7monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A7monthDATE->getPlaceHolder()) ?>" value="<?= $Page->A7monthDATE->EditValue ?>"<?= $Page->A7monthDATE->editAttributes() ?> aria-describedby="x_A7monthDATE_help">
<?= $Page->A7monthDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A7monthDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A7monthINHOUSE->Visible) { // A7monthINHOUSE ?>
    <div id="r_A7monthINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_A7monthINHOUSE" for="x_A7monthINHOUSE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A7monthINHOUSE->caption() ?><?= $Page->A7monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A7monthINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_A7monthINHOUSE">
<input type="<?= $Page->A7monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A7monthINHOUSE" name="x_A7monthINHOUSE" id="x_A7monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A7monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->A7monthINHOUSE->EditValue ?>"<?= $Page->A7monthINHOUSE->editAttributes() ?> aria-describedby="x_A7monthINHOUSE_help">
<?= $Page->A7monthINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A7monthINHOUSE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A7monthREPORT->Visible) { // A7monthREPORT ?>
    <div id="r_A7monthREPORT" class="form-group row">
        <label id="elh_patient_an_registration_A7monthREPORT" for="x_A7monthREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A7monthREPORT->caption() ?><?= $Page->A7monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A7monthREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_A7monthREPORT">
<textarea data-table="patient_an_registration" data-field="x_A7monthREPORT" name="x_A7monthREPORT" id="x_A7monthREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->A7monthREPORT->getPlaceHolder()) ?>"<?= $Page->A7monthREPORT->editAttributes() ?> aria-describedby="x_A7monthREPORT_help"><?= $Page->A7monthREPORT->EditValue ?></textarea>
<?= $Page->A7monthREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A7monthREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A9month->Visible) { // A9month ?>
    <div id="r_A9month" class="form-group row">
        <label id="elh_patient_an_registration_A9month" for="x_A9month" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A9month->caption() ?><?= $Page->A9month->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A9month->cellAttributes() ?>>
<span id="el_patient_an_registration_A9month">
<input type="<?= $Page->A9month->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9month" name="x_A9month" id="x_A9month" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A9month->getPlaceHolder()) ?>" value="<?= $Page->A9month->EditValue ?>"<?= $Page->A9month->editAttributes() ?> aria-describedby="x_A9month_help">
<?= $Page->A9month->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A9month->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A9monthDATE->Visible) { // A9monthDATE ?>
    <div id="r_A9monthDATE" class="form-group row">
        <label id="elh_patient_an_registration_A9monthDATE" for="x_A9monthDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A9monthDATE->caption() ?><?= $Page->A9monthDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A9monthDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_A9monthDATE">
<input type="<?= $Page->A9monthDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthDATE" name="x_A9monthDATE" id="x_A9monthDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A9monthDATE->getPlaceHolder()) ?>" value="<?= $Page->A9monthDATE->EditValue ?>"<?= $Page->A9monthDATE->editAttributes() ?> aria-describedby="x_A9monthDATE_help">
<?= $Page->A9monthDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A9monthDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A9monthINHOUSE->Visible) { // A9monthINHOUSE ?>
    <div id="r_A9monthINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_A9monthINHOUSE" for="x_A9monthINHOUSE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A9monthINHOUSE->caption() ?><?= $Page->A9monthINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A9monthINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_A9monthINHOUSE">
<input type="<?= $Page->A9monthINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_A9monthINHOUSE" name="x_A9monthINHOUSE" id="x_A9monthINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->A9monthINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->A9monthINHOUSE->EditValue ?>"<?= $Page->A9monthINHOUSE->editAttributes() ?> aria-describedby="x_A9monthINHOUSE_help">
<?= $Page->A9monthINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A9monthINHOUSE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->A9monthREPORT->Visible) { // A9monthREPORT ?>
    <div id="r_A9monthREPORT" class="form-group row">
        <label id="elh_patient_an_registration_A9monthREPORT" for="x_A9monthREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->A9monthREPORT->caption() ?><?= $Page->A9monthREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->A9monthREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_A9monthREPORT">
<textarea data-table="patient_an_registration" data-field="x_A9monthREPORT" name="x_A9monthREPORT" id="x_A9monthREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->A9monthREPORT->getPlaceHolder()) ?>"<?= $Page->A9monthREPORT->editAttributes() ?> aria-describedby="x_A9monthREPORT_help"><?= $Page->A9monthREPORT->EditValue ?></textarea>
<?= $Page->A9monthREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->A9monthREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJ->Visible) { // INJ ?>
    <div id="r_INJ" class="form-group row">
        <label id="elh_patient_an_registration_INJ" for="x_INJ" class="<?= $Page->LeftColumnClass ?>"><?= $Page->INJ->caption() ?><?= $Page->INJ->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJ->cellAttributes() ?>>
<span id="el_patient_an_registration_INJ">
<input type="<?= $Page->INJ->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJ" name="x_INJ" id="x_INJ" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJ->getPlaceHolder()) ?>" value="<?= $Page->INJ->EditValue ?>"<?= $Page->INJ->editAttributes() ?> aria-describedby="x_INJ_help">
<?= $Page->INJ->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJ->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJDATE->Visible) { // INJDATE ?>
    <div id="r_INJDATE" class="form-group row">
        <label id="elh_patient_an_registration_INJDATE" for="x_INJDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->INJDATE->caption() ?><?= $Page->INJDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_INJDATE">
<input type="<?= $Page->INJDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJDATE" name="x_INJDATE" id="x_INJDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJDATE->getPlaceHolder()) ?>" value="<?= $Page->INJDATE->EditValue ?>"<?= $Page->INJDATE->editAttributes() ?> aria-describedby="x_INJDATE_help">
<?= $Page->INJDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJINHOUSE->Visible) { // INJINHOUSE ?>
    <div id="r_INJINHOUSE" class="form-group row">
        <label id="elh_patient_an_registration_INJINHOUSE" for="x_INJINHOUSE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->INJINHOUSE->caption() ?><?= $Page->INJINHOUSE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJINHOUSE->cellAttributes() ?>>
<span id="el_patient_an_registration_INJINHOUSE">
<input type="<?= $Page->INJINHOUSE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_INJINHOUSE" name="x_INJINHOUSE" id="x_INJINHOUSE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->INJINHOUSE->getPlaceHolder()) ?>" value="<?= $Page->INJINHOUSE->EditValue ?>"<?= $Page->INJINHOUSE->editAttributes() ?> aria-describedby="x_INJINHOUSE_help">
<?= $Page->INJINHOUSE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJINHOUSE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->INJREPORT->Visible) { // INJREPORT ?>
    <div id="r_INJREPORT" class="form-group row">
        <label id="elh_patient_an_registration_INJREPORT" for="x_INJREPORT" class="<?= $Page->LeftColumnClass ?>"><?= $Page->INJREPORT->caption() ?><?= $Page->INJREPORT->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->INJREPORT->cellAttributes() ?>>
<span id="el_patient_an_registration_INJREPORT">
<textarea data-table="patient_an_registration" data-field="x_INJREPORT" name="x_INJREPORT" id="x_INJREPORT" cols="35" rows="4" placeholder="<?= HtmlEncode($Page->INJREPORT->getPlaceHolder()) ?>"<?= $Page->INJREPORT->editAttributes() ?> aria-describedby="x_INJREPORT_help"><?= $Page->INJREPORT->EditValue ?></textarea>
<?= $Page->INJREPORT->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->INJREPORT->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Bleeding->Visible) { // Bleeding ?>
    <div id="r_Bleeding" class="form-group row">
        <label id="elh_patient_an_registration_Bleeding" for="x_Bleeding" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Bleeding->caption() ?><?= $Page->Bleeding->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Bleeding->cellAttributes() ?>>
<span id="el_patient_an_registration_Bleeding">
<input type="<?= $Page->Bleeding->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Bleeding" name="x_Bleeding" id="x_Bleeding" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Bleeding->getPlaceHolder()) ?>" value="<?= $Page->Bleeding->EditValue ?>"<?= $Page->Bleeding->editAttributes() ?> aria-describedby="x_Bleeding_help">
<?= $Page->Bleeding->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Bleeding->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Hypothyroidism->Visible) { // Hypothyroidism ?>
    <div id="r_Hypothyroidism" class="form-group row">
        <label id="elh_patient_an_registration_Hypothyroidism" for="x_Hypothyroidism" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Hypothyroidism->caption() ?><?= $Page->Hypothyroidism->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Hypothyroidism->cellAttributes() ?>>
<span id="el_patient_an_registration_Hypothyroidism">
<input type="<?= $Page->Hypothyroidism->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Hypothyroidism" name="x_Hypothyroidism" id="x_Hypothyroidism" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Hypothyroidism->getPlaceHolder()) ?>" value="<?= $Page->Hypothyroidism->EditValue ?>"<?= $Page->Hypothyroidism->editAttributes() ?> aria-describedby="x_Hypothyroidism_help">
<?= $Page->Hypothyroidism->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Hypothyroidism->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PICMENumber->Visible) { // PICMENumber ?>
    <div id="r_PICMENumber" class="form-group row">
        <label id="elh_patient_an_registration_PICMENumber" for="x_PICMENumber" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PICMENumber->caption() ?><?= $Page->PICMENumber->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PICMENumber->cellAttributes() ?>>
<span id="el_patient_an_registration_PICMENumber">
<input type="<?= $Page->PICMENumber->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PICMENumber" name="x_PICMENumber" id="x_PICMENumber" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PICMENumber->getPlaceHolder()) ?>" value="<?= $Page->PICMENumber->EditValue ?>"<?= $Page->PICMENumber->editAttributes() ?> aria-describedby="x_PICMENumber_help">
<?= $Page->PICMENumber->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PICMENumber->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Outcome->Visible) { // Outcome ?>
    <div id="r_Outcome" class="form-group row">
        <label id="elh_patient_an_registration_Outcome" for="x_Outcome" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Outcome->caption() ?><?= $Page->Outcome->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Outcome->cellAttributes() ?>>
<span id="el_patient_an_registration_Outcome">
<input type="<?= $Page->Outcome->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Outcome" name="x_Outcome" id="x_Outcome" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Outcome->getPlaceHolder()) ?>" value="<?= $Page->Outcome->EditValue ?>"<?= $Page->Outcome->editAttributes() ?> aria-describedby="x_Outcome_help">
<?= $Page->Outcome->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Outcome->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateofAdmission->Visible) { // DateofAdmission ?>
    <div id="r_DateofAdmission" class="form-group row">
        <label id="elh_patient_an_registration_DateofAdmission" for="x_DateofAdmission" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DateofAdmission->caption() ?><?= $Page->DateofAdmission->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateofAdmission->cellAttributes() ?>>
<span id="el_patient_an_registration_DateofAdmission">
<input type="<?= $Page->DateofAdmission->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateofAdmission" name="x_DateofAdmission" id="x_DateofAdmission" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DateofAdmission->getPlaceHolder()) ?>" value="<?= $Page->DateofAdmission->EditValue ?>"<?= $Page->DateofAdmission->editAttributes() ?> aria-describedby="x_DateofAdmission_help">
<?= $Page->DateofAdmission->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateofAdmission->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->DateodProcedure->Visible) { // DateodProcedure ?>
    <div id="r_DateodProcedure" class="form-group row">
        <label id="elh_patient_an_registration_DateodProcedure" for="x_DateodProcedure" class="<?= $Page->LeftColumnClass ?>"><?= $Page->DateodProcedure->caption() ?><?= $Page->DateodProcedure->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->DateodProcedure->cellAttributes() ?>>
<span id="el_patient_an_registration_DateodProcedure">
<input type="<?= $Page->DateodProcedure->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_DateodProcedure" name="x_DateodProcedure" id="x_DateodProcedure" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->DateodProcedure->getPlaceHolder()) ?>" value="<?= $Page->DateodProcedure->EditValue ?>"<?= $Page->DateodProcedure->editAttributes() ?> aria-describedby="x_DateodProcedure_help">
<?= $Page->DateodProcedure->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->DateodProcedure->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Miscarriage->Visible) { // Miscarriage ?>
    <div id="r_Miscarriage" class="form-group row">
        <label id="elh_patient_an_registration_Miscarriage" for="x_Miscarriage" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Miscarriage->caption() ?><?= $Page->Miscarriage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Miscarriage->cellAttributes() ?>>
<span id="el_patient_an_registration_Miscarriage">
<input type="<?= $Page->Miscarriage->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Miscarriage" name="x_Miscarriage" id="x_Miscarriage" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Miscarriage->getPlaceHolder()) ?>" value="<?= $Page->Miscarriage->EditValue ?>"<?= $Page->Miscarriage->editAttributes() ?> aria-describedby="x_Miscarriage_help">
<?= $Page->Miscarriage->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Miscarriage->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ModeOfDelivery->Visible) { // ModeOfDelivery ?>
    <div id="r_ModeOfDelivery" class="form-group row">
        <label id="elh_patient_an_registration_ModeOfDelivery" for="x_ModeOfDelivery" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ModeOfDelivery->caption() ?><?= $Page->ModeOfDelivery->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ModeOfDelivery->cellAttributes() ?>>
<span id="el_patient_an_registration_ModeOfDelivery">
<input type="<?= $Page->ModeOfDelivery->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ModeOfDelivery" name="x_ModeOfDelivery" id="x_ModeOfDelivery" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ModeOfDelivery->getPlaceHolder()) ?>" value="<?= $Page->ModeOfDelivery->EditValue ?>"<?= $Page->ModeOfDelivery->editAttributes() ?> aria-describedby="x_ModeOfDelivery_help">
<?= $Page->ModeOfDelivery->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ModeOfDelivery->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ND->Visible) { // ND ?>
    <div id="r_ND" class="form-group row">
        <label id="elh_patient_an_registration_ND" for="x_ND" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ND->caption() ?><?= $Page->ND->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ND->cellAttributes() ?>>
<span id="el_patient_an_registration_ND">
<input type="<?= $Page->ND->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ND" name="x_ND" id="x_ND" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ND->getPlaceHolder()) ?>" value="<?= $Page->ND->EditValue ?>"<?= $Page->ND->editAttributes() ?> aria-describedby="x_ND_help">
<?= $Page->ND->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ND->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NDS->Visible) { // NDS ?>
    <div id="r_NDS" class="form-group row">
        <label id="elh_patient_an_registration_NDS" for="x_NDS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NDS->caption() ?><?= $Page->NDS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NDS->cellAttributes() ?>>
<span id="el_patient_an_registration_NDS">
<input type="<?= $Page->NDS->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NDS" name="x_NDS" id="x_NDS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NDS->getPlaceHolder()) ?>" value="<?= $Page->NDS->EditValue ?>"<?= $Page->NDS->editAttributes() ?> aria-describedby="x_NDS_help">
<?= $Page->NDS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NDS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NDP->Visible) { // NDP ?>
    <div id="r_NDP" class="form-group row">
        <label id="elh_patient_an_registration_NDP" for="x_NDP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NDP->caption() ?><?= $Page->NDP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NDP->cellAttributes() ?>>
<span id="el_patient_an_registration_NDP">
<input type="<?= $Page->NDP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NDP" name="x_NDP" id="x_NDP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NDP->getPlaceHolder()) ?>" value="<?= $Page->NDP->EditValue ?>"<?= $Page->NDP->editAttributes() ?> aria-describedby="x_NDP_help">
<?= $Page->NDP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NDP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Vaccum->Visible) { // Vaccum ?>
    <div id="r_Vaccum" class="form-group row">
        <label id="elh_patient_an_registration_Vaccum" for="x_Vaccum" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Vaccum->caption() ?><?= $Page->Vaccum->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Vaccum->cellAttributes() ?>>
<span id="el_patient_an_registration_Vaccum">
<input type="<?= $Page->Vaccum->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Vaccum" name="x_Vaccum" id="x_Vaccum" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Vaccum->getPlaceHolder()) ?>" value="<?= $Page->Vaccum->EditValue ?>"<?= $Page->Vaccum->editAttributes() ?> aria-describedby="x_Vaccum_help">
<?= $Page->Vaccum->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Vaccum->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VaccumS->Visible) { // VaccumS ?>
    <div id="r_VaccumS" class="form-group row">
        <label id="elh_patient_an_registration_VaccumS" for="x_VaccumS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VaccumS->caption() ?><?= $Page->VaccumS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VaccumS->cellAttributes() ?>>
<span id="el_patient_an_registration_VaccumS">
<input type="<?= $Page->VaccumS->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_VaccumS" name="x_VaccumS" id="x_VaccumS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VaccumS->getPlaceHolder()) ?>" value="<?= $Page->VaccumS->EditValue ?>"<?= $Page->VaccumS->editAttributes() ?> aria-describedby="x_VaccumS_help">
<?= $Page->VaccumS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VaccumS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->VaccumP->Visible) { // VaccumP ?>
    <div id="r_VaccumP" class="form-group row">
        <label id="elh_patient_an_registration_VaccumP" for="x_VaccumP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->VaccumP->caption() ?><?= $Page->VaccumP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->VaccumP->cellAttributes() ?>>
<span id="el_patient_an_registration_VaccumP">
<input type="<?= $Page->VaccumP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_VaccumP" name="x_VaccumP" id="x_VaccumP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->VaccumP->getPlaceHolder()) ?>" value="<?= $Page->VaccumP->EditValue ?>"<?= $Page->VaccumP->editAttributes() ?> aria-describedby="x_VaccumP_help">
<?= $Page->VaccumP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->VaccumP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Forceps->Visible) { // Forceps ?>
    <div id="r_Forceps" class="form-group row">
        <label id="elh_patient_an_registration_Forceps" for="x_Forceps" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Forceps->caption() ?><?= $Page->Forceps->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Forceps->cellAttributes() ?>>
<span id="el_patient_an_registration_Forceps">
<input type="<?= $Page->Forceps->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Forceps" name="x_Forceps" id="x_Forceps" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Forceps->getPlaceHolder()) ?>" value="<?= $Page->Forceps->EditValue ?>"<?= $Page->Forceps->editAttributes() ?> aria-describedby="x_Forceps_help">
<?= $Page->Forceps->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Forceps->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ForcepsS->Visible) { // ForcepsS ?>
    <div id="r_ForcepsS" class="form-group row">
        <label id="elh_patient_an_registration_ForcepsS" for="x_ForcepsS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ForcepsS->caption() ?><?= $Page->ForcepsS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ForcepsS->cellAttributes() ?>>
<span id="el_patient_an_registration_ForcepsS">
<input type="<?= $Page->ForcepsS->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ForcepsS" name="x_ForcepsS" id="x_ForcepsS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ForcepsS->getPlaceHolder()) ?>" value="<?= $Page->ForcepsS->EditValue ?>"<?= $Page->ForcepsS->editAttributes() ?> aria-describedby="x_ForcepsS_help">
<?= $Page->ForcepsS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ForcepsS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ForcepsP->Visible) { // ForcepsP ?>
    <div id="r_ForcepsP" class="form-group row">
        <label id="elh_patient_an_registration_ForcepsP" for="x_ForcepsP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ForcepsP->caption() ?><?= $Page->ForcepsP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ForcepsP->cellAttributes() ?>>
<span id="el_patient_an_registration_ForcepsP">
<input type="<?= $Page->ForcepsP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ForcepsP" name="x_ForcepsP" id="x_ForcepsP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ForcepsP->getPlaceHolder()) ?>" value="<?= $Page->ForcepsP->EditValue ?>"<?= $Page->ForcepsP->editAttributes() ?> aria-describedby="x_ForcepsP_help">
<?= $Page->ForcepsP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ForcepsP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Elective->Visible) { // Elective ?>
    <div id="r_Elective" class="form-group row">
        <label id="elh_patient_an_registration_Elective" for="x_Elective" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Elective->caption() ?><?= $Page->Elective->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Elective->cellAttributes() ?>>
<span id="el_patient_an_registration_Elective">
<input type="<?= $Page->Elective->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Elective" name="x_Elective" id="x_Elective" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Elective->getPlaceHolder()) ?>" value="<?= $Page->Elective->EditValue ?>"<?= $Page->Elective->editAttributes() ?> aria-describedby="x_Elective_help">
<?= $Page->Elective->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Elective->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ElectiveS->Visible) { // ElectiveS ?>
    <div id="r_ElectiveS" class="form-group row">
        <label id="elh_patient_an_registration_ElectiveS" for="x_ElectiveS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ElectiveS->caption() ?><?= $Page->ElectiveS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ElectiveS->cellAttributes() ?>>
<span id="el_patient_an_registration_ElectiveS">
<input type="<?= $Page->ElectiveS->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ElectiveS" name="x_ElectiveS" id="x_ElectiveS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ElectiveS->getPlaceHolder()) ?>" value="<?= $Page->ElectiveS->EditValue ?>"<?= $Page->ElectiveS->editAttributes() ?> aria-describedby="x_ElectiveS_help">
<?= $Page->ElectiveS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ElectiveS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ElectiveP->Visible) { // ElectiveP ?>
    <div id="r_ElectiveP" class="form-group row">
        <label id="elh_patient_an_registration_ElectiveP" for="x_ElectiveP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ElectiveP->caption() ?><?= $Page->ElectiveP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ElectiveP->cellAttributes() ?>>
<span id="el_patient_an_registration_ElectiveP">
<input type="<?= $Page->ElectiveP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ElectiveP" name="x_ElectiveP" id="x_ElectiveP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ElectiveP->getPlaceHolder()) ?>" value="<?= $Page->ElectiveP->EditValue ?>"<?= $Page->ElectiveP->editAttributes() ?> aria-describedby="x_ElectiveP_help">
<?= $Page->ElectiveP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ElectiveP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Emergency->Visible) { // Emergency ?>
    <div id="r_Emergency" class="form-group row">
        <label id="elh_patient_an_registration_Emergency" for="x_Emergency" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Emergency->caption() ?><?= $Page->Emergency->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Emergency->cellAttributes() ?>>
<span id="el_patient_an_registration_Emergency">
<input type="<?= $Page->Emergency->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Emergency" name="x_Emergency" id="x_Emergency" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Emergency->getPlaceHolder()) ?>" value="<?= $Page->Emergency->EditValue ?>"<?= $Page->Emergency->editAttributes() ?> aria-describedby="x_Emergency_help">
<?= $Page->Emergency->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Emergency->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmergencyS->Visible) { // EmergencyS ?>
    <div id="r_EmergencyS" class="form-group row">
        <label id="elh_patient_an_registration_EmergencyS" for="x_EmergencyS" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmergencyS->caption() ?><?= $Page->EmergencyS->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmergencyS->cellAttributes() ?>>
<span id="el_patient_an_registration_EmergencyS">
<input type="<?= $Page->EmergencyS->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EmergencyS" name="x_EmergencyS" id="x_EmergencyS" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmergencyS->getPlaceHolder()) ?>" value="<?= $Page->EmergencyS->EditValue ?>"<?= $Page->EmergencyS->editAttributes() ?> aria-describedby="x_EmergencyS_help">
<?= $Page->EmergencyS->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmergencyS->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->EmergencyP->Visible) { // EmergencyP ?>
    <div id="r_EmergencyP" class="form-group row">
        <label id="elh_patient_an_registration_EmergencyP" for="x_EmergencyP" class="<?= $Page->LeftColumnClass ?>"><?= $Page->EmergencyP->caption() ?><?= $Page->EmergencyP->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->EmergencyP->cellAttributes() ?>>
<span id="el_patient_an_registration_EmergencyP">
<input type="<?= $Page->EmergencyP->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_EmergencyP" name="x_EmergencyP" id="x_EmergencyP" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->EmergencyP->getPlaceHolder()) ?>" value="<?= $Page->EmergencyP->EditValue ?>"<?= $Page->EmergencyP->editAttributes() ?> aria-describedby="x_EmergencyP_help">
<?= $Page->EmergencyP->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->EmergencyP->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Maturity->Visible) { // Maturity ?>
    <div id="r_Maturity" class="form-group row">
        <label id="elh_patient_an_registration_Maturity" for="x_Maturity" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Maturity->caption() ?><?= $Page->Maturity->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Maturity->cellAttributes() ?>>
<span id="el_patient_an_registration_Maturity">
<input type="<?= $Page->Maturity->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Maturity" name="x_Maturity" id="x_Maturity" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Maturity->getPlaceHolder()) ?>" value="<?= $Page->Maturity->EditValue ?>"<?= $Page->Maturity->editAttributes() ?> aria-describedby="x_Maturity_help">
<?= $Page->Maturity->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Maturity->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Baby1->Visible) { // Baby1 ?>
    <div id="r_Baby1" class="form-group row">
        <label id="elh_patient_an_registration_Baby1" for="x_Baby1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Baby1->caption() ?><?= $Page->Baby1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Baby1->cellAttributes() ?>>
<span id="el_patient_an_registration_Baby1">
<input type="<?= $Page->Baby1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby1" name="x_Baby1" id="x_Baby1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Baby1->getPlaceHolder()) ?>" value="<?= $Page->Baby1->EditValue ?>"<?= $Page->Baby1->editAttributes() ?> aria-describedby="x_Baby1_help">
<?= $Page->Baby1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Baby1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Baby2->Visible) { // Baby2 ?>
    <div id="r_Baby2" class="form-group row">
        <label id="elh_patient_an_registration_Baby2" for="x_Baby2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Baby2->caption() ?><?= $Page->Baby2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Baby2->cellAttributes() ?>>
<span id="el_patient_an_registration_Baby2">
<input type="<?= $Page->Baby2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Baby2" name="x_Baby2" id="x_Baby2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Baby2->getPlaceHolder()) ?>" value="<?= $Page->Baby2->EditValue ?>"<?= $Page->Baby2->editAttributes() ?> aria-describedby="x_Baby2_help">
<?= $Page->Baby2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Baby2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sex1->Visible) { // sex1 ?>
    <div id="r_sex1" class="form-group row">
        <label id="elh_patient_an_registration_sex1" for="x_sex1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sex1->caption() ?><?= $Page->sex1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sex1->cellAttributes() ?>>
<span id="el_patient_an_registration_sex1">
<input type="<?= $Page->sex1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex1" name="x_sex1" id="x_sex1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->sex1->getPlaceHolder()) ?>" value="<?= $Page->sex1->EditValue ?>"<?= $Page->sex1->editAttributes() ?> aria-describedby="x_sex1_help">
<?= $Page->sex1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sex1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->sex2->Visible) { // sex2 ?>
    <div id="r_sex2" class="form-group row">
        <label id="elh_patient_an_registration_sex2" for="x_sex2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->sex2->caption() ?><?= $Page->sex2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->sex2->cellAttributes() ?>>
<span id="el_patient_an_registration_sex2">
<input type="<?= $Page->sex2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_sex2" name="x_sex2" id="x_sex2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->sex2->getPlaceHolder()) ?>" value="<?= $Page->sex2->EditValue ?>"<?= $Page->sex2->editAttributes() ?> aria-describedby="x_sex2_help">
<?= $Page->sex2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->sex2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->weight1->Visible) { // weight1 ?>
    <div id="r_weight1" class="form-group row">
        <label id="elh_patient_an_registration_weight1" for="x_weight1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->weight1->caption() ?><?= $Page->weight1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->weight1->cellAttributes() ?>>
<span id="el_patient_an_registration_weight1">
<input type="<?= $Page->weight1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight1" name="x_weight1" id="x_weight1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->weight1->getPlaceHolder()) ?>" value="<?= $Page->weight1->EditValue ?>"<?= $Page->weight1->editAttributes() ?> aria-describedby="x_weight1_help">
<?= $Page->weight1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->weight1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->weight2->Visible) { // weight2 ?>
    <div id="r_weight2" class="form-group row">
        <label id="elh_patient_an_registration_weight2" for="x_weight2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->weight2->caption() ?><?= $Page->weight2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->weight2->cellAttributes() ?>>
<span id="el_patient_an_registration_weight2">
<input type="<?= $Page->weight2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_weight2" name="x_weight2" id="x_weight2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->weight2->getPlaceHolder()) ?>" value="<?= $Page->weight2->EditValue ?>"<?= $Page->weight2->editAttributes() ?> aria-describedby="x_weight2_help">
<?= $Page->weight2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->weight2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NICU1->Visible) { // NICU1 ?>
    <div id="r_NICU1" class="form-group row">
        <label id="elh_patient_an_registration_NICU1" for="x_NICU1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NICU1->caption() ?><?= $Page->NICU1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NICU1->cellAttributes() ?>>
<span id="el_patient_an_registration_NICU1">
<input type="<?= $Page->NICU1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU1" name="x_NICU1" id="x_NICU1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NICU1->getPlaceHolder()) ?>" value="<?= $Page->NICU1->EditValue ?>"<?= $Page->NICU1->editAttributes() ?> aria-describedby="x_NICU1_help">
<?= $Page->NICU1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NICU1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->NICU2->Visible) { // NICU2 ?>
    <div id="r_NICU2" class="form-group row">
        <label id="elh_patient_an_registration_NICU2" for="x_NICU2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->NICU2->caption() ?><?= $Page->NICU2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->NICU2->cellAttributes() ?>>
<span id="el_patient_an_registration_NICU2">
<input type="<?= $Page->NICU2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_NICU2" name="x_NICU2" id="x_NICU2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->NICU2->getPlaceHolder()) ?>" value="<?= $Page->NICU2->EditValue ?>"<?= $Page->NICU2->editAttributes() ?> aria-describedby="x_NICU2_help">
<?= $Page->NICU2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->NICU2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Jaundice1->Visible) { // Jaundice1 ?>
    <div id="r_Jaundice1" class="form-group row">
        <label id="elh_patient_an_registration_Jaundice1" for="x_Jaundice1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Jaundice1->caption() ?><?= $Page->Jaundice1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Jaundice1->cellAttributes() ?>>
<span id="el_patient_an_registration_Jaundice1">
<input type="<?= $Page->Jaundice1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice1" name="x_Jaundice1" id="x_Jaundice1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Jaundice1->getPlaceHolder()) ?>" value="<?= $Page->Jaundice1->EditValue ?>"<?= $Page->Jaundice1->editAttributes() ?> aria-describedby="x_Jaundice1_help">
<?= $Page->Jaundice1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Jaundice1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Jaundice2->Visible) { // Jaundice2 ?>
    <div id="r_Jaundice2" class="form-group row">
        <label id="elh_patient_an_registration_Jaundice2" for="x_Jaundice2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Jaundice2->caption() ?><?= $Page->Jaundice2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Jaundice2->cellAttributes() ?>>
<span id="el_patient_an_registration_Jaundice2">
<input type="<?= $Page->Jaundice2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Jaundice2" name="x_Jaundice2" id="x_Jaundice2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Jaundice2->getPlaceHolder()) ?>" value="<?= $Page->Jaundice2->EditValue ?>"<?= $Page->Jaundice2->editAttributes() ?> aria-describedby="x_Jaundice2_help">
<?= $Page->Jaundice2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Jaundice2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others1->Visible) { // Others1 ?>
    <div id="r_Others1" class="form-group row">
        <label id="elh_patient_an_registration_Others1" for="x_Others1" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others1->caption() ?><?= $Page->Others1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others1->cellAttributes() ?>>
<span id="el_patient_an_registration_Others1">
<input type="<?= $Page->Others1->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others1" name="x_Others1" id="x_Others1" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others1->getPlaceHolder()) ?>" value="<?= $Page->Others1->EditValue ?>"<?= $Page->Others1->editAttributes() ?> aria-describedby="x_Others1_help">
<?= $Page->Others1->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others1->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->Others2->Visible) { // Others2 ?>
    <div id="r_Others2" class="form-group row">
        <label id="elh_patient_an_registration_Others2" for="x_Others2" class="<?= $Page->LeftColumnClass ?>"><?= $Page->Others2->caption() ?><?= $Page->Others2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->Others2->cellAttributes() ?>>
<span id="el_patient_an_registration_Others2">
<input type="<?= $Page->Others2->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_Others2" name="x_Others2" id="x_Others2" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->Others2->getPlaceHolder()) ?>" value="<?= $Page->Others2->EditValue ?>"<?= $Page->Others2->editAttributes() ?> aria-describedby="x_Others2_help">
<?= $Page->Others2->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->Others2->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->SpillOverReasons->Visible) { // SpillOverReasons ?>
    <div id="r_SpillOverReasons" class="form-group row">
        <label id="elh_patient_an_registration_SpillOverReasons" for="x_SpillOverReasons" class="<?= $Page->LeftColumnClass ?>"><?= $Page->SpillOverReasons->caption() ?><?= $Page->SpillOverReasons->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->SpillOverReasons->cellAttributes() ?>>
<span id="el_patient_an_registration_SpillOverReasons">
<input type="<?= $Page->SpillOverReasons->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_SpillOverReasons" name="x_SpillOverReasons" id="x_SpillOverReasons" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->SpillOverReasons->getPlaceHolder()) ?>" value="<?= $Page->SpillOverReasons->EditValue ?>"<?= $Page->SpillOverReasons->editAttributes() ?> aria-describedby="x_SpillOverReasons_help">
<?= $Page->SpillOverReasons->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->SpillOverReasons->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANClosed->Visible) { // ANClosed ?>
    <div id="r_ANClosed" class="form-group row">
        <label id="elh_patient_an_registration_ANClosed" for="x_ANClosed" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ANClosed->caption() ?><?= $Page->ANClosed->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANClosed->cellAttributes() ?>>
<span id="el_patient_an_registration_ANClosed">
<input type="<?= $Page->ANClosed->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANClosed" name="x_ANClosed" id="x_ANClosed" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANClosed->getPlaceHolder()) ?>" value="<?= $Page->ANClosed->EditValue ?>"<?= $Page->ANClosed->editAttributes() ?> aria-describedby="x_ANClosed_help">
<?= $Page->ANClosed->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANClosed->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ANClosedDATE->Visible) { // ANClosedDATE ?>
    <div id="r_ANClosedDATE" class="form-group row">
        <label id="elh_patient_an_registration_ANClosedDATE" for="x_ANClosedDATE" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ANClosedDATE->caption() ?><?= $Page->ANClosedDATE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ANClosedDATE->cellAttributes() ?>>
<span id="el_patient_an_registration_ANClosedDATE">
<input type="<?= $Page->ANClosedDATE->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ANClosedDATE" name="x_ANClosedDATE" id="x_ANClosedDATE" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ANClosedDATE->getPlaceHolder()) ?>" value="<?= $Page->ANClosedDATE->EditValue ?>"<?= $Page->ANClosedDATE->editAttributes() ?> aria-describedby="x_ANClosedDATE_help">
<?= $Page->ANClosedDATE->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ANClosedDATE->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastMedicalHistoryOthers->Visible) { // PastMedicalHistoryOthers ?>
    <div id="r_PastMedicalHistoryOthers" class="form-group row">
        <label id="elh_patient_an_registration_PastMedicalHistoryOthers" for="x_PastMedicalHistoryOthers" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PastMedicalHistoryOthers->caption() ?><?= $Page->PastMedicalHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastMedicalHistoryOthers->cellAttributes() ?>>
<span id="el_patient_an_registration_PastMedicalHistoryOthers">
<input type="<?= $Page->PastMedicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastMedicalHistoryOthers" name="x_PastMedicalHistoryOthers" id="x_PastMedicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PastMedicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Page->PastMedicalHistoryOthers->EditValue ?>"<?= $Page->PastMedicalHistoryOthers->editAttributes() ?> aria-describedby="x_PastMedicalHistoryOthers_help">
<?= $Page->PastMedicalHistoryOthers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastMedicalHistoryOthers->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PastSurgicalHistoryOthers->Visible) { // PastSurgicalHistoryOthers ?>
    <div id="r_PastSurgicalHistoryOthers" class="form-group row">
        <label id="elh_patient_an_registration_PastSurgicalHistoryOthers" for="x_PastSurgicalHistoryOthers" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PastSurgicalHistoryOthers->caption() ?><?= $Page->PastSurgicalHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PastSurgicalHistoryOthers->cellAttributes() ?>>
<span id="el_patient_an_registration_PastSurgicalHistoryOthers">
<input type="<?= $Page->PastSurgicalHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PastSurgicalHistoryOthers" name="x_PastSurgicalHistoryOthers" id="x_PastSurgicalHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PastSurgicalHistoryOthers->getPlaceHolder()) ?>" value="<?= $Page->PastSurgicalHistoryOthers->EditValue ?>"<?= $Page->PastSurgicalHistoryOthers->editAttributes() ?> aria-describedby="x_PastSurgicalHistoryOthers_help">
<?= $Page->PastSurgicalHistoryOthers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PastSurgicalHistoryOthers->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->FamilyHistoryOthers->Visible) { // FamilyHistoryOthers ?>
    <div id="r_FamilyHistoryOthers" class="form-group row">
        <label id="elh_patient_an_registration_FamilyHistoryOthers" for="x_FamilyHistoryOthers" class="<?= $Page->LeftColumnClass ?>"><?= $Page->FamilyHistoryOthers->caption() ?><?= $Page->FamilyHistoryOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->FamilyHistoryOthers->cellAttributes() ?>>
<span id="el_patient_an_registration_FamilyHistoryOthers">
<input type="<?= $Page->FamilyHistoryOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_FamilyHistoryOthers" name="x_FamilyHistoryOthers" id="x_FamilyHistoryOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->FamilyHistoryOthers->getPlaceHolder()) ?>" value="<?= $Page->FamilyHistoryOthers->EditValue ?>"<?= $Page->FamilyHistoryOthers->editAttributes() ?> aria-describedby="x_FamilyHistoryOthers_help">
<?= $Page->FamilyHistoryOthers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->FamilyHistoryOthers->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->PresentPregnancyComplicationsOthers->Visible) { // PresentPregnancyComplicationsOthers ?>
    <div id="r_PresentPregnancyComplicationsOthers" class="form-group row">
        <label id="elh_patient_an_registration_PresentPregnancyComplicationsOthers" for="x_PresentPregnancyComplicationsOthers" class="<?= $Page->LeftColumnClass ?>"><?= $Page->PresentPregnancyComplicationsOthers->caption() ?><?= $Page->PresentPregnancyComplicationsOthers->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->PresentPregnancyComplicationsOthers->cellAttributes() ?>>
<span id="el_patient_an_registration_PresentPregnancyComplicationsOthers">
<input type="<?= $Page->PresentPregnancyComplicationsOthers->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_PresentPregnancyComplicationsOthers" name="x_PresentPregnancyComplicationsOthers" id="x_PresentPregnancyComplicationsOthers" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->PresentPregnancyComplicationsOthers->getPlaceHolder()) ?>" value="<?= $Page->PresentPregnancyComplicationsOthers->EditValue ?>"<?= $Page->PresentPregnancyComplicationsOthers->editAttributes() ?> aria-describedby="x_PresentPregnancyComplicationsOthers_help">
<?= $Page->PresentPregnancyComplicationsOthers->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->PresentPregnancyComplicationsOthers->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
<?php if ($Page->ETdate->Visible) { // ETdate ?>
    <div id="r_ETdate" class="form-group row">
        <label id="elh_patient_an_registration_ETdate" for="x_ETdate" class="<?= $Page->LeftColumnClass ?>"><?= $Page->ETdate->caption() ?><?= $Page->ETdate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
        <div class="<?= $Page->RightColumnClass ?>"><div <?= $Page->ETdate->cellAttributes() ?>>
<span id="el_patient_an_registration_ETdate">
<input type="<?= $Page->ETdate->getInputTextType() ?>" data-table="patient_an_registration" data-field="x_ETdate" name="x_ETdate" id="x_ETdate" size="30" maxlength="45" placeholder="<?= HtmlEncode($Page->ETdate->getPlaceHolder()) ?>" value="<?= $Page->ETdate->EditValue ?>"<?= $Page->ETdate->editAttributes() ?> aria-describedby="x_ETdate_help">
<?= $Page->ETdate->getCustomMessage() ?>
<div class="invalid-feedback"><?= $Page->ETdate->getErrorMessage() ?></div>
</span>
</div></div>
    </div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$Page->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
    <div class="<?= $Page->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?= $Language->phrase("SaveBtn") ?></button>
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
    ew.addEventHandlers("patient_an_registration");
});
</script>
<script>
loadjs.ready("load", function () {
    // Write your table-specific startup script here, no need to add script tags.
});
</script>
